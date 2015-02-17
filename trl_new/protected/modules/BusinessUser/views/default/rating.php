
            
                <?php
		foreach($ratings as $ratings){
	
	?>
    	<div class="requests text-center container">
                	<span class="blue"><b class="font30"><?php echo $ratings->business_id ;?></b></span>&nbsp;Verified Customers have rated this business!                    
                </div>
                
                
                <section class="rate_brester container">
    
                	<div class="col-lg-6 pull-left">
                    	<dl>
                        	<dt>Quality</dt>
                        	<dd>
                            	<ul class="rating_list">
                                	<div class="group">
                      
	  		<?php
							
							$final_qulity = floor($ratings->qulity);							
							if($ratings->qulity == $final_qulity) {
							$final_val = $final_qulity;
							} else  {
							$final_val = ceil($ratings->qulity) - 0.5;
							} $activestar = true;							
							for ($x=1; $x<=5; $x++) {							
								if($x <= ceil($final_val) && $activestar) {
									echo '<li>'.CHtml::image(Yii::app()->request->baseUrl.'/images/star.png',"*").'</li>'; 
								} 								
								if(($x+0.5) == $final_val) { $activestar = false;
								echo '<li>'.CHtml::image(Yii::app()->request->baseUrl.'/images/star_half.png',"*").'</li>';  
								} else if($x > ceil($final_val) ) { $activestar = false;
									echo '<li>'.CHtml::image(Yii::app()->request->baseUrl.'/images/star_null.png',"*").'</li>'; 
								} 
							}
							
						?>
					  
          
                                    </div>
		
                                </ul>
                            	
                                <div class="controler" id="slide1_controls">
                                	<span class="counter counter_mid">
                                    	<span><?php echo $final_val; ?></span>
                                       
                                    </span>
                                    
                                </div>
                            
                            </dd>
                        </dl>
                        
                        <dl>
                        	<dt>Value</dt>
                        	<dd>
                            	<ul class="rating_list">
                                	<div class="group">
									
				<?php
							
							$final_value = floor($ratings->value);							
							if($ratings->value == $final_value) {
							$final_val = $final_value;
							} else  {
							$final_val = ceil($ratings->value) - 0.5;
							} $activestar = true;							
							for ($x=1; $x<=5; $x++) {							
								if($x <= ceil($final_val) && $activestar) {
									echo '<li>'.CHtml::image(Yii::app()->request->baseUrl.'/images/star.png',"*").'</li>'; 
								} 								
								if(($x+0.5) == $final_val) { $activestar = false;
								echo '<li>'.CHtml::image(Yii::app()->request->baseUrl.'/images/star_half.png',"*").'</li>';  
								} else if($x > ceil($final_val) ) { $activestar = false;
									echo '<li>'.CHtml::image(Yii::app()->request->baseUrl.'/images/star_null.png',"*").'</li>'; 
								} 
							}
							
						?>				
	
                                    </div>
		
                                 

                                
                                
                                </ul>
                            	
                                <div class="controler" id="slide1_controls">
                                	<span class="counter counter_mid">
                                    	<span><?php echo $final_val; ?></span>
                                    </span>
                                </div>
                            
                            </dd>
                        </dl>
                        
                        <dl>
                        	<dt>Timeliness</dt>
                        	<dd>
                            	<ul class="rating_list">
                                	<div class="group">
                

				<?php
							
							$final_timeliness = floor($ratings->timeliness);							
							if($ratings->timeliness == $final_timeliness) {
							$final_val = $final_timeliness;
							} else  {
							$final_val = ceil($ratings->timeliness) - 0.5;
							} $activestar = true;							
							for ($x=1; $x<=5; $x++) {							
								if($x <= ceil($final_val) && $activestar) {
									echo '<li>'.CHtml::image(Yii::app()->request->baseUrl.'/images/star.png',"*").'</li>'; 
								} 								
								if(($x+0.5) == $final_val) { $activestar = false;
								echo '<li>'.CHtml::image(Yii::app()->request->baseUrl.'/images/star_half.png',"*").'</li>';  
								} else if($x > ceil($final_val) ) { $activestar = false;
									echo '<li>'.CHtml::image(Yii::app()->request->baseUrl.'/images/star_null.png',"*").'</li>'; 
								} 
							}
							
						?>	

	
                                    </div>
		
                                
                                
                                
                                </ul>
                            	
                                <div class="controler" id="slide1_controls">
                                	<span class="counter counter_mid">
                                    	<span><?php echo $final_val; ?></span>
                                    </span>
                                </div>
                            
                            </dd>
                        </dl>
                        
                        <dl>
                        	<dt>Exprience</dt>
                        	<dd>
                            	<ul class="rating_list">
                                	<div class="group">
									
									
			
				<?php
							
							$final_experience = floor($ratings->experience);							
							if($ratings->experience == $final_experience) {
							$final_val = $final_experience;
							} else  {
							$final_val = ceil($ratings->experience) - 0.5;
							} $activestar = true;							
							for ($x=1; $x<=5; $x++) {							
								if($x <= ceil($final_val) && $activestar) {
									echo '<li>'.CHtml::image(Yii::app()->request->baseUrl.'/images/star.png',"*").'</li>'; 
								} 								
								if(($x+0.5) == $final_val) { $activestar = false;
								echo '<li>'.CHtml::image(Yii::app()->request->baseUrl.'/images/star_half.png',"*").'</li>';  
								} else if($x > ceil($final_val) ) { $activestar = false;
									echo '<li>'.CHtml::image(Yii::app()->request->baseUrl.'/images/star_null.png',"*").'</li>'; 
								} 
							}
							
						?>							
       
                                    </div>
		
                                </ul>
                            	
                                <div class="controler" id="slide1_controls">
                                	<span class="counter counter_mid">
                                    	<span><?php echo $final_val; ?></span>
                                    </span>
                                </div>
                            
                            </dd>
                        </dl>
                        
                        <dl>
                        	<dt>Stisfaction</dt>
                        	<dd>
                            	<ul class="rating_list">
                                	<div class="group">
				<?php
							
							$final_satisfaction = floor($ratings->satisfaction);							
							if($ratings->satisfaction == $final_satisfaction) {
							$final_val = $final_satisfaction;
							} else  {
							$final_val = ceil($ratings->satisfaction) - 0.5;
							} $activestar = true;							
							for ($x=1; $x<=5; $x++) {							
								if($x <= ceil($final_val) && $activestar) {
									echo '<li>'.CHtml::image(Yii::app()->request->baseUrl.'/images/star.png',"*").'</li>'; 
								} 								
								if(($x+0.5) == $final_val) { $activestar = false;
								echo '<li>'.CHtml::image(Yii::app()->request->baseUrl.'/images/star_half.png',"*").'</li>';  
								} else if($x > ceil($final_val) ) { $activestar = false;
									echo '<li>'.CHtml::image(Yii::app()->request->baseUrl.'/images/star_null.png',"*").'</li>'; 
								} 
							}
							
						?>		                    

                                    </div>
		
                                </ul>
                            	
                                <div class="controler" id="slide1_controls">
                                	<span class="counter counter_mid">
                                    	<span><?php echo $final_val; ?></span>
                                     </span>
                                </div>
                            
                            </dd>
                        </dl>
                        
                        
                        <dl class="overall">
                        	<dt>Overall Rating</dt>
                        	<dd>
                            	<ul class="rating_list">
                                	<div class="group">
       				<?php
							
							$final_overall = floor($ratings->overall);							
							if($ratings->overall == $final_overall) {
							$final_val = $final_overall;
							} else  {
							$final_val = ceil($ratings->overall) - 0.5;
							} $activestar = true;							
							for ($x=1; $x<=5; $x++) {							
								if($x <= ceil($final_val) && $activestar) {
									echo '<li>'.CHtml::image(Yii::app()->request->baseUrl.'/images/star.png',"*").'</li>'; 
								} 								
								if(($x+0.5) == $final_val) { $activestar = false;
								echo '<li>'.CHtml::image(Yii::app()->request->baseUrl.'/images/star_half.png',"*").'</li>';  
								} else if($x > ceil($final_val) ) { $activestar = false;
									echo '<li>'.CHtml::image(Yii::app()->request->baseUrl.'/images/star_null.png',"*").'</li>'; 
								} 
							}
							
						?>		

		
                                    </div>
		
                                </ul>
                            	
                                <div class="controler" id="slide1_controls">
                                	<span class="counter counter_mid">
                                    	<span><?php echo $final_val; ?></span>
                                    </span>
                                </div>
                            
                            </dd>
                        </dl>
                        
                    
                    </div>
                    
                    <?php } ?>
                    
                    <div class="col-lg-6 pull-right">
                    	<div class="experence_box">
                            	<h5>Customer Experience Comments</h5>
                                <div class="explain_experience">
                                	<div class="customer_exp_comments scrollbar">
                                    	<ul>
                                        <?php if(count($comments)>0){
											foreach($comments as $comments){?>
											
                                        	<li>
                                            	<h4><?php echo $comments->full_name; ?></h4>
                                                <div class="customers_ratings">
                                                	<div class="pull-left">
      						<?php
							
							$final_overall = floor($comments->overall);							
							if($comments->overall == $final_overall) {
							$final_val = $final_overall;
							} else  {
							$final_val = ceil($comments->overall) - 0.5;
							} $activestar = true;							
							for ($x=1; $x<=5; $x++) {							
								if($x <= ceil($final_val) && $activestar) {
									echo CHtml::image(Yii::app()->request->baseUrl.'/images/star.png',"*"); 
								} 								
								if(($x+0.5) == $final_val) { $activestar = false;
								echo CHtml::image(Yii::app()->request->baseUrl.'/images/star_half.png',"*");  
								} else if($x > ceil($final_val) ) { $activestar = false;
									echo CHtml::image(Yii::app()->request->baseUrl.'/images/star_null.png',"*"); 
								} 
							}
							
						?>		                      
                                                    </div>
                                                	
                                                    <em><?php echo  Yii::app()->dateFormatter->format("M-d-y",strtotime($comments->date_requested));?></em>
                                                </div>
                                                
                                                <div class="customer_comments">
                                               		 <?php echo $comments->comments; ?>
                                                <span>...</span>
                                                </div>
                                                
                                            </li>
											<?php }
										}else{ ?>
										<li>
                                         <span> < No Comment Given > </span>
                                        </li>
										
										<?php }?> 
                                        
                                        </ul>
                                    </div>
                                
                                </div>
                       </div>
                    
                    </div>
                <div class="clear">&nbsp;</div>
                
                
                </section>
           
             
             <!-- Button trigger modal -->
             <script type="text/ecmascript">
	$(document).ready(function(){
	$(function() {
		$('.scrollbar').scrollbars();
	});	
		
	});
</script>
        
                
          