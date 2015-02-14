<?php

	if($this->session->userdata('admin_id')=="")

	{

		redirect('home');

	}

	$query = $this->db->get('admin');

	$admin = $query->row_array();

	$company = $admin['company'];

	

	$this->db->order_by("login_id", "desc"); 

	$query = $this->db->get('user_login');

	$login = $query->row_array();

	$login_ip = $_SERVER['REMOTE_ADDR']; 

	

	$total_transaction = $this->db->count_all('transaction');

	

	$this->db->select_sum('amount');

	$query = $this->db->get('transaction');

	$transaction = $query->row_array();

	$total_earning = $transaction['amount'];

	

	$this->db->select('SUM(listing_fee) as total_listing_fee,SUM(pay_fee) as total_pay_fee,SUM(amount) as total_amount');

		$this->db->from('transaction');

		$query = $this->db->get();

		if ($query->num_rows() > 0) {

			$res = $query->result_array();

			$total_earned = ($res[0]['total_listing_fee'] + $res[0]['total_pay_fee']);

		}

		

?>

<div id="header">

  <div class="logo"><img src="http://phpserver:8090/indiefilmfunding/decrypted_version/admin/images/logo.png" /><!--<b style="font-size:34px; color:#B00000; "><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Indie Film Funding</b>--></div>

  <div id="rec-donation" style="right:223px;"> Total Transaction

        <h6><?php echo $total_transaction; ?></h6>

        Total Earnings

        <h6><?php echo set_currency($total_earned); ?></h6>

      </div>

  <div id="headerlogin">

    <div class="fleft" align="right" style="width:116px;">&nbsp;</div>

    <div class="devider"><img src="<?php echo base_url(); ?>images/devider.png" /></div>

    <!--<div class="fright">Contact : <?php echo $company; ?><br />-->

      <span>welcome <strong><?php echo $this->session->userdata('username'); ?></strong></span>

      <?php

	  	$CI =& get_instance();

		$site = $CI->config->slash_item('base_url_site');

		

		$chk_admin=$this->home_model->get_rights('list_admin');

		$chk_admin_login=$this->home_model->get_rights('admin_login');

		$chk_user=$this->home_model->get_rights('list_user');
		
		$chk_user_enquiries=$this->home_model->get_rights('list_enquiries');

		$chk_user_login=$this->home_model->get_rights('user_login');

		$chk_project_category=$this->home_model->get_rights('list_project_category');

		$chk_project=$this->home_model->get_rights('list_project');
		
		$chk_curated=$this->home_model->get_rights('list_curated');

		$chk_idea=$this->home_model->get_rights('list_idea');

		$chk_photo_gallery=$this->home_model->get_rights('list_gallery');
		
		
		$chk_affiliate=$this->home_model->get_rights('affiliates');
		$chk_message=$this->home_model->get_rights('list_message');
		

		$chk_amazon=$this->home_model->get_rights('list_amazon');

		$chk_adaptive=$this->home_model->get_rights('list_paypal');

		$chk_paypal=$this->home_model->get_rights('list_normal_paypal');
		
		$chk_paypal_credit_card=$this->home_model->get_rights('list_credit_card');

		

		$chk_wallet_setting=$this->home_model->get_rights('add_wallet_setting');

		$chk_wallet_payment_gateway=$this->home_model->get_rights('list_payment_gateway');

		$chk_wallet_review=$this->home_model->get_rights('list_wallet_review');

		$chk_wallet_withdraw=$this->home_model->get_rights('list_wallet_withdraw');

		

		$chk_transaction=$this->home_model->get_rights('list_transaction');

		$chk_home_page=$this->home_model->get_rights('home_page');		

		$chk_pages=$this->home_model->get_rights('list_pages');

		$chk_country=$this->home_model->get_rights('list_country');

		$chk_state=$this->home_model->get_rights('list_state');

		$chk_city=$this->home_model->get_rights('list_city');	

		$chk_site=$this->home_model->get_rights('add_site_setting');

		$chk_meta=$this->home_model->get_rights('add_meta_setting');

		$chk_fb=$this->home_model->get_rights('add_facebook_setting');

		

		$chk_filter=$this->home_model->get_rights('add_filter_setting');

		$chk_tw=$this->home_model->get_rights('add_twitter_setting');
		
		$chk_google=$this->home_model->get_rights('add_google_setting');
		$chk_yahoo=$this->home_model->get_rights('add_yahoo_setting');

		$chk_email=$this->home_model->get_rights('add_email_setting');

		$chk_email_temp=$this->home_model->get_rights('add_email_template');

		$chk_img=$this->home_model->get_rights('add_image_setting');

		$chk_message_setting=$this->home_model->get_rights('add_message_setting');
		
		
		

		$chk_spam=$this->home_model->get_rights('add_spam_setting');

		$chk_spam_report=$this->home_model->get_rights('spam_report');

		$chk_spamer=$this->home_model->get_rights('spamer');

		

		$chk_newsletter_list=$this->home_model->get_rights('list_newsletter');

		$chk_list_newsletter_user=$this->home_model->get_rights('list_newsletter_user');

		$chk_newsletter_setting=$this->home_model->get_rights('newsletter_setting');

		$chk_newsletter_job=$this->home_model->get_rights('newsletter_job');		

		

		$chk_faq_category=$this->home_model->get_rights('list_faq_category');

		$chk_faq=$this->home_model->get_rights('list_faq');

		$chk_school=$this->home_model->get_rights('list_school');

		$chk_guidelines=$this->home_model->get_rights('guidelines');

		

		$chk_preport=$this->home_model->get_rights('project_report');

		$chk_treport=$this->home_model->get_rights('transaction_report');
		$chk_cron=$this->home_model->get_rights('list_cronjob');
		
		$chk_blog=$this->home_model->get_rights('list_blog');	
		$chk_blog_category = $this->home_model->get_rights('list_blog_category');	
		$chk_blog_setting = $this->home_model->get_rights('blog_setting');
		
		$chk_testimonials = $this->home_model->get_rights('list_testimonials');	
		
		$chk_social_links = $this->home_model->get_rights('list_social_links');	
		

		
		$date_run = '';
		
		$q = $this->db->query("select * from cronjob where status=1 order by cronjob_id desc limit 1");

		if($q->num_rows()>0)
		{
			$date = $q->row();

			$date_run = explode(' ',$date->date_run);
		}

	  ?>

	  <div class="accountdetail"><img src="<?php echo base_url(); ?>images/admin-icon.png" /><?php echo anchor('admin/edit_admin/'.$this->session->userdata('admin_id'),'My Account'); ?> | <?php echo anchor($site,'Site','target="_blank"'); ?> | <?php echo anchor('home/logout','Log Out'); ?></div>

      <div class="servertime">Cronjob time : <?php if(isset($date_run[0])) {  echo date("d M Y",strtotime($date_run[0])); } ?><br />

        <?php if(isset($date_run[1])) {  echo $date_run[1]; } ?><br />

        Last Login ip : <?php echo $login_ip; ?></div>

    </div>

  </div>

</div>

<div id="menu">

  <div class="chromestyle" id="chromemenu">

    <ul>

      <li style="padding-right:2px; padding-top:5px;"><img src="<?php echo base_url(); ?>images/home.png" border="0" onmouseover="this.src='<?php echo base_url(); ?>images/home-ho.png'" onmouseout="this.src='<?php echo base_url(); ?>images/home.png'" style="padding-right:9px;" /></li>

       <li><a href="<?php echo base_url(); ?>home/dashboard" rel="dropmenu3">Dashboard</a></li>

    

	 <?php if($chk_admin==1 || $chk_user==1 || $chk_user_login==1) { ?>

	  <li><a href="<?php echo base_url(); ?>admin/list_admin" rel="dropmenu1">Users</a></li>

	  <?php } if($chk_project_category==1 || $chk_project==1 || $chk_curated==1) { ?>	  

      <li><a href="<?php echo base_url(); ?>project_category/list_project_category" rel="dropmenu2">Projects</a></li>

		<?php }  if($chk_amazon==1 || $chk_adaptive==1 || $chk_paypal==1 || $chk_paypal_credit_card==1 || $chk_wallet_setting==1 || $chk_wallet_payment_gateway==1 || 		$chk_wallet_review==1 || $chk_wallet_withdraw==1) { ?>	

       <li><a href="#" rel="dropmenu15">Payment Module</a></li>

	   <?php } if($chk_transaction==1) { ?>

      <li><?php echo anchor('transaction_type/list_transaction','Transactions'); ?></li>

        <?php } if($chk_home_page==1 || $chk_pages==1 || $chk_faq_category==1 || $chk_faq==1 || $chk_school==1 || $chk_guidelines==1) { ?>

       <li><a href="<?php echo base_url(); ?>pages/list_pages" rel="dropmenu18">Content Pages</a></li>

	   <?php // } if($chk_country==1 || $chk_state==1 || $chk_city==1) { ?>

       <!-- <li><a href="#" rel="dropmenu9">Globalization</a></li> -->    

		<?php } if($chk_idea==1 || $chk_photo_gallery==1 || $chk_affiliate==1 || $chk_message==1) { ?>     

        <li><a href="#" rel="dropmenu16">Other Features</a></li>

      <?php } if($chk_site==1 || $chk_meta==1 || $chk_fb==1 || $chk_tw==1 || $chk_email==1 || $chk_email_temp==1 || $chk_img==1 || $chk_filter ==1 || $chk_google==1 || $chk_yahoo==1 || $chk_message_setting==1) { ?>

         <li><?php echo anchor('site_setting/add_site_setting','Settings'); ?><!--<a href="#" rel="dropmenu6">Settings</a>--></li>

		 <?php } if($chk_spam==1 || $chk_spam_report==1 || $chk_spamer==1) { ?>

    	  <li><a href="<?php echo base_url(); ?>spam/add_spam_setting" rel="dropmenu20">Spam Setting</a></li>

      <?php } if($chk_newsletter_list==1 || $chk_list_newsletter_user==1 || $chk_newsletter_setting==1 || $chk_newsletter_job==1) { ?>	  

	    <li><a href="<?php echo base_url(); ?>newsletter/list_newsletter" rel="dropmenu21">Newsletter</a></li>	  

	  <?php } if($chk_preport==1 || $chk_treport==1){ ?>  

	  	 <li><a href="<?php echo base_url(); ?>project_category/project_report" rel="dropmenu22">Reports</a></li>	

		 <?php } if($chk_blog==1){?>
        <!-- <li><a href="<?php echo base_url(); ?>blog/list_blog" rel="dropmenu23">Blog</a></li>	-->
		 <?php } ?>

    </ul>

  </div>

  

  
  <div id="dropmenu3" class="dropmenudiv">

   	<?php  echo anchor('graph/user','Graphical Report');  ?>

  </div>
    
  

  <div id="dropmenu21" class="dropmenudiv">

  

  <?php if($chk_newsletter_list==1) { echo anchor('newsletter/list_newsletter','Newsletters');  } ?>

  	<?php if($chk_list_newsletter_user==1) {  echo anchor('newsletter/list_newsletter_user','Newsletter User'); } ?>

	<?php if($chk_newsletter_job==1) {  echo anchor('newsletter/newsletter_job','Newsletter Job'); } ?>

	<?php if($chk_newsletter_setting==1) {  echo anchor('newsletter/newsletter_setting','Settings'); } ?>

    </div>

	

	<div id="dropmenu22" class="dropmenudiv">



  	<?php if($chk_preport==1) { echo anchor('project_category/project_report','Project Report'); } ?>

  	<?php if($chk_treport==1) {  echo anchor('transaction_type/transaction_report','Transaction Report'); } ?>


    </div>
    
    <div id="dropmenu23" class="dropmenudiv">
  		<?php if($chk_blog==1){echo anchor('blog/list_blog','Blog'); } ?>
        <?php if($chk_blog_category==1){echo anchor('blog/list_blog_category','Blog Category'); } ?>
	  	<?php if($chk_blog_setting==1) {  echo anchor('blog/blog_setting','Blog Setting'); } ?>
    </div>

  

  

  

  <div id="dropmenu20" class="dropmenudiv">

  
  	<?php if($chk_spam_report==1) {  echo anchor('spam/spam_report','Spam Report'); } ?>

	<?php if($chk_spamer==1) {  echo anchor('spam/spamer','Spamer'); } ?>

	<?php if($chk_spam==1) { echo anchor('spam/add_spam_setting','Setting');  } ?>

    </div>
    
    
	

	

  

  <div id="dropmenu18" class="dropmenudiv">

  

  <?php //if($chk_home_page==1) { echo anchor('pages/home_page','Home Page');  } ?>

  	<?php if($chk_pages==1) {  echo anchor('pages/list_pages','Pages'); } ?>

	

	<?php if($chk_faq_category==1) { echo anchor('faq_category/list_faq_category','FAQ Categories'); } ?>

		<?php if($chk_faq==1) { echo anchor('faq/list_faq','FAQ'); } ?>

	<!--<?php if($chk_school==1) { echo anchor('school/list_school','School'); } ?>-->

	<?php if($chk_guidelines==1) { echo anchor('guide/guidelines','Guidelines'); } ?>

	

	

    </div>

    

    

  

   <div id="dropmenu16" class="dropmenudiv">

  	

    <?php // if($chk_idea==1) { echo anchor('idea/list_idea','Fund Ideas'); } ?>    

    <?php //if($chk_photo_gallery==1) { echo anchor('gallery/list_gallery','Photo Gallery'); } ?>

    <?php if($chk_cron==1) { echo anchor('cronjob/list_cronjob','Cron Jobs'); } ?>
    
    
    <?php // if($chk_affiliate==1) { echo anchor('affiliates','Affiliates'); } ?>
    
    <?php if($chk_message==1) { echo anchor('message','Messages'); } ?>
    
    <?php if($chk_testimonials==1) { echo anchor('testimonials/list_testimonials','Testimonials'); } ?>
    
     <?php if($chk_social_links==1) { echo anchor('social/list_social_link','Social Links'); } ?>
       
    
 


  	

    

  </div>

  

  

  <div id="dropmenu1" class="dropmenudiv">

  <?php if($chk_admin==1) { echo anchor('admin/list_admin','Administrator'); } ?>

  	<?php if($chk_user==1) { echo anchor('user/list_user','Users'); } ?>

  	<?php if($chk_user_login==1) { echo anchor('user/user_login','User Logins'); } ?>
    
    <?php if($chk_user_enquiries==1) { echo anchor('enquiries/list_enquiries','User Enquiries'); } ?>

  </div>

  <div id="dropmenu2" class="dropmenudiv">

  	<?php if($chk_project_category==1) { echo anchor('project_category/list_project_category','Project Categories'); } ?>

	<?php if($chk_project==1) { echo anchor('project_category/list_project','Project List'); } ?>
	<?php if($chk_curated==1) { echo anchor('curated/list_curated','Curated Pages'); } ?>
  	

  </div>

 

  

  

  <div id="dropmenu15" class="dropmenudiv">

  

  <?php //if($chk_amazon==1) { echo anchor('transaction_type/list_amazon','Amazon Gateway'); } ?>

	<?php ?><?php if($chk_adaptive==1) { echo anchor('transaction_type/list_paypal','Paypal Adaptive Gateway'); } ?><?php ?>
    <?php if($chk_paypal_credit_card==1) { echo anchor('transaction_type/list_credit_card','Paypal Credit Card'); } ?>
	<?php if($chk_wallet_setting==1 || $chk_wallet_payment_gateway==1 || $chk_wallet_review==1 || $chk_wallet_withdraw==1) { 
		echo anchor('payments_gateways/list_payment_gateway','Wallet Gateway');
	}

	?>
 	<?php //if($chk_paypal==1) { echo anchor('transaction_type/list_normal_paypal','Normal Paypal Gateway'); } ?>
	

   </div>

  

  

  <?php /*?><div id="dropmenu6" class="dropmenudiv">

  	<?php if($chk_site==1) { echo anchor('site_setting/add_site_setting','Site Settings'); } ?>

	<?php if($chk_meta==1) { echo anchor('meta_setting/add_meta_setting','Meta Settings'); } ?>

	<?php if($chk_fb==1) { echo anchor('facebook_setting/add_facebook_setting','Facebook Settings'); } ?>

	<?php if($chk_tw==1) { echo anchor('twitter_setting/add_twitter_setting','Twitter Settings'); } ?>
    
    <?php if($chk_google==1) { echo anchor('google_setting/add_google_setting','Google Settings'); } ?>
    <?php if($chk_yahoo==1) { echo anchor('yahoo_setting/add_yahoo_setting','Yahoo Settings'); } ?>

    <?php if($chk_email==1) { echo anchor('email_setting/add_email_setting/','Email Setting'); } ?>

  	<?php if($chk_email_temp==1) { echo anchor('email_template/add_email_template/7','Email Template'); } ?>

	<?php if($chk_img==1) { echo anchor('site_setting/add_image_setting','Image Size Setting'); } ?>

    <?php if($chk_filter==1) { echo anchor('site_setting/add_filter_setting','Filter Setting'); } ?>

     <?php if($chk_message_setting==1) { echo anchor('message_setting/add_message_setting','Message Setting'); } ?>

	  

  </div><?php */?>



  

   <div id="dropmenu9" class="dropmenudiv">

   	<?php if($chk_country==1) {  echo anchor('country/list_country','Countries'); } ?>  		

  	<?php if($chk_state==1) { echo anchor('state/list_state','States'); } ?>

	<?php if($chk_city==1) { echo anchor('city/list_city','City'); } ?>  

  </div>

  

  

  <script type="text/javascript">

	cssdropdown.startchrome("chromemenu");

  </script>

</div>