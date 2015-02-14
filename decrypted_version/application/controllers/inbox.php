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


class Inbox extends ROCKERS_Controller {

	function Inbox()
	{
		parent::__construct();	
		$this->load->model('inbox_model');
		$this->load->model('project_model');
		$this->load->model('home_model');
	}
	
	function index($offset=0,$msg='')
	{
	
		$data = array();
		$meta = meta_setting();
		$data['site_setting'] = site_setting();
		
		$data['header_menu'] = dynamic_menu(0);
		$data['footer_menu'] = dynamic_menu_footer(0);
		$data['right_menu'] = dynamic_menu_right(0);
		$data['site_setting'] = site_setting();
		
		$data['offset']=$offset;
		$data['msg']=$msg;
		
		$this->load->library('pagination');
		$limit = '10';
		$config['uri_segment']='3';
		$config['base_url'] = site_url('inbox/index/');
		$config['total_rows'] = $this->inbox_model->get_count_my_message();
		$config['per_page'] = $limit;
		$this->pagination->initialize($config);	
		//echo $config['total_rows'];die;
		if($config['total_rows']>$limit){
		$data['page_link'] = $this->pagination->create_links();
		}else{
		$config['page_link']="";
		}
		
		
		$data['mymessage'] = $this->inbox_model->list_message($offset,$limit);
		
		
		
		$this->home_model->select_text();
		$this->template->write('meta_title','My Inbox-'. $meta['title'], TRUE);
		$this->template->write('meta_description','My Inbox-'. $meta['meta_description'], TRUE);
		$this->template->write('meta_keyword','My Inbox-'. $meta['meta_keyword'], TRUE);
		
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
				$this->template->write_view('header','default/common/header_login', $data, TRUE);
				$this->template->write_view('main_content', 'default/inbox/list_message', $data, TRUE);
				$this->template->write_view('footer', 'default/common/footer',$data, TRUE);
				$this->template->render();
			}
	}
	
	
	
	function conversation($message_id)
	{
		
		
		
		$data = array();
		
		$chk_message_exist = $this->inbox_model->check_message_exist($message_id);
		if(!$chk_message_exist)
		{
			redirect('inbox');
		}
		
		
		/*Mark message as read*/
		$data_read = array('is_read'=>1);
		$this->db->where('message_id',$message_id);
		$this->db->update('message_conversation',$data_read);
		
		$get_unread_reply = $this->inbox_model->get_unread_replies_read($message_id);
		if($get_unread_reply)
		{	
			$data_read_reply = array('is_read'=>1); 
			$this->db->where('message_id', $get_unread_reply->message_id);
			$this->db->update('message_conversation',$data_read);
		}
		
		$meta = meta_setting();
		$data['one_message'] = $this->inbox_model->get_one_message($message_id);
		$data['site_setting'] = site_setting();
		$data['message_id'] = $message_id;
		
		$data['header_menu'] = dynamic_menu(0);
		$data['footer_menu'] = dynamic_menu_footer(0);
		$data['right_menu'] = dynamic_menu_right(0);
		$data['site_setting'] = site_setting();
		$this->load->library('pagination');
		$limit = '10';
		$config['uri_segment']='3';
		$config['base_url'] = site_url('inbox/list_inbox/');
		$config['total_rows'] = $this->inbox_model->get_count_my_message();
		$config['per_page'] = $limit;
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();
		$data['message_replies'] = $this->inbox_model->get_message_detail($message_id);
		
		
		$show_reply = $this->inbox_model->list_message_for_reply();
		/*print_r($show_reply); die;*/
	//	echo $show_reply->sender_id."   ". get_authenticateUserID();die;
		if($show_reply->sender_id == get_authenticateUserID())
		{
			$data['sendreply'] =1;
		}
		else
		{
			$data['sendreply'] =0;
		}
		
		
		$this->home_model->select_text();
		$this->template->write('meta_title','My Inbox-'. $meta['title'], TRUE);
		$this->template->write('meta_description','My Inbox-'. $meta['meta_description'], TRUE);
		$this->template->write('meta_keyword','My Inbox-'. $meta['meta_keyword'], TRUE);
		
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
				$this->template->write_view('header','default/common/header_login', $data, TRUE);
				$this->template->write_view('main_content', 'default/inbox/message_conversation', $data, TRUE);
				$this->template->write_view('footer', 'default/common/footer',$data, TRUE);
				$this->template->render();
			}
	
	}
	
	function message_reply()
	{
		$data = array();
		$insert_reply = $this->inbox_model->insert_reply();
		
		$message_setting = message_setting();
		
		$sender_info = get_user_detail($this->input->post('sender_id'));
		$receiver_info = get_user_detail($this->input->post('receiver_id'));
		
		
		if($message_setting->message_enable == 1 && $message_setting->email_user_on_new_message == 1)
		{
						///////////============admin alert==========
						$email_template=$this->db->query("select * from `email_template` where task='New Message(Reply)'");
						$email_temp=$email_template->row();				
						$user_name = $receiver_info['user_name'];
						$message_user_name = $sender_info['user_name'];
						$content = $this->input->post('conversation');
						$message_user_profile_link = site_url('member/'.$this->session->userdata('user_id'));	
						$email_to = $receiver_info['email'];
						
						if($email_temp)
						{				
							$email_message=$email_temp->message;
							$email_subject=$email_temp->subject;
							$email_address_from=$email_temp->from_address;
							$email_address_reply=$email_temp->reply_address;
							$email_to = $email_to;	
							
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
					
		
		redirect('inbox');
	
	}
	
		function delete_msg($limit=10)
	{
		
		
		$offset=0;
		$action=$this->input->post('action');
		$msg_id=$this->input->post('chk');
		
		//print_r($msg_id);die;
		
		
		$temp=array();
		
		
	
		
		
		if($action=='delete')
		{	
		
		
		
			foreach($msg_id as $id)
			{
				
				
		$msg_detail=$this->db->query("select * from message_conversation where reply_message_id='".$id."'");
		$msg=$msg_detail->result_array();
			
			
				foreach($msg as  $mc){
					//echo $mc['message_id'];
					$this->inbox_model->delete_msg($mc['message_id']);
				}
		
			//echo $id;die;
								
					$this->inbox_model->delete_msg($id);
					$temp[$id]='delete';
				
			}
			
			redirect('inbox');
		}
		
		
		
		
	}
      
}
?>