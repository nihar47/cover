 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>/js/jquery.facebook.multifriend.select.js"></script>
        <link rel="stylesheet" href="<?php echo base_url(); ?>/css/jquery.facebook.multifriend.select-list.css" />
<?php
	
	$prj=$this->project_model->get_project_user($this->session->userdata('project_id'));
	
	$project_share_link=site_url('projects/'.$prj['url_project_title'].'/'.$prj['project_id']);
	$project_share_title=$prj['project_title'];
	
		


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

	$logoutUrl =$data['fbLogoutURL'];

	$loginUrl = $data['fbLoginURL'];
?>
        <div id="fb-root"></div>
           <!-- <script src="http://connect.facebook.net/en_US/all.js"></script>-->
            <script>
			 window.fbAsyncInit = function() {
        FB.init({
          appId      : '<?php echo $data['appkey']; ?>', // App ID
          status     : true, // check login status
          cookie     : true, // enable cookies to allow the server to access the session
          xfbml      : true, // parse XFBML
          oauth      : true
        });

        FB.getLoginStatus(function(response) {
          if (response.status === 'connected') {
            var uid = response.authResponse.userID;
            var accessToken = response.authResponse.accessToken;
            $('#fb-invite-friends').show();
            init();
          } else {
            $('#fb-invite-friends').hide();
            $('#fb-invite-login').show();
            $('#fb-invite-login a.loginButton').click(function(e) {
              e.preventDefault();
              login();
            });
          }
        });
      };

      // Load the SDK Asynchronously
      (function(d){
         var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
         js = d.createElement('script'); js.id = id; js.async = true;
         js.src = "//connect.facebook.net/en_US/all.js";
         d.getElementsByTagName('head')[0].appendChild(js);
       }(document));
               /* FB.init({appId: '253523241394863', cookie: true});

                FB.getLoginStatus(function(response) {
                    if (response.session) {
                      init();
                    } else {
                      // no user session available, someone you dont know
                    }
                });


                function login() {
                    FB.login(function(response) {
                       init();
                    });
                }

                function init() {
                  FB.api('/me', function(response) {
                      $("#username").html("<img src='https://graph.facebook.com/" + response.id + "/picture'/><div>" + response.name + "</div>");
                      $("#jfmfs-container").jfmfs({ max_selected: 1, max_selected_message: "{0} of {1} selected"});
                      $("#logged-out-status").hide();
                      $("#show-friends").show();
  
                  });
                }              


                $("#show-friends").live("click", function() {
                    var friendSelector = $("#jfmfs-container").data('jfmfs');             
                    $("#selected-friends").html(friendSelector.getSelectedIds().join(', ')); 
                });    */              

function login() {
  FB.login(function(response) {
    if (response.authResponse) {
      window.location.reload();
      // init();
    } else {	
    }
  });
}

function init() {
  if ($("#jfmfs-container")) {
    FB.api('/me', function(response) {
      $("#logged-out-status").hide();
      $("#jfmfs-container").jfmfs();
      $("#invite-friends").css('display', 'inline-block');
    });
  }
}

$("#invite-friends").live("click", function() {
  var friendSelector    = $("#jfmfs-container").data('jfmfs');
  var friendIdsAndNames = friendSelector.getSelectedIdsAndNames();
  if (friendIdsAndNames.length > 0) {
    $("#jfmfs-container").fadeTo('slow', .5);
    $("#invite-friends").fadeTo('slow', .5)
    $("#invite-friends").click(function(){
      return false;
    })
    var msg = document.getElementById('message').value;
	jQuery.ajax({
      type: 'POST',
      url: '<?php echo site_url("project/sendinvite/".$prj['project_id']."/"); ?>'+msg,
      data: { facebook_invites: friendIdsAndNames},
	   success: function(data){
	    window.location.href='<?php echo site_url('project/share/'.$prj['project_id'].'/success');?>';
	   
	   }
    });
  }
});
              </script>		  			 
					 
					 
	<div id="headerbar">
	<div class="wrap930">
	
	<!-- dd menu -->	
<div class="login_navl">
		
			
			
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tr><td align="left" >	
	<div class="project_title_hd" style="padding-top:15px;" >
	
	
	<span style="text-transform:capitalize;color:#2B5F94;font-size:17px;"><?php echo $this->session->userdata('project_title'); ?></span>
	
	</div>
	</td>
	<td align="right" >	
	
	<div class="project_title_hd" style="padding-top:15px; "  >
	<span id="sddm" style="float:right;">
		
		<?php if($this->session->userdata['project_id']!='' && $this->session->userdata['project_id']!=0) {  ?>
		
	 <?php echo anchor('user/my_project/',CHANGE_PROJECT,' style="text-transform:capitalize;color:#2B5F94;font-size:17px;text-decoration:none;" '); ?>
		
		<?php } ?>
		
	</span>
	</div>

</td></tr></table>

		  </div> 
		      
		<div class="clear"></div>
	</div>
</div>
<div id="container">
<div class="wrap930" style="padding:15px 0px 20px 0px;">	

<!--side bar user panel-->

<?php echo $this->load->view('dashboard_sidebar'); ?>

<!--side bar user panel-->


<div class="con_left2" style="min-height:0px; width:690px; margin-right:0px;">
           			
              
<style type="text/css">

#tab_all a{ color:#000000; text-decoration:none; }

#sts:hover{ font-weight:bold; }
</style>				
			

<?php
	$data['tab_sel'] = SHARE;
	$this->load->view('overview_tabs',$data);

?>

	   

	 
	
	  
	  
		   <div class="inner_content" style=" margin-top:11px;padding:12px; ">
		         
				
			<h3 id="dropmenu2"><?php echo INVITE_YOUR_FRIENDS; ?></h3>
             
			 <div class="clear" style="font-size:12px; padding:5px;  font-weight:bold; color:#F00;"><?php echo FOR_INVITE_ON_FACEBOOK_YOU_MUST_BE_LOGIN; ?>.</div>	  
				  
			 <div class="clear"></div>
		  
	<?php
	
	
	
	$prj=$this->project_model->get_project_user($this->session->userdata('project_id'));
	
	$project_share_link=site_url('projects/'.$prj['url_project_title'].'/'.$prj['project_id']);
	$project_share_title=$prj['project_title'];
	
	
	?>
			<?php
            if($msg=='success')
			{
			?>
            <div class="error" style="color:#84C200; font-weight:bold;"><?php  echo YOUR_INVITATION_SEND_SUCCESSFULLY; ?></div><br />
             <?php 
			 }
			 ?>
			 <div class="inner_content" style="min-height:250px; padding-top:0px;">     						  
<div id="fb-invite-friends">
			<!--<p>Invite your friends through Facebook</p>--> <div id="username"></div>
                  <a href="#" id="show-friends" style="display:none;">Show Selected Friends</a>
                  <div id="selected-friends" style="height:30px"></div>
	    <div id="jfmfs-container"></div>
	    <div>
        
        <br />
          			<div class="s_lleft" style="width:110px; color:#990000">
                     <label><?php echo CONTACT_US_MESSAGE; ?> :&nbsp;&nbsp;&nbsp;</label></div>
                     <div class="s_right" style="width:400px;"><span>
                     <textarea name="message" style=" width:355px; height:85px;" id="message" ></textarea>	
                      </span> </div>
                     <div class="clear"></div>
                     
	      <a href="javascript:void(0)" class=" btn btn-tertiary smallButton loginButton" id="invite-friends"><!--<img alt="Facebook-16x16" src="http://b.taskrabbitcdn.com/images/social/facebook-16x16.png?1335325455" style="margin-bottom: -3px;" />--><span><?php echo INVITE_YOUR_FRIENDS; ?></span></a>
	    </div>
		</div>
        
        
        <br /><div id="fb-invite-login" style="">
<a href="javascript:login()"><img src="<?php echo base_url(); ?>images/facebook.png" border="0" height="21" width="21" name="MyImage" onmouseover="document.MyImage.src='<?php echo base_url(); ?>images/facebook-ho.png';" onmouseout="document.MyImage.src='<?php echo base_url(); ?>images/facebook.png';"/><span style="color:#2B5F94; font-size:16px; position:relative; bottom:5px; font-weight:bold; text-decoration:none;">&nbsp;<?php echo FACEBOOK; ?>&nbsp;</span></a></div>
</div>				

<!--<h3 id="dropmenu2"><a href="#" onClick="newInvite(); return false;" style="color:#990000;"><?php //echo CLICK_INVITE_YOUR_FRIENDS; ?></a></h3>-->

<h3 id="dropmenu2"><?php echo SHARE_YOUR_PROJECT; ?></h3>



		   <a target="_blank"  href="http://twitter.com/home?status=<?php echo $project_share_title;?> <?php echo $project_share_link; ?>" title="<?php echo SHARE_PROJECT_ON_TWITTER; ?>" target="_blank"><img alt='<?php  echo TWITTER; ?>' height='48' src='<?php echo base_url();?>images/social/twitter.png' width='48' border="0" /></a>
		  
          <a target="_blank" href="http://www.facebook.com/share.php?u=<?php echo $project_share_link;?>&amp;t=<?php echo $project_share_title; ?>" title="share on facebook" target="_blank"><img alt='<?php echo FACEBOOK; ?>' height='48' src='<?php echo base_url();?>images/social/facebook.png' title="<?php echo FACEBOOK; ?>" border="0" width='48'/></a>
		  
		  <a href='http://www.stumbleupon.com/submit?url=&quot; + <?php echo $project_share_link;?> + &quot;&amp;title=&quot; + <?php echo $project_share_title;?>' target='_blank' title="<?php echo SHARE_ON_STUMBLEUPON; ?>"><img alt='<?php echo STUMBLEUPON;?>' height='48' src='<?php echo base_url();?>images/social/stumbleupon.png' width='48' border="0"/></a>
         
<a href='http://del.icio.us/post?url=<?php echo $project_share_link; ?>&amp;title=<?php echo $project_share_title; ?>' target='_blank' title='<?php echo SHARE_ON_DELICIOUS;?>'><img alt='<?php echo DELICIOUS; ?>' border="0" height='48' src='<?php echo base_url();?>images/social/delicious.png' width='48'/></a>

		  <a target="_blank" href="http://digg.com/submit?phase=2&url=<?php echo $project_share_link; ?>&title=<?php echo $project_share_title; ?>" title="<?php echo SHARE_ON_DIGG ;?>" ><img alt='Digg' height='48' src='<?php echo base_url();?>images/social/digg.png' width='48' border="0"/></a>
     
         

		 
		 

<a href="http://www.tumblr.com/share/link?url=<?php echo $project_share_link;?>&name=<?php echo $project_share_title; ?>" title="<?php echo SHARE_ON_TUMBLR; ?>" ><img alt='<?php echo THUBMLR; ?>' border="0" height='48' src='<?php echo base_url();?>images/social/thumblr_icon.png' width='48'/></a>


		 
		 <a href="http://reddit.com/submit?url=<?php echo $project_share_link;?>%26title=<?php echo $project_share_title; ?>" target="_blank" title="<?php echo SHARE_ON_REDDIT; ?>"><img alt='<?php echo REDDIT; ?>' border="0" height='48' src='<?php echo base_url();?>images/social/reddit.png' width='48'/></a>
		 
		 <a href='http://www.mixx.com/submit?page_url=<?php echo $project_share_link;?>&amp;title=<?php echo $project_share_title; ?> ' target='_blank' title='<?php echo SHARE_ON_MIXX; ?>'><img alt='<?php echo MIXX; ?>' border="0" height='48' src='<?php echo base_url();?>images/social/mixx.png' width='48'/></a>
       
		
		
		
		
<a href='http://www.technorati.com/faves?add=<?php echo $project_share_link ;?>' target='_blank' title='<?php echo SHARE_ON_TECHNORATI; ?>'><img alt='<?php echo TECHNORATI; ?>' border="0" height='48' src='<?php echo base_url();?>images/social/technorati.png' width='48'/></a>

<a href='http://buzz.yahoo.com/article/<?php echo $project_share_link; ?>' target='_blank' title='<?php echo SHARE_ON_YAHOO_BUZZ; ?>'><img alt='<?php echo YAHOO_BUZZ; ?>' height='48' src='<?php echo base_url();?>images/social/yahoo.png' width='48' border="0"/></a>

<a href='http://www.designfloat.com/submit.php?url=<?php echo $project_share_link; ?>&amp;title=<?php echo $project_share_title; ?>' target='_blank' title='<?php echo DESIGNFLOAT; ?>'><img alt='<?php echo DESIGNFLOAT; ?>' border="0" height='48' src='<?php echo base_url();?>images/social/designfloat.png' width='48'/></a>


<a href='http://www.blinklist.com/index.php?Action=Blink/addblink.php&amp;Url=<?php echo $project_share_link; ?>&amp;title=<?php echo $project_share_title; ?>' target='_blank' title='<?php echo SHARE_ON_BLINKLIST; ?>'><img alt='<?php echo BLINKLIST; ?>' border="0" height='48' src='<?php echo base_url();?>images/social/blinklist.png' width='48'/></a>

<a href='http://furl.net/storeIt.jsp?t=<?php echo $project_share_title; ?>&amp;u=<?php echo $project_share_link; ?>' target='_blank' title='<?php echo SHARE_ON_FURL;?>'><img alt='<?php echo FURL; ?>' height='48' src='<?php echo base_url();?>images/social/furl.png'  border="0" width='48'/></a>

<a href="http://www.myspace.com/Modules/PostTo/Pages/?u=<?php echo $project_share_link; ?>&amp;t=<?php echo $project_share_title; ?>" target='_blank' title="<?php echo SHARE_ON_MYSPACE; ?>"><img src="<?php echo base_url();?>images/social/Myspace_36.png" border="0" alt="<?php echo MYSPACE; ?>" /></a>


<a href="http://cgi.fark.com/cgi/fark/submit.pl?new_url=<?php echo $project_share_link; ?>&amp;new_comment=<?php echo $project_share_title; ?>" title="<?php echo SHARE_WITH_FARK; ?>" target="_blank"><img alt='<?php echo FARK; ?>' border="0" height='48' src='<?php echo base_url();?>images/social/fark.png' width='48'/></a>

<a href='http://feeds.feedburner.com/profile_url' title='<?php echo SUBSCRIBE_TO_RSS; ?>' target="_blank"><img alt='<?php echo RSS; ?>' height='48' src='<?php echo base_url();?>images/social/rss.png' title="Feedburner" border="0" width='48'/></a>

<a href="https://plusone.google.com/_/+1/confirm?hl=en&url=<?php echo $project_share_link; ?>" title="<?php echo SHARE_ON_GOOGLE_PLUS; ?>" target="_blank"><img alt='<?php echo GOOGLE_PLUS; ?>' border="0" height='48' src='<?php echo base_url();?>images/social/google_plus.png' width='48'/></a>



				 







</div>
		
		
		
		
		</div>
			
			
			
				
				
				<div class="clear"></div>		
				
				
					</div>
	<!-- left end ------>
		
       </div>
   
		 			