<?php
$match = addcslashes($_GET['chars'], '%_'); // escape LIKE's special characters
$q = new CDbCriteria( array(
    'condition' => "name LIKE :match ORDER BY name LIMIT 0, 10",         // no quotes around :match
    'params'    => array(':match' => "%$match%")  // Aha! Wildcards go here
) );
 //echo $q;
$Category = Category::model()->findAll( $q );     // works!






$arr=array();
if(count($Category)>0){
	foreach($Category as $data){
	
			if($data->parent_id > 0){
					 $catnames = Category::model()->get_recursive_parents($data->category_id);
					 array_push($catnames,$data->name);
					// $parent_Category[$data->category_id] = implode(" >> ",$catnames) ;
					 $arr[]=array("id" => $data->category_id, "data" => implode(" >> ",$catnames));
				}else{
				//$parent_Category[$Category_value->category_id] = $Category_value->name;
				$arr[]=array("id" => $data->category_id, "data" => $data->name);
				}
			
	
		//$arr[]=array("id" => $data->category_id, "data" => $data->name);
	}
}
echo json_encode($arr);
?>