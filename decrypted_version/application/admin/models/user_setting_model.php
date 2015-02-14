<?php


class User_setting_model extends CI_Model {

	public function User_setting_model() {

		parent::__construct();
		return;
	}

	public function user_setting_update() {

		$data = array("login_with" => $this->input->post("login_with"), "admin_activation" => $this->input->post("admin_activation"), "email_varification" => $this->input->post("email_varification"), "auto_login" => $this->input->post("auto_login"), "notification_mail" => $this->input->post("notification_mail"), "welcome_mail" => $this->input->post("welcome_mail"), "password_change_logout" => $this->input->post("password_change_logout"), "enable_openid" => $this->input->post("enable_openid"), "user_switch_language" => $this->input->post("user_switch_language"));
		$this->db->where("user_setting_id", $this->input->post("user_setting_id"));
		$this->db->update("user_setting", $data);
		return;
	}

	public function get_one_user_setting() {

		$query = $this->db->get_where("user_setting");
		return $query->row_array();
	}

};;


