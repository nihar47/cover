<h1 class="inner_title business"><?php echo Yii::t('Customer.admin','Customer management'); ?></h1>

<?php echo CHtml::link(
         Yii::t('Customer.admin','Create'), 
        array('create'),
        array('class'=>'btn btn-info')
); ?>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'customer-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'user_id',
		 	 array(
                        'header'=>'No.',
                        'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
                        'htmlOptions'=>array(
                                'width'=>'25',
                                'class'=>'centered'
                        )
                ),
		//'business.business_name',
		 array(
                        'name'=>'date_requested',
                        'value'=>'Yii::app()->dateFormatter->format("d MMM y",strtotime($data->date_requested))'
                    ),
		
		'full_name',
		'email_address',
		//'allow_access',
		
		  array(
                        'name'=>'allow_access',
                        'filter'=>array(1=>'Grant Access', 0=>'Access Denied'),
                        'value'=>'UHelper::attributeToggler($data, "allow_access")',
                        'type'=>'raw',
                        'htmlOptions'=>array(
                                'width'=>'130',
                                'style'=>'text-align:center',
                        )
                ),
	
		
		
		/*
		'access_granted',
		'last_send_reminder',
		'date_posted',
		'ediable_date',
		'qulity',
		'value',
		'timeliness',
		'experience',
		'satisfaction',
		'overall',
		'comments',
		'comment_status',
		'notes',
		*/
				array(
			'class'=>'CButtonColumn',
			 'template'=>'{view}{update}{delete}',
			 'buttons'=>array
						(
							'view' => array
							(
								'label'=>'View',
								'imageUrl'=>Yii::app()->request->baseUrl.'/css/back/images/view.png',
							),
							
							'update' => array
							(
								'label'=>'update',
								'imageUrl'=>Yii::app()->request->baseUrl.'/css/back/images/update.png',
							),
							
							'delete' => array
							(
								'label'=>'delete',
								'imageUrl'=>Yii::app()->request->baseUrl.'/css/back/images/delete.png',
							),
							
						
						),
			 
			 
		),
	),
)); ?>
