<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
table{ font-family:sans-serif; font-size:12px; border-collapse:collapse;  border:#666666 solid 1px;}
table td{ font-family:sans-serif; font-size:12px; padding:4px; border-collapse:collapse;  border:#666666 solid 1px;}
table th{ font-family:sans-serif; font-size:14px; padding:4px; border-collapse:collapse; border:#666666 solid 1px;}
</style>
</head>

<body>
	<?php $path = Yii::app()->basePath.'/../uploads/quote-building-service/';	?>
	<?php foreach($job_services_model as $service_row) { ?>
	
	<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#666666">

	<?php if(isset($service_row->image) && $service_row->image !=NULL && file_exists($path.$service_row->image))	 { ?>
	<tr>
    <td align="center"  colspan="7" bgcolor="#FFFFFF">
    <img  src="<?php echo Yii::app()->getBaseUrl(true)."/uploads/quote-building-service/".$service_row->image; ?>" />
	</td>
	</tr>
	
	<tr>
    <th colspan="7" align="left" valign="top" bgcolor="#DDDDDD" ><?php echo strtoupper($service_row->service_description); ?></th>
	</tr>
	
	<?php } ?>
	
	
	
	</table>

	
	<?php } ?>
	    

</body>
</html>