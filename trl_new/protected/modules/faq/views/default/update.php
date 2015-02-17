<?php
/* @var $this FaqController */
/* @var $model Faq */


?>

<h1>
        <?php echo Yii::t("faq.admin", "Editing"); ?>
        <?php echo CHtml::link(
                Yii::t("faq.admin", "Manage"),
                array("admin"),
                array("class"=>"btn pull-right")
        ); ?></h1>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>