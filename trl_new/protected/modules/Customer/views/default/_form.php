<?php
/* @var $this CustomerController */
/* @var $model Customer */
/* @var $form CActiveForm */
?>

<div class="form form-horizontal well well-small">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'customer-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>


<div id="horizontalTab">
            <ul class="resp-tabs-list">
                <li>Customer Info</li>
                <li>Rating Info</li>
                <li>Comment</li>
            </ul>
            <div class="resp-tabs-container">
                <div>
                  <p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	
    <div class="row">
		<?php echo $form->labelEx($model,'allow_access'); ?>
	    <?php echo $form->dropDownList($model,'allow_access',array( 0=>'Access Denied',1=>'Grant Access')); ?>
    	<?php echo $form->error($model,'allow_access'); ?>
	</div>
    	
	<div class="row">
		<?php echo $form->labelEx($model,'business_id'); ?>
	    <?php  echo $form->dropDownList($model,'business_id',CHtml::listData(Business::model()->findAll(),'business_id','business_name')// $model->getAllBusiness()
    );?>
    	<?php echo $form->error($model,'business_id'); ?>
	</div>
  
  <div class="row">
		<?php echo $form->labelEx($model,'full_name'); ?>
		<?php echo $form->textField($model,'full_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'full_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email_address'); ?>
		<?php echo $form->textField($model,'email_address',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'email_address'); ?>
	</div>
     </div>
                <div>
    
    	<div class="row">
		<?php echo $form->labelEx($model,'qulity'); ?>
         <?php if($model->isNewRecord!='1'){
				 if($model->qulity > 0 ){
					for ($x=1; $x<=5; $x++) {
						if($x <= $model->qulity){
							echo CHtml::image(Yii::app()->request->baseUrl.'/images/star.png',"logo"); 
						}else{
							echo CHtml::image(Yii::app()->request->baseUrl.'/images/star_null.png',"logo"); 
						}
					}
				}else{
						for ($x=1; $x<=5; $x++) {
							echo CHtml::image(Yii::app()->request->baseUrl.'/images/star_null.png',"logo"); 
						}
					}
				}else{
						for ($x=1; $x<=5; $x++) {
							echo CHtml::image(Yii::app()->request->baseUrl.'/images/star_null.png',"logo"); 
						}
					} ?>
        
        <?php echo $form->textField($model,'qulity',array('size'=>20,'maxlength'=>255 ,'style' => "width: 20px;" )); ?>
	 	<?php echo $form->error($model,'qulity'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'value'); ?>
        
         <?php if($model->isNewRecord!='1'){
				 if($model->value > 0 ){
					for ($x=1; $x<=5; $x++) {
						if($x <= $model->value){
							echo CHtml::image(Yii::app()->request->baseUrl.'/images/star.png',"logo"); 
						}else{
							echo CHtml::image(Yii::app()->request->baseUrl.'/images/star_null.png',"logo"); 
						}
					}
				}else{
						for ($x=1; $x<=5; $x++) {
							echo CHtml::image(Yii::app()->request->baseUrl.'/images/star_null.png',"logo"); 
						}
					}
				}else{
						for ($x=1; $x<=5; $x++) {
							echo CHtml::image(Yii::app()->request->baseUrl.'/images/star_null.png',"logo"); 
						}
					} ?>
        
           <?php echo $form->textField($model,'value',array('size'=>20,'maxlength'=>255 ,'style' => "width: 20px;" )); ?>
		<?php echo $form->error($model,'value'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'timeliness'); ?>
          <?php if($model->isNewRecord!='1'){
				 if($model->timeliness > 0 ){
					for ($x=1; $x<=5; $x++) {
						if($x <= $model->timeliness){
							echo CHtml::image(Yii::app()->request->baseUrl.'/images/star.png',"logo"); 
						}else{
							echo CHtml::image(Yii::app()->request->baseUrl.'/images/star_null.png',"logo"); 
						}
					}
				}else{
						for ($x=1; $x<=5; $x++) {
							echo CHtml::image(Yii::app()->request->baseUrl.'/images/star_null.png',"logo"); 
						}
					}
				}else{
						for ($x=1; $x<=5; $x++) {
							echo CHtml::image(Yii::app()->request->baseUrl.'/images/star_null.png',"logo"); 
						}
					} ?>
        
		  <?php echo $form->textField($model,'timeliness',array('size'=>20,'maxlength'=>255 ,'style' => "width: 20px;" )); ?>
		<?php echo $form->error($model,'timeliness'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'experience'); ?>
         <?php if($model->isNewRecord!='1'){
				 if($model->experience > 0 ){
					for ($x=1; $x<=5; $x++) {
						if($x <= $model->experience){
							echo CHtml::image(Yii::app()->request->baseUrl.'/images/star.png',"logo"); 
						}else{
							echo CHtml::image(Yii::app()->request->baseUrl.'/images/star_null.png',"logo"); 
						}
					}
				}else{
						for ($x=1; $x<=5; $x++) {
							echo CHtml::image(Yii::app()->request->baseUrl.'/images/star_null.png',"logo"); 
						}
					}
				}else{
						for ($x=1; $x<=5; $x++) {
							echo CHtml::image(Yii::app()->request->baseUrl.'/images/star_null.png',"logo"); 
						}
					} ?>
        
		  <?php echo $form->textField($model,'experience',array('size'=>20,'maxlength'=>255,'style' => "width: 20px;" )); ?>
		<?php echo $form->error($model,'experience'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'satisfaction'); ?>
        
          <?php if($model->isNewRecord!='1'){
				 if($model->satisfaction > 0 ){
					for ($x=1; $x<=5; $x++) {
						if($x <= $model->satisfaction){
							echo CHtml::image(Yii::app()->request->baseUrl.'/images/star.png',"logo"); 
						}else{
							echo CHtml::image(Yii::app()->request->baseUrl.'/images/star_null.png',"logo"); 
						}
					}
				}else{
						for ($x=1; $x<=5; $x++) {
							echo CHtml::image(Yii::app()->request->baseUrl.'/images/star_null.png',"logo"); 
						}
					}
				}else{
						for ($x=1; $x<=5; $x++) {
							echo CHtml::image(Yii::app()->request->baseUrl.'/images/star_null.png',"logo"); 
						}
					} ?>
		  <?php echo $form->textField($model,'satisfaction',array('size'=>20,'maxlength'=>255,'style' => "width: 20px;"  )); ?>
		<?php echo $form->error($model,'satisfaction'); ?>
	</div>
    
    <?php if($model->isNewRecord!='1'){ ?>
   <div class="row">
		<?php echo $form->labelEx($model,'overall'); ?>
         <?php if($model->isNewRecord!='1'){
				 if($model->overall > 0 ){
					for ($x=1; $x<=5; $x++) {
						if($x <= $model->overall){
							echo CHtml::image(Yii::app()->request->baseUrl.'/images/star.png',"logo"); 
						}else{
							echo CHtml::image(Yii::app()->request->baseUrl.'/images/star_null.png',"logo"); 
						}
					}
				}else{
						for ($x=1; $x<=5; $x++) {
							echo CHtml::image(Yii::app()->request->baseUrl.'/images/star_null.png',"logo"); 
						}
					}
				} ?>
		  <?php echo $form->textField($model,'overall',array('size'=>20,'maxlength'=>255,'style' => "width: 20px;" ,"readonly"=>"readonly")); ?>
		<?php echo $form->error($model,'overall'); ?>
	</div>
    <?php } ?>
    
    
    
			 </div>
                <div>
    <div class="row">
		<?php echo $form->labelEx($model,'comment_status'); ?>
		   <?php echo $form->dropDownList($model,'comment_status',array(0=>'Hide', 1=>'Show')); ?>
		<?php echo $form->error($model,'comment_status'); ?>
	</div>
     
                
    <div class="row">
		<?php echo $form->labelEx($model,'comments'); ?>
	    <?php echo $form->textArea($model,'comments', array('id'=>'comments')); ?>
		<?php echo $form->error($model,'comments'); ?>
	</div>

	

	<div class="row">
		<?php echo $form->labelEx($model,'notes'); ?>
		<?php echo $form->textArea($model,'notes',array('id'=>'notes')); ?>
		<?php echo $form->error($model,'notes'); ?>
	</div>
                </div>
            </div>
        </div>


	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save' ,array('class' => 'btn btn-info')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
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
	
	
</script>   
<script type="text/javascript">    CKEDITOR.replace( 'notes' ); </script>        
<script type="text/javascript">    CKEDITOR.replace( 'comments' ); </script>        
       