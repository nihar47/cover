<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>horizontal.css" />





<div class="campaigns" style="padding-top:20px;">

	<h2><?php echo FEATURED_PROJECTS;?></h2>

	

	

	<script type="text/javascript" src="<?php echo base_url(); ?>js2/jquery.jcarousel.min.js"></script> 

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>js2/skin.css" /> 

	<script type="text/javascript"> 

 

jQuery(document).ready(function() {

    jQuery('#mycarousel').jcarousel({

    	wrap: 'circular'

    });

});

 

</script> 





		

			<div id="SlideItMoo_items">

			

			<ul id="mycarousel" class="jcarousel-skin-tango">

			<?php

				if($result)

				{

					foreach($result as $rs)

					{

						$rs->amount = str_replace("$", "", $rs->amount);

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

				<li>	

				<div class="SlideItMoo_element">

						<h3><?php echo anchor('projects/'.$rs->url_project_title.'/'.$rs->project_id,substr(ucfirst($rs->project_title),0,25),'style="text-decoration:none;"'); ?></h3>

						<div>

							<?php 

							

							if($rs->image!='' && is_file("upload/thumb/".$rs->image)){ 

								echo anchor('projects/'.$rs->url_project_title.'/'.$rs->project_id,'<img class="p_img" src="'.base_url().'upload/thumb/'.$rs->image.'" alt="" width="190" height="150" title="'.ucfirst($rs->project_title).'" />'); 		  

							} 

							else{ 

							

							

							$get_gallery=$this->project_model->get_all_project_gallery($rs->project_id);

							

							$grcnt=1;

							

							if($get_gallery)

							{

								foreach($get_gallery as $glr)

								{

								

									if($glr->project_image!='' && is_file('upload/thumb/'.$glr->project_image) && $grcnt==1 )

									{

																	

									echo anchor('projects/'.$rs->url_project_title.'/'.$rs->project_id,'<img class="p_img" src="'.base_url().'upload/thumb/'.$glr->project_image.'" alt="" width="190" height="150" title="'.ucfirst($rs->project_title).'" />'); 	

									

										$grcnt=2;

									}

								

								}

							}

							elseif($grcnt==1)

							{							

								echo anchor('projects/'.$rs->url_project_title.'/'.$rs->project_id,'<img class="p_img" src="'.base_url().'images/no_img.jpg" width="190" height="150"  title="'.ucfirst($rs->project_title).'" />');

							}

							else

							{

							echo anchor('projects/'.$rs->url_project_title.'/'.$rs->project_id,'<img class="p_img" src="'.base_url().'images/no_img.jpg" width="190" height="150"  title="'.ucfirst($rs->project_title).'" />');

							}

							

							

					}    ?>

						</div>

						

						<div style="margin:5px 15px 0px 15px;">

							<small style=" text-align:left; font-style:normal; color:#7DBF0E; font-weight:normal; font-size:12px;"><span style="color:#000000; "><?php echo BY;?> :</span> <?php echo $rs->user_name; ?></small>		</div>

							

							

							

						<p style="text-align:left; font-size:13px; color:#A0A0A0;">

							<?php if($rs->project_summary!='') { 

								echo substr(strip_tags($rs->project_summary),0,95); 

								

								 } ?>

												

						</p>

						

						

						<div id="flag_div">

						

						<div id="flag" style="float:left;"><img src="<?php echo base_url(); ?>images2/flag.png" border="0" /></div>

						<div id="flag_detail"><small style="text-align:left; font-style:italic; color:#999999; font-weight:normal;"><span style="text-transform:capitalize;"><?php echo $rs->project_city; ?></span>,<span style="text-transform:capitalize;"><?php echo $rs->project_country; ?></span></small>&nbsp;</div>

						

						</div>

						

						

						

						<div class="progress">

							<div class="progreen" style="width:<?php echo $w; ?>%;max-width:100%;"></div>

						</div>

						<p class="stats">

							<?php if($w=='0') { ?>

								<span class="stleft"><?php echo set_currency('0'); ?> RAISED</span>

							<?php } else { ?>

								<span class="stleft">

								<?php if($rs->amount_get=='')	{

									echo set_currency('0')." RAISED";

								}else{

									echo set_currency($rs->amount_get)." RAISED"; 

								}

							}?>	

								</span>

								<span class="stright">

								<?php

									$date1 = $rs->end_date;

									$date2 = date("Y-m-d");

									$diff = abs(strtotime($date2) - strtotime($date1));

									$test = floor($diff / (60*60*24));

									

																

									echo ($rs->end_date!="0000-00-00")?$test." DAYS LEFT":"0 DAYS LEFT";

								?>

								</span>

						</p>

					</div>   </li>

			<?php

					}

				}

			?>

			</ul>

			</div>			

		

	<h3 class="discover"><?php echo anchor('search/',$this->home_model->text_echo('DISCOVER MORE >'),'style="color:#114a75;"');?></h3>

	<div class="clear"></div>

</div>