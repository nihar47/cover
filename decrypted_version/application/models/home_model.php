<?php


class Home_model extends ROCKERS_Model {

	public $lang = array();
	public $user_id = "";
	public $full_name = "";
	public $pwd = "";
	public $fb_uid = "";

	public function Home_model() {

		parent::__construct();
		return;
	}

	public function text_echo($text) {

		return array_key_exists($text, $this->lang) ? $this->lang[$text] : $text;
	}
	
	public function successful_total() {

		$sites = $this->db->query("select * from site_setting");
		$site_setting = $sites->row();
		$successful = $site_setting->successful;
		if ($successful == "")
		{
			$successful = "60";
		}
		$query = $this->db->query("select project.*,user.user_name,user.image as uimg,user.country,user.state from project, user where user.user_id=project.user_id  and project.amount_get >= (project.amount * " . $successful . " )/100 and project.amount<>'' and project_draft=1 order by project.amount_get desc");
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}

	public function successful($offset, $limit) {

		$sites = $this->db->query("select * from site_setting");
		$site_setting = $sites->row();
		$successful = $site_setting->successful;
		if ($successful == "")
		{
			$successful = "60";
		}
		$query = $this->db->query("select project.*,user.user_name,user.image as uimg,user.country,user.state from project, user where user.user_id=project.user_id  and project.amount_get >= (project.amount * " . $successful . " )/100 and project.amount<>'' and project_draft=1 order by project.amount_get  LIMIT " . $limit . " OFFSET " . $offset);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}
	public function get_testimonial() {

		$query = $this->db->query("select * from testimonials where active=1 order by id desc limit 1");
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}
	
	public function my_wallet_amount() {

		$query1 = $this->db->query("SELECT SUM(debit) as sumd FROM wallet where admin_status='Confirm' and user_id='" . $this->session->userdata("user_id") . "' and donate_status not in ('0','3','2')");
		$query2 = $this->db->query("SELECT SUM(credit) as sumc FROM wallet where admin_status='Confirm' and user_id='" . $this->session->userdata("user_id") . "' and donate_status not in ('2','3')");
		if ($query1->num_rows() > 0)
		{
			$result1 = $query1->row();
			$result2 = $query2->row();
			$debit = $result1->sumd;
			$credit = $result2->sumc;
			$total = $debit - $credit;
			return $total;
		}
		return 0;
	}

	public function spam_protection() {

		$chk_spam = $this->db->query("select * from spam_ip where spam_ip='" . $_SERVER["REMOTE_ADDR"] . "' order by spam_id desc limit 1");
		if ($chk_spam->num_rows() > 0)
		{
			return 1;
		}
		return 0;
	}

	public function check_spam_register() {

		$spam_control = $this->db->query("select * from spam_control");
		$control = $spam_control->row();
		$total_register = $control->total_register;
		$register_expire = date("Y-m-d", strtotime("+" . $control->register_expire . " days"));
		$chk_spam = $this->db->query("select * from user where signup_ip='" . $_SERVER["REMOTE_ADDR"] . "' and DATE(date_added)='" . date("Y-m-d") . "'");
		if ($chk_spam->num_rows() > 0)
		{
			$total_posted_register = $chk_spam->num_rows(); 
			if ($total_register <= $total_posted_register)
			{
				$make_spam = $this->db->query("insert into spam_ip(`spam_ip`,`start_date`,`end_date`)values('" . $_SERVER["REMOTE_ADDR"] . "','" . date("Y-m-d") . "','" . $register_expire . "')");
				return 1;
			}
			return 0;
		}
		return 0;
	}

	public function check_spam_inquiry() {

		$spam_control = $this->db->query("select * from spam_control");
		$control = $spam_control->row();
		$total_contact = $control->total_contact;
		$contact_expire = date("Y-m-d", strtotime("+" . $control->contact_expire . " days"));
		$chk_spam = $this->db->query("select * from spam_inquiry where inquire_spam_ip='" . $_SERVER["REMOTE_ADDR"] . "' and inquire_date='" . date("Y-m-d") . "'");
		if ($chk_spam->num_rows() > 0)
		{
			$total_posted_inquire = $chk_spam->num_rows();
			if ($total_contact <= $total_posted_inquire)
			{
				$make_spam = $this->db->query("insert into spam_ip(`spam_ip`,`start_date`,`end_date`)values('" . $_SERVER["REMOTE_ADDR"] . "','" . date("Y-m-d") . "','" . $contact_expire . "')");
				$delete_inquiry = $this->db->query("delete from spam_inquiry where inquire_spam_ip='" . $_SERVER["REMOTE_ADDR"] . "'");
				return 1;
			}
			return 0;
		}
		return 0;
	}

	public function insert_inquiry() {

		$query = $this->db->query("insert into spam_inquiry(`inquire_spam_ip`,`inquire_date`)values('" . $_SERVER["REMOTE_ADDR"] . "','" . date("Y-m-d") . "')");
		return;
	}

	public function check_project_user_paypal_add() {

		$paypal_adaptive_detail = $this->db->query("select * from paypal");
		$paypal = $paypal_adaptive_detail->row();
		if ($paypal->gateway_status == "1")
		{
			$query = $this->db->query("select * from user where user_id='" . $this->session->userdata("user_id") . "'");
			if ($query->num_rows() > 0)
			{
				$detail = $query->row_array();
				if (($detail["paypal_email"] != "") && ($detail["paypal_verified"] == "1" || $detail["paypal_verified"] == 1))
				{
					return 1;
				}
				if ($detail["paypal_verified"] == "0" || $detail["paypal_verified"] == 0)
				{
					return 0;
				}
				return 0;
			}
			return 2;
		}
		return 2;
	}

	public function check_project_user_amazon_add() {

		$amazon_detail = $this->db->query("select * from amazon");
		$amazons = $amazon_detail->row();
		if ($amazons->gateway_status == "1")
		{
			$query = $this->db->query("select * from user where user_id='" . $this->session->userdata("user_id") . "'");
			if ($query->num_rows() > 0)
			{
				$detail = $query->row_array();
				if (($detail["amazon_token_id"] != "") && ($detail["refund_token_id"] != ""))
				{
					return 1;
				}
				return 0;
			}
			return 2;
		}
		return 2;
	}

	public function check_project_user_paypal_credit_card_add() {

		$paypal_credit_card_detail = $this->db->query("select * from paypal_credit_card");
		$paypal_credit_card = $paypal_credit_card_detail->row();
		if ($paypal_credit_card->credit_card_gateway_status == 1)
		{
			$check_credit_card = $this->db->query("select * from user_card_info where user_id='" . $this->session->userdata("user_id") . "'");
			if ($check_credit_card->num_rows() > 0)
			{
				$credit_row = $check_credit_card->row();
				if ($credit_row->card_verify_status == 1)
				{
					return 1;
				}
				if (($credit_row->card_paypal_email != "") && ($credit_row->card_paypal_verify == 1))
				{
					return 1;
				}
				return 0;
			}
			return 0;
		}
		return 2;
	}

	public function select_text() {

		$query = $this->db->query("select site_language from site_setting");
		$res_lang = $query->row_array();
		$query = $this->db->query("select tk.*,tt.text_id,tt.translation_id,tt.text from translation_key tk LEFT JOIN (select * from translation_text where translation_id=" . $res_lang["site_language"] . ") tt ON tk.key_id=tt.key_id");
		$res = $query->result();
		foreach ($res as $r)
		{
			$this->lang[$r->key] = $r->text != "" ? $r->text : $r->key;
			continue;
		}
		return $this->lang;
	}

	public function save_image($image_no = "", $data = array()) {

		$query = $this->db->get_where("user", array("image_no" => $image_no));
		if ($query->num_rows() > 0)
		{
			$r = $query->row();
			$this->db->where("image_no", $image_no);
			$this->db->update("user", $data);
			$id = $r->user_id;
		}
		 else 
		{
			$this->db->insert("user", $data);
			$id = mysql_insert_id();
		}
		return $id;
	}

	public function register() {
        //echo 'register';exit;
		$this->load->helper("cookie");
		$active = 0;
		if ($this->input->post("fb_img"))
		{
			$image = $this->input->post("fb_img");
			$active = 1;
		}
		$confirm_key = randomnumber(10);
		$unique_code = unique_user_code(getrandomcode(12));
		$reference_user_id = "";
		$invite_code = "";
		if ($this->input->post("invite_code") != "")
		{
			$invite_code = $this->input->post("invite_code");
		}
		 else 
		{
			$referral_cookie = get_cookie("invite_code", TRUE);
			if (isset($referral_cookie))
			{
				$invite_code = $referral_cookie;
			}
			 else 
			{
				if (isset($_COOKIE["invite_code"]))
				{
					$invite_code = $_COOKIE["invite_code"];
				}
				 else 
				{
					if (isset($HTTP_COOKIE_VARS["invite_code"]))
					{
						$invite_code = $HTTP_COOKIE_VARS["invite_code"];
					}
				}
			}
		}
		if ($reference_user_id == "" || $reference_user_id == 0)
		{
			if ($this->session->userdata("invite_code") != "")
			{
				$invite_code = $this->session->userdata("invite_code");
			}
		}
		if ($invite_code != "")
		{
			$check_reference_user = $this->db->get_where("user", array("unique_code" => $invite_code));
			if ($check_reference_user->num_rows() > 0)
			{
				$get_reference_user = $check_reference_user->row();
				$reference_user_id = $get_reference_user->user_id;
			}
		}
		$paypal_verified=1;
		$data = array("user_name" => $this->input->post("user_name"), "last_name" => $this->input->post("last_name"), "email" => $this->input->post("email"), "password" => $this->input->post("password"), "signup_ip" => $_SERVER["REMOTE_ADDR"], "active" => $active, "date_added" => date("Y-m-d H:i:s"), "image" => $this->input->post("image_name"), "tw_screen_name" => $this->input->post("tw_screen_name"), "fb_uid" => $this->input->post("fb_uid"), "fb_access_token" => $this->input->post("fb_access_token"), "tw_id" => $this->input->post("tw_id"), "tw_oauth_token" => $this->input->post("oauth_token"), "tw_oauth_token_secret" => $this->input->post("oauth_token_secret"), "confirm_key" => $confirm_key, "unique_code" => $unique_code, "reference_user_id" => $reference_user_id,"paypal_email" => $this->input->post("email"),"paypal_verified" => $paypal_verified);
		if ($this->input->post("image_no") != "")
		{
			$query = $this->db->get_where("user", array("image_no" => $this->input->post("image_no")));
			if ($query->num_rows() > 0)
			{
				$r = $query->row();
				$this->db->where("image_no", $this->input->post("image_no"));
				$this->db->update("user", $data);
				$user_id = $r->user_id;
			}
			 else 
			{
				$this->db->insert("user", $data);
				$user_id = mysql_insert_id();
			}
		}
		 else 
		{
			$this->db->insert("user", $data);
			$user_id = mysql_insert_id();
		}
		$delete = $this->db->query("delete from user where user_name='' and last_name='' and email='' and password='' and image_no='" . $this->input->post("image_no") . "'");
		if ($invite_code != "")
		{
			$this->session->set_userdata("invite_code", $this->security->xss_clean(""));
			setcookie("invite_code", "", "", "", "", "");
		}
		$user_notification = mysql_query("SHOW COLUMNS FROM user_notification");
		$res = mysql_fetch_array($user_notification);
		$fields = "";
		$values = "";
		while ($res = mysql_fetch_array($user_notification))
		{
			if ($fields == "")
			{
				$fields .= "(`" . $res["Field"] . "`";
				$values .= "('" . $user_id . "'";
				continue;
			}
			$fields .= ",`" . $res["Field"] . "`";
			$values .= ",'1'";
			continue;
		}
		$fields .= ")";
		$values .= ")";
		$insert_val = $fields . " values " . $values;
		mysql_query("insert into user_notification " . $insert_val . "");
		$query = $this->db->get_where("user", array("user_id" => $user_id));
		if ($query->num_rows() > 0)
		{
			$user = $query->row_array();
			if ($this->input->post("user_send_newsletters") == 1)
			{
				$this->newsletter_model->make_new_subscription($user["email"], 0);
			}
			$affiliate_setting = affiliate_setting();
			if ($affiliate_setting->affiliate_enable == 1)
			{
				if (($user["reference_user_id"] != "") && $user["reference_user_id"] > 0)
				{
					$get_affiliate_user = get_user_detail($user["reference_user_id"]);
					if ($get_affiliate_user)
					{
						$signup_commission = affiliate_commission_setting(1);
						if ($signup_commission)
						{
							$signup_commission_fee = $signup_commission->commission;
							if ($signup_commission_fee > 0)
							{
								$earn_data = array("user_id" => $get_affiliate_user["user_id"], "referral_user_id" => $user_id, "earn_amount" => $signup_commission_fee, "earn_date" => date("Y-m-d H:i:s"), "earn_status" => 0);
								$this->db->insert("affiliate_user_earn", $earn_data);
							}
						}
					}
				}
			}
			if ($user["active"] == 1)
			{
				$data1 = array("user_id" => $user["user_id"], "login_date_time" => date("Y-m-d H:i:s"), "login_ip" => $_SERVER["REMOTE_ADDR"]);
				$this->db->insert("user_login", $data1);
			}
			if ($this->input->post("remember") == "1")
			{
				set_cookie(true);
			}
			 else 
			{
				set_cookie(false);
			}
			$query2 = $this->db->get_where("project", array("user_id" => $user["user_id"]));
			if ($query2->num_rows() > 0)
			{
				$project = $query2->row_array();
				$project_id = $project["project_id"];
				$project_title = $project["project_title"];
				$url_project_title = $project["url_project_title"];
			}
			 else 
			{
				$project_id = 0;
				$project_title = "";
				$url_project_title = "";
			}
			$data = array("user_id" => $user["user_id"], "user_name" => $user["user_name"], "project_id" => $project_id, "project_title" => $project_title, "url_project_title" => $url_project_title);
			if ($this->input->post("fb_uid"))
			{
				$this->session->set_userdata($data);
			}
			if ($this->input->post("tw_id"))
			{
				$this->session->set_userdata($data);
			}
			return $user_id;
		}
		return "0";
	}

	public function update_account() {
    //echo 'dip account';
		$image = "no_img.jpg";
		//print_r($_FILES);
		//print_r($_POST["file1"]["name"]);exit;
		if ($_FILES)
		{ //echo 'update file';exit;
			if ($_FILES["file1"]["name"] != "")
			{
				global $_FILES;
				$_FILES["userfile"]["name"] = $_FILES["file1"]["name"];
				global $_FILES;
				$_FILES["userfile"]["type"] = $_FILES["file1"]["type"];
				global $_FILES;
				$_FILES["userfile"]["tmp_name"] = $_FILES["file1"]["tmp_name"];
				global $_FILES;
				$_FILES["userfile"]["error"] = $_FILES["file1"]["error"];
				global $_FILES;
				$_FILES["userfile"]["size"] = $_FILES["file1"]["size"];
				$image = user_image_upload($_FILES);
				if($this->input->post("prev_image")!="")
				{
  			    unlink("upload/profile_image/".$this->input->post("prev_image"));
				unlink("upload/thumb/".$this->input->post("prev_image"));
				unlink("upload/orig/".$this->input->post("prev_image"));
				}
			}
			 else 
			{
				if ($this->input->post("prev_image") != "")
				{
					$image = $this->input->post("prev_image");
				}
				 else 
				{
					$image = "";
				}
			}
		}
		$rs = site_setting();
		$city = "";
		$state = "";
		$country = "";
		$address = explode(",", $this->input->post("address"));
		$cnt = count($address);
		$fetch = $cnt - $rs["address_limit"];
		if (count($address) <= $fetch || $fetch <= 0)
		{
			if (isset($address[$cnt - 3]))
			{
				$city = $address[$cnt - 3];
			}
			if (isset($address[$cnt - 2]))
			{
				$state = $address[$cnt - 2];
			}
			if (isset($address[$cnt - 1]))
			{
				$country = $address[$cnt - 1];
			}
		}
		 else 
		{
			$city = $address[$fetch];
			$state = $address[$fetch + 1];
			$country = $address[$fetch + 2];
		}
		if ($this->input->post("profile_name") != "")
		{
			$data = array("user_name" => $this->input->post("user_name"), "last_name" => $this->input->post("last_name"), "address" => $this->input->post("address"),"image" => $image,"country" => $country, "city" => $city, "state" => $state, "zip_code" => $this->input->post("zip_code"), "gender" => $this->input->post("gender"), "user_about" => $this->input->post("user_about"), "user_occupation" => $this->input->post("user_occupation"), "user_interest" => $this->input->post("user_interest"), "user_skill" => $this->input->post("user_skill"), "profile_name" => $this->input->post("profile_name"));
		}
		 else 
		{
			$data = array("user_name" => $this->input->post("user_name"), "last_name" => $this->input->post("last_name"), "address" => $this->input->post("address"),"image" => $image, "country" => $country, "city" => $city, "state" => $state, "zip_code" => $this->input->post("zip_code"), "gender" => $this->input->post("gender"), "user_about" => $this->input->post("user_about"), "user_occupation" => $this->input->post("user_occupation"), "user_interest" => $this->input->post("user_interest"), "user_skill" => $this->input->post("user_skill"));
		}
		$this->db->where("user_id", $this->input->post("user_id"));
		$this->db->update("user", $data);
		return;
	}

	public function update_social_networks() {

		$data = array("user_website" => $this->input->post("user_website"), "facebook_url" => $this->input->post("facebook_url"), "twitter_url" => $this->input->post("twitter_url"), "linkedln_url" => $this->input->post("linkedln_url"), "googleplus_url" => $this->input->post("googleplus_url"), "bandcamp_url" => $this->input->post("bandcamp_url"), "youtube_url" => $this->input->post("youtube_url"), "myspace_url" => $this->input->post("myspace_url"), "enable_facebook_stream" => $this->input->post("enable_facebook_stream"), "enable_twitter_stream" => $this->input->post("enable_twitter_stream"), "facebook_wall_post" => $this->input->post("facebook_wall_post"), "autopost_site" => $this->input->post("autopost_site"));
		$this->db->where("user_id", $this->input->post("user_id"));
		$this->db->update("user", $data);
		return;
	}

	public function is_login() {

		$this->load->helper("cookie");
		$username = $this->input->post("email_login");
		$password = $this->input->post("password_login");
		$query = $this->db->get_where("user", array("email" => $username, "password" => $password));
		if ($query->num_rows() > 0)
		{
			$user = $query->row_array();
			if ($user["active"] == "1")
			{
				$data1 = array("user_id" => $user["user_id"], "login_date_time" => date("Y-m-d H:i:s"), "login_ip" => $_SERVER["REMOTE_ADDR"]);
				$this->db->insert("user_login", $data1);
				if ($this->input->post("remember") == "1")
				{
					set_cookie(true);
				}
				 else 
				{
					set_cookie(false);
				}
				$query2 = $this->db->get_where("project", array("user_id" => $user["user_id"]));
				if ($query2->num_rows() > 0)
				{
					$project = $query2->row_array();
					$project_id = $project["project_id"];
					$project_title = $project["project_title"];
					$url_project_title = $project["url_project_title"];
				}
				 else 
				{
					$project_id = 0;
					$project_title = "";
					$url_project_title = "";
				}
				$data = array("user_id" => $user["user_id"], "user_name" => $user["user_name"], "email" => $user["email"], "project_id" => $project_id, "project_title" => $project_title, "url_project_title" => $url_project_title);
				$this->session->set_userdata($data);
				return "1";
			}
			return 2;
		}
		return "0";
	}

	public function check_email() {

		$email = $this->input->post("email2");
		$query = $this->db->get_where("user", array("email" => $email));
		if ($query->num_rows() > 0)
		{
			$row = $query->row();
			if ($row->email != "")
			{
				$email_template = $this->db->query("select * from `email_template` where task='Forgot Password'");
				$email_temp = $email_template->row();
				$email_address_from = $email_temp->from_address;
				$email_address_reply = $email_temp->reply_address;
				$email_subject = $email_temp->subject;
				$email_message = $email_temp->message;
				$username = $row->user_name;
				$password = $row->password;
				$email = $row->email;
				$email_to = $email;
				$login_link = base_url();
				$email_message = str_replace("{break}", "<br/>", $email_message);
				$email_message = str_replace("{user_name}", $username, $email_message);
				$email_message = str_replace("{password}", $password, $email_message);
				$email_message = str_replace("{email}", $email, $email_message);
				$email_message = str_replace("{login_link}", $login_link, $email_message);
				$str = $email_message;
				email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);
				return "1";
			}
			return "0";
		}
		return "0";
	}

	public function user_unique($str) {

		if ($this->input->post("user_id"))
		{
			$query = $this->db->get_where("user", array("user_id" => $this->input->post("user_id")));
			$res = $query->row_array();
			$email = $res["email"];
			$query = $this->db->query('' . "select email from user where email = '" . $str . "' and email != '" . $email . "'");
		}
		 else 
		{
			$query = $this->db->query('' . "select email from user where email = '" . $str . "'");
		}
		if ($query->num_rows() > 0)
		{
			return FALSE;
		}
		return TRUE;
	}

	public function validate_user_facebook($uid = 0, $email = "") {

		$this->load->library("fb_connect");
		if (!($this->fb_connect->fbSession))
		{
			return false;
		}
		$this->user_id = $uid;
		if ($email != "")
		{
			$query = $this->db->get_where("user", array("email" => $email, "active" => "1"));
			if ($query->num_rows() > 0)
			{
				$this->db->query("Update user set fb_uid='" . $this->user_id . "' where email='" . $email . "' and active='1'");
				$user = $query->row_array();
				if ($user["unique_code"] == "")
				{
					$unique_code = unique_user_code(getrandomcode(12));
					$this->db->query("Update user set unique_code='" . $unique_code . "' where email='" . $email . "' and active='1'");
				}
				$data1 = array("user_id" => $user["user_id"], "login_date_time" => date("Y-m-d H:i:s"), "login_ip" => $_SERVER["REMOTE_ADDR"]);
				$this->db->insert("user_login", $data1);
				$query2 = $this->db->get_where("project", array("user_id" => $user["user_id"]));
				if ($query2->num_rows() > 0)
				{
					$project = $query2->row_array();
					$project_id = $project["project_id"];
					$project_title = $project["project_title"];
					$url_project_title = $project["url_project_title"];
				}
				 else 
				{
					$project_id = 0;
					$project_title = "";
					$url_project_title = "";
				}
				$data = array("user_id" => $user["user_id"], "user_name" => $user["user_name"], "project_id" => $project_id, "project_title" => $project_title, "url_project_title" => $url_project_title, "facebook_id" => $this->user_id);
				$this->session->set_userdata($data);
				return "2";
			}
			$this->db->where("fb_uid", $this->user_id);
			$q = $this->db->get("user");
			if ($q->num_rows == 1)
			{
				$query = $this->db->get_where("user", array("fb_uid" => $this->user_id, "active" => "1"));
				if ($query->num_rows() > 0)
				{
					$user = $query->row_array();
					$data1 = array("user_id" => $user["user_id"], "login_date_time" => date("Y-m-d H:i:s"), "login_ip" => $_SERVER["REMOTE_ADDR"]);
					$this->db->insert("user_login", $data1);
					$query2 = $this->db->get_where("project", array("user_id" => $user["user_id"]));
					if ($query2->num_rows() > 0)
					{
						$project = $query2->row_array();
						$project_id = $project["project_id"];
						$project_title = $project["project_title"];
						$url_project_title = $project["url_project_title"];
					}
					 else 
					{
						$project_id = 0;
						$project_title = "";
						$url_project_title = "";
					}
					$data = array("user_id" => $user["user_id"], "user_name" => $user["user_name"], "project_id" => $project_id, "project_title" => $project_title, "url_project_title" => $url_project_title, "facebook_id" => $this->user_id);
					$this->session->set_userdata($data);
					return "2";
				}
				return true;
			}
			return false;
		}
		$this->db->where("fb_uid", $this->user_id);
		$q = $this->db->get("user");
		if ($q->num_rows == 1)
		{
			$query = $this->db->get_where("user", array("fb_uid" => $this->user_id, "active" => "1"));
			if ($query->num_rows() > 0)
			{
				$user = $query->row_array();
				$data1 = array("user_id" => $user["user_id"], "login_date_time" => date("Y-m-d H:i:s"), "login_ip" => $_SERVER["REMOTE_ADDR"]);
				$this->db->insert("user_login", $data1);
				$query2 = $this->db->get_where("project", array("user_id" => $user["user_id"]));
				if ($query2->num_rows() > 0)
				{
					$project = $query2->row_array();
					$project_id = $project["project_id"];
					$project_title = $project["project_title"];
					$url_project_title = $project["url_project_title"];
				}
				 else 
				{
					$project_id = 0;
					$project_title = "";
					$url_project_title = "";
				}
				$data = array("user_id" => $user["user_id"], "user_name" => $user["user_name"], "project_id" => $project_id, "project_title" => $project_title, "url_project_title" => $url_project_title, "facebook_id" => $this->user_id);
				$this->session->set_userdata($data);
				return "2";
			}
			return true;
		}
		return false;
	}

	public function get_user_by_fb_uid($fb_id = 0, $email = "") {

		if ($email != "")
		{
			$sql = " SELECT * FROM user WHERE fb_uid ='" . $fb_id . "' or email='" . $email . "'";
		}
		 else 
		{
			$sql = " SELECT * FROM user WHERE fb_uid ='" . $fb_id . "'";
		}
		$usr_qry = $this->db->query($sql);
		if ($usr_qry->num_rows == 1)
		{
			return $usr_qry->row();
		}
		return false;
	}

	public function add_facebook($fb_uid) {

		$data = array("fb_uid" => $fb_uid);
		$this->db->where("user_id", $this->session->userdata("user_id"));
		$this->db->update("user", $data);
		return;
	}

	public function add_twitter($twitter_id, $screen_name, $oauth_token, $oauth_token_secret) {

		$data = array("tw_id" => $twitter_id, "tw_screen_name" => $screen_name, "tw_oauth_token" => $oauth_token, "tw_oauth_token_secret" => $oauth_token_secret);
		$this->db->where("user_id", $this->session->userdata("user_id"));
		$this->db->update("user", $data);
		return;
	}

	public function check_twitter_exists($twitter_id) {

		$query = $this->db->query("select * from user where tw_id='" . $twitter_id . "'  and active=1 ");
		if ($query->num_rows() > 0)
		{
			return true;
		}
		return false;
	}

	public function get_twitter_user_detail($twitter_id) {

		$query = $this->db->query("select * from user where tw_id='" . $twitter_id . "'  ");
		if ($query->num_rows() > 0)
		{
			return $query->row_array();
		}
		return 0;
	}

	public function auto_comp_text($text) {

		$query = "
select * from project left join user on project.user_id=user.user_id  where project.active=1 and  (project.project_title like '%" . $text . "%' or user.user_name like '%" . $text . "%' or user.last_name like '%" . $text . "%' or project.project_summary like '%" . $text . "%') order by project.project_title asc limit 10";
		$result = $this->db->query($query);
		if ($result->num_rows() > 0)
		{
			return $result->result_array();
		}
		return 0;
	}

	public function get_country() {

		$this->db->where("active", 1);
		$this->db->order_by("country_name", "asc");
		$query = $this->db->get("country");
		return $query->result();
	}

	public function get_state() {

		$this->db->where("active", 1);
		$this->db->order_by("state_name", "asc");
		$query = $this->db->get("state");
		return $query->result();
	}

	public function get_countrywise_state($country_id) {

		$this->db->where("active", 1);
		$this->db->where("country_id", $country_id);
		$this->db->order_by("state_name", "asc");
		$query = $this->db->get("state");
		return $query->result();
	}

	public function get_statewise_city($state_id) {

		$this->db->where("active", 1);
		$this->db->where("state_id", $state_id);
		$this->db->order_by("city_name", "asc");
		$query = $this->db->get("city");
		return $query->result();
	}

	public function get_gallery() {

		$this->db->select("*");
		$this->db->from("gallery");
		$this->db->where("active", "1");
		$this->db->order_by("gallery_id", "desc");
		$this->db->limit(18);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function get_member_gallery() {

		$this->db->select("*");
		$this->db->from("user");
		$this->db->where("active", "1");
		$this->db->where("image !=", " ");
		$this->db->order_by("user_id", "random");
		$this->db->limit(18);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function get_idea() {

		$this->db->select("*");
		$this->db->from("idea");
		$this->db->where("active", "1");
		$this->db->order_by("idea_id", "desc");
		$this->db->limit(5);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function all_project_count() {

		$query = $this->db->query("select project.*,user.user_name,user.image as uimg,user.country,user.state from project, user where user.user_id=project.user_id and project.active=1  and project.end_date>='" . date("Y-m-d H:i:s") . "' order by project.project_id desc ");
		return $query->num_rows();
	}

	public function all_project($offset, $limit) {

		$query = $this->db->query("select project.*,user.user_name,user.image as uimg,user.country,user.state from project, user where user.user_id=project.user_id and project.active=1  and project.end_date>='" . date("Y-m-d H:i:s") . "' order by project.project_id desc");
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function latest_funded_project() {

		$query = $this->db->query("select project.*,user.user_name,user.image as uimg,user.country,user.state from project, user,transaction where user.user_id=project.user_id and project.active=1 and project.project_id=transaction.project_id  and project.end_date>='" . date("Y-m-d H:i:s") . "' group by project.project_id order by transaction.transaction_date_time desc");
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function get_category($parent_id = 0) {

		$this->db->where("active", 1);
		$this->db->where("parent_project_category_id", $parent_id);
		$this->db->order_by("project_category_name", "asc");
		$query = $this->db->get("project_category");
		return $query->result();
	}

	public function get_all_category() {

		$this->db->where("active", 1);
		$this->db->order_by("project_category_name", "asc");
		$query = $this->db->get("project_category");
		return $query->result();
	}

	public function get_category_multi($id) {

		$query = $this->db->query("select * from project_category where parent_project_category_id='" . $id . "'");
		return $query->result();
	}

	public function get_latest_donations() {

		$st = array("2", "3", "5");
		$query = $this->db->query("select transaction.*,project.project_title,project.image,project.url_project_title from transaction, project where transaction.project_id = project.project_id and project.status NOT IN ('2', '3', '5') and project.active=1 and project.end_date>='" . date("Y-m-d H:i:s") . "' order by transaction_date_time desc LIMIT 5");
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function get_dashboard_project($uid = null) {

		$query = $this->db->get_where("project", array("project_id" => $uid));
		if ($query->num_rows() > 0)
		{
			return $query->row_array();
		}
		return 0;
	}

	public function get_donation_count($uid = null) {

		$query = $this->db->query("select project.* from project,transaction where project.project_id=transaction.project_id and transaction.user_id=" . $uid);
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}

	public function get_donation($uid) {

		$query = $this->db->query("select project.* from project,transaction where project.project_id=transaction.project_id and transaction.user_id=" . $uid);
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		return 0;
	}

	public function change_password() {

		$this->db->query("update user set password='" . $this->input->post("new_password") . "' where user_id='" . get_authenticateuserid() . "'");
		return;
	}

	public function get_city() {

		$this->db->where("active", 1);
		$this->db->order_by("city_name", "asc");
		$query = $this->db->get("city");
		return $query->result();
	}

	public function add_website($str = "") {

		$data1 = array("user_id" => get_authenticateuserid(), "website_name" => $str);
		$this->db->insert("user_website", $data1);
		return mysql_insert_id();
	}

	public function get_website() {

		$query = $this->db->get_where("user_website", array("user_id" => get_authenticateuserid()));
		return $query->result_array();
	}

	public function delete_website($id = "") {

		$this->db->where(array("user_id" => get_authenticateuserid(), "website_id" => $id));
		$query = $this->db->delete("user_website");
	}

	public function update_email() {

		$data = array("email" => $this->input->post("email"));
		$this->db->where("user_id", $this->input->post("user_id"));
		$this->db->update("user", $data);
		return;
	}

	public function remove_fb() {

		$data = array("fb_uid " => "");
		$this->db->where("user_id", get_authenticateuserid());
		$this->db->update("user", $data);
		return;
	}

	public function search_project($match) {

		if ($match != "none")
		{
			$sql = "select p.*,u.user_name,u.image as uimg,u.country from project p, user u where p.user_id=u.user_id and p.user_id!='' and p.user_id<>0  and p.active=1 and p.end_date>='" . date("Y-m-d H:i:s") . "' and p.status not in (2,3,5) and  (p.project_title like '%" . $match . "%' or p.description like '%" . $match . "%') order by project_id desc";
		}
		 else 
		{
			$sql = "select p.*,u.user_name,u.image as uimg,u.country from project p, user u where p.user_id=u.user_id and p.user_id!='' and p.user_id<>0 and p.active=1 and p.end_date>='" . date("Y-m-d H:i:s") . "' and p.status not in (2,3,5) order by project_id desc";
		}
		$result = $this->db->query($sql);
		if ($result->num_rows() > 0)
		{
			return $result->result();
		}
		return 0;
	}

	public function my_follow_back_project($offset, $limit) {

		$query = $this->db->query("SELECT p.* FROM project p,transaction t,user u,user_follow uf WHERE p.active =1 and p.project_id=t.project_id and t.user_id = u.user_id and u.user_id = uf.follow_user_id and uf.follow_by_user_id =" . get_authenticateuserid() . " LIMIT " . $limit . " OFFSET " . $offset . "");
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function opt_out_user($user_id = "") {

		$data = array("user_opt" => 1);
		$this->db->where("user_id", $user_id);
		if ($this->db->update("user", $data))
		{
			return 1;
		}
		return 0;
	}

	public function notify_followback($user_id = "") {

		$user_data = usernotifications($user_id);
		if ($user_data["follow_back"] == 0)
		{
			$data = array("follow_back" => 1);
		}
		 else 
		{
			$data = array("follow_back" => 0);
		}
		$this->db->where("user_id", $user_id);
		if ($this->db->update("user_notification", $data))
		{
			return 1;
		}
		return 0;
	}

	public function notify_followers($user_id = "") {

		$user_data = usernotifications($user_id);
		if ($user_data["followers"] == 0)
		{
			$data = array("followers" => 1);
		}
		 else 
		{
			$data = array("followers" => 0);
		}
		$this->db->where("user_id", $user_id);
		if ($this->db->update("user_notification", $data))
		{
			return 1;
		}
		return 0;
	}

	public function opt_outof_user($user_id = "") {

		$data = array("user_opt" => 0);
		$this->db->where("user_id", $user_id);
		if ($this->db->update("user", $data))
		{
			return 1;
		}
		return 0;
	}

	public function my_follow_back_project_count() {

		$query = $this->db->query("SELECT p.* FROM project p,transaction t,user u,user_follow uf WHERE p.active =1 and p.project_id=t.project_id and t.user_id = u.user_id and u.user_id = uf.follow_user_id and uf.follow_by_user_id =" . get_authenticateuserid() . " ");
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}

	public function get_projet_categoryfrom_colorcode($colorcode = "") {

		$query = $this->db->get_where("project_category", array("category_color_code" => $colorcode));
		$result = $query->row();
		if ($result)
		{
			return $result->project_category_id;
		}
		return 0;
	}

	public function get_total_my_back_project($uid = null) {
		
		//echo  "select project.* from project,transaction where project.project_id = transaction.project_id and transaction.user_id =" . $uid . " and startproject!=1 GROUP BY transaction.project_id";

		$query = $this->db->query("select project.* from project,transaction where project.project_id = transaction.project_id and transaction.user_id =" . $uid . " and startproject!=1 GROUP BY transaction.project_id");
		return $query->num_rows();
	}

	public function my_backed_project($user_id, $offset, $limit) {

		$query = $this->db->query("select project.*,transaction.transaction_date_time from project,transaction where project.project_id = transaction.project_id and transaction.user_id =" . $user_id . " and startproject!=1 GROUP BY transaction.project_id order by transaction.transaction_id LIMIT " . $limit . " OFFSET " . $offset);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

};;


