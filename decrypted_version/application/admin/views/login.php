<div id="con-tabs">
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
                    <td valign="top" bgcolor="#FFFFFF">
						<div id="deal-tabs">
							<div id="deal-con">
								<div id="2">
								  <div align="center">
									<div id="add-deal">
									  <?php
										$attributes = array('name'=>'frm_login');
										echo form_open('home/check_login',$attributes);
									  ?>
										<fieldset class="step">
										<div class="fleft">
										  <label>&nbsp;</label>
										  <?php
										  	if($login == '0')
											{
												echo "<span style='color:red;'>Invalid Username or Password</span>";
											}
											if($login == '1')
											{
												echo "<span style='color:green;'>You have logged out successfully</span>";
											}
										  ?>
										</div>
										<div style="clear:both;"></div>
										<div class="fleft">
										  <label>Username<span>&nbsp;</span></label>
										  <span onmouseover="show_bg('username')" onmouseout="hide_bg('username')">
										  <input type="text" name="username" id="username" value="" onfocus="show_bg('username')" onblur="hide_bg('username')"/>
										  </span>
										</div>
										<div style="clear:both;"></div>
										<div class="fleft">
										  <label>Password<span>&nbsp;</span></label>
										  <span onmouseover="show_bg('password')" onmouseout="hide_bg('password')">
										  <input type="password" name="password" id="password" value="" onfocus="show_bg('password')" onblur="hide_bg('password')"/>
										  </span>
										</div>
										<div style="clear:both;"></div>
                                        
                                        
                                        
                                        
                                        <div class="fleft">
										  <label>&nbsp;<span>&nbsp;</span></label>
										 
										&nbsp;&nbsp; <?php echo anchor('home/forgot_password','Forgot Password','style="color:#000000;"'); ?>
										 
										</div>
										<div style="clear:both;"></div>
                                        
                                        
                                        
                                        
                                        
										<div class="fleft">
										  <label>&nbsp;<span>&nbsp;</span></label>
										  <div class="submit">
										  <input type="submit" name="login" value="Login" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer; " />
										  </div>
										</div>
										</fieldset>
									  </form>
									</div>
								  </div>
								</div>
							</div>
						</div>
					</td>
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