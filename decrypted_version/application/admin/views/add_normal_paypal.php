<script type="text/javascript">
function set_sandbox(){
	document.getElementById('paypal_status').value = 'sandbox';
	document.getElementById('pay_fee').value = '5';
	document.getElementById('paypal_email').value = 'fadmin_1321252063_biz@gmail.coms';
	document.getElementById('paypal_API_UserName').value = 'fadmin_1321252063_biz_api1.gmail.com';
	document.getElementById('paypal_API_Password').value = '1321252087';
	document.getElementById('paypal_API_Signature').value = 'AAQNP4IUOwIbkYjIuH2o4oHIZiVzAXXPY8ZxlXELGuNXh541QLWnI56m';
}
</script>

<div id="con-tabs">

          <ul>

            <li><span style="cursor:pointer;"><?php echo anchor('transaction_type/list_normal_paypal','Normal Paypal','id="sp_1" style="color:#364852;background:#ececec;"'); ?></span></li>

			

		

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

					  <div class="submit" style="float:right;">
							<input type="button" name="set" value="Set Sandbox Details" style="background:none; border:none; color:#FFFFFF; font-size:14px; cursor:pointer; padding-top:7px;" onclick="set_sandbox();" />
					  </div>  <div style="clear:both;"></div>
                      
                      
                        
                        
                        
                        <div id="deal-con">

							<div id="2" style="">

							  <div align="center">

								<div id="add-deal">

								  <?php

									$attributes = array('name'=>'frm_normal_paypal');

									echo form_open('transaction_type/add_normal_paypal',$attributes);

								  ?>

									<fieldset class="step">

									<?php

										if($error != "")

										{

											echo "<label style='width:700px;text-align:center;'><span>".$error."</span></label>";

											echo "<div class='vertical-line'></div>";

										}

									?>													

									

											

									

														

									

									

									

									<div style="clear:both;"></div>

									<div class="fleft">

									  <label>Paypal Status<span>&nbsp;</span></label>

									                                

                                        <select name="paypal_status" id="paypal_status">

											<option value="live" <?php if($paypal_status=='live'){ echo "selected"; } ?>>Live</option>

											<option value="sandbox" <?php if($paypal_status=='sandbox'){ echo "selected"; } ?>>Sandbox</option>														

										  </select>                                     

                                      

									</div>

									

                                    

                                    

                                    

                                    <div style="clear:both;"></div>

									<div class="fleft">

									  <label>Commission Fee(%)<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('pay_fee')" onmouseout="hide_bg('pay_fee')">

									  <input type="text" name="pay_fee" id="pay_fee" value="<?php echo $pay_fee; ?>" onfocus="show_bg('pay_fee')" onblur="hide_bg('pay_fee')"/>

									  </span>

									</div>

									<div style="clear:both;"></div>

                                    

                                    

                                    

									<div class="fleft">

									  <label>Paypal Email<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('paypal_email')" onmouseout="hide_bg('paypal_email')">

									  <input type="text" name="paypal_email" id="paypal_email" value="<?php echo $paypal_email; ?>" onfocus="show_bg('paypal_email')" onblur="hide_bg('paypal_email')"/>

									  </span>

									</div>

									

									

									<div style="clear:both;"></div>

									 <div class="fleft">

									  <label>Paypal API Username<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('paypal_API_UserName')" onmouseout="hide_bg('paypal_API_UserName')">

									  <input type="text" name="paypal_API_UserName" id="paypal_API_UserName" value="<?php echo $paypal_API_UserName; ?>" onfocus="show_bg('paypal_API_UserName')" onblur="hide_bg('paypal_API_UserName')"/>

									  </span>

									</div>

									<div style="clear:both;"></div>

									 <div class="fleft">

									  <label>Paypal API Password<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('paypal_API_Password')" onmouseout="hide_bg('paypal_API_Password')">

									  <input type="text" name="paypal_API_Password" id="paypal_API_Password" value="<?php echo $paypal_API_Password; ?>" onfocus="show_bg('paypal_API_Password')" onblur="hide_bg('paypal_API_Password')"/>

									  </span>

									</div>

									<div style="clear:both;"></div>

									 <div class="fleft">

									  <label>Paypal API Signature<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('paypal_API_Signature')" onmouseout="hide_bg('paypal_API_Signature')">

									  <input type="text" name="paypal_API_Signature" id="paypal_API_Signature" value="<?php echo $paypal_API_Signature; ?>" onfocus="show_bg('paypal_API_Signature')" onblur="hide_bg('paypal_API_Signature')"/>

									  </span>

									</div>

                                    

                                    

                                   <!-- 

                                    <div style="clear:both;"></div>

									<div class="fleft">

									  <label>Gateway Status <span>&nbsp;</span></label>

									  <span >

										  <select name="normal_paypal" id="normal_paypal">

											<option value="0" <?php if($normal_paypal=='0'){ echo "selected"; } ?>>Inactive</option>

											<option value="1" <?php if($normal_paypal=='1'){ echo "selected"; } ?>>Active</option>														

										  </select>

										  </span>

										  

									</div>		-->

                                    

                                    <input type="hidden" name="normal_paypal" id="normal_paypal" value="<?php echo $normal_paypal; ?>" /> 

                                    

                                    

                                    

									<div style="clear:both;"></div>

									

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

