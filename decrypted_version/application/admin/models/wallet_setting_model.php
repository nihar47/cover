<?php


class Wallet_setting_model extends CI_Model {

	public function Wallet_setting_model() {

		parent::__construct();
		return;
	}

	public function wallet_setting_update() {

		if ($this->input->post("add_amount") == "1")
		{
			$add_whole_amount = 0;
			$add_remain_amount = 1;
		}
		 else 
		{
			$add_whole_amount = 1;
			$add_remain_amount = 0;
		}
		$data = array("wallet_add_fees" => $this->input->post("wallet_add_fees"), "wallet_donation_fees" => $this->input->post("wallet_donation_fees"), "wallet_minimum_amount" => $this->input->post("wallet_minimum_amount"), "direct_donation_option" => $this->input->post("direct_donation_option"), "add_whole_amount" => $add_whole_amount, "add_remain_amount" => $add_remain_amount);
		$this->db->where("wallet_id", $this->input->post("wallet_id"));
		$this->db->update("wallet_setting", $data);
		return;
	}

	public function get_one_wallet_setting() {

		$query = $this->db->get_where("wallet_setting");
		return $query->row_array();
	}

};;


