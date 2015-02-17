<?php
/* @var $this ListingController */
/* @var $model Listing */


?>



<h1 class="inner_title listing_type" ><?php echo Yii::t('listing.admin','Listing management'); ?></h1>
<?php echo CHtml::link(
         Yii::t('listing.admin','Create'), 
        array('create'),
        array('class'=>'btn btn-info')
); ?>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'listing-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		 array(
                        'header'=>'No.',
                        'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
                        'htmlOptions'=>array(
                                'width'=>'25',
                                'class'=>'centered'
                        )
                ),
		'listing_type',
		'amount',
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
