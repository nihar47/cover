<?php
/* @var $this UserController */
/* @var $model User */

?>


     <div class="pageheader">
        <div class="media">
          <div class="media-body">
            <ul class="breadcrumb">
              <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/?r=Dashboard"><i class="glyphicon glyphicon-home"></i></a></li>
              <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/?r=User/default/admin">Users</a></li>
              <li>Manage Users</li>
            </ul>
            
<h4>			
 <?php
					  
              echo CHtml::link(
                    Yii::t("User.create", "Add New User"),
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
                <h2>Users Management</h2>
              </div>
            </div>
            <div class="col-md-12">
              <div class="table-responsive">
			  <div class="col-md-12 pull-right mb10 pr0" style="text-align:right">
           
</div>
<?php 

// CgridView Records/page
$pageSize = Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']);

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'itemsCssClass' => 'table table-bordered mb30 quote_table',
	'pagerCssClass'=>'pagination',
	'columns'=>array(
			/* array(
                        'header'=>'No.',
                        'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
                        'headerHtmlOptions'=>array(
                                'width'=>'25',
                                'class'=>'head'
                        )
                ), */
		

		
			array(
                'name'=>'username',
                'header'=>'Username',
                'headerHtmlOptions'=>array('class'=>'head'),
            ),
				array(
                'name'=>'fullName',
                'header'=>'Full Name',
                'headerHtmlOptions'=>array('class'=>'head'),
				'value' => '$data->getFullName()',
            ),
	
		
			/* array(
                'name'=>'email',
                'header'=>'Email',
                'headerHtmlOptions'=>array('class'=>'head'),
            ),
		 */
		
	   array(
			'name' => 'role_id',
			'header' => 'Group',
			'headerHtmlOptions'=>array('class'=>'head'),
			'filter' => CHtml::listData(Group::model()->findAll(), 'id', 'role'), // fields from country table
			'value' => 'Group::Model()->FindByPk($data->role_id)->role',
		),

	   array(
			'name' => 'status',
			'header' => 'Status',
			'headerHtmlOptions'=>array('class'=>'head'),
			'filter' => array('1'=>'Active','0'=>'InActive'),
			'value' => '$data->status ? "Active" : "Inactive"'
			
		),
	
	
	   array(
			'name' => 'view_jobs',
			'header' => 'View Jobs',
			'headerHtmlOptions'=>array('class'=>'head'),
			'filter' => array('1'=>'Yes','0'=>'No'),
			'value' => '$data->view_jobs ? "Yes" : "No"'
			
		),
	
	
	
		/*'
		'Avatar',
		password',	
		
		'role_id',
		'last_logined',
		'salt',
		'ip_address',
		'gender',
		'date_of_birth',
		'view_jobs',
		'home_phone',
		'mobile_phone',
		'street',
		'city',
		'state_province',
		'country_id',
		'zip_code',
		'interested_in',
		'created_at',
		'updated_at',
		*/
			array(
			'class'=>'CButtonColumn',
			'header'=>CHtml::dropDownList('pageSize',$pageSize,array(10=>10,20=>20,25=>25,50=>50,100=>100,150=>150,200=>200),
			array(
			'onchange'=>"$.fn.yiiGridView.update('user-grid',{ data:{pageSize: $(this).val() }})",
			)),	
			'headerHtmlOptions'=>array('width'=>'25%','class'=>'head'),
			'template'=>'{active} {inactive}  {update} | {change_password} | {delete}',
			
			'buttons'=>array
						(
							
	'active' => array
	(
	

'click'=>"function(){

									if (confirm('Are you want to change status?')) {
                                    $.fn.yiiGridView.update('user-grid', {
                                        type:'POST',
                                        url:$(this).attr('href'),
                                        success:function(data) {
                                              $('#AjFlash').html(data).fadeIn().animate({opacity: 1.0}, 3000).fadeOut('slow');
 
                                              $.fn.yiiGridView.update('user-grid');
                                        }
                                    })
									}
                                    return false;
                   }
                     ",

	'url' => 'Yii::app()->createUrl("/User/default/changestatus",array("id" => $data->primaryKey))',
		'label'=>'Active |',
		'visible'=>'($data->status == "0") ? true : false',
		'imageUrl'=>null,
		
	),
	
	'inactive' => array
	(
	

'click'=>"function(){

									if (confirm('Are you want to change status?')) {
                                    $.fn.yiiGridView.update('user-grid', {
                                        type:'POST',
                                        url:$(this).attr('href'),
                                        success:function(data) {
                                              $('#AjFlash').html(data).fadeIn().animate({opacity: 1.0}, 3000).fadeOut('slow');
 
                                              $.fn.yiiGridView.update('user-grid');
                                        }
                                    })
									}
                                    return false;
                   }
                     ",

	'url' => 'Yii::app()->createUrl("/User/default/changestatus",array("id" => $data->primaryKey))',
		'label'=>'InActive |',
		'visible'=>'($data->status == "1") ? true : false',
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
	
	'change_password' => array
	(
		'label'=>'Change Password',
		'imageUrl'=>null,
			'url' => 'Yii::app()->createUrl("/User/default/changepassword",array("id" => $data->primaryKey))',
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
  
