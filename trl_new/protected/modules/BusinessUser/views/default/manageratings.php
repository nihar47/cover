            	<div class="requests text-center container">
                		<span class="blue">HI <?php echo $this->business_Info->owner_name ; ?>!</span> You are signed in to manage this listing
                </div>
                
             <section class="table_wrapper manage_rating_table">
             	<div class="container">
    	            <div class="table-responsive">
                    		<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table">
                    	<thead>
	        	          	<tr>
                                <th width="16%">Date Posted</th>
                                <th width="12%">Customer Info</th>
                                <th width="20%">Rating Info</th>
                                <th width="31%">Customer Experience Comments</th>
                                <th width="10%">Comment Status</th>
                                <th width="10%">Notes</th>
    		              </tr>  
	                    </thead>
                         <?php if(count($customers) > 0) {
						$current_date = date("Y-m-d");// current date
		foreach($customers as $key => $requests){
		$dateDiff = $this->dateDiff($current_date,$requests->ediable_date);
		?>
                        
                  <tr>
                    <td>
                    	<span><?php echo  Yii::app()->dateFormatter->format("M-d-y",strtotime($requests->date_posted));?></span>
                        
                        <p>(This rating is ediable br the<?php if($dateDiff>0){ ?><br/><span class="blue">customer for <?php echo $dateDiff; ?> more days</span><?php } ?> )</p>
                        
                        <a href="javascript:;" onclick="editrating(<?php echo $requests->user_id; ?>)" class="custom_link">Send customer link<br/>to edit rating</a>
                    </td>
                    <td>
                    	<span><?php echo $requests->full_name; ?></span>
                        <p><?php echo $requests->email_address; ?></p>
                    </td>
                    <td class="text-normal pad0">
                    	<dl>
                        	<dt>Qulity</dt>
                            <dd>
                  
				  
				  		<?php
							
							$final_qulity = floor($requests->qulity);							
							if($requests->qulity == $final_qulity) {
							$final_val = $final_qulity;
							} else  {
							$final_val = ceil($requests->qulity) - 0.5;
							} $activestar = true;							
							for ($x=1; $x<=5; $x++) {							
								if($x <= ceil($final_val) && $activestar) {
									echo CHtml::image(Yii::app()->request->baseUrl.'/images/icon/star.png',"logo"); 
								} 								
								if(($x+0.5) == $final_val) { $activestar = false;
								echo CHtml::image(Yii::app()->request->baseUrl.'/images/icon/star_half.png',"logo"); 
								} else if($x > ceil($final_val) ) { $activestar = false;
									echo CHtml::image(Yii::app()->request->baseUrl.'/images/icon/star_null.png',"logo"); 
								} 
							}
							
						?>
				  

						
						       
                            </dd>
                        </dl>
                        
                        <dl>
                        	<dt>Value</dt>
                            <dd>
							
							
						<?php
							
							$final_value = floor($requests->value);							
							if($requests->value == $final_value) {
							$final_val = $final_value;
							} else  {
							$final_val = ceil($requests->value) - 0.5;
							} $activestar = true;							
							for ($x=1; $x<=5; $x++) {							
								if($x <= ceil($final_val) && $activestar) {
									echo CHtml::image(Yii::app()->request->baseUrl.'/images/icon/star.png',"logo"); 
								} 								
								if(($x+0.5) == $final_val) { $activestar = false;
								echo CHtml::image(Yii::app()->request->baseUrl.'/images/icon/star_half.png',"logo"); 
								} else if($x > ceil($final_val) ) { $activestar = false;
									echo CHtml::image(Yii::app()->request->baseUrl.'/images/icon/star_null.png',"logo"); 
								} 
							}
							
						?>
						
			
                            </dd>
                        </dl>
                        
                        <dl>
                        	<dt>Timeliness</dt>
                            <dd>
                            	 
								 
					<?php
							
							$final_timeliness = floor($requests->timeliness);							
							if($requests->timeliness == $final_timeliness) {
							$final_val = $final_timeliness;
							} else  {
							$final_val = ceil($requests->timeliness) - 0.5;
							} $activestar = true;							
							for ($x=1; $x<=5; $x++) {							
								if($x <= ceil($final_val) && $activestar) {
									echo CHtml::image(Yii::app()->request->baseUrl.'/images/icon/star.png',"logo"); 
								} 								
								if(($x+0.5) == $final_val) { $activestar = false;
								echo CHtml::image(Yii::app()->request->baseUrl.'/images/icon/star_half.png',"logo"); 
								} else if($x > ceil($final_val) ) { $activestar = false;
									echo CHtml::image(Yii::app()->request->baseUrl.'/images/icon/star_null.png',"logo"); 
								} 
							}
							
						?>				
								 
								 
			
                            </dd>
                        </dl>
                        
                        <dl>
                        	<dt>Experience</dt>
                            <dd>
                            


			<?php
							
							$final_experience = floor($requests->experience);							
							if($requests->experience == $final_experience) {
							$final_val = $final_experience;
							} else  {
							$final_val = ceil($requests->experience) - 0.5;
							} $activestar = true;							
							for ($x=1; $x<=5; $x++) {							
								if($x <= ceil($final_val) && $activestar) {
									echo CHtml::image(Yii::app()->request->baseUrl.'/images/icon/star.png',"logo"); 
								} 								
								if(($x+0.5) == $final_val) { $activestar = false;
								echo CHtml::image(Yii::app()->request->baseUrl.'/images/icon/star_half.png',"logo"); 
								} else if($x > ceil($final_val) ) { $activestar = false;
									echo CHtml::image(Yii::app()->request->baseUrl.'/images/icon/star_null.png',"logo"); 
								} 
							}
							
						?>		




                            </dd>
                        </dl>
                        
                        <dl>
                        	<dt>Satisfaction</dt>
                            <dd>
        			<?php
							
							$final_satisfaction = floor($requests->satisfaction);							
							if($requests->satisfaction == $final_satisfaction) {
							$final_val = $final_satisfaction;
							} else  {
							$final_val = ceil($requests->satisfaction) - 0.5;
							} $activestar = true;							
							for ($x=1; $x<=5; $x++) {							
								if($x <= ceil($final_val) && $activestar) {
									echo CHtml::image(Yii::app()->request->baseUrl.'/images/icon/star.png',"logo"); 
								} 								
								if(($x+0.5) == $final_val) { $activestar = false;
								echo CHtml::image(Yii::app()->request->baseUrl.'/images/icon/star_half.png',"logo"); 
								} else if($x > ceil($final_val) ) { $activestar = false;
									echo CHtml::image(Yii::app()->request->baseUrl.'/images/icon/star_null.png',"logo"); 
								} 
							}
							
						?>		

                            </dd>
                        </dl>
                        
                        <dl class="overall">
                        	<dt>Overall</dt>
                            <dd>
                      			<?php
							
							$final_overall = floor($requests->overall);							
							if($requests->overall == $final_overall) {
							$final_val = $final_overall;
							} else  {
							$final_val = ceil($requests->overall) - 0.5;
							} $activestar = true;							
							for ($x=1; $x<=5; $x++) {							
								if($x <= ceil($final_val) && $activestar) {
									echo CHtml::image(Yii::app()->request->baseUrl.'/images/icon/star.png',"logo"); 
								} 								
								if(($x+0.5) == $final_val) { $activestar = false;
								echo CHtml::image(Yii::app()->request->baseUrl.'/images/icon/star_half.png',"logo"); 
								} else if($x > ceil($final_val) ) { $activestar = false;
									echo CHtml::image(Yii::app()->request->baseUrl.'/images/icon/star_null.png',"logo"); 
								} 
							}
							
						?>	

		
                            </dd>
                        </dl>
                     </td>
                    <td class="text-left comments">
                    	<div id="comments">
                        <?php if($requests->comments !=''){ ?>
                        <span class="comment_title"><?php echo $requests->full_name; ?></span>
                    	<p><?php echo $requests->comments; ?></p>
                        <?php }else{ ?>
                        <span> < No Comment Given > </span>
                        <?php } ?>
                        </div>
                    </td>
                    <td class="comments_status">
                    <?php if($requests->comments !=''){ ?>
                    <?php if($requests->comment_status){?>
                    <input type="button" onclick="commentStatus(<?php echo $requests->user_id; ?>);" id="<?php echo $requests->user_id; ?>" value="hide" class="btn btn_gray" />
                    <?php }else{ ?>
                    <input type="button" onclick="commentStatus(<?php echo $requests->user_id; ?>);"  id="<?php echo $requests->user_id; ?>" value="show" class="btn btn_skyblue" />
                    <?php }}else{ ?>
                    <span>NA</span>
                    <?php } ?>
                    </td>
                    <td id="notes">
                    	<div class="notes">
                        	<?php echo $requests->notes; ?>
                        </div>
                    </td>
                  </tr>
                  
                  <?php } }else{ ?>
       
        <tr>
          <td colspan="6" align="left"> <span>No Result</span></td>
          
        </tr>
       <?php } ?>
                  
                	<tr>
                    	<td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    
                    </tr>
                 
                </table>
                	</div>
	             </div>
             </section>   
             
             <!-- Button trigger modal -->
        
            
            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Send A Rating Request To :</h4>
                  </div>
                  <div class="modal-body">
                   
                     <form role="form"  class="request_form" >
                            <div class="form-group ">
                               <input type="text" class="form-control" value="Name" onFocus="this.value=(this. value=='Name') ? '' : this.value;" onBlur="this.value=	(this.value=='') ? 'Name' : this.value;">
                            </div>
                            <div class="form-group ">
                            
                             <input type="text" class="form-control" value="Email" onFocus="this.value=(this. value=='Email') ? '' : this.value;" onBlur="this.value=	(this.value=='') ? 'Email' : this.value;">
                            </div>
                             <div class="form-group text-center">
                              <input type="button" class="btn btn_skyblue" value="Send Request" >
                            </div>
                            
                        </form>
                   
                  </div>
                  
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

<script type="text/ecmascript">



	$(document).ready(function(){
	$(function() {
		$('.notes, #comments').scrollbars();
	});
	
	});
	
	function editrating(id) {
 var contentPanelId = id;
  if (confirm("Are you sure you want to send reminder this request?")) {
					// your reminder code
					  $.ajax(
					{
						url : '<?php echo Yii::app()->createAbsoluteUrl("BusinessUser").'/'.Yii::app()->getController()->getAction()->controller->id.'/editrating&code='.$this->code; ?>',
						type: "POST",
						data : "id="+contentPanelId,
						success:function(data, textStatus, jqXHR)
						{	
							alert('congratulations. you have successfully sent an edit rating mail.');
							
						},
						error: function(jqXHR, textStatus, errorThrown)
						{
							alert('error')
						}
					});
					
					
				}
				return false;
 
		
}
	
	
	function commentStatus(user_id) {
	
		var contentPanelId = jQuery('#'+user_id).attr('class');	
		if(contentPanelId=='btn btn_skyblue'){
			   $.ajax({
						 
						  		url : '<?php echo Yii::app()->createAbsoluteUrl("BusinessUser").'/'.Yii::app()->getController()->getAction()->controller->id.'/show&code='.$this->code; ?>',
						
						  
						  type: "POST",
						  data : "id="+user_id,
						  success:function(data, textStatus, jqXHR){
						  		$('#'+user_id).val('Hide');
								$('#'+user_id).removeClass('btn btn_skyblue').addClass('btn btn_gray');
								},
						  error: function(jqXHR, textStatus, errorThrown)
								{}
					});
		}else{
			  $.ajax(
							{
								url : '<?php echo Yii::app()->createAbsoluteUrl("BusinessUser").'/'.Yii::app()->getController()->getAction()->controller->id.'/hide&code='.$this->code; ?>',
							
							type: "POST",
							data : "id="+user_id,
							success:function(data, textStatus, jqXHR){
										$('#'+user_id).val('Show');
									$('#'+user_id).removeClass('btn btn_gray').addClass('btn btn_skyblue');
							},
							error: function(jqXHR, textStatus, errorThrown)
								{}
					});
		
		}
	}
	
	

</script>

