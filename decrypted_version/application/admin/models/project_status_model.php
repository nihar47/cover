<?php


class Project_status_model extends CI_Model {

	public function Project_status_model() {

		parent::__construct();
		return;
	}

	public function project_status_insert() {

		$data = array("project_status_name" => $this->input->post("project_status_name"));
		$this->db->insert("project_status", $data);
		return;
	}

	public function project_status_update() {

		$data = array("project_status_name" => $this->input->post("project_status_name"));
		$this->db->where("project_status_id", $this->input->post("project_status_id"));
		$this->db->update("project_status", $data);
		return;
	}

	public function get_one_project_status($id) {

		$query = $this->db->get_where("project_status", array("project_status_id" => $id));
		return $query->row_array();
	}

	public function get_total_project_status_count() {

		return $this->db->count_all("project_status");
	}

	public function get_project_status_result($offset, $limit) {

		$query = $this->db->get("project_status", $limit, $offset);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

};;


