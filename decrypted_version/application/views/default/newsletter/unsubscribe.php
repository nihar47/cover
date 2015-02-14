  	<div id="container">
<div class="wrap930">	
  
       
		
<div class="con_left2">
 
 
 <?php if($error=='not_found') { ?>
 
  <h2><?php echo ERROR_SUBSCRIPTION; ?></h2>
    
	<div><?php echo sprintf(USER_EMAIL_OR_SUBSCRIPTION_NOT_FOUND,$subscribe_email); ?> </div>
	
 
 <?php }   if($error=='successfull') { ?>
 
 
 	 <h2><?php echo SUCCESSFULL_UNSUBSCRIBE; ?></h2>
    
	<div><?php echo sprintf(UNSUBSCRIBE_OUR_NEWS_LETTER,$subscribe_email); ?></div>
	
	
	
 
 <?php } ?>
 
 
 
  
	
	
	
	</div>
	
		