
            
           
                
                <div class="verify_form">
				<?php $form=$this->beginWidget('CActiveForm', array(
								'id'=>'customer-form',
								'enableAjaxValidation'=>false,
						)); ?>
				<?php echo $form->errorSummary($model); ?>
                	<ul>
                    	<li>
                        	<label>1</label>
                            <span>Only verified customers can rate this business.</span>
                        </li>
                        
                        <li>
                        	<label>2</label>
                            <span>Please verify you are a customer</span>
                        </li>
                        
                        <li class="email_section">
						

							
                        	<div class="form-group col-sm-8">
                              <?php echo $form->textField($model,'full_name',array('placeholder' => "Enter A Full Name" ,"class"=>"form-control")); ?>
							  <?php echo $form->error($model,'full_name'); ?>
                            </div>
                            <div class="clear"></div>
                            <div class="form-group col-sm-8">
                             	 <?php echo $form->textField($model,'email_address',array('placeholder' => "Enter Email" ,"class"=>"form-control")); ?>
								 <?php echo $form->error($model,'email_address'); ?>
                            </div>
                        	<div class="clear"></div>
                        	<input type="submit" class="btn btn_skyblue" value="verify"/>
                  
					 
					 <?php $this->endWidget(); ?>
					 
                        </li>
                        
                        
                        <li>
                        	<label>3</label>
                        	<span>Ones verified you will recive an email with access<br/> to rate this business</span>
                        
                        </li>
                        
                       <li> <b>*</b> <em>if you have already requested access but did not recive an <br/> email check your spam folder. if still no emial request access<br/>  again & tray using another email address.</em></li>
                        
                        
                    </ul>
                </div>
                
           
         
            