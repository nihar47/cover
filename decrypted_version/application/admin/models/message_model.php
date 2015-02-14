<?php


class Message_model extends CI_Model {

	public function Message_model() {

		parent::__construct();
		return;
	}

	public function select_site_setting() {

		$query = $this->db->query("select * from site_setting");
		return $query->row_array();
	}

	public function get_user_detail($id) {

		$query = $this->db->get_where("user", array("user_id" => $id));
		return $query->row_array();
	}

	public function get_total_message_count() {

		$query = $this->db->query("select * from message_conversation where reply_message_id = 0 order by message_id desc ");
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}

	public function get_message_result($offset, $limit) {

		$query = $this->db->query("select * from message_conversation where reply_message_id = 0 order by message_id desc limit " . $limit . " offset " . $offset . "");
		if ($query->num_rows() > 0)
		{
			return $query->result();
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

	public function get_total_search_message_count($option, $keyword) {

		if ($option != "sender" || $option != "receiver")
		{
			$keyword = str_replace("\"", "", str_replace(array("'", ",", "%", '' . "\$", "&", "*", "#", "@", "(", ")", ":", ";", ">", "<", "/"), "", $keyword));
		}
		$this->db->select("message_conversation.*,user.user_name,user.last_name,user.email");
		$this->db->from("message_conversation");
		$this->db->where("message_conversation.reply_message_id", "0");
		if ($option == "all")
		{
			redirect("message/list_message");
		}
		if ($option == "sender")
		{
			$this->db->where("message_conversation.reply_message_id", "message_conversation.sender_id= user.user_id");
			$this->db->join("user", "message_conversation.sender_id= user.user_id", "left");
			$this->db->like("user.user_name", $keyword);
			$this->db->or_like("user.last_name", $keyword);
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
		if ($option == "receiver")
		{
			$this->db->where("message_conversation.reply_message_id", "message_conversation.receiver_id= user.user_id");
			$this->db->join("user", "message_conversation.receiver_id= user.user_id", "left");
			$this->db->like("user.user_name", $keyword);
			$this->db->or_like("user.last_name", $keyword);
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
		$this->db->order_by("message_conversation.message_id", "desc");
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function get_search_message_result($option, $keyword, $offset, $limit) {

		if ($option != "sender" || $option != "receiver")
		{
			$keyword = str_replace("\"", "", str_replace(array("'", ",", "%", '' . "\$", "&", "*", "#", "@", "(", ")", ":", ";", ">", "<", "/"), "", $keyword));
		}
		$this->db->select("message_conversation.*,user.user_name,user.last_name,user.email");
		$this->db->from("message_conversation");
		$this->db->where("message_conversation.reply_message_id", "0");
		if ($option == "all")
		{
			redirect("message/list_message");
		}
		if ($option == "sender")
		{
			$this->db->join("user", "message_conversation.sender_id= user.user_id", "left");
			$this->db->like("user.user_name", $keyword);
			$this->db->or_like("user.last_name", $keyword);
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
		if ($option == "receiver")
		{
			$this->db->join("user", "message_conversation.receiver_id= user.user_id", "left");
			$this->db->like("user.user_name", $keyword);
			$this->db->or_like("user.last_name", $keyword);
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
		$this->db->order_by("message_conversation.message_id", "desc");
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

};;


