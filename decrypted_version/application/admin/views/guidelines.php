<?php
$CI =& get_instance();	
$base_url = front_base_url();											
$base_path = base_path();
?>

	

<div id="con-tabs">
          <ul>
            <li><span style="cursor:pointer;"><?php echo anchor('guide/guidelines','Guidelines','id="sp_1" style="color:#364852;background:#ececec;"'); ?></span></li>            
          </ul>
          <div id="text">
            <div id="1">
             <?php
			 		if($error != "")
						{?>
						<div align="center" class="msgdisp">Record has been updated Successfully.</div>
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
									$attributes = array('name'=>'frm_guidelines');
									echo form_open('guide/guidelines',$attributes);
								  ?>
									<fieldset class="step">
									<div class="fleft">
									  <label>Guidelines Title<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('guidelines_title')" onmouseout="hide_bg('guidelines_title')">
									  <input type="text" name="guidelines_title" id="guidelines_title" value="<?php echo $guidelines_title; ?>" onfocus="show_bg('guidelines_title')" onblur="hide_bg('guidelines_title')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									
									
									
									<div class="fleft">
									  <label>Meta Title<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('guidelines_meta_title')" onmouseout="hide_bg('guidelines_meta_title')">
									  <input type="text" name="guidelines_meta_title" id="guidelines_meta_title" value="<?php echo $guidelines_meta_title; ?>" onfocus="show_bg('guidelines_meta_title')" onblur="hide_bg('guidelines_meta_title')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									
									
									<div class="fleft">
									  <label>Meta Keyword<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('guidelines_meta_keyword')" onmouseout="hide_bg('guidelines_meta_keyword')">
									  <input type="text" name="guidelines_meta_keyword" id="guidelines_meta_keyword" value="<?php echo $guidelines_meta_keyword; ?>" onfocus="show_bg('guidelines_meta_keyword')" onblur="hide_bg('guidelines_meta_keyword')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									
									
									<div class="fleft">
									  <label>Meta Description<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('guidelines_meta_description')" onmouseout="hide_bg('guidelines_meta_description')">
									  <input type="text" name="guidelines_meta_description" id="guidelines_meta_description" value="<?php echo $guidelines_meta_description; ?>" onfocus="show_bg('guidelines_meta_description')" onblur="hide_bg('guidelines_meta_description')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
					
									
									
									
									
						<div class="fleft">
						  <label>Content<span>&nbsp;</span></label>
							<div style=" float:left; width:80%;  ">
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
                                                
                                                $('#guidelines_content').elrte(opts1);
                                                
                                            })
                                        </script>
                                        
                                        
                                        <textarea id="guidelines_content" name="guidelines_content" cols="50" rows="4" >
                                                <?php echo $guidelines_content; ?>
                                            </textarea></div>
						
						</div>
						<div style="clear:both;"></div>
						
						
								
									
								
									<div class="fleft">
									  <label>&nbsp;<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('guidelines_id')" onmouseout="hide_bg('guidelines_id')">
									  <input type="hidden" name="guidelines_id" id="guidelines_id" value="<?php echo $guidelines_id; ?>" />
									
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>&nbsp;<span>&nbsp;</span></label>
									  <?php
										if($guidelines_id=="")
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