<!-- -->
<h1 class="inner_title business" ><?php echo Yii::t('business.admin','Business management'); ?></h1>
<?php echo CHtml::link(
         Yii::t('business.admin','Create'), 
        array('create'),
        array('class'=>'btn btn-info')
); ?>


<!--  Show business records on grid View-->



<?php

 $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'business-grid',
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
		'owner_name',
		'business_name',
		
		
		'email',
		'phone',
		 array(
                        'name'=>'date_added',
                        'value'=>'Yii::app()->dateFormatter->format("d MMM y",strtotime($data->date_added))'
                    ),
		'status',
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

<!--  Show business records on grid View-->
