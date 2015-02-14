<div id="con-tabs">
          <ul>
            <li><span style="cursor:pointer;"><?php echo anchor('site_setting/add_site_setting','Site','id="sp_1"'); ?></span></li>
			<li><span style="cursor:pointer;"><?php echo anchor('meta_setting/add_meta_setting','Meta','id="sp_2"'); ?></span></li>
			<!--<li><span style="cursor:pointer;"><?php //echo anchor('user_setting/add_user_setting','User'); ?></span></li>--> 
			
			<!--<li><span style="cursor:pointer;"><?php //echo anchor('email_template_setting/add_email_template_setting','Email Template'); ?></span></li>-->
			<li><span style="cursor:pointer;"><?php echo anchor('project_setting/add_project_setting','Project','style="color:#364852;background:#ececec;"'); ?></span></li>
			<!--<li><span style="cursor:pointer;"><?php //echo anchor('message_setting/add_message_setting','Messages'); ?></span></li>
			<li><span style="cursor:pointer;"><?php //echo anchor('word_detecter_setting/add_word_detecter_setting','Suspicious Words Detecter'); ?></span></li>-->
			<li><span style="cursor:pointer;"><?php echo anchor('facebook_setting/add_facebook_setting','Facebook'); ?></span></li>
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
									$attributes = array('name'=>'frm_project_setting');
									echo form_open('project_setting/add_project_setting',$attributes);
								  ?>
									<fieldset class="step">
									<?php
										if($error != "")
										{
											echo "<label style='width:700px;text-align:center;'><span>".$error."</span></label>";
											echo "<div class='vertical-line'></div>";
										}
									?>													
									<!--<div class="fleft">
									  <label>Enable Paypal<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('enable_paypal')" onmouseout="hide_bg('enable_paypal')">
									  <input type="text" name="enable_paypal" id="enable_paypal" value="<?php //echo $enable_paypal; ?>" onfocus="show_bg('enable_paypal')" onblur="hide_bg('enable_paypal')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>-->
									<!--<div class="fleft">
									  <label>Payment Flow<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('payment_flow')" onmouseout="hide_bg('payment_flow')">
									  <input type="text" name="payment_flow" id="payment_flow" value="<?php //echo $payment_flow; ?>" onfocus="show_bg('payment_flow')" onblur="hide_bg('payment_flow')"/>
									  </span>
									</div>-->
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Pay Fee<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('pay_fee')" onmouseout="hide_bg('pay_fee')">
									  <input type="text" name="pay_fee" id="pay_fee" value="<?php echo $pay_fee; ?>" onfocus="show_bg('pay_fee')" onblur="hide_bg('pay_fee')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<!--<div class="fleft">
									  <label>Project Listing Fee<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('project_listing_fee')" onmouseout="hide_bg('project_listing_fee')">
									  <input type="text" name="project_listing_fee" id="project_listing_fee" value="<?php echo $project_listing_fee; ?>" onfocus="show_bg('project_listing_fee')" onblur="hide_bg('project_listing_fee')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Project Listing Fee Type<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('project_listing_fee_type')" onmouseout="hide_bg('project_listing_fee_type')">
									  <input type="text" name="project_listing_fee_type" id="project_listing_fee_type" value="<?php echo $project_listing_fee_type; ?>" onfocus="show_bg('project_listing_fee_type')" onblur="hide_bg('project_listing_fee_type')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Commission<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('commission2')" onmouseout="hide_bg('commission2')">
									  <input type="text" name="commission" id="commission2" value="<?php echo $commission; ?>" onfocus="show_bg('commission2')" onblur="hide_bg('commission2')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Project Short Desc Length<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('project_short_desc_length')" onmouseout="hide_bg('project_short_desc_length')">
									  <input type="text" name="project_short_desc_length" id="project_short_desc_length" value="<?php echo $project_short_desc_length; ?>" onfocus="show_bg('project_short_desc_length')" onblur="hide_bg('project_short_desc_length')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Site Stat Front<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('site_stat_front')" onmouseout="hide_bg('site_stat_front')">
									  <input type="text" name="site_stat_front" id="site_stat_front" value="<?php echo $site_stat_front; ?>" onfocus="show_bg('site_stat_front')" onblur="hide_bg('site_stat_front')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Min Project Amount<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('min_project_amount')" onmouseout="hide_bg('min_project_amount')">
									  <input type="text" name="min_project_amount" id="min_project_amount" value="<?php echo $min_project_amount; ?>" onfocus="show_bg('min_project_amount')" onblur="hide_bg('min_project_amount')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Max Project Amount<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('max_project_amount')" onmouseout="hide_bg('max_project_amount')">
									  <input type="text" name="max_project_amount" id="max_project_amount" value="<?php echo $max_project_amount; ?>" onfocus="show_bg('max_project_amount')" onblur="hide_bg('max_project_amount')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Project User<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('project_user')" onmouseout="hide_bg('project_user')">
									  <input type="text" name="project_user" id="project_user" value="<?php echo $project_user; ?>" onfocus="show_bg('project_user')" onblur="hide_bg('project_user')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Edit Amount<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('edit_amount')" onmouseout="hide_bg('edit_amount')">
									  <input type="text" name="edit_amount" id="edit_amount" value="<?php echo $edit_amount; ?>" onfocus="show_bg('edit_amount')" onblur="hide_bg('edit_amount')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Edit End Date<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('edit_end_date')" onmouseout="hide_bg('edit_end_date')">
									  <input type="text" name="edit_end_date" id="edit_end_date" value="<?php echo $edit_end_date; ?>" onfocus="show_bg('edit_end_date')" onblur="hide_bg('edit_end_date')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Approve Project<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('approve_project')" onmouseout="hide_bg('approve_project')">
									  <input type="text" name="approve_project" id="approve_project" value="<?php echo $approve_project; ?>" onfocus="show_bg('approve_project')" onblur="hide_bg('approve_project')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Cancel Project<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('cancel_project')" onmouseout="hide_bg('cancel_project')">
									  <input type="text" name="cancel_project" id="cancel_project" value="<?php echo $cancel_project; ?>" onfocus="show_bg('cancel_project')" onblur="hide_bg('cancel_project')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Default Pledge<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('default_pledge')" onmouseout="hide_bg('default_pledge')">
									  <input type="text" name="default_pledge" id="default_pledge" value="<?php echo $default_pledge; ?>" onfocus="show_bg('default_pledge')" onblur="hide_bg('default_pledge')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Enable Fixed Pledge<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('enable_fixed_pledge')" onmouseout="hide_bg('enable_fixed_pledge')">
									  <input type="text" name="enable_fixed_pledge" id="enable_fixed_pledge" value="<?php echo $enable_fixed_pledge; ?>" onfocus="show_bg('enable_fixed_pledge')" onblur="hide_bg('enable_fixed_pledge')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Enable Owner Fixed Amount<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('enable_owner_fixed_amount')" onmouseout="hide_bg('enable_owner_fixed_amount')">
									  <input type="text" name="enable_owner_fixed_amount" id="enable_owner_fixed_amount" value="<?php echo $enable_owner_fixed_amount; ?>" onfocus="show_bg('enable_owner_fixed_amount')" onblur="hide_bg('enable_owner_fixed_amount')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Enable Multiple Type<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('enable_multiple_type')" onmouseout="hide_bg('enable_multiple_type')">
									  <input type="text" name="enable_multiple_type" id="enable_multiple_type" value="<?php echo $enable_multiple_type; ?>" onfocus="show_bg('enable_multiple_type')" onblur="hide_bg('enable_multiple_type')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Enable Owner Multiple Amount<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('enable_owner_multiple_amount')" onmouseout="hide_bg('enable_owner_multiple_amount')">
									  <input type="text" name="enable_owner_multiple_amount" id="enable_owner_multiple_amount" value="<?php echo $enable_owner_multiple_amount; ?>" onfocus="show_bg('enable_owner_multiple_amount')" onblur="hide_bg('enable_owner_multiple_amount')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Enable Suggested Type<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('enable_suggested_type')" onmouseout="hide_bg('enable_suggested_type')">
									  <input type="text" name="enable_suggested_type" id="enable_suggested_type" value="<?php echo $enable_suggested_type; ?>" onfocus="show_bg('enable_suggested_type')" onblur="hide_bg('enable_suggested_type')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Enable Owner Suggested Amount<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('enable_owner_suggested_amount')" onmouseout="hide_bg('enable_owner_suggested_amount')">
									  <input type="text" name="enable_owner_suggested_amount" id="enable_owner_suggested_amount" value="<?php echo $enable_owner_suggested_amount; ?>" onfocus="show_bg('enable_owner_suggested_amount')" onblur="hide_bg('enable_owner_suggested_amount')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Enable Min Amount<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('enable_min_amount')" onmouseout="hide_bg('enable_min_amount')">
									  <input type="text" name="enable_min_amount" id="enable_min_amount" value="<?php echo $enable_min_amount; ?>" onfocus="show_bg('enable_min_amount')" onblur="hide_bg('enable_min_amount')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Enable Owner Min Amount<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('enable_owner_min_amount')" onmouseout="hide_bg('enable_owner_min_amount')">
									  <input type="text" name="enable_owner_min_amount" id="enable_owner_min_amount" value="<?php echo $enable_owner_min_amount; ?>" onfocus="show_bg('enable_owner_min_amount')" onblur="hide_bg('enable_owner_min_amount')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Allow Guest Backers List<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('allow_guest_backers_list')" onmouseout="hide_bg('allow_guest_backers_list')">
									  <input type="text" name="allow_guest_backers_list" id="allow_guest_backers_list" value="<?php echo $allow_guest_backers_list; ?>" onfocus="show_bg('allow_guest_backers_list')" onblur="hide_bg('allow_guest_backers_list')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Allow Guest Backers Amount<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('allow_guest_backers_amount')" onmouseout="hide_bg('allow_guest_backers_amount')">
									  <input type="text" name="allow_guest_backers_amount" id="allow_guest_backers_amount" value="<?php echo $allow_guest_backers_amount; ?>" onfocus="show_bg('allow_guest_backers_amount')" onblur="hide_bg('allow_guest_backers_amount')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Allow Backers Amount<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('allow_backers_amount')" onmouseout="hide_bg('allow_backers_amount')">
									  <input type="text" name="allow_backers_amount" id="allow_backers_amount" value="<?php echo $allow_backers_amount; ?>" onfocus="show_bg('allow_backers_amount')" onblur="hide_bg('allow_backers_amount')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Allow Cancel Pledge Backers<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('allow_cancel_pledge_backers')" onmouseout="hide_bg('allow_cancel_pledge_backers')">
									  <input type="text" name="allow_cancel_pledge_backers" id="allow_cancel_pledge_backers" value="<?php echo $allow_cancel_pledge_backers; ?>" onfocus="show_bg('allow_cancel_pledge_backers')" onblur="hide_bg('allow_cancel_pledge_backers')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Min Days Pledge Cancel<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('min_days_pledge_cancel')" onmouseout="hide_bg('min_days_pledge_cancel')">
									  <input type="text" name="min_days_pledge_cancel" id="min_days_pledge_cancel" value="<?php echo $min_days_pledge_cancel; ?>" onfocus="show_bg('min_days_pledge_cancel')" onblur="hide_bg('min_days_pledge_cancel')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Cancel Project<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('allow_cancel_pledge_owner')" onmouseout="hide_bg('allow_cancel_pledge_owner')">
									  <input type="text" name="allow_cancel_pledge_owner" id="allow_cancel_pledge_owner" value="<?php echo $allow_cancel_pledge_owner; ?>" onfocus="show_bg('allow_cancel_pledge_owner')" onblur="hide_bg('allow_cancel_pledge_owner')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Allow Owner Fund Own<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('allow_owner_fund_own')" onmouseout="hide_bg('allow_owner_fund_own')">
									  <input type="text" name="allow_owner_fund_own" id="allow_owner_fund_own" value="<?php echo $allow_owner_fund_own; ?>" onfocus="show_bg('allow_owner_fund_own')" onblur="hide_bg('allow_owner_fund_own')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Allow Owner Fund Other<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('allow_owner_fund_other')" onmouseout="hide_bg('allow_owner_fund_other')">
									  <input type="text" name="allow_owner_fund_other" id="allow_owner_fund_other" value="<?php echo $allow_owner_fund_other; ?>" onfocus="show_bg('allow_owner_fund_other')" onblur="hide_bg('allow_owner_fund_other')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Enable Project Reward<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('enable_project_reward')" onmouseout="hide_bg('enable_project_reward')">
									  <input type="text" name="enable_project_reward" id="enable_project_reward" value="<?php echo $enable_project_reward; ?>" onfocus="show_bg('enable_project_reward')" onblur="hide_bg('enable_project_reward')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Reward Detail Optional<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('reward_detail_optional')" onmouseout="hide_bg('reward_detail_optional')">
									  <input type="text" name="reward_detail_optional" id="reward_detail_optional" value="<?php echo $reward_detail_optional; ?>" onfocus="show_bg('reward_detail_optional')" onblur="hide_bg('reward_detail_optional')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Allow Owner Edit Reward<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('allow_owner_edit_reward')" onmouseout="hide_bg('allow_owner_edit_reward')">
									  <input type="text" name="allow_owner_edit_reward" id="allow_owner_edit_reward" value="<?php echo $allow_owner_edit_reward; ?>" onfocus="show_bg('allow_owner_edit_reward')" onblur="hide_bg('allow_owner_edit_reward')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Small Project Max Days<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('small_project_max_days')" onmouseout="hide_bg('small_project_max_days')">
									  <input type="text" name="small_project_max_days" id="small_project_max_days" value="<?php echo $small_project_max_days; ?>" onfocus="show_bg('small_project_max_days')" onblur="hide_bg('small_project_max_days')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Small Project Max Amount<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('small_project_max_amount')" onmouseout="hide_bg('small_project_max_amount')">
									  <input type="text" name="small_project_max_amount" id="small_project_max_amount" value="<?php echo $small_project_max_amount; ?>" onfocus="show_bg('small_project_max_amount')" onblur="hide_bg('small_project_max_amount')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Funded Percentage<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('funded_percentage')" onmouseout="hide_bg('funded_percentage')">
									  <input type="text" name="funded_percentage" id="funded_percentage" value="<?php echo $funded_percentage; ?>" onfocus="show_bg('funded_percentage')" onblur="hide_bg('funded_percentage')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>No of Category<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('no_of_category')" onmouseout="hide_bg('no_of_category')">
									  <input type="text" name="cancel_project" id="cancel_project" value="<?php echo $no_of_category; ?>" onfocus="show_bg('no_of_category')" onblur="hide_bg('no_of_category')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Enable Overfund<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('enable_overfund')" onmouseout="hide_bg('enable_overfund')">
									  <input type="text" name="enable_overfund" id="enable_overfund" value="<?php echo $enable_overfund; ?>" onfocus="show_bg('enable_overfund')" onblur="hide_bg('enable_overfund')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Owner Set Overfund<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('owner_set_overfund')" onmouseout="hide_bg('owner_set_overfund')">
									  <input type="text" name="owner_set_overfund" id="owner_set_overfund" value="<?php echo $owner_set_overfund; ?>" onfocus="show_bg('owner_set_overfund')" onblur="hide_bg('owner_set_overfund')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Enable Project Follower<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('enable_project_follower')" onmouseout="hide_bg('enable_project_follower')">
									  <input type="text" name="enable_project_follower" id="enable_project_follower" value="<?php echo $enable_project_follower; ?>" onfocus="show_bg('enable_project_follower')" onblur="hide_bg('enable_project_follower')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Enable Project Comment<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('enable_project_comment')" onmouseout="hide_bg('enable_project_comment')">
									  <input type="text" name="enable_project_comment" id="enable_project_comment" value="<?php echo $enable_project_comment; ?>" onfocus="show_bg('enable_project_comment')" onblur="hide_bg('enable_project_comment')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Enable Update Comment<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('enable_update_comment')" onmouseout="hide_bg('enable_update_comment')">
									  <input type="text" name="enable_update_comment" id="enable_update_comment" value="<?php echo $enable_update_comment; ?>" onfocus="show_bg('enable_update_comment')" onblur="hide_bg('enable_update_comment')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Enable Project Rating<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('enable_project_rating')" onmouseout="hide_bg('enable_project_rating')">
									  <input type="text" name="enable_project_rating" id="enable_project_rating" value="<?php echo $enable_project_rating; ?>" onfocus="show_bg('enable_project_rating')" onblur="hide_bg('enable_project_rating')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Logged User Login<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('logged_user_login')" onmouseout="hide_bg('logged_user_login')">
									  <input type="text" name="logged_user_login" id="logged_user_login" value="<?php echo $logged_user_login; ?>" onfocus="show_bg('logged_user_login')" onblur="hide_bg('logged_user_login')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Enable Project Flag<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('enable_project_flag')" onmouseout="hide_bg('enable_project_flag')">
									  <input type="text" name="enable_project_flag" id="enable_project_flag" value="<?php echo $enable_project_flag; ?>" onfocus="show_bg('enable_project_flag')" onblur="hide_bg('enable_project_flag')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Auto Suspend Project<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('auto_suspend_project')" onmouseout="hide_bg('auto_suspend_project')">
									  <input type="text" name="auto_suspend_project" id="auto_suspend_project" value="<?php echo $auto_suspend_project; ?>" onfocus="show_bg('auto_suspend_project')" onblur="hide_bg('auto_suspend_project')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Auto Fund Capture<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('auto_fund_capture')" onmouseout="hide_bg('auto_fund_capture')">
									  <input type="text" name="auto_fund_capture" id="auto_fund_capture" value="<?php echo $auto_fund_capture; ?>" onfocus="show_bg('auto_fund_capture')" onblur="hide_bg('auto_fund_capture')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Auto Suspend Comment<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('auto_suspend_comment')" onmouseout="hide_bg('auto_suspend_comment')">
									  <input type="text" name="auto_suspend_comment" id="auto_suspend_comment" value="<?php echo $auto_suspend_comment; ?>" onfocus="show_bg('auto_suspend_comment')" onblur="hide_bg('auto_suspend_comment')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Auto Suspend Update<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('auto_suspend_update')" onmouseout="hide_bg('auto_suspend_update')">
									  <input type="text" name="auto_suspend_update" id="auto_suspend_update" value="<?php echo $auto_suspend_update; ?>" onfocus="show_bg('auto_suspend_update')" onblur="hide_bg('auto_suspend_update')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Auto Suspend<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('auto_suspend')" onmouseout="hide_bg('auto_suspend')">
									  <input type="text" name="auto_suspend" id="auto_suspend" value="<?php echo $auto_suspend; ?>" onfocus="show_bg('auto_suspend')" onblur="hide_bg('auto_suspend')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Auto Suspend Message<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('auto_suspend_message')" onmouseout="hide_bg('auto_suspend_message')">
									  <input type="text" name="auto_suspend_message" id="auto_suspend_message" value="<?php echo $auto_suspend_message; ?>" onfocus="show_bg('auto_suspend_message')" onblur="hide_bg('auto_suspend_message')"/>
									  </span>
									</div>-->
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>&nbsp;<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('project_setting_id')" onmouseout="hide_bg('project_setting_id')">
									  <input type="hidden" name="project_setting_id" id="project_setting_id" value="<?php echo $project_setting_id; ?>" />													  
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