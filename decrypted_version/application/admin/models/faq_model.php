<?php


class Faq_model extends CI_Model {

	public function Faq_model() {

		parent::__construct();
		return;
	}

	public function get_category() {

		$this->db->where("active", 1);
		$this->db->order_by("faq_name", "asc");
		$query = $this->db->get("faq");
		return $query->result();
	}

	public function get_faq_category($parent_id = 0) {

		global $tasks;
		$this->db->where("active", 1);
		$this->db->where("parent_id", $parent_id);
		$this->db->order_by("faq_category_name", "asc");
		$query = $this->db->get("faq_category");
		$res = $query->result();
		if ($res)
		{
			foreach ($res as $r)
			{
				$tasks[] = $r;
				$this->get_faq_category($r->faq_category_id);
				continue;
			}
		}
		return $tasks;
	}

	public function select_site_setting() {

		$query = $this->db->query("select * from site_setting");
		return $query->row_array();
	}

	public function faq_insert() {

		$data = array("faq_category_id" => $this->input->post("faq_category_id"), "question" => $this->input->post("question"), "answer" => $this->input->post("answer"), "active" => $this->input->post("active"), "faq_order" => $this->input->post("faq_order"), "faq_home" => $this->input->post("faq_home"), "date_added" => date("Y-m-d H:i:s"));
		$this->db->insert("faq", $data);
		return;
	}

	public function faq_update() {

		$data = array("faq_category_id" => $this->input->post("faq_category_id"), "question" => $this->input->post("question"), "answer" => $this->input->post("answer"), "active" => $this->input->post("active"), "faq_order" => $this->input->post("faq_order"), "faq_home" => $this->input->post("faq_home"), "date_added" => date("Y-m-d H:i:s"));
		$this->db->where("faq_id", $this->input->post("faq_id"));
		$this->db->update("faq", $data);
		return;
	}

	public function get_one_faq($id) {

		$query = $this->db->get_where("faq", array("faq_id" => $id));
		return $query->row_array();
	}

	public function get_total_faq_count() {

		return $this->db->count_all("faq");
	}

	public function get_faq_result($offset, $limit) {

		$this->db->order_by("faq_id", "desc");
		$query = $this->db->get("faq", $limit, $offset);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function get_total_search_faq_count($option, $keyword) {

		$keyword = str_replace("\"", "", str_replace(array("'", ",", "%", '' . "\$", "&", "*", "#", "(", ")", ":", ";", ">", "<", "/"), "", $keyword));
		$this->db->select("faq.*,faq_category.faq_category_name");
		$this->db->from("faq");
		$this->db->join("faq_category", "faq.faq_category_id = faq_category.faq_category_id", "left");
		if ($option == "category")
		{
			$this->db->like("faq_category.faq_category_name", $keyword);
			if (substr_count($keyword, " ") >= 1)
			{
				$ex = explode(" ", $keyword);
				foreach ($ex as $val)
				{
					$this->db->like("faq_category.faq_category_name", $val);
					continue;
				}
			}
		}
		$this->db->order_by("faq.faq_id", "desc");
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function get_search_faq_result($option, $keyword, $offset, $limit) {

		$this->db->select("faq.*,faq_category.faq_category_name");
		$this->db->from("faq");
		$this->db->join("faq_category", "faq.faq_category_id= faq_category.faq_category_id", "left");
		if ($option == "category")
		{
			$this->db->like("faq_category.faq_category_name", $keyword);
			if (substr_count($keyword, " ") >= 1)
			{
				$ex = explode(" ", $keyword);
				foreach ($ex as $val)
				{
					$this->db->like("faq_category.faq_category_name", $val);
					continue;
				}
			}
		}
		$this->db->order_by("faq.faq_id", "desc");
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

};;


