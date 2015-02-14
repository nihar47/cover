<div data-role="header" data-position="inline">
  <h1><?php echo MANAGE_EMAIL_NOTIFICATION; ?> </h1>
  <?php echo anchor('home','Home','class="ui-btn-right"'); ?> </div>
<div class="pad15">
  <?php 			  
				$msgt='';
					if($msg != "")
					{
						if($msg == 'success')
						{?>
							 <p style="color:#f00;"><?php echo CHANGES_UPDATED_SUCCESSFULLY;?></p>
						<?php }
						
				?>
  <?php } else { ?>
  <?php }	?>
 
  		<?php 	
				$attributes = array('name'=>'frm_mail');
					echo form_open_multipart('user/email_setting/'.$attributes); ?>
			<div id="s1postJ"><?php echo MANAGE_EMAIL_NOTIFICATION;?>  : <?php //echo $result['user_name']." ".$result['last_name']; ?></div>	
			
			<div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
            <label for="user_alert"><?php echo USER_ALERT; ?></label>
		    <input type="checkbox" name="user_alert" id="user_alert" value="1" <?php if($user_not->user_alert=='1'){ ?> checked="checked" <?php } ?> />
        </div>
			
			<div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
            <label for="add_fund"><?php echo ADD_FUND; ?></label>
		    <input type="checkbox" name="add_fund" class="custom" id="add_fund" value="1" <?php if($user_not->add_fund=='1'){ ?> checked="checked" <?php } ?> />
        </div>	
		
		<div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
            <label for="project_alert"><?php echo PROJECT_ALERT; ?></label>
		    <input type="checkbox" name="project_alert" id="project_alert" value="1" <?php if($user_not->project_alert=='1'){?> checked="checked" <?php }?> />
        </div>
		
		<div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
            <label for="comment_alert"><?php echo COMMENT_ALERT; ?></label>
		    <input type="checkbox" name="comment_alert" id="comment_alert" value="1" <?php if($user_not->comment_alert=='1'){?> checked="checked"  <?php } ?> />
        </div>
		
		<input type="submit" name="submit" value="<?php echo SUBMIT; ?>" class="submbg2" />
					
					
</div>
