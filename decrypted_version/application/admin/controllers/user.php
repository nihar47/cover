<?php
class User extends CI_Controller {
	function User()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('home_model');
		
	}
	
	function index()
	{
		redirect('user/list_user');
	}
	
	function add_user($limit = '20')
	{
		
		
		$check_rights=$this->home_model->get_rights('list_user');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_username_check');
		$this->form_validation->set_rules('user_name', 'First Name', 'required|alpha');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required|alpha');
		//$this->form_validation->set_rules('city', 'City', 'required');	
	//	$this->form_validation->set_rules('zip_code', 'Zipcode', 'required|numeric|min_length[4]|max_length[8]');
		
	//	$this->form_validation->set_rules('country', 'Country', 'required');
	//	$this->form_validation->set_rules('state', 'State', 'required');
		//$this->form_validation->set_rules('paypal_email', 'Paypal Email', 'required|valid_email');
		
		if($this->input->post('website')!=""){
		$this->form_validation->set_rules('website','Website URL','valid_url');
		}
		
		$this->form_validation->set_rules('facebook_url','Facebook URL','valid_url');
		$this->form_validation->set_rules('twitter_url','Twitter URL','valid_url');
		
		$this->form_validation->set_rules('linkedln_url','Linkedln URL','valid_url');
		$this->form_validation->set_rules('googleplus_url','Googleplus URL','valid_url');
		
		
		$this->form_validation->set_rules('bandcamp_url','BandCamp URL','valid_url');
		$this->form_validation->set_rules('youtube_url','Youtube URL','valid_url');
		$this->form_validation->set_rules('myspace_url','MySpace URL','valid_url');
		
		$data['citylist']=get_city();
		$data['countrylist']=get_country();
		$data['statelist']=get_state();
		$data['website']="";
		$data['user_website']="";
		
		if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();
			}else{
				$data["error"] = "";
			}
			$data["user_id"] = $this->input->post('user_id');
			$data["email"] = $this->input->post('email');
			$data["user_name"] = $this->input->post('user_name');
			$data["last_name"] = $this->input->post('last_name');
			$data["password"] = $this->input->post('password');
			$data["image"] = $this->input->post('image');
			$data['website']= $this->input->post('website');
			$data["address"] = $this->input->post('address');
		//	$data["city"] = $this->input->post('city');
		//	$data["state"] = $this->input->post('state');
		//	$data["country"] = $this->input->post('country');
		//	$data["zip_code"] = $this->input->post('zip_code');
			$data["paypal_email"] = $this->input->post('paypal_email');
			$data["active"] = $this->input->post('active');
			
			
			$data['user_about'] = $this->input->post('user_about');
			//$data['user_occupation'] = $this->input->post('user_occupation');
		//	$data['user_interest'] = $this->input->post('user_interest');
		//	$data['user_skill'] = $this->input->post('user_skill');
			$data['website'] = $this->input->post('website');
			$data['facebook_url'] = $this->input->post('facebook_url');
			$data['twitter_url'] = $this->input->post('twitter_url');
			$data['linkedln_url'] = $this->input->post('linkedln_url');
			$data['googleplus_url'] = $this->input->post('googleplus_url');
			
			$data['bandcamp_url'] = $this->input->post('bandcamp_url');
			$data['youtube_url'] = $this->input->post('youtube_url');
			$data['myspace_url'] = $this->input->post('myspace_url');
			
			$data['site_setting'] = $this->home_model->select_site_setting();
			
			
			
			
			
			if($this->input->post('offset')=="")
			{
				$limit = '10';
				$totalRows = $this->user_model->get_total_user_count();
				$data["offset"] = (int)($totalRows/$limit)*$limit;
			}else{
				$data["offset"] = $this->input->post('offset');
			}
			$this->template->write('title', 'Users', '', TRUE);
			$this->template->write_view('header', 'header', $data, TRUE);
			$this->template->write_view('main_content', 'add_user', $data, TRUE);
			$this->template->write_view('footer', 'footer', '', TRUE);
			$this->template->render();
		}else{
			
			
			$CI =& get_instance();	
				$base_url = front_base_url();
											
				$base_path = base_path();
			
			if($this->input->post('user_id'))
			{
				
				
				
				
				
				
				$this->user_model->user_update();
				
				
				
				/////////////============email===========	
				
				if($this->input->post('active')==1)
				{
				
				$email_template=$this->db->query("select * from `email_template` where task='Admin User Active'");
				$email_temp=$email_template->row();
				
				
				$email_setting=$this->db->query("select * from `email_setting` where email_setting_id='1'");
				$email_set=$email_setting->row();
				
				
				$email_address_from=$email_temp->from_address;
				$email_address_reply=$email_temp->reply_address;
				
				$email_subject=$email_temp->subject;				
				$email_message=$email_temp->message;
				
				$username =$this->input->post('user_name');
				$password = $this->input->post('password');
				$email = $this->input->post('email');
				
				$login_link=$base_url.'home/login';
				
				
				$email_to=$this->input->post('email');
				
			
				$user_not_own=$this->user_model->get_email_notification( $this->input->post('user_id'));
				
				
				
				
				
				$email_message=str_replace('{break}','<br/>',$email_message);
				$email_message=str_replace('{user_name}',$username,$email_message);
				$email_message=str_replace('{password}',$password,$email_message);
				$email_message=str_replace('{email}',$email,$email_message);
				$email_message=str_replace('{login_link}',$login_link,$email_message);
				
				$str=$email_message;
			
				
			
			$this->load->library('email');
				
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
			if(isset($user_not_own->user_alert)) {
				if($user_not_own->user_alert=='1'){
				
				$this->email->from($email_address_from);
				$this->email->reply_to($email_address_reply);
				$this->email->to($email_to);
				$this->email->subject($email_subject);
				$this->email->message($str);
				$this->email->send();
				
				}
				}
				
			}
			if($this->input->post('active')==0)
			{
			
				
			
				$email_template=$this->db->query("select * from `email_template` where task='Admin User Deactivate'");
				$email_temp=$email_template->row();
				
				
				$email_setting=$this->db->query("select * from `email_setting` where email_setting_id='1'");
				$email_set=$email_setting->row();
				
				
				$email_address_from=$email_temp->from_address;
				$email_address_reply=$email_temp->reply_address;
				
				$email_subject=$email_temp->subject;				
				$email_message=$email_temp->message;
				
				$username =$this->input->post('user_name');				
				$email = $this->input->post('email');
				
				$login_link=$base_url.'home/login';
				
				$email_to=$this->input->post('email');
				
				$email_message=str_replace('{break}','<br/>',$email_message);
				$email_message=str_replace('{user_name}',$username,$email_message);			
				$email_message=str_replace('{email}',$email,$email_message);
				
				
				$str=$email_message;
			
				
			
			$this->load->library('email');
				
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
			$user_not_own=$this->user_model->get_email_notification( $this->input->post('user_id'));	
				
				if(isset($user_not_own->user_alert)) {
				if($user_not_own->user_alert=='1'){
							
				$this->email->from($email_address_from);
				$this->email->reply_to($email_address_reply);
				$this->email->to($email_to);
				$this->email->subject($email_subject);
				$this->email->message($str);
				$this->email->send();
			
				}
				}
			
			}
				
				
			/////////////============email===========	
				
				
				
				$msg = "update";
			}else{
				$this->user_model->user_insert();
				
				
				
				/////////////============email===========	
				
			
						
			
				$email_setting=$this->db->query("select * from `email_setting` where email_setting_id='1'");
				$email_set=$email_setting->row();
				
				
				$this->load->library('email');
				
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
			
			
			
			
			//////////=====welcome mail================	
				
				$email_template=$this->db->query("select * from `email_template` where task='Welcome Email'");
				$email_temp=$email_template->row();
				
				
				$email_address_from=$email_temp->from_address;
				$email_address_reply=$email_temp->reply_address;
				
				$email_subject=$email_temp->subject;				
				$email_message=$email_temp->message;
				
				$username =$this->input->post('user_name');				
				$email = $this->input->post('email');
				
				$login_link=$base_url.'home/login';
				
				$email_to=$this->input->post('email');
				
				
				$email_message=str_replace('{break}','<br/>',$email_message);
				$email_message=str_replace('{user_name}',$username,$email_message);			
				$email_message=str_replace('{email}',$email,$email_message);
				
				
				$str=$email_message;
			
				
				
				$this->email->from($email_address_from);
				$this->email->reply_to($email_address_reply);
				$this->email->to($email_to);
				$this->email->subject($email_subject);
				$this->email->message($str);
				$this->email->send();
				
				
				/////////======welcome mail=======
				
				
					//////////=====New User join mail================	
				
				$email_template=$this->db->query("select * from `email_template` where task='New User Join'");
				$email_temp=$email_template->row();
				
				
				$email_address_from=$email_temp->from_address;
				$email_address_reply=$email_temp->reply_address;
				
				$email_subject=$email_temp->subject;				
				$email_message=$email_temp->message;
				
				$username =$this->input->post('user_name');
				$password = $this->input->post('password');
				$email = $this->input->post('email');
				
				$email_to=$this->input->post('email');
				
				$login_link=$base_url.'home/login';
				
				
				$email_message=str_replace('{break}','<br/>',$email_message);
				$email_message=str_replace('{user_name}',$username,$email_message);
				$email_message=str_replace('{password}',$password,$email_message);
				$email_message=str_replace('{email}',$email,$email_message);
				$email_message=str_replace('{login_link}',$login_link,$email_message);
				
				
				$str=$email_message;
			
				
				
				$this->email->from($email_address_from);
				$this->email->reply_to($email_address_reply);
				$this->email->to($email_to);
				$this->email->subject($email_subject);
				$this->email->message($str);
				$this->email->send();
				
				
				/////////======New User join mail=======
				
				
						
				
				
				/////////////============email===========	
				
				
				$msg = "insert";
			}
			$offset = $this->input->post('offset');
			redirect('user/list_user/'.$limit.'/'.$offset.'/'.$msg);
		}				
	}
	
	function edit_user($id=0,$offset=0)
	{
		
		$check_rights=$this->home_model->get_rights('list_user');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		
		
		$one_user = $this->user_model->get_one_user($id);
		$data["website"]="";
		$data["error"] = "";
		$data["user_id"] = $id;
		$data["email"] = $one_user['email'];
		$data["user_name"] = $one_user['user_name'];
		$data["last_name"] = $one_user['last_name'];
		$data["password"] = $one_user['password'];
		$data["image"] = $one_user['image'];
		$data["address"] = $one_user['address'];
		//$data["city"] = $one_user['city'];
		//$data["state"] = $one_user['state'];
		//$data["country"] = $one_user['country'];
		//$data["zip_code"] = $one_user['zip_code'];
		$data["paypal_email"] = $one_user['paypal_email'];
		$data["active"] = $one_user['active'];
		$data['user_website']=get_website($one_user['user_id']);
		//print_r($data['user_website']);die;
		
		
		
		$data['user_about'] =  $one_user['user_about'];
		//$data['user_occupation'] =  $one_user['user_occupation'];
	//	$data['user_interest'] =  $one_user['user_interest'];
	//	$data['user_skill'] =  $one_user['user_skill'];
		//$data['user_website'] = $one_user['user_website']; 
		$data['facebook_url'] = $one_user['facebook_url']; 
		$data['twitter_url'] =  $one_user['twitter_url'];
		$data['linkedln_url'] =  $one_user['linkedln_url'];
		$data['googleplus_url'] = $one_user['googleplus_url'];
		
		
		$data['bandcamp_url'] = $one_user['bandcamp_url'];
		$data['youtube_url'] = $one_user['youtube_url'];
		$data['myspace_url'] = $one_user['myspace_url'];
		
		$data['citylist']=get_city();
		$data['countrylist']=get_country();
		$data['statelist']=get_state();
		
		
		$data['site_setting'] = $this->home_model->select_site_setting();
		
		
		$data["offset"] = $offset;
		$this->template->write('title', 'Users', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'add_user', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}
	
	function delete_user($id=0,$offset=0)
	{
		
		$check_rights=$this->home_model->get_rights('list_user');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		$limit=20;

/////////////============email===========
		$user_detail=$this->db->query("select * from user where  user_id='".$id."'");
		
		$user=$user_detail->row();
		
		
				$email_template=$this->db->query("select * from `email_template` where task='Admin User Delete'");
				$email_temp=$email_template->row();
				
				
				$email_setting=$this->db->query("select * from `email_setting` where email_setting_id='1'");
				$email_set=$email_setting->row();
				
				
				$email_address_from=$email_temp->from_address;
				$email_address_reply=$email_temp->reply_address;
				
				$email_subject=$email_temp->subject;				
				$email_message=$email_temp->message;
				
				$username =$user->user_name;				
				$email_to=$user->email;
				
				
				$email_message=str_replace('{break}','<br/>',$email_message);
				$email_message=str_replace('{user_name}',$username,$email_message);
				
				
				$str=$email_message;
			
				
			
			$this->load->library('email');
				
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
			
			
			
				
				$this->email->from($email_address_from);
				$this->email->reply_to($email_address_reply);
				$this->email->to($email_to);
				$this->email->subject($email_subject);
				$this->email->message($str);
				$this->email->send();
				
			
	
	

/////////////============email===========	
				//log_message('Add User',"By Admin".$this->input->post('user_name'));
		
				//error_log("Add Admin User Gofundme", 1,"jigar.rockersinfo@gmail.com");
		
		
		$this->user_model->delete_user($id);
		
		//$this->db->delete('user',array('user_id'=>$id));
		
		
		
		redirect('user/list_user/'.$limit.'/'.$offset.'/delete');
	}
	
	function list_user($limit=20,$offset=0,$msg='')
	{
		
		$check_rights=$this->home_model->get_rights('list_user');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		
		
		
		$this->load->library('pagination');

		//$limit = '10';
		$config['uri_segment']='4';
		$config['base_url'] = site_url('user/list_user/'.$limit.'/');
		$config['total_rows'] = $this->user_model->get_total_user_count();
		$config['per_page'] = $limit;		
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();
		
		$data['result'] = $this->user_model->get_user_result($offset, $limit);
		$data['msg'] = $msg;
		$data['offset'] = $offset;
		
		
		$data['limit']=$limit;
		$data['option']='';
		$data['keyword']='';
		$data['search_type']='normal';
		
		$data['site_setting'] = $this->home_model->select_site_setting();
		
		$this->template->write('title', 'Users', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'list_user', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}
	
	function search_list_user($limit=20,$option='',$keyword='',$offset=0,$msg='')
	{
		
		$check_rights=$this->home_model->get_rights('list_user');
		
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
	
		$config['uri_segment']='5';
		$config['base_url'] = site_url('user/search_list_user/'.$limit.'/'.$option.'/'.$keyword.'/');
		$config['total_rows'] = $this->user_model->get_total_search_user_count($option,$keyword);
		$config['per_page'] = $limit;		
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();
		
		$data['result'] = $this->user_model->get_search_user_result($option,$keyword,$offset, $limit);
		$data['msg'] = $msg;
		$data['offset'] = $offset;
		
		
		//$data['statelist']=$this->project_category_model->get_state();
		
		$data['site_setting'] = $this->home_model->select_site_setting();
		
		$data['limit']=$limit;
		$data['option']=$option;
		$data['keyword']=$keyword;
		$data['search_type']='search';
		
		$this->template->write('title', 'Search User List', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'list_user', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}
	function user_login($offset=0,$msg='')
	{
		
		$check_rights=$this->home_model->get_rights('user_login');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		
		$this->load->library('pagination');

		$limit = '20';
		
		$config['base_url'] = site_url('user/user_login/');
		$config['total_rows'] = $this->user_model->get_total_userlogin_count();
		$config['per_page'] = $limit;		
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();
		
		$data['msg']=$msg;
		$data['result'] = $this->user_model->get_userlogin_result($offset, $limit);
		$data['offset'] = $offset;
		
		$data['site_setting'] = $this->home_model->select_site_setting();
		
		
		$this->template->write('title', 'User Logins', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'list_user_login', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}
	
	
	
	
	function action_login()
	{
		$check_rights=$this->home_model->get_rights('user_login');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		
		$offset=$this->input->post('offset');
		$action=$this->input->post('action');
		$login_id=$this->input->post('chk');
			
		
		if($action=='delete')
		{		
			foreach($login_id as $id)
			{			
				$this->db->query("delete from user_login where login_id='".$id."'");
			}
			
			redirect('user/user_login/'.$offset.'/delete');
		}	
		
		
		
	}
	
	
	function user_detail($id=0)
	{
		$this->load->library('form_validation');		
		$this->form_validation->set_rules('from_email', 'From Email Address', 'valid_email');
		$this->form_validation->set_rules('subject', 'Subject', 'required');
		$this->form_validation->set_rules('message', 'Message', 'required');
		if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();
				$data["from_email"] = $this->input->post('from_email');
				$data["subject"] = $this->input->post('subject');
				$data["message"] = $this->input->post('message');
			}else{
				$data["error"] = "";
				$data["from_email"] = "";
				$data["subject"] = "";
				$data["message"] = "";
			}
		}else{
			$this->load->library('email');
			$this->email->from($this->input->post('from_email'));
			$this->email->to($this->input->post('email'));
			$this->email->subject($this->input->post('subject'));
			$this->email->message($this->input->post('message'));
			$this->email->send();
			$data["error"] = $this->email->print_debugger();
			$data["from_email"] = "";
			$data["subject"] = "";
			$data["message"] = "";
		}
		
		$data['site_setting'] = $this->home_model->select_site_setting();
		
		$data['one_user'] = $this->user_model->get_one_user($id);
		$this->template->write('title', 'User Details', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'user_detail', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
		
	}
	
	function getstate($countryid='')
	{
		
		$str=' <select tabindex="5" name="state" id="state" class="btn_input" style="text-transform:capitalize;" onblur="getcity(this.value)">';
		
		
			$query=$this->db->query("select * from state where active='1' and country_id='".$countryid."'");
			
			if($query->num_rows()>0)
			{	
				$state=$query->result();
				
				foreach($state as $st)
				{
				
					$str .= "<option value='".$st->state_id."'>".$st->state_name."</option>";
				}
			}
			else
			{
				$str .= "<option value=''>No State</option>";
			}
		
		$str.='</select>';
	
		echo $str;
		die();
		
		
	}
	function getallcity()
	{
		$str2='<select tabindex="5" name="city" id="city" class="btn_input" style="text-transform:capitalize;">';
			
			$query=$this->db->query("select * from city where active='1'");
			
			if($query->num_rows()>0)
			{	
				$city=$query->result();
				
				foreach($city as $ct)
				{
				
					$str2 .= "<option value=''>No City</option><option value='".$ct->city_id."'>".$ct->city_name."</option>";
				}
			}
			
		
		$str2.='</select>';
			
		
		$str2.='</select>';
		
		echo $str2;
		die;
		
	}
	
	function getcity($stateid='')
	{
		
		$str='<select tabindex="5" name="city" id="city" class="btn_input" style="text-transform:capitalize;">';
			
			$query=$this->db->query("select * from city where active='1' and state_id='".$stateid."'");
			
			if($query->num_rows()>0)
			{	
				$city=$query->result();
				
				foreach($city as $ct)
				{
				
					$str .= "<option value='".$ct->city_id."'>".$ct->city_name."</option>";
				}
			}
			else
			{
				$str .= "<option value=''>No City</option>";
			}
		
		$str.='</select>';
	
		echo $str;
		
		die();
	}
	
	function username_check($username)
	{
		$username = $this->user_model->user_unique($username);
		if($username == TRUE)
		{
			return TRUE;
		}
		else
		{
			$this->form_validation->set_message('username_check', 'There is an existing account associated with this Email ID');
			return FALSE;
		}
	}	
	
	function add_user_website(){
		$str=$_POST['web'];
		$user_id=$_POST['user_id'];

	$result=$this->user_model->add_website($user_id,$str);
	//echo $result;die;
	
		if($result!=0){
		$user_website=$this->user_model->get_website($user_id);
		$result="";
		foreach($user_website as $uw){
		$result.='<div class="url field-selected">';
		$result.='<span class="value" id="value">'.$uw['website_name'].'</span>';
		$result.='<span class="remove">';
		$result.='<a href="javascript://" onclick="delete_website('.$uw['website_id'].')">';
		$result.='<span class="icon-x-small cancel-link"></span></a></span></div><div class="clr"></div>';
		}
		echo $result;
		}else{
		echo 'Wesite Not Submit ';
		}
	}
	
	function delete_user_website($user_id=null,$id="")
{
		$result=$this->user_model->delete_website($user_id,$id);
		$user_website=$this->user_model->get_website($user_id);
		$result="";
		foreach($user_website as $uw){
		$result.='<div class="url field-selected">';
		$result.='<span class="value" id="value">'.$uw['website_name'].'</span>';
		$result.='<span class="remove">';
		$result.='<a href="javascript://" onclick="delete_website('.$uw['website_id'].')">';
		$result.='<span class="icon-x-small cancel-link"></span></a></span></div><div class="clr"></div>';

		}
		echo $result;
}

	
	
}
?>