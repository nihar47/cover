<div id="con-tabs">

          <ul>

           

		  <?php  $check_site_rights=$this->home_model->get_rights('add_site_setting');

		 		$check_meta_rights=$this->home_model->get_rights('add_meta_setting');

				$check_fb_rights=$this->home_model->get_rights('add_facebook_setting');

				$check_tw_rights=$this->home_model->get_rights('add_twitter_setting');

				$check_em_rights=$this->home_model->get_rights('add_email_setting');

				$check_filter_rights=$this->home_model->get_rights('add_filter_setting');

				$check_img_rights=$this->home_model->get_rights('add_image_setting');

			$check_google_rights=$this->home_model->get_rights('add_google_setting');
				$check_yahoo_rights=$this->home_model->get_rights('add_yahoo_setting');
				
				$chk_message_setting=$this->home_model->get_rights('add_message_setting');

			if($check_site_rights==1) {		?>

		   

		    <li><span style="cursor:pointer;"><?php echo anchor('site_setting/add_site_setting','Site','id="sp_1"'); ?></span></li>

			  <li><span style="cursor:pointer;"><?php echo anchor('site_setting/add_amount_formatting','Amount'); ?></span></li>


			 <?php } if($check_meta_rights==1) { ?>

			

			<li><span style="cursor:pointer;"><?php echo anchor('meta_setting/add_meta_setting','Meta','id="sp_2"'); ?></span></li>

			

			<?php } if($check_fb_rights==1) { ?>

			

			<li><span style="cursor:pointer;"><?php echo anchor('facebook_setting/add_facebook_setting','Facebook','style="color:#364852;background:#ececec;"'); ?></span></li>

			

			<?php } if($check_tw_rights==1) { ?>

			

			<li><span style="cursor:pointer;"><?php echo anchor('twitter_setting/add_twitter_setting','Twitter'); ?></span></li>    

			<?php } if($check_google_rights==1) { ?>

			

			<li><span style="cursor:pointer;"><?php echo anchor('google_setting/add_google_setting','Google'); ?></span></li>    
            
            <?php } if($check_yahoo_rights==1) { ?>

			

			<li><span style="cursor:pointer;"><?php echo anchor('yahoo_setting/add_yahoo_setting','Yahoo'); ?></span></li>    

			<?php } if($check_em_rights==1) { ?>

			

			<li><span style="cursor:pointer;"><?php echo anchor('email_setting/add_email_setting','Email'); ?></span></li>  

			

			<?php }  if($check_filter_rights==1) { ?>

			

			<li><span style="cursor:pointer;"><?php echo anchor('site_setting/add_filter_setting','Filter'); ?></span></li>  

			

			<?php } if($check_img_rights==1) { ?>

            

               <li><span style="cursor:pointer;"><?php echo anchor('site_setting/add_image_setting','Image Size'); ?></span></li>      

               

             <?php } if($chk_message_setting==1) { ?>
				
                
         <li><span style="cursor:pointer;"><?php echo anchor('message_setting/add_message_setting','Messages'); ?></span> 	</li>
			
             <?php } ?>

          </ul>

          <div id="text">

            <div id="1">

            	<?php if($error != "")

					{?>

						<div style="text-align:center;" class="msgdisp"><?php  echo $error; ?></div>

					<?php }

			?>	

              <div class="fleft" style="width:100%;">

                <div style="height:10px;"></div>

				<table width="100%" border="0" cellpadding="0" cellspacing="0">

                  <tr>

                    <td><img src="<?php echo base_url(); ?>images/c2-t-l.jpg" alt="" height="4" width="7" /></td>

                    <td background="<?php echo base_url(); ?>images/c2-t.jpg" width="99%"></td>

                    <td><img src="<?php echo base_url(); ?>images/c2-t-r.jpg" alt="" height="4" width="7" /></td>

                  </tr>

                  <tr>

                    <td background="<?php echo base_url(); ?>images/c2-l.jpg"></td>

                    <td valign="top" bgcolor="#FFFFFF"><div id="deal-tabs">

						<div id="deal-con">

							<div id="2" style="">

							  <div align="center">

								<div id="add-deal">

								  <?php

									$attributes = array('name'=>'frm_facebook_setting');

									echo form_open('facebook_setting/add_facebook_setting',$attributes);

								  ?>

									<fieldset class="step">

									<div class="fleft">

									  <label>Facebook Profile Full URL<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('facebook_url')" onmouseout="hide_bg('facebook_url')">

									  <textarea name="facebook_url" id="facebook_url"  onfocus="show_bg('facebook_url')" onblur="hide_bg('facebook_url')"><?php echo $facebook_url; ?></textarea>

									  </span>

									</div>

									<div style="clear:both;"></div>

                                    

                                    												

									<div class="fleft">

									  <label>Facebook Application ID<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('facebook_application_id')" onmouseout="hide_bg('facebook_application_id')">

									  <input type="text" name="facebook_application_id" id="facebook_application_id" value="<?php echo $facebook_application_id; ?>" onfocus="show_bg('facebook_application_id')" onblur="hide_bg('facebook_application_id')"/>

									  </span>

									</div>

									<div style="clear:both;"></div>

									<div class="fleft">

									  <label>Facebook Login Enable<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('facebook_login_enable')" onmouseout="hide_bg('facebook_login_enable')">

									  <select name="facebook_login_enable" id="facebook_login_enable">

									  	<option value="1" <?php if($facebook_login_enable == '1'){	echo 'selected="selected"';	} ?>>Enable</option>

										<option value="0" <?php if($facebook_login_enable == '0'){	echo 'selected="selected"';	} ?> >Disable</option>

									  </select>

									  

									  </span>

									</div>

									<div style="clear:both;"></div>

									<!--<div class="fleft">

									  <label>Facebook Accees Token<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('facebook_access_token')" onmouseout="hide_bg('facebook_access_token')">

									  <input type="text" name="facebook_access_token" id="facebook_access_token" value="<?php //echo $facebook_access_token; ?>" onfocus="show_bg('facebook_access_token')" onblur="hide_bg('facebook_access_token')"/>

									  </span>

									</div>

									<div style="clear:both;"></div>-->

									<div class="fleft">

									  <label>Facebook Application API Key<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('facebook_api_key')" onmouseout="hide_bg('facebook_api_key')">

									  <input type="text" name="facebook_api_key" id="facebook_api_key" value="<?php echo $facebook_api_key; ?>" onfocus="show_bg('facebook_api_key')" onblur="hide_bg('facebook_api_key')"/>

									  </span>

									</div>

									<div style="clear:both;"></div>

									<!--<div class="fleft">

									  <label>Facebook User ID<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('facebook_user_id')" onmouseout="hide_bg('facebook_user_id')">

									  <input type="text" name="facebook_user_id" id="facebook_user_id" value="<?php //echo $facebook_user_id; ?>" onfocus="show_bg('facebook_user_id')" onblur="hide_bg('facebook_user_id')"/>

									  </span>

									</div>

									<div style="clear:both;"></div>-->

									<div class="fleft">

									  <label>Facebook Application Secret Key<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('facebook_secret_key')" onmouseout="hide_bg('facebook_secret_key')">

									  <input type="text" name="facebook_secret_key" id="facebook_secret_key" value="<?php echo $facebook_secret_key; ?>" onfocus="show_bg('facebook_secret_key')" onblur="hide_bg('facebook_secret_key')"/>

									  </span>

									</div>

									<div style="clear:both;"></div>


<?php
	//$this->load->library('fb_connect');
	
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
	//var_dump($data);
	$base_image = upload_url();
	$CI =& get_instance();
	$base_path = $CI->config->slash_item('base_path');
					
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
        
        
								<div class="fleft">

									  <label><span>&nbsp;</span></label>

									  <span>

									  <input type="checkbox" name="facebook_wall_post" id="facebook_wall_post" value="1" <?php if($facebook_wall_post=='1'){ echo 'checked="checked"'; } ?> style="width:25px;" onclick="display_facebook();"  />Allow Post on Facebook Wall

									  </span>

									</div>

									<div style="clear:both;"></div>
                                    
					 <?php if($facebook_wall_post=='1'){ ?>
        			
                     <div  id="facebook_details" style="display:block;">
                      <div class="fleft">

									  <label>Facebook Access Token<span>&nbsp;</span></label>
									  <span>
									    <input type="text" name="facebook_access_token" id="facebook_access_token" value="<?php echo $facebook_access_token; ?>" readonly="readonly" />
									 </span>
									
									</div>

								<div style="clear:both;"></div>
                                
                         <div class="fleft">

									  <label>Facebook User ID<span>&nbsp;</span></label>
									  <span>
									    <input type="text" name="facebook_user_id" id="facebook_user_id" value="<?php echo $facebook_user_id; ?>" readonly="readonly" />
									  </span>
									
									</div>

								<div style="clear:both;"></div>
                                
                          <div class="fleft">

									  <label>Facebook Image<span>&nbsp;</span></label>
									  <span>
									  		<?php if($fb_img!='' && is_file($base_path.'upload/thumb/'.$fb_img) ){  ?>
                        		
                                                <img src="<?php echo $base_image;?>upload/thumb/<?php echo $fb_img; ?>" border="0" width="150" height="150" style="padding:2px; border:1px solid #E1E1E1;" id="media_image_img" />
                                            
                                            <?php }else{ echo 'Not Available';  } ?>
                                        
                                      </span>
									
									</div>

								<div style="clear:both;"></div>               
                                
                         <div class="fleft">

									  <label>Want to Change Facebook Details?<span>&nbsp;</span></label>
							
										  <a href="<?php echo $data['fbLoginURL']; ?>"><img src="<?php echo $base_image; ?>images/facebook.png" name="MyImage" onmouseover="document.MyImage.src='<?php echo $base_image; ?>images/facebook-ho.png';" onmouseout="document.MyImage.src='<?php echo $base_image; ?>images/facebook.png';" style="border:none; position:relative; top:3px;"/> Connect to Facebook</a><input type="hidden" name="fb_img" id="fb_img" value="<?php echo $fb_img; ?>" />	

									</div>

								<div style="clear:both;"></div>
                                        
                   
                   </div>                 
                       <?php } else { ?>             
                       		 <div  id="facebook_details" style="display:none;">
                            <?php if($facebook_access_token!=''){  ?>
                           
                      <div class="fleft">

									  <label>Facebook Access Token<span>&nbsp;</span></label>
									  <span>
									    <input type="text" name="facebook_access_token" id="facebook_access_token" value="<?php echo $facebook_access_token; ?>" readonly="readonly" />
									 </span>
									
									</div>

								<div style="clear:both;"></div>
                                
                         <div class="fleft">

									  <label>Facebook User ID<span>&nbsp;</span></label>
									  <span>
									    <input type="text" name="facebook_user_id" id="facebook_user_id" value="<?php echo $facebook_user_id; ?>" readonly="readonly" />
									  </span>
									
									</div>

								<div style="clear:both;"></div>
                                
                          <div class="fleft">

									  <label>Facebook Image<span>&nbsp;</span></label>
									  <span>
									  		<?php if($fb_img!='' && is_file($base_path.'upload/thumb/'.$fb_img) ){  ?>
                        		
                                                <img src="<?php echo $base_image;?>upload/thumb/<?php echo $fb_img; ?>" border="0" width="150" height="150" style="padding:2px; border:1px solid #E1E1E1;" id="media_image_img" />
                                            
                                            <?php }else{ echo 'Not Available';  } ?>
                                        
                                      </span>
									
									</div>

								<div style="clear:both;"></div>               
                                
                         <div class="fleft">

									  <label>Want to Change Facebook Details?<span>&nbsp;</span></label>
							
										  <a href="<?php echo $data['fbLoginURL']; ?>"><img src="<?php echo $base_image; ?>images/facebook.png" name="MyImage" onmouseover="document.MyImage.src='<?php echo $base_image; ?>images/facebook-ho.png';" onmouseout="document.MyImage.src='<?php echo $base_image; ?>images/facebook.png';" style="border:none; position:relative; top:3px;"/> Connect to Facebook</a><input type="hidden" name="fb_img" id="fb_img" value="<?php echo $fb_img; ?>" />	

									</div>

								<div style="clear:both;"></div>
                                        
                   
                 
                            <?php }else{ ?>
                            
                             <div class="fleft">

									  <label>Add Facebook Details<span>&nbsp;</span></label>
							
										  <a href="<?php echo $data['fbLoginURL']; ?>"><img src="<?php echo $base_image; ?>images/facebook.png" name="MyImage" onmouseover="document.MyImage.src='<?php echo $base_image; ?>images/facebook-ho.png';" onmouseout="document.MyImage.src='<?php echo $base_image; ?>images/facebook.png';" style="border:none; position:relative; top:3px;"/> Connect to Facebook</a>
 <input type="hidden" name="facebook_access_token" id="facebook_access_token" value="<?php echo $facebook_access_token; ?>"/>
  <input type="hidden" name="facebook_user_id" id="facebook_user_id" value="<?php echo $facebook_user_id; ?>" />
	<input type="hidden" name="fb_img" id="fb_img" value="<?php echo $fb_img; ?>" />		
    								</div>

								<div style="clear:both;"></div>
                                 <?php   } ?>
                                 </div>
                                
                       <?php   } ?>
									<div class="fleft">

									  <label>&nbsp;<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('facebook_setting_id')" onmouseout="hide_bg('facebook_setting_id')">

									  <input type="hidden" name="facebook_setting_id" id="facebook_setting_id" value="<?php echo $facebook_setting_id; ?>" />													  

									  </span>

									</div>

									<div style="clear:both;"></div>

									<div class="fleft">

									  <label>&nbsp;<span>&nbsp;</span></label>

									  <div class="submit">

										<input type="submit" name="submit" value="Update" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer; " onclick=""/>

									  </div>

									</div>

									</fieldset>

								  </form>

								</div>

							  </div>

							</div>

						</div>

					</div></td>

                    <td background="<?php echo base_url(); ?>images/c2-r.jpg"></td>

                  </tr>

                  <tr>

                    <td><img src="<?php echo base_url(); ?>images/c2-b-l.jpg" alt="" height="4" width="7" /></td>

                    <td background="<?php echo base_url(); ?>images/c2-b.jpg"></td>

                    <td><img src="<?php echo base_url(); ?>images/c2-b-r.jpg" alt="" height="4" width="7" /></td>

                  </tr>

                </table>

              </div>

            </div>

          </div>

        </div>