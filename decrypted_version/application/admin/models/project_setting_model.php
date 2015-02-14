<?php


class Project_setting_model extends CI_Model {

	public function Project_setting_model() {

		parent::__construct();
		return;
	}

	public function project_setting_update() {

		$data = array("enable_paypal" => $this->input->post("enable_paypal"), "payment_flow" => $this->input->post("payment_flow"), "pay_fee" => $this->input->post("pay_fee"), "project_listing_fee" => $this->input->post("project_listing_fee"), "project_listing_fee_type" => $this->input->post("project_listing_fee_type"), "commission" => $this->input->post("commission"), "project_short_desc_length" => $this->input->post("project_short_desc_length"), "site_stat_front" => $this->input->post("site_stat_front"), "min_project_amount" => $this->input->post("min_project_amount"), "max_project_amount" => $this->input->post("max_project_amount"), "project_user" => $this->input->post("project_user"), "edit_amount" => $this->input->post("edit_amount"), "edit_end_date" => $this->input->post("edit_end_date"), "approve_project" => $this->input->post("approve_project"), "cancel_project" => $this->input->post("cancel_project"), "default_pledge" => $this->input->post("default_pledge"), "enable_fixed_pledge" => $this->input->post("enable_fixed_pledge"), "enable_owner_fixed_amount" => $this->input->post("enable_owner_fixed_amount"), "enable_multiple_type" => $this->input->post("enable_multiple_type"), "enable_owner_multiple_amount" => $this->input->post("enable_owner_multiple_amount"), "enable_suggested_type" => $this->input->post("enable_suggested_type"), "enable_owner_suggested_amount" => $this->input->post("enable_owner_suggested_amount"), "enable_min_amount" => $this->input->post("enable_min_amount"), "enable_owner_min_amount" => $this->input->post("enable_owner_min_amount"), "allow_guest_backers_list" => $this->input->post("allow_guest_backers_list"), "allow_guest_backers_amount" => $this->input->post("allow_guest_backers_amount"), "allow_backers_amount" => $this->input->post("allow_backers_amount"), "allow_cancel_pledge_backers" => $this->input->post("allow_cancel_pledge_backers"), "min_days_pledge_cancel" => $this->input->post("min_days_pledge_cancel"), "allow_cancel_pledge_owner" => $this->input->post("allow_cancel_pledge_owner"), "allow_owner_fund_own" => $this->input->post("allow_owner_fund_own"), "allow_owner_fund_other" => $this->input->post("allow_owner_fund_other"), "enable_project_reward" => $this->input->post("enable_project_reward"), "reward_detail_optional" => $this->input->post("reward_detail_optional"), "allow_owner_edit_reward" => $this->input->post("allow_owner_edit_reward"), "small_project_max_days" => $this->input->post("small_project_max_days"), "small_project_max_amount" => $this->input->post("small_project_max_amount"), "funded_percentage" => $this->input->post("funded_percentage"), "no_of_category" => $this->input->post("no_of_category"), "enable_overfund" => $this->input->post("enable_overfund"), "owner_set_overfund" => $this->input->post("owner_set_overfund"), "enable_project_follower" => $this->input->post("enable_project_follower"), "enable_project_comment" => $this->input->post("enable_project_comment"), "enable_update_comment" => $this->input->post("enable_update_comment"), "enable_project_rating" => $this->input->post("enable_project_rating"), "logged_user_login" => $this->input->post("logged_user_login"), "enable_project_flag" => $this->input->post("enable_project_flag"), "auto_suspend_project" => $this->input->post("auto_suspend_project"), "auto_fund_capture" => $this->input->post("auto_fund_capture"), "auto_suspend_comment" => $this->input->post("auto_suspend_comment"), "auto_suspend_update" => $this->input->post("auto_suspend_update"), "auto_suspend" => $this->input->post("auto_suspend"), "auto_suspend_message" => $this->input->post("auto_suspend_message"));
		$this->db->where("project_setting_id", $this->input->post("project_setting_id"));
		$this->db->update("project_setting", $data);
		return;
	}

	public function get_one_project_setting() {

		$query = $this->db->get_where("project_setting");
		return $query->row_array();
	}

};;


