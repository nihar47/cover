<?php


class Rights_model extends CI_Model {

	public function Rights_model() {

		parent::__construct();
		return;
	}

	public function get_assign_rights($id) {

		$query = $this->db->query("select * from rights_assign where admin_id='" . $id . "'");
		if ($query->num_rows() > 0)
		{
			$rights = $query->result();
			$temp = array();
			foreach ($rights as $rig)
			{
				if ($rig->rights_set == 1 || $rig->rights_set == "1")
				{
					continue;
				}
				$temp[] = $rig->rights_id;
				continue;
			}
			return $temp;
		}
		return 0;
	}

	public function get_rights() {

		$query = $this->db->query("select * from rights order by rights_id asc");
		return $query->result();
	}

	public function add_rights() {

		$get_rights = $this->db->query("select * from rights order by rights_id asc");
		$all_rights = $get_rights->result();
		$rights_id = $this->input->post("rights_id");
		$admin_id = $this->input->post("admin_id");
		if ($rights_id)
		{
			foreach ($all_rights as $rig)
			{
				if (in_array($rig->rights_id, $rights_id))
				{
					$detail = $this->db->query("select * from rights_assign where rights_id='" . $rig->rights_id . "' and admin_id='" . $admin_id . "'");
					if ($detail->num_rows() > 0)
					{
						$update = $this->db->query("update rights_assign set rights_set='1' where rights_id='" . $rig->rights_id . "' and admin_id='" . $admin_id . "'");
						continue;
					}
					$insert = $this->db->query("insert into rights_assign(`admin_id`,`rights_id`,`rights_set`)values('" . $admin_id . "','" . $rig->rights_id . "','1')");
					continue;
				}
				$detail = $this->db->query("select * from rights_assign where rights_id='" . $rig->rights_id . "' and admin_id='" . $admin_id . "'");
				if ($detail->num_rows() > 0)
				{
					$remove = $this->db->query("update rights_assign set rights_set='0' where rights_id='" . $rig->rights_id . "' and admin_id='" . $admin_id . "'");
					continue;
				}
				$insert_remove = $this->db->query("insert into rights_assign(`admin_id`,`rights_id`,`rights_set`)values('" . $admin_id . "','" . $rig->rights_id . "','0')");
				continue;
			}
		}
		return;
	}

};;


