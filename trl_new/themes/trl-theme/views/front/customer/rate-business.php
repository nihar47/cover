
<script type="text/javascript">
$( document ).ready(function() {

/* Quality */
$("#quality-rate-div").click(function() {
var rateValue = $("input:radio[name=qulity-test]:checked").val();

$("#quality-span").html(rateValue);
$("#qulity").val(rateValue);
});

/* Value */
$("#value-rate-div").click(function() {
var rateValue = $("input:radio[name=value-test]:checked").val();

$("#value-span").html(rateValue);
$("#value").val(rateValue);

});

/* Timeliness */
$("#timeliness-rate-div").click(function() {
var rateValue = $("input:radio[name=timeliness-test]:checked").val();

$("#timeliness-span").html(rateValue);
$("#timeliness").val(rateValue);
});

/* Experience */
$("#experience-rate-div").click(function() {
var rateValue = $("input:radio[name=experience-test]:checked").val();

$("#experience-span").html(rateValue);
$("#experience").val(rateValue);
});

/* Satisfaction */
$("#satisfaction-rate-div").click(function() {
var rateValue = $("input:radio[name=satisfaction-test]:checked").val();

$("#satisfaction-span").html(rateValue);
$("#satisfaction").val(rateValue);
});

});

</script>





     	<div class="requests text-center container">
                	<span class="blue"><?php echo 'Hi,'.$model->full_name.'!'; ?></span>&nbsp;Rate <?php echo $business->business_name; ?> Below.                    
                </div>
                
                <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'customer-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>


                <section class="rate_brester container">
                	                	<div class="col-lg-6 pull-left">
                    	
						
						<dl>
                        	<dt>Quality</dt>
                        	<dd>
                            	<div style="left: 0px; top: 0px;" class="Scroller-Container">
                                
                                <ul class="rating_list event" id="Scroller-1">
                                	<div class="group">
                                    <div class="inner_group">
                                    
                             
                                    <div id="quality-rate-div">
									<?php for($i=0.5;$i<=5;$i=$i+0.5) { ?>
                                    <input    class="star {split:2}" type="radio" name="qulity-test" value="<?php echo $i; ?>" <?php if(isset($model->qulity) && $model->qulity == $i) echo 'checked="checked"'; ?> />
									<?php } ?>
									
	<?php echo $form->hiddenField($model,'qulity',array('id'=>'qulity')); ?>
	
						
					
                                  </div>
    							
                                    
										
                                     </div>   
                                    <span class="counter">
                                    	<span id="quality-span"><?php if(isset($model->qulity)) echo $model->qulity; else echo '0'; ?></span>
                                    </span>
                                    </div>  
                                  
                                </ul>
                                </div>
                            	
                                <div class="controler" >
                                	
                                   <div class="arrow_div"> <strong><a href="javascript:;" class="up_word" onmouseover="scroller.startScroll(0, 2);" onmouseout="scroller.stopScroll();" ><i class="fa fa-caret-up"></i></a></strong>
                                    <b><a href="javascript:;" class="down_word" onmouseover="scroller.startScroll(0, -2);" onmouseout="scroller.stopScroll();" ><i class="fa fa-caret-down"></i></a></b></div>
                                </div>                            
                            </dd>
                        </dl>
                        

						
						
						   	
						
						<dl>
                        	<dt>Value</dt>
                        	<dd>
                            	<div style="left: 0px; top: 0px;" class="Scroller-Container">
                                
                                <ul class="rating_list event" id="Scroller-1">
                                	<div class="group">
                                    <div class="inner_group">
                                    
                             
                                    <div id="value-rate-div">
									<?php for($i=0.5;$i<=5;$i=$i+0.5) { ?>
                                    <input    class="star {split:2}" type="radio" name="value-test" value="<?php echo $i; ?>" <?php if(isset($model->value) && $model->value == $i) echo 'checked="checked"'; ?> />
									<?php } ?>						
										
			<?php echo $form->hiddenField($model,'value',array('id'=>'value')); ?>
			
                                  </div>
    							
                                    
										
                                     </div>   
                                    <span class="counter">
                                    	<span id="value-span"><?php if(isset($model->value)) echo $model->value; else echo '0'; ?></span>
                                    </span>
                                    </div>  
                                  
                                </ul>
                                </div>
                            	
                                <div class="controler" >
                                	
                                   <div class="arrow_div"> <strong><a href="javascript:;" class="up_word" onmouseover="scroller.startScroll(0, 2);" onmouseout="scroller.stopScroll();" ><i class="fa fa-caret-up"></i></a></strong>
                                    <b><a href="javascript:;" class="down_word" onmouseover="scroller.startScroll(0, -2);" onmouseout="scroller.stopScroll();" ><i class="fa fa-caret-down"></i></a></b></div>
                                </div>                            
                            </dd>
                        </dl>
                        

						
						                    	
						
						<dl>
                        	<dt>Timeliness</dt>
                        	<dd>
                            	<div style="left: 0px; top: 0px;" class="Scroller-Container">
                                
                                <ul class="rating_list event" id="Scroller-1">
                                	<div class="group">
                                    <div class="inner_group">
                                    
                             
                                    <div id="timeliness-rate-div">
									<?php for($i=0.5;$i<=5;$i=$i+0.5) { ?>
                                    <input    class="star {split:2}" type="radio" name="timeliness-test" value="<?php echo $i; ?>" <?php if(isset($model->timeliness) && $model->timeliness == $i) echo 'checked="checked"'; ?> />
									<?php } ?>
                                  </div>
    							
               <?php echo $form->hiddenField($model,'timeliness',array('id'=>'timeliness')); ?>                     
										
                                     </div>   
                                    <span class="counter">
                                    	<span id="timeliness-span"><?php if(isset($model->timeliness)) echo $model->timeliness; else echo '0'; ?></span>
                                    </span>
                                    </div>  
                                  
                                </ul>
                                </div>
                            	
                                <div class="controler" >
                                	
                                   <div class="arrow_div"> <strong><a href="javascript:;" class="up_word" onmouseover="scroller.startScroll(0, 2);" onmouseout="scroller.stopScroll();" ><i class="fa fa-caret-up"></i></a></strong>
                                    <b><a href="javascript:;" class="down_word" onmouseover="scroller.startScroll(0, -2);" onmouseout="scroller.stopScroll();" ><i class="fa fa-caret-down"></i></a></b></div>
                                </div>                            
                            </dd>
                        </dl>
                        

						
						
						                    	
						
						<dl>
                        	<dt>Experience</dt>
                        	<dd>
                            	<div style="left: 0px; top: 0px;" class="Scroller-Container">
                                
                                <ul class="rating_list event" id="Scroller-1">
                                	<div class="group">
                                    <div class="inner_group">
                                    
                             
                                    <div id="experience-rate-div">
									<?php for($i=0.5;$i<=5;$i=$i+0.5) { ?>
                                    <input    class="star {split:2}" type="radio" name="experience-test" value="<?php echo $i; ?>" <?php if(isset($model->experience) && $model->experience == $i) echo 'checked="checked"'; ?> />
									<?php } ?>
                                  </div>
    							
           <?php echo $form->hiddenField($model,'experience',array('id'=>'experience')); ?>                                    
										
                                     </div>   
                                    <span class="counter">
                                    	<span id="experience-span"><?php if(isset($model->experience)) echo $model->experience; else echo '0'; ?></span>
                                    </span>
                                    </div>  
                                  
                                </ul>
                                </div>
                            	
                                <div class="controler" >
                                	
                                   <div class="arrow_div"> <strong><a href="javascript:;" class="up_word" onmouseover="scroller.startScroll(0, 2);" onmouseout="scroller.stopScroll();" ><i class="fa fa-caret-up"></i></a></strong>
                                    <b><a href="javascript:;" class="down_word" onmouseover="scroller.startScroll(0, -2);" onmouseout="scroller.stopScroll();" ><i class="fa fa-caret-down"></i></a></b></div>
                                </div>                            
                            </dd>
                        </dl>
                        

						
						                    	
						
						<dl>
                        	<dt>Satisfaction</dt>
                        	<dd>
                            	<div style="left: 0px; top: 0px;" class="Scroller-Container">
                                
                                <ul class="rating_list event" id="Scroller-1">
                                	<div class="group">
                                    <div class="inner_group">
                                    
                             
                                    <div id="satisfaction-rate-div">
									<?php for($i=0.5;$i<=5;$i=$i+0.5) { ?>
                                    <input    class="star {split:2}" type="radio" name="satisfaction-test" value="<?php echo $i; ?>" <?php if(isset($model->satisfaction) && $model->satisfaction == $i) echo 'checked="checked"'; ?> />
									<?php } ?>
                                  </div>
    							
                                    
  <?php echo $form->hiddenField($model,'satisfaction',array('id'=>'satisfaction')); ?>  
  
                                     </div>   
                                    <span class="counter">
                                    	<span id="satisfaction-span"><?php if(isset($model->satisfaction)) echo $model->satisfaction; else echo '0'; ?></span>
                                    </span>
                                    </div>  
                                  
                                </ul>
                                </div>
                            	
                                <div class="controler" >
                                	
                                   <div class="arrow_div"> <strong><a href="javascript:;" class="up_word" onmouseover="scroller.startScroll(0, 2);" onmouseout="scroller.stopScroll();" ><i class="fa fa-caret-up"></i></a></strong>
                                    <b><a href="javascript:;" class="down_word" onmouseover="scroller.startScroll(0, -2);" onmouseout="scroller.stopScroll();" ><i class="fa fa-caret-down"></i></a></b></div>
                                </div>                            
                            </dd>
                        </dl>
                        

						
						
						
						
						
                    
                    </div>
                   
                    
                    <div class="col-lg-6 pull-right">
                    	<div class="experence_box">
                            	<h5>Explain your experience below <em>(option)</em> </h5>
                                <div class="explain_experience">
                                	
                     <?php echo $form->textArea($model,'comments', array('id'=>'comments')); ?>             
                                </div>
                       </div>
                    
                    </div>
					<div class="clear">&nbsp;</div>
					<div class="text-center submit_rating ">
						<input type="submit" value="Submit my rating"  class="btn btn_skyblue" />
					</div>
                
                </section>
<?php $this->endWidget(); ?>


					<script>
					
				
    $(function(){
     $('.hover-star').rating({
      focus: function(value, link){
	
	    // 'this' is the hidden form element holding the current value
        // 'value' is the value selected
        // 'element' points to the link element that received the click.
        var tip = $('#hover-test');
        tip[0].data = tip[0].data || tip.html();
        tip.html(link.title || 'value: '+value);
      },
      blur: function(value, link){ 
        var tip = $('#hover-test');
        $('#hover-test').html(tip[0].data || '');
      }
     });
	 $(".star-rating:odd").addClass("seprate"); 
			
	});
	

    </script>
