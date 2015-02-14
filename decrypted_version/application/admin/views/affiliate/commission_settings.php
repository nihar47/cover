<div id="con-tabs">
  <ul> 
  <li><span style="cursor:pointer;"><?php echo anchor('affiliates','Stats'); ?></span></li>
   <li><span style="cursor:pointer;"><?php echo anchor('affiliates/common_settings','Common Settings'); ?></span></li>
    <li><span style="cursor:pointer;"><?php echo anchor('affiliates/commission_settings','Commission Settings','id="sp_1" style="color:#364852;background:#ececec;"'); ?></span></li>
     <li><span style="cursor:pointer;"><?php echo anchor('affiliates/commission_history','Commission History'); ?></span></li>
    
     <li><span style="cursor:pointer;"><?php echo anchor('requests/affiliate_requests','Affiliate Request'); ?></span></li>
        <li><span style="cursor:pointer;"><?php echo anchor('affiliates/withdraw_request','Withdraw Fund Request'); ?></span></li>
    
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
            <td valign="top" bgcolor="#FFFFFF"><div class="deals" style="display:block;">
				<?php
					$attributes = array('name'=>'commission_settings');
					echo form_open('affiliates/commission_settings',$attributes);
					
				?>
                <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#888591">
				  <tr class="alter">
                    <th height="30">Name</th>
                    <th>Commission</th>
                    <th>Commission Type</th>
					<th>Active?</th>
                  </tr>
                  
                  
                  <tr class="alter">
                    <td height="35"><b><?php echo $name_1; ?></b>
                    
                    <input type="hidden" name="name_1" id="name_1" value="<?php echo $name_1; ?>" /></td>
                    <td><input type="text" name="commission_1" id="commission_1" value="<?php echo $commission_1; ?>" /></td>
                    <td>
						<select name="type_1" id="type_1" style="float:none;">
							<option value="$" <?php if($type_1 == '$'){ echo 'selected="selected"'; } ?>><?php echo $site_setting['currency_symbol']; ?></option>
						</select>
					</td>
					<td><input type="checkbox" name="active_1" id="active_1" <?php if($active_1 == '1'){ echo 'checked="checked"'; } ?> value="1" /><input type="hidden" name="commission_settings_id_1" id="commission_settings_id_1" value="<?php echo $commission_settings_id_1; ?>" /></td>
                  </tr>
                  <tr class="alter1">
                    <td height="35"><b><?php echo $name_2; ?></b><input type="hidden" name="name_2" id="name_2" value="<?php echo $name_2; ?>" /></td>
                    <td><input type="text" name="commission_2" id="commission_2" value="<?php echo $commission_2; ?>" /></td>
                    <td>
						<select name="type_2" id="type_2" style="float:none;">
							<option value="$" <?php if($type_2 == '$'){ echo 'selected="selected"'; } ?>><?php echo $site_setting['currency_symbol']; ?></option>
							<option value="%" <?php if($type_2 == '%'){ echo 'selected="selected"'; } ?>>%</option>
						</select>
					</td>
					<td><input type="checkbox" name="active_2" id="active_2" <?php if($active_2 == '1'){ echo 'checked="checked"'; } ?> value="1" /><input type="hidden" name="commission_settings_id_2" id="commission_settings_id_2" value="<?php echo $commission_settings_id_2; ?>" /></td>
                  </tr>
                  <tr class="alter">
                    <td height="35"><b><?php echo $name_3; ?></b>
                    <input type="hidden" name="name_3" id="name_3" value="<?php echo $name_3; ?>" /></td>
                    <td><input type="text" name="commission_3" id="commission_3" value="<?php echo $commission_3; ?>" /></td>
                    <td>
						<select name="type_3" id="type_3" style="float:none;">
							<option value="$" <?php if($type_3 == '$'){ echo 'selected="selected"'; } ?>><?php echo $site_setting['currency_symbol']; ?></option>
							<option value="%" <?php if($type_3 == '%'){ echo 'selected="selected"'; } ?>>%</option>
						</select>
					</td>
					<td><input type="checkbox" name="active_3" id="active_3" <?php if($active_3 == '1'){ echo 'checked="checked"'; } ?> value="1" /><input type="hidden" name="commission_settings_id_3" id="commission_settings_id_3" value="<?php echo $commission_settings_id_3; ?>" /></td>
                  </tr>
                  <tr class="alter1">
                    <td height="38" colspan="4"><div class="submit" style="float:right; margin:10px;">
                        <input type="submit" name="update" value="Update" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer;" />
                      </div></td>
                  </tr>
                </table>
				</form>
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
