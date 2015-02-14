<section>
	<div style="border:none;" class="usersectiion">
		<div id="page_we">
		<h2 class="pname">Edit Settings</h2>
		
		<ul class="accountul">
			<li><?php echo anchor('home/profile_detail',PROFILE_DETAIL) ?></li>
			<li><?php echo anchor('home/account',ACCOUNT_SETTING) ?></li>
			<li><?php echo anchor('user/email_setting',NOTIFICATIONS) ?></li>
			<li><?php //echo anchor('settings/paypal',PAYPAL,'id="accsel"'); ?></li>
			
		</ul>
		</div>
		
	</div>
	<div id="page_we">
	<div class="user_detail">
		<?php 			  
			   
			  		$msgt='';
					if($msg != "")
					{
						if($msg == 'success')
						{
							$msgt = '<span style="color:#7DBF0F;">'.ACCOUNT_VARIFIED_SUCCESSFULLY.'</span>';
						}
						
				?>
				
				
				
				<?php } else { ?>
			
				
				<?php }	?>

                <p style="color:#f00;"><?php  echo $msgt; ?></p>
				 <?php  if($error!='') { ?>	<div align="center" class="error"><ul><?php	echo $error; ?></ul></div> <br/><br/><?php } ?>   
		<div class="usercont">
		
		<div class="user_cont_left">
        
        
                
        <?php
				$attributes = array('name'=>'frm_verify_paypal');
					echo form_open_multipart('settings/paypal/'.$attributes); 
					?>
                    
                
			
			<label class="label2" style="margin:10px 0 20px 0;"><?php echo FIRST_NAME; ?> :</label>
			 <input type="text" name="user_name" id="user_name" value="<?php echo $user_name; ?>"  class="textbx2" style="margin:0;"/>
			<div class="clr"></div>
            
            <label class="label2" style="margin:10px 0 20px 0;"><?php echo LAST_NAME; ?> :</label>
			 <input type="text" name="last_name" id="last_name" value="<?php echo $last_name; ?>"  class="textbx2" style="margin:0;"/>
			<div class="clr"></div>
            
             <label class="label2" style="margin:10px 0 20px 0;"><?php echo PAYPAL_ADDRESS; ?> :</label>
			 <input type="text" name="paypal_email" id="paypal_email" value="<?php echo $paypal_email; ?>"  class="textbx2" style="margin:0;"/>
              <label style="font-size:10px; float:right;"><?php echo VALID_PAYPAL_REQUIRED_TEXT; ?></label>
						
		</div>
		
		<div class="user_cont_left" style="float:right; border:none">
			
			<label class="label2" style="margin:10px 0 0px 0;"><?php echo getUserProfileName()?></label>
            
           <?php $user_detail=get_user_detail(get_authenticateUserID());
		
			if(is_file('upload/thumb/'.$user_detail['image']))
						{
							$img = $user_detail['image'];
						}else{
							$img = NO_MAN;
						}
			
		 ?>
		<div class="imagediv">
			<?php 	
					if(is_file('upload/thumb/'.$user_detail['image'])){
						?> <img src="<?php echo base_url().'upload/thumb/'.$img; ?>" alt=""class="uimgimg"/><?php
					}
				 elseif($user_detail['fb_uid']!='' && $user_detail['fb_uid']>0) { ?>
				    <img src="http://graph.facebook.com/<?php echo $user_detail['fb_uid']; ?>/picture?type=large" alt="" class="uimgimg"/>
				<?php } else { ?>
               				<img src="<?php echo base_url().'upload/thumb/'.$img; ?>" alt="" class="uimgimg" />
				<?php } ?>
			
			
			
			
		</div>
		
        </div>
		
		</div>
       <input type="submit" value="Verify Paypal" class="oresubmit1"  />  
        </form>
	</div>
    </div>
	
	
</section>