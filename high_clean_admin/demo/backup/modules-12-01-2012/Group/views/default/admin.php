<?php
/* @var $this GroupController */
/* @var $model Group */

?>


      <div class="pageheader">
        <div class="media">
          <div class="media-body">
            <ul class="breadcrumb">
              <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/?r=Dashboard"><i class="glyphicon glyphicon-home"></i></a></li>
    <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/?r=User/default/admin">Users</a></li>
              <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/?r=Group/default/admin">Groups</a></li>
              <li>Manage Groups</li>
            </ul>
            
          </div>
        </div>
        <!-- media --> 
      </div>
      <div class="contentpanel">
        <div class="row">
          <div class="col-md-12 user_section">
            <div class="mb20"></div>
            <div class="clearfix"></div>
            <div class="panel panel-default">
              <div class="panel-body titlebar"> <span class="glyphicon  glyphicon-th"></span>
                <h2>Groups Management</h2>
              </div>
            </div>
            <div class="col-md-12">
              <div class="table-responsive">
            
 <?php
					  
					/*   echo CHtml::link(
						Yii::t("Group.create", "Create new Group"),
						array("create"),
						array("class"=>"btn btn-default")
					);
					   */
?>	

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'group-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'itemsCssClass' => 'table table-bordered mb30 quote_table',
	'pagerCssClass'=>'pagination',
	'htmlOptions' => array('style' => 'width: 55%;'),
	'columns'=>array(
		
		
			array(
                'name'=>'role',
                'header'=>'Name',
                'headerHtmlOptions'=>array('class'=>'head'),
            ),
		   array(
                'name'=>'role',
                'header'=>'Description',
                'headerHtmlOptions'=>array('class'=>'head'),
            ),
		
/* 			  array(
                'name'=>'role_val',
                'header'=>'Username',
                'headerHtmlOptions'=>array('class'=>'head'),
            ),
			
		 */
		
		array(
			'class'=>'CButtonColumn',
			'header'=>'Actions',
			'headerHtmlOptions'=>array('width'=>'100','class'=>'head'),
			'template'=>'{view}',
			'buttons'=>array
						(
							'view' => array
							(
								'label'=>'View',
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
     
