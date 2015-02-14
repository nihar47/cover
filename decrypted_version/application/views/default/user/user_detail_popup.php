<link rel="stylesheet" href="<?php echo base_url();?>css/colorbox.css" />
<link rel="stylesheet" href="<?php echo base_url();?>js/colorbox/colorbox.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>js/colorbox/jquery.colorbox.js"> </script>

<script type="text/javascript">
$(document).ready(function(){
				
				$("#contect_me").click(function(){
				
				$("#contect_me").colorbox({iframe:true, width:"550px", height:"400px", left:"25px", });
				
				});
				
			});
		
</script>
<div class="modal_dialog_body">
  <div id="projectby">
    <div class="top">
      <div class="avatar">
	  	<?php if($user_detail['image']!='' && is_file('upload/thumb/'.$user_detail['image']) ) { ?>

 <a href="<?php echo site_url('member/'.$id); ?>"><img src="<?php echo base_url();?>upload/thumb/<?php echo $user_detail['image']; ?>"  cwidth="220" height="220" class="avatar-large" /></a>

<?php }elseif($user_detail['tw_screen_name']!='' && $user_detail['tw_id']>0) { ?>
	
	<img src="http://api.twitter.com/1/users/profile_image?screen_name=<?php echo $user_detail['tw_screen_name']; ?>&size=bigger" width="220" height="220" class="avatar-large"  />
	
	
	<?php }
elseif($user_detail['fb_uid']!='' && $user_detail['fb_uid']>0) { ?>
 <a href="<?php echo site_url('member/'.$id); ?>">
<img src="http://graph.facebook.com/<?php echo $user_detail['fb_uid']; ?>/picture?type=large" width="220" height="220" class="avatar-large" /></a>

<?php } else {
 ?> 

<a href="<?php echo site_url('member/'.$id); ?>"><img src="<?php echo base_url();?>upload/thumb/no_man.gif" width="220" height="220" class="avatar-large" /></a>

<?php }  ?>
		<?php echo anchor('message/send_message_project_profile/'.$user_detail['user_id'],CONTACT_ME,'id="contect_me" class="contact-button remote_modal_dialog"');?>
	  
      <!--   <ul class="accountability">
         <li class="facebook-connected"> <span class="icon"></span> <span class="text"> <a target="_blank" class="popup" href="http://facebook.com/660319298">Wendy Marvel</a> <span class="number">(393&nbsp;friends)</span> </span> </li>
		  
		  
          <li class="backed-more"><span class="icon"></span><span class="text"> <a  class="more-button remote_modal_dialog" href="javascript://"><?php echo BACKED; ?> <?php echo $num_backers ?> <?php echo PROJECT; ?></a> </span> </li>
        </ul>-->
      </div>
      <div class="info">
        <h3> <a href="javascript://" onclick="goto()"><?php echo getUserNamebyid($user_detail['user_id']) ?></a> </h3>
        <p class="byline"> <span class="location"><a href=""><span class="icon-location"></span> <?php if($user_detail['state']!=""){ echo get_state_name($user_detail['state']); }else{ echo "N/A"." ,";} ?> <?php if($user_detail['country']!=""){ echo get_country_name($user_detail['state'])." ,"; }else{ echo "N/A";} ?></a></span> <span class="divider"></span> <span class="last-login"> <?php echo LAST_LOGIN; ?>
          <?php echo date('M. d, Y',strtotime($last_login)); ?> </span> <span class="divider"> , </span> <span class="view-profile"> 
		  <script>
		  	function goto(){
				parent.window.location.href="<?php echo site_url('member/'.$user_detail['user_id'].'/'.$current_project['project_id']); ?>";
				//parent.$.fn.colorbox.close();
				//window.location.href="<?php // echo site_url('member/'.$user_detail['user_id'].'/'.$current_project['project_id']); ?>";
			}
			
			function goto_project(){
				parent.window.location.href="<?php echo site_url('projects/'.$current_project['url_project_title'].'/'.$current_project['project_id']) ?>";
				//parent.$.fn.colorbox.close();
				//window.location.href="<?php // echo site_url('member/'.$user_detail['user_id'].'/'.$current_project['project_id']); ?>";
			}
		  </script>
		 
		  <a href="javascript://" onclick="goto()"><?php echo FULL_PROFILE; ?></a></span>
        <p><?php echo $user_detail['user_about']; ?></p>
       
        <b class="links-title"><?php echo WEBSITES; ?></b>
        <ul class="links">
		<?php if($user_website){
		
				foreach($user_website as $uw){?>
				<li> <a target="_blank" rel="nofollow" href="http://<?php echo $uw['website_name'] ?>"><?php echo $uw['website_name'] ?></a> </li>				
		<?php		}
				}
		 ?>
          
          
        </ul>
      </div>
    </div><div class="clr"></div>
    <div class="bottom"> <b> <?php echo CREATED_PROJECTS; ?> <span>(1)</span> </b>
      <ul class="created-projects">
        <li class="current"> <a  href="javascript://" onclick="goto_project()">
		<?php
			if($current_project['image']!='' && is_file('upload/orig/'.$current_project['image'])){
										
		 ?>
		<img width="95" height="72" src="<?php echo base_url().'upload/orig/'.$current_project['image']; ?>" alt=""></a> <span class="current-text">Current project</span> 
		<?php 
			}else{?>
					<img width="95" height="72" src="<?php echo base_url().'upload/orig/no_img.jpg'; ?>" alt=""></a> <span class="current-text">Current project</span> 
			<?php }
		?>
		</li>
		
      </ul>
    </div>
  </div>
</div>