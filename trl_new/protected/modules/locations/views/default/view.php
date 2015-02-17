<?php
/* @var $this LocationsController */
/* @var $model Locations */




?>

<h1>
        <?php echo Yii::t("locations.admin","location details"); ?>
        <?php echo CHtml::link(
                Yii::t("locations.admin", "Manage"),
                array("admin"),
                array("class"=>"btn btn-small pull-right")
        ); ?>
        <?php echo CHtml::link(
                Yii::t("locations.admin", "Edit"),
                array("update", "id"=>$model->id),
                array("class"=>"btn btn-small pull-right")
        ); ?>
</h1>



<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'zip',
		'lat',
		'lon',
		'city',
		'state_cc',
		'state',
	),
)); ?>
