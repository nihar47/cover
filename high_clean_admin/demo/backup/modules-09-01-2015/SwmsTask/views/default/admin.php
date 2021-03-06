<?php
/* @var $this SwmsTaskController */
/* @var $model SwmsTask */

?>

     <div class="pageheader">
        <div class="media">
          <div class="media-body">
            <ul class="breadcrumb">
               <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/?r=Dashboard"><i class="glyphicon glyphicon-home"></i></a></li>
              <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/?r=Swms/default/admin">SWMS</a></li>
              <li>Manage SWMS</li>
            </ul>
            
<h4>			
 <?php
					  
					  echo CHtml::link(
						Yii::t("Swms.create", "Add New SWMS Task/Activity"),
						array("create"),
						array("class"=>"btn btn-primary pull-right")						
					);
					  
?>	</h4>
          </div>
        </div>
        <!-- media --> 
      </div>
      <div class="contentpanel">
        <div class="row">
          <div class="col-md-12 user_section">
            <div class="clearfix"></div>
            <div class="panel panel-default">
              <div class="panel-body titlebar"> <span class="glyphicon  glyphicon-th"></span>
                <h2>SWMS Management</h2>
              </div>
            </div>
            <div class="col-md-12">
              <div class="table-responsive">
			  <div class="col-md-12 pull-right mb10 pr0" style="text-align:right">
			  


<?php 

// CgridView Records/page
$pageSize = Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']);

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'swms-grid',
	'dataProvider'=>$model->search(),
	'itemsCssClass' => 'table table-bordered mb30 quote_table',
	'pagerCssClass'=>'pagination',
	'filter'=>$model,
	'columns'=>array(
		
		array(
                'name'=>'task',
                'header'=>'SWMS Type',
                'headerHtmlOptions'=>array('class'=>'head'),
            ),
				
	
	array(
		'name' => 'swms_id',
		'header' => 'SWMS Type',
		'headerHtmlOptions'=>array('class'=>'head'),
		'filter' => CHtml::listData(Swms::model()->findAll(), 'id', 'name'), // fields from country table
		'value' => 'Swms::Model()->FindByPk($data->swms_id)->name',
	),
	
	


/*'consequences',*/
		array(
			'class'=>'CButtonColumn',
			'header'=>CHtml::dropDownList('pageSize',$pageSize,array(10=>10,20=>20,25=>25,50=>50,100=>100,150=>150,200=>200),
			array(
			'onchange'=>"$.fn.yiiGridView.update('user-grid',{ data:{pageSize: $(this).val() }})",
			)),	
			'headerHtmlOptions'=>array('width'=>'300','class'=>'head'),
			'template'=>'{view} | {update} | {delete}',
						'buttons'=>array
						(
							
	
	'view' => array
	(
		'label'=>'View',
		'imageUrl'=>null,
	),
		
	'update' => array
	(
		'label'=>'Edit',
		'imageUrl'=>null,
	),
	
	'delete' => array
	(
		'label'=>'Delete',
		'imageUrl'=>null,
	),
	
						
						),
			
			
			
			
			
			
		),
	),
)); ?>




		   </div>
              <!-- table-responsive --> 
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
      <!-- contentpanel -->
  