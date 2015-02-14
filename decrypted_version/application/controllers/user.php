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
class User extends ROCKERS_Controller {

	function User()
	{
		parent::__construct();	
		$this->load->model('home_model');
		$this->load->model('project_model');
		$this->load->model('user_model');		
	}
	
	
	function index($msg ='')
	{
		redirect('home/dashboard');
	}
	
	
	function create()
	{
		redirect('start_project/create_step1');
	}
	
	
	
	
	
	function activities($user_id='')
	{
		if(!check_user_authentication()) {  redirect('home/login'); } 
		if($user_id == '')
		{
			redirect('home/login');
		}
		
		$limit = '10';
		$offset=0;
		$data['offset'] = $offset;
		$data['limit'] = $limit;
		
		
		$data['activities'] = $this->user_model->activities($user_id,$limit,$offset);	
		$meta = meta_setting();
		$data['site_setting'] = site_setting();
		
		
		
		$data['header_menu'] = dynamic_menu(0);
		$data['footer_menu'] = dynamic_menu_footer(0);
		$data['right_menu'] = dynamic_menu_right(0);
		
		
		$data['offset']=$offset;
		$data['msg']='';
		$data['error']='';
		
		$this->home_model->select_text();
		$this->template->write('meta_title', 'Activities-'.$meta['title'], TRUE);
		$this->template->write('meta_description', $meta['meta_description'], TRUE);
		$this->template->write('meta_keyword', $meta['meta_keyword'], TRUE);
		
		
			if($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1)
			{
				$this->template->set_master_template('iphone/template.php');
				$this->template->write_view('main_content', 'iphone/comments', $data, TRUE);
				$this->template->render();
			}
			elseif(($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1)
			{
				$this->template->set_master_template('mobile/template.php');
				$this->template->write_view('main_content', 'mobile/comments', $data, TRUE);
				$this->template->render();
			}
			else
			{
				if(!check_user_authentication()) {
				$this->template->write_view('header', 'default/common/header',  $data, TRUE);
				}else
				{
					$this->template->write_view('header', 'default/common/header_login',  $data, TRUE);
				}
				$this->template->write_view('center_content', 'default/user/activities', $data, TRUE);
				$this->template->write_view('footer', 'default/common/footer',$data, TRUE);
				$this->template->render();
			}	
		
	}
	
	function load_ajax_activities($user_id='',$limit='',$offset='')
	{
		$data['site_setting'] = site_setting();
		$data['offset']=$offset;
		$data['limit']=$limit;
		$data['msg']='';
		$data['activities'] = $this->user_model->activities($user_id,$limit,$offset);
		$this->load->view('default/user/load_ajax_activities',$data);
		
	}
	
	/////////////============user all Projects =====================
		
	
	function my_project($id=null,$offset='0')
	{	
		//if(!check_user_authentication()) {  redirect('home/login'); } 
		if(get_authenticateUserID()!="" && get_authenticateUserID()==$id){
			$cid=get_authenticateUserID();
		}else{
			$cid=$id;
		}
		if(!is_numeric($id)){
			$user_id=get_one_userid($id);
			$cid=$user_id;
			
		}
		$this->load->library('pagination');
		
		$limit = '10';
		$config['uri_segment']='4';
		$config['base_url'] = site_url('user/my_project/'.$cid);
		$config['total_rows'] = $this->user_model->get_total_my_project($cid);
		$config['per_page'] = $limit;		
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();
		
		$data['total_rows'] = $config['total_rows'];
		$data['per_page'] = $limit;
		$data['offset'] = $offset;
		$data['limit'] = $limit;
		$data['cid']=$cid;
		
		$data['result'] = $this->user_model->get_my_project($cid,$offset, $limit);
		$data['graph_cat'] = get_user_project_catregory_for_graph($cid);
		$data['project_of_the_day'] = project_of_the_day_of_user($cid);
				
		$data['site_setting'] = site_setting();
		$meta = meta_setting();
		$data['searchprj'] = "";
		
		$data['numprj']=$this->user_model->get_total_my_project($cid);
		$data['num_my_comments']=$this->user_model->list_all_comments_count($cid);
		
	
		$data['num_backers']= $this->home_model->get_total_my_back_project($cid);
		
		
				
		$this->home_model->select_text();
		
		$this->template->write('meta_title','My Campaigns-'. $meta['title'], TRUE);
		$this->template->write('meta_description','My Campaigns-'. $meta['meta_description'], TRUE);
		$this->template->write('meta_keyword','My Campaigns-'. $meta['meta_keyword'], TRUE);
		
			if($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1)
			{
				$this->template->set_master_template('iphone/template.php');
				$this->template->write_view('main_content', 'iphone/my_project', $data, TRUE);
				$this->template->render();
			}
			elseif(($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1)
			{
				$this->template->set_master_template('mobile/template.php');
				$this->template->write_view('main_content', 'mobile/my_project', $data, TRUE);
				$this->template->render();
			}
			else
			{
				if(!check_user_authentication()) {
				$this->template->write_view('header', 'default/common/header',  $data, TRUE);
				}else
				{
					$this->template->write_view('header', 'default/common/header_login',  $data, TRUE);
				}
				$this->template->write_view('center_content', 'default/user/my_project', $data, TRUE);
				$this->template->write_view('footer', 'default/common/footer',$data, TRUE);
				$this->template->render();
			}
		
		
	}
	
	function my_project_ajax($offset=0)
	{
		$limit = '12';
		$data['total_rows'] = $this->user_model->get_total_my_project();
		$data['per_page'] = $limit;
		$data['offset'] = $offset;
		$data['limit'] = $limit;
		$data['site_setting'] = site_setting();
		$data['result'] = $this->user_model->get_my_project($offset, $limit);
		$this->load->view('default/my_project_ajax', $data);
	}
	
	
	
	
	
	
	////////===user all donation
	
	function transaction($offset=0)
	{
		$this->load->library('pagination');
		
		$limit = '10';
		$config['uri_segment']='3';
		$config['base_url'] = site_url('user/transaction/');
		$config['total_rows'] = $this->user_model->get_my_donations_count();
		$config['per_page'] = $limit;
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();
		$data['donations'] = $this->user_model->get_my_donations($offset, $limit);
	
		$data['offset'] = $offset;
		$data['site_setting'] = site_setting();
		$data['header_menu'] = dynamic_menu(0);
		$data['footer_menu'] = dynamic_menu_footer(0);
		$data['right_menu'] = dynamic_menu_right(0);
		$meta = meta_setting();
		
		$this->home_model->select_text();
		$this->template->write('meta_title','My Contributions-'. $meta['title'], TRUE);
		$this->template->write('meta_description', $meta['meta_description'], TRUE);
		$this->template->write('meta_keyword', $meta['meta_keyword'], TRUE);
		
			if($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1)
			{
				$this->template->set_master_template('iphone/template.php');
				$this->template->write_view('main_content', 'iphone/my_donation', $data, TRUE);
				$this->template->render();
			}
			elseif(($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1)
			{
				$this->template->set_master_template('mobile/template.php');
				$this->template->write_view('main_content', 'mobile/my_donation', $data, TRUE);
				$this->template->render();
			}
			else
			{
				if(!check_user_authentication()) {
				$this->template->write_view('header', 'default/common/header',  $data, TRUE);
				}else
				{
					$this->template->write_view('header', 'default/common/header_login',  $data, TRUE);
				}
								$this->template->write_view('center_content', 'default/user/my_donation', $data, TRUE);
				$this->template->write_view('footer', 'default/common/footer',$data, TRUE);
				$this->template->render();
			}
		
		
		
	}
	
	
	////////===user all comment
	
	function my_comment($id=null,$offset='0')
	{
		
		$this->load->library('pagination');
		
		if(get_authenticateUserID()!="" && get_authenticateUserID()==$id){
			$cid=get_authenticateUserID();
		}else{
			$cid=$id;
		}
		
		if(!is_numeric($id)){
			$user_id=get_one_userid($id);
			$cid=$user_id;
			
		}
		
	
		$limit = '10';
		$config['uri_segment']='4';
		$config['base_url'] = site_url('user/my_comment/'.$cid);
		$config['total_rows'] = $this->user_model->list_all_comments_count($cid);
		$config['per_page'] = $limit;
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();
		$data['my_comments'] = $this->user_model->get_all_my_comment($cid,$offset, $limit);
		$data['cid']=$cid;
		$data['offset'] = $offset;
		$data['site_setting'] = site_setting();
		$data['numprj']=$this->user_model->get_total_my_project($cid);
		$data['num_my_comments']=$this->user_model->list_all_comments_count($cid);
		$data['num_backers']= $this->home_model->get_total_my_back_project($cid);
		$data['graph_cat'] = get_user_project_catregory_for_graph($cid);
		$data['project_of_the_day'] = project_of_the_day_of_user($cid);
		$data['list_comments']=$this->user_model->list_all_comments($cid,$offset, $limit);
		
		/*echo "<pre>";
		print_r($data['list_comments']);
		die;*/
		$meta = meta_setting();
		$data['site_setting'] = site_setting();
		$this->home_model->select_text();
		$this->template->write('meta_title','My Comment-'. $meta['title'], TRUE);
		$this->template->write('meta_description', $meta['meta_description'], TRUE);
		$this->template->write('meta_keyword', $meta['meta_keyword'], TRUE);
		
		
			if($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1)
			{
				$this->template->set_master_template('iphone/template.php');
				$this->template->write_view('main_content', 'iphone/my_comment', $data, TRUE);
				$this->template->render();
			}
			elseif(($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1)
			{
				$this->template->set_master_template('mobile/template.php');
				$this->template->write_view('main_content', 'mobile/my_comment', $data, TRUE);
				$this->template->render();
			}
			else
			{
				if(!check_user_authentication()) {
				$this->template->write_view('header', 'default/common/header',  $data, TRUE);
				}else
				{
					$this->template->write_view('header', 'default/common/header_login',  $data, TRUE);
				}
				$this->template->write_view('center_content', 'default/user/my_comment', $data, TRUE);
				$this->template->write_view('footer', 'default/common/footer',$data, TRUE);
				$this->template->render();
			}
		
		
		
	}
	
	function extend_project($id=null){
		
					
		if(!check_user_authentication()) {  redirect('home/login'); } 
			$chk_user_project=$this->db->query("select * from project where project_id='".$id."' and user_id='".get_authenticateUserID()."'");
		
		//	echo date('Y-m-d', strtotime("+30 days"));
			
		if($chk_user_project->num_rows()>0)
		{
		}else	{
				redirect('home/dashboard');		
		}
		$data['site_setting'] = site_setting();
			$site_setting=site_setting();
			$chk_create = $this->project_model->check_can_create(get_authenticateUserID());

			if($chk_create){
				redirect('home/index/not');
			}
			
				$this->load->library('form_validation');

			$data['error']='';
				if($this->input->post('back')){ }

			else{
	$this->form_validation->set_rules('cardnumber', CREDIT_CARD_STORE_NUMBER, 'required|numeric|min_length[12]|max_length[19]');		
		$this->form_validation->set_rules('cvv2Number', CREDIT_CARD_VERFICATION_NUMBER, 'required|numeric|exact_length[3]');	
		$this->form_validation->set_rules('card_first_name', CREDIT_CARD_FIRST_NAME, 'required|min_length[3]');	
		$this->form_validation->set_rules('card_last_name', CREDIT_CARD_LAST_NAME, 'required|min_length[3]');	
		$this->form_validation->set_rules('card_address', CREDIT_CARD_ADDRESS, 'required|min_length[3]');	
		$this->form_validation->set_rules('card_city', CREDIT_CARD_CITY, 'required|min_length[3]');	
		$this->form_validation->set_rules('card_state', CREDIT_CARD_STATE, 'required|min_length[3]');	
		$this->form_validation->set_rules('card_zipcode', CREDIT_CARD_ZIPCODE, 'required|numeric|min_length[3]|max_length[9]');	
				if($_POST){
		 $data['cardnumber'] = $this->input->post('cardnumber');
	     $data['cardtype'] = $this->input->post('cardtype');
	   	$data['card_expiration_month'] = $this->input->post('card_expiration_month');
   		 $data['card_expiration_year'] = $this->input->post('card_expiration_year');
        $data['cvv2Number'] = $this->input->post('cvv2Number');
	     $data['card_first_name'] = $this->input->post('card_first_name');
         $data['card_last_name'] = $this->input->post('card_last_name');
         $data['card_address'] = $this->input->post('card_address');
         $data['card_city'] = $this->input->post('card_city');
         $data['card_state'] = $this->input->post('card_state');
         $data['card_zipcode'] = $this->input->post('card_zipcode');

 if ($credit_card_setting->credit_card_preapproval == 1) {
					
                        $paymentType = 'Authorization';
                        $donate_status = '0';
                        $credit_payment_status = '0';
                        ///===payment_type==0   for FIXED  and 1==FLXIBLE 

                        if ($prj['payment_type'] == 0) {
                            $transaction_fees = $site_setting['fixed_fees'];
                        } else {
                            $transaction_fees = $site_setting['flexible_fees'];
                        }
                    } else {
                        $paymentType = 'Sale';
                        $transaction_fees = $site_setting['instant_fees'];
                        $donate_status = '1';
                        $credit_payment_status = '1';
                    }

                    if ($credit_card_setting->credit_card_site_status == 1) {
                        $end_point = 'https://api-3t.paypal.com/nvp';
                    } else {
                        $end_point = 'https://api-3t.sandbox.paypal.com/nvp';
                    }

                    if ($credit_card_setting->credit_card_use_proxy == 1) {
                        $end_proxy = TRUE;
                    } else {
                        $end_proxy = FALSE;
                    }

                    $this->load->library('creditcard');

                    $config = array();
					$credit_card_setting = credit_card_setting();
                    $config['API_USERNAME'] = $credit_card_setting->credit_card_username;

                    $config['API_PASSWORD'] = $credit_card_setting->credit_card_password;

                    $config['API_SIGNATURE'] = $credit_card_setting->credit_card_api_signature;

                    $config['API_ENDPOINT'] = $end_point;

                    $config['VERSION'] = $credit_card_setting->credit_card_version;

                    $config['SUBJECT'] = $credit_card_setting->credit_card_subject;

                    $config['USE_PROXY'] = $end_proxy;

                    $config['PROXY_HOST'] = $credit_card_setting->credit_card_proxy_host;

                    $config['PROXY_PORT'] = $credit_card_setting->credit_card_proxy_port;

                    $crditobj = $this->creditcard->config($config);
            /*** Get required parameters from the web form for the request****/

                    $project_id = $id;

                    $donar_amount = 100;

                  $donar_comment = $post_docomment;

                    $perk_id = 0;

                    $pay_fee = 0;

                    $anonymous = $post_anonymous;

                    $trw2 = 'FS' . randomNumber(10);

                    $trw3 = 'FS' . randomNumber(10);

                    $donate_status = 1;

                    $login_user = get_user_detail($this->session->userdata('user_id'));

            	  $cardnumber = $this->input->post('cardnumber');

                    $cardtype = $this->input->post('cardtype');

                    $card_expiration_month = $this->input->post('card_expiration_month');

                    $card_expiration_year = $this->input->post('card_expiration_year');

                    $cvv2Number = $this->input->post('cvv2Number');

                    $card_first_name = $this->input->post('card_first_name');

                    $card_last_name = $this->input->post('card_last_name');

                    $card_address = $this->input->post('card_address');

                    $card_city = $this->input->post('card_city');

                    $card_state = $this->input->post('card_state');

                    $card_zipcode = $this->input->post('card_zipcode');

                    $paymentType = urlencode($paymentType);

                    $firstName = urlencode($card_first_name);

                    $lastName = urlencode($card_last_name);

                    $creditCardType = urlencode($cardtype);

                    $creditCardNumber = urlencode($cardnumber);

                    $expDateMonth = urlencode($card_expiration_month);

                    // Month must be padded with leading zero

                    $padDateMonth = str_pad($expDateMonth, 2, '0', STR_PAD_LEFT);



                    $expDateYear = urlencode($card_expiration_year);

                    $cvv2Number = urlencode($cvv2Number);



                    $address1 = urlencode($card_address);

                    $city = urlencode($card_city);

                    $state = urlencode($card_state);

                    $zip = urlencode($card_zipcode);











                    $amount = urlencode($donar_amount);

                    $currencyCode = $currency_code;

                    $paymentType = urlencode($paymentType);



                    /* Construct the request string that will be sent to PayPal.

                      The variable $nvpstr contains all the variables and is a

                      name value pair string with & as a delimiter */

                    $nvpstr = "&PAYMENTACTION=$paymentType&AMT=$amount&CREDITCARDTYPE=$creditCardType&ACCT=$creditCardNumber&EXPDATE=" . $padDateMonth . $expDateYear . "&CVV2=$cvv2Number&FIRSTNAME=$firstName&LASTNAME=$lastName&STREET=$address1&CITY=$city&STATE=$state" .

                            "&ZIP=$zip&COUNTRYCODE=US&CURRENCYCODE=$currencyCode";






                    /* Make the API call to PayPal, using API signature.

                      The API response is stored in an associative array called $resArray */

                    $resArray = $this->creditcard->hash_call("doDirectPayment", $nvpstr);



                    $strtemp = '';

                    foreach ($resArray as $key => $value) {



                        $strtemp.= $key . "=" . $value . ",";

                    }

                    log_message('error', "DONATE WITH CREDIT CARD DATA:" . $strtemp);

              /*      echo "<pre>";

                      print_r($resArray);

                     exit; 
*/


                    /* Display the API response back to the browser.

                      If the response from PayPal was a success, display the response parameters'

                      If the response was an error, display the errors received using APIError.php.

                     */

                    $ack = strtoupper($resArray["ACK"]);







                    if ($ack != "SUCCESS") {

		                 if (isset($resArray['L_LONGMESSAGE0'])) {

                            $error_code = '';

                            if (isset($resArray['L_ERRORCODE0'])) {

                                $error_code = '(' . $resArray['L_ERRORCODE0'] . ')';

                            }

                            $res_msg_error = $error_code . ' ' . $resArray['L_LONGMESSAGE0'];

                        } else {

                            $res_msg_error = 'There was some problem in transaction. Please try again.';

                        }

                        $error = $res_msg_error;

                        $data['error'] = $error;

            //     $this->load->view('default/paypal_error', $data);

                    } else {

                        $txnid = $resArray['TRANSACTIONID'];

                        $chk_trans_id = 1;

                        $chk_transaction = $this->db->query("select * from transaction where credit_card_transaction_id='" . $txnid . "'");


                        if ($chk_transaction->num_rows() > 0) {

                            $chk_trans_id = 0;

                        }

                        if ($chk_trans_id == 1) {





                            $donar_amount = $resArray['AMT'];





                            $pay_fee = (($donar_amount * $transaction_fees) / 100);



                            $original_amount = $donar_amount - $pay_fee;



                            $temp_admin_amount = (($donar_amount * $transaction_fees) / 100);



                            $admin_amount = $donar_amount;

                            $owner_amount = ($donar_amount - $temp_admin_amount);



                            //$owner_amount = $donar_amount * $site_setting['instant_fees']/100;





                            $update_donor_wallet = $this->db->query("insert into wallet(`credit`,`user_id`,`admin_status`,`wallet_date`,`wallet_transaction_id`,`wallet_payee_email`,`wallet_ip`,`gateway_id`,`project_id`,`donate_status`,`wallet_anonymous`)values('" . $donar_amount . "','" . $this->session->userdata('user_id') . "','Confirm','" . date("Y-m-d H:i:s") . "','" . $trw2 . "','Credit Card','" . $_SERVER['REMOTE_ADDR'] . "','0','" . $project_id . "','" . $donate_status . "','" . $anonymous . "')");



                            $update_donor_wallet_debit = $this->db->query("insert into wallet(`debit`,`user_id`,`admin_status`,`wallet_date`,`wallet_transaction_id`,`wallet_payee_email`,`wallet_ip`,`gateway_id`,`project_id`,`donate_status`,`wallet_anonymous`)values('" . $donar_amount . "','" . $this->session->userdata('user_id') . "','Confirm','" . date("Y-m-d H:i:s") . "','" . $trw2 . "','Credit Card','" . $_SERVER['REMOTE_ADDR'] . "','0','" . $project_id . "','" . $donate_status . "','" . $anonymous . "')");



                       /*     $insert_owner_wallet = $this->db->query("insert into wallet(`debit`,`user_id`,`admin_status`,`wallet_date`,`wallet_transaction_id`,`wallet_payee_email`,`wallet_ip`,`gateway_id`,`project_id`,`donate_status`,`wallet_anonymous`)values('" . $owner_amount . "','" . $prj['user_id'] . "','Confirm','" . date("Y-m-d H:i:s") . "','" . $trw2 . "','Credit Card','" . $_SERVER['REMOTE_ADDR'] . "','0','" . $vals['item_number'] . "','" . $donate_status . "','" . $anonymous . "')");
*/


                         $insert = $this->db->query("insert into transaction (`user_id`,`project_id`,`perk_id`,`amount`,`listing_fee`,`pay_fee`,`email`,`host_ip`,`paypal_email`,`comment`,`transaction_date_time`,`trans_anonymous`,`credit_card_transaction_id`,`credit_card_payment_status`,`wallet_payment_status`)values('" . $this->session->userdata('user_id') . "','" . $project_id . "','" . $perk_id . "','" . $original_amount . "','0','" . $pay_fee . "','" . $login_user['email'] . "','" . $_SERVER['REMOTE_ADDR'] . "','" . $login_user['email'] . "','" . $donar_comment . "','" . date("Y-m-d H:i:s") . "','" . $anonymous . "','" . $txnid . "','" . $credit_payment_status . "','2')");



                            $last_transaction_id = mysql_insert_id();





                          /*  $get_don_project = $this->db->get_where('project', array('project_id' => $project_id));

                            $don_prj = $get_don_project->row_array();

                            if ($don_prj['amount_get'] != "") {

                                $amt = $don_prj['amount_get'];

                            } else {

                                $amt = 0;

                            }

                            $data_don = array(

                                'amount_get' => $amt + $donar_amount,

                            );

                            $this->db->where('project_id', $project_id);

                            $this->db->update('project', $data_don);*/







                            if ($perk_id != '' && $perk_id != '0') {



                                $query = $this->db->get_where('perk', array('perk_id' => $perk_id));

                                $pk = $query->row_array();

                                $data = array(

                                    'perk_get' => ($pk['perk_get'] * 1) + 1,

                                );

                                $this->db->where('perk_id', $perk_id);

                                $this->db->update('perk', $data);

                            }

                            ///////////==========affiliate earn=============		

                            $prj = $this->project_model->get_project_user($project_id);

                            $login_user = get_user_detail($this->session->userdata('user_id'));

                            $user_detail = get_user_detail($prj['user_id']);



                            $project_id = $prj['project_id'];

                            $project_title = $prj['project_title'];

                            $url_project_title = $prj['url_project_title'];

                            $project_owner_email = $user_detail['paypal_email'];



                            $username = $prj['user_name'];

                            $donar_email = $login_user['email'];

                            $project_owner_email = $prj['email'];



                            $project_name = $project_title;

                            $project_page_link = site_url('projects/' . $url_project_title . '/' . $project_id);



                            $donor_name = $login_user['user_name'];

                            $donote_amount = $donar_amount;

                            $donor_profile_link = site_url('member/' . $this->session->userdata('user_id'));



                            $prj = $this->project_model->get_project_user($project_id);

                            $login_user = get_user_detail($this->session->userdata('user_id'));

                            $project = $prj;

                            $facebook_setting = facebook_setting();

							$update_date = $this->project_model->update_project_period($project_id);
					if($update_date){
					$data['success'] = "Payment is successful & date updated";
					}
                       
 					redirect('projects/' . $url_project_title . '/' . $project_id);
                        }/////=====check unique transaction id		

                    }


					}
			}
				if($this->form_validation->run() === FALSE)
			{			
						if(validation_errors())
						{
											$data['error'] = validation_errors();
						}
			}
				$data['id']=$id;
		
			$this->template->write_view('header', 'default/common/header_login', $data, TRUE);
			$this->template->write_view('main_content', 'default/user/extend_project', $data, TRUE);
				$this->template->write_view('footer', 'default/common/footer',$data, TRUE);
			$this->template->render();

		
		}
	
	//////===user email notification setting
	
	function email_setting($msg='')
	{
		if(!check_user_authentication()) {  redirect('home/login'); } 
		$data['msg']=$msg;	
		$data['error']='';
		$data['site_setting'] = site_setting();
		$meta = meta_setting();
		
		
		$this->home_model->select_text();
		$this->template->write('meta_title', $meta['title'], TRUE);
		$data['user_not']=$this->user_model->get_email_notification($this->session->userdata('user_id'));
		
		$this->template->write('meta_title','Notification-'. $meta['title'], TRUE);
		$this->template->write('meta_description', $meta['meta_description'], TRUE);
		$this->template->write('meta_keyword', $meta['meta_keyword'], TRUE);
		
			if($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1)
			{
				$this->template->set_master_template('iphone/template.php');
				$this->template->write_view('main_content', 'iphone/email_setting', $data, TRUE);
				$this->template->render();
			}
			elseif(($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1)
			{
				$this->template->set_master_template('mobile/template.php');
				$this->template->write_view('main_content', 'mobile/email_setting', $data, TRUE);
				$this->template->render();
			}
			else
			{
				$this->template->write_view('header', 'default/common/header_login',$data, TRUE);
				$this->template->write_view('center_content', 'default/user/notifications', $data, TRUE);
				$this->template->write_view('footer', 'default/common/footer',$data, TRUE);
				$this->template->render();
			}
		
		
		
		if($this->input->post('submit')!=''){
				$this->user_model->user_notification_insert();
				redirect('user/email_setting/success');
		}
	}
	
	
	////////=== one user profile
	
	function profile($uid='',$pid="")
	{
		
	
		if($pid!='')
		{
		
		$project_detail = $this->db->query("select * from project where project_id='".$pid."'");
		$project=$project_detail->row();
		
		
		}
		if(!is_numeric($uid)){
			$user_id=get_one_userid($uid);
			$uid=$user_id;
			
		}

		
		$this->load->library('pagination');
		$limit = '12';
		$config['uri_segment']='3';
		$offset=0;
		$data['cid']=$uid;
		$config['base_url'] = site_url('home/member/');
		$config['total_rows'] = $this->home_model->get_total_my_back_project($uid);
		$config['per_page'] = $limit;		
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();
		
		$data['total_rows'] = $config['total_rows'];
		$data['per_page'] = $limit;
		$data['offset'] = $offset;
		$data['limit'] = $limit;
		
		$data['project'] = $this->home_model->get_dashboard_project();
		
		//$data['project_gallery'] = $this->project_model->get_all_project_gallery($data['project']['project_id']);
		//$data['all_perks'] = $this->project_model->get_all_perks($data['project']['project_id']);
		
		//$data['backers']=my_backed_project(get_authenticateUserID());
		$data['backers'] = $this->home_model->my_backed_project($uid,$offset, $limit);
		$data['user_detail']=get_user_detail($uid);
		
		$data['donation_count'] = $this->home_model->get_donation_count($uid);
		$data['donation'] = $this->home_model->get_donation($uid);
		$data['graph_cat'] = get_user_project_catregory_for_graph($uid);
		$data['project_of_the_day'] = get_current_project($pid);
		
		$data['msg'] = "";
		$data['site_setting'] = site_setting();
		$meta = meta_setting();
		
		$data['numprj']=$this->user_model->get_total_my_project($uid);
		$data['num_my_comments']=$this->user_model->list_all_comments_count($uid);
		$data['num_backers']= $this->home_model->get_total_my_back_project($uid);
		
		
		
		$this->home_model->select_text();
		$this->template->write('meta_title','Dashboard-'. $meta['title'], TRUE);
		$this->template->write('meta_description',$meta['meta_description'], TRUE);
		$this->template->write('meta_keyword', $meta['meta_keyword'], TRUE);
		
		
		if($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1)
		{
		$this->template->set_master_template('iphone/template.php');
		$this->template->write_view('main_content', 'iphone/dashboard', $data, TRUE);
		$this->template->render();
		}
		elseif(($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1)
		{
		$this->template->set_master_template('mobile/template.php');
		$this->template->write_view('main_content', 'mobile/dashboard', $data, TRUE);
		$this->template->render();
		}
		else
		{
		
		if(!check_user_authentication()) {
				$this->template->write_view('header', 'default/common/header',  $data, TRUE);
				}else
				{
					$this->template->write_view('header', 'default/common/header_login',  $data, TRUE);
				}
		$this->template->write_view('center_content', 'default/user/main_dashboard', $data, TRUE);
		$this->template->write_view('footer', 'default/common/footer',$data, TRUE);
		$this->template->render();
		}
	/*echo "<script>parent.$.fn.colorbox.close(); </script>";

		echo "<script>parent.window.location.href='".site_url('user/profile/'.$uid.'/'.$pid)."'</script>";*/
	
		
		
		
	}
	
	
	/////======site all users lists
	
	function profiles($offset=0)
	{	
		
		
		$this->load->library('pagination');
		$limit = '9';
		$config['base_url'] = site_url('user/profiles/');
		
		$config['total_rows'] = $this->user_model->get_total_member();
		$config['per_page'] = $limit;		
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();
		$data['member_list'] = $this->user_model->get_all_members($offset,$limit);
		$data['total_rows'] = $config['total_rows'];
		$data['per_page'] = $limit;
		$data['limit'] = $limit;
		$data['offset'] = $offset;
		
		
		$data['idea']=$this->home_model->get_idea();
		$data['category'] = $this->home_model->get_category();
		$data['gallery']=$this->home_model->get_gallery();
		$data['site_setting'] = site_setting();
		
		$meta = meta_setting();
		$data['searchprj'] = "";
		
		
		$data['header_menu'] = dynamic_menu(0);
		$data['footer_menu'] = dynamic_menu_footer(0);
		$data['right_menu'] = dynamic_menu_right(0);
		
		
		$data['error']="";
		$data['view']="login";
		$data['view']="signup";
		
		$this->home_model->select_text();
		
		$this->template->write('meta_title','Members-'. $meta['title'], TRUE);
		$this->template->write('meta_description','Members-'. $meta['meta_description'], TRUE);
		$this->template->write('meta_keyword','Members-'. $meta['meta_keyword'], TRUE);
		
		$this->template->write_view('header', 'default/header', $data, TRUE);
		$this->template->write_view('main_content', 'default/member_list', $data, TRUE);
		$this->template->write_view('sidebar', 'default/category', $data, TRUE);
		$this->template->write_view('footer', 'default/footer',$data, TRUE);
		$this->template->render();
	}
	
	
	function member_ajax($offset=0)
	{
		$limit = '9';
		$data['total_rows'] = $this->user_model->get_total_member();
		
		$data['per_page'] = $limit;
		$data['offset'] = $offset;
		$data['limit'] = $limit;
		$data['site_setting'] = site_setting();
		$data['member_list'] = $this->user_model->get_all_members($offset, $limit);
		
		$this->load->view('default/member_list_ajax', $data);
	}
	
	
	
	
	
	
	////////////////=================pop up login in any part of site=========================
	
	function login()
	{
		$data['error']="";
		$data['view']="login";
		$data['msg']='';
			
		$this->load->view('default/user_login',$data);	
	}
	
	
	////////////////=================pop up login in any part of site=========================	
	
	function recent_update_user()
	{
		$data['site_setting'] = $this->home_model->select_site_setting();

		$data['donation'] = $this->home_model->get_latest_donations();
		$this->load->view('default/recent_update_user', $data);
	}	
	
	function full_bio_data($id=null,$pid=null)
	{	
		
		//if(!check_user_authentication()) {  redirect('home/login'); } 		  
		
		
		$site_setting=site_setting();
		$user_detail=get_user_detail($id);
		$data['user_detail']=$user_detail;
		$data['user_project_cnt']=count(my_total_project($id));
		$data['user_website']=$this->user_model->get_user_website($user_detail['user_id']);
		$data['num_backers']= $this->user_model->get_my_donations_count();
		$data['current_project']=get_one_project($pid);
		$data['id']=$id;
		$data['last_login']=get_last_login($id);
		
		$this->template->write_view('main_content', 'default/user/user_detail_popup', $data);
		$this->template->render();
	
		
	}
	
	function bio_data($id=null)
	{	
		
		//if(!check_user_authentication()) {  redirect('home/login'); } 		  
		
		
		$site_setting=site_setting();
		$user_detail=get_user_detail($id);
		$data['user_detail']=$user_detail;
		$data['user_website']=$this->user_model->get_user_website($user_detail['user_id']);
		$data['id']=$id;
		$data['last_login']=get_last_login($id);
		$this->template->write_view('main_content', 'default/user/biography', $data);
		$this->template->render();
		
		
	}
	
	function blog($offset=0,$msg='')
	{
	
		 if(!check_user_authentication()) {  redirect('home/login'); } 
		 
		 $uid=get_authenticateUserID();
	
		if($uid=='')
		{
			redirect('user/profiles');
		}
	
		$this->load->library('pagination');
		$limit = '10';
		
		$config['uri_segment']='3';
		$config['base_url'] = base_url().'user/blog/';
		
		
		$config['total_rows'] = $this->user_model->get_user_blog_count();
		
	//print_r($config['total_rows']);
	//die;
		$data['user_blog']=$this->user_model->get_user_blog($offset,$limit);
		$data['blog_category'] = blog_category();
		/*print_r($data['user_blog']);
		die;*/
		
		
		$data['msg']=$msg;
		
	     $data['blog_setting']=blog_setting();
		
		$config['per_page'] = $limit;		
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();
		$data['numprj']=$this->user_model->get_total_my_project();
		$data['num_my_comments']=$this->user_model->get_count_my_comments();
		$data['num_backers']= $this->user_model->get_my_donations_count();
		$data['project'] = $this->home_model->get_dashboard_project();
		
		//print_r($data['page_link']);
		//die;
		$data['site_setting'] = site_setting();
		$data['blog_category']=get_blog_catregory();
		$data['offset']=$offset;
		$data['limit']=$limit;
		
		$meta = meta_setting();
		$this->home_model->select_text();
		$this->template->write('meta_title','Blogs-'. $meta['title'], TRUE);
		$this->template->write('meta_description', $meta['meta_description'], TRUE);
		$this->template->write('meta_keyword', $meta['meta_keyword'], TRUE);
		
		$this->template->write_view('header', 'default/common/header_login',  $data, TRUE);
		$this->template->write_view('center_content', 'default/user/user_blog', $data, TRUE);
		$this->template->write_view('footer', 'default/common/footer',$data, TRUE);
		$this->template->render();
	}
	
	function add_blog()
	{
	   	$this->user_model->blog_insert();
	    $offset=$this->input->post('offset');
	    $limit=$this->input->post('limit');
	    $msg='insert';
	    redirect('user/blog/'.$offset.'/'.$msg);
	}
	function edit_blog()
	{
	   
	   $offset=$this->input->post('offset');
	   $limit=$this->input->post('limit');
	   //print_r($_POST);die();
	   $update_blog=array('blog_title'=>$this->input->post('blog_title'),
	                      'blog_discription'=>$this->input->post('blog_discription'),
						  'blog_category'=>$this->input->post('blog_category'),
						  'publish'=>$this->input->post('publish'),
						  'no_one_comment'=>$this->input->post('no_one_comment'),
						  'user_id'=>$this->session->userdata('user_id'),
						  'status'=>$this->input->post('status'));
			
		//	print_r($update_blog);
			//die;			  
	       $this->db->where('blog_id',$this->input->post('blog_id'));
		   $this->db->update('blogs',$update_blog);
		   $msg='update';		
		   redirect('user/blog/'.$offset.'/'.$msg);
	}
	function delete_blog($id=0,$offset=0)
	{
	    $msg='delete';
		$this->db->delete('blogs',array('blog_id'=>$id));
	    redirect('user/blog/'.$offset.'/'.$msg);
				
	}
	
}
?>