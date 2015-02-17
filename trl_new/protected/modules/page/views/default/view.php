<h1>
        <?php echo Yii::t("page.admin","Page details"); ?>
        <?php echo CHtml::link(
                Yii::t("page.admin", "Manage"),
                array("admin"),
                array("class"=>"btn btn-small pull-right")
        ); ?>
        <?php echo CHtml::link(
                Yii::t("page.admin", "Edit"),
                array("update", "id"=>$model->PageID),
                array("class"=>"btn btn-small pull-right")
        ); ?>
</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'PageID',
		'Page_Name',
		'Meta_Title',
		'Meta_Keywords',
		'Meta_Description',
		'Page_Description',
	),
)); ?>
