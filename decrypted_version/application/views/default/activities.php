
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

#sts:hover{ font-weight:bold; }
</style>				
			


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
	 
	 
	
	  
	  
		   <div class="inner_content" style=" margin-top:11px;padding:12px; ">
		         
				
			<h3 id="dropmenu2"><?php  echo REVIEW_ACTIVITY;?>. </h3>
             
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
		          
     	<?php if($activities) { ?>	
		
              <div id="recent-donate-detail">
              <style>
			  
.abc {
    float: left;
    width: 55px;
}
              </style>
				
				<div  id="user_activity"  style="text-align:left;">
					
					<ul>
					<?php
					$user_id = $this->session->userdata('user_id');
					
					$user_info = get_user_detail($user_id);
					
					
						$i = 0;
						if($activities)
						{
							foreach($activities as $cmt)
							{
								$act=$cmt->act;
								
					switch ($act)
					{
					case 'following':			
					?>
					  <li class="common_li2">
                        <div class="abc">
						<?php if($cmt->user_image !='' && is_file('upload/thumb/'.$cmt->user_image) ) { ?>
 <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/<?php echo $cmt->user_image; ?>" height="50" width="50" border="0" style=" border:1px solid lightGrey;" /></a>
<?php }else {
 ?> <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/no_man.gif" height="50" width="50" border="0" style=" border:1px solid lightGrey;" /></a>
<?php }  ?>					
							</div>
                            <div>
                            	<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>                                <div><?php echo FOLLOW_BY;?>: <a href="<?php echo site_url('member/'.$user_info['user_id']); ?>"><?php echo $user_info['user_name'];?>.</a>                                
                                </div>
                              	<div ><?php echo getDuration($cmt->activity_date);?></div>
                            </div>
                            <div class="clear"></div>
                        </li>
   	                 <?php
					 break;
				
					case 'follower' :?>
                  	  <li class="common_li2">
                        <div class="abc">
						<?php if($cmt->user_image !='' && is_file('upload/thumb/'.$cmt->user_image) ) { ?>
 <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/<?php echo $cmt->user_image; ?>" height="50" width="50" border="0" style=" border:1px solid lightGrey;" /></a>
<?php }else {
 ?> 

<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/no_man.gif" height="50" width="50" border="0" style=" border:1px solid lightGrey;" /></a>

<?php }  ?>					
							</div>
                        <div>
                            	<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>                                <div><?php echo FOLLOW;?>: <a href="<?php echo site_url('member/'.$user_info['user_id']); ?>"><?php echo $user_info['user_name'];?>.</a></div>                  
                              	<div ><?php echo getDuration($cmt->activity_date);?></div>
                            </div>
                         <div class="clear"></div>
                        </li>
                     
                     <?php break;
					 case 'user_own_comment':
					  $own_comment_project_data = get_one_project($cmt->custom_msg);
					 ?>
					 <li class="common_li2">
                        <div class="abc">
						<?php if($cmt->user_image !='' && is_file('upload/thumb/'.$cmt->user_image) ) { ?>
 <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/<?php echo $cmt->user_image; ?>" height="50" width="50" border="0" style=" border:1px solid lightGrey;" /></a>
<?php }else {
 ?> 

<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/no_man.gif" height="50" width="50" border="0" style=" border:1px solid lightGrey;" /></a>

<?php }  ?>					
							</div>
                        <div>
                            	<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>                                <div><?php echo MY_COMMENTS_TXT;?>: <a href="<?php echo site_url('projects/'.$own_comment_project_data['url_project_title'].'/'.$own_comment_project_data['project_id']); ?>"><?php echo $own_comment_project_data['project_title'];?></a></div>     <div><?php echo $cmt->custom_msg2;?>.</div>                  
                              	<div ><?php echo getDuration($cmt->activity_date);?></div>
                            </div>
                         <div class="clear"></div>
                        </li>
					 <?php 
					 break;
					 case 'followercomment':
					 $project_data = get_one_project($cmt->custom_msg2);
					 ?>
                        <li class="common_li2">
                        <div class="abc">
						<?php if($cmt->user_image !='' && is_file('upload/thumb/'.$cmt->user_image) ) { ?>
 <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/<?php echo $cmt->user_image; ?>" height="50" width="50" border="0" style=" border:1px solid lightGrey;" /></a>
<?php }else {
 ?> 

<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/no_man.gif" height="50" width="50" border="0" style=" border:1px solid lightGrey;" /></a>

<?php }  ?>					
							</div>
                        <div>
                            	<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>                                <div><?php echo COMMENT_ON_PROJECT;?>: <a href="<?php echo site_url('projects/'.$project_data['url_project_title'].'/'.$project_data['project_id']); ?>"><?php echo $project_data['project_title'];?></a></div>
                                 <div><?php echo MY_COMMENTS_TXT;?>: <?php echo $cmt->custom_msg;?></div>
                               <div><?php echo getDuration($cmt->activity_date);?></div>
                            </div>
                            <div class="clear"></div>
                        </li>
					 <?php 
					 break;
					 case 'signup'?>
                      <li class="common_li2">
                        <div class="abc">
						<?php if($cmt->user_image !='' && is_file('upload/thumb/'.$cmt->user_image) ) { ?>
 <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/<?php echo $cmt->user_image; ?>" height="50" width="50" border="0" style=" border:1px solid lightGrey;" /></a>
<?php }else {
 ?> 

<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/no_man.gif" height="50" width="50" border="0" style=" border:1px solid lightGrey;" /></a>

<?php }  ?>					
							</div>
                        <div>
                            	<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>                                <div><?php echo WELCOME;?>: <?php echo $cmt->user_name;?></div>
                               <div><?php echo getDuration($cmt->activity_date);?></div>
                            </div>
                            <div class="clear"></div>
                        </li>
					 <?php 
					  break;
					  case 'followuser_follow_project':
					  $project_follow_data = get_one_project($cmt->custom_msg);
					  ?>
					  <li class="common_li2">
                        <div class="abc">
						<?php if($cmt->user_image !='' && is_file('upload/thumb/'.$cmt->user_image) ) { ?>
 <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/<?php echo $cmt->user_image; ?>" height="50" width="50" border="0" style=" border:1px solid lightGrey;" /></a>
<?php }else {
 ?> 
<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/no_man.gif" height="50" width="50" border="0" style=" border:1px solid lightGrey;" /></a>

<?php }  ?>					
							</div>
                        <div>
                            	<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>                                <div><?php echo FOLLOW_PROJECT_TXT;?>: <a href="<?php echo site_url('projects/'.$project_follow_data['url_project_title'].'/'.$project_follow_data['project_id']); ?>"><?php echo $project_follow_data['project_title'];?></a></div>
                               <div><?php echo getDuration($cmt->activity_date);?></div>
                            </div>
                            <div class="clear"></div>
                        </li>
					  
					<?php 
					break;
					case 'own_follow_project':
					$own_project_data = get_one_project($cmt->custom_msg);
					?>
                    <li class="common_li2">
                        <div class="abc">
						<?php if($cmt->user_image !='' && is_file('upload/thumb/'.$cmt->user_image) ) { ?>
 <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/<?php echo $cmt->user_image; ?>" height="50" width="50" border="0" style=" border:1px solid lightGrey;" /></a>
<?php }else {
 ?> 
<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/no_man.gif" height="50" width="50" border="0" style=" border:1px solid lightGrey;" /></a>

<?php }  ?>					
							</div>
                        <div>
                            	<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>                                <div><?php echo PROJECT_FOLLOW_BY_ME;?>: <a href="<?php echo site_url('projects/'.$own_project_data['url_project_title'].'/'.$own_project_data['project_id']); ?>"><?php echo $own_project_data['project_title'];?></a></div>
                               <div><?php echo getDuration($cmt->activity_date);?></div>
                            </div>
                            <div class="clear"></div>
                        </li>
					<?php 
					break;
					case 'my_post_project':
					$my_post_project_data = get_one_project($cmt->custom_msg);
					?>
                  	<li class="common_li2">
                        <div class="abc">
						<?php if($cmt->user_image !='' && is_file('upload/thumb/'.$cmt->user_image) ) { ?>
 <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/<?php echo $cmt->user_image; ?>" height="50" width="50" border="0" style=" border:1px solid lightGrey;" /></a>
<?php }else {
 ?> 
<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/no_man.gif" height="50" width="50" border="0" style=" border:1px solid lightGrey;" /></a>

<?php }  ?>					
							</div>
                        <div>
                            	<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>                                <div><?php echo MY_POST_PROJECT;?> : <a href="<?php echo site_url('projects/'.$my_post_project_data['url_project_title'].'/'.$my_post_project_data['project_id']); ?>"><?php echo $my_post_project_data['project_title'];?></a></div>
                               <div><?php echo getDuration($cmt->activity_date);?></div>
                            </div>
                            <div class="clear"></div>
                        </li>
					
					<?php 
					break;
					case 'followeruser_post_project':
					$follower_post_project_data = get_one_project($cmt->custom_msg);
					?>
                    <li class="common_li2">
                        <div class="abc">
						<?php if($cmt->user_image !='' && is_file('upload/thumb/'.$cmt->user_image) ) { ?>
 <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/<?php echo $cmt->user_image; ?>" height="50" width="50" border="0" style=" border:1px solid lightGrey;" /></a>
<?php }else {
 ?> 
<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/no_man.gif" height="50" width="50" border="0" style=" border:1px solid lightGrey;" /></a>

<?php }  ?>					
							</div>
                        <div>
                            	<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>                                <div><?php echo FOLLOWER_POST_PROJECT;?> : <a href="<?php echo site_url('projects/'.$follower_post_project_data['url_project_title'].'/'.$follower_post_project_data['project_id']); ?>"><?php echo $follower_post_project_data['project_title'];?></a></div>
                               <div><?php echo getDuration($cmt->activity_date);?></div>
                            </div>
                            <div class="clear"></div>
                        </li>
					<?php break;
					case 'user_own_project_update':
					$own_project_updates = get_one_project($cmt->custom_msg);
					?>
					<li class="common_li2">
                        <div class="abc">
						<?php if($cmt->user_image !='' && is_file('upload/thumb/'.$cmt->user_image) ) { ?>
 <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/<?php echo $cmt->user_image; ?>" height="50" width="50" border="0" style=" border:1px solid lightGrey;" /></a>
<?php }else {
 ?> 
<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/no_man.gif" height="50" width="50" border="0" style=" border:1px solid lightGrey;" /></a>

<?php }  ?>					
							</div>
                        <div>
                            	<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>                                <div><?php echo PROJECT_UPDATES;?>: <a href="<?php echo site_url('projects/'.$own_project_updates['url_project_title'].'/'.$own_project_updates['project_id']); ?>"><?php echo $own_project_updates['project_title'];?></a></div>
                                 <div><?php echo UPDATES;?> : <?php echo stripslashes($cmt->custom_msg2);?></div>
                               <div><?php echo getDuration($cmt->activity_date);?></div>
                            </div>
                            <div class="clear"></div>
                        </li>
					 <?php break;
					 case 'project_update_follower_project':
					 $follower_project_updates = get_one_project($cmt->custom_msg);?>
                     <li class="common_li2">
                        <div class="abc">
						<?php if($cmt->user_image !='' && is_file('upload/thumb/'.$cmt->user_image) ) { ?>
 <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/<?php echo $cmt->user_image; ?>" height="50" width="50" border="0" style=" border:1px solid lightGrey;" /></a>
<?php }else {
 ?> 
<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/no_man.gif" height="50" width="50" border="0" style=" border:1px solid lightGrey;" /></a>

<?php }  ?>					
							</div>
                        <div>
                            	<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>                                <div><?php echo FOLLOWER_PROJECT_UPDATES;?>: <a href="<?php echo site_url('projects/'.$follower_project_updates['url_project_title'].'/'.$follower_project_updates['project_id']); ?>"><?php echo $follower_project_updates['project_title'];?></a></div>
                                 <div>Updates : <?php echo $cmt->custom_msg2;?></div>
                               <div><?php echo getDuration($cmt->activity_date);?></div>
                            </div>
                            <div class="clear"></div>
                        </li>
					 <?php 
					 break;
					 case 'user_own_donation':
					 $my_project_donation = get_one_project($cmt->custom_msg);?>
                     <li class="common_li2">
                        <div class="abc">
						<?php if($cmt->user_image !='' && is_file('upload/thumb/'.$cmt->user_image) ) { ?>
 <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/<?php echo $cmt->user_image; ?>" height="50" width="50" border="0" style=" border:1px solid lightGrey;" /></a>
<?php }else {
 ?> 
<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/no_man.gif" height="50" width="50" border="0" style=" border:1px solid lightGrey;" /></a>

<?php }  ?>					
							</div>
                        <div>
                            	<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>                                <div>Donation on Project: <a href="<?php echo site_url('projects/'.$my_project_donation['url_project_title'].'/'.$my_project_donation['project_id']); ?>"><?php echo $my_project_donation['project_title'];?></a></div>
                                 <div>Amount : <?php echo $site_setting['currency_symbol'].''.$cmt->custom_msg2;?></div>
                               <div><?php echo getDuration($cmt->activity_date);?></div>
                            </div>
                            <div class="clear"></div>
                        </li>
                     <?php 
					 break;
					 case 'project_follower_donation':
					 $follower_prject_donation = get_one_project($cmt->custom_msg);?>
                     <li class="common_li2">
                        <div class="abc">
						<?php if($cmt->user_image !='' && is_file('upload/thumb/'.$cmt->user_image) ) { ?>
 <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/<?php echo $cmt->user_image; ?>" height="50" width="50" border="0" style=" border:1px solid lightGrey;" /></a>
<?php }else {
 ?> 
<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/no_man.gif" height="50" width="50" border="0" style=" border:1px solid lightGrey;" /></a>

<?php }  ?>					
							</div>
                        <div>
                            	<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>                                <div>Follower Donation on Project: <a href="<?php echo site_url('projects/'.$follower_prject_donation['url_project_title'].'/'.$follower_prject_donation['project_id']); ?>"><?php echo $follower_prject_donation['project_title'];?></a></div>
                                 <div>Amount : <?php echo $site_setting['currency_symbol'].''.$cmt->custom_msg2;?></div>
                               <div><?php echo getDuration($cmt->activity_date);?></div>
                            </div>
                            <div class="clear"></div>
                        </li>
					 <?php 
					 break;
					 case 'user_own_gallery':
					 $user_own_gallery = get_one_project($cmt->custom_msg);?>
                     <li class="common_li2">
                        <div class="abc">
						<?php if($cmt->user_image !='' && is_file('upload/thumb/'.$cmt->user_image) ) { ?>
 <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/<?php echo $cmt->user_image; ?>" height="50" width="50" border="0" style=" border:1px solid lightGrey;" /></a>
<?php }else {
 ?> 
<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/no_man.gif" height="50" width="50" border="0" style=" border:1px solid lightGrey;" /></a>

<?php }  ?>					
							</div>
                        <div>
                            	<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>                                <div>Add gallery in Project: <a href="<?php echo site_url('projects/'.$user_own_gallery['url_project_title'].'/'.$user_own_gallery['project_id']); ?>"><?php echo $user_own_gallery['project_title'];?></a></div>
                               <div><?php echo getDuration($cmt->activity_date);?></div>
                            </div>
                            <div class="clear"></div>
                        </li>
                     <?php 
					 break;
					 case 'followeruser_gallery':
                     $user_follower_gallery = get_one_project($cmt->custom_msg);?>
                     <li class="common_li2">
                        <div class="abc">
						<?php if($cmt->user_image !='' && is_file('upload/thumb/'.$cmt->user_image) ) { ?>
 <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/<?php echo $cmt->user_image; ?>" height="50" width="50" border="0" style=" border:1px solid lightGrey;" /></a>
<?php }else {
 ?> 
<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/no_man.gif" height="50" width="50" border="0" style=" border:1px solid lightGrey;" /></a>

<?php }  ?>					
							</div>
                        <div>
                            	<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>                                <div>Add gallery in Project: <a href="<?php echo site_url('projects/'.$user_follower_gallery['url_project_title'].'/'.$user_follower_gallery['project_id']); ?>"><?php echo $user_follower_gallery['project_title'];?></a></div>
                               <div><?php echo getDuration($cmt->activity_date);?></div>
                            </div>
                            <div class="clear"></div>
                        </li>
					 <?php 
					 break;
					 case 'following_follow_project':
                     $following_follow_project_data = get_one_project($cmt->custom_msg);?>
                     <li class="common_li2">
                        <div class="abc">
						<?php if($cmt->user_image !='' && is_file('upload/thumb/'.$cmt->user_image) ) { ?>
 <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/<?php echo $cmt->user_image; ?>" height="50" width="50" border="0" style=" border:1px solid lightGrey;" /></a>
<?php }else {
 ?> 
<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/no_man.gif" height="50" width="50" border="0" style=" border:1px solid lightGrey;" /></a>

<?php }  ?>					
							</div>
                        <div>
                            	<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>                                <div>Following Project: <a href="<?php echo site_url('projects/'.$following_follow_project_data['url_project_title'].'/'.$following_follow_project_data['project_id']); ?>"><?php echo $following_follow_project_data['project_title'];?></a></div>
                               <div><?php echo getDuration($cmt->activity_date);?></div>
                            </div>
                            <div class="clear"></div>
                        </li>
					 <?php break;
					 case 'following_gallery':
                      $following_gallery_project_data = get_one_project($cmt->custom_msg);?>
                     <li class="common_li2">
                        <div class="abc">
						<?php if($cmt->user_image !='' && is_file('upload/thumb/'.$cmt->user_image) ) { ?>
 <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/<?php echo $cmt->user_image; ?>" height="50" width="50" border="0" style=" border:1px solid lightGrey;" /></a>
<?php }else {
 ?> 
<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/no_man.gif" height="50" width="50" border="0" style=" border:1px solid lightGrey;" /></a>

<?php }  ?>					
							</div>
                        <div>
                            	<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>                                <div>Following Gallery: <a href="<?php echo site_url('projects/'.$following_gallery_project_data['url_project_title'].'/'.$following_gallery_project_data['project_id']); ?>"><?php echo $following_gallery_project_data['project_title'];?></a></div>
                               <div><?php echo getDuration($cmt->activity_date);?></div>
                            </div>
                            <div class="clear"></div>
                        </li>
					 <?php break;
					 case 'following_updates':
					  $following_updates_project_data = get_one_project($cmt->custom_msg);
					 ?>
                     <li class="common_li2">
                        <div class="abc">
						<?php if($cmt->user_image !='' && is_file('upload/thumb/'.$cmt->user_image) ) { ?>
 <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/<?php echo $cmt->user_image; ?>" height="50" width="50" border="0" style=" border:1px solid lightGrey;" /></a>
<?php }else {
 ?> 
<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/no_man.gif" height="50" width="50" border="0" style=" border:1px solid lightGrey;" /></a>

<?php }  ?>					
							</div>
                        <div>
                            	<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>                                <div>Following Updates: <a href="<?php echo site_url('projects/'.$following_updates_project_data['url_project_title'].'/'.$following_updates_project_data['project_id']); ?>"><?php echo $following_updates_project_data['project_title'];?></a></div>					<div>Updates : <?php echo stripslashes($cmt->custom_msg2);?></div>
                               <div><?php echo getDuration($cmt->activity_date);?></div>
                            </div>
                            <div class="clear"></div>
                        </li>
					 <?php break;
					 case 'following_comment':
					  $following_comment_project_data = get_one_project($cmt->custom_msg);
					 ?>
                     <li class="common_li2">
                        <div class="abc">
						<?php if($cmt->user_image !='' && is_file('upload/thumb/'.$cmt->user_image) ) { ?>
 <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/<?php echo $cmt->user_image; ?>" height="50" width="50" border="0" style=" border:1px solid lightGrey;" /></a>
<?php }else {
 ?> 
<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/no_man.gif" height="50" width="50" border="0" style=" border:1px solid lightGrey;" /></a>

<?php }  ?>					
							</div>
                        <div>
                            	<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>                                <div>Following Comment: <a href="<?php echo site_url('projects/'.$following_comment_project_data['url_project_title'].'/'.$following_comment_project_data['project_id']); ?>"><?php echo $following_comment_project_data['project_title'];?></a></div>					<div>Comment: <?php echo $cmt->custom_msg2;?></div>
                               <div><?php echo getDuration($cmt->activity_date);?></div>
                            </div>
                            <div class="clear"></div>
                        </li>
                     <?php 
					 break;
					 case 'following_donation':
					 $following_donation_project_data = get_one_project($cmt->custom_msg);
					 ?>
                     <li class="common_li2">
                        <div class="abc">
						<?php if($cmt->user_image !='' && is_file('upload/thumb/'.$cmt->user_image) ) { ?>
 <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/<?php echo $cmt->user_image; ?>" height="50" width="50" border="0" style=" border:1px solid lightGrey;" /></a>
<?php }else {
 ?> 
<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/no_man.gif" height="50" width="50" border="0" style=" border:1px solid lightGrey;" /></a>

<?php }  ?>					
							</div>
                        <div>
                            	<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>                                <div>Following Donation: <a href="<?php echo site_url('projects/'.$following_donation_project_data['url_project_title'].'/'.$following_donation_project_data['project_id']); ?>"><?php echo $following_donation_project_data['project_title'];?></a></div>					<div>Amount: <?php echo $cmt->custom_msg2;?></div>
                               <div><?php echo getDuration($cmt->activity_date);?></div>
                            </div>
                            <div class="clear"></div>
                        </li>
					 <?php break;
					 case 'following_post_project':
					 $following_post_project_data = get_one_project($cmt->custom_msg);
					 ?>
                     <li class="common_li2">
                        <div class="abc">
						<?php if($cmt->user_image !='' && is_file('upload/thumb/'.$cmt->user_image) ) { ?>
 <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/<?php echo $cmt->user_image; ?>" height="50" width="50" border="0" style=" border:1px solid lightGrey;" /></a>
<?php }else {
 ?> 
<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/no_man.gif" height="50" width="50" border="0" style=" border:1px solid lightGrey;" /></a>

<?php }  ?>					
							</div>
                        <div>
                            	<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>                                <div>Following Post Project: <a href="<?php echo site_url('projects/'.$following_post_project_data['url_project_title'].'/'.$following_post_project_data['project_id']); ?>"><?php echo $following_post_project_data['project_title'];?></a></div>					<div>Project: <?php echo $following_post_project_data['project_title'];?></div>
                               <div><?php echo getDuration($cmt->activity_date);?></div>
                            </div>
                            <div class="clear"></div>
                        </li>
					 <?php 
					 break;
                     case 'myfolloingfollowers':
					$user_info = get_user_detail($cmt->custom_msg);?>
                     <li class="common_li2">
                        <div class="abc">
						<?php if($cmt->user_image !='' && is_file('upload/thumb/'.$cmt->user_image) ) { ?>
 <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/<?php echo $cmt->user_image; ?>" height="50" width="50" border="0" style=" border:1px solid lightGrey;" /></a>
<?php }else {
 ?> 
<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/no_man.gif" height="50" width="50" border="0" style=" border:1px solid lightGrey;" /></a>

<?php }  ?>					
							</div>
                        <div>
                            	<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>                                <div>My Followers Follow: <a href="<?php echo site_url('member/'.$user_info['user_id']); ?>"><?php echo $user_info['user_name'];?></a></div>
                               <div><?php echo getDuration($cmt->activity_date);?></div>
                            </div>
                            <div class="clear"></div>
                        </li>
					
					 <?php break;
					 default:?>
                     <li class="common_li2">
                        <div class="abc">
						<?php if($cmt->user_image !='' && is_file('upload/thumb/'.$cmt->user_image) ) { ?>
 <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/<?php echo $cmt->user_image; ?>" height="50" width="50" border="0" style=" border:1px solid lightGrey;" /></a>
<?php }else {
 ?> 

<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/no_man.gif" height="50" width="50" border="0" style=" border:1px solid lightGrey;" /></a>

<?php }  ?>					
							</div>
                        <div>
                            	<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>                                <div>Welcome <?php echo $cmt->user_name;?></div>
                               <div><?php echo getDuration($cmt->activity_date);?></div>
                            </div>
                            <div class="clear"></div>
                        </li>
					 
					<?php break;}
								$i++;
								$offset++;	
							}
						
						}
					?>
					</ul>
					
				</div>
             
				<div align="center" style=" margin:0px auto; " id="last_msg_loader"></div>
                <div class="clear"></div>
                <input type="hidden" id="offset" name="offset" value="<?php echo $offset; ?>"/>
				</div>
				
			<?php } else { ?>
			
			
			<div class="clear"></div>
			
			<div align="center"><?php echo NO_ACTIVITY;?>.</div>
			
			<div class="clear"></div>
			
			<?php } ?>	
			
			
		</div>
		
		
		
		
		</div>
			
			
			
				
				
				<div class="clear"></div>		
				
				
					</div>
	<!-- left end ------>
		
       </div>
       
       <script type="text/javascript">
var gmts=0;

jQuery(document).ready(function(){ 
function last_msg_funtion(offset) 
{   
	if(offset>0)
	{
	gmts=1;
	 
	 
			$.post("<?php echo site_url('user/load_ajax_activities/'.$user_id.'/'.$limit);?>/"+offset,	
					function(data)
					{
						if (data != "") 
						{
							if(gmts==1) 
							{ 
								$("#user_activity ul").append(data);
	
								gmts=0;
							}
						}
					}
			);
	}	
	$('div#last_msg_loader').empty();
}; 

$(window).scroll(function(){
	
//if ($(window).scrollTop() == $(document).height() - $(window).height()){
if($(window).scrollTop() == $(document).height() - $(window).height()){		

 				$('#last_msg_loader').html('<img src="<?php echo base_url();?>images/indicator.gif">');	
				
 					var offset=parseInt($("#offset").val());					  
					if(offset>0) {
					//$("#days").remove();
					//setTimeout(function(){last_msg_funtion(offset); }, 1500);				
					last_msg_funtion(offset);
					$("#offset").remove();
					}					


}
	}); 
});	


</script>
   
	