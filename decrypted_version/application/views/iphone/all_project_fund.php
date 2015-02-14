<script type="text/javascript" language="javascript">
	function toggle(x){
		if(x.className == 'light1'){
			x.className = 'lightact1';
		}
		else {
			x.className = 'light1';
		}	
	}
	function toggle1(x){
		if(x.className == 'light'){
			x.className = 'lightact';
		}
		else {
			x.className = 'light';
		}	
	}
</script>
<div data-role="header" data-position="inline">
	<h1><?php echo INCOMING_FUND;?></h1>
	<?php echo anchor('home','Home','class="ui-btn-right"'); ?>
</div>
<div class="pad15">

	 <?php if($result){        ?>
			 
			
			
			  <div id="recent-donate-detail">
               
                <table border="0" cellpadding="1" cellspacing="1" align="center" width="100%" >
				
				<tr>				
				<th><?php echo PROJECT_IMAGE;?></th>				
                  <th><?php echo PROJECT_TITLE;?></th>	
				  <th><?php echo PROJECT_END_DATE;?></th>	
                  <th><?php echo AMOUNT; ?><br/>(<?php echo $site_setting['currency_symbol'];?>)</th>	
				 
				</tr>
				   
				  <?php
				  	$i = 0;
					if($result)
					{
					  // echo "<pre>";
					 //  print_r($result);
					 //  exit;
						foreach($result as $row)
						{
							if($i%2 == '0')
							{
								$str = "class='light1' ";
							}else{
								$str = "class='light' ";
							}
				  ?>
                  
				  <tr <?php echo $str; ?>>
                    <td class="donate_td" align="center" valign="top"><?php if($row->image !="" && is_file('upload/thumb/'.$row->image))
					{?>
                       <img src="<?php echo base_url().'upload/thumb/'.$row->image; ?>" width="100" height="100">
                   <?php }
				   else  {?>
                               <img src="<?php echo base_url().'upload/thumb/no_img.jpg'?>" width="100" height="100">
                   <?php }?>
                   </td>
                   <td  class="donate_td" align="center" valign="top">
				   
                   
                   <?php 
				   $title =	substr(ucfirst($row->project_title),0,15);
				   echo anchor('projects/'.$row->project_title.'/'.$row->project_id,$title); ?>
                   </td>
				   
				   <td class="donate_td" align="center" valign="top" width="20%"><?php  echo date($site_setting['date_format'],strtotime($row->end_date)); ?></td>
                   <td  class="donate_td" align="center" valign="top"><?php echo set_currency($row->amount);?></td>
				   
                   </tr>
                <tr></tr>
				  <?php			
							$i++;
						}
					}
				  ?>
                </table>
         
              </div>
			  
			  	 <div class="clear"></div>
			 
			     <div align="center"  style="line-height:20px;  font-size:11px;"><br/><?php echo $page_link; ?></div>
				 
				 	 <div class="clear"></div>
					 
		
		
		
			<?php } else { ?>
			
			
			<div class="clear"></div>
			
			<div align="center"><?php echo 'No Record Found'; ?>.</div>
			
			<div class="clear"></div>
			
			<?php } ?>	
</div>