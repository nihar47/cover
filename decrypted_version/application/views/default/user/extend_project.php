<div id="page_we">
	<div class="project_head" style="margin-bottom:5px;">
		<div class="step_cont_top">
				<h2>Extend project for One Month!!!</h2>
				<p> You will need to pay $100 in order to extend project duration one month further so that you can still try harder to bring your project in reality</p>
			</div><div class="clr"></div>
      </div>
<?php if($success){ ?>
	<div style="color:#0C3" id="success-msg"><?php echo $success; ?></div>
<?php	}?>
   <?php if($error != "")
				{ ?>
        <div class="error" style="height:auto; margin:4px 0px 0px 0px;">
          <ul>
         <li>   <?php echo $error; ?></li>
          </ul>
        </div>
        <?php } ?>
<?php
			$attributes = array('id'=>'frm_project','name'=>'frm_project');
			echo form_open_multipart('user/extend_project/'.$id, $attributes);
	  ?>

	<div class="inner_content_two">
            <input type="hidden" value="credit" id="gateway" name="gateway">
                        <style type="text/css">

					#creditcarderror p{ color:#f00; font-size:11px; padding-bottom:12px; line-height:0px; }

					</style>
      <div style="display:none;" id="creditcarderror">&nbsp;</div>
      <div class="form-element-container">
        <table cellspacing="5" cellpadding="0" border="0">
          <tbody><tr>
            <td valign="middle" align="left"><label class="normal_label">&nbsp;<?php echo CREDIT_CARD_STORE_NUMBER; ?> : *</label></td>
            <td valign="top" align="left"><input type="text" class="btn_input" value="<?php echo $cardnumber; ?>" id="cardnumber" name="cardnumber"></td>
          </tr>
          <tr>
            <td valign="middle" align="left"><label class="normal_label"><?php echo CREDIT_CARD_VERFICATION_NUMBER; ?> : *</label></td>
            <td valign="top" align="left"><input type="text" class="btn_input" value="<?php echo $cvv2Number; ?>" id="cvv2Number" name="cvv2Number"></td>
          </tr>
          <tr>
            <td valign="middle" align="left"><label class="normal_label"><?php echo CREDIT_CARD_TYPE; ?> : *</label></td>
            <td valign="top" align="left"><select style="padding:0px;" class="btn_input" id="cardtype" name="cardtype">
               <option value='Visa' <?php if($cardtype=='Visa') { ?> selected <?php } ?>><?php echo VISA; ?></option>
                <option value='MasterCard'  <?php if($cardtype=='MasterCard') { ?> selected <?php } ?>><?php echo MASTERCARD; ?></option>
                <option value='Discover'  <?php if($cardtype=='Discover') { ?> selected <?php } ?>><?php echo DISCOVER; ?></option>
                <option value='Amex'  <?php if($cardtype=='Amex') { ?> selected <?php } ?>><?php echo AMEX; ?></option>
              </select></td>
          </tr>
          <tr>
            <td valign="middle" align="left"><label class="normal_label"><?php echo CREDIT_CARD_EXPIRY_DATE; ?>  : *</label></td>
            <td valign="top" align="left"><div style="float:left;">Month<br>
                <select style="padding:0px; width:42px;" class="btn_input" id="card_expiration_month" name="card_expiration_month">
              <option value="1" <?php if($card_expiration_month==1) { ?> selected <?php } ?>>1</option>
                  <option value="2"  <?php if($card_expiration_month==2) { ?> selected <?php } ?>>2</option>
                  <option value="3"  <?php if($card_expiration_month==3) { ?> selected <?php } ?>>3</option>
                  <option value="4"  <?php if($card_expiration_month==4) { ?> selected <?php } ?>>4</option>
                  <option value="5"  <?php if($card_expiration_month==5) { ?> selected <?php } ?>>5</option>
                  <option value="6"  <?php if($card_expiration_month==6) { ?> selected <?php } ?>>6</option>
                  <option value="7"  <?php if($card_expiration_month==7) { ?> selected <?php } ?>>7</option>
                  <option value="8"  <?php if($card_expiration_month==8) { ?> selected <?php } ?>>8</option>
                  <option value="9"  <?php if($card_expiration_month==9) { ?> selected <?php } ?>>9</option>
                  <option value="10"  <?php if($card_expiration_month==10) { ?> selected <?php } ?>>10</option>
                  <option value="11"  <?php if($card_expiration_month==11) { ?> selected <?php } ?>>11</option>
                  <option value="12"  <?php if($card_expiration_month==12) { ?> selected <?php } ?>>12</option>
                </select>
              </div>
              <div style="float:left; padding:0px 0px 0px 10px;"> Year<br>
                <select style="padding:0px; width:60px;" class="btn_input" id="card_expiration_year" name="card_expiration_year">
                                 <?php for($i=date('Y');$i<=date('Y')+7;$i++) 

                            { ?>
                  <option value="<?php echo $i;?>" <?php if($card_expiration_year==$i) { ?> selected <?php } ?>><?php echo $i;?></option>
                  <?php } ?>
                                  </select>
              </div></td>
          </tr>
          <tr>
            <td valign="middle" align="left"><label class="normal_label"><?php echo CREDIT_CARD_FIRST_NAME; ?> : *</label></td>
            <td valign="top" align="left"><input type="text" class="btn_input" value="<?php if($login_user['user_name']!='') { echo $login_user['user_name']; } else { echo $card_first_name; } ?>" id="card_first_name" name="card_first_name"></td>
          </tr>
          <tr>
            <td valign="middle" align="left"><label class="normal_label"><?php echo CREDIT_CARD_LAST_NAME; ?> : *</label></td>
            <td valign="top" align="left"><input type="text" class="btn_input" value="<?php if($login_user['last_name']!='') { echo $login_user['last_name']; } else { echo $card_last_name; } ?>" id="card_last_name" name="card_last_name"></td>
          </tr>
          <tr>
            <td valign="middle" align="left"><label class="normal_label"><?php echo CREDIT_CARD_ADDRESS; ?> : *</label></td>
            <td valign="top" align="left"><textarea type="text" id="card_address" name="card_address" size="38" class="btn_input"><?php if($login_user['address']!='') { echo $login_user['address']; } else { echo $card_address; } ?> </textarea>
              </td>
          </tr>
          <tr>
            <td valign="middle" align="left"><label class="normal_label"><?php echo CREDIT_CARD_CITY ;?> : *</label></td>
            <td valign="top" align="left"><input type="text" value=" <?php if($login_user['city']!='') { echo $login_user['city']; } else { echo $card_city; }?>" id="card_city" name="card_city" size="25" class="btn_input">
              </td>
          </tr>
          <tr>
            <td valign="middle" align="left"><label class="normal_label"><?php echo CREDIT_CARD_STATE ;?>  : *</label></td>
            <td valign="top" align="left"><input type="text" value="<?php if($login_user['state']!='') { echo $login_user['state']; } else { echo $card_state; } ?>"  id="card_state" name="card_state" size="15" class="btn_input">
              </td>
          </tr>
          <tr>
            <td valign="middle" align="left"><label class="normal_label"><?php echo CREDIT_CARD_ZIPCODE ;?> : *</label></td>
            <td valign="top" align="left"><input type="text" value="<?php if($login_user['zip_code']!='') { echo $login_user['zip_code']; } else { echo $card_zipcode; } ?>" id="card_zipcode" name="card_zipcode" size="17" class="btn_input">
              </td>
          </tr>
        </tbody></table>
        <div style="clear:both;"></div>
      </div>
            
      <a id="various1" href="javascript:" class="cboxElement" original-title="">&nbsp;</a>
      <div>
  <!--      <input type="submit" onclick="return return_set_wallet_details();" value="<?php echo CONTRIBUTE; ?>" id="add" name="add" value="contribute" class="remindanchor" />-->
      </div>
      <div style="margin-left:150px;" class="form-element-container">
        <input type="hidden" value="do_comment" id="docomment" name="docomment">
        <input type="hidden" value="0" id="perk_id" name="perk_id">
        <input type="hidden" value="<?php echo $id?>" id="project_id" name="project_id">
        <input type="hidden" value="0" id="perk_amount" name="perk_amount">
        <input type="hidden" value="100" id="amount" name="amount">
        <input type="hidden" value="" id="email" name="email">
      </div>
      <div style="clear:both;"></div>
    </div>		
	<input type="submit" value="Pay & Submit" name="payment" id="payment" class="stepbtn"> 
      </div>