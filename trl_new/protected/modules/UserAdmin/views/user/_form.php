<div class='form form-horizontal well well-small'>

<?php $form = $this->beginWidget('CActiveForm', array(
        'enableClientValidation'=>true,
        'clientOptions'=>array(
                'validateOnSubmit'=>true,
                'validateOnChange'=>false,
        ),
)); ?>

<div id="horizontalTab">
            <ul class="resp-tabs-list">
                <li>Admin User</li>
            </ul>
            <div class="resp-tabs-container">
                <div>
                  <?php if($model->isNewRecord OR ($model->id != Yii::app()->user->id)): ?>
                <div class='control-group'>
                        <?php echo $form->labelEx($model, 'active', array('class'=>'control-label')); ?>
                        <div class='controls'>
                                <?php echo $form->dropDownList(
                                        $model,'active',
                                        array('1'=>'On', '0'=>'Off'),
                                        array('class'=>'input-small')
                                ); ?>
                                <?php echo $form->error($model, 'active'); ?>
                        </div>
                </div>
        <?php endif ?>
        
        <?php if(User::checkRole('isSuperAdmin') AND (Yii::app()->user->id != $model->id)): ?>
                <div class='control-group'>
                        <?php echo $form->labelEx($model, 'is_superadmin', array('class'=>'control-label')); ?>
                        <div class='controls'>
                                <?php echo $form->dropDownList(
                                        $model,'is_superadmin',
                                        User::getIsSuperAdminList(false),
                                        array('empty'=>'', 'class'=>'input-small')
                                ); ?>
                                <?php echo $form->error($model, 'is_superadmin'); ?>
                        </div>
                </div>
        <?php endif ?>

        <div class='control-group'>
                <?php echo $form->labelEx($model, 'login', array('class'=>'control-label')); ?>
                <div class='controls'>
                        <?php echo $form->textField($model, 'login', array('class'=>'input-xxlarge', 'autocomplete'=>'off')); ?>
                        <?php echo $form->error($model, 'login'); ?>
                </div>
        </div>

        <div class='control-group'>
                <?php echo $form->labelEx($model, 'password', array('class'=>'control-label')); ?>
                <div class='controls'>
                        <?php echo $form->passwordField($model,'password',array('class'=>'input-xxlarge')); ?>
                        <?php echo $form->error($model, 'password'); ?>
                </div>
        </div>

        <div class='control-group'>
                <?php echo $form->labelEx($model, 'repeat_password', array('class'=>'control-label')); ?>
                <div class='controls'>
                        <?php echo $form->passwordField($model, 'repeat_password', array('class'=>'input-xxlarge')); ?>
                        <?php echo $form->error($model, 'repeat_password'); ?>
                </div>
        </div>

     
                
                
                </div>
                
            </div>
        </div>

	<div class="row buttons">
      
        <?php /*echo CHtml::htmlButton(
                $model->isNewRecord ? 
                '<i ></i> '.Yii::t("UserAdminModule.admin","Create") : 
                '<i ></i> '.Yii::t("UserAdminModule.admin","Save"), 
                array(
                        'class'=>'btn btn-info controls',
                        'type'=>'submit',
                )
        );*/ ?>
        
         	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-info')); ?>
	</div>
        
	</div>

<?php $this->endWidget(); ?>

</div>
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