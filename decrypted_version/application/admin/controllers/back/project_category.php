<?php

class Project_category extends CI_Controller {

	function Project_category()

	{

		parent::__construct();

		$this->load->model('project_category_model');

		$this->load->model('user_model');

		$this->load->model('home_model');

		

		

	}

	

	function index()

	{

		

		redirect('Project_category/list_project');

	}

	

	

	///////////////////////==========================================*************************************************==========================

	

	function list_project($limit=20,$offset=0,$msg='')

	{

		

		

		

		$msg=unserialize(urldecode($msg));

		

		$check_rights=$this->home_model->get_rights('list_project');

		

		if(	$check_rights==0) {			

			redirect('home/dashboard/no_rights');	

		}

		

		$this->load->library('pagination');



		

		$config['uri_segment']='4';

		$config['base_url'] = site_url('project_category/list_project/'.$limit.'/');

		$config['total_rows'] = $this->project_category_model->get_total_project_count();

		$config['per_page'] = $limit;		

		$this->pagination->initialize($config);		

		$data['page_link'] = $this->pagination->create_links();

		//echo $data['page_link']; die;

		

		

		$data['result'] = $this->project_category_model->get_project_result($offset, $limit);
	   
		$data['msg'] = $msg;

		$data['offset'] = $offset;

		

		

		$data['statelist']=$this->project_category_model->get_state();

		

		$data['limit']=$limit;

		$data['option']='';

		$data['keyword']='';

		$data['search_type']='normal';

		

		$data['site_setting'] = $this->home_model->select_site_setting();

		

		$this->template->write('title', 'Project List', '', TRUE);

		$this->template->write_view('header', 'header', $data, TRUE);

		$this->template->write_view('main_content', 'list_project', $data, TRUE);

		$this->template->write_view('footer', 'footer', '', TRUE);

		$this->template->render();

	}

	

	

	function search_list_project($limit=20,$option='',$keyword='',$offset=0,$msg='')

	{

		

		$check_rights=$this->home_model->get_rights('list_project');

		

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

		/*echo "test-".$option; 
		echo "test-".$keyword; die;*/

		$keyword=str_replace('"','',str_replace(array("'",",","%","$","&","*","#","@","(",")",":",";",">","<","/"),'',trim($keyword)));

	

		$config['uri_segment']='6';

		$config['base_url'] = site_url('project_category/search_list_project/'.$limit.'/'.$option.'/'.$keyword.'/');

		$config['total_rows'] = $this->project_category_model->get_total_search_project_count($option,$keyword);

		$config['per_page'] = $limit;		

		$this->pagination->initialize($config);		

		$data['page_link'] = $this->pagination->create_links();

		

		$data['result'] = $this->project_category_model->get_search_project_result($option,$keyword,$offset, $limit);

		$data['msg'] = $msg;

		$data['offset'] = $offset;

		

		

		$data['statelist']=$this->project_category_model->get_state();

		

		$data['site_setting'] = $this->home_model->select_site_setting();

		

		$data['limit']=$limit;

		$data['option']=$option;

		$data['keyword']=$keyword;

		$data['search_type']='search';

		

		$this->template->write('title', 'Search Project List', '', TRUE);

		$this->template->write_view('header', 'header', $data, TRUE);

		$this->template->write_view('main_content', 'list_project', $data, TRUE);

		$this->template->write_view('footer', 'footer', '', TRUE);

		$this->template->render();

	}

	

	

	

		function action_project($limit=20)

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

			

			redirect('project_category/list_project/'.$limit.'/'.$offset.'/'.urlencode(serialize($temp)));

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

					

					

						$prj = get_project_user($id);

						$project = $prj;

						$facebook_setting = facebook_setting();

						////// share on facebook 

							

						

						$project_share_link=site_url('projects/'.$prj['url_project_title'].'/'.$prj['project_id']);

						

						if($project['image']!='' && is_file("upload/thumb/".$project['image'])){ 

								$image=base_url().'upload/thumb/'.$project['image'];	  

							} 

							else{ 

							

							

								$get_gallery=get_all_project_gallery($project['project_id']);

								

								$grcnt=1;

								

								if($get_gallery)

								{

									foreach($get_gallery as $glr)

									{

									

										if($glr->project_image!='' && is_file('upload/thumb/'.$glr->project_image) && $grcnt==1 )

										{

											$image=base_url().'upload/thumb/'.$glr->project_image;							

										

										

											$grcnt=2;

										}

									

									}

									if($grcnt==1)

									{							

										$image=base_url().'images/no_img.jpg';

										

									}

								}

								elseif($grcnt==1)

								{							

									$image=base_url().'images/no_img.jpg';

									

								}

								else

								{

									$image=base_url().'images/no_img.jpg';

								}

							

							

						}  

						

				 		

						$msg=$prj['project_title'];

						

							$this->load->library('fb_connect');

							if($prj['fb_uid']!='' and $prj['facebook_wall_post']=='1' and $prj['fb_access_token']!='' and $facebook_setting->facebook_wall_post=='1'){

			//	var_dump($prj);die();

								$fbAccessToken = $prj['fb_access_token'];

								$publishStream = $this->fb_connect->publish($prj['fb_uid'],array(

										'access_token' => $fbAccessToken,

										'link'    =>$project_share_link,

										'picture' => $image,

										'name'    => "Donation on ".$prj['project_title'],

										'description'=> $prj['project_summary']

										)

								);

							}

							

						if($facebook_setting->facebook_user_id!='' and $facebook_setting->facebook_wall_post=='1' and $facebook_setting->facebook_access_token!=''){

				

								$fbAccessToken = $facebook_setting->facebook_access_token;

								$publishStream = $this->fb_connect->publish($facebook_setting->facebook_user_id,array(

										'access_token' => $fbAccessToken,

										'link'    =>$project_share_link,

										'picture' => $image,

										'name'    => "Donation on ".$prj['project_title'],

										'description'=> $prj['project_summary']

										)

								);

						}

						

						

				

						//////facebook end 	

					

					/////////share on twitter 

						

						$project_share_link=site_url('projects/'.$prj['url_project_title'].'/'.$prj['project_id']);

						$twitter_setting = twitter_setting();

						$consumerKey = $twitter_setting->consumer_key;

						$consumerSecret = $twitter_setting->consumer_secret;

						$OAuthToken = $prj['tw_oauth_token'];

						$OAuthSecret = $prj['tw_oauth_token_secret'];

						

				error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);

						

							try

							{

									if($prj['tw_oauth_token']!='0' and $prj['tw_oauth_token_secret']!='0' and $prj['autopost_site']=='1'){

									// Insert your keys/tokens

								

									

									$consumerKey = $twitter_setting->consumer_key;

									$consumerSecret = $twitter_setting->consumer_secret;

									$OAuthToken = $prj['tw_oauth_token'];

									$OAuthSecret = $prj['tw_oauth_token_secret'];

									

									// Full path to twitterOAuth.php (change OAuth to your own path)

									$this->load->library('twitteroauth');

									//require_once($_SERVER['DOCUMENT_ROOT'].'OAuth/twitteroauth.php');

									// create new instance

									$tweet = new TwitterOAuth($consumerKey, $consumerSecret, $OAuthToken, $OAuthSecret);

									

									// Your Message

									$message =date("Y-m-d H:i:s")."New Project - ".$prj['project_title']." Take a look from here - ".$project_share_link;

												

												// Send tweet 

												$tweet->post('statuses/update', array('status' => "$message"));

											}

							}catch(Exception $e)

							{

							return ;

							}

							

							

						try

						{

								if($twitter_setting->tw_oauth_token!='0' and $twitter_setting->tw_oauth_token_secret!='0' and $twitter_setting->autopost_site=='1'){

								// Insert your keys/tokens

							

								

								$consumerKey = $twitter_setting->consumer_key;

								$consumerSecret = $twitter_setting->consumer_secret;

								$OAuthToken = $twitter_setting->tw_oauth_token;

								$OAuthSecret = $twitter_setting->tw_oauth_token_secret;

								

								// Full path to twitterOAuth.php (change OAuth to your own path)

								$this->load->library('twitteroauth');

								//require_once($_SERVER['DOCUMENT_ROOT'].'OAuth/twitteroauth.php');

								// create new instance

								$tweet = new TwitterOAuth($consumerKey, $consumerSecret, $OAuthToken, $OAuthSecret);

								

								// Your Message

								$message =date("Y-m-d H:i:s")."New Project - ".$prj['project_title']." Take a look from here - ".$project_share_link;

											

											// Send tweet 

											$tweet->post('statuses/update', array('status' => "$message"));

										}

								}catch(Exception $e)

								{

								return ;

								}			

								

				

					/////////// twitter end 	

					

				}

				

				else

				{

					$temp[$id]='cannot_active_expired';

				}

				

				

			}

		

			redirect('project_category/list_project/'.$limit.'/'.$offset.'/'.urlencode(serialize($temp)));

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

			

			redirect('project_category/list_project/'.$limit.'/'.$offset.'/'.urlencode(serialize($temp)));

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

			

			redirect('project_category/list_project/'.$limit.'/'.$offset.'/'.urlencode(serialize($temp)));

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

			

			redirect('project_category/list_project/'.$limit.'/'.$offset.'/'.urlencode(serialize($temp)));

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

			

			redirect('project_category/list_project/'.$limit.'/'.$offset.'/'.urlencode(serialize($temp)));

		}

		

		

	}

	

	function make_active($id,$offset=0)

	{

			$temp=array();

				$this->db->query("update project set active=1 where project_id='".$id."'");

				$temp[$id]='active';

			

		redirect('project_category/list_project/'.$offset.'/'.urlencode(serialize($temp)));

	

	}

	

	function make_inactive($id,$offset=0)

	{

			$temp=array();

				$this->db->query("update project set active=0 where project_id='".$id."'");

				$temp[$id]='inactive';

				

				

		redirect('project_category/list_project/'.$offset.'/'.urlencode(serialize($temp)));

	

	}

	

	function change_status($id,$msg='')

	{

	

	$data['id']=$id;

	$data['msg']=$msg;

	$data['status'] = $this->project_category_model->get_project_status();

	$this->load->view('change_status',$data);

	

	

	}

	

	function apply_status()

	{

	$update=$this->project_category_model->apply_status();

	$data['status'] = $this->project_category_model->get_project_status();

	$data['msg']="update";

	

	$data['id']=$this->input->post('project_id');

	

	$this->load->view('change_status',$data);

		

	}

	

	function delete_project($id,$offset=0)

	{

		$check_rights=$this->home_model->get_rights('list_project');

		

		if(	$check_rights==0) {			

			redirect('home/dashboard/no_rights');	

		}

		

		$query = $this->db->get_where('project',array('id'=>$id));

		$prj = $query->row_array();

	

		$temp=array();

		

		if($prj['active']==1 || $prj['active']=='1'){

			

			$temp[$id]='no_delete';

			redirect('project_category/'.$offset.'/'.urlencode(serialize($temp)));

		}

		else{

			

		

			$this->project_category_model->delete_project($id);

			$temp[$id]='delete';

			

			redirect('project_category/'.$offset.'/'.urlencode(serialize($temp)));

		}

		

	}

	



	

	

	

	function create($limit=20,$offset=0,$msg='')

	{

		

		$check_rights=$this->home_model->get_rights('list_project');

		

		if(	$check_rights==0) {			

			redirect('home/dashboard/no_rights');	

		}

		

			

			$this->load->library('form_validation');

			

			$this->form_validation->set_rules('project_title', 'Page Title', 'required');		

			$this->form_validation->set_rules('category_id', 'Category', 'required');

			

						

			$this->form_validation->set_rules('user_type', 'Project Add as a', 'required');

			

			//print_r($_POST);die;

			if($this->input->post('user_type')=='user') {

				

				$this->form_validation->set_rules('user_id', 'Project User', 'required');

				

			}

			

			

			$data['citylist']=get_city();

			$data['countrylist']=get_country();

			$data['statelist']=get_state();



			

			$this->form_validation->set_rules('total_days', 'Total Days', 'required');

				

			$this->form_validation->set_rules('amount', 'Fund Goal', 'required|numeric');

				

		

			//$this->form_validation->set_rules('project_city', 'City', 'required');	

			$this->form_validation->set_rules('project_address', 'Project Address', 'required');	

			//$this->form_validation->set_rules('project_country', 'Country', 'required');	

			

			

			$this->form_validation->set_rules('project_summary', 'Quick Peek', 'required');

			$this->form_validation->set_rules('description', 'Description', 'required');

			

			//$this->form_validation->set_rules('perk_title[]', 'Perk Title', 'required');

			$this->form_validation->set_rules('perk_description[]', 'Perk Description', 'required');

			$this->form_validation->set_rules('perk_amount[]', 'Perk Amount', 'required|numeric');

			$this->form_validation->set_rules('perk_total[]', 'Total Claim', 'required|numeric');

			$this->form_validation->set_rules('est_date[]', 'Estimate Delivery Date', 'required');

			

			

				

			

			$site_setting = $this->home_model->select_site_setting();

			$amount_err = '';		

				

			if($_POST){

				if($this->input->post('amount') < $site_setting['minimum_goal']){

					$amount_err = 'Goal amount should be greater than '.$site_setting['minimum_goal'];

				}

			}	

		

					

			

			



			$Ins='true';













			if($this->form_validation->run() === FALSE  || $Ins=='false' || $amount_err!='')

			{			

				

				

						if(validation_errors() || $amount_err!='')

						{

							if($Ins=='false')

							{

								$error_date='Enter End Date greater than Start Date';

							}

							else

							{

								$error_date='';

							}

							

							$data['error'] = validation_errors().$error_date.$amount_err;

						}else{

							$data['error'] = "";

						}

					

						

						$data['user_id'] = $this->input->post('user_id');

						$data['user_type'] = $this->input->post('user_type');

						

						$data['project_title'] = $this->input->post('project_title');

						$data['category_id']=$this->input->post('category_id');

						

						

						

						$data['total_days'] = $this->input->post('total_days');	

						$data['payment_type'] = $this->input->post('payment_type');	

						

						$data['amount'] = $this->input->post('amount');

						$data['project_address']=$this->input->post('project_address');

					

						/*$data['project_city']=$this->input->post('project_city');

						$data['project_state']=$this->input->post('project_state');

						$data['project_country']=$this->input->post('project_country');*/

						

					

						/*if($_POST){

							$data['countrylist']=get_country();

							$data['statelist']=get_countrywise_state($this->input->post('project_country'));

							$data['citylist']=get_statewise_city($this->input->post('project_state'));

						}else{

							$data['citylist']=get_city();

							$data['countrylist']=get_country();

							$data['statelist']=get_state();

		

						}	*/

						

						

						$data['project_summary']=$this->input->post('project_summary');

						$data['description']=$this->input->post('description');

						$data['p_google_code']=$this->input->post('p_google_code');

						

						$data['projectimagevideoset']=$this->input->post('projectimagevideoset');	

						$data['video_set']=$this->input->post('video_set');

						$data['video']=$this->input->post('video');

						$data['videofile']=$this->input->post('videofile');			

			/***************Code changed for seperation of category and sub category**************/
			
						//$data['categorylist'] = $this->project_category_model->get_category();
						$data['categorylist'] = array();
						$parent =$this->project_category_model->get_category(0);
							
						foreach($parent as $result){
							$children = $this->project_category_model->get_category($result->project_category_id);
							
							 $children_data = array();
							foreach ($children as $child) {
							   
							  $child_array = $this->project_category_model->get_category($child->project_category_id);
								
									$child_data = array();
											foreach($child_array as $c){
												$child_data[] =array(
												'project_category_id' => $c->project_category_id,
												'project_category_name' => $c->project_category_name,
											);
										}
							
								$children_data[] = array(
									'project_category_id' => $child->project_category_id,
									'project_category_name' => $child->project_category_name,
									'child'=>!empty($child_data) ? $child_data : ''
								);
							}
            				$data['categorylist'][] = array(
								'project_category_id' => $result->project_category_id,
								'parent_id' => $result->parent_project_category_id,
								'project_category_name' => $result->project_category_name,
								'children' => !empty($children_data) ? $children_data : ''
							);
							}	
				/*			echo "<pre>";
							print_r($data['categorylist']); die;
				****************************************************************/			
						$data['statuslist']=$this->project_category_model->get_status();

						$data['user_list']=$this->project_category_model->active_user_list();

					 $data['admin_user_list']=$this->project_category_model->admin_list();

						$data['site_setting'] = $this->home_model->select_site_setting();

						$data['msg']= "";	

					$this->template->write('title', 'Create Project', '', TRUE);

					$this->template->write_view('header', 'header', $data, TRUE);

					$this->template->write_view('main_content', 'add_project', $data, TRUE);

					$this->template->write_view('footer', 'footer', '', TRUE);

					$this->template->render();

			}

			else

			{

					$success=$this->project_category_model->create_project();	

					if($success>0)
					{
						$temp[$success]='insert';
						redirect('project_category/list_project/'.$limit.'/'.$offset.'/'.urlencode(serialize($temp)));
					}
					else
					{
						$temp[$success]='update';
						redirect('project_category/list_project/'.$limit.'/'.$offset.'/'.urlencode(serialize($temp)));
					}		

					/*if($success==1)
					{
						redirect('project_category/list_project');
					}
					else
					{
						redirect('project_category/list_project');
					}		*/				
			}				

	}	

	

	

	function edit_project($id)

	{

		

		

		$check_rights=$this->home_model->get_rights('list_project');

		

		if(	$check_rights==0) {			

			redirect('home/dashboard/no_rights');	

		}

		

		

		

		$data['error'] = "";

		

		$project = $this->project_category_model->get_one_project($id);

		//print_r($project);die;

		

		$data['project_id'] = $project['project_id'];

		

		$data['project_title'] = $project['project_title'];

		$data['url_project_title'] = $project['url_project_title'];

		$data['amount'] = $project['amount'];

		$data['category_id']=$project['category_id'];

		

		$data['total_days']=$project['total_days'];

		$data['payment_type'] = $project['payment_type'];

		

		$data['active']=$project['active'];

		$data['active_cnt'] = $project['active_cnt'];

						

		

		$data['start_date']=$project['date_added'];

		$data['end_date']=$project['end_date'];

		

		$data['project_address']=$project['project_address'];

		//$data['project_state']=$project['project_state'];

		//$data['project_country']=$project['project_country'];		

		$data['p_google_code']=$project['p_google_code'];	

		

		$data['projectimagevideoset']=$project['display_page'];

		$data['image']=$project['image'];

		$data['file_up']='';

		$data['video_set']=$project['video_type'];

		$data['video']=$project['video'];

		$data['videofile']=$project['custom_video'];	

		

		

		$data['project_summary']=$project['project_summary'];		

		$data['description']=$project['description'];

				

		

		$data['countrylist']=get_country();

		$data['statelist']=get_countrywise_state($project['project_country']);

		$data['citylist']=get_statewise_city($project['project_state']);

		

		$data['site_setting'] = $this->home_model->select_site_setting();		

		

		//$data['categorylist'] = $this->project_category_model->get_category();
		/************************Code changed for seperation of category and sub category*******************/
						$data['categorylist'] = array();
						$parent =$this->project_category_model->get_category(0);
							
						foreach($parent as $result){
							$children = $this->project_category_model->get_category($result->project_category_id);
							
							 $children_data = array();
							foreach ($children as $child) {
							   
							  $child_array = $this->project_category_model->get_category($child->project_category_id);
								
									$child_data = array();
											foreach($child_array as $c){
												$child_data[] =array(
												'project_category_id' => $c->project_category_id,
												'project_category_name' => $c->project_category_name,
											);
										}
							
								$children_data[] = array(
									'project_category_id' => $child->project_category_id,
									'project_category_name' => $child->project_category_name,
									'child'=>!empty($child_data) ? $child_data : ''
								);
							}
            				$data['categorylist'][] = array(
								'project_category_id' => $result->project_category_id,
								'parent_id' => $result->parent_project_category_id,
								'project_category_name' => $result->project_category_name,
								'children' => !empty($children_data) ? $children_data : ''
							);
							}	
		/**************************************************/
		$data['statuslist']=$this->project_category_model->get_status();

		

		

		

		

		

		$this->template->write('title', 'Edit Project '.$project['project_title'], '', TRUE);

		$this->template->write_view('header', 'header', $data, TRUE);

		$this->template->write_view('main_content', 'edit_project', $data, TRUE);

		$this->template->write_view('footer', 'footer', '', TRUE);

		$this->template->render();

		

		

	}

	

	

	function update_project($id,$limit=20,$offset=0,$msg='')

	{	

		

		$check_rights=$this->home_model->get_rights('list_project');

		

		if(	$check_rights==0) {			

			redirect('home/dashboard/no_rights');	

		}

		

		

		$project = $this->project_category_model->get_one_project($id);

		

		$this->load->library('form_validation');

		

		

		

			$this->form_validation->set_rules('project_title', 'Page Title', 'required');		

			$this->form_validation->set_rules('category_id', 'Category', 'required');

			$this->form_validation->set_rules('amount', 'Fund Goal', 'required|numeric');

			

			//$this->form_validation->set_rules('project_city', 'City', 'required');	

			$this->form_validation->set_rules('project_address', 'Project Address', 'required');	

			//$this->form_validation->set_rules('project_country', 'Country', 'required');	

			$this->form_validation->set_rules('total_days', 'Total Days ', 'required|numeric');	

			

			

			$this->form_validation->set_rules('project_summary', 'Quick Peek', 'required');

			$this->form_validation->set_rules('description', 'Description', 'required');

			

		$site_setting = $this->home_model->select_site_setting();

		$amount_err = '';		

			

		if($_POST){

			if($this->input->post('amount') < $site_setting['minimum_goal']){

				$amount_err = 'Goal amount should be greater than '.$site_setting['minimum_goal'];

			}

		}	

		

		

		if($this->form_validation->run() == FALSE || $amount_err !='' ){			

			if(validation_errors() || $amount_err !='')

			{

				$data['error'] = validation_errors().$amount_err;

			}else{

				$data['error'] = "";

			}

			

			

			

			

					

			

			$data['project_id'] = $this->input->post('project_id');

			$data['project_title'] = $this->input->post('project_title');

			$data['url_project_title'] = $this->input->post('url_project_title');

			$data['amount'] = $this->input->post('amount');

			$data['category_id']=$this->input->post('category_id');

		

			$data['total_days'] = $this->input->post('total_days');	

			

			$data['payment_type'] = $this->input->post('payment_type');	

						

			$data['active']= $this->input->post('active');	

			$data['active_cnt'] = $this->input->post('active_cnt');	

	

			$data['project_address']=$this->input->post('project_address');

			//$data['project_state']=$this->input->post('project_state');

			$data['project_country']=$this->input->post('project_country');

			$data['p_google_code']=$this->input->post('p_google_code');

			

			$data['countrylist']=get_country();

			$data['statelist']=get_countrywise_state($this->input->post('project_country'));

			$data['citylist']=get_statewise_city($this->input->post('project_state'));

			

			

			

			

			$data['projectimagevideoset']=$this->input->post('projectimagevideoset');

			$data['image']=$this->input->post('prev_project_image');

			$data['file_up']=$this->input->post('file_up');

			$data['video_set']=$this->input->post('video_set');

			$data['video']=$this->input->post('video');

			$data['videofile']=$this->input->post('videofile');		

			

			

			

			$data['project_summary']=$this->input->post('project_summary');

			$data['description']=$this->input->post('description');

			

			

			

			

			$data['site_setting'] = $this->home_model->select_site_setting();

			

			

			$data['categorylist']=$this->project_category_model->get_category();

			$data['statuslist']=$this->project_category_model->get_status();

			

	

		

		

		

			$this->template->write('title', 'Edit Project '.$project['project_title'], '', TRUE);

			$this->template->write_view('header', 'header', $data, TRUE);

			$this->template->write_view('main_content', 'edit_project', $data, TRUE);

			$this->template->write_view('footer', 'footer', '', TRUE);

			$this->template->render();

		

		}else{			

								

				$this->project_category_model->project_update();

				//redirect('project_category/list_project');				

				$temp[$this->input->post('project_id')]='update';

				redirect('project_category/list_project/'.$limit.'/'.$offset.'/'.urlencode(serialize($temp)));

			}		

	}

	

	

	

	/////////////============Project Updates  =====================

	

	function updates($id=0, $offset=0,$msg='')

	{

		

		$check_rights=$this->home_model->get_rights('list_project');

		

		if(	$check_rights==0) {			

			redirect('home/dashboard/no_rights');	

		}

		

		$data['msg'] =$msg;

		

		$this->load->library('pagination');

		$limit = '10';

		$config['uri_segment']=4;

		$config['base_url'] = site_url('project_category/updates/'.$id.'/');

		$config['total_rows'] = $this->project_category_model->get_total_updates_count($id);

		$config['per_page'] = $limit;		

		$this->pagination->initialize($config);		

		$data['page_link'] = $this->pagination->create_links();

		$data['updates'] = $this->project_category_model->get_some_updates($id, $offset, $limit);

		

		

		$data['site_setting'] = $this->project_category_model->select_site_setting();

		$data['project_id'] = $id;

		

		$query = $this->db->get_where('project',array('project_id' => $id));

		$prj = $query->row();

		

	

			$data['site_setting'] = $this->home_model->select_site_setting();

	

			$this->template->write('title', $prj->project_title.' Updates', '', TRUE);

			$this->template->write_view('header', 'header',$data, TRUE);

			$this->template->write_view('main_content', 'list_project_updates', $data, TRUE);

			$this->template->write_view('footer', 'footer', '', TRUE);

			$this->template->render();

	}

	

	function delete_update($id=0,$offset=0)

	{

		

		$check_rights=$this->home_model->get_rights('list_project');

		

		if(	$check_rights==0) {			

			redirect('home/dashboard/no_rights');	

		}

		

		$query = $this->db->get_where('updates',array('update_id' => $id));

		$prj = $query->row_array();

		$this->db->delete('updates',array('update_id'=>$id));

		redirect('project_category/updates/'.$prj['project_id'].'/'.$offset.'/delete');

	}

	

	function add_update($offset=0)

	{

		

		$check_rights=$this->home_model->get_rights('list_project');

		

		if(	$check_rights==0) {			

			redirect('home/dashboard/no_rights');	

		}

		

		$CI =& get_instance();

		$base_path = $CI->config->slash_item('base_path');

		

	

		

		

		//redirect('project_category/list_project/'.$limit.'/'.$offset.'/update');

		

		$this->project_category_model->updates_insert();

		

						$prj = get_project_user($this->input->post('project_id'));

						$project = $prj;

						$facebook_setting = facebook_setting();

						////// share on facebook 

							

						

						$project_share_link=site_url('projects/'.$prj['url_project_title'].'/'.$prj['project_id']);

						

							if($project['image']!='' && is_file("upload/thumb/".$project['image'])){ 

								$image=base_url().'upload/thumb/'.$project['image'];	  

							} 

							else{ 

							

							

								$get_gallery=get_all_project_gallery($project['project_id']);

								

								$grcnt=1;

								

								if($get_gallery)

								{

									foreach($get_gallery as $glr)

									{

									

										if($glr->project_image!='' && is_file('upload/thumb/'.$glr->project_image) && $grcnt==1 )

										{

											$image=base_url().'upload/thumb/'.$glr->project_image;							

										

										

											$grcnt=2;

										}

									

									}

								}

								elseif($grcnt==1)

								{							

									$image=base_url().'images/no_img.jpg';

									

								}

								else

								{

									$image=base_url().'images/no_img.jpg';

								}

							

							

						}  

						

				 		

						$msg=$prj['project_title'];

						

							$this->load->library('fb_connect');

							if($prj['fb_uid']!='' and $prj['facebook_wall_post']=='1' and $prj['fb_access_token']!='' and $facebook_setting->facebook_wall_post=='1'){

				

								$fbAccessToken = $prj['fb_access_token'];

								$publishStream = $this->fb_connect->publish($prj['fb_uid'],array(

										'access_token' => $fbAccessToken,

										'link'    =>$project_share_link,

										'picture' => $image,

										'name'    => "New Update on ".$prj['project_title'],

										'description'=>$this->input->post('updates')

										)

								);

							}

							

						if($facebook_setting->facebook_user_id!='' and $facebook_setting->facebook_wall_post=='1' and $facebook_setting->facebook_access_token!=''){

				

								$fbAccessToken = $facebook_setting->facebook_access_token;

								$publishStream = $this->fb_connect->publish($facebook_setting->facebook_user_id,array(

										'access_token' => $fbAccessToken,

										'link'    =>$project_share_link,

										'picture' => $image,

										'name'    => "New Update on ".$prj['project_title'],

										'description'=> $this->input->post('updates')

										)

								);

						}

						

						

				

						//////facebook end 	

					

					/////////share on twitter 

						

						$project_share_link=site_url('projects/'.$prj['url_project_title'].'/'.$prj['project_id']);

						$twitter_setting = twitter_setting();

						$consumerKey = $twitter_setting->consumer_key;

						$consumerSecret = $twitter_setting->consumer_secret;

						$OAuthToken = $prj['tw_oauth_token'];

						$OAuthSecret = $prj['tw_oauth_token_secret'];

						

				error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);

						

							try

							{

									if($prj['tw_oauth_token']!='0' and $prj['tw_oauth_token_secret']!='0' and $prj['autopost_site']=='1'){

									// Insert your keys/tokens

								

									

									$consumerKey = $twitter_setting->consumer_key;

									$consumerSecret = $twitter_setting->consumer_secret;

									$OAuthToken = $prj['tw_oauth_token'];

									$OAuthSecret = $prj['tw_oauth_token_secret'];

									

									// Full path to twitterOAuth.php (change OAuth to your own path)

									$this->load->library('twitteroauth');

									//require_once($_SERVER['DOCUMENT_ROOT'].'OAuth/twitteroauth.php');

									// create new instance

									$tweet = new TwitterOAuth($consumerKey, $consumerSecret, $OAuthToken, $OAuthSecret);

									

									// Your Message

									$message =date("Y-m-d H:i:s")."New Update on - ".$prj['project_title']." Take a look from here - ".$project_share_link;

												

												// Send tweet 

												$tweet->post('statuses/update', array('status' => "$message"));

											}

							}catch(Exception $e)

							{

							return ;

							}

							

							

						try

						{

								if($twitter_setting->tw_oauth_token!='0' and $twitter_setting->tw_oauth_token_secret!='0' and $twitter_setting->autopost_site=='1'){

								// Insert your keys/tokens

							

								

								$consumerKey = $twitter_setting->consumer_key;

								$consumerSecret = $twitter_setting->consumer_secret;

								$OAuthToken = $twitter_setting->tw_oauth_token;

								$OAuthSecret = $twitter_setting->tw_oauth_token_secret;

								

								// Full path to twitterOAuth.php (change OAuth to your own path)

								$this->load->library('twitteroauth');

								//require_once($_SERVER['DOCUMENT_ROOT'].'OAuth/twitteroauth.php');

								// create new instance

								$tweet = new TwitterOAuth($consumerKey, $consumerSecret, $OAuthToken, $OAuthSecret);

								

								// Your Message

								$message =date("Y-m-d H:i:s")."New Update on - ".$prj['project_title']." Take a look from here - ".$project_share_link;

											

											// Send tweet 

											$tweet->post('statuses/update', array('status' => "$message"));

										}

								}catch(Exception $e)

								{

								return ;

								}			

								

				

					/////////// twitter end 	

					

		redirect('project_category/updates/'.$this->input->post('project_id').'/'.$offset.'/insert');

	}

		

	function edit_updates($id,$offset=0)

	{

		

		$check_rights=$this->home_model->get_rights('list_project');

		

		if(	$check_rights==0) {			

			redirect('home/dashboard/no_rights');	

		}

		

		

		

		$CI =& get_instance();

		$base_path = $CI->config->slash_item('base_path');

		

		$query = $this->db->get_where('updates',array('update_id' => $id));

		$prj = $query->row_array();

		

		

			

		

		$up_txt=$this->input->post('upupdates'.$id);

		

		if($up_txt!='')

		{

			

			$up_txt=str_replace(array(',','`'),'',$this->input->post('upupdates'.$id));

		

			$this->db->query("update `updates` set `updates`='".$up_txt."'  where update_id='".$id."'");

		}

		

		redirect('project_category/updates/'.$prj['project_id'].'/'.$offset.'/update');

		

		//redirect('project_category/updates/'.$prj['project_id'].'/'.$offset.'/update');

	}	

	

	/////////////============Project Updates  =====================

	

	

	

	

	//////////////============Project PERK  =====================

	

	

	function add_perk($project_id,$offset=0)

	{

		

		

		$check_rights=$this->home_model->get_rights('list_project');

		

		if(	$check_rights==0) {			

			redirect('home/dashboard/no_rights');	

		}

		

		$site_setting = $this->home_model->select_site_setting();	

		

		$this->load->library('form_validation');

		//$this->form_validation->set_rules('perk_title', 'Perk Title', 'required');

		$this->form_validation->set_rules('perk_description', 'Perk Description', 'required');

		$this->form_validation->set_rules('perk_amount', 'Perk Amount', 'required|numeric');

		$this->form_validation->set_rules('perk_total', 'Total Claim', 'required|numeric');

		

		$amt_err = '';

		if($_POST){

			$amt = $this->input->post('perk_amount');

			if($amt!='' && $amt < $site_setting['minimum_reward_amount']){

				$amt_err = '<p>Perk amount should be minimum '.set_currency($site_setting['minimum_reward_amount']).'</p>';

			}

			if($amt!='' && $amt > $site_setting['maximum_reward_amount']){

				$amt_err = '<p>Perk amount should be maximum '.set_currency($site_setting['maximum_reward_amount']).'</p>';

			}

		}

		

		if($this->form_validation->run() == FALSE || $amt_err!='')

		{

			if(validation_errors() || $amt_err!='')

			{

				$data["error"] = validation_errors().$amt_err;

			}

			else

			{

				$data["error"] = "";

			}

			$data['project_id'] = $project_id;

			

			$data['perk_id']=$this->input->post('perk_id');

			

			$data['perk_title'] = $this->input->post('perk_title');

			$data['perk_description'] = $this->input->post('perk_description');

			$data['perk_amount'] = $this->input->post('perk_amount');

			$data['perk_total'] = $this->input->post('perk_total');

			

			

			$query = $this->db->get_where('project',array('project_id' => $project_id));

			$prj = $query->row();

			

			$data['site_setting'] = $this->home_model->select_site_setting();		

			

			$this->template->write('title', $prj->project_title.' Perks', '', TRUE);

			$this->template->write_view('header', 'header', $data, TRUE);

			$this->template->write_view('main_content', 'add_project_perk', $data, TRUE);

			$this->template->write_view('footer', 'footer', '', TRUE);

			$this->template->render();

			

			

		}else{

			

			

			if($this->input->post('perk_id')!='')

			{

				$this->project_category_model->update_perk($project_id);

				//redirect('project_category/perks/'.$project_id);

				redirect('project_category/perks/'.$project_id.'/'.$offset.'/update');

			}

			else

			{

			

				$this->project_category_model->insert_perk($project_id);

				//redirect('project_category/perks/'.$project_id);

				redirect('project_category/perks/'.$project_id.'/'.$offset.'/insert');

			

			}

		}

	}

	

	function edit_perk($perk_id=0,$offset=0)

	{

		

		$check_rights=$this->home_model->get_rights('list_project');

		

		if(	$check_rights==0) {			

			redirect('home/dashboard/no_rights');	

		}

		

		

		

		

		$data['perk_id'] = $perk_id;		

		$detail=$this->project_category_model->get_one_perk($perk_id);		

		$project_id=$detail['project_id'];	

		

		

		$data["error"] = "";

		$data['project_id'] = $detail['project_id'];

		$data['perk_title'] = $detail['perk_title'];

		$data['perk_description'] = $detail['perk_description'];

		$data['perk_amount'] = $detail['perk_amount'];

		$data['perk_total'] = $detail['perk_total'];

		

		$data['site_setting'] = $this->home_model->select_site_setting();

		

		$query = $this->db->get_where('project',array('project_id' => $project_id));

		$prj = $query->row();

		

		

			$this->template->write('title', $prj->project_title.' Perks', '', TRUE);

			$this->template->write_view('header', 'header', $data, TRUE);

			$this->template->write_view('main_content', 'add_project_perk', $data, TRUE);

			$this->template->write_view('footer', 'footer', '', TRUE);

			$this->template->render();

			

	}

	

	function perks($project_id,$offset=0,$msg='')

	{

		$data['msg'] = $msg;

		$check_rights=$this->home_model->get_rights('list_project');

		

		if(	$check_rights==0) {			

			redirect('home/dashboard/no_rights');	

		}

		

		

		

		$data['project_id'] = $project_id;		

		$data['all_perks'] = $this->project_category_model->get_all_perks($project_id);				

		

		

		$query = $this->db->get_where('project',array('project_id' => $project_id));

		$prj = $query->row();

		

		$data['site_setting'] = $this->home_model->select_site_setting();

		

			$this->template->write('title', $prj->project_title.' Perks', '', TRUE);

			$this->template->write_view('header', 'header', $data, TRUE);

			$this->template->write_view('main_content', 'list_project_perks', $data, TRUE);

			$this->template->write_view('footer', 'footer', '', TRUE);

			$this->template->render();		

			

	}

	

		

	function delete_perk($id=0,$offset=0)

	{

		

		$check_rights=$this->home_model->get_rights('list_project');

		

		if(	$check_rights==0) {			

			redirect('home/dashboard/no_rights');	

		}

		

		

		

		$query = $this->db->get_where('perk',array('perk_id' => $id));

		$prj = $query->row_array();

		$this->db->delete('perk',array('perk_id'=>$id));

		redirect('project_category/perks/'.$prj['project_id'].'/'.$offset.'/delete');

		//redirect('project_category/perks/'.$prj['project_id']);

	}

		

	

	/////////////============Project PERK  =====================

	

	

	

	

	

	

	

	/////////////============Project Donation  =====================

	

	

	function donations($id=0, $offset=0)

	{

		

		

		$check_rights=$this->home_model->get_rights('list_project');

		

		if(	$check_rights==0) {			

			redirect('home/dashboard/no_rights');	

		}

		

		

		

		$this->load->library('pagination');

		

		$limit = '5';

		$config['base_url'] = site_url('project_category/donations/'.$id.'/');

		$config['total_rows'] = $this->project_category_model->get_total_donations_count($id);

		$config['per_page'] = $limit;

				

		$this->pagination->initialize($config);		

		

		$data['page_link'] = $this->pagination->create_links();

		$data['donations'] = $this->project_category_model->get_donations($id, $offset, $limit);

		

		$data['site_setting'] = $this->project_category_model->select_site_setting();

		

		$data['project_id'] = $id;	

		$data['offset'] = $offset;

		

		$query = $this->db->get_where('project',array('project_id' => $id));

		$prj = $query->row();

	

		$this->template->write('title', $prj->project_title.' Donations', '', TRUE);

		$this->template->write_view('header', 'header', $data, TRUE);

		$this->template->write_view('main_content', 'list_project_donation', $data, TRUE);

		$this->template->write_view('footer', 'footer', '', TRUE);

		$this->template->render();

	}

	

	

	

	

	

	/////////////============Project Donation  =====================

	

	

	

	

	

	

	

	

	

	/////////////============Project Gallery  =====================

	

	

	function gallery($id,$offset=0,$msg='')

	{

		$data['msg'] = $msg;

		

		$check_rights=$this->home_model->get_rights('list_project');

		

		if(	$check_rights==0) {			

			redirect('home/dashboard/no_rights');	

		}

		

		

		

		$this->load->library('pagination');

		

		

		$limit = '100';

		$config['base_url'] = site_url('project_category/project_gallery/'.$id);

		$config['total_rows'] = $this->project_category_model->get_total_project_gallery_count($id);

		$config['per_page'] = $limit;

				

		$this->pagination->initialize($config);		

		

		$data['page_link'] = $this->pagination->create_links();

		$data['project_gallery'] = $this->project_category_model->get_project_gallery($id, $offset, $limit);

		

		$data['project_id'] = $id;		

		$data['offset'] = $offset;

		 

		 $data['site_setting'] = $this->home_model->select_site_setting();

		 

		$query = $this->db->get_where('project',array('project_id' => $id));

		$prj = $query->row();

		

		$this->template->write('title', $prj->project_title.' Donations', '', TRUE);

		$this->template->write_view('header', 'header', $data, TRUE);

		$this->template->write_view('main_content', 'list_project_gallery', $data, TRUE);

		$this->template->write_view('footer', 'footer', '', TRUE);

		

		$this->template->render();

	

	}

	

	function delete_project_gallery($id=0,$offset=0)

	{

		

		

		$check_rights=$this->home_model->get_rights('list_project');

		

		if(	$check_rights==0) {			

			redirect('home/dashboard/no_rights');	

		}

		

		

		

		$CI =& get_instance();

		$base_path = $CI->config->slash_item('base_path');

		

		$query = $this->db->get_where('project_gallery',array('project_gallery_id' => $id));

		$prj = $query->row_array();

		

		

			$link1=$base_path.'upload/thumb/'.$prj['project_image'];

			$link2=$base_path.'upload/orig/'.$prj['project_image'];

			

		

			unlink($link1);

			unlink($link2);

			

			

			$this->db->delete('project_gallery',array('project_gallery_id'=>$id));

			//redirect('project_category/gallery/'.$prj['project_id']);

			redirect('project_category/gallery/'.$prj['project_id'].'/'.$offset.'/delete');

		

	}

	

	function add_project_gallery($id='')

	{

		

		$check_rights=$this->home_model->get_rights('list_project');

		

		if(	$check_rights==0) {			

			redirect('home/dashboard/no_rights');	

		}

		

		$data['project_id'] = $id;

				

		$query = $this->db->get_where('project',array('project_id' => $id));

		$prj = $query->row();

		

		$data['site_setting'] = $this->home_model->select_site_setting();

		

		$this->template->write('title', $prj->project_title.' Donations', '', TRUE);

		$this->template->write_view('header', 'header', $data, TRUE);

		$this->template->write_view('main_content', 'add_project_gallery', $data, TRUE);

		$this->template->write_view('footer', 'footer', '', TRUE);

		

		$this->template->render();

		

	}

	

	

	function add_gallery($id,$offset=0)

	{

	

		$check_rights=$this->home_model->get_rights('list_project');

		

		if(	$check_rights==0) {			

			redirect('home/dashboard/no_rights');	

		}

		

		

		$CI =& get_instance();

		$base_path = base_path();

		$image_settings = $this->project_category_model->get_image_setting_data();	

		

			 $project_id=$id;

				

			if($_FILES['file_up']['name']!='')

			{

							

				

				$cnt=1; 

				

				$this->load->library('upload');

				$rand=rand(0,100000);

		

				 for($i=0;$i<count($_FILES['file_up']['name']);$i++)

				 {

				 

					if($_FILES['file_up']['name'][$i]!='')

					{

					

						$_FILES['userfile']['name']    =   $_FILES['file_up']['name'][$i];

						$_FILES['userfile']['type']    =   $_FILES['file_up']['type'][$i];

						$_FILES['userfile']['tmp_name'] =   $_FILES['file_up']['tmp_name'][$i];

						$_FILES['userfile']['error']       =   $_FILES['file_up']['error'][$i];

						$_FILES['userfile']['size']    =   $_FILES['file_up']['size'][$i]; 

						  

								

				   

						/*$config['file_name']     = $rand.'project_'.$i;

						$config['upload_path'] = $base_path.'upload/orig/';					

						$config['allowed_types'] = 'jpg|jpeg|gif|png|bmp';

							  

					  

					   $this->upload->initialize($config);

					 

					 

							if (!$this->upload->do_upload())

							{		

								

							 $error =  $this->upload->display_errors();

							   

							} 

							

								$picture = $this->upload->data();

								

								$this->load->library('image_lib');

								

								

								$this->image_lib->clear();

								

								$this->image_lib->initialize(array(

								'image_library' => 'gd2',

								'source_image' => $base_path.'upload/orig/'.$picture['file_name'],

								'new_image' => $base_path.'upload/thumb/'.$picture['file_name'],

								'maintain_ratio' => FALSE,

								'quality' => '100%',

								'width' => 602,

								'height' => 340

								));

											

											

								if(!$this->image_lib->resize()){

								

										$error = $this->image_lib->display_errors();

										

								}*/

		$rand=rand(0,100000); 

		$files=$_FILES;	

			if(trim($files["userfile"]["tmp_name"]) != "")

					{

						

						if ($files["userfile"]["type"] != "image/jpeg" and $files["userfile"]["type"] != "image/pjpeg" and $files["userfile"]["type"] != "image/png" and $files["userfile"]["type"] != "image/x-png" and $files["userfile"]["type"] != "image/gif") {die('Please upload a .jpg, .png, .gif file');}

						

						if ($files["userfile"]["size"] > 2000000) {die('Sorry, this file is too large.  Please select a .jpg file that is less than 2 MB or try resizing it using a photo editor.');}  //if you have a stronger server, you can probably bump this up a bit.  The resize will shrink the filesize down

						}

						

						if ($files["userfile"]["type"] == "image/jpeg" || $files["userfile"]["type"] == "image/pjpeg"){

							

							$source_img = @imagecreatefromjpeg($files["userfile"]["tmp_name"]); //Create a copy of our image for our thumbnails...

						}

						if ($files["userfile"]["type"] == "image/png" || $files["userfile"]["type"] == "image/x-png"){

							$source_img = @imagecreatefrompng($files["userfile"]["tmp_name"]); 

						}

						if ($files["userfile"]["type"] == "image/gif"){

							$source_img = @imagecreatefromgif($files["userfile"]["tmp_name"]); 

						}	

						

						/*if (!$source_img) {

						echo "could not create image handle";

						exit(0);

						}*/

						$new_w = $image_settings['g_width']; //You can change these to fit the width and height you want

						$new_h = $image_settings['g_height'];

						

						$orig_w = imagesx($source_img);

						$orig_h = imagesy($source_img);

						

						$w_ratio = ($new_w / $orig_w);

						$h_ratio = ($new_h / $orig_h);

						

						

						$crop_w = $new_w;

						$crop_h = $new_h;

						

						$dest_img = imagecreatetruecolor($new_w,$new_h);

						imagecopyresampled($dest_img, $source_img, 0 , 0 , 0, 0, $crop_w, $crop_h, $orig_w, $orig_h);

						

						$type_img = explode('/',$files['userfile']['type']);

						$new_img = 'project_'.$rand.'.'.$type_img[1];

						

						

						if ($files["userfile"]["type"] == "image/jpeg" || $files["userfile"]["type"] == "image/pjpeg"){

							

								if(imagejpeg($dest_img, $base_path."upload/thumb/".$new_img)) {

									imagejpeg($dest_img, $base_path."upload/orig/".$new_img);

									imagedestroy($dest_img);

									imagedestroy($source_img);

								} /*else {

									echo "could not make profile image";

									exit(0);

								}*/

						}

						if ($files["userfile"]["type"] == "image/png" || $files["userfile"]["type"] == "image/x-png"){

								if(imagepng($dest_img, $base_path."upload/thumb/".$new_img)) {

									imagepng($dest_img, $base_path."upload/orig/".$new_img);

									imagedestroy($dest_img);

									imagedestroy($source_img);

								} /*else {

									echo "could not make profile image";

									exit(0);

								}*/

						}

						if ($files["userfile"]["type"] == "image/gif"){

								if(imagegif($dest_img, $base_path."upload/thumb/".$new_img)) {

									imagegif($dest_img, $base_path."upload/orig/".$new_img);

									imagedestroy($dest_img);

									imagedestroy($source_img);

								} /*else {

									echo "could not make profile image";

									exit(0);

								}*/

						}	

							

							$data_gallery=array(

							

							'project_id'=>$project_id,

							'project_image'=>$new_img		

							

							);

							

							

							$this->db->insert('project_gallery',$data_gallery);

						

						

						

						

						}							

					}

		   

				

				}

				

				

				

				redirect('project_category/gallery/'.$project_id.'/'.$offset.'/insert');

				

				//redirect('project_category/gallery/'.$project_id);

				

		

	}

	

	

	/////////////============Project Gallery  =====================

	

	

	

	

	

	

	

	

	

	/////////////============Project Comment  =====================

	

	function comment($id, $offset=0,$msg='')

	{

		

		$check_rights=$this->home_model->get_rights('list_project');

		

		if(	$check_rights==0) {			

			redirect('home/dashboard/no_rights');	

		}

		

		$this->load->library('pagination');

		$limit = '15';

		

		$config['uri_segment']='4';

		$config['base_url'] = site_url('project_category/comment/'.$id.'/');

		$config['total_rows'] = $this->project_category_model->get_total_comments_count($id);

		$config['per_page'] = $limit;		

		$this->pagination->initialize($config);		

		$data['page_link'] = $this->pagination->create_links();

		$data['site_setting'] = $this->project_category_model->select_site_setting();

		$data['project_id'] = $id;

		

		$data['comments'] = $this->project_category_model->get_some_comments($id, $offset, $limit);

		

		$data['error']='';

		$data['offset']=$offset;

		$data['msg']=$msg;

		

		$query = $this->db->get_where('project',array('project_id' => $id));

		$prj = $query->row();

		

		$data['site_setting'] = $this->home_model->select_site_setting();

		

		

		$this->template->write('title', $prj->project_title.' Comments', '', TRUE);

		$this->template->write_view('header', 'header', $data, TRUE);

		$this->template->write_view('main_content', 'list_project_comments', $data, TRUE);

		$this->template->write_view('footer', 'footer', '', TRUE);

		

		$this->template->render();

	}

	

	function edit_comments($id=0)

	{

		

		$check_rights=$this->home_model->get_rights('list_project');

		

		if(	$check_rights==0) {			

			redirect('home/dashboard/no_rights');	

		}

		

		

		

		$query = $this->db->get_where('comment',array('comment_id' => $id));

		$prj = $query->row_array();

		$this->db->where('comment_id',$id);

		$this->db->update('comment',array('comments'=>$this->input->post('up_comments')));

		redirect('project_category/comment/'.$prj['project_id'].'/'.$this->input->post('offset').'/update');

	}

	

	function delete_comments($id=0,$offset=0)

	{

		$check_rights=$this->home_model->get_rights('list_project');

		

		if(	$check_rights==0) {			

			redirect('home/dashboard/no_rights');	

		}

		

		$query = $this->db->get_where('comment',array('comment_id' => $id));

		$prj = $query->row_array();

		$this->db->delete('comment',array('comment_id'=>$id));

		redirect('project_category/comment/'.$prj['project_id'].'/'.$offset.'/delete');

	}

	

	function approve_comment($id=0,$offset=0)

	{

		

		$check_rights=$this->home_model->get_rights('list_project');

		

		if(	$check_rights==0) {			

			redirect('home/dashboard/no_rights');	

		}

		

		

		$query = $this->db->get_where('comment',array('comment_id' => $id));

		$prj = $query->row_array();

		$this->db->where('comment_id',$id);

		$this->db->update('comment',array('status'=>'1'));

		redirect('project_category/comment/'.$prj['project_id'].'/'.$offset.'/approve');

	}

	

	function declined_comment($id=0,$offset=0)

	{

		

		$check_rights=$this->home_model->get_rights('list_project');

		

		if(	$check_rights==0) {			

			redirect('home/dashboard/no_rights');	

		}

		

		$query = $this->db->get_where('comment',array('comment_id' => $id));

		$prj = $query->row_array();

		$this->db->where('comment_id',$id);

		$this->db->update('comment',array('status'=>'0'));

		redirect('project_category/comment/'.$prj['project_id'].'/'.$offset.'/decline');

	}

	

	

		

	

	function reply_comment()

	{

		

		$check_rights=$this->home_model->get_rights('list_project');

		

		if(	$check_rights==0) {			

			redirect('home/dashboard/no_rights');	

		}

		

		

		$this->load->library('form_validation');

		

		

		$this->form_validation->set_rules('comment_id', 'Comments', 'required');

		

			

		if($this->form_validation->run() == FALSE )

		{

			

			if(validation_errors())

			{

				$data['error'] = validation_errors();

			}

		}else{

			

			

			$this->project_category_model->reply_insert();

			$data['error'] = "Reply has been added successfully.";

			

			

			

			

			$project_user=$this->project_category_model->get_one_project($this->input->post('project_id'));

			$project_owner=$this->db->query("select * from user where user_id='".$project_user['user_id']."'");

			$owner=$project_owner->row();

			

			

			$comment_detail=$this->project_category_model->get_single_commnet($this->input->post('comment_id'));			

			$comment_user=$this->project_category_model->get_user_detail($comment_detail['user_id']);	

			

			

			$login_user=$this->project_category_model->get_user_detail($this->session->userdata('user_id'));

			

			

			$query = $this->db->get_where('email_template',array("email_template_id"=>"11"));

			$admin = $query->row_array();

			//echo $admin['from_address'];

			

			$data['site_setting'] = $this->home_model->select_site_setting();	

			

			

			redirect('project_category/comment/'.$this->input->post('project_id').'/'.$this->input->post('offset').'/reply');

					

			

		}

		

			

	

	}

	

		

	

	/////////////============Project Comment  =====================

	

	

	

	

	

	

	/////////////============Project Widgets =====================

	

	function widgets_code($w, $c, $n)

	{

		

		$check_rights=$this->home_model->get_rights('list_project');

		

		if(	$check_rights==0) {			

			redirect('home/dashboard/no_rights');	

		}

		

		

		$data['w'] = $w;

		$data['c'] = $c;

		$data['n'] = $n;

		$this->load->view('widgets_code', $data);

	}

	

	function widgets_page($w, $c, $n)

	{

		

		$check_rights=$this->home_model->get_rights('list_project');

		

		if(	$check_rights==0) {			

			redirect('home/dashboard/no_rights');	

		}

		

		$data['color'] = $c;

		$data['width'] = $w;

		$data['project'] = $this->project_model->get_one_project($n);

		$data['project_gallery'] = $this->project_model->get_all_project_gallery($n);

		

		

		$data['site_setting'] = $this->home_model->select_site_setting();

		

		$this->template->add_css($data['color'].'/fund-'.$data['color'].'.css');

		$this->template->write_view('center_content', 'widgets_page', $data, TRUE);

		$this->template->render();

	}

	

	function widgets($id)

	{

		

		$check_rights=$this->home_model->get_rights('list_project');

		

		if(	$check_rights==0) {			

			redirect('home/dashboard/no_rights');	

		}

		

		$data['pid'] = $id;

		

		

		$query = $this->db->get_where('project',array('project_id' => $id));

		$prj = $query->row();

		

		

		$data['site_setting'] = $this->home_model->select_site_setting();

		

		$this->template->write('title', $prj->project_title.' Widgets', '', TRUE);

		$this->template->write_view('header', 'header', $data, TRUE);

		$this->template->write_view('main_content', 'list_project_widgets', $data, TRUE);

		$this->template->write_view('footer', 'footer', '', TRUE);

		

		$this->template->render();

	}

	

	

	/////////////============Project Widgets =====================

	

	

	

	

	

	

	

	

	///////////////////////==========================================*************JIGAR**********==================================================

	

	

	

	

	

	

	

	

	

	

	

	function add_project_category($limit=20)

	{

		

		$check_rights=$this->home_model->get_rights('list_project_category');

		

		if(	$check_rights==0) {			

			redirect('home/dashboard/no_rights');	

		}

		

		

		$this->load->library('form_validation');

		

		$this->form_validation->set_rules('project_category_name', 'Project Category Name', 'required');

		//$this->form_validation->set_rules('category_color_code', 'Category Color Code', 'required');

		if($this->form_validation->run() == FALSE){			

			if(validation_errors())

			{

				$data["error"] = validation_errors();

			}else{

				$data["error"] = "";

			}

			$data["parent_project_category_id"] = $this->input->post('parent_id');
			
			//$data["sub_parent_category"] = $this->input->post('parent_id');
			
			$data["project_category_id"] = $this->input->post('project_category_id');

			$data["project_category_name"] = $this->input->post('project_category_name');

			$data["category_color_code"] = $this->input->post('category_color_code');

			$data["active"] = $this->input->post('active');

			if($this->input->post('offset')=="")

			{

				$limit = '20';

				$totalRows = $this->project_category_model->get_total_project_category_count();

				$data["offset"] = (int)($totalRows/$limit)*$limit;

			}else{

				$data["offset"] = $this->input->post('offset');

			}

			

			
			//$data['all_parent_category']=$this->project_category_model->get_parent_category();
			$results =$this->project_category_model->get_parent_category(0);
			//echo "<pre>";
			//print_r($results); 
			foreach($results as $result){
			  $children = $this->project_category_model->get_parent_category($result->project_category_id);	
			  //print_r( $children);die;
			    $children_data = array();
					if(!empty($children)){
					 foreach ($children as $child) {
							$children_data[] = array(
								'project_category_id' => $child->project_category_id,
								'project_category_name' => $child->project_category_name,
							);
						}
					}
					 $data['all_parent_category'][] = array(
						'project_category_id' => $result->project_category_id,
						'parent_id' => $result->parent_project_category_id,
						'project_category_name' => $result->project_category_name,
						'children' => $children_data
					);
				}
				
			$data['site_setting'] = $this->home_model->select_site_setting();

			

			$this->template->write('title', 'Project Categories', '', TRUE);

			$this->template->write_view('header', 'header', $data, TRUE);

			$this->template->write_view('main_content', 'add_project_category', $data, TRUE);

			$this->template->write_view('footer', 'footer', '', TRUE);

			$this->template->render();

		}else{
		
		
		

			if($this->input->post('project_category_id'))

			{

				$this->project_category_model->project_category_update();

				$msg = "update";

			}else{

				$this->project_category_model->project_category_insert();

				$msg = "insert";

			}
			
			

			$offset = $this->input->post('offset');

			//redirect('project_category/list_project_category/'.$limit.'/'.$offset.'/'.$msg);
			redirect('project_category/list_project_category/');

		}				

	}

	

	function edit_project_category($id=0,$offset=0)

	{

		$data['parent_category']=$this->project_category_model->get_one_category($id);
      		
  		
//		$data['parent_category']=$this->project_category_model->get_one_category($id);
		if($data['parent_category'][1])
	    	{ 
				$data["parrent_category_name"]=$data['parent_category'][1];
				$data["parrent_category_id"]=$data['parent_category'][2];
			}
         else {
		  			$data["parrent_category_name"]="";
					$data["parrent_category_id"]="";
		      }
       
	
		
		$check_rights=$this->home_model->get_rights('list_project_category');

		

		if(	$check_rights==0) {			

			redirect('home/dashboard/no_rights');	

		}


		
		//$data['all_parent_category']=$this->project_category_model->get_parent_category();
		$results =$this->project_category_model->get_parent_category(0);
			//echo "<pre>";
			//print_r($results); 
			foreach($results as $result){
			  $children = $this->project_category_model->get_parent_category($result->project_category_id);	
			  //print_r( $children);die;
			    $children_data = array();
					if(!empty($children)){
					 foreach ($children as $child) {
							$children_data[] = array(
								'project_category_id' => $child->project_category_id,
								'project_category_name' => $child->project_category_name,
							);
						}
					}
					 $data['all_parent_category'][] = array(
						'project_category_id' => $result->project_category_id,
						'parent_id' => $result->parent_project_category_id,
						'project_category_name' => $result->project_category_name,
						'children' => $children_data
					);
				}
		$one_project_category = $this->project_category_model->get_one_project_category($id);

		$data["error"] = "";

		$data["project_category_id"] = $id;

		$data["project_category_name"] = $one_project_category['project_category_name'];

		$data["category_color_code"] = $one_project_category['category_color_code'];

		$data["active"] = $one_project_category['active'];

		$data["offset"] = $offset;

		

		$data['site_setting'] = $this->home_model->select_site_setting();

		

		$this->template->write('title', 'Project Categories', '', TRUE);

		$this->template->write_view('header', 'header', $data, TRUE);

		$this->template->write_view('main_content', 'add_project_category', $data, TRUE);

		$this->template->write_view('footer', 'footer', '', TRUE);

		$this->template->render();

	}

	

	function delete_project_category($id=0,$offset=0)

	{

		$limit=20;

		$check_rights=$this->home_model->get_rights('list_project_category');

		

		if(	$check_rights==0) {			

			redirect('home/dashboard/no_rights');	

		}

		

		

		$this->db->delete('project_category',array('project_category_id'=>$id));

		redirect('project_category/list_project_category/'.$limit.'/'.$offset.'/delete');

	}

	

	function list_project_category($limit=20,$offset=0,$msg='')

	{

		

		$check_rights=$this->home_model->get_rights('list_project_category');

		

		if(	$check_rights==0) {			

			redirect('home/dashboard/no_rights');	

		}

		

		

		

		$this->load->library('pagination');



		//$limit = '20';

		

		$config['uri_segment']='4';

		$config['base_url'] = site_url('project_category/list_project_category/'.$limit.'/');

		$config['total_rows'] = $this->project_category_model->get_total_project_category_count();

		$config['per_page'] = $limit;		

		$this->pagination->initialize($config);		

		$data['page_link'] = $this->pagination->create_links();

		

		$data['site_setting'] = $this->home_model->select_site_setting();

		$data['limit']=$limit;

		$data['option']='';

		$data['keyword']='';

		$data['search_type']='normal';

		

		

		$data['result'] = $this->project_category_model->get_project_category_result($offset, $limit);
	//	echo "<pre>";	print_r($data['result']); die;
		$data['msg'] = $msg;

		$data['offset'] = $offset;

		$this->template->write('title', 'Project Categories', '', TRUE);

		$this->template->write_view('header', 'header', $data, TRUE);

		$this->template->write_view('main_content', 'list_project_category', $data, TRUE);

		$this->template->write_view('footer', 'footer', '', TRUE);

		$this->template->render();

	}

	

	

	function search_list_project_category($limit=20,$option='',$keyword='',$offset=0,$msg='')

	{

		

		$check_rights=$this->home_model->get_rights('list_project_category');

		

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

		

		//$keyword=str_replace('"','',str_replace(array("'",",","%","$","&","*","#","@","(",")",":",";",">","<","/"),'',trim($keyword)));

	

		$config['uri_segment']='6';

		$config['base_url'] = site_url('project_category/search_list_project_category/'.$limit.'/'.$option.'/'.$keyword.'/');

		$config['total_rows'] = $this->project_category_model->get_total_search_project_category_count($option,$keyword);

		$config['per_page'] = $limit;		

		$this->pagination->initialize($config);		

		$data['page_link'] = $this->pagination->create_links();

		$data['site_setting'] = $this->home_model->select_site_setting();
		

		$data['result'] = $this->project_category_model->search_list_project_category($option,$keyword,$offset, $limit);

		$data['msg'] = $msg;

		$data['offset'] = $offset;

		

		

		$data['statelist']=$this->project_category_model->get_state();

		

		$data['site_setting'] = $this->home_model->select_site_setting();

		

		$data['limit']=$limit;

		$data['option']=$option;

		$data['keyword']=$keyword;

		$data['search_type']='search';

		

		$this->template->write('title', 'Search Project Category', '', TRUE);

		$this->template->write_view('header', 'header', $data, TRUE);

		$this->template->write_view('main_content', 'list_project_category', $data, TRUE);

		$this->template->write_view('footer', 'footer', '', TRUE);

		$this->template->render();

	}

	

	

	

	

	

	/////////////============report spam================

	

	function report_spam($cmid,$offset=0)

	{

		$query = $this->db->query("select * from comment where comment_id='".$cmid."'");

		$prj = $query->row();

		

		$this->project_category_model->report_spam($cmid);

		redirect('project_category/comment/'.$prj->project_id.'/'.$offset.'/reported');

	}

	

	

	/////////////============report spam================

	

	

	

	

	

	

	

	

	

	

	

	//////////////////=====================unused=========================

	

	

	

	

	

	

	function state_project($id='',$offset=0,$msg='')

	{

		

		

		$check_rights=$this->home_model->get_rights('list_project_category');

		

		if(	$check_rights==0) {			

			redirect('home/dashboard/no_rights');	

		}

		

		

		

		$this->load->library('pagination');



		$limit = '15';

		

		$config['base_url'] = site_url('project_category/state_project/'.$id.'/');

		$config['total_rows'] = $this->project_category_model->get_total_state_project_count($id);

		$config['per_page'] = $limit;		

		$this->pagination->initialize($config);		

		$data['page_link'] = $this->pagination->create_links();

		

		$data['result'] = $this->project_category_model->get_state_project_result($id,$offset, $limit);

		$data['msg'] = $msg;

		$data['offset'] = $offset;

		

		

		$data['statelist']=$this->project_category_model->get_state();

		

		$data['site_setting'] = $this->home_model->select_site_setting();

		

		$this->template->write('title', 'Project List', '', TRUE);

		$this->template->write_view('header', 'header', $data, TRUE);

		$this->template->write_view('main_content', 'list_project', $data, TRUE);

		$this->template->write_view('footer', 'footer', '', TRUE);

		$this->template->render();

	}

		

	

	function delete_comment($id=0,$offset=0)

	{

		$check_rights=$this->home_model->get_rights('list_project_category');

		

		if(	$check_rights==0) {			

			redirect('home/dashboard/no_rights');	

		}

		

		$this->db->delete('comment',array('comment_id'=>$id));

		redirect('project_category/comments/'.$offset.'/delete');

	}

	

	function comments($offset=0,$msg='')

	{

		

		$check_rights=$this->home_model->get_rights('list_project_category');

		

		if(	$check_rights==0) {			

			redirect('home/dashboard/no_rights');	

		}

		

		

		$this->load->library('pagination');



		$limit = '15';

		

		$config['base_url'] = site_url('project_category/comments/');

		$config['total_rows'] = $this->project_category_model->get_total_comment_count();

		$config['per_page'] = $limit;		

		$this->pagination->initialize($config);		

		$data['page_link'] = $this->pagination->create_links();

		

		$data['result'] = $this->project_category_model->get_comment_result($offset, $limit);

		$data['msg'] = $msg;

		$data['offset'] = $offset;

		

		$data['site_setting'] = $this->home_model->select_site_setting();

		

		$this->template->write('title', 'Comments', '', TRUE);

		$this->template->write_view('header', 'header', $data, TRUE);

		$this->template->write_view('main_content', 'list_comment', $data, TRUE);

		$this->template->write_view('footer', 'footer', '', TRUE);

		$this->template->render();

	}

	

	function edit_comment($id=0,$offset=0)

	{

		

		$check_rights=$this->home_model->get_rights('list_project_category');

		

		if(	$check_rights==0) {			

			redirect('home/dashboard/no_rights');	

		}

		

		

		

		$one_project_comment = $this->project_category_model->get_one_project_comment($id);

		$data["error"] = "";

		$data["comment_id"] = $id;

		$data['project_title']=$one_project_comment['project_title'];

		

		$data['username']=$one_project_comment['username'];

		$data['comments']=$one_project_comment['comments'];

		$data['status']=$one_project_comment['status'];

		$data["project_category_name"] = $one_project_comment['project_category_name'];

		$data['email']=$one_project_comment['email'];

		

		$data["offset"] = $offset;

		

		

		$data['site_setting'] = $this->home_model->select_site_setting();

		

		$this->template->write('title', 'Edit Comment', '', TRUE);

		$this->template->write_view('header', 'header', $data, TRUE);

		$this->template->write_view('main_content', 'edit_comment', $data, TRUE);

		$this->template->write_view('footer', 'footer', '', TRUE);

		$this->template->render();

	}

	

	function update_comment()

	{

		

		$check_rights=$this->home_model->get_rights('list_project_category');

		

		if(	$check_rights==0) {			

			redirect('home/dashboard/no_rights');	

		}

		

		

		

		

		$this->load->library('form_validation');

		

		$this->form_validation->set_rules('comments', 'Comment', 'required');

		if($this->form_validation->run() == FALSE){			

			if(validation_errors())

			{

				$data["error"] = validation_errors();

			}else{

				$data["error"] = "";

			}

			

		$one_project_comment = $this->project_category_model->get_one_project_comment($this->input->post('comment_id'));

		

		$data["comment_id"] = $this->input->post('comment_id');

		$data['project_title']=$this->input->post('project_title');

		

		$data['username']=$this->input->post('username');

		$data['comments']=$this->input->post('comments');

		$data['status']=$this->input->post('status');

		$data["project_category_name"] =$this->input->post('project_category_name');

		$data['email']=$this->input->post('email');

		

		$data["offset"] = $this->input->post('offset');

		

			if($this->input->post('offset')=="")

			{

				$limit = '5';

				$totalRows = $this->project_category_model->get_total_comment_count();

				$data["offset"] = (int)($totalRows/$limit)*$limit;

			}else{

				$data["offset"] = $this->input->post('offset');

			}

			

			

		$data['site_setting'] = $this->home_model->select_site_setting();		

			

			$this->template->write('title', 'Comments', '', TRUE);

			$this->template->write_view('header', 'header', $data, TRUE);

			$this->template->write_view('main_content', 'edit_comment', $data, TRUE);

			$this->template->write_view('footer', 'footer', '', TRUE);

			$this->template->render();

		}else{

			if($this->input->post('comment_id'))

			{

				$this->project_category_model->comment_update();

				$msg = "Update comment Successful.";

			}

			$offset = $this->input->post('offset');

			redirect('project_category/comments/'.$offset.'/'.$msg);

		}				

	

	}

	

	function ratings($offset=0,$msg='')

	{

		

		$check_rights=$this->home_model->get_rights('list_project_category');

		

		if(	$check_rights==0) {			

			redirect('home/dashboard/no_rights');	

		}

		

		

		

		$this->load->library('pagination');



		$limit = '5';

		

		$config['base_url'] = site_url('project_category/ratings/');

		$config['total_rows'] = $this->project_category_model->get_total_ratings_count();

		$config['per_page'] = $limit;		

		$this->pagination->initialize($config);		

		$data['page_link'] = $this->pagination->create_links();

		

		$data['result'] = $this->project_category_model->get_ratings_result($offset, $limit);

		$data['msg'] = $msg;

		$data['offset'] = $offset;

		

		$data['site_setting'] = $this->home_model->select_site_setting();

		

		$this->template->write('title', 'Ratings', '', TRUE);

		$this->template->write_view('header', 'header', $data, TRUE);

		$this->template->write_view('main_content', 'list_rating', $data, TRUE);

		$this->template->write_view('footer', 'footer', '', TRUE);

		$this->template->render();

	}

	

	/************ Reports ************/

	

	function project_report($limit=20,$offset=0,$msg='')

	{	

		

		$check_rights=$this->home_model->get_rights('list_project');

		

		if(	$check_rights==0) {			

			redirect('home/dashboard/no_rights');	

		}

		

		$this->load->library('pagination');



		

		$config['uri_segment']='4';

		$config['base_url'] = site_url('project_category/list_project/'.$limit.'/');

		$config['total_rows'] = $this->project_category_model->get_total_project_count();

		$config['per_page'] = $limit;		

		$this->pagination->initialize($config);		

		$data['page_link'] = $this->pagination->create_links();

		

		$data['result'] = $this->project_category_model->get_project_result($offset, $limit);

		$data['msg'] = $msg;

		$data['offset'] = $offset;

		

		

		$data['statelist']=$this->project_category_model->get_state();

		

		$data['limit']=$limit;

		$data['option']='';

		$data['keyword']='';

		$data['search_type']='normal';

		

		$data['site_setting'] = $this->home_model->select_site_setting();

		

		$this->template->write('title', 'Project Report', '', TRUE);

		$this->template->write_view('header', 'header', $data, TRUE);

		$this->template->write_view('main_content', 'project_report', $data, TRUE);

		$this->template->write_view('footer', 'footer', '', TRUE);

		$this->template->render();

	

	

	}

	

	

	function search_project_report($limit=20,$option='',$keyword='',$offset=0,$msg='')

	{

		

		$check_rights=$this->home_model->get_rights('list_project');

		

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

		

		if($option !='cat')

		{

		$keyword=str_replace('"','',str_replace(array("'",",","%","$","&","*","#","@","(",")",":",";",">","<","/"),'',trim($keyword)));

	    }

	

		$config['uri_segment']='6';

		$config['base_url'] = site_url('project_category/search_list_project/'.$limit.'/'.$option.'/'.$keyword.'/');

		$config['total_rows'] = $this->project_category_model->get_total_search_project_count($option,$keyword);

		$config['per_page'] = $limit;		

		$this->pagination->initialize($config);		

		$data['page_link'] = $this->pagination->create_links();

		

		$data['result'] = $this->project_category_model->get_search_project_result($option,$keyword,$offset, $limit);

		$data['msg'] = $msg;

		$data['offset'] = $offset;

		

		

		$data['statelist']=$this->project_category_model->get_state();

		

		$data['site_setting'] = $this->home_model->select_site_setting();

		

		$data['limit']=$limit;

		$data['option']=$option;

		$data['keyword']=$keyword;

		$data['search_type']='search';

		

		$this->template->write('title', 'Search Project Report', '', TRUE);

		$this->template->write_view('header', 'header', $data, TRUE);

		$this->template->write_view('main_content', 'project_report', $data, TRUE);

		$this->template->write_view('footer', 'footer', '', TRUE);

		$this->template->render();

	}

	/**************************/

	

	function getstate($countryid='')

	{

		

		$str='<select tabindex="5" name="project_state" id="project_state" class="btn_input" style="text-transform:capitalize;" onblur="getcity(this.value)">';

		

		

			$query=$this->db->query("select * from state where active='1' and country_id='".$countryid."'");

			

			if($query->num_rows()>0)

			{	

				$state=$query->result();

				$str .= "<option value=''>Select State</option>";

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

		$str2='<select tabindex="5" name="project_city" id="project_city" class="btn_input" style="text-transform:capitalize;">';

			

			$query=$this->db->query("select * from city where active='1'");

			

			if($query->num_rows()>0)

			{	

				$city=$query->result();

				$str2 .= "<option value=''>Select City</option>";

				foreach($city as $ct)

				{

				

					$str2 .= "<option value='".$ct->city_id."'>".$ct->city_name."</option>";

				}

			}

			else

			{

				$str2 .= "<option value=''>No City</option>";

			}

		

		

		

		$str2.='</select>';

		

		echo $str2;

		die;

		

	}

	

	function getcity($stateid='')

	{

		

		$str='<select tabindex="5" name="project_city" id="project_city" class="btn_input" style="text-transform:capitalize;">';

			

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

		
	function get_sub_categories(){
		$parent_cat_id = $this->input->post('categoryid');
		$this->load->model('project_category_model');
		$sub_cateories = $this->project_category_model->get_sub_categories($parent_cat_id);
		
		 $alldata['sub_categories'] = $sub_cateories;

		/*foreach ($sub_cateories as $res){
			$alldata[] = array(
				'cat_id' => $res->project_category_id,
				'cat_name' => $res->project_category_name,
				'cat_staus' => $res->active,
				'cat_parent' => $res->parent_project_category_id
			 );
		}*/
		echo json_encode($alldata);
		
		}
	

	

}

?>