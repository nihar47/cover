<?php
					$user_id = $this->session->userdata('user_id');
					
					$user_info = get_user_detail($user_id);
					
					
						$i = 0;
						if($activities)
						{
						
							foreach($activities as $cmt)
							{
								$act=$cmt->act;
								
								
					switch($act)
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
                     <input type="hidden" id="offset" name="offset" value="<?php echo $offset; ?>"/>
					
