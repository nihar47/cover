<?php
class Enquiries_model extends CI_Model {

	public function Enquiries_model() {

		parent::__construct();
		return;
	}

	public function get_total_enquiries_count() {

		$query = $this->db->query("select * from contact_tbl");
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}

	public function get_enquiries_result($offset, $limit) {

		$query = $this->db->query("select * from contact_tbl order by id Asc limit " . $limit . " offset " . $offset . "");
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function get_enquiries_detail($message_id) {

		$query = $this->db->query("select * from contact_tbl where id='" . $message_id . "'");
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function get_total_search_enquiries_count($option, $keyword) {

		if ($option != "name" || $option != "email")
		{
			$keyword = str_replace("\"", "", str_replace(array("'", ",", "%", '' . "\$", "&", "*", "#", "@", "(", ")", ":", ";", ">", "<", "/"), "", $keyword));
		}
		$this->db->select("*");
		$this->db->from("contact_tbl");
		
		if ($option == "all")
		{
			redirect("enquiries/list_enquiries");
		}
		if ($option == "name")
		{
			$this->db->like("name", $keyword);
			$this->db->or_like("lname", $keyword);
			if (substr_count($keyword, " ") >= 1)
			{
				$ex = explode(" ", $keyword);
				foreach ($ex as $val)
				{
					$this->db->or_like("name", $val);
					$this->db->or_like("lname", $val);
					continue;
				}
			}
		}
		if ($option == "email")
		{
			$this->db->like("email", $keyword);
			if (substr_count($keyword, " ") >= 1)
			{
				$ex = explode(" ", $keyword);
				foreach ($ex as $val)
				{
					$this->db->or_like("email", $val);
					continue;
				}
			}
		}
		$this->db->order_by("id", "desc");
		$query = $this->db->get();
		
		return $query->num_rows();
	}

	public function get_search_enquiries_result($option, $keyword, $offset, $limit) {

	if ($option != "name" || $option != "email")
		{
			$keyword = str_replace("\"", "", str_replace(array("'", ",", "%", '' . "\$", "&", "*", "#", "@", "(", ")", ":", ";", ">", "<", "/"), "", $keyword));
		}
		$this->db->select("*");
		$this->db->from("contact_tbl");
		
		if ($option == "all")
		{
			redirect("enquiries/list_enquiries");
		}
		if ($option == "name")
		{
			$this->db->like("name", $keyword);
			$this->db->or_like("lname", $keyword);
			if (substr_count($keyword, " ") >= 1)
			{
				$ex = explode(" ", $keyword);
				foreach ($ex as $val)
				{
					$this->db->or_like("name", $val);
					$this->db->or_like("lname", $val);
					continue;
				}
			}
		}
		if ($option == "email")
		{
			$this->db->like("email", $keyword);
			if (substr_count($keyword, " ") >= 1)
			{
				$ex = explode(" ", $keyword);
				foreach ($ex as $val)
				{
					$this->db->or_like("email", $val);
					continue;
				}
			}
		}
		$this->db->order_by("id", "desc");
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			print_r($query->result()); 
		}
		return 0;
	}

};;


