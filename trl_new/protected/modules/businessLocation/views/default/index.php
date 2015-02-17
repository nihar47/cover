<?php
/* @var $this BusinessLocationController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Business Locations',
);

$this->menu=array(
	array('label'=>'Create BusinessLocation', 'url'=>array('create')),
	array('label'=>'Manage BusinessLocation', 'url'=>array('admin')),
);
?>

<h1>Business Locations</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
