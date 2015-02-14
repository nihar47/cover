<?php


class Transaction_type_model extends CI_Model {

	public function Transaction_type_model() {

		parent::__construct();
		return;
	}

	public function transaction_type_insert() {

		$data = array("transaction_type_name" => $this->input->post("transaction_type_name"));
		$this->db->insert("transaction_type", $data);
		return;
	}

	public function transaction_type_update() {

		$data = array("transaction_type_name" => $this->input->post("transaction_type_name"));
		$this->db->where("transaction_type_id", $this->input->post("transaction_type_id"));
		$this->db->update("transaction_type", $data);
		return;
	}

	public function get_one_transaction_type($id) {

		$query = $this->db->get_where("transaction_type", array("transaction_type_id" => $id));
		return $query->row_array();
	}

	public function get_total_transaction_type_count() {

		return $this->db->count_all("transaction_type");
	}

	public function get_transaction_type_result($offset, $limit) {

		$query = $this->db->get("transaction_type", $limit, $offset);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function get_total_transaction_count() {

		$this->db->select("transaction.*,project.project_title,project.url_project_title");
		$this->db->from("transaction");
		$this->db->where("transaction.wallet_payment_status !=", "3");
		$this->db->join("project", "transaction.project_id= project.project_id");
		$this->db->order_by("transaction.transaction_id", "desc");
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function get_transaction_result($offset, $limit) {

		$this->db->select("transaction.*,project.project_title,project.url_project_title");
		$this->db->from("transaction");
		$this->db->where("transaction.wallet_payment_status !=", "3");
		$this->db->join("project", "transaction.project_id= project.project_id");
		$this->db->order_by("transaction.transaction_id", "desc");
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function get_total_search_transaction_count($option, $keyword) {

		if ($option != "pay")
		{
			$keyword = str_replace("\"", "", str_replace(array("'", ",", "%", '' . "\$", "&", "*", "#", "@", "(", ")", ":", ";", ">", "<", "/"), "", $keyword));
		}
		$this->db->select("transaction.*,project.project_title,project.url_project_title,user.user_name,user.last_name");
		$this->db->from("transaction");
		$this->db->where("transaction.wallet_payment_status !=", "3");
		$this->db->join("project", "transaction.project_id= project.project_id", "left");
		$this->db->join("user", "transaction.user_id= user.user_id", "left");
		$this->db->order_by("transaction.transaction_id", "desc");
		if ($option == "title")
		{
			$this->db->like("project.project_title", $keyword);
			if (substr_count($keyword, " ") >= 1)
			{
				$ex = explode(" ", $keyword);
				foreach ($ex as $val)
				{
					$this->db->or_like("project.project_title", $val);
					continue;
				}
			}
		}
		if ($option == "user")
		{
			$this->db->like("user.user_name", $keyword);
			$this->db->or_like("user.last_name", $keyword);
			$this->db->or_like("user.user_name", substr($keyword, 0 - 3, 3));
			$this->db->or_like("user.user_name", substr($keyword, 0, 3));
			$this->db->or_like("user.last_name", substr($keyword, 0 - 3, 3));
			$this->db->or_like("user.last_name", substr($keyword, 0, 3));
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
		if ($option == "ip")
		{
			$this->db->like("transaction.host_ip", $keyword);
		}
		if ($option == "trans")
		{
			$this->db->like("transaction.wallet_transaction_id", $keyword);
			$this->db->or_like("transaction.amazon_transaction_id", $keyword);
			$this->db->or_like("transaction.paypal_paykey", $keyword);
			$this->db->or_like("transaction.preapproval_pay_key", $keyword);
			$this->db->or_like("transaction.preapproval_key", $keyword);
			$this->db->or_like("transaction.paypal_transaction_id", $keyword);
		}
		if ($option == "pay")
		{
			$this->db->like("transaction.paypal_email", $keyword);
		}
		$this->db->order_by("transaction.transaction_id", "desc");
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function get_search_transaction_result($option, $keyword, $offset, $limit) {

		if ($option != "pay")
		{
			$keyword = str_replace("\"", "", str_replace(array("'", ",", "%", '' . "\$", "&", "*", "#", "@", "(", ")", ":", ";", ">", "<", "/"), "", $keyword));
		}
		$this->db->select("transaction.*,project.project_title,project.url_project_title,user.user_name,user.last_name");
		$this->db->from("transaction");
		$this->db->where("transaction.wallet_payment_status !=", "3");
		$this->db->join("project", "transaction.project_id= project.project_id", "left");
		$this->db->join("user", "transaction.user_id= user.user_id", "left");
		$this->db->order_by("transaction.transaction_id", "desc");
		if ($option == "title")
		{
			$this->db->like("project.project_title", $keyword);
			if (substr_count($keyword, " ") >= 1)
			{
				$ex = explode(" ", $keyword);
				foreach ($ex as $val)
				{
					$this->db->or_like("project.project_title", $val);
					continue;
				}
			}
		}
		if ($option == "user")
		{
			$this->db->like("user.user_name", $keyword);
			$this->db->or_like("user.last_name", $keyword);
			$this->db->or_like("user.user_name", substr($keyword, 0 - 3, 3));
			$this->db->or_like("user.user_name", substr($keyword, 0, 3));
			$this->db->or_like("user.last_name", substr($keyword, 0 - 3, 3));
			$this->db->or_like("user.last_name", substr($keyword, 0, 3));
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
		if ($option == "ip")
		{
			$this->db->like("transaction.host_ip", $keyword);
		}
		if ($option == "trans")
		{
			$this->db->like("transaction.wallet_transaction_id", $keyword);
			$this->db->or_like("transaction.amazon_transaction_id", $keyword);
			$this->db->or_like("transaction.paypal_paykey", $keyword);
			$this->db->or_like("transaction.preapproval_pay_key", $keyword);
			$this->db->or_like("transaction.preapproval_key", $keyword);
			$this->db->or_like("transaction.paypal_transaction_id", $keyword);
		}
		if ($option == "pay")
		{
			$this->db->like("transaction.paypal_email", $keyword);
		}
		$this->db->order_by("transaction.transaction_id", "desc");
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function get_donor_detail($uid) {

		$query = $this->db->query("select * from user where user_id='" . $uid . "'");
		return $query->row();
	}

	public function get_perk_detail($pid) {

		$query = $this->db->query("select * from perk where perk_id='" . $pid . "'");
		return $query->row();
	}

	public function get_normal_paypal_result() {

		$query = $this->db->query("select * from site_setting where site_setting_id='2'");
		return $query->row();
	}

	public function normal_paypal_update() {

		if ($this->input->post("paypal_status") == "sandbox")
		{
			$paypal_url = "https://www.sandbox.paypal.com/cgi-bin/webscri";
		}
		 else 
		{
			$paypal_url = "https://www.paypal.com/cgi-bin/webscri";
		}
		$data = array("paypal_status" => $this->input->post("paypal_status"), "paypal_url" => $paypal_url, "paypal_email" => $this->input->post("paypal_email"), "paypal_API_UserName" => $this->input->post("paypal_API_UserName"), "paypal_API_Password" => $this->input->post("paypal_API_Password"), "paypal_API_Signature" => $this->input->post("paypal_API_Signature"), "normal_paypal" => $this->input->post("normal_paypal"));
		$this->db->where("site_setting_id", "2");
		$this->db->update("site_setting", $data);
		$query = $this->db->query("update project_setting set `pay_fee`='" . $this->input->post("pay_fee") . "' where project_setting_id='1'");
		return;
	}

	public function get_normal_paypal() {

		$query = $this->db->get_where("site_setting", array("site_setting_id" => "2"));
		return $query->row_array();
	}

	public function get_project_setting() {

		$query = $this->db->get_where("project_setting", array("project_setting_id" => "1"));
		return $query->row_array();
	}

	public function get_total_paypal_count() {

		return $this->db->count_all("paypal");
	}

	public function get_paypal_result($offset, $limit) {

		$this->db->from("paypal");
		$this->db->order_by("paypal.id", "desc");
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function paypal_insert() {

		$data = array("site_status" => $this->input->post("site_status"), "application_id" => $this->input->post("application_id"), "paypal_email" => $this->input->post("paypal_email"), "paypal_username" => $this->input->post("paypal_username"), "paypal_password" => $this->input->post("paypal_password"), "paypal_signature" => $this->input->post("paypal_signature"), "fees_taken_from" => $this->input->post("fees_taken_from"), "transaction_fees" => $this->input->post("transaction_fees"), "donate_limit" => $this->input->post("donate_limit"));
		$this->db->insert("paypal", $data);
		return;
	}

	public function paypal_update() {

		$data = array("site_status" => $this->input->post("site_status"), "application_id" => $this->input->post("application_id"), "paypal_email" => $this->input->post("paypal_email"), "paypal_username" => $this->input->post("paypal_username"), "paypal_password" => $this->input->post("paypal_password"), "paypal_signature" => $this->input->post("paypal_signature"), "fees_taken_from" => $this->input->post("fees_taken_from"), "transaction_fees" => $this->input->post("transaction_fees"), "donate_limit" => $this->input->post("donate_limit"));
		$this->db->where("id", $this->input->post("id"));
		$this->db->update("paypal", $data);
		return;
	}

	public function get_one_paypal($id) {

		$query = $this->db->get_where("paypal", array("id" => $id));
		return $query->row_array();
	}

	public function get_total_amazon_count() {

		return $this->db->count_all("amazon");
	}

	public function get_amazon_result($offset, $limit) {

		$this->db->from("amazon");
		$this->db->order_by("amazon.id", "desc");
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function amazon_insert() {

		$data = array("site_status" => $this->input->post("site_status"), "aws_access_key_id 	" => $this->input->post("aws_access_key_id 	"), "aws_secret_access_key" => $this->input->post("aws_secret_access_key"), "variable_fees" => $this->input->post("variable_fees"), "fixed_fees" => $this->input->post("fixed_fees"));
		$this->db->insert("amazon", $data);
		return;
	}

	public function amazon_update() {

		$data = array("site_status" => $this->input->post("site_status"), "aws_access_key_id" => $this->input->post("aws_access_key_id"), "aws_secret_access_key" => $this->input->post("aws_secret_access_key"), "variable_fees" => $this->input->post("variable_fees"), "fixed_fees" => $this->input->post("fixed_fees"));
		$this->db->where("id", $this->input->post("id"));
		$this->db->update("amazon", $data);
		return;
	}

	public function get_one_amazon($id) {

		$query = $this->db->get_where("amazon", array("id" => $id));
		return $query->row_array();
	}

	public function get_total_credit_card_count() {

		return $this->db->count_all("paypal_credit_card");
	}

	public function get_credit_card_result($offset, $limit) {

		$this->db->select("*");
		$this->db->from("paypal_credit_card");
		$this->db->order_by("paypal_credit_card_id", "desc");
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function paypal_credit_card_insert() {

		$data = array("credit_card_version" => $this->input->post("credit_card_version"), "credit_card_proxy_port" => $this->input->post("credit_card_proxy_port"), "credit_card_proxy_host" => $this->input->post("credit_card_proxy_host"), "credit_card_use_proxy" => $this->input->post("credit_card_use_proxy"), "credit_card_subject" => $this->input->post("credit_card_subject"), "credit_card_preapproval" => $this->input->post("credit_card_preapproval"), "credit_card_api_signature" => $this->input->post("credit_card_api_signature"), "credit_card_username" => $this->input->post("credit_card_username"), "credit_card_password" => $this->input->post("credit_card_password"), "credit_card_site_status" => $this->input->post("credit_card_site_status"), "credit_card_gateway_status" => $this->input->post("credit_card_gateway_status"));
		$this->db->insert("paypal_credit_card", $data);
		return;
	}

	public function paypal_credit_card_update() {

		$data = array("credit_card_version" => $this->input->post("credit_card_version"), "credit_card_api_signature" => $this->input->post("credit_card_api_signature"), "credit_card_username" => $this->input->post("credit_card_username"), "credit_card_password" => $this->input->post("credit_card_password"), "credit_card_site_status" => $this->input->post("credit_card_site_status"));
		$this->db->where("paypal_credit_card_id", $this->input->post("paypal_credit_card_id"));
		$this->db->update("paypal_credit_card", $data);
		return;
	}

	public function get_paypal_credit_card_by_id($id) {

		$query = $this->db->get_where("paypal_credit_card", array("paypal_credit_card_id" => $id));
		return $query->row_array();
	}

};;


