<?php
/* @var $this BusinessRatingBenefitsController */
/* @var $model BusinessRatingBenefits */


?>



<h1>
        <?php echo Yii::t("businessRatingBenefits.admin","Rating Benefits details"); ?>
        <?php echo CHtml::link(
                Yii::t("businessRatingBenefits.admin", "Manage"),
                array("admin"),
                array("class"=>"btn btn-small pull-right")
        ); ?>
        <?php echo CHtml::link(
                Yii::t("businessRatingBenefits.admin", "Edit"),
                array("update", "id"=>$model->business_rating_benefits_id),
                array("class"=>"btn btn-small pull-right")
        ); ?>
</h1>




<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'business_rating_benefits_id',
		//'image',
		//'business_rating_benefits',
	),
)); ?>

<table id="yw0" class="detail-view">
<tbody><tr class="odd"><th>Image</th><td><?php echo CHtml::image(Yii::app()->request->baseUrl.'/uploads/rating_benefits/'.$model->image,"image"); ?>  </td></tr>
<tr class="even"><th>Rating Benefits</th><td><?php echo $model->business_rating_benefits; ?></td></tr>
</tbody></table>