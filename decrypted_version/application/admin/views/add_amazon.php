<script type="text/javascript">
function set_sandbox(){
	document.getElementById('site_status').value = 'sand box';
	document.getElementById('aws_access_key_id').value = 'AKIAJHRGJTWJ6TZAYFRA';
	document.getElementById('aws_secret_access_key').value = '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';
	document.getElementById('variable_fees').value = '5.00';
	document.getElementById('fixed_fees').value = '5.00';
}


</script>
<div id="con-tabs">

          <ul>

            <li><span style="cursor:pointer;"><?php echo anchor('transaction_type/list_amazon','Amazon','id="sp_1" style="color:#364852;background:#ececec;"'); ?></span></li>            

          </ul>

          <div id="text">

            <div id="1">

            <?php if($error != "")

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

					  <div class="submit" style="float:right;">
							<input type="button" name="set" value="Set Sandbox Details" style="background:none; border:none; color:#FFFFFF; font-size:14px; cursor:pointer; padding-top:7px;" onclick="set_sandbox();" />
					  </div>  <div style="clear:both;"></div>
                    	<div id="deal-con">
                        
                       

							<div id="2" style="">

							  
                             
                              <div align="center">
                              

								<div id="add-deal">

								  <?php

									$attributes = array('name'=>'frm_amazon');

									echo form_open('transaction_type/add_amazon',$attributes);

								  ?>
								
                              
									
                                
									<fieldset class="step">

									<div class="fleft">

									  <label>Site Status<span>&nbsp;</span></label>

									  <span onMouseOver="show_bg('site_status')" onMouseOut="hide_bg('site_status')">

									 <!-- <input type="text" name="site_status" id="site_status" value="<?php echo $site_status; ?>" onFocus="show_bg('site_status')" onBlur="hide_bg('site_status')"/>-->

                                      <select name="site_status" id="site_status" onFocus="show_bg('site_status')" onBlur="hide_bg('site_status')">

                                      <option value="">select</option>

                                       <option <?php if($site_status=='sand box'){ echo "selected"; } ?>>sand box</option>

                                        <option <?php if($site_status=='live'){ echo "selected"; } ?>>live</option>

                                      </select>

									  </span>

									

                                    </div>

									<div style="clear:both;"></div>

                                    

                                    <div class="fleft">

									  <label>AWS_ACCESS_KEY_ID<span>&nbsp;</span></label>

									  <span onMouseOver="show_bg('aws_access_key_id')" onMouseOut="hide_bg('aws_access_key_id')">

									  <input type="text" name="aws_access_key_id" id="aws_access_key_id" value="<?php echo $aws_access_key_id; ?>" onFocus="show_bg('aws_access_key_id')" onBlur="hide_bg('aws_access_key_id')"/>

									  </span>

									</div>

									<div style="clear:both;"></div>

                                    

                                    <div class="fleft">

									  <label>AWS_SECRET_ACCESS_KEY<span>&nbsp;</span></label>

									  <span onMouseOver="show_bg('aws_secret_access_key')" onMouseOut="hide_bg('aws_secret_access_key')">

									  <input type="text" name="aws_secret_access_key" id="aws_secret_access_key" value="<?php echo $aws_secret_access_key; ?>" onFocus="show_bg('aws_secret_access_key')" onBlur="hide_bg('aws_secret_access_key')"/>

									  </span>

									</div>

									<div style="clear:both;"></div>

                                    

                                    <div class="fleft">

									  <label>Amazon variable fees(%)<span>&nbsp;</span></label>

									  <span onMouseOver="show_bg('variable_fees')" onMouseOut="hide_bg('variable_fees')">

									  <input type="text" name="variable_fees" id="variable_fees" value="<?php echo $variable_fees; ?>" onFocus="show_bg('variable_fees')" onBlur="hide_bg('variable_fees')"/>

									  </span>

									</div>

									<div style="clear:both;"></div>

                                    

                                    <div class="fleft">

									  <label>Amazon Fixed fees<span>&nbsp;</span></label>

									  <span onMouseOver="show_bg('fixed_fees')" onMouseOut="hide_bg('fixed_fees')">

									  <input type="text" name="fixed_fees" id="fixed_fees" value="<?php echo $fixed_fees; ?>" onFocus="show_bg('fixed_fees')" onBlur="hide_bg('fixed_fees')"/>

									  </span>

									</div>

									<div style="clear:both;"></div>

                            
                                   

									<div class="fleft">

									  <label>&nbsp;<span>&nbsp;</span></label>

									  <span onMouseOver="show_bg('id')" onMouseOut="hide_bg('id')">

									  <input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />

									  <input type="hidden" name="offset" id="offset" value="<?php echo $offset; ?>" />

									  </span>

									</div>

									<div style="clear:both;"></div>

									<div class="fleft">

									  <label>&nbsp;<span>&nbsp;</span></label>

									  <?php

										if($id=="")

										{

									  ?>

									  <div class="submit">

										<input type="submit" name="submit" value="Submit" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer; " onClick=""/>

									  </div>

									  <?php

										}else{

									  ?>

									  <div class="submit">

										<input type="submit" name="submit" value="Update" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer; " onClick=""/>

									  </div>

									  <?php

										}

									  ?>

									  <div class="submit">

										<input type="button" name="cancel" value="Cancel" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer;" onClick="location.href='<?php echo site_url('transaction_type/list_amazon'); ?>'"/>

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