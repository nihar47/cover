<div id="con-tabs">
          <ul>
            <li><span style="cursor:pointer;"><?php echo anchor('project_category/perks/'.$project_id,'Perks','id="sp_2" style="color:#364852;background:#ececec;"'); ?></span></li>         
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
										$attributes = array('name'=>'frm_perk');
										echo form_open_multipart('project_category/add_perk/'.$project_id,$attributes);
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
										  <label>Perk Title<span>&nbsp;</span></label>
										  <span onmouseover="show_bg('perk_title')" onmouseout="hide_bg('perk_title')">
										  <input type="text" name="perk_title" id="perk_title" value="<?php echo $perk_title; ?>" onfocus="show_bg('perk_title')" onblur="hide_bg('perk_title')"/>
										  </span>
										</div>-->
										<div style="clear:both;"></div>
									<div class="fleft">
										  <label>Perk Description<span>&nbsp;</span></label>
										  <span onmouseover="show_bg('perk_description')" onmouseout="hide_bg('perk_description')">
										  <input type="text" name="perk_description" id="perk_description" value="<?php echo $perk_description; ?>" onfocus="show_bg('perk_description')" onblur="hide_bg('perk_description')"/>
										  </span>
										</div>
										<div style="clear:both;"></div>
										<div class="fleft">
										  <label>Perk Amount(<?php echo $site_setting['currency_symbol']; ?>)<span>&nbsp;</span></label>
										  <span onmouseover="show_bg('perk_amount')" onmouseout="hide_bg('perk_amount')">
										  <input type="text" name="perk_amount" id="perk_amount" value="<?php echo $perk_amount; ?>" onfocus="show_bg('perk_amount')" onblur="hide_bg('perk_amount')"/>
										  </span>
										</div>
										<div style="clear:both;"></div>
										<div class="fleft">
										  <label>Total Claim<span>&nbsp;</span></label>
										  <span onmouseover="show_bg('perk_total')" onmouseout="hide_bg('perk_total')">
										  <input type="text" name="perk_total" id="perk_total" value="<?php echo $perk_total; ?>" onfocus="show_bg('perk_total')" onblur="hide_bg('perk_total')"/>
										  </span>
										</div>
										<div style="clear:both;"></div>
										
										
										<div class="fleft">
										  <label>&nbsp;<span>&nbsp;</span></label>
										 
										  <input type="hidden" name="perk_id" id="perk_id" value="<?php echo $perk_id; ?>" />
										 
										
										</div>
										<div style="clear:both;"></div>
										<div class="fleft">
										  <label>&nbsp;<span>&nbsp;</span></label>
										  <?php
											if($perk_id=="")
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
											<input type="button" name="cancel" value="Cancel" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer;" onClick="location.href='<?php echo site_url('project_category/perks/'.$project_id); ?>'"/>
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