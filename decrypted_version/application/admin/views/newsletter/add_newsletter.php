<?php
$CI =& get_instance();	
$base_url = $CI->config->slash_item('base_url_site');											
$base_path = base_path();
?>

<script type="text/javascript" language="javascript">
function setchecked(elemName,status){
	elem = document.getElementsByName(elemName);
	for(i=0;i<elem.length;i++){
		elem[i].checked=status;
	}
}


function get_project_details(str)
{
	if(str=='')
	{
		return false;
	}
	
		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else if(window.ActiveXObject) {
			try {
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
			} catch (e) {
				try {
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (e) {
					xmlhttp = false;
				}
			}
		}
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{				
				//var orig_content = document.getElementsByTagName('iframe')[0].contentWindow.document.body.innerHTML;				
				//document.getElementsByTagName('iframe')[0].contentWindow.document.body.innerHTML=orig_content + xmlhttp.responseText;
				
				document.getElementsByTagName('iframe')[0].contentWindow.document.body.innerHTML=xmlhttp.responseText;
				
				
			}
		}
		
		
		
		var url = '<?php echo site_url('newsletter/get_project_template'); ?>/'+str+'/<?php echo strtotime(date('H:i:s')); ?>';
		
		xmlhttp.open("GET",url,true);
		xmlhttp.send(null);
	
}



</script>

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
                                                    height   : 600,   // Height of text area
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
                                                
                                                $('#template_content').elrte(opts1);
                                                
                                            })
                                        </script>
<div id="con-tabs">
          <ul>
            <?php  
		
		$chk_newsletter_list=$this->home_model->get_rights('list_newsletter');
		$chk_list_newsletter_user=$this->home_model->get_rights('list_newsletter_user');
		$chk_newsletter_setting=$this->home_model->get_rights('newsletter_setting');
		$chk_newsletter_job=$this->home_model->get_rights('newsletter_job');		
		
				
		
			if($chk_newsletter_list==1) {		?>
		   
		    <li><span style="cursor:pointer;"><?php echo anchor('newsletter/list_newsletter','Newsletters','id="sp_1" style="color:#364852;background:#ececec;"'); ?></span></li>
			
			 <?php } if($chk_list_newsletter_user==1) { ?>
			
			<li><span style="cursor:pointer;"><?php echo anchor('newsletter/list_newsletter_user','Newsletter User'); ?></span></li>
			
				<?php } if($chk_newsletter_job==1) { ?>
			
			<li><span style="cursor:pointer;"><?php echo anchor('newsletter/newsletter_job','Newsletter Job'); ?></span></li>
			
			<?php }   if($chk_newsletter_setting==1) { ?>
			
			<li><span style="cursor:pointer;"><?php echo anchor('newsletter/newsletter_setting','Settings'); ?></span></li>
			
			<?php } ?>
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
									$attributes = array('name'=>'frm_login');
									echo form_open_multipart('newsletter/add_newsletter',$attributes);
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
									  <label>Subject<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('subject')" onmouseout="hide_bg('subject')">
									  <input type="text" name="subject" id="subject" value="<?php echo $subject; ?>" onfocus="show_bg('subject')" onblur="hide_bg('subject')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									
									<div class="fleft">
									  <label>Attach File<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('file_up')" onmouseout="hide_bg('file_up')">
									  <input type="file" name="file_up" id="file_up" value="<?php echo $file_up; ?>" onfocus="show_bg('file_up')" onblur="hide_bg('file_up')"/>
						 <input type="hidden" name="prev_attach_file" id="prev_attach_file" value="<?php echo $prev_attach_file; ?>" />
							  
						<?php   if(is_file($base_path.'upload/newsletter/'.$prev_attach_file)) { ?>
						
					<div style="padding:7px; float:left;"><a href="<?php echo upload_url().'upload/newsletter/'.$prev_attach_file;?>" target="_blank" style="color:#666666;">View Attachment</a></div>
						
						<?php } ?>
									  </span>
									</div>
									<div style="clear:both;"></div>
									
									
									
									<div class="fleft">
									  <label>Allow Subscribe Link<span>&nbsp;</span></label>
									 <span onmouseover="show_bg('allow_subscribe_link')" onmouseout="hide_bg('allow_subscribe_link')">
									<div style="float:right;">
									<table  cellpadding="2" cellspacing="2" border="0" >
									<tr>
									<td align="left" valign="top" width="20"><input type="radio" name="allow_subscribe_link" id="allow_subscribe_link" value="1" <?php if($allow_subscribe_link=='1') { ?> checked="checked" <?php } ?> style="width:20px;" /> </td><td align="left" valign="top"> Yes </td>
									
									<td align="left" valign="top" width="20"><input type="radio" name="allow_subscribe_link" id="allow_subscribe_link" value="0" <?php if($allow_subscribe_link=='0') { ?> checked="checked" <?php } ?> style="width:20px;"/> </td><td align="left" valign="top"> No</td>
									
									
									</tr>
									</table>
									</div>
									 </span> 
									</div>
									<div style="clear:both;"></div>
									
									
								
								<div class="fleft">
									  <label>Allow Unsubscribe Link<span>&nbsp;</span></label>
									 <span onmouseover="show_bg('allow_unsubscribe_link')" onmouseout="hide_bg('allow_unsubscribe_link')">
									<div style="float:right;">
									<table  cellpadding="2" cellspacing="2" border="0" >
									<tr>
									<td align="left" valign="top" width="20"><input type="radio" name="allow_unsubscribe_link" id="allow_unsubscribe_link" value="1" <?php if($allow_unsubscribe_link=='1') { ?> checked="checked" <?php } ?> style="width:20px;" /> </td><td align="left" valign="top"> Yes </td>
									
									<td align="left" valign="top" width="20"><input type="radio" name="allow_unsubscribe_link" id="allow_unsubscribe_link" value="0" <?php if($allow_unsubscribe_link=='0') { ?> checked="checked" <?php } ?> style="width:20px;"/> </td><td align="left" valign="top"> No</td>
									
									
									</tr>
									</table>
									</div>
									 </span> 
									</div>
									<div style="clear:both;"></div>
								
									
								
								
							<?php
								if($newsletter_id=="")
								{
							  ?>	
									
								<div class="fleft">
									  <label>Subscribe To<span>&nbsp;</span></label>
									 <span onmouseover="show_bg('subscribe_to')" onmouseout="hide_bg('subscribe_to')">
									<div style="float:right;">
									<table  cellpadding="2" cellspacing="2" border="0" >
									<tr>
									
									
									<td align="left" valign="top" width="20">
									<input type="radio" name="subscribe_to" id="subscribe_to" value="none" <?php if($subscribe_to=='none') { ?> checked="checked" <?php } ?> style="width:20px;" /> </td>
									<td align="left" valign="top"> None </td>
									
									
									<td align="left" valign="top" width="20">
									<input type="radio" name="subscribe_to" id="subscribe_to" value="all" <?php if($subscribe_to=='all') { ?> checked="checked" <?php } ?> style="width:20px;" /> </td>
									<td align="left" valign="top"> All </td>
											
									
									
									</tr>
									</table>
									</div>
									 </span> 
									</div>
									<div style="clear:both;"></div>
									
							
							<?php } ?>		
										
									
									
									
									<div class="fleft">
									  <label>Project<span>&nbsp;</span></label>
									 
									 <select name="project_id" id="project_id" onChange="get_project_details(this.value)">
									 <option value="">---Select---</option>
									 <?php if($all_project) { 
									 	
												foreach($all_project as $pr) { ?>
												
									<option value="<?php echo $pr->project_id; ?>" <?php if($pr->project_id==$project_id) { ?> selected="selected" <?php } ?> style="text-transform:capitalize;"><?php echo $pr->project_title; ?></option>				 							 
									 
									 <?php } } else { ?>
									 
									 <option value="">---No Projects---</option>
									 
									 <?php } ?>
									 
									 
									 </select>
									 							 
									  </span>
									</div>
									<div style="clear:both;"></div>
									
									
									
									
									
									
					
					
					
							
									<div id="letter_part">
									  <label>Content<span>&nbsp;</span></label>
									  
							
	 
									
									<textarea id="template_content" name="template_content"><?php echo $template_content; ?> </textarea>	 
									  
									
									</div>
									<div style="clear:both;"></div>
									
							
									
									
									
									
									
									
									
									
									<div class="fleft">
									  <label>&nbsp;<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('newsletter_id')" onmouseout="hide_bg('newsletter_id')">
									  <input type="hidden" name="newsletter_id" id="newsletter_id" value="<?php echo $newsletter_id; ?>" />
									  <input type="hidden" name="offset" id="offset" value="<?php echo $offset; ?>" />
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>&nbsp;<span>&nbsp;</span></label>
									  <?php
										if($newsletter_id=="")
										{
									  ?>
									  <div class="submit">
										<input type="submit" name="submit" value="Submit" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer; " />
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
										<input type="button" name="cancel" value="Cancel" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer;" onClick="location.href='<?php echo site_url('newsletter/list_newsletter'); ?>'"/>
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