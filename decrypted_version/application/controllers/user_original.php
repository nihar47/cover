<?php
/*********************************************************************************
 * This the taskrabbitclone.com  by Rockers Technology. is paid software. It is released under the terms of 
 * the following BSD License.
 * 
 *  Rockers Technologies (Head Office)
 *    5038,Berthpage Dr
 *    suwanee, GA. Zip Code : 30024
    
 *    E-mail Address : nishu@rockersinfo.com
 * 
 * Copyright © 2012-2020 by Rockers Technology , INC a domestic profit corporation has been duly incorporated under
the laws of the state of georiga , USA. www.rockersinfo.com
 * All rights reserved.
 * 
 * Redistribution and use in source and binary forms, with or without modification, 
 * are permitted provided that the following conditions are met:
 * 
 * - Redistributions of source code must retain the above copyright notice, this 
 *   list of conditions and the following disclaimer.
 * - Redistributions in binary form must reproduce the above copyright notice, this 
 *   list of conditions and the following disclaimer in the documentation and/or 
 *   other materials provided with the distribution.

 * 
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND 
 * ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED 
 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. 
 * IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, 
 * INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, 
 * BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, 
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF 
 * LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE 
 * OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED 
 * OF THE POSSIBILITY OF SUCH DAMAGE.
 ********************************************************************************/
class User extends ROCKERS_Controller {

	function User()
	{
		parent::__construct();	
		$this->load->model('home_model');
		$this->load->model('project_model');
		$this->load->model('user_model');		
	}
	
	
	function index($msg ='')
	{
		redirect('home/dashboard');
	}
	
	
	function create()
	{
		redirect('start_project/create_step1');
	}
	
	
	
	
	
	function activities($user_id='')
	{
		
		if(!check_user_authentication()) {  redirect('home/login'); } 
		if($user_id == '')
		{
			redirect('home/login');
		}
		
		$limit = '10';
		$offset=0;
		$data['offset'] = $offset;
		$data['limit'] = $limit;
		
		
		$data['activities'] = $this->user_model->activities($user_id,$limit,$offset);	
		$meta = meta_setting();
		$data['site_setting'] = site_setting();
		
		
		
		$data['header_menu'] = dynamic_menu(0);
		$data['footer_menu'] = dynamic_menu_footer(0);
		$data['right_menu'] = dynamic_menu_about(0);
	
		
		$data['offset']=$offset;
		$data['msg']='';
		$data['error']='';
		
		$this->home_model->select_text();
		$this->template->write('meta_title', 'Activities-'.$meta['title'], TRUE);
		$this->template->write('meta_description', $meta['meta_description'], TRUE);
		$this->template->write('meta_keyword', $meta['meta_keyword'], TRUE);
		
		
			if($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1)
			{
				$this->template->set_master_template('iphone/template.php');
				$this->template->write_view('main_content', 'iphone/comments', $data, TRUE);
				$this->template->render();
			}
			elseif(($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1)
			{
				$this->template->set_master_template('mobile/template.php');
				$this->template->write_view('main_content', 'mobile/comments', $data, TRUE);
				$this->template->render();
			}
			else
			{
				if(!check_user_authentication()) {
				$this->template->write_view('header', 'default/common/header',  $data, TRUE);
				}else
				{
					$this->template->write_view('header', 'default/common/header_login',  $data, TRUE);
				}
				$this->template->write_view('center_content', 'default/user/activities', $data, TRUE);
				$this->template->write_view('footer', 'default/common/footer',$data, TRUE);
				$this->template->render();
			}	
		
	}
	
	function load_ajax_activities($user_id='',$limit='',$offset='')
	{
		$data['site_setting'] = site_setting();
		$data['offset']=$offset;
		$data['limit']=$limit;
		$data['msg']='';
		$data['activities'] = $this->user_model->activities($user_id,$limit,$offset);
		$this->load->view('default/user/load_ajax_activities',$data);
		
	}
	
	/////////////============user all Projects =====================
		
	
	function my_project($id=null,$offset='0')
	{	
		//if(!check_user_authentication()) {  redirect('home/login'); } 
		if(get_authenticateUserID()!="" && get_authenticateUserID()==$id){
			$cid=get_authenticateUserID();
		}else{
			$cid=$id;
		}
		if(!is_numeric($id)){
			$user_id=get_one_userid($id);
			$cid=$user_id;
			
		}
		$this->load->library('pagination');
		
		$limit = '10';
		$config['uri_segment']='4';
		$config['base_url'] = site_url('user/my_project/'.$cid);
		$config['total_rows'] = $this->user_model->get_total_my_project($cid);
		$config['per_page'] = $limit;		
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();
		
		$data['total_rows'] = $config['total_rows'];
		$data['per_page'] = $limit;
		$data['offset'] = $offset;
		$data['limit'] = $limit;
		$data['cid']=$cid;
		
		$data['result'] = $this->user_model->get_my_project($cid,$offset, $limit);
		$data['graph_cat'] = get_user_project_catregory_for_graph($cid);
		$data['project_of_the_day'] = project_of_the_day_of_user($cid);
				
		$data['site_setting'] = site_setting();
		$meta = meta_setting();
		$data['searchprj'] = "";
		
		$data['numprj']=$this->user_model->get_total_my_project($cid);
		$data['num_my_comments']=$this->user_model->list_all_comments_count($cid);
		
	
		$data['num_backers']= $this->home_model->get_total_my_back_project($cid);
		
		
				
		$this->home_model->select_text();
		
		$this->template->write('meta_title','My Campaigns-'. $meta['title'], TRUE);
		$this->template->write('meta_description','My Campaigns-'. $meta['meta_description'], TRUE);
		$this->template->write('meta_keyword','My Campaigns-'. $meta['meta_keyword'], TRUE);
		
			if($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1)
			{
				$this->template->set_master_template('iphone/template.php');
				$this->template->write_view('main_content', 'iphone/my_project', $data, TRUE);
				$this->template->render();
			}
			elseif(($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1)
			{
				$this->template->set_master_template('mobile/template.php');
				$this->template->write_view('main_content', 'mobile/my_project', $data, TRUE);
				$this->template->render();
			}
			else
			{
				if(!check_user_authentication()) {
				$this->template->write_view('header', 'default/common/header',  $data, TRUE);
				}else
				{
					$this->template->write_view('header', 'default/common/header_login',  $data, TRUE);
				}
				$this->template->write_view('center_content', 'default/user/my_project', $data, TRUE);
				$this->template->write_view('footer', 'default/common/footer',$data, TRUE);
				$this->template->render();
			}
		
		
	}
	
	function extend_project($id=null){
		if(!check_user_authentication()) {
				$this->template->write_view('header', 'default/common/header',  $data, TRUE);
				}else
				{
					$this->template->write_view('header', 'default/common/header_login',  $data, TRUE);
				}
				$this->template->write_view('center_content', 'default/user/extend_project', $data, TRUE);
				$this->template->write_view('footer', 'default/common/footer',$data, TRUE);
				$this->template->render();
		}
	function my_project_ajax($offset=0)
	{
		$limit = '12';
		$data['total_rows'] = $this->user_model->get_total_my_project();
		$data['per_page'] = $limit;
		$data['offset'] = $offset;
		$data['limit'] = $limit;
		$data['site_setting'] = site_setting();
		$data['result'] = $this->user_model->get_my_project($offset, $limit);
		$this->load->view('default/my_project_ajax', $data);
	}
	
	
	
	
	
	
	////////===user all donation
	
	function transaction($offset=0)
	{
		$this->load->library('pagination');
		
		$limit = '10';
		$config['uri_segment']='3';
		$config['base_url'] = site_url('user/my_donation/');
		$config['total_rows'] = $this->user_model->get_my_donations_count();
		$config['per_page'] = $limit;
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();
		$data['donations'] = $this->user_model->get_my_donations($offset, $limit);
	
		$data['offset'] = $offset;
		$data['site_setting'] = site_setting();
		$data['header_menu'] = dynamic_menu(0);
		$data['footer_menu'] = dynamic_menu_footer(0);
		$data['right_menu'] = dynamic_menu_right(0);
		$meta = meta_setting();
		
		$this->home_model->select_text();
		$this->template->write('meta_title','My Contributions-'. $meta['title'], TRUE);
		$this->template->write('meta_description', $meta['meta_description'], TRUE);
		$this->template->write('meta_keyword', $meta['meta_keyword'], TRUE);
		
			if($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1)
			{
				$this->template->set_master_template('iphone/template.php');
				$this->template->write_view('main_content', 'iphone/my_donation', $data, TRUE);
				$this->template->render();
			}
			elseif(($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1)
			{
				$this->template->set_master_template('mobile/template.php');
				$this->template->write_view('main_content', 'mobile/my_donation', $data, TRUE);
				$this->template->render();
			}
			else
			{
				if(!check_user_authentication()) {
				$this->template->write_view('header', 'default/common/header',  $data, TRUE);
				}else
				{
					$this->template->write_view('header', 'default/common/header_login',  $data, TRUE);
				}
								$this->template->write_view('center_content', 'default/user/my_donation', $data, TRUE);
				$this->template->write_view('footer', 'default/common/footer',$data, TRUE);
				$this->template->render();
			}
		
		
		
	}
	
	
	////////===user all comment
	
	function my_comment($id=null,$offset='0')
	{
		
		$this->load->library('pagination');
		
		if(get_authenticateUserID()!="" && get_authenticateUserID()==$id){
			$cid=get_authenticateUserID();
		}else{
			$cid=$id;
		}
		
		if(!is_numeric($id)){
			$user_id=get_one_userid($id);
			$cid=$user_id;
			
		}
		
	
		$limit = '10';
		$config['uri_segment']='4';
		$config['base_url'] = site_url('user/my_comment/'.$cid);
		$config['total_rows'] = $this->user_model->list_all_comments_count($cid);
		$config['per_page'] = $limit;
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();
		$data['my_comments'] = $this->user_model->get_all_my_comment($cid,$offset, $limit);
		$data['cid']=$cid;
		$data['offset'] = $offset;
		$data['site_setting'] = site_setting();
		$data['numprj']=$this->user_model->get_total_my_project($cid);
		$data['num_my_comments']=$this->user_model->list_all_comments_count($cid);
		$data['num_backers']= $this->home_model->get_total_my_back_project($cid);
		$data['graph_cat'] = get_user_project_catregory_for_graph($cid);
		$data['project_of_the_day'] = project_of_the_day_of_user($cid);
		$data['list_comments']=$this->user_model->list_all_comments($cid,$offset, $limit);
		
		/*echo "<pre>";
		print_r($data['list_comments']);
		die;*/
		$meta = meta_setting();
		$data['site_setting'] = site_setting();
		$this->home_model->select_text();
		$this->template->write('meta_title','My Comment-'. $meta['title'], TRUE);
		$this->template->write('meta_description', $meta['meta_description'], TRUE);
		$this->template->write('meta_keyword', $meta['meta_keyword'], TRUE);
		
		
			if($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1)
			{
				$this->template->set_master_template('iphone/template.php');
				$this->template->write_view('main_content', 'iphone/my_comment', $data, TRUE);
				$this->template->render();
			}
			elseif(($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1)
			{
				$this->template->set_master_template('mobile/template.php');
				$this->template->write_view('main_content', 'mobile/my_comment', $data, TRUE);
				$this->template->render();
			}
			else
			{
				if(!check_user_authentication()) {
				$this->template->write_view('header', 'default/common/header',  $data, TRUE);
				}else
				{
					$this->template->write_view('header', 'default/common/header_login',  $data, TRUE);
				}
				$this->template->write_view('center_content', 'default/user/my_comment', $data, TRUE);
				$this->template->write_view('footer', 'default/common/footer',$data, TRUE);
				$this->template->render();
			}
		
		
		
	}
	
	
	
	//////===user email notification setting
	
	function email_setting($msg='')
	{
		if(!check_user_authentication()) {  redirect('home/login'); } 
		$data['msg']=$msg;	
		$data['error']='';
		$data['site_setting'] = site_setting();
		$meta = meta_setting();
		
		
		$this->home_model->select_text();
		$this->template->write('meta_title', $meta['title'], TRUE);
		$data['user_not']=$this->user_model->get_email_notification($this->session->userdata('user_id'));
		
		$this->template->write('meta_title','Notification-'. $meta['title'], TRUE);
		$this->template->write('meta_description', $meta['meta_description'], TRUE);
		$this->template->write('meta_keyword', $meta['meta_keyword'], TRUE);
		
			if($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1)
			{
				$this->template->set_master_template('iphone/template.php');
				$this->template->write_view('main_content', 'iphone/email_setting', $data, TRUE);
				$this->template->render();
			}
			elseif(($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1)
			{
				$this->template->set_master_template('mobile/template.php');
				$this->template->write_view('main_content', 'mobile/email_setting', $data, TRUE);
				$this->template->render();
			}
			else
			{
				$this->template->write_view('header', 'default/common/header_login',$data, TRUE);
				$this->template->write_view('center_content', 'default/user/notifications', $data, TRUE);
				$this->template->write_view('footer', 'default/common/footer',$data, TRUE);
				$this->template->render();
			}
		
		
		
		if($this->input->post('submit')!=''){
				$this->user_model->user_notification_insert();
				redirect('user/email_setting/success');
		}
	}
	
	
	////////=== one user profile
	
	function profile($uid='',$pid="")
	{
		
	
		if($pid!='')
		{
		
		$project_detail = $this->db->query("select * from project where project_id='".$pid."'");
		$project=$project_detail->row();
		
		
		}
		if(!is_numeric($uid)){
			$user_id=get_one_userid($uid);
			$uid=$user_id;
			
		}

		
		$this->load->library('pagination');
		$limit = '12';
		$config['uri_segment']='3';
		$offset=0;
		$data['cid']=$uid;
		$config['base_url'] = site_url('home/member/');
		$config['total_rows'] = $this->home_model->get_total_my_back_project($uid);
		$config['per_page'] = $limit;		
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();
		
		$data['total_rows'] = $config['total_rows'];
		$data['per_page'] = $limit;
		$data['offset'] = $offset;
		$data['limit'] = $limit;
		
		$data['project'] = $this->home_model->get_dashboard_project();
		
		//$data['project_gallery'] = $this->project_model->get_all_project_gallery($data['project']['project_id']);
		//$data['all_perks'] = $this->project_model->get_all_perks($data['project']['project_id']);
		
		//$data['backers']=my_backed_project(get_authenticateUserID());
		$data['backers'] = $this->home_model->my_backed_project($uid,$offset, $limit);
		$data['user_detail']=get_user_detail($uid);
		
		$data['donation_count'] = $this->home_model->get_donation_count($uid);
		$data['donation'] = $this->home_model->get_donation($uid);
		$data['graph_cat'] = get_user_project_catregory_for_graph($uid);
		$data['project_of_the_day'] = get_current_project($pid);
		
		$data['msg'] = "";
		$data['site_setting'] = site_setting();
		$meta = meta_setting();
		
		$data['numprj']=$this->user_model->get_total_my_project($uid);
		$data['num_my_comments']=$this->user_model->list_all_comments_count($uid);
		$data['num_backers']= $this->home_model->get_total_my_back_project($uid);
		
		
		
		$this->home_model->select_text();
		$this->template->write('meta_title','Dashboard-'. $meta['title'], TRUE);
		$this->template->write('meta_description',$meta['meta_description'], TRUE);
		$this->template->write('meta_keyword', $meta['meta_keyword'], TRUE);
		
		
		if($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1)
		{
		$this->template->set_master_template('iphone/template.php');
		$this->template->write_view('main_content', 'iphone/dashboard', $data, TRUE);
		$this->template->render();
		}
		elseif(($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1)
		{
		$this->template->set_master_template('mobile/template.php');
		$this->template->write_view('main_content', 'mobile/dashboard', $data, TRUE);
		$this->template->render();
		}
		else
		{
		
		if(!check_user_authentication()) {
				$this->template->write_view('header', 'default/common/header',  $data, TRUE);
				}else
				{
					$this->template->write_view('header', 'default/common/header_login',  $data, TRUE);
				}
		$this->template->write_view('center_content', 'default/user/main_dashboard', $data, TRUE);
		$this->template->write_view('footer', 'default/common/footer',$data, TRUE);
		$this->template->render();
		}
	/*echo "<script>parent.$.fn.colorbox.close(); </script>";

		echo "<script>parent.window.location.href='".site_url('user/profile/'.$uid.'/'.$pid)."'</script>";*/
	
		
		
		
	}
	
	
	/////======site all users lists
	
	function profiles($offset=0)
	{	
		
		
		$this->load->library('pagination');
		$limit = '9';
		$config['base_url'] = site_url('user/profiles/');
		
		$config['total_rows'] = $this->user_model->get_total_member();
		$config['per_page'] = $limit;		
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();
		$data['member_list'] = $this->user_model->get_all_members($offset,$limit);
		$data['total_rows'] = $config['total_rows'];
		$data['per_page'] = $limit;
		$data['limit'] = $limit;
		$data['offset'] = $offset;
		
		
		$data['idea']=$this->home_model->get_idea();
		$data['category'] = $this->home_model->get_category();
		$data['gallery']=$this->home_model->get_gallery();
		$data['site_setting'] = site_setting();
		
		$meta = meta_setting();
		$data['searchprj'] = "";
		
		
		$data['header_menu'] = dynamic_menu(0);
		$data['footer_menu'] = dynamic_menu_footer(0);
		$data['right_menu'] = dynamic_menu_right(0);
		
		
		$data['error']="";
		$data['view']="login";
		$data['view']="signup";
		
		$this->home_model->select_text();
		
		$this->template->write('meta_title','Members-'. $meta['title'], TRUE);
		$this->template->write('meta_description','Members-'. $meta['meta_description'], TRUE);
		$this->template->write('meta_keyword','Members-'. $meta['meta_keyword'], TRUE);
		
		$this->template->write_view('header', 'default/header', $data, TRUE);
		$this->template->write_view('main_content', 'default/member_list', $data, TRUE);
		$this->template->write_view('sidebar', 'default/category', $data, TRUE);
		$this->template->write_view('footer', 'default/footer',$data, TRUE);
		$this->template->render();
	}
	
	
	function member_ajax($offset=0)
	{
		$limit = '9';
		$data['total_rows'] = $this->user_model->get_total_member();
		
		$data['per_page'] = $limit;
		$data['offset'] = $offset;
		$data['limit'] = $limit;
		$data['site_setting'] = site_setting();
		$data['member_list'] = $this->user_model->get_all_members($offset, $limit);
		
		$this->load->view('default/member_list_ajax', $data);
	}
	
	
	
	
	
	
	////////////////=================pop up login in any part of site=========================
	
	function login()
	{
		$data['error']="";
		$data['view']="login";
		$data['msg']='';
			
		$this->load->view('default/user_login',$data);	
	}
	
	
	////////////////=================pop up login in any part of site=========================	
	
	function recent_update_user()
	{
		$data['site_setting'] = $this->home_model->select_site_setting();

		$data['donation'] = $this->home_model->get_latest_donations();
		$this->load->view('default/recent_update_user', $data);
	}	
	
	function full_bio_data($id=null,$pid=null)
	{	
		
		//if(!check_user_authentication()) {  redirect('home/login'); } 		  
		
		
		$site_setting=site_setting();
		$user_detail=get_user_detail($id);
		$data['user_detail']=$user_detail;
		$data['user_project_cnt']=count(my_total_project($id));
		$data['user_website']=$this->user_model->get_user_website($user_detail['user_id']);
		$data['num_backers']= $this->user_model->get_my_donations_count();
		$data['current_project']=get_one_project($pid);
		$data['id']=$id;
		$data['last_login']=get_last_login($id);
		
		$this->template->write_view('main_content', 'default/user/user_detail_popup', $data);
		$this->template->render();
	
		
	}
	
	function bio_data($id=null)
	{	
		
		//if(!check_user_authentication()) {  redirect('home/login'); } 		  
		
		
		$site_setting=site_setting();
		$user_detail=get_user_detail($id);
		$data['user_detail']=$user_detail;
		$data['user_website']=$this->user_model->get_user_website($user_detail['user_id']);
		$data['id']=$id;
		$data['last_login']=get_last_login($id);
		$this->template->write_view('main_content', 'default/user/biography', $data);
		$this->template->render();
		
		
	}
	
	function blog($offset=0,$msg='')
	{
	
		 if(!check_user_authentication()) {  redirect('home/login'); } 
		 
		 $uid=get_authenticateUserID();
	
		if($uid=='')
		{
			redirect('user/profiles');
		}
	
		$this->load->library('pagination');
		$limit = '10';
		
		$config['uri_segment']='3';
		$config['base_url'] = base_url().'user/blog/';
		
		
		$config['total_rows'] = $this->user_model->get_user_blog_count();
		
	//print_r($config['total_rows']);
	//die;
		$data['user_blog']=$this->user_model->get_user_blog($offset,$limit);
		$data['blog_category'] = blog_category();
		/*print_r($data['user_blog']);
		die;*/
		
		
		$data['msg']=$msg;
		
	     $data['blog_setting']=blog_setting();
		
		$config['per_page'] = $limit;		
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();
		$data['numprj']=$this->user_model->get_total_my_project();
		$data['num_my_comments']=$this->user_model->get_count_my_comments();
		$data['num_backers']= $this->user_model->get_my_donations_count();
		$data['project'] = $this->home_model->get_dashboard_project();
		
		//print_r($data['page_link']);
		//die;
		$data['site_setting'] = site_setting();
		$data['blog_category']=get_blog_catregory();
		$data['offset']=$offset;
		$data['limit']=$limit;
		
		$meta = meta_setting();
		$this->home_model->select_text();
		$this->template->write('meta_title','Blogs-'. $meta['title'], TRUE);
		$this->template->write('meta_description', $meta['meta_description'], TRUE);
		$this->template->write('meta_keyword', $meta['meta_keyword'], TRUE);
		
		$this->template->write_view('header', 'default/common/header_login',  $data, TRUE);
		$this->template->write_view('center_content', 'default/user/user_blog', $data, TRUE);
		$this->template->write_view('footer', 'default/common/footer',$data, TRUE);
		$this->template->render();
	}
	
	function add_blog()
	{
	   	$this->user_model->blog_insert();
	    $offset=$this->input->post('offset');
	    $limit=$this->input->post('limit');
	    $msg='insert';
	    redirect('user/blog/'.$offset.'/'.$msg);
	}
	function edit_blog()
	{
	   
	   $offset=$this->input->post('offset');
	   $limit=$this->input->post('limit');
	   //print_r($_POST);die();
	   $update_blog=array('blog_title'=>$this->input->post('blog_title'),
	                      'blog_discription'=>$this->input->post('blog_discription'),
						  'blog_category'=>$this->input->post('blog_category'),
						  'publish'=>$this->input->post('publish'),
						  'no_one_comment'=>$this->input->post('no_one_comment'),
						  'user_id'=>$this->session->userdata('user_id'),
						  'status'=>$this->input->post('status'));
			
		//	print_r($update_blog);
			//die;			  
	       $this->db->where('blog_id',$this->input->post('blog_id'));
		   $this->db->update('blogs',$update_blog);
		   $msg='update';		
		   redirect('user/blog/'.$offset.'/'.$msg);
	}
	function delete_blog($id=0,$offset=0)
	{
	    $msg='delete';
		$this->db->delete('blogs',array('blog_id'=>$id));
	    redirect('user/blog/'.$offset.'/'.$msg);
				
	}
	
}
?>