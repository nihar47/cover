<?php
/* @var $this FaqController */
/* @var $model Faq */


?>




<h1>
        <?php echo Yii::t("faq.admin","FAQ details"); ?>
        <?php echo CHtml::link(
                Yii::t("faq.admin", "Manage"),
                array("admin"),
                array("class"=>"btn btn-small pull-right")
        ); ?>
        <?php echo CHtml::link(
                Yii::t("faq.admin", "Edit"),
                array("update", "id"=>$model->faq_ID),
                array("class"=>"btn btn-small pull-right")
        ); ?>
</h1>




<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'faq_ID',
		'faq_question',
		'faq_answer',
		'status',
	),
)); ?>
