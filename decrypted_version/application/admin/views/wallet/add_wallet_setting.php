<script type="text/javascript">
function display_amount_div(){
	if(document.getElementById('direct_donation_option').checked==true){
		document.getElementById('add_donate_amount').style.display='block';
	}else{
		document.getElementById('add_donate_amount').style.display='none';
	}
}

</script>

<div id="con-tabs">

          <ul>

            <?php  $check_wallet_setting=$this->home_model->get_rights('add_wallet_setting');

		 		$check_payment_gateway=$this->home_model->get_rights('list_payment_gateway');

				$check_wallet_review=$this->home_model->get_rights('list_wallet_review');

				$check_wallet_withdraw=$this->home_model->get_rights('list_wallet_withdraw');

				$check_gateway_detail=$this->home_model->get_rights('list_gateway_detail');

				$set_fund=$this->home_model->get_rights('set_fund');

				

		

			if($check_wallet_setting==1) {		?>	   

		     <li><span style="cursor:pointer;"><?php echo anchor('wallet_setting/add_wallet_setting','Wallet Setting','id="sp_1" style="color:#364852;background:#ececec;"'); ?></span></li>

			 <?php } if($check_gateway_detail==1 || $check_payment_gateway==1) { ?> 

		<!--	 <li><span style="cursor:pointer;"><?php echo anchor('payments_gateways/list_payment_gateway','Payment Gateways'); ?></span></li>       -->

			 <?php } if($check_wallet_review==1) { ?>			 

			    <li><span style="cursor:pointer;"><?php echo anchor('wallet/list_wallet_review','Wallet Review'); ?></span></li>

			  <?php } if($check_wallet_withdraw==1) { ?>

			  <li><span style="cursor:pointer;"><?php echo anchor('wallet/list_wallet_withdraw','Withdraw Request'); ?></span></li>

			  <?php }  if($set_fund==1) { ?>

			  <li><span style="cursor:pointer;"><?php echo anchor('set_fund/serch_user','Fund'); ?></span></li>

			  <?php } ?>

          </ul>

          <div id="text">

            <div id="1">

            

            <?php if($error != "")

					{?>

						<div style="text-align:center;" class="msgdisp">Record has been updated Successfully.</div>

					<?php }

			?>		

              <div class="fleft" style="width:100%;">

                <div style="height:20px;">
				<?php
                	if($msg=='fail'){
						?><p style="text-align:center; color:#f00;">You have to Inactivate the currently active Payment Gateway to activate this Payment Gateway. </p><?php
					}
					if($msg=='done'){
						?><p style="text-align:center; color:#009933;">Payment Gateway activated successfully. </p><?php
					}
					if($msg=='inactive'){
						?><p style="text-align:center; color:#009933;">Payment Gateway inactivated successfully. </p><?php
					}
				?></div>

				<table width="100%" border="0" cellpadding="0" cellspacing="0">

                  <tr>

                    <td><img src="<?php echo base_url(); ?>images/c2-t-l.jpg" alt="" height="4" width="7" /></td>

                    <td background="<?php echo base_url(); ?>images/c2-t.jpg" width="99%"></td>

                    <td><img src="<?php echo base_url(); ?>images/c2-t-r.jpg" alt="" height="4" width="7" /></td>

                  </tr>

                  <tr>

                    <td background="<?php echo base_url(); ?>images/c2-l.jpg"></td>

                    <td valign="top" bgcolor="#FFFFFF"><div id="deal-tabs">

                                      <?php if($wallet_enable==1){ ?>
                                         
                                          <p style="text-align:right; margin:0px;"><img src="<?php echo base_url();?>images/tick.png" border="0" />&nbsp;&nbsp;<span style="text-decoration:none;color:#000000;font-size:20px; font-weight:bold;" >Active</span></p>
                                          
									  <?php }else{ ?>
                                         
                                          <p style="text-align:right; margin:0px;"> <img src="<?php echo base_url();?>images/delete.png" border="0" />&nbsp;&nbsp;<span style="text-decoration:none;color:#000000;font-size:20px; font-weight:bold;" >Inactive</span></p>
                                         
                                     <?php } ?>
                                          
						<div id="deal-con">

							<div id="2" style="">

							  <div align="center">

								<div id="add-deal">

								  <?php

									$attributes = array('name'=>'frm_wallet_setting');

									echo form_open('wallet_setting/add_wallet_setting',$attributes);

								  ?>

									<fieldset class="step">

									<div class="fleft">

									  <label>Wallet Add Time Fees(%)<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('wallet_add_fees')" onmouseout="hide_bg('wallet_add_fees')">

									  <input type="text" name="wallet_add_fees" id="wallet_add_fees" value="<?php echo $wallet_add_fees; ?>" onfocus="show_bg('wallet_add_fees')" onblur="hide_bg('wallet_add_fees')"/>

									  </span>

									</div>

									<div style="clear:both;"></div>
                                    
                                    
                                    
									

									<div class="fleft">

									  <label>Wallet Add Time Minimum Amount<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('wallet_minimum_amount')" onmouseout="hide_bg('wallet_minimum_amount')">

									  <input type="text" name="wallet_minimum_amount" id="wallet_minimum_amount" value="<?php echo $wallet_minimum_amount; ?>" onfocus="show_bg('wallet_minimum_amount')" onblur="hide_bg('wallet_minimum_amount')"/>

									  </span>

									</div>

									<div style="clear:both;"></div>

									
                                    
                                    
                                    

									<div class="fleft">

									  <label>Wallet Withdraw(Donate) Time Fees(%)<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('wallet_donation_fees')" onmouseout="hide_bg('wallet_donation_fees')">

									  <input type="text" name="wallet_donation_fees" id="wallet_donation_fees" value="<?php echo $wallet_donation_fees; ?>" onfocus="show_bg('wallet_donation_fees')" onblur="hide_bg('wallet_donation_fees')"/>

									  </span>

									</div>

									<div style="clear:both;"></div>
	
    								
                                    <div class="fleft">

									  <label>&nbsp;<span>&nbsp;</span></label>

									  <span >

									  <input type="checkbox" name="direct_donation_option" id="direct_donation_option" value="1" <?php if($direct_donation_option=='1'){ echo 'checked="checked"';  }  ?> style="width:25px;" onclick="display_amount_div();" /> Direct donate option

									  </span>

									</div><div style="width:340px; position:relative; right:30px; float:right;">(NOTE : This option will allow the donor's to donate directly by adding amount to wallet when they have not enough amount in wallet.)</div>

									<div style="clear:both;"></div><br /><br />
                                    
                              <div id="add_donate_amount" style="display:<?php if($direct_donation_option=='1'){ echo 'block'; }else{ echo 'none'; }  ?>">      
                                    
                                     <div class="fleft"><label>&nbsp;<span>&nbsp;</span></label>
									  <span >

									 	 <input type="radio" name="add_amount" id="add_whole_amount" value="0" <?php if($add_amount!='1'){ echo 'checked="checked"';  }  ?>  style="width:25px;"  />Add whole donation amount

									  </span>

									</div><div style="width:310px; position:relative; right:65px; float:right;">(NOTE : This option will add whole donation amount and then donate it, the wallet amount will remain as it is.)</div><div style="clear:both;"></div><br />
                                    
                                    
                                      <div class="fleft"><label>&nbsp;<span>&nbsp;</span></label>
									  <span >

									 	 <input type="radio" name="add_amount" id="add_remain_amount" value="1" <?php if($add_amount=='1'){ echo 'checked="checked"';  }  ?>  style="width:25px;"  />Add remaining donation amount

									  </span>

									</div><div style="width:310px; position:relative; right:65px; float:right;">(NOTE : This option will add amount which is remaining for donation and then donate the whole wallet amount.)</div><div style="clear:both;"></div>
                                    
                                </div>    
                                    
                                   

									

                            

									<div class="fleft">

									  <label>&nbsp;<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('wallet_id')" onmouseout="hide_bg('wallet_id')">

									  <input type="hidden" name="wallet_id" id="wallet_id" value="<?php echo $wallet_id; ?>" />													  

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

