<?php


class Twitter_setting_model extends CI_Model {

	public function Twitter_setting_model() {

		parent::__construct();
		return;
	}

	public function twitter_setting_update() {

		$data = array("twitter_enable" => $this->input->post("twitter_enable"), "twitter_user_name" => $this->input->post("twitter_user_name"), "consumer_key" => $this->input->post("consumer_key"), "consumer_secret" => $this->input->post("consumer_secret"), "autopost_site" => $this->input->post("autopost_site"), "autopost_user" => $this->input->post("autopost_user"), "twitter_url" => $this->input->post("twitter_url"));
		$this->db->where("twitter_setting_id", $this->input->post("twitter_setting_id"));
		$this->db->update("twitter_setting", $data);
		return;
	}

	public function get_one_twitter_setting() {

		$query = $this->db->get_where("twitter_setting");
		return $query->row_array();
	}

};;


