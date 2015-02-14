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
  <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#666666">
  <tr>
    <th colspan="7" align="left" valign="top" bgcolor="#DDDDDD" >Notes for Staff from :</th>
  </tr>
  <tr>
    <td colspan="7" bgcolor="#FFFFFF">
	<textarea name="" cols="" rows="" style="width:100%; height:100px;">
	<?php echo $job_model->si_staff_contractor; ?>
	</textarea></td>
  </tr>
  <tr>
    <th colspan="7" align="left" valign="top" bgcolor="#DDDDDD" >Job Notes:</th>
  </tr>
  <tr>
    <td colspan="7" bgcolor="#FFFFFF" height="50">
	<?php foreach($job_services_model as $service) { echo '- '.$service->service_description.'<br/>';  } ?>	
	<br/>
	<?php echo $job_model->job_note; ?>
	</td>
  </tr>
 

  </table>
	
</body>
</html>