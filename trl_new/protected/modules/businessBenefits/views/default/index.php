<?php
/* @var $this BusinessBenefitsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Business Benefits',
);

$this->menu=array(
	array('label'=>'Create BusinessBenefits', 'url'=>array('create')),
	array('label'=>'Manage BusinessBenefits', 'url'=>array('admin')),
);
?>

<h1>Business Benefits</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
