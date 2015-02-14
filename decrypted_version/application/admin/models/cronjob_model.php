<?php


class Cronjob_model extends CI_Model {

	public function Cronjob_model() {

		parent::__construct();
		return;
	}

	public function get_total_cronjob_count() {

		$this->db->select("cronjob.*,admin.username,crons.cron_title");
		$this->db->from("cronjob");
		$this->db->join("admin", "cronjob.user_id= admin.admin_id", "left");
		$this->db->join("crons", "cronjob.cronjob= crons.cron_function", "left");
		$this->db->order_by("cronjob.cronjob_id", "desc");
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function get_cronjob_result($offset, $limit) {

		$this->db->select("cronjob.*,admin.username,crons.cron_title");
		$this->db->from("cronjob");
		$this->db->join("admin", "cronjob.user_id= admin.admin_id", "left");
		$this->db->join("crons", "cronjob.cronjob= crons.cron_function", "left");
		$this->db->order_by("cronjob.cronjob_id", "desc");
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function get_cron_function() {

		$query = $this->db->get("crons");
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

};;


