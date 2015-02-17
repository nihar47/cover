<?php
/* @var $this BusinessController */
/* @var $data Business */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('business_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->business_id), array('view', 'id'=>$data->business_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('owner_name')); ?>:</b>
	<?php echo CHtml::encode($data->owner_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('business_name')); ?>:</b>
	<?php echo CHtml::encode($data->business_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('logo')); ?>:</b>
	<?php echo CHtml::encode($data->logo); ?>
	<br />
    
    	<?php if($model->isNewRecord!='1'){ ?>
   <b>
         <?php echo CHtml::image(Yii::app()->request->baseUrl.'/../business_logo/'.$model->logo,"logo",array("width"=>200)); ?>  
    <br />
    <?php } ?>
    
    

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('salt')); ?>:</b>
	<?php echo CHtml::encode($data->salt); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('phone')); ?>:</b>
	<?php echo CHtml::encode($data->phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('website')); ?>:</b>
	<?php echo CHtml::encode($data->website); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_logined_date')); ?>:</b>
	<?php echo CHtml::encode($data->last_logined_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_logined_ip')); ?>:</b>
	<?php echo CHtml::encode($data->last_logined_ip); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_added')); ?>:</b>
	<?php echo CHtml::encode($data->date_added); ?>
	<br />

	*/ ?>

</div>