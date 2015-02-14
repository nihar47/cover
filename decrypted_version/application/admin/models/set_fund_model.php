<?php


class Set_fund_model extends CI_Model {

	public function Set_fund_model() {

		parent::__construct();
		return;
	}

	public function get_serch_user($keyword = "") {

		if ($keyword == "")
		{
			$qry = $this->db->query("select * from user where active='1' ");
		}
		 else 
		{
			$qry = $this->db->query("select * from user where active='1' and email like '%" . $keyword . ('' . "%' or user_id='" . $keyword . "' "));
		}
		if ($qry->num_rows() > 0)
		{
			return $qry->num_rows();
		}
		return;
	}

	public function search_user($limit = 0, $offset = 0, $keyword = "") {

		if ($keyword == "")
		{
			$qry = $this->db->query("select * from user where active='1' ");
		}
		 else 
		{
			$qry = $this->db->query("select * from user where active='1' and  email like '%" . $keyword . ('' . "%' or user_id='" . $keyword . "' order by user_id desc LIMIT ") . $limit . " OFFSET " . $offset . "");
		}
		if ($qry->num_rows() > 0)
		{
			return $qry->result();
		}
		return;
	}

	public function user_wallet_amount($uid = "") {

		$query1 = $this->db->query('' . "SELECT SUM(debit) as sumd FROM wallet where admin_status='Confirm' and user_id='" . $uid . "' and donate_status not in ('0','3','2')");
		$query2 = $this->db->query('' . "SELECT SUM(credit) as sumc FROM wallet where admin_status='Confirm' and user_id='" . $uid . "' and donate_status not in ('2','3')");
		if ($query1->num_rows() > 0)
		{
			$result1 = $query1->row();
			$result2 = $query2->row();
			$debit = $result1->sumd;
			$credit = $result2->sumc;
			$total = $debit - $credit;
			return $total;
		}
		return 0;
	}

};;


