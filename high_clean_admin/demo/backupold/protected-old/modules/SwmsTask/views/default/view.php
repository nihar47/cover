<?php
/* @var $this SwmsTaskController */
/* @var $model SwmsTask */

$this->breadcrumbs=array(
	'Swms Tasks'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SwmsTask', 'url'=>array('index')),
	array('label'=>'Create SwmsTask', 'url'=>array('create')),
	array('label'=>'Update SwmsTask', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SwmsTask', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SwmsTask', 'url'=>array('admin')),
);
?>

<h1>View SwmsTask #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'task',
		'swms_id',
	),
)); ?>
