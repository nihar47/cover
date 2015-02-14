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
<?php $connection = Yii::app()->db; ?>
<?php
 
	$sql = "SELECT min(`pick_up_van`) as job_start_time FROM `hc_job_staff` WHERE `job_id`=$job_model->id and job_date in (SELECT MIN(job_date)
                 FROM `hc_job_staff`
                 WHERE `job_id`=$job_model->id)"; 
	$sResult = $connection->createCommand($sql)->queryRow();
	
	
	$sql2 = "SELECT max(`return_to_office`) as job_end_time FROM `hc_job_staff` WHERE `job_id`=$job_model->id and job_date in (SELECT MAX(job_date)
                 FROM `hc_job_staff`
                 WHERE `job_id`=$job_model->id)"; 
	$sResult2 = $connection->createCommand($sql2)->queryRow();
	
	$startDay =''; $endDay ='';
	if($job_model->job_started_date != '0000-00-00' ) {
			$timestamp = strtotime($job_model->job_started_date);
			$startDay = date('D', $timestamp);
			
			}
	
	if($job_model->job_end_date != '0000-00-00' ) {
	$timestamp = strtotime($job_model->job_end_date);
	$endDay = date('D', $timestamp);
	}		
	
	$supervisor_array = array() ; $supervisor_array_string = '';
	foreach($supervisor as $user) { $supervisor_array[] = $user->name.' '; } 
	if(count($supervisor_array) > 0 ) $supervisor_array_string = implode(', ',$supervisor_array);
	
	
	$siteSupervisor_array = array() ; $siteSupervisor_array_str ='';
	foreach($siteSupervisor as $user) { $siteSupervisor_array[] = $user->name.' '; } 
	if(count($siteSupervisor_array) > 0 ) $siteSupervisor_array_str = implode(', ',$siteSupervisor_array);


	$staffUser_array = array() ; $unique_staffUser_array = array(); $unique_staffUser_array_str = '';
	foreach($staffUser as $user) { $staffUser_array[] = $user->name; } 
	$staff_count = 1;
	$staffUser_array = array_unique($staffUser_array);
	
	if(count($staffUser_array > 0 )) {
	foreach($staffUser_array as $user_name) { $unique_staffUser_array[] = $user_name; /*"<strong> Staff-$staff_count: </strong>".$user_name;*/ $staff_count++; } 
	if(count($unique_staffUser_array) > 0 ) $unique_staffUser_array_str = implode(', ',$unique_staffUser_array);
	}
	
	$toolTypes_array = array(); $toolTypes_array_str = '';
	$toolTypes = explode(',',$job_model->tool_types_ids);
	foreach($toolTypes as $tool_id) {
	$toolTypes_array[] = ListToolsType::Model()->FindByPk($tool_id)->name;
	}
	if(count($toolTypes_array) > 0)
	$toolTypes_array_str = implode(', ',$toolTypes_array);
			
	
	?>

<h1 align="center">JOB SHEET</h1>
<p align="center"><img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/pdf_logo_high.png" /></p>
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#666666">
  <tr>
    <th colspan="7" align="left" valign="top" bgcolor="#DDDDDD" >Job Details</th>
  </tr>
  <tr>
    <td rowspan="2" bgcolor="#FFFFFF"><strong>Dates of work:</strong></td>
    <td bgcolor="#FFFFFF"><strong>Start Date:</strong></td>
    <td bgcolor="#FFFFFF"><?php  if($job_model->job_started_date != '0000-00-00' ) echo date("d-m-Y", strtotime($job_model->job_started_date)); ?></td>
    <td bgcolor="#FFFFFF"><strong>Start-Time:</strong></td>
	<td bgcolor="#FFFFFF"><?php if(isset($sResult['job_start_time'])) echo $sResult['job_start_time']; ?></td>
	<td bgcolor="#FFFFFF"><strong>Day:</strong></td>
    <td bgcolor="#FFFFFF"><?php echo $startDay;	?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><strong>End Date:</strong></td>
    <td bgcolor="#FFFFFF"><?php if($job_model->job_end_date != '0000-00-00' ) echo date("d-m-Y", strtotime($job_model->job_end_date)); ?></td>
    <td bgcolor="#FFFFFF"><strong>End-Time:</strong></td>
	<td bgcolor="#FFFFFF"><?php if(isset($sResult2['job_end_time'])) echo $sResult2['job_end_time']; ?></td>
    <td bgcolor="#FFFFFF"><strong>Day:</strong></td>
    <td bgcolor="#FFFFFF"><?php echo $endDay; ?></td>
  </tr>
   <tr>
    <td bgcolor="#FFFFFF"  rowspan="2" ><strong>Staff</strong></td>
    <td bgcolor="#FFFFFF"><strong>Supervisor:</strong></td>
	<td bgcolor="#FFFFFF"><?php echo $supervisor_array_string;	?></td>
	
	<td bgcolor="#FFFFFF" colspan="2"><strong>Site Supervisor:</strong></td>
	<td bgcolor="#FFFFFF" colspan="2"><?php echo $siteSupervisor_array_str; ?></td>
	
  </tr>
  
  <tr>
  <td bgcolor="#FFFFFF" ><strong>Staff : </strong></td>
  <td bgcolor="#FFFFFF" colspan="5" valign="top"><?php echo $unique_staffUser_array_str;	?></td>
  </tr>
  
  <tr>
    <td bgcolor="#FFFFFF"><strong>Site Name:</strong></td>
    <td colspan="6" bgcolor="#FFFFFF"><strong><?php echo $site_model->site_name ; ?></strong></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><strong>Site Address:</strong></td>
    <td colspan="6" bgcolor="#FFFFFF">
	<strong><?php echo $site_model->address . ', ' . $site_model->suburb. ', ' . $site_model->state. ' ' . $site_model->postcode; ?></strong>
	</td>
  </tr>
  
  <tr>
    <td bgcolor="#FFFFFF"><strong>Building</strong>:</td>
    <td colspan="2" bgcolor="#FFFFFF"><?php echo $building_model->building_name ; ?></td>
	<td colspan="2" bgcolor="#FFFFFF"><strong>OC/ BC Ref #</strong></td>
    <td colspan="2" bgcolor="#FFFFFF"><?php echo $building_model->building_no ; ?></td>
  </tr>
  
  <tr>
    <td bgcolor="#FFFFFF"><strong>Site Contact:</strong></td>
    <td colspan="2" bgcolor="#FFFFFF"><?php echo $site_model->site_contact ; ?></td>
    <td bgcolor="#FFFFFF"><strong>P:</strong></td>
    <td bgcolor="#FFFFFF"><?php echo $site_model->phone ; ?></td>
    <td bgcolor="#FFFFFF"><strong>M:</strong></td>
    <td bgcolor="#FFFFFF"><?php echo $site_model->mobile ; ?></td>
  </tr>
  
  <tr>
    <td bgcolor="#FFFFFF"><strong>Client Name</strong></td>
    <td colspan="6" bgcolor="#FFFFFF"><?php echo $contact_model->first_name.' '.$contact_model->surname ; ?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><strong>Client Contact:</strong></td>
    <td colspan="2" bgcolor="#FFFFFF"><?php echo $company_model->name; ?></td>
    <td bgcolor="#FFFFFF"><strong>P:</strong></td>
    <td bgcolor="#FFFFFF"><?php echo $contact_model->phone ; ?></td>
    <td bgcolor="#FFFFFF"><strong>M:</strong></td>
    <td bgcolor="#FFFFFF"><?php echo $contact_model->mobile ; ?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF" height="20" colspan="7">&nbsp;</td>
  </tr>
  <tr>
    <th colspan="7" align="left" valign="top" bgcolor="#DDDDDD" >Work Details</th>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><strong>Scope of Works:</strong></td>
    <td colspan="6" bgcolor="#FFFFFF">
	<strong><?php echo Service::Model()->FindByPk($quote_model->service_id)->service_name; ?> : </strong><br/>
	<?php foreach($job_services_model as $service) { echo '- '.$service->service_description.'<br/>';  } ?>	
	</td>
  </tr>

    <tr>
    <td colspan="7" bgcolor="#FFFFFF">
	&nbsp;
	</td>
  </tr>
  
  <tr>
    <td  bgcolor="#FFFFFF"><strong>Equipment:</strong></td>
    <td colspan="6" bgcolor="#FFFFFF"><?php echo $toolTypes_array_str; ?></td>
  </tr>
   
  <tr>
    <td   bgcolor="#FFFFFF"><strong>Purchase Order No.</strong></td>
    <td colspan="6" bgcolor="#FFFFFF"><?php echo $job_model->purchase_order ; ?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF" height="20" colspan="7">&nbsp;</td>
  </tr>
  <tr>
    <th colspan="7" align="left" valign="top" bgcolor="#DDDDDD" >Feedback and Sign Off</th>
  </tr>
  
   <tr>
    <td colspan="7" bgcolor="#FFFFFF">
	<textarea name="" cols="" rows="" style="width:100%; height:100px;">	
	</textarea>
	</td>
  </tr>
  
  <tr>
  <td colspan="2"  bgcolor="#FFFFFF" height="20">Client Name</td>
    <td colspan="3" bgcolor="#FFFFFF"  height="20">Client Signature</td>
    <td colspan="2" bgcolor="#FFFFFF"  height="20">Client Date</td>
  </tr>
  

  
  <tr>    
	<td colspan="2" bgcolor="#FFFFFF"  height="60">&nbsp;</td>
    <td colspan="3" bgcolor="#FFFFFF"  height="60">&nbsp;</td>
    <td colspan="2" bgcolor="#FFFFFF"  height="60">&nbsp;</td>
  </tr>
  
 
  </table>
  

</body>
</html>