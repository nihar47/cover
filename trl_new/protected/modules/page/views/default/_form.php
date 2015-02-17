
<div  class="form form-horizontal well well-small">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'page-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>




<div id="horizontalTab">
            <ul class="resp-tabs-list">
                <li>Page</li>
                <li>SEO</li>
            </ul>
            <div class="resp-tabs-container">
                <div>
                    	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Page_Name'); ?>
		<?php echo $form->textField($model,'Page_Name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Page_Name'); ?>
	</div>

	

	<div class="row">
		<?php echo $form->labelEx($model,'Page_Description'); ?>
		<?php echo $form->textArea($model, 'Page_Description', array('id'=>'editor1')); ?>
		<?php echo $form->error($model,'Page_Description'); ?>
	</div>
                </div>
                <div>
                  <div class="row">
		<?php echo $form->labelEx($model,'Meta_Title'); ?>
		<?php echo $form->textArea($model,'Meta_Title',array('rows'=>4, 'cols'=>50 ,'style'=>"width:95%")); ?>
		<?php echo $form->error($model,'Meta_Title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Meta_Keywords'); ?>
		<?php echo $form->textArea($model,'Meta_Keywords',array('rows'=>4, 'cols'=>50 ,'style'=>"width:95%")); ?>
		<?php echo $form->error($model,'Meta_Keywords'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Meta_Description'); ?>
		<?php echo $form->textArea($model,'Meta_Description',array('rows'=>4, 'cols'=>50 ,'style'=>"width:95%")); ?>
		<?php echo $form->error($model,'Meta_Description'); ?>
	</div>
                </div>
                
            </div>
        </div>
  	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-info')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->      
        
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/easyResponsiveTabs.js" type="text/javascript"></script>

   
<script type="text/javascript">
    $(document).ready(function () {
        $('#horizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion           
            width: 'auto', //auto or any width like 600px
            fit: true,   // 100% fit in a container
            closed: 'accordion', // Start closed if in accordion view
            activate: function(event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#tabInfo');
                var $name = $('span', $info);

                $name.text($tab.text());

                $info.show();
            }
        });

    });
	
	
</script>                
       

<script type="text/javascript">    CKEDITOR.replace( 'editor1' ); </script>