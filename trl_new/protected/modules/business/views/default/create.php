<h1>
        <?php echo Yii::t("business.admin", "Creating"); ?>
        <?php echo CHtml::link(
                Yii::t("business.admin", "Manage"),
                array("admin"),
                array("class"=>"btn pull-right")
        ); ?></h1>

<!-- Create busineess form-->
<?php $this->renderPartial('_form', array('model'=>$model,'BusinessAddress'=>$BusinessAddress , 'BusinessCategory'=>$BusinessCategory , 'BusinessLocation'=>$BusinessLocation )); ?>
<!-- Create busineess form-->