 <div class="pageheader">
        <div class="media">
          <div class="media-body">
            <ul class="breadcrumb">
              <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/?r=Dashboard"><i class="glyphicon glyphicon-home"></i></a></li>
              <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/?r=Quotes/default/admin">Quotes</a></li>
              <li><a href="<?php echo Yii::app()->getBaseUrl(true).'?r=Quotes/Job/view&id='.$model->id; ?>">Job</a></li>
              <li>Job Photos</li>
            </ul>
			<a href="<?php echo Yii::app()->getBaseUrl(true).'/?r=Quotes/Job/view&id='.$model->id; ?>" class="btn btn-primary pull-right">Back</a>
            <h4>Job Photos</h4>
			
          </div>
        </div>
        <!-- media --> 
</div>


<div class="contentpanel">

  <div class="row">
      <div class="col-md-12 quote_section">
        <div class="mb20"></div>
        <div class="panel panel-default">
          <div class="panel-body titlebar"> <span class="glyphicon  glyphicon-th"></span>
            <h2>Job Photos</h2>			
          </div>
        </div>
        <div class="row mb20">
        <div class="row mb20">
         
          <div class="col-md-12">
            <dl class="quotedetaildl col-md-12 nopadding">
             
			 <dt class="col-md-3">Job No</dt>
             <dd class="col-md-3"><?php echo $model->id; ?></dd>
             
			  <dt class="col-md-3">Contact Name</dt>
              <dd class="col-md-3"><?php echo Contact::Model()->FindByPk($quote_model->contact_id)->first_name." ".Contact::Model()->FindByPk($quote_model->contact_id)->surname; ?></dd>
             
			  <dt class="col-md-3">Quote No</dt>
              <dd class="col-md-3"><?php echo $model->quote_id; ?></dd>
       
			 
			  <dt class="col-md-3">Site</dt>
              <dd class="col-md-3"><?php echo ContactsSite::Model()->FindByPk($quote_model->site_id)->site_name; ?></dd>
      
			  
			  <dt class="col-md-3">Service Req</dt>
              <dd class="col-md-3"><?php echo Service::Model()->FindByPk($quote_model->service_id)->service_name; ?></dd>
             
			  <dt class="col-md-3">Building</dt>
              <dd class="col-md-3"><?php echo Buildings::Model()->FindByPk($model->building_id)->building_name; ?></dd>
      
		
			  
            </dl>
          </div>

        
        </div>

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'locations-form',
    'enableAjaxValidation'=>false,
    'htmlOptions' => array('enctype' => 'multipart/form-data'), // ADD THIS
)); ?>


<?php $this->widget('ext.EAjaxUpload.EAjaxUpload',
array(
        'id'=>'uploadFile',
        'config'=>array(
               'action'=>Yii::app()->createUrl('Quotes/Job/upload&id='.$model->id),
			   'template'=>'<div class="qq-uploader"><div class="qq-upload-drop-area"><span>Drop files here to upload</span></div><div class="qq-upload-button">Upload a file</div><ul class="qq-upload-list"></ul></div>',
               'allowedExtensions'=>array("jpg"),//array("jpg","jpeg","gif","exe","mov" and etc...
               'sizeLimit'=>10*1024*1024,// maximum file size in bytes
			    'multiple' => true,
               //'minSizeLimit'=>10*1024*1024,// minimum file size in bytes
               //'onComplete'=>"js:function(id, fileName, responseJSON){ alert(fileName); }",
               'messages'=>array(
                                 'typeError'=>"{file} has invalid extension. Only {extensions} are allowed.",
                                 'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
                                 'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
                                 'emptyError'=>"{file} is empty, please select files again without it.",
                                 'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
                                ),
               'showMessage'=>"js:function(message){ alert(message); }",
			    
			   
              )
));
         ?>
   


<?php $this->endWidget(); ?>
  
        <div class="clearfix"></div>
		
		
<div class="job_images">

<?php

	foreach($job_images as $image) { ?>
	<img src="<?php echo Yii::app()->getBaseUrl(true).'/uploads/job_images/thumbs/'.$image->photo; ?>" />
	<?php }

?>

</div>

		
		
      </div>
    </div>
  </div>


</div>