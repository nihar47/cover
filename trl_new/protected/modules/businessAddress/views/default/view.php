<?php
/* @var $this BusinessAddressController */
/* @var $model BusinessAddress */


?>

<h1>View BusinessAddress #<?php echo $model->address_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'address_id',
		'business_id',
		'address',
	),
)); ?>
