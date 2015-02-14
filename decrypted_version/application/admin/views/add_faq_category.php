<div id="con-tabs">
          <ul>
            <li><span style="cursor:pointer;"><?php echo anchor('faq_category/list_faq_category','FAQ Categories','id="sp_1" style="color:#364852;background:#ececec;"'); ?></span></li>            
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
													$attributes = array('name'=>'frm_faq_category');
													echo form_open('faq_category/add_faq_category',$attributes);
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
													  <label>Parent<span>&nbsp;</span></label>
													  <span onMouseOver="show_bg('parent_id')" onMouseOut="hide_bg('parent_id')">
													 <select name="parent_id" id="parent_id">
														  <option value="0">Main Category</option>				  
														  <?php echo $all_category; ?>		   
														   
													  </select>
													  </span>
													</div>
													<div style="clear:both;"></div>
													<div class="fleft">
													  <label>FAQ Category Name<span>&nbsp;</span></label>
													  <span onMouseOver="show_bg('faq_category_name')" onMouseOut="hide_bg('faq_category_name')">
													  <input type="text" name="faq_category_name" id="faq_category_name" value="<?php echo $faq_category_name; ?>" onFocus="show_bg('faq_category_name')" onBlur="hide_bg('faq_category_name')"/>
													  </span>
													</div>
													<div style="clear:both;"></div>
													
													
													
													
													
													
													
									<?php /*?>				
													
														<div class="fleft">
									  <label>Show On Help<span>&nbsp;</span></label>
									 <span onmouseover="show_bg('faq_category_home')" onmouseout="hide_bg('faq_category_home')">
									<div style="float:right;">
									<table  cellpadding="2" cellspacing="2" border="0" >
									<tr>
									<td align="left" valign="top" width="20"><input type="radio" name="faq_category_home" id="faq_category_home" value="1" <?php if($faq_category_home=='1') { ?> checked="checked" <?php } ?> style="width:20px;" /> </td><td align="left" valign="top"> Yes </td>
									
									<td align="left" valign="top" width="20"><input type="radio" name="faq_category_home" id="faq_category_home" value="0" <?php if($faq_category_home=='0') { ?> checked="checked" <?php } ?> style="width:20px;"/> </td><td align="left" valign="top"> No</td>
									
									
									</tr>
									</table>
									</div>
									 </span> 
									</div>
									<div style="clear:both;"></div><?php */?>
													
<input type="hidden" name="faq_category_home" id="faq_category_home" value="<?php echo $faq_category_home;?>" />				
													
							<div class="fleft">
						  <label>Order<span>&nbsp;</span></label>
						  <span onMouseOver="show_bg('faq_category_order')" onMouseOut="hide_bg('faq_category_order')">
						  <input type="text" name="faq_category_order" id="faq_category_order" value="<?php echo $faq_category_order; ?>" onFocus="show_bg('faq_category_order')" onBlur="hide_bg('faq_category_order')"/>
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
													  <span onMouseOver="show_bg('faq_category_id')" onMouseOut="hide_bg('faq_category_id')">
													  <input type="hidden" name="faq_category_id" id="faq_category_id" value="<?php echo $faq_category_id; ?>" />
													  <input type="hidden" name="offset" id="offset" value="<?php echo $offset; ?>" />
													  </span>
													</div>
													<div style="clear:both;"></div>
													<div class="fleft">
													  <label>&nbsp;<span>&nbsp;</span></label>
													  <input type="hidden" name="faq_category_url_name" id="faq_category_url_name" value="<?php echo $faq_category_url_name; ?>" />
													  <?php
													  	if($faq_category_id=="")
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
														<input type="button" name="cancel" value="Cancel" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer;" onClick="location.href='<?php echo site_url('faq_category/list_faq_category'); ?>'"/>
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