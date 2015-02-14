<link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">

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

<?php $path = Yii::app()->basePath.'/../uploads/job_images/thumbs/'; ?>
<div class="contentpanel">

<div class="row">
<div class="col-md-12 quote_section">
      
<div class="panel panel-default">
  <div class="panel-body titlebar"> <span class="glyphicon  glyphicon-th"></span>
	<h2>Job Details</h2>			
  </div>
</div>
      
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
      
		  
			  <dt class="col-md-3">Cleaning Report</dt>
              <dd class="col-md-3">
			  <a href="<?php echo Yii::app()->getBaseUrl(true).'?r=Quotes/Job/DownloadJobBeforeAfterReport&id='.$model->id; ?>">
			  Download
			  </a>
			  </dd>
      
		
			  
            </dl>
          </div>

        
        </div>

</div>
</div>	


<div class="row">
<div class="col-md-12 quote_section">
 	
<!-- Job photos -->		
<div class="panel panel-default">
          <div class="panel-body titlebar"> <span class="glyphicon  glyphicon-th"></span>
            <h2>Add Job Photos  (Before Cleaning) </h2>			
          </div>
</div>

<div class="col-md-12">		
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'locations-form',
    'enableAjaxValidation'=>false,
    'htmlOptions' => array('enctype' => 'multipart/form-data'), // ADD THIS
)); ?>

<?php $this->widget('ext.EAjaxUpload.EAjaxUpload',
array(
        'id'=>'uploadFile',		
        'config'=>array(
			
			   'action'=>Yii::app()->createUrl('Quotes/Job/upload&id='.$model->id.'&cleaning_status=0'),
			   'template'=>'<div class="qq-uploader"><div class="qq-upload-drop-area"><span>Drop files here to upload</span></div><div class="qq-upload-button">Upload a file</div><ul class="qq-upload-list"></ul></div>',
               'allowedExtensions'=> array("jpg","jpeg","gif","png"),
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


	<?php foreach($job_images_before_cleaning as $image) { ?>
	<?php if(isset($image->photo) && $image->photo !=NULL && file_exists($path.$image->photo))	 { ?>
	<a href="<?php echo Yii::app()->getBaseUrl(true).'/uploads/job_images/'.$image->photo; ?>" title="" data-gallery>
        <img src="<?php echo Yii::app()->getBaseUrl(true).'/uploads/job_images/thumbs/'.$image->photo; ?>" alt="">
    </a>
	<?php } ?>	
	<?php } ?>

		
</div>
<!-- Job photos END -->			  

	

	

</div> 
</div>

<br/>
<br/>

<!-- job photos after cleaning start -->
<div class="row">
<div class="col-md-12 quote_section">
 	
<!-- Job photos -->		
<div class="panel panel-default">
          <div class="panel-body titlebar"> <span class="glyphicon  glyphicon-th"></span>
            <h2>Add Job Photos  (After Cleaning) </h2>			
          </div>
</div>

<div class="col-md-12">		
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'locations-form',
    'enableAjaxValidation'=>false,
    'htmlOptions' => array('enctype' => 'multipart/form-data'), // ADD THIS
)); ?>

<?php $this->widget('ext.EAjaxUpload.EAjaxUpload',
array(
        'id'=>'uploadFile2',		
        'config'=>array(
			
			   'action'=>Yii::app()->createUrl('Quotes/Job/upload&id='.$model->id.'&cleaning_status=1'),
			   'template'=>'<div class="qq-uploader"><div class="qq-upload-drop-area"><span>Drop files here to upload</span></div><div class="qq-upload-button">Upload a file</div><ul class="qq-upload-list"></ul></div>',
               'allowedExtensions'=> array("jpg","jpeg","gif","png"),
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


	<?php foreach($job_images_after_cleaning as $image) { ?>
	<?php if(isset($image->photo) && $image->photo !=NULL && file_exists($path.$image->photo))	 { ?>
	<a href="<?php echo Yii::app()->getBaseUrl(true).'/uploads/job_images/'.$image->photo; ?>" title="" data-gallery>
        <img src="<?php echo Yii::app()->getBaseUrl(true).'/uploads/job_images/thumbs/'.$image->photo; ?>" alt="">
    </a>
	<?php } ?>	
	<?php } ?>

		
</div>
<!-- Job photos END -->			  

	

	

</div> 
</div>


<!-- job photos after cleaning END -->
<br/>
<br/>
		

<!-- building photos start -->		
<div class="row">
<div class="col-md-12 quote_section">
 	
<!-- Job photos -->		
<div class="panel panel-default">
          <div class="panel-body titlebar"> <span class="glyphicon  glyphicon-th"></span>
            <h2>Add building Photos</h2>			
          </div>
</div>

<div class="col-md-12">		
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'locations-form',
    'enableAjaxValidation'=>false,
    'htmlOptions' => array('enctype' => 'multipart/form-data'), // ADD THIS
)); ?>

<?php $this->widget('ext.EAjaxUpload.EAjaxUpload',
array(
        'id'=>'uploadFile3',		
        'config'=>array(
			
			   'action'=>Yii::app()->createUrl('Quotes/Job/UploadBuildingPhoto&building_id='.$model->building_id),
			   'template'=>'<div class="qq-uploader"><div class="qq-upload-drop-area"><span>Drop files here to upload</span></div><div class="qq-upload-button">Upload a file</div><ul class="qq-upload-list"></ul></div>',
               'allowedExtensions'=> array("jpg","jpeg","gif","png"),
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

	<?php $path_building = Yii::app()->basePath.'/../uploads/building_images/thumbs/'; ?>

	<?php foreach($building_images as $image) { ?>
	<?php if(isset($image->photo) && $image->photo !=NULL && file_exists($path_building.$image->photo))	 { ?>
	<a href="<?php echo Yii::app()->getBaseUrl(true).'/uploads/building_images/'.$image->photo; ?>" title="" data-gallery>
        <img src="<?php echo Yii::app()->getBaseUrl(true).'/uploads/building_images/thumbs/'.$image->photo; ?>" alt="">
    </a>
	<?php } ?>	
	<?php } ?>

		
</div>
<!-- building photos END -->			  

	

	
	
	
	

</div> 
</div>





		
<br/>
<br/>
<!-- building documents start -->		
<div class="row">
<div class="col-md-12 quote_section">
 	
<div class="panel panel-default">
          <div class="panel-body titlebar"> <span class="glyphicon  glyphicon-th"></span>
            <h2>Add building Documents</h2>			
          </div>
</div>

<div class="col-md-12">		
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'locations-form',
    'enableAjaxValidation'=>false,
    'htmlOptions' => array('enctype' => 'multipart/form-data'), // ADD THIS
)); ?>

<?php $this->widget('ext.EAjaxUpload.EAjaxUpload',
array(
        'id'=>'uploadFile4',		
        'config'=>array(
			
			   'action'=>Yii::app()->createUrl('Quotes/Job/UploadBuildingDocument&building_id='.$model->building_id),
			   'template'=>'<div class="qq-uploader"><div class="qq-upload-drop-area"><span>Drop files here to upload</span></div><div class="qq-upload-button">Upload a file</div><ul class="qq-upload-list"></ul></div>',
               'allowedExtensions'=> array("doc","docx","pdf"),
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

	<?php $path_building_doc = Yii::app()->basePath.'/../uploads/building_documents/'; ?>

	<?php foreach($building_documents as $docRow) { ?>
	<?php if(isset($docRow->doc) && $docRow->doc !=NULL && file_exists($path_building_doc.$docRow->doc))	 { ?>
	<a href="<?php echo Yii::app()->getBaseUrl(true).'/uploads/building_documents/'.$docRow->doc; ?>" >
    <?php echo $docRow->doc; ?>    
    </a><br/>
	<?php } ?>	
	<?php } ?>

		
</div>
<!-- building documents END -->			  

	

	
	
	
	

</div> 
</div>

















</div>
 <!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
<div id="blueimp-gallery" class="blueimp-gallery">
    <!-- The container for the modal slides -->
    <div class="slides"></div>
    <!-- Controls for the borderless lightbox -->
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
    <!-- The modal dialog, which will be used to wrap the lightbox content -->
    <div class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body next"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left prev">
                        <i class="glyphicon glyphicon-chevron-left"></i>
                        Previous
                    </button>
                    <button type="button" class="btn btn-primary next">
                        Next
                        <i class="glyphicon glyphicon-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

 
<script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
<script src="<?php echo Yii::app()->getBaseUrl(true); ?>/js/bootstrap-image-gallery.min.js"></script>
