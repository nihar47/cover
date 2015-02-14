<?php



class Project_category_model extends CI_Model {

	

    function Project_category_model()

    {

        parent::__construct();

    }   

	

	

	function get_image_setting_data(){

		$query = $this->db->get_where('image_setting');

		return $query->row_array();

	}

	

	function get_category($parent_id = 0)

	{	

		$this->db->where(array('active'=>1,'parent_project_category_id'=>$parent_id)); // modification for checking parent cat id

		$this->db->order_by('project_category_name','asc');

		$query=$this->db->get('project_category');

		return $query->result();

	}
	
	
	
	function get_one_category($id,$flag=0)
	{	
	
	    $query="SELECT a.project_category_name, b.project_category_name, IF( a.project_category_id =0, 0, a.parent_project_category_id ) AS l
FROM project_category AS a
LEFT JOIN project_category AS b ON a.parent_project_category_id = b.project_category_id
WHERE a.project_category_id =".$id."
LIMIT 0 , 30";


 

		//$this->db->where(array('project_category_id'=>$id));
		//$this->db->order_by('project_category_name','asc');
		//$query=$this->db->get('project_category');
		$result1 = mysql_query($query);
		$result_final=mysql_fetch_array($result1);
			
		if($result_final){
		return $result_final;
		 //return $result->result_array();
		}else{
			return "";
		}
		
		
		
	}
	

	function get_parent_category($parent_id = 0)
	{	
		$this->db->where(array('active'=>1,'parent_project_category_id'=>$parent_id));
		$this->db->order_by('project_category_name','asc');
		$query=$this->db->get('project_category');
		if($query->num_rows()>0){
		return $query->result();
		}else{
			return "";
		}
	}

	function get_status()

	{	

		$this->db->order_by('project_status_id','asc');

		$query=$this->db->get('project_status');

		return $query->result();

	}

	

	

	function active_user_list()

	{

		$query=$this->db->query("select * from user where active='1' order by user_name asc");

		return $query->result();

	

	}

	

	function admin_list()

	{

		$query=$this->db->query("select * from admin where active='1' order by username asc");

		return $query->result();

	

	}

	

	function select_site_setting()

	{

		$query = $this->db->query("select * from site_setting");

		return $query->row_array();

	}

	

	

	

	function get_paypal_adptive_status()

	{

			 

	 $paypal_adaptive_detail=$this->db->query("select * from paypal");

	 $paypal=$paypal_adaptive_detail->row(); 

	 

	 return $paypal->gateway_status;

	 

	 

	

	}

	

	function get_paypal_normal_status()

	{

		$site_setting_detail=$this->db->query("select * from site_setting");

	 	$site_setting=$site_setting_detail->row();

		

		return $site_setting->normal_paypal;

	

	}

	

	function get_amazon_status()

	{

		$amazon_detail=$this->db->query("select * from amazon");

		$amazons=$amazon_detail->row();

		

		return $amazons->gateway_status;

	}

	

	

	

	

	//////////////////////////////////////////////==========================//////////////////////////*********************//////

	

	

	function delete_project($id)

	{

		

		$CI =& get_instance();

		$base_path = $CI->config->slash_item('base_path');

		

		

		

		

		

		

		/////===updates=====

		

		$chk_updates=$this->db->query("select * from updates where project_id='".$id."'");

		

		if($chk_updates->num_rows()>0)

		{

				

			$updates=$chk_updates->result();

			

			

			

			foreach($updates as $up)

			{

				

				

						if(is_file($base_path.'upload/thumb/'.$up->image)) 

						{

						

							if($up->image!='no_img.jpg')

							{

								$link1=$base_path.'upload/thumb/'.$up->image;

								unlink($link1);

							}

						

						}

						

						

						

						if(is_file($base_path.'upload/orig/'.$up->image)) 

						{

						

							if($up->image!='no_img.jpg')

							{

								$link2=$base_path.'upload/orig/'.$up->image;

								unlink($link2);

							}

						

						}

						

						

						

					

						

						

						$this->db->query("delete from updates where update_id='".$up->update_id."'");	

						

					

			}

		

						

				

		}

		

		

		

		/////===gallery=====

		

		$chk_gallery=$this->db->query("select * from project_gallery where project_id='".$id."'");

		

		if($chk_gallery->num_rows()>0)

		{

			

			$gallery=$chk_gallery->result();

			

			foreach($gallery as $gal)

			{

				

				

						if(is_file($base_path.'upload/thumb/'.$gal->project_image)) 

						{

						

							if($gal->project_image!='no_img.jpg')

							{

								$link1=$base_path.'upload/thumb/'.$gal->project_image;

								unlink($link1);

							}

						

						}

						

						

						if(is_file($base_path.'upload/orig/'.$gal->project_image)) 

						{

						

							if($gal->project_image!='no_img.jpg')

							{

								$link2=$base_path.'upload/orig/'.$gal->project_image;

								unlink($link2);

							}

						

						}

					

						

						

						$this->db->query("delete from project_gallery where project_gallery_id='".$gal->project_gallery_id."'");	

						

					

			}

			

			

			

		}

		

		

		/////===perk=====

		

		$chk_perk=$this->db->query("select * from perk where project_id='".$id."'");

		

		if($chk_perk->num_rows()>0)

		{

			

			$perk=$chk_perk->result();

			

			foreach($perk as $prk)

			{				

				$this->db->query("delete from perk where perk_id='".$prk->perk_id."'");	

								

			}

			

			

			

		}

		

		

		/////===transaction=====

		

		$chk_trans=$this->db->query("select * from transaction where project_id='".$id."'");

		

		if($chk_trans->num_rows()>0)

		{

			

			$trans=$chk_trans->result();

			

			foreach($trans as $trn)

			{				

				$this->db->query("delete from transaction where transaction_id='".$trn->transaction_id."'");	

								

			}

			

		}

		

		

		/////===comment=====

		

		$chk_comment=$this->db->query("select * from comment where project_id='".$id."'");

		

		if($chk_comment->num_rows()>0)

		{

			

			$comment=$chk_comment->result();

			

			foreach($comment as $cmt)

			{

				

				

						if(is_file($base_path.'upload/thumb/'.$cmt->photo)) 

						{

						

							if($cmt->photo!='no_man.gif')

							{

								$link1=$base_path.'upload/thumb/'.$cmt->photo;

								unlink($link1);

							}

						

						}

						

						

						if(is_file($base_path.'upload/orig/'.$cmt->photo)) 

						{

						

							if($cmt->photo!='no_man.gif')

							{

								$link2=$base_path.'upload/orig/'.$cmt->photo;

								unlink($link2);

							}

						

						}					

						

						

						$this->db->query("delete from comment where comment_id='".$cmt->comment_id."'");	

						

					

			}

			

			

		}

		

		

		

		//////======wallet======

		

		$chk_wallet=$this->db->query("select * from wallet where project_id='".$id."'");

		

		if($chk_wallet->num_rows()>0)

		{

			$this->db->query("delete from wallet where project_id='".$id."'");

		}

		

		

		

		

				//////====project====

				

				

				$chk_project=$this->db->query("select * from project where project_id='".$id."'");

				

				if($chk_project->num_rows()>0)

				{

					

					$project=$chk_project->row();

					

								if(is_file($base_path.'upload/thumb/'.$project->image)) 

								{

								

									if($project->image!='no_img.jpg')

									{

										$link1=$base_path.'upload/thumb/'.$project->image;

										unlink($link1);

									}

								

								}

								

								

								if(is_file($base_path.'upload/orig/'.$project->image)) 

								{

								

									if($project->image!='no_img.jpg')

									{

										$link2=$base_path.'upload/orig/'.$project->image;

										unlink($link2);

									}

								

								}	

								

								

								

								if(is_file($base_path.'upload/video/'.$project->custom_video)) 

								{

								

									if($project->custom_video!='')

									{

										$link2=$base_path.'upload/video/'.$project->custom_video;

										unlink($link2);

									}

								

								}						

								

								

								$this->db->query("delete from project where project_id='".$id."'");		

								

					

					}

				

		

		

		

		

		

		

		

	}

	

	

	function create_project()

	{	/*echo "<pre>";

		print_r($_POST);die;*/

		$video_url='';

		

		$video_custom='';

		

		$CI =& get_instance();

		$base_path = $CI->config->slash_item('base_path');

		

		

		/////==video=======

			

	if($this->input->post('video_set')==1)

	{

			

			if($_FILES['videofile']['name']!="")

			{

				//$dest = 'upload/video/' . basename( $_FILES['videofile']['name']);

				//move_uploaded_file($_FILES['videofile']['tmp_name'],$dest);

				$errors = 0;

				$error ='';

				$video=$_FILES['videofile']['name'];

				//if ($this->home_model->commandExists("ffmpeg")>0) {

				if ($video)

				{

					$filename = stripslashes($_FILES['videofile']['name']);

					//$extension = $this->home_model->getExtension($filename);

					$extension = "avi";

					$extension = strtolower($extension);

					

					if (($extension != "avi") && ($extension != "mp3"))

					{

						$error ='Unknown extension!';

						$errors=1;

						//return;

					}

					

					

						if($extension == "flv")

						{

							$imganame=rand(1,10000).'myvideo.flv';

							$copied = move_uploaded_file($_FILES['videofile']['tmp_name'], $imganame);

							

							if (!$copied)

							{

							$errors=1;

							$error = "Could not upload the video please try again.";

							}

						}

						

						else

						{

							$image_name=time().'.'.$extension;

							//the new name will be containing the full path where will be stored (images folder)

							$newname=$base_path."upload/video/".$image_name;

							//we verify if the image has been uploaded, and print error instead

							

							

							/*-i input file name

							-ar audio sampling rate in Hz

							-ab audio bit rate in kbit/s

							-f output format

							-s output dimension*/

							//ffmpeg -i $image_name flv | flvtool2 -U stdin

							//$baseurl = $base_path;

							

							

							// exec("ffmpeg -i ".$baseurl."uploads/video".$newname." -sameq -acodec mp3 -ar 22050 -ab 32 -f flv -s 320x240 ".$baseurl()."uploads/video/flvfiles/".$newname.".flv");

							$t_name=$_FILES['videofile']['tmp_name'];

							//echo "<br>";

							$imganame=rand(1,10000).'myvideo.flv';

							

							$dest = $base_path."upload/video/".$imganame;

							//exit;

							// Command to encode movie to flash video

							// use escapeshellcmd to make the command safe

							$command = escapeshellcmd('ffmpeg -i ' . $t_name . ' -ab 56 -ar 22050 -f flv -b 500 -r 15 -s 320x240 ' . $dest);

							//$copied = copy($_FILES['video_file']['tmp_name'], $imganame);

							// Execute the command

							exec($command);

						}

					}

				//}

			}





			$video_custom=$imganame;

	

	}	

	

	

	if($this->input->post('video_set')==0)

	{

	

		if($this->input->post('video')=='')

		{

			$video_url='';

		}

		else

		{

			$video_url=$this->input->post('video');

		}

		

	

	}

	

	





////////////====video============



		

		

		if($this->input->post('user_type')=='admin') {

			

			

			$get_admin= $this->db->query("select * from admin where admin_type='1' order by admin_id desc");		

			$admin_detail = $get_admin->row();

			

			

			

			$chk_admin_exsits=$this->db->query("select * from user where is_admin='1'");

			

			if($chk_admin_exsits->num_rows()>0)

			{

				$user_detail=$chk_admin_exsits->row();

				$user_id=$user_detail->user_id;

			}

					

			else

			{

				$insert=$this->db->query("insert into user(user_name,email,password,active,signup_ip,date_added,is_admin)values('".$admin_detail->username."','".$admin_detail->email."','".$admin_detail->password."','1','".$_SERVER['REMOTE_ADDR']."','".date('Y-m-d')."','1')");

				

				$user_id=mysql_insert_id();

				

			}

		

		}

		

		if($this->input->post('user_type')=='user') {

		$user_id=$this->input->post('user_id');

			

		}

		

		if($this->input->post('user_type')=='admin')

		{

			$staff_picks=1;

		}

		else

		{

			$staff_picks=0;

		}

		

		

			$total_days=$this->input->post('total_days')-1;

	$url_project_title = seoUrl($this->input->post('project_title'));

			//$url_project_title=strtolower(str_replace(' ','-',trim(preg_replace("[^A-Za-z0-9 ]", " ", str_replace("'","",str_replace(array(',','+','"','%','!','@','#','$','^','&','*','(',')',';','?','<','>','/',':','`','~','-','.','..','...'),'',$this->input->post('project_title')))))));

			

			

			

			$chk_url_exists=$this->db->query("select MAX(url_project_title) as url_project_title from project where url_project_title like '".$url_project_title."%'");

		

		if($chk_url_exists->num_rows()>0)

		{			

				$get_pr=$chk_url_exists->row();

				

				

				

				

				$strre=str_replace($url_project_title,'',$get_pr->url_project_title);

				

				if($strre=='' || $strre=='0') {

					

						$newcnt='1';   

				

				}

				else

				{

				

				$newcnt=(int)$strre+1;

			

				}

				

			 	$url_project_title=$url_project_title.$newcnt;	

			

			

			

		

		}

			

		$rs = site_setting();

		$project_city = '';

		$project_state = '';

		$project_country = '';

			

		$address = explode(',',$this->input->post('project_address'));

		 $cnt = count($address);

		

		 $fetch = $cnt - $rs['address_limit'];

		

		

		if(count($address) <= $fetch || $fetch <= 0){

			

			if(isset($address[$cnt-3])) $project_city = $address[$cnt-3];

			if(isset($address[$cnt-2])) $project_state = $address[$cnt-2];

			if(isset($address[$cnt-1])) $project_country = $address[$cnt-1];

		

		}else{

			

			 $project_city = $address[$fetch];

			 $project_state = $address[$fetch+1];

			 $project_country = $address[$fetch+2];

		}	

			

			

		

		$data_project=array(

		

			'user_id'=>$user_id,

			'category_id'=>$this->input->post('category_id'),

			'project_title'=>$this->input->post('project_title'),

			'url_project_title'=>$url_project_title,

			'project_summary'=>$this->input->post('project_summary'),

			'project_address'=>$this->input->post('project_address'),		

			'project_city'=>$project_city,

			'project_state'=>$project_state,

			'project_country'=>$project_country,	

			'p_google_code'=>$this->input->post('p_google_code'),			

			'description'=>$this->input->post('description'),

			'display_page'=>$this->input->post('projectimagevideoset'),

			'amount' => $this->input->post('amount'),

			'date_added' =>date('Y-m-d H:i:s'),

			'end_date' => date('Y-m-d H:i:s',strtotime("+".$total_days." days")),

			'host_ip'=>$_SERVER['REMOTE_ADDR'],

			'status'=>1,

			'active'=>0,

			'project_draft'=>1,

			'video_type'=>$this->input->post('video_set'),

			'video'=>$video_url,

			'custom_video'=>$video_custom,

			'total_days'=> $this->input->post('total_days'),

			'payment_type'=>$this->input->post('payment_type'),

			'staff_pickup'=>$staff_picks

		);	

		

		$this->db->insert('project',$data_project);	

		

		

		$project_id=mysql_insert_id();

		

		$data_proj_ses=array(

		

		'project_id'=>$project_id,

		'project_title'=>$this->input->post('project_title'),

		'url_project_title' => $url_project_title,

					

		);

		

		$this->session->set_userdata($data_proj_ses);

		

		

		

		

		//////////=====upload gallery========

		

	$image_settings = $this->get_image_setting_data();	

	if($_FILES['file_up']['name']!='')

	{

		

		

		

		$cnt=1; 

    	

		$this->load->library('upload');

		$rand=rand(0,100000);



		 for($i=0;$i<count($_FILES['file_up']['name']);$i++)

		 {

		 

		  	if($_FILES['file_up']['name'][$i]!='')

			{

			

				$_FILES['userfile']['name']    =   $_FILES['file_up']['name'][$i];

				$_FILES['userfile']['type']    =   $_FILES['file_up']['type'][$i];

				$_FILES['userfile']['tmp_name'] =   $_FILES['file_up']['tmp_name'][$i];

				$_FILES['userfile']['error']       =   $_FILES['file_up']['error'][$i];

				$_FILES['userfile']['size']    =   $_FILES['file_up']['size'][$i]; 

				  

						

		   

				/*$config['file_name']     = $rand.'project_'.$i;

				$config['upload_path'] = $base_path.'upload/orig/';					

				$config['allowed_types'] = 'jpg|jpeg|gif|png|bmp';

					  

			  

			   $this->upload->initialize($config);

			 

			 

					if (!$this->upload->do_upload())

					{		

						

					 $error =  $this->upload->display_errors();

					   

					} 

					

						$picture = $this->upload->data();

						

						$this->load->library('image_lib');

						

						

						$this->image_lib->clear();

						

						$this->image_lib->initialize(array(

						'image_library' => 'gd2',

						'source_image' => $base_path.'upload/orig/'.$picture['file_name'],

						'new_image' => $base_path.'upload/thumb/'.$picture['file_name'],

						'maintain_ratio' => $image_settings['g_ratio'],

						'quality' => '100%',

						'width' => $image_settings['g_width'],

						'height' => $image_settings['g_height']

						));

									

									

						if(!$this->image_lib->resize()){

						

								$error = $this->image_lib->display_errors();

								

						}*/

						

						$rand=rand(0,100000); 

			$files=$_FILES;	


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

						/* Thumb Image Close here */
						
						/* Slider image Starts here */
						
						$slide_w = $image_settings['p_width']; //You can change these to fit the width and height you want

						$slide_h = $image_settings['p_height'];
						
						/* Slider image ends here */
						
						/* Smallthumb Starts here */
						
						$smallthumb_w = $image_settings['u_width']; //You can change these to fit the width and height you want

						$smallthumb_h = $image_settings['u_height'];

						

						$orig_w = imagesx($source_img);

						$orig_h = imagesy($source_img);

						

						$w_ratio = ($new_w / $orig_w);

						$h_ratio = ($new_h / $orig_h);

						

						

						$crop_w = $new_w;

						$crop_h = $new_h;

						/* Slider image Starts here */
						$slidecrop_w = $slide_w;

						$slidecrop_h = $slide_h;
						/* Slider image ends here */
						
						/* SmallThumb image Starts here */
						$smallthumbcrop_w = $smallthumb_w;

						$smallthumbcrop_h = $smallthumb_h;
						/* SmallThumb image ends here */

						

						$dest_img = imagecreatetruecolor($new_w,$new_h);

						imagecopyresampled($dest_img, $source_img, 0 , 0 , 0, 0, $crop_w, $crop_h, $orig_w, $orig_h);

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

							

								if(imagejpeg($dest_img, $base_path."upload/thumb/".$new_img)) {

									imagejpeg($dest_img, $base_path."upload/orig/".$new_img);

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

								if(imagepng($dest_img, $base_path."upload/thumb/".$new_img)) {

									imagepng($dest_img, $base_path."upload/orig/".$new_img);

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
                          //echo 'hi';exit;
                           
								if(imagegif($dest_img, $base_path."upload/thumb/".$new_img)) {
									                        //  echo 'hihello';exit;

									imagegif($dest_img, $base_path."upload/orig/".$new_img);

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

						

	

					

					$data_gallery=array(

					

					'project_id'=>$project_id,

					'project_image'=>$new_img		

					

					);

					

					

					$this->db->insert('project_gallery',$data_gallery);

				

				

					if($cnt==1)

					{	

						$main_image=$new_img ;

						$this->db->query("update project set image='".$main_image."' where project_id='".$project_id."'");

						$cnt++;

					}

				

				

				

				}							

			}

   

   		

		}

		   		

		//////////=====upload gallery========

   	

   

   			

		///////=============perk ============

		

		

		

		$perk_description = $this->input->post('perk_description');

		$perk_amount = $this->input->post('perk_amount');

		$perk_total = $this->input->post('perk_total');

		$perk_delivery_date = $this->input->post('est_date');

		

		for($i=0; $i<count($perk_amount); $i++)

		{

		

			if($perk_description[$i]!='' && $perk_amount[$i]!='' && $perk_total[$i]!='')

			{

		

				$data_perk = array(

					'project_id' => $project_id,

					'perk_description' => $perk_description[$i],

					'perk_amount' => $perk_amount[$i],

					'perk_total' => $perk_total[$i],

					'perk_delivery_date'=>date('Y-m-d',strtotime($perk_delivery_date[$i])),

				);

				$this->db->insert('perk',$data_perk);

			}

			

			

		}		

		

		

		///////=======perk==========

		

		

		

				

		return $project_id;

   

   

    	

	

	}	

	

	

	/*function get_one_project($id)

	{		

		$query = $this->db->get_where('project',array('project_id' => $id));	

		

		if ($query->num_rows() > 0) {

			return $query->row_array();

		}

		return 0;	

	}*/

	

	function get_one_project($id)

	{	

		$this->db->select('project.*');

		$this->db->from('project');

		$this->db->join('user', 'project.user_id= user.user_id','left');

		$this->db->where('project.project_id',$id);	

		$query=$this->db->get();

		

		if ($query->num_rows() > 0) {

			return $query->row_array();

		}

		return 0;	

	}

	function project_update()

	{

		

	//print_r($_POST);die;

		

		$video_url='';

		

		$video_custom='';

		

		$CI =& get_instance();

		$base_path = $CI->config->slash_item('base_path');

		

	



		

		/////==video=======

			

	if($this->input->post('video_set')==1)

	{

			

			if($_FILES['videofile']['name']!="")

			{

				//$dest = 'upload/video/' . basename( $_FILES['videofile']['name']);

				//move_uploaded_file($_FILES['videofile']['tmp_name'],$dest);

				$errors = 0;

				$error ='';

				$video=$_FILES['videofile']['name'];

				//if ($this->home_model->commandExists("ffmpeg")>0) {

				if ($video)

				{

					$filename = stripslashes($_FILES['videofile']['name']);

					//$extension = $this->home_model->getExtension($filename);

					$extension = "avi";

					$extension = strtolower($extension);

					

					if (($extension != "avi") && ($extension != "mp3"))

					{

						$error ='Unknown extension!';

						$errors=1;

						//return;

					}

					

					

						if($extension == "flv")

						{

							$imganame=rand(1,10000).'myvideo.flv';

							$copied = move_uploaded_file($_FILES['videofile']['tmp_name'], $imganame);

							

							if (!$copied)

							{

							$errors=1;

							$error = "Could not upload the video please try again.";

							}

						}

						

						else

						{

							$image_name=time().'.'.$extension;

							//the new name will be containing the full path where will be stored (images folder)

							$newname=$base_path."upload/video/".$image_name;

							//we verify if the image has been uploaded, and print error instead

							

							

							/*-i input file name

							-ar audio sampling rate in Hz

							-ab audio bit rate in kbit/s

							-f output format

							-s output dimension*/

							//ffmpeg -i $image_name flv | flvtool2 -U stdin

							//$baseurl = $base_path;

							

							

							// exec("ffmpeg -i ".$baseurl."uploads/video".$newname." -sameq -acodec mp3 -ar 22050 -ab 32 -f flv -s 320x240 ".$baseurl()."uploads/video/flvfiles/".$newname.".flv");

							$t_name=$_FILES['videofile']['tmp_name'];

							//echo "<br>";

							$imganame=rand(1,10000).'myvideo.flv';

							

							$dest = $base_path."upload/video/".$imganame;

							//exit;

							// Command to encode movie to flash video

							// use escapeshellcmd to make the command safe

							$command = escapeshellcmd('ffmpeg -i ' . $t_name . ' -ab 56 -ar 22050 -f flv -b 500 -r 15 -s 320x240 ' . $dest);

							//$copied = copy($_FILES['video_file']['tmp_name'], $imganame);

							// Execute the command

							exec($command);

						}

					}

				//}

			

			$video_custom=$imganame;

			

		  }

		  	

			else

		  	{		  

		  		$video_custom=$this->input->post('prev_videofile');

		    }

	

	}	

	

	

	if($this->input->post('video_set')==0)

	{

	

		if($this->input->post('video')=='')

		{

			$video_url='';

		}

		else

		{

			$video_url=$this->input->post('video');

		}

		

	

	}

	



////////////====video============





$project_image='';

$image_settings = $this->get_image_setting_data();	
	
//echo $_FILES['file_up']['name'];exit;

if($_FILES['file_up']['name']!='')

	{

	    	

		$this->load->library('upload');

		$rand=rand(0,100000);



		

		  

			

				$_FILES['userfile']['name']     =   $_FILES['file_up']['name'];

				$_FILES['userfile']['type']     =   $_FILES['file_up']['type'];

				$_FILES['userfile']['tmp_name'] =   $_FILES['file_up']['tmp_name'];

				$_FILES['userfile']['error']    =   $_FILES['file_up']['error'];

				$_FILES['userfile']['size']     =   $_FILES['file_up']['size']; 

				  

						

		   

			/*	$config['file_name']     = $rand.'project_'.$this->input->post('project_id');

				$config['upload_path'] = $base_path.'upload/orig/';					

				$config['allowed_types'] = 'jpg|jpeg|gif|png|bmp';

					  

			  

			   $this->upload->initialize($config);

			 

			 

					if (!$this->upload->do_upload())

					{		

						

					 $error =  $this->upload->display_errors();

					 

					

					   

					} 

					

						$picture = $this->upload->data();

						

						$this->load->library('image_lib');

						

						

						$this->image_lib->clear();

						

						$this->image_lib->initialize(array(

						'image_library' => 'gd2',

						'source_image' => $base_path.'upload/orig/'.$picture['file_name'],

						'new_image' => $base_path.'upload/thumb/'.$picture['file_name'],

						'maintain_ratio' => $image_settings['p_ratio'],

						'quality' => '100%',

						'width' => $image_settings['p_width'],

						'height' => $image_settings['p_height']	

						));

									

									

						if(!$this->image_lib->resize()){

						

								 $error = $this->image_lib->display_errors();

								

						}

	*/

			$files=$_FILES;

			$rand=rand(0,100000); 

	

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

						

						

						$crop_w = $new_w;

						$crop_h = $new_h;


						/* Slider image Starts here */
						$slidecrop_w = $slide_w;

						$slidecrop_h = $slide_h;
						/* Slider image ends here */
						
						/* SmallThumb image Starts here */
						$smallthumbcrop_w = $smallthumb_w;

						$smallthumbcrop_h = $smallthumb_h;
						/* SmallThumb image ends here */

						

						

						$dest_img = imagecreatetruecolor($new_w,$new_h);

						imagecopyresampled($dest_img, $source_img, 0 , 0 , 0, 0, $crop_w, $crop_h, $orig_w, $orig_h);

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


						if(is_file('../upload/thumb/'.$_POST['prev_project_image']))
						{																	
  					    unlink('../upload/thumb/'.$_POST['prev_project_image']);
						}
						if(is_file('../upload/orig/'.$_POST['prev_project_image']))
						{																	
  					    unlink('../upload/orig/'.$_POST['prev_project_image']);
						}
						if(is_file('../upload/slider/'.$_POST['prev_project_image']))
						{																	
  					    unlink('../upload/slider/'.$_POST['prev_project_image']);
						}	
						if(is_file('../upload/small_thumb/'.$_POST['prev_project_image']))
						{																	
  					    unlink('../upload/small_thumb/'.$_POST['prev_project_image']);
						}																		

						if ($files["userfile"]["type"] == "image/jpeg" || $files["userfile"]["type"] == "image/pjpeg"){

							

								if(imagejpeg($dest_img,"../upload/thumb/".$new_img)) {

									imagejpeg($dest_img, "../upload/orig/".$new_img);

									imagedestroy($dest_img);

									imagedestroy($source_img);

								}
								if(imagejpeg($Slidedest_img, "../upload/slider/".$new_img)) {

									imagedestroy($Slidedest_img);

								}
								if(imagejpeg($SmallThumbdest_img, "../upload/small_thumb/".$new_img)) {

									imagedestroy($SmallThumbdest_img);

								}

								 /*else {

									echo "could not make profile image";

									exit(0);

								}*/

						}

						if ($files["userfile"]["type"] == "image/png" || $files["userfile"]["type"] == "image/x-png"){

								if(imagepng($dest_img, "../upload/thumb/".$new_img)) {

									imagepng($dest_img,"../upload/orig/".$new_img);

									imagedestroy($dest_img);

									imagedestroy($source_img);

								}
								if(imagejpeg($Slidedest_img, "../upload/slider/".$new_img)) {

									imagedestroy($Slidedest_img);

								}
								if(imagejpeg($SmallThumbdest_img, "../upload/small_thumb/".$new_img)) {

									imagedestroy($SmallThumbdest_img);

								}

								 /*else {

									echo "could not make profile image";

									exit(0);

								}*/

						}

						if ($files["userfile"]["type"] == "image/gif"){	
						//echo $new_img;

								if(imagegif($dest_img, "../upload/thumb/".$new_img)) {//echo 'in';

									imagegif($dest_img, "../upload/orig/".$new_img);

									imagedestroy($dest_img);

									imagedestroy($source_img);

								} 
									if(imagejpeg($Slidedest_img, "../upload/slider/".$new_img)) {

									imagedestroy($Slidedest_img);

								}
								if(imagejpeg($SmallThumbdest_img, "../upload/small_thumb/".$new_img)) {

									imagedestroy($SmallThumbdest_img);

								}
								/*else {

									echo "could not make profile image";

									exit(0);

								}*/

						}	

						

					

					

					$project_image=$new_img;

					

						

				

			   

   		

		} else {

				

					if($this->input->post('prev_project_image')!='')

					{

						$project_image=$this->input->post('prev_project_image');

					}

					

									

				}	









/////////=====image==============



		

		$total_days=$this->input->post('total_days');

		

		$get_project_detail=$this->db->query("select * from project where project_id='".$this->input->post('project_id')."'");

		

		$project_detail=$get_project_detail->row();

		

		

		$end_date=date("Y-m-d H:i:s",strtotime(date("Y-m-d H:i:s", strtotime($project_detail->date_added)) . "+".$total_days." days"));

		





$get_orig=$this->db->query("select * from project where project_id='".$this->input->post('project_id')."'");

$orig=$get_orig->row();





$orig_title=$orig->project_title;



$posted_url_title=$this->input->post('url_project_title');

$posted_title=$this->input->post('project_title');







		$url_project_title = seoUrl($this->input->post('project_title'));

		//$url_project_title=strtolower(str_replace(' ','-',trim(preg_replace("[^A-Za-z0-9 ]", " ", str_replace("'","",str_replace(array(',','+','"','%','!','@','#','$','^','&','*','(',')',';','?','<','>','/',':','`','~','-','.','..','...'),'',$this->input->post('project_title')))))));

	

	

	

	

	

if($posted_title=='' || $posted_title=='0')

{		

			

	$url_project_title='';



}

elseif($posted_title==$orig_title)

{

	

	$url_project_title=$this->input->post('url_project_title');

	

}

else

{

	

	

		$chk_url_exists=$this->db->query("select MAX(url_project_title) as url_project_title from project where project_id!='".$this->input->post('project_id')."' and  url_project_title like '".$url_project_title."%'");

	

		

		if($chk_url_exists->num_rows()>0)

		{

			

				$get_pr=$chk_url_exists->row();

				

				$strre=str_replace($url_project_title,'',$get_pr->url_project_title);

				

				if($strre=='' || $strre=='0') {

					

						$newcnt='1';   

				

				}

				else

				{

				

				$newcnt=(int)$strre+1;

			

				}

				

				$url_project_title=$url_project_title.$newcnt;

				

				

		

		}

	

}



		$rs = site_setting();

		$project_city = '';

		$project_state = '';

		$project_country = '';

			

		$address = explode(',',$this->input->post('project_address'));

		 $cnt = count($address);

		

		 $fetch = $cnt - $rs['address_limit'];

		

		

		if(count($address) <= $fetch || $fetch <= 0){

			

			if(isset($address[$cnt-3])) $project_city = $address[$cnt-3];

			if(isset($address[$cnt-2])) $project_state = $address[$cnt-2];

			if(isset($address[$cnt-1])) $project_country = $address[$cnt-1];

		

		}else{

			

			 $project_city = $address[$fetch];

			 $project_state = $address[$fetch+1];

			 $project_country = $address[$fetch+2];

		}	

	

	

	

	

	

	

	

		$data_project=array(		

			

			'category_id'=>$this->input->post('category_id'),

			'project_title'=>$this->input->post('project_title'),

			'url_project_title'=>$url_project_title,

			'project_summary'=>$this->input->post('project_summary'),

			'project_address'=>$this->input->post('project_address'),

			'project_city'=>$project_city,

			'project_state'=>$project_state,

			'project_country'=>$project_country,

			'p_google_code'=>$this->input->post('p_google_code'),

			'end_date' => $end_date,

			'total_days' => $total_days,

			'display_page'=>$this->input->post('projectimagevideoset'),

			'description'=>$this->input->post('description'),

			'amount' => $this->input->post('amount'),

			

			'status'=>1,

			'image'=>$project_image,		

			'video_type'=>$this->input->post('video_set'),

			'video'=>$video_url,

			'custom_video'=>$video_custom,

			'payment_type'=>$this->input->post('payment_type'),

		

		);	

		//print_r($data_project);die;

		

		

		

		$this->db->where('project_id',$this->input->post('project_id'));

		$this->db->update('project',$data_project);

				

		

		$data = array(

			'project_id' => $this->input->post('project_id'),

			'project_title' => $this->input->post('project_title'),

			'url_project_title' => $url_project_title,

		);

		$this->session->set_userdata($data);	

		

		

	}	

	

	

	

	

	

	

	

	

	/////////////////////=============Project Updates Section =======================

	

	

	function updates_insert()

	{		

		

		$image = "no_img.jpg";

		$up_txt=$this->input->post('updates');

		if($up_txt!='')

		{

			$up_txt=str_replace(array(",","`","'"),'',$this->input->post('updates'));

		

			$data = array(

				'project_id' => $this->input->post('project_id'),

				'updates' => $up_txt,

				'image'=>$image,

				'status' => '0',

				'date_added' => date("Y-m-d H:i:s"),

			);

			$this->db->insert('updates',$data);

		}

		

	}

	

	function get_total_updates_count($id)

	{

		$query = $this->db->get_where('updates',array('project_id' => $id));

		return $query->num_rows();

	}

	

	function get_some_updates($id, $offset, $limit)

	{

		$this->db->limit($limit,$offset);

		$query = $this->db->get_where('updates',array('project_id' => $id));

		if ($query->num_rows() > 0) {

			return $query->result_array();

		}

		return 0;

	}

	

	function get_updates($id)

	{

		$query = $this->db->get_where('updates',array('project_id' => $id));

		if ($query->num_rows() > 0) {

			return $query->result_array();

		}

		return 0;

	}

	

	

	

	/////////////////////=============Project Updates Section =======================

	

	

	

	

	

		/////////////////=================Perks=============

	

	

	

	function get_one_perk($perk_id)

	{

		$query = $this->db->get_where('perk',array('perk_id'=>$perk_id));

		return $query->row_array();

	}

	

	function insert_perk($project_id)

	{

		$perk_title = $this->input->post('perk_title');

		$perk_description = $this->input->post('perk_description');

		$perk_amount = $this->input->post('perk_amount');

		$perk_total = $this->input->post('perk_total');

		

			$data = array(

				'project_id' => $project_id,

				'perk_title' => $perk_title,

				'perk_description' => $perk_description,

				'perk_amount' => $perk_amount,

				'perk_total' => $perk_total,

			);

			$this->db->insert('perk',$data);

		

	}

	

	

	function update_perk()

	{

		$perk_title = $this->input->post('perk_title');

		$perk_description = $this->input->post('perk_description');

		$perk_amount = $this->input->post('perk_amount');

		$perk_total = $this->input->post('perk_total');

		

			$data = array(

				

				'perk_title' => $perk_title,

				'perk_description' => $perk_description,

				'perk_amount' => $perk_amount,

				'perk_total' => $perk_total,

			);

			

			$this->db->where('perk_id',$this->input->post('perk_id'));

			

			$this->db->update('perk',$data);

		

	}

	

	function get_all_perks($project_id='')

	{

		//$query = $this->db->query("select * from perk where project_id='".$project_id."' order by CAST(perk_amount as SIGNED INTEGER) ASC");

		$query = $this->db->query("select * from perk where project_id='".$project_id."' order by perk_id DESC");

		return $query->result_array();	

	}

	

	

	function get_perk_name($pid)

	{

		

		$query = $this->db->query("select * from perk where perk_id='".$pid."'");

		

		if($query->num_rows()>0)

		{

			$perk=$query->row();

			return $perk->perk_title;

		}

		else

		{

			return 0;

		}

		

	

	}

	

	

	/////////////////=================Perks=====================

	

	

	

	

	

	

	

	/////////////========project gallery============

	

	function get_total_project_gallery_count($id)

	{

		$query=$this->db->query("select * from project_gallery where project_id='".$id."' order by project_gallery_id asc");

		return $query->num_rows();	

	}

	

	

	function get_project_gallery($id,$offset, $limit)

	{

		$query=$this->db->query("select * from project_gallery where project_id='".$id."' order by project_gallery_id asc LIMIT ".$limit." OFFSET ".$offset);

		

		if($query->num_rows()>0)

		{

			return $query->result();

		}

		

		return 0;

	}

	

	

	function get_all_project_gallery($id)

	{

		$query=$this->db->query("select * from project_gallery where project_id='".$id."' order by project_gallery_id asc ");

		

		if($query->num_rows()>0)

		{

			return $query->result();

		}

		

		return 0;

	}

	

	

		

	/////////////========project gallery============

	

	

	

	

	

	

	

	

	

	

	/////////////////////=============Project Donation  Section =======================

	

	

	function get_total_donations_count($id)

	{

		

		

		$query="select * from transaction where project_id='".$id."' and wallet_payment_status<>'2' order by transaction_id desc";

		

		$s_result=$this->db->query($query);

		

		

		return $s_result->num_rows();

		

		

	}

	

	function get_donations($id, $offset, $limit)

	{

		

		$query2="select * from transaction where project_id='".$id."'  and wallet_payment_status<>'2' order by transaction_id desc LIMIT ".$limit." OFFSET ".$offset." ";

		

		$s_result2=$this->db->query($query2);

		

		if($s_result2->num_rows()>0)

		{

			return $s_result2->result_array();

		}

		return 0;

		

		

	}

	

	

	

	

	/////////////////////=============Project Donation  Section =======================

	

	

	

	

	

	

	

	

	

		/////////////////////=============Rating & Comment Section =======================

	

	

	function rating($id, $vote)

	{

		$query = $this->db->get_where('project',array('project_id' => $id));

		$prj = $query->row_array();

		

		$data = array(			

			'total_rate' => $prj['total_rate']+$vote,

			'vote' => $prj['vote']+1,

		);

		$this->db->where('project_id',$id);

		$this->db->update('project',$data);

		return ($prj['total_rate']+$vote)/($prj['vote']+1);

	}

	

	function comment_insert()

	{

		if($_FILES['photo']['name']!="")

		{

			$image = $this->upload->file_name;

		}else{

			$image = "no_person.png";

		}

		$data = array(

			'project_id' => $this->input->post('project_id'),

			'username' => $this->input->post('username'),

			'email' => $this->input->post('email'),

			'photo' => $image,

			'comments' => $this->input->post('comments'),

			'status' => '0',

			'date_added' => date("Y-m-d H:i:s"),

			'comment_ip' => $_SERVER['REMOTE_ADDR'],

		);

		$this->db->insert('comment',$data);

		

		

		return mysql_insert_id();

		

	}

	

	function get_user_detail($id)

	{

		$query=$this->db->get_where("user",array("user_id"=>$id));

		return $query->row_array();

	}

	

	function reply_insert()

	{

			

		$get_user=$this->db->get_where('admin',array('admin_id'=>$this->session->userdata('admin_id')));

		

		$user=$get_user->row_array();

		

		

		

		$cmid=$this->input->post('comment_id');

		

		

		$get_admin= $this->db->query("select * from admin where admin_id='".$this->session->userdata('admin_id')."'");		

		$admin_detail = $get_admin->row();

		

		$get_admin=$this->db->query("select * from user where is_admin='1'");

		

		if($get_admin->num_rows()>0)

		{

			$login_user=$get_admin->row_array();

			$user_id=$login_user['user_id'];

		}

		else

		{

			

			$insert=$this->db->query("insert into user(user_name,email,password,active,signup_ip,date_added,is_admin)values('".$admin_detail->username."','".$admin_detail->email."','".$admin_detail->password."','1','".$_SERVER['REMOTE_ADDR']."','".date('Y-m-d')."','1')");

			

			$user_id=mysql_insert_id();

		}

		

		$data = array(

			'project_id' =>$this->input->post('project_id'),

			'user_id' => $user_id,	

			'comments' => $this->input->post('comments'.$cmid),

			'status' => '1',

			'date_added' => date("Y-m-d H:i:s"),

			'comment_ip' => $_SERVER['REMOTE_ADDR'],

		);

		$this->db->insert('comment',$data);

		

		

		

		

	}

	

	function get_single_commnet($id)

	{

		$query = $this->db->get_where('comment',array('comment_id' => $id));

		if ($query->num_rows() > 0) {

			return $query->row_array();

			//return $res['color'];

		}

		return 0;	

	

	}

	

	function get_total_comments_count($id)

	{

		$query=$this->db->query("select c.comment_ip,c.status,c.comments,c.date_added,c.comment_id,u.user_name,u.last_name,u.image,u.user_id from comment c, user u  where c.user_id=u.user_id and c.project_id='".$id."' order by c.comment_id desc "); 

		

		return $query->num_rows();

	}

	

	function get_some_comments($id, $offset, $limit)

	{

		$query=$this->db->query("select c.comment_ip,c.status,c.comments,c.date_added,c.comment_id,u.user_name,u.last_name,u.image,u.user_id from comment c, user u  where c.user_id=u.user_id and c.project_id='".$id."' order by c.comment_id desc LIMIT ".$limit." OFFSET ".$offset); 

		if ($query->num_rows() > 0) {

			return $query->result_array();

		}

		return 0;

	}

	

	function get_comments($id)

	{

		$query = $this->db->get_where('comment',array('project_id' => $id,'status'=>1));

		if ($query->num_rows() > 0) {

			return $query->result_array();

		}

		return 0;

	}

	

	

	/////////////////////=============Comment Section =======================

	

	

	

	

	

	

	

	

	

	

	

	

	

	

	//////////////////////////////////////////////==========================//////////////////////////*********************//////

	

	

	

	

	function project_category_insert()

	{

		$data = array(
			'parent_project_category_id' => $this->input->post('parent_project_category_id'),

			'project_category_name' => $this->input->post('project_category_name'),

			'category_color_code' => $this->input->post('category_color_code'),

			'active' => $this->input->post('active'),

		);		

		$this->db->insert('project_category',$data);

	
	}

	

	function project_category_update()

	{

		$data = array(			
			'parent_project_category_id' => $this->input->post('parent_project_category_id'),
			
			'project_category_name' => $this->input->post('project_category_name'),

			'category_color_code' => $this->input->post('category_color_code'),

			'active' => $this->input->post('active'),

		);

		$this->db->where('project_category_id',$this->input->post('project_category_id'));

		$this->db->update('project_category',$data);

	}

	

	function get_one_project_category($id)

	{

		$query = $this->db->get_where('project_category',array('project_category_id'=>$id));

		return $query->row_array();

	}	

	

	

	

	function get_total_project_category_count()

	{

		return $this->db->count_all('project_category');

	}

	

	function get_project_category_result($offset, $limit)

	{	

		$this->db->order_by('project_category_id','desc');

		$query = $this->db->get('project_category',$limit,$offset);

	//(SELECT GROUP_CONCAT(project_category_name ORDER BY project_category_id SEPARATOR ' &gt; ') 



		if ($query->num_rows() > 0) {

			return $query->result();

		}

		return 0;

	}	

	

	function get_total_comment_count()

	{

		return $this->db->count_all('comment');

	}

	

	function get_comment_result($offset, $limit)

	{

		$this->db->select('comment.*,project.project_title');

		$this->db->from('comment');

		$this->db->join('project', 'comment.project_id= project.project_id');

		$this->db->limit($limit,$offset);

		$this->db->order_by('comment.comment_id','desc');

		$query = $this->db->get();





		if ($query->num_rows() > 0) {

			return $query->result();

		}

		return 0;

	}

	

	function get_one_project_comment($id)

	{

		$this->db->select('*');

		$this->db->from('comment c');

		$this->db->join('project p','c.project_id=p.project_id');

		$this->db->join('project_category pc','p.category_id=pc.project_category_id');

		$this->db->where('c.comment_id',$id);

		

		$query=$this->db->get();

		

		if($query->num_rows()>0)

		{

			return $query->row_array();

		

		}

		return 0;

	}

	

	function comment_update()

	{	

		//echo $this->input->post('status');

		//die();

	

		$data= array(

		'comments'=>$this->input->post('comments'),

		'status'=>$this->input->post('status'),

		);

	

		$this->db->where('comment_id',$this->input->post('comment_id'));

		$this->db->update('comment',$data);

		

	}

	

	function get_total_ratings_count()

	{

		$this->db->where('vote !=', '');

		$this->db->from('project');

		return $this->db->count_all_results();

	}

	

	function get_ratings_result($offset, $limit)

	{

		$this->db->where('vote !=', '');

		$this->db->from('project');

		$this->db->order_by('project_id','desc');

		$this->db->limit($limit,$offset);

		$query = $this->db->get();



		if ($query->num_rows() > 0) {

			return $query->result();

		}

		return 0;

	}

	

	function get_total_project_count()

	{

		$this->db->select('project.*,user.user_name,user.last_name,user.email,project_category.project_category_name');

		$this->db->from('project');

		$this->db->join('user', 'project.user_id= user.user_id','left');

		$this->db->join('project_category', 'project.category_id= project_category.project_category_id','left');

		$this->db->where('project.project_draft','1');	

		

		$this->db->order_by("project.project_id", "desc"); 

		

		

		$query = $this->db->get();

		

		return $query->num_rows();

	}

	

	function get_project_result($offset, $limit)

	{

		$this->db->select('project.*,user.user_name,user.last_name,user.email,project_category.project_category_name');

		$this->db->from('project');

		$this->db->join('user', 'project.user_id= user.user_id','left');

		$this->db->join('project_category', 'project.category_id= project_category.project_category_id','left');

		$this->db->where('project.project_draft','1');	

		$this->db->order_by("project.project_id", "desc"); 

		$this->db->limit($limit,$offset);

		

		$query = $this->db->get();

		if ($query->num_rows() > 0) {

			return $query->result_array();

		}

		return 0;

	}

	

	

	

	

	

	function get_total_search_project_count($option,$keyword)

	{

			if($option != 'cat')

		{

		$keyword=str_replace('"','',str_replace(array("'",",","%","$","&","*","#","@","(",")",":",";",">","<","/"),'',$keyword));

		}

		  
		$this->db->select('project.*,user.user_name,user.last_name,user.email,project_category.project_category_name');

		$this->db->from('project');

		$this->db->where('project.project_draft','1');	

		$this->db->join('user', 'project.user_id= user.user_id','left');

		$this->db->join('project_category', 'project.category_id= project_category.project_category_id','left');

		//$this->db->join('project_status', 'project.status= project_status.project_status_id','left');

		

				

		if($option=='title')

		{

			$this->db->like('project.project_title',$keyword);

			

			if(substr_count($keyword,' ')>=1)

			{

				$ex=explode(' ',$keyword);

				

				foreach($ex as $val)

				{

					$this->db->or_like('project.project_title',$val);

				}	

			}



			

		}
		
      
	 
		if($option=='user')

		{

			

			$this->db->like('user.user_name',$keyword);

			$this->db->or_like('user.last_name',$keyword);

			

			$this->db->or_like('user.user_name',substr($keyword,-3,3));

			$this->db->or_like('user.user_name',substr($keyword,0,3));

			$this->db->or_like('user.last_name',substr($keyword,-3,3));

			$this->db->or_like('user.last_name',substr($keyword,0,3));

			

			if(substr_count($keyword,' ')>=1)

			{

			

				$ex=explode(' ',$keyword);

				

				foreach($ex as $val)

				{

					$this->db->or_like('user.user_name',$val);

					$this->db->or_like('user.last_name',$val);

				}

			

			}



			

		}

		

		if($option=='ip')

		{

			$this->db->like('project.host_ip',$keyword);

			

		}

		

		if($option=='cat')

		{

			$this->db->like('project_category.project_category_name',$keyword);

			

			if(substr_count($keyword,' ')>=1)

			{

				$ex=explode(' ',$keyword);

				

				foreach($ex as $val)

				{

					$this->db->or_like('project_category.project_category_name',$val);

				}	

			}



			

		}

		

		

		$this->db->order_by("project.project_id", "desc"); 

		

		

		$query = $this->db->get();

		

		return $query->num_rows();

	}

	

	function get_search_project_result($option,$keyword,$offset, $limit)

	{

		if($option != 'cat')

		{

		$keyword=str_replace('"','',str_replace(array("'",",","%","$","&","*","#","@","(",")",":",";",">","<","/"),'',$keyword));

		}
         $val=$this->db->get('site_setting');
		  $no=$val->row()->ending_soon;
		  
		$this->db->select('project.*,user.user_name,user.last_name,user.email,project_category.project_category_name');

		$this->db->from('project');

		$this->db->where('project.project_draft','1');	

		$this->db->join('user', 'project.user_id= user.user_id','left');

		$this->db->join('project_category', 'project.category_id= project_category.project_category_id','left');

		//$this->db->join('project_status', 'project.status= project_status.project_status_id','left');

		if($option=='title')

		{

			$this->db->like('project.project_title',$keyword);

			

			if(substr_count($keyword,' ')>=1)

			{

				$ex=explode(' ',$keyword);

				

				foreach($ex as $val)

				{

					$this->db->or_like('project.project_title',$val);

				}	

			}

		}

		if($option=='user')

		{

			

			$this->db->like('user.user_name',$keyword);

			$this->db->or_like('user.last_name',$keyword);

			

			$this->db->or_like('user.user_name',substr($keyword,-3,3));

			$this->db->or_like('user.user_name',substr($keyword,0,3));

			$this->db->or_like('user.last_name',substr($keyword,-3,3));

			$this->db->or_like('user.last_name',substr($keyword,0,3));

			

			if(substr_count($keyword,' ')>=1)

			{

			

				$ex=explode(' ',$keyword);

				

				foreach($ex as $val)

				{

					$this->db->or_like('user.user_name',$val);

					$this->db->or_like('user.last_name',$val);

				}

			

			}



			

		}

		

		if($option=='ip')

		{

			$this->db->like('project.host_ip',$keyword);

			

		}

		

		if($option=='cat')

		{

			$this->db->like('project_category.project_category_name',$keyword);

			

		//	if(substr_count($keyword,' ')>=1)

		//	{

				//$ex=explode(' ',$keyword);

				

				//foreach($ex as $val)

				//{

					//$this->db->or_like('project_category.project_category_name',$val);

				//}	

			//}



			

		}
		if($option=='expired'){
			
			$this->db->where('project.end_date < now()');	
		}
		
		
		if($option=='waiting'){
			
			$this->db->where('project.active','0');	
			$this->db->where('project.end_date > now()');	
		}
		if($option=='ending')
		{    
		    /* $val=$this->db->get('site_setting');
			 print_r($val->row()->ending_soon);
			   die;*/
		     $this->db->where('project.active','1');	
			//$this->db->where('project.end_date > now()');
			$this->db->where("DATEDIFF(end_date,now())<$no and DATEDIFF(end_date,now())>0");
		
		}
		
		if($option=='current'){
			$this->db->where('project.active','1');	
			$this->db->where('project.end_date > now()');	
		}
		
		if($option=='successful'){
			
			$this->db->where('project.amount_get >  CEIL(project.amount)');	
		}
		

		$this->db->order_by("project.project_id", "desc"); 

		$this->db->limit($limit,$offset);

		

		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			
			return $query->result_array();

		}

		return 0;

	}

	

	

	

	/*new */

	

	function get_total_search_project_category_count($option,$keyword)

	{

		//$keyword=str_replace('"','',str_replace(array("'",",","%","$","&","*","#","@","(",")",":",";",">","<","/"),'',$keyword));

		

		$this->db->select('project_category.*');

		$this->db->from('project_category');

		

		if($option=='projectcatname')

		{

			$this->db->like('project_category.project_category_name',$keyword);

			

			if(substr_count($keyword,' ')>=1)

			{

				$ex=explode(' ',$keyword);

				

				foreach($ex as $val)

				{

					$this->db->like('project_category.project_category_name',$val);

				}	

			}



			

		}

		$this->db->order_by("project_category.project_category_id", "desc"); 

		

		$query = $this->db->get();

		

		return $query->num_rows();

	}

	

	

	function search_list_project_category($option,$keyword,$offset, $limit)

	{

		

		//$keyword=str_replace('"','',str_replace(array("'",",","%","$","&","*","#","@","(",")",":",";",">","<","/"),'',$keyword));

		

		$this->db->select('project_category.*');

		$this->db->from('project_category');

		

		if($option=='projectcatname')

		{

			$this->db->like('project_category.project_category_name',$keyword);

			

			if(substr_count($keyword,' ')>=1)

			{

				$ex=explode(' ',$keyword);

				

				foreach($ex as $val)

				{

					$this->db->like('project_category.project_category_name',$val);

				}	

			}



			

		}

		$this->db->order_by("project_category.project_category_id", "desc"); 

		

		

		

		$this->db->limit($limit,$offset);

		

		$query = $this->db->get();

		if ($query->num_rows() > 0) {

			return $query->result();

		}

		return 0;

	}

	/**/

	

	

	

	

	

	

	

	

	

	

	function get_total_state_project_count($id)

	{

		

		

		$sql="select * from project p, user u, project_category pc where p.user_id=u.user_id and p.category_id=pc.project_category_id and u.state='".$id."' order by p.date_added desc";

				

		$s_result=$this->db->query($sql);	

		

		return $s_result->num_rows();		

		

	}

	

	function get_state_project_result($id,$offset, $limit)

	{

		

		

		$sql2="select * from project p, user u, project_category pc where p.user_id=u.user_id and p.category_id=pc.project_category_id and u.state='".$id."' order by p.date_added desc LIMIT ".$limit." OFFSET ".$offset." ";

		

		$s_result2=$this->db->query($sql2);	



		

		if($s_result2->num_rows()>0)

		{

			return $s_result2->result_array();

		}

		return 0;		

		

	}

	

	

	

	

	

	

	

	function get_total_gender_project_count($id)

	{

		

		

		$sql="select * from project p, user u, project_category pc where p.user_id=u.user_id and p.category_id=pc.project_category_id and u.gender='".$id."' order by p.date_added desc";

				

		$s_result=$this->db->query($sql);	

		

		return $s_result->num_rows();		

		

	}

	

	function get_gender_project_result($id,$offset, $limit)

	{

		

		

		$sql2="select * from project p, user u, project_category pc where p.user_id=u.user_id and p.category_id=pc.project_category_id and u.gender='".$id."' order by p.date_added desc LIMIT ".$limit." OFFSET ".$offset." ";

		

		$s_result2=$this->db->query($sql2);	



		

		if($s_result2->num_rows()>0)

		{

			return $s_result2->result_array();

		}

		return 0;		

		

	}

	

	

	

	

	

	

	function get_state()

	{	

		

		$this->db->order_by('state_name','asc');

		$query=$this->db->get('state');

		return $query->result();

	}

	

	function get_project_status()

	{

		$query = $this->db->get('project_status');



		if ($query->num_rows() > 0) {

			return $query->result_array();

		}

		return 0;

	}

	

	function apply_status()

	{

	

	$data = array(					

			'status' => $this->input->post('status'),

		);

		$this->db->where('project_id',$this->input->post('project_id'));

		$this->db->update('project',$data);

	

	}	

	

	

	/////////////============report spam================

	function report_spam($cmid)

	{

		$comment_detail=$this->db->query("select * from comment where comment_id='".$cmid."'");

		$comment=$comment_detail->row();

		

		if($comment->comment_ip!='')

		{

			$report=$this->db->query("insert into spam_report_ip(`spam_ip`,`spam_user_id`)values('".$comment->comment_ip."','".$comment->user_id."')");

					

		}

		

	}

	/////////////============report spam================

	

	

	/***** User notification ******************/

	

		function get_email_notification($id=''){

		if($id==''){

			$query=$this->db->query("select * from user_notification where user_id='".$this->session->userdata('user_id')."'");

		}

		else{

			$query=$this->db->query("select * from user_notification where user_id='".$id."'");

			}

		if($query->num_rows()>0)

		{

			return $query->row();

		}

		

		return 0;

	

	}

	function get_sub_categories($parent_cat_id){
	//echo "select * from project_category where parent_project_category_id='".$parent_cat_id."'"; die;
		$query=$this->db->query("select * from project_category where parent_project_category_id='".$parent_cat_id."'");
		return $query->result();
		
		}
	

	

}

?>