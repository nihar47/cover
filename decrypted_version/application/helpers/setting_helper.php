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
	
	function get_blog_setting()
	{
		$CI =& get_instance();
		$query = $CI->db->query("select * from blog_setting");
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
	function get_image_setting_data()
	{
		$CI =& get_instance();
		$query = $CI ->db->get_where('image_setting');
		return $query->row_array();
	}
	
	function message_setting()
	{
		$CI =& get_instance();
		$query = $CI->db->query("select * from message_setting");
		return $query->row();
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
	
	
	function wallet_setting()
	{
		$CI =& get_instance();
		$query = $CI->db->query("select * from wallet_setting");
		return $query->row();		
	}
	
	
	function credit_card_setting()
	{
		$CI =& get_instance();
		$query = $CI->db->query("select * from paypal_credit_card");
		return $query->row();		
	}
	
	
	
	/*Amazon Detail*/
	function amazon_detail()
	{
		 $CI =& get_instance();
		 $amazon_detail=$CI->db->query("select * from amazon");
		 return $amazon_detail->row();
	}
	
	/*Amazon Detail*/
	function payments_gateways()
	{
		 $CI =& get_instance();
		 $payments_gateways=$CI->db->query("select * from payments_gateways");
		 return $payments_gateways->row();
	}
	/*End Amazon Details*/
	

	/*Adaptive Paypal Details*/
	
	function adaptive_paypal_detail()
	{
		 $CI =& get_instance();
		 $paypal_adaptive_detail=$CI->db->query("select * from paypal");
		 return $paypal_adaptive_detail->row();
	}
	/*End Adaptive paypal details*/
	
	
	/**** get domain name from url
	**/
	
	function get_domain_name($url)
	{
		$matches=parse_url($url);
		
		if(isset($matches['host'])) {
			 $domain= $matches['host'];
			 
			 $domain=str_replace(array('www.'),'',$domain);
			 
			 return $domain;
		}
		
		return $url;
	}   
	
	
	
	/**
	 * generate random code
	 *
	 * @return	string
	 */
	
	function randomCode()
	{
		$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
		$pass = array(); 
		
		for ($i = 0; $i < 12; $i++) {
		$n = rand(0, strlen($alphabet)-1); //use strlen instead of count
		$pass[$i] = $alphabet[$n];
		}
		return implode($pass); //turn the array into a string
	}
	
	
	
	function getrandomCode($length=12) 
	{
     
	 	$code='';
		//Ascii Code for number, lowercase, uppercase and special characters
		$no = range(48,57); 
		$lo = range(97,122);
		$up = range(65,90); 
		 
		//exclude character I, l, 1, 0, O
		$eno = array(48, 49);
		$elo = array(108);
		$eup = array(73,79);
		$no = array_diff($no,$eno);
		$lo = array_diff($lo,$elo);
		$up = array_diff($up,$eup);
		$chr = array_merge($no, $lo, $up);
	 
		 
		for ($i=1;$i<=$length;$i++) {
			 
			$code.= chr($chr[rand(0,count($chr)-1)]);   
		}
		return $code;
	}
		
		
		function check_user_code($rand)
		{
			$CI =& get_instance();
			
			$query=$CI->db->get_where('user',array('unique_code'=>$rand));
			
			if($query->num_rows()>0)
			{
				return 1;
			}
			
			return 0;
		}
	
	function unique_user_code($rand,$length=12)
	{		
		$chk=check_user_code($rand);
		
		if($chk==1)
		{
			$rand=getrandomCode($length);
			unique_user_code($rand);		
		}
				
		return $rand;  	
		
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
		
		
		
		
	/************** end ***********/
	
	
	function parse_youtube_url($url,$return='embed',$width='',$height='',$rel=0)
	{
		$v='';
		$urls = parse_url($url);
		if(isset($urls['host']))
		{
			//url is http://youtu.be/xxxx
			if($urls['host'] == 'youtu.be'){
				$id = ltrim($urls['path'],'/');
			}
			//url is http://www.youtube.com/embed/xxxx
			else if(strpos($urls['path'],'embed') == 1){
				$id = end(explode('/',$urls['path']));
			}
			//url is xxxx only
			else if(strpos($url,'/')===false){
				$id = $url;
			}
			//http://www.youtube.com/watch?feature=player_embedded&v=m-t4pcO99gI
			//url is http://www.youtube.com/watch?v=xxxx
			else{
				parse_str($urls['query']);
				$id = $v;
				if(!empty($feature)){
					$id = end(explode('v=',$urls['query']));
				}
			}
			
			
			//return embed iframe
				
			if($return == 'embed'){
				return '<iframe width="'.($width?$width:560).'" height="'.($height?$height:349).'" src="http://www.youtube.com/embed/'.$id.'?rel='.$rel.'" frameborder="0" allowfullscreen></iframe>';
			}
			//return normal thumb
			else if($return == 'thumb'){
				return 'http://i1.ytimg.com/vi/'.$id.'/default.jpg';
			}
			//return hqthumb
			else if($return == 'hqthumb'){
				return 'http://i1.ytimg.com/vi/'.$id.'/hqdefault.jpg';
			}
			// else return id
			else{
				return $id;
			}
		} ///===isset
		return false;
	}


/***************************End of get you tube video image************************/



/***************************get vimeo video image************************/
		function getVimeoInfo($id, $info='thumbnail_medium') 
		{
			if (!function_exists('curl_init')) die('CURL is not installed!');
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, "http://vimeo.com/api/v2/video/$id.php");
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_TIMEOUT, 10);
			
			
			$output = unserialize(curl_exec($ch));
			//$output = curl_exec($ch);
			
			$output = $output[0][$info];
			curl_close($ch);
			return $output;
		}

		function youtube_thumb_url($url)
		{
		  /*$regex='@http\:\/\/www\.youtube\.com\/\watch\?v\=([^&]+).*@';
		  $replace='http://img.youtube.com/vi/$1/0.jpg';
		
		 $thumb_url=preg_replace($regex,$replace,$url);
		
		 return $thumb_url;*/
		}
		
	function geturlimages($url)
    {
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30); //timeout after 30 seconds
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        $result=curl_exec ($ch);
        curl_close ($ch);
        // Search The Results From The Starting Site
        if( $result )
        {
            // I LOOK ONLY FROM TOP domains change this for your usage
            //preg_match_all( '/<a href="(http:\/\/www.[^0-9].+?)"/', $result, $output, PREG_SET_ORDER );
            $stripped_file = strip_tags($result, "<img>");
              preg_match_all('/(<img).*(src\s*=\s*"([a-zA-Z0-9\.;:\/\?&=\-_|\r|\n]{1,})")/isxmU', $stripped_file, $output);
            /*echo "<prev>";
            echo print_r($output[3]);
            echo "</prev>";die();*/
            $cnt=0;
            foreach($output[3] as $item )        
            {
                if(stristr($url,$item))
                {
                    if(@getimagesize(@$url))
                    {
                        list($width, $height, $type, $attr) = getimagesize(@$url);
                            if($width >= 150)
                            {
                                return $item;
								//echo "<li><img src='".$url."/".$item."' id='ajx_load_img".$cnt."' title='image'></li>,";$cnt++;
								$cnt++;
                            }
                    }
                }
                else
                {
                    if(@getimagesize(@$item))
                    {
                        list($width, $height, $type, $attr) = getimagesize(@$item);
                            if($width >= 150)
                            {
                                 return $item;
							//echo "<li><img src='".$item."'  id='ajx_load_img".$cnt."' title='image'></li>,";$cnt++;
							$cnt++;
                            }
                    }
                }
                
                
            }
			
			
			//video code
				if (strstr($result, '<iframe')) 
				{
						$result = str_ireplace("</iframe>", "", $result);
						if (preg_match_all("/<iframe(.*?)>/si", $result, $result1)) 
						{
							if(is_array($result1[0]))
							{
							    foreach($result1[0] as $arr)
								{
								    $yotube=$arr;									
									$stripped_file = strip_tags($yotube, "<iframe>");
				        	        preg_match_all('/(<iframe).*(src\s*=\s*"([a-zA-Z0-9\.;:\/\?&=\-_|\r|\n]{1,})")/isxmU', $stripped_file, $output);
				 					if(isset($output[3]))
									{
										if(isset($output[3][0]))
										{
										
										$item=parse_youtube_url($output[3][0],'hqthumb');
										return $item;
											/*if($item)
											{
												//echo "<li><img src='".$item."'  id='ajx_load_img".$cnt."' title='youtube' alt='".$output[3][0]."'></li>,";
												return $item;
												$cnt++; 
											}
*/										}
									
									}
								}	
							}
						}
				}
        }
        die;
    }
	
	
	
	/***************************end of vimeo video image************************/
	function get_paypal_logo()
	{		
		$CI =& get_instance();
		$query = $CI->db->get("paypal");
		$q= $query->row();
	 return $q->paypal_logo;
	}

	/********get original client ip
	** return ip string
	***/
	
	 function getRealIP() 
	 {
	   if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			$ip=$_SERVER['HTTP_CLIENT_IP'];
	   } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
	   } else {
			 $ip=$_SERVER['REMOTE_ADDR'];
	   }
	  return $ip;
	}
	
	
	/*********get user location from ip
	*** return array
	***/
	
	function getip2location($user_ip)
	{
		$url = 'http://msapi.com/ipaddress_location/';
		$url .=$user_ip;
			
		if(function_exists('curl_init'))
		{		
			$defaults = array(
				CURLOPT_HEADER => 0,
				CURLOPT_URL => $url,
				CURLOPT_FRESH_CONNECT => 1,
				CURLOPT_RETURNTRANSFER => 1,
				CURLOPT_FORBID_REUSE => 1,
				CURLOPT_TIMEOUT => 15
			);
			
			$ch = curl_init();
			curl_setopt_array($ch, $defaults);
			$result = curl_exec($ch);
			curl_close($ch);
			$response = json_decode($result);	
			return $response;	
			
		} else if(function_exists('file_get_contents'))	{
					
			$response = json_decode(file_get_contents($url));
			return $response;		
		}		
		
		return false;
	}

	function randomNumber($length)
	{
		$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
		$pass = array(); //remember to declare $pass as an array
		
		for ($i = 0; $i < $length; $i++) {
		$n = rand(0, strlen($alphabet)-1); //use strlen instead of count
		$pass[$i] = $alphabet[$n];
		}
		return implode($pass); //turn the array into a string
	}
	
	function is_date($date)
  	{
	  if(preg_match("/^([0-9]{2})-([0-9]{2})-([0-9]{4})$/", $date, $parts))
	  {
		if(checkdate($parts[2],$parts[1],$parts[3]))
		  return true;
		else
		 return false;
	  }
	  else	   
	    return false;
	 }	
	 
	 /*Common mail send*/
	function email_send($email_address_from,$email_address_reply,$email_to,$email_subject,$str,$email_from_name='')
	{
				
		$CI =& get_instance();
		$query = $CI->db->get_where("email_setting",array('email_setting_id'=>1));
		$email_set=$query->row();
					
									
		$CI->load->library('email');
			
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
				
		
		if($email_from_name!='')
		{
			$CI->email->from($email_address_from,$email_from_name);
		}
		else
		{
			$CI->email->from($email_address_from);
		}
		
		
		$CI->email->reply_to($email_address_reply);
		$CI->email->to($email_to);
		$CI->email->subject($email_subject);
		$CI->email->message($str);
		$CI->email->send();

	}
	
	function getDuration($date)
    {
        $CI =& get_instance();
        $curdate = date('Y-m-d H:i:s');
        $diff = abs(strtotime($date) - strtotime($curdate));
        $years = floor($diff / (365*60*60*24));
        $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
        $hours = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 )/ (60*60));
        $mins = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ (60));
        $ago = '';
        if($years != 0){ if($years > 1) {$ago =  $years.' '.TEXT_YEARS;} else { $ago =  $years.' '.TEXT_YEAR;}}
        elseif($months != 0){ if($months > 1) {$ago =  $months.' '.TEXT_MONTHS;} else { $ago =  $months.' '.TEXT_MONTH;}}
        elseif($days != 0) { if($days > 1) {$ago =  $days.' '.TEXT_DAYS;} else { $ago =  $days.' '.TEXT_DAY;}}
        elseif($hours != 0){ if($hours > 1) {$ago =  $hours.' '.TEXT_HOURS;} else { $ago =  $hours.' '.TEXT_HOUR;}}
        else{ if($mins > 1) {$ago =  $mins.' '.TEXT_MINUTES;} else { $ago =  $mins.' '.TEXT_MINUTE;}}
        return $ago.' '.TEXT_AGO;
    }

	
?>