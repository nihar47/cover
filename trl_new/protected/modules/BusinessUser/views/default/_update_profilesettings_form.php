
 <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'business-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	 'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>
<?php echo $form->error($model,'business_name'); ?>

            	<section class="container account_info_wrapper profile_wrapper">
            		<section class="text-left">
                    	<h5>Your profile settings</h5>
                    </section>
                    
                    	<ul class="nav nav-tabs" id="myTab">
                        <li class="active"><a data-toggle="tab" href="#general_settings">General Settings</a></li>
                        <li class=""><a data-toggle="tab" href="#seal_generator">Seal Generator</a></li>
                      </ul>
                      
                      <div class="tab-content" id="myTabContent">
                        <div id="general_settings" class="tab-pane fade active in"> 
                      
                          <?php echo $form->errorSummary(array($model)); ?>
                      <div class="show_business_name" >
                            <dl>
                               <dt><?php echo $form->labelEx($model,'business_name'); ?></dt>
                   <dd>
				   <?php echo $model->business_name ; ?>
                   
                   
                   <input type="button" id="business_name" class="edit_button pull-right" >
                   </dd>
                            </dl>
						</div>	
						
						 <div class="edit_business_name" >
							<dl>
                                <dt><?php echo $form->labelEx($model,'business_name'); ?></dt>
                                <dd>
								    <?php echo $form->textField($model,'business_name',array('size'=>60,'maxlength'=>255 , 'readonly'=>"readonly")); ?>
                                    
                                    
                                <input type="button"  id="business_name" class="edit_button pull-right"></dd>
                            </dl>
						</div>	
							
							
                            
                          <div class="show_logo" >
                           	<dl>
                                <dt> <?php echo $form->labelEx($model,'logo'); ?></dt>
                                <dd>    <?php echo CHtml::image(Yii::app()->request->baseUrl.'/uploads/business_logo/'.$this->business_Info->logo,$this->business_Info->business_name ); ?>
                                
                                <?php echo $form->error($model,'logo'); ?>
                                 <input type="button" id="logo"  class="edit_button pull-right"></dd>
                            </dl>
                            </div>
                            
                            <div class="edit_logo" style="display: block;">
                            
                            <dl>
                                <dt> <?php echo $form->labelEx($model,'logo'); ?></dt>
                                <dd> <?php echo CHtml::activeFileField($model, 'logo'); ?>  
                                
                                <?php if($model->isNewRecord!='1'){ ?>
  							       <?php echo CHtml::image(Yii::app()->request->baseUrl.'/uploads/business_logo/'.$model->logo,"logo"); ?>  
    							<?php } ?>

                                
                                <input type="button" id="logo" class="edit_button pull-right">
                                </dd>
                            </dl>
                            
                            </div>
                            
                             <div class="show_phone" >
                            <dl>
                                <dt><?php echo $form->labelEx($model,'phone'); ?></dt>
                                <dd><?php echo $model->phone ; ?>
                                   <?php echo $form->error($model,'phone'); ?>
                                <input type="button" id="phone" class="edit_button pull-right"></dd>
                            </dl>
                            </div>
                            
                            <div class="edit_phone" >
                            <dl>
                                <dt><?php echo $form->labelEx($model,'phone'); ?></dt>
                                <dd>
                               <?php echo $form->textField($model,'phone',array('size'=>60,'maxlength'=>100)); ?>
                                 <input type="button" id="phone"  class="edit_button pull-right"></dd>
                            </dl>
                            </div>
                            
                            
                            
                             <div class="show_website" >
                          	<dl>
                                <dt><?php echo $form->labelEx($model,'website'); ?></dt>
                                <dd><?php echo $model->website ; ?>
                                <?php echo $form->error($model,'website'); ?>
                                 <input id="website" type="button" class="edit_button pull-right"></dd>
                            </dl>
                            </div>
                             <div class="edit_website" >
                          	<dl>
                                <dt><?php echo $form->labelEx($model,'website'); ?></dt>
                                <dd>
									<?php echo $form->textField($model,'website',array('size'=>60,'maxlength'=>255)); ?>
								 
                                <input type="button" id="website" class="edit_button pull-right"></dd>
                            </dl>
                            </div>
                            
                            
                            
                            
                             <div class="show_business_address" >
                            <dl>
                                <dt>Business Address:</dt>
                                <dd>
                                              <div id="area">
					 <?php
					 $match = addcslashes($this->business_id, '%_'); // escape LIKE's special characters
			$q = new CDbCriteria( array(
				'condition' => "business_id = :match ORDER BY address_id",         // no quotes around :match
				'params'    => array(':match' => "$match")  // Aha! Wildcards go here
			) );
			$BusinessAddressList =  BusinessAddress::model()->findAll( $q );   
			if(count($BusinessAddressList)>0){
				foreach($BusinessAddressList as  $BusinessAddressList_key => $BusinessAddressList_value){
						if($BusinessAddressList_key==0){?>
                        
                       <div><?php echo $BusinessAddressList_value->address; ?>
                        </div>
                        <?php }else{ ?>	
                        
                     <div><?php echo $BusinessAddressList_value->address; ?></textarea></div>  
                      
				<?php }
				}
			}else{
                            echo 'N/A </br>';

                            }

 ?>
 

                </div>
                             
                                    <a href="javascript:;"  class="add_moreaddress">+</a>
                                     <input type="button" id="business_address" class="edit_button pull-right"></dd>
                            </dl>
                            </div>
                            
                              <div class="edit_business_address" >
                            <dl>
                                <dt>Business Address:</dt>
                                <dd>
                                <div id="more_address">
                                           <div id="area">
					 <?php
					 $match = addcslashes($this->business_id, '%_'); // escape LIKE's special characters
			$q = new CDbCriteria( array(
				'condition' => "business_id = :match ORDER BY address_id",         // no quotes around :match
				'params'    => array(':match' => "$match")  // Aha! Wildcards go here
			) );
			$BusinessAddressList =  BusinessAddress::model()->findAll( $q );   
			if(count($BusinessAddressList)>0){
				foreach($BusinessAddressList as  $BusinessAddressList_key => $BusinessAddressList_value){
						if($BusinessAddressList_key==0){?>
                        <div class="row">
                       
                     
                       <div><textarea  rows="6" cols="50" name="BusinessAddress[address][]" id="BusinessAddress_address"><?php echo $BusinessAddressList_value->address; ?></textarea>
                        </div>
                         </div>
				 		<?php }else{ ?>	
                        
                        <div class="row"><textarea rows="6" cols="50" name="BusinessAddress[address][]" id="BusinessAddress_address"><?php echo $BusinessAddressList_value->address; ?></textarea></div>  
                      
				<?php }
				}
			}else{ ?>
            			<div class="row">
                       <div><textarea rows="6" cols="50" name="BusinessAddress[address][]" id="BusinessAddress_address"></textarea>
                        </div>
                         </div>
			
			<?php }

 ?>
 

                </div>
                                </div>
                                    <a href="javascript:;" id="add_moreaddress" class="add_moreaddress">+</a>
                                     <input type="button" id="business_address" class="edit_button pull-right"></dd>
                            </dl>
                            </div>
                            
                            
                             <div class="show_area_list" >
                            <dl>
                            	<div class="full_qs">Where would you like your business to be listed?:</div>
                                <dt>&nbsp;</dt>
                                <dd><div id="locationlist" > 
				<?php   
				$match = addcslashes($this->business_id, '%_'); // escape LIKE's special characters
				$q = new CDbCriteria( array(
						'condition' => "business_id = :match ORDER BY business_location_id ",         // no quotes around :match
						'params'    => array(':match' => "$match")  // Aha! Wildcards go here
					) );
                $BusinessLocationList = BusinessLocation::model()->findAll( $q ); 
				if(count($BusinessLocationList)>0){
					foreach($BusinessLocationList as  $BusinessLocationList_key => $BusinessLocationList_value){
					
						$Locations	= Locations::model()->findByAttributes(array('id'=>$BusinessLocationList_value->location_id ));
					?>
                        
                        <div class="" id="<?php echo $BusinessLocationList_value->business_location_id  ?>" style="cursor:pointer">
                        <input type="hidden" value="<?php echo $BusinessLocationList_value->location_id   ?>" name="BusinessLocation[location_id][]">
                        <div class="location_list"><?php echo $Locations->city?>, <?php echo $Locations->state_cc?></div>
                        </div>
                        
                      
                        
                        <?php
					}
                }
                ?>

                  
                  
                  </div>
                                    <a href="javascript:;" class="add_moreaddress">+</a>
                                    <input type="button" id="area_list" class="edit_button pull-right"></dd>
                            </dl>
                            </div> 
                            
                             <div class="edit_area_list" >
                            <dl>
                            	<div class="full_qs">Where would you like your business to be listed?:</div>
                                <dt>&nbsp;</dt>
                                <dd><div id="locationlist" > 
				<?php   
				$match = addcslashes($this->business_id, '%_'); // escape LIKE's special characters
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
                                    <a href="javascript:;" class="add_moreaddress">+</a>
                                    <input type="button" id="area_list" class="edit_button pull-right"></dd>
                            </dl>
                            </div>
                            
                            
                              <div class="show_category" >
                            <dl>
                            	<div class="full_qs">What categories would you like to be listed in:</div>
                                <dt>&nbsp;</dt>
                                <dd><div  id="categorylist">
                 	<?php   
				$match = addcslashes($this->business_id, '%_'); // escape LIKE's special characters
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
                        
                        <div class="" id="<?php echo $BusinessCategoryList_value->category_id  ?>"  style="cursor:pointer">
                        <input type="hidden" value="<?php echo$BusinessCategoryList_value->category_id    ?>" name="BusinessCategory[category_id][]">
                        <div class="category_list"><?php echo $CategoryName?></div>
                        <div class="remove_list">
						
                        </div></div>
                        
                      
                        
                        <?php
					}
                }
                ?>
                 
                 
              	 </div>
                                       
                                    <a href="javascript:;" class="add_moreaddress">+</a>
                                    <input type="button" id="category" class="edit_button pull-right"></dd>
                            </dl>
                             </div>
                           
                              <div class="edit_category" >
                            <dl>
                            	<div class="full_qs">What categories would you like to be listed in:</div>
                                <dt>&nbsp;</dt>
                                <dd><div  id="categorylist">
                 	<?php   
				$match = addcslashes($this->business_id, '%_'); // escape LIKE's special characters
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
                                    <a href="javascript:;" class="add_moreaddress">+</a>
                                    <input type="button" id="category" class="edit_button pull-right"></dd>
                            </dl>
                             </div>
                            
                            
                            
                            
                             <dl>
                                <dt>&nbsp;</dt>
                                <dd>&nbsp;</dd>
                            </dl>
                            
                            
                            <dl>
                            
                                <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'save changes' , array('class' => 'btn btn_skyblue')); ?>
                            </dl>
                            
                            <?php $this->endWidget(); ?>
                            
                            
                        </div>
                        
                        <div id="seal_generator" class="tab-pane fade seal_generator">
                          
                          <div class="col-lg-6">
                          	<h3>Your personal trusted Top Rated Local® Seal:</h3>
                            
                            <span>
                                Short description about the niche Seal and what it is for.
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed justo
                                arcu, bibendum at ante non, Iacinia adipiscing nisl. Aenean vel
                                nibh non ipsum varius adipiscing vel id justo. Nunc congue nibh
                                pellentesque nulla molestie, Iuctus sagittis nulla imperdiet.
                            </span>
                            
                            <h1>Generate or change your seal in the box below</h1>
                            	<form roll="form" class="change_seal">
                                	<input type="text" value="" class="" placeholder="Type seal title here"  />
                                    
                                    
                                    <input type="button" id="GenerateEmbedCode" class="btn btn_skyblue pull-left" value="Generate Embed Code" />
                                    <input type="button" id="Generate Png image" class="btn btn_skyblue pull-left" value="Generate Png image" />
                                    
                                    <div class="clear"></div>
                                    <em>Copy code below and paste into your webpage HTMl</em>
                                    
                                    <textarea id="webpage_html"></textarea>
                                    
                                    
                                    <div class="clear"></div>
                                    <div class="radio pull-left">
                                    <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>  
                                    Fixed Bottom Right <b>(recommended)</b>
                                    </label>
                                    </div>
                                    
                                    <div class="radio pull-left">
                                    <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"> Anywere
                                    </label>
                                    </div>

                                    
                                </form>
                          
                          </div>
                          <div class="col-lg-6 seal_wrapper">
                          	<img src="<?php echo Yii::app()->request->baseUrl;?>/images/seal_logo_big.jpg" />
                            
                            <div class="radio pull-left" style="padding-left:35%; margin-right:20px;">
                              <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked> Local
                              </label>
                           </div>

                           <div class="radio pull-left">
                              <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"> National
                              </label>
                            </div>


                          
                          </div>
                          
                          
                        </div>
                        
                        
                        
                        
                        
                        
                        
                        
                      </div>
                    
                    
                    
                    
            	 </section>   
                 


     <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/easyResponsiveTabs.js" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function () {
		
			$(".edit_business_name , .edit_logo , .edit_phone , .edit_website , .edit_business_address , .edit_area_list , .edit_category").hide();
	 $(".edit_button").click(function(){
	 var id = this.id; 
    $(".show_"+id).toggle();
	$(".edit_"+id).toggle();
  });
  
   $('#add_moreaddress').click(function(){
   $("#more_address").append('<input type="hidden" name="address_id[]" value="" /><textarea name="address[]" ></textarea> <br/>');
   }); 
		
		
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
		
		
		
		
		
			 $('#add').click(function(){
      						 $("#area").append('<div class="row"><textarea rows="6" cols="50" name="BusinessAddress[address][]" id="BusinessAddress_address"></textarea></div>');
  						  }); 
						  
						  
						 $("#GenerateEmbedCode").click(function(){
						//	alert("The Generate Embed Code clicked.");
							$("#webpage_html").val('<iframe src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/seal_logo_big.jpg"></iframe>');
						});
		
		
		
		
		
		
		
		
		
		

    });
	
/*		$("#location_id_suggestions").coolautosuggest({
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
					}); */
					
					
					
					
</script>            
          