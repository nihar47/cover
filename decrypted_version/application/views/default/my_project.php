<div id="headerbar">
	<div class="wrap930">
	
	<!-- dd menu -->	
<div class="login_navl">
		 
			
			
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tr><td align="left" >	
	<div class="project_title_hd" style="padding-top:15px;" >
	
	
	<span style="text-transform:capitalize;color:#2B5F94;font-size:17px;"><?php echo MY_PROJECTS; ?></span>
	
	</div>
	</td>
	</tr></table>

		  </div> 
		      
		<div class="clear"></div>
	</div>
</div>


<div id="container">
<div class="wrap930" style="padding:15px 0px 20px 0px;">
<script type="text/javascript">
var gmts=0;

jQuery(document).ready(function(){
	
		////===scrollin data fetch part
		
		function last_msg_funtion() 
		{ 
		  var ID=$(".slider_div:last").attr("id");	
		   var myArray = ID.split('_'); 
		   gmts=1;
		
			$.post("<?php echo site_url('user/my_project_ajax/');?>" + '/'+myArray[1],	
				function(data){
					//alert(data)
					if (data != "") {
					
						if(gmts==1) { 
							$(".slider_div:last").after(data);		
							
							gmts=0;
						}
					}
					else{
						$('#last_msg_loader').html('');
					}
					//$('div#last_msg_loader').empty();
				}
			);
		}; 
		
		jQuery(window).scroll(function(){
			var ID=$(".slider_div:last").attr("id");	
			var myArray = ID.split('_'); 
			var limit = '<?php echo $total_rows; ?>';
			if(parseFloat(myArray[1]) >= parseFloat(limit)){	$('#last_msg_loader').html(''); }
			else{
			
				if($(window).scrollTop() == $(document).height() - $(window).height()){	 
					$('#last_msg_loader').html('<div class="clear"></div><h3 class="discover" style="text-align:center;"><img src="<?php echo base_url();?>images/indicator.gif"></h3>');			  
					 setTimeout(function() { last_msg_funtion(); }, 2000);
	
					 
				}	
			}	
				
		}); 
			
	});
	

</script>	
<div id="ajaxdiv">
<?php  
$off = $offset + $limit;
	if($result)
			{
				foreach($result as $rs)
				{
					$rs['amount'] = str_replace($site_setting['currency_symbol'], "", $rs['amount']);
					if($rs['amount'] == '0' or $rs['amount'] == '')
					{
						$w = 0;
						
					}else{
						
						if($rs['amount_get']>=$rs['amount'])
						{
							$w=100;
						}
						else
						{
						$w = ($rs['amount_get']/$rs['amount'])*100;
						
						if($w>0 && $w<1)
							{
								$w=1;
							}
								
						
						
						}
					} 
		  ?>
		  
	<div class="slider_div" id="<?php echo $rs['project_id'].'_'.$off; ?>">
		 <div align="center" style="margin:7px 0px 0px 20px;">
								
			 <?php if($rs['project_draft']==0) { ?><small style=" text-align:left; font-style:normal; color:#FF0000; font-weight:bold; font-size:12px;"><?PHP echo SAVE_IN_DRAFT; ?></small><?php }elseif(strtotime($rs['end_date'])<strtotime(date('Y-m-d h:i:s'))) { ?> <small style=" text-align:left; font-style:normal; color:#FF0000; font-weight:bold; font-size:12px;"><?php echo EXPIRED;?></small> <?php } else  {  if($rs['active']==1){ ?><small style=" text-align:left; font-style:normal; color:#7DBF0E; font-weight:bold; font-size:12px;"><?php echo APPROVED; ?></small> <?php } if($rs['active']==0) { ?><small style=" text-align:left; font-style:normal; color:#FF6600; font-weight:bold; font-size:12px;"><?php echo PENDING_APPROVAL; ?></small> <?php } if($rs['active']==2) { ?><small style=" text-align:left; font-style:normal; color:#FF0000; font-weight:bold; font-size:12px;"><?php echo DECLINED; ?></small><?php }  } ?>			
			
		</div>
		 <h3 style="padding-top:0px;"><?php 
		
						$str_name=$rs['project_title'];
						if(strlen($str_name)<25)$lenght=strlen($str_name);
						else $lenght=25;
						//echo "<br>".$lenght;
						
						$pos = strpos($str_name, ' ', $lenght);
						if ($pos !== false) {
							$str_name= substr($str_name, 0, $pos);
						}
						
		$str_name = substr(ucfirst($rs['project_title']),0,20);
		echo anchor('home/dashboard/'.$rs['project_id'],$str_name,'style="text-decoration:none;"'); ?></h3>	   			
		 <div>
	<?php 
					 
					  $sql=mysql_fetch_array(mysql_query("select * from user where user_id='".$rs['user_id']."'"));
					 
					 if($rs['video_image'] !="")
				     {
				       echo anchor('home/dashboard/'.$rs['project_id'],'<img class="p_img" src="'.$rs['video_image'].'" alt="" width="190" height="150" title="'.ucfirst($rs['project_title']).'" />'); 	
				     }
					 else
					 {
				    	 if(is_file("upload/thumb/".$rs['image'])){ 
					 
					 
					 echo anchor('home/dashboard/'.$rs['project_id'],'<img class="p_img" src="'.base_url().'upload/thumb/'.$rs['image'].'" alt="" width="190" height="150" title="'.ucfirst($rs['project_title']).'" />'); 	
					 
					 }else{ 
				  
				  
				 
				   
				   
				   
					$get_gallery=$this->project_model->get_all_project_gallery($rs['project_id']);
								
								$grcnt=1;
								
								if($get_gallery)
								{
									foreach($get_gallery as $glr)
									{
									
										if($glr->project_image!='' && is_file('upload/thumb/'.$glr->project_image) && $grcnt==1 )
										{
																		
										echo anchor('home/dashboard/'.$rs['project_id'],'<img class="p_img" src="'.base_url().'upload/thumb/'.$glr->project_image.'" alt="" width="190" height="150" title="'.ucfirst($rs['project_title']).'" />'); 	
										
											$grcnt=2;
										}
									
									}
								}
								elseif($grcnt==1)
								{							
									   echo anchor('home/dashboard/'.$rs['project_id'],'<img class="p_img" src="'.base_url().'upload/thumb/no_img.jpg" alt="" width="190" height="150" title="'.ucfirst($rs['project_title']).'" />'); 	
								}
								else
								{
								  echo anchor('home/dashboard/'.$rs['project_id'],'<img class="p_img" src="'.base_url().'upload/thumb/no_img.jpg" alt="" width="190" height="150" title="'.ucfirst($rs['project_title']).'" />'); 	
								}
				   
				   
				   
				   
				   
				   
				   
				   
				   
				   
					}
				}	 ?>
						 </div> 
		 <div style="margin:3px 15px 0px 15px;">
								<small style=" text-align:left; font-style:normal; color:#7DBF0E; font-weight:normal; font-size:12px;"><span style="color:#000000; "><?php echo BY;?> :</span> <?php echo $sql['user_name']; ?></small>		
								
						</div>
		 <p style="text-align:left; font-size:13px;  color:#A0A0A0;">
			
			<?php if($rs['project_summary']!='') { ?>
			
			 <?php //echo wordwrap(substr(strip_tags($rs['project_summary']),0,95),26, "\n",true);
			 
						$str_name=$rs['project_summary'];
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
							<div id="flag_detailsr"><small style="text-align:left; font-style:italic; color:#999999; font-weight:normal;"><span style="text-transform:capitalize;"><?php	if($rs['project_city']=='' and $rs['project_country']==''){  echo 'N/A';  } else { if($rs['project_city']==''){ echo 'N/A'; } else{ echo $rs['project_city']; } ?></span>,<span style="text-transform:capitalize;"><?php if($rs['project_country']==''){ echo 'N/A'; } else{ echo $rs['project_country'];  } } ?></span></small>&nbsp;</div>
							
							</div>
		 <div class="progress"><div class="progreen" style="width:<?php echo $w; ?>%;max-width:100%;"></div></div>
		 <p class="stats">
					<?php if($w=='0') { ?>
						
						<span class="stleft"><?php echo set_currency('0'); ?> <br /><span class="spanf"><?php echo RAISED; ?></span></span>
					
					<?php } else { ?>
					<span class="stleft">
						<?php if($rs['amount_get']=='')	{
							echo set_currency('0')." <br /><span class='spanf'>".RAISED."</span>";
					
					}else{
									
					echo set_currency($rs['amount_get'])." <br /><span class='spanf'>".RAISED."</span>"; 
					
					}	?>	
					</span>
					<?php } ?>
					<span class="stright">
						<?php
						
						if($rs['project_draft']==0) {
							echo $rs['total_days']." <br /><span class='spanf'>".DAYS_LEFT."</span>";
						
						}
						else{
						
							$dateg = $rs['end_date'];
							$date2 = date("Y-m-d");
							
							
							/*$diff = strtotime($date2) - strtotime($date1);
							if(strtotime($rs['end_date'])>strtotime(date('Y-m-d'))) 
							{
							$test = floor(abs($diff) / (60*60*24));
							echo ($rs['end_date']!="0000-00-00")?$test." <br /><span class='spanf'>".DAYS_LEFT."</span>":"0 <br /><span class='spanf'>".DAYS_LEFT."</span>";
							} else {
							
							echo "0 <br /><span class='spanf'>".DAYS_LEFT."</span>";
							
							}*/
							
							
							$date1 = $dateg;
			$date2 = date("Y-m-d");
			$diff = abs(strtotime($date2) - strtotime($date1));
			$test = floor($diff / (60*60*24));
			$str = '';
			
			//echo strtotime(date('Y-m-d',strtotime($dateg))).'=='.strtotime(date('Y-m-d'));exit;
				
				if(strtotime(date('Y-m-d',strtotime($dateg))) > strtotime(date('Y-m-d'))) 
				{
					$temp = floor($diff / (60*60*24));
				
					$str = ($dateg!="0000-00-00 00:00:00")?$test." <br /><span class='spanf'>".DAYS_LEFT."</span>":"0 <br /><span class='spanf'>".DAYS_LEFT."</span>";
				}else {
					//strtotime(date('Y-m-d H:i:s',strtotime($rs->end_date))).'='.strtotime(date('Y-m-d H:i:s'));
					/*if(strtotime(date('Y-m-d',strtotime($dateg))) == strtotime(date('Y-m-d'))) {
						$explode = explode(' ',$dateg);
						$time = $explode[1];
						if($time='00:00:00'){
							$str = date('H',strtotime(date('Y-m-d H:i:s',strtotime($dateg)))-strtotime(date('Y-m-d H:i:s'))).' '.HOURS_LEFT;
						}
						else{
							$str = "0 ".DAYS_LEFT;
						}
					}
					else{
						$str = "0 ".DAYS_LEFT;
					}*/
					
					$hours = 0;
					$minuts = 0;
					$dategg = $dateg;
					$date2 = date('Y-m-d H:i:s');
	
			if(strtotime(date('Y-m-d H:i:s',strtotime($dateg))) > strtotime(date('Y-m-d H:i:s'))) 
			{					
				
				//echo $date2;
				$diff2 = abs(strtotime($dategg) - strtotime($date2));
				$day1 = floor($diff2 / (60*60*24));
				
			
				$hours   = floor(($diff2 - $day1*60*60*24)/ (60*60));  
				$minuts  = floor(($diff2 - $day1*60*60*24 - $hours*60*60)/ 60); 
				$seconds = floor(($diff2 - $day1*60*60*24 - $hours*60*60 - $minuts*60)); 
				
				if($hours != 0 || $minuts!=0 || $seconds!=0){
					//echo date('H',strtotime(date('Y-m-d H:i:s',strtotime($dateg)))-strtotime(date('Y-m-d H:i:s'))).'<br /><p>Hours Left</p>';
					//echo $project['end_date'];
					
							$str = $hours." <br /><span class='spanf'>".HOURS_LEFT."</span>";
							if($hours != 0){						
								$str = $hours." <br /><span class='spanf'>".HOURS_LEFT."</span>";
							}
							elseif($minuts != 0) { 
								$str = $minuts." <br /><span class='spanf'>".MINUTES_LEFT."</span>";
							}
							else{
								$str = $seconds." <br /><span class='spanf'>".SECONDS_LEFT."</span>";
							}
							
						}
						else
						{
							$str = "0 <br /><span class='spanf'>".DAYS_LEFT."</span>";
						}
					}
					else
					{
						$str = "0 <br /><span class='spanf'>".DAYS_LEFT."</span>";
					}
					
				}
				echo $str;
				
				}
						?>
					</span>
					</p>
	</div>
				
		  <?php } ?>
		  
		  <div class="clear"></div>  
		  <div align="center" class="pg_img"><br/>
		 <br/><br/><br/>
		  </div> 
		  <?php } else{  ?>
			 <p>
              <h3><?php echo NO_RESULT_FOUND; ?></h3>
            </p>
		  <?php
			}
		  ?>
	</div>
	</div>
</div>       