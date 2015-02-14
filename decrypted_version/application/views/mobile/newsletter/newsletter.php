<div data-role="header" data-position="inline">
	<h1><?php echo SUBSCRIBE_FOR_NEWLETTER; ?></h1>
	<?php echo anchor('home','Home','class="ui-btn-right"'); ?>
</div>

 <?php if($error=='user_exists') { ?>
 
  <h2><?php echo ERROR_SUBSCRIPTION; ?></h2>
    
	<div><?php echo sprintf(USER_EMAIL_ALREADY_ALREDY_SUBSCRIBE,$subscribe_email); ?> </div>
	
 
 <?php } if($error=='not_found') { ?>
 
  <h2><?php echo ERROR_SUBSCRIPTION; ?></h2>
    
	<div>  <?php echo sprintf(USER_EMAIL_NOT_FOUND ,$subscribe_email); ?> </div>
	
 
 <?php }   if($error=='successfull') { ?>
 
 
 	 <h2><?php echo SUCCESSFULL_SUBSCRIBE; ?></h2>
    
	<div><?php echo sprintf(SUBSCRIBE_OUR_NEWS_LETTER,$subscribe_email) ;?></div>
	
	
	
 
 <?php } ?>

<script type="text/javascript" language="javascript">
				function newsletter_remove()
				{
					if(document.getElementById('subscribe_email').value == "<?php echo ENTER_EMAIL; ?>" || document.getElementById('subscribe_email').value == "<?php echo ENTER_EMAIL; ?>" || document.getElementById('subscribe_email').value == "<?php echo ENTER_VALID_EMAIL; ?>")
					{
						document.getElementById('subscribe_email').value = "";
					}
				}
				function newsletter_reset()
				{
					if(document.getElementById('subscribe_email').value == "")
					{
						document.getElementById('subscribe_email').value = document.getElementById('newsletter_val').value;
						//document.getElementById('subscribe_email').value == "<?php //echo ENTER_VALID_EMAIL; ?>"
					}
				}
				function newsletter_validate()
				{
					var con =0;
					
					if(document.getElementById('subscribe_email').value == "" || document.getElementById('subscribe_email').value == "Enter email" || document.getElementById('subscribe_email').value == "<?php echo ENTER_EMAIL; ?>" || document.getElementById('subscribe_email').value == "<?php echo ENTER_VALID_EMAIL; ?>")
					{		 
						
						//document.getElementById('subscribe_email').value = "<?php //echo ENTER_EMAIL; ?>";
						//document.getElementById('newsletter_val').value = "<?php //echo ENTER_EMAIL; ?>";
						
						document.getElementById('subscribe_email').value = "<?php echo ENTER_VALID_EMAIL; ?>";
						document.getElementById('newsletter_val').value = "<?php echo ENTER_VALID_EMAIL; ?>";
						
											
						return false;
					}else{
						
						var pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;    
						var str=document.getElementById('subscribe_email').value;
						if(str.test(pattern))
						{  						
							
								document.frmsearch.submit();
							
						}
						else
						{
							
							document.getElementById('subscribe_email').value = "<?php echo ENTER_VALID_EMAIL; ?>";
							document.getElementById('newsletter_val').value = "<?php echo ENTER_VALID_EMAIL; ?>";
							
							
						}
					}
				}
			</script>
<?php
		$attributes = array('name'=>'frmnewsletter', 'onsubmit'=>'return newsletter_validate()','autocomplete'=>'off');
		echo form_open('newsletter/subscribe/',$attributes);
?>
 
	<div class="pad15">   
 		<h2><span id="s1postJ"><?php echo SUBSCRIBE_FOR_NEWLETTER; ?></span></h2>
        
        

		<div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
			<label class="ui-input-text" for="name">Email:</label>  
            <input type="text" name="subscribe_email" id="subscribe_email" class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset" onblur="newsletter_reset()" onfocus="newsletter_remove()" value="<?php echo ENTER_EMAIL; ?>" />
		</div>

       <div style="width:47%;"> 
	   <input type="hidden" name="newsletter_val" id="newsletter_val" value="<?php echo ENTER_EMAIL; ?>"/>
        <input type="submit" name="submit_newsletter" class="submbg2" value="<?php echo SUBSCRIBE;?>" id="submit_newsletter" >
 	   </div>
	 
	</div>
    
</form>