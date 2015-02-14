<?php


class Payment_model extends ROCKERS_Model {

	public function Payment_model() {

		parent::__construct();
		return;
	}

	public function PPHttpPost($methodName_, $nvpStr_) {

		$meta = site_setting();
		$environment = $meta["paypal_status"];
		$API_UserName = urlencode($meta["paypal_API_UserName"]);
		$API_Password = urlencode($meta["paypal_API_Password"]);
		$API_Signature = urlencode($meta["paypal_API_Signature"]);
		$API_Endpoint = "https://api-3t.paypal.com/nvp";
		if ("sandbox" === $environment || "beta-sandbox" === $environment)
		{
			$API_Endpoint = '' . "https://api-3t." . $environment . ".paypal.com/nvp";
		}
		$version = urlencode("51.0");
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $API_Endpoint);
		curl_setopt($ch, CURLOPT_VERBOSE, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		$nvpreq = '' . "METHOD=" . $methodName_ . "&VERSION=" . $version . "&PWD=" . $API_Password . "&USER=" . $API_UserName . "&SIGNATURE=" . $API_Signature . $nvpStr_;
		curl_setopt($ch, CURLOPT_POSTFIELDS, $nvpreq);
		$httpResponse = curl_exec($ch);
		if (!$httpResponse)
		{
			die('' . $methodName_ . " failed: " . curl_error($ch) . "(" . curl_errno($ch) . ")");
			log_message("error", '' . $methodName_ . " failed: " . curl_error($ch) . "(" . curl_errno($ch) . ")");
		}
		$httpResponseAr = explode("&", $httpResponse);
		$httpParsedResponseAr = array();
		foreach ($httpResponseAr as $i => $value)
		{
			$tmpAr = explode("=", $value);
			if (sizeof($tmpAr) > 1)
			{
				continue;
			}
			$httpParsedResponseAr[$tmpAr[0]] = $tmpAr[1];
			continue;
		}
		if (0 == sizeof($httpParsedResponseAr) || !(array_key_exists("ACK", $httpParsedResponseAr)))
		{
			die('' . "Invalid HTTP Response for POST request(" . $nvpreq . ") to " . $API_Endpoint . ".");
			log_message("error", '' . "Invalid HTTP Response for POST request(" . $nvpreq . ") to " . $API_Endpoint . ".");
		}
		log_message("error", $httpResponse);
		return $httpParsedResponseAr;
	}

	public function transaction_insert($vals) {

		$this->load->library("email");
		$email_setting = $this->db->query("select * from `email_setting` where email_setting_id='1'");
		$email_set = $email_setting->row();
		if ($email_set->mailer == "smtp")
		{
			$config["protocol"] = "smtp";
			$config["smtp_host"] = trim($email_set->smtp_host);
			$config["smtp_port"] = trim($email_set->smtp_port);
			$config["smtp_timeout"] = "30";
			$config["smtp_user"] = trim($email_set->smtp_email);
			$config["smtp_pass"] = trim($email_set->smtp_password);
		}
		 else 
		{
			if ($email_set->mailer == "sendmail")
			{
				$config["protocol"] = "sendmail";
				$config["mailpath"] = trim($email_set->sendmail_path);
			}
		}
		$config["wordwrap"] = TRUE;
		$config["mailtype"] = "html";
		$config["crlf"] = "\\n\\n";
		$config["newline"] = "\\n\\n";
		$this->email->initialize($config);
		$temp_data = explode("#", $vals["custom"]);
		$prj = $this->project_model->get_project_user($vals["item_number"]);
		if ($prj["project_id"] > 0 && $vals["mc_gross"] > 0)
		{
			$project_id = $prj["project_id"];
			$paypal_email = $prj["paypal_email"];
			$meta = site_setting();
			$listing_fee = $meta["project_listing_fee"];
			$pay_fee = $meta["pay_fee"];
			$amount = $vals["mc_gross"];
			$total_amnt = $amount - $pay_fee * $amount / 100;
			$emailSubject = urlencode("Payment release");
			$receiverType = urlencode("EmailAddress");
			$currency = urlencode("USD");
			$nvpStr = '' . "&EMAILSUBJECT=" . $emailSubject . "&RECEIVERTYPE=" . $receiverType . "&CURRENCYCODE=" . $currency;
			$receiversArray = array();
			$i = 0;
			$receiverData = array("receiverEmail" => $paypal_email, "amount" => $total_amnt, "uniqueID" => $project_id);
			$receiversArray[$i] = $receiverData;
			foreach ($receiversArray as $i => $receiverData)
			{
				$receiverEmail = urlencode($receiverData["receiverEmail"]);
				$amount = urlencode($receiverData["amount"]);
				$uniqueID = urlencode($receiverData["uniqueID"]);
				$nvpStr .= '' . "&L_EMAIL" . $i . "=" . $receiverEmail . "&L_Amt" . $i . "=" . $amount . "&L_UNIQUEID" . $i . "=" . $uniqueID;
				continue;
			}
			$httpParsedResponseAr = $this->PPHttpPost("MassPay", $nvpStr);
			$strtemp = "";
			foreach ($httpParsedResponseAr as $keyy => $vall)
			{
				$strtemp .= $keyy . "=" . $vall . ",";
				continue;
			}
			log_message("error", "Response After Succerss Paypal DATA:" . $strtemp);
			if ("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"]))
			{
				$chk_trans_id = 1;
				$chk_transaction = $this->db->query("select * from transaction where paypal_transaction_id='" . $vals["txn_id"] . "'");
				if ($chk_transaction->num_rows() > 0)
				{
					$chk_trans_id = 0;
				}
				if ($chk_trans_id == 1)
				{
					$update = true;
					$data = array("user_id" => $temp_data[0], "project_id" => $vals["item_number"], "perk_id" => $temp_data[2], "amount" => $total_amnt, "listing_fee" => 0, "pay_fee" => $pay_fee * $amount / 100, "host_ip" => $_SERVER["REMOTE_ADDR"], "email" => $vals["payer_email"], "transaction_date_time" => date("Y-m-d H:i:s"), "paypal_transaction_id" => $vals["txn_id"]);
					$this->db->insert("transaction", $data);
					if ($temp_data[3] != "")
					{
						$query = $this->db->get_where("perk", array("perk_id" => $temp_data[3]));
						$pk = $query->row_array();
						$data = array("perk_get" => $pk["perk_get"] * 1 + 1);
						$this->db->where("perk_id", $temp_data[3]);
						$this->db->update("perk", $data);
					}
					$query = $this->db->get_where("project", array("project_id" => $vals["item_number"]));
					$prj = $query->row_array();
					if ($prj["amount_get"] != "")
					{
						$amt = $prj["amount_get"];
					}
					 else 
					{
						$amt = 0;
					}
					$data = array("amount_get" => $amt + $total_amnt);
					$this->db->where("project_id", $vals["item_number"]);
					$this->db->update("project", $data);
					$prj = $this->project_model->get_project_user($vals["item_number"]);
					$get_login_user = $this->db->query("select * from user where user_id='" . $temp_data[0] . "'");
					$login_user = $get_login_user->row_array();
					$username = $prj["user_name"];
					$project_name = $prj["project_title"];
					$project_page_link = site_url("projects/" . $prj["url_project_title"] . "/" . $prj["project_id"]);
					$donor_name = $login_user["user_name"];
					$donote_amount = $amount;
					$donor_profile_link = site_url("member/" . $temp_data[0]);
					$project_owner_email = $prj["email"];
					$donar_email = $login_user["email"];
					$project = $prj;
					$facebook_setting = facebook_setting();
					$project_share_link = site_url("projects/" . $prj["url_project_title"] . "/" . $prj["project_id"]);
					if (($project["image"] != "") && (is_file("upload/thumb/" . $project["image"])))
					{
						$image = base_url() . "upload/thumb/" . $project["image"];
					}
					 else 
					{
						$get_gallery = $this->get_all_project_gallery($project["project_id"]);
						$grcnt = 1;
						if ($get_gallery)
						{
							foreach ($get_gallery as $glr)
							{
								if (($glr->project_image != "") && (is_file("upload/thumb/" . $glr->project_image)) && ($grcnt == 1))
								{
									continue;
								}
								$image = base_url() . "upload/thumb/" . $glr->project_image;
								$grcnt = 2;
								continue;
							}
						}
						 else 
						{
							if ($grcnt == 1)
							{
								$image = base_url() . "images/no_img.jpg";
							}
							 else 
							{
								$image = base_url() . "images/no_img.jpg";
							}
						}
					}
					$msg = $prj["project_title"];
					if (($login_user["fb_uid"] != "") && ($facebook == "1") && ($login_user["fb_access_token"] != ""))
					{
						$fbAccessToken = $login_user["fb_access_token"];
						$publishStream = $this->fb_connect->publish($login_user["fb_uid"], array("access_token" => $fbAccessToken, "link" => $project_share_link, "picture" => $image, "name" => "Donation on " . $prj["project_title"], "description" => $prj["project_summary"]));
					}
					if (($prj["fb_uid"] != "") && ($prj["facebook_wall_post"] == "1") && ($prj["fb_access_token"] != ""))
					{
						$fbAccessToken = $prj["fb_access_token"];
						$publishStream = $this->fb_connect->publish($prj["fb_uid"], array("access_token" => $fbAccessToken, "link" => $project_share_link, "picture" => $image, "name" => "Donation on " . $prj["project_title"], "description" => $prj["project_summary"]));
					}
					if (($facebook_setting->facebook_user_id != "") && ($facebook_setting->facebook_wall_post == "1") && ($facebook_setting->facebook_access_token != ""))
					{
						$fbAccessToken = $facebook_setting->facebook_access_token;
						$publishStream = $this->fb_connect->publish($facebook_setting->facebook_user_id, array("access_token" => $fbAccessToken, "link" => $project_share_link, "picture" => $image, "name" => "Donation on " . $prj["project_title"], "description" => $prj["project_summary"]));
					}
					$project_share_link = site_url("projects/" . $prj["url_project_title"] . "/" . $prj["project_id"]);
					$twitter_setting = twitter_setting();
					$consumerKey = $twitter_setting->consumer_key;
					$consumerSecret = $twitter_setting->consumer_secret;
					$OAuthToken = $login_user["tw_oauth_token"];
					$OAuthSecret = $login_user["tw_oauth_token_secret"];
					error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
					try
					{
						if (($login_user["tw_oauth_token"] != "0") && ($login_user["tw_oauth_token_secret"] != "0") && ($twitter == "1"))
						{
							$consumerKey = $twitter_setting->consumer_key;
							$consumerSecret = $twitter_setting->consumer_secret;
							$OAuthToken = $login_user["tw_oauth_token"];
							$OAuthSecret = $login_user["tw_oauth_token_secret"];
							$this->load->library("twitteroauth");
							$tweet = new TwitterOAuth($consumerKey, $consumerSecret, $OAuthToken, $OAuthSecret);
							$message = date("Y-m-d H:i:s") . "New Donation on - " . $prj["project_title"] . " Take a look from here - " . $project_share_link;
							$tweet->post("statuses/update", array("status" => '' . $message));
						}
					}
					catch (Exception $e)
					{
						return;
					}
					try
					{
						if (($prj["tw_oauth_token"] != "0") && ($prj["tw_oauth_token_secret"] != "0") && ($prj["autopost_site"] == "1"))
						{
							$consumerKey = $twitter_setting->consumer_key;
							$consumerSecret = $twitter_setting->consumer_secret;
							$OAuthToken = $prj["tw_oauth_token"];
							$OAuthSecret = $prj["tw_oauth_token_secret"];
							$this->load->library("twitteroauth");
							$tweet = new TwitterOAuth($consumerKey, $consumerSecret, $OAuthToken, $OAuthSecret);
							$message = date("Y-m-d H:i:s") . "New Donation on - " . $prj["project_title"] . " Take a look from here - " . $project_share_link;
							$tweet->post("statuses/update", array("status" => '' . $message));
						}
					}
					catch (Exception $e)
					{
						return;
					}
					try
					{
						if (($twitter_setting->tw_oauth_token != "0") && ($twitter_setting->tw_oauth_token_secret != "0") && ($twitter_setting->autopost_site == "1"))
						{
							$consumerKey = $twitter_setting->consumer_key;
							$consumerSecret = $twitter_setting->consumer_secret;
							$OAuthToken = $twitter_setting->tw_oauth_token;
							$OAuthSecret = $twitter_setting->tw_oauth_token_secret;
							$this->load->library("twitteroauth");
							$tweet = new TwitterOAuth($consumerKey, $consumerSecret, $OAuthToken, $OAuthSecret);
							$message = date("Y-m-d H:i:s") . "New Donation on - " . $prj["project_title"] . " Take a look from here - " . $project_share_link;
							$tweet->post("statuses/update", array("status" => '' . $message));
						}
					}
					catch (Exception $e)
					{
						return;
					}
					$email_template = $this->db->query("select * from `email_template` where task='New Fund Admin Notification'");
					$email_temp = $email_template->row();
					$email_message = $email_temp->message;
					$email_subject = $email_temp->subject;
					$email_address_from = $email_temp->from_address;
					$email_address_reply = $email_temp->reply_address;
					$email_message = str_replace("{break}", "<br/>", $email_message);
					$email_message = str_replace("{user_name}", $username, $email_message);
					$email_message = str_replace("{project_name}", $project_name, $email_message);
					$email_message = str_replace("{donor_name}", $donor_name, $email_message);
					$email_message = str_replace("{donote_amount}", $donote_amount, $email_message);
					$email_message = str_replace("{donor_profile_link}", $donor_profile_link, $email_message);
					$email_message = str_replace("{project_page_link}", $project_page_link, $email_message);
					$str = $email_message;
					$this->email->from($email_address_from);
					$this->email->reply_to($email_address_reply);
					$this->email->to($email_address_from);
					$this->email->subject($email_subject);
					$this->email->message($str);
					$this->email->send();
					$email_template = $this->db->query("select * from `email_template` where task='New Fund Owner Notification'");
					$email_temp = $email_template->row();
					$email_message = $email_temp->message;
					$email_subject = $email_temp->subject;
					$email_address_from = $email_temp->from_address;
					$email_address_reply = $email_temp->reply_address;
					$email_message = str_replace("{break}", "<br/>", $email_message);
					$email_message = str_replace("{user_name}", $username, $email_message);
					$email_message = str_replace("{project_name}", $project_name, $email_message);
					$email_message = str_replace("{donor_name}", $donor_name, $email_message);
					$email_message = str_replace("{donote_amount}", $donote_amount, $email_message);
					$email_message = str_replace("{donor_profile_link}", $donor_profile_link, $email_message);
					$email_message = str_replace("{project_page_link}", $project_page_link, $email_message);
					$str = $email_message;
					$user_not = $this->user_model->get_email_notification($prj["user_id"]);
					if ($user_not->add_fund == "1")
					{
						$this->email->from($email_address_from);
						$this->email->reply_to($email_address_reply);
						$this->email->to($project_owner_email);
						$this->email->subject($email_subject);
						$this->email->message($str);
						$this->email->send();
					}
					$email_template = $this->db->query("select * from `email_template` where task='New Fund Donor Notification'");
					$email_temp = $email_template->row();
					$email_message = $email_temp->message;
					$email_subject = $email_temp->subject;
					$email_address_from = $email_temp->from_address;
					$email_address_reply = $email_temp->reply_address;
					$email_message = str_replace("{break}", "<br/>", $email_message);
					$email_message = str_replace("{user_name}", $username, $email_message);
					$email_message = str_replace("{project_name}", $project_name, $email_message);
					$email_message = str_replace("{donor_name}", $donor_name, $email_message);
					$email_message = str_replace("{donote_amount}", $donote_amount, $email_message);
					$email_message = str_replace("{donor_profile_link}", $donor_profile_link, $email_message);
					$email_message = str_replace("{project_page_link}", $project_page_link, $email_message);
					$str = $email_message;
					$user_not = $this->user_model->get_email_notification($this->session->userdata("user_id"));
					if ($user_not->add_fund == "1")
					{
						$this->email->from($email_address_from);
						$this->email->reply_to($email_address_reply);
						$this->email->to($donar_email);
						$this->email->subject($email_subject);
						$this->email->message($str);
						$this->email->send();
						return;
					}
				}
				 else 
				{
					$get_login_user = $this->db->query("select * from user where user_id='" . $temp_data[0] . "'");
					$login_user = $get_login_user->row_array();
					$email_template = $this->db->query("select * from `email_template` where task='New Fund Admin Notification'");
					$email_temp = $email_template->row();
					$email_message = $email_temp->message;
					$email_subject = $email_temp->subject;
					$email_address_from = $email_temp->from_address;
					$email_address_reply = $email_temp->reply_address;
					$str = "Hello " . $login_user["user_name"] . ",

Your payment process is violated due to Transaction ID already Exists in the System.


Please contact administrator.


Thank You.";
					$this->email->from($email_address_from);
					$this->email->reply_to($email_address_reply);
					$this->email->to($login_user["email"]);
					$this->email->subject("Payment Process Failed due to Transaction ID already Exists");
					$this->email->message($str);
					$this->email->send();
					return;
				}
			}
			 else 
			{
				$get_login_user = $this->db->query("select * from user where user_id='" . $temp_data[0] . "'");
				$login_user = $get_login_user->row_array();
				$email_template = $this->db->query("select * from `email_template` where task='New Fund Admin Notification'");
				$email_temp = $email_template->row();
				$email_message = $email_temp->message;
				$email_subject = $email_temp->subject;
				$email_address_from = $email_temp->from_address;
				$email_address_reply = $email_temp->reply_address;
				$str = "Hello " . $login_user["user_name"] . ",

Your payment process is violated due to Internal Error.


Please contact administrator.


Thank You.";
				$this->email->from($email_address_from);
				$this->email->reply_to($email_address_reply);
				$this->email->to($login_user["email"]);
				$this->email->subject("Payment Process Failed due to internal error");
				$this->email->message($str);
				$this->email->send();
				$str = "Hello Administrator,

 Payment process is violated due to Internal Error.

Donar Name : " . $login_user["user_name"] . "
\\Email : " . $login_user["email"] . "

Payee Email : " . $login_user["paypal_email"] . " 

Please check your settings.Try again.


Thank You.";
				$this->email->from($email_address_from);
				$this->email->reply_to($email_address_reply);
				$this->email->to($email_address_from);
				$this->email->subject("Paypal Payment Process Failed on Project" . $prj["project_title"] . "(" . $prj["project_id"] . ")");
				$this->email->message($str);
				$this->email->send();
				$update = false;
			}
		}
		return;
	}

};;


