<?php


class State_model extends CI_Model {

	public function State_model() {

		parent::__construct();
		return;
	}

	public function state_insert() {

		$data = array("country_id" => $this->input->post("country_id"), "state_name" => $this->input->post("state_name"), "active" => $this->input->post("active"));
		$this->db->insert("state", $data);
		return;
	}

	public function state_update() {

		$data = array("country_id" => $this->input->post("country_id"), "state_name" => $this->input->post("state_name"), "active" => $this->input->post("active"));
		$this->db->where("state_id", $this->input->post("state_id"));
		$this->db->update("state", $data);
		return;
	}

	public function get_one_state($id) {

		$query = $this->db->get_where("state", array("state_id" => $id));
		return $query->row_array();
	}

	public function get_total_state_count() {

		return $this->db->count_all("state");
	}

	public function get_state_result($offset, $limit) {

		$this->db->select("state.state_id, \r
						   state.country_id,\r
						   state.state_name, \r
						  \r
						   state.active, \r
						   country.country_name");
		$this->db->from("state");
		$this->db->join("country", "state.country_id= country.country_id", "left");
		$this->db->order_by("state.state_name", "asc");
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function get_country_result() {

		$query = $this->db->get("country");
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function get_total_search_state_count($option, $keyword) {

		$keyword = str_replace("\"", "", str_replace(array("'", ",", "%", '' . "\$", "&", "*", "#", "(", ")", ":", ";", ">", "<", "/"), "", $keyword));
		$this->db->select("state.*,country.country_name");
		$this->db->from("state");
		$this->db->join("country", "state.state_id = country.country_id", "left");
		if ($option == "statename")
		{
			$this->db->like("state.state_name", $keyword);
			if (substr_count($keyword, " ") >= 1)
			{
				$ex = explode(" ", $keyword);
				foreach ($ex as $val)
				{
					$this->db->like("state.state_name", $val);
					continue;
				}
			}
		}
		if ($option == "countryname")
		{
			$this->db->like("country.country_name", $keyword);
			if (substr_count($keyword, " ") >= 1)
			{
				$ex = explode(" ", $keyword);
				foreach ($ex as $val)
				{
					$this->db->like("country.country_name", $val);
					continue;
				}
			}
		}
		$this->db->order_by("state.state_id", "desc");
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function get_search_state_result($option, $keyword, $offset, $limit) {

		$keyword = str_replace("\"", "", str_replace(array("'", ",", "%", '' . "\$", "&", "*", "#", "(", ")", ":", ";", ">", "<", "/"), "", $keyword));
		$this->db->select("state.*,country.country_name");
		$this->db->from("state");
		$this->db->join("country", "state.country_id = country.country_id", "left");
		if ($option == "statename")
		{
			$this->db->like("state.state_name", $keyword);
			if (substr_count($keyword, " ") >= 1)
			{
				$ex = explode(" ", $keyword);
				foreach ($ex as $val)
				{
					$this->db->like("state.state_name", $val);
					continue;
				}
			}
		}
		if ($option == "countryname")
		{
			$this->db->like("country.country_name", $keyword);
			if (substr_count($keyword, " ") >= 1)
			{
				$ex = explode(" ", $keyword);
				foreach ($ex as $val)
				{
					$this->db->like("country.country_name", $val);
					continue;
				}
			}
		}
		$this->db->order_by("state.state_id", "desc");
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

};;


