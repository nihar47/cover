<?php error_reporting(0);
class Automation extends CI_Controller {
	function Automation()
	{
		parent::__construct();
		$this->load->model('project_category_model');
		$this->load->model('user_model');
		$this->load->model('home_model');
		$this->load->model('automation_model');		
	}
	
	function index($msg='')
	{
		
			$this->form_validation->set_rules('site_status', 'Site Status', 'required');
			
			$this->form_validation->set_rules('application_id', 'Paypal Application Id', 'required');		
			$this->form_validation->set_rules('paypal_username', 'Username', 'required');
			$this->form_validation->set_rules('paypal_password', 'Password', 'required');
			$this->form_validation->set_rules('paypal_signature', 'Signature', 'required');
			
			$this->form_validation->set_rules('paypal_email', 'Email', 'required');
			$this->form_validation->set_rules('paypal_first_name', 'User Paypal First Name', 'required');
			$this->form_validation->set_rules('paypal_last_name', 'User Paypal Last Name', 'required');
			
			
			if($this->form_validation->run() == FALSE){			
				if(validation_errors())
				{
					$data["error"] = validation_errors();
				}else{
					$data["error"] = "";
				}
				
				
				if($_POST)
				{			
					$data["id"] = $this->input->post('id');
					$data["site_status"] = $this->input->post('site_status');
					$data["application_id"] = $this->input->post('application_id');
					
					$data["paypal_username"] = $this->input->post('paypal_username');
					$data["paypal_password"] = $this->input->post('paypal_password');
					$data["paypal_signature"] = $this->input->post('paypal_signature');
					$data["preapproval"] = $this->input->post('preapproval');
					$data["fees_taken_from"] = $this->input->post('fees_taken_from');
					
					$data["paypal_email"] = $this->input->post('paypal_email');
					$data["paypal_first_name"] = $this->input->post('paypal_first_name');
					$data["paypal_last_name"] = $this->input->post('paypal_last_name');
				}
				
				else
				{
					$paypal_detail=$this->automation_model->get_paypal_detail();
					
					if($paypal_detail)
					{
						$data["error"] = "";
						$data["site_status"] = $paypal_detail->site_status;
						$data["application_id"] = $paypal_detail->application_id;
						$data["paypal_email"] = $paypal_detail->paypal_email;
						$data["paypal_username"] = $paypal_detail->paypal_username;
						$data["paypal_password"] = $paypal_detail->paypal_password;
						$data["paypal_signature"] = $paypal_detail->paypal_signature;
						$data["preapproval"] = $paypal_detail->preapproval;
						$data["fees_taken_from"] = $paypal_detail->fees_taken_from;
						$data["paypal_first_name"] ='';
						$data["paypal_last_name"] = '';
					}
					
					else
					{
						$data["error"] = "";
						$data["site_status"] = '';
						$data["application_id"] = '';
						$data["paypal_email"] = '';
						$data["paypal_username"] = '';
						$data["paypal_password"] = '';
						$data["paypal_signature"] = '';
						$data["preapproval"] = '';
						$data["fees_taken_from"] = '';
						$data["paypal_first_name"] ='';
						$data["paypal_last_name"] = '';
					}
					
				}
				
				$automation_paypal=$this->automation_model->get_automation_paypal();
				
				$automation_paypal_id='';
				
				if($automation_paypal)
				{
					$automation_paypal_id=$automation_paypal->automation_paypal_id;
				}
								
				$data["id"] = $automation_paypal_id;
			
			}else{
								
				
				if($this->input->post('id')>0)
				{
					$this->automation_model->paypal_update();
					$msg = "update";
				}else{
					$this->automation_model->paypal_insert();
					$msg = "insert";
				}
				
				$verify = $this->verify_paypal();
				
				
					if($verify=='done'){							
						$data["error"] = $verify;
						
										
						$data["id"] = $this->input->post('id');
						$data["site_status"] = $this->input->post('site_status');
						$data["application_id"] = $this->input->post('application_id');
						
						$data["paypal_username"] = $this->input->post('paypal_username');
						$data["paypal_password"] = $this->input->post('paypal_password');
						$data["paypal_signature"] = $this->input->post('paypal_signature');
						$data["preapproval"] = $this->input->post('preapproval');
						$data["fees_taken_from"] = $this->input->post('fees_taken_from');
						
						$data["paypal_email"] = $this->input->post('paypal_email');
						$data["paypal_first_name"] = $this->input->post('paypal_first_name');
						$data["paypal_last_name"] = $this->input->post('paypal_last_name');
						
						
							echo "<script>window.location.href='".site_url('automation/step2/'.$msg)."'</script>";
					}
					else
					{
						$data["error"] = $verify;
						
										
						$data["id"] = $this->input->post('id');
						$data["site_status"] = $this->input->post('site_status');
						$data["application_id"] = $this->input->post('application_id');
						
						$data["paypal_username"] = $this->input->post('paypal_username');
						$data["paypal_password"] = $this->input->post('paypal_password');
						$data["paypal_signature"] = $this->input->post('paypal_signature');
						$data["preapproval"] = $this->input->post('preapproval');
						$data["fees_taken_from"] = $this->input->post('fees_taken_from');
						
						$data["paypal_email"] = $this->input->post('paypal_email');
						$data["paypal_first_name"] = $this->input->post('paypal_first_name');
						$data["paypal_last_name"] = $this->input->post('paypal_last_name');
					}
			}				
		
		
		$data['msg']=$msg;
		$data['site_setting'] = $this->home_model->select_site_setting();
		
		
		$this->load->view('automation/step1', $data);		
		
	}
	
	
	function step2($msg='')
	{
		
		$this->form_validation->set_rules('project_id', 'Select Project', 'required');
		
		
		if($this->input->post('donate_amount')=='' && $this->input->post('donate_amount')==0 || $this->input->post('donate_amount')<0)
		{
			$this->form_validation->set_rules('perk_id', 'Perk', 'required');
		}
		else
		{
			$this->form_validation->set_rules('donate_amount', 'Donate Amount', 'required');
		}
		
		
		if($this->input->post('paypal_verified')!=1 && $this->input->post('project_id')>0)
		{
			$this->form_validation->set_rules('paypal_first_name', 'User Paypal First Name', 'required');
			$this->form_validation->set_rules('paypal_last_name', 'User Paypal Last Name', 'required');
			$this->form_validation->set_rules('paypal_email', 'User Paypal A/C Email', 'required|valid_email');
		}	
			
			
			if($this->form_validation->run() == FALSE){			
				if(validation_errors())
				{
					$data["error"] = validation_errors();
				}else{
					$data["error"] = "";
				}
				
				
				
				$data["project_id"] = $this->input->post('project_id');
				$data["perk_id"] = $this->input->post('perk_id');
				$data["donate_amount"] = $this->input->post('donate_amount');
				
				$data["user_id"] = $this->input->post('user_id');
				$data["paypal_first_name"] = $this->input->post('paypal_first_name');
				$data["paypal_last_name"] = $this->input->post('paypal_last_name');
				$data["paypal_email"] = $this->input->post('paypal_email');
				$data["paypal_verified"] = $this->input->post('paypal_verified');
				
				
			}else{
				
				
				$verify ='done';
				if($this->input->post('paypal_verified')!=1){
					$verify = $this->verify_paypal();
				}
				
				if($verify=='done'){
					$this->automation_model->update_step2();
					$msg = "insert";
					$data["error"] = $verify;
					$data["project_id"] = $this->input->post('project_id');
					$data["perk_id"] = $this->input->post('perk_id');
					$data["donate_amount"] = $this->input->post('donate_amount');
					
					$data["user_id"] = $this->input->post('user_id');
					$data["paypal_first_name"] = $this->input->post('paypal_first_name');
					$data["paypal_last_name"] = $this->input->post('paypal_last_name');
					$data["paypal_email"] = $this->input->post('paypal_email');
					$data["paypal_verified"] = $this->input->post('paypal_verified');
				
									
					echo "<script>window.location.href='".site_url('automation/step3/'.$msg)."'</script>";
				}
				else
				{
					$data["error"] = $verify;
					
									
					$data["project_id"] = $this->input->post('project_id');
					$data["perk_id"] = $this->input->post('perk_id');
					$data["donate_amount"] = $this->input->post('donate_amount');
					
					$data["user_id"] = $this->input->post('user_id');
					$data["paypal_first_name"] = $this->input->post('paypal_first_name');
					$data["paypal_last_name"] = $this->input->post('paypal_last_name');
					$data["paypal_email"] = $this->input->post('paypal_email');
					$data["paypal_verified"] = $this->input->post('paypal_verified');
				}
				
			}
		
		
		
		$projects=$this->automation_model->get_all_active_projects();
		
		$data['projects']=$projects;
		
		$data['msg']=$msg;
		$data['site_setting'] = $this->home_model->select_site_setting();
		
		
		$this->load->view('automation/step2', $data);		
	}
	
	function ajaxperks($project_id)
	{
		$site_setting = $this->home_model->select_site_setting();
		
		$perks=$this->project_category_model->get_all_perks($project_id);
		
		?>
        <select name="perk_id" id="perk_id" >
         <option value="">----Perks----</option>
         <?php  if($perks) {  
         		 foreach($perks as $prk) { ?>
            <option value="<?php echo $prk['perk_id']; ?>"><?php echo ucwords($prk['perk_title']).' [ '.$site_setting['currency_symbol'].$prk['perk_amount'].']'; ?></option>
             <?php }  }  ?>
              </select>
              <?php 
			 
			 die;
		
	}
	
	function verify_paypal()
	{
		
		$data['msg']='';
		$verify='no';
		
			
			
			 $automation_paypal=$this->automation_model->get_automation_paypal();
			 
				//////////=================Get PAYPAL SETTING  FROM DATABASE 	================
				$application_id = $automation_paypal->application_id;
				$api_username = $automation_paypal->paypal_username;
				$api_password = $automation_paypal->paypal_password;	
				$api_key =  $automation_paypal->paypal_signature;
				
				
				if($automation_paypal->site_status=='sandbox')
				{
				
					$dbend_point='https://svcs.sandbox.paypal.com/';	
					$db_paypalurl='https://www.sandbox.paypal.com/webscr&cmd=';
				
				}
				
				elseif($automation_paypal->site_status=='live')
				{
				
					$dbend_point='https://svcs.paypal.com/';	
					$db_paypalurl='https://www.paypal.com/webscr&cmd=';
				
				}
				else
				{	
					$dbend_point='https://svcs.sandbox.paypal.com/';	
					$db_paypalurl='https://www.sandbox.paypal.com/webscr&cmd=';		
				}
				
				
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
					
					
					$this->load->library('NVP_SampleConstants');
					
					$NVP_SampleConstants = new NVP_SampleConstants();
					
					
					/////=================par receipt file header part================ 
					
					try {
			
							$request_array= array
							(
								RequestEnvelope::$requestEnvelopeErrorLanguage=> 'en_US',
								GetVerifiedStatus::$emailAddress=>$this->input->post('paypal_email'),
								GetVerifiedStatus::$firstName=> $this->input->post('paypal_first_name'),
								GetVerifiedStatus::$lastName=> $this->input->post('paypal_last_name'),
								GetVerifiedStatus::$matchCriteria=> 'NAME',
							);
			
				
							 $nvpStr=http_build_query($request_array, '', '&');
							/* Make the call to PayPal to get the Status of the account. If an error occured, show the
							 resulting errors
							 Note: if the confirmation type is none then no need of redirecting
							 */
			
							$resArray=$NVP_SampleConstants->hash_call('AdaptiveAccounts/GetVerifiedStatus',$nvpStr);
							
							$strtemp='';
							
							foreach($resArray as $key => $value) {    			
    			
								$strtemp.=$key ."  ::  ".$value."  ==  ";				
							}
					
					
							log_message('error',"VERIFY PAYPAL DATA:".$strtemp);
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
			
				$verify_error='done';
				if($this->input->post('user_id')>0)
				{
					$this->db->query("update user set paypal_verified='1' ,paypal_email='".$this->input->post('paypal_email')."' where user_id='".$this->input->post('user_id')."'");
				}
				
			}
			else
			{
				$verify_error='<p>PayPal Varification process failed. See the below PayPal response :<br><br>PayPal Response : '.$resArray['error(0).errorId'].'-'.$resArray['error(0).message'].'</p>'; 
			}
			
			
		return $verify_error;
	
	}
	
	
	function step3($msg='')
	{
		
		$this->form_validation->set_rules('user_id', 'Select User', 'required');
		
		
		
		
			if($this->form_validation->run() == FALSE){			
				if(validation_errors())
				{
					$data["error"] = validation_errors();
				}else{
					$data["error"] = "";
				}
								
				$data["user_id"] = $this->input->post('user_id');
				
			
				
			}else{
								
					$this->automation_model->update_step3();
					$msg = "insert";
					$data["error"] = "";
					$data["user_id"] = $this->input->post('user_id');		
					echo "<script>window.location.href='".site_url('automation/step4/'.$msg)."'</script>";
				
			}
		
		
		$automation_paypal=$this->automation_model->get_automation_paypal();
		
		$prj=$this->project_category_model->get_one_project($automation_paypal->project_id);
		
		$data['project_owner_id']=$prj['user_id'];
		
		$users=$this->project_category_model->active_user_list();
		
		$data['users']=$users;
		
		$data['msg']=$msg;
		$data['site_setting'] = $this->home_model->select_site_setting();
		
		
		$this->load->view('automation/step3', $data);
				
	}

	
	
	
	
	
	function step4($msg='')
	{
		$data['msg']=$msg;
		$site_setting = $this->home_model->select_site_setting();
		
		if($site_setting['currency_code']!='') {		
			$currency_code=$site_setting['currency_code'];
		} else {
			$currency_code='USD';
		}
			
			
			$automation_paypal=$this->automation_model->get_automation_paypal();
		
			
			$post_id = $automation_paypal->project_id;
			$post_amount = $automation_paypal->donate_amount;
		 	$post_perk_id =  $automation_paypal->perk_id;
			$post_gateway = 'paypal';
			$post_anonymous = 0;
			$post_docomment='';
			
			$perk_id = $post_perk_id;
			
			$login_user = $this->user_model->get_one_user($automation_paypal->user_id);			
			
			
			$donar_name=$login_user['user_name'];
			$donar_email=$login_user['email'];
			$donar_id=$automation_paypal->user_id;
			
			$post_email = $login_user['paypal_email'];
			$payee_email=$post_email;		
			
			$donar_amount=str_replace(',','',number_format($post_amount,2));   
			
			$donar_comment=nl2br(strip_tags($post_docomment));
			
			
					
			
			$prj = $this->project_category_model->get_one_project($post_id);
			$project_id=$prj['project_id'];		
			$project_title=$prj['project_title'];
			$url_project_title=$prj['url_project_title'];
			
			
			$user_detail =  $this->user_model->get_one_user($prj['user_id']);
			$project_owner_email=$user_detail['paypal_email'];			
			$project_create_name=$user_detail['user_name'].' '.$user_detail['last_name'];
			
			
			
			if($donar_amount >= $site_setting['maximum_donation_amount']){	
	
			$data['error']='<p>You cannot donate amount greater than '.set_currency($site_setting['maximum_donation_amount']).'</p>';
				$this->load->view('automation/step4', $data);
					
			}else{
			
			
				//////////=================Get PAYPAL SETTING  FROM DATABASE 	================
				
				$application_id = $automation_paypal->application_id;
				$api_username = $automation_paypal->paypal_username;
				$api_password = $automation_paypal->paypal_password;	
				$api_key =  $automation_paypal->paypal_signature;
				
				
				if($automation_paypal->site_status=='sandbox')
				{
				
					$dbend_point='https://svcs.sandbox.paypal.com/';	
					$db_paypalurl='https://www.sandbox.paypal.com/webscr&cmd=';
				
				}
				
				elseif($automation_paypal->site_status=='live')
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
				$this->load->library('NVP_SampleConstants');
				
				$NVP_SampleConstants = new NVP_SampleConstants();
				
				/////=================par receipt file header part================
			
			
			
				/////=========if Adaptive paypal Preapproval is active then
				
				if($automation_paypal->preapproval=='1')
				{
					
			
			
					/*==get project owner detail from the project id ====*/
					 $start_date=date('Y-m-d');
					 $end_date=date('Y-m-d',strtotime($prj['end_date']));   ////////get this date from the project database
					
					 $noofpayments= '1';   ///////=====this can be variable posted by user if client want
				
				
				
					//$transaction_fees=$paypal->transaction_fees; 
					
					if($prj['payment_type'] == '0'){
						$transaction_fees = $site_setting['fixed_fees'];
					}else{
						$transaction_fees = $site_setting['flexible_fees'];
					}
				
					$payer_name='Project Creator';
				
					try {			
							
						   $returnURL = site_url("automation/preapprovereceipt");
						   $cancelURL = site_url("automation");
						  
						   $request_array = array (
						   Preapproval::$cancelUrl => $cancelURL,
						   Preapproval::$returnUrl => $returnURL,
						   Preapproval::$currencyCode => $currency_code,
						   Preapproval::$startingDate => $start_date,
						   Preapproval::$endingDate =>  $end_date,
						   Preapproval::$maxNumberOfPayments => $noofpayments,
						   Preapproval::$maxTotalAmountOfAllPayments => $donar_amount,
						   //Preapproval::$requestEnvelope_senderEmail => $donar_email ,
						   RequestEnvelope::$requestEnvelopeErrorLanguage => 'en_US',
						   Preapproval::$memo =>"Project : ".$project_title."(".$project_id."), Amount : ".$donar_amount.",".$payer_name." Pay Fees(%) : ".$transaction_fees.", Create By : ".$project_create_name.", On Site : ".site_url() 
						);
					   //    print_r($request_array);die();
						  /* Make the call to PayPal to get the Pay token
							If the API call succeded, then redirect the buyer to PayPal
							to begin to authorize payment.  If an error occured, show the
							resulting errors
							*/
						   $nvpStr=http_build_query($request_array, '', '&');
						  $resArray=$NVP_SampleConstants->hash_call("AdaptivePayments/Preapproval",$nvpStr);
						  
						 // print_r($resArray);die;
						 
						 $strtemp='';
							
							foreach($resArray as $key => $value) {    			
    			
								$strtemp.=$key ."  ::  ".$value."  ==  ";				
							}
						  log_message('error',"PREAPPROVAL DATA:".$strtemp);
						  
						  $ack = strtoupper($resArray['responseEnvelope.ack']);
							if($ack!="SUCCESS"){
								
								$data= array(
								'reshash' => 	$resArray,	 
								);
								$this->session->set_userdata($data);
								//$location = "APIError.php";
								//header("Location: $location");
								//echo "APIError(3) ";
								////////==fail mail to donar email=====
						
						
						
$error= "<p>Sorry..!  Your Preapproval payment process is violated due to following error :<br/>".$resArray['error(0).errorId'].' - '.$resArray['error(0).message'];

							$data['error']=$error;
							
							$this->load->view('automation/step4', $data);
							
							
								
							}
								
								else
								{
									
									$data5= array(
										'preapprovalKey' =>	$resArray['preapprovalKey'],	 
									);
									$this->session->set_userdata($data5);
									
									
								
								//////=====temp insert into the table==
								
									$temp_insert=$this->db->query("insert into temp_preapprove (`preapprovalKey`,`user_id`,`project_id`,`perk_id`,`name`,`comment`,`host_ip`,`transaction_date_time`,`temp_anonymous`)values('".$resArray['preapprovalKey']."','".$donar_id."','".$project_id."','".$perk_id."','".$donar_name."','".$donar_comment."','".$_SERVER['REMOTE_ADDR']."','".date("Y-m-d H:i:s")."','".$post_anonymous."')");
							
									$payPalURL = PAYPAL_REDIRECT_URL.'_ap-preapproval&preapprovalkey='.$resArray['preapprovalKey'];
									echo "<script>window.location.href='$payPalURL'</script>";
								
								}
							
					}
					catch(Exception $ex) {
						throw new Exception('Error occurred in PaymentDetails method');
						////===catchException(3)  
						
	$error="<p>Sorry..!  Your Preapproval payment process is violated due to error in PaymentDetails method. Please check your setting and try once again.";
							$data['error']=$error;
							$this->load->view('automation/step4', $data);
						
					}
					
					
				}
				
				
				else
				{		
					
					////=====INSTANT======
					
					///////////////==============Fees Payer Type=================
			
			/////////======The payer of PayPal fees.
			
			///===Allowed values are:
			
			///=== 1) SENDER     Sender pays all fees (for personal, implicit simple/parallel payments)
			///=== 2) PRIMARYRECEIVER    Primary receiver pays all fees
			///=== 3) EACHRECEIVER     Each receiver pays their own fee (default and personal payments)
			///=== 4) SECONDARYONLY     Secondary receivers pay all fees (use only for chained payments with one secondary receiver)
			
			
			///=====NOTE :: === The fee payer SENDER cannot be used if a primary receiver is specified (false) else true======
				
				$feesPayer=$automation_paypal->fees_taken_from;
				
				try {
		
			
			$returnURL = site_url("automation/getpaymentdetails");     //////////=project detail page link will goes here
			$cancelURL = site_url("automation") ;
			$ipnNotificationUrl=site_url("automation/getpaymentdetails/");
			
			//$preapprovalKey=$_REQUEST["preapprovalkey"];   /////////////////////===========get from the paypal database or take from user post=======
			$preapprovalKey='';
			
		
			
			//$transaction_fees=$paypal->transaction_fees;  ////= from the database
				
		
			
			$transaction_fees = $site_setting['instant_fees'];  ////= from the database
			
			
		
			
			if($feesPayer=='SENDER')
			{	
				$admin_amount= (($donar_amount * $transaction_fees)/100);	
				$project_owner_amount= ($donar_amount - $admin_amount);
				$payer_name='Donor';
			}
			elseif($feesPayer=='PRIMARYRECEIVER')
			{
				$payer_name='Project Creator';
				$admin_amount= (($donar_amount * $transaction_fees)/100);	
				$project_owner_amount= $donar_amount;  ////====if primary receiver then al donate amount pass to primary because it will take 2
				//$project_owner_amount= $donar_amount + $fee_paypal; 													 ///==transaction for payment after		
			}
			
			////=======normally not in use SECONDARYONLY and EACHRECEIVER =====
			
			/*=====  if select SECONDARYONLY and EACHRECEIVER in both fees cut from the Primary receiver or project owner  ======*/
			
			
			
			elseif($feesPayer=='SECONDARYONLY')
			{				
				$payer_name='Site Owner';
				$temp_admin_amount= (($donar_amount * $transaction_fees)/100);
				
				$admin_amount= $donar_amount;	
				$project_owner_amount= ($donar_amount - $temp_admin_amount);
			}
			elseif($feesPayer=='EACHRECEIVER')
			{
				$payer_name='Project Creator And Site Owner';
				$admin_amount= (($donar_amount * $transaction_fees)/100);	
				$project_owner_amount= ($donar_amount - $admin_amount);
			}
			else
			{
				$payer_name='Donor';
				$admin_amount= (($donar_amount * $transaction_fees)/100);	
				$project_owner_amount= ($donar_amount - $admin_amount);
			}
			
			
			
			$admin_amount= str_replace(',','',number_format($admin_amount,2));
			$project_owner_amount=str_replace(',','',number_format($project_owner_amount,2));
			
			$senderEmail  ='';//$donar_email;				///////////========*******DONAR/SENDER Pay Email Address====*******
			
			
			$request_array= array(
			
			//Pay::$actionType => $_REQUEST['actionType'],   
			
			Pay::$actionType => $actionType, 
			
			
			Pay::$cancelUrl  => $cancelURL,
			Pay::$returnUrl=>   $returnURL,
			Pay::$ipnNotificationUrl=>   $ipnNotificationUrl,			
			Pay::$currencyCode  =>$currency_code,   		
			Pay::$clientDetails_deviceId  => DEVICE_ID,
			Pay::$clientDetails_ipAddress  => $_SERVER['REMOTE_ADDR'],
			Pay::$clientDetails_applicationId =>APPLICATION_ID,
			RequestEnvelope::$requestEnvelopeErrorLanguage => 'en_US',
			Pay::$memo => "Project : ".$project_title."(".$project_id."), Amount : ".$donar_amount .",".$payer_name." Pay Fees(%) : ".$transaction_fees.", Create By : ".$project_create_name.", On Site : ".site_url()  ,		
						/////////=============comment send to all payment receiver ====
				
			Pay::$feesPayer => $feesPayer              /////////////////set in the  pay from means our database adaptive setting  
			
			
			//////===================*************=====================
			
		
			);
			
			/////////================Set all receiver amount and email and  primary email
			
			
			
			
			////////=set primary receiver============
		
		
			$request_array[Pay::$receiverEmail[0]] = $project_owner_email;
			$request_array[Pay::$receiverAmount[0]] = $project_owner_amount;
			if($feesPayer=='SENDER')
			{	
				$request_array[Pay::$primaryReceiver[0]] = 'false';	
			}
			elseif($feesPayer=='PRIMARYRECEIVER')
			{
				$request_array[Pay::$primaryReceiver[0]] = 'true';
			}
			elseif($feesPayer=='SECONDARYONLY')
			{
				$request_array[Pay::$primaryReceiver[0]] = 'false';
			}
			elseif($feesPayer=='EACHRECEIVER')
			{
				$request_array[Pay::$primaryReceiver[0]] = 'true';
			}
			else
			{
				$request_array[Pay::$primaryReceiver[0]] = 'true';
			}
			////////=set Admin  receiver============
			
				
			/*==get admin detail  ====*/
			
			$admin_email=$automation_paypal->paypal_email;
			
			$request_array[Pay::$receiverEmail[1]] = $admin_email;
			$request_array[Pay::$receiverAmount[1]] = $admin_amount;
			
				
			
			if($feesPayer=='SENDER')
			{	
				$request_array[Pay::$primaryReceiver[1]] = 'false';
			}
			elseif($feesPayer=='PRIMARYRECEIVER')
			{
				$request_array[Pay::$primaryReceiver[1]] = 'false';
			}
			elseif($feesPayer=='SECONDARYONLY')
			{
				$request_array[Pay::$primaryReceiver[1]] = 'true';
			}
			elseif($feesPayer=='EACHRECEIVER')
			{
				$request_array[Pay::$primaryReceiver[1]] = 'false';
			}
			else
			{
				$request_array[Pay::$primaryReceiver[1]] = 'false';
			}
			
		
			
			
			/////////=========ABOVE SET======Set preapprovalKey  from the database  or user post ==================
			
			
		
			if($preapprovalKey!= "")
			{
				$request_array[Pay::$preapprovalKey] = $preapprovalKey;
			}
			
			
			
			
			///////////=========ABOVE SET======*******DONAR/SENDER Pay Email Address====*******
			
			
			
			if($senderEmail!= "")
			{
			//	$request_array[Pay::$senderEmail]  = $senderEmail;
			}
		
		
		
		
			/////////////===========Make request URL=========
			
		
			/*echo "<pre>";
			
			print_r($request_array);
			die();*/
			
		
			$nvpStr=http_build_query($request_array, '', '&');	
			
			
			/////////////===========Make request URL=========
			
			
			
			
		
			/* Make the call to PayPal to get the Pay token
			 If the API call succeded, then redirect the buyer to PayPal
			 to begin to authorize payment.  If an error occured, show the
			 resulting errors
			 */
			 
		
			$resArray=$NVP_SampleConstants->hash_call('AdaptivePayments/Pay',$nvpStr);
		////////////////////////////////
			
			
							 $strtemp='';
							
							foreach($resArray as $key => $value) {    			
    			
								$strtemp.=$key ."  ::  ".$value."  ==  ";				
							}
							
							
			  log_message('error',"INSTANT PAYMENT DATA:".$strtemp);
		
		
		//	print_r($resArray);die;
			
							/* Display the API response back to the browser.
						 If the response from PayPal was a success, display the response parameters'
						 If the response was an error, display the errors received using APIError.php.
						 */
						$ack = strtoupper($resArray['responseEnvelope.ack']);
					
					
					
						if($ack!="SUCCESS"){
							
							//$_SESSION['reshash']=$resArray;
							
							$data= array(
								'reshash' => 	$resArray,	 
								);
							$this->session->set_userdata($data);
							
							
							
							
							$case ="";
							
							
							////////==fail mail to donar email=====
							
							
							
				$error= "<p>Sorry...! Your Payment process is violated due to error :<br/>".$resArray['error(0).errorId'].' - '.$resArray['error(0).message'];
							
							$data['error']=$error;
							$this->load->view('automation/step4', $data);
							
						}
						else
						{
							///$_SESSION['payKey'] = $resArray['payKey'];
							
							$data2= array(
								'payKey' =>	$resArray['payKey'],	 
								);
							$this->session->set_userdata($data2);
							
							$payKey=$resArray['payKey'];
							
							
							/////////============insert all detail to the temp_adaptive table===========
							
							$orignial_amount=$donar_amount-$admin_amount;
							
							$insert=$this->db->query("insert into temp_adaptive (`user_id`,`project_id`,`perk_id`,`total_amount`,`amount`,`pay_fee`,`email`,`host_ip`,`transaction_date_time`,`paypal_paykey`,`paypal_adaptive_status`,`temp_anonymous`)values('".$donar_id."','".$project_id."','".$perk_id."','".$donar_amount."','".$orignial_amount."','".$admin_amount."','".$donar_email."','".$_SERVER['REMOTE_ADDR']."','".date("Y-m-d H:i:s")."','".$payKey."','FAIL','".$post_anonymous."')");
						
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
								
								$error ="<p>Sorry...! Your Payment process is violated due to error in paymentExecStatus. Please check your setting and try once again.";
							
							$data['error']=$error;						
							
							$this->load->view('automation/step4', $data);
								
								
							}
						}
			
			
				}
				
				
				catch(Exception $ex) {
					
					
			
					throw new Exception('Error occurred in PayReceipt method');
					
					////==catchException(1)
					
					////////==fail mail to donar email=====
					
						
						$error ="<p>Sorry...! Your Payment process is violated due to error in PayReciept Method. Please check your setting and try once again.";
						$data['error']=$error;
						$this->load->view('automation/step4', $data);
							
				}
				
				
				/////////===========for payment redirect user to this link============= 
					
					
					
					switch($case) {
						case "2" :
							$token = $resArray['payKey'];
							$payPalURL = PAYPAL_REDIRECT_URL.'_ap-payment&paykey='.$token;
											
						/*	if($feesPayer=='PRIMARYRECEIVER')
							{	
								if($paypal_fees!='' || $paypal_fees!='0.00')
								{
									echo "This market place will add $paypal_fees % to your Total Donate Amount";
								}
							}
						*/
							//echo "<a href=$payPalURL><b>* if Confirm then click here to Redirect URL to Complete Payment </b></a><br>";
																	
							echo "<script>window.location.href='$payPalURL'</script>";
							
							
							break;
						case "3" :
							$token = $resArray['payKey'];
							$payPalURL = PAYPAL_REDIRECT_URL.'_ap-payment&paykey='.$token;
							
							echo "<script>window.location.href='$payPalURL'</script>";
							
							break;
						case "4" :
							$token = $resArray['payKey'];
							$payPalURL = PAYPAL_REDIRECT_URL.'_ap-payment&paykey='.$token;
							//echo"Payment to \"Primary Receiver\" is Complete<br/>";
							//echo"<a href=ExecutePaymentOption.php?payKey=$payKey><b>* \"Execute Payment\" to pay to the secondary receivers</b></a><br>";
							break;
				
					}
					
					
			/////////===========for payment redirect user to this link============= 		
				
			}
			
		}
			
	}
	
	
	function preapprovereceipt()
	{
			
		/*echo "<pre>";
		
		print_r($_POST);
		
		die;*/
		$data['msg']='';
		$site_setting = $this->home_model->select_site_setting();
		
		if($site_setting['currency_code']!='') {		
			$currency_code=$site_setting['currency_code'];
		} else {
			$currency_code='USD';
		}
			
			
		$automation_paypal=$this->automation_model->get_automation_paypal();
		
	 					
		
		//////////=================Get PAYPAL SETTING  FROM DATABASE 	================
				
				$application_id = $automation_paypal->application_id;
				$api_username = $automation_paypal->paypal_username;
				$api_password = $automation_paypal->paypal_password;	
				$api_key =  $automation_paypal->paypal_signature;
				
				
				if($automation_paypal->site_status=='sandbox')
				{
				
					$dbend_point='https://svcs.sandbox.paypal.com/';	
					$db_paypalurl='https://www.sandbox.paypal.com/webscr&cmd=';
				
				}
				
				elseif($automation_paypal->site_status=='live')
				{
				
					$dbend_point='https://svcs.paypal.com/';	
					$db_paypalurl='https://www.paypal.com/webscr&cmd=';
				
				}
				else
				{	
					$dbend_point='https://svcs.sandbox.paypal.com/';	
					$db_paypalurl='https://www.sandbox.paypal.com/webscr&cmd=';		
				}

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
		define('APPLICATION_ID',$application_id);
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
		
		
			try {
			
					if($this->session->userdata("preapprovalKey")!='')
					{
						
						$preapprovalKey = $this->session->userdata("preapprovalKey");
					
					}
					
					if(empty($preapprovalKey))
					{
						$preapprovalKey = $this->session->userdata("preapprovalKey");
					}
					
					
			
			
					$request_array= array (
										   
					PreapprovalDetail::$preapprovalKey=> $preapprovalKey,
					RequestEnvelope::$requestEnvelopeErrorLanguage => 'en_US'
					
					);
					
				
					$nvpStr=http_build_query($request_array, '', '&');
					
					$resArray=$NVP_SampleConstants->hash_call("AdaptivePayments/PreapprovalDetails",$nvpStr);
		           
					
					 $strtemp='';
							
							foreach($resArray as $key => $value) {    			
    			
								$strtemp.=$key ."  ::  ".$value."  ==  ";				
							}
							
							
					log_message('error',"PREAPPROVE RECIEPT PAYPAL DATA:".$strtemp);
						/* Display the API response back to the browser.
						   If the response from PayPal was a success, display the response parameters'
						   If the response was an error, display the errors received using APIError.php.
						*/
					$ack = strtoupper($resArray["responseEnvelope.ack"]);
				
				
				  if($ack!="SUCCESS"){
			  
					///$_SESSION['reshash']=$resArray;
					
					$data= array(
						'reshash' => 	$resArray,	 
						);
					$this->session->set_userdata($data);
							
							
							
					//$location = "APIError.php";
					//header("Location: $location");
			
			
						///=======APIError(4)
						
						
							////////==fail mail to donar email=====
								
						
						
						$error= "Sorry...Your preapproval payment process is violated due to ".$resArray['error(0).errorId'].' - '.$resArray['error(0).message']."<br/><br/>Please check your settings and Try once again";
							
							$data['error']=$error;
							$this->load->view('automation/step4',$data);
					
				}
			
			
				 else {
				
				
					/* view response
					echo $preapprovalKey;
		
					foreach($resArray as $key => $value) {    			
					
						echo "$key   ::  $value </br>";				
					}*/
			
			
					if(strtoupper($resArray['responseEnvelope.ack'])=='SUCCESS' && strtoupper($resArray['approved'])=='TRUE' && $resArray['maxTotalAmountOfAllPayments']!=''  && $resArray['maxTotalAmountOfAllPayments']>0 && $resArray['senderEmail']!='' && strtoupper($resArray['status'])=='ACTIVE' )
					{
								
						/////////============insert all detail to the transaction table===========
						
						$get_other_detail=$this->db->query("select * from temp_preapprove where preapprovalKey='".$preapprovalKey."'");
						$detail=$get_other_detail->row();
						$project_id=$detail->project_id;
						$perk_id=$detail->perk_id;
						$donar_name=$detail->name;
						$donar_comment=$detail->comment;
						
						$donar_id=$detail->user_id;
						
						
						$anonymous=$detail->temp_anonymous;
						$donar_email=$resArray['senderEmail'];
						$total_amount=$resArray['maxTotalAmountOfAllPayments'];
						
					
							//	$transaction_fees=$paypal->transaction_fees;  ////= from the database
		
				
						$prj =  $this->project_category_model->get_one_project($project_id);
						
						
						if($prj['payment_type'] == '0'){
							$transaction_fees = $site_setting['fixed_fees'];
						}else{
							$transaction_fees = $site_setting['flexible_fees'];
						}
						
				
				
						$admin_amount= (($total_amount * $transaction_fees)/100);	
						$project_owner_amount= ($total_amount - $admin_amount);
						$admin_amount= str_replace(',','',number_format($admin_amount,2));
						$project_owner_amount=str_replace(',','',number_format($project_owner_amount,2));
	
		
						$chk_trans_id=1;	
						$chk_transaction=$this->db->query("select * from transaction where preapproval_key='".$preapprovalKey."'");
						
						if($chk_transaction->num_rows()>0)
						{
							$chk_trans_id=0;
						}
	
	
						if($chk_trans_id==1)
						{
		
					
			$insert=$this->db->query("insert into transaction (`user_id`,`project_id`,`perk_id`,`amount`,`listing_fee`,`pay_fee`,`name`,`email`,`host_ip`,`comment`,`transaction_date_time`,`preapproval_key`,`preapproval_status`,`preapproval_total_amount`,`trans_anonymous`)values('".$donar_id."','".$project_id."','".$perk_id."','".$project_owner_amount."','0','".$admin_amount."','".$donar_name."','".$donar_email."','".$_SERVER['REMOTE_ADDR']."','".$donar_comment."','".date("Y-m-d H:i:s")."','".$preapprovalKey."','FAIL','".$total_amount."','".$anonymous."')");
							
		
		
									$get_don_project = $this->db->get_where('project',array('project_id' => $project_id));
									$don_prj = $get_don_project->row_array();
									if($don_prj['amount_get']!="")
									{
										$amt = $don_prj['amount_get'];
									}else{
										$amt = 0;
									}
									$data_don = array(			
										'amount_get' => $amt + $project_owner_amount,
									);
									$this->db->where('project_id',$project_id);
									$this->db->update('project',$data_don);
									
									
									
									
									if($perk_id!='' && $perk_id!='0')
									{
									
										$query = $this->db->get_where('perk',array('perk_id' => $perk_id));
										$pk = $query->row_array();
										$data = array(			
											'perk_get' => ($pk['perk_get']*1)+1,
										);
										$this->db->where('perk_id',$perk_id);
										$this->db->update('perk',$data);
					
									}
		
		
	
	
			$login_user =  $this->user_model->get_one_user($donar_id);
			$donar_email=$login_user['email'];	
			
			
			
			$payee_email=$resArray['senderEmail'];			
			
			
			$project_id=$prj['project_id'];			
			$project_owner_email=$prj['email'];		
							
			$username =$prj['user_name'];
			$project_name=$prj['project_title'];
			
			
				
				$donor_name=$login_user['user_name'];
				$donote_amount=$total_amount;			
			
					
				$msg="<p>Your Payment Process is successed on Project ".$prj['project_title']."<br/><br/><h3>Below is Paypal Response :<br/><br/></h3>";
					
					foreach($resArray as $key => $value) {    			
    			
						$msg.="$key   ::  $value </br>";				
					}
					
					$data['msg']=$msg;
					
					$this->load->view('automation/step4',$data);
						
						
						
						
						
						}
						else
						{
						
				$error="<p>Sorry...! Your  Preapproval Process is violated due to Preapproval Key already exists in the system. This happen due to 2 reason.<br/><br/>1). Due to lowe internet connectivity.<br/>2). Paypal Send response twice for same transaction. Check Manually Project donation amount and New Donor Entry.";
					
						$data['error']=$error;
						
						$this->load->view('automation/step4',$data);
					}
				}
		
			}
			
			
			
			}
			catch(Exception $ex) {
	
		throw new Exception('Error occurred in PaymentDetails method');
		
				///==catchException(4)
				////////==fail mail to donar email=====
				
				
					$error="<p>Sorry...! Your  Preapproval Process is violated due to Error occurred in PaymentDetails method. Please check your setting and try once again.";
					
					$data['error']=$error;
					$this->load->view('automation/step4',$data);
						
		}
	
	
	}
	
	
	
	function getpaymentdetails()
	{
		
		
		$data['msg']='';
		$site_setting = $this->home_model->select_site_setting();
		
		if($site_setting['currency_code']!='') {		
			$currency_code=$site_setting['currency_code'];
		} else {
			$currency_code='USD';
		}
			
			
		$automation_paypal=$this->automation_model->get_automation_paypal();
	 
	 
		//////////=================Get PAYPAL SETTING  FROM DATABASE 	================
		
		$application_id = $automation_paypal->application_id;
				$api_username = $automation_paypal->paypal_username;
				$api_password = $automation_paypal->paypal_password;	
				$api_key =  $automation_paypal->paypal_signature;
				
				
				if($automation_paypal->site_status=='sandbox')
				{
				
					$dbend_point='https://svcs.sandbox.paypal.com/';	
					$db_paypalurl='https://www.sandbox.paypal.com/webscr&cmd=';
				
				}
				
				elseif($automation_paypal->site_status=='live')
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
		
		$feesPayer=$automation_paypal->fees_taken_from;
		
	/////////////===========Action Type===========
	
	/// Whether the Pay request pays the receiver or whether the Pay request is set up to create a payment requesbut not fulfill the payment until the Execute Pay request is called.
    //Allowable values are:
	
	//////=******************
	
	///=== 1)PAY     Use this option if you are not using the Pay request in combinations with the ExecutePayment request.
	
	///=== 2)CREATE    Use this option to set up the payment instructions with the SetPaymentOptions request and then execute the payment at a later time with the ExecutePayment request.
	
	///=== 3)PAY_PRIMARY     For chained payments only, specify this value to delay payments to the secondary receivers; only the payment to the primary receiver is processed
	
		$actionType='PAY';
			

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
		
		
		$this->load->library('NVP_SampleConstants');
		
		$NVP_SampleConstants = new NVP_SampleConstants();
		
		//session_start();
		
		
				
			
			
			try {
				
					/*if($_SESSION['payKey']!='')
					{
						$payKey = $_SESSION['payKey'];
					}*/
					
					if($this->session->userdata('payKey')!='')
					{
						$payKey = $this->session->userdata('payKey');
					}
					
					$request_array = array (
					
						PaymentDetails::$payKey=> $payKey,
						RequestEnvelope::$requestEnvelopeErrorLanguage=> 'en_US'
						
					);
					
				
					$nvpStr=http_build_query($request_array, '', '&');
					$resArray=$NVP_SampleConstants->hash_call("AdaptivePayments/PaymentDetails",$nvpStr);
					
					
					 $strtemp='';
							
							foreach($resArray as $key => $value) {    			
    			
								$strtemp.=$key ."  ::  ".$value."  ==  ";				
							}
							
							
					log_message('error',"INSTANT RECIEPT PAYPAL DATA:".$strtemp);
					/* Display the API response back to the browser.
					   If the response from PayPal was a success, display the response parameters'
					   If the response was an error, display the errors received using APIError.php.
					 */
					$ack = strtoupper($resArray["responseEnvelope.ack"]);
					
					
					if($ack!="SUCCESS")
					{
						
						//$_SESSION['reshash']=$resArray;
						
					$data3= array(
						'reshash' => 	$resArray,	 
						);
					$this->session->set_userdata($data3);
					
						//$location = "APIError.php";
						//header("Location: $location");
						
						//echo "APIError(2)";
						
						
						///////==fail mail to donar email=====
							
							
					$get_transaction_detail=$this->db->query("select * from temp_adaptive where paypal_paykey='".$payKey."'");
										
					$chk_trans=$get_transaction_detail->num_rows();			
					$trans=$get_transaction_detail->row();
					
				
					$error="Sorry...! Your  Instant payment process failed due to error  :<br/>".$resArray['error(0).errorId'].' - '.$resArray['error(0).message'];
					
					$data['error']=$error;
					$this->load->view('automation/step4',$data);
				}
					
			}
			catch(Exception $ex) {
		
			
				throw new Exception('Error occurred in PaymentDetails method');
				
				//echo catchException(2);
				
				///////==fail mail to donar email=====
		
				
				$get_transaction_detail=$this->db->query("select * from temp_adaptive where paypal_paykey='".$payKey."'");
				$chk_trans=$get_transaction_detail->num_rows();			
				$trans=$get_transaction_detail->row();
				
				$error="Sorry...! Your Instant Payment process failed due to Error occurred in PaymentDetails method. Please check your setting and try once again";
				
				$data['error']=$error;
				$this->load->view('automation/step4',$data);
				
			}
					/*foreach($resArray as $key => $value) {
    			
    						echo "$key   ::  $value </br>";
				
					}
					*/
					
				if(strtoupper($resArray['status'])=='COMPLETED' && strtoupper($resArray['responseEnvelope.ack'])=='SUCCESS')
				{
						
					$get_transaction_detail=$this->db->query("select * from temp_adaptive where paypal_paykey='".$payKey."'");
					$chk_trans=$get_transaction_detail->num_rows();			
					$trans=$get_transaction_detail->row();
					
							$orignial_amount=$trans->amount;
							$user_id=$trans->user_id;
							$project_id=$trans->project_id;
							$perk_id=$trans->perk_id;
							$admin_amount=$trans->pay_fee;
							$donar_email=$trans->email;
							$ip=$trans->host_ip;
							$date_time=$trans->transaction_date_time;
							$anonymous = $trans->temp_anonymous;
					
				
					$chk_trans_id=1;	
					$chk_transaction=$this->db->query("select * from transaction where paypal_paykey='".$payKey."'");
					
					if($chk_transaction->num_rows()>0)
					{
						$chk_trans_id=0;
					}	
					
					
					if($chk_trans_id==1)
					{
						
					/////////============insert all detail to the transaction table===========
					
							//$orignial_amount=$donar_amount-$admin_amount;
						
							$insert=$this->db->query("insert into transaction (`user_id`,`project_id`,`perk_id`,`amount`,`listing_fee`,`pay_fee`,`email`,`host_ip`,`transaction_date_time`,`paypal_paykey`,`paypal_adaptive_status`,`trans_anonymous`)values('".$user_id."','".$project_id."','".$perk_id."','".$orignial_amount."','0','".$admin_amount."','".$donar_email."','".$ip."','".$date_time."','".$payKey."','SUCCESS','".$anonymous."')");
				
							$last_transaction_id=mysql_insert_id();
							
				
							$get_don_project = $this->db->get_where('project',array('project_id' => $project_id));
							$don_prj = $get_don_project->row_array();
							
							if($don_prj['amount_get']!="")
							{
								$amt = $don_prj['amount_get'];
							}else{
								$amt = 0;
							}
							$data_don = array(			
								'amount_get' => $amt + $orignial_amount,
							);
							$this->db->where('project_id',$project_id);
							$this->db->update('project',$data_don);
					
									
									
								if($perk_id!='' && $perk_id!='0')
								{
								
									$query = $this->db->get_where('perk',array('perk_id' => $perk_id));
									$pk = $query->row_array();
									$data = array(			
										'perk_get' => ($pk['perk_get']*1)+1,
									);
									$this->db->where('perk_id',$perk_id);
									$this->db->update('perk',$data);
				
								}
					
					
			////////==first step will completed mail to donar email=====
						
													
				
					
				$prj =  $this->project_category_model->get_one_project($project_id);
				
		
		
			
		
				$msg="<p>Your Payment Process is successed on Project ".$prj['project_title']."<br/><br/><h3>Below is Paypal Response :<br/><br/></h3>";
					
					foreach($resArray as $key => $value) {    			
    			
						$msg.="$key   ::  $value </br>";				
					}
					
					$data['msg']=$msg;
					
					$this->load->view('automation/step4',$data);
						
						
						
			
			
			
			
			
			}
				else
				{			
					
						$error="<p>Sorry...! Your  Instant Payment Process is violated due to Paypal AP Key already exists in the system. This happen due to 2 reason.<br/><br/>1). Due to lowe internet connectivity.<br/>2). Paypal Send response twice for same transaction. Check Manually Project donation amount and New Donor Entry.";
					
						$data['error']=$error;
						
						$this->load->view('automation/step4',$data);
						
						
				
							
					}
						
				
			}
						
		
	}
	
}?>	