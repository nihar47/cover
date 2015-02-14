<div id="headerbar">
	<div class="wrap930">
	
	<!-- dd menu -->	
<div class="login_navl">
					
			
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tr><td align="center" >	
	<div class="project_title_hd" style="padding-top:15px;" >
	
	
	<span style="text-transform:capitalize;color:#2B5F94;font-size:30px;"><?php echo MANAGE_WALLET_BELOW; ?></span>
    
	
	</div>
	</td>
	<td align="right" >	
	
	<div class="project_title_hd" style="padding-top:15px; "  >
	<span id="sddm" style="float:right;"></span>
	</div>

</td></tr></table>

		  </div> 
		      
		<div class="clear"></div>
	</div>
</div>	
<div id="container">
<div class="wrap930" style="padding:15px 0px 20px 0px;">	

<!--side bar user panel-->

<?php //echo $this->load->view('default/dashboard_sidebar'); ?>

<!--side bar user panel-->


<div class="con_left2" style="min-height:0px; width:690px; margin-right:0px;">
			
			
			
		
		
		
		<style type="text/css">

#tab_all a{ color:#000000; text-decoration:none; }

</style>				

<?php
	$data['tab_sel'] = WALLET;
	//$this->load->view('default/dashboard_tabs',$data);

?>


<div class="inner_content" style=" margin-top:11px;padding:12px; ">
		<h3 id="dropmenu2">
		
		<span style="float:left;"><?php  echo WITHDRAWAL_DETAILS;?></span>
		
		
		 <span style="float:right; height:35px;  font-size:12px;">
			  <table border="0" cellpadding="0" cellspacing="0">
			  <tr>
			 
			 <td align="right" valign="top"><?php echo anchor('wallet/my_wallet',MY_WALLET.'('.set_currency($total_wallet_amount).')','style="font-weight:bold; color:#009900;font-size:13px !important;"');?></td>
			   <td width="10">&nbsp;|&nbsp;</td>
			<?php   /*  <td align="right" valign="top"><?php echo anchor('wallet/add_wallet',ADD_WALLET,'style="font-weight:bold; color:#009900;font-size:13px !important;"');?></td>
			   <td width="10">&nbsp;|&nbsp;</td>
	*/	?>	 <td align="right" valign="top"><?php echo anchor('wallet/my_withdraw',MY_WITHDRAW,'style="font-weight:bold; color:#009900;font-size:13px !important;"');?></td>
			
			 
			 
			 </tr>
			 </table>
			 
			 </span>
			 
		</h3>
	
<?php

							$donation_charge=$wallet_setting->wallet_donation_fees;
							
							if($donation_charge==0)
							{
								 $amount_fees = $row->withdraw_amount;
								 $amount_get = $amount - $amount_fees;
							}
							else
							{
								$donation_charge_fee= number_format((($amount*$donation_charge)/100),2);								
								$amount_to_pay = number_format(($amount-$donation_charge_fee),2);
								
								 $amount_fees = $donation_charge_fee;
								 $amount_get = $amount - $amount_fees;
							}		

?>


<table border="0" cellpadding="4" cellspacing="4">

<tr>
<td align="left" valign="middle" class="normal_label"><?php echo AMOUNT_REQUESTED; ?></td>
<td>&nbsp;</td>
<td align="left" valign="top"><?php echo set_currency($amount); ?></td>
</tr>

<tr>
<td align="left" valign="middle" class="normal_label"><?php echo TRANSACTION_FEES; ?></td>
<td>&nbsp;</td>
<td align="left" valign="top"><?php echo set_currency($amount_fees); ?></td>
</tr>

<tr>
<td align="left" valign="middle" class="normal_label"><?php echo YOU_WILL_GET; ?></td>
<td>&nbsp;</td>
<td align="left" valign="top"><?php echo set_currency($amount_get); ?></td>
</tr>


<tr>
<td align="left" valign="top" class="normal_label" style="width:auto;"><?php echo WITHDRAW_METHOD; ?> </td>
<td>&nbsp;</td>
<td align="left" valign="top"> 	
<?php if($withdraw_method=='bank') { ?><?php echo BY_NET_BANKING; ?><?php } 
 if($withdraw_method=='check') { ?><?php echo BY_CHECK; ?> <?php } 
  if($withdraw_method=='gateway') { ?><?php echo BY_PAYMENT_GATEWAY;?><?php } ?>

									
	</td>
	</tr>


</table>






<div id="bank_div" style="display:<?php if($withdraw_method=='bank') { echo "block"; } else { echo "none"; } ?>;">

<div style="font-size:16px; font-weight:bold; padding-top:15px;"><?php echo BANK_DETAIL; ?></div>

<table border="0" cellpadding="4" cellspacing="4">

<tr>
<td align="left" valign="middle" class="normal_label"><?php echo BANK_NAME; ?></td>
<td>&nbsp;</td>
<td align="left" valign="top"><?php echo $bank_name; ?></td>
</tr>


<tr>
<td align="left" valign="middle" class="normal_label"><?php echo ACCOUNT_HOLDER_NAME; ?></td>
<td>&nbsp;</td>
<td align="left" valign="top"><?php echo $bank_account_holder_name; ?></td>
</tr>


<tr>
<td align="left" valign="middle" class="normal_label"><?php echo BANK_ACCOUNT_NUMBER; ?></td>
<td>&nbsp;</td>
<td align="left" valign="top"><?php echo $bank_account_number; ?></td>
</tr>


<tr>
<td align="left" valign="middle" class="normal_label"><?php echo BANK_BRANCH; ?></td>
<td>&nbsp;</td>
<td align="left" valign="top"><?php echo $bank_branch; ?></td>
</tr>



<tr>
<td align="left" valign="middle" class="normal_label"><?php echo BANK_IFSC_CODE; ?></td>
<td>&nbsp;</td>
<td align="left" valign="top"><?php echo $bank_ifsc_code; ?></td>
</tr>


<tr>
<td align="left" valign="middle" class="normal_label"><?php echo BANK_ADDRESS; ?></td>
<td>&nbsp;</td>
<td align="left" valign="top"><?php echo $bank_address; ?></td>
</tr>



<tr>
<td align="left" valign="middle" class="normal_label"><?php echo BANK_CITY;?></td>
<td>&nbsp;</td>
<td align="left" valign="top"><?php echo $bank_city; ?></td>
</tr>


<tr>
<td align="left" valign="middle" class="normal_label"><?php echo BANK_STATE; ?></td>
<td>&nbsp;</td>
<td align="left" valign="top"><?php echo $bank_state; ?></td>
</tr>


<tr>
<td align="left" valign="middle" class="normal_label"><?php echo BANK_COUNTRY; ?></td>
<td>&nbsp;</td>
<td align="left" valign="top"><?php echo $bank_country; ?></td>
</tr>


<tr>
<td align="left" valign="middle" class="normal_label"><?php echo BANK_ZIPCODE;?></td>
<td>&nbsp;</td>
<td align="left" valign="top"><?php echo $bank_zipcode; ?></td>
</tr>

</table>

</div>

<div id="check_div" style="display:<?php if($withdraw_method=='check') { echo "block"; } else { echo "none"; } ?>;">
<div style="font-size:16px; font-weight:bold; padding-top:15px;"><?php echo CHECK_BANK_DETAIL; ?></div>
<table border="0" cellpadding="4" cellspacing="4">

<tr>
<td align="left" valign="middle" class="normal_label"><?php echo BANK_NAME; ?></td>
<td>&nbsp;</td>
<td align="left" valign="top"><?php echo $check_name; ?></td>
</tr>


<tr>
<td align="left" valign="middle" class="normal_label"><?php echo ACCOUNT_HOLDER_NAME; ?></td>
<td>&nbsp;</td>
<td align="left" valign="top"><?php echo $check_account_holder_name; ?></td>
</tr>


<tr>
<td align="left" valign="middle" class="normal_label"><?php echo BANK_ACCOUNT_NUMBER; ?></td>
<td>&nbsp;</td>
<td align="left" valign="top"><?php echo $check_account_number; ?></td>
</tr>


<tr>
<td align="left" valign="middle" class="normal_label"><?php echo BANK_BRANCH; ?></td>
<td>&nbsp;</td>
<td align="left" valign="top"><?php echo $check_branch; ?></td>
</tr>



<tr>
<td align="left" valign="middle" class="normal_label"><?php echo BANK_IFSC_CODE; ?></td>
<td>&nbsp;</td>
<td align="left" valign="top"><?php echo $check_unique_id; ?></td>
</tr>


<tr>
<td align="left" valign="middle" class="normal_label"><?php echo BANK_ADDRESS; ?></td>
<td>&nbsp;</td>
<td align="left" valign="top"><?php echo $check_address; ?></td>
</tr>



<tr>
<td align="left" valign="middle" class="normal_label"><?php echo BANK_CITY;?></td>
<td>&nbsp;</td>
<td align="left" valign="top"><?php echo $check_city; ?></td>
</tr>


<tr>
<td align="left" valign="middle" class="normal_label"><?php echo BANK_STATE; ?></td>
<td>&nbsp;</td>
<td align="left" valign="top"><?php echo $check_state; ?></td>
</tr>


<tr>
<td align="left" valign="middle" class="normal_label"><?php echo BANK_COUNTRY; ?></td>
<td>&nbsp;</td>
<td align="left" valign="top"><?php echo $check_country; ?></td>
</tr>


<tr>
<td align="left" valign="middle" class="normal_label"><?php echo BANK_ZIPCODE;?></td>
<td>&nbsp;</td>
<td align="left" valign="top"><?php echo $check_zipcode; ?></td>
</tr>

</table>
</div>

<div id="gateway_div" style="display:<?php if($withdraw_method=='gateway') { echo "block"; } else { echo "none"; } ?>;">
<div style="font-size:16px; font-weight:bold; padding-top:15px;"><?php echo PAYMENT_GATEWAY_DETAIL; ?></div>
<table border="0" cellpadding="4" cellspacing="4">

<tr>
<td align="left" valign="middle" class="normal_label"><?php echo GATEWAY_NAME; ?></td>
<td>&nbsp;</td>
<td align="left" valign="top"><?php echo $gateway_name; ?></td>
</tr>


<tr>
<td align="left" valign="middle" class="normal_label"><?php echo GATEWAY_ACCOUNT; ?></td>
<td>&nbsp;</td>
<td align="left" valign="top"><?php echo $gateway_account; ?></td>
</tr>



<tr>
<td align="left" valign="middle" class="normal_label"><?php echo GATEWAY_CITY; ?></td>
<td>&nbsp;</td>
<td align="left" valign="top"><?php echo $gateway_city; ?></td>
</tr>


<tr>
<td align="left" valign="middle" class="normal_label"><?php echo GATEWAY_STATE; ?></td>
<td>&nbsp;</td>
<td align="left" valign="top"><?php echo $gateway_state; ?></td>
</tr>


<tr>
<td align="left" valign="middle" class="normal_label"><?php echo GATEWAY_COUNTRY; ?></td>
<td>&nbsp;</td>
<td align="left" valign="top"><?php echo $gateway_country; ?></td>
</tr>


<tr>
<td align="left" valign="middle" class="normal_label"><?php echo GATEWAY_ZIPCODE; ?></td>
<td>&nbsp;</td>
<td align="left" valign="top"><?php echo $gateway_zip; ?></td>
</tr>

</table>

</div>




<div style="clear:both;"></div>
<div style="height:20px;"></div>

 
 
 
 
 		
		</div>


	</div>
			
			
				
				<div class="clear"></div>		

			
	</div>
	<!-- left end ------>
		
       </div>
</div>
</div>       			