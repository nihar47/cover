<?php 
define ("HOST","localhost");

	define ("USER","root");

	define ("PASSWORD","");

	define ("DATABASE","user");
	
	//..........database connection............

$con =	mysql_connect (HOST,USER,PASSWORD) or die ("Couldn't connect with database!");

 mysql_select_db(DATABASE) or die ("Database not found!");

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="css/main_layout.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>


<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>
<link rel="stylesheet" href="css/template.css" type="text/css"/>

<script src="js/jquery-1.8.2.min.js" type="text/javascript"></script>
<script src="js/languages/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>

<script>
    	// This method is called right before the ajax form validation request
		// it is typically used to setup some visuals ("Please wait...");
		// you may return a false to stop the request 
		function beforeCall(form, options){
			if (window.console) 
			console.log("Right before the AJAX form validation call");
			return true;
		}
            
		// Called once the server replies to the ajax form validation request
		function ajaxValidationCallback(status, form, json, options){
			if (window.console) 
			console.log(status);
                
			if (status === true) {
				alert("the form is valid!");
				// uncomment these lines to submit the form to form.action
				// form.validationEngine('detach');
				// form.submit();
				// or you may use AJAX again to submit the data
			}
		}
            
		 
		
		function submitForm(val1)
		{
		 $("#formID").validationEngine({});
		}
		
		
		$(document).ready(function(){
		  $("#close").click(function(){
		  $("#deletemsg").slideUp(1000);
		  });
		});

	</script>

</head>

 
<?php
$msg='';
if($_POST['Submit']=="Submit")
{
$fname					=	$_REQUEST['txtFName'];
$lname					=	$_REQUEST['txtLName'];
$email					=	$_REQUEST['email'];
$enquiry				=	$_REQUEST['txtEnquiry'];

 

$sql = "INSERT INTO contact_tbl (name,lname,email,comment) VALUES ('$fname','$lname','$email','$enquiry')";
 
mysql_query($sql);
 
 $msg="Successfully Submitted.";


$f=$_REQUEST['email'];
 

$mailData= '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>

<body>

			<table width="600"  style="border:1px solid #333333;" cellspacing="0" cellpadding="5" bgcolor="#f9f9f9">
			
        <tr>
				<td height="3" colspan="2" style="font-family:Arial, Helvetica, sans-serif; font-size:0px; line-height:0; padding:0; margin:0px; height:3px !important;" bgcolor="#f15827"></td>
			  </tr>
              <tr>
				<td height="1" colspan="2" style="font-family:Arial, Helvetica, sans-serif; font-size:0px; line-height:0; padding:0; margin:0px; height:1px !important;" bgcolor="#7b7b7b"></td>
			  </tr>
              <tr>
				<td height="3" colspan="2" style="font-family:Arial, Helvetica, sans-serif; font-size:0px; line-height:0; padding:0; margin:0px; height:3px !important;" bgcolor="#3e5cbc"></td>
			  </tr>
			   
			  <tr>
<td width="220" align="left" valign="middle" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; line-height:20px; padding:5px 5px 5px 10px; margin:0px;"><strong>First Name  :</strong></td>
<td align="left" valign="middle" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; line-height:20px; padding:5px 5px 5px 5px; margin:0px;">'.$_REQUEST['txtFName'].'</td>
			  </tr>

			 <tr>
				<td align="left" valign="middle" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; line-height:20px; padding:5px 5px 5px 10px; margin:0px;"><strong>Last Name   :</strong></td>
			   <td align="left" valign="middle" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; line-height:20px; padding:5px 5px 5px 5px; margin:0px;">'.$_REQUEST['txtLName'].'</td>
			  </tr>
			 
			 <tr>
				<td align="left" valign="middle" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; line-height:20px; padding:5px 5px 5px 10px; margin:0px;"><strong>Tell us about your project!</strong></td>
			   <td align="left" valign="middle" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; line-height:20px; padding:5px 5px 5px 5px; margin:0px;">'.$_REQUEST['txtEnquiry'].'</td>
			  </tr>


			  <tr>
				<td colspan="2"><strong>&nbsp;</strong></td>
			  </tr>
			</table>
</body>
</html>'; 

$to="annarao.p@edreamz.in";
$cc="priyanka.c@edreamz.in";
 


$headers = "From:".$f. "\r\n" .
                        "CC:".$cc;

$subject="Tell us about your project!";


 SendHTMLMail($to,$subject,$mailData,$headers);
}
?>  
   
  


<body>
<!--main_wrapper-->
<div class="main_wrapper">

    <div class="wrapper">
     <!--start middal_wrapper -------------------------------------->
    	<div class="container middal_wrapper">
        	<div class="inpagecontent">
            	 
            
            <div class="form_main_row">
           <?php 
            if($msg){ ?>
              <div id="deletemsg" class="msgbox" style="width:450px; font-size:16px;margin-top:10px;margin-left:2px;text-align:left; margin-bottom:10px; color:#00CC00">
   <div style="width:85%;float:left;" ><strong><?=$msg;?></strong></div>
   <div id="close" style="width:10%; font-weight:bold; float:right;font-size:12px; cursor:pointer; text-decoration:underline;">Close</div>
        </div>
         <?php   } ?>
            
          
  
            
                <form id="formID" class="formular" method="post" action="" >
				<div class="form_main_row">
              
                <div class="form_main_row"><label><strong>First Name</strong><span class="errormsg">*</span></label>
              <input value="" class="validate[required,custom[onlyLetterSp],maxSize[255]] text-input" type="text" name="txtFName" id="txtFName" />
             
              
              <div class="form_main_row"><label><strong>Last Name</strong><span class="errormsg">*</span></label>
              <input value="" class="validate[required,custom[onlyLetterSp],maxSize[255]] text-input" type="text" name="txtLName" id="txtLName" />
                 
				<div class="form_main_row"><label><strong>Email</strong><span class="errormsg">*</span> </label>
				<input value="" class="validate[required,custom[email]] text-input email" type="text" name="email"  id="email" /></div>
                
                <div class="form_main_row">
                <label><strong>Tell us about your project! </strong></label>
                <textarea cols="50" rows="10" name="txtEnquiry" id="txtEnquiry" ></textarea>
                </div>			
		<input class="submit" type="submit" value="Submit" name="Submit" onclick=" return submitForm()"/>
        
        <hr/>
	</form>
    </div>
    <div class="clear"></div>    
    </div>            
            </div>
        	<div class="clear"></div>    
        </div>
    <!--end middal_wrapper ----------------------------------------->    
  
     
<!--end_wrapper-->
</div>
</body>
</html>
