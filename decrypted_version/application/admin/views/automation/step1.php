<div style="background:#1E2F39;  width:100%; padding:0px; margin:0px;">

<div align="center"><h2 style="color:#FFFFFF;">Adaptive Paypal Setting</h2></div>
         <?php if($error != ""){?>
<div style="text-align:center; color:#f00;" class="msgdisp"><?php echo $error; ?></div>
<?php } ?>	
            
            
            
             <?php
                    $attributes = array('name'=>'frm_paypal');
                    echo form_open('automation/index',$attributes);
                    ?>
				<table width="95%" align="center" border="0" cellpadding="5" cellspacing="5" bgcolor="#FFFFFF">
									

<tr> <td valign="top" align="left" >

<label>Site Status<span>&nbsp;</span></label>

</td><td align="left" valign="top">
<select name="site_status" id="site_status" >
<option value="sandbox" <?php if($site_status=='sandbox'){ echo "selected"; } ?>>sand box</option>
<option value="live" <?php if($site_status=='live'){ echo "selected"; } ?>>live</option>
</select>
</td>
</tr>						

<tr> <td valign="top" align="left" >

<label>Transaction Type<span>&nbsp;</span></label>

</td><td align="left" valign="top">
<select name="preapproval" id="preapproval">
<option value="0" <?php if($preapproval==0){ echo "selected"; } ?>>Instant</option>
<option value="1" <?php if($preapproval==1){ echo "selected"; } ?>>Preapproval</option>
</select>
</td>
</tr>	


<tr>
<td align="left" valign="top">
<label>Paypal Application Id<span>&nbsp;</span></label>
</td><td align="left" valign="top">
<span onMouseOver="show_bg('application_id')" onMouseOut="hide_bg('application_id')">

<input type="text" name="application_id" id="application_id" value="<?php echo $application_id; ?>" onFocus="show_bg('application_id')" onBlur="hide_bg('application_id')" size="25"/>

</span> (ex :: APP-80W284485P519543T)

</td></tr>



<tr>
<td align="left" valign="top">

<label>Paypal API Username<span>&nbsp;</span></label>
</td><td align="left" valign="top">
<span onMouseOver="show_bg('paypal_username')" onMouseOut="hide_bg('paypal_username')">

<input type="text" name="paypal_username" id="paypal_username" value="<?php echo $paypal_username; ?>" onFocus="show_bg('paypal_username')" onBlur="hide_bg('paypal_username')" size="45"/>

</span>
</td></tr>

<tr>
<td align="left" valign="top">

<label>Paypal API Password<span>&nbsp;</span></label>
</td><td align="left" valign="top">
<span onMouseOver="show_bg('paypal_password')" onMouseOut="hide_bg('paypal_password')">

<input type="password" name="paypal_password" id="paypal_password" value="<?php echo $paypal_password; ?>" onFocus="show_bg('paypal_password')" onBlur="hide_bg('paypal_password')" size="45"/>

</span>
</td></tr>


<tr>
<td align="left" valign="top">

<label>Paypal API Signature<span>&nbsp;</span></label>
</td><td align="left" valign="top">
<span onMouseOver="show_bg('paypal_signature')" onMouseOut="hide_bg('paypal_signature')">

<input type="text" name="paypal_signature" id="paypal_signature" value="<?php echo $paypal_signature; ?>" onFocus="show_bg('paypal_signature')" onBlur="hide_bg('paypal_signature')" size="60"/>

</span>
</td>
</tr>


<tr>
                                    
<td align="left" valign="top">
<label>Paypal Email Id<span>&nbsp;</span></label>
</td>
<td align="left" valign="top">
<span onMouseOver="show_bg('paypal_email')" onMouseOut="hide_bg('paypal_email')">

<input type="text" name="paypal_email" id="paypal_email" value="<?php echo $paypal_email; ?>" onFocus="show_bg('paypal_email')" onBlur="hide_bg('paypal_email')" size="45"/>

</span>

</td></tr>



<tr>
<td align="left" valign="top">
<label>User Paypal First Name<span>&nbsp;</span></label>
</td><td align="left" valign="top">
<input type="text" name="paypal_first_name" id="paypal_first_name" value="<?php echo $paypal_first_name; ?>"  size="25"/>
</td></tr>

<tr>
<td align="left" valign="top">
<label>User Paypal Last Name<span>&nbsp;</span></label>
</td><td align="left" valign="top">
<input type="text" name="paypal_last_name" id="paypal_last_name" value="<?php echo $paypal_last_name; ?>"  size="25"/>
</td></tr>





<tr>
<td align="left" valign="top">
<label>Paypal Fees taken from<span>&nbsp;</span></label>
</td>
<td align="left" valign="top">
<select name="fees_taken_from" id="fees_taken_from">
<option value="SENDER" <?php if($fees_taken_from=='SENDER'){ echo "selected"; } ?>>Donor</option>
<option value="PRIMARYRECEIVER" <?php if($fees_taken_from=='PRIMARYRECEIVER'){ echo "selected"; } ?>>Project Owner</option>
</select>
</td>
</tr>










<tr>
<td align="left" valign="top">&nbsp;</td>
<td align="left" valign="top">
<input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />



		<?php if($id==""){  ?>

		<input type="submit" name="submit" value="Next Step" style="  cursor:pointer; " onClick=""/>

<?php }else{  ?>

		<input type="submit" name="submit" value="Next Step" style=" cursor:pointer; " onClick=""/>

	  <?php	}  ?>
										
                                         
     </td></tr>
		

                </table>

           </form>
<div style="clear:both; height:10px;"></div>

</div>