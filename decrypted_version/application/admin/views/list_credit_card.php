<div id="con-tabs">

          <ul>

            <li><span style="cursor:pointer;"><?php echo anchor('transaction_type/list_credit_card','Paypal Credit Card','id="sp_1" style="color:#364852;background:#ececec;"'); ?></span></li>

          </ul>

          <div id="text">

            <div id="1">

               <?php if($result[0]->credit_card_gateway_status==1){ ?>
                                         
                                          <p style="text-align:right; margin:0px;"><img src="<?php echo base_url();?>images/tick.png" border="0" />&nbsp;&nbsp;<span style="text-decoration:none;color:#000000;font-size:20px; font-weight:bold;" >Active</span></p>
                                          
									  <?php }else{ ?>
                                         
                                          <p style="text-align:right; margin:0px;"> <img src="<?php echo base_url();?>images/delete.png" border="0" />&nbsp;&nbsp;<span style="text-decoration:none;color:#000000;font-size:20px; font-weight:bold;" >Inactive</span></p>
                                         
                                     <?php } ?>
                                          

             <?php if($msg!='') { 

					if($msg=='delete') { ?><div align="center" class="msgdisp">Record has been deleted Successfully.</div> <?php }          
		
					if($msg=='update') { ?><div align="center" class="msgdisp">Record has been updated Successfully.</div> <?php }	       
		
					if($msg=='fail'){ ?><p style="text-align:center; color:#f00; margin:0px 0px 5px 0px;">You have to Inactivate the currently active Payment Gateway to activate this Payment Gateway. </p><?php  }
					
				   if($msg=='done'){ ?><p style="text-align:center; color:#009933;margin:0px 0px 5px 0px;">Payment Gateway activated successfully. </p><?php }
				
					if($msg=='inactive'){
						?><p style="text-align:center; color:#009933;margin:0px 0px 5px 0px;">Payment Gateway inactivated successfully. </p><?php
					}
				}
			
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

                    <td valign="top"><table width="100%" border="0" bgcolor="#FFFFFF">

                      <tr>

                          <td valign="top"><div class="deals" style="display:block;" id="dig_it6">

                              <div id="last_login4">

                                <table width="100%" cellpadding="0" cellspacing="1" bgcolor="#888591">

                                  <tr class="alter">

                                    <th height="30"><strong>No. </strong></th>

									<th><strong>Site Status</strong></th>

                                    <th><strong>API Username</strong></th>

                                    <th><strong>Preapproval</strong></th>                                    

                                    <th><strong>Gateway Status</strong></th>

                                    <th><strong>Options</strong></th>

                                   

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

								  <tr onClick="<?php echo $fc; ?>(this);" class="<?php echo $cl; ?>">

                                    <td height="28"><div class="pad-left"><?php echo $i+1; ?></div></td>

      <td><div class="pad-left"><?php if($row->credit_card_site_status==1) { echo "Live"; } else { echo "Sandbox"; } ?></div></td>

                                    <td><div class="pad-left"><?php echo $row->credit_card_username; ?></div></td>

                                  

                                    <td><div class="pad-left"><?php 

									

									if($row->credit_card_preapproval==1)

									{

									echo 'Active';

									}

									else

									{

									echo 'Inactive';

									}

									 ?></div></td>                                

                                    <td><div class="pad-left"><?php 

									

									if($row->credit_card_gateway_status==1)

									{

									echo 'Active';

									}

									else

									{

									echo 'Inactive';

									}

									 ?></div></td>

                                    

                                 	<td><div class="pad-left"><?php echo anchor('transaction_type/edit_credit_card/'.$row->paypal_credit_card_id.'/'.$offset,'Edit'); ?> </div></td>

                                   

								  </tr>

								  <?php

								  			$i++;

										}

									}

								  ?>                                                                   

                                  <tr class="inner-tablebg">

                                    <td colspan="15" valign="top"><table width="100%" border="0" align="left">

                                        <tr class="inner-table">

                                          <td width="50" align="center">&nbsp;</td>

                                          <td width="1" align="center"><img src="<?php echo base_url(); ?>images/devider1.png" alt="" width="2" /></td>

                                          <?php //echo $page_link; ?>

										  <td width="1" align="center"><img src="<?php echo base_url(); ?>images/devider1.png" alt="" /></td>

                                          <td width="100">&nbsp;</td>

										  <td width="650" align="center" valign="middle">&nbsp;</td>

										  <td align="left" width="100">&nbsp;</td>

                                            <td align="left" width="100">&nbsp;</td>

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