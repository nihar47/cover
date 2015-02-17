<?php
/* @var $this FaqController */
/* @var $model Faq */


?>

<h1 class="inner_title faq"><?php echo Yii::t('faq.admin','FAQ management'); ?></h1>
<?php echo CHtml::link(
         Yii::t('faq.admin','Create'), 
        array('create'),
        array('class'=>'btn btn-info')
); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'faq-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'faq_ID',
		   array(
                        'header'=>'No.',
                        'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
                        'htmlOptions'=>array(
                                'width'=>'25',
                                'class'=>'centered'
                        )
                ),
		'faq_question',
		'faq_answer',
		'status',
		 array(
                        'id'=>'autoId',
                        'class'=>'CCheckBoxColumn',
                        'selectableRows'=>2,
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
