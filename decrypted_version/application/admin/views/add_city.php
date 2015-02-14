<div id="con-tabs">
          <ul>
            <li><span style="cursor:pointer;"><?php echo anchor('city/list_city','Cities','id="sp_1" style="color:#364852;background:#ececec;"'); ?></span></li>            
          </ul>
          <div id="text">
            <div id="1">
           <?php if($error != "" && $error == 'insert')
					{?>
						<div style="text-align:center;" class="msgdisp">Record has been updated Successfully.</div>
					<?php }
			?>	
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
									$attributes = array('name'=>'frm_city');
									echo form_open('city/add_city',$attributes);
								  ?>
									<fieldset class="step">
                                     <?php if($error != "insert")
										{
											echo "<label style='width:700px;text-align:center;'><span>".$error."</span></label>";
											echo "<div class='vertical-line'></div>";
										}
									?>		
									<div class="fleft">
									  <label>Country<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('country_id')" onmouseout="hide_bg('country_id')">
									  <select name="country_id" id="country_id">
										<option value=""> -- Select Country -- </option>
									<?php
										if($country)
										{
											foreach($country as $cnt)
											{
									?>
										<option value="<?php echo $cnt->country_id; ?>" <?php if($cnt->country_id == $country_id){ echo "selected"; } ?>><?php echo $cnt->country_name; ?></option>
									<?php
											}
										}
									?>	
									  </select>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>State<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('state_id')" onmouseout="hide_bg('state_id')">
									  <select name="state_id" id="state_id">
										<option value=""> -- Select State -- </option>
									<?php
										if($state)
										{
											foreach($state as $cnt)
											{
									?>
										<option value="<?php echo $cnt->state_id; ?>" <?php if($cnt->state_id == $state_id){ echo "selected"; } ?>><?php echo $cnt->state_name; ?></option>
									<?php
											}
										}
									?>	
									  </select>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>City Name<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('city_name')" onmouseout="hide_bg('city_name')">
									  <input type="text" name="city_name" id="city_name" value="<?php echo $city_name; ?>" onfocus="show_bg('city_name')" onblur="hide_bg('city_name')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<!--<div class="fleft">
									  <label>Latitude<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('latitude')" onmouseout="hide_bg('latitude')">
									  <input type="text" name="latitude" id="latitude" value="<?php //echo $latitude; ?>" onfocus="show_bg('latitude')" onblur="hide_bg('latitude')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Longitude<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('longitude')" onmouseout="hide_bg('longitude')">
									  <input type="text" name="longitude" id="longitude" value="<?php //echo $longitude; ?>" onfocus="show_bg('longitude')" onblur="hide_bg('longitude')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Timezone<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('timezone')" onmouseout="hide_bg('timezone')">
									  <input type="text" name="timezone" id="timezone" value="<?php //echo $timezone; ?>" onfocus="show_bg('timezone')" onblur="hide_bg('timezone')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>County<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('county')" onmouseout="hide_bg('county')">
									  <input type="text" name="county" id="county" value="<?php //echo $county; ?>" onfocus="show_bg('county')" onblur="hide_bg('county')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Code<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('code')" onmouseout="hide_bg('code')">
									  <input type="text" name="code" id="code" value="<?php //echo $code; ?>" onfocus="show_bg('code')" onblur="hide_bg('code')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>-->
									<div class="fleft">
									  <label>Status<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('active')" onmouseout="hide_bg('active')">
									  <select name="active" id="active">
										<option value="0" <?php if($active=='0'){ echo "selected"; } ?>>Inactive</option>
										<option value="1" <?php if($active=='1'){ echo "selected"; } ?>>Active</option>														
									  </select>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>&nbsp;<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('city_id')" onmouseout="hide_bg('city_id')">
									  <input type="hidden" name="city_id" id="city_id" value="<?php echo $city_id; ?>" />
									  <input type="hidden" name="offset" id="offset" value="<?php echo $offset; ?>" />
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>&nbsp;<span>&nbsp;</span></label>
									  <?php
										if($city_id=="")
										{
									  ?>
									  <div class="submit">
										<input type="submit" name="submit" value="Submit" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer; " onclick=""/>
									  </div>
									  <?php
										}else{
									  ?>
									  <div class="submit">
										<input type="submit" name="submit" value="Update" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer; " onclick=""/>
									  </div>
									  <?php
										}
									  ?>
									  <div class="submit">
										<input type="button" name="cancel" value="Cancel" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer;" onClick="location.href='<?php echo site_url('city/list_city'); ?>'"/>
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