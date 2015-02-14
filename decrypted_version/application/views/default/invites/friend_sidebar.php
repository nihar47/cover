<link rel="stylesheet" href="<?php echo base_url();?>css/colorbox.css" />
<link rel="stylesheet" href="<?php echo base_url();?>js/colorbox/colorbox.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>js/colorbox/jquery.colorbox.js"> </script>


<script type="text/javascript">
$(document).ready(function(){
				
				$("#iframe").colorbox({iframe:true, width:"465px", height:"269px"});
			});
		
</script>
<script>
var baseUrl='<?php  echo base_url();  ?>';
</script>
<script src="<?php echo base_url();?>js/jquery.easing.1.3.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>js/jquery.flipCounter.1.2.js" type="text/javascript"></script>
<?php $follow_cnt=follower_list_count(get_authenticateUserID());
					$followingcnt=following_list_count(get_authenticateUserID()) ?>	
<script type="text/javascript">
/* <![CDATA[ */
        jQuery(document).ready(function($) {
			$("#followcnt").flipCounter("setNumber",<?php echo $follow_cnt; ?>); // immediately sets the number to 42.
			$("#followingcnt").flipCounter("setNumber",<?php echo $followingcnt; ?>); // immediately sets the number to 42.
		
        });
/* ]]> */
</script>
<?php 
$data = array(
	'facebook'		=> $this->fb_connect->fb,
	'fbSession'		=> $this->fb_connect->fbSession,
	'user'			=> $this->fb_connect->user,
	'uid'			=> $this->fb_connect->user_id,
	'fbLogoutURL'	=> $this->fb_connect->fbLogoutURL,
	'fbLoginURL'	=> $this->fb_connect->fbLoginURL,	
	'base_url'		=> site_url('home/facebook'),
	'appkey'		=> $this->fb_connect->appkey,
);

$fbLoginURL=$this->fb_connect->fbLoginURL; 
	
		
		$fbLoginURL=str_replace(urlencode(site_url('home/facebook/')),site_url('home/facebook/backinvite/'),$fbLoginURL);		
	 
	  //print_r($friend_list);
?>   
  <script type="text/javascript" src="http://connect.facebook.net/en_US/all.js"></script>
  <script type="text/javascript">
  function notify_followback(id)
  {
  			if(id=='') { return false; }
			var strURL='<?php echo site_url('friends/notify_followback/');?>/'+id;
			var xmlhttp;
			if (window.XMLHttpRequest)
			{// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp=new XMLHttpRequest();
			
			}
			else
			{// code for IE6, IE5
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			
			}
			xmlhttp.onreadystatechange=function()
				{
				
				if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
				
				}
			}
			xmlhttp.open("GET",strURL,true);
			xmlhttp.send();
  }
  function notify_followers(id)
  {
  	if(id=='') { return false; }
			var strURL='<?php echo site_url('friends/notify_followers/');?>/'+id;
			var xmlhttp;
			if (window.XMLHttpRequest)
			{// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp=new XMLHttpRequest();
			
			}
			else
			{// code for IE6, IE5
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			
			}
			xmlhttp.onreadystatechange=function()
				{
				
				if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
				
				}
			}
			xmlhttp.open("GET",strURL,true);
			xmlhttp.send();  }
  </script>
<div class="get_soc_cont_right">

 <?php 
		$sel_find='';
		$sel_following='';
		$sel_followers='';
		$sel_projects='';
		$sel_block='';
		if($select=='sel_find') { $sel_find ='id="blocksel"'; }
		if($select=='sel_following') { $sel_following='id="blocksel"'; }
		if($select=='sel_followers') { $sel_followers='id="blocksel"'; }
		if($select=='sel_projects') { $sel_projects='id="blocksel"'; }
		if($select=='sel_block') { $sel_block='id="blocksel"'; }
		
		
	 ?>
					<h1 style="border-top:none;"><?php echo FIND_BROWSE;?></h1>
                    <?php echo anchor($fbLoginURL,FIND_FRIENDS,'class="anc" '.$sel_find.'')?>
					<div class="clr"></div>
                    <?php echo anchor('friends/projects',BROWSE_PROJECTS,'class="anc" '.$sel_projects.'');?>
					<div class="clr"></div>
					
                    <h1 ><?php echo MANAGE_FRIENDS; ?></h1>
                    <?php echo anchor('friends/following/'.get_authenticateUserID(),FOLLOWING,'class="anc" '.$sel_following.'');?>
					<div class="clr"></div>
                    <?php echo anchor('friends/followers/'.get_authenticateUserID(),FOLLOWERS,'class="anc" '.$sel_followers.'');?>
					<div class="clr"></div>
                    <?php echo anchor('friends/block/'.get_authenticateUserID(),BLOCKED,'class="anc" '.$sel_block.'');?>
					<div class="clr"></div>
					<h1 ><?php echo NOTIFY_ME_BY_EMAIL_WHEN; ?>:</h1>
					<div style="display:block; margin:15px 10px;">
                    <?php $user_notify = usernotifications(get_authenticateUserID());
					?>
                    <input type="checkbox" class="" id="chk_followbacks" <?php if($user_notify['follow_back'] == 1){?>checked<?php }?> onClick="notify_followback(<?php echo get_authenticateUserID();?>);" /><span>Someone I follow backs or launches a project</span></div>
					<div style="display:block; margin:15px 10px;">
					<input type="checkbox" class="" id="chk_followers" <?php if($user_notify['followers'] == 1){?>checked<?php }?> onClick="notify_followers(<?php echo get_authenticateUserID();?>);"/><span>I get new followers (daily digest)</span></div>
					
					<h1 ><?php echo OPT_OUT; ?></h1>
                      <?php $user_data  = get_user_detail(get_authenticateUserID()); ?>
                      <?php if($user_data['user_opt'] == 1){?>
					<p>Don't want people to follow you?<br/><?php echo anchor('friends/optpopup/'.$user_data['user_id'],OPT_FEATURE_ENTIRELY,'id="iframe"')?>
                   <?php }?> </p>
					
				</div>