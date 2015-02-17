<?php
/* @var $this BusinessLocationController */
/* @var $model BusinessLocation */

$this->breadcrumbs=array(
	'Business Locations'=>array('index'),
	$model->business_location_id,
);

$this->menu=array(
	array('label'=>'List BusinessLocation', 'url'=>array('index')),
	array('label'=>'Create BusinessLocation', 'url'=>array('create')),
	array('label'=>'Update BusinessLocation', 'url'=>array('update', 'id'=>$model->business_location_id)),
	array('label'=>'Delete BusinessLocation', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->business_location_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BusinessLocation', 'url'=>array('admin')),
);
?>

<h1>View BusinessLocation #<?php echo $model->business_location_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'business_location_id',
		'business_id',
		'location_id',
	),
)); ?>
