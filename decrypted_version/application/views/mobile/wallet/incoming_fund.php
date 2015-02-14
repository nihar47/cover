

<style type="text/css">

			  

.error p { color:#FF0000; }



#wallet_table { background-color:#cccccc; }

#wallet_table th { background-color: #F3F2F2;

padding: 3px;

font-weight: bold;

color: #333;  }

.debit { background:#FFFFFF; color:#000000; height:20px; }



.credit { background-color:#FFCECE; color:#000000; height:20px; }



.review { background-color:#E0E0E0; color:#000000; height:20px; }



</style>

<script type="text/javascript">

function show_perk_detail(id,i){

	document.getElementById('show'+id+i).style.display='block';

}	



function hide_perk_detail(id,i){

	document.getElementById('show'+id+i).style.display='none';

}	

</script>

<div id="headerbar">

	<div class="wrap930">

	

	<!-- dd menu -->	

<div class="login_navl">

 

			

			

		<table border="0" cellpadding="0" cellspacing="0" width="100%">

		<tr><td align="left" >	

	<div class="project_title_hd" style="padding-top:15px;" >

	

	

	<span style="text-transform:capitalize;color:#2B5F94;font-size:17px;"><?php echo $this->session->userdata('project_title'); ?></span>

    

	

	</div>

	</td>

	<td align="right" >	

	

	<div class="project_title_hd" style="padding-top:15px; "  >

	<span id="sddm" style="float:right;">

		

		<?php   error_reporting(0); if($this->session->userdata['project_id']!='' && $this->session->userdata['project_id']!=0) {  ?>

		

	 <?php echo anchor('user/my_project/',CHANGE_PROJECT,' style="text-transform:capitalize;color:#2B5F94;font-size:17px;text-decoration:none;" '); ?>

	
		<?php } ?>

		

	</span>

	</div>



</td></tr></table>



		  </div> 

		      

		<div class="clear"></div>

	</div>

</div>	

<div id="container">

<div class="wrap930" style="padding:15px 0px 20px 0px;">	



<!--side bar user panel-->



<?php echo $this->load->view('dashboard_sidebar'); ?>



<!--side bar user panel-->





<div class="con_left2" style="min-height:0px; width:690px; margin-right:0px;">

			

			

			

		

		

		

		<style type="text/css">



#tab_all a{ color:#000000; text-decoration:none; }



</style>				





<?php

	$data['tab_sel'] = INCOMING_FUND;

	$this->load->view('overview_tabs',$data);



?>

<div class="inner_content" style=" margin-top:11px;padding:12px; ">

		<h3 id="dropmenu2">

		

		<span style="float:left;"><?php echo INCOMING_FUND;?></span>

		

		

		 <span style="float:right; height:35px;  font-size:12px;">

			  <!--<table border="0" cellpadding="0" cellspacing="0">

			  <tr>

			 

			 <td align="right" valign="top"><?php //echo anchor('wallet/target_amount/'.$pro_id,TOTAL_PROJECT_TITLE,'style="font-weight:bold; color:#009900;font-size:13px !important;"');?></td>

			   <td width="10">&nbsp;|&nbsp;</td>

			 <td align="right" valign="top"><?php //echo anchor('wallet/total_recieve/'.$pro_id,TOTAL_RECIEVE_PAYMENT,'style="font-weight:bold; color:#009900;font-size:13px !important;"');?></td>

			 

			

			  <td width="10">&nbsp;|&nbsp;</td>

			 <td align="right" valign="top"><?php //echo anchor('wallet/remain_days/'.$pro_id,REMAIN_DAYS,'style="font-size:13px !important; color:#009900;"');?></td>

			

			 

			 </tr>

			 </table>-->

             <table border="0" cellpadding="0" cellspacing="0">

			  <tr>

			 

			 <td align="right" valign="top"><b><?php echo PROJECT_GOAL;?> :</b> <?php echo set_currency($project['amount']);?></td>

			   <td width="10">&nbsp;|&nbsp;</td>

               <?php

			   if($target_fund->amount_get !='')

			   {?>

			   <td align="right" valign="top"><b><?php echo TOTAL_RECIEVE_PAYMENT;?> :</b> <?php echo set_currency($project['amount_get']); ?></td>

			   <?php }

			   else {$project['amount_get']=0;?>

                     <td align="right" valign="top"><b><?php echo TOTAL_RECIEVE_PAYMENT;?> :</b> <?php echo set_currency($project['amount_get']); ?></td>

               <?php }?>

			

			 

			<?php $date1 =$target_fund->end_date;

									$date2 = date("Y-m-d");

									$diff = abs(strtotime($date2) - strtotime($date1));

									$total = floor($diff / (60*60*24));

				

					$dateg = $project['end_date'];

				$date1 = $dateg;

				$date2 = date("Y-m-d");

				$diff = abs(strtotime($date2) - strtotime($date1));

				$test = floor($diff / (60*60*24));

				$str = '';

				

			if(strtotime(date('Y-m-d',strtotime($dateg))) > strtotime(date('Y-m-d'))) 

			{

				$temp = floor($diff / (60*60*24));

			

				$str = ($dateg!="0000-00-00 00:00:00")?$test." ".DAYS_LEFT:"<br /><p>&nbsp;</p>";

			}else {

				

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

				

						$str = $hours." ".HOURS_LEFT;

						if($hours != 0){						

							$str = $hours." ".HOURS_LEFT;

						}

						elseif($minuts != 0) { 

							$str = $minuts." ".MINUTES_LEFT;

						}

						else{

							$str = $seconds." ".SECONDS_LEFT;

						}

						

					}

					else

					{

						$str = "0 ".DAYS_LEFT;

					}

				}

				else

				{

					$str = "0 ".DAYS_LEFT;

				}

					

				

			}

			$total = $str;					

									?>

			  <td width="10">&nbsp;|&nbsp;</td>

			 <td align="right" valign="top"><b><?php echo REMAIN_DAYS;?> :</b> <?php echo $total;?></td>

			

			 

			 </tr>

			 </table>

			 

			 </span>

			 

		</h3>

		

		

		

			 

			   

			   

			   

			  

			 

			 

			 <div style="clear:both;"></div> 

			  

			 <table border="0" align="left" cellpadding="0" cellspacing="1" width="100%" id="wallet_table">

			 

			 <tr>

			 

			 <th align="center"><?php echo NAME;?> </th>

			 <th align="center"><?php echo PERK;?></th>			 

			 <th align="center"><?php echo EMAIL;?></th>

			 <th align="center"><?php echo FUND_AMOUNT;?></th>

			 <th align="center"><?php echo FUND_TIME;?></th>

			 <th align="center"><?php echo STATUS;?></th>

			  <?php if($wallet_setting->wallet_payment_type == '1'){ ?>

             <th align="center"><?php echo DONATION_STATUS;?></th>

             <th align="center"><?php echo ACTION;?></th>

             <?php $colspan=9; } ?>     

			</tr>

			 

			 <?php

			  $colspan=8;

			 if($incoming_fund) {

			 

			 $i=0;

			 	foreach($incoming_fund as $rs) { 

				

				$cls='debit';

				if($rs->credit>0)

				{

					$cls='credit';				

				}

				if($rs->debit>0)

				{

					$cls='debit';				

				}

				if($rs->admin_status=='Review') 

				{

					$cls='review';

				}

						

				

				?>

				

				<tr class="<?php echo $cls; ?>">

				

				<td  align="center" valign="middle" style="padding-right:8px;"><?php if($rs->wallet_anonymous=='3'){  echo ANONYMOUS;  }else{ echo anchor('member/'.$rs->user_id,$rs->user_name);} ?></td>

				

                 <td  class="donate_td" align="center" valign="top"><?php   

				   				

				if($rs->perk_id !='0') {				

								   

				 $perk=$this->project_model->get_one_perk($rs->perk_id);

				   

				   		   if(strlen($perk['perk_title'])>=1)

						   {

									// echo ucfirst($perk);

								 ?>

                                 <div style="position:relative;"><a href="javascript:\\" onmouseover="show_perk_detail('<?php echo $rs->perk_id; ?>','<?php echo $i; ?>');" onmouseout="hide_perk_detail('<?php echo $rs->perk_id; ?>','<?php echo $i; ?>');" style="display:inline-block;padding:3px;"><?php echo ucfirst($perk['perk_title']); ?></a><div style="position:absolute;top:20px;left:60px; width:200px; border:1px solid #9FC8DA; padding:3px; display:none; background:#E3F0FD; z-index:1000 " id="show<?php echo $rs->perk_id; ?><?php echo $i; ?>"><?php echo $perk['perk_description']; ?></div>

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

                <td   align="center" valign="middle"><?php if($rs->wallet_anonymous=='3'){  echo ANONYMOUS;  }else{ echo $rs->email;  }?></td>

				<td  align="center"  valign="middle"><?php if($rs->wallet_anonymous=='3' || $rs->wallet_anonymous=='2'){  echo ANONYMOUS;  }else{  ?><?php echo set_currency($rs->debit); } ?></td>

				<td  align="center"  valign="middle"><?php echo date('d M,Y',strtotime($rs->wallet_date));?></td>				

				<td  align="center" valign="middle"><?php echo $rs->admin_status;?></td>

				

                <?php if($wallet_setting->wallet_payment_type == '1'){ ?>

                	<td align="center" valign="middle"><?php if($rs->donate_status=='1'){ echo CONFIRM; } else{    

					

					?>  <?php echo ONHOLD; ?><?php

					 } ?></td>

                	<td align="center" valign="middle"><?php if($rs->project_id > 0){	

					if(strtotime(date('Y-m-d',strtotime($project['end_date']))) > strtotime(date('Y-m-d')) && $project['active']=='1' )

					{	

					

					echo anchor('wallet/delete_wallet_donation/'.$rs->id,CANCEL); 

					} 

					elseif($rs->debit > 0){

						echo anchor('wallet/delete_wallet_donation/'.$rs->id,CANCEL); 

					}

					else {

					//echo anchor('wallet/delete_wallet_donation/'.$rs->id,CANCEL);

					}

					 } ?></td>

                <?php  }  ?>

				</tr>

			 

			 

			 <?php $i++; } if($total_rows>$limit) { ?>

			 

			 <tr class="debit"><td colspan="<?php echo $colspan; ?>" height="35" align="center" valign="middle"><?php echo $page_link; ?></td></tr>

			 

			 <?php  } } else { ?>

			 

			<tr class="even">

			<td colspan="8" align="center" valign="middle"><?php echo NO_INCOMING_FOUND; ?>.</td>

			</tr>

			 

			 <?php } ?>

			 

			  </table>

              

			  <div style="clear:both;"></div>

				 

				

</div>





	</div>

			

			

				

				<div class="clear"></div>		



			

	</div>

	<!-- left end ------>

		

       </div>

</div>

</div>       			