<?php


class Affiliate_model extends ROCKERS_Model {

	public function Affiliate_model() {

		parent::__construct();
		return;
	}

	public function check_affiliate_request() {

		$query = $this->db->get_where("affiliate_request", array("user_id" => $this->session->userdata("user_id")));
		if ($query->num_rows() > 0)
		{
			return $query->row();
		}
		return 0;
	}

	public function request_register() {

		$data = array("user_id" => $this->session->userdata("user_id"), "site_category" => $this->input->post("site_category"), "site_name" => $this->input->post("site_name"), "site_description" => $this->input->post("site_description"), "site_url" => $this->input->post("site_url"), "why_affiliate" => $this->input->post("why_affiliate"), "web_site_marketing" => $this->input->post("web_site_marketing"), "search_engine_marketing" => $this->input->post("search_engine_marketing"), "email_marketing" => $this->input->post("email_marketing"), "special_promotional_method" => $this->input->post("special_promotional_method"), "special_promotional_description" => $this->input->post("special_promotional_description"), "approved" => 0, "request_date" => date("Y-m-d H:i:s"), "request_ip" => $_SERVER["REMOTE_ADDR"]);
		$this->db->insert("affiliate_request", $data);
		return;
	}

	public function get_all_pending_record() {

		$common_setting = affiliate_setting();
		$hold_days = $common_setting->commission_holding_period;
		$date = date("Y-m-d");
		$query = $this->db->query("select * from affiliate_user_earn where earn_status=0 and DATE(date_sub(earn_date,interval " . $hold_days . " day)) >= '" . $date . "'");
		if ($query->num_rows() > 0)
		{
			$res = $query->result();
			foreach ($res as $row)
			{
				$this->db->where("user_earn_id", $row->user_earn_id);
				$this->db->update("affiliate_user_earn", array("earn_status" => 1));
				continue;
			}
			$data = array("cronjob" => "affiliate_update_earn_status", "date_run" => date("Y-m-d H:i:s"), "status" => "1");
			$this->db->insert("cronjob", $data);
		}
		return;
	}

	public function add_withdrawal_request() {

		$data = array("user_id" => $this->session->userdata("user_id"), "withdraw_amount" => $this->input->post("amount"), "withdraw_date" => date("Y-m-d H:i:s"), "withdraw_ip" => getrealip(), "withdraw_status" => 0);
		$insert = $this->db->insert("affiliate_withdraw_request", $data);
		if ($insert)
		{
			return true;
		}
		return false;
	}

	public function get_total_withdraw_request_count($filter) {

		$this->db->select("afrq.*,us.*");
		$this->db->from("affiliate_withdraw_request afrq");
		$this->db->join("user us", "afrq.user_id=us.user_id");
		$this->db->where("afrq.user_id", $this->session->userdata("user_id"));
		if ($filter == "approve")
		{
			$this->db->where("afrq.withdraw_status", 1);
		}
		 else 
		{
			if ($filter == "success")
			{
				$this->db->where("afrq.withdraw_status", 2);
			}
			 else 
			{
				if ($filter == "reject")
				{
					$this->db->where("afrq.withdraw_status", 3);
				}
				 else 
				{
					if ($filter == "fail")
					{
						$this->db->where("afrq.withdraw_status", 4);
					}
					 else 
					{
						if ($filter == "pending")
						{
							$this->db->where("afrq.withdraw_status", 0);
						}
					}
				}
			}
		}
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function get_withdraw_request($filter, $offset, $limit) {

		$this->db->select("afrq.*,us.*");
		$this->db->from("affiliate_withdraw_request afrq");
		$this->db->join("user us", "afrq.user_id=us.user_id");
		$this->db->where("afrq.user_id", $this->session->userdata("user_id"));
		if ($filter == "approve")
		{
			$this->db->where("afrq.withdraw_status", 1);
		}
		 else 
		{
			if ($filter == "success")
			{
				$this->db->where("afrq.withdraw_status", 2);
			}
			 else 
			{
				if ($filter == "reject")
				{
					$this->db->where("afrq.withdraw_status", 3);
				}
				 else 
				{
					if ($filter == "fail")
					{
						$this->db->where("afrq.withdraw_status", 4);
					}
					 else 
					{
						if ($filter == "pending")
						{
							$this->db->where("afrq.withdraw_status", 0);
						}
					}
				}
			}
		}
		$this->db->order_by("afrq.affiliate_withdraw_id", "desc");
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function get_total_commission_history_count() {

		$this->db->select("usern.*,us.*,prj.*");
		$this->db->from("affiliate_user_earn usern");
		$this->db->join("user us", "usern.referral_user_id=us.user_id", "left");
		$this->db->join("project prj", "usern.project_id=prj.project_id", "left");
		$this->db->where("usern.user_id", $this->session->userdata("user_id"));
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function get_commission_history($offset, $limit) {

		$this->db->select("usern.*,us.*,prj.*");
		$this->db->from("affiliate_user_earn usern");
		$this->db->join("user us", "usern.referral_user_id=us.user_id", "left");
		$this->db->join("project prj", "usern.project_id=prj.project_id", "left");
		$this->db->where("usern.user_id", $this->session->userdata("user_id"));
		$this->db->order_by("usern.user_earn_id", "desc");
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function get_total_affiliate_withdraw_request_pending_today() {

		$date = date("Y-m-d");
		$this->db->select("*");
		$this->db->from("affiliate_withdraw_request");
		$this->db->where("DATE(withdraw_date)", $date);
		$this->db->where("withdraw_status", 0);
		$this->db->where("user_id", $this->session->userdata("user_id"));
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}

	public function get_total_affiliate_withdraw_request_pending_week() {

		$cur_date = date("Y-m-d");
		$first_date = get_first_day_of_week($cur_date);
		$last_date = get_last_day_of_week($cur_date);
		$this->db->select("*");
		$this->db->from("affiliate_withdraw_request");
		$this->db->where("DATE(withdraw_date) >= ", $first_date);
		$this->db->where("DATE(withdraw_date) <= ", $last_date);
		$this->db->where("withdraw_status", 0);
		$this->db->where("user_id", $this->session->userdata("user_id"));
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}

	public function get_total_affiliate_withdraw_request_pending_month() {

		$cur_date = date("Y-m-d");
		$cur_month = date("m");
		$cur_year = date("Y");
		$this->db->select("*");
		$this->db->from("affiliate_withdraw_request");
		$this->db->where("MONTH(withdraw_date)", $cur_month);
		$this->db->where("YEAR(withdraw_date)", $cur_year);
		$this->db->where("withdraw_status", 0);
		$this->db->where("user_id", $this->session->userdata("user_id"));
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}

	public function get_total_affiliate_withdraw_request_pending_total() {

		$this->db->select("*");
		$this->db->from("affiliate_withdraw_request");
		$this->db->where("withdraw_status", 0);
		$this->db->where("user_id", $this->session->userdata("user_id"));
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}

	public function get_total_affiliate_withdraw_request_approved_today() {

		$date = date("Y-m-d");
		$this->db->select("*");
		$this->db->from("affiliate_withdraw_request");
		$this->db->where("DATE(withdraw_date)", $date);
		$this->db->where("withdraw_status", 1);
		$this->db->where("user_id", $this->session->userdata("user_id"));
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}

	public function get_total_affiliate_withdraw_request_approved_week() {

		$cur_date = date("Y-m-d");
		$first_date = get_first_day_of_week($cur_date);
		$last_date = get_last_day_of_week($cur_date);
		$this->db->select("*");
		$this->db->from("affiliate_withdraw_request");
		$this->db->where("DATE(withdraw_date) >= ", $first_date);
		$this->db->where("DATE(withdraw_date) <= ", $last_date);
		$this->db->where("withdraw_status", 1);
		$this->db->where("user_id", $this->session->userdata("user_id"));
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}

	public function get_total_affiliate_withdraw_request_approved_month() {

		$cur_date = date("Y-m-d");
		$cur_month = date("m");
		$cur_year = date("Y");
		$this->db->select("*");
		$this->db->from("affiliate_withdraw_request");
		$this->db->where("MONTH(withdraw_date)", $cur_month);
		$this->db->where("YEAR(withdraw_date)", $cur_year);
		$this->db->where("withdraw_status", 1);
		$this->db->where("user_id", $this->session->userdata("user_id"));
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}

	public function get_total_affiliate_withdraw_request_approved_total() {

		$this->db->select("*");
		$this->db->from("affiliate_withdraw_request");
		$this->db->where("withdraw_status", 1);
		$this->db->where("user_id", $this->session->userdata("user_id"));
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}

	public function get_total_affiliate_withdraw_request_reject_today() {

		$date = date("Y-m-d");
		$this->db->select("*");
		$this->db->from("affiliate_withdraw_request");
		$this->db->where("DATE(withdraw_date)", $date);
		$this->db->where("withdraw_status", 3);
		$this->db->where("user_id", $this->session->userdata("user_id"));
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}

	public function get_total_affiliate_withdraw_request_reject_week() {

		$cur_date = date("Y-m-d");
		$first_date = get_first_day_of_week($cur_date);
		$last_date = get_last_day_of_week($cur_date);
		$this->db->select("*");
		$this->db->from("affiliate_withdraw_request");
		$this->db->where("DATE(withdraw_date) >= ", $first_date);
		$this->db->where("DATE(withdraw_date) <= ", $last_date);
		$this->db->where("withdraw_status", 3);
		$this->db->where("user_id", $this->session->userdata("user_id"));
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}

	public function get_total_affiliate_withdraw_request_reject_month() {

		$cur_date = date("Y-m-d");
		$cur_month = date("m");
		$cur_year = date("Y");
		$this->db->select("*");
		$this->db->from("affiliate_withdraw_request");
		$this->db->where("MONTH(withdraw_date)", $cur_month);
		$this->db->where("YEAR(withdraw_date)", $cur_year);
		$this->db->where("withdraw_status", 3);
		$this->db->where("user_id", $this->session->userdata("user_id"));
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}

	public function get_total_affiliate_withdraw_request_reject_total() {

		$this->db->select("*");
		$this->db->from("affiliate_withdraw_request");
		$this->db->where("withdraw_status", 3);
		$this->db->where("user_id", $this->session->userdata("user_id"));
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}

	public function get_total_affiliate_withdraw_request_success_today() {

		$date = date("Y-m-d");
		$this->db->select("*");
		$this->db->from("affiliate_withdraw_request");
		$this->db->where("DATE(withdraw_date)", $date);
		$this->db->where("withdraw_status", 2);
		$this->db->where("user_id", $this->session->userdata("user_id"));
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}

	public function get_total_affiliate_withdraw_request_success_week() {

		$cur_date = date("Y-m-d");
		$first_date = get_first_day_of_week($cur_date);
		$last_date = get_last_day_of_week($cur_date);
		$this->db->select("*");
		$this->db->from("affiliate_withdraw_request");
		$this->db->where("DATE(withdraw_date) >= ", $first_date);
		$this->db->where("DATE(withdraw_date) <= ", $last_date);
		$this->db->where("withdraw_status", 2);
		$this->db->where("user_id", $this->session->userdata("user_id"));
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}

	public function get_total_affiliate_withdraw_request_success_month() {

		$cur_date = date("Y-m-d");
		$cur_month = date("m");
		$cur_year = date("Y");
		$this->db->select("*");
		$this->db->from("affiliate_withdraw_request");
		$this->db->where("MONTH(withdraw_date)", $cur_month);
		$this->db->where("YEAR(withdraw_date)", $cur_year);
		$this->db->where("withdraw_status", 2);
		$this->db->where("user_id", $this->session->userdata("user_id"));
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}

	public function get_total_affiliate_withdraw_request_success_total() {

		$this->db->select("*");
		$this->db->from("affiliate_withdraw_request");
		$this->db->where("withdraw_status", 2);
		$this->db->where("user_id", $this->session->userdata("user_id"));
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}

	public function get_total_affiliate_withdraw_request_fail_today() {

		$date = date("Y-m-d");
		$this->db->select("*");
		$this->db->from("affiliate_withdraw_request");
		$this->db->where("DATE(withdraw_date)", $date);
		$this->db->where("withdraw_status", 4);
		$this->db->where("user_id", $this->session->userdata("user_id"));
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}

	public function get_total_affiliate_withdraw_request_fail_week() {

		$cur_date = date("Y-m-d");
		$first_date = get_first_day_of_week($cur_date);
		$last_date = get_last_day_of_week($cur_date);
		$this->db->select("*");
		$this->db->from("affiliate_withdraw_request");
		$this->db->where("DATE(withdraw_date) >= ", $first_date);
		$this->db->where("DATE(withdraw_date) <= ", $last_date);
		$this->db->where("withdraw_status", 4);
		$this->db->where("user_id", $this->session->userdata("user_id"));
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}

	public function get_total_affiliate_withdraw_request_fail_month() {

		$cur_date = date("Y-m-d");
		$cur_month = date("m");
		$cur_year = date("Y");
		$this->db->select("*");
		$this->db->from("affiliate_withdraw_request");
		$this->db->where("MONTH(withdraw_date)", $cur_month);
		$this->db->where("YEAR(withdraw_date)", $cur_year);
		$this->db->where("withdraw_status", 4);
		$this->db->where("user_id", $this->session->userdata("user_id"));
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}

	public function get_total_affiliate_withdraw_request_fail_total() {

		$this->db->select("*");
		$this->db->from("affiliate_withdraw_request");
		$this->db->where("withdraw_status", 4);
		$this->db->where("user_id", $this->session->userdata("user_id"));
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}

	public function get_affiliate_pending_today() {

		$date = date("Y-m-d");
		$this->db->select("SUM(earn_amount) as affiliate_pending_today");
		$this->db->from("affiliate_user_earn");
		$this->db->where("DATE(earn_date)", $date);
		$this->db->where("earn_status", 0);
		$this->db->where("user_id", $this->session->userdata("user_id"));
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$res = $query->row();
			if ($res->affiliate_pending_today > 0)
			{
				return $res->affiliate_pending_today;
			}
			return 0;
		}
		return 0;
	}

	public function get_affiliate_pending_week() {

		$cur_date = date("Y-m-d");
		$first_date = get_first_day_of_week($cur_date);
		$last_date = get_last_day_of_week($cur_date);
		$this->db->select("SUM(earn_amount) as affiliate_pending_week");
		$this->db->from("affiliate_user_earn");
		$this->db->where("DATE(earn_date) >= ", $first_date);
		$this->db->where("DATE(earn_date) <= ", $last_date);
		$this->db->where("earn_status", 0);
		$this->db->where("user_id", $this->session->userdata("user_id"));
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$res = $query->row();
			if ($res->affiliate_pending_week > 0)
			{
				return $res->affiliate_pending_week;
			}
			return 0;
		}
		return 0;
	}

	public function get_affiliate_pending_month() {

		$cur_date = date("Y-m-d");
		$cur_month = date("m");
		$cur_year = date("Y");
		$this->db->select("SUM(earn_amount) as affiliate_pending_month");
		$this->db->from("affiliate_user_earn");
		$this->db->where("MONTH(earn_date)", $cur_month);
		$this->db->where("YEAR(earn_date)", $cur_year);
		$this->db->where("earn_status", 0);
		$this->db->where("user_id", $this->session->userdata("user_id"));
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$res = $query->row();
			if ($res->affiliate_pending_month > 0)
			{
				return $res->affiliate_pending_month;
			}
			return 0;
		}
		return 0;
	}

	public function get_affiliate_pending_total() {

		$this->db->select("SUM(earn_amount) as affiliate_pending_total");
		$this->db->from("affiliate_user_earn");
		$this->db->where("earn_status", 0);
		$this->db->where("user_id", $this->session->userdata("user_id"));
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$res = $query->row();
			if ($res->affiliate_pending_total > 0)
			{
				return $res->affiliate_pending_total;
			}
			return 0;
		}
		return 0;
	}

	public function get_affiliate_cancel_today() {

		$date = date("Y-m-d");
		$this->db->select("SUM(earn_amount) as affiliate_cancel_today");
		$this->db->from("affiliate_user_earn");
		$this->db->where("DATE(earn_date)", $date);
		$this->db->where("earn_status", 2);
		$this->db->where("user_id", $this->session->userdata("user_id"));
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$res = $query->row();
			if ($res->affiliate_cancel_today > 0)
			{
				return $res->affiliate_cancel_today;
			}
			return 0;
		}
		return 0;
	}

	public function get_affiliate_cancel_week() {

		$cur_date = date("Y-m-d");
		$first_date = get_first_day_of_week($cur_date);
		$last_date = get_last_day_of_week($cur_date);
		$this->db->select("SUM(earn_amount) as affiliate_cancel_week");
		$this->db->from("affiliate_user_earn");
		$this->db->where("DATE(earn_date) >= ", $first_date);
		$this->db->where("DATE(earn_date) <= ", $last_date);
		$this->db->where("earn_status", 2);
		$this->db->where("user_id", $this->session->userdata("user_id"));
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$res = $query->row();
			if ($res->affiliate_cancel_week > 0)
			{
				return $res->affiliate_cancel_week;
			}
			return 0;
		}
		return 0;
	}

	public function get_affiliate_cancel_month() {

		$cur_date = date("Y-m-d");
		$cur_month = date("m");
		$cur_year = date("Y");
		$this->db->select("SUM(earn_amount) as affiliate_cancel_month");
		$this->db->from("affiliate_user_earn");
		$this->db->where("MONTH(earn_date)", $cur_month);
		$this->db->where("YEAR(earn_date)", $cur_year);
		$this->db->where("earn_status", 2);
		$this->db->where("user_id", $this->session->userdata("user_id"));
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$res = $query->row();
			if ($res->affiliate_cancel_month > 0)
			{
				return $res->affiliate_cancel_month;
			}
			return 0;
		}
		return 0;
	}

	public function get_affiliate_cancel_total() {

		$this->db->select("SUM(earn_amount) as affiliate_cancel_total");
		$this->db->from("affiliate_user_earn");
		$this->db->where("earn_status", 0);
		$this->db->where("user_id", $this->session->userdata("user_id"));
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$res = $query->row();
			if ($res->affiliate_cancel_total > 0)
			{
				return $res->affiliate_cancel_total;
			}
			return 0;
		}
		return 0;
	}

	public function get_affiliate_completed_today() {

		$date = date("Y-m-d");
		$this->db->select("SUM(earn_amount) as affiliate_completed_today");
		$this->db->from("affiliate_user_earn");
		$this->db->where("DATE(earn_date)", $date);
		$this->db->where("earn_status", 1);
		$this->db->where("user_id", $this->session->userdata("user_id"));
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$res = $query->row();
			if ($res->affiliate_completed_today > 0)
			{
				return $res->affiliate_completed_today;
			}
			return 0;
		}
		return 0;
	}

	public function get_affiliate_completed_week() {

		$cur_date = date("Y-m-d");
		$first_date = get_first_day_of_week($cur_date);
		$last_date = get_last_day_of_week($cur_date);
		$this->db->select("SUM(earn_amount) as affiliate_completed_week");
		$this->db->from("affiliate_user_earn");
		$this->db->where("DATE(earn_date) >= ", $first_date);
		$this->db->where("DATE(earn_date) <= ", $last_date);
		$this->db->where("earn_status", 1);
		$this->db->where("user_id", $this->session->userdata("user_id"));
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$res = $query->row();
			if ($res->affiliate_completed_week > 0)
			{
				return $res->affiliate_completed_week;
			}
			return 0;
		}
		return 0;
	}

	public function get_affiliate_completed_month() {

		$cur_date = date("Y-m-d");
		$cur_month = date("m");
		$cur_year = date("Y");
		$this->db->select("SUM(earn_amount) as affiliate_completed_month");
		$this->db->from("affiliate_user_earn");
		$this->db->where("MONTH(earn_date)", $cur_month);
		$this->db->where("YEAR(earn_date)", $cur_year);
		$this->db->where("earn_status", 1);
		$this->db->where("user_id", $this->session->userdata("user_id"));
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$res = $query->row();
			if ($res->affiliate_completed_month > 0)
			{
				return $res->affiliate_completed_month;
			}
			return 0;
		}
		return 0;
	}

	public function get_affiliate_completed_total() {

		$this->db->select("SUM(earn_amount) as affiliate_completed_total");
		$this->db->from("affiliate_user_earn");
		$this->db->where("earn_status", 1);
		$this->db->where("user_id", $this->session->userdata("user_id"));
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$res = $query->row();
			if ($res->affiliate_completed_total > 0)
			{
				return $res->affiliate_completed_total;
			}
			return 0;
		}
		return 0;
	}

	public function get_affiliate_pipeline_today() {

		$date = date("Y-m-d");
		$common_setting = affiliate_setting();
		$hold_days = $common_setting->commission_holding_period;
		$query = $this->db->query("select SUM(earn_amount) as affiliate_pipeline_today from affiliate_user_earn where earn_status=0 and  DATE(date_sub(earn_date,interval " . $hold_days . " day))='" . $date . "' and user_id='" . $this->session->userdata("user_id") . "'");
		if ($query->num_rows() > 0)
		{
			$res = $query->row();
			if ($res->affiliate_pipeline_today > 0)
			{
				return $res->affiliate_pipeline_today;
			}
			return 0;
		}
		return 0;
	}

	public function get_affiliate_pipeline_week() {

		$cur_date = date("Y-m-d");
		$first_date = get_first_day_of_week($cur_date);
		$last_date = get_last_day_of_week($cur_date);
		$common_setting = affiliate_setting();
		$hold_days = $common_setting->commission_holding_period;
		$query = $this->db->query("select SUM(earn_amount) as affiliate_pipeline_week from affiliate_user_earn where earn_status=0 and  DATE(date_sub(earn_date,interval " . $hold_days . " day))>= '" . $first_date . "' and  DATE(date_sub(earn_date,interval " . $hold_days . " day)) <='" . $last_date . "' and user_id='" . $this->session->userdata("user_id") . "'");
		if ($query->num_rows() > 0)
		{
			$res = $query->row();
			if ($res->affiliate_pipeline_week > 0)
			{
				return $res->affiliate_pipeline_week;
			}
			return 0;
		}
		return 0;
	}

	public function get_affiliate_pipeline_month() {

		$cur_month = date("m");
		$cur_year = date("Y");
		$common_setting = affiliate_setting();
		$hold_days = $common_setting->commission_holding_period;
		$query = $this->db->query("select SUM(earn_amount) as affiliate_pipeline_month from affiliate_user_earn where earn_status=0 and   MONTH(date_sub(earn_date,interval " . $hold_days . " day)) = '" . $cur_month . "' and  YEAR(date_sub(earn_date,interval " . $hold_days . " day)) ='" . $cur_year . "' and user_id='" . $this->session->userdata("user_id") . "'");
		if ($query->num_rows() > 0)
		{
			$res = $query->row();
			if ($res->affiliate_pipeline_month > 0)
			{
				return $res->affiliate_pipeline_month;
			}
			return 0;
		}
		return 0;
	}

	public function get_affiliate_pipeline_total() {

		$date = date("Y-m-d");
		$common_setting = affiliate_setting();
		$hold_days = $common_setting->commission_holding_period;
		$query = $this->db->query("select SUM(earn_amount) as affiliate_pipeline_total from affiliate_user_earn where  earn_status=0 and  DATE(date_sub(earn_date,interval " . $hold_days . " day))>='" . $date . "' and user_id='" . $this->session->userdata("user_id") . "'");
		if ($query->num_rows() > 0)
		{
			$res = $query->row();
			if ($res->affiliate_pipeline_total > 0)
			{
				return $res->affiliate_pipeline_total;
			}
			return 0;
		}
		return 0;
	}

};;


