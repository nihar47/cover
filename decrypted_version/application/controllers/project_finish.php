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
class Project_finish extends ROCKERS_Controller {

	function Project_finish()
	{
		parent::__construct();	
		$this->load->model('project_model');
		$this->load->model('user_model');
		$this->load->model('home_model');
		
	}
	
	function index()
	{
			
		$site_setting = site_setting();	
	
		if($site_setting['currency_code']!='') { $currency_code=$site_setting['currency_code'];	} else
		{	$currency_code='USD';	}
		
		
		
		$cur_date=date('Y-m-d');
		$projects=$this->db->query("select * from project where end_send=0 and DATE_ADD(end_date, INTERVAL 1 DAY)='".$cur_date."'");	
		
		
		if($projects->num_rows()>0)
		{
		
			$project_detail=$projects->result();
			
			
			//echo "<pre>";
			//print_r($project_detail);
			//die();
			
			$project_count=count($project_detail);
			
			for($i=0;$i<$project_count;$i++)
			{
				$proj=$project_detail[$i];
				
				
				$project_id=$proj->project_id;	
				
				
				///////////====make project inactive=======
				$this->db->query("update project set active='0',status='5' where project_id='".$project_id."'");
				
				
				///////////====project detail========
				
				$project_name=$proj->project_title;
				$url_project_name=$proj->url_project_title;
				$project_page_link=site_url('projects/'.$url_project_name.'/'.$project_id);
				$project_goal=set_currency($proj->amount);
				$project_total_raise=set_currency($proj->amount_get);
				$project_summary=$proj->project_summary;
				
				///////////====creator detail========
				$creator_id=$proj->user_id;				
				$get_creator=$this->db->query("select * from user where user_id='".$creator_id."'");
				$creator_detail=$get_creator->row();
				
				$user_name=$creator_detail->user_name.' '.$creator_detail->last_name;
				$creator_email=$creator_detail->email;
				$user_profile_link=site_url('member/'.$creator_id);
				
				
				
				
			///////////===========get admin template=========================	
				
				
				
			$admin_email_template=$this->db->query("select * from `email_template` where task='Project Finish Admin Alert'");
			$admin_email_temp=$admin_email_template->row();				
							
			$admin_email_message=$admin_email_temp->message;
			$admin_email_subject=$admin_email_temp->subject;
			
			$admin_email_address_from=$admin_email_temp->from_address;
			$admin_email_address_reply=$admin_email_temp->reply_address;	
			
			$admin_email_message=str_replace('{break}','<br/>',$admin_email_message);
			
			$admin_email_message=str_replace('{project_name}',$project_name,$admin_email_message);
			$admin_email_message=str_replace('{project_page_link}',$project_page_link,$admin_email_message);
			$admin_email_message=str_replace('{project_goal}',$project_goal,$admin_email_message);
			$admin_email_message=str_replace('{project_total_raise}',$project_total_raise,$admin_email_message);
			$admin_email_message=str_replace('{project_summary}',$project_summary,$admin_email_message);
			
			
			$admin_email_message=str_replace('{user_name}',$user_name,$admin_email_message);	
			$admin_email_message=str_replace('{user_profile_link}',$user_profile_link,$admin_email_message);	
			
			$backer_list='';
			
				///////////====get all donor detail========
				
				$get_all_donor=$this->db->query("select * from transaction where project_id='".$project_id."'");
				
				if($get_all_donor->num_rows()>0)
				{
				
					$donor_email_template=$this->db->query("select * from `email_template` where task='Project Finish Donor Alert'");
					$donor_email_temp=$donor_email_template->row();				
									
					$donor_email_message=$donor_email_temp->message;
					$donor_email_subject=$donor_email_temp->subject;
					
					$donor_email_address_from=$donor_email_temp->from_address;
					$donor_email_address_reply=$donor_email_temp->reply_address;	
					
					$donor_email_message=str_replace('{break}','<br/>',$donor_email_message);
					
					$donor_email_message=str_replace('{project_name}',$project_name,$donor_email_message);
					$donor_email_message=str_replace('{project_page_link}',$project_page_link,$donor_email_message);
					$donor_email_message=str_replace('{project_goal}',$project_goal,$donor_email_message);
					$donor_email_message=str_replace('{project_total_raise}',$project_total_raise,$donor_email_message);
					$donor_email_message=str_replace('{project_summary}',$project_summary,$donor_email_message);
					
					
					$donor_email_message=str_replace('{user_name}',$user_name,$donor_email_message);	
					$donor_email_message=str_replace('{user_profile_link}',$user_profile_link,$donor_email_message);	
				
					$backer_list.='<table border="0" cellpadding="0" cellspacing="0">';
					
					$all_donors=$get_all_donor->result();
					
					$donor_count=count($all_donors);
					
					for($j=0;$j<$donor_count;$j++)
					{
						
						$donors=$all_donors[$j];
						
						$donate_amount=set_currency(($donors->amount+$donors->pay_fee));
						$donate_date=date('d M,Y H:i:s',strtotime($donors->transaction_date_time));
						
						///////////====donor detail========
						$donor_id=$donors->user_id;
						$get_donor=$this->db->query("select * from user where user_id='".$donor_id."'");
						$donor_detail=$get_donor->row();
						
						$donor_name=$donor_detail->user_name.' '.$donor_detail->last_name;
						$donor_email=$donor_detail->email;
						$donor_profile_link=site_url('member/'.$donor_id);
						
						
						$donor_email_message=str_replace('{donor_name}',$donor_name,$donor_email_message);
						
						$backer_list.='<tr><td align="left" valign="top"><a href="'.$donor_profile_link.'">'.$donor_name.'</a></td><td align="left" valign="top"><b>'.$donate_amount.'</b></td><td align="left" valign="top">'.$donate_date.'</td></tr>';
						
						$own_backer='<tr><td align="left" valign="top"><a href="'.$donor_profile_link.'">'.$donor_name.'</a></td><td align="center" valign="top"><b>'.$donate_amount.'</b></td><td align="left" valign="top">'.$donate_date.'</td></tr>';
						
						
						
						//////////===send individual donor email====
						
						$donor_email_message=str_replace('{own_backer}',$own_backer,$donor_email_message);			
						$str_donor=$donor_email_message;
						
						if($donor_email!='')
						{							
							
							$email_to = $donor_email;
							email_send($donor_email_address_from,$donor_email_address_reply,$email_to,$donor_email_subject,$str_donor);
							
						}
						
						//////////===send individual donor email====
						
					
					}//////======donor for loop			
					
					
					$backer_list.='</table>';
				
				}/////======donor if loop
				
				
				
				
				
				
			$admin_email_message=str_replace('{backer_list}',$backer_list,$admin_email_message);			
			$admin_str=$admin_email_message;
				
				
			////////////=========send admin email===============	
					
			email_send($admin_email_address_from,$admin_email_address_reply,$admin_email_address_from,$admin_email_subject,$admin_str);		
			
				
			////////////=========send admin email===============	
			
			
			
			
			////////////==============project owner email==========
			
			$creator_email_template=$this->db->query("select * from `email_template` where task='Project Finish Owner Alert'");
			$creator_email_temp=$creator_email_template->row();				
							
			$creator_email_message=$creator_email_temp->message;
			$creator_email_subject=$creator_email_temp->subject;
			
			$creator_email_address_from=$creator_email_temp->from_address;
			$creator_email_address_reply=$creator_email_temp->reply_address;	
			
			$creator_email_message=str_replace('{break}','<br/>',$creator_email_message);
			
			$creator_email_message=str_replace('{project_name}',$project_name,$creator_email_message);
			$creator_email_message=str_replace('{project_page_link}',$project_page_link,$creator_email_message);
			$creator_email_message=str_replace('{project_goal}',$project_goal,$creator_email_message);
			$creator_email_message=str_replace('{project_total_raise}',$project_total_raise,$creator_email_message);
			$creator_email_message=str_replace('{project_summary}',$project_summary,$creator_email_message);
			
			
			$creator_email_message=str_replace('{user_name}',$user_name,$creator_email_message);	
			$creator_email_message=str_replace('{user_profile_link}',$user_profile_link,$creator_email_message);
						
			$creator_email_message=str_replace('{backer_list}',$backer_list,$creator_email_message);			
			$creator_str=$creator_email_message;
			
			
			email_send($creator_email_address_from,$creator_email_address_reply,$creator_email,$creator_email_subject,$creator_str);		
		
			
			
			/*$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html;' . "\r\n";
			
			// Additional headers
			
			$headers .= 'From: '.$site_setting['site_name'].' <'.$creator_email_address_from.'>' . "\r\n";
			mail($creator_email,$creator_email_subject,$creator_str,$headers);*/
			
			////////////==============project owner email==========
			
			
			
				
			///////////====make project end_send to 1=======
			$this->db->query("update project set end_send='1' where project_id='".$project_id."'");	
				
				
			
			}///////=====project for loop===		
		
		}////////====first numrows if	
		
		
		
	}
	
	
}


?>