<?php


class Automation_model extends CI_Model {

	public function Automation_model() {

		parent::__construct();
		return;
	}

	public function get_automation_paypal() {

		$query = $this->db->get("automation_paypal");
		if ($query->num_rows() > 0)
		{
			return $query->row();
		}
		return 0;
	}

	public function update_step3() {

		$automation_paypal = $this->get_automation_paypal();
		$data = array("user_id" => $this->input->post("user_id"));
		$this->db->where("automation_paypal_id", $automation_paypal->automation_paypal_id);
		$this->db->update("automation_paypal", $data);
		return;
	}

	public function get_all_active_projects() {

		$this->db->select("project.*,user.*,project_category.project_category_name");
		$this->db->from("project");
		$this->db->join("user", "project.user_id= user.user_id", "left");
		$this->db->join("project_category", "project.category_id= project_category.project_category_id", "left");
		$this->db->where("project.active", "1");
		$this->db->where("DATE(project.end_date) >= ", date("Y-m-d"));
		$this->db->order_by("project.project_title", "asc");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function update_step2() {

		$automation_paypal = $this->get_automation_paypal();
		if (($this->input->post("donate_amount") != "") && $this->input->post("donate_amount") > 0)
		{
			$perk_id = 0;
			$donate_amount = $this->input->post("donate_amount");
		}
		 else 
		{
			$perk_id = $this->input->post("perk_id");
			$query = $this->db->get_where("perk", array("perk_id" => $perk_id));
			$perk_detail = $query->row();
			$donate_amount = $perk_detail->perk_amount;
		}
		$data = array("project_id" => $this->input->post("project_id"), "perk_id" => $perk_id, "donate_amount" => $donate_amount);
		$this->db->where("automation_paypal_id", $automation_paypal->automation_paypal_id);
		$this->db->update("automation_paypal", $data);
		return;
	}

	public function get_paypal_detail() {

		$query = $this->db->get("paypal");
		if ($query->num_rows() > 0)
		{
			return $query->row();
		}
		return 0;
	}

	public function paypal_insert() {

		$data = array("site_status" => $this->input->post("site_status"), "preapproval" => $this->input->post("preapproval"), "application_id" => $this->input->post("application_id"), "paypal_email" => $this->input->post("paypal_email"), "paypal_username" => $this->input->post("paypal_username"), "paypal_password" => $this->input->post("paypal_password"), "paypal_signature" => $this->input->post("paypal_signature"), "fees_taken_from" => $this->input->post("fees_taken_from"));
		$this->db->insert("automation_paypal", $data);
		return;
	}

	public function paypal_update() {

		$data = array("site_status" => $this->input->post("site_status"), "preapproval" => $this->input->post("preapproval"), "application_id" => $this->input->post("application_id"), "paypal_email" => $this->input->post("paypal_email"), "paypal_username" => $this->input->post("paypal_username"), "paypal_password" => $this->input->post("paypal_password"), "paypal_signature" => $this->input->post("paypal_signature"), "fees_taken_from" => $this->input->post("fees_taken_from"));
		$this->db->where("automation_paypal_id", $this->input->post("id"));
		$this->db->update("automation_paypal", $data);
		return;
	}

};;


