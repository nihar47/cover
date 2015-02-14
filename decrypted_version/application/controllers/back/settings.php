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


class Settings extends ROCKERS_Controller {

	function Settings()
	{
		parent::__construct();	
		
		$this->load->model('home_model');
		$this->load->model('project_model');
		$this->load->model('newsletter_model');
		$this->load->library('securimage');
		$this->load->model('user_model');
		
		
	}
	
	////////=======verify user paypal email address by adaptive paypal features
	function index(){}
	
	function paypal()
	{
		if(!check_user_authentication()) {  redirect('home/login'); } 
		
		$data['msg']='';	
		$verify='no';
		
		//$user_detail = get_user_detail(get_authenticateUserID());	
		
		
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('user_name',FIRST_NAME, 'required|alpha_space');
		$this->form_validation->set_rules('last_name', LAST_NAME, 'required|alpha_space');		
		$this->form_validation->set_rules('paypal_email', PAYPAL_EMAIL, 'required|valid_email');
		
		$data['result'] = get_user_detail(get_authenticateUserID());
		$result = $data['result'];
		if($this->form_validation->run() == FALSE)
		{
			if(validation_errors())
			{
				
				$data["error"] = validation_errors();
				$data['user_name']=$this->input->post('user_name');
			    $data['last_name']=$this->input->post('last_name');
			    $data['paypal_email']=$this->input->post('paypal_email');
			 
			}else{
				$data["error"] = "";
			
			$data['user_name']=$result['paypal_username'];
			$data['last_name']=$result['paypal_lastname'];
			$data['paypal_email']=$result['paypal_email'];
			}
			
			
			/*$data['user_name']=$this->input->post('user_name');
			$data['last_name']=$this->input->post('last_name');
			$data['paypal_email']=$this->input->post('paypal_email');*/
			
			
			
		
		} else {
		
			
		
			$user_detail = get_user_detail(get_authenticateUserID());	
			//$this->db->query("update user set paypal_email='".$this->input->post('paypal_email')."' where user_id='".get_authenticateUserID()."'");

			 $paypal=credit_card_setting();
		echo '<pre>';
		print_r($paypal);
		echo '</pre>';
				//////////=================Get PAYPAL SETTING  FROM DATABASE 	================
				$api_username=$paypal->credit_card_username;
				$api_password=$paypal->credit_card_password;	
				$api_key=$paypal->credit_card_api_signature;

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
					
					
					$this->load->library('Creditcard');
					
					$NVP_SampleConstants = new Creditcard();
					
					
					/////=================par receipt file header part================ 
					
					try {
			
							$request_array= array
							(
								RequestEnvelope::$requestEnvelopeErrorLanguage=> 'en_US',
								GetVerifiedStatus::$emailAddress=>$this->input->post('paypal_email'),
								GetVerifiedStatus::$firstName=> $this->input->post('user_name'),
								GetVerifiedStatus::$lastName=> $this->input->post('last_name'),
								GetVerifiedStatus::$matchCriteria=> 'NAME',
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
			
				$this->db->query("update user set paypal_username='".$this->input->post('user_name')."',
				                  paypal_lastname='".$this->input->post('last_name')."' ,
								  paypal_verified='1', paypal_email='".$this->input->post('paypal_email')."' 
								  where user_id='".get_authenticateUserID()."'");
				
				$data['error'] = '';
				$data['msg']='success';
				$data['user_name']=$this->input->post('user_name');
				$data['last_name']=$this->input->post('last_name');
				$data['paypal_email']=$this->input->post('paypal_email');
				
				//redirect('settings/paypal');
			}
			else
			{
				
				$this->db->query("update user set paypal_username='',
				                  paypal_lastname='',paypal_verified='0', paypal_email='' where user_id='".get_authenticateUserID()."'");			
			//$verify_error='<p>'.ENTER_CORRECT_PAYPAL.'</p>'; 	
				$verify_error='<p>'.ENTER_CORRECT_PAYPAL_EMAIL.'<br>PayPal Response : '.$resArray['error(0).errorId'].'-'.$resArray['error(0).message'].'</p>'; 
				
				$data['error'] = $verify_error;
				$data['user_name']=$this->input->post('user_name');
				$data['last_name']=$this->input->post('last_name');
				$data['paypal_email']=$this->input->post('paypal_email');
			}
			
			
		}
		
		
		
		
		
		$meta = meta_setting();
		$data['site_setting'] = site_setting();
		
		$this->home_model->select_text();
		$this->template->write('meta_title','Verify Paypal Account-'. $meta['title'], TRUE);
		$this->template->write('meta_description','Verify Paypal Account-'. $meta['meta_description'], TRUE);
		$this->template->write('meta_keyword','Verify Paypal Account-'. $meta['meta_keyword'], TRUE);
		$this->template->write_view('header', 'default/common/header_login', $data, TRUE);
		$this->template->write_view('center_content', 'default/user/verify_paypal', $data, TRUE);
		$this->template->write_view('footer', 'default/common/footer',$data, TRUE);
		$this->template->render();
	
	}
	
	
}	?>