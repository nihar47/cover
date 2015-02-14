<?php


class Yahoo_setting_model extends CI_Model {

	public function Yahoo_setting_model() {

		parent::__construct();
		return;
	}

	public function yahoo_setting_update() {

		$data = array("consumer_key" => $this->input->post("consumer_key"), "consumer_secret" => $this->input->post("consumer_secret"), "yahoo_enable" => $this->input->post("yahoo_enable"));
		$this->db->where("yahoo_setting_id", $this->input->post("yahoo_setting_id"));
		$this->db->update("yahoo_setting", $data);
		return;
	}

	public function get_one_yahoo_setting() {

		$query = $this->db->get_where("yahoo_setting");
		return $query->row();
	}

};;


