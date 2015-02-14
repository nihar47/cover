<?php
/* @var $this ContactsSiteController */
/* @var $model ContactsSite */
/* @var $form CActiveForm */
?>

<div class="col-md-6 mb20">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contacts-site-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<!--<p class="note">Fields with <span class="required">*</span> are required.</p>-->

	
<?php
				
				$criteria = new CDbCriteria();
				$criteria->select = "id,first_name,surname,mobile";
				$criteria->order = 'first_name';
				$loop_contacts = Contact::model()->findAll($criteria);
				
				foreach ($loop_contacts as $value)  {			
				$contacts_options[$value->id] =  $value->first_name.' '.$value->surname.' (mobile-'.$value->mobile.')'; 
				}

?>
	
	<div class="form-group">
		<strong class="col-sm-5">Select Contacts</strong>
		<div class="col-sm-7">
		
		<?php
		
		foreach($contacts_options as $key=>$value) { ?>
		<input <?php if(isset($last_selected_contact_ids) && count($last_selected_contact_ids) > 0 && in_array($key,$last_selected_contact_ids)) echo 'checked'; ?> type="checkbox" name="contact_ids[]" value="<?php echo $key; ?>">&nbsp;&nbsp;<?php echo $value; ?><br/>
		<?php }
		
		?>
		
	<?php
	if(isset($contact_ids_error_msg) && !empty($contact_ids_error_msg)) echo $contact_ids_error_msg;
	?>
		
		</div>
		
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'site_name',array('class'=>'col-sm-5')); ?>
		<div class="col-sm-7">
		<?php echo $form->textField($model,'site_name',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'site_name'); ?>
		</div>
		
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'site_id',array('class'=>'col-sm-5')); ?>
		<div class="col-sm-7">
		<?php echo $form->textField($model,'site_id',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'site_id'); ?>
		</div>
		
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'address',array('class'=>'col-sm-5')); ?>
		<div class="col-sm-7">
		<?php echo $form->textArea($model,'address',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'address'); ?>
		</div>
		
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'suburb',array('class'=>'col-sm-5')); ?>
		<div class="col-sm-7">
		<?php echo $form->textField($model,'suburb',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'suburb'); ?>
		</div>
		
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'state',array('class'=>'col-sm-5')); ?>
		<div class="col-sm-7">
		<?php echo $form->textField($model,'state',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'state'); ?>
		</div>
		
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'postcode',array('class'=>'col-sm-5')); ?>
			<div class="col-sm-7">
		<?php echo $form->textField($model,'postcode',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'postcode'); ?>
		</div>
		
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'phone',array('class'=>'col-sm-5')); ?>
		<div class="col-sm-7">
		<?php echo $form->textField($model,'phone',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'phone'); ?>
		</div>
		
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'mobile',array('class'=>'col-sm-5')); ?>
		<div class="col-sm-7">
		<?php echo $form->textField($model,'mobile',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'mobile'); ?>
		</div>
		
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'email',array('class'=>'col-sm-5')); ?>
		<div class="col-sm-7">
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'email'); ?>
		</div>
		
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'site_contact',array('class'=>'col-sm-5')); ?>
		<div class="col-sm-7">
		<?php echo $form->textField($model,'site_contact',array('size'=>60,'maxlength'=>255,'class'=>'form-control',"id"=>"txtAlphabets")); ?>
		<?php echo $form->error($model,'site_contact'); ?>
		</div>
		
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'site_comments',array('class'=>'col-sm-5')); ?>
		<div class="col-sm-7">
		<?php echo $form->textArea($model,'site_comments',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'site_comments'); ?>
		</div>
		
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'how_many_buildings',array('class'=>'col-sm-5')); ?>
		<div class="col-sm-7">
		<?php echo $form->textField($model,'how_many_buildings',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'how_many_buildings'); ?>
		</div>
		
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'need_induction',array('class'=>'col-sm-5')); ?>
		<div class="col-sm-7">
		<?php echo $form->radioButtonList($model,'need_induction',array('1'=>'Yes', '0'=>'No'),array('size'=>17,'maxlength'=>17,'class'=>'')); ?>
		<?php echo $form->error($model,'need_induction'); ?>
		</div>
		
	</div>

	

	<div class="row buttons" align="center">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

 <script type="text/javascript">
$(function () {
$('#txtAlphabets').keydown(function (e) {
if (e.shiftKey || e.ctrlKey || e.altKey) {
e.preventDefault();
} else {
var key = e.keyCode;
if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
e.preventDefault();
}
}
});
});
</script>