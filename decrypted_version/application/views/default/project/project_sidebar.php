
<link rel="stylesheet" href="<?php echo base_url();?>css/colorbox.css" />
<link rel="stylesheet" href="<?php echo base_url();?>js/colorbox/colorbox.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>js/colorbox/jquery.colorbox.js"> </script>

<script type="text/javascript">
$(document).ready(function(){
$("#iframe").colorbox({iframe:true, width:"490px", height:"250px"});
$("#contect_me").colorbox({iframe:true, width:"630px", height:"350px"});
$("#profile_detail_popup").colorbox({iframe:true, width:"660px", height:"660px"});
$("#profile_detail_popup1").colorbox({iframe:true, width:"660px", height:"660px"});
$(".embedbtn").colorbox({iframe:true, width:"600px", height:"558px"});
$("#ask").colorbox({iframe:true, width:"630px", height:"350px"});
$("#ask_p_c").colorbox({iframe:true, width:"630px", height:"350px"});
$("#ask_p_c1").colorbox({iframe:true, width:"630px", height:"350px"});

		
});


</script>

	<?php

		if($one_project['amount'] == '0' or $one_project['amount'] == '')
		{
			$w = 0;
		}else{		
			if($one_project['amount_get']>=$one_project['amount'])
			{
				$w=100;
			}
			else
			{
				$w = ($one_project['amount_get']/$one_project['amount'])*100;
				
							if($w>0 && $w<1)
							{
								$w=1;
							}
								
								
			}
		}		
		if($one_project['vote'] != "")
		{
			$r = (($one_project['total_rate']/$one_project['vote'])*100)/5;
		}else{
			$r = 0;
		}
		
	?>
			 <div class="project_right">
            	<div class="poverview">
                	<h2><?php echo $project_backers?></h2>
                    <p><?php echo BACKERS ?></p>
                    <h2><?php if($w==0) { ?>
					
			<?php echo set_currency('0'); ?> 
				
				<?php } else { ?>					
		<?php 
				
				if($one_project['amount_get']=='')
		 		{ 
					echo set_currency('0') ;  
		 		 } 				 
		  		else { 
		  			
					echo set_currency($one_project['amount_get']);
		   			
					}			
							
			 } ?></h2>
                     <p><?php echo PLEDGED_OF; ?> <?php echo set_currency($one_project['amount']); ?> goal</p>
					 <?php
				
				$dateg = $one_project['end_date'];
				$date1 = $dateg;
				$date2 = date("Y-m-d");
				$diff = abs(strtotime($date2) - strtotime($date1));
				$test = floor($diff / (60*60*24));
				$str = '';
				
		//echo strtotime(date('Y-m-d',strtotime($dateg))).'=='.strtotime(date('Y-m-d'));exit;
			
			if(strtotime(date('Y-m-d',strtotime($dateg))) > strtotime(date('Y-m-d'))) 
			{
				$temp = floor($diff / (60*60*24));
			
				$str = ($dateg!="0000-00-00 00:00:00")? "<h2>".$test."</h2><p>days to go</p>":"<br /><p>&nbsp;</p>";
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
				
						$str = "<h2>".$hours."</h2> <p>".HOURS_LEFT."</p>";
						if($hours != 0){						
							$str = "<h2>".$hours."</h2> <p>".HOURS_LEFT."</p>";
						}
						elseif($minuts != 0) { 
							$str = "<h2>".$minuts."</h2> <p>".MINUTES_LEFT."</p>";
						}
						else{
							$str = "<h2>".$seconds."</h2> <p>".SECONDS_LEFT."</p>";
						}
						
					}
					else
					{
						$str = "<h2>0 </h2> <p>".HOURS_LEFT."</p>";
					}
				}
				else
				{
					$str = "<h2>0 </h2> <p>".HOURS_LEFT."</p>";
				}
					
				
			}
			echo $str;
			?>
                    <!--<h2>15</h2>
                     <p>days to go</p>
                     <div class="pdprogress">
                     	<div class="pdprogresscal" style="width:<?php echo $w; ?>%;"></div>                       
                     </div>
                   -->
					<?php 
				
				$projemail=$this->project_model->get_project_owner_email($one_project['project_id']); 
   				$projtoken=$this->project_model->get_project_owner_token($one_project['project_id']);
				$projcreditcard=$this->project_model->get_project_owner_credit_card($one_project['project_id']);
				
				
				$paypal_adptive_status=$this->project_model->get_paypal_adptive_status();
				$paypal_normal_status=$this->project_model->get_paypal_normal_status();
				$amazon_status=$this->project_model->get_amazon_status();
				$wallet_status=$this->project_model->get_wallet_status();
				
			//	echo 'paypal_adptive_status   '.$paypal_adptive_status;die;
				$credit_card_setting=credit_card_setting();	
								
				$credit_card_status=$credit_card_setting->credit_card_gateway_status;
				
				
				
				if(get_authenticateUserID() > 0)
				{
				
				if($one_project['user_id'] != get_authenticateUserID()){
				
				
					
					if($paypal_adptive_status=='1' ||  $paypal_normal_status=='1' || $amazon_status=='1' || $wallet_status=='1' || $wallet_status=='0' || $credit_card_status==1)
					{
					
						
						
						 if($one_project['active']==1) { 
						
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
									
								 if($projemail==1)  { ?>
								 <a href="<?php echo site_url('reward/'.$one_project['project_id']);?>" title="<?php echo ADD_FUND; ?>"><div class="back">
											<h2><?php echo BACK_THIS_PROJECT;?></h2>
											<p><?php echo $site_setting['currency_symbol'] ?>1 <?php echo MINIMUM_PLEDGE; ?></p>
										 </div></a> 	
																 
								<?php } elseif($projtoken=='1') {?>
								
										<a href="<?php echo site_url('reward/'.$one_project['project_id']);?>" title="<?php echo ADD_FUND; ?>">
														<div class="back">
														<h2><?php echo BACK_THIS_PROJECT;?></h2>
														<p><?php echo $site_setting['currency_symbol'] ?>1 <?php echo MINIMUM_PLEDGE; ?></p>
													 </div></a> 						 
								<?php }
								 elseif($wallet_status=='1'){?>
								
									<a href="<?php echo site_url('reward/'.$one_project['project_id']);?>" title="<?php echo ADD_FUND; ?>"><div class="back">
											<h2><?php echo BACK_THIS_PROJECT;?></h2>
											<p><?php echo $site_setting['currency_symbol'] ?>1 <?php echo MINIMUM_PLEDGE; ?></p>
										 </div></a> 	
								<?php }
								
								 elseif($projcreditcard==1)
								 {?>
								 	<a href="<?php echo site_url('reward/'.$one_project['project_id']);?>" title="<?php echo ADD_FUND; ?>"><div class="back">
											<h2><?php echo BACK_THIS_PROJECT;?></h2>
											<p><?php echo $site_setting['currency_symbol'] ?>1 <?php echo MINIMUM_PLEDGE; ?></p>
										 </div></a> 	
								<?php }
								 elseif($paypal_adptive_status==1){?>
								
									<a href="<?php echo site_url('reward/'.$one_project['project_id']);?>" title="<?php echo ADD_FUND; ?>"><div class="back">
											<h2><?php echo BACK_THIS_PROJECT;?></h2>
											<p><?php echo $site_setting['currency_symbol'] ?>1 <?php echo MINIMUM_PLEDGE; ?></p>
										 </div></a> 	
								<?php }
								 else{								 		
										echo '<span style="color:#FF0000;font-weight:bold;">'.PROJECT_OWNER_HAS_NOT_SET_PAYMENT.'</span>';																			
								 }
							} 
							
						 }
					 }
				 } else {
				 	//echo "you cannot back your own project";
					//echo '<span style="color:#FF0000;font-weight:bold;margin:20px 5px 0px 5px;display:inline-block;">'.PROJECT_OWNER_HAS_NOT_SET_PAYMENT.'</span>';	
				 }
				 }else
				 {?>
				 	<a href="<?php echo site_url('home/login'.'/'.base64_encode(current_url())); ?>"><div class="back">
							<h2><?php echo BACK_THIS_PROJECT;?></h2>
							<p><?php echo $site_setting['currency_symbol'] ?>1 <?php echo MINIMUM_PLEDGE; ?></p>
							</div>
                      </a> 	
                <?php  }
				 
				 
				 ?> 
                     <p><?php echo THIS_PROJECT_WILL_BE_FUNDED_ON." ".date('F d , g:ia',strtotime($one_project['end_date'])); ?>. <!--<?php echo HOW; ?> <a href="<?php echo site_url('home'); ?>">
					 <?php echo $site_setting['site_name'] .' '. KICKSTARTERCLONE_WORKS; ?></a>.--></p>
                     
                     <div class="funding_period ">
                     <h3>Funding period </h3>
                     <p><?php echo date('M d,Y',strtotime($one_project['date_added'])); ?> - <?php echo date('M d,Y',strtotime($one_project['end_date'])); ?>(<?php echo $one_project['total_days']; ?>)</p>
                     </div>
                     
                </div>
                <div class="puser">
				
				<?php if($user_image!='' && is_file('upload/thumb/'.$user_image) ) { ?>

 <a href="<?php echo site_url('member/'.$one_project['user_id']); ?>"><img src="<?php echo base_url();?>upload/thumb/<?php echo $user_image; ?>"  /></a>

<?php }elseif($user_detail['tw_screen_name']!='' && $user_detail['tw_id']>0) { ?>
	
	<img src="http://api.twitter.com/1/users/profile_image?screen_name=<?php echo $user_detail['tw_screen_name']; ?>&size=bigger"  />
	
	
	<?php }
elseif($user_detail['fb_uid']!='' && $user_detail['fb_uid']>0) { ?>
 <a href="<?php echo site_url('member/'.$one_project['user_id']); ?>">
<img src="http://graph.facebook.com/<?php echo $user_detail['fb_uid']; ?>/picture?type=large" class="uimg" /></a>

<?php } else {
 ?> 

<a href="<?php echo site_url('member/'.$one_project['user_id']); ?>"><img src="<?php echo base_url();?>upload/thumb/no_man.gif" class="uimg" /></a>

<?php }  ?>
				
				
                	<!--<img src="" class="uimg" alt="" />-->
                    <div class="contectinfo">
                    	<h1><?php echo PROJECT_BY; ?></h1>
                        <h2><?php echo $user_name.' '.substr($last_name,0,1); ?></h2>
                        <div class="cp"><?php if(get_city_name($user_city)!=''){ echo get_city_name($user_city).",".get_state_name($user_state).",".get_country_name($user_country); } ?></div>
                   
                   <h4> <?php if(get_authenticateUserID()!=""){
					if(get_authenticateUserID()!=$one_project['user_id']){ echo anchor('message/send_message_project_profile/'.$one_project['user_id'].'/'.$one_project['project_id'],CONTACT_ME,'id="contect_me"'); } }else{
						echo anchor('home/login',CONTACT_ME);
					 }?></h4>
                     
                    </div>
                    <div class="clr">
                    </div>
                  <div class="divide_pro"> <a href="#" class="userfb"><img src="<?php echo base_url(); ?>images/userfb.png" class="miniimg" alt="" /><?php echo HAS_NOT_CONNECTED_FACEBOOK; ?></a></div>
                   <div>  <a href="#" class="userfb"><img src="<?php echo base_url(); ?>images/twitter_pro.png" class="miniimg" alt="" /><?php echo HAS_NOT_CONNECTED_TWITTER; ?></a></div>
      
					<?php $user_one_web=get_user_one_website($one_project['user_id']); ?>
                    <!--<p><?php echo WEBSITE; ?> :</p>-->
                    
                   <div class="visit_full_Profile"> <!--<a href="<?php echo $user_one_web['website_name'] ?>" class="userfb" target="_blank"><?php  if($user_one_web){ echo $user_one_web['website_name']; }else{ echo "N/A";} ?> </a>-->
                    <?php echo anchor('user/full_bio_data/'.$one_project['user_id'].'/'.$one_project['project_id'],SEE_FULL_BIO,'id="profile_detail_popup1" class="userfb" ');?></div>

                </div>
                		<?php
		if($all_perks)
		{ //print_r($all_perks);?>
                <div class="perk">
                	<!--<div class="perk_top">
                    
                		<h1 class="perkh1"><?php echo PERK; ?></h1><h1 class="perkh1" style="color:#333333;"><?php echo FOR_YOUR_CONTRIBUTION; ?></h1>
                       </div>-->
					   
                    <ul class="perkul">
					
		<?php	
			$perkcnt=0;
			foreach($all_perks as $perk)
			{	$perkcnt++;
				
				$available = $perk['perk_total'] - ($perk['perk_get']*1);
				
				
	?>
					
                    	<li>
                        <h1 class="perkamt">Pledge <?php echo set_currency($perk['perk_amount']); ?> or more</h1>
                          <div class="backers"><!--<img src="<?php echo base_url(); ?>images/claimicon.png" alt="" class="miniimg" />--><?php echo ($perk['perk_get']*1); ?> <?php echo backers; ?></div>
                           <!-- <h2 class="perktitle"><?php echo "PERK ".$perkcnt; ?></h2>
                            <hr color="#dcdbdb" /> -->
                            <div class="perkdescription"><?php echo $perk['perk_description']; ?></div>
                            <!--<h3 class="ca"><img src="<?php echo base_url(); ?>images/claimicon.png" alt="" class="miniimg" /><?php echo ($perk['perk_get']*1); ?> <?php echo CLAIMED; ?></h3>
                            <h3 class="ca"><img src="<?php echo base_url(); ?>images/avai.png" alt="" class="miniimg" style="width:13px; height:19px;" /><?php echo $available; ?> <?php echo AVAILABLE;?></h3>--><div class="clr"></div>
							
							
							
							 <?php
						// if($perk['perk_limit'] != 0) {
							  if($available=='0'){ ?>
			
			<span class="soldout" style="margin:10px 0 0 0;"><?php echo SOLD_OUT;?></span>
			
			 <?php }else{ /*
			 
		if($one_project['user_id'] != $this->session->userdata('user_id')){
			 
		if($paypal_adptive_status=='1' ||  $paypal_normal_status=='1' || $amazon_status=='1' || $wallet_status=='1' || $credit_card_status==1)
				{
				
					 if($one_project['active']==1) {
					 
					 
					 	if(strtotime($dateg) >= strtotime(date('Y-m-d H:i:s'))) 
							{
								if(get_authenticateUserID() > 0)
								{
								if($projemail==1)  { ?><a href="<?php echo site_url('reward/'.$one_project['project_id'].'/'.$perk['perk_id']); ?>" class="claimperk" ><?php echo CLAIM_THIS ?></a> 
									 
							 <?php } elseif($projtoken=='1') { ?><a href="<?php echo site_url('reward/'.$one_project['project_id'].'/'.$perk['perk_id']); ?>" class="claimperk" ><?php echo CLAIM_THIS ?></a> 
							 <?php } elseif($wallet_status=='1'){ ?><a href="<?php echo site_url('reward/'.$one_project['project_id'].'/'.$perk['perk_id']); ?>" class="claimperk" ><?php echo CLAIM_THIS ?></a> 
						 <?php } elseif($projcreditcard==1) { ?>  <a href="<?php echo site_url('reward/'.$one_project['project_id'].'/'.$perk['perk_id']); ?>" class="claimperk" ><?php echo CLAIM_THIS ?></a> 
										<?php 
									 } else{
									 
									 }
									 
								}
								else
								{?>
                                <a href="<?php echo site_url('home/login'.'/'.base64_encode(current_url())); ?>" class="claimperk"><?php echo CLAIM_THIS; ?></a>
								<?php }	 
							}
							 
				
						}	
					
					 }
					 
					}
					 
					 
				*/} //}?>
		
		
                           
            <div class="estimated"><?php echo EST_DELIVERY; ?> : <?php if($perk['perk_delivery_date']!="0000-00-00"){echo date($site_setting['date_format'],strtotime($perk['perk_delivery_date'])); }else {echo 'N/A';}?> </div>
                            
                        </li>
						
						
						<?php }  ?>
						  </ul>
                </div>
				<?php		}?>
						
						
                     
                        
                  
   
            </div>
         </div></div><div class="clr"></div>