<?php


class Startproject_model extends ROCKERS_Model {

	public function Startproject_model() {

		parent::__construct();
		return;
	}
	
	public function get_guidelines(){
			$query = $this->db->query("select * from guidelines");
			if ($query->num_rows() > 0)
			{
				return $query->result();
			}
			return 0;
		}
	public function step1_ajaxsave($data_project = array(), $project_id) {

		if (is_numeric($project_id))
		{
			$this->db->where("project_id", $project_id);
			$this->db->update("project", $data_project);
			return true;
		}
		return false;
	}

	public function create_draft1() {

		$video_url = "";
		$video_custom = "";
		$CI = &get_instance();
		$base_path = $CI->config->slash_item("base_path");
		$url_project_title = seourl($this->input->post("project_title"));
		$chk_url_exists = $this->db->query("select MAX(url_project_title) as url_project_title from project where url_project_title like '" . $url_project_title . "%'");
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
		$query = $this->db->query("select * from site_setting");
		$rs = $query->row_array();
		$total_days = $rs["project_min_days"];
		$data_project = array("user_id" => $this->session->userdata("user_id"), "category_id" => "", "project_title" => "Untitled", "url_project_title" => "", "p_google_code" => "", "end_date" => "", "date_added" => date("Y-m-d H:i:s"), "host_ip" => $_SERVER["REMOTE_ADDR"], "status" => 1, "active" => 0, "total_days" => "", "payment_type" => "", "project_draft" => 0);
		if (is_numeric($this->input->post("id")))
		{
			$this->db->where("project_id", $this->input->post("id"));
			$this->db->update("project", $data_project);
			$project_id = $this->input->post("id");
		}
		 else 
		{
			$this->db->insert("project", $data_project);
			$project_id = mysql_insert_id();
		}
		$data_proj_ses = array("project_id" => $project_id, "project_title" => $this->input->post("project_title"), "url_project_title" => $url_project_title);
		$this->session->set_userdata($data_proj_ses);
		return $project_id;
	}

	public function create_draft_step_basic() {

		$video_url = "";
		$video_custom = "";
		$CI = &get_instance();
		$base_path = $CI->config->slash_item("base_path");
		$url_project_title = seourl($this->input->post("project_title_text"));
		$chk_url_exists = $this->db->query("select MAX(url_project_title) as url_project_title from project where url_project_title like '" . $url_project_title . "%'");
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
		if ($this->input->post("duration") == "totalday")
		{
			$total_days = $this->input->post("endday");
		}
		if ($this->input->post("duration") == "totaldate")
		{
			$your_date = $this->input->post("end_date");
			$total_days_left = strtotime($your_date) - strtotime(date("Y-m-d")) / 60 * 60 * 24;
			$total_days = floor($total_days_left);
		}
		$data_project = array("user_id" => get_authenticateuserid(), "category_id" => $this->input->post("project_category"), "project_title" => $this->input->post("project_title_text"), "url_project_title" => $url_project_title, "project_summary" => $this->input->post("project_summary"), "p_google_code" => $this->input->post("p_google_code"), "amount" => $this->input->post("amount"), "end_date" => date("Y-m-d H:i:s", strtotime("+" . $total_days . " days")), "date_added" => date("Y-m-d H:i:s"), "host_ip" => $_SERVER["REMOTE_ADDR"], "status" => 1, "active" => 0, "total_days" => $total_days, "payment_type" => 0, "project_draft" => 0);
		if (is_numeric($this->input->post("id")))
		{
			$this->db->where("project_id", $this->input->post("id"));
			$this->db->update("project", $data_project);
			$project_id = $this->input->post("id");
		}
		 else 
		{
			$this->db->insert("project", $data_project);
			$project_id = mysql_insert_id();
		}
		$data_proj_ses = array("project_id" => $project_id, "project_title" => $this->input->post("project_title"), "url_project_title" => $url_project_title);
		$this->session->set_userdata($data_proj_ses);
		return $project_id;
	}

	public function create_draft2() {

		$video_url = "";
		$video_custom = "";
		$CI = &get_instance();
		$base_path = $CI->config->slash_item("base_path");
		$project_id = $this->input->post("id");
		$perk_delivery_date = $this->input->post("est_date");
		$perk_description = $this->input->post("perk_description");
		$perk_amount = $this->input->post("perk_amount");
		$perk_total = $this->input->post("perk_total");
		$perk_id = $this->input->post("perk_id");
		$i = 0;
		while (count($perk_delivery_date) > $i)
		{
			if (($perk_delivery_date[$i] != "") && ($perk_description[$i] != "") && ($perk_amount[$i] != "") && ($perk_id[$i] != ""))
			{
				$test = date("Y-m-d", strtotime($perk_delivery_date[$i]));
				$data_perk = array("project_id" => $project_id, "perk_delivery_date" => $test, "perk_description" => $perk_description[$i], "perk_amount" => $perk_amount[$i], "perk_total" => $perk_total[$i]);
				$this->db->where("perk_id", $perk_id[$i]);
				$this->db->update("perk", $data_perk);
			}
			 else 
			{
				$test = date("Y-m-d", strtotime($perk_delivery_date[$i]));
				$data_perk = array("project_id" => $project_id, "perk_delivery_date" => $test, "perk_description" => $perk_description[$i], "perk_amount" => $perk_amount[$i], "perk_total" => $perk_total[$i]);
				$this->db->insert("perk", $data_perk);
			}
			$i++;
			continue;
		}
		return $project_id;
	}

	public function create_draft3() {

		$video_url = "";
		$video_custom = "";
		$CI = &get_instance();
		$base_path = $CI->config->slash_item("base_path");
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
			}
			$video_custom = $imganame;
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
		$desc_replace = str_replace("(Preset text - Changes can be made by clicking on the text.)", "", $this->input->post("description"));
		$data_project = array("user_id" => get_authenticateuserid(), "description" => $desc_replace, "video_type" => $this->input->post("video_set"), "video" => $video_url, "custom_video" => $video_custom, "video_image" => $video_url_img, "project_draft" => 0);
		if (is_numeric($this->input->post("id")))
		{
			$this->db->where("project_id", $this->input->post("id"));
			$this->db->update("project", $data_project);
			$project_id = $this->input->post("id");
		}
		 else 
		{
			$this->db->insert("project", $data_project);
			$project_id = mysql_insert_id();
		}
		return $project_id;
	}

	public function create_draft4() {

		$video_url = "";
		$video_custom = "";
		$video_url_img = "";
		$CI = &get_instance();
		$base_path = $CI->config->slash_item("base_path");
		$rs = site_setting();
		$image_settings = get_image_setting_data();
		if ($_FILES["file_up"]["name"] != "")
		{
			$this->load->library("upload");
			$rand = rand(0, 100000);
			$rand = rand(0, 100000);
			if ($_FILES["file_up"]["name"] != "")
			{
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
				$new_img = image_photoid_upload($_FILES);
				$main_image = $new_img;
				$data_user1 = array("user_photo_id" => $main_image, "birth_date" => date("Y-m-d", strtotime($this->input->post("birth_date12"))), "user_mobile" => $this->input->post("user_mobile"));
				$this->db->where("user_id", get_authenticateuserid());
				$this->db->update("user", $data_user1);
			}
		}
		$data_user = array("birth_date" => date("Y-m-d", strtotime($this->input->post("birth_date12"))), "user_mobile" => $this->input->post("user_mobile"));
		$this->db->where("user_id", get_authenticateuserid());
		$this->db->update("user", $data_user);
		$project_city = "";
		$project_state = "";
		$project_country = "";
		$address = explode(",", $this->input->post("project_address"));
		$cnt = count($address);
		$fetch = $cnt - $rs["address_limit"];
		if (count($address) <= $fetch || $fetch <= 0)
		{
			if (isset($address[$cnt - 3]))
			{
				$project_city = $address[$cnt - 3];
			}
			if (isset($address[$cnt - 2]))
			{
				$project_state = $address[$cnt - 2];
			}
			if (isset($address[$cnt - 1]))
			{
				$project_country = $address[$cnt - 1];
			}
		}
		 else 
		{
			$project_city = trim($address[$fetch]);
			$project_state = trim($address[$fetch + 1]);
			$project_country = trim($address[$fetch + 2]);
		}
		$data_project = array("user_id" => $this->session->userdata("user_id"), "project_state" => $project_state, "project_country" => $project_country, "project_city" => $project_city, "project_address" => $this->input->post("project_address"), "project_draft" => 0);
		if (is_numeric($this->input->post("id")))
		{
			$this->db->where("project_id", $this->input->post("id"));
			$this->db->update("project", $data_project);
			$project_id = $this->input->post("id");
		}
		 else 
		{
			$this->db->insert("project", $data_project);
			$project_id = mysql_insert_id();
		}
		return $project_id;
	}

	public function create_draft5() {

		$video_url = "";
		$video_custom = "";
		$CI = &get_instance();
		$base_path = $CI->config->slash_item("base_path");
		$project_id = $this->input->post("id");
		$data_project = array("user_id" => $this->session->userdata("user_id"), "project_draft" => 1);
		if (is_numeric($this->input->post("id")))
		{
			$this->db->where("project_id", $this->input->post("id"));
			$this->db->update("project", $data_project);
			$project_id = $this->input->post("id");
		}
		 else 
		{
			$this->db->insert("project", $data_project);
			$project_id = mysql_insert_id();
		}
		return $project_id;
	}
	
	public function create_draft6() {

		$video_url = "";
		$video_custom = "";
		$CI = &get_instance();
		$base_path = $CI->config->slash_item("base_path");
		$project_id = $this->input->post("id");
		$data_project = array("user_id" => $this->session->userdata("user_id"), "project_draft" => 1);
		if (is_numeric($this->input->post("id")))
		{
			$this->db->where("project_id", $this->input->post("id"));
			$this->db->update("project", $data_project);
			$project_id = $this->input->post("id");
		}
		 else 
		{
			$this->db->insert("project", $data_project);
			$project_id = mysql_insert_id();
		}
		return $project_id;
	}

	public function get_project_getcategory($project_category_id = "") {

		$query = $this->db->get_where("project_category", array("project_category_id" => $project_category_id));
		$result = $query->row();
		return $result->project_category_name;
	}

	public function checkuser_firstname($user_name = "") {

		$query = $this->db->get_where("user", array("user_name" => $user_name));
		if ($query->num_rows() > 0)
		{
			return 1;
		}
		return 0;
	}

	public function checkuser_lastname($lastname = "") {

		$query = $this->db->get_where("user", array("last_name" => $lastname));
		if ($query->num_rows() > 0)
		{
			return 1;
		}
		return 0;
	}

	public function list_draft_project($user_id = "", $limit = "", $offset = "") {

		$query = $this->db->query("select * from project where project_draft='0' and user_id=" . $user_id . " order by date_added desc  LIMIT " . $limit . " OFFSET " . $offset . " ");
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function delete_project($id) {

		$CI = &get_instance();
		$base_path = $CI->config->slash_item("base_path");
		$chk_updates = $this->db->query("select * from updates where project_id='" . $id . "'");
		if ($chk_updates->num_rows() > 0)
		{
			$updates = $chk_updates->result();
			foreach ($updates as $up)
			{
				if (is_file($base_path . "upload/thumb/" . $up->image))
				{
					if ($up->image != "no_img.jpg")
					{
						$link1 = $base_path . "upload/thumb/" . $up->image;
						unlink($link1);
					}
				}
				if (is_file($base_path . "upload/orig/" . $up->image))
				{
					if ($up->image != "no_img.jpg")
					{
						$link2 = $base_path . "upload/orig/" . $up->image;
						unlink($link2);
					}
				}
				$this->db->query("delete from updates where update_id='" . $up->update_id . "'");
				continue;
			}
		}
		$chk_gallery = $this->db->query("select * from project_gallery where project_id='" . $id . "'");
		if ($chk_gallery->num_rows() > 0)
		{
			$gallery = $chk_gallery->result();
			foreach ($gallery as $gal)
			{
				if (is_file($base_path . "upload/thumb/" . $gal->project_image))
				{
					if ($gal->project_image != "no_img.jpg")
					{
						$link1 = $base_path . "upload/thumb/" . $gal->project_image;
						unlink($link1);
					}
				}
				if (is_file($base_path . "upload/orig/" . $gal->project_image))
				{
					if ($gal->project_image != "no_img.jpg")
					{
						$link2 = $base_path . "upload/orig/" . $gal->project_image;
						unlink($link2);
					}
				}
				$this->db->query("delete from project_gallery where project_gallery_id='" . $gal->project_gallery_id . "'");
				continue;
			}
		}
		$chk_perk = $this->db->query("select * from perk where project_id='" . $id . "'");
		if ($chk_perk->num_rows() > 0)
		{
			$perk = $chk_perk->result();
			foreach ($perk as $prk)
			{
				$this->db->query("delete from perk where perk_id='" . $prk->perk_id . "'");
				continue;
			}
		}
		$chk_trans = $this->db->query("select * from transaction where project_id='" . $id . "'");
		if ($chk_trans->num_rows() > 0)
		{
			$trans = $chk_trans->result();
			foreach ($trans as $trn)
			{
				$this->db->query("delete from transaction where transaction_id='" . $trn->transaction_id . "'");
				continue;
			}
		}
		$chk_comment = $this->db->query("select * from comment where project_id='" . $id . "'");
		if ($chk_comment->num_rows() > 0)
		{
			$comment = $chk_comment->result();
			foreach ($comment as $cmt)
			{
				if (is_file($base_path . "upload/thumb/" . $cmt->photo))
				{
					if ($cmt->photo != "no_man.gif")
					{
						$link1 = $base_path . "upload/thumb/" . $cmt->photo;
						unlink($link1);
					}
				}
				if (is_file($base_path . "upload/orig/" . $cmt->photo))
				{
					if ($cmt->photo != "no_man.gif")
					{
						$link2 = $base_path . "upload/orig/" . $cmt->photo;
						unlink($link2);
					}
				}
				$this->db->query("delete from comment where comment_id='" . $cmt->comment_id . "'");
				continue;
			}
		}
		$chk_project = $this->db->query("select * from project where project_id='" . $id . "'");
		if ($chk_project->num_rows() > 0)
		{
			$project = $chk_project->row();
			if (is_file($base_path . "upload/thumb/" . $project->image))
			{
				if ($project->image != "no_img.jpg")
				{
					$link1 = $base_path . "upload/thumb/" . $project->image;
					unlink($link1);
				}
			}
			if (is_file($base_path . "upload/orig/" . $project->image))
			{
				if ($project->image != "no_img.jpg")
				{
					$link2 = $base_path . "upload/orig/" . $project->image;
					unlink($link2);
				}
			}
			if (is_file($base_path . "upload/video/" . $project->custom_video))
			{
				if ($project->custom_video != "")
				{
					$link2 = $base_path . "upload/video/" . $project->custom_video;
					unlink($link2);
				}
			}
			$this->db->query("delete from project where project_id='" . $id . "'");
		}
		return;
	}

};;


