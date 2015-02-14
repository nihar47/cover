<?php


class Payments_gateway_model extends CI_Model {

	public function Payments_gateway_model() {

		parent::__construct();
		return;
	}

	public function payment_insert() {

		$CI = &get_instance();
		$base_path = $CI->config->slash_item("base_path");
		$image_name = "";
		if ($_FILES["image"]["name"] != "")
		{
			$this->load->library("upload");
			$rand = rand(0, 100000);
			global $_FILES;
			$_FILES["userfile"]["name"] = $_FILES["image"]["name"];
			global $_FILES;
			$_FILES["userfile"]["type"] = $_FILES["image"]["type"];
			global $_FILES;
			$_FILES["userfile"]["tmp_name"] = $_FILES["image"]["tmp_name"];
			global $_FILES;
			$_FILES["userfile"]["error"] = $_FILES["image"]["error"];
			global $_FILES;
			$_FILES["userfile"]["size"] = $_FILES["image"]["size"];
			$config["file_name"] = $rand . "gateway_" . $this->input->post("name");
			$config["upload_path"] = $base_path . "upload/";
			$config["allowed_types"] = "jpg|jpeg|gif|png|bmp";
			$this->upload->initialize($config);
			if (!($this->upload->do_upload()))
			{
				$error = $this->upload->display_errors();
			}
			$picture = $this->upload->data();
			$image_name = $picture["file_name"];
		}
		$settings = array("name" => $this->input->post("name"), "status" => $this->input->post("status"), "image" => $image_name, "function_name" => $this->input->post("function_name"), "suapport_masspayment" => $this->input->post("suapport_masspayment"));
		$this->db->insert("payments_gateways", $settings);
		return TRUE;
	}

	public function payment_update() {

		$image_name = "";
		$CI = &get_instance();
		$base_path = $CI->config->slash_item("base_path");
		if ($_FILES["image"]["name"] != "")
		{
			$this->load->library("upload");
			$rand = rand(0, 100000);
			global $_FILES;
			$_FILES["userfile"]["name"] = $_FILES["image"]["name"];
			global $_FILES;
			$_FILES["userfile"]["type"] = $_FILES["image"]["type"];
			global $_FILES;
			$_FILES["userfile"]["tmp_name"] = $_FILES["image"]["tmp_name"];
			global $_FILES;
			$_FILES["userfile"]["error"] = $_FILES["image"]["error"];
			global $_FILES;
			$_FILES["userfile"]["size"] = $_FILES["image"]["size"];
			$config["file_name"] = $rand . "gateway_" . $this->input->post("name");
			$config["upload_path"] = $base_path . "upload/";
			$config["allowed_types"] = "jpg|jpeg|gif|png|bmp";
			$this->upload->initialize($config);
			if (!($this->upload->do_upload()))
			{
				$error = $this->upload->display_errors();
			}
			$picture = $this->upload->data();
			$image_name = $picture["file_name"];
		}
		 else 
		{
			if ($this->input->post("prev_image") != "")
			{
				$image_name = $this->input->post("prev_image");
			}
		}
		$settings = array("name" => $this->input->post("name"), "status" => $this->input->post("status"), "image" => $image_name, "function_name" => $this->input->post("function_name"), "suapport_masspayment" => $this->input->post("suapport_masspayment"));
		$this->db->where("id", $this->input->post("id"));
		$this->db->update("payments_gateways", $settings);
		return;
	}

	public function get_one_payment($id) {

		$query = $this->db->get_where("payments_gateways", array("id" => $id));
		return $query->row_array();
	}

	public function get_total_payment_count() {

		return $this->db->count_all("payments_gateways");
	}

	public function get_payment_result($offset, $limit) {

		$this->db->order_by("id", "desc");
		$query = $this->db->get("payments_gateways", $limit, $offset);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function delete_payment_gateway($id) {

		$chk_details = $this->db->query("select * from gateways_details where payment_gateway_id='" . $id . "'");
		if ($chk_details->num_rows() > 0)
		{
			$this->db->delete("gateways_details", array("payment_gateway_id" => $id));
		}
		$this->db->delete("payments_gateways", array("id" => $id));
		return;
	}

};;


