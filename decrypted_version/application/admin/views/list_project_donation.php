<div id="con-tabs">

          <ul>

            <li><span style="cursor:pointer;"><?php echo anchor('project_category/donations/'.$project_id,'Donations','id="sp_2" style="color:#364852;background:#ececec;"'); ?></span></li>

          </ul>

          <div id="text">

            <div id="1">

            

           

             <?php $CI =& get_instance();	$base_url = $CI->config->slash_item('base_url_site');

											$base_path = base_path();

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

						      <div id="last_login4" style="width:100%;overflow-x:auto;overflow-y:hidden;">

                                <table width="100%" cellpadding="0" cellspacing="1" bgcolor="#888591">

                                  <tr class="alter">

                                    <th  height="30"><strong>Date</strong></th>

                                    <th ><strong>Donor</strong></th>

                                    <th ><strong>Email</strong></th>

                                    <th ><strong>Perk</strong></th>   

                                    

                                     <th><strong>Amount(<?php echo $site_setting['currency_symbol']; ?>)</strong></th>                                   

                                  </tr>

								  <?php

								  	if($donations)

									{

										$i=0;

										foreach($donations as $dn)

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

								  <tr onclick="<?php echo $fc; ?>(this);" class="<?php echo $cl; ?>">

                                   <td height="28"><div class="pad-left"><?php echo date($site_setting['date_format'],strtotime($dn['transaction_date_time'])); ?></div></td>

                                   <td><div class="pad-left">

                                   

                                    <?php 

					

					$donar_user=$this->project_category_model->get_user_detail($dn['user_id']); ?>

					

					

					<a href="<?php echo front_base_url().'member/'.$dn['user_id'];?>" target="_blank"><?php echo  ucfirst($donar_user['user_name'].' '.$donar_user['last_name']); ?></a>

                                   

                                   </div></td>

                                   <td align="center" valign="middle"><?php echo ucfirst($dn['email']); ?></td>

                                   <td align="center" valign="middle">

								   

								   <?php 

								   

								   

								   if($dn['perk_id']!='0') {				

								   

				 $perk=$this->project_category_model->get_perk_name($dn['perk_id']);

				   

				   		   if(strlen($perk)>=1)

						   {

						  		 echo ucfirst($perk);

						   }

						   else

						   {

						     echo "N/A";

						   }

						   

				}

				

						   else

						   {

						     echo "N/A";

						   }

						   

						  ?></td>

                                  

                                   

                                   <td align="center" valign="middle">

                                   <?php echo set_currency($dn['amount']); ?>

                                   

                                   </td> 

                                    

                                    

                                    

                                  </tr>

								  <?php

								  			$i++;

										}

									} else {

								  ?> 

                                  

                                  <tr class="alter"><td colspan="5" align="center" valign="middle"><b>No Donation</b> </td></tr>

                                  

                                  

                                  <?php } ?>

                                  

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