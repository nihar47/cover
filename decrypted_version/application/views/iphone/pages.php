<!--<div id="widgetm"></div>-->
<!--<script src="http://localhost/fundmeonline/project/embed_code/narrow/4" type="text/javascript" language="javascript"></script>-->
<!--<script src='http://localhost/fundmeonline/project/widgets_code/m/yellow/10' type='text/javascript'></script>-->
 <!--====================left==============--> 

  	<div id="container">
<div class="wrap930">	
  
        <?php
		
		  	if($result)
			{
		?>
		
<div class="con_left2">
   <h2><?php echo ucfirst($result['pages_title']); ?></h2>
    
	<?php echo str_replace("&gt;",">",str_replace("&lt;","<",$result['description'])); ?>
	</div>
	<?php
			}else{
		?>
	
		<div class="con_left">
    
	<p><?php echo NO_RESULT_FOUND; ?></p>
	</div>
	<?php } ?>
	
   
  <!--====================left end==============--> 
  
  