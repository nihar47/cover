<div data-role="header" data-position="inline">
	<h1><?php echo MY_WALLET; ?></h1>
	<?php echo anchor('home','Home','class="ui-btn-right"'); ?>
	
</div>
<div class="pad15">
<div id="s1post"><?php echo MY_WALLET; ?>( <?php	if($total_wallet_amount >=0){	echo set_currency($total_wallet_amount); } else{ echo '-'.set_currency(str_replace('-','',$total_wallet_amount)); }	?>)</div>
<div class="marTB5">
		<?php //echo anchor('wallet/add_wallet',ADD_WALLET,'style="font-weight:bold; color:#009900;font-size:13px !important;"');?> <!--&nbsp;|&nbsp;-->
      
        <?php if($total_wallet_amount>$wallet_setting->wallet_minimum_amount) { ?>
            <?php //echo anchor('wallet/my_withdraw',MY_WITHDRAWAL,'style="font-weight:bold; color:#009900;font-size:13px !important;"');?><!--&nbsp;|&nbsp;-->
            <?php //echo anchor('wallet/withdraw_wallet',WITHDRAW_AMOUNT,'style="font-size:13px !important; color:#009900;"');?>
          
         <?php } ?>
    </div>

	<table width="100%" cellspacing="1" cellpadding="5" border="0" align="left" id="wallet_table">
                 
         <tbody>
         
             <tr>
			 	<th>Amount</th>
                <th>Project</th>
				<th><?php echo DATE_ADDED;?></th>
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
				
                <td valign="middle" align="right"><?php if($rs->credit>0) { echo "-".number_format($rs->credit,2); } if($rs->debit>0) { echo "+".number_format($rs->debit,2); } ?></td>    
				   
                <td valign="middle" align="center">
                <?php 
					if($rs->project_id=='' || $rs->project_id==0 || $rs->project_id=='0') { } else { 
                    	$project_detail=$this->project_model->get_project_user($rs->project_id);
						if($project_detail) { 
							if($project_detail['project_title'] != ''){
								echo anchor('projects/'.$project_detail['url_project_title'],substr(ucfirst($project_detail['project_title'] ),0,20),'class="fpass"');
							}
						}     
                    }
				?> 
                </td> 
				<td valign="middle" align="center">
					<?php 
					echo date($site_setting['date_format'],strtotime($rs->wallet_date));
					 ?>
				</td>
				
            </tr>                
            <?php $i++;} if($total_rows>$limit) { ?>
			 
			 <tr class="debit"><td colspan="3" height="35" align="center" valign="middle"><?php echo $page_link; ?></td></tr>
			 
			 <?php  } } else { ?>
            <tr class="review"><td colspan="3"><?php echo "No record found"; ?>.</td></tr>
            <?php  } ?>                
     
    </tbody>
    </table>
	

</div>


