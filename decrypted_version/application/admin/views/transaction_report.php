<script type="text/javascript">



function getlimit(limit)

{

	//alert();

	if(limit=='0')

	{

	return false;

	}

	else

	{

		window.location.href='<?php echo site_url('transaction_type/transaction_report/');?>'+'/'+limit;

	}



}



function getsearchlimit(limit)

{

	if(limit=='0')

	{

	return false;

	}

	else

	{

		
		window.location.href='<?php echo site_url('transaction_type/search_transaction_report');?>'+'/'+limit+'/'+'<?php echo $option.'/'.$keyword; ?>';
		
	}



}





	function chk_valid()

	{

		

		var keyword = document.getElementById('keyword').value;

		

		if(keyword=='')

		{

			alert('Please enter search keyword');	

			return false;

			

		}

		

		else

		{

			return true;			

		}

		

		

		

	}

	

	



</script>

<script type="text/javascript">

	function gomain(x)

	{

		

		if(x == 'all')

		{

			window.location.href= '<?php echo site_url('transaction_type/transaction_report');?>';
			

		}

	}

</script>





<div id="con-tabs">

          <ul>

            <li><span style="cursor:pointer;"><?php echo anchor('transaction_type/transaction_report/'.$limit,'Transactions Report','id="sp_1" style="color:#364852;background:#ececec;"'); ?></span></li>

          </ul>

          

          

          					 <?php 				

		   						$CI =& get_instance();	

		   						$base_url = $CI->config->slash_item('base_url_site');

								$base_path = base_path();

							 ?>

             

             

          <div id="text">

            <div id="1">

			

			<table border="0" cellpadding="0" cellspacing="0" width="100%"  height="25" >

			

			<tr> 

            

            <td align="left" valign="top">

            

            <div style="float:left;">

            <table>

            <tr>

            <td align="left" valign="middle"><b>Per Page : </b></td>

            <td align="left" valign="top">

            

            <?php if($search_type=='normal') { ?>

            <select name="limit" id="limit" onchange="getlimit(this.value)" style="width:80px;">

            <?php } if($search_type=='search') { ?>

              <select name="limit" id="limit" onchange="getsearchlimit(this.value)" style="width:80px;">

            <?php } ?>

            <option value="0">Per Page</option>

            <option value="5">5</option>

            <option value="10">10</option>

            <option value="15">15</option>

            <option value="25">25</option>

            <option value="50">50</option>

            <option value="75">75</option>

            <option value="100">100</option>

            

            

            </select>

            </td>

            

             <td align="left" valign="middle">&nbsp;</td>

            

             <td align="left" valign="middle"><b>Search by : </b></td>

            <td align="left" valign="middle">

            

		
					 <?php
						$attributes = array('name'=>'frm_search','id' => 'frm_search','onSubmit'=>'return chk_valid();');
						echo form_open('transaction_type/search_transaction_report/'.$limit,$attributes);
					  ?>

                

                <select name="option" id="option" style="width:100px;" onchange="gomain(this.value)">

                	 <option value="all">All</option>

               		<option value="title" <?php if($option=='title'){?> selected="selected"<?php }?>>Project Title</option>                    

                    <option value="user" <?php if($option=='user'){?> selected="selected"<?php }?>>User</option> 

					<option value="ip" <?php if($option=='ip'){?> selected="selected"<?php }?>>IP</option> 

					<option value="trans" <?php if($option=='trans'){?> selected="selected"<?php }?>>Transaction ID</option> 

					<option value="pay" <?php if($option=='pay'){?> selected="selected"<?php }?>>Payee Email</option> 

				</select>

                

                

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

								if($msg == "delete")

								{

									$msg = "Transaction deleted successfully";

								}

						?>

						<tr>

							<td style="color:#FF0000;"><?php //echo $msg; ?></td>

						</tr>

						<?php	

							}

						?>

						<tr>

                          <td valign="top"><div class="deals" style="display:block;" id="dig_it6">

                              <div id="last_login4">

                                <table width="100%" cellpadding="0" cellspacing="1" bgcolor="#888591">

                                  <tr class="alter">

                                    <th height="30"><strong>No.</strong></th>

									<th><strong>Project</strong></th>

                                    <th><strong>User</strong></th>

                                    <th><strong>Email</strong></th>

									<th><strong>Amount(<?php echo $site_setting['currency_symbol']; ?>)</strong></th>

                                    <th><strong>Earned(<?php echo $site_setting['currency_symbol']; ?>)</strong></th>

									   <th><strong>Transaction ID</strong></th>

									   

                                     <th><strong>Payee Email</strong></th>

                                  <!-- <th><strong>Perk</strong></th>-->

                                    <th><strong>Perk Amount</strong></th>  

                                    <th><strong>IP</strong></th>                         

                                    <th><strong>Date</strong></th>

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

								  <tr onclick="<?php echo $fc; ?>(this);" class="<?php echo $cl; ?>">

                                    <td height="28"><div class="pad-left"><?php echo $i+1; ?></div></td>

                                    <td><div class="pad-left">

									

									 <a href="<?php echo front_base_url().'projects/'.$row->url_project_title.'/'.$row->project_id; ?>" target="_blank">

									<?php echo substr($row->project_title,0,20); ?>

                                    </a>

                                    </div></td>

                                    

                                    <td><div class="pad-left">

                                    

                                    <?php  $donor=$this->transaction_type_model->get_donor_detail($row->user_id); ?>

                                    

                                    <a href="<?php echo front_base_url().'member/'.$row->user_id;?>" target="_blank">

									

									<?php if(isset($donor->user_name)) {  echo $donor->user_name.' '.$donor->last_name; } else { echo "N/A"; } ?></a>

                                    

                                    </div></td>

                                    

                                    

                                     <td><div class="pad-left"><?php if(isset($donor->email)) {  echo $donor->email; } else { echo "N/A"; } ?></div></td>                            

                                    

                                    <td><div class="pad-left"><?php echo set_currency($row->amount); ?></div></td>

                                     <td><div class="pad-left"><?php echo set_currency($row->pay_fee); ?></div></td>

                                              

											  

											  

											  

									<td align="left" valign="middle">

									

									<?php 

									

									if($row->wallet_transaction_id!='') { echo  $row->wallet_transaction_id; }

									elseif($row->amazon_transaction_id!='') { echo  $row->amazon_transaction_id; }

									elseif($row->paypal_paykey!='') { echo  $row->paypal_paykey; }

									elseif($row->preapproval_pay_key!='') { echo  $row->preapproval_pay_key; }

									elseif($row->preapproval_key!='') { echo  $row->preapproval_key; }

									elseif($row->paypal_transaction_id!='') { echo  $row->paypal_transaction_id; } 
									elseif($row->credit_card_transaction_id!='') { echo  $row->credit_card_transaction_id; } 

									else{ echo "N/A"; }

									

									

									

									?>

									</td>

									 <td><div class="pad-left"><?php echo $row->email; ?></div></td>

											                  



                                    

                                     <?php /*?><td><div class="pad-left">

									 <?php if($row->perk_id!='' && $row->perk_id!=0) {

									 

									 

									 $perk=$this->transaction_type_model->get_perk_detail($row->perk_id);

									 

									 if($perk->perk_title!='')

									 {

									 echo $perk->perk_title;

									 } else { echo "N/A"; }

									 

									 

									  } else { echo "N/A";}   ?></div></td><?php */?> 

                                      

                                      

                                      

                                        <td><div class="pad-left">

									 <?php if($row->perk_id!='' && $row->perk_id!=0) {

									 

									 

									 $perk=$this->transaction_type_model->get_perk_detail($row->perk_id);

									 

									 if($perk->perk_amount!='')

									 {

									 echo set_currency($perk->perk_amount);

									 } else {

									 	echo set_currency('0');

									 }

									 

									 

									  } else { echo set_currency('0');}   ?></div></td> 

                                      

                                                                         

                                    

                                    

                                    <td><div class="pad-left"><?php echo $row->host_ip; ?></div></td>                           

                                    <td><div class="pad-left"><?php echo date('d M,Y H:i:s',strtotime($row->transaction_date_time)); ?></div></td>

                                    

								  </tr>

								  <?php

								  			$i++;

										}

									}

								  ?>                                                                   

                                  <tr class="inner-tablebg">

                                    <td colspan="17" valign="top"><table width="100%" border="0" align="left">

                                        <tr class="inner-table">

                                          <td width="50" align="center">&nbsp;</td>

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