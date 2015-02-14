



<div id="con-tabs">
          <ul>
            <li><span style="cursor:pointer;"><?php echo anchor('idea/list_idea','Fund Ideas','id="sp_1" style="color:#364852;background:#ececec;"'); ?></span></li>            
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
										$attributes = array('name'=>'frm_idea');
										echo form_open_multipart('idea/add_idea',$attributes);
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
										  <label>Idea Name<span>&nbsp;</span></label>
										  <span onmouseover="show_bg('idea_name')" onmouseout="hide_bg('idea_name')">
										  <input type="text" name="idea_name" id="idea_name" value="<?php echo $idea_name; ?>" onfocus="show_bg('idea_name')" onblur="hide_bg('idea_name')"/>
										  </span>
										</div>
										<div style="clear:both;"></div>
										
										<div class="fleft">
										  <label>Idea Image<span>&nbsp;</span></label>
										  <span onmouseover="show_bg('photo')" onmouseout="hide_bg('photo')">
							 <input type="file" name="photo" id="photo"  onfocus="show_bg('photo')" onblur="hide_bg('photo')"/>
										  
							 <input type="hidden" name="prev_image" id="prev_image" value="<?php echo $idea_image; ?>" />
										  
										  </span>
										</div>
										<div style="clear:both;"></div>
										
										<div class="fleft">
										  <label>Idea Description<span>&nbsp;</span></label>
										  <span onmouseover="show_bg('idea_description')" onmouseout="hide_bg('idea_description')">
										  <textarea name="idea_description" id="idea_description"  onfocus="show_bg('idea_description')" onblur="hide_bg('idea_description')"><?php echo $idea_description; ?></textarea>
										  
							
										  
										  </span>
										</div>
										<div style="clear:both;"></div>
										
										
										
									
										<div class="fleft">
										  <label>Status<span>&nbsp;</span></label>
										 <!-- <span onmouseover="show_bg('active')" onmouseout="hide_bg('active')">-->
                                         <span>
										  <select name="active" id="active" class="btn_input_select">
											<option value="0" <?php if($active=='0'){ echo "selected"; } ?>>Inactive</option>
											<option value="1" <?php if($active=='1'){ echo "selected"; } ?>>Active</option>														
										  </select>
										  </span>
										</div>
										<div style="clear:both;"></div>
										<div class="fleft">
										  <label>&nbsp;<span>&nbsp;</span></label>
										  <span onmouseover="show_bg('idea_id')" onmouseout="hide_bg('idea_id')">
										  <input type="hidden" name="idea_id" id="idea_id" value="<?php echo $idea_id; ?>" />
										  <input type="hidden" name="offset" id="offset" value="<?php echo $offset; ?>" />
										  </span>
										</div>
										<div style="clear:both;"></div>
										<div class="fleft">
										  <label>&nbsp;<span>&nbsp;</span></label>
										 
										 								  
										  
										 
										  <?php
											if($idea_id=="")
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
											<input type="button" name="cancel" value="Cancel" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer;" onClick="location.href='<?php echo site_url('idea/list_idea'); ?>'"/>
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