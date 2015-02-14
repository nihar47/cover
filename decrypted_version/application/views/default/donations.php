<div id="headerbar">
  <div class="wrap930">
    <!-- dd menu -->
    <div class="login_navl">
      <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
          <td align="left" ><div class="project_title_hd" style="padding-top:15px;" > <span style="text-transform:capitalize;color:#2B5F94;font-size:17px;"><?php echo $this->session->userdata('project_title'); ?></span> </div></td>
          <td align="right" ><div class="project_title_hd" style="padding-top:15px; "  > <span id="sddm" style="float:right;">
              <?php if($this->session->userdata['project_id']!='' && $this->session->userdata['project_id']!=0) {  ?>
              <?php echo anchor('user/my_project/',CHANGE_PROJECT,' style="text-transform:capitalize;color:#2B5F94;font-size:17px;text-decoration:none;" '); ?>
              <?php } ?>
              </span> </div></td>
        </tr>
      </table>
    </div>
    <div class="clear"></div>
  </div>
</div>
<div id="container">
  <div class="wrap930" style="padding:15px 0px 20px 0px;">
    <!--side bar user panel-->
    <?php echo $this->load->view('default/dashboard_sidebar'); ?>
    <!--side bar user panel-->
    <div class="con_left2" style="min-height:0px; width:690px; margin-right:0px;">
      <style type="text/css">

#tab_all a{ color:#000000; text-decoration:none; }

</style>
      <?php
	$data['tab_sel'] = DONATIONS;
	$this->load->view('default/overview_tabs',$data);

?>
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
      <div class="inner_content" style=" margin-top:11px;padding:12px; ">
        <h3 id="dropmenu2"><?php echo REVIEW_YOURS_DONORS_AND_DONATION_BELOW;?>. </h3>
        
       <h3>
		
		 <span style="float:right; height:35px;  font-size:12px;">
			 
             <table border="0" cellpadding="0" cellspacing="0">
			  <tr>
			 
			 <td align="right" valign="top"><b><?php echo PROJECT_GOAL;?> :</b> <?php echo set_currency($project['amount']);?></td>
			   <td width="10">&nbsp;|&nbsp;</td>
               <?php
			   if($project['amount_get'] !='')
			   {?>
			   <td align="right" valign="top"><b><?php echo TOTAL_RECIEVE_PAYMENT;?> :</b> <?php echo set_currency($project['amount_get']); ?></td>
			   <?php }
			   else {$project['amount_get']=0;?>
                     <td align="right" valign="top"><b><?php echo TOTAL_RECIEVE_PAYMENT;?> :</b> <?php echo set_currency($project['amount_get']); ?></td>
               <?php }?>
			
			 
			<?php $date1 =$project['end_date'];
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
             
        <div class="clear"></div>
        <?php if($donations){        ?>
        <div id="recent-donate-detail">
          <table border="0" cellpadding="1" cellspacing="1" width="650" style="background-color: #cccccc;">
            <tr>
              <td class="donate_header" align="center" valign="top" width="70"><?php echo DATE; ?></td>
              <td class="donate_header" align="center" valign="top"><?php echo DONOR; ?></td>
              <td class="donate_header" align="center" valign="top"><?php echo EMAIL; ?></td>
              <td class="donate_header" align="center" valign="top" width="100"><?php echo LOCATION; ?></td>
             <!-- <td class="donate_header" align="center" valign="top"><?php echo PAYEE_EMAIL; ?></td>-->
              <td class="donate_header" align="center" valign="top" ><?php echo PERK;?></td>
              <td class="donate_header" align="center" valign="top" width="70"><?php echo AMOUNT; ?><br/>
                (<?php echo $site_setting['currency_symbol'];?>)</td>
             <?php if($wallet_setting->wallet_payment_type == '1'){ ?>
             <th align="center" class="donate_header" ><?php echo DONATION_STATUS;?></th>
             <th align="center" class="donate_header" ><?php echo ACTION;?></th>
             <?php $colspan=9; } ?>    
               
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
              <td  class="donate_td" align="center" valign="top"><?php 
					
					if($dn['trans_anonymous']=='3'){
					
					$donar_user=get_user_detail($dn['user_id']);
					
					
					echo ANONYMOUS; ?>
              </td>
              <td  class="donate_td" align="center" valign="top"><?php echo ANONYMOUS; ?></td>
              <td  class="donate_td" align="center" valign="top"><?php echo ANONYMOUS;  ?></td>
             <!-- <td  class="donate_td" align="center" valign="top"><?php echo ANONYMOUS; ?></td>-->
              <?php }else{
				   
				   

					$query = $this->db->get_where("user",array("user_id"=>$dn['user_id']));
					$donar_user = $query->row_array();
					
					
					echo anchor('member/'.$dn['user_id'],ucfirst($donar_user['user_name'].' '.$donar_user['last_name']),'style="font-weight:bold;"'); ?>
              </td>
              <td  class="donate_td" align="center" valign="top"><?php echo $donar_user['email']; ?></td>
              <td  class="donate_td" align="center" valign="top"><?php 
					 
					
					
					 if($donar_user['city']!='') {					 
					 echo $donar_user['city'].',';
					 }
					 
					 
					 if($donar_user['state']!='') {					
					 echo $donar_user['state'];
					 }
					
					 
					 
					 
					 
					 
					  ?></td>
             <!-- <td  class="donate_td" align="center" valign="top"><?php echo ucfirst($dn['email']); ?></td>-->
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
              <td  class="donate_td" align="center" valign="top"><?php if($dn['trans_anonymous'] != '2' and $dn['trans_anonymous'] != '3'){ echo set_currency($dn['amount']);  } else { echo ANONYMOUS;  } ?></td>
              
                <?php if($wallet_setting->wallet_payment_type == '1'){ 
					$wallet_dn = $this->project_model->get_donation_wallet($dn['project_id'], $dn['wallet_transaction_id']);
				?>
                	<td  class="donate_td" align="center" valign="top"><?php if($wallet_dn){ if($wallet_dn['donate_status']=='1'){ echo CONFIRM; } else{    
					
					?>  <?php echo ONHOLD; ?><?php
					 } }else{ echo 'N/A'; } ?></td>
                	<td  class="donate_td" align="center" valign="top">
					<?php if($wallet_dn){ if($wallet_dn['project_id'] > 0){	
							if(strtotime(date('Y-m-d',strtotime($project['end_date']))) > strtotime(date('Y-m-d')) && $project['active']=='1' )
							{	
								echo anchor('wallet/delete_wallet_donation/'.$wallet_dn['id'],CANCEL); 
							} 
							elseif($rs->debit > 0){
								echo anchor('wallet/delete_wallet_donation/'.$wallet_dn['id'],CANCEL); 
							}
							else {
								echo 'N/A';
							}
						}
					 }else{ echo 'N/A'; } ?></td>
                <?php  }  ?>
                
            </tr>
            <?php			
							$i++;
						}
					}
				  ?>
          </table>
        </div>
        <div class="clear"></div>
        <div align="center"  style="line-height:20px;  font-size:11px;"><br/>
          <?php echo $page_link; ?></div>
        <div class="clear"></div>
        <?php } else { ?>
        <div class="clear"></div>
        <div align="center"><?php echo NO_DONATION; ?>.</div>
        <div class="clear"></div>
        <?php } ?>
      </div>
    </div>
    <div class="clear"></div>
  </div>
  <!-- left end ------>
</div>
