<h1>
        <?php echo Yii::t("Customer.admin","Customer details"); ?>
        <?php echo CHtml::link(
                Yii::t("Customer.admin", "Manage"),
                array("admin"),
                array("class"=>"btn btn-small pull-right")
        ); ?>
        <?php echo CHtml::link(
                Yii::t("Customer.admin", "Edit"),
                array("update", "id"=>$model->user_id),
                array("class"=>"btn btn-small pull-right")
        ); ?>
</h1>



<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'user_id',
		//'business_id',
		//'allow_access',
		
		array(
            'name' => 'allow_access',
            'value' => $model->allow_access==1?'Grant Access':'Access Denied'
        ),
		
		'business.business_name',
		'date_requested',
		'full_name',
		'email_address',
		
		'access_granted',
		'last_send_reminder',
		//'date_posted',
		'ediable_date',
		/*'qulity',
		'value',
		'timeliness',
		'experience',
		'satisfaction',
		'overall',
		'comments',
		'comment_status',
		'notes',*/
	),
)); ?>
