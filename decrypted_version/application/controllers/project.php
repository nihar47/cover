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

 * Copyright � 2012-2020 by Rockers Technology , INC a domestic profit corporation has been duly incorporated under

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

class Project extends ROCKERS_Controller {

    function Project() {

        parent::__construct();



        $this->load->model('project_model');

        $this->load->model('user_model');

        $this->load->model('home_model');
		 $this->load->model('wallet_model');
		

        $this->load->library('paypal_lib');
    }

    function index() {



        redirect('home/index');
    }

    ////////============= rating on project=========	



    function rate_project() {

        $id = $this->input->post('id');

        $vote = $this->input->post('rating');



        $this->load->helper('cookie');



        if (isset($_COOKIE['rated' . $id])) {



            echo "<div class='highlight'>" . ALREADY_VOTED . "</div>";

            die();
        } else {





            setcookie("rated" . $id, $id, time() + 60 * 60 * 24 * 365);

            $rate = $this->project_model->rating($id, $vote);









            $reply = '<div style="font-size:10px; color:#ffffff; font-weight:bold;">' . VOTE_IS_ADDED . '</div><div id="rating_' . $id . '">

			<span class="star_1"><img src="' . base_url() . 'images2/star_blank.png"';



            if ($rate > 0) {
                $reply.="class='hover'";
            } $reply.='alt=""  /></span>

			<span class="star_2"><img src="' . base_url() . 'images2/star_blank.png"';



            if ($rate > 1.5) {
                $reply.="class='hover'";
            } $reply.='alt=""  /></span>			 

			<span class="star_3"><img src="' . base_url() . 'images2/star_blank.png"';



            if ($rate > 2.5) {
                $reply.="class='hover'";
            } $reply.='alt=""  /></span>

			 <span class="star_4"><img src="' . base_url() . 'images2/star_blank.png"';





            if ($rate > 3.5) {
                $reply.="class='hover'";
            } $reply.='alt=""  /></span>			  

			<span class="star_5"><img src="' . base_url() . 'images2/star_blank.png"';



            if ($rate > 4.5) {
                $reply.="class='hover'";
            } $reply.='alt=""  /></span></div>';



            echo $reply;

            die();
        }
    }

    /////////////============report spam================



    function report_spam($cmid, $offset = 0) {

        $this->project_model->report_spam($cmid);

        redirect('project/comments/' . $this->session->userdata('project_id') . '/' . $offset . '/reported');
    }

    ////////=============project incoming donation=====



    function project_incoming_fund($offset = 0) {



        $this->load->library('pagination');

        $uid = $this->session->userdata('user_id');

        if ($this->session->userdata('project_id')) {



            $id = $this->session->userdata('project_id');
        } else {

            $id = 0;
        }

        $limit = '9';

        $config['base_url'] = site_url('project/project_incoming_fund/');

        $config['total_rows'] = $this->project_model->current_project_fund_total($id);

        $config['per_page'] = $limit;

        $this->pagination->initialize($config);



        $data['page_link'] = $this->pagination->create_links();



        $data['total_rows'] = $config['total_rows'];

        $data['per_page'] = $limit;

        $data['offset'] = $offset;

        $data['limit'] = $limit;



        $data['idea'] = $this->home_model->get_idea();



        $data['result'] = $this->project_model->current_project_fund($id, $offset, $limit);

        //echo "<pre>";
        //print_r($data);
        //exit;
        //$data['gallery']=$this->home_model->get_gallery();

        $data['site_setting'] = site_setting();

        $meta = meta_setting();



        $base_path = base_path();



        $data['base_path'] = $base_path;

        $data['header_menu'] = dynamic_menu(0);

        $data['footer_menu'] = dynamic_menu_footer(0);

        $data['right_menu'] = dynamic_menu_right(0);



        $data['project'] = get_one_project($id);



        $this->home_model->select_text();



        $this->template->write('meta_title', 'running project-' . $meta['title'], TRUE);

        $this->template->write('meta_description', 'Running Project-' . $meta['meta_description'], TRUE);

        $this->template->write('meta_keyword', 'Popular Campaign-' . $meta['meta_keyword'], TRUE);

        $this->template->write_view('header', 'header_login', $data, TRUE);

        $this->template->write_view('main_content', 'current_project_funds', $data, TRUE);

        $this->template->write_view('footer', 'footer', $data, TRUE);

        $this->template->render();
    }

    function incoming_fund($offset = 0) {



        $this->load->library('pagination');

        $uid = $this->session->userdata('user_id');



        $limit = '9';

        $config['uri_segment'] = '3';

        $config['base_url'] = site_url('project/incoming_fund/'); // base_url().'project/incoming_fund/';

        $config['total_rows'] = $this->project_model->current_project_total($uid);

        $config['per_page'] = $limit;

        $this->pagination->initialize($config);

        $data['page_link'] = $this->pagination->create_links();

        $data['total_rows'] = $config['total_rows'];

        $data['per_page'] = $limit;

        $data['offset'] = $offset;

        $data['limit'] = $limit;



        $data['idea'] = $this->home_model->get_idea();

        $data['result'] = $this->project_model->current_project($uid, $offset, $limit);

        //echo "<pre>";
        //print_r($data);
        //exit;

        $data['site_setting'] = site_setting();



        $meta = meta_setting();

        $base_path = base_path();

        $data['base_path'] = $base_path;

        $data['header_menu'] = dynamic_menu(0);

        $data['footer_menu'] = dynamic_menu_footer(0);

        $data['right_menu'] = dynamic_menu_right(0);



        $this->home_model->select_text();

        $this->template->write('meta_title', 'running project-' . $meta['title'], TRUE);

        $this->template->write('meta_description', 'Running Project-' . $meta['meta_description'], TRUE);

        $this->template->write('meta_keyword', 'Popular Campaign-' . $meta['meta_keyword'], TRUE);





        if ($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1) {

            $this->template->set_master_template('iphone/template.php');

            $this->template->write_view('main_content', 'iphone/all_project_fund', $data, TRUE);

            $this->template->render();
        } elseif (($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1) {

            $this->template->set_master_template('mobile/template.php');

            $this->template->write_view('main_content', 'mobile/all_project_fund', $data, TRUE);

            $this->template->render();
        } else {

            $this->template->write_view('header', 'default/header_login', $data, TRUE);

            $this->template->write_view('main_content', 'default/all_project_fund', $data, TRUE);

            $this->template->write_view('footer', 'default/footer', $data, TRUE);

            $this->template->render();
        }
    }

    /////////////============Project Details  =====================





    function project_detail($title = '', $id = 0, $fm = '') {

        //echo "<br>";die();

        if ($id == '') {

            redirect('search/');
        }



        $chk_project = $this->db->query("select * from project where project_id='" . $id . "'");



        if ($chk_project->num_rows() > 0) {
            
        } else {

            redirect('search');
        }



        $data['error'] = "";







        $data['showbacker'] = "";

        $data['showcomment'] = '';

        $data['showupdates'] = '';



        $data['one_project'] = get_one_project($id);

        $data['project'] = get_all_project();







        $data['project_category'] = $this->project_model->get_project_detail_category($id);



        $data['project_gallery'] = $this->project_model->get_all_project_gallery($id);



        $data['comments'] = $this->project_model->get_comments($id);



        $data['all_perks'] = $this->project_model->get_all_perks($id);
        

        $data['updates'] = $this->project_model->get_updates($id);



        //$data_header['color'] = $data['project']['color'];
        //$data['color'] = $data['project']['color'];





        $data['donation'] = $this->project_model->get_latest_donations($id);





        $data['fm'] = $fm;









        $data['site_setting'] = site_setting();

        $data['idea'] = $this->home_model->get_idea();



        $data['backers'] = $this->project_model->get_all_backers($id);

        $data['project_backers'] = $this->project_model->get_total_donations_count($id);

        $data['total_updates'] = $this->project_model->get_total_updates_count($id);

        $data['total_comments'] = $this->project_model->get_total_comments_count($id);



        $data['project_user'] = get_one_project($id);



        $project_user = get_one_project($id);

        $user_detail = get_user_detail($project_user['user_id']);



        $data['user_name'] = $user_detail['user_name'];

        $data['last_name'] = $user_detail['last_name'];

        $data['user_image'] = $user_detail['image'];

        $data['user_city'] = $user_detail['city'];

        $data['user_state'] = $user_detail['state'];

        $data['user_country'] = $user_detail['country'];

        $data['user_website'] = $user_detail['user_website'];



        $data['user_detail'] = $user_detail;



        $meta_title = $project_user['project_title'] . ',&nbsp;' . $user_detail['user_name'] . '&nbsp;' . $user_detail['last_name'] . ',&nbsp;' . $user_detail['country'];



        $meta_description = $project_user['project_title'] . ',&nbsp;' . $user_detail['user_name'] . '&nbsp;' . $user_detail['last_name'] . ',&nbsp;' . $user_detail['country'];



        $meta_keyword = $project_user['project_title'] . ',&nbsp;' . $user_detail['user_name'] . '&nbsp;' . $user_detail['last_name'] . ',&nbsp;' . $user_detail['country'];



        $this->home_model->select_text();

        $this->template->write('meta_title', $meta_title, TRUE);

        $this->template->write('meta_description', $meta_description, TRUE);

        $this->template->write('meta_keyword', $meta_keyword, TRUE);

        //$this->template->add_css($data_header['color'].'/fund-'.$data_header['color'].'.css');





        if ($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1) {

            $this->template->set_master_template('iphone/template.php');

            $this->template->write_view('main_content', 'iphone/search_project_detail', $data, TRUE);

            $this->template->render();
        } elseif (($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1) {

            $this->template->set_master_template('mobile/template.php');

            $this->template->write_view('main_content', 'mobile/search_project_detail', $data, TRUE);

            $this->template->render();
        } else {

            if (!check_user_authentication()) {

                $this->template->write_view('header', 'default/common/header', $data, TRUE);
            } else {

                $this->template->write_view('header', 'default/common/header_login', $data, TRUE);
            }

            $this->template->write_view('main_content', 'default/project/project_details', $data, TRUE);

            $this->template->write_view('sidebar', 'default/project/project_sidebar', $data, TRUE);

            $this->template->write_view('footer', 'default/common/footer', $data, TRUE);

            $this->template->render();
        }
    }

    function add_comment() {



        $chk_user = 'false';



        $id = $_POST['project_id'];



        /* $spamer=$this->home_model->spam_protection();

          if($spamer==1 || $spamer=='1') {

          $chk_user='true';

          }







          $this->form_validation->set_rules('comments', COMMENTS, 'required');



          $len_error='';

          if($_POST){

          //$comments = str_replace(' ','',$this->input->post('comments'));

          $comments = $_POST['comments'];

          $len = strlen($comments);

          if($len<15){



          $len_error = '<p>'.YOU_CANNOT_ADD_LESS_THAN_FIFTEEN_CHAR_COMMENT.'</p>';



          }



          } */

        // $inputCode = $this->input->post('imagecode');



        /* $error = "";



          if($this->form_validation->run() == FALSE || $error != "" || $len_error!='')

          {

          $data['error'] = $error;

          if(validation_errors())

          {

          $spam_message='';



          if($chk_user=='true')

          {

          $spam_message='<p>'.YOUR_IP_HAS_BEEN_BAND_DUE_SPAM_YOU_CAN_NOT_POST_MORE_COMMENT.'</p>';

          }



          $data['error'] = $spam_message.$data['error'] . validation_errors();



          }

          if($len_error!=''){



          $data["error"] .= $len_error;

          }

          }else{





          if($chk_user=='true')

          {

          $data["error"] = '<p>'.YOUR_IP_HAS_BEEN_BAND_DUE_SPAM_YOU_CAN_NOT_POST_MORE_COMMENT.'</p>';

          }

          else

          {





          $chk_spam_comment=$this->project_model->check_spam_comment();



          if($chk_spam_comment==1)

          {

          $data["error"] = '<p>'.YOUR_IP_HAS_BEEN_BAND_DUE_SPAM_YOU_CAN_NOT_POST_MORE_COMMENT.'</p>';

          }



          else

          { */





        $data['error'] = '<p style="color:#7DBF0F; font-weight:bold;">' . COMMENT_HAS_BEEN_ADDED_SUCCESSFULLY . '</p>';

        $com_id = $this->project_model->comment_insert();









        $get_last_comment = $this->project_model->get_single_commnet($com_id);

        $project_user = $this->project_model->get_project_user($id);



        $login_user = get_user_detail($this->session->userdata('user_id'));





        $message = 'Hello ' . $login_user['user_name'] . ',<br/><br/>Posted Commnet : ' . $this->input->post('comments') . '<br/><br/>Posted On : ' . $project_user['project_title'] . '<br/><br/>Delete Comment Click following Link :' . site_url('project/delete_comments/' . $com_id) . ' <br/><br/>Thank You.';

        $username = $project_user['user_name'];

        $comment_user_name = $login_user['user_name'];

        $project_name = $project_user['project_title'];

        $comment = $this->input->post('comments');

        $email = $project_user['email'];

        $comment_user_profile_link = site_url('member/' . $this->session->userdata('user_id'));

        $project_page_link = site_url('projects/' . $project_user['url_project_title'] . '/' . $project_user['project_id']);



        /* $prj = $this->project_model->get_project_user($id);

          $login_user = get_user_detail($this->session->userdata('user_id'));

          $project = $prj;

          $facebook_setting = facebook_setting();

          ////// share on facebook





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



          if($login_user['fb_uid']!='' and $facebook=='1' and $login_user['fb_access_token']!=''){



          $fbAccessToken = $login_user['fb_access_token'];

          $publishStream = $this->fb_connect->publish($login_user['fb_uid'],array(

          'access_token' => $fbAccessToken,

          'link' =>$project_share_link,

          'picture' => $image,

          'name' => "New Comment on ".$prj['project_title'],

          'description'=> $comment

          )

          );

          }



          if($prj['fb_uid']!='' and $prj['facebook_wall_post']=='1' and $prj['fb_access_token']!=''){



          $fbAccessToken = $prj['fb_access_token'];

          $publishStream = $this->fb_connect->publish($prj['fb_uid'],array(

          'access_token' => $fbAccessToken,

          'link' =>$project_share_link,

          'picture' => $image,

          'name' => "New Comment on ".$prj['project_title'],



          'description'=> $comment

          )

          );

          }



          if($facebook_setting->facebook_user_id!='' and $facebook_setting->facebook_wall_post=='1' and $facebook_setting->facebook_access_token!=''){



          $fbAccessToken = $facebook_setting->facebook_access_token;

          $publishStream = $this->fb_connect->publish($facebook_setting->facebook_user_id,array(

          'access_token' => $fbAccessToken,

          'link' =>$project_share_link,

          'picture' => $image,

          'name' => "New Comment on ".$prj['project_title'],

          'description'=> $comment

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

          if($login_user['tw_oauth_token']!='0' and $login_user['tw_oauth_token_secret']!='0' and $twitter=='1'){

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

          $message =date("Y-m-d H:i:s")."New Comment on - ".$prj['project_title']." Take a look from here - ".$project_share_link;



          // Send tweet

          $tweet->post('statuses/update', array('status' => "$message"));

          }

          }catch(Exception $e)

          {

          return ;

          }





          try

          {

          if($prj['tw_oauth_token']!='0' and $prj['tw_oauth_token_secret']!='0' and $prj['autopost_site']=='1'){

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

          $message =date("Y-m-d H:i:s")."New Comment on - ".$prj['project_title']." Take a look from here - ".$project_share_link;



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

          $message =date("Y-m-d H:i:s")."New Comment on - ".$prj['project_title']." Take a look from here - ".$project_share_link;



          // Send tweet

          $tweet->post('statuses/update', array('status' => "$message"));

          }

          }catch(Exception $e)

          {

          return ;

          }





          /////////// twitter end

         */



        //////////=======new comment admin alert================



        $email_template = $this->db->query("select * from `email_template` where task='New Comment Admin Alert'");

        $email_temp = $email_template->row();





        $email_address_from = $email_temp->from_address;

        $email_address_reply = $email_temp->reply_address;



        $email_subject = $email_temp->subject;

        $email_message = $email_temp->message;



        $email_to = $email_address_from;









        $email_message = str_replace('{break}', '<br/>', $email_message);

        $email_message = str_replace('{user_name}', $username, $email_message);

        $email_message = str_replace('{comment_user_name}', $comment_user_name, $email_message);

        $email_message = str_replace('{email}', $email, $email_message);

        $email_message = str_replace('{project_name}', $project_name, $email_message);

        $email_message = str_replace('{comment}', $comment, $email_message);

        $email_message = str_replace('{comment_user_profile_link}', $comment_user_profile_link, $email_message);

        $email_message = str_replace('{project_page_link}', $project_page_link, $email_message);





        $str = $email_message;



        email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);

        //////////=======new comment admin alert================
        //////////=======New Comment Owner Alert================



        $user_not_own = $this->user_model->get_email_notification($project_user['user_id']);







        if ($user_not_own->comment_alert == '1') {



            $email_template = $this->db->query("select * from `email_template` where task='New Comment Owner Alert'");

            $email_temp = $email_template->row();





            $email_address_from = $email_temp->from_address;

            $email_address_reply = $email_temp->reply_address;



            $email_subject = $email_temp->subject;

            $email_message = $email_temp->message;



            $email_to = $project_user['email'];









            $email_message = str_replace('{break}', '<br/>', $email_message);

            $email_message = str_replace('{user_name}', $username, $email_message);

            $email_message = str_replace('{comment_user_name}', $comment_user_name, $email_message);

            $email_message = str_replace('{email}', $email, $email_message);

            $email_message = str_replace('{project_name}', $project_name, $email_message);

            $email_message = str_replace('{comment}', $comment, $email_message);

            $email_message = str_replace('{comment_user_profile_link}', $comment_user_profile_link, $email_message);

            $email_message = str_replace('{project_page_link}', $project_page_link, $email_message);





            $str = $email_message;



            email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);
        }



        //////////=======New Comment Owner Alert================
        //////////=======New Comment Poster Alert================



        $user_not_own = $this->user_model->get_email_notification($this->session->userdata('user_id'));



        if ($user_not_own->comment_alert == '1') {





            $email_template = $this->db->query("select * from `email_template` where task='New Comment Poster Alert'");

            $email_temp = $email_template->row();





            $email_address_from = $email_temp->from_address;

            $email_address_reply = $email_temp->reply_address;



            $email_subject = $email_temp->subject;

            $email_message = $email_temp->message;



            $email_to = $login_user['email'];









            $email_message = str_replace('{break}', '<br/>', $email_message);

            $email_message = str_replace('{user_name}', $username, $email_message);

            $email_message = str_replace('{comment_user_name}', $comment_user_name, $email_message);

            $email_message = str_replace('{email}', $email, $email_message);

            $email_message = str_replace('{project_name}', $project_name, $email_message);

            $email_message = str_replace('{comment}', $comment, $email_message);

            $email_message = str_replace('{comment_user_profile_link}', $comment_user_profile_link, $email_message);

            $email_message = str_replace('{project_page_link}', $project_page_link, $email_message);





            $str = $email_message;



            email_send($email_address_from, $email_address_reply, $email_to, $email_subject, $str);
        }

        //////////=======New Comment Poster Alert================

        if ($com_id != "") {

            $stat = "success";
        } else {

            $stat = "Unsuccess";
        }









        $response = array(
            'last_comment_id' => $com_id,
            'comment_text' => $_POST['comments'],
            'comment_date' => getDuration($get_last_comment['date_added']),
            'status' => 'success'
        );





        echo json_encode($response);

        exit; // only print out the json version of the response
        //////////////==================email=============
        //} ////====spam check==
        //}
        // }





        if ($this->input->post('project_id') != '') {

            $id = $this->input->post('project_id');
        } else {

            $id = $id;
        }











        $chk_project = $this->db->query("select * from project where project_id='" . $id . "'");



        if ($chk_project->num_rows() > 0) {
            
        } else {

            redirect('search');
        }



        /*         * **************** */





        /* $data['project'] = get_one_project($id);

          $data['comments'] = $this->project_model->get_comments($id);

          $data['updates'] = $this->project_model->get_updates($id);

          $data['all_perks'] = $this->project_model->get_all_perks($id);

          $data['project_category'] = $this->project_model->get_project_detail_category($id);

          $data['project_gallery'] = $this->project_model->get_all_project_gallery($id);



          $data['backers']=$this->project_model->get_all_backers($id);



          $data_header['color'] = $data['project']['color'];



          $data['donation'] = $this->project_model->get_latest_donations($id);

          $data['fm'] = '';







          $meta = meta_setting();

          $data['site_setting'] = site_setting();



          $data['idea']=$this->home_model->get_idea();





          $project_user = get_one_project($id);

          $user_detail = get_user_detail($project_user['user_id']);



          $data['user_detail']=$user_detail;



          $data['user_name']=$user_detail['user_name'];

          $data['last_name']=$user_detail['last_name'];

          $data['user_image']=$user_detail['image'];

          $data['user_city']=$user_detail['city'];

          $data['user_state']=$user_detail['state'];

          $data['user_country']=$user_detail['country']; */



        /*

          $meta_title='Comment-'.$project_user['project_title'].',&nbsp;'.$user_detail['user_name'].'&nbsp;'.$user_detail['last_name'].',&nbsp;'.$user_detail['country'];



          $meta_description=$project_user['project_title'].',&nbsp;'.$user_detail['user_name'].'&nbsp;'.$user_detail['last_name'].',&nbsp;'.$user_detail['country'];



          $meta_keyword=$project_user['project_title'].',&nbsp;'.$user_detail['user_name'].'&nbsp;'.$user_detail['last_name'].',&nbsp;'.$user_detail['country'];





          $this->home_model->select_text();











          $this->template->write('meta_title', $meta_title, TRUE);

          $this->template->write('meta_description', $meta_description, TRUE);

          $this->template->write('meta_keyword', $meta_keyword, TRUE);

          $this->template->add_css($data_header['color'].'/fund-'.$data_header['color'].'.css');

          $this->template->write_view('header', 'default/header', $data, TRUE);

          $this->template->write_view('main_content', 'default/project_details', $data, TRUE);

          $this->template->write_view('sidebar', 'default/project_sidebar', $data, TRUE);

          $this->template->write_view('footer', 'default/project_footer',$data, TRUE);

          $this->template->render(); */
    }

    function getbacker($id = 0) {



        $data['showbacker'] = 'showbacker';

        $data['showcomment'] = '';

        $data['showupdates'] = '';

        $data['project'] = get_one_project($id);

        $data['project_category'] = $this->project_model->get_project_detail_category($id);

        $data['project_gallery'] = $this->project_model->get_all_project_gallery($id);

        $data['comments'] = $this->project_model->get_comments($id);

        $data['all_perks'] = $this->project_model->get_all_perks($id);

        $data['updates'] = $this->project_model->get_updates($id);

        $data_header['color'] = $data['project']['color'];

        $data['color'] = $data['project']['color'];

        $data['donation'] = $this->project_model->get_latest_donations($id);

        $data['fm'] = $fm;

        $data['site_setting'] = site_setting();

        $data['idea'] = $this->home_model->get_idea();



        $data['backers'] = $this->project_model->get_all_backers($id);







        $data['project_user'] = get_one_project($id);





        $user_detail = get_user_detail($project_user['user_id']);





        $data['user_name'] = $user_detail['user_name'];

        $data['last_name'] = $user_detail['last_name'];

        $data['user_image'] = $user_detail['image'];

        $data['user_city'] = $user_detail['city'];

        $data['user_state'] = $user_detail['state'];

        $data['user_country'] = $user_detail['country'];



        $data['user_detail'] = $user_detail;



        $meta_title = $project_user['project_title'] . ',&nbsp;' . $user_detail['user_name'] . '&nbsp;' . $user_detail['last_name'] . ',&nbsp;' . $user_detail['country'];



        $meta_description = $project_user['project_title'] . ',&nbsp;' . $user_detail['user_name'] . '&nbsp;' . $user_detail['last_name'] . ',&nbsp;' . $user_detail['country'];



        $meta_keyword = $project_user['project_title'] . ',&nbsp;' . $user_detail['user_name'] . '&nbsp;' . $user_detail['last_name'] . ',&nbsp;' . $user_detail['country'];





        $data['header_menu'] = dynamic_menu(0);

        $data['footer_menu'] = dynamic_menu_footer(0);

        $data['right_menu'] = dynamic_menu_right(0);



        $this->home_model->select_text();

        $this->template->write('meta_title', $meta_title, TRUE);

        $this->template->write('meta_description', $meta_description, TRUE);

        $this->template->write('meta_keyword', $meta_keyword, TRUE);

        $this->template->add_css($data_header['color'] . '/fund-' . $data_header['color'] . '.css');







        $this->template->set_master_template('iphone/template.php');

        $this->template->write_view('main_content', 'iphone/search_project_detail', $data, TRUE);

        $this->template->render();

        /* if($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1)

          {

          $this->template->set_master_template('iphone/template.php');

          $this->template->write_view('main_content', 'iphone/search_project_detail', $data, TRUE);

          $this->template->render();

          }

          if(($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1)

          {

          $this->template->set_master_template('mobile/template.php');

          $this->template->write_view('main_content', 'mobile/search_project_detail', $data, TRUE);

          $this->template->render();

          } */
    }

    function getcomment($id = 0) {

        $data['showcomment'] = 'showcomment';

        $data['showbacker'] = "";

        $data['showupdates'] = '';



        $data['project'] = get_one_project($id);

        $data['project_category'] = $this->project_model->get_project_detail_category($id);

        $data['project_gallery'] = $this->project_model->get_all_project_gallery($id);

        $data['comments'] = $this->project_model->get_comments($id);

        $data['all_perks'] = $this->project_model->get_all_perks($id);

        $data['updates'] = $this->project_model->get_updates($id);



        $data_header['color'] = $data['project']['color'];

        $data['color'] = $data['project']['color'];

        $data['donation'] = $this->project_model->get_latest_donations($id);

        $data['fm'] = $fm;

        $data['site_setting'] = site_setting();

        $data['idea'] = $this->home_model->get_idea();



        $data['backers'] = $this->project_model->get_all_backers($id);







        $data['project_user'] = get_one_project($id);





        $user_detail = get_user_detail($project_user['user_id']);





        $data['user_name'] = $user_detail['user_name'];

        $data['last_name'] = $user_detail['last_name'];

        $data['user_image'] = $user_detail['image'];

        $data['user_city'] = $user_detail['city'];

        $data['user_state'] = $user_detail['state'];

        $data['user_country'] = $user_detail['country'];



        $data['user_detail'] = $user_detail;





        $meta_title = $project_user['project_title'] . ',&nbsp;' . $user_detail['user_name'] . '&nbsp;' . $user_detail['last_name'] . ',&nbsp;' . $user_detail['country'];



        $meta_description = $project_user['project_title'] . ',&nbsp;' . $user_detail['user_name'] . '&nbsp;' . $user_detail['last_name'] . ',&nbsp;' . $user_detail['country'];



        $meta_keyword = $project_user['project_title'] . ',&nbsp;' . $user_detail['user_name'] . '&nbsp;' . $user_detail['last_name'] . ',&nbsp;' . $user_detail['country'];





        $data['header_menu'] = dynamic_menu(0);

        $data['footer_menu'] = dynamic_menu_footer(0);

        $data['right_menu'] = dynamic_menu_right(0);



        $this->home_model->select_text();

        $this->template->write('meta_title', $meta_title, TRUE);

        $this->template->write('meta_description', $meta_description, TRUE);

        $this->template->write('meta_keyword', $meta_keyword, TRUE);

        $this->template->add_css($data_header['color'] . '/fund-' . $data_header['color'] . '.css');



        $this->template->set_master_template('iphone/template.php');

        $this->template->write_view('main_content', 'iphone/search_project_detail', $data, TRUE);

        $this->template->render();



        /* if($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1)

          {

          $this->template->set_master_template('iphone/template.php');

          $this->template->write_view('main_content', 'iphone/search_project_detail', $data, TRUE);

          $this->template->render();

          }

          if(($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1)

          {

          $this->template->set_master_template('mobile/template.php');

          $this->template->write_view('main_content', 'mobile/search_project_detail', $data, TRUE);

          $this->template->render();

          } */
    }

    function getupdates($id = 0) {

        $data['showcomment'] = '';

        $data['showbacker'] = "";

        $data['showupdates'] = 'showupdates';



        $data['project'] = get_one_project($id);

        $data['project_category'] = $this->project_model->get_project_detail_category($id);

        $data['project_gallery'] = $this->project_model->get_all_project_gallery($id);

        $data['comments'] = $this->project_model->get_comments($id);

        $data['all_perks'] = $this->project_model->get_all_perks($id);

        $data['updates'] = $this->project_model->get_updates($id);

        $data_header['color'] = $data['project']['color'];

        $data['color'] = $data['project']['color'];

        $data['donation'] = $this->project_model->get_latest_donations($id);

        $data['fm'] = $fm;

        $data['site_setting'] = site_setting();

        $data['idea'] = $this->home_model->get_idea();



        $data['backers'] = $this->project_model->get_all_backers($id);







        $data['project_user'] = get_one_project($id);





        $user_detail = get_user_detail($project_user['user_id']);



        $data['user_name'] = $user_detail['user_name'];

        $data['last_name'] = $user_detail['last_name'];

        $data['user_image'] = $user_detail['image'];

        $data['user_city'] = $user_detail['city'];

        $data['user_state'] = $user_detail['state'];

        $data['user_country'] = $user_detail['country'];



        $data['user_detail'] = $user_detail;



        $meta_title = $project_user['project_title'] . ',&nbsp;' . $user_detail['user_name'] . '&nbsp;' . $user_detail['last_name'] . ',&nbsp;' . $user_detail['country'];



        $meta_description = $project_user['project_title'] . ',&nbsp;' . $user_detail['user_name'] . '&nbsp;' . $user_detail['last_name'] . ',&nbsp;' . $user_detail['country'];



        $meta_keyword = $project_user['project_title'] . ',&nbsp;' . $user_detail['user_name'] . '&nbsp;' . $user_detail['last_name'] . ',&nbsp;' . $user_detail['country'];





        $data['header_menu'] = dynamic_menu(0);

        $data['footer_menu'] = dynamic_menu_footer(0);

        $data['right_menu'] = dynamic_menu_right(0);



        $this->home_model->select_text();

        $this->template->write('meta_title', $meta_title, TRUE);

        $this->template->write('meta_description', $meta_description, TRUE);

        $this->template->write('meta_keyword', $meta_keyword, TRUE);

        $this->template->add_css($data_header['color'] . '/fund-' . $data_header['color'] . '.css');



        $this->template->set_master_template('iphone/template.php');

        $this->template->write_view('main_content', 'iphone/search_project_detail', $data, TRUE);

        $this->template->render();

        /* if($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1)

          {

          $this->template->set_master_template('iphone/template.php');

          $this->template->write_view('main_content', 'iphone/search_project_detail', $data, TRUE);

          $this->template->render();

          }

          if(($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1)

          {

          $this->template->set_master_template('mobile/template.php');

          $this->template->write_view('main_content', 'mobile/search_project_detail', $data, TRUE);

          $this->template->render();

          } */
    }

    /////////////============Project Details  =====================
    /////////////============Edit Project Details  =====================	





    function edit_project($id = '') {





        if ($id == '') {

            redirect('user/my_project');
        }





        $chk_user_project = $this->db->query("select * from project where project_id='" . $id . "' and user_id='" . $this->session->userdata('user_id') . "'");



        if ($chk_user_project->num_rows() > 0) {
            
        } else {

            redirect('home/dashboard');
        }





        $data['error'] = "";



        $project = get_one_project($id);



        $data['project_id'] = $project['project_id'];



        $data['project_title'] = $project['project_title'];

        $data['url_project_title'] = $project['url_project_title'];

        $data['amount'] = $project['amount'];

        $data['category_id'] = $project['category_id'];

        $data['status'] = $project['status'];

        $data['total_days'] = $project['total_days'];

        $data['payment_type'] = $project['payment_type'];



        $data['active'] = $project['active'];

        $data['active_cnt'] = $project['active_cnt'];

        $data['project_draft'] = $project['project_draft'];



        $data['start_date'] = $project['date_added'];

        $data['end_date'] = $project['end_date'];



        $data['project_city'] = $project['project_city'];

        $data['project_state'] = $project['project_state'];

        $data['project_country'] = $project['project_country'];

        $data['p_google_code'] = $project['p_google_code'];



        $data['projectimagevideoset'] = $project['display_page'];

        $data['image'] = $project['image'];

        $data['file_up'] = '';

        $data['video_set'] = $project['video_type'];

        $data['video'] = $project['video'];

        $data['videofile'] = $project['custom_video'];





        $data['project_summary'] = $project['project_summary'];

        $data['description'] = $project['description'];









        $data['countrylist'] = $this->home_model->get_country();

        $data['statelist'] = $this->home_model->get_state();

        $data['citylist'] = $this->home_model->get_city();









        $data['categorylist'] = $this->home_model->get_category();







        $data['header_menu'] = dynamic_menu(0);

        $data['footer_menu'] = dynamic_menu_footer(0);

        $data['right_menu'] = dynamic_menu_right(0);







        $meta = meta_setting();

        $data['site_setting'] = site_setting();





        $this->home_model->select_text();

        $this->template->write('meta_title', 'Edit Campaign-' . $meta['title'], TRUE);

        $this->template->write('meta_description', $meta['meta_description'], TRUE);

        $this->template->write('meta_keyword', $meta['meta_keyword'], TRUE);







        if ($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1) {

            $this->template->set_master_template('iphone/template.php');

            $this->template->write_view('main_content', 'iphone/edit_project', $data, TRUE);

            $this->template->render();
        } elseif (($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1) {

            $this->template->set_master_template('mobile/template.php');

            $this->template->write_view('main_content', 'mobile/edit_project', $data, TRUE);

            $this->template->render();
        } else {

            $this->template->write_view('header', 'default/header_login', $data, TRUE);

            $this->template->write_view('center_content', 'default/edit_project', $data, TRUE);

            $this->template->write_view('footer', 'default/footer', $data, TRUE);

            $this->template->render();
        }
    }

    function update_project($id) {









        $this->form_validation->set_rules('project_title', PAGE_TITLE, 'required');

        $this->form_validation->set_rules('category_id', CATEGORY, 'required');



        //$this->form_validation->set_rules('total_days', TOTAL_DAYS, 'required');				

        $this->form_validation->set_rules('amount', FUND_GOAL, 'required|numeric');





        $this->form_validation->set_rules('project_city', CITY, 'required');

        $this->form_validation->set_rules('project_state', STATE, 'required');

        $this->form_validation->set_rules('project_country', COUNTRY, 'required');





        $this->form_validation->set_rules('project_summary', PROJECT_SUMMARY, 'required');

        $this->form_validation->set_rules('description', DESCRIPTION, 'required');





        $site_setting = site_setting();

        $amount_error = '';



        if ($_POST) {





            $total_days = $this->input->post('total_days');



            if ($total_days < $site_setting['project_min_days'] || $total_days > $site_setting['project_max_days']) {

                $amount_error = "<p>" . sprintf(DATE_BETWEEN_LIMIT_DAYS, $site_setting['project_min_days'], $site_setting['project_max_days']) . "</p>";
            }





            if ($this->input->post('amount') < $site_setting['minimum_goal']) {

                $amount_error .= "<p>" . sprintf(GOAL_AMOUNT_SHOULD_BE_GREATER_THAN, $site_setting['minimum_goal']) . "</p>";
            }



            if ($this->input->post('amount') >= $site_setting['maximum_goal']) {

                $amount_error .= "<p>" . sprintf(GOAL_AMOUNT_SHOULD_BE_LESS_THAN, $site_setting['maximum_goal']) . "</p>";
            }
        }







        if ($this->form_validation->run() == FALSE || $amount_error != '') {

            if (validation_errors() || $amount_error != '') {

                $data['error'] = validation_errors() . $amount_error;
            } else {

                $data['error'] = "";
            }







            $data['countrylist'] = $this->home_model->get_country();

            $data['statelist'] = $this->home_model->get_countrywise_state($this->input->post('project_country'));

            $data['citylist'] = $this->home_model->get_statewise_city($this->input->post('project_city'));





            $data['project_id'] = $this->input->post('project_id');

            $data['project_title'] = $this->input->post('project_title');

            $data['url_project_title'] = $this->input->post('url_project_title');

            $data['amount'] = $this->input->post('amount');

            $data['category_id'] = $this->input->post('category_id');

            $data['status'] = $this->input->post('status');

            $data['total_days'] = $this->input->post('total_days');

            $data['payment_type'] = $this->input->post('payment_type');



            $data['project_draft'] = $this->input->post('project_draft');

            $data['active'] = $this->input->post('active');

            $data['active_cnt'] = $this->input->post('active_cnt');



            $data['project_city'] = $this->input->post('project_city');

            $data['project_state'] = $this->input->post('project_state');

            $data['project_country'] = $this->input->post('project_country');



            $data['p_google_code'] = $this->input->post('p_google_code');







            $data['projectimagevideoset'] = $this->input->post('projectimagevideoset');

            $data['image'] = $this->input->post('prev_project_image');

            //$data['file_up']=$this->input->post('file_up');

            $data['video_set'] = $this->input->post('video_set');

            $data['video'] = $this->input->post('video');

            //$data['videofile']=$this->input->post('videofile');		







            $data['project_summary'] = $this->input->post('project_summary');

            $data['description'] = $this->input->post('description');











            $data['categorylist'] = $this->home_model->get_category();







            $meta = meta_setting();

            $data['site_setting'] = site_setting();

            $this->home_model->select_text();





            $data['header_menu'] = dynamic_menu(0);

            $data['footer_menu'] = dynamic_menu_footer(0);

            $data['right_menu'] = dynamic_menu_right(0);





            $this->template->write('meta_title', 'Edit Campaign-' . $meta['title'], TRUE);

            $this->template->write('meta_description', $meta['meta_description'], TRUE);

            $this->template->write('meta_keyword', $meta['meta_keyword'], TRUE);

            if ($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1) {

                $this->template->set_master_template('iphone/template.php');

                $this->template->write_view('main_content', 'iphone/edit_project', $data, TRUE);

                $this->template->render();
            } elseif (($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1) {

                $this->template->set_master_template('mobile/template.php');

                $this->template->write_view('main_content', 'mobile/edit_project', $data, TRUE);

                $this->template->render();
            } else {

                $this->template->write_view('header', 'default/header_login', $data, TRUE);

                $this->template->write_view('center_content', 'default/edit_project', $data, TRUE);

                $this->template->write_view('footer', 'default/footer', $data, TRUE);

                $this->template->render();
            }
        } else {



            $this->project_model->project_update();

            redirect('home/dashboard/' . $this->session->userdata('project_id') . '/3');
        }
    }

    function update_project_mobile($id) {









        $this->form_validation->set_rules('project_title', PAGE_TITLE, 'required');

        $this->form_validation->set_rules('category_id', CATEGORY, 'required');



        //$this->form_validation->set_rules('total_days', TOTAL_DAYS, 'required');				

        $this->form_validation->set_rules('amount', FUND_GOAL, 'required|numeric');





        $this->form_validation->set_rules('project_city', CITY, 'required|alpha_space');

        $this->form_validation->set_rules('project_state', STATE, 'required|alpha_space');

        $this->form_validation->set_rules('project_country', COUNTRY, 'required|alpha_space');





        $this->form_validation->set_rules('project_summary', PROJECT_SUMMARY, 'required');

        $this->form_validation->set_rules('description', DESCRIPTION, 'required');







        $site_setting = site_setting();

        $amount_error = '';



        if ($_POST) {





            $total_days = $this->input->post('total_days');



            if ($total_days < $site_setting['project_min_days'] || $total_days > $site_setting['project_max_days']) {

                $amount_error = "<p>" . sprintf(DATE_BETWEEN_LIMIT_DAYS, $site_setting['project_min_days'], $site_setting['project_max_days']) . "</p>";
            }





            if ($this->input->post('amount') < $site_setting['minimum_goal']) {

                $amount_error .= "<p>" . sprintf(GOAL_AMOUNT_SHOULD_BE_GREATER_THAN, $site_setting['minimum_goal']) . "</p>";
            }



            if ($this->input->post('amount') >= $site_setting['maximum_goal']) {

                $amount_error .= "<p>" . sprintf(GOAL_AMOUNT_SHOULD_BE_LESS_THAN, $site_setting['maximum_goal']) . "</p>";
            }
        }





        if ($this->form_validation->run() == FALSE || $amount_error != '') {

            if (validation_errors() || $amount_error != '') {

                $data['error'] = validation_errors() . $amount_error;
            } else {

                $data['error'] = "";
            }

















            $data['project_id'] = $this->input->post('project_id');

            $data['project_title'] = $this->input->post('project_title');

            $data['url_project_title'] = $this->input->post('url_project_title');

            $data['amount'] = $this->input->post('amount');

            $data['category_id'] = $this->input->post('category_id');

            $data['status'] = $this->input->post('status');

            $data['total_days'] = $this->input->post('total_days');



            $data['project_draft'] = $this->input->post('project_draft');

            $data['active'] = $this->input->post('active');



            $data['project_city'] = $this->input->post('project_city');

            $data['project_state'] = $this->input->post('project_state');

            $data['project_country'] = $this->input->post('project_country');

            $data['p_google_code'] = $this->input->post('p_google_code');







            $data['projectimagevideoset'] = $this->input->post('projectimagevideoset');

            $data['image'] = $this->input->post('prev_project_image');

            //$data['file_up']=$this->input->post('file_up');

            $data['video_set'] = $this->input->post('video_set');

            $data['video'] = $this->input->post('video');

            //$data['videofile']=$this->input->post('videofile');		







            $data['project_summary'] = $this->input->post('project_summary');

            $data['description'] = $this->input->post('description');













            $data['categorylist'] = $this->home_model->get_category();







            $meta = meta_setting();

            $data['site_setting'] = site_setting();

            $this->home_model->select_text();





            $data['header_menu'] = dynamic_menu(0);

            $data['footer_menu'] = dynamic_menu_footer(0);

            $data['right_menu'] = dynamic_menu_right(0);





            $this->template->write('meta_title', 'Edit Campaign-' . $meta['title'], TRUE);

            $this->template->write('meta_description', $meta['meta_description'], TRUE);

            $this->template->write('meta_keyword', $meta['meta_keyword'], TRUE);

            if ($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1) {

                $this->template->set_master_template('iphone/template.php');

                $this->template->write_view('main_content', 'iphone/edit_project', $data, TRUE);

                $this->template->render();
            } elseif (($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1) {

                $this->template->set_master_template('mobile/template.php');

                $this->template->write_view('main_content', 'mobile/edit_project', $data, TRUE);

                $this->template->render();
            } else {

                $this->template->write_view('header', 'default/header_login', $data, TRUE);

                $this->template->write_view('center_content', 'default/edit_project', $data, TRUE);

                $this->template->write_view('footer', 'default/footer', $data, TRUE);

                $this->template->render();
            }
        } else {



            $this->project_model->project_update_mobile();

            redirect('home/dashboard/' . $this->session->userdata('project_id') . '/3');
        }
    }

    /////////////============Edit Project Details  =====================	
    /////////////============Project Donation  =====================





    /* function donations($id=0, $offset=0)

      {



      if($id==0 || $id=='')

      {

      redirect('user/my_project');

      }

      $this->load->library('pagination');

      $limit = '10';

      $config['uri_segment']='5';

      $config['base_url'] = site_url('project/donations/'.$id.'/');//base_url().'project/donations/'.$id.'/';

      $config['total_rows'] = $this->project_model->get_total_donations_count($id);

      $config['per_page'] = $limit;



      $this->pagination->initialize($config);



      $data['page_link'] = $this->pagination->create_links();

      $data['donations'] = $this->project_model->get_donations($id, $offset, $limit);

      $data['project_id'] = $id;

      $data['project'] = get_one_project($id);

      $data['wallet_setting']=wallet_setting();



      $data['offset'] = $offset;

      $data['site_setting'] = site_setting();

      $data['header_menu'] = dynamic_menu(0);

      $data['footer_menu'] = dynamic_menu_footer(0);

      $data['right_menu'] = dynamic_menu_right(0);



      $meta = meta_setting();

      $data['site_setting'] = site_setting();



      $this->home_model->select_text();

      $this->template->write('meta_title','Contributions-'. $meta['title'], TRUE);

      $this->template->write('meta_description', $meta['meta_description'], TRUE);

      $this->template->write('meta_keyword', $meta['meta_keyword'], TRUE);





      if($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1)

      {

      $this->template->set_master_template('iphone/template.php');

      $this->template->write_view('main_content', 'iphone/donations', $data, TRUE);

      $this->template->render();

      }

      elseif(($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1)

      {

      $this->template->set_master_template('mobile/template.php');

      $this->template->write_view('main_content', 'mobile/donations', $data, TRUE);

      $this->template->render();

      }

      else

      {

      $this->template->write_view('header', 'default/header_login',$data, TRUE);

      $this->template->write_view('center_content', 'default/donations', $data, TRUE);

      $this->template->write_view('footer', 'default/footer',$data, TRUE);

      $this->template->render();

      }



      }

     */



    function donations($id = 0, $offset = 0) {



        if ($id == 0 || $id == '') {

            redirect('user/my_project');
        }

        $this->load->library('pagination');

        $limit = '10';

        $config['uri_segment'] = '4';

        $config['base_url'] = site_url('project/donations/' . $id . '/'); //base_url().'project/donations/'.$id.'/';

        $config['total_rows'] = $this->project_model->get_total_donations_count($id);

        $config['per_page'] = $limit;



        $this->pagination->initialize($config);



        if ($config['total_rows'] > $limit) {

            $data['page_link'] = $this->pagination->create_links();
        } else {

            $data['page_link'] = '';
        }



        $data['donations'] = $this->project_model->get_donations($id, $offset, $limit);

        $data['project_id'] = $id;

        $data['$one_project'] = get_one_project($id);

        $data['wallet_setting'] = wallet_setting();



        $data['offset'] = $offset;

        $data['site_setting'] = site_setting();



        $data['total_comments'] = $this->project_model->get_total_comments_count($id);

        $data['all_perks'] = $this->project_model->get_all_perks($id);

        $data['total_updates'] = $this->project_model->get_total_updates_count($id);

        $data['project_backers'] = $this->project_model->get_total_donations_count($id);









        $data['site_setting'] = site_setting();



        $data['one_project'] = get_one_project($id);

        $data['project'] = get_all_project();







        $project_user = get_one_project($id);

        $user_detail = get_user_detail($project_user['user_id']);

        $data['user_detail'] = $user_detail;



        $data['user_name'] = $user_detail['user_name'];

        $data['last_name'] = $user_detail['last_name'];

        $data['user_image'] = $user_detail['image'];

        $data['user_city'] = $user_detail['city'];

        $data['user_state'] = $user_detail['state'];

        $data['user_country'] = $user_detail['country'];

        $data['user_website'] = $user_detail['user_website'];



        $meta = meta_setting();

        $data['site_setting'] = site_setting();



        $this->home_model->select_text();

        $this->template->write('meta_title', 'Contributions-' . $meta['title'], TRUE);

        $this->template->write('meta_description', $meta['meta_description'], TRUE);

        $this->template->write('meta_keyword', $meta['meta_keyword'], TRUE);





        if ($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1) {

            $this->template->set_master_template('iphone/template.php');

            $this->template->write_view('main_content', 'iphone/donations', $data, TRUE);

            $this->template->render();
        } elseif (($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1) {

            $this->template->set_master_template('mobile/template.php');

            $this->template->write_view('main_content', 'mobile/donations', $data, TRUE);

            $this->template->render();
        } else {

            if (!check_user_authentication()) {

                $this->template->write_view('header', 'default/common/header', $data, TRUE);
            } else {

                $this->template->write_view('header', 'default/common/header_login', $data, TRUE);
            }

            $this->template->write_view('main_content', 'default/project/project_backers', $data, TRUE);

            $this->template->write_view('sidebar', 'default/project/project_sidebar', $data, TRUE);

            $this->template->write_view('footer', 'default/common/footer', $data, TRUE);

            $this->template->render();
        }
    }

    function add_fund($id, $prkid = 0) {
	

        $site_setting = site_setting();

        $wallet_setting = wallet_setting();

        $credit_card_setting = credit_card_setting();

      

        $this->form_validation->set_rules('amount', DONATION_AMOUNT, 'required|integer');

        $this->form_validation->set_rules('gateway', PAYMENT_TYPE, 'required');



        if ($this->input->post('gateway') != 'wallet') {

            //$this->form_validation->set_rules('email', YOUR_EMAIL, 'required|valid_email');
        }

        //$this->form_validation->set_rules('docomment', 'Donor Comment', 'required');   ///alpha_numeric_space





        if ($credit_card_setting->credit_card_gateway_status == 1) {

            $this->form_validation->set_rules('card_first_name', CREDIT_CARD_FIRST_NAME, 'required|alpha');

            $this->form_validation->set_rules('card_last_name', CREDIT_CARD_LAST_NAME, 'required|alpha');

            $this->form_validation->set_rules('cardnumber', CREDIT_CARD_STORE_NUMBER, 'required|integer|numeric|min_length[12]|max_length[19]');

            $this->form_validation->set_rules('cardtype', CREDIT_CARD_TYPE, 'required|alpha');



            $this->form_validation->set_rules('card_expiration_month', CREDIT_CARD_EXPIRY_MONTH, 'required|integer');

            $this->form_validation->set_rules('card_expiration_year', CREDIT_CARD_EXPIRY_YEAR, 'required|integer');



            $this->form_validation->set_rules('cvv2Number', CREDIT_CARD_VERFICATION_NUMBER, 'required|integer|exact_length[3]');





            $this->form_validation->set_rules('card_address', CREDIT_CARD_ADDRESS, 'required');

            $this->form_validation->set_rules('card_city', CREDIT_CARD_CITY, 'required|alpha_space');

            $this->form_validation->set_rules('card_state', CREDIT_CARD_STATE, 'required|alpha_space');

            $this->form_validation->set_rules('card_zipcode', CREDIT_CARD_ZIPCODE, 'required|alpha_numeric|min_length[4]|max_length[9]');
        }







        if ($this->session->userdata('user_id') != '') {

            $chk_donate = $this->project_model->check_can_donate($id, $this->session->userdata('user_id'));
			

            if ($chk_donate) {

                redirect('home/index/cannot');
            }
        }



        $error = 'success';

        $chk_amt_error = '';

        $data['offset'] = 0;

        $data['limit'] = 8;



        if ($this->input->post('selected_perk_id')) {

            $get_perk = $this->db->query("select * from perk where perk_id='" . $this->input->post('selected_perk_id') . "'");

            $perk = $get_perk->row();

            $perk_amount = $perk->perk_amount;



            $donor_amount = $this->input->post('amount');



            if ($donor_amount < $perk_amount) {

                $error = 'need_more';
            } else {

                $error = 'success';
            }
        }





        $db_amount = $this->db->query("select * from site_setting");

        $admin_amount = $db_amount->row();



        $data['admin_amount'] = $admin_amount;

        $chk_amt = $this->input->post('amount');



        if ($_POST) {

            if ($chk_amt <= 0) {

                //$chk_amt_error = AMOUNT_SHOULD_BE_MORE_THAN_ZERO;
            }
        }

  

        $amount_error = 'success';



        if ($this->input->post('amount')) {



            if ($chk_amt < $admin_amount->donation_amount) {

                $amount_error = 'fail';
            }



            if ($chk_amt >= $admin_amount->maximum_donation_amount) {

                $amount_error = 'maxfail';
            }
        }







        if ($wallet_setting->wallet_enable == 1) {

            ////check total amount=====

            $total_wallet_amount = $this->home_model->my_wallet_amount();

            $own_amount_error = 'success';

            $chk_amt = $this->input->post('amount');







            if ($this->input->post('gateway') == 'wallet') {



                if ($this->input->post('amount')) {



                    if ($chk_amt > $total_wallet_amount) {

                        $own_amount_error = 'fail';
                    }
                }
            } else {

                $own_amount_error = 'success';
            }
        } else {

            $own_amount_error = 'success';
        }



        $site_setting = site_setting();

        require_once(APPPATH . 'libraries/recaptchalib.php');

        $publickey = $site_setting['captcha_public_key'];

        $privatekey = $site_setting['captcha_private_key'];

        $captcha_result = '';



        if ($this->form_validation->run() == FALSE || $error == 'need_more' || $amount_error == 'fail' || $amount_error == 'maxfail' || $own_amount_error == 'fail' || $chk_amt_error != '') {




            if ($error == 'need_more') {

                $perk_error = '<p>' . YOU_DID_NOT_ENTER_AMOUNT_LESS_THAN_PERK_AMOUNT . '</p>';
            } else {

                $perk_error = '';
            }





            if ($amount_error == 'fail') {

                $amount_error = "<p>" . YOU_CANNOT_DONATE_AMOUNT_LESS_THAN . " " . $admin_amount->donation_amount . ".</p>";
            } elseif ($amount_error == 'maxfail') {

                $amount_error = "<p>" . YOU_CANNOT_DONATE_GREATER_THAN . " " . $admin_amount->maximum_donation_amount . ".</p>";
            } else {

                $amount_error = '';
            }





            if ($own_amount_error == 'fail') {

                $own_error = "<p>" . YOU_CANNOT_DONATE_GREATER_THAN . " " . set_currency($total_wallet_amount) . ".</p>";
            } else {

                $own_error = '';
            }







            if (validation_errors() || $amount_error != '' || $perk_error != '' || $own_error != '') {

                $data['error'] = validation_errors() . $perk_error . $amount_error . $own_error;
            } else {

                $data['error'] = "";
            }



            $data['id'] = $id;





            //	$data['perk_id'] = $this->input->post('perk_id');



            if ($this->input->post('selected_perk_id') != '') {

                $data['project_perk_id'] = $this->input->post('selected_perk_id');
            } else {



                $data['project_perk_id'] = $prkid;
            }



            //$data_header['color'] = $data['project']['color'];



            if ($this->input->post('selected_perk_id')) {

                $data['amount'] = $this->input->post('amount');
            } else {

                if ($prkid != 0) {

                    $get_perk2 = $this->db->query("select * from perk where perk_id='" . $prkid . "'");

                    $perk2 = $get_perk2->row();

                    $data['amount'] = $perk2->perk_amount;
                } else {

                    $data['amount'] = $this->input->post('amount');
                }
            }





            $data['error'] .= $chk_amt_error;





            if ($credit_card_setting->credit_card_gateway_status == 1) {



                $data['card_first_name'] = $this->input->post('card_first_name');

                $data['card_last_name'] = $this->input->post('card_last_name');

                $data['cardnumber'] = $this->input->post('cardnumber');

                $data['cardtype'] = $this->input->post('cardtype');

                $data['card_expiration_month'] = $this->input->post('card_expiration_month');

                $data['card_expiration_year'] = $this->input->post('card_expiration_year');

                $data['cvv2Number'] = $this->input->post('cvv2Number');



                $data['card_address'] = $this->input->post('card_address');

                $data['card_city'] = $this->input->post('card_city');

                $data['card_state'] = $this->input->post('card_state');

                $data['card_zipcode'] = $this->input->post('card_zipcode');
            }



            $data['card_first_name'] = $this->input->post('card_first_name');

            $data['card_last_name'] = $this->input->post('card_last_name');

            $data['cardnumber'] = $this->input->post('cardnumber');

            $data['cardtype'] = $this->input->post('cardtype');

            $data['card_expiration_month'] = $this->input->post('card_expiration_month');

            $data['card_expiration_year'] = $this->input->post('card_expiration_year');

            $data['cvv2Number'] = $this->input->post('cvv2Number');



            $data['card_address'] = $this->input->post('card_address');

            $data['card_city'] = $this->input->post('card_city');

            $data['card_state'] = $this->input->post('card_state');

            $data['card_zipcode'] = $this->input->post('card_zipcode');


            $data['anonymous'] = $this->input->post('anonymous');

            $data['email'] = $this->input->post('email');

            $data['docomment'] = $this->input->post('docomment');



            $meta = meta_setting();

            $project_user = get_one_project($id);

            $user_detail = get_user_detail($project_user['user_id']);



            if ($project_user['user_id'] == $this->session->userdata('user_id')) {

                redirect('projects/' . $project_user['url_project_title'] . '/' . $id);
            }









            ///////===user enable for which gateway=========	



            if ($user_detail['amazon_token_id'] != '') {

                $data['user_amazon'] = 1;
            }

            if ($user_detail['amazon_token_id'] == '') {

                $data['user_amazon'] = 0;
            }







            if ($user_detail['paypal_email'] != '') {

                $data['user_paypal'] = 1;
            }

            if ($user_detail['paypal_email'] == '') {

                $data['user_paypal'] = 0;
            }





            ///////===user enable for which gateway=========






            $data['amazons'] = amazon_detail();

            $data['paypal'] = adaptive_paypal_detail();

            $data['wallet_setting'] = $wallet_setting;

            $data['total_wallet_amount'] = $this->home_model->my_wallet_amount();

           // $data['interswitch'] = interswitch_detail();





            $data['credit_card_setting'] = $credit_card_setting;



            $data['error1'] = $captcha_result;



            $data['site_setting'] = $site_setting;



            //$data['header_menu'] = dynamic_menu(0);

            $data['footer_menu'] = dynamic_menu_footer(0);

            //$data['right_menu'] = dynamic_menu_right(0);

            $data['project'] = get_one_project($id);

            $data['oneproject'] = get_fund_project($id);

            $data['id'] = $id;

            $data['project_gallery'] = $this->project_model->get_all_project_gallery($id);

            $data['all_perks'] =$this->project_model->get_all_perks($id);

            
			    $data['payment'] = $this->wallet_model->get_paymentact_result();
				
				
           


            $meta_title = 'Reward-' . $project_user['project_title'] . '-' . $user_detail['user_name'] . ' ' . $user_detail['last_name'] . '-' . $user_detail['country'];

            $meta_description = 'Reward-' . $project_user['project_title'] . ',' . $user_detail['user_name'] . ',' . $user_detail['last_name'] . ',' . $user_detail['country'];

            $meta_keyword = 'Reward-' . $project_user['project_title'] . ',' . $user_detail['user_name'] . '' . $user_detail['last_name'] . ',' . $user_detail['country'];

               
			   
			   
				



            $this->home_model->select_text();

            $this->template->write('meta_title', $meta_title, TRUE);

            $this->template->write('meta_description', $meta_description, TRUE);

            $this->template->write('meta_keyword', $meta_keyword, TRUE);

            if (!check_user_authentication()) {

                $this->template->write_view('header', 'default/common/header', $data, TRUE);
            } else {

                $this->template->write_view('header', 'default/common/header_login', $data, TRUE);
            }



            $this->template->write_view('main_content', 'default/project/add_fund', $data, TRUE);

            $this->template->write_view('sidebar', 'default/project/donation_sidebar', $data, TRUE);

            $this->template->write_view('footer', 'default/common/footer', $data, TRUE);

            $this->template->render();
        } else {
            
        }
    }

    /////////////============Project Donation  =====================
    /////////////============Project Comment  =====================



    /* function comments($id=0, $offset=0,$msg='')

      {

      if($id=='' || $id==0)

      {

      redirect('user/my_project');

      }



      $this->load->library('pagination');

      $limit = '10';

      $config['uri_segment']='5';

      $config['base_url'] = site_url('project/comments/'.$id.'/'); //base_url().'project/comments/'.$id.'/';

      $config['total_rows'] = $this->project_model->get_total_comments_count($id);

      $config['per_page'] = $limit;

      $this->pagination->initialize($config);

      $data['page_link'] = $this->pagination->create_links();

      $data['site_setting'] = site_setting();

      $data['project_id'] = $id;



      $data['comments'] = $this->project_model->get_some_comments($id, $offset, $limit);

      $meta = meta_setting();





      $data['header_menu'] = dynamic_menu(0);

      $data['footer_menu'] = dynamic_menu_footer(0);

      $data['right_menu'] = dynamic_menu_right(0);





      $data['offset']=$offset;

      $data['msg']=$msg;

      $data['error']='';



      $this->home_model->select_text();

      $this->template->write('meta_title', 'Comments-'.$meta['title'], TRUE);

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

      $this->template->write_view('header', 'default/header_login',$data, TRUE);

      $this->template->write_view('center_content', 'default/comments', $data, TRUE);

      $this->template->write_view('footer', 'default/footer',$data, TRUE);

      $this->template->render();

      }







      } */



    function comments($id = 0, $offset = 0, $msg = '') {

        if ($id == '' || $id == 0) {

            redirect('user/my_project');
        }



        $this->load->library('pagination');

        $limit = '10';

        $config['uri_segment'] = '4';

        $config['base_url'] = site_url('project/comments/' . $id . '/'); //base_url().'project/comments/'.$id.'/';

        $config['total_rows'] = $this->project_model->get_total_comments_count($id);

        $config['per_page'] = $limit;

        $this->pagination->initialize($config);

        $data['page_link'] = $this->pagination->create_links();

        $data['site_setting'] = site_setting();

        $data['project_id'] = $id;



        $data['comments'] = $this->project_model->get_comments($id, $offset, $limit);



        $meta = meta_setting();

        $data['total_comments'] = $this->project_model->get_total_comments_count($id);

        $data['all_perks'] = $this->project_model->get_all_perks($id);

        $data['total_updates'] = $this->project_model->get_total_updates_count($id);

        $data['project_backers'] = $this->project_model->get_total_donations_count($id);



        $data['site_setting'] = site_setting();











        $data['one_project'] = get_one_project($id);

        $data['project'] = get_all_project();



        $project_user = get_one_project($id);

        $user_detail = get_user_detail($project_user['user_id']);

        $data['user_detail'] = $user_detail;



        $data['user_name'] = $user_detail['user_name'];

        $data['last_name'] = $user_detail['last_name'];

        $data['user_image'] = $user_detail['image'];

        $data['user_city'] = $user_detail['city'];

        $data['user_state'] = $user_detail['state'];

        $data['user_country'] = $user_detail['country'];

        $data['user_website'] = $user_detail['user_website'];









        $data['offset'] = $offset;

        $data['msg'] = $msg;

        $data['error'] = '';



        $this->home_model->select_text();

        $this->template->write('meta_title', 'Comments-' . $meta['title'], TRUE);

        $this->template->write('meta_description', $meta['meta_description'], TRUE);

        $this->template->write('meta_keyword', $meta['meta_keyword'], TRUE);





        if ($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1) {

            $this->template->set_master_template('iphone/template.php');

            $this->template->write_view('main_content', 'iphone/comments', $data, TRUE);

            $this->template->render();
        } elseif (($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1) {

            $this->template->set_master_template('mobile/template.php');

            $this->template->write_view('main_content', 'mobile/comments', $data, TRUE);

            $this->template->render();
        } else {

            if (!check_user_authentication()) {

                $this->template->write_view('header', 'default/common/header', $data, TRUE);
            } else {

                $this->template->write_view('header', 'default/common/header_login', $data, TRUE);
            }

            $this->template->write_view('main_content', 'default/project/project_comments', $data, TRUE);

            $this->template->write_view('sidebar', 'default/project/project_sidebar', $data, TRUE);

            $this->template->write_view('footer', 'default/common/footer', $data, TRUE);

            $this->template->render();
        }
    }

    function edit_comment($id = 0) {

        $query = $this->db->get_where('comment', array('comment_id' => $id));

        $prj = $query->row_array();

        $this->db->where('comment_id', $id);

        $this->db->update('comment', array('comments' => $this->input->post('up_comments')));

        redirect('project/comments/' . $prj['project_id'] . '/' . $this->input->post('offset') . '/update');
    }

    function delete_comment($id = 0, $offset = 0) {

        $query = $this->db->get_where('comment', array('comment_id' => $id));

        $prj = $query->row_array();

        $this->db->delete('comment', array('comment_id' => $id));

        redirect('project/comments/' . $prj['project_id'] . '/' . $offset . '/delete');
    }

    function approve_comment($id = 0, $offset = 0) {

        $query = $this->db->get_where('comment', array('comment_id' => $id));

        $prj = $query->row_array();

        $this->db->where('comment_id', $id);

        $this->db->update('comment', array('status' => '1'));

        redirect('project/comments/' . $prj['project_id'] . '/' . $offset . '/approve');
    }

    function declined_comment($id = 0, $offset = 0) {

        $query = $this->db->get_where('comment', array('comment_id' => $id));

        $prj = $query->row_array();

        $this->db->where('comment_id', $id);

        $this->db->update('comment', array('status' => '0'));

        redirect('project/comments/' . $prj['project_id'] . '/' . $offset . '/decline');
    }

    function reply_comment() {





        $this->form_validation->set_rules('comment_id', COMMENTS, 'required');





        if ($this->form_validation->run() == FALSE) {



            if (validation_errors()) {

                $data['error'] = validation_errors();
            }
        } else {





            $this->project_model->reply_insert();

            $data['error'] = REPLY_ADDED_SUCCESSFULLY;





            $comment_detail = $this->project_model->get_single_commnet($this->input->post('comment_id'));

            $comment_user = get_user_detail($comment_detail['user_id']);



            $project_user = get_one_project($this->session->userdata('project_id'));



            $login_user = get_user_detail($this->session->userdata('user_id'));



            redirect('project/comments/' . $this->session->userdata('project_id') . '/' . $this->input->post('offset') . '/reply');
        }
    }

    function delete_comments($id = 0) {

        $query = $this->db->get_where('comment', array('comment_id' => $id));

        $prj = $query->row_array();

        $this->db->delete('comment', array('comment_id' => $id));

        $project_user = $this->project_model->get_one_project($prj['project_id']);



        redirect('projects/' . $project_user['url_project_title'] . '/' . $prj['project_id']);
    }

    /////////////============Project Comment  =====================
    /////////////============Project Updates  =====================



    /* function updates($id, $offset=0)

      {



      if($id=='' || $id==0)

      {

      redirect('user/my_project');

      }



      $this->load->library('pagination');

      $limit = '10';



      $config['uri_segment']='5';

      $config['base_url'] = site_url('project/updates/'.$id.'/');//base_url().'project/updates/'.$id.'/';

      $config['total_rows'] = $this->project_model->get_total_updates_count($id);

      $config['per_page'] = $limit;

      $this->pagination->initialize($config);

      $data['page_link'] = $this->pagination->create_links();



      $data['project_id'] = $id;





      $data['updates'] = $this->project_model->get_some_updates($id, $offset, $limit);

      $data['site_setting'] = site_setting();



      $data['header_menu'] = dynamic_menu(0);

      $data['footer_menu'] = dynamic_menu_footer(0);

      $data['right_menu'] = dynamic_menu_right(0);



      $meta = meta_setting();

      $this->home_model->select_text();

      $this->template->write('meta_title','Updates-'. $meta['title'], TRUE);

      $this->template->write('meta_description', $meta['meta_description'], TRUE);

      $this->template->write('meta_keyword', $meta['meta_keyword'], TRUE);





      if($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1)

      {

      $this->template->set_master_template('iphone/template.php');

      $this->template->write_view('main_content', 'iphone/updates', $data, TRUE);

      $this->template->render();

      }

      elseif(($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1)

      {

      $this->template->set_master_template('mobile/template.php');

      $this->template->write_view('main_content', 'mobile/updates', $data, TRUE);

      $this->template->render();

      }

      else

      {

      $this->template->write_view('header', 'default/header_login',$data, TRUE);

      $this->template->write_view('center_content', 'default/updates', $data, TRUE);

      $this->template->write_view('footer', 'default/footer',$data, TRUE);

      $this->template->render();

      }



      } */

    function updates($id, $limit = '2', $offset = 0) {



        if ($id == '' || $id == 0) {

            redirect('user/my_project');
        }



        $this->load->library('pagination');





        $config['uri_segment'] = '4';

        $config['base_url'] = site_url('project/updates/' . $id . '/' . $limit); //base_url().'project/updates/'.$id.'/';

        $config['total_rows'] = $this->project_model->get_total_updates_count($id);

        $config['per_page'] = $limit;

        $this->pagination->initialize($config);

        $data['page_link'] = $this->pagination->create_links();

        /* if($config['total_rows']>$limit){	

          $data['page_link'] = $this->pagination->create_links();

          }else{

          $data['page_link']="";

          }

         */

        $data['project_id'] = $id;





        $data['updates'] = $this->project_model->get_some_updates($id, $offset, $limit);



        $data['site_setting'] = site_setting();



        $data['total_comments'] = $this->project_model->get_total_comments_count($id);

        $data['all_perks'] = $this->project_model->get_all_perks($id);

        $data['total_updates'] = $this->project_model->get_total_updates_count($id);

        $data['project_backers'] = $this->project_model->get_total_donations_count($id);





        $data['one_project'] = get_one_project($id);

        $data['project'] = get_all_project();



        $project_user = get_one_project($id);

        $user_detail = get_user_detail($project_user['user_id']);

        $data['user_detail'] = $user_detail;



        $data['user_name'] = $user_detail['user_name'];

        $data['last_name'] = $user_detail['last_name'];

        $data['user_image'] = $user_detail['image'];

        $data['user_city'] = $user_detail['city'];

        $data['user_state'] = $user_detail['state'];

        $data['user_country'] = $user_detail['country'];

        $data['user_website'] = $user_detail['user_website'];





        $data['site_setting'] = site_setting();







        $meta = meta_setting();

        $this->home_model->select_text();

        $this->template->write('meta_title', 'Updates-' . $meta['title'], TRUE);

        $this->template->write('meta_description', $meta['meta_description'], TRUE);

        $this->template->write('meta_keyword', $meta['meta_keyword'], TRUE);





        if ($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1) {

            $this->template->set_master_template('iphone/template.php');

            $this->template->write_view('main_content', 'iphone/updates', $data, TRUE);

            $this->template->render();
        } elseif (($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1) {

            $this->template->set_master_template('mobile/template.php');

            $this->template->write_view('main_content', 'mobile/updates', $data, TRUE);

            $this->template->render();
        } else {

            if (!check_user_authentication()) {

                $this->template->write_view('header', 'default/common/header', $data, TRUE);
            } else {

                $this->template->write_view('header', 'default/common/header_login', $data, TRUE);
            }

            $this->template->write_view('main_content', 'default/project/project_updates', $data, TRUE);

            $this->template->write_view('sidebar', 'default/project/project_sidebar', $data, TRUE);

            $this->template->write_view('footer', 'default/common/footer', $data, TRUE);

            $this->template->render();
        }
    }

    function ajax_update_comment($upid = null, $offset) {



        $limit = 5;

        $query = $this->db->query('select * from update_comment where update_id=' . $upid . ' order by update_comment_date desc Limit ' . $offset . ',' . $limit);

        //$query=$this->db->get_where('update_comment',array('update_id'=>$upid));





        $update_cmt = $query->result_array();
        $one_project = get_one_project($upc['project_id']);


        if ($update_cmt) {

            $str = "";

            foreach ($update_cmt as $upc) {



                $ud = get_user_detail($upc['update_comment_user_id']);



                $str.='<li class="comment ';

                if ($upc['update_comment_user_id'] == $one_project['user_id']) {
                    $str.='creator';
                }

                $str.='">';



                if ($ud['image'] != '' && is_file('upload/thumb/' . $ud['image'])) {



                    $str.='<a href="' . site_url('member/' . $ud['user_id']) . '"><img src="' . base_url() . 'upload/thumb/' . $ud['image'] . '"class="cuserimg" /></a>';
                } elseif ($ud['tw_screen_name'] != '' && $ud['tw_id'] > 0) {



                    $str.='<img src="http://api.twitter.com/1/users/profile_image?screen_name=' . $ud['tw_screen_name'] . '&size=bigger" class="cuserimg"  />';
                } elseif ($ud['fb_uid'] != '' && $ud['fb_uid'] > 0) {

                    $str.='<a href="' . site_url('member/' . $ud['user_id']) . '"><img src="http://graph.facebook.com/' . $ud['fb_uid'] . '/picture?type=large" class="cuserimg" /></a>';
                } else {



                    $str.='<a href="' . site_url('member/' . $ud['user_id']) . '"><img src="' . base_url() . 'upload/thumb/no_man.gif" class="cuserimg" /></a>';
                }

                $str.='<div class="update_cont">';

                $str.='<h3>';

                if ($upc['update_comment_user_id'] == $one_project['user_id']) {

                    $str.='<span class="creator">Creator</span> ';
                }

                $str.=anchor('member/' . $ud['user_id'], $ud['user_name'] . " " . $ud['last_name'], 'class="author"');

                $str.='<span class="date"> about' . getDuration($upc['update_comment_date']) . '</span> </h3>';

                $str.='<p class="up">' . $upc['update_comment_text'] . '</p>';

                $str.='<!--<span style="display:none;" class="loading icon-loading-small"></span>--> </div>';



                $str.='</li>';



                $offset++;
            }
        }









        $response = array(
            'upid' => $upid,
            'offset' => $offset,
            'str' => $str,
            'status' => 'success'
        );







        echo json_encode($response);

        exit; // only print out the json 
    }

    function delete_update($id = 0) {

        $query = $this->db->get_where('updates', array('update_id' => $id));

        $prj = $query->row_array();

        $this->db->delete('updates', array('update_id' => $id));

        redirect('project/updates/' . $prj['project_id']);
    }

    function add_update() {



        $this->project_model->updates_insert();



        $backers = $this->project_model->get_all_backers($this->input->post('project_id'));



        if ($backers) {

            foreach ($backers as $bk) {







                ////////=============email=====================



                $this->load->library('email');







                $email_setting = $this->db->query("select * from `email_setting` where email_setting_id='1'");

                $email_set = $email_setting->row();



                ///////====smtp====



                if ($email_set->mailer == 'smtp') {



                    $config['protocol'] = 'smtp';

                    $config['smtp_host'] = trim($email_set->smtp_host);

                    $config['smtp_port'] = trim($email_set->smtp_port);

                    $config['smtp_timeout'] = '30';

                    $config['smtp_user'] = trim($email_set->smtp_email);

                    $config['smtp_pass'] = trim($email_set->smtp_password);
                }



                /////=====sendmail======
                elseif ($email_set->mailer == 'sendmail') {



                    $config['protocol'] = 'sendmail';

                    $config['mailpath'] = trim($email_set->sendmail_path);
                }



                /////=====php mail default======
                else {
                    
                }





                $config['wordwrap'] = TRUE;

                $config['mailtype'] = 'html';

                $config['crlf'] = '\n\n';

                $config['newline'] = '\n\n';



                $this->email->initialize($config);







                /////////////============updates sent to backers===========	







                $email_template = $this->db->query("select * from `email_template` where task='project new updates'");

                $email_temp = $email_template->row();





                $email_address_from = $email_temp->from_address;

                $email_address_reply = $email_temp->reply_address;



                $email_subject = $email_temp->subject;

                $email_subject = str_replace('{project_name}', $this->session->userdata('project_title'), $email_subject);

                $email_message = $email_temp->message;







                $email_to = $bk->email;

                //	$email_to='sanjay.rockersinfo@gmail.com';









                $email_message = str_replace('{break}', '<br/>', $email_message);

                $email_message = str_replace('{user_name}', $bk->user_name, $email_message);

                $email_message = str_replace('{project_update}', $this->input->post('updates'), $email_message);







                $str = $email_message;









                $this->email->from($email_address_from);

                $this->email->reply_to($email_address_reply);

                $this->email->to($email_to);

                $this->email->subject($email_subject);

                $this->email->message($str);

                $this->email->send();











                /////////////============update sent to backers===========	
            }
        }



        $prj = $this->project_model->get_project_user($this->input->post('project_id'));

        $login_user = get_user_detail($this->session->userdata('user_id'));

        $project = $prj;

        /* $facebook_setting = facebook_setting();

          ////// share on facebook





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



          if($login_user['fb_uid']!='' and $login_user['fb_access_token']!='' and $login_user['facebook_wall_post']=='1'){



          $fbAccessToken = $login_user['fb_access_token'];

          $publishStream = $this->fb_connect->publish($login_user['fb_uid'],array(

          'access_token' => $fbAccessToken,

          'link'    =>$project_share_link,

          'picture' => $image,

          'name'    => "New Update on ".$prj['project_title'],

          'description'=> $this->input->post('updates')

          )

          );

          }





          if($facebook_setting->facebook_user_id!='' and $facebook_setting->facebook_wall_post=='1' and $facebook_setting->facebook_access_token!=''){



          $fbAccessToken = $facebook_setting->facebook_access_token;

          $publishStream = $this->fb_connect->publish($facebook_setting->facebook_user_id,array(

          'access_token' => $fbAccessToken,

          'link'    =>$project_share_link,

          'picture' => $image,

          'name'    => "New Update on ".$prj['project_title'],

          'description'=> $this->input->post('updates')

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

          if($prj['tw_oauth_token']!='0' and $prj['tw_oauth_token_secret']!='0' and $prj['autopost_site']=='1'){

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

          $message =date("Y-m-d H:i:s")."New Update on - ".$prj['project_title']." Take a look from here - ".$project_share_link;



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

          $message =date("Y-m-d H:i:s")."New Update on - ".$prj['project_title']." Take a look from here - ".$project_share_link;



          // Send tweet

          $tweet->post('statuses/update', array('status' => "$message"));

          }

          }catch(Exception $e)

          {

          return ;

          }





          /////////// twitter end */



        redirect('project/updates/' . $this->input->post('project_id'));
    }

    function edit_updates($id) {



        $query = $this->db->get_where('updates', array('update_id' => $id));

        $prj = $query->row_array();





        $up_txt = $this->input->post('upupdates' . $id);





        if ($up_txt != '') {

            $up_txt = str_replace(array(',', '`'), '', $this->input->post('upupdates' . $id));



            $up_txt = str_replace('"', 'KSYDOU', $up_txt);

            $up_txt = str_replace("'", 'KSYSING', $up_txt);





            $this->db->query("update `updates` set `updates`='" . $up_txt . "'  where update_id='" . $id . "'");
        }



        redirect('project/updates/' . $prj['project_id'] . '/');
    }

    /////////////============Project Updates  =====================
    //////////////============Project PERK  =====================





    function add_perk($project_id = '') {

        $this->load->library('form_validation');

        $this->form_validation->set_rules('perk_title', PERK_TITLE, 'required');

        $this->form_validation->set_rules('perk_description', PERK_DESCRIPTION, 'required');

        $this->form_validation->set_rules('perk_amount', PERK_AMMOUNT, 'required|numeric');

        $this->form_validation->set_rules('perk_total', PERK_TOTAL, 'required|numeric');



        $site_setting = site_setting();

        $amt_err = '';



        if ($_POST) {

            $amt = $this->input->post('perk_amount');

            if ($amt < $site_setting['minimum_reward_amount']) {

                $amt_err = '<p>' . PERK_AMOUNT_SHOULD_BE_MINIMUM . set_currency($site_setting['minimum_reward_amount']) . '</p>';
            }

            if ($amt > $site_setting['maximum_reward_amount']) {

                $amt_err = '<p>' . PERK_AMOUNT_SHOULD_BE_MAXIMUM . set_currency($site_setting['maximum_reward_amount']) . '</p>';
            }
        }





        if ($this->form_validation->run() == FALSE || $amt_err != '') {

            if (validation_errors() || $amt_err != '') {

                $data["error"] = validation_errors() . $amt_err;
            } else {

                $data["error"] = "";
            }

            $data['project_id'] = $project_id;



            $data['perk_id'] = $this->input->post('perk_id');



            $data['perk_title'] = $this->input->post('perk_title');

            $data['perk_description'] = $this->input->post('perk_description');

            $data['perk_amount'] = $this->input->post('perk_amount');

            $data['perk_total'] = $this->input->post('perk_total');



            $meta = meta_setting();

            $data['site_setting'] = site_setting();





            $this->home_model->select_text();



            $data['header_menu'] = dynamic_menu(0);

            $data['footer_menu'] = dynamic_menu_footer(0);

            $data['right_menu'] = dynamic_menu_right(0);



            $data['page'] = "form";



            $this->template->write('meta_title', 'Reward-' . $meta['title'], TRUE);

            $this->template->write('meta_description', $meta['meta_description'], TRUE);

            $this->template->write('meta_keyword', $meta['meta_keyword'], TRUE);





            if ($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1) {

                $this->template->set_master_template('iphone/template.php');

                $this->template->write_view('main_content', 'iphone/perk', $data, TRUE);

                $this->template->render();
            } elseif (($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1) {

                $this->template->set_master_template('mobile/template.php');

                $this->template->write_view('main_content', 'mobile/perk', $data, TRUE);

                $this->template->render();
            } else {

                $this->template->write_view('header', 'default/header_login', $data, TRUE);

                $this->template->write_view('center_content', 'default/perk', $data, TRUE);

                $this->template->write_view('footer', 'default/footer', $data, TRUE);

                $this->template->render();
            }
        } else {





            if ($this->input->post('perk_id') != '') {

                $this->project_model->update_perk($project_id);

                redirect('project/perks/' . $project_id);
            } else {



                $this->project_model->insert_perk($project_id);

                redirect('project/perks/' . $project_id);
            }
        }
    }

    function edit_perk($perk_id = 0) {

        $data['perk_id'] = $perk_id;



        $detail = $this->project_model->get_one_perk($perk_id);



        $project_id = $detail['project_id'];





        $data['all_perks'] = $this->project_model->get_all_perks($project_id);



        $meta = meta_setting();

        $data['site_setting'] = site_setting();



        $this->home_model->select_text();



        $data['header_menu'] = dynamic_menu(0);

        $data['footer_menu'] = dynamic_menu_footer(0);

        $data['right_menu'] = dynamic_menu_right(0);



        $data['page'] = "form";





        $data["error"] = "";

        $data['project_id'] = $detail['project_id'];

        $data['perk_title'] = $detail['perk_title'];

        $data['perk_description'] = $detail['perk_description'];

        $data['perk_amount'] = $detail['perk_amount'];

        $data['perk_total'] = $detail['perk_total'];





        $this->template->write('meta_title', 'Reward-' . $meta['title'], TRUE);

        $this->template->write('meta_description', $meta['meta_description'], TRUE);

        $this->template->write('meta_keyword', $meta['meta_keyword'], TRUE);



        if ($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1) {

            $this->template->set_master_template('iphone/template.php');

            $this->template->write_view('main_content', 'iphone/perk', $data, TRUE);

            $this->template->render();
        } elseif (($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1) {

            $this->template->set_master_template('mobile/template.php');

            $this->template->write_view('main_content', 'mobile/perk', $data, TRUE);

            $this->template->render();
        } else {

            $this->template->write_view('header', 'default/header_login', $data, TRUE);

            $this->template->write_view('center_content', 'default/perk', $data, TRUE);

            $this->template->write_view('footer', 'default/footer', $data, TRUE);

            $this->template->render();
        }
    }

    function perks($project_id = 0) {

        $data['project_id'] = $project_id;



        $data['all_perks'] = $this->project_model->get_all_perks($project_id);



        $meta = meta_setting();

        $data['site_setting'] = site_setting();



        $this->home_model->select_text();



        $data['header_menu'] = dynamic_menu(0);

        $data['footer_menu'] = dynamic_menu_footer(0);

        $data['right_menu'] = dynamic_menu_right(0);



        $data['page'] = "list";



        $data["error"] = "";

        $data['project_id'] = $project_id;

        $data['perk_title'] = '';

        $data['perk_description'] = '';

        $data['perk_amount'] = '';

        $data['perk_total'] = '';

        $data['perk_id'] = '';



        $this->template->write('meta_title', 'Reward-' . $meta['title'], TRUE);

        $this->template->write('meta_description', $meta['meta_description'], TRUE);

        $this->template->write('meta_keyword', $meta['meta_keyword'], TRUE);





        if ($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1) {

            $this->template->set_master_template('iphone/template.php');

            $this->template->write_view('main_content', 'iphone/perk', $data, TRUE);

            $this->template->render();
        } elseif (($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1) {

            $this->template->set_master_template('mobile/template.php');

            $this->template->write_view('main_content', 'mobile/perk', $data, TRUE);

            $this->template->render();
        } else {

            $this->template->write_view('header', 'default/header_login', $data, TRUE);

            $this->template->write_view('center_content', 'default/perk', $data, TRUE);

            $this->template->write_view('footer', 'default/footer', $data, TRUE);

            $this->template->render();
        }
    }

    function delete_perk($id = 0) {

        $query = $this->db->get_where('perk', array('perk_id' => $id));

        $prj = $query->row_array();

        $this->db->delete('perk', array('perk_id' => $id));

        redirect('project/perks/' . $prj['project_id']);
    }

    function get_perk_amount($pid) {



        $get_perk = $this->db->query("select * from perk where perk_id='" . $pid . "'");

        $perk = $get_perk->row();

        echo $perk_amount = $perk->perk_amount;

        exit;
    }

    /////////////============Project PERK  =====================
    /////////////============Project Gallery  =====================



    function project_gallery($id, $offset = 0) {



        $this->load->library('pagination');



        $limit = '9';

        $config['base_url'] = site_url('project/project_gallery/' . $id . '/'); //base_url().'project/project_gallery/'.$id.'/';

        $config['total_rows'] = $this->project_model->get_total_project_gallery_count($id);

        $config['per_page'] = $limit;



        $this->pagination->initialize($config);



        $data['page_link'] = $this->pagination->create_links();

        $data['project_gallery'] = $this->project_model->get_project_gallery($id, $offset, $limit);



        $data['project_id'] = $id;





        $data['offset'] = $offset;

        $data['site_setting'] = site_setting();





        $data['header_menu'] = dynamic_menu(0);

        $data['footer_menu'] = dynamic_menu_footer(0);

        $data['right_menu'] = dynamic_menu_right(0);



        $meta = meta_setting();



        $this->home_model->select_text();

        $this->template->write('meta_title', 'Gallery-' . $meta['title'], TRUE);

        $this->template->write('meta_description', $meta['meta_description'], TRUE);

        $this->template->write('meta_keyword', $meta['meta_keyword'], TRUE);

        $this->template->write_view('header', 'default/header_login', $data, TRUE);

        $this->template->write_view('center_content', 'default/project_gallery', $data, TRUE);

        $this->template->write_view('footer', 'default/footer', $data, TRUE);

        $this->template->render();
    }

    function delete_project_gallery($id = 0) {



        $base_path = base_path;



        $query = $this->db->get_where('project_gallery', array('project_gallery_id' => $id));

        $prj = $query->row_array();



        $link1 = $base_path . 'upload/thumb/' . $prj['project_image'];

        $link2 = $base_path . 'upload/orig/' . $prj['project_image'];



        unlink($link1);

        unlink($link2);





        $this->db->delete('project_gallery', array('project_gallery_id' => $id));

        redirect('project/project_gallery/' . $prj['project_id']);
    }

    function add_project_gallery($id = '') {



        $data['project_id'] = $id;





        $data['header_menu'] = dynamic_menu(0);

        $data['footer_menu'] = dynamic_menu_footer(0);

        $data['right_menu'] = dynamic_menu_right(0);



        $meta = meta_setting();

        $data['site_setting'] = site_setting();



        $this->home_model->select_text();

        $this->template->write('meta_title', 'Gallery-' . $meta['title'], TRUE);

        $this->template->write('meta_description', $meta['meta_description'], TRUE);

        $this->template->write('meta_keyword', $meta['meta_keyword'], TRUE);

        $this->template->write_view('header', 'default/header_login', $data, TRUE);

        $this->template->write_view('center_content', 'default/add_project_gallery', $data, TRUE);

        $this->template->write_view('footer', 'default/footer', $data, TRUE);

        $this->template->render();
    }

    function add_gallery($id) {



        $CI = & get_instance();

        $base_path = $CI->config->slash_item('base_path');



        $project_id = $this->session->userdata('project_id');

        $image_settings = get_image_setting_data();



        if ($_FILES['file_up']['name'] != '') {



            $cnt = 1;



            $this->load->library('upload');

            $rand = rand(0, 100000);



            for ($i = 0; $i < count($_FILES['file_up']['name']); $i++) {



                if ($_FILES['file_up']['name'][$i] != '') {



                    $_FILES['userfile']['name'] = $_FILES['file_up']['name'][$i];

                    $_FILES['userfile']['type'] = $_FILES['file_up']['type'][$i];

                    $_FILES['userfile']['tmp_name'] = $_FILES['file_up']['tmp_name'][$i];

                    $_FILES['userfile']['error'] = $_FILES['file_up']['error'][$i];

                    $_FILES['userfile']['size'] = $_FILES['file_up']['size'][$i];

                    $new_img = image_upload($_FILES);

                    $data_gallery = array(
                        'project_id' => $project_id,
                        'project_image' => $new_img,
                        'date_added' => date("Y-m-d H:i:s")
                    );

                    $this->db->insert('project_gallery', $data_gallery);
                }
            }
        }

        redirect('project/project_gallery/' . $this->session->userdata('project_id'));
    }

    /////////////============Project Gallery  =====================
    /////////////============Project Share  on communiities=====================





    function share($id = 0, $msg = '') {



        $data['id'] = $id;





        $meta = meta_setting();

        $data['site_setting'] = site_setting();



        $site = site_setting();

        $this->home_model->select_text();



        $data['header_menu'] = dynamic_menu(0);

        $data['footer_menu'] = dynamic_menu_footer(0);

        $data['right_menu'] = dynamic_menu_right(0);



        $data['site_name'] = $site['site_name'];

        $data['msg'] = $msg;



        $this->template->write('meta_title', 'Invite Your Friend-' . $meta['title'], TRUE);

        $this->template->write('meta_description', $meta['meta_description'], TRUE);

        $this->template->write('meta_keyword', $meta['meta_keyword'], TRUE);

        $this->template->write_view('header', 'default/header_login', $data, TRUE);

        $this->template->write_view('center_content', 'default/invite_friends', $data, TRUE);

        $this->template->write_view('footer', 'default/footer', $data, TRUE);

        $this->template->render();
    }

    function sendinvite($id = 0, $msg = '') {

        $strtemp = '';



        //$strtemp1=$this->aarraytostr($_POST);	
        //echo var_dump($_POST);
        //echo "<br>";
        //"facebook_invites"

        foreach ($_POST["facebook_invites"] as $key => $value) {

            //$strtemp.= $key."=".$value.",";

            if (is_array($value)) {

                foreach ($value as $key => $v) {



                    if (is_array($v)) {

                        foreach ($v as $key => $vv) {



                            if (is_array($vv)) {

                                //$this->aarraytostr($value);
                            } else {

                                $strtemp.= $key . "=" . $vv . ",";
                            }
                        }
                    } else {

                        $strtemp.= $key . "=" . $v . ",";
                    }
                }
            } else {

                $strtemp.= $key . "=" . $value . ",";
            }
        }

        $arr = explode(",", $strtemp);

        foreach ($arr as $id) {

            $arr1 = explode("=", $id);

            if (isset($arr1[1])) {

                if (is_numeric($arr1[1])) {

                    //echo "<br>".$arr1[1];
                    // echo "<br>".$arr1[1];

                    $project = $this->project_model->get_one_project($this->session->userdata('project_id'));

                    $prj = $this->project_model->get_project_user($this->session->userdata('project_id'));

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



                    if ($msg == '') {

                        $msg = $prj['project_title'];
                    }



                    $publishStream = $this->fb_connect->publish($arr1[1], array(
                        'message' => $msg,
                        'link' => $project_share_link,
                        'picture' => $image,
                        'name' => $prj['project_title'],
                        'description' => $prj['project_summary']
                            )
                    );





                    echo "Success";
                }
            }
        }

        /* echo $strtemp;

          $publishStream = $this->fb_connect->publish(array(

          'message' => "I love rockersinfo.com for facebook app development.... :)",

          'link'    => 'http://rockersinfo.com',

          'picture' => 'http://rockersinfo.com/images/logo.jpg',

          'name'    => 'PHP Web Development Company | Web Development Atlanta | Software Development Atlanta | PHP Web Programming Atlanta',

          'description'=> 'Rockers Technologies, Atlanta based offshore agency provides an affordable solutions for php web development, php customization, php customization, cakephp development, drupal cms development, wordpress cms development, zend web development custom software development. Contact Us: nishesh.jambudi@gmail.com'

          )

          );

          } */
    }

    /////////////============Project Facebook Share =====================
    /////////////============Project Widgets =====================









    function widgets_code($w, $c, $n) {

        $data['w'] = $w;

        $data['c'] = $c;

        $data['n'] = $n;

        $data['offset'] = 0;

        $data['limit'] = 8;



        $this->load->view('default/widgets_code', $data);
    }

    function widgets_page($w, $c, $n) {

        $data['color'] = $c;

        $data['width'] = $w;

        $data['project'] = get_one_project($n);

        $data['project_gallery'] = $this->project_model->get_all_project_gallery($n);

        $data['site_setting'] = site_setting();

        $data['offset'] = 0;

        $data['limit'] = 8;



        $this->template->add_css($data['color'] . '/fund-' . $data['color'] . '.css');

        $this->template->write_view('center_content', 'default/widgets_page', $data, TRUE);

        $this->template->render();
    }

    function widgets($id = 0) {

        $data['pid'] = $id;





        $meta = meta_setting();

        $data['site_setting'] = site_setting();

        $data['offset'] = 0;

        $data['limit'] = 8;





        $data['header_menu'] = dynamic_menu(0);

        $data['footer_menu'] = dynamic_menu_footer(0);

        $data['right_menu'] = dynamic_menu_right(0);





        $this->home_model->select_text();

        $this->template->write('meta_title', 'Widgets-' . $meta['title'], TRUE);

        $this->template->write('meta_description', $meta['meta_description'], TRUE);

        $this->template->write('meta_keyword', $meta['meta_keyword'], TRUE);

        $this->template->write_view('header', 'default/header_login', $data, TRUE);

        $this->template->write_view('center_content', 'default/widgets', $data, TRUE);

        $this->template->write_view('footer', 'default/footer', $data, TRUE);

        $this->template->render();
    }

    /////////////============Project Widgets =====================



    function add_update_comment() {



        $pdata = array('update_id' => $_POST['update_id'],
            'project_id' => $_POST['project_id'],
            'update_comment_text' => $_POST['update_comment_text'],
            'update_comment_user_id' => get_authenticateUserID(),
            'update_comment_date' => date("Y-m-d H:i:s")
        );

        $this->db->insert('update_comment', $pdata);



        $last_comment_id = mysql_insert_id();

        $one_up_cmt = $this->project_model->get_one_update_comment($last_comment_id);

        $one_user = get_user_detail(get_authenticateUserID());



        if ($one_user['image'] != "" && is_file('upload/thumb/' . $one_user['image'])) {



            $user_image = $one_user['image'];
        } else {
            $user_image = "no_man.gif";
        }



        $response = array(
            'last_comment_id' => $last_comment_id,
            'update_comment_text' => $one_up_cmt->update_comment_text,
            'update_comment_date' => getDuration($one_up_cmt->update_comment_date),
            'user_image' => $user_image,
            'status' => 'success'
        );





        echo json_encode($response);

        exit; // only print out the json version of the response

        /*         * **************** */



        return $response;
    }

    function embed_popup($pid = null) {

        $query = $this->db->get_where('project', array('project_id' => $pid));

        $rs = $query->row();



        $data['site_setting'] = site_setting();

        $data['rs'] = $rs;

        $data['offset'] = 0;

        $data['limit'] = 8;



        $this->template->write_view('main_content', 'default/project/embed_popup', $data);

        $this->template->render();
    }

}

?>