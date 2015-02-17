<h1>
        <?php echo Yii::t("page.admin", "Creating"); ?>
        <?php echo CHtml::link(
                Yii::t("page.admin", "Manage"),
                array("admin"),
                array("class"=>"btn pull-right")
        ); ?></h1>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>