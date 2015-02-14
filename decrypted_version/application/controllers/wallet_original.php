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

class Wallet extends ROCKERS_Controller {

	function Wallet()
	{
		parent::__construct();	
		$this->load->model('home_model');
		$this->load->model('project_model');
		$this->load->model('user_model');	
		$this->load->model('wallet_model');	
		
	}
	
	
	function index($msg ='')
	{
		redirect('wallet/my_wallet');
	}
	
	
	///////////////////********************Wallet System========================
	
	
	function my_wallet($offset=0,$msg='')
	{
		
		$wallet_setting = wallet_setting();
		
		if($wallet_setting->wallet_enable==0)
		{
			redirect('home/dashboard');
		}
		
		if($this->session->userdata('user_id')== '')
		{
			redirect('home/login');
		}
		
		$this->load->library('pagination');
		
		$limit = '15';
		$config['uri_segment']='3';
		$config['base_url'] = site_url('wallet/my_wallet/');
		$config['total_rows'] = $this->wallet_model->get_total_my_wallet_list();
		$config['per_page'] = $limit;
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();
		$data['limit']=$limit;
		$data['total_rows']=$config['total_rows'];	
		$data['offset']=$offset;	
		$data['wallet_details']=$this->wallet_model->my_wallet_list($offset,$limit);
		$data['total_wallet_amount']=$this->home_model->my_wallet_amount(); 		
		$data['wallet_setting'] = wallet_setting();
		$data['error'] = "";
		$data['view'] = "login";
		$data['view'] = "signup";
		$data['msg'] = $msg;
		$data['header_menu'] = dynamic_menu(0);
		$data['footer_menu'] = dynamic_menu_footer(0);
		$data['right_menu'] = dynamic_menu_right(0);
		$data['site_setting'] = site_setting();	
		$meta = meta_setting();
		$user = get_user_detail($this->session->userdata('user_id'));
		$this->home_model->select_text($this->session->userdata('lang_id'));
		$this->template->write('meta_title','My Wallet-'.$user['user_name'].' '.$user['last_name'].' - '.$meta['title'], TRUE);
		$this->template->write('meta_description','My Wallet-'.$user['user_name'].' '.$user['last_name'].' - '. $meta['meta_description'], TRUE);
		$this->template->write('meta_keyword', 'My Wallet-'.$user['user_name'].' '.$user['last_name'].' - '.$meta['meta_keyword'], TRUE);
		if($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1)
			{
				$this->template->set_master_template('iphone/template.php');
				$this->template->write_view('main_content', 'iphone/wallet/index', $data, TRUE);
				$this->template->render();
			}
			elseif(($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1)
			{
				$this->template->set_master_template('mobile/template.php');
				$this->template->write_view('main_content', 'mobile/wallet/index', $data, TRUE);
				$this->template->render();
			}
			else
			{
				$this->template->write_view('header', 'default/header_login', $data, TRUE);
				$this->template->write_view('center_content', 'default/wallet/my_wallet', $data, TRUE);
				$this->template->write_view('footer','default/footer',$data, TRUE);
				$this->template->render();
			}
		
		
	
	}	
	
	
	
	function my_withdraw($offset=0,$msg='')
	{
		$wallet_setting = wallet_setting();
		
		if($wallet_setting->wallet_enable==0)
		{
			redirect('home/dashboard');
		}
		
		if($this->session->userdata('user_id')== '')
		{
			redirect('home/login');
		}
		
		$this->load->library('pagination');
		
		$limit = '10';
		$config['uri_segment']='3';
		$config['base_url'] = site_url('wallet/my_withdraw/');
		$config['total_rows'] = $this->wallet_model->get_total_my_withdraw_list();
		$config['per_page'] = $limit;
				
		$this->pagination->initialize($config);		
		
		$data['page_link'] = $this->pagination->create_links();
		
		$data['limit']=$limit;
		$data['total_rows']=$config['total_rows'];	
		$data['offset']=$offset;	
		$data['withdraw_details']=$this->wallet_model->my_withdraw_list($offset,$limit);
		
		$data['total_wallet_amount']=$this->home_model->my_wallet_amount(); 		
		$data['wallet_setting'] = wallet_setting();
		$data['error'] = "";
		$data['msg']=$msg;
		$data['header_menu'] = dynamic_menu(0);
		$data['footer_menu'] = dynamic_menu_footer(0);
		$data['right_menu'] = dynamic_menu_right(0);
		$data['site_setting'] = site_setting();	
		$meta = meta_setting();
		$user = get_user_detail($this->session->userdata('user_id'));
		
		$this->home_model->select_text($this->session->userdata('lang_id'));
		
		$this->template->write('meta_title','My Withdraw-'.$user['user_name'].' '.$user['last_name'].' - '.$meta['title'], TRUE);
		$this->template->write('meta_description','My Withdraw-'.$user['user_name'].' '.$user['last_name'].' - '. $meta['meta_description'], TRUE);
		$this->template->write('meta_keyword', 'My Withdraw-'.$user['user_name'].' '.$user['last_name'].' - '.$meta['meta_keyword'], TRUE);
		$this->template->write_view('header', 'default/header_login', $data, TRUE);
		$this->template->write_view('center_content', 'default/wallet/my_withdraw', $data, TRUE);
		$this->template->write_view('footer', 'default/footer',$data, TRUE);
		$this->template->render();
	
	}	
	
	
	
	
	function withdraw_wallet()
	{
		 $r= $this->session->userdata('user_id');
		$wallet_setting = wallet_setting();
		$site_setting= site_setting();	
		if($wallet_setting->wallet_enable==0)
		{
			redirect('home/dashboard');
		}
		
		if($this->session->userdata('user_id')== '')
		{
			redirect('home/login');
		}
		
		$total_wallet_amount=$this->home_model->my_wallet_amount(); 	
		$minimum_amount=$wallet_setting->wallet_minimum_amount;		
		
		$chk_amt=$this->input->post('amount');
		//if(count($data['result'])>0)
		////check total amount=====
		
		$own_amount_error='success';
		
		if($this->input->post('amount')) {
		
			if($chk_amt>$total_wallet_amount)
			{
				$own_amount_error='fail';			
			}
		
		}
		
		/////=====check minimum amount
		
		$amount_error='success';
		
		if($this->input->post('amount')) {
		
			if($chk_amt<$minimum_amount)
			{
				$amount_error='fail';			
			}
		
		}
		$this->load->library('form_validation');		
		$this->form_validation->set_rules('amount',AMOUNT, 'required');
		$this->form_validation->set_rules('withdraw_method', WITHDRAW_METHOD, 'required');
		
		if($this->input->post('withdraw_method')=='bank')
		{
			$this->form_validation->set_rules('bank_name', BANK_NAME, 'required|alpha_space');
			$this->form_validation->set_rules('bank_account_holder_name', ACCOUNT_HOLDER_NAME, 'required|alpha_space');			
			$this->form_validation->set_rules('bank_account_number', BANK_ACCOUNT_NUMBER, 'required|alpha_numeric');
			$this->form_validation->set_rules('bank_branch', BANK_BRANCH, 'required|alpha_space');
			$this->form_validation->set_rules('bank_ifsc_code', BANK_IFSC_CODE, 'required|alpha_numeric');
			$this->form_validation->set_rules('bank_address', BANK_ADDRESS, 'required');
			$this->form_validation->set_rules('bank_city', BANK_CITY, 'required|alpha_space');
			$this->form_validation->set_rules('bank_state', BANK_STATE, 'required|alpha_space');
			$this->form_validation->set_rules('bank_country', BANK_COUNTRY, 'required|alpha_space');
			$this->form_validation->set_rules('bank_zipcode', BANK_ZIPCODE, 'required|numeric');
					
		}
		
		if($this->input->post('withdraw_method')=='check')
		{
			$this->form_validation->set_rules('check_name',BANK_NAME, 'required|alpha_space');
			$this->form_validation->set_rules('check_account_holder_name',ACCOUNT_HOLDER_NAME, 'required|alpha_space');			
			$this->form_validation->set_rules('check_account_number', BANK_ACCOUNT_NUMBER, 'required|alpha_numeric');
			$this->form_validation->set_rules('check_branch', BANK_BRANCH, 'required|alpha_space');
			//$this->form_validation->set_rules('check_unique_id', 'Bank Unique Code', 'required|alpha_numeric');
			$this->form_validation->set_rules('check_address',BANK_ADDRESS, 'required');
			$this->form_validation->set_rules('check_city',BANK_CITY, 'required|alpha_space');
			$this->form_validation->set_rules('check_state', BANK_STATE, 'required|alpha_space');
			$this->form_validation->set_rules('check_country',BANK_COUNTRY, 'required|alpha_space');
			$this->form_validation->set_rules('check_zipcode',BANK_ZIPCODE, 'required|numeric');

		}
		
		if($this->input->post('withdraw_method')=='gateway')
		{
		
			$this->form_validation->set_rules('gateway_name', GATEWAY_NAME, 'required|alpha_space');
			$this->form_validation->set_rules('gateway_account',GATEWAY_ACCOUNT, 'required');
		
			$this->form_validation->set_rules('gateway_city', GATEWAY_CITY, 'required|alpha_space');
			$this->form_validation->set_rules('gateway_state', GATEWAY_STATE, 'required|alpha_space');			
			
			$this->form_validation->set_rules('gateway_country', GATEWAY_COUNTRY, 'required|alpha_space');
			$this->form_validation->set_rules('gateway_zip', GATEWAY_ZIPCODE, 'required|numeric');		
		
		}
		
		
		if($this->form_validation->run() == FALSE || $amount_error=='fail' || $own_amount_error=='fail'){			
			
			
			
				if($amount_error=='fail')
				{
					$amount_error="<p>". sprintf(WALLET_CANT_ADD_AMOUNT_LESS_THAN_MIN_AMOUNT,set_currency($minimum_amount)). "</p>";
				}
				else
				{
					$amount_error='';
				}
				
				if($own_amount_error=='fail')
				{
					$own_error="<p>".sprintf(WALLET_CANT_ADD_WITHDARAW_AMOUNT_GREATER_THAN_TOTAL_WALLET_AMOUNT,set_currency($total_wallet_amount))."</p>";
				}
				else
				{
					$own_error='';
				}
			
			
				if(validation_errors() || $amount_error!=''  || $own_error!='')
				{
					$data['error'] = validation_errors().$amount_error.$own_error;
							
				} else
				{
					$data["error"] = "";
				}
		
		       
		
		
		
					$data['total_wallet_amount']=$this->home_model->my_wallet_amount(); 		
					$data['wallet_setting'] = wallet_setting();
					
					if($_POST)
					{
					$data['withdraw_method']=$this->input->post('withdraw_method');
					$data['amount']=$this->input->post('amount');
					
					$data['withdraw_id']=$this->input->post('withdraw_id');
					
					
					$data['bank_name']=$this->input->post('bank_name');
					$data['bank_branch']=$this->input->post('bank_branch');
					$data['bank_ifsc_code']=$this->input->post('bank_ifsc_code');
					$data['bank_address']=$this->input->post('bank_address');
					$data['bank_city']=$this->input->post('bank_city');
					$data['bank_state']=$this->input->post('bank_state');
					$data['bank_country']=$this->input->post('bank_country');
					$data['bank_zipcode']=$this->input->post('bank_zipcode');
					$data['bank_account_holder_name']=$this->input->post('bank_account_holder_name');
					$data['bank_account_number']=$this->input->post('bank_account_number');
					
					
					$data['check_name']=$this->input->post('check_name');
					$data['check_branch']=$this->input->post('check_branch');
					$data['check_unique_id']=$this->input->post('check_unique_id');
					$data['check_address']=$this->input->post('check_address');
					$data['check_city']=$this->input->post('check_city');
					$data['check_state']=$this->input->post('check_state');
					$data['check_country']=$this->input->post('check_country');
					$data['check_zipcode']=$this->input->post('check_zipcode');
					$data['check_account_holder_name']=$this->input->post('check_account_holder_name');
					$data['check_account_number']=$this->input->post('check_account_number');
										
					
					$data['gateway_name']=$this->input->post('gateway_name');
					$data['gateway_account']=$this->input->post('gateway_account');
					$data['gateway_city']=$this->input->post('gateway_city');
					$data['gateway_state']=$this->input->post('gateway_state');
					$data['gateway_country']=$this->input->post('gateway_country');
					$data['gateway_zip']=$this->input->post('gateway_zip');
					}
					else
					{
					   
	                        $withdrawid=$this->wallet_model->get_last_detail($this->session->userdata('user_id'));
	   
	                        $bank=$this->wallet_model->get_bank_detail($this->session->userdata('user_id'));
							$getway=$this->wallet_model->get_payment_getway_detail($this->session->userdata('user_id'));
							$check=$this->wallet_model->get_check_detail($this->session->userdata('user_id'));
							//print_r($check);
	                         if($bank)
							 {
	                           $data['withdraw_method']=$this->input->post('withdraw_method');
					           $data['amount']=$this->input->post('amount');
					           $data['withdraw_id']=$this->input->post('withdraw_id');
		                        $data['bank_name']=$bank->bank_name;	
		                        $data['bank_branch']=$bank->bank_branch;
		                        $data['bank_ifsc_code']=$bank->bank_ifsc_code;	
								$data['bank_address']=$bank->bank_address;	
								$data['bank_city']=$bank->bank_city;	
								$data['bank_state']=$bank->bank_state;
								$data['bank_country']=$bank->bank_country;
								$data['bank_zipcode']=$bank->bank_zipcode;
								$data['bank_account_holder_name']=$bank->bank_account_holder_name;
								$data['bank_account_number']=$bank->bank_account_number;
							}
							else
							{
							   $data['withdraw_method']="";
					           $data['amount']="";
					           $data['withdraw_id']="";
		                        $data['bank_name']="";	
		                        $data['bank_branch']="";
		                        $data['bank_ifsc_code']="";	
								$data['bank_address']="";	
								$data['bank_city']="";	
								$data['bank_state']="";
								$data['bank_country']="";
								$data['bank_zipcode']="";
								$data['bank_account_holder_name']="";
								$data['bank_account_number']="";
							    
							}
							
								
								if($getway)
								{
								 $data['gateway_name']=$getway->gateway_name;
					             $data['gateway_account']=$getway->gateway_account;
					             $data['gateway_city']=$getway->gateway_city;
					             $data['gateway_state']=$getway->gateway_state;
					             $data['gateway_country']=$getway->gateway_country;
					             $data['gateway_zip']=$getway->gateway_zip;
								}
								else
								{
								 $data['gateway_name']=" ";
					             $data['gateway_account']=" ";
					             $data['gateway_city']=" ";
					             $data['gateway_state']=" ";
					             $data['gateway_country']=" ";
					             $data['gateway_zip']=" ";
								}
								
								if($check)
								{
								$data['check_name']=$check->bank_name;	
		                        $data['check_branch']=$check->bank_branch;
		                        $data['check_unique_id']=$check->bank_unique_id;	
								
								$data['check_address']=$check->bank_address;
								$data['check_city']=$check->bank_city;	
								$data['check_state']=$check->bank_state;
								$data['check_country']=$check->bank_country;
								$data['check_zipcode']=$check->bank_zipcode;
								$data['check_account_holder_name']=$check->bank_account_holder_name;
								$data['check_account_number']=$check->bank_account_number;
							  }
							  else
							  {
							     $data['check_name']="";	
		                        $data['check_branch']="";
		                        $data['check_unique_id']="";	
								
								$data['check_address']="";
								$data['check_city']="";	
								$data['check_state']="";
								$data['check_country']="";
								$data['check_zipcode']="";
								$data['check_account_holder_name']="";
								$data['check_account_number']="";
							     
							  }
							  
							  }
				
					$data['view'] = "login";
					$data['view'] = "signup";
					
					$data['header_menu'] = dynamic_menu(0);
					$data['footer_menu'] = dynamic_menu_footer(0);
					$data['right_menu'] = dynamic_menu_right(0);
					$data['site_setting'] = site_setting();
					$meta = meta_setting();
					$user = get_user_detail($this->session->userdata('user_id'));
					
					$this->home_model->select_text($this->session->userdata('lang_id'));
					
					$this->template->write('meta_title','Withdraw Wallet-'.$user['user_name'].' '.$user['last_name'].' - '.$meta['title'], TRUE);
					$this->template->write('meta_description','Withdraw Wallet-'.$user['user_name'].' '.$user['last_name'].' - '. $meta['meta_description'], TRUE);
					$this->template->write('meta_keyword', 'Withdraw Wallet-'.$user['user_name'].' '.$user['last_name'].' - '.$meta['meta_keyword'], TRUE);
					$this->template->write_view('header', 'default/header_login', $data, TRUE);
					$this->template->write_view('center_content', 'default/wallet/withdraw_wallet', $data, TRUE);
					$this->template->write_view('footer', 'default/footer',$data, TRUE);
					$this->template->render();
		        }
			else
			{	
				
				if($this->input->post('withdraw_id')!='')
				{
					$this->wallet_model->update_withdraw_request();				
					$msg='update';				
				}
				
				else
				{				
					 $id = $this->wallet_model->add_withdraw_request();	
					
					/********** email **********/
					$u = get_user_detail($this->session->userdata('user_id'));
					
					$w = $this->wallet_model->get_withdraw_detail($id);
					
					$wallet_setting = wallet_setting();
					
					$donation_charge=$wallet_setting->wallet_donation_fees;
					
					if($donation_charge==0)
					{
						 $amount = $w->withdraw_amount;
					}
					else
					{
						$donation_charge_fee= number_format((($w->withdraw_amount*$donation_charge)/100),2);								
						$amount = number_format(($w->withdraw_amount-$donation_charge_fee),2);
					}
					
					if($w->withdraw_method=='bank') { $withdraw_method='By Net Banking'; } 
 					if($w->withdraw_method=='check') {  $withdraw_method='By Check'; } 
					if($w->withdraw_method=='gateway') {  $withdraw_method='By Payment Gateway'; } 
  		
					
					$site = site_setting();
					
				
			/****** admin notification ********/
					$email_template=$this->db->query("select * from `email_template` where task='Wallet Withdraw Request'");
					$email_temp=$email_template->row();
					
					
					$email_address_from=$email_temp->from_address;
					$email_address_reply=$email_temp->reply_address;
					$email_subject=$email_temp->subject;				
					$email_message=$email_temp->message;
				 	$email_to =$email_address_from;
					
					
					$name = $u['user_name'];
					$details = '<table border="0" cellpadding="3" cellspacing="0">
					
					<tr><td> '.NAME.': </td><td>'.$u["user_name"].' '.$u["last_name"].'</td></tr>
					<tr><td>'.YOUR_EMAIL.' : </td><td>'.$u["email"].'</td></tr>
					<tr><td>'.REQUESTED_AMOUNT.' : </td><td>'.set_currency($w->withdraw_amount).'</td></tr>
					<tr><td>'.AMOUNT_PAY.' : </td><td>'.set_currency($amount).'</td></tr>
					<tr><td> '.WITHDRAW_METHOD.' : </td><td>'.$withdraw_method.'</td></tr>';
					
					$email_message=str_replace('{break}','<br/>',$email_message);
					$email_message=str_replace('{name}',$name,$email_message);
					$email_message=str_replace('{details}',$details,$email_message);
					
					$str=$email_message;
				
					email_send($email_address_from,$email_address_reply,$email_to,$email_subject,$str);
					/************* email end *********/			
					$msg='success';
				}
					redirect('wallet/my_withdraw/0/'.$msg);		
					
				
			}
		
	}
	
	
	
	
	
	function withdraw_details($id)
	{
	
		$wallet_setting = wallet_setting();
		
		if($wallet_setting->wallet_enable==0)
		{
			redirect('home/dashboard');
		}
		
		if($this->session->userdata('user_id')== '')
		{
			redirect('home/login');
		}
		
		
		$data['total_wallet_amount']=$this->home_model->my_wallet_amount(); 		
		$data['wallet_setting'] = wallet_setting();
		
		$data["error"] = "";
		$data['withdraw_id']=$id;
		
		$withdraw_detail=$this->wallet_model->get_withdraw_detail($id);
		
		
		
		
		$data['withdraw_method']=$withdraw_detail->withdraw_method;
		$data['amount']=str_replace('.00','',$withdraw_detail->withdraw_amount);
		
		
		$bank_detail=$this->wallet_model->get_withdraw_method_detail($id,'bank');
		$check_detail=$this->wallet_model->get_withdraw_method_detail($id,'check');				
		$gateway_detail=$this->wallet_model->get_withdraw_method_detail($id,'gateway');
		
		if($bank_detail)
		{		
			$data['bank_name']=$bank_detail->bank_name;
			$data['bank_branch']=$bank_detail->bank_branch;
			$data['bank_ifsc_code']=$bank_detail->bank_ifsc_code;
			$data['bank_address']=$bank_detail->bank_address;
			$data['bank_city']=$bank_detail->bank_city;
			$data['bank_state']=$bank_detail->bank_state;
			$data['bank_country']=$bank_detail->bank_country;
			$data['bank_zipcode']=$bank_detail->bank_zipcode;
			$data['bank_account_holder_name']=$bank_detail->bank_account_holder_name;
			$data['bank_account_number']=$bank_detail->bank_account_number;
		
		}
		else
		{
			$data['bank_name']='';
			$data['bank_branch']='';
			$data['bank_ifsc_code']='';
			$data['bank_address']='';
			$data['bank_city']='';
			$data['bank_state']='';
			$data['bank_country']='';
			$data['bank_zipcode']='';
			$data['bank_account_holder_name']='';
			$data['bank_account_number']='';
		}
		
		
		if($check_detail)
		{
			$data['check_name']=$check_detail->bank_name;
			$data['check_branch']=$check_detail->bank_branch;
			$data['check_unique_id']=$check_detail->bank_unique_id;
			$data['check_address']=$check_detail->bank_address;
			$data['check_city']=$check_detail->bank_city;
			$data['check_state']=$check_detail->bank_state;
			$data['check_country']=$check_detail->bank_country;
			$data['check_zipcode']=$check_detail->bank_zipcode;
			$data['check_account_holder_name']=$check_detail->bank_account_holder_name;
			$data['check_account_number']=$check_detail->bank_account_number;
		}
		else
		{
			$data['check_name']='';
			$data['check_branch']='';
			$data['check_unique_id']='';
			$data['check_address']='';
			$data['check_city']='';
			$data['check_state']='';
			$data['check_country']='';
			$data['check_zipcode']='';
			$data['check_account_holder_name']='';
			$data['check_account_number']='';
		
		}
		
		if($gateway_detail)
		{					
		
			$data['gateway_name']=$gateway_detail->gateway_name;
			$data['gateway_account']=$gateway_detail->gateway_account;
			$data['gateway_city']=$gateway_detail->gateway_city;
			$data['gateway_state']=$gateway_detail->gateway_state;
			$data['gateway_country']=$gateway_detail->gateway_country;
			$data['gateway_zip']=$gateway_detail->gateway_zip;
				
		}
		
		else
		{
			$data['gateway_name']='';
			$data['gateway_account']='';
			$data['gateway_city']='';
			$data['gateway_state']='';
			$data['gateway_country']='';
			$data['gateway_zip']='';
		}			
	
		$data['view'] = "login";
		$data['view'] = "signup";
		
		$data['header_menu'] = dynamic_menu(0);
		$data['footer_menu'] = dynamic_menu_footer(0);
		$data['right_menu'] = dynamic_menu_right(0);
		$data['site_setting'] = site_setting();	
		$meta = meta_setting();
		$user = get_user_detail($this->session->userdata('user_id'));
		
		$this->home_model->select_text($this->session->userdata('lang_id'));
		
		$this->template->write('meta_title','Withdraw Wallet-'.$user['user_name'].' '.$user['last_name'].' - '.$meta['title'], TRUE);
		$this->template->write('meta_description','Withdraw Wallet-'.$user['user_name'].' '.$user['last_name'].' - '. $meta['meta_description'], TRUE);
		$this->template->write('meta_keyword', 'Withdraw Wallet-'.$user['user_name'].' '.$user['last_name'].' - '.$meta['meta_keyword'], TRUE);
		$this->template->write_view('header', 'default/header_login', $data, TRUE);
		$this->template->write_view('center_content', 'default/wallet/withdraw_wallet', $data, TRUE);
		$this->template->write_view('footer', 'default/footer',$data, TRUE);
		$this->template->render();
	
	}	
	
	function withdrawal_detail($id)
	{
		
		$wallet_setting = wallet_setting();
		
		if($wallet_setting->wallet_enable==0)
		{
			redirect('home/dashboard');
		}
		
		if($this->session->userdata('user_id')== '')
		{
			redirect('home/login');
		}
		
		
		$data['total_wallet_amount']=$this->home_model->my_wallet_amount(); 		
		$data['wallet_setting'] = wallet_setting();
		
		$data["error"] = "";
		$data['withdraw_id']=$id;
		
		$withdraw_detail=$this->wallet_model->get_withdraw_detail($id);
		
		
		
		
		$data['withdraw_method']=$withdraw_detail->withdraw_method;
		$data['amount']=str_replace('.00','',$withdraw_detail->withdraw_amount);
		
		
		$bank_detail=$this->wallet_model->get_withdraw_method_detail($id,'bank');
		$check_detail=$this->wallet_model->get_withdraw_method_detail($id,'check');				
		$gateway_detail=$this->wallet_model->get_withdraw_method_detail($id,'gateway');
		
		if($bank_detail)
		{		
			$data['bank_name']=$bank_detail->bank_name;
			$data['bank_branch']=$bank_detail->bank_branch;
			$data['bank_ifsc_code']=$bank_detail->bank_ifsc_code;
			$data['bank_address']=$bank_detail->bank_address;
			$data['bank_city']=$bank_detail->bank_city;
			$data['bank_state']=$bank_detail->bank_state;
			$data['bank_country']=$bank_detail->bank_country;
			$data['bank_zipcode']=$bank_detail->bank_zipcode;
			$data['bank_account_holder_name']=$bank_detail->bank_account_holder_name;
			$data['bank_account_number']=$bank_detail->bank_account_number;
		
		}
		else
		{
			$data['bank_name']='';
			$data['bank_branch']='';
			$data['bank_ifsc_code']='';
			$data['bank_address']='';
			$data['bank_city']='';
			$data['bank_state']='';
			$data['bank_country']='';
			$data['bank_zipcode']='';
			$data['bank_account_holder_name']='';
			$data['bank_account_number']='';
		}
		
		
		if($check_detail)
		{
			$data['check_name']=$check_detail->bank_name;
			$data['check_branch']=$check_detail->bank_branch;
			$data['check_unique_id']=$check_detail->bank_unique_id;
			$data['check_address']=$check_detail->bank_address;
			$data['check_city']=$check_detail->bank_city;
			$data['check_state']=$check_detail->bank_state;
			$data['check_country']=$check_detail->bank_country;
			$data['check_zipcode']=$check_detail->bank_zipcode;
			$data['check_account_holder_name']=$check_detail->bank_account_holder_name;
			$data['check_account_number']=$check_detail->bank_account_number;
		}
		else
		{
			$data['check_name']='';
			$data['check_branch']='';
			$data['check_unique_id']='';
			$data['check_address']='';
			$data['check_city']='';
			$data['check_state']='';
			$data['check_country']='';
			$data['check_zipcode']='';
			$data['check_account_holder_name']='';
			$data['check_account_number']='';
		
		}
		
		if($gateway_detail)
		{					
		
			$data['gateway_name']=$gateway_detail->gateway_name;
			$data['gateway_account']=$gateway_detail->gateway_account;
			$data['gateway_city']=$gateway_detail->gateway_city;
			$data['gateway_state']=$gateway_detail->gateway_state;
			$data['gateway_country']=$gateway_detail->gateway_country;
			$data['gateway_zip']=$gateway_detail->gateway_zip;
				
		}
		
		else
		{
			$data['gateway_name']='';
			$data['gateway_account']='';
			$data['gateway_city']='';
			$data['gateway_state']='';
			$data['gateway_country']='';
			$data['gateway_zip']='';
		}			
	
		$data['view'] = "login";
		$data['view'] = "signup";
		
		$data['header_menu'] = dynamic_menu(0);
		$data['footer_menu'] = dynamic_menu_footer(0);
		$data['right_menu'] = dynamic_menu_right(0);
		$data['site_setting'] = site_setting();	
		$meta = meta_setting();
		$user = get_user_detail($this->session->userdata('user_id'));
		
		$this->home_model->select_text($this->session->userdata('lang_id'));
		
		$this->template->write('meta_title','Withdraw Wallet-'.$user['user_name'].' '.$user['last_name'].' - '.$meta['title'], TRUE);
		$this->template->write('meta_description','Withdraw Wallet-'.$user['user_name'].' '.$user['last_name'].' - '. $meta['meta_description'], TRUE);
		$this->template->write('meta_keyword', 'Withdraw Wallet-'.$user['user_name'].' '.$user['last_name'].' - '.$meta['meta_keyword'], TRUE);
		$this->template->write_view('header', 'default/header_login', $data, TRUE);
		$this->template->write_view('center_content', 'default/wallet/withdrawal_detail', $data, TRUE);
		$this->template->write_view('footer', 'default/footer',$data, TRUE);
		$this->template->render();
	
	}
	
	
	
	///////////////////////=====================wallet add amount ================
	
	function delete_wallet_donation($id=null){
		if($id==null || $id==''){
			redirect('wallet/my_wallet/');
		}
		$wallet = $this->db->query("select * from wallet where id='".$id."'");
		$w = $wallet->row_array();
					
		$pid = $this->user_model->cancel_wallet_donation($id);
		
		if($pid){		
			/*********** Emails  *************/
					
					$prj = $this->db->query("select * from project, user where project.user_id=user.user_id and project.project_id='".$pid."'");
					$p = $prj->row_array();
					
					$usr = $this->db->query("select * from user where user_id='".$w['user_id']."'");
					$u = $usr->row_array();
					
					$site = site_setting();
			
					/***** owner notification *****/		
					$email_template=$this->db->query("select * from `email_template` where task='Donation Cancel User Notification'");
					$email_temp=$email_template->row();
					
					$email_address_from=$email_temp->from_address;
					$email_address_reply=$email_temp->reply_address;
					$email_subject=$email_temp->subject;				
					$email_message=$email_temp->message;
					
					$user_name =$p['user_name'];
					
					if($w['debit'] > 0){
						$donote_amount = set_currency($w['debit']);
					}
					else{
						$donote_amount = set_currency($w['credit']);
					}
					
					$project_name = $p['project_title'];
					$project_page_link = site_url('projects/'.$p['url_project_title'].'/'.$pid); 
					$donor_name=$u['user_name'];
					$donor_profile_link = site_url('member/'.$u['user_id']);
					
				 	$email_to =$p['email'];
					
					
					$login_link=site_url();
					
					$email_message=str_replace('{break}','<br/>',$email_message);
					$email_message=str_replace('{project_name}',$project_name,$email_message);
					$email_message=str_replace('{user_name}',$user_name,$email_message);
					$email_message=str_replace('{donote_amount}',$donote_amount,$email_message);
					$email_message=str_replace('{project_page_link}',$project_page_link,$email_message);
					$email_message=str_replace('{donor_name}',$donor_name,$email_message);
					$email_message=str_replace('{donor_profile_link}',$donor_profile_link,$email_message);
					
					$str=$email_message;
				
					email_send($email_address_from,$email_address_reply,$email_to,$email_subject,$str);
			
			
			/****** donor notification ********/
			
					$email_template=$this->db->query("select * from `email_template` where task='Donation Cancel Donor Notification'");
					$email_temp=$email_template->row();
					
					
					$email_address_from=$email_temp->from_address;
					$email_address_reply=$email_temp->reply_address;
					$email_subject=$email_temp->subject;				
					$email_message=$email_temp->message;
					
					$donor_name =$u['user_name'];
					
					if($w['debit'] > 0){
						$donote_amount = set_currency($w['debit']);
					}
					else{
						$donote_amount = set_currency($w['credit']);
					}
					
					
				 	$email_to =$u['email'];
					
					$login_link=site_url();
					
					$email_message=str_replace('{break}','<br/>',$email_message);
					$email_message=str_replace('{project_name}',$project_name,$email_message);
					$email_message=str_replace('{donor_name}',$donor_name,$email_message);
					$email_message=str_replace('{donote_amount}',$donote_amount,$email_message);
					$email_message=str_replace('{project_page_link}',$project_page_link,$email_message);
					
					$str=$email_message;
					email_send($email_address_from,$email_address_reply,$email_to,$email_subject,$str);
			
			/****** admin notification ********/
					$email_template=$this->db->query("select * from `email_template` where task='Donation Cancel Admin Notification'");
					$email_temp=$email_template->row();
					
					$email_address_from=$email_temp->from_address;
					$email_address_reply=$email_temp->reply_address;
					$email_subject=$email_temp->subject;				
					$email_message=$email_temp->message;
					$email_to =$email_address_from;
					
					
					$login_link=site_url();
					
					$email_message=str_replace('{break}','<br/>',$email_message);
					$email_message=str_replace('{project_name}',$project_name,$email_message);
					$email_message=str_replace('{donote_amount}',$donote_amount,$email_message);
					$email_message=str_replace('{project_page_link}',$project_page_link,$email_message);
					$email_message=str_replace('{donor_name}',$donor_name,$email_message);
					$email_message=str_replace('{donor_profile_link}',$donor_profile_link,$email_message);
					
					$str=$email_message;
					email_send($email_address_from,$email_address_reply,$email_to,$email_subject,$str);
			
			/***************************/
			
		}	
		redirect('project/donations/'.$pid);
	}
	
	
	function add_wallet($curr_url='')
	{
		
		$site_setting = site_setting();
		$wallet_setting = wallet_setting();
		
		if($wallet_setting->wallet_enable==0)
		{
			redirect('home/dashboard');
		}
		if($this->session->userdata('user_id')== '')
		{
			redirect('home/login');
		}
	
		$minimum_amount=$wallet_setting->wallet_minimum_amount;
		$chk_amt=$this->input->post('credit');
		$amount_error='success';
		if($this->input->post('credit')) {
			if($chk_amt<$minimum_amount)
			{
				$amount_error='fail';			
			}
		
		}
		if($curr_url=='fail'){
			$curr_url='';
			$amount_error='fail';			
		}
		$this->load->library('form_validation');		
		$this->form_validation->set_rules('credit', AMOUNT, 'required');
		$this->form_validation->set_rules('gateway_type', GATEWAY_TYPE, 'required');
		
		if($this->form_validation->run() == FALSE || $amount_error=='fail'){			
			
				if($amount_error=='fail')
				{
					//$amount_error="<p>"..$site_setting['currency_symbol'].$minimum_amount."</p>";
					$amount_error="<p>". sprintf(WALLET_CANT_ADD_AMOUNT_LESS_THAN_MIN_AMOUNT,set_currency($minimum_amount)). "</p>";
				}
				else
				{
					$amount_error='';
				}
			
			
				if(validation_errors() || $amount_error!='')
				{
					$data['error'] = validation_errors().$amount_error;
							
				} else{
					$data["error"] = "";
				}
				$data['payment'] = $this->wallet_model->get_paymentact_result();
				$data['wallet_setting'] = wallet_setting();
				$data["credit"] = $this->input->post('credit');
				$data["gateway_type"] = $this->input->post('gateway_type');
				$data['total_wallet_amount']=$this->home_model->my_wallet_amount(); 
				$data['view'] = "login";
				$data['view'] = "signup";
				/*$data['val'] = $val;*/
				$data['curr_url'] = $curr_url;
				
				$data['header_menu'] = dynamic_menu(0);
				$data['footer_menu'] = dynamic_menu_footer(0);
				$data['right_menu'] = dynamic_menu_right(0);
				$data['site_setting'] = site_setting();	
				$meta = meta_setting();
				$user = get_user_detail($this->session->userdata('user_id'));
				
				$this->home_model->select_text($this->session->userdata('lang_id'));
				$this->template->write('meta_title','Add Wallet-'.$user['user_name'].' '.$user['last_name'].' - '.$meta['title'], TRUE);
				$this->template->write('meta_description','Add Wallet-'.$user['user_name'].' '.$user['last_name'].' - '. $meta['meta_description'], TRUE);
				$this->template->write('meta_keyword', 'Add Wallet-'.$user['user_name'].' '.$user['last_name'].' - '.$meta['meta_keyword'], TRUE);
				$this->template->write_view('header', 'default/header_login', $data, TRUE);
				$this->template->write_view('center_content', 'default/wallet/add_wallet', $data, TRUE);
				$this->template->write_view('footer', 'default/footer',$data, TRUE);
				$this->template->render();
			}
			else
			{			
				$wallet_setting = wallet_setting();
				$gateway_id=$this->input->post('gateway_type');
				$curr_url = $this->input->post('curr_url');
				$amount=$this->input->post('credit');
				$total= $amount;
				$modname='wallet';
				$pay=$this->user_model->get_paymentid_result($gateway_id);	
				redirect('wallet/'.trim($pay['function_name']).'/'.$pay['id'].'/'.$total);		
				
			}
	
	
	}
	
	
	
	//////////=============Main Function================
	
	function check_unique_transaction($txn_id)
	{
			$query=$this->db->query("select * from wallet where wallet_transaction_id='".$txn_id."'");
			
			if($query->num_rows()>0)
			{
				return 1;
			}
			
			return 0;
		
		}
	
	function get_gateway_result($id,$name)
	{
		$query = $this->db->get_where('gateways_details',array('payment_gateway_id'=>$id,'name'=>$name));
		//print_r($this->db->last_query());
		return $query->row_array();		
	}
		
		
	//////////=============paypal transaction================
		
		
	function paypal($id,$amt)
	{
		
		$site_setting = site_setting();
		$wallet_setting = wallet_setting();
		$minimum_amount=$wallet_setting->wallet_minimum_amount;
		$chk_amt=$amt;
		
		if($chk_amt<$minimum_amount)
		{
			redirect('wallet/add_wallet/fail');		
		}
			
		
			
		$num='WL'.randomNumber(10);
		
		$this->load->library('paypal_lib');
		
		$Paypal_Email=$this->get_gateway_result($id,'paypal_email');			
		$Paypal_Status=$this->get_gateway_result($id,'site_status');
		
		
		$Paypal_Url='https://www.sandbox.paypal.com/cgi-bin/webscri';
		
		if($Paypal_Status['value']=='sandbox')
		{
			$Paypal_Url='https://www.sandbox.paypal.com/cgi-bin/webscri';
		}
		if($Paypal_Status['value']=='live')
		{
			$Paypal_Url='https://www.paypal.com/cgi-bin/webscri';
		}
		
		$wallet_setting = wallet_setting();
		$wallet_add_fees=$wallet_setting->wallet_add_fees;	
		$add_fees= number_format((($amt * $wallet_add_fees)/100),2);
				
		$total = number_format(($add_fees + $amt),2);
		 
		
		$site_setting = site_setting();
		$user_detail = get_user_detail($this->session->userdata('user_id'));
		
		
		$this->paypal_lib->add_field('currency_code',$site_setting['currency_code']);
		$this->paypal_lib->add_field('business', $Paypal_Email['value']);
		$this->paypal_lib->add_field('return', site_url('wallet/paypalsuccess'));
		$this->paypal_lib->add_field('cancel_return', site_url('wallet/paypalcancel'));
		$this->paypal_lib->add_field('notify_url', site_url('wallet/paypalipn')); // <-- IPN url
		$this->paypal_lib->add_field('custom', $amt.'#'.$id.'#'.$this->session->userdata('user_id')); // <-- Verify return
		$this->paypal_lib->paypal_url= $Paypal_Url;			
					
		$this->paypal_lib->add_field('item_name', 'New Fund added in the Wallet in '.$site_setting['site_name'].' by '.$user_detail['user_name'].' '.$user_detail['last_name']);
		$this->paypal_lib->add_field('item_number', $num);
		$this->paypal_lib->add_field('amount', $total);

		$this->paypal_lib->button('Add Amount to wallet');
		
		$data['paypal_form'] = $this->paypal_lib->paypal_auto_form();
		
	}
		
	function paypalsuccess()
	{
		$msg= 'add_success';			
		redirect('wallet/my_wallet/0/'.$msg);		
	}

	function paypalcancel()
	{		
		$msg= WALLET_PAYPAL_CANCEL_YOUR_PAYMENT_FAILED;
		redirect('wallet/my_wallet/0/'.$msg);		
	}
	
		
	function paypalipn()
	{		
				
				
				$vals = array();
				$strtemp='';
				
				foreach ($_POST as $key => $value) 
				{					
					$vals[$key] = $value;
					$strtemp.= $key."=".$value.",";
				}
				
				
				log_message('error',"WALLET PAYPAL IPN DATA:".$strtemp);
				
				$status=$_POST['payment_status'];
				
				
				$custom=explode('#',$_POST['custom']);
				
				$gateway_id=$custom[1];
				$custom_amt=$custom[0];
				
				$pay_gross=$custom[0];
				
				$payee_email=$_POST['payer_email'];
				$payer_status =$_POST['payer_status'];
				
				$txnid=$_POST['txn_id'];
				
				
				$date=date('Y-m-d H:i:s');
				$ip=$_SERVER['REMOTE_ADDR'];
				
				
				$user_id=$custom[2];
				$login_user = get_user_detail($user_id);
				
				$query = $this->db->get_where('admin');
				$res_admin = $query->row_array();
				$email_address_from = $res_admin['email'];
				
				
				$chk_transaction_id=$this->check_unique_transaction($txnid);
				
				
			if((strtolower($status)=='completed' or strtolower($status)=='pending') && $pay_gross>=$custom_amt && $chk_transaction_id==0)
			{
						
						$admin_status='Review';
						
						
				$chk_status_admin=$this->db->query("select * from wallet where user_id='".$user_id."' and admin_status='Confirm'");
				
				if($chk_status_admin->num_rows()>3)
				{
						$admin_status='Confirm';
				}
				
						
						
					
					$data=array(
					'debit' => $pay_gross,
					'user_id' => $user_id,
					'status' => $payer_status,
					'admin_status' => $admin_status,
					'wallet_date' => $date,
					'wallet_transaction_id' => $txnid,
					'wallet_payee_email' => $payee_email,
					'wallet_ip' => $ip	,
					'gateway_id' => $gateway_id,
					'donate_status' => '1'						
					);
					
					
					
					$add_wallet=$this->db->insert('wallet',$data);
										
					
					
					$email_template=$this->db->query("select * from `email_template` where task='New Fund Admin Notification'");
					$email_temp=$email_template->row();	
								
					$email_address_from=$email_temp->from_address;
					$email_address_reply=$email_temp->reply_address;
					$email_subject = WALLET_PAYMENT_PROCESS_SUCCESS;
					$email_to = $login_user['email'];
					$str =sprintf(WALLET_HELLO_USER_YOUR_WALLET_PAYMENT_PROCESS_SUCCESS_WAIT_UNTIL_ADMINISTRATOR_REVIEW,$login_user['user_name']);
					
					email_send($email_address_from,$email_address_reply,$email_to,$email_subject,$str);
					
				}	
				
				else
				{
				
					////////////=========fail transaction, FAKE transaction , invalid transaction, change payment information ========
					
					
					$email_template=$this->db->query("select * from `email_template` where task='New Fund Admin Notification'");
					$email_temp=$email_template->row();				
									
					
					$email_address_from=$email_temp->from_address;
					$email_address_reply=$email_temp->reply_address;
					$email_subject = WALLET_PAYMENT_PROCESS_FAILED;
					$email_to = $login_user['email'];
					
					$str = sprintf(WALLET_YOUR_WALLET_PAYMENT_PROCESS_VIOLATED_PLEASE_CHECK_YOUR_SETTINGS_TRY_AGAIN_THANKYOU,$login_user['user_name'],$resArray['error(0).message']);
					
					email_send($email_address_from,$email_address_reply,$email_to,$email_subject,$str);				
					
					
					$str = sprintf(WALLET_HELLO_ADMINISTRATOR_WALLET_PAYMENT_PROCESS_IS_VIOLATED_DUE_TO_ERROR_PLEASE_CHECK_YOUR_SETTINGS_TRY_AGAIN_THANKYOU,$resArray['error(0).message'],$login_user['user_name'],$payee_email);
				
					$email_subject = WALLET_PAYMENT_PROCESS_FAILED;
					$email_to = $email_address_from;
					email_send($email_address_from,$email_address_reply,$email_to,$email_subject,$str);		
					
				}			
				
				
		
		
	}
	
	 
	//////////=============paypal transaction================
	
	
		 
		 
	//////////=============authorize .net aim================
		
	function auth_net_aim($pid=null,$amount=null)
	{
		$site_setting = site_setting();
		$wallet_setting = wallet_setting();
		$minimum_amount=$wallet_setting->wallet_minimum_amount;
		$chk_amt=$amount;
		
		if($chk_amt<$minimum_amount)
		{
			redirect('wallet/add_wallet/fail');		
		}
		
	
		
		$this->load->library('form_validation');		
		$this->form_validation->set_rules('x_card_num', CREDIT_CARD_NUMBER, 'required|numeric');
		$this->form_validation->set_rules('x_exp_date', EXPIRE_DATE, 'required');
		$this->form_validation->set_rules('x_card_code', CCV, 'required|numeric|exact_length[3]');
		$this->form_validation->set_rules('x_first_name', FIRST_NAME, 'required|alpha_space');
		$this->form_validation->set_rules('x_last_name', LAST_NAME, 'required|alpha_space');
		$this->form_validation->set_rules('x_address',ADDRESS, 'required');
		$this->form_validation->set_rules('x_city', CITY, 'required|alpha_space');
		$this->form_validation->set_rules('x_state', STATE, 'required|alpha_space');
		$this->form_validation->set_rules('x_country', COUNTRY, 'required|alpha_space');
		$this->form_validation->set_rules('x_zip', ZIPCODE, 'required|numeric');

	if($this->form_validation->run() == FALSE)
	{	
	
		if(validation_errors())
		{
			$data['error'] = validation_errors();
		}
		else
		{
			$data["error"] = '';
		}
				
				
				$data['total_wallet_amount']=$this->home_model->my_wallet_amount(); 
				$data['view'] = "login";
				$data['view'] = "signup";
			
				$data['header_menu'] = dynamic_menu(0);
				$data['footer_menu'] = dynamic_menu_footer(0);
				$data['right_menu'] = dynamic_menu_right(0);
				$data['site_setting'] = site_setting();	
				$meta = meta_setting();
				$user = get_user_detail($this->session->userdata('user_id'));
				
			
			$data['wallet_setting'] = wallet_setting();
			$data['total_wallet_amount']=$this->home_model->my_wallet_amount(); 


				
				$data['pid']=$pid;
				$data['amount']=$amount;
				
				
				$this->home_model->select_text($this->session->userdata('lang_id'));
				
				$this->template->write('meta_title','Authorize.net Payment-'.$user['user_name'].' '.$user['last_name'].' - '.$meta['title'], TRUE);
				$this->template->write('meta_description','Authorize.net Payment-'.$user['user_name'].' '.$user['last_name'].' - '. $meta['meta_description'], TRUE);
				$this->template->write('meta_keyword', 'Authorize.net Payment-'.$user['user_name'].' '.$user['last_name'].' - '.$meta['meta_keyword'], TRUE);
				$this->template->write_view('header', 'default/header_login', $data, TRUE);
				$this->template->write_view('center_content', 'default/wallet/direct_post', $data, TRUE);
				$this->template->write_view('footer', 'default/footer',$data, TRUE);
				$this->template->render();
				
								
				
				
			}
			else{
				$i=0;
			
			$x_card_num=$this->input->post('x_card_num');
			$x_exp_date=$this->input->post('x_exp_date');
			$x_card_code=$this->input->post('x_card_code');
			
			$x_first_name=$this->input->post('x_first_name');
			$x_last_name=$this->input->post('x_last_name');
			$x_address=$this->input->post('x_address');
			
			$x_city=$this->input->post('x_city');
			$x_state=$this->input->post('x_state');
			$x_zip=$this->input->post('x_zip');
			$x_country=$this->input->post('x_country');
			
			$x_login=$this->get_gateway_result($pid,'x_login');
			$x_tran_key=$this->get_gateway_result($pid,'x_tran_key');
			$x_type=$this->get_gateway_result($pid,'x_type');
			$x_method=$this->get_gateway_result($pid,'x_method');
			$x_description=$this->get_gateway_result($pid,'x_description');
			
			$modname='wallet';
			 $site_status=$this->get_gateway_result($pid,'site_status');	
			
			$post_url = "https://test.authorize.net/gateway/transact.dll";
			
			if($site_status['value']=='sandbox')
			{
				$post_url = "https://test.authorize.net/gateway/transact.dll";
				$test_request=TRUE;
			}
			else
			{
				$post_url = "https://secure.authorize.net/gateway/transact.dll";
				$test_request=TRUE;
			}
		$wallet_setting = wallet_setting();
		$wallet_add_fees=$wallet_setting->wallet_add_fees;	
		$add_fees= number_format((($amount * $wallet_add_fees)/100),2);
			
		$total = number_format(($add_fees + $amount),2);
		
		
		
		$post_values = array(
			
								
			// the API Login ID and Transaction Key must be replaced with valid values
			"x_login"			=> $x_login['value'],
			"x_tran_key"		=> $x_tran_key['value'],
		
			"x_version"			=> "3.1",
			"x_delim_data"		=> "TRUE",
			"x_delim_char"		=> "|",
			"x_relay_response"	=> "FALSE",
		
			"x_type"			=> $x_type['value'],
			"x_method"			=> $x_method['value'],
			"x_card_num"		=> $x_card_num,
			"x_exp_date"		=> $x_exp_date,
		
			"x_amount"			=> $total,
			"x_description"		=> $x_description['value'],
		
			"x_first_name"		=> $x_first_name,
			"x_last_name"		=> $x_last_name,
			"x_address"			=> $x_address,
			"x_state"			=> $x_state,
			"x_zip"				=> $x_zip,
			"x_modname"			=> $modname,
			"x_test_request"    => $test_request
			// Additional fields can be added here as outlined in the AIM integration
			// guide at: http://developer.authorize.net
		);
		//echo $x_login['value'].'='.$x_tran_key['value'].'='.$x_type['value'].'='.$x_method['value'].'='.$x_description['value'];
		//exit;
		// This section takes the input fields and converts them to the proper format
		// for an http post.  For example: "x_login=username&x_tran_key=a1B2c3D4"
		$post_string = "";
		foreach( $post_values as $key => $value )
			{ $post_string .= "$key=" . urlencode( $value ) . "&"; }
		$post_string = rtrim( $post_string, "& " );
		
		
		
		
		
		// The following section provides an example of how to add line item details to
		// the post string.  Because line items may consist of multiple values with the
		// same key/name, they cannot be simply added into the above array.
		//
		// This section is commented out by default.
		/*
		$line_items = array(
			"item1<|>golf balls<|><|>2<|>18.95<|>Y",
			"item2<|>golf bag<|>Wilson golf carry bag, red<|>1<|>39.99<|>Y",
			"item3<|>book<|>Golf for Dummies<|>1<|>21.99<|>Y");
			
		foreach( $line_items as $value )
			{ $post_string .= "&x_line_item=" . urlencode( $value ); }
		*/
		
		// This sample code uses the CURL library for php to establish a connection,
		// submit the post, and record the response.
		// If you receive an error, you may want to ensure that you have the curl
		// library enabled in your php configuration
		$request = curl_init($post_url); // initiate curl object
			curl_setopt($request, CURLOPT_HEADER, 0); // set to 0 to eliminate header info from response
			curl_setopt($request, CURLOPT_RETURNTRANSFER, 1); // Returns response data instead of TRUE(1)
			curl_setopt($request, CURLOPT_POSTFIELDS, $post_string); // use HTTP POST to send form data
			curl_setopt($request, CURLOPT_SSL_VERIFYPEER, FALSE); // uncomment this line if you get no gateway response.
			$post_response = curl_exec($request); // execute curl post and store results in $post_response
			// additional options may be required depending upon your server configuration
			// you can find documentation on curl options at http://www.php.net/curl_setopt
		curl_close ($request); // close curl object
		
		// This line takes the response and breaks it into an array using the specified delimiting character
		$response_array = explode($post_values["x_delim_char"],$post_response);
		
		
		// The results are output to the screen in the form of an html numbered list.
	//echo $response_array[0];
		$strtemp='';
		foreach ($response_array as $key => $value)
		{
			$strtemp .= $key."===".$value . "<br/>";		
		}			
		
		
		log_message('error',"Authorize.net(AIM) WALLET RESPONSE DATA:".$strtemp);
		
		$res_num=$response_array[0];
		
		
		if($res_num=='1')
		{
		
			$transaction_id=$response_array[6];		
			
			if($transaction_id==0 || $transaction_id=='0')
			{
				$chk_transaction_id=0;
			}
			else
			{					
				$chk_transaction_id=$this->check_unique_transaction($transaction_id);
			}
		
			if($chk_transaction_id==0){
			
		
				$debit=$response_array[9];
				$transaction_id=$response_array[6];						
		
					
					$pay_gross=$debit;
					$gateway_id=$pid;
					$payer_status='Paid';
					$txnid=$transaction_id;
					
					$user_id=$this->session->userdata('user_id');
					$date=date('Y-m-d H:i:s');
					$ip=$_SERVER['REMOTE_ADDR'];
		
		
		
		$admin_status='Review';
				
				
		$chk_status_admin=$this->db->query("select * from wallet where user_id='".$user_id."' and admin_status='Confirm'");
		
		if($chk_status_admin->num_rows()>3)
		{
				$admin_status='Confirm';
		}
			
					$data=array(
						'debit' => $pay_gross,
						'user_id' => $user_id,
						'status' => $payer_status,
						'admin_status' => $admin_status,
						'wallet_date' => $date,
						'wallet_transaction_id' => $txnid,
						'wallet_payee_email' => 'Athorize.Net',
						'wallet_ip' => $ip	,
						'gateway_id' => $gateway_id,
						'donate_status' => '1'				
						);
						
						
					$add_wallet=$this->db->insert('wallet',$data);	
		
		
		
			$email_template=$this->db->query("select * from `email_template` where task='New Fund Admin Notification'");
			$email_temp=$email_template->row();				
			
			$email_address_from=$email_temp->from_address;
			$email_address_reply=$email_temp->reply_address;
			$email_subject = WALLET_PAYMENT_PROCESS_FAILED;
			$email_to = $login_user['email'];
			
			$user_id=$this->session->userdata('user_id');
			$login_user = get_user_detail($this->session->userdata('user_id'));
		
		
			$str = sprintf(WALLET_HELLO_USER_YOUR_WALLET_PAYMENT_PROCESS_SUCCESS_WAIT_UNTIL_ADMINISTRATOR_REVIEW,$login_user['user_name']);
			email_send($email_address_from,$email_address_reply,$email_to,$email_subject,$str);		
			
			$msg='<p style="color:#7DBF0F; font-weight:bold;">'.WALLET_AMOUNT_ADDED_IN_WALLET_SUCCESSFULLY_WAIT_FOR_ADMINISTRATOR_REVIEW.'</p>';
			redirect('wallet/my_wallet/0/'.$msg);
			
			
			}
			
			else
			{
				$msg=OUR_PAYMENT_PROCESS_DECLINED_DUE_TO_TRANSACTIONID_ALREADY_EXISTS;
				redirect('wallet/my_wallet/0/'.$msg);
			}
			
		}
		
		elseif($res_num=='2'){
								
			$msg=$response_array[3];
			redirect('wallet/my_wallet/0/'.$msg);
		}
		
		elseif($res_num=='3'){
								
			$msg=$response_array[3];
			redirect('wallet/my_wallet/0/'.$msg);
		}
		elseif($res_num=='4'){
								
			$msg=PAYMENT_PROCESS_HELD_FOR_REVIEW;
			redirect('wallet/my_wallet/0/'.$msg);
		}
		else
			{
				$msg=YOUR_PAYMENT_PROCESS_DECLINED;
				redirect('wallet/my_wallet/0/'.$msg);
			}
		
	}
		
	}

	//////////=============authorize .net aim================
		
		
		
	 //////////=============amazon transaction================
	 
	function amazon_payment($pid=null,$amount=null)
	{
		
			
		$site_setting = site_setting();
		$wallet_setting = wallet_setting();
		$minimum_amount=$wallet_setting->wallet_minimum_amount;
		$chk_amt=$amount;
		
		if($chk_amt<$minimum_amount)
		{
			redirect('wallet/add_wallet/fail');		
		}
			
		
		$login_user = get_user_detail($this->session->userdata('user_id'));
			
	
			
			$amaemail=$this->get_gateway_result($pid,'amazon_email');
			$site_status=$this->get_gateway_result($pid,'site_status');
			
			 $aws_access_key_id=$this->get_gateway_result($pid,'aws_access_key_id');
			 $aws_secret_access_key=$this->get_gateway_result($pid,'aws_secret_access_key');
			

			$amazonss_url='https://fps.sandbox.amazonaws.com';
			$CBUI_URL = "https://authorize.payments-sandbox.amazon.com/cobranded-ui/actions/start";
			
			 if($site_status['value']=='sandbox')
			 {		 
				$amazonss_url='https://fps.sandbox.amazonaws.com';
				$CBUI_URL = "https://authorize.payments-sandbox.amazon.com/cobranded-ui/actions/start";
			 }
			 if($site_status['value']=='live')
			 {		 
				$amazonss_url='https://fps.amazonaws.com';
				$CBUI_URL = "https://authorize.payments.amazon.com/cobranded-ui/actions/start";		
			 }
			 
			
			 
			 define('AWS_ACCESS_KEY_ID', $aws_access_key_id['value']);
			 define('AWS_SECRET_ACCESS_KEY', $aws_secret_access_key['value']); 
				 
				 
								
			$this->load->library('CBUISingleUsePipelineSample'); //echo "123<br>" ;      
			
			$pipeline = new Amazon_FPS_CBUISingleUsePipeline(AWS_ACCESS_KEY_ID, AWS_SECRET_ACCESS_KEY, $CBUI_URL);		
			
			$wallet_setting = wallet_setting();
			$wallet_add_fees=$wallet_setting->wallet_add_fees;	
			$add_fees= number_format((($amount * $wallet_add_fees)/100),2);
				
			$total = number_format(($add_fees + $amount),2);
		
			$uniqueId = 'Caller-'.microtime(true).'#'.$total.'#'.$pid;	
			
			$pipeline->setMandatoryParameters($uniqueId,site_url('user/sendercallback'), $amount);
			$pipeline->addParameter("currencyCode", "USD");
			$pipeline->addParameter("paymentMethod", "CC");
			
			
			$url=$pipeline->getURL();
		   
			//print "Sample CBUI url for MultiUse pipeline : " . $pipeline->getURL() . "\n";
			
			
			redirect($url);	
	
	
	}


	function sendercallback()
	{
		
		 //////===gettting sender token id=======
		 $sender_token_id=$_GET['tokenID'];		
		 $callerReference=$_GET['callerReference'];
		
		$signature=$_GET['signature'];
		$signatureVersion=$_GET['signatureVersion'];
		$signatureMethod=$_GET['signatureMethod'];
		 $certificateUrl='https://'.$_GET['certificateUrl'];
		$status=$_GET['status'];
	
		
		
		$login_user = get_user_detail($this->session->userdata('user_id'));
		
			$query = $this->db->get_where('admin');
			$res_admin = $query->row_array();
			$email_address_from = $res_admin['email'];
			$date=date('Y-m-d H:i:s');
			$ip=$_SERVER['REMOTE_ADDR'];	
			
			 //////=======check if sender token id is blank or caller reference is not received===== 
		 
			if($sender_token_id!='' && $callerReference!='')
			{	
					
					$this->load->library('SignatureUtilsSample');
					
					$utils = new Amazon_FPS_SignatureUtilsForOutbound();
					
					$params["signature"] = $signature;
			
					$params["signatureVersion"] = $signatureVersion;
					$params["signatureMethod"] = $signatureMethod;
					$params["certificateUrl"] = $certificateUrl;
					$params["status"] =$status;
					$params["callerReference"] = $callerReference;
		 
					$urlEndPoint = site_url('user/sendercallback'); //Your return url end point. 
					
					//print "Verifying return url signed using signature v2 ....\n";
					//return url is sent as a http GET request and hence we specify GET as the http method.
					//Signature verification does not require your secret key
				//	print "Is signature correct: " . $utils->validateRequest($params, $urlEndPoint, "GET") . "\n";
					
					$result=$utils->validateRequest($params, $urlEndPoint, "GET");
					
					log_message('error',"AMAZON WALLET RETURN DATA:".$result);
					
					
					if($result!='success')
					{
						//echo "Fail: ".$googleresult->Errors->Error->Message."\n";
						
						//mail(fail);
						
							
				$email_template=$this->db->query("select * from `email_template` where task='New Fund Admin Notification'");
				$email_temp=$email_template->row();				
								
				
				$email_address_from=$email_temp->from_address;
				$email_address_reply=$email_temp->reply_address;
				$email_subject = WALLET_PAYMENT_PROCESS_FAILED;
				$email_to = $login_user['email'];
							
				$str = sprintf(WALLET_HELLO_YOUR_PAYMENT_PEOCESS_VIOLATED_PLEASE_CHECK_YOUR_ACCOUNT_BALANCE_OR_SETTING_TRY_AGAIN,$login_user['user_name']);		
				email_send($email_address_from,$email_address_reply,$email_to,$email_subject,$str);
				
				}
					else
					{
						///success
						
						$caller_ex=explode('#',$callerReference);
						
						$pay_gross=$caller_ex[1];
						$gateway_id=$caller_ex[2];
						$payer_status='Paid';
						$txnid='remian';
						
						$user_id=$this->session->userdata('user_id');
						
						$admin_status='Review';
					
					
			$chk_status_admin=$this->db->query("select * from wallet where user_id='".$user_id."' and admin_status='Confirm'");
			
			if($chk_status_admin->num_rows()>3)
			{
					$admin_status='Confirm';
			}
			
						
						
						$data=array(
							'debit' => $pay_gross,
							'user_id' => $user_id,
							'status' => $payer_status,
							'admin_status' =>$admin_status,
							'wallet_date' => $date,
							'wallet_transaction_id' => $txnid,
							'wallet_payee_email' => 'Amazon Token',
							'wallet_ip' => $ip	,
							'gateway_id' => $gateway_id				
							);
							
							
							
							$add_wallet=$this->db->insert('wallet',$data);
												
				$email_template=$this->db->query("select * from `email_template` where task='New Fund Admin Notification'");
				$email_temp=$email_template->row();				
								
				
				$email_address_from=$email_temp->from_address;
				$email_address_reply=$email_temp->reply_address;
				$email_subject = WALLET_PAYMENT_PROCESS_FAILED;
				$email_to = $email_address_from;
				$str = sprintf(WALLET_HELLO_USER_YOUR_WALLET_PAYMENT_PROCESS_SUCCESS_WAIT_UNTIL_ADMINISTRATOR_REVIEW,$login_user['user_name']);							
		
				email_send($email_address_from,$email_address_reply,$email_to,$email_subject,$str);
			}
				
		
				}
					
			else
			{
						
												
											
				$email_template=$this->db->query("select * from `email_template` where task='New Fund Admin Notification'");
				$email_temp=$email_template->row();				
								
				
				$email_address_from=$email_temp->from_address;
				$email_address_reply=$email_temp->reply_address;
				$email_subject = WALLET_PAYMENT_PROCESS_FAILED;
				$email_to = $login_user['email'];
				
							
				$str = sprintf(WALLET_LOGIN_USER_YOUR_WALLET_PAYMENT_PROCESS_VIOLATED_PLEASE_CHECK_YOUR_SETTINGS_TRY_AGAIN_THANKYOU,$login_user['user_name']);			
				email_send($email_address_from,$email_address_reply,$email_to,$email_subject,$str);				
							
			}
	}

	 //////////=============amazon transaction================
		
	
	///////////////////********************Wallet System========================
	
	
	 
	
	function incoming_fund($pid='',$offset=0,$msg='')
	{
	   
		$wallet_setting = wallet_setting();
		if($wallet_setting->wallet_enable==0)
		{
			redirect('home/dashboard');
		}
		if($this->session->userdata('user_id')== '')
		{
			redirect('home/login');
		}
		$this->load->library('pagination');
		
		$limit = '15';
		$config['uri_segment']='4';
		$config['base_url'] = site_url('user/incoming_fund/'); 
		$config['per_page'] = $limit;
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();
		$data['limit']=$limit;
		$data['wallet_setting']=$wallet_setting;
		$data['offset']=$offset;	
		$data['project'] = get_one_project($pid);
		$data['total_rows'] = $this->user_model->get_total_incomingfund__list($pid,$this->session->userdata('user_id'));
		$data['incoming_fund']=$this->user_model->get_total_incomingfund($pid,$this->session->userdata('user_id'),$limit);	
		$data['target_fund']=$this->user_model->get_target_fund($pid,$this->session->userdata('user_id'));
		$data['pro_id']=$pid;
		$data['error'] = "";
		$data['view'] = "login";
		$data['view'] = "signup";
		$data['msg'] = $msg;
		$data['header_menu'] = dynamic_menu(0);
		$data['footer_menu'] = dynamic_menu_footer(0);
		$data['right_menu'] = dynamic_menu_right(0);
		$data['site_setting'] = site_setting();	
		$meta = meta_setting();
		$user = get_user_detail($this->session->userdata('user_id'));
		$this->home_model->select_text($this->session->userdata('lang_id'));
		$this->template->write('meta_title','My Wallet-'.$user['user_name'].' '.$user['last_name'].' - '.$meta['title'], TRUE);
		$this->template->write('meta_description','My Wallet-'.$user['user_name'].' '.$user['last_name'].' - '. $meta['meta_description'], TRUE);
		$this->template->write('meta_keyword', 'My Wallet-'.$user['user_name'].' '.$user['last_name'].' - '.$meta['meta_keyword'], TRUE);
		
		$this->template->write_view('header', 'default/header_login', $data, TRUE);
		$this->template->write_view('center_content', 'default/wallet/incoming_fund', $data, TRUE);
		$this->template->write_view('footer', 'default/footer',$data, TRUE);
		$this->template->render();
	
	}	
	
	
	
	
	
}
?>