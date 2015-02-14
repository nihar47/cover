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
            
            <?php if($error != "")
					{?>
						<div style="text-align:center;" class="msgdisp">Record has been updated Successfully.</div>
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
									$attributes = array('name'=>'frm_newsletter_setting');
									echo form_open('newsletter/newsletter_setting',$attributes);
								  ?>
									<fieldset class="step">
									<div class="fleft">
									  <label>From Name<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('newsletter_from_name')" onmouseout="hide_bg('newsletter_from_name')">
									  <input type="text" name="newsletter_from_name" id="newsletter_from_name" value="<?php echo $newsletter_from_name; ?>" onfocus="show_bg('newsletter_from_name')" onblur="hide_bg('newsletter_from_name')"/>
									  </span>
									</div>	
									<div style="clear:both;"></div>
									
									<div class="fleft">
									  <label>From Email Address<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('newsletter_from_address')" onmouseout="hide_bg('newsletter_from_address')">
									  <input type="text" name="newsletter_from_address" id="newsletter_from_address" value="<?php echo $newsletter_from_address; ?>" onfocus="show_bg('newsletter_from_address')" onblur="hide_bg('newsletter_from_address')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									
                                    
                                    
									
									<div class="fleft">
									  <label>Reply Name<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('newsletter_reply_name')" onmouseout="hide_bg('newsletter_reply_name')">
									  <input type="text" name="newsletter_reply_name" id="newsletter_reply_name" value="<?php echo $newsletter_reply_name; ?>" onfocus="show_bg('newsletter_reply_name')" onblur="hide_bg('newsletter_reply_name')"/>
									  </span>
									</div>	
									<div style="clear:both;"></div>
									
									<div class="fleft">
									  <label>Reply Email Address<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('newsletter_reply_address')" onmouseout="hide_bg('newsletter_reply_address')">
									  <input type="text" name="newsletter_reply_address" id="newsletter_reply_address" value="<?php echo $newsletter_reply_address; ?>" onfocus="show_bg('newsletter_reply_address')" onblur="hide_bg('newsletter_reply_address')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									
									
									
									
									<div class="fleft">
									  <label>New Subscribe Email<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('new_subscribe_email')" onmouseout="hide_bg('new_subscribe_email')">
									  <input type="text" name="new_subscribe_email" id="new_subscribe_email" value="<?php echo $new_subscribe_email; ?>" onfocus="show_bg('new_subscribe_email')" onblur="hide_bg('new_subscribe_email')"/>
									  </span>
									</div>	
									<div style="clear:both;"></div>
									
									<div class="fleft">
									  <label>Unsubscriber Email<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('unsubscribe_email')" onmouseout="hide_bg('unsubscribe_email')">
									   <input type="text" name="unsubscribe_email" id="unsubscribe_email" value="<?php echo $unsubscribe_email; ?>" onfocus="show_bg('unsubscribe_email')" onblur="hide_bg('unsubscribe_email')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									
									
									
                                   
								   <!--user subscribe type-->
								   
								   <script type="text/javascript">
								   
								   function show_newsletter()
								   {
								   		document.getElementById('all_newsletter').style.display='block';
								   }
								   
								   function unshow_newsletter()
								   {
								   		document.getElementById('all_newsletter').style.display='none';
								   }
								   
								   </script>
								   
								   <div class="fleft">
									  <label>User Default Newsletter<span>&nbsp;</span></label>
									 
									<span style="float:right;">
									<table border="0" cellpadding="2" cellspacing="2" style="padding:0px; margin:0px;">
									<tr>
									<td align="left" valign="top" style="padding:0px; margin:0px;"><input type="radio" name="new_subscribe_to" value="none" <?php if($new_subscribe_to=='none') { ?> checked="checked" <?php } ?> onClick="unshow_newsletter()" style="width:30px;" /></td><td align="left" valign="top" style="padding:0px; margin:0px;">None</td>
								<td align="left" valign="top" style="padding:0px; margin:0px;"><input type="radio" name="new_subscribe_to" value="all" onClick="unshow_newsletter()" <?php if($new_subscribe_to=='all') { ?> checked="checked" <?php } ?> style="width:30px;" /></td><td align="left" valign="top" style="padding:0px; margin:0px;">All</td>
									<td align="left" valign="top" style="padding:0px; margin:0px;"> <input type="radio" name="new_subscribe_to" value="selected" <?php if($new_subscribe_to=='selected') { ?> checked="checked" <?php } ?> style="width:30px;" onClick="show_newsletter()" /></td><td align="left" valign="top" style="padding:0px; margin:0px;"> Selected</td></tr></table>
									</span> 
									</div>
									<div style="clear:both;"></div>
								   
								   
								    <div class="fleft" id="all_newsletter" style="display:<?php if($new_subscribe_to=='selected') { echo "block"; } else { echo "none"; } ?>;">
									  <label>Newsletter<span>&nbsp;</span></label>
									
                          <select name="selected_newsletter_id" id="selected_newsletter_id">
                          
						  <?php   if($all_newsletter) {
						  
						  			foreach($all_newsletter as $news) {  ?>
									
									
						  
						   <option value="<?php echo $news->newsletter_id; ?>" <?php if($selected_newsletter_id==$news->newsletter_id) { ?> selected="selected" <?php } ?> style="text-transform:capitalize;" ><?php echo $news->subject; ?></option>
						   
						   	<?php }  } else { ?>
							
							<option value="">---No Template---</option>
							
							
							<?php } ?>
                           
                            
                          </select>
									
									</div>
									<div style="clear:both;"></div>
								   
								   
								   
								    <!--user subscribe type-->
									
									
								   <!--Quess Process-->
								   
								   
								   
								   <div class="fleft">
									  <label>Number Of Email Send<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('number_of_email_send')" onmouseout="hide_bg('number_of_email_send')">
									   <input type="text" name="number_of_email_send" id="number_of_email_send" value="<?php echo $number_of_email_send; ?>" onfocus="show_bg('number_of_email_send')" onblur="hide_bg('number_of_email_send')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
								   
								  
								  
								   <div class="fleft">
									  <label>Break Between No. Email Send<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('break_between_email')" onmouseout="hide_bg('break_between_email')">
									   <input type="text" name="break_between_email" id="break_between_email" value="<?php echo $break_between_email; ?>" onfocus="show_bg('break_between_email')" onblur="hide_bg('break_between_email')"/>
									  </span>
									</div>
									<div style="clear:both;"></div> 
								   
								   
								   <div class="fleft">
									  <label>Break Type<span>&nbsp;</span></label>
									
                          <select name="break_type" id="break_type">
                            <option value="minutes" <?php if($break_type=='minutes') { ?> selected="selected" <?php } ?> >Minutes</option>
                            <option value="hours" <?php if($break_type=='hours') { ?> selected="selected" <?php } ?> >Hours</option>
                            
                          </select>
									
									</div>
									<div style="clear:both;"></div>
								   
									
									  <!--Quess Process-->
									  
									  
									<!--Email Setting-->
									
									
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
                                    
									
									
									<!--Email Setting-->
									
									
									
									
									
								
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
										<input type="submit" name="submit" value="Update" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer; " onclick=""/>
									  </div>
									</div>
                                      
                                      <div  class="testmail">
                                      	<?php echo anchor(site_url('newsletter/send_testing_newsetter'),'Send Test Mail');?>
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
