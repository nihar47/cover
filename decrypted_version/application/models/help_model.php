<?php


class Help_model extends ROCKERS_Model {

	public function Help_model() {

		parent::__construct();
		return;
	}

	public function get_school_details($school_title) {

		$query = $this->db->query("select * from school where active=1 and school_url_title='" . $school_title . "'");
		if ($query->num_rows() > 0)
		{
			return $query->row();
		}
		return 0;
	}

	public function get_one_category_detail($faq_category_url_name) {

		$get_category = $this->db->query("select * from faq_category where faq_category_url_name='" . $faq_category_url_name . "'");
		return $get_category->row();
	}

	public function get_category_question($faq_category_id) {

		$query = $this->db->query("select * from faq where active=1 and faq_category_id='" . $faq_category_id . "' order by faq_order asc");
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function get_school_title_list() {

		$query = $this->db->query("select * from school where active=1 order by school_order asc");
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function get_parent_category_detail($cid) {

		$query = $this->db->query("select * from faq_category where faq_category_id='" . $cid . "' and active=1");
		if ($query->num_rows() > 0)
		{
			$res = $query->row();
			$pquery = $this->db->query("select * from faq_category where faq_category_id='" . $res->parent_id . "' and active=1");
			if ($pquery->num_rows() > 0)
			{
				return $pquery->row();
			}
			return 0;
		}
		return 0;
	}

	public function get_parent_faq_category() {

		$query = $this->db->query("select * from faq_category where parent_id=0 and active=1 order by faq_category_order asc");
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function get_sub_faq_category($parent_id) {

		$query = $this->db->query("select * from faq_category where active=1 and parent_id='" . $parent_id . "' order by faq_category_order asc");
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function get_guidelines() {

		$query = $this->db->query("select * from guidelines");
		return $query->row();
	}

	public function get_search_faq($keyword) {

		if ($keyword != "none")
		{
			$query = $this->db->query("select faq.*,faq_category.faq_category_name,faq_category.faq_category_url_name from faq left join faq_category on faq.faq_category_id=faq_category.faq_category_id where faq.active=1 and (faq.question like '%" . $keyword . "%' or faq.answer like '%" . $keyword . "%')  order by faq.faq_order asc");
			if ($query->num_rows() > 0)
			{
				return $query->result();
			}
			return 0;
		}
		return 0;
	}

	public function get_help_category() {

		$query = $this->db->query("select * from faq_category where active=1 and faq_category_home=1 order by faq_category_order asc");
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function get_category_multi($id) {

		$query = $this->db->query("select * from faq_category where active=1 and parent_id='" . $id . "'");
		return $query->result();
	}

	public function menu_cat($id = "") {

		$cat = "";
		$id = empty($id) ? 0 : $id;
		if (count($this->get_category_multi($id)) > 0)
		{
			foreach ($this->get_category_multi($id) as $res)
			{
				$cat .= "'" . $res->faq_category_id . "',";
				if (count($this->menu_cat($res->faq_category_id)) > 0)
				{
					continue;
				}
				$cat .= $this->menu_cat($res->faq_category_id);
				continue;
			}
		}
		return $cat;
	}

	public function get_help_faq($fcid) {

		$category_id = $this->menu_cat($fcid) . "'" . $fcid . "'";
		$query = $this->db->query("select faq.*,faq_category.faq_category_name,faq_category.faq_category_url_name from faq left join faq_category on faq.faq_category_id=faq_category.faq_category_id where faq.active=1 and faq.faq_category_id in (" . $category_id . ") and faq_home=1 order by faq_order asc");
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

};;


