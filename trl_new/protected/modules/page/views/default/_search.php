<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<!--<div class="row">
		<?php echo $form->label($model,'PageID'); ?>
		<?php echo $form->textField($model,'PageID'); ?>
	</div>-->

	<div class="row">
		<?php echo $form->label($model,'Page_Name'); ?>
		<?php echo $form->textField($model,'Page_Name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<!--<div class="row">
		<?php echo $form->label($model,'Meta_Title'); ?>
		<?php echo $form->textArea($model,'Meta_Title',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Meta_Keywords'); ?>
		<?php echo $form->textArea($model,'Meta_Keywords',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Meta_Description'); ?>
		<?php echo $form->textArea($model,'Meta_Description',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Page_Description'); ?>
		<?php echo $form->textField($model,'Page_Description'); ?>
	</div>-->

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search',array('class' => 'btn btn-info')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->