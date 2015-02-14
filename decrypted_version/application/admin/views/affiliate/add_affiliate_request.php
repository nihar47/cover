<div id="con-tabs">
          <ul>
             <li><span style="cursor:pointer;"><?php echo anchor('affiliates','Stats'); ?></span></li>
    <li><span style="cursor:pointer;"><?php echo anchor('affiliates/common_settings','Common Settings'); ?></span></li>
     <li><span style="cursor:pointer;"><?php echo anchor('affiliates/commission_settings','Commission Settings'); ?></span></li>
      <li><span style="cursor:pointer;"><?php echo anchor('affiliates/commission_history','Commission History'); ?></span></li>
      
    
             <li><span style="cursor:pointer;"><?php echo anchor('requests/affiliate_requests','Affiliate Request','id="sp_1" style="color:#364852;background:#ececec;"'); ?></span></li>
        <li><span style="cursor:pointer;"><?php echo anchor('affiliates/withdraw_request','Withdraw Fund Request'); ?></span></li>
        
        
        
        
                   
          </ul>
          <div id="text">
            <div id="1">
			<?php
				if($error != "" && $error == 'insert'){
			?>
				<div style="text-align:center;" class="msgdisp">Record has been updated Successfully.</div>
			<?php
				}
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
									$attributes = array('name'=>'frm_affiliate_request');
									echo form_open('requests/add_affiliate_request',$attributes);
								  ?>
									<fieldset class="step">
                                     <?php if($error != "insert")
										{
											echo "<label style='width:700px;text-align:center;'><span>".$error."</span></label>";
											echo "<div class='vertical-line'></div>";
										}
									?>		
									<div class="fleft">
									  <label>User<span>&nbsp;</span></label>
									 
                                     
                                       <?php
										if($affiliate_request_id == "")
										{
									  ?>
									  <select name="user_id" id="user_id">
										
									<?php
										if($users)
										{
											foreach($users as $u)
											{
									?>
										<option value="<?php echo $u->user_id; ?>" <?php if($u->user_id == $user_id){ echo "selected"; } ?>><?php echo $u->user_name.' '.$u->last_name; ?></option>
									<?php
											}
										}
									?>	
									  </select>
                                      
                                      <?php } else {  echo '<b>'.ucwords($one_affiliate_request['user_name'].' '.$one_affiliate_request['last_name']).'</b> ('.$one_affiliate_request['email'].')'; ?>
                                      
                                      
                                      <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id; ?>" />
                                      <br />
<br />

                                      <?php } ?>
									
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Site Category<span>*</span></label>
									  <span onmouseover="show_bg('site_category')" onmouseout="hide_bg('site_category')">
									  <select name="site_category" id="site_category">
									
									<?php
										if($categories)
										{
											foreach($categories as $cat)
											{
												echo '<option value="'.$cat->project_category_id.'"';
												if($cat->project_category_id == $site_category)
												{
													echo 'selected="selected"';
												}
												echo '>'.$cat->project_category_name.'</option>';
											}
										}
									?>	
									  </select>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Site Name<span>*</span></label>
									  <span onmouseover="show_bg('site_name')" onmouseout="hide_bg('site_name')">
									  <input type="text" name="site_name" id="site_name" value="<?php echo $site_name; ?>" onfocus="show_bg('site_name')" onblur="hide_bg('site_name')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Site Description<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('site_description')" onmouseout="hide_bg('site_description')">
									  <textarea name="site_description" id="site_description" class="btn_textarea"><?php echo $site_description; ?></textarea>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Site URL<span>*</span></label>
									  <span onmouseover="show_bg('site_url')" onmouseout="hide_bg('site_url')">
									  <input type="text" name="site_url" id="site_url" value="<?php echo $site_url; ?>" class="btn_input" />
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Why Do You Want An Affiliate?<span>*</span></label>
									  <span onmouseover="show_bg('why_affiliate')" onmouseout="hide_bg('why_affiliate')">
									  <textarea name="why_affiliate" id="why_affiliate" class="btn_textarea"><?php echo $why_affiliate; ?></textarea>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label><span>&nbsp;</span></label>
									  <span onmouseover="show_bg('web_site_marketing')" onmouseout="hide_bg('web_site_marketing')">
									  <input type="checkbox" name="web_site_marketing" id="web_site_marketing" value="1" <?php if($web_site_marketing == '1'){ echo 'checked="checked"'; } ?> style="width:auto;" />&nbsp;Web Site Marketing?
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label><span>&nbsp;</span></label>
									  <span onmouseover="show_bg('search_engine_marketing')" onmouseout="hide_bg('search_engine_marketing')">
									  <input type="checkbox" name="search_engine_marketing" id="search_engine_marketing" value="1" <?php if($search_engine_marketing == '1'){ echo 'checked="checked"'; } ?> style="width:auto;" />&nbsp;Search Engine Marketing?
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label><span>&nbsp;</span></label>
									  <span onmouseover="show_bg('email_marketing')" onmouseout="hide_bg('email_marketing')">
									  <input type="checkbox" name="email_marketing" id="email_marketing" value="1" <?php if($email_marketing == '1'){ echo 'checked="checked"'; } ?> style="width:auto;" />&nbsp;Email Marketing?
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Special Promotional Method<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('special_promotional_method')" onmouseout="hide_bg('special_promotional_method')">
									  <input type="text" name="special_promotional_method" id="special_promotional_method" value="<?php echo $special_promotional_method; ?>" class="btn_input" />
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Special Promotional Description<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('special_promotional_description')" onmouseout="hide_bg('special_promotional_description')">
									  <textarea name="special_promotional_description" id="special_promotional_description" class="btn_textarea"><?php echo $special_promotional_description; ?></textarea>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Approved?<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('approved')" onmouseout="hide_bg('approved')">
									  <input type="radio" name="approved" id="approved" value="0" <?php if($approved == '0'){ echo 'checked="checked"'; } ?> style="float:none;width:auto;">Waiting for approval
									  <input type="radio" name="approved" id="approved" value="1" <?php if($approved == '1'){ echo 'checked="checked"'; } ?> style="float:none;width:auto;">Approved
									  <input type="radio" name="approved" id="approved" value="2" <?php if($approved == '2'){ echo 'checked="checked"'; } ?> style="float:none;width:auto;">Rejected
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>&nbsp;<span>&nbsp;</span></label>
									  <input type="hidden" name="affiliate_request_id" id="affiliate_request_id" value="<?php echo $affiliate_request_id; ?>" />
									  <input type="hidden" name="offset" id="offset" value="<?php echo $offset; ?>" />
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>&nbsp;<span>&nbsp;</span></label>
									  <?php
										if($affiliate_request_id == "")
										{
									  ?>
									  <div class="submit">
										<input type="submit" name="submit" value="Add" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer; " onclick=""/>
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
										<input type="button" name="cancel" value="Cancel" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer;" onClick="location.href='<?php echo base_url(); ?>requests/affiliate_requests'"/>
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