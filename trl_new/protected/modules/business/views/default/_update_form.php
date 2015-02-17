<?php
/* @var $this BusinessController */
/* @var $model Business */
/* @var $form CActiveForm */
?>
<!-- update-form -->
<div class="form form-horizontal well well-small">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'business-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	 'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>


<div id="horizontalTab">
            <ul class="resp-tabs-list">
                <li>Account info</li>
                <li>Business Address</li>
                <li>Area Listed</li>
                 <li>Categories Listed</li>
                
            </ul>
            <div class="resp-tabs-container">
                <div>
                   <p class="note">Fields with <span class="required">*</span> are required.</p>

	
    <?php echo $form->errorSummary(array($model)); ?>
    
 

    
	<div class="row">
		<?php echo $form->labelEx($model,'owner_name'); ?>
		<?php echo $form->textField($model,'owner_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'owner_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'business_name'); ?>
		<?php echo $form->textField($model,'business_name',array('size'=>60,'maxlength'=>255 , 'readonly'=>"readonly")); ?>
		<?php echo $form->error($model,'business_name'); ?>
	</div>

    <div class="row">
        <?php echo $form->labelEx($model,'logo'); ?>
        <?php echo CHtml::activeFileField($model, 'logo'); ?>  
        <?php echo $form->error($model,'logo'); ?>
	</div>
	<?php if($model->isNewRecord!='1'){ ?>
    <div class="row">
         <?php echo CHtml::image(Yii::app()->request->baseUrl.'/uploads/business_logo/'.$model->logo,"logo"); ?>  
    </div>
    <?php } ?>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'website'); ?>
		<?php echo $form->textField($model,'website',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'website'); ?>
	</div>

	

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		 <?php echo $form->dropDownList($model,'status',array(""=>"--Please select status--","active"=>"Active","Inactive"=>"InActive")); ?>
          
		<?php echo $form->error($model,'status'); ?>
	</div>
    
   
                 
            
    
                </div>
              <div>
                <div id="area">
					 <?php
					 $match = addcslashes($_GET['id'], '%_'); // escape LIKE's special characters
			$q = new CDbCriteria( array(
				'condition' => "business_id = :match ORDER BY address_id",         // no quotes around :match
				'params'    => array(':match' => "$match")  // Aha! Wildcards go here
			) );
			$BusinessAddressList =  BusinessAddress::model()->findAll( $q );   
			if(count($BusinessAddressList)>0){
				foreach($BusinessAddressList as  $BusinessAddressList_key => $BusinessAddressList_value){
						if($BusinessAddressList_key==0){?>
                        <div class="row">
                       <label class="required" for="BusinessAddress_address">Address </label>
                     
                       <div><textarea  rows="6" cols="50" name="BusinessAddress[address][]" id="BusinessAddress_address"><?php echo $BusinessAddressList_value->address; ?></textarea>
                        <a id="add" ><?php echo CHtml::image(Yii::app()->request->baseUrl.'/css/back/images/plus_icon.png',"plus icon"); ?> </a></div>
                         </div>
				 		<?php }else{ ?>	
                        
                        <div class="row"><textarea rows="6" cols="50" name="BusinessAddress[address][]" id="BusinessAddress_address"><?php echo $BusinessAddressList_value->address; ?></textarea></div>  
                      
				<?php }
				}
			}else{ ?>
            			<div class="row">
                       <label class="required" for="BusinessAddress_address">Address </label>
                       <div><textarea rows="6" cols="50" name="BusinessAddress[address][]" id="BusinessAddress_address"></textarea>
                        <a id="add" ><?php echo CHtml::image(Yii::app()->request->baseUrl.'/css/back/images/plus_icon.png',"plus icon"); ?> </a></div>
                         </div>
			
			<?php }

 ?>
 

                </div>
				 
                                
               
                 
                  
                </div>
                <div>
                 <div class="row">
                 <label class="required" for="BusinessAddress_address">Location </label> <em>(Autocomplete) </em>
                <input type="text" name="location_id_suggestions" id="location_id_suggestions" autocomplete="on" />
                </div>
                
                  <div id="locationlist" > 
				<?php   
				$match = addcslashes($_GET['id'], '%_'); // escape LIKE's special characters
				$q = new CDbCriteria( array(
						'condition' => "business_id = :match ORDER BY business_location_id ",         // no quotes around :match
						'params'    => array(':match' => "$match")  // Aha! Wildcards go here
					) );
                $BusinessLocationList = BusinessLocation::model()->findAll( $q ); 
				if(count($BusinessLocationList)>0){
					foreach($BusinessLocationList as  $BusinessLocationList_key => $BusinessLocationList_value){
					
						$Locations	= Locations::model()->findByAttributes(array('id'=>$BusinessLocationList_value->location_id ));
					?>
                        
                        <div class="" id="<?php echo $BusinessLocationList_value->business_location_id  ?>" onclick="remove(<?php echo $BusinessLocationList_value->business_location_id  ?>)" style="cursor:pointer">
                        <input type="hidden" value="<?php echo $BusinessLocationList_value->location_id   ?>" name="BusinessLocation[location_id][]">
                        <div class="location_list"><?php echo $Locations->city?>,<?php echo $Locations->state_cc?>,<?php echo $Locations->zip?></div>
                        <div class="remove_list">
						<?php echo CHtml::image(Yii::app()->request->baseUrl.'/css/back/images/minus.png',"minus"); ?>
                        </div></div>
                        
                      
                        
                        <?php
					}
                }
                ?>

                  
                  
                  </div>
                
                    
               </div>
                <div>
                   			
                   

	     
             <div class="row">
                <label class="required" for="BusinessAddress_address">Category </label> <em>(Autocomplete) </em>
                  <input type="text" name="category_id_suggestions" id="category_id_suggestions"  autocomplete="on" />
                 </div>
                 <div  id="categorylist">
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
                        
                        <div class="" id="<?php echo $BusinessCategoryList_value->category_id  ?>" onclick="remove(<?php echo$BusinessCategoryList_value->category_id    ?>)" style="cursor:pointer">
                        <input type="hidden" value="<?php echo$BusinessCategoryList_value->category_id    ?>" name="BusinessCategory[category_id][]">
                        <div class="category_list"><?php echo $CategoryName?></div>
                        <div class="remove_list">
						<?php echo CHtml::image(Yii::app()->request->baseUrl.'/css/back/images/minus.png',"minus"); ?>
                        </div></div>
                        
                      
                        
                        <?php
					}
                }
                ?>
                 
                 
              	 </div>
                
            </div>
        </div>


	
   <div class="row buttons" >
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save' , array('class' => 'btn btn-info')); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
<!-- update-form -->

       <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/easyResponsiveTabs.js" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#horizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion           
            width: 'auto', //auto or any width like 600px
            fit: true,   // 100% fit in a container
            closed: 'accordion', // Start closed if in accordion view
            activate: function(event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#tabInfo');
                var $name = $('span', $info);

                $name.text($tab.text());

                $info.show();
            }
        });

    });
	
		$("#location_id_suggestions").coolautosuggest({
						url:"backend.php?r=common/default/getlocation&chars=",
						onSelected:function(result){
						  // Check if the result is not null
						  if(result!=null){
						 	$("#location_id_suggestions").val("");
							 $("#locationlist").append('<div style="cursor:pointer" onclick="remove('+result.id+')" id="'+ result.id + '" class="">'
							 +'<input type="hidden" name="BusinessLocation[location_id][]" value="'+ result.id +'" /><div class="location_list"> '+ result.data +'</div> ' +'<div class="remove_list"  ><?php echo CHtml::image(Yii::app()->request->baseUrl.'/css/back/images/minus.png',"minus"); ?></div>' +'</div>');
							
						 	
						 }
					}
					});
					$("#category_id_suggestions").coolautosuggest({
						
						url:"backend.php?r=common/default/getcategory&chars=",
						onSelected:function(result){
						  // Check if the result is not null
						  if(result!=null){
						 	$("#category_id_suggestions").val("");
							 $("#categorylist").append('<div onclick="remove('+result.id+')" id="block_'+ result.id + '" class="parent_div">'
							 +'<input type="hidden" name="BusinessCategory[category_id][]" value="'+ result.id +'" /><div class="category_list">  '+ result.data +'</div>'+'<div class="remove_list"><?php echo CHtml::image(Yii::app()->request->baseUrl.'/css/back/images/minus.png',"minus"); ?></div>'+'</div>');
						 }
					}
					});
					
					
					$(document).ready(function(){
   						 	 $('#add').click(function(){
      						 $("#area").append('<div class="row"><textarea rows="6" cols="50" name="BusinessAddress[address][]" id="BusinessAddress_address"></textarea></div>');
  						  }); 
					});
					
</script>             
             




