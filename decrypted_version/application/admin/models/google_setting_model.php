<?php


class Google_setting_model extends CI_Model {

	public function Google_setting_model() {

		parent::__construct();
		return;
	}

	public function google_setting_update() {

		$data = array("consumer_key" => $this->input->post("consumer_key"), "consumer_secret" => $this->input->post("consumer_secret"), "google_enable" => $this->input->post("google_enable"));
		$this->db->where("google_setting_id", $this->input->post("google_setting_id"));
		$this->db->update("google_setting", $data);
		return;
	}

	public function get_one_google_setting() {

		$query = $this->db->get_where("google_setting");
		return $query->row();
	}

};;


