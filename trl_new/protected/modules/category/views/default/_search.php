<?php
/* @var $this CategoryController */
/* @var $model Category */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	
	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
	</div>
    
    <div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php //echo $form->textField($model,'status'); ?>
        <?php echo $form->dropDownList($model,'status',array("Active"=>"Active","InActive"=>"InActive")); ?>
	</div>



	<div class="row buttons">
		<?php echo CHtml::submitButton('Search',array('class' => 'btn btn-info')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->