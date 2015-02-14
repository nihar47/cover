<?php


class Project_flag_model extends CI_Model {

	public function Project_flag_model() {

		parent::__construct();
		return;
	}

	public function project_flag_insert() {

		$data = array("project_flag_name" => $this->input->post("project_flag_name"), "active" => $this->input->post("active"));
		$this->db->insert("project_flag", $data);
		return;
	}

	public function project_flag_update() {

		$data = array("project_flag_name" => $this->input->post("project_flag_name"), "active" => $this->input->post("active"));
		$this->db->where("project_flag_id", $this->input->post("project_flag_id"));
		$this->db->update("project_flag", $data);
		return;
	}

	public function get_one_project_flag($id) {

		$query = $this->db->get_where("project_flag", array("project_flag_id" => $id));
		return $query->row_array();
	}

	public function get_total_project_flag_count() {

		return $this->db->count_all("project_flag");
	}

	public function get_project_flag_result($offset, $limit) {

		$this->db->order_by("project_flag_id", "desc");
		$query = $this->db->get("project_flag", $limit, $offset);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

};;


