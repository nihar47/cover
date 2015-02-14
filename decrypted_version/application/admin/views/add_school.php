<?php
$CI =& get_instance();	
$base_url = $CI->config->slash_item('base_url_site');											
$base_path = $CI->config->slash_item('base_path');
?>
	

<div id="con-tabs">
          <ul>
            <li><span style="cursor:pointer;"><?php echo anchor('school/list_school','School','id="sp_1" style="color:#364852;background:#ececec;"'); ?></span></li>            
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
													$attributes = array('name'=>'frm_school');
													echo form_open('school/add_school',$attributes);
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
													  <label>Title<span>&nbsp;</span></label>
													  <span onMouseOver="show_bg('title')" onMouseOut="hide_bg('title')">
													  <input type="text" name="title" id="title" value="<?php echo $title; ?>" onFocus="show_bg('title')" onBlur="hide_bg('title')"/>
													  </span>
													</div>
													<div style="clear:both;"></div>
													
													
														<div class="fleft">
													  <label>Order<span>&nbsp;</span></label>
													  <span onMouseOver="show_bg('school_order')" onMouseOut="hide_bg('school_order')">
													  <input type="text" name="school_order" id="school_order" value="<?php echo $school_order; ?>" onFocus="show_bg('school_order')" onBlur="hide_bg('school_order')"/>
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
                                        
                                        
                                        <textarea id="description" name="description" >
                                                <?php echo $description; ?>
                                            </textarea></div>
													 
													</div>
													<div style="clear:both;"></div>
													
													<div class="fleft">
													  <label>&nbsp;<span>&nbsp;</span></label>
													  <span onMouseOver="show_bg('school_id')" onMouseOut="hide_bg('school_id')">
													  <input type="hidden" name="school_id" id="school_id" value="<?php echo $school_id; ?>" />
													  
													   <input type="hidden" name="school_url_title" id="school_url_title" value="<?php echo $school_url_title; ?>" />
													  <input type="hidden" name="offset" id="offset" value="<?php echo $offset; ?>" />
													  </span>
													</div>
													<div style="clear:both;"></div>
													<div class="fleft">
													  <label>&nbsp;<span>&nbsp;</span></label>
													  <?php
													  	if($school_id=="")
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
														<input type="button" name="cancel" value="Cancel" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer;" onClick="location.href='<?php echo site_url('school/list_school'); ?>'"/>
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