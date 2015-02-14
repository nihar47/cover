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
                           <!-- <h1><?php echo PERKS; ?></h1></td></tr>-->
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
                        <div class="complete">
                    <table align="center"><tr><td align="center">
                              <h1><?php echo REVIEW; ?></h1></td></tr>
                            <tr><td>
                           <h2><img src="<?php echo base_url(); ?>/images/rightsign.png" style="margin-top:5px;" alt="" /></h2></td></tr></table>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('start/create_step6/'.$id); ?>">
                        <div class="stepname">
                    <table align="center"><tr><td align="center">
                            <h1><?php echo Payment; ?></h1></td></tr>
                            <tr><td>
                           <h2 class="h2normal">7</h2></td></tr></table>
                        </div>
                    </a>
                </li>
                <li style="margin-right:0;">
                    <a href="<?php echo site_url('start/project_detail_preview/'.$id); ?>">
                        <div class="incompletestep">
                    <table align="center"><tr><td align="center" style="padding: 0 0 5px;margin-top: 10px;">
                            <img src="<?php echo base_url();?>images/eye.png" alt="" class="aimg" style="margin-top: 10px;" /></td></tr>
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
                           <!-- <h1><?php echo PERKS; ?></h1></td></tr>-->
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
                <li>
                    <a href="#">
                        <div class="incompletestep">
                    <table align="center"><tr><td align="center">
                            <h1><?php echo Payment; ?></h1></td></tr>
                            <tr><td>
                            <h2>7</h2></td></tr></table>
                        </div>
                    </a>
                </li>
                <li style="margin-right:0;">
                    <a href="#">
                        <div class="incompletestep">
                    <table align="center"><tr><td align="center" style="padding: 0 0 5px;margin-top: 10px;">
                            <img src="<?php echo base_url();?>images/eye.png" alt="" class="aimg" style="margin-top: 10px;" /></td></tr>
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
				<h2>Initial Payment!</h2>
				<p>Payment before you proceed</p>
			</div>
		<div class="step_cont2">
			
			<div class="step2_left">
			<h2 class="step1header"><?php echo "Payment structure"; ?></h2>
			<p class="step1des"><?php echo MAKE_SURE_YOU_HAVE; ?>:</p><div class="clr"></div>
				<ul class="ruleul">
					<li><?php echo "We will take 5% of the project
1% above the cost on the CC processing
We will credit the $100 towards the project if it is successful. For example, a project wants $5,000… they are successful, they owe us $250 or 5%, minus the $100 they put up front, equals $150 when they are successful.";
 ?></li>
				
				</ul>



                <div class="clr"></div>
				<form ></form>
	<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="E78QMLNAS5ZY4">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_subscribe_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>			
				
				
				
			</div>
				
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
