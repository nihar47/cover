<?php
/* @var $this BusinessLocationController */
/* @var $model BusinessLocation */

$this->breadcrumbs=array(
	'Business Locations'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BusinessLocation', 'url'=>array('index')),
	array('label'=>'Manage BusinessLocation', 'url'=>array('admin')),
);
?>

<h1>Create BusinessLocation</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>