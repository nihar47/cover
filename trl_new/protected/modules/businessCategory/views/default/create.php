<?php
/* @var $this BusinessCategoryController */
/* @var $model BusinessCategory */

$this->breadcrumbs=array(
	'Business Categories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BusinessCategory', 'url'=>array('index')),
	array('label'=>'Manage BusinessCategory', 'url'=>array('admin')),
);
?>

<h1>Create BusinessCategory</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>