<div id="con-tabs">
          <ul>
          <?php	
		  //	$email_template_id=11;
		  		foreach($template as $t)
				{
					if($email_template_id == $t['email_template_id'])
					{
		  ?>
			<li><span style="cursor:pointer;white-space:nowrap;"><?php echo anchor('email_template/add_email_template/'.$t['email_template_id'],$t['task'],'style="color:#364852;background:#ececec;"'); ?></span></li>
				
		  <?php			
					}else{
		  ?>
			<li><span style="cursor:pointer;white-space:nowrap;"><?php echo anchor('email_template/add_email_template/'.$t['email_template_id'],$t['task']); ?></span></li>
		  <?php
					}
				}
		  ?>
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
									$attributes = array('name'=>'frm_email_template');
									echo form_open('email_template/add_email_template',$attributes);
								  ?>
									<fieldset class="step">
									<div class="fleft">
									  <label>From Address<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('from_address')" onmouseout="hide_bg('from_address')">
									  <input type="text" name="from_address" id="from_address" value="<?php echo $from_address; ?>" onfocus="show_bg('from_address')" onblur="hide_bg('from_address')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Reply Address<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('reply_address')" onmouseout="hide_bg('reply_address')">
									  <input type="text" name="reply_address" id="reply_address" value="<?php echo $reply_address; ?>" onfocus="show_bg('reply_address')" onblur="hide_bg('reply_address')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Subject<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('subject')" onmouseout="hide_bg('subject')">
									  <input type="text" name="subject" id="subject" value="<?php echo $subject; ?>" onfocus="show_bg('subject')" onblur="hide_bg('subject')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Message<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('message')" onmouseout="hide_bg('message')">
									  <textarea name="message" id="message" onfocus="show_bg('message')" onblur="hide_bg('message')" style="margin-left:3px; width:400px; height:200px;"><?php echo $message; ?></textarea>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>&nbsp;<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('email_template_id')" onmouseout="hide_bg('email_template_id')">
									  <input type="hidden" name="email_template_id" id="email_template_id" value="<?php echo $email_template_id; ?>" />													  
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
                       
                       
                       
                       <!--Email Tag -->                       
                       <div style="float:left;">
                       
                       <style type="text/css">
					   
					   #tags { float:left !important; text-align:left !important; margin-top:35px; padding:0px 0px 0px 15px; }
					   
					   #tags tr, #tags tr td { text-align:left; }
					   
					   </style>
                       
                       <table border="0" cellpadding="2" cellspacing="2" width="100%" align="left" id="tags">
                       
                       <tr><td align="left" valign="middle" height="70" colspan="3" style="font-size:18px; font-weight:bold;">Email Tag<br />
<span style="font-size:12px; font-weight:normal;">(copy paste the tags with braces into the message part)</span> </td></tr>
                       
                       
                       
                        <tr>
                       <td align="left" valign="top" style="font-weight:bold;">Welcome Email</td>
                       <td align="center" valign="top">:</td>
                       <td align="left" valign="top">{user_name}, {email}</td>
                       </tr>
                       
                       
                       
                       <tr>
                       <td align="left" valign="top" style="font-weight:bold;">New User Join</td>
                       <td align="center" valign="top">:</td>
                       <td align="left" valign="top">{user_name}, {email}, {password}, {login_link}</td>
                       </tr>
                       
                       
                       
                       <tr>
                       <td align="left" valign="top" style="font-weight:bold;">Forgot Password</td>
                       <td align="center" valign="top">:</td>
                       <td align="left" valign="top">{user_name}, {email}, {password}, {login_link}</td>
                       </tr>
                       
                       
                        <tr>
                       <td align="left" valign="top" style="font-weight:bold;">Admin User Active</td>
                       <td align="center" valign="top">:</td>
                       <td align="left" valign="top">{user_name}, {email}, {password}</td>
                       </tr>
                       
                       
                       
                        <tr>
                       <td align="left" valign="top" style="font-weight:bold;">Admin User Inactive</td>
                       <td align="center" valign="top">:</td>
                       <td align="left" valign="top">{user_name}, {email}</td>
                       </tr>
                       
                       
                       
                        <tr>
                       <td align="left" valign="top" style="font-weight:bold;">Admin User Delete</td>
                       <td align="center" valign="top">:</td>
                       <td align="left" valign="top">{user_name}</td>
                       </tr>
                       
                       
                       
                       <tr>
                       <td align="left" valign="top" style="font-weight:bold;">Contact Us</td>
                       <td align="center" valign="top">:</td>
                       <td align="left" valign="top">{name}, {email}, {message}</td>
                       </tr>
                       
                       
                       
                       <tr>
                       <td align="left" valign="top" style="font-weight:bold;">New Project Successful Alert</td>
                       <td align="center" valign="top">:</td>
                       <td align="left" valign="top">{user_name}, {email}, {project_name},  {project_page_link}</td>
                       </tr>
                       
                       
                        <tr>
                       <td align="left" valign="top" style="font-weight:bold;">Admin Project Activate Alert</td>
                       <td align="center" valign="top">:</td>
                       <td align="left" valign="top">{user_name}, {email}, {project_name}, {project_page_link}</td>
                       </tr>
                       
                       
                        <tr>
                       <td align="left" valign="top" style="font-weight:bold;">Admin Project Inactivate Alert</td>
                       <td align="center" valign="top">:</td>
                       <td align="left" valign="top">{user_name}, {email}, {project_name}, {project_page_link}</td>
                       </tr>
                       
                       
                         <tr>
                       <td align="left" valign="top" style="font-weight:bold;">Admin Project Delete Alert</td>
                       <td align="center" valign="top">:</td>
                       <td align="left" valign="top">{user_name}, {email}, {project_name}</td>
                       </tr>
                       
                       
                       
                         <tr>
                       <td align="left" valign="top" style="font-weight:bold;">New Comment Admin Alert</td>
                       <td align="center" valign="top">:</td>
                       <td align="left" valign="top">{user_name}, {email}, {project_name}, {project_page_link}, {comment}, {comment_user_name}, {comment_user_profile_link}</td>
                       </tr>
                       
                       
                        <tr>
                       <td align="left" valign="top" style="font-weight:bold;">New Comment Owner Alert</td>
                       <td align="center" valign="top">:</td>
                       <td align="left" valign="top">{user_name}, {email}, {project_name}, {project_page_link}, {comment}, {comment_user_name}, {comment_user_profile_link}</td>
                       </tr>
                       
                       
                        <tr>
                       <td align="left" valign="top" style="font-weight:bold;">New Comment Poster Alert</td>
                       <td align="center" valign="top">:</td>
                       <td align="left" valign="top">{user_name}, {email}, {project_name}, {project_page_link}, {comment}, {comment_user_name}, {comment_user_profile_link}</td>
                       </tr>
                       
                       
                       
                       
                       
                        <tr>
                       <td align="left" valign="top" style="font-weight:bold;">New Fund Admin Notification</td>
                       <td align="center" valign="top">:</td>
                       <td align="left" valign="top">{user_name}, {project_name}, {project_page_link}, {donor_name}, {donor_profile_link}, {donote_amount}</td>
                       </tr>
                       
                       
                       
                       <tr>
                       <td align="left" valign="top" style="font-weight:bold;">New Fund Owner Notification</td>
                       <td align="center" valign="top">:</td>
                       <td align="left" valign="top">{user_name}, {project_name}, {project_page_link}, {donor_name}, {donor_profile_link}, {donote_amount}</td>
                       </tr>
                       
                       
                       
                       <tr>
                       <td align="left" valign="top" style="font-weight:bold;">New Fund Donor Notification</td>
                       <td align="center" valign="top">:</td>
                       <td align="left" valign="top">{user_name}, {project_name}, {project_page_link}, {donor_name}, {donor_profile_link}, {donote_amount}</td>
                       </tr>
                       
                       
                       
                         <tr>
                       <td align="left" valign="top" style="font-weight:bold;">Other HTML Tags</td>
                       <td align="center" valign="top">:</td>
                       <td align="left" valign="top">{break}</td>
                       </tr>
                       
                       
                       
                       </table>
                       
                       </div>
                      <!--Email Tag -->
                       
                            
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