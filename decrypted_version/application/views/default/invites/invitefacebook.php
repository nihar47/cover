<link rel="stylesheet" href="<?php echo base_url();?>css/colorbox.css" />
<link rel="stylesheet" href="<?php echo base_url();?>js/colorbox/colorbox.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>js/colorbox/jquery.colorbox.js"> </script>
<script type="text/javascript">
$(document).ready(function(){
				
				$("#iframe").colorbox({iframe:true, width:"490px", height:"269px"});
			});
		
</script>
<!--******************Section********************-->
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
    FB.init({ appId: "<?php echo $data['appkey'];?>",status: true,cookie: true,xfbml: true,oauth: true});
	</script>
  
 <script type="text/javascript">
 	function optuser(id)
	{
		
		if(id=='') { return false; }
			var strURL='<?php echo site_url('friends/optuser/');?>/'+id;
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
				
					if(xmlhttp.responseText=='optoutuser')
					{
						document.getElementById("fb_cnt").innerHTML='<a href="<?php echo $fbLoginURL; ?>"><img src="<?php echo base_url()?>images/connect_f.png"  alt="" class="you" /></a><h5><span><?php FACEBOOK_INVOTE_FRIEND_TEXT;?></span></h5>';
				
					}
					
				}
			}
			xmlhttp.open("GET",strURL,true);
			xmlhttp.send();
	}
 </script>   

<section>
	<div class="find">
	<div id="page_we">
    	<div class="step_cont">
				<div class="fri_left">
                    <h2 class="social"><?php echo GET_SOCIAL;?><span><?php echo FOLLOW_YOUR_FRIEND_DISCOVER;?></span></h2>
                    <img src="<?php echo base_url();?>images/you.png"  alt="" class="you"/>
                    <img src="<?php echo base_url();?>images/go_f.png" alt="" width="311px" height="123" class="you_right"/>
                </div>
               
                <div class="clr"></div>
         </div>
         <?php $user_data  = get_user_detail(get_authenticateUserID());//if(!$friend_list) { ?>
     <div class="fri_right" id="fb_cnt">
     	
        	<?php if($user_data['user_opt'] == 1)
			{?>
        	<a href="<?php echo $fbLoginURL; ?>"><img src="<?php echo base_url()?>images/connect_f.png"  alt="" class="you" /></a>
             <h5><span><?php FACEBOOK_INVOTE_FRIEND_TEXT;?></span></h5>
             <?php }else{?>
             <div id="user_opt_out">
                <header>
                <h1><?php echo YOUVE_OPTED_OUT_OF_FOLLOWING; ?>.</h1>
                </header>
                <p>
                <?php echo NO_ONE_CAN_FOLLOW_YOU_AND_YOU_CANT_FOLLOW_ANYONE_IF_THIS_WAS_A_MISTAKE_YOU_CAN; ?>
                <a href="javascript:void(0);" onclick="optuser(<?php echo $user_data['user_id'];?>)"><?php echo OPT_BACK_IN; ?></a>.
                </p>
                </div>
			 <?php }?>
        </div>
         <div class="clear"></div>		
        
        <?php //}
		?>
        
        
          <div id="fb-root"></div>
    
    
       <!---left side-->
         <div class="lefthalf" style="clear:both; width:390px;">
         
          <div class="fbclass">
           </div><div class="clear"></div>
                    
        </div>
        
         <div class="clr"></div>
         <div class="border_f">
         
                <div class="fri_b">
                    <h6 class="p_common"><?php echo PERSONALIZED_BROWSING; ?></h6>
                    <p><?php echo WHEN_YOU_VISIT_A_PROJECT_YOULL_BE_ABLE_TO_SEE_IF_YOUR_FRIENDS_ARE_BACKERS_LIKEWISE_FRIENDS_WHO_FOLLOW_YOU_CAN_SEE_WHAT_YOURE_SUPPORTING; ?>!</p>
                </div>
                 <div class="fri_b">
           		<h6><?php echo PERSONALIZED_BROWSING; ?></h6>
                <p><?php echo WELL_SEND_YOU_AN_EMAIL_WHEN_ONE_OF_YOUR_FRIENDS_BACKS_OR_LAUNCHES_A_PROJECT_IF_EMAILS_EVER_GET_TOO_NOISY_YOU_CAN_EASILY_UNSUBSCRIBE; ?></p>
                </div>
                <div class="fri_b">
                <h6><?php echo PERSONALIZED_BROWSING; ?></h6>
                <p><?php echo WE_NEVER_DISCLOSE_THE_AMOUNT_YOU_OR_YOUR_FRIENDS_PLEDGE_JUST_THAT_YOURE_PROUD_BACKERS; ?></p>
               	</div>
                <div class="clr"></div>
                </div>
                <div class="clr"></div>
               
                <?php if($user_data['user_opt'] == 1){?>
                 <h4 class="follow"><?php echo DO_NOT_WANT_PEOPLE_FOLLOW;?><br />
                 <?php echo anchor('friends/optpopup/'.$user_data['user_id'],OPT_FEATURE_ENTIRELY,'id="iframe"')?>
                <?php }?>
                </h4>
                
                
      
       
</div>
</div>
<div class="clr"></div>
                
</section>

<!--******************Section********************-->
