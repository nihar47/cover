<?php
/* @var $this BusinessAddressController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Business Addresses',
);

$this->menu=array(
	array('label'=>'Create BusinessAddress', 'url'=>array('create')),
	array('label'=>'Manage BusinessAddress', 'url'=>array('admin')),
);
?>

<h1>Business Addresses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
