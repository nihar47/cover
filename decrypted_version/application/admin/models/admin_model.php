<?php


class Admin_model extends CI_Model {

	public function Admin_model() {

		parent::__construct();
		return;
	}

	public function user_unique($str) {

		if ($this->input->post("admin_id"))
		{
			$query = $this->db->get_where("admin", array("admin_id" => $this->input->post("admin_id")));
			$res = $query->row_array();
			$email = $res["username"];
			$query = $this->db->query('' . "select username from admin where username = '" . $str . "' and admin_id!='" . $this->input->post("admin_id") . "'");
		}
		 else 
		{
			$query = $this->db->query('' . "select username from admin where username = '" . $str . "'");
		}
		if ($query->num_rows() > 0)
		{
			return FALSE;
		}
		return TRUE;
	}

	public function email_unique($str) {

		if ($this->input->post("admin_id"))
		{
			$query = $this->db->get_where("admin", array("admin_id" => $this->input->post("admin_id")));
			$res = $query->row_array();
			$email = $res["email"];
			$query = $this->db->query('' . "select username from admin where email = '" . $str . "' and admin_id!='" . $this->input->post("admin_id") . "'");
		}
		 else 
		{
			$query = $this->db->query('' . "select username from admin where email = '" . $str . "'");
		}
		if ($query->num_rows() > 0)
		{
			return FALSE;
		}
		return TRUE;
	}

	public function admin_insert() {

		$data = array("email" => $this->input->post("email"), "username" => $this->input->post("username"), "password" => $this->input->post("password"), "admin_type" => $this->input->post("admin_type"), "login_ip" => $_SERVER["REMOTE_ADDR"], "active" => $this->input->post("active"), "date_added" => date("Y-m-d"));
		$this->db->insert("admin", $data);
		return;
	}

	public function admin_update() {

		$data = array("email" => $this->input->post("email"), "username" => $this->input->post("username"), "password" => $this->input->post("password"), "admin_type" => $this->input->post("admin_type"), "login_ip" => $_SERVER["REMOTE_ADDR"], "active" => $this->input->post("active"), "date_added" => date("Y-m-d"));
		$this->db->where("admin_id", $this->input->post("admin_id"));
		$this->db->update("admin", $data);
		return;
	}

	public function admin_insert_ip() {

		$data = array("email" => $this->input->post("email"), "username" => $this->input->post("username"), "password" => $this->input->post("password"), "admin_type" => $this->input->post("admin_type"), "login_ip" => $this->input->post("login_ip"), "active" => $this->input->post("active"), "date_added" => date("Y-m-d"));
		$this->db->insert("admin", $data);
		$CI = &get_instance();
		$base_url = $CI->config->slash_item("base_url_site");
		$base_path = $CI->config->slash_item("base_path");
		$file = $base_path . "admin/.htaccess";
		$put_content = "allow from " . $this->input->post("login_ip");
		$fh = fopen($file, "r");
		$content = "";
		while (!(feof($fh)))
		{
			$content .= fgets($fh) . "<br/>";
			continue;
		}
		$content = $content . " " . $put_content;
		$content = str_replace("<br/>", "", $content);
		$new_content = $content;
		$fw = fopen($file, "w");
		fwrite($fw, "");
		fwrite($fw, $new_content);
		fclose($fw);
		fclose($fh);
		return;
	}

	public function admin_update_ip() {

		$get_details = $this->db->query("select * from admin where admin_id='" . $this->input->post("admin_id") . "'");
		$user_detail = $get_details->row();
		$orig_login_ip = $user_detail->login_ip;
		$content_original = "allow from " . $orig_login_ip;
		$CI = &get_instance();
		$base_url = $CI->config->slash_item("base_url_site");
		$base_path = $CI->config->slash_item("base_path");
		$file = $base_path . "admin/.htaccess";
		$content_replace = "allow from " . $this->input->post("login_ip");
		$fh = fopen($file, "r");
		$content = "";
		while (!(feof($fh)))
		{
			$content .= fgets($fh) . "<br/>";
			continue;
		}
		$content = str_replace($content_original, $content_replace, $content);
		$content = str_replace("<br/>", "", $content);
		$fw = fopen($file, "w");
		fwrite($fw, "");
		fwrite($fw, $content);
		fclose($read_file);
		$data = array("email" => $this->input->post("email"), "username" => $this->input->post("username"), "password" => $this->input->post("password"), "admin_type" => $this->input->post("admin_type"), "login_ip" => $this->input->post("login_ip"), "active" => $this->input->post("active"), "date_added" => date("Y-m-d"));
		$this->db->where("admin_id", $this->input->post("admin_id"));
		$this->db->update("admin", $data);
		return;
	}

	public function get_one_admin($id) {

		$query = $this->db->get_where("admin", array("admin_id" => $id));
		return $query->row_array();
	}

	public function get_total_admin_count() {

		return $this->db->count_all("admin");
	}

	public function get_admin_result($offset, $limit) {

		$this->db->order_by("admin_id", "desc");
		$query = $this->db->get("admin", $limit, $offset);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function get_total_superadmin_count() {

		$query = $this->db->query("select * from admin where admin_type = '1'");
		return $query->num_rows();
	}

	public function get_superadmin_result() {

		$query = $this->db->query("select * from admin where admin_type = '1'");
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function get_total_adninistrator_admin_count() {

		$query = $this->db->query("select * from admin where admin_type = '2'");
		return $query->num_rows();
	}

	public function get_adninistrator_result() {

		$query = $this->db->query("select * from admin where admin_type = '2'");
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function get_total_adminlogin_count() {

		$query = $this->db->query("select a.username,a.password,a.admin_type,a.email,ad.* from admin_login ad left join admin a on ad.admin_id=a.admin_id order by ad.login_id desc");
		return $query->num_rows();
	}

	public function get_adminlogin_result($offset, $limit) {

		$query = $this->db->query("select a.username,a.password,a.admin_type,a.email,ad.* from admin_login ad left join admin a on ad.admin_id=a.admin_id order by ad.login_id desc");
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function get_total_search_admin_count($option, $keyword) {

		$keyword = str_replace("\"", "", str_replace(array("'", ",", "%", '' . "\$", "&", "*", "#", "(", ")", ":", ";", ">", "<", "/"), "", $keyword));
		$this->db->select("admin.*");
		$this->db->from("admin");
		if ($option == "username")
		{
			$this->db->like("username", $keyword);
			if (substr_count($keyword, " ") >= 1)
			{
				$ex = explode(" ", $keyword);
				foreach ($ex as $val)
				{
					$this->db->like("username", $val);
					continue;
				}
			}
		}
		if ($option == "email")
		{
			$this->db->like("email", $keyword);
			if (substr_count($keyword, " ") >= 1)
			{
				$ex = explode(" ", $keyword);
				foreach ($ex as $val)
				{
					$this->db->like("email", $val);
					continue;
				}
			}
		}
		if ($option == "admintype")
		{
			$this->db->like("admintype", $keyword);
			if (substr_count($keyword, " ") >= 1)
			{
				$ex = explode(" ", $keyword);
				foreach ($ex as $val)
				{
					$this->db->like("admintype", $val);
					continue;
				}
			}
		}
		$this->db->order_by("admin_id", "desc");
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function get_search_admin_result($option, $keyword, $offset, $limit) {

		$keyword = str_replace("\"", "", str_replace(array("'", ",", "%", '' . "\$", "&", "*", "#", "(", ")", ":", ";", ">", "<", "/"), "", $keyword));
		$this->db->select("admin.*");
		$this->db->from("admin");
		if ($option == "username")
		{
			$this->db->like("username", $keyword);
			if (substr_count($keyword, " ") >= 1)
			{
				$ex = explode(" ", $keyword);
				foreach ($ex as $val)
				{
					$this->db->like("username", $val);
					continue;
				}
			}
		}
		if ($option == "email")
		{
			$this->db->like("email", $keyword);
			if (substr_count($keyword, " ") >= 1)
			{
				$ex = explode(" ", $keyword);
				foreach ($ex as $val)
				{
					$this->db->like("email", $val);
					continue;
				}
			}
		}
		$this->db->order_by("admin_id", "desc");
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

};;


