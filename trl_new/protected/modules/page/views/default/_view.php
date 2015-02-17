<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('PageID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->PageID), array('view', 'id'=>$data->PageID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Page_Name')); ?>:</b>
	<?php echo CHtml::encode($data->Page_Name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Meta_Title')); ?>:</b>
	<?php echo CHtml::encode($data->Meta_Title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Meta_Keywords')); ?>:</b>
	<?php echo CHtml::encode($data->Meta_Keywords); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Meta_Description')); ?>:</b>
	<?php echo CHtml::encode($data->Meta_Description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Page_Description')); ?>:</b>
	<?php echo CHtml::encode($data->Page_Description); ?>
	<br />


</div>