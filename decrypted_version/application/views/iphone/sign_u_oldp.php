<script type="text/javascript">
function filename(name)
{
//	alert(name);
	document.getElementById('file_name').value=name.replace("C:\\fakepath\\","");

}
</script>

<div id="container">
<div class="wrap930" style="padding:10px 0px;">	
	
	<h3 class="stitle"> <?php echo FREE_SIGNUP; ?></h3>
	
	<div class="inner_content" style="margin-top:10px;">
		<?php
	$attributes = array('name'=>'frmsignup','autocomplete'=>'off');
	echo form_open_multipart('home/signup',$attributes);
?>
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
           <br />
		 
			<?php if($error != ""){?><div id="msg" align="center"><span><?php echo $error; ?></span></div><?php } ?>
                 
				  
				  
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
			
			<tr>
			
			
			<td width="30">&nbsp;</td>
			
			
			<td>			
					
					<table border="0" cellpadding="0" cellspacing="2" style="font-size:13px;">
					
					<tr><td class="normal_label"><?php echo FIRST_NAME; ?> : *</td></tr>
					<tr><td><input type="text" name="user_name" id="user_name" value="<?php echo $user_name; ?>" class="btn_input"  /></td></tr>
					
					
					<tr><td class="normal_label"><?php echo LAST_NAME; ?> : *</td></tr>
					<tr><td><input type="text" name="last_name" id="last_name" value="<?php echo $last_name; ?>"  class="btn_input" /></td></tr>
					
					
					<tr><td class="normal_label"><?php echo YOUR_EMAIL; ?> :</td></tr>
					<tr><td><input type="text" name="email" id="email" value="<?php echo $email; ?>"  class="btn_input" /></td></tr>
					
					
					<tr><td style="font-size:10px; "><?php echo SIGNUP_PAYPAL_TEXT;?>.<br /><br />
</td></tr>
					
					
					<tr><td class="normal_label"><?php echo PASSWORD; ?> : *</td></tr>
					<tr><td><input type="password" name="password" id="password" value="<?php echo $password;?>"   class="btn_input" /></td></tr>
					
					
					
					<tr><td class="normal_label"><?php echo CONFIRM_PASSWORD; ?> : *</td></tr>
					<tr><td><input type="password" name="cpassword" id="cpassword" value="<?php echo $password;?>"   class="btn_input" /></td></tr>
					
					
					
					<!--	<tr><td class="normal_label"><?php //echo $this->home_model->text_echo('Paypal Email'); ?> :</td></tr>
					<tr><td><input type="text" name="paypal_email" id="paypal_email" value="<?php //echo $paypal_email; ?>"  class="btn_input" /></td></tr>
					
					
					<tr><td style="font-size:10px; ">A valid paypal e-mail address required. The paypal e-mail address is not made public <br/>and will only be used for receiving donation to your account.<br /><br />
</td></tr>-->
					
					
					
					<tr><td class="normal_label"><?php echo UPLOAD_PHOTO; ?> : &nbsp;&nbsp;</td></tr>
					<tr><td> <div class="file_upload" style="float:left;"><input type="file" name="file1" id="file1" onchange="return filename(this.value);"/></div><div><input type="text" name="file_name" id="file_name"readonly="readonly" style="border:none; background-color:#E3F0FD;"/></div>
                   	  <div class="clear"></div>	</td></tr>
					
					
					
		 
		 
		 <tr><td>&nbsp;</td></tr>
		 
		 <tr><td>
						<?php
						$p = array('src'=>'image/securimage','style'=>'padding-bottom:0px;');
						echo img($p, TRUE);
						?><br /><br />
						</td></tr>
						
						<tr><td>
					<input type="text" name="imagecode" id="imagecode"  class="btn_input"   />
						</td></tr>
		 
		 
		 
		 <tr><td>&nbsp;</td></tr>
					<tr><td><input type="checkbox" name="agree" id="agree" style=" width:12px; height:12px;"/>&nbsp;&nbsp;
					
		 <?php //echo anchor('#',I_AGREE_WITH_TERMS_CONDITIONS,'style="font-size:13px;color:#7DBF0F; font-weight:bold;" onclick="terms();"');?>
         <a href="javascript:" style="font-size:13px;color:#7DBF0F; font-weight:bold;" onclick="terms();"><?php echo I_AGREE_WITH_TERMS_CONDITIONS; ?></a>
         </td></tr>
		 
		 
		  <tr><td>&nbsp;</td></tr>
		 
					<tr><td style="padding-left:15px;"><input type="hidden" name="prev_image" id="prev_image" value="" />
					<input type="submit" class="submit" name="login" id="login" value="<?php echo SIGN_UP; ?> !!"  />
                    <input type="hidden" name="cur_url" id="cur_url" value="<?php echo $cur_url; ?>" />
                    </td></tr>
		 
					
					</table>
					
							
			

					
		</td>
		<?php  
								$f_query = $this->db->getwhere('facebook_setting');
								$f_setting = $f_query->row_array();
								
								$t_query = $this->db->getwhere('twitter_setting');
								$t_setting = $t_query->row_array();
						
						if($f_setting['facebook_login_enable'] == '1' || $t_setting['twitter_enable'] == '1'){
					?>
		
		<td align="center" valign="top">
		
		<table border="0" width="200" cellpadding="0" cellspacing="0">
					<tr><td align="left" valign="top" ><span style="font-size:15px; line-height:40px; font-weight:bold;"><?php echo LOGIN_WITH;?> </span><br />
</td></tr>
					<tr><td align="left" valign="top">
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
	
	if($f_setting['facebook_login_enable'] == '1'){
?>	

					<a href="<?php echo $data['fbLoginURL']; ?>"><img src="<?php echo base_url(); ?>images2/fb_big.png" name="fbs"  onmouseover="document.fbs.src='<?php echo base_url();?>images2/fb_big_hover.png'" onmouseout="document.fbs.src='<?php echo base_url();?>images2/fb_big.png'" width="169" height="29" border="0"  alt="<?php echo SIGN_WITH_FACEBOOK; ?>" /></a><br />
<br />

					
</td></tr>
			<?php   }
				if($t_setting['twitter_enable'] == '1'){
			?>
			
<tr><td align="left" valign="bottom">
					<a  href="<?php echo site_url('home/twitter_auth'); ?>" >
<img src="<?php echo base_url(); ?>images2/tw_big.png" name="tws"  width="169" height="29" onmouseover="document.tws.src='<?php echo base_url();?>images2/tw_big_hover.png'" onmouseout="document.tws.src='<?php echo base_url();?>images2/tw_big.png'"   alt="sign in with twitter" border="0" /></a>
				</td></tr>
				<?php } ?>
				</table>
		
		</td><?php } ?>
		
		</tr>
        
        <tr><td>&nbsp;</td><td>&nbsp;</td><td align="center" valign="bottom" style="font-size:10px;"><p class="required"><?php echo REQUIRE_FIELD;?></p></td></tr>
        
        
		</table>
        
</form>


<script type="text/javascript">
function terms()
{
window.open('<?php echo 'terms_and_conditions';?>','Terms and Conditions','height=500,width=500,top=250,left=300');
}
</script>
</div>

