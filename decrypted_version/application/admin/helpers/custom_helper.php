<?php 
	
	function base_path()
	{		
		$CI =& get_instance();
		return $base_path = $CI->config->slash_item('base_path');		
	}
	
	//////===== front side url ======
	
	function upload_url()
     {
          $CI =& get_instance();
		  return $base_path = $CI->config->slash_item('base_url_site');
	}
	
	function front_base_url()
	{
		$CI =& get_instance();
		$chk_index=$CI->config->slash_item('index_page');
		
		if($chk_index!='') { 
			$base_path = $CI->config->slash_item('base_url_site').$chk_index;
		} else { 
			$base_path = $CI->config->slash_item('base_url_site');
		}
		
		return $base_path;
	}
	
	function email_send($email_address_from,$email_address_reply,$email_to,$email_subject,$str)
	{
				
		$CI =& get_instance();
		$query = $CI->db->get_where("email_setting",array('email_setting_id'=>1));
		$email_set=$query->row();
					
									
		$CI->load->library(array('email'));
			
		///////====smtp====
		
		if($email_set->mailer=='smtp')
		{
		
			$config['protocol']='smtp';  
			$config['smtp_host']=trim($email_set->smtp_host);  
			$config['smtp_port']=trim($email_set->smtp_port);  
			$config['smtp_timeout']='30';  
			$config['smtp_user']=trim($email_set->smtp_email);  
			$config['smtp_pass']=trim($email_set->smtp_password);  
					
		}
		
		/////=====sendmail======
		
		elseif(	$email_set->mailer=='sendmail')
		{	
		
			$config['protocol'] = 'sendmail';
			$config['mailpath'] = trim($email_set->sendmail_path);
			
		}
		
		/////=====php mail default======
		
		else
		{
		
		}
			
			
		$config['wordwrap'] = TRUE;	
		$config['mailtype'] = 'html';
		$config['crlf'] = '\n\n';
		$config['newline'] = '\n\n';
		
		$CI->email->initialize($config);	
				
		
		$CI->email->from($email_address_from);
		$CI->email->reply_to($email_address_reply);
		$CI->email->to($email_to);
		$CI->email->subject($email_subject);
		$CI->email->message($str);
		$CI->email->send();

	}
	
	 /**** create seo friendly url
* var string $text
**/

function clean_url($text)
{

$text=strtolower($text);
$code_entities_match = array( '&quot;' ,'!' ,'@' ,'#' ,'$' ,'%' ,'^' ,'&' ,'*' ,'(' ,')' ,'+' ,'{' ,'}' ,'|' ,':' ,'"' ,'<' ,'>' ,'?' ,'[' ,']' ,'' ,';' ,"'" ,',' ,'.' ,'_' ,'/' ,'*' ,'+' ,'~' ,'`' ,'=' ,' ' ,'---' ,'--','--','’');
$code_entities_replace = array('' ,'-' ,'-' ,'' ,'' ,'' ,'-' ,'-' ,'' ,'' ,'' ,'' ,'' ,'' ,'' ,'-' ,'' ,'' ,'' ,'' ,'' ,'' ,'' ,'' ,'' ,'-' ,'' ,'-' ,'-' ,'' ,'' ,'' ,'' ,'' ,'-' ,'-' ,'-','-');
$text = str_replace($code_entities_match, $code_entities_replace, $text);
return $text;
}

	
	/*  create seo friendly url */
	function seoUrl($string)
	{
		//Unwanted:  {UPPERCASE} ; / ? : @ & = + $ , . ! ~ * ' ( )
		$string = strtolower($string);
		//Strip any unwanted characters
		$string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
		//Clean multiple dashes or whitespaces
		$string = preg_replace("/[\s-]+/", " ", $string);
		//Convert whitespaces and underscore to dash
		$string = preg_replace("/[\s_]/", "-", $string);
		return $string; 
	}
	/*  create seo friendly url end */
	
	
	/********** get payment gateway details **********/
	
	function get_normal_paypal_detail()	
	{
		$CI =& get_instance();
		$query=$CI->db->query("select * from site_setting where site_setting_id='2'");
		
		if($query->num_rows()>0)
		{		
			return $query->row();
		}
		return 0;
		
	}
	
	function get_adaptive_paypal_detail()	
	{
		$CI =& get_instance();
		$query=$CI->db->query("select * from paypal where id='1'");
		
		if($query->num_rows()>0)
		{		
			return $query->row();
		}
		return 0;
		
	}
	
	function get_amazon_detail()	
	{
		$CI =& get_instance();
		$query=$CI->db->query("select * from amazon where id='1'");
		
		if($query->num_rows()>0)
		{		
			return $query->row();
		}
		return 0;
		
	}
	
	function get_wallet_detail()	
	{
		$CI =& get_instance();
		$query=$CI->db->query("select * from wallet_setting where wallet_id='1'");
		
		if($query->num_rows()>0)
		{		
			return $query->row();
		}
		return 0;
		
	}
		
	/*******  end ************/
	
	/********** set amount with currency *************/
	
	function set_currency($amt=null)	
	{
		$CI =& get_instance();
		$query=$CI->db->query("select * from site_setting where site_setting_id=2");
		
		$rs = $query->row();

		 $amt = number_format($amt,$rs->decimal_points);
			
			if($rs->currency_symbol_side == 'left'){
				
				$amount = $rs->currency_symbol.$amt;
			}
			
			elseif($rs->currency_symbol_side == 'left_space'){
				
				$amount = $rs->currency_symbol.' '.$amt;
			}
			
			elseif($rs->currency_symbol_side == 'right'){
				
				$amount = $amt.$rs->currency_symbol;
			}
			elseif($rs->currency_symbol_side == 'right_space'){
				
				$amount = $amt.' '.$rs->currency_symbol;
			}
			elseif($rs->currency_symbol_side == 'left_code'){
				
				$amount = $rs->currency_code.$amt;
			}
			
			elseif($rs->currency_symbol_side == 'left_space_code'){
				
				$amount = $rs->currency_code.' '.$amt;
			}
			
			elseif($rs->currency_symbol_side == 'right_code'){
				
				$amount = $amt.$rs->currency_code;
			}
			
			else{
				
				$amount = $amt.' '.$rs->currency_code;
			}
		
		return $amount;
		
	}
		
		
	/**
	 * @param DateTime $date A given date
	 * @param int $firstDay 0-6, Sun-Sat respectively
	 * @return DateTime
	 */
	function get_first_day_of_week($date) 
	{
		 $day_of_week = date('N', strtotime($date)); 
		 $week_first_day = date('Y-m-d', strtotime($date . " - " . ($day_of_week - 1) . " days")); 
		 return $week_first_day;
	}

	
	function get_last_day_of_week($date)
	{
		 $day_of_week = date('N', strtotime($date)); 
		 $week_last_day = date('Y-m-d', strtotime($date . " + " . (7 - $day_of_week) . " days"));   
    	 return $week_last_day;
	}	
	
	
	
	
		/*Get user detail*/
	
	function get_user_detail($id)
	{
		$CI =& get_instance();
		$query=$CI->db->get_where("user",array("user_id"=>$id));
		return $query->row_array();
	}
	
	
	function affiliate_setting()
	{
		$CI =& get_instance();
		$query = $CI->db->query("select * from affiliate_common_settings");
		return $query->row();	
	}
	
	function affiliate_commission_setting($id)
	{
		$CI =& get_instance();
		$query = $CI->db->query("select * from affiliate_commission_settings where active=1 and commission_settings_id='".$id."'");
		if($query->num_rows()>0)
		{
			return $query->row();	
		}
		return 0;
	}
	/************** end ***********/
	
	function get_city()
	{
		$CI =& get_instance();
		$CI->db->where('active',1);
		$CI->db->order_by('city_name','asc');
		$query=$CI->db->get('city');
		return $query->result();

	}
	function get_country()
	{
		$CI =& get_instance();
		$CI->db->where('active',1);
		$CI->db->order_by('country_name','asc');
		$query=$CI->db->get('country');
		return $query->result();

	}
	function get_state()
	{
		$CI =& get_instance();
		$CI->db->where('active',1);
		$CI->db->order_by('state_name','asc');
		$query=$CI->db->get('state');
		return $query->result();

	}
	function get_city_name($city_id='')
	{
		$CI =& get_instance();
		if(is_numeric($city_id)){
		$query = $CI->db->get_where('city',array('city_id'=>$city_id));

		if($query->num_rows()>0)
		{
			$result = $query->row();
			return $result->city_name;
		}
		
		return 0;
	}else{
		return $city_id;
	}
	}
	function get_country_name($country_id='')
	{
		$CI =& get_instance();
		$query = $CI->db->get_where('country',array('country_id'=>$country_id));
		if(is_numeric($country_id)){
		if($query->num_rows()>0)
		{	
			$result = $query->row();
			return $result->country_name;
		}
		
		return 0;
		}
		else
		{
			return $country_id;
		}
	}
	
	function get_state_name($state_id='')
	{
		if(is_numeric($state_id)){
		$CI =& get_instance();
		$query = $CI->db->get_where('state',array('state_id'=>$state_id));
		
		if($query->num_rows()>0)
		{	
			$result = $query->row();
			return $result->state_name;
		}
		
		return 0;
		
		}
		else
		{
			return $state_id;
		}
			
	}
	function get_countrywise_state($country_id='')
	{
		$CI =& get_instance();
		$query = $CI->db->get_where('state',array('country_id'=>$country_id));
		
		if($query->num_rows()>0)
		{	
			return $query->result();
		}
		
		return 0;
	}
	
	function get_statewise_city($state_id='')
	{
		$CI =& get_instance();
		$query = $CI->db->get_where('city',array('state_id'=>$state_id));
		
		if($query->num_rows()>0)
		{	
			return $query->result();
		}
		
		return 0;
	}
	
	function get_project_user($id)
	{
		$CI =& get_instance();
		$CI->db->select('*');
		$CI->db->where('project_id', $id);
		$CI->db->from('project');
		$CI->db->join('user', 'project.user_id = user.user_id');
		$query = $CI->db->get();

		if ($query->num_rows() > 0) {
			return $query->row_array();
		}
		return 0;
	}
	
	function get_all_project_gallery($id)
	{
		$CI =& get_instance();
		$query=$CI->db->query("select * from project_gallery where project_id='".$id."' order by project_gallery_id asc ");
		
		if($query->num_rows()>0)
		{
			return $query->result();
		}
		
		return 0;
	}
	
	function get_website($user_id){
	$CI =& get_instance();
		$query = $CI->db->get_where("user_website",array("user_id"=>$user_id));
		
		if($query->num_rows()>0)
		{
			return $query->result_array();
		}
		
		return 0;
		
	}
	function get_image_setting_data() {
		
		$CI =& get_instance();
		$query = $CI->db->get_where("image_setting");
		return $query->row_array();
	}
	
		function image_upload($files)

	{
		

			$new_img='';

			$rand=rand(0,100000); 

			$image_settings = get_image_setting_data();	

			if(trim($files["userfile"]["tmp_name"]) != "")

					{
						if ($files["userfile"]["type"] != "image/jpeg" and $files["userfile"]["type"] != "image/pjpeg" and $files["userfile"]["type"] != "image/png" and $files["userfile"]["type"] != "image/x-png" and $files["userfile"]["type"] != "image/gif") {die('Please upload a .jpg, .png, .gif file');}

						

						if ($files["userfile"]["size"] > 2000000) {die('Sorry, this file is too large.  Please select a .jpg file that is less than 2 MB or try resizing it using a photo editor.');}  //if you have a stronger server, you can probably bump this up a bit.  The resize will shrink the filesize down

						}

						if ($files["userfile"]["type"] == "image/jpeg" || $files["userfile"]["type"] == "image/pjpeg"){

							$source_img = @imagecreatefromjpeg($files["userfile"]["tmp_name"]); //Create a copy of our image for our thumbnails...

						}

						if ($files["userfile"]["type"] == "image/png" || $files["userfile"]["type"] == "image/x-png"){

							$source_img = @imagecreatefrompng($files["userfile"]["tmp_name"]); 

						}

						if ($files["userfile"]["type"] == "image/gif"){

							$source_img = @imagecreatefromgif($files["userfile"]["tmp_name"]); 

						}	

						 $orig_img_type = explode('/',$files['userfile']['type']);

						 $oring_img = 'curated_'.$rand.'.'.$orig_img_type[1];

						/* Thumb Image Starts here */

						$new_w = $image_settings['u_width']; //You can change these to fit the width and height you want

						$new_h = $image_settings['u_height'];

						/* Thumb Image Close here */


						$orig_w = imagesx($source_img);

						$orig_h = imagesy($source_img);
					

						$w_ratio = ($new_w / $orig_w);

						$h_ratio = ($new_h / $orig_h);
								
						/* Thumb Image Starts here */
						$crop_w = $new_w;

						$crop_h = $new_h;
						/* Thumb Image Close here */
	

						/* Thumb Image Starts here */
						 $dest_img = imagecreatetruecolor($new_w,$new_h);

						imagecopyresampled($dest_img, $source_img, 0 , 0 , 0, 0, $crop_w, $crop_h, $orig_w, $orig_h);
						/* Thumb Image Close here */
						
						$type_img = explode('/',$files['userfile']['type']);

						$new_img = 'curated_'.$rand.'.'.$type_img[1];
	

						if ($files["userfile"]["type"] == "image/jpeg" || $files["userfile"]["type"] == "image/pjpeg"){

								if(imagejpeg($dest_img, "../upload/curated_thumb/".$new_img)) {
									

									imagejpeg($source_img, "../upload/curated/".$oring_img);

									imagedestroy($dest_img);

									imagedestroy($source_img);

								} 
								
						}

						if ($files["userfile"]["type"] == "image/png" || $files["userfile"]["type"] == "image/x-png"){

								if(imagepng($dest_img, "../upload/curated_thumb/".$new_img)) {

									imagepng($source_img, "../upload/curated/".$oring_img);

									imagedestroy($dest_img);

									imagedestroy($source_img);

								} 
									
						}

						if ($files["userfile"]["type"] == "image/gif"){

								if(imagegif($dest_img, "../upload/curated_thumb/".$new_img)) {

									imagegif($source_img, "../upload/curated/".$oring_img);

									imagedestroy($dest_img);

									imagedestroy($source_img);

								}
								
						}	

					return $new_img;

	}

?>