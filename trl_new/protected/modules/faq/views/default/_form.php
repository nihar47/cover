<?php
/* @var $this FaqController */
/* @var $model Faq */
/* @var $form CActiveForm */
?>

<div class="form form-horizontal well well-small">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'faq-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

<div id="horizontalTab">
            <ul class="resp-tabs-list">
                <li>FAQ</li>
            </ul>
            <div class="resp-tabs-container">
                <div>
            			<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'faq_question'); ?>
		<?php echo $form->textArea($model,'faq_question',array('rows'=>6, 'cols'=>50 ,'style'=>"width:95%")); ?>
		<?php echo $form->error($model,'faq_question'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'faq_answer'); ?>
		<?php echo $form->textArea($model,'faq_answer',array('rows'=>6, 'cols'=>50 ,'style'=>"width:95%")); ?>
		<?php echo $form->error($model,'faq_answer'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
	  	<?php echo $form->dropDownList($model,'status',array( '' => "-- Please select status --", "Active"=>"Active","InActive"=>"InActive")); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>
                </div>
                
                
            </div>
        </div>


	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save' , array('class' => 'btn btn-info')); ?>
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
       

