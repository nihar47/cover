<div id="con-tabs">
          <ul>
           
		    <?php  $check_spam_setting=$this->home_model->get_rights('add_site_setting');
		 		$check_spam_report=$this->home_model->get_rights('spam_report');
				$check_spam=$this->home_model->get_rights('spamer');
				
		
			if($check_spam_setting==1) {		?>
		   
		    <li><span style="cursor:pointer;"><?php echo anchor('spam/add_spam_setting','Spam Setting','id="sp_1" style="color:#364852;background:#ececec;"'); ?></span></li>
			
			 <?php } if($check_spam_report==1) { ?>
			
			<li><span style="cursor:pointer;"><?php echo anchor('spam/spam_report','Spam Report','id="sp_2"'); ?></span></li>
			
				<?php } if($check_spam==1) { ?>
			
			<li><span style="cursor:pointer;"><?php echo anchor('spam/spamer','Spamer'); ?></span></li>
			
			<?php }  ?>
			
          </ul>
          <div id="text">
            <div id="1">
            <?php
				if($error != "")
				{?>
					<div  style="text-align:center;" class='msgdisp'><?php echo $error;?></div>
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
									$attributes = array('name'=>'frm_spam_setting');
									echo form_open('spam/add_spam_setting',$attributes);
								  ?>
									<fieldset class="step">
																				
									<div class="fleft">
									  <label>Total Spam Report Allow<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('spam_report_total')" onmouseout="hide_bg('spam_report_total')">
									  <input type="text" name="spam_report_total" id="spam_report_total" value="<?php echo $spam_report_total; ?>" onfocus="show_bg('spam_report_total')" onblur="hide_bg('spam_report_total')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>                          
                                    
                                    <div class="fleft">
									  <label>Report Spamer Expire(In Days)<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('spam_report_expire')" onmouseout="hide_bg('spam_report_expire')">
									  <input type="text" name="spam_report_expire" id="spam_report_expire" value="<?php echo $spam_report_expire; ?>" onfocus="show_bg('spam_report_expire')" onblur="hide_bg('spam_report_expire')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
								
									
									
									
									<div class="fleft">
									  <label>Total Registration Allow From Same IP<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('total_register')" onmouseout="hide_bg('total_register')">
									  <input type="text" name="total_register" id="total_register" value="<?php echo $total_register; ?>" onfocus="show_bg('total_register')" onblur="hide_bg('total_register')"/>
									  </span>
									</div>	
									<div style="clear:both;"></div>
									
									<div class="fleft">
									  <label>Registration Spamer Expire(In Days)<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('register_expire')" onmouseout="hide_bg('register_expire')">
									  <input type="text" name="register_expire" id="register_expire" value="<?php echo $register_expire; ?>" onfocus="show_bg('register_expire')" onblur="hide_bg('register_expire')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									
                                    
                                    
									
									<div class="fleft">
									  <label>Total Comment Allow From Same IP In One Day<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('total_comment')" onmouseout="hide_bg('total_comment')">
									  <input type="text" name="total_comment" id="total_comment" value="<?php echo $total_comment; ?>" onfocus="show_bg('total_comment')" onblur="hide_bg('total_comment')"/>
									  </span>
									</div>	
									<div style="clear:both;"></div>
									
									<div class="fleft">
									  <label>Comment Spamer Expire(In Days)<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('comment_expire')" onmouseout="hide_bg('comment_expire')">
									  <input type="text" name="comment_expire" id="comment_expire" value="<?php echo $comment_expire; ?>" onfocus="show_bg('comment_expire')" onblur="hide_bg('comment_expire')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									
									
									
									
									<div class="fleft">
									  <label>Total Inquiry Allow From Same IP In One Day<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('total_contact')" onmouseout="hide_bg('total_contact')">
									  <input type="text" name="total_contact" id="total_contact" value="<?php echo $total_contact; ?>" onfocus="show_bg('total_contact')" onblur="hide_bg('total_contact')"/>
									  </span>
									</div>	
									<div style="clear:both;"></div>
									
									<div class="fleft">
									  <label>Inquiry Spamer Expire(In Days)<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('contact_expire')" onmouseout="hide_bg('contact_expire')">
									   <input type="text" name="contact_expire" id="contact_expire" value="<?php echo $contact_expire; ?>" onfocus="show_bg('contact_expire')" onblur="hide_bg('contact_expire')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
                                   
									
									
									
								
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>&nbsp;<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('spam_control_id')" onmouseout="hide_bg('spam_control_id')">
							<input type="hidden" name="spam_control_id" id="spam_control_id" value="<?php echo $spam_control_id; ?>" />													  
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
