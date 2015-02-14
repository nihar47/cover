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
										$attributes = array('name'=>'frm_payment');
										echo form_open_multipart('payments_gateways/add_payment',$attributes);
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
										  <label>Name<span>&nbsp;</span></label>
										  <span onmouseover="show_bg('name')" onmouseout="hide_bg('name')">
										  <input type="text" name="name" id="name" value="<?php echo $name; ?>" onfocus="show_bg('name')" onblur="hide_bg('name')"/>
										  </span>
										</div>
										<div style="clear:both;"></div>
										<div class="fleft">
										  <label>Status<span>&nbsp;</span></label>
										  <span onmouseover="show_bg('status')" onmouseout="hide_bg('status')">
										  
                                           <select name="status" id="status">
                                          <option value="">Select</option>
											<option <?php if($status=='Active'){ echo "selected"; } ?>>Active</option>
											<option <?php if($status=='Inactive'){ echo "selected"; } ?>>Inactive</option>														
										  </select>
										  </span>
										</div>
										<div style="clear:both;"></div>
										<div class="fleft">
										  <label>Image<span>&nbsp;</span></label>
										  <span onmouseover="show_bg('image')" onmouseout="hide_bg('image')">
										  <input type="file" name="image" id="image"  onfocus="show_bg('image')" onblur="hide_bg('image')"/>
										  <input type="hidden" name="prev_image" id="prev_image" value="<?php echo $image; ?>" />
										  </span>
										</div>
										<div style="clear:both;"></div>
										<?php
											if($id=="")
											{
										  ?>
                                        <div class="fleft">
										  <label>Function Name<span>&nbsp;</span></label>
										  <span onmouseover="show_bg('function_name')" onmouseout="hide_bg('function_name')">
										  <input type="text" name="function_name" id="function_name" value="<?php echo $function_name; ?>" onfocus="show_bg('function_name')" onblur="hide_bg('function_name')"/>
										  </span>
										</div>
										<div style="clear:both;"></div>
										
                                        <?php
                                        
										}
										else{
											?><input type="hidden" name="function_name" id="function_name" value="<?php echo $function_name; ?>" onfocus="show_bg('function_name')" onblur="hide_bg('function_name')"/><?php
										}
										
										?>
										<div class="fleft">
										  <label>Support Masspayment<span>&nbsp;</span></label>
										  <span onmouseover="show_bg('suapport_masspayment')" onmouseout="hide_bg('suapport_masspayment')">
										  <select name="suapport_masspayment" id="suapport_masspayment">
                                          <option value="">Select</option>
											<option <?php if($suapport_masspayment=='Yes'){ echo "selected"; } ?>>Yes</option>
											<option <?php if($suapport_masspayment=='No'){ echo "selected"; } ?>>No</option>														
										  </select>
										  </span>
										</div>
										<div style="clear:both;"></div>
										<div class="fleft">
										  <label>&nbsp;<span>&nbsp;</span></label>
										  <span onmouseover="show_bg('id')" onmouseout="hide_bg('id')">
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
											<input type="button" name="cancel" value="Cancel" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer;" onClick="location.href='<?php echo site_url('payments_gateways/list_payment_gateway'); ?>'"/>
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