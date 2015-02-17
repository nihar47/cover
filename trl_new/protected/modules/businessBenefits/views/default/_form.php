<?php
/* @var $this BusinessBenefitsController */
/* @var $model BusinessBenefits */
/* @var $form CActiveForm */
?>

<div  class="form form-horizontal well well-small">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'business-benefits-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

<div id="horizontalTab">
            <ul class="resp-tabs-list">
                <li>Business Benefit</li>
             </ul>
            <div class="resp-tabs-container">
                <div>
                 <p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'business_benefits'); ?>
	     <?php echo $form->textArea($model,'business_benefits',array('rows'=>6, 'cols'=>50, 'style' => 'width:80%'  )); ?>
		<?php echo $form->error($model,'business_benefits'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		 <?php echo $form->dropDownList($model,'status',array("Active"=>"Active","InActive"=>"InActive")); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>
                </div>
                
                
            </div>
        </div>


	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class' => 'btn btn-info')); ?>
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
       