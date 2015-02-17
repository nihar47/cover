
<h1>
        <?php echo Yii::t("AdminUser.admin","Admin User details"); ?>
        <?php echo CHtml::link(
                Yii::t("AdminUser.admin", "Manage"),
                array("admin"),
                array("class"=>"btn btn-small pull-right")
        ); ?>
        <?php echo CHtml::link(
                Yii::t("AdminUser.admin", "Edit"),
                array("update", "id"=>$model->id),
                array("class"=>"btn btn-small pull-right")
        ); ?>
</h1>


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'first_name',
		'last_name',
		'username',
		'email',
	 array(
                        'name'=>'date_added',
                        'value'=>Yii::app()->dateFormatter->format("d MMM y",strtotime($data->date_added))
                    ),
	
	),
)); ?>
