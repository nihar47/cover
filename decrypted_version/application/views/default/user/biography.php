<div class="modal_dialog_body">
  <div id="projectby">
    <div class="top">
	
   
      <div class="info">
        <h3> <a href="<?php echo site_url('member/'.$user_detail['user_id']) ?>"><?php echo getUserNamebyid($user_detail['user_id']) ?></a> </h3>
        <p class="byline"> <span class="location"><a href="javascript://"><span class="icon-location"></span> <?php if($user_detail['state']!=""){ echo get_state_name($user_detail['state']); }else{ echo "N/A";} ?>, <?php if($user_detail['country']!=""){ echo get_country_name($user_detail['state']); }else{ echo "N/A";} ?></a></span> <span class="divider"> - </span> <span class="last-login"> <?php echo LAST_LOGIN; ?>
          <?php echo date('M. d, Y',strtotime($last_login)); ?></span> <span class="divider"> - </span> <span class="view-profile"> <script>
		  	function goto(){
				parent.window.location.href="<?php echo site_url('member/'.$user_detail['user_id'].'/'.$current_project['project_id']); ?>";
				//parent.$.fn.colorbox.close();
				//window.location.href="<?php // echo site_url('member/'.$user_detail['user_id'].'/'.$current_project['project_id']); ?>";
			}
		  </script>
		 
		  <a href="javascript://" onclick="goto()"><?php echo FULL_PROFILE; ?></a></span></p>
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
  
  </div>
</div>