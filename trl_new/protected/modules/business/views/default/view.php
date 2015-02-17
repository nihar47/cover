<?php
/* @var $this BusinessController */
/* @var $model Business */


?>
<h1>
        <?php echo Yii::t("business.admin","Business details"); ?>
        <?php echo CHtml::link(
                Yii::t("business.admin", "Manage"),
                array("admin"),
                array("class"=>"btn btn-small pull-right")
        ); ?>
        <?php echo CHtml::link(
                Yii::t("business.admin", "Edit"),
                array("update", "id"=>$model->business_id ),
                array("class"=>"btn btn-small pull-right")
        ); ?>
</h1>


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
	),
	
)); ?>


<table id="yw0" class="detail-view"><tbody>
<tr class="odd"><th>Owner Name</th><td><?php echo $model->owner_name; ?></td></tr>
<tr class="even"><th>Business Name</th><td><?php echo $model->business_name; ?></td></tr>
<tr class="odd"><th>Logo</th><td> <?php echo CHtml::image(Yii::app()->request->baseUrl.'/../uploads/business_logo/'.$model->logo,"logo"); ?>  </td></tr>
<tr class="even"><th>Registration date</th><td>

<?php echo Yii::app()->dateFormatter->format("d MMM y",strtotime($model->date_added)) ?></td></tr>
<tr class="odd"><th>E-mail</th><td><?php echo $model->email; ?></td></tr>
<tr class="even"><th>Phone</th><td><?php echo $model->phone; ?></td></tr>
<tr class="odd"><th>Website</th><td><?php echo $model->website; ?></td></tr>
<tr class="even"><th>Status</th><td><?php echo $model->status; ?></td></tr>
<tr class="odd"><th>Business Address</th><td><ul>
 <?php
			$match = addcslashes($_GET['id'], '%_'); // escape LIKE's special characters
			$q = new CDbCriteria( array(
				'condition' => "business_id = :match ORDER BY address_id",         // no quotes around :match
				'params'    => array(':match' => "$match")  // Aha! Wildcards go here
			) );
			$BusinessAddressList =  BusinessAddress::model()->findAll( $q );   
			if(count($BusinessAddressList)>0){
			?>
			    
				<?php foreach($BusinessAddressList as  $BusinessAddressList_key => $BusinessAddressList_value){
						?>	
                        <li><?php echo $BusinessAddressList_value->address; ?></li>
               <?php } ?>
				
				
				<?php }else{ ?>
						
                           <li>N/A</li>
                        
				<?php }
                ?>
 </ul></td></tr>
 <tr class="even"><th>Business Location List</th><td><ul>
 	<?php   
				$match = addcslashes($_GET['id'], '%_'); // escape LIKE's special characters
				$q = new CDbCriteria( array(
						'condition' => "business_id = :match ORDER BY business_location_id ",         // no quotes around :match
						'params'    => array(':match' => "$match")  // Aha! Wildcards go here
					) );
                $BusinessLocationList = BusinessLocation::model()->findAll( $q ); 
				if(count($BusinessLocationList)>0){ ?>
				 
				<?php
					foreach($BusinessLocationList as  $BusinessLocationList_key => $BusinessLocationList_value){
					
						$Locations	= Locations::model()->findByAttributes(array('id'=>$BusinessLocationList_value->location_id ));
					?>
                           <li><?php echo $Locations->city?>, <?php echo $Locations->state_cc?> <?php echo $Locations->zip?></li>
                        <?php
					}
                }else{ ?>
						
                           <li>N/A</li>
                        
				<?php }
                ?>
  </ul></td></tr>               
 
 <tr class="odd"><th>Business Category List</th><td><ul>
   	<?php   
				$match = addcslashes($_GET['id'], '%_'); // escape LIKE's special characters
				$q = new CDbCriteria( array(
						'condition' => "business_id = :match ORDER BY business_category_id  ",         // no quotes around :match
						'params'    => array(':match' => "$match")  // Aha! Wildcards go here
					) );
                $BusinessCategoryList = BusinessCategory::model()->findAll( $q ); 
				if(count($BusinessCategoryList)>0){
					foreach($BusinessCategoryList as  $BusinessCategoryList_key => $BusinessCategoryList_value){
					
						$Category = Category::model()->findByAttributes(array('category_id'=>$BusinessCategoryList_value->category_id  ));
						$CategoryName =null;
						if($Category->parent_id > 0){
								 $catnames = Category::model()->get_recursive_parents($Category->category_id);
					             array_push($catnames,$Category->name);
								$CategoryName = implode(" >> ",$catnames);
							}else{
								$CategoryName = $Category->name;
							}
					?>
                        
                       <li><?php echo $CategoryName?></li>
                        
                        <?php
					}
                }else{ ?>
						
                           <li>N/A</li>
                        
				<?php }
                ?>
               </ul></td></tr>    
 

</tbody></table>

	