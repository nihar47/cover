<div id="con-tabs">
          <ul>
            <li><span style="cursor:pointer;"><?php echo anchor('site_setting/add_site_setting','Site','id="sp_1"'); ?></span></li>
			<li><span style="cursor:pointer;"><?php echo anchor('meta_setting/add_meta_setting','Meta','id="sp_2"'); ?></span></li>
			<li><span style="cursor:pointer;"><?php echo anchor('user_setting/add_user_setting','User'); ?></span></li> 
			<li><span style="cursor:pointer;"><?php echo anchor('facebook_setting/add_facebook_setting','Facebook'); ?></span></li>
			<li><span style="cursor:pointer;"><?php echo anchor('email_template_setting/add_email_template_setting','Email Template'); ?></span></li>
			<li><span style="cursor:pointer;"><?php echo anchor('project_setting/add_project_setting','Project'); ?></span></li>
			<li><span style="cursor:pointer;"><?php echo anchor('message_setting/add_message_setting','Messages'); ?></span></li>
			<li><span style="cursor:pointer;"><?php echo anchor('word_detecter_setting/add_word_detecter_setting','Suspicious Words Detecter','style="color:#364852;background:#ececec;"'); ?></span></li>
			<li><span style="cursor:pointer;"><?php echo anchor('twitter_setting/add_twitter_setting','Twitter'); ?></span></li>
          </ul>
          <div id="text">
            <div id="1">
              <div class="fleft" style="width:100%;">
                <div style="height:10px;"></div>
				<table width="100%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td><img src="<?php echo base_url(); ?>images/c2-t-l.jpg" alt="" height="4" width="7" /></td>
                    <td background="<?php echo base_url(); ?>images/c2-t.jpg" width="99%"></td>
                    <td><img src="<?php echo base_url(); ?>images/c2-t-r.jpg" alt="" height="4" width="7" /></td>
                  </tr>
                  <tr>
                    <td background="<?php echo base_url(); ?>images/c2-l.jpg"></td>
                    <td valign="top" bgcolor="#FFFFFF"><div id="deal-tabs">
						<div id="deal-con">
							<div id="2" style="">
							  <div align="center">
								<div id="add-deal">
								  <?php
									$attributes = array('name'=>'frm_word_detecter_setting');
									echo form_open('word_detecter_setting/add_word_detecter_setting',$attributes);
								  ?>
									<fieldset class="step">
									<?php
										if($error != "")
										{
											echo "<label style='width:700px;text-align:center;'><span>".$error."</span></label>";
											echo "<div class='vertical-line'></div>";
										}
									?>													
									<div class="fleft">
									  <label>Enable Suspicious word detector<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('enable_word_detecter')" onmouseout="hide_bg('enable_word_detecter')">
									  <input type="text" name="enable_word_detecter" id="enable_word_detecter" value="<?php echo $enable_word_detecter; ?>" onfocus="show_bg('enable_word_detecter')" onblur="hide_bg('enable_word_detecter')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Suspicious words<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('words')" onmouseout="hide_bg('words')">
									  <input type="text" name="words" id="words" value="<?php echo $words; ?>" onfocus="show_bg('words')" onblur="hide_bg('words')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>&nbsp;<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('word_detecter_setting_id')" onmouseout="hide_bg('word_detecter_setting_id')">
									  <input type="hidden" name="word_detecter_setting_id" id="word_detecter_setting_id" value="<?php echo $word_detecter_setting_id; ?>" />													  
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>&nbsp;<span>&nbsp;</span></label>
									  <div class="submit">
										<input type="submit" name="submit" value="Update" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer; " onclick=""/>
									  </div>
									</div>
									</fieldset>
								  </form>
								</div>
							  </div>
							</div>
						</div>
					</div></td>
                    <td background="<?php echo base_url(); ?>images/c2-r.jpg"></td>
                  </tr>
                  <tr>
                    <td><img src="<?php echo base_url(); ?>images/c2-b-l.jpg" alt="" height="4" width="7" /></td>
                    <td background="<?php echo base_url(); ?>images/c2-b.jpg"></td>
                    <td><img src="<?php echo base_url(); ?>images/c2-b-r.jpg" alt="" height="4" width="7" /></td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>