<div id="con-tabs">

          <ul>

           

		 <?php  $check_site_rights=$this->home_model->get_rights('add_site_setting');

		 		$check_meta_rights=$this->home_model->get_rights('add_meta_setting');

				$check_fb_rights=$this->home_model->get_rights('add_facebook_setting');

				$check_tw_rights=$this->home_model->get_rights('add_twitter_setting');
				
				$check_google_rights=$this->home_model->get_rights('add_google_setting');
				$check_yahoo_rights=$this->home_model->get_rights('add_yahoo_setting');

				$check_em_rights=$this->home_model->get_rights('add_email_setting');

				$check_filter_rights=$this->home_model->get_rights('add_filter_setting');

				$check_img_rights=$this->home_model->get_rights('add_image_setting');

		$chk_message_setting=$this->home_model->get_rights('add_message_setting');

			if($check_site_rights==1) {		?>			

		

		    <li><span style="cursor:pointer;"><?php echo anchor('site_setting/add_site_setting','Site','id="sp_1"'); ?></span></li>

			  <li><span style="cursor:pointer;"><?php echo anchor('site_setting/add_amount_formatting','Amount'); ?></span></li>


			<?php } if($check_meta_rights==1) { ?>

						

			<li><span style="cursor:pointer;"><?php echo anchor('meta_setting/add_meta_setting','Meta','id="sp_2"'); ?></span></li>	

			

			<?php } if($check_fb_rights==1) { ?>

				

			<li><span style="cursor:pointer;"><?php echo anchor('facebook_setting/add_facebook_setting','Facebook'); ?></span></li>

			

			<?php } if($check_tw_rights==1) { ?>

			

			<li><span style="cursor:pointer;"><?php echo anchor('twitter_setting/add_twitter_setting','Twitter','style="color:#364852;background:#ececec;"'); ?></span></li>     

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

									$attributes = array('name'=>'frm_twitter_setting');

									echo form_open('twitter_setting/add_twitter_setting',$attributes);

								  ?>

									<fieldset class="step">

									

                                    <div class="fleft">

									  <label>Twitter Profile Full URL<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('twitter_url')" onmouseout="hide_bg('twitter_url')">

									  <textarea name="twitter_url" id="twitter_url"  onfocus="show_bg('twitter_url')" onblur="hide_bg('twitter_url')"><?php echo $twitter_url; ?></textarea>

									  </span>

									</div>

									<div style="clear:both;"></div>

                                    

                                    											

									<div class="fleft">

									  <label>Twitter enabled<span>&nbsp;</span></label>

									 

									   <select name="twitter_enable" id="twitter_enable">

									  	<option value="1" <?php if($twitter_enable == '1'){	echo 'selected="selected"';	} ?>>Enable</option>

										<option value="0" <?php if($twitter_enable == '0'){	echo 'selected="selected"';	} ?> >Disable</option>

									  </select>

									  

								

									</div>

									<div style="clear:both;"></div>

									

									<!--<div class="fleft">

									  <label>Twitter User Name<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('twitter_user_name')" onmouseout="hide_bg('twitter_user_name')">

									  <input type="text" name="twitter_user_name" id="twitter_user_name" value="<?php //echo $twitter_user_name; ?>" onfocus="show_bg('twitter_user_name')" onblur="hide_bg('twitter_user_name')"/>

									  </span>

									</div>

									<div style="clear:both;"></div>-->

									<div class="fleft">

									  <label>Consumer key<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('consumer_key')" onmouseout="hide_bg('consumer_key')">

									  <input type="text" name="consumer_key" id="consumer_key" value="<?php echo $consumer_key; ?>" onfocus="show_bg('consumer_key')" onblur="hide_bg('consumer_key')"/>

									  </span>

									</div>

									<div style="clear:both;"></div>

									<div class="fleft">

									  <label>Consumer secret<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('consumer_secret')" onmouseout="hide_bg('consumer_secret')">

									  <input type="text" name="consumer_secret" id="consumer_secret" value="<?php echo $consumer_secret; ?>" onfocus="show_bg('consumer_secret')" onblur="hide_bg('consumer_secret')"/>

									  </span>

									</div>

<?php
	$base_image = upload_url();
	$CI =& get_instance();
	$base_path = $CI->config->slash_item('base_path');
	$base_url_site = $CI->config->slash_item('base_url_site');
					
?>			    									<div style="clear:both;"></div>
                                    
		<script type="text/javascript">
			function display_twitter(){
				if(document.getElementById('autopost_site').checked==true){
					document.getElementById('twitter_details').style.display = 'block';
				}else{
					document.getElementById('twitter_details').style.display = 'none';
				}
			}
			
		</script>    
								<div class="fleft">

									  <label><span>&nbsp;</span></label>

									  <span>

									  <input type="checkbox" name="autopost_site" id="autopost_site" value="1" <?php if($autopost_site=='1'){ echo 'checked="checked"'; } ?> style="width:25px;" onclick="display_twitter();"  />Allow Post on Twitter

									  </span>

									</div>

									<div style="clear:both;"></div>
                                    
					 
					 <?php if($autopost_site=='1'){ ?>
        			
                     <div  id="twitter_details" style="display:block;">
                      <div class="fleft">

									  <label>Access token secret<span>&nbsp;</span></label>
									  <span>
									    <input type="text" name="tw_oauth_token_secret" id="tw_oauth_token_secret" value="<?php echo $tw_oauth_token_secret; ?>" readonly="readonly" />
									 </span>
									
									</div>

								<div style="clear:both;"></div>
                                
                         <div class="fleft">

									  <label>Access token<span>&nbsp;</span></label>
									  <span>
									    <input type="text" name="tw_oauth_token" id="tw_oauth_token" value="<?php echo $tw_oauth_token; ?>" readonly="readonly" />
									  </span>
									
									</div>

								<div style="clear:both;"></div>
                                
                          <div class="fleft">

									  <label>Twitter Image<span>&nbsp;</span></label>
									  <span>
									  		<?php if($twiter_img!='' && is_file($base_path.'upload/thumb/'.$twiter_img) ){  ?>
                        		
                                                <img src="<?php echo $base_image;?>upload/thumb/<?php echo $twiter_img; ?>" border="0" width="150" height="150" style="padding:2px; border:1px solid #E1E1E1;" id="media_image_img" />
                                            
                                            <?php }else{ echo 'Not Available';  } ?>
                                        
                                      </span>
									
									</div>

								<div style="clear:both;"></div>               
                                
                         <div class="fleft">

									  <label>Want to Change Twitter Details?<span>&nbsp;</span></label>
							
										 <a  href="<?php echo $base_url_site.'home/twitter_auth_admin'; ?>" >
<img src="<?php echo $base_image; ?>images/twitter.png" name="twitter_img" onmouseover="document.twitter_img.src='<?php echo $base_image; ?>images/twitter-ho.png';" onmouseout="document.twitter_img.src='<?php echo $base_image; ?>images/twitter.png';" alt="sign in with twitter" style="border:none; position:relative; top:3px;" /> Connect to Twitter</a><input type="hidden" name="twiter_img" id="twiter_img" value="<?php echo $twiter_img; ?>" />		

									</div>

								<div style="clear:both;"></div>
                                        
                   
                   </div>                 
                       <?php } else { ?>             
                       		
                            
                             <div  id="twitter_details" style="display:none;">
                    	
                        	<?php if($tw_oauth_token_secret!=''){ ?>
                            
                              <div class="fleft">

									  <label>Access token secret<span>&nbsp;</span></label>
									  <span>
									    <input type="text" name="tw_oauth_token_secret" id="tw_oauth_token_secret" value="<?php echo $tw_oauth_token_secret; ?>" readonly="readonly" />
									 </span>
									
									</div>

								<div style="clear:both;"></div>
                                
                         <div class="fleft">

									  <label>Access token<span>&nbsp;</span></label>
									  <span>
									    <input type="text" name="tw_oauth_token" id="tw_oauth_token" value="<?php echo $tw_oauth_token; ?>" readonly="readonly" />
									  </span>
									
									</div>

								<div style="clear:both;"></div>
                                
                          <div class="fleft">

									  <label>Twitter Image<span>&nbsp;</span></label>
									  <span>
									  		<?php if($twiter_img!='' && is_file($base_path.'upload/thumb/'.$twiter_img) ){  ?>
                        		
                                                <img src="<?php echo $base_image;?>upload/thumb/<?php echo $twiter_img; ?>" border="0" width="150" height="150" style="padding:2px; border:1px solid #E1E1E1;" id="media_image_img" />
                                            
                                            <?php }else{ echo 'Not Available';  } ?>
                                        
                                      </span>
									
									</div>

								<div style="clear:both;"></div>               
                                
                         <div class="fleft">

									  <label>Want to Change Twitter Details?<span>&nbsp;</span></label>
							
										 <a  href="<?php echo $base_url_site.'home/twitter_auth_admin'; ?>" >
<img src="<?php echo $base_image; ?>images/twitter.png" name="twitter_img" onmouseover="document.twitter_img.src='<?php echo $base_image; ?>images/twitter-ho.png';" onmouseout="document.twitter_img.src='<?php echo $base_image; ?>images/twitter.png';" alt="sign in with twitter" style="border:none; position:relative; top:3px;" /> Connect to Twitter</a><input type="hidden" name="twiter_img" id="twiter_img" value="<?php echo $twiter_img; ?>" />		

									</div>

								<div style="clear:both;"></div>
                         <?php } else{ ?>               
                   				  <div class="fleft">

									  <label>Add Twitter Details<span>&nbsp;</span></label>
							
										 <a  href="<?php echo $base_url_site.'home/twitter_auth_admin'; ?>" >
<img src="<?php echo $base_image; ?>images/twitter.png" name="twitter_img" onmouseover="document.twitter_img.src='<?php echo $base_image; ?>images/twitter-ho.png';" onmouseout="document.twitter_img.src='<?php echo $base_image; ?>images/twitter.png';" alt="sign in with twitter" style="border:none; position:relative; top:3px;" /> Connect to Twitter</a>

 	<input type="hidden" name="tw_oauth_token_secret" id="tw_oauth_token_secret" value="<?php echo $tw_oauth_token_secret; ?>" />
	<input type="hidden" name="tw_oauth_token" id="tw_oauth_token" value="<?php echo $tw_oauth_token; ?>" />
    <input type="hidden" name="twiter_img" id="twiter_img" value="<?php echo $twiter_img; ?>" />							
                                </div>

								<div style="clear:both;"></div>
                                 <?php } ?>   
                   			</div>    
                   
                           
                                
                       <?php } ?>

									<div style="clear:both;"></div>

									<div class="fleft">

									  <label>&nbsp;<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('twitter_setting_id')" onmouseout="hide_bg('twitter_setting_id')">

									  <input type="hidden" name="twitter_setting_id" id="twitter_setting_id" value="<?php echo $twitter_setting_id; ?>" />													  

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