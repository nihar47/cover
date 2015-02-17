<?php
/* @var $this CustomerController */
/* @var $data Customer */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->user_id), array('view', 'id'=>$data->user_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('business_id')); ?>:</b>
	<?php echo CHtml::encode($data->business_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_requested')); ?>:</b>
	<?php echo CHtml::encode($data->date_requested); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('full_name')); ?>:</b>
	<?php echo CHtml::encode($data->full_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email_address')); ?>:</b>
	<?php echo CHtml::encode($data->email_address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('allow_access')); ?>:</b>
	<?php echo CHtml::encode($data->allow_access); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('access_granted')); ?>:</b>
	<?php echo CHtml::encode($data->access_granted); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('last_send_reminder')); ?>:</b>
	<?php echo CHtml::encode($data->last_send_reminder); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_posted')); ?>:</b>
	<?php echo CHtml::encode($data->date_posted); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ediable_date')); ?>:</b>
	<?php echo CHtml::encode($data->ediable_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('qulity')); ?>:</b>
	<?php echo CHtml::encode($data->qulity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('value')); ?>:</b>
	<?php echo CHtml::encode($data->value); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('timeliness')); ?>:</b>
	<?php echo CHtml::encode($data->timeliness); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('experience')); ?>:</b>
	<?php echo CHtml::encode($data->experience); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('satisfaction')); ?>:</b>
	<?php echo CHtml::encode($data->satisfaction); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('overall')); ?>:</b>
	<?php echo CHtml::encode($data->overall); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comments')); ?>:</b>
	<?php echo CHtml::encode($data->comments); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comment_status')); ?>:</b>
	<?php echo CHtml::encode($data->comment_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('notes')); ?>:</b>
	<?php echo CHtml::encode($data->notes); ?>
	<br />

	*/ ?>

</div>