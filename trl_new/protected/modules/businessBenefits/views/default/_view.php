<?php
/* @var $this BusinessBenefitsController */
/* @var $data BusinessBenefits */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('business_benefits_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->business_benefits_ID), array('view', 'id'=>$data->business_benefits_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('business_benefits')); ?>:</b>
	<?php echo CHtml::encode($data->business_benefits); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />


</div>