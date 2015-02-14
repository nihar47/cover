<?php
$system_folder = "system";

if (strpos($system_folder, '/') === FALSE)
{
	if (function_exists('realpath') AND @realpath(dirname(__FILE__)) !== FALSE)
	{
		$system_folder = realpath(dirname(__FILE__)).'/'.$system_folder;
	}
}
else
{
	// Swap directory separators to Unix style for consistency
	$system_folder = str_replace("\\", "/", $system_folder); 
}

define('BASEPATH', $system_folder.'/');
if(file_exists('./application/config/config.php')){
	include('./application/config/config.php');
	include('./application/config/database.php');
	
}
else{
	if(file_exists('../application/config/config.php')){
		include('../application/config/config.php');
		include('../application/config/database.php');
		
	}
}	


DEFINE ('DB_USER',$db['default']['username']);
DEFINE ('DB_PASSWORD', $db['default']['password']);
DEFINE ('DB_HOST', $db['default']['hostname']);
DEFINE ('DB_NAME', $db['default']['database']);
DEFINE ('LISTING_KEY','blogs');
DEFINE ('BASE_URL',$config['base_url']);

// Make the connnection and then select the database.
$dbc = @mysql_connect (DB_HOST, DB_USER, DB_PASSWORD) OR die ('Could not connect to MySQL: ' . mysql_error() );
mysql_select_db (DB_NAME) OR die ('Could not select the database: ' . mysql_error() );

?>