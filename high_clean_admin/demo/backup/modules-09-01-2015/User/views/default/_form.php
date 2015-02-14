<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="col-md-12">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>


	<?php echo $form->errorSummary($model); ?>
 <div class="col-md-5 mr100">
	<div class="form-group">
		<?php echo $form->labelEx($model,'Avatar',array('class'=>'col-sm-5')); ?>
		 <div class="col-sm-7">
		 <?php echo CHtml::activeFileField($model, 'Avatar',array('class'=>'form-control')); ?>
		</div>
		<?php echo $form->error($model,'Avatar'); ?>
	</div>
	

	<div class="form-group">
		<?php echo $form->labelEx($model,'first_name',array('class'=>'col-sm-5')); ?>
		 <div class="col-sm-7">
		<?php echo $form->textField($model,'first_name',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
		
		<?php echo $form->error($model,'first_name'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'last_name',array('class'=>'col-sm-5')); ?>
		 <div class="col-sm-7">
		<?php echo $form->textField($model,'last_name',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>

		<?php echo $form->error($model,'last_name'); ?>
				</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'username',array('class'=>'col-sm-5')); ?>
		<div class="col-sm-7">
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'username'); ?>
		</div>
		
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'password',array('class'=>'col-sm-5')); ?>
		<div class="col-sm-7">
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
				<?php echo $form->error($model,'password'); ?>
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
		<?php echo $form->labelEx($model,'role_id',array('class'=>'col-sm-5')); ?>
		<div class="col-sm-7">
		<?php echo $form->dropDownList($model, 'role_id', CHtml::listData(Group::model()->findAll(), 'id', 'role'),array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'role_id'); ?>
		</div>
		
	</div>

	
	<div class="form-group">
		<?php echo $form->labelEx($model,'gender',array('class'=>'col-sm-5')); ?>
		<div class="col-sm-7">
		 <?php echo $form->dropDownList($model, 'gender', array("Male" => "Male", "Female" => "Female", "UnKnown" => "UnKnown"),array('class'=>'form-control')); ?>		
		 <?php echo $form->error($model,'gender'); ?>
		</div>
		
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'date_of_birth',array('class'=>'col-sm-5')); ?>
		<div class="col-sm-7">
	<?php
$this->widget(
    'ext.jui.EJuiDateTimePicker',
    array(
        'model'     => $model,
        'attribute' => 'date_of_birth',
		//'language'=> 'ru',//default Yii::app()->language
        //'mode'    => 'datetime',//'datetime' or 'time' ('datetime' default)
		'mode'    => 'date',
		'htmlOptions' => array(
                    'class' => 'form-control',
                ),
        'options'   => array(
        'dateFormat' => 'yy-mm-dd',
        'showAnim'=>'slideDown',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
        'changeMonth'=>true,
        'changeYear'=>true,
        'yearRange'=>'1930:'.date("Y"),
        //'minDate' => '2000-01-01',      // minimum date
        'maxDate' => date("Y-m-d"),      // maximum date
		
            //'timeFormat' => '',//'hh:mm tt' default
        ),
    )
);
?>

<?php echo $form->error($model,'date_of_birth'); ?>
		</div>
		
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'view_jobs',array('class'=>'col-sm-5')); ?>
		<div class="col-sm-7">		
		<?php echo $form->checkBox($model,'view_jobs',array('size'=>1,'maxlength'=>1,'class'=>'')); ?>
		<?php echo $form->error($model,'view_jobs'); ?>
		</div>
		
	</div>
</div>
 <div class="col-md-5">
	<div class="form-group">
		<?php echo $form->labelEx($model,'home_phone',array('class'=>'col-sm-5')); ?>
		<div class="col-sm-7">
		<?php echo $form->textField($model,'home_phone',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'home_phone'); ?>
		</div>
		
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'mobile_phone',array('class'=>'col-sm-5')); ?>
		<div class="col-sm-7">
		<?php echo $form->textField($model,'mobile_phone',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'mobile_phone'); ?>
		</div>
		
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'street',array('class'=>'col-sm-5')); ?>
		<div class="col-sm-7">
		<?php echo $form->textField($model,'street',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'street'); ?>
		</div>
		
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'city',array('class'=>'col-sm-5')); ?>
		<div class="col-sm-7">
		<?php echo $form->textField($model,'city',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'city'); ?>
		</div>
		
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'state_province',array('class'=>'col-sm-5')); ?>
		<div class="col-sm-7">
		<?php echo $form->textField($model,'state_province',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'state_province'); ?>
		</div>
		
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'country_id',array('class'=>'col-sm-5')); ?>
		<div class="col-sm-7">
		<?php echo $form->dropDownList($model, 'country_id', CHtml::listData(Countries::model()->findAll(), 'id', 'country_name'),array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'country_id'); ?>
		</div>
		
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'zip_code',array('class'=>'col-sm-5')); ?>
		<div class="col-sm-7">
		<?php echo $form->textField($model,'zip_code',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'zip_code'); ?>
		</div>
		
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'interested_in',array('class'=>'col-sm-5')); ?>
		<div class="col-sm-7">
		<?php echo $form->radioButtonList($model,'interested_in',array('Product Sales'=>'Product Sales', 'Cleaning Services'=>'Cleaning Services'),array('size'=>17,'maxlength'=>17,'class'=>'')); ?>
		<?php echo $form->error($model,'interested_in'); ?>
		</div>
		
	</div>

</div>
	  <div class="col-md-12" align="center">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary mr5')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->