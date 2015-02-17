<?php
/* @var $this CategoryController */
/* @var $model Category */


?>
<h1>
        <?php echo Yii::t("category.admin", "Creating"); ?>
        <?php echo CHtml::link(
                Yii::t("category.admin", "Manage"),
                array("admin"),
                array("class"=>"btn pull-right")
        ); ?></h1>



<?php $this->renderPartial('_form', array('model'=>$model)); ?>