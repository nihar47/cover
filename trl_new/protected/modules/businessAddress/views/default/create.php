<?php
/* @var $this BusinessAddressController */
/* @var $model BusinessAddress */

$this->breadcrumbs=array(
	'Business Addresses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BusinessAddress', 'url'=>array('index')),
	array('label'=>'Manage BusinessAddress', 'url'=>array('admin')),
);
?>

<h1>Create BusinessAddress</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>