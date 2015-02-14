<div class="rightcol">
	<?php
	if($donation)
	{	?>
    <ul class="quicklinks">
    <h2>Donations</h2>
	  	<?php
				
					foreach($donation as $dn)
					{
						$temp_time = explode(" ",$dn->transaction_date_time);
					
					
					
					
			?>
	      
	  	<li> 
		 <p class="donate_p">
		 
		 
		<span id="dollor_amount"> <?php echo set_currency($dn->amount); ?></span>
		 
		 
		 <?php if($dn->user_id=='' || $dn->user_id=='0' || $dn->user_id==0) {  echo anchor('projects/'.$dn->url_project_title.'/'.$dn->project_id,FROM.'&nbsp;<span>'.$dn->name.'&nbsp;</span>'. TO.'&nbsp;<strong>'.$dn->project_title.'</strong>','style="color:#000000;"');
		 
		 
		 
							}
			
							else
							{
							
							$user_detail=get_user_detail($dn->user_id);
							
							echo anchor('projects/'.$dn->url_project_title.'/'.$dn->project_id,FROM.'&nbsp;<span>'.$user_detail['user_name'].' '.$user_detail['last_name'].'&nbsp;</span>'. TO.'&nbsp;<strong>'.$dn->project_title.'</strong>','style="color:#000000;"');
							
							}
		 
		 
		  ?>
        	
			<br /><small><?php echo date($site_setting['date_format'],strtotime($temp_time[0])); ?></small></p>
         	
         <div class="clear"></div>
		 
		 
		 
		 
		 
			</li>
	  
		
		<?php		} ?>
        		</ul>
			<?php	} ?>

</div>