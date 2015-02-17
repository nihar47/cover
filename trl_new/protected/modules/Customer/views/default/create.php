<h1>
        <?php echo Yii::t("Customer.admin", "Creating"); ?>
        <?php echo CHtml::link(
                Yii::t("Customer.admin", "Manage"),
                array("admin"),
                array("class"=>"btn pull-right")
        ); ?></h1>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>