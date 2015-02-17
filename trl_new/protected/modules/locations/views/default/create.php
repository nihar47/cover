<?php
/* @var $this LocationsController */
/* @var $model Locations */


?>

<h1>
        <?php echo Yii::t("locations.admin", "Creating"); ?>
        <?php echo CHtml::link(
                Yii::t("locations.admin", "Manage"),
                array("admin"),
                array("class"=>"btn pull-right")
        ); ?></h1>



<?php $this->renderPartial('_form', array('model'=>$model)); ?>