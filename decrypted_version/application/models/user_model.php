<?php


class User_model extends ROCKERS_Model {

	public function User_model() {

		parent::__construct();
		return;
	}

	public function activities($user_id, $limit, $offset) {

		$query = $this->db->query("select * from user_login where user_id=" . $user_id . " order by login_date_time desc limit 1");
		$user_login_detail = $query->row_array();
		$query = $this->db->query("select * from (

	 

	 (select us.user_name as activity_name,'signup' as act, us.date_added as activity_date,us.user_id as key_id, us.user_name as user_url_name, us.user_name as user_name, us.image as user_image, 'custom_msg' as custom_msg, 'custom_msg2' as custom_msg2  from user us where us.user_id='" . $user_id . "') 

	 

		union

		(select flus.user_name as activity_name,'follower' as act, flw.user_follow_date as activity_date,flus.user_id as key_id, flus.user_name as user_url_name, flus.user_name as user_name, flus.image as user_image,'custom_msg' as custom_msg,'custom_msg2' as custom_msg2 from user flus , user_follow flw where flw.follow_by_user_id = flus.user_id and flw.follow_user_id  = " . $user_id . ")

		

		union

		(select flus.user_name as activity_name,'user_own_comment' as act, cmt.date_added as activity_date,flus.user_id as key_id, flus.user_name as user_url_name, flus.user_name as user_name, flus.image as user_image,cmt.project_id as custom_msg,cmt.comments as custom_msg2 from user flus ,comment cmt where cmt.user_id = flus.user_id and flus.user_id = " . $user_id . " and cmt.status = '1')

		

		union

		(select flus.user_name as activity_name,'followercomment' as act, cmt.date_added as activity_date,flus.user_id as key_id, flus.user_name as user_url_name, flus.user_name as user_name, flus.image as user_image,cmt.comments as custom_msg,cmt.project_id as custom_msg2 from user flus ,user_follow flw,comment cmt where flw.follow_by_user_id = flus.user_id and cmt.user_id = flw.follow_by_user_id and flw.follow_user_id  = " . $user_id . " and cmt.status = '1')

		

		union

		(select flus.user_name as activity_name,'following' as act, flw.user_follow_date as activity_date,flus.user_id as key_id, flus.user_name as user_url_name, flus.user_name as user_name, flus.image as user_image,'custom_msg' as custom_msg,'custom_msg2' as custom_msg2 from user flus ,user_follow flw where flw.follow_user_id = flus.user_id and flw.follow_by_user_id = " . $user_id . " )

		

		union

		(select flus.user_name as activity_name,'followuser_follow_project' as act, pfl.project_follow_date as activity_date,flus.user_id as key_id, flus.user_name as user_url_name, flus.user_name as user_name, flus.image as user_image,pfl.project_id as custom_msg,'custom_msg2' as custom_msg2 from user flus ,user_follow flw ,project_follower pfl where pfl.project_follow_user_id = flus.user_id and flw.follow_by_user_id = pfl.project_follow_user_id and flw.follow_user_id = " . $user_id . ")

		union

		(select flus.user_name as activity_name,'own_follow_project' as act, pfl.project_follow_date as activity_date,flus.user_id as key_id, flus.user_name as user_url_name, flus.user_name as user_name, flus.image as user_image,pfl.project_id as custom_msg,pfl.project_follow_user_id as custom_msg2 from user flus ,project_follower pfl where pfl.project_follow_user_id = flus.user_id and flus.user_id = " . $user_id . ")

		

		union

		(select flus.user_name as activity_name,'user_own_project_update' as act, updt.date_added as activity_date,flus.user_id as key_id, flus.user_name as user_url_name, flus.user_name as user_name, flus.image as user_image,updt.project_id as custom_msg,updt.update_title as custom_msg2 from user flus ,project prj, updates updt where updt.project_id = prj.project_id and prj.user_id = flus.user_id and prj.active=1 and flus.user_id = " . $user_id . ")	

		

		union

		(select flus.user_name as activity_name,'project_update_follower_project' as act, updt.date_added as activity_date,flus.user_id as key_id, flus.user_name as user_url_name,flus.user_name as user_name, flus.image as user_image,updt.project_id as custom_msg,updt.update_title as custom_msg2 from user flus , user_follow flw ,updates updt,project prj where flw.follow_by_user_id = flus.user_id and updt.project_id = prj.project_id and prj.active=1 and prj.user_id = flus.user_id and flw.follow_user_id = " . $user_id . ")	

		

		union

		(select flus.user_name as activity_name,'user_own_donation' as act, trc.transaction_date_time as activity_date,flus.user_id as key_id, flus.user_name as user_url_name, flus.user_name as user_name, flus.image as user_image,trc.project_id as custom_msg,trc.amount as custom_msg2 from user flus ,transaction trc where trc.user_id = flus.user_id and flus.user_id = " . $user_id . ")

		

		union

		(select flus.user_name as activity_name,'project_follower_donation' as act, trc.transaction_date_time as activity_date,flus.user_id as key_id, flus.user_name as user_url_name,flus.user_name as user_name, flus.image as user_image,trc.project_id as custom_msg,trc.amount as custom_msg2 from user flus , user_follow flw ,transaction trc where flw.follow_by_user_id = flus.user_id and trc.user_id = flus.user_id and flw.follow_user_id = " . $user_id . ")	

		

		union

		(select flus.user_name as activity_name,'user_own_gallery' as act, glr.date_added as activity_date,flus.user_id as key_id, flus.user_name as user_url_name, flus.user_name as user_name, flus.image as user_image,glr.project_id as custom_msg,'custom_msg2' as custom_msg2 from user flus ,project_gallery glr,project prj where glr.project_id = prj.project_id and prj.active=1 and prj.user_id = flus.user_id and flus.user_id = " . $user_id . ")

		

		union

		(select flus.user_name as activity_name,'followeruser_gallery' as act, glr.date_added as activity_date,flus.user_id as key_id, flus.user_name as user_url_name,flus.user_name as user_name, flus.image as user_image,glr.project_id as custom_msg,'custom_msg2' as custom_msg2 from user flus , user_follow flw ,project_gallery glr,project prj where glr.project_id = prj.project_id and prj.active=1 and prj.user_id = flus.user_id and flw.follow_by_user_id = flus.user_id and flw.follow_user_id = " . $user_id . ")	

		

		union

		(select flus.user_name as activity_name,'my_post_project' as act, prj.date_added as activity_date,flus.user_id as key_id, flus.user_name as user_url_name, flus.user_name as user_name, flus.image as user_image,prj.project_id as custom_msg,prj.project_summary as custom_msg2 from user flus ,project prj where prj.user_id = flus.user_id and prj.active=1 and flus.user_id = " . $user_id . " and prj.active ='1')

		

		union

		(select flus.user_name as activity_name,'followeruser_post_project' as act, prj.date_added as activity_date,flus.user_id as key_id, flus.user_name as user_url_name,flus.user_name as user_name, flus.image as user_image,prj.project_id as custom_msg,'custom_msg2' as custom_msg2 from user flus , user_follow flw ,project prj where prj.user_id = flus.user_id and prj.active=1 and flw.follow_by_user_id = flus.user_id and flw.follow_user_id = " . $user_id . ")

		

		union

		(select flus.user_name as activity_name,'following_follow_project' as act, pfl.project_follow_date as activity_date,flus.user_id as key_id, flus.user_name as user_url_name, flus.user_name as user_name, flus.image as user_image,pfl.project_id as custom_msg,'custom_msg2' as custom_msg2 from user flus ,user_follow flw,project_follower pfl where flw.follow_user_id = flus.user_id and pfl.project_follow_user_id = flw.follow_user_id and flw.follow_by_user_id = " . $user_id . ")

		

		union

		(select flus.user_name as activity_name,'following_gallery' as act, glr.date_added as activity_date,flus.user_id as key_id, flus.user_name as user_url_name, flus.user_name as user_name, flus.image as user_image,glr.project_id as custom_msg,'custom_msg2' as custom_msg2 from user flus ,user_follow flw,project_gallery glr where flw.follow_user_id = flus.user_id and flw.follow_by_user_id = " . $user_id . ")

		

		union

		(select flus.user_name as activity_name,'following_updates' as act, flw.user_follow_date as activity_date,flus.user_id as key_id, flus.user_name as user_url_name, flus.user_name as user_name, flus.image as user_image,'custom_msg' as custom_msg,updt.update_title  as custom_msg2 from user flus ,user_follow flw,project prj,updates updt where prj.project_id=updt.project_id and prj.active=1 and  flw.follow_user_id = flus.user_id and flw.follow_by_user_id = " . $user_id . " and flus.user_id= " . $user_id . " group by updt.update_id)

		

		union

		(select flus.user_name as activity_name,'following_comment' as act, cmt.date_added as activity_date,flus.user_id as key_id, flus.user_name as user_url_name, flus.user_name as user_name, flus.image as user_image,cmt.project_id as custom_msg,cmt.comments as custom_msg2 from user flus ,user_follow flw,comment cmt where flw.follow_user_id = flus.user_id and cmt.user_id = flw.follow_user_id and flw.follow_by_user_id = " . $user_id . ")

		

		union

		(select flus.user_name as activity_name,'following_donation' as act, trc.transaction_date_time as activity_date,flus.user_id as key_id, flus.user_name as user_url_name, flus.user_name as user_name, flus.image as user_image,trc.project_id as custom_msg,trc.amount as custom_msg2 from user flus ,user_follow flw,transaction trc where flw.follow_user_id = flus.user_id and trc.user_id = flw.follow_user_id and flw.follow_by_user_id = " . $user_id . ")

		

		union

		(select flus.user_name as activity_name,'following_post_project' as act, prj.date_added as activity_date,flus.user_id as key_id, flus.user_name as user_url_name, flus.user_name as user_name, flus.image as user_image,prj.project_id as custom_msg,'custom_msg2' as custom_msg2 from user flus ,user_follow flw,project prj where flw.follow_user_id = flus.user_id and prj.user_id = flw.follow_user_id and flw.follow_by_user_id = " . $user_id . " and prj.active = '1')

		

		union

(select flus.user_name as activity_name,'myfolloingfollowers' as act, flw2.user_follow_date as activity_date,flw2.follow_by_user_id as key_id, flus.user_name as user_url_name,flus.user_name as user_name, flus.image as user_image, flw2.follow_user_id as custom_msg,'custom_msg2' as custom_msg2 from user flus , user_follow flw2 where flw2.follow_by_user_id = flus.user_id and flw2.follow_user_id in (select flw1.follow_user_id from user_follow flw1 where flw1.follow_by_user_id = " . $user_id . ") and flw2.follow_user_id != " . $user_id . " and flw2.follow_by_user_id != " . $user_id . ")



		

		 ) tbl order by activity_date desc  limit " . $limit . " offset " . $offset . "");
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function my_total_activities($user_id) {

		$query = $this->db->query("select * from user_login where user_id=" . $user_id . " order by login_date_time desc limit 1");
		$user_login_detail = $query->row_array();
		$query = $this->db->query("select * from (

			

			(select us.user_name as activity_name,'signup' as act, us.date_added as activity_date,us.user_id as key_id, us.user_name as user_url_name, us.user_name as user_name, us.image as user_image, 'custom_msg' as custom_msg, 'custom_msg2' as custom_msg2 from user us where us.user_id='" . $user_id . "')

			

			union

			(select flus.user_name as activity_name,'follower' as act, flw.user_follow_date as activity_date,flus.user_id as key_id, flus.user_name as user_url_name, flus.user_name as user_name, flus.image as user_image,'custom_msg' as custom_msg,'custom_msg2' as custom_msg2 from user flus , user_follow flw where flw.follow_by_user_id = flus.user_id and flw.follow_user_id = " . $user_id . ")

			

			union

			(select flus.user_name as activity_name,'user_own_comment' as act, cmt.date_added as activity_date,flus.user_id as key_id, flus.user_name as user_url_name, flus.user_name as user_name, flus.image as user_image,cmt.project_id as custom_msg,cmt.comments as custom_msg2 from user flus ,comment cmt where cmt.user_id = flus.user_id and flus.user_id = " . $user_id . " and cmt.status = '1')

			

			union

			(select flus.user_name as activity_name,'followercomment' as act, cmt.date_added as activity_date,flus.user_id as key_id, flus.user_name as user_url_name, flus.user_name as user_name, flus.image as user_image,cmt.comments as custom_msg,cmt.project_id as custom_msg2 from user flus ,user_follow flw,comment cmt where flw.follow_by_user_id = flus.user_id and cmt.user_id = flw.follow_by_user_id and flw.follow_user_id = " . $user_id . " and cmt.status = '1')

			

			union

			(select flus.user_name as activity_name,'following' as act, flw.user_follow_date as activity_date,flus.user_id as key_id, flus.user_name as user_url_name, flus.user_name as user_name, flus.image as user_image,'custom_msg' as custom_msg,'custom_msg2' as custom_msg2 from user flus ,user_follow flw where flw.follow_user_id = flus.user_id and flw.follow_by_user_id = " . $user_id . " )

			

			union

			(select flus.user_name as activity_name,'followuser_follow_project' as act, pfl.project_follow_date as activity_date,flus.user_id as key_id, flus.user_name as user_url_name, flus.user_name as user_name, flus.image as user_image,pfl.project_id as custom_msg,'custom_msg2' as custom_msg2 from user flus ,user_follow flw ,project_follower pfl where pfl.project_follow_user_id = flus.user_id and flw.follow_by_user_id = pfl.project_follow_user_id and flw.follow_user_id = " . $user_id . ")

			union

			(select flus.user_name as activity_name,'own_follow_project' as act, pfl.project_follow_date as activity_date,flus.user_id as key_id, flus.user_name as user_url_name, flus.user_name as user_name, flus.image as user_image,pfl.project_id as custom_msg,pfl.project_follow_user_id as custom_msg2 from user flus ,project_follower pfl where pfl.project_follow_user_id = flus.user_id and flus.user_id = " . $user_id . ")

			

			union

			(select flus.user_name as activity_name,'user_own_project_update' as act, updt.date_added as activity_date,flus.user_id as key_id, flus.user_name as user_url_name, flus.user_name as user_name, flus.image as user_image,updt.project_id as custom_msg,updt.updates as custom_msg2 from user flus ,project prj, updates updt where updt.project_id = prj.project_id and prj.active=1 and prj.user_id = flus.user_id and flus.user_id = " . $user_id . ")

			

			union

			(select flus.user_name as activity_name,'project_update_follower_project' as act, updt.date_added as activity_date,flus.user_id as key_id, flus.user_name as user_url_name,flus.user_name as user_name, flus.image as user_image,updt.project_id as custom_msg,updt.updates as custom_msg2 from user flus , user_follow flw ,updates updt,project prj where flw.follow_by_user_id = flus.user_id and prj.active=1 and updt.project_id = prj.project_id and prj.user_id = flus.user_id and flw.follow_user_id = " . $user_id . ")

			

			union

			(select flus.user_name as activity_name,'user_own_donation' as act, trc.transaction_date_time as activity_date,flus.user_id as key_id, flus.user_name as user_url_name, flus.user_name as user_name, flus.image as user_image,trc.project_id as custom_msg,trc.amount as custom_msg2 from user flus ,transaction trc where trc.user_id = flus.user_id and flus.user_id = " . $user_id . ")

			

			union

			(select flus.user_name as activity_name,'project_follower_donation' as act, trc.transaction_date_time as activity_date,flus.user_id as key_id, flus.user_name as user_url_name,flus.user_name as user_name, flus.image as user_image,trc.project_id as custom_msg,trc.amount as custom_msg2 from user flus , user_follow flw ,transaction trc where flw.follow_by_user_id = flus.user_id and trc.user_id = flus.user_id and flw.follow_user_id = " . $user_id . ")

			

			union

			(select flus.user_name as activity_name,'user_own_gallery' as act, glr.date_added as activity_date,flus.user_id as key_id, flus.user_name as user_url_name, flus.user_name as user_name, flus.image as user_image,glr.project_id as custom_msg,'custom_msg2' as custom_msg2 from user flus ,project_gallery glr,project prj where glr.project_id = prj.project_id and prj.active=1 and prj.user_id = flus.user_id and flus.user_id = " . $user_id . ")

			

			union

			(select flus.user_name as activity_name,'followeruser_gallery' as act, glr.date_added as activity_date,flus.user_id as key_id, flus.user_name as user_url_name,flus.user_name as user_name, flus.image as user_image,glr.project_id as custom_msg,'custom_msg2' as custom_msg2 from user flus , user_follow flw ,project_gallery glr,project prj where glr.project_id = prj.project_id and prj.active=1 and prj.user_id = flus.user_id and flw.follow_by_user_id = flus.user_id and flw.follow_user_id = " . $user_id . ")

			

			union

			(select flus.user_name as activity_name,'my_post_project' as act, prj.date_added as activity_date,flus.user_id as key_id, flus.user_name as user_url_name, flus.user_name as user_name, flus.image as user_image,prj.project_id as custom_msg,prj.project_summary as custom_msg2 from user flus ,project prj where prj.user_id = flus.user_id and prj.active=1 and flus.user_id = " . $user_id . " and prj.active ='1')

			

			union

			(select flus.user_name as activity_name,'followeruser_post_project' as act, prj.date_added as activity_date,flus.user_id as key_id, flus.user_name as user_url_name,flus.user_name as user_name, flus.image as user_image,prj.project_id as custom_msg,'custom_msg2' as custom_msg2 from user flus , user_follow flw ,project prj where prj.user_id = flus.user_id and prj.active=1 and flw.follow_by_user_id = flus.user_id and flw.follow_user_id = " . $user_id . ")

			

			union

			(select flus.user_name as activity_name,'following_follow_project' as act, pfl.project_follow_date as activity_date,flus.user_id as key_id, flus.user_name as user_url_name, flus.user_name as user_name, flus.image as user_image,pfl.project_id as custom_msg,'custom_msg2' as custom_msg2 from user flus ,user_follow flw,project_follower pfl where flw.follow_user_id = flus.user_id and pfl.project_follow_user_id = flw.follow_user_id and flw.follow_by_user_id = " . $user_id . ")

			

			union

			(select flus.user_name as activity_name,'following_gallery' as act, glr.date_added as activity_date,flus.user_id as key_id, flus.user_name as user_url_name, flus.user_name as user_name, flus.image as user_image,glr.project_id as custom_msg,'custom_msg2' as custom_msg2 from user flus ,user_follow flw,project_gallery glr where flw.follow_user_id = flus.user_id and flw.follow_by_user_id = " . $user_id . ")

			

			union

			(select flus.user_name as activity_name,'following_updates' as act, flw.user_follow_date as activity_date,flus.user_id as key_id, flus.user_name as user_url_name, flus.user_name as user_name, flus.image as user_image,'custom_msg' as custom_msg,updt.update_title  as custom_msg2 from user flus ,user_follow flw,project prj,updates updt where prj.project_id=updt.project_id and prj.active=1 and  flw.follow_user_id = flus.user_id and flw.follow_by_user_id = " . $user_id . " and flus.user_id= " . $user_id . " group by updt.update_id)

			

			union

			(select flus.user_name as activity_name,'following_comment' as act, cmt.date_added as activity_date,flus.user_id as key_id, flus.user_name as user_url_name, flus.user_name as user_name, flus.image as user_image,cmt.project_id as custom_msg,cmt.comments as custom_msg2 from user flus ,user_follow flw,comment cmt where flw.follow_user_id = flus.user_id and cmt.user_id = flw.follow_user_id and flw.follow_by_user_id = " . $user_id . ")

			

			union

			(select flus.user_name as activity_name,'following_donation' as act, trc.transaction_date_time as activity_date,flus.user_id as key_id, flus.user_name as user_url_name, flus.user_name as user_name, flus.image as user_image,trc.project_id as custom_msg,trc.amount as custom_msg2 from user flus ,user_follow flw,transaction trc where flw.follow_user_id = flus.user_id and trc.user_id = flw.follow_user_id and flw.follow_by_user_id = " . $user_id . ")

			

			union

			(select flus.user_name as activity_name,'following_post_project' as act, prj.date_added as activity_date,flus.user_id as key_id, flus.user_name as user_url_name, flus.user_name as user_name, flus.image as user_image,prj.project_id as custom_msg,'custom_msg2' as custom_msg2 from user flus ,user_follow flw,project prj where flw.follow_user_id = flus.user_id and prj.active=1 and prj.user_id = flw.follow_user_id and flw.follow_by_user_id = " . $user_id . " and prj. active = '1')

			

			union

			(select flus.user_name as activity_name,'myfolloingfollowers' as act, flw2.user_follow_date as activity_date,flw2.follow_by_user_id as key_id, flus.user_name as user_url_name,flus.user_name as user_name, flus.image as user_image, flw2.follow_user_id as custom_msg,'custom_msg2' as custom_msg2 from user flus , user_follow flw2 where flw2.follow_by_user_id = flus.user_id and flw2.follow_user_id in (select flw1.follow_user_id from user_follow flw1 where flw1.follow_by_user_id = " . $user_id . ") and flw2.follow_user_id != " . $user_id . " and flw2.follow_by_user_id != " . $user_id . ")

			

			

			) tbl where activity_date>='" . $user_login_detail["login_date_time"] . "' order by activity_date desc ");
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}

	public function header_activities($user_id, $limit, $offset) {

		$query = $this->db->query("select * from user_login where user_id=" . $user_id . " order by login_date_time desc limit 1");
		$user_login_detail = $query->row_array();
		$query = $this->db->query("select * from (

	 

	 (select us.user_name as activity_name,'signup' as act, us.date_added as activity_date,us.user_id as key_id, us.user_name as user_url_name, us.user_name as user_name, us.image as user_image, 'custom_msg' as custom_msg, 'custom_msg2' as custom_msg2  from user us where us.user_id='" . $user_id . "') 

	 

		union

		(select flus.user_name as activity_name,'follower' as act, flw.user_follow_date as activity_date,flus.user_id as key_id, flus.user_name as user_url_name, flus.user_name as user_name, flus.image as user_image,'custom_msg' as custom_msg,'custom_msg2' as custom_msg2 from user flus , user_follow flw where flw.follow_by_user_id = flus.user_id and flw.follow_user_id  = " . $user_id . ")

		

		union

		(select flus.user_name as activity_name,'user_own_comment' as act, cmt.date_added as activity_date,flus.user_id as key_id, flus.user_name as user_url_name, flus.user_name as user_name, flus.image as user_image,cmt.project_id as custom_msg,cmt.comments as custom_msg2 from user flus ,comment cmt where cmt.user_id = flus.user_id and flus.user_id = " . $user_id . " and cmt.status = '1')

		

		union

		(select flus.user_name as activity_name,'followercomment' as act, cmt.date_added as activity_date,flus.user_id as key_id, flus.user_name as user_url_name, flus.user_name as user_name, flus.image as user_image,cmt.comments as custom_msg,cmt.project_id as custom_msg2 from user flus ,user_follow flw,comment cmt where flw.follow_by_user_id = flus.user_id and cmt.user_id = flw.follow_by_user_id and flw.follow_user_id  = " . $user_id . " and cmt.status = '1')

		

		union

		(select flus.user_name as activity_name,'following' as act, flw.user_follow_date as activity_date,flus.user_id as key_id, flus.user_name as user_url_name, flus.user_name as user_name, flus.image as user_image,'custom_msg' as custom_msg,'custom_msg2' as custom_msg2 from user flus ,user_follow flw where flw.follow_user_id = flus.user_id and flw.follow_by_user_id = " . $user_id . " )

		

		union

		(select flus.user_name as activity_name,'followuser_follow_project' as act, pfl.project_follow_date as activity_date,flus.user_id as key_id, flus.user_name as user_url_name, flus.user_name as user_name, flus.image as user_image,pfl.project_id as custom_msg,'custom_msg2' as custom_msg2 from user flus ,user_follow flw ,project_follower pfl where pfl.project_follow_user_id = flus.user_id and flw.follow_by_user_id = pfl.project_follow_user_id and flw.follow_user_id = " . $user_id . ")

		union

		(select flus.user_name as activity_name,'own_follow_project' as act, pfl.project_follow_date as activity_date,flus.user_id as key_id, flus.user_name as user_url_name, flus.user_name as user_name, flus.image as user_image,pfl.project_id as custom_msg,pfl.project_follow_user_id as custom_msg2 from user flus ,project_follower pfl where pfl.project_follow_user_id = flus.user_id and flus.user_id = " . $user_id . ")

		

		union

		(select flus.user_name as activity_name,'user_own_project_update' as act, updt.date_added as activity_date,flus.user_id as key_id, flus.user_name as user_url_name, flus.user_name as user_name, flus.image as user_image,updt.project_id as custom_msg,updt.update_title as custom_msg2 from user flus ,project prj, updates updt where updt.project_id = prj.project_id and prj.user_id = flus.user_id and flus.user_id = " . $user_id . ")	

		

		union

		(select flus.user_name as activity_name,'project_update_follower_project' as act, updt.date_added as activity_date,flus.user_id as key_id, flus.user_name as user_url_name,flus.user_name as user_name, flus.image as user_image,updt.project_id as custom_msg,updt.update_title as custom_msg2 from user flus , user_follow flw ,updates updt,project prj where flw.follow_by_user_id = flus.user_id and updt.project_id = prj.project_id and prj.user_id = flus.user_id and flw.follow_user_id = " . $user_id . ")	

		

		union

		(select flus.user_name as activity_name,'user_own_donation' as act, trc.transaction_date_time as activity_date,flus.user_id as key_id, flus.user_name as user_url_name, flus.user_name as user_name, flus.image as user_image,trc.project_id as custom_msg,trc.amount as custom_msg2 from user flus ,transaction trc where trc.user_id = flus.user_id and flus.user_id = " . $user_id . ")

		

		union

		(select flus.user_name as activity_name,'project_follower_donation' as act, trc.transaction_date_time as activity_date,flus.user_id as key_id, flus.user_name as user_url_name,flus.user_name as user_name, flus.image as user_image,trc.project_id as custom_msg,trc.amount as custom_msg2 from user flus , user_follow flw ,transaction trc where flw.follow_by_user_id = flus.user_id and trc.user_id = flus.user_id and flw.follow_user_id = " . $user_id . ")	

		

		union

		(select flus.user_name as activity_name,'user_own_gallery' as act, glr.date_added as activity_date,flus.user_id as key_id, flus.user_name as user_url_name, flus.user_name as user_name, flus.image as user_image,glr.project_id as custom_msg,'custom_msg2' as custom_msg2 from user flus ,project_gallery glr,project prj where glr.project_id = prj.project_id and prj.user_id = flus.user_id and flus.user_id = " . $user_id . ")

		

		union

		(select flus.user_name as activity_name,'followeruser_gallery' as act, glr.date_added as activity_date,flus.user_id as key_id, flus.user_name as user_url_name,flus.user_name as user_name, flus.image as user_image,glr.project_id as custom_msg,'custom_msg2' as custom_msg2 from user flus , user_follow flw ,project_gallery glr,project prj where glr.project_id = prj.project_id and prj.user_id = flus.user_id and flw.follow_by_user_id = flus.user_id and flw.follow_user_id = " . $user_id . ")	

		

		union

		(select flus.user_name as activity_name,'my_post_project' as act, prj.date_added as activity_date,flus.user_id as key_id, flus.user_name as user_url_name, flus.user_name as user_name, flus.image as user_image,prj.project_id as custom_msg,prj.project_summary as custom_msg2 from user flus ,project prj where prj.user_id = flus.user_id and flus.user_id = " . $user_id . " and prj.active ='1')

		

		union

		(select flus.user_name as activity_name,'followeruser_post_project' as act, prj.date_added as activity_date,flus.user_id as key_id, flus.user_name as user_url_name,flus.user_name as user_name, flus.image as user_image,prj.project_id as custom_msg,'custom_msg2' as custom_msg2 from user flus , user_follow flw ,project prj where prj.user_id = flus.user_id and flw.follow_by_user_id = flus.user_id and flw.follow_user_id = " . $user_id . ")

		

		union

		(select flus.user_name as activity_name,'following_follow_project' as act, pfl.project_follow_date as activity_date,flus.user_id as key_id, flus.user_name as user_url_name, flus.user_name as user_name, flus.image as user_image,pfl.project_id as custom_msg,'custom_msg2' as custom_msg2 from user flus ,user_follow flw,project_follower pfl where flw.follow_user_id = flus.user_id and pfl.project_follow_user_id = flw.follow_user_id and flw.follow_by_user_id = " . $user_id . ")

		

		union

		(select flus.user_name as activity_name,'following_gallery' as act, glr.date_added as activity_date,flus.user_id as key_id, flus.user_name as user_url_name, flus.user_name as user_name, flus.image as user_image,glr.project_id as custom_msg,'custom_msg2' as custom_msg2 from user flus ,user_follow flw,project_gallery glr where flw.follow_user_id = flus.user_id and flw.follow_by_user_id = " . $user_id . ")

		

		union

		(select flus.user_name as activity_name,'following_updates' as act, flw.user_follow_date as activity_date,flus.user_id as key_id, flus.user_name as user_url_name, flus.user_name as user_name, flus.image as user_image,'custom_msg' as custom_msg,updt.update_title  as custom_msg2 from user flus ,user_follow flw,project prj,updates updt where prj.project_id=updt.project_id and  flw.follow_user_id = flus.user_id and flw.follow_by_user_id = " . $user_id . " and flus.user_id= " . $user_id . " group by updt.update_id)

		

		union

		(select flus.user_name as activity_name,'following_comment' as act, cmt.date_added as activity_date,flus.user_id as key_id, flus.user_name as user_url_name, flus.user_name as user_name, flus.image as user_image,cmt.project_id as custom_msg,cmt.comments as custom_msg2 from user flus ,user_follow flw,comment cmt where flw.follow_user_id = flus.user_id and cmt.user_id = flw.follow_user_id and flw.follow_by_user_id = " . $user_id . ")

		

		union

		(select flus.user_name as activity_name,'following_donation' as act, trc.transaction_date_time as activity_date,flus.user_id as key_id, flus.user_name as user_url_name, flus.user_name as user_name, flus.image as user_image,trc.project_id as custom_msg,trc.amount as custom_msg2 from user flus ,user_follow flw,transaction trc where flw.follow_user_id = flus.user_id and trc.user_id = flw.follow_user_id and flw.follow_by_user_id = " . $user_id . ")

		

		union

		(select flus.user_name as activity_name,'following_post_project' as act, prj.date_added as activity_date,flus.user_id as key_id, flus.user_name as user_url_name, flus.user_name as user_name, flus.image as user_image,prj.project_id as custom_msg,'custom_msg2' as custom_msg2 from user flus ,user_follow flw,project prj where flw.follow_user_id = flus.user_id and prj.user_id = flw.follow_user_id and flw.follow_by_user_id = " . $user_id . " and prj.active = '1')

		

		union

(select flus.user_name as activity_name,'myfolloingfollowers' as act, flw2.user_follow_date as activity_date,flw2.follow_by_user_id as key_id, flus.user_name as user_url_name,flus.user_name as user_name, flus.image as user_image, flw2.follow_user_id as custom_msg,'custom_msg2' as custom_msg2 from user flus , user_follow flw2 where flw2.follow_by_user_id = flus.user_id and flw2.follow_user_id in (select flw1.follow_user_id from user_follow flw1 where flw1.follow_by_user_id = " . $user_id . ") and flw2.follow_user_id != " . $user_id . " and flw2.follow_by_user_id != " . $user_id . ")



		

		 ) tbl order by activity_date>='" . $user_login_detail["login_date_time"] . "',activity_date desc  limit " . $limit . " offset " . $offset . "");
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function get_total_my_project($uid = null) {

		$query = $this->db->query("select * from project where user_id='" . $uid . "' and status=1 and active=1 order by project_id desc");
		return $query->num_rows();
	}

	public function get_my_project($cid, $offset, $limit) {

		$query = $this->db->query("select * from project where user_id='" . $cid . "' and status=1 and active=1 order by project_id desc LIMIT " . $limit . " OFFSET " . $offset);
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		return 0;
	}

	public function get_count_my_comments() {

		$query = $this->db->query("select * from comment cm , project pr where cm.project_id = pr.project_id and cm.user_id='" . $this->session->userdata("user_id") . "'  order by cm.comment_id desc");
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}

	public function get_all_my_comment($offset, $limit) {

		$query = $this->db->query("select * from comment cm , project pr where cm.project_id = pr.project_id and cm.user_id='" . $this->session->userdata("user_id") . "'  order by cm.comment_id desc  LIMIT " . $limit . " OFFSET " . $offset);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function get_my_donations_count() {

		$query = $this->db->query("select p.*,tr.amount as owner_amt, tr.pay_fee as admin_amt from project p, transaction tr where tr.project_id=p.project_id and tr.startproject!=1 and tr.user_id='" . $this->session->userdata("user_id") . "' order by tr.transaction_id desc");
		return $query->num_rows();
	}

	public function get_my_donations($offset, $limit) {

		$query = $this->db->query("select p.*,tr.amount as owner_amt, tr.pay_fee as admin_amt,tr.* from project p, transaction tr where tr.project_id=p.project_id and tr.user_id='" . $this->session->userdata("user_id") . "' order by tr.transaction_id desc LIMIT " . $limit . " OFFSET " . $offset);
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		return 0;
	}

	public function get_email_notification($user_id) {

		$query = $this->db->query("select * from user_notification where user_id='" . $user_id . "'");
		
		if ($query->num_rows() > 0)
		{
			return $query->row();
		}
		return 0;
	}

	public function user_notification_insert() {
         
		if ($this->input->post("update") == "1")
		{
			$update = 1;
		}
		 else 
		{
			$update = 0;
		}
		if ($this->input->post("add_fund") == "1")
		{
			$add_fund = 1;
		}
		 else 
		{
			$add_fund = 0;
		}
		if ($this->input->post("comment_alert") == "1")
		{
			$comment_alert = 1;
		}
		 else 
		{
			$comment_alert = 0;
		}
		if ($this->input->post("follow_back") == "1")
		{
			$follow_back = 1;
		}
		 else 
		{
			$follow_back = 0;
		}
		if ($this->input->post("followers") == "1")
		{
			$followers = 1;
		}
		 else 
		{
			$followers = 0;
		}			
		if ($this->input->post("news_letter") == "1")
		{
			$news_letter = 1;
		}
		 else 
		{
			$news_letter = 0;
		}		
		
		$data = array("add_fund" => $add_fund,"comment_alert" => $comment_alert,"follow_back" => $follow_back, 
		              "followers" => $followers, "update" => $update, "news_letter" => $news_letter);
		$this->db->where("user_id", $this->session->userdata("user_id"));
		$this->db->update("user_notification", $data);
		return;
	}

	public function get_total_member() {

		$query = $this->db->query("select * from user where active='1' order by user_id desc");
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}

	public function get_all_members($offset, $limit) {

		$query = $this->db->query("select * from user where active='1' order by user_id desc  LIMIT " . $limit . " OFFSET " . $offset . " ");
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function count_user_comment($uid) {

		$query = $this->db->query("select * from comment where user_id='" . $uid . "' and  status='1' order by comment_id desc");
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}

	public function count_user_project($uid) {

		$query = $this->db->query("select * from project where user_id='" . $uid . "' and  active='1' order by project_id desc");
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}

	public function get_user_all_projects($uid) {

		$query = $this->db->query("select * from project where user_id='" . $uid . "' and  active='1' order by project_id desc");
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function get_user_all_comments($uid) {

		$query = $this->db->query("select * from comment where user_id='" . $uid . "' and  status='1' order by comment_id desc");
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function get_user_have_backed_project($uid) {

		$query = $this->db->query("select p.*,tr.amount as owner_amt,tr.transaction_date_time as end_send, tr.pay_fee as admin_amt from project p, transaction tr where tr.project_id=p.project_id and tr.user_id='" . $uid . "' order by tr.transaction_id desc");
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function user_total_donate_amount($uid) {

		$owner_amt = "0";
		$query = $this->db->query("select SUM(amount) as owner_amt from transaction where user_id='" . $uid . "'");
		if ($query->num_rows() > 0)
		{
			$owner_get = $query->row();
			$owner_amt = $owner_get->owner_amt;
		}
		$admin_amt = "0";
		$query = $this->db->query("select SUM(pay_fee) as admin_amt from transaction where user_id='" . $uid . "'");
		if ($query->num_rows() > 0)
		{
			$admin_get = $query->row();
			$admin_amt = $admin_get->admin_amt;
		}
		$total = $admin_amt + $owner_amt;
		return $total;
	}

	public function user_total_received_donation($uid) {

		$owner_amt = "0";
		$query = $this->db->query("select SUM(tr.amount) as owner_amt from transaction tr left join project p on tr.project_id=p.project_id where p.user_id='" . $uid . "'");
		if ($query->num_rows() > 0)
		{
			$owner_get = $query->row();
			$owner_amt = $owner_get->owner_amt;
		}
		$admin_amt = "0";
		$query = $this->db->query("select SUM(tr.pay_fee) as admin_amt from transaction tr left join project p on tr.project_id=p.project_id where p.user_id='" . $uid . "'");
		if ($query->num_rows() > 0)
		{
			$admin_get = $query->row();
			$admin_amt = $admin_get->admin_amt;
		}
		$total = $admin_amt + $owner_amt;
		return $total;
	}

	public function get_paymentid_result($id) {

		$query = $this->db->get_where("payments_gateways", array("id" => $id));
		return $query->row_array();
	}

	public function cancel_wallet_donation($id) {

		$query = $this->db->get_where("wallet", array("id" => $id));
		if ($query->num_rows() > 0)
		{
			$rs = $query->row();
			$que = $this->db->query("select * from wallet where wallet_date='" . $rs->wallet_date . "' and wallet_ip='" . $rs->wallet_ip . "' and project_id='" . $rs->project_id . "' and id<>'" . $id . "'");
			$transaction_id = "";
			if ($que->num_rows() > 0)
			{
				$r = $que->row();
				if ($rs->debit > 0)
				{
					$amount = $rs->debit;
					$transaction_id = $rs->wallet_transaction_id;
				}
				 else 
				{
					$amount = $rs->credit;
					$transaction_id = $r->wallet_transaction_id;
				}
				$this->db->query("update wallet set donate_status=3 where id='" . $r->id . "' and project_id<>'0'");
				$this->db->query("update wallet set donate_status=3 where id='" . $rs->id . "' and project_id<>'0'");
				$this->db->query("update project set amount_get=(amount_get-" . $amount . ") where project_id='" . $rs->project_id . "'");
				$this->db->query("update transaction set wallet_payment_status='2' where wallet_transaction_id='" . $transaction_id . "' and amount='" . $amount . "' and transaction_date_time='" . $rs->wallet_date . "' and project_id='" . $rs->project_id . "'");
				return $rs->project_id;
			}
			return 0;
		}
		return 0;
	}

	public function get_total_incomingfund__list($pid = "", $uid = "") {

		if ($pid != "")
		{
			$this->db->select("w.*,t.*,us.*");
			$this->db->from("wallet w");
			$this->db->join("transaction t", "w.wallet_transaction_id=t.wallet_transaction_id", "INNER");
			$this->db->join("user us", "t.user_id=us.user_id", "INNER");
			$this->db->where("w.project_id", $pid);
			$this->db->where("w.debit !=", "");
			$this->db->where_not_in("w.donate_status", array("2", "3"));
			$this->db->order_by("w.project_id", "desc");
		}
		 else 
		{
			$this->db->select("w.*,t.*,us.*");
			$this->db->from("wallet w");
			$this->db->join("transaction t", "w.wallet_transaction_id=t.wallet_transaction_id", "INNER");
			$this->db->join("user us", "t.user_id=us.user_id", "INNER");
			$this->db->where("w.user_id", $uid);
			$this->db->where("w.debit !=", "");
			$this->db->where("w.project_id !=", 0);
			$this->db->where_not_in("w.donate_status", array("2", "3"));
			$this->db->order_by("w.project_id", "desc");
		}
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}

	public function get_total_incomingfund($pid = "", $uid = "", $limit) {

		if ($pid != "")
		{
			$this->db->select("w.*,t.*,us.*");
			$this->db->from("wallet w");
			$this->db->join("transaction t", "w.wallet_transaction_id=t.wallet_transaction_id", "INNER");
			$this->db->join("user us", "t.user_id=us.user_id", "INNER");
			$this->db->where("w.project_id", $pid);
			$this->db->where("w.debit !=", "");
			$this->db->where_not_in("w.donate_status", array("2", "3"));
			$this->db->order_by("w.project_id", "desc");
			$this->db->limit($limit);
		}
		 else 
		{
			$this->db->select("w.*,t.*,us.*");
			$this->db->from("wallet w");
			$this->db->join("transaction t", "w.wallet_transaction_id=t.wallet_transaction_id", "INNER");
			$this->db->join("user us", "t.user_id=us.user_id", "INNER");
			$this->db->where("w.user_id", $uid);
			$this->db->where("w.debit !=", "");
			$this->db->where_not_in("w.donate_status", array("2", "3"));
			$this->db->where("w.project_id !=", 0);
			$this->db->order_by("w.project_id", "desc");
			$this->db->limit($limit);
		}
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function get_target_fund($pid = "", $uid = "") {

		if ($pid != "")
		{
			$query = $this->db->query('' . "select * from project where project_id='" . $pid . "'");
		}
		 else 
		{
			$query = $this->db->query('' . "select * from project where user_id='" . $uid . "' and active='1' and status='1' and end_date>='" . date("Y-m-d H:i:s") . "'");
		}
		if ($query->num_rows() > 0)
		{
			return $query->row();
		}
		return 0;
	}

	public function get_user_website($id = "") {

		$query = $this->db->get_where("user_website", array("user_id" => $id));
		if ($query->num_rows())
		{
			return $query->result_array();
		}
		return 0;
	}

	public function list_all_comments_count($cid) {
		$query = $this->db->query("SELECT 'comment' as act,project_id as pid,comment_id as cmt_id, comments as comment,date_added as activity_date from comment where  status=1 and  user_id=" . $cid . "

			UNION SELECT 'update' as act,project_id as pid,update_id as cmt_id,update_comment_text as comment,update_comment_date as activity_date from update_comment update_comment where update_comment_user_id=" . $cid . " order by activity_date desc ");
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}

	public function list_all_comments($cid, $offset, $limit) {

		$query = $this->db->query("SELECT 'comment' as act,project_id as pid,comment_id as cmt_id, comments as comment,date_added as activity_date from comment where status=1 and user_id=" . $cid . "

			UNION SELECT 'update' as act,project_id as pid,update_id as cmt_id,update_comment_text as comment,update_comment_date as activity_date from update_comment update_comment where  update_comment_user_id=" . $cid . " order by activity_date desc limit " . $offset . "," . $limit . "");
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function blog_insert() {

		$status = "";
		$blog_setting = blog_setting();
		if ($blog_setting->admin_approve == 1)
		{
			$status = 0;
		}
		 else 
		{
			$status = 1;
		}
		$insert_blog = array("blog_title" => $this->input->post("blog_title"), "blog_discription" => $this->input->post("blog_disc"), "blog_category" => $this->input->post("blog_category"), "publish" => $this->input->post("publish"), "no_one_comment" => $this->input->post("no_one_comment"), "user_id" => $this->session->userdata("user_id"), "status" => $status, "date_added" => date("Y-m-d H:i:s"));
		$this->db->insert("blogs", $insert_blog);
		return;
	}

	public function get_user_blog_count() {

		$this->db->select("*");
		$this->db->from("blogs");
		$this->db->where("user_id", $this->session->userdata("user_id"));
		$this->db->where("status", 1);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}

	public function get_user_blog($offset = 0, $limit = 0) {

		$this->db->select("*");
		$this->db->from("blogs");
		$this->db->where("user_id", $this->session->userdata("user_id"));
		$this->db->where("status", 1);
		$this->db->limit($limit, $offset);
		$this->db->order_by("blog_id", "DESC");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function get_user_blog_list($uid = 0, $blogid = 0) {

		$this->db->select("*");
		$this->db->from("blogs");
		$this->db->where("user_id", $uid);
		$this->db->where("blog_id !=", $blogid);
		$this->db->where("status", 1);
		$this->db->order_by("blog_id", "DESC");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return 0;
	}

	public function get_user_blog_selected($blogid = 0) {

		$query = $this->db->query("select * from blogs where blog_id='" . $blogid . "'");
		if ($query->num_rows() > 0)
		{
			return $query->row();
		}
		return 0;
	}

	public function count_all_blog($uid) {

		$this->db->select("*");
		$this->db->from("blogs");
		$this->db->where("user_id", $uid);
		$this->db->where("status", 1);
		$this->db->order_by("blog_id", "DESC");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		return 0;
	}

};;


