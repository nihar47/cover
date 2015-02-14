<link rel="stylesheet" href="<?php echo base_url();?>css/colorbox.css" />
<link rel="stylesheet" href="<?php echo base_url();?>js/colorbox/colorbox.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>js/colorbox/jquery.colorbox.js"> </script>

 <?php if( $_GET['msg']=='success'){?>
<script type="text/javascript">
$(document).ready(function(){
				//$.colorbox({width:"50%",  height:"25%", inline:true, href:"#sccess-msg"});
				 
				 //$("#profile_detail_popup").colorbox({width:"50%",  height:"25%", inline:true, href:"#sccess-msg"});
				 $.colorbox({width:"50%", inline:true, href:"#title_form"});
				// $.colorbox({width:"50%",  height:"25%", inline:true, href:"#sccess-msg"});
				 
			});
		
</script>
  <?php }?>
<script>
function show_form(id1,id2)
{
	document.getElementById(id1).style.display = "block";
	document.getElementById(id2).style.display = "none";
	document.getElementById(id1+"txtmsg").style.display = "block";
	document.getElementById(id2+"txtmsg").style.display = "none";
	document.getElementById('msg').innerHTML = "";

}
</script>
<style type="text/css">

.fb_button, .fb_button_rtl
{
background:none;
background-color:none;
}

.fb_button fb_button_medium, .fb_button_text
{
width:169px;

}

.fb_button .fb_button_text, .fb_button_rtl .fb_button_text
{
border:none;
background:none;
}

.fb_button .fb_button_text, .fb_button_rtl .fb_button_text
{
margin:0px;
padding:0px;
}

#fb-root div{ left:0; }

</style>


<section>
  <div id="page_we">   
    <div id="login-signup" class="">
      <div id="login" class="current <?php if($frm_name=='login'){ echo 'cur_f';} ?> ">
        
       		<?php 
				$attributes = array('name'=>'frm_login','id'=>'frm_login');
				echo form_open('home/check_login',$attributes);
			?>
          <div style="margin:0;padding:0;display:inline">
          </div>
         
          <fieldset>
           <?php 
				if($frm_name == 'login')
				{
					if($error != ""){?><div id="msg" align="center" class="error"><ul><?php echo $error; ?></ul></div><?php }
					if($success!=""){?><div id="msg" align="center" class="error"><ul><?php echo $success; ?></ul></div><?php 
					echo anchor('home/login/');
					}
					
				} 
			?>
          <ol>
		  <div id="logindv" <?php if($view=='login'){ ?> style="display:block;" <?php }else{ ?> style="display:none; "<?php } ?>>
		  <h3><?php echo LOG_IN; ?></h3>
        <p><?php echo PLEASE_LOG_IN_TO_CONTINUE; ?>.</p>
            <li>
              <label for="email"><?php echo EMAIL; ?> </label>
              <input type="text" name="email_login" id="email_login" class="input-text email" style="" value="<?php echo $email_login; ?>" />
            </li>
            <li> <span class="input-tip"><a class="link_to_forgot-password-dialog" onclick="show_form('forget_pass','logindv')" href="javascript://">I <?php echo FORGOT_MY_PASSWORD; ?></a></span>
              <label for="password"><?php echo PASSWORD; ?></label>
              	<input type="password" name="password_login" id="password_login" class="input-text password" style="" value="<?php echo $password_login; ?>"/>
            </li>
            <li>
              <input type="checkbox" name="remember" id="remember" value="1"  style="width:12px;  height:12px;" <?php if($remember=='1'){ echo 'checked="checked"'; }  ?>/>
              <label for="remember_me" class="label-checkbox"><?php echo KEEP_ME_LOGIN; ?> !!</label>
            </li>
            <li>
            <input type="hidden" name="cur_url" id="cur_url" value="<?php echo $cur_url; ?>" />
			<input type="submit" name="login" id="login_frm" value="<?php echo LOGIN; ?> !!"  class="button-neutral submit"/>
		    </li>
			 </form>
			</div>
			<div id="forget_pass" <?php if($view=='forget'){ ?> style="display:block;" <?php }else{ ?> style="display:none;"<?php } ?>>
			<h3><?php echo FORGET_PASSWORD; ?></h3>
        <p></p>
			<?php
							
					$attributes = array('name'=>'frm_forget_password','id'=>'frm_forget_password');
					echo form_open('home/forget_password',$attributes);
						?>
			
				<li>
              <label for="email"><?php echo EMAIL; ?> </label>
              <input type="text" name="email2" id="email2" class="input-text email"  value="" />
			   <input type="hidden" name="cur_url" id="cur_url" value="<?php echo $cur_url; ?>" />
			  <input type="submit" name="login" id="login_frm" value="<?php echo SUBMIT; ?> !!"  class="button-neutral submit"/>
            </li>
            <li> <span class="input-tip"><a class="link_to_forgot-password-dialog" onclick="show_form('logindv','forget_pass')" href="javascript://">Back To Login</a></span>
			</div>
          </ol>
          </fieldset>
        </form>
      </div>
      <div id="signup" class="current <?php if($frm_name=='signup'){ echo 'cur_f';} ?>">
        <h3> <?php echo NEW_TO_KICKSTARTERCLONE .' '. $site_setting['site_name']; ?>? </h3>
        <p><?php echo sprintf(A_KICKSTARTERCLONE_ACCOUNT_IS_REQUIRED_TO_CONTINUE,$site_setting['site_name']); ?>.</p>
        <?php
				$attributes = array('name'=>'frmsignup','autocomplete'=>'off');
				echo form_open_multipart('home/signup',$attributes);
			?>
          <div style="margin:0;padding:0;display:inline">
           </div>
          <fieldset>
             <?php 
				if($frm_name == 'signup')
				{  				 
					if($error != ""){?><div id="msg" align="center" class="error"><ul><?php echo $error;  ?></ul></div><?php }

				} 
				//echo $msg;
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
              <label for="user_email"><?php echo YOUR_EMAIL; ?> : *</label>
             <input type="text" name="email" id="email" value="<?php echo $email; ?>"  class="input-text email" />
               <span><?php echo SIGNUP_PAYPAL_TEXT;?></span>
             </li>
            <li>
              <label for="user_password"><?php echo PASSWORD; ?> : *</label>
              <input type="password" name="password" id="password" value="<?php echo $password;?>"   class="input-text password" />
            </li>
            <li>
              <label for="user_password_confirmation"><?php echo RE_ENTER_PASSWORD; ?> : *</label>
             <input type="password" name="cpassword" id="cpassword" value="<?php echo $password;?>"   class="input-text password" />
            </li>
            <li>
              <input type="checkbox" value="1" tabindex="10" name="user_send_newsletters" id="user_send_newsletters" class="styled" checked="checked">
              <label for="user_send_newsletters" class="label-checkbox"><strong><?php echo DISCOVER_NEW_PROJECTS; ?></strong><br>
              <?php echo WITH_OUR_WEEKLY_NEWSLETTER; ?></label>
            </li>
            <li> <span>By signing up, you agree to our <a target="_blank" class="popup" href="http://www.kickstarter.com/terms-of-use on">terms of use</a>.</span> </li>
            <li>
            <?php   //echo anchor('user/full_bio_data/'.$user_detail['user_id'],Login,'id="profile_detail_popup" class="fullbio"');?>
          
                
              <input type="submit" value="Sign me up!" tabindex="11" name="commit" class="button-neutral submit" >
            </li>
          </ol>
          </fieldset>
        </form>
      </div>  
     <div style='display:none'>
              <div id='title_form' style='padding:10px; background:#fff;'>
                <div class="wanted_hd"><strong>Success</strong></div>
                <div class="view_box2">
                  <ul>				     
                    <li><a href="business_signup.php" class="supplier_btn"></a></li>
                     
                  </ul>
                </div>
              </div>
            </div>    
            	
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
	
	if($f_setting->facebook_login_enable == '1'){
?>	
      <div id="facebook">
        <h3>Log in with Facebook</h3>
        <p>It's fast and easy.</p>
        <!--<span class="button-signin-facebook">-->
        <div class="facebook_connect_wrap small" style="background:none; padding-left:0;">	<a href="<?php echo $data['fbLoginURL']; ?>"><img src="<?php echo base_url(); ?>images2/fb_big.png" name="fbs"  onmouseover="document.fbs.src='<?php echo base_url();?>images2/fb_big_hover.png'" onmouseout="document.fbs.src='<?php echo base_url();?>images2/fb_big.png'" width="169" height="29" border="0"  alt="sign in with facebook" /></a><br />
<br /></div>
        <!--</span>--> <strong>We'll never post anything without your permission.</strong> </div>
   <?php }?>     
    </div>
  </div>


</section>
