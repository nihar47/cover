<?php
/* @var $this SettingController */
/* @var $data Setting */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('setting_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->setting_id), array('view', 'id'=>$data->setting_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('meta_key')); ?>:</b>
	<?php echo CHtml::encode($data->meta_key); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('meta_value')); ?>:</b>
	<?php echo CHtml::encode($data->meta_value); ?>
	<br />


</div>