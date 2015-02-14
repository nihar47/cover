<?php


class Gateways_detail_model extends CI_Model {

	public function Gateways_detail_model() {

		parent::__construct();
		return;
	}

	public function detail_insert() {

		$settings = array("payment_gateway_id" => $this->input->post("payment_gateway_id"), "name" => $this->input->post("name"), "value" => $this->input->post("value"), "label" => $this->input->post("label"), "description" => $this->input->post("description"));
		$this->db->insert("gateways_details", $settings);
		return;
	}

	public function detail_update() {

		$settings = array("payment_gateway_id" => $this->input->post("payment_gateway_id"), "name" => $this->input->post("name"), "value" => $this->input->post("value"), "label" => $this->input->post("label"), "description" => $this->input->post("description"));
		$this->db->where("id", $this->input->post("id"));
		$this->db->update("gateways_details", $settings);
		return;
	}

	public function get_one_detail($id) {

		$query = $this->db->get_where("gateways_details", array("id" => $id));
		return $query->row_array();
	}

	public function get_total_detail_count($id) {

		$query = $this->db->query("select gateways_details.id, \r
						   gateways_details.payment_gateway_id,\r
						  \r
						   gateways_details.name, \r
						   gateways_details.value,\r
						   gateways_details.label,\r
						   gateways_details.description,\r
						  \r
						   payments_gateways.name as payname from gateways_details left join payments_gateways on gateways_details.payment_gateway_id= payments_gateways.id where gateways_details.payment_gateway_id=\"" . $id . "\" order by gateways_details.id desc");
		return $query->num_rows();
	}

	public function get_detail_result($id, $offset, $limit) {

		$query = $this->db->query("select gateways_details.id, \r
						   gateways_details.payment_gateway_id,\r
						  \r
						   gateways_details.name, \r
						   gateways_details.value,\r
						   gateways_details.label,\r
						   gateways_details.description,\r
						  \r
						   payments_gateways.name as payname from gateways_details left join payments_gateways on gateways_details.payment_gateway_id= payments_gateways.id where gateways_details.payment_gateway_id=\"" . $id . "\" order by gateways_details.id desc limit " . $limit . " offset " . $offset);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function get_payment_result($id) {

		$query = $this->db->get_where("payments_gateways", array("id" => $id));
		return $query->row_array();
	}

};;


