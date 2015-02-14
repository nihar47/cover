	<div id="container" style="padding: 25px 0px;">
<div class="wrap930">	


<?php echo $this->load->view('faq_sidebar'); ?>	


<div class="faq_list_div">


        	<h3 class="faq_heading_title"><?php echo $guidelines->guidelines_title; ?></h3>
			
			<div>
			<?php $content=$guidelines->guidelines_content;
				$content=str_replace('KSYDOU','"',$content);
				$content=str_replace('KSYSING',"'",$content); 
				
				echo $content; ?>
			</div>				
 <div class="clear"></div> 
		  </div>
		  
            
      
		<div class="clear"></div>