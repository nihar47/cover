

<h1 class="inner_title dashboard"><?php echo Yii::t('AdminUser.admin','Admin User management'); ?></h1>

<?php echo CHtml::link(
         Yii::t('AdminUser.admin','Create'), 
        array('create'),
        array('class'=>'btn btn-info')
); ?>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'admin-user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		
		array(
                        'header'=>'No.',
                        'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
                        'htmlOptions'=>array(
                                'width'=>'25',
                                'class'=>'centered'
                        )
                ),
		'first_name',
		'last_name',
		'username',
		//'password',
		'email',
		/*
		'last_logined',
		'salt',
		'ip_address',
		'date_added',
		*/
		array(
                        'name'=>'date_added',
                        'value'=>'Yii::app()->dateFormatter->format("d MMM y",strtotime($data->date_added))'
                    ),
		
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
