<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
body{ font-family:sans-serif;}
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
	border:#666666 solid 1px; color:#666666;
}
table a{ color:#666666;}
table td {
	font-family:sans-serif;
	font-size:12px;
	padding:4px;
	border-collapse:collapse;
	border:#666666 solid 1px;
}
table th {
	font-family:sans-serif;
	font-size:14px;
	padding:4px;
	border-collapse:collapse;
	border:#666666 solid 1px;
}

.heading_title{ font-family:"Times New Roman", Times, serif; font-size:20px; font-style:italic; color:#F00; text-align:center;}
.message { font-family:sans-serif; font-size:16px; padding:10px; border:#CCCCCC solid 2px;}

table td.vertical_text{ webkit-transform: rotate(90deg); -moz-transform: rotate(90deg); -o-transform: rotate(90deg); transform: rotate(90deg);}

</style>
</head>

<body>

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
	
	
	
?>

<h1 class="heading_title">HIGH CLEAN PTY LTD</h1>
<h4 align="center">SAFE WORK METHOD STATEMENT FORM</h4>
<div class="message">Main tasks to be undertaken by HIGH CLEAN PTY LTD staff will be assessed using the hazard identification and risk assessment process below. All
Category risks will be assessed according to the Preferred Order of Control Processes.</div><br />
<br />


<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td align="left" valign="top" width="40%"><strong>Work Group - Names:</strong><br />
Site Supervisor : <?php echo $siteSupervisor_array_str; ?><br/>
Staff : <?php echo $unique_staffUser_array_str;	?><br/>

</td>

<td align="left" valign="top" width="60%">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" valign="top" rowspan="2">POSSIBLE SEVERITY</td>
    <td align="center" valign="top" colspan="4">HOW LIKELY IS IT TO HAPPEN</td>
  </tr>
  <tr>
    <td align="left" valign="top">Very likely</td>
    <td align="left" valign="top">Likely</td>
    <td align="left" valign="top">Unlikely</td>
    <td align="left" valign="top">Very Unlikely</td>
  </tr>
  <tr>
    <td align="left" valign="top">Kill or cause permanent
injury or ill health</td>
    <td align="left" valign="top">HIGH</td>
    <td align="left" valign="top">HIGH</td>
    <td align="left" valign="top">HIGH</td>
    <td align="left" valign="top">MEDIUM</td>
  </tr>
  <tr>
    <td align="left" valign="top">Long term illness or
serious injury</td>
    <td align="left" valign="top">HIGH</td>
    <td align="left" valign="top">HIGH</td>
    <td align="left" valign="top">MEDIUM</td>
    <td align="left" valign="top">MEDIUM</td>
  </tr>
  <tr>
    <td align="left" valign="top">Medical attention and
several days off work</td>
     <td align="left" valign="top">HIGH</td>
     <td align="left" valign="top">MEDIUM</td>
    <td align="left" valign="top">MEDIUM</td>
    <td align="left" valign="top">LOW</td>
  </tr>
  <tr>
    <td align="left" valign="top">An injury requiring first
aid</td>
    <td align="left" valign="top">MEDIUM</td>
    <td align="left" valign="top">MEDIUM</td>
    <td align="left" valign="top">LOW</td>
    <td align="left" valign="top">LOW</td>
  </tr>
</table>
</td>

</tr>

  <tr>
    <td align="left" valign="top"><strong>Main Task:</strong><br />
<?php echo Service::Model()->FindByPk($quote_model->service_id)->service_name; ?></td>
    <td align="left" valign="top"><strong>Preferred Order of Control Processes to be Applied</strong></td>
  </tr>
  <tr>
    <td align="left" valign="top"><strong>Date of Works:</strong><br />
<?php  if($job_model->job_started_date != '0000-00-00' ) echo date("d-m-Y", strtotime($job_model->job_started_date)); ?> - <?php if($job_model->job_end_date != '0000-00-00' ) echo date("d-m-Y", strtotime($job_model->job_end_date)); ?></td>
    <td align="left" valign="top">1st. Elimination e.g. Eliminate the hazard where possible.<br />
2nd. Substitute the hazard for one with less risk e.g. Water based paint.</td>
  </tr>
  <tr>
    <td align="left" valign="top"><strong>Site Address:</strong><br />
<?php echo $site_model->address . ', ' . $site_model->suburb. ', ' . $site_model->state. ' ' . $site_model->postcode; ?></td>
    <td align="left" valign="top">3rd. Engineering solution e.g. Reversing beepers on plant.<br />
4th. Administrative solution e.g. job rotation, safety inspections<br />
5th. Personal Protective Equipment e.g. safety glasses, hearing protection</td>
  </tr>
  <tr>
    <td align="left" valign="top"><strong>Director's Signature:</strong><br />
</td>
<td>&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top"><strong>COMMENTS:</strong><br />
</td>
<td>&nbsp;</td>
  </tr>
</table><br />
<br />

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  
  
  <tr> <!--<header>-->
    <td align="center" valign="top" bgcolor="#DDDDDD">&nbsp;</td>
    <td align="center" valign="top" bgcolor="#DDDDDD">Specific Task/Activity</td>
    <td align="center" valign="top" bgcolor="#DDDDDD">Potential Hazards/Consequences</td>
    <td align="center" valign="top" bgcolor="#DDDDDD">Class of Risk</td>
    <td align="center" valign="top" bgcolor="#DDDDDD">Control Measures</td>
  </tr>
  
  
  <tr>
    <td align="left" valign="top" class="vertical_text">Common</td>
    <td align="left" valign="top">Team meeting "toolbox". Discuss risks
and work methods. Site induction/
orientation/ MSDS</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">LOW</td>
    <td align="left" valign="top">PPE, work setup, equipment and tooling
discussed. This is the time to ensure all issues for
site work are addressed. Walk through of project
carried out to ensure all staff are fully aware of
site conditions both visually and verbally. Ensure
this safe work method statement is read out in full
to all staff. Make staff fully aware of WMS/JSA/
emergency contact information. Ensure all details
are readily locatable. Educate/ awareness of
hazards/ risks/ chemicals. Sign off of all staff
members required.<br />
<br />

Ensure MSDS is readily available on worksite or in
work vehicle.</td>
  </tr>
  <tr>
    <td align="left" valign="top" class="vertical_text">Common</td>
    <td align="left" valign="top">Setup work area</td>
    <td align="left" valign="top">Hazards: Trip/ slip/
falling	</td>
    <td align="left" valign="top">LOW</td>
    <td align="left" valign="top">Place large orange cones around the work
vehicle to highlight workers in general area
and the access area required for the rear door
of vans. Ensure client/ area manager/
occupant of building is aware of the particular
cleaning process is about to commence.<br />
<br />
Create a work zone- use cones/ bollards/
safety tape and signage. Exclude pedestrians
from the work area where possible. Ensure
falling objects will not go outside the work
zone. Ensure hoses are a bright yellow or
orange colour.<br />
<br />
Clear rubbish and other trip hazards from
work zone. Inform other trades or staff
working in area of task being carried out and
the hazards that relate.</td>
  </tr>
</table>
<br />
<br />
<p><strong>Additional Comments:</strong></p>

<p>This document is not the limitation of OHS and safety while working on site. If you encounter safety concerns, add them to the reverse side and
ensure staff/ manager is aware of issue.</p>

<p><strong>Signature of Staff undertaking the task:</strong></p>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="middle"><strong>Name/ Position</strong></td>
    <td align="center" valign="middle"><strong>Signature</strong></td>
    <td align="center" valign="middle"><strong>Date:</strong></td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
</table>





</body>
</html>