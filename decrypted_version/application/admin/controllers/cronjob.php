<?php

class Cronjob extends CI_Controller {

	function Cronjob()
	{
		parent::__construct();
		$this->load->model('cronjob_model');
		$this->load->model('home_model');
		
	}
	
	function index()
	{
		redirect('cronjob/list_cronjob/');
	}
	
	
	function list_cronjob($limit='20',$offset=0,$msg='')
	{
		
		$check_rights=$this->home_model->get_rights('list_cronjob');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		
		
		$this->load->library('pagination');

		$config['uri_segment']='4';
		$config['base_url'] = site_url('cronjob/list_cronjob/'.$limit.'/');
		$config['total_rows'] = $this->cronjob_model->get_total_cronjob_count();
		$config['per_page'] = $limit;		
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();
		
		$data['result'] = $this->cronjob_model->get_cronjob_result($offset, $limit);
		$data['msg'] = $msg;
		$data['offset'] = $offset;
		$data['limit']=$limit;
		$data['option']='';
		$data['keyword']='';
		$data['search_type']='normal';
		$data['crons'] = $this->cronjob_model->get_cron_function();
		
		$data['site_setting'] = $this->home_model->select_site_setting();
		
		$this->template->write('title', 'Cron Jobs', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'list_cronjob', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}
		
	
	function run(){
		$check_rights=$this->home_model->get_rights('list_cronjob');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		$function = $this->input->post('option');

		redirect('cronjob/'.$function);
	
	}
	
	
	function affiliate_update_earn_status()
	{
		
			$this->db->query("delete FROM `cronjob` WHERE cronjob='affiliate_update_earn_status' and status=0 and date_run < DATE_ADD(now(), INTERVAL -1 HOUR)");	
			
			$common_setting=affiliate_setting();
		
		$hold_days=$common_setting->commission_holding_period;
		
		$date=date('Y-m-d');
		
		$query =$this->db->query("select * from affiliate_user_earn where earn_status=0 and DATE(date_sub(earn_date,interval ".$hold_days." day)) >= '".$date."'");
			
		if($query->num_rows() > 0)
		{
			$res=$query->result();
			
			foreach($res as $row)
			{
				$this->db->where('user_earn_id',$row->user_earn_id);
				$this->db->update('affiliate_user_earn',array('earn_status'=>1));
			}
				
			$data = array(
						'user_id' => $this->session->userdata('admin_id'),
						'cronjob' => 'affiliate_update_earn_status',
						'date_run' =>date('Y-m-d H:i:s'),
						'status' => '1',
					);
			$this->db->insert('cronjob', $data);
			redirect('cronjob/list_cronjob');
			
		} else {
			
			$data = array(
						'user_id' => $this->session->userdata('admin_id'),
						'cronjob' => 'affiliate_update_earn_status',
						'date_run' =>date('Y-m-d H:i:s'),
						'status' => '0',
					);
			$this->db->insert('cronjob', $data);
			redirect('cronjob/list_cronjob');
		}
		
	}
	
	function set_auto_ending(){
	
				////////// check rights of cronjob
				$check_rights=$this->home_model->get_rights('list_cronjob');
				
				if(	$check_rights==0) {			
					redirect('home/dashboard/no_rights');	
				}
		/////// Email Setting
				$CI =& get_instance();
				$base_path = front_base_url();
		
				
				$email_setting=$this->db->query("select * from `email_setting` where email_setting_id='1'");
					$email_set=$email_setting->row();
					
				$this->db->query("delete FROM `cronjob` WHERE cronjob='set_auto_ending' and status=0 and date_run < DATE_ADD(now(), INTERVAL -1 HOUR)");	
									
				
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
		
					$query = $this->db->query("select * from site_setting");
					$site = $query->row_array();
				
		
		////////////// fetch % of calculating successful projects
		$sites = $this->db->query("select * from site_setting");
		$site_setting=$sites->row();
		
		$w = $this->db->query("select * from wallet_setting");
		$wd = $w->row();	
		
					
		$successful=$site_setting->successful;
		
		if($successful=='') { $successful='60'; }
		
		///////////// fetch ended projects
		$query = $this->db->query("select * from project where end_date < '".date('Y-m-d H:i:s')."' and active='1'");
		
		
		if($query->num_rows() > 0){
			$result = $query->result();
			
			foreach($result as $rs){
				
				$perc = $rs->amount * $successful / 100;
				
					///////======== PAYMENT_TYPE  = 0  FIXED   OR  FLXIBLE  =  1
					
					
					
					///===FLEXIBLE
					////////////// check if project is successful  
					if($rs->payment_type == '1'){
						
						
						
						/////////// confirm all the donations
						$query = $this->db->query("update wallet set donate_status=1 where project_id='".$rs->project_id."'");
												
						if($rs->amount_get >= $rs->amount){
							$transaction_fees = $site_setting->suc_flexible_fees;
						}else{
							$transaction_fees = $site_setting->flexible_fees;
						}	
						
						$query = $this->db->query("update wallet set donate_status=1, debit= (debit - (debit * ".$transaction_fees." / 100 )) where project_id='".$rs->project_id."' and debit<>''");
						
						
						
							
						
				///////////==========affiliate earn=============
			
				$affiliate_setting=affiliate_setting();
			
				if($affiliate_setting->affiliate_enable==1) 
				{ 
					
					
					$pledge_commission=affiliate_commission_setting(2);
					
					
					
					///////========get project donor for affiliate
					$aff_query = $this->db->query("select * from wallet where credit>0 and project_id='".$rs->project_id."'");	
						
					
					if($aff_query->num_rows()>0)
					{
						
						$aff_res=$aff_query->result();
						
						foreach($aff_res as $afs)
						{
							
							
							$login_user=get_user_detail($afs->user_id);
							
							$donote_amount=$afs->credit;
							$perk_id=0;
							$project_id=$afs->project_id;
							$transaction_id=$afs->wallet_transaction_id;
							
							
							////======donor is referral user then all/one pledge goes to referral
					
							if($login_user['reference_user_id']!='' && $login_user['reference_user_id']>0)
							{
								$get_affiliate_user=get_user_detail($login_user['reference_user_id']);
						
								if($get_affiliate_user)
								{
							
							///===get commission amount and add to user earn table with pending status
									
							
								if($pledge_commission)
								{
									
									$pledge_commission_fee=$pledge_commission->commission;
									
									if($pledge_commission_fee>0)
									{
										
										if($pledge_commission->type=='%')
										{
											$final_pledge_fee=($donote_amount*$pledge_commission_fee)/100;
										}
										else
										{
											$final_pledge_fee=$pledge_commission_fee;
										}
										
										
										
										////=======check one time or every time payment enable
										
										if($affiliate_setting->pay_commission_pledge==1)
										{
										
											$earn_data=array(
											'user_id'=>$get_affiliate_user['user_id'],
											'project_id'=>$project_id,
											'perk_id'=>$perk_id,
											'transaction_id'=>$transaction_id,
											'earn_amount'=>$final_pledge_fee,
											'earn_date'=>date('Y-m-d H:i:s'),
											'earn_status'=>0
											);
											$this->db->insert('affiliate_user_earn',$earn_data);
										}
										else
										{
											
											$affiliate_user_id=$get_affiliate_user['user_id'];
											
									$check_user_already_get_commission=check_user_one_time_commission($affiliate_user_id,$project_id);
										
											if($check_user_already_get_commission==0)
											{																					
												$earn_data=array(
												'user_id'=>$get_affiliate_user['user_id'],
												'project_id'=>$project_id,
												'perk_id'=>$perk_id,
												'transaction_id'=>$transaction_id,
												'earn_amount'=>$final_pledge_fee,
												'earn_date'=>date('Y-m-d H:i:s'),
												'earn_status'=>0
												);
												$this->db->insert('affiliate_user_earn',$earn_data);
											}									
										}
										
										
										////=======
										
									}
									
								}					
							
						
							}
						
						
						}
					
							/////===========
						
						}
						
					}
					///////========end project donor for affiliate
					
					
					
				}
						
									
					///////////==========affiliate earn=============		
		
					
						
						
						
						
						
						
						
					
						
						
						// update project table
						$this->db->query("update project set status='5', active='3' where project_id='".$rs->project_id."'");
						
						$this->db->query("update transaction set wallet_payment_status='0' where project_id='".$rs->project_id."'");
						/*********** Emails  *************/
					
					$prj = $this->db->query("select * from project, user where project.user_id=user.user_id and project.project_id='".$rs->project_id."'");
					$p = $prj->row_array();
					
					
			
				
				/***** owner notification *****/		
					$email_template=$this->db->query("select * from `email_template` where task='Project Successful User Notification'");
					$email_temp=$email_template->row();
					
					
					$email_address_from=$email_temp->from_address;
					$email_address_reply=$email_temp->reply_address;
					
					$email_subject=$email_temp->subject;				
					$email_message=$email_temp->message;
					
					$user_name =$p['user_name'];
					
					$donote_amount = set_currency($p['amount_get']);
					
					$project_name = $p['project_title'];
					$project_page_link=front_base_url().'projects/'.$p['url_project_title'].'/'.$rs->project_id;
					
				 	$email_to =$p['email'];
					
					
					$login_link=base_url();
					
					$email_message=str_replace('{break}','<br/>',$email_message);
					$email_message=str_replace('{project_name}',$project_name,$email_message);
					$email_message=str_replace('{user_name}',$user_name,$email_message);
					$email_message=str_replace('{project_page_link}',$project_page_link,$email_message);
						
					$str=$email_message;
				
				
					
					$this->email->from($email_address_from);
					$this->email->reply_to($email_address_reply);
					$this->email->to($email_to);
					$this->email->subject($email_subject);
					$this->email->message($str);
					$this->email->send();
			
			
			
			/****** admin notification ********/
					$email_template=$this->db->query("select * from `email_template` where task='Project Successful Admin Notification'");
					$email_temp=$email_template->row();
					
					
					$email_address_from=$email_temp->from_address;
					$email_address_reply=$email_temp->reply_address;
					
					$email_subject=$email_temp->subject;				
					$email_message=$email_temp->message;
					
					
					
				 	$email_to =$email_address_from;
					
					
					$login_link=base_url();
					
					$email_message=str_replace('{break}','<br/>',$email_message);
					$email_message=str_replace('{project_name}',$project_name,$email_message);
						$email_message=str_replace('{project_page_link}',$project_page_link,$email_message);
					
					$str=$email_message;
				
				
					
					$this->email->from($email_address_from);
					$this->email->reply_to($email_address_reply);
					$this->email->to($email_to);
					$this->email->subject($email_subject);
					$this->email->message($str);
					$this->email->send();
			
			/***************************/
					
					
					}
					//elseif($rs->amount_get >=$rs->amount and $site_setting->enable_funding_option =='1' and $rs->payment_type =='0' and $wd->wallet_payment_type =='1'){	
					
					elseif($rs->amount_get >=$rs->amount and $rs->payment_type =='0' and $wd->wallet_payment_type =='1'){	
						
						
						/////////// confirm all the donations
						$query = $this->db->query("update wallet set donate_status=1 where project_id='".$rs->project_id."'");
						
						$transaction_fees = $site_setting->fixed_fees;
						
						$query = $this->db->query("update wallet set donate_status=1, debit= (debit - ((debit * ".$transaction_fees." / 100 )-100)) where project_id='".$rs->project_id."' and debit<>''");
						
						
						
						
						
						
						
						
						
						
			///////////==========affiliate earn=============
			
				$affiliate_setting=affiliate_setting();
			
				if($affiliate_setting->affiliate_enable==1) 
				{ 
					
					
					$pledge_commission=affiliate_commission_setting(2);
					
					
					
					///////========get project donor for affiliate
					$aff_query = $this->db->query("select * from wallet where credit>0 and project_id='".$rs->project_id."'");	
						
					
					if($aff_query->num_rows()>0)
					{
						
						$aff_res=$aff_query->result();
						
						foreach($aff_res as $afs)
						{
							
							
							$login_user=get_user_detail($afs->user_id);
							
							$donote_amount=$afs->credit;
							$perk_id=0;
							$project_id=$afs->project_id;
							$transaction_id=$afs->wallet_transaction_id;
							
							
							////======donor is referral user then all/one pledge goes to referral
					
							if($login_user['reference_user_id']!='' && $login_user['reference_user_id']>0)
							{
								$get_affiliate_user=get_user_detail($login_user['reference_user_id']);
						
								if($get_affiliate_user)
								{
							
							///===get commission amount and add to user earn table with pending status
									
							
								if($pledge_commission)
								{
									
									$pledge_commission_fee=$pledge_commission->commission;
									
									if($pledge_commission_fee>0)
									{
										
										if($pledge_commission->type=='%')
										{
											$final_pledge_fee=($donote_amount*$pledge_commission_fee)/100;
										}
										else
										{
											$final_pledge_fee=$pledge_commission_fee;
										}
										
										
										
										////=======check one time or every time payment enable
										
										if($affiliate_setting->pay_commission_pledge==1)
										{
										
											$earn_data=array(
											'user_id'=>$get_affiliate_user['user_id'],
											'project_id'=>$project_id,
											'perk_id'=>$perk_id,
											'transaction_id'=>$transaction_id,
											'earn_amount'=>$final_pledge_fee,
											'earn_date'=>date('Y-m-d H:i:s'),
											'earn_status'=>0
											);
											$this->db->insert('affiliate_user_earn',$earn_data);
										}
										else
										{
											
											$affiliate_user_id=$get_affiliate_user['user_id'];
											
									$check_user_already_get_commission=check_user_one_time_commission($affiliate_user_id,$project_id);
										
											if($check_user_already_get_commission==0)
											{																					
												$earn_data=array(
												'user_id'=>$get_affiliate_user['user_id'],
												'project_id'=>$project_id,
												'perk_id'=>$perk_id,
												'transaction_id'=>$transaction_id,
												'earn_amount'=>$final_pledge_fee,
												'earn_date'=>date('Y-m-d H:i:s'),
												'earn_status'=>0
												);
												$this->db->insert('affiliate_user_earn',$earn_data);
											}									
										}
										
										
										////=======
										
									}
									
								}					
							
						
							}
						
						
						}
					
							/////===========
						
						}
						
					}
					///////========end project donor for affiliate
					
					
					
				}
						
									
					///////////==========affiliate earn=============	
						
						
						
						
						
						
						
						// update project table
						$this->db->query("update project set status='5', active='3' where project_id='".$rs->project_id."'");
						
						$this->db->query("update transaction set wallet_payment_status='0' where project_id='".$rs->project_id."'");
						/*********** Emails  *************/
					
					$prj = $this->db->query("select * from project, user where project.user_id=user.user_id and project.project_id='".$rs->project_id."'");
					$p = $prj->row_array();
					
					
			
				
				/***** owner notification *****/		
					$email_template=$this->db->query("select * from `email_template` where task='Project Successful User Notification'");
					$email_temp=$email_template->row();
					
					
					$email_address_from=$email_temp->from_address;
					$email_address_reply=$email_temp->reply_address;
					
					$email_subject=$email_temp->subject;				
					$email_message=$email_temp->message;
					
					$user_name =$p['user_name'];
					
					$donote_amount = set_currency($p['amount_get']);
					
					$project_name = $p['project_title'];
					$project_page_link=front_base_url().'projects/'.$p['url_project_title'].'/'.$rs->project_id;
					
				 	$email_to =$p['email'];
					
					
					$login_link=base_url();
					
					$email_message=str_replace('{break}','<br/>',$email_message);
					$email_message=str_replace('{project_name}',$project_name,$email_message);
					$email_message=str_replace('{user_name}',$user_name,$email_message);
					$email_message=str_replace('{project_page_link}',$project_page_link,$email_message);
						
					$str=$email_message;
				
				
					
					$this->email->from($email_address_from);
					$this->email->reply_to($email_address_reply);
					$this->email->to($email_to);
					$this->email->subject($email_subject);
					$this->email->message($str);
					$this->email->send();
			
			
			
			/****** admin notification ********/
					$email_template=$this->db->query("select * from `email_template` where task='Project Successful Admin Notification'");
					$email_temp=$email_template->row();
					
					
					$email_address_from=$email_temp->from_address;
					$email_address_reply=$email_temp->reply_address;
					
					$email_subject=$email_temp->subject;				
					$email_message=$email_temp->message;
					
					
					
				 	$email_to =$email_address_from;
					
					
					$login_link=base_url();
					
					$email_message=str_replace('{break}','<br/>',$email_message);
					$email_message=str_replace('{project_name}',$project_name,$email_message);
						$email_message=str_replace('{project_page_link}',$project_page_link,$email_message);
					
					$str=$email_message;
				
				
					
					$this->email->from($email_address_from);
					$this->email->reply_to($email_address_reply);
					$this->email->to($email_to);
					$this->email->subject($email_subject);
					$this->email->message($str);
					$this->email->send();
			
			/***************************/
					}
					else{
						
						
					/////////// REFUND back all the donations
					
					
					
					$w = $this->db->query("select * from wallet_setting");
					$wd = $w->row();	
					
					if($wd->wallet_payment_type=='1'){
					$query = $this->db->query("update wallet set donate_status=2 where project_id='".$rs->project_id."'");
						
						//update transaction table
						$this->db->query("update transaction set wallet_payment_status='2' where project_id='".$rs->project_id."'");
						
						// update project table
						$this->db->query("update project set status='5', active='3',amount_get=0 where project_id='".$rs->project_id."'");
							
						/*********** Emails  *************/
					
					$prj = $this->db->query("select * from project, user where project.user_id=user.user_id and project.project_id='".$rs->project_id."'");
					$p = $prj->row_array();
					
					
			
				
				/***** owner notification *****/		
					$email_template=$this->db->query("select * from `email_template` where task='Project Cancelled User Notification'");
					$email_temp=$email_template->row();
					
					
					$email_address_from=$email_temp->from_address;
					$email_address_reply=$email_temp->reply_address;
					
					$email_subject=$email_temp->subject;				
					$email_message=$email_temp->message;
					
					$user_name =$p['user_name'];
					
					$donote_amount = set_currency($p['amount_get']);
					
					$project_name = $p['project_title'];
					$project_page_link=front_base_url().'projects/'.$p['url_project_title'].'/'.$rs->project_id;
					
				 	$email_to =$p['email'];
					
					
					$login_link=base_url();
					
					$email_message=str_replace('{break}','<br/>',$email_message);
					$email_message=str_replace('{project_name}',$project_name,$email_message);
					$email_message=str_replace('{user_name}',$user_name,$email_message);
					$email_message=str_replace('{project_page_link}',$project_page_link,$email_message);
						
					$str=$email_message;
				
				
					
					$this->email->from($email_address_from);
					$this->email->reply_to($email_address_reply);
					$this->email->to($email_to);
					$this->email->subject($email_subject);
					$this->email->message($str);
					$this->email->send();
			
			
			
			/****** admin notification ********/
					$email_template=$this->db->query("select * from `email_template` where task='Project Cancelled Admin Notification'");
					$email_temp=$email_template->row();
					
					
					$email_address_from=$email_temp->from_address;
					$email_address_reply=$email_temp->reply_address;
					
					$email_subject=$email_temp->subject;				
					$email_message=$email_temp->message;
					
					
					
				 	$email_to =$email_address_from;
					
					
					$login_link=base_url();
					
					$email_message=str_replace('{break}','<br/>',$email_message);
					$email_message=str_replace('{project_name}',$project_name,$email_message);
					$email_message=str_replace('{project_page_link}',$project_page_link,$email_message);
					
					$str=$email_message;
				
				
					
					$this->email->from($email_address_from);
					$this->email->reply_to($email_address_reply);
					$this->email->to($email_to);
					$this->email->subject($email_subject);
					$this->email->message($str);
					$this->email->send();
			
			/***************************/
						}
					}
					
	
			}
			/////////// save cron job run time
			$data = array(
						'user_id' => $this->session->userdata('admin_id'),
						'cronjob' => 'set_auto_ending',
						'date_run' =>date('Y-m-d H:i:s'),
						'status' => '1',
					);
			$this->db->insert('cronjob', $data);
			redirect('cronjob/list_cronjob');
			
		}
		else{
			$data = array(
						'user_id' => $this->session->userdata('admin_id'),
						'cronjob' => 'set_auto_ending',
						'date_run' =>date('Y-m-d H:i:s'),
						'status' => '0',
					);
			$this->db->insert('cronjob', $data);
			redirect('cronjob/list_cronjob');
		}
		////////// save cron job run time
		
		redirect('cronjob/list_cronjob');
	
		
	
	}
	
	
	
	function cron_set_auto_ending(){
				$CI =& get_instance();
				$base_path = front_base_url();
		
				
				$email_setting=$this->db->query("select * from `email_setting` where email_setting_id='1'");
					$email_set=$email_setting->row();
					
				$this->db->query("delete FROM `cronjob` WHERE status=0 and date_run < DATE_ADD(now(), INTERVAL -1 HOUR)");		
				
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
		
					$query = $this->db->query("select * from site_setting");
					$site = $query->row_array();
				
		
		////////////// fetch % of calculating successful projects
		$sites = $this->db->query("select * from site_setting");
		$site_setting=$sites->row();
		
		$w = $this->db->query("select * from wallet_setting");
		$wd = $w->row();	
					
		$successful=$site_setting->successful;
		
		if($successful=='') { $successful='60'; }
		
		///////////// fetch ended projects
		$query = $this->db->query("select * from project where end_date < '".date('Y-m-d H:i:s')."' and active='1'");
		
		if($query->num_rows() > 0){
			$result = $query->result();
			
			foreach($result as $rs){
				
				$perc = $rs->amount * $successful / 100;
				
					////////////// check if project is successful
					if($rs->payment_type == '1'){
					
						
						///////=====FLXIBLE================
						
						
						
						/////////// confirm all the donations
						$query = $this->db->query("update wallet set donate_status=1 where project_id='".$rs->project_id."'");
						
						
							
						if($rs->amount_get >= $rs->amount){
							$transaction_fees = $site_setting->suc_flexible_fees;
						}else{
							$transaction_fees = $site_setting->flexible_fees;
						}	
						
						$query = $this->db->query("update wallet set donate_status=1, debit= (debit - (debit * ".$transaction_fees." / 100 )) where project_id='".$rs->project_id."' and debit<>''");
						
						
						
			
						
						
						
						
			///////////==========affiliate earn=============
			
				$affiliate_setting=affiliate_setting();
			
				if($affiliate_setting->affiliate_enable==1) 
				{ 
					
					
					$pledge_commission=affiliate_commission_setting(2);
					
					
					
					///////========get project donor for affiliate
					$aff_query = $this->db->query("select * from wallet where credit>0 and project_id='".$rs->project_id."'");	
						
					
					if($aff_query->num_rows()>0)
					{
						
						$aff_res=$aff_query->result();
						
						foreach($aff_res as $afs)
						{
							
							
							$login_user=get_user_detail($afs->user_id);
							
							$donote_amount=$afs->credit;
							$perk_id=0;
							$project_id=$afs->project_id;
							$transaction_id=$afs->wallet_transaction_id;
							
							
							////======donor is referral user then all/one pledge goes to referral
					
							if($login_user['reference_user_id']!='' && $login_user['reference_user_id']>0)
							{
								$get_affiliate_user=get_user_detail($login_user['reference_user_id']);
						
								if($get_affiliate_user)
								{
							
							///===get commission amount and add to user earn table with pending status
									
							
								if($pledge_commission)
								{
									
									$pledge_commission_fee=$pledge_commission->commission;
									
									if($pledge_commission_fee>0)
									{
										
										if($pledge_commission->type=='%')
										{
											$final_pledge_fee=($donote_amount*$pledge_commission_fee)/100;
										}
										else
										{
											$final_pledge_fee=$pledge_commission_fee;
										}
										
										
										
										////=======check one time or every time payment enable
										
										if($affiliate_setting->pay_commission_pledge==1)
										{
										
											$earn_data=array(
											'user_id'=>$get_affiliate_user['user_id'],
											'project_id'=>$project_id,
											'perk_id'=>$perk_id,
											'transaction_id'=>$transaction_id,
											'earn_amount'=>$final_pledge_fee,
											'earn_date'=>date('Y-m-d H:i:s'),
											'earn_status'=>0
											);
											$this->db->insert('affiliate_user_earn',$earn_data);
										}
										else
										{
											
											$affiliate_user_id=$get_affiliate_user['user_id'];
											
									$check_user_already_get_commission=check_user_one_time_commission($affiliate_user_id,$project_id);
										
											if($check_user_already_get_commission==0)
											{																					
												$earn_data=array(
												'user_id'=>$get_affiliate_user['user_id'],
												'project_id'=>$project_id,
												'perk_id'=>$perk_id,
												'transaction_id'=>$transaction_id,
												'earn_amount'=>$final_pledge_fee,
												'earn_date'=>date('Y-m-d H:i:s'),
												'earn_status'=>0
												);
												$this->db->insert('affiliate_user_earn',$earn_data);
											}									
										}
										
										
										////=======
										
									}
									
								}					
							
						
							}
						
						
						}
					
							/////===========
						
						}
						
					}
					///////========end project donor for affiliate
					
					
					
				}
						
									
					///////////==========affiliate earn=============	
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						// update project table
					$this->db->query("update project set status='5', active='3' where project_id='".$rs->project_id."'");
							
					
					$this->db->query("update transaction set wallet_payment_status='0' where project_id='".$rs->project_id."'");
						/*********** Emails  *************/
					
					$prj = $this->db->query("select * from project, user where project.user_id=user.user_id and project.project_id='".$rs->project_id."'");
					$p = $prj->row_array();
					
					
			
				
				/***** owner notification *****/		
					$email_template=$this->db->query("select * from `email_template` where task='Project Successful User Notification'");
					$email_temp=$email_template->row();
					
					
					$email_address_from=$email_temp->from_address;
					$email_address_reply=$email_temp->reply_address;
					
					$email_subject=$email_temp->subject;				
					$email_message=$email_temp->message;
					
					$user_name =$p['user_name'];
					
					$donote_amount = set_currency($p['amount_get']);
					
					$project_name = $p['project_title'];
					$project_page_link=front_base_url().'projects/'.$p['url_project_title'].'/'.$rs->project_id;
					
				 	$email_to =$p['email'];
					
					
					$login_link=base_url();
					
					$email_message=str_replace('{break}','<br/>',$email_message);
					$email_message=str_replace('{project_name}',$project_name,$email_message);
					$email_message=str_replace('{user_name}',$user_name,$email_message);
					$email_message=str_replace('{project_page_link}',$project_page_link,$email_message);
						
					$str=$email_message;
				
				
					
					$this->email->from($email_address_from);
					$this->email->reply_to($email_address_reply);
					$this->email->to($email_to);
					$this->email->subject($email_subject);
					$this->email->message($str);
					$this->email->send();
			
			
			
			/****** admin notification ********/
					$email_template=$this->db->query("select * from `email_template` where task='Project Successful Admin Notification'");
					$email_temp=$email_template->row();
					
					
					$email_address_from=$email_temp->from_address;
					$email_address_reply=$email_temp->reply_address;
					
					$email_subject=$email_temp->subject;				
					$email_message=$email_temp->message;
					
					
					
				 	$email_to =$email_address_from;
					
					
					$login_link=base_url();
					
					$email_message=str_replace('{break}','<br/>',$email_message);
					$email_message=str_replace('{project_name}',$project_name,$email_message);
					$email_message=str_replace('{project_page_link}',$project_page_link,$email_message);
					
					$str=$email_message;
				
				
					
					$this->email->from($email_address_from);
					$this->email->reply_to($email_address_reply);
					$this->email->to($email_to);
					$this->email->subject($email_subject);
					$this->email->message($str);
					$this->email->send();
			
			/***************************/
					
					}
						elseif($rs->amount_get >=$rs->amount and $site_setting->enable_funding_option =='1' and $rs->payment_type =='0' and $wd->wallet_payment_type =='1'){	
						/////////// confirm all the donations
						$query = $this->db->query("update wallet set donate_status=1 where project_id='".$rs->project_id."'");
						
						$transaction_fees = $site_setting->fixed_fees;
						
						
						$query = $this->db->query("update wallet set donate_status=1, debit= (debit - (debit * ".$transaction_fees." / 100 )) where project_id='".$rs->project_id."' and debit<>''");
						
						
						
				
						
						
						
						
						
						
				///////////==========affiliate earn=============
			
				$affiliate_setting=affiliate_setting();
			
				if($affiliate_setting->affiliate_enable==1) 
				{ 
					
					
					$pledge_commission=affiliate_commission_setting(2);
					
					
					
					///////========get project donor for affiliate
					$aff_query = $this->db->query("select * from wallet where credit>0 and project_id='".$rs->project_id."'");	
						
					
					if($aff_query->num_rows()>0)
					{
						
						$aff_res=$aff_query->result();
						
						foreach($aff_res as $afs)
						{
							
							
							$login_user=get_user_detail($afs->user_id);
							
							$donote_amount=$afs->credit;
							$perk_id=0;
							$project_id=$afs->project_id;
							$transaction_id=$afs->wallet_transaction_id;
							
							
							////======donor is referral user then all/one pledge goes to referral
					
							if($login_user['reference_user_id']!='' && $login_user['reference_user_id']>0)
							{
								$get_affiliate_user=get_user_detail($login_user['reference_user_id']);
						
								if($get_affiliate_user)
								{
							
							///===get commission amount and add to user earn table with pending status
									
							
								if($pledge_commission)
								{
									
									$pledge_commission_fee=$pledge_commission->commission;
									
									if($pledge_commission_fee>0)
									{
										
										if($pledge_commission->type=='%')
										{
											$final_pledge_fee=($donote_amount*$pledge_commission_fee)/100;
										}
										else
										{
											$final_pledge_fee=$pledge_commission_fee;
										}
										
										
										
										////=======check one time or every time payment enable
										
										if($affiliate_setting->pay_commission_pledge==1)
										{
										
											$earn_data=array(
											'user_id'=>$get_affiliate_user['user_id'],
											'project_id'=>$project_id,
											'perk_id'=>$perk_id,
											'transaction_id'=>$transaction_id,
											'earn_amount'=>$final_pledge_fee,
											'earn_date'=>date('Y-m-d H:i:s'),
											'earn_status'=>0
											);
											$this->db->insert('affiliate_user_earn',$earn_data);
										}
										else
										{
											
											$affiliate_user_id=$get_affiliate_user['user_id'];
											
									$check_user_already_get_commission=check_user_one_time_commission($affiliate_user_id,$project_id);
										
											if($check_user_already_get_commission==0)
											{																					
												$earn_data=array(
												'user_id'=>$get_affiliate_user['user_id'],
												'project_id'=>$project_id,
												'perk_id'=>$perk_id,
												'transaction_id'=>$transaction_id,
												'earn_amount'=>$final_pledge_fee,
												'earn_date'=>date('Y-m-d H:i:s'),
												'earn_status'=>0
												);
												$this->db->insert('affiliate_user_earn',$earn_data);
											}									
										}
										
										
										////=======
										
									}
									
								}					
							
						
							}
						
						
						}
					
							/////===========
						
						}
						
					}
					///////========end project donor for affiliate
					
					
					
				}
						
									
					///////////==========affiliate earn=============	
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						// update project table
					$this->db->query("update project set status='5', active='3' where project_id='".$rs->project_id."'");
							
					
					$this->db->query("update transaction set wallet_payment_status='0' where project_id='".$rs->project_id."'");
						/*********** Emails  *************/
					
					$prj = $this->db->query("select * from project, user where project.user_id=user.user_id and project.project_id='".$rs->project_id."'");
					$p = $prj->row_array();
					
					
			
				
				/***** owner notification *****/		
					$email_template=$this->db->query("select * from `email_template` where task='Project Successful User Notification'");
					$email_temp=$email_template->row();
					
					
					$email_address_from=$email_temp->from_address;
					$email_address_reply=$email_temp->reply_address;
					
					$email_subject=$email_temp->subject;				
					$email_message=$email_temp->message;
					
					$user_name =$p['user_name'];
					
					$donote_amount = set_currency($p['amount_get']);
					
					$project_name = $p['project_title'];
					$project_page_link=front_base_url().'projects/'.$p['url_project_title'].'/'.$rs->project_id;
					
				 	$email_to =$p['email'];
					
					
					$login_link=base_url();
					
					$email_message=str_replace('{break}','<br/>',$email_message);
					$email_message=str_replace('{project_name}',$project_name,$email_message);
					$email_message=str_replace('{user_name}',$user_name,$email_message);
					$email_message=str_replace('{project_page_link}',$project_page_link,$email_message);
						
					$str=$email_message;
				
				
					
					$this->email->from($email_address_from);
					$this->email->reply_to($email_address_reply);
					$this->email->to($email_to);
					$this->email->subject($email_subject);
					$this->email->message($str);
					$this->email->send();
			
			
			
			/****** admin notification ********/
					$email_template=$this->db->query("select * from `email_template` where task='Project Successful Admin Notification'");
					$email_temp=$email_template->row();
					
					
					$email_address_from=$email_temp->from_address;
					$email_address_reply=$email_temp->reply_address;
					
					$email_subject=$email_temp->subject;				
					$email_message=$email_temp->message;
					
					
					
				 	$email_to =$email_address_from;
					
					
					$login_link=base_url();
					
					$email_message=str_replace('{break}','<br/>',$email_message);
					$email_message=str_replace('{project_name}',$project_name,$email_message);
						$email_message=str_replace('{project_page_link}',$project_page_link,$email_message);
					
					$str=$email_message;
				
				
					
					$this->email->from($email_address_from);
					$this->email->reply_to($email_address_reply);
					$this->email->to($email_to);
					$this->email->subject($email_subject);
					$this->email->message($str);
					$this->email->send();
			
			/***************************/
					}
					else{
					
					$w = $this->db->query("select * from wallet_setting");
					$wd = $w->row();	/////////// refund back all the donations
					
					if($wd->wallet_payment_type=='1'){
					
						/////////// refund back all the donations
						$query = $this->db->query("update wallet set donate_status=2 where project_id='".$rs->project_id."'");
						
						//update transaction table
						$this->db->query("update transaction set wallet_payment_status='2' where project_id='".$rs->project_id."'");
						
						// update project table
						$this->db->query("update project set status='5', active='3',amount_get=0 where project_id='".$rs->project_id."'");
						
						
						/*********** Emails  *************/
					
					$prj = $this->db->query("select * from project, user where project.user_id=user.user_id and project.project_id='".$rs->project_id."'");
					$p = $prj->row_array();
					
					
			
				
				/***** owner notification *****/		
					$email_template=$this->db->query("select * from `email_template` where task='Project Cancelled User Notification'");
					$email_temp=$email_template->row();
					
					
					$email_address_from=$email_temp->from_address;
					$email_address_reply=$email_temp->reply_address;
					
					$email_subject=$email_temp->subject;				
					$email_message=$email_temp->message;
					
					$user_name =$p['user_name'];
					
					$donote_amount = set_currency($p['amount_get']);
					
					$project_name = $p['project_title'];
					$project_page_link=front_base_url().'projects/'.$p['url_project_title'].'/'.$rs->project_id;
					
				 	$email_to =$p['email'];
					
					
					$login_link=base_url();
					
					$email_message=str_replace('{break}','<br/>',$email_message);
					$email_message=str_replace('{project_name}',$project_name,$email_message);
					$email_message=str_replace('{user_name}',$user_name,$email_message);
					$email_message=str_replace('{project_page_link}',$project_page_link,$email_message);
						
					$str=$email_message;
				
				
					
					$this->email->from($email_address_from);
					$this->email->reply_to($email_address_reply);
					$this->email->to($email_to);
					$this->email->subject($email_subject);
					$this->email->message($str);
					$this->email->send();
			
			
			
			/****** admin notification ********/
					$email_template=$this->db->query("select * from `email_template` where task='Project Cancelled Admin Notification'");
					$email_temp=$email_template->row();
					
					
					$email_address_from=$email_temp->from_address;
					$email_address_reply=$email_temp->reply_address;
					
					$email_subject=$email_temp->subject;				
					$email_message=$email_temp->message;
					
					
					
				 	$email_to =$email_address_from;
					
					
					$login_link=base_url();
					
					$email_message=str_replace('{break}','<br/>',$email_message);
					$email_message=str_replace('{project_name}',$project_name,$email_message);
					$email_message=str_replace('{project_page_link}',$project_page_link,$email_message);
					
					$str=$email_message;
				
				
					
					$this->email->from($email_address_from);
					$this->email->reply_to($email_address_reply);
					$this->email->to($email_to);
					$this->email->subject($email_subject);
					$this->email->message($str);
					$this->email->send();
			
			/***************************/
				
					}
				}	
			}
			
			/////////// save cron job run time
			$data = array(
						'user_id' => $this->session->userdata('admin_id'),
						'cronjob' => 'set_auto_ending',
						'date_run' =>date('Y-m-d H:i:s'),
						'status' => '1',
					);
			$this->db->insert('cronjob', $data);
			exit;
			
		}
		else{
		
			$data = array(
						'user_id' => $this->session->userdata('admin_id'),
						'cronjob' => 'set_auto_ending',
						'date_run' =>date('Y-m-d H:i:s'),
						'status' => '0',
					);
			$this->db->insert('cronjob', $data);
			exit;
		
		}
		////////// save cron job run time
		
		exit;
	
	}

}



?>