<?php
/* @var $this BusinessLocationController */
/* @var $data BusinessLocation */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('business_location_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->business_location_id), array('view', 'id'=>$data->business_location_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('business_id')); ?>:</b>
	<?php echo CHtml::encode($data->business_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('location_id')); ?>:</b>
	<?php echo CHtml::encode($data->location_id); ?>
	<br />


</div>