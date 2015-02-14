<?php


class Pages_model extends CI_Model {

	public function Pages_model() {

		parent::__construct();
		return;
	}

	public function pages_insert() {

		$data = array("pages_title" => $this->input->post("pages_title"), "description" => $this->input->post("description"), "slug" => $this->input->post("slug"), "active" => $this->input->post("active"), "meta_keyword" => $this->input->post("meta_keyword"), "meta_description" => $this->input->post("meta_description"), "header_bar" => $this->input->post("header_bar"), "footer_bar" => $this->input->post("footer_bar"),"about_bar" => $this->input->post("about_bar"),"assistance_bar" => $this->input->post("assistance_bar"), "left_side" => $this->input->post("left_side"), "right_side" => $this->input->post("right_side"), "external_link" => $this->input->post("external_link"));
		$this->db->insert("pages", $data);
		return;
	}

	public function pages_update() {

		$data = array("pages_title" => $this->input->post("pages_title"), "description" => $this->input->post("description"), "slug" => $this->input->post("slug"), "active" => $this->input->post("active"), "meta_keyword" => $this->input->post("meta_keyword"), "meta_description" => $this->input->post("meta_description"), "header_bar" => $this->input->post("header_bar"), "footer_bar" => $this->input->post("footer_bar"),"about_bar" => $this->input->post("about_bar"),"assistance_bar" => $this->input->post("assistance_bar"), "left_side" => $this->input->post("left_side"), "right_side" => $this->input->post("right_side"), "external_link" => $this->input->post("external_link"));
		$this->db->where("pages_id", $this->input->post("pages_id"));
		$this->db->update("pages", $data);
		return;
	}

	public function get_one_pages($id) {

		$query = $this->db->get_where("pages", array("pages_id" => $id));
		return $query->row_array();
	}

	public function get_total_pages_count() {

		$query = $this->db->query("select * from pages where pages_id not in ('6','7','14')");
		return $query->num_rows();
	}

	public function get_pages_result($offset, $limit) {

		$query = $this->db->query("select * from pages where pages_id not in ('6','7','14') order by pages_id desc LIMIT " . $limit . " OFFSET " . $offset . "");
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function get_total_search_pages_count($option, $keyword) {

		$keyword = str_replace("\"", "", str_replace(array("'", ",", "%", '' . "\$", "&", "*", "#", "(", ")", ":", ";", ">", "<", "/"), "", $keyword));
		$this->db->select("pages.*");
		$this->db->from("pages");
		if ($option == "title")
		{
			$this->db->like("pages.pages_title", $keyword);
			if (substr_count($keyword, " ") >= 1)
			{
				$ex = explode(" ", $keyword);
				foreach ($ex as $val)
				{
					$this->db->like("pages.pages_title", $val);
					continue;
				}
			}
		}
		$this->db->order_by("pages_id", "desc");
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function get_search_pages_result($option, $keyword, $offset, $limit) {

		$keyword = str_replace("\"", "", str_replace(array("'", ",", "%", '' . "\$", "&", "*", "#", "(", ")", ":", ";", ">", "<", "/"), "", $keyword));
		$this->db->select("pages.*");
		$this->db->from("pages");
		if ($option == "title")
		{
			$this->db->like("pages.pages_title", $keyword);
			if (substr_count($keyword, " ") >= 1)
			{
				$ex = explode(" ", $keyword);
				foreach ($ex as $val)
				{
					$this->db->like("pages.pages_title", $val);
					continue;
				}
			}
		}
		$this->db->order_by("pages_id", "desc");
		$query = $this->db->get();
		$this->db->limit($limit, $offset);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

};;


