



<div id="con-tabs">
          <ul>
            <li><span style="cursor:pointer;"><?php echo anchor('project_category/comments','Comments','id="sp_1" style="color:#364852;background:#ececec;"'); ?></span></li>            
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
										$attributes = array('name'=>'frm_comment');
										echo form_open('project_category/update_comment',$attributes);
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
										  <label>Project Category Name<span>&nbsp;</span></label>
										  <span onmouseover="show_bg('project_category_name')" onmouseout="hide_bg('project_category_name')">
										  <input type="text" name="project_category_name" id="project_category_name" value="<?php echo $project_category_name; ?>" readonly="" onfocus="show_bg('project_category_name')" onblur="hide_bg('project_category_name')"/>
										  </span>
										</div>
										<div style="clear:both;"></div>
										
																					
										<div class="fleft">
										  <label>Project Name<span>&nbsp;</span></label>
										  <span onmouseover="show_bg('project_title')" onmouseout="hide_bg('project_title')">
										  <input type="text" name="project_title" id="project_title" value="<?php echo $project_title; ?>" onfocus="show_bg('project_title')" readonly="" onblur="hide_bg('project_title')"/>
										  </span>
										</div>
										<div style="clear:both;"></div>
										
										<div class="fleft">
										  <label>User Name<span>&nbsp;</span></label>
										  <span onmouseover="show_bg('username')" onmouseout="hide_bg('username')">
										  <input type="text" name="username" id="username" value="<?php echo $username; ?>" onfocus="show_bg('username')" onblur="hide_bg('username')" readonly="" />
										  </span>
										</div>
										<div style="clear:both;"></div>
										
										<div class="fleft">
										  <label>Email<span>&nbsp;</span></label>
										  <span onmouseover="show_bg('email')" onmouseout="hide_bg('email')">
										  <input type="text" name="email" id="email" value="<?php echo $email; ?>" onfocus="show_bg('email')" onblur="hide_bg('email')" readonly="" />
										  </span>
										</div>
										<div style="clear:both;"></div>
										
										
																			
										<div class="fleft">
										  <label>Comments<span>&nbsp;</span></label>
										  <span onmouseover="show_bg('comments')" onmouseout="hide_bg('comments')">
										  <textarea name="comments" id="comments"  onfocus="show_bg('comments')" onblur="hide_bg('comments')"><?php echo $comments; ?></textarea>
										  
							
										  
										  </span>
										</div>
										<div style="clear:both;"></div>
										
										
										
									
										<div class="fleft">
										  <label>Status<span>&nbsp;</span></label>
										  <span >
										  <select name="status" id="status">
											<option value="0" <?php if($status=='0'){ echo "selected"; } ?>>Inactive</option>
											<option value="1" <?php if($status=='1'){ echo "selected"; } ?>>Active</option>														
										  </select>
										  </span>
										</div>
										<div style="clear:both;"></div>
										<div class="fleft">
										  <label>&nbsp;<span>&nbsp;</span></label>
										  <span >
										  <input type="text" name="comment_id" id="comment_id" value="<?php echo $comment_id; ?>" />
										  <input type="hidden" name="offset" id="offset" value="<?php echo $offset; ?>" />
										  </span>
										</div>
										<div style="clear:both;"></div>
										<div class="fleft">
										  <label>&nbsp;<span>&nbsp;</span></label>
										 
										 								  
										  
										 
										  <?php
											if($comment_id=="")
											{
										  ?>
										  <div class="submit">
											<input type="submit" name="submit" value="Submit" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer; " onclick=""/>
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
											<input type="button" name="cancel" value="Cancel" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer;" onClick="location.href='<?php echo site_url('project_category/comments'); ?>'"/>
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