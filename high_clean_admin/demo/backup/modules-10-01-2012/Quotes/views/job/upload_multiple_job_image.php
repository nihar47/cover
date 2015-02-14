 <div class="pageheader">
        <div class="media">
          <div class="media-body">
            <ul class="breadcrumb">
              <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/?r=Dashboard"><i class="glyphicon glyphicon-home"></i></a></li>
              <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/?r=Quotes/default/admin">Quotes</a></li>
              <li><a href="<?php echo Yii::app()->getBaseUrl(true).'?r=Quotes/Job/view&id='.$model->id; ?>">Job</a></li>
              <li>Upload Images</li>
            </ul>
            <h4>Upload Images</h4>
          </div>
        </div>
        <!-- media --> 
</div>

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'job-image-form',
    'enableAjaxValidation'=>false,
    'htmlOptions' => array('enctype' => 'multipart/form-data'), // ADD THIS
)); ?>

<div class="contentpanel">

	<div class="mb20"></div>
	<div class="panel panel-default">
	  <div class="panel-body titlebar">
		<span class="glyphicon  glyphicon-th"></span><h2>Upload Images</h2>
	  </div>
	</div>

<div class="col-md-12">

				<dt class="col-md-4">Before Job (Upload Images)</dt>				  
        		<dd class="col-md-6">
					
					  <?php $this->widget('CMultiFileUpload', array(
                                            'name' => 'images',
                                            'accept' => 'jpeg|jpg|png', // useful for verifying files
                                            'denied' => 'Only jpeg,jpg and pngs allowed',
                                            'max' => 100,
                                            'duplicate' => 'Already Selected',
                                            'htmlOptions' => array( 'multiple' => 'multiple', ),
                                            ));
                      ?>
					  
				</dd> 	 
                       
</div>
			
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class' => 'btn btn-info')); ?>
	</div>

</div>


<?php $this->endWidget(); ?>


<script type="text/javascript">
    $(document).ready(function () {

       
       $('.close_picture').on('click', function(){

           var id =$(this).attr("id");
           var deldata = "";
                        if($("#deleted_Pic_ids").val() ){
                        deldata +=$("#deleted_Pic_ids").val()+","+id;
                        }else{
                         deldata =id;
                         }
               $("#deleted_Pic_ids").val(deldata)
               $("#image_"+id ).remove();

              

 });


    });


</script> 