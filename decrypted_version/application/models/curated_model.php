<?php


class Curated_model extends ROCKERS_Model {

	public function Curated_model() {

		parent::__construct();
		return;
	}

	public function get_total_curated_page() {

		$this->db->select("cu.*,us.*");
		$this->db->from("curated cu");
		$this->db->join("user us", "cu.user_id=us.user_id", "left");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}

	public function get_all_curated_page($offset, $limit) {

		$this->db->select("cu.*,us.*");
		$this->db->from("curated cu");
		$this->db->join("user us", "cu.user_id=us.user_id", "left");
		$this->db->order_by("cu.curated_id", "desc");
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function get_curated_details_by_title($url_title) {

		$query = $this->db->query("select * from curated where url_curated_title='" . $url_title . "'");
		if ($query->num_rows() > 0)
		{
			return $query->row();
		}
		return 0;
	}

	public function get_curated_details_by_id($id) {

		$query = $this->db->query("select * from curated where curated_id='" . $id . "'");
		if ($query->num_rows() > 0)
		{
			return $query->row();
		}
		return 0;
	}

	public function curated_project_count($curated_id) {

		$this->db->select("*");
		$this->db->from("curated_project curprj");
		$this->db->join("project prj", "curprj.project_id= prj.project_id");
		$this->db->where("prj.active", "1");
		$this->db->where("prj.end_date >= ", date("Y-m-d"));
		$this->db->where("curprj.curated_id", $curated_id);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}

	public function curated_project($offset, $limit, $curated_id) {

		$this->db->select("*");
		$this->db->from("curated_project curprj");
		$this->db->join("project prj", "curprj.project_id = prj.project_id");
		$this->db->where("prj.active", "1");
		$this->db->where("prj.end_date >= ", date("Y-m-d"));
		$this->db->where("curprj.curated_id", $curated_id);
		$this->db->order_by("curprj.curated_project_date", "desc");
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

};;


