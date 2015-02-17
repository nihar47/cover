<?php
/* @var $this ListingController */
/* @var $data Listing */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('listing_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->listing_id), array('view', 'id'=>$data->listing_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('listing_type')); ?>:</b>
	<?php echo CHtml::encode($data->listing_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amount')); ?>:</b>
	<?php echo CHtml::encode($data->amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('listing_detail')); ?>:</b>
	<?php echo CHtml::encode($data->listing_detail); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('listing_video')); ?>:</b>
	<?php echo CHtml::encode($data->listing_video); ?>
	<br />


</div>