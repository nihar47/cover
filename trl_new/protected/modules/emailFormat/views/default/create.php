<?php
/* @var $this EmailFormatController */
/* @var $model EmailFormat */


?>

<h1>
        <?php echo Yii::t("emailFormat.admin", "Creating"); ?>
        <?php echo CHtml::link(
                Yii::t("emailFormat.admin", "Manage"),
                array("admin"),
                array("class"=>"btn pull-right")
        ); ?></h1>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>