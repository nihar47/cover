<section>
 <div style="border:none;" class="usersectiion">
		<div id="page_we">
		<h2 class="pname"><?php echo EDIT_SETTING; ?></h2>
		
		<ul class="accountul">
			<li><?php echo anchor('home/profile_detail',PROFILE_DETAIL) ?></li>
			<li><?php echo anchor('home/account',ACCOUNT_SETTING) ?></li>
			<li><?php echo anchor('user/email_setting',NOTIFICATIONS,'id="accsel"') ?></li>
			<li><?php //echo anchor('settings/paypal',PAYPAL); ?></li>
			
		</ul>
		</div>
		
	</div>
	<?php 			  
			  
			  		$msgt='';
					if($msg != "")
					{
						if($msg == 'success')
						{
							$msgt = CHANGES_UPDATED_SUCCESSFULLY;
						}
						
				?>
      <?php } else { ?>
      <?php }	?>
  <div id="page_we">
  <?php
				$attributes = array('name'=>'frm_mail');
					echo form_open_multipart('user/email_setting/',$attributes); ?>
        
    <div class="user_detail">
	<?php if($msgt!=''){ ?>
		<div class="error" id="error"><ul><li style="color:#84C200;"><?php echo $msgt; ?></li></ul></div><?php } ?>
      <div class="lr_common">
        <div class="lr_left">
          <div class="left_t">
            <label><?php echo WEEKLY_NEWSLETTER; ?></label>
          </div>
          <div class="chk_right"> <span class="checkbox" style="background-position: 0px 0px;"></span>
            <input type="checkbox" value="1"  id="news_letter" name="news_letter" <?php if($user_not->news_letter=='1'){ ?> checked="checked" <?php } ?>>
            <span><?php echo ID_LIKE_TO_RECEIVE_THE_WEEKLY_NEWSLETTER; ?></span>
            <div class="clr"></div>
          </div>
          <div class="clr"></div>
          <hr style="margin:10px 0; color:#cccaca;">
          <div class="left_t">
            <label><?php echo NOTIFY_ME_BY_EMAIL_WHEN; ?></label>
          </div>
          <div class="chk_right"> <span class="checkbox" style="background-position: 0px 0px;"></span>
            <input type="checkbox" value="1"  id="follow_back"  name="follow_back" <?php if($user_not->follow_back=='1'){ ?> checked="checked" <?php } ?>>
            <span><?php echo SOMEONE_I_FOLLOW_BACKS_OR_LAUNCHES_A_PROJECT; ?></span>
            <div class="clear"></div>
            <span class="checkbox" style="background-position: 0px 0px;"></span>
            <input type="checkbox" value="1"  name="followers" id="followers" class="" <?php if($user_not->followers=='1'){ ?> checked="checked" <?php } ?>>
            <span><?php echo I_GET_NEW_FOLLOWERS; ?> (<?php echo DAILY_DIGEST; ?>) </span>
            <div class="clear"></div>
            <span class="checkbox" style="background-position: 0px 0px;"></span>
            <input type="checkbox" value="1"  name="add_fund" id="add_fund" class="" <?php if($user_not->add_fund=='1'){ ?> checked="checked" <?php } ?>>
            <span><?php echo PROJECTS_IVE_CREATED_RECEIVE_NEW_PLEDGES; ?></span>
            <div class="clear"></div>
            <span class="checkbox" style="background-position: 0px 0px;"></span>
            <input type="checkbox"  value="1" class="" id="comment_alert" name="comment_alert" <?php if($user_not->comment_alert=='1'){ ?> checked="checked" <?php } ?>>
            <span><?php echo PROJECTS_IVE_CREATED_RECEIVE_NEW_COMMENTS; ?></span>
            <div class="clear"></div>
            <span class="checkbox" style="background-position: 0px 0px;"></span>
            <input type="checkbox" value="1" class="" name="update" id="update" <?php if($user_not->update=='1'){ ?> checked="checked" <?php } ?>>
            <span><?php echo PROJECTS_IM_BACKING_POST_NEW_UPDATES; ?></span>
            <div class="clear"></div>
          </div>
          <div class="clr"></div>
        </div>
        <div class="clr"></div>
      </div>
      <div class="clr"></div>
      <div class="start">
        <input type="submit" value="Save Setting" name="submit" class="oresubmit1">
      </div>
    </div>
	</form>
  </div>
</section>
