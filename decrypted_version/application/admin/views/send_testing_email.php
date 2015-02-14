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

               

               <?php } ?>

			

          </ul>

          <div id="text">

            <div id="1">

            

            <?php if($error != "" && $error == "sent")

					{?>

						<div style="text-align:left;" class="msgdisp"><?php  echo "Please Check your inbox or also check Spam box"; ?></div>

					<?php }
					else{?>

				<div style="text-align:center;" class="msgdisp"><?php  echo $error; ?></div>
			<?php }?>	

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

									$attributes = array('name'=>'frm_send_testmail');

									echo form_open('email_setting/send_test_mail',$attributes);

								  ?>

									<fieldset class="step">

								
									<div class="fleft">

									  <label>Sender Email<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('sender_mail')" onmouseout="hide_bg('sender_mail')">

									  <input type="text" name="sender_mail" id="sender_mail" value="" onfocus="show_bg('sender_mail')" onblur="hide_bg('sender_mail')"/>

									  </span>

									</div>

									<div style="clear:both;"></div>

									<div class="fleft">

									  <label>Receiver Email<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('receiver_email')" onmouseout="hide_bg('receiver_email')">

									  <input type="text" name="receiver_email" id="receiver_email" value="" onfocus="show_bg('receiver_email')" onblur="hide_bg('receiver_email')"/>

									  </span>

									</div>

									<div style="clear:both;"></div>
                                    
                                    <div class="fleft">

									  <label>Message<span>&nbsp;</span></label>

									  <span onmouseout="hide_bg('message_text')" onmouseover="show_bg('message_text')">

									  <textarea onblur="hide_bg('message_text')" onfocus="show_bg('message_text')" id="message_text" name="message_text" style="background: none repeat scroll 0% 0% rgb(244, 244, 244); color: rgb(0, 0, 0); border: 1px solid rgb(231, 230, 230);"></textarea>

									  </span>

									</div>

                       
                                    

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

										<input type="submit" name="submit" value="Send" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer; " onclick=""/>

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