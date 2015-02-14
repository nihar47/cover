<?php


class Email_setting_model extends CI_Model {

	public function Email_setting_model() {

		parent::__construct();
		return;
	}

	public function email_setting_update() {

		$data = array("mailer" => $this->input->post("mailer"), "sendmail_path" => $this->input->post("sendmail_path"), "smtp_port" => $this->input->post("smtp_port"), "smtp_host" => $this->input->post("smtp_host"), "smtp_email" => $this->input->post("smtp_email"), "smtp_password" => $this->input->post("smtp_password"));
		$this->db->where("email_setting_id", $this->input->post("email_setting_id"));
		$this->db->update("email_setting", $data);
		return;
	}

	public function get_my_email_setting() {

		$query = $this->db->query("SELECT * FROM  `email_setting`");
		return $query->row_array();
	}

};;


