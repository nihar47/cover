<?php
/* @var $this BusinessCategoryController */
/* @var $data BusinessCategory */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('business_category_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->business_category_id), array('view', 'id'=>$data->business_category_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('business_id')); ?>:</b>
	<?php echo CHtml::encode($data->business_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category_id')); ?>:</b>
	<?php echo CHtml::encode($data->category_id); ?>
	<br />


</div>