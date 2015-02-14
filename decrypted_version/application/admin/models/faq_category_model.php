<?php


class Faq_category_model extends CI_Model {

	public function Faq_category_model() {

		parent::__construct();
		return;
	}

	public function get_category() {

		$this->db->where("active", 1);
		$this->db->order_by("faq_category_name", "asc");
		$query = $this->db->get("faq_category");
		return $query->result();
	}

	public function select_site_setting() {

		$query = $this->db->query("select * from site_setting");
		return $query->row_array();
	}

	public function faq_category_insert() {

		$faq_category_url_name = strtolower(str_replace(" ", "-", trim(preg_replace("[^A-Za-z0-9 ]", " ", str_replace("'", "", str_replace(array(",", "+", "\"", "%", "!", "@", "#", "\$", "^", "&", "*", "(", ")", ";", "?", "<", ">", "/", ":", "`", "~", "-", ".", "..", "..."), "", $this->input->post("faq_category_name")))))));
		$chk_url_exists = $this->db->query("select MAX(faq_category_url_name) as faq_category_url_name from faq_category where faq_category_url_name like '" . $faq_category_url_name . "%'");
		if ($chk_url_exists->num_rows() > 0)
		{
			$get_pr = $chk_url_exists->row();
			if ($get_pr->faq_category_url_name != "")
			{
				$strre = str_replace($faq_category_url_name, "", $get_pr->faq_category_url_name);
				if ($strre == "" || $strre == "0")
				{
					$newcnt = "1";
				}
				 else 
				{
					$newcnt = (int)$strre + 1;
				}
				$faq_category_url_name = $faq_category_url_name . $newcnt;
			}
		}
		$data = array("parent_id" => $this->input->post("parent_id"), "faq_category_name" => $this->input->post("faq_category_name"), "faq_category_url_name" => $faq_category_url_name, "active" => $this->input->post("active"), "faq_category_order" => $this->input->post("faq_category_order"), "faq_category_home" => $this->input->post("faq_category_home"));
		$this->db->insert("faq_category", $data);
		return;
	}

	public function faq_category_update() {

		$get_orig = $this->db->query("select * from faq_category where faq_category_id='" . $this->input->post("faq_category_id") . "'");
		$orig = $get_orig->row();
		$orig_title = $orig->faq_category_name;
		$posted_url_title = $this->input->post("faq_category_url_name");
		$posted_title = $this->input->post("faq_category_name");
		$faq_category_url_name = strtolower(str_replace(" ", "-", trim(preg_replace("[^A-Za-z0-9 ]", " ", str_replace("'", "", str_replace(array(",", "+", "\"", "%", "!", "@", "#", "\$", "^", "&", "*", "(", ")", ";", "?", "<", ">", "/", ":", "`", "~", "-", ".", "..", "..."), "", $this->input->post("faq_category_name")))))));
		if ($posted_title == "" || $posted_title == "0")
		{
			$faq_category_url_name = "";
		}
		 else 
		{
			if ($posted_title == $orig_title)
			{
				$faq_category_url_name = $this->input->post("faq_category_url_name");
			}
			 else 
			{
				$chk_url_exists = $this->db->query("select MAX(faq_category_url_name) as faq_category_url_name from faq_category where faq_category_id!='" . $this->input->post("faq_category_id") . "' and  faq_category_url_name like '" . $faq_category_url_name . "%'");
				if ($chk_url_exists->num_rows() > 0)
				{
					$get_pr = $chk_url_exists->row();
					if ($get_pr->faq_category_url_name != "")
					{
						$strre = str_replace($faq_category_url_name, "", $get_pr->faq_category_url_name);
						if ($strre == "" || $strre == "0")
						{
							$newcnt = "1";
						}
						 else 
						{
							$newcnt = (int)$strre + 1;
						}
						$faq_category_url_name = $faq_category_url_name . $newcnt;
					}
				}
			}
		}
		$data = array("parent_id" => $this->input->post("parent_id"), "faq_category_name" => $this->input->post("faq_category_name"), "faq_category_url_name" => $faq_category_url_name, "active" => $this->input->post("active"), "faq_category_order" => $this->input->post("faq_category_order"), "faq_category_home" => $this->input->post("faq_category_home"));
		$this->db->where("faq_category_id", $this->input->post("faq_category_id"));
		$this->db->update("faq_category", $data);
		return;
	}

	public function get_one_faq_category($id) {

		$query = $this->db->get_where("faq_category", array("faq_category_id" => $id));
		return $query->row_array();
	}

	public function get_total_faq_category_count() {

		return $this->db->count_all("faq_category");
	}

	public function get_faq_category_result($offset, $limit) {

		$this->db->order_by("faq_category_id", "desc");
		$this->db->limit($limit, $offset);
		$query = $this->db->get("faq_category");
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function get_parent_faq_category() {

		$query = $this->db->get_where("faq_category", array("parent_id" => "0"));
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function chk_category_faq($cid) {

		$temp = 0;
		$chk_faq = $this->db->query("select * from faq where faq_category_id='" . $cid . "'");
		if ($chk_faq->num_rows() > 0)
		{
			$temp = 1;
		}
		$chk_sub_faq = $this->db->query("select * from faq_category where parent_id='" . $cid . "'");
		if ($chk_sub_faq->num_rows() > 0)
		{
			$temp = 1;
		}
		return $temp;
	}

	public function get_category_multi($id) {

		$query = $this->db->query("select * from faq_category where parent_id='" . $id . "'");
		return $query->result();
	}

	public function get_total_search_faq_category_count($option, $keyword) {

		$keyword = str_replace("\"", "", str_replace(array("'", ",", "%", '' . "\$", "&", "*", "#", "(", ")", ":", ";", ">", "<", "/"), "", $keyword));
		$this->db->select("faq_category.*");
		$this->db->from("faq_category");
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
		$this->db->order_by("faq_category.faq_category_id", "desc");
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function get_search_faq_category_result($option, $keyword, $offset, $limit) {

		$keyword = str_replace("\"", "", str_replace(array("'", ",", "%", '' . "\$", "&", "*", "#", "(", ")", ":", ";", ">", "<", "/"), "", $keyword));
		$this->db->select("faq_category.*");
		$this->db->from("faq_category");
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
		$this->db->order_by("faq_category.faq_category_id", "desc");
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

};;


