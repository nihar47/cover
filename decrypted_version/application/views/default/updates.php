<div id="headerbar">
	<div class="wrap930">
	
	<!-- dd menu -->	
<div class="login_navl">
	
			
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tr><td align="left" >	
	<div class="project_title_hd" style="padding-top:15px;" >
	
	
	<span style="text-transform:capitalize;color:#2B5F94;font-size:17px;"><?php echo $this->session->userdata('project_title'); ?></span>
	
	</div>
	</td>
	<td align="right" >	
	
	<div class="project_title_hd" style="padding-top:15px; "  >
	<span id="sddm" style="float:right;">
		
		<?php if($this->session->userdata['project_id']!='' && $this->session->userdata['project_id']!=0) {  ?>
		
	 <?php echo anchor('user/my_project/',CHANGE_PROJECT,' style="text-transform:capitalize;color:#2B5F94;font-size:17px;text-decoration:none;" '); ?>
	
		<?php } ?>
		
	</span>
	</div>

</td></tr></table>

		  </div> 
		      
		<div class="clear"></div>
	</div>
</div>	
<div id="container">
<div class="wrap930" style="padding:15px 0px 20px 0px;">	

<!--side bar user panel-->

<?php echo $this->load->view('default/dashboard_sidebar'); ?>

<!--side bar user panel-->


<div class="con_left2" style="min-height:0px; width:690px; margin-right:0px;">
           			
              
<style type="text/css">

#tab_all a{ color:#000000; text-decoration:none; }

</style>				


<?php
	$data['tab_sel'] = UPDATES;
	$this->load->view('default/overview_tabs',$data);

?>

<script type="text/javascript">

function showaddbox()
{
	$('#add_update').css('display','block');
		
}

function show_reply(id)
{
	if(id!='')
	{
		document.getElementById(id).style.display='block';						
	}		
}
		
</script>
	 
  <!-- jQuery and jQuery UI -->
	<script src="<?php echo base_url(); ?>editor/js/jquery-1.4.4.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="<?php echo base_url(); ?>editor/js/jquery-ui-1.8.7.custom.min.js" type="text/javascript" charset="utf-8"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>editor/css/smoothness/jquery-ui-1.8.7.custom.css" type="text/css" media="screen" charset="utf-8">

    <!-- elRTE -->
    <script src="<?php echo base_url(); ?>editor/js/elrte.min.js" type="text/javascript" charset="utf-8"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>editor/css/elrte.min_front.css" type="text/css" media="screen" charset="utf-8">
    
    <!-- elFinder -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>editor/css/elfinder.css" type="text/css" media="screen" charset="utf-8" /> 
    <script src="<?php echo base_url(); ?>editor/js/elfinder.full.js" type="text/javascript" charset="utf-8"></script> 
    
 
    <script type="text/javascript" charset="utf-8">
        $(document).ready(function() {
		
		elRTE.prototype.options.panels.web2pyPanel = ['copy', 'cut', 'paste', 'pastetext', 'pasteformattext', 'removeformat','strikethrough','bold', 'italic', 'underline','link', 'unlink', 'anchor','insertorderedlist', 'insertunorderedlist', 'justifyleft', 'justifyright','justifycenter', 'justifyfull', 'forecolor','hilitecolor', 'formatblock','fontsize', 'fontname','image','elfinder'];
 elRTE.prototype.options.toolbars.web2pyToolbar = ['web2pyPanel'];
 
 
            var opts1 = {
                cssClass : 'el-rte',
                lang     : 'en',  // Set your language
                allowSource : 1,  // Allow user to view source
                height   : 250,   // Height of text area
                toolbar  : 'web2pyToolbar',   // Your options here are 'tiny', 'compact', 'normal', 'complete', 'maxi', or 'custom'
                cssfiles : ['<?php echo base_url(); ?>editor/css/elrte-inner.css'],
                // elFinder
                fmAllow  : 1,
                fmOpen : function(callback) {
                    $('<div id="myelfinder" />').elfinder({
                        url : '<?php echo base_url(); ?>editor/connectors/php/connector.php', //You must configure this file. Look for 'URL'.  
                        lang : 'en',
                        dialog : { width : 900, modal : true, title : 'Files' }, // Open in dialog window
                        closeOnEditorCallback : true, // Close after file select
                        editorCallback : callback     // Pass callback to file manager
                    })
                }
                //End of elFinder
            }
            
            $('.description').elrte(opts1);
            
        })
</script>	 
	
	  
	  
		   <div class="inner_content" style=" margin-top:11px;padding:12px;  ">
		         
				<div style="float:left;"><h3 id="dropmenu2"><?php echo REVIEW_UPDATE_TO_YOUR_FUNDS_BELOW; ?>.</h3></div>
				
				<div style="float:right;"><h3 class="add_text_buton" onclick="showaddbox();" style="cursor:pointer;"><?php echo ADD_NOW; ?></h3></div>
             <div style="clear:both;"></div>
			 
			 <div class="sidebar" id="add_update" style="width:100%;">
			<ul>
				<li style="border:none;">	
					<h3 class="title"><?php echo WRITE_YOUR_UPDATES ;?></h3>			
				  <div id="recent-donate-detail">
				
            		<div id="post-update">
				<span>	<?php
				  		$attributes = array('name'=>'frm_update');
						echo form_open_multipart('project/add_update',$attributes);
				    ?>
					</span>
				<span id="err_msg" style="color:#FF0000;"></span>
				
                   
                    <div style="background:#fff; width:600px; padding:2px;">
                                      
                                        
                                        
                                        <textarea id="updates" name="updates" cols="50" rows="4" class="description"></textarea></div>
                    
                    			 <?php
										/*$vals = array(
											'name' => 'updates',
											'id' => 'updates',
											'width' => '98%',
											'height' => '350px',
											'value' => '',
										);
										echo form_fckeditor($vals)."";*/
									  ?>
                                      
                                      
                                      
                    
                    
					
					<input type="hidden" name="project_id" id="project_id" value="<?php echo $this->session->userdata('project_id'); ?>"  />
					
					
<br />

					<input type="submit" class="submit" style="cursor:pointer;"  name="update_btn" id="updates_btn" value="Post Update" />
					
										
					
					</form>
				</div>    
			
				 
				<div style="clear:both;"></div>
				
				</div>
				</li>
			</ul>
			</div>
			 
			   <div class="clear"></div>
			 
			<?php if($updates) { ?>	   
              <div id="recent-donate-detail">
              
             
				<div id="donor-update">
					<ul>
					<?php
						$i = 0;
						if($updates)
						{
							foreach($updates as $up)
							{
								if($i%2 == '0')
								{
									$str = "class=''";
								}else{
									$str = "class='back'";
								}
					?>
						<li <?php echo $str; ?>>
						  <div class="right-content">
						  
						  
						 
						  
											  						  
							<em><?php echo date($site_setting['date_format'],strtotime($up['date_added'])); ?> <!--by--> <?php //echo $up['username']; ?></em>
							<br />
							<p style="text-align:left;"><?php 
							
								$up_content = $up['updates'];
					$up_content=str_replace('KSYDOU','"',$up_content);
				$up_content=str_replace('KSYSING',"'",$up_content); 
					
					echo $up_content;
							
							 ?></p>
							</div>
						  <div class="delete-content"><?php echo anchor('project/delete_update/'.$up['update_id'], '<img src="'.base_url().'images/delete.png" alt="" style="background:none;border:none;" title="'.DELETE .'" />', 'style="background:none;padding:0px;"'); ?></div>
						  <div class="clear"></div>
						    <div class="delete-content">							
							
							 <a href="javascript:void()" style="display:inline-block;background:none;border:1px solid #b4d7f9;padding:0px 3px;margin-right:10px;color:#114a75;text-decoration:none;" id="sts" onclick="show_reply(<?php echo $up['update_id']; ?>)"><?php echo EDIT;?></a>
							 
							 </div>
							 
							 
							 
							 	
					<div class="clear"></div>
					
				<div id="<?php echo $up['update_id']; ?>" style="width:600px;border:none;">
						
					<?php
				$attributes = array('name'=>'frmupupdate2');
				echo form_open_multipart('project/edit_updates/'.$up['update_id'],$attributes);
				
			?>       
						
					<table border="0" cellpadding="0" cellspacing="0" align="left" width="100%">	
					<tr><td align="left" valign="top" style="color:#FF0000;"><span id="err_msg2"></span></td></tr>
			<tr><td height="10" ></td></tr>
			
		
				
				
				 
				<tr>
				<td align="left" valign="top">
               
                        
                        
                         <?php
						 				$edit_up_content = $up['updates'];
					$edit_up_content=str_replace('KSYDOU','"',$edit_up_content);
				$edit_up_content=str_replace('KSYSING',"'",$edit_up_content); 
					
					 
					
									/*	$vals = array(
											'name' => 'upupdates'.$up['update_id'],
											'id' => 'upupdates'.$up['update_id'],
											'width' => '98%',
											'height' => '350px',
											'value' => $edit_up_content,
										);
										echo form_fckeditor($vals)."";*/
									  ?> 
                    <div style="background:#fff; width:600px; padding:2px;">
                                      
                                        
                                        
                                        <textarea id="<?php echo 'upupdates'.$up['update_id']; ?>" name="<?php echo 'upupdates'.$up['update_id']; ?>" cols="50" rows="4" class="description">
                                               <?php echo $edit_up_content; ?>
                                            </textarea></div>

</td>
				</tr>
				
				
				 <tr><td height="10" ></td></tr>
				
              <tr><td align="left" valign="top" >
		<input type="hidden" name="update_id" id="update_id" value="<?php echo $up['update_id']; ?>"  />	  
		<input type="hidden" name="project_id" id="project_id" value="<?php echo $this->session->userdata('project_id'); ?>"  />
		<input type="hidden" name="username" id="username"  value="<?php echo $this->session->userdata('user_name'); ?>"/>
        <input type="hidden" name="email" id="email"  value="<?php echo $this->session->userdata('email'); ?>"/>
        
           
			 
              <input type="submit" class="submit" value="<?php echo POST_UPDATE; ?>" name="postreply" id="postreply"   style="cursor:pointer;"  />
			  
			  </td></tr>
			  
			  <tr><td height="10" ></td></tr>
			  </table>
			  
            </form>		
					
					</div>
					<div class="clear"></div>
							 
						  
						  
						</li>
					<?php
								$i++;
							}
						}
					?>
					</ul>
				</div>
				<div style="clear:both;"></div>
				<div  align="left" style="line-height:20px; padding-left:250px; font-size:11px;"><?php echo $page_link; ?></div>
				</div>
				
			<?php } else { ?>
			
			
			<div class="clear"></div>
			
			<div align="center"><?php echo NO_UPDATES; ?>.</div>
			
			<div class="clear"></div>
			
			<?php } ?>	
				
		</div>
		
		
		
		
		</div>
			
			
			
				
				
				<div class="clear"></div>		
				
				
					</div>
	<!-- left end ------>
		
       </div>
   