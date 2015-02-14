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

	

function show_perk_detail(id,i){

	document.getElementById('show'+id+i).style.display='block';

}	



function hide_perk_detail(id,i){

	document.getElementById('show'+id+i).style.display='none';

}	



</script>

<div data-role="header" data-position="inline">

	<h1><?php echo REVIEW_YOUR_DONATION_BELOW;?></h1>

	<?php echo anchor('home','Home','class="ui-btn-right"'); ?>

</div>

<div class="pad15">



  <?php if($donations){?>

  

  		<table cellspacing="1" cellpadding="5" align="center" width="100%" >

				

				<tr>				

					<th><?php echo DATE; ?></th>			

					<th><?php echo PROJECT; ?></th>			

					<th><?php echo PERK; ?></th>			

					<th><?php echo AMOUNT; ?><br/>(<?php echo $site_setting['currency_symbol'];?>)</th>				   

				   </tr>

				   

				   <?php

				  	$i = 0;

					if($donations)

					{

						foreach($donations as $dn)

						{

							if($i%2 == '0')

							{

								$str = "class='light1' ";

							}else{

								$str = "class='light' ";

							}

				  ?>

				  <tr <?php echo $str; ?>>

                    <td class="donate_td" align="center" valign="top"><?php 

					

					$orig_date=explode(' ',$dn['transaction_date_time']);

					

					echo date($site_setting['date_format'],strtotime($orig_date[0])); ?></td>

                    <td  class="donate_td" align="center" valign="top"><?php echo anchor('projects/'.$dn['url_project_title'].'/'.$dn['project_id'],$dn['project_title']); ?></td>

				    <td  class="donate_td" align="center" valign="top"><?php   

				   				

				if($dn['perk_id']!='0') {				

								   

				 $perk=$this->project_model->get_one_perk($dn['perk_id']);

				   

				   		   if(strlen($perk['perk_title'])>=1)

						   {

						  		// echo ucfirst($perk);

								 ?>

                                 <div style="position:relative;"><a href="javascript:\\" onmouseover="show_perk_detail('<?php echo $dn['perk_id']; ?>','<?php echo $i; ?>');" onmouseout="hide_perk_detail('<?php echo $dn['perk_id']; ?>','<?php echo $i; ?>');" style="display:inline-block;padding:3px;"><?php echo ucfirst($perk['perk_title']); ?></a><div style="position:absolute;top:20px;left:60px; width:200px; border:1px solid #9FC8DA; padding:3px; display:none; background:#E3F0FD; " id="show<?php echo $dn['perk_id']; ?><?php echo $i; ?>"><?php echo $perk['perk_description']; ?></div>

								 </div><?php

						   }

						   else

						   {

						     echo "N/A";

						   }

						   

				}

				

						   else

						   {

						     echo "N/A";

						   }

				   

				   ?></td>

                    <td  class="donate_td" align="center" valign="top"><?php echo set_currency($dn['amount']); ?></td>

                </tr>

				  <?php			

							$i++;

						} }?>

					

				 <tr class="debit"><td colspan="5" height="35" align="center" valign="middle"><?php echo $page_link; ?></td></tr>	

				

				

			

  <?php } else

  {?>

  	

 <tr class="debit"><td colspan="5" height="35" align="center" valign="middle"><?php echo NO_DONATION; ?>.</td></tr>



	<?php }?>



</table>

	

</div>	



