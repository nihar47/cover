<?php


class Newsletter_model extends ROCKERS_Model {

	public function Newsletter_model() {

		parent::__construct();
		return;
	}

	public function make_new_subscription($subscribe_email, $newsletter_id = "") {

		if ($newsletter_id == "")
		{
			$check_email = $this->db->query("select * from newsletter_user where email='" . $subscribe_email . "'");
			if ($check_email->num_rows() > 0)
			{
				return 2;
			}
			$make_user = $this->db->query("insert into newsletter_user(`email`,`user_date`,`user_ip`)values('" . $subscribe_email . "','" . date("Y-m-d H:i:s") . "','" . $_SERVER["REMOTE_ADDR"] . "')");
			$newsletter_user_id = mysql_insert_id();
			$newsletter_control = $this->db->query("select * from newsletter_setting");
			$newsletter_setting = $newsletter_control->row();
			if ($newsletter_setting->new_subscribe_to == "all")
			{
				$get_all_newsletter = $this->db->query("select newsletter_id from newsletter_template order by newsletter_id asc");
				if ($get_all_newsletter->num_rows() > 0)
				{
					$newsletter_template = $get_all_newsletter->result();
					foreach ($newsletter_template as $nwtp)
					{
						$make_subscribe = $this->db->query("insert into newsletter_subscribe(`newsletter_user_id`,`newsletter_id`,`subscribe_date`)values('" . $newsletter_user_id . "','" . $nwtp->newsletter_id . "','" . date("Y-m-d") . "')");
						continue;
					}
					return 1;
				}
			}
			 else 
			{
				if ($newsletter_setting->new_subscribe_to == "selected")
				{
					$chk_selected = $this->db->query("select * from newsletter_template where newsletter_id='" . $newsletter_setting->selected_newsletter_id . "'");
					if ($chk_selected->num_rows() > 0)
					{
						$make_subscribe = $this->db->query("insert into newsletter_subscribe(`newsletter_user_id`,`newsletter_id`,`subscribe_date`)values('" . $newsletter_user_id . "','" . $newsletter_setting->selected_newsletter_id . "','" . date("Y-m-d") . "')");
					}
				}
			}
			return 1;
		}
		$get_newsletter_user = $this->db->query("select * from newsletter_user where email='" . $subscribe_email . "'");
		if ($get_newsletter_user->num_rows() > 0)
		{
			$newsletter_user_detail = $get_newsletter_user->row();
			$make_subscribe = $this->db->query("insert into newsletter_subscribe(`newsletter_user_id`,`newsletter_id`,`subscribe_date`)values('" . $newsletter_user_detail->newsletter_user_id . "','" . $newsletter_id . "','" . date("Y-m-d") . "')");
			return 1;
		}
		return 3;
	}

	public function make_unsubscribe($subscribe_email, $newsletter_id = "") {

		if ($newsletter_id == "")
		{
			$check_email = $this->db->query("select * from newsletter_user where email='" . $subscribe_email . "'");
			if ($check_email->num_rows() > 0)
			{
				$newsletter_user_detail = $check_email->row();
				$chk_subscription = $this->db->query("select * from newsletter_subscribe where newsletter_user_id='" . $newsletter_user_detail->newsletter_user_id . "'");
				if ($chk_subscription->num_rows() > 0)
				{
					$subscribe_detail = $chk_subscription->result();
					$this->db->query("delete from newsletter_subscribe where newsletter_user_id='" . $newsletter_user_detail->newsletter_user_id . "'");
				}
				return 1;
			}
			return 3;
		}
		$check_email = $this->db->query("select * from newsletter_user where email='" . $subscribe_email . "'");
		if ($check_email->num_rows() > 0)
		{
			$newsletter_user_detail = $check_email->row();
			$chk_subscription = $this->db->query("select * from newsletter_subscribe where newsletter_user_id='" . $newsletter_user_detail->newsletter_user_id . "' and newsletter_id='" . $newsletter_id . "'");
			if ($chk_subscription->num_rows() > 0)
			{
				$subscribe_detail = $chk_subscription->result();
				$this->db->query("delete from newsletter_subscribe where newsletter_user_id='" . $newsletter_user_detail->newsletter_user_id . "' and newsletter_id='" . $newsletter_id . "'");
				return 1;
			}
			return 3;
		}
		return 3;
	}

	public function track_report($report_id) {

		$chk_report = $this->db->query("select * from newsletter_report where report_id='" . $report_id . "'");
		if ($chk_report->num_rows() > 0)
		{
			$this->db->query("update newsletter_report set is_open='1' where report_id='" . $report_id . "'");
		}
		return;
	}

};;


