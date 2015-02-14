<script type="text/javascript">
		
		function show_reply(id)
		{
			if(id!='')
			{
				document.getElementById(id).style.display='block';						
			}		
		}
		
		function show_edit(id)
		{
			if(id!='')
			{
				document.getElementById('edit'+id).style.display='block';						
			}		
		}
				
</script>


 
      <link href="<?php echo base_url(); ?>create.css" rel="stylesheet" type="text/css" />
     
     
     <?php $CI =& get_instance();	$base_url = $CI->config->slash_item('base_url_site');
	 
	 		$base_path = base_path();
	 
	 ?>
	
    
    <div id="con-tabs"> 
    			
	
	
     <ul>
            <li><span style="cursor:pointer;"><?php echo anchor('project_category/comment/'.$project_id,'Comment','id="sp_2" style="color:#364852;background:#ececec;"'); ?></span></li>
          </ul>
    
    
    <div id="text">  

				 <?php if($msg!='') { ?>
				  <div align="center" class="comment_msg">
				  <?php if($msg=='reported') { ?>Spam reported successfully.
				  <?php } if($msg=='reply') { ?>Reply to comment Successfully.
				  <?php } if($msg=='approve') { ?>Comment Approved Successfully.
				  <?php } if($msg=='decline') { ?>Comment Declined Successfully.
				  <?php } if($msg=='delete') { ?>Comment Deleted Successfully.
				  <?php } if($msg=='update') { ?>Comment Updated Successfully.
				  <?php } ?>
				  
				 </div>
				 <?php } ?>


	<?php if($comments) { ?>	
		
              <div id="recent-donate-detail">
              
				
				<div id="donor-update" style="text-align:left;">
					
					<ul>
					<?php
						$i = 0;
						if($comments)
						{
							foreach($comments as $cmt)
							{
								if($i%2 == '0')
								{
									$str = "class=''";
								}else{
									$str = "class='back'";
								}
					?>
						<li <?php echo $str; ?> style="width:1028px;">
						
						  <div class="right-content">
						  <?php if(is_file($base_path."upload/thumb/".$cmt['image'])) { ?>
						  <img src="<?php echo upload_url(); ?>upload/thumb/<?php echo $cmt['image']; ?>" alt="" width="65" height="51" /> 
						  <?php } else {?>
						    <img src="<?php echo upload_url(); ?>upload/orig/no_man.gif" alt="" width="65" height="51" /> 
							<?php } ?>
							
							<em><?php echo date($site_setting['date_format'],strtotime($cmt['date_added'])); echo "&nbsp;&nbsp;By&nbsp;"; ?>
                            
                            <a href="<?php echo front_base_url().'member/'.$cmt['user_id'];?>" target="_blank" style="background:none; color: #999; padding:0px;">
                             <?php echo $cmt['user_name']; ?>
                             </a>
                             </em><br />
							 
							 <em style="font-style:normal;">IP : <?php echo $cmt['comment_ip']; ?></em><br/>
							 
							 
							<?php if($cmt['status']==0){ ?><em style="color:#990000;">pendding approval</em>
							
							 <?php } if($cmt['status']==1){ ?><em style="color:#009900;">approved</em><?php } ?><br />


						 <?php echo $cmt['comments']; ?><br />
							
							</div>
						
						 
						 <div class="delete-content"><?php echo anchor('project_category/delete_comments/'.$cmt['comment_id'].'/'.$offset, '<img src="'.base_url().'images/delete.png" alt="" style="background:none;border:none;" title="Delete Comment" />', 'style="background:none;padding:0px;"'); ?></div>
						 	 
							 
							 <div class="delete-content">
							
							<?php   if($cmt['status']==0) { ?>
							 <a href="<?php echo site_url('project_category/approve_comment/'. $cmt['comment_id'].'/'.$offset);?>" style="display:inline-block;background:none;border:1px solid #b4d7f9;padding:0px 3px;margin-right:10px;color:#114a75;text-decoration:none;" id="sts" title="Approve Comment">Approve</a>
							 
							 <?php } if($cmt['status']==1) { ?>
							  <a href="<?php echo site_url('project_category/declined_comment/'.$cmt['comment_id'].'/'.$offset);?>" style="display:inline-block;background:none;border:1px solid #b4d7f9;padding:0px 3px;margin-right:10px;color:#114a75;text-decoration:none;" id="sts" title="Declined Comment" >Declined</a>
							  <?php } ?>
							  
							  
							   <a href="#" style="display:inline-block;background:none;border:1px solid #b4d7f9;padding:0px 3px;margin-right:10px;color:#114a75;text-decoration:none;" id="sts" onclick="show_edit(<?php echo $cmt['comment_id']; ?>)">Edit</a>
							  
							 <a href="#" style="display:inline-block;background:none;border:1px solid #b4d7f9;padding:0px 3px;margin-right:10px;color:#114a75;text-decoration:none;" id="sts" onclick="show_reply(<?php echo $cmt['comment_id']; ?>)">Reply</a>
							 
							  <a href="<?php echo site_url('project_category/report_spam/'.$cmt['comment_id'].'/'.$offset);?>" style="display:inline-block;background:none;border:1px solid #b4d7f9;padding:0px 3px;margin-right:10px;color:#114a75;text-decoration:none;" id="sts" title="Report Spam" >Report Spam</a>
							 
							 </div>
							 
							 
							  				
	
					<div class="clear"></div>
					
					<div <?php echo $str; ?> id="<?php echo $cmt['comment_id']; ?>" style="width:600px;display:none;border:none;">
						
							
					<table border="0" cellpadding="0" cellspacing="0" align="left">	
					<tr><td align="left" valign="top" style="color:#FF0000;"><span id="err_msg<?php echo $cmt['comment_id']; ?>"></span></td></tr>
			<tr><td height="10" ></td></tr>
			
			<?php
				$attributes = array('name'=>'frmreplycomment'.$cmt['comment_id']);
				echo form_open('project_category/reply_comment',$attributes);
			?>       
				<tr>
				<td align="left" valign="top">
                <textarea name="comments<?php echo $cmt['comment_id']; ?>" id="comments<?php echo $cmt['comment_id']; ?>" class="big_addbox" style="width:600px;"></textarea></td>
				</tr>
				
				 <tr><td height="10" ></td></tr>
				
              <tr><td align="left" valign="top" >
		<input type="hidden" name="comment_id" id="comment_id" value="<?php echo $cmt['comment_id']; ?>"  />	  
		<input type="hidden" name="project_id" id="project_id" value="<?php echo $project_id; ?>"  />
		<input type="hidden" name="offset" id="offset" value="<?php echo $offset; ?>"  />
		
			 
          <input type="button" class="submit" value="Post Reply" name="postreplytype<?php echo $cmt['comment_id']; ?>" id="postreplytype<?php echo $cmt['comment_id']; ?>" onclick="if(document.getElementById('comments<?php echo $cmt['comment_id']; ?>').value==''){ document.getElementById('err_msg<?php echo $cmt['comment_id']; ?>').innerHTML='<?php echo 'Please Enter Text'; ?>';return false; }else { document.frmreplycomment<?php echo $cmt['comment_id']; ?>.submit();   }"  style="cursor:pointer;"  />
			  
			  </td></tr>
			  
			  <tr><td height="10" ></td></tr>
			  </table>
			  
            </form>		
					
					</div>
					<div class="clear"></div>
					
								 
							 
							 	
				
					
				<div id="edit<?php echo $cmt['comment_id']; ?>" style="width:600px;display:none;border:none;">
						
							
					<table border="0" cellpadding="0" cellspacing="0" align="left" width="100%">	
					<tr><td align="left" valign="top" style="color:#FF0000;"><span id="err_msg2"></span></td></tr>
			<tr><td height="10" ></td></tr>
			
			<?php
				$attributes = array('name'=>'frmupupdate2');
				echo form_open_multipart('project_category/edit_comments/'.$cmt['comment_id'],$attributes);
			?>       
			
				
				 
				 
				<tr>
				<td align="left" valign="top">
                <textarea name="up_comments" id="up_comments"  style="width:100%; height:150px; padding: 10px 10px 10px 10px;-moz-border-radius: 8px;
-webkit-border-radius: 8px;background: #FAFAFA;border: 1px solid lightGrey;"><?php echo $cmt['comments']; ?></textarea></td>
				</tr>
				
				
				 <tr><td height="10" ></td></tr>
				
              <tr><td align="left" valign="top" >
		<input type="hidden" name="update_id" id="update_id" value="<?php echo $cmt['comment_id']; ?>"  />	  
		<input type="hidden" name="project_id" id="project_id" value="<?php echo $project_id; ?>"  />
	<input type="hidden" name="offset" id="offset" value="<?php echo $offset; ?>"  />
			 
          <input type="submit" class="submit" value="Edit Comment" name="editpostreply" id="editpostreply"   style="cursor:pointer;"  />
			  
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
                
                
				 <div align="center" style="clear:both; float:left; margin-left:450px;background:url(<?php echo base_url(); ?>images/table-f-bg.jpg) top left repeat-x; -moz-border-radius:8px;
	-webkit-border-radius:8px;width:200px; border:1px solid #002B2B; height:30px;"> 
		
        <table align="center">	<tr><td align="center" valign="top"><?php echo $page_link; ?></td></tr></table>
        
        </div>
        
				</div>
				
			<?php } else { ?>
			
			
			<div class="clear"></div>
			
			<div align="center"><b>No Comments.</b></div>
			
			<div class="clear"></div>
			
			<?php } ?>	
            
            
            
   </div></div>