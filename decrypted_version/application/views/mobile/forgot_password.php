<?php
	$attributes = array('name'=>'forgetForm','id'=>'forgetForm');
	echo form_open('home/forget_password',$attributes);
?>
         
    <div data-role="header">
           <h1>Forgot Password</h1>
           <?php echo anchor('home','Home','class="ui-btn-right"'); ?>
    </div>
    
	<div class="pad15">   
 		<h2><span id="s1postJ">Forgot Password</span></h2>
		
	
  		<?php if($error!='') { ?>
				<div id="msg">
					<ul>
						<?php  echo $error; ?>
					</ul>
				</div>
   		<?php  } ?>

		<div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
			<label class="ui-input-text" for="name">Email:</label>
            <input type="text" name="email2" id="email2" value="" class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset"   />
            
		</div>
		
         
	    <div style="width:69%;"> 
        <input type="submit" value="<?php echo SUBMIT; ?>" class="submbg2" name="forgetbtn" id="forgetbtn" />
         </div> 
		<?php echo anchor('home/login','Back To Login','class="fpass"'); ?>
	</div>
    
</form>
