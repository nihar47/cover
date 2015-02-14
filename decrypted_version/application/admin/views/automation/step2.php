<div style="background:#1E2F39;  width:100%; padding:0px; margin:0px;">

<div align="center"><h2 style="color:#FFFFFF;">Select Project For Testing Donation</h2></div>
<?php if($error != ""){?>
<div style="text-align:center; color:#f00;" class="msgdisp"><?php echo $error; ?></div>
<?php } ?>	
   <script type="text/javascript">

function getperks(project_id)
{
	if(project_id=='')
	{
		return false;
	}
	checkverify();
	
		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else if(window.ActiveXObject) {
			try {
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
			} catch (e) {
				try {
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (e) {
					xmlhttp = false;
				}
			}
		}
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById('showperk').innerHTML= xmlhttp.responseText;
				getallcity();
			}
		}
		
		var url = '<?php echo site_url('automation/ajaxperks'); ?>/'+project_id;
		
		xmlhttp.open("GET",url,true);
		xmlhttp.send(null);
	
}

 function checkverify()
 {
 	var sel=document.getElementById("project_id");
	var title=sel.options[sel.selectedIndex].title;
	var label=sel.options[sel.selectedIndex].label;
	
	

	if(title=='' || title==0 || title==undefined)
	{
		title='';
		document.getElementById("showverify").style.display='block';
		document.getElementById("msgverify").innerHTML='<p style="color:#FF0000";>Project Owner have not verify Paypal Account. Please enter Paypal Account detail below and Verify.</p>';
	}
	else
	{
		document.getElementById("showverify").style.display='none';
		document.getElementById("msgverify").innerHTML='<p style="color:#009900";>Project Owner have already verify Paypal Account. Please submit button and continue.</p>';
	}
	
	document.getElementById("user_id").value=label;
	document.getElementById("paypal_verified").value=title;
 
 }
 </script>        
            
            
             <?php
                    $attributes = array('name'=>'frm_paypal');
                    echo form_open('automation/step2',$attributes);
                    ?>
<table width="95%" align="center" border="0" cellpadding="5" cellspacing="5" bgcolor="#FFFFFF">
									

<tr> <td valign="top" align="left" >

<label>Select Project For Test<span>&nbsp;</span></label>

</td><td align="left" valign="top">
<select name="project_id" id="project_id" onChange="getperks(this.value)">
<option value="">----Projects----</option>
<?php if($projects) { 
		foreach($projects as $prj) { ?>
<option title="<?php echo $prj->paypal_verified;?>" label="<?php echo $prj->user_id;?>" value="<?php echo $prj->project_id; ?>" <?php if($project_id==$prj->project_id){ echo "selected"; } ?>><?php echo ucwords($prj->project_title).' [ '.ucwords($prj->user_name.' '.$prj->last_name).']'; ?></option>
<?php } } ?>
</select>
</td>
</tr>	


<tr> <td valign="top" align="left" >

<label>Enter Donate Amount Or Select Perk<span>&nbsp;</span></label>

</td><td align="left" valign="top">

<div id="showamount" style="float:left;">
<input type="text" name="donate_amount" id="donate_amount" value="<?php echo $donate_amount; ?>" />
</div>
<div style="float:left;padding-left:10px;">----OR----</div>
<div id="showperk" style="float:left; padding-left:10px;">
<?php if($project_id>0) { 

$perks=$this->project_category_model->get_all_perks($project_id);
?>

<select name="perk_id" id="perk_id" >
<option value="">----Perks----</option>
<?php  if($perks) {  
 foreach($perks as $prk) { ?>
<option value="<?php echo $prk['perk_id']; ?>" <?php if($perk_id==$prk['perk_id']){ echo "selected"; } ?>><?php echo ucwords($prk['perk_title']).' [ '.$site_setting['currency_symbol'].$prk['perk_amount'].']'; ?></option>
<?php }  }  ?>
</select>
              
<?php } else { ?>
<select name="perk_id" id="perk_id" >
<option value="">----Perks----</option>
</select>
<?php } ?>
</div>
</td>
</tr>	


</table>

<table width="95%" align="center" border="0" cellpadding="5" cellspacing="5" bgcolor="#FFFFFF">

<tr>
<td align="left" valign="top"><div id="msgverify"><?php if($user_id>0 && $paypal_verified!=1){?><p style="color:#FF0000";>Project Owner have not verify Paypal Account. Please enter Paypal Account detail below and Verify.</p><?php } ?></div></td></tr></table>

<div id="showverify" style="display:<?php if($paypal_verified==1 && $user_id>0){?>none<?php } elseif($user_id>0){?>block<?php } else { ?>none<?php } ?>;">
<table width="95%" align="center" border="0" cellpadding="5" cellspacing="5" bgcolor="#FFFFFF">

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
<label>User Paypal A/C Email<span>&nbsp;</span></label>
</td><td align="left" valign="top">
<input type="text" name="paypal_email" id="paypal_email" value="<?php echo $paypal_email; ?>"  size="25"/>
</td></tr>
</table>

</div>
	
<table width="95%" align="center" border="0" cellpadding="5" cellspacing="5" bgcolor="#FFFFFF">
<tr>
<td align="left" valign="top">&nbsp;</td>
<td align="left" valign="top"><input type="submit" name="submit" value="Next Step" style=" cursor:pointer; "/> 
<input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id; ?>" />  
<input type="hidden" name="paypal_verified" id="paypal_verified" value="<?php echo $paypal_verified; ?>" />                     
     </td></tr>
</table>

           </form>
<div style="clear:both; height:10px;"></div>

</div>