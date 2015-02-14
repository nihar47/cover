<style>
.actul{
	list-style:none;
	margin:0;
	padding:0;
	width:100%;
}
.actul .common_li2{
	width:100%;
	/*background:#E3F0FD;*/
	margin:5px 0;
	padding:5px 0;
	display:inline-block;
}
.common_li2 img{
	width:50px;
	height:50px;
	margin:0 10px;;
	float:left;
	display:none;
}
.actcont{
	float:left;
	width:979px;
}
.actcont a{
	color: #3AB7B9;
	font-size:14px;
	font-family: 'Roboto',sans-serif;
}
.actcont a:hover{
	color: #FF7E15;
	font-weight:bold;
	
}
.actcont p{
	margin:0;
	padding:0;
	text-align:left;
}
.actheader{
	font-family: 'Roboto',sans-serif;
	color:#3AB7B9;
	border-bottom:1px solid #aba6a6;
	font-weight:bold;
	text-align:left;
	margin-top:30px;
	padding-bottom:5px;
	font-size:24px;
}
</style>
<section>
	<!--<div class="actheader">
	</div>-->
	<div style="margin-bottom:37px;" id="page_we">
		<h2 class="actheader"><?php echo RECENT_ACTIVITY; ?></h2>
	
    	<div style="margin:20px 0 60px;" class="create_cont">
			<?php if($activities) { ?>	
		
              <div id="recent-donate-detail">
             
				
				<div  id="user_activity"  style="text-align:left;">
					
					<ul class="actul">
					<?php
					$user_id = $this->session->userdata('user_id');
					
					$user_info = get_user_detail($user_id);
					
					
						$i = 0;
						if($activities)
						{
							foreach($activities as $cmt)
							{
								$act=$cmt->act;
							$user_detail=get_user_detail($cmt->key_id);
							
							
							
					//print_r($cmt);die;					
				//	echo $act.'<br>';
					switch ($act)
					{
					case 'following':			
					?>
					  <li class="common_li2">
					 <!-- ------------------------------------->
					 <?php 	
					 	
					if($user_detail['image']!='' && is_file('upload/thumb/'.$user_detail['image'])){?>
					 <img src="<?php echo base_url().'upload/thumb/'.$user_detail['image']; ?>" alt=""><?php
					}elseif($user_detail['tw_screen_name']!='' && $user_detail['tw_id']>0) { ?>
	
	<img src="http://api.twitter.com/1/users/profile_image?screen_name=<?php echo $user_detail['tw_screen_name']; ?>&size=bigger" class="uimgimg" />
	
	
	<?php } elseif($user_detail['fb_uid']!='' && $user_detail['fb_uid']>0) { ?>
			    <img src="http://graph.facebook.com/<?php echo $user_detail['fb_uid']; ?>/picture?type=large" alt="" />
				<?php } else { ?>
               				<img src="<?php echo base_url().'upload/thumb/'.$user_detail['image']; ?>" alt="" />
				<?php } ?>
				 
					 <!----------------------------------------------->
					  
                       
					 
					  <div class="actcont">
                            	<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>
								<p style="float:right"><?php echo date('F d',strtotime($cmt->activity_date));?></p><div class="clr"></div>
								                                <p><?php echo FOLLOWING;?>: <a href="<?php echo site_url('member/'.$user_info['user_id']); ?>"><?php echo $user_info['user_name'];?>.</a></p>                  
                              	
                            </div>
                         
						   
					</li>
					 
					 
					<?php  break;
				
					case 'follower' :?>
                  	  <li class="common_li2">
                        
						 <?php 	
					if($user_detail['image']!='' && is_file('upload/thumb/'.$user_detail['image'])){
						?> <img src="<?php echo base_url().'upload/thumb/'.$user_detail['image']; ?>" alt=""><?php
					}elseif($user_detail['tw_screen_name']!='' && $user_detail['tw_id']>0) { ?>
	
	<img src="http://api.twitter.com/1/users/profile_image?screen_name=<?php echo $user_detail['tw_screen_name']; ?>&size=bigger" class="uimgimg" />
	
	
	<?php } elseif($user_detail['fb_uid']!='' && $user_detail['fb_uid']>0) { ?>
			    <img src="http://graph.facebook.com/<?php echo $user_detail['fb_uid']; ?>/picture?type=large" alt="" />
				<?php } else { ?>
               				<img src="<?php echo base_url().'upload/thumb/'.$user_detail['image']; ?>" alt="" />
				<?php } ?>
				 
							
                        <div class="actcont">
                            	<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>
								<p style="float:right"><?php echo date('F d',strtotime($cmt->activity_date));?></p><div class="clr"></div>
								                                <p><?php echo FOLLOW;?>: <a href="<?php echo site_url('member/'.$user_info['user_id']); ?>"><?php echo $user_info['user_name'];?>.</a></p>                  
                              	
                            </div>
                         <div class="clear"></div>
                        </li>
                     
                     <?php break;
					 case 'user_own_comment':
					  $own_comment_project_data = get_one_project($cmt->custom_msg);
					 ?>
					 <li class="common_li2">
                       
						 <?php 	
					if($user_detail['image']!='' && is_file('upload/thumb/'.$user_detail['image'])){
						?> <img src="<?php echo base_url().'upload/thumb/'.$user_detail['image']; ?>" alt=""><?php
					}elseif($user_detail['tw_screen_name']!='' && $user_detail['tw_id']>0) { ?>
	
	<img src="http://api.twitter.com/1/users/profile_image?screen_name=<?php echo $user_detail['tw_screen_name']; ?>&size=bigger" class="uimgimg" />
	
	
	<?php } elseif($user_detail['fb_uid']!='' && $user_detail['fb_uid']>0) { ?>
			    <img src="http://graph.facebook.com/<?php echo $user_detail['fb_uid']; ?>/picture?type=large" alt="" />
				<?php } else { ?>
               				<img src="<?php echo base_url().'upload/thumb/'.$user_detail['image']; ?>" alt="" />
				<?php } ?>
				 
							
                        <div class="actcont">
                            	<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>
								<p style="float:right;"><?php echo date('F d',strtotime($cmt->activity_date));?></p><div class="clr"></div>                                <p><?php echo MY_COMMENTS_TXT;?>: <a href="<?php echo site_url('projects/'.$own_comment_project_data['url_project_title'].'/'.$own_comment_project_data['project_id']); ?>"><?php echo $own_comment_project_data['project_title'];?></a></p>     <p><?php // echo $cmt->custom_msg2;?>.</p>                  
                              	
                            </div>
                         <div class="clear"></div>
                        </li>
					 <?php 
					 break;
					 case 'followercomment':
					 $project_data = get_one_project($cmt->custom_msg2);
					 ?>
                        <li class="common_li2">
                       
						 <?php 	
					if($user_detail['image']!='' && is_file('upload/thumb/'.$user_detail['image'])){
						?> <img src="<?php echo base_url().'upload/thumb/'.$user_detail['image']; ?>" alt=""><?php
					}elseif($user_detail['tw_screen_name']!='' && $user_detail['tw_id']>0) { ?>
	
	<img src="http://api.twitter.com/1/users/profile_image?screen_name=<?php echo $user_detail['tw_screen_name']; ?>&size=bigger" class="uimgimg" />
	
	
	<?php } elseif($user_detail['fb_uid']!='' && $user_detail['fb_uid']>0) { ?>
			    <img src="http://graph.facebook.com/<?php echo $user_detail['fb_uid']; ?>/picture?type=large" alt="" />
				<?php } else { ?>
               				<img src="<?php echo base_url().'upload/thumb/'.$user_detail['image']; ?>" alt="" />
				<?php } ?>
				
						
                         <div class="actcont">
                            	<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>
								<p style="float:right"><?php echo date('F d',strtotime($cmt->activity_date));?></p><div class="clr"></div>                                <p><?php echo COMMENT_ON_PROJECT;?>: <a href="<?php echo site_url('projects/'.$project_data['url_project_title'].'/'.$project_data['project_id']); ?>"><?php echo $project_data['project_title'];?></a></p>
                                 <!--<p><?php // echo MY_COMMENTS_TXT;?>: <?php // echo $cmt->custom_msg;?></p>-->
                               
                            </div>
                            <div class="clear"></div>
                        </li>
					 <?php 
					 break;
					 case 'signup'?>
                      <li class="common_li2">
                      
						 <?php 	
					if($user_detail['image']!='' && is_file('upload/thumb/'.$user_detail['image'])){
						?> <img src="<?php echo base_url().'upload/thumb/'.$user_detail['image']; ?>" alt=""><?php
					}elseif($user_detail['tw_screen_name']!='' && $user_detail['tw_id']>0) { ?>
	
	<img src="http://api.twitter.com/1/users/profile_image?screen_name=<?php echo $user_detail['tw_screen_name']; ?>&size=bigger" class="uimgimg" />
	
	
	<?php } elseif($user_detail['fb_uid']!='' && $user_detail['fb_uid']>0) { ?>
			    <img src="http://graph.facebook.com/<?php echo $user_detail['fb_uid']; ?>/picture?type=large" alt="" />
				<?php } else { ?>
               				<img src="<?php echo base_url().'upload/thumb/'.$user_detail['image']; ?>" alt="" />
				<?php } ?>
				
							
                        <div class="actcont">
                            	<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>
								 <p style="float:right;"><?php echo date('F d',strtotime($cmt->activity_date));?></p><div class="clr"></div>                                <p><?php echo WELCOME;?>: <?php echo $cmt->user_name;?></p>
                              
                            </div>
                            <div class="clear"></div>
                        </li>
					 <?php 
					  break;
					  case 'followuser_follow_project':
					  $project_follow_data = get_one_project($cmt->custom_msg);
					  ?>
					  <?php 	
					if($user_detail['image']!='' && is_file('upload/thumb/'.$user_detail['image'])){
						?> <img src="<?php echo base_url().'upload/thumb/'.$user_detail['image']; ?>" alt=""><?php
					}elseif($user_detail['tw_screen_name']!='' && $user_detail['tw_id']>0) { ?>
	
	<img src="http://api.twitter.com/1/users/profile_image?screen_name=<?php echo $user_detail['tw_screen_name']; ?>&size=bigger" class="uimgimg" />
	
	
	<?php } elseif($user_detail['fb_uid']!='' && $user_detail['fb_uid']>0) { ?>
			    <img src="http://graph.facebook.com/<?php echo $user_detail['fb_uid']; ?>/picture?type=large" alt="" />
				<?php } else { ?>
               				<img src="<?php echo base_url().'upload/thumb/'.$user_detail['image']; ?>" alt="" />
				<?php } ?>
				
							
                     <div class="actcont">
                            	<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>
								 <p style="float:right;"><?php echo date('F d',strtotime($cmt->activity_date));?></p><div class="clr"></div>                                <p><?php echo FOLLOW_PROJECT_TXT;?>: <a href="<?php echo site_url('projects/'.$project_follow_data['url_project_title'].'/'.$project_follow_data['project_id']); ?>"><?php echo $project_follow_data['project_title'];?></a></p>
                              
                            </div>
                            <div class="clear"></div>
                        </li>
					  
					<?php 
					break;
					case 'own_follow_project':
					$own_project_data = get_one_project($cmt->custom_msg);
					?>
                     <?php 	
					if($user_detail['image']!='' && is_file('upload/thumb/'.$user_detail['image'])){
						?> <img src="<?php echo base_url().'upload/thumb/'.$user_detail['image']; ?>" alt=""><?php
					}elseif($user_detail['tw_screen_name']!='' && $user_detail['tw_id']>0) { ?>
	
	<img src="http://api.twitter.com/1/users/profile_image?screen_name=<?php echo $user_detail['tw_screen_name']; ?>&size=bigger" class="uimgimg" />
	
	
	<?php } elseif($user_detail['fb_uid']!='' && $user_detail['fb_uid']>0) { ?>
			    <img src="http://graph.facebook.com/<?php echo $user_detail['fb_uid']; ?>/picture?type=large" alt="" />
				<?php } else { ?>
               				<img src="<?php echo base_url().'upload/thumb/'.$user_detail['image']; ?>" alt="" />
				<?php } ?>
				 
							
                       <div class="actcont">
                            	<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>
								 <p style="float:right;"><?php echo date('F d',strtotime($cmt->activity_date));?></p><div class="clr"></div>                                <p><?php echo PROJECT_FOLLOW_BY_ME;?>: <a href="<?php echo site_url('projects/'.$own_project_data['url_project_title'].'/'.$own_project_data['project_id']); ?>"><?php echo $own_project_data['project_title'];?></a></p>
                              
                            </div>
                            <div class="clear"></div>
                        </li>
					<?php 
					break;
					case 'my_post_project': 
					$my_post_project_data = get_one_project($cmt->custom_msg);
					?>
                  	<li class="common_li2">
                        
						 <?php 	
					if($user_detail['image']!='' && is_file('upload/thumb/'.$user_detail['image'])){
						?> <img src="<?php echo base_url().'upload/thumb/'.$user_detail['image']; ?>" alt=""><?php
					}elseif($user_detail['tw_screen_name']!='' && $user_detail['tw_id']>0) { ?>
	
	<img src="http://api.twitter.com/1/users/profile_image?screen_name=<?php echo $user_detail['tw_screen_name']; ?>&size=bigger" class="uimgimg" />
	
	
	<?php } elseif($user_detail['fb_uid']!='' && $user_detail['fb_uid']>0) { ?>
			    <img src="http://graph.facebook.com/<?php echo $user_detail['fb_uid']; ?>/picture?type=large" alt="" />
				<?php } else { ?>
               				<img src="<?php echo base_url().'upload/thumb/'.$user_detail['image']; ?>" alt="" />
				<?php } ?>
				
							
                        <div class="actcont">
                            	<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>
								<p style="float:right;"><?php echo date('F d',strtotime($cmt->activity_date));?></p><div class="clr"></div>                                <p><?php echo MY_POST_PROJECT;?> : <a href="<?php echo site_url('projects/'.$my_post_project_data['url_project_title'].'/'.$my_post_project_data['project_id']); ?>"><?php echo $my_post_project_data['project_title'];?></a></p>
                               
                            </div>
                            <div class="clear"></div>
                        </li>
					
					<?php 
					break;
					case 'followeruser_post_project':
					$follower_post_project_data = get_one_project($cmt->custom_msg);
					?>
                    <li class="common_li2">
                        
						 <?php 	
					if($user_detail['image']!='' && is_file('upload/thumb/'.$user_detail['image'])){
						?> <img src="<?php echo base_url().'upload/thumb/'.$user_detail['image']; ?>" alt=""><?php
					}elseif($user_detail['tw_screen_name']!='' && $user_detail['tw_id']>0) { ?>
	
	<img src="http://api.twitter.com/1/users/profile_image?screen_name=<?php echo $user_detail['tw_screen_name']; ?>&size=bigger" class="uimgimg" />
	
	
	<?php } elseif($user_detail['fb_uid']!='' && $user_detail['fb_uid']>0) { ?>
			    <img src="http://graph.facebook.com/<?php echo $user_detail['fb_uid']; ?>/picture?type=large" alt="" />
				<?php } else { ?>
               				<img src="<?php echo base_url().'upload/thumb/'.$user_detail['image']; ?>" alt="" />
				<?php } ?>
				
							
                        <div class="actcont">
                            	<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>
								 <p style="float:right;"><?php echo date('F d',strtotime($cmt->activity_date));?></p><div class="clr"></div>                                <p><?php echo FOLLOWER_POST_PROJECT;?> : <a href="<?php echo site_url('projects/'.$follower_post_project_data['url_project_title'].'/'.$follower_post_project_data['project_id']); ?>"><?php echo $follower_post_project_data['project_title'];?></a></p>
                              
                            </div>
                            <div class="clear"></div>
                        </li>
					<?php break;
					case 'user_own_project_update':
					$own_project_updates = get_one_project($cmt->custom_msg);
					?>
					<li class="common_li2">
                        
						 <?php 	
					if($user_detail['image']!='' && is_file('upload/thumb/'.$user_detail['image'])){
						?> <img src="<?php echo base_url().'upload/thumb/'.$user_detail['image']; ?>" alt=""><?php
					}elseif($user_detail['tw_screen_name']!='' && $user_detail['tw_id']>0) { ?>
	
	<img src="http://api.twitter.com/1/users/profile_image?screen_name=<?php echo $user_detail['tw_screen_name']; ?>&size=bigger" class="uimgimg" />
	
	
	<?php } elseif($user_detail['fb_uid']!='' && $user_detail['fb_uid']>0) { ?>
			    <img src="http://graph.facebook.com/<?php echo $user_detail['fb_uid']; ?>/picture?type=large" alt="" />
				<?php } else { ?>
               				<img src="<?php echo base_url().'upload/thumb/'.$user_detail['image']; ?>" alt="" />
				<?php } ?>
				
							
                        <div class="actcont">
                            	<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>
								<p style="float:right;"><?php echo date('F d',strtotime($cmt->activity_date));?></p><div class="clr"></div>                                <p><?php echo PROJECT_UPDATES;?>: <a href="<?php echo site_url('projects/'.$own_project_updates['url_project_title'].'/'.$own_project_updates['project_id']); ?>"><?php echo $own_project_updates['project_title'];?></a></p>
                                 <!--<p><?php //  echo UPDATES;?> : <?php //  echo stripslashes($cmt->custom_msg2);?></p>-->
                               
                            </div>
                            <div class="clear"></div>
                        </li>
					 <?php break;
					 case 'project_update_follower_project':
					 $follower_project_updates = get_one_project($cmt->custom_msg);?>
                     <li class="common_li2">
                       
						 <?php 	
					if($user_detail['image']!='' && is_file('upload/thumb/'.$user_detail['image'])){
						?> <img src="<?php echo base_url().'upload/thumb/'.$user_detail['image']; ?>" alt=""><?php
					}elseif($user_detail['tw_screen_name']!='' && $user_detail['tw_id']>0) { ?>
	
	<img src="http://api.twitter.com/1/users/profile_image?screen_name=<?php echo $user_detail['tw_screen_name']; ?>&size=bigger" class="uimgimg" />
	
	
	<?php } elseif($user_detail['fb_uid']!='' && $user_detail['fb_uid']>0) { ?>
			    <img src="http://graph.facebook.com/<?php echo $user_detail['fb_uid']; ?>/picture?type=large" alt="" />
				<?php } else { ?>
               				<img src="<?php echo base_url().'upload/thumb/'.$user_detail['image']; ?>" alt="" />
				<?php } ?>
				
							
                       <div class="actcont">
                            	<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>
								<p style="float:right;"><?php echo date('F d',strtotime($cmt->activity_date));?></p><div class="clr"></div>                                <p><?php echo FOLLOWER_PROJECT_UPDATES;?>: <a href="<?php echo site_url('projects/'.$follower_project_updates['url_project_title'].'/'.$follower_project_updates['project_id']); ?>"><?php echo $follower_project_updates['project_title'];?></a></p>
                                 <!--<p><?php // echo UPDATES;?> : <?php // echo $cmt->custom_msg2;?></p>-->
                               
                            </div>
                            <div class="clear"></div>
                        </li>
					 <?php 
					 break;
					 case 'user_own_donation':
					 $my_project_donation = get_one_project($cmt->custom_msg);?>
                     <li class="common_li2">
                        
						 <?php 	
					if($user_detail['image']!='' && is_file('upload/thumb/'.$user_detail['image'])){
						?> <img src="<?php echo base_url().'upload/thumb/'.$user_detail['image']; ?>" alt=""><?php
					}elseif($user_detail['tw_screen_name']!='' && $user_detail['tw_id']>0) { ?>
	
	<img src="http://api.twitter.com/1/users/profile_image?screen_name=<?php echo $user_detail['tw_screen_name']; ?>&size=bigger" class="uimgimg" />
	
	
	<?php } elseif($user_detail['fb_uid']!='' && $user_detail['fb_uid']>0) { ?>
			    <img src="http://graph.facebook.com/<?php echo $user_detail['fb_uid']; ?>/picture?type=large" alt="" />
				<?php } else { ?>
               				<img src="<?php echo base_url().'upload/thumb/'.$user_detail['image']; ?>" alt="" />
				<?php } ?>
				
							
                         <div class="actcont">
                            	<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>
								<p style="float:right"><?php echo date('F d',strtotime($cmt->activity_date));?></p><div class="clr"></div>                                <p><?php echo DONATION_ON_PROJECT; ?>:  <a href="<?php echo site_url('projects/'.$my_project_donation['url_project_title'].'/'.$my_project_donation['project_id']); ?>"><?php echo $my_project_donation['project_title'];?></a> &nbsp;
                                Amount : <?php echo $site_setting['currency_symbol'].''.$cmt->custom_msg2;?></p>
                                 <!--<p><?php // echo AMOUNT;?> : <?php // echo $site_setting['currency_symbol'].''.$cmt->custom_msg2;?></p>-->
                               
                            </div>
                            <div class="clr"></div>
                        </li>
                     <?php 
					 break;
					 case 'project_follower_donation':
					 $follower_prject_donation = get_one_project($cmt->custom_msg);?>
                     <li class="common_li2">
                        
						 <?php 	
					if($user_detail['image']!='' && is_file('upload/thumb/'.$user_detail['image'])){
						?> <img src="<?php echo base_url().'upload/thumb/'.$user_detail['image']; ?>" alt=""><?php
					}elseif($user_detail['tw_screen_name']!='' && $user_detail['tw_id']>0) { ?>
	
	<img src="http://api.twitter.com/1/users/profile_image?screen_name=<?php echo $user_detail['tw_screen_name']; ?>&size=bigger" class="uimgimg" />
	
	
	<?php } elseif($user_detail['fb_uid']!='' && $user_detail['fb_uid']>0) { ?>
			    <img src="http://graph.facebook.com/<?php echo $user_detail['fb_uid']; ?>/picture?type=large" alt="" />
				<?php } else { ?>
               				<img src="<?php echo base_url().'upload/thumb/'.$user_detail['image']; ?>" alt="" />
				<?php } ?>
				 
							
                        <div class="actcont">
                            	<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>
								 <p style="float:right;"><?php echo date('F d',strtotime($cmt->activity_date));?></p><div class="clr"></div>                                <p><?php echo FOLLOWER_DONATION_ON_PROJECT; ?>: <a href="<?php echo site_url('projects/'.$follower_prject_donation['url_project_title'].'/'.$follower_prject_donation['project_id']); ?>"><?php echo $follower_prject_donation['project_title'];?></a></p>
                                 <!--<p><?php // echo AMOUNT;?> : <?php // echo $site_setting['currency_symbol'].''.$cmt->custom_msg2;?></p>-->
                              
                            </div>
                            <div class="clr"></div>
                        </li>
					 <?php 
					 break;
					 case 'user_own_gallery':
					 $user_own_gallery = get_one_project($cmt->custom_msg);?>
                     <li class="common_li2">
                       
						 <?php 	
					if($user_detail['image']!='' && is_file('upload/thumb/'.$user_detail['image'])){
						?> <img src="<?php echo base_url().'upload/thumb/'.$user_detail['image']; ?>" alt=""><?php
					}elseif($user_detail['tw_screen_name']!='' && $user_detail['tw_id']>0) { ?>
	
	<img src="http://api.twitter.com/1/users/profile_image?screen_name=<?php echo $user_detail['tw_screen_name']; ?>&size=bigger" class="uimgimg" />
	
	
	<?php } elseif($user_detail['fb_uid']!='' && $user_detail['fb_uid']>0) { ?>
			    <img src="http://graph.facebook.com/<?php echo $user_detail['fb_uid']; ?>/picture?type=large" alt="" />
				<?php } else { ?>
               				<img src="<?php echo base_url().'upload/thumb/'.$user_detail['image']; ?>" alt="" />
				<?php } ?>
				 
							
                        <div class="actcont">
                            	<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>
								 <p style="float:right;"><?php echo date('F d',strtotime($cmt->activity_date));?></p><div class="clr"></div>                                <p><?php echo ADD_GALLERY_IN_PROJECT ?>: <a href="<?php echo site_url('projects/'.$user_own_gallery['url_project_title'].'/'.$user_own_gallery['project_id']); ?>"><?php echo $user_own_gallery['project_title'];?></a></p>
                              
                            </div>
                            <div class="clr"></div>
                        </li>
                     <?php 
					 break;
					 case 'followeruser_gallery':
                     $user_follower_gallery = get_one_project($cmt->custom_msg);?>
                     <li class="common_li2">
                        
						 <?php 	
					if($user_detail['image']!='' && is_file('upload/thumb/'.$user_detail['image'])){
						?> <img src="<?php echo base_url().'upload/thumb/'.$user_detail['image']; ?>" alt=""><?php
					}elseif($user_detail['tw_screen_name']!='' && $user_detail['tw_id']>0) { ?>
	
	<img src="http://api.twitter.com/1/users/profile_image?screen_name=<?php echo $user_detail['tw_screen_name']; ?>&size=bigger" class="uimgimg" />
	
	
	<?php } elseif($user_detail['fb_uid']!='' && $user_detail['fb_uid']>0) { ?>
			    <img src="http://graph.facebook.com/<?php echo $user_detail['fb_uid']; ?>/picture?type=large" alt="" />
				<?php } else { ?>
               				<img src="<?php echo base_url().'upload/thumb/'.$user_detail['image']; ?>" alt="" />
				<?php } ?>
				
							
                          <div class="actcont">
                            	<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>
								<p style="float:right;"><?php echo date('F d',strtotime($cmt->activity_date));?></p><div class="clr"></div>                                <p><?php echo ADD_GALLERY_IN_PROJECT; ?>: <a href="<?php echo site_url('projects/'.$user_follower_gallery['url_project_title'].'/'.$user_follower_gallery['project_id']); ?>"><?php echo $user_follower_gallery['project_title'];?></a></p>
                               
                            </div>
                            <div class="clr"></div>
                        </li>
					 <?php 
					 break;
					 case 'following_follow_project':
                     $following_follow_project_data = get_one_project($cmt->custom_msg);?>
                     <li class="common_li2">
                        
						 <?php 	
					if($user_detail['image']!='' && is_file('upload/thumb/'.$user_detail['image'])){
						?> <img src="<?php echo base_url().'upload/thumb/'.$user_detail['image']; ?>" alt=""><?php
					}elseif($user_detail['tw_screen_name']!='' && $user_detail['tw_id']>0) { ?>
	
	<img src="http://api.twitter.com/1/users/profile_image?screen_name=<?php echo $user_detail['tw_screen_name']; ?>&size=bigger" class="uimgimg" />
	
	
	<?php } elseif($user_detail['fb_uid']!='' && $user_detail['fb_uid']>0) { ?>
			    <img src="http://graph.facebook.com/<?php echo $user_detail['fb_uid']; ?>/picture?type=large" alt="" />
				<?php } else { ?>
               				<img src="<?php echo base_url().'upload/thumb/'.$user_detail['image']; ?>" alt="" />
				<?php } ?>
				
							
                        <div class="actcont">
                            	<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>
								 <p style="float:right;"><?php echo date('F d',strtotime($cmt->activity_date));?></p><div class="clr"></div>                                <p><?php echo FOLLOWING_PROJECT; ?>: <a href="<?php echo site_url('projects/'.$following_follow_project_data['url_project_title'].'/'.$following_follow_project_data['project_id']); ?>"><?php echo $following_follow_project_data['project_title'];?></a></p>
                              
                            </div>
                            <div class="clr"></div>
                        </li>
					 <?php break;
					 case 'following_gallery':
                      $following_gallery_project_data = get_one_project($cmt->custom_msg);?>
                     <li class="common_li2">
                        
						 <?php 	
					if($user_detail['image']!='' && is_file('upload/thumb/'.$user_detail['image'])){
						?> <img src="<?php echo base_url().'upload/thumb/'.$user_detail['image']; ?>" alt=""><?php
					}elseif($user_detail['tw_screen_name']!='' && $user_detail['tw_id']>0) { ?>
	
	<img src="http://api.twitter.com/1/users/profile_image?screen_name=<?php echo $user_detail['tw_screen_name']; ?>&size=bigger" class="uimgimg" />
	
	
	<?php } elseif($user_detail['fb_uid']!='' && $user_detail['fb_uid']>0) { ?>
			    <img src="http://graph.facebook.com/<?php echo $user_detail['fb_uid']; ?>/picture?type=large" alt="" />
				<?php } else { ?>
               				<img src="<?php echo base_url().'upload/thumb/'.$user_detail['image']; ?>" alt="" />
				<?php } ?>
				 
							
                         <div class="actcont">
                            	<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>
								<p style="float:right;"><?php echo date('F d',strtotime($cmt->activity_date));?></p><div class="clr"></div>                                <p><?php echo FOLLOWING_GALLERY; ?>: <a href="<?php echo site_url('projects/'.$following_gallery_project_data['url_project_title'].'/'.$following_gallery_project_data['project_id']); ?>"><?php echo $following_gallery_project_data['project_title'];?></a></p>
                               
                            </div>
                            <div class="clr"></div>
                        </li>
					 <?php break;
					 case 'following_updates':
					  $following_updates_project_data = get_one_project($cmt->custom_msg);
					 ?>
                     <li class="common_li2">
                       
						 <?php 	
					if($user_detail['image']!='' && is_file('upload/thumb/'.$user_detail['image'])){
						?> <img src="<?php echo base_url().'upload/thumb/'.$user_detail['image']; ?>" alt=""><?php
					}elseif($user_detail['tw_screen_name']!='' && $user_detail['tw_id']>0) { ?>
	
	<img src="http://api.twitter.com/1/users/profile_image?screen_name=<?php echo $user_detail['tw_screen_name']; ?>&size=bigger" class="uimgimg" />
	
	
	<?php } elseif($user_detail['fb_uid']!='' && $user_detail['fb_uid']>0) { ?>
			    <img src="http://graph.facebook.com/<?php echo $user_detail['fb_uid']; ?>/picture?type=large" alt="" />
				<?php } else { ?>
               				<img src="<?php echo base_url().'upload/thumb/'.$user_detail['image']; ?>" alt="" />
				<?php } ?>
				 
							
                         <div class="actcont">
                            	<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>
								 <p style="float:right;"><?php echo date('F d',strtotime($cmt->activity_date));?></p><div class="clr"></div>                                <p><?php echo FOLLOWING_UPDATES; ?>: <a href="<?php echo site_url('projects/'.$following_updates_project_data['url_project_title'].'/'.$following_updates_project_data['project_id']); ?>"><?php echo $following_updates_project_data['project_title'];?></a></p>					
								 <!--<p><?php // echo UPDATES; ?> : <?php // echo stripslashes($cmt->custom_msg2);?></p>-->
                              
                            </div>
                            <div class="clr"></div>
                        </li>
					 <?php break;
					 case 'following_comment':
					  $following_comment_project_data = get_one_project($cmt->custom_msg);
					 ?>
                     <li class="common_li2">
                       
						 <?php 	
					if($user_detail['image']!='' && is_file('upload/thumb/'.$user_detail['image'])){
						?> <img src="<?php echo base_url().'upload/thumb/'.$user_detail['image']; ?>" alt=""><?php
					}elseif($user_detail['tw_screen_name']!='' && $user_detail['tw_id']>0) { ?>
	
	<img src="http://api.twitter.com/1/users/profile_image?screen_name=<?php echo $user_detail['tw_screen_name']; ?>&size=bigger" class="uimgimg" />
	
	
	<?php } elseif($user_detail['fb_uid']!='' && $user_detail['fb_uid']>0) { ?>
			    <img src="http://graph.facebook.com/<?php echo $user_detail['fb_uid']; ?>/picture?type=large" alt="" />
				<?php } else { ?>
               				<img src="<?php echo base_url().'upload/thumb/'.$user_detail['image']; ?>" alt="" />
				<?php } ?>
				
                        <div class="actcont">
                            	<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>
								 <p style="float:right;"><?php echo date('F d',strtotime($cmt->activity_date));?></p> <div class="clr"></div>                                <p><?php echo FOLLOWING_COMMENT; ?>: <a href="<?php echo site_url('projects/'.$following_comment_project_data['url_project_title'].'/'.$following_comment_project_data['project_id']); ?>"><?php echo $following_comment_project_data['project_title'];?></a></p>
								 <!--<p><?php // echo COMMENT ?>: <?php // echo $cmt->custom_msg2;?></p>-->
                              
                            </div>
                            <div class="clr"></div>
                        </li>
                     <?php 
					 break;
					 case 'following_donation':
					 $following_donation_project_data = get_one_project($cmt->custom_msg);
					 ?>
                     <li class="common_li2">
                       
						 <?php 	
					if($user_detail['image']!='' && is_file('upload/thumb/'.$user_detail['image'])){
						?> <img src="<?php echo base_url().'upload/thumb/'.$user_detail['image']; ?>" alt=""><?php
					}elseif($user_detail['tw_screen_name']!='' && $user_detail['tw_id']>0) { ?>
	
	<img src="http://api.twitter.com/1/users/profile_image?screen_name=<?php echo $user_detail['tw_screen_name']; ?>&size=bigger" class="uimgimg" />
	
	
	<?php } elseif($user_detail['fb_uid']!='' && $user_detail['fb_uid']>0) { ?>
			    <img src="http://graph.facebook.com/<?php echo $user_detail['fb_uid']; ?>/picture?type=large" alt="" />
				<?php } else { ?>
               				<img src="<?php echo base_url().'upload/thumb/'.$user_detail['image']; ?>" alt="" />
				<?php } ?>
				
				 
							
                       <div class="actcont">
                            	<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>
								 <p style="float:right;"><?php echo date('F d',strtotime($cmt->activity_date));?></p><div class="clr"></div>                                <p><?php echo FOLLOWING_DONATION; ?>: <a href="<?php echo site_url('projects/'.$following_donation_project_data['url_project_title'].'/'.$following_donation_project_data['project_id']); ?>"><?php echo $following_donation_project_data['project_title'];?></a></p>					
								 <!--<p><?php // echo AMOUNT; ?>: <?php // echo $cmt->custom_msg2;?></p>-->
                              
                            </div>
                            <div class="clr"></div>
                        </li>
					 <?php break;
					 case 'following_post_project':
					 $following_post_project_data = get_one_project($cmt->custom_msg);
					 ?>
                     <li class="common_li2">
                       
						 <?php 	
					if($user_detail['image']!='' && is_file('upload/thumb/'.$user_detail['image'])){
						?> <img src="<?php echo base_url().'upload/thumb/'.$user_detail['image']; ?>" alt=""><?php
					}elseif($user_detail['tw_screen_name']!='' && $user_detail['tw_id']>0) { ?>
	
	<img src="http://api.twitter.com/1/users/profile_image?screen_name=<?php echo $user_detail['tw_screen_name']; ?>&size=bigger" class="uimgimg" />
	
	
	<?php } elseif($user_detail['fb_uid']!='' && $user_detail['fb_uid']>0) { ?>
			    <img src="http://graph.facebook.com/<?php echo $user_detail['fb_uid']; ?>/picture?type=large" alt="" />
				<?php } else { ?>
               				<img src="<?php echo base_url().'upload/thumb/'.$user_detail['image']; ?>" alt="" />
				<?php } ?>
				
							
                        <div class="actcont">
                            	<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>
								<p style="float:right;"><?php echo date('F d',strtotime($cmt->activity_date));?></p> <div class="clr"></div>
                               <p><?php echo FOLLOWING_POST_PROJECT; ?>: <a href="<?php echo site_url('projects/'.$following_post_project_data['url_project_title'].'/'.$following_post_project_data['project_id']); ?>"><?php echo $following_post_project_data['project_title'];?></a></p>					
								<p><?php echo PROJECT; ?>: <?php echo $following_post_project_data['project_title'];?></p>
                               
                            </div>
                            <div class="clr"></div>
                        </li>
					 <?php 
					 break;
                     case 'myfolloingfollowers':
					$user_info = get_user_detail($cmt->custom_msg);?>
                     <li class="common_li2">
                     
						 <?php 	
					if($user_detail['image']!='' && is_file('upload/thumb/'.$user_detail['image'])){
						?> <img src="<?php echo base_url().'upload/thumb/'.$user_detail['image']; ?>" alt=""><?php
					}elseif($user_detail['tw_screen_name']!='' && $user_detail['tw_id']>0) { ?>
	
	<img src="http://api.twitter.com/1/users/profile_image?screen_name=<?php echo $user_detail['tw_screen_name']; ?>&size=bigger" class="uimgimg" />
	
	
	<?php } elseif($user_detail['fb_uid']!='' && $user_detail['fb_uid']>0) { ?>
			    <img src="http://graph.facebook.com/<?php echo $user_detail['fb_uid']; ?>/picture?type=large" alt="" />
				<?php } else { ?>
               				<img src="<?php echo base_url().'upload/thumb/'.$user_detail['image']; ?>" alt="" />
				<?php } ?>
				 
				 
				 
							
                        <div class="actcont">
                            	<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>
								<p style="float:right;"><?php echo date('F d',strtotime($cmt->activity_date));?></p><div class="clr"></div>                                <p><?php echo MY_FOLLOWERS_FOLLOW; ?>: <a href="<?php echo site_url('member/'.$user_info['user_id']); ?>"><?php echo $user_info['user_name'];?></a></p>
                               
                            </div>
                            <div class="clr"></div>
                        </li>
					
					 <?php break;
					 default:?>
                     <li class="common_li2">
                   
						< <?php 	
					if($user_detail['image']!='' && is_file('upload/thumb/'.$user_detail['image'])){
						?> <img src="<?php echo base_url().'upload/thumb/'.$user_detail['image']; ?>" alt=""><?php
					}elseif($user_detail['tw_screen_name']!='' && $user_detail['tw_id']>0) { ?>
	
	<img src="http://api.twitter.com/1/users/profile_image?screen_name=<?php echo $user_detail['tw_screen_name']; ?>&size=bigger" class="uimgimg" />
	
	
	<?php } elseif($user_detail['fb_uid']!='' && $user_detail['fb_uid']>0) { ?>
			    <img src="http://graph.facebook.com/<?php echo $user_detail['fb_uid']; ?>/picture?type=large" alt="" />
				<?php } else { ?>
               				<img src="<?php echo base_url().'upload/thumb/'.$user_detail['image']; ?>" alt="" />
				<?php } ?>
				
				 
				 
							
                        <div class="actcont">
                            	<a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>
								 <p style="float:right;"><?php echo date('F d',strtotime($cmt->activity_date));?></p><div class="clr"></div>
                                <p><?php echo WELCOME; ?> <?php echo $cmt->user_name;?></p>
                              
                            </div>
                            <div class="clr"></div>
                        </li>
					 
					<?php break;}
								$i++;
								$offset++;	
							}
						
						}
					?>
					</ul>
					
				</div>
             	  
				
                <div class="clear"></div>
                <input type="hidden" id="offset" name="offset" value="<?php echo $offset; ?>"/>
				</div>
				
			<?php } else { ?>
			
			
			<div class="clear"></div>
			
			<div align="center"><?php echo NO_ACTIVITY;?>.</div>
			
			<div class="clear"></div>
			
			<?php } ?>
                   <!-- <p>Sep. 15, 2012 on backers only Update #10: Magic is real! from the project Adan Jodorowsky's "The Voice Thief" Film.</p>-->
                   
              

        </div>
    		
    </div>
	
</section>  
<div align="center" style=" margin:0px auto; " id="last_msg_loader"></div>
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

 				$('#last_msg_loader').html('<div class="clear"></div><h3 class="discover" style="text-align:center;"><img src="<?php echo base_url();?>images/indicator.gif"></h3>');	
				
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