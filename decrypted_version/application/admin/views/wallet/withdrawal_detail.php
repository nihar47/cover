<style type="text/css">

.normal_label { font-weight:normal; padding:2px; font-size:14px; font-family:Arial, Helvetica, sans-serif; }



#tdetail {background:#333333; }



#tdetail td {background:#666666; color:#FFFFFF; font-weight:bold; padding:5px; }

#tdetail #desc { padding:5px; background:#FFFFFF; color:#000000; font-weight:normal; }

</style>

			<div style="text-align:center; font-size:18px; font-weight:bold; padding-bottom:25px;"><span>Withdrawal Details</span></div>

			<div class="clear"></div>			



	

	







<table border="0" cellpadding="0" cellspacing="1" id="tdetail">







<tr>

<td align="left" valign="middle" class="normal_label">User</td>



<td align="left" valign="top" id="desc"><?php echo $user_name.' '.$last_name; ?></td>

</tr>





<tr>

<td align="left" valign="middle" class="normal_label">Email</td>



<td align="left" valign="top" id="desc"><?php echo $email; ?></td>

</tr>



<tr>

<td align="left" valign="middle" class="normal_label">Current Amount(<?php echo $site_setting['currency_symbol']; ?>)</td>



<td align="left" valign="top" id="desc"><?php echo set_currency($total_current_amount); ?></td>

</tr>





<tr>

<td align="left" valign="middle" class="normal_label">Withdraw Amount(<?php echo $site_setting['currency_symbol']; ?>)</td>



<td align="left" valign="top" id="desc"><?php echo set_currency($amount); ?></td>

</tr>





<tr>

<td align="left" valign="middle" class="normal_label">Amount To Pay(<?php echo $site_setting['currency_symbol']; ?>)</td>



<td align="left" valign="top" id="desc"><?php

									

							$donation_charge=$wallet_setting->wallet_donation_fees;

							

							if($donation_charge==0)

							{

								 echo set_currency($amount);

							}

							else

							{

								$donation_charge_fee= number_format((($amount*$donation_charge)/100),2);								

								$amount_to_pay = number_format(($amount-$donation_charge_fee),2);
								echo set_currency($amount_to_pay);
							}		

									

									

									 

									  ?></td>

</tr>





<tr>

<td align="left" valign="top" class="normal_label" style="width:auto;">Withdraw Method </td>



<td align="left" valign="top" id="desc"> 	

<?php if($withdraw_method=='bank') { ?>By Net Banking<?php } 

 if($withdraw_method=='check') { ?>By Check <?php } 

  if($withdraw_method=='gateway') { ?>By Payment Gateway<?php } ?>



									

	</td>

	</tr>





</table>













<div id="bank_div" style="display:<?php if($withdraw_method=='bank') { echo "block"; } else { echo "none"; } ?>;">



<div style="font-size:16px; font-weight:bold;padding:15px 0px 15px 0px; color:#333333;">Bank Detail</div>



<table border="0" cellpadding="0" cellspacing="1" id="tdetail">



<tr>

<td align="left" valign="middle" class="normal_label">Bank Name</td>



<td align="left" valign="top" id="desc"><?php echo $bank_name; ?></td>

</tr>





<tr>

<td align="left" valign="middle" class="normal_label">Account Holder Name</td>



<td align="left" valign="top" id="desc"><?php echo $bank_account_holder_name; ?></td>

</tr>





<tr>

<td align="left" valign="middle" class="normal_label">Bank Account Number</td>



<td align="left" valign="top" id="desc"><?php echo $bank_account_number; ?></td>

</tr>





<tr>

<td align="left" valign="middle" class="normal_label">Bank Branch</td>



<td align="left" valign="top" id="desc"><?php echo $bank_branch; ?></td>

</tr>







<tr>

<td align="left" valign="middle" class="normal_label">Bank IFSC Code</td>



<td align="left" valign="top" id="desc"><?php echo $bank_ifsc_code; ?></td>

</tr>





<tr>

<td align="left" valign="middle" class="normal_label">Bank Address</td>



<td align="left" valign="top" id="desc"><?php echo $bank_address; ?></td>

</tr>







<tr>

<td align="left" valign="middle" class="normal_label">Bank City</td>



<td align="left" valign="top" id="desc"><?php echo $bank_city; ?></td>

</tr>





<tr>

<td align="left" valign="middle" class="normal_label">Bank State</td>



<td align="left" valign="top" id="desc"><?php echo $bank_state; ?></td>

</tr>





<tr>

<td align="left" valign="middle" class="normal_label">Bank Country</td>



<td align="left" valign="top" id="desc"><?php echo $bank_country; ?></td>

</tr>





<tr>

<td align="left" valign="middle" class="normal_label">Bank Zipcode</td>



<td align="left" valign="top" id="desc"><?php echo $bank_zipcode; ?></td>

</tr>



</table>



</div>



<div id="check_div" style="display:<?php if($withdraw_method=='check') { echo "block"; } else { echo "none"; } ?>;">

<div style="font-size:16px; font-weight:bold; padding:15px 0px 15px 0px; color:#333333;">Check Bank Detail</div>

<table border="0" cellpadding="0" cellspacing="1" id="tdetail">



<tr>

<td align="left" valign="middle" class="normal_label">Bank Name</td>



<td align="left" valign="top" id="desc"><?php echo $check_name; ?></td>

</tr>





<tr>

<td align="left" valign="middle" class="normal_label">Account Holder Name</td>



<td align="left" valign="top" id="desc"><?php echo $check_account_holder_name; ?></td>

</tr>





<tr>

<td align="left" valign="middle" class="normal_label">Bank Account Number</td>



<td align="left" valign="top" id="desc"><?php echo $check_account_number; ?></td>

</tr>





<tr>

<td align="left" valign="middle" class="normal_label">Bank Branch</td>



<td align="left" valign="top" id="desc"><?php echo $check_branch; ?></td>

</tr>







<tr>

<td align="left" valign="middle" class="normal_label">Bank Unique Code</td>



<td align="left" valign="top" id="desc"><?php echo $check_unique_id; ?></td>

</tr>





<tr>

<td align="left" valign="middle" class="normal_label">Bank Address</td>



<td align="left" valign="top" id="desc"><?php echo $check_address; ?></td>

</tr>







<tr>

<td align="left" valign="middle" class="normal_label">Bank City</td>



<td align="left" valign="top" id="desc"><?php echo $check_city; ?></td>

</tr>





<tr>

<td align="left" valign="middle" class="normal_label">Bank State</td>



<td align="left" valign="top" id="desc"><?php echo $check_state; ?></td>

</tr>





<tr>

<td align="left" valign="middle" class="normal_label">Bank Country</td>



<td align="left" valign="top" id="desc"><?php echo $check_country; ?></td>

</tr>





<tr>

<td align="left" valign="middle" class="normal_label">Bank Zipcode</td>



<td align="left" valign="top" id="desc"><?php echo $check_zipcode; ?></td>

</tr>



</table>

</div>



<div id="gateway_div" style="display:<?php if($withdraw_method=='gateway') { echo "block"; } else { echo "none"; } ?>;">

<div style="font-size:16px; font-weight:bold;  padding:15px 0px 15px 0px; color:#333333;">Payment Gateway Detail</div>

<table border="0" cellpadding="0" cellspacing="1" id="tdetail">



<tr>

<td align="left" valign="middle" class="normal_label">Gateway Name</td>



<td align="left" valign="top" id="desc"><?php echo $gateway_name; ?></td>

</tr>





<tr>

<td align="left" valign="middle" class="normal_label">Gateway Account</td>



<td align="left" valign="top" id="desc"><?php echo $gateway_account; ?></td>

</tr>







<tr>

<td align="left" valign="middle" class="normal_label">Gateway City</td>



<td align="left" valign="top" id="desc"><?php echo $gateway_city; ?></td>

</tr>





<tr>

<td align="left" valign="middle" class="normal_label">Gateway State</td>



<td align="left" valign="top" id="desc"><?php echo $gateway_state; ?></td>

</tr>





<tr>

<td align="left" valign="middle" class="normal_label">Gateway Country</td>



<td align="left" valign="top" id="desc"><?php echo $gateway_country; ?></td>

</tr>





<tr>

<td align="left" valign="middle" class="normal_label">Gateway Zipcode</td>



<td align="left" valign="top" id="desc"><?php echo $gateway_zip; ?></td>

</tr>



</table>



</div>









<div style="clear:both;"></div>

<div style="height:20px;"></div>



  <div style="clear:both;"></div>

				 

		