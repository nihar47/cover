<?php
/* @var $this EmailFormatController */
/* @var $model EmailFormat */


?>



<h1 class="inner_title manage_email" ><?php echo Yii::t('emailFormat.admin','E-mail Format management'); ?></h1>
<?php echo CHtml::link(
         Yii::t('emailFormat.admin','Create'), 
        array('create'),
        array('class'=>'btn btn-info')
); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'email-format-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		//'email_format_ID',
		 array(
                        'header'=>'No.',
                        'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
                        'htmlOptions'=>array(
                                'width'=>'25',
                                'class'=>'centered'
                        )
                ),
		'email_format_name',
		//'email_format',
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
