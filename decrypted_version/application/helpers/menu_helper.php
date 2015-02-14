<?php
	//////==============Dynamice Menu======
		
	function get_home_page()	
	{
		$CI =& get_instance();
		$query=$CI->db->query("select * from home_page where home_id='1' and active='1' ");
		
		if($query->num_rows()>0)
		{		
			return $query->row();
		}
		else
		{
			return false;
		}
		
	}
		
	function get_content_multi($id,$place)
	{
		$CI =& get_instance();
		$query=$CI->db->query("select * from pages where active='1' and ".$place."='yes' and parent_id='".$id."'");
		return $query->result();
	}
	
	
	function get_page_by_id($id)
	{
		$CI =& get_instance();
		$query = $CI->db->get_where('pages',array('pages_id'=>$id));
		if ($query->num_rows() > 0) {
			return $query->row_array();
		}
		return 0;
	
	}
	
	
	//////==============Dynamice Menu======	
	
	function dynamic_menu($id='')
	{
		
		
	
	
	$cat='';
	$id= empty($id) ? 0 : $id;
	
	if(count(get_content_multi($id,'header_bar'))>0) {
	
	foreach(get_content_multi($id,'header_bar') as $res) {
	
	
	if($res->external_link!='') {
	
	$cat.='<li><a href="'.$res->external_link.'">'.$res->pages_title.'</a>';
	
	} else {
	
	$cat.='<li>'.anchor('home/content/'.strtolower(str_replace(' ','-',$res->pages_title)).'/'.$res->pages_id,$res->pages_title);
	
	}
	
	
	if(count(dynamic_menu($res->pages_id))>0) {
	
	$cat.='<ul>';
	
	$cat.=dynamic_menu($res->pages_id);
	
	$cat.='</ul>';
	
	}
	
	$cat.='</li><li class="line">|</li>';
	}
	
	
	
	}
	
	
	return $cat;
	
	
	}
	
	

	function dynamic_menu_about($id='')
	{
	
	$cat='';
	$id= empty($id) ? 0 : $id;
	
	if(count(get_content_multi($id,'about_bar'))>0) {
	
	foreach(get_content_multi($id,'about_bar') as $res) {
	
	if($res->external_link!='') {
	//echo "in for if";
	$cat.='<li class="sidelinks"><a href="'.$res->external_link.'"><span>'.$res->pages_title.'</span></a>';
	
	} else {
	//echo "in for else";
	$cat.='<li class="sidelinks">'.anchor('home/content/'.strtolower(str_replace(' ','-',$res->pages_title)).'/'.$res->pages_id,'<span>'.$res->pages_title.'</span>');
	//print_r($cat);
	}
	
			if(count(dynamic_menu_about($res->pages_id))>0) {	
						$cat.=dynamic_menu_about($res->pages_id);
						}	
		}
	}
	
	return $cat;
	
	}

function dynamic_menu_right($id='')
	{
	
	$cat='';
	$id= empty($id) ? 0 : $id;
	
	if(count(get_content_multi($id,'right_side'))>0) {
	
	foreach(get_content_multi($id,'right_side') as $res) {
	
	if($res->external_link!='') {
	//echo "in for if";
	$cat.='<li class="sidelinks"><a href="'.$res->external_link.'"><span>'.$res->pages_title.'</span></a>';
	
	} else {
	//echo "in for else";
	$cat.='<li class="sidelinks">'.anchor('home/content/'.strtolower(str_replace(' ','-',$res->pages_title)).'/'.$res->pages_id,'<span>'.$res->pages_title.'</span>');
	//print_r($cat);
	}
	
			if(count(dynamic_menu_right($res->pages_id))>0) {	
						$cat.=dynamic_menu_right($res->pages_id);
						}	
		}
	}
	
	return $cat;
	
	}
	
	function dynamic_menu_footer($id='')
	{
	   
				
				$cat='';
				$id= empty($id) ? 0 : $id;
				
				if(count(get_content_multi($id,'footer_bar'))>0) {
				
					foreach(get_content_multi($id,'footer_bar') as $res) {
					
						if($res->external_link!='') {			
						
						$cat.= anchor($res->external_link,$res->pages_title).'&nbsp;|&nbsp;';	
						} else {
						
							$cat.= '<li>'.anchor('home/content/'.strtolower(str_replace(' ','-',$res->pages_title)).'/'.$res->pages_id,$res->pages_title).'</li>';	
						
						}
						
						if(count(dynamic_menu_footer($res->pages_id))>0) {	
						
							//$cat.='<ul>';
							
							$cat.=dynamic_menu_footer($res->pages_id);
								
							//$cat.='</ul>';	
						
						}					
						
						//$cat.='</li>';		
								
				   }
				   
							 
				  
				}
				
				
			return $cat;  
		
		
		
	}
	
	function dynamic_menu_assistance($id='')
	{
	
	$cat='';
	$id= empty($id) ? 0 : $id;
	
	if(count(get_content_multi($id,'assistance_bar'))>0) {
	
	foreach(get_content_multi($id,'assistance_bar') as $res) {
	
	if($res->external_link!='') {
	//echo "in for if";
	$cat.='<li class="sidelinks"><a href="'.$res->external_link.'"><span>'.$res->pages_title.'</span></a>';
	
	} else {
	//echo "in for else";
	$cat.='<li class="sidelinks">'.anchor('home/content/'.strtolower(str_replace(' ','-',$res->pages_title)).'/'.$res->pages_id,'<span>'.$res->pages_title.'</span>');
	//print_r($cat);
	}
	
			if(count(dynamic_menu_assistance($res->pages_id))>0) {	
						$cat.=dynamic_menu_assistance($res->pages_id);
						}	
		}
	}
	
	return $cat;
	
	}
	
	/**** dynamic menu end ******/
	
	
    
    ?>