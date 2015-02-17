<?php
/* @var $this BusinessCategoryController */
/* @var $model BusinessCategory */

$this->breadcrumbs=array(
	'Business Categories'=>array('index'),
	$model->business_location_id=>array('view','id'=>$model->business_location_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List BusinessCategory', 'url'=>array('index')),
	array('label'=>'Create BusinessCategory', 'url'=>array('create')),
	array('label'=>'View BusinessCategory', 'url'=>array('view', 'id'=>$model->business_location_id)),
	array('label'=>'Manage BusinessCategory', 'url'=>array('admin')),
);
?>

<h1>Update BusinessCategory <?php echo $model->business_location_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>