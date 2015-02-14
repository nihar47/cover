

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

.inner_content_d{	width:865px; }

</style>



<script>

	

function show_perk_detail(id,i,div){

	document.getElementById(div+id+i).style.display='block';

}	



function hide_perk_detail(id,i,div){

	document.getElementById(div+id+i).style.display='none';

}	

</script>

<div id="headerbar">

	<div class="wrap930">

	

	<!-- dd menu -->	

<div class="login_navl">

					

			

		<table border="0" cellpadding="0" cellspacing="0" width="100%">

		<tr><td align="left" >	

	<div class="project_title_hd" style="padding-top:15px;" >

	

	

	<span style="text-transform:capitalize;color:#2B5F94;font-size:17px;"><?php echo MANAGE_WALLET_BELOW; ?></span>

    

	

	</div>

	</td>

	<td align="right" >	

	

	<div class="project_title_hd" style="padding-top:15px; "  >

	<span id="sddm" style="float:right;"></span>

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

	$data['tab_sel'] = WALLET;

	$this->load->view('dashboard_tabs',$data);



?>



<div class="inner_content" style=" margin-top:11px;padding:12px; ">

		<h3 id="dropmenu2">

		

		<span style="float:left;"><?php echo MY_WALLET; ?>( <?php	if($total_wallet_amount >=0){	echo set_currency($total_wallet_amount); } else{ echo '-'.set_currency(str_replace('-','',$total_wallet_amount)); }	?>)</span>

		

		

		 <span style="float:right; height:35px;  font-size:12px;">

			  <table border="0" cellpadding="0" cellspacing="0">

			  <tr>

			 

			 <td align="right" valign="top"><?php echo anchor('wallet/add_wallet',ADD_WALLET,'style="font-weight:bold; color:#009900;font-size:13px !important;"');?></td>

			   <td width="10">&nbsp;|&nbsp;</td>

			 <td align="right" valign="top"><?php echo anchor('wallet/my_withdraw',MY_WITHDRAWAL,'style="font-weight:bold; color:#009900;font-size:13px !important;"');?></td>

			 

			 <?php if($total_wallet_amount>$wallet_setting->wallet_minimum_amount) { ?>

			  <td width="10">&nbsp;|&nbsp;</td>

			 <td align="right" valign="top"><?php echo anchor('wallet/withdraw_wallet',WITHDRAW_AMOUNT,'style="font-size:13px !important; color:#009900;"');?></td>

			 <?php } ?>

			 

			 </tr>

			 </table>

			 

			 </span>

			 

		</h3>

		

		

		

			   <?php 

			   if($msg=='add_success'){

			   

			   $chk_status_admin=$this->db->query("select * from wallet where user_id='".$this->session->userdata('user_id')."' and admin_status='Confirm'");

				

				if($chk_status_admin->num_rows()<=3)

				{

					?><?php	echo '<div style="clear:both; margin-top:20px;"></div><div ><p style="color:#7DBF0F; font-weight:bold;">'.WALLET_AMOUNT_ADDED_PAYPAL_SUCCESS_SUCCESSFULLY_WAIT_ADMIN_CONFIRMATION.'</p></div>'; ?><?php

				}

				

			   		

			   }

			   elseif($msg!='') { ?><div style="clear:both; margin-top:20px;"></div> <div class="error" style="color:#FF0000;"><?php echo $msg;  ?></div><div style="clear:both; margin-top:20px;"></div>		<?php } else{  }

			   

			   $colspan=6;

			   ?>

			   

			   

			   

			  

			 

			 

			 <div style="clear:both;"></div> 

			  

			 <table border="0" align="left" cellpadding="0" cellspacing="1" width="100%" id="wallet_table">

			 

			 <tr>

			 <th>&nbsp;</th>

			 <th><?php echo AMOUNT; ?></th>

			 <!--<th><?php //echo PAYEE_EMAIL; ?></th>	-->		 

			  <th><?php echo TRANSACTION_ID; ?></th>

			  <th><?php echo PROJECT; ?></th>

			  <!--<th><?php //echo GATEWAY; ?></th>

			 <th><?php //echo DATE_ADDED; ?></th>-->

             

			 <th><?php echo STATUS; ?></th>

             <?php //if($wallet_setting->wallet_payment_type == '1'){ ?>

                   <th><?php echo DONATION_STATUS; ?></th>

                   <th><?php echo CANCEL; ?></th>

             <?php $colspan=8; //} ?>  

               <th><?php echo VIEW; ?></th>   

			</tr>

			 

			 <?php

			 

			 if($wallet_details) {

			 

			 $i=0;

			 	foreach($wallet_details as $rs) { 

				

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

				<td align="center" valign="middle"><?php if($rs->credit>0) { echo CREDIT; } if($rs->debit>0) { echo DEBIT; } ?></td>

				<td align="right" valign="middle" style="padding-right:8px;"><?php if($rs->credit>0) { echo "-".$rs->credit; } if($rs->debit>0) { echo "+".$rs->debit; } ?>  </td>

				<!--<td align="left" valign="middle" style="padding-left:10px;"><?php //echo $rs->wallet_payee_email; ?></td>-->

				<td align="center" valign="middle"><?php echo $rs->wallet_transaction_id; ?></td>

				

				<td align="center" valign="middle"><?php if($rs->project_id=='' || $rs->project_id==0 || $rs->project_id=='0') { echo 'N/A';} else {

				

				$project_detail=$this->project_model->get_project_user($rs->project_id);

				

				echo $project_detail['project_title'];

				

				} ?> 

				</td>

				

				<!--<td align="center" valign="middle"><?php //if($rs->gateway_id==0 || $rs->gateway_id=='0') { echo INTERNAL; } else { $gateway_detail=$this->user_model->get_paymentid_result($rs->gateway_id);

				//echo $gateway_detail['name']; } ?></td>	

				<td align="center" valign="middle"><?php //echo date('d,M Y H:i:s',strtotime($rs->wallet_date)); ?></td>-->	

                		

                

                

				<td align="center" valign="middle"><?php if($rs->admin_status==REVIEW){ ?><span style="color:#FF0000; font-weight:bold;"><?php echo $rs->admin_status; ?></span> <?php } if($rs->admin_status==CONFIRM) { ?><span style="color:#009900; font-weight:bold;"><?php echo $rs->admin_status; ?> </span> <?php }  ?></td>



				<?php //if($wallet_setting->wallet_payment_type == '1'){ ?>

                	<td align="center" valign="middle"><?php if($rs->donate_status=='1'){ echo CONFIRM; } else{    

					

					?>  <div style="position:relative;"><a href="javascript:\\" onmouseover="show_perk_detail('<?php echo $rs->id; ?>','<?php echo $i; ?>','show');" onmouseout="hide_perk_detail('<?php echo $rs->id; ?>','<?php echo $i; ?>','show');" style="display:inline-block;padding:3px;"><?php echo ONHOLD; ?></a>

                    <div style="position:absolute;top:25px;left:15px; width:200px; border:1px solid #9FC8DA; padding:3px; display:none; background:#E3F0FD; text-align:left;z-index:1000; " id="show<?php echo $rs->id; ?><?php echo $i; ?>">

					<?php echo ACHIEVED_AMOUNT.' : '.set_currency($project_detail['amount_get']); echo '<br>';

						echo GOAL_AMOUNT.' : '.set_currency($project_detail['amount']); 	echo '<br>';

						echo END_DATE.' : '.date('d,M Y H:i:s',strtotime($project_detail['end_date']));

					 ?>

                    </div>

								 </div><?php

					 } ?></td>

                	<td align="center" valign="middle">

					<?php 

					if($rs->project_id=='' || $rs->project_id==0 || $rs->project_id=='0') {echo 'N/A';} else {

					if(strtotime(date('Y-m-d',strtotime($project_detail['end_date']))) > strtotime(date('Y-m-d')) && $rs->project_id > 0 && $project_detail['active']=='1' )

					{	

					

					echo anchor('wallet/delete_wallet_donation/'.$rs->id,CANCEL); 

					} 

					elseif($rs->debit > 0){

						echo anchor('wallet/delete_wallet_donation/'.$rs->id,CANCEL); 

					}

					else {

					       echo 'N/A'; }

				}

					?></td>

                <?php  //}  ?>

                

                <td align="center" valign="middle"><?php  ?>

                <div style="position:relative;"><a href="javascript:\\" onmouseover="show_perk_detail('<?php echo $rs->id; ?>','<?php echo $i; ?>','show_view');" onmouseout="hide_perk_detail('<?php echo $rs->id; ?>','<?php echo $i; ?>','show_view');" style="display:inline-block;padding:3px;"><?php echo VIEW; ?></a>

                    <div style="position:absolute;top:25px;left:15px; width:210px; border:1px solid #9FC8DA; padding:3px; display:none; background:#E3F0FD; text-align:left; z-index:1000; " id="show_view<?php echo $rs->id; ?><?php echo $i; ?>">

					<?php echo PAYEE_EMAIL.' : '.$rs->wallet_payee_email; echo '<br>';

						echo GATEWAY.' : ';

						if($rs->gateway_id==0 || $rs->gateway_id=='0') { echo INTERNAL; } else { $gateway_detail=$this->user_model->get_paymentid_result($rs->gateway_id);

				echo $gateway_detail['name']; }

							echo '<br>';

						echo DATE_ADDED.' : '.date('d,M Y H:i:s',strtotime($rs->wallet_date));

					 ?>

                    </div>

								 </div>

                </td>

                </tr>

			 

			 

			 <?php $i++; } if($total_rows>$limit) { ?>

			 

			 <tr class="debit"><td colspan="<?php echo $colspan; ?>" height="35" align="center" valign="middle"><?php echo $page_link; ?></td></tr>

			 

			 <?php  } } else { ?>

			 

			<tr class="even">

			<td colspan="8" align="center" valign="middle"><?php echo NO_FOUND_IN_WALLET; ?>.</td>

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