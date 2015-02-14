
<div id="headerbar">
  <div class="wrap930">
    <div class="login_navl">
      <div style="margin:15px 0px 0px 0px; float:left;"> <span style="text-transform:capitalize;color:#2B5F94;font-size:17px; font-weight:bold;"> <?php echo MANAGE_YOUR_ACCOUNT_BELOW; ?> : </span> <?php echo YOUR_NAME_DISPLAYED_TO_PEOPLE_YOU_SHARE_YOUR_FUND; ?> </div>
    </div>
    <div class="clear"></div>
  </div>
</div>
<?php if($this->session->userdata('user_id')!='') {
 
	} ?>
<div class="clear"></div>
<div id="container">
  <div class="wrap930" style="text-align:center;padding:15px 0px 20px 0px;">
    <!--side bar user panel-->
    <?php echo $this->load->view('default/dashboard_sidebar'); ?>
    <!--side bar user panel-->
    <div class="con_left2" style="min-height:0px; width:690px; margin-right:0px;">
      <style type="text/css">
	.s_lleft
	{	
		width:198px !important;
	}
	.s_right {		
		width: 355px !important;		
	}
	
	</style>
      <style type="text/css">

#tab_all a{ color:#000000; text-decoration:none; }

</style>
      <?php
	$data['tab_sel'] = ACCOUNT;
	$this->load->view('default/dashboard_tabs',$data);

?>
      <?php
						$attributes = array('name'=>'frm_account');
						echo form_open_multipart('home/social_networking',$attributes);
						
				  ?>
      <div class="inner_content" style="margin-top:11px;padding:12px; ">
        <div class="clear"></div>
      
        <div class="clear"></div>
        <div id="msg" align="center"><span><?php echo $error; ?></span></div>
    
      
        
 <div class="inner_content_two">
 <h3 style="text-decoration:underline; text-align:left;"><?php echo FB_DETAILS;?> :</h3>
 
 
        
        	  
           
<?php
	//$this->load->library('fb_connect');
	$fbLoginURL = $this->fb_connect->myloginurl('home/facebook_user/');
	
	$data = array(
		'facebook'		=> $this->fb_connect->fb,
		'fbSession'		=> $this->fb_connect->fbSession,
		'user'			=> $this->fb_connect->user,
		'uid'			=> $this->fb_connect->user_id,
		'fbLogoutURL'	=> $this->fb_connect->fbLogoutURL,
		'fbLoginURL'	=> $fbLoginURL,	
		'base_url'		=> site_url('home/facebook_user'),
		'appkey'		=> $this->fb_connect->appkey,
	);
	
					
?>			     
                                    
 <script type="text/javascript">
			window.fbAsyncInit = function() {
	        	FB.init({appId: '<?php echo $data['appkey'];?>', status: true, cookie: true, xfbml: true});
	 
	            /* All the events registered */
	            FB.Event.subscribe('auth.login', function(response) {
	    			// do something with response
	             //   login();
	        	});
	
	            FB.Event.subscribe('auth.logout', function(response) {
	            // do something with response
	               // logout();
	          	});
	   		};
	
	        (function() {
		        var e = document.createElement('script');
	            e.type = 'text/javascript';
	            e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
		        e.async = true;
	            document.getElementById('fb-root').appendChild(e);
	   	 	}());
	 
	        function login(){
	        	//document.location.href = "<?php // echo $data['base_url']; ?>";
	     	}
	
	        function logout(){
	        	//document.location.href = "<?php //echo $data['base_url']; ?>";
	 		}
			function display_facebook(){
				if(document.getElementById('facebook_wall_post').checked==true){
					document.getElementById('facebook_details').style.display = 'block';
				}else{
					document.getElementById('facebook_details').style.display = 'none';
				}
			}
			
		</script>                                
        
               
        <div class="s_lleft">
          <label>&nbsp;&nbsp;&nbsp;</label>
        </div>
        <div class="s_right"><span>
          <input type="checkbox" name="enable_facebook_stream" id="enable_facebook_stream" <?php if($result['enable_facebook_stream']=='1'){ echo 'checked="checked"';  } ?> value="1" />
          </span> <span><?php echo FACEBOOK_PROFILE_STREAM; ?> </span></div>
        <div class="clear"></div>
        
        
        <div class="s_lleft">
          <label><?php echo FACEBOOK_PROFILE_URL; ?> :&nbsp;&nbsp;&nbsp;</label>
        </div>
        <div class="s_right"><span>
          <input type="text" name="facebook_url" id="facebook_url" value="<?php echo $result['facebook_url']; ?>"   class="btn_input2"/>
          </span></div>
        <div class="clear"></div>
        
 
		  <div class="s_lleft">
		    <label><span>&nbsp;</span></label>
         </div> 
         <div class="s_right"> <span>
       		 <input type="checkbox" name="facebook_wall_post" id="facebook_wall_post" value="1" <?php if($result['facebook_wall_post']=='1'){ echo 'checked="checked"'; } ?> style="width:25px;" onclick="display_facebook();"  /><?php echo ALLOW_POST_ON_FB_WALL;?>
             </span>
		 </div>
 		 <div class="clear"></div>
                                    
					 <?php if($result['facebook_wall_post']=='1'){ ?>
        			
                     <div  id="facebook_details" style="display:block;">
                      <div class="s_lleft"> <label><?php echo FB_ACCESS_TOKEN;?><span>&nbsp;</span></label></div>
						 <div class="s_right"> <span>
									    <input type="text" name="fb_access_token" id="fb_access_token" value="<?php echo $result['fb_access_token']; ?>" readonly="readonly" class="btn_input2" />
									 </span></div>
						<div class="clear"></div>
                                
                        <div class="s_lleft"> <label><?php echo FB_USER_ID;?><span>&nbsp;</span></label></div>
						 <div class="s_right"> <span>
									    <input type="text" name="fb_uid" id="fb_uid" value="<?php echo $result['fb_uid']; ?>" readonly="readonly" class="btn_input2" />
									  </span></div>

						<div class="clear"></div>
                                
                                
                         <div class="s_lleft"> <label><?php echo WANT_TO_CHANGE_FB_DETAILS;?><span>&nbsp;</span></label></div>
						 <div class="s_right"> <span><a href="<?php echo $data['fbLoginURL']; ?>"><img src="<?php echo base_url(); ?>images/facebook.png" name="MyImage" onmouseover="document.MyImage.src='<?php echo base_url(); ?>images/facebook-ho.png';" onmouseout="document.MyImage.src='<?php echo base_url(); ?>images/facebook.png';" style="border:none; position:relative; top:3px;"/> <?php echo CONNECT_TO_FB;?></a>	</span></div>
						<div class="clear"></div>
                                  
                   
                   </div>                 
                       <?php } else { ?>             
                       		 <div  id="facebook_details" style="display:none;">
                            <?php if($result['fb_access_token']!=''){  ?>
                           
                      <div class="s_lleft"> <label><?php echo FB_ACCESS_TOKEN;?><span>&nbsp;</span></label></div>
						 <div class="s_right"> <span>
									    <input type="text" name="fb_access_token" id="fb_access_token" value="<?php echo $result['fb_access_token']; ?>" readonly="readonly" class="btn_input2"/>
									 </span></div>
						<div class="clear"></div>
                                
                        <div class="s_lleft"> <label><?php echo FB_USER_ID;?><span>&nbsp;</span></label></div>
						 <div class="s_right"> <span>
									    <input type="text" name="fb_uid" id="fb_uid" value="<?php echo $result['fb_uid']; ?>" readonly="readonly" class="btn_input2"/>
									  </span></div>

						<div class="clear"></div>
                                
                                
                         <div class="s_lleft"> <label><?php echo WANT_TO_CHANGE_FB_DETAILS;?><span>&nbsp;</span></label></div>
						 <div class="s_right"> <span><a href="<?php echo $data['fbLoginURL']; ?>"><img src="<?php echo base_url(); ?>images/facebook.png" name="MyImage" onmouseover="document.MyImage.src='<?php echo base_url(); ?>images/facebook-ho.png';" onmouseout="document.MyImage.src='<?php echo base_url(); ?>images/facebook.png';" style="border:none; position:relative; top:3px;"/> <?php echo CONNECT_TO_FB;?></a>	</span></div>
						<div class="clear"></div>
                                        
                   
                 
                            <?php }else{ ?>
                            
                              <div class="s_lleft"> <label><?php echo ADD_FB_DETAIL;?><span>&nbsp;</span></label></div>
							  <div class="s_right"> <span><a href="<?php echo $data['fbLoginURL']; ?>"><img src="<?php echo base_url(); ?>images/facebook.png" name="MyImage" onmouseover="document.MyImage.src='<?php echo base_url(); ?>images/facebook-ho.png';" onmouseout="document.MyImage.src='<?php echo base_url(); ?>images/facebook.png';" style="border:none; position:relative; top:3px;"/> <?php echo CONNECT_TO_FB;?></a>
    <input type="hidden" name="fb_access_token" id="fb_access_token" value="<?php echo $result['fb_access_token']; ?>"/>
    <input type="hidden" name="fb_uid" id="fb_uid" value="<?php echo $result['fb_uid']; ?>" /></span></div>
	                     <div class="clear"></div>
                        
                            
                                 <?php   } ?>
                                 </div>
                                
                       <?php   } ?>   
  </div>            
              
  <div class="inner_content_two">
  
  <h3 style="text-decoration:underline; text-align:left;"><?php echo TW_DETAILS;?> :</h3>
 
   
        <script type="text/javascript">
			function display_twitter(){
				if(document.getElementById('autopost_site').checked==true){
					document.getElementById('twitter_details').style.display = 'block';
				}else{
					document.getElementById('twitter_details').style.display = 'none';
				}
			}
			
		</script>    
					      
          <div class="s_lleft">
          <label>&nbsp;&nbsp;&nbsp;</label>
        </div>
        <div class="s_right"><span>
          <input type="checkbox" name="enable_twitter_stream" id="enable_twitter_stream" <?php if($result['enable_twitter_stream']=='1'){ echo 'checked="checked"';  } ?> value="1" />
          </span> <span><?php echo TWITTER_PROFILE_STREAM; ?> </span></div>
        <div class="clear"></div>
        
        
        <div class="s_lleft">
          <label><?php echo TWITTER_PROFILE_URL; ?> :&nbsp;&nbsp;&nbsp;</label>
        </div>
        <div class="s_right"><span>
          <input type="text" name="twitter_url" id="twitter_url" value="<?php echo $result['twitter_url']; ?>"  class="btn_input2"/>
          </span></div>
        <div class="clear"></div>
        
        
      	<div class="s_lleft"><label><span>&nbsp;</span></label></div>
		<div class="s_right"><span>
				  <input type="checkbox" name="autopost_site" id="autopost_site" value="1" <?php if($result['autopost_site']=='1'){ echo 'checked="checked"'; } ?> style="width:25px;" onclick="display_twitter();"  /><?php echo ALLOW_POST_ON_TW;?>
		  </span></div>
		<div class="clear"></div>
                                    
					 
					 <?php if($result['autopost_site']=='1'){ ?>
        			
                     <div  id="twitter_details" style="display:block;">
                        
                        <div class="s_lleft"><label><?php echo TW_ACCESS_TOKEN_SECRET;?><span>&nbsp;</span></label></div>
						<div class="s_right"><span>
							<input type="text" name="tw_oauth_token_secret" id="tw_oauth_token_secret" value="<?php echo $result['tw_oauth_token_secret']; ?>" readonly="readonly" class="btn_input2"/>
						 </span></div>
						<div class="clear"></div>
              
                         <div class="s_lleft"> <label><?php echo TW_ACCESS_TOKEN;?><span>&nbsp;</span></label></div>
						 <div class="s_right"><span>
									    <input type="text" name="tw_oauth_token" id="tw_oauth_token" value="<?php echo $result['tw_oauth_token']; ?>" readonly="readonly" class="btn_input2"/>
						 </span></div>
						<div class="clear"></div>
                            
                                
                         <div class="s_lleft"><label><?php echo WANT_TO_CHANGE_TW_DETAILS;?> <span>&nbsp;</span></label></div>
						 <div class="s_right"><span>
										 <a  href="<?php echo site_url('home/twitter_auth_admin/user'); ?>" >
<img src="<?php echo base_url(); ?>images/twitter.png" name="twitter_img" onmouseover="document.twitter_img.src='<?php echo base_url(); ?>images/twitter-ho.png';" onmouseout="document.twitter_img.src='<?php echo base_url(); ?>images/twitter.png';" alt="sign in with twitter" style="border:none; position:relative; top:3px;" /> <?php echo CONNECT_TO_TW;?></a>	
 						</span></div>
						<div class="clear"></div>
                                        
                   
                   </div>                 
                       <?php } else { ?>             
                       		
                            
                             <div  id="twitter_details" style="display:none;">
                    	
                        	<?php if($result['tw_oauth_token_secret']!=''){ ?>
                            
                              <div class="s_lleft"> <label><?php echo TW_ACCESS_TOKEN_SECRET;?><span>&nbsp;</span></label></div>
							  <div class="s_right"><span>
								   <input type="text" name="tw_oauth_token_secret" id="tw_oauth_token_secret" value="<?php echo $result['tw_oauth_token_secret']; ?>" readonly="readonly" class="btn_input2"/>
							 </span></div>
							 <div class="clear"></div>
                                
                         <div class="s_lleft"><label><?php echo TW_ACCESS_TOKEN;?><span>&nbsp;</span></label></div>
						<div class="s_right"><span>
								<input type="text" name="tw_oauth_token" id="tw_oauth_token" value="<?php echo $result['tw_oauth_token']; ?>" readonly="readonly" class="btn_input2"/>
						 </span></div>
						 <div class="clear"></div>
                                
                        
                                
                         <div class="s_lleft"> <label><?php echo WANT_TO_CHANGE_TW_DETAILS;?><span>&nbsp;</span></label></div>
						 <div class="s_right"><span>
							 <a  href="<?php echo site_url('home/twitter_auth_admin/user'); ?>" >
<img src="<?php echo base_url(); ?>images/twitter.png" name="twitter_img" onmouseover="document.twitter_img.src='<?php echo base_url(); ?>images/twitter-ho.png';" onmouseout="document.twitter_img.src='<?php echo base_url(); ?>images/twitter.png';" alt="sign in with twitter" style="border:none; position:relative; top:3px;" /> <?php echo CONNECT_TO_TW;?></a>		

                         </span></div>
                        <div class="clear"></div>
                                    
                         <?php } else{ ?>               
                   				  <div class="s_lleft"> <label><?php echo ADD_TW_DETAIL;?><span>&nbsp;</span></label></div>
								  <div class="s_right"><span>
										 <a  href="<?php echo site_url('home/twitter_auth_admin/user'); ?>" >
<img src="<?php echo base_url(); ?>images/twitter.png" name="twitter_img" onmouseover="document.twitter_img.src='<?php echo base_url(); ?>images/twitter-ho.png';" onmouseout="document.twitter_img.src='<?php echo base_url(); ?>images/twitter.png';" alt="sign in with twitter" style="border:none; position:relative; top:3px;" /> <?php echo CONNECT_TO_TW;?></a>

 	<input type="hidden" name="tw_oauth_token_secret" id="tw_oauth_token_secret" value="<?php echo $result['tw_oauth_token_secret']; ?>" />
	<input type="hidden" name="tw_oauth_token" id="tw_oauth_token" value="<?php echo $result['tw_oauth_token']; ?>" />
                                </span></div>
								<div class="clear"></div>
                                 <?php } ?>   
                   			</div>    
                   
                           
                                
                       <?php } ?>
</div>

<div class="inner_content_two">       
   <h3 style="text-decoration:underline; text-align:left;"><?php echo OTHER_DETAILS;?> :</h3>
 
         <div class="s_lleft">
          <label><?php echo WEBSITE; ?> :&nbsp;&nbsp;&nbsp;</label>
        </div>
        <div class="s_right"><span>
          <input type="text" name="user_website" id="user_website" value="<?php echo $result['user_website']; ?>"   class="btn_input2"/>
          </span></div>
        <div class="clear"></div>
        
        
        <div class="s_lleft">
          <label><?php echo LINKEDIN_PROFILE_URL; ?> :&nbsp;&nbsp;&nbsp;</label>
        </div>
        <div class="s_right"><span>
          <input type="text" name="linkedln_url" id="linkedln_url" value="<?php echo $result['linkedln_url']; ?>" class="btn_input2"/>
          </span></div>
        <div class="clear"></div>
        <div class="s_lleft">
          <label><?php echo GOOGLE_PLUS_PROFILE_URL; ?> :&nbsp;&nbsp;&nbsp;</label>
        </div>
        <div class="s_right"><span>
          <input type="text" name="googleplus_url" id="googleplus_url" value="<?php echo $result['googleplus_url']; ?>" class="btn_input2"/>
          </span></div>
        <div class="clear"></div>
        <div class="s_lleft">
          <label><?php echo BANDCAMP_PROFILE_URL; ?> :&nbsp;&nbsp;&nbsp;</label>
        </div>
        <div class="s_right"><span>
          <input type="text" name="bandcamp_url" id="bandcamp_url" value="<?php echo $result['bandcamp_url']; ?>" class="btn_input2"/>
          </span></div>
        <div class="clear"></div>
        <div class="s_lleft">
          <label><?php echo YOUTUBE_PROFILE_URL; ?> :&nbsp;&nbsp;&nbsp;</label>
        </div>
        <div class="s_right"><span>
          <input type="text" name="youtube_url" id="youtube_url" value="<?php echo $result['youtube_url']; ?>" class="btn_input2"/>
          </span></div>
        <div class="clear"></div>
        <div class="s_lleft">
          <label><?php echo MYSPACE_PROFILE_URL; ?> :&nbsp;&nbsp;&nbsp;</label>
        </div>
        <div class="s_right"><span>
          <input type="text" name="myspace_url" id="myspace_url" value="<?php echo $result['myspace_url']; ?>" class="btn_input2"/>
          </span></div>
        <div class="clear"></div>
        <input type="hidden" name="user_id" id="user_id" value="<?php echo $result['user_id']; ?>" />
 </div>       
        
        <div class="s_lleft"> &nbsp;</div>
        <div class="s_right">
          <input type="submit" class="submit" style="font-weight:bold;" name="login" id="login" value="<?php echo SAVE_CHANGES; ?>"  />
          <input type="button" onClick="location.href='<?php echo site_url('home/dashboard');?>'" class="submit" style="font-weight:bold; margin-left:8px;" name="login" id="login" value="<?php echo CANCEL; ?>"   />
        </div>
        <div class="clear"></div>
        <div align="right" style="font-size:10px; padding-right:15px;">
          <p class="required"><?php echo REQUIRED_FIELD; ?></p>
        </div>
        <div class="clear"></div>
        </form>
      </div>
    </div>
    <!--con left2-->
  </div>
</div>
