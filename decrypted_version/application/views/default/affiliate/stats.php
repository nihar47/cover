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
  
  
  
  <?php if($affiliate_request->approved==0) {   ?>
  
   <div id="msg" align="center"><span style="color:#009900; font-weight:bold;"><?php echo REQUEST_SENT_SUCCESSFULLY_TO_ADMINISTRTOR_WAIT_UNTIL_ADMINISTRATOR_aPPROVE_IT;?></span></div>
    <div class="clear" style="height:15px;"></div> 
  
  <?php } elseif($affiliate_request->approved==2) {  ?>
  
   <div id="msg" align="center"><span style="color:#FF0000;font-weight:bold;"><?php echo YOUR_AFFILLIATE_REQUEST_REJECTED_BY_ADMINISTRATOR;?></span></div>
   <div class="clear" style="height:15px;"></div> 
  
  <?php } else { ?>
  
 
 <?php if($user_info['unique_code']!='') { ?>
	
    
      <div class="clear" style="height:20px;"></div> 
      
    <h3 id="dropmenu2" style="font-size:13px !important; padding:0px;"><?php echo SHARE_YOUR_BELOW_LINK_FOR_REFERRAL_PURPOSES;?> :</h3> 
	<input type="text" value="<?php echo site_url('invited/'.$user_info['unique_code']); ?>" readonly="readonly" style="padding:5px; width:400px;" />
 
    <div class="clear"></div> 
 	<h3 id="dropmenu2"><?php echo AFFILIATE_STATS; ?> </h3>
    <div class="clear"></div> 
         
        
          <!---stats table-->         
          <style type="text/css">
		  #stats_table {
		  	background:#ccc;
		  }
		 .stats_table_title {
		  	background:#F3F2F2;
		  }
		  .stats_table_inner { background:#ccc;}
		  
		 #stats_table tr, .stats_table_inner tr {	background:#F3F2F2; }
		  </style>
                
      <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" >

                              <tr >

                                <td width="40%" height="30"></td>

                                <td width="15%" align="center" class="stats_table_title" style="border-top:1px solid #ccc;  border-left:1px solid #ccc; "><strong><?php echo TODAY;?></strong></td>

                                

                                <td width="15%" align="center" class="stats_table_title" style="border-right:1px solid #ccc; border-top:1px solid #ccc; border-left:1px solid #ccc; "><strong><?php echo THIS_WEEK;?></strong></td>

                             

                                <td width="15%" align="center" class="stats_table_title" style="border-right:1px solid #ccc; border-top:1px solid #ccc; "><strong><?php echo THIS_MONTH;?></strong></td>

                               

                                <td width="15%" align="center" class="stats_table_title"  style="border-right:1px solid #ccc; border-top:1px solid #ccc; "><strong><?php echo TOTAL;?></strong></td>

                                

                              </tr>

                              <tr>

                                <td colspan="5">
                                
                                <table width="100%" cellpadding="0"  cellspacing="1" class="stats_table_inner">

                                    <tr >

                                      <td width="20%" height="28" align="center"  rowspan="4" class="stats_table_title"><strong><?php echo AFFILIATES;?></strong></div></td>

                                      <td width="20%"  align="center"  height="28" class="stats_table_title"><div><strong><?php echo PENDING;?> (<?php echo $site_setting['currency_symbol']; ?>)</strong></div></td>

                                      <td width="15%" align="center"><?php echo $affiliate_pending_today; ?></td>

                                     

                                      <td width="15%" align="center" ><?php echo $affiliate_pending_week; ?></td>

                                    

                                      <td width="15%" align="center" ><?php echo $affiliate_pending_month; ?></td>

                                    

                                      <td width="15%" align="center" ><?php echo $affiliate_pending_total; ?></td>

                                    

                                    </tr>

                                    <tr>

                                      <td height="28" align="center" class="stats_table_title"><div><strong>Cancelled (<?php echo $site_setting['currency_symbol']; ?>)</strong></div></td>

                                      <td align="center" ><?php echo $affiliate_cancel_today; ?></td>

                                     

                                      <td align="center" ><?php echo $affiliate_cancel_week; ?></td>

                                      

                                      <td align="center" ><?php echo $affiliate_cancel_month; ?></td>

                                      

                                      <td align="center" ><?php echo $affiliate_cancel_total; ?></td>

                                     

                                    </tr>
                                    
                                     <tr>

                                      <td height="28" align="center" class="stats_table_title"><div><strong><?php echo PIPELINE;?> (<?php echo $site_setting['currency_symbol']; ?>)</strong></div></td>

                                      <td align="center" ><?php echo $affiliate_pipeline_today; ?></td>

                                    

                                      <td align="center" ><?php echo $affiliate_pipeline_week; ?></td>

                                     

                                      <td align="center" ><?php echo $affiliate_pipeline_month; ?></td>

                                    

                                      <td align="center" ><?php echo $affiliate_pipeline_total; ?></td>

                                    

                                    </tr>
                                    
                                    
                                     <tr>

                                      <td height="28" align="center" class="stats_table_title"><div><strong><?php echo COMPLETED;?> (<?php echo $site_setting['currency_symbol']; ?>)</strong></div></td>

                                      <td align="center" ><?php echo $affiliate_completed_today; ?></td>

                                     

                                      <td align="center" ><?php echo $affiliate_completed_week; ?></td>

                                     

                                      <td align="center" ><?php echo $affiliate_completed_month; ?></td>

                                    

                                      <td align="center" ><?php echo $affiliate_completed_total; ?></td>

                                    

                                    </tr>
                                    
                                    

                                    

                                    

									
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    <tr>

                                      <td height="28" align="center"  rowspan="5" class="stats_table_title"><div><strong><?php echo AFFILIATE_WITHDRAW_REQUEST;?></strong></div></td>

                                      <td height="28"  align="center" class="stats_table_title"><div><strong><?php echo PENDING;?></strong></div></td>

                                      <td  align="center" ><?php echo $affiliate_withdraw_request_pending_today; ?></td>

                                      

                                      <td  align="center" ><?php echo $affiliate_withdraw_request_pending_week; ?></td>

                                     

                                      <td align="center"  ><?php echo $affiliate_withdraw_request_pending_month; ?></td>

                                    

                                      <td  align="center" ><?php echo $affiliate_withdraw_request_pending_total; ?></td>

                                   

                                    </tr>

                                    <tr>

                                      <td height="28" align="center" class="stats_table_title"><div><strong><?php echo APPROVED;?></strong></div></td>

                                      <td  align="center" ><?php echo $affiliate_withdraw_request_approved_today; ?></td>

                                      

                                      <td  align="center" ><?php echo $affiliate_withdraw_request_approved_week; ?></td>

                                      

                                      <td  align="center" ><?php echo $affiliate_withdraw_request_approved_month; ?></td>

                                      

                                      <td  align="center" ><?php echo $affiliate_withdraw_request_approved_total; ?></td>

                                     

                                    </tr>
                                    
                                    <tr>

                                      <td height="28" align="center" class="stats_table_title"><div><strong><?php echo REJECT;?></strong></div></td>

                                      <td  align="center" ><?php echo $affiliate_withdraw_request_reject_today; ?></td>

                                     

                                      <td  align="center" ><?php echo $affiliate_withdraw_request_reject_week; ?></td>

                                     

                                      <td  align="center" ><?php echo $affiliate_withdraw_request_reject_month; ?></td>

                                    

                                      <td align="center"  ><?php echo $affiliate_withdraw_request_reject_total; ?></td>

                                    

                                    </tr>
                                    
                                    <tr>

                                      <td height="28" class="stats_table_title" align="center"><div><strong><?php echo SUCCESS;?></strong></div></td>

                                      <td  align="center" ><?php echo $affiliate_withdraw_request_success_today; ?></td>

                                      

                                      <td  align="center" ><?php echo $affiliate_withdraw_request_success_week; ?></td>

                                     

                                      <td  align="center" ><?php echo $affiliate_withdraw_request_success_month; ?></td>

                                   

                                      <td  align="center" ><?php echo $affiliate_withdraw_request_success_total; ?></td>

                                     
                                    </tr>                                    
										
                                        
                                      <tr>

                                      <td height="28" class="stats_table_title" align="center"><div><strong><?php echo FAIL;?></strong></div></td>

                                      <td  align="center" ><?php echo $affiliate_withdraw_request_fail_today; ?></td>

                                     

                                      <td  align="center" ><?php echo $affiliate_withdraw_request_fail_week; ?></td>

                                   

                                      <td  align="center" ><?php echo $affiliate_withdraw_request_fail_month; ?></td>

                                    

                                      <td  align="center" ><?php echo $affiliate_withdraw_request_fail_total; ?></td>

                                   

                                    </tr>
                                    
                                    
                                      
                                  </table></td>

                              </tr>

                            </table>    
                            
                            
                       <!---stats table-->         
              
 
 
 <?php  } ?>
 
 
 
  
  <?php } ?>
  
  
  
      
       <!--noop-->
     </div>
		</div>
        <div class="clear"></div>		
				
				
					</div>
	<!-- left end ------>
		
       </div>