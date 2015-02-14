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
	 

<div data-role="header">
  <h1>COMMENTS </h1>
   <?php echo anchor('home','Home','class="ui-btn-left"'); ?> 
   <?php echo anchor('user/my_project/',CHANGE_PROJECT,'class="ui-btn-right"'); ?>
 </div>
 <div class="pad15">
  <h2> <span id="s1postJ"> <?php echo REVIEW_COMMENT_TO_YOUR_FUNDS_BELOW; ?></span></h2>
  <br>
  <div class="inner_content" style=" margin-top:11px;padding:12px; ">
		         
				  <?php if($msg!='') { ?>
				  <div align="center" class="comment_msg">
				  <?php if($msg=='reported') { ?><?php echo SPAM_REPORTED_SUCCESSFULLY; ?>.
				  <?php } if($msg=='reply') { ?><?php echo REPLY_TO_COMMENT_SUCCESSFULLY; ?>.
				  <?php } if($msg=='approve') { ?><?php echo COMMENT_APPROVED_SUCCESSFULLY; ?>.
				  <?php } if($msg=='decline') { ?><?php echo COMMENT_DECLINE_SUCCESSFULLY; ?>.
				  <?php } if($msg=='delete') { ?><?php echo COMMENT_DELETED_SUCCESSFULLY; ?>.
				  <?php } if($msg=='update') { ?><?php echo COMMENT_UPDATED_SUCCESSFULLY; ?>.
				  <?php } ?>
				  
				 </div>
				 <?php } ?>
				  
				  
			 <div class="clear"></div>
		          
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
						<li <?php echo $str; ?>>
						
						  <div class="right-content">
						  <?php if(is_file("upload/thumb/".$cmt['image'])) { ?>
						  <img src="<?php echo base_url(); ?>upload/thumb/<?php echo $cmt['image']; ?>" alt="" width="65" height="51" /> 
						  <?php } else {?>
						    <img src="<?php echo base_url(); ?>upload/orig/no_man.gif" alt="" width="65" height="51" /> 
							<?php } ?>
							
							<em><?php echo date($site_setting['date_format'],strtotime($cmt['date_added'])); echo "&nbsp;&nbsp;By&nbsp;"; echo anchor('member/'.$cmt['user_id'],$cmt['user_name']); ?></em><br />
						<em style="font-style:normal;">IP : <?php echo $cmt['comment_ip']; ?></em><br/>
							<?php if($cmt['status']==0){ ?><em style="color:#990000;"><?php echo PENDING_APPROVAL; ?></em>
							
							 <?php } if($cmt['status']==1){ ?><em style="color:#009900;"><?php echo APPROVED;?></em><?php } ?><br />


						  <?php echo $cmt['comments']; ?><br />
							
							</div>
						
						 
						 <div class="delete-content">
						 
						 <?php echo anchor('project/delete_comment/'.$cmt['comment_id'].'/'.$offset, '<img src="'.base_url().'images/delete.png" alt="" style="background:none;border:none;" title="'.DELETE.'" />', 'style="background:none;padding:0px;"'); ?></div>
						 	 
							 
							 <div class="delete-content">
							
							<?php   if($cmt['status']==0) { 
							
							echo anchor('project/approve_comment/'.$cmt['comment_id'].'/'.$offset,APPROVED,'style="display:inline-block;background:none;border:1px solid #b4d7f9;padding:0px 3px;margin-right:10px;color:#114a75;text-decoration:none;" id="sts" title="'.APPROVED.'"');
							
							} if($cmt['status']==1) { 
							 
							 echo anchor('project/declined_comment/'.$cmt['comment_id'].'/'.$offset,DECLINED,'style="display:inline-block;background:none;border:1px solid #b4d7f9;padding:0px 3px;margin-right:10px;color:#114a75;text-decoration:none;" id="sts" title="'.DECLINED.'"');
							 
							 
							  } 
							  
							  ?>
                              
							  
                                <a href="javascript:void(0)" style="display:inline-block;background:none;border:1px solid #b4d7f9;padding:0px 3px;margin-right:10px;color:#114a75;text-decoration:none;" id="sts" onclick="show_edit(<?php echo $cmt['comment_id']; ?>)"><?php echo EDIT; ?></a>
							  
							 <a href="javascript:void(0)" style="display:inline-block;background:none;border:1px solid #b4d7f9;padding:0px 3px;margin-right:10px;color:#114a75;text-decoration:none;" id="sts" onclick="show_reply(<?php echo $cmt['comment_id']; ?>)"><?php echo REPLY; ?></a>
                             
                             
                              
                           
							  <?php
							  echo anchor('project/report_spam/'.$cmt['comment_id'].'/'.$offset,REPORT_SPAM,'style="display:inline-block;background:none;border:1px solid #b4d7f9;padding:0px 3px;margin-right:10px;color:#114a75;text-decoration:none;" id="sts" title="'.REPORT_SPAM.'"');
							  
							  ?>
							  
							  
							 
							 </div>
							 
							 
							  				
	
					<div class="clear"></div>
					
					<div <?php echo $str; ?> id="<?php echo $cmt['comment_id']; ?>" style="display:none;border:none;">
						
							
					<table border="0" cellpadding="0" cellspacing="0" align="left">	
					<tr><td align="left" valign="top" style="color:#FF0000;"><span id="err_msg<?php echo $cmt['comment_id']; ?>"></span></td></tr>
			<tr><td height="10" ></td></tr>
			
			<?php
				$attributes = array('name'=>'frmreplycomment'.$cmt['comment_id'],'id'=>'rply'.$cmt['comment_id']);
				echo form_open('project/reply_comment',$attributes);
			?>       
				<tr>
				<td align="left" valign="top">
                <textarea name="comments<?php echo $cmt['comment_id']; ?>" id="comments<?php echo $cmt['comment_id']; ?>" class="big_addbox"></textarea></td>
				</tr>
				
				 <tr><td height="10" ></td></tr>
				
              <tr><td align="left" valign="top" >
		<input type="hidden" name="comment_id" id="comment_id" value="<?php echo $cmt['comment_id']; ?>"  />	  
		<input type="hidden" name="project_id" id="project_id" value="<?php echo $this->session->userdata('project_id'); ?>"  />
	<input type="hidden" name="offset" id="offset" value="<?php echo $offset; ?>"  />
			 
          <input type="button" class="submit" value="<?php echo POST_REPLY; ?>" name="postreplytype<?php echo $cmt['comment_id']; ?>" id="postreplytype<?php echo $cmt['comment_id']; ?>" onclick="if(document.getElementById('comments<?php echo $cmt['comment_id']; ?>').value==''){ document.getElementById('err_msg<?php echo $cmt['comment_id']; ?>').innerHTML='<?php echo PLEASE_ENTER_TEXT; ?>';return false; }else { document.getElementById('<?php echo 'rply'.$cmt['comment_id'];?>').submit(); }"  style="cursor:pointer;"  />
			  
			  </td></tr>
			  
			  <tr><td height="10" ></td></tr>
			  </table>
			  
            </form>		
					
					</div>
					<div class="clear"></div>
							 	
				
					
				<div id="edit<?php echo $cmt['comment_id']; ?>" style="display:none;border:none;">
						
							
					<table border="0" cellpadding="0" cellspacing="0" align="left" width="100%">	
					<tr><td align="left" valign="top" style="color:#FF0000;"><span id="err_msg2"></span></td></tr>
			<tr><td height="10" ></td></tr>
			
			<?php
				$attributes = array('name'=>'frmupupdate2','id'=>'cmt'.$cmt['comment_id']);
				echo form_open_multipart('project/edit_comment/'.$cmt['comment_id'].'/'.$offset,$attributes);
			?>       
			
				<tr>
				<td align="left" valign="top">
                <textarea name="up_comments" id="up_comments"  style="width:100%; height:150px; padding: 10px 10px 10px 10px;-moz-border-radius: 8px;
-webkit-border-radius: 8px;background: #FAFAFA;border: 1px solid lightGrey;"><?php echo $cmt['comments']; ?></textarea></td>
				</tr>
				
				
				 <tr><td height="10" ></td></tr>
				
              <tr><td align="left" valign="top" >
		<input type="hidden" name="update_id" id="update_id" value="<?php echo $cmt['comment_id']; ?>"  />	  
		<input type="hidden" name="project_id" id="project_id" value="<?php echo $this->session->userdata('project_id'); ?>"  />
		<input type="hidden" name="offset" id="offset" value="<?php echo $offset; ?>"  />
			 
          <input type="submit" class="submit" value="<?php echo EDIT_COMMENT; ?>" name="editpostreply" id="editpostreply"   style="cursor:pointer;" onclick="document.getElementById('<?php echo 'cmt'.$cmt['comment_id'];?>').submit();" />
			  
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
			
			<div align="center"><?php echo NO_COMMENTS;?>.</div>
			
			<div class="clear"></div>
			
			<?php } ?>	
			
			
		</div>
 </div>