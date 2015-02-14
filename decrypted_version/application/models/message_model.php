<?php


class Message_model extends ROCKERS_Model {
	public function Message_model() {
		parent::__construct();
		return;
	}

	public function insert_project_detail_message() {
		$project_id = $this->input->post("project_id");
		$message_setting = message_setting();
		$project = get_one_project($project_id);
		$data = array("sender_id" => $this->session->userdata("user_id"), "receiver_id" => $project["user_id"], "is_read" => 0, "message_subject" => $project["project_title"], "message_content" => $this->input->post("comments"), "project_id" => $project_id, "date_added" => date("Y-m-d"));
		if ($this->db->insert("message_conversation", $data))
		{
			return 1;
		}
		return 0;
	}

	public function insert_project_profile_message() {

		$data = array("sender_id" => $this->session->userdata("user_id"), "receiver_id" => $this->input->post("user_id"), "project_id" => $this->input->post("pid"), "is_read" => 0, "message_subject" => $this->input->post("subject"), "message_content" => $this->input->post("comments"), "date_added" => date("Y-m-d H:i:s"));
		if ($this->db->insert("message_conversation", $data))
		{
			return 1;
		}
		return 0;
	}
};;


