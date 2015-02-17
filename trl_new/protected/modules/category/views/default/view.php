<?php
/* @var $this CategoryController */
/* @var $model Category */


?>

<h1>
        <?php echo Yii::t("category.admin","Category details"); ?>
        <?php echo CHtml::link(
                Yii::t("category.admin", "Manage"),
                array("admin"),
                array("class"=>"btn btn-small pull-right")
        ); ?>
        <?php echo CHtml::link(
                Yii::t("category.admin", "Edit"),
                array("update", "id"=>$model->category_id),
                array("class"=>"btn btn-small pull-right")
        ); ?>
</h1>



<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'category_id',
		'parent_id',
		'name',
		'description',
		//'sort_order',
		'status',
		//'date_added',
		//'date_modified',
	),
)); ?>
