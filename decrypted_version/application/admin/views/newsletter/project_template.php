<?php

$CI =& get_instance();	

$base_url = $CI->config->slash_item('base_url_site');											

$base_path = base_path();





$project['amount'] = str_replace("$", "", $project['amount']);

				

	if($project['amount'] == '0' or $project['amount'] == '')

	{

		$w = 0;

		

	}else{

		

		if($project['amount_get']>=$project['amount'])

		{

			$w=100;

		}

		else

		{

		$w = ($project['amount_get']/$project['amount'])*100;

		

			if($w>0 && $w<1)

			{

				$w=1;

			}

				

		

		}

	}

	

	

		$date1 = $project['end_date'];

		$date2 = date("Y-m-d");

		$diff = abs(strtotime($date2) - strtotime($date1));

		$test = floor($diff / (60*60*24));

		

?>



<table border="0" cellpadding="3" cellspacing="3" width="700">



<tr>

<td align="left" valign="top" colspan="2" style="text-align:left;"><a href="<?php echo front_base_url().'projects/'.$project['url_project_title'].'/'.$project['project_id'];?>" style="font-size:18px; font-weight:bold; color:#114A75; text-transform:capitalize;"><?php echo $project['project_title']; ?></a></td>



</tr>





<tr>



<td align="left" valign="top">



 

				 <?php if(is_file($base_path."upload/thumb/".$project['image'])){ 

				 

				 

				 echo '<a href="'.front_base_url().'projects/'.$project['url_project_title'].'/'.$project['project_id'].'" target="_blank"><img class="p_img" src="'.upload_url().'upload/thumb/'.$project['image'].'" alt="" width="190" height="150" title="'.ucfirst($project['project_title']).'" /></a>'; 	

				 

				 }else{ 

			  

			  

			  			   

			   

			   $cnt_gal=1;

				

				

			

			if($project_gallery)

			{ 

			

			   	foreach($project_gallery as $prjgry)

				{

					

						if($prjgry->project_image!=''  && is_file($base_path.'upload/thumb/'.$prjgry->project_image) && $cnt_gal==1)

						{						

												 

						  echo '<a href="'.front_base_url().'projects/'.$project['url_project_title'].'/'.$project['project_id'].'" target="_blank"><img class="p_img" src="'.upload_url().'upload/thumb/'.$prjgry->project_image.'" alt="" width="190" height="150" title="'.ucfirst($project['project_title']).'" /></a>'; 						  			

							$cnt_gal=2;

						}

						

									

				}

				

			}

			elseif($cnt_gal==1)

			{

			 

			 echo '<a href="'.front_base_url().'projects/'.$project['url_project_title'].'/'.$project['project_id'].'" target="_blank"><img class="p_img" src="'.upload_url().'upload/thumb/no_img.jpg" alt="" width="190" height="150" title="'.ucfirst($project['project_title']).'" /></a>'; 

			 		

			} else { 

			

			  echo '<a href="'.front_base_url().'projects/'.$project['url_project_title'].'/'.$project['project_id'].'" target="_blank"><img class="p_img" src="'.upload_url().'upload/thumb/no_img.jpg" alt="" width="190" height="150" title="'.ucfirst($project['project_title']).'" /></a>'; 	

			

			}

			   

						   

			    }

				

				

				

				?>



</td>



<td align="left" valign="top" style="text-align:justify; padding:10px;">



<table border="0" cellpadding="2" cellspacing="2">

<tr>

<td align="center" valign="top" style="font-size:16px; font-weight:bold; color:#114A75;">Goal</td>

<td align="center" valign="top" style="font-size:16px; font-weight:bold; color:#114A75;">Raised</td>

<td align="center" valign="top" style="font-size:16px; font-weight:bold; color:#114A75;">Days Left</td>

</tr>



<tr>

<td align="center" valign="top" style="font-size:12px; font-weight:bold;">

<?php echo set_currency($project['amount']); ?>

</td>

<td align="center" valign="top" style="font-size:12px; font-weight:bold;">

<?php if($project['amount_get']>0){  echo set_currency($project['amount_get'])." RAISED"; } else { echo "0 RAISED"; } ?>

</td>

<td align="center" valign="top" style="font-size:12px; font-weight:bold;">

<?php echo ($project['end_date']!="0000-00-00")?$test." DAYS LEFT":"0 DAYS LEFT";  ?>

</td>



</tr>

<tr><td colspan="3" height="18">&nbsp;</td></tr>

<tr>

<td align="left" valign="top" style="text-align:left;" colspan="3">

<span style="font-size:16px; font-weight:bold; color:#114A75;">Summary: </span> <?php echo $project['project_summary']; ?>

</td>

</tr>



</table>







</td>



</tr>







<tr>

<td align="left" valign="top" style="text-align:justify; padding:10px;" colspan="2"><?php echo strip_tags($project['description']); ?></td>

</tr>





</table>