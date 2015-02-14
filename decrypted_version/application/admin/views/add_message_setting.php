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

		   

		    <li><span style="cursor:pointer;"><?php echo anchor('site_setting/add_site_setting','Site','id="sp_1"'); ?></span></li>

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

			

			<?php }  if($check_filter_rights==1) { ?>

			

			<li><span style="cursor:pointer;"><?php echo anchor('site_setting/add_filter_setting','Filter'); ?></span></li>  

			

			<?php } if($check_img_rights==1) { ?>

            

               <li><span style="cursor:pointer;"><?php echo anchor('site_setting/add_image_setting','Image Size'); ?></span></li>      

               

               <?php } if($chk_message_setting==1) { ?>
				
                
                <li><span style="cursor:pointer;"><?php echo anchor('message_setting/add_message_setting','Messages','style="color:#364852;background:#ececec;"'); ?></span>
          	</li>
			
             <?php } ?>

          </ul>

          <div id="text">

            <div id="1">

            

            <?php if($error != "")

					{?>

						<div style="text-align:center;" class="msgdisp"><?php  echo $error; ?></div>

					<?php }

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

									$attributes = array('name'=>'frm_message_setting');
									echo form_open('message_setting/add_message_setting',$attributes);

								  ?>

									<fieldset class="step">
									
                                    <div class="fleft">
									  <label>Send email to admin on new message<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('email_admin_on_new_message')" onmouseout="hide_bg('email_admin_on_new_message')">
									  <input type="text" name="email_admin_on_new_message" id="email_admin_on_new_message" value="<?php echo $email_admin_on_new_message; ?>" onfocus="show_bg('email_admin_on_new_message')" onblur="hide_bg('email_admin_on_new_message')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Send email to user on new message<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('email_user_on_new_message')" onmouseout="hide_bg('email_user_on_new_message')">
									  <input type="text" name="email_user_on_new_message" id="email_user_on_new_message" value="<?php echo $email_user_on_new_message; ?>" onfocus="show_bg('email_user_on_new_message')" onblur="hide_bg('email_user_on_new_message')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Default message subject<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('default_message_subject')" onmouseout="hide_bg('default_message_subject')">
									  <input type="text" name="default_message_subject" id="default_message_subject" value="<?php echo $default_message_subject; ?>" onfocus="show_bg('default_message_subject')" onblur="hide_bg('default_message_subject')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Send email on new message<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('message_enable')" onmouseout="hide_bg('message_enable')">
									  <input type="text" name="message_enable" id="message_enable" value="<?php echo $message_enable; ?>" onfocus="show_bg('message_enable')" onblur="hide_bg('message_enable')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									
								
									<div class="fleft">
									  <label>&nbsp;<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('message_setting_id')" onmouseout="hide_bg('message_setting_id')">
									  <input type="hidden" name="message_setting_id" id="message_setting_id" value="<?php echo $message_setting_id; ?>" />													  
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