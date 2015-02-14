<?php 


	function get_supported_lang()
	{
		$CI =& get_instance();	
		$CI->config->load('language');
		$supported_lang = $CI->config->item('supported_languages');
		
		$arr = array();
		foreach ($supported_lang as $key => $lang)
		{
			$arr[$key] = $lang['folder'];
		}
	
	
		return $arr;
	}
	
	
	function base_path()
	{		
		$CI =& get_instance();
		return $base_path = $CI->config->slash_item('base_path');		
	}
	
	
	function get_current_language()
	{
		$CI =& get_instance();	
		$CI->config->load('language');
		$default_language = $CI->config->item('default_language');
		
		return $default_language;
	
	}

	function get_switch_uri()
	{	
		$lnk_ln = current_url()."?lang=";		
		return $lnk_ln;	
	}



?>