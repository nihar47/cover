<div id="con-tabs">
          <ul>
            <li><span style="cursor:pointer;"><?php echo anchor('pages/list_pages','Pages','id="sp_1" style="color:#364852;background:#ececec;"'); ?></span></li>            
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
								
								<?php $CI =& get_instance();	$base_url = $CI->config->slash_item('base_url_site');
											$base_path = $CI->config->slash_item('base_path');
								 ?>
								
								  <?php
									$attributes = array('name'=>'frm_pages');
									echo form_open('pages/add_pages',$attributes);
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
									  <label>Pages Title<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('pages_title')" onmouseout="hide_bg('pages_title')">
									  <input type="text" name="pages_title" id="pages_title" value="<?php echo $pages_title; ?>" onfocus="show_bg('pages_title')" onblur="hide_bg('pages_title')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									
									<?php if($pages_id!='') { ?>
									
									<!--<div class="fleft">
									  <label>Pages URL<span>&nbsp;</span></label>
									
									<?php //echo anchor($base_url.'home/content/'.strtolower(str_replace(' ','-',$pages_title)).'/'.$pages_id,$base_url.'home/content/'.strtolower(str_replace(' ','-',$pages_title)).'/'.$pages_id,' target="_balnk" '); ?>
									  
									</div>
									<div style="clear:both;"></div>-->
									
									<?php } ?>
									
									<div>
									  <label>Description<span>&nbsp;</span></label>
										<div style="background:#fff; float:left; width:600px; padding:2px;">
                                        <!-- jQuery and jQuery UI -->
										<script src="<?php echo upload_url(); ?>editor/js/jquery-1.4.4.min.js" type="text/javascript" charset="utf-8"></script>
                                        <script src="<?php echo upload_url(); ?>editor/js/jquery-ui-1.8.7.custom.min.js" type="text/javascript" charset="utf-8"></script>
                                        <link rel="stylesheet" href="<?php echo upload_url(); ?>editor/css/smoothness/jquery-ui-1.8.7.custom.css" type="text/css" media="screen" charset="utf-8">
                                
                                        <!-- elRTE -->
                                        <script src="<?php echo upload_url(); ?>editor/js/elrte.min.js" type="text/javascript" charset="utf-8"></script>
                                        <link rel="stylesheet" href="<?php echo upload_url(); ?>editor/css/elrte.min.css" type="text/css" media="screen" charset="utf-8">
                                        
                                        <!-- elFinder -->
                                        <link rel="stylesheet" href="<?php echo upload_url(); ?>editor/css/elfinder.css" type="text/css" media="screen" charset="utf-8" /> 
                                        <script src="<?php echo upload_url(); ?>editor/js/elfinder.full.js" type="text/javascript" charset="utf-8"></script> 
                                        
                                     
                                        <script type="text/javascript" charset="utf-8">
                                            jQuery().ready(function() {
											
											
													elRTE.prototype.options.panels.web2pyPanel = ['save','copy', 'cut', 'paste', 'pastetext', 'pasteformattext', 'removeformat','undo', 'redo','strikethrough','bold', 'italic', 'underline', 'subscript', 'superscript','link', 'unlink', 'anchor','insertorderedlist', 'insertunorderedlist', 'justifyleft', 'justifyright','justifycenter', 'justifyfull', 'forecolor','hilitecolor', 'outdent', 'indent','horizontalrule', 'blockquote', 'div', 'stopfloat', 'css', 'nbsp', 'smiley', 'pagebreak','ltr', 'rtl','table', 'tableprops', 'tablerm',  'tbrowbefore', 'tbrowafter', 'tbrowrm', 'tbcolbefore', 'tbcolafter', 'tbcolrm', 'tbcellprops', 'tbcellsmerge', 'tbcellsplit','formatblock','fontsize', 'fontname','image', 'flash','elfinder','fullscreen'];
 elRTE.prototype.options.toolbars.web2pyToolbar = ['web2pyPanel'];
 
 
 
                                                var opts1 = {
                                                    cssClass : 'el-rte',
                                                    lang     : 'en',  // Set your language
                                                    allowSource : 1,  // Allow user to view source
                                                    height   : 450,   // Height of text area
                                                    toolbar  : 'web2pyToolbar',   // Your options here are 'tiny', 'compact', 'normal', 'complete', 'maxi', or 'custom'
                                                    cssfiles : ['<?php echo upload_url(); ?>editor/css/elrte-inner.css'],
                                                    // elFinder
                                                    fmAllow  : 1,
                                                    fmOpen : function(callback) {
                                                        $('<div id="myelfinder" />').elfinder({
                                                            url : '<?php echo upload_url(); ?>editor/connectors/php/connector.php', //You must configure this file. Look for 'URL'.  
                                                            lang : 'en',
                                                            dialog : { width : 900, modal : true, title : 'Files' }, // Open in dialog window
                                                            closeOnEditorCallback : true, // Close after file select
                                                            editorCallback : callback     // Pass callback to file manager
                                                        })
                                                    }
                                                    //End of elFinder
                                                }
                                                
                                                $('#description').elrte(opts1);
                                                
                                            })
                                        </script>
                                        
                                        
                                        <textarea id="description" name="description" cols="50" rows="4">
                                                <?php echo $description; ?>
                                            </textarea></div>
									</div>
									<div style="clear:both;"></div>
									
									
									<!--<div class="fleft">
									  <label>External URL<span>&nbsp;</span></label>
									
									 <input type="text" name="external_link" id="external_link" value="<?php //echo $external_link; ?>" onfocus="show_bg('external_link')" onblur="hide_bg('external_link')" style="width:350px;"/><br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(http:// is required)
									  
									</div>
									<div style="clear:both;"></div>-->
									
									
									 <input type="hidden" name="external_link" id="external_link" value="<?php echo $external_link; ?>"/>
                                      <input type="hidden" name="external_link" id="external_link" value="<?php echo $external_link; ?>"/>
                                      
									<div class="fleft">
									  <label>Display Place<span>&nbsp;</span></label>
									 <span onmouseover="show_bg('slug')" onmouseout="hide_bg('slug')">
									<div style="float:right;">
									<table  cellpadding="2" cellspacing="2" border="0" >
									<tr>
									<!--<td align="left" valign="top" width="20"><input type="checkbox" name="header_bar" id="header_bar" value="yes" <?php if($header_bar=='yes') { ?> checked="checked" <?php } ?> style="width:20px;" /> </td><td align="left" valign="top"> Header </td>-->
									
									<!--<td align="left" valign="top" width="20"><input type="checkbox" name="left_side" id="left_side" value="yes" <?php //if($left_side=='yes') { ?> checked="checked" <?php //} ?> style="width:20px;"/> </td><td align="left" valign="top">Left Side </td>
									
									<td align="left" valign="top" width="20"><input type="checkbox" name="right_side" id="right_side" value="yes" <?php //if($right_side=='yes') { ?> checked="checked" <?php //} ?> style="width:20px;"/></td><td align="left" valign="top"> Right Side </td>-->
									
									<td align="left" valign="top" width="20"><input type="checkbox" name="footer_bar" id="footer_bar" value="yes" <?php if($footer_bar=='yes') { ?> checked="checked" <?php } ?> style="width:20px;"/></td><td align="left" valign="top"> Footer </td>
                                    
                                    <td align="left" valign="top" width="20"><input type="checkbox" name="about_bar" id="about_bar" value="yes" <?php if($about_bar=='yes') { ?> checked="checked" <?php } ?> style="width:20px;"/></td><td align="left" valign="top"> About us </td>
                                    
                                    <td align="left" valign="top" width="20"><input type="checkbox" name="assistance_bar" id="assistance_bar" value="yes" <?php if($assistance_bar=='yes') { ?> checked="checked" <?php } ?> style="width:20px;"/></td><td align="left" valign="top"> Assistance </td>
									
									</tr>
									</table>
									</div>
									 </span> 
									</div>
									<div style="clear:both;"></div>
									
									
									
									
									
									<div class="fleft">
									  <label>Slug<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('slug')" onmouseout="hide_bg('slug')">
									  <input type="text" name="slug" id="slug" value="<?php echo $slug; ?>" onfocus="show_bg('slug')" onblur="hide_bg('slug')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Meta Keyword<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('meta_keyword')" onmouseout="hide_bg('meta_keyword')">
									  <input type="text" name="meta_keyword" id="meta_keyword" value="<?php echo $meta_keyword; ?>" onfocus="show_bg('meta_keyword')" onblur="hide_bg('meta_keyword')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Meta Description<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('meta_description')" onmouseout="hide_bg('meta_description')">
									  <input type="text" name="meta_description" id="meta_description" value="<?php echo $meta_description; ?>" onfocus="show_bg('meta_description')" onblur="hide_bg('meta_description')"/>
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
									  <span onmouseover="show_bg('pages_id')" onmouseout="hide_bg('pages_id')">
									  <input type="hidden" name="pages_id" id="pages_id" value="<?php echo $pages_id; ?>" />
									  <input type="hidden" name="offset" id="offset" value="<?php echo $offset; ?>" />
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>&nbsp;<span>&nbsp;</span></label>
									  <?php
										if($pages_id=="")
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
										<input type="button" name="cancel" value="Cancel" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer;" onClick="location.href='<?php echo site_url('pages/list_pages'); ?>'"/>
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