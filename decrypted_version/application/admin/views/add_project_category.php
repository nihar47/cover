<script type="text/javascript" src="<?php echo site_url('js') ?>/jscolor/jscolor.js"></script>
<script type="text/javascript">
function get_sub_categories(){
		$('#sub_parent_project_category_id').empty();
		$("#sub_parent_project_category_id").prepend("<option value='0' selected='selected'>Select Sub-category</option>");
		var cat = $('select#parent_project_category_id').val();
		
		if(cat != 0){
			  $.ajax({
				type: 'post',
				url: 'get_sub_categories',
				dataType: 'json',
				data:'categoryid='+cat,  
				success: function(data) 
					  {
						 
					    for (var i in data.sub_categories) {
							//alert(data.sub_categories[i].project_category_id);
						$('#sub_parent_project_category_id').append('<option value='+data.sub_categories[i].project_category_id+'>'+ data.sub_categories[i].project_category_name +'</option>');
						}
					 }
     			 });
			}
}
</script>
<div id="con-tabs">
          <ul>
            <li><span style="cursor:pointer;"><?php echo anchor('project_category/list_project_category','Project Categories','id="sp_1" style="color:#364852;background:#ececec;"'); ?></span></li>            
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
													$attributes = array('name'=>'frm_project_category');
													echo form_open('project_category/add_project_category',$attributes);
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
												  <label>Parent Category<span>&nbsp;</span></label>
												  <span  onchange="get_sub_categories()" onMouseOver="show_bg('parent_project_category_id')" onMouseOut="hide_bg('parent_project_category_id')">
			<?php /*echo "<pre>";
			print_r($all_parent_category); die;*/ ?>									 
		 <select name="parent_project_category_id" id="parent_project_category_id">
			  <option value="0">Main Category</option>	
				 <?php if($all_parent_category!=''){
				  foreach($all_parent_category as $pc){ ?>	
					<?php   if($parrent_category_id == $pc['project_category_id'])
							{ $sel='selected="selected"'; } else {$sel='';} ?>
						  <option value="<?php echo $pc['project_category_id']; ?>" <?php echo $sel;?>><?php echo $pc['project_category_name']; ?></option>
                          <?php if(!empty($pc['children'])) {
							  foreach($pc['children'] as $child){
								 	if($parrent_category_id == $child['project_category_id']){
										 $sel='selected="selected"'; } 
									else { $sel=''; } ?>
									<option value="<?php echo $child['project_category_id']; ?>" <?php echo $sel;?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;<?php echo $child['project_category_name']; ?></option>
								<?php  }
							  }?>
                          <?php }
					} ?>
												  </select>
								  </span>
												</div>		
                                                
                                                	<!--<div class="fleft">
												  <label>Sub Parent Category<span>&nbsp;</span></label>
												  <span onMouseOver="show_bg('sub_parent_project_category_id')" onMouseOut="hide_bg('sub_parent_project_category_id')">
												 
												 <select name="sub_parent_project_category_id" id="sub_parent_project_category_id">
													 
													
												  </select>
												  </span>
												</div>-->												
													<div class="fleft">
													  <label>Project Category Name<span>&nbsp;</span></label>
													  <span onMouseOver="show_bg('project_category_name')" onMouseOut="hide_bg('project_category_name')">
													  <input type="text" name="project_category_name" id="project_category_name" value="<?php echo $project_category_name; ?>" onFocus="show_bg('project_category_name')" onBlur="hide_bg('project_category_name')"/>
													  </span>
													</div>
													
													<div class="fleft">
													  <label>Category Color Code<span>&nbsp;</span></label>
													  <span onMouseOver="show_bg('category_color_code')" onMouseOut="hide_bg('category_color_code')">
													  	<input class="color" type="text" name="category_color_code" id="category_color_code" value="<?php echo $category_color_code; ?>"></span>
													</div>
													
													
													<div style="clear:both;"></div>
													<div class="fleft">
													  <label>Status<span>&nbsp;</span></label>
													  <span onMouseOver="show_bg('active')" onMouseOut="hide_bg('active')">
													  <select name="active" id="active">
													  	<option value="0" <?php  if($active=='0'){ echo "selected"; } ?>>Inactive</option>
														<option value="1" <?php  if($active=='1'){ echo "selected"; } ?>>Active</option>														
													  </select>
													  </span>
													</div>
													<div style="clear:both;"></div>
													<div class="fleft">
													  <label>&nbsp;<span>&nbsp;</span></label>
													  <span onMouseOver="show_bg('project_category_id')" onMouseOut="hide_bg('project_category_id')">
													  <input type="hidden" name="project_category_id" id="project_category_id" value="<?php echo $project_category_id; ?>" />
													  <input type="hidden" name="offset" id="offset" value="<?php echo $offset; ?>" />
													  </span>
													</div>
													<div style="clear:both;"></div>
													<div class="fleft">
													  <label>&nbsp;<span>&nbsp;</span></label>
													  <?php
													  	if($project_category_id=="")
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
														<input type="button" name="cancel" value="Cancel" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer;" onClick="location.href='<?php echo site_url('project_category/list_project_category'); ?>'"/>
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