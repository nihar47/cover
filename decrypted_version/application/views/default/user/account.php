<script>
	$(document).ready(function(){
		$('#showpass').click(function(){
			document.getElementById('cp').value=1;
			$('#chang_pass').slideDown();
				
		});
	});
</script>
<section>
	<div style="border:none;" class="usersectiion">
		<div id="page_we">
		<h2 class="pname"><?php echo EDIT_SETTING; ?></h2>
		
		<ul class="accountul">
			<li><?php echo anchor('home/profile_detail',PROFILE_DETAIL) ?></li>
			<li><?php echo anchor('home/account',ACCOUNT_SETTING,'id="accsel"') ?></li>
			<li><?php echo anchor('user/email_setting',NOTIFICATIONS) ?></li>
			<li><?php //echo anchor('settings/paypal',PAYPAL); ?></li>
			
		</ul>
        
		</div>
		
	</div>
	<div id="page_we">
	<?php
 
	$attributes = array('id'=>'user_profile','name'=>'user_profile');
   		echo form_open('home/account', $attributes);
?>
	<div class="user_detail">
		
		<div class="usercont">
		
		<div class="user_cont_left">
		<?php
		 if($error || $succcessmsg){ ?>
		<div class="error" id="error"><ul><?php if($error){ echo $error; }else if($succcessmsg) echo $succcessmsg; ?><ul></div>
       
		<?php }?>
			 
			<label style="margin:10px 0 20px 0;  width:120px;" class="label2"><?php echo EMAIL; ?> :</label>			
			<input type="text" value="<?php echo $email; ?>" name="email" style="margin:0;" class="textbx2">
			<div class="clr"></div>
			<label style="margin:10px 0 0px 0; width:120px;" class="label2"><?php echo PASSWORD ;?> :</label>
			<a href="javascript://" class="prjown" style="" id="showpass"><?php echo CHANGE_PASSWORD ?></a><div class="clr"></div>
			<div id="chang_pass" <?php if($error){ ?> style="display:block;margin:15px 0 0 0;" <?php } else {?>style="display:none;margin:15px 0 0 0;" <?php }?> >
			<label class="label2" style="margin-top:10px; width:120px;"><?php echo CURRENT_PASSWORD ?> :</label>
			<input type="password" class="textbx2" name="cur_password" id="cur_password" style="margin:0;">
			<p class="instr" style="margin-left: 120px;"><?php echo MINIMUM_8_CHARACTERS; ?></p>
			<div class="clr"></div>
			<label class="label2" style="margin-top:10px; width:120px;">New Password :</label>
			<input type="password" class="textbx2" name="new_password" id="new_password">
			<p class="instr" style="margin-left: 120px;"><?php echo MINIMUM_8_CHARACTERS; ?></p>
			<div class="clr"></div>
			
			<label class="label2" style=" width:120px;"><?php echo CONFIRM_PASSWORD ?> :</label>
			<input type="password" class="textbx2" name="con_password" id="con_password">
			<input type="hidden" name="cp" id="cp" value="<?php echo $_POST['cp']?>" />
			<input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id; ?>" />
			<p class="instr" style="margin-left: 120px;"><?php echo MAKE_SURE_THEY_MATCH; ?> !</p>
			<div class="clr"></div>
			</div>
			
		</div>
		
		
		
		
		
		<!--<div style="float:right; border:none" class="user_cont_left">
			
			<label style="margin:10px 0 0px 0;" class="label2">Facebook</label>
			<a href="#"><img width="154" height="22" alt="" style="margin:7px 0 0 101px;" src="<?php //echo base_url(); ?>images/fblogin.png"></a>
			<div class="clr"></div>
			
			<!--<label class="label2">Delete Account</label>
			<a style="text-decoration:underline; margin:25px 0 0 101px;" class="prjown" href="#">Delete my Kickstarter account</a><div class="clr"></div>
			
			
			
		</div>-->
		
		</div>
		<input type="submit" class="oresubmit1" value="<?php echo SAVE_SETTING; ?>">
		</div>
		</form>
	</div>
	
	
</section>