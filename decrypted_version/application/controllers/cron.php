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
class Cron extends ROCKERS_Controller {

	function Cron()
	{
		 parent::__construct();	
		$this->load->model('home_model');
		$this->load->model('project_model');
		
		
	}
	
	
	//////////////===============check spam ip===========
	
	
	
	function check_spam_report()
	{
		
		$spam_control=$this->db->query("select * from spam_control");
		$control=$spam_control->row();
		
		$report_total=$control->spam_report_total;
		$total_register=$control->total_register;
		
		$report_expire=date('Y-m-d', strtotime('+'.$control->spam_report_expire.' days'));
		$register_expire=date('Y-m-d', strtotime('+'.$control->register_expire.' days'));
		
		
		$total_contact=$control->total_contact;
		$contact_expire=date('Y-m-d', strtotime('+'.$control->contact_expire.' days'));
		
		////////////////=======common check=================
		
		$get_report=$this->db->query("select spam_ip, count(*) as total from spam_report_ip group by spam_ip HAVING COUNT(*) >= ".$report_total);
		
		
		
		if($get_report->num_rows()>0)
		{
			$report=$get_report->result();
			
			foreach($report as $rs)
			{
				$insert_spam=$this->db->query("insert into spam_ip(`spam_ip`,`start_date`,`end_date`)values('".$rs->spam_ip."','".date('Y-m-d')."','".$report_expire."')");
												
				$delete_from_report=$this->db->query("delete from spam_report_ip where spam_ip='".$rs->spam_ip."'");
									
			}
		}
		
		
		////////////////=======common check=================
		
		
		////////////////=======Registration check=================
		
		
		$chk_register=$this->db->query("select signup_ip, count(*) as total from user group by signup_ip HAVING COUNT(*) >= ".$total_register);
		
		if($chk_register->num_rows()>0)
		{
			$register_report=$chk_register->result();
			
			foreach($register_report as $rs)
			{
				$insert_spam=$this->db->query("insert into spam_ip(`spam_ip`,`start_date`,`end_date`)values('".$rs->signup_ip."','".date('Y-m-d')."','".$register_expire."')");
													
			}
		}
		
		
		////////////////=======Registration check=================
		
		
		////////////////=======Inquire check=================
		
		
		$chk_inquiry=$this->db->query("select inquire_spam_ip, count(*) as total from spam_inquiry group by inquire_spam_ip HAVING COUNT(*) >= ".$total_contact);
		
		if($chk_inquiry->num_rows()>0)
		{
			$inquiry_report=$chk_inquiry->result();
			
			foreach($inquiry_report as $rs)
			{
				$insert_spam=$this->db->query("insert into spam_ip(`spam_ip`,`start_date`,`end_date`)values('".$rs->inquire_spam_ip."','".date('Y-m-d')."','".$contact_expire."')");
													
			}
		}
		
		
		////////////////=======Inquire check=================
		
		
		
			
	}
	
	
	//////////////===============make spam ip expire===========
	
	function allow_block_ip()
	{
		
		$check_expire=$this->db->query("select * from spam_ip where permenant_spam!='1' and end_date='".date('Y-m-d')."'");
		
		if($check_expire->num_rows()>0)
		{
			$expire=$check_expire->result();
			
			foreach($expire as $exp)
			{
				$delete_spam=$this->db->query("delete from spam_ip where spam_ip='".$exp->spam_ip."'");
			}			
		}	
	
	}
	
	
	
	//////////////===============check spam ip===========
	
	
	
	
	
function cron_preapprove()
{
		
	$site_setting = $this->home_model->select_site_setting();
	
	
		if($site_setting['currency_code']!='') {
		
			$currency_code=$site_setting['currency_code'];
		
		}
		else
		{
			$currency_code='USD';
		}
		
		
		$chk_auto_target_achive=$site_setting['auto_target_achive'];
	
	
			////////=============email=====================
							
			$this->load->library('email');
				
			

				$email_setting=$this->db->query("select * from `email_setting` where email_setting_id='1'");
				$email_set=$email_setting->row();

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
		
		
			
			//////////////==================email set =============				
			
			
			
			
			
	
	
	
		
	$paypal_adaptive_detail=$this->db->query("select * from paypal");
	 $paypal=$paypal_adaptive_detail->row();
	 
	
if($paypal->gateway_status=='1')
{
		
		
		
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
	
	
	
	
	
		
	///////////////==============Fees Payer Type=================
	
	/////////======The payer of PayPal fees.
	
	///===Allowed values are:
	
	///=== 1) SENDER     Sender pays all fees (for personal, implicit simple/parallel payments)
	///=== 2) PRIMARYRECEIVER    Primary receiver pays all fees
	///=== 3) EACHRECEIVER     Each receiver pays their own fee (default and personal payments)
	///=== 4) SECONDARYONLY     Secondary receivers pay all fees (use only for chained payments with one secondary receiver)
	
	
	
	
	
	///=====NOTE :: === The fee payer SENDER cannot be used if a primary receiver is specified ======
		
	 	$feesPayer='PRIMARYRECEIVER';   /////========for preapproval always it cuts from the project owner means a primary receiver is feespayer
			
			
	
	
	
	
	
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
		define('APPLICATION_ID', $application_id );
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
		
		
		
		
//session_start();

		
		$email_template=$this->db->query("select * from `email_template` where task='New Fund Admin Notification'");
		$email_temp=$email_template->row();	
		
		$email_address_from=$email_temp->from_address;
		$email_address_reply=$email_temp->reply_address;	
					
					

if($chk_auto_target_achive==1)
{
	$get_project=$this->db->query("select * from project where (end_date<=now() or  CAST(amount_get as decimal(10,2))>= CAST(amount as decimal(10,2))) and active='1'");
}
else
{
	$get_project=$this->db->query("select * from project where end_date<=now() and active='1'");
}



if($get_project->num_rows()>0)
{
	
	
	
	$project=$get_project->result();
	
	
	foreach($project as $prjs)
	{
	
		///======payment_type==0   for FIXED and target must be achieved   and 1==FLXIBLE in which no need for target achieved
		
		
		if($prjs->payment_type=='0' and $prjs->amount_get>=$prjs->amount)
		{
	
	
	
		
		$id=$prjs->project_id;
		
		$prj = $this->project_model->get_project_user($id);
				
		$user_detail=get_user_detail($prj['user_id']);
			
		$project_title=$prj['project_title'];
		$project_id=$prjs->project_id;
						 
		$project_owner_email=$user_detail['paypal_email'];
		$project_create_name=$user_detail['user_name'].' '.$user_detail['last_name'];
		
		
		
			$get_preapproval=$this->db->query("select * from transaction where project_id='".$prjs->project_id."' and preapproval_key!='' and (preapproval_status='FAIL' or preapproval_status='ON_HOLD')");

			if($get_preapproval->num_rows()>0)
			{
					
									
				$transaction_detail=$get_preapproval->result();
				
				
				foreach($transaction_detail as $transd)
				{
				
				
				
				
			try {


	$returnURL = site_url('cron/cron_preapprove/');     //////////=project detail page link will goes here
	$cancelURL = site_url('cron/cron_preapprove/');
	$ipnNotificationUrl=site_url('cron/cron_preapprove/');
	
	$preapprovalKey=$transd->preapproval_key;   /////////////////////===========get from the paypal database or take from user post=======
	
	
	
	$donar_email=$transd->email;
 	$donar_comment=$transd->comment;
	$donar_name=$transd->name;
	
	$donar_amount = $transd->preapproval_total_amount;  ////===user posted amount
	
	
				
				
		
	
	
	////////////////////////////////////////////
	
 	//$transaction_fees=$paypal->fixed_fees;  ////= from the database
	
	$transaction_fees = $site_setting['fixed_fees'];
	

	
	
			
	/*$paypal_fees='5.00';    ////= from the database
	
	$fee_paypal='0';       ////= add this amount to project owner amount if the fees payer is PRIMARYRECEIVER 
	
	if($paypal_fees!='' || $paypal_fees!='0.00')
	{
		$fee_paypal= (($donar_amount * $paypal_fees)/100);	
	}
	
	$donate_amount_total_after_paypal=$donar_amount + $fee_paypal;*/
	
	////////////////////////////////
	
	
	
	 	$admin_amount= (($donar_amount * $transaction_fees)/100);   
		
		
		 $project_owner_amount= $donar_amount;   						////=======assign full amount to the owner for fees payer						
	
	
		$admin_amount= number_format($admin_amount,2);
		$project_owner_amount=number_format($project_owner_amount,2);
	
	
		$senderEmail  =$donar_email;				///////////========*******DONAR/SENDER Pay Email Address====*******
	
	
	
	$payer_name='Project Creator';
	
	
	
	$request_array= array(
	
	//Pay::$actionType => $_REQUEST['actionType'],   
	
	Pay::$actionType => $actionType, 
	
	
	Pay::$cancelUrl  => $cancelURL,
	Pay::$returnUrl=>   $returnURL,
	Pay::$ipnNotificationUrl=>   $ipnNotificationUrl,
	//Pay::$currencyCode  => $_REQUEST['currencyCode'], 
	
	Pay::$currencyCode  =>$currency_code,   

	Pay::$clientDetails_deviceId  => DEVICE_ID,
	Pay::$clientDetails_ipAddress  => $_SERVER['REMOTE_ADDR'],
	Pay::$clientDetails_applicationId =>APPLICATION_ID,
	RequestEnvelope::$requestEnvelopeErrorLanguage => 'en_US',

	Pay::$memo =>  "Project : ".$project_title."(".$project_id."), Amount : ".$donar_amount .",".$payer_name." Pay Fees(%) : ".$transaction_fees.", Create By : ".$project_create_name.", On Site : ".base_url() ,				/////////=============comment send to all payment receiver ====
		
	Pay::$feesPayer => $feesPayer              /////////////////set in the  pay from means our database adaptive setting  
	
	
	//////===================*************=====================
	

	);
	
	
	
	
	
	
	
	
	/////////================Set all receiver amount and email and  primary email
	
	
	
	
	////////=set primary receiver============
	
	$request_array[Pay::$receiverEmail[0]] = $project_owner_email;
	$request_array[Pay::$receiverAmount[0]] = $project_owner_amount;
	
	$request_array[Pay::$primaryReceiver[0]] = 'true';
	
	
	
	////////=set Admin  receiver============
		
	$admin_email=$paypal->paypal_email;
	
	
	$request_array[Pay::$receiverEmail[1]] = $admin_email;
	$request_array[Pay::$receiverAmount[1]] = $admin_amount;
	
	$request_array[Pay::$primaryReceiver[1]] = 'false';
	
	
	
		
	
	/////////=========ABOVE SET======Set preapprovalKey  from the database  or user post ==================
	
	

	if($preapprovalKey!= "")
	{
		$request_array[Pay::$preapprovalKey] = $preapprovalKey;
	}
	
	
	
	
	///////////=========ABOVE SET======*******DONAR/SENDER Pay Email Address====*******
	
	
	
	if($senderEmail!= "")
	{
		$request_array[Pay::$senderEmail]  = $senderEmail;
	}



	/////////////===========Make request URL=========
	

	/*echo "<pre>";
	
	print_r($request_array);*/
	
	
	

	$nvpStr=http_build_query($request_array, '', '&');	
	
	
	/////////////===========Make request URL=========
	
	
	
	

	/* Make the call to PayPal to get the Pay token
	 If the API call succeded, then redirect the buyer to PayPal
	 to begin to authorize payment.  If an error occured, show the
	 resulting errors
	 */
	 

	$resArray=$NVP_SampleConstants->hash_call('AdaptivePayments/Pay',$nvpStr);


	/*echo "<pre>";
	
	print_r($resArray);*/
	
	
	
					/* Display the API response back to the browser.
				 If the response from PayPal was a success, display the response parameters'
				 If the response was an error, display the errors received using APIError.php.
				 */
				$ack = strtoupper($resArray['responseEnvelope.ack']);
				
				$strtemp='';
				foreach ($resArray as $key => $value) {
						//$value = urlencode(stripslashes($value));
						//echo "$key=$value"."<br>";
						
							$strtemp.= $key."=".$value.",";
					}
					log_message('error',"CRON DATA:".$strtemp);
			
			
				if($ack!="SUCCESS"){
					
					//$_SESSION['reshash']=$resArray;
					
					$data= array(
						'reshash' => 	$resArray,	 
						);
					$this->session->set_userdata($data);
					
					//$location = "APIError.php";
					//header("Location: $location");
					
					//echo "APIError(7) ";
									
					
					
					$case ="";
					
					
					////////==fail mail to donar email=====
					
					
			$donar_proj=get_user_detail($transd->user_id);
			
			
			
			
			
					
					$str = sprintf(CRON_YOUR_PAYMENT_PROCESS_VIOLATED_PLEASE_CHECK_YOUR_SETTINGS_TRY_AGAIN_THANKYOU,$donar_proj['user_name'],$resArray['error(0).message']);
					
					//"Hello ".$donar_proj['user_name'].",\n\nYour payment process is violated ".$resArray['error(0).message']."\n\n\nplease check your settings.Try again.\n\n\nThank You.";
				
							
					
					$this->email->from($email_address_from);
					$this->email->reply_to($email_address_reply);
					$this->email->to($donar_email);
					$this->email->subject(PREAPPROVAL_PAYMENT_PROCESS_FAILED);
					$this->email->message($str);
					$this->email->send();
					
					
					
					
					
					
				  $str = sprintf(CRON_YOUR_PAYMENT_PROCESS_VIOLATED_PLEASE_CHECK_YOUR_SETTINGS_TRY_AGAIN_THANKYOU,$donar_proj['user_name'],$resArray['error(0).message']);
				
							
					
					$this->email->from($email_address_from);
					$this->email->reply_to($email_address_reply);
					$this->email->to($donar_proj['email']);
					$this->email->subject(PREAPPROVAL_PAYMENT_PROCESS_FAILED);
					$this->email->message($str);
					$this->email->send();
					
					
					
					
					
				  	$str = sprintf(CRON_HELLO_ADMINISTRATOR_APIERROR7_PAYMENT_PROCESS_VIOLATED_DUE_TO_ERRORMESSAGE_PLEASE_CHECK_YOUR_SETTINGS_TRY_AGAIN_THANKYOU,$resArray['error(0).message'],$donar_proj['user_name'],$donar_proj['email'],$donar_email);
					
					//"Hello Administrator,\n\n APIError(7). Payment process is violated due to ".$resArray['error(0).message']." \n\nDonar Name : ".$donar_proj['user_name']."\n\nDonar Email : ".$donar_proj['email']."\n\nPayee Email : ".$donar_email." \n\nplease check your settings.Try again.\n\n\nThank You.";
				
							
					
					$this->email->from($email_address_from);
					$this->email->reply_to($email_address_reply);
					$this->email->to($email_address_from);
					$this->email->subject("Cron ".PREAPPROVAL_PAYMENT_PROCESS_FAILED." on Project".$project_title."(".$project_id.")");
					$this->email->message($str);
					$this->email->send();
					
					
					
						
					
					
				}
				else
				{
					///$_SESSION['payKey'] = $resArray['payKey'];
					
					$data2= array(
						'payKey' =>	$resArray['payKey'],	 
						);
					$this->session->set_userdata($data2);
					
					
					
					$payKey=$resArray['payKey'];
					
					
				
					
					
					////////==first step will completed mail to donar email=====
					
					
					
					$case ="";
					
					if(($resArray['paymentExecStatus'] == "COMPLETED" ))
					{
						$case ="1";
					}
					else if(($actionType== "PAY") && ($resArray['paymentExecStatus'] == "CREATED" ))
					{
						$case ="2";
							
					}
					else if(($preapprovalKey!=null ) && ($actionType== "CREATE") && ($resArray['paymentExecStatus'] == "CREATED" ))
					{
						$case ="3";
					}
					else if(($actionType== "PAY_PRIMARY"))
					{
						$case ="4";
							
					}
					else if(($actionType== "CREATE") && ($resArray['paymentExecStatus'] == "CREATED" ))
					{
						
						$temp1=API_USERNAME;
						$temp2=str_replace('_api1.','@',$temp1);
						
						if($temp2==$donar_email)
						{
							$case ="3";
						}
						else{
							$case ="2";
						}
						
					}
					
					else
					{
						
						
						$donar_proj=get_user_detail($transd->user_id);
						
						
						////==APIError(8)
						
						$str = sprintf(CRON_YOUR_PAYMENT_PROCESS_VIOLATED_PLEASE_CHECK_YOUR_SETTINGS_TRY_AGAIN_THANKYOU,$donar_proj['user_name']);
						
						//"Hello ".$donar_proj['user_name'].",\n\nYour payment process is violated ".$resArray['error(0).message']."\n\n\nplease check your settings.Try again.\n\n\nThank You.";
				
							
					
					$this->email->from($email_address_from);
					$this->email->reply_to($email_address_reply);
					$this->email->to($donar_email);
					$this->email->subject(PREAPPROVAL_PAYMENT_PROCESS_FAILED);
					$this->email->message($str);
					$this->email->send();
					
					
					
					
					$str = sprintf(CRON_YOUR_PAYMENT_PROCESS_VIOLATED_PLEASE_CHECK_YOUR_SETTINGS_TRY_AGAIN_THANKYOU,$donar_proj['user_name']);
				
							
					
					$this->email->from($email_address_from);
					$this->email->reply_to($email_address_reply);
					$this->email->to($donar_proj['email']);
					$this->email->subject(PREAPPROVAL_PAYMENT_PROCESS_FAILED);
					$this->email->message($str);
					$this->email->send();
					
					
					
					
					
				  	$str = sprintf(CRON_HELLO_ADMINISTRATOR_APIERROR8_PAYMENT_PROCESS_VIOLATED_DUE_TO_ERROR_MESSAGE_PLEASE_CHECK_YOUR_SETTINGS_TRY_AGAIN_THANKYOU,$resArray['error(0).message'],$donar_proj['user_name'],$donar_proj['email'],$donar_email);
					
					//"Hello Administrator,\n\n APIError(8). Payment process is violated due to ".$resArray['error(0).message']." \n\nDonar Name : ".$donar_proj['user_name']."\n\nDonar Email : ".$donar_proj['email']."\n\nPayee Email : ".$donar_email." \n\nplease check your settings.Try again.\n\n\nThank You.";
				
							
					
					$this->email->from($email_address_from);
					$this->email->reply_to($email_address_reply);
					$this->email->to($email_address_from);
					$this->email->subject("Cron ".PREAPPROVAL_PAYMENT_PROCESS_FAILED." on Project".$project_title."(".$project_id.")");
					$this->email->message($str);
					$this->email->send();
						
						
					}
				}
	
	
		}
		
		
		catch(Exception $ex) {
			
		
	
			throw new Exception('Error occurred in PayReceipt method');
			
			////==catchException(8)
			
			////////==fail mail to donar email=====
			
			
				
				$donar_proj=get_user_detail($transd->user_id);
				
				
					
					$str = sprintf(CRON_HELLO_YOUR_PAYMENT_PROCESS_VIOLATED_PLEASE_CHECK_YOUR_SETTINGS_TRY_AGAIN_THANKYOU,$donar_proj['user_name']);
					
					//"Hello ".$donar_proj['user_name'].",\n\nYour payment process is violated. \n\n\nplease check your settings.Try again.\n\n\nThank You.";
				
							
					
					$this->email->from($email_address_from);
					$this->email->reply_to($email_address_reply);
					$this->email->to($donar_email);
					$this->email->subject(PREAPPROVAL_PAYMENT_PROCESS_FAILED);
					$this->email->message($str);
					$this->email->send();
					
					
						$str = sprintf(CRON_HELLO_YOUR_PAYMENT_PROCESS_VIOLATED_PLEASE_CHECK_YOUR_SETTINGS_TRY_AGAIN_THANKYOU,$donar_proj['user_name']);
					
					
							
					
					$this->email->from($email_address_from);
					$this->email->reply_to($email_address_reply);
					$this->email->to($donar_proj['email']);
					$this->email->subject(PREAPPROVAL_PAYMENT_PROCESS_FAILED);
					$this->email->message($str);
					$this->email->send();
					
					
					
					
				 	$str = sprintf(CRON_HELLO_ADMINISTRATOR_CATCHEXCEPTION8_PAYMENT_PROCESS_VIOLATED_CHECK_YOUR_SETTINGS_TRY_AGAIN_THANKYOU,$donar_proj['user_name'],$donar_proj['email'],$donar_email);
					
					// "Hello Administrator,\n\n catchException(8). Payment process is violated.\n\nDonar Name : ".$donar_proj['user_name']."\n\nDonar Email : ".$donar_proj['email']."\n\nPayee Email : ".$donar_email." \n\nplease check your settings.Try again.\n\n\nThank You.";
				
							
					
					$this->email->from($email_address_from);
					$this->email->reply_to($email_address_reply);
					$this->email->to($email_address_from);
					$this->email->subject(PREAPPROVAL_PAYMENT_PROCESS_FAILED." on Project".$project_title."(".$project_id.")");
					$this->email->message($str);
					$this->email->send();
					
										
					
		}
		
		
		
		
		
		
		///////////==========Show payment create detail ===========
		
		
		
		
	        	
    	/*	foreach($resArray as $key => $value) {
    			
    			
					echo "$key   ::  $value </br>";
				
    		}	*/
			
		
	///////////==========Show payment create detail ===========
			
			
			///=====$token = $resArray['payKey'];              Add  this token to database for check the transaction success or fail
		
		
	
	/////////===========for payment redirect user to this link============= 
			
			
			
			
			if($case=='1')
			{
					
					if(strtoupper($resArray['paymentExecStatus']) == "COMPLETED")
					{
						
						$update_status=$this->db->query("update transaction set `preapproval_status`='SUCCESS' , `preapproval_pay_key`='".$resArray['payKey']."' where `preapproval_key`='".$transd->preapproval_key."'");
						
						
						
						$update_project_inactive=$this->db->query("update project set active=0 where project_id='".$transd->project_id."'");
						
						
						
						
							$donar_proj=get_user_detail($transd->user_id);
						
						/////////============SUCCESS Email ==============
						
						
							
							
							
							
							
							
			 $prj = $this->project_model->get_project_user($transd->project_id);				
			 $login_user=get_user_detail($transd->user_id);				
			
							
			$payee_email=$transd->email;			
			$donar_email=$login_user['email'];	
			$donar_id=$transd->user_id;			
			$project_id=$prj['project_id'];			
			$project_owner_normal_email=$prj['email'];		
							
							
							
				
				$username =$prj['user_name'];
				$project_name=$prj['project_title'];
				$project_page_link=site_url('projects/'.$prj['url_project_title'].'/'.$prj['project_id']);
				
				$donor_name=$login_user['user_name'];
				$donote_amount=$transd->preapproval_total_amount;			
				$donor_profile_link=site_url('member/'.$transd->user_id);				
							
				
				
				
				
				
					
					
				///////////==========affiliate earn=============
			
					$affiliate_setting=affiliate_setting();
				
					if($affiliate_setting->affiliate_enable==1) 
					{ 
					
					
					$pledge_commission=affiliate_commission_setting(2);
					
					
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
										'perk_id'=>$transd->perk_id,
										'transaction_id'=>$transd->transaction_id,
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
											'perk_id'=>$transd->perk_id,
											'transaction_id'=>$transd->transaction_id,
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
						
									
				///////////==========affiliate earn=============		
		
					
					
					
				
				
				
				
				
				
				
				
				
				
				
				
							
							
							
							
							///////////============admin alert==========
				
				
				
				$email_template=$this->db->query("select * from `email_template` where task='New Fund Admin Notification'");
				$email_temp=$email_template->row();				
								
				$email_message=$email_temp->message;
				$email_subject=$email_temp->subject;
				
				$email_address_from=$email_temp->from_address;
				$email_address_reply=$email_temp->reply_address;	$email_message=str_replace('{break}','<br/>',$email_message);
				$email_message=str_replace('{user_name}',$username,$email_message);			
				$email_message=str_replace('{project_name}',$project_name,$email_message);
				$email_message=str_replace('{donor_name}',$donor_name,$email_message);
				$email_message=str_replace('{donote_amount}',$donote_amount,$email_message);
				$email_message=str_replace('{donor_profile_link}',$donor_profile_link,$email_message);
				$email_message=str_replace('{project_page_link}',$project_page_link,$email_message);
				
				
				$str=$email_message;
				
					
					
					$this->email->from($email_address_from);
					$this->email->reply_to($email_address_reply);
					$this->email->to($email_address_from);
					$this->email->subject(PREAPPROVAL_PAYMENT_PROCESS_SUCCESS);
					$this->email->message($str);
					$this->email->send();
						
					
			
			///////=================owner alert===================
					
				
							
				$email_template=$this->db->query("select * from `email_template` where task='New Fund Owner Notification'");
				$email_temp=$email_template->row();				
								
				$email_message=$email_temp->message;
				$email_subject=$email_temp->subject;
				
				$email_address_from=$email_temp->from_address;
				$email_address_reply=$email_temp->reply_address;	$email_message=str_replace('{break}','<br/>',$email_message);
				$email_message=str_replace('{user_name}',$username,$email_message);			
				$email_message=str_replace('{project_name}',$project_name,$email_message);
				$email_message=str_replace('{donor_name}',$donor_name,$email_message);
				$email_message=str_replace('{donote_amount}',$donote_amount,$email_message);
				$email_message=str_replace('{donor_profile_link}',$donor_profile_link,$email_message);
				$email_message=str_replace('{project_page_link}',$project_page_link,$email_message);
				
				
				$str=$email_message;
				
					
					
					$this->email->from($email_address_from);
					$this->email->reply_to($email_address_reply);
					$this->email->to($project_owner_normal_email);
					$this->email->subject(PREAPPROVAL_PAYMENT_PROCESS_SUCCESS);
					$this->email->message($str);
					$this->email->send();
					
					
				/////////////////==============donor alert================================
				
					
					
							
				
				$email_template=$this->db->query("select * from `email_template` where task='New Fund Donor Notification'");
				$email_temp=$email_template->row();				
								
				$email_message=$email_temp->message;
				$email_subject=$email_temp->subject;
				
				$email_address_from=$email_temp->from_address;
				$email_address_reply=$email_temp->reply_address;	$email_message=str_replace('{break}','<br/>',$email_message);
				$email_message=str_replace('{user_name}',$username,$email_message);			
				$email_message=str_replace('{project_name}',$project_name,$email_message);
				$email_message=str_replace('{donor_name}',$donor_name,$email_message);
				$email_message=str_replace('{donote_amount}',$donote_amount,$email_message);
				$email_message=str_replace('{donor_profile_link}',$donor_profile_link,$email_message);
				$email_message=str_replace('{project_page_link}',$project_page_link,$email_message);
				
				
				$str=$email_message;
				
					
					
					$this->email->from($email_address_from);
					$this->email->reply_to($email_address_reply);
					$this->email->to($donar_email);
					$this->email->subject(PREAPPROVAL_PAYMENT_PROCESS_SUCCESS);
					$this->email->message($str);
					$this->email->send();
							
				
						
						
					}
					
					
					
					
					
				
				
			}
			
			else
			{
				
				
						$donar_proj=get_user_detail($transd->user_id);
						
						
						
						////==APIError(10)
						
						$str = sprintf(CRON_HELLO_PAYMENT_PROCESS_NOT_COMPLETED_CHECK_YOUR_SETTINGS_TRY_AGAIN_THANKYOU,$donar_proj['user_name']);
							
					
					$this->email->from($email_address_from);
					$this->email->reply_to($email_address_reply);
					$this->email->to($donar_email);
					$this->email->subject(PREAPPROVAL_PAYMENT_PROCESS_FAILED);
					$this->email->message($str);
					$this->email->send();
					
					
					
					$str = sprintf(CRON_HELLO_PAYMENT_PROCESS_NOT_COMPLETED_CHECK_YOUR_SETTINGS_TRY_AGAIN_THANKYOU,$donar_proj['user_name']);
					
					//"Hello ".$donar_proj['user_name'].",\n\nYour payment process is not completed.\n\n\nplease check your settings.Try again.\n\n\nThank You.";
				
							
				
					$this->email->from($email_address_from);
					$this->email->reply_to($email_address_reply);
					$this->email->to($donar_proj['email']);
					$this->email->subject(PREAPPROVAL_PAYMENT_PROCESS_FAILED);
					$this->email->message($str);
					$this->email->send();
					
					
					
					
					
				 	$str = sprintf(CRON_HELLO_ADMINISTRATOR_APIERROR10_PAYMENT_PROCESS_NOT_COMPLETED_DUE_TO_CASE_IS_NOT_MATCH_WITH_PAYMENTEXECSTATUS_CHECK_YOUR_SETTINGS_TRY_AGAIN_THANK_YOU,$donar_proj['user_name'],$donar_proj['email'],$donar_email);
					
					//"Hello Administrator,\n\n APIError(10). Payment process is not completed due to case is not match with paymentExecStatus. \n\nDonar Name : ".$donar_proj['user_name']."\n\nDonar Email : ".$donar_proj['email']."\n\nPayee Email : ".$donar_email." \n\nplease check your settings.Try again.\n\n\nThank You.";
				
							
					
					$this->email->from($email_address_from);
					$this->email->reply_to($email_address_reply);
					$this->email->to($email_address_from);
					$this->email->subject( CRON_PREAPPROVAL_PAYMENT_PROCESS_FAILED_ON_PROJECT .$project_title."(".$project_id.")");
					$this->email->message($str);
					$this->email->send();
						
						
					
				
			}
			
			
			
			
			///redirect($payPalURL);
			
			
	/////////===========for payment redirect user to this link============= 		
		
	
				}  ///=====foreach preapproval
	
		 
		 
			}   ////====if found any key
		
		
		
	
	
	} else{
			
	
		////////=======FLXIBLE PROJECT
	
		
		$id=$prjs->project_id;
		
		$prj = $this->project_model->get_project_user($id);
				
		$user_detail=get_user_detail($prj['user_id']);
			
		$project_title=$prj['project_title'];
		$project_id=$prjs->project_id;
						 
		$project_owner_email=$user_detail['paypal_email'];
		$project_create_name=$user_detail['user_name'].' '.$user_detail['last_name'];
		
		
		
			$get_preapproval=$this->db->query("select * from transaction where project_id='".$prjs->project_id."' and preapproval_key!='' and preapproval_status='FAIL'");

			if($get_preapproval->num_rows()>0)
			{
					
									
				$transaction_detail=$get_preapproval->result();
				
				
				foreach($transaction_detail as $transd)
				{
				
				
				
				
			try {


	$returnURL = site_url('cron/cron_preapprove/');     //////////=project detail page link will goes here
	$cancelURL = site_url('cron/cron_preapprove/');
	$ipnNotificationUrl=site_url('cron/cron_preapprove/');
	
	$preapprovalKey=$transd->preapproval_key;   /////////////////////===========get from the paypal database or take from user post=======
	
	
	
	$donar_email=$transd->email;
 	$donar_comment=$transd->comment;
	$donar_name=$transd->name;
	
	$donar_amount = $transd->preapproval_total_amount;  ////===user posted amount
	
	
				
				
		
	
	
	////////////////////////////////////////////
	
 	$transaction_fees=$paypal->transaction_fees;  ////= from the database

	
	
	if($prj->amount_get < $prj->amount){  $not_reach=1;   } else { $not_reach=0;  }
	
	
	if($not_reach==1){	
		$transaction_fees = $site_setting['flexible_fees'];
	} else{			
		$transaction_fees = $site_setting['suc_flexible_fees'];
	}	
		
			
	/*$paypal_fees='5.00';    ////= from the database
	
	$fee_paypal='0';       ////= add this amount to project owner amount if the fees payer is PRIMARYRECEIVER 
	
	if($paypal_fees!='' || $paypal_fees!='0.00')
	{
		$fee_paypal= (($donar_amount * $paypal_fees)/100);	
	}
	
	$donate_amount_total_after_paypal=$donar_amount + $fee_paypal;*/
	
	////////////////////////////////
	
	
	
	 	$admin_amount= (($donar_amount * $transaction_fees)/100);   
		
		
		 $project_owner_amount= $donar_amount;   						////=======assign full amount to the owner for fees payer						
	
	
		$admin_amount= number_format($admin_amount,2);
	$project_owner_amount=number_format($project_owner_amount,2);
	
	
	 $senderEmail  =$donar_email;				///////////========*******DONAR/SENDER Pay Email Address====*******
	
	
	
	$payer_name='Project Creator';
	
	
	
	$request_array= array(
	
	//Pay::$actionType => $_REQUEST['actionType'],   
	
	Pay::$actionType => $actionType, 
	
	
	Pay::$cancelUrl  => $cancelURL,
	Pay::$returnUrl=>   $returnURL,
	Pay::$ipnNotificationUrl=>   $ipnNotificationUrl,
	//Pay::$currencyCode  => $_REQUEST['currencyCode'], 
	
	Pay::$currencyCode  =>$currency_code,   

	Pay::$clientDetails_deviceId  => DEVICE_ID,
	Pay::$clientDetails_ipAddress  => $_SERVER['REMOTE_ADDR'],
	Pay::$clientDetails_applicationId =>APPLICATION_ID,
	RequestEnvelope::$requestEnvelopeErrorLanguage => 'en_US',

	Pay::$memo =>  "Project : ".$project_title."(".$project_id."), Amount : ".$donar_amount .",".$payer_name." Pay Fees(%) : ".$transaction_fees.", Create By : ".$project_create_name.", On Site : ".base_url() ,				/////////=============comment send to all payment receiver ====
		
	Pay::$feesPayer => $feesPayer              /////////////////set in the  pay from means our database adaptive setting  
	
	
	//////===================*************=====================
	

	);
	
	
	
	
	
	
	
	
	/////////================Set all receiver amount and email and  primary email
	
	
	
	
	////////=set primary receiver============
	
	$request_array[Pay::$receiverEmail[0]] = $project_owner_email;
	$request_array[Pay::$receiverAmount[0]] = $project_owner_amount;
	
	$request_array[Pay::$primaryReceiver[0]] = 'true';
	
	
	
	////////=set Admin  receiver============
		
	$admin_email=$paypal->paypal_email;
	
	
	$request_array[Pay::$receiverEmail[1]] = $admin_email;
	$request_array[Pay::$receiverAmount[1]] = $admin_amount;
	
	$request_array[Pay::$primaryReceiver[1]] = 'false';
	
	
	
		
	
	/////////=========ABOVE SET======Set preapprovalKey  from the database  or user post ==================
	
	

	if($preapprovalKey!= "")
	{
		$request_array[Pay::$preapprovalKey] = $preapprovalKey;
	}
	
	
	
	
	///////////=========ABOVE SET======*******DONAR/SENDER Pay Email Address====*******
	
	
	
	if($senderEmail!= "")
	{
		$request_array[Pay::$senderEmail]  = $senderEmail;
	}



	/////////////===========Make request URL=========
	

	/*echo "<pre>";
	
	print_r($request_array);*/
	
	
	

	$nvpStr=http_build_query($request_array, '', '&');	
	
	
	/////////////===========Make request URL=========
	
	
	
	

	/* Make the call to PayPal to get the Pay token
	 If the API call succeded, then redirect the buyer to PayPal
	 to begin to authorize payment.  If an error occured, show the
	 resulting errors
	 */
	 

	$resArray=$NVP_SampleConstants->hash_call('AdaptivePayments/Pay',$nvpStr);


	/*echo "<pre>";
	
	print_r($resArray);*/
	
	
	
					/* Display the API response back to the browser.
				 If the response from PayPal was a success, display the response parameters'
				 If the response was an error, display the errors received using APIError.php.
				 */
				$ack = strtoupper($resArray['responseEnvelope.ack']);
				
				$strtemp='';
				foreach ($resArray as $key => $value) {
						//$value = urlencode(stripslashes($value));
						//echo "$key=$value"."<br>";
						
							$strtemp.= $key."=".$value.",";
					}
					log_message('error',"CRON DATA:".$strtemp);
			
			
				if($ack!="SUCCESS"){
					
					//$_SESSION['reshash']=$resArray;
					
					$data= array(
						'reshash' => 	$resArray,	 
						);
					$this->session->set_userdata($data);
					
					//$location = "APIError.php";
					//header("Location: $location");
					
					//echo "APIError(7) ";
									
					
					
					$case ="";
					
					
					////////==fail mail to donar email=====
					
					
			$donar_proj=get_user_detail($transd->user_id);
			
			
			
			
			
					
					$str = sprintf(CRON_YOUR_PAYMENT_PROCESS_VIOLATED_PLEASE_CHECK_YOUR_SETTINGS_TRY_AGAIN_THANKYOU,$donar_proj['user_name'],$resArray['error(0).message']);
					
					//"Hello ".$donar_proj['user_name'].",\n\nYour payment process is violated ".$resArray['error(0).message']."\n\n\nplease check your settings.Try again.\n\n\nThank You.";
				
							
					
					$this->email->from($email_address_from);
					$this->email->reply_to($email_address_reply);
					$this->email->to($donar_email);
					$this->email->subject(PREAPPROVAL_PAYMENT_PROCESS_FAILED);
					$this->email->message($str);
					$this->email->send();
					
					
					
					
					
					
				  $str = sprintf(CRON_YOUR_PAYMENT_PROCESS_VIOLATED_PLEASE_CHECK_YOUR_SETTINGS_TRY_AGAIN_THANKYOU,$donar_proj['user_name'],$resArray['error(0).message']);
				
							
					
					$this->email->from($email_address_from);
					$this->email->reply_to($email_address_reply);
					$this->email->to($donar_proj['email']);
					$this->email->subject(PREAPPROVAL_PAYMENT_PROCESS_FAILED);
					$this->email->message($str);
					$this->email->send();
					
					
					
					
					
				  	$str = sprintf(CRON_HELLO_ADMINISTRATOR_APIERROR7_PAYMENT_PROCESS_VIOLATED_DUE_TO_ERRORMESSAGE_PLEASE_CHECK_YOUR_SETTINGS_TRY_AGAIN_THANKYOU,$resArray['error(0).message'],$donar_proj['user_name'],$donar_proj['email'],$donar_email);
					
					//"Hello Administrator,\n\n APIError(7). Payment process is violated due to ".$resArray['error(0).message']." \n\nDonar Name : ".$donar_proj['user_name']."\n\nDonar Email : ".$donar_proj['email']."\n\nPayee Email : ".$donar_email." \n\nplease check your settings.Try again.\n\n\nThank You.";
				
							
					
					$this->email->from($email_address_from);
					$this->email->reply_to($email_address_reply);
					$this->email->to($email_address_from);
					$this->email->subject("Cron ".PREAPPROVAL_PAYMENT_PROCESS_FAILED." on Project".$project_title."(".$project_id.")");
					$this->email->message($str);
					$this->email->send();
					
					
					
						
					
					
				}
				else
				{
					///$_SESSION['payKey'] = $resArray['payKey'];
					
					$data2= array(
						'payKey' =>	$resArray['payKey'],	 
						);
					$this->session->set_userdata($data2);
					
					
					
					$payKey=$resArray['payKey'];
					
					
				
					
					
					////////==first step will completed mail to donar email=====
					
					
					
					$case ="";
					
					if(($resArray['paymentExecStatus'] == "COMPLETED" ))
					{
						$case ="1";
					}
					else if(($actionType== "PAY") && ($resArray['paymentExecStatus'] == "CREATED" ))
					{
						$case ="2";
							
					}
					else if(($preapprovalKey!=null ) && ($actionType== "CREATE") && ($resArray['paymentExecStatus'] == "CREATED" ))
					{
						$case ="3";
					}
					else if(($actionType== "PAY_PRIMARY"))
					{
						$case ="4";
							
					}
					else if(($actionType== "CREATE") && ($resArray['paymentExecStatus'] == "CREATED" ))
					{
						
						$temp1=API_USERNAME;
						$temp2=str_replace('_api1.','@',$temp1);
						
						if($temp2==$donar_email)
						{
							$case ="3";
						}
						else{
							$case ="2";
						}
						
					}
					
					else
					{
						
						
						$donar_proj=get_user_detail($transd->user_id);
						
						
						////==APIError(8)
						
						$str = sprintf(CRON_YOUR_PAYMENT_PROCESS_VIOLATED_PLEASE_CHECK_YOUR_SETTINGS_TRY_AGAIN_THANKYOU,$donar_proj['user_name']);
						
						//"Hello ".$donar_proj['user_name'].",\n\nYour payment process is violated ".$resArray['error(0).message']."\n\n\nplease check your settings.Try again.\n\n\nThank You.";
				
							
					
					$this->email->from($email_address_from);
					$this->email->reply_to($email_address_reply);
					$this->email->to($donar_email);
					$this->email->subject(PREAPPROVAL_PAYMENT_PROCESS_FAILED);
					$this->email->message($str);
					$this->email->send();
					
					
					
					
					$str = sprintf(CRON_YOUR_PAYMENT_PROCESS_VIOLATED_PLEASE_CHECK_YOUR_SETTINGS_TRY_AGAIN_THANKYOU,$donar_proj['user_name']);
				
							
					
					$this->email->from($email_address_from);
					$this->email->reply_to($email_address_reply);
					$this->email->to($donar_proj['email']);
					$this->email->subject(PREAPPROVAL_PAYMENT_PROCESS_FAILED);
					$this->email->message($str);
					$this->email->send();
					
					
					
					
					
				  	$str = sprintf(CRON_HELLO_ADMINISTRATOR_APIERROR8_PAYMENT_PROCESS_VIOLATED_DUE_TO_ERROR_MESSAGE_PLEASE_CHECK_YOUR_SETTINGS_TRY_AGAIN_THANKYOU,$resArray['error(0).message'],$donar_proj['user_name'],$donar_proj['email'],$donar_email);
					
					//"Hello Administrator,\n\n APIError(8). Payment process is violated due to ".$resArray['error(0).message']." \n\nDonar Name : ".$donar_proj['user_name']."\n\nDonar Email : ".$donar_proj['email']."\n\nPayee Email : ".$donar_email." \n\nplease check your settings.Try again.\n\n\nThank You.";
				
							
					
					$this->email->from($email_address_from);
					$this->email->reply_to($email_address_reply);
					$this->email->to($email_address_from);
					$this->email->subject("Cron ".PREAPPROVAL_PAYMENT_PROCESS_FAILED." on Project".$project_title."(".$project_id.")");
					$this->email->message($str);
					$this->email->send();
						
						
					}
				}
	
	
		}
		
		
		catch(Exception $ex) {
			
		
	
			throw new Exception('Error occurred in PayReceipt method');
			
			////==catchException(8)
			
			////////==fail mail to donar email=====
			
			
				
				$donar_proj=get_user_detail($transd->user_id);
				
				
					
					$str = sprintf(CRON_HELLO_YOUR_PAYMENT_PROCESS_VIOLATED_PLEASE_CHECK_YOUR_SETTINGS_TRY_AGAIN_THANKYOU,$donar_proj['user_name']);
					
					//"Hello ".$donar_proj['user_name'].",\n\nYour payment process is violated. \n\n\nplease check your settings.Try again.\n\n\nThank You.";
				
							
					
					$this->email->from($email_address_from);
					$this->email->reply_to($email_address_reply);
					$this->email->to($donar_email);
					$this->email->subject(PREAPPROVAL_PAYMENT_PROCESS_FAILED);
					$this->email->message($str);
					$this->email->send();
					
					
						$str = sprintf(CRON_HELLO_YOUR_PAYMENT_PROCESS_VIOLATED_PLEASE_CHECK_YOUR_SETTINGS_TRY_AGAIN_THANKYOU,$donar_proj['user_name']);
					
					
							
					
					$this->email->from($email_address_from);
					$this->email->reply_to($email_address_reply);
					$this->email->to($donar_proj['email']);
					$this->email->subject(PREAPPROVAL_PAYMENT_PROCESS_FAILED);
					$this->email->message($str);
					$this->email->send();
					
					
					
					
				 	$str = sprintf(CRON_HELLO_ADMINISTRATOR_CATCHEXCEPTION8_PAYMENT_PROCESS_VIOLATED_CHECK_YOUR_SETTINGS_TRY_AGAIN_THANKYOU,$donar_proj['user_name'],$donar_proj['email'],$donar_email);
					
					// "Hello Administrator,\n\n catchException(8). Payment process is violated.\n\nDonar Name : ".$donar_proj['user_name']."\n\nDonar Email : ".$donar_proj['email']."\n\nPayee Email : ".$donar_email." \n\nplease check your settings.Try again.\n\n\nThank You.";
				
							
					
					$this->email->from($email_address_from);
					$this->email->reply_to($email_address_reply);
					$this->email->to($email_address_from);
					$this->email->subject(PREAPPROVAL_PAYMENT_PROCESS_FAILED." on Project".$project_title."(".$project_id.")");
					$this->email->message($str);
					$this->email->send();
					
										
					
		}
		
		
		
		
		
		
		///////////==========Show payment create detail ===========
		
		
		
		
	        	
    	/*	foreach($resArray as $key => $value) {
    			
    			
					echo "$key   ::  $value </br>";
				
    		}	*/
			
		
	///////////==========Show payment create detail ===========
			
			
			///=====$token = $resArray['payKey'];              Add  this token to database for check the transaction success or fail
		
		
	
	/////////===========for payment redirect user to this link============= 
			
			
			
			
			if($case=='1')
			{
					
					if(strtoupper($resArray['paymentExecStatus']) == "COMPLETED")
					{
						
						$update_status=$this->db->query("update transaction set `preapproval_status`='SUCCESS' , `preapproval_pay_key`='".$resArray['payKey']."' where `preapproval_key`='".$transd->preapproval_key."'");
						
						
						
						$update_project_inactive=$this->db->query("update project set active=0 where project_id='".$transd->project_id."'");
						
						
						
						
							$donar_proj=get_user_detail($transd->user_id);
						
						/////////============SUCCESS Email ==============
						
						
							
							
							
							
							
							
			 $prj = $this->project_model->get_project_user($transd->project_id);				
			 $login_user=get_user_detail($transd->user_id);				
							
							
							
							
			$payee_email=$transd->email;			
			$donar_email=$login_user['email'];	
			$donar_id=$transd->user_id;			
			$project_id=$prj['project_id'];			
			$project_owner_normal_email=$prj['email'];		
							
							
							
				
				$username =$prj['user_name'];
				$project_name=$prj['project_title'];
				$project_page_link=site_url('projects/'.$prj['url_project_title'].'/'.$prj['project_id']);
				
				$donor_name=$login_user['user_name'];
				$donote_amount=$transd->preapproval_total_amount;			
				$donor_profile_link=site_url('member/'.$transd->user_id);				
							
							
							
						
						
						
						
						
						
						
						
						///////////==========affiliate earn=============
			
					$affiliate_setting=affiliate_setting();
				
					if($affiliate_setting->affiliate_enable==1) 
					{ 
					
					
					$pledge_commission=affiliate_commission_setting(2);
					
					
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
										'perk_id'=>$transd->perk_id,
										'transaction_id'=>$transd->transaction_id,
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
											'perk_id'=>$transd->perk_id,
											'transaction_id'=>$transd->transaction_id,
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
						
									
					///////////==========affiliate earn=============		
		
					
						
						
							
							
							///////////============admin alert==========
				
				
				
								$email_template=$this->db->query("select * from `email_template` where task='New Fund Admin Notification'");
				$email_temp=$email_template->row();				
								
				$email_message=$email_temp->message;
				$email_subject=$email_temp->subject;
				
				$email_address_from=$email_temp->from_address;
				$email_address_reply=$email_temp->reply_address;	$email_message=str_replace('{break}','<br/>',$email_message);
				$email_message=str_replace('{user_name}',$username,$email_message);			
				$email_message=str_replace('{project_name}',$project_name,$email_message);
				$email_message=str_replace('{donor_name}',$donor_name,$email_message);
				$email_message=str_replace('{donote_amount}',$donote_amount,$email_message);
				$email_message=str_replace('{donor_profile_link}',$donor_profile_link,$email_message);
				$email_message=str_replace('{project_page_link}',$project_page_link,$email_message);
				
				
				$str=$email_message;
				
					
					
					$this->email->from($email_address_from);
					$this->email->reply_to($email_address_reply);
					$this->email->to($email_address_from);
					$this->email->subject(PREAPPROVAL_PAYMENT_PROCESS_SUCCESS);
					$this->email->message($str);
					$this->email->send();
						
					
			
			///////=================owner alert===================
					
				
							
				$email_template=$this->db->query("select * from `email_template` where task='New Fund Owner Notification'");
				$email_temp=$email_template->row();				
								
				$email_message=$email_temp->message;
				$email_subject=$email_temp->subject;
				
				$email_address_from=$email_temp->from_address;
				$email_address_reply=$email_temp->reply_address;	$email_message=str_replace('{break}','<br/>',$email_message);
				$email_message=str_replace('{user_name}',$username,$email_message);			
				$email_message=str_replace('{project_name}',$project_name,$email_message);
				$email_message=str_replace('{donor_name}',$donor_name,$email_message);
				$email_message=str_replace('{donote_amount}',$donote_amount,$email_message);
				$email_message=str_replace('{donor_profile_link}',$donor_profile_link,$email_message);
				$email_message=str_replace('{project_page_link}',$project_page_link,$email_message);
				
				
				$str=$email_message;
				
					
					
					$this->email->from($email_address_from);
					$this->email->reply_to($email_address_reply);
					$this->email->to($project_owner_normal_email);
					$this->email->subject(PREAPPROVAL_PAYMENT_PROCESS_SUCCESS);
					$this->email->message($str);
					$this->email->send();
					
					
				/////////////////==============donor alert================================
				
					
					
							
				
				$email_template=$this->db->query("select * from `email_template` where task='New Fund Donor Notification'");
				$email_temp=$email_template->row();				
								
				$email_message=$email_temp->message;
				$email_subject=$email_temp->subject;
				
				$email_address_from=$email_temp->from_address;
				$email_address_reply=$email_temp->reply_address;	$email_message=str_replace('{break}','<br/>',$email_message);
				$email_message=str_replace('{user_name}',$username,$email_message);			
				$email_message=str_replace('{project_name}',$project_name,$email_message);
				$email_message=str_replace('{donor_name}',$donor_name,$email_message);
				$email_message=str_replace('{donote_amount}',$donote_amount,$email_message);
				$email_message=str_replace('{donor_profile_link}',$donor_profile_link,$email_message);
				$email_message=str_replace('{project_page_link}',$project_page_link,$email_message);
				
				
				$str=$email_message;
				
					
					
					$this->email->from($email_address_from);
					$this->email->reply_to($email_address_reply);
					$this->email->to($donar_email);
					$this->email->subject(PREAPPROVAL_PAYMENT_PROCESS_SUCCESS);
					$this->email->message($str);
					$this->email->send();
							
				
						
						
					}
					
					
					
					
					
				
				
			}
			
			else
			{
				
				
						$donar_proj=get_user_detail($transd->user_id);
						
						
						
						////==APIError(10)
						
						$str = sprintf(CRON_HELLO_PAYMENT_PROCESS_NOT_COMPLETED_CHECK_YOUR_SETTINGS_TRY_AGAIN_THANKYOU,$donar_proj['user_name']);
							
					
					$this->email->from($email_address_from);

					$this->email->reply_to($email_address_reply);
					$this->email->to($donar_email);
					$this->email->subject(PREAPPROVAL_PAYMENT_PROCESS_FAILED);
					$this->email->message($str);
					$this->email->send();
					
					
					
					$str = sprintf(CRON_HELLO_PAYMENT_PROCESS_NOT_COMPLETED_CHECK_YOUR_SETTINGS_TRY_AGAIN_THANKYOU,$donar_proj['user_name']);
					
					//"Hello ".$donar_proj['user_name'].",\n\nYour payment process is not completed.\n\n\nplease check your settings.Try again.\n\n\nThank You.";
				
							
				
					$this->email->from($email_address_from);
					$this->email->reply_to($email_address_reply);
					$this->email->to($donar_proj['email']);
					$this->email->subject(PREAPPROVAL_PAYMENT_PROCESS_FAILED);
					$this->email->message($str);
					$this->email->send();
					
					
					
					
					
				 	$str = sprintf(CRON_HELLO_ADMINISTRATOR_APIERROR10_PAYMENT_PROCESS_NOT_COMPLETED_DUE_TO_CASE_IS_NOT_MATCH_WITH_PAYMENTEXECSTATUS_CHECK_YOUR_SETTINGS_TRY_AGAIN_THANK_YOU,$donar_proj['user_name'],$donar_proj['email'],$donar_email);
					
					//"Hello Administrator,\n\n APIError(10). Payment process is not completed due to case is not match with paymentExecStatus. \n\nDonar Name : ".$donar_proj['user_name']."\n\nDonar Email : ".$donar_proj['email']."\n\nPayee Email : ".$donar_email." \n\nplease check your settings.Try again.\n\n\nThank You.";
				
							
					
					$this->email->from($email_address_from);
					$this->email->reply_to($email_address_reply);
					$this->email->to($email_address_from);
					$this->email->subject("Cron Preapproval Payment Process Failed on Project".$project_title."(".$project_id.")");
					$this->email->message($str);
					$this->email->send();
						
						
					
				
			}
			
			
			
			
			///redirect($payPalURL);
			
			
	/////////===========for payment redirect user to this link============= 		
		
	
				}  ///=====foreach preapproval
	
		 
		 
			}   ////====if found any key
		
		
		
	
	
		
		
		
		}
		
		
		
		$this->db->query("update project set `active`='0' , `status`='5' where project_id='".$prjs->project_id."'");
	
			}    /////===foreach project
		
		
		}   ////=====get project
		

	}   //////===check if active


			$data = array(
						'user_id' => '0',
						'cronjob' => '',
						'date_run' =>date('Y-m-d H:i:s'),
						'status' => '1',
					);
			$this->db->insert('cronjob', $data);
			
			die;	
		
}
	
	
function cron_forgot_password(){
	$site_setting = site_setting();
		$query = $this->db->get_where('user',array('forgot_unique_code !='=>''));
		
		if($query->num_rows()>0)
		{
			
			$result = $query->result();
			
			foreach($result as $row){
				if(strtotime(date("Y-m-d H:i:s")) > strtotime(date("Y-m-d H:i:s",strtotime($row->request_date . ' + '.$site_setting['forget_time_limit'].' hours'))))
				{
				
					$this->db->query("update user set forgot_unique_code='' where forgot_unique_code='".$row->forgot_unique_code."'");
				}
			}	
			
		}
		
}
	


}
?>