<?php



function splitQueries($sql)

{

				// Initialise variables.

				$buffer		= array();

				$queries	= array();

				$in_string	= false;

		

				// Trim any whitespace.

				$sql = trim($sql);

		

				// Remove comment lines.

				$sql = preg_replace("/\n\#[^\n]*/", '', "\n".$sql);

		

				// Parse the schema file to break up queries.

				for ($i = 0; $i < strlen($sql) - 1; $i ++)

				{

					if ($sql[$i] == ";" && !$in_string) {

						$queries[] = substr($sql, 0, $i);

						$sql = substr($sql, $i +1);

						$i = 0;

					}

		

					if ($in_string && ($sql[$i] == $in_string) && $buffer[1] != "\\") {

						$in_string = false;

					}

					elseif (!$in_string && ($sql[$i] == '"' || $sql[$i] == "'") && (!isset ($buffer[0]) || $buffer[0] != "\\")) {

						$in_string = $sql[$i];

					}

					if (isset ($buffer[1])) {

						$buffer[0] = $buffer[1];

					}

					$buffer[1] = $sql[$i];

				}

		

				// If the is anything left over, add it to the queries.

				if (!empty($sql)) {

					$queries[] = $sql;

				}

		

				return $queries;

			}

		

		

function populateDatabase($schema)

{

				// Initialise variables.

				$return = true;

		

				// Get the contents of the schema file.

				if (!($buffer = file_get_contents($schema))) {

					

					return false;

				}

		

				// Get an array of queries from the schema and process them.

				$queries = splitQueries($buffer);

				foreach ($queries as $query)

				{

					// Trim any whitespace.

					$query = trim($query);

		

					// If the query isn't empty and is not a comment, execute it.

					if (!empty($query) && ($query{0} != '#')) {

						// Execute the query.

						@mysql_query($query);

										

					}

				}

		

				return true;

			}

			

			

			

if($_POST)

{	

	$server_path=getcwd();	





	$db_server=$_REQUEST['db_server'];

	$db_username=$_REQUEST['db_username'];

	$db_password=$_REQUEST['db_password'];

	$db_dbname=$_REQUEST['db_dbname'];

	

	

	

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

			

		/*$create_db=mysql_query("CREATE DATABASE ".DB_DBNAME);

		

		if(!$create_db)

		{

			$msg .='<p>Can not create Database.</p>';

		}*/

			

		$select_db=@mysql_select_db(DB_DBNAME);

		

		if(!$select_db)

		{

			$msg .='<p>Unable to connect the Database.</p>';

		}

		

		

		if($_SERVER['SERVER_ADDR'] == '127.0.0.1')

		{					

			$schema=$server_path.'\fundraising.sql';

		} else {

			$schema=$server_path.'/fundraising.sql';

		}

		

		

		if(!file_exists($schema))

		{

			$msg .='<p>Database File can not find.</p>';

		}

		else

		{

			$db_import=populateDatabase($schema);

			

			if($db_import==false)

			{

				$msg .='<p>Can not Upload database.</p>';

			}

			else

			{

				//$msg .='<p>Database Upload Successfully.<p>';

			}

		}

		

		

		

		

		if($msg=='')

		{

		

		

		

		if($_SERVER['SERVER_ADDR'] == '127.0.0.1')

		{

			$application_path=str_replace('\install','',$server_path).'\application';

		} else {

			$application_path=str_replace('\install','',$server_path).'\application';

		}

		

		$base_url=str_replace('/install/configure_installation.php','','http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

		

		

		define('BASE_URL',$base_url.'/');

		define('ADMIN_BASE_URL',$base_url.'/admin/');

		

		

		

		

		if($_SERVER['SERVER_ADDR'] == '127.0.0.1')

		{

			define('BASE_PATH',str_replace('/install','',str_replace('\\','/',$server_path)).'/');

		} else {

			define('BASE_PATH',str_replace('/install','',$server_path).'/');

		}

		

		

		

		/////////==========config=======

		

		if($_SERVER['SERVER_ADDR'] == '127.0.0.1')

		{

			$config_file = $application_path."\config\config.php";

		} else {

			$config_file = $application_path."/config/config.php";

		}

		

		

		

		$read_config_file = fopen($config_file, 'r') or die("can't open file");

		

		$config_content='';

		

		while(!feof($read_config_file))

		{	

			$config_content.=fgets($read_config_file)."<br/>";

		}

		

		

		$config_content = str_replace("{re_base_url}",BASE_URL,$config_content);

		$config_content = str_replace("{re_base_path}",BASE_PATH,$config_content);

		$config_content = str_replace("<br/>",'',$config_content);

		

		

		

		

		

		$write_config_file = fopen($config_file, 'w') or die("can't open file");

		

		fwrite($write_config_file,'');

		fwrite($write_config_file,$config_content);

		

		

		/////////==========config=======

		

		/////////==========database=====

		

		if($_SERVER['SERVER_ADDR'] == '127.0.0.1')

		{

			$db_file = $application_path."\config\database.php";

		} else {

			$db_file = $application_path."/config/database.php";

		}

		

		$fh = fopen($db_file, 'r') or die("can't open file");

		

		$content='';

		

		while(!feof($fh))

		{	

			$content.=fgets($fh)."<br/>";

		}

		

		$content = str_replace("{serverhost}",DB_SERVER,$content);

		$content = str_replace("{username}",DB_USERNAME,$content);

		$content = str_replace("{password}",DB_PASSWORD,$content);

		$content = str_replace("{database}",DB_DBNAME,$content);

		

		$content = str_replace("<br/>",'',$content);

		

		$fw = fopen($db_file, 'w') or die("can't open file");

		fwrite($fw,'');

		fwrite($fw,$content);

		

		

		/////////==========database=====

		

		

		

		

		

		

		

		/////////=====================ADMIN SIDE ==========================

		

		

		

		/////////==========config=======

		

		if($_SERVER['SERVER_ADDR'] == '127.0.0.1')

		{

			$admin_config_file = $application_path."\admin\config\config.php";

		} else {

			$admin_config_file = $application_path."/admin/config/config.php";

		}

		

		$fac = fopen($admin_config_file, 'r') or die("can't open file");

		

		$admin_config_content='';

		

		while(!feof($fac))

		{	

			$admin_config_content.=fgets($fac)."<br/>";

		}

		

		

		

		$admin_config_content = str_replace("{re_admin_base_url}",ADMIN_BASE_URL,$admin_config_content);

		$admin_config_content = str_replace("{re_base_url}",BASE_URL,$admin_config_content);

		$admin_config_content = str_replace("{re_base_path}",BASE_PATH,$admin_config_content);

		

		

		$admin_config_content = str_replace("<br/>",'',$admin_config_content);

		

		$facw = fopen($admin_config_file, 'w') or die("can't open file");

		fwrite($facw,'');

		fwrite($facw,$admin_config_content);

		

		

		/////////==========config=======

		

		

		

		

		/////////==========database=====

		

		

		if($_SERVER['SERVER_ADDR'] == '127.0.0.1')

		{

			$admin_db_file = $application_path."\admin\config\database.php";

		} else {

			$admin_db_file = $application_path."/admin/config/database.php";

		}

		$fah = fopen($admin_db_file, 'r') or die("can't open file");

		

		$admin_db_content='';

		

		while(!feof($fah))

		{	

			$admin_db_content.=fgets($fah)."<br/>";

		}

		

		$admin_db_content = str_replace("{serverhost}",DB_SERVER,$admin_db_content);

		$admin_db_content = str_replace("{username}",DB_USERNAME,$admin_db_content);

		$admin_db_content = str_replace("{password}",DB_PASSWORD,$admin_db_content);

		$admin_db_content = str_replace("{database}",DB_DBNAME,$admin_db_content);

		

		$admin_db_content = str_replace("<br/>",'',$admin_db_content);

		

		$faw = fopen($admin_db_file, 'w') or die("can't open file");

		fwrite($faw,'');

		fwrite($faw,$admin_db_content);

		

		

		/////////==========database=====

		session_start();			

		$_SESSION['db_server']=$db_server;

		$_SESSION['db_username']=$db_username;

		$_SESSION['db_password']=$db_password;

		$_SESSION['db_dbname']=$db_dbname;

		

		

		

		/////////=====================ADMIN SIDE ==========================

		

		echo "<script>window.location.href='email_setting.php'</script>";

		

		}

		

		







	} ////===else

	

	

	

}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Configure Installation Fundraisingscript</title>

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

			

			<h2 style="padding:25px 0px 0px 0px;">Configure Installation</h2>

			

			

	<?php if(@$msg!='') { ?> <div align="center" class="error" style="margin:15px 0px 0px 0px;"><?php echo @$msg; ?></div> <?php } ?>

			

			<div id="notice_div"><span class="notice_text">Note :</span> Please Create Database And Database User First. If alreay created then enter Database details below.</div>

			

			<form name="frm_config" id="frm_config" method="post" action="">

			<div style="padding:25px 0px 0px 0px;">

			

			<table border="0" cellpadding="4" cellspacing="4">

			<tr>

			<td align="left" valign="top">Database Server : </td>

			<td align="left" valign="top"><input type="text" name="db_server" id="db_server" class="ttip" onmouseover="if(t1)t1.Show(event,dbserver)" onmouseout="if(t1)t1.Hide(event)" /></td>

			</tr>

			

			

			

			<tr>

			<td align="left" valign="top">Database Username : </td>

			<td align="left" valign="top"><input type="text" name="db_username" id="db_username" class="ttip" onmouseover="if(t1)t1.Show(event,dbuser)" onmouseout="if(t1)t1.Hide(event)" /></td>

			</tr> 

	

			

			

			<tr>

			<td align="left" valign="top">Database Password : </td>

			<td align="left" valign="top"><input type="text" name="db_password" id="db_password" class="ttip" onmouseover="if(t1)t1.Show(event,dbpass)" onmouseout="if(t1)t1.Hide(event)" /></td>

			</tr>

			

			

			<tr>

			<td align="left" valign="top">Database Name : </td>

			<td align="left" valign="top"><input type="text" name="db_dbname" id="db_dbname" class="ttip" onmouseover="if(t1)t1.Show(event,dbname)" onmouseout="if(t1)t1.Hide(event)"/></td>

			</tr>

			

			

			<tr>

			<td colspan="2" align="center" valign="top">

			<a href="javascript:document.frm_config.submit()" class="request_quote" >SUBMIT</a></td>

			</tr>

			

			

			</table>

			

			</form>

			</div>

			



<div id="a" style="background-color:skyblue; width:290px; height:50px; color:#000000; padding:5px; border: solid 1px gray; text-align:left;filter: alpha(Opacity=80);opacity:0.8;">

Translucent tooltip !

</div>	

	

<script>

var t1=null;

var dbserver="Please enter Database Host.<br/>Example : if Linux Server then Enter localhost and Other Hosting enter IP address or Host name.";

var dbuser="<br/>Enter Database Username.";

var dbpass="<br/>Enter Database Password.";

var dbname="<br/>Enter Database Name.";

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