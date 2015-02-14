<script type="text/javascript">
$(document).ready(function(){

	$(".msg_body").hide();
	//toggle the componenet with class msg_body
	$(".msg_head").click(function(){
		$(this).next(".msg_body").slideToggle(600);
});});

function check_comment_len(){

	var comment = document.getElementById('conversation').value;
	
	var rep = comment;
	var len = rep.length;
	if(len<15){
		
		document.getElementById('len_err1').style.display='block';
		return false;
	}
		document.getElementById('len_err1').style.display='none';
		return true;

}
</script>
<!--******************Section********************-->
<section>
<div id="page_we">
	<div class="message">
		<?php echo anchor('inbox','<img src="'.base_url().'images/back-inbox-icon.png" />','style="float:left;"'); ?>
		<!--<a href="#" class="rback"><img src="<?php // echo base_url() ?>images/back-inbox-icon.png" /></a>-->
		<h2 class="contname">Inbox</h2>
		<div class="mess_cont">
			<div class="mess_cont_top">
			<table width="100%" cellpadding="0" cellspacing="0">
			<tr>
			<td align="center">	<!--<ul class="mess_cont_top_left">
					<li><input type="checkbox" class="styled" />
						<a href="#" class="dropa" style="margin-top:8px;"><img src="<?php echo base_url() ?>images/mdrop.png"></a>
					</li>
					<li>
						<a href="#" class="dropa" style="margin-top:5px;"><img src="<?php echo base_url() ?>images/return.png"></a>
					</li>
					<li style="border:none">
						<a href="#" class="dropa" style="margin-top:3px;"><img src="<?php echo base_url() ?>images/mindel.png"></a>
					</li>
				</ul>--></td>
			<td align="center" style="padding:0 170px;	">	<!--<div class="mess_cont_top_center">
					<input type="text" placeholder="Search messages, users..." />
					<input type="submit" value="" />
					</div>-->	</td>
			<td align="center">	
			</td>
					
			</tr></table>
			</div>
			<div class="messagesection">
			<div class="messagesection_left">
			<?php $sender_in = get_user_detail($one_message->sender_id); ?>
			<h1><?php echo MESSAGE_CONVERSATION.' : '.$sender_in['user_name']." ".$sender_in['last_name'];?></h1>
			<?php $prj=get_one_project($one_message->project_id); ?>
			<p>(Project: <?php echo $prj['project_title']; ?>)</p>
			</div>
			<div class="messagesection_right">	
			<p><?php // echo date($site_setting['date_format'],strtotime($one_message->date_added));?></p>
			
			</div>
			<ul class="msglistul">
			
			 <?php if($message_replies){
			 foreach($message_replies as $msgrply){
			 	$sender_info = get_user_detail($msgrply->sender_id);
				$receiver_info = get_user_detail($msgrply->receiver_id);
			 ?>
			
				<li>	
					<?php 
						 if($sender_info['image']!='') {
                        if(is_file('upload/thumb/'.$sender_info['image'])){
                    ?>
                            <a href="<?php echo site_url('member/'.$sender_info['user_id']);?>"><img src="<?php echo base_url();?>upload/thumb/<?php echo $sender_info['image'];?>" alt=""   class="conimg"  /></a>
                            <?php } else { ?>
                           <a href="<?php echo site_url('member/'.$sender_info['user_id']);?>"> <img src="<?php echo base_url();?>upload/no_man.gif" class="conimg" alt=""  /></a>
                            <?php } } elseif($sender_info['tw_screen_name']!='' && $sender_info['tw_id']>0) { ?>
                    <a href="<?php echo site_url('member/'.$sender_info['user_id']);?>"><img src="http://api.twitter.com/1/users/profile_image?screen_name=<?php echo $sender_info['tw_screen_name']; ?>&size=bigger" alt=""  class="conimg"/></a>
                    <?php } elseif($sender_info['fb_uid']!='' && $sender_info['fb_uid']>0) { ?>
                    <a href="<?php echo site_url('member/'.$sender_info['user_id']);?>"><img src="http://graph.facebook.com/<?php echo $sender_info['fb_uid']; ?>/picture?type=large" lt=""  class="conimg"/></a>
                    <?php }  else { ?>
                            <a href="<?php echo site_url('member/'.$sender_info['user_id']);?>"><img src="<?php echo base_url();?>upload/orig/no_man.gif" lt="" class="conimg" /></a>
                    <?php }?>
				
					<!--<img src="<?php // echo base_url() ?>images/receiver.png" class="conimg" />-->
					<div class="msdetail">
					<a class="ach2" href="<?php echo site_url('member/'.$sender_info['user_id']);?>"><?php echo $sender_info['user_name'];?>(<?php if($msgrply->sender_id == $this->session->userdata('user_id')){echo 'receiver';} else { echo 'Sender'; }?>)</a>
					<?php if($msgrply->sender_id == $this->session->userdata('user_id')){?>
					<p style="float:right;"><?php echo date($site_setting['date_format'],strtotime($sender_info['date_added']));?> ( <?php echo getDuration($sender_info['date_added']) ?>)</p>
					 <?php }else{?>
					 <p style="float:right;"><?php echo date($site_setting['date_format'],strtotime($sender_info['date_added']));?> ( <?php echo getDuration($sender_info['date_added']) ?> ) </p>
					 <?php } ?>
					
					<div class="clr"></div>
					<p><?php echo $msgrply->message_content;?></p>
					</div>
				</li>
				
				
			<?php }  ?>
			<div class="clr"></div>
			<li>
				<?php
			
			//if($sendreply == 0){
			
			$attributes = array('name'=>'sitterconversation','id'=>'sitterconversation');
			echo form_open('inbox/message_reply',$attributes);
			?>
				
			<div class="msg_body">
				<div class="message_extend">
                 <p style="color:#f00; text-align:left; display:none" id="len_err1"><?php echo YOU_CANNOT_ADD_LESS_THAN_FIFTEEN_CHAR_MESSAGE; ?><br /></p><div class="clr"></div>
			</div>
				
			</div>
			<?php 
						 if($receiver_info['image']!='') {
                        if(is_file('upload/thumb/'.$receiver_info['image'])){
                    ?>
                            <a href="<?php echo site_url('member/'.$receiver_info['user_id']);?>"><img src="<?php echo base_url();?>upload/thumb/<?php echo $receiver_info['image'];?>" alt=""   class="conimg"  /></a>
                            <?php } else { ?>
                           <a href="<?php echo site_url('member/'.$receiver_info['user_id']);?>"> <img src="<?php echo base_url();?>upload/no_man.gif" class="conimg" alt=""  /></a>
                            <?php } } elseif($receiver_info['tw_screen_name']!='' && $receiver_info['tw_id']>0) { ?>
                    <a href="<?php echo site_url('member/'.$sender_info['user_id']);?>"><img src="http://api.twitter.com/1/users/profile_image?screen_name=<?php echo $sender_info['tw_screen_name']; ?>&size=bigger" alt=""  class="conimg"/></a>
                    <?php } elseif($receiver_info['fb_uid']!='' && $receiver_info['fb_uid']>0) { ?>
                    <a href="<?php echo site_url('member/'.$receiver_info['user_id']);?>"><img src="http://graph.facebook.com/<?php echo $receiver_info['fb_uid']; ?>/picture?type=large" lt=""  class="conimg"/></a>
                    <?php }  else { ?>
                            <a href="<?php echo site_url('member/'.$receiver_info['user_id']);?>"><img src="<?php echo base_url();?>upload/orig/no_man.gif" lt="" class="conimg" /></a>
                    <?php }?>
			
					
					<div class="msdetail" style="width:805px;">
					<textarea id="conversation" name="conversation"></textarea><div class="clr"></div>
					
                <input type="hidden" name="sender_id" id="sender_id" value="<?php echo $receiver_info['user_id'];?>"/>
                <input type="hidden" name="receiver_id" id="receiver_id" value="<?php echo $sender_info['user_id'];?>"/>
                
                <?php if($msgrply->reply_message_id == 0){?>
                 <input type="hidden" name="message_id" id="message_id" value="<?php echo $message_id;?>"/>
                <?php }else
				{?>
                 <input type="hidden" name="message_id" id="message_id" value="<?php echo $msgrply->reply_message_id;?>"/>
				 <?php }?>
					<input type="submit" value="Send" name="submit" class="cenbtn1" style="float:right;" id="submit" onclick="return check_comment_len();"/>
					</div>
				
				
			<?php // }?> 
			</li>	
			<?php }else{ ?>	
				<li><h2><?php echo NO_CONVERSION; ?></h2></li>
			<?php } ?>
				
			</ul>
			<div class="mess_cont_top_right">
					<?php echo $page_link; ?>
					</div>
			</div>
		</div>
	</div>
</div>
</section>

<!--******************Section********************-->