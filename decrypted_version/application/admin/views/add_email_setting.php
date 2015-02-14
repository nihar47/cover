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

			

			<li><span style="cursor:pointer;"><?php echo anchor('email_setting/add_email_setting','Email','style="color:#364852;background:#ececec;"'); ?></span></li>  

			

			<?php }  if($check_filter_rights==1) { ?>

			

			<li><span style="cursor:pointer;"><?php echo anchor('site_setting/add_filter_setting','Filter'); ?></span></li>  

			

			<?php } if($check_img_rights==1) { ?>

            

               <li><span style="cursor:pointer;"><?php echo anchor('site_setting/add_image_setting','Image Size'); ?></span></li>      

             <?php } if($chk_message_setting==1) { ?>
				
                
         <li><span style="cursor:pointer;"><?php echo anchor('message_setting/add_message_setting','Messages'); ?></span> 	</li>
			
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

									$attributes = array('name'=>'frm_email_setting');

									echo form_open('email_setting/add_email_setting',$attributes);

								  ?>

									<fieldset class="step">

									<div class="fleft">

									  <label>Mailer<span>&nbsp;</span></label>

									

                                    <select name="mailer" id="mailer">

                                   	 <option value="mail" <?php if($mailer=='mail') { ?> selected="selected" <?php } ?> >PHP Mail</option>

                                     <option value="smtp" <?php if($mailer=='smtp') { ?> selected="selected" <?php } ?> >SMTP</option>

                                    <option value="sendmail" <?php if($mailer=='sendmail') { ?> selected="selected" <?php } ?> >sendmail</option>

                                    

									</select>

									

									</div>

									<div style="clear:both;"></div>

                                    

                                    

                                    												

									<div class="fleft">

									  <label>Send Mail Path<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('sendmail_path')" onmouseout="hide_bg('sendmail_path')">

									  <input type="text" name="sendmail_path" id="sendmail_path" value="<?php echo $sendmail_path; ?>" onfocus="show_bg('sendmail_path')" onblur="hide_bg('sendmail_path')"/>

									  </span>(if Mailer is sendmail)

									</div>

									<div style="clear:both;"></div>

                                    

                                    

                                    

									<div class="fleft">

									  <label>SMTP Port<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('smtp_port')" onmouseout="hide_bg('smtp_port')">

									  <input type="text" name="smtp_port" id="smtp_port" value="<?php echo $smtp_port; ?>" onfocus="show_bg('smtp_port')" onblur="hide_bg('smtp_port')"/>

									  </span>(465 or 25 or 587)

									</div>

									<div style="clear:both;"></div>

                                    

                                    

                                    

                                    

									<div class="fleft">

									  <label>SMTP Host<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('smtp_host')" onmouseout="hide_bg('smtp_host')">

									  <input type="text" name="smtp_host" id="smtp_host" value="<?php echo $smtp_host; ?>" onfocus="show_bg('smtp_host')" onblur="hide_bg('smtp_host')"/>

									  </span>(if smtp user is gmail then ssl://smtp.googlemail.com)

									</div>

									<div style="clear:both;"></div>

                                    

                                    

                                    

									<div class="fleft">

									  <label>SMTP Email<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('smtp_email')" onmouseout="hide_bg('smtp_email')">

									  <input type="text" name="smtp_email" id="smtp_email" value="<?php echo $smtp_email; ?>" onfocus="show_bg('smtp_email')" onblur="hide_bg('smtp_email')"/>

									  </span>

									</div>

									<div style="clear:both;"></div>

                                    

                                    

                                    

                                    

                                    <div class="fleft">

									  <label>SMTP Password<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('smtp_password')" onmouseout="hide_bg('smtp_password')">

									  <input type="password" name="smtp_password" id="smtp_password" value="<?php echo $smtp_password; ?>" onfocus="show_bg('smtp_password')" onblur="hide_bg('smtp_password')"/>

									  </span>

									</div>

									<div style="clear:both;"></div>

                                    

                                    

									<div class="fleft">

									  <label>&nbsp;<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('email_setting_id')" onmouseout="hide_bg('email_setting_id')">

									  <input type="hidden" name="email_setting_id" id="email_setting_id" value="<?php echo $email_setting_id; ?>" />													  

									  </span>

									</div>

									<div style="clear:both;"></div>

									<div class="fleft">

									  <label>&nbsp;<span>&nbsp;</span></label>

									  <div class="submit">

										<input type="submit" name="submit" value="Update" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer; " onclick=""/>

									  </div>
									</div>
                                  
                                     <div  class="testmail">
                                      	<?php echo anchor(site_url('email_setting/send_test_mail'),'Send Test Mail');?>
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