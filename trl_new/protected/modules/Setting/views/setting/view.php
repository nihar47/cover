

<h1>
        <?php echo Yii::t("Settings.admin","Settings details"); ?>
        <?php echo CHtml::link(
                Yii::t("Settings.admin", "Manage"),
                array("admin"),
                array("class"=>"btn btn-small pull-right")
        ); ?>
        <?php echo CHtml::link(
                Yii::t("Settings.admin", "Edit"),
                array("update", "id"=>$model->setting_id),
                array("class"=>"btn btn-small pull-right")
        ); ?>
</h1>



<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'setting_id',
		'meta_key',
		'meta_value',
	),
)); ?>
