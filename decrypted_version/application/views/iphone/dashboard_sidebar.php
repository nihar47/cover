<div class="sidebar">


				                                           
                
				
<div class="user_box">
	<?php $get_user_info=mysql_fetch_array(mysql_query("select * from user where user_id='".$this->session->userdata('user_id')."'"));
		 	
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
	
	<table border="0" cellpadding="0" cellspacing="0" width="100%">
	
	<tr><td align="center" valign="top" height="25"><span style="color:#2B5F94;  font-weight:bold;  font-size:14px; text-transform:capitalize;"> <?php echo WELCOME; ?>, <span style="color:#91cb00;"><?php echo $this->session->userdata('user_name'); ?></span></span> </td></tr>
	
	<tr><td align="center" valign="top" height="165">
	
	<?php
    
	if($get_user_info['image']!='') {
	
		if(is_file('upload/thumb/'.$get_user_info['image'])){
		
	?>
			<img src="<?php echo base_url();?>upload/thumb/<?php echo $get_user_info['image'];?>" border="0" width="150" height="150" style="padding:2px; border:1px solid #E1E1E1;" />
	
			<?php } else { ?>
			
			<img src="<?php echo base_url();?>upload/orig/no_man.gif" border="0" width="150" height="150" style="padding:2px; border:1px solid #E1E1E1;" />
			
			<?php } } elseif($get_user_info['tw_screen_name']!='' && $get_user_info['tw_id']>0) { ?>
	
	<img src="http://api.twitter.com/1/users/profile_image?screen_name=<?php echo $get_user_info['tw_screen_name']; ?>&size=bigger" border="0" width="150" height="150" style="padding:2px; border:1px solid #E1E1E1;" />
	
	
	<?php } elseif($get_user_info['fb_uid']!='' && $get_user_info['fb_uid']>0) { ?>
	
	
	<img src="http://graph.facebook.com/<?php echo $get_user_info['fb_uid']; ?>/picture?type=large" border="0" width="150" height="150" style="padding:2px; border:1px solid #E1E1E1;" />
	
	
	<?php }  else { ?>
			
			<img src="<?php echo base_url();?>upload/orig/no_man.gif" border="0" width="150" height="150" style="padding:2px; border:1px solid #E1E1E1;" />
	
	<?php } 
	
	?>
	
	</td></tr>
	
	<tr><td align="left" valign="top" height="25"><span style="font-style:italic; font-weight:bold; font-family:Arial, Helvetica, sans-serif; color:#000000; font-size:11px;"><?php echo MEMBER_SINCE; ?> : <span style="font-weight:normal; color:#999999;"><?php echo date('d M,Y',strtotime($get_user_info['date_added']));?></span></span></td></tr>
	
	<tr><td align="left" valign="top" height="25"><span style="font-style:italic; font-weight:bold; font-family:Arial, Helvetica, sans-serif; color:#000000; font-size:11px;"><?php echo LAST_LOGIN; ?> : <span style="font-weight:normal; color:#999999;">
	
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
echo $mDf .MIN_AGO;
} else {
echo $hDf. HR_TEXT . $mDf . MIN_AGO;
}
} else {
if($mDf>0){
echo $mDf . MIN_TEXT . $sDf . SEC_AGO;
} else {
echo $sDf . SEC_AGO;
}
}
} else {
echo $dDf . DAYS;

if($hDf>0){
if($mDf<0){
$mDf = 60 + $mDf;
$hDf = $hDf - 1;
echo $mDf . SEC_AGO;
} else {
echo $hDf.  HR_TEXT  . $mDf . MIN_TEXT;
}
} else {
if($mDf>0){
echo $mDf . MIN_TEXT . $sDf . SEC;
} else {
echo $sDf . SEC_AGO;
}
}


}
	
	
	?>
	
	
	</span></span></td></tr>
	
	<?php 	$get_wallet_setting=$this->home_model->wallet_setting();
		
		if($get_wallet_setting->wallet_enable==1) {	 ?>
	<tr><td align="left" valign="top" height="40"><span style="font-style:italic; font-weight:bold; font-family:Arial, Helvetica, sans-serif; color:#000000; font-size:11px;"><?php echo CURRENT_BALANCE; ?> : <span style="font-weight:normal; color:#999999;"><?php echo set_currency($this->home_model->my_wallet_amount()); ?></span></span></td></tr>
    <?php } ?>
	
	<tr><td align="center" valign="top" height="30"><a href="<?php echo site_url('home/account');?>"  class="edit_setting"><?php echo MY_ACCOUNT; ?></a></td></tr>
    
    
    </table>
    <?php  if($get_wallet_setting->wallet_enable==1) { ?>
  <br /> <!-- <h3 style="color:#2B5F94;  font-weight:bold;  font-size:17px; text-transform:capitalize; text-align:center;"><?php //echo MY_ACCOUNT; ?></h3>-->
    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="add_wallet_box">
    <tr><td align="left" valign="top" height="30"><a href="<?php echo site_url('wallet/add_wallet');?>"  class="add_wallet_link"><?php echo '&nbsp;&nbsp;'.ADD_WALLET_AMOUNT; ?></a></td></tr>
    <tr><td align="left" valign="top" height="30"><a href="<?php echo site_url('wallet/my_wallet');?>" class="add_wallet_link"><?php echo '&nbsp;&nbsp;'.REPORTS; ?></a></td></tr>
    <tr><td align="left" valign="top" height="30"><a href="<?php echo site_url('wallet/my_withdraw');?>" class="add_wallet_link"><?php echo '&nbsp;&nbsp;'.MY_WITHDRAWAL_WALLET; ?></a></td></tr>
	</table>	
    <?php } ?>
	
</div>

</div>