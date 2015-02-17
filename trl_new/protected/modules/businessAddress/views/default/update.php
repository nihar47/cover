<?php
/* @var $this BusinessAddressController */
/* @var $model BusinessAddress */

$this->breadcrumbs=array(
	'Business Addresses'=>array('index'),
	$model->address_id=>array('view','id'=>$model->address_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List BusinessAddress', 'url'=>array('index')),
	array('label'=>'Create BusinessAddress', 'url'=>array('create')),
	array('label'=>'View BusinessAddress', 'url'=>array('view', 'id'=>$model->address_id)),
	array('label'=>'Manage BusinessAddress', 'url'=>array('admin')),
);
?>

<h1>Update BusinessAddress <?php echo $model->address_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>