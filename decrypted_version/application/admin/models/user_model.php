<?php


class User_model extends CI_Model {

	public function User_model() {

		parent::__construct();
		return;
	}

	public function delete_user($id) {

		$chk_user_login = $this->db->query("select * from user_login where user_id='" . $id . "'");
		if ($chk_user_login->num_rows() > 0)
		{
			$this->db->delete("user_login", array("user_id" => $id));
		}
		$chk_user_notify = $this->db->query("select * from user_notification where user_id='" . $id . "'");
		if ($chk_user_notify->num_rows() > 0)
		{
			$this->db->delete("user_notification", array("user_id" => $id));
		}
		$chk_user_wallet = $this->db->query("select * from wallet where user_id='" . $id . "'");
		if ($chk_user_wallet->num_rows() > 0)
		{
			$this->db->delete("wallet", array("user_id" => $id));
		}
		$chk_user_wallet_withdraw = $this->db->query("select * from wallet_withdraw where user_id='" . $id . "'");
		if ($chk_user_wallet_withdraw->num_rows() > 0)
		{
			$withdraw = $chk_user_wallet_withdraw->result();
			foreach ($withdraw as $wdraw)
			{
				$chk_bank_details = $this->db->query("select * from wallet_bank where withdraw_id='" . $wdraw->withdraw_id . "'");
				if ($chk_bank_details->num_rows() > 0)
				{
					$this->db->delete("wallet_bank", array("withdraw_id" => $wdraw->withdraw_id));
				}
				$chk_gateway_details = $this->db->query("select * from wallet_withdraw_gateway where withdraw_id='" . $wdraw->withdraw_id . "'");
				if ($chk_gateway_details->num_rows() > 0)
				{
					$this->db->delete("wallet_withdraw_gateway", array("withdraw_id" => $wdraw->withdraw_id));
				}
				$this->db->delete("wallet_withdraw", array("withdraw_id" => $wdraw->withdraw_id));
				continue;
			}
		}
		$this->db->delete("user", array("user_id" => $id));
		return;
	}

	public function get_email_notification($id) {

		$query = $this->db->query("select * from user_notification where user_id='" . $id . "'");
		if ($query->num_rows() > 0)
		{
			return $query->row();
		}
		return 0;
	}

	public function chk_user_project($user_id) {

		$chk = "0";
		$chk_project = $this->db->query("select * from project where user_id='" . $user_id . "'");
		if ($chk_project->num_rows() > 0)
		{
			$chk = "1";
		}
		$chk_backers = $this->db->query("select * from transaction where user_id='" . $user_id . "'");
		if ($chk_backers->num_rows() > 0)
		{
			$chk = "1";
		}
		$chk_comment = $this->db->query("select * from comment where user_id='" . $user_id . "'");
		if ($chk_comment->num_rows() > 0)
		{
			$chk = "1";
		}
		if ($chk == "1" || $chk == 1)
		{
			return 1;
		}
		return 0;
	}

	public function user_unique($str) {

		if ($this->input->post("user_id"))
		{
			$query = $this->db->get_where("user", array("user_id" => $this->input->post("user_id")));
			$res = $query->row_array();
			$email = $res["email"];
			$query = $this->db->query('' . "select email from user where email = '" . $str . "' and email != '" . $email . "'");
		}
		 else 
		{
			$query = $this->db->query('' . "select email from user where email = '" . $str . "'");
		}
		if ($query->num_rows() > 0)
		{
			return FALSE;
		}
		return TRUE;
	}

	public function user_insert() {

		$rs = site_setting();
		$city = "";
		$state = "";
		$country = "";
		$address = explode(",", $this->input->post("address"));
		$cnt = count($address);
		$fetch = $cnt - $rs["address_limit"];
		if (count($address) <= $fetch || $fetch <= 0)
		{
			if (isset($address[$cnt - 3]))
			{
				$city = $address[$cnt - 3];
			}
			if (isset($address[$cnt - 2]))
			{
				$state = $address[$cnt - 2];
			}
			if (isset($address[$cnt - 1]))
			{
				$country = $address[$cnt - 1];
			}
		}
		 else 
		{
			$city = $address[$fetch];
			$state = $address[$fetch + 1];
			$country = $address[$fetch + 2];
		}
		$data = array("email" => $this->input->post("email"), "user_name" => $this->input->post("user_name"), "last_name" => $this->input->post("last_name"), "password" => $this->input->post("password"), "image" => $this->input->post("image"), "address" => $this->input->post("address"), "city" => $city, "state" => $state, "country" => $country, "paypal_email" => $this->input->post("paypal_email"), "signup_ip" => $_SERVER["REMOTE_ADDR"], "active" => $this->input->post("active"), "date_added" => date("Y-m-d H:i:s"), "user_about" => $this->input->post("user_about"), "facebook_url" => $this->input->post("facebook_url"), "twitter_url" => $this->input->post("twitter_url"), "linkedln_url" => $this->input->post("linkedln_url"), "googleplus_url" => $this->input->post("googleplus_url"), "bandcamp_url" => $this->input->post("bandcamp_url"), "youtube_url" => $this->input->post("youtube_url"), "myspace_url" => $this->input->post("myspace_url"));
		$this->db->insert("user", $data);
		$user_id = mysql_insert_id();
		$web = $this->add_website($user_id, $this->input->post("website"));
		$user_notification = mysql_query("SHOW COLUMNS FROM user_notification");
		$res = mysql_fetch_array($user_notification);
		$fields = "";
		$values = "";
		while ($res = mysql_fetch_array($user_notification))
		{
			if ($fields == "")
			{
				$fields .= "(`" . $res["Field"] . "`";
				$values .= "('" . $user_id . "'";
				continue;
			}
			$fields .= ",`" . $res["Field"] . "`";
			$values .= ",'1'";
			continue;
		}
		$fields .= ")";
		$values .= ")";
		$insert_val = $fields . " values " . $values;
		mysql_query("insert into user_notification " . $insert_val . "");
		return;
	}

	public function user_update() {

		$rs = site_setting();
		$city = "";
		$state = "";
		$country = "";
		$address = explode(",", $this->input->post("address"));
		$cnt = count($address);
		$fetch = $cnt - $rs["address_limit"];
		if (count($address) <= $fetch || $fetch <= 0)
		{
			if (isset($address[$cnt - 3]))
			{
				$city = $address[$cnt - 3];
			}
			if (isset($address[$cnt - 2]))
			{
				$state = $address[$cnt - 2];
			}
			if (isset($address[$cnt - 1]))
			{
				$country = $address[$cnt - 1];
			}
		}
		 else 
		{
			$city = $address[$fetch];
			$state = $address[$fetch + 1];
			$country = $address[$fetch + 2];
		}
		$data_12 = array("email" => $this->input->post("email"), "user_name" => $this->input->post("user_name"), "last_name" => $this->input->post("last_name"), "password" => $this->input->post("password"), "image" => $this->input->post("image"), "address" => $this->input->post("address"), "city" => $city, "state" => $state, "country" => $country, "paypal_email" => $this->input->post("paypal_email"), "active" => $this->input->post("active"), "user_about" => $this->input->post("user_about"), "facebook_url" => $this->input->post("facebook_url"), "twitter_url" => $this->input->post("twitter_url"), "linkedln_url" => $this->input->post("linkedln_url"), "googleplus_url" => $this->input->post("googleplus_url"), "bandcamp_url" => $this->input->post("bandcamp_url"), "youtube_url" => $this->input->post("youtube_url"), "myspace_url" => $this->input->post("myspace_url"));
		$this->db->where("user_id", $this->input->post("user_id"));
		$this->db->update("user", $data_12);
		if ($this->input->post("website") != "")
		{
			$web = $this->add_website($this->input->post("user_id"), $this->input->post("website"));
		}
		return;
	}

	public function get_one_user($id) {

		$query = $this->db->get_where("user", array("user_id" => $id));
		return $query->row_array();
	}

	public function get_total_user_count() {

		$this->db->where(array("user_name !=" => "", "last_name !=" => "", "email !=" => ""));
		$this->db->order_by("user_id", "desc");
		$query = $this->db->get("user");
		return $query->num_rows();
	}

	public function get_user_result($offset, $limit) {

		$this->db->where(array("user_name !=" => "", "last_name !=" => "", "email !=" => ""));
		$this->db->order_by("user_id", "desc");
		$query = $this->db->get("user", $limit, $offset);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function get_total_userlogin_count() {

		$this->db->select("user_login.user_id, \r
							user_login.login_id, \r
						   user_login.login_date_time, \r
						   user_login.login_ip, \r
						   user.user_id, \r
						   user.user_name");
		$this->db->from("user_login");
		$this->db->join("user", "user_login.user_id= user.user_id", "left");
		$this->db->order_by("user_login.login_id", "desc");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}

	public function get_total_search_user_count($option, $keyword) {

		$keyword = str_replace("\"", "", str_replace(array("'", ",", "%", '' . "\$", "&", "*", "#", "(", ")", ":", ";", ">", "<", "/"), "", $keyword));
		$this->db->where(array("user_name !=" => "", "last_name !=" => "", "email !=" => ""));
		$this->db->select("user.*");
		$this->db->from("user");
		if ($option == "username")
		{
			$this->db->like("user.user_name", $keyword);
			if (substr_count($keyword, " ") >= 1)
			{
				$ex = explode(" ", $keyword);
				foreach ($ex as $val)
				{
					$this->db->like("user.user_name", $val);
					continue;
				}
			}
		}
		if ($option == "email")
		{
			$this->db->like("user.email", $keyword);
			if (substr_count($keyword, " ") >= 1)
			{
				$ex = explode(" ", $keyword);
				foreach ($ex as $val)
				{
					$this->db->like("user.email", $val);
					continue;
				}
			}
		}
		if ($option == "city")
		{
			$this->db->like("user.city", $keyword);
			if (substr_count($keyword, " ") >= 1)
			{
				$ex = explode(" ", $keyword);
				foreach ($ex as $val)
				{
					$this->db->like("user.city", $val);
					continue;
				}
			}
		}
		if ($option == "state")
		{
			$this->db->like("user.state", $keyword);
			if (substr_count($keyword, " ") >= 1)
			{
				$ex = explode(" ", $keyword);
				foreach ($ex as $val)
				{
					$this->db->like("user.state", $val);
					continue;
				}
			}
		}
		if ($option == "country")
		{
			$this->db->like("user.country", $keyword);
			if (substr_count($keyword, " ") >= 1)
			{
				$ex = explode(" ", $keyword);
				foreach ($ex as $val)
				{
					$this->db->like("user.country", $val);
					continue;
				}
			}
		}
		$this->db->order_by("user.user_id", "desc");
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function get_search_user_result($option, $keyword, $offset, $limit) {

		$keyword = str_replace("\"", "", str_replace(array("'", ",", "%", '' . "\$", "&", "*", "#", "(", ")", ":", ";", ">", "<", "/"), "", $keyword));
		$this->db->where(array("user_name !=" => "", "last_name !=" => "", "email !=" => ""));
		$this->db->select("user.*");
		$this->db->from("user");
		if ($option == "username")
		{
			$this->db->like("user.user_name", $keyword);
			if (substr_count($keyword, " ") >= 1)
			{
				$ex = explode(" ", $keyword);
				foreach ($ex as $val)
				{
					$this->db->like("user.user_name", $val);
					continue;
				}
			}
		}
		if ($option == "email")
		{
			$this->db->like("user.email", $keyword);
			if (substr_count($keyword, " ") >= 1)
			{
				$ex = explode(" ", $keyword);
				foreach ($ex as $val)
				{
					$this->db->like("user.email", $val);
					continue;
				}
			}
		}
		if ($option == "city")
		{
			$this->db->like("user.city", $keyword);
			if (substr_count($keyword, " ") >= 1)
			{
				$ex = explode(" ", $keyword);
				foreach ($ex as $val)
				{
					$this->db->like("user.city", $val);
					continue;
				}
			}
		}
		if ($option == "state")
		{
			$this->db->like("user.state", $keyword);
			if (substr_count($keyword, " ") >= 1)
			{
				$ex = explode(" ", $keyword);
				foreach ($ex as $val)
				{
					$this->db->like("user.state", $val);
					continue;
				}
			}
		}
		if ($option == "country")
		{
			$this->db->like("user.country", $keyword);
			if (substr_count($keyword, " ") >= 1)
			{
				$ex = explode(" ", $keyword);
				foreach ($ex as $val)
				{
					$this->db->like("user.country", $val);
					continue;
				}
			}
		}
		$this->db->order_by("user.user_id", "desc");
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function get_userlogin_result($offset, $limit) {

		$this->db->select("user_login.user_id, \r
							user_login.login_id, \r
						   user_login.login_date_time, \r
						   user_login.login_ip, \r
						   user.user_id, \r
						   user.user_name");
		$this->db->from("user_login");
		$this->db->join("user", "user_login.user_id= user.user_id", "left");
		$this->db->limit($limit, $offset);
		$this->db->order_by("user_login.login_id", "desc");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function add_website($id = null, $str = "") {

		$data1 = array("user_id" => $id, "website_name" => $str);
		$this->db->insert("user_website", $data1);
		return mysql_insert_id();
	}

	public function get_website($id = null) {

		$query = $this->db->get_where("user_website", array("user_id" => $id));
		return $query->result_array();
	}

	public function delete_website($user_id = null, $id = "") {

		$this->db->where(array("user_id" => $user_id, "website_id" => $id));
		$query = $this->db->delete("user_website");
	}

};;


