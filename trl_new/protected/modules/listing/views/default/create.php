<?php
/* @var $this ListingController */
/* @var $model Listing */


?>


<h1>
        <?php echo Yii::t("listing.admin", "Creating"); ?>
        <?php echo CHtml::link(
                Yii::t("listing.admin", "Manage"),
                array("admin"),
                array("class"=>"btn pull-right")
        ); ?></h1>



<?php $this->renderPartial('_form', array('model'=>$model)); ?>