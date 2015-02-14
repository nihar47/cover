<?php


class Blog_model extends ROCKERS_Model {

	public function Blog_model() {

		parent::__construct();
		return;
	}

	public function list_blog($limit = "", $offset = "") {

		$query = $this->db->query("select blogs.*,blog_category.blog_category_name from blogs, blog_category where blogs.blog_category= blog_category.blog_category_id and blogs.status =1 and blogs.publish = 1 order by blogs.date_added desc  LIMIT " . $limit . " OFFSET " . $offset);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function get_blog_category() {

		$query = $this->db->query("select * from blog_category where active = 1");
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function get_blog_comment($blog_id, $limit, $offset) {

		$query = $this->db->query("select * from blog_comment where blog_id =" . $blog_id . " order by date_added asc LIMIT " . $limit . " OFFSET " . $offset);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function get_one_blog($blog_id = "") {

		$query = $this->db->query("select * from blogs where status =1 and publish = 1 and blog_id='" . $blog_id . "'");
		if ($query->num_rows() > 0)
		{
			return $query->row();
		}
		return 0;
	}

	public function insert_blog_comment() {

		$blog_id = $this->input->post("blog_id");
		$data = array("blog_id" => $this->input->post("blog_id"), "blog_comment" => $this->input->post("comments"), "user_id" => get_authenticateuserid(), "date_added" => date("Y-m-d : H:i:s"));
		if ($this->db->insert("blog_comment", $data))
		{
			return $blog_id;
		}
		return 0;
	}

	public function recent_post() {

		$query = $this->db->query("select blogs.* from blogs,blog_comment where blogs.blog_id = blog_comment.blog_id group by blog_comment.blog_id order by blog_comment.date_added asc LIMIT 5");
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function list_category_blog($blog_category = "", $limit = "", $offset = "") {

		$query = $this->db->query("select * from blogs where blogs.blog_category = '" . $blog_category . "' order by date_added asc LIMIT " . $limit . " OFFSET " . $offset);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function get_latest_updates() {

		$query = $this->db->query("select * from updates,project where updates.project_id = project.project_id order by updates.date_added desc LIMIT 10");
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

};;


