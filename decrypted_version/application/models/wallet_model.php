<?php


class Wallet_model extends ROCKERS_Model {

	public function Wallet_model() {

		parent::__construct();
		return;
	}

	public function get_total_my_wallet_list() {

		$query = $this->db->query("select * from wallet where user_id='" . $this->session->userdata("user_id") . "' and donate_status not in ('2','3')  order by id desc ");
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}

	public function my_wallet_list($offset, $limit) {

		$query = $this->db->query("select * from wallet where user_id='" . $this->session->userdata("user_id") . "' and donate_status not in ('2','3') order by id desc limit " . $limit . " offset " . $offset);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function get_total_my_withdraw_list() {

		$query = $this->db->query("select * from wallet_withdraw where user_id='" . $this->session->userdata("user_id") . "' order by withdraw_id desc");
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}

	public function my_withdraw_list($offset, $limit) {

		$query = $this->db->query("select * from wallet_withdraw where user_id='" . $this->session->userdata("user_id") . "' order by withdraw_id desc limit " . $limit . " offset " . $offset);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function get_last_detail($id = "") {

		$query = $this->db->query('' . "select withdraw_id from wallet_withdraw where user_id='" . $id . "' order by withdraw_id desc");
		if ($query->num_rows() > 0)
		{
			$row = $query->result();
			foreach ($row as $r)
			{
				$query1 = $this->db->query("select * from wallet_bank where withdraw_id='" . $r->withdraw_id . "'");
				if ($query1->num_rows() > 0)
				{
					continue;
				}
				$row = $query1->row();
				return $row->withdraw_id;
			}
		}
		return;
	}

	public function get_bank_detail($uid = "") {

		$query = $this->db->query('' . "SELECT * FROM wallet_bank b,wallet_withdraw w WHERE b.withdraw_id = w.withdraw_id AND w.user_id = '" . $uid . "' AND b.bank_withdraw_type='bank' ORDER BY b.bank_id DESC LIMIT 0 , 1");
		if ($query->num_rows() > 0)
		{
			return $query->row();
		}
		return 0;
	}

	public function get_payment_getway_detail($uid = "") {

		$query = $this->db->query('' . "SELECT * FROM wallet_withdraw_gateway b, wallet_withdraw w WHERE b.withdraw_id = w.withdraw_id AND w.user_id = '" . $uid . "' ORDER BY b.gateway_withdraw_id desc LIMIT 0 , 1");
		if ($query->num_rows() > 0)
		{
			return $query->row();
		}
		return 0;
	}

	public function get_check_detail($uid) {

		$query = $this->db->query('' . "SELECT * FROM wallet_bank b, wallet_withdraw w WHERE b.withdraw_id = w.withdraw_id AND w.user_id = '" . $uid . "' AND b.bank_withdraw_type='check' ORDER BY b.bank_id desc LIMIT 0 , 1");
		if ($query->num_rows() > 0)
		{
			return $query->row();
		}
		return 0;
	}

	public function add_withdraw_request() {

		$withdraw_method = $this->input->post("withdraw_method");
		$amount = $this->input->post("amount");
		$data_withdraw = array("user_id" => $this->session->userdata("user_id"), "withdraw_date" => date("Y-m-d H:i:s"), "withdraw_ip" => $_SERVER["REMOTE_ADDR"], "withdraw_method" => $withdraw_method, "withdraw_amount" => $amount, "withdraw_status" => "pending");
		$this->db->insert("wallet_withdraw", $data_withdraw);
		$withdraw_id = mysql_insert_id();
		if ($withdraw_method == "bank")
		{
			$data_bank = array("withdraw_id" => $withdraw_id, "bank_name" => $this->input->post("bank_name"), "bank_branch" => $this->input->post("bank_branch"), "bank_ifsc_code" => $this->input->post("bank_ifsc_code"), "bank_address" => $this->input->post("bank_address"), "bank_city" => $this->input->post("bank_city"), "bank_state" => $this->input->post("bank_state"), "bank_country" => $this->input->post("bank_country"), "bank_zipcode" => $this->input->post("bank_zipcode"), "bank_account_holder_name" => $this->input->post("bank_account_holder_name"), "bank_account_number" => $this->input->post("bank_account_number"), "bank_withdraw_type" => "bank");
			$this->db->insert("wallet_bank", $data_bank);
		}
		if ($withdraw_method == "check")
		{
			$data_check = array("withdraw_id" => $withdraw_id, "bank_name" => $this->input->post("check_name"), "bank_branch" => $this->input->post("check_branch"), "bank_unique_id" => $this->input->post("check_unique_id"), "bank_address" => $this->input->post("check_address"), "bank_city" => $this->input->post("check_city"), "bank_state" => $this->input->post("check_state"), "bank_country" => $this->input->post("check_country"), "bank_zipcode" => $this->input->post("check_zipcode"), "bank_account_holder_name" => $this->input->post("check_account_holder_name"), "bank_account_number" => $this->input->post("check_account_number"), "bank_withdraw_type" => "check");
			$this->db->insert("wallet_bank", $data_check);
		}
		if ($withdraw_method == "gateway")
		{
			$data_gateway = array("withdraw_id" => $withdraw_id, "gateway_name" => $this->input->post("gateway_name"), "gateway_account" => $this->input->post("gateway_account"), "gateway_city" => $this->input->post("gateway_city"), "gateway_state" => $this->input->post("gateway_state"), "gateway_country" => $this->input->post("gateway_country"), "gateway_zip" => $this->input->post("gateway_zip"));
			$this->db->insert("wallet_withdraw_gateway", $data_gateway);
		}
		return $withdraw_id;
	}

	public function update_withdraw_request() {

		$withdraw_method = $this->input->post("withdraw_method");
		$amount = $this->input->post("amount");
		$withdraw_id = $this->input->post("withdraw_id");
		$data_withdraw = array("user_id" => $this->session->userdata("user_id"), "withdraw_date" => date("Y-m-d H:i:s"), "withdraw_ip" => $_SERVER["REMOTE_ADDR"], "withdraw_method" => $withdraw_method, "withdraw_amount" => $amount, "withdraw_status" => "pending");
		$this->db->where("withdraw_id", $withdraw_id);
		$this->db->update("wallet_withdraw", $data_withdraw);
		if ($withdraw_method == "bank")
		{
			$get_bank_details = $this->db->query("select * from wallet_bank where bank_withdraw_type='bank' and withdraw_id='" . $withdraw_id . "'");
			if ($get_bank_details->num_rows() > 0)
			{
				$data_bank = array("withdraw_id" => $withdraw_id, "bank_name" => $this->input->post("bank_name"), "bank_branch" => $this->input->post("bank_branch"), "bank_ifsc_code" => $this->input->post("bank_ifsc_code"), "bank_address" => $this->input->post("bank_address"), "bank_city" => $this->input->post("bank_city"), "bank_state" => $this->input->post("bank_state"), "bank_country" => $this->input->post("bank_country"), "bank_zipcode" => $this->input->post("bank_zipcode"), "bank_account_holder_name" => $this->input->post("bank_account_holder_name"), "bank_account_number" => $this->input->post("bank_account_number"), "bank_withdraw_type" => "bank");
				$this->db->where("withdraw_id", $withdraw_id);
				$this->db->update("wallet_bank", $data_bank);
			}
			 else 
			{
				$data_bank = array("withdraw_id" => $withdraw_id, "bank_name" => $this->input->post("bank_name"), "bank_branch" => $this->input->post("bank_branch"), "bank_ifsc_code" => $this->input->post("bank_ifsc_code"), "bank_address" => $this->input->post("bank_address"), "bank_city" => $this->input->post("bank_city"), "bank_state" => $this->input->post("bank_state"), "bank_country" => $this->input->post("bank_country"), "bank_zipcode" => $this->input->post("bank_zipcode"), "bank_account_holder_name" => $this->input->post("bank_account_holder_name"), "bank_account_number" => $this->input->post("bank_account_number"), "bank_withdraw_type" => "bank");
				$this->db->insert("wallet_bank", $data_bank);
			}
		}
		if ($withdraw_method == "check")
		{
			$get_check_details = $this->db->query("select * from wallet_bank where bank_withdraw_type='check' and withdraw_id='" . $withdraw_id . "'");
			if ($get_check_details->num_rows() > 0)
			{
				$data_check = array("withdraw_id" => $withdraw_id, "bank_name" => $this->input->post("check_name"), "bank_branch" => $this->input->post("check_branch"), "bank_unique_id" => $this->input->post("check_unique_id"), "bank_address" => $this->input->post("check_address"), "bank_city" => $this->input->post("check_city"), "bank_state" => $this->input->post("check_state"), "bank_country" => $this->input->post("check_country"), "bank_zipcode" => $this->input->post("check_zipcode"), "bank_account_holder_name" => $this->input->post("check_account_holder_name"), "bank_account_number" => $this->input->post("check_account_number"), "bank_withdraw_type" => "check");
				$this->db->where("withdraw_id", $withdraw_id);
				$this->db->update("wallet_bank", $data_check);
			}
			 else 
			{
				$data_check = array("withdraw_id" => $withdraw_id, "bank_name" => $this->input->post("check_name"), "bank_branch" => $this->input->post("check_branch"), "bank_unique_id" => $this->input->post("check_unique_id"), "bank_address" => $this->input->post("check_address"), "bank_city" => $this->input->post("check_city"), "bank_state" => $this->input->post("check_state"), "bank_country" => $this->input->post("check_country"), "bank_zipcode" => $this->input->post("check_zipcode"), "bank_account_holder_name" => $this->input->post("check_account_holder_name"), "bank_account_number" => $this->input->post("check_account_number"), "bank_withdraw_type" => "check");
				$this->db->insert("wallet_bank", $data_check);
			}
		}
		if ($withdraw_method == "gateway")
		{
			$get_gateway_details = $this->db->query("select * from wallet_withdraw_gateway where withdraw_id='" . $withdraw_id . "'");
			if ($get_gateway_details->num_rows() > 0)
			{
				$data_gateway = array("withdraw_id" => $withdraw_id, "gateway_name" => $this->input->post("gateway_name"), "gateway_account" => $this->input->post("gateway_account"), "gateway_city" => $this->input->post("gateway_city"), "gateway_state" => $this->input->post("gateway_state"), "gateway_country" => $this->input->post("gateway_country"), "gateway_zip" => $this->input->post("gateway_zip"));
				$this->db->where("withdraw_id", $withdraw_id);
				$this->db->update("wallet_withdraw_gateway", $data_gateway);
				return;
			}
			$data_gateway = array("withdraw_id" => $withdraw_id, "gateway_name" => $this->input->post("gateway_name"), "gateway_account" => $this->input->post("gateway_account"), "gateway_city" => $this->input->post("gateway_city"), "gateway_state" => $this->input->post("gateway_state"), "gateway_country" => $this->input->post("gateway_country"), "gateway_zip" => $this->input->post("gateway_zip"));
			$this->db->insert("wallet_withdraw_gateway", $data_gateway);
		}
		return;
	}

	public function get_withdraw_detail($id) {

		$query = $this->db->query("select * from wallet_withdraw where withdraw_id='" . $id . "'");
		if ($query->num_rows() > 0)
		{
			return $query->row();
		}
		return 0;
	}

	public function get_withdraw_method_detail($withdraw_id, $type) {

		if ($type == "bank")
		{
			$get_bank_details = $this->db->query("select * from wallet_bank where bank_withdraw_type='bank' and withdraw_id='" . $withdraw_id . "'");
			if ($get_bank_details->num_rows() > 0)
			{
				return $get_bank_details->row();
			}
			return 0;
		}
		if ($type == "check")
		{
			$get_check_details = $this->db->query("select * from wallet_bank where bank_withdraw_type='check' and withdraw_id='" . $withdraw_id . "'");
			if ($get_check_details->num_rows() > 0)
			{
				return $get_check_details->row();
			}
			return 0;
		}
		if ($type == "gateway")
		{
			$get_gateway_details = $this->db->query("select * from wallet_withdraw_gateway where withdraw_id='" . $withdraw_id . "'");
			if ($get_gateway_details->num_rows() > 0)
			{
				return $get_gateway_details->row();
			}
			return 0;
		}
		return 0;
	}

	public function get_paymentact_result() {

		$this->db->order_by("id", "desc");
		$query = $this->db->get_where("payments_gateways", array("status" => "Active"));
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

};;


