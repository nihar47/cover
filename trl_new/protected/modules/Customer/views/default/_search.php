<?php
/* @var $this CustomerController */
/* @var $model Customer */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'business_id'); ?>
		<?php echo $form->textField($model,'business_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_requested'); ?>
		<?php echo $form->textField($model,'date_requested'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'full_name'); ?>
		<?php echo $form->textField($model,'full_name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email_address'); ?>
		<?php echo $form->textField($model,'email_address',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'allow_access'); ?>
		<?php echo $form->textField($model,'allow_access',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'access_granted'); ?>
		<?php echo $form->textField($model,'access_granted'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'last_send_reminder'); ?>
		<?php echo $form->textField($model,'last_send_reminder'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_posted'); ?>
		<?php echo $form->textField($model,'date_posted'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ediable_date'); ?>
		<?php echo $form->textField($model,'ediable_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'qulity'); ?>
		<?php echo $form->textField($model,'qulity'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'value'); ?>
		<?php echo $form->textField($model,'value'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'timeliness'); ?>
		<?php echo $form->textField($model,'timeliness'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'experience'); ?>
		<?php echo $form->textField($model,'experience'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'satisfaction'); ?>
		<?php echo $form->textField($model,'satisfaction'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'overall'); ?>
		<?php echo $form->textField($model,'overall'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'comments'); ?>
		<?php echo $form->textField($model,'comments'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'comment_status'); ?>
		<?php echo $form->textField($model,'comment_status',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'notes'); ?>
		<?php echo $form->textArea($model,'notes',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->