<?php
	$attributes = array('name'=>'frm_login','id'=>'frm_login');
	echo form_open('home/check_login',$attributes);
?>

<div data-role="header">
  <h1>Login</h1>
  <?php echo anchor('home','Home','class="ui-btn-right"'); ?> </div>
  
<?php if($error != "")
{?>
<div id="error" style="text-align:center;width:100%;">
  <?php
		if($error != ""){ echo "<span>".$error."</span>"; 
						}
	?>
</div>
<?php }?>

<div class="pad15">
  <h2><span id="s1postJ">Log In</span></h2>
  <div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
    <label class="ui-input-text" for="name"><?php echo EMAIL; ?> : </label>
    <input type="text" name="email" id="email" value="<?php echo $email; ?>" class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset" />
  </div>
  
  <div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
    <label class="ui-input-text" for="name"><?php echo PASSWORD; ?> : </label>
    <input type="password" name="password" id="password" value="<?php echo $password; ?>"  class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset" />
  </div>
  <div style="width:39%;">
    <input type="hidden" name="cur_url" id="cur_url" value="<?php echo $cur_url; ?>" />
    <input type="submit" value="<?php echo LOGIN; ?> !!" class="submit" name="login" id="login">
  </div>
  </form>
  <?php 
			echo anchor('home/forget_password','Forgot Password?','class="fpass"'); 
			echo ' Not a member? ';
			echo anchor('home/signup','Sign Up','class="fpass"'); 
		?>
</div>
