<?php
/* @var $this BusinessRatingBenefitsController */
/* @var $data BusinessRatingBenefits */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('business_rating_benefits_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->business_rating_benefits_id), array('view', 'id'=>$data->business_rating_benefits_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('image')); ?>:</b>
	<?php echo CHtml::encode($data->image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('business_rating_benefits')); ?>:</b>
	<?php echo CHtml::encode($data->business_rating_benefits); ?>
	<br />


</div>