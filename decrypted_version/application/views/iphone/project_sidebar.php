
<script type="text/javascript" language="javascript">

	
	
$(document).ready(function() {
	

	$("[id^=rating_]").hover(function() {


		rid = $(this).attr("id").split("_")[1];
		$("#rating_"+rid).children("[class^=star_]").children('img').hover(function() {

			$("#rating_"+rid).children("[class^=star_]").children('img').removeClass("hover");

			/* The hovered item number */
			var hovered = $(this).parent().attr("class").split("_")[1];
	
			while(hovered > 0) {
				$("#rating_"+rid).children(".star_"+hovered).children('img').addClass("hover");
				hovered--;
			}

		});
	});

	$("[id^=rating_]").children("[class^=star_]").click(function() {
	
	
		
		var current_star = $(this).attr("class").split("_")[1];
		var rid = $(this).parent().attr("id").split("_")[1];


	
		$('#rating_'+rid).load('<?php echo site_url(); ?>project/rate_project/',{id:rid,rating:current_star});
		

		

	});




});
	
	
</script>

<link href="<?php echo base_url(); ?>css/rating.css" rel="stylesheet" type="text/css" />

<div class="sidebar">

<div class="clear"></div>


<div style="padding: 10px 10px 10px 10px;-moz-border-radius: 8px;-webkit-border-radius: 8px;background: #FAFAFA;border: 1px solid lightGrey; height:75px; width:263px; margin-bottom:10px;">

<table border="0" cellpadding="0" cellspacing="0">

<tr>
<td align="left" valign="top" rowspan="2"><?php if($user_image!='' && is_file('upload/thumb/'.$user_image) ) { ?>

 <a href="<?php echo site_url('member/'.$project['user_id']); ?>"><img src="<?php echo base_url();?>upload/thumb/<?php echo $user_image; ?>" height="72" width="72" border="0" style=" border:1px solid lightGrey;" /></a>

<?php }elseif($user_detail['tw_screen_name']!='' && $user_detail['tw_id']>0) { ?>
	
	<img src="http://api.twitter.com/1/users/profile_image?screen_name=<?php echo $user_detail['tw_screen_name']; ?>&size=bigger" border="0" height="72" width="72" style=" border:1px solid lightGrey;"  />
	
	
	<?php }
elseif($user_detail['fb_uid']!='' && $user_detail['fb_uid']>0) { ?>
 <a href="<?php echo site_url('member/'.$project['user_id']); ?>">
<img src="http://graph.facebook.com/<?php echo $user_detail['fb_uid']; ?>/picture?type=large" height="72" width="72" border="0" style=" border:1px solid lightGrey;" /></a>

<?php } else {
 ?> 

<a href="<?php echo site_url('member/'.$project['user_id']); ?>"><img src="<?php echo base_url();?>upload/thumb/no_man.gif" height="72" width="72" border="0" style=" border:1px solid lightGrey;" /></a>

<?php }  ?>

</td>

<td align="left" valign="middle" style="padding-left:15px; font-weight:bold; font-size:16px;"><?php echo anchor('member/'.$project['user_id'],$user_name.' '.$last_name,'style="color:#114A75;text-transform:capitalize; "'); ?></td>

</tr>


<tr><td align="left" valign="middle" style="padding-left:15px; text-transform:capitalize; font-size:14px;"><?php echo $user_city;
if($user_state!='') { echo ','.$user_state; } ?></td></tr>

</table>


</div>


<div class="clear"></div>



<?php

		if($project['amount'] == '0' or $project['amount'] == '')
		{
			$w = 0;
		}else{		
			if($project['amount_get']>=$project['amount'])
			{
				$w=100;
			}
			else
			{
				$w = ($project['amount_get']/$project['amount'])*100;
				
							if($w>0 && $w<1)
							{
								$w=1;
							}
								
								
			}
		}		
		if($project['vote'] != "")
		{
			$r = (($project['total_rate']/$project['vote'])*100)/5;
		}else{
			$r = 0;
		}
		
	?>
	<div class="donate_link">
		<div class="title" style="margin-top: -9px;">
			<?php if($w==0) { ?>
					
			<?php echo set_currency('0'); ?> 
				
				<?php } else { ?>					
		<?php 
				
				if($project['amount_get']=='')
		 		{ 
					echo set_currency('0');  
		 		 } 				 
		  		else { 
		  			
					echo set_currency($project['amount_get']);
		   			
					}			
							
			 } ?>
				
		</div>
		<div class="dtarget">			
			<div class="tgren" style="width:<?php echo $w; ?>%;max-width:100%;"></div>			
			<div class="txt"><?php printf(RISE_OF_GOAL,set_currency($project['amount']));?></div>
		</div>
		<div class="dl">
			<?php
				/*$date1 = $project['end_date'];
				$date2 = date("Y-m-d");
				$diff =abs(strtotime($date1) - strtotime($date2));
				if(strtotime($project['end_date'])>strtotime(date('Y-m-d'))) 
				{
				$temp = floor($diff / (60*60*24));
				
				echo ($project['end_date']!="0000-00-00")?$temp."<br /><p>Days Left</p>":"<br /><p>&nbsp;</p>";
				}else {
				//echo ($project['end_date']!="0000-00-00")?$temp."<br /><p>Days Left</p>":"<br /><p>&nbsp;</p>";
				}*/
				$dateg = $project['end_date'];
				$date1 = $dateg;
				$date2 = date("Y-m-d");
				$diff = abs(strtotime($date2) - strtotime($date1));
				$test = floor($diff / (60*60*24));
				$str = '';
				
		//echo strtotime(date('Y-m-d',strtotime($dateg))).'=='.strtotime(date('Y-m-d'));exit;
			
			if(strtotime(date('Y-m-d',strtotime($dateg))) > strtotime(date('Y-m-d'))) 
			{
				$temp = floor($diff / (60*60*24));
			
				$str = ($dateg!="0000-00-00 00:00:00")?$test."<br /><p>".DAYS_LEFT."</p>":"<br /><p>&nbsp;</p>";
			}else {
				//strtotime(date('Y-m-d H:i:s',strtotime($rs->end_date))).'='.strtotime(date('Y-m-d H:i:s'));
				/*if(strtotime(date('Y-m-d',strtotime($dateg))) == strtotime(date('Y-m-d'))) {
					$explode = explode(' ',$dateg);
					$time = $explode[1];
					if($time='00:00:00'){
						$str = date('H',strtotime(date('Y-m-d H:i:s',strtotime($dateg)))-strtotime(date('Y-m-d H:i:s'))).' '.'<br /><p>'.HOURS_LEFT.'</p>';
					}
					else{
						$str = "0 "."<br /><p>".DAYS_LEFT."</p>";
					}
				}
				else{
					$str = "0 "."<br /><p>".DAYS_LEFT."</p>";
				}*/
				
				$hours = 0;
				$minuts = 0;
				 $dategg = $dateg;
				 $date2 = date('Y-m-d H:i:s');
//echo strtotime($dategg);echo '='.strtotime(date('Y-m-d H:i:s'));
		if(strtotime($dategg) > strtotime(date('Y-m-d H:i:s'))) 
		{					
			
			//echo $date2;
			$diff2 = abs(strtotime($dategg) - strtotime($date2));
			$day1 = floor($diff2 / (60*60*24));
			
		
			$hours   = floor(($diff2 - $day1*60*60*24)/ (60*60));  
			$minuts  = floor(($diff2 - $day1*60*60*24 - $hours*60*60)/ 60); 
			$seconds = floor(($diff2 - $day1*60*60*24 - $hours*60*60 - $minuts*60)); 
			
			if($hours != 0 || $minuts!=0 || $seconds!=0){
				//echo date('H',strtotime(date('Y-m-d H:i:s',strtotime($dateg)))-strtotime(date('Y-m-d H:i:s'))).'<br /><p>Hours Left</p>';
				//echo $project['end_date'];
				
						$str = $hours."<br /> <p>".HOURS_LEFT."</p>";
						if($hours != 0){						
							$str = $hours."<br /> <p>".HOURS_LEFT."</p>";
						}
						elseif($minuts != 0) { 
							$str = $minuts."<br /> <p>".MINUTES_LEFT."</p>";
						}
						else{
							$str = $seconds."<br /> <p>".SECONDS_LEFT."</p>";
						}
						
					}
					else
					{
						$str = "0 <br /> <p>".DAYS_LEFT."</p>";
					}
				}
				else
				{
					$str = "0 <br /> <p>".DAYS_LEFT."</p>";
				}
					
				
			}
			echo $str;
			?>
		</div>
		<div class="drr">
			<?php  echo RATING;?> :




<?php 

if($project['total_rate']>1 && $project['vote']>1)
{
$rate=($project['total_rate'])/($project['vote']);
}else {

$rate=0.0;
} 


?>
<div style=" margin-top:3px;">
<form method="post" action="">
<div class="floatleft">
		<div id="rating_<?php echo $project['project_id']; ?>">
			<span class="star_1"><img src="<?php echo base_url();?>images2/star_blank.png" alt="" <?php if($rate > 0) { echo"class='hover'"; } ?>   /></span>
			<span class="star_2"><img src="<?php echo base_url();?>images2/star_blank.png" alt="" <?php if($rate > 1.5) { echo"class='hover'"; } ?> /></span>
			<span class="star_3"><img src="<?php echo base_url();?>images2/star_blank.png" alt="" <?php if($rate > 2.5) { echo"class='hover'"; } ?> /></span>
			<span class="star_4"><img src="<?php echo base_url();?>images2/star_blank.png" alt="" <?php if($rate > 3.5) { echo"class='hover'"; } ?> /></span>
			<span class="star_5"><img src="<?php echo base_url();?>images2/star_blank.png" alt="" <?php if($rate > 4.5) { echo"class='hover'"; } ?> /></span>
		</div>
	</div>
	
	</form>

</div>	
	
	
		</div>
		<div class="clear"></div>
		<form action="#">
		<div class="dright">
			<p><?php echo ONLINE_BACKING_EASY; ?></p>			
				
				
				<?php 
				
				$projemail=$this->project_model->get_project_owner_email($project['project_id']); 
   				$projtoken=$this->project_model->get_project_owner_token($project['project_id']);
				
				$paypal_adptive_status=$this->project_model->get_paypal_adptive_status();
				$paypal_normal_status=$this->project_model->get_paypal_normal_status();
				$amazon_status=$this->project_model->get_amazon_status();
				$wallet_status=$this->project_model->get_wallet_status();
				
				
				if($project['user_id'] != $this->session->userdata('user_id')){
				
					if($paypal_adptive_status=='1' ||  $paypal_normal_status=='1' || $amazon_status=='1' || $wallet_status=='1')
					{
					
						 if($project['active']==1) { 
						
							/*if(strtotime($dateg) >= strtotime(date('Y-m-d H:i:s'))) 
							{
								 echo anchor('reward/'.$project['project_id'], PROJECT_BACK_THIS_PROJECT);
								 
							}else {
								//strtotime(date('Y-m-d H:i:s',strtotime($rs->end_date))).'='.strtotime(date('Y-m-d H:i:s'));
								if(strtotime(date('Y-m-d H:i:s',strtotime($dateg))) > strtotime(date('Y-m-d H:i:s'))) {
									$explode = explode(' ',$dateg);
									$time = $explode[1];
									if($time='00:00:00'){
										 echo anchor('reward/'.$project['project_id'], PROJECT_BACK_THIS_PROJECT);
									}
									
								}
							}	*/
							
							if(strtotime($dateg) >= strtotime(date('Y-m-d H:i:s'))) 
							{
								 if($projemail==1)  {
								
									 echo anchor('reward/'.$project['project_id'], PROJECT_BACK_THIS_PROJECT);
																 
								 } elseif($projtoken=='1') {
								 
									echo anchor('reward/'.$project['project_id'], PROJECT_BACK_THIS_PROJECT ); 						 
								 }
								 elseif($wallet_status=='1'){
									echo anchor('reward/'.$project['project_id'], PROJECT_BACK_THIS_PROJECT);
								 }
								 else{
								 
								 }
							} 
						 }
					 }
				 }
				 
				 
				 ?>
				
				
				
			</div>
		</form>
	</div>
	
	<!--<div class="dques"><a href="#">Question about this project?</a></div>-->
	

	
	<div class="clear"></div>
	<?php
		if($all_perks)
		{ ?>
	<div style="margin-top:10px;">
	
<ul class="common_li" style="width:263px;">
		
	<?php
		if($all_perks)
		{
			foreach($all_perks as $perk)
			{
				$available = $perk['perk_total'] - ($perk['perk_get']*1);
				
				
	?>
		<li>
		<h2>
		<?php if($available=='0'){  ?>
		
		<span style="color:#434343 !important; text-transform:capitalize; "><?php echo strtoupper($perk['perk_title']); ?></span>
		
		<?php } else { 	
		
		if($project['user_id'] != $this->session->userdata('user_id')){
				
		if($paypal_adptive_status=='1' ||  $paypal_normal_status=='1' || $amazon_status=='1' || $wallet_status=='1')
				{
				
					 if($project['active']==1) { 
					
						
						if(strtotime($dateg) >= strtotime(date('Y-m-d H:i:s')))  
						{
							 							
							
							
							 if($projemail==1)  {  ?>
							
								<a href="<?php echo site_url('reward/'.$project['project_id'].'/'.$perk['perk_id']); ?>" style="color:#434343 !important; text-transform:capitalize;"><?php echo strtoupper($perk['perk_title']); ?></a>
								 							 
						<?php	 } elseif($projtoken=='1') {  ?>
							 
								<a href="<?php echo site_url('reward/'.$project['project_id'].'/'.$perk['perk_id']); ?>" style="color:#434343 !important; text-transform:capitalize;"><?php echo strtoupper($perk['perk_title']); ?></a>
													 
						<?php 	 } else { ?>
							 
							 <span style="color:#434343 !important; text-transform:capitalize; "><?php echo strtoupper($perk['perk_title']); ?></span>
							 
							<?php }  
						 
						 
							 
						}elseif(strtotime($dateg) >= strtotime(date('Y-m-d H:i:s')))  {
								$explode = explode(' ',$dateg);
								$time = $explode[1];
								if($time='00:00:00'){
																
							
							
							 if($projemail==1)  {  ?>
							
								<a href="<?php echo site_url('reward/'.$project['project_id'].'/'.$perk['perk_id']); ?>" style="color:#434343 !important; text-transform:capitalize;"><?php echo strtoupper($perk['perk_title']); ?></a>
								 							 
						<?php	 } elseif($projtoken=='1') {  ?>
							 
								<a href="<?php echo site_url('reward/'.$project['project_id'].'/'.$perk['perk_id']); ?>" style="color:#434343 !important; text-transform:capitalize;"><?php echo strtoupper($perk['perk_title']); ?></a>
													 
						<?php 	 } else { ?>
							 
							 <span style="color:#434343 !important; text-transform:capitalize; "><?php echo strtoupper($perk['perk_title']); ?></span>
							 
							<?php }  
						 
						 
								}
								
							}
						}	
						
						 else { //if(strtotime($project['end_date'])>=strtotime(date('Y-m-d H:i:s'))) {}  ?>
							 
							 <span style="color:#434343 !important; text-transform:capitalize; "><?php echo strtoupper($perk['perk_title']); ?></span>
							 
							<?php } 
						 
						 
					 
					 }else { ?>
							 
							 <span style="color:#434343 !important; text-transform:capitalize; "><?php echo strtoupper($perk['perk_title']); ?></span>
							 
							<?php } 
							
							}else{
							
								?>
							 
							 <span style="color:#434343 !important; text-transform:capitalize; "><?php echo strtoupper($perk['perk_title']); ?></span>
							 
							<?php
							}
					 
				}  ?>
		
		
	 <?php  ?>
		
		</h2>
			<p><span style="color:#7DBF0E; font-weight:bold;"><?php echo set_currency($perk['perk_amount']); ?> <?php echo OR_MORE; ?> : </span><?php echo $perk['perk_description']; ?></p>
			<div style="color:#114A75;margin:4px 0px 5px 0px;"><h3 style="font-weight:normal;"><?php echo ($perk['perk_get']*1); ?> <?php echo CLAIMED; ?> - <?php echo $available; ?> <?php echo AVAILABLE;?></h3></div>
			
			<div> <?php if($available=='0'){ 
			
			//echo "Claim this perk";
			
			 }else{  
			 
		if($project['user_id'] != $this->session->userdata('user_id')){
			 
		if($paypal_adptive_status=='1' ||  $paypal_normal_status=='1' || $amazon_status=='1' || $wallet_status=='1')
				{
				
					 if($project['active']==1) {
					 
					 
					 	if(strtotime($dateg) >= strtotime(date('Y-m-d H:i:s'))) 
							{
								 if($projemail==1)  {
								
									 ?><a href="<?php echo site_url('reward/'.$project['project_id'].'/'.$perk['perk_id']); ?>" class="back_this" >Back This</a> <?php
																 
								 } elseif($projtoken=='1') {
								 
									?><a href="<?php echo site_url('reward/'.$project['project_id'].'/'.$perk['perk_id']); ?>" class="back_this" >Back This</a> <?php				 
								 }
								 elseif($wallet_status=='1'){
									?><a href="<?php echo site_url('reward/'.$project['project_id'].'/'.$perk['perk_id']); ?>" class="back_this" >Back This</a> <?php
								 }
								 else{
								 
								 }
							}
							 
					
					/*	if(strtotime($dateg) >= strtotime(date('Y-m-d H:i:s'))) 
						{
							 	 if($projemail==1)  {  ?>
							
								<a href="<?php echo base_url();?>reward/<?php echo $project['project_id'].'/'.$perk['perk_id']; ?>" class="back_this" >Back This</a> 
								 							 
						<?php	 } elseif($projtoken=='1') {  ?>
							 
								<a href="<?php echo base_url();?>reward/<?php echo $project['project_id'].'/'.$perk['perk_id']; ?>" class="back_this" >Back This</a> 
                               <!-- <a href="<?php //echo base_url();?>reward/<?php //echo $project['project_id'].'/'.$perk['perk_id']; ?>" ><img src="<?php //echo base_url();?>images2/o.gif" border="0"  onmouseover="this.src='<?php //echo base_url();?>images2/back_this_hover.gif'" onmouseout="this.src='<?php //echo base_url();?>images2/back_this.gif'" /></a> -->
													 
						<?php 	 } else { ?>
							 
							<!-- <span style="color:#434343 !important; text-transform:capitalize; "><?php //echo strtoupper($perk['perk_title']); ?></span>-->
							 
							<?php }  
							 
						}elseif(strtotime($dateg) >= strtotime(date('Y-m-d H:i:s')))  {
								$explode = explode(' ',$dateg);
								$time = $explode[1];
								if($time='00:00:00'){
										 if($projemail==1)  {  ?>
							
								<a href="<?php echo base_url();?>reward/<?php echo $project['project_id'].'/'.$perk['perk_id']; ?>" class="back_this" >Back This</a> 
								 							 
						<?php	 } elseif($projtoken=='1') {  ?>
							 
								<a href="<?php echo base_url();?>reward/<?php echo $project['project_id'].'/'.$perk['perk_id']; ?>" class="back_this" >Back This</a> 
                               <!-- <a href="<?php //echo base_url();?>reward/<?php //echo $project['project_id'].'/'.$perk['perk_id']; ?>" ><img src="<?php //echo base_url();?>images2/o.gif" border="0"  onmouseover="this.src='<?php //echo base_url();?>images2/back_this_hover.gif'" onmouseout="this.src='<?php //echo base_url();?>images2/back_this.gif'" /></a> -->
													 
						<?php 	 } else { ?>
							 
							<!-- <span style="color:#434343 !important; text-transform:capitalize; "><?php //echo strtoupper($perk['perk_title']); ?></span>-->
							 
							<?php }  
								}
								
							}*/
						}	
					
					/*	if(strtotime($project['end_date'])>=strtotime(date('Y-m-d H:i:s'))) {							
							
							
						
						 
						 }*/
					 
					 }
					 
					}
					 
					 
				} /* else { 			 		
		?>
		
	<!--	<span style="color:#434343 !important; text-transform:capitalize; "><?php //echo strtoupper($perk['perk_title']); ?></span>-->
		
		<?php */ } ?>
		
			 
			 
		
			
			
			
	
			
			
			<?php  } ?></div>
			
			<div style="height:1px;background:#ffffff;"></div>
			
			</li>
			
		
	<?php
			}
		//}
	?>
		
	<?php
		/*if($donation)
		{
			foreach($donation as $dn)
			{
				$temp_time = explode(" ",$dn->transaction_date_time);
	?>
				<li>
				<div class="do-thumb"><!--<img src="<?php //echo base_url().$color; ?>/images/rec-pic1.png" alt="" />-->
				<div>$<?php echo $dn->amount; ?></div>
				</div>
				<div id="con-right"> <span><!--36 Minutes ago--><?php echo $temp_time[0]; ?></span>
				<p class="donation"><?php echo $this->home_model->text_echo('From'); ?> <span><?php echo $dn->name; ?></span> <?php echo $this->home_model->text_echo('to'); ?> <strong><?php echo $dn->project_title; ?></strong> <br />
				<!--<a href="#">-->Save the Whales Campaign<!--</a>--></p>
				</div>
				</li>
	<?php
			}
		}*/
	?>
	</ul>
	
	</div>
	
	<?php //} ?>
	
	<div class="clear"></div>
</div>