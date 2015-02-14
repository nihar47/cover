<div id="headerbar">
  <div class="wrap930">
    <!-- dd menu -->
    <div class="login_navl">
      <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
          <td align="left" ><div class="project_title_hd" style="padding-top:15px;" > <span style="text-transform:capitalize;color:#2B5F94;font-size:17px;"><?php echo MANAGE_YOUR_ACCOUNT_BELOW; ?></span> </div></td>
          <td align="right" ><div class="project_title_hd" style="padding-top:15px; "  > <span id="sddm" style="float:right;"></span> </div></td>
        </tr>
      </table>
    </div>
    <div class="clear"></div>
  </div>
</div>
<div id="container">
  <div class="wrap930" style="padding:15px 0px 20px 0px;">
    <!--side bar user panel-->
    <?php echo $this->load->view('default/dashboard_sidebar'); ?>
    <!--side bar user panel-->
    <div class="con_left2" style="min-height:0px; width:690px; margin-right:0px;">
      <style type="text/css">

#tab_all a{ color:#000000; text-decoration:none; }

</style>
      <?php
	$data['tab_sel'] = WALLET;
	$this->load->view('default/dashboard_tabs',$data);

?>
      <div class="inner_content" style=" margin-top:11px;padding:12px; ">
        <h3 id="dropmenu2"> <span style="float:left;"><?php echo WITHDRAW_AMOUNT; ?></span> <span style="float:right; height:35px;  font-size:12px;">
          <table border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td align="right" valign="top"><?php echo anchor('wallet/my_wallet',MY_WALLET.'('.set_currency($total_wallet_amount).')','style="font-weight:bold; color:#009900;font-size:13px !important;"');?></td>
              <td width="10">&nbsp;|&nbsp;</td>
              <td align="right" valign="top"><?php echo anchor('wallet/add_wallet',ADD_WALLET,'style="font-weight:bold; color:#009900;font-size:13px !important;"');?></td>
              <td width="10">&nbsp;|&nbsp;</td>
              <td align="right" valign="top"><?php echo anchor('wallet/my_withdraw',MY_WITHDRAWAL,'style="font-weight:bold; color:#009900;font-size:13px !important;"');?></td>
            </tr>
          </table>
          </span> </h3>
        <style type="text/css">
			.error p { color:#FF0000; }
			</style>
        <?php if($error!='') { ?>
        <div style="clear:both; margin-top:20px;"></div>
        <div align="left" class="error"> <?php echo $error; ?></div>
        <div style="clear:both; margin-top:20px;"></div>
        <?php } ?>
        <?php
				  		$attributes = array('name'=>'frm_withdrawwallet');
						echo form_open_multipart('wallet/withdraw_wallet',$attributes);
					
				  	?>
        <div style="padding:25px 0px 25px 0px;"><b style="color:#FF0000;"><?php echo NOTE; ?> : </b>
          <?PHP  printf(WALLET_WITHDRAW_HEADER_TEXT,$wallet_setting->wallet_donation_fees,set_currency($wallet_setting->wallet_minimum_amount)); ?>
        </div>
        <script type="text/javascript">
function change_div_method(str)
{
	if(str=='bank')
	{
		document.getElementById('bank_div').style.display='block';
		document.getElementById('check_div').style.display='none';
		document.getElementById('gateway_div').style.display='none';
	}
	if(str=='check')
	{
		document.getElementById('check_div').style.display='block';
		document.getElementById('bank_div').style.display='none';
		document.getElementById('gateway_div').style.display='none';
	}
	if(str=='gateway')
	{
		document.getElementById('gateway_div').style.display='block';
		document.getElementById('bank_div').style.display='none';
		document.getElementById('check_div').style.display='none';
	}
	
}
</script>
        <script>
function confirm_add(){
	var amt = document.getElementById('amount').value;
	
	if(amt=='' || amt=='0'){
		alert('<?php echo PLEASE_ENTER_AMOUNT; ?>');
	}
	else{
	document.getElementById('add_button').innerHTML='';
	
	document.getElementById('con_button').style.display='block';
	
	var fees = '<?php echo $wallet_setting->wallet_donation_fees; ?>';
	
	var net = parseFloat(amt)*parseFloat(fees)/100;
	var total = parseFloat(amt) - parseFloat(net);
	
	document.getElementById('total_amount').innerHTML=amt;
	document.getElementById('fees_amount').innerHTML=net.toFixed(2);
	document.getElementById('get_amount').innerHTML=total.toFixed(2);
	}
}

function go_to_add(){
	window.location.href='<?php echo site_url('wallet/my_wallet');?>';
}


function reset_form(){
	document.getElementById('add_button').innerHTML='<input type="button" class="submit" style="cursor:pointer;" value="<?php echo SUBMIT; ?>" name="submit" id="submit" onclick="confirm_add();" />';
	document.getElementById('con_button').style.display='none';
}
</script>
        <table border="0" cellpadding="4" cellspacing="4">
          <tr>
            <td align="left" valign="middle" class="normal_label"><?php echo WITHDRAW_AMOUNT; ?>(<?php echo $site_setting['currency_symbol'];?>)</td>
            <td>&nbsp;</td>
            <td align="left" valign="top"><input type="text" class="btn_input" name="amount" id="amount" value="<?php echo $amount; ?>" onkeyup="reset_form();" /></td>
          </tr>
          <tr>
            <td align="left" valign="top" class="normal_label" style="width:auto;"><?php echo WITHDRAW_METHOD; ?> </td>
            <td>&nbsp;</td>
            <td align="left" valign="top"><p>
                <input type="radio" name="withdraw_method" id="withdraw_method" value="bank" <?php if($withdraw_method=='bank') { ?> checked="checked" <?php } ?> onClick="change_div_method(this.value)" />
                <?php echo BY_NET_BANKING; ?>&nbsp;&nbsp;&nbsp;
                <input type="radio" name="withdraw_method" id="withdraw_method" value="check" <?php if($withdraw_method=='check') { ?> checked="checked" <?php } ?> onClick="change_div_method(this.value)" />
                <?php  echo BY_CHECK ;?>
                &nbsp;&nbsp;&nbsp;
                <input type="radio" name="withdraw_method" id="withdraw_method" value="gateway" <?php if($withdraw_method=='gateway') { ?> checked="checked" <?php } ?> onClick="change_div_method(this.value)" />
                <?php echo BY_PAYMENT_GATEWAY; ?> </p></td>
          </tr>
        </table>
        <div id="bank_div" style="display:<?php if($withdraw_method=='bank') { echo "block"; } else { echo "none"; } ?>;">
          <div style="font-size:16px; font-weight:bold; padding-top:15px;"><?php echo BANK_DETAIL; ?></div>
          <table border="0" cellpadding="4" cellspacing="4">
            <tr>
              <td align="left" valign="middle" class="normal_label"><?php echo BANK_NAME; ?></td>
              <td>&nbsp;</td>
              <td align="left" valign="top"><input type="text" class="btn_input" name="bank_name" id="bank_name" value="<?php echo $bank_name; ?>" /></td>
            </tr>
            <tr>
              <td align="left" valign="middle" class="normal_label"><?php echo ACCOUNT_HOLDER_NAME; ?></td>
              <td>&nbsp;</td>
              <td align="left" valign="top"><input type="text" class="btn_input" name="bank_account_holder_name" id="bank_account_holder_name" value="<?php echo $bank_account_holder_name; ?>" /></td>
            </tr>
            <tr>
              <td align="left" valign="middle" class="normal_label"><?php echo BANK_ACCOUNT_NUMBER; ?></td>
              <td>&nbsp;</td>
              <td align="left" valign="top"><input type="text" class="btn_input" name="bank_account_number" id="bank_account_number" value="<?php echo $bank_account_number; ?>" /></td>
            </tr>
            <tr>
              <td align="left" valign="middle" class="normal_label"><?php echo BANK_BRANCH; ?></td>
              <td>&nbsp;</td>
              <td align="left" valign="top"><input type="text" class="btn_input" name="bank_branch" id="bank_branch" value="<?php echo $bank_branch; ?>" /></td>
            </tr>
            <tr>
              <td align="left" valign="middle" class="normal_label"><?php echo BANK_IFSC_CODE; ?></td>
              <td>&nbsp;</td>
              <td align="left" valign="top"><input type="text" class="btn_input" name="bank_ifsc_code" id="bank_ifsc_code" value="<?php echo $bank_ifsc_code; ?>" /></td>
            </tr>
            <tr>
              <td align="left" valign="middle" class="normal_label"><?php echo BANK_ADDRESS; ?></td>
              <td>&nbsp;</td>
              <td align="left" valign="top"><input type="text" class="btn_input" name="bank_address" id="bank_address" value="<?php echo $bank_address; ?>" /></td>
            </tr>
            <tr>
              <td align="left" valign="middle" class="normal_label"><?php echo BANK_CITY;?></td>
              <td>&nbsp;</td>
              <td align="left" valign="top"><input type="text" class="btn_input" name="bank_city" id="bank_city" value="<?php echo $bank_city; ?>" /></td>
            </tr>
            <tr>
              <td align="left" valign="middle" class="normal_label"><?php echo BANK_STATE; ?></td>
              <td>&nbsp;</td>
              <td align="left" valign="top"><input type="text" class="btn_input" name="bank_state" id="bank_state" value="<?php echo $bank_state; ?>" /></td>
            </tr>
            <tr>
              <td align="left" valign="middle" class="normal_label"><?php echo BANK_COUNTRY; ?></td>
              <td>&nbsp;</td>
              <td align="left" valign="top"><input type="text" class="btn_input" name="bank_country" id="bank_country" value="<?php echo $bank_country; ?>" /></td>
            </tr>
            <tr>
              <td align="left" valign="middle" class="normal_label"><?php echo BANK_ZIPCODE;?></td>
              <td>&nbsp;</td>
              <td align="left" valign="top"><input type="text" class="btn_input" name="bank_zipcode" id="bank_zipcode" value="<?php echo $bank_zipcode; ?>" /></td>
            </tr>
          </table>
        </div>
        <div id="check_div" style="display:<?php if($withdraw_method=='check') { echo "block"; } else { echo "none"; } ?>;">
          <div style="font-size:16px; font-weight:bold; padding-top:15px;"><?php echo CHECK_BANK_DETAIL; ?></div>
          <table border="0" cellpadding="4" cellspacing="4">
            <tr>
              <td align="left" valign="middle" class="normal_label"><?php echo BANK_NAME; ?></td>
              <td>&nbsp;</td>
              <td align="left" valign="top"><input type="text" class="btn_input" name="check_name" id="check_name" value="<?php echo $check_name; ?>" /></td>
            </tr>
            <tr>
              <td align="left" valign="middle" class="normal_label"><?php echo ACCOUNT_HOLDER_NAME; ?></td>
              <td>&nbsp;</td>
              <td align="left" valign="top"><input type="text" class="btn_input" name="check_account_holder_name" id="check_account_holder_name" value="<?php echo $check_account_holder_name; ?>" /></td>
            </tr>
            <tr>
              <td align="left" valign="middle" class="normal_label"><?php echo BANK_ACCOUNT_NUMBER; ?></td>
              <td>&nbsp;</td>
              <td align="left" valign="top"><input type="text" class="btn_input" name="check_account_number" id="check_account_number" value="<?php echo $check_account_number; ?>" /></td>
            </tr>
            <tr>
              <td align="left" valign="middle" class="normal_label"><?php echo BANK_BRANCH; ?></td>
              <td>&nbsp;</td>
              <td align="left" valign="top"><input type="text" class="btn_input" name="check_branch" id="check_branch" value="<?php echo $check_branch; ?>" /></td>
            </tr>
            <tr>
              <td align="left" valign="middle" class="normal_label"><?php echo BANK_IFSC_CODE; ?></td>
              <td>&nbsp;</td>
              <td align="left" valign="top"><input type="text" class="btn_input" name="check_unique_id" id="check_unique_id" value="<?php echo $check_unique_id; ?>" /></td>
            </tr>
            <tr>
              <td align="left" valign="middle" class="normal_label"><?php echo BANK_ADDRESS; ?></td>
              <td>&nbsp;</td>
              <td align="left" valign="top"><input type="text" class="btn_input" name="check_address" id="check_address" value="<?php echo $check_address; ?>" /></td>
            </tr>
            <tr>
              <td align="left" valign="middle" class="normal_label"><?php echo BANK_CITY;?></td>
              <td>&nbsp;</td>
              <td align="left" valign="top"><input type="text" class="btn_input" name="check_city" id="check_city" value="<?php echo $check_city; ?>" /></td>
            </tr>
            <tr>
              <td align="left" valign="middle" class="normal_label"><?php echo BANK_STATE; ?></td>
              <td>&nbsp;</td>
              <td align="left" valign="top"><input type="text" class="btn_input" name="check_state" id="check_state" value="<?php echo $check_state; ?>" /></td>
            </tr>
            <tr>
              <td align="left" valign="middle" class="normal_label"><?php echo BANK_COUNTRY; ?></td>
              <td>&nbsp;</td>
              <td align="left" valign="top"><input type="text" class="btn_input" name="check_country" id="check_country" value="<?php echo $check_country; ?>" /></td>
            </tr>
            <tr>
              <td align="left" valign="middle" class="normal_label"><?php echo BANK_ZIPCODE;?></td>
              <td>&nbsp;</td>
              <td align="left" valign="top"><input type="text" class="btn_input" name="check_zipcode" id="check_zipcode" value="<?php echo $check_zipcode; ?>" /></td>
            </tr>
          </table>
        </div>
        <div id="gateway_div" style="display:<?php if($withdraw_method=='gateway') { echo "block"; } else { echo "none"; } ?>;">
          <div style="font-size:16px; font-weight:bold; padding-top:15px;"><?php echo PAYMENT_GATEWAY_DETAIL; ?></div>
          <table border="0" cellpadding="4" cellspacing="4">
            <tr>
              <td align="left" valign="middle" class="normal_label"><?php echo GATEWAY_NAME; ?></td>
              <td>&nbsp;</td>
              <td align="left" valign="top"><input type="text" class="btn_input" name="gateway_name" id="gateway_name" value="<?php echo $gateway_name; ?>" /></td>
            </tr>
            <tr>
              <td align="left" valign="middle" class="normal_label"><?php echo GATEWAY_ACCOUNT; ?></td>
              <td>&nbsp;</td>
              <td align="left" valign="top"><input type="text" class="btn_input" name="gateway_account" id="gateway_account" value="<?php echo $gateway_account; ?>" /></td>
            </tr>
            <tr>
              <td align="left" valign="middle" class="normal_label"><?php echo GATEWAY_CITY; ?></td>
              <td>&nbsp;</td>
              <td align="left" valign="top"><input type="text" class="btn_input" name="gateway_city" id="gateway_city" value="<?php echo $gateway_city; ?>" /></td>
            </tr>
            <tr>
              <td align="left" valign="middle" class="normal_label"><?php echo GATEWAY_STATE; ?></td>
              <td>&nbsp;</td>
              <td align="left" valign="top"><input type="text" class="btn_input" name="gateway_state" id="gateway_state" value="<?php echo $gateway_state; ?>" /></td>
            </tr>
            <tr>
              <td align="left" valign="middle" class="normal_label"><?php echo GATEWAY_COUNTRY; ?></td>
              <td>&nbsp;</td>
              <td align="left" valign="top"><input type="text" class="btn_input" name="gateway_country" id="gateway_country" value="<?php echo $gateway_country; ?>" /></td>
            </tr>
            <tr>
              <td align="left" valign="middle" class="normal_label"><?php echo GATEWAY_ZIPCODE; ?></td>
              <td>&nbsp;</td>
              <td align="left" valign="top"><input type="text" class="btn_input" name="gateway_zip" id="gateway_zip" value="<?php echo $gateway_zip; ?>" /></td>
            </tr>
          </table>
        </div>
        <div style="clear:both;"></div>
        <div style="height:20px;"></div>
        <div align="center" style="margin-left:140px;">
          <input type="hidden" name="withdraw_id" id="withdraw_id" value="<?php echo $withdraw_id; ?>" />
          <div id="add_button">
            <?php if($withdraw_id > 0){ } else{ ?>
            <input type="button" class="submit" style="cursor:pointer;" value="<?php echo SUBMIT; ?>" name="submit" id="submit" onclick="confirm_add();" />
            <?php } ?>
          </div>
        </div>
        <div style="clear:both;"></div>
        <div id="con_button" <?php if($withdraw_id > 0){ echo 'style="display:block;"';  }else{ echo 'style="display:none;"'; } ?>>
          <h3 id="dropmenu2"> <span style="float:left;">Withdraw Details</span>
            <?php
$fees_t = $amount * $wallet_setting->wallet_add_fees/100;
$get_u = $amount - $fees_t;

?>
          </h3>
          <br />
          <table border="0" cellpadding="0" cellspacing="0"  width="50%" align="center">
            <tr>
              <td align="left" valign="top" class="normal_label" width="165"><?php echo AMOUNT_REQUESTED; ?> (<?php echo $site_setting['currency_symbol']; ?>)</td>
              <td>&nbsp;</td>
              <td><span id="total_amount"><?php echo $amount; ?></span></td>
            </tr>
            <tr>
              <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
              <td align="left" valign="top" class="normal_label" width="165"><?php echo TRANSACTION_FEES; ?> (<?php echo $site_setting['currency_symbol']; ?>)</td>
              <td>&nbsp;</td>
              <td><span id="fees_amount"><?php echo $fees_t; ?></span></td>
            </tr>
            <tr>
              <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
              <td align="left" valign="top" class="normal_label" width="165"><?php echo YOU_WILL_GET; ?> (<?php echo $site_setting['currency_symbol']; ?>)</td>
              <td>&nbsp;</td>
              <td><span id="get_amount"><?php echo $get_u; ?></span></td>
            </tr>
            <tr>
              <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
              <td align="left" valign="top"><input type="submit" class="submit" style="cursor:pointer;" value="<?php echo CONFIRM; ?>" name="submit" id="submit" />
              </td>
              <td>&nbsp;</td>
              <td align="left" valign="top"><input type="button" class="submit" style="cursor:pointer;" value="<?php echo CANCEL; ?>"  onclick="go_to_add();" />
              </td>
            </tr>
          </table>
        </div>
        </form>
        <div style="clear:both;"></div>
      </div>
    </div>
    <div class="clear"></div>
  </div>
  <!-- left end ------>
</div>
</div>
</div>
