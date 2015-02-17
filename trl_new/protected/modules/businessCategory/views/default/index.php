<?php
/* @var $this BusinessCategoryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Business Categories',
);

$this->menu=array(
	array('label'=>'Create BusinessCategory', 'url'=>array('create')),
	array('label'=>'Manage BusinessCategory', 'url'=>array('admin')),
);
?>

<h1>Business Categories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
