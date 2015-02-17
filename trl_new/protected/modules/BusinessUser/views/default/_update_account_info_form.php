<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'business-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	 'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>
<?php echo $form->error($model,'business_name'); ?>

<section class="container account_info_wrapper">
  <section class="text-left">
    <h5>Your Account infromation</h5>
  </section>
  <ul class="nav nav-tabs" id="myTab">
    <li class="active"><a data-toggle="tab" href="#account_detail">Account Details</a></li>
    <li class=""><a data-toggle="tab" href="#invoices">Invoices</a></li>
    <li class=""><a data-toggle="tab" href="#products">Products</a></li>
    <li class=""><a data-toggle="tab" href="#user">Users</a></li>
  </ul>
  <div class="tab-content" id="myTabContent">
    <div id="account_detail" class="tab-pane fade active in"> 
	<?php echo $form->errorSummary(array($model, $model_Ccdetails)); ?>
      <h1>Account Info
        <input type="button" id="account_info" class="edit_button pull-right">
      </h1>
      <div class="show_account_info">
        <dl>
          <dt><?php echo $form->labelEx($model,'owner_name'); ?></dt>
          <dd><?php echo $model->owner_name ; ?> <?php echo $form->error($model,'owner_name'); ?> </dd>
        </dl>
        <dl>
          <dt><?php echo $form->labelEx($model,'email'); ?></dt>
          <dd><?php echo $model->email ; ?> <?php echo $form->error($model,'email'); ?> </dd>
        </dl>
        <dl>
          <dt><?php echo $form->labelEx($model,'phone'); ?></dt>
          <dd><?php echo $model->phone ; ?> <?php echo $form->error($model,'phone'); ?> </dd>
        </dl>
        <dl>
          <dt>&nbsp;</dt>
          <dd>&nbsp;</dd>
        </dl>
      </div>
      <div class="edit_account_info" >
        <dl>
          <dt><?php echo $form->labelEx($model,'owner_name'); ?></dt>
          <dd><?php echo $form->textField($model,'owner_name',array('size'=>60,'maxlength'=>100)); ?></dd>
        </dl>
        <dl>
          <dt><?php echo $form->labelEx($model,'email'); ?></dt>
          <dd><?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>100)); ?></dd>
        </dl>
        <dl>
          <dt><?php echo $form->labelEx($model,'phone'); ?></dt>
          <dd><?php echo $form->textField($model,'phone',array('size'=>60,'maxlength'=>100)); ?></dd>
        </dl>
        <dl>
          <dt>&nbsp;</dt>
          <dd>&nbsp;</dd>
        </dl>
      </div>
      <h1>CC Details
        <input type="button" id="cc_details" class="edit_button pull-right">
      </h1>
      <div class="show_cc_details">
	    <dl>
          <dt><?php echo $form->labelEx($model_Ccdetails,'name_on_card'); ?></dt>
          <dd><?php echo $model_Ccdetails->name_on_card; ?> <?php echo $form->error($model_Ccdetails,'name_on_card'); ?></dd>
        </dl>
        <dl>
          <dt><?php echo $form->labelEx($model_Ccdetails,'business_address'); ?></dt>
          <dd><?php echo $model_Ccdetails->business_address; ?> <?php echo $form->error($model_Ccdetails,'business_address'); ?> </dd>
        </dl>
        <dl>
          <dt><?php echo $form->labelEx($model_Ccdetails,'city'); ?></dt>
          <dd><?php echo $model_Ccdetails->city; ?> <?php echo $form->error($model_Ccdetails,'city'); ?> </dd>
        </dl>
        <dl>
          <dt><?php echo $form->labelEx($model_Ccdetails,'state'); ?></dt>
          <dd><?php echo $model_Ccdetails->state; ?> <?php echo $form->error($model_Ccdetails,'state'); ?></dd>
        </dl>
        <dl>
          <dt><?php echo $form->labelEx($model_Ccdetails,'zip'); ?></dt>
          <dd><?php echo $model_Ccdetails->zip; ?> <?php echo $form->error($model_Ccdetails,'zip'); ?> </dd>
        </dl>
        <dl>
          <dt><?php echo $form->labelEx($model_Ccdetails,'card_number'); ?></dt>
          <dd><?php echo $model_Ccdetails->card_number; ?> <?php echo $form->error($model_Ccdetails,'card_number'); ?> </dd>
        </dl>
        <dl>
          <dt>Experation Date:</dt>
          <dd><?php echo $model_Ccdetails->expiration_mnt; ?> / <?php echo $model_Ccdetails->expiration_year; ?> <?php echo $form->error($model_Ccdetails,'expiration_mnt'); ?><?php echo $form->error($model_Ccdetails,'expiration_year'); ?> </dd>
        </dl>
        <dl>
          <dt>&nbsp;</dt>
          <dd>&nbsp;</dd>
        </dl>
      </div>
      <div class="edit_cc_details" >
        <dl>
          <dt><?php echo $form->labelEx($model_Ccdetails,'name_on_card'); ?></dt>
          <dd><?php echo $form->textField($model_Ccdetails,'name_on_card'); ?> <?php echo $form->error($model_Ccdetails,'name_on_card'); ?></dd>
        </dl>
        <dl>
          <dt><?php echo $form->labelEx($model_Ccdetails,'business_address'); ?></dt>
          <dd>
		  <?php echo $form->textArea($model_Ccdetails, 'business_address', array('maxlength' => 300, 'rows' => 3, 'cols' => 30)); ?>
		   <?php echo $form->error($model_Ccdetails,'business_address'); ?> </dd>
        </dl>
        <dl>
          <dt><?php echo $form->labelEx($model_Ccdetails,'city'); ?></dt>
          <dd><?php echo $form->textField($model_Ccdetails,'city'); ?> <?php echo $form->error($model_Ccdetails,'city'); ?> </dd>
        </dl>
        <dl>
          <dt><?php echo $form->labelEx($model_Ccdetails,'state'); ?></dt>
          <dd><?php echo $form->textField($model_Ccdetails,'state'); ?> <?php echo $form->error($model_Ccdetails,'state'); ?></dd>
        </dl>
        <dl>
          <dt><?php echo $form->labelEx($model_Ccdetails,'zip'); ?></dt>
          <dd><?php echo $form->textField($model_Ccdetails,'zip'); ?> <?php echo $form->error($model_Ccdetails,'zip'); ?> </dd>
        </dl>
        <dl>
          <dt><?php echo $form->labelEx($model_Ccdetails,'card_number'); ?></dt>
          <dd><?php echo $form->textField($model_Ccdetails,'card_number'); ?> <?php echo $form->error($model_Ccdetails,'card_number'); ?> </dd>
        </dl>
        <dl>
          <dt>Experation Date:</dt>
          <dd><?php echo $form->textField($model_Ccdetails,'expiration_mnt'); ?> / <?php echo $form->textField($model_Ccdetails,'expiration_year'); ?> <?php echo $form->error($model_Ccdetails,'expiration_mnt'); ?><?php echo $form->error($model_Ccdetails,'expiration_year'); ?> </dd>
        </dl>
        <dl>
          <dt>&nbsp;</dt>
          <dd>&nbsp;</dd>
        </dl>
      </div>
      <dl>
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'save changes' , array('class' => 'btn btn_skyblue')); ?>
      </dl>
      <?php $this->endWidget(); ?>
    </div>
    <div id="invoices" class="tab-pane fade invoices">
      <div class="table-responsive">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table text-center">
          <thead>
            <tr>
              <td class="text-left">Invoice #</td>
              <td>Invoice</td>
              <td>Due Date</td>
              <td>Date Paid</td>
              <td>Status </td>
              <td>Total</td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="text-left">33437</td>
              <td>11/13/2013</td>
              <td>11/14/2013</td>
              <td>11/14/2013</td>
              <td>Paid</td>
              <td><b>$ 45</b></td>
            </tr>
            <tr class="alter_colr">
              <td class="text-left">33437</td>
              <td>11/13/2013</td>
              <td>11/14/2013</td>
              <td>11/14/2013</td>
              <td>Paid</td>
              <td><b>$ 45</b></td>
            </tr>
            <tr>
              <td class="text-left">33437</td>
              <td>11/13/2013</td>
              <td>11/14/2013</td>
              <td>11/14/2013</td>
              <td>Paid</td>
              <td><b>$ 45</b></td>
            </tr>
            <tr class="alter_colr">
              <td class="text-left">33437</td>
              <td>11/13/2013</td>
              <td>11/14/2013</td>
              <td>11/14/2013</td>
              <td>Paid</td>
              <td><b>$ 45</b></td>
            </tr>
            <tr>
              <td class="text-left">33437</td>
              <td>11/13/2013</td>
              <td>11/14/2013</td>
              <td>11/14/2013</td>
              <td>Paid</td>
              <td><b>$ 45</b></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div id="products" class="tab-pane fade products">
      <div class="table-responsive">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table text-center">
          <thead>
            <tr>
              <td class="text-left">Product </td>
              <td>Price </td>
              <td>Billing Cycle</td>
              <td>Next Due Date</td>
              <td>Status</td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="text-left">Standard Listing</td>
              <td>$45</td>
              <td>Monthly </td>
              <td>11/14/2013</td>
              <td>Paid</td>
            </tr>
            <tr class="alter_colr">
              <td class="text-left">33437</td>
              <td>11/13/2013</td>
              <td>11/14/2013</td>
              <td>11/14/2013</td>
              <td>Paid</td>
            </tr>
            <tr>
              <td class="text-left">33437</td>
              <td>11/13/2013</td>
              <td>11/14/2013</td>
              <td>11/14/2013</td>
              <td>Paid</td>
            </tr>
            <tr class="alter_colr">
              <td class="text-left">33437</td>
              <td>11/13/2013</td>
              <td>11/14/2013</td>
              <td>11/14/2013</td>
              <td>Paid</td>
            </tr>
            <tr>
              <td class="text-left">33437</td>
              <td>11/13/2013</td>
              <td>11/14/2013</td>
              <td>11/14/2013</td>
              <td>Paid</td>
            </tr>
          </tbody>
        </table>
        <a href="javascript:;" class="add_product"><b>+</b> Add A New Product</a> </div>
    </div>
    <div id="user" class="tab-pane fade">
      <h1>Users
        <input type="button" class="edit_button pull-right">
      </h1>
      <dl>
        <dt>Type:</dt>
        <dd>Admin</dd>
      </dl>
      <dl>
        <dt>Username:</dt>
        <dd>JB</dd>
      </dl>
      <dl>
        <dt>Password:</dt>
        <dd>*********</dd>
      </dl>
      <dl>
        <dt>Name:</dt>
        <dd>JB Kellogg</dd>
      </dl>
      <dl>
        <dt>Email:</dt>
        <dd>jb@madwiremedia</dd>
      </dl>
      <dl>
        <dt>Phone:</dt>
        <dd>(888)898-6675</dd>
      </dl>
      <hr/>
      <a href="javascript:;" class="add_product"><b>+</b> Add A New Product</a> </div>
  </div>
</section>
<script type="text/ecmascript">
	
	$(document).ready(function(){
	
	  <?php if($form->errorSummary(array($model, $model_Ccdetails))) {?>
	  		$(".show_account_info , .show_cc_details ").hide();
	  <?php }else{ ?>
	  		$(".edit_account_info , .edit_cc_details ").hide();
	  <?php } ?>
	
			
			
			
				 $(".edit_button").click(function(){
	 var id = this.id; 
    $(".show_"+id).toggle();
	$(".edit_"+id).toggle();
  });

	
		   
	});

</script>
