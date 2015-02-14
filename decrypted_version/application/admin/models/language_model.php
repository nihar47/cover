<?php


class Language_model extends CI_Model {

	public function Language_model() {

		parent::__construct();
		return;
	}

	public function language_insert() {

		$data = array("language_name" => $this->input->post("language_name"), "iso2" => $this->input->post("iso2"), "iso3" => $this->input->post("iso3"), "active" => $this->input->post("active"));
		$this->db->insert("language", $data);
		return;
	}

	public function language_update() {

		$data = array("language_name" => $this->input->post("language_name"), "iso2" => $this->input->post("iso2"), "iso3" => $this->input->post("iso3"), "active" => $this->input->post("active"));
		$this->db->where("language_id", $this->input->post("language_id"));
		$this->db->update("language", $data);
		return;
	}

	public function get_one_language($id) {

		$query = $this->db->get_where("language", array("language_id" => $id));
		return $query->row_array();
	}

	public function get_total_language_count() {

		return $this->db->count_all("language");
	}

	public function get_language_result($offset, $limit) {

		$query = $this->db->get("language", $limit, $offset);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

};;


