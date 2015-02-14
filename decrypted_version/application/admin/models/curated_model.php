<?php


class Curated_model extends CI_Model {

	public function Curated_model() {

		parent::__construct();
		return;
	}

	public function get_all_curated_pages() {

		$this->db->select("cu.*,us.*");
		$this->db->from("curated cu");
		$this->db->join("user us", "cu.user_id=us.user_id", "left");
		$this->db->where("cu.curated_active", 1);
		$this->db->order_by("cu.curated_title", "desc");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function check_project_assign_to_curated($project_id) {

		$this->db->select("cu.*,us.*");
		$this->db->from("curated_project curprj");
		$this->db->join("curated cu", "curprj.curated_id=cu.curated_id");
		$this->db->join("user us", "cu.user_id=us.user_id", "left");
		$this->db->where("curprj.project_id", $project_id);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->row();
		}
		return 0;
	}

	public function get_total_curated_project_count($curated_id) {

		$this->db->select("prj.*,us.user_name,us.last_name,us.email,prjcat.project_category_name");
		$this->db->from("curated_project curprj");
		$this->db->join("project prj", "curprj.project_id= prj.project_id");
		$this->db->join("user us", "prj.user_id= us.user_id");
		$this->db->join("project_category prjcat", "prj.category_id= prjcat.project_category_id", "left");
		$this->db->where("curprj.curated_id", $curated_id);
		$this->db->where("prj.project_draft", "1");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}

	public function get_curated_project_result($curated_id, $offset, $limit) {

		$this->db->select("*");
		$this->db->from("curated_project curprj");
		$this->db->join("project prj", "curprj.project_id= prj.project_id");
		$this->db->join("user us", "prj.user_id= us.user_id");
		$this->db->join("project_category prjcat", "prj.category_id= prjcat.project_category_id", "left");
		$this->db->where("curprj.curated_id", $curated_id);
		$this->db->where("prj.project_draft", "1");
		$this->db->order_by("prj.project_id", "desc");
		if ($limit > 0)
		{
			$this->db->limit($limit, $offset);
		}
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		return 0;
	}

	public function get_total_search_curated_project_count($curated_id, $option, $keyword) {

		$keyword = str_replace("\"", "", str_replace(array("'", ",", "%", '' . "\$", "&", "*", "#", "(", ")", ":", ";", ">", "<", "/"), "", $keyword));
		$this->db->select("prj.*,us.user_name,us.last_name,us.email,prjcat.project_category_name");
		$this->db->from("curated_project curprj");
		$this->db->join("project prj", "curprj.project_id= prj.project_id");
		$this->db->join("user us", "prj.user_id= us.user_id");
		$this->db->join("project_category prjcat", "prj.category_id= prjcat.project_category_id", "left");
		$this->db->where("curprj.curated_id", $curated_id);
		$this->db->where("prj.project_draft", "1");
		$this->db->like($option, $keyword);
		if (substr_count($keyword, " ") >= 1)
		{
			$ex = explode(" ", $keyword);
			foreach ($ex as $val)
			{
				$this->db->or_like($option, $val);
				continue;
			}
		}
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}

	public function get_search_curated_project_result($curated_id, $option, $keyword, $offset, $limit) {

		$keyword = str_replace("\"", "", str_replace(array("'", ",", "%", '' . "\$", "&", "*", "#", "(", ")", ":", ";", ">", "<", "/"), "", $keyword));
		$this->db->select("prj.*,us.user_name,us.last_name,us.email,prjcat.project_category_name");
		$this->db->from("curated_project curprj");
		$this->db->join("project prj", "curprj.project_id= prj.project_id");
		$this->db->join("user us", "prj.user_id= us.user_id");
		$this->db->join("project_category prjcat", "prj.category_id= prjcat.project_category_id", "left");
		$this->db->where("curprj.curated_id", $curated_id);
		$this->db->where("prj.project_draft", "1");
		$this->db->like($option, $keyword);
		if (substr_count($keyword, " ") >= 1)
		{
			$ex = explode(" ", $keyword);
			foreach ($ex as $val)
			{
				$this->db->or_like($option, $val);
				continue;
			}
		}
		$this->db->order_by("prj.project_id", "desc");
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		return 0;
	}

	public function get_total_curated_count() {

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

	public function get_curated_result($offset, $limit) {

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

	public function get_total_search_curated_count($option, $keyword) {

		$keyword = str_replace("\"", "", str_replace(array("'", ",", "%", '' . "\$", "&", "*", "#", "(", ")", ":", ";", ">", "<", "/"), "", $keyword));
		$this->db->select("cu.*,us.*");
		$this->db->from("curated cu");
		$this->db->join("user us", "cu.user_id=us.user_id", "left");
		$this->db->like($option, $keyword);
		if (substr_count($keyword, " ") >= 1)
		{
			$ex = explode(" ", $keyword);
			foreach ($ex as $val)
			{
				$this->db->or_like($option, $val);
				continue;
			}
		}
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}

	public function get_search_curated_result($option, $keyword, $offset, $limit) {

		$keyword = str_replace("\"", "", str_replace(array("'", ",", "%", '' . "\$", "&", "*", "#", "(", ")", ":", ";", ">", "<", "/"), "", $keyword));
		$this->db->select("cu.*,us.*");
		$this->db->from("curated cu");
		$this->db->join("user us", "cu.user_id=us.user_id", "left");
		$this->db->like($option, $keyword);
		if (substr_count($keyword, " ") >= 1)
		{
			$ex = explode(" ", $keyword);
			foreach ($ex as $val)
			{
				$this->db->or_like($option, $val);
				continue;
			}
		}
		$this->db->order_by("cu.curated_id", "desc");
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function get_curated_project_count($curated_id) {

		$query = $this->db->query("select * from curated_project where curated_id = '" . $curated_id . "'");
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}

	public function get_image_setting_data() {

		$query = $this->db->get_where("image_setting");
		return $query->row_array();
	}

	public function active_user_list() {

		$query = $this->db->query("select * from user where active='1' order by user_name asc");
		return $query->result();
	}

	public function curated_insert() {

		$CI = &get_instance();
		$base_path = base_path();
		$image_settings = $this->get_image_setting_data();
		$image = "";
		$c_project_ids = $this->input->post("c_project_id");
		if ($_FILES["photo"]["name"] != "")
		{
			$this->load->library("upload");
			$rand = rand(0, 100000);
			global $_FILES;
			$_FILES["userfile"]["name"] = $_FILES["photo"]["name"];
			global $_FILES;
			$_FILES["userfile"]["type"] = $_FILES["photo"]["type"];
			global $_FILES;
			$_FILES["userfile"]["tmp_name"] = $_FILES["photo"]["tmp_name"];
			global $_FILES;
			$_FILES["userfile"]["error"] = $_FILES["photo"]["error"];
			global $_FILES;
			$_FILES["userfile"]["size"] = $_FILES["photo"]["size"];
			$config["file_name"] = $rand . "curated";
			$config["upload_path"] = $base_path . "upload/curated/";
			$config["allowed_types"] = "jpg|jpeg|gif|png|bmp";
			
			$imagename = image_upload($_FILES);

			
			//$this->upload->initialize($config);
		/*	if (!($this->upload->do_upload()))
			{
				$error = $this->upload->display_errors();
			}
			$picture = $this->upload->data();
			$this->load->library("image_lib");
			$this->image_lib->clear();
			$this->image_lib->initialize(array("image_library" => "gd2", "source_image" => $base_path . "upload/curated/" . $picture["file_name"], "new_image" => $base_path . "upload/curated_thumb/" . $picture["file_name"], "maintain_ratio" => FALSE, "quality" => "100%", "width" => $image_settings["p_width"], "height" => $image_settings["p_height"]));
			if (!($this->image_lib->resize()))
			{
				$error = $this->image_lib->display_errors();
			}*/
			//$image = $picture["file_name"];
		}
		$url_curated_title = clean_url($this->input->post("curated_title"));
		$chk_url_exists = $this->db->query("select MAX(url_curated_title) as url_curated_title from curated where url_curated_title like '" . $url_curated_title . "%'");
		if ($chk_url_exists->num_rows() > 0)
		{
			$get_pr = $chk_url_exists->row();
			if ($get_pr->url_curated_title != "")
			{
				$strre = str_replace($url_curated_title, "", $get_pr->url_curated_title);
				if ($strre == "" || $strre == "0")
				{
					$newcnt = "";
				}
				 else 
				{
					$newcnt = (int)$strre + 1;
				}
				$url_curated_title = $url_curated_title . $newcnt;
			}
		}
		$content = $this->input->post("curated_description");
		$data = array("curated_title" => $this->input->post("curated_title"),"curated_link" => $this->input->post("curated_link"), "url_curated_title" => $url_curated_title, "curated_active" => $this->input->post("curated_active"), "curated_description" => $content, "curated_image" => $imagename, "curated_ip" => $_SERVER["REMOTE_ADDR"], "curated_date" => date("Y-m-d H:i:s"));
		if ($this->db->insert("curated", $data))
		{
			$curated_id = mysql_insert_id();
			if ($c_project_ids)
			{
				foreach ($c_project_ids as $id)
				{
					$curated_project = array("curated_id" => $curated_id, "project_id" => $id, "curated_project_date" => date("Y-m-d H:i:s"), "curated_project_approve" => 1);
					$this->db->insert("curated_project", $curated_project);
					continue;
				}
			}
		}
		return;
	}

	public function curated_update() {

		$CI = &get_instance();
		$base_path = base_path();
		$image_settings = $this->get_image_setting_data();
		$image = "";
		if ($_FILES["photo"]["name"] != "")
		{
			$this->load->library("upload");
			$rand = rand(0, 100000);
			global $_FILES;
			$_FILES["userfile"]["name"] = $_FILES["photo"]["name"];
			global $_FILES;
			$_FILES["userfile"]["type"] = $_FILES["photo"]["type"];
			global $_FILES;
			$_FILES["userfile"]["tmp_name"] = $_FILES["photo"]["tmp_name"];
			global $_FILES;
			$_FILES["userfile"]["error"] = $_FILES["photo"]["error"];
			global $_FILES;
			$_FILES["userfile"]["size"] = $_FILES["photo"]["size"];
			$config["file_name"] = $rand . "curated";
			$config["upload_path"] = $base_path . "upload/curated/";
			$config["allowed_types"] = "jpg|jpeg|gif|png|bmp";
			
			$imagename = image_upload($_FILES);
			
		/*	$this->upload->initialize($config);
			if (!($this->upload->do_upload()))
			{
				$error = $this->upload->display_errors();
			}
			$picture = $this->upload->data();
			$this->load->library("image_lib");
			$this->image_lib->clear();
			$this->image_lib->initialize(array("image_library" => "gd2", "source_image" => $base_path . "upload/curated/" . $picture["file_name"], "new_image" => $base_path . "upload/curated_thumb/" . $picture["file_name"], "maintain_ratio" => FALSE, "quality" => "100%", "width" => $image_settings["p_width"], "height" => $image_settings["p_height"]));
			if (!($this->image_lib->resize()))
			{
				$error = $this->image_lib->display_errors();
			}
			$image = $picture["file_name"];*/
			if ($this->input->post("prev_image") != "")
			{
				if (file_exists(base_path() . "../upload/curated_thumb/" . $this->input->post("prev_image")))
				{
					unlink(base_path() . "../upload/curated_thumb/" . $this->input->post("prev_image"));
				}
				if (file_exists(base_path() . "../upload/curated/" . $this->input->post("prev_image")))
				{
					unlink(base_path() . "../upload/curated/" . $this->input->post("prev_image"));
				}
			}
		}
		 else 
		{
			if ($this->input->post("prev_image") != "")
			{
				$imagename = $this->input->post("prev_image");
			}
		}
		$get_orig = $this->db->query("select * from curated where curated_id='" . $this->input->post("curated_id") . "'");
		$orig = $get_orig->row();
		$orig_title = $orig->url_curated_title;
		$posted_url_title = $orig->url_curated_title;
		$posted_title = $this->input->post("curated_title");
		$url_curated_title = clean_url($this->input->post("curated_title"));
		if ($posted_title == "" || $posted_title == "0")
		{
			$url_curated_title = "";
		}
		 else 
		{
			if ($posted_title == $orig_title)
			{
				$url_curated_title = $posted_url_title;
			}
			 else 
			{
				$chk_url_exists = $this->db->query("select MAX(url_curated_title) as url_curated_title from curated where curated_id!='" . $this->input->post("curated_id") . "' and  url_curated_title like '" . $url_curated_title . "%'");
				if ($chk_url_exists->num_rows() > 0)
				{
					$get_pr = $chk_url_exists->row();
					if ($get_pr->url_curated_title != "")
					{
						$strre = str_replace($url_curated_title, "", $get_pr->url_curated_title);
						if ($strre == "" || $strre == "0")
						{
							$newcnt = "";
						}
						 else 
						{
							$newcnt = (int)$strre + 1;
						}
						$url_curated_title = $url_curated_title . $newcnt;
					}
				}
			}
		}
		$content = $this->input->post("curated_description");
		$data = array("curated_title" => $this->input->post("curated_title"),"curated_link" => $this->input->post("curated_link"),  "url_curated_title" => $url_curated_title, "curated_active" => $this->input->post("curated_active"), "curated_description" => $content, "curated_image" => $imagename, "user_id" => $this->input->post("user_id"));
		$this->db->where("curated_id", $this->input->post("curated_id"));
		$this->db->update("curated", $data);
		$c_project_ids = $this->input->post("c_project_id");
		$this->db->delete("curated_project", array("curated_id" => $this->input->post("curated_id")));
		if ($c_project_ids)
		{
			foreach ($c_project_ids as $id)
			{
				$curated_project = array("curated_id" => $this->input->post("curated_id"), "project_id" => $id, "curated_project_date" => date("Y-m-d H:i:s"), "curated_project_approve" => 1);
				$this->db->insert("curated_project", $curated_project);
				continue;
			}
		}
		return;
	}

	public function get_one_curated($id) {

		$query = $this->db->get_where("curated", array("curated_id" => $id));
		return $query->row_array();
	}

	public function get_all_project() {

		$this->db->select("*");
		$this->db->from("project prj");
		$this->db->join("user us", "prj.user_id= us.user_id");
		$this->db->join("project_category prjcat", "prj.category_id= prjcat.project_category_id", "left");
		$this->db->where("prj.active", "1");
		$this->db->order_by("prj.project_id", "desc");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

};;


