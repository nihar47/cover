<div id="container">
<div class="wrap930">	

<div class="con_left2">   
	<h3 class="stitle"><?php echo HAVE_DIFFERENT_QUESTION; ?> </h3>
          <div align="center" class="inner_content" style="margin-top:10px;">                       
          
           
			<?php
				$attributes = array('name' => 'frm_contact');
				echo form_open('home/contact_us', $attributes);
				
			?>
              
			  <table border="0" cellpadding="0" cellspacing="0"  align="center" >
			  <?php if($error!='') { ?>
			    <tr><td  align="center" valign="top" colspan="2" style="color:#FF0000;" class="error" > <?php echo $error; ?></td></tr>
				<?php } ?>
			  <tr><td colspan="2" height="4">&nbsp;</td></tr>
			  
			  <tr>  <td align="center" valign="top">
			 
                <label style="color:#000;"><?php echo CONTACT_US_NAME; ?> <span style="color:#f00; ">*</span> : </label></td>  <td align="left" valign="top">
                <span onmouseover="show_bg('yname')" onmouseout="hide_bg('yname')"><input type="text" name="yname" id="yname" onfocus="show_bg('yname')" onblur="hide_bg('yname')" value="<?php echo $yname; ?>" style="width:220px; line-height:24px;" /></span>
             
			  </td>  </tr>
			  
			  <tr><td colspan="2" height="4">&nbsp;</td></tr>
			  
			  <tr>  <td align="center" valign="top">
			                
              
                <label style="color:#000;"><?php echo CONTACT_US_EMAIL; ?> <span style="color:#f00; ">*</span> : </label></td>
				<td align="left" valign="top">
                <span onmouseover="show_bg('yemail')" onmouseout="hide_bg('yemail')"><input type="text" name="yemail" id="yemail" onfocus="show_bg('yemail')" onblur="hide_bg('yemail')" value="<?php echo $yemail; ?>" style="width:220px; line-height:24px;" /></span>
             
			  
			  </td>  </tr>
			  <tr><td colspan="2" height="4">&nbsp;</td></tr>
			  
			  <tr> <td align="center" valign="top">
			  
              
                <label style="color:#000;"><?php echo CONTACT_US_MESSAGE; ?> <span style="color:#f00; ">*</span> : </label></td><td align="left" valign="top">
                <span onmouseover="show_bg('message')" onmouseout="hide_bg('message')"><textarea name="message" id="message" onfocus="show_bg('message')" onblur="hide_bg('textarea')" style="width:210px;" rows="5" ><?php echo $message; ?></textarea></span>
             
			  </td> </tr>
			  
			  <tr><td colspan="2" height="8">&nbsp;</td></tr>
			  
			  <tr><td align="center">&nbsp;</td> <td align="left" valign="top">
              <div id="post" >
              <input type="submit" name="contact" id="contact" value="<?php echo SEND; ?>" class="submit" />
              
             </div>
			  </td></tr></table>
            </form>
			
		
          </div>
       
       
	   </div>
	   
	
  <!--====================left end==============--> 