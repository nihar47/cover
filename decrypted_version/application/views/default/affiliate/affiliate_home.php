 <!--====================left==============--> 

  	<div id="container">
		<div class="wrap930">	
  
        <?php if($affiliate_setting){ ?>
		
		<div class="con_left2">
            <h2><?php echo AFFILIATE; ?></h2>
        
            <?php 			
				$affiliate_content=$affiliate_setting->affiliate_content;			
				
				$affiliate_content=str_replace('KSYDOU','"',$affiliate_content);
				$affiliate_content=str_replace('KSYSING',"'",$affiliate_content); 
				
				echo $affiliate_content;
			 ?>
		</div>
		
		<?php } ?>
	
   
  <!--====================left end==============--> 
