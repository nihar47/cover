<?php
/* @var $this LocationsController */
/* @var $model Locations */



?>

<h1 class="inner_title manage_locations" ><?php echo Yii::t('locations.admin','location management'); ?></h1>
<?php echo CHtml::link(
         Yii::t('locations.admin','Create'), 
        array('create'),
        array('class'=>'btn btn-info')
); ?>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'locations-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		 array(
                        'header'=>'No.',
                        'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
                        'htmlOptions'=>array(
                                'width'=>'25',
                                'class'=>'centered'
                        )
                ),
		'city',
		'zip',
		'state_cc',
		'state',
		'lat',
		'lon',
	
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
