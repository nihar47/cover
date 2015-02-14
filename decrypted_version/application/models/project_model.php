<?php


class Project_model extends ROCKERS_Model {

	public function Project_model() {

		parent::__construct();
		return;
	}
	public function update_project_period($project_id){
	//	echo $project_id;
			$pro_info = $this->db->query("select * from project where project_id =".$project_id);
                        if ($pro_info->num_rows() > 0) { 
						foreach($pro_info->result() as $pro){
						 	$day = $pro->end_date;
						echo 	$NewDate = date('Y-m-d H:i:s', strtotime($day . " +30 days"));
						echo	 $total_day = $pro->total_days +30;
							}
						}
		echo 	$query = $this->db->query("update project set end_date='".$NewDate."', total_days=".$total_day." where project_id =".$project_id);
		echo "updated";
				if ($query->num_rows() > 0)
		{
			echo "updated";
			return $query->num_rows();
		}else {
		return 0;
		}
	}
	public function rating($id, $vote) {

		$query = $this->db->get_where("project", array("project_id" => $id));
		$prj = $query->row_array();
		$data = array("total_rate" => $prj["total_rate"] + $vote, "vote" => $prj["vote"] + 1);
		$this->db->where("project_id", $id);
		$this->db->update("project", $data);
		return $prj["total_rate"] + $vote / $prj["vote"] + 1;
	}

	public function report_spam($cmid) {

		$comment_detail = $this->db->query("select * from comment where comment_id='" . $cmid . "'");
		$comment = $comment_detail->row();
		if ($comment->comment_ip != "")
		{
			$report = $this->db->query("insert into spam_report_ip(`spam_ip`,`spam_user_id`,`reported_user_id`)values('" . $comment->comment_ip . "','" . $comment->user_id . "','" . $this->session->userdata("user_id") . "')");
		}
		return;
	}

	public function get_days_left($dateg = "") {

		$date1 = $dateg;
		$date2 = date("Y-m-d");
		$diff = abs(strtotime($date2) - strtotime($date1));
		$test = floor($diff / 60 * 60 * 24);
		$str = "";
		if (strtotime(date("Y-m-d", strtotime($dateg))) > strtotime(date("Y-m-d")))
		{
			$temp = floor($diff / 60 * 60 * 24);
			$str = $dateg != "0000-00-00 00:00:00" ? $test . " <br /><span class='spanf'>" . DAYS_LEFT . "</span>" : "0 <br /><span class='spanf'>" . DAYS_LEFT . "</span>";
		}
		 else 
		{
			$hours = 0;
			$minuts = 0;
			$dategg = $dateg;
			$date2 = date("Y-m-d H:i:s");
			if (strtotime(date("Y-m-d H:i:s", strtotime($dateg))) > strtotime(date("Y-m-d H:i:s")))
			{
				$diff2 = abs(strtotime($dategg) - strtotime($date2));
				$day1 = floor($diff2 / 60 * 60 * 24);
				$hours = floor($diff2 - $day1 * 60 * 60 * 24 / 60 * 60);
				$minuts = floor($diff2 - $day1 * 60 * 60 * 24 - $hours * 60 * 60 / 60);
				$seconds = floor($diff2 - $day1 * 60 * 60 * 24 - $hours * 60 * 60 - $minuts * 60);
				if ($hours != 0 || $minuts != 0 || $seconds != 0)
				{
					$str = $hours . " <br /><span class='spanf'>" . HOURS_LEFT . "</span>";
					if ($hours != 0)
					{
						$str = $hours . " <br /><span class='spanf'>" . HOURS_LEFT . "</span>";
					}
					 else 
					{
						if ($minuts != 0)
						{
							$str = $minuts . " <br /><span class='spanf'>" . MINUTES_LEFT . "</span>";
						}
						 else 
						{
							$str = $seconds . " <br /><span class='spanf'>" . SECONDS_LEFT . "</span>";
						}
					}
				}
				 else 
				{
					$str = "0 <br /><span class='spanf'>" . DAYS_LEFT . "</span>";
				}
			}
			 else 
			{
				$str = "0 <br /><span class='spanf'>" . DAYS_LEFT . "</span>";
			}
		}
		return $str;
	}

	public function current_project_fund_total($id) {

		$query = $this->db->query("select * from transaction t,project p where t.project_id=p.project_id and t.project_id='" . $id . "' order by transaction_id desc");
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}

	public function current_project_fund($id, $offset, $limit) {

		$query = $this->db->query("select * from transaction t,project p where t.project_id=p.project_id and t.project_id='" . $id . "' order by transaction_id desc LIMIT " . $limit . " OFFSET " . $offset . "");
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		return 0;
	}

	public function current_project_total($uid) {

		$this->db->select("p.*,pc.*");
		$this->db->from("project p");
		$this->db->join("project_category pc", "p.category_id=pc.project_category_id", "left");
		$this->db->where("p.active", 1);
		$this->db->where("p.status", 1);
		$this->db->where("p.end_date >=", date("Y-m-d H:i:s"));
		$this->db->where("p.user_id ", $uid);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}

	public function current_project($uid, $offset, $limit) {

		$this->db->select("p.*,pc.*");
		$this->db->from("project p");
		$this->db->join("project_category pc", "p.category_id=pc.project_category_id", "left");
		$this->db->where("p.active", 1);
		$this->db->where("p.status", 1);
		$this->db->where("p.end_date >=", date("Y-m-d H:i:s"));
		$this->db->where("p.user_id", $uid);
		$this->db->order_by("p.project_id", "desc");
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function get_donation_wallet($prj_id, $trans_id) {

		$query2 = "select * from  wallet w where w.project_id='" . $prj_id . "' and w.credit>0 and w.wallet_transaction_id='" . $trans_id . "' ";
		$s_result2 = $this->db->query($query2);
		if ($s_result2->num_rows() > 0)
		{
			return $s_result2->row_array();
		}
		return 0;
	}

	public function get_total_donations_count($id) {

		$query = "select * from transaction t where t.project_id='" . $id . "' and t.wallet_payment_status<>'2' order by t.transaction_id desc";
		$s_result = $this->db->query($query);
		return $s_result->num_rows();
	}

	public function get_donations($id, $offset, $limit) {

		$query2 = "select * from transaction t where t.project_id='" . $id . "' and t.wallet_payment_status<>'2' order by t.transaction_id  desc LIMIT " . $limit . " OFFSET " . $offset . " ";
		$s_result2 = $this->db->query($query2);
		if ($s_result2->num_rows() > 0)
		{
			return $s_result2->result_array();
		}
		return 0;
	}

	public function get_latest_donations($id) {

		$st = array("2", "3", "5");
		$this->db->select("transaction.*,project.project_title");
		$this->db->where("transaction.project_id", $id);
		$this->db->where("transaction.wallet_payment_status !=", "2");
		$this->db->order_by("transaction_date_time", "desc");
		$this->db->limit("6");
		$this->db->from("transaction");
		$this->db->join("project", "transaction.project_id = project.project_id");
		$this->db->where_not_in("project.status", $st);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function project_update() {

		$video_url = "";
		$video_custom = "";
		$CI = &get_instance();
		$base_path = $CI->config->slash_item("base_path");
		$video_url_img = "";
		if ($this->input->post("video_set") == 1)
		{
			if ($_FILES["videofile"]["name"] != "")
			{
				$errors = 0;
				$error = "";
				$video = $_FILES["videofile"]["name"];
				if ($video)
				{
					$filename = stripslashes($_FILES["videofile"]["name"]);
					$extension = "avi";
					$extension = strtolower($extension);
					if (($extension != "avi") && ($extension != "mp3"))
					{
						$error = "Unknown extension!";
						$errors = 1;
					}
					if ($extension == "flv")
					{
						$imganame = rand(1, 10000) . "myvideo.flv";
						$copied = move_uploaded_file($_FILES["videofile"]["tmp_name"], $imganame);
						if (!$copied)
						{
							$errors = 1;
							$error = "Could not upload the video please try again.";
						}
					}
					 else 
					{
						$image_name = time() . "." . $extension;
						$newname = $base_path . "upload/video/" . $image_name;
						$t_name = $_FILES["videofile"]["tmp_name"];
						$imganame = rand(1, 10000) . "myvideo.flv";
						$dest = $base_path . "upload/video/" . $imganame;
						$command = escapeshellcmd("ffmpeg -i " . $t_name . " -ab 56 -ar 22050 -f flv -b 500 -r 15 -s 320x240 " . $dest);
						exec($command);
					}
				}
				$video_custom = $imganame;
			}
			 else 
			{
				$video_custom = $this->input->post("prev_videofile");
			}
		}
		if ($this->input->post("video_set") == 0)
		{
			if ($this->input->post("video") == "")
			{
				$video_url = "";
				$video_url_img = "";
			}
			 else 
			{
				$video_url = $this->input->post("video");
				if (!(stristr($video_url, "youtube")) && (stristr($video_url, "youtu.be")))
				{
					$video_url_img = youtube_thumb_url($video_url, "hqthumb");
				}
				if (stristr($video_url, "vimeo"))
				{
					$vid_code = explode("/", $video_url);
					$vid = $vid_code[count($vid_code) - 1];
					$video_url_img = getvimeoinfo($vid, "thumbnail_large");
				}
			}
		}
		$project_image = "";
		$image_settings = get_image_setting_data();
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
			$new_img = image_upload($_FILES);
			$project_image = $new_img;
			
			if ($this->input->post("prev_project_image") != "")
			{
				if (file_exists(base_path() . "upload/slider/" . $this->input->post("prev_project_image")))
				{
					unlink(base_path() . "upload/slider/" . $this->input->post("prev_project_image"));
				}
				if (file_exists(base_path() . "upload/thumb/" . $this->input->post("prev_project_image")))
				{
					unlink(base_path() . "upload/thumb/" . $this->input->post("prev_project_image"));
				}
				if (file_exists(base_path() . "upload/thumb/" . $this->input->post("prev_project_image")))
				{
					unlink(base_path() . "upload/small_thumb/" . $this->input->post("prev_project_image"));
				}
				if (file_exists(base_path() . "upload/orig/" . $this->input->post("prev_project_image")))
				{
					unlink(base_path() . "upload/orig/" . $this->input->post("prev_project_image"));
				}
			}
		}
		 else 
		{
			if ($this->input->post("prev_project_image") != "")
			{
				$project_image = $this->input->post("prev_project_image");
			}
		}
		$total_days = $this->input->post("total_days");
		$get_project_detail = $this->db->query("select * from project where project_id='" . $this->input->post("project_id") . "'");
		$project_detail = $get_project_detail->row();
		$end_date = date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s") . "+" . $total_days . " days"));
		$get_orig = $this->db->query("select * from project where project_id='" . $this->input->post("project_id") . "'");
		$orig = $get_orig->row();
		$orig_title = $orig->project_title;
		$posted_url_title = $this->input->post("url_project_title");
		$posted_title = $this->input->post("project_title");
		$url_project_title = seourl($this->input->post("project_title"));
		if ($posted_title == "" || $posted_title == "0")
		{
			$url_project_title = "";
		}
		 else 
		{
			if ($posted_title == $orig_title)
			{
				$url_project_title = $this->input->post("url_project_title");
			}
			 else 
			{
				$chk_url_exists = $this->db->query("select MAX(url_project_title) as url_project_title from project where project_id!='" . $this->input->post("project_id") . "' and url_project_title like '" . $url_project_title . "%'");
				if ($chk_url_exists->num_rows() > 0)
				{
					$get_pr = $chk_url_exists->row();
					$strre = str_replace($url_project_title, "", $get_pr->url_project_title);
					if ($strre == "" || $strre == "0")
					{
						$newcnt = "1";
					}
					 else 
					{
						$newcnt = (int)$strre + 1;
					}
					$url_project_title = $url_project_title . $newcnt;
				}
			}
		}
		if ($this->input->post("save_draft") == 0)
		{
			$project_draft = 0;
			$data_project = array("category_id" => $this->input->post("category_id"), "project_title" => $this->input->post("project_title"), "url_project_title" => $url_project_title, "project_summary" => $this->input->post("project_summary"), "total_days" => $this->input->post("total_days"), "payment_type" => $this->input->post("payment_type"), "project_city" => $this->input->post("project_city"), "project_state" => $this->input->post("project_state"), "project_country" => $this->input->post("project_country"), "p_google_code" => $this->input->post("p_google_code"), "display_page" => $this->input->post("projectimagevideoset"), "description" => $this->input->post("description"), "amount" => $this->input->post("amount"), "project_draft" => "0", "image" => $project_image, "video_type" => $this->input->post("video_set"), "video" => $video_url, "custom_video" => $video_custom, "video_image" => $video_url_img, "end_date" => $end_date);
		}
		if ($this->input->post("save_draft") == 1)
		{
			$project_draft = 1;
			$data_project = array("category_id" => $this->input->post("category_id"), "project_title" => $this->input->post("project_title"), "url_project_title" => $url_project_title, "project_summary" => $this->input->post("project_summary"), "project_draft" => "1", "total_days" => $this->input->post("total_days"), "project_city" => $this->input->post("project_city"), "project_state" => $this->input->post("project_state"), "project_country" => $this->input->post("project_country"), "display_page" => $this->input->post("projectimagevideoset"), "description" => $this->input->post("description"), "amount" => $this->input->post("amount"), "image" => $project_image, "video_type" => $this->input->post("video_set"), "video" => $video_url, "custom_video" => $video_custom, "video_image" => $video_url_img, "end_date" => $end_date);
			if ($this->input->post("active") == 0)
			{
				$email_template = $this->db->query("select * from `email_template` where task='New Project Successful Alert'");
				$email_temp = $email_template->row();
				$email_address_from = $email_temp->from_address;
				$email_address_reply = $email_temp->reply_address;
				$email_subject = $email_temp->subject;
				$email_message = $email_temp->message;
				$user_detail = $this->db->query("select * from user where user_id='" . $this->session->userdata("user_id") . "'");
				$user = $user_detail->row();
				$username = $user->user_name;
				$project_name = $this->input->post("project_title");
				$email = $user->email;
				$email_to = $email;
				$project_page_link = site_url("projects/" . $url_project_title . "/" . $this->input->post("project_id"));
				$email_message = str_replace("{break}", "<br/>", $email_message);
				$email_message = str_replace("{user_name}", $username, $email_message);
				$email_message = str_replace("{project_name}", $project_name, $email_message);
				$email_message = str_replace("{email}", $email, $email_message);
				$email_message = str_replace("{project_page_link}", $project_page_link, $email_message);
				$str = $email_message;
				email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);
				$email_template = $this->db->query("select * from `email_template` where task='New Project Post Admin Alert'");
				$email_temp = $email_template->row();
				$email_address_from = $email_temp->from_address;
				$email_address_reply = $email_temp->reply_address;
				$email_subject = $email_temp->subject;
				$email_message = $email_temp->message;
				$user_detail = $this->db->query("select * from user where user_id='" . $this->session->userdata("user_id") . "'");
				$user = $user_detail->row();
				$username = $user->user_name;
				$project_name = $this->input->post("project_title");
				$email = $user->email;
				$email_to = $email;
				$project_page_link = site_url("projects/" . $url_project_title . "/" . $this->input->post("project_id"));
				$user_profile_link = site_url("member/" . $this->session->userdata("user_id"));
				$email_message = str_replace("{break}", "<br/>", $email_message);
				$email_message = str_replace("{user_name}", $username, $email_message);
				$email_message = str_replace("{project_name}", $project_name, $email_message);
				$email_message = str_replace("{project_page_link}", $project_page_link, $email_message);
				$email_message = str_replace("{user_profile_link}", $user_profile_link, $email_message);
				$str = $email_message;
				email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);
			}
		}
		$this->db->where("project_id", $this->input->post("project_id"));
		$this->db->update("project", $data_project);
		$data = array("project_id" => $this->input->post("project_id"), "project_title" => $this->input->post("project_title"), "url_project_title" => $url_project_title);
		$this->session->set_userdata($data);
		return;
	}

	public function project_update_mobile() {

		$video_url = "";
		$video_custom = "";
		$CI = &get_instance();
		$base_path = $CI->config->slash_item("base_path");
		$total_days = $this->input->post("total_days") - 1;
		$get_project_detail = $this->db->query("select * from project where project_id='" . $this->input->post("project_id") . "'");
		$project_detail = $get_project_detail->row();
		$end_date = date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s") . "+" . $total_days . " days"));
		$get_orig = $this->db->query("select * from project where project_id='" . $this->input->post("project_id") . "'");
		$orig = $get_orig->row();
		$orig_title = $orig->project_title;
		$posted_url_title = $this->input->post("url_project_title");
		$posted_title = $this->input->post("project_title");
		$url_project_title = seourl($this->input->post("project_title"));
		if ($posted_title == "" || $posted_title == "0")
		{
			$url_project_title = "";
		}
		 else 
		{
			if ($posted_title == $orig_title)
			{
				$url_project_title = $this->input->post("url_project_title");
			}
			 else 
			{
				$chk_url_exists = $this->db->query("select MAX(url_project_title) as url_project_title from project where project_id!='" . $this->input->post("project_id") . "' and url_project_title like '" . $url_project_title . "%'");
				if ($chk_url_exists->num_rows() > 0)
				{
					$get_pr = $chk_url_exists->row();
					$strre = str_replace($url_project_title, "", $get_pr->url_project_title);
					if ($strre == "" || $strre == "0")
					{
						$newcnt = "1";
					}
					 else 
					{
						$newcnt = (int)$strre + 1;
					}
					$url_project_title = $url_project_title . $newcnt;
				}
			}
		}
		if ($this->input->post("save_draft") == 0)
		{
			$project_draft = 0;
			$data_project = array("category_id" => $this->input->post("category_id"), "project_title" => $this->input->post("project_title"), "url_project_title" => $url_project_title, "project_summary" => $this->input->post("project_summary"), "total_days" => $this->input->post("total_days"), "project_city" => $this->input->post("project_city"), "project_state" => $this->input->post("project_state"), "project_country" => $this->input->post("project_country"), "p_google_code" => $this->input->post("p_google_code"), "display_page" => $this->input->post("projectimagevideoset"), "description" => $this->input->post("description"), "amount" => $this->input->post("amount"), "project_draft" => "0", "image" => "", "video_type" => $this->input->post("video_set"), "video" => $this->input->post("video"), "custom_video" => "", "end_date" => $end_date);
		}
		if ($this->input->post("save_draft") == 1)
		{
			$project_draft = 1;
			$data_project = array("category_id" => $this->input->post("category_id"), "project_title" => $this->input->post("project_title"), "url_project_title" => $url_project_title, "project_summary" => $this->input->post("project_summary"), "project_draft" => "1", "total_days" => $this->input->post("total_days"), "project_city" => $this->input->post("project_city"), "project_state" => $this->input->post("project_state"), "project_country" => $this->input->post("project_country"), "display_page" => $this->input->post("projectimagevideoset"), "description" => $this->input->post("description"), "amount" => $this->input->post("amount"), "image" => "", "video_type" => $this->input->post("video_set"), "video" => $this->input->post("video"), "custom_video" => "", "end_date" => $end_date);
			if ($this->input->post("active") == 0)
			{
				$email_template = $this->db->query("select * from `email_template` where task='New Project Successful Alert'");
				$email_temp = $email_template->row();
				$email_address_from = $email_temp->from_address;
				$email_address_reply = $email_temp->reply_address;
				$email_subject = $email_temp->subject;
				$email_message = $email_temp->message;
				$user_detail = $this->db->query("select * from user where user_id='" . $this->session->userdata("user_id") . "'");
				$user = $user_detail->row();
				$username = $user->user_name;
				$project_name = $this->input->post("project_title");
				$email = $user->email;
				$email_to = $email;
				$project_page_link = site_url("projects/" . $url_project_title . "/" . $this->input->post("project_id"));
				$email_message = str_replace("{break}", "<br/>", $email_message);
				$email_message = str_replace("{user_name}", $username, $email_message);
				$email_message = str_replace("{project_name}", $project_name, $email_message);
				$email_message = str_replace("{email}", $email, $email_message);
				$email_message = str_replace("{project_page_link}", $project_page_link, $email_message);
				$str = $email_message;
				email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);
				$email_template = $this->db->query("select * from `email_template` where task='New Project Post Admin Alert'");
				$email_temp = $email_template->row();
				$email_address_from = $email_temp->from_address;
				$email_address_reply = $email_temp->reply_address;
				$email_subject = $email_temp->subject;
				$email_message = $email_temp->message;
				$user_detail = $this->db->query("select * from user where user_id='" . $this->session->userdata("user_id") . "'");
				$user = $user_detail->row();
				$username = $user->user_name;
				$project_name = $this->input->post("project_title");
				$email = $user->email;
				$email_to = $email;
				$project_page_link = site_url("projects/" . $url_project_title . "/" . $this->input->post("project_id"));
				$user_profile_link = site_url("member/" . $this->session->userdata("user_id"));
				$email_message = str_replace("{break}", "<br/>", $email_message);
				$email_message = str_replace("{user_name}", $username, $email_message);
				$email_message = str_replace("{project_name}", $project_name, $email_message);
				$email_message = str_replace("{project_page_link}", $project_page_link, $email_message);
				$email_message = str_replace("{user_profile_link}", $user_profile_link, $email_message);
				$str = $email_message;
				email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);
			}
		}
		$this->db->where("project_id", $this->input->post("project_id"));
		$this->db->update("project", $data_project);
		$data = array("project_id" => $this->input->post("project_id"), "project_title" => $this->input->post("project_title"), "url_project_title" => $url_project_title);
		$this->session->set_userdata($data);
		redirect("home/dashboard/" . $this->input->post("project_id"));
		return;
	}

	public function get_project_owner_email($prjid) {

		$query = $this->db->query("select * from project p, user u where p.user_id=u.user_id and p.project_id='" . $prjid . "'");
		if ($query->num_rows() > 0)
		{
			$user = $query->row();
			if ($user->paypal_email != "")
			{
				return 1;
			}
			return 0;
		}
		return 0;
	}

	public function get_project_owner_token($prjid) {

		$query = $this->db->query("select * from project p, user u where p.user_id=u.user_id and p.project_id='" . $prjid . "'");
		if ($query->num_rows() > 0)
		{
			$user = $query->row();
			if ($user->amazon_token_id != "")
			{
				return 1;
			}
			return 0;
		}
		return 0;
	}

	public function get_project_owner_credit_card($prjid) {

		$query = $this->db->query("select * from project p, user u where p.user_id=u.user_id and p.project_id='" . $prjid . "'");
		if ($query->num_rows() > 0)
		{
			$user = $query->row();
			$check_credit_card = $this->db->query("select * from user_card_info where user_id='" . $user->user_id . "'");
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
		return 0;
	}

	public function get_paypal_adptive_status() {

		$paypal_adaptive_detail = $this->db->query("select * from paypal");
		$paypal = $paypal_adaptive_detail->row();
		return $paypal->gateway_status;
	}

	public function get_paypal_normal_status() {

		$site_setting_detail = $this->db->query("select * from site_setting");
		$site_setting = $site_setting_detail->row();
		return $site_setting->normal_paypal;
	}

	public function get_amazon_status() {

		$amazon_detail = $this->db->query("select * from amazon");
		$amazons = $amazon_detail->row();
		return $amazons->gateway_status;
	}

	public function get_wallet_status() {

		$wallet_detail = $this->db->query("select * from wallet_setting");
		$wallet = $wallet_detail->row();
		return $wallet->wallet_enable;
	}

	public function get_all_backers($id) {

		$query = $this->db->query("select tr.*, us.user_name, us.last_name,us.image, us.user_id,us.city,us.country ,us.email from transaction tr left join user us on tr.user_id=us.user_id where tr.project_id='" . $id . "' and tr.wallet_payment_status<>'2' order by tr.transaction_id desc ");
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function get_project_user($id) {

		$this->db->select("*");
		$this->db->where("project_id", $id);
		$this->db->from("project");
		$this->db->join("user", "project.user_id = user.user_id");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->row_array();
		}
		return 0;
	}

	public function get_project_detail_category($id) {

		$project = $this->db->query("select * from project where project_id='" . $id . "'");
		$get_category = $project->row();
		$category = $this->db->query("select * from project_category where project_category_id='" . $get_category->category_id . "'");
		return $category->row();
	}

	public function get_one_perk($perk_id) {

		$query = $this->db->get_where("perk", array("perk_id" => $perk_id));
		return $query->row_array();
	}

	public function insert_perk($project_id) {

		$perk_title = $this->input->post("perk_title");
		$perk_description = $this->input->post("perk_description");
		$perk_amount = $this->input->post("perk_amount");
		$perk_total = $this->input->post("perk_total");
		$data = array("project_id" => $project_id, "perk_title" => $perk_title, "perk_description" => $perk_description, "perk_amount" => $perk_amount, "perk_total" => $perk_total);
		$this->db->insert("perk", $data);
		return;
	}

	public function update_perk() {

		$perk_title = $this->input->post("perk_title");
		$perk_description = $this->input->post("perk_description");
		$perk_amount = $this->input->post("perk_amount");
		$perk_total = $this->input->post("perk_total");
		$data = array("perk_title" => $perk_title, "perk_description" => $perk_description, "perk_amount" => $perk_amount, "perk_total" => $perk_total);
		$this->db->where("perk_id", $this->input->post("perk_id"));
		$this->db->update("perk", $data);
		return;
	}

	public function get_all_perks($project_id = "") {

		$query = $this->db->query("select * from perk where project_id='" . $project_id . "' order by CAST(perk_amount as SIGNED INTEGER) ASC");
		return $query->result_array();
	}

	public function get_perk_name($pid) {

		$query = $this->db->query("select * from perk where perk_id='" . $pid . "'");
		if ($query->num_rows() > 0)
		{
			$perk = $query->row();
			return $perk->perk_title;
		}
		return 0;
	}

	public function get_total_project_gallery_count($id) {

		$query = $this->db->query("select * from project_gallery where project_id='" . $this->session->userdata("project_id") . "' order by project_gallery_id asc");
		return $query->num_rows();
	}

	public function get_project_gallery($id, $offset, $limit) {

		$query = $this->db->query("select * from project_gallery where project_id='" . $this->session->userdata("project_id") . "' order by project_gallery_id asc LIMIT " . $limit . " OFFSET " . $offset);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function get_all_project_gallery($id) {

		$query = $this->db->query("select * from project_gallery where project_id='" . $id . "' order by project_gallery_id asc ");
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function comment_insert() {

		$data = array("project_id" => $_POST["project_id"], "user_id" => get_authenticateuserid(), "comments" => $_POST["comments"], "status" => "0", "date_added" => date("Y-m-d H:i:s"), "comment_ip" => $_SERVER["REMOTE_ADDR"]);
		$this->db->insert("comment", $data);
		return mysql_insert_id();
	}

	public function reply_insert() {

		$get_user = $this->db->get_where("user", array("user_id" => $this->session->userdata("user_id")));
		$user = $get_user->row_array();
		$cmid = $this->input->post("comment_id");
		$data = array("project_id" => $this->session->userdata("project_id"), "user_id" => $this->session->userdata("user_id"), "comments" => $this->input->post("comments" . $cmid), "status" => "1", "date_added" => date("Y-m-d H:i:s"), "comment_ip" => $_SERVER["REMOTE_ADDR"]);
		$this->db->insert("comment", $data);
		return;
	}

	public function get_single_commnet($id) {

		$query = $this->db->get_where("comment", array("comment_id" => $id));
		if ($query->num_rows() > 0)
		{
			return $query->row_array();
		}
		return 0;
	}

	public function get_total_comments_count($id) {

		$query = $this->db->query("select c.comment_ip,c.status,c.comments,c.date_added,c.comment_id,u.user_name,u.last_name,u.image,u.user_id from comment c, user u where c.user_id=u.user_id and c.project_id='" . $id . "' and status=1 ");
		return $query->num_rows();
	}

	public function get_some_comments($id, $offset, $limit) {

		$query = $this->db->query("select c.comment_ip,c.status,c.comments,c.date_added,c.comment_id,u.user_name,u.last_name,u.user_id,u.image from comment c, user u  where c.user_id=u.user_id and c.project_id='" . $id . "' order by c.comment_id desc LIMIT " . $limit . " OFFSET " . $offset);
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		return 0;
	}

	public function get_comments($id, $offset = "0", $limit = "0") {

		$getoneprj = get_one_project($id);
		if ((get_authenticateuserid() != "") && ($getoneprj["user_id"] == get_authenticateuserid()))
		{
			$query = $this->db->query("select c.comment_ip,c.status,c.comments,c.date_added,c.comment_id,u.user_name,u.last_name,u.user_id,u.image from comment c, user u where c.user_id=u.user_id and c.project_id='" . $id . "' LIMIT " . $limit . " OFFSET " . $offset);
		}
		 else 
		{
			$query = $this->db->query("select c.comment_ip,c.status,c.comments,c.date_added,c.comment_id,u.user_name,u.last_name,u.user_id,u.image from comment c, user u where c.user_id=u.user_id and c.project_id='" . $id . "' and c.status='1' LIMIT " . $limit . " OFFSET " . $offset);
		}
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		return 0;
	}

	public function check_spam_comment() {

		$spam_control = $this->db->query("select * from spam_control");
		$control = $spam_control->row();
		$limit_comment = $control->total_comment;
		$comment_expire = date("Y-m-d", strtotime("+" . $control->comment_expire . " days"));
		$chk_spam = $this->db->query("select * from comment where user_id='" . $this->session->userdata("user_id") . "' and comment_ip='" . $_SERVER["REMOTE_ADDR"] . "' and DATE(date_added)='" . date("Y-m-d") . "'");
		if ($chk_spam->num_rows() > 0)
		{
			$total_posted_comment = $chk_spam->num_rows();
			if ($limit_comment <= $total_posted_comment)
			{
				$make_spam = $this->db->query("insert into spam_ip(`spam_ip`,`start_date`,`end_date`)values('" . $_SERVER["REMOTE_ADDR"] . "','" . date("Y-m-d") . "','" . $comment_expire . "')");
				return 1;
			}
			return 0;
		}
		return 0;
	}

	public function updates_insert() {

		$image = "no_img.jpg";
		$up_txt = $this->input->post("update");
		if ($up_txt != "")
		{
			$up_txt = str_replace(array(",", "`", "'"), "", $this->input->post("update"));
			$up_txt = str_replace("\"", "KSYDOU", $up_txt);
			$up_txt = str_replace("'", "KSYSING", $up_txt);
			$data = array("project_id" => $this->input->post("project_id"), "update_title" => $this->input->post("update_title"), "updates" => $up_txt, "image" => $image, "status" => "0", "date_added" => date("Y-m-d H:i:s"));
			$this->db->insert("updates", $data);
		}
		return;
	}

	public function get_total_updates_count($id) {

		$query = $this->db->get_where("updates", array("project_id" => $id));
		return $query->num_rows();
	}

	public function get_some_updates($id, $offset, $limit = 2) {

		$this->db->limit($limit, $offset);
		$query = $this->db->get_where("updates", array("project_id" => $id));
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		return 0;
	}

	public function get_updates($id) {

		$query = $this->db->get_where("updates", array("project_id" => $id));
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		return 0;
	}

	public function check_can_donate($prj_id = null, $user_id = null) {

		$site_setting = site_setting();
		$query = $this->db->get_where("transaction", array("project_id" => $prj_id, "user_id" => $user_id, "wallet_payment_status !=" => 2));
		if ($site_setting["maximum_donate_per_project"] <= $query->num_rows())
		{ 
			return 1;
		}
		return 0;
	}

	public function check_can_create($user_id = null) {

		$site_setting = site_setting();
		$query = $this->db->get_where("project", array("user_id" => $user_id, "YEAR(date_added)" => date("Y")));
		if ($site_setting["maximum_project_per_year"] <= $query->num_rows())
		{
			return 1;
		}
		return 0;
	}

	public function get_update_comment($upid = null, $offset) {

		$limit = 5;
		$query = $this->db->query("select * from update_comment where update_id=" . $upid . " order by update_comment_date desc Limit " . $offset . "," . $limit);
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		return 0;
	}

	public function get_one_update_comment($upcid = null) {

		$query = $this->db->get_where("update_comment", array("update_comment_id" => $upcid));
		if ($query->num_rows() > 0)
		{
			return $query->row();
		}
		return 0;
	}

	public function get_update_comment_count($upid = null) {

		$query = $this->db->get_where("update_comment", array("update_id" => $upid));
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}

	public function recent_updates() {

		$query = $this->db->query("select * from updates group by project_id order by date_added desc Limit 0, 3");
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		return 0;
	}

	public function get_all_updates() {

		$query = $this->db->query("select * from updates order by date_added desc ");
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		return 0;
	}

	public function get_all_updates_ajax($offset, $limit) {

		$query = $this->db->query("select * from updates order by date_added desc LIMIT " . $limit . " OFFSET " . $offset);
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		return 0;
	}

	public function get_all_updates_ajax_count() {

		$query = $this->db->query("select * from updates order by date_added desc");
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}

};;


