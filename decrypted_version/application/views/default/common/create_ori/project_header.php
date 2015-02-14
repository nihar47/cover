<header id="header">
	<div id="page_we">
    	<a href="<?php echo site_url('home')?>" title="Kickstarter"><img src="<?php echo base_url(); ?>/upload/orig/<?php echo $site_setting['site_logo'];?>" class="new_l"/></a>

        <style>
			.projectheader{ margin:0; padding:0; float:right; list-style:none;}
			.projectheader li{ float:left; margin:0; padding:0;}
			.projectheader li .notyou{ margin:38px 5px 0 5px; display:inline-block;}
        </style>
      	<ul class="projectheader">
        <li>
      		<div class="prof">
 			 <p class="projectheader_user">
             <?php $userimg=get_user_detail(get_authenticateUserID()); ?>
		<?php 
			if(is_file('upload/thumb/'.$userimg['image']))
						{
							$img = $userimg['image'];
						}else{
							$img = 'no_man.gif';
						}
			
		 ?>
             <a href="<?php echo site_url('user/profile/'.$userimg['user_id']);?>">
			 <?php 
			 if(is_file('upload/thumb/'.$userimg['image'])){
						?> <img src="<?php echo base_url().'upload/thumb/'.$img; ?>" alt=""class="luserimg"/><?php
					}elseif($userimg['tw_screen_name']!='' && $userimg['tw_id']>0) { ?>
	
	<img src="http://api.twitter.com/1/users/profile_image?screen_name=<?php echo $userimg['tw_screen_name']; ?>&size=bigger" class="luserimg" />
	
	
	<?php } elseif($userimg['fb_uid']!='' && $userimg['fb_uid']>0) { ?>
			    <img src="http://graph.facebook.com/<?php echo $userimg['fb_uid']; ?>/picture?type=large" alt="" class="luserimg"/>
				<?php } else { ?>
               				<img src="<?php echo base_url().'upload/thumb/'.$img; ?>" alt="" class="luserimg" />
				<?php } ?>
             </a>
            <?php echo getUserProfileName();?></p>
        </div>
       	</li>
        <li>
       	 <ul class="loginul1">
            <li style="padding-right:5px; margin-right:5px;"><a href="<?php echo site_url('help')?>"><?php echo HELP?></a></li>
			<li  style="border-right:none; margin-right:0;">
        	 <?php echo anchor('home/logout','Not You ?')?>
       		 </li>
        </ul>
        </li>
        
		</ul>
		
        
        
        
        
    </div>
	
		
		 
      
</header>