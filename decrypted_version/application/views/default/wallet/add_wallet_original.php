<div id="headerbar">
  <div class="wrap930">
    <!-- dd menu -->
    <div class="login_navl">
      <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
          <td align="left" ><div class="project_title_hd" style="padding-top:15px;" > <span style="text-transform:capitalize;color:#2B5F94;font-size:17px;"><?php echo MANAGE_WALLET_BELOW; ?></span> </div></td>
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
        <h3 id="dropmenu2"> <span style="float:left;"><?php echo ADD_AMOUNT_TO_YOUR_WALLET; ?></span> <span style="float:right; height:35px;  font-size:12px;">
          <table border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td align="right" valign="top"><?php echo anchor('wallet/my_wallet', ADD_WALLET.'('.set_currency($total_wallet_amount).')','style="font-weight:bold; color:#009900;font-size:13px !important;"');?></td>
              <td width="10">&nbsp;|&nbsp;</td>
              <td align="right" valign="top"><?php echo anchor('wallet/my_withdraw',MY_WITHDRAWAL,'style="font-weight:bold; color:#009900;font-size:13px !important;"');?></td>
              <?php if($total_wallet_amount>$wallet_setting->wallet_minimum_amount) { ?>
              <td width="10">&nbsp;|&nbsp;</td>
              <td align="right" valign="top"><?php echo anchor('wallet/withdraw_wallet',WITHDRAW_AMOUNT,'style="font-size:13px !important; color:#009900;"');?></td>
              <?php } ?>
            </tr>
          </table>
          </span> </h3>
        <?php if($error!='') { ?>
        <div style="clear:both; margin-top:20px;"></div>
        <div align="center" class="error" style="text-align:center;"> <?php echo $error; ?></div>
        <?php } ?>
        <?php
				  		$attributes = array('name'=>'frm_wallet');
						echo form_open_multipart('wallet/add_wallet/',$attributes);
					
				  	?>
        <div style="padding:25px 0px 25px 0px; clear:both;"><b style="color:#FF0000;"><?php echo NOTE;?> : </b> <?php printf(WALLET_ADD_AMOUNT_NOTE,$wallet_setting->wallet_add_fees,set_currency($wallet_setting->wallet_minimum_amount)); ?> </div>
        <table border="0" cellpadding="4" cellspacing="4">
          <tr>
            <td align="left" valign="top" class="normal_label" width="115"><?php echo ADD_AMOUNT; ?>(
              <?php  echo $site_setting['currency_symbol']; ?>
              )</td>
            <td>&nbsp;</td>
            <td align="left" valign="top"><input type="text" class="btn_input" name="credit" id="credit" value="<?php echo $credit ;?>" />
              <br />
              <p style="color:#FF0000; padding-top:5px;"> <?php echo FOR_PAYPAL_USER_RETURN_TIP;?></p></td>
          </tr>
          <tr>
            <td align="left" valign="top" class="normal_label" style="width:auto;"><?php echo GATEWAY; ?> </td>
            <td>&nbsp;</td>
            <td align="left" valign="top"><?php	
	
		if($payment)
		{
			$i=0;
			foreach($payment as $row)
			{
				?>
              <p>
                <input type="radio" name="gateway_type" id="gateway_type" value="<?php echo $row->id; ?>" <?php if($gateway_type==$row->id) { ?> checked="checked" <?php } ?> />
                <?php echo $row->name; ?></p>
              <?php
			}
		}
		
		?>
            </td>
          </tr>
          <tr>
            <td colspan="2">&nbsp;</td>
            <td align="left" valign="top" id="add_button"><input type="submit" class="submit" style="cursor:pointer;" value="<?php echo ADD; ?>" name="submit" id="submit" />
            </td>
          </tr>
        </table>
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
