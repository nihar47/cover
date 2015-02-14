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


class Message extends ROCKERS_Controller {

	function Message()
	{
		parent::__construct();	
		$this->load->model('message_model');
		$this->load->model('project_model');
		$this->load->model('home_model');
	}
	
	function index()
	{
	
		redirect('home/index');
	}
	
	function send_message_project_detail($project_id)
	{
		
		$meta = meta_setting();
		$data['site_setting'] = site_setting();
		
		$this->home_model->select_text();
		
		$data['header_menu'] = dynamic_menu(0);
		$data['footer_menu'] = dynamic_menu_footer(0);
		$data['right_menu'] = dynamic_menu_right(0);
		
		$data['project_id'] = $project_id;
		$data['project'] = get_one_project($project_id);
		
		
		$data["error"] = "";
				
		$this->template->write('meta_title','Reward-'. $meta['title'], TRUE);
		$this->template->write('meta_description', $meta['meta_description'], TRUE);
		$this->template->write('meta_keyword', $meta['meta_keyword'], TRUE);
		
				if($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1)
				{
					$this->template->set_master_template('iphone/template.php');
					$this->template->write_view('main_content', 'iphone/search_project_detail', $data, TRUE);
					$this->template->render();
				}
				elseif(($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1)
				{
					$this->template->set_master_template('mobile/template.php');
					$this->template->write_view('main_content', 'mobile/search_project_detail', $data, TRUE);
					$this->template->render();
				}
				else
				{
					
					$this->template->write_view('main_content', 'default/message/message_project_detail', $data, TRUE);
					$this->template->render();
					
					
			
				}
		
		
	}
	
	function send_mail_project_detail()
	{
					
					$message_insert = $this->message_model->insert_project_detail_message();
					$message_setting = message_setting();
					$login_user = get_user_detail($this->session->userdata('user_id'));	
					
					$project = get_one_project($this->input->post('project_id'));
					
					$project_name = $project['project_title'];
					$url_project_title = $project['url_project_title'];
					
					
					$project_link = site_url('projects/'.$url_project_title.'/'.$this->input->post('project_id'));
					$message_user_profile_link=site_url('member/'.$this->session->userdata('user_id'));	
					$message_user_name=$login_user['user_name'];
					$content = $this->input->post('comments');	
					
					
					$project_user_id = $project['user_id'];
					$project_owner_detail = get_user_detail($project_user_id);
					$project_user_name = $project_owner_detail['user_name'];
					$project_user_email = $project_owner_detail['email'];
					
					if($message_setting->message_enable == 1 && $message_setting->email_admin_on_new_message == 1)
					{
						///////////============admin alert==========
						$email_template=$this->db->query("select * from `email_template` where task='New Message(admin)'");
						$email_temp=$email_template->row();				
						
						if($email_temp)
						{				
							$email_message=$email_temp->message;
							$email_subject=$project_name;//$email_temp->subject;
							$email_address_from=$email_temp->from_address;
							$email_address_reply=$email_temp->reply_address;
							$email_to = $email_address_from;	
							
							$email_message=str_replace('{break}','<br/>',$email_message);
							$email_message=str_replace('{message_user_name}',$message_user_name,$email_message);			
							$email_message=str_replace('{project_name}',$project_name,$email_message);
							$email_message=str_replace('{project_link}',$project_link,$email_message);
							$email_message=str_replace('{content}',$content,$email_message);
							$email_message=str_replace('{message_user_profile_link}',$message_user_profile_link,$email_message);
							$str=$email_message;
							email_send($email_address_from,$email_address_reply,$email_to,$email_subject,$str);
							
						}
						///////=================owner alert===================
					}
					
					if($message_setting->message_enable == 1 && $message_setting->email_user_on_new_message == 1)
					{
						///////////============admin alert==========
						$email_template=$this->db->query("select * from `email_template` where task='New Message(user)'");
						$email_temp=$email_template->row();				
						
						if($email_temp)
						{				
							$email_message=$email_temp->message;
							$email_subject=$project_name;
							$email_address_from=$email_temp->from_address;
							$email_address_reply=$email_temp->reply_address;
							$email_to = $project_user_email;	
														$email_message=str_replace('{break}','<br/>',$email_message);
							$email_message=str_replace('{user_name}',$project_user_name,$email_message);			
							$email_message=str_replace('{message_user_name}',$message_user_name,$email_message);
							$email_message=str_replace('{project_name}',$project_name,$email_message);
							$email_message=str_replace('{project_link}',$project_link,$email_message);
							$email_message=str_replace('{content}',$content,$email_message);
							$email_message=str_replace('{message_user_profile_link}',$message_user_profile_link,$email_message);
							
							$str=$email_message;
							
						
							email_send($email_address_from,$email_address_reply,$email_to,$email_subject,$str);
						}
						///////=================owner alert===================
					}
					
					redirect('projects/'.$url_project_title.'/'.$this->input->post('project_id'));
	}
	
	function send_message_project_profile($user_id,$pid)	
	{
		if(!check_user_authentication()) {  redirect('home/login'); } 
	
					$meta = meta_setting();
					$data['site_setting'] = site_setting();
					
					$this->home_model->select_text();
					
					
					
					$data["error"] = "";
					$data['user_id'] = $user_id;
					$data['pid'] = $pid;
					
					$this->template->write('meta_title','Reward-'. $meta['title'], TRUE);
					$this->template->write('meta_description', $meta['meta_description'], TRUE);
					$this->template->write('meta_keyword', $meta['meta_keyword'], TRUE);
			
					if($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1)
					{
						$this->template->set_master_template('iphone/template.php');
						$this->template->write_view('main_content', 'iphone/search_project_detail', $data, TRUE);
						$this->template->render();
					}
					elseif(($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1)
					{
						$this->template->set_master_template('mobile/template.php');
						$this->template->write_view('main_content', 'mobile/search_project_detail', $data, TRUE);
						$this->template->render();
					}
					else
					{
						
						$this->template->write_view('main_content', 'default/message/message_user_profile', $data, TRUE);
						$this->template->render();
					}	
	}

 	function send_mail_project_profile()
	{
		
					
					$message_insert = $this->message_model->insert_project_profile_message();
					
					$message_setting = message_setting();
					$user_detail = get_user_detail($this->input->post('user_id'));
					$user_id = $this->input->post('user_id');
						
					$login_user_detail = get_user_detail($this->session->userdata('user_id'));	
					$msg='send';
					$message_setting->message_enable;
					
					
					$message_user_profile_link=site_url('member/'.$this->session->userdata('user_id'));	
					
					$user_name = $user_detail['user_name'];
					$message_user_name=$login_user_detail['user_name'];
					$content = $this->input->post('comments');	
					
					
					
					if($message_setting->message_enable == 1 && $message_setting->email_admin_on_new_message == 1)
					{
						///////////============admin alert==========
						$email_template=$this->db->query("select * from `email_template` where task='Message user profile(Admin)'");
						
						$email_temp=$email_template->row();	
								
						
						if($email_temp)
						{	
							$user_name="Admin";	
							$message_user_name=$login_user_detail['user_name'];	
							$email_message=$email_temp->message;
							$email_subject=$this->input->post('subject');
							$email_address_from=$email_temp->from_address;
							$email_address_reply=$email_temp->reply_address;
							$email_to = $email_address_from;	
							
							
							$email_message=str_replace('{break}','<br/>',$email_message);
							
							$email_message=str_replace('{user_name}',$user_name,$email_message);
							$email_message=str_replace('{message_user_name}',$message_user_name,$email_message);
							$email_message=str_replace('{content}',$content,$email_message);
							$email_message=str_replace('{message_user_profile_link}',$message_user_profile_link,$email_message);
							$str=$email_message;
							
							email_send($email_address_from,$email_address_reply,$email_to,$email_subject,$str);
						}
						///////=================owner alert===================
					}
					
					if($message_setting->message_enable == 1 && $message_setting->email_user_on_new_message == 1)
					{
						///////////============admin alert==========
						$email_template=$this->db->query("select * from `email_template` where task='Message user profile(User)'");
						$email_temp=$email_template->row();				
						
						if($email_temp)
						{				
							$email_message=$email_temp->message;
							$email_subject=$this->input->post('subject');
							$email_address_from=$email_temp->from_address;
							$email_address_reply=$email_temp->reply_address;
							$email_to = $user_detail['email'];
						
							$email_message=str_replace('{break}','<br/>',$email_message);
							$email_message=str_replace('{user_name}',$user_name,$email_message);			
							$email_message=str_replace('{message_user_name}',$message_user_name,$email_message);
							$email_message=str_replace('{content}',$content,$email_message);
							$email_message=str_replace('{message_user_profile_link}',$message_user_profile_link,$email_message);
							
							$str=$email_message;
						
							email_send($email_address_from,$email_address_reply,$email_to,$email_subject,$str);
						}
						///////=================owner alert===================
					}
					
					echo "<script>parent.window.location.href='".site_url('home/index/'.$msg)."'</script>";
	}

      
}
?>