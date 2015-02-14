<?php
$CI =& get_instance();	
$base_url = $CI->config->slash_item('base_url_site');											
$base_path = $CI->config->slash_item('base_path');
?>


	<!-- /TinyMCE -->		
			
<script type="text/javascript" src="<?php echo $base_url; ?>tiny_mce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",	
		

		// Theme options
		theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,cleanup,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "<?php echo $base_url; ?>tiny_mce/css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "<?php echo $base_url; ?>tiny_mce/lists/template_list.js",
		external_link_list_url : "<?php echo $base_url; ?>tiny_mce/lists/link_list.js",
		external_image_list_url : "<?php echo $base_url; ?>tiny_mce/lists/image_list.js",
		media_external_list_url : "<?php echo $base_url; ?>tiny_mce/lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		
	});
</script>


<!-- /TinyMCE -->
<div id="con-tabs">
          <ul>
            <li><span style="cursor:pointer;"><?php echo anchor('blog/list_blog','Blogs','id="sp_1" style="color:#364852;background:#ececec;"'); ?></span></li>            
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
							  <div align="left">
								<div id="add-deal">
								
								<?php $CI =& get_instance();	$base_url = $CI->config->slash_item('base_url_site');
											$base_path = $CI->config->slash_item('base_path');
								 ?>
								
								  <?php
									$attributes = array('name'=>'frm_pages');
									echo form_open('blog/add_blog',$attributes);
								  ?>
									<fieldset class="step">
									<?php
										if($error != "")
										{
											echo "<label style='width:700px;text-align:center;'><span>".$error."</span></label>";
											echo "<div class='vertical-line'></div>";
										}
									?>	
			                                   <div class="fleft" style="margin-left:150px;">
									  <h3>User Name :
									   <?php 
                                                                           $user=$this->blog_model->blog_user($user_id ); 
									           if($user)
                                                                                        {
                                                                                              echo $user->user_name;
echo "  ";
echo $user->last_name; 
                                                                                              ?><?php 
                                                                                         }
                                                                                   else
                                                                                         {
                                                                                              ?>
                                                                                              Admin Blog	
                                                                                              <?php
                                                                                          }
                                                                           ?>
   
									
							     </h3>  </div>
								<div style="clear:both;"></div>
						


												
									<div class="fleft">
									  <label>Blog Title :<span>&nbsp;</span></label>
									  <span onMouseOver="show_bg('blog_title')" onMouseOut="hide_bg('blog_title')">
									  <input type="text" name="blog_title" id="blog_title" value="<?php echo $blog_title; ?>" onFocus="show_bg('blog_title')" onBlur="hide_bg('blog_title')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>



									<?php if($blog_id > 0){?>			
									<div class="fleft">
									  <label>Date Added :<span>&nbsp;</span></label>
									  <span onMouseOver="show_bg('date_added')" onMouseOut="hide_bg('date_added')">
									  <input type="datetime" name="date_added" id="date_added" value="<?php echo $date_added; ?>" onFocus="show_bg('date_added')" onBlur="hide_bg('date_added')" disabled="disabled"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
                                    <?php }?>

																		
								
									
									<div>
<!--									  <label>Description :<span>&nbsp;</span></label>  -->
									  <span onMouseOver="show_bg('description')" onMouseOut="hide_bg('description')">
									  <?php
										/*$vals = array(
											'name' => 'description',
											'id' => 'description',
											'width' => '68%',
											'height' => '400px',
											'value' => '',
										);
										echo form_fckeditor($vals)."";*/
									  ?>
                                      <textarea name="description" id="description" rows="15" cols="80" style="width: 75%; height:400px;" ><?php echo $description; ?></textarea>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<br/>
									
								     <div class="fleft">
									  <label>Blog Category :<span>&nbsp;</span></label>
									  <span onMouseOver="show_bg('active')" onMouseOut="hide_bg('active')">
									  <select name="blog_category_id" id="blog_category_id">
                                      <option value="">---Select---</option>
										<?php
										 if($blog_category)
										 {
										    foreach($blog_category as $bc)
											{ 
										?>
                                        <option value="<?php echo $bc->blog_category_id;?>" <?php if($bc->blog_category_id==$blog_category_id){ ?>  selected="selected" <?php } ?>><?php echo $bc->blog_category_name; ?></option>								
									  <?php }}?>
                                      </select>
									  </span>
									</div>
									<div style="clear:both;"></div>
								
									<div class="fleft">
									  <label>Publish :<span>&nbsp;</span></label>
									  <span onMouseOver="show_bg('publish')" onMouseOut="hide_bg('publish')">
									<input type="checkbox" value="1" name="publish" id="publish" style="width:17px;" <?php if($publish==1){?> checked<?php } ?>>
									  </span>
									</div>
									<div style="clear:both;"></div>
									
									
									<div class="fleft">
									  <label>Comments Disabled : <span>&nbsp;</span></label>
									  <span onMouseOver="show_bg('no_one_comment')" onMouseOut="hide_bg('no_one_comment')">
									<input type="checkbox" value="1" name="no_one_comment" id="no_one_comment" style="width:17px;" <?php if($no_one_comment==1){?> checked<?php } ?>>
									  </span>
									</div>
									<div style="clear:both;"></div>
                                    
                                    <?php /*?><div class="fleft">
									  <label>Allow Anonymous To Comment :  <span>&nbsp;</span></label>
									  <span onMouseOver="show_bg('allow_anonymous')" onMouseOut="hide_bg('allow_anonymous')">
									<input type="checkbox" value="1" name="allow_anonymous" id="allow_anonymous" style="width:17px;" <?php if($allow_anonymous==1){?> checked<?php } ?>>
									  </span>
									</div>
									<div style="clear:both;"></div><?php */?>
								
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Status :<span>&nbsp;</span></label>
									  <span onMouseOver="show_bg('active')" onMouseOut="hide_bg('active')">
									  <select name="status" id="status">
										<option value="0" <?php if($status=='0'){ echo "selected"; } ?>>Inactive</option>
										<option value="1" <?php if($status=='1'){ echo "selected"; } ?>>Active</option>														
									  </select>
									  </span>
									</div>
									<div style="clear:both;"></div>
                                    
                                   <?php /*?><div class="fleft">
									  <label>Feature  Number :<span>&nbsp;</span></label>
									  <span onMouseOver="show_bg('feature_num')" onMouseOut="hide_bg('feature_num')">
									  <input type="text" name="feature_num" id="feature_num" value="<?php echo $feature_num; ?>" onFocus="show_bg('feature_num')" onBlur="hide_bg('feature_num')"/>
									  </span>
									</div>
									<div style="clear:both;"></div><?php */?>
                                   
                                    
                                     
									<div class="fleft">
									  <label>&nbsp;<span>&nbsp;</span></label>
									  <span onMouseOver="show_bg('pages_id')" onMouseOut="hide_bg('pages_id')">
									  <input type="hidden" name="blog_id" id="blog_id" value="<?php echo $blog_id; ?>" />
                                        <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id; ?>" />
									  <input type="hidden" name="offset" id="offset" value="<?php echo $offset; ?>" />
									  </span>
									</div>
									<div style="clear:both;"></div>
                                    
                                    
									<div class="fleft">
									  <label>&nbsp;<span>&nbsp;</span></label>
									  <?php
										if($blog_id=="")
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
										<input type="button" name="cancel" value="Cancel" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer;" onClick="location.href='<?php echo base_url(); ?>blog/list_blog'"/>
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