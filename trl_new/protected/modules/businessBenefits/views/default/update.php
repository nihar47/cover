<?php
/* @var $this BusinessBenefitsController */
/* @var $model BusinessBenefits */


?>
<h1>
        <?php echo Yii::t("businessBenefits.admin", "Editing"); ?>
        <?php echo CHtml::link(
                Yii::t("businessBenefits.admin", "Manage"),
                array("admin"),
                array("class"=>"btn pull-right")
        ); ?></h1>



<?php $this->renderPartial('_form', array('model'=>$model)); ?>