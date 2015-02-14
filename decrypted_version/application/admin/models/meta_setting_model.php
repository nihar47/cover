<?php


class Meta_setting_model extends CI_Model {

	public function Meta_setting_model() {

		parent::__construct();
		return;
	}

	public function meta_setting_update() {

		$data = array("title" => $this->input->post("title"), "meta_keyword" => $this->input->post("meta_keyword"), "meta_description" => $this->input->post("meta_description"));
		$this->db->where("meta_setting_id", $this->input->post("meta_setting_id"));
		$this->db->update("meta_setting", $data);
		return;
	}

	public function get_one_meta_setting() {

		$query = $this->db->get_where("meta_setting");
		return $query->row_array();
	}

};;


