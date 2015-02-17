<?php
/* @var $this CcdetailsController */
/* @var $model Ccdetails */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ccdetails-Ccdetails_update-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'business_id'); ?>
		<?php echo $form->textField($model,'business_id'); ?>
		<?php echo $form->error($model,'business_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name_on_card'); ?>
		<?php echo $form->textField($model,'name_on_card'); ?>
		<?php echo $form->error($model,'name_on_card'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'business_address'); ?>
		<?php echo $form->textField($model,'business_address'); ?>
		<?php echo $form->error($model,'business_address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'city'); ?>
		<?php echo $form->textField($model,'city'); ?>
		<?php echo $form->error($model,'city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'state'); ?>
		<?php echo $form->textField($model,'state'); ?>
		<?php echo $form->error($model,'state'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'zip'); ?>
		<?php echo $form->textField($model,'zip'); ?>
		<?php echo $form->error($model,'zip'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'card_number'); ?>
		<?php echo $form->textField($model,'card_number'); ?>
		<?php echo $form->error($model,'card_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'expiration_mnt'); ?>
		<?php echo $form->textField($model,'expiration_mnt'); ?>
		<?php echo $form->error($model,'expiration_mnt'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'expiration_year'); ?>
		<?php echo $form->textField($model,'expiration_year'); ?>
		<?php echo $form->error($model,'expiration_year'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ccv'); ?>
		<?php echo $form->textField($model,'ccv'); ?>
		<?php echo $form->error($model,'ccv'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'modified_dt'); ?>
		<?php echo $form->textField($model,'modified_dt'); ?>
		<?php echo $form->error($model,'modified_dt'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_dt'); ?>
		<?php echo $form->textField($model,'created_dt'); ?>
		<?php echo $form->error($model,'created_dt'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->