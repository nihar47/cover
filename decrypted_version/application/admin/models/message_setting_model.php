<?php


class Message_setting_model extends CI_Model {

	public function Message_setting_model() {

		parent::__construct();
		return;
	}

	public function message_setting_update() {

		$data = array("email_admin_on_new_message" => $this->input->post("email_admin_on_new_message"), "email_user_on_new_message" => $this->input->post("email_user_on_new_message"), "default_message_subject" => $this->input->post("default_message_subject"), "message_enable" => $this->input->post("message_enable"));
		$this->db->where("message_setting_id", $this->input->post("message_setting_id"));
		$this->db->update("message_setting", $data);
		return;
	}

	public function get_one_message_setting() {

		$query = $this->db->get_where("message_setting");
		return $query->row_array();
	}

};;


