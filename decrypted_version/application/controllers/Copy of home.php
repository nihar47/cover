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


class Home extends ROCKERS_Controller {

	function Home()
	{
		parent::__construct();	
		
		$this->load->model('home_model');
		$this->load->model('project_model');
		$this->load->library('securimage');
		
	}
	
	function index($msg='')
	{
		//echo CI_VERSION; die;
		$data = array();
 		$offset = 0;
		$limit=4;
		$id=0;
		if(is_numeric($msg)){
			$id=$msg;
			$msg='';
		}
		$data['searchprj'] = "";
		$data['result'] = $this->home_model->all_project($offset,$limit);
		
		 $data['limit']=$limit;
		 $data['offset']=$offset;
		 
		 $data['total_rows']=$this->home_model->all_project_count();
		
		 $data['total'] = ceil($data['total_rows']/$limit);
		
		$data['donation'] = $this->home_model->get_latest_donations();
		$data['category'] = $this->home_model->get_category();
		$data['gallery']=$this->home_model->get_gallery();
		$data['idea']=$this->home_model->get_idea();
		
		$home_st = get_home_page();
		
		if($home_st=='false')
		{
			$data['home_page']='';
		}
		else
		{		
			$data['home_page']=$home_st;
		}
			
		
		$data['header_menu']= dynamic_menu(0);
		$data['footer_menu']= dynamic_menu_footer(0);
		$data['right_menu']= dynamic_menu_right(0);
		
		
		
		$meta = meta_setting();
		$data['site_setting'] = site_setting();
		
		$this->home_model->select_text();
		
		 $data['msg']=$msg;
		 
		 $this->template->write('meta_title', $meta['title'], TRUE);
		$this->template->write('meta_description', $meta['meta_description'], TRUE);
		$this->template->write('meta_keyword', $meta['meta_keyword'], TRUE);
		
		
			if($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1)
			{
				$this->template->set_master_template('iphone/template.php');
				$this->template->write_view('main_content', 'iphone/home', $data, TRUE);
				$this->template->render();
			}
			elseif(($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1)
			{
				$this->template->set_master_template('mobile/template.php');
				$this->template->write_view('main_content', 'mobile/home', $data, TRUE);
				$this->template->render();
			}
			else
			{
				
				
				$this->template->write_view('header', 'default/header',  $data, TRUE);
				
				
				
				/* FOR OLD ORIGINAL DESIGN
				$this->template->write_view('slider', 'default/slider', '', TRUE);
				$this->template->write_view('main_content', 'default/project_list', $data, TRUE);
				$this->template->write_view('sidebar', 'default/sidebar', $data, TRUE);*/

				$this->template->write_view('main_content', 'default/home_banner', $data, TRUE);
				$this->template->write_view('slider', 'default/home_project_list', $data, TRUE);

				$this->template->write_view('footer', 'default/footer',$data, TRUE);
				$this->template->render();
			}
		
		
		
	}
	
	function home_scrollajax($n = '',$match='none')
	{
		$limit = 4;
		$data['offset'] = $n;
		$data['limit'] = $limit;
		$data['site_setting'] = site_setting();
		$data['total_rows'] = $this->home_model->all_project_count();
		$data['per_page'] = $limit;
		$data['result'] = $this->home_model->all_project($n,$limit);
		$this->load->view('default/search_project_scrollajax', $data);
	}
	
	function dashboard($pid='',$msg='')
	{
		
		
		if($this->session->userdata('user_id')=='')
		{
			
			redirect('home/login');
		
		}
		
		if($pid!='')
		{
				
			$project_detail = $this->db->query("select * from project where project_id='".$pid."'");
			$project=$project_detail->row();
			
			$this->session->set_userdata('project_id', $this->security->xss_clean($pid));
			$this->session->set_userdata('project_title', $this->security->xss_clean($project->project_title));			
			$this->session->set_userdata('url_project_title', $this->security->xss_clean($project->url_project_title));
			
		}
		
			
		$data['project'] = $this->home_model->get_dashboard_project();
	
		$data['project_gallery'] = $this->project_model->get_all_project_gallery($data['project']['project_id']);
		$data['all_perks'] = $this->project_model->get_all_perks($data['project']['project_id']);
		$data['donation_count'] = $this->home_model->get_donation_count();
		$data['donation'] = $this->home_model->get_donation();
		$data['msg'] = $msg;
		$data['site_setting'] = site_setting();
		$meta = meta_setting();
		
		$data['header_menu'] = dynamic_menu(0);
		$data['footer_menu'] = dynamic_menu_footer(0);
		$data['right_menu'] = dynamic_menu_right(0);
		
		
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
				$this->template->write_view('header', 'default/header_login', $data, TRUE);
				$this->template->write_view('center_content', 'default/dashboard', $data, TRUE);
				$this->template->write_view('footer', 'default/footer',$data, TRUE);
				$this->template->render();
			}
		
	}

	
	function getstate($country_name,$time='')
	{
		
		$str='<select tabindex="5" name="state" id="state" class="btn_input" style="text-transform:capitalize;">';
		
		$country=$this->db->query("select * from country where country_name like '%".$country_name."%'");
		
		if($country->num_rows()>0)
		{
			$country_db=$country->row();
			
			
			$query=$this->db->query("select * from state where active='1' and country_id='".$country_db->country_id."'");
			
			if($query->num_rows()>0)
			{	
				$state=$query->result();
				
				foreach($state as $st)
				{
				
					$str .= "<option value='".$st->state_name."'>".$st->state_name."</option>";
				}
			}
			else
			{
				$str .= "<option value='No State'>".NO_STATES."</option>";
			}
			
		}
		
		else
		{
			$str .= "<option value='No State'>".NO_STATES."</option>";
		}
		
		
		$str.='</select>';
	
		echo $str;
		
		die();
		
		
	}
	
	

	
	///========header auto complete search
	
	function search_autocomplete($text='')
	{
		$titles = $this->home_model->auto_comp_text($text);
		if($titles)
		{
			$str = '<ul id="srhdiv">';
			foreach($titles as $title)
			{				
				$str .= '<li onclick="selecttext(this);">'.$title['project_title'].'</li>';
			}
			$str .= '</ul>';
			echo $str;
			die();
		}
	}
	
	
	
	/////////////////////======================Content  Area*************
	
	
	
	function contact_us()
	{
		$chk_user='false';
		
		$spamer=$this->home_model->spam_protection();
      	if($spamer==1 || $spamer=='1') {
			$chk_user='true';
		}
		
		$this->load->library('form_validation');		
		$this->form_validation->set_rules('yname', YOUR_NAME, 'required');
		$this->form_validation->set_rules('yemail', YOUR_EMAIL, 'required|valid_email');
		$this->form_validation->set_rules('message', MSG, 'required');
		
		if($this->form_validation->run() == FALSE){
			if(validation_errors())
			{
				$spam_message='';
				
				if($chk_user=='true')
				{
					$spam_message='<p>'.IPBAND_CANNOT_INQUIRY.'</p>';
				}
				
				$data["error"] = $spam_message.validation_errors();
			}else{
				
				if($chk_user=='true')
				{
					$data["error"] = '<p>'.IPBAND_CANNOT_INQUIRY.'</p>';
				}
				else
				{				
					$data["error"] = "";
				}
			}
			
			$data["yname"] = $this->input->post('yname');
			$data["yemail"] = $this->input->post('yemail');
			$data["message"] = $this->input->post('message');
			$data["about"] = $this->input->post('about');
			$data["links"] = $this->input->post('links');
			$data["que"] = $this->input->post('que');
		}else{
						
			
				if($chk_user=='true')
				{
					$data["error"] = '<p>'.IPBAND_CANNOT_INQUIRY.'</p>';
					$data["yname"] = "";
					$data["yemail"] = "";
					$data["message"] = "";
					$data["about"] = "";
					$data["links"] = "";
					$data["que"] = "";
				}
				else
				{
					
					$chk_spam_inquiry=$this->home_model->check_spam_inquiry();
				
					if($chk_spam_inquiry==1)
					{
						$data["error"] = '<p>'.IPBAND_CANNOT_INQUIRY.'</p>';
						$data["yname"] = "";
						$data["yemail"] = "";
						$data["message"] = "";
						$data["about"] = "";
						$data["links"] = "";
						$data["que"] = "";				
					}
					else
					{
					
						
						$email_template=$this->db->query("select * from `email_template` where task='Contact Us'");
						$email_temp=$email_template->row();
						
						$email_subject=$email_temp->subject;				
						$email_message=$email_temp->message;
						
						$name =$this->input->post('yname');
						$message = '<br/>';
						$message = '<br/>'.QUESTION.$this->input->post('que');
						$message = '<br/>'.DETAILS.$this->input->post('message');
						$message = '<br/>'.LINKS.$this->input->post('links');
						$message = '<br/>'.ABOUT.$this->input->post('about').'<br/><br/>';
						
						$email = $this->input->post('yemail');
						
						
		
						$email_to=$email_temp->from_address;
						$email_address_from=$email;
						$email_address_reply=$email;
						
						$email_message=str_replace('{break}','<br/>',$email_message);
						$email_message=str_replace('{name}',$name,$email_message);
						$email_message=str_replace('{message}',$message,$email_message);
						$email_message=str_replace('{email}',$email,$email_message);
						
						
						$str=$email_message;
							
						if(email_send($email_address_from,$email_address_reply,$email_to,$email_subject,$str))						
						{
							$this->home_model->insert_inquiry();
						}
						
						

/////////////============email===========	
					
			$data["error"] = "<p style='color:#7DBF0F; font-weight:bold;'>".INQUIRY_MESSAGE_SENT_SUCCESSFULLY."</p>";
			$data["yname"] = "";
			$data["yemail"] = "";
			$data["message"] = "";
			$data["about"] = "";
			$data["links"] = "";
			$data["que"] = "";													
					}
			
				}
			
			
		}
		
		$data['searchprj'] = "";
		$data['donation'] = $this->home_model->get_latest_donations();
		$data['gallery']=$this->home_model->get_gallery();
		$data['site_setting'] = site_setting();
		$meta = meta_setting();
		$data['idea'] = $this->home_model->get_idea();
		$this->home_model->select_text();
		
		
	
		$data['header_menu'] = dynamic_menu(0);
		$data['footer_menu'] = dynamic_menu_footer(0);
		$data['right_menu'] = dynamic_menu_right(0);
		
		$this->load->view('default/contactus_fancy', $data);
		

	}
	
	
	function content($title,$id=1)
	{
		 
					
		$data['searchprj'] = "";
		
		
		$data['header_menu'] = dynamic_menu(0);
		$data['footer_menu'] = dynamic_menu_footer(0);
		$data['right_menu'] = dynamic_menu_right(0);
		
		
		$data['result'] = get_page_by_id($id);
		$data['donation'] = $this->home_model->get_latest_donations();
		$data['gallery']=$this->home_model->get_gallery();
		$data['site_setting'] = site_setting();
		$data['idea']=$this->home_model->get_idea();
		$this->home_model->select_text();
		$this->template->write('meta_title', $data['result']['pages_title'], TRUE);
		$this->template->write('meta_description', $data['result']['meta_description'], TRUE);
		$this->template->write('meta_keyword', $data['result']['meta_keyword'], TRUE);
		
		$this->template->write_view('header', 'default/header', $data, TRUE);
		
		$this->template->write_view('main_content', 'default/pages', $data, TRUE);
		$this->template->write_view('sidebar', 'default/sidebar', $data, TRUE);
		$this->template->write_view('footer', 'default/footer', $data, TRUE);
		$this->template->render();
	
	}	
	
	
	
	function terms_and_conditions()
	{		
		$data['result'] = get_page_by_id('12');
		$data['site_setting'] = site_setting();
		
		$this->home_model->select_text();
		
		$this->load->view('default/terms', $data);		
	}
	
	
	
	/////////////////////======================Authentication user login area*************
	
	
	function terms_condition()
	{
		if (!$this->input->post('agree'))
		{			
			$this->form_validation->set_message('terms_condition', PLEASE_AGREE_TERMS_CONDITION.' of '.base_url());
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	
	
	
	
	
	
	
	function username_check($username)
	{
		$username = $this->home_model->user_unique($username);
		if($username == TRUE)
		{
			return TRUE;
		}
		else
		{
			$this->form_validation->set_message('username_check', EXISTS_ACCOUNT_ASSOCIATE_WITHMAIL);
			return FALSE;
		}
	}	
	
	
	/////////=======check user login=================
	
	
	function login($cur_url='')
	{
		  
		if($this->session->userdata('user_id')!='')
		{
			redirect('home/dashboard');		
		}
		$this->load->helper('cookie');
		$temp=get_cookie('fundraisinguserdetail');
		
		$data['email']='';
		$data['password']='';
		$data['remember']='';
		if(!empty($temp))
		{
			$arr=explode("^",$temp);
			if(isset($arr[0]))$data['email']= $arr[0];
			if(isset($arr[1]))$data['password']=$arr[1];
			$data['remember']='1';
		}

		
		$data['error']="";
		
		if($cur_url=='forget'){
			$data['view']="forget";
			$cur_url='';
		}
		else{
			$data['view']="login";
		}
		$data['cur_url']=$cur_url;
		
		
		
		$data['header_menu']= dynamic_menu(0);
		$data['footer_menu']= dynamic_menu_footer(0);
		$data['right_menu']= dynamic_menu_right(0);
		
		
		$data['searchprj'] = "";
		
		$data['donation'] = $this->home_model->get_latest_donations();
		$data['gallery']=$this->home_model->get_gallery();
		$data['site_setting'] = site_setting();
		$data['idea']=$this->home_model->get_idea();
		$this->home_model->select_text();
		$meta = meta_setting();
		$this->template->write('meta_title','Sign In-'. $meta['title'], TRUE);
		$this->template->write('meta_description', 'Sign In-'.$meta['meta_description'], TRUE);
		$this->template->write('meta_keyword', 'Sign In-'.$meta['meta_keyword'], TRUE);
		
		
			
			if($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1)
			{
				$this->template->set_master_template('iphone/template.php');
				$this->template->write_view('main_content', 'iphone/login', $data, TRUE);
				$this->template->render();
			}
			elseif(($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1)
			{
				$this->template->set_master_template('mobile/template.php');
				$this->template->write_view('main_content', 'mobile/login', $data, TRUE);
				$this->template->render();
			}
			else
			{
				$this->template->write_view('header', 'default/header', $data, TRUE);
			
				$this->template->write_view('main_content', 'default/login', $data, TRUE);
				$this->template->write_view('sidebar', 'default/login_sidebar', $data, TRUE);
				$this->template->write_view('footer', 'default/footer',$data, TRUE);
				$this->template->render();
			}
		
	}
	
	function check_login()
	{
		$chk_user='false';
		
		$spamer=$this->home_model->spam_protection();
      	if($spamer==1 || $spamer=='1') {
			$chk_user='true';
		}
	  
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('email', EMAIL, 'trim|required|valid_email');
		$this->form_validation->set_rules('password', PASSWORD, 'trim|required');
		
		if($this->form_validation->run() == FALSE || $chk_user=='true')
		{
			if(validation_errors() || $chk_user=='true')
			{
				$spam_message='';
				
				if($chk_user=='true')
				{
					$spam_message='<p>'.IPBAND_DUETO_CANTLOGIN.'</p>';
				}
				
				$data["error"] = validation_errors().$spam_message;
			}
			else
			{
				if($chk_user=='true')
				{
					$data["error"] = '<p>'.IPBAND_CANNOTREG_NOW.'</p>';
				}
				else
				{				
					$data["error"] = "";
				}
			}
			$data['view']="login";
			
			
		$data['header_menu'] = dynamic_menu(0);
		$data['footer_menu'] = dynamic_menu_footer(0);
		$data['right_menu'] = dynamic_menu_right(0);
		
		
			
			$data['cur_url']=$this->input->post('cur_url');
			$data['password']=$this->input->post('password');
			$data['email']=$this->input->post('email');
			$data['remember']=$this->input->post('remember');
			
		
				$data['searchprj'] = "";
			
				$data['donation'] = $this->home_model->get_latest_donations();
				$data['gallery']=$this->home_model->get_gallery();
				$data['site_setting'] = site_setting();
				$data['idea']=$this->home_model->get_idea();
				$this->home_model->select_text();
				$meta = meta_setting();
				$this->template->write('meta_title','Sign In-'. $meta['title'], TRUE);
				$this->template->write('meta_description','Sign In-'. $meta['meta_description'], TRUE);
				$this->template->write('meta_keyword','Sign In-'. $meta['meta_keyword'], TRUE);
				
				
					if($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1)
					{
						$this->template->set_master_template('iphone/template.php');
						$this->template->write_view('main_content', 'iphone/login', $data, TRUE);
						$this->template->render();
					}
					elseif(($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1)
					{
						$this->template->set_master_template('mobile/template.php');
						$this->template->write_view('main_content', 'mobile/login', $data, TRUE);
						$this->template->render();
					}
					else
					{
						$this->template->write_view('header', 'default/header', $data, TRUE);
					
						$this->template->write_view('main_content', 'default/login', $data, TRUE);
						$this->template->write_view('sidebar', 'default/login_sidebar', $data, TRUE);
						$this->template->write_view('footer', 'default/footer',$data, TRUE);
						$this->template->render();
					}
				
		}
		else
		{
			$login = $this->home_model->is_login();
			if($login == '1')
			{
				
				if($this->input->post('remember')==1)
				{
					$this->load->helper('cookie');
					$cookie = array(
					'name' => 'fundraisinguserdetail',
					'value' => $this->input->post('email')."^".$this->input->post('password'),
					'expire' => time()+(3600*24),
					'domain' => '',
					'path' => '/',
					'prefix' => ''
					);
					
					set_cookie($cookie);
				
				}
				else
				{
					$temp=get_cookie('fundraisinguserdetail');
					if(!empty($temp))
					{
					delete_cookie('fundraisinguserdetail');
					}
				}

				
				if($this->input->post('cur_url')!='')
				{
				
					redirect(base64_decode($this->input->post('cur_url')));
					
				}
				else
				{
					redirect('home/dashboard');
				}
				
				
			}
			else{
				$data['error']= '<p>'.EMAILPASS_WRONG_TRYAGAIN.'</p>';
				
				if($login == '2'){
					
					$data['error'] = YOUR_ACCOUNT_NOT_ACTIVE_CHECK_INBOX;
				}else{
				
					$data['error'] = sprintf(EMAILPASS_WRONG_TRYAGAIN,'<a href="'.site_url('home/login/forget').'">forget password (Click Here)</a>');
				
				}
				
				$data['view']="login";
				
				
				
		$data['header_menu']=dynamic_menu(0);
		$data['footer_menu']=dynamic_menu_footer(0);
		$data['right_menu']=dynamic_menu_right(0);
		
		
				$data['cur_url']=$this->input->post('cur_url');
				$data['password']=$this->input->post('password');
			$data['email']=$this->input->post('email');
			$data['remember']=$this->input->post('remember');
			
				$data['searchprj'] = "";
			
				$data['donation'] = $this->home_model->get_latest_donations();
				$data['gallery']=$this->home_model->get_gallery();
				$data['site_setting'] = site_setting();
				$data['idea']=$this->home_model->get_idea();
				$this->home_model->select_text();
				$meta = meta_setting();
				$this->template->write('meta_title','Sign In-'. $meta['title'], TRUE);
				$this->template->write('meta_description','Sign In-'. $meta['meta_description'], TRUE);
				$this->template->write('meta_keyword', 'Sign In-'.$meta['meta_keyword'], TRUE);
				
				
					if($this->agent->is_mobile('iphone')  && $data['site_setting']['mobile_site'] == 1)
					{
						$this->template->set_master_template('iphone/template.php');
						$this->template->write_view('main_content', 'iphone/login', $data, TRUE);
						$this->template->render();
					}
					elseif(($this->agent->is_mobile() || $this->agent->is_robot())  && $data['site_setting']['mobile_site'] == 1)
					{
						$this->template->set_master_template('mobile/template.php');
						$this->template->write_view('main_content', 'mobile/login', $data, TRUE);
						$this->template->render();
					}
					else
					{
						$this->template->write_view('header', 'default/header', $data, TRUE);
					
						$this->template->write_view('main_content', 'default/login', $data, TRUE);
						$this->template->write_view('sidebar', 'default/login_sidebar', $data, TRUE);
						$this->template->write_view('footer', 'default/footer',$data, TRUE);
						$this->template->render();
					}
				
				
			}
		}	
	}	
	
	
	function logout()
	{
		$this->load->helper('cookie');
		$this->session->sess_destroy();
		
			delete_cookie('fbs_'.$this->fb_connect->appkey, '', '', '');
			if (isset($_COOKIE['fbs_'.$this->fb_connect->appkey]))
			{
			unset($_COOKIE['fbs_'.$this->fb_connect->appkey]);
			}
			
			
			delete_cookie('fbsr_'.$this->fb_connect->appkey, '', '', '');
			if (isset($_COOKIE['fbsr_'.$this->fb_connect->appkey]))
			{
			unset($_COOKIE['fbsr_'.$this->fb_connect->appkey]);
			}


			 $data['logged_out'] = TRUE;
			
		redirect("home/index/logout");
	}
	
	/////////=======forget password=================
	
	function forget_password()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email2', YOUR_EMAIL, 'trim|required|valid_email');
		
		if($this->form_validation->run() == FALSE)
		{
			if(validation_errors())
			{
				$data["error"] = validation_errors();
			}
			else
			{
				$data["error"] = "";
			}
		}else{
			$f_p = $this->home_model->check_email();
			if($f_p == "1")
			{
				$data['error']="<p style='color:#7DBF0F; font-weight:bold;'>".ACCOUNT_DETAIS_SENT_YOUR_INBOX."</p>";
			}else{
				$data['error']="<p>".NO_EMAIL_ADDRESS_FOUND."</p>";
			}
		}
				$data['view']="forget";
			
				$data['header_menu'] = dynamic_menu(0);
				$data['footer_menu'] = dynamic_menu_footer(0);
				$data['right_menu'] = dynamic_menu_right(0);
			
				$data['cur_url']=$this->input->post('cur_url');
				$data['password']=$this->input->post('password');
				$data['email']=$this->input->post('email');
				$data['remember']=$this->input->post('remember');
			
				$data['searchprj'] = "";
				
				$data['donation'] = $this->home_model->get_latest_donations();
				$data['gallery']=$this->home_model->get_gallery();
				$data['site_setting'] = site_setting();
				$data['idea']=$this->home_model->get_idea();
				$this->home_model->select_text();
				
				$meta = meta_setting();
				
				$this->template->write('meta_title','Forgot Password-'. $meta['title'], TRUE);
				$this->template->write('meta_description','Forgot Password-'. $meta['meta_description'], TRUE);
				$this->template->write('meta_keyword', 'Forgot Password-'.$meta['meta_keyword'], TRUE);
				
				
				if($this->agent->is_mobile('iphone')  && $data['site_setting']['mobile_site'] == 1)
					{
						$this->template->set_master_template('iphone/template.php');
						$this->template->write_view('main_content', 'iphone/forgot_password', $data, TRUE);
						$this->template->render();
					}
					elseif(($this->agent->is_mobile() || $this->agent->is_robot())  && $data['site_setting']['mobile_site'] == 1)
					{
						$this->template->set_master_template('mobile/template.php');
						$this->template->write_view('main_content', 'mobile/forgot_password', $data, TRUE);
						$this->template->render();
					}
					else
					{
						$this->template->write_view('header', 'default/header', $data, TRUE);
						
						$this->template->write_view('main_content', 'default/login', $data, TRUE);
						$this->template->write_view('sidebar', 'default/login_sidebar', $data, TRUE);
						$this->template->write_view('footer', 'default/footer',$data, TRUE);
						$this->template->render();
					}
				
		
		
	}
	
	
	
	function image_upload(){
		
		$_FILES['userfile']['name']    =   $_FILES['file1']['name'];
		$_FILES['userfile']['type']    =   $_FILES['file1']['type'];
		$_FILES['userfile']['tmp_name'] =   $_FILES['file1']['tmp_name'];
		$_FILES['userfile']['error']       =   $_FILES['file1']['error'];
		$_FILES['userfile']['size']    =   $_FILES['file1']['size']; 
		 
		 //image validation
		   if ($_FILES["userfile"]["type"] != "image/jpeg" and $_FILES["userfile"]["type"] != "image/pjpeg" and $_FILES["userfile"]["type"] != "image/png" and $_FILES["userfile"]["type"] != "image/x-png" and $_FILES["userfile"]["type"] != "image/gif")
		   {
			   $data["msg"]["error"]='Please upload a .jpg, .png, .gif file';
		   
		   }							
		  else if ($_FILES["userfile"]["size"] > 2000000)
		  { 
				  $data["msg"]["error"]='Sorry, this file is too large.  Please select a .jpg file that is less than 2 MB or try resizing it using a photo editor.';
		  }
		  else
		  {
			
				  $imagename = user_image_upload($_FILES);
				  $data_gallery=array(							
					'image_no'=>$this->input->post('image_no'),
					'image'=> $imagename									
				  );
				
				  $new_img = $this->home_model->save_image($this->input->post('image_no'), $data_gallery);
				  
				  if($new_img)
				  {
				   $data["image"]["path_second"]=base_url()."upload/thumb/".$imagename;
				   $data["msg"]["image_name"]=$imagename;
				   $data["msg"]["user_id"]=$new_img;
				   $data["msg"]["success"]='Image uploaded successfully';
				   $data["msg"]["error"]='';
				  
				  }
				  else
				  {
				   $data["msg"]["error"]='There is some problem site.try after sometime';
				  }
				 
			}  
			$data["msg"]["image_media"]='showimagebox';
			$data["msg"]["successbox"]=1;
			echo json_encode($data);
	}
	
	
	///==============normal user sign up
	function signup($cur_url='')
	{
		
		if($this->session->userdata('user_id')!='')
		{
			redirect('home/dashboard');
		}
		$chk_user='false';
		$spamer=$this->home_model->spam_protection();
      	if($spamer==1 || $spamer=='1') {
			$chk_user='true';
		}
		$image_no = 'img'.randomNumber(10);
		$data['site_setting'] = site_setting();
		$this->load->library('form_validation');
		$this->form_validation->set_rules('user_name', FIRST_NAME, 'required|alpha_space');
		$this->form_validation->set_rules('last_name', LAST_NAME, 'required|alpha_space');		
		$this->form_validation->set_rules('email', YOUR_EMAIL, 'required|valid_email|callback_username_check');
		$this->form_validation->set_rules('password', PASSWORD, 'required|matches[cpassword]|min_length[8]|max_length[12]');
		$this->form_validation->set_rules('cpassword', CONFIRM_PASSWORD, 'required');
		$this->form_validation->set_rules('agree', AGREE, 'callback_terms_condition');
		
				$inputCode = $this->input->post('imagecode');
			
				if($this->securimage->check($inputCode) == true)
				{		
					$error ='';
				}
				else
				{
					$error = "<p>".IMAGE_VERIFICATION_WRONG."</p>";
				}
			
			
		
		if($this->form_validation->run() == FALSE || $error != "" || $chk_user=='true')
		{	
				
			$data['error'] = $error;
			
			if(validation_errors())
			{
				$spam_message='';
				
				if($chk_user=='true')
				{
					$spam_message="<p>".IPBAND_CANNOTREG_NOW."</p>";
				}
				
				$data["error"] = $spam_message.validation_errors().$data['error'];
				
			}else{
				
				if($chk_user=='true')
				{
					$data["error"] = "<p>".IPBAND_CANNOTREG_NOW."</p>";
				}
				else
				{				
					$data["error"] = "";
				}
				
			}
			
			$data['countrylist']=$this->home_model->get_country();
			$data['statelist']=$this->home_model->get_state();
			
			if($this->input->post('cur_url')=='')
			{
				$data['cur_url']=$cur_url;
			}
			else
			{
				$data['cur_url']=$this->input->post('cur_url');
			}
			
			$data['user_name'] = $this->input->post('user_name');
			$data['last_name'] = $this->input->post('last_name');
			$data['email'] = $this->input->post('email');
			$data['password'] = $this->input->post('password');
			$data['image_name'] = $this->input->post('image_name');
			$data['user_id'] = $this->input->post('user_id');
			
			if($_POST){
				$data['image_no'] = $this->input->post('image_no');
			}else{
				$data['image_no'] = $image_no;
			}
			
			$data['header_menu']=dynamic_menu(0);
			$data['footer_menu']=dynamic_menu_footer(0);
			$data['right_menu']=dynamic_menu_right(0);
		
			$meta = meta_setting();
			$data['site_setting'] = site_setting();
			
			$this->home_model->select_text();
			$this->template->write('meta_title','Sign Up-'. $meta['title'], TRUE);
			$this->template->write('meta_description','Sign Up-'. $meta['meta_description'], TRUE);
			$this->template->write('meta_keyword', 'Sign Up-'.$meta['meta_keyword'], TRUE);
			
			
		
			if($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1)
			{
				$this->template->set_master_template('iphone/template.php');
				$this->template->write_view('main_content', 'iphone/sign_up', $data, TRUE);
				$this->template->render();
			}
			elseif(($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1)
			{
				$this->template->set_master_template('mobile/template.php');
				$this->template->write_view('main_content', 'mobile/sign_up', $data, TRUE);
				$this->template->render();
			}
			else
			{
				$this->template->write_view('header', 'default/header', $data, TRUE);
				$this->template->write_view('center_content', 'default/sign_up', $data, TRUE);
				$this->template->write_view('footer', 'default/footer',$data, TRUE);
				$this->template->render();
			}
			
			
			
		}else{			
		
			
			$chk_spam_register=$this->home_model->check_spam_register();
				
			if($chk_spam_register== 1)//if($chk_spam_register== 1)
			{
				$data["error"] = "<p>".IPBAND_CANNOTREG_NOW."</p>";	
				
					$data['countrylist']=$this->home_model->get_country();
						
				$data['statelist']=$this->home_model->get_state();
				
				
				if($this->input->post('cur_url')=='')
				{
					$data['cur_url']=$cur_url;
				}
				else
				{
					$data['cur_url']=$this->input->post('cur_url');
				}
				
				
				
			
				$data['user_name'] = $this->input->post('user_name');
				$data['last_name'] = $this->input->post('last_name');
				$data['email'] = $this->input->post('email');
				//$data['paypal_email'] = $this->input->post('paypal_email');
				$data['password'] = $this->input->post('password');
				
				$data['header_menu']=dynamic_menu(0);
				$data['footer_menu']=dynamic_menu_footer(0);
				$data['right_menu']=dynamic_menu_right(0);
			
			
				
				$meta = meta_setting();
				$data['site_setting'] = site_setting();
				
				$this->home_model->select_text();
				$this->template->write('meta_title','Sign Up-'. $meta['title'], TRUE);
				$this->template->write('meta_description','Sign Up-'. $meta['meta_description'], TRUE);
				$this->template->write('meta_keyword','Sign Up-'. $meta['meta_keyword'], TRUE);
				
				
				if($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1)
				{
					$this->template->set_master_template('iphone/template.php');
					$this->template->write_view('main_content', 'iphone/sign_up', $data, TRUE);
					$this->template->render();
				}
				elseif(($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1)
				{
					$this->template->set_master_template('mobile/template.php');
					$this->template->write_view('main_content', 'mobile/sign_up', $data, TRUE);
					$this->template->render();
				}
				else
				{
					$this->template->write_view('header', 'default/header', $data, TRUE);
					$this->template->write_view('center_content', 'default/sign_up', $data, TRUE);
					$this->template->write_view('footer', 'default/footer',$data, TRUE);
					$this->template->render();
			
				}
				
				
			
						
			}
			else
			{
				
				$sign=$this->home_model->register();
				
				if($sign)
				{
		
				$result = get_user_detail($sign);
				
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
				
				//$login_link=base_url().'home/login';
				$login_link=site_url('home/confirm_account/'.$result['user_id'].'/'.$result['confirm_key']);
				$email_message=str_replace('{break}','<br/>',$email_message);
				$email_message=str_replace('{user_name}',$username,$email_message);
				$email_message=str_replace('{password}',$password,$email_message);
				$email_message=str_replace('{email}',$email,$email_message);
				$email_message=str_replace('{login_link}',$login_link,$email_message);
				$str=$email_message;
				
				/////////////============new user email===========	
				email_send($email_address_from,$email_address_reply,$email_to,$email_subject,$str);
				if($this->input->post('cur_url')!='')
				{
					redirect('home/index/signup');
				}
				else
				{
					redirect('home/index/signup');
				}
			
			}
				else
				{
					redirect('home/index');
				}
			}
			
		}
		
	}
	
	
	
	
	//////////////////////======social signup============================================
			 
	 function social_signup($social_data='',$cur_url='')
	{
		
		
		if($this->session->userdata('user_id')!='')
		{
			redirect('home/dashboard');
		}
		$data['fb_img']='';
		$data['twiter_img']='';
		$chk_user='false';
		
		$spamer=$this->home_model->spam_protection();
      	if($spamer==1 || $spamer=='1') {
			$chk_user='true';
		}
		
		
		
		$this->load->library('form_validation');
		
		
		$this->form_validation->set_rules('user_name', FIRST_NAME, 'required|alpha_space');
		$this->form_validation->set_rules('last_name',LAST_NAME, 'required|alpha_space');		
		
		$this->form_validation->set_rules('email', YOUR_EMAIL, 'required|valid_email|callback_username_check');
		
		
		$this->form_validation->set_rules('password', PASSWORD, 'required|matches[cpassword]|min_length[8]|max_length[12]');
		$this->form_validation->set_rules('cpassword', CONFIRM_PASSWORD, 'required');
		$this->form_validation->set_rules('agree',AGREE, 'callback_terms_condition');
		
		
		
		
		
			$inputCode = $this->input->post('imagecode');
			if($this->securimage->check($inputCode) == true)
			{		
				$error ='';
			}
			else
			{
				$error = "<p>".IMAGE_VERIFICATION_WRONG."</p>";
			}
			
		
		$error ='';
		if($this->form_validation->run() == FALSE || $error != "" || $chk_user=='true')
		{	
				
			$data['error'] = $error;
			
			if(validation_errors())
			{
				$spam_message='';
				
				if($chk_user=='true')
				{
					$spam_message='<p>'.IPBAND_CANNOTREG_NOW.'</p>';
				}
				
				$data["error"] = $spam_message.validation_errors().$data['error'];
				
			}else{
				
				if($chk_user=='true')
				{
					$data["error"] = '<p>'.IPBAND_CANNOTREG_NOW.'</p>';
				}
				else
				{				
					$data["error"] = "";
				}
				
			}
			
			
			$data['countrylist']=$this->home_model->get_country();
					
			$data['statelist']=$this->home_model->get_state();
			
			
			if($this->input->post('cur_url')=='')
			{
				$data['cur_url']=$cur_url;
			}
			else
			{
				$data['cur_url']=$this->input->post('cur_url');
			}
			
			
			//if($data['fb_img'])$this->input->post('fb_img')=$data['fb_img'];
			if($social_data) {
			
				$data['user_name'] = $social_data['user_name'];
				$data['last_name'] = $social_data['last_name'];
				$data['email'] = $social_data['email'];			
				$data['password'] = '';
				$data['fb_uid']=$social_data['fb_uid'];
				$data['tw_id']=$social_data['tw_id'];
				if(isset($social_data['fb_img']))$data['fb_img']=$social_data['fb_img'];
				if(isset($social_data['twiter_img']))$data['twiter_img']=$social_data['twiter_img'];
				$data['tw_screen_name']=$social_data['tw_screen_name'];
				
				$data['oauth_token']=$social_data['oauth_token'];
				$data['oauth_token_secret']=$social_data['oauth_token_secret'];		
				if(isset($social_data['invite_code']))$data['invite_code']=$social_data['invite_code'];
				
			
			}
			
			else {
		
				$data['user_name'] = $this->input->post('user_name');
				$data['last_name'] = $this->input->post('last_name');
				$data['email'] = $this->input->post('email');			
				$data['password'] = $this->input->post('password');
				$data['fb_uid']= $this->input->post('fb_uid');
				$data['tw_id']= $this->input->post('tw_id');
				$data['tw_screen_name']= $this->input->post('tw_screen_name');
				$data['fb_img']=$this->input->post('fb_img');
				$data['twiter_img']=$this->input->post('twiter_img');
				
				$data['oauth_token']=$this->input->post('oauth_token');
				$data['oauth_token_secret']=$this->input->post('oauth_token_secret');
				$data['invite_code']=$this->input->post('invite_code');
			
			}
			
			
			$data['header_menu'] = dynamic_menu(0);
			$data['footer_menu'] = dynamic_menu_footer(0);
			$data['right_menu'] = dynamic_menu_right(0);
		
			
			
			$meta = meta_setting();
			$data['site_setting'] = site_setting();
			
			$this->home_model->select_text();
			$this->template->write('meta_title','Sign Up-'. $meta['title'], TRUE);
			$this->template->write('meta_description','Sign Up-'. $meta['meta_description'], TRUE);
			$this->template->write('meta_keyword', 'Sign Up-'.$meta['meta_keyword'], TRUE);
			$this->template->write_view('header', 'default/header', $data, TRUE);
			$this->template->write_view('center_content', 'default/social_sign_up', $data, TRUE);
			$this->template->write_view('footer', 'default/footer',$data, TRUE);
			$this->template->render();
			
		}else{			
		
			
			$chk_spam_register=$this->home_model->check_spam_register();
				
			if($chk_spam_register==1)
			{
				$data["error"] = '<p>'.IPBAND_CANNOTREG_NOW.'</p>';	
				
					$data['countrylist']=$this->home_model->get_country();
						
				$data['statelist']=$this->home_model->get_state();
				
				
				if($this->input->post('cur_url')=='')
				{
					$data['cur_url']=$cur_url;
				}
				else
				{
					$data['cur_url']=$this->input->post('cur_url');
				}
				
				
				
			
				$data['user_name'] = $this->input->post('user_name');
				$data['last_name'] = $this->input->post('last_name');
				$data['email'] = $this->input->post('email');				
				$data['password'] = $this->input->post('password');
				$data['fb_uid']= $this->input->post('fb_uid');
				$data['tw_id']= $this->input->post('tw_id');
				$data['tw_screen_name']= $this->input->post('tw_screen_name');
				
				$data['oauth_token']=$this->input->post('oauth_token');
				$data['oauth_token_secret']=$this->input->post('oauth_token_secret');
				$data['invite_code']=$this->input->post('invite_code');
				
				
				$data['header_menu'] = dynamic_menu(0);
				$data['footer_menu'] = dynamic_menu_footer(0);
				$data['right_menu'] = dynamic_menu_right(0);
			
			
				
				$meta = meta_setting();
				$data['site_setting'] = site_setting();
				
				$this->home_model->select_text();
				$this->template->write('meta_title','Sign Up-'. $meta['title'], TRUE);
				$this->template->write('meta_description','Sign Up-'. $meta['meta_description'], TRUE);
				$this->template->write('meta_keyword','Sign Up-'. $meta['meta_keyword'], TRUE);
				$this->template->write_view('header', 'default/header', $data, TRUE);
				$this->template->write_view('center_content', 'default/social_sign_up', $data, TRUE);
				$this->template->write_view('footer', 'default/footer',$data, TRUE);
				$this->template->render();
			
			
						
			}
			else
			{
				
				$base_path = base_path();
				
				$sign=$this->home_model->register();
			//	var_dump($this->session->userdata('user_id'));exit;
				if($sign)
				{
				
				$email_template=$this->db->query("select * from `email_template` where task='Welcome Email'");
				$email_temp=$email_template->row();
				
				
				$email_address_from=$email_temp->from_address;
				$email_address_reply=$email_temp->reply_address;
				
				$email_subject=$email_temp->subject;				
				$email_message=$email_temp->message;
				
				$username =$this->input->post('user_name');				
				$email = $this->input->post('email');
								
				$email_to=$this->input->post('email');
				
				
				$email_message=str_replace('{break}','<br/>',$email_message);
				$email_message=str_replace('{user_name}',$username,$email_message);			
				$email_message=str_replace('{email}',$email,$email_message);
				
				
				$str=$email_message;
				email_send($email_address_from,$email_address_reply,$email_to,$email_subject,$str);
				
				/////////////============welcome email===========	
				
				/////////////============new user email===========	
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
				
				$login_link=site_url('home/login');
				
				
				$email_message=str_replace('{break}','<br/>',$email_message);
				$email_message=str_replace('{user_name}',$username,$email_message);
				$email_message=str_replace('{password}',$password,$email_message);
				$email_message=str_replace('{email}',$email,$email_message);
				$email_message=str_replace('{login_link}',$login_link,$email_message);
				
				
				$str=$email_message;
				
				email_send($email_address_from,$email_address_reply,$email_to,$email_subject,$str);

				/////////////============new user email===========	
			
					if($this->input->post('cur_url')!='')
					{
					
						redirect(base64_decode($this->input->post('cur_url')));
						
					}
					else
					{
						redirect('home/account');
					}

	
			
			}
				else
				{
					redirect('home/index');
				}
			
			
			
			}
			
			
		}
		
		
		
	}
	
	
	
	///==============affiliate user invite sign up

	function invited($code,$invite_email='')
	{
		if($this->session->userdata('user_id')!='')
		{
			redirect('home/dashboard');
		}
		
		$email='';
		
		if($invite_email!='facebook')
		{
			$check_request_exists=$this->db->get_where('invite_request',array('invite_code'=>$code,'invite_email'=>$invite_email));
			$email=$invite_email;
		}
		elseif($invite_email=='facebook')
		{
			
		}
		
		
		$affiliate_setting=affiliate_setting();
		
		$referral_time_expire=$affiliate_setting->cookie_expire_time;
		
		$domain_name='';
		
		$get_domain_name=get_domain_name(base_url());
		
		if($get_domain_name)
		{
			$domain_name=$get_domain_name;
		}
		
		if($referral_time_expire==0 || $referral_time_expire=='')
		{
			$referral_time_expire=86500;
		}		
		else
		{
			$referral_time_expire=$referral_time_expire*60;
		}
		
		
			$this->load->helper('cookie');
			
			$cookie = array(
				'name'   => 'invite_code',
				'value'  => $code,
				'expire' => time()+$referral_time_expire,
				'domain' => $domain_name,		
				'secure' => TRUE
			);
			
			//set_cookie($cookie);
			setcookie('invite_code',$code,time()+$referral_time_expire,'/',$domain_name,TRUE);
			
				
		
		
		$this->session->set_userdata(array('invite_code'=>$code));
		
		
		
		
			$db_values = array (                    
				'fb_uid' => '',
				'user_name' =>'',
				'last_name' =>'',                    
				'email'=>$email,
				'tw_id'=>'',
				'fb_img'=>'',
				'tw_screen_name'=>'',
				'oauth_token'=>'',
				'oauth_token_secret'=>'',
				'invite_code'=>$code,
			);
 
			//data ready, try to create the new user 


		$this->social_signup($db_values);

		
		
	}
	
	
	
	
	//////=====confirm  user account by email verification link
		
	function confirm_account($id=null,$key=''){
		$query = $this->db->get_where('user',array('user_id'=>$id));
		
		if($query->num_rows() > 0){
		
			$result=$query->row_array();
			
			$msg='';
			if($result['confirm_key']==$key){
				$this->db->query("update user set active='1', confirm_key='1' where user_id='".$id."'");
				
				
				$result = get_user_detail($id);
				
				$email_template=$this->db->query("select * from `email_template` where task='Welcome Email'");
				$email_temp=$email_template->row();
				
				
				$email_address_from=$email_temp->from_address;
				$email_address_reply=$email_temp->reply_address;
				
				$email_subject=$email_temp->subject;				
				$email_message=$email_temp->message;
				
				$username =$result['user_name'];				
				$email = $result['email'];
				
				$email_to = $email;
								
				
				$email_message=str_replace('{break}','<br/>',$email_message);
				$email_message=str_replace('{user_name}',$username,$email_message);			
				$email_message=str_replace('{email}',$email,$email_message);
				
				$str=$email_message;
				
				email_send($email_address_from,$email_address_reply,$email_to,$email_subject,$str);
					
				/////////////============welcome email===========	
				$msg='success';
			}
			elseif($result['confirm_key']=='1' and $result['active']=='1'){
				$msg='active';
			}
			else{
				$msg='error';
			}
		}
		else{
			$msg='error';
		}
		redirect('home/index/'.$msg);
	}
	
	
	
	
	
	////====user own account
	
	function account()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('user_name', FIRST_NAME, 'required|alpha_space');
		$this->form_validation->set_rules('last_name', LAST_NAME, 'required|alpha_space');
		$this->form_validation->set_rules('email', YOUR_EMAIL, 'required|valid_email|callback_username_check');
		$this->form_validation->set_rules('password', PASSWORD, 'required|min_length[8]|max_length[12]');
		
		
		$this->form_validation->set_rules('city', CITY, 'required|alpha_space');		
		$this->form_validation->set_rules('country', COUNTRY, 'required');
		$this->form_validation->set_rules('state', STATE, 'required');
		$this->form_validation->set_rules('zip_code', ZIPCODE, 'required|numeric');
	
		$this->form_validation->set_rules('user_website',WEBSITE_URL,'valid_url');
		
		$this->form_validation->set_rules('facebook_url',FACEBOOK_URL,'valid_url');
		$this->form_validation->set_rules('twitter_url',TWITTER_URL,'valid_url');
		
		$this->form_validation->set_rules('linkedln_url',LINKEDIN_URL,'valid_url');
		$this->form_validation->set_rules('googleplus_url',GOOGLEPLUS_URL,'valid_url');
		
		$this->form_validation->set_rules('bandcamp_url',BANDCAMP_URL,'valid_url');
		$this->form_validation->set_rules('youtube_url',YOUTUBE_URL,'valid_url');
		$this->form_validation->set_rules('myspace_url',MYSPACE_URL,'valid_url');
		
		if($this->form_validation->run() == FALSE){
			if(validation_errors())
			{
				
				$data["error"] = validation_errors();
			}else{
				$data["error"] = "";
			}
			
		}else{
		
			$this->session->set_userdata('user_name', $this->security->xss_clean($this->input->post('user_name')));					
			$this->home_model->update_account();
			$data["error"] = "<p style='color:#84C200;'>".ACCOUNT_SUCCESSFULLY_UPDATE."</p>";
		}
		
		
		$data['countrylist']=$this->home_model->get_country();
		$data['statelist']=$this->home_model->get_state();
		$data['result'] = get_user_detail($this->session->userdata('user_id'));
	
		$meta = meta_setting();
		
		
		$data['header_menu'] = dynamic_menu(0);
		$data['footer_menu'] = dynamic_menu_footer(0);
		$data['right_menu'] = dynamic_menu_right(0);
		
		
		 $amazon_detail=$this->db->query("select * from amazon");
		 $data['amazons']=$amazon_detail->row();
		 
		 $paypal_adaptive_detail=$this->db->query("select * from paypal");
		 $data['paypal']=$paypal_adaptive_detail->row();
	 
		 $data['site_setting'] = site_setting();
		
		$this->home_model->select_text();
		$this->template->write('meta_title','My Account-'. $meta['title'], TRUE);
		$this->template->write('meta_description','My Account-'. $meta['meta_description'], TRUE);
		$this->template->write('meta_keyword','My Account-'. $meta['meta_keyword'], TRUE);
		
		
			if($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1)
			{
				$this->template->set_master_template('iphone/template.php');
				$this->template->write_view('main_content', 'iphone/account', $data, TRUE);
				$this->template->render();
			}
			elseif(($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1)
			{
				$this->template->set_master_template('mobile/template.php');
				$this->template->write_view('main_content', 'mobile/account', $data, TRUE);
				$this->template->render();
			}
			else
			{
				$this->template->write_view('header', 'default/header_login', $data, TRUE);
				$this->template->write_view('center_content', 'default/account', $data, TRUE);
				$this->template->write_view('footer', 'default/footer',$data, TRUE);
				$this->template->render();
			}
		
		
		
	}	
	 
	 
	///////////==========user own account for iphone or mobile========
	 
   function myaccount()
   {
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('user_name', FIRST_NAME, 'required|alpha_space');
		$this->form_validation->set_rules('last_name', LAST_NAME, 'required|alpha_space');
		$this->form_validation->set_rules('email', YOUR_EMAIL, 'required|valid_email|callback_username_check');
		$this->form_validation->set_rules('password', PASSWORD, 'required|min_length[8]|max_length[12]');
		
		
		$this->form_validation->set_rules('city', CITY, 'required|alpha_space');		
		$this->form_validation->set_rules('country', COUNTRY, 'required');
		$this->form_validation->set_rules('state', STATE, 'required');
		$this->form_validation->set_rules('zip_code', ZIPCODE, 'required|numeric');
	
		$this->form_validation->set_rules('user_website',WEBSITE_URL,'valid_url');
		
		$this->form_validation->set_rules('facebook_url',FACEBOOK_URL,'valid_url');
		$this->form_validation->set_rules('twitter_url',TWITTER_URL,'valid_url');
		
		$this->form_validation->set_rules('linkedln_url',LINKEDIN_URL,'valid_url');
		$this->form_validation->set_rules('googleplus_url',GOOGLEPLUS_URL,'valid_url');
		
		$this->form_validation->set_rules('bandcamp_url',BANDCAMP_URL,'valid_url');
		$this->form_validation->set_rules('youtube_url',YOUTUBE_URL,'valid_url');
		$this->form_validation->set_rules('myspace_url',MYSPACE_URL,'valid_url');
		
		
		
		if($this->form_validation->run() == FALSE){
			if(validation_errors())
			{
				
				$data["error"] = validation_errors();
			}else{
				$data["error"] = "";
			}
			
			
			
			
		}else{
		
				

				$base_path = base_path();
				$image_settings =get_image_setting_data();
				
				if($_FILES)
				{
				if($_FILES['file1']['name']!="")
				{
						//upload and update the file
						$config['upload_path'] = $base_path.'upload/orig/';
						$config['allowed_types'] = 'jpg|jpeg|gif|png|bmp';
						//$config['max_size']	= '100';// in KB
						$this->load->library('upload', $config);
			
						if(!$this->upload->do_upload('file1'))
						{
							$error = $this->upload->display_errors();				
						}	
						else
						{
							//Image Resizing
							$config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
							$config['new_image'] = $base_path."upload/thumb/";
							$config['thumb_marker'] = "";
							$config['maintain_ratio'] = $image_settings['u_ratio'];
							$config['create_thumb'] = TRUE;
							$config['width'] = $image_settings['u_width'];
							$config['height'] = $image_settings['u_height'];
							$this->load->library('image_lib', $config);
					
							if(!$this->image_lib->resize()){
								$error = $this->image_lib->display_errors();				
							}
						}	
				
				
					}
			
				}
				
			$this->session->set_userdata('user_name', $this->security->xss_clean($this->input->post('user_name')));					
			$this->home_model->update_account();
			
			$data["error"] = "<p style='color:#84C200;'>".ACCOUNT_SUCCESSFULLY_UPDATE."</p>";
			
		}
		
		
		$data['countrylist']=$this->home_model->get_country();
		$data['statelist']=$this->home_model->get_state();
		$data['result'] = get_user_detail($this->session->userdata('user_id'));
		
		$meta = meta_setting();
		
		
		$data['header_menu']=dynamic_menu(0);
		$data['footer_menu']=dynamic_menu_footer(0);
		$data['right_menu']=dynamic_menu_right(0);
		
		
		$data['amazons'] = amazon_detail();
		$data['paypal'] = adaptive_paypal_detail();
		
		 
		 $data['site_setting'] = site_setting();
		
		$this->home_model->select_text();
		$this->template->write('meta_title','My Account-'. $meta['title'], TRUE);
		$this->template->write('meta_description','My Account-'. $meta['meta_description'], TRUE);
		$this->template->write('meta_keyword','My Account-'. $meta['meta_keyword'], TRUE);
		
		
			if($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1)
			{
				$this->template->set_master_template('iphone/template.php');
				$this->template->write_view('main_content', 'iphone/myaccount', $data, TRUE);
				$this->template->render();
			}
			else
			{
				$this->template->set_master_template('mobile/template.php');
				$this->template->write_view('main_content', 'mobile/myaccount', $data, TRUE);
				$this->template->render();
			}
	
	}
	
	
		
	/////////=======change password=================
		
	function change_password(){
		
		if($this->session->userdata('user_id')==''){
			redirect('home');
		}
		
		$result = get_user_detail($this->session->userdata('user_id'));
		
		$pass_errors='';
		
		if($_POST){
			if($result['password'] != $this->input->post('old_password') and $this->input->post('old_password')!=''){
				$pass_errors.='<p>'.PlEASE_ENTER_CORRECT_OLD_PASSWORD.'</p>';
			}
			if($this->input->post('new_password')!=$this->input->post('con_password')){
				$pass_errors.='<p>'.NEW_PASSWORD_AND_OLD_PASSWORD_SHOULD_BE_SAME.'</p>';
			}
		}
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('old_password', OLD_PASSWORD, 'required|min_length[8]|max_length[12]');
		$this->form_validation->set_rules('new_password', NEW_PASSWORD, 'required|min_length[8]|max_length[12]');
		$this->form_validation->set_rules('con_password', CON_PASSWORD, 'required|min_length[8]|max_length[12]');
		
		
		
		
		if($this->form_validation->run() == FALSE || $pass_errors!=''){
			if(validation_errors())
			{
				
				$data["error"] = validation_errors();
			}else{
				$data["error"] = "";
			}
			
			if($pass_errors!=''){
				$data['error'].=$pass_errors;
			}
			
			$data['old_password'] = $this->input->post('old_password');
			$data['new_password'] = $this->input->post('new_password');
			$data['con_password'] = $this->input->post('con_password');
			
			
		}else{
		
							
			$this->home_model->change_password();
			
			$data["error"] = "<p style='color:#7DBF0F; font-weight:bold;'>".PASSWORD_SUCCESSFULLY_UPDATE."</p>";
			
					$result = get_user_detail($this->session->userdata('user_id'));
					
					$email_template=$this->db->query("select * from `email_template` where task='Change Password'");
					$email_temp=$email_template->row();
					
					$email_address_from=$email_temp->from_address;
					$email_address_reply=$email_temp->reply_address;
					$email_subject=$email_temp->subject;				
					$email_message=$email_temp->message;
					$email_to = $result['email'];
					
					$username =$result['user_name'];
					$password = $result['password'];
					$email = $result['email'];
					
				 	
					$email_message=str_replace('{break}','<br/>',$email_message);
					$email_message=str_replace('{user_name}',$username,$email_message);
					$email_message=str_replace('{password}',$password,$email_message);
					$email_message=str_replace('{email}',$email,$email_message);
					
					$str=$email_message;
					
					email_send($email_address_from,$email_address_reply,$email_to,$email_subject,$str);	
				
					$data['old_password'] = '';
					$data['new_password'] = '';
					$data['con_password'] = '';
			
		}
		
		
		$data['countrylist']=$this->home_model->get_country();
		$data['statelist']=$this->home_model->get_state();
		$data['result'] = get_user_detail($this->session->userdata('user_id'));
	
		$meta = meta_setting();
		
		
		$data['header_menu'] = dynamic_menu(0);
		$data['footer_menu'] = dynamic_menu_footer(0);
		$data['right_menu'] = dynamic_menu_right(0);
		
		$data['amazons'] = amazon_detail();
		$data['paypal'] = adaptive_paypal_detail();
	 
		$data['site_setting'] = site_setting();
		
		$this->home_model->select_text();
		$this->template->write('meta_title','Change Password -'. $meta['title'], TRUE);
		$this->template->write('meta_description','Change Password -'. $meta['meta_description'], TRUE);
		$this->template->write('meta_keyword','Change Password -'. $meta['meta_keyword'], TRUE);
		
			if($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1)
			{
				$this->template->set_master_template('iphone/template.php');
				$this->template->write_view('main_content', 'iphone/change_password', $data, TRUE);
				$this->template->render();
			}
			elseif(($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1)
			{
				$this->template->set_master_template('mobile/template.php');
				$this->template->write_view('main_content', 'mobile/change_password', $data, TRUE);
				$this->template->render();
			}
			else
			{
				$this->template->write_view('header', 'default/header_login', $data, TRUE);
				$this->template->write_view('center_content', 'default/change_password', $data, TRUE);
				$this->template->write_view('footer', 'default/footer',$data, TRUE);
				$this->template->render();
			}
		
	}
	
		
		
		
		

	  
 	//////////////============facebook authentication==================
	
	function _facebook_validate($uid = 0,$email='') 
	{
   		//this query basically sees if the users facebook user id is associated with a user.
   		$bQry = $this->home_model->validate_user_facebook($uid,$email);
		
		
		//echo $bQry;
      	if($bQry=='2'){
		 	redirect('home/dashboard');
		
		}elseif($bQry) { // if the user's credentials validated...
		
			 redirect('home/account');	
	 
			 
      	} else {
        	// incorrect username or password
		
        	$data = array();
         	$data["login_failed"] = TRUE;
         	$this->index($data);
      	}
   }
   
   function facebook($invite_code='') 
   {
   		//1. Check to see if the facebook session has been declared
   		
   		if(!$this->fb_connect->fbSession) {
   			//2. If No, bounce back to login   			
			redirect('home/login');
			
   		} else {
   			
   			 
			 $fb_uid = $this->fb_connect->user_id;			
   			 $fb_usr = $this->fb_connect->user;
			//var_dump($fb_usr);exit;
			if($fb_uid != ''){
				$this->session->set_userdata(array("facebook_id"=>$fb_uid));
					//echo "2017";
			}
		
   			if($fb_uid != false) {
	   			//3. If yes, see if the facebook id is associated with any existing account
	   				if(isset($fb_usr["email"]))
					{
						 $email = $fb_usr["email"];
					}
					else
					{
						 $email='';
					}
				$usr = $this->home_model->get_user_by_fb_uid($fb_uid,$email);
	   			
							
	   			if($usr) {
	   				//$usr = $usr[0]; //the model returns an object array, so get the first elemet of it which contains all of the data we need.	
						//echo $usr->fb_id;
				
				
	   				//3.a. if yes, log the person in
	   				//echo "Logging in via facebook...";
						if($this->session->userdata('user_id')>0)
						{
						
							$this->home_model->add_facebook($fb_uid);	
							
							
							if($invite_code=='backinvite') {								
								redirect('invites/facebook');		
							} 
						}
						else
						{
							$this->_facebook_validate($usr->fb_uid,$email);
						}
					
					
										
	   			} else {
				
				
						if($this->session->userdata('user_id')>0)
						{
						
							$this->home_model->add_facebook($fb_uid);	
							
							
							if($invite_code=='backinvite') {								
								redirect('invites/facebook');		
							} 
							
							
						}
						else
						{
					
							
							
							
							/////======redirect for sign up===========
					
					
							
								//3.b. if no, register the new user.
								//echo "Creating a new account...";
								 $fname = $fb_usr["first_name"]; 
								 $lname = $fb_usr["last_name"];
								//$fullname = $fb_usr["name"];
								$pwd = ''; //left blank so user can modify this later
								if(isset($fb_usr["email"]))
								{
									 $email = $fb_usr["email"];
								}
								else
								{
									 $email='';
								}
				
							$fb_img='';
	   						if(isset($fb_usr["picture"]))
							{
							if(is_array($fb_usr["picture"]))
							{
								if(isset($fb_usr["picture"]["data"]["url"]))$fb_usr["picture"]=$fb_usr["picture"]["data"]["url"];
							}
							
							$CI =& get_instance();
							$base_path = $CI->config->slash_item('base_path');
							$image_settings =get_image_setting_data();
							$inPath=$fb_usr["picture"];
							$outPath= $base_path.'upload/orig/'.$fb_uid.'.jpg';
							$in=    fopen($inPath, "rb");
							$out=   fopen($outPath, "wb");
							while ($chunk = fread($in,8192))
							{
								fwrite($out, $chunk, 8192);
							}
							fclose($in);
							fclose($out);
							$fb_img=$fb_uid.'.jpg';
							$config['upload_path'] = $base_path.'upload/orig/';
							$config['allowed_types'] = 'jpg|jpeg|gif|png|bmp';
							//$config['max_size']	= '100';// in KB
							$this->load->library('upload', $config);
							$config['source_image'] = $this->upload->upload_path.$fb_img;
							$config['new_image'] = $base_path."upload/thumb/";
							$config['thumb_marker'] = "";
							$config['maintain_ratio'] = $image_settings['u_ratio'];
							$config['create_thumb'] = TRUE;
							$config['width'] = $image_settings['u_width'];
							$config['height'] = $image_settings['u_height'];
							$this->load->library('image_lib', $config);
					
							if(!$this->image_lib->resize()){
								$error = $this->image_lib->display_errors();				
							}
							
					}
					
								// 'user_id' => "".$fb_uid,
								$db_values = array (                    
									'fb_uid' => "".$fb_uid,
									'user_name' =>strtolower(str_replace (" ", "",$fname)),
									'last_name' =>strtolower(str_replace (" ", "",$lname)),                    
									'email'=>$email,
									'tw_id'=>'',
									'fb_img'=>$fb_img,
									'tw_screen_name'=>'',
									'oauth_token'=>'',
									'oauth_token_secret'=>'',
									'invite_code'=>$invite_code,
								);
           			 
           						//data ready, try to create the new user 
	   				
					
							$this->social_signup($db_values);
					
					
					}////////====login check if
					
					
	   			}
	   		} 
   		}
   } 
   
   
   
   
     //////////////============twitter authentication==================
   
    function twitter_auth($invite_code='')
	{
		

		
		$this->load->library('tweet');
		
		if ( !$this->tweet->logged_in() )
		{
			$this->tweet->set_callback(site_url('home/auth/'.$invite_code));
			$this->tweet->login();
			
		}
		else{
				
				// $tokens = $this->tweet->get_tokens();
				
				//echo $tokens['oauth_token'];
				//echo $tokens['oauth_token_secret'];
				
				 redirect('home/auth/'.$invite_code);		
				
				// These can be saved in a db alongside a user record
				// if you already have your own auth system.
			}
	
	}
	
	function auth($invite_code='')
	{	 
		if(isset($_REQUEST['denied'])){
         
		  redirect('home');
		}

		$this->load->library('tweet');
			//select from data if already register otherwise create new
					
			//$tokens = $this->tweet->get_tokens();
			
			$user = $this->tweet->call('get', 'account/verify_credentials');
			
					//var_dump($user);exit;	
			$first_name='';
			$last_name='';
			$twiter_img_url='';
			
			
			
			$twitter_id= $user->id;			
		
			$oauth_token='';
			$oauth_token_secret='';
			
			if(isset($tokens['oauth_token']))
			{	
				$oauth_token=$tokens['oauth_token'];
			}
			if(isset($tokens['oauth_token_secret']))
			{
				$oauth_token_secret=$tokens['oauth_token_secret'];	
			}
		
		
		
		if(isset($user->screen_name)) {
			$screen_name=$user->screen_name;
			 $twiter_img_url=$user->profile_image_url_https;
			if(isset($user->name))
			{
				$first_name=$user->name;
				
				if(substr_count($first_name,' ')>=1)
				{
					$ex=explode(' ',$first_name);
					
					$first_name=$ex[0];
					$last_name=$ex[1];
				}
				
				
			}
			
			$name=$user->name;
			$twitter_id=$user->id;
			
			$check_twitter_exists=$this->home_model->check_twitter_exists($twitter_id);
				
			if($check_twitter_exists==TRUE)
			{
					$get_twitter_user_detail=$this->home_model->get_twitter_user_detail($twitter_id);
						
					$data1=array(
							'user_id'=>$get_twitter_user_detail['user_id'],
							'login_date_time'=> date('Y-m-d H:i:s'),
							'login_ip'=>$_SERVER['REMOTE_ADDR']
							); 
					$this->db->insert('user_login',$data1);
				
					$query2 = $this->db->getwhere('project',array('user_id'=>$get_twitter_user_detail['user_id']));
					
					if($query2->num_rows()>0)
					{
						$project = $query2->row_array();
						$project_id = $project['project_id'];
						$project_title = $project['project_title'];
						$url_project_title = $project['url_project_title'];
					}else{
						$project_id = 0;
						$project_title = '';
						$url_project_title ='';
					}
					
					$data_pro=array(
							'user_name'=>$get_twitter_user_detail['user_name'],				
							'user_id'=>$get_twitter_user_detail['user_id'],
							'project_id'=>$project_id,
							'project_title'=>$project_title,
							'url_project_title' =>$url_project_title,
							);
					$this->session->set_userdata($data_pro);		
				
					redirect('home/account');	
	 					
			}
			else
			{
			
				/////======redirect for sign up===========
				
				
				if($this->session->userdata('user_id')>0)
				{		
					$this->home_model->add_twitter($twitter_id,$screen_name,$oauth_token,$oauth_token_secret);		
					//====put condition for invite code related if user is alreadt logged in					
				}
				else
				{
				
				
				
				    $twiter_img='';
	   				if(isset($twiter_img_url))
					{
							$CI =& get_instance();
							$base_path = $CI->config->slash_item('base_path');
							$image_settings =get_image_setting_data();
							$inPath=$twiter_img_url;
							$outPath= $base_path.'upload/orig/'.$screen_name.'.jpg';
							$in=    fopen($inPath, "rb");
							$out=   fopen($outPath, "wb");
							while ($chunk = fread($in,8192))
							{
								fwrite($out, $chunk, 8192);
							}
							fclose($in);
							fclose($out);
							$twiter_img=$screen_name.'.jpg';
							$config['upload_path'] = $base_path.'upload/orig/';
							$config['allowed_types'] = 'jpg|jpeg|gif|png|bmp';
							//$config['max_size']	= '100';// in KB
							$this->load->library('upload', $config);
							$config['source_image'] = $this->upload->upload_path.$twiter_img;
							$config['new_image'] = $base_path."upload/thumb/";
							$config['thumb_marker'] = "";
							$config['maintain_ratio'] = $image_settings['u_ratio'];
							$config['create_thumb'] = TRUE;
							$config['width'] = $image_settings['u_width'];
							$config['height'] = $image_settings['u_height'];
							$this->load->library('image_lib', $config);
					
							if(!$this->image_lib->resize()){
								$error = $this->image_lib->display_errors();				
							}
							
					}	
				
					 $db_values = array (                    
							'fb_uid' => '',
							'user_name' =>strtolower(str_replace (" ", "",$first_name)),
							'last_name' =>$last_name,                    
							'email'=>'',
							'tw_id'=>$twitter_id,
							'twiter_img'=>$twiter_img,
							'tw_screen_name'=>$screen_name,
							'oauth_token'=>$oauth_token,
							'oauth_token_secret'=>$oauth_token_secret,
							'invite_code'=>$invite_code,
						);
				
					$this->social_signup($db_values);
			
		 
				}
			
			
			}
		
		}
		else
		{
			redirect('home/signup');		
		}	
			
	
	} 
	
   
   
  
	
	
	////////=======verify user paypal email address by adaptive paypal features
	
	function verify_paypal()
	{
		
		$data['msg']='';
		$verify='no';
		
		$this->load->library('form_validation');
		
		//$this->form_validation->set_rules('user_name',FIRST_NAME, 'required|alpha_space');
		//$this->form_validation->set_rules('last_name', LAST_NAME, 'required|alpha_space');		
		$this->form_validation->set_rules('paypal_email', PAYPAL_EMAIL, 'required|valid_email');
		
		if($this->form_validation->run() == FALSE)
		{
			if(validation_errors())
			{
				
				$data["error"] = validation_errors();
			}else{
				$data["error"] = "";
			}
			
			
			$data['user_name']=$this->input->post('user_name');
			$data['last_name']=$this->input->post('last_name');
			$data['paypal_email']=$this->input->post('paypal_email');
			
			
			
		
		} else {
		
		
			
			$user_detail = get_user_detail($this->session->userdata('user_id'));		
			
			
			$this->db->query("update user set paypal_email='".$this->input->post('paypal_email')."' where user_id='".$this->session->userdata('user_id')."'");

			 $paypal=adaptive_paypal_detail();
			 
				//////////=================Get PAYPAL SETTING  FROM DATABASE 	================
				$application_id =	$paypal->application_id;
				$api_username=$paypal->paypal_username;
				$api_password=$paypal->paypal_password;	
				$api_key=$paypal->paypal_signature;

				if($paypal->site_status=='sandbox')
				{
				
					$dbend_point='https://svcs.sandbox.paypal.com/';	
					$db_paypalurl='https://www.sandbox.paypal.com/webscr&cmd=';
				
				}
				
				elseif($paypal->site_status=='live')
				{
				
					$dbend_point='https://svcs.paypal.com/';	
					$db_paypalurl='https://www.paypal.com/webscr&cmd=';
				
				}
				else
				{	
					$dbend_point='https://svcs.sandbox.paypal.com/';	
					$db_paypalurl='https://www.sandbox.paypal.com/webscr&cmd=';		
				}
				/////////////===========Action Type===========
				
				/// Whether the Pay request pays the receiver or whether the Pay request is set up to create a payment requesbut not fulfill the payment until the Execute Pay request is called.
				//Allowable values are:
				
				//////=******************
				
				///=== 1)PAY     Use this option if you are not using the Pay request in combinations with the ExecutePayment request.
				
				///=== 2)CREATE    Use this option to set up the payment instructions with the SetPaymentOptions request and then execute the payment at a later time with the ExecutePayment request.
				
				///=== 3)PAY_PRIMARY     For chained payments only, specify this value to delay payments to the secondary receivers; only the payment to the primary receiver is processed
				
				
						$actionType='PAY';
				
				
				////////********************************************==============================****************================/////////////
					/*=========Called by CallerService.php.
					****************************************************/
					/**
					# API user: The user that is identified as making the call. you can
					# also use your own API username that you created on PayPal’s sandbox
					# or the PayPal live site
					*/
					
					define('API_USERNAME', $api_username);
					
					/**
					# API_password: The password associated with the API user
					# If you are using your own API username, enter the API password that
					# was generated by PayPal below
					# IMPORTANT - HAVING YOUR API PASSWORD INCLUDED IN THE MANNER IS NOT
					# SECURE, AND ITS ONLY BEING SHOWN THIS WAY FOR TESTING PURPOSES
					*/
					
					define('API_PASSWORD',$api_password );
					
					/**
					# API_Signature:The Signature associated with the API user. which is generated by paypal.
					*/
					
					define('API_SIGNATURE',$api_key);
					
					/**
					# Endpoint: this is the server URL which you have to connect for submitting your API request.
					*/
					
					define('API_ENDPOINT',$dbend_point );
					
					
					
					/**
					USE_PROXY: Set this variable to TRUE to route all the API requests through proxy.
					like define('USE_PROXY',TRUE);
					*/
					define('USE_PROXY',FALSE);
					/**
					PROXY_HOST: Set the host name or the IP address of proxy server.
					PROXY_PORT: Set proxy port.
					
					PROXY_HOST and PROXY_PORT will be read only if USE_PROXY is set to TRUE
					*/
					define('PROXY_HOST', '127.0.0.1');
					define('PROXY_PORT', '808');
					
					
					// Ack related and Header constants
					define('ACK_SUCCESS', 'SUCCESS');
					define('ACK_SUCCESS_WITH_WARNING', 'SUCCESSWITHWARNING');
					define('APPLICATION_ID', $application_id);
					define('DEVICE_ID','mydevice');
					define('PAYPAL_REDIRECT_URL', $db_paypalurl );
					define('DEVELOPER_PORTAL', 'https://developer.paypal.com');
					define('LOGFILENAME', '../Log/logdata.log');
					define('DEVICE_IPADDRESS', $_SERVER['REMOTE_ADDR']);
					//This SDK supports only Name Value(NV) Request and Response Data Formats. for XML,SOAP,JSON use the SOAP SDK from X.com
					define('REQUEST_FORMAT','NV');
					define('RESPONSE_FORMAT','NV');
					define('X_PAYPAL_REQUEST_SOURCE','PHP_NVP_SDK_V1.1');
			
					
					// all the PayPal Header parameters are set in lib/callerservice.php
					
					
					$this->load->library('NVP_SampleConstants');
					
					$NVP_SampleConstants = new NVP_SampleConstants();
					
					
					/////=================par receipt file header part================ 
					
					try {
			
							$request_array= array
							(
								RequestEnvelope::$requestEnvelopeErrorLanguage=> 'en_US',
								GetVerifiedStatus::$emailAddress=>$this->input->post('paypal_email'),
								//GetVerifiedStatus::$firstName=> $this->input->post('user_name'),
								//GetVerifiedStatus::$lastName=> $this->input->post('last_name'),
								GetVerifiedStatus::$matchCriteria=> 'NONE',
							);
			
				
							 $nvpStr=http_build_query($request_array, '', '&');
							/* Make the call to PayPal to get the Status of the account. If an error occured, show the
							 resulting errors
							 Note: if the confirmation type is none then no need of redirecting
							 */
			
							$resArray=$NVP_SampleConstants->hash_call('AdaptiveAccounts/GetVerifiedStatus',$nvpStr);

							//print_r($resArray);die();
							/* Display the API response back to the browser.
							 If the response from PayPal was a success, display the response parameters'
							 If the response was an error, display the errors received using APIError.php.
							 */
							 
							$ack = strtoupper($resArray['responseEnvelope.ack']);
						
							if($ack!="SUCCESS")
							{
								$verify='no';
							}
							else
							{
								/*foreach($resArray as $key => $value) 
								{    			
    									echo "<p> $key: $value</p>";
    							}	
       							*/
								$verify='yes';
								
							}
							
							
				   
					}
		
					catch(Exception $ex) 
					{
						throw new Exception('Error occurred in GetVerifiedStatusReceipt method');
						$verify='no';
						
					}
					////////////////==============
					
			 
			 /////////===============dn=b insert
			 if($verify=='yes') { 
			
				$this->db->query("update user set paypal_verified='1' and paypal_email='".$this->input->post('paypal_email')."' where user_id='".$this->session->userdata('user_id')."'");
				$data['error'] = '';
				$data['msg']='success';
				$data['user_name']='';
				$data['last_name']='';
				$data['paypal_email']='';
			}
			else
			{
				$this->db->query("update user set paypal_verified='0' and paypal_email='' where user_id='".$this->session->userdata('user_id')."'");			
			
				//$verify_error='<p>'.ENTER_CORRECT_PAYPAL.'</p>'; 	
				$verify_error='<p>'.ENTER_CORRECT_PAYPAL_EMAIL.'</p>'; 	
				
				$data['error'] = $verify_error;
				$data['user_name']=$this->input->post('user_name');
				$data['last_name']=$this->input->post('last_name');
				$data['paypal_email']=$this->input->post('paypal_email');
			}
			
			
		}
		
		
		
		$data['result'] = get_user_detail($this->session->userdata('user_id'));
		
		$meta = meta_setting();
		
		
		$data['header_menu'] = dynamic_menu(0);
		$data['footer_menu'] = dynamic_menu_footer(0);
		$data['right_menu'] = dynamic_menu_right(0);
		
		$data['site_setting'] = site_setting();
		
		$this->home_model->select_text();
		$this->template->write('meta_title','Verify Paypal Account-'. $meta['title'], TRUE);
		$this->template->write('meta_description','Verify Paypal Account-'. $meta['meta_description'], TRUE);
		$this->template->write('meta_keyword','Verify Paypal Account-'. $meta['meta_keyword'], TRUE);
		$this->template->write_view('header', 'default/header_login', $data, TRUE);
		$this->template->write_view('center_content', 'default/verify_paypal', $data, TRUE);
		$this->template->write_view('footer', 'default/footer',$data, TRUE);
		$this->template->render();
	
	}
	
	
	////==========verify user amazon token id====== 
	
	function amazon_account_verify()
	{
		 
	 	$amazons=amazon_detail();
	 
		 if($amazons->site_status=='sand box')
		 {		 
		 	$amazon_url='https://fps.sandbox.amazonaws.com';
		 }
		 if($amazons->site_status=='live')
		 {		 
		 	$amazon_url='https://fps.amazonaws.com';
		 }
		 
		 define('AWS_ACCESS_KEY_ID', $amazons->aws_access_key_id);
         define('AWS_SECRET_ACCESS_KEY', $amazons->aws_secret_access_key); 
		 	 
		 
		 
		 if($amazons->site_status=='sand box')
		 {		  
			 $CBUI_URL = "https://authorize.payments-sandbox.amazon.com/cobranded-ui/actions/start";
		 }
		 if($amazons->site_status=='live')
		 {
			$CBUI_URL = "https://authorize.payments.amazon.com/cobranded-ui/actions/start";
		 }
		 
	 
		 // echo "103<br>"    ;      
		$this->load->library('CBUIRecipientTokenPipelineSample');// echo "105<br>"    ;  
		    
		$pipeline = new Amazon_FPS_CBUIRecipientTokenPipeline(AWS_ACCESS_KEY_ID, AWS_SECRET_ACCESS_KEY, $CBUI_URL );
		
		$uniqueId = 'Caller-'.microtime(true);
       
		// $pipeline->setMandatoryParameters($uniqueId ,"http://fgibaroda.com/amazon/callback.php", '5','5', "True");
	 
	 $pipeline->setMandatoryParameters($uniqueId,site_url('home/recipientcallback/'), $amazons->fixed_fees,$amazons->variable_fees,"True");	
	 
        
        //optional parameters
        $pipeline->addParameter("paymentMethod", "CC");
        
        //RecipientToken url
       
	   //==orig== print "Sample CBUI url for RecipientToken pipeline : " . $pipeline->getUrl() . "\n";
		
	
	  ///after getting url redirect to this url===
	
		redirect($pipeline->getUrl());
		
		
		
	
	}
	
	function recipientcallback()
	{	 
		 
		// echo "<pre>";		 
		// print_r($_GET);
		 
		
		if($_GET['tokenID']!='')
		{
				 
			$insert_token=$this->db->query("update user set amazon_token_id='".$_GET['tokenID']."', refund_token_id='".$_GET['refundTokenID']."' where user_id='".$this->session->userdata('user_id')."'");
			
			redirect('home/dashboard/');
			
		}
		
		else{	
				redirect('home/dashboard/');
			} 
	
		
	}
	
      
}
?>