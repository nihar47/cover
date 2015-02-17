<h1>
        <?php echo Yii::t("AdminUser.admin", "Editing"); ?>
        <?php echo CHtml::link(
                Yii::t("AdminUser.admin", "Manage"),
                array("admin"),
                array("class"=>"btn pull-right")
        ); ?></h1>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>