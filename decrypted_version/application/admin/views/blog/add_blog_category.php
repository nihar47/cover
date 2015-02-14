<div id="con-tabs">
          <ul>
            <li><span style="cursor:pointer;"><?php echo anchor('blog/list_blog_category','Blog Categories','id="sp_1" style="color:#364852;background:#ececec;"'); ?></span></li>            
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
													$attributes = array('name'=>'frm_blog_category');
													echo form_open('blog/add_blog_category',$attributes);
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
													  <label>Blog Category Name<span>&nbsp;</span></label>
													  <span onMouseOver="show_bg('blog_category_name')" onMouseOut="hide_bg('project_category_name')">
													  <input type="text" name="blog_category_name" id="blog_category_name" value="<?php echo $blog_category_name; ?>" onFocus="show_bg('blog_category_name')" onBlur="hide_bg('blog_category_name')"/>
													  </span>
													</div>
													<div style="clear:both;"></div>
													<div class="fleft">
													  <label>Status<span>&nbsp;</span></label>
													  <span onMouseOver="show_bg('active')" onMouseOut="hide_bg('active')">
													  <select name="active" id="active">
													  	<option value="0" <?php if($active=='0'){ echo "selected"; } ?>>Inactive</option>
														<option value="1" <?php if($active=='1'){ echo "selected"; } ?>>Active</option>														
													  </select>
													  </span>
													</div>
													<div style="clear:both;"></div>
													<div class="fleft">
													  <label>&nbsp;<span>&nbsp;</span></label>
													  <span onMouseOver="show_bg('project_category_id')" onMouseOut="hide_bg('project_category_id')">
													  <input type="hidden" name="blog_category_id" id="blog_category_id" value="<?php echo $blog_category_id; ?>" />
													  <input type="hidden" name="offset" id="offset" value="<?php echo $offset; ?>" />
													  </span>
													</div>
													<div style="clear:both;"></div>
													<div class="fleft">
													  <label>&nbsp;<span>&nbsp;</span></label>
													  <?php
													  	if($blog_category_id=="")
														{
													  ?>
													  <div class="submit">
														<input type="submit" name="submit" value="Submit" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer; " onClick=""/>
													  </div>
													  <?php
													  	}else{
													  ?>
													  <div class="submit">
														<input type="submit" name="submit" value="Update" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer; " onClick=""/>
													  </div>
													  <?php
													  	}
													  ?>
													  <div class="submit">
														<input type="button" name="cancel" value="Cancel" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer;" onClick="location.href='<?php echo base_url(); ?>blog/list_blog_category'"/>
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