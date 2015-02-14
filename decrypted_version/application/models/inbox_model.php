<?php


class Inbox_model extends ROCKERS_Model {

	public function Inbox_model() {

		parent::__construct();
		return;
	}

	public function list_message($offset, $limit) {

		$query = $this->db->query("select * from message_conversation where (receiver_id='" . $this->session->userdata("user_id") . "' or sender_id='" . $this->session->userdata("user_id") . "') and reply_message_id = 0 order by date_added desc limit " . $limit . " offset " . $offset);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function list_message_header() {

		$query = $this->db->query("select * from message_conversation where receiver_id='" . get_authenticateuserid() . "' and is_read = 0 order by date_added desc limit 5");
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function list_message_for_reply() {

		$query = $this->db->query("select * from message_conversation where (receiver_id='" . $this->session->userdata("user_id") . "' or sender_id='" . $this->session->userdata("user_id") . "')  order by date_added desc ,message_id desc limit 1");
		if ($query->num_rows() > 0)
		{
			return $query->row();
		}
		return 0;
	}

	public function get_count_my_message() {

		$query = $this->db->query("select * from message_conversation where receiver_id='" . $this->session->userdata("user_id") . "' and reply_message_id = 0");
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}

	public function get_message_detail($message_id) {

		$query = $this->db->query("select * from message_conversation where message_id='" . $message_id . "'or reply_message_id = '" . $message_id . "'");
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function get_one_message($message_id) {

		$query = $this->db->query("select * from message_conversation where message_id='" . $message_id . "'");
		if ($query->num_rows() > 0)
		{
			return $query->row();
		}
		return 0;
	}

	public function insert_reply() {

		$message_id = $this->input->post("message_id");
		$message_detail = $this->get_one_message($message_id);
		$data = array("sender_id" => $this->input->post("sender_id"), "receiver_id" => $this->input->post("receiver_id"), "is_read" => 0, "message_subject" => $message_detail->message_subject, "message_content" => $this->input->post("conversation"), "project_id" => $message_detail->project_id, "date_added" => date("Y-m-d H:i:s"), "reply_message_id" => $message_id);
		if ($this->db->insert("message_conversation", $data))
		{
			return 1;
		}
		return 0;
	}

	public function get_unread_replies($message_id) {

		$query = $this->db->query("select * from message_conversation where is_read =0 and reply_message_id='" . $message_id . "' and receiver_id = '" . $this->session->userdata("user_id") . "'");
		if ($query->num_rows() > 0)
		{
			return 1;
		}
		return 0;
	}

	public function check_message_exist($message_id) {

		$query = $this->db->query("select * from message_conversation where message_id='" . $message_id . "'");
		if ($query->num_rows() > 0)
		{
			return 1;
		}
		return 0;
	}

	public function get_unread_replies_read($message_id) {

		$query = $this->db->query("select * from message_conversation where is_read =0 and reply_message_id='" . $message_id . "' and receiver_id = '" . $this->session->userdata("user_id") . "'");
		if ($query->num_rows() > 0)
		{
			return $query->row();
		}
		return 0;
	}

	public function get_message_detail_count($message_id) {

		$query = $this->db->query("select * from message_conversation where message_id='" . $message_id . "'or reply_message_id = '" . $message_id . "'");
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}

	public function delete_msg($id) {

		$msg_detail = $this->db->query("select * from message_conversation where message_id='" . $id . "'");
		if ($msg_detail->num_rows() > 0)
		{
			$msg = $msg_detail->row();
			$this->db->query("delete from message_conversation where message_id='" . $id . "'");
		}
		return;
	}

};;


