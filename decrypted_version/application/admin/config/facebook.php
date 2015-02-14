<?php
	$fbs = facebook_setting();

	$CI =& get_instance();
	$base_url = $CI->config->slash_item('base_url_site');
	//echo  $fbs->facebook_api_key;  
	//echo  $fbs->facebook_secret_key;

	$config['facebook_api_key'] = $fbs->facebook_api_key;
	$config['facebook_secret_key'] = $fbs->facebook_secret_key;
	$config['base_url_site_facebook'] = $base_url;
	
	//$config['facebook_api_key'] = '127041607384123';
	//$config['facebook_secret_key'] = '3b0412b6264d84b594fd4236c238c2d5';
	
?>