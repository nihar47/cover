<?php


class Gallery_model extends CI_Model {

	public function Gallery_model() {

		parent::__construct();
		return;
	}

	public function gallery_insert() {

		if ($_FILES["photo"]["name"] != "")
		{
			$image = $_FILES["photo"]["name"];
		}
		 else 
		{
			$image = "no_img.jpg";
		}
		$data = array("gallery_name" => $this->input->post("gallery_name"), "gallery_image" => $image, "active" => $this->input->post("active"));
		$this->db->insert("gallery", $data);
		return;
	}

	public function gallery_update() {

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
		$data = array("gallery_name" => $this->input->post("gallery_name"), "gallery_image" => $image, "active" => $this->input->post("active"));
		$this->db->where("gallery_id", $this->input->post("gallery_id"));
		$this->db->update("gallery", $data);
		return;
	}

	public function get_one_gallery($id) {

		$query = $this->db->get_where("gallery", array("gallery_id" => $id));
		return $query->row_array();
	}

	public function get_total_gallery_count() {

		return $this->db->count_all("gallery");
	}

	public function get_gallery_result($offset, $limit) {

		$this->db->order_by("gallery_id", "desc");
		$query = $this->db->get("gallery", $limit, $offset);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function get_total_search_gallery_count($option, $keyword) {

		$keyword = str_replace("\"", "", str_replace(array("'", ",", "%", '' . "\$", "&", "*", "#", "(", ")", ":", ";", ">", "<", "/"), "", $keyword));
		$this->db->select("gallery.*");
		$this->db->from("gallery");
		if ($option == "name")
		{
			$this->db->like("gallery.gallery_name", $keyword);
			if (substr_count($keyword, " ") >= 1)
			{
				$ex = explode(" ", $keyword);
				foreach ($ex as $val)
				{
					$this->db->like("gallery.gallery_name", $val);
					continue;
				}
			}
		}
		$this->db->order_by("gallery_id", "desc");
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function get_search_gallery_result($option, $keyword, $offset, $limit) {

		$this->db->select("gallery.*");
		$this->db->from("gallery");
		if ($option == "name")
		{
			$this->db->like("gallery.gallery_name", $keyword);
			if (substr_count($keyword, " ") >= 1)
			{
				$ex = explode(" ", $keyword);
				foreach ($ex as $val)
				{
					$this->db->like("gallery.gallery_name", $val);
					continue;
				}
			}
		}
		$this->db->order_by("gallery_id", "desc");
		$query = $this->db->get();
		$this->db->limit($limit, $offset);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

};;


