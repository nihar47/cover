 <?php
		  	if($result)
			{
		?>
		<h1>
		  
          <span><?php echo ucfirst($result['pages_title']); ?></span>
		</h1>
        <div>
          <?php echo $result['description']; ?>
        </div>
		<?php
			}else{
		?>
		<h1>
		  
          <span>&nbsp;</span>
		</h1>
        <div>
         
              <h3><?php echo NO_RESULT_FOUND; ?></h3>
           
        </div>
		<?php
			}
		?>		
       