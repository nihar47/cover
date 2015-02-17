<?php
/* @var $this BusinessRatingBenefitsController */
/* @var $model BusinessRatingBenefits */


?>


<h1>
        <?php echo Yii::t("businessRatingBenefits.admin", "Editing"); ?>
        <?php echo CHtml::link(
                Yii::t("businessRatingBenefits.admin", "Manage"),
                array("admin"),
                array("class"=>"btn pull-right")
        ); ?></h1>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>