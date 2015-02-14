<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
.table_main {
	border:none;
}
.table_main td, .table_main th {
	border:none;
}
.table_main label  {
	text-align:right; width:50%; float:left;
}
.table_main span  {
	text-align:left; width:50%; float:right;
}
.table_main .left_head{ font-family:sans-serif; font-size:18px;}
table {
	font-family:sans-serif;
	font-size:12px;
	border-collapse:collapse;
	border:#000000 solid 1px; color:#000000;
}
table a{ color:#000000;}
table td {
	font-family:sans-serif;
	font-size:12px;
	padding:4px;
	border-collapse:collapse;
	border:#000000 solid 1px;
}
table th {
	font-family:sans-serif;
	font-size:14px;
	padding:4px;
	border-collapse:collapse;
	border:#000000 solid 1px;
}
</style>
</head>

<body>
<table bgcolor="ffffff" width="100%" border="0" cellspacing="0" cellpadding="0" align="center" class="table_main">
  <tr>
    <td align="left" valign="top" class="left_head" width="33%"><strong>High Clean Pty. Ltd.<br>
      ABN: 45 631 025 732</strong></td>
    <td style="border:none; padding:0; background:#ffffff" bgcolor="ffffff" align="center" valign="bottom"><img style="border:none; outline:none; height:105px; width:105px;  background:#ffffff;" src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/pdf_logo_high.png" /><br />
      <h4 style="font-weight:normal" class="left_head"><em>Just Clean It</em></h4></td>
    <td align="right" valign="top" class="left_head" width="33%"><strong>QUOTATION</strong></td>
  </tr>
  <tr>
    <td colspan="3" height="20">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top">High Clean Pty Ltd<br>
      1/ 92 Railway Street South<br>
      Altona, VIC<br>
      P: 03 8398 0804 F: 03 8398 0899<br>
      E: <a href="mailto:mikhil.kotak@highclean.com.au" target="_blank">mikhil.kotak@highclean.com.au</a></td>
    <td align="right" valign="top" colspan="2">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_main">
  <tr>
    <td align="right">Quote No:</td>
    <td><?php echo $job_model->id; ?></td>
  </tr>
  <tr>
    <td align="right">Date:</td>
    <td><?php if($job_model->job_started_date != '0000-00-00' )  { 
	echo date("d-m-Y", strtotime($job_model->job_started_date)); 
	} else { 
	echo date("d-m-Y", strtotime($quote_model->quote_date)); 
	}
	?></td>
  </tr>
  <tr>
    <td align="right">QUOTATION VALID FOR:</td>
    <td>30 Days from Above Date</td>
  </tr>
  
</table>
</td>
  </tr>

<tr> <td colspan="3" height="20"></td></tr>

  <tr>
  
	  <td colspan="3"  align="left" valign="top">
	
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_main">
	<tr>
	<td align="left" valign="top">To :</td>
	<td style="width:20%">&nbsp;</td>
	<td align="left" valign="top">  Attention: <?php echo $contact_model->first_name.' '.$contact_model->surname ; ?><br>
      <?php echo $company_model->name; ?><br>
      <?php echo $contact_model->address.','.$contact_model->suburb.','.$contact_model->state.' '.$contact_model->postcode; ?><br>
      E: <a href="mailto:<?php echo $contact_model->email; ?>" target="_blank"><?php echo $contact_model->email; ?></a><br>
      M: <?php echo $contact_model->mobile; ?>  
	</td>
	<td>&nbsp;</td>
	
	
	</tr>
	</table>
	
	</td>
	
	  </td>
	  
	</tr>
  
  
   <tr> <td colspan="3" height="20"></td></tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="middle" bgcolor="#DDDDDD"><strong>JOB LOCATION</strong></td>
  </tr>
  <tr>
    <td align="center" valign="middle"><?php echo $site_model->site_name.' - '.$site_model->address . ', ' . $site_model->suburb. ', ' . $site_model->state. ' ' . $site_model->postcode; ?></td>
  </tr>
  
</table>
<br />
<br />

<?php $sub_total = 0 ; ?>
<table style="border:none;" width="100%" border="0" cellspacing="1" bgcolor="#ccc" cellpadding="0">
  <tr>
    <td  width="10%" align="center" valign="middle" bgcolor="#DDDDDD"><strong>QUANTITY</strong></td>
    <td  width="70%" align="center" valign="middle" bgcolor="#DDDDDD"><strong>DESCRIPTION</strong></td>
    <td  width="10%" align="center" valign="middle" bgcolor="#DDDDDD"><strong>UNIT PRICE</strong></td>
    <td  width="10%" align="center" valign="middle" bgcolor="#DDDDDD"><strong>AMOUNT</strong></td>
  </tr>
  
  <?php  foreach($job_services_model as $job_service_row) { ?>
  
  <tr>
    <td bgcolor="#ffffff"><strong><?php echo $job_service_row->quantity ; ?></strong></td>
    <td bgcolor="#ffffff"><strong><?php echo $job_service_row->service_description ; ?></strong></td>
    <td bgcolor="#ffffff"><strong><?php echo '$'.$job_service_row->unit_price_rate ; ?></strong></td>
    <td bgcolor="#ffffff"><strong><?php echo '$'.$job_service_row->total ; ?></strong></td>
	<?php $sub_total = $sub_total + $job_service_row->total; ?>
  </tr>
    
	<?php if(! empty($job_service_row->notes) && $job_service_row->notes != null) { ?>
  <tr>
    <td bgcolor="#ffffff">&nbsp;</td>
    <td bgcolor="#ffffff"><!--Note:--><?php echo $job_service_row->notes ; ?></td>
    <td bgcolor="#ffffff">&nbsp;</td>
    <td bgcolor="#ffffff">&nbsp;</td>
  </tr>
  <?php } ?>
  
  <?php } ?>
  
  	
  <?php if(! empty($job_model->job_note)  && $job_model->job_note != null) { ?>   
  <tr>
    <td bgcolor="#ffffff">&nbsp;</td>
    <td bgcolor="#ffffff"><strong>Special Notes:</td>
    <td bgcolor="#ffffff">&nbsp;</td>
    <td bgcolor="#ffffff">&nbsp;</td>
  </tr>  
  
    <?php if(! empty($job_model->si_client)  &&  $job_model->si_client != null) { ?>   
  <tr>
    <td bgcolor="#ffffff">&nbsp;</td>
    <td bgcolor="#ffffff" height="50" valign="top" align="left"><?php echo $job_model->si_client ; ?></td>
    <td bgcolor="#ffffff">&nbsp;</td>
    <td bgcolor="#ffffff">&nbsp;</td>
  </tr>
  <?php } ?>
  
  
  <!--<tr>
    <td bgcolor="#ffffff">&nbsp;</td>
    <td bgcolor="#ffffff"><?php echo $job_model->job_note ; ?></td>
    <td bgcolor="#ffffff">&nbsp;</td>
    <td bgcolor="#ffffff">&nbsp;</td>
  </tr>
  <?php } ?>-->
  
  <!--

  
  <?php if(! empty($job_model->si_staff_contractor) &&  $job_model->si_staff_contractor != null) { ?>
  <tr>
    <td bgcolor="#ffffff">&nbsp;</td>
    <td bgcolor="#ffffff">Special Instruction for STAFF/CONTRACTOR:<?php echo $job_model->si_staff_contractor ; ?></td>
    <td bgcolor="#ffffff">&nbsp;</td>
    <td bgcolor="#ffffff">&nbsp;</td>
  </tr>
  <?php } ?>
   
   -->

   

			  
			  <tr style="margin-left:-1px;">
				<td bgcolor="#ffffff" style="border:none;" colspan="3" align="right"><strong>Subtotal</strong></td>
				<td bgcolor="#ffffff"><strong><?php echo '$'.$sub_total; ?></strong></td>
			  </tr>
			 
			  
			  <?php if($job_model->discount > 0 ) { ?>
			  <tr>
				<td bgcolor="#ffffff" style="border:none;" colspan="3" align="right"><strong>Discount</strong></td>
				<td bgcolor="#ffffff"><strong><?php echo $job_model->discount.'%'; ?></strong></td>
			  </tr>
			  <?php } ?>
			  
			  <?php $including_gst = $job_model->final_total * (10/100); ?>
			  
			  <tr>
				<td bgcolor="#ffffff" style="border:none;" colspan="3" align="right"><strong>G.S.T</strong></td>
				<td bgcolor="#ffffff"><strong><?php echo '$'.$including_gst; ?></strong></td>
			  </tr>
			  
			  <tr>
			   <td bgcolor="#ffffff" style="border:none;" align="left" valign="bottom" colspan="2">Quote Prepared By: <strong><big>Mikhil Kotak</big></strong></td>
				<td bgcolor="#ffffff" style="border:none;" align="right"><strong>Total</strong></td>
				<?php $quote_total = $job_model->final_total + $including_gst; ?>
				<td bgcolor="#ffffff"><strong><?php echo '$'.$quote_total; ?></strong></td>
			  </tr>
			  
			  
  
  
  
  
</table>


<div class="clear"></div>



</body>
</html>