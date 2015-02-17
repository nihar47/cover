<?php
/* @var $this CategoryController */
/* @var $model Category */



$this->menu=array(
	array('label'=>'List Category', 'url'=>array('index')),
	array('label'=>'Create Category', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#category-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>



<h1 class="inner_title web_category"><?php echo Yii::t('category.admin','Category management'); ?></h1>
<?php echo CHtml::link(
         Yii::t('category.admin','Create'), 
        array('create'),
        array('class'=>'btn btn-info')
); ?>






<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'category-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'category_id',
		 array(
                        'header'=>'No.',
                        'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
                        'htmlOptions'=>array(
                                'width'=>'25',
                                'class'=>'centered'
                        )
                ),
		//'parent_id',
		'name',
		//'description',
		
		
		//'date_added',
		/*'date_modified',
		*/
		
		 array(
                        'name'=>'date_added',
                        'header'=>'Date Added',
                        //'value'=>'date("d M Y",strtotime($data["work_date"]))'
                        'value'=>'Yii::app()->dateFormatter->format("d MMM y",strtotime($data->date_added))'
                    ),
		//'sort_order',			
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
