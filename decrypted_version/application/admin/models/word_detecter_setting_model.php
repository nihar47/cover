<?php


class Word_detecter_setting_model extends CI_Model {

	public function Word_detecter_setting_model() {

		parent::__construct();
		return;
	}

	public function word_detecter_setting_update() {

		$data = array("enable_word_detecter" => $this->input->post("enable_word_detecter"), "words" => $this->input->post("words"));
		$this->db->where("word_detecter_setting_id", $this->input->post("word_detecter_setting_id"));
		$this->db->update("word_detecter_setting", $data);
		return;
	}

	public function get_one_word_detecter_setting() {

		$query = $this->db->get_where("word_detecter_setting");
		return $query->row_array();
	}

};;


