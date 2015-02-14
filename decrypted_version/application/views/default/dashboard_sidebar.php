<div class="sidebar" style="padding-left:10px;">

				

	<?php 
	$get_wallet_setting = wallet_setting();
	
	$get_user_info=mysql_fetch_array(mysql_query("select * from user where user_id='".$this->session->userdata('user_id')."'"));
		 	
			$last_login=mysql_query("select * from user_login where user_id='".$this->session->userdata('user_id')."' order by login_id desc");
			
			if(mysql_num_rows($last_login)>1)
			{
				$get_last_login=mysql_fetch_array(mysql_query("select * from user_login where user_id='".$this->session->userdata('user_id')."' order by login_id desc LIMIT 1,1"));
			}
			else
			{
				$get_last_login=mysql_fetch_array(mysql_query("select * from user_login where user_id='".$this->session->userdata('user_id')."' order by login_id desc LIMIT 1"));
			}
			
			
		 
	?>
    
    <?php
    
	if($get_user_info['image']!='') {
	
		if(is_file('upload/thumb/'.$get_user_info['image'])){
		
	?>
			<img src="<?php echo base_url();?>upload/thumb/<?php echo $get_user_info['image'];?>"  class="usrimg"  />
	
			<?php } else { ?>
			
			<img src="<?php echo base_url();?>upload/orig/no_man.gif"  class="usrimg" />
			
			<?php } } elseif($get_user_info['tw_screen_name']!='' && $get_user_info['tw_id']>0) { ?>
	
	<img src="http://api.twitter.com/1/users/profile_image?screen_name=<?php echo $get_user_info['tw_screen_name']; ?>&size=bigger"  class="usrimg" />
	
	
	<?php } elseif($get_user_info['fb_uid']!='' && $get_user_info['fb_uid']>0) { ?>
	
	
	<img src="http://graph.facebook.com/<?php echo $get_user_info['fb_uid']; ?>/picture?type=large"  class="usrimg" />
	
	
	<?php }  else { ?>
			
			<img src="<?php echo base_url();?>upload/orig/no_man.gif" class="usrimg"  />
	
	<?php } 
	
	?>
	<div class="welcomtext"> <?php echo WELCOME.' '.$this->session->userdata('user_name'); ?></div>
    
    
    <div class="lst_login"><span><?php echo MEMBER_SINCE; ?> : </span><?php echo date('d M,Y',strtotime($get_user_info['date_added']));?></div>
    <div class="lst_login">
    	<span><?php echo LAST_LOGIN; ?> : </span>
        <?php $ex_login=explode(' ',$get_last_login['login_date_time']);
	
			$log_date=$ex_login[0];
			$log_time=$ex_login[1];
			
			$ex_log_time=explode(':',$log_time);
			
			
			$log_today = date("Y-m-d");
			$log_day_diff = abs(strtotime($log_today) - strtotime($log_date));
			$log_day = floor($log_day_diff / (60*60*24));
			
			$dDf=$log_day;

			$current_hour=date('H');  		$ref_hour=$ex_log_time[0];
			$current_min=date('i');			$ref_min=$ex_log_time[1];
			$current_seconds=date('s');		$ref_seconds=$ex_log_time[2];
			
						
			$hDf = $current_hour-$ref_hour;
			$mDf = $current_min-$ref_min;
			$sDf = $current_seconds-$ref_seconds;
			
			// Show time difference ex: 2 min 54 sec ago.
			if($dDf<1){
				if($hDf>0){
					if($mDf<0){
						$mDf = 60 + $mDf;
						$hDf = $hDf - 1;
						echo $mDf .' '.MIN_AGO.' ';
					} else {
						echo $hDf.' '. HR_TEXT .' '. $mDf . MIN_AGO.' ';
					}
				} else {
					if($mDf>0){
						echo $mDf .' '. MIN_TEXT .' '. $sDf .' '. SEC_AGO.' ';
					} else {
						echo $sDf .' '. SEC_AGO.' ';
					}
				}
			} else {
				echo $dDf .' '. DAYS.' ';
			
				if($hDf>0){
					if($mDf<0){
						$mDf = 60 + $mDf;
						$hDf = $hDf - 1;
						echo $mDf .' '. SEC_AGO.' ';
					} else {
						echo $hDf.' '.  HR_TEXT .' ' . $mDf.' ' . MIN_TEXT.' ';
					}
				} else {
					if($mDf>0){
						echo $mDf.' ' . MIN_TEXT.' ' . $sDf.' ' . SEC.' ';
					} else {
						echo $sDf.' ' . SEC_AGO.' ';
					}
				}
			
			
			}
			
				
				?>
	 
     </div>
    
   <!-- <div class="details"><?php //echo anchor('member/'.$this->session->userdata('user_id'),'Details',' class="eye"'); ?></div>-->
    <div class="clear"></div>
   
	<div class="linkbox">
    
    	<div class="linkboxhead"><?php echo MAIN_NAVIGATION;?></div>
        <?php echo anchor('home/main_dashboard','<img src="'.base_url().'images/dashboard/dashboard.png" alt="">'.DASHBOARD); ?>
        <?php echo anchor('inbox','<img src="'.base_url().'images/dashboard/inbox.png" alt="">'.MY_INBOX.'('.get_total_unread_message_count($this->session->userdata('user_id')).')'); ?>
        <?php echo anchor('user/activities/'.$this->session->userdata('user_id'),'<img src="'.base_url().'images/dashboard/activity.png" alt="">'.ACTIVITY); ?>
        <?php echo anchor('member/'.$this->session->userdata('user_id'),'<img src="'.base_url().'images/dashboard/myprofile.png" alt="">'.MY_PROFILE); ?>
        <?php echo anchor('home/account','<img src="'.base_url().'images/dashboard/myaccount.png" alt="">'.MY_ACCOUNT); ?>    
        <?php echo anchor('home/social_networking','<img src="'.base_url().'images/dashboard/social-media-detail.png" alt="">'.SOCIAL_NETWORK_DETAILS); ?>    
        
        <?php echo anchor('user/my_donation/','<img src="'.base_url().'images/dashboard/transhistory.png" alt="">'.TRANSACTION_HISTORY); ?>
        <?php echo anchor('invites','<img src="'.base_url().'images/dashboard/invite.png" alt="">'.INVITES_FRIENDS); ?>
        
		<?php 
		$affiliate_setting=affiliate_setting();		
		if($affiliate_setting->affiliate_enable==1) { 
			 echo anchor('affiliate','<img src="'.base_url().'images/dashboard/affiliate.png" alt="">'.AFFILIATE); 
		}	 
		?>    
        
        
       <?php 
		$credit_card_setting=credit_card_setting();	
		
		if($credit_card_setting->credit_card_gateway_status==1) { 
			 echo anchor('stored_card','<img src="'.base_url().'images/dashboard/transreport.png" alt="">'.MY_CREDIT_CARD); 
		 } ?>
      
        <?php  if($get_wallet_setting->wallet_enable==1) { ?>
            
            <div class="linkboxhead">Others</div>
            <?php echo anchor('wallet/add_wallet','<img src="'.base_url().'images/dashboard/addamt.png" alt="">'.ADD_WALLET_AMOUNT); ?>
            <?php echo anchor('wallet/my_wallet','<img src="'.base_url().'images/dashboard/transreport.png" alt="">'.REPORTS); ?>
            <?php echo anchor('wallet/my_withdraw','<img src="'.base_url().'images/dashboard/recentwith.png" alt="">'.MY_WITHDRAWAL_WALLET); ?>
         <?php } ?>   
        <div class="clear"></div><br />
    </div>
    
   
	
	


</div>