
	<?php  	
	$off = $offset + $limit;
	if($member_list)
				{
					foreach($member_list as $meb)
					{
						
			  ?>
			 
		  <div class="member_main" id="<?php echo $meb->user_id.'_'.$off; ?>">
			
					
                    
                   
<div class="member_name"><?php echo anchor('member/'.$meb->user_id,$meb->user_name.' '.$meb->last_name,'style="text-decoration:none;"'); ?></div>
					
					<div class="clear"></div>
					
						
                        
                        <div class="member_img">
						<?php 
					 
					  
					 
					 if(is_file("upload/thumb/".$meb->image)){ 
					 
					 
					 echo anchor('member/'.$meb->user_id,'<img class="p_img" src="'.base_url().'upload/thumb/'.$meb->image.'" alt="" width="150" height="150" title="'.ucfirst($meb->user_name.' '.$meb->last_name).'" />'); 	
					 
					 }else{ 
				  
							  
						echo anchor('member/'.$meb->user_id,'<img class="p_img" src="'.base_url().'upload/thumb/no_man.gif" alt="" width="150" height="150" title="'.ucfirst($meb->user_name.' '.$meb->last_name).'" />'); 	
												
				   
					} ?>
						</div>
					
				
                
                	
                                      
          <div class="member_city"><?php if($meb->city) { echo $meb->city.','; } if($meb->state) { echo $meb->state.','; } if($meb->country) { echo $meb->country; }  ?></div>
                   
					
                    
                    
                    
                    
         <div class="member_feature"><?php echo PROJECT;?>&nbsp;<span><?php echo $this->user_model->count_user_project($meb->user_id); ?></span>&nbsp;&nbsp;&nbsp;<?php echo RAISED;?>&nbsp;<span><?php $rec_don = $this->user_model->user_total_received_donation($meb->user_id); echo set_currency($rec_don); ?></span></div>
                    
					
			
                <div class="clear"></div>
                
             
		</div>
        
      
        
	
	<?php } }
			else{
		?>	
		<p>
              <h3><?php echo NO_RESULT_FOUND; ?></h3>
            </p>
		<?php } ?>
        
        
	
	<div class="clear"></div>
<div align="center" class="pg_img">
	<br>
	
</div>
