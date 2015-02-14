

<style type="text/css">

			  

.error p { color:#FF0000; }



#wallet_table { background-color:#cccccc; }

#wallet_table th {background-color: #F3F2F2;

padding: 3px;

font-weight: bold;

color: #333; text-align:center;}

.even { background:#FFFFFF; color:#000000; height:20px; }







.review { background-color:#FFCECE; color:#000000; height:20px; }



</style>







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

		

		<span style="float:left;"><?php echo MY_WITHDRAW; ?></span>

		

		

		 <span style="float:right; height:35px;  font-size:12px;">

			  <table border="0" cellpadding="0" cellspacing="0">

			  <tr>

			 

			 <td align="right" valign="top"><?php echo anchor('wallet/my_wallet',MY_WALLET.'('.set_currency($total_wallet_amount).')','style="font-weight:bold; color:#009900;font-size:13px !important;"');?></td>

			   <td width="10">&nbsp;|&nbsp;</td>

			    <td align="right" valign="top"><?php echo anchor('wallet/add_wallet',ADD_WALLET,'style="font-weight:bold; color:#009900;font-size:13px !important;"');?></td>

			  

			

			 <?php if($total_wallet_amount>$wallet_setting->wallet_minimum_amount) { ?>

			  <td width="10">&nbsp;|&nbsp;</td>

			 <td align="right" valign="top"><?php echo anchor('wallet/withdraw_wallet',WITHDRAW_AMOUNT,'style="font-size:13px !important; color:#009900;"');?></td>

			 <?php } ?>

			 

			 </tr>

			 </table>

			 

			 </span>

			 

		</h3>

		





             

			 <?php if($msg!='') {  if($msg=='success') { ?>

			 <div style="clear:both; margin-top:20px;"></div>

			  <div class="error" style="color:#FF0000;"><?php echo WITHDRAW_REQUESTED_SUBMITTED_SUCCESSFULLY_WAIT_FOR_ADMIN_APPROVAL;?></div>		

			  <div style="clear:both; margin-top:20px;"></div>

			  <?php } if($msg=='update') { ?>

			  <div style="clear:both; margin-top:20px;"></div>

			   <div class="error" style="color:#FF0000;"><?php echo WITHDRAW_REQUESTED_UPDATED_SUCCESSFULLY_WAIT_FOR_ADMIN_APPROVAL; ?></div>

			   <div style="clear:both; margin-top:20px;"></div>

			  <?php }  } ?>

			  

			  

			  

			 

			 

			 <div style="clear:both;"></div> 

			  

			 <table border="0" align="left" cellpadding="0" cellspacing="1" width="100%" id="wallet_table">

			 

			 <tr>			

			 <th><?php echo AMOUNT; ?></th>			 

			  <th><?php echo GATEWAY; ?></th>

			 <th><?php echo DATE_ADDED; ?></th>

			 <th><?php echo STATUS; ?></th>

			 <th><?php echo ACTION; ?></th>

			</tr>

			 

			 <?php

			 

			 if($withdraw_details) {

			 

			 $i=0;

			 	foreach($withdraw_details as $rs) { 

				

				

				

				if($rs->withdraw_status=='pending')

				{

					$cls='review';				

				}

				else

				{

					$cls='even';

				}			

				

				?>

				

				<tr class="<?php echo $cls; ?>">

				<td align="right" valign="middle" style="padding-right:8px;"><?php echo set_currency($rs->withdraw_amount);  ?></td>

				<td align="center" valign="middle" ><?php if($rs->withdraw_method=='bank') { echo NET_BANKING; } if($rs->withdraw_method=='check') { echo "Check"; } if($rs->withdraw_method=='gateway') { echo GATEWAY; } ?>  </td>

				

				

				<td align="center" valign="middle"><?php echo date('d,M Y H:i:s',strtotime($rs->withdraw_date)); ?></td>

				

				

				

				

		<td align="center" valign="middle" style="text-transform:capitalize;"><?php echo $rs->withdraw_status; ?></td>

				

				

				<td align="center" valign="middle"><?php if($rs->withdraw_status=='pending') { echo anchor('wallet/withdraw_details/'.$rs->withdraw_id,'View'); } else { echo anchor('wallet/withdrawal_detail/'.$rs->withdraw_id,'View'); }?></td>

			

				</tr>

			 

			 

			 <?php $i++; } if($total_rows>$limit) { ?>

			 

			 <tr class="even"><td colspan="8" height="35" align="center" valign="middle"><?php echo $page_link; ?></td></tr>

			 

			 <?php  } } else { ?>

			 

			<tr class="even">

			<td colspan="5" align="center" valign="middle"><?php echo NO_WITHDRAWAL_IN_WALLET; ?>.</td>

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