<?php


class Site_setting_model extends CI_Model {

	public function Site_setting_model() {

		parent::__construct();
		return;
	}

	public function site_setting_update() {

		$CI = &get_instance();
		$base_path = $CI->config->slash_item("base_path");
		$site_logo = $this->input->post("prev_site_logo");
		$site_logo_hover = $this->input->post("prev_site_logo_hover");
		if ($_FILES)
		{
			if ($_FILES["file_up"]["name"] != "")
			{
				$this->load->library("upload");
				$rand = rand(0, 100000);
				global $_FILES;
				$_FILES["userfile"]["name"] = $_FILES["file_up"]["name"];
				global $_FILES;
				$_FILES["userfile"]["type"] = $_FILES["file_up"]["type"];
				global $_FILES;
				$_FILES["userfile"]["tmp_name"] = $_FILES["file_up"]["tmp_name"];
				global $_FILES;
				$_FILES["userfile"]["error"] = $_FILES["file_up"]["error"];
				global $_FILES;
				$_FILES["userfile"]["size"] = $_FILES["file_up"]["size"];
				$config["file_name"] = $rand . "logo";
				$config["upload_path"] = $base_path . "upload/orig/";
				$config["allowed_types"] = "jpg|jpeg|gif|png|bmp";
				$this->upload->initialize($config);
				if (!($this->upload->do_upload()))
				{
					$error = $this->upload->display_errors();
				}
				$picture = $this->upload->data();
				$site_logo = $picture["file_name"];
				if (is_file($base_path . "upload/orig/" . $this->input->post("prev_site_logo")))
				{
					if ($this->input->post("prev_site_logo") != "no_img.jpg")
					{
						$link2 = $base_path . "upload/orig/" . $this->input->post("prev_site_logo");
						unlink($link2);
					}
				}
			}
			 else 
			{
				if ($this->input->post("prev_site_logo") != "")
				{
					$site_logo = $this->input->post("prev_site_logo");
				}
			}
			if ($_FILES["file_up2"]["name"] != "")
			{
				$this->load->library("upload");
				$rand = rand(0, 100000);
				global $_FILES;
				$_FILES["userfile"]["name"] = $_FILES["file_up2"]["name"];
				global $_FILES;
				$_FILES["userfile"]["type"] = $_FILES["file_up2"]["type"];
				global $_FILES;
				$_FILES["userfile"]["tmp_name"] = $_FILES["file_up2"]["tmp_name"];
				global $_FILES;
				$_FILES["userfile"]["error"] = $_FILES["file_up2"]["error"];
				global $_FILES;
				$_FILES["userfile"]["size"] = $_FILES["file_up2"]["size"];
				$config["file_name"] = $rand . "logo_hover";
				$config["upload_path"] = $base_path . "upload/orig/";
				$config["allowed_types"] = "jpg|jpeg|gif|png|bmp";
				$this->upload->initialize($config);
				if (!($this->upload->do_upload()))
				{
					$error = $this->upload->display_errors();
				}
				$picture2 = $this->upload->data();
				$site_logo_hover = $picture2["file_name"];
				if (is_file($base_path . "upload/orig/" . $this->input->post("prev_site_logo_hover")))
				{
					if ($this->input->post("prev_site_logo_hover") != "no_img.jpg")
					{
						$link2 = $base_path . "upload/orig/" . $this->input->post("prev_site_logo_hover");
						unlink($link2);
					}
				}
			}
			 else 
			{
				if ($this->input->post("prev_site_logo_hover") != "")
				{
					$site_logo_hover = $this->input->post("prev_site_logo_hover");
				}
			}
			if ($_FILES["file_up3"]["name"] != "")
			{
				$this->load->library("upload");
				$rand = rand(0, 100000);
				global $_FILES;
				$_FILES["userfile"]["name"] = $_FILES["file_up3"]["name"];
				global $_FILES;
				$_FILES["userfile"]["type"] = $_FILES["file_up3"]["type"];
				global $_FILES;
				$_FILES["userfile"]["tmp_name"] = $_FILES["file_up3"]["tmp_name"];
				global $_FILES;
				$_FILES["userfile"]["error"] = $_FILES["file_up3"]["error"];
				global $_FILES;
				$_FILES["userfile"]["size"] = $_FILES["file_up3"]["size"];
				$config["file_name"] = $rand . "blog_logo";
				$config["upload_path"] = $base_path . "upload/orig/";
				$config["allowed_types"] = "jpg|jpeg|gif|png|bmp|PNG";
				$this->upload->initialize($config);
				if (!($this->upload->do_upload()))
				{
					$error = $this->upload->display_errors();
				}
				$picture3 = $this->upload->data();
				$site_blog_logo = $picture3["file_name"];
				if (is_file($base_path . "upload/orig/" . $this->input->post("prev_blog_logo")))
				{
					if ($this->input->post("prev_blog_logo") != "no_img.jpg")
					{
						$link3 = $base_path . "upload/orig/" . $this->input->post("prev_blog_logo");
						unlink($link3);
					}
				}
			}
			 else 
			{
				if ($this->input->post("prev_blog_logo") != "")
				{
					$site_blog_logo = $this->input->post("prev_blog_logo");
				}
			}
		}
		$currency = $this->db->query("select * from currency_code where currency_code='" . $this->input->post("currency_code") . "'");
		$cur = $currency->row();
		$currency_symbol = $cur->currency_symbol;
		$preapproval_enable = $this->input->post("preapproval_enable");
		if ($preapproval_enable == 0)
		{
			$enable_funding_option = 0;
		}
		 else 
		{
			$enable_funding_option = $this->input->post("enable_funding_option");
		}
		$data = array("site_name" => $this->input->post("site_name"), "site_language" => $this->input->post("site_language"), "currency_symbol" => $currency_symbol, "currency_code" => $this->input->post("currency_code"), "donation_amount" => $this->input->post("donation_amount"), "maximum_donation_amount" => $this->input->post("maximum_donation_amount"), "maximum_project_per_year" => $this->input->post("maximum_project_per_year"), "maximum_donate_per_project" => $this->input->post("maximum_donate_per_project"), "date_format" => $this->input->post("date_format"), "site_tracker" => $this->input->post("site_tracker"), "site_logo" => $site_logo, "site_logo_hover" => $site_logo_hover, "blog_logo" => $site_blog_logo, "project_min_days" => $this->input->post("project_min_days"), "project_max_days" => $this->input->post("project_max_days"), "time_zone" => $this->input->post("time_zone"), "currency_symbol_side" => $this->input->post("currency_symbol_side"), "enable_funding_option" => $enable_funding_option, "flexible_fees" => $this->input->post("flexible_fees"), "suc_flexible_fees" => $this->input->post("suc_flexible_fees"), "fixed_fees" => $this->input->post("fixed_fees"), "instant_fees" => $this->input->post("instant_fees"), "minimum_goal" => $this->input->post("minimum_goal"), "maximum_goal" => $this->input->post("maximum_goal"), "minimum_reward_amount" => $this->input->post("minimum_reward_amount"), "maximum_reward_amount" => $this->input->post("maximum_reward_amount"), "auto_target_achive" => $this->input->post("auto_target_achive"), "enable_facebook_stream" => $this->input->post("enable_facebook_stream"), "enable_twitter_stream" => $this->input->post("enable_twitter_stream"), "captcha_public_key" => $this->input->post("captcha_public_key"), "captcha_private_key" => $this->input->post("captcha_private_key"));
		$this->db->where("site_setting_id", $this->input->post("site_setting_id"));
		$this->db->update("site_setting", $data);
		$payment_gateway = $this->input->post("payment_gateway");
		$paypal_credit_card_gateway_enable = 0;
		$paypal_gateway_enable = 0;
		$amazon_gateway_enable = 0;
		$wallet_gateway_enable = 0;
		$paypal_credit_card_preapprove_enable = 0;
		$paypal_preapprove_enable = 0;
		$amazon_preapprove_enable = 0;
		$wallet_preapprove_enable = 0;
		if ($payment_gateway == 1)
		{
			$paypal_gateway_enable = 1;
			if ($preapproval_enable == 1)
			{
				$paypal_preapprove_enable = 1;
			}
		}
		 else 
		{
			if ($payment_gateway == 3)
			{
				$paypal_credit_card_gateway_enable = 1;
				if ($preapproval_enable == 1)
				{
					$paypal_credit_card_preapprove_enable = 1;
				}
			}
			 else 
			{
				if ($payment_gateway == 2)
				{
					$amazon_gateway_enable = 1;
					if ($preapproval_enable == 1)
					{
						$amazon_preapprove_enable = 1;
					}
				}
				 else 
				{
					$wallet_gateway_enable = 1;
					if ($preapproval_enable == 1)
					{
						$wallet_preapprove_enable = 1;
					}
				}
			}
		}
		$data_paypal = array("gateway_status" => $paypal_gateway_enable, "preapproval" => $paypal_preapprove_enable);
		$this->db->update("paypal", $data_paypal);
		$data_paypal_credit_card = array("credit_card_gateway_status" => $paypal_credit_card_gateway_enable, "credit_card_preapproval" => $paypal_credit_card_preapprove_enable);
		$this->db->update("paypal_credit_card", $data_paypal_credit_card);
		$data_amazon = array("gateway_status" => $amazon_gateway_enable, "preapproval" => $amazon_preapprove_enable);
		$this->db->update("amazon", $data_amazon);
		$data_wallet = array("wallet_enable" => $wallet_gateway_enable, "wallet_payment_type" => $wallet_preapprove_enable);
		$this->db->update("wallet_setting", $data_wallet);
		return;
	}

	public function filter_setting_update() {

		$data = array("ending_soon" => $this->input->post("ending_soon"), "small_project" => $this->input->post("small_project"), "popular" => $this->input->post("popular"), "successful" => $this->input->post("successful"));
		$this->db->where("site_setting_id", $this->input->post("site_setting_id"));
		$this->db->update("site_setting", $data);
		return;
	}

	public function get_one_site_setting() {

		$query = $this->db->get_where("site_setting");
		return $query->row_array();
	}

	public function get_one_img_setting() {

		$query = $this->db->get_where("image_setting");
		return $query->row_array();
	}

	public function img_setting_update() {

		$data = array("p_width" => $this->input->post("p_width"), "p_height" => $this->input->post("p_height"), "p_ratio" => $this->input->post("p_ratio"), "u_width" => $this->input->post("u_width"), "u_height" => $this->input->post("u_height"), "u_ratio" => $this->input->post("u_ratio"), "g_width" => $this->input->post("g_width"), "g_height" => $this->input->post("g_height"), "g_ratio" => $this->input->post("g_ratio"));
		$this->db->where("image_setting_id", $this->input->post("image_setting_id"));
		$this->db->update("image_setting", $data);
		return;
	}

	public function get_languages() {

		$query = $this->db->get("translation");
		return $query->result_array();
	}

	public function get_currency() {

		$query = $this->db->get("currency_code");
		return $query->result();
	}

	public function get_time_zone() {

		$query = $this->db->get("timezone");
		return $query->result_array();
	}

	public function amount_setting_update() {

		$currency = $this->db->query("select * from currency_code where currency_code='" . $this->input->post("currency_code") . "'");
		$cur = $currency->row();
		$currency_symbol = $cur->currency_symbol;
		$data = array("currency_symbol" => $currency_symbol, "currency_code" => $this->input->post("currency_code"), "decimal_points" => $this->input->post("decimal_points"), "currency_symbol_side" => $this->input->post("currency_symbol_side"));
		$this->db->where("site_setting_id", $this->input->post("site_setting_id"));
		$this->db->update("site_setting", $data);
		return;
	}

};;


