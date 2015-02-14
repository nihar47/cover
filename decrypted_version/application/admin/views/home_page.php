<div id="con-tabs">
          <ul>
            <li><span style="cursor:pointer;"><?php echo anchor('pages/home_page','Home Page','id="sp_1" style="color:#364852;background:#ececec;"'); ?></span></li>            
          </ul>
          <div id="text">
            <div id="1">
             <?php if($error != "")
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
									$attributes = array('name'=>'frm_homepage');
									echo form_open('pages/home_page',$attributes);
								  ?>
									<fieldset class="step">
									<div class="fleft">
									  <label>Title<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('home_title')" onmouseout="hide_bg('home_title')">
									  <input type="text" name="home_title" id="home_title" value="<?php echo $home_title; ?>" onfocus="show_bg('home_title')" onblur="hide_bg('home_title')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div>
									  <label>Description<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('home_description')" onmouseout="hide_bg('home_description')">
									  <?php
										$vals = array(
											'name' => 'home_description',
											'id' => 'home_description',
											'width' => '68%',
											'height' => '400px',
											'value' => $home_description,
										);
										echo form_fckeditor($vals)."";
									  ?>
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
									  <span onmouseover="show_bg('home_id')" onmouseout="hide_bg('home_id')">
									  <input type="hidden" name="home_id" id="home_id" value="<?php echo $home_id; ?>" />
									
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>&nbsp;<span>&nbsp;</span></label>
									  <?php
										if($home_id=="")
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