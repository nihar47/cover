<section>
<center>
  <div id="page_we" >
    <div id="login-signup" class="" >	<h3 class="stitle"> <?php echo FREE_SIGNUP; ?></h3>
	
	<div class="inner_content" style="margin-top:10px;">
		<?php
	$attributes = array('name'=>'frmsignup','autocomplete'=>'off');
	echo form_open_multipart('home/social_signup',$attributes);
?>

          
		 
			
                 
				  
				  
			<div id="signup" class="current cur_f" style="text-align:left;">
			
        <h3> <?php echo NEW_TO_KICKSTARTERCLONE ?> </h3>
        <p><?php echo sprintf(KICKSTARTER_AC_REQUIRED,$site_setting['site_name']); ?></p>
        <?php
				$attributes = array('name'=>'frmsignup','autocomplete'=>'off');
				echo form_open_multipart('home/signup',$attributes);
			?>
          <div style="margin:0;padding:0;display:inline">
           </div>
          <fieldset>
		  <?php if($error != ""){?><div id="msg" class="error" align="center"><ul><?php echo $error; ?></ul></div><?php } ?>
            <?php 
				if($frm_name == 'signup')
				{
					if($error != ""){?><div id="msg" align="center" class="error"><ul><?php echo $error; ?></ul></div><?php }
				} 
			?>
          <div class="fieldset-errors"> </div>
          <ol>
          	<li>
              <label for="user_name"><?php echo FIRST_NAME; ?> : *</label>
              <input type="text" name="user_name" id="user_name" value="<?php echo $user_name; ?>" class="input-text text"  />
            </li>
            <li>
              <label for="user_name"><?php echo LAST_NAME; ?> : *</label>
              <input type="text" name="last_name" id="last_name" value="<?php echo $last_name; ?>"  class="input-text text" />
            </li>
            <li id="form-signup-email">
              <label for="user_email"><?php echo YOUR_EMAIL; ?> :</label>
             <input type="text" name="email" id="email" value="<?php echo $email; ?>"  class="input-text email" />
               <span><?php echo SIGNUP_PAYPAL_TEXT;?></span>
             </li>
            <li>
              <label for="user_password"><?php echo PASSWORD; ?> : *</label>
              <input type="password" name="password" id="password" value="<?php echo $password;?>"   class="input-text password" />
            </li>
            <li>
              <label for="user_password_confirmation"><?php echo RE_ENTER_PASSWORD; ?></label>
             <input type="password" name="cpassword" id="cpassword" value="<?php echo $password;?>"   class="input-text password" />
            </li>
            <li>
              <input type="checkbox" value="1" tabindex="10" name="user_send_newsletters" id="user_send_newsletters" class="styled" checked="checked">
              <label for="user_send_newsletters" class="label-checkbox"><strong><?php echo DISCOVER_NEW_PROJECTS; ?></strong><br>
              <?php echo WITH_OUR_WEEKLY_NEWSLETTER; ?></label>
            </li>
            
            <?php  
					$f_query = $this->db->get_where('facebook_setting');
					$f_setting = $f_query->row_array();
					if($f_setting['facebook_login_enable'] == '1')
					{
					?>
		
		
        
          <table border="0" width="200" cellpadding="0" cellspacing="0">
					<tr><td align="left" valign="top" >
          
		<?php if($fb_uid!='' && $fb_uid>0) { ?>
		<img src="http://graph.facebook.com/<?php echo $fb_uid; ?>/picture?type=large" border="0" width="150" height="150" style="padding:2px; border:1px solid #E1E1E1;" />
	<?php } ?>
                    </td>
                    </tr>
               </table>
		<?php } ?>
        
        
        
            <li> <span><?php echo BY_SIGNING; ?><a target="_blank" class="popup" href="javascript://"><?php echo TERMS_OF_USE; ?></a>.</span> </li>
            <li>
              <input type="submit" value="Sign me up!" tabindex="11" name="commit" class="button-neutral submit">
               <input type="hidden" name="fb_uid" id="fb_uid" value="<?php echo $fb_uid; ?>" />
                    <input type="hidden" name="fb_access_token" id="fb_access_token" value="<?php echo $fb_access_token; ?>" />
                   <input type="hidden" name="tw_id" id="tw_id" value="<?php echo $tw_id; ?>" />
                    <input type="hidden" name="fb_img" id="fb_img" value="<?php echo $fb_img; ?>" />
                    <input type="hidden" name="cur_url" id="cur_url" value="<?php echo $cur_url; ?>" />
                    <input type="hidden" name="oauth_token" id="oauth_token" value="<?php echo $oauth_token; ?>" />
                     <input type="hidden" name="oauth_token_secret" id="oauth_token_secret" value="<?php echo $oauth_token_secret; ?>" />			    <input type="hidden" name="invite_code" id="invite_code" value="<?php echo $invite_code; ?>" />
            </li>
          </ol>
          </fieldset>
        </form>
      </div>
        
</form>


<script type="text/javascript">
function terms()
{
window.open('<?php echo site_url('home/terms_and_conditions');?>',TERMS_TXT,'height=500,width=500,top=250,left=300,scrollbars=1');
}
</script>

</div>
</div></div>
<center>
</section>

