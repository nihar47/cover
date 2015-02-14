<?php 
class Friends extends ROCKERS_Controller{

  /*
	Function name :Invites()
	Description :Its Default Constuctor which called when invites object initialzie.its load necesary models
  */

  	function Friends()
	{
		parent::__construct();		
		$this->load->model('home_model');
	}
	
	function following($user_id='')
	{
		
		if(!check_user_authentication()) {  redirect('home/login'); } 
		
		$check_user = get_user_detail($user_id);
		if(!$check_user)
		{
			redirect('home');
		}
			
		if($user_id == '')
		{
			redirect('friends');
		}
		$data['my_following'] = userfollowing($user_id);
		
		$meta_setting=meta_setting();
		$site_setting=site_setting();		
		$data['site_setting']=$site_setting;
		$data['user_info']='';
		$data['select']='sel_following';	
	
		$pageTitle=$site_setting['site_name'].' / following / '.$meta_setting['title'];
		$metaDescription=$site_setting['site_name'].' / following / '.$meta_setting['meta_description'];
		$metaKeyword=$site_setting['site_name'].' / following / '.$meta_setting['meta_keyword'];
		
		$this->template->write('meta_title',$pageTitle,TRUE);
		$this->template->write('meta_description',$metaDescription,TRUE);
		$this->template->write('meta_keyword',$metaKeyword,TRUE);
		
		if($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1)
		{
				$this->template->set_master_template('iphone/template.php');
				$this->template->write_view('main_content', 'iphone/invites/invitefacebook', $data, TRUE);
				$this->template->render();
		}
		elseif(($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1)
		{
				$this->template->set_master_template('mobile/template.php');
				$this->template->write_view('main_content', 'mobile/invites/invitefacebook', $data, TRUE);
				$this->template->render();
		}
		else
		{
				$this->template->write_view('header', 'default/common/header_login', $data, TRUE);
				$this->template->write_view('main_content', 'default/invites/following', $data, TRUE);
				$this->template->write_view('footer', 'default/common/footer',$data, TRUE);
				$this->template->render();
		}
		
	}
	
	function followers($user_id='')
	{
	
		if(!check_user_authentication()) {  redirect('home/login'); } 
		
		$check_user = get_user_detail($user_id);
		if(!$check_user)
		{
			redirect('home');
		}
		if($user_id == '')
		{
			redirect('friends');
		}	
		$data['my_follower'] = userfollowers($user_id);
		
		$meta_setting=meta_setting();
		$site_setting=site_setting();		
		$data['site_setting']=$site_setting;
		$data['user_info']='';
		$data['select']='sel_followers';	
	
		$pageTitle=$site_setting['site_name'].' / following / '.$meta_setting['title'];
		$metaDescription=$site_setting['site_name'].' / following / '.$meta_setting['meta_description'];
		$metaKeyword=$site_setting['site_name'].' / following / '.$meta_setting['meta_keyword'];
		
		$this->template->write('meta_title',$pageTitle,TRUE);
		$this->template->write('meta_description',$metaDescription,TRUE);
		$this->template->write('meta_keyword',$metaKeyword,TRUE);
		
		if($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1)
		{
				$this->template->set_master_template('iphone/template.php');
				$this->template->write_view('main_content', 'iphone/invites/invitefacebook', $data, TRUE);
				$this->template->render();
		}
		elseif(($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1)
		{
				$this->template->set_master_template('mobile/template.php');
				$this->template->write_view('main_content', 'mobile/invites/invitefacebook', $data, TRUE);
				$this->template->render();
		}
		else
		{
				$this->template->write_view('header', 'default/common/header_login', $data, TRUE);
				$this->template->write_view('main_content', 'default/invites/followers', $data, TRUE);
				$this->template->write_view('footer', 'default/common/footer',$data, TRUE);
				$this->template->render();
		}
		
	
	}	
	
	function block($user_id='')
	{
		
		if(!check_user_authentication()) {  redirect('home/login'); } 
		
		$check_user = get_user_detail($user_id);
		if(!$check_user)
		{
			redirect('home');
		}
			
		if($user_id == '')
		{
			redirect('friends');
		}
		$data['my_block'] = userblocklist($user_id);
		
		$meta_setting=meta_setting();
		$site_setting=site_setting();		
		$data['site_setting']=$site_setting;
		$data['user_info']='';
		$data['select']='sel_block';	
	
		$pageTitle=$site_setting['site_name'].' / block / '.$meta_setting['title'];
		$metaDescription=$site_setting['site_name'].' / block / '.$meta_setting['meta_description'];
		$metaKeyword=$site_setting['site_name'].' / block / '.$meta_setting['meta_keyword'];
		
		$this->template->write('meta_title',$pageTitle,TRUE);
		$this->template->write('meta_description',$metaDescription,TRUE);
		$this->template->write('meta_keyword',$metaKeyword,TRUE);
		
		if($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1)
		{
				$this->template->set_master_template('iphone/template.php');
				$this->template->write_view('main_content', 'iphone/invites/invitefacebook', $data, TRUE);
				$this->template->render();
		}
		elseif(($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1)
		{
				$this->template->set_master_template('mobile/template.php');
				$this->template->write_view('main_content', 'mobile/invites/invitefacebook', $data, TRUE);
				$this->template->render();
		}
		else
		{
				$this->template->write_view('header', 'default/common/header_login', $data, TRUE);
				$this->template->write_view('main_content', 'default/invites/block', $data, TRUE);
				$this->template->write_view('footer', 'default/common/footer',$data, TRUE);
				$this->template->render();
		}
		
	}
	
	
	
	function projects($offset=0)
	{
		if(!check_user_authentication()) {  redirect('home/login'); }
		$meta_setting=meta_setting();
		$site_setting=site_setting();		
		$data['site_setting']=$site_setting;
		$data['user_info']='';
		$data['select']='sel_projects';	
		$limit = '9';
		$data['offset'] = $offset;
		$data['limit'] = $limit;
		
		$data['result'] = $this->home_model->my_follow_back_project($offset, $limit);
		$pageTitle=$site_setting['site_name'].' / following / '.$meta_setting['title'];
		$metaDescription=$site_setting['site_name'].' / following / '.$meta_setting['meta_description'];
		$metaKeyword=$site_setting['site_name'].' / following / '.$meta_setting['meta_keyword'];
		
		$this->template->write('meta_title',$pageTitle,TRUE);
		$this->template->write('meta_description',$metaDescription,TRUE);
		$this->template->write('meta_keyword',$metaKeyword,TRUE);
		
		if($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1)
		{
				$this->template->set_master_template('iphone/template.php');
				$this->template->write_view('main_content', 'iphone/invites/projects', $data, TRUE);
				$this->template->render();
		}
		elseif(($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1)
		{
				$this->template->set_master_template('mobile/template.php');
				$this->template->write_view('main_content', 'mobile/invites/projects', $data, TRUE);
				$this->template->render();
		}
		else
		{
				$this->template->write_view('header', 'default/common/header_login', $data, TRUE);
				$this->template->write_view('main_content', 'default/invites/projects', $data, TRUE);
				$this->template->write_view('footer', 'default/common/footer',$data, TRUE);
				$this->template->render();
		} 
	}
	
	function notify_followback($user_id='')
	{
		$notify_user = $this->home_model->notify_followback($user_id);
		echo "notiyfyfolloback";
		die;
	}
	function notify_followers($user_id='')
	{
		$notify_user = $this->home_model->notify_followers($user_id);
		echo "notiyfyfollowers";
		die;
	}
	
	function optuser($user_id = '')
	{
		
		$opt_user = $this->home_model->opt_out_user($user_id);
		echo "optoutuser";
		die;

	}
	function optpopup($id='')
	{
		if(!check_user_authentication()) {  redirect('home/login'); } 		  
		$site_setting=site_setting();
		$data['id']=$id;
		$this->template->write_view('main_content', 'default/invites/optpopup', $data, TRUE);
		$this->template->render();
	}
	function user_optout($user_id)
	{
		$opt_user = $this->home_model->opt_outof_user($user_id);
		
		 /* echo "<script>parent.$.fn.colorbox.close(); </script>";*/
	   echo "<script>parent.window.location.href='".site_url('friends')."'</script>";
	   die;
		//redirect('friends');
	}
	function send_invite($email,$name='')
	{	
		$data=array();
		
		
		$data['email']=$email;
		$data['name']=str_replace('WEKREV','(',str_replace('KQWER',')',urldecode($name)));
		
				
		$meta_setting=meta_setting();
		$site_setting=site_setting();		
		$data['site_setting']=$site_setting;
		
		
			if($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1)
			{
				$this->template->set_master_template('iphone/template.php');
				$this->template->write_view('main_content', 'iphone/invites/send_invite', $data, TRUE);
				$this->template->render();
			}
			elseif(($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1)
			{
				$this->template->set_master_template('mobile/template.php');
				$this->template->write_view('main_content', 'mobile/invites/send_invite', $data, TRUE);
				$this->template->render();
			}
			else
			{
				$this->load->view('default/invites/send_invite',$data);
			}
		
		
		
	}
	
	
	function sendinvitation()
	{
		
		
		if($this->session->userdata('user_id')=='')
		{			
			redirect('home/login');		
		}
		
		
	
		 $uid=$this->session->userdata('user_id');
		 
		 $user_info=get_user_detail($uid);
		
		if(!$user_info) { redirect('home/login');	 }
		
		
		$recipient_name=trim(strip_tags($_REQUEST['rname'])); 
		$recipient_email=trim(strip_tags($_REQUEST['remail']));
		$recipient_message=trim(strip_tags($_REQUEST['rmessage'])); 
		
		
		if($recipient_email) {		
			
			$code=$user_info['unique_code'];
			
			
			$data=array(
				'invite_code'=>$code,
				'invite_email'=>$recipient_email,
				'invite_date'=>date('Y-m-d H:i:s'),
				'invite_ip'=>getRealIP(),
				'invite_by'=>$uid
			);
				
			$this->db->insert('invite_request',$data);
			
			
			$response = array('status'=>'success');
						
											
			$invitation_link='<a href="'.site_url('invited/'.$code.'/'.$recipient_email).'">';
			$end_invitation_link='</a>';
		
			
										
			$login_user_name=ucfirst($user_info['user_name']).' '.ucfirst($user_info['last_name']);
						
						
						
							
		///===email invitation
				
		$email_template=$this->db->query("select * from ".$this->db->dbprefix('email_template')." where task='Email Invitation'");
		$email_temp=$email_template->row();
				
				
			if($email_temp) {
				
				$email_address_from=$email_temp->from_address;
				$email_from_name='';
				$email_address_reply=$email_temp->reply_address;
				
				$email_subject=$email_temp->subject;				
				$email_message=$email_temp->message;			
				
				$email_subject=str_replace('{login_user_name}',$login_user_name,$email_subject);
								
				$email_to=$recipient_email;	
				
				$email_address_from=$user_info['email'];	
				
				$email_message=str_replace('{break}','<br/>',$email_message);
				$email_message=str_replace('{invitation_link}',$invitation_link,$email_message);	
				$email_message=str_replace('{end_invitation_link}',$end_invitation_link,$email_message);			
				$email_message=str_replace('{message}',$recipient_message,$email_message);
				$email_message=str_replace('{login_user_name}',$login_user_name,$email_message);
				
				
				$str=$email_message;		
				
					
				/** custom_helper email function **/
				if($email_to) {	
					email_send($email_address_from,$email_address_reply,$email_to,$email_subject,$str,$email_from_name);
				}
				
			}	
			
			
			
		} else {
			$response = array('status'=>'fail');
		}
		echo json_encode($response);
   		 exit; // only print out the json version of the response
		
	
	}
	
	
	
	function sendemailinvitation()
	{
		
		
		if($this->session->userdata('user_id')=='')
		{			
			redirect('home/login');		
		}
		
		
	
		 $uid=$this->session->userdata('user_id');
		 
		 $user_info=get_user_detail($uid);
		
		if(!$user_info) { redirect('home/login');	 }
		
		
	
		$recipient_email=trim(strip_tags($_REQUEST['remail']));
		$recipient_message=trim(strip_tags($_REQUEST['rmessage'])); 
		
		
		if($recipient_email) {		
			
			$code=$user_info['unique_code'];
			
		
			
			$data=array(
				'invite_code'=>$code,
				'invite_email'=>$recipient_email,
				'invite_date'=>date('Y-m-d H:i:s'),
				'invite_ip'=>getRealIP(),
				'invite_by'=>$uid
			);
				
			$this->db->insert('invite_request',$data);
			
			
			$response = array('status'=>'success');
						
											
			$invitation_link='<a href="'.site_url('invited/'.$code.'/'.$recipient_email).'">';
			$end_invitation_link='</a>';
		
			
										
			$login_user_name=ucfirst($user_info['user_name']).' '.ucfirst($user_info['last_name']);
						
						
						
							
		///===report comment to pinner	
				
		$email_template=$this->db->query("select * from ".$this->db->dbprefix('email_template')." where task='Email Invitation'");
		$email_temp=$email_template->row();
				
				
			if($email_temp) {
				
				$email_address_from=$email_temp->from_address;
				$email_from_name='';
				$email_address_reply=$email_temp->reply_address;
				
				$email_subject=$email_temp->subject;				
				$email_message=$email_temp->message;			
				
				$email_subject=str_replace('{login_user_name}',$login_user_name,$email_subject);
				
				$email_address_from=$user_info['email'];	
								
				$email_to=$recipient_email;		
				
				$email_message=str_replace('{break}','<br/>',$email_message);
				$email_message=str_replace('{invitation_link}',$invitation_link,$email_message);	
				$email_message=str_replace('{end_invitation_link}',$end_invitation_link,$email_message);			
				$email_message=str_replace('{message}',$recipient_message,$email_message);
				$email_message=str_replace('{login_user_name}',$login_user_name,$email_message);
				
				
				$str=$email_message;		
				
					
				/** custom_helper email function **/
				if($email_to) {	
					email_send($email_address_from,$email_address_reply,$email_to,$email_subject,$str,$email_from_name);
				}
				
			}	
			
			
			
		} else {
			$response = array('status'=>'fail');
		}
		echo json_encode($response);
   		 exit; // only print out the json version of the response
		
	
	}
	

  public function index()
  { 
  
  		if($this->session->userdata('user_id')=='')
		{			
			redirect('home/login');		
		}
		
		
	
		 $uid=$this->session->userdata('user_id');
		 
		 $user_info=get_user_detail($uid);
		
		if(!$user_info) { redirect('home/login');	 }
		
		
		$data['user_info']=$user_info;
	
		//$data['select']='facebook';
		$data['select']='sel_find';		
		
		$meta_setting=meta_setting();
		$site_setting=site_setting();		
		$data['site_setting']=$site_setting;	
		
		
		$data['friend_list']= $this->fb_connect->friends;
	
		$data['unfollow_list']='';
		$data['follow_list']='';
		
	
		$pageTitle=$site_setting['site_name'].' / invites / '.$meta_setting['title'];
		$metaDescription=$site_setting['site_name'].' / invites / '.$meta_setting['meta_description'];
		$metaKeyword=$site_setting['site_name'].' / invites / '.$meta_setting['meta_keyword'];
		
		
		
		$this->template->write('meta_title',$pageTitle,TRUE);
		$this->template->write('meta_description',$metaDescription,TRUE);
		$this->template->write('meta_keyword',$metaKeyword,TRUE);
		
		
		
			if($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1)
			{
				$this->template->set_master_template('iphone/template.php');
				$this->template->write_view('main_content', 'iphone/invites/invitefacebook', $data, TRUE);
				$this->template->render();
			}
			elseif(($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1)
			{
				$this->template->set_master_template('mobile/template.php');
				$this->template->write_view('main_content', 'mobile/invites/invitefacebook', $data, TRUE);
				$this->template->render();
			}
			else
			{
				$this->template->write_view('header', 'default/common/header_login', $data, TRUE);
				$this->template->write_view('main_content', 'default/invites/invitefacebook', $data, TRUE);
				$this->template->write_view('footer', 'default/common/footer',$data, TRUE);
				$this->template->render();
			}
			
			
	
  }
  
  
   public function facebook()
  {
  
			if($this->session->userdata('user_id')=='')
			{			
				redirect('home/login');		
			}
			
			
			
			$uid=$this->session->userdata('user_id');
			
			$user_info=get_user_detail($uid);
			
			if(!$user_info) { redirect('home/login');	 }
			
				$data['user_info']=$user_info;
			
			$data['select']='sel_find';	
						
			$meta_setting=meta_setting();
			$site_setting=site_setting();		
			$data['site_setting']=$site_setting;		
			$data['friend_list']= $this->fb_connect->friends;
			
			$data['unfollow_list']='';
			$data['follow_list']='';
			
			
			$pageTitle=$site_setting['site_name'].' / invites / '.$meta_setting['title'];
			$metaDescription=$site_setting['site_name'].' / invites / '.$meta_setting['meta_description'];
			$metaKeyword=$site_setting['site_name'].' / invites / '.$meta_setting['meta_keyword'];
			
			
			$this->template->write('meta_title',$pageTitle,TRUE);
			$this->template->write('meta_description',$metaDescription,TRUE);
			$this->template->write('meta_keyword',$metaKeyword,TRUE);
		
	
	
			if($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1)
			{
				$this->template->set_master_template('iphone/template.php');
				$this->template->write_view('main_content', 'iphone/invites/invitefacebook', $data, TRUE);
				$this->template->render();
			}
			elseif(($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1)
			{
				$this->template->set_master_template('mobile/template.php');
				$this->template->write_view('main_content', 'mobile/invites/invitefacebook', $data, TRUE);
				$this->template->render();
			}
			else
			{
				$this->template->write_view('header', 'default/common/header_login', $data, TRUE);
				$this->template->write_view('main_content', 'default/invites/facebookfriend', $data, TRUE);
				$this->template->write_view('footer', 'default/common/footer',$data, TRUE);
				$this->template->render();
			}
  }
  
  
    public function email()
  {
		if($this->session->userdata('user_id')=='')
		{			
			redirect('home/login');		
		}
		
		
		
		$uid=$this->session->userdata('user_id');
		
		$user_info=get_user_detail($uid);
		
		if(!$user_info) { redirect('home/login');	 }
	
		$data['select']='email';
				
				$data['header_menu'] = dynamic_menu(0);
			$data['footer_menu'] = dynamic_menu_footer(0);
			$data['right_menu'] = dynamic_menu_right(0);
			
		$meta_setting=meta_setting();
		$site_setting=site_setting();		
		$data['site_setting']=$site_setting;		
	
	
			$pageTitle=$site_setting['site_name'].' / invites / '.$meta_setting['title'];
			$metaDescription=$site_setting['site_name'].' / invites / '.$meta_setting['meta_description'];
			$metaKeyword=$site_setting['site_name'].' / invites / '.$meta_setting['meta_keyword'];
	
	
	
			$this->template->write('meta_title',$pageTitle,TRUE);
		$this->template->write('meta_description',$metaDescription,TRUE);
		$this->template->write('meta_keyword',$metaKeyword,TRUE);
			
			
			
			
			
			if($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1)
			{
				$this->template->set_master_template('iphone/template.php');
				$this->template->write_view('main_content', 'iphone/invites/inviteemail', $data, TRUE);
				$this->template->render();
			}
			elseif(($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1)
			{
				$this->template->set_master_template('mobile/template.php');
				$this->template->write_view('main_content', 'mobile/invites/inviteemail', $data, TRUE);
				$this->template->render();
			}
			else
			{
				$this->template->write_view('header', 'default/header_login', $data, TRUE);
				$this->template->write_view('main_content', 'default/invites/inviteemail', $data, TRUE);
				$this->template->write_view('footer', 'default/footer',$data, TRUE);
				$this->template->render();
			}
			
			
			
  }
  
  
  
   public function gmail($friend_list=array())
  {
  
 	 if($this->session->userdata('user_id')=='')
		{			
			redirect('home/login');		
		}
		
		
		
		$uid=$this->session->userdata('user_id');
		
		$user_info=get_user_detail($uid);
		
		if(!$user_info) { redirect('home/login');	 }
		
		
		
	$data=array();
	
	$data['select']='google';
		$data['header_menu'] = dynamic_menu(0);
		$data['footer_menu'] = dynamic_menu_footer(0);
		$data['right_menu'] = dynamic_menu_right(0);
			
	$meta_setting=meta_setting();
	$site_setting=site_setting();		
	$data['site_setting']=$site_setting;		
	

	///=========google friends fetch
	
	$google_setting=google_setting();
	
	$debug=1;
	$argarray=array();
	
	$consumer_key=$google_setting->consumer_key;
	$consumer_secret=$google_setting->consumer_secret;
	$callback=site_url('invites/gmail');
	
	$emails_count='500';
	
	$oauth =new GmailOath($consumer_key, $consumer_secret, $argarray, $debug, $callback);
	
	
	///////======end settings===
	
	$process_login=1;
	
	
	//****************step 2 after authentication*******////
	
	if(isset($_GET['oauth_token']) && isset($_GET['oauth_verifier']))
	{
	
		if($_GET['oauth_token']!='' && $_GET['oauth_verifier']!='') {
	
			$getcontact_access=new GmailGetContacts();
			
			$request_token=$oauth->rfc3986_decode($_GET['oauth_token']);
			$request_token_secret=$oauth->rfc3986_decode($_SESSION['oauth_token_secret']);
			$oauth_verifier= $oauth->rfc3986_decode($_GET['oauth_verifier']);
				
			$contact_access = $getcontact_access->get_access_token($oauth,$request_token, $request_token_secret,$oauth_verifier, false, true, true);
			
				if(isset($contact_access['oauth_token'])) {
				
				$process_login=0;
						
			$access_token=$oauth->rfc3986_decode($contact_access['oauth_token']);
			$access_token_secret=$oauth->rfc3986_decode($contact_access['oauth_token_secret']);
			$contacts= $getcontact_access->GetContacts($oauth, $access_token, $access_token_secret, false, true,$emails_count);
			
			$friend_list=array();
			$unfollow_list=array();
			$follow_list=array();
			
			
				foreach($contacts as $k => $a)
				{				
					$name='';
					
					if(isset($contacts[$k]['title']['$t']))
					{
						$name=$contacts[$k]['title']['$t'];
					}
					
					$final = end($contacts[$k]);		
					
					foreach($final as $email)
					{
						if(isset($email["address"]))
						{
							
							
							///====check follow==
							$query=$this->db->query("select * from ".$this->db->dbprefix('user us')." where us.email='".$email["address"]."'");
							
							if($query->num_rows()>0)
							{				
								$res=$query->row();
								
								$unfollow_list[]=$res->user_id;
								 							
							}
							////====
							else {
							
								$friend_list[]=$email["address"].'||'.$name;
							}
							
							
						}
					}
				}
			
				
				/*echo "<pre>";
				print_r($friend_list);		
				die;*/
				
				$data['friend_list']=$friend_list;
				$data['unfollow_list']=$unfollow_list;
				$data['follow_list']=$follow_list;
				$data['gmail_connect']='';
		
		} else {  redirect('invites/gmail');   }
		
	  }
	}
	//****************step 2 after authentication*******////
	
	
	///******************************step 1 before authentication******////		
	
	if($process_login==1) {
	
	$getcontact=new GmailGetContacts();
	
	$access_token=$getcontact->get_request_token($oauth, false, true, true);
	//	var_dump($access_token);die();

	if(!isset($access_token['oauth_token'])){echo "invalid  consumer secret ";die();}
	
	$_SESSION['oauth_token']=$access_token['oauth_token'];
	$_SESSION['oauth_token_secret']=$access_token['oauth_token_secret'];
	
	$data['gmail_connect']='https://www.google.com/accounts/OAuthAuthorizeToken?oauth_token='.$oauth->rfc3986_decode($access_token['oauth_token']);
		
	$data['friend_list']='';
	$data['unfollow_list']='';
	$data['follow_list']='';
	
	}	
	
	///******************************first time******////	
	


	
	////======end of google friends


		$pageTitle=$site_setting['site_name'].' / invites / '.$meta_setting['title'];
		$metaDescription=$site_setting['site_name'].' / invites / '.$meta_setting['meta_description'];
		$metaKeyword=$site_setting['site_name'].' / invites / '.$meta_setting['meta_keyword'];
	
	
	
		$this->template->write('meta_title',$pageTitle,TRUE);
		$this->template->write('meta_description',$metaDescription,TRUE);
		$this->template->write('meta_keyword',$metaKeyword,TRUE);
				
				
			
			if($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1)
			{
				$this->template->set_master_template('iphone/template.php');
				$this->template->write_view('main_content', 'iphone/invites/invitegmail', $data, TRUE);
				$this->template->render();
			}
			elseif(($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1)
			{
				$this->template->set_master_template('mobile/template.php');
				$this->template->write_view('main_content', 'mobile/invites/invitegmail', $data, TRUE);
				$this->template->render();
			}
			else
			{
				$this->template->write_view('header', 'default/header_login', $data, TRUE);
				$this->template->write_view('main_content', 'default/invites/invitegmail', $data, TRUE);
				$this->template->write_view('footer', 'default/footer',$data, TRUE);
				$this->template->render();
			}	
		
	
	
	
	
  }
  
  
  //yahooo inviter function start from here
  
   public function yahoo()
  {
	$data=array();
		
	
	$data['select']='yahoo';
			$data['header_menu'] = dynamic_menu(0);
			$data['footer_menu'] = dynamic_menu_footer(0);
			$data['right_menu'] = dynamic_menu_right(0);
			
	$meta_setting=meta_setting();
	$site_setting=site_setting();		
	$data['site_setting']=$site_setting;		
	
	///=========yahoo friends fetch
	
	$yahoo_setting=yahoo_setting();
	
	$debug=1;
	$argarray=array();
	
	$consumer_key=$yahoo_setting->consumer_key;
	$consumer_secret=$yahoo_setting->consumer_secret;
	$callback=site_url('invites/yahoo');
	
	$emails_count='1000';
	
	$oauth =new GmailOath($consumer_key, $consumer_secret, $argarray, $debug, $callback);
	
	///////======end settings===
	
	$process_login=1;
	
	
	
	//****************step 2 after authentication*******////
	
	if(isset($_GET['oauth_token']) && isset($_GET['oauth_verifier']))
	{
	
		if($_GET['oauth_token']!='' && $_GET['oauth_verifier']!='') {
		
			////===
			
	
	 $getcontact_access=new YahooGetContacts();
	
	 $request_token=$oauth->rfc3986_decode($_GET['oauth_token']);
	 $request_token_secret=$oauth->rfc3986_decode($_SESSION['oauth_token_secret']);
	 $oauth_verifier= $oauth->rfc3986_decode($_GET['oauth_verifier']);
	
	 $contact_access = $getcontact_access->get_access_token($oauth,$request_token, $request_token_secret,$oauth_verifier, false, true, true);
	 //var_dump($contact_access);die();
	 
	 if(isset($contact_access['oauth_token'])) {
	 
	 $process_login=0;
		
	 $access_token=$oauth->rfc3986_decode($contact_access['oauth_token']);
	 $access_token_secret=$oauth->rfc3986_decode($contact_access['oauth_token_secret']);
	 $xoauth_yahoo_guid=$oauth->rfc3986_decode($contact_access['xoauth_yahoo_guid']);
	 
	 
	 $contacts1= $getcontact_access->GetContacts($oauth, $access_token, $access_token_secret, false, true,$emails_count,$xoauth_yahoo_guid);

	 $contacts=json_decode($contacts1[2], true);	
	 
		//var_dump($contacts);die();
		
		
		$friend_list=array();
		$unfollow_list=array();
		$follow_list=array();
		
	    $total_friend=$contacts['contacts']['count'];
		$fr_list=$contacts['contacts']['contact'];
		
		for($fr=0;$fr<$total_friend;$fr++)
		{
		
			if(isset($fr_list[$fr]['fields'][0]))
			{	
			
				if($fr_list[$fr]['fields'][0]['type']=='email')
				{
			
					if(isset($fr_list[$fr]['fields'][0]['value']))
					{
						$fr_email=$fr_list[$fr]['fields'][0]['value'];
				
				
						////===get name
						$fr_name='';
			
						if(isset($fr_list[$fr]['fields'][1]))
						{
				
				if($fr_list[$fr]['fields'][1]['type']=='name')
				{
					
					///===name
					if(isset($fr_list[$fr]['fields'][1]['value']['givenName']))
					{
						$fr_name=$fr_list[$fr]['fields'][1]['value']['givenName'];
						
						if(isset($fr_list[$fr]['fields'][1]['value']['familyName']))
						{
							$fr_name=$fr_list[$fr]['fields'][1]['value']['givenName'].' '.$fr_list[$fr]['fields'][1]['value']['familyName'];
						}
						
					}
					
						///===name
					
				}
				else
				{
					if(isset($fr_list[$fr]['fields'][2]))
					{
						if($fr_list[$fr]['fields'][2]['type']=='name')
						{
							
							
						///===name
						if(isset($fr_list[$fr]['fields'][2]['value']['givenName']))
						{
							$fr_name=$fr_list[$fr]['fields'][2]['value']['givenName'];
							
							if(isset($fr_list[$fr]['fields'][2]['value']['familyName']))
							{
								$fr_name=$fr_list[$fr]['fields'][2]['value']['givenName'].' '.$fr_list[$fr]['fields'][2]['value']['familyName'];
							}
							
						}					
						///===name
							
							
							
						}
					}
					
				}
			
			}
			
						///===end code for name
				
				
							//if($fr_name=='') { $fr_name=$fr_email;  }
							//echo $fr_name.' || '.$fr_email.'<br/>';
					
					
								///====check follow==
										$query=$this->db->query("select * from ".$this->db->dbprefix('user us')." where us.email='".$fr_email."'");
							
							if($query->num_rows()>0)
							{				
								$res=$query->row();
											
								 
									$unfollow_list[]=$res->user_id;
														
							}
							////====
							else {
							
								$friend_list[]=$fr_email.'||'.$fr_name;
							}
							
								///====check follow==
					
					
					
				/*echo "<pre>";
				print_r($friend_list);		
				die;*/
				
				$data['friend_list']=$friend_list;
				$data['unfollow_list']=$unfollow_list;
				$data['follow_list']=$follow_list;
				$data['yahoo_connect']='';
					
					
					
				}
			  } 
			}
		  }
		
		
			} else {  redirect('invites/yahoo');   }
			
			////===
		}
		
	}
	
	
	//****************step 2 after authentication*******////
	
	
	///******************************step 1 before authentication******////		
	
	if($process_login==1) {
	
		$getcontact=new YahooGetContacts();
		$access_token=$getcontact->get_request_token($oauth, false, true, true);
		//var_dump($access_token);die();
	
	
		if(!isset($access_token['oauth_token'])){echo "invalid  consumer secret ";die();}	
		
		$_SESSION['oauth_token']=$access_token['oauth_token'];
		$_SESSION['oauth_token_secret']=$access_token['oauth_token_secret'];
		$data['yahoo_connect']=urldecode($access_token['xoauth_request_auth_url']);
		
		$data['friend_list']='';
		$data['unfollow_list']='';
		$data['follow_list']='';

	}
	
	///=========yahoo friends===
	

	$pageTitle=$site_setting['site_name'].' / invites / '.$meta_setting['title'];
		$metaDescription=$site_setting['site_name'].' / invites / '.$meta_setting['meta_description'];
		$metaKeyword=$site_setting['site_name'].' / invites / '.$meta_setting['meta_keyword'];
	
	
	
		$this->template->write('meta_title',$pageTitle,TRUE);
		$this->template->write('meta_description',$metaDescription,TRUE);
		$this->template->write('meta_keyword',$metaKeyword,TRUE);
				
				
			
			if($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1)
			{
				$this->template->set_master_template('iphone/template.php');
				$this->template->write_view('main_content', 'iphone/invites/inviteyahoo', $data, TRUE);
				$this->template->render();
			}
			elseif(($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1)
			{
				$this->template->set_master_template('mobile/template.php');
				$this->template->write_view('main_content', 'mobile/invites/inviteyahoo', $data, TRUE);
				$this->template->render();
			}
			else
			{
				$this->template->write_view('header', 'default/header_login', $data, TRUE);
				$this->template->write_view('main_content', 'default/invites/inviteyahoo', $data, TRUE);
				$this->template->write_view('footer', 'default/footer',$data, TRUE);
				$this->template->render();
			}	
		
		
		
	
  }
  
  
  
  
 
  //yahooo inviter function end from here
  
  


}

class GmailOath {

    public $oauth_consumer_key;
    public $oauth_consumer_secret;
    public $progname;
    public $debug;
    public $callback;

    function __construct($consumer_key, $consumer_secret, $argarray, $debug, $callback) {
        $this->oauth_consumer_key = $consumer_key;
        $this->oauth_consumer_secret = $consumer_secret;
        $this->progname = $argarray;
        $this->debug = $debug; // Set to 1 for verbose debugging output
        $this->callback = $callback;
    }

    ////////////////// global.php open//////////////
    function logit($msg, $preamble=true) {
        //  date_default_timezone_set('America/Los_Angeles');
        $now = date(DateTime::ISO8601, time());
        error_log(($preamble ? "+++${now}:" : '') . $msg);
    }

   
    function do_get($url, $port=80, $headers=NULL) {
        $retarr = array();  // Return value
        $curl_opts = array(CURLOPT_URL => $url,
            CURLOPT_PORT => $port,
            CURLOPT_POST => false,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_RETURNTRANSFER => true);


        if ($headers) {
            $curl_opts[CURLOPT_HTTPHEADER] = $headers;
        }

        $response = $this->do_curl($curl_opts);

        if (!empty($response)) {
            $retarr = $response;
        }

        return $retarr;
    }

 
    function do_post($url, $postbody, $port=80, $headers=NULL) {
        $retarr = array();  // Return value

        $curl_opts = array(CURLOPT_URL => $url,
            CURLOPT_PORT => $port,
            CURLOPT_POST => true,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_POSTFIELDS => $postbody,
            CURLOPT_RETURNTRANSFER => true);

        if ($headers) {
            $curl_opts[CURLOPT_HTTPHEADER] = $headers;
        }

        $response = do_curl($curl_opts);

        if (!empty($response)) {
            $retarr = $response;
        }

        return $retarr;
    }

  
    function do_curl($curl_opts) {

        $retarr = array();  // Return value

        if (!$curl_opts) {
            if ($this->debug) {
                $this->logit("do_curl:ERR:curl_opts is empty");
            }
            return $retarr;
        }


        // Open curl session

        $ch = curl_init();

        if (!$ch) {
            if ($this->debug) {
                $this->logit("do_curl:ERR:curl_init failed");
            }
            return $retarr;
        }

        // Set curl options that were passed in
        curl_setopt_array($ch, $curl_opts);

        // Ensure that we receive full header
        curl_setopt($ch, CURLOPT_HEADER, true);

        if ($this->debug) {
            curl_setopt($ch, CURLINFO_HEADER_OUT, true);
            curl_setopt($ch, CURLOPT_VERBOSE, true);
        }

        // Send the request and get the response
        ob_start();
        $response = curl_exec($ch);
        $curl_spew = ob_get_contents();
        ob_end_clean();
        if ($this->debug && $curl_spew) {
            $this->logit("do_curl:INFO:curl_spew begin");
            $this->logit($curl_spew, false);
            $this->logit("do_curl:INFO:curl_spew end");
        }

        // Check for errors
        if (curl_errno($ch)) {
            $errno = curl_errno($ch);
            $errmsg = curl_error($ch);
            if ($this->debug) {
                $this->logit("do_curl:ERR:$errno:$errmsg");
            }
            curl_close($ch);
            unset($ch);
            return $retarr;
        }

        if ($this->debug) {
            $this->logit("do_curl:DBG:header sent begin");
            $header_sent = curl_getinfo($ch, CURLINFO_HEADER_OUT);
            $this->logit($header_sent, false);
            $this->logit("do_curl:DBG:header sent end");
        }

        // Get information about the transfer
        $info = curl_getinfo($ch);

        // Parse out header and body
        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $header = substr($response, 0, $header_size);
        $body = substr($response, $header_size);

        // Close curl session
        curl_close($ch);
        unset($ch);

        if ($this->debug) {
            $this->logit("do_curl:DBG:response received begin");
            if (!empty($response)) {
                $this->logit($response, false);
            }
            $this->logit("do_curl:DBG:response received end");
        }

        // Set return value
        array_push($retarr, $info, $header, $body);

        return $retarr;
    }

 
    function json_pretty_print($json, $html_output=false) {
        $spacer = '  ';
        $level = 1;
        $indent = 0; // current indentation level
        $pretty_json = '';
        $in_string = false;

        $len = strlen($json);

        for ($c = 0; $c < $len; $c++) {
            $char = $json[$c];
            switch ($char) {
                case '{':
                case '[':
                    if (!$in_string) {
                        $indent += $level;
                        $pretty_json .= $char . "\n" . str_repeat($spacer, $indent);
                    } else {
                        $pretty_json .= $char;
                    }
                    break;
                case '}':
                case ']':
                    if (!$in_string) {
                        $indent -= $level;
                        $pretty_json .= "\n" . str_repeat($spacer, $indent) . $char;
                    } else {
                        $pretty_json .= $char;
                    }
                    break;
                case ',':
                    if (!$in_string) {
                        $pretty_json .= ",\n" . str_repeat($spacer, $indent);
                    } else {
                        $pretty_json .= $char;
                    }
                    break;
                case ':':
                    if (!$in_string) {
                        $pretty_json .= ": ";
                    } else {
                        $pretty_json .= $char;
                    }
                    break;
                case '"':
                    if ($c > 0 && $json[$c - 1] != '\\') {
                        $in_string = !$in_string;
                    }
                default:
                    $pretty_json .= $char;
                    break;
            }
        }

        return ($html_output) ?
                '<pre>' . htmlentities($pretty_json) . '</pre>' :
                $pretty_json . "\n";
    }





    function oauth_http_build_query($params, $excludeOauthParams=false) {

        $query_string = '';
        if (!empty($params)) {

            // rfc3986 encode both keys and values
            $keys = $this->rfc3986_encode(array_keys($params));
            $values = $this->rfc3986_encode(array_values($params));
            $params = array_combine($keys, $values);


            uksort($params, 'strcmp');

   
            $kvpairs = array();
            foreach ($params as $k => $v) {
                if ($excludeOauthParams && substr($k, 0, 5) == 'oauth') {
                    continue;
                }
                if (is_array($v)) {
                    // If two or more parameters share the same name,
                    // they are sorted by their value. OAuth Spec: 9.1.1 (1)
                    natsort($v);
                    foreach ($v as $value_for_same_key) {
                        array_push($kvpairs, ($k . '=' . $value_for_same_key));
                    }
                } else {
                    // For each parameter, the name is separated from the corresponding
                    // value by an '=' character (ASCII code 61). OAuth Spec: 9.1.1 (2)
                    array_push($kvpairs, ($k . '=' . $v));
                }
            }

            // Each name-value pair is separated by an '&' character, ASCII code 38.
            // OAuth Spec: 9.1.1 (2)
            $query_string = implode('&', $kvpairs);
        }
        return $query_string;
    }


    function oauth_parse_str($query_string) {
        $query_array = array();

        if (isset($query_string)) {

            // Separate single string into an array of "key=value" strings
            $kvpairs = explode('&', $query_string);

            // Separate each "key=value" string into an array[key] = value
            foreach ($kvpairs as $pair) {
                list($k, $v) = explode('=', $pair, 2);

                // Handle the case where multiple values map to the same key
                // by pulling those values into an array themselves
                if (isset($query_array[$k])) {
                    // If the existing value is a scalar, turn it into an array
                    if (is_scalar($query_array[$k])) {
                        $query_array[$k] = array($query_array[$k]);
                    }
                    array_push($query_array[$k], $v);
                } else {
                    $query_array[$k] = $v;
                }
            }
        }

        return $query_array;
    }


    function build_oauth_header($params, $realm='') {
        $header = 'Authorization: OAuth';
        foreach ($params as $k => $v) {
            if (substr($k, 0, 5) == 'oauth') {
                $header .= ',' . $this->rfc3986_encode($k) . '="' . $this->rfc3986_encode($v) . '"';
            }
        }
        return $header;
    }

  
    function oauth_compute_plaintext_sig($consumer_secret, $token_secret) {
        return ($consumer_secret . '&' . $token_secret);
    }


    function oauth_compute_hmac_sig($http_method, $url, $params, $consumer_secret, $token_secret) {

        $base_string = $this->signature_base_string($http_method, $url, $params);
        $signature_key = $this->rfc3986_encode($consumer_secret) . '&' . $this->rfc3986_encode($token_secret);
        $sig = base64_encode(hash_hmac('sha1', $base_string, $signature_key, true));
        if ($this->debug) {
             $this->logit("oauth_compute_hmac_sig:DBG:sig:$sig");
        }
        return $sig;
    }

    /**
     * Make the URL conform to the format scheme://host/path
     * @param string $url
     * @return string the url in the form of scheme://host/path
     */
    function normalize_url($url) {
        $parts = parse_url($url);

        $scheme = $parts['scheme'];
        $host = $parts['host'];
        if(isset($parts['port']))$port = $parts['port'];
		else $port = '';
        $path = $parts['path'];

        if (!$port) {
            $port = ($scheme == 'https') ? '443' : '80';
        }
        if (($scheme == 'https' && $port != '443')
                || ($scheme == 'http' && $port != '80')) {
            $host = "$host:$port";
        }

        return "$scheme://$host$path";
    }

    /**
     * Returns the normalized signature base string of this request
     * @param string $http_method
     * @param string $url
     * @param array $params
     * The base string is defined as the method, the url and the
     * parameters (normalized), each urlencoded and the concated with &.
     * @see http://oauth.net/core/1.0/#rfc.section.A.5.1
     */
    function signature_base_string($http_method, $url, $params) {
        // Decompose and pull query params out of the url
        $query_str = parse_url($url, PHP_URL_QUERY);
        if ($query_str) {
            $parsed_query = $this->oauth_parse_str($query_str);
            // merge params from the url with params array from caller
            $params = array_merge($params, $parsed_query);
        }

        // Remove oauth_signature from params array if present
        if (isset($params['oauth_signature'])) {
            unset($params['oauth_signature']);
        }

        // Create the signature base string. Yes, the $params are double encoded.
       
        $base_string = $this->rfc3986_encode(strtoupper($http_method)) . '&' .
                $this->rfc3986_encode($this->normalize_url($url)) . '&' .
                $this->rfc3986_encode($this->oauth_http_build_query($params));

        $this->logit("signature_base_string:INFO:normalized_base_string:$base_string");

        return $base_string;
    }

    /**
     * Encode input per RFC 3986
     * @param string|array $raw_input
     * @return string|array properly rfc3986 encoded raw_input
     * If an array is passed in, rfc3896 encode all elements of the array.
     * @link http://oauth.net/core/1.0/#encoding_parameters
     */
    function rfc3986_encode($raw_input){

        if (is_array($raw_input)) {
            //return array_map($this->rfc3986_encode, $raw_input);
            return array_map(array($this, 'rfc3986_encode'), $raw_input);

            // return $this->rfc3986_encode($raw_input);
        } else if (is_scalar($raw_input)) {
            return str_replace('%7E', '~', rawurlencode($raw_input));
        } else {
            return '';
        }
    }

    function rfc3986_decode($raw_input) {
        return rawurldecode($raw_input);
    }

}

class GmailGetContacts {

    function get_request_token($oauth, $usePost=false, $useHmacSha1Sig=true, $passOAuthInHeader=false) {
        $retarr = array();  // return value
        $response = array();

        $url = 'https://www.google.com/accounts/OAuthGetRequestToken';
        $params['oauth_version'] = '1.0';
        $params['oauth_nonce'] = mt_rand();
        $params['oauth_timestamp'] = time();
        $params['oauth_consumer_key'] = $oauth->oauth_consumer_key;
        $params['oauth_callback'] = $oauth->callback;
        $params['scope'] = 'https://www.google.com/m8/feeds';

        // compute signature and add it to the params list
        if ($useHmacSha1Sig) {

            $params['oauth_signature_method'] = 'HMAC-SHA1';
            $params['oauth_signature'] =
                    $oauth->oauth_compute_hmac_sig($usePost ? 'POST' : 'GET', $url, $params,
                            $oauth->oauth_consumer_secret, null);
        } else {
            echo "signature mathod not support";
        }

        // Pass OAuth credentials in a separate header or in the query string
        if ($passOAuthInHeader) {

            $query_parameter_string = $oauth->oauth_http_build_query($params, FALSE);

            $header = $oauth->build_oauth_header($params);

            $headers[] = $header;
        } else {
            $query_parameter_string = $oauth->oauth_http_build_query($params);
        }

        // POST or GET the request
        if ($usePost) {
            $request_url = $url;
            $oauth->logit("getreqtok:INFO:request_url:$request_url");
            $oauth->logit("getreqtok:INFO:post_body:$query_parameter_string");
            $headers[] = 'Content-Type: application/x-www-form-urlencoded';
            $response = do_post($request_url, $query_parameter_string, 443, $headers);
        } else {
            $request_url = $url . ($query_parameter_string ?
                            ('?' . $query_parameter_string) : '' );

            $oauth->logit("getreqtok:INFO:request_url:$request_url");

            $response = $oauth->do_get($request_url, 443, $headers);
        }

        // extract successful response
        if (!empty($response)) {
            list($info, $header, $body) = $response;
            $body_parsed = $oauth->oauth_parse_str($body);
            if (!empty($body_parsed)) {
                $oauth->logit("getreqtok:INFO:response_body_parsed:");
               //print_r($body_parsed);
            }
            $retarr = $response;
            $retarr[] = $body_parsed;
        }

        return $body_parsed;
    }

    function get_access_token($oauth, $request_token, $request_token_secret, $oauth_verifier, $usePost=false, $useHmacSha1Sig=true, $passOAuthInHeader=true) {
        $retarr = array();  // return value
        $response = array();

        $url = 'https://www.google.com/accounts/OAuthGetAccessToken';
        $params['oauth_version'] = '1.0';
        $params['oauth_nonce'] = mt_rand();
        $params['oauth_timestamp'] = time();
        $params['oauth_consumer_key'] = $oauth->oauth_consumer_key;
        $params['oauth_token'] = $request_token;
        $params['oauth_verifier'] = $oauth_verifier;
        
        // compute signature and add it to the params list
        if ($useHmacSha1Sig){
            $params['oauth_signature_method'] = 'HMAC-SHA1';
            $params['oauth_signature'] =
                    $oauth->oauth_compute_hmac_sig($usePost ? 'POST' : 'GET', $url, $params,
                            $oauth->oauth_consumer_secret, $request_token_secret);
        } else {
            echo "signature mathod not support";
        }
//     
        if ($passOAuthInHeader) {
            $query_parameter_string = $oauth->oauth_http_build_query($params, false);
            $header = $oauth->build_oauth_header($params);
            $headers[] = $header;
        } else {
            $query_parameter_string = $oauth->oauth_http_build_query($params);
        }

       
        if ($usePost){
            $request_url = $url;
             $oauth->logit("getacctok:INFO:request_url:$request_url");
             $oauth->logit("getacctok:INFO:post_body:$query_parameter_string");
            $headers[] = 'Content-Type: application/x-www-form-urlencoded';
            $response = $oauth->do_post($request_url, $query_parameter_string, 443, $headers);
        } else {
            $request_url = $url . ($query_parameter_string ?
                            ('?' . $query_parameter_string) : '' );

            $oauth->logit("getacctok:INFO:request_url:$request_url");
            $response = $oauth->do_get($request_url, 443, $headers);
        }

        
        if (!empty($response)) {
            list($info, $header, $body) = $response;
            $body_parsed = $oauth->oauth_parse_str($body);
            if (!empty($body_parsed)) {
                $oauth->logit("getacctok:INFO:response_body_parsed:");
                //print_r($body_parsed);
                
            }
            $retarr = $response;
            $retarr[] = $body_parsed;
        }
        return $body_parsed;
    }


    function GetContacts($oauth, $access_token, $access_token_secret, $usePost=false, $passOAuthInHeader=true,$emails_count) {
        $retarr = array();  // return value
        $response = array();

        $url = "https://www.google.com/m8/feeds/contacts/default/full";
        $params['alt'] = 'json';
        $params['max-results'] = $emails_count;
        $params['oauth_version'] = '1.0';
        $params['oauth_nonce'] = mt_rand();
        $params['oauth_timestamp'] = time();
        $params['oauth_consumer_key'] = $oauth->oauth_consumer_key;
        $params['oauth_token'] = $access_token;

        // compute hmac-sha1 signature and add it to the params list
        $params['oauth_signature_method'] = 'HMAC-SHA1';
        $params['oauth_signature'] =
                $oauth->oauth_compute_hmac_sig($usePost ? 'POST' : 'GET', $url, $params,
                        $oauth->oauth_consumer_secret, $access_token_secret);
        
        // Pass OAuth credentials in a separate header or in the query string
        if ($passOAuthInHeader){
            $query_parameter_string = $oauth->oauth_http_build_query($params, false);
            
            $header = $oauth->build_oauth_header($params);
           
            $headers[] = $header;
        } else {
            $query_parameter_string = $oauth->oauth_http_build_query($params);
        }

        // POST or GET the request
        if ($usePost){
            $request_url = $url;
            $oauth->logit("callcontact:INFO:request_url:$request_url");
            $oauth->logit("callcontact:INFO:post_body:$query_parameter_string");
            $headers[] = 'Content-Type: application/x-www-form-urlencoded';
            $response = $oauth->do_post($request_url, $query_parameter_string, 80, $headers);

        } else {
            $request_url = $url . ($query_parameter_string ?
                            ('?' . $query_parameter_string) : '' );
            $oauth->logit("callcontact:INFO:request_url:$request_url");
            $response = $oauth->do_get($request_url, 443, $headers);
        }

           
        if (!empty($response)) {
            list($info, $header, $body) = $response;
            if ($body) {

                $oauth->logit("callcontact:INFO:response:");
                $contact = json_decode($oauth->json_pretty_print($body), true);

               //echo $contact['feed']['entry'][0]['gd$email'][0]['address'];
               return $contact['feed']['entry'];
              
            }
            $retarr = $response;
        }

        return $retarr;
    }
    
}

class YahooGetContacts {

    function get_request_token($oauth, $usePost=false, $useHmacSha1Sig=true, $passOAuthInHeader=false) {
        $retarr = array();  // return value
        $response = array();

        $url = 'https://api.login.yahoo.com/oauth/v2/get_request_token';
        $params['oauth_version'] = '1.0';
        $params['oauth_nonce'] = mt_rand();
        $params['oauth_timestamp'] = time();
        $params['oauth_consumer_key'] = $oauth->oauth_consumer_key;
        $params['oauth_callback'] = $oauth->callback;
       // $params['scope'] = 'https://www.google.com/m8/feeds';

        // compute signature and add it to the params list
        if ($useHmacSha1Sig) {

            $params['oauth_signature_method'] = 'HMAC-SHA1';
            $params['oauth_signature'] =
                    $oauth->oauth_compute_hmac_sig($usePost ? 'POST' : 'GET', $url, $params,
                            $oauth->oauth_consumer_secret, null);
        } else {
            echo "signature mathod not support";
        }

        // Pass OAuth credentials in a separate header or in the query string
        if ($passOAuthInHeader) {

            $query_parameter_string = $oauth->oauth_http_build_query($params, FALSE);

            $header = $oauth->build_oauth_header($params);

            $headers[] = $header;
        } else {
            $query_parameter_string = $oauth->oauth_http_build_query($params);
        }

        // POST or GET the request
        if ($usePost) {
            $request_url = $url;
            $oauth->logit("getreqtok:INFO:request_url:$request_url");
            $oauth->logit("getreqtok:INFO:post_body:$query_parameter_string");
            $headers[] = 'Content-Type: application/x-www-form-urlencoded';
            $response = do_post($request_url, $query_parameter_string, 443, $headers);
        } else {
            $request_url = $url . ($query_parameter_string ?
                            ('?' . $query_parameter_string) : '' );

            $oauth->logit("getreqtok:INFO:request_url:$request_url");

            $response = $oauth->do_get($request_url, 443, $headers);
        }

        // extract successful response
        if (!empty($response)) {
            list($info, $header, $body) = $response;
            $body_parsed = $oauth->oauth_parse_str($body);
            if (!empty($body_parsed)) {
                $oauth->logit("getreqtok:INFO:response_body_parsed:");
               //print_r($body_parsed);
            }
            $retarr = $response;
            $retarr[] = $body_parsed;
        }

        return $body_parsed;
    }

    function get_access_token($oauth, $request_token, $request_token_secret, $oauth_verifier, $usePost=false, $useHmacSha1Sig=true, $passOAuthInHeader=true) {
        $retarr = array();  // return value
        $response = array();

        $url = 'https://api.login.yahoo.com/oauth/v2/get_token';
        $params['oauth_version'] = '1.0';
        $params['oauth_nonce'] = mt_rand();
        $params['oauth_timestamp'] = time();
        $params['oauth_consumer_key'] = $oauth->oauth_consumer_key;
        $params['oauth_token'] = $request_token;
        $params['oauth_verifier'] = $oauth_verifier;
        
        // compute signature and add it to the params list
        if ($useHmacSha1Sig){
            $params['oauth_signature_method'] = 'HMAC-SHA1';
            $params['oauth_signature'] =
                    $oauth->oauth_compute_hmac_sig($usePost ? 'POST' : 'GET', $url, $params,
                            $oauth->oauth_consumer_secret, $request_token_secret);
        } else {
            echo "signature mathod not support";
        }
//     
        if ($passOAuthInHeader) {
            $query_parameter_string = $oauth->oauth_http_build_query($params, false);
            $header = $oauth->build_oauth_header($params);
            $headers[] = $header;
        } else {
            $query_parameter_string = $oauth->oauth_http_build_query($params);
        }

       
        if ($usePost){
            $request_url = $url;
             $oauth->logit("getacctok:INFO:request_url:$request_url");
             $oauth->logit("getacctok:INFO:post_body:$query_parameter_string");
            $headers[] = 'Content-Type: application/x-www-form-urlencoded';
            $response = $oauth->do_post($request_url, $query_parameter_string, 443, $headers);
        } else {
            $request_url = $url . ($query_parameter_string ?
                            ('?' . $query_parameter_string) : '' );

            $oauth->logit("getacctok:INFO:request_url:$request_url");
            $response = $oauth->do_get($request_url, 443, $headers);
        }

        
        if (!empty($response)) {
            list($info, $header, $body) = $response;
            $body_parsed = $oauth->oauth_parse_str($body);
            if (!empty($body_parsed)) {
                $oauth->logit("getacctok:INFO:response_body_parsed:");
                //print_r($body_parsed);
                
            }
            $retarr = $response;
            $retarr[] = $body_parsed;
        }
        return $body_parsed;
    }


    function GetContacts($oauth, $access_token, $access_token_secret, $usePost=false, $passOAuthInHeader=true,$emails_count,$guid) {
        $retarr = array();  // return value
        $response = array();

       $url = 'http://social.yahooapis.com/v1/user/' . $guid . '/contacts;count=5';
       
		
		 $params['format'] = 'json';
  $params['view'] = 'compact';
  $params['oauth_version'] = '1.0';
  $params['oauth_nonce'] = mt_rand();
  $params['oauth_timestamp'] = time();
  $params['oauth_consumer_key'] =  $oauth->oauth_consumer_key;
  $params['oauth_token'] = $access_token;

        // compute hmac-sha1 signature and add it to the params list
        $params['oauth_signature_method'] = 'HMAC-SHA1';
        $params['oauth_signature'] =
                $oauth->oauth_compute_hmac_sig($usePost ? 'POST' : 'GET', $url, $params,
                        $oauth->oauth_consumer_secret, $access_token_secret);
        
        // Pass OAuth credentials in a separate header or in the query string
        if ($passOAuthInHeader){
            $query_parameter_string = $oauth->oauth_http_build_query($params, false);
            
            $header = $oauth->build_oauth_header($params);
           
            $headers[] = $header;
        } else {
            $query_parameter_string = $oauth->oauth_http_build_query($params);
        }

        // POST or GET the request
        if ($usePost) {
			$request_url = $url;
			 $oauth->logit("callcontact:INFO:request_url:$request_url");
			 $oauth->logit("callcontact:INFO:post_body:$query_parameter_string");
			$headers[] = 'Content-Type: application/x-www-form-urlencoded';
			$response = $oauth-> do_post($request_url, $query_parameter_string, 80, $headers);
		  } else {
			$request_url = $url . ($query_parameter_string ?
								   ('?' . $query_parameter_string) : '' );
			 $oauth->logit("callcontact:INFO:request_url:$request_url");
			$response = $oauth->do_get($request_url, 80, $headers);
		  }

          // var_dump( $response );
        // extract successful response
		  if (! empty($response)) {
			list($info, $header, $body) = $response;
			if ($body) {
			  $oauth->logit("callcontact:INFO:response:");
			//  print($this->json_pretty_print($body));
			  $retarr =$this->json_pretty_print($body);
			}
			$retarr = $response;
		  }
		
		  return $retarr;
    }
	function json_pretty_print($json, $html_output=false)
	{
	  $spacer = '  ';
	  $level = 1;
	  $indent = 0; // current indentation level
	  $pretty_json = '';
	  $in_string = false;
	
	  $len = strlen($json);
	
	  for ($c = 0; $c < $len; $c++) {
		$char = $json[$c];
		switch ($char) {
		case '{':
		case '[':
		  if (!$in_string) {
			$indent += $level;
			$pretty_json .= $char . "\n" . str_repeat($spacer, $indent);
		  } else {
			$pretty_json .= $char;
		  }
		  break;
		case '}':
		case ']':
		  if (!$in_string) {
			$indent -= $level;
			$pretty_json .= "\n" . str_repeat($spacer, $indent) . $char;
		  } else {
			$pretty_json .= $char;
		  }
		  break;
		case ',':
		  if (!$in_string) {
			$pretty_json .= ",\n" . str_repeat($spacer, $indent);
		  } else {
			$pretty_json .= $char;
		  }
		  break;
		case ':':
		  if (!$in_string) {
			$pretty_json .= ": ";
		  } else {
			$pretty_json .= $char;
		  }
		  break;
		case '"':
		  if ($c > 0 && $json[$c-1] != '\\') {
			$in_string = !$in_string;
		  }
		default:
		  $pretty_json .= $char;
		  break;
		}
	  }
	
	  return ($html_output) ?
		'<pre>' . htmlentities($pretty_json) . '</pre>' :
		$pretty_json . "\n";
	}
	
	
    
}
?>