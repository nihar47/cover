<div id="con-tabs">

          <ul>

           

		    <?php  $check_site_rights=$this->home_model->get_rights('add_site_setting');

		 		$check_meta_rights=$this->home_model->get_rights('add_meta_setting');

				$check_fb_rights=$this->home_model->get_rights('add_facebook_setting');

				$check_tw_rights=$this->home_model->get_rights('add_twitter_setting');

				$check_em_rights=$this->home_model->get_rights('add_email_setting');

				$check_filter_rights=$this->home_model->get_rights('add_filter_setting');

				$check_img_rights=$this->home_model->get_rights('add_image_setting');

			$check_google_rights=$this->home_model->get_rights('add_google_setting');
				$check_yahoo_rights=$this->home_model->get_rights('add_yahoo_setting');
$chk_message_setting=$this->home_model->get_rights('add_message_setting');

			if($check_site_rights==1) {		?>

		   

		    <li><span style="cursor:pointer;"><?php echo anchor('site_setting/add_site_setting','Site','id="sp_1" style="color:#364852;background:#ececec;"'); ?></span></li>

			   <li><span style="cursor:pointer;"><?php echo anchor('site_setting/add_amount_formatting','Amount'); ?></span></li>

			 <?php } if($check_meta_rights==1) { ?>

			

			<li><span style="cursor:pointer;"><?php echo anchor('meta_setting/add_meta_setting','Meta','id="sp_2"'); ?></span></li>

			

				<?php } if($check_fb_rights==1) { ?>

			

			<li><span style="cursor:pointer;"><?php echo anchor('facebook_setting/add_facebook_setting','Facebook'); ?></span></li>

			

			<?php } if($check_tw_rights==1) { ?>

			

			<li><span style="cursor:pointer;"><?php echo anchor('twitter_setting/add_twitter_setting','Twitter'); ?></span></li>

			
			<?php } if($check_google_rights==1) { ?>

			

			<li><span style="cursor:pointer;"><?php echo anchor('google_setting/add_google_setting','Google'); ?></span></li>    
            
            <?php } if($check_yahoo_rights==1) { ?>

			

			<li><span style="cursor:pointer;"><?php echo anchor('yahoo_setting/add_yahoo_setting','Yahoo'); ?></span></li>    
            
            
			<?php } if($check_em_rights==1) { ?>

			

			<li><span style="cursor:pointer;"><?php echo anchor('email_setting/add_email_setting','Email'); ?></span></li>  

			

			<?php } if($check_filter_rights==1) { ?>

			

			<li><span style="cursor:pointer;"><?php echo anchor('site_setting/add_filter_setting','Filter'); ?></span></li>  

			

			<?php } if($check_img_rights==1) { ?>

            

               <li><span style="cursor:pointer;"><?php echo anchor('site_setting/add_image_setting','Image Size'); ?></span></li>      

               

             <?php } if($chk_message_setting==1) { ?>
				
                
         <li><span style="cursor:pointer;"><?php echo anchor('message_setting/add_message_setting','Messages'); ?></span> 	</li>
			
             <?php } ?>

          </ul>

          <script language="javascript" src="<?php echo base_url(); ?>js/Tooltip.js"></script>

          <div id="text">

            <div id="1">

            

            <?php if($error != "")

					{ if($error=='success') { ?>
                    
                  <div style="text-align:center;" class="msgdisp">Site settings updated successfully</div>
                    <?php } else { ?>

						<div style="text-align:center; color:#FF0000;" class="msgdisp"><?php  echo $error; ?></div>

					<?php } }

			?>	

              <div class="fleft" style="width:100%;">

                <div style="height:10px;"></div>

				<table width="100%" border="0" cellpadding="0" cellspacing="0">

                  <tr>

                    <td><img src="<?php echo base_url(); ?>images/c2-t-l.jpg" alt="" height="4" width="7" /></td>

                    <td background="<?php echo base_url(); ?>images/c2-t.jpg" width="99%"></td>

                    <td><img src="<?php echo base_url(); ?>images/c2-t-r.jpg" alt="" height="4" width="7" /></td>

                  </tr>

                  <tr>

                    <td background="<?php echo base_url(); ?>images/c2-l.jpg"></td>

                    <td valign="top" bgcolor="#FFFFFF"><div id="deal-tabs">

						<div id="deal-con">

							<div id="2" style="">

							  <div align="center">

								<div id="add-deal">

								  <?php

									$attributes = array('name'=>'frm_site_setting');

									echo form_open_multipart('site_setting/add_site_setting',$attributes);

								  ?>

									<fieldset class="step">

<?php if($payment_gateway == 1){ 
$attspop = array(
  'width'      => '700',
  'height'     => '500',
  'scrollbars' => 'yes',
  'status'     => 'yes',
  'resizable'  => 'yes',
  'screenx'    => '350',
  'screeny'    => '75',
  'location'=>'no',
  'menubar'=>'no',
  'titlebar'=>'no',
  'toolbar'=>'no'
);
			?>
	 <div  class="testmail" style="float:right;">
	<?php echo anchor_popup('automation/index','Test Your Paypal Setting',$attspop);?>
  </div>
                              
                 <div style="clear:both; height:15px;"></div>                     
<?php } ?>
                                      
    						
                          <div class="fleft" style="font-size:16px; width:300px; font-weight:bold; text-decoration:underline;">Site Setting</div>
                            	<div style="clear:both; height:15px;"></div>
                                
                                

							<div class="fleft">

									  <label>Site Version<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('site_version')" onmouseout="hide_bg('site_version')" style="padding-left:5px;">

									  <b><?php echo $site_version; ?></b>

									  </span>

									</div>

									<div style="clear:both;"></div>




									<div class="fleft">

									  <label>Site Name<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('site_name')" onmouseout="hide_bg('site_name')">

									  <input type="text" name="site_name" id="site_name" value="<?php echo $site_name; ?>" onfocus="show_bg('site_name')" onblur="hide_bg('site_name')"/>

									  </span>

									</div>
                                    
                                    <div style="clear:both;"></div>
                                
									<div class="fleft">

									  <label>Google Analytics Code<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('site_tracker')" onmouseout="hide_bg('site_tracker')">

									   <input type="text" name="site_tracker" id="site_tracker" onfocus="show_bg('site_tracker')" onblur="hide_bg('site_tracker')" value="<?php echo $site_tracker; ?>" />(Ex :: UA-000000-0)

									  </span>

									</div>


									<div style="clear:both; height:25px;"></div>

								
	      <div class="fleft" style="font-size:16px; width:300px; font-weight:bold; text-decoration:underline;">Recaptcha Settings</div>
                            	<div style="clear:both; height:15px;"></div>
								
							<p><a href="https://www.google.com/recaptcha/admin/create" target="_blank">Create a reCAPTCHA key for your site from here and set the key values below.</a> </p>
									<div class="fleft">

									  <label>Private Key<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('captcha_private_key')" onmouseout="hide_bg('captcha_private_key')">

									   <input type="text" name="captcha_private_key" id="captcha_private_key" onfocus="show_bg('captcha_private_key')" onblur="hide_bg('captcha_private_key')" value="<?php echo $captcha_private_key; ?>" />

									  </span>

									</div>


									<div style="clear:both; height:25px;"></div>

								
									<div class="fleft">

									  <label>Public Key<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('captcha_public_key')" onmouseout="hide_bg('captcha_public_key')">

									   <input type="text" name="captcha_public_key" id="captcha_public_key" onfocus="show_bg('captcha_public_key')" onblur="hide_bg('captcha_public_key')" value="<?php echo $captcha_public_key; ?>" />

									  </span>

									</div>


									<div style="clear:both; height:25px;"></div>

								
									

									

									

								<div class="fleft" style="font-size:16px; width:300px; font-weight:bold; text-decoration:underline;">Logo Setting</div>
                            	<div style="clear:both; height:15px;"></div>

									<div class="fleft">

									  <label>Site Logo<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('file_up')" onmouseout="hide_bg('file_up')" style="padding-left:5px;">

									   <input   name="file_up" type="file" class="" id="file_up" value="" />

						   <input type="hidden" name="prev_site_logo" id="prev_site_logo" value="<?php echo $prev_site_logo; ?>" />
	<?php if($prev_site_logo!='') { if(file_exists(base_path().'upload/orig/'.$prev_site_logo)) { ?>
                          
                            <img src="<?php echo upload_url().'upload/orig/'.$prev_site_logo; ?>" />
                            
                            <?php } } ?>
									  </span>

									</div>

									<div style="clear:both;"></div>

										<div class="fleft">

									  <label>Site Logo Hover<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('site_version')" onmouseout="hide_bg('site_version')" style="padding-left:5px;">

									   <input   name="file_up2" type="file" class="" id="file_up2" value="" />

						   <input type="hidden" name="prev_site_logo_hover" id="prev_site_logo_hover" value="<?php echo $prev_site_logo_hover; ?>" />
	<?php if($prev_site_logo_hover!='') { if(file_exists(base_path().'upload/orig/'.$prev_site_logo_hover)) { ?>
                          
                            <img src="<?php echo upload_url().'upload/orig/'.$prev_site_logo_hover; ?>" />
                            
                            <?php } } ?>
									  </span>

									</div>
                                    
                                    
                                    <div style="clear:both;"></div>

										<div class="fleft">

									  <label>Blog Logo<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('site_version')" onmouseout="hide_bg('site_version')" style="padding-left:5px;">

									   <input  name="file_up3" type="file" class="" id="file_up3" value="" />

						   <input type="hidden" name="prev_blog_logo" id="prev_blog_logo" value="<?php echo $prev_blog_logo; ?>" />
	<?php if($prev_blog_logo!='') { if(file_exists(base_path().'upload/orig/'.$prev_blog_logo)) { ?>
                          
                            <img src="<?php echo upload_url().'upload/orig/'.$prev_blog_logo; ?>" />
                            
                            <?php } } ?>
									  </span>

									</div>

									<div style="clear:both; height:25px;"></div>

									

									

									
								<div class="fleft" style="font-size:16px;width:430px;font-weight:bold; text-decoration:underline;">Language & Date Time Setting</div>
                            	<div style="clear:both; height:15px;"></div>	
									

									<div class="fleft">

									  <label>Site Language<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('site_language')" onmouseout="hide_bg('site_language')">

									  <select name="site_language" id="site_language" >

									  <?php

										if($languages)

										{

											foreach($languages as $lang)

											{

									  ?>

										<option value="<?php echo $lang['translation_id']; ?>" <?php if($lang['translation_id'] == $site_language){ echo "selected"; } ?>><?php echo $lang['language']; ?></option>

									  <?php

											}

										}

									  ?>													  	

									  </select>

									  </span>

									</div>

									<div style="clear:both;"></div>

								

                                    <input type="hidden" name="currency_symbol_side" id="currency_symbol_side" value="<?php echo $currency_symbol_side; ?>" />
                                     <input type="hidden" name="currency_code" id="currency_code" value="<?php echo $currency_code; ?>" />

                                    <div class="fleft">

									  <label>Date Format<span>&nbsp;</span></label>

									 
                                      
                                      
                              <select name="date_format" id="date_format" class="form-field settingselectbox required">
                                  <option value='d M,Y' <?php if($date_format == 'd M,Y') { echo 'selected="selected"'; } ?>>d M,Y</option>
                                  <option value='Y-m-d' <?php if($date_format == 'Y-m-d') { echo 'selected="selected"'; } ?>>Y-m-d</option>  
                                  <option value='m-d-Y' <?php if($date_format == 'm-d-Y') { echo 'selected="selected"'; } ?>>m-d-Y</option> 
                                  <option value='d-m-Y' <?php if($date_format == 'd-m-Y') { echo 'selected="selected"'; } ?>>d-m-Y</option>
                                  <option value='Y/m/d' <?php if($date_format == 'Y/m/d') { echo 'selected="selected"'; } ?>>Y/m/d</option> 
                                  <option value='m/d/Y' <?php if($date_format == 'm/d/Y') { echo 'selected="selected"'; } ?>>m/d/Y</option>
                                  <option value='d/m/Y' <?php if($date_format == 'd/m/Y') { echo 'selected="selected"'; } ?>>d/m/Y</option> 
                              </select>
                  

									</div>
                                    
                                    <div style="clear:both;"></div>
                                    
                                     <div class="fleft">

									  <label>Site Time Zone<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('time_zone')" onmouseout="hide_bg('time_zone')">

									  <select name="time_zone" id="time_zone" >

									  <?php

										if($time_zone_list)

										{

											foreach($time_zone_list as $time)

											{

									  ?>

										<option value="<?php echo $time['tz']; ?>" <?php if($time['tz'] == $time_zone){ echo "selected"; } ?>><?php echo $time['tz']; ?></option>

									  <?php

											}

										}

									  ?>													  	

									  </select>

									  </span>

									</div>

									<div style="clear:both;"></div>

								

								<div style="clear:both;height:25px;"></div>

								
                                
                                
                                
                              <div class="fleft" style="font-size:16px; font-weight:bold; width:418px; text-decoration:underline;">Feed Settings</div>
                            	<div style="clear:both; height:15px;"></div>       
                                     
                                     
                                
                                 <div class="fleft">
									  <label>Enable Facebook Stream<span>&nbsp;</span></label>
									
                                        <select name="enable_facebook_stream" id="enable_facebook_stream" >
                                            <option value="0" <?php if($enable_facebook_stream == 0){ echo "selected"; } ?>>Disable</option>
                                            <option value="1" <?php if($enable_facebook_stream == 1){ echo "selected"; } ?>>Enable</option>
                                        </select>
								</div>
								<div style="clear:both;"></div>
                                
                                
                                 <div class="fleft">
									  <label>Enable Twitter Stream<span>&nbsp;</span></label>
									
                                        <select name="enable_twitter_stream" id="enable_twitter_stream" >
                                            <option value="0" <?php if($enable_twitter_stream == 0){ echo "selected"; } ?>>Disable</option>
                                            <option value="1" <?php if($enable_twitter_stream == 1){ echo "selected"; } ?>>Enable</option>
                                        </select>
								
								</div>
								
                                
                                <div style="clear:both;height:25px;"></div>


                              <div class="fleft" style="font-size:16px; font-weight:bold; width:418px; text-decoration:underline;">Project Limits</div>
                            	<div style="clear:both; height:15px;"></div>       
                                     
                                     
                                      <div class="fleft">
									  <label>Maximum No. of Project per Year <br />(for one User)<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('maximum_project_per_year')" onmouseout="hide_bg('maximum_project_per_year')">
                                           <input type="text" name="maximum_project_per_year" id="maximum_project_per_year" onfocus="show_bg('maximum_project_per_year')" onblur="hide_bg('maximum_project_per_year')" value="<?php echo $maximum_project_per_year; ?>" />
									  </span>
								</div>
								<div style="clear:both;"></div>
                                  
                                  
                                  
                                    <div class="fleft">
									  <label>Maximum No. of Donations per Project <br />(for one User)<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('maximum_donate_per_project')" onmouseout="hide_bg('maximum_donate_per_project')">
                                           <input type="text" name="maximum_donate_per_project" id="maximum_donate_per_project" onfocus="show_bg('maximum_donate_per_project')" onblur="hide_bg('maximum_donate_per_project')" value="<?php echo $maximum_donate_per_project; ?>" />
									  </span>
								</div>
                                
                                	


									<div style="clear:both;height:25px;"></div>

								

                              <div class="fleft" style="font-size:16px; font-weight:bold; width:418px; text-decoration:underline;">Project Goal Amount Setting</div>
                            	<div style="clear:both; height:15px;"></div>       
                                     
                                     
                                      <div class="fleft">
									  <label>Minimum Project Goal Amount (<?php echo $site_setting['currency_symbol']; ?>)<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('minimum_goal')" onmouseout="hide_bg('minimum_goal')">
                                           <input type="text" name="minimum_goal" id="minimum_goal" onfocus="show_bg('minimum_goal')" onblur="hide_bg('minimum_goal')" value="<?php echo $minimum_goal; ?>" />
									  </span>
								</div>
								<div style="clear:both;"></div>
                                  
                                  
                                  
                                    <div class="fleft">
									  <label>Maximum Project Goal Amount (<?php echo $site_setting['currency_symbol']; ?>)<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('maximum_goal')" onmouseout="hide_bg('maximum_goal')">
                                           <input type="text" name="maximum_goal" id="maximum_goal" onfocus="show_bg('maximum_goal')" onblur="hide_bg('maximum_goal')" value="<?php echo $maximum_goal; ?>" />
									  </span>
								</div>
								<div style="clear:both;height:25px;"></div>
                                  
                                  
                       <div class="fleft" style="font-size:16px; font-weight:bold;width:412px; text-decoration:underline;">Project Target Days Setting</div>
                            	<div style="clear:both; height:15px;"></div>           
                                  

                                	<div class="fleft">

									  <label>Minimum days for Project<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('project_min_days')" onmouseout="hide_bg('project_min_days')">

									   <input type="text" name="project_min_days" id="project_min_days" onfocus="show_bg('project_min_days')" onblur="hide_bg('project_min_days')" value="<?php echo $project_min_days; ?>" />

									  </span>

									</div>

									<div style="clear:both;"></div>

                                    

                                    

                                    <div class="fleft">

									  <label>Maximum days for Project<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('project_max_days')" onmouseout="hide_bg('project_max_days')">

									   <input type="text" name="project_max_days" id="project_max_days" onfocus="show_bg('project_max_days')" onblur="hide_bg('project_max_days')" value="<?php echo $project_max_days; ?>" />

									  </span>

									</div>


						   <div style="clear:both;height:25px;"></div>




									
<div class="fleft" style="font-size:16px; font-weight:bold; text-decoration:underline; width:400px;">Reward(Perk) Amount Setting</div>
                            	<div style="clear:both; height:15px;"></div>
									

                                    
								

									<div class="fleft">

									  <label>Minimum Reward(Perk) Amount (<?php echo $site_setting['currency_symbol']; ?>)<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('minimum_reward_amount')" onmouseout="hide_bg('minimum_reward_amount')">

									  <input type="text" name="minimum_reward_amount" id="minimum_reward_amount" value="<?php echo $minimum_reward_amount; ?>" onfocus="show_bg('minimum_reward_amount')" onblur="hide_bg('minimum_reward_amount')"/>

									  </span>

									</div>

									

									

									 <div style="clear:both;"></div>

								<div class="fleft">

									  <label>Maximum Reward(Perk) Amount (<?php echo $site_setting['currency_symbol']; ?>)<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('maximum_reward_amount')" onmouseout="hide_bg('maximum_reward_amount')">

									  <input type="text" name="maximum_reward_amount" id="maximum_reward_amount" value="<?php echo $maximum_reward_amount; ?>" onfocus="show_bg('maximum_reward_amount')" onblur="hide_bg('maximum_reward_amount')"/>

									  </span>(NOTE : Paypal restriction for Maximum Reward amount is $2000 USD. Set limit as your currency conversation rate.)

									</div>
  
  
									<div style="clear:both;height:25px;"></div>




									
<div class="fleft" style="font-size:16px; font-weight:bold; text-decoration:underline; width:400px;">Donation Amount Setting</div>
                            	<div style="clear:both; height:15px;"></div>
									

                                    
								

									<div class="fleft">

									  <label>Minimum Donation Amount (<?php echo $site_setting['currency_symbol']; ?>)<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('donation_amount')" onmouseout="hide_bg('donation_amount')">

									  <input type="text" name="donation_amount" id="donation_amount" value="<?php echo $donation_amount; ?>" onfocus="show_bg('donation_amount')" onblur="hide_bg('donation_amount')"/>

									  </span>

									</div>

									

									

									 <div style="clear:both;"></div>

								<div class="fleft">

									  <label>Maximum Donation Amount (<?php echo $site_setting['currency_symbol']; ?>)<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('maximum_donation_amount')" onmouseout="hide_bg('maximum_donation_amount')">

									  <input type="text" name="maximum_donation_amount" id="maximum_donation_amount" value="<?php echo $maximum_donation_amount; ?>" onfocus="show_bg('maximum_donation_amount')" onblur="hide_bg('maximum_donation_amount')"/>

									  </span>(NOTE : Paypal restriction for Maximum Donation amount is $2000 USD. Set limit as your currency conversation rate.)

									</div>

									

									

									 <div style="clear:both;height:25px;"></div>
                                     
                              
                              
                              
               <div class="fleft" style="font-size:16px; font-weight:bold; width:378px; text-decoration:underline;">Donation Type Setting</div>
                            	<div style="clear:both; height:15px;"></div>                     

                            
                            
                            
                             <div class="fleft">
									  <label>Payment Gateway<span>&nbsp;</span></label>
									
    <select name="payment_gateway" id="payment_gateway" >
      <!-- <option value="2" <?php if($payment_gateway == 2){ echo "selected"; } ?>>Amazon</option>        
         <option value="1" <?php if($payment_gateway == 1){ echo "selected"; } ?>>Paypal Adaptive</option>     -->  
       <option value="3" <?php if($payment_gateway == 3){ echo "selected"; } ?>>Paypal Credit Card</option>
   <!--     <option value="0" <?php  if($payment_gateway == 0){ echo "selected"; } ?>>Wallet</option>-->
    </select>
									
								</div>
								<div style="clear:both; height:35px;"></div>
                                
                                
                                
                                
                                 
                             <div class="fleft">
									  <label>Preapprove Enable<span>&nbsp;</span></label>
									
    <select name="preapproval_enable" id="preapproval_enable" >
        <option value="0" <?php if($preapproval_enable == 0){ echo "selected"; } ?>>Inactive</option>
        <option value="1" <?php if($preapproval_enable == 1){ echo "selected"; } ?>>Active</option>
    </select>
									(NOTE : <b>Active</b> means project donation amount <b>HOLD</b> until project success.<br /><b>Inactive</b> means donate amount transfer <b>INSTANTLY</b> to project owner.)
								</div>
								<div style="clear:both; height:35px;"></div>
                                
                                
                            
                            
                            
                            
                                    <div class="fleft">

									  <label>Project Achive Goal Auto Preapproval<span>&nbsp;</span></label>

									

									

<select name="auto_target_achive" id="auto_target_achive" onFocus="show_bg('auto_target_achive')" onBlur="hide_bg('auto_target_achive')">
    <option value="0" <?php if($auto_target_achive==0){ echo "selected"; } ?> selected="selected">No</option>
    <option value="1" <?php if($auto_target_achive==1){ echo "selected"; } ?>>Yes</option>
</select>                  

           	(NOTE : <b>NO</b> means preapproved donation amount transfer <b>on project End Date</b>.<br /><b>Yes</b> means preapproved  donation amount transfer when project <b>achieved its target goal amount Before End Date</b>.)              

                                             

                                 	</div>

                                    <div style="clear:both;height:35px;"></div>
    
                                
                                
                                
                                 <div class="fleft">
									  <label>Instant Project Commission (%)<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('instant_fees')" onmouseout="hide_bg('instant_fees')">
                                           <input type="text" name="instant_fees" id="instant_fees" onfocus="show_bg('instant_fees')" onblur="hide_bg('instant_fees')" value="<?php echo $instant_fees; ?>" />
									  </span>
								</div>
								<div style="clear:both; height:35px;"></div>
                                
                                
                                
                                
                                        
								 <div class="fleft">
									  <label>Funding/Donation Type For Project<span>&nbsp;</span></label>
									
                                          <select name="enable_funding_option" id="enable_funding_option" >
                                                <option value="0" <?php if($enable_funding_option == '0'){ echo "selected"; } ?>>Fixed</option>
                                              <!--  <option value="1" <?php if($enable_funding_option == '1'){ echo "selected"; } ?>>Flexible</option>-->
                                          </select>
									  (NOTE : Works only for <b>Preapproval is Enable</b>. By <b>default</b> Funding/Donation Type of the Project is <b>Fixed</b>.)
								</div>
								<div style="clear:both; height:20px;"></div>
                                
                                
                                
                                
                                
                                
                                      
								 <div class="fleft">
									  <label>Fixed Project Commission (%)<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('fixed_fees')" onmouseout="hide_bg('fixed_fees')">
                                           <input type="text" name="fixed_fees" id="fixed_fees" onfocus="show_bg('fixed_fees')" onblur="hide_bg('fixed_fees')" value="<?php echo $fixed_fees; ?>" />
									  </span>
								</div>
								<div style="clear:both; height:20px;"></div>
                                
                                
                                
                                     <!--<div class="fleft">
									  <label>Flexible Successful Project Commission (%)<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('suc_flexible_fees')" onmouseout="hide_bg('suc_flexible_fees')">
                                          <input type="text" name="suc_flexible_fees" id="suc_flexible_fees" onfocus="show_bg('suc_flexible_fees')" onblur="hide_bg('suc_flexible_fees')" value="<?php echo $suc_flexible_fees; ?>" />
									  </span>
								</div>  
								
								<div style="clear:both;"></div>
                                
                                
                                      
								
								 <div class="fleft">
									  <label>Flexible Unsuccessful Project Commission (%)<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('flexible_fees')" onmouseout="hide_bg('flexible_fees')">
                                          <input type="text" name="flexible_fees" id="flexible_fees" onfocus="show_bg('flexible_fees')" onblur="hide_bg('flexible_fees')" value="<?php echo $flexible_fees; ?>" />
									  </span>
								</div>-->
                                
                                      
							

									

                              
								
                                    

                                    <div style="clear:both;"></div>

									<div class="fleft">

									  <label>&nbsp;<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('site_setting_id')" onmouseout="hide_bg('site_setting_id')">

									  <input type="hidden" name="site_setting_id" id="site_setting_id" value="<?php echo $site_setting_id; ?>" />													  

									  </span>

									</div>

									<div style="clear:both;"></div>

									<div class="fleft">

									  <label>&nbsp;<span>&nbsp;</span></label>

									  <div class="submit">

										<input type="submit" name="submit" value="Update" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer; " onclick=""/>

									  </div>

									</div>

									</fieldset>

								  </form>

								</div>

							  </div>

							</div>

						</div>

					</div></td>

                    <td background="<?php echo base_url(); ?>images/c2-r.jpg"></td>

                  </tr>

                  <tr>

                    <td><img src="<?php echo base_url(); ?>images/c2-b-l.jpg" alt="" height="4" width="7" /></td>

                    <td background="<?php echo base_url(); ?>images/c2-b.jpg"></td>

                    <td><img src="<?php echo base_url(); ?>images/c2-b-r.jpg" alt="" height="4" width="7" /></td>

                  </tr>

                </table>

              </div>

            </div>

          </div>

        </div>

        

        

        



<script>

var t1=null;



var auto_target_achive_info=" <b>YES :</b> All Preapprove Transaction commit When Project achieve its goal before its expiry date.<br /><br /><b>NO :</b> All Preapprove Transaction commit if project achieve its goal at expire date.";



function init()

{

 t1 = new ToolTip("a",true,40);

}





window.onload=function() { init() } 

</script>