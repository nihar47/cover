<?php
/* @var $this BusinessBenefitsController */
/* @var $model BusinessBenefits */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>



	<div class="row">
		<?php echo $form->label($model,'business_benefits'); ?>
	    <?php echo $form->textArea($model,'business_benefits',array('rows'=>6, 'cols'=>50, 'style' => 'width:80%'  )); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
	     <?php echo $form->dropDownList($model,'status',array("Active"=>"Active","InActive"=>"InActive")); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search',array('class' => 'btn btn-info')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->