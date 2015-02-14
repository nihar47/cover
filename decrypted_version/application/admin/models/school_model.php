<?php


class School_model extends CI_Model {

	public function School_model() {

		parent::__construct();
		return;
	}

	public function select_site_setting() {

		$query = $this->db->query("select * from site_setting");
		return $query->row_array();
	}

	public function school_insert() {

		$school_url_title = strtolower(str_replace(" ", "-", trim(preg_replace("[^A-Za-z0-9 ]", " ", str_replace("'", "", str_replace(array(",", "+", "\"", "%", "!", "@", "#", "\$", "^", "&", "*", "(", ")", ";", "?", "<", ">", "/", ":", "`", "~", "-", ".", "..", "..."), "", $this->input->post("title")))))));
		$chk_url_exists = $this->db->query("select MAX(school_url_title) as school_url_title from school where school_url_title like '" . $school_url_title . "%'");
		if ($chk_url_exists->num_rows() > 0)
		{
			$get_pr = $chk_url_exists->row();
			if ($get_pr->school_url_title != "")
			{
				$strre = str_replace($school_url_title, "", $get_pr->school_url_title);
				if ($strre == "" || $strre == "0")
				{
					$newcnt = "1";
				}
				 else 
				{
					$newcnt = (int)$strre + 1;
				}
				$school_url_title = $school_url_title . $newcnt;
			}
		}
		$content = $this->input->post("description");
		$content = str_replace("\"", "KSYDOU", $content);
		$content = str_replace("'", "KSYSING", $content);
		$data = array("title" => $this->input->post("title"), "school_url_title" => $school_url_title, "description" => $content, "active" => $this->input->post("active"), "school_order" => $this->input->post("school_order"));
		$this->db->insert("school", $data);
		return;
	}

	public function school_update() {

		$get_orig = $this->db->query("select * from school where school_id='" . $this->input->post("school_id") . "'");
		$orig = $get_orig->row();
		$orig_title = $orig->title;
		$posted_url_title = $this->input->post("title");
		$posted_title = $this->input->post("title");
		$school_url_title = strtolower(str_replace(" ", "-", trim(preg_replace("[^A-Za-z0-9 ]", " ", str_replace("'", "", str_replace(array(",", "+", "\"", "%", "!", "@", "#", "\$", "^", "&", "*", "(", ")", ";", "?", "<", ">", "/", ":", "`", "~", "-", ".", "..", "..."), "", $this->input->post("title")))))));
		if ($posted_title == "" || $posted_title == "0")
		{
			$school_url_title = "";
		}
		 else 
		{
			if ($posted_title == $orig_title)
			{
				$school_url_title = $this->input->post("school_url_title");
			}
			 else 
			{
				$chk_url_exists = $this->db->query("select MAX(school_url_title) as school_url_title from school where school_id!='" . $this->input->post("school_id") . "' and  school_url_title like '" . $school_url_title . "%'");
				if ($chk_url_exists->num_rows() > 0)
				{
					$get_pr = $chk_url_exists->row();
					if ($get_pr->school_url_title != "")
					{
						$strre = str_replace($school_url_title, "", $get_pr->school_url_title);
						if ($strre == "" || $strre == "0")
						{
							$newcnt = "1";
						}
						 else 
						{
							$newcnt = (int)$strre + 1;
						}
						$school_url_title = $school_url_title . $newcnt;
					}
				}
			}
		}
		$content = $this->input->post("description");
		$content = str_replace("\"", "KSYDOU", $content);
		$content = str_replace("'", "KSYSING", $content);
		$data = array("title" => $this->input->post("title"), "school_url_title" => $school_url_title, "description" => $content, "active" => $this->input->post("active"), "school_order" => $this->input->post("school_order"));
		$this->db->where("school_id", $this->input->post("school_id"));
		$this->db->update("school", $data);
		return;
	}

	public function get_one_school($id) {

		$query = $this->db->get_where("school", array("school_id" => $id));
		return $query->row_array();
	}

	public function get_total_school_count() {

		return $this->db->count_all("school");
	}

	public function get_school_result($offset, $limit) {

		$this->db->order_by("school_id", "desc");
		$query = $this->db->get("school", $limit, $offset);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function get_total_search_school_count($option, $keyword) {

		$keyword = str_replace("\"", "", str_replace(array("'", ",", "%", '' . "\$", "&", "*", "#", "(", ")", ":", ";", ">", "<", "/"), "", $keyword));
		$this->db->select("school.*");
		$this->db->from("school");
		if ($option == "title")
		{
			$this->db->like("school.title", $keyword);
			if (substr_count($keyword, " ") >= 1)
			{
				$ex = explode(" ", $keyword);
				foreach ($ex as $val)
				{
					$this->db->like("school.title", $val);
					continue;
				}
			}
		}
		$this->db->order_by("school.school_id", "desc");
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function get_search_school_result($option, $keyword, $offset, $limit) {

		$keyword = str_replace("\"", "", str_replace(array("'", ",", "%", '' . "\$", "&", "*", "#", "(", ")", ":", ";", ">", "<", "/"), "", $keyword));
		$this->db->select("school.*");
		$this->db->from("school");
		if ($option == "title")
		{
			$this->db->like("school.title", $keyword);
			if (substr_count($keyword, " ") >= 1)
			{
				$ex = explode(" ", $keyword);
				foreach ($ex as $val)
				{
					$this->db->like("school.title", $val);
					continue;
				}
			}
		}
		$this->db->order_by("school.school_id", "desc");
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

};;


