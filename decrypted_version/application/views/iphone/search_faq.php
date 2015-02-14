	<div id="container" style="padding: 25px 0px;">
<div class="wrap930">	


<?php echo $this->load->view('faq_sidebar'); ?>	


<div class="faq_list_div">


        	<h3 class="faq_heading_title"><?php echo RESULT_SEARCH;?><?php echo $search_keyword; ?>&quot;</h3>
    
            
          
		  
		  
		  
		  	<?php if($search_faq) { 
			
					foreach($search_faq as $sfaq) { ?>
		  
		  
		    <div style="border-top:1px solid #bebebe;width:665px;height:1px;margin:14px 0px;"></div>        
            
        
		   <p class="eighteen" style="text-transform:capitalize;"><?php echo $sfaq->question; ?><br />
<span style="font-size:12px; font-weight:normal;">in <?php
			
			$get_parent_name=$this->help_model->get_parent_category_detail($sfaq->faq_category_id);	
			
			 echo anchor('help/faq/'.$get_parent_name->faq_category_url_name.'#'.$sfaq->faq_category_url_name,$get_parent_name->faq_category_name);
			 
			 ?>&nbsp;/&nbsp;<?php echo anchor('help/faq/'.$get_parent_name->faq_category_url_name.'#'.$sfaq->faq_category_url_name,$sfaq->faq_category_url_name); ?>
			 </span>
			 </p>
			 
			 
            <p><?php echo $sfaq->answer; ?></p>



              <?php } } else { ?>
			
			<div><?php echo NO_RESULT_FOUND_FOR_THIS_SEARCH;?></div>
			
			<?php } ?>
          
		 <div class="clear"></div> 
		  </div>
		  
            
      
		<div class="clear"></div>
	
