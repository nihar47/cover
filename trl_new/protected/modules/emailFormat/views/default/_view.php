<?php
/* @var $this EmailFormatController */
/* @var $data EmailFormat */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('email_format_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->email_format_ID), array('view', 'id'=>$data->email_format_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email_format_name')); ?>:</b>
	<?php echo CHtml::encode($data->email_format_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email_format')); ?>:</b>
	<?php echo CHtml::encode($data->email_format); ?>
	<br />


</div>