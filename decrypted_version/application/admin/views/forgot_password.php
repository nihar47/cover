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
										$attributes = array('name'=>'frm_forgot_password');
										echo form_open('home/forgot_password',$attributes);
									  ?>
										<fieldset class="step">
										<div class="fleft">
										  <label>&nbsp;<span>&nbsp;</span></label>
                                          <div class="fright">
										  <?php
										  
										  if($error!='')
										  {
										  
										  	if($error == 'success')
											{
												echo "<span style='color:green;'>Password is send to your email address.</span>";
											}
											
											elseif($error == 'email_not_found')
											{
												echo "<span style='color:green;'>User Email address is not found.</span>";
											}
											
											
											elseif($error == 'record_not_found')
											{
												echo "<span style='color:green;'>User recode is not found.</span>";
											}
											else
											{
												echo "<span style='color:red;'>".$error."</span>";
											}
											
															
											
											
										}
										  ?>
                                          
                                          </div>
                                          
										</div>
										<div style="clear:both;"></div>
                                        
                                        
                                        <?php if($error == 'success') { ?>
                                        
                                        <div class="fleft">
										  <label>&nbsp;<span>&nbsp;</span></label>
										  <div class="submit">
										  <input type="button" name="login" onclick="window.location.href='<?php echo site_url('home/index'); ?>'" value="Back to Login" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer; " />
										  </div>
										</div>
                                        
                                        <?php } else { ?>
                                        
										<div class="fleft">
										  <label>Email<span>&nbsp;</span></label>
										  <span onmouseover="show_bg('email')" onmouseout="hide_bg('email')">
										  <input type="text" name="email" id="email" value="" onfocus="show_bg('email')" onblur="hide_bg('email')"/>
										  </span>
										</div>
										<div style="clear:both;"></div>
										
                                        
                                        
										<div class="fleft">
										  <label>&nbsp;<span>&nbsp;</span></label>
										  <div class="submit">
										  <input type="submit" name="forgot_password" value="Send" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer; " />
										  </div>
										</div>
                                        
                                        
                                        <?php } ?>
                                        
                                        
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