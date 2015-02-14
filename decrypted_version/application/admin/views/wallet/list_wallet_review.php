<script type="text/javascript">



function setchecked(elemName,status){

	elem = document.getElementsByName(elemName);

	for(i=0;i<elem.length;i++){

		elem[i].checked=status;

	}

}



function setaction(elename, actionval, actionmsg, formname) {

	vchkcnt=0;

	elem = document.getElementsByName(elename);

	

	for(i=0;i<elem.length;i++){

		if(elem[i].checked) vchkcnt++;	

	}

	if(vchkcnt==0) {

		alert('Please select a record')

	} else {

		

		if(confirm(actionmsg))

		{

			document.getElementById('action').value=actionval;	

			document.getElementById(formname).submit();

		}		

		

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









<div id="con-tabs">

          <ul>

              <?php  $check_wallet_setting=$this->home_model->get_rights('add_wallet_setting');

		 		$check_payment_gateway=$this->home_model->get_rights('list_payment_gateway');

				$check_wallet_review=$this->home_model->get_rights('list_wallet_review');

				$check_wallet_withdraw=$this->home_model->get_rights('list_wallet_withdraw');

				$check_gateway_detail=$this->home_model->get_rights('list_gateway_detail');

				$set_fund=$this->home_model->get_rights('set_fund');

				

		

			if($check_wallet_setting==1) {		?>	   

		   

		     <li><span style="cursor:pointer;"><?php echo anchor('wallet_setting/add_wallet_setting','Wallet Setting'); ?></span></li>

			 

			 <?php } if($check_gateway_detail==1 || $check_payment_gateway==1) { ?> 

			<!-- <li><span style="cursor:pointer;"><?php echo anchor('payments_gateways/list_payment_gateway','Payment Gateways'); ?></span></li>      --> 

			 <?php } if($check_wallet_review==1) { ?>			 

			    <li><span style="cursor:pointer;"><?php echo anchor('wallet/list_wallet_review','Wallet Review','id="sp_1" style="color:#364852;background:#ececec;"'); ?></span></li>

			  <?php } if($check_wallet_withdraw==1) { ?>

			  <li><span style="cursor:pointer;"><?php echo anchor('wallet/list_wallet_withdraw','Withdraw Request'); ?></span></li>

			  

			  

			  <?php }  if($set_fund==1) { ?>

			  <li><span style="cursor:pointer;"><?php echo anchor('set_fund/serch_user','Fund'); ?></span></li>

			  

			  

			  <?php } ?> 

          </ul>

          <div id="text">

            <div id="1">

            

        

             <?php $CI =& get_instance();	$base_url = $CI->config->slash_item('base_url_site');

											$base_path = base_path();

			 ?>

          

            

            

            

            <?php if($msg!='') { 

            

			if($msg=='delete') { ?><div align="center" class="msgdisp">Record(s) has been deleted Successfully.</div> 

            

            <?php }  if($msg=='confirm') { ?> <div align="center" class="msgdisp">Record has been confirmed Successfully.</div> 

            

            <?php }  if($msg=='review') { ?> <div align="center" class="msgdisp">Record has been reviewd Successfully.</div> 

            

            <?php }  } ?>

            

            

            

			<div style="clear:both; height:25px;">

            

         <table border="0" cellpadding="0" cellspacing="0" width="100%"  height="25" >

			

			<tr> 

            

            <td align="left" valign="top">

            

            <div style="float:left;">

            <table>

            <tr>

                       

             <td align="left" valign="middle"><b>Search by : </b></td>

            <td align="left" valign="middle">

            

            
			 <?php
				$attributes = array('name'=>'frm_search','id' => 'frm_search');
				echo form_open('wallet/search_walletreview/',$attributes);
			  ?>
							

                <select name="option" id="option" style="width:100px;">

               		<option value="user_name">User Name</option>                    

                    <option value="email">User Email</option>   

					<option value="wallet_payee_email">Payee Email</option>

					<option value="wallet_transaction_id">TransactionID</option> 

					<option value="admin_status">Status</option> 

					<option value="wallet_ip">Wallet IP</option>                

					

                </select>

                

                

                <input type="text" name="keyword" id="keyword" value="" />                

                <input type="submit" name="submit" id="submit" value="GO" />

                

                </form> 

            

            

            </td>

            

            

            

            </tr>

            </table>

            </div>

            

            </td>

            

                    

            

            

            <td align="right" valign="top">

                  <?php
	$attributes = array('name'=>'frm_listproject','id'=>'frm_listproject');
			
	echo form_open_multipart('wallet/action_review/',$attributes);
	?>
        

             

           

           

           <input type="hidden" name="offset" id="offset" value="<?php echo $offset; ?>" />

           <input type="hidden" name="action" id="action" />

            

            <div style="float:right;"> 

            <table>

            <tr>

            

            

            

        

          <td align="right" valign="top">

             <img src="<?php echo base_url();?>images/deletes.png" border="0" />&nbsp;&nbsp;

            </td>

            <td align="right" valign="middle">

        <a href="javascript:void(0)"  onclick="setaction('chk[]','delete', 'Are you sure, you want to delete selected record(s)?', 'frm_listproject')" style="text-decoration:none;color:#000000;font-size:16px; font-weight:bold;" > Delete</a>

        </td>

        

         <td width="1"></td>

        

          <td align="right" valign="top">

             <img src="<?php echo base_url();?>images/tick.png" border="0" />&nbsp;&nbsp;

            </td>

            <td align="right" valign="middle">

        <a href="javascript:void(0)"  onclick="setaction('chk[]','confirm', 'Are you sure, you want to confirm selected record(s)?', 'frm_listproject')" style="text-decoration:none;color:#000000;font-size:16px; font-weight:bold;" >Confirm</a>

        </td>

        

        

         <td width="1"></td>

        

          <td align="right" valign="top">

             <img src="<?php echo base_url();?>images/delete.png" border="0" />&nbsp;&nbsp;

            </td>

            <td align="right" valign="middle">

        <a href="javascript:void(0)"  onclick="setaction('chk[]','review', 'Are you sure, you want to review selected record(s)?', 'frm_listproject')" style="text-decoration:none;color:#000000;font-size:16px; font-weight:bold;" >Review</a>

        </td>

        

        

        

        

        

        

        </tr></table>

        

        </div>

        

        <div style="clear:both;"></div>

        

        </td>

            

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

                    <td align="left" valign="top">

                    

                    

                    <table align="left" width="100%" border="0" bgcolor="#FFFFFF">

						<tr>

							<td align="left" valign="top">   

                            

                            

                            <div style="float:left;"> 

                  <a href="javascript:void(0)" onclick="javascript:setchecked('chk[]',1)" style="color:#000;"><?php echo "Check All"; ?></a>&nbsp; |&nbsp; 

           <a href="javascript:void(0)" onclick="javascript:setchecked('chk[]',0)" style="color:#000;"><?php echo "Clear All"; ?></a>

                     

            </div>

           <div style="clear:both;"></div> </td>    

           

						</tr>

                        

                        

                        

						<tr>

                          <td valign="top"><div class="deals" style="display:block;" id="dig_it6">

                              <div id="last_login4" style="width:100%;overflow-x:auto;overflow-y:hidden;">

                                <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#888591">

                                  <tr class="alter">

                                  <th>&nbsp;</th>

									<th height="30"><strong>User Name</strong></th>

									<th ><strong>Email</strong></th>

									<th><strong>Amount Added(<?php echo $site_setting['currency_symbol']; ?>)</strong></th> 

									<th><strong>Transaction ID</strong></th> 

									<th><strong>Gateway</strong></th> 

									<th><strong>Payee Email</strong></th>									

									<th><strong>IP</strong></th> 

									<th><strong>Status</strong></th> 									 

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

								  <tr onClick="<?php echo $fc; ?>(this);" class="<?php echo $cl; ?>">

                                  

                         <td align="center" valign="middle"><input type="checkbox" name="chk[]" id="chk" value="<?php echo $row->id;?>" /></td>

								    <td height="28"><div class="pad-left"><a href="<?php echo front_base_url().'member/'.$row->user_id; ?>" target="_blank"><?php echo $row->user_name.' '.$row->last_name; ?></a></div></td>

									

                                    <td ><div class="pad-left"><?php echo $row->email; ?></div></td>

									<td ><div class="pad-left"><?php echo set_currency($row->debit); ?></div></td>

									<td><div class="pad-left"><?php echo $row->wallet_transaction_id; ?></div></td>

									<td><div class="pad-left"><?php 

									

									if($row->gateway_id==0 || $row->gateway_id=='0') { echo "Internal"; } else {

									

									$gateway=$this->wallet_model->get_gateway_name($row->gateway_id); echo $gateway->name;

									} ?></div></td>

                                   

									<td><div class="pad-left"><?php echo $row->wallet_payee_email; ?></div></td>

									

										<td><div class="pad-left"><?php echo $row->wallet_ip; ?></div></td>

										

							

                                  

                                    

                                    

                                    <td align="center"><div align="center">

									

									

									<?php if($row->admin_status=='Confirm'){ ?>

                                    

                                     <img src="<?php echo base_url();?>images/tick.png" border="0" />

                                    

                                    <?php }	if($row->admin_status=='Review'){ ?>

									

									

									<img src="<?php echo base_url();?>images/delete.png" border="0" />

									

									<?php }	?>

									

									</div></td>

									

                                    <td align="center"><?php echo date('d,M Y H:i:s', strtotime($row->wallet_date)); ?></td>																

									                                    

                                    

                                    

                                  </tr>

								  <?php

								  			$i++;

										}

									}

								  ?>                                                                   

                                  <tr class="inner-tablebg">

                                    <td colspan="12" valign="top"><table  border="0" align="center">

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