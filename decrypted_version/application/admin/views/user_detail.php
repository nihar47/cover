<div id="con-tabs">
          <ul>
            <li><span style="cursor:pointer;"><?php echo anchor('#','User Details','id="sp_1" style="color:#364852;background:#ececec;"'); ?></span></li>
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
							  <div align="left">
								<div id="add-deal" style="width:650px;float:left;">
									<fieldset class="step" style="width:650px;">
									<div class="fleft">
									  <label>Username<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('username')" onmouseout="hide_bg('username')">
									  <input type="text" name="username" id="username" value="<?php echo ucfirst($one_user['user_name']); ?>" onfocus="show_bg('username')" onblur="hide_bg('username')" readonly="" />
									  </span>
									</div>
									<div class="fleft">
									  <label>Email<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('email')" onmouseout="hide_bg('email')">
									  <input type="text" name="email" id="email" value="<?php echo $one_user['email']; ?>" onfocus="show_bg('email')" onblur="hide_bg('email')" readonly="" />
									  </span>
									</div>
									<div class="fleft">
									  <label>Facebook Userid<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('fb_uid')" onmouseout="hide_bg('fb_uid')">
									  <input type="text" name="fb_uid" id="fb_uid" value="<?php echo ucfirst($one_user['fb_uid']); ?>" onfocus="show_bg('fb_uid')" onblur="hide_bg('fb_uid')" readonly="" />
									  </span>
									</div>
									<div class="fleft">
									  <label>Address<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('address')" onmouseout="hide_bg('address')">
									  <input type="text" name="address" id="address" value="<?php echo ucfirst($one_user['address']); ?>" onfocus="show_bg('address')" onblur="hide_bg('address')" readonly="" />
									  </span>
									</div>
									<div class="fleft">
									  <label>City<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('city')" onmouseout="hide_bg('city')">
									  <input type="text" name="city" id="city" value="<?php echo ucfirst($one_user['city']); ?>" onfocus="show_bg('city')" onblur="hide_bg('city')" readonly="" />
									  </span>
									</div>
									<div class="fleft">
									  <label>State<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('state')" onmouseout="hide_bg('state')">
									  <input type="text" name="state" id="state" value="<?php echo ucfirst($one_user['state']); ?>" onfocus="show_bg('state')" onblur="hide_bg('state')" readonly="" />
									  </span>
									</div>
									<div class="fleft">
									  <label>Country<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('country')" onmouseout="hide_bg('country')">
									  <input type="text" name="country" id="country" value="<?php echo ucfirst($one_user['country']); ?>" onfocus="show_bg('country')" onblur="hide_bg('country')" readonly="" />
									  </span>
									</div>
									<div class="fleft">
									  <label>Zip Code<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('zip_code')" onmouseout="hide_bg('zip_code')">
									  <input type="text" name="zip_code" id="zip_code" value="<?php echo $one_user['zip_code']; ?>" onfocus="show_bg('zip_code')" onblur="hide_bg('zip_code')" readonly="" />
									  </span>
									</div>
									<div class="fleft">
									  <label>Paypal Email<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('paypal_email')" onmouseout="hide_bg('paypal_email')">
									  <input type="text" name="paypal_email" id="paypal_email" value="<?php echo $one_user['paypal_email']; ?>" onfocus="show_bg('paypal_email')" onblur="hide_bg('paypal_email')" readonly="" />
									  </span>
									</div>
									<div class="fleft">
									  <label>Signup IP<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('signup_ip')" onmouseout="hide_bg('signup_ip')">
									  <input type="text" name="signup_ip" id="signup_ip" value="<?php echo $one_user['signup_ip']; ?>" onfocus="show_bg('signup_ip')" onblur="hide_bg('signup_ip')" readonly="" />
									  </span>
									</div>
									<div class="fleft">
									  <label>Joined On<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('date_added')" onmouseout="hide_bg('date_added')">
									  <input type="text" name="date_added" id="date_added" value="<?php echo $one_user['date_added']; ?>" onfocus="show_bg('date_added')" onblur="hide_bg('date_added')" readonly="" />
									  </span>
									</div>
									</fieldset>
								</div>
								<div style="float:left;">
									<?php
										if(is_file("../upload/thumb/".$one_user['image']))
										{
									?>
									<img src="<?php echo base_url(); ?>../upload/thumb/<?php echo $one_user['image']; ?>" />
									<?php 
										}else{
									?>
									<img src="<?php echo base_url(); ?>../images/nouser.jpg" />
									<?php
										}
									?>
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
							  <div align="left">
								<div id="add-deal">
									<?php
										$attributes = array('name'=>'frm_login');
										echo form_open('user/user_detail/'.$one_user['user_id'],$attributes);										
									?>
									<fieldset class="step">
									<?php
										if($error)
										{
									?>
									<div class="fleft">
									  <label>&nbsp;<span>&nbsp;</span></label>
									  <div style="float:left;"><?php echo $error; ?></div>
									</div>
									<?php
										}
									?>
									<div class="fleft">
									  <label>From Email Address<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('from_email')" onmouseout="hide_bg('from_email')">
									  <input type="hidden" name="email" value="<?php echo $one_user['email']; ?>" >
									  <input type="text" name="from_email" id="from_email" value="<?php echo $from_email; ?>" onfocus="show_bg('from_email')" onblur="hide_bg('from_email')"/>
									  </span>
									</div>
									<div class="fleft">
									  <label>Subject<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('subject')" onmouseout="hide_bg('subject')">
									  <input type="text" name="subject" id="subject" value="<?php echo $subject; ?>" onfocus="show_bg('subject')" onblur="hide_bg('subject')" style="width:500px;" />
									  </span>
									</div>
									<div class="fleft">
									  <label>Message<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('message')" onmouseout="hide_bg('message')">
									  <textarea name="message" id="message" onFocus="show_bg('message')" onBlur="hide_bg('message')" style="margin-left:3px;width:500px;"><?php echo $message; ?></textarea>
									  </span>
									</div>
									<div class="fleft">
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