<?php
/* @var $this FaqController */
/* @var $data Faq */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('faq_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->faq_ID), array('view', 'id'=>$data->faq_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('faq_question')); ?>:</b>
	<?php echo CHtml::encode($data->faq_question); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('faq_answer')); ?>:</b>
	<?php echo CHtml::encode($data->faq_answer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />


</div>