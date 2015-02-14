<?php


class Idea_model extends CI_Model {

	public function Idea_model() {

		parent::__construct();
		return;
	}

	public function idea_insert() {

		if ($_FILES["photo"]["name"] != "")
		{
			$image = $_FILES["photo"]["name"];
		}
		 else 
		{
			$image = "no_img.jpg";
		}
		$data = array("idea_name" => $this->input->post("idea_name"), "idea_image" => $image, "idea_description" => $this->input->post("idea_description"), "active" => $this->input->post("active"));
		$this->db->insert("idea", $data);
		return;
	}

	public function idea_update() {

		if ($_FILES["photo"]["name"] != "")
		{
			$image = $_FILES["photo"]["name"];
		}
		 else 
		{
			if ($this->input->post("prev_image") != "")
			{
				$image = $this->input->post("prev_image");
			}
			 else 
			{
				$image = "no_img.jpg";
			}
		}
		$data = array("idea_name" => $this->input->post("idea_name"), "idea_image" => $image, "idea_description" => $this->input->post("idea_description"), "active" => $this->input->post("active"));
		$this->db->where("idea_id", $this->input->post("idea_id"));
		$this->db->update("idea", $data);
		return;
	}

	public function get_one_idea($id) {

		$query = $this->db->get_where("idea", array("idea_id" => $id));
		return $query->row_array();
	}

	public function get_total_idea_count() {

		return $this->db->count_all("idea");
	}

	public function get_idea_result($offset, $limit) {

		$this->db->order_by("idea_id", "desc");
		$query = $this->db->get("idea", $limit, $offset);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function get_total_search_idea_count($option, $keyword) {

		$keyword = str_replace("\"", "", str_replace(array("'", ",", "%", '' . "\$", "&", "*", "#", "(", ")", ":", ";", ">", "<", "/"), "", $keyword));
		$this->db->select("idea.*");
		$this->db->from("idea");
		if ($option == "title")
		{
			$this->db->like("idea.idea_name", $keyword);
			if (substr_count($keyword, " ") >= 1)
			{
				$ex = explode(" ", $keyword);
				foreach ($ex as $val)
				{
					$this->db->like("idea.idea_name", $val);
					continue;
				}
			}
		}
		$this->db->order_by("idea_id", "desc");
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function get_search_idea_result($option, $keyword, $offset, $limit) {

		$keyword = str_replace("\"", "", str_replace(array("'", ",", "%", '' . "\$", "&", "*", "#", "(", ")", ":", ";", ">", "<", "/"), "", $keyword));
		$this->db->select("idea.*");
		$this->db->from("idea");
		if ($option == "title")
		{
			$this->db->like("idea.idea_name", $keyword);
			if (substr_count($keyword, " ") >= 1)
			{
				$ex = explode(" ", $keyword);
				foreach ($ex as $val)
				{
					$this->db->like("idea.idea_name", $val);
					continue;
				}
			}
		}
		$this->db->order_by("idea_id", "desc");
		$query = $this->db->get();
		$this->db->limit($limit, $offset);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

};;


