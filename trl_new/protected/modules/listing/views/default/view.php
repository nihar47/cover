<?php
/* @var $this ListingController */
/* @var $model Listing */


?>
<h1>
        <?php echo Yii::t("listing.admin","Listing details"); ?>
        <?php echo CHtml::link(
                Yii::t("listing.admin", "Manage"),
                array("admin"),
                array("class"=>"btn btn-small pull-right")
        ); ?>
        <?php echo CHtml::link(
                Yii::t("listing.admin", "Edit"),
                array("update", "id"=>$model->listing_id),
                array("class"=>"btn btn-small pull-right")
        ); ?>
</h1>



<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'listing_id',
		'listing_type',
		'amount',
		'listing_detail',
		'listing_video',
	),
)); ?>
