<div id="con-tabs">

          <ul>

            <li><span style="cursor:pointer;"><?php echo anchor('project_category/perks/'.$project_id,'Perks','id="sp_2" style="color:#364852;background:#ececec;"'); ?></span></li>

          </ul>

          <div id="text">

          

          <?php if($msg!='') { 

			if($msg == "insert") {?> <div align="center" class="msgdisp">New Record has been added Successfully.</div>

            

			<?php }

			if($msg == "update") {?> <div align="center" class="msgdisp">Record has been updated Successfully.</div>

            

			<?php }

			if($msg == "delete") {?> <div align="center" class="msgdisp">Record has been deleted Successfully.</div>

            

			<?php }

			} ?>  

          

            <div id="1">

            

            

            

            <div style="clear:both; height:25px;">      

            

         <table border="0" cellpadding="0" cellspacing="0" align="right" height="25" >

			

			<tr> <td align="right" valign="top"> <img src="<?php echo base_url();?>images/add.png" border="0" />&nbsp;&nbsp;</td>

            

         <td align="right" valign="middle"><?php echo anchor('project_category/add_perk/'.$project_id,'Add Perk','style="text-decoration:none;color:#000000;font-size:16px; font-weight:bold;"');?></td>

            

            </tr>

				</table>

						

			</div>

            

            

            

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

                                   <!-- <th  height="30"><strong>Perk Title </strong></th>-->

                                    <th width="700"><strong>Description</strong></th>

                                    <th ><strong>Amount(<?php echo $site_setting['currency_symbol']; ?>)</strong></th>

                                    <th ><strong>Total Claim</strong></th>   

                                     <th><strong>Claimed Perk</strong></th>  

                                     <th><strong>Action</strong></th>                                   

                                  </tr>

								  <?php

								  	if($all_perks)

									{

										$i=0;

										foreach($all_perks as $row)

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

                                 <?php /*?>  <td height="28"><div class="pad-left"><?php echo $row['perk_title']; ?></div></td><?php */?>

                                   <td><div class="pad-left"><?php echo $row['perk_description']; ?></div></td>

                                   <td align="center" valign="middle"><?php echo set_currency($row['perk_amount']); ?></td>

                                   <td align="center" valign="middle"><?php echo $row['perk_total']; ?></td>

                                   <td align="center" valign="middle"><?php if($row['perk_get']=='') { echo "0"; } else { echo $row['perk_get']; } ?></td>

                                   

                                   <td align="center" valign="middle">

                                   

                                    <?php echo anchor('project_category/edit_perk/'.$row['perk_id'],'Edit','style="color:#000000;"');?>&nbsp;|&nbsp;

							  <?php echo anchor('project_category/delete_perk/'.$row['perk_id'],'Delete','style="color:#000000;"');?> 

                                   

                                   </td> 

                                    

                                    

                                    

                                  </tr>

								  <?php

								  			$i++;

										}

									}

								  ?> 

                                  

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