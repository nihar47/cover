<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" >
<head >
    <title>Paypal Pladform SDK - Webflow Common Return Page</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
        <br/>
        <div id="jive-wrapper">
            <div id="jive-header">
                <div id="logo">
                    <span >You must be Logged in to <a href="<?php echo DEVELOPER_PORTAL;?>" target="_blank">PayPal sandbox</a></span>
                    <a title="Paypal X Home" href="#"><div id="titlex"></div></a>
                </div>
            </div>

		<?php 
require_once 'menu.html';?>
<div id="request_form">

<div>
<center><h3><b>Paypal Platform SDK - Webflow Return Page</b></h3></center>
<br/>

<table align="center" width="60%">
	<tr>
		<td colspan="2">
			<center><h5>You are returned here from a web flow</h5></center>
		</td>
	</tr>
<?php
foreach($_GET as $variable => $value)
{
    echo "<tr><td>" . $variable . "</td>";
    echo "<td>" . $value . "</td></tr>";
}
$str="";
 $raw_post_data = file_get_contents('php://input');
   $raw_post_array = explode('&', $raw_post_data);
foreach($_POST as $variable => $value)
{
    echo "<tr><td>" . $variable . "</td>";
    echo "<td>" . $value . "</td></tr>";
	$str.= $variable."=".$value;
}
foreach($raw_post_array as $variable => $value)
{
    echo "<tr><td>" . $variable . "</td>";
    echo "<td>" . $value . "</td></tr>";
	$str.= $variable."=".$value;
}

					$myFile = "ipn.txt";
					$fh = fopen($myFile, 'w') or die("can't open file");					
					fwrite($fh, $str);					
					fclose($fh);
					$myFile = "ipn.txt";
					$fh = fopen($myFile, 'w') or die("can't open file");					
					fwrite($fh, $raw_post_data);					
					fclose($fh);
?>

</table>
</div>
</div>
</div>
</body>
</html>

