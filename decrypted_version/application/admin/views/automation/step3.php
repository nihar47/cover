<div style="background:#1E2F39;  width:100%; padding:0px; margin:0px;">

<div align="center"><h2 style="color:#FFFFFF;">Select Donar User For making Donation</h2></div>
<?php if($error != ""){?>
<div style="text-align:center; color:#f00;" class="msgdisp"><?php echo $error; ?></div>
<?php } ?>	

            
            
             <?php
                    $attributes = array('name'=>'frm_paypal');
                    echo form_open('automation/step3',$attributes);
                    ?>
<table width="95%" align="center" border="0" cellpadding="5" cellspacing="5" bgcolor="#FFFFFF">
									

<tr> <td valign="top" align="left" >

<label>Select Donar User<span>&nbsp;</span></label>

</td><td align="left" valign="top">
<select name="user_id" id="user_id">
<option value="">----Users----</option>
<?php if($users) { 
		foreach($users as $usr) { 		
			if($usr->user_id!=$project_owner_id) {		
		?>
<option  value="<?php echo $usr->user_id; ?>" <?php if($user_id==$usr->user_id){ echo "selected"; } ?>><?php echo ucwords($usr->user_name.' '.$usr->last_name).' [ '.$usr->email.']'; ?></option>
<?php } } } ?>
</select>
</td>
</tr>	

<tr>
<td align="left" valign="top">&nbsp;</td>
<td align="left" valign="top"><input type="submit" name="submit" value="Test Now" style=" cursor:pointer; "/> 
  
     </td></tr>
     
     
     <tr><td colspan="2" align="left" valign="top" style="padding-top:30px;">
     
     <b style="color:#FF0000; font-size:16px;">NOTE : </b>Before proceed to next step Please login to Paypal Account Otherwise you need come back again and do all the process once again.<br /><br />

For Sandbox Test : <a href="http://developer.paypal.com/" target="_blank">developer.paypal.com</a><br />
For Live Test : <a href="https://www.paypal.com/">www.paypal.com</a>
     
     </td></tr>
     
</table>

           </form>
<div style="clear:both; height:10px;"></div>

</div>