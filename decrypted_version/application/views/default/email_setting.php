<div id="headerbar">
  <div class="wrap930">
    <!-- dd menu -->
    <div class="login_navl">
      <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
          <td align="left" ><div class="project_title_hd" style="padding-top:15px;" > <span style="text-transform:capitalize;color:#2B5F94;font-size:17px;"><?php echo MANAGE_EMAIL_NOTIFICATION; ?> :</span> </div></td>
          <td align="right" ><div class="project_title_hd" style="padding-top:15px; "  > <span id="sddm" style="float:right;"> </span> </div></td>
        </tr>
      </table>
    </div>
    <div class="clear"></div>
  </div>
</div>
<div id="container">
  <div class="wrap930" style="padding:15px 0px 20px 0px;">
    <!--side bar user panel-->
    <?php echo $this->load->view('default/dashboard_sidebar'); ?>
    <!--side bar user panel-->
    <div class="con_left2" style="min-height:0px; width:690px; margin-right:0px;">
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
      <style type="text/css">

#tab_all a{ color:#000000; text-decoration:none; }

</style>
      <?php
	$data['tab_sel'] = NOTIFICATION;
	$this->load->view('default/dashboard_tabs',$data);

?>
      <div class="inner_content" style=" margin-top:11px;padding:12px; ">
        <p style="color:#f00;">
          <?php  echo $msgt; ?>
        </p>
        <h3 id="dropmenu2"><?php echo EMAIL_SETTING; ?></h3>
        <?php
				$attributes = array('name'=>'frm_mail');
					echo form_open_multipart('user/email_setting/'.$attributes); ?>
        <?php  if($error!='') { ?>
        <div align="center" style="text-align:center;" class="error">
          <p>
            <?php	echo $error; ?>
          </p>
        </div>
        <br/>
        <br/>
        <?php } ?>
        <div class="form-element-container">
          <div class="form-label">
            <label class="all_text"><?php echo USER_ALERT; ?>:</label>
          </div>
          <input type="checkbox" name="user_alert" id="user_alert" value="1" <?php if($user_not->user_alert=='1'){ ?> checked="checked" <?php } ?> />
        </div>
        <div class="form-element-container">
          <div class="form-label">
            <label class="all_text"><?php echo ADD_FUND; ?>:</label>
          </div>
          <input type="checkbox" name="add_fund" id="add_fund" value="1" <?php if($user_not->add_fund=='1'){ ?> checked="checked" <?php } ?> />
        </div>
        <div class="form-element-container">
          <div class="form-label">
            <label class="all_text"><?php echo PROJECT_ALERT; ?>:</label>
          </div>
          <input type="checkbox" name="project_alert" id="project_alert" value="1" <?php if($user_not->project_alert=='1'){?> checked="checked" <?php }?> />
        </div>
        <div class="form-element-container">
          <div class="form-label">
            <label class="all_text"><?php echo COMMENT_ALERT; ?>:</label>
          </div>
          <input type="checkbox" name="comment_alert" id="comment_alert" value="1" <?php if($user_not->comment_alert=='1'){?> checked="checked"  <?php } ?> />
        </div>
        <div class="clear"></div>
        <div class="form-element-container">
          <div class="form-label">
            <label class="all_text">&nbsp;</label>
          </div>
          <input type="submit" name="submit" value="<?php echo SUBMIT; ?>" class="submit" />
        </div>
        <div class="clear"></div>
        </form>
      </div>
    </div>
    <div class="clear"></div>
  </div>
  <!-- left end ------>
</div>
</div>
</div>
