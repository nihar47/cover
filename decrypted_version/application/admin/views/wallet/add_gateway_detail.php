<div id="con-tabs">
          <ul>
           
		 <?php  $check_wallet_setting=$this->home_model->get_rights('add_wallet_setting');
		 		$check_payment_gateway=$this->home_model->get_rights('list_payment_gateway');
				$check_wallet_review=$this->home_model->get_rights('list_wallet_review');
				$check_wallet_withdraw=$this->home_model->get_rights('list_wallet_withdraw');
				$check_gateway_detail=$this->home_model->get_rights('list_gateway_detail');
				
		
			if($check_wallet_setting==1) {		?>	   
		   
		     <li><span style="cursor:pointer;"><?php echo anchor('wallet_setting/add_wallet_setting','Wallet Setting'); ?></span></li>
			 
			 <?php } if($check_gateway_detail==1 || $check_payment_gateway==1) { ?> 
			 <li><span style="cursor:pointer;"><?php echo anchor('payments_gateways/list_payment_gateway','Payment Gateways','id="sp_1" style="color:#364852;background:#ececec;"'); ?></span></li>       
			 <?php } if($check_wallet_review==1) { ?>			 
			    <li><span style="cursor:pointer;"><?php echo anchor('wallet/list_wallet_review','Wallet Review'); ?></span></li>
			  <?php } if($check_wallet_withdraw==1) { ?>
			  <li><span style="cursor:pointer;"><?php echo anchor('wallet/list_wallet_withdraw','Withdraw Request'); ?></span></li>
			  
			  
			  <?php } ?>
			  
			  
			 
			      
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
										$attributes = array('name'=>'frm_detail');
										echo form_open('gateways_details/add_detail/'.$payment['id'],$attributes);
									  ?>
										<fieldset class="step">
										<?php
											if($error != "")
											{
												echo "<label style='width:700px;text-align:center;'><span>".$error."</span></label>";
												echo "<div class='vertical-line'></div>";
											}
										?>													
										<div class="fleft">
										  <label>&nbsp;<span>&nbsp;</span></label>
										 <input type="hidden" id="payment_gateway_id" name="payment_gateway_id" value="<?php echo $payment['id']; ?>" />
                                         
                                        
										</div>
										<div style="clear:both;"></div>
										<div class="fleft">
										  <label>Name<span>&nbsp;</span></label>
										  <span onmouseover="show_bg('name')" onmouseout="hide_bg('name')">
										  <input type="text" name="name" id="name" value="<?php echo $name; ?>" onfocus="show_bg('name')" onblur="hide_bg('name')"/>
										  </span>
										</div>
										<div style="clear:both;"></div>
										
										<div class="fleft">
										  <label>Value<span>&nbsp;</span></label>
										  <span onmouseover="show_bg('value')" onmouseout="hide_bg('value')">
										  <input type="text" name="value" id="value" value="<?php echo $value; ?>" onfocus="show_bg('value')" onblur="hide_bg('value')"/>
										  </span>
										</div>
										
										<div style="clear:both;"></div>
									<div class="fleft">
										  <label>Label<span>&nbsp;</span></label>
										  <span onmouseover="show_bg('label')" onmouseout="hide_bg('label')">
										  <input type="text" name="label" id="label" value="<?php echo $label; ?>" onfocus="show_bg('label')" onblur="hide_bg('label')"/>
										  </span>
										</div>
										<div style="clear:both;"></div>
										
										
										<div class="fleft">
										  <label>Description<span>&nbsp;</span></label>
										  <span onmouseover="show_bg('description')" onmouseout="hide_bg('description')">
										 <textarea id="description" name="description" onfocus="show_bg('description')" onblur="hide_bg('description')"><?php echo $description;  ?></textarea>
										  </span>
										</div>
										<div style="clear:both;"></div>
										<div class="fleft">
										  <label>&nbsp;<span>&nbsp;</span></label>
										  <input type="hidden" name="id" id="id" value="<?php echo $payment_gateway_id; ?>" />
										  <input type="hidden" name="offset" id="offset" value="<?php echo $offset; ?>" />
										</div>
										<div style="clear:both;"></div>
										<div class="fleft">
										  <label>&nbsp;<span>&nbsp;</span></label>
										  <?php
											if($payment_gateway_id=="")
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
											<input type="button" name="cancel" value="Cancel" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer;" onClick="location.href='<?php echo site_url('gateways_details/list_gateway_detail/'.$payment_gateway_id); ?>'"/>
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
