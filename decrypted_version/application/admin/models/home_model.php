<?php


class Home_model extends CI_Model {

	public function Home_model() {

		parent::__construct();
		return;
	}

	public function is_login() {

		$username = $this->input->post("username");
		$password = $this->input->post("password");
		$query = $this->db->get_where("admin", array("username" => $username, "password" => $password, "active" => "1"));
		if ($query->num_rows() > 0)
		{
			$admin = $query->row_array();
			$admin_id = $admin["admin_id"];
			$data = array("admin_id" => $admin_id, "username" => $username);
			$this->session->set_userdata($data);
			$login_add = $this->db->query("insert into admin_login(`admin_id`,`login_ip`,`login_date`)values('" . $admin_id . "','" . $_SERVER["REMOTE_ADDR"] . "','" . date("Y-m-d H:i:s") . "')");
			return "1";
		}
		return "0";
	}

	public function forgot_email() {

		$email = $this->input->post("email");
		$query = $this->db->get_where("admin", array("email" => $email));
		if ($query->num_rows() > 0)
		{
			$row = $query->row();
			if ($row->email != "")
			{
				$email_template = $this->db->query("select * from `email_template` where task='Forgot Password'");
				$email_temp = $email_template->row();
				$email_setting = $this->db->query("select * from `email_setting` where email_setting_id='1'");
				$email_set = $email_setting->row();
				$email_address_from = $email_temp->from_address;
				$email_address_reply = $email_temp->reply_address;
				$email_subject = $email_temp->subject;
				$email_message = $email_temp->message;
				$username = $row->username;
				$password = $row->password;
				$email = $row->email;
				$login_link = base_url() . "home/index";
				$email_message = str_replace("{break}", "\\n\\n", $email_message);
				$email_message = str_replace("{user_name}", $username, $email_message);
				$email_message = str_replace("{password}", $password, $email_message);
				$email_message = str_replace("{email}", $email, $email_message);
				$email_message = str_replace("{login_link}", $login_link, $email_message);
				$str = $email_message;
				$this->load->library("email");
				if ($email_set->mailer == "smtp")
				{
					$config["protocol"] = "smtp";
					$config["smtp_host"] = trim($email_set->smtp_host);
					$config["smtp_port"] = trim($email_set->smtp_port);
					$config["smtp_timeout"] = "30";
					$config["smtp_user"] = trim($email_set->smtp_email);
					$config["smtp_pass"] = trim($email_set->smtp_password);
				}
				 else 
				{
					if ($email_set->mailer == "sendmail")
					{
						$config["protocol"] = "sendmail";
						$config["mailpath"] = trim($email_set->sendmail_path);
					}
				}
				$config["wordwrap"] = TRUE;
				$config["mailtype"] = "html";
				$config["crlf"] = "\\n\\n";
				$config["newline"] = "\\n\\n";
				$this->email->initialize($config);
				$this->email->from($email_address_from);
				$this->email->reply_to($email_address_reply);
				$this->email->to($row->email);
				$this->email->subject($email_subject);
				$this->email->message($str);
				$this->email->send();
				return "1";
			}
			return "0";
		}
		return 2;
	}

	public function get_rights($rights_name) {

		$right_detail = $this->db->query("select * from rights where rights_name='" . trim($rights_name) . "'");
		if ($right_detail->num_rows() > 0)
		{
			$right_result = $right_detail->row();
			$rights_id = $right_result->rights_id;
			$query = $this->db->query("select * from rights_assign where rights_id='" . $rights_id . "' and admin_id='" . $this->session->userdata("admin_id") . "'");
			if ($query->num_rows() > 0)
			{
				$result = $query->row();
				if ($result->rights_set == "1" || $result->rights_set == 1)
				{
					return 1;
				}
				return 0;
			}
			return 0;
		}
		return 0;
	}

	public function get_users() {

		$this->db->order_by("date_added", "desc");
		$this->db->limit(10);
		$query = $this->db->get("user");
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		return 0;
	}

	public function get_customer() {

		$query = $this->db->query("select tr.host_ip,tr.amount,tr.pay_fee,tr.perk_id,p.project_title,p.url_project_title,p.project_id,tr.user_id,us.user_name,us.last_name,us.email,tr.email as payee_email from transaction tr , project p , user us where  tr.project_id = p.project_id and tr.user_id=us.user_id order by tr.transaction_id desc");
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		return 0;
	}

	public function get_project() {

		$date = date("Y-m-d");
		$this->db->select("project.*,user.user_id,user.user_name,sum(transaction.amount) as total_amount,sum(transaction.listing_fee) as total_listing_fee,sum(transaction.pay_fee) as total_pay_fee");
		$this->db->from("project");
		$this->db->where("project.end_date <=", $date);
		$this->db->join("user", "project.user_id= user.user_id", "left");
		$this->db->join("transaction", "project.project_id= transaction.project_id");
		$this->db->order_by("project.date_added", "desc");
		$this->db->group_by("transaction.project_id");
		$this->db->limit(10);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		return 0;
	}

	public function get_posted_project() {

		$query = $this->db->query("SELECT `project`. * ,`user`.`user_id`, `user`.`user_name`, t.total_amount, t.total_listing_fee, t.total_pay_fee FROM (`project`) LEFT JOIN `user` ON `project`.`user_id` = `user`.`user_id` LEFT JOIN (SELECT project_id, sum( amount ) AS total_amount, sum( listing_fee ) AS total_listing_fee, sum( pay_fee ) AS total_pay_fee FROM `transaction` GROUP BY project_id) t ON `project`.`project_id` = `t`.`project_id` ORDER BY `project`.`date_added` DESC, `project`.`project_id` DESC LIMIT 10");
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		return 0;
	}

	public function get_total_project_posted() {

		$this->db->select("*");
		$this->db->from("project");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}

	public function get_total_pending_project() {

		$start = date("Y") . "-" . date("m") . "-1";
		$month = date("m");
		$year = date("Y");
		$month++;
		if ($month > 12)
		{
			$month = 1;
			$year++;
		}
		$end = $year . "-" . $month . "-1";
		$this->db->select("*");
		$this->db->from("project");
		$this->db->where("(end_date between \"" . $start . "\" AND \"" . $end . "\") AND (active = \"1\") ");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}

	public function get_total_completed_project() {

		$start = date("Y") . "-" . date("m") . "-1";
		$month = date("m");
		$year = date("Y");
		$month++;
		if ($month > 12)
		{
			$month = 1;
			$year++;
		}
		$end = $year . "-" . $month . "-1";
		$this->db->select("*");
		$this->db->from("project");
		$this->db->where("(end_date between \"" . $start . "\" AND \"" . $end . "\") ");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}

	public function get_total_earned() {

		$this->db->select("SUM(listing_fee) as total_listing_fee,SUM(pay_fee) as total_pay_fee,SUM(amount) as total_amount");
		$this->db->from("transaction");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$res = $query->result_array();
			$ret["commission"] = $res[0]["total_listing_fee"] + $res[0]["total_pay_fee"];
			$ret["funding"] = $res[0]["total_amount"];
			return $ret;
		}
		return 0;
	}

	public function get_total_earned_month() {

		$start = date("Y") . "-" . date("m") . "-1";
		$month = date("m");
		$year = date("Y");
		$month++;
		if ($month > 12)
		{
			$month = 1;
			$year++;
		}
		$end = $year . "-" . $month . "-1";
		$this->db->select("SUM(listing_fee) as total_listing_fee,SUM(pay_fee) as total_pay_fee,SUM(amount) as total_amount");
		$this->db->from("transaction");
		$this->db->where("DATE(transaction_date_time) between \"" . $start . "\" AND \"" . $end . "\"");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$res = $query->result_array();
			$ret["commission"] = $res[0]["total_listing_fee"] + $res[0]["total_pay_fee"];
			$ret["funding"] = $res[0]["total_amount"];
			return $ret;
		}
		return 0;
	}

	public function get_total_earned_week() {

		$tm = time();
		$day_of_week = date("l", $tm);
		while ($day_of_week != "Monday")
		{
			$tm -= 24 * 3600;
			$day_of_week = date("l", $tm);
			continue;
		}
		$starttemp = mktime(0, 0, 0, date("m", $tm), date("d", $tm), date("Y", $tm));
		$endtemp = $starttemp + 7 * 24 * 3600 - 1;
		$start = date("Y-m-d", $starttemp);
		$end = date("Y-m-d", $endtemp);
		$this->db->select("SUM(listing_fee) as total_listing_fee,SUM(pay_fee) as total_pay_fee,SUM(amount) as total_amount");
		$this->db->from("transaction");
		$this->db->where("DATE(transaction_date_time) between \"" . $start . "\" AND \"" . $end . "\"");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$res = $query->result_array();
			$ret["commission"] = $res[0]["total_listing_fee"] + $res[0]["total_pay_fee"];
			$ret["funding"] = $res[0]["total_amount"];
			return $ret;
		}
		return 0;
	}

	public function get_total_earned_today() {

		$start = date("Y-m-d");
		$end = date("Y-m-d");
		$this->db->select("SUM(listing_fee) as total_listing_fee,SUM(pay_fee) as total_pay_fee,SUM(amount) as total_amount");
		$this->db->from("transaction");
		$this->db->where("DATE(transaction_date_time) between \"" . $start . "\" AND \"" . $end . "\"");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$res = $query->result_array();
			$ret["commission"] = $res[0]["total_listing_fee"] + $res[0]["total_pay_fee"];
			$ret["funding"] = $res[0]["total_amount"];
			return $ret;
		}
		return 0;
	}

	public function get_total_lost() {

		$this->db->select("SUM(amount - amount_get) as total_lost");
		$this->db->from("project");
		$this->db->where("(active='0') AND (amount > amount_get) AND (end_date<'" . date("Y-m-d") . "')");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$res = $query->result_array();
			$ret["lost"] = $res[0]["total_lost"];
			$query = $this->db->query("select * from project_setting");
			$ps = $query->row_array();
			$ret["commission"] = $res[0]["total_lost"] * $ps["pay_fee"] / 100 + $res[0]["total_lost"] * $ps["project_listing_fee"] / 100;
			return $ret;
		}
		return 0;
	}

	public function get_total_lost_month() {

		$start = date("Y") . "-" . date("m") . "-1";
		$month = date("m");
		$year = date("Y");
		$month++;
		if ($month > 12)
		{
			$month = 1;
			$year++;
		}
		$end = $year . "-" . $month . "-1";
		$this->db->select("SUM(amount - amount_get) as total_lost");
		$this->db->from("project");
		$this->db->where("(end_date between \"" . $start . "\" AND \"" . $end . "\") AND (amount > amount_get)");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$res = $query->result_array();
			$ret["lost"] = $res[0]["total_lost"];
			$query = $this->db->query("select * from project_setting");
			$ps = $query->row_array();
			$ret["commission"] = $res[0]["total_lost"] * $ps["pay_fee"] / 100 + $res[0]["total_lost"] * $ps["project_listing_fee"] / 100;
			return $ret;
		}
		return 0;
	}

	public function get_total_lost_week() {

		$tm = time();
		$day_of_week = date("l", $tm);
		while ($day_of_week != "Monday")
		{
			$tm -= 24 * 3600;
			$day_of_week = date("l", $tm);
			continue;
		}
		$starttemp = mktime(0, 0, 0, date("m", $tm), date("d", $tm), date("Y", $tm));
		$endtemp = $starttemp + 7 * 24 * 3600 - 1;
		$start = date("Y-m-d", $starttemp);
		$end = date("Y-m-d", $endtemp);
		$this->db->select("SUM(amount - amount_get) as total_lost");
		$this->db->from("project");
		$this->db->where("(end_date between \"" . $start . "\" AND \"" . $end . "\") AND (amount > amount_get)");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$res = $query->result_array();
			$ret["lost"] = $res[0]["total_lost"];
			$query = $this->db->query("select * from project_setting");
			$ps = $query->row_array();
			$ret["commission"] = $res[0]["total_lost"] * $ps["pay_fee"] / 100 + $res[0]["total_lost"] * $ps["project_listing_fee"] / 100;
			return $ret;
		}
		return 0;
	}

	public function get_total_lost_today() {

		$start = date("Y-m-d");
		$end = date("Y-m-d");
		$this->db->select("SUM(amount - amount_get) as total_lost");
		$this->db->from("project");
		$this->db->where("(end_date between \"" . $start . "\" AND \"" . $end . "\") AND (amount > amount_get)");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$res = $query->result_array();
			$ret["lost"] = $res[0]["total_lost"];
			$query = $this->db->query("select * from project_setting");
			$ps = $query->row_array();
			$ret["commission"] = $res[0]["total_lost"] * $ps["pay_fee"] / 100 + $res[0]["total_lost"] * $ps["project_listing_fee"] / 100;
			return $ret;
		}
		return 0;
	}

	public function get_total_pipeline() {

		$this->db->select("SUM(amount - amount_get) as total_pipeline");
		$this->db->from("project");
		$this->db->where("(active='1') AND (amount > amount_get)");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$res = $query->result_array();
			$ret["pipeline"] = $res[0]["total_pipeline"];
			$query = $this->db->query("select * from project_setting");
			$ps = $query->row_array();
			$ret["commission"] = $res[0]["total_pipeline"] * $ps["pay_fee"] / 100 + $res[0]["total_pipeline"] * $ps["project_listing_fee"] / 100;
			return $ret;
		}
		return 0;
	}

	public function get_total_pipeline_month() {

		$start = date("Y") . "-" . date("m") . "-1";
		$month = date("m");
		$year = date("Y");
		$month++;
		if ($month > 12)
		{
			$month = 1;
			$year++;
		}
		$end = $year . "-" . $month . "-1";
		$this->db->select("SUM(amount - amount_get) as total_pipeline");
		$this->db->from("project");
		$this->db->where("(active=\"1\") AND (date_added between \"" . $start . "\" AND \"" . $end . "\") AND (amount > amount_get)");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$res = $query->result_array();
			$ret["pipeline"] = $res[0]["total_pipeline"];
			$query = $this->db->query("select * from project_setting");
			$ps = $query->row_array();
			$ret["commission"] = $res[0]["total_pipeline"] * $ps["pay_fee"] / 100 + $res[0]["total_pipeline"] * $ps["project_listing_fee"] / 100;
			return $ret;
		}
		return 0;
	}

	public function get_total_pipeline_week() {

		$tm = time();
		$day_of_week = date("l", $tm);
		while ($day_of_week != "Monday")
		{
			$tm -= 24 * 3600;
			$day_of_week = date("l", $tm);
			continue;
		}
		$starttemp = mktime(0, 0, 0, date("m", $tm), date("d", $tm), date("Y", $tm));
		$endtemp = $starttemp + 7 * 24 * 3600 - 1;
		$start = date("Y-m-d", $starttemp);
		$end = date("Y-m-d", $endtemp);
		$this->db->select("SUM(amount - amount_get) as total_pipeline");
		$this->db->from("project");
		$this->db->where("(active=\"1\") AND (date_added between \"" . $start . "\" AND \"" . $end . "\") AND (amount > amount_get)");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$res = $query->result_array();
			$ret["pipeline"] = $res[0]["total_pipeline"];
			$query = $this->db->query("select * from project_setting");
			$ps = $query->row_array();
			$ret["commission"] = $res[0]["total_pipeline"] * $ps["pay_fee"] / 100 + $res[0]["total_pipeline"] * $ps["project_listing_fee"] / 100;
			return $ret;
		}
		return 0;
	}

	public function get_total_pipeline_today() {

		$start = date("Y-m-d");
		$end = date("Y-m-d");
		$this->db->select("SUM(amount - amount_get) as total_pipeline");
		$this->db->from("project");
		$this->db->where("(active=\"1\") AND (date_added between \"" . $start . "\" AND \"" . $end . "\") AND (amount > amount_get)");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$res = $query->result_array();
			$ret["pipeline"] = $res[0]["total_pipeline"];
			$query = $this->db->query("select * from project_setting");
			$ps = $query->row_array();
			$ret["commission"] = $res[0]["total_pipeline"] * $ps["pay_fee"] / 100 + $res[0]["total_pipeline"] * $ps["project_listing_fee"] / 100;
			return $ret;
		}
		return 0;
	}

	public function get_live_project() {

		$query = $this->db->query("select project.*, user.*, project_category.*, t.total_amount, t.total_listing_fee, t.total_pay_fee from project left join user on project.user_id=user.user_id left join project_category on project.category_id=project_category.project_category_id left join (select project_id, SUM(amount) as total_amount, SUM(listing_fee) as total_listing_fee, SUM(pay_fee) as total_pay_fee from transaction group by project_id) t on project.project_id=t.project_id where project.active='1' order by project.date_added DESC, project.project_id DESC limit 10");
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		return 0;
	}

	public function get_latest_project($offset) {

		$this->db->select("project.*,user.paypal_email,user.user_name,user.last_name,user.email,project_category.project_category_name,project_status.project_status_name");
		$this->db->from("project");
		$this->db->join("user", "project.user_id= user.user_id", "left");
		$this->db->join("project_category", "project.category_id= project_category.project_category_id", "left");
		$this->db->join("project_status", "project.status= project_status.project_status_id", "left");
		$this->db->order_by("project.date_added", "desc");
		$this->db->limit(8, $offset);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		return 0;
	}

	public function get_latest_project_count() {

		$this->db->select("project.*,user.user_name,user.last_name,user.email,project_category.project_category_name,project_status.project_status_name");
		$this->db->from("project");
		$this->db->join("user", "project.user_id= user.user_id", "left");
		$this->db->join("project_category", "project.category_id= project_category.project_category_id", "left");
		$this->db->join("project_status", "project.status= project_status.project_status_id", "left");
		$this->db->order_by("project.date_added", "desc");
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function get_total_project_comment_count($id) {

		$this->db->select("*");
		$this->db->from("comment");
		$this->db->join("project", "comment.project_id= project.project_id");
		$this->db->where("project.project_id", $id);
		$query = $this->db->get();
		return $this->db->count_all_results("comment");
	}

	public function get_project_comment_result($id, $offset, $limit) {

		$this->db->select("*");
		$this->db->from("comment");
		$this->db->join("project", "comment.project_id= project.project_id");
		$this->db->where("project.project_id", $id);
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function select_site_setting() {

		$query = $this->db->query("select * from site_setting");
		return $query->row_array();
	}

	public function my_account_update() {

		$data = array("username" => $this->input->post("username"), "password" => $this->input->post("password"), "email" => $this->input->post("email"));
		$this->db->where("admin_id", $this->input->post("admin_id"));
		$this->db->update("admin", $data);
		$admin_detail = $this->db->query("select * from admin where admin_id='" . $this->input->post("admin_id") . "'");
		$admin = $admin_detail->row();
		if ($admin->admin_type == "1")
		{
			$get_user = $this->db->query("select * from user where is_admin='1'");
			if ($get_user->num_rows() > 0)
			{
				$user = $get_user->row();
				$user_id = $user->user_id;
				$data = array("user_name" => $this->input->post("username"), "password" => $this->input->post("password"), "email" => $this->input->post("email"));
				$this->db->where("user_id", $user_id);
				$this->db->update("user", $data);
				return;
			}
			$insert = $this->db->query("insert into user(user_name,email,password,active,signup_ip,date_added,is_admin)values('" . $this->input->post("username") . "','" . $this->input->post("email") . "','" . $this->input->post("password") . "','1','" . $_SERVER["REMOTE_ADDR"] . "','" . date("Y-m-d") . "','1')");
		}
		return;
	}

	public function get_my_account($aid) {

		$query = $this->db->query("select * from admin where admin_id='" . $aid . "'");
		return $query->row_array();
	}

};;


