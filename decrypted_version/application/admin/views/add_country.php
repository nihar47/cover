<div id="con-tabs">
          <ul>
            <li><span style="cursor:pointer;"><?php echo anchor('country/list_country','Countries','id="sp_1" style="color:#364852;background:#ececec;"'); ?></span></li>            
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
										$attributes = array('name'=>'frm_country');
										echo form_open('country/add_country',$attributes);
									  ?>
										<fieldset class="step">
                                         <?php if($error != "insert")
										{
											echo "<label style='width:700px;text-align:center;'><span>".$error."</span></label>";
											echo "<div class='vertical-line'></div>";
										}
									?>		
                                        
                                         
										<div class="fleft">
										  <label>Country Name<span>&nbsp;</span></label>
										  <span onmouseover="show_bg('country_name')" onmouseout="hide_bg('country_name')">
										  <input type="text" name="country_name" id="country_name" value="<?php echo $country_name; ?>" onfocus="show_bg('country_name')" onblur="hide_bg('country_name')"/>
										  </span>
										</div>
										<div style="clear:both;"></div>
										<!--<div class="fleft">
										  <label>Fips104<span>&nbsp;</span></label>
										  <span onmouseover="show_bg('fips')" onmouseout="hide_bg('fips')">
										  <input type="text" name="fips" id="fips" value="<?php //echo $fips; ?>" onfocus="show_bg('fips')" onblur="hide_bg('fips')"/>
										  </span>
										</div>
										<div style="clear:both;"></div>
										<div class="fleft">
										  <label>Iso2<span>&nbsp;</span></label>
										  <span onmouseover="show_bg('iso2')" onmouseout="hide_bg('iso2')">
										  <input type="text" name="iso2" id="iso2" value="<?php //echo $iso2; ?>" onfocus="show_bg('iso2')" onblur="hide_bg('iso2')"/>
										  </span>
										</div>
										<div style="clear:both;"></div>
										<div class="fleft">
										  <label>Iso3<span>&nbsp;</span></label>
										  <span onmouseover="show_bg('iso3')" onmouseout="hide_bg('iso3')">
										  <input type="text" name="iso3" id="iso3" value="<?php //echo $iso3; ?>" onfocus="show_bg('iso3')" onblur="hide_bg('iso3')"/>
										  </span>
										</div>
										<div style="clear:both;"></div>
										<div class="fleft">
										  <label>Ison<span>&nbsp;</span></label>
										  <span onmouseover="show_bg('ison')" onmouseout="hide_bg('ison')">
										  <input type="text" name="ison" id="ison" value="<?php //echo $ison; ?>" onfocus="show_bg('ison')" onblur="hide_bg('ison')"/>
										  </span>
										</div>
										<div style="clear:both;"></div>
										<div class="fleft">
										  <label>Internet<span>&nbsp;</span></label>
										  <span onmouseover="show_bg('internet')" onmouseout="hide_bg('internet')">
										  <input type="text" name="internet" id="internet" value="<?php //echo $internet; ?>" onfocus="show_bg('internet')" onblur="hide_bg('internet')"/>
										  </span>
										</div>
										<div style="clear:both;"></div>
										<div class="fleft">
										  <label>Capital<span>&nbsp;</span></label>
										  <span onmouseover="show_bg('capital')" onmouseout="hide_bg('capital')">
										  <input type="text" name="capital" id="capital" value="<?php //echo $capital; ?>" onfocus="show_bg('capital')" onblur="hide_bg('capital')"/>
										  </span>
										</div>
										<div style="clear:both;"></div>
										<div class="fleft">
										  <label>Map Reference<span>&nbsp;</span></label>
										  <span onmouseover="show_bg('map_ref')" onmouseout="hide_bg('map_ref')">
										  <input type="text" name="map_ref" id="map_ref" value="<?php //echo $map_ref; ?>" onfocus="show_bg('map_ref')" onblur="hide_bg('map_ref')"/>
										  </span>
										</div>
										<div style="clear:both;"></div>
										<div class="fleft">
										  <label>Singular<span>&nbsp;</span></label>
										  <span onmouseover="show_bg('singular')" onmouseout="hide_bg('singular')">
										  <input type="text" name="singular" id="singular" value="<?php //echo $singular; ?>" onfocus="show_bg('singular')" onblur="hide_bg('singular')"/>
										  </span>
										</div>
										<div style="clear:both;"></div>
										<div class="fleft">
										  <label>Plural<span>&nbsp;</span></label>
										  <span onmouseover="show_bg('plural')" onmouseout="hide_bg('plural')">
										  <input type="text" name="plural" id="plural" value="<?php //echo $plural; ?>" onfocus="show_bg('plural')" onblur="hide_bg('plural')"/>
										  </span>
										</div>
										<div style="clear:both;"></div>
										<div class="fleft">
										  <label>Currency<span>&nbsp;</span></label>
										  <span onmouseover="show_bg('currency')" onmouseout="hide_bg('currency')">
										  <input type="text" name="currency" id="currency" value="<?php //echo $currency; ?>" onfocus="show_bg('currency')" onblur="hide_bg('currency')"/>
										  </span>
										</div>
										<div style="clear:both;"></div>
										<div class="fleft">
										  <label>Currency Code<span>&nbsp;</span></label>
										  <span onmouseover="show_bg('currency_code')" onmouseout="hide_bg('currency_code')">
										  <input type="text" name="currency_code" id="currency_code" value="<?php //echo $currency_code; ?>" onfocus="show_bg('currency_code')" onblur="hide_bg('currency_code')"/>
										  </span>
										</div>
										<div style="clear:both;"></div>
										<div class="fleft">
										  <label>Population<span>&nbsp;</span></label>
										  <span onmouseover="show_bg('population')" onmouseout="hide_bg('population')">
										  <input type="text" name="population" id="population" value="<?php //echo $population; ?>" onfocus="show_bg('population')" onblur="hide_bg('population')"/>
										  </span>
										</div>
										<div style="clear:both;"></div>
										<div class="fleft">
										  <label>Title<span>&nbsp;</span></label>
										  <span onmouseover="show_bg('title')" onmouseout="hide_bg('title')">
										  <input type="text" name="title" id="title" value="<?php //echo $title; ?>" onfocus="show_bg('title')" onblur="hide_bg('title')"/>
										  </span>
										</div>
										<div style="clear:both;"></div>
										<div class="fleft">
										  <label>Comment<span>&nbsp;</span></label>
										  <span onmouseover="show_bg('comment')" onmouseout="hide_bg('comment')">
										  <textarea name="comment" id="comment" onFocus="show_bg('comment')" onBlur="hide_bg('comment')" style="margin-left:3px;"><?php //echo $comment; ?></textarea>													  
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
										  <span onmouseover="show_bg('country_id')" onmouseout="hide_bg('country_id')">
										  <input type="hidden" name="country_id" id="country_id" value="<?php echo $country_id; ?>" />
										  <input type="hidden" name="offset" id="offset" value="<?php echo $offset; ?>" />
										  </span>
										</div>
										<div style="clear:both;"></div>
										<div class="fleft">
										  <label>&nbsp;<span>&nbsp;</span></label>
										  <?php
											if($country_id=="")
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
											<input type="button" name="cancel" value="Cancel" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer;" onClick="location.href='<?php echo site_url('country/list_country'); ?>'"/>
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