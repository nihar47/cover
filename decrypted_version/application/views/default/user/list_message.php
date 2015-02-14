<script>
function setchecked(elemName){
	
	var chkstat = document.getElementById('chkstat').value;
	//alert(chkstat);
	elem = document.getElementsByName(elemName);
	for(i=0;i<elem.length;i++){
		if(chkstat==0){
			elem[i].checked=1;
		
		}else{
			elem[i].checked=0;
			
		}
		
		
	}
	if(chkstat==0){
			document.getElementById('chkstat').value=1;
		}else{
			document.getElementById('chkstat').value=0;
		}
}

function setaction(elename, actionval, actionmsg, formname) {
	vchkcnt=0;
	elem = document.getElementsByName(elename);
	
	for(i=0;i<elem.length;i++){
		if(elem[i].checked) vchkcnt++;	
	}
	if(vchkcnt==0) {
		alert('Please select a record')
	} else {
		
		if(confirm(actionmsg))
		{
			document.getElementById('action').value=actionval;	
			document.getElementById(formname).submit();
		}		
		
	}
}


</script>
<section>
 <?php
		 	$attributes = array('name'=>'frm_listmsg','id'=>'frm_listmsg');
			echo form_open('inbox/delete_msg/', $attributes);
		 ?>
<input type="hidden" name="chkstat" id="chkstat" value="0" />
<input type="hidden" name="action" id="action" />
<div id="page_we">
	<div class="message">
		<h2 class="contname"><?php echo MY_INBOX; ?></h2>
		<div class="mess_cont">
			<div class="mess_cont_top">
			<table width="100%" cellspacing="0" cellpadding="0">
			<tbody><tr>
			<td align="center">	<ul class="mess_cont_top_left">
					<li><input type="checkbox"  onclick="javascript:setchecked('chk[]')" title="<?php echo SELECT_ALL; ?>">
						<a style="margin-top:8px;" class="dropa" href="#"><img src="<?php echo base_url(); ?>images/mdrop.png"></a>
					</li>
					<li>
						<a style="margin-top:5px;" class="dropa" href="javascript://" title="<?php echo RELOAD; ?>" onclick="document.location.reload(true)"><img src="<?php echo base_url(); ?>images/return.png"></a>
					</li>
					<li style="border:none">
						<a style="margin-top:3px;" class="dropa" href="javascript://" onclick="setaction('chk[]','delete', 'Are you sure, you want to delete selected message(s)?', 'frm_listmsg')" title="<?php echo DELETE; ?>"><img src="<?php echo base_url(); ?>images/mindel.png"></a>
					</li>
				</ul></td>
			<td align="center" style="padding:0 170px;	">	<!--<div class="mess_cont_top_center">
					<input type="text" placeholder="Search messages, users...">
					<input type="submit" value="">
					</div>	--></td>
			
					
			</tr></tbody></table>
			</div>
			<div class="messagesection">

			<ul class="inboxlistul">
			
			<?php if($mymessage){
			foreach($mymessage as $msg) {
				
				$sender_image = get_user_detail($msg->sender_id);
				$get_unread_replies = $this->inbox_model->get_unread_replies($msg->message_id); 
				?> 
							<li <?php if(($msg->is_read == 0 && $msg->sender_id != get_authenticateUserID()) || $get_unread_replies==1){?>
                         id="unread"
                            <?php } ?>>	
							<input type="checkbox" name="chk[]" class="checkbox" id="chk" value="<?php echo $msg->message_id;?>" />
							 <a href="<?php echo site_url('inbox/conversation/'.$msg->message_id);?>" style="text-align:left;">
								
								<div class="msdetail">
								<?php
						   ?>
						   		
								<h1><?php echo getUserNamebyid($msg->sender_id);?><?php if(($msg->is_read == 0 && $msg->sender_id != get_authenticateUserID()) || $get_unread_replies==1){?>
                           <span class="new_msg" ><?php echo "New"//NEW; ?></span>
                            <?php } ?></h1>
								<p style="float:right; width:auto;"><?php echo date($site_setting['date_format'],strtotime($sender_image['date_added']));?>(<?php echo getDuration($sender_image['date_added']) ?>)</p><div class="clr"></div>
								<?php $prj=get_one_project($msg->project_id); ?>
								<p style="margin:5px 0;">Project: <?php echo $prj['project_id']; ?> </p><div class="clr"></div>
								<?php $tot_con=$this->inbox_model->get_message_detail_count($msg->message_id); ?>
								<label><?php if($tot_con!=""){ echo $tot_con;}else{ echo 0;} ?></label>
								<p class="pdesc"><?php echo $msg->message_content; ?></p>
								</div></a>
								
							</li>
							
							
				<?php } }else{ ?>
				<li><?php echo NO_MESSAGE; ?></li>
				<?php } ?>
				
				
			</ul>
			<div style="margin-top:20px;" class="mess_cont_top_right">
					<?php echo $page_link; ?>
				
					</div>
			</div>
		</div>
	</div>
</div>
</form>
</section>