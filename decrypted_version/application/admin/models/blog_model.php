<?php


class Blog_model extends CI_Model {

	public function Blog_model() {

		parent::__construct();
		return;
	}

	public function get_one_blog_setting() {

		$query = $this->db->get_where("blog_setting");
		return $query->row_array();
	}

	public function blog_setting_update() {

		$CI = &get_instance();
		$base_path = $CI->config->slash_item("base_path");
		$data = array("blog_status" => $this->input->post("blog_status"), "admin_approve" => $this->input->post("admin_approve"));
		$this->db->where("blog_setting_id", $this->input->post("blog_setting_id"));
		$this->db->update("blog_setting", $data);
		return;
	}

	public function get_total_blog_category_count() {

		return $this->db->count_all("blog_category");
	}

	public function get_all_blog_category($offset, $limit) {

		$this->db->order_by("blog_category_id", "desc");
		$query = $this->db->get("blog_category", $limit, $offset);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function get_total_search_blog_category_count($option, $keyword) {

		$this->db->select("blog_category.*");
		$this->db->from("blog_category");
		if ($option == "blogcatname")
		{
			$this->db->like("blog_category.blog_category_name", $keyword);
			if (substr_count($keyword, " ") >= 1)
			{
				$ex = explode(" ", $keyword);
				foreach ($ex as $val)
				{
					$this->db->like("blog_category.blog_category_name", $val);
					continue;
				}
			}
		}
		$this->db->order_by("blog_category.blog_category_id", "desc");
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function search_list_blog_category($option, $keyword, $offset, $limit) {

		$this->db->select("blog_category.*");
		$this->db->from("blog_category");
		if ($option == "blogcatname")
		{
			$this->db->like("blog_category.blog_category_name", $keyword);
			if (substr_count($keyword, " ") >= 1)
			{
				$ex = explode(" ", $keyword);
				foreach ($ex as $val)
				{
					$this->db->like("blog_category.blog_category_name", $val);
					continue;
				}
			}
		}
		$this->db->order_by("blog_category.blog_category_id", "desc");
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function get_one_blog_category($id) {

		$query = $this->db->get_where("blog_category", array("blog_category_id" => $id));
		return $query->row_array();
	}

	public function blog_category_insert() {

		$data = array("blog_category_name" => $this->input->post("blog_category_name"), "active" => $this->input->post("active"));
		$this->db->insert("blog_category", $data);
		return;
	}

	public function blog_category_update() {

		$data = array("blog_category_name" => $this->input->post("blog_category_name"), "active" => $this->input->post("active"));
		$this->db->where("blog_category_id", $this->input->post("blog_category_id"));
		$this->db->update("blog_category", $data);
		return;
	}

	public function get_category_no_of_blog($catid = 0) {

		$query = $this->db->get_where("blogs", array("blog_category" => $catid));
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}

	public function get_total_blog_count() {

		return $this->db->count_all("blogs");
	}

	public function get_blog_result($offset = 0, $limit = 0) {

		$this->db->order_by("blog_id", "desc");
		$query = $this->db->get("blogs", $limit, $offset);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function get_blog_category_name($id = 0) {

		$query = $this->db->get_where("blog_category", array("blog_category_id" => $id));
		if ($query->num_rows() > 0)
		{
			$q = $query->row();
			return $q->blog_category_name;
		}
		return 0;
	}

	public function blog_user($uid) {

		$query = $this->db->query("select * from user where user_id='" . $uid . "'");
		return $query->row();
	}

	public function get_total_search_blog_count($option, $keyword) {

		$keyword = str_replace("\"", "", str_replace(array("'", ",", "%", '' . "\$", "&", "*", "#", "@", "(", ")", ":", ";", ">", "<", "/"), "", $keyword));
		$this->db->select("blogs.*,blog_category.*,user.user_name,user.last_name");
		$this->db->from("blogs");
		$this->db->join("blog_category", "blogs.blog_category=blog_category.blog_category_id");
		$this->db->join("user", "blogs.user_id= user.user_id");
		$this->db->order_by("blogs.blog_id", "desc");
		if ($option == "blog_title")
		{
			$this->db->like("blogs.blog_title", $keyword);
			if (substr_count($keyword, " ") >= 1)
			{
				$ex = explode(" ", $keyword);
				foreach ($ex as $val)
				{
					$this->db->or_like("blogs.blog_title", $val);
					continue;
				}
			}
		}
		if ($option == "user")
		{
			$this->db->like("user.user_name", $keyword);
			$this->db->or_like("user.last_name", $keyword);
			$this->db->or_like("user.user_name", substr($keyword, 0 - 3, 3));
			$this->db->or_like("user.user_name", substr($keyword, 0, 3));
			$this->db->or_like("user.last_name", substr($keyword, 0 - 3, 3));
			$this->db->or_like("user.last_name", substr($keyword, 0, 3));
			if (substr_count($keyword, " ") >= 1)
			{
				$ex = explode(" ", $keyword);
				foreach ($ex as $val)
				{
					$this->db->or_like("user.user_name", $val);
					$this->db->or_like("user.last_name", $val);
					continue;
				}
			}
		}
		if ($option == "blog_category")
		{
			$this->db->like("blog_category.blog_category_name", $keyword);
		}
		$this->db->order_by("blogs.blog_id", "desc");
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function get_search_blog_result($option, $keyword, $offset, $limit) {

		$keyword = str_replace("\"", "", str_replace(array("'", ",", "%", '' . "\$", "&", "*", "#", "@", "(", ")", ":", ";", ">", "<", "/"), "", $keyword));
		$this->db->select("blogs.*,blog_category.*,user.user_name,user.last_name");
		$this->db->from("blogs");
		$this->db->join("blog_category", "blogs.blog_category=blog_category.blog_category_id");
		$this->db->join("user", "blogs.user_id= user.user_id");
		$this->db->order_by("blogs.blog_id", "desc");
		if ($option == "blog_title")
		{
			$this->db->like("blogs.blog_title", $keyword);
			if (substr_count($keyword, " ") >= 1)
			{
				$ex = explode(" ", $keyword);
				foreach ($ex as $val)
				{
					$this->db->or_like("blogs.blog_title", $val);
					continue;
				}
			}
		}
		if ($option == "user")
		{
			$this->db->like("user.user_name", $keyword);
			$this->db->or_like("user.last_name", $keyword);
			$this->db->or_like("user.user_name", substr($keyword, 0 - 3, 3));
			$this->db->or_like("user.user_name", substr($keyword, 0, 3));
			$this->db->or_like("user.last_name", substr($keyword, 0 - 3, 3));
			$this->db->or_like("user.last_name", substr($keyword, 0, 3));
			if (substr_count($keyword, " ") >= 1)
			{
				$ex = explode(" ", $keyword);
				foreach ($ex as $val)
				{
					$this->db->or_like("user.user_name", $val);
					$this->db->or_like("user.last_name", $val);
					continue;
				}
			}
		}
		if ($option == "blog_category")
		{
			$this->db->like("blog_category.blog_category_name", $keyword);
		}
		$this->db->order_by("blogs.blog_id", "desc");
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function blog_category() {

		$this->db->order_by("blog_category_id", "desc");
		$query = $this->db->get("blog_category");
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function insert_blog() {

		$insert_blog = array("blog_title" => $this->input->post("blog_title"), "blog_discription" => $this->input->post("description"), "blog_category" => $this->input->post("blog_category_id"), "publish" => $this->input->post("publish"), "no_one_comment" => $this->input->post("no_one_comment"), "status" => $this->input->post("status"), "date_added" => date("Y-m-d H:i:s"));
		$this->db->insert("blogs", $insert_blog);
		return;
	}

	public function get_one_blog($id) {

		$query = $this->db->get_where("blogs", array("blog_id" => $id));
		return $query->row_array();
	}

	public function update_blog() {

		$update_blog = array("blog_title" => $this->input->post("blog_title"), "blog_discription" => $this->input->post("description"), "blog_category" => $this->input->post("blog_category_id"), "publish" => $this->input->post("publish"), "no_one_comment" => $this->input->post("no_one_comment"), "user_id" => $this->input->post("user_id"), "status" => $this->input->post("status"), "date_added" => date("Y-m-d H:i:s"));
		$this->db->where("blog_id", $this->input->post("blog_id"));
		$this->db->update("blogs", $update_blog);
		return;
	}

};;


