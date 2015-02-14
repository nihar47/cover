<div class="pageheader">
    <div class="media">
      <div class="media-body">
        <ul class="breadcrumb">
          <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/?r=Dashboard"><i class="glyphicon glyphicon-home"></i></a></li>
          <li><a href="">Quotes</a></li>
          <li>Job Details</li>
        </ul>
        <h4>Job Details</h4>
      </div>
    </div>
    <!-- media --> 
  </div>

  <input type="hidden" id="job_id" readonly value="" class="form-control" />
 
  <div class="contentpanel">
    <div class="row">
      <div class="col-md-12 quote_section">
        <div class="mb20"></div>
        <div class="panel panel-default">
          <div class="panel-body titlebar"> <span class="glyphicon  glyphicon-th"></span>
            <h2>Job detail</h2>
            
         <button type="button" class="btn btn-primary dropdown-toggle jd_action_btn pull-right" data-toggle="dropdown"> Action <span class="caret"></span> </button>
         <ul class="dropdown-menu pull-right" role="menu">
  
         
        <li><a target="_blank" href="<?php echo Yii::app()->getBaseUrl(true).'?r=Quotes/default/view&id='.$quote_model->id.'&job_id='.$model->id; ?>">All Jobs (This Quote)</a></li>
		
		<?php if($quote_model->status == 'Approved') { ?>
		<?php if($model->booked_status == 'Booked') { ?>
		<li><a href="<?php echo Yii::app()->getBaseUrl(true).'?r=Quotes/Job/RebookJob&from_job_details=yes&id='.$model->id; ?>">Re-Book a Job</a></li>
		<?php } ?>								
		<?php } ?>

		<li><a href="javascript:void(0);" id="<?php echo $model->id; ?>" onclick="return false;" data-toggle="modal" data-target="#myModal" class="edit_job_note" >Update Job note</a></li>							
		<!--<li><a href="<?php echo Yii::app()->getBaseUrl(true).'?r=Quotes/Job/AddPurchaseOrder&from_job_details=yes&id='.$model->id; ?>">Add Purchase Order</a></li>		-->
		<li><a href="javascript:void(0);" id="<?php echo $model->id; ?>" onclick="return false;" data-toggle="modal" data-target="#myModalPurchaseOrder" class="edit_purchase_order" >Update Purchase Order</a></li>		
         
        </ul>
         
          </div>
        </div>
        <div class="row mb20">
        <div class="row mb20">
         
          <div class="col-md-12">
            <dl class="quotedetaildl col-md-12 nopadding">
              <dt class="col-md-3">Job No</dt>
              <dd class="col-md-3"><?php echo $model->id; ?></dd>
             
			  <dt class="col-md-3">Job Frequency Type</dt>
              <dd class="col-md-3"><?php echo FrequencyType::Model()->FindByPk($model->frequency_type)->name; ?></dd>
			  
			  <dt class="col-md-3">Quote No</dt>
              <dd class="col-md-3"><?php echo $model->quote_id; ?></dd>
             
			  <dt class="col-md-3">No. of Staff Required</dt>
              <dd class="col-md-3"><?php echo $model->staff_required; ?></dd>			  
			  
			  <dt class="col-md-3">Booked status</dt>
              <dd class="col-md-3"><?php echo $model->booked_status; ?></dd>              
              
			  <dt class="col-md-3">Job details</dt>
              <dd class="col-md-3"><a href="<?php echo Yii::app()->getBaseUrl(true).'?r=Quotes/Job/DownloadQuote&id='.$model->id; ?>">Download Quote</a></dd>
              
			  <dt class="col-md-3">Job status</dt>
              <dd class="col-md-3" id="current_job_status"><?php echo $model->job_status; ?></dd>
			  
			  
			  <dt class="col-md-3">Job sheets</dt>
              <dd class="col-md-3"><a href="<?php echo Yii::app()->getBaseUrl(true).'?r=Quotes/Job/DownloadJobsheet&id='.$model->id; ?>">Download Jobsheet</a></dd>
              
			  
			  <dt class="col-md-3">Payment status</dt>
              <dd class="col-md-3"><?php echo $model->paid; ?></dd>              
			
			  <dt class="col-md-3">SWMS documents</dt>
              <dd class="col-md-3"><a href="<?php echo Yii::app()->getBaseUrl(true).'?r=Quotes/Job/DownloadSwms&id='.$model->id; ?>">Download SWMS</a></dd>
			  
			
			  <dt class="col-md-3">Approval status</dt>
              <dd class="col-md-3" id="approval_status"><?php if($model->approval_status == 'Pending Admin Approval') { ?><a href="javascript:void(0);" onclick="approve_job('<?php echo $model->id; ?>'); return false;">Approve Job</a><?php } else { echo $model->approval_status; } ?></dd>
              
              <dt class="col-md-3">Purchase Order Number</dt>
              <dd class="col-md-3" id="current_purchase_order">
			  <?php if(! empty($model->purchase_order) && $model->purchase_order != NULL) { 
				echo $model->purchase_order; 
			  } else { ?>
			  <a href="javascript:void(0);" id="<?php echo $model->id; ?>" onclick="return false;" data-toggle="modal" data-target="#myModalPurchaseOrder" class="edit_purchase_order" >Add Purchase Order</a>
			  <?php }   ?>
			  </dd>
			  
			  
			  <?php if( $model->booked_status == 'Booked' ) { ?>
			  <dt class="col-md-3">Job Start Date</dt>
              <dd class="col-md-3"><?php echo date("l, F jS, Y", strtotime($model->job_started_date)); ?></dd>
              <dt class="col-md-3">Job End Date</dt>
              <dd class="col-md-3"><?php echo date("l, F jS, Y", strtotime($model->job_end_date)); ?></dd>
			  <?php } ?>
			  
			  
            </dl>
          </div>

        
        </div>
		
        <div class="row mb20">
        <div class="col-md-12">
          <div class="col-md-4 building_subtitle">
            <h2>Photos</h2>
            <a href="<?php echo Yii::app()->getBaseUrl(true).'?r=Quotes/Job/UploadJobImages&id='.$model->id; ?>">Upload Photo</a> </div>
          <div class="col-md-4 building_subtitle">
            <h2>Videos</h2>
          </div>
          <div class="col-md-4 building_subtitle">
            <h2>Documents</h2>
            <a href="#">Upload Document</a> </div>
            </div>
        </div>

        <div class="col-md-12">
          <div class="table-responsive">
            <table class="table table-bordered mb30 quote_table quote_details">
              <thead>
                <tr>
                  <th class="head">Description</th>
                  <th class="head">Quantity</th>
                  <th class="head">Rate</th>
                  <th class="head">Total</th>
                  <th class="head">Photo</th>                    
                </tr>
              </thead>
              <tbody>
			  
			  <?php foreach($BuildingServices as $ServiceRow) { ?>
			  
                <tr>
                  <td><?php echo $ServiceRow->service_description ; ?></td>
                  <td><?php echo $ServiceRow->quantity ; ?></td>
                  <td><?php echo $ServiceRow->unit_price_rate ; ?></td>
                  <td><?php echo $ServiceRow->total ; ?></td>
				  
<td>

<a id="<?php echo $ServiceRow->id; ?>" class="upload_service_image" href="javascript:void(0);" >
Upload photo
</a>

</td>

                
				</tr>
				
				<?php } ?>
				
                <tr>
                  <td>Discount</td>
                  <td></td>
                  <td></td>
                  <td><?php echo $model->discount; ?> %</td>
                  <td></td>
                </tr>
                <tr>
                  <td><strong>Total</strong></td>
                  <td></td>
                  <td></td>
                  <td><?php echo $model->final_total; ?></td>                    
                  <td></td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- table-responsive --> 
        </div>
        <div class="clearfix"></div>
        <div class="panel panel-default">
          <div class="panel-body titlebar"> <span class="glyphicon  glyphicon-th"></span>
            <h2>Supervisor</h2>
          </div>
        </div>
        <div class="col-md-12 pl0">
          <div class="col-md-7 quote_dtl pl0">
            <div class="table-responsive">
          


<?php
		   
$supervisor_model=new JobSupervisor('search');
$supervisor_model->unsetAttributes();  // clear any default values
$supervisor_model->job_id = $model->id;;

$this->widget('zii.widgets.grid.CGridView', array(
'id'=>'supervisor-grid',
'dataProvider'=>$supervisor_model->search(),
'summaryText'=>'', 
//'filter'=>$supervisor_model,
'itemsCssClass' => 'table table-bordered mb30 quote_table',
'pagerCssClass'=>'pagination',
'enablePagination' => false,
'columns'=>array(
		
		array(
            'name'=>'name',
            'header'=>'Full Name',
            'headerHtmlOptions'=>array('width'=>'20%','class'=>'head'),
			
        ),

	
		 array(
            'name'=>'email',
            'header'=>'Email',
            'headerHtmlOptions'=>array('width'=>'20%','class'=>'head'),
        ),
	
	
		 array(
            'name'=>'phone',
            'header'=>'Phone',
            'headerHtmlOptions'=>array('width'=>'20%','class'=>'head'),
        ),
	
	
		 array(
            'name'=>'mobile',
            'header'=>'Mobile',
            'headerHtmlOptions'=>array('width'=>'20%','class'=>'head'),
        ),
	
		
		array(
		'class'=>'CButtonColumn',
		'header'=>'Action',
		'headerHtmlOptions'=>array('width'=>'20%','class'=>'head'),
		'template'=>'{delete}',
		
		'buttons'=>array
					(
					
					'delete' => array
						(
							'label'=>'Remove',
							'imageUrl'=>false,
							'url' => 'Yii::app()->createUrl("/Quotes/Job/delete_sepervisor",array("id" => $data->primaryKey))',								
						),
							
					),
		)
		
),
));

?>
		   
		   
		   

		   </div>
            <!-- table-responsive --> 
          </div>
          <div class="col-md-5 nopadding">
            <form class="form-inline">
              <!--<div class="form-group detailselect">
                <label>Allocate Supervisor</label>
              </div>-->
              <!-- form-group -->
              
              <div class="form-group detailselectbox">

<?php
			
			$criteria = new CDbCriteria();
			$criteria->select = "id,first_name,last_name,mobile_phone";
			$criteria->condition = "role_id = 5 && status='1'";
			$criteria->order = 'first_name';
			$supervisors = User::model()->findAll($criteria);
	

?>
			  
                <select class="form-control " name="assign_supervisor_id" id="assign_supervisor_id">
                  <option value="0">Select Supervisor</option>
				  <?php foreach ($supervisors as $value)  {	 ?>
                  <option value="<?php echo $value->id; ?>"><?php echo $value->first_name.' '.$value->last_name; ?></option>
                  <?php } ?>
                </select>
              </div>
              <!-- form-group --> 
              
              <a class="site_left" href="javascript:void(0)" onclick="assign_supervisor('<?php echo $model->id;?>')">Allocate Supervisor</a>
            </form>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="panel panel-default">
          <div class="panel-body titlebar"> <span class="glyphicon  glyphicon-th"></span>
            <h2>Site Supervisor</h2>
          </div>
        </div>
        <div class="col-md-12 pl0">
          <div class="col-md-7 quote_dtl pl0">
            <div class="table-responsive">
             

<?php
		   
$site_supervisor_model=new JobSiteSupervisor('search');
$site_supervisor_model->unsetAttributes();  // clear any default values
$site_supervisor_model->job_id = $model->id;;

$this->widget('zii.widgets.grid.CGridView', array(
'id'=>'site-supervisor-grid',
'dataProvider'=>$site_supervisor_model->search(),
'summaryText'=>'', 
//'filter'=>$site_supervisor_model,
'itemsCssClass' => 'table table-bordered mb30 quote_table',
'pagerCssClass'=>'pagination',
'enablePagination' => false,
'columns'=>array(
		
		array(
            'name'=>'name',
            'header'=>'Full Name',
            'headerHtmlOptions'=>array('width'=>'20%','class'=>'head'),
			
        ),

	
		 array(
            'name'=>'email',
            'header'=>'Email',
            'headerHtmlOptions'=>array('width'=>'20%','class'=>'head'),
        ),
	
	
		 array(
            'name'=>'phone',
            'header'=>'Phone',
            'headerHtmlOptions'=>array('width'=>'20%','class'=>'head'),
        ),
	
	
		 array(
            'name'=>'mobile',
            'header'=>'Mobile',
            'headerHtmlOptions'=>array('width'=>'20%','class'=>'head'),
        ),
	
		
		array(
		'class'=>'CButtonColumn',
		'header'=>'Action',
		'headerHtmlOptions'=>array('width'=>'20%','class'=>'head'),
		'template'=>'{delete}',
		
		'buttons'=>array
					(
					
					'delete' => array
						(
							'label'=>'Remove',
							'imageUrl'=>false,
							'url' => 'Yii::app()->createUrl("/Quotes/Job/delete_site_sepervisor",array("id" => $data->primaryKey))',								
						),
							
					),
		)
		
),
));

?>
		   
		   
		   


	  </div>
            <!-- table-responsive --> 
          </div>
          <div class="col-md-5 nopadding">
            <form class="form-inline">
              <!--<div class="form-group detailselect">
                <label>Allocate Site Supervisor</label>
              </div>-->
              <!-- form-group -->
              
              <div class="form-group detailselectbox ">

<?php
			
			$criteria = new CDbCriteria();
			$criteria->select = "id,first_name,last_name,mobile_phone";
			$criteria->condition = "role_id = 6 && status='1'";
			$criteria->order = 'first_name';
			$site_supervisors = User::model()->findAll($criteria);
	

?>


			  <select class="form-control " name="assign_site_supervisor_id" id="assign_site_supervisor_id">
                  <option value="0">Select Site Supervisor</option>
                  <?php foreach ($site_supervisors as $value)  {	 ?>
                  <option value="<?php echo $value->id; ?>"><?php echo $value->first_name.' '.$value->last_name; ?></option>
                  <?php } ?>
                </select>
              </div>
              <!-- form-group --> 
              <a class="site_left" href="javascript:void(0)" onclick="assign_site_supervisor('<?php echo $model->id;?>')" >Allocate Site Supervisor</a>
            
            </form>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="panel panel-default">
          <div class="panel-body titlebar"> <span class="glyphicon  glyphicon-th"></span>
            <h2>Staff</h2>
          </div>
        </div>
        
	
        <!--<div class="clearfix mb30"></div>-->
        <div class="col-md-12">
       
<a href="javascript:void(0);" id="<?php echo $model->id; ?>" onclick="return false;" data-toggle="modal" data-target="#myModal3" class="job_allocate_staff" >Allocate Staff</a>

            <div class="table-responsive">
          


<?php
		   
$staff_model=new JobStaff('search');
$staff_model->unsetAttributes();  // clear any default values
$staff_model->job_id = $model->id;

$this->widget('zii.widgets.grid.CGridView', array(
'id'=>'staff-grid',
'dataProvider'=>$staff_model->search(),
'summaryText'=>'', 
//'filter'=>$staff_model,
'itemsCssClass' => 'table table-bordered mb30 quote_table',
'pagerCssClass'=>'pagination',
'enablePagination' => false,
'columns'=>array(
		
			 array(
            'name'=>'job_date',
            'headerHtmlOptions'=>array('width'=>'15%','class'=>'head'),
        ),
	
	
	
		array(
			'name'=>'name',
			'header'=>'Staff Members / Date',
			'headerHtmlOptions'=>array('class'=>'head'),
			'filter' => false,				
			'value' => '$data->getStaffMembersOndate($data->job_id,$data->job_date)',
		),			

	
		 array(
            'name'=>'pick_up_van',
            'headerHtmlOptions'=>array('width'=>'15%','class'=>'head'),
        ),
	
	
		 array(
            'name'=>'get_to_job_site',
            'headerHtmlOptions'=>array('width'=>'15%','class'=>'head'),
        ),
	
	
		 array(
            'name'=>'return_to_office',
            'headerHtmlOptions'=>array('width'=>'15%','class'=>'head'),
        ),
	
	
		
		array(
		'class'=>'CButtonColumn',
		'header'=>'Action',
		'headerHtmlOptions'=>array('width'=>'20%','class'=>'head'),
		'template'=>'{delete}',
		
		'buttons'=>array
					(
					
					'delete' => array
						(
							'label'=>'Remove',
							'imageUrl'=>false,
							'url' => 'Yii::app()->createUrl("/Quotes/Job/Delete_staff_user",array("job_id" => $data->job_id,"job_date" => $data->job_date))',								
						),
							
					),
		)
		
),
));

?>
		   
		   
		   

		   </div>

  
<div class="table-responsive">
		<table class="table table-bordered mb30 quote_table quote_details">
		<tbody>
		 <tr>
		 
<?php $DisplayNone = 'style="display:none;"'; ?>
 	
                     <td colspan="5" align="center">
                        <a href="<?php echo Yii::app()->getBaseUrl(true).'?r=Quotes/default/view&id='.$model->quote_id; ?>" type="button" class="btn btn-primary mr5">Back</a>
                        
						<?php if($model->job_status == 'NotStarted') { ?>
						<button type="button" class="btn btn-success" id="start_job">Start Job</button>                        
						<?php } ?>
						
						<button type="button" class="btn btn-success" id="restart_job" <?php if($model->job_status == 'Paused') { echo ''; } else { echo $DisplayNone; } ?> >Restart Job</button>						
						
						
						<button type="button" class="btn yellowcolor" id="pause_job" <?php if($model->job_status == 'Started' || $model->job_status == 'Restarted') { echo ''; } else { echo $DisplayNone; } ?> >Pause Job</button>                        
						<button type="button" class="btn blackbgcolor" id="complete_job"<?php if($model->job_status == 'Started'  || $model->job_status == 'Restarted') { echo ''; } else { echo $DisplayNone; } ?>>Complete Job</button>                        
						
						
					</td>
		</tr>
		</tbody>
		</table>
</div>


<script type="text/javascript">
var job_id = '<?php echo $model->id; ?>';
$(document).ready(function() {
    
	$("#start_job").click(function(){
        
			

				
				var job_status = 'Started';
				$("#current_job_status").text(job_status);
				var post_data = 'job_id='+job_id+'&job_status='+job_status;
				
					jQuery.ajax(
									{
									url : '?r=Quotes/job/change_job_status',
									type: "POST",
									data : post_data,
									success:function(data, textStatus, jqXHR){	

									if(data == 'assign_supervisor')	{
										alert('Please assign supervisor first.'); return false;
									}	else if(data == 'assign_site_supervisor')	{
										alert('Please assign site supervisor first.');  return false;
									}	else if(data == 'assign_staff')	{
										alert('Please assign staff first.');  return false;
									}	
									
										if(data == '1')	{
											$("#start_job").hide();
											$("#pause_job").show();
											$("#complete_job").show();
										 }
									},
									error: function(jqXHR, textStatus, errorThrown)
										{}
							});
							return false;

				
		
    }); 
	 
	$("#restart_job").click(function(){
        
			

				
				var job_status = 'Restarted';
				$("#current_job_status").text(job_status);
				var post_data = 'job_id='+job_id+'&job_status='+job_status;
				
					jQuery.ajax(
									{
									url : '?r=Quotes/job/change_job_status',
									type: "POST",
									data : post_data,
									success:function(data, textStatus, jqXHR){							

									if(data == 'assign_supervisor')	{
										alert('Please assign supervisor first.'); return false;
									}	else if(data == 'assign_site_supervisor')	{
										alert('Please assign site supervisor first.');  return false;
									}	else if(data == 'assign_staff')	{
										alert('Please assign staff first.');  return false;
									}	
									
										if(data == '1')	{	
										$("#restart_job").hide();
										$("#pause_job").show();
										$("#complete_job").show();
										}
										
									},
									error: function(jqXHR, textStatus, errorThrown)
										{}
							});
							return false;

				
		
    }); 
	 
	$("#pause_job").click(function(){
        
				
				var job_status = 'Paused';
				$("#current_job_status").text(job_status);
				var post_data = 'job_id='+job_id+'&job_status='+job_status;
				
					jQuery.ajax(
									{
									url : '?r=Quotes/job/change_job_status',
									type: "POST",
									data : post_data,
									success:function(data, textStatus, jqXHR){							
										
										if(data == 'assign_supervisor')	{
										alert('Please assign supervisor first.'); return false;
									}	else if(data == 'assign_site_supervisor')	{
										alert('Please assign site supervisor first.');  return false;
									}	else if(data == 'assign_staff')	{
										alert('Please assign staff first.');  return false;
									}	
									
										if(data == '1')	{
										$("#restart_job").show();
										$("#pause_job").hide();
										$("#complete_job").hide();
										}
										
									},
									error: function(jqXHR, textStatus, errorThrown)
										{}
							});
							return false;

				
		
    }); 
	 
	$("#complete_job").click(function(){
        
			
				var job_status = 'Completed';
				$("#current_job_status").text(job_status);
				var post_data = 'job_id='+job_id+'&job_status='+job_status;
				
					jQuery.ajax(
									{
									url : '?r=Quotes/job/change_job_status',
									type: "POST",
									data : post_data,
									success:function(data, textStatus, jqXHR){							
										
										if(data == 'assign_supervisor')	{
										alert('Please assign supervisor first.'); return false;
									}	else if(data == 'assign_site_supervisor')	{
										alert('Please assign site supervisor first.');  return false;
									}	else if(data == 'assign_staff')	{
										alert('Please assign staff first.');  return false;
									}	
									
										if(data == '1')	{
										$("#complete_job").hide();
										$("#pause_job").hide();									
										}
										 
									},
									error: function(jqXHR, textStatus, errorThrown)
										{}
							});
							return false;

				
		
    }); 
	
	
});

</script>


	   </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
  <!-- contentpanel -->

 
		 
<!-- Modal box 3 -->
<div class="modal fade" id="myModal3" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabel">Allocate Staff</h4>
  </div>
  <div class="modal-body">
    
	
<div class="col-md-12 pl0">
<?php $start_date = $model->job_started_date; ?>

          <div class="col-md-6 pl0"> 
		  <input type="hidden" readonly id="staff_job_date" value="<?php echo $start_date; ?>">
		  
		  
		  <?php 
			for($i=0;$i<=$interval_days;$i++) { 
			if($i == 0) 
			$active_class = "btn btn-primary mr5";
			else 
			$active_class = "btn mr5";
			
			?>
			<a href="javascript:void(0);" onclick="setStaffJobDate('<?php echo $start_date; ?>')" class="<?php echo $active_class; ?>">	<?php echo $start_date; ?></a>
			<?php $start_date = date('Y-m-d', strtotime($start_date.' + 1 days')); 
			} ?>
		  
	
		  </div>
       
</div><br/><br/><br/>
	
	
<div class="form-group">
      <label class="col-sm-4">Allocate Staff</label>
      <div class="col-sm-8">         
     
	 
<?php
			$criteria = new CDbCriteria();
			$criteria->select = "id,first_name,last_name,mobile_phone";
			$criteria->condition = "role_id = 6 && status='1'";
			$criteria->order = 'first_name';
			$staff = User::model()->findAll($criteria);

?>

			<!--<select class="form-control" id="assign_staff_id">
                  <option value="0">Select Staff</option>
				  <?php foreach ($staff as $value)  {	 ?>
                  <option value="<?php echo $value->id; ?>"><?php echo $value->first_name.' '.$value->last_name; ?></option>
                  <?php } ?>
            </select>-->
	 
	 
	   <?php foreach ($staff as $value)  { ?>
      <input class="chk" name="assign_staff_id" type="checkbox" value="<?php echo $value->id; ?>" />&nbsp;&nbsp;&nbsp;<?php echo $value->first_name.' '.$value->last_name; ?><br/>
       <?php } ?>
	 
	 
      </div>
    </div>
	

	<div class="form-group">
     <label class="col-sm-4">Pick Up Van</label>
     <div class="col-sm-8">  
      <div class="bootstrap-timepicker"><input id="pick_up_van" type="text" class="form-control"/></div>		 
	 </div>
    </div>
	

			
	
	<div class="form-group">
     <label class="col-sm-4">Get To Job Site</label>
     <div class="col-sm-8">  
	  <div class="bootstrap-timepicker"><input type="text" id="get_to_job_site"  class="form-control" /></div>	 
	 </div>
    </div>
	
			
	
	<div class="form-group">
     <label class="col-sm-4">Return To Office</label>
     <div class="col-sm-8">  
	  <div class="bootstrap-timepicker"><input type="text" id="return_to_office"  class="form-control" /> </div>	
	 </div>
    </div>
	
	
	
    <div class="form-group">
      <label class="col-sm-4">&nbsp;</label>
      <div class="col-sm-8">
        <button class="btn btn-primary mr5" onclick="assign_staff('<?php echo $model->id;?>')" return false;" >Allocate Staff</button>
      </div>
    </div>
	
  </div>
</div>
<!-- modal-content --> 
</div>
<!-- modal-dialog --> 

</div>

<!-- Modal box 3 --> 
		 
	
<script>
		
$(function() {
$(".col-md-6.pl0 a").on("click", function() {
    $(".col-md-6.pl0 a.btn-primary").removeClass("btn-primary");
    $(this).addClass("btn-primary");
});
});

function setStaffJobDate(date) {
$("#staff_job_date").val(date);
}

jQuery(document).ready(function(){
					jQuery('#pick_up_van').timepicker({defaultTIme: false}); 
					jQuery('#get_to_job_site').timepicker({defaultTIme: false}); 
					jQuery('#return_to_office').timepicker({defaultTIme: false}); 
}); 


function assign_staff(job_id) {

		var user_id = getValueUsingClass();	
		if(user_id == 0) {
		alert('Please, select at least one staff member');
		}
//alert(user_id); return false;
//var user_id = jQuery('#assign_staff_id').val();
var pick_up_van = jQuery('#pick_up_van').val();
var get_to_job_site = jQuery('#get_to_job_site').val();
var return_to_office = jQuery('#return_to_office').val();
var job_date = jQuery('#staff_job_date').val();
	
	if(user_id == '' || user_id == 0 ) {
		alert("Please select staff.");return false;
		}

		var post_data = 'job_id='+job_id+'&user_id='+user_id+'&pick_up_van='+pick_up_van+'&get_to_job_site='+get_to_job_site+'&return_to_office='+return_to_office+'&job_date='+job_date;
		
		  jQuery.ajax(
							{
							url : '?r=Quotes/Job/assign_staff',
							type: "POST",
							data : post_data,
							success:function(data, textStatus, jqXHR){
							
							if(data == 'invalid') {
							alert("Staff can be assigned to only approved and booked jobs");
							return false;
							}
						
							
								if(data == 0) {
								alert("This staff already assigned for your selected date.");
								return false;
								} else	if(data == 1) {
								
									$('#myModal3').modal('hide');
									//alert("successfully assigned supervisor to this job.");
									jQuery('#AjFlash').html(data).fadeIn().animate({opacity: 1.0}, 3000).fadeOut('slow'); 
									jQuery.fn.yiiGridView.update('staff-grid'); 
									return false;
								}
								
							},
							error: function(jqXHR, textStatus, errorThrown)
								{}
					});
	
								
									return false;



}

	function getValueUsingClass(){
			/* declare an checkbox array */
			var chkArray = [];
			
			/* look for all checkboes that have a class 'chk' attached to it and check if it was checked */
			$(".chk:checked").each(function() {
				chkArray.push($(this).val());
			});
			
			/* we join the array separated by the comma */
			var selected;
			selected = chkArray.join('_') + "_";
			
			/* check if there is selected checkboxes, by default the length is 1 as it contains one single comma */
			if(selected.length > 1){
				//alert("You have selected " + selected);	
				return selected; 
			}else{
				return 0;	
			}
	}

		</script>	
		 
<!-- Modal box update purchase order -->
<div class="modal fade" id="myModalPurchaseOrder" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Update Purchase Order NO.</h4>
      </div>
      <div class="modal-body">      
        <div class="form-group">
          <label class="col-sm-4">Purchase Order NO.</label>
          <div class="col-sm-8">
            <input type="text"  autocomplete="off"  id="purchase_order" value="" class="form-control" />           
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-4">&nbsp;</label>
          <div class="col-sm-8">
            <button class="btn btn-primary mr5" onclick="update_purchase_order(); return false;" >Update Purchase Order</button>
          </div>
        </div>
      </div>
    </div>
    <!-- modal-content --> 
  </div>
  <!-- modal-dialog --> 
  
</div>


	  
<script type="text/javascript">

			function update_purchase_order() {

				var job_id = jQuery('input#job_id').val();	
				var purchase_order = jQuery('#purchase_order').val();		
				var post_data = 'job_id='+job_id+'&purchase_order='+purchase_order;
				
					jQuery.ajax(
									{
									url : '?r=Quotes/job/update_purchase_order',
									type: "POST",
									data : post_data,
									success:function(data, textStatus, jqXHR){				
										if(purchase_order == null || purchase_order == '')	
										purchase_order = '-';
									
										jQuery('#current_purchase_order').text(purchase_order);							
										$('#myModalPurchaseOrder').modal('hide');										 
									},
									error: function(jqXHR, textStatus, errorThrown)
										{}
							});
							return false;

				}				
				
				 
					jQuery(document).ready(function(){
					
							jQuery(".edit_purchase_order").click(function(){							
							
							var job_id = jQuery(this).attr("id");
							var post_data = 'job_id='+job_id;
							
									jQuery.ajax(
											{
											url : '?r=Quotes/job/get_purchase_order',
											type: "POST",
											data : post_data,
											success:function(data, textStatus, jqXHR){
												jQuery("input#job_id").val(job_id);														
												jQuery("#purchase_order").val(data);		
												 
											},
											error: function(jqXHR, textStatus, errorThrown)
												{}
									});
									
						
								}); 
								
								
					}); 
			
</script> 
		 
<!-- Modal box 1 -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Update Job Note</h4>
      </div>
      <div class="modal-body">
               
        <div class="form-group">
          <label class="col-sm-4">Notes</label>
          <div class="col-sm-8">
            <!--<input type="text"  autocomplete="off"  id="job_note" value="" class="form-control" />-->
            <textarea id="job_note" value="" class="form-control" /></textarea>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-4">&nbsp;</label>
          <div class="col-sm-8">
            <button class="btn btn-primary mr5" onclick="update_job_note(); return false;" >Update Job Note</button>
          </div>
        </div>
      </div>
    </div>
    <!-- modal-content --> 
  </div>
  <!-- modal-dialog --> 
  
</div>

	  
<script type="text/javascript">

			function update_job_note() {

				var job_id = jQuery('input#job_id').val();	
				var job_note = jQuery('#job_note').val();		
				var post_data = 'job_id='+job_id+'&job_note='+job_note;
				
					jQuery.ajax(
									{
									url : '?r=Quotes/job/update_job_note',
									type: "POST",
									data : post_data,
									success:function(data, textStatus, jqXHR){							
										
										$('#myModal').modal('hide');
										 
									},
									error: function(jqXHR, textStatus, errorThrown)
										{}
							});
							return false;

				}				
				
				 
					jQuery(document).ready(function(){
					
							jQuery(".edit_job_note").click(function(){							
							
							var job_id = jQuery(this).attr("id");
							var post_data = 'job_id='+job_id;
							
									jQuery.ajax(
											{
											url : '?r=Quotes/job/get_job_note',
											type: "POST",
											data : post_data,
											success:function(data, textStatus, jqXHR){
												jQuery("input#job_id").val(job_id);														
												jQuery("#job_note").val(data);		
												 
											},
											error: function(jqXHR, textStatus, errorThrown)
												{}
									});
									
						
								}); 
								
								
					}); 
			
</script> 


<script>

function approve_job(job_id) {


		var post_data = 'job_id='+job_id;
		
		  jQuery.ajax(
							{
							url : '?r=Quotes/Job/approve_job',
							type: "POST",
							data : post_data,
							success:function(data, textStatus, jqXHR){
						
							if(data == 1)
							jQuery("#approval_status").text('Approved By Admin');
								
							},
							error: function(jqXHR, textStatus, errorThrown)
								{}
					});
	
								
									return false;


}

function assign_supervisor(job_id) {

	var user_id = jQuery('#assign_supervisor_id').val();
	
	if(user_id == '' || user_id == 0 ) {
		alert("Please select supervisor.");return false;
		}

		var post_data = 'job_id='+job_id+'&user_id='+user_id;
		
		  jQuery.ajax(
							{
							url : '?r=Quotes/Job/assign_supervisor',
							type: "POST",
							data : post_data,
							success:function(data, textStatus, jqXHR){
							
							if(data == 'invalid') {
							alert("Supervisor can be assigned to only approved and booked jobs");
							return false;
							}
						
							
								if(data == 0) {
								alert("This user already assigned");
								return false;
								} else	if(data == 1) {
								
									//alert("successfully assigned supervisor to this job.");
									jQuery('#AjFlash').html(data).fadeIn().animate({opacity: 1.0}, 3000).fadeOut('slow'); 
									jQuery.fn.yiiGridView.update('supervisor-grid'); 
									return false;
								}
								
							},
							error: function(jqXHR, textStatus, errorThrown)
								{}
					});
	
								
									return false;



}

function assign_site_supervisor(job_id) {

	var user_id = jQuery('#assign_site_supervisor_id').val();

	if(user_id == '' || user_id == 0 ) {
		alert("Please select site supervisor.");return false;
		}

		var post_data = 'job_id='+job_id+'&user_id='+user_id;
		
		  jQuery.ajax(
							{
							url : '?r=Quotes/Job/assign_site_supervisor',
							type: "POST",
							data : post_data,
							success:function(data, textStatus, jqXHR){
							
							if(data == 'invalid') {
								alert("Site Supervisor can be assigned to only approved and booked jobs");
							return false;
							}
						
							
								if(data == 0) {
								alert("This user already assigned");
								return false;
								} else	if(data == 1) {
									//alert("successfully assigned supervisor to this job.");
									jQuery('#AjFlash').html(data).fadeIn().animate({opacity: 1.0}, 3000).fadeOut('slow'); 
									jQuery.fn.yiiGridView.update('site-supervisor-grid'); 
									return false;
								}
								
							},
							error: function(jqXHR, textStatus, errorThrown)
								{}
					});
	
								
									return false;



}


</script>


<div class="modal fade" id="myModal2" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">


<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabel">Upload Image</h4>
  </div>


    <div class="modal-body">
    <div id='before_preview'>

	
	</div>
    <br/>
    <form id="before_imageform" method="post" enctype="multipart/form-data" action='<?php echo Yii::app()->getBaseUrl(true); ?>/?r=Quotes/default/AjaxImageUpload'>
      
	  <div id='before_imageloadstatus' style="display:none;">
	  <img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/ajax-loader.gif" alt="Uploading...."/>
	  </div>
	  
	  <input type="hidden" name="job_service_id" id="job_service_id"  value="<?php echo $model->id; ?>" class="form-control" />
      <div id='before_imageloadbutton'>
        <input type="file" name="photoimg" id="before_photoimg" />
      </div>
    </form>
  </div>


</div>
<!-- modal-content --> 



  </div>
</div>


<script type="text/javascript" charset="utf-8">

jQuery(document).ready(function(){

    jQuery(".upload_service_image").click(function(){
	jQuery("#before_imageloadstatus").show();
	$('#before_preview').html();
	var job_service_id = jQuery(this).attr("id");
	jQuery("#job_service_id").val(job_service_id);	
	var post_data = 'job_service_id='+job_service_id;
	
	  jQuery.ajax(
						{
						url : '?r=Quotes/Job/GetImageSrcByServiceId',
						type: "POST",
						data : post_data,
						success:function(data, textStatus, jqXHR){
							$('#myModal2').modal('show');
							$('#before_preview').html(data);
							jQuery("#before_imageloadstatus").hide();
						},
						error: function(jqXHR, textStatus, errorThrown)
							{}
				});

		
}); 
});



jQuery(document).ready(function($){

        jQuery('#before_photoimg').die('click').live('change', function()			{ 
		     
			jQuery("#before_imageform").ajaxForm({target: '#before_preview', 
			     beforeSubmit:function(){ 
			
					jQuery("#before_imageloadstatus").show();
					jQuery("#before_imageloadbutton").hide();
				 }, 
				success:function(data){ 
	
				 jQuery("#before_imageloadstatus").hide();
				 jQuery("#before_imageloadbutton").show();
				 
				 
				 
				}, 
				error:function(){ 
				
				 jQuery("#before_imageloadstatus").hide();
				jQuery("#before_imageloadbutton").show();

				} }).submit();
				
	
		});
    }); 

</script>		

<!-- Modal box Before image -->
