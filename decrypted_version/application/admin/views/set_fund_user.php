

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

			<!-- <li><span style="cursor:pointer;"><?php echo anchor('payments_gateways/list_payment_gateway','Payment Gateways'); ?></span></li>       -->

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

            

       

            <?php $CI =& get_instance();	$base_url = $CI->config->slash_item('base_url_site');

											$base_path = $CI->config->slash_item('base_path');

			 ?>

            

            

            <?php if($msg!='') { 

            

			if($msg=='add') { ?><div align="center" style="color:#093; font-weight:bold;">Fund add sucessfully.</div> 

            

            

            <?php }

			

			if($msg=='deduct') {?>

			

			<div align="center" style="color:#093; font-weight:bold;">Fund Deduct sucessfully.</div>

		<?php 	} } ?>

            

            

            

			<div style="clear:both; height:25px;">

            

         <table border="0" cellpadding="0" cellspacing="0" width="100%"  height="25" >

			

			<tr> 

            

            <td align="left" valign="top">

            

            <div style="float:left;">

            <table>

            <tr>

            

            

             <td align="left" valign="middle">&nbsp;</td>

            

             <td align="left" valign="middle"><b>Email : </b></td>

            <td align="left" valign="middle">

            


                 <?php
					$attributes = array('name'=>'frm_search','id' => 'frm_search');
					echo form_open('set_fund/serch_user/'.$limit,$attributes);
				  ?>

                <input type="text" name="keyword" id="keyword" value="<?php echo $keyword;?>" />                

                <input type="submit" name="submit" id="submit" value="GO" />

                

                </form> 

            

            

            </td>

            

            

            

            </tr>

            </table>

            </div>

            

            </td>

            

                    

            

            

            

            

            </tr>

				</table>

						

			</div>

            

          

            

              <div class="fleft" style="width:100%;">

                <div style="height:10px;"></div>

				<table width="100%" border="0" cellpadding="0" cellspacing="0">

                  

                  <tr>

                    <td background="<?php echo base_url(); ?>images/c2-l.jpg"></td>

                    <td align="left" valign="top">

                    

                    

                    <table align="left" width="100%" border="0" bgcolor="#FFFFFF">

						<tr>

							<td align="left" valign="top">   

                            

                            

                         

            

         

            

            

           <div style="clear:both;"></div> </td>    

           

						</tr>

                        

                        

						<tr >

                          <td valign="top"><div class="deals" style="display:block;" id="dig_it6">

                              <div id="last_login4" style="width:100%;overflow-x:auto;overflow-y:hidden;">

                                <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#888591">

                                  <tr class="alter">

                                 	<th height="30"><strong>User Name</strong></th>

									<th ><strong>Email ID</strong></th>

									<th><strong>User Fund(<?php echo $site_setting['currency_symbol']; ?>)</strong></th>  

									<th><strong>Add Fund</strong></th> 

                                    <th><strong>Deduct Fund</strong></th> 

								  </tr>

                                  <?php

								 

								  	if($result)

									{

										$i=0;$cls='';

										foreach($result as $row)

										{

											if($i%2=="0")

											{

												$fc = "toggle";

												$cl = "alter";

											}

											else{

												$fc = "toggle1";

												$cl = "alter1";

											}

											 ?>

								  <tr onClick="<?php echo $fc; ?>(this);" class="<?php echo $cl; ?>" <?php echo $cls; ?>>

                                  

                       		    <td height="28"><div class="pad-left" style="text-align:center;">

                                     

									<?php echo $row->user_name; ?></a>

                                    </div></td>

                                    <td ><div class="pad-left" style="text-align:center;"><?php echo  $row->email;?></div></td>

									

                                    <td ><?php $amount=$this->set_fund_model->user_wallet_amount($row->user_id); echo set_currency($amount); ?></td>

                                    <td ><div class="pad-left" style="float:none; text-align:center;"><?php echo anchor('set_fund/add_fund/'.$row->user_id,'Add Fund');?></div></td>

                                    <td ><div class="pad-left" style="float:none; text-align:center;"><?php echo anchor('set_fund/deduct_fund/'.$row->user_id,'Deduct Fund');?></div></td>

									

									

									<?php } 

									}

									

									else

									 { 

									 

									     echo "not found"; 

									} 

									?>

									

									

									

									

									



									

                                    

                                    

                  

                                    

                                    

                                    

                                  </tr>

								                                                               

                                  <tr class="inner-tablebg">

                                    <td colspan="16" valign="top"><table  border="0" align="center">

                                        <tr class="inner-table">

                                          <td width="750" align="center">&nbsp;</td>

                                          <td width="1" align="center"><img src="<?php echo base_url(); ?>images/devider1.png" alt="" width="2" /></td>

                                          <?php echo $page_link; ?>

										  <td width="1" align="center"><img src="<?php echo base_url(); ?>images/devider1.png" alt="" /></td>

                                          <td width="100">&nbsp;</td>

										  <td width="650" align="center" valign="middle">&nbsp;</td>

										  <td align="left" width="100">&nbsp;</td>

                                        </tr>

                                      </table></td>

                                  </tr>

                                </table>

                                

                                </form>

                                

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