<div id="headerbar">
  <div class="wrap930">
    <!-- dd menu -->
    <div class="login_navl">
      <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
          <td align="left" ><div class="project_title_hd" style="padding-top:15px;" > <span style="text-transform:capitalize;color:#2B5F94;font-size:17px;"><?php echo AFFILIATE_REQUEST; ?></span> </div></td>
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
	$data['select']=$select;

	$this->load->view('default/affiliate/tab',$data);

?>
      <div class="inner_content" style=" margin-top:11px;padding:12px; ">
       
       
       <?php if($allow_withdraw_request==1) { ?>
       
       
       
       
        <h3 id="dropmenu2"> <span style="float:left;"><?php echo AFFILIATE_ADD_REQUEST; ?></span> <span style="float:right; height:35px;  font-size:12px;">
          <table border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td align="right" valign="top"><?php echo anchor('affiliate/withdrawal_requests',AFFILIATE_WITHDRAWAL_REQUESTS,'style="font-weight:bold; color:#009900;font-size:13px !important;"');?></td>
              
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
				  		$attributes = array('name'=>'frm_affiliatewithdrawrequest');
						echo form_open_multipart('affiliate/add_request',$attributes);
					
				  	?>
        <div style="padding:25px 0px 25px 0px;"><b style="color:#FF0000;"><?php echo NOTE; ?> : </b>
          <?php
		  	if($affiliate_setting->fee_type=='amount')
			{
				$fee_type=$site_setting['currency_symbol'];
			}
			else
			{	
				$fee_type='&#37;';
			}
			
		    printf(AFFILIATE_WITHDRAW_HEADER_TEXT,$affiliate_setting->transaction_fee,$fee_type,set_currency($affiliate_setting->minimum_withdrawal_threshold)); ?>
        </div>
        
        <script>
function confirm_add(){
	var amt = document.getElementById('amount').value;
	
	if(amt=='' || amt=='0'){
		alert('<?php echo PLEASE_ENTER_AMOUNT; ?>');
	}
	else{
	document.getElementById('add_button').innerHTML='';
	
	document.getElementById('con_button').style.display='block';
	
	var fees = '<?php echo $affiliate_setting->transaction_fee; ?>';
	
	 <?php if($affiliate_setting->fee_type=='amount') { ?>
	 var net =parseFloat(fees);
	var total = parseFloat(amt) - parseFloat(net);
	 <?php } else { ?>
	var net = parseFloat(amt)*parseFloat(fees)/100;
	var total = parseFloat(amt) - parseFloat(net);
	<?php  } ?>
	
	document.getElementById('total_amount').innerHTML=amt;
	document.getElementById('fees_amount').innerHTML=net.toFixed(2);
	document.getElementById('get_amount').innerHTML=total.toFixed(2);
	}
}

function go_to_add(){
	window.location.href='<?php echo site_url('affiliate/withdrawal_requests');?>';
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
          
        </table>
        
        
       
        <div style="clear:both;"></div>
        <div style="height:20px;"></div>
        <div align="center" style="margin-left:140px;">
        
          <div id="add_button">
           
            <input type="button" class="submit" style="cursor:pointer;" value="<?php echo SUBMIT; ?>" name="submit" id="submit" onclick="confirm_add();" />
           
          </div>
        </div>
        <div style="clear:both;"></div>
        <div id="con_button" style="display:none;">
          <h3 id="dropmenu2"> <span style="float:left;"><?php echo WITHDRAW_DETAILS;?></span>
          
          </h3>
          <br />
          <table border="0" cellpadding="0" cellspacing="0"  width="50%" align="center">
            <tr>
              <td align="left" valign="top" class="normal_label" width="150"><?php echo AMOUNT_REQUESTED; ?> (<?php echo $site_setting['currency_symbol']; ?>)</td>
              <td>&nbsp;</td>
              <td><span id="total_amount">0</span></td>
            </tr>
            <tr>
              <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
              <td align="left" valign="top" class="normal_label" width="125"><?php echo TRANSACTION_FEES; ?> (<?php echo $site_setting['currency_symbol']; ?>)</td>
              <td>&nbsp;</td>
              <td><span id="fees_amount">0</span></td>
            </tr>
            <tr>
              <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
              <td align="left" valign="top" class="normal_label" width="125"><?php echo YOU_WILL_GET; ?> (<?php echo $site_setting['currency_symbol']; ?>)</td>
              <td>&nbsp;</td>
              <td><span id="get_amount">0</span></td>
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
     
     
     <?php } else { ?>
     
     
    	<b> <?php echo YOU_DID_NOT_HAVE_EARN_ENOUGH_AMOUNT_FOR_WITHDRAWAL_REQUEST;?> <?php echo set_currency($total_earn_amount); ?></b>
     
     <?php } ?>
     
     
     
     
     
      </div>
    </div>
    <div class="clear"></div>
  </div>
  
  
 
 
  
  <!-- left end ------>
</div>
</div>
</div>
