<?php


class Email_template_model extends CI_Model {

	public function Email_template_model() {

		parent::__construct();
		return;
	}

	public function email_template_update() {

		$data = array("from_address" => $this->input->post("from_address"), "reply_address" => $this->input->post("reply_address"), "subject" => $this->input->post("subject"), "message" => $this->input->post("message"));
		$this->db->where("email_template_id", $this->input->post("email_template_id"));
		$this->db->update("email_template", $data);
		return;
	}

	public function get_one_email_template($id) {

		if ($id == 0)
		{
			$id = 1;
		}
		$query = $this->db->get_where("email_template", array("email_template_id" => $id));
		return $query->row_array();
	}

	public function get_email_template() {

		$query = $this->db->get_where("email_template");
		return $query->result_array();
	}

};;


