<?php


class City_model extends CI_Model {

	public function City_model() {

		parent::__construct();
		return;
	}

	public function city_insert() {

		$data = array("country_id" => $this->input->post("country_id"), "state_id" => $this->input->post("state_id"), "city_name" => $this->input->post("city_name"), "active" => $this->input->post("active"));
		$this->db->insert("city", $data);
		return;
	}

	public function city_update() {

		$data = array("country_id" => $this->input->post("country_id"), "state_id" => $this->input->post("state_id"), "city_name" => $this->input->post("city_name"), "active" => $this->input->post("active"));
		$this->db->where("city_id", $this->input->post("city_id"));
		$this->db->update("city", $data);
		return;
	}

	public function get_one_city($id) {

		$query = $this->db->get_where("city", array("city_id" => $id));
		return $query->row_array();
	}

	public function get_total_city_count() {

		return $this->db->count_all("city");
	}

	public function get_city_result($offset, $limit) {

		$this->db->select("city.city_id, \r
						   city.state_id,\r
						   city.country_id,\r
						   city.city_name, \r
						  \r
						   city.active, \r
						   state.state_name,\r
						   country.country_name");
		$this->db->from("city");
		$this->db->join("state", "city.state_id= state.state_id", "left");
		$this->db->join("country", "city.country_id= country.country_id", "left");
		$this->db->order_by("city.city_name", "asc");
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

	public function get_state_result() {

		$query = $this->db->get("state");
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function get_total_search_city_count($option, $keyword) {

		$keyword = str_replace("\"", "", str_replace(array("'", ",", "%", '' . "\$", "&", "*", "#", "(", ")", ":", ";", ">", "<", "/"), "", $keyword));
		$this->db->select("city.*,country.country_name,state.state_name");
		$this->db->from("city");
		$this->db->join("state", "city.state_id = state.state_id", "left");
		$this->db->join("country", "city.country_id = country.country_id", "left");
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
		if ($option == "cityname")
		{
			$this->db->like("city.city_name", $keyword);
			if (substr_count($keyword, " ") >= 1)
			{
				$ex = explode(" ", $keyword);
				foreach ($ex as $val)
				{
					$this->db->like("city.city_name", $val);
					continue;
				}
			}
		}
		$this->db->order_by("city.city_id", "desc");
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function get_search_city_result($option, $keyword, $offset, $limit) {

		$keyword = str_replace("\"", "", str_replace(array("'", ",", "%", '' . "\$", "&", "*", "#", "(", ")", ":", ";", ">", "<", "/"), "", $keyword));
		$this->db->select("city.*,country.country_name,state.state_name");
		$this->db->from("city");
		$this->db->join("state", "city.state_id = state.state_id", "left");
		$this->db->join("country", "city.country_id = country.country_id", "left");
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
		if ($option == "cityname")
		{
			$this->db->like("city.city_name", $keyword);
			if (substr_count($keyword, " ") >= 1)
			{
				$ex = explode(" ", $keyword);
				foreach ($ex as $val)
				{
					$this->db->like("city.city_name", $val);
					continue;
				}
			}
		}
		$this->db->order_by("city.city_id", "desc");
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

};;


