<script type="text/javascript" language="javascript">

	function delete_rec(id,offset)

	{

		var ans = confirm("Are you sure to delete paypal?");

		if(ans)

		{

			location.href = "<?php echo site_url('/transaction_type/delete_paypal'); ?>/"+id+"/"+offset;

		}else{

			return false;

		}

	}

</script>

<div id="con-tabs">

          <ul>

            <li><span style="cursor:pointer;"><?php echo anchor('transaction_type/list_paypal','Paypal','id="sp_1" style="color:#364852;background:#ececec;"'); ?></span></li>

          </ul>

          <div id="text">

            <div id="1">

               <?php $attspop = array(
  'width'      => '700',
  'height'     => '500',
  'scrollbars' => 'yes',
  'status'     => 'yes',
  'resizable'  => 'yes',
  'screenx'    => '350',
  'screeny'    => '75',
  'location'=>'no',
  'menubar'=>'no',
  'titlebar'=>'no',
  'toolbar'=>'no'
);
			?>
	 <div  class="testmail" style="float:right;">
	<?php echo anchor_popup('automation/index','Test Your Paypal Setting',$attspop);?>
  </div>
  
  
  <?php if($result[0]->gateway_status==1){ 
			   ?>

                
                                         
                                          <div style=" float:right;text-align:right; margin:0px;"><img src="<?php echo base_url();?>images/tick.png" border="0" />&nbsp;&nbsp;<span style="text-decoration:none;color:#000000;font-size:20px; font-weight:bold;" >Active</span></div>
                                          
									  <?php }else{ ?>
                                         
                                          <div style=" float:right;text-align:right; margin:0px;"> <img src="<?php echo base_url();?>images/delete.png" border="0" />&nbsp;&nbsp;<span style="text-decoration:none;color:#000000;font-size:20px; font-weight:bold;" >Inactive</span></div>
                                         
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

									<th><strong>Paypal Email</strong></th>

                                    <th><strong>Username</strong></th>

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

                                    <td><div class="pad-left"><?php echo $row->site_status; ?></div></td>

                                    <td><div class="pad-left"><?php echo $row->paypal_email; ?></div></td>

                                    <td><div class="pad-left"><?php echo $row->paypal_username; ?></div></td>

                                    <td><div class="pad-left"><?php 

									

									if($row->preapproval=='1')

									{

									echo 'Active';

									}

									else

									{

									echo 'Inactive';

									}

									

									//echo $row->preapproval; ?></div></td>                                

                                    <td><div class="pad-left"><?php 

									

									if($row->gateway_status=='1')

									{

									echo 'Active';

									}

									else

									{

									echo 'Inactive';

									}

									//echo $row->gateway_status; ?></div></td>

                                    

                                 	<td><div class="pad-left"><?php echo anchor('transaction_type/edit_paypal/'.$row->id.'/'.$offset,'Edit'); ?>  <!--/<a href="#" onclick="delete_rec('<?php echo $row->id; ?>','<?php echo $offset; ?>')">Delete</a>--></div></td>

                                   

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

                                            <td align="left" width="100"><?php //echo anchor('transaction_type/add_paypal','Add', 'style="text-decoration:none;"'); ?>&nbsp;</td>

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