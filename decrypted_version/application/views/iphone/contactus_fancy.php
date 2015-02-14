<link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>FundrisingCss.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.fancy_main{
	background-color:#2B5F94;
	border: 2px solid #2C6592;
    /*border-radius: 3px 3px 3px 3px;*/
	padding:10px;
}
.submit{
	text-transform:uppercase;
}

.inner_content{
margin-bottom:0px; padding:0px;
height:497px !important; 
width:530px !important;
height:499px; 
width:531px;
overflow:hidden;
}
</style>

<script>

function echeck(str) {

		var at="@"
		var dot="."
		var lat=str.indexOf(at)
		var lstr=str.length
		var ldot=str.indexOf(dot)
		if (str.indexOf(at)==-1){
		   //alert("Invalid E-mail ID")
		   return false
		}

		if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr){
		   //alert("Invalid E-mail ID")
		   return false
		}

		if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr){
		    //alert("Invalid E-mail ID")
		    return false
		}

		 if (str.indexOf(at,(lat+1))!=-1){
		   // alert("Invalid E-mail ID")
		    return false
		 }

		 if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot){
		   //alert("Invalid E-mail ID")
		    return false
		 }

		 if (str.indexOf(dot,(lat+2))==-1){
		    //alert("Invalid E-mail ID")
		    return false
		 }
		
		 if (str.indexOf(" ")!=-1){
		    //alert("Invalid E-mail ID")
		    return false
		 }

 		 return true					
	}


function form_validate(){
	var name = document.getElementById('yname');
	var emailid = document.getElementById('yemail');
	var message = document.getElementById('message');
	var que = document.getElementById('que');
	var about = document.getElementById('about');
	
	document.getElementById('name_err').innerHTML='';
	document.getElementById('email_err').innerHTML='';
	document.getElementById('msg_err').innerHTML='';
	document.getElementById('que_err').innerHTML='';
	document.getElementById('about_err').innerHTML='';
	
	if(name.value==''){
		document.getElementById('name_err').innerHTML='<?php echo PLEASE_ENTER_NAME; ?>';
		name.focus();
		return false;
	}
	
	if(emailid.value==''){
		document.getElementById('email_err').innerHTML='<?php echo PLEASE_ENTER_EMAIL; ?>';
		emailid.focus();
		return false;
	}
	if (echeck(emailid.value)==false){
		document.getElementById('email_err').innerHTML='<?php echo PLEASE_ENTER_VALID_EMAIL; ?>';
		emailid.focus();
		return false
	}
	
	if(que.value==''){
		document.getElementById('que_err').innerHTML='<?php echo PLEASE_ENTER_QUESTIONS; ?>';
		que.focus();
		return false;
	}
	
	if(message.value==''){
		document.getElementById('msg_err').innerHTML='<?php echo PLEASE_ENTER_MESSAGE; ?>';
		message.focus();
		return false;
	}
	
	
	
	if(about.value==''){
		document.getElementById('que_err').innerHTML='<?php echo PLEASE_ENTER_QUESTIONS_ABOUT; ?>';
		about.focus();
		return false;
	}
	
return true;
}


</script>

<div class="fancy_main">   
	
          <div align="center" class="inner_content" >                       
          <h3 class="stitle" style="text-align:left; line-height:0px; padding:0px;"> <img src="<?php echo base_url(); ?>images/contact.png" style="position:relative; top:20px;" /><?php echo HAVE_DIFFERENT_QUESTION; ?></h3>
            
			<?php
				$attributes = array('name' => 'frm_contact');
				echo form_open('home/contact_us', $attributes);
				
			?>
              
			  <table border="0" cellpadding="0" cellspacing="0"  align="center" >
			  <?php if($error!='') { ?>
			    <tr><td  align="center" valign="top" colspan="2" style="color:#FF0000;" class="error" > <?php echo $error; ?></td></tr>
				<?php } ?>
			  <tr><td colspan="2" height="4">&nbsp;</td></tr>
			  
			  <tr>  <td align="left" valign="top">
			 
                <label style="color:#000;"><?php echo CONTACT_US_NAME; ?>  </label>&nbsp;&nbsp;</td>  <td align="left" valign="top">
                <span ><input type="text" name="yname" id="yname"  value="<?php echo $yname; ?>" style="width:220px; " /></span>
             
			  </td>  </tr>
			  
			  <tr><td height="5">&nbsp;</td><td ><div id="name_err" style="color:#f00; font-size:10px;"></div></td></tr>
			  
			  <tr>  <td align="left" valign="top">
			                
              
                <label style="color:#000;"><?php echo CONTACT_US_EMAIL; ?>  </label>&nbsp;&nbsp;</td>
				<td align="left" valign="top">
                <span ><input type="text" name="yemail" id="yemail"  value="<?php echo $yemail; ?>" style="width:220px; " /></span>
             
			  
			  </td>  </tr>
			  <tr><td height="5">&nbsp;</td><td ><div id="email_err" style="color:#f00; font-size:10px;"></div></td></tr>
			  
			  <tr> <td align="left" valign="top">
			  
              
                <label style="color:#000;"><?php echo CONTACT_US_QUESTIONS; ?>  </label>&nbsp;&nbsp;</td><td align="left" valign="top">
                 <span ><input type="text" name="que" id="que"  value="<?php echo $que; ?>" style="width:220px; " /></span>
             
			  </td> </tr>
			  
			  <tr><td height="5">&nbsp;</td><td ><div id="que_err" style="color:#f00; font-size:10px;"></div></td></tr>
              
             
              <tr> <td align="left" valign="top">
			  
              
                <label style="color:#000;"><?php echo CONTACT_US_MESSAGE; ?>  </label>&nbsp;&nbsp;</td><td align="left" valign="top">
                <span ><textarea name="message" id="message"  style="width:220px;" rows="5" ><?php echo $message; ?></textarea></span>
             
			  </td> </tr>
			  
			  <tr><td height="5">&nbsp;</td><td ><div id="msg_err" style="color:#f00; font-size:10px;"></div></td></tr>
              
               <tr> <td align="left" valign="top">
			               
                <label style="color:#000;"><?php echo CONTACT_US_LINK; ?> </label>&nbsp;&nbsp;</td><td align="left" valign="top">
                 <span ><input type="text" name="links" id="links"  value="<?php echo $links; ?>" style="width:220px; " /></span>
             
			  </td> </tr>
			  
			  <tr><td height="5">&nbsp;</td><td >&nbsp;</td></tr>
              
              
               <tr> <td align="left" valign="top">
			               
                <label style="color:#000;"><?php echo CONTACT_US_ABOUT; ?> </label>&nbsp;&nbsp;</td><td align="left" valign="top">
                 <span >
                 <select name="about" id="about" style="width:220px; ">
                 <option value=""><?php echo SELECT_TYPE; ?></option>
                 <option value="<?php echo FUNDRAISING_ACCOUNT_LOGIN; ?>" <?php if($about==FUNDRAISING_ACCOUNT_LOGIN){  echo 'selected="selected"'; } ?>><?php echo FUNDRAISING_ACCOUNT_LOGIN; ?></option>
                  <option value="<?php echo FUNDRAISING_PROJECT; ?>" <?php if($about==FUNDRAISING_PROJECT){  echo 'selected="selected"'; } ?>><?php echo FUNDRAISING_PROJECT; ?></option>
                   <option value="<?php echo INTERNATIONAL; ?>" <?php if($about==INTERNATIONAL){  echo 'selected="selected"'; } ?>><?php echo INTERNATIONAL; ?></option>
                    <option value="<?php echo OTHER; ?>" <?php if($about==OTHER){  echo 'selected="selected"'; } ?>><?php echo OTHER; ?></option>
                   
                 </select>
                 </span>
             
			  </td> </tr>
			  
			  <tr><td height="5">&nbsp;</td><td ><div id="about_err" style="color:#f00; font-size:10px;"></div></td></tr>
              
             
             
			  
			  <tr><td align="center">&nbsp;</td> <td align="left" valign="top">
              <div id="post" >
              <input type="submit" name="contact" id="contact" value="<?php echo SEND; ?>" class="submit" onclick="return form_validate();" style="line-height:0px;" />
              
             </div>
			  </td></tr></table>
            </form>
			
		
          </div>
       
       
	   </div>	
  <!--====================left end==============--> 