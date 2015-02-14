<script type="text/javascript">
function filename(name)
{
//	alert(name);
	document.getElementById('file_name').value=name.replace("C:\\fakepath\\","");

}
</script>

<div data-role="header">
  <h1>Sign UP</h1>
  <?php echo anchor('home','Home','class="ui-btn-right"'); ?> </div>
<div class="pad15">
  <h2> <span id="s1postJ"> <?php echo FREE_SIGNUP; ?></span></h2>
  <br>
  <?php
	$attributes = array('name'=>'frmsignup','autocomplete'=>'off');
	echo form_open_multipart('home/signup',$attributes);
?>
  <?php if($error != ""){?>
  <div id="error" align="center"><span><?php echo $error; ?></span></div>
  <?php } ?>
  <div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
    <label class="ui-input-text" for="name"><?php echo FIRST_NAME; ?> : *</label>
    <input type="text" name="user_name" id="user_name" value="<?php echo $user_name; ?>"  class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset"  />
  </div>
  <div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
    <label class="ui-input-text" for="name"><?php echo LAST_NAME; ?> : *</label>
    <input type="text" name="last_name" id="last_name" value="<?php echo $last_name; ?>"  class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset"  />
  </div>
  <div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
    <label class="ui-input-text" for="name"><?php echo YOUR_EMAIL; ?> : </label>
    <input type="text" name="email" id="email" value="<?php echo $email; ?>"  class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset"  />
  </div>
  <div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
    <label class="ui-input-text" for="name">
    <?php //echo SIGNUP_PAYPAL_TEXT; ?>
    </label>
    <label class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset" style="font-size:10px; border:0px; background:none;  box-shadow: 0 0px 0px rgba(0, 0, 0, 0);"> <?php echo SIGNUP_PAYPAL_TEXT;?></label>
  </div>
  <div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
    <label class="ui-input-text" for="name"><?php echo PASSWORD; ?> : *</label>
    <input type="password" name="password" id="password" value="<?php echo $password; ?>"  class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset"  />
  </div>
  <div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
    <label class="ui-input-text" for="name"><?php echo CONFIRM_PASSWORD; ?> : *</label>
    <input type="password" name="cpassword" id="cpassword" value="<?php echo $password; ?>"  class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset"  />
  </div>
  <br>
  <div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
    <label class="ui-input-text" for="name"></label>
  </div>
  <!-- <input type="checkbox" name="agree" id="agree" class="ui-input-checkbox ui-body-c ui-corner-all ui-shadow-inset" style="margin-left:280px;"/>&nbsp;&nbsp;
		 <a href="javascript:" style="font-size:13px;color:#7DBF0F; font-weight:bold; margin-left:280px;" onclick="terms();"><?php //echo I_AGREE_WITH_TERMS_CONDITIONS; ?></a>-->
  <input type="checkbox" name="agree" id="checkbox-1" value="1" class="custom" />
  <label for="checkbox-1">Clicking "Sign Up" acknowledges that you have read and agree to the <a href="javascript:" onclick="terms();"><?php echo I_AGREE_WITH_TERMS_CONDITIONS; ?></a></label>
  <div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
    <label class="ui-input-text" for="name"></label>
    <input type="hidden" name="prev_image" id="prev_image" value="" />
    <input type="submit" class="submit" name="login" id="login" value="<?php echo SIGN_UP; ?> !!"  />
    <input type="hidden" name="cur_url" id="cur_url" value="<?php echo $cur_url; ?>" />
  </div>
  <div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
    <label class="ui-input-text" for="name"></label>
    <p class="required" style="float:right;"><?php echo REQUIRE_FIELD;?></p>
  </div>
</div>
</form>
<script type="text/javascript">
function terms()
{
window.open('<?php echo 'terms_and_conditions';?>','Terms and Conditions','height=500,width=500,top=250,left=300');
}
</script>
