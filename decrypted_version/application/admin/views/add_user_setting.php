<div id="con-tabs">
          <ul>
            <li><span style="cursor:pointer;"><?php echo anchor('site_setting/add_site_setting','Site','id="sp_1"'); ?></span></li>
			<li><span style="cursor:pointer;"><?php echo anchor('meta_setting/add_meta_setting','Meta','id="sp_2"'); ?></span></li>
			<li><span style="cursor:pointer;"><?php echo anchor('user_setting/add_user_setting','User','style="color:#364852;background:#ececec;"'); ?></span></li> 
			<li><span style="cursor:pointer;"><?php echo anchor('facebook_setting/add_facebook_setting','Facebook'); ?></span></li>
			<li><span style="cursor:pointer;"><?php echo anchor('email_template_setting/add_email_template_setting','Email Template'); ?></span></li>
			<li><span style="cursor:pointer;"><?php echo anchor('project_setting/add_project_setting','Project'); ?></span></li>
			<li><span style="cursor:pointer;"><?php echo anchor('message_setting/add_message_setting','Messages'); ?></span></li>
			<li><span style="cursor:pointer;"><?php echo anchor('word_detecter_setting/add_word_detecter_setting','Suspicious Words Detecter'); ?></span></li>
			<li><span style="cursor:pointer;"><?php echo anchor('twitter_setting/add_twitter_setting','Twitter'); ?></span></li>
          </ul>
          <div id="text">
            <div id="1">
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
									$attributes = array('name'=>'frm_user_setting');
									echo form_open('user_setting/add_user_setting',$attributes);
								  ?>
									<fieldset class="step">
									<?php
										if($error != "")
										{
											echo "<label style='width:700px;text-align:center;'><span>".$error."</span></label>";
											echo "<div class='vertical-line'></div>";
										}
									?>													
									<div class="fleft">
									  <label>Option for logging into the site<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('login_with')" onmouseout="hide_bg('login_with')">
									  <input type="text" name="login_with" id="login_with" value="<?php echo $login_with; ?>" onfocus="show_bg('login_with')" onblur="hide_bg('login_with')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Admin activation after registration<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('admin_activation')" onmouseout="hide_bg('admin_activation')">
									  <input type="text" name="admin_activation" id="admin_activation" value="<?php echo $admin_activation; ?>" onfocus="show_bg('admin_activation')" onblur="hide_bg('admin_activation')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Email verification for register<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('email_varification')" onmouseout="hide_bg('email_varification')">
									  <input type="text" name="email_varification" id="email_varification" value="<?php echo $email_varification; ?>" onfocus="show_bg('email_varification')" onblur="hide_bg('email_varification')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Auto Login after Register<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('auto_login')" onmouseout="hide_bg('auto_login')">
									  <input type="text" name="auto_login" id="auto_login" value="<?php echo $auto_login; ?>" onfocus="show_bg('auto_login')" onblur="hide_bg('auto_login')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Admin notification mail after user's registration<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('notification_mail')" onmouseout="hide_bg('notification_mail')">
									  <input type="text" name="notification_mail" id="notification_mail" value="<?php echo $notification_mail; ?>" onfocus="show_bg('notification_mail')" onblur="hide_bg('notification_mail')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Welcome mail after registration<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('welcome_mail')" onmouseout="hide_bg('welcome_mail')">
									  <input type="text" name="welcome_mail" id="welcome_mail" value="<?php echo $welcome_mail; ?>" onfocus="show_bg('welcome_mail')" onblur="hide_bg('welcome_mail')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Logout after Password Change<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('password_change_logout')" onmouseout="hide_bg('password_change_logout')">
									  <input type="text" name="password_change_logout" id="password_change_logout" value="<?php echo $password_change_logout; ?>" onfocus="show_bg('password_change_logout')" onblur="hide_bg('password_change_logout')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Enable OpenID<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('enable_openid')" onmouseout="hide_bg('enable_openid')">
									  <input type="text" name="enable_openid" id="enable_openid" value="<?php echo $enable_openid; ?>" onfocus="show_bg('enable_openid')" onblur="hide_bg('enable_openid')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Allow user to switch language<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('user_switch_language')" onmouseout="hide_bg('user_switch_language')">
									  <input type="text" name="user_switch_language" id="user_switch_language" value="<?php echo $user_switch_language; ?>" onfocus="show_bg('user_switch_language')" onblur="hide_bg('user_switch_language')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>&nbsp;<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('user_setting_id')" onmouseout="hide_bg('user_setting_id')">
									  <input type="hidden" name="user_setting_id" id="user_setting_id" value="<?php echo $user_setting_id; ?>" />													  
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