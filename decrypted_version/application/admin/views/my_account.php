<div id="con-tabs">
          <ul>
            <li><span style="cursor:pointer;"><?php echo anchor('home/my_account','My Account','id="sp_1" style="color:#364852;background:#ececec;"'); ?></span></li>
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
													$attributes = array('name'=>'frm_my_account');
													echo form_open('home/my_account',$attributes);
												  ?>
													<fieldset class="step">
													<?php
														if($error != "")
														{
															
															if($error=='suceess')
															{
																echo "<label style='width:700px;text-align:center;'><span style='color:#009900;'>Account has been updated successfully.</span></label><div class='vertical-line'></div>";																
															}
															else
															{
																echo "<label style='width:700px;text-align:center;'><span>".$error."</span></label>";
																echo "<div class='vertical-line'></div>";
															}
														}
													?>	
                                                    
                                                    
                                                      <div class="fleft">
													  <label>Email<span>&nbsp;</span></label>
													  <span onmouseover="show_bg('email')" onmouseout="hide_bg('email')">
													  <input type="text" name="email" id="email" value="<?php echo $email; ?>" onfocus="show_bg('email')" onblur="hide_bg('email')"/>
													  </span>
													</div>
                                                    
                                                    <div style="clear:both;"></div>
                                                    
                                                    												
													<div class="fleft">
													  <label>User Name<span>&nbsp;</span></label>
													  <span onmouseover="show_bg('username')" onmouseout="hide_bg('username')">
													  <input type="text" name="username" id="username" value="<?php echo $username; ?>" onfocus="show_bg('username')" onblur="hide_bg('username')"/>
													  </span>
													</div>
													
                                                    <div style="clear:both;"></div>
                                                    
                                                    <div class="fleft">
													  <label>Password<span>&nbsp;</span></label>
													  <span onmouseover="show_bg('password')" onmouseout="hide_bg('password')">
													  <input type="text" name="password" id="password" value="<?php echo $password; ?>" onfocus="show_bg('password')" onblur="hide_bg('password')"/>
													  </span>
													</div>
                                                    
                                                    <div style="clear:both;"></div>
													
                                                  
												

													<div class="fleft">
													  <label>&nbsp;<span>&nbsp;</span></label>
													  <span onmouseover="show_bg('admin_id')" onmouseout="hide_bg('admin_id')">
													  <input type="hidden" name="admin_id" id="admin_id" value="<?php echo $admin_id; ?>" />													  
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
