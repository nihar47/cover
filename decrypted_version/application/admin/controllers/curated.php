<?php
class Curated extends CI_Controller {
	function Curated()
	{
		parent::__construct();
		$this->load->model('project_category_model');
		$this->load->model('user_model');
		$this->load->model('home_model');
		$this->load->model('curated_model');		
	}
	
	function index()
	{		
		redirect('curated/list_curated');
	}
	
	
	function assign_project($project_id,$limit=20,$offset=0)
	{
		$all_curated=$this->curated_model->get_all_curated_pages();
		
		$data['all_curated']=$all_curated;
		
		$data['project_id']=$project_id;
		
		$data['offset'] = $offset;
		$data['limit']=$limit;
		
		$check_project_assign=$this->curated_model->check_project_assign_to_curated($project_id);
		$data['check_project_assign']=$check_project_assign;
		
		
		$temp=array();
		if($_POST)
		{
			
			$posted_curated_id=$this->input->post('curated_id');
			if($check_project_assign)
			{			
				
				if($posted_curated_id==0 || $posted_curated_id=='')
				{
					$this->db->delete('curated_project',array('project_id'=>$project_id));
				}
				else
				{
					$data_prj=array(
						'curated_id'=>$posted_curated_id
					);
					$this->db->where('project_id',$project_id);
					$this->db->update('curated_project',$data_prj);
				}
								
				
			}
			else
			{
				if($posted_curated_id==0 || $posted_curated_id=='')
				{
					
				}
				else
				{
					$data_prj=array(
						'curated_id'=>$posted_curated_id,
						'project_id'=>$project_id,
						'curated_project_date'=>date('Y-m-d H:i:s')
					);
					
					$this->db->insert('curated_project',$data_prj);
				}
			}
			
			
			
			
			$temp[$project_id]='assigned_curated';	
			echo "<script>parent.window.location.href='".site_url('project_category/list_project/20/0/'.urlencode(serialize($temp)))."'</script>";
		}
		
		
		$this->load->view('assign_project',$data);	
			
		
		
			
	}
	
	function action_project($curated_id,$limit=20)
	{
		$check_rights=$this->home_model->get_rights('list_project');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		
		$offset=$this->input->post('offset');
		$action=$this->input->post('action');
		$project_id=$this->input->post('chk');
		
		
		$temp=array();
		
		
		
		/////////////============email===========	
		
		$CI =& get_instance();	
		$base_url = front_base_url();
		$base_path = $CI->config->slash_item('base_path');
			
					
			$this->load->library('email');
			
			$email_setting=$this->db->query("select * from `email_setting` where email_setting_id='1'");
			$email_set=$email_setting->row();
				
				
				
			///////====smtp====
			
			if($email_set->mailer=='smtp')
			{
			
				$config['protocol']='smtp';  
				$config['smtp_host']=trim($email_set->smtp_host);  
				$config['smtp_port']=trim($email_set->smtp_port);  
				$config['smtp_timeout']='30';  
				$config['smtp_user']=trim($email_set->smtp_email);  
				$config['smtp_pass']=trim($email_set->smtp_password);  
						
			}
			
			/////=====sendmail======
			
			elseif(	$email_set->mailer=='sendmail')
			{	
			
				$config['protocol'] = 'sendmail';
				$config['mailpath'] = trim($email_set->sendmail_path);
				
			}
			
			/////=====php mail default======
			
			else
			{
			
			}
				
				
			$config['wordwrap'] = TRUE;	
			$config['mailtype'] = 'html';
			$config['crlf'] = '\n\n';
			$config['newline'] = '\n\n';
			
			$this->email->initialize($config);

	/////////////============email===========
		
		
		if($action=='delete')
		{	
		
		
		
			foreach($project_id as $id)
			{
				
				
		$project_detail=$this->db->query("select * from project where project_id='".$id."'");
		$project=$project_detail->row();
		
		
		$user_detail=$this->db->query("select * from user where user_id='".$project->user_id."'");
		$user=$user_detail->row();
		
		if($project->active==1 || $project->active=='1'){
				
			$temp[$id]='cannot_delete_active';
		}
		else{
			
		
/////////////============email===========	
				
			$user_not_own=$this->user_model->get_email_notification($project->user_id);
			
			 if(isset($user_not_own->project_alert)) { 
			if($user_not_own->project_alert=='1'){
				
				$email_template=$this->db->query("select * from `email_template` where task='Admin Project Delete Alert'");
				$email_temp=$email_template->row();
				
				
				$email_address_from=$email_temp->from_address;
				$email_address_reply=$email_temp->reply_address;
				
				$email_subject=$email_temp->subject;				
				$email_message=$email_temp->message;
				
				
				
				$project_name=$project->project_title;
				$username =$user->user_name;			
				$email = $user->email;
				
				$email_to=$email;
				
				
				
				$email_message=str_replace('{break}','<br/>',$email_message);
				$email_message=str_replace('{user_name}',$username,$email_message);
				$email_message=str_replace('{project_name}',$project_name,$email_message);
			
				
				$str=$email_message;
			
					
				
				$this->email->from($email_address_from);
				$this->email->reply_to($email_address_reply);
				$this->email->to($email_to);
				$this->email->subject($email_subject);
				$this->email->message($str);
				$this->email->send();

			}
			}
/////////////============email===========
		
		
				
					$this->project_category_model->delete_project($id);
					$temp[$id]='delete';
				}
			}
			
			redirect('curated/projects/'.$curated_id.'/'.$limit.'/'.$offset.'/'.urlencode(serialize($temp)));
		}
		
		if($action=='active')
		{	
			foreach($project_id as $id)
			{
				
				
		$project_detail=$this->db->query("select * from project where project_id='".$id."'");
		$project=$project_detail->row();
		
		
		$user_detail=$this->db->query("select * from user where user_id='".$project->user_id."'");
		$user=$user_detail->row();
		
		
		
				if(strtotime($project->end_date)>strtotime(date('Y-m-d')))
				{
				
		
		
		
					/////////////============email===========	
						$user_not_own=$this->user_model->get_email_notification($project->user_id);
			
					 if(isset($user_not_own->project_alert)) { 
			
			if($user_not_own->project_alert=='1'){
				
		
				$email_template=$this->db->query("select * from `email_template` where task='Admin Project Activate Alert'");
				$email_temp=$email_template->row();
				
				
				$email_address_from=$email_temp->from_address;
				$email_address_reply=$email_temp->reply_address;
				
				$email_subject=$email_temp->subject;				
				$email_message=$email_temp->message;
				
				
				
				$project_name=$project->project_title;
				$username =$user->user_name;			
				$email = $user->email;
				
			 	$email_to=$email;
				
				$project_page_link=front_base_url().'projects/'.$project->url_project_title.'/'.$project->project_id;
				
				$email_message=str_replace('{break}','<br/>',$email_message);
				$email_message=str_replace('{user_name}',$username,$email_message);
				$email_message=str_replace('{project_name}',$project_name,$email_message);
				$email_message=str_replace('{project_page_link}',$project_page_link,$email_message);			
				
				$str=$email_message;
				
				$this->email->from($email_address_from);
				$this->email->reply_to($email_address_reply);
				$this->email->to($email_to);
				$this->email->subject($email_subject);
				$this->email->message($str);
				$this->email->send();

			}
			
			}
					/////////////============email===========

		
					if($project->active_cnt==0)
					{
							$total_days=$project->total_days;					
					
						$this->db->query("update project set end_date ='".date('Y-m-d H:i:s',strtotime("+".$total_days." days"))."' ,date_added ='".date('Y-m-d H:i:s')."' , active_cnt=1, active=1 where project_id='".$id."'");	
							
					}
					else {
					
						$this->db->query("update project set active=1 where project_id='".$id."'");				
					}
					
					$temp[$id]='active';
				
				}
				
				else
				{
					$temp[$id]='cannot_active_expired';
				}
				
				
			}
		
			redirect('curated/projects/'.$curated_id.'/'.$limit.'/'.$offset.'/'.urlencode(serialize($temp)));
		}
		
		if($action=='inactive')
		{
			foreach($project_id as $id)
			{
				
				
		$project_detail=$this->db->query("select * from project where project_id='".$id."'");
		$project=$project_detail->row();
		
		
		$user_detail=$this->db->query("select * from user where user_id='".$project->user_id."'");
		$user=$user_detail->row();
		
		
/////////////============email===========	
			$user_not_own=$this->user_model->get_email_notification($project->user_id);
			
			
			
			 if(isset($user_not_own->project_alert)) { 
			
			
			
			
			if($user_not_own->project_alert=='1'){
				
		
				$email_template=$this->db->query("select * from `email_template` where task='Admin Project Inctivate Alert'");
				$email_temp=$email_template->row();
				
				
				$email_address_from=$email_temp->from_address;
				$email_address_reply=$email_temp->reply_address;
				
				$email_subject=$email_temp->subject;				
				$email_message=$email_temp->message;
				
				
				
				$project_name=$project->project_title;
				$username =$user->user_name;			
				$email = $user->email;
				
			 	$email_to=$email;				
				
				
				$email_message=str_replace('{break}','<br/>',$email_message);
				$email_message=str_replace('{user_name}',$username,$email_message);
				$email_message=str_replace('{project_name}',$project_name,$email_message);
						
				
				$str=$email_message;
				
				$this->email->from($email_address_from);
				$this->email->reply_to($email_address_reply);
				$this->email->to($email_to);
				$this->email->subject($email_subject);
				$this->email->message($str);
				$this->email->send();

			}
			
			}
/////////////============email===========
				
				
				
				
				$this->db->query("update project set active=0, is_featured='0' where project_id='".$id."'");		
				$temp[$id]='inactive';	
			}
			
			redirect('curated/projects/'.$curated_id.'/'.$limit.'/'.$offset.'/'.urlencode(serialize($temp)));
		}
		
		if($action=='feature')
		{	
			foreach($project_id as $id)
			{
				
				
		$project_detail=$this->db->query("select * from project where project_id='".$id."'");
		$project=$project_detail->row();
		$total_days=$project->total_days;		
				if($project->active_cnt==0)
				{
					$this->db->query("update project set end_date ='".date('Y-m-d H:i:s',strtotime("+".$total_days." days"))."' ,date_added ='".date('Y-m-d H:i:s')."' , active_cnt=1, active=1,is_featured='1' where project_id='".$id."'");	
					$temp[$id]='set_featured_active';
					
				}else{	
					$this->db->query("update project set is_featured='1',active=1  where project_id='".$id."'");	
					$temp[$id]='feature';			
					
				}	
				
			}
			
			redirect('curated/projects/'.$curated_id.'/'.$limit.'/'.$offset.'/'.urlencode(serialize($temp)));
		}
		
		
		if($action=='not_feature')
		{	
			foreach($project_id as $id)
			{
				
				
		$project_detail=$this->db->query("select * from project where project_id='".$id."'");
		$project=$project_detail->row();
		
					
				
				$this->db->query("update project set is_featured='0' where project_id='".$id."'");		
				$temp[$id]='not_feature';		
			}
			
			redirect('curated/projects/'.$curated_id.'/'.$limit.'/'.$offset.'/'.urlencode(serialize($temp)));
		}
		
		
		if($action=='declined')
		{	
			foreach($project_id as $id)
			{
				
				
		$project_detail=$this->db->query("select * from project where project_id='".$id."'");
		$project=$project_detail->row();
		
					
				
				$this->db->query("update project set active='2' where project_id='".$id."'");
				$temp[$id]='declined';				
			}
			
			redirect('curated/projects/'.$curated_id.'/'.$limit.'/'.$offset.'/'.urlencode(serialize($temp)));
		}
		
		
	}
	
	
	function projects($curated_id,$limit=20,$offset=0,$msg='')
	{
		
		$msg=unserialize(urldecode($msg));
		
		$check_rights=$this->home_model->get_rights('list_curated');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		
		if($curated_id=='' || $curated_id==0)
		{
			redirect('curated/list_curated');
		}
		
		$curated_detail = $this->curated_model->get_one_curated($curated_id);
		
		if(!$curated_detail)
		{
			redirect('curated/list_curated');
		}
		
		
		
		$this->load->library('pagination');

		
		$config['uri_segment']='5';
		$config['base_url'] = site_url('curated/projects/'.$curated_id.'/'.$limit);
		$config['total_rows'] = $this->curated_model->get_total_curated_project_count($curated_id);
		$config['per_page'] = $limit;		
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();		
		$data['site_setting'] = $this->home_model->select_site_setting();		
		$data['result'] = $this->curated_model->get_curated_project_result($curated_id,$offset, $limit);
		
		
		$data['curated_id']=$curated_id;
		$data['msg'] = $msg;
		$data['offset'] = $offset;	
		$data['limit']=$limit;
		$data['option']='';
		$data['keyword']='';
		$data['search_type']='normal';
		
		$this->template->write('title', 'Curated : '.$curated_detail['curated_title'], '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'list_curated_project', $data, TRUE);
		$this->template->write_view('footer', 'footer', $data, TRUE);
		$this->template->render();
	}
	
	
	function search_projects($curated_id,$limit=20,$option='',$keyword='',$offset=0,$msg='')
	{
		
		$msg=unserialize(urldecode($msg));
		
		$check_rights=$this->home_model->get_rights('list_curated');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		
		if($curated_id=='' || $curated_id==0)
		{
			redirect('curated/list_curated');
		}
		
		$curated_detail = $this->curated_model->get_one_curated($curated_id);
		
		if(!$curated_detail)
		{
			redirect('curated/list_curated');
		}
		
		
		
		$this->load->library('pagination');

		
		if($_POST)
		{		
			$option=$this->input->post('option');
			$keyword=$this->input->post('keyword');
		}
		else
		{
			$option=$option;
			$keyword=$keyword;			
		}
		
		$keyword=str_replace('"','',str_replace(array("'",",","%","$","&","*","#","(",")",":",";",">","<","/"),'',trim($keyword)));
	
		$config['uri_segment']='7';
		
		$config['base_url'] = site_url('curated/search_projects/'.$curated_id.'/'.$limit.'/'.$option.'/'.$keyword.'/');
		$config['total_rows'] = $this->curated_model->get_total_search_curated_project_count($curated_id,$option,$keyword);
		$config['per_page'] = $limit;		
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();		
		$data['site_setting'] = $this->home_model->select_site_setting();		
		$data['result'] = $this->curated_model->get_search_curated_project_result($curated_id,$option,$keyword,$offset, $limit);
		
		
		$data['curated_id']=$curated_id;
		$data['msg'] = $msg;
		$data['offset'] = $offset;	
		$data['limit']=$limit;
		$data['option']=$option;
		$data['keyword']=$keyword;
		$data['search_type']='search';
		
		$this->template->write('title', 'Curated : '.$curated_detail['curated_title'], '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'list_curated_project', $data, TRUE);
		$this->template->write_view('footer', 'footer', $data, TRUE);
		$this->template->render();
	}
	
	
	function list_curated($limit=20,$offset=0,$msg='')
	{
		
		$check_rights=$this->home_model->get_rights('list_curated');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		
		
		$this->load->library('pagination');

		
		
		$config['base_url'] = site_url('curated/list_curated/'.$limit);
		$config['total_rows'] = $this->curated_model->get_total_curated_count();
		$config['per_page'] = $limit;		
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();		
		$data['site_setting'] = $this->home_model->select_site_setting();		
		$data['result'] = $this->curated_model->get_curated_result($offset, $limit);
		
		
		$data['msg'] = $msg;
		$data['offset'] = $offset;	
		$data['limit']=$limit;
		$data['option']='';
		$data['keyword']='';
		$data['search_type']='normal';
		
		$this->template->write('title', 'Curated', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'list_curated', $data, TRUE);
		$this->template->write_view('footer', 'footer', $data, TRUE);
		$this->template->render();
	}
	
	
	function search_curated($limit=20,$option='',$keyword='',$offset=0,$msg='')
	{
		
		$check_rights=$this->home_model->get_rights('list_curated');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		
		
		$this->load->library('pagination');

		if($_POST)
		{		
			$option=$this->input->post('option');
			$keyword=$this->input->post('keyword');
		}
		else
		{
			$option=$option;
			$keyword=$keyword;			
		}
		
		$keyword=str_replace('"','',str_replace(array("'",",","%","$","&","*","#","(",")",":",";",">","<","/"),'',trim($keyword)));
	
		$config['uri_segment']='6';
		
		
		$config['base_url'] = site_url('curated/search_curated/'.$limit.'/'.$option.'/'.$keyword.'/');
		$config['total_rows'] = $this->curated_model->get_total_search_curated_count($option,$keyword);
		$config['per_page'] = $limit;		
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();		
		$data['site_setting'] = $this->home_model->select_site_setting();		
		$data['result'] = $this->curated_model->get_search_curated_result($option,$keyword,$offset, $limit);
		
		
		$data['msg'] = $msg;
		$data['offset'] = $offset;		
		$data['limit']=$limit;
		$data['option']=$option;
		$data['keyword']=$keyword;
		$data['search_type']='search';
		
		$this->template->write('title', 'Search Curated', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'list_curated', $data, TRUE);
		$this->template->write_view('footer', 'footer', $data, TRUE);
		$this->template->render();
	}
	
	function action_curated()
	{
		
		$offset=$this->input->post('offset');
		$limit=$this->input->post('limit');
		$action=$this->input->post('action');
		$curated_id=$this->input->post('chk');
		$search_type=$this->input->post('search_type');
		
		$option=$this->input->post('option');
		$keyword=$this->input->post('keyword');
		
		$red_link='list_curated/'.$limit;
		
		if($search_type=='search')
		{
			$red_link='search_curated/'.$limit.'/'.$option.'/'.$keyword;
		}
		
		
		if($action=='delete')
		{	
			foreach($curated_id as $id)
			{			
				/////
				
					$CI =& get_instance();
					$base_path =base_path();
		
					$chk_updates=$this->db->query("select * from curated where curated_id='".$id."'");
			
					if($chk_updates->num_rows()>0)
					{
						$cat=$chk_updates->row();
						
						
						
						
						/////////====check for curated project
						
						
						$check_curate_project=$this->db->query("select * from curated_project where curated_id='".$id."'");
						
						if($check_curate_project->num_rows()>0)
						{
							$this->db->delete('curated_project',array('curated_id'=>$id));
						}
						
						/////////====check for project
				
				
				
						if(is_file($base_path.'upload/curated/'.$cat->curated_image)) 
						{
						
							if($cat->curated_image!='no_img.jpg')
							{
								$link1=$base_path.'upload/curated/'.$cat->curated_image;
								unlink($link1);
							}
						
						}
						if(is_file($base_path.'upload/curated_thumb/'.$cat->curated_image)) 
						{
						
							if($cat->curated_image!='no_img.jpg')
							{
								$link2=$base_path.'upload/curated_thumb/'.$cat->curated_image;
								unlink($link2);
							}
						
						}
			
			
						$this->db->delete('curated',array('curated_id'=>$id));
			
			
					}
				
				/////
				
			}
			
			redirect('curated/'.$red_link.'/'.$offset.'/delete');
		}
		
		if($action=='active')
		{	
			foreach($curated_id as $id)
			{			
				$this->db->where('curated_id',$id);
				$this->db->update('curated',array('curated_active'=>1));			
			}
			
			redirect('curated/'.$red_link.'/'.$offset.'/active');
		}
		
		if($action=='inactive')
		{	
			foreach($curated_id as $id)
			{			
				$this->db->where('curated_id',$id);
				$this->db->update('curated',array('curated_active'=>0));			
			}
			
			redirect('curated/'.$red_link.'/'.$offset.'/inactive');
		}
		
		
		
	}
	
	
	function add_curated()
	{
		
		$check_rights=$this->home_model->get_rights('list_curated');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		$data["projects"] = $this->curated_model->get_all_project();
		
		
		
		$this->form_validation->set_rules('curated_title', 'Curated Name', 'required|alpha_numeric_space');
		$this->form_validation->set_rules('curated_link', 'Curated Link', 'required');
		
		
		if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();
			}else{
				$data["error"] = "";
			}
			$data["curated_id"] = $this->input->post('curated_id');
			//$data["user_id"] = $this->input->post('user_id');
			$data["curated_title"] = $this->input->post('curated_title');
			$data["curated_link"] = $this->input->post('curated_link');
			//$data["curated_description"] = $this->input->post('curated_description');
			$data["curated_active"] = $this->input->post('curated_active');			
			$data["curated_image"] = $this->input->post('photo');
			$data["c_project_id"] = $this->input->post('c_project_id');
			if(empty($data["c_project_id"])) {
				$data["c_project_id"] = array('0'=>'');
			}
			
			
			if($this->input->post('offset')=="")
			{
				$limit = '20';
				$totalRows = $this->curated_model->get_total_curated_count();
				$data["offset"] = (int)($totalRows/$limit)*$limit;
			}else{
				$data["offset"] = $this->input->post('offset');
			}
			
			
			$data['site_setting'] = $this->home_model->select_site_setting();
			
			$this->template->write('title', 'Curated', '', TRUE);
			$this->template->write_view('header', 'header', $data, TRUE);
			$this->template->write_view('main_content', 'add_curated', $data, TRUE);
			$this->template->write_view('footer', 'footer', $data, TRUE);
			$this->template->render();
		}else{
		
			
			if($this->input->post('curated_id'))
			{
				$this->curated_model->curated_update();
				$msg = "update";
			}else{
			
				$this->curated_model->curated_insert();
				$msg = "insert";
			}
			$offset = $this->input->post('offset');
			redirect('curated/list_curated/20/'.$offset.'/'.$msg);
		}				
	}
	
	function edit_curated($id=0,$offset=0)
	{
		
		$check_rights=$this->home_model->get_rights('list_curated');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		
		$data["projects"] = $this->curated_model->get_all_project();
		
		
		$one_curated = $this->curated_model->get_one_curated($id);
		$data["error"] = "";
		
		$content=$one_curated['curated_description'];
		//$content=str_replace('KSYDOU','"',$content);
		//$content=str_replace('KSYSING',"'",$content);
		
		
			$data["curated_id"] = $id;
			//$data["user_id"] = $one_curated['user_id'];
			$data["curated_title"] = $one_curated['curated_title'];
			$data["curated_link"] = $one_curated['curated_link'];
			$data["curated_description"] = $content;
			$data["curated_active"] = $one_curated['curated_active'];			
			$data["curated_image"] = $one_curated['curated_image'];				
			$data["offset"] = $offset;		
			$data['site_setting'] = $this->home_model->select_site_setting();
			
			$curated_project_id = $this->curated_model->get_curated_project_result($id,0,0);
			
			if($curated_project_id){
				foreach($curated_project_id as $id){
					$data['c_project_id'][] = $id['project_id']; 
				}
			} else {
				$data["c_project_id"] = array('0'=>'');
			}
			
		                        
                        
		$this->template->write('title', 'Edit Curated', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'add_curated', $data, TRUE);
		$this->template->write_view('footer', 'footer', $data, TRUE);
		$this->template->render();
	}
	
	
	
	
}

?>