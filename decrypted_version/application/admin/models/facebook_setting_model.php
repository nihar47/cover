<?php


class Facebook_setting_model extends CI_Model {

	public function Facebook_setting_model() {

		parent::__construct();
		return;
	}

	public function facebook_setting_update() {

		$data = array("facebook_application_id" => $this->input->post("facebook_application_id"), "facebook_login_enable" => $this->input->post("facebook_login_enable"), "facebook_api_key" => $this->input->post("facebook_api_key"), "facebook_secret_key" => $this->input->post("facebook_secret_key"), "facebook_user_autopost" => $this->input->post("facebook_user_autopost"), "facebook_wall_post" => $this->input->post("facebook_wall_post"), "facebook_url" => $this->input->post("facebook_url"));
		$this->db->where("facebook_setting_id", $this->input->post("facebook_setting_id"));
		$this->db->update("facebook_setting", $data);
		return;
	}

	public function get_one_facebook_setting() {

		$query = $this->db->get_where("facebook_setting");
		return $query->row_array();
	}

};;


