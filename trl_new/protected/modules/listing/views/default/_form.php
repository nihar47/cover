<?php
/* @var $this ListingController */
/* @var $model Listing */
/* @var $form CActiveForm */
?>

<div class="form form-horizontal well well-small">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'listing-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

<div id="horizontalTab">
            <ul class="resp-tabs-list">
                <li>Listing Type</li>
             </ul>
            <div class="resp-tabs-container">
                <div>
                   <p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'listing_type'); ?>
		<?php echo $form->textField($model,'listing_type',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'listing_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'amount'); ?>
		<?php echo $form->textField($model,'amount'); ?>
		<?php echo $form->error($model,'amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'listing_video'); ?>
		<?php echo $form->textField($model,'listing_video',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'listing_video'); ?>
	</div>

    <div class="row">
		<?php echo $form->labelEx($model,'listing_detail'); ?>
		<?php echo $form->textArea($model, 'listing_detail', array('id'=>'listing_detail')); ?>
		<?php echo $form->error($model,'listing_detail'); ?>
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
<script type="text/javascript">    CKEDITOR.replace( 'listing_detail' ); </script>