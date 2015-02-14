<div id="con-tabs">
          <ul>
           
	<?php  
		
		$chk_newsletter_list=$this->home_model->get_rights('list_newsletter');
		$chk_list_newsletter_user=$this->home_model->get_rights('list_newsletter_user');
		$chk_newsletter_setting=$this->home_model->get_rights('newsletter_setting');
		$chk_newsletter_job=$this->home_model->get_rights('newsletter_job');		
		
				
		
			if($chk_newsletter_list==1) {		?>
		   
		    <li><span style="cursor:pointer;"><?php echo anchor('newsletter/list_newsletter','Newsletters'); ?></span></li>
			
			 <?php } if($chk_list_newsletter_user==1) { ?>
			
			<li><span style="cursor:pointer;"><?php echo anchor('newsletter/list_newsletter_user','Newsletter User'); ?></span></li>
			
				<?php } if($chk_newsletter_job==1) { ?>
			
			<li><span style="cursor:pointer;"><?php echo anchor('newsletter/newsletter_job','Newsletter Job'); ?></span></li>
			
			<?php }  if($chk_newsletter_setting==1) { ?>
			
			<li><span style="cursor:pointer;"><?php echo anchor('newsletter/newsletter_setting','Settings','id="sp_1" style="color:#364852;background:#ececec;"'); ?></span></li>
			
			<?php } ?> 
			
          </ul>
          <div id="text">
            <div id="1">
            
            <?php if($disp_error == 1){?>
                    <div style="text-align:center;" class="msgdisp"><?php  echo $error; ?></div>
                  	<?php } else {?>
            
			<?php if($error != "" && $error == "sent")
					{?>
					<div style="text-align:center;" class="msgdisp"><?php  echo "Please Check your inbox or also check Spam box"; ?></div>				<?php }
					else{?>
				<div style="text-align:left;" class="msgdisp"><?php  echo $error; ?></div>
			<?php }}?>
                    
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
									$attributes = array('name'=>'frm_send_testing_newsetter');
									echo form_open('newsletter/send_testing_newsetter',$attributes);
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

                       
                                    
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>&nbsp;<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('newsletter_setting_id')" onmouseout="hide_bg('newsletter_setting_id')">
							<input type="hidden" name="newsletter_setting_id" id="newsletter_setting_id" value="<?php echo $newsletter_setting_id; ?>" />													  
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
