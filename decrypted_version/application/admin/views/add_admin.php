<div id="con-tabs">
          <ul>
            <li><span style="cursor:pointer;"><?php echo anchor('admin/list_admin','Administrator','id="sp_1" style="color:#364852;background:#ececec;"'); ?></span></li>
          </ul>
          <div id="text">
            <div id="1">
            <?php if($error != "" && $error == 'insert')
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
									$attributes = array('name'=>'frm_addadmin');
									echo form_open('admin/add_admin',$attributes);
								  ?>
									<fieldset class="step">
                                     <?php if($error != "insert")
										{
											echo "<label style='width:700px;text-align:center;'><span>".$error."</span></label>";
											echo "<div class='vertical-line'></div>";
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
									  <label>Username<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('username')" onmouseout="hide_bg('username')">
									  <input type="text" name="username" id="username" value="<?php echo $username; ?>" onfocus="show_bg('username')" onblur="hide_bg('username')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
								
								
									<div class="fleft">
									  <label>Password<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('password')" onmouseout="hide_bg('password')">
									  <input type="password" name="password" id="password" value="<?php echo $password; ?>" onfocus="show_bg('password')" onblur="hide_bg('password')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									
									
									
								<!--	<div class="fleft">
									  <label>Login IP<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('login_ip')" onmouseout="hide_bg('login_ip')">
									  <input type="text" name="login_ip" id="login_ip" value="<?php //echo $login_ip; ?>" onfocus="show_bg('login_ip')" onblur="hide_bg('login_ip')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>-->
									
									
                                    
                                    <div class="fleft">
									  <label>Admin Type<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('admin_type')" onmouseout="hide_bg('admin_type')">
									  <select name="admin_type" id="admin_type">
										<option value="1" <?php if($admin_type=='1'){ echo "selected"; } ?>>Super Administrator</option>
										<option value="2" <?php if($admin_type=='2'){ echo "selected"; } ?>>Administrator</option>														
									  </select>
									  </span>
									</div>
									<div style="clear:both;"></div>
                                    
                                    
                                    
									<div class="fleft">
									  <label>Status<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('active')" onmouseout="hide_bg('active')">
									  <select name="active" id="active">
										<option value="0" <?php if($active=='0'){ echo "selected"; } ?>>Inactive</option>
										<option value="1" <?php if($active=='1'){ echo "selected"; } ?>>Active</option>														
									  </select>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>&nbsp;<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('admin_id')" onmouseout="hide_bg('admin_id')">
									  <input type="hidden" name="admin_id" id="admin_id" value="<?php echo $admin_id; ?>" />
									  <input type="hidden" name="offset" id="offset" value="<?php echo $offset; ?>" />
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>&nbsp;<span>&nbsp;</span></label>
									  <?php
										if($admin_id=="")
										{
									  ?>
									  <div class="submit">
										<input type="submit" name="submit" value="Submit" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer; " />
									  </div>
									  <?php
										}else{
									  ?>
									  <div class="submit">
										<input type="submit" name="submit" value="Update" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer; " onclick=""/>
									  </div>
									  <?php
										}
									  ?>
									  <div class="submit">
										<input type="button" name="cancel" value="Cancel" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer;" onClick="location.href='<?php echo site_url('user/list_user'); ?>'"/>
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