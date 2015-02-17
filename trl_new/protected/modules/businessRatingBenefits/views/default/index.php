<?php
/* @var $this BusinessRatingBenefitsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Business Rating Benefits',
);

$this->menu=array(
	array('label'=>'Create BusinessRatingBenefits', 'url'=>array('create')),
	array('label'=>'Manage BusinessRatingBenefits', 'url'=>array('admin')),
);
?>

<h1>Business Rating Benefits</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
