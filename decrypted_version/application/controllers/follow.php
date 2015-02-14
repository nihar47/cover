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


class Follow extends ROCKERS_Controller {

	function Follow()
	{
		parent::__construct();	
		$this->load->model('follow_model');
		$this->load->model('project_model');
		$this->load->model('home_model');
	}
	
	function index()
	{
		redirect('home/index');
	}
	
	function follow_user($id)
	{
		
		$follow_user = $this->follow_model->follow_user($id);
		
		
		$user_notification = usernotifications(get_authenticateUserID());
	
		//////////=======new followers alert ================
		if($user_notification['followers'] == 1)
		{
			
			$user_info = get_user_detail(get_authenticateUserID());
			$follow_user_info = get_user_detail($id);
			
			$username = $follow_user_info['user_name'];
			$follow_user_name = $user_info['user_name'];
			$follow_user_profile_link = site_url('member/'.get_authenticateUserID());
			
			$email_template=$this->db->query("select * from `email_template` where task='User Follow'");
			$email_temp=$email_template->row();
			
			$email_address_from=$email_temp->from_address;
			$email_address_reply=$email_temp->reply_address;
			
			$email_subject=$email_temp->subject;
			$email_message=$email_temp->message;
			
			$email_to=$follow_user_info['email'];
			
			$email_message=str_replace('{break}','<br/>',$email_message);
			$email_message=str_replace('{user_name}',$username,$email_message);
			$email_message=str_replace('{follow_user_name}',$follow_user_name,$email_message);
			$email_message=str_replace('{follow_user_profile_link}',$follow_user_profile_link,$email_message);
		
			 $str=$email_message;
			email_send($email_address_from,$email_address_reply,$email_to,$email_subject,$str);
		}
			//////////=======new comment admin alert================
		
	
		echo "follow";
		die;

	}
	
	function unfollow_user($id)
	{
		
		$checkfollow = $this->follow_model->checkfollow_user($id);
		if($checkfollow)
		{	
			$this->db->delete('user_follow',array("follow_user_id"=>$id,"follow_by_user_id"=>$this->session->userdata('user_id')));
			echo "unfollow"; 
			die();
			
		}
	}
 
 	function follow_project($project_id='')
	{
		$follow_project = $this->follow_model->follow_project($project_id);
		echo "followproject";
		die;
	}
	function unfollow_project($id)
	{
		
		$checkfollow = $this->follow_model->checkfollow_project($id);
		if($checkfollow)
		{	
			$this->db->delete('project_follower',array("project_id"=>$id,"project_follow_user_id "=>$this->session->userdata('user_id')));
			echo "unfollowproject"; 
			die();
			
		}
	}
	
	function block_user($id)
	{
		$block_user = $this->follow_model->block_user($id);
		echo "block";
		die;
	}
	function unblock_user($id)
	{
		
		$checkblock = $this->follow_model->checkblock_user($id);
		if($checkblock)
		{	
			$this->db->delete('block_user',array("block_user_id"=>$id,"block_by_user_id "=>$this->session->userdata('user_id')));
			echo "unblockuser"; 
			die();
			
		}
	}
      
}
?>