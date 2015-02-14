<?php 	

	/*Get user detail*/

	

	function get_user_detail($id)

	{

		$CI =& get_instance();

		$query=$CI->db->get_where("user",array("user_id"=>$id));

		return $query->row_array();

	}

/* Get Project details by project id*/
	function get_project_detail($id)

	{

		$CI =& get_instance();

		$query=$CI->db->get_where("project",array("project_id"=>$id));

		return $query->row_array();

	}
	

	/*Function Get all project*/

	

	function get_all_project()

	{

		$CI =& get_instance();

		$query=$CI->db->query("select * from project where active=1");	

		return $query->result();

	}

	

	function project_of_the_day()

	{

		/*This function for set project of the day temporary we set latest project then change as per client requirement or today more funded*/

		$CI =& get_instance();

		$query=$CI->db->query("select * from project where active=1 order by date_added desc LIMIT 1");	

		return $query->row ();

	}

	

	function project_of_the_day_of_user($user_id='')

	{

		/*This function for set project of the day temporary we set latest project then change as per client requirement or today more funded*/

		$CI =& get_instance();

		$query=$CI->db->query("select * from project where active=1 and user_id=".$user_id." order by date_added desc LIMIT 1");	

		return $query->row ();

	}

	/*

	Function name :get_user_profile_by_fbid()

	Parameter : $user_id(user id) 

	Return : array of user profile details

	Use : get user profile information

	*/

	function get_authenticateUserID()

	{		

		$CI =& get_instance();

		return $CI->session->userdata('user_id');

	}

	

	// --------------------------------------------------------------------

	/*Get project category name*/

	function project_getcategory_name($project_category_id='')

	{

		$CI =& get_instance();

		$query = $CI->db->get_where("project_category",array('project_category_id'=>$project_category_id));

		$result=$query->row();

		if($result){

		return $result->project_category_name;}

		else{

			return "";

		}

		

	}

	

	function count_project_user_categorywise($category_id='',$user_id='')

	{
        
		$CI =& get_instance();

			/*$query=$CI->db->query('select project.* from project,transaction where project.project_id = transaction.project_id and transaction.user_id='.$user_id.' and project.category_id='.$category_id.' GROUP BY project.project_id');
*/
$query=$CI->db->query('select project.* from project,transaction where project.project_id = transaction.project_id and transaction.user_id='.$user_id.' and project.category_id IN (SELECT project_category_id FROM project_category WHERE  parent_project_category_id IN (SELECT `project_category_id` FROM `project_category` WHERE `parent_project_category_id` ='.$category_id .')) GROUP BY project.project_id');
			if($query->num_rows()>0){

				return $query->num_rows();

			}

			else

			{

				return 0;

			}

	}

	/*Blog category name*/

	function blog_getcategory_name($blog_category_id='')

	{

		$CI =& get_instance();

		$query = $CI->db->get_where("blog_category",array('blog_category_id'=>$blog_category_id));

		$result=$query->row();

		return $result->blog_category_name;

		

	}

	

	function countcomment($blog_id='')

	{

		$CI =& get_instance();

		$query = $CI->db->get_where("blog_comment",array('blog_id'=>$blog_id));

		if($query->num_rows() > 0)

		{

			return $query->num_rows;

		}

		else

		{

			return 0;

		}



	}

	

	

	function get_sub_category($parent_project_category_id='')

	{

		$CI =& get_instance();

		$query = $CI->db->get_where("project_category",array('parent_project_category_id'=>$parent_project_category_id,'active'=>1));

		return $query->result();

	}

	

	

	function get_catid_parent_id($project_category_id='')

	{

		$CI =& get_instance();

		$query = $CI->db->get_where("project_category",array('project_category_id'=>$project_category_id));

		$result=$query->row();

		if($query->num_rows()>0){

		return $result->project_category_id;

		}else{

		return 0;}

		

	}

	

	function get_parent_id($project_category_id='')

	{

		$CI =& get_instance();

		$query = $CI->db->get_where("project_category",array('project_category_id'=>$project_category_id));

		$result=$query->row();

		return $result->parent_project_category_id;

		

	}

	/*Count number of prject in category*/

	function count_category_project($project_category_id='')

	{

		$CI =& get_instance();

		

			$sql="select * from project where active=1 and end_date>='".date('Y-m-d')."' and status not in(2,3,5) and category_id='".$project_category_id."' order by project_id desc";

		

		$result=$CI->db->query($sql);

		

		if($result->num_rows()>0){

		return $result->num_rows();

		}else{return 0;}

		/*$query = $CI->db->get_where("project",array('category_id'=>$project_category_id,'active'=>1));

		if($query->num_rows() > 0)

		{

			return $query->num_rows;

		}

		else

		{

			return 0;

		}*/

	}

	

	function userblocklist($user_id)

	{

		$CI =& get_instance();

		

		$query=$CI->db->query("select user.* from user,block_user where user.user_id=block_user.block_user_id and block_user.block_by_user_id =".$user_id);	

		

		if($query->num_rows()>0)

		{		

			return $query->result();

		}

		

		return 0;

	}

	

	function userfollowing($user_id)

	{

		$CI =& get_instance();

		

		$query=$CI->db->query("select user.*,user_follow.* from user,user_follow where user.user_id=user_follow.follow_user_id and user_follow.follow_by_user_id =".$user_id);	

		

		if($query->num_rows()>0)

		{		

			return $query->result();

		}

		

		return 0;

		

	}

	

	function userfollowers($user_id)

	{

		$CI =& get_instance();

		

		$query=$CI->db->query("select user.*,user_follow.* from user,user_follow where user.user_id=user_follow.follow_by_user_id and user_follow.follow_user_id =".$user_id);	

		

		if($query->num_rows()>0)

		{		

			return $query->result();

		}

		

		return 0;

		

	}

	function usernotifications($user_id)

	{

		$CI =& get_instance();

		

		$query=$CI->db->query("select * from user_notification where user_id =".$user_id);	

		

		if($query->num_rows()>0)

		{		

			return $query->row_array();

		}

		

		return 0;

		

	}

	

	/*Get Top funded project category wise*/

	function get_topfuned_category_project($project_category_id='')

	{

		

		$CI =& get_instance();

		$sites = $CI->db->query("select * from site_setting");

		$site_setting=$sites->row();

		

		$successful=$site_setting->successful;

		

		if($successful=='') { $successful='60'; }

		

		

		//$query=$CI->db->query("select project.*,user.user_name,user.image as uimg,user.country,user.state from project, user where user.user_id=project.user_id  and project.amount_get >= (project.amount * ".$successful." )/100 and project.amount<>'' and project_draft=1 and category_id = ".$project_category_id." order by project.amount_get asc  LIMIT 1");	

		

		$query=$CI->db->query("select project.*,user.user_name,user.image as uimg,user.country,user.state from project, user where user.user_id=project.user_id and project.amount_get<>'' and project_draft=1 and status not in(2,3,5)  and category_id = ".$project_category_id." order by project.amount_get asc  LIMIT 1");	

		

		

		

		if($query->num_rows()>0)

		{		

			return $query->row_array();

		}

		

		return 0;

	}
	
	function get_topfuned_category_project_count($project_category_id='')

	{

		

		$CI =& get_instance();

		$sites = $CI->db->query("select * from site_setting");

		$site_setting=$sites->row();

		

		$successful=$site_setting->successful;

		

		if($successful=='') { $successful='60'; }

		

		

		//$query=$CI->db->query("select project.*,user.user_name,user.image as uimg,user.country,user.state from project, user where user.user_id=project.user_id  and project.amount_get >= (project.amount * ".$successful." )/100 and project.amount<>'' and project_draft=1 and category_id = ".$project_category_id." order by project.amount_get asc  LIMIT 1");	

		

		$query=$CI->db->query("select project.*,user.user_name,user.image as uimg,user.country,user.state from project, user where user.user_id=project.user_id and project.amount_get<>'' and project_draft=1 and status not in(2,3,5)  and category_id = ".$project_category_id." order by project.amount_get asc  LIMIT 1");	

		

		

		

		if($query->num_rows()>0)

		{		

			return $query->num_rows();

		}

		

		return 0;

	}

	/**

	 * Check user login

	 *

	 * @return	boolen

	 */

	function check_user_authentication()

	{		

		$CI =& get_instance();

		

			if($CI->session->userdata('user_id')!='')

			{

				return true;

			}

			else

			{

				return false;

			}

	

	}

	

	/****get user profile name

	***

	***/

	

	function getUserProfileName()

	{

		$CI =& get_instance();

		

		$query = $CI->db->get_where("user",array('user_id'=>get_authenticateUserID()));

		

		$result=$query->row();

		

		$username = $result->user_name.' '.$result->last_name;

		

		return $username;

		

	}

	

	function getUserNamebyid($user_id='')

	{

		

		$CI =& get_instance();

		

		$query = $CI->db->get_where("user",array('user_id'=>$user_id));

		

		$result=$query->row();

		

		$username = $result->user_name.' '.$result->last_name;

		

		return $username;

		

	}

	

	function get_user_profile_by_fbid($fb_id)

	{

		$CI =& get_instance();

		

		$query=$CI->db->query("select * from user where fb_uid='".$fb_id."'");	

		

		if($query->num_rows()>0)

		{		

			return $query->row();

		}

		

		return 0;

	}

	

	

	/*

	Function name :get_user_profile_by_unique_code()

	Parameter : $user_id(user id) 

	Return : array of user profile details

	Use : get user profile information

	*/

	

	function get_user_profile_by_unique_code($unique_code)

	{

		$CI =& get_instance();

		

		$query=$CI->db->query("select * from user where unique_code='".$unique_code."'");	

		

		if($query->num_rows()>0)

		{		

			return $query->row();

		}

		

		return 0;

	}

	

	

	

	function get_user_card_info($user_id)

	{

		$CI =& get_instance();

		$query=$CI->db->get_where('user_card_info',array('user_id'=>$user_id));

		

		if($query->num_rows()>0)

		{

			return $query->row();

		}

		

		return 0;

		

	}

	

	

	function check_user_one_time_commission($affiliate_user_id,$project_id)

	{

		$CI =& get_instance();

		

	$query=$CI->db->query("select * from affiliate_user_earn where project_id='".$project_id."' and user_id='".$affiliate_user_id."'");	

		

		if($query->num_rows()>0)

		{		

			return 1;

		}

		

		return 0;

	}

	

	

	

	

	function check_user_enable_for_affiliate_withdraw_request($user_id)

	{

		$CI =& get_instance();

		

		$earn_query=$CI->db->query("select SUM(earn_amount) as total_earn_amount from affiliate_user_earn where earn_status=1 and user_id='".$user_id."'");	

		

		if($earn_query->num_rows()>0)

		{		

			$earn_res=$earn_query->row();

			

			$total_earn_amount=$earn_res->total_earn_amount;

			

			$total_withdraw_amount=0;

			

			$request_query=$CI->db->query("select SUM(withdraw_amount) as total_withdraw_amount from affiliate_withdraw_request where  withdraw_status in (0,1,2) and user_id='".$user_id."'");	

		

			if($request_query->num_rows()>0)

			{		

				$request_res=$request_query->row();

				

				$total_withdraw_amount=$request_res->total_withdraw_amount;

			

			}

			

			

			$total_amount=$total_earn_amount-$total_withdraw_amount;

			

			if($total_amount>0)

			{

				

				$affiliate_setting=affiliate_setting();

				

				$minimum_withdrawal_amount=$affiliate_setting->minimum_withdrawal_threshold;

				

				if($total_amount>=$minimum_withdrawal_amount)

				{

					return 1;  ///=======allow to withdraw

				}

				else

				{

					return 2; /////======not enough amount for withdraw

				}

				

			}

			else

			{			

				return 2; /////======not enough amount for withdraw

			}

		}

		

		return 0; ////===no earn yet

	}

	

	function total_earn_affiliate_user($user_id)

	{

		$CI =& get_instance();

		

		$earn_query=$CI->db->query("select SUM(earn_amount) as total_earn_amount from affiliate_user_earn where earn_status=1 and user_id='".$user_id."'");	

		

		if($earn_query->num_rows()>0)

		{		

			$earn_res=$earn_query->row();

			

			$total_earn_amount=$earn_res->total_earn_amount;

			

			$total_withdraw_amount=0;

			

			$request_query=$CI->db->query("select SUM(withdraw_amount) as total_withdraw_amount from affiliate_withdraw_request where  withdraw_status in (0,1,2) and user_id='".$user_id."'");	

		

			if($request_query->num_rows()>0)

			{		

				$request_res=$request_query->row();

				

				$total_withdraw_amount=$request_res->total_withdraw_amount;

			

			}

			

			

			

			$total_amount=$total_earn_amount-$total_withdraw_amount;

			

			if($total_amount>0)

			{

				

				$affiliate_setting=affiliate_setting();

				

				$minimum_withdrawal_amount=$affiliate_setting->minimum_withdrawal_threshold;

				

				return $total_amount;

				

			}

			else

			{			

				return 0; 

			}

		}

		

		return 0; 

	}

	

	

	

	/*User Image Upload*/

	

	function user_image_upload($files)

	{
//echo 'update image';exit;
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

						

						/*if (!$source_img) {

						echo "could not create image handle";

						exit(0);

						}*/

						$oring_img = 'user_'.$rand.'.'.$files["userfile"]['name'];

						

						$new_w = $image_settings['u_width']; //You can change these to fit the width and height you want

						$new_h = $image_settings['u_height'];


						$profile_w = 187; //You can change these to fit the width and height you want

						$profile_h = 188;


						$orig_w = imagesx($source_img);

						$orig_h = imagesy($source_img);

						

						$w_ratio = ($new_w / $orig_w);

						$h_ratio = ($new_h / $orig_h);

						

						

						$crop_w = $new_w;

						$crop_h = $new_h;
						
						$profilecrop_w = $profile_w;

						$profilecrop_h = $profile_h;

						

						

						$dest_img = imagecreatetruecolor($new_w,$new_h);

						imagecopyresampled($dest_img, $source_img, 0 , 0 , 0, 0, $crop_w, $crop_h, $orig_w, $orig_h);



						$profile_img = imagecreatetruecolor($profile_w,$profile_h);

						imagecopyresampled($profile_img, $source_img, 0 , 0 , 0, 0, $profilecrop_w, $profilecrop_h, $orig_w, $orig_h);

						

						$type_img = explode('/',$files['userfile']['type']);

						$new_img = 'user_'.$rand.'.'.$type_img[1];

						

						

						if ($files["userfile"]["type"] == "image/jpeg" || $files["userfile"]["type"] == "image/pjpeg"){

							

								if(imagejpeg($dest_img, "upload/thumb/".$new_img)) {

									imagejpeg($source_img, "upload/orig/".$oring_img);

									imagedestroy($dest_img);

									imagedestroy($source_img);

								}
								if(imagejpeg($profile_img, "upload/profile_image/".$new_img)) {

									imagedestroy($profile_img);

								}
								
								 /*else {

									echo "could not make profile image";

									exit(0);

								}*/

						}

						if ($files["userfile"]["type"] == "image/png" || $files["userfile"]["type"] == "image/x-png"){

								if(imagepng($dest_img, "upload/thumb/".$new_img)) {

									imagepng($source_img, "upload/orig/".$oring_img);

									imagedestroy($dest_img);

									imagedestroy($source_img);

								}
								if(imagejpeg($profile_img, "upload/profile_image/".$new_img)) {

									imagedestroy($profile_img);

								}

								 /*else {

									echo "could not make profile image";

									exit(0);

								}*/

						}

						if ($files["userfile"]["type"] == "image/gif"){

								if(imagegif($dest_img, "upload/thumb/".$new_img)) {

									imagegif($source_img, "upload/orig/".$oring_img);

									imagedestroy($dest_img);

									imagedestroy($source_img);

								}
  								 if(imagejpeg($profile_img, "upload/profile_image/".$new_img)) {

									imagedestroy($profile_img);

								}

								 /*else {

									echo "could not make profile image";

									exit(0);

								}*/

						}	

						

					return $new_img;

				

				

	}

	

	/*End User image upload*/

	

	/*Project Image Upload*/

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

						 $oring_img = 'project_'.$rand.'.'.$orig_img_type[1];

						//$oring_img = 'project_'.$rand.'.'.$files["userfile"]['name'];

						/*if (!$source_img) {

						echo "could not create image handle";

						exit(0);

						}*/
						
						/* Thumb Image Starts here */

						$new_w = $image_settings['g_width']; //You can change these to fit the width and height you want

						$new_h = $image_settings['g_height'];

						/* Thumb Image Close here */
						
						/* Slider image Starts here */
						
						$slide_w = $image_settings['p_width']; //You can change these to fit the width and height you want

						$slide_h = $image_settings['p_height'];
						
						/* Slider image ends here */
						
						/* Smallthumb Starts here */
						
						$smallthumb_w = $image_settings['u_width']; //You can change these to fit the width and height you want

						$smallthumb_h = $image_settings['u_height'];
						/* Smallthumb image ends here */
						
						
						/* Slider image ends here */

						$orig_w = imagesx($source_img);

						$orig_h = imagesy($source_img);
					

						$w_ratio = ($new_w / $orig_w);

						$h_ratio = ($new_h / $orig_h);
								
						/* Thumb Image Starts here */
						$crop_w = $new_w;

						$crop_h = $new_h;
						/* Thumb Image Close here */
						
						
						/* Slider image Starts here */
						$slidecrop_w = $slide_w;

						$slidecrop_h = $slide_h;
						/* Slider image ends here */
						
						/* SmallThumb image Starts here */
						$smallthumbcrop_w = $smallthumb_w;

						$smallthumbcrop_h = $smallthumb_h;
						/* SmallThumb image ends here */

						

						/* Thumb Image Starts here */
						$dest_img = imagecreatetruecolor($new_w,$new_h);

						imagecopyresampled($dest_img, $source_img, 0 , 0 , 0, 0, $crop_w, $crop_h, $orig_w, $orig_h);
						/* Thumb Image Close here */
						
						
						/* Slider image Starts here */
						$Slidedest_img = imagecreatetruecolor($slide_w,$slide_h);

						imagecopyresampled($Slidedest_img, $source_img, 0 , 0 , 0, 0, $slidecrop_w, $slidecrop_h, $orig_w, $orig_h);
						/* Slider image ends here */
						
						/* SmallThumb image Starts here */
						$SmallThumbdest_img = imagecreatetruecolor($smallthumb_w,$smallthumb_h);

						imagecopyresampled($SmallThumbdest_img, $source_img, 0 , 0 , 0, 0, $smallthumbcrop_w, $smallthumbcrop_h, $orig_w, $orig_h);
						/* SmallThumb image ends here */

						$type_img = explode('/',$files['userfile']['type']);

						$new_img = 'project_'.$rand.'.'.$type_img[1];
	

						if ($files["userfile"]["type"] == "image/jpeg" || $files["userfile"]["type"] == "image/pjpeg"){

								if(imagejpeg($dest_img, "upload/thumb/".$new_img)) {

									imagejpeg($source_img, "upload/orig/".$oring_img);

									imagedestroy($dest_img);

									imagedestroy($source_img);

								} 
								if(imagejpeg($Slidedest_img, "upload/slider/".$new_img)) {

									imagedestroy($Slidedest_img);

								}
								if(imagejpeg($SmallThumbdest_img, "upload/small_thumb/".$new_img)) {

									imagedestroy($SmallThumbdest_img);

								}
								/*else {

									echo "could not make profile image";

									exit(0);

								}*/

						}

						if ($files["userfile"]["type"] == "image/png" || $files["userfile"]["type"] == "image/x-png"){

								if(imagepng($dest_img, "upload/thumb/".$new_img)) {

									imagepng($source_img, "upload/orig/".$oring_img);

									imagedestroy($dest_img);

									imagedestroy($source_img);

								} 
									if(imagejpeg($Slidedest_img, "upload/slider/".$new_img)) {

									imagedestroy($Slidedest_img);

								}
								if(imagejpeg($SmallThumbdest_img, "upload/small_thumb/".$new_img)) {

									imagedestroy($SmallThumbdest_img);

								}
								/*else {

									echo "could not make profile image";

									exit(0);

								}*/

						}

						if ($files["userfile"]["type"] == "image/gif"){

								if(imagegif($dest_img, "upload/thumb/".$new_img)) {

									imagegif($source_img, "upload/orig/".$oring_img);

									imagedestroy($dest_img);

									imagedestroy($source_img);

								}
								
									if(imagejpeg($Slidedest_img, "upload/slider/".$new_img)) {

									imagedestroy($Slidedest_img);

								}
								if(imagejpeg($SmallThumbdest_img, "upload/small_thumb/".$new_img)) {

									imagedestroy($SmallThumbdest_img);

								}
								 /*else {

									echo "could not make profile image";

									exit(0);

								}*/

						}	

						

					return $new_img;

				

				

	}

	/*ENd Project Image Upload*/

	

	/*photo id upload*/

	function image_photoid_upload($files)

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

						

						/*if (!$source_img) {

						echo "could not create image handle";

						exit(0);

						}*/

						$new_w = $image_settings['g_width']; //You can change these to fit the width and height you want

						$new_h = $image_settings['g_height'];

						

						$orig_w = imagesx($source_img);

						$orig_h = imagesy($source_img);

						

						$w_ratio = ($new_w / $orig_w);

						$h_ratio = ($new_h / $orig_h);

						

						

						$crop_w = $new_w;

						$crop_h = $new_h;

						

						$dest_img = imagecreatetruecolor($new_w,$new_h);

						imagecopyresampled($dest_img, $source_img, 0 , 0 , 0, 0, $crop_w, $crop_h, $orig_w, $orig_h);

						

						$type_img = explode('/',$files['userfile']['type']);

						$new_img = 'user_photoid_'.$rand.'.'.$type_img[1];

						

						

						if ($files["userfile"]["type"] == "image/jpeg" || $files["userfile"]["type"] == "image/pjpeg"){

							

								if(imagejpeg($dest_img, "upload/photoid/thumb/".$new_img)) {

									imagejpeg($dest_img, "upload/photoid/orig/".$new_img);

									imagedestroy($dest_img);

									imagedestroy($source_img);

								} /*else {

									echo "could not make profile image";

									exit(0);

								}*/

						}

						if ($files["userfile"]["type"] == "image/png" || $files["userfile"]["type"] == "image/x-png"){

								if(imagepng($dest_img, "upload/photoid/thumb/".$new_img)) {

									imagepng($dest_img, "upload/photoid/orig/".$new_img);

									imagedestroy($dest_img);

									imagedestroy($source_img);

								} /*else {

									echo "could not make profile image";

									exit(0);

								}*/

						}

						if ($files["userfile"]["type"] == "image/gif"){

								if(imagegif($dest_img, "upload/photoid/thumb/".$new_img)) {

									imagegif($dest_img, "upload/photoid/orig/".$new_img);

									imagedestroy($dest_img);

									imagedestroy($source_img);

								} /*else {

									echo "could not make profile image";

									exit(0);

								}*/

						}	

						

					return $new_img;

				

				

	}

	/*End photo id upload*/

	/*Get One project Detail*/

	function get_one_project($id)

	{		

		$CI =& get_instance();

		$query = $CI->db->get_where('project',array('project_id' => $id));

		if ($query->num_rows() > 0) {

			return $query->row_array();

		}

		return 0;	

	}

	

	function get_current_project($id)

	{		

		$CI =& get_instance();

		$query = $CI->db->get_where('project',array('project_id' => $id));

		if ($query->num_rows() > 0) {

			return $query->row();

		}

		return 0;	

	}

	

	function get_fund_project($id)

	{		

		$CI =& get_instance();

		$query = $CI->db->get_where('project',array('project_id' => $id));

		if ($query->num_rows() > 0) {

			return $query->result();

		}

		return 0;	

	}

	

	/*Get One project perk Detail*/

	function get_project_perk($id)

	{		

		$CI =& get_instance();

		$query = $CI->db->get_where('perk',array('project_id' => $id));

		if ($query->num_rows() > 0) {

			return $query->result();

		}

		return 0;	

	}

	/*End one project Details*/

	

	

	



	 function get_total_unread_message_count($user_id='')

	{

		$CI =& get_instance();

		$query=$CI->db->query("select * from message_conversation where receiver_id='".$user_id."' and is_read = 0");

		

		if($query->num_rows()>0)

		{

			return $query->num_rows();

		}

		return 0;

	}

	

	

	function follower_list($follow_user_id,$follow_by_user_id)

	{

		$CI =& get_instance();

		$query = $CI->db->query('select * from user_follow where follow_by_user_id='.$follow_by_user_id.' and follow_user_id='.$follow_user_id);

		if($query->num_rows()>0)

		{

			return 1;

		}

		else

		{

			return 0;

		}

	

	}

	

	function following_list_count($follow_by_user_id)

	{

		$CI =& get_instance();

		$query = $CI->db->query('select * from user_follow where follow_by_user_id='.$follow_by_user_id);

		if($query->num_rows()>0)

		{

			return 1;

		}

		else

		{

			return 0;

		}

	

	}

	

	function follower_list_count($follow_user_id)

	{

		$CI =& get_instance();

		$query = $CI->db->query('select * from user_follow where follow_user_id='.$follow_user_id);

		if($query->num_rows()>0)

		{

			return $query->num_rows();

		}

		else

		{

			return 0;

		}

	

	}

	function block_list($block_user_id,$block_by_user_id)

	{

		$CI =& get_instance();

		$query = $CI->db->query('select * from block_user where block_by_user_id='.$block_by_user_id.' and block_user_id='.$block_user_id);

		if($query->num_rows()>0)

		{

			return 1;

		}

		else

		{

			return 0;

		}

	}

	

	function project_follower_list($project_id,$project_follow_user_id )

	{

		$CI =& get_instance();

		$query = $CI->db->query('select * from project_follower where project_id='.$project_id.' and project_follow_user_id='.$project_follow_user_id);

		if($query->num_rows()>0)

		{

			return 1;

		}

		else

		{

			return 0;

		}

	}

	

	function project_follower_details($project_id)

	{

		$CI =& get_instance();

		$query = $CI->db->query('select * from project_follower p,user u where p.project_follow_user_id=u.user_id and p.project_id='.$project_id);

		if($query->num_rows()>0)

		{

			return $query->result();

		}

		else

		{

			return 0;

		}

	} 

	

	function get_city_name($city_id='')

	{

		if(is_numeric($city_id)){

		$CI =& get_instance();

		$query = $CI->db->get_where('city',array('city_id'=>$city_id));



		if($query->num_rows()>0)

		{

			$result = $query->row();

			return $result->city_name;

		}

		}

		

		return $city_id;

	}

	function get_country_name($country_id='')

	{

		if(is_numeric($country_id)){

		$CI =& get_instance();

		$query = $CI->db->get_where('country',array('country_id'=>$country_id));

		

		if($query->num_rows()>0)

		{	

			$result = $query->row();

			return $result->country_name;

		}

		}

		

		return $country_id;

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

		}

		

		return $state_id;

	}







/*************** new dashboard section **********/

function my_total_project_count($uid)

{

		$CI =& get_instance();

		$query = $CI->db->get_where('project',array('user_id'=>$uid));

		

		return $query->num_rows();

} 



function my_total_project($uid)

{

		$CI =& get_instance();

		$query = $CI->db->get_where('project',array('user_id'=>$uid));

		

		if($query->num_rows() > 0){

			return $query->result();

		}

		return 0;

} 



function total_project_comment($pid){

	$CI =& get_instance();

	$query = $CI->db->get_where('comment',array('project_id'=>$pid));

		

	return $query->num_rows();

}



function my_total_project_complete_count($uid){

		$CI =& get_instance();

		$query = $CI->db->query("select * from project where user_id='".$uid."' and end_date < now() and active_cnt=1");

		

		return $query->num_rows();

}



function my_total_project_running_count($uid){

		$CI =& get_instance();

		$query = $CI->db->query("select * from project where user_id='".$uid."' and end_date >= now() and active=1 and status=1");

		

		return $query->num_rows();

}



function my_total_follower($uid){

		$CI =& get_instance();

		$query = $CI->db->get_where('user_follow',array('follow_user_id'=>$uid));

		return $query->num_rows();

}



function my_total_following($uid){

		$CI =& get_instance();

		$query = $CI->db->get_where('user_follow',array('follow_by_user_id'=>$uid));

		return $query->num_rows();

}



function my_total_donations($uid){

		$CI =& get_instance();

		$query = $CI->db->query("select SUM(amount) as amt from transaction where user_id='".$uid."' and wallet_payment_status<>'2'");

		if($query->num_rows() > 0){

			$r = $query->row();

			return set_currency($r->amt);

		}

		return 0;

}



function my_total_completed_donations($uid){

	$CI =& get_instance();

	$query = $CI->db->query("select * from project where end_date < now() and active_cnt=1 and project_id in (select project_id from transaction where user_id='".$uid."' and wallet_payment_status<>'2')");

	

	return $query->num_rows();

}





function my_total_running_donations($uid){

	$CI =& get_instance();

	$query = $CI->db->query("select * from project where end_date >= now() and active=1 and status=1 and project_id in (select project_id from transaction where user_id='".$uid."' and wallet_payment_status<>'2')");

	

	return $query->num_rows();

}









function my_total_recieved_donations($uid){

		$CI =& get_instance();

		$query = $CI->db->query("select SUM(amount) as amt from transaction where wallet_payment_status<>'2' and project_id in (select project_id from project where user_id='".$uid."')");

		if($query->num_rows() > 0){

			$r = $query->row();

			return set_currency($r->amt);

		}

		return 0;

}



function my_total_completed_recieved_donations($uid){

	$CI =& get_instance();

	$query = $CI->db->query("select * from project where end_date < now() and active_cnt=1 and user_id='".$uid."' and project_id in (select project_id from transaction where wallet_payment_status<>'2')");

	

	return $query->num_rows();

}





function my_total_running_recieved_donations($uid){

	$CI =& get_instance();

	$query = $CI->db->query("select * from project where end_date >= now() and active=1 and status=1 and user_id='".$uid."' and project_id in (select project_id from transaction where wallet_payment_status<>'2')");

	

	return $query->num_rows();

}





/*************** this week section **********/



function first_and_last_day(){

	$date = date('Y-m-d');

	$first_day = get_first_day_of_week($date);

	$last_day = get_last_day_of_week($date);

	$str = date('D m/d',strtotime($first_day)).' - '.date('D m/d',strtotime($last_day));

	

	return $str;

}



function first_and_last_date_of_week(){

	$date = date('Y-m-d');

	$first_day = get_first_day_of_week($date);

	$last_day = get_last_day_of_week($date);

	$str = date('Y-m-d',strtotime($first_day)).' / '.date('Y-m-d',strtotime($last_day));

	

	return $str;

}



function my_total_week_project_count($uid)

{

		$CI =& get_instance();

		

		$date = date('Y-m-d');

		$first_day = get_first_day_of_week($date);

		$last_day = get_last_day_of_week($date);

		

		$query = $CI->db->query("select * from project where user_id='".$uid."' and DATE(date_added) between ".$first_day." and ".$last_day."");

		

		return $query->num_rows();

} 



function my_total_week_recieved_donations($uid){

		$CI =& get_instance();

		$date = date('Y-m-d');

		$first_day = get_first_day_of_week($date);

		$last_day = get_last_day_of_week($date);

			

		$query = $CI->db->query("select SUM(amount) as amt from transaction where wallet_payment_status<>'2' and DATE(transaction_date_time) between ".$first_day." and ".$last_day." and project_id in (select project_id from project where user_id='".$uid."')");

		if($query->num_rows() > 0){

			$r = $query->row();

			return set_currency($r->amt);

		}

		return 0;

}





function my_total_week_follower($uid){

		$CI =& get_instance();

		$date = date('Y-m-d');

		$first_day = get_first_day_of_week($date);

		$last_day = get_last_day_of_week($date);

		$query = $CI->db->query("select * from project_follower where DATE(project_follow_date) between ".$first_day." and ".$last_day." and project_id in (select project_id from project where user_id = '".$uid."')");

		

		return $query->num_rows();

}





function my_total_week_comment($uid){

		$CI =& get_instance();

		$date = date('Y-m-d');

		$first_day = get_first_day_of_week($date);

		$last_day = get_last_day_of_week($date);

		$query = $CI->db->query("select * from comment where DATE(date_added) between ".$first_day." and ".$last_day." and project_id in (select project_id from project where user_id = '".$uid."')");

		

		return $query->num_rows();

}



/*************** graph section **********/

	

	/**

	 * @param DateTime $date A given date

	 * @param int $firstDay 0-6, Sun-Sat respectively

	 * @return DateTime

	 */

	function get_first_day_of_graph($date) 

	{

		 $day_of_week = date('N', strtotime($date)); 

		 $week_first_day = date('Y-m-d', strtotime($date . " - " . ($day_of_week - 1) . " days")); 

		 $first_day = date('Y-m-d', strtotime($week_first_day . " - 30 days")); 

		 return $first_day;

	}



	

function get_weekly_project_graph($uid)

{

		$CI =& get_instance();

		$date=date('Y-m-d');

		

		 $first_date= get_first_day_of_graph($date);

		 $last_date= $date;	

		

		

		$week_reg_arr=array();

		

		

 $daily_ar=array();

 $temp_don1=0;

 	 $get_donation1=$CI->db->query("select * from transaction where project_id in (select project_id from project where user_id = '".$uid."')"); 

	 

	 if($get_donation1->num_rows()>0) {

	 

	

	$l_month=date('m');

	 

		$num1 = cal_days_in_month(CAL_GREGORIAN,$l_month, date('Y',strtotime($first_date))) ; 

			

			

			for($d=1;$d<=$num1;$d++)

			{

					

				$get_total1=$CI->db->query("select SUM(amount) as amt from transaction where DAY(transaction_date_time)='".$d."' and project_id in (select project_id from project where user_id = '".$uid."')");

				$temp_don1=0;

				if($get_total1->num_rows()>0)

				{

					$r=$get_total1->row();

					if($r->amt!=null and $r->amt!=''){

						$temp_don1=$r->amt;

					}

										

				}

				$daily_ar[$d]=$temp_don1;

		

		

			}

				

				

			 

			 }

			 

	 else

	 {

	 

	 

	 

			 $num = cal_days_in_month(CAL_GREGORIAN, date('m'),date('Y')) ; 

						

			for($d=1;$d<=$num;$d++) 

			

			{ 

			

							

				

			 $daily_ar[$d]=0;

						

					 

			}

			 

			 

	 

	 }

 

 

	

//echo "<pre>";

//print_r($daily_ar);	 die;

				

 	return $daily_ar;

}



function get_days_series(){

	$date=date('Y-m-d');

		

	$first_date= date('d-M-Y',strtotime(get_first_day_of_graph($date)));

	$last_date= $date;	

		

	$week_ar=array();	

	

	for($m=1;$m<=5;$m++)

	{

			$week_ar[$m] = $first_date;

			$first_date = 	date('d-M-Y', strtotime($first_date . " + 8 days")); 		

	} ////for

			 

//echo "<pre>";

//print_r($week_ar);	 die;

	return $week_ar;

}

	

	

function get_weekly_project_pie_graph($uid)

{

	

	$CI =& get_instance();

	$date = date('Y-m-d');

	$first_day = get_first_day_of_week($date);

	$last_day = get_last_day_of_week($date);

	$raised = 0;

	$goal = 0;

	

	$query1 = $CI->db->query("select SUM(amount) as amt from transaction where wallet_payment_status<>'2' and DATE(transaction_date_time) between ".$first_day." and ".$last_day." and project_id in (select project_id from project where user_id='".$uid."')");

	

	if($query1->num_rows() > 0){

		$r = $query1->row();

		if($r->amt!=null and $r->amt!=''){

			$raised = $r->amt;

		}

		

	}

	

	$query2 = $CI->db->query("select SUM(amount) as amt from project where  user_id='".$uid."' and active_cnt=1");

	

	if($query2->num_rows() > 0){

		$r = $query2->row();

		$goal = $r->amt;

	}

	

	$ret = $raised.'_'.$goal;

	return $ret;

}

	

	/************ graph end ************/

function get_days_left($dateg='')

{

	

		$date1 = $dateg;

		$date2 = date("Y-m-d");

		$diff = abs(strtotime($date2) - strtotime($date1));

		$test = floor($diff / (60*60*24));

		$str = '';

			

			if(strtotime(date('Y-m-d',strtotime($dateg))) > strtotime(date('Y-m-d'))) 

			{

				$temp = floor($diff / (60*60*24));

			

				/*$str = ($dateg!="0000-00-00 00:00:00")? '<h2 class="day" >' .$test.'</h2><p class="raised" >'.DAYS_TO_GO.'</p>':'<h2 class="day" > </h2><p class="raised" >'.DAY_TO_GO.'</p>';*/
				
				$str = ($dateg!="0000-00-00 00:00:00")? '<div class="days">'.DAYS_TO_GO .' : <span>'. $test.'</span></div> ':'<div class="days">'.DAYS_TO_GO .' <span> </span></div> ';

			}else {

				

				$hours = 0;

				$minuts = 0;

				$dategg = $dateg;

				$date2 = date('Y-m-d H:i:s');



		if(strtotime(date('Y-m-d H:i:s',strtotime($dateg))) > strtotime(date('Y-m-d H:i:s'))) 

		{					

			

			//echo $date2;

			$diff2 = abs(strtotime($dategg) - strtotime($date2));

			$day1 = floor($diff2 / (60*60*24));

			

		

			$hours   = floor(($diff2 - $day1*60*60*24)/ (60*60));  

			$minuts  = floor(($diff2 - $day1*60*60*24 - $hours*60*60)/ 60); 

			$seconds = floor(($diff2 - $day1*60*60*24 - $hours*60*60 - $minuts*60)); 

			

			if($hours != 0 || $minuts!=0 || $seconds!=0){

				

					//	$str ='<h2 class="day" >'. $hours.'</h2><p class="raised" >'.HOURS_TO_GO.'</p>';
						$str = '<div class="days">'.HOURS_TO_GO .' : <span>'. $hours.'</span></div> ';
						if($hours != 0){						

							//$str = '<h2 class="day" >'.$hours.'</h2><p class="raised" >'.HOURS_TO_GO.'</p> ';
						$str = '<div class="days">'.HOURS_TO_GO .' : <span>'. $hours.'</span></div> ';
						}

						elseif($minuts != 0) { 

							//$str = '<h2 class="day" >'.$minuts.'</h2><p class="raised" >'.MINUTES_TO_GO.'</p> ';
							$str = '<div class="days">'.MINUTES_TO_GO .' : <span>'. $minuts.'</span></div> ';
						}

						else{

							//$str = '<h2 class="day" >'.$seconds.'</h2><p class="raised" >'.SECONDS_TO_GO.'</p>';
							$str = '<div class="days">'.SECONDS_TO_GO .' : <span>'. $seconds.'</span></div> ';
						}

						

					}

					else

					{

						//$str = '<h2 class="day" >0</h2><p class="raised">'.HOURS_TO_GO.'</p>';
						$str = '<div class="days">'.HOURS_TO_GO .' : <span>'. $hours.'</span></div> ';
					}

				}

				else

				{

					//$str = '<h2 class="day" >0 </h2><p class="raised" >'.HOURS_LEFT.'</p>';
					$str = '<div class="days">'.HOURS_LEFT .' : <span> 0 </span></div> ';
				}

				

			}

			return $str;

	}

	

	function get_all_curated_page_home()

	{	

		$CI =& get_instance();

		$CI->db->select('cu.*,us.*');

		$CI->db->from('curated cu');

		$CI->db->join('user us','cu.user_id=us.user_id','left');

		$CI->db->order_by('cu.curated_id','desc');		

		$query=$CI->db->get();
		

		if($query->num_rows()>0)

		{

			return $query->result();

		}

		

		return 0;

		

	}

	

	function get_all_city()

	{	

		$CI =& get_instance();

		$CI->db->select('project_city');

		$CI->db->from('project');

		$CI->db->where('active',1);

		$CI->db->group_by('project_city');

		$CI->db->order_by('project_city','asc');

		$query=$CI->db->get();

		

		

		if($query->num_rows()>0)

		{

		return $query->result();

		}

		

		return 0;

		

		

	}	

	

	function user_project_donation_count($uid){

	

		$CI =& get_instance();

		$query=$CI->db->query("select * from transaction where user_id='".$uid."' group by project_id");

		//$query= $CI->db->get_where('transaction',array('user_id'=>$uid));

		

		if($query->num_rows()>0){

			return $query->num_rows();

		}else{ return 0; }

	}

	

	/* get blog active category*/

	function get_blog_catregory()

		{

			$CI =& get_instance();

			$CI->db->order_by('blog_category_id','desc');

			$query = $CI->db->get('blog_category');

			

	

			if ($query->num_rows() > 0) {

				return $query->result();

			}

			return 0;

		}

	/* end of get blog active category*/

	/* get blog setting*/

	function blog_setting()

		{		

				

			$CI =& get_instance();

			$query = $CI->db->get("blog_setting");

			return $query->row();

			

		

		}

	function blog_category()

		{		

				

			$CI =& get_instance();

			$CI->db->where('active',1);

			$query = $CI->db->get("blog_category");

			return $query->result();

			

		

		}

		

/* end of get blog setting*/

function get_project_backer_id($id=null){

		$CI =& get_instance();

			

			

			$query=$CI->db->query('select user_id from transaction where project_id='.$id.' and user_id='.get_authenticateUserID().' GROUP BY project_id');

			if($query->num_rows()>0){

				$result=$query->row();

				return $result->user_id;

			}else{ return 0; }

	}

	

	

	/* get active category for graph*/

	function get_user_project_catregory_for_graph($user_id)

		{

			

		

			$CI =& get_instance();

			

			$query=$CI->db->query('select * from project_category WHERE parent_project_category_id = 0');

			

			//$query=$CI->db->query('select project.*,project_category.project_category_id,project_category.category_color_code,project_category.project_category_name from project,project_category where project.category_id = project_category.project_category_id and project.user_id='.$user_id.' GROUP BY project_category.project_category_id');

			

			/*

			select project_category.project_category_id,project_category.category_color_code,project_category.project_category_name from project_category left join project on project.category_id = project_category.project_category_id where project.user_id='.$user_id.' GROUP BY project_category.project_category_id

			

			

*/

			

			

			if($query->num_rows()>0){

				return $query->result();

			}

			else

			{

				return 0;

			}

			

		}

		

function my_backed_project($user_id='')

{

		$CI =& get_instance();

			$query=$CI->db->query('select project.*,transaction.transaction_date_time from project,transaction where project.project_id = transaction.project_id and transaction.user_id ='.$user_id.' GROUP BY project.project_id');

			if($query->num_rows()>0){

				return $query->result();

			}

			else

			{

				return 0;

			}

}		



function my_backed_category_project($project_category,$user_id)

{ 

			$CI =& get_instance();

			/*$query=$CI->db->query('select project.*,transaction.transaction_date_time from project,transaction where project.project_id = transaction.project_id and transaction.user_id='.$user_id.' and project.category_id='.$project_category.' GROUP BY project.project_id');*/
			if($project_category != 0){
			$query=$CI->db->query('select project.*,transaction.transaction_date_time from project,transaction where project.project_id = transaction.project_id and transaction.user_id='.$user_id.' and project.category_id IN (SELECT project_category_id FROM project_category WHERE  parent_project_category_id IN (SELECT `project_category_id` FROM `project_category` WHERE `parent_project_category_id` ='.$project_category .')) GROUP BY project.project_id');
			
			

			if($query->num_rows()>0){

				return $query->result();

			}

			else

			{

				return 0;

			}

			}

			

}



	function project_of_back_page($user_id='')

	{

		/*This function for set project of the day temporary we set latest project then change as per client requirement or today more funded*/

		$CI =& get_instance();

		$query=$CI->db->query("select * from project where active=1 and user_id=".$user_id." order by date_added desc LIMIT 1");	

		return $query->row();

	}

	

	function get_header_draft_project(){

	

	

		$CI =& get_instance();

			$query=$CI->db->query("SELECT * FROM `project` WHERE project_draft =0 AND user_id ='".get_authenticateUserID()."' LIMIT 0 , 5");

		

			if($query->num_rows()>0){

				return $query->result_array();

			}

		

	}

	

	function get_all_category()

	{

		$CI =& get_instance();

		$query = $CI->db->get_where("project_category",array('active'=>1));

		if($query->num_rows() > 0)

		{

			return $query->result();

		}

		else

		{

			return 0;

		}

	}
	
	function get_all_testimonials()
	{ 
		$CI =& get_instance();

		/*$query = $CI->db->get_where("testimonials",array('active'=>1));
		$CI->db->order_by('id','desc');
		$CI->db->limit(1);*/
		$query=$CI->db->query("select * from testimonials where active=1 order by id desc limit 1");
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return 0;
		}

	}
	
	function category_wise_launched_project($category_id='')

	{

		$CI =& get_instance();

		$query=$CI->db->query("SELECT * FROM `project` WHERE active=1 AND category_id ='".$category_id."' ");

		if($query->num_rows() > 0)

		{

			return $query->num_rows();

		}

		else

		{

			return 0;

		}

	}

	

	function category_wise_total_earn($category_id='')

	{

		$CI =& get_instance();

		$query=$CI->db->query("SELECT SUM(amount_get) as total FROM `project` WHERE project_draft=1 AND category_id ='".$category_id."' ");

		$result=$query->row();

		$total= $result->total;

		if($total)

		{

			return $total;

		}

		else{return 0;}

	}

	function category_wise_successfull_earn($category_id='')

	{

		$CI =& get_instance();

		$sites = $CI->db->query("select * from site_setting");

		$site_setting=$sites->row();

		$successful=$site_setting->successful;

		

		if($successful=='') { $successful='60'; }

		

		$query=$CI->db->query("select SUM(amount_get) as total from project where amount_get >= (amount * ".$successful." )/100 and project.amount<>'' and project_draft=1 and category_id ='".$category_id."'");

		$result=$query->row();

		$total= $result->total;

		if($total)

		{

			return $total;

		}

		else{return 0;}

	}

	function category_wise_unsuccessfull_earn($category_id='')

	{

		$CI =& get_instance();

		$sites = $CI->db->query("select * from site_setting");

		$site_setting=$sites->row();

		$successful=$site_setting->successful;

		

		if($successful=='') { $successful='60'; }

		

		$query=$CI->db->query("select SUM(amount_get) as total from project where amount_get <= (amount * ".$successful." )/100 and project.amount<>'' and project_draft=1 and category_id ='".$category_id."'");

		$result=$query->row();

		$total= $result->total;

		if($total)

		{

			return $total;

		}

		else{return 0;}

	}

	

	function category_wise_live_dollars($category_id='')

	{

		$CI =& get_instance();

		$query=$CI->db->query("select SUM(amount_get) as total from project where project_draft=1 and active=1 and category_id ='".$category_id."'");

		$result=$query->row();

		$total= $result->total;

		if($total)

		{

			return $total;

		}

		else{return 0;}

	}

	

	function category_wise_live_projects($category_id='')

	{

		$CI =& get_instance();

		$query=$CI->db->query("SELECT * FROM `project` WHERE active=1 AND category_id ='".$category_id."' ");

		if($query->num_rows() > 0)

		{

			return $query->num_rows();

		}

		else

		{

			return 0;

		}

	}

	

	function category_wise_successfull_rate($category_id='')

	{

		$CI =& get_instance();

		$query=$CI->db->query("SELECT * FROM `project` WHERE active=1 AND category_id ='".$category_id."' ");

		$totalproject=$query->num_rows();

		

		$sites = $CI->db->query("select * from site_setting");

		$site_setting=$sites->row();

		

		$successful=$site_setting->successful;

		if($successful=='') { $successful='60'; }

		

		$query2 = $CI->db->query("select * from project where amount_get >= (amount * ".$successful." )/100 and amount<>'' and project_draft=1 and category_id ='".$category_id."'");	

		$totalsuccessproject=$query->num_rows();

		

		if($totalproject > 0)

		{

			$totalsuccessrate = ($totalsuccessproject * 100)/ $totalproject;

			return round($totalsuccessrate,2).'%';

		}

		else

		{

			return '0.00%';

		}

		

		

	

		

	}

	

	

	function get_user_one_website($user_id)

	{

		$CI =& get_instance();

		

		$query=$CI->db->query("select * from user_website where user_id =".$user_id." limit 1");	

		

		if($query->num_rows()>0)

		{		

			return $query->row_array();

		}

		

		return 0;

		

	}

	

	function get_last_login($user_id=null){

		$CI =& get_instance();

		$query=$CI->db->query('select * from user_login where user_id='.$user_id.' order by login_date_time desc limit 1');

		

		$user_login_detail=$query->row();

		return $user_login_detail->login_date_time;

		

	}

	

	

?>