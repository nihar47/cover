<?php
/* @var $this BusinessBenefitsController */
/* @var $model BusinessBenefits */


?>
<h1>
        <?php echo Yii::t("businessBenefits.admin","Listing Benefits details"); ?>
        <?php echo CHtml::link(
                Yii::t("businessBenefits.admin", "Manage"),
                array("admin"),
                array("class"=>"btn btn-small pull-right")
        ); ?>
        <?php echo CHtml::link(
                Yii::t("businessBenefits.admin", "Edit"),
                array("update", "id"=>$model->business_benefits_ID),
                array("class"=>"btn btn-small pull-right")
        ); ?>
</h1>




<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'business_benefits_ID',
		'business_benefits',
		'status',
	),
)); ?>
