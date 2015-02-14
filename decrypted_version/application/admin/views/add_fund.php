<div id="con-tabs">
          <ul>
          <?php 
		        $check_wallet_setting=$this->home_model->get_rights('add_wallet_setting');
		 		$check_payment_gateway=$this->home_model->get_rights('list_payment_gateway');
				$check_wallet_review=$this->home_model->get_rights('list_wallet_review');
				$check_wallet_withdraw=$this->home_model->get_rights('list_wallet_withdraw');
				$check_gateway_detail=$this->home_model->get_rights('list_gateway_detail');
				$set_fund=$this->home_model->get_rights('set_fund');
				
		
			if($check_wallet_setting==1) {		?>	   
		   
		     <li><span style="cursor:pointer;"><?php echo anchor('wallet_setting/add_wallet_setting','Wallet Setting'); ?></span></li>
			 
			 <?php } if($check_gateway_detail==1 || $check_payment_gateway==1) { ?> 
			 <li><span style="cursor:pointer;"><?php echo anchor('payments_gateways/list_payment_gateway','Payment Gateways'); ?></span></li>       
			 <?php } if($check_wallet_review==1) { ?>			 
			    <li><span style="cursor:pointer;"><?php echo anchor('wallet/list_wallet_review','Wallet Review'); ?></span></li>
			  <?php } if($check_wallet_withdraw==1) { ?>
			  <li><span style="cursor:pointer;"><?php echo anchor('wallet/list_wallet_withdraw','Withdraw Request'); ?></span></li>
			  
			  
			  <?php } if($set_fund==1) { ?>
			  <li><span style="cursor:pointer;"><?php echo anchor('set_fund/serch_user','Fund','id="sp_1" style="color:#364852;background:#ececec;"'); ?></span></li>
			  
			  
			  <?php } ?>
            
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
						<div id="deal-con">
							<div id="2" style="">
							  <div align="center">
								<div id="add-deal">
								  <?php
									$attributes = array('name'=>'frm_add_fund');
									echo form_open('set_fund/add_fund/'.$userid,$attributes);
								  ?>
									<fieldset class="step">
                                    <div class="fleft">
									  <label>Available Balance(<?php echo $site_setting['currency_symbol'];?>)<span>&nbsp;</span></label>
									  <span>
									  <input type="text" name="balance" id="balance" value="<?php echo $amount;?>" style="background:none; border:none;" readonly />
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Add Fund(<?php echo $site_setting['currency_symbol'];?>)<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('add_fund')" onmouseout="hide_bg('add_fund')">
									  <input type="text" name="add_fund" id="add_fund" value="" onfocus="show_bg('add_fund')" onblur="hide_bg('add_fund')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>Reason<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('reason')" onmouseout="hide_bg('reason')">
								<textarea name="reason" id="reason"  onfocus="show_bg('reason')" onblur="hide_bg('reason')"></textarea>
									  </span>
									</div>
									<div style="clear:both;"></div>
									
									
									<div class="fleft">
									  <label>&nbsp;<span>&nbsp;</span></label>
									  <div class="submit">
                                      <input type="hidden" name="userid" id="userid" value="<?php echo $userid;?>">
										<input type="submit" name="submit" value="Submit" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer; " onclick=""/>
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
