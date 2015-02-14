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
class Stored_card extends ROCKERS_Controller 
{
	/*
	Function name :Stored_card()
	Description :Its Default Constuctor which called when stored_card object initialzie.its load necesary models
	*/
	
	function Stored_card()
	{
		parent::__construct();	
		$this->load->model('home_model');
		$this->load->model('user_model');	
		$this->load->library('CreditCardFreezer');
	}
	
	
	/*
	Function name :index()
	Parameter :none
	Return : none
	Use : verify user identity using a credit card to protect our runner against mischievous users.
	Description : verify user identity using a credit card to protect our runner against mischievous users which is called by http://hostname/stored_card
	*/
	
	
	public function index()
	{
		if($this->session->userdata('user_id')== '')
		{
			redirect('home/login');
		}
		
		
		$user_info=get_user_detail($this->session->userdata('user_id'));
		$data['user_info']=$user_info;
		
		if(!$user_info)
		{
			redirect('home/');
		}
		
		
		$credit_card_setting=credit_card_setting();	
		
		if($credit_card_setting->credit_card_gateway_status==0)
		{
			redirect('home/');
		}
		
		
		$site_setting=site_setting();
		
		
		$card_info=get_user_card_info($this->session->userdata('user_id'));
		
		$data['card_info']=$card_info;
		
		////=====0 use paypal email  and  1 use credit card detail
		
		$use_credit_card=1;
		
		
		
		if($use_credit_card==1)
		{
		
			$this->form_validation->set_rules('card_first_name', CREDIT_CARD_FIRST_NAME, 'required|alpha');
			$this->form_validation->set_rules('card_last_name',CREDIT_CARD_LAST_NAME, 'required|alpha');
			$this->form_validation->set_rules('cardnumber', CREDIT_CARD_STORE_NUMBER, 'required|integer|numeric|min_length[12]|max_length[19]');	
			$this->form_validation->set_rules('cardtype',CREDIT_CARD_TYPE, 'required|alpha');
			
			$this->form_validation->set_rules('card_expiration_month',CREDIT_CARD_EXPIRY_MONTH, 'required|integer');
			$this->form_validation->set_rules('card_expiration_year',CREDIT_CARD_EXPIRY_YEAR, 'required|integer');
			
			$this->form_validation->set_rules('cvv2Number', CREDIT_CARD_VERFICATION_NUMBER, 'required|integer|exact_length[3]'); 
			
			
			$this->form_validation->set_rules('card_address',CREDIT_CARD_ADDRESS, 'required');
			$this->form_validation->set_rules('card_city', CREDIT_CARD_CITY, 'required|alpha_space');
			$this->form_validation->set_rules('card_state', CREDIT_CARD_STATE, 'required|alpha_space');
			$this->form_validation->set_rules('card_zipcode', CREDIT_CARD_ZIPCODE, 'required|alpha_numeric|min_length[4]|max_length[9]');	
			
		} else {
			
			$this->form_validation->set_rules('card_paypal_email', CREDICT_CARD_PAYPAL_EMAIL, 'required|trim|valid_email');
		}
			
		
		
		
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
				
				if($use_credit_card==1)
				{
					if($_POST)
					{
				
					$data['card_first_name']=$this->input->post('card_first_name');
					$data['card_last_name']=$this->input->post('card_last_name');
					$data['cardnumber']=$this->input->post('cardnumber');
					$data['cardtype']=$this->input->post('cardtype');
					$data['card_expiration_month']=$this->input->post('card_expiration_month');
					$data['card_expiration_year']=$this->input->post('card_expiration_year');
					$data['cvv2Number']=$this->input->post('cvv2Number');	
					
					$data['card_address']=$this->input->post('card_address');	
					$data['card_city']=$this->input->post('card_city');	
					$data['card_state']=$this->input->post('card_state');	
					$data['card_zipcode']=$this->input->post('card_zipcode');					
					
					$data['card_verify_status']='';
					
						
				
				}
				
					else
					{
					
					if($card_info)
					{	
						
						
						$sec=CREDITCARDSECURENUMBER;
						$obj3 = new CreditCardFreezer();					
						$obj3->setPassKey($sec);
						$obj3->set(CreditCardFreezer::NUMBER,$card_info->card_number, true);
						$card_number= substr($obj3->get(CreditCardFreezer::NUMBER),5);
					
					
						$data['card_first_name']=$card_info->card_first_name;
						$data['card_last_name']=$card_info->card_last_name;
						$data['cardnumber']=$card_number;
						
						
						$data['cardtype']=$card_info->card_type;
						$data['card_expiration_month']=$card_info->card_expiration_month;
						$data['card_expiration_year']=$card_info->card_expiration_year;	
						$data['cvv2Number']='';					
						
				
						$data['card_address']=$card_info->card_address;
						$data['card_city']=$card_info->card_city;
						$data['card_state']=$card_info->card_state;
						$data['card_zipcode']=$card_info->card_zipcode;
						$data['card_expiration_year']=$card_info->card_expiration_year;
						$data['card_verify_status']=$card_info->card_verify_status;
						
						
						
						
					}
					
					else
					{
						
						$data['card_first_name']=$this->input->post('card_first_name');
						$data['card_last_name']=$this->input->post('card_last_name');
						$data['cardnumber']=$this->input->post('cardnumber');
						$data['cardtype']=$this->input->post('cardtype');
						$data['card_expiration_month']=$this->input->post('card_expiration_month');
						$data['card_expiration_year']=$this->input->post('card_expiration_year');
						$data['cvv2Number']=$this->input->post('cvv2Number');	
						
						
						$data['card_address']=$this->input->post('card_address');	
						$data['card_city']=$this->input->post('card_city');	
						$data['card_state']=$this->input->post('card_state');	
						$data['card_zipcode']=$this->input->post('card_zipcode');	
						
						$data['card_verify_status']='';				
						
					
						
					}
					
				}
				
				} else {
				
					if($_POST)
					{				
						$data['card_paypal_email']=$this->input->post('card_paypal_email');
						$data['card_paypal_verify']=$card_info->card_paypal_verify;									
					}
					
					else
					{
					
						if($card_info)
						{						
							$data['card_paypal_email']=$card_info->card_paypal_email;
							$data['card_paypal_verify']=$card_info->card_paypal_verify;						
						}
					
						else
						{						
							$data['card_paypal_email']=$this->input->post('card_paypal_email');
							$data['card_paypal_verify']=0;			
						}
					
					}
				}
				
		
				
		} else	{
							
		
		
		
			if($use_credit_card==1)
			{
			
			////////////////////=============authorize part================
		
		
		
				$paymentType='Authorization';
	
		$amount=0.1;
		
		
			$this->load->library('creditcard');	
			
			$config=array();		
			
			
			if($credit_card_setting->credit_card_site_status==1)
			{
				$end_point='https://api-3t.paypal.com/nvp';
			}	
			else
			{
				$end_point='https://api-3t.sandbox.paypal.com/nvp';
			}
			
			
			if($credit_card_setting->credit_card_use_proxy==1)
			{
				$end_proxy=TRUE;
			}
			else
			{
				$end_proxy=FALSE;
			}
			
			
			 $config['API_USERNAME'] = $credit_card_setting->credit_card_username;		
			 $config['API_PASSWORD'] = $credit_card_setting->credit_card_password;	
			 $config['API_SIGNATURE'] = $credit_card_setting->credit_card_api_signature;				
			 $config['API_ENDPOINT'] = $end_point;
			 $config['VERSION'] = $credit_card_setting->credit_card_version;	
			 $config['SUBJECT'] = $credit_card_setting->credit_card_subject;				
			 $config['USE_PROXY'] = $end_proxy;			
			 $config['PROXY_HOST'] =  $credit_card_setting->credit_card_proxy_host;	
			 $config['PROXY_PORT'] =  $credit_card_setting->credit_card_proxy_port;	
	
	
			
			
			$crditobj=$this->creditcard->config($config);
			
			
			/**
			 * Get required parameters from the web form for the request
			 */
			$paymentType =urlencode($paymentType);
			$firstName =urlencode($_POST['card_first_name']);
			$lastName =urlencode($_POST['card_last_name']);
			$creditCardType =urlencode($_POST['cardtype']);
			$creditCardNumber = urlencode($_POST['cardnumber']);
			$expDateMonth =urlencode($_POST['card_expiration_month']);
			
			// Month must be padded with leading zero
			$padDateMonth = str_pad($expDateMonth, 2, '0', STR_PAD_LEFT);
			
			$expDateYear =urlencode( $_POST['card_expiration_year']);
			$cvv2Number = urlencode($_POST['cvv2Number']);
			
			
			
			
			///////===location part====
			
			
				$address1 = urlencode($_POST['card_address']);		
				$city = urlencode($_POST['card_city']);
				$state =urlencode( $_POST['card_state']);
				$zip = urlencode($_POST['card_zipcode']);
			
		
			
			
			
			$amount = urlencode($amount);
			$currencyCode="USD";
			$paymentType=urlencode($paymentType);
			
			/* Construct the request string that will be sent to PayPal.
			   The variable $nvpstr contains all the variables and is a
			   name value pair string with & as a delimiter */
			$nvpstr="&PAYMENTACTION=$paymentType&AMT=$amount&CREDITCARDTYPE=$creditCardType&ACCT=$creditCardNumber&EXPDATE=".         $padDateMonth.$expDateYear."&CVV2=$cvv2Number&FIRSTNAME=$firstName&LASTNAME=$lastName&STREET=$address1&CITY=$city&STATE=$state".
			"&ZIP=$zip&COUNTRYCODE=US&CURRENCYCODE=$currencyCode";
			
			
			
			/* Make the API call to PayPal, using API signature.
			   The API response is stored in an associative array called $resArray */
			$resArray=$this->creditcard->hash_call("doDirectPayment",$nvpstr);
			
			$strtemp='';
		   foreach ($resArray as $key => $value) {
																		   
				$strtemp.= $key."=".$value.",";
		   }
		   log_message('error',"STORE CARD AUTHORIZE DATA:".$strtemp);
		//	var_dump($resArray);
			//exit;
			/* Display the API response back to the browser.
			   If the response from PayPal was a success, display the response parameters'
			   If the response was an error, display the errors received using APIError.php.
			   */
			$ack = strtoupper($resArray["ACK"]);
			
			  if($ack!="SUCCESS") 
			  {
				  	$data['error']="fail";
					
						$data['card_first_name']=$this->input->post('card_first_name');
						$data['card_last_name']=$this->input->post('card_last_name');
						$data['cardnumber']=$this->input->post('cardnumber');
						$data['cardtype']=$this->input->post('cardtype');
						$data['card_expiration_month']=$this->input->post('card_expiration_month');
						$data['card_expiration_year']=$this->input->post('card_expiration_year');
						$data['cvv2Number']=$this->input->post('cvv2Number');	
						
						$data['card_address']=$this->input->post('card_address');	
						$data['card_city']=$this->input->post('card_city');	
						$data['card_state']=$this->input->post('card_state');	
						$data['card_zipcode']=$this->input->post('card_zipcode');					
						
						$data['card_verify_status']='';
			   }
			   else
			   {
				  
							
					$txnid=$resArray['TRANSACTIONID'];
				
				
					 
				$sec=CREDITCARDSECURENUMBER;
				$obj = new CreditCardFreezer();
				$secure = $obj->set(CreditCardFreezer::NUMBER, $creditCardNumber)
					->set(CreditCardFreezer::EXPIRE_MONTH,$expDateMonth)
					->set(CreditCardFreezer::EXPIRE_YEAR,$expDateYear)
					->setPassKey($sec)
					->get();
								  
				 //echo $secure;
 
 			  
					
				 	 $data_card=array(
						'card_first_name' =>$firstName,
						'user_id'=>$this->session->userdata('user_id'),
						'card_last_name' => $lastName,
						'card_type' => $creditCardType,
						'card_number' => $secure,
						'card_expiration_month' => $expDateMonth,
						'card_expiration_year' => $expDateYear,
						'card_address' => urldecode($address1),
						'card_city' => urldecode($city),
						'card_state' => urldecode($state),
						'card_zipcode'=>urldecode($zip),
						'card_transaction_id'=>$txnid,
						'card_verify_status'=>1,
						'card_date'=>date('Y-m-d H:i:s'),
						'card_ip'=>$_SERVER['REMOTE_ADDR']
					);	
					
					
					$check_record=$this->db->get_where('user_card_info',array('user_id'=>$this->session->userdata('user_id')));
					
					if($check_record->num_rows()>0)
					{		
						$this->db->where('user_id',$this->session->userdata('user_id'));
						$update_card=$this->db->update('user_card_info',$data_card);		
					}
					else
					{
						$add_card=$this->db->insert('user_card_info',$data_card);		
					}
					
					
					
					
					$data['error']="update";
					
					
					$card_info=get_user_card_info($this->session->userdata('user_id'));		
					$data['card_info']=$card_info;
		
		
				
					$data['card_first_name']=$card_info->card_first_name;
					$data['card_last_name']=$card_info->card_last_name;
					
					
					$sec=CREDITCARDSECURENUMBER;
					$obj2 = new CreditCardFreezer();
					 $obj2->setPassKey($sec);
					$obj2->set(CreditCardFreezer::NUMBER,$card_info->card_number, true);
					$card_number= substr($obj2->get(CreditCardFreezer::NUMBER),5); 
					

					
					$data['cardnumber']=$card_number;
					
					
				
					$data['cardtype']=$card_info->card_type;
					$data['card_expiration_month']=$card_info->card_expiration_month;
					$data['card_expiration_year']=$card_info->card_expiration_year;						
					
					$data['card_address']=$card_info->card_address;
					$data['card_city']=$card_info->card_city;
					$data['card_state']=$card_info->card_state;
					$data['card_zipcode']=$card_info->card_zipcode;
					$data['card_expiration_year']=$card_info->card_expiration_year;
					$data['card_verify_status']=$card_info->card_verify_status;
					
					$data['cvv2Number']='';
				
				
			   }
		
		
			////////////////////=============authorize part================
		
			}	
			else
			{
				
				$data_paypal=array(
				'user_id'=>$this->session->userdata('user_id'),
				'card_paypal_verify'=>1,
				'card_paypal_email'=>$this->input->post('card_paypal_email')
				);
				
				
				$check_record=$this->db->get_where('user_card_info',array('user_id'=>$this->session->userdata('user_id')));
					
					if($check_record->num_rows()>0)
					{	
						$this->db->where('user_id',$this->session->userdata('user_id'));
						$this->db->update('user_card_info',$data_paypal);
					}
					else
					{
						$this->db->insert('user_card_info',$data_paypal);
					}
					
					
				
				
				$data['error']="update";
					
					
					$card_info=get_user_card_info($this->session->userdata('user_id'));		
					$data['card_info']=$card_info;
		
		
				
					$data['card_paypal_email']=$card_info->card_paypal_email;
					$data['card_paypal_verify']=$card_info->card_paypal_verify;
				
			}
		
			
			
			
			
			
	   }	
			   
			   
			   
		$data['header_menu'] = dynamic_menu(0);
		$data['footer_menu'] = dynamic_menu_footer(0);
		$data['right_menu'] = dynamic_menu_right(0);
		$data['site_setting'] = site_setting();	
		$meta = meta_setting();
		
	
		$data['use_credit_card']=$use_credit_card;
		
		if($use_credit_card==1)
		{
			$this->template->write('meta_title','My Credit Card-'.$meta['title'], TRUE);
		} else {
			$this->template->write('meta_title','My Paypal Account-'.$meta['title'], TRUE);	
		}
		
		
		
		$this->template->write('meta_description',$meta['meta_description'], TRUE);
		$this->template->write('meta_keyword',$meta['meta_keyword'], TRUE);
			
			if($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1)
			{
				$this->template->set_master_template('iphone/template.php');
				
				
				if($use_credit_card==1)
				{
					$this->template->write_view('main_content', 'iphone/wallet/stored_card', $data, TRUE);
				} else {
					$this->template->write_view('main_content', 'iphone/wallet/paypal_store', $data, TRUE);
				}
				
				$this->template->render();
			}
			elseif(($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1)
			{
				$this->template->set_master_template('mobile/template.php');
				
				if($use_credit_card==1)
				{
					$this->template->write_view('main_content', 'mobile/wallet/stored_card', $data, TRUE);
				} else {
					$this->template->write_view('main_content', 'mobile/wallet/paypal_store', $data, TRUE);
				}
				
				$this->template->render();
			}
			else
			{
				$this->template->write_view('header', 'default/header_login', $data, TRUE);
				
				if($use_credit_card==1)
				{
					$this->template->write_view('center_content', 'default/wallet/stored_card', $data, TRUE);
				} else {
					$this->template->write_view('center_content', 'default/wallet/paypal_store', $data, TRUE);
				}
				
				$this->template->write_view('footer','default/footer',$data, TRUE);
				$this->template->render();
			}
		
		
		
	}
	
}

?>