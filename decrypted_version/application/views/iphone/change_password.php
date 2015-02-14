<div data-role="header" data-position="inline">
	<h1><?php echo CHANGE_PASSWORD;?></h1>
	<?php echo anchor('home','Home','class="ui-btn-right"'); ?>
</div>


<div class="pad15">
	<?php if($error!=''){ ?>
        <div id="error">
            <ul>
            <?php  echo $error; ?>
            </ul>
        </div>
    <?php  }  ?>
                
                
 			  <?php
					$attributes = array('name'=>'frm_account');
					echo form_open_multipart('home/change_password',$attributes);
				  ?>

        <div id="s1postJ">Change Password : <?php echo $result['user_name']." ".$result['last_name']; ?></div>
		
		<div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
            <label class="ui-input-text" for="name"><?php echo OLD_PASSWORD; ?> : *</label>
           <input type="password" name="old_password" id="old_password" value="<?php echo $old_password; ?>"  class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset" />
        </div>
		
        <div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
            <label class="ui-input-text" for="name"><?php echo NEW_PASSWORD; ?> : *</label>
             <input type="password" name="new_password" id="new_password" value="<?php echo $new_password; ?>"  class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset" />
        </div>
		
		<div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
            <label class="ui-input-text" for="name"><?php echo CON_PASSWORD; ?> : *</label>
            <input type="password" name="con_password" id="con_password" value="<?php echo $con_password; ?>"  class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset" />
        </div>
    
        <div class="marTB10" style="width:40%;">
		<input type="hidden" name="user_id" id="user_id" value="<?php echo $result['user_id']; ?>" />
		<input type="submit" class="submbg2"  name="login" id="login" value="<?php echo SAVE_CHANGES; ?>"  />
		<input type="button" onClick="location.href='<?php echo site_url('home');?>'" class="submbg2" name="login" id="login" value="<?php echo CANCEL; ?>"   />                        
        </div>

	</form>
        
    <?php echo $this->load->view('iphone/user_sidebar'); ?>    

</div>