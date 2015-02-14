<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class MY_Security extends CI_Security {
    function __construct()
    {
      parent::__construct();
	
	}

	// --------------------------------------------------------------------
	
	/*
		* Modified for cb_cms
	 */
	protected function _remove_evil_attributes($str, $is_image)
	{
		// All javascript event handlers (e.g. onload, onclick, onmouseover), style, and xmlns
		//"your allowed url's without domain like '/admin/edittext/'"
		$allowed = array('add_newsletter','edit_newsletter','add_pages','edit_pages','add_faq','edit_faq','add_school','edit_school','guidelines');
		
	
		$active_url =  $_SERVER['REQUEST_URI'];
		$strdd = explode("/",$active_url);
		 
		
		if(!isset($strdd[1]))
		{
			$strdd[1]='';
		}
		if(!isset($strdd[2]))
		{
			$strdd[2]='';
		}
		if(!isset($strdd[3]))
		{
			$strdd[3]='';
		}
		if(!isset($strdd[4]))
		{
			$strdd[4]='';
		}
		
		
	
		
		if(in_array($strdd[1],$allowed)){
			$evil_attributes = array('on\w*', 'xmlns');
		}
		elseif(in_array($strdd[2],$allowed)){
			$evil_attributes = array('on\w*', 'xmlns');
		}
		elseif(in_array($strdd[3],$allowed)){
			$evil_attributes = array('on\w*', 'xmlns');
		}
		elseif(in_array($strdd[4],$allowed)){
			$evil_attributes = array('on\w*', 'xmlns');
		}		
		else{
			$evil_attributes = array('on\w*', 'style', 'xmlns');
		}
		
		if ($is_image === TRUE)
		{
			/*
			 * Adobe Photoshop puts XML metadata into JFIF images, 
			 * including namespacing, so we have to allow this for images.
			 */
			unset($evil_attributes[array_search('xmlns', $evil_attributes)]);
		}
		
		do {
			$count = 0;
			$attribs = array();
			
			// find occurrences of illegal attribute strings without quotes
			preg_match_all("/(".implode('|', $evil_attributes).")\s*=\s*([^\s]*)/is",  $str, $matches, PREG_SET_ORDER);
			
			foreach ($matches as $attr)
			{
				$attribs[] = preg_quote($attr[0], '/');
			}
			
			// find occurrences of illegal attribute strings with quotes (042 and 047 are octal quotes)
			preg_match_all("/(".implode('|', $evil_attributes).")\s*=\s*(\042|\047)([^\\2]*?)(\\2)/is",  $str, $matches, PREG_SET_ORDER);

			foreach ($matches as $attr)
			{
				$attribs[] = preg_quote($attr[0], '/');
			}

			// replace illegal attribute strings that are inside an html tag
			if (count($attribs) > 0)
			{
				$str = preg_replace("/<(\/?[^><]+?)([^A-Za-z\-])(".implode('|', $attribs).")([\s><])([><]*)/i", '<$1$2$4$5', $str, -1, $count);
			}
			
		} while ($count);
		
		return $str;
	}

		
} 

?>