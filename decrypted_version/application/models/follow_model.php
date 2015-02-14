<?php


class Follow_model extends ROCKERS_Model {

	public function Follow_model() {

		parent::__construct();
		return;
	}

	public function follow_user($id) {

		$data = array("follow_by_user_id" => $this->session->userdata("user_id"), "follow_user_id" => $id, "user_follow_date" => date("Y-m-d H:i:s"));
		if ($this->db->insert("user_follow", $data))
		{
			return 1;
		}
		return 0;
	}

	public function checkfollow_user($uid) {

		$query = $this->db->query("select follow_user_id from user_follow where follow_user_id = " . $uid . " and follow_by_user_id=" . $this->session->userdata("user_id"));
		if ($query->num_rows() > 0)
		{
			return 1;
		}
		return 0;
	}

	public function follow_project($project_id) {

		$data = array("project_follow_user_id" => $this->session->userdata("user_id"), "project_id" => $project_id, "project_follow_date" => date("Y-m-d H:i:s"));
		if ($this->db->insert("project_follower", $data))
		{
			return 1;
		}
		return 0;
	}

	public function checkfollow_project($id) {

		$query = $this->db->query("select project_id from project_follower where project_id = " . $id . " and project_follow_user_id=" . $this->session->userdata("user_id"));
		if ($query->num_rows() > 0)
		{
			return 1;
		}
		return 0;
	}

	public function block_user($id) {

		$data = array("block_by_user_id" => $this->session->userdata("user_id"), "block_user_id" => $id, "date_added" => date("Y-m-d H:i:s"));
		if ($this->db->insert("block_user", $data))
		{
			return 1;
		}
		return 0;
	}

	public function checkblock_user($id) {

		$query = $this->db->query("select block_user_id from block_user where block_user_id = " . $id . " and block_by_user_id=" . $this->session->userdata("user_id"));
		if ($query->num_rows() > 0)
		{
			return 1;
		}
		return 0;
	}

};;


