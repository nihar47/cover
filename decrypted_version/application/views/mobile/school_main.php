  	<div id="container" style="padding: 25px 0px;">
<div class="wrap930">	


			 <div class="center">


<p style="text-align:center;"><img src="<?php echo base_url(); ?>images/school_logo.jpg" alt="#" /></p>
      
	  
	  
	    <table border="0" cellpadding="0" cellspacing="0" align="center" class="school">
        	
				<?php 
								
					if($school_title_list) {  
					$i=1;
					 foreach($school_title_list as $school) { 			
					 
					 ?>
						
			<tr>
        		<td style="width:170px;text-align:right"><?php echo NO;?>. <?php echo $i; ?></td>
              <td style="width:415px;text-align:left"><?php echo anchor('help/school/'.$school->school_url_title,$school->title,' class="school_main_href"'); ?></td>
               
            </tr>	
								
								                             
                           
						   <?php $i++; }  } else {  ?>	
							
                        <tr><td align="center" valign="middle" colspan="2"><?php echo NO_SCHOOL_HAS_BEEN_ADDED_YET;?></td></tr>
						
						
						<?php }  ?>
                       
					   
			
            
        </table>
        
		
		
		
		
        <div class="school_bottom">
        	<p><b>OTHER HELP CONTENT</b></p>
            <p><?php echo anchor('help',HELP_CENTER); ?></p>
            <p><?php echo anchor('help',FAQ);?></p>
            <p><?php echo anchor('help/guidelines',GUIDELINES); ?></p>
        </div>
   
     
            
        </div>
	