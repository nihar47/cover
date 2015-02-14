<?php


class Feed_model extends ROCKERS_Model {

	public function Feed_model() {

		parent::__construct();
		return;
	}

	public function get_latest_projects($limit) {

		$query = $this->db->query("select project.*,user.user_name,user.image as uimg,user.country,user.state from project, user where user.user_id=project.user_id and project.active=1  and project.end_date>='" . date("Y-m-d") . "' order by project.project_id desc LIMIT " . $limit);
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		return 0;
	}

	public function get_latest_projects2($limit) {

		$query = $this->db->query("select project.*,user.user_name,user.image as uimg,user.country,user.state from project, user where user.user_id=project.user_id and project.active=1  and project.end_date>='" . date("Y-m-d") . "' order by project.project_id desc LIMIT " . $limit);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

};;


