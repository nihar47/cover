<?php
session_start();	
			
if($_POST)
{	
	$server_path=getcwd();	


	$db_server=$_SESSION['db_server'];
	$db_username=$_SESSION['db_username'];
	$db_password=$_SESSION['db_password'];
	$db_dbname=$_SESSION['db_dbname'];
	
	$msg='';
	
	if($db_server=='')
	{
		$msg .='<p>Databse server is required.</p>';
	} 
	if($db_username=='')
	{
		$msg .='<p>Databse Username is required.</p>';
	}
	if($db_dbname=='')
	{
		$msg .='<p>Databse Password is required.</p>';
	}
	else
	{
				
		define('DB_SERVER',$db_server);
		define('DB_USERNAME',$db_username);
		define('DB_PASSWORD',$db_password);
		define('DB_DBNAME',$db_dbname);
		
		
		$db = @mysql_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD);
		
		if(!$db)
		{
			$msg .='<p>Unable to connect the MySql Database.</p>';
		}
			
					
		$select_db=@mysql_select_db(DB_DBNAME);
		
		if(!$select_db)
		{
			$msg .='<p>Unable to connect the Database.</p>';
		}
		
		
		
		
		
		
		if($msg=='')
		{
		
		
			$email_set=$_REQUEST['set_email'];
			
			$get_template=mysql_query("select * from email_template order by email_template_id asc");
			
			if(mysql_num_rows($get_template)>0)
			{
				while($emtm=mysql_fetch_array($get_template))
				{
					$update=mysql_query("update email_template set `from_address`='".$email_set."',`reply_address`='".$email_set."' where `email_template_id`='".$emtm['email_template_id']."'");				
				}
							
			}
					
		
		
		
		
		/////////=====================ADMIN SIDE ==========================
		
		echo "<script>window.location.href='successfull.php'</script>";
		
		}
		
		



	} ////===else
	
	
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Email Configure Fundraisingscript</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<!--[if IE 6]>
	<script type="text/javascript" src="unitpngfix.js"></script>
<![endif]--> 


<script language="javascript" src="js/Tooltip.js"></script>

</head>
<body onload=init()>
<div class="wrap">

    	<div class="logo"><a href="index.html"><img src="images/logo.png" alt="" title="" border="0" /></a></div>
        
            
    
    <div class="main_content">
    		
			
			<div style="padding:15px;">
			
			<h2 style="padding:25px 0px 0px 0px;">Email Setting</h2>
			
			
	<?php if(@$msg!='') { ?> <div align="center" class="error" style="margin:15px 0px 0px 0px;"><?php echo @$msg; ?></div> <?php } ?>
			
		
			
			<form name="frm_emailset" id="frm_emailset" method="post" action="">
			<div style="padding:25px 0px 0px 0px;">
			
			<table border="0" cellpadding="4" cellspacing="4">
			<tr>
			<td align="left" valign="top">Email : </td>
			<td align="left" valign="top"><input type="text" name="set_email" id="set_email" class="ttip" onmouseover="if(t1)t1.Show(event,email_set)" onmouseout="if(t1)t1.Hide(event)" /></td>
			</tr>
			
			
			
			
			
			<tr>
			<td colspan="2" align="center" valign="top">
			<a href="javascript:document.frm_emailset.submit()" class="request_quote">SUBMIT</a></td>
			</tr>
			
			
			</table>
			
			</form>
			</div>
			

<div id="a" style="background-color:skyblue; width:290px; height:50px; color:#000000; padding:5px; border: solid 1px gray; text-align:left;filter: alpha(Opacity=80);opacity:0.8;">
Translucent tooltip !
</div>	
	
<script>
var t1=null;
var email_set="Please enter Email Address from which all Site emails(New Comment, New Fund, User Registration,etc..) are send.";

function init()
{
 t1 = new ToolTip("a",true,40);
}
</script>

			
			
			</div>
			
            
            
            
            
            
            <div class="clear"></div>
    </div><!--End of main_content-->

    
</div><!--End of wrap-->

<div class="footer">
	<div class="footer_content">
    
    	<div class="left_footer_content">
       
            <p>
        
            <span class="brown">&copy; Copyright Fundrasing Script. All Rights Reserved.</span>            
            </p>
        
        </div>
    
        
        
       
        
	</div>
</div><!--End of footer-->



</body>
</html>