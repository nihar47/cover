<?php
/* @var $this SwmsController */
/* @var $model Swms */
/* @var $form CActiveForm */
?>

<div class="col-md-12">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'swms-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	

	<?php echo $form->errorSummary($model); ?>

		 <div class="table-responsive">
                <table class="table table-bordered mb30 create_quote_table">
                  <tbody>
	

    <tr>
    <th><?php echo $form->labelEx($model,'name',array('class'=>'col-sm-5')); ?></th>
	<td>
	<div class="createselect2 mr30">
	<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
	<?php echo $form->error($model,'name'); ?>
	</div>
	</td>
	</tr>
		

    <tr>
    <th><?php echo $form->labelEx($model,'task',array('class'=>'col-sm-5')); ?></th>
	<td>
	<div class="createselect2 mr30">
	<?php echo $form->textField($model,'task',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
	<?php echo $form->error($model,'task'); ?>
	</div>
	</td>
	</tr>
		

    <tr>
    <th><?php echo $form->labelEx($model,'consequences',array('class'=>'col-sm-5')); ?></th>
	<td>
	<div class="createselect2 mr30">
	<?php echo $form->textField($model,'consequences',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
	<?php echo $form->error($model,'consequences'); ?>
	</div>
	</td>
	</tr>
			

    <tr>
    <th><?php echo $form->labelEx($model,'risk',array('class'=>'col-sm-5')); ?></th>
	<td>
	<div class="createselect2 mr30">
			<?php echo $form->dropDownList($model, 'risk', array("LOW" => "LOW", "MEDIUM" => "MEDIUM", "HIGH" => "HIGH"),array('class'=>'form-control')); ?>
	<?php echo $form->error($model,'risk'); ?>
	</div>
	</td>
	</tr>
		
    <tr>
    <th><?php echo $form->labelEx($model,'description',array('class'=>'col-sm-5')); ?></th>
	<td>
	<div class="createselect2 mr30">
	<?php echo $form->textArea($model,'description',array('id'=>'editor1')); ?>
	<?php echo $form->error($model,'description'); ?>
	</div>
	</td>
	</tr>
		

<tr>
                      <td colspan="2" align="center">
	  <div class="col-md-12" align="center">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary mr5')); ?>
	</div>	
</td></tr>
	 </tbody>
                </table>
              </div>
	
	
<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">    CKEDITOR.replace( 'editor1' ); </script>