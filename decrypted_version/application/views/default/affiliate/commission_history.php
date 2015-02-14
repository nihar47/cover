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
  

  
 	<h3 id="dropmenu2"><?php echo AFFILIATE_COMMISSION_HISTORY; ?> </h3>
    <div class="clear"></div> 
         
   <!---commission part-->



	 <?php if($commission){        ?>
        <div id="recent-donate-detail">
          <table border="0" cellpadding="1" cellspacing="1" width="665" style="background-color: #cccccc;">
            <tr>
              <td class="donate_header" align="center" valign="top" width="100"><?php echo CREATED;?></td>
              <td class="donate_header" align="center" valign="top"><?php echo USER_PROJECT;?></td>
              <td class="donate_header" align="center" valign="top"><?php echo TYPE;?></td>
              <td class="donate_header" align="center" valign="top" width="100"><?php echo STATUS;?></td>
              <td class="donate_header" align="center" valign="top"><?php echo EARN;?> (<?php echo $site_setting['currency_symbol'];?>)</td>
            </tr>
            <?php
				  	$i = 0;
					if($commission)
					{
						foreach($commission as $cmh)
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
					
					$orig_date=explode(' ',$cmh->earn_date);
					
					echo date($site_setting['date_format'],strtotime($orig_date[0])); ?></td>
             
             
              <td  class="donate_td" align="center" valign="top"><?php 
			  
								  	if($cmh->project_id>0)
									{
										
										echo ucwords($cmh->project_title);
									
									}
									
									if($cmh->referral_user_id>0)
									{
										
										echo ucwords($cmh->user_name.' '.$cmh->last_name);
									
									}
			  
			    ?></td>
              <td  class="donate_td" align="center" valign="top"><?php 
			  if($cmh->transaction_id!='') { echo "Pledge"; } 
			  elseif($cmh->project_id>0){ echo "Project Listed"; } 
			  elseif($cmh->referral_user_id>0){ echo "Sign Up"; } ?></td>
           
            
              <td  class="donate_td" align="center" valign="top"><?php if($cmh->earn_status == 1){ echo "Completed"; }elseif($cmh->earn_status == 2){ echo "Cancelled"; }else{ echo "Pending"; } ?></td>
             
              <td  class="donate_td" align="center" valign="top"><?php echo $cmh->earn_amount; ?></td>
          
              
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
        <div align="center"><?php echo NO_COMMISSION_YOU_HAVE_EARN_YET;?></div>
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