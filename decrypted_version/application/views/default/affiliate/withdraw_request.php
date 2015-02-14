<style type="text/css">
#error p{
	color:#FF0000;
}
#error span{
	color:#0000FF;
}
</style>

<div id="headerbar">
	<div class="wrap930">
	
	<!-- dd menu -->	
<div class="login_navl">
		
			
			
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tr><td align="left" >	
	<div class="project_title_hd" style="padding-top:15px;" >
	
	
	<span style="text-transform:capitalize;color:#2B5F94;font-size:17px;"><?php echo AFFILIATE_REQUEST; ?></span>
	
	</div>
	</td>
	<td align="right" >	
	
	<div class="project_title_hd" style="padding-top:15px; "  >
	<span id="sddm" style="float:right;">
		
		<?php if($this->session->userdata['project_id']!='' && $this->session->userdata['project_id']!=0) {  ?>
		
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

<?php echo $this->load->view('default/dashboard_sidebar'); ?>

<!--side bar user panel-->


<div class="con_left2" style="min-height:0px; width:690px; margin-right:0px;">
           			
              
<style type="text/css">

#tab_all a{ color:#000000; text-decoration:none; }

#sts:hover{ font-weight:bold; }
</style>				
			


<?php
	$data['select']=$select;

	$this->load->view('default/affiliate/tab',$data);

?>


     
      
 <div class="inner_content" style=" margin-top:11px;padding:12px; ">
		         
				
			
  <!--noop-->
   <div class="clear"></div> 
       <?php if($msg!='') { ?>
        <div style="clear:both; margin-top:20px;"></div>
       <?php if($msg=='success') { ?> <div align="left" class="success" style="color:#FFFFFF;">  
       <?php echo AFFILIATE_WITHDRAW_REQUEST_HAS_BEEN_ADDED_SUCCESSFULLY; ?></div>
		   <?php } if($msg=='fail') { ?>
           <div align="left" class="error">  
           <?php echo AFFILIATE_WITHDRAW_REQUEST_HAS_BEEN_CANCELLED; ?></div>
           <?php } ?>
        <div style="clear:both; margin-top:20px;"></div>
        <?php } ?>
        

  
 	<h3 id="dropmenu2"><span style="float:left;"><?php echo AFFILIATE_WITHDRAWAL_REQUESTS; ?></span><span style="float:right; height:35px;  font-size:12px;"> 
    
   
        
    
    <table border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td align="right" valign="top"><?php echo anchor('affiliate/add_request', AFFILIATE_ADD_REQUEST,'style="font-weight:bold; color:#009900;font-size:13px !important;"');?></td> </tr>
          </table></span></h3>
    
    
    <div class="clear"></div> 
         
   <!---commission part-->



	 <?php if($withdrawal_request){        ?>
        <div id="recent-donate-detail">
          <table border="0" cellpadding="1" cellspacing="1" width="665" style="background-color: #cccccc;">
            <tr>
              <td class="donate_header" align="center" valign="top" width="100"><?php echo REQUESTED_ON;?></td>
              <td class="donate_header" align="center" valign="top"><?php echo REQUESTED_AMOUNT;?> (<?php echo $site_setting['currency_symbol'];?>)</td>
              <td class="donate_header" align="center" valign="top"><?php echo TRANSACTION_FEES;?> (<?php echo $site_setting['currency_symbol'];?>)</td>
              <td class="donate_header" align="center" valign="top" width="100"><?php echo PAID_AMOUNT;?> (<?php echo $site_setting['currency_symbol'];?>)</td>
              <td class="donate_header" align="center" valign="top"><?php echo STATUS;?></td>
            </tr>
            <?php
				  	$i = 0;
					if($withdrawal_request)
					{
						foreach($withdrawal_request as $wrq)
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
					
					$orig_date=explode(' ',$wrq->withdraw_date);
					
					echo date($site_setting['date_format'],strtotime($orig_date[0])); ?></td>
                    
               <td  class="donate_td" align="center" valign="top"><?php echo $wrq->withdraw_amount; ?></td>
              
              
              <td  class="donate_td" align="center" valign="top"><?php $total_amount=$wrq->withdraw_amount;
			  
			  
			 $fees=$affiliate_setting->transaction_fee;
			 
			 $fee_type=$affiliate_setting->fee_type;
			  
			  
			  if($fee_type=='amount')
			  {
				  $total_fees=$fees;
			  }
			  else
			  {
			  	if($fees>0)
				{
			  		$total_fees=($total_amount*$fees)/100;
				}
				else
				{
					$total_fees=$fees;
				}
			  }
			  
			  echo number_format($total_fees,2);
			   ?></td>
                
                
                
             
              <td  class="donate_td" align="center" valign="top"><?php echo number_format($total_amount-$total_fees,2);  ?></td>
             
              <td  class="donate_td" align="center" valign="top">
              
              
              <?php 					
					if($wrq->withdraw_status == 1){ echo "Approved"; }
					elseif($wrq->withdraw_status == 2){ echo "Successed"; }
					elseif($wrq->withdraw_status == 3){ echo "Rejected"; }
					elseif($wrq->withdraw_status == 4){ echo "Failed"; }
					else{ echo "Pending"; } ?>
                                    
                 </td>
             
            
          
              
            </tr>
            <?php			
							$i++;
						}
					}
				  ?>
          </table>
  
  
  
  		 <div class="clear"></div>
        <div align="center"  style="line-height:20px;  font-size:11px;"><br/><?php echo $page_link; ?></div>
        <div class="clear"></div>
        <?php } else { ?>
        <div class="clear"></div>
        <div align="center"><?php echo NO_WITHDRAWAL_YOU_HAVE_REQUESTED_YET; ?></div>
        <div class="clear"></div>
        <?php } ?>
  
      
      <!---commission part-->
      
      
       <!--noop-->
     </div>
		</div>
        <div class="clear"></div>		
				
				
					</div>
	<!-- left end ------>
		
       </div>