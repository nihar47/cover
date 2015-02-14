<?php


class Requests_model extends CI_Model {

	public function Requests_model() {

		parent::__construct();
		return;
	}

	public function affiliate_request_insert() {

		$data = array("user_id" => $this->input->post("user_id"), "site_category" => $this->input->post("site_category"), "site_name" => $this->input->post("site_name"), "site_description" => $this->input->post("site_description"), "site_url" => $this->input->post("site_url"), "why_affiliate" => $this->input->post("why_affiliate"), "web_site_marketing" => $this->input->post("web_site_marketing"), "search_engine_marketing" => $this->input->post("search_engine_marketing"), "email_marketing" => $this->input->post("email_marketing"), "special_promotional_method" => $this->input->post("special_promotional_method"), "special_promotional_description" => $this->input->post("special_promotional_description"), "approved" => $this->input->post("approved"));
		$this->db->insert("affiliate_request", $data);
		return;
	}

	public function affiliate_request_update() {

		$data = array("user_id" => $this->input->post("user_id"), "site_category" => $this->input->post("site_category"), "site_name" => $this->input->post("site_name"), "site_description" => $this->input->post("site_description"), "site_url" => $this->input->post("site_url"), "why_affiliate" => $this->input->post("why_affiliate"), "web_site_marketing" => $this->input->post("web_site_marketing"), "search_engine_marketing" => $this->input->post("search_engine_marketing"), "email_marketing" => $this->input->post("email_marketing"), "special_promotional_method" => $this->input->post("special_promotional_method"), "special_promotional_description" => $this->input->post("special_promotional_description"), "approved" => $this->input->post("approved"));
		$this->db->where("affiliate_request_id", $this->input->post("affiliate_request_id"));
		$this->db->update("affiliate_request", $data);
		return;
	}

	public function get_one_affiliate_request($id) {

		$this->db->select("afrq.*,us.*,prcat.project_category_name");
		$this->db->from("affiliate_request afrq");
		$this->db->join("user us", "afrq.user_id=us.user_id");
		$this->db->join("project_category prcat", "afrq.site_category=prcat.project_category_id", "left");
		$this->db->where("affiliate_request_id", $id);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->row_array();
		}
		return 0;
	}

	public function delete_request($id) {

		$get_request = $this->db->query("select * from affiliate_request where affiliate_request_id='" . $id . "'");
		if ($get_request->num_rows() > 0)
		{
			$res = $get_request->row();
			$check_user_earn = $this->db->query("select * from affiliate_user_earn where user_id='" . $res->user_id . "'");
			if ($check_user_earn->num_rows() > 0)
			{
				$this->db->delete("affiliate_user_earn", array("user_id" => $res->user_id));
			}
			$check_affiliate_withdraw_request = $this->db->query("select * from affiliate_withdraw_request where user_id='" . $res->user_id . "'");
			if ($check_affiliate_withdraw_request->num_rows() > 0)
			{
				$this->db->delete("affiliate_withdraw_request", array("user_id" => $res->user_id));
			}
			$this->db->delete("affiliate_request", array("affiliate_request_id" => $id));
		}
		return;
	}

	public function get_total_request_count() {

		$this->db->select("afrq.*,us.*,prcat.project_category_name");
		$this->db->from("affiliate_request afrq");
		$this->db->join("user us", "afrq.user_id=us.user_id");
		$this->db->join("project_category prcat", "afrq.site_category=prcat.project_category_id", "left");
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function get_affiliate_request($offset, $limit) {

		$this->db->select("afrq.*,us.*,prcat.project_category_name");
		$this->db->from("affiliate_request afrq");
		$this->db->join("user us", "afrq.user_id=us.user_id");
		$this->db->join("project_category prcat", "afrq.site_category=prcat.project_category_id", "left");
		$this->db->order_by("afrq.affiliate_request_id", "desc");
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		return 0;
	}

	public function get_total_search_request_count($option, $keyword) {

		$keyword = str_replace("\"", "", str_replace(array("'", ",", "%", '' . "\$", "&", "*", "#", "(", ")", ":", ";", ">", "<", "/"), "", $keyword));
		$this->db->select("afrq.*,us.*,prcat.project_category_name");
		$this->db->from("affiliate_request afrq");
		$this->db->join("user us", "afrq.user_id=us.user_id");
		$this->db->join("project_category prcat", "afrq.site_category=prcat.project_category_id", "left");
		$this->db->like($option, $keyword);
		if (substr_count($keyword, " ") >= 1)
		{
			$ex = explode(" ", $keyword);
			foreach ($ex as $val)
			{
				$this->db->or_like($option, $val);
				continue;
			}
		}
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function get_search_request_result($option, $keyword, $offset, $limit) {

		$keyword = str_replace("\"", "", str_replace(array("'", ",", "%", '' . "\$", "&", "*", "#", "(", ")", ":", ";", ">", "<", "/"), "", $keyword));
		$this->db->select("afrq.*,us.*,prcat.project_category_name");
		$this->db->from("affiliate_request afrq");
		$this->db->join("user us", "afrq.user_id=us.user_id");
		$this->db->join("project_category prcat", "afrq.site_category=prcat.project_category_id", "left");
		$this->db->like($option, $keyword);
		if (substr_count($keyword, " ") >= 1)
		{
			$ex = explode(" ", $keyword);
			foreach ($ex as $val)
			{
				$this->db->or_like($option, $val);
				continue;
			}
		}
		$this->db->order_by("afrq.affiliate_request_id", "desc");
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		return 0;
	}

	public function get_category() {

		$this->db->where("active", 1);
		$this->db->order_by("project_category_name", "asc");
		$query = $this->db->get("project_category");
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function get_users() {

		$query = $this->db->query("select * from user where active=1 and user_id not in(select user_id from affiliate_request)");
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

};;


