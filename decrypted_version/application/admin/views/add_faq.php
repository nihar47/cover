<?php
$CI =& get_instance();	
$base_url = $CI->config->slash_item('base_url_site');											
$base_path = $CI->config->slash_item('base_path');
?>

<div id="con-tabs">
          <ul>
            <li><span style="cursor:pointer;"><?php echo anchor('faq/list_faq','FAQ','id="sp_1" style="color:#364852;background:#ececec;"'); ?></span></li>            
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
													$attributes = array('name'=>'frm_faq');
													echo form_open('faq/add_faq',$attributes);
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
													  <label>Category<span>&nbsp;</span></label>
													  <span onMouseOver="show_bg('faq_category_id')" onMouseOut="hide_bg('faq_category_id')">
													  <select name="faq_category_id" id="faq_category_id">
													  	<option value=""> -- Select One -- </option>
														<?php
															foreach($category as $p)
															{
																if($p->parent_id == '0')
																{
														?>
														<optgroup label="---<?php echo $p->faq_category_name; ?>---"></optgroup>
														<?php		
																}else{
														?>
														<option value="<?php echo $p->faq_category_id; ?>" <?php if($p->faq_category_id == $faq_category_id){ echo "selected"; } ?>><?php echo $p->faq_category_name; ?></option>
														<?php		
																}
															}
														?>
													  </select>
													  </span>
													</div>
													<div style="clear:both;"></div>
													
													
													
													
													
													
													<div class="fleft">
									  <label>Show On Help<span>&nbsp;</span></label>
									 <span onmouseover="show_bg('faq_home')" onmouseout="hide_bg('faq_home')">
									<div style="float:right;">
									<table  cellpadding="2" cellspacing="2" border="0" >
									<tr>
									<td align="left" valign="top" width="20"><input type="radio" name="faq_home" id="faq_home" value="1" <?php if($faq_home=='1') { ?> checked="checked" <?php } ?> style="width:20px;" /> </td><td align="left" valign="top"> Yes </td>
									
									<td align="left" valign="top" width="20"><input type="radio" name="faq_home" id="faq_home" value="0" <?php if($faq_home=='0') { ?> checked="checked" <?php } ?> style="width:20px;"/> </td><td align="left" valign="top"> No</td>
									
									
									</tr>
									</table>
									</div>
									 </span> 
									</div>
									<div style="clear:both;"></div>
													
													
													
							<div class="fleft">
						  <label>Order<span>&nbsp;</span></label>
						  <span onMouseOver="show_bg('faq_order')" onMouseOut="hide_bg('faq_order')">
						  <input type="text" name="faq_order" id="faq_order" value="<?php echo $faq_order; ?>" onFocus="show_bg('faq_order')" onBlur="hide_bg('faq_order')"/>
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
						  <label>Question<span>&nbsp;</span></label>
						  <span onMouseOver="show_bg('question')" onMouseOut="hide_bg('question')">
						  <input type="text" name="question" id="question" value="<?php echo $question; ?>" onFocus="show_bg('question')" onBlur="hide_bg('question')"/>
						  </span>
						</div>
						<div style="clear:both;"></div>
													
													
						<div class="fleft">
						  <label>Answer<span>&nbsp;</span></label>
						
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
                                                
                                                $('#answer').elrte(opts1);
                                                
                                            })
                                        </script>
                                        
                                        
                                        <textarea id="answer" name="answer" cols="50" rows="4">
                                                <?php echo $answer; ?>
                                            </textarea></div>
						
						<div style="clear:both;"></div>
													
													
												
													<div class="fleft">
													  <label>&nbsp;<span>&nbsp;</span></label>
													  <span onMouseOver="show_bg('faq_id')" onMouseOut="hide_bg('faq_id')">
													  <input type="hidden" name="faq_id" id="faq_id" value="<?php echo $faq_id; ?>" />
													  <input type="hidden" name="offset" id="offset" value="<?php echo $offset; ?>" />
													  </span>
													</div>
													<div style="clear:both;"></div>
													<div class="fleft">
													  <label>&nbsp;<span>&nbsp;</span></label>
													  <?php
													  	if($faq_id=="")
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
														<input type="button" name="cancel" value="Cancel" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer;" onClick="location.href='<?php echo site_url('faq/list_faq'); ?>'"/>
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