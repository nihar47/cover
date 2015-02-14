<?php


class College_model extends CI_Model {

	public function College_model() {

		parent::__construct();
		return;
	}

	public function college_insert() {

		$data = array("college_name" => $this->input->post("college_name"), "active" => $this->input->post("active"));
		$this->db->insert("college", $data);
		return;
	}

	public function college_update() {

		$data = array("college_name" => $this->input->post("college_name"), "active" => $this->input->post("active"));
		$this->db->where("college_id", $this->input->post("college_id"));
		$this->db->update("college", $data);
		return;
	}

	public function get_one_college($id) {

		$query = $this->db->get_where("college", array("college_id" => $id));
		return $query->row_array();
	}

	public function get_total_college_count() {

		return $this->db->count_all("college");
	}

	public function get_college_result($offset, $limit) {

		$this->db->order_by("college_id", "desc");
		$query = $this->db->get("college", $limit, $offset);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

};;


