<?php
/* @var $this BusinessCategoryController */
/* @var $model BusinessCategory */

$this->breadcrumbs=array(
	'Business Categories'=>array('index'),
	$model->business_location_id,
);

$this->menu=array(
	array('label'=>'List BusinessCategory', 'url'=>array('index')),
	array('label'=>'Create BusinessCategory', 'url'=>array('create')),
	array('label'=>'Update BusinessCategory', 'url'=>array('update', 'id'=>$model->business_location_id)),
	array('label'=>'Delete BusinessCategory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->business_location_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BusinessCategory', 'url'=>array('admin')),
);
?>

<h1>View BusinessCategory #<?php echo $model->business_location_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'business_location_id',
		'business_id',
		'category_id',
	),
)); ?>
