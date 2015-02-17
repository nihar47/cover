<?php
/* @var $this BusinessRatingBenefitsController */
/* @var $model BusinessRatingBenefits */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row" >
		<?php echo $form->label($model,'business_rating_benefits'); ?>
		 <?php echo $form->textField($model,'business_rating_benefits',array('size'=>60,'maxlength'=>1000 ,'style' => 'width:80%' )); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search' ,array('class' => 'btn btn-info')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->