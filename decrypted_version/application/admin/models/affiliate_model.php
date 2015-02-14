<?php


class Affiliate_model extends CI_Model {

	public function Affiliate_model() {

		parent::__construct();
		return;
	}

	public function get_common_settings() {

		$query = $this->db->get("affiliate_common_settings");
		if ($query->num_rows() > 0)
		{
			return $query->row_array();
		}
		return 0;
	}

	public function common_settings_update() {

		$affiliate_content = str_replace(array(",", "`"), "", $this->input->post("affiliate_content"));
		$affiliate_content = str_replace("\"", "KSYDOU", $affiliate_content);
		$affiliate_content = str_replace("'", "KSYSING", $affiliate_content);
		$data = array("cookie_expire_time" => $this->input->post("cookie_expire_time"), "commission_holding_period" => $this->input->post("commission_holding_period"), "pay_commission_pledge" => $this->input->post("pay_commission_pledge"), "pay_commission_project_listing" => $this->input->post("pay_commission_project_listing"), "minimum_withdrawal_threshold" => $this->input->post("minimum_withdrawal_threshold"), "transaction_fee" => $this->input->post("transaction_fee"), "fee_type" => $this->input->post("fee_type"), "affiliate_enable" => $this->input->post("affiliate_enable"), "affiliate_content" => $affiliate_content);
		$this->db->where("common_settings_id", $this->input->post("common_settings_id"));
		$this->db->update("affiliate_common_settings", $data);
		return;
	}

	public function get_commission_settings() {

		$query = $this->db->get("affiliate_commission_settings");
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		return 0;
	}

	public function commission_settings_update() {

		$i = 1;
		while ($i <= 3)
		{
			$data = array("commission" => $this->input->post("commission_" . $i), "type" => $this->input->post("type_" . $i), "active" => $this->input->post("active_" . $i));
			$this->db->where("commission_settings_id", $this->input->post("commission_settings_id_" . $i));
			$this->db->update("affiliate_commission_settings", $data);
			$i++;
			continue;
		}
		return;
	}

	public function get_perk_detail_by_id($perk_id) {

		$query = $this->db->get_where("perk", array("perk_id" => $perk_id));
		if ($query->num_rows() > 0)
		{
			return $query->row();
		}
		return 0;
	}

	public function get_user_detail_by_id($user_id) {

		$query = $this->db->get_where("user", array("user_id" => $user_id));
		if ($query->num_rows() > 0)
		{
			return $query->row();
		}
		return 0;
	}

	public function get_total_withdraw_request_count($filter) {

		$this->db->select("afrq.*,us.*");
		$this->db->from("affiliate_withdraw_request afrq");
		$this->db->join("user us", "afrq.user_id=us.user_id");
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
			return $query->result_array();
		}
		return 0;
	}

	public function get_total_search_withdraw_request_count($filter, $option, $keyword) {

		$keyword = str_replace("\"", "", str_replace(array("'", ",", "%", '' . "\$", "&", "*", "#", "(", ")", ":", ";", ">", "<", "/"), "", $keyword));
		$this->db->select("afrq.*,us.*");
		$this->db->from("affiliate_withdraw_request afrq");
		$this->db->join("user us", "afrq.user_id=us.user_id");
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
		$this->db->like($option, $keyword);
		if (substr_count($keyword, " ") >= 1)
		{
			$ex = explode(" ", $keyword);
			foreach ($ex as $val)
			{
				$this->db->or_like($option, $val);
				continue;
			}
		}
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function get_search_withdraw_request_result($filter, $option, $keyword, $offset, $limit) {

		$keyword = str_replace("\"", "", str_replace(array("'", ",", "%", '' . "\$", "&", "*", "#", "(", ")", ":", ";", ">", "<", "/"), "", $keyword));
		$this->db->select("afrq.*,us.*");
		$this->db->from("affiliate_withdraw_request afrq");
		$this->db->join("user us", "afrq.user_id=us.user_id");
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
		$this->db->like($option, $keyword);
		if (substr_count($keyword, " ") >= 1)
		{
			$ex = explode(" ", $keyword);
			foreach ($ex as $val)
			{
				$this->db->or_like($option, $val);
				continue;
			}
		}
		$this->db->order_by("afrq.affiliate_withdraw_id", "desc");
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		return 0;
	}

	public function get_total_commission_history_count() {

		$this->db->select("usern.*,us.*,prj.*");
		$this->db->from("affiliate_user_earn usern");
		$this->db->join("user us", "usern.user_id=us.user_id");
		$this->db->join("project prj", "usern.project_id=prj.project_id", "left");
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function get_commission_history($offset, $limit) {

		$this->db->select("usern.*,us.*,prj.*");
		$this->db->from("affiliate_user_earn usern");
		$this->db->join("user us", "usern.user_id=us.user_id");
		$this->db->join("project prj", "usern.project_id=prj.project_id", "left");
		$this->db->order_by("usern.user_earn_id", "desc");
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		return 0;
	}

	public function get_total_search_commission_history_count($option, $keyword) {

		$keyword = str_replace("\"", "", str_replace(array("'", ",", "%", '' . "\$", "&", "*", "#", "(", ")", ":", ";", ">", "<", "/"), "", $keyword));
		$this->db->select("usern.*,us.*,prj.*");
		$this->db->from("affiliate_user_earn usern");
		$this->db->join("user us", "usern.user_id=us.user_id");
		$this->db->join("project prj", "usern.project_id=prj.project_id", "left");
		$this->db->like($option, $keyword);
		if (substr_count($keyword, " ") >= 1)
		{
			$ex = explode(" ", $keyword);
			foreach ($ex as $val)
			{
				$this->db->or_like($option, $val);
				continue;
			}
		}
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function get_search_commission_history_result($option, $keyword, $offset, $limit) {

		$keyword = str_replace("\"", "", str_replace(array("'", ",", "%", '' . "\$", "&", "*", "#", "(", ")", ":", ";", ">", "<", "/"), "", $keyword));
		$this->db->select("usern.*,us.*,prj.*");
		$this->db->from("affiliate_user_earn usern");
		$this->db->join("user us", "usern.user_id=us.user_id");
		$this->db->join("project prj", "usern.project_id=prj.project_id", "left");
		$this->db->like($option, $keyword);
		if (substr_count($keyword, " ") >= 1)
		{
			$ex = explode(" ", $keyword);
			foreach ($ex as $val)
			{
				$this->db->or_like($option, $val);
				continue;
			}
		}
		$this->db->order_by("usern.user_earn_id", "desc");
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		return 0;
	}

	public function get_total_affiliate_withdraw_request_pending_today() {

		$date = date("Y-m-d");
		$this->db->select("*");
		$this->db->from("affiliate_withdraw_request");
		$this->db->where("DATE(withdraw_date)", $date);
		$this->db->where("withdraw_status", 0);
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
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}

	public function get_total_affiliate_request_approved_today() {

		$date = date("Y-m-d");
		$this->db->select("*");
		$this->db->from("affiliate_request");
		$this->db->where("DATE(request_date)", $date);
		$this->db->where("approved", 1);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}

	public function get_total_affiliate_request_approved_week() {

		$cur_date = date("Y-m-d");
		$first_date = get_first_day_of_week($cur_date);
		$last_date = get_last_day_of_week($cur_date);
		$this->db->select("*");
		$this->db->from("affiliate_request");
		$this->db->where("DATE(request_date) >= ", $first_date);
		$this->db->where("DATE(request_date) <= ", $last_date);
		$this->db->where("approved", 1);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}

	public function get_total_affiliate_request_approved_month() {

		$cur_date = date("Y-m-d");
		$cur_month = date("m");
		$cur_year = date("Y");
		$this->db->select("*");
		$this->db->from("affiliate_request");
		$this->db->where("MONTH(request_date)", $cur_month);
		$this->db->where("YEAR(request_date)", $cur_year);
		$this->db->where("approved", 1);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}

	public function get_total_affiliate_request_approved_total() {

		$this->db->select("*");
		$this->db->from("affiliate_request");
		$this->db->where("approved", 1);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}

	public function get_total_affiliate_request_waiting_today() {

		$date = date("Y-m-d");
		$this->db->select("*");
		$this->db->from("affiliate_request");
		$this->db->where("DATE(request_date)", $date);
		$this->db->where("approved", 0);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}

	public function get_total_affiliate_request_waiting_week() {

		$cur_date = date("Y-m-d");
		$first_date = get_first_day_of_week($cur_date);
		$last_date = get_last_day_of_week($cur_date);
		$this->db->select("*");
		$this->db->from("affiliate_request");
		$this->db->where("DATE(request_date) >= ", $first_date);
		$this->db->where("DATE(request_date) <= ", $last_date);
		$this->db->where("approved", 0);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}

	public function get_total_affiliate_request_waiting_month() {

		$cur_date = date("Y-m-d");
		$cur_month = date("m");
		$cur_year = date("Y");
		$this->db->select("*");
		$this->db->from("affiliate_request");
		$this->db->where("MONTH(request_date)", $cur_month);
		$this->db->where("YEAR(request_date)", $cur_year);
		$this->db->where("approved", 0);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}

	public function get_total_affiliate_request_waiting_total() {

		$this->db->select("*");
		$this->db->from("affiliate_request");
		$this->db->where("approved", 0);
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
		$common_setting = $this->get_common_settings();
		$hold_days = $common_setting["commission_holding_period"];
		$query = $this->db->query("select SUM(earn_amount) as affiliate_pipeline_today from affiliate_user_earn where earn_status=0 and  DATE(date_sub(earn_date,interval " . $hold_days . " day))='" . $date . "'");
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
		$common_setting = $this->get_common_settings();
		$hold_days = $common_setting["commission_holding_period"];
		$query = $this->db->query("select SUM(earn_amount) as affiliate_pipeline_week from affiliate_user_earn where earn_status=0 and  DATE(date_sub(earn_date,interval " . $hold_days . " day))>= '" . $first_date . "' and  DATE(date_sub(earn_date,interval " . $hold_days . " day)) <='" . $last_date . "'");
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
		$common_setting = $this->get_common_settings();
		$hold_days = $common_setting["commission_holding_period"];
		$query = $this->db->query("select SUM(earn_amount) as affiliate_pipeline_month from affiliate_user_earn where earn_status=0 and   MONTH(date_sub(earn_date,interval " . $hold_days . " day)) = '" . $cur_month . "' and  YEAR(date_sub(earn_date,interval " . $hold_days . " day)) ='" . $cur_year . "'");
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
		$common_setting = $this->get_common_settings();
		$hold_days = $common_setting["commission_holding_period"];
		$query = $this->db->query("select SUM(earn_amount) as affiliate_pipeline_total from affiliate_user_earn where  earn_status=0 and  DATE(date_sub(earn_date,interval " . $hold_days . " day))>='" . $date . "'");
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


