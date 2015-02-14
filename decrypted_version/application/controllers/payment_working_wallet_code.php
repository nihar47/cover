<?php



/* * *******************************************************************************

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

 * ****************************************************************************** */



class Payment extends ROCKERS_Controller {



    function Payment() {

        parent::__construct();



        $this->load->model('project_model');

        $this->load->model('user_model');

        $this->load->model('home_model');

        $this->load->model('payment_model');

        $this->load->library('paypal_lib');

        $this->load->model('wallet_model');

    }



    function index() {



        redirect('home/index');

    }



    function add_fund_confirm($post_id = null, $post_amount = null, $post_perk_id = 0, $post_gateway = '', $post_anonymous = 0, $currency='', $post_email = '', $cardnumber = '', $cvv2Number = '', $cardtype = '', $card_expiration_month = '', $card_expiration_year = '', $card_first_name = '', $card_last_name = '', $card_address = '', $card_city = '', $card_state = '', $card_zipcode = '') {
	
 		
        $site_setting = site_setting();

        $amazons = amazon_detail();

        $paypal = adaptive_paypal_detail();

        $wallet_setting = wallet_setting();

        //$total_wallet_amount = $this->home_model->my_wallet_amount();

        $credit_card_setting = credit_card_setting();
//print_r($credit_card_setting);exit;
        //$payments_gateways = payments_gateways();




	


        $post_docomment = 'do_comment';


		$currency = $this->db->get_where('currency_code',array('currency_code' => $currency));
		if ($currency->num_rows() > 0) {
		
			$currency = $currency->row();
			$currency_symbol= $currency->currency_symbol;
			$currency_code= $currency->currency_code;
		} 


        $this->form_validation->set_rules('post_id', 'post id', 'required|integer');



        if ($this->form_validation->run() == FALSE) {



            $data['post_id'] = $post_id;

            $data['post_amount'] = $post_amount;

            $data['post_perk_id'] = $post_perk_id;

            $data['post_gateway'] = $post_gateway;

            $data['post_anonymous'] = $post_anonymous;

            $data['post_email'] = $post_email;

            $data['site_setting'] = $site_setting;

			$data['currency_symbol'] = $currency_symbol;



            $data['cardnumber'] = $cardnumber;

            $data['cvv2Number'] = $cvv2Number;

            $data['cardtype'] = $cardtype;

            $data['card_expiration_month'] = $card_expiration_month;

            $data['card_expiration_year'] = $card_expiration_year;



            $data['card_first_name'] = $card_first_name;

            $data['card_last_name'] = $card_last_name;

            $data['card_address'] = $card_address;

            $data['card_city'] = $card_city;

            $data['card_state'] = $card_state;

            $data['card_zipcode'] = $card_zipcode;


//echo '<pre>';print_r($data);


            $data['project'] = get_one_project($post_id);

            $this->load->view('default/add_fund_confirm', $data);

        } else {





            if ($this->input->post('cancel')) {



                redirect('home/');

            } else {









                $post_id = $this->input->post('post_id');

                $post_amount = $this->input->post('post_amount');

                $post_perk_id = $this->input->post('post_perk_id');

                $post_gateway = $this->input->post('post_gateway');

                //$post_gateway = 'paypal';

                $post_anonymous = $this->input->post('post_anonymous');

                $post_email = $this->input->post('post_email');



             



                $facebook = $this->input->post('facebook');

                $twitter = $this->input->post('twitter');

//    echo '<pre>';
//print_r($_POST);
                if ($site_setting['currency_code'] != '') {

                    $currency_code = $site_setting['currency_code'];

                } else {

                    $currency_code = 'USD';

                }









                $login_user = get_user_detail($this->session->userdata('user_id'));



                if ($login_user['paypal_email'] == '') {

                    

                }









                $prj = $this->project_model->get_project_user($post_id);
				
				

                //$meta = site_setting();

            //    print_r($prj);

                $user_detail = get_user_detail($prj['user_id']);

            //    print_r($user_detail);
            //    die();

                $donar_name = $login_user['user_name'];

                $donar_email = $login_user['email'];



                $payee_email = $post_email;



                //$donar_id = $this->session->userdata('user_id');



                $donar_amount = $post_amount;



                $project_id = $prj['project_id'];

                $project_title = $prj['project_title'];

                $url_project_title = $prj['url_project_title'];

                $project_owner_email = $user_detail['paypal_email'];



                $project_create_name = $user_detail['user_name'] . ' ' . $user_detail['last_name'];











                if ($post_perk_id == '' || $post_perk_id == 0) {

                    $perk_id = 0;           ////===user selected perk id

                } else {

                    $perk_id = $post_perk_id;       ////===user selected perk id

                }





                ///////===user enable for which gateway=========	



                if ($user_detail['amazon_token_id'] != '') {

                    $user_amazon = 1;

                }

                if ($user_detail['amazon_token_id'] == '') {

                    $user_amazon = 0;

                }







                if ($user_detail['paypal_email'] != '') {

                    $user_paypal = 1;

                }

                if ($user_detail['paypal_email'] == '') {

                    $user_paypal = 0;

                }





                ///////===user enable for which gateway=========

                ///////========*****************========PAYMENT PROCESS====================************===============		






                if ($post_gateway == 'wallet') {



                    $project_id = $prj['project_id'];

                    $donar_amount = $post_amount;

                    $donar_comment = $post_docomment;

                    $perk_id = $post_perk_id;

                    $pay_fee = 0;

                    $anonymous = $post_anonymous;



                    //$wallet_gateway = $post_email;





                    $total_wallet_amount = $this->home_model->my_wallet_amount();  //debit-credit from wallet



                    $login_user = get_user_detail($this->session->userdata('user_id'));


					


                   // if (number_format($donar_amount, 2) > number_format($total_wallet_amount, 2) and $wallet_setting->direct_donation_option == '1') 
				   
				   if (number_format($donar_amount, 2) > 0 ){


                        $gateway_id = $post_email;

						 $total = number_format($donar_amount, 2);
						 
                        /*if ($wallet_setting->add_whole_amount == '1') {

                            $total = number_format($donar_amount, 2);

                        } else {

                            $total = number_format($donar_amount, 2) - number_format($total_wallet_amount, 2);

                        }*/



                        if ($facebook != '1') {

                            $facebook = 0;

                        }

                        if ($twitter != '1') {

                            $twitter = 0;

                        }



                        $pay = "";

                        $pay_id = '';



                        if ($gateway_id == '1') {

                            $pay = 'paypal';

                            $pay_id = 1;

                        } elseif ($gateway_id == '2') {

                            $pay = 'interswitch';

                            $pay_id = 2;

                        } elseif ($gateway_id == '3') {

                            $pay = 'bank';

                            $pay_id = 3;

                        }


                        //$pay=$this->wallet_model->get_paymentact_one($wallet_gateway);	

                 //$this->donate_through_wallet(trim($pay['function_name']),$pay['id'],$total,$donar_amount,$donar_comment,$perk_id,$anonymous);


                        redirect('payment/donate_' . $pay . '/' . $pay_id . '/' . str_replace(',', '', $total) . '/' . $project_id . '/' . str_replace(',', '', $donar_amount) . '/' . $donar_comment . '/' . $perk_id . '/' . $anonymous . '/' . $facebook . '/' . $twitter);

                    }
					
					die;







                    $login_user = get_user_detail($this->session->userdata('user_id'));





                    ///////========if PREAPPROVAL IS ACTIVE FOR WALLET	

                    if ($wallet_setting->wallet_payment_type == '1') {

                        $donate_status = '0';

                        $wallet_payment_status = '0';

                    } else {

                        $donate_status = '1';

                        $wallet_payment_status = '1';

                    }



                    $trw2 = 'FS' . randomNumber(10);









                    $insert = $this->db->query("insert into transaction (`user_id`,`project_id`,`perk_id`,`amount`,`listing_fee`,`pay_fee`,`email`,`host_ip`,`paypal_email`,`comment`,`transaction_date_time`,`wallet_transaction_id`,`wallet_payment_status`,`trans_anonymous`,`is_confirm`)values('" . $this->session->userdata('user_id') . "','" . $project_id . "','" . $perk_id . "','" . $donar_amount . "','0','" . $pay_fee . "','" . $login_user['email'] . "','" . $_SERVER['REMOTE_ADDR'] . "','" . $login_user['email'] . "','" . $donar_comment . "','" . date("Y-m-d H:i:s") . "','" . $trw2 . "','" . $wallet_payment_status . "','" . $anonymous . "','1')");



                    $last_transaction_id = mysql_insert_id();





                    $get_don_project = $this->db->get_where('project', array('project_id' => $project_id));

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

                    $this->db->update('project', $data_don);







                    if ($perk_id != '' && $perk_id != '0') {



                        $query = $this->db->get_where('perk', array('perk_id' => $perk_id));

                        $pk = $query->row_array();

                        $data = array(

                            'perk_get' => ($pk['perk_get'] * 1) + 1,

                        );

                        $this->db->where('perk_id', $perk_id);

                        $this->db->update('perk', $data);

                    }













                    if ($wallet_setting->wallet_payment_type == '0') {



                        ///////////==========affiliate earn=============



                        $affiliate_setting = affiliate_setting();



                        if ($affiliate_setting->affiliate_enable == 1) {





                            $pledge_commission = affiliate_commission_setting(2);









                            ////======project owner is referral user then all/one pledge goes to referral



                            /* if($prj['reference_user_id']!='' && $prj['reference_user_id']>0)

                              {

                              $get_affiliate_user=get_user_detail($prj['reference_user_id']);



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

                              $final_pledge_fee=($donar_amount*$pledge_commission_fee)/100;

                              }

                              else

                              {

                              $final_pledge_fee=$pledge_commission_fee;

                              }





                              $earn_data=array(

                              'user_id'=>$get_affiliate_user['user_id'],

                              'project_id'=>$project_id,

                              'perk_id'=>$perk_id,

                              'transaction_id'=>$last_transaction_id,

                              'earn_amount'=>$final_pledge_fee,

                              'earn_date'=>date('Y-m-d H:i:s'),

                              'earn_status'=>0

                              );

                              $this->db->insert('affiliate_user_earn',$earn_data);





                              }



                              }





                              }





                              } */







                            ////======donor is referral user then all/one pledge goes to referral



                            if ($login_user['reference_user_id'] != '' && $login_user['reference_user_id'] > 0) {

                                $get_affiliate_user = get_user_detail($login_user['reference_user_id']);



                                if ($get_affiliate_user) {



                                    ///===get commission amount and add to user earn table with pending status





                                    if ($pledge_commission) {



                                        $pledge_commission_fee = $pledge_commission->commission;



                                        if ($pledge_commission_fee > 0) {



                                            if ($pledge_commission->type == '%') {

                                                $final_pledge_fee = ($donar_amount * $pledge_commission_fee) / 100;

                                            } else {

                                                $final_pledge_fee = $pledge_commission_fee;

                                            }







                                            ////=======check one time or every time payment enable



                                            if ($affiliate_setting->pay_commission_pledge == 1) {



                                                $earn_data = array(

                                                    'user_id' => $get_affiliate_user['user_id'],

                                                    'project_id' => $project_id,

                                                    'perk_id' => $perk_id,

                                                    'transaction_id' => $last_transaction_id,

                                                    'earn_amount' => $final_pledge_fee,

                                                    'earn_date' => date('Y-m-d H:i:s'),

                                                    'earn_status' => 0

                                                );

                                                $this->db->insert('affiliate_user_earn', $earn_data);

                                            } else {



                                                $affiliate_user_id = $get_affiliate_user['user_id'];



                                                $check_user_already_get_commission = check_user_one_time_commission($affiliate_user_id, $project_id);



                                                if ($check_user_already_get_commission == 0) {

                                                    $earn_data = array(

                                                        'user_id' => $get_affiliate_user['user_id'],

                                                        'project_id' => $project_id,

                                                        'perk_id' => $perk_id,

                                                        'transaction_id' => $last_transaction_id,

                                                        'earn_amount' => $final_pledge_fee,

                                                        'earn_date' => date('Y-m-d H:i:s'),

                                                        'earn_status' => 0

                                                    );

                                                    $this->db->insert('affiliate_user_earn', $earn_data);

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

                    }





                    $trw = 'FS' . randomNumber(10);



//	



                    $owner_amount = $donar_amount;



                    ////////====if INSTANT then cut fees 

//if($site_setting['enable_funding_option'] =='0' and $don_prj['payment_type'] =='0' and $wallet_setting->wallet_payment_type=='0')



                    if ($wallet_setting->wallet_payment_type == '0') {

                        $owner_amount = $donar_amount * $site_setting['instant_fees'] / 100;

                    }

                    $update_donor_wallet = $this->db->query("insert into wallet(`credit`,`user_id`,`admin_status`,`wallet_date`,`wallet_transaction_id`,`wallet_payee_email`,`wallet_ip`,`gateway_id`,`project_id`,`donate_status`,`wallet_anonymous`)values('" . $donar_amount . "','" . $this->session->userdata('user_id') . "','Confirm','" . date("Y-m-d H:i:s") . "','" . $trw2 . "','Internal','" . $_SERVER['REMOTE_ADDR'] . "','0','" . $project_id . "','" . $donate_status . "','" . $anonymous . "')");





                    $insert_owner_wallet = $this->db->query("insert into wallet(`debit`,`user_id`,`admin_status`,`wallet_date`,`wallet_transaction_id`,`wallet_payee_email`,`wallet_ip`,`gateway_id`,`project_id`,`donate_status`,`wallet_anonymous`)values('" . $owner_amount . "','" . $prj['user_id'] . "','Confirm','" . date("Y-m-d H:i:s") . "','" . $trw2 . "','Internal','" . $_SERVER['REMOTE_ADDR'] . "','0','" . $project_id . "','" . $donate_status . "','" . $anonymous . "')");



                                    



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

                    ////// share on facebook 





                    $project_share_link = site_url('projects/' . $prj['url_project_title'] . '/' . $prj['project_id']);



                    if ($project['image'] != '' && is_file("upload/thumb/" . $project['image'])) {

                        $image = base_url() . 'upload/thumb/' . $project['image'];

                    } else {





                        $get_gallery = $this->project_model->get_all_project_gallery($project['project_id']);



                        $grcnt = 1;



                        if ($get_gallery) {

                            foreach ($get_gallery as $glr) {



                                if ($glr->project_image != '' && is_file('upload/thumb/' . $glr->project_image) && $grcnt == 1) {

                                    $image = base_url() . 'upload/thumb/' . $glr->project_image;





                                    $grcnt = 2;

                                }

                            }

                        } elseif ($grcnt == 1) {

                            $image = base_url() . 'images/no_img.jpg';

                        } else {

                            $image = base_url() . 'images/no_img.jpg';

                        }

                    }





                    $msg = $prj['project_title'];

                    

                    

                    



                    if ($login_user['fb_uid'] != '' and $facebook == '1' and $login_user['fb_access_token'] != '') {



                        $fbAccessToken = $login_user['fb_access_token'];

                        $publishStream = $this->fb_connect->publish($login_user['fb_uid'], array(

                            'access_token' => $fbAccessToken,

                            'link' => $project_share_link,

                            'picture' => $image,

                            'name' => "Donation on " . $prj['project_title'],

                            'description' => $prj['project_summary']

                                )

                        );

                    }



                    if ($prj['fb_uid'] != '' and $prj['facebook_wall_post'] == '1' and $prj['fb_access_token'] != '') {



                        $fbAccessToken = $prj['fb_access_token'];

                        $publishStream = $this->fb_connect->publish($prj['fb_uid'], array(

                            'access_token' => $fbAccessToken,

                            'link' => $project_share_link,

                            'picture' => $image,

                            'name' => "Donation on " . $prj['project_title'],

                            'description' => $prj['project_summary']

                                )

                        );

                    }



                    if ($facebook_setting->facebook_user_id != '' and $facebook_setting->facebook_wall_post == '1' and $facebook_setting->facebook_access_token != '') {



                        $fbAccessToken = $facebook_setting->facebook_access_token;

                        $publishStream = $this->fb_connect->publish($facebook_setting->facebook_user_id, array(

                            'access_token' => $fbAccessToken,

                            'link' => $project_share_link,

                            'picture' => $image,

                            'name' => "Donation on " . $prj['project_title'],

                            'description' => $prj['project_summary']

                                )

                        );

                    }







                    //////facebook end 	

                    /////////share on twitter 



                    $project_share_link = site_url('projects/' . $prj['url_project_title'] . '/' . $prj['project_id']);

                    $twitter_setting = twitter_setting();

                    $consumerKey = $twitter_setting->consumer_key;

                    $consumerSecret = $twitter_setting->consumer_secret;

                    $OAuthToken = $login_user['tw_oauth_token'];

                    $OAuthSecret = $login_user['tw_oauth_token_secret'];



                    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);

                    try {

                        if ($login_user['tw_oauth_token'] != '0' and $login_user['tw_oauth_token_secret'] != '0' and $twitter == '1') {

                            // Insert your keys/tokens





                            $consumerKey = $twitter_setting->consumer_key;

                            $consumerSecret = $twitter_setting->consumer_secret;

                            $OAuthToken = $login_user['tw_oauth_token'];

                            $OAuthSecret = $login_user['tw_oauth_token_secret'];



                            // Full path to twitterOAuth.php (change OAuth to your own path)

                            $this->load->library('twitteroauth');

                            //require_once($_SERVER['DOCUMENT_ROOT'].'OAuth/twitteroauth.php');

                            // create new instance

                            $tweet = new TwitterOAuth($consumerKey, $consumerSecret, $OAuthToken, $OAuthSecret);



                            // Your Message

                            $message = date("Y-m-d H:i:s") . "New Donation on - " . $prj['project_title'] . " Take a look from here - " . $project_share_link;



                            // Send tweet 

                            $tweet->post('statuses/update', array('status' => "$message"));

                        }

                    } catch (Exception $e) {

                        return;

                    }





                    try {

                        if ($prj['tw_oauth_token'] != '0' and $prj['tw_oauth_token_secret'] != '0' and $prj['autopost_site'] == '1') {

                            // Insert your keys/tokens





                            $consumerKey = $twitter_setting->consumer_key;

                            $consumerSecret = $twitter_setting->consumer_secret;

                            $OAuthToken = $prj['tw_oauth_token'];

                            $OAuthSecret = $prj['tw_oauth_token_secret'];



                            // Full path to twitterOAuth.php (change OAuth to your own path)

                            $this->load->library('twitteroauth');

                            //require_once($_SERVER['DOCUMENT_ROOT'].'OAuth/twitteroauth.php');

                            // create new instance

                            $tweet = new TwitterOAuth($consumerKey, $consumerSecret, $OAuthToken, $OAuthSecret);



                            // Your Message

                            $message = date("Y-m-d H:i:s") . "New Donation on - " . $prj['project_title'] . " Take a look from here - " . $project_share_link;



                            // Send tweet 

                            $tweet->post('statuses/update', array('status' => "$message"));

                        }

                    } catch (Exception $e) {

                        return;

                    }





                    try {

                        if ($twitter_setting->tw_oauth_token != '0' and $twitter_setting->tw_oauth_token_secret != '0' and $twitter_setting->autopost_site == '1') {

                            // Insert your keys/tokens





                            $consumerKey = $twitter_setting->consumer_key;

                            $consumerSecret = $twitter_setting->consumer_secret;

                            $OAuthToken = $twitter_setting->tw_oauth_token;

                            $OAuthSecret = $twitter_setting->tw_oauth_token_secret;



                            // Full path to twitterOAuth.php (change OAuth to your own path)

                            $this->load->library('twitteroauth');

                            //require_once($_SERVER['DOCUMENT_ROOT'].'OAuth/twitteroauth.php');

                            // create new instance

                            $tweet = new TwitterOAuth($consumerKey, $consumerSecret, $OAuthToken, $OAuthSecret);



                            // Your Message

                            $message = date("Y-m-d H:i:s") . "New Donation on - " . $prj['project_title'] . " Take a look from here - " . $project_share_link;



                            // Send tweet 

                            $tweet->post('statuses/update', array('status' => "$message"));

                        }

                    } catch (Exception $e) {

                        return;

                    }





                    /////////// twitter end 	

                    ///////////============admin alert==========



                                



                    $email_template = $this->db->query("select * from `email_template` where task='New Fund Admin Notification'");

                    $email_temp = $email_template->row();



                    if ($email_temp) {

                        $email_message = $email_temp->message;

                        $email_subject = $email_temp->subject;

                        $email_address_from = $email_temp->from_address;

                        $email_address_reply = $email_temp->reply_address;

                        $email_to = $email_address_from;



                        $email_message = str_replace('{break}', '<br/>', $email_message);

                        $email_message = str_replace('{user_name}', $username, $email_message);

                        $email_message = str_replace('{project_name}', $project_name, $email_message);

                        $email_message = str_replace('{donor_name}', $donor_name, $email_message);

                        $email_message = str_replace('{donote_amount}', $donote_amount, $email_message);

                        $email_message = str_replace('{donor_profile_link}', $donor_profile_link, $email_message);

                        $email_message = str_replace('{project_page_link}', $project_page_link, $email_message);



                        $str = $email_message;



                        email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);

                    }

                    ///////=================owner alert===================



                    $user_not = $this->user_model->get_email_notification($prj['user_id']);



                    if ($user_not->add_fund == '1') {



                        $email_template = $this->db->query("select * from `email_template` where task='New Fund Owner Notification'");

                        $email_temp = $email_template->row();



                        if ($email_temp) {

                            $email_message = $email_temp->message;

                            $email_subject = $email_temp->subject;

                            $email_address_from = $email_temp->from_address;

                            $email_address_reply = $email_temp->reply_address;

                            $email_to = $project_owner_email;





                            $email_message = str_replace('{break}', '<br/>', $email_message);

                            $email_message = str_replace('{user_name}', $username, $email_message);

                            $email_message = str_replace('{project_name}', $project_name, $email_message);

                            if ($anonymous == '2') {

                                $email_message = str_replace('{donor_name}', $donor_name, $email_message);

                                $email_message = str_replace('{donote_amount}', 'Anonymous amount', $email_message);

                                $email_message = str_replace('{donor_profile_link}', $donor_profile_link, $email_message);

                            } elseif ($anonymous == '3') {

                                $email_message = str_replace('{donor_name}', 'Anonymous donar', $email_message);

                                $email_message = str_replace('{donote_amount}', 'Anonymous amount', $email_message);

                                $email_message = str_replace('{donor_profile_link}', '', $email_message);

                            } else {

                                $email_message = str_replace('{donor_name}', $donor_name, $email_message);

                                $email_message = str_replace('{donote_amount}', $donote_amount, $email_message);

                                $email_message = str_replace('{donor_profile_link}', $donor_profile_link, $email_message);

                            }

                            $email_message = str_replace('{project_page_link}', $project_page_link, $email_message);





                            $str = $email_message;



                            email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);

                        }

                    }



                    /////////////////==============donor alert================================





                    $user_not_donor = $this->user_model->get_email_notification($this->session->userdata('user_id'));



                    if ($user_not_donor->add_fund == '1') {





                        $email_template = $this->db->query("select * from `email_template` where task='New Fund Donor Notification'");

                        $email_temp = $email_template->row();



                        if ($email_temp) {

                            $email_message = $email_temp->message;

                            $email_subject = $email_temp->subject;

                            $email_address_from = $email_temp->from_address;

                            $email_address_reply = $email_temp->reply_address;

                            $email_to = $donar_email;



                            $email_message = str_replace('{break}', '<br/>', $email_message);

                            $email_message = str_replace('{user_name}', $username, $email_message);

                            $email_message = str_replace('{project_name}', $project_name, $email_message);

                            $email_message = str_replace('{donor_name}', $donor_name, $email_message);

                            $email_message = str_replace('{donote_amount}', $donote_amount, $email_message);

                            $email_message = str_replace('{donor_profile_link}', $donor_profile_link, $email_message);

                            $email_message = str_replace('{project_page_link}', $project_page_link, $email_message);





                            $str = $email_message;

                            email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);

                        }

                    }



                    redirect('home/index/done');

                } ////////end wallet

                /////////////////////////////end wallet add transaction

                //////////////=======credit card=========

                elseif ($post_gateway == 'credit') {

















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






                    /**

                     * Get required parameters from the web form for the request

                     */

                    $project_id = $prj['project_id'];

                    $donar_amount = $post_amount;

                    $donar_comment = $post_docomment;

                    $perk_id = $post_perk_id;

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

                    /*   echo "<pre>";

                      print_r($resArray);

                      exit; */



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

                        $this->load->view('default/paypal_error', $data);

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



                            $insert_owner_wallet = $this->db->query("insert into wallet(`debit`,`user_id`,`admin_status`,`wallet_date`,`wallet_transaction_id`,`wallet_payee_email`,`wallet_ip`,`gateway_id`,`project_id`,`donate_status`,`wallet_anonymous`)values('" . $owner_amount . "','" . $prj['user_id'] . "','Confirm','" . date("Y-m-d H:i:s") . "','" . $trw2 . "','Credit Card','" . $_SERVER['REMOTE_ADDR'] . "','0','" . $vals['item_number'] . "','" . $donate_status . "','" . $anonymous . "')");



                            $insert = $this->db->query("insert into transaction (`user_id`,`project_id`,`perk_id`,`amount`,`listing_fee`,`pay_fee`,`email`,`host_ip`,`paypal_email`,`comment`,`transaction_date_time`,`trans_anonymous`,`credit_card_transaction_id`,`credit_card_payment_status`)values('" . $this->session->userdata('user_id') . "','" . $project_id . "','" . $perk_id . "','" . $original_amount . "','0','" . $pay_fee . "','" . $login_user['email'] . "','" . $_SERVER['REMOTE_ADDR'] . "','" . $login_user['email'] . "','" . $donar_comment . "','" . date("Y-m-d H:i:s") . "','" . $anonymous . "','" . $txnid . "','" . $credit_payment_status . "')");



                            $last_transaction_id = mysql_insert_id();





                            $get_don_project = $this->db->get_where('project', array('project_id' => $project_id));

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

                            $this->db->update('project', $data_don);







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

                            if ($credit_card_setting->credit_card_preapproval == 0) {

                                $affiliate_setting = affiliate_setting();



                                if ($affiliate_setting->affiliate_enable == 1) {





                                    $pledge_commission = affiliate_commission_setting(2);





                                    ////======donor is referral user then all/one pledge goes to referral



                                    if ($login_user['reference_user_id'] != '' && $login_user['reference_user_id'] > 0) {

                                        $get_affiliate_user = get_user_detail($login_user['reference_user_id']);



                                        if ($get_affiliate_user) {



                                            ///===get commission amount and add to user earn table with pending status





                                            if ($pledge_commission) {



                                                $pledge_commission_fee = $pledge_commission->commission;



                                                if ($pledge_commission_fee > 0) {



                                                    if ($pledge_commission->type == '%') {

                                                        $final_pledge_fee = ($donar_amount * $pledge_commission_fee) / 100;

                                                    } else {

                                                        $final_pledge_fee = $pledge_commission_fee;

                                                    }







                                                    ////=======check one time or every time payment enable



                                                    if ($affiliate_setting->pay_commission_pledge == 1) {



                                                        $earn_data = array(

                                                            'user_id' => $get_affiliate_user['user_id'],

                                                            'project_id' => $project_id,

                                                            'perk_id' => $perk_id,

                                                            'transaction_id' => $last_transaction_id,

                                                            'earn_amount' => $final_pledge_fee,

                                                            'earn_date' => date('Y-m-d H:i:s'),

                                                            'earn_status' => 0

                                                        );

                                                        $this->db->insert('affiliate_user_earn', $earn_data);

                                                    } else {



                                                        $affiliate_user_id = $get_affiliate_user['user_id'];



                                                        $check_user_already_get_commission = check_user_one_time_commission($affiliate_user_id, $project_id);



                                                        if ($check_user_already_get_commission == 0) {

                                                            $earn_data = array(

                                                                'user_id' => $get_affiliate_user['user_id'],

                                                                'project_id' => $project_id,

                                                                'perk_id' => $perk_id,

                                                                'transaction_id' => $last_transaction_id,

                                                                'earn_amount' => $final_pledge_fee,

                                                                'earn_date' => date('Y-m-d H:i:s'),

                                                                'earn_status' => 0

                                                            );

                                                            $this->db->insert('affiliate_user_earn', $earn_data);

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

                            ////// share on facebook 





                            $project_share_link = site_url('projects/' . $prj['url_project_title'] . '/' . $prj['project_id']);



                            if ($project['image'] != '' && is_file("upload/thumb/" . $project['image'])) {

                                $image = base_url() . 'upload/thumb/' . $project['image'];

                            } else {





                                $get_gallery = $this->project_model->get_all_project_gallery($project['project_id']);



                                $grcnt = 1;



                                if ($get_gallery) {

                                    foreach ($get_gallery as $glr) {



                                        if ($glr->project_image != '' && is_file('upload/thumb/' . $glr->project_image) && $grcnt == 1) {

                                            $image = base_url() . 'upload/thumb/' . $glr->project_image;





                                            $grcnt = 2;

                                        }

                                    }

                                } elseif ($grcnt == 1) {

                                    $image = base_url() . 'images/no_img.jpg';

                                } else {

                                    $image = base_url() . 'images/no_img.jpg';

                                }

                            }





                            $msg = $prj['project_title'];



                            if ($login_user['fb_uid'] != '' and $facebook == '1' and $login_user['fb_access_token'] != '') {



                                $fbAccessToken = $login_user['fb_access_token'];

                                $publishStream = $this->fb_connect->publish($login_user['fb_uid'], array(

                                    'access_token' => $fbAccessToken,

                                    'link' => $project_share_link,

                                    'picture' => $image,

                                    'name' => "Donation on " . $prj['project_title'],

                                    'description' => $prj['project_summary']

                                        )

                                );

                            }



                            if ($prj['fb_uid'] != '' and $prj['facebook_wall_post'] == '1' and $prj['fb_access_token'] != '') {



                                $fbAccessToken = $prj['fb_access_token'];

                                $publishStream = $this->fb_connect->publish($prj['fb_uid'], array(

                                    'access_token' => $fbAccessToken,

                                    'link' => $project_share_link,

                                    'picture' => $image,

                                    'name' => "Donation on " . $prj['project_title'],

                                    'description' => $prj['project_summary']

                                        )

                                );

                            }



                            if ($facebook_setting->facebook_user_id != '' and $facebook_setting->facebook_wall_post == '1' and $facebook_setting->facebook_access_token != '') {



                                $fbAccessToken = $facebook_setting->facebook_access_token;

                                $publishStream = $this->fb_connect->publish($facebook_setting->facebook_user_id, array(

                                    'access_token' => $fbAccessToken,

                                    'link' => $project_share_link,

                                    'picture' => $image,

                                    'name' => "Donation on " . $prj['project_title'],

                                    'description' => $prj['project_summary']

                                        )

                                );

                            }







                            //////facebook end 	

                            /////////share on twitter 



                            $project_share_link = site_url('projects/' . $prj['url_project_title'] . '/' . $prj['project_id']);

                            $twitter_setting = twitter_setting();

                            $consumerKey = $twitter_setting->consumer_key;

                            $consumerSecret = $twitter_setting->consumer_secret;

                            $OAuthToken = $login_user['tw_oauth_token'];

                            $OAuthSecret = $login_user['tw_oauth_token_secret'];



                            error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);

                            try {

                                if ($login_user['tw_oauth_token'] != '0' and $login_user['tw_oauth_token_secret'] != '0' and $twitter == '1') {

                                    // Insert your keys/tokens





                                    $consumerKey = $twitter_setting->consumer_key;

                                    $consumerSecret = $twitter_setting->consumer_secret;

                                    $OAuthToken = $login_user['tw_oauth_token'];

                                    $OAuthSecret = $login_user['tw_oauth_token_secret'];



                                    // Full path to twitterOAuth.php (change OAuth to your own path)

                                    $this->load->library('twitteroauth');

                                    //require_once($_SERVER['DOCUMENT_ROOT'].'OAuth/twitteroauth.php');

                                    // create new instance

                                    $tweet = new TwitterOAuth($consumerKey, $consumerSecret, $OAuthToken, $OAuthSecret);



                                    // Your Message

                                    $message = date("Y-m-d H:i:s") . "New Donation on - " . $prj['project_title'] . " Take a look from here - " . $project_share_link;



                                    // Send tweet 

                                    $tweet->post('statuses/update', array('status' => "$message"));

                                }

                            } catch (Exception $e) {

                                return;

                            }





                            try {

                                if ($prj['tw_oauth_token'] != '0' and $prj['tw_oauth_token_secret'] != '0' and $prj['autopost_site'] == '1') {

                                    // Insert your keys/tokens





                                    $consumerKey = $twitter_setting->consumer_key;

                                    $consumerSecret = $twitter_setting->consumer_secret;

                                    $OAuthToken = $prj['tw_oauth_token'];

                                    $OAuthSecret = $prj['tw_oauth_token_secret'];



                                    // Full path to twitterOAuth.php (change OAuth to your own path)

                                    $this->load->library('twitteroauth');

                                    //require_once($_SERVER['DOCUMENT_ROOT'].'OAuth/twitteroauth.php');

                                    // create new instance

                                    $tweet = new TwitterOAuth($consumerKey, $consumerSecret, $OAuthToken, $OAuthSecret);



                                    // Your Message

                                    $message = date("Y-m-d H:i:s") . "New Donation on - " . $prj['project_title'] . " Take a look from here - " . $project_share_link;



                                    // Send tweet 

                                    $tweet->post('statuses/update', array('status' => "$message"));

                                }

                            } catch (Exception $e) {

                                return;

                            }



                            try {


                                if ($twitter_setting->tw_oauth_token != '0' and $twitter_setting->tw_oauth_token_secret != '0' and $twitter_setting->autopost_site == '1') {

                                    // Insert your keys/tokens





                                    $consumerKey = $twitter_setting->consumer_key;

                                    $consumerSecret = $twitter_setting->consumer_secret;

                                    $OAuthToken = $twitter_setting->tw_oauth_token;

                                    $OAuthSecret = $twitter_setting->tw_oauth_token_secret;



                                    // Full path to twitterOAuth.php (change OAuth to your own path)

                                    $this->load->library('twitteroauth');

                                    //require_once($_SERVER['DOCUMENT_ROOT'].'OAuth/twitteroauth.php');

                                    // create new instance

                                    $tweet = new TwitterOAuth($consumerKey, $consumerSecret, $OAuthToken, $OAuthSecret);



                                    // Your Message

                                    $message = date("Y-m-d H:i:s") . "New Donation on - " . $prj['project_title'] . " Take a look from here - " . $project_share_link;



                                    // Send tweet 

                                    $tweet->post('statuses/update', array('status' => "$message"));

                                }

                            } catch (Exception $e) {

                                return;

                            }





                            /////////// twitter end 

                            ///////////============admin alert==========







                            $email_template = $this->db->query("select * from `email_template` where task='New Fund Admin Notification'");

                            $email_temp = $email_template->row();



                            if ($email_temp) {

                                $email_message = $email_temp->message;

                                $email_subject = $email_temp->subject;

                                $email_address_from = $email_temp->from_address;

                                $email_address_reply = $email_temp->reply_address;

                                $email_to = $email_address_from;



                                $email_message = str_replace('{break}', '<br/>', $email_message);

                                $email_message = str_replace('{user_name}', $username, $email_message);

                                $email_message = str_replace('{project_name}', $project_name, $email_message);

                                $email_message = str_replace('{donor_name}', $donor_name, $email_message);

                                $email_message = str_replace('{donote_amount}', $donote_amount, $email_message);

                                $email_message = str_replace('{donor_profile_link}', $donor_profile_link, $email_message);

                                $email_message = str_replace('{project_page_link}', $project_page_link, $email_message);



                                $str = $email_message;



                                email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);

                            }



                            ///////=================owner alert===================



                            $user_not = $this->user_model->get_email_notification($prj['user_id']);



                            if ($user_not->add_fund == '1') {



                                $email_template = $this->db->query("select * from `email_template` where task='New Fund Owner Notification'");

                                $email_temp = $email_template->row();



                                if ($email_temp) {

                                    $email_message = $email_temp->message;

                                    $email_subject = $email_temp->subject;

                                    $email_address_from = $email_temp->from_address;

                                    $email_address_reply = $email_temp->reply_address;

                                    $email_to = $project_owner_email;





                                    $email_message = str_replace('{break}', '<br/>', $email_message);

                                    $email_message = str_replace('{user_name}', $username, $email_message);

                                    $email_message = str_replace('{project_name}', $project_name, $email_message);

                                    if ($anonymous == '2') {

                                        $email_message = str_replace('{donor_name}', $donor_name, $email_message);

                                        $email_message = str_replace('{donote_amount}', 'Anonymous amount', $email_message);

                                        $email_message = str_replace('{donor_profile_link}', $donor_profile_link, $email_message);

                                    } elseif ($anonymous == '3') {

                                        $email_message = str_replace('{donor_name}', 'Anonymous donar', $email_message);

                                        $email_message = str_replace('{donote_amount}', 'Anonymous amount', $email_message);

                                        $email_message = str_replace('{donor_profile_link}', '', $email_message);

                                    } else {

                                        $email_message = str_replace('{donor_name}', $donor_name, $email_message);

                                        $email_message = str_replace('{donote_amount}', $donote_amount, $email_message);

                                        $email_message = str_replace('{donor_profile_link}', $donor_profile_link, $email_message);

                                    }

                                    $email_message = str_replace('{project_page_link}', $project_page_link, $email_message);





                                    $str = $email_message;



                                    email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);

                                }

                            }





                            /////////////////==============donor alert================================





                            $user_not_donor = $this->user_model->get_email_notification($this->session->userdata('user_id'));



                            if ($user_not_donor->add_fund == '1') {





                                $email_template = $this->db->query("select * from `email_template` where task='New Fund Donor Notification'");

                                $email_temp = $email_template->row();



                                if ($email_temp) {

                                    $email_message = $email_temp->message;

                                    $email_subject = $email_temp->subject;

                                    $email_address_from = $email_temp->from_address;

                                    $email_address_reply = $email_temp->reply_address;

                                    $email_to = $donar_email;



                                    $email_message = str_replace('{break}', '<br/>', $email_message);

                                    $email_message = str_replace('{user_name}', $username, $email_message);

                                    $email_message = str_replace('{project_name}', $project_name, $email_message);

                                    $email_message = str_replace('{donor_name}', $donor_name, $email_message);

                                    $email_message = str_replace('{donote_amount}', $donote_amount, $email_message);

                                    $email_message = str_replace('{donor_profile_link}', $donor_profile_link, $email_message);

                                    $email_message = str_replace('{project_page_link}', $project_page_link, $email_message);





                                    $str = $email_message;

                                    email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);

                                }

                            }









                            redirect('home/index/done');

                        }/////=====check unique transaction id		

                    }

                }

                //////////////=======credit card=========

                //////============amazon=========

                elseif ($post_gateway == 'amazon' && $amazons->gateway_status == '1' && $user_amazon == '1') {





                    if ($amazons->site_status == 'sand box') {

                        $amazonss_url = 'https://fps.sandbox.amazonaws.com';

                    }

                    if ($amazons->site_status == 'live') {

                        $amazonss_url = 'https://fps.amazonaws.com';

                    }



                    define('AWS_ACCESS_KEY_ID', $amazons->aws_access_key_id);

                    define('AWS_SECRET_ACCESS_KEY', $amazons->aws_secret_access_key);



                    if ($amazons->site_status == 'sand box') {

                        $CBUI_URL = "https://authorize.payments-sandbox.amazon.com/cobranded-ui/actions/start"; // echo "103<br>";  

                    }

                    if ($amazons->site_status == 'live') {

                        $CBUI_URL = "https://authorize.payments.amazon.com/cobranded-ui/actions/start";

                    }



                    $this->load->library('CBUIMultiUsePipelineSample'); //echo "123<br>" ;      

                    $pipeline = new Amazon_FPS_CBUIMultiUsePipeline(AWS_ACCESS_KEY_ID, AWS_SECRET_ACCESS_KEY, $CBUI_URL);



                    $project_id = $prj['project_id'];



                    if ($post_perk_id == '' || $post_perk_id == 0) {

                        $perk_id = 0;

                    } else {

                        $perk_id = $post_perk_id;

                    }





                    $donate_amount = $post_amount;



                    $login_user = get_user_detail($this->session->userdata('user_id'));

                    $donar_name = $login_user['user_name'];

                    $email = $post_email;

                    $anonymous = $post_anonymous;

                    $donar_comment = nl2br(strip_tags($post_docomment));



                    $uniqueId = 'Caller-' . microtime(true) . '#' . $donate_amount . '#' . $project_id . '#' . $perk_id . '#' . $donar_name . '#' . $email . '#' . $donar_comment . '#' . $anonymous;

                    $pipeline->setMandatoryParameters($uniqueId, site_url('amazon.php'), $donate_amount);



                    //optional parameters

                    $pipeline->setUsageLimit1("Amount", $donate_amount, "2 Hour");

                    $pipeline->addParameter("paymentMethod", "CC");

                    $pipeline->addParameter("isRecipientCobranding", "True");

                    // $pipeline->addParameter("recipientTokenList", "L6UGE187MPD97CII5NGB2BJIGP3EDLW3MLNV457GHCNEU2PIIPILVF3G6YPHFVKH");

                    // $pipeline->setRecipientTokenList("True", "L3UG41S7M6DM7CPIJNGH23JITP4EDCWDMLPVC57FHKNE82BII4I2VFBGHYPLFKKK , ");

                    ///=======pass more than one recipient here====================

                    //echo $recipient->amazon_token_id;

                    $pipeline->addParameter("recipientTokenList", $user_detail['amazon_token_id']);

                    $url = $pipeline->getURL();

                    //MultiUse url

                    //print "Sample CBUI url for MultiUse pipeline : " . $pipeline->getURL() . "\n";

                    redirect($url);

                }





                //////============amazon=========

                elseif ($post_gateway == 'paypal') {







                    if ($donar_amount >= $site_setting['maximum_donation_amount']) {



                        //////============paypal adaptive =========

                        $data['error'] = sprintf(PAYPAL_LIMIT_EXEED_YOU_CANNOT_DONATE_MORE_THAN, set_currency($paypal->donate_limit));

                        $this->load->view('default/paypal_error', $data);

                    } else {



                        //if($paypal->gateway_status=='Active'  && $user_paypal=='1')

                        if ($paypal->gateway_status == 'Active' && $site_setting['normal_paypal'] == 0) {





                            //////////=================Get PAYPAL SETTING  FROM DATABASE 	================



                            $application_id = $paypal->application_id;

                            $api_username = $paypal->paypal_username;

                            $api_password = $paypal->paypal_password;

                            $api_key = $paypal->paypal_signature;



                            if ($paypal->site_status == 'sandbox') {

                                $dbend_point = 'https://svcs.sandbox.paypal.com/';

                                $db_paypalurl = 'https://www.sandbox.paypal.com/webscr&cmd=';

                            } elseif ($paypal->site_status == 'live') {

                                $dbend_point = 'https://svcs.paypal.com/';

                                $db_paypalurl = 'https://www.paypal.com/webscr&cmd=';

                            } else {

                                $dbend_point = 'https://svcs.sandbox.paypal.com/';

                                $db_paypalurl = 'https://www.sandbox.paypal.com/webscr&cmd=';

                            }



                            /////////////===========Action Type===========

                            /// Whether the Pay request pays the receiver or whether the Pay request is set up to create a payment requesbut not fulfill the payment until the Execute Pay request is called.

                            //Allowable values are:

                            //////=******************

                            ///=== 1)PAY     Use this option if you are not using the Pay request in combinations with the ExecutePayment request.

                            ///=== 2)CREATE    Use this option to set up the payment instructions with the SetPaymentOptions request and then execute the payment at a later time with the ExecutePayment request.

                            ///=== 3)PAY_PRIMARY     For chained payments only, specify this value to delay payments to the secondary receivers; only the payment to the primary receiver is processed



                            $actionType = 'PAY';



                            /* =========Called by CallerService.php.

                             * ************************************************** */

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

                            define('API_PASSWORD', $api_password);



                            /**

                              # API_Signature:The Signature associated with the API user. which is generated by paypal.

                             */

                            define('API_SIGNATURE', $api_key);



                            /**

                              # Endpoint: this is the server URL which you have to connect for submitting your API request.

                             */

                            define('API_ENDPOINT', $dbend_point);



                            /**

                              USE_PROXY: Set this variable to TRUE to route all the API requests through proxy.

                              like define('USE_PROXY',TRUE);

                             */

                            define('USE_PROXY', FALSE);

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

                            define('DEVICE_ID', 'mydevice');

                            define('PAYPAL_REDIRECT_URL', $db_paypalurl);

                            define('DEVELOPER_PORTAL', 'https://developer.paypal.com');

                            define('LOGFILENAME', '../Log/logdata.log');

                            define('DEVICE_IPADDRESS', $_SERVER['REMOTE_ADDR']);

                            //This SDK supports only Name Value(NV) Request and Response Data Formats. for XML,SOAP,JSON use the SOAP SDK from X.com

                            define('REQUEST_FORMAT', 'NV');

                            define('RESPONSE_FORMAT', 'NV');

                            define('X_PAYPAL_REQUEST_SOURCE', 'PHP_NVP_SDK_V1.1');

                            // all the PayPal Header parameters are set in lib/callerservice.php

                            $this->load->library('NVP_SampleConstants');



                            $NVP_SampleConstants = new NVP_SampleConstants();



                            /////=================par receipt file header part================



                            $project_id = $prj['project_id'];  ////===user posted project id

                            $project_title = $prj['project_title'];



                            /////=========if Adaptive paypal Preapproval is active then



                            if ($paypal->preapproval == '1') {



                                $project_id = $prj['project_id'];  ////===user posted project id

                                $project_title = $prj['project_title'];



                                if ($post_perk_id == '' || $post_perk_id == 0) {

                                    $perk_id = 0;           ////===user selected perk id

                                } else {

                                    $perk_id = $post_perk_id;       ////===user selected perk id

                                }



                                $project_owner_email = $user_detail['paypal_email'];

                                /* ==get project owner detail from the project id ==== */

                                $start_date = date('Y-m-d');

                                $end_date = date('Y-m-d', strtotime($prj['end_date']));   ////////get this date from the project database

                                $noofpayments = '1';   ///////=======$_REQUEST['maxNumberOfPayments']======this can be variable posted by user if client want

                                $donar_amount = str_replace(',', '', number_format($post_amount, 2));       ////////=======$_REQUEST['maxTotalAmountOfAllPayments']====== donate amount

                                $donar_email = ''; //$post_email

                                $donar_name = $login_user['user_name'];

                                $donar_comment = nl2br(strip_tags($post_docomment));



                                //$transaction_fees=$paypal->transaction_fees; 



                                if ($prj['payment_type'] == '0') {

                                    $transaction_fees = $site_setting['fixed_fees'];

                                } else {

                                    $transaction_fees = $site_setting['flexible_fees'];

                                }



                                $payer_name = 'Project Creator';

                                try {



                                    $returnURL = site_url("payment/preapprovereceipt");

                                    $cancelURL = site_url("home");

                                    $request_array = array(

                                        Preapproval::$cancelUrl => $cancelURL,

                                        Preapproval::$returnUrl => $returnURL,

                                        Preapproval::$currencyCode => $currency_code,

                                        Preapproval::$startingDate => $start_date,

                                        Preapproval::$endingDate => $end_date,

                                        Preapproval::$maxNumberOfPayments => $noofpayments,

                                        Preapproval::$maxTotalAmountOfAllPayments => $donar_amount,

                                        //Preapproval::$requestEnvelope_senderEmail => $donar_email ,

                                        RequestEnvelope::$requestEnvelopeErrorLanguage => 'en_US',

                                        Preapproval::$memo => "Project : " . $project_title . "(" . $project_id . "), Amount : " . $donar_amount . "," . $payer_name . " Pay Fees(%) : " . $transaction_fees . ", Create By : " . $project_create_name . ", On Site : " . site_url()

                                    );



                                  //  print_r($request_array);die();

                                    /* Make the call to PayPal to get the Pay token

                                      If the API call succeded, then redirect the buyer to PayPal

                                      to begin to authorize payment.  If an error occured, show the

                                      resulting errors

                                     */

                                    $nvpStr = http_build_query($request_array, '', '&');

                                    $resArray = $NVP_SampleConstants->hash_call("AdaptivePayments/Preapproval", $nvpStr);

                                    $ack = strtoupper($resArray['responseEnvelope.ack']);

                                    if ($ack != "SUCCESS") {



                                        $data = array(

                                            'reshash' => $resArray,

                                        );

                                        $this->session->set_userdata($data);

                                        //$location = "APIError.php";

                                        //header("Location: $location");

                                        //echo "APIError(3) ";

                                        ////////==fail mail to donar email=====

                                        $email_template = $this->db->query("select * from `email_template` where task='New Fund Admin Notification'");

                                        $email_temp = $email_template->row();



                                        $email_address_from = $email_temp->from_address;

                                        $email_address_reply = $email_temp->reply_address;

                                        $email_subject = PREAPPROVAL_PAYMENT_PROCESS_FAILED;

                                        $email_to = $donar_email;





                                        $str = sprintf(PREAPPROVAL_HELLO_YOUR_PREAPPROVAL_PROCESS_VIOLATED_PLEASE_CHECK_YOUR_PAYMENT_DETAILS_TRY_AGAIN_THANKYOU, $donar_name, $resArray['error(0).message']);



                                        email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);





                                        $email_address_from = $email_temp->from_address;

                                        $email_address_reply = $email_temp->reply_address;

                                        $email_subject = PREAPPROVAL_PAYMENT_PROCESS_FAILED;

                                        $email_to = $payee_email;



                                        email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);









                                        $email_address_from = $email_temp->from_address;

                                        $email_address_reply = $email_temp->reply_address;

                                        $email_subject = PREAPPROVAL_PAYMENT_PROCESS_FAILED . " on Project" . $project_title . "(" . $project_id . ")";

                                        $email_to = $email_address_from;



                                        $str = sprintf(PREAPPROVAL_HELLO_ADMINISTRATOR_APIERROR3_PREAPPROVAL_PAYMENT_PROCESS_VIOLATED_DUE_TO_ERROR_MESSAGE_PLEASE_CHECK_YOUR_SETTINGS_TRY_AGAIN_THANKYOU, $resArray['error(0).message'], $donar_name, $donar_email, $payee_email, $donar_amount);



                                        email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);







                                        $error = sprintf(PREAPPROVAL_SORRY_YOUR_PREAPPROVAL_PAYMENT_PROCESS_VIOLATED_DUE_TO_ERROR_PLEASE_CHECK_YOUR_SETTINGS_TRY_AGAIN_THANKYOU, $resArray['error(0).message']);

                                        $data['error'] = $error;



                                        $this->load->view('default/paypal_error', $data);

                                    } else {



                                        /*  view response

                                          foreach($resArray as $key => $value) {

                                          echo "$key   ::  $value </br>";

                                          }

                                         */



                                        $data5 = array(

                                            'preapprovalKey' => $resArray['preapprovalKey'],

                                        );



                                        $this->session->set_userdata($data5);

                                        //////=====temp insert into the table==



                                        $temp_insert = $this->db->query("insert into temp_preapprove (`preapprovalKey`,`user_id`,`project_id`,`perk_id`,`name`,`comment`,`host_ip`,`transaction_date_time`,`temp_anonymous`,`facebook`,`twitter`)values('" . $resArray['preapprovalKey'] . "','" . $this->session->userdata('user_id') . "','" . $project_id . "','" . $perk_id . "','" . $donar_name . "','" . $donar_comment . "','" . $_SERVER['REMOTE_ADDR'] . "','" . date("Y-m-d H:i:s") . "','" . $post_anonymous . "','" . $facebook . "','" . $twitter . "')");



                                        $payPalURL = PAYPAL_REDIRECT_URL . '_ap-preapproval&preapprovalkey=' . $resArray['preapprovalKey'];

                                        echo "<script>window.location.href='$payPalURL'</script>";

                                    }

                                } catch (Exception $ex) {

                                    throw new Exception('Error occurred in PaymentDetails method');

                                    ////===catchException(3)  

                                    ////////==fail mail to donar email=====



                                    $email_template = $this->db->query("select * from `email_template` where task='New Fund Admin Notification'");

                                    $email_temp = $email_template->row();



                                    $email_address_from = $email_temp->from_address;

                                    $email_address_reply = $email_temp->reply_address;

                                    $email_subject = PREAPPROVAL_PAYMENT_PROCESS_FAILED;

                                    $email_to = $donar_email;



                                    $login_user = get_user_detail($this->session->userdata('user_id'));



                                    $str = sprintf(PREAPPROVAL_PAYMENT_PROCESS_VIOLATED_PLEASE_CHECK_TOUR_PAYMENT_DETAILS_TRY_AGAIN_THANKYOU, $donar_name);



                                    email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);





                                    $email_to = $payee_email;

                                    $str = sprintf(PREAPPROVAL_PAYMENT_PROCESS_VIOLATED_PLEASE_CHECK_TOUR_PAYMENT_DETAILS_TRY_AGAIN_THANKYOU, $donar_name);

                                    email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);









                                    $email_subject = PREAPPROVAL_PAYMENT_PROCESS_FAILED . " on Project" . $project_title . "(" . $project_id . ")";

                                    $email_to = $email_address_from;



                                    $str = sprintf(PREAPPROVAL_HELLO_ADMINISTRATOR_CATCHEXCEPTION3_PREAPPROVAL_PAYMRNT_PROCESS_VIOLATED_PLEASE_CHECK_YOUR_PAYMENT_DETAILS_TRY_AGAIN_THANKYOU, $donar_name, $donar_email, $payee_email, $donar_amount);

                                    email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);





                                    $error = PREAPPROVAL_PAYMENT_PROCESS_VIOLATED_DUE_TO_ERROR_IN_PAYMENTDETAILS_METHOD_CHECK_YOUR_SETTINGS_TRY_AGAIN_THANKYOU;

                                    $data['error'] = $error;

                                    $this->load->view('default/paypal_error', $data);

                                }

                            }



                            ///////================adaptive payment=======

                            else {









                                ////=====INSTANT======

                                ///////////////==============Fees Payer Type=================

                                /////////======The payer of PayPal fees.

                                ///===Allowed values are:

                                ///=== 1) SENDER     Sender pays all fees (for personal, implicit simple/parallel payments)

                                ///=== 2) PRIMARYRECEIVER    Primary receiver pays all fees

                                ///=== 3) EACHRECEIVER     Each receiver pays their own fee (default and personal payments)

                                ///=== 4) SECONDARYONLY     Secondary receivers pay all fees (use only for chained payments with one secondary receiver)

                                ///=====NOTE :: === The fee payer SENDER cannot be used if a primary receiver is specified (false) else true======



                                $feesPayer = $paypal->fees_taken_from;



                                //session_start();



                                try {





                                    $returnURL = site_url("payment/getpaymentdetails");     //////////=project detail page link will goes here

                                    $cancelURL = site_url("home");

                                    $ipnNotificationUrl = site_url("payment/getpaymentdetails/");



                                    //$preapprovalKey=$_REQUEST["preapprovalkey"];   /////////////////////===========get from the paypal database or take from user post=======

                                    $preapprovalKey = '';



                                    $donar_name = $login_user['user_name'];

                                    $donar_email = $post_email;

                                    $donar_comment = nl2br(strip_tags($post_docomment));



                                    $donar_amount = $post_amount;  ////===user posted amount







                                    $project_id = $prj['project_id'];  ////===user posted project id

                                    $project_title = $prj['project_title'];







                                    ////////////////////////////////////////////

                                    //$transaction_fees=$paypal->transaction_fees;  ////= from the database



                                    /* 	if($prj['payment_type'] == '0'){

                                      $transaction_fees = $site_setting['fixed_fees'];

                                      }else{

                                      $transaction_fees = $site_setting['flexible_fees'];

                                      } */





                                    $transaction_fees = $site_setting['instant_fees'];  ////= from the database







                                    /* $paypal_fees='5.00';    ////= from the database



                                      $fee_paypal='0';       ////= add this amount to project owner amount if the fees payer is PRIMARYRECEIVER



                                      if($paypal_fees!='' || $paypal_fees!='0.00')

                                      {

                                      $fee_paypal= (($donar_amount * $paypal_fees)/100);

                                      }



                                      $donate_amount_total_after_paypal=$donar_amount + $fee_paypal; */



                                    if ($feesPayer == 'SENDER') {

                                        $admin_amount = (($donar_amount * $transaction_fees) / 100);

                                        $project_owner_amount = ($donar_amount - $admin_amount);

                                        $payer_name = 'Donor';

                                    } elseif ($feesPayer == 'PRIMARYRECEIVER') {

                                        $payer_name = 'Project Creator';

                                        $admin_amount = (($donar_amount * $transaction_fees) / 100);

                                        $project_owner_amount = $donar_amount;  ////====if primary receiver then al donate amount pass to primary because it will take 2

                                        //$project_owner_amount= $donar_amount + $fee_paypal; 													 ///==transaction for payment after		

                                    }



                                    ////=======normally not in use SECONDARYONLY and EACHRECEIVER =====



                                    /* =====  if select SECONDARYONLY and EACHRECEIVER in both fees cut from the Primary receiver or project owner  ====== */ elseif ($feesPayer == 'SECONDARYONLY') {

                                        $payer_name = 'Site Owner';

                                        $temp_admin_amount = (($donar_amount * $transaction_fees) / 100);



                                        $admin_amount = $donar_amount;

                                        $project_owner_amount = ($donar_amount - $temp_admin_amount);

                                    } elseif ($feesPayer == 'EACHRECEIVER') {

                                        $payer_name = 'Project Creator And Site Owner';

                                        $admin_amount = (($donar_amount * $transaction_fees) / 100);

                                        $project_owner_amount = ($donar_amount - $admin_amount);

                                    } else {

                                        $payer_name = 'Donor';

                                        $admin_amount = (($donar_amount * $transaction_fees) / 100);

                                        $project_owner_amount = ($donar_amount - $admin_amount);

                                    }







                                    $admin_amount = str_replace(',', '', number_format($admin_amount, 2));

                                    $project_owner_amount = str_replace(',', '', number_format($project_owner_amount, 2));



                                    $senderEmail = ''; //$donar_email;				///////////========*******DONAR/SENDER Pay Email Address====*******





                                    $request_array = array(

                                        //Pay::$actionType => $_REQUEST['actionType'],   



                                        Pay::$actionType => $actionType,

                                        Pay::$cancelUrl => $cancelURL,

                                        Pay::$returnUrl => $returnURL,

                                        Pay::$ipnNotificationUrl => $ipnNotificationUrl,

                                        //Pay::$currencyCode  => $_REQUEST['currencyCode'], 

                                        Pay::$currencyCode => $currency_code,

                                        Pay::$clientDetails_deviceId => DEVICE_ID,

                                        Pay::$clientDetails_ipAddress => $_SERVER['REMOTE_ADDR'],

                                        Pay::$clientDetails_applicationId => APPLICATION_ID,

                                        RequestEnvelope::$requestEnvelopeErrorLanguage => 'en_US',

                                        Pay::$memo => "Project : " . $project_title . "(" . $project_id . "), Amount : " . $donar_amount . "," . $payer_name . " Pay Fees(%) : " . $transaction_fees . ", Create By : " . $project_create_name . ", On Site : " . site_url(),

                                        /////////=============comment send to all payment receiver ====

                                        Pay::$feesPayer => $feesPayer              /////////////////set in the  pay from means our database adaptive setting  

                                            //////===================*************=====================

                                    );



                                    /////////================Set all receiver amount and email and  primary email

                                    ////////=set primary receiver============

                                    /* ==get project owner detail from the project id ==== */



                                    if ($post_perk_id == '' || $post_perk_id == 0) {

                                        $perk_id = 0;           ////===user selected perk id

                                    } else {

                                        $perk_id = $post_perk_id;       ////===user selected perk id

                                    }



                                    $project_owner_email = $user_detail['paypal_email'];

                                    $request_array[Pay::$receiverEmail[0]] = $project_owner_email;

                                    $request_array[Pay::$receiverAmount[0]] = $project_owner_amount;

                                    if ($feesPayer == 'SENDER') {

                                        $request_array[Pay::$primaryReceiver[0]] = 'false';

                                    } elseif ($feesPayer == 'PRIMARYRECEIVER') {

                                        $request_array[Pay::$primaryReceiver[0]] = 'true';

                                    } elseif ($feesPayer == 'SECONDARYONLY') {

                                        $request_array[Pay::$primaryReceiver[0]] = 'false';

                                    } elseif ($feesPayer == 'EACHRECEIVER') {

                                        $request_array[Pay::$primaryReceiver[0]] = 'true';

                                    } else {

                                        $request_array[Pay::$primaryReceiver[0]] = 'true';

                                    }

                                    ////////=set Admin  receiver============





                                    /* ==get admin detail  ==== */



                                    $admin_email = $paypal->paypal_email;



                                    $request_array[Pay::$receiverEmail[1]] = $admin_email;

                                    $request_array[Pay::$receiverAmount[1]] = $admin_amount;







                                    if ($feesPayer == 'SENDER') {

                                        $request_array[Pay::$primaryReceiver[1]] = 'false';

                                    } elseif ($feesPayer == 'PRIMARYRECEIVER') {

                                        $request_array[Pay::$primaryReceiver[1]] = 'false';

                                    } elseif ($feesPayer == 'SECONDARYONLY') {

                                        $request_array[Pay::$primaryReceiver[1]] = 'true';

                                    } elseif ($feesPayer == 'EACHRECEIVER') {

                                        $request_array[Pay::$primaryReceiver[1]] = 'false';

                                    } else {

                                        $request_array[Pay::$primaryReceiver[1]] = 'false';

                                    }





                                    /* if(isset($_REQUEST['receiverEmail']))

                                      {

                                      $i = 0;

                                      $j = 0;

                                      $k = 0;





                                      foreach ($_REQUEST['receiverEmail'] as $value)

                                      {



                                      $request_array[Pay::$receiverEmail[$i]] = $value;

                                      $i++;



                                      }

                                      foreach ($_REQUEST['receiverAmount'] as $value)

                                      {



                                      $request_array[Pay::$receiverAmount[$j]] = $value;

                                      $j++;



                                      }

                                      foreach ($_REQUEST['primaryReceiver'] as $value)

                                      {



                                      $request_array[Pay::$primaryReceiver[$k]] = $value;

                                      $k++;



                                      }











                                      }

                                     */









                                    /////////=========ABOVE SET======Set preapprovalKey  from the database  or user post ==================







                                    if ($preapprovalKey != "") {

                                        $request_array[Pay::$preapprovalKey] = $preapprovalKey;

                                    }









                                    ///////////=========ABOVE SET======*******DONAR/SENDER Pay Email Address====*******







                                    if ($senderEmail != "") {

                                        //	$request_array[Pay::$senderEmail]  = $senderEmail;

                                    }









                                    /////////////===========Make request URL=========





                                    /* echo "<pre>";



                                      print_r($request_array);

                                      die(); */





                                    $nvpStr = http_build_query($request_array, '', '&');





                                    /////////////===========Make request URL=========











                                    /* Make the call to PayPal to get the Pay token

                                      If the API call succeded, then redirect the buyer to PayPal

                                      to begin to authorize payment.  If an error occured, show the

                                      resulting errors

                                     */





                                    $resArray = $NVP_SampleConstants->hash_call('AdaptivePayments/Pay', $nvpStr);

                                    ////////////////////////////////













                                    /* Display the API response back to the browser.

                                      If the response from PayPal was a success, display the response parameters'

                                      If the response was an error, display the errors received using APIError.php.

                                     */

                                    $ack = strtoupper($resArray['responseEnvelope.ack']);







                                    if ($ack != "SUCCESS") {



                                        //$_SESSION['reshash']=$resArray;



                                        $data = array(

                                            'reshash' => $resArray,

                                        );

                                        $this->session->set_userdata($data);



                                        //$location = "APIError.php";

                                        //header("Location: $location");

                                        //echo "APIError(1) ";







                                        $case = "";





                                        ////////==fail mail to donar email=====



                                        $email_template = $this->db->query("select * from `email_template` where task='New Fund Admin Notification'");

                                        $email_temp = $email_template->row();





                                        $email_address_from = $email_temp->from_address;

                                        $email_address_reply = $email_temp->reply_address;

                                        $email_to = $donar_email;

                                        $email_subject = YOUR_PAYMENT_FAILED;



                                        $login_user = get_user_detail($this->session->userdata('user_id'));





                                        $str = sprintf(ADAPTIVE_HELLO_YOUR_PAYMENT_PROCESS_VIOLATED_PLEASE_CHECK_YOUR_PAYMENT_DETAILS_TRY_AGAIN_THANKYOU, $donar_name, $resArray['error(0).message']);



                                        email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);







                                        $str = sprintf(ADAPTIVE_HELLO_YOUR_PAYMENT_PROCESS_VIOLATED_PLEASE_CHECK_YOUR_PAYMENT_DETAILS_TRY_AGAIN_THANKYOU, $donar_name, $resArray['error(0).message']);





                                        //$str = "Hello ".$donar_name.",\n\nYour payment process is violated ".$resArray['error(0).message']."\n\n\nplease check your payment details.Try again.\n\n\nThank You.";

                                        $email_to = $payee_email;

                                        email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);







                                        $email_to = $email_address_from;

                                        $email_subject = YOUR_PAYMENT_FAILED . " on Project" . $project_title . "(" . $project_id . ")";



                                        $str = sprintf(ADAPTIVE_HELLO_ADMINISTRATOR_APIERROR_PAYMENT_PROCESS_VIOLATED_DUE_TO_ERROR_MESSAGE_PLEASE_CHECK_YOUR_SETTINGS_TRY_AGAIN_THANKYOU, $resArray['error(0).message'], $donar_name, $donar_email, $payee_email, $payee_email);



                                        //"Hello Administrator,\n\n APIError(1). Payment process is violated due to ".$resArray['error(0).message']." \n\nDonar Name : ".$donar_name."\n\nEmail : ".$donar_email."\n\nPayee Email : ".$payee_email."\n\nDonate Email : ".$payee_email."\n\nplease check your settings.Try again.\n\n\nThank You.";

                                        email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);



                                        $error = sprintf(ADAPTIVE_SORRY_PAYMENT_PROCESS_VIOLATED_PLEASE_CHECK_TOUR_PAYMENT_DETAILS_TRY_AGAIN_THANKYOU, $resArray['error(0).message']);



                                        $data['error'] = $error;

                                        $this->load->view('default/paypal_error', $data);

                                        //redirect('home/index/fail');

                                    } else {

                                        ///$_SESSION['payKey'] = $resArray['payKey'];



                                        $data2 = array(

                                            'payKey' => $resArray['payKey'],

                                        );

                                        $this->session->set_userdata($data2);



                                        $payKey = $resArray['payKey'];

                                        /////////============insert all detail to the temp_adaptive table===========



                                        /* echo "<pre>";

                                          print_r($resArray);

                                          die; */



                                        $orignial_amount = $donar_amount - $admin_amount;



                                        $insert = $this->db->query("insert into temp_adaptive (`user_id`,`project_id`,`perk_id`,`total_amount`,`amount`,`pay_fee`,`email`,`host_ip`,`transaction_date_time`,`paypal_paykey`,`paypal_adaptive_status`,`temp_anonymous`,`facebook`,`twitter`)values('" . $this->session->userdata('user_id') . "','" . $project_id . "','" . $perk_id . "','" . $donar_amount . "','" . $orignial_amount . "','" . $admin_amount . "','" . $donar_email . "','" . $_SERVER['REMOTE_ADDR'] . "','" . date("Y-m-d H:i:s") . "','" . $payKey . "','FAIL','" . $post_anonymous . "','" . $facebook . "','" . $twitter . "')");



                                        $case = "";



                                        if (($resArray['paymentExecStatus'] == "COMPLETED")) {

                                            $case = "1";

                                        } else if (($actionType == "PAY") && ($resArray['paymentExecStatus'] == "CREATED" )) {

                                            $case = "2";

                                        } else if (($preapprovalKey != null ) && ($actionType == "CREATE") && ($resArray['paymentExecStatus'] == "CREATED" )) {

                                            $case = "3";

                                        } else if (($actionType == "PAY_PRIMARY")) {

                                            $case = "4";

                                        } else if (($actionType == "CREATE") && ($resArray['paymentExecStatus'] == "CREATED" )) {



                                            $temp1 = API_USERNAME;

                                            $temp2 = str_replace('_api1.', '@', $temp1);



                                            if ($temp2 == $donar_email) {

                                                $case = "3";

                                            } else {

                                                $case = "2";

                                            }

                                        } else {



                                            $error = ADAPTIVE_SORRY_PAYMENT_PROCESS_VIOLATED_DUE_TO_ERROR_IN_PAYRECIEPT_METHOD_TRY_AGAIN_THANKYOU;



                                            $data['error'] = $error;





                                            $this->load->view('default/paypal_error', $data);

                                        }

                                    }

                                } catch (Exception $ex) {



                                    $project_id = $prj['project_id'];  ////===user posted project id

                                    $project_title = $prj['project_title'];



                                    throw new Exception('Error occurred in PayReceipt method');



                                    ////==catchException(1)

                                    ////////==fail mail to donar email=====



                                    $email_template = $this->db->query("select * from `email_template` where task='New Fund Admin Notification'");

                                    $email_temp = $email_template->row();





                                    $email_address_from = $email_temp->from_address;

                                    $email_address_reply = $email_temp->reply_address;

                                    $email_subject = YOUR_PAYMENT_FAILED;

                                    $email_to = $donar_email;



                                    $login_user = get_user_detail($this->session->userdata('user_id'));





                                    $str = sprintf(ADAPTIVE_HELLO_YOUR_PAYMENT_VIOLATED_CHECK_YOUR_PAYMENT_DETAILS_TRY_AGAIN_THANKYOU, $donar_name);



                                    email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);





                                    $email_to = $payee_email;

                                    $str = sprintf(ADAPTIVE_HELLO_YOUR_PAYMENT_VIOLATED_CHECK_YOUR_PAYMENT_DETAILS_TRY_AGAIN_THANKYOU, $donar_name);

                                    email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);







                                    $email_subject = YOUR_PAYMENT_FAILED . " on Project" . $project_title . "(" . $project_id . ")";

                                    $email_to = $email_address_from;



                                    $str = sprintf(ADAPTIVE_HELLO_ADMINISTRATOR_CATCHEXCEPTION3_PREAPPROVAL_PAYMRNT_PROCESS_VIOLATED_PLEASE_CHECK_YOUR_PAYMENT_DETAILS_TRY_AGAIN_THANKYOU, $donar_name, $donar_email, $payee_email, $donar_amount);





                                    email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);



                                    ///redirect('home/');

                                    $error = ADAPTIVE_SORRY_PAYMENT_PROCESS_VIOLATED_DUE_TO_ERROR_IN_PAYRECIEPT_METHOD_TRY_AGAIN_THANKYOU;

                                    $data['error'] = $error;

                                    $this->load->view('default/paypal_error', $data);

                                }



                                ///////////==========Show payment create detail ===========

                                /* foreach($resArray as $key => $value) {



                                  if($key=='error(0).message')

                                  {

                                  echo "$key   ::  $value </br>";

                                  }

                                  else

                                  {

                                  echo "$key   ::  $value </br>";

                                  }



                                  } */





                                ///////////==========Show payment create detail ===========

                                ///=====$token = $resArray['payKey'];              Add  this token to database for check the transaction success or fail

                                /////////===========for payment redirect user to this link============= 







                                switch ($case) {

                                    case "2" :

                                        $token = $resArray['payKey'];

                                        $payPalURL = PAYPAL_REDIRECT_URL . '_ap-payment&paykey=' . $token;



                                        /* 	if($feesPayer=='PRIMARYRECEIVER')

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

                                        $payPalURL = PAYPAL_REDIRECT_URL . '_ap-payment&paykey=' . $token;



                                        echo "<script>window.location.href='$payPalURL'</script>";



                                        break;

                                    case "4" :

                                        $token = $resArray['payKey'];

                                        $payPalURL = PAYPAL_REDIRECT_URL . '_ap-payment&paykey=' . $token;

                                        //echo"Payment to \"Primary Receiver\" is Complete<br/>";

                                        //echo"<a href=ExecutePaymentOption.php?payKey=$payKey><b>* \"Execute Payment\" to pay to the secondary receivers</b></a><br>";

                                        break;

                                }





                                /////////===========for payment redirect user to this link============= 		

                            }

                        }



                        //////============paypal adaptive =========		

                        //////============paypal normal=========

                        //elseif($site_setting['normal_paypal']=='1' && $user_paypal=='1')

                        elseif ($site_setting['normal_paypal'] == '1') {









                            if ($paypal->site_status == 'sandbox') {

                                $Paypal_Url = 'https://www.sandbox.paypal.com/cgi-bin/webscri';

                            }

                            if ($paypal->site_status == 'live') {

                                $Paypal_Url = 'https://www.paypal.com/cgi-bin/webscri';

                            }



                            $this->paypal_lib->add_field('currency_code', $site_setting->currency_code);

                            $this->paypal_lib->add_field('business', $paypal->paypal_email);

                            $this->paypal_lib->add_field('return', site_url('payment/success'));

                            $this->paypal_lib->add_field('cancel_return', site_url('payment/cancel'));

                            $this->paypal_lib->add_field('notify_url', site_url('payment/ipn')); // <-- IPN url

                            $this->paypal_lib->add_field('custom', $this->session->userdata('user_id') . "#" . $post_email . "#" . $perk_id . "#" . $post_anonymous); // <-- Verify return

                            //$this->paypal_lib->paypal_url= $meta['paypal_url'];

                            $this->paypal_lib->add_field('item_name', $prj['project_title']);

                            $this->paypal_lib->add_field('item_number', $prj['project_id']);

                            $this->paypal_lib->add_field('amount', $post_amount);

                            $this->paypal_lib->paypal_url = $Paypal_Url;

                            //$this->paypal_lib->image('button_03.gif');

                            //$this->paypal_lib->button('Donate Online');



                            $data['paypal_form'] = $this->paypal_lib->paypal_auto_form();

                        }



                        //////============paypal normal=========

                        else {



                            $data['error'] = INTERNAL_ERROR_CONTACT_SITE_ADMINISTRATOR;

                            $this->load->view('default/paypal_error', $data);

                        }

                    }

                } ////=====if condition gateway	

                elseif ($post_gateway == 'interswitch') {


                   


					$login_user = get_user_detail($this->session->userdata('user_id'));
					$donar_name = $login_user['user_name'];
					$email = $login_user['email'];
					$post_id = $post_email;
                    $anonymous = $post_anonymous;
					$donar_comment = nl2br(strip_tags($post_docomment));
					
					//$wallet_setting = wallet_setting();
					//$wallet_add_fees = $wallet_setting->wallet_add_fees;
					
					$donate_amount = $post_amount;
					$amount = $post_amount;
			
					//$add_fees = number_format((($donate_amount * $wallet_add_fees) / 100), 2);
			
				    //$amount = number_format(($add_fees + $donate_amount), 2);
				   
				 	
					
				   //$amount  =  currency("USD","NGN",$amount);
			
					$uniqueId = 'inter-' . microtime(true) . '#' . $post_id . '#' . str_replace(',', '',($amount)) . '#' . $project_id . '#' . $donar_amount . '#' . $perk_id . '#' . $donar_name . '#' . $email . '#' . $donar_comment . '#' . $anonymous;
			
			
			
			
			
					$interswitch = interswitch_detail();
			
					if ($interswitch->site_status == 'sand box') {
			
						$interswitch_url = 'https://testwebpay.interswitchng.com/test_paydirect/webpay/pay.aspx';
			
					}
			
					if ($interswitch->site_status == 'live') {
			
						$interswitch_url = 'https://webpay.interswitchng.com/paydirect/webpay/pay.aspx';
			
					}
			
			
					$interswitch_args = array(
						'gtpay_mert_id' => '700',
						'gtpay_tranx_id' =>  'NGNWL'.randomNumber(12),
						'gtpay_tranx_amt' =>str_replace(',', '',($amount))*100, 
						'gtpay_tranx_curr' => '566',
						'gtpay_cust_id' => $login_user['user_id'],
						'gtpay_cust_name' =>$login_user['user_name'],
						'gtpay_tranx_memo' => $uniqueId,
						'gtpay_tranx_noti_url' =>site_url('payment/donate_interswitchipn/'),
						'gtpay_no_show_gtbank' =>'yes',
						'gtpay_echo_data' =>$uniqueId,
						'gtpay_gway_name' =>'',
						'site_redirect_url' =>site_url('payment/donate_interswitchipn/')
					);
			
			
				   $interswitch_url = 'https://ibank.gtbank.com/GTPay/Tranx.aspx';
			
					foreach ($interswitch_args as $key => $value) {
						$interswitch_args_array[] = '<input type="hidden" name="' . $key . '" value="' . $value . '"/>';
					}
			
			
			
					$form = '<form action="' . $interswitch_url . '" method="post" id="interswitch_payment_form" >' . implode('', $interswitch_args_array) . '					
							<input type="submit" class="button-alt" name="btnSubmit" value="Continue to GTBank/Interswitch site to donate" id="submit_interswitch_payment_form" />
							</form>';
			
					echo $form;
			
					/*echo '<script type="text/javascript">document.getElementById("interswitch_payment_form").submit();</script>';*/
					
					
					
					
					
					
					
					
					
					
					
					
					

                   




                    


                   

                } else {



                    $data['error'] = INTERNAL_ERROR_CONTACT_SITE_ADMINISTRATOR;

                    $this->load->view('default/paypal_error', $data);

                }





                ///////========*****************========PAYMENT PROCESS====================************===============			

            }

        }

    }



    ///////////========if payment through amazon ===============**************



    function sendercallback() {



        $site_setting = site_setting();



        if ($site_setting['currency_code'] != '') {



            $currency_code = $site_setting['currency_code'];

        } else {

            $currency_code = 'USD';

        }







        //////===gettting sender token id=======

        $sender_token_id = $_GET['tokenID'];

        $callerReference = $_GET['callerReference'];





        //////=======check if sender token id is blank or caller reference is not received===== 



        if ($sender_token_id != '' && $callerReference != '') {





            //$uniqueId = 'Caller-'.microtime(true).'#'.$donate_amount.'#'.$project_id.'#'.$perk_id.'#'.$donar_name.'#'.$email.'#'.$donar_comment;



            $caller_ex = explode('#', $callerReference);



            $donar_amount = $caller_ex[1];



            $project_id = $caller_ex[2];

            $perk_id = $caller_ex[3];



            $donar_name = $caller_ex[4];

            $donar_email = $caller_ex[5];

            $donar_comment = $caller_ex[6];

            $anonymous = $caller_ex[7];



            $amazons = amazon_detail();



            if ($amazons->site_status == 'sand box') {

                $amazon_url = 'https://fps.sandbox.amazonaws.com';

            }

            if ($amazons->site_status == 'live') {

                $amazon_url = 'https://fps.amazonaws.com';

            }



            define('AWS_ACCESS_KEY_ID', $amazons->aws_access_key_id);

            define('AWS_SECRET_ACCESS_KEY', $amazons->aws_secret_access_key);



            $_config = array('ServiceURL' => $amazon_url,

                'UserAgent' => 'Amazon FPS PHP5 Library',

                'SignatureVersion' => 2,

                'SignatureMethod' => 'HmacSHA256',

                'ProxyHost' => null,

                'ProxyPort' => -1,

                'MaxErrorRetry' => 3

            );



            $this->load->library('PaySample');





            /*             * **********************************************************************

             * Instantiate Implementation of Amazon FPS

             * 

             * AWS_ACCESS_KEY_ID and AWS_SECRET_ACCESS_KEY constants 

             * are defined in the .config.inc.php located in the same 

             * directory as this sample

             * ********************************************************************* */

            $service = new Amazon_FPS_Client(AWS_ACCESS_KEY_ID, AWS_SECRET_ACCESS_KEY, $_config);

            //echo "38<br>";

            /*             * **********************************************************************

             * Uncomment to try out Mock Service that simulates Amazon_FPS

             * responses without calling Amazon_FPS service.

             *

             * Responses are loaded from local XML files. You can tweak XML files to

             * experiment with various outputs during development

             *

             * XML files available under /home/fgiba0/public_html/amazon/Amazon/FPS/Mock tree

             *

             * ********************************************************************* */

            // $service = new Amazon_FPS_Mock();



            /*             * **********************************************************************

             * Setup request parameters and uncomment invoke to try out 

             * sample for Pay Action

             * ********************************************************************* */

            // echo "55<br>";

            $request = new Amazon_FPS_Model_PayRequest();

            //$recipient_token_id="L2UGX1C7M1DF7CQIDNG62VJIPPDED9WXML5VJ57AHLNER29II8IMVFUGCYPLFVKS";

            //	$request->setSenderTokenId('I531R81NCTVDQNHTH7NF75UKNZVZE6JJXZUKNKGZ5244XTTKHBQ7ECMG1UW5BJE4');//set the proper senderToken here.

            //	$request->setRecipientTokenId("L6UGE187MPD97CII5NGB2BJIGP3EDLW3MLNV457GHCNEU2PIIPILVF3G6YPHFVKH");//set the proper recipeintToken here.

            //$request->setSenderTokenId('I531R81NCTVDQNHTH7NF75UKNZVZE6JJXZUKNKGZ5244XTTKHBQ7ECMG1UW5BJE4');//set the proper senderToken here.



            $request->setSenderTokenId($sender_token_id);







            $prj = $this->project_model->get_project_user($project_id);

            $login_user = get_user_detail($this->session->userdata('user_id'));

            $user_detail = get_user_detail($prj['user_id']);

            //$user_detail['amazon_token_id']	;	







            $payee_email = $donar_email;



            $donar_name = $login_user['user_name'];

            $donar_email = $login_user['email'];







            $donar_id = $this->session->userdata('user_id');



            $donar_amount = $donar_amount;



            $project_id = $prj['project_id'];

            $project_title = $prj['project_title'];

            $url_project_title = $prj['url_project_title'];

            $project_owner_email = $user_detail['paypal_email'];

            $request->setRecipientTokenId($user_detail['amazon_token_id']);  //set the proper recipeintToken here.	









            $amount = new Amazon_FPS_Model_Amount();

            $amount->setCurrencyCode($currency_code);



            $amount->setValue($donar_amount);

            $request->setTransactionAmount($amount);





            $request->setChargeFeeTo('Recipient');



            $amount1 = new Amazon_FPS_Model_Amount();

            $amount1->setCurrencyCode($currency_code);

            //$amount1->setValue('5'); //set the transaction amount here;			

            $amount1->setValue($amazons->fixed_fees);



            $request->setMarketplaceFixedFee($amount1);

            //$request->setMarketplaceVariableFee(5);			

            $request->setMarketplaceVariableFee($amazons->variable_fees);



            $uniqueId = $callerReference;   //'Caller-'.microtime(true);

            $request->setCallerReference($uniqueId); //set the unique caller reference here.

            // object or array of parameters

            $response = $service->pay($request); // echo "88<br>"    ;  

            //  echo var_dump( $response);



            $googleresult = simplexml_load_string($response);





            if (isset($googleresult->Errors)) {



                $email_template = $this->db->query("select * from `email_template` where task='New Fund Admin Notification'");

                $email_temp = $email_template->row();



                $email_address_from = $email_temp->from_address;

                $email_address_reply = $email_temp->reply_address;

                $email_subject = YOUR_PAYMENT_FAILED;

                $email_to = $donar_email;





                $str = sprintf(AMAZON_HELLO_PAYMENT_PROCESS_VIOLATED_ERROR_MESSAGE_PLEASE_CHECK_YOUR_ACCOUNT_BALANCE_PAYMENT_DETAILS_TRY_AGAIN_THANKYOU, $donar_name, $googleresult->Errors->Error->Message);



                //"Hello ".$donar_name.",\n\nYour payment process is violated ".$googleresult->Errors->Error->Message."\n\n\nplease check your account balance or payment details.Try again.\n\n\nThank You.";

                email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);





                $email_to = $payee_email;



                $str = sprintf(AMAZON_HELLO_PAYMENT_PROCESS_VIOLATED_ERROR_MESSAGE_PLEASE_CHECK_YOUR_ACCOUNT_BALANCE_PAYMENT_DETAILS_TRY_AGAIN_THANKYOU, $donar_name, $googleresult->Errors->Error->Message);





                email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);





                $email_subject = YOUR_PAYMENT_FAILED . " on Project " . $project_title . "(" . $project_id . ")";

                $email_to = $email_address_from;



                $str = sprintf(AMAZON_HELLO_ADMINISTRATOR_PAYMENT_PROCESS_VIOLATED_PLEASE_CHECK_YOUR_ACCOUNT_SETTINGS_TRY_AGAIN_THANKYOU, $googleresult->Errors->Error->Message, $donar_name, $donar_email, $payee_email, $donar_amount);



                //"Hello Administrator,\n\nPayment process is violated ".$googleresult->Errors->Error->Message."\n\n\nDonar Name : ".$donar_name."\n\nDonar Email : ".$donar_email."\n\nPayee Email : ".$payee_email."\n\nDonate Amount : ".$donar_amount."\n\nplease check your account settings.Try again.\n\n\nThank You.";

                email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);





                $error = sprintf(AMAZON_SORRY_WE_CAN_NOT_PROCESS_DUE_TO_GOOGLE_RESULT_ERROR_TRY_AGAIN_THANKYOU, $googleresult->Errors->Error->Message);



                //"Sorry...we can not process your payment due to ".$googleresult->Errors->Error->Message.". Please Try again. Thank You.";

                $data['error'] = $error;



                $this->load->view('default/paypal_error', $data);

            } else {

                //echo "Status: ".$googleresult->PayResult->TransactionStatus."<br/>";

                //echo "ID: ".$googleresult->PayResult->TransactionId."\n";

                //<PayResponse xmlns="http://fps.amazonaws.com/doc/2010-08-28/"><PayResult><TransactionId>166K4LZGG66PUTQJSSNI3UMM51M6AG4DMH9</TransactionId><TransactionStatus>Pending</TransactionStatus></PayResult><ResponseMetadata><RequestId>471ae5eb-3de0-4098-9fb6-1fbe9429396a:0</RequestId></ResponseMetadata></PayResponse>"

                //echo $callerReference;

                ///insert the callerreference to the transaction table with exploding # firest unique id and amount and project_id and emailid







                $pay_fee = ((($amazons->fixed_fees * $donar_amount) / 100) + $amazons->variable_fees);





                $amz_trans_id = $googleresult->PayResult->TransactionId;



                $chk_trans_id = 1;

                $chk_transaction = $this->db->query("select * from transaction where amazon_transaction_id='" . $amz_trans_id . "'");



                if ($chk_transaction->num_rows() > 0) {

                    $chk_trans_id = 0;

                }





                if ($chk_trans_id == 1) {





                    $insert = $this->db->query("insert into transaction (`user_id`,`project_id`,`perk_id`,`amount`,`listing_fee`,`pay_fee`,`name`,`email`,`host_ip`,`comment`,`transaction_date_time`,`amazon_transaction_id`,`trans_anonymous`)values('" . $this->session->userdata('user_id') . "','" . $project_id . "','" . $perk_id . "','" . $donar_amount . "','0','" . $pay_fee . "','" . $donar_name . "','" . $donar_email . "','" . $_SERVER['REMOTE_ADDR'] . "','" . $donar_comment . "','" . date("Y-m-d H:i:s") . "','" . $amz_trans_id . "','" . $anonymous . "')");





                    $last_transaction_id = mysql_insert_id();







                    $get_don_project = $this->db->get_where('project', array('project_id' => $project_id));

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

                    $this->db->update('project', $data_don);





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



                    $affiliate_setting = affiliate_setting();



                    if ($affiliate_setting->affiliate_enable == 1) {





                        $pledge_commission = affiliate_commission_setting(2);





                        ////======donor is referral user then all/one pledge goes to referral



                        if ($login_user['reference_user_id'] != '' && $login_user['reference_user_id'] > 0) {

                            $get_affiliate_user = get_user_detail($login_user['reference_user_id']);



                            if ($get_affiliate_user) {



                                ///===get commission amount and add to user earn table with pending status





                                if ($pledge_commission) {



                                    $pledge_commission_fee = $pledge_commission->commission;



                                    if ($pledge_commission_fee > 0) {



                                        if ($pledge_commission->type == '%') {

                                            $final_pledge_fee = ($donar_amount * $pledge_commission_fee) / 100;

                                        } else {

                                            $final_pledge_fee = $pledge_commission_fee;

                                        }







                                        ////=======check one time or every time payment enable



                                        if ($affiliate_setting->pay_commission_pledge == 1) {



                                            $earn_data = array(

                                                'user_id' => $get_affiliate_user['user_id'],

                                                'project_id' => $project_id,

                                                'perk_id' => $perk_id,

                                                'transaction_id' => $last_transaction_id,

                                                'earn_amount' => $final_pledge_fee,

                                                'earn_date' => date('Y-m-d H:i:s'),

                                                'earn_status' => 0

                                            );

                                            $this->db->insert('affiliate_user_earn', $earn_data);

                                        } else {



                                            $affiliate_user_id = $get_affiliate_user['user_id'];



                                            $check_user_already_get_commission = check_user_one_time_commission($affiliate_user_id, $project_id);



                                            if ($check_user_already_get_commission == 0) {

                                                $earn_data = array(

                                                    'user_id' => $get_affiliate_user['user_id'],

                                                    'project_id' => $project_id,

                                                    'perk_id' => $perk_id,

                                                    'transaction_id' => $last_transaction_id,

                                                    'earn_amount' => $final_pledge_fee,

                                                    'earn_date' => date('Y-m-d H:i:s'),

                                                    'earn_status' => 0

                                                );

                                                $this->db->insert('affiliate_user_earn', $earn_data);

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

                } else {









                    $email_template = $this->db->query("select * from `email_template` where task='New Fund Admin Notification'");

                    $email_temp = $email_template->row();





                    $email_address_from = $email_temp->from_address;

                    $email_address_reply = $email_temp->reply_address;

                    $email_subject = YOUR_PAYMENT_FAILED;

                    $email_to = $donar_email;



                    $str = sprintf(AMAZON_PAYMENT_PROCESS_FAIL_DUE_TO_TRANSACTION_ID_ALREADY_EXISTS_IN_THE_SYSTEM_CONTACT_ADMINISTRATOR, $donar_name);

                    //"Hello ".$donar_name.",\n\nYour payment process is fail due to Transaction ID already exists in the System.\n\n\nplease contact site administrator.\n\nThank You.";



                    email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);



                    $email_to = $payee_email;



                    $str = sprintf(AMAZON_PAYMENT_PROCESS_FAIL_DUE_TO_TRANSACTION_ID_ALREADY_EXISTS_IN_THE_SYSTEM_CONTACT_ADMINISTRATOR, $donar_name);



                    email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);







                    $email_to = $email_address_from;



                    $str = sprintf(AMAZON_HELLO_ADMINISTRATOR_PAYMENT_PROCESS_FAIL_DUE_TO_TRANSACTION_ID_ALREADY_EXISTS_IN_SYSTEM, $donar_name, $donar_email, $payee_email, $donar_amount);



                    // "Hello Administrator,\n\nOne payment process is fail due to due to Transaction ID already exists in the System .\n\nDonar Name : ".$donar_name."\n\nDonar Email : ".$donar_email."\n\nPayee Email ::".$payee_email."\n\nDonate Amount : ".$donar_amount."\n\nThank You.";

                    email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);



                    redirect('home/index/done');



                    $error = AMAZON_SORRY_WE_CAN_NOT_PROCESS_DUE_TO_TRANSACTION_ID_ALREADY_EXISTS_IN_SYSTEM_TRY_AGAIN_THANKYOU;

                    $data['error'] = $error;



                    //$this->load->view('default/paypal_error',$data);

                }







                if ($insert) {

                    //mail(success);





                    $username = $prj['user_name'];



                    $project_owner_email = $prj['email'];



                    $project_name = $project_title;

                    $project_page_link = site_url('projects/' . $url_project_title . '/' . $project_id);



                    $donor_name = $login_user['user_name'];

                    $donote_amount = $donar_amount;

                    $donor_profile_link = site_url('member/' . $donar_id);

                    ///////////============admin alert==========

                    $email_template = $this->db->query("select * from `email_template` where task='New Fund Admin Notification'");

                    $email_temp = $email_template->row();



                    $email_message = $email_temp->message;

                    $email_subject = $email_temp->subject;



                    $email_address_from = $email_temp->from_address;

                    $email_address_reply = $email_temp->reply_address;

                    $email_to = $email_address_from;







                    $email_message = str_replace('{break}', '<br/>', $email_message);

                    $email_message = str_replace('{user_name}', $username, $email_message);

                    $email_message = str_replace('{project_name}', $project_name, $email_message);

                    $email_message = str_replace('{donor_name}', $donor_name, $email_message);

                    $email_message = str_replace('{donote_amount}', $donote_amount, $email_message);

                    $email_message = str_replace('{donor_profile_link}', $donor_profile_link, $email_message);

                    $email_message = str_replace('{project_page_link}', $project_page_link, $email_message);





                    $str = $email_message . "\n\nTransactionID :" . $googleresult->PayResult->TransactionId;



                    email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);









                    ///////=================owner alert===================



                    $user_not = $this->user_model->get_email_notification($prj['user_id']);



                    if (isset($user_not->add_fund)) {

                        if ($user_not->add_fund == '1') {



                            $email_template = $this->db->query("select * from `email_template` where task='New Fund Owner Notification'");

                            $email_temp = $email_template->row();



                            $email_message = $email_temp->message;

                            $email_subject = $email_temp->subject;



                            $email_address_from = $email_temp->from_address;

                            $email_address_reply = $email_temp->reply_address;

                            $email_to = $project_owner_email;





                            $email_message = str_replace('{break}', '<br/>', $email_message);

                            $email_message = str_replace('{user_name}', $username, $email_message);

                            $email_message = str_replace('{project_name}', $project_name, $email_message);

                            if ($anonymous == '2') {

                                $email_message = str_replace('{donor_name}', $donor_name, $email_message);

                                $email_message = str_replace('{donote_amount}', 'Anonymous amount', $email_message);

                                $email_message = str_replace('{donor_profile_link}', $donor_profile_link, $email_message);

                            } elseif ($anonymous == '3') {

                                $email_message = str_replace('{donor_name}', 'Anonymous donar', $email_message);

                                $email_message = str_replace('{donote_amount}', 'Anonymous amount', $email_message);

                                $email_message = str_replace('{donor_profile_link}', '', $email_message);

                            } else {

                                $email_message = str_replace('{donor_name}', $donor_name, $email_message);

                                $email_message = str_replace('{donote_amount}', $donote_amount, $email_message);

                                $email_message = str_replace('{donor_profile_link}', $donor_profile_link, $email_message);

                            }

                            $email_message = str_replace('{project_page_link}', $project_page_link, $email_message);





                            $str = $email_message;



                            email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);

                        }

                    }



                    /////////////////==============donor alert================================





                    $user_not_donor = $this->user_model->get_email_notification($this->session->userdata('user_id'));



                    if (isset($user_not_donor->add_fund)) {

                        if ($user_not_donor->add_fund == '1') {





                            $email_template = $this->db->query("select * from `email_template` where task='New Fund Donor Notification'");

                            $email_temp = $email_template->row();



                            $email_message = $email_temp->message;

                            $email_subject = $email_temp->subject;



                            $email_address_from = $email_temp->from_address;

                            $email_address_reply = $email_temp->reply_address;

                            $email_to = $donar_email;





                            $email_message = str_replace('{break}', '<br/>', $email_message);

                            $email_message = str_replace('{user_name}', $username, $email_message);

                            $email_message = str_replace('{project_name}', $project_name, $email_message);

                            $email_message = str_replace('{donor_name}', $donor_name, $email_message);

                            $email_message = str_replace('{donote_amount}', $donote_amount, $email_message);

                            $email_message = str_replace('{donor_profile_link}', $donor_profile_link, $email_message);

                            $email_message = str_replace('{project_page_link}', $project_page_link, $email_message);





                            $str = $email_message . "\n\nTransactionID :" . $googleresult->PayResult->TransactionId;



                            email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);

                        }

                    }











                    redirect('home/');

                } else {





                    $email_template = $this->db->query("select * from `email_template` where task='New Fund Admin Notification'");

                    $email_temp = $email_template->row();





                    $email_address_from = $email_temp->from_address;

                    $email_address_reply = $email_temp->reply_address;

                    $email_subject = YOUR_PAYMENT_FAILED;

                    $email_to = $donar_email;







                    $str = sprintf(AMAZON_PAYMENT_PROCESS_FAIL_TO_INSERT_IN_SITE_CONTACT_ADMINISTRATOR_THANKYOU, $donar_name);

                    email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);





                    //redirect('home/');

                    $email_to = $payee_email;



                    $str = sprintf(AMAZON_PAYMENT_PROCESS_FAIL_TO_INSERT_IN_SITE_CONTACT_ADMINISTRATOR_THANKYOU, $donar_name);

                    email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);







                    $email_to = $email_address_from;

                    $str = sprintf(AMAZON_HELLO_ADMINISTRATOR_PAYMENT_PROCESS_FAIL_DUE_TO_AMAZONEXCEPTION_INTERNAL_ERROR, $donar_name, $donar_email, $payee_email, $donar_amount);

                    email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);



                    //"Hello Administrator,\n\nOne payment process is fail due to amazonException(2) internal error .\n\nDonar Name : ".$donar_name."\n\nDonar Email : ".$donar_email."\n\nPayee Email ::".$payee_email."\n\nDonate Amount : ".$donar_amount."\n\nThank You.";

                    $error = AMAZON_WE_CAN_NOT_PROCESS_YOUR_PAYMENT_DUE_TO_AMAZONEXCEPTION_SOME_INTERNAL_ERROR_TRY_AGAIN_THANK_YOU;

                    $data['error'] = $error;

                    $this->load->view('default/paypal_error', $data);

                }

            }

        }

        /////////=====if sender token is received

        else {





            $email_template = $this->db->query("select * from `email_template` where task='New Fund Admin Notification'");

            $email_temp = $email_template->row();





            $email_address_from = $email_temp->from_address;

            $email_address_reply = $email_temp->reply_address;

            $email_subject = YOUR_PAYMENT_FAILED;

            $email_to = $donar_email;



            $str = sprintf(AMAZON_YOUR_PAYMENT_PROCESS_IS_CANCEL_CHECK_YOUR_ACCOUNT_BALANCE_TRY_AGAIN_THANKYOU, $donar_name);



            //"Hello ".$donar_name.",\n\nYour payment process is cancle.\n\n\nplease check your account balance or settings.Please Try again.\n\n\nThank You.";

            email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);



            $email_to = $payee_email;



            $str = sprintf(AMAZON_YOUR_PAYMENT_PROCESS_IS_CANCEL_CHECK_YOUR_ACCOUNT_BALANCE_TRY_AGAIN_THANKYOU, $donar_name);

            email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);



            $email_to = $email_address_from;

            $str = sprintf(AMAZON_HELLO_ADMINISTRATOR_PAYMENT_PROCESS_FAIL_DUE_TO_AMAZONEXCEPTION_INTERNAL_ERROR, $donar_name, $donar_email, $payee_email, $donar_amount);

            email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);



            redirect('home/');

        }

    }



    ///////////========if payment through amazon ===============**************

    ///////////========if Payapl Adaptive Payment Process  ===============**************

    ////================if preapproval  is active=======



    function preapprovereceipt() {





        $site_setting = site_setting();





        if ($site_setting['currency_code'] != '') {



            $currency_code = $site_setting['currency_code'];

        } else {

            $currency_code = 'USD';

        }







        $paypal = adaptive_paypal_detail();



        //////////=================Get PAYPAL SETTING  FROM DATABASE 	================





        $application_id = $paypal->application_id;

        $api_username = $paypal->paypal_username;

        $api_password = $paypal->paypal_password;

        $api_key = $paypal->paypal_signature;









        if ($paypal->site_status == 'sandbox') {

            $dbend_point = 'https://svcs.sandbox.paypal.com/';

            $db_paypalurl = 'https://www.sandbox.paypal.com/webscr&cmd=';

        } elseif ($paypal->site_status == 'live') {

            $dbend_point = 'https://svcs.paypal.com/';

            $db_paypalurl = 'https://www.paypal.com/webscr&cmd=';

        } else {

            $dbend_point = 'https://svcs.sandbox.paypal.com/';

            $db_paypalurl = 'https://www.sandbox.paypal.com/webscr&cmd=';

        }



        /* =========Called by CallerService.php.

         * ************************************************** */

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

        define('API_PASSWORD', $api_password);



        /**

          # API_Signature:The Signature associated with the API user. which is generated by paypal.

         */

        define('API_SIGNATURE', $api_key);



        /**

          # Endpoint: this is the server URL which you have to connect for submitting your API request.

         */

        define('API_ENDPOINT', $dbend_point);







        /**

          USE_PROXY: Set this variable to TRUE to route all the API requests through proxy.

          like define('USE_PROXY',TRUE);

         */

        define('USE_PROXY', FALSE);

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

        define('DEVICE_ID', 'mydevice');

        define('PAYPAL_REDIRECT_URL', $db_paypalurl);

        define('DEVELOPER_PORTAL', 'https://developer.paypal.com');

        define('LOGFILENAME', '../Log/logdata.log');

        define('DEVICE_IPADDRESS', $_SERVER['REMOTE_ADDR']);

        //This SDK supports only Name Value(NV) Request and Response Data Formats. for XML,SOAP,JSON use the SOAP SDK from X.com

        define('REQUEST_FORMAT', 'NV');

        define('RESPONSE_FORMAT', 'NV');

        define('X_PAYPAL_REQUEST_SOURCE', 'PHP_NVP_SDK_V1.1');





        // all the PayPal Header parameters are set in lib/callerservice.php





        $this->load->library('NVP_SampleConstants');



        $NVP_SampleConstants = new NVP_SampleConstants();





        /////=================par receipt file header part================





        try {





            if ($this->session->userdata("preapprovalKey") != '') {



                $preapprovalKey = $this->session->userdata("preapprovalKey");

            }



            if (empty($preapprovalKey)) {

                $preapprovalKey = $this->session->userdata("preapprovalKey");

            }







            $request_array = array(

                PreapprovalDetail::$preapprovalKey => $preapprovalKey,

                RequestEnvelope::$requestEnvelopeErrorLanguage => 'en_US'

            );





            $nvpStr = http_build_query($request_array, '', '&');



            $resArray = $NVP_SampleConstants->hash_call("AdaptivePayments/PreapprovalDetails", $nvpStr);







            /* Display the API response back to the browser.

              If the response from PayPal was a success, display the response parameters'

              If the response was an error, display the errors received using APIError.php.

             */

            $ack = strtoupper($resArray["responseEnvelope.ack"]);



            if ($ack != "SUCCESS") {



                ///$_SESSION['reshash']=$resArray;



                $data = array(

                    'reshash' => $resArray,

                );

                $this->session->set_userdata($data);







                //$location = "APIError.php";

                //header("Location: $location");

                ///=======APIError(4)

                ////////==fail mail to donar email=====





                $email_template = $this->db->query("select * from `email_template` where task='New Fund Admin Notification'");

                $email_temp = $email_template->row();





                $email_address_from = $email_temp->from_address;

                $email_address_reply = $email_temp->reply_address;



                $str = sprintf(PREAPPROVAL_HELLO_SIR_MADAM_PREAPPROVAL_PAYMENT_PROCESS_VIOLATED_CHECK_YOUR_PAYMENT_DETAILS_TRY_AGAIN_THANKYOU, $resArray['error(0).message']);



                //"Hello Sir/Madam,\n\nYour preapproval payment process is violated ".$resArray['error(0).message']."\n\n\nplease check your payment details.Try again.\n\n\nThank You.";



                $donar_email = $resArray['error(0).message'];



                $email_to = $resArray['senderEmail'];

                $email_subject = PREAPPROVAL_PAYMENT_PROCESS_FAILED;



                email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);





                $email_to = $email_address_from;

                $str = sprintf(PREAPPROVAL_ADMINISTRATOR_APIERROR4_PAYMENT_PROCESS_VIOLATED_CHECK_YOUR_SETTINGS_TRY_AGAIN_THANKYOU, $resArray['senderEmail']);

                //"Hello Administrator,\n\n APIError(4). Preapproval Payment process is violated. \n\nDonar Email : ".$resArray['senderEmail']."\n\n please check your settings.Try again.\n\n\nThank You.";

                email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);



                $error = sprintf(PREAPPROVAL_SORRY_YOUR_PREAPPROVAL_PAYMENT_PROCESS_VIOLATED_DUE_TO_ERROR_PLEASE_CHECK_YOUR_SETTINGS_TRY_AGAIN_THANKYOU, $resArray['error(0).message']);



                //"Sorry...Your preapproval payment process is violated due to ".$resArray['error(0).message']."\n\n\nplease check your settings.Try again.\n\n\nThank You.";



                $data['error'] = $error;

                $this->load->view('default/paypal_error', $data);

            } else {





                /* view response

                  echo $preapprovalKey;



                  foreach($resArray as $key => $value) {



                  echo "$key   ::  $value </br>";

                  } */





                if (strtoupper($resArray['responseEnvelope.ack']) == 'SUCCESS' && strtoupper($resArray['approved']) == 'TRUE' && $resArray['maxTotalAmountOfAllPayments'] != '' && $resArray['maxTotalAmountOfAllPayments'] > 0 && $resArray['senderEmail'] != '' && strtoupper($resArray['status']) == 'ACTIVE') {



                    /////////============insert all detail to the transaction table===========



                    $get_other_detail = $this->db->query("select * from temp_preapprove where preapprovalKey='" . $preapprovalKey . "'");

                    $detail = $get_other_detail->row();

                    $project_id = $detail->project_id;

                    $perk_id = $detail->perk_id;

                    $donar_name = $detail->name;

                    $donar_comment = $detail->comment;

                    $facebook = $detail->facebook;

                    $twitter = $detail->twitter;

                    $anonymous = $detail->temp_anonymous;

                    $donar_email = $resArray['senderEmail'];

                    $total_amount = $resArray['maxTotalAmountOfAllPayments'];





                    //	$transaction_fees=$paypal->transaction_fees;  ////= from the database



                    $site_setting = site_setting();

                    $prj = $this->project_model->get_project_user($project_id);





                    if ($prj['payment_type'] == '0') {

                        $transaction_fees = $site_setting['fixed_fees'];

                    } else {

                        $transaction_fees = $site_setting['flexible_fees'];

                    }







                    $admin_amount = (($total_amount * $transaction_fees) / 100);

                    $project_owner_amount = ($total_amount - $admin_amount);

                    $admin_amount = str_replace(',', '', number_format($admin_amount, 2));

                    $project_owner_amount = str_replace(',', '', number_format($project_owner_amount, 2));





                    $chk_trans_id = 1;

                    $chk_transaction = $this->db->query("select * from transaction where preapproval_key='" . $preapprovalKey . "'");



                    if ($chk_transaction->num_rows() > 0) {

                        $chk_trans_id = 0;

                    }





                    if ($chk_trans_id == 1) {



                        $this->db->query("update temp_preapprove set payment_done=1 where preapprovalKey='" . $preapprovalKey . "'");



                        $insert = $this->db->query("insert into transaction (`user_id`,`project_id`,`perk_id`,`amount`,`listing_fee`,`pay_fee`,`name`,`email`,`host_ip`,`comment`,`transaction_date_time`,`preapproval_key`,`preapproval_status`,`preapproval_total_amount`,`trans_anonymous`)values('" . $this->session->userdata('user_id') . "','" . $project_id . "','" . $perk_id . "','" . $project_owner_amount . "','0','" . $admin_amount . "','" . $donar_name . "','" . $donar_email . "','" . $_SERVER['REMOTE_ADDR'] . "','" . $donar_comment . "','" . date("Y-m-d H:i:s") . "','" . $preapprovalKey . "','FAIL','" . $total_amount . "','" . $anonymous . "')");







                        $get_don_project = $this->db->get_where('project', array('project_id' => $project_id));

                        $don_prj = $get_don_project->row_array();

                        if ($don_prj['amount_get'] != "") {

                            $amt = $don_prj['amount_get'];

                        } else {

                            $amt = 0;

                        }

                        $data_don = array(

                            'amount_get' => $amt + $project_owner_amount,

                        );

                        $this->db->where('project_id', $project_id);

                        $this->db->update('project', $data_don);









                        if ($perk_id != '' && $perk_id != '0') {



                            $query = $this->db->get_where('perk', array('perk_id' => $perk_id));

                            $pk = $query->row_array();

                            $data = array(

                                'perk_get' => ($pk['perk_get'] * 1) + 1,

                            );

                            $this->db->where('perk_id', $perk_id);

                            $this->db->update('perk', $data);

                        }









                        /////////============SUCCESS Email ==============











                        $prj = $this->project_model->get_project_user($project_id);



                        $login_user = get_user_detail($this->session->userdata('user_id'));









                        $payee_email = $resArray['senderEmail'];

                        $donar_email = $login_user['email'];

                        $donar_id = $this->session->userdata('user_id');

                        $project_id = $prj['project_id'];

                        $project_owner_email = $prj['email'];



                        $username = $prj['user_name'];

                        $project_name = $prj['project_title'];

                        $project_page_link = site_url('projects/' . $prj['url_project_title'] . '/' . $prj['project_id']);



                        $donor_name = $login_user['user_name'];

                        $donote_amount = $total_amount;

                        $donor_profile_link = site_url('member/' . $this->session->userdata('user_id'));



                        ///////////============admin alert==========



                        $email_template = $this->db->query("select * from `email_template` where task='New Fund Admin Notification'");

                        $email_temp = $email_template->row();



                        $email_message = $email_temp->message;

                        $email_subject = $email_temp->subject;

                        $email_address_from = $email_temp->from_address;

                        $email_address_reply = $email_temp->reply_address;

                        $email_to = $email_address_from;





                        $email_message = str_replace('{break}', '<br/>', $email_message);

                        $email_message = str_replace('{user_name}', $username, $email_message);

                        $email_message = str_replace('{project_name}', $project_name, $email_message);

                        $email_message = str_replace('{donor_name}', $donor_name, $email_message);

                        $email_message = str_replace('{donote_amount}', $donote_amount, $email_message);

                        $email_message = str_replace('{donor_profile_link}', $donor_profile_link, $email_message);

                        $email_message = str_replace('{project_page_link}', $project_page_link, $email_message);



                        $str = $email_message;

                        email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);







                        ///////=================owner alert===================



                        $user_not = $this->user_model->get_email_notification($prj['user_id']);



                        if (isset($user_not->add_fund)) {

                            if ($user_not->add_fund == '1') {



                                $email_template = $this->db->query("select * from `email_template` where task='New Fund Owner Notification'");

                                $email_temp = $email_template->row();



                                $email_message = $email_temp->message;

                                $email_subject = $email_temp->subject;



                                $email_address_from = $email_temp->from_address;

                                $email_address_reply = $email_temp->reply_address;







                                $email_message = str_replace('{break}', '<br/>', $email_message);

                                $email_message = str_replace('{user_name}', $username, $email_message);

                                $email_message = str_replace('{project_name}', $project_name, $email_message);

                                if ($anonymous == '2') {

                                    $email_message = str_replace('{donor_name}', $donor_name, $email_message);

                                    $email_message = str_replace('{donote_amount}', 'Anonymous amount', $email_message);

                                    $email_message = str_replace('{donor_profile_link}', $donor_profile_link, $email_message);

                                } elseif ($anonymous == '3') {

                                    $email_message = str_replace('{donor_name}', 'Anonymous donar', $email_message);

                                    $email_message = str_replace('{donote_amount}', 'Anonymous amount', $email_message);

                                    $email_message = str_replace('{donor_profile_link}', '', $email_message);

                                } else {

                                    $email_message = str_replace('{donor_name}', $donor_name, $email_message);

                                    $email_message = str_replace('{donote_amount}', $donote_amount, $email_message);

                                    $email_message = str_replace('{donor_profile_link}', $donor_profile_link, $email_message);

                                }

                                $email_message = str_replace('{project_page_link}', $project_page_link, $email_message);





                                $str = $email_message;

                                $email_to = $project_owner_email;



                                email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);

                            }

                        }



                        /////////////////==============donor alert================================



                        $user_not_donor = $this->user_model->get_email_notification($this->session->userdata('user_id'));



                        if (isset($user_not_donor->add_fund)) {

                            if ($user_not_donor->add_fund == '1') {







                                $email_template = $this->db->query("select * from `email_template` where task='New Fund Donor Notification'");

                                $email_temp = $email_template->row();



                                $email_message = $email_temp->message;

                                $email_subject = $email_temp->subject;



                                $email_address_from = $email_temp->from_address;

                                $email_address_reply = $email_temp->reply_address;







                                $email_message = str_replace('{break}', '<br/>', $email_message);

                                $email_message = str_replace('{user_name}', $username, $email_message);

                                $email_message = str_replace('{project_name}', $project_name, $email_message);

                                $email_message = str_replace('{donor_name}', $donor_name, $email_message);

                                $email_message = str_replace('{donote_amount}', $donote_amount, $email_message);

                                $email_message = str_replace('{donor_profile_link}', $donor_profile_link, $email_message);

                                $email_message = str_replace('{project_page_link}', $project_page_link, $email_message);





                                $str = $email_message;

                                $email_to = $donar_email;

                                email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);

                            }

                        }



                        $prj = $this->project_model->get_project_user($project_id);

                        $login_user = get_user_detail($this->session->userdata('user_id'));

                        $project = $prj;

                        $facebook_setting = facebook_setting();

                        ////// share on facebook 





                        $project_share_link = site_url('projects/' . $prj['url_project_title'] . '/' . $prj['project_id']);



                        if ($project['image'] != '' && is_file("upload/thumb/" . $project['image'])) {

                            $image = base_url() . 'upload/thumb/' . $project['image'];

                        } else {





                            $get_gallery = $this->project_model->get_all_project_gallery($project['project_id']);



                            $grcnt = 1;



                            if ($get_gallery) {

                                foreach ($get_gallery as $glr) {



                                    if ($glr->project_image != '' && is_file('upload/thumb/' . $glr->project_image) && $grcnt == 1) {

                                        $image = base_url() . 'upload/thumb/' . $glr->project_image;





                                        $grcnt = 2;

                                    }

                                }

                            } elseif ($grcnt == 1) {

                                $image = base_url() . 'images/no_img.jpg';

                            } else {

                                $image = base_url() . 'images/no_img.jpg';

                            }

                        }





                        $msg = $prj['project_title'];



                        if ($login_user['fb_uid'] != '' and $facebook == '1' and $login_user['fb_access_token'] != '') {



                            $fbAccessToken = $login_user['fb_access_token'];

                            $publishStream = $this->fb_connect->publish($login_user['fb_uid'], array(

                                'access_token' => $fbAccessToken,

                                'link' => $project_share_link,

                                'picture' => $image,

                                'name' => "Donation on " . $prj['project_title'],

                                'description' => $prj['project_summary']

                                    )

                            );

                        }



                        if ($prj['fb_uid'] != '' and $prj['facebook_wall_post'] == '1' and $prj['fb_access_token'] != '') {



                            $fbAccessToken = $prj['fb_access_token'];

                            $publishStream = $this->fb_connect->publish($prj['fb_uid'], array(

                                'access_token' => $fbAccessToken,

                                'link' => $project_share_link,

                                'picture' => $image,

                                'name' => "Donation on " . $prj['project_title'],

                                'description' => $prj['project_summary']

                                    )

                            );

                        }



                        if ($facebook_setting->facebook_user_id != '' and $facebook_setting->facebook_wall_post == '1' and $facebook_setting->facebook_access_token != '') {



                            $fbAccessToken = $facebook_setting->facebook_access_token;

                            $publishStream = $this->fb_connect->publish($facebook_setting->facebook_user_id, array(

                                'access_token' => $fbAccessToken,

                                'link' => $project_share_link,

                                'picture' => $image,

                                'name' => "Donation on " . $prj['project_title'],

                                'description' => $prj['project_summary']

                                    )

                            );

                        }







                        //////facebook end 	

                        /////////share on twitter 



                        $project_share_link = site_url('projects/' . $prj['url_project_title'] . '/' . $prj['project_id']);

                        $twitter_setting = twitter_setting();

                        $consumerKey = $twitter_setting->consumer_key;

                        $consumerSecret = $twitter_setting->consumer_secret;

                        $OAuthToken = $login_user['tw_oauth_token'];

                        $OAuthSecret = $login_user['tw_oauth_token_secret'];



                        error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);

                        try {

                            if ($login_user['tw_oauth_token'] != '0' and $login_user['tw_oauth_token_secret'] != '0' and $twitter == '1') {

                                // Insert your keys/tokens





                                $consumerKey = $twitter_setting->consumer_key;

                                $consumerSecret = $twitter_setting->consumer_secret;

                                $OAuthToken = $login_user['tw_oauth_token'];

                                $OAuthSecret = $login_user['tw_oauth_token_secret'];



                                // Full path to twitterOAuth.php (change OAuth to your own path)

                                $this->load->library('twitteroauth');

                                //require_once($_SERVER['DOCUMENT_ROOT'].'OAuth/twitteroauth.php');

                                // create new instance

                                $tweet = new TwitterOAuth($consumerKey, $consumerSecret, $OAuthToken, $OAuthSecret);



                                // Your Message

                                $message = date("Y-m-d H:i:s") . "New Donation on - " . $prj['project_title'] . " Take a look from here - " . $project_share_link;



                                // Send tweet 

                                $tweet->post('statuses/update', array('status' => "$message"));

                            }

                        } catch (Exception $e) {

                            return;

                        }



                        try {

                            if ($prj['tw_oauth_token'] != '0' and $prj['tw_oauth_token_secret'] != '0' and $prj['autopost_site'] == '1') {

                                // Insert your keys/tokens





                                $consumerKey = $twitter_setting->consumer_key;

                                $consumerSecret = $twitter_setting->consumer_secret;

                                $OAuthToken = $prj['tw_oauth_token'];

                                $OAuthSecret = $prj['tw_oauth_token_secret'];



                                // Full path to twitterOAuth.php (change OAuth to your own path)

                                $this->load->library('twitteroauth');

                                //require_once($_SERVER['DOCUMENT_ROOT'].'OAuth/twitteroauth.php');

                                // create new instance

                                $tweet = new TwitterOAuth($consumerKey, $consumerSecret, $OAuthToken, $OAuthSecret);



                                // Your Message

                                $message = date("Y-m-d H:i:s") . "New Donation on - " . $prj['project_title'] . " Take a look from here - " . $project_share_link;



                                // Send tweet 

                                $tweet->post('statuses/update', array('status' => "$message"));

                            }

                        } catch (Exception $e) {

                            return;

                        }



                        try {

                            if ($twitter_setting->tw_oauth_token != '0' and $twitter_setting->tw_oauth_token_secret != '0' and $twitter_setting->autopost_site == '1') {

                                // Insert your keys/tokens





                                $consumerKey = $twitter_setting->consumer_key;

                                $consumerSecret = $twitter_setting->consumer_secret;

                                $OAuthToken = $twitter_setting->tw_oauth_token;

                                $OAuthSecret = $twitter_setting->tw_oauth_token_secret;



                                // Full path to twitterOAuth.php (change OAuth to your own path)

                                $this->load->library('twitteroauth');

                                //require_once($_SERVER['DOCUMENT_ROOT'].'OAuth/twitteroauth.php');

                                // create new instance

                                $tweet = new TwitterOAuth($consumerKey, $consumerSecret, $OAuthToken, $OAuthSecret);



                                // Your Message

                                $message = date("Y-m-d H:i:s") . "New Donation on - " . $prj['project_title'] . " Take a look from here - " . $project_share_link;



                                // Send tweet 

                                $tweet->post('statuses/update', array('status' => "$message"));

                            }

                        } catch (Exception $e) {

                            return;

                        }





                        /////////// twitter end 	



                        redirect('home/index/done');

                    } else {

                        if ($detail->payment_done == '0') {











                            $email_template = $this->db->query("select * from `email_template` where task='New Fund Admin Notification'");

                            $email_temp = $email_template->row();





                            $email_address_from = $email_temp->from_address;

                            $email_address_reply = $email_temp->reply_address;





                            $prj = $this->project_model->get_project_user($project_id);



                            $login_user = get_user_detail($this->session->userdata('user_id'));





                            $donar_name = $login_user['user_name'];

                            $donar_email = $login_user['email'];



                            $project_id = $prj['project_id'];

                            $project_title = $prj['project_title'];

                            $url_project_title = $prj['url_project_title'];





                            $email_subject = PREAPPROVAL_PAYMENT_PROCESS_FAILED;

                            $email_to = $resArray['senderEmail'];



                            $str = sprintf(PREAPPROVAL_HELLO_YOUR_PREAPPROVAL_PROCESS_VIOLATED_DUE_TO_PREAPPROVAL_KEY_ALREADY_EXISTS_IN_SYSYTEM, $donar_name);



                            //"Hello ".$donar_name.",\n\nYour preapproval payment process is violated due to Preapproval Key already exists in the System. \n\n\nplease check your settings.Try again.\n\n\nThank You.";

                            email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);



                            $email_to = $donar_email;

                            $str = sprintf(PREAPPROVAL_HELLO_YOUR_PREAPPROVAL_PROCESS_VIOLATED_DUE_TO_PREAPPROVAL_KEY_ALREADY_EXISTS_IN_SYSYTEM, $donar_name);

                            email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);



                            $email_to = $email_address_from;





                            $str = sprintf(PREAPPROVAL_HELLO_ADMINISTRATOR_CATCHEXCEPTION4_PREAPPROVAL_PROCESS_VIOLATED_DUE_TO_PREAPPROVAL_KEY_ALREADY_EXISIS_IN_SYSTEM_PLEASE_CHECK_YOUR_SETTINGS_TRY_AGAIN_THANKYOU, $donar_name, $donar_email, $resArray['senderEmail']);

                            email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);

                            //"Hello Administrator,\n\n catchException(4). Preapproval Payment process is violated due to Preapproval Key already exists in the System.\n\n Donar Name : ".$donar_name."\n\nEmail : ".$donar_email."\n\nPayee Email : ".$resArray['senderEmail']."\n\nplease check your settings.Try again.\n\n\nThank You.";

                            //	redirect('home/index/done');





                            $error = PREAPPROVAL_SORRY_YOUR_PREAPPROVAL_PROCESS_IS_VIOLATED_DUE_TO_PREAPPROVAL_KEY_ALREADY_EXISTS_IN_SYSTEM_PLEASE_TRY_AGAIN_THANKYOU;



                            $data['error'] = $error;



                            $this->load->view('default/paypal_error', $data);

                        }redirect('home/index/done');

                    }

                }

            }

        } catch (Exception $ex) {



            throw new Exception('Error occurred in PaymentDetails method');



            ///==catchException(4)

            ////////==fail mail to donar email=====



            $email_template = $this->db->query("select * from `email_template` where task='New Fund Admin Notification'");

            $email_temp = $email_template->row();



            $email_address_from = $email_temp->from_address;

            $email_address_reply = $email_temp->reply_address;

            $email_subject = PREAPPROVAL_PAYMENT_PROCESS_FAILED;



            $prj = $this->project_model->get_project_user($project_id);



            $login_user = get_user_detail($this->session->userdata('user_id'));





            $donar_name = $login_user['user_name'];

            $donar_email = $login_user['email'];



            $project_id = $prj['project_id'];

            $project_title = $prj['project_title'];

            $url_project_title = $prj['url_project_title'];



            $email_to = $resArray['senderEmail'];



            $str = sprintf(PREAPPROVAL_HELLO_YPUR_PREAPPROVAL_PAYMENT_PROCESS_VIOLATED_DUE_TO_ERROR_OCCURED_IN_PAYMENTDETAILS_METHOD_PLEASE_CHECK_YOUR_SETTINGS_TRY_AGAIN_THANKYOU, $donar_name);



            //"Hello ".$donar_name.",\n\nYour preapproval payment process is violated due to Error occurred in PaymentDetails method. \n\n\nplease check your settings.Try again.\n\n\nThank You.";



            email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);



            $email_to = $donar_email;





            $str = sprintf(PREAPPROVAL_HELLO_YPUR_PREAPPROVAL_PAYMENT_PROCESS_VIOLATED_DUE_TO_ERROR_OCCURED_IN_PAYMENTDETAILS_METHOD_PLEASE_CHECK_YOUR_SETTINGS_TRY_AGAIN_THANKYOU, $donar_name);



            email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);



            $email_to = $email_address_from;



            $str = sprintf(PREAPPROVAL_HELLO_ADMINISTRATOR_CATCHEXCEPTION4_PREAPPROVAL_PAYMENT_PROCESS_IS_VIOLATED_DUE_TO_ERROR_OCCURED_IN_PAYMENTDETAILS_METHOD, $donar_name, $donar_email, $resArray['senderEmail']);



            //"Hello Administrator,\n\n catchException(4). Preapproval Payment process is violated due to Error occurred in PaymentDetails method.\n\n Donar Name : ".$donar_name."\n\nEmail : ".$donar_email."\n\nPayee Email : ".$resArray['senderEmail']."\n\nplease check your settings.Try again.\n\n\nThank You.";



            email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);

            ///redirect('home/');





            $error = PREAPPROVAL_PAYMENT_PROCESS_VIOLATED_DUE_TO_ERROR_IN_PAYMENTDETAILS_METHOD_CHECK_YOUR_SETTINGS_TRY_AGAIN_THANKYOU;



            $data['error'] = $error;

            $this->load->view('default/paypal_error', $data);

        }

    }



    ////================if preapproval  is active=======

    ////////////=====this function will check the if user api tokenm completed its transaction or not and RUN WITH CRON JOB===



    function getpaymentdetails() {





        $site_setting = site_setting();



        if ($site_setting['currency_code'] != '') {



            $currency_code = $site_setting['currency_code'];

        } else {

            $currency_code = 'USD';

        }





        $paypal = adaptive_paypal_detail();







        //////////=================Get PAYPAL SETTING  FROM DATABASE 	================

        $application_id = $paypal->application_id;

        $api_username = $paypal->paypal_username;

        $api_password = $paypal->paypal_password;

        $api_key = $paypal->paypal_signature;





        if ($paypal->site_status == 'sandbox') {



            $dbend_point = 'https://svcs.sandbox.paypal.com/';

            $db_paypalurl = 'https://www.sandbox.paypal.com/webscr&cmd=';

        } elseif ($paypal->site_status == 'live') {



            $dbend_point = 'https://svcs.paypal.com/';

            $db_paypalurl = 'https://www.paypal.com/webscr&cmd=';

        } else {



            $dbend_point = 'https://svcs.sandbox.paypal.com/';

            $db_paypalurl = 'https://www.sandbox.paypal.com/webscr&cmd=';

        }







        ///////////////==============Fees Payer Type=================

        /////////======The payer of PayPal fees.

        ///===Allowed values are:

        ///=== 1) SENDER     Sender pays all fees (for personal, implicit simple/parallel payments)

        ///=== 2) PRIMARYRECEIVER    Primary receiver pays all fees

        ///=== 3) EACHRECEIVER     Each receiver pays their own fee (default and personal payments)

        ///=== 4) SECONDARYONLY     Secondary receivers pay all fees (use only for chained payments with one secondary receiver)

        ///=====NOTE :: === The fee payer SENDER cannot be used if a primary receiver is specified ======



        $feesPayer = $paypal->fees_taken_from;



        /////////////===========Action Type===========

        /// Whether the Pay request pays the receiver or whether the Pay request is set up to create a payment requesbut not fulfill the payment until the Execute Pay request is called.

        //Allowable values are:

        //////=******************

        ///=== 1)PAY     Use this option if you are not using the Pay request in combinations with the ExecutePayment request.

        ///=== 2)CREATE    Use this option to set up the payment instructions with the SetPaymentOptions request and then execute the payment at a later time with the ExecutePayment request.

        ///=== 3)PAY_PRIMARY     For chained payments only, specify this value to delay payments to the secondary receivers; only the payment to the primary receiver is processed



        $actionType = 'PAY';





        /* =========Called by CallerService.php.

         * ************************************************** */

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

        define('API_PASSWORD', $api_password);



        /**

          # API_Signature:The Signature associated with the API user. which is generated by paypal.

         */

        define('API_SIGNATURE', $api_key);



        /**

          # Endpoint: this is the server URL which you have to connect for submitting your API request.

         */

        define('API_ENDPOINT', $dbend_point);







        /**

          USE_PROXY: Set this variable to TRUE to route all the API requests through proxy.

          like define('USE_PROXY',TRUE);

         */

        define('USE_PROXY', FALSE);

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

        define('DEVICE_ID', 'mydevice');

        define('PAYPAL_REDIRECT_URL', $db_paypalurl);

        define('DEVELOPER_PORTAL', 'https://developer.paypal.com');

        define('LOGFILENAME', '../Log/logdata.log');

        define('DEVICE_IPADDRESS', $_SERVER['REMOTE_ADDR']);

        //This SDK supports only Name Value(NV) Request and Response Data Formats. for XML,SOAP,JSON use the SOAP SDK from X.com

        define('REQUEST_FORMAT', 'NV');

        define('RESPONSE_FORMAT', 'NV');

        define('X_PAYPAL_REQUEST_SOURCE', 'PHP_NVP_SDK_V1.1');





        // all the PayPal Header parameters are set in lib/callerservice.php





        $this->load->library('NVP_SampleConstants');



        $NVP_SampleConstants = new NVP_SampleConstants();



        //session_start();











        try {



            /* if($_SESSION['payKey']!='')

              {

              $payKey = $_SESSION['payKey'];

              } */



            if ($this->session->userdata('payKey') != '') {

                $payKey = $this->session->userdata('payKey');

            }



            $request_array = array(

                PaymentDetails::$payKey => $payKey,

                RequestEnvelope::$requestEnvelopeErrorLanguage => 'en_US'

            );





            $nvpStr = http_build_query($request_array, '', '&');

            $resArray = $NVP_SampleConstants->hash_call("AdaptivePayments/PaymentDetails", $nvpStr);



            //echo "<pre>"; print_r($resArray);die;



            /* Display the API response back to the browser.

              If the response from PayPal was a success, display the response parameters'

              If the response was an error, display the errors received using APIError.php.

             */

            $ack = strtoupper($resArray["responseEnvelope.ack"]);





            if ($ack != "SUCCESS") {



                //$_SESSION['reshash']=$resArray;



                $data3 = array(

                    'reshash' => $resArray,

                );

                $this->session->set_userdata($data3);



                //$location = "APIError.php";

                //header("Location: $location");

                //echo "APIError(2)";



                $get_transaction_detail = $this->db->query("select * from temp_adaptive where paypal_paykey='" . $payKey . "'");



                $chk_trans = $get_transaction_detail->num_rows();

                $trans = $get_transaction_detail->row();





                $user_detail = get_user_detail($trans->user_id);





                ///////==fail mail to donar email=====



                $email_template = $this->db->query("select * from `email_template` where task='New Fund Admin Notification'");

                $email_temp = $email_template->row();





                $email_address_from = $email_temp->from_address;

                $email_address_reply = $email_temp->reply_address;

                $email_subject = YOUR_PAYMENT_FAILED;

                $email_to = $resArray["sender.email"];



                $str = sprintf(ADAPTIVE_HELLO_USER_DETAIL_PAYMENT_PROCESS_IS_VIOLATED_PLEASE_CHECK_YOUR_SETTINGS_TRY_AGAIN_THANKYOU, $user_detail['user_name']);

                //"Hello ".$user_detail['user_name'].",\n\nYour payment process is violated. \n\n\nplease check your settings.Try again.\n\n\nThank You.";



                email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);





                $prj = $this->project_model->get_project_user($trans->project_id);

                $project_title = $prj['project_title'];







                $str = sprintf(ADAPTIVE_HELLO_ADMINISTRATOR_APIERROR2_PAYMENT_PROCESS_VIOLATED_PLEASE_TRY_AGAIN_THANK_YOU, $user_detail['user_name'], $user_detail['email']);



                //"Hello Administrator,\n\n APIError(2). Payment process is violated.\n\nDonar Name : ".$user_detail['user_name']."\n\nDonar Email : ".$user_detail['email']." \n\nplease check your settings.Try again.\n\n\nThank You.";



                $email_to = $email_address_from;

                $email_subject = YOUR_PAYMENT_FAILED . " on Project" . $project_title . "(" . $trans->project_id . ")";

                email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);





                $error = ADAPTIVE_SORRY_YOUR_PAYMENT_PROCESS_VIOLATED_DUE_TO_PAYMENT_PROCESS_NOT_COMPLETED_PLEASE_TRY_AGAIN_THANKYOU;



                $data['error'] = $error;

                $this->load->view('default/paypal_error', $data);

            }

        } catch (Exception $ex) {





            throw new Exception('Error occurred in PaymentDetails method');



            //echo catchException(2);

            ///////==fail mail to donar email=====



            $email_template = $this->db->query("select * from `email_template` where task='New Fund Admin Notification'");

            $email_temp = $email_template->row();



            $email_address_from = $email_temp->from_address;

            $email_address_reply = $email_temp->reply_address;



            $get_transaction_detail = $this->db->query("select * from temp_adaptive where paypal_paykey='" . $payKey . "'");

            $chk_trans = $get_transaction_detail->num_rows();

            $trans = $get_transaction_detail->row();

            $user_detail = get_user_detail($trans->user_id);



            $str = sprintf(ADAPTIVE_HELLO_USER_DETAIL_PAYMENT_PROCESS_IS_VIOLATED_PLEASE_CHECK_YOUR_SETTINGS_TRY_AGAIN_THANKYOU, $user_detail['user_name']);

            $email_to = $user_detail['email'];

            $email_subject = YOUR_PAYMENT_FAILED;



            email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);



            $prj = $this->project_model->get_project_user($trans->project_id);

            $project_title = $prj['project_title'];





            $email_to = email_address_from;

            $email_subject = YOUR_PAYMENT_FAILED . " on Project" . $project_title . "(" . $trans->project_id . ")";



            $str = sprintf(ADAPTIVE_HELLO_ADMINISTRATOR_APIERROR2_PAYMENT_PROCESS_VIOLATED_PLEASE_TRY_AGAIN_THANK_YOU, $user_detail['name'], $user_detail['email']);

            email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);



            //"Hello Administrator,\n\n APIError(2). Payment process is violated.\n\nDonar Name : ".$user_detail['name']."\n\nDonar Email : ".$user_detail['email']." \n\nplease check your settings.Try again.\n\n\nThank You.";

            $error = ADAPTIVE_SORRY_YOUR_PAYMENT_PROCESS_VIOLATED_DUE_TO_ERROR_IN_PAYMENTDETAILS_METHOD_TRY_AGAIN_THANKYOU;

            $data['error'] = $error;

            $this->load->view('default/paypal_error', $data);

        }

        /* foreach($resArray as $key => $value) {



          echo "$key   ::  $value </br>";



          }

         */



        if (strtoupper($resArray['status']) == 'COMPLETED' && strtoupper($resArray['responseEnvelope.ack']) == 'SUCCESS') {



            $get_transaction_detail = $this->db->query("select * from temp_adaptive where paypal_paykey='" . $payKey . "'");

            $chk_trans = $get_transaction_detail->num_rows();

            $trans = $get_transaction_detail->row();





            $orignial_amount = $trans->amount;

            $user_id = $trans->user_id;

            $project_id = $trans->project_id;

            $perk_id = $trans->perk_id;

            $admin_amount = $trans->pay_fee;

            $donar_email = $resArray['senderEmail'];

            $facebook = $trans->facebook;

            $twitter = $trans->twitter;

            $ip = $trans->host_ip;

            $date_time = $trans->transaction_date_time;

            $anonymous = $trans->temp_anonymous;



            //$update_status=$this->db->query("update transaction set `paypal_adaptive_status`='SUCCESS' where paypal_paykey='".$payKey."'");



            $chk_trans_id = 1;

            $chk_transaction = $this->db->query("select * from transaction where paypal_paykey='" . $payKey . "'");



            if ($chk_transaction->num_rows() > 0) {

                $chk_trans_id = 0;

            }





            if ($chk_trans_id == 1) {



                /////////============insert all detail to the transaction table===========

                $this->db->query("update temp_adaptive set payment_done=1 where paypal_paykey='" . $payKey . "'");



                //$orignial_amount=$donar_amount-$admin_amount;



                $insert = $this->db->query("insert into transaction (`user_id`,`project_id`,`perk_id`,`amount`,`listing_fee`,`pay_fee`,`email`,`host_ip`,`transaction_date_time`,`paypal_paykey`,`paypal_adaptive_status`,`trans_anonymous`)values('" . $user_id . "','" . $project_id . "','" . $perk_id . "','" . $orignial_amount . "','0','" . $admin_amount . "','" . $donar_email . "','" . $ip . "','" . $date_time . "','" . $payKey . "','SUCCESS','" . $anonymous . "')");



                $last_transaction_id = mysql_insert_id();





                $get_don_project = $this->db->get_where('project', array('project_id' => $project_id));

                $don_prj = $get_don_project->row_array();

                if ($don_prj['amount_get'] != "") {

                    $amt = $don_prj['amount_get'];

                } else {

                    $amt = 0;

                }

                $data_don = array(

                    'amount_get' => $amt + $orignial_amount,

                );

                $this->db->where('project_id', $project_id);

                $this->db->update('project', $data_don);







                if ($perk_id != '' && $perk_id != '0') {



                    $query = $this->db->get_where('perk', array('perk_id' => $perk_id));

                    $pk = $query->row_array();

                    $data = array(

                        'perk_get' => ($pk['perk_get'] * 1) + 1,

                    );

                    $this->db->where('perk_id', $perk_id);

                    $this->db->update('perk', $data);

                }





                ////////==first step will completed mail to donar email=====









                $prj = $this->project_model->get_project_user($project_id);

                $login_user = get_user_detail($trans->user_id);

                $user_detail = get_user_detail($trans->user_id);













                ///////////==========affiliate earn=============



                $affiliate_setting = affiliate_setting();



                if ($affiliate_setting->affiliate_enable == 1) {





                    $pledge_commission = affiliate_commission_setting(2);





                    ////======donor is referral user then all/one pledge goes to referral



                    if ($login_user['reference_user_id'] != '' && $login_user['reference_user_id'] > 0) {

                        $get_affiliate_user = get_user_detail($login_user['reference_user_id']);



                        if ($get_affiliate_user) {



                            ///===get commission amount and add to user earn table with pending status





                            if ($pledge_commission) {



                                $pledge_commission_fee = $pledge_commission->commission;



                                if ($pledge_commission_fee > 0) {



                                    if ($pledge_commission->type == '%') {

                                        $final_pledge_fee = ($orignial_amount * $pledge_commission_fee) / 100;

                                    } else {

                                        $final_pledge_fee = $pledge_commission_fee;

                                    }







                                    ////=======check one time or every time payment enable



                                    if ($affiliate_setting->pay_commission_pledge == 1) {



                                        $earn_data = array(

                                            'user_id' => $get_affiliate_user['user_id'],

                                            'project_id' => $project_id,

                                            'perk_id' => $perk_id,

                                            'transaction_id' => $last_transaction_id,

                                            'earn_amount' => $final_pledge_fee,

                                            'earn_date' => date('Y-m-d H:i:s'),

                                            'earn_status' => 0

                                        );

                                        $this->db->insert('affiliate_user_earn', $earn_data);

                                    } else {



                                        $affiliate_user_id = $get_affiliate_user['user_id'];



                                        $check_user_already_get_commission = check_user_one_time_commission($affiliate_user_id, $project_id);



                                        if ($check_user_already_get_commission == 0) {

                                            $earn_data = array(

                                                'user_id' => $get_affiliate_user['user_id'],

                                                'project_id' => $project_id,

                                                'perk_id' => $perk_id,

                                                'transaction_id' => $last_transaction_id,

                                                'earn_amount' => $final_pledge_fee,

                                                'earn_date' => date('Y-m-d H:i:s'),

                                                'earn_status' => 0

                                            );

                                            $this->db->insert('affiliate_user_earn', $earn_data);

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



















                $project_title = $prj['project_title'];

                $url_project_title = $prj['url_project_title'];





                $username = $prj['user_name'];



                $project_owner_email = $prj['email'];



                $project_name = $project_title;

                $project_page_link = site_url('projects/' . $url_project_title . '/' . $project_id);



                $donor_name = $login_user['user_name'];

                $donote_amount = $trans->total_amount;

                $donor_profile_link = site_url('member/' . $trans->user_id);



                $donar_email = $user_detail['email'];





                ///////////============admin alert==========







                $email_template = $this->db->query("select * from `email_template` where task='New Fund Admin Notification'");

                $email_temp = $email_template->row();



                $email_message = $email_temp->message;

                $email_subject = $email_temp->subject;



                $email_address_from = $email_temp->from_address;

                $email_address_reply = $email_temp->reply_address;

                $email_to = $email_address_from;





                $email_message = str_replace('{break}', '<br/>', $email_message);

                $email_message = str_replace('{user_name}', $username, $email_message);

                $email_message = str_replace('{project_name}', $project_name, $email_message);

                $email_message = str_replace('{donor_name}', $donor_name, $email_message);

                $email_message = str_replace('{donote_amount}', $donote_amount, $email_message);

                $email_message = str_replace('{donor_profile_link}', $donor_profile_link, $email_message);

                $email_message = str_replace('{project_page_link}', $project_page_link, $email_message);





                $str = $email_message;



                email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);



                //////////////user followers////////////////

                $user_followers = userfollowers(get_authenticateUserID());



                if ($user_followers) {



                    $email_template = $this->db->query("select * from `email_template` where task='New Fund Follower Notification'");

                    $email_temp = $email_template->row();



                    $email_message = $email_temp->message;

                    $email_subject = $email_temp->subject;



                    $email_address_from = $email_temp->from_address;

                    $email_address_reply = $email_temp->reply_address;











                    foreach ($user_followers as $rs) {

                        $user_notification = usernotifications($rs->follow_by_user_id);

                        $chk_block = block_list(get_authenticateUserID(), $rs->follow_by_user_id);



                        if ($user_notification['follow_back'] == 1 && $chk_block == 0) {

                            $user_data = get_user_detail($rs->follow_by_user_id);



                            $email_message = str_replace('{break}', '<br/>', $email_message);

                            $email_message = str_replace('{follower_name}', $user_data['user_name'], $email_message);

                            $email_message = str_replace('{project_name}', $project_name, $email_message);

                            $email_message = str_replace('{donor_name}', $donor_name, $email_message);

                            $email_message = str_replace('{donote_amount}', $donote_amount, $email_message);

                            $email_message = str_replace('{donor_profile_link}', $donor_profile_link, $email_message);

                            $email_message = str_replace('{project_page_link}', $project_page_link, $email_message);

                            $str = $email_message;

                            $email_to = $user_data['email'];

                            email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);

                        }

                    }

                }









                ///////=================owner alert===================



                $user_not_own = $this->user_model->get_email_notification($prj['user_id']);



                if (isset($user_not_own->add_fund)) {

                    if ($user_not_own->add_fund == '1') {



                        $email_template = $this->db->query("select * from `email_template` where task='New Fund Owner Notification'");

                        $email_temp = $email_template->row();



                        $email_message = $email_temp->message;

                        $email_subject = $email_temp->subject;



                        $email_address_from = $email_temp->from_address;

                        $email_address_reply = $email_temp->reply_address;

                        $email_to = $project_owner_email;







                        $email_message = str_replace('{break}', '<br/>', $email_message);

                        $email_message = str_replace('{user_name}', $username, $email_message);

                        $email_message = str_replace('{project_name}', $project_name, $email_message);

                        if ($anonymous == '2') {

                            $email_message = str_replace('{donor_name}', $donor_name, $email_message);

                            $email_message = str_replace('{donote_amount}', 'Anonymous amount', $email_message);

                            $email_message = str_replace('{donor_profile_link}', $donor_profile_link, $email_message);

                        } elseif ($anonymous == '3') {

                            $email_message = str_replace('{donor_name}', 'Anonymous donar', $email_message);

                            $email_message = str_replace('{donote_amount}', 'Anonymous amount', $email_message);

                            $email_message = str_replace('{donor_profile_link}', '', $email_message);

                        } else {

                            $email_message = str_replace('{donor_name}', $donor_name, $email_message);

                            $email_message = str_replace('{donote_amount}', $donote_amount, $email_message);

                            $email_message = str_replace('{donor_profile_link}', $donor_profile_link, $email_message);

                        }

                        $email_message = str_replace('{project_page_link}', $project_page_link, $email_message);





                        $str = $email_message;





                        email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);

                    }

                }



                /////////////////==============donor alert================================





                $user_not_donor = $this->user_model->get_email_notification($this->session->userdata('user_id'));



                if (isset($user_not_donor->add_fund)) {

                    if ($user_not_donor->add_fund == '1') {





                        $email_template = $this->db->query("select * from `email_template` where task='New Fund Donor Notification'");

                        $email_temp = $email_template->row();



                        $email_message = $email_temp->message;

                        $email_subject = $email_temp->subject;



                        $email_address_from = $email_temp->from_address;

                        $email_address_reply = $email_temp->reply_address;

                        $email_to = $donar_email;





                        $email_message = str_replace('{break}', '<br/>', $email_message);

                        $email_message = str_replace('{user_name}', $username, $email_message);

                        $email_message = str_replace('{project_name}', $project_name, $email_message);

                        $email_message = str_replace('{donor_name}', $donor_name, $email_message);

                        $email_message = str_replace('{donote_amount}', $donote_amount, $email_message);

                        $email_message = str_replace('{donor_profile_link}', $donor_profile_link, $email_message);

                        $email_message = str_replace('{project_page_link}', $project_page_link, $email_message);





                        $str = $email_message;



                        email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);

                    }

                }



                /////////============SUCCESS Email ==============

                $prj = $this->project_model->get_project_user($project_id);

                $login_user = get_user_detail($this->session->userdata('user_id'));

                $project = $prj;

                $facebook_setting = facebook_setting();

                ////// share on facebook 





                $project_share_link = site_url('projects/' . $prj['url_project_title'] . '/' . $prj['project_id']);



                if ($project['image'] != '' && is_file("upload/thumb/" . $project['image'])) {

                    $image = base_url() . 'upload/thumb/' . $project['image'];

                } else {





                    $get_gallery = $this->project_model->get_all_project_gallery($project['project_id']);



                    $grcnt = 1;



                    if ($get_gallery) {

                        foreach ($get_gallery as $glr) {



                            if ($glr->project_image != '' && is_file('upload/thumb/' . $glr->project_image) && $grcnt == 1) {

                                $image = base_url() . 'upload/thumb/' . $glr->project_image;





                                $grcnt = 2;

                            }

                        }

                    } elseif ($grcnt == 1) {

                        $image = base_url() . 'images/no_img.jpg';

                    } else {

                        $image = base_url() . 'images/no_img.jpg';

                    }

                }





                $msg = $prj['project_title'];



                if ($login_user['fb_uid'] != '' and $facebook == '1' and $login_user['fb_access_token'] != '') {



                    $fbAccessToken = $login_user['fb_access_token'];

                    $publishStream = $this->fb_connect->publish($login_user['fb_uid'], array(

                        'access_token' => $fbAccessToken,

                        'link' => $project_share_link,

                        'picture' => $image,

                        'name' => "Donation on " . $prj['project_title'],

                        'description' => $prj['project_summary']

                            )

                    );

                }



                if ($prj['fb_uid'] != '' and $prj['facebook_wall_post'] == '1' and $prj['fb_access_token'] != '') {



                    $fbAccessToken = $prj['fb_access_token'];

                    $publishStream = $this->fb_connect->publish($prj['fb_uid'], array(

                        'access_token' => $fbAccessToken,

                        'link' => $project_share_link,

                        'picture' => $image,

                        'name' => "Donation on " . $prj['project_title'],

                        'description' => $prj['project_summary']

                            )

                    );

                }



                if ($facebook_setting->facebook_user_id != '' and $facebook_setting->facebook_wall_post == '1' and $facebook_setting->facebook_access_token != '') {



                    $fbAccessToken = $facebook_setting->facebook_access_token;

                    $publishStream = $this->fb_connect->publish($facebook_setting->facebook_user_id, array(

                        'access_token' => $fbAccessToken,

                        'link' => $project_share_link,

                        'picture' => $image,

                        'name' => "Donation on " . $prj['project_title'],

                        'description' => $prj['project_summary']

                            )

                    );

                }







                //////facebook end 	

                /////////share on twitter 



                $project_share_link = site_url('projects/' . $prj['url_project_title'] . '/' . $prj['project_id']);

                $twitter_setting = twitter_setting();

                $consumerKey = $twitter_setting->consumer_key;

                $consumerSecret = $twitter_setting->consumer_secret;

                $OAuthToken = $login_user['tw_oauth_token'];

                $OAuthSecret = $login_user['tw_oauth_token_secret'];



                error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);

                try {

                    if ($login_user['tw_oauth_token'] != '0' and $login_user['tw_oauth_token_secret'] != '0' and $twitter == '1') {

                        // Insert your keys/tokens





                        $consumerKey = $twitter_setting->consumer_key;

                        $consumerSecret = $twitter_setting->consumer_secret;

                        $OAuthToken = $login_user['tw_oauth_token'];

                        $OAuthSecret = $login_user['tw_oauth_token_secret'];



                        // Full path to twitterOAuth.php (change OAuth to your own path)

                        $this->load->library('twitteroauth');

                        //require_once($_SERVER['DOCUMENT_ROOT'].'OAuth/twitteroauth.php');

                        // create new instance

                        $tweet = new TwitterOAuth($consumerKey, $consumerSecret, $OAuthToken, $OAuthSecret);



                        // Your Message

                        $message = date("Y-m-d H:i:s") . "New Donation on - " . $prj['project_title'] . " Take a look from here - " . $project_share_link;



                        // Send tweet 

                        $tweet->post('statuses/update', array('status' => "$message"));

                    }

                } catch (Exception $e) {

                    return;

                }





                try {

                    if ($prj['tw_oauth_token'] != '0' and $prj['tw_oauth_token_secret'] != '0' and $prj['autopost_site'] == '1') {

                        // Insert your keys/tokens





                        $consumerKey = $twitter_setting->consumer_key;

                        $consumerSecret = $twitter_setting->consumer_secret;

                        $OAuthToken = $prj['tw_oauth_token'];

                        $OAuthSecret = $prj['tw_oauth_token_secret'];



                        // Full path to twitterOAuth.php (change OAuth to your own path)

                        $this->load->library('twitteroauth');

                        //require_once($_SERVER['DOCUMENT_ROOT'].'OAuth/twitteroauth.php');

                        // create new instance

                        $tweet = new TwitterOAuth($consumerKey, $consumerSecret, $OAuthToken, $OAuthSecret);



                        // Your Message

                        $message = date("Y-m-d H:i:s") . "New Donation on - " . $prj['project_title'] . " Take a look from here - " . $project_share_link;



                        // Send tweet 

                        $tweet->post('statuses/update', array('status' => "$message"));

                    }

                } catch (Exception $e) {

                    return;

                }





                try {

                    if ($twitter_setting->tw_oauth_token != '0' and $twitter_setting->tw_oauth_token_secret != '0' and $twitter_setting->autopost_site == '1') {

                        // Insert your keys/tokens





                        $consumerKey = $twitter_setting->consumer_key;

                        $consumerSecret = $twitter_setting->consumer_secret;

                        $OAuthToken = $twitter_setting->tw_oauth_token;

                        $OAuthSecret = $twitter_setting->tw_oauth_token_secret;



                        // Full path to twitterOAuth.php (change OAuth to your own path)

                        $this->load->library('twitteroauth');

                        //require_once($_SERVER['DOCUMENT_ROOT'].'OAuth/twitteroauth.php');

                        // create new instance

                        $tweet = new TwitterOAuth($consumerKey, $consumerSecret, $OAuthToken, $OAuthSecret);



                        // Your Message

                        $message = date("Y-m-d H:i:s") . "New Donation on - " . $prj['project_title'] . " Take a look from here - " . $project_share_link;



                        // Send tweet 

                        $tweet->post('statuses/update', array('status' => "$message"));

                    }

                } catch (Exception $e) {

                    return;

                }





                /////////// twitter end 	



                redirect('home/index/done');

            } else {

                if ($trans->payment_done == '0') {











                    ///////==fail mail to donar email=====



                    $email_template = $this->db->query("select * from `email_template` where task='New Fund Admin Notification'");

                    $email_temp = $email_template->row();





                    $email_address_from = $email_temp->from_address;

                    $email_address_reply = $email_temp->reply_address;







                    $get_transaction_detail = $this->db->query("select * from temp_adaptive where paypal_paykey='" . $payKey . "'");



                    $chk_trans = $get_transaction_detail->num_rows();

                    $trans = $get_transaction_detail->row();





                    $user_detail = get_user_detail($trans->user_id);







                    $str = sprintf(ADAPTIVE_HELLO_YOUR_PAYMENT_PROCESS_VIOLATED_DUE_TO_PAYPAL_AP_KEY_ALREADY_EXISTS_IN_SYSTEM_PLEASE_CHECK_YOUR_SETTINGS_TRY_AGAIN_THANKYOU, $user_detail['user_name']);



                    //"Hello ".$user_detail['user_name'].",\n\nYour payment process is violated due to Paypal AP key already exists in the System. \n\n\nplease check your settings.Try again.\n\n\nThank You.";

                    $email_subject = YOUR_PAYMENT_FAILED;

                    $email_to = $user_detail['email'];

                    email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);









                    $prj = $this->project_model->get_project_user($trans->project_id);

                    $project_title = $prj['project_title'];



                    $email_to = $email_address_from;

                    $email_subject = YOUR_PAYMENT_FAILED . " on Project" . $project_title . "(" . $trans->project_id . ")";



                    $str = sprintf(ADAPTIVE_HELLO_ADMINISTRATOR_APIERROR2_PAYMENT_PROCESS_VIOLATED_DUE_TO_PAYPAL_AP_KEY_ALREADY_EXISTS_IN_SYSTEM_PLEASE_CHECK_YOUR_SETTINGS_TRY_AGAIN_THANK_YOU, $user_detail['user_name'], $user_detail['email']);



                    //"Hello Administrator,\n\n APIError(2). Payment process is violated due to Paypal AP key already exists in the System.\n\nDonar Name : ".$user_detail['user_name']."\n\nDonar Email : ".$user_detail['email']." \n\nplease check your settings.Try again.\n\n\nThank You.";						

                    email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);





                    //	redirect('home/index/done');

                    $error = ADAPTIVE_SORRY_YOUR_PAYMENT_PROCESS_VIOLATED_DUE_TO_PAYPAL_AP_KEY_ALREADY_EXISTS_IN_SYSTEM_PLEASE_TRY_AGAIN_THANKYOU;



                    $data['error'] = $error;





                    $this->load->view('default/paypal_error', $data);

                }redirect('home/index/done');

            }

        }


    }



    ///////////========End Payapl Adaptive Payment Process  ===============**************

    ///////////========if payment through normal paypal ===============**************



    function success() {

        redirect('home/index/done');

    }



    function cancel() {

        redirect('home');

    }



    function ipn() {

        $vals = array();

        $strtemp = '';

        foreach ($_POST as $key => $value) {

            $value = urlencode(stripslashes($value));

            echo "$key=$value" . "<br>";



            $vals[$key] = $value;

            echo $strtemp.= $key . "=" . $value . ",";

        }

        log_message('error', "IPNvivek DATA:" . $strtemp);

        //log_message('error',"At tome of insert Paypal DATA:".$strtemp);

        $this->payment_model->transaction_insert($vals);

    }



    function tweettest() {



        /////////share on twitter 

        $prj = $this->project_model->get_project_user(1);

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

        $donote_amount = "200";

        $donor_profile_link = site_url('member/' . $this->session->userdata('user_id'));

        $project_share_link = site_url('projects/' . $prj['url_project_title'] . '/' . $prj['project_id']);

        //

        $msg = 'Website professional';

        $image = 'http://rockersinfo.com/images/logo.jpg';

        $project_share_link = "rockersinfo.com";



        /* $login_user['fb_uid']='100002296977349';

          $fbAccessToken='AAABZBEYAmXyQBAElZAdHMqu0iZCl8gNDW06Ew7ZBWbH9z5gPHzbC0ipqX1FZBffdsP0w5RgFfkFEhAobHyKfsaWxRLSCLUpMG91nBy5SjRwZDZD';

          $publishStream = $this->fb_connect->publish($login_user['fb_uid'],array(

          'access_token' => $fbAccessToken,

          'link'    =>$project_share_link,

          'picture' => $image,

          'name'    => "Fb Acc".$prj['project_title'],

          'description'=> $prj['project_summary']

          )

          ); */

        error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);

        try {

            $twitter = '1';

            $login_user['consumer_key'] = 'TCQpqDuYWrvB82ESuEwCA';

            $login_user['consumer_secret'] = 'Vh5Pcwl96EYqnn7mIJ2dDMFLZQWny49h7ln704j8';

            $login_user['tw_oauth_token'] = '37625027-pM3TGLlfbN5iG25u0nCtMQAnY4A6KrFiaEPDUnbp1';

            $login_user['tw_oauth_token_secret'] = 'GPFG9LRoMb4piowW0fZYPA1OyBnDbfAF4kZ93eI8vTE';



            if ($login_user['tw_oauth_token'] != '0' and $login_user['tw_oauth_token_secret'] != '0' and $twitter == '1') {

                // Insert your keys/tokens



                $project_share_link = site_url('projects/' . $prj['url_project_title'] . '/' . $prj['project_id']);

                $twitter_setting = twitter_setting();

                $consumerKey = $twitter_setting->consumer_key;

                $consumerSecret = $twitter_setting->consumer_secret;

                $OAuthToken = $login_user['tw_oauth_token'];

                $OAuthSecret = $login_user['tw_oauth_token_secret'];



                // Full path to twitterOAuth.php (change OAuth to your own path)

                $this->load->library('twitteroauth');

                //require_once($_SERVER['DOCUMENT_ROOT'].'OAuth/twitteroauth.php');

                // create new instance

                $tweet = new TwitterOAuth($consumerKey, $consumerSecret, $OAuthToken, $OAuthSecret);



                // Your Message

                $message = date("Y-m-d H:i:s") . "Default setting From payment page I have supported the project - " . $prj['project_title'] . " Take a look from here - " . $project_share_link;



                // Send tweet 

                $tweet->post('statuses/update', array('status' => "$message"));

            }

        } catch (Exception $e) {

            return;

        }



        try {

            $twitter = '1';

            $login_user['consumer_key'] = 'SY60HzApDZROUhvSlzf0Hg';

            $login_user['consumer_secret'] = 'xx16j873jAeXTb3k6fBnS1ZsTyu1B6cljXLDeqbyOM';

            $login_user['tw_oauth_token'] = '288651935-2sQFhZbNaf7d8HeyJ3FaM0YG7Y1lCavo5DFmQMRk';

            $login_user['tw_oauth_token_secret'] = 'XTezhqmYldfGZP77zBafEMCsMv7QvgwU3DwX0ndNc';



            if ($login_user['tw_oauth_token'] != '0' and $login_user['tw_oauth_token_secret'] != '0' and $twitter == '1') {

                // Insert your keys/tokens



                $project_share_link = site_url('projects/' . $prj['url_project_title'] . '/' . $prj['project_id']);

                /* $twitter_setting = twitter_setting();

                  $consumerKey =$login_user['consumer_key'];

                  $consumerSecret =  $login_user['consumer_secret']; */

                $twitter_setting = twitter_setting();

                $consumerKey = $twitter_setting->consumer_key;

                $consumerSecret = $twitter_setting->consumer_secret;

                $OAuthToken = $login_user['tw_oauth_token'];

                $OAuthSecret = $login_user['tw_oauth_token_secret'];



                // Full path to twitterOAuth.php (change OAuth to your own path)

                $this->load->library('twitteroauth');

                //require_once($_SERVER['DOCUMENT_ROOT'].'OAuth/twitteroauth.php');

                // create new instance

                $tweet = new TwitterOAuth($consumerKey, $consumerSecret, $OAuthToken, $OAuthSecret);



                // Your Message

                $message = date("Y-m-d H:i:s") . "From Default setting payment page I have supported the project - " . $prj['project_title'] . " Take a look from here - " . $project_share_link;



                // Send tweet 

                $tweet->post('statuses/update', array('status' => "$message"));

            }

        } catch (Exception $e) {

            return;

        }



        //facebook









        $login_user['fb_uid'] = '632331988';

        $fbAccessToken = 'AAABZBEYAmXyQBAFdHWZCFogZAIQOVcFbZCijKdk4ODCyVM7TW7yz2A0H5PwSMVqIdRJHZBuvp4vbmBtVPayQTNvNwJjzcnV0ZD';

        $publishStream = $this->fb_connect->publish($login_user['fb_uid'], array(

            'access_token' => $fbAccessToken,

            'link' => $project_share_link,

            'picture' => $image,

            'name' => "Fb Acc" . $prj['project_title'],

            'description' => $prj['project_summary']

                )

        );

        die();

    }



    ///////////========if payment through normal paypal ===============**************

    ////---------paypal wallet----------//////		

    function donate_paypal($id, $amt, $project_id, $donar_amount, $donar_comment, $perk_id, $anonymous, $facebook, $twitter) {



        $site_setting = site_setting();

        $wallet_setting = wallet_setting();

        $minimum_amount = $wallet_setting->wallet_minimum_amount;

        $chk_amt = $amt;







        $num = 'WL' . randomNumber(12);



        $this->load->library('paypal_lib');



        $Paypal_Email = $this->get_gateway_result('1', 'paypal_email');

        $Paypal_Status = $this->get_gateway_result('1', 'site_status');



	





        $Paypal_Url = 'https://www.sandbox.paypal.com/cgi-bin/webscri';



        if ($Paypal_Status['value'] == 'sandbox') {

           $Paypal_Url = 'https://www.sandbox.paypal.com/cgi-bin/webscri';

        }

        if ($Paypal_Status['value'] == 'live') {

          $Paypal_Url = 'https://www.paypal.com/cgi-bin/webscri';

        }



       // $wallet_setting = wallet_setting();

        //$wallet_add_fees = $wallet_setting->wallet_add_fees;

       // $add_fees = number_format((($amt * $wallet_add_fees) / 100), 2);



       // $total = number_format(($add_fees + $amt), 2);

 		$total = number_format($amt, 2);



        $site_setting = site_setting();

        $user_detail = get_user_detail($this->session->userdata('user_id'));







        $this->paypal_lib->add_field('currency_code', $site_setting['currency_code']);

        $this->paypal_lib->add_field('business', $Paypal_Email['value']);

      //  $this->paypal_lib->add_field('return', site_url('payment/donate_paypalsuccess/'));
		
	     $this->paypal_lib->add_field('return', site_url('payment/donate_paypalipn/'));
		//Have Commented the original return url line  and added this to make it work in localhost.

        $this->paypal_lib->add_field('cancel_return', site_url('payment/donate_paypalsuccess/'));

        $this->paypal_lib->add_field('notify_url', site_url('payment/donate_paypalipn/')); // <-- IPN url

        $this->paypal_lib->add_field('custom', str_replace(',', '', $amt) . '#' . $id . '#' . $this->session->userdata('user_id') . '#' . $project_id . '#' . str_replace(',', '', $donar_amount) . '#' . $donar_comment . '#' . $perk_id . '#' . $anonymous . '#' . $facebook . '#' . $twitter); // <-- Verify return

        $this->paypal_lib->paypal_url = $Paypal_Url;



        $this->paypal_lib->add_field('item_name', 'New Fund added in the Wallet in ' . $site_setting['site_name'] . ' by ' . $user_detail['user_name'] . ' ' . $user_detail['last_name']);

        $this->paypal_lib->add_field('item_number', $num);

        $this->paypal_lib->add_field('amount', str_replace(',', '', $total));



        $this->paypal_lib->button('Add Amount to wallet and donate');



        $data['paypal_form'] = $this->paypal_lib->paypal_auto_form();

    }



    function donate_paypalsuccess() {

        $msg = 'done';



        redirect("home/index/done");

    }



function donate_paypalipn()
	{		
				
				
				$vals = array();
				$strtemp='';
				
				foreach ($_POST as $key => $value) 
				{					
					$vals[$key] = $value;
					$strtemp.= $key."=".$value.",";
				}
				
				
				log_message('error',"IPN DATA:".$strtemp);
				
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
						
						$admin_status='Confirm';
				
						
						
					
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
										
					
	$site_setting = site_setting();
    $wallet_setting = wallet_setting();				
	
	$project_id=$custom[3];
	$donar_amount=$custom[4];
	$donar_comment=$custom[5];
	$perk_id=$custom[6];
	$anonymous=$custom[7];	
	$facebook=$custom[8];	
	$twitter=$custom[9];				

	$prj = $this->project_model->get_project_user($project_id);
	$project_id=$prj['project_id'];
	
	$pay_fee=0;
	
	$login_user = get_user_detail($user_id);	
	$donar_name=$login_user['user_name'];
	$donar_email=$login_user['email'];
		
	$payee_email=$login_user['email'];
	$donar_id=$user_id;
			
	
				///////========if PREAPPROVAL IS ACTIVE FOR WALLET	
				if($wallet_setting->wallet_payment_type=='1'){
					$donate_status='0';
					$wallet_payment_status='0';
				} else {				
					$donate_status='1';
					$wallet_payment_status='1';
				}
				
		$trw2='FS'.randomNumber(10);
	
			$insert=$this->db->query("insert into transaction (`user_id`,`project_id`,`perk_id`,`amount`,`listing_fee`,`pay_fee`,`email`,`host_ip`,`paypal_email`,`comment`,`transaction_date_time`,`wallet_transaction_id`,`wallet_payment_status`,`trans_anonymous`)values('".$user_id."','".$project_id."','".$perk_id."','".$donar_amount."','0','".$pay_fee."','".$login_user['email']."','".$_SERVER['REMOTE_ADDR']."','".$login_user['email']."','".$donar_comment."','".date("Y-m-d H:i:s")."','".$trw2."','".$wallet_payment_status."','".$anonymous."')");
				
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
										'amount_get' => $amt + $donar_amount,
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
									
									
						
						
						
						
			if($wallet_setting->wallet_payment_type=='0')
			{
						
				///////////==========affiliate earn=============
			
				$affiliate_setting=affiliate_setting();
				
				if($affiliate_setting->affiliate_enable==1) 
				{ 
					
					
					$pledge_commission=affiliate_commission_setting(2);
					
					
					
					
					////======project owner is referral user then all/one pledge goes to referral
					
					/*if($prj['reference_user_id']!='' && $prj['reference_user_id']>0)
					{
						$get_affiliate_user=get_user_detail($prj['reference_user_id']);
						
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
										$final_pledge_fee=($donar_amount*$pledge_commission_fee)/100;
									}
									else
									{
										$final_pledge_fee=$pledge_commission_fee;
									}
									
									
									$earn_data=array(
									'user_id'=>$get_affiliate_user['user_id'],
									'project_id'=>$project_id,
									'perk_id'=>$perk_id,
									'transaction_id'=>$last_transaction_id,
									'earn_amount'=>$final_pledge_fee,
									'earn_date'=>date('Y-m-d H:i:s'),
									'earn_status'=>0
									);
									$this->db->insert('affiliate_user_earn',$earn_data);
									
									
								}
								
							}					
							
						
						}
						
						
					}*/
					
					
					
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
										$final_pledge_fee=($donar_amount*$pledge_commission_fee)/100;
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
										'transaction_id'=>$last_transaction_id,
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
											'transaction_id'=>$last_transaction_id,
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
			}
					
									
									$trw='FS'.randomNumber(10);
				
//	

	$owner_amount = $donar_amount;	
	
	////////====if INSTANT then cut fees 
	
//if($site_setting['enable_funding_option'] =='0' and $don_prj['payment_type'] =='0' and $wallet_setting->wallet_payment_type=='0')

if($wallet_setting->wallet_payment_type=='0'){
	$owner_amount = $donar_amount * $site_setting['instant_fees']/100;
}
									
				$update_donor_wallet=$this->db->query("insert into wallet(`credit`,`user_id`,`admin_status`,`wallet_date`,`wallet_transaction_id`,`wallet_payee_email`,`wallet_ip`,`gateway_id`,`project_id`,`donate_status`,`wallet_anonymous`)values('".$donar_amount."','".$user_id."','Confirm','".date("Y-m-d H:i:s")."','".$trw2."','Internal','".$_SERVER['REMOTE_ADDR']."','0','".$project_id."','".$donate_status."','".$anonymous."')");
				
			
				$insert_owner_wallet=$this->db->query("insert into wallet(`debit`,`user_id`,`admin_status`,`wallet_date`,`wallet_transaction_id`,`wallet_payee_email`,`wallet_ip`,`gateway_id`,`project_id`,`donate_status`,`wallet_anonymous`)values('".$owner_amount."','".$prj['user_id']."','Confirm','".date("Y-m-d H:i:s")."','".$trw2."','Internal','".$_SERVER['REMOTE_ADDR']."','0','".$project_id."','".$donate_status."','".$anonymous."')");
				
				
				
				$prj = $this->project_model->get_project_user($project_id);
				$login_user = get_user_detail($this->session->userdata('user_id'));	
				$user_detail = get_user_detail($prj['user_id']);
				
				$project_id=$prj['project_id'];		
			 	$project_title=$prj['project_title'];
				$url_project_title=$prj['url_project_title'];
				$project_owner_email=$user_detail['paypal_email'];					
			
				$username =$prj['user_name'];
				$donar_email=$login_user['email'];
				$project_owner_email=$prj['email'];
				
				$project_name=$project_title;
				$project_page_link=site_url('projects/'.$url_project_title.'/'.$project_id);
				
				$donor_name=$login_user['user_name'];
				$donote_amount=$donar_amount;			

				$donor_profile_link=site_url('member/'.$user_id);				
				
				$prj = $this->project_model->get_project_user($project_id);
				$login_user = get_user_detail($user_id);	
				$project = $prj;
				$facebook_setting = facebook_setting();
				////// share on facebook 
					
				/*		
						$project_share_link=site_url('projects/'.$prj['url_project_title'].'/'.$prj['project_id']);
						
						if($project['image']!='' && is_file("upload/thumb/".$project['image'])){ 
								$image=base_url().'upload/thumb/'.$project['image'];	  
							} 
							else{ 
							
							
								$get_gallery=$this->project_model->get_all_project_gallery($project['project_id']);
								
								$grcnt=1;
								
								if($get_gallery)
								{
									foreach($get_gallery as $glr)
									{
									
										if($glr->project_image!='' && is_file('upload/thumb/'.$glr->project_image) && $grcnt==1 )
										{
											$image=base_url().'upload/thumb/'.$glr->project_image;							
										
										
											$grcnt=2;
										}
									
									}
								}
								elseif($grcnt==1)
								{							
									$image=base_url().'images/no_img.jpg';
									
								}
								else
								{
									$image=base_url().'images/no_img.jpg';
								}
							
							
						}  
						
				 		
						$msg=$prj['project_title'];
						
							if($login_user['fb_uid']!='' and $facebook=='1' and $login_user['fb_access_token']!='' and $facebook_setting->facebook_wall_post=='1' ){
				
								$fbAccessToken = $login_user['fb_access_token'];
								$publishStream = $this->fb_connect->publish($login_user['fb_uid'],array(
										'access_token' => $fbAccessToken,
										'link'    =>$project_share_link,
										'picture' => $image,
										'name'    => "Donation on ".$prj['project_title'],
										'description'=> $prj['project_summary']
										)
								);
							}
							
							if($prj['fb_uid']!='' and $prj['facebook_wall_post']=='1' and $prj['fb_access_token']!='' and $facebook_setting->facebook_wall_post=='1' ){
				
								$fbAccessToken = $prj['fb_access_token'];
								$publishStream = $this->fb_connect->publish($prj['fb_uid'],array(
										'access_token' => $fbAccessToken,
										'link'    =>$project_share_link,
										'picture' => $image,
										'name'    => "Donation on ".$prj['project_title'],
										'description'=> $prj['project_summary']
										)
								);
							}
							
						if($facebook_setting->facebook_user_id!='' and $facebook_setting->facebook_wall_post=='1' and $facebook_setting->facebook_access_token!=''){
				
								$fbAccessToken = $facebook_setting->facebook_access_token;
								$publishStream = $this->fb_connect->publish($facebook_setting->facebook_user_id,array(
										'access_token' => $fbAccessToken,
										'link'    =>$project_share_link,
										'picture' => $image,
										'name'    => "Donation on ".$prj['project_title'],
										'description'=> $prj['project_summary']
										)
								);
						}
						
						
				
						//////facebook end 	
					
					/////////share on twitter 
						
						$project_share_link=site_url('projects/'.$prj['url_project_title'].'/'.$prj['project_id']);
						$twitter_setting = twitter_setting();
						$consumerKey = $twitter_setting->consumer_key;
						$consumerSecret = $twitter_setting->consumer_secret;
						$OAuthToken = $login_user['tw_oauth_token'];
						$OAuthSecret = $login_user['tw_oauth_token_secret'];
						
				error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
							try
							{
							if($login_user['tw_oauth_token']!='0' and $login_user['tw_oauth_token_secret']!='0' and $twitter=='1' and $twitter_setting->autopost_site=='1'){
							// Insert your keys/tokens
						
							
							$consumerKey = $twitter_setting->consumer_key;
						    $consumerSecret = $twitter_setting->consumer_secret;
							$OAuthToken = $login_user['tw_oauth_token'];
							$OAuthSecret = $login_user['tw_oauth_token_secret'];
							
							// Full path to twitterOAuth.php (change OAuth to your own path)
							$this->load->library('twitteroauth');
							//require_once($_SERVER['DOCUMENT_ROOT'].'OAuth/twitteroauth.php');
							// create new instance
							$tweet = new TwitterOAuth($consumerKey, $consumerSecret, $OAuthToken, $OAuthSecret);
							
							// Your Message
							$message =date("Y-m-d H:i:s")."New Donation on - ".$prj['project_title']." Take a look from here - ".$project_share_link;
										
										// Send tweet 
										$tweet->post('statuses/update', array('status' => "$message"));
									}
							}catch(Exception $e)
							{
								return ;
							}
							
							
							try
							{
									if($prj['tw_oauth_token']!='0' and $prj['tw_oauth_token_secret']!='0' and $prj['autopost_site']=='1' and $twitter_setting->autopost_site=='1'){
									// Insert your keys/tokens
								
									
									$consumerKey = $twitter_setting->consumer_key;
									$consumerSecret = $twitter_setting->consumer_secret;
									$OAuthToken = $prj['tw_oauth_token'];
									$OAuthSecret = $prj['tw_oauth_token_secret'];
									
									// Full path to twitterOAuth.php (change OAuth to your own path)
									$this->load->library('twitteroauth');
									//require_once($_SERVER['DOCUMENT_ROOT'].'OAuth/twitteroauth.php');
									// create new instance
									$tweet = new TwitterOAuth($consumerKey, $consumerSecret, $OAuthToken, $OAuthSecret);
									
									// Your Message
									$message =date("Y-m-d H:i:s")."New Donation on - ".$prj['project_title']." Take a look from here - ".$project_share_link;
												
												// Send tweet 
												$tweet->post('statuses/update', array('status' => "$message"));
											}
							}catch(Exception $e)
							{
								return ;
							}
							
							
							try
							{
								if($twitter_setting->tw_oauth_token!='0' and $twitter_setting->tw_oauth_token_secret!='0' and $twitter_setting->autopost_site=='1'){
								// Insert your keys/tokens
							
								
								$consumerKey = $twitter_setting->consumer_key;
								$consumerSecret = $twitter_setting->consumer_secret;
								$OAuthToken = $twitter_setting->tw_oauth_token;
								$OAuthSecret = $twitter_setting->tw_oauth_token_secret;
								
								// Full path to twitterOAuth.php (change OAuth to your own path)
								$this->load->library('twitteroauth');
								//require_once($_SERVER['DOCUMENT_ROOT'].'OAuth/twitteroauth.php');
								// create new instance
								$tweet = new TwitterOAuth($consumerKey, $consumerSecret, $OAuthToken, $OAuthSecret);
								
								// Your Message
								$message =date("Y-m-d H:i:s")."New Donation on - ".$prj['project_title']." Take a look from here - ".$project_share_link;
											
											// Send tweet 
											$tweet->post('statuses/update', array('status' => "$message"));
										}
								}catch(Exception $e)
							{
								return ;
							}			
								
				*/
					/////////// twitter end 	
				///////////============admin alert==========
				
				
				
				$email_template=$this->db->query("select * from `email_template` where task='New Fund Admin Notification'");
				$email_temp=$email_template->row();				
				
				if($email_temp)
				{				
					$email_message=$email_temp->message;
					$email_subject=$email_temp->subject;
					$email_address_from=$email_temp->from_address;
					$email_address_reply=$email_temp->reply_address;
					$email_to = $email_address_from;	
					
					$email_message=str_replace('{break}','<br/>',$email_message);
					$email_message=str_replace('{user_name}',$username,$email_message);			
					$email_message=str_replace('{project_name}',$project_name,$email_message);
					$email_message=str_replace('{donor_name}',$donor_name,$email_message);
					$email_message=str_replace('{donote_amount}',$donote_amount,$email_message);
					$email_message=str_replace('{donor_profile_link}',$donor_profile_link,$email_message);
					$email_message=str_replace('{project_page_link}',$project_page_link,$email_message);
									
					$str=$email_message;
					
					email_send($email_address_from,$email_address_reply,$email_to,$email_subject,$str);
				}
				///////=================owner alert===================
					
			$user_not=$this->user_model->get_email_notification($prj['user_id']);	
			//print_r($user_not);
			if($user_not->add_fund=='1'){
							
				$email_template=$this->db->query("select * from `email_template` where task='New Fund Owner Notification'");
				$email_temp=$email_template->row();				
				
				if($email_temp)
				{				
					$email_message=$email_temp->message;
					$email_subject=$email_temp->subject;
					$email_address_from=$email_temp->from_address;
					$email_address_reply=$email_temp->reply_address;	
					$email_to = $project_owner_email;
					
					
					$email_message=str_replace('{break}','<br/>',$email_message);
					$email_message=str_replace('{user_name}',$username,$email_message);			
					$email_message=str_replace('{project_name}',$project_name,$email_message);
					if($anonymous=='2'){
						$email_message=str_replace('{donor_name}',$donor_name,$email_message);
						$email_message=str_replace('{donote_amount}','Anonymous amount',$email_message);
						$email_message=str_replace('{donor_profile_link}',$donor_profile_link,$email_message);
					}
					elseif($anonymous=='3'){
						$email_message=str_replace('{donor_name}','Anonymous donar',$email_message);
						$email_message=str_replace('{donote_amount}','Anonymous amount',$email_message);
						$email_message=str_replace('{donor_profile_link}','',$email_message);
					}
					else{
						$email_message=str_replace('{donor_name}',$donor_name,$email_message);
						$email_message=str_replace('{donote_amount}',$donote_amount,$email_message);
						$email_message=str_replace('{donor_profile_link}',$donor_profile_link,$email_message);
					}
					$email_message=str_replace('{project_page_link}',$project_page_link,$email_message);
					
					
					$str=$email_message;
					
					email_send($email_address_from,$email_address_reply,$email_to,$email_subject,$str);
				}
			}
					
				/////////////////==============donor alert================================
				
					
			$user_not_donor=$this->user_model->get_email_notification($user_id);	
			
			if($user_not_donor->add_fund=='1'){		
							
				
				$email_template=$this->db->query("select * from `email_template` where task='New Fund Donor Notification'");
				$email_temp=$email_template->row();				
				
				if($email_temp)
				{				
					$email_message=$email_temp->message;
					$email_subject=$email_temp->subject;
					$email_address_from=$email_temp->from_address;
					$email_address_reply=$email_temp->reply_address;	
					$email_to = $donar_email;
					
					$email_message=str_replace('{break}','<br/>',$email_message);
					$email_message=str_replace('{user_name}',$username,$email_message);			
					$email_message=str_replace('{project_name}',$project_name,$email_message);
					$email_message=str_replace('{donor_name}',$donor_name,$email_message);
					$email_message=str_replace('{donote_amount}',$donote_amount,$email_message);
					$email_message=str_replace('{donor_profile_link}',$donor_profile_link,$email_message);
					$email_message=str_replace('{project_page_link}',$project_page_link,$email_message);
					
					
					$str=$email_message;
					email_send($email_address_from,$email_address_reply,$email_to,$email_subject,$str);
				}
			}
					
					
					
					
				///donate end ///
					
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
	
     
   

    function donate_interswitch($pid = null, $amount = null, $project_id, $donar_amount, $donar_comment, $perk_id, $anonymous, $facebook, $twitter) {

        // echo "here for interswitch";
	    //$donate_amount = $amount;

        $login_user = get_user_detail($this->session->userdata('user_id'));

        $donar_name = $login_user['user_name'];

        $email = $login_user['email'];

        $anonymous = $anonymous;

        $donar_comment = nl2br(strip_tags($donar_comment));


        //$wallet_setting = wallet_setting();

        //$wallet_add_fees = $wallet_setting->wallet_add_fees;

       // $add_fees = number_format((($amount * $wallet_add_fees) / 100), 2);

       //$amount = number_format(($add_fees + $amount), 2);
	   
	   $amount = number_format($amount, 2);
		
	   //$amount  =  currency("USD","NGN",$amount);

        $uniqueId = 'inter-' . microtime(true) . '#' . $pid . '#' . str_replace(',', '',($amount)) . '#' . $project_id . '#' . $donar_amount . '#' . $perk_id . '#' . $donar_name . '#' . $email . '#' . $donar_comment . '#' . $anonymous;





        $interswitch = interswitch_detail();

        if ($interswitch->site_status == 'sand box') {

            $interswitch_url = 'https://testwebpay.interswitchng.com/test_paydirect/webpay/pay.aspx';

        }

        if ($interswitch->site_status == 'live') {

            $interswitch_url = 'https://webpay.interswitchng.com/paydirect/webpay/pay.aspx';

        }



		/*<form action="https://testwebpay.interswitchng.com/test_paydirect/webpay/pay.aspx" method="post" id="interswitch_payment_form">
		<input type="hidden" name="AMT" value="1.00">
		<input type="hidden" name="CADPID" value="CADP628051">
		<input type="hidden" name="currency" value="566">
		<input type="hidden" name="MERTID" value="demo">
		<input type="hidden" name="TXNREF" value="inter-1368700396.79#1.00#170#669#rekha##do_comment#">
		<input type="hidden" name="TRANTYPE" value="00">					
		<input type="submit" class="button-alt" id="submit_interswitch_payment_form" value="">
		</form>*/



        $interswitch_args = array(
            'gtpay_mert_id' => '700',
            'gtpay_tranx_id' =>  'NGNWL'.randomNumber(12),
            'gtpay_tranx_amt' =>str_replace(',', '',($amount))*100, 
            'gtpay_tranx_curr' => '566',
            'gtpay_cust_id' => $login_user['user_id'],
			'gtpay_cust_name' =>$login_user['user_name'],
            'gtpay_tranx_memo' => $uniqueId,
			'gtpay_tranx_noti_url' =>site_url('payment/donate_interswitchipn/'),
			'gtpay_no_show_gtbank' =>'yes',
			'gtpay_echo_data' =>$uniqueId,
			'gtpay_gway_name' =>'',
			'site_redirect_url' =>site_url('payment/donate_interswitchipn/')
        );


	   $interswitch_url = 'https://ibank.gtbank.com/GTPay/Tranx.aspx';

        foreach ($interswitch_args as $key => $value) {
            $interswitch_args_array[] = '<input type="hidden" name="' . $key . '" value="' . $value . '"/>';
        }



        $form = '<form action="' . $interswitch_url . '" method="post" id="interswitch_payment_form" >' . implode('', $interswitch_args_array) . '					
				<input type="submit" class="button-alt" name="btnSubmit" value="Continue to GTBank/Interswitch site to donate" id="submit_interswitch_payment_form" />
				</form>';

        echo $form;

 		/*echo '<script type="text/javascript">document.getElementById("interswitch_payment_form").submit();</script>';*/

    }



    function get_gateway_result($id, $name) {

        $query = $this->db->get_where('gateways_details', array('payment_gateway_id' => $id, 'name' => $name));

        //print_r($this->db->last_query());

        return $query->row_array();

    }


 	function check_unique_transaction($txn_id) {



        $query = $this->db->query("select * from wallet where wallet_transaction_id='" . $txn_id . "'");



        if ($query->num_rows() > 0) {

            return 1;

        }

        return 0;

    }
    /*  Sucess full message from interswitch */



    function donate_interswitchipn() {

		
				/*$_POST = array(
					'gtpay_tranx_id'=>'NGNWLFFHbhNEoE2Gx',
					'gtpay_tranx_status_code'=>'00',
					'gtpay_tranx_curr'=>'566',
					'gtpay_tranx_status_msg'=>'Approved by Financial Institution',
					'gtpay_tranx_amt'=>'6750.0000',
					'gtpay_cust_id'=>'41',
					'gtpay_echo_data'=>'inter-1371721171.63#2#6750.00#181#6750#682#rekha#rekha.rockersinfo@gmail.com#do_comment#1',
					'site_redirect_url'=>'http://startcrunch.com/payment/donate_interswitchipn',
					'gtpay_gway_name'=>'webpay'
				);*/
		
		//$this->db->insert('interswitch_responce',$_POST);
		
		//$_POST = (array)$_POST;
		
		
        $vals = array();
        $strtemp = '';

        foreach ($_POST as $key => $value) {
            $vals[$key] = $value;
            $strtemp.= $key . "=" . $value . ",";
        }
        log_message('error', "IPN DATA:" . $strtemp);
		
		//die;

        $custom = explode('#', $_POST['gtpay_echo_data']); 
		

        $gateway_id = $custom[1];
        $custom_amt =  str_replace(',','',$custom[2]);
        $pay_gross = str_replace(',','',$_POST['gtpay_tranx_amt']); // pay ment
        $payee_email = $custom[7];
        $payer_status = 'Paid';
        $txnid = $_POST['gtpay_tranx_id'];
		$date = date('Y-m-d H:i:s');
        $ip = $_SERVER['REMOTE_ADDR'];
		$status = $_POST['gtpay_tranx_status_code'];

        $user_id = $this->session->userdata('user_id');
        $login_user = get_user_detail($user_id);


        $query = $this->db->get_where('admin');
        $res_admin = $query->row_array();
        $email_address_from = $res_admin['email'];

        $chk_transaction_id = $this->check_unique_transaction($txnid);
		
		
		$responcedata = array(
							'gtpay_tranx_id'=>$txnid,
							'gtpay_tranx_status_code'=>$status,
							'gtpay_tranx_curr'=>$_POST['gtpay_tranx_curr'],
							'gtpay_tranx_status_msg'=>$_POST['gtpay_tranx_status_msg'],
							'gtpay_tranx_amt'=> $pay_gross,
							'gtpay_cust_id'=>$_POST['gtpay_cust_id'],
							'gtpay_echo_data'=>$_POST['gtpay_echo_data'],
							'site_redirect_url'=>$_POST['site_redirect_url'],
							'gtpay_gway_name'=>$_POST['gtpay_gway_name'],
							'date' => $date
						);
		$this->db->insert('interswitch_responce',$responcedata);
		$interswitch_transaction_id = mysql_insert_id();
        if ((strtolower($status) == 00 || strtolower($status) == '00') && $pay_gross >= $custom_amt && $chk_transaction_id == 0) { 
            $admin_status = 'Confirm';


           
			
			

            $site_setting = site_setting();
            $wallet_setting = wallet_setting();


            $project_id = $custom[3];
            $donar_amount = $custom[4];
            $donar_comment = $custom[8];
			
            $perk_id = $custom[5];
            $anonymous = $custom[9];
            $facebook = '';
            $twitter = '';
			
			$naira_currency = $this->db->get_where('currency_code',array('currency_code' => 'NGN'));
			if ($naira_currency->num_rows() > 0) {
			
				$naira_currency = $naira_currency->row();
				$naira_currency_symbol= $naira_currency->currency_symbol;
			}


			$prj = $this->project_model->get_project_user($project_id);
			
			
			if($prj['project_currency_code'] != 'NGN'){
				$pay_gross = $pay_gross/$site_setting['naira_usd_amount'];
			} 

            $project_id = $prj['project_id'];

			//echo '<pre>'; print_r($prj);
			
			 $data = array(
                'debit' => $pay_gross,
                'user_id' => $user_id,
                'status' => $payer_status,
                'admin_status' => $admin_status,
                'wallet_date' => $date,
                'wallet_transaction_id' => $txnid,
                'wallet_payee_email' => $payee_email,
                'wallet_ip' => $ip,
                'gateway_id' => $gateway_id,
                'donate_status' => '1',
				//'currency_symbol' => $naira_currency_symbol
            );
            $add_wallet = $this->db->insert('wallet', $data);
			//echo '<pre>'; print_r($data);  
			
			
            $pay_fee = 0;

            //$login_user = get_user_detail($user_id);



            $donar_name = $login_user['user_name'];
            $donar_email = $login_user['email'];
            $payee_email = $login_user['email'];
            $donar_id = $user_id;





            ///////========if PREAPPROVAL IS ACTIVE FOR WALLET	

            if ($wallet_setting->wallet_payment_type == '1') {

                $donate_status = '0';
                $wallet_payment_status = '0';

            } else {

                $donate_status = '1';
                $wallet_payment_status = '1';

            }

            $trw2 = 'FS' . randomNumber(10);


         	$naria_amount = $donar_amount;
		  
			$usd_amount = $donar_amount/$site_setting['naira_usd_amount'];
			
			if($prj['project_currency_code'] != 'NGN'){
				$donar_amount = $usd_amount;
			} 

		    $insert = $this->db->query("insert into transaction (`user_id`,`project_id`,`perk_id`,`amount`,`listing_fee`,`pay_fee`,`email`,`host_ip`,`paypal_email`,`comment`,`transaction_date_time`,`wallet_transaction_id`,`wallet_payment_status`,`trans_anonymous`,`currency_symbol`,`usd_amount`,`naira_amount`,`interswitch_transaction_id`)values('" . $user_id . "','" . $project_id . "','" . $perk_id . "','" . $donar_amount . "','0','" . $pay_fee . "','" . $login_user['email'] . "','" . $_SERVER['REMOTE_ADDR'] . "','" . $login_user['email'] . "','" . $donar_comment . "','" . date("Y-m-d H:i:s") . "','" . $trw2 . "','" . $wallet_payment_status . "','" . $anonymous . "','" . $naira_currency_symbol . "','" . $usd_amount . "','" . $naria_amount . "', '".$interswitch_transaction_id."')");
			
			

            $last_transaction_id = mysql_insert_id();


            $get_don_project = $this->db->get_where('project', array('project_id' => $project_id));

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

            $this->db->update('project', $data_don);







            if ($perk_id != '' && $perk_id != '0') {



                $query = $this->db->get_where('perk', array('perk_id' => $perk_id));

                $pk = $query->row_array();

                $data = array(

                    'perk_get' => ($pk['perk_get'] * 1) + 1,

                );

                $this->db->where('perk_id', $perk_id);

                $this->db->update('perk', $data);

            }



            if ($wallet_setting->wallet_payment_type == '0') {



                ///////////==========affiliate earn=============



                $affiliate_setting = affiliate_setting();



                if ($affiliate_setting->affiliate_enable == 1) {





                    $pledge_commission = affiliate_commission_setting(2);













                    ////======donor is referral user then all/one pledge goes to referral



                    if ($login_user['reference_user_id'] != '' && $login_user['reference_user_id'] > 0) {

                        $get_affiliate_user = get_user_detail($login_user['reference_user_id']);



                        if ($get_affiliate_user) {



                            ///===get commission amount and add to user earn table with pending status





                            if ($pledge_commission) {



                                $pledge_commission_fee = $pledge_commission->commission;



                                if ($pledge_commission_fee > 0) {



                                    if ($pledge_commission->type == '%') {

                                        $final_pledge_fee = ($donar_amount * $pledge_commission_fee) / 100;

                                    } else {

                                        $final_pledge_fee = $pledge_commission_fee;

                                    }







                                    ////=======check one time or every time payment enable



                                    if ($affiliate_setting->pay_commission_pledge == 1) {



                                        $earn_data = array(

                                            'user_id' => $get_affiliate_user['user_id'],

                                            'project_id' => $project_id,

                                            'perk_id' => $perk_id,

                                            'transaction_id' => $last_transaction_id,

                                            'earn_amount' => $final_pledge_fee,

                                            'earn_date' => date('Y-m-d H:i:s'),

                                            'earn_status' => 0

                                        );

                                        $this->db->insert('affiliate_user_earn', $earn_data);

                                    } else {



                                        $affiliate_user_id = $get_affiliate_user['user_id'];



                                        $check_user_already_get_commission = check_user_one_time_commission($affiliate_user_id, $project_id);



                                        if ($check_user_already_get_commission == 0) {

                                            $earn_data = array(

                                                'user_id' => $get_affiliate_user['user_id'],

                                                'project_id' => $project_id,

                                                'perk_id' => $perk_id,

                                                'transaction_id' => $last_transaction_id,

                                                'earn_amount' => $final_pledge_fee,

                                                'earn_date' => date('Y-m-d H:i:s'),

                                                'earn_status' => 0

                                            );

                                            $this->db->insert('affiliate_user_earn', $earn_data);

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

            }



            $trw = 'FS' . randomNumber(10);



//	



            $owner_amount = $donar_amount;



            ////////====if INSTANT then cut fees 

//if($site_setting['enable_funding_option'] =='0' and $don_prj['payment_type'] =='0' and $wallet_setting->wallet_payment_type=='0')



            if ($wallet_setting->wallet_payment_type == '0') {

                $owner_amount = $donar_amount * $site_setting['instant_fees'] / 100;

            }



            $update_donor_wallet = $this->db->query("insert into wallet(`credit`,`user_id`,`admin_status`,`wallet_date`,`wallet_transaction_id`,`wallet_payee_email`,`wallet_ip`,`gateway_id`,`project_id`,`donate_status`,`wallet_anonymous`)values('" . $donar_amount . "','" . $user_id . "','Confirm','" . date("Y-m-d H:i:s") . "','" . $trw2 . "','Internal','" . $_SERVER['REMOTE_ADDR'] . "','0','" . $project_id . "','" . $donate_status . "','" . $anonymous . "')");





            $insert_owner_wallet = $this->db->query("insert into wallet(`debit`,`user_id`,`admin_status`,`wallet_date`,`wallet_transaction_id`,`wallet_payee_email`,`wallet_ip`,`gateway_id`,`project_id`,`donate_status`,`wallet_anonymous`)values('" . $owner_amount . "','" . $prj['user_id'] . "','Confirm','" . date("Y-m-d H:i:s") . "','" . $trw2 . "','Internal','" . $_SERVER['REMOTE_ADDR'] . "','0','" . $project_id . "','" . $donate_status . "','" . $anonymous . "')");







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



            $donor_profile_link = site_url('member/' . $user_id);



            $prj = $this->project_model->get_project_user($project_id);

            $login_user = get_user_detail($user_id);

            $project = $prj;

            $facebook_setting = facebook_setting();

            ////// share on facebook 





            $project_share_link = site_url('projects/' . $prj['url_project_title'] . '/' . $prj['project_id']);



            if ($project['image'] != '' && is_file("upload/thumb/" . $project['image'])) {

                $image = base_url() . 'upload/thumb/' . $project['image'];

            } else {





                $get_gallery = $this->project_model->get_all_project_gallery($project['project_id']);



                $grcnt = 1;



                if ($get_gallery) {

                    foreach ($get_gallery as $glr) {



                        if ($glr->project_image != '' && is_file('upload/thumb/' . $glr->project_image) && $grcnt == 1) {

                            $image = base_url() . 'upload/thumb/' . $glr->project_image;





                            $grcnt = 2;

                        }

                    }

                } elseif ($grcnt == 1) {

                    $image = base_url() . 'images/no_img.jpg';

                } else {

                    $image = base_url() . 'images/no_img.jpg';

                }

            }





            $msg = $prj['project_title'];



            if ($login_user['fb_uid'] != '' and $facebook == '1' and $login_user['fb_access_token'] != '' and $facebook_setting->facebook_wall_post == '1') {



                $fbAccessToken = $login_user['fb_access_token'];

                $publishStream = $this->fb_connect->publish($login_user['fb_uid'], array(

                    'access_token' => $fbAccessToken,

                    'link' => $project_share_link,

                    'picture' => $image,

                    'name' => "Donation on " . $prj['project_title'],

                    'description' => $prj['project_summary']

                        )

                );

            }



            if ($prj['fb_uid'] != '' and $prj['facebook_wall_post'] == '1' and $prj['fb_access_token'] != '' and $facebook_setting->facebook_wall_post == '1') {



                $fbAccessToken = $prj['fb_access_token'];

                $publishStream = $this->fb_connect->publish($prj['fb_uid'], array(

                    'access_token' => $fbAccessToken,

                    'link' => $project_share_link,

                    'picture' => $image,

                    'name' => "Donation on " . $prj['project_title'],

                    'description' => $prj['project_summary']

                        )

                );

            }



            if ($facebook_setting->facebook_user_id != '' and $facebook_setting->facebook_wall_post == '1' and $facebook_setting->facebook_access_token != '') {



                $fbAccessToken = $facebook_setting->facebook_access_token;

                $publishStream = $this->fb_connect->publish($facebook_setting->facebook_user_id, array(

                    'access_token' => $fbAccessToken,

                    'link' => $project_share_link,

                    'picture' => $image,

                    'name' => "Donation on " . $prj['project_title'],

                    'description' => $prj['project_summary']

                        )

                );

            }







            //////facebook end 	

            /////////share on twitter 



            $project_share_link = site_url('projects/' . $prj['url_project_title'] . '/' . $prj['project_id']);

            $twitter_setting = twitter_setting();

            $consumerKey = $twitter_setting->consumer_key;

            $consumerSecret = $twitter_setting->consumer_secret;

            $OAuthToken = $login_user['tw_oauth_token'];

            $OAuthSecret = $login_user['tw_oauth_token_secret'];



            error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);

            try {

                if ($login_user['tw_oauth_token'] != '0' and $login_user['tw_oauth_token_secret'] != '0' and $twitter == '1' and $twitter_setting->autopost_site == '1') {

                    // Insert your keys/tokens





                    $consumerKey = $twitter_setting->consumer_key;

                    $consumerSecret = $twitter_setting->consumer_secret;

                    $OAuthToken = $login_user['tw_oauth_token'];

                    $OAuthSecret = $login_user['tw_oauth_token_secret'];



                    // Full path to twitterOAuth.php (change OAuth to your own path)

                    $this->load->library('twitteroauth');

                    //require_once($_SERVER['DOCUMENT_ROOT'].'OAuth/twitteroauth.php');

                    // create new instance

                    $tweet = new TwitterOAuth($consumerKey, $consumerSecret, $OAuthToken, $OAuthSecret);



                    // Your Message

                    $message = date("Y-m-d H:i:s") . "New Donation on - " . $prj['project_title'] . " Take a look from here - " . $project_share_link;



                    // Send tweet 

                    $tweet->post('statuses/update', array('status' => "$message"));

                }

            } catch (Exception $e) {

                return;

            }





            try {

                if ($prj['tw_oauth_token'] != '0' and $prj['tw_oauth_token_secret'] != '0' and $prj['autopost_site'] == '1' and $twitter_setting->autopost_site == '1') {

                    // Insert your keys/tokens





                    $consumerKey = $twitter_setting->consumer_key;

                    $consumerSecret = $twitter_setting->consumer_secret;

                    $OAuthToken = $prj['tw_oauth_token'];

                    $OAuthSecret = $prj['tw_oauth_token_secret'];



                    // Full path to twitterOAuth.php (change OAuth to your own path)

                    $this->load->library('twitteroauth');

                    //require_once($_SERVER['DOCUMENT_ROOT'].'OAuth/twitteroauth.php');

                    // create new instance

                    $tweet = new TwitterOAuth($consumerKey, $consumerSecret, $OAuthToken, $OAuthSecret);



                    // Your Message

                    $message = date("Y-m-d H:i:s") . "New Donation on - " . $prj['project_title'] . " Take a look from here - " . $project_share_link;



                    // Send tweet 

                    $tweet->post('statuses/update', array('status' => "$message"));

                }

            } catch (Exception $e) {

                return;

            }





            try {

                if ($twitter_setting->tw_oauth_token != '0' and $twitter_setting->tw_oauth_token_secret != '0' and $twitter_setting->autopost_site == '1') {

                    // Insert your keys/tokens





                    $consumerKey = $twitter_setting->consumer_key;

                    $consumerSecret = $twitter_setting->consumer_secret;

                    $OAuthToken = $twitter_setting->tw_oauth_token;

                    $OAuthSecret = $twitter_setting->tw_oauth_token_secret;



                    // Full path to twitterOAuth.php (change OAuth to your own path)

                    $this->load->library('twitteroauth');

                    //require_once($_SERVER['DOCUMENT_ROOT'].'OAuth/twitteroauth.php');

                    // create new instance

                    $tweet = new TwitterOAuth($consumerKey, $consumerSecret, $OAuthToken, $OAuthSecret);



                    // Your Message

                    $message = date("Y-m-d H:i:s") . "New Donation on - " . $prj['project_title'] . " Take a look from here - " . $project_share_link;



                    // Send tweet 

                    $tweet->post('statuses/update', array('status' => "$message"));

                }

            } catch (Exception $e) {

                return;

            }





            /////////// twitter end 	

            ///////////============admin alert==========







            $email_template = $this->db->query("select * from `email_template` where task='New Fund Admin Notification'");

            $email_temp = $email_template->row();



            if ($email_temp) {

                $email_message = $email_temp->message;

                $email_subject = $email_temp->subject;

                $email_address_from = $email_temp->from_address;

                $email_address_reply = $email_temp->reply_address;

                $email_to = $email_address_from;



                $email_message = str_replace('{break}', '<br/>', $email_message);

                $email_message = str_replace('{user_name}', $username, $email_message);

                $email_message = str_replace('{project_name}', $project_name, $email_message);

                $email_message = str_replace('{donor_name}', $donor_name, $email_message);

                $email_message = str_replace('{donote_amount}', $donote_amount, $email_message);

                $email_message = str_replace('{donor_profile_link}', $donor_profile_link, $email_message);

                $email_message = str_replace('{project_page_link}', $project_page_link, $email_message);



                $str = $email_message;



                email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);

            }

            ///////=================owner alert===================



            $user_not = $this->user_model->get_email_notification($prj['user_id']);



            if ($user_not->add_fund == '1') {



                $email_template = $this->db->query("select * from `email_template` where task='New Fund Owner Notification'");

                $email_temp = $email_template->row();



                if ($email_temp) {

                    $email_message = $email_temp->message;

                    $email_subject = $email_temp->subject;

                    $email_address_from = $email_temp->from_address;

                    $email_address_reply = $email_temp->reply_address;

                    $email_to = $project_owner_email;





                    $email_message = str_replace('{break}', '<br/>', $email_message);

                    $email_message = str_replace('{user_name}', $username, $email_message);

                    $email_message = str_replace('{project_name}', $project_name, $email_message);

                    if ($anonymous == '2') {

                        $email_message = str_replace('{donor_name}', $donor_name, $email_message);

                        $email_message = str_replace('{donote_amount}', 'Anonymous amount', $email_message);

                        $email_message = str_replace('{donor_profile_link}', $donor_profile_link, $email_message);

                    } elseif ($anonymous == '3') {

                        $email_message = str_replace('{donor_name}', 'Anonymous donar', $email_message);

                        $email_message = str_replace('{donote_amount}', 'Anonymous amount', $email_message);

                        $email_message = str_replace('{donor_profile_link}', '', $email_message);

                    } else {

                        $email_message = str_replace('{donor_name}', $donor_name, $email_message);

                        $email_message = str_replace('{donote_amount}', $donote_amount, $email_message);

                        $email_message = str_replace('{donor_profile_link}', $donor_profile_link, $email_message);

                    }

                    $email_message = str_replace('{project_page_link}', $project_page_link, $email_message);





                    $str = $email_message;



                    email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);

                }

            }



            /////////////////==============donor alert================================





            $user_not_donor = $this->user_model->get_email_notification($user_id);



            if ($user_not_donor->add_fund == '1') {





                $email_template = $this->db->query("select * from `email_template` where task='New Fund Donor Notification'");

                $email_temp = $email_template->row();



                if ($email_temp) {

                    $email_message = $email_temp->message;

                    $email_subject = $email_temp->subject;

                    $email_address_from = $email_temp->from_address;

                    $email_address_reply = $email_temp->reply_address;

                    $email_to = $donar_email;



                    $email_message = str_replace('{break}', '<br/>', $email_message);

                    $email_message = str_replace('{user_name}', $username, $email_message);

                    $email_message = str_replace('{project_name}', $project_name, $email_message);

                    $email_message = str_replace('{donor_name}', $donor_name, $email_message);

                    $email_message = str_replace('{donote_amount}', $donote_amount, $email_message);

                    $email_message = str_replace('{donor_profile_link}', $donor_profile_link, $email_message);

                    $email_message = str_replace('{project_page_link}', $project_page_link, $email_message);
					
					$email_message = str_replace('{reference_no}', $txnid, $email_message);





                    $str = $email_message;

                    email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);

                }

            }







			$msg = 'done';

            ///donate end ///

        } else { 



            ////////////=========fail transaction, FAKE transaction , invalid transaction, change payment information ========





            $email_template = $this->db->query("select * from `email_template` where task='New Fund Admin Notification'");

            $email_temp = $email_template->row();





            $email_address_from = $email_temp->from_address;

            $email_address_reply = $email_temp->reply_address;

            $email_subject = WALLET_PAYMENT_PROCESS_FAILED;

            $email_to = $login_user['email'];



            $str = sprintf(WALLET_YOUR_WALLET_PAYMENT_PROCESS_VIOLATED_PLEASE_CHECK_YOUR_SETTINGS_TRY_AGAIN_THANKYOU, $login_user['user_name'], $_POST['gtpay_tranx_status_msg']);



            email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);





            $str = sprintf(WALLET_HELLO_ADMINISTRATOR_WALLET_PAYMENT_PROCESS_IS_VIOLATED_DUE_TO_ERROR_PLEASE_CHECK_YOUR_SETTINGS_TRY_AGAIN_THANKYOU, $_POST['gtpay_tranx_status_msg'], $login_user['user_name'], $payee_email);



            $email_subject = WALLET_PAYMENT_PROCESS_FAILED;

            $email_to = $email_address_from;

            email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);
			$msg = 'fail';

        }


 		
        //redirect("home/index/".$msg.'/'.$txnid);
		redirect("home/index/".$txnid);
    }



    function donate_bank($pid = null, $amt = null, $project_id, $donar_amount, $donar_comment, $perk_id, $anonymous, $facebook, $twitter) {


        $site_setting = site_setting();

        $wallet_setting = wallet_setting();

        $minimum_amount = $wallet_setting->wallet_minimum_amount;

        $chk_amt = $amt;



        $wallet_add_fees = $wallet_setting->wallet_add_fees;

        $add_fees = number_format((($amt * $wallet_add_fees) / 100), 2);



        $total = number_format(($add_fees + $amt), 2);



        $user_id = $this->session->userdata('user_id');







        $login_user = get_user_detail($this->session->userdata('user_id'));

        $user_detail = get_user_detail($prj['user_id']);



        $project_title = $prj['project_title'];

        $url_project_title = $prj['url_project_title'];









        $prj = $this->project_model->get_project_user($project_id);

        $project_id = $prj['project_id'];



        $pay_fee = 0;



        $login_user = get_user_detail($user_id);



        $donar_name = $login_user['user_name'];

        $donar_email = $login_user['email'];





        $username = $prj['user_name'];

        $project_owner_email = $prj['email'];









        $payee_email = $login_user['email'];

        $donar_id = $user_id;



        $project_name = $prj['project_title'];

        $project_page_link = site_url('projects/' . $url_project_title . '/' . $project_id);





        $donote_amount = $donar_amount;

        

        $pay_fee= (($donar_amount * $transaction_fees)/100);  

				

	$original_amount= $donar_amount- $pay_fee;

        

        



        $donor_profile_link = site_url('member/' . $user_id);



                                    



        if ($wallet_setting->wallet_payment_type == '1') {

            $donate_status = '0';

            $wallet_payment_status = '0';

        } else {

            $donate_status = '1';

            $wallet_payment_status = '1';

        }



        $trw2 = 'FS' . randomNumber(10);



        $is_confirm = 0;


		$naira_currency = $this->db->get_where('currency_code',array('currency_code' => 'NGN'));
		if ($naira_currency->num_rows() > 0) {
		
			$naira_currency = $naira_currency->row();
			$naira_currency_symbol= $naira_currency->currency_symbol;
		}
		$usd_amount = $original_amount/$site_setting['naira_usd_amount'];
		$naria_amount = $original_amount;
		
		if($prj['project_currency_code'] != 'NGN'){
			$original_amount = $usd_amount;
		}

        $insert = $this->db->query("insert into transaction (`user_id`,`project_id`,`perk_id`,`amount`,`listing_fee`,`pay_fee`,`email`,`host_ip`,`paypal_email`,`comment`,`transaction_date_time`,`wallet_transaction_id`,`wallet_payment_status`,`trans_anonymous`,`is_confirm`,`bank_transaction`,`currency_symbol`,`usd_amount`,`naira_amount`)values('" . $user_id . "','" . $project_id . "','" . $perk_id . "','" . $original_amount . "','" . $pay_fee . "','" . $add_fees . "','" . $login_user['email'] . "','" . $_SERVER['REMOTE_ADDR'] . "','" . $login_user['email'] . "','" . $donar_comment . "','" . date("Y-m-d H:i:s") . "','" . $trw2 . "','" . $wallet_payment_status . "','" . $anonymous . "','" . $is_confirm . "','" . $pid . "','" . $naira_currency_symbol . "','" . $usd_amount . "','" . $naria_amount . "')");
		
		


        /* Email confirmation for Admin */



        $email_template = $this->db->query("select * from `email_template` where task='New Fund transfer Bank Admin'");

        $email_temp = $email_template->row();

        if ($email_temp) {

            $email_message = $email_temp->message;

            $email_subject = $email_temp->subject;

            $email_address_from = $email_temp->from_address;

            $email_address_reply = $email_temp->reply_address;

            $email_to = $email_address_from;



            $email_message = str_replace('{break}', '<br/>', $email_message);

            $email_message = str_replace('{user_name}', $username, $email_message);

            $email_message = str_replace('{project_name}', $project_name, $email_message);

            $email_message = str_replace('{donor_name}', $donar_name, $email_message);

            $email_message = str_replace('{donote_amount}', $total, $email_message);

            $email_message = str_replace('{donor_profile_link}', $donor_profile_link, $email_message);

            $email_message = str_replace('{project_page_link}', $project_page_link, $email_message);



            $str = $email_message;



            email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);

        }









        $email_template = $this->db->query("select * from `email_template` where task='Bank Detail'");

        $email_temp = $email_template->row();



        /* To add bank detail in mail */



        $bank_template = $this->db->query("select label,value from `gateways_details` where payment_gateway_id='3'");

        $bank_temp = $bank_template->result_array();



        $bank_temp_new['bank'] = $bank_temp;





        if ($email_temp) {

            $email_message = $email_temp->message;

            $email_subject = $email_temp->subject;

            $email_address_from = $email_temp->from_address;

            $email_address_reply = $email_temp->reply_address;

            $email_to = $donar_email;



            $email_message = str_replace('{break}', '<br/>', $email_message);

            $email_message = str_replace('{user_name}', $username, $email_message);

            $email_message = str_replace('{project_name}', $project_name, $email_message);

            $email_message = str_replace('{donor_name}', $donor_name, $email_message);

            $email_message = str_replace('{donote_amount}', $total, $email_message);

            $email_message = str_replace('{donor_profile_link}', $donor_profile_link, $email_message);

            $email_message = str_replace('{project_page_link}', $project_page_link, $email_message);



            $email_message = str_replace('{bank_name}', $bank_temp[0]['value'], $email_message);

            $email_message = str_replace('{account_number}', $bank_temp[1]['value'], $email_message);

            $email_message = str_replace('{ifci_code}', $bank_temp[2]['value'], $email_message);

            $email_message = str_replace('{branch_name}', $bank_temp[3]['value'], $email_message);

            $email_message = str_replace('{international_code}', $bank_temp[4]['value'], $email_message);

            $email_message = str_replace('{phone_number}', $bank_temp[5]['value'], $email_message);









            $str = $email_message;



            email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);

        }

		 $total = str_replace(',','', $total);

        redirect('payment/payment_detail/'.$total);

    }



    function payment_detail($total) {



       $total = $total; 



        $bank_template = $this->db->query("select label,value from `gateways_details` where payment_gateway_id='3'");

        $bank_temp = $bank_template->result_array();



        $bank_temp_new['bank'] = $bank_temp;



        $meta = meta_setting();



        $data_bank = array();



        $data_bank['site_setting'] = site_setting();



        $data_bank = array_merge($data_bank, $bank_temp_new);



        $data_bank['final_amount'] = $total;





        $this->home_model->select_text();



        $this->template->write('meta_title', 'Contributions-' . $meta['title'], TRUE);



        $this->template->write('meta_description', $meta['meta_description'], TRUE);



        $this->template->write('meta_keyword', $meta['meta_keyword'], TRUE);







        if ($this->agent->is_mobile('iphone') && $data_bank['site_setting']['mobile_site'] == 1) {



            $this->template->set_master_template('iphone/template.php');



            $this->template->write_view('main_content', 'iphone/donations', $data, TRUE);



            $this->template->render();

        } elseif (($this->agent->is_mobile() || $this->agent->is_robot()) && $data_bank['site_setting']['mobile_site'] == 1) {



            $this->template->set_master_template('mobile/template.php');



            $this->template->write_view('main_content', 'mobile/donations', $data_bank, TRUE);



            $this->template->render();

        } else {



            if (!check_user_authentication()) {



                $this->template->write_view('header', 'default/common/header', $data_bank, TRUE);

            } else {



                $this->template->write_view('header', 'default/common/header_login', $data_bank, TRUE);

            }



            $this->template->write_view('main_content', 'default/bank_info', $data_bank, TRUE);



            // $this->template->write_view('sidebar', 'default/project/project_sidebar', $data_bank, TRUE);



            $this->template->write_view('footer', 'default/common/footer', $data_bank, TRUE);



            $this->template->render();

        }

    }



    function donate_bank_confirm() {



        $transaction_id = $this->uri->segment(3);

        $transaction_data = $this->payment_model->getTransaction($transaction_id);



        $site_setting = site_setting();

        $wallet_setting = wallet_setting();

        $minimum_amount = $wallet_setting->wallet_minimum_amount;



        $amt = $transaction_data->amount;

        $user_id = $transaction_data->user_id;



        $num = 'WL' . randomNumber(12);



        $wallet_add_fees = $wallet_setting->wallet_add_fees;

        $add_fees = number_format((($amt * $wallet_add_fees) / 100), 2);



        $donar_amount = number_format(($amt), 2);

        $pay_gross = number_format(($amt), 2);

        $date = date('Y-m-d H:i:s');

        $ip = $transaction_data->host_ip;

        $admin_status = 'Confirm';

        $payer_status = 'Paid';

        $project_id = $transaction_data->project_id;

        $perk_id = $transaction_data->perk_id;

        $gateway_id = $transaction_data->bank_transaction;

        $donate_status = $transaction_data->wallet_payment_status;

        $wallet_payment_status = $transaction_data->wallet_payment_status;

        $anonymous = $transaction_data->trans_anonymous;



        $data = array(

            'debit' => $pay_gross,

            'user_id' => $user_id,

            'status' => $payer_status,

            'admin_status' => $admin_status,

            'wallet_date' => $date,

            'wallet_transaction_id' => $num,

            'wallet_payee_email' => 'wallet',

            'wallet_ip' => $ip,

            'gateway_id' => $gateway_id,

            'donate_status' => '1'

        );





        $add_wallet = $this->db->insert('wallet', $data);



        $prj = $this->project_model->get_project_user($project_id);



        $get_don_project = $this->db->get_where('project', array('project_id' => $project_id));



        $don_prj = $get_don_project->row_array();





        if ($don_prj['amount_get'] != "") {

            $amt_new = $don_prj['amount_get'];

        } else {

            $amt_new = 0;

        }

        $data_don = array(

            'amount_get' => $amt_new + $amt,

        );

        $this->db->where('project_id', $project_id);

        $this->db->update('project', $data_don);







        if ($perk_id != '' && $perk_id != '0') {



            $query = $this->db->get_where('perk', array('perk_id' => $perk_id));

            $pk = $query->row_array();

            $data = array(

                'perk_get' => ($pk['perk_get'] * 1) + 1,

            );

            $this->db->where('perk_id', $perk_id);

            $this->db->update('perk', $data);

        }



        if ($wallet_setting->wallet_payment_type == '0') {



            ///////////==========affiliate earn=============



            $affiliate_setting = affiliate_setting();



            if ($affiliate_setting->affiliate_enable == 1) {





                $pledge_commission = affiliate_commission_setting(2);













                ////======donor is referral user then all/one pledge goes to referral



                if ($login_user['reference_user_id'] != '' && $login_user['reference_user_id'] > 0) {

                    $get_affiliate_user = get_user_detail($login_user['reference_user_id']);



                    if ($get_affiliate_user) {



                        ///===get commission amount and add to user earn table with pending status





                        if ($pledge_commission) {



                            $pledge_commission_fee = $pledge_commission->commission;



                            if ($pledge_commission_fee > 0) {



                                if ($pledge_commission->type == '%') {

                                    $final_pledge_fee = ($donar_amount * $pledge_commission_fee) / 100;

                                } else {

                                    $final_pledge_fee = $pledge_commission_fee;

                                }







                                ////=======check one time or every time payment enable



                                if ($affiliate_setting->pay_commission_pledge == 1) {



                                    $earn_data = array(

                                        'user_id' => $get_affiliate_user['user_id'],

                                        'project_id' => $project_id,

                                        'perk_id' => $perk_id,

                                        'transaction_id' => $last_transaction_id,

                                        'earn_amount' => $final_pledge_fee,

                                        'earn_date' => date('Y-m-d H:i:s'),

                                        'earn_status' => 0

                                    );

                                    $this->db->insert('affiliate_user_earn', $earn_data);

                                } else {



                                    $affiliate_user_id = $get_affiliate_user['user_id'];



                                    $check_user_already_get_commission = check_user_one_time_commission($affiliate_user_id, $project_id);



                                    if ($check_user_already_get_commission == 0) {

                                        $earn_data = array(

                                            'user_id' => $get_affiliate_user['user_id'],

                                            'project_id' => $project_id,

                                            'perk_id' => $perk_id,

                                            'transaction_id' => $last_transaction_id,

                                            'earn_amount' => $final_pledge_fee,

                                            'earn_date' => date('Y-m-d H:i:s'),

                                            'earn_status' => 0

                                        );

                                        $this->db->insert('affiliate_user_earn', $earn_data);

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

        }



        $trw = 'FS' . randomNumber(10);

        $trw2 = 'FS' . randomNumber(10);



        $owner_amount = $donar_amount;





        ////////====if INSTANT then cut fees 

//if($site_setting['enable_funding_option'] =='0' and $don_prj['payment_type'] =='0' and $wallet_setting->wallet_payment_type=='0')



        if ($wallet_setting->wallet_payment_type == '0') {

            $owner_amount = $donar_amount * $site_setting['instant_fees'] / 100;

        }



        $update_donor_wallet = $this->db->query("insert into wallet(`credit`,`user_id`,`admin_status`,`wallet_date`,`wallet_transaction_id`,`wallet_payee_email`,`wallet_ip`,`gateway_id`,`project_id`,`donate_status`,`wallet_anonymous`)values('" . $donar_amount . "','" . $user_id . "','Confirm','" . date("Y-m-d H:i:s") . "','" . $trw2 . "','Internal','" . $ip . "','0','" . $project_id . "','" . $donate_status . "','" . $anonymous . "')");





        $insert_owner_wallet = $this->db->query("insert into wallet(`debit`,`user_id`,`admin_status`,`wallet_date`,`wallet_transaction_id`,`wallet_payee_email`,`wallet_ip`,`gateway_id`,`project_id`,`donate_status`,`wallet_anonymous`)values('" . $donar_amount . "','" . $prj['user_id'] . "','Confirm','" . date("Y-m-d H:i:s") . "','" . $trw2 . "','Internal','" . $ip . "','0','" . $project_id . "','" . $donate_status . "','" . $anonymous . "')");



        $data_tran = array('is_confirm' => '1');



        $this->db->where('transaction_id', $transaction_id);

        $this->db->update('transaction', $data_tran);



        $prj = $this->project_model->get_project_user($project_id);

        $login_user = get_user_detail($user_id);

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



        $donor_profile_link = site_url('member/' . $user_id);



        $prj = $this->project_model->get_project_user($project_id);

        $login_user = get_user_detail($user_id);

        $project = $prj;

        $facebook_setting = facebook_setting();



        $project_share_link = site_url('projects/' . $prj['url_project_title'] . '/' . $prj['project_id']);



        if ($project['image'] != '' && is_file("upload/thumb/" . $project['image'])) {

            $image = base_url() . 'upload/thumb/' . $project['image'];

        } else {

            $get_gallery = $this->project_model->get_all_project_gallery($project['project_id']);



            $grcnt = 1;



            if ($get_gallery) {

                foreach ($get_gallery as $glr) {



                    if ($glr->project_image != '' && is_file('upload/thumb/' . $glr->project_image) && $grcnt == 1) {

                        $image = base_url() . 'upload/thumb/' . $glr->project_image;





                        $grcnt = 2;

                    }

                }

            } elseif ($grcnt == 1) {

                $image = base_url() . 'images/no_img.jpg';

            } else {

                $image = base_url() . 'images/no_img.jpg';

            }

        }





        $msg = $prj['project_title'];



        if ($login_user['fb_uid'] != '' and $facebook == '1' and $login_user['fb_access_token'] != '' and $facebook_setting->facebook_wall_post == '1') {



            $fbAccessToken = $login_user['fb_access_token'];

            $publishStream = $this->fb_connect->publish($login_user['fb_uid'], array(

                'access_token' => $fbAccessToken,

                'link' => $project_share_link,

                'picture' => $image,

                'name' => "Donation on " . $prj['project_title'],

                'description' => $prj['project_summary']

                    )

            );

        }



        if ($prj['fb_uid'] != '' and $prj['facebook_wall_post'] == '1' and $prj['fb_access_token'] != '' and $facebook_setting->facebook_wall_post == '1') {



            $fbAccessToken = $prj['fb_access_token'];

            $publishStream = $this->fb_connect->publish($prj['fb_uid'], array(

                'access_token' => $fbAccessToken,

                'link' => $project_share_link,

                'picture' => $image,

                'name' => "Donation on " . $prj['project_title'],

                'description' => $prj['project_summary']

                    )

            );

        }



        if ($facebook_setting->facebook_user_id != '' and $facebook_setting->facebook_wall_post == '1' and $facebook_setting->facebook_access_token != '') {



            $fbAccessToken = $facebook_setting->facebook_access_token;

            $publishStream = $this->fb_connect->publish($facebook_setting->facebook_user_id, array(

                'access_token' => $fbAccessToken,

                'link' => $project_share_link,

                'picture' => $image,

                'name' => "Donation on " . $prj['project_title'],

                'description' => $prj['project_summary']

                    )

            );

        }





        $project_share_link = site_url('projects/' . $prj['url_project_title'] . '/' . $prj['project_id']);

        $twitter_setting = twitter_setting();

        $consumerKey = $twitter_setting->consumer_key;

        $consumerSecret = $twitter_setting->consumer_secret;

        $OAuthToken = $login_user['tw_oauth_token'];

        $OAuthSecret = $login_user['tw_oauth_token_secret'];



        error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);

        try {

            if ($login_user['tw_oauth_token'] != '0' and $login_user['tw_oauth_token_secret'] != '0' and $twitter == '1' and $twitter_setting->autopost_site == '1') {

// Insert your keys/tokens





                $consumerKey = $twitter_setting->consumer_key;

                $consumerSecret = $twitter_setting->consumer_secret;

                $OAuthToken = $login_user['tw_oauth_token'];

                $OAuthSecret = $login_user['tw_oauth_token_secret'];



// Full path to twitterOAuth.php (change OAuth to your own path)

                $this->load->library('twitteroauth');

//require_once($_SERVER['DOCUMENT_ROOT'].'OAuth/twitteroauth.php');

// create new instance

                $tweet = new TwitterOAuth($consumerKey, $consumerSecret, $OAuthToken, $OAuthSecret);



// Your Message

                $message = date("Y-m-d H:i:s") . "New Donation on - " . $prj['project_title'] . " Take a look from here - " . $project_share_link;



                // Send tweet 

                $tweet->post('statuses/update', array('status' => "$message"));

            }

        } catch (Exception $e) {

            return;

        }





        try {

            if ($prj['tw_oauth_token'] != '0' and $prj['tw_oauth_token_secret'] != '0' and $prj['autopost_site'] == '1' and $twitter_setting->autopost_site == '1') {

                // Insert your keys/tokens





                $consumerKey = $twitter_setting->consumer_key;

                $consumerSecret = $twitter_setting->consumer_secret;

                $OAuthToken = $prj['tw_oauth_token'];

                $OAuthSecret = $prj['tw_oauth_token_secret'];



                // Full path to twitterOAuth.php (change OAuth to your own path)

                $this->load->library('twitteroauth');

                //require_once($_SERVER['DOCUMENT_ROOT'].'OAuth/twitteroauth.php');

                // create new instance

                $tweet = new TwitterOAuth($consumerKey, $consumerSecret, $OAuthToken, $OAuthSecret);



                // Your Message

                $message = date("Y-m-d H:i:s") . "New Donation on - " . $prj['project_title'] . " Take a look from here - " . $project_share_link;



                // Send tweet 

                $tweet->post('statuses/update', array('status' => "$message"));

            }

        } catch (Exception $e) {

            return;

        }





        try {

            if ($twitter_setting->tw_oauth_token != '0' and $twitter_setting->tw_oauth_token_secret != '0' and $twitter_setting->autopost_site == '1') {

                // Insert your keys/tokens





                $consumerKey = $twitter_setting->consumer_key;

                $consumerSecret = $twitter_setting->consumer_secret;

                $OAuthToken = $twitter_setting->tw_oauth_token;

                $OAuthSecret = $twitter_setting->tw_oauth_token_secret;



                // Full path to twitterOAuth.php (change OAuth to your own path)

                $this->load->library('twitteroauth');

                //require_once($_SERVER['DOCUMENT_ROOT'].'OAuth/twitteroauth.php');

                // create new instance

                $tweet = new TwitterOAuth($consumerKey, $consumerSecret, $OAuthToken, $OAuthSecret);



                // Your Message

                $message = date("Y-m-d H:i:s") . "New Donation on - " . $prj['project_title'] . " Take a look from here - " . $project_share_link;



                // Send tweet 

                $tweet->post('statuses/update', array('status' => "$message"));

            }

        } catch (Exception $e) {

            return;

        }





/////////// twitter end 	

///////////============admin alert==========





        /*

          Confirmation Mail sent once fund is sucessfully added.

         */



        $email_template = $this->db->query("select * from `email_template` where task='New Fund Admin Notification'");

        $email_temp = $email_template->row();



        if ($email_temp) {

            $email_message = $email_temp->message;

            $email_subject = $email_temp->subject;

            $email_address_from = $email_temp->from_address;

            $email_address_reply = $email_temp->reply_address;

            $email_to = $email_address_from;



            $email_message = str_replace('{break}', '<br/>', $email_message);

            $email_message = str_replace('{user_name}', $username, $email_message);

            $email_message = str_replace('{project_name}', $project_name, $email_message);

            $email_message = str_replace('{donor_name}', $donor_name, $email_message);

            $email_message = str_replace('{donote_amount}', $donote_amount, $email_message);

            $email_message = str_replace('{donor_profile_link}', $donor_profile_link, $email_message);

            $email_message = str_replace('{project_page_link}', $project_page_link, $email_message);



            $str = $email_message;



            email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);

        }







        ///////=================owner alert===================



        $user_not = $this->user_model->get_email_notification($prj['user_id']);



        if ($user_not->add_fund == '1') {



            $email_template = $this->db->query("select * from `email_template` where task='New Fund Owner Notification'");

            $email_temp = $email_template->row();



            if ($email_temp) {

                $email_message = $email_temp->message;

                $email_subject = $email_temp->subject;

                $email_address_from = $email_temp->from_address;

                $email_address_reply = $email_temp->reply_address;

                $email_to = $project_owner_email;





                $email_message = str_replace('{break}', '<br/>', $email_message);

                $email_message = str_replace('{user_name}', $username, $email_message);

                $email_message = str_replace('{project_name}', $project_name, $email_message);

                if ($anonymous == '2') {

                    $email_message = str_replace('{donor_name}', $donor_name, $email_message);

                    $email_message = str_replace('{donote_amount}', 'Anonymous amount', $email_message);

                    $email_message = str_replace('{donor_profile_link}', $donor_profile_link, $email_message);

                } elseif ($anonymous == '3') {

                    $email_message = str_replace('{donor_name}', 'Anonymous donar', $email_message);

                    $email_message = str_replace('{donote_amount}', 'Anonymous amount', $email_message);

                    $email_message = str_replace('{donor_profile_link}', '', $email_message);

                } else {

                    $email_message = str_replace('{donor_name}', $donor_name, $email_message);

                    $email_message = str_replace('{donote_amount}', $donote_amount, $email_message);

                    $email_message = str_replace('{donor_profile_link}', $donor_profile_link, $email_message);

                }

                $email_message = str_replace('{project_page_link}', $project_page_link, $email_message);





                $str = $email_message;



                email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);

            }

        }



        /////////////////==============donor alert================================	



        $user_not_donor = $this->user_model->get_email_notification($user_id);



        if ($user_not_donor->add_fund == '1') {





            $email_template = $this->db->query("select * from `email_template` where task='New Fund Donor Notification'");

            $email_temp = $email_template->row();



            if ($email_temp) {

                $email_message = $email_temp->message;

                $email_subject = $email_temp->subject;

                $email_address_from = $email_temp->from_address;

                $email_address_reply = $email_temp->reply_address;

                $email_to = $donar_email;



                $email_message = str_replace('{break}', '<br/>', $email_message);

                $email_message = str_replace('{user_name}', $username, $email_message);

                $email_message = str_replace('{project_name}', $project_name, $email_message);

                $email_message = str_replace('{donor_name}', $donor_name, $email_message);

                $email_message = str_replace('{donote_amount}', $donote_amount, $email_message);

                $email_message = str_replace('{donor_profile_link}', $donor_profile_link, $email_message);

                $email_message = str_replace('{project_page_link}', $project_page_link, $email_message);





                $str = $email_message;

                email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);

            }

        }



        redirect('admin/transaction_type/list_transaction');

    }



    function donate_bank_delete($id) {

        $transaction_id = $this->uri->segment(3);

        $this->db->delete('transaction', array('transaction_id' => $id));



        redirect('admin/transaction_type/list_transaction');

    }



    function donate_direct() {

        

    }
	
	/*function currency_selection($project_id){

		$data['project_id'] = $project_id;
 		$project = get_one_project($project_id);
		$project_name = $project['url_project_title'];
		$data['error']='';
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('project_id','Project id', 'required|integer');
		$this->form_validation->set_rules('currency','Currency', 'required|integer');
		
        if ($this->form_validation->run() == FALSE) {

            $data['project_id'] =  $this->input->post('project_id');

            $data['currency'] = $this->input->post('currency');
			
			$data['error'] = validation_errors();
			
            $this->load->view('default/project/currency_selection', $data);

        } else {
		
		 	if ($this->input->post('cancel')) {

                redirect('projects/'.$project_name.'/'.$project_id);

            } else {
				
				redirect();
			}

		}
	}*/


	function my_transaction($offset = 0, $msg = '') {

        if ($this->session->userdata('user_id') == '') { redirect('home/login'); }

        $var = $this->uri->segment(4);
        $var2 = $this->uri->segment(5);


        $this->load->library('pagination');
        $limit = '10';
        $config['uri_segment'] = '3';
        $config['base_url'] = site_url('paymnet/my_transaction/');
        $config['total_rows'] = $this->get_total_my_paymnet_list();
        $config['per_page'] = $limit;
        $this->pagination->initialize($config);
        $data['page_link'] = $this->pagination->create_links();
        $data['limit'] = $limit;
        $data['total_rows'] = $config['total_rows'];
        $data['offset'] = $offset;
        $data['transaction_details'] = $this->my_transaction_list($offset, $limit);
        $data['msg'] = $msg;



        $data['header_menu'] = dynamic_menu(0);
        $data['footer_menu'] = dynamic_menu_footer(0);
        $data['right_menu'] = dynamic_menu_right(0);
        $data['site_setting'] = site_setting();

        $meta = meta_setting();
        $user = get_user_detail($this->session->userdata('user_id'));

        $this->home_model->select_text($this->session->userdata('lang_id'));
        $this->template->write('meta_title', 'My Transaction-' . $user['user_name'] . ' ' . $user['last_name'] . ' - ' . $meta['title'], TRUE);
        $this->template->write('meta_description', 'My Transaction-' . $user['user_name'] . ' ' . $user['last_name'] . ' - ' . $meta['meta_description'], TRUE);
        $this->template->write('meta_keyword', 'My Transaction-' . $user['user_name'] . ' ' . $user['last_name'] . ' - ' . $meta['meta_keyword'], TRUE);

        if ($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1) {
		
            $this->template->set_master_template('iphone/template.php');
            $this->template->write_view('main_content', 'iphone/wallet/index', $data, TRUE);
            $this->template->render();

        } elseif (($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1) {
		
            $this->template->set_master_template('mobile/template.php');
            $this->template->write_view('main_content', 'mobile/wallet/index', $data, TRUE);
            $this->template->render();

        } else {
		
            if (!check_user_authentication()) {
                $this->template->write_view('header', 'default/common/header', $data, TRUE);
            } else {
                $this->template->write_view('header', 'default/common/header_login', $data, TRUE);
            }
            $this->template->write_view('center_content', 'default/wallet/my_transaction', $data, TRUE);
            $this->template->write_view('footer', 'default/common/footer', $data, TRUE);
            $this->template->render();
			
        }

    }
	
	
	function get_total_my_paymnet_list(){
	
		$this->db->select('*');
		$this->db->from('interswitch_responce ir');
		//$this->db->join('transaction tr','ir.interswitch_responce_id = tr.interswitch_transaction_id','left');
		//$this->db->join('project','transaction.project_id = project.project_id','left');
		//$this->db->join('user','transaction.user_id = user.user_id','left');
		//$this->db->where('ir.gtpay_tranx_status_code','00');
		//$this->db->where('ir.gtpay_tranx_amt >',0);
		$this->db->where('ir.gtpay_cust_id',get_authenticateUserID());
		$this->db->order_by('ir.date desc');
		$this->db->limit($limit,$offset);
		$query = $this->db->get();
		return $query->num_rows;
	
	}
	
	
	function my_transaction_list($offset, $limit){
	
		$this->db->select('*');
		$this->db->from('interswitch_responce ir');
		//$this->db->join('transaction tr','ir.interswitch_responce_id = tr.interswitch_transaction_id','left');
		//$this->db->join('project','transaction.project_id = project.project_id','left');
		//$this->db->join('user','transaction.user_id = user.user_id','left');
		//$this->db->where('ir.gtpay_tranx_status_code','00');
		//$this->db->where('ir.gtpay_tranx_amt >',0);
		$this->db->where('ir.gtpay_cust_id',get_authenticateUserID());
		$this->db->order_by('ir.date desc');
		$this->db->limit($limit,$offset);
		$query = $this->db->get();
		
		//echo $this->db->last_query();
		if($query->num_rows>0) 
		{
			return $query->result();
		}
		
		return 0;
	}

}

	

?>