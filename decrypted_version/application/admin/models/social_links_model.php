<?php


class Social_links_model extends CI_Model {

	public function Social_links_model() {

		parent::__construct();
		return;
	}

	public function social_insert() {
		$data = array("title" => $this->input->post("title"), "author" => $this->input->post("author"), "description" => $this->input->post("description"),"active" => $this->input->post("active")  );
		//print_r($data);die;
		$this->db->insert("social_links", $data);
		return;
	}

	public function pages_update() {

		$data = array("title" => $this->input->post("title"),"author" => $this->input->post("author"), "description" => $this->input->post("description"), "active" => $this->input->post("active"));
		$this->db->where("id", $this->input->post("id"));
		$this->db->update("social_links", $data);
		return;
	}

	public function get_one_pages($id) {

		$query = $this->db->get_where("social_links", array("id" => $id));
		return $query->row_array();
	}

	public function get_total_pages_count() {

		$query = $this->db->query("select * from social_links where id not in ('6','7','14')");
		return $query->num_rows();
	}

	public function get_pages_result($offset, $limit) {

		$query = $this->db->query("select * from social_links where id not in ('6','7','14') order by id desc LIMIT " . $limit . " OFFSET " . $offset . "");
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function get_total_search_pages_count($option, $keyword) {

		$keyword = str_replace("\"", "", str_replace(array("'", ",", "%", '' . "\$", "&", "*", "#", "(", ")", ":", ";", ">", "<", "/"), "", $keyword));
		$this->db->select("social_links.*");
		$this->db->from("social_links");
		if ($option == "title")
		{
			$this->db->like("social_links.title", $keyword);
			if (substr_count($keyword, " ") >= 1)
			{
				$ex = explode(" ", $keyword);
				foreach ($ex as $val)
				{
					$this->db->like("social_links.title", $val);
					continue;
				}
			}
		}
		$this->db->order_by("id", "desc");
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function get_search_pages_result($option, $keyword, $offset, $limit) {

		$keyword = str_replace("\"", "", str_replace(array("'", ",", "%", '' . "\$", "&", "*", "#", "(", ")", ":", ";", ">", "<", "/"), "", $keyword));
		$this->db->select("social_links.*");
		$this->db->from("social_links");
		if ($option == "title")
		{
			$this->db->like("social_links.title", $keyword);
			if (substr_count($keyword, " ") >= 1)
			{
				$ex = explode(" ", $keyword);
				foreach ($ex as $val)
				{
					$this->db->like("social_links.title", $val);
					continue;
				}
			}
		}
		$this->db->order_by("id", "desc");
		$query = $this->db->get();
		$this->db->limit($limit, $offset);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

};;


