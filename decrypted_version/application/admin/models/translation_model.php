<?php


class Translation_model extends CI_Model {

	public function Translation_model() {

		parent::__construct();
		return;
	}

	public function translation_insert() {

		$data = array("language" => $this->input->post("language"));
		$this->db->insert("translation", $data);
		$translation_id = mysql_insert_id();
		$query = $this->db->get("translation_key");
		if ($query->num_rows() > 0)
		{
			$key = $query->result();
			foreach ($key as $k)
			{
				$data = array("translation_id" => $translation_id, "key_id" => $k->key_id, "text" => "");
				$this->db->insert("translation_text", $data);
				continue;
			}
		}
		return;
	}

	public function translation_key_insert() {

		$data = array("key" => $this->input->post("key"));
		$this->db->insert("translation_key", $data);
		$key_id = mysql_insert_id();
		$query = $this->db->get("translation");
		if ($query->num_rows() > 0)
		{
			$translations = $query->result();
			foreach ($translations as $t)
			{
				$data = array("translation_id" => $t->translation_id, "key_id" => $key_id, "text" => $this->input->post("t_" . $t->translation_id));
				$this->db->insert("translation_text", $data);
				continue;
			}
		}
		return;
	}

	public function translation_text_update($limit) {

		$this->db->limit($limit, $this->input->post("offset2"));
		$query = $this->db->get_where("translation_text", array("translation_id" => $this->input->post("translation_id")));
		$res = $query->result();
		foreach ($res as $r)
		{
			$data = array("text" => $this->input->post("k_" . $r->text_id));
			$this->db->where("text_id", $r->text_id);
			$this->db->update("translation_text", $data);
			continue;
		}
		return;
	}

	public function translation_update() {

		$data = array("language" => $this->input->post("language"));
		$this->db->where("translation_id", $this->input->post("translation_id"));
		$this->db->update("translation", $data);
		return;
	}

	public function get_one_translation($id) {

		$query = $this->db->get_where("translation", array("translation_id" => $id));
		return $query->row_array();
	}

	public function get_all_translation() {

		$query = $this->db->get("translation");
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function get_total_key_count($id) {

		$this->db->select("translation_key.key_id, \r
						   translation_key.key,\r
						   translation_text.text_id,\r
						   translation_text.text,\r
						   translation_text.translation_id");
		$this->db->from("translation_key");
		$this->db->join("translation_text", "translation_key.key_id = translation_text.key_id", "left");
		$this->db->where("translation_text.translation_id", $id);
		return $this->db->count_all_results();
	}

	public function get_all_key($id, $offset, $limit) {

		$this->db->select("translation_key.key_id, \r
						   translation_key.key,\r
						   translation_text.text_id,\r
						   translation_text.text,\r
						   translation_text.translation_id");
		$this->db->from("translation_key");
		$this->db->join("translation_text", "translation_key.key_id = translation_text.key_id", "left");
		$this->db->where("translation_text.translation_id", $id);
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function get_total_translation_count() {

		return $this->db->count_all("translation");
	}

	public function get_translation_result($offset, $limit) {

		$query = $this->db->get("translation", $limit, $offset);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

};;


