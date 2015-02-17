<h1>
        <?php echo Yii::t("Settings.admin", "Editing"); ?>
        <?php echo CHtml::link(
                Yii::t("Settings.admin", "Manage"),
                array("admin"),
                array("class"=>"btn pull-right")
        ); ?></h1>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>