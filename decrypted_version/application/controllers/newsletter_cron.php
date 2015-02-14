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
class Newsletter_cron extends ROCKERS_Controller {

	function Newsletter_cron()
	{
		parent::__construct();	
		$this->load->model('newsletter_model');
		$this->load->model('home_model');
		$this->load->model('project_model');
		$this->load->model('user_model');		
		
	}
	
	function index()
	{
		redirect('home/');	
	}
	
	
	function send()
	{
		
	
		$base_path = base_path();
		
		$newsletter_control=$this->db->query("select * from newsletter_setting");
		$newsletter_setting=$newsletter_control->row();
			
			
			$email_address_from=$newsletter_setting->newsletter_from_address;
			$email_from_name=$newsletter_setting->newsletter_from_name;
			
			$email_address_reply=$newsletter_setting->newsletter_reply_name;
			$email_reply_name=$newsletter_setting->newsletter_reply_address;
			
			
		
		///////////////////============Email Setting===================================
		
		
		
				
		$chk_job=$this->db->query("select * from newsletter_job where job_start_date='".date('Y-m-d')."'");
		
		if($chk_job->num_rows()>0)
		{
			
			$job_list=$chk_job->result();
			
						
			foreach($job_list as $job)
			{
			
				///////////================job details===============	
				$get_job_details=$this->db->query("select * from newsletter_job where job_id='".$job->job_id."'");
				$job_details=$get_job_details->row();
				
				if($job_details->newsletter_id!='' && $job_details->newsletter_id > 0)
				{ 
					///////////================newsletter details===============
					$get_newsletter_details=$this->db->query("select * from newsletter_template where newsletter_id='".$job_details->newsletter_id."'");					
					$newsletter_details=$get_newsletter_details->row();
					
					
					
					///////////================subscriber details===============									
					$chk_newsletter_subscriber=$this->db->query("select * from newsletter_subscribe where newsletter_id='".$job_details->newsletter_id."'");	
					$count_total_subscriber=$chk_newsletter_subscriber->num_rows();
					
					if($count_total_subscriber>0)
					{
					
					//////////////==========check sending total if send all then stop otherwise continue
					if($job_details->send_total<$count_total_subscriber)
					{
						$get_newsletter_subscriber=$this->db->query("select * from newsletter_subscribe where newsletter_id='".$job_details->newsletter_id."' LIMIT ".$newsletter_setting->number_of_email_send." OFFSET ".$job_details->send_total);
						
						
						if($get_newsletter_subscriber->num_rows()>0)
						{
							$newsletter_subscriber=$get_newsletter_subscriber->result();
							$cnt=0;
							foreach($newsletter_subscriber as $subscribe)
							{
								
								////get user email details and newsletter template and add track code and subscibe,unscribe link make report id and status fail and sucess and generate 
								
								$get_newsletter_user_details=$this->db->query("select * from newsletter_user where newsletter_user_id='".$subscribe->newsletter_user_id."'");
								
								if($get_newsletter_user_details->num_rows()>0)
								{
									$newsletter_user_details=$get_newsletter_user_details->row();
									
									if($newsletter_user_details->email!='')
									{
										
										$email_subject=$newsletter_details->subject;				
										$email_message=$newsletter_details->template_content;
										$attach_file=$newsletter_details->attach_file;
										$allow_subscribe_link=$newsletter_details->allow_subscribe_link;
										$allow_unsubscribe_link=$newsletter_details->allow_unsubscribe_link;
										
										$subscribe_link='<a href="'.site_url('newsletter/subscribe/'.$newsletter_user_details->email.'/'.$job_details->newsletter_id).'" style="color:#666666;">Subscribe</a>';
										
										
										$unsubscribe_link='<a href="'.site_url('newsletter/unsubscribe/'.$newsletter_user_details->email.'/'.$job_details->newsletter_id).'" style="color:#666666;">UnSubscribe</a>';
										
										
										if($allow_subscribe_link==1 || $allow_subscribe_link=='1')
										{
											$email_message.='<div style="clear:both;">'.$subscribe_link.'</div>';									
										}
										
										if($allow_unsubscribe_link==1 || $allow_unsubscribe_link=='1')
										{
											$email_message.='<div style="clear:both;">'.$unsubscribe_link.'</div>';									
										}
										
										
										$insert_report=$this->db->query("insert into newsletter_report(`newsletter_user_id`,`job_id`)values('".$subscribe->newsletter_user_id."','".$job->job_id."')");	
										
										$report_id=mysql_insert_id();
										
			$track_link='<img src="'.site_url('newsletter/open/'.$report_id).'" border="0" width="1" height="1" />';
										
										$str.=$track_link;
										
										$email_to = $newsletter_user_details->email;
										
										email_send($email_address_from,$email_address_reply,$email_to,$email_subject,$str);						
 										
										
										if(file_exists($base_path.'upload/newsletter/'.$attach_file))
										{										
											$this->email->attach($base_path.'upload/newsletter/'.$attach_file);										
										}
										
										if($this->email->send())
										{
											////insert success details=====
										
										//*$make_success=$this->db->query("insert into newsletter_report(`newsletter_user_id`,`job_id`,`is_fail`)values('".$subscribe->newsletter_user_id."','".$job->job_id."','1')");*/
										
											
										}
										else
										{
											////insert fail details=====
										
										$make_fail=$this->db->query("insert into newsletter_report(`newsletter_user_id`,`job_id`,`is_fail`)values('".$subscribe->newsletter_user_id."','".$job->job_id."','1')");
										
										}
										
										$cnt++;
										
									}
									else
									{
										////insert fail details=====
										
										$make_fail=$this->db->query("insert into newsletter_report(`newsletter_user_id`,`job_id`,`is_fail`)values('".$subscribe->newsletter_user_id."','".$job->job_id."','1')");									
																			
									}
																	
								
								}///////////===check user exists			
													
								
															
							}
							
							
							
						$all_send=(int)$job_details->send_total+(int)$cnt;
							
				$update_send_total=$this->db->query("update newsletter_job set send_total='".$all_send."' where job_id='".$job->job_id."'");
						
						
							
							
						}
							
						
											
					}			
					
					 
					 } //////====count check for greater 0
				
				}///////==check newsletter==			
			
			}
					
		
		}
		
	
		
	
	///////=======subscribe link base_url().'/subscribe/'.$newsletter_user_email.'/'.$newsletter_id
	
	///////=======unsubscribe link base_url().'/unsubscribe/'.$newsletter_user_email.'/'.$newsletter_id
	
	///======put the tracking code url base_url().'/newsletter/open/'.$report_id (get from last insert id)
	
	}
	
}


?>