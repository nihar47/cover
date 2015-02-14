<link rel="stylesheet" href="<?php echo base_url();?>css/colorbox.css" />
<link rel="stylesheet" href="<?php echo base_url();?>js/colorbox/colorbox.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>js/colorbox/jquery.colorbox.js"> </script>

<script type="text/javascript">
$(document).ready(function(){
		$('.stepname').mouseover(function(){
			
			$('.stepname h2').addClass('h2hover');
		});
		
		$('.stepname').mouseover(function(){
			
			$('.stepname h2').addClass('h2hover');
		});
		
		
		
		$('.stepname').mouseout(function(){
			$('.stepname h2').removeClass('h2hover');
			$('.stepname h2').addClass('h2normal');
		});
	});
$(document).ready(function(){
				$("#iframe").colorbox({iframe:true, width:"490px", height:"250px"});
			});
		
</script>

<?php $user_info = get_user_detail(get_authenticateUserID());?>
<section>
	<div id="page_we">
      <ul class="stepul">
        	
          <?php   if($id!='' and $id!='0'){?>
        		<li>
            	<a href="<?php echo site_url('start/guideline/'.$id);?>">
                	<div class="complete">
				<table align="center"><tr><td align="center">

                    	<h1><?php echo GUIDELINES; ?></h1></td></tr>
				<tr><td align="center">
                        <h2><img src="<?php echo base_url(); ?>/images/rightsign.png" style="margin-top:5px;" alt="" /></h2></td></tr></table>
                    </div>
                </a>
            </li>
                <li>
                    <a href="<?php echo site_url('start/create_step1/'.$id);?>">
                        <div class="complete">
                    <table align="center"><tbody><tr><td align="center">
                            <h1><?php echo BASICS; ?></h1></td></tr>
                            <tr><td>
                            <h2><img src="<?php echo base_url(); ?>/images/rightsign.png" style="margin-top:5px;" alt="" /></h2></td></tr></tbody></table>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('start/create_step2/'.$id); ?>">
                        <div class="complete">
                    <table align="center"><tr><td align="center">
                            <!--<h1><?php echo PERKS; ?></h1></td></tr>-->
                            <h1><?php echo iGift; ?></h1></td></tr>
    						<tr><td>
                             <h2><img src="<?php echo base_url(); ?>/images/rightsign.png" style="margin-top:5px;" alt="" /></h2>
                           </td></tr></table>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('start/create_step3/'.$id); ?>">
                        <div class="complete">
                    <table align="center"><tr><td align="center">
                            <h1><?php echo PROJECT_DETAILS; ?></h1></td></tr>
                            <tr><td>
                           <h2><img src="<?php echo base_url(); ?>/images/rightsign.png" style="margin-top:5px;" alt="" /></h2> </td></tr></table>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('start/create_step4/'.$id); ?>">
                        <div class="complete">
                    <table align="center"><tr><td align="center">
                            <h1><?php echo ACCOUNT_DETAILS; ?></h1></td></tr>
                            <tr><td>
                            <h2><img src="<?php echo base_url(); ?>/images/rightsign.png" style="margin-top:5px;" alt="" /></h2></td></tr></table>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('start/create_step5/'.$id); ?>">
                        <div class="stepname">
                    <table align="center"><tr><td align="center">
                            <h1><?php echo REVIEW; ?></h1></td></tr>
                            <tr><td>
                           <h2 class="h2normal">6</h2></td></tr></table>
                        </div>
                    </a>
                </li>
               <li>
                    <a href="<?php echo site_url('start/project_detail_preview/'.$id); ?>">
                        <div class="incompletestep">
                    <table align="center"><tr><td align="center" style="padding: 0 0 5px;margin-top: 10px;">
                            <img src="<?php echo base_url();?>images/eye.png" alt="" class="aimg" style="margin-top: 10px;" /></td></tr>
                            <tr><td>
                            <h2>7</h2></td></tr></table>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('start/launch_payment/'.$id); ?>">
                        <div class="incompletestep">
                    <table align="center"><tr><td align="center">
                            <h1><?php echo Payment; ?></h1></td></tr>
                            <tr><td>
                            <h2>8</h2></td></tr></table>
                        </div>
                    </a>
                </li>
          <?php }else{?>
                  <li>
                    <a href="#">
                        <div class="stepname">
                    <table align="center"><tbody><tr><td align="center">
                            <h1><?php echo BASICS; ?></h1></td></tr>
                            <tr><td>
                            <h2 class="h2normal">2</h2></td></tr></tbody></table>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="incompletestep">
                    <table align="center"><tr><td align="center">
                            <!--<h1><?php echo PERKS; ?></h1></td></tr>-->
                             <h1><?php echo iGift; ?></h1></td></tr>
    
                            
                           <tr><td>
                            <h2>3</h2></td></tr></table>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="incompletestep">
                    <table align="center"><tr><td align="center">
                            <h1><?php echo PROJECT_DETAILS; ?></h1></td></tr>
                            <tr><td>
                            <h2>4</h2></td></tr></table>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="incompletestep">
                    <table align="center"><tr><td align="center">
                            <h1><?php echo ACCOUNT_DETAILS; ?></h1></td></tr>
                            <tr><td>
                            <h2>5</h2></td></tr></table>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="incompletestep">
                    <table align="center"><tr><td align="center">
                            <h1><?php echo REVIEW; ?></h1></td></tr>
                            <tr><td>
                            <h2>6</h2></td></tr></table>
                        </div>
                    </a>
                </li>
               <!--  <li>
                    <a href="#">
                        <div class="incompletestep">
                    <table align="center"><tr><td align="center">
                            <h1><?php echo Payment; ?></h1></td></tr>
                            <tr><td>
                            <h2>7</h2></td></tr></table>
                        </div>
                    </a>
                </li>-->
                <li>
                    <a href="#">
                        <div class="incompletestep">
                    <table align="center"><tr><td align="center" style="padding: 0 0 5px;margin-top: 10px;">
                            <img src="<?php echo base_url();?>images/eye.png" alt="" class="aimg" style="margin-top: 10px;" /></td></tr>
                            <tr><td>
                            <h2>7</h2></td></tr></table>
                        </div>
                    </a>
                </li>
				  <li>
                    <a href="javascript://">
                        <div class="incompletestep">
                    <table align="center"><tr><td align="center">
                            <h1><?php echo Payment; ?></h1></td></tr>
                            <tr><td>
                            <h2>8</h2></td></tr></table>
                        </div>
                    </a>
                </li>
           	        	
		   <?php }?> 
            
        </ul>
		
		 <?php
				$attributes = array('id'=>'frm_project','name'=>'frm_project');
				echo form_open_multipart('start/create_step5/'.$id, $attributes);
	  		?>
		
		<div class="step_cont_top">
				<h2>The homestretch!</h2>
				<p>Tell people who you are! Supporting links are always nice.</p>
			</div>
		<div class="step_cont2">
			
			<div class="step2_left">
			<h2 class="step1header"><?php echo PROJECT_GUIDELINES; ?></h2>
			<p class="step1des"><?php echo MAKE_SURE_YOU_HAVE; ?>:</p><div class="clr"></div>
				<ul class="ruleul">
					<li><?php echo CLEARLY_EXPLAINED_WHAT_YOURE_RAISING_FUNDS_TO_DO; ?></li>
					<li><?php echo ADDED_A_VIDEO_ITS_THE_BEST_WAY_TO_CONNECT_WITH_YOUR_BACKERS; ?></li>
					<li><?php echo CREATED_A_SERIES_OF_WELL_PRICED_FUN_REWARDS_NOT_JUST_THANK_YOUS ?>!</li>
					<li><?php echo PREVIEWED_YOUR_PROJECT_AND_GOTTEN_FEEDBACK_FROM_A_FRIEND; ?></li>
					<li><?php echo CHECKED_OUT_OTHER_PROJECTS_ON_CROWDCHEQUE_AND_BACKED_ONE_TO_GET_A_FEEL_FOR_THE_EXPERIENCE; ?></li>
				</ul><div class="clr"></div>
				
				
				
				<h2 class="step1header"><?php echo AFTER_YOU_SUBMIT; ?></h2>
			<p class="step1des"><?php echo ONCE_YOUVE_DONE_EVERYTHING_LISTED_ABOVE_AND_SUBMITTED_YOUR_PROJECT_FOR_REVIEW; ?>.</p><div class="clr"></div>
			<!--	<ul class="ruleul">
					<li><?php echo YOUR_PROJECT_WILL_BE_REVIEWED_TO_ENSURE_IT_MEETS_THE_PROJECT_GUIDELINES; ?></li>
					<li><?php echo WITHIN_A_FEW_DAYS_WELL_SEND_YOU_A_MESSAGE_ABOUT_THE_STATUS_OF_YOUR_PROJECT; ?> </li>
					<li><?php echo IF_APPROVED_YOU_CAN_LAUNCH_WHENEVER_YOURE_READY; ?></li>
					
				</ul>-->
				
			</div>
				<div class="step2_right">
                
                <?php 
				if(is_file('upload/thumb/'.$project['image']))
					{
						$img = $project['image'];
					
					}else{
					$img = NO_IMAGE;
					}
					
					if(is_file('upload/thumb/'.$project['image'])){
					?> <img src="<?php echo base_url().'upload/thumb/'.$img; ?>" alt="" class="preimg"/><?php
					}else{ ?>
					<img src="<?php echo base_url().'upload/thumb/'.$img; ?>" alt="" class="preimg">
					<?php } ?>
                    
				<p class="prep1"><?php if($project['project_title'] != ''){echo $project['project_title'];}else{echo "N/A";}?></p>
				<p class="prep2"><?php echo BY; ?> <?php echo $user_info['user_name'];?></p>
				<p class="prep1" style="float:left;">Status : &nbsp;</p><p class="prep2"><?php if($project['project_draft'] == 0){echo "Save in draft";} else{echo "No";}?> </p>
				
				
					
		
			</div>
		</div>
    </div>
	<div class="setp2btm">
	<div id="page_we">
    
     <input type="hidden"  name="id" id="id"  value="<?php echo $id; ?>" />
    	<input type="submit"  name="back" id="back" class="stepbtn" border="none" style="margin-left:346px;"  title="<?php echo BACK; ?>" value="<?php echo BACK; ?>" />
		<!--<input type="submit"  name="draft" id="draft" class="stepbtn" border="none"  title="<?php echo SAVE; ?>" value="<?php echo SAVE; ?>"/>-->
		<input type="submit"  name="next" id="next" class="stepbtn" border="none"  title="<?PHP echo NEXT; ?>" value="<?PHP echo NEXT; ?>"/>
		
		 <?php echo anchor('start/deleteproject_popup/'.$id,'Delete Project','id="iframe" class="deleteprj"'); ?> 
		<?php echo anchor('home','EXIT','class="exitp"');?>
	</div>
	</div>
	
</section>
