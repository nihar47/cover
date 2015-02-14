

<div id="con-tabs">

          <ul>

            <li><span style="cursor:pointer;"><?php echo anchor('transaction_type/list_normal_paypal','Normal Paypal','id="sp_1" style="color:#364852;background:#ececec;"'); ?></span></li>

          </ul>

          <div id="text">

            <div id="1">
			 <?php if($result->normal_paypal=='0'){ ?>
                                         
                                          <p style="text-align:right; margin:0px;"><img src="<?php echo base_url();?>images/tick.png" border="0" />&nbsp;&nbsp;<a href="<?php echo site_url('payments_gateways/set_payments_gateways/active/normal'); ?>"   style="text-decoration:none;color:#000000;font-size:20px; font-weight:bold;" >Active</a></p>
                                          
									  <?php }else{ ?>
                                         
                                          <p style="text-align:right; margin:0px;"> <img src="<?php echo base_url();?>images/delete.png" border="0" />&nbsp;&nbsp;<a href="<?php echo base_url().'payments_gateways/set_payments_gateways/inactive/normal'; ?>"  style="text-decoration:none;color:#000000;font-size:20px; font-weight:bold;" >Inactive</a></p>
                                         
                                     <?php } ?>
                                          
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

                        <?php

							if($msg != "")

							{

								if($msg == "delete"){	$msg = "Paypal deleted successfully"; }
								
								if($msg=='fail'){ $msg='<p style="text-align:center; color:#f00;margin:0px 0px 5px 0px;">You have to Inactivate the currently active Payment Gateway to activate this Payment Gateway. </p>';  }
					
				   				if($msg=='done'){ $msg='<p style="text-align:center; color:#009933;margin:0px 0px 5px 0px;">Payment Gateway activated successfully. </p>'; }
								if($msg=='inactive'){
									$msg='<p style="text-align:center; color:#009933;margin:0px 0px 5px 0px;">Payment Gateway inactivated successfully. </p>';
								}

						?>

						<tr>

							<td style="color:#FF0000;"><?php echo $msg; ?></td>

						</tr>

						<?php	

							}

						?>

						<tr>

                          <td valign="top"><div class="deals" style="display:block;" id="dig_it6">

                              <div id="last_login4">

                                <table width="100%" cellpadding="0" cellspacing="1" bgcolor="#888591">

                                  <tr class="alter">

                                    <th height="30"><strong>No. </strong></th>

									<th><strong>Paypal Status</strong></th>

									<th><strong>Paypal Email</strong></th>

                                    <th><strong>API Username</strong></th>                                                            

                                    <th><strong>Gateway Status</strong></th>

                                    <th><strong>Options</strong></th>

                                   

                                  </tr>

                                  <?php

								  

												$fc = "toggle";

												$cl = "alter";

										

								  ?>

								  <tr onClick="<?php echo $fc; ?>(this);" class="<?php echo $cl; ?>">

                                    <td height="28"><div class="pad-left">1</div></td>

                                    <td><div class="pad-left"><?php echo $result->paypal_status; ?></div></td>

                                    <td><div class="pad-left"><?php echo $result->paypal_email; ?></div></td>

                                    <td><div class="pad-left"><?php echo $result->paypal_API_UserName; ?></div></td>

                                                                

                                    <td><div class="pad-left"><?php 

									

									if($result->normal_paypal=='1')

									{

									echo 'Active';

									}

									else

									{

									echo 'Inactive';

									}

									 ?></div></td>

                                    

                                 	<td><div class="pad-left"><?php echo anchor('transaction_type/edit_normal_paypal/','Edit'); ?> </div></td>

                                   

								  </tr>

								                                                                  

                                  <tr class="inner-tablebg">

                                    <td colspan="15" valign="top"><table width="100%" border="0" align="left">

                                        <tr class="inner-table">

                                          <td width="50" align="center">&nbsp;</td>

                                          <td width="1" align="center"><img src="<?php echo base_url(); ?>images/devider1.png" alt="" width="2" /></td>

                                          

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