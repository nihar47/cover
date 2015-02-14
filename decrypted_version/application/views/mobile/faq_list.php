	<div id="container" style="padding: 25px 0px;">
<div class="wrap930">	


<?php echo $this->load->view('faq_sidebar'); ?>	


<div class="faq_list_div">


        	<h3><?php echo $selected_faq_category->faq_category_name; ?></h3>
			
			
			<div>
			
                        
			
			<?php if($selected_faq_sub_category) {  
					
					 foreach($selected_faq_sub_category as $sub) { ?>
						         
                                <p class="head"><?php echo $sub->faq_category_name; ?></p>  
								
								
					<?php $faq_question=$this->help_model->get_category_question($sub->faq_category_id);
			
					if($faq_question) {  
					
					 foreach($faq_question as $ques) { 
					 
					 
					  $faq_div_title=str_replace("'","",str_replace(array(',','+','"','%','!','@','#','$','^','&','*','(',')',';','?','<','>','/',':','`','~','-','.','..','...'),'',str_replace(' ','',$ques->question)));
					  
					 
					 ?>
								
								
					<p><?php echo anchor('help/faq/'.$selected_faq_category->faq_category_url_name.'#'.$faq_div_title,$ques->question); ?></p>		
								
								                             
                           
						   <?php } ?>
						   
						     <br />
						
						<?php } else {  ?>	
							
                        <p><?php echo NO_FAQ_CATEGORY;?></p>
						
						
						<?php }      } } else { ?> <p><?php echo NO_CATEGORY;?>.</p> <?php } ?>
                       
                   
			
			</div>
			
			
			
			 <div style="border-top:3px solid #bebebe;width:665px;height:3px;margin:25px 0px;"></div>
			 
			
			
			
			<div>
			
			
			<?php if($selected_faq_sub_category) {  
					
					 foreach($selected_faq_sub_category as $sub) { ?>
						         
                                 <h3 style="font-size:18px;text-transform:capitalize;" id="<?php echo $sub->faq_category_url_name; ?>">
								 <?php echo $sub->faq_category_name; ?> <a href="#"><img src="<?php echo base_url(); ?>images/top_arr.jpg" alt=""  style="float:right;position:relative;top:5px;"/></a></h3>
								 
								 <div class="clear"></div>
			
			
			
			
			<?php $faq_question=$this->help_model->get_category_question($sub->faq_category_id);
			
					if($faq_question) {  
					
					 foreach($faq_question as $ques) { 
					 
					 
					  $faq_div_title=str_replace("'","",str_replace(array(',','+','"','%','!','@','#','$','^','&','*','(',')',';','?','<','>','/',':','`','~','-','.','..','...'),'',str_replace(' ','',$ques->question)));
					  
					 
					 ?>
					
			 <p class="eighteen" id="<?php echo $faq_div_title; ?>"><?php echo $ques->question; ?></p>
			
			
			
		
			<p><?php echo $ques->answer; ?></p>
		<div style="border-top:1px solid #838080;width:665px;height:1px;margin:25px 0px;"></div>
			
			
			<?php } } else { ?>
			
			<p><?php echo NO_QUESTION_FOR_THIS_CATEGORY;?> </p>
			
			<?php } 
			
			 } ?>
						   
						    
						
			<?php } else {  ?>	
				
			<p><?php echo NO_QUESTION_FOR_THIS_CATEGORY;?> </p>
			
			
			<?php }   ?>
			
		
			
			
			</div>				
				
  
            
        <div class="clear"></div> 
		  </div>
		  
            
      
		<div class="clear"></div>