<?php
/* @var $this BusinessLocationController */
/* @var $model BusinessLocation */

$this->breadcrumbs=array(
	'Business Locations'=>array('index'),
	$model->business_location_id=>array('view','id'=>$model->business_location_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List BusinessLocation', 'url'=>array('index')),
	array('label'=>'Create BusinessLocation', 'url'=>array('create')),
	array('label'=>'View BusinessLocation', 'url'=>array('view', 'id'=>$model->business_location_id)),
	array('label'=>'Manage BusinessLocation', 'url'=>array('admin')),
);
?>

<h1>Update BusinessLocation <?php echo $model->business_location_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>