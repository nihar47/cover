<?php
$match = addcslashes($_GET['chars'], '%_'); // escape LIKE's special characters
$q = new CDbCriteria( array(
    'condition' => "city LIKE :match ORDER BY city LIMIT 0, 10",         // no quotes around :match
    'params'    => array(':match' => "%$match%")  // Aha! Wildcards go here
) );
 //echo $q;
$Locations = Locations::model()->findAll( $q );     // works!
$arr=array();
if(count($Locations)>0){
	foreach($Locations as $data){
		$arr[]=array("id" => $data->id, "data" => $data->city.', '.$data->state_cc.' '.$data->zip);
	}
}
echo json_encode($arr);
?>

