<?php
/* @var $this BusinessController */
/* @var $model Business */


?>
<h1>
        <?php echo Yii::t("business.admin", "Editing"); ?>
        <?php echo CHtml::link(
                Yii::t("business.admin", "Manage"),
                array("admin"),
                array("class"=>"btn pull-right")
        ); ?></h1>



<?php $this->renderPartial('_update_form', array('model'=>$model )); ?>