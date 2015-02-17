<?php
/* @var $this BusinessRatingBenefitsController */
/* @var $model BusinessRatingBenefits */



?>


<h1 class="inner_title manage_benifits"><?php echo Yii::t('businessRatingBenefits.admin','Rating Benefits management'); ?></h1>
<?php echo CHtml::link(
         Yii::t('businessRatingBenefits.admin','Create'), 
        array('create'),
        array('class'=>'btn btn-info')
); ?>





<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'business-rating-benefits-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'business_rating_benefits_id',
		 array(
                        'header'=>'No.',
                        'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
                        'htmlOptions'=>array(
                                'width'=>'25',
                                'class'=>'centered'
                        )
                ),
		//'image',
		'business_rating_benefits',
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
