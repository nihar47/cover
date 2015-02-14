<script type="text/javascript" language="javascript">
	function delete_rec(id,offset)
	{
		var ans = confirm("Are you sure to delete Gateways detail?");
		if(ans)
		{
			location.href = "<?php echo site_url('/gateways_details/delete_detail'); ?>/"+id+"/"+<?php echo $payid; ?>+"/"+offset;
		}else{
			return false;
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
           <h2 style="text-align:center;"><?php echo $pay['name']; ?></h2>
          <div id="text">
            <div id="1">
            
            <?php if($msg!='') { 
            
			if($msg=='delete') { ?><div align="center" class="msgdisp">Record has been deleted Successfully.</div> 
            
            <?php } if($msg=='insert') { ?><div align="center" class="msgdisp">New Record has been added Successfully.</div> 
            
            <?php } if($msg=='update') { ?><div align="center" class="msgdisp">Record has been updated Successfully.</div> 
            
            <?php }} ?>
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
                    <td valign="top"><table width="100%" border="0" bgcolor="#FFFFFF">
                       <tr>
                          <td valign="top"><div class="deals" style="display:block;" id="dig_it6">
                              <div id="last_login4" style="width:100%;overflow-x:auto;overflow-y:hidden;">
                                <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#888591">
                                  <tr class="alter">
                                   
									
									<th height="30"><strong>Value</strong></th>
                                    <th><strong>Label</strong></th>
									<th><strong>Description</strong></th>    
									<th><strong>Action</strong></th>                             
                                  </tr>
                                  <?php
								  	if($result)
									{
										$i=0;
										foreach($result as $row)
										{
											if($i%2=="0")
											{
												$fc = "toggle";
												$cl = "alter";
											}else{
												$fc = "toggle1";
												$cl = "alter1";
											}
								  ?>
								  <tr onclick="<?php echo $fc; ?>(this);" class="<?php echo $cl; ?>" height="28">
                                  
                                    <td><div class="pad-left"><?php echo $row->value; ?></div></td>
                                    <td><div class="pad-left"><?php echo $row->label; ?></div></td>
                                    <td><div class="pad-left"><?php echo $row->description; ?></div></td>
                                   
									<td><div class="pad-left"><?php echo anchor('gateways_details/edit_detail/'.$row->id.'/'.$row->payment_gateway_id.'/'.$offset,'Edit'); ?> <!--/ <a href="#" onclick="delete_rec('<?php //echo $row->id; ?>','<?php //echo $offset; ?>')">Delete</a>--></div></td>
                                  </tr>
								  <?php
								  			$i++;
										}
									}
								  ?>                                                                   
                                  <tr class="inner-tablebg">
                                    <td colspan="6" valign="top"><table  border="0" align="left">
                                        <tr class="inner-table">
                                          <td width="50" align="center">&nbsp;</td>
                                          <td width="1" align="center"><img src="<?php echo base_url(); ?>images/devider1.png" alt="" width="2" /></td>
                                          <?php echo $page_link; ?>
										  <td width="1" align="center"><img src="<?php echo base_url(); ?>images/devider1.png" alt="" /></td>
                                          <td width="100">&nbsp;</td>
										  <td width="650" align="center" valign="middle">&nbsp;</td>
										</tr>
                                      </table></td>
                                  </tr>
                                </table>
                              </div>
                              <div id="chart4" style="display:none;">
                                <table cellpadding="0" cellspacing="0" border="0">
                                  <tr>
                                    <td align="center"><img src="<?php echo base_url(); ?>images/chart.jpg" alt="" /></td>
                                  </tr>
                                </table>
                              </div>
                            </div></td>
                        </tr>
                      </table></td>
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