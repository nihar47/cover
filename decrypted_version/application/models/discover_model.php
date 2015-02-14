<?php


class Discover_model extends ROCKERS_Model {

	public function Discover_model() {

		parent::__construct();
		return;
	}
	
	/*function get_parent_category($parent_id = 0)
	{	
		$this->db->where(array('active'=>1,'project_category_id'=>$parent_id));
		$query=$this->db->get('project_category');
		if($query->num_rows()>0){
		return $query->result();
		}else{
			return "";
		}
	}*/
	public function get_parent($parent_id){
		//echo "select * from project_category where project_category_id = ".$parent_id; die;
		$query = $this->db->query("select * from project_category where project_category_id = ".$parent_id);
		if ($query->num_rows() > 0)
		{
			
			 return $query->result(); 
		}
		return 0;
		}
	public function search_project_count($match) {

		if ($match != "none")
		{
			$query = "select * from project p, user u where p.user_id=u.user_id and p.user_id!='' and p.user_id<>0 and p.active=1 and p.end_date>='" . date("Y-m-d H:i:s") . "' and p.status not in (2,3,5) and (p.project_title like '%" . $match . "%' or p.description like '%" . $match . "%') order by project_id desc";
		}
		 else 
		{
			$query = "select * from project p, user u where p.user_id=u.user_id and p.user_id!='' and p.user_id<>0 and p.active=1 and p.end_date>='" . date("Y-m-d H:i:s") . "' and p.status not in (2,3,5) order by project_id desc";
		}
		$s_result = $this->db->query($query);
		return $s_result->num_rows();
	}

	public function search_project($offset, $limit, $match) {

		if ($match != "none")
		{
			$query2 = "select p.*,u.user_name,u.image as uimg,u.country from project p, user u where p.user_id=u.user_id and p.user_id!='' and p.user_id<>0  and p.active=1 and p.end_date>='" . date("Y-m-d H:i:s") . "' and p.status not in (2,3,5) and  (p.project_title like '%" . $match . "%' or p.description like '%" . $match . "%') order by project_id desc LIMIT " . $limit . " OFFSET " . $offset . " ";
		}
		 else 
		{
			$query2 = "select p.*,u.user_name,u.image as uimg,u.country from project p, user u where p.user_id=u.user_id and p.user_id!='' and p.user_id<>0 and p.active=1 and p.end_date>='" . date("Y-m-d H:i:s") . "' and p.status not in (2,3,5) order by project_id desc LIMIT " . $limit . " OFFSET " . $offset . " ";
		}
		$s_result2 = $this->db->query($query2);
		if ($s_result2->num_rows() > 0)
		{
			return $s_result2->result();
		}
		return 0;
	}

	public function get_total_category_project($id) {

		$sql = "select * from project where active=1 and end_date>='" . date("Y-m-d") . "' and status not in(2,3,5) and category_id='" . $id . "' order by project_id desc";
		$s_result = $this->db->query($sql);
		return $s_result->num_rows();
	}

	public function get_category_project($id, $offset, $limit) {

		$sql = "select * from project where active=1 and end_date>='" . date("Y-m-d") . "' and status not in(2,3,5) and category_id='" . $id . "' order by project_id desc LIMIT " . $limit . " OFFSET " . $offset . " ";
	/*$sql  = "SELECT * FROM project WHERE active=1 and end_date>='" . date("Y-m-d") . "' and status not in(2,3,5) and category_id IN (SELECT project_category_id FROM project_category WHERE  parent_project_category_id IN (SELECT `project_category_id` FROM `project_category` WHERE `parent_project_category_id` =".$id .")) order by project_id desc LIMIT " . $limit . " OFFSET " . $offset . " ";*/
		$s_result2 = $this->db->query($sql);
		if ($s_result2->num_rows() > 0)
		{
			return $s_result2->result();
		}
		return 0;
	}
	
	public function get_sub_category_project($id, $offset, $limit) {
		$sql  = "SELECT * FROM project WHERE active=1 and end_date>='" . date("Y-m-d") . "' and status not in(2,3,5) and category_id IN (SELECT `project_category_id` FROM `project_category` WHERE `parent_project_category_id` =".$id .") order by project_id desc LIMIT " . $limit . " OFFSET " . $offset . " ";
		$s_result2 = $this->db->query($sql);
		if ($s_result2->num_rows() > 0)
		{
			return $s_result2->result();
		}
		return 0;
	}

	public function get_all_category_project($id, $offset, $limit) {

	/*	$sql = "select * from project where active=1 and end_date>='" . date("Y-m-d") . "' and status not in(2,3,5) and category_id='" . $id . "' order by project_id desc LIMIT " . $limit . " OFFSET " . $offset . " ";*/
	$sql  = "SELECT * FROM project WHERE active=1 and end_date>='" . date("Y-m-d") . "' and status not in(2,3,5) and category_id IN (SELECT project_category_id FROM project_category WHERE  parent_project_category_id IN (SELECT `project_category_id` FROM `project_category` WHERE `parent_project_category_id` =".$id .")) order by project_id desc LIMIT " . $limit . " OFFSET " . $offset . " ";
		$s_result2 = $this->db->query($sql);
		if ($s_result2->num_rows() > 0)
		{
			return $s_result2->result();
		}
		return 0;
	}


	public function get_categorywise_popular_project($id, $offset, $limit) {

		$sites = $this->db->query("select * from site_setting");
		$site_setting = $sites->row();
		$popular = $site_setting->popular;
		if ($popular == "")
		{
			$popular = "60";
		}
		$query = $this->db->query("select project.*,user.user_name,user.image as uimg,user.country,user.state from project, user where user.user_id=project.user_id  and project.amount_get >= (project.amount * " . $popular . " )/100 and project.status not in(2,3,5) and project.category_id='" . $id . "' order by project.amount_get desc  LIMIT " . $limit . " OFFSET " . $offset);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function ending_soon_total() {

		$sites = $this->db->query("select * from site_setting");
		$site_setting = $sites->row();
		$ending_soon = $site_setting->ending_soon;
		if ($ending_soon == "")
		{
			$ending_soon = "7";
		}
		$query = $this->db->query("select project.*,user.user_name,user.image as uimg,user.country,user.state from project, user where user.user_id=project.user_id and project.active=1 and  curdate() between date_sub(end_date,interval " . $ending_soon . " day) and end_date order by project.end_date");
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}

	public function ending_soon($offset, $limit) {

		$sites = $this->db->query("select * from site_setting");
		$site_setting = $sites->row();
		$ending_soon = $site_setting->ending_soon;
		if ($ending_soon == "")
		{
			$ending_soon = "7";
		}
		$query = $this->db->query("select project.*,user.user_name,user.country,user.state,user.city from project, user where user.user_id=project.user_id and project.active=1 and  curdate() between date_sub(end_date,interval " . $ending_soon . " day) and end_date  order by project.end_date LIMIT " . $limit . " OFFSET " . $offset);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}
	
	public function user_ending_soon($uid) {

		$sites = $this->db->query("select * from site_setting");
		$site_setting = $sites->row();
		$ending_soon = $site_setting->ending_soon;
		if ($ending_soon == "")
		{
			$ending_soon = "7";
		}
		$query = $this->db->query("select project.*,user.user_name,user.country,user.state,user.city from project, user where user.user_id=project.user_id and project.active=1 and user.user_id = ".$uid." and  curdate() between date_sub(end_date,interval " . $ending_soon . " day) and end_date  order by project.end_date");
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}else{
		return 0; }
	}

	public function recentlylaunched($offset, $limit) {

		$query = $this->db->query("select project.*,user.user_name,user.country,user.state,user.city from project, user where user.user_id=project.user_id and project.active=1 order by project.end_date desc LIMIT " . $limit . " OFFSET " . $offset);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}
	
	public function featured($offset, $limit) {

		$query = $this->db->query("select project.*,user.user_name,user.country,user.state,user.city from project, user where user.user_id=project.user_id and project.active=1 and project.is_featured = 1 order by project.end_date desc LIMIT " . $limit . " OFFSET " . $offset);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function popular_total() {

		$sites = $this->db->query("select * from site_setting");
		$site_setting = $sites->row();
		$popular = $site_setting->popular;
		if ($popular == "")
		{
			$popular = "60";
		}
		$query = $this->db->query("select project.*,user.user_name,user.image as uimg,user.country,user.state from project, user where user.user_id=project.user_id  and project.amount_get >= (project.amount * " . $popular . " )/100 and project.active=1 order by project.amount_get desc");
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}

	public function popular($offset, $limit) {

		$sites = $this->db->query("select * from site_setting");
		$site_setting = $sites->row();
		$popular = $site_setting->popular;
		if ($popular == "")
		{
			$popular = "60";
		}
		$query = $this->db->query("select project.*,user.user_name,user.image as uimg,user.country,user.state from project, user where user.user_id=project.user_id  and project.amount_get >= (project.amount * " . $popular . " )/100 and project.active=1 order by project.amount_get desc  LIMIT " . $limit . " OFFSET " . $offset);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function small_projects_total() {

		$sites = $this->db->query("select * from site_setting");
		$site_setting = $sites->row();
		$small_project = $site_setting->small_project;
		if ($small_project == "")
		{
			$small_project = "60";
		}
		$query = $this->db->query("select project.*,user.user_name,user.image as uimg,user.country,user.state from project, user where user.user_id=project.user_id  and project.amount <= " . $small_project . " and project.active=1 order by project.amount desc");
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}

	public function small_projects($offset, $limit) {

		$sites = $this->db->query("select * from site_setting");
		$site_setting = $sites->row();
		$small_project = $site_setting->small_project;
		if ($small_project == "")
		{
			$small_project = "60";
		}
		$query = $this->db->query("select project.*,user.user_name,user.image as uimg,user.country,user.state from project, user where user.user_id=project.user_id  and project.amount <= " . $small_project . " and project.active=1 order by project.amount asc  LIMIT " . $limit . " OFFSET " . $offset);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function successful_total() {

		$sites = $this->db->query("select * from site_setting");
		$site_setting = $sites->row();
		$successful = $site_setting->successful;
		if ($successful == "")
		{
			$successful = "100";
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
			$successful = "100";
		}
		$query = $this->db->query("select project.*,user.user_name,user.image as uimg,user.country,user.state from project, user where user.user_id=project.user_id  and project.amount_get >= (project.amount * " . $successful . " )/100 and project.amount<>'' and project_draft=1 order by project.amount_get  LIMIT " . $limit . " OFFSET " . $offset);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function staffpicks($offset, $limit) {

		$query = $this->db->query("select project.*,user.user_name,user.image as uimg,user.country,user.state from project, user where user.user_id=project.user_id and project.active = 1 and project.project_draft=1 and project.staff_pickup=1 order by project.date_added desc  LIMIT " . $limit . " OFFSET " . $offset);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function week_popular($offset, $limit) {

		$sites = $this->db->query("select * from site_setting");
		$site_setting = $sites->row();
		$popular = $site_setting->popular;
		$str1 = explode("/", first_and_last_date_of_week());
		$week_first_date = $str1[0];
		$week_last_date = $str1[1];
		if ($popular == "")
		{
			$popular = "60";
		}
		$query = $this->db->query("select project.*,user.user_name,user.image as uimg,user.country,user.state from project, user where user.user_id=project.user_id  and project.amount_get >= (project.amount * " . $popular . " )/100 and project.active=1 and DATE(project.date_added) >='" . $week_first_date . "' and DATE(project.date_added) <= '" . $week_last_date . "' order by project.amount_get desc  LIMIT " . $limit . " OFFSET " . $offset);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function get_total_city_project($id) {

		$sql = "select * from project where active=1 and end_date>='" . date("Y-m-d") . "' and status not in(2,3,5) and project_city='" . $id . "' order by project_id desc";
		$s_result = $this->db->query($sql);
		return $s_result->num_rows();
	}

	public function get_city_project($id, $offset, $limit) {

		$sql = "select * from project where active=1 and end_date>='" . date("Y-m-d") . "' and status not in(2,3,5) and project_address like '%" . trim($id) . "%' order by project_id desc LIMIT " . $limit . " OFFSET " . $offset . " ";
		$s_result2 = $this->db->query($sql);
		if ($s_result2->num_rows() > 0)
		{
			return $s_result2->result();
		}
		return 0;
	}

	public function staffpicks_count() {

		$query = $this->db->query("select project.*,user.user_name,user.image as uimg,user.country,user.state from project, user where user.user_id=project.user_id  and project_draft=1 and staff_pickup=1 order by project.date_added desc ");
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}

	public function recentlylaunched_count() {

		$query = $this->db->query("select project.*,user.user_name,user.country,user.state,user.city from project, user where user.user_id=project.user_id and project.active=1 order by project.end_date desc ");
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}
	
	public function featured_count() {

		$query = $this->db->query("select project.*,user.user_name,user.country,user.state,user.city from project, user where user.user_id=project.user_id and project.active=1 and project.is_featured=1 order by project.end_date desc ");
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}

};;


