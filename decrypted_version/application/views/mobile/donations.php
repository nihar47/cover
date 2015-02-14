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

<div data-role="header">

  <h1>DONATIONS </h1>

  <?php echo anchor('home','Home','class="ui-btn-left"'); ?> 

   <?php echo anchor('user/my_project/',CHANGE_PROJECT,'class="ui-btn-right"'); ?>

 </div>

  <div class="pad15">

  <h2> <span id="s1postJ"> <?php echo REVIEW_YOURS_DONORS_AND_DONATION_BELOW; ?></span></h2>

  <br>

  

   <?php if($donations){        ?>

			 

			

			

			  <div id="recent-donate-detail">

               

                <table border="0" cellpadding="1" cellspacing="1" width="100%" style="background-color: #cccccc;">

				

				<tr>				

				<td class="donate_header" align="center" valign="top" ><?php echo DATE; ?></td>				

                  <td class="donate_header" align="center" valign="top"><?php echo DONOR; ?></td>

				 <td class="donate_header" align="center" valign="top" ><?php echo PERK;?></td>

                 

                   <td class="donate_header" align="center" valign="top"><?php echo AMOUNT; ?><br/>(<?php echo $site_setting['currency_symbol'];?>)</td>				   

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

                   <td  class="donate_td" align="center" valign="top">

				   <?php 

					

					if($dn['trans_anonymous']=='3'){

					

					$donar_user=get_user_detail($dn['user_id']);

					

					

					echo ANONYMOUS; ?>

                   

                   </td>

				   

				    <td  class="donate_td" align="center" valign="top"><?php echo ANONYMOUS; ?></td>

					 <td  class="donate_td" align="center" valign="top"><?php echo ANONYMOUS;  ?></td>

				   

				   <td  class="donate_td" align="center" valign="top"><?php echo ANONYMOUS; ?></td>

                   <?php }else{

				   

				   

					$donar_user=get_user_detail($dn['user_id']);

					

					

					echo anchor('member/'.$dn['user_id'],ucfirst($donar_user['user_name'].' '.$donar_user['last_name']),'style="font-weight:bold;"'); ?>

                   

                   </td>

				   

				   <?php  } ?>

				   <td  class="donate_td" align="center" valign="top"><?php   

				   				

				if($dn['perk_id']!='0') {				

								   

				 $perk=$this->project_model->get_perk_name($dn['perk_id']);

				   

				   		   if(strlen($perk)>=1)

						   {

						  		 echo ucfirst($perk);

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

                   

                   <td  class="donate_td" align="center" valign="top"><?php if($dn['trans_anonymous'] != '2' and $dn['trans_anonymous'] != '3'){    echo set_currency($dn['amount']);  } else { echo ANONYMOUS;  } ?></td>

                </tr>

				  <?php			

							$i++;

						}

					}

				  ?>

                </table>

         

              </div>

			  

			  	 <div class="clear"></div>

			 

			     <div align="center"  style="line-height:20px;  font-size:11px;"><br/> <?php echo $page_link; ?></div>

				 

				 	 <div class="clear"></div>

					 

		

		

		

			<?php } else { ?>

			

			

			<div class="clear"></div>

			

			<div align="center"><?php echo NO_DONATION; ?>.</div>

			

			<div class="clear"></div>

			

			<?php } ?>	

  </div>