<?php

$off = $offset + $limit;
$rs->amount = str_replace($site_setting['currency_symbol'], "", $rs->amount);
						if($rs->amount == '0' or $rs->amount == '')
						{
						$w = 0;
						}else{
							if($rs->amount_get>=$rs->amount)
							{
								$w=100;
							}
							else
							{
								$w = ($rs->amount_get/$rs->amount)*100;
								
								if($w>0 && $w<1)
								{
									$w=1;
								}
								
								
			}
	}
?>

<div class="slider_div" id="<?php echo $rs->project_id.'_'.$off; ?>">
	<h3 ><?php 
					/*$str_name=$rs->project_title;
					if(strlen($str_name)<25)$lenght=strlen($str_name);
					else $lenght=25;
					//echo "<br>".$lenght;
					
					$pos = strpos($str_name, ' ', $lenght);
					if ($pos !== false) {
						$str_name= substr($str_name, 0, $pos);
					}*/
	$str_name = substr(ucfirst($rs->project_title),0,20);
	//$str_name = wordwrap(substr(strip_tags($rs->project_title),0,20),20, "\n",true); 
	echo anchor('projects/'.$rs->url_project_title.'/'.$rs->project_id,$str_name,'style="text-decoration:none;"'); ?></h3>
	<div>
			<?php if(is_file("upload/thumb/".$rs->image)){ 
	  
	   echo anchor('projects/'.$rs->url_project_title.'/'.$rs->project_id,'<img class="p_img" src="'.base_url().'upload/thumb/'.$rs->image.'" alt="" width="190" height="150" title="'.ucfirst($rs->project_title).'" />'); 		  
	  
	 
	  } else{ 
	  
	
	 
	 
	 
	 
	 
	 
	 $get_gallery=$this->project_model->get_all_project_gallery($rs->project_id);
							
							$grcnt=1;
							
							if($get_gallery)
							{
								foreach($get_gallery as $glr)
								{
								
									if($glr->project_image!='' && is_file('upload/thumb/'.$glr->project_image) && $grcnt==1 )
									{
															
									echo anchor('projects/'.$rs->url_project_title.'/'.$rs->project_id,'<img class="p_img" src="'.base_url().'upload/thumb/'.$glr->project_image.'" width="190" height="150" title="'.ucfirst($rs->project_title).'" />');
									 
									 
										$grcnt=2;
									}
								
								}
							}
							elseif($grcnt==1)
							{							
								 echo anchor('projects/'.$rs->url_project_title.'/'.$rs->project_id,'<img class="p_img" src="'.base_url().'images/no_img.jpg" width="190" height="150" title="'.ucfirst($rs->project_title).'" />');
							}
							else
							{
							 echo anchor('projects/'.$rs->url_project_title.'/'.$rs->project_id,'<img class="p_img" src="'.base_url().'images/no_img.jpg" width="190" height="150" title="'.ucfirst($rs->project_title).'" />');
							}
	 
	 
	 
	 
	 
	  }?>
	 </div>
	 
	 <?php  $user = get_user_detail($rs->user_id); ?>
	 	<div style="margin:3px 15px 0px 15px;">
							<small style=" text-align:left; font-style:normal; color:#7DBF0E; font-weight:normal; font-size:12px;"><span style="color:#000000; "><?php echo BY; ?> :</span> <?php echo anchor('member/'.$rs->user_id,$user['user_name']); ?></small>		
		
		</div>
	 
	 
	 
	 
	 <p style="text-align:left; font-size:13px; color:#A0A0A0;">
                    <?php if($rs->project_summary!='') { 
					//echo wordwrap(substr(strip_tags($rs->project_summary),0,95),26, "\n",true); 
					
					
					$str_name=$rs->project_summary;
					if(strlen($str_name)<70)$lenght=strlen($str_name);
					else $lenght=70;
					//echo "<br>".$lenght;
					
					$pos = strpos($str_name, ' ', $lenght);
					if ($pos !== false) {
						$str_name= substr($str_name, 0, $pos);
					}
					echo $str_name;


					 } ?>
			 
			</p>
			
			
		<div id="flag_div">
						
						<div id="flagsr" style="float:left;"><img src="<?php echo base_url(); ?>images2/flag.png" border="0" /></div>
						<div id="flag_detailsr"><small style="text-align:left; font-style:italic; color:#999999; font-weight:normal;"><span style="text-transform:capitalize;"><?php	if($rs->project_city=='' and $rs->project_country==''){  echo 'N/A';  } else { if($rs->project_city==''){ echo 'N/A'; } else{ echo $rs->project_city; } ?></span>,<span style="text-transform:capitalize;"><?php if($rs->project_country==''){ echo 'N/A'; } else{ echo $rs->project_country;  } } ?></span></small>&nbsp;</div>
						
						</div>
			
			
			
			
			 <div class="progress"><div class="progreen" style="width:<?php echo $w; ?>%;max-width:100%;"></div></div>
            <p class="stats">
			<?php if($w=='0') { ?>
					
					
					<span class="stleft"><?php echo set_currency('0'); ?>  <br /><span class="spanf"><?php echo RAISED; ?></span></span>
				
				
				<?php } else { ?>
				<span class="stleft">
				<?php if($rs->amount_get=='')	{
						echo set_currency('0')." <br /><span class='spanf'>".RAISED."</span>";
				
				}else{
								
				echo set_currency($rs->amount_get)." <br /><span class='spanf'>".RAISED."</span>"; 
				
				}	}?>	
			
			</span>
			
			<span class="stright">
			 <?php
				/*$date1 = $rs->end_date;
				$date2 = date("Y-m-d");
				$diff = abs(strtotime($date2) - strtotime($date1));
				$test = floor($diff / (60*60*24));
				echo ($rs->end_date!="0000-00-00")?$test." ".DAYS_LEFT:"0 ".DAYS_LEFT;*/
				echo $this->project_model->get_days_left($rs->end_date);	
			?>
			</span>
			
			
			</p>
                </div>
 
 
 
                
                