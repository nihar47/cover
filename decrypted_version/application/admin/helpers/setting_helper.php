<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	function site_setting()
	{
		$CI =& get_instance();
		$query = $CI->db->query("select * from site_setting");
		return $query->row_array();
	}
	
	function meta_setting()
	{
		$CI =& get_instance();
		$query = $CI->db->query("select * from meta_setting");
		return $query->row_array();
	}
	
	function facebook_setting()
	{
		$CI =& get_instance();
		$query = $CI->db->query("select * from facebook_setting");
		return $query->row();
	}
	function twitter_setting()
	{
		$CI =& get_instance();
		$query = $CI->db->query("select * from twitter_setting");
		return $query->row();
	}
	/*** load google setting
	*  return single record array
	**/
	
	function google_setting()
	{		
		$CI =& get_instance();
		$query = $CI->db->get("google_setting");
		return $query->row();	
	}
	
	
	/*** load yahoo setting
	*  return single record array
	**/
	
	function yahoo_setting()
	{		
		$CI =& get_instance();
		$query = $CI->db->get("yahoo_setting");
		return $query->row();	
	}

	
?>