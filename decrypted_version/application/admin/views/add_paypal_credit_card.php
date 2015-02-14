<script type="text/javascript">
function set_sandbox(){
	document.getElementById('credit_card_version').value = '76.0';
	document.getElementById('credit_card_site_status').value = '0';
	document.getElementById('credit_card_username').value = 'platfo_1255077030_biz_api1.gmail.com';
	document.getElementById('credit_card_password').value = '1255077037';
	document.getElementById('credit_card_api_signature').value = 'Abg0gYcQyxQvnf2HDJkKtA-p6pqhA1k-KTYE0Gcy1diujFio4io5Vqjf';
}
</script>


<div id="con-tabs">

          <ul>

            <li><span style="cursor:pointer;"><?php echo anchor('transaction_type/list_credit_card','Paypal Credit Card','id="sp_1" style="color:#364852;background:#ececec;"'); ?></span></li>            

          </ul>

          <div id="text">

            <div id="1">

            

            <?php if($error != "")

					{?>

						<div style="text-align:center;" class="msgdisp"><?php echo $error; ?></div>

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
									$attributes = array('name'=>'frm_paypal');

									echo form_open('transaction_type/add_credit_card',$attributes);

								  ?>

									<fieldset class="step">

									<div class="fleft">

									  <label>Site Status<span>&nbsp;</span></label>

									
									

                                      <select name="credit_card_site_status" id="credit_card_site_status" onFocus="show_bg('credit_card_site_status')" onBlur="hide_bg('credit_card_site_status')">
                                     

                                       <option value="0" <?php if($credit_card_site_status==0){ echo "selected"; } ?>>sand box</option>

                                        <option value="1" <?php if($credit_card_site_status==1){ echo "selected"; } ?>>live</option>

                                      </select>

									
									

                                    </div>

									<div style="clear:both;"></div>

                                   

                                    

                                    <?php /*?> <div class="fleft">

									  <label>Credit Card Version<span>&nbsp;</span></label>

									  <span onMouseOver="show_bg('credit_card_version')" onMouseOut="hide_bg('credit_card_version')">

									  <input type="text" name="credit_card_version" id="credit_card_version" value="<?php echo $credit_card_version; ?>" onFocus="show_bg('credit_card_version')" onBlur="hide_bg('credit_card_version')"/>

									  </span> 

									</div>
<?php */?>
                                    

                                    <input type="hidden" name="credit_card_version" id="credit_card_version" value="<?php echo $credit_card_version; ?>" onFocus="show_bg('credit_card_version')" onBlur="hide_bg('credit_card_version')"/>



									<div style="clear:both;"></div>

                                   

                               

                                    

                                    <div class="fleft">

									  <label>Credit Card API Username<span>&nbsp;</span></label>

									  <span onMouseOver="show_bg('credit_card_username')" onMouseOut="hide_bg('credit_card_username')">

									  <input type="text" name="credit_card_username" id="credit_card_username" value="<?php echo $credit_card_username; ?>" onFocus="show_bg('credit_card_username')" onBlur="hide_bg('credit_card_username')"/>

									  </span>

									</div>

									<div style="clear:both;"></div>

                                    

                                    <div class="fleft">

									  <label>Credit Card API Password<span>&nbsp;</span></label>

									  <span onMouseOver="show_bg('credit_card_password')" onMouseOut="hide_bg('credit_card_password')">

									  <input type="password" name="credit_card_password" id="credit_card_password" value="<?php echo $credit_card_password; ?>" onFocus="show_bg('credit_card_password')" onBlur="hide_bg('credit_card_password')"/>

									  </span>

									</div>

									<div style="clear:both;"></div>

                                    

                                    <div class="fleft">

									  <label>Credit Card API Signature<span>&nbsp;</span></label>

									  <span onMouseOver="show_bg('credit_card_api_signature')" onMouseOut="hide_bg('credit_card_api_signature')">

									  <input type="text" name="credit_card_api_signature" id="credit_card_api_signature" value="<?php echo $credit_card_api_signature; ?>" onFocus="show_bg('credit_card_api_signature')" onBlur="hide_bg('credit_card_api_signature')"/>

									  </span>

									</div>

								


									

                                    

                                    <div style="clear:both;height:10px;"></div>

                                    

                                  

                         	 	
                             
									<div class="fleft">

									  <label>&nbsp;<span>&nbsp;</span></label>

									  <span onMouseOver="show_bg('paypal_credit_card_id')" onMouseOut="hide_bg('paypal_credit_card_id')">

									  <input type="hidden" name="paypal_credit_card_id" id="paypal_credit_card_id" value="<?php echo $paypal_credit_card_id; ?>" />

									  <input type="hidden" name="offset" id="offset" value="<?php echo $offset; ?>" />

									  </span>

									</div>

									<div style="clear:both;"></div>

									<div class="fleft">

									  <label>&nbsp;<span>&nbsp;</span></label>

									  <?php

										if($paypal_credit_card_id=="")

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

										<input type="button" name="cancel" value="Cancel" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer;" onClick="location.href='<?php echo site_url('transaction_type/list_credit_card'); ?>'"/>

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