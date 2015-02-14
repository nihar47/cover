<div id="headerbar">
	<div class="wrap930">
      	<div class="login_navl">
			
			 <div style="margin:15px 0px 0px 0px; float:left;">
         
         <span style="text-transform:capitalize;color:#2B5F94;font-size:17px; font-weight:bold;">  <?php echo MANAGE_ACCOUNT_BELOW; ?> : </span>
          
		  <?php echo YOUR_NAME_DISPLAYED_TO_PEOPLE_YOU_SHARE_YOUR_FUND; ?>
		 
		   </div>
		   	
		   
         
		   	   
		  </div>
		<div class="clear"></div>
	</div>
</div> 
<div id="container">
<div class="wrap930" style="text-align:center;padding:25px 0px 5px 0px;">
		
	<!--side bar user panel-->

<?php echo $this->load->view('default/dashboard_sidebar'); ?>

<!--side bar user panel-->

<div class="con_left2" style="min-height:0px; width:690px; margin-right:0px;">
	<style type="text/css">
	.s_lleft
	{	
		width:198px !important;
	}
	.s_right {		
		width: 355px !important;		
	}
	
	</style>
   
		<style type="text/css">

#tab_all a{ color:#000000; text-decoration:none; }

</style>				

<div id="tab_all" style=" margin-left:10px;">
	
     
     <?php echo anchor('stored_card','<h3 class="h3notsel">'.VERIFY_PAYPAL_TAB.'</h3>'); ?>
		
	&nbsp;
</div>   
			 
           			
              



				<div class="inner_content" style=" margin-top:11px;padding:12px; ">
                 
                
                
                  
			   <?php  if($error != '') {
               
               if($error=='fail') { ?>     
            <div id="msg" align="center"><span>
                <?php echo CREDIT_CARD_AUTH_FAILED; ?>
            </span></div><div class="clear"></div> 
            <?php }   elseif($error=='update') {  ?>
                    
                    
               <div id="msg" align="center"><span style="color:#00CC00;">
                <?php echo ACCOUNT_VARIFIED_SUCCESSFULLY; ?>
            </span></div>   
             <div class="clear"></div>           
                  <?php } else { ?> <div id="msg" align="center"><span>
                <?php echo $error; ?>
            </span></div>
            <div class="clear"></div> 
            <?php  } } ?>


				
				<?php
				$attributes = array('name'=>'frm_verify_paypal');
					echo form_open_multipart('stored_card/',$attributes); ?>
					
					
			
                   
               
                   
                   <div class="s_lleft">
                      <label><?php echo PAYPAL_ADDRESS; ?> : <span style="color:#f00;">*</span></label></div>
                      <div class="s_right"><span >
                      <input type="text" name="card_paypal_email" id="card_paypal_email"  value="<?php echo $card_paypal_email; ?>"  class="btn_input"/>
                      </span></div>
                  <div class="clear"></div>
				  
				    <div class="s_lleft">&nbsp;</div>
				  <div class="s_right" style="font-size:10px; text-align:left; "><?php echo VALID_PAYPAL_REQUIRED_TEXT; ?> </div>
					
                  <div class="clear"></div>
                  
                   
                   
               <div class="s_lleft"> &nbsp;</div>
					   
						 <div class="s_right">					
						
                        <?php if($card_paypal_verify==0) { ?> 
						<input type="submit" class="submit" style="font-weight:bold;" name="login" id="login" value="<?php echo SAVE_CHANGES; ?>"  /><?php } ?>
					
						<input type="button" onClick="location.href='<?php echo site_url('home/dashboard');?>'" class="submit" style="font-weight:bold; margin-left:8px;" name="login" id="login" value="<?php echo CANCEL; ?>"   />
                        
                        
																	
						</div>
						
           <div class="clear"></div>
					
                    
                      <div align="right" style="font-size:10px; padding-right:15px; color:#f00;"><?php echo FIELD_MARKED_REQUIRED; ?></div>
					 <div class="clear"></div>
                    
					  </form>
					
               
               
            
			</div>
			
            			 
				
    </div>
	
	<!--con left2-->
	  
	  
	  </div>
	  </div>