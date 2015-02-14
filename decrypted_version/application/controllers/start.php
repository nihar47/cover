<?php
/********************************************************************************
 * This the taskrabbitclone.com  by Rockers Technology. is paid software. It is released under the terms of 
 * the following BSD License.
 * 
 *  Rockers Technologies (Head Office)
 *    5038,Berthpage Dr
 *    suwanee, GA. Zip Code : 30024
 *    E-mail Address : nishu@rockersinfo.com
 * 
 * Copyright © 2012-2020 by Rockers Technology , INC a domestic profit corporation has been duly incorporated under the laws of the state of georiga , USA. www.rockersinfo.com
 * All rights reserved.
 * 
 * Redistribution and use in source and binary forms, with or without modification, 
 * are permitted provided that the following conditions are met:
 * 
 * - Redistributions of source code must retain the above copyright notice, this 
 *   list of conditions and the following disclaimer.
 * - Redistributions in binary form must reproduce the above copyright notice, this 
 *   list of conditions and the following disclaimer in the documentation and/or 
 *   other materials provided with the distribution.
* 
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND 
 * ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED 
 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. 
 * IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, 
 * INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, 
 * BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, 
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF 
 * LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE 
 * OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED 
 * OF THE POSSIBILITY OF SUCH DAMAGE.
 ********************************************************************************/
class Start extends ROCKERS_Controller {
	function Start()
	{
		parent::__construct();	
		$this->load->model('home_model');
		$this->load->model('user_model');
		$this->load->model('startproject_model');
		$this->load->model('project_model');		
		//$this->load->library('securimage');
	}

	function index()
	{
		if(!check_user_authentication()) {  redirect('home/login'); } 
		$site_setting=site_setting();
		$data['site_setting'] =$site_setting;
		$meta = meta_setting();

		$limit=$site_setting['maximum_project_per_year'];
		$offset=0;
		$data['draft_project'] = $this->startproject_model->list_draft_project(get_authenticateUserID(),$limit,$offset);

		$this->home_model->select_text();

		$this->template->write('meta_title', 'Create Campaign-'.$meta['title'], TRUE);

		$this->template->write('meta_description','Create Campaign-'. $meta['meta_description'], TRUE);

		$this->template->write('meta_keyword', 'Create Campaign-'.$meta['meta_keyword'], TRUE);

		if($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1)
		{
			$this->template->set_master_template('iphone/template.php');
			$this->template->write_view('main_content', 'iphone/create/create_step1', $data, TRUE);
			$this->template->render();
		}

		elseif(($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1)
		{
			$this->template->set_master_template('mobile/template.php');
			$this->template->write_view('main_content', 'mobile/create/create_step1', $data, TRUE);
			$this->template->render();
		}

		else
		{
			$this->template->write_view('header', 'default/common/header_login', $data, TRUE);
			$this->template->write_view('center_content', 'default/create/start', $data, TRUE);
			$this->template->write_view('footer', 'default/common/footer',$data, TRUE);
			$this->template->render();
		}
	}

	function guideline($id='')
	{
		if(!check_user_authentication()) {  redirect('home/login'); } 
		$data['id']	=$id;
		$data['site_setting'] = site_setting();
		$meta = meta_setting();

		$data['user_info'] = get_user_detail(get_authenticateUserID());

		$this->home_model->select_text();
		$data['guidelines'] = $this->startproject_model->get_guidelines();

		$this->template->write('meta_title', 'Create Campaign-'.$meta['title'], TRUE);
		$this->template->write('meta_description','Create Campaign-'. $meta['meta_description'], TRUE);
		$this->template->write('meta_keyword', 'Create Campaign-'.$meta['meta_keyword'], TRUE);

		if($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1)
		{
			$this->template->set_master_template('iphone/template.php');
			$this->template->write_view('main_content', 'iphone/create/create_step1', $data, TRUE);
			$this->template->render();
		}
		elseif(($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1)
		{
			$this->template->set_master_template('mobile/template.php');
			$this->template->write_view('main_content', 'mobile/create/create_step1', $data, TRUE);
			$this->template->render();
		}
		else
		{
			//$this->template->write_view('header', 'default/create/project_header', $data, TRUE);
			$this->template->write_view('header', 'default/common/header_login', $data, TRUE);
			$this->template->write_view('center_content', 'default/create/guideline', $data, TRUE);
			$this->template->render();
		}

	}

	/*****   create process in steps *********/
	function create_draft()
	{
		$id = $this->startproject_model->create_draft1();
		redirect('start/create_step1/'.$id);
	}

	function menu_cat($select,$id='')
	{-
		$this->cnt++;
		$cat='';
		$id= empty($id) ? 0 : $id;

		if(count($this->home_model->get_category_multi($id))>0) {	
	
				foreach($this->home_model->get_category_multi($id) as $res) {			

					if($select==$res->project_category_id) {

					$cat.='<option value="'.$res->project_category_id.'" selected="selected">';
					}else {
					$cat.='<option value="'.$res->project_category_id.'">';
						}

					if($res->parent_project_category_id!=0) {
						for($i=0;$i<$this->cnt;$i++) { $cat.="&nbsp;&nbsp;"; }				
							$cat.='_';
							}
					$cat.=$res->project_category_name.'</option>';				

					if(count($this->menu_cat($select,$res->project_category_id))>0) {	
						$cat.=$this->menu_cat($select,$res->project_category_id);
						$this->cnt--;	
					}
					$this->cnt--;			
			   } 
		}
		return $cat;  
	}

	function create_step1($id=null){
			if(!check_user_authentication()) {  redirect('home/login'); } 
			$chk_user_project=$this->db->query("select * from project where project_id='".$id."' and user_id='".get_authenticateUserID()."'");
		if($chk_user_project->num_rows()>0)
		{
		}	else		{
				redirect('home/dashboard');		
		}
			$data['site_setting'] = site_setting();
			$site_setting=site_setting();
			$chk_create = $this->project_model->check_can_create(get_authenticateUserID());

			if($chk_create){
				redirect('home/index/not');
			}

			$amount_error='';
			$this->load->library('form_validation');

			$this->form_validation->set_rules('project_title_text', PAGE_TITLE, 'required');		
			$this->form_validation->set_rules('project_category', CATEGORY, 'required');
			$this->form_validation->set_rules('project_summary', 'Project Summary', 'required');
			$this->form_validation->set_rules('amount', AMOUNT, 'required');

			if($this->input->post('duration') == 'totaldate')
			{
				$this->form_validation->set_rules('end_date', 'End date', 'required');
			}

			if($this->input->post('duration') == 'totalday')
			{
				$this->form_validation->set_rules('endday', 'End Day', 'required');
			}

			$Ins='true';

			$error_paypal='true';

			$error_paypal_credit_card='true';

			$error_amazon='true';

			$data['image']='';	

			$data['error']='';

			if($this->input->post('back')){ }

			else{
			$this->form_validation->set_rules('project_title_text', PAGE_TITLE, 'required');		
			$this->form_validation->set_rules('project_category', CATEGORY, 'required');
			$this->form_validation->set_rules('project_summary', 'Project Summary', 'required');
			$this->form_validation->set_rules('amount', AMOUNT, 'required');	

				if($_POST){

					if($this->input->post('duration') == 'totalday')
					{
				$total_days = $this->input->post('endday'); 
					}

					if($this->input->post('duration') == 'totaldate')
					{
						 $your_date = $this->input->post('end_date');
						 $total_days_left = (strtotime($your_date) - strtotime(date("Y-m-d"))) / (60 * 60 * 24);
						 $total_days = floor($total_days_left);
					}	

					if($total_days < $site_setting['project_min_days'] || $total_days > $site_setting['project_max_days']){
						$amount_error="<li>". sprintf(DATE_BETWEEN_LIMIT_DAYS,$site_setting['project_min_days'],$site_setting['project_max_days']). "</li>";
					}

					if($this->input->post('amount') < $site_setting['minimum_goal']){
						$amount_error .= "<li>". sprintf(GOAL_AMOUNT_SHOULD_BE_GREATER_THAN,$site_setting['minimum_goal']). "</li>";
					}

					if($this->input->post('amount') >= $site_setting['maximum_goal']){
						$amount_error .= "<li>". sprintf(GOAL_AMOUNT_SHOULD_BE_LESS_THAN,$site_setting['maximum_goal']). "</li>";
					}
				}
			}

			if($this->form_validation->run() === FALSE || $amount_error!='')
			{			
						if(validation_errors())
						{
								$error_date='';

								$paypal_msg='';

								$paypal_credit_card_msg='';

								$amazon_msg='';

							$data['error'] = validation_errors();
						}
						else{
						
						}

						if($amount_error!=''){
							$data['error'] .= $amount_error;
						}
				//	$data['categorylist']=$this->menu_cat(0,0);//$this->home_model->get_category();
						/***************Code changed for seperation of category and sub category**************/
			
						//$data['categorylist'] = $this->project_category_model->get_category();
						$data['category_list'] = array();
						$parent =$this->home_model->get_category(0);
						
						foreach($parent as $result){
							$children = $this->home_model->get_category($result->project_category_id);
							
							 $children_data = array();
							foreach ($children as $child) {
							   
							  $child_array = $this->home_model->get_category($child->project_category_id);
								
									$child_data = array();
											foreach($child_array as $c){
												$child_data[] =array(
												'project_category_id' => $c->project_category_id,
												'project_category_name' => $c->project_category_name,
											);
										}
							
								$children_data[] = array(
									'project_category_id' => $child->project_category_id,
									'project_category_name' => $child->project_category_name,
									'child'=>!empty($child_data) ? $child_data : ''
								);
							}
            				$data['category_list'][] = array(
								'project_category_id' => $result->project_category_id,
								'parent_id' => $result->parent_project_category_id,
								'project_category_name' => $result->project_category_name,
								'children' => !empty($children_data) ? $children_data : ''
							);
							}	
				/*			echo "<pre>";
							print_r($data['categorylist']); die;
				****************************************************************/			
						$data['project'] = get_one_project($id);
						$data['user_info'] = get_user_detail(get_authenticateUserID());

						if($this->input->post('id')){

							$data['amount'] = $this->input->post('amount');

							$data['project_summary'] = $this->input->post('project_summary');

							$data['project_title'] = $this->input->post('project_title_text');

							$data['category_id']=$this->input->post('project_category');

							$data['categorylist']=$this->menu_cat($data['category_id'],0);

							$data['totaldays']=$this->input->post('endday');
						}else{

							$project = get_one_project($id);

							$data['project']=$project;

							$data['amount'] = $project['amount'];

							$data['project_summary']=$project['project_summary'];

							$data['project_title']=$project['project_title'];

							$data['category_id']=$project['category_id'];

							$data['img'] = $project['image'];

							$data['totaldays']=$project['total_days'];

							$data['categorylist']=$this->menu_cat($project['category_id'],0);

						}

						$data['msg']= "";	

						if($id!=null){	$data['id'] = $id;  }
						else{	$data['id'] = $this->input->post('id');   }
	
					$meta = meta_setting();

					$this->home_model->select_text();
					$this->template->write('meta_title', 'Create Campaign-'.$meta['title'], TRUE);
					$this->template->write('meta_description','Create Campaign-'. $meta['meta_description'], TRUE);
					$this->template->write('meta_keyword', 'Create Campaign-'.$meta['meta_keyword'], TRUE);

					if($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1)
					{
						$this->template->set_master_template('iphone/template.php');
						$this->template->write_view('main_content', 'iphone/create/create_step1', $data, TRUE);
						$this->template->render();
					}
					elseif(($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1)
					{
						$this->template->set_master_template('mobile/template.php');
						$this->template->write_view('main_content', 'mobile/create/create_step1', $data, TRUE);
						$this->template->render();
					}
					else
					{
						//$this->template->write_view('header', 'default/create/project_header', $data, TRUE);
						$this->template->write_view('header', 'default/common/header_login', $data, TRUE);
						$this->template->write_view('center_content', 'default/create/create_step1', $data, TRUE);
					//$this->template->write_view('footer', 'default/common/footer',$data, TRUE);
						$this->template->render();
					}
			}
			else
			{ 
				if($this->input->post('draft'))
					{
						$success=$this->startproject_model->create_draft_step_basic();
						redirect('home/dashboard');				
					}else{
						$success=$this->startproject_model->create_draft_step_basic();
						redirect('start/create_step2/'.$success);		
					}
			}				
		}

	function project_getcategory($project_category_id ='')
	{
		 $project_category=$this->startproject_model->get_project_getcategory($project_category_id);
		//die;
	}

	function create_step1_ajax($id=null){
			$site_setting = site_setting();
		
			$this->load->library('form_validation');

			$data=array();

			$data["msg"]["error"]='';

			$data["msg"]["success"]='';

			$data["redirect"]["url"]='';

			$data["image"]["path"]='';

			$data["msg"]["image_media"]='';

			$data["msg"]["video_media"]='';

			if($this->session->userdata('user_id')==''){
				$data["redirect"]["url"]='home/login';
			}else if($id==null || $id=='' || $id=='0'){
				$data["redirect"]["url"]="start/guideline";
			}else	{
				//echo "<prev>";
				//print_r($_POST);die();
							$_FILES['userfile']['name']    =   $_FILES['file1']['name'];
							$_FILES['userfile']['type']    =   $_FILES['file1']['type'];
							$_FILES['userfile']['tmp_name'] =   $_FILES['file1']['tmp_name'];
							$_FILES['userfile']['error']       =   $_FILES['file1']['error'];
							$_FILES['userfile']['size']    =   $_FILES['file1']['size']; 

							 //image validation
							   if ($_FILES["userfile"]["type"] != "image/jpeg" and $_FILES["userfile"]["type"] != "image/pjpeg" and $_FILES["userfile"]["type"] != "image/png" and $_FILES["userfile"]["type"] != "image/x-png" and $_FILES["userfile"]["type"] != "image/gif")
							   {
							       $data["msg"]["error"]='Please upload a .jpg, .png, .gif file';
							 }	else if ($_FILES["userfile"]["size"] > 2000000)
							  { 
									  $data["msg"]["error"]='Sorry, this file is too large.  Please select a .jpg file that is less than 2 MB or try resizing it using a photo editor.';
							  }  else {
									  $imagename = image_upload($_FILES);
                              
									  $data_gallery=array(							
										'project_id'=>$id,
										'image'=> $imagename									
									  );
								  //save data
									  $new_img = $this->startproject_model->step1_ajaxsave($data_gallery,$id);
									  if($new_img)
									  {
									   $data["image"]["path"]=base_url()."upload/thumb/".$imagename;
									   $data["image"]["img_name"] = $imagename;
 									   $data["msg"]["success"]='Image uploaded successfully';
									  }
									  else
									  {
									   $data["msg"]["error"]='There is some problem site.try after sometime';
									  }
								}  
					$data["msg"]["successbox"]=1;
				}	
		echo json_encode($data);
	}

	function create_step2($id=null){
			if($id==null || $id=='' || $id=='0'){
				redirect('start/create_step1');
			}
			$chk_user_project=$this->db->query("select * from project where project_id='".$id."' and user_id='".get_authenticateUserID()."'");
		if($chk_user_project->num_rows()>0)
		{	}	else	{
		redirect('home/dashboard');		
		}
			$this->load->library('form_validation');

			$amount_error = '';	

			$this->form_validation->set_rules('id', 'Id', 'required');		

			if($this->input->post('back')){ }
			else{
					$this->form_validation->set_rules('perk_description[]', PERK_DESCRIPTION, 'required');
				$this->form_validation->set_rules('perk_amount[]', PRK_AMNT, 'required|numeric');
				$this->form_validation->set_rules('est_date[]', ESTIMATE_DATE, 'required');
				//$this->form_validation->set_rules('perk_total[]', TOTAL_CLAIM_TXT, 'required|numeric');  
			}

			$Ins='true';
			$error_paypal='true';
			$error_date='';
			$paypal_msg='';

			if($this->form_validation->run() === FALSE  || $Ins=='false' || $error_paypal=='false'  || $amount_error!='')
			{			
						if(validation_errors())
						{
							$data['error'] = validation_errors().$paypal_msg.$error_date;
						}
						else{
							$data['error'] = "";
						}

						if($this->input->post('id')){
							$project = get_one_project($this->input->post('id'));
							$data['perk'] = get_project_perk($this->input->post('id'));
						}else{
							$project = get_one_project($id);
							$data['perk'] = get_project_perk($id);
						}

						$data['msg']= "";	
						if($id!=null){	$data['id'] = $id;  }
						else{	$data['id'] = $this->input->post('id');   }

					$data['site_setting'] = site_setting();
					$meta = meta_setting();
		
				$this->home_model->select_text();
				$this->template->write('meta_title', 'Create Campaign-'.$meta['title'], TRUE);
				$this->template->write('meta_description','Create Campaign-'. $meta['meta_description'], TRUE);
				$this->template->write('meta_keyword', 'Create Campaign-'.$meta['meta_keyword'], TRUE);

					if($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1)
					{
						$this->template->set_master_template('iphone/template.php');
						$this->template->write_view('main_content', 'iphone/create/create_step5', $data, TRUE);
						$this->template->render();
					}
					elseif(($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1)
					{
						$this->template->set_master_template('mobile/template.php');
						$this->template->write_view('main_content', 'mobile/create/create_step5', $data, TRUE);
						$this->template->render();
					}
					else
					{	
						//$this->template->write_view('header', 'default/create/project_header', $data, TRUE);
						$this->template->write_view('header', 'default/common/header_login', $data, TRUE);
						$this->template->write_view('center_content', 'default/create/create_step2', $data, TRUE);
						//$this->template->write_view('footer', 'default/common/footer',$data, TRUE);
						$this->template->render();
					}
			}
			else
			{ 
					if($this->input->post('draft'))
					{
						$success=$this->startproject_model->create_draft2();
						redirect('home/dashboard');						
					}
					elseif($this->input->post('back')){
					redirect('start/create_step1/'.$this->input->post('id'));	
					}
					else{
						$success=$this->startproject_model->create_draft2();
						redirect('start/create_step3/'.$success);				
					}	
			}				
	}		

	function create_step3($id=null){
		if($id==null || $id=='' || $id=='0'){
				redirect('start/create_step1');
			}
			$chk_user_project=$this->db->query("select * from project where project_id='".$id."' and user_id='".get_authenticateUserID()."'");
		if($chk_user_project->num_rows()>0)
		{	}	
		else
		{ 
		redirect('home/dashboard');		
		}
			$this->load->library('form_validation');

			$amount_error = '';	

			$this->form_validation->set_rules('id', ID, 'required');		

			if($this->input->post('back')){ }
			else{

				//$this->form_validation->set_rules('project_summary', PROJECT_SUMMARY, 'required');
				$this->form_validation->set_rules('description', DESCRIPTION, 'required');
		}

			$Ins='true';
			$error_paypal='true';
			$error_date='';
			$paypal_msg='';

			if($this->form_validation->run() === FALSE  || $Ins=='false' || $error_paypal=='false'  || $amount_error!='')
			{			
						if(validation_errors())
						{
						$data['error'] = validation_errors().$paypal_msg.$error_date;
						}
						else{
							$data['error'] = "";
						}

						if($this->input->post('id')){
							$data['description']=$this->input->post('description');
							$data['video']=$this->input->post('video');
							$data['videofile']=$this->input->post('videofile');
							$data['video_set']=$this->input->post('video_set');		
					}
						else{
							$project = get_one_project($id);
							$data['description']=$project['description'];
							$data['video']=$project['video'];
							$data['videofile']=$this->input->post('videofile');	
							$data['video_set']=$this->input->post('video_set');	
						}
						$data['msg']= "";	
						if($id!=null){	$data['id'] = $id;  }
						else{	$data['id'] = $this->input->post('id');   }

					$data['site_setting'] = site_setting();
					$meta = meta_setting();

					$this->home_model->select_text();
				$this->template->write('meta_title', 'Create Campaign-'.$meta['title'], TRUE);
				$this->template->write('meta_description','Create Campaign-'. $meta['meta_description'], TRUE);
				$this->template->write('meta_keyword', 'Create Campaign-'.$meta['meta_keyword'], TRUE);

					if($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1)
					{
						$this->template->set_master_template('iphone/template.php');
						$this->template->write_view('main_content', 'iphone/create/create_step3', $data, TRUE);
						$this->template->render();
					}
				elseif(($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1)
					{
						$this->template->set_master_template('mobile/template.php');
						$this->template->write_view('main_content', 'mobile/create/create_step3', $data, TRUE);
					$this->template->render();
				}
					else
					{
						//$this->template->write_view('header', 'default/create/project_header', $data, TRUE);
						$this->template->write_view('header', 'default/common/header_login', $data, TRUE);
						$this->template->write_view('center_content', 'default/create/create_step3', $data, TRUE);
						//$this->template->write_view('footer', 'default/common/footer',$data, TRUE);
						$this->template->render();
					}
			}
			else
			{ 
					if($this->input->post('draft'))
					{
						$success=$this->startproject_model->create_draft3();
						redirect('home/dashboard');						
					}elseif($this->input->post('back')){
						redirect('start/create_step2/'.$this->input->post('id'));	
					}else{
						$success=$this->startproject_model->create_draft3();
						redirect('start/create_step4/'.$success);				
					}	
			}				
	}

	function create_step4($id=null,$msg=''){
			if($id==null || $id=='' || $id=='0'){
				redirect('start/create_step1');
			}

			$chk_user_project=$this->db->query("select * from project where project_id='".$id."' and user_id='".get_authenticateUserID()."'");
		if($chk_user_project->num_rows()>0)
		{	}	
		else
		{
			redirect('home/dashboard');		
		}
				$this->load->library('form_validation');
	
			$this->form_validation->set_rules('id', ID, 'required');	
			$this->form_validation->set_rules('first_name','First Name', 'required');	
			$this->form_validation->set_rules('last_name',LAST_NAME, 'required');

			//$this->form_validation->set_rules('project_country',COUNTRY, 'required');
			//$this->form_validation->set_rules('state',STATE, 'required');
			//$this->form_validation->set_rules('city',CITY, 'required');
			$amount_error = '';	

			$data['error']='';

			$data['msg'] = $msg;

			$Ins='true';

			$error_paypal='true';
	
			$paypal_msg='';

			$error_date='';

			if($this->form_validation->run() === FALSE)
			{			
					if(validation_errors())
						{
							$data['error'] = validation_errors();
					}else{
								$data['error'] = "";
						}

						if($this->input->post('id')){

							$user_detail = get_user_detail(get_authenticateUserID());

							$data['first_name']=$user_detail['user_name'];	

							$data['last_name']=$user_detail['last_name'];

							$data['user_mobile']=$user_detail['user_mobile'];

							$data['birth_date']=$user_detail['birth_date'];

							$data['project_country']=$this->input->post('project_country');

							$data['project_state']=$this->input->post('project_state');

							$data['project_city']=$this->input->post('project_city');
							}
						else{
							$project = get_one_project($id);

							$user_detail = get_user_detail(get_authenticateUserID());

							$data['first_name']=$user_detail['user_name'];	

							$data['last_name']=$user_detail['last_name'];

							$data['user_mobile']=$user_detail['user_mobile'];

							$data['birth_date']=$user_detail['birth_date'];

							$data['project_country']=$project['project_country'];

							$data['project_state']=$project['project_state'];

							$data['project_city']=$project['project_city'];
						}
	
					$data['categorylist']=$this->home_model->get_category();

						$data['countrylist']=$this->home_model->get_country();						

						$data['msg']= "";	

						if($id!=null){	$data['id'] = $id;  }

						else{	$data['id'] = $this->input->post('id');   }

					$data['site_setting'] = site_setting();

					$meta = meta_setting();

					$this->home_model->select_text();

					$this->template->write('meta_title', 'Create Campaign-'.$meta['title'], TRUE);

					$this->template->write('meta_description','Create Campaign-'. $meta['meta_description'], TRUE);

					$this->template->write('meta_keyword', 'Create Campaign-'.$meta['meta_keyword'], TRUE);

					if($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1)
					{
						$this->template->set_master_template('iphone/template.php');
						$this->template->write_view('main_content', 'iphone/create/create_step4', $data, TRUE);
						$this->template->render();
					}
					elseif(($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1)
					{
						$this->template->set_master_template('mobile/template.php');
						$this->template->write_view('main_content', 'mobile/create/create_step4', $data, TRUE);
						$this->template->render();
					}
					else
					{	
						//$this->template->write_view('header', 'default/create/project_header', $data, TRUE);
						$this->template->write_view('header', 'default/common/header_login', $data, TRUE);
					$this->template->write_view('center_content', 'default/create/create_step4', $data, TRUE);
						//$this->template->write_view('footer', 'default/footer',$data, TRUE);
						$this->template->render();
					}
			}
			else
			{ 
				if($this->input->post('draft'))
					{
						$success=$this->startproject_model->create_draft4();
						redirect('home/dashboard');						
					}
					elseif($this->input->post('back')){
						redirect('start/create_step3/'.$this->input->post('id'));	
					}
					else{
						$success=$this->startproject_model->create_draft4();
						redirect('start/create_step5/'.$success);				
					}	
			}				
	}

	function checkfirstname($user_name ='')
	{
		$username =  $this->startproject_model->checkuser_firstname($user_name);
		if($username)
		{
			echo "valid";
		//	die;
		}
		else
		{
			echo "invalid";
        	//die;
		}
	}

	function checklastname($lastname ='')
	{
		$username =  $this->startproject_model->checkuser_lastname($lastname);
		if($username)
		{
			echo "valid";
			//die;
		}
		else
		{
			echo "invalid";
			die;
		}
	}

	function create_step5($id=null){
		if($id==null || $id=='' || $id=='0'){
				redirect('start/create_step1');
			}
			$chk_user_project=$this->db->query("select * from project where project_id='".$id."' and user_id='".get_authenticateUserID()."'");
		if($chk_user_project->num_rows()>0)
		{ }	
		else
		{
			redirect('home/dashboard');		
		}

		$this->load->library('form_validation');
	
			$amount_error = '';	
			$this->form_validation->set_rules('id', 'Id', 'required');		

			if($this->input->post('back')){
			redirect('start/create_step4/'.$this->input->post('id'));	
			 }	else{		}

			$Ins='true';

			$error_paypal='true';

			$error_date='';

			$paypal_msg='';

			if($this->form_validation->run() === FALSE  || $Ins=='false' || $error_paypal=='false'  || $amount_error!='')
			{			
					if(validation_errors())
						{
							$data['error'] = validation_errors().$paypal_msg.$error_date;
						}else{
							$data['error'] = "";
						}

						if($this->input->post('id')){
							$project = get_one_project($this->input->post('id'));
							$data['project']=$project;
						}else{
							$project = get_one_project($id);
							$data['project']=$project;
						}

					$data['msg']= "";	

					if($id!=null){	$data['id'] = $id;  
					}else{	
					$data['id'] = $this->input->post('id');  
					 }
					$data['site_setting'] = site_setting();
					$meta = meta_setting();

					$this->home_model->select_text();

					$this->template->write('meta_title', 'Create Campaign-'.$meta['title'], TRUE);
					$this->template->write('meta_description','Create Campaign-'. $meta['meta_description'], TRUE);
					$this->template->write('meta_keyword', 'Create Campaign-'.$meta['meta_keyword'], TRUE);

					if($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1)
					{
						$this->template->set_master_template('iphone/template.php');
						$this->template->write_view('main_content', 'iphone/create/create_step5', $data, TRUE);
						$this->template->render();
					}elseif(($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1)
					{
						$this->template->set_master_template('mobile/template.php');
						$this->template->write_view('main_content', 'mobile/create/create_step5', $data, TRUE);
						$this->template->render();
					}else	{	
						//$this->template->write_view('header', 'default/create/project_header', $data, TRUE);
						$this->template->write_view('header', 'default/common/header_login', $data, TRUE);
						$this->template->write_view('center_content', 'default/create/create_step5', $data, TRUE);
						//$this->template->write_view('footer', 'default/footer',$data, TRUE);
						$this->template->render();
					}
			}
			else
			{ 
					if($this->input->post('draft'))
					{
						$success=$this->startproject_model->create_draft5();
						redirect('home/dashboard');						
					}elseif($this->input->post('back')){
						redirect('start/create_step4/'.$this->input->post('id'));	
					}else{
						$success=$this->startproject_model->create_draft5();
						//redirect('start/create_step6/'.$success);			
						redirect('start/project_detail_preview/'.$success);				
					}	
			}				
	}

	function preview_project($id=null){
		if($id==null)
		{
			redirect('home/dashboard');
		}
		$chk_user_project=$this->db->query("select * from project where project_id='".$id."' and user_id='".get_authenticateUserID()."'");
		if($chk_user_project->num_rows()>0)
		{	}	
		else
		{
			redirect('home/dashboard');		
		}
		$data['error'] = "";

		$data['project'] = get_one_project($id);

		$project_user = get_one_project($id);

		$user_detail = get_user_detail($project_user['user_id']);

		$data['id']=$id;

		$data['user_name']=$user_detail['user_name'];

		$data['last_name']=$user_detail['last_name'];

		$data['user_image']=$user_detail['image'];

		$data['user_city']=$user_detail['city'];

		$data['user_state']=$user_detail['state'];

		$data['user_country']=$user_detail['country'];

		$meta_title=$project_user['project_title'].',&nbsp;'.$user_detail['user_name'].'&nbsp;'.$user_detail['last_name'].',&nbsp;'.$user_detail['country'];

		$meta_description=$project_user['project_title'].',&nbsp;'.$user_detail['user_name'].'&nbsp;'.$user_detail['last_name'].',&nbsp;'.$user_detail['country'];

		$meta_keyword=$project_user['project_title'].',&nbsp;'.$user_detail['user_name'].'&nbsp;'.$user_detail['last_name'].',&nbsp;'.$user_detail['country'];

		$data['header_menu'] = dynamic_menu(0);

		$data['footer_menu'] = dynamic_menu_footer(0);

		$data['right_menu'] = dynamic_menu_right(0);

		$data['site_setting'] = site_setting();

		$meta = meta_setting();

					$this->home_model->select_text();

					$this->template->write('meta_title', 'Create Campaign-'.$meta['title'], TRUE);
					$this->template->write('meta_description','Create Campaign-'. $meta['meta_description'], TRUE);
					$this->template->write('meta_keyword', 'Create Campaign-'.$meta['meta_keyword'], TRUE);

					if($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1)
					{
						 redirect('user/my_project/');	
					}
					elseif(($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1)
					{
						 redirect('user/my_project/');	
					}
					else
					{
						//$this->template->write_view('header', 'default/create/project_header', $data, TRUE);
						$this->template->write_view('header', 'default/common/header_login', $data, TRUE);
						$this->template->write_view('center_content', 'default/create/preview_project', $data, TRUE);
						//$this->template->write_view('footer', 'default/footer',$data, TRUE);
						$this->template->render();
					}
	}

	function project_detail_preview($id=0)
	{	
	
		if($id==null)
		{
			redirect('home/dashboard');
		}

		$chk_user_project=$this->db->query("select * from project where project_id='".$id."' and user_id='".get_authenticateUserID()."'");

		if($chk_user_project->num_rows()>0)
		{	}	
		else
		{
			redirect('home/dashboard');		
		}

		$data['error'] = "";
	
		$data['id']=$id;

			$data['showbacker'] ="";

			$data['showcomment'] ='';

			$data['showupdates'] ='';

		$data['project'] = get_one_project($id);

		$data['project_category'] = $this->project_model->get_project_detail_category($id);	

		$data['project_gallery'] = $this->project_model->get_all_project_gallery($id);

		$data['comments'] = $this->project_model->get_comments($id);

		$data['all_perks'] = $this->project_model->get_all_perks($id);

		$data['updates'] = $this->project_model->get_updates($id);

		$data_header['color'] = $data['project']['color'];

		$data['color'] = $data['project']['color'];

		$data['donation'] = $this->project_model->get_latest_donations($id);

		$data['site_setting'] = site_setting();

		$data['idea']=$this->home_model->get_idea();

		$data['backers']=$this->project_model->get_all_backers($id);

		$data['project_backers']=$this->project_model->get_total_donations_count($id);			

		$data['project_user'] = get_one_project($id);
/*echo "<pre>";
print_r($data);*/
		

		$project_user = get_one_project($id);

		$user_detail = get_user_detail($project_user['user_id']);

		$data['user_name']=$user_detail['user_name'];

		$data['last_name']=$user_detail['last_name'];

		$data['user_image']=$user_detail['image'];

		$data['user_city']=$user_detail['city'];

		$data['user_state']=$user_detail['state'];

		$data['user_country']=$user_detail['country'];

		$data['user_website']=$user_detail['user_website'];

		$data['user_detail'] = $user_detail;

		$meta_title=$project_user['project_title'].',&nbsp;'.$user_detail['user_name'].'&nbsp;'.$user_detail['last_name'].',&nbsp;'.$user_detail['country'];

		$meta_description=$project_user['project_title'].',&nbsp;'.$user_detail['user_name'].'&nbsp;'.$user_detail['last_name'].',&nbsp;'.$user_detail['country'];

		$meta_keyword=$project_user['project_title'].',&nbsp;'.$user_detail['user_name'].'&nbsp;'.$user_detail['last_name'].',&nbsp;'.$user_detail['country'];

		$this->home_model->select_text();

		$this->template->write('meta_title', $meta_title, TRUE);
		$this->template->write('meta_description', $meta_description, TRUE);
		$this->template->write('meta_keyword', $meta_keyword, TRUE);
		$this->template->add_css($data_header['color'].'/fund-'.$data_header['color'].'.css');

			if($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1)
			{
				$this->template->set_master_template('iphone/template.php');
				$this->template->write_view('main_content', 'iphone/search_project_detail', $data, TRUE);
				$this->template->render();
			}
			elseif(($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1)
			{
				$this->template->set_master_template('mobile/template.php');
				$this->template->write_view('main_content', 'mobile/search_project_detail', $data, TRUE);
				$this->template->render();
			}
			else
			{
				//$this->template->write_view('header', 'default/create/project_header', $data, TRUE);
				$this->template->write_view('header', 'default/common/header_login', $data, TRUE);
				$this->template->write_view('main_content', 'default/create/project_details_preview', $data, TRUE);
				//$this->template->write_view('footer', 'default/project_footer',$data, TRUE);
				$this->template->render();
			}
	}
	
	function launch_payment($id=null){
		if(!check_user_authentication()) {  redirect('home/login'); } 
			$chk_user_project=$this->db->query("select * from project where project_id='".$id."' and user_id='".get_authenticateUserID()."'");
		if($chk_user_project->num_rows()>0)
		{
		}else	{
				redirect('home/dashboard');		
		}
		$data['site_setting'] = site_setting();
			$site_setting=site_setting();
			$chk_create = $this->project_model->check_can_create(get_authenticateUserID());

			if($chk_create){
				redirect('home/index/not');
			}
			
				$this->load->library('form_validation');

			$data['error']='';
				if($this->input->post('back')){ }

			else{
	$this->form_validation->set_rules('cardnumber', CREDIT_CARD_STORE_NUMBER, 'required|numeric|min_length[12]|max_length[19]');		
		$this->form_validation->set_rules('cvv2Number', CREDIT_CARD_VERFICATION_NUMBER, 'required|numeric|exact_length[3]');	
		$this->form_validation->set_rules('card_first_name', CREDIT_CARD_FIRST_NAME, 'required|min_length[3]');	
		$this->form_validation->set_rules('card_last_name', CREDIT_CARD_LAST_NAME, 'required|min_length[3]');	
		$this->form_validation->set_rules('card_address', CREDIT_CARD_ADDRESS, 'required|min_length[3]');	
		$this->form_validation->set_rules('card_city', CREDIT_CARD_CITY, 'required|min_length[3]');	
		$this->form_validation->set_rules('card_state', CREDIT_CARD_STATE, 'required|min_length[3]');	
		$this->form_validation->set_rules('card_zipcode', CREDIT_CARD_ZIPCODE, 'required|numeric|min_length[3]|max_length[9]');	
				if($_POST){
		 $data['cardnumber'] = $this->input->post('cardnumber');
	     $data['cardtype'] = $this->input->post('cardtype');
	   	$data['card_expiration_month'] = $this->input->post('card_expiration_month');
   		 $data['card_expiration_year'] = $this->input->post('card_expiration_year');
        $data['cvv2Number'] = $this->input->post('cvv2Number');
	     $data['card_first_name'] = $this->input->post('card_first_name');
         $data['card_last_name'] = $this->input->post('card_last_name');
         $data['card_address'] = $this->input->post('card_address');
         $data['card_city'] = $this->input->post('card_city');
         $data['card_state'] = $this->input->post('card_state');
         $data['card_zipcode'] = $this->input->post('card_zipcode');

 if ($credit_card_setting->credit_card_preapproval == 1) {
					
                        $paymentType = 'Authorization';
                        $donate_status = '0';
                        $credit_payment_status = '0';
                        ///===payment_type==0   for FIXED  and 1==FLXIBLE 

                        if ($prj['payment_type'] == 0) {
                            $transaction_fees = $site_setting['fixed_fees'];
                        } else {
                            $transaction_fees = $site_setting['flexible_fees'];
                        }
                    } else {
                        $paymentType = 'Sale';
                        $transaction_fees = $site_setting['instant_fees'];
                        $donate_status = '1';
                        $credit_payment_status = '1';
                    }

                    if ($credit_card_setting->credit_card_site_status == 1) {
                        $end_point = 'https://api-3t.paypal.com/nvp';
                    } else {
                        $end_point = 'https://api-3t.sandbox.paypal.com/nvp';
                    }

                    if ($credit_card_setting->credit_card_use_proxy == 1) {
                        $end_proxy = TRUE;
                    } else {
                        $end_proxy = FALSE;
                    }

                    $this->load->library('creditcard');

                    $config = array();
					$credit_card_setting = credit_card_setting();
                    $config['API_USERNAME'] = $credit_card_setting->credit_card_username;

                    $config['API_PASSWORD'] = $credit_card_setting->credit_card_password;

                    $config['API_SIGNATURE'] = $credit_card_setting->credit_card_api_signature;

                    $config['API_ENDPOINT'] = $end_point;

                    $config['VERSION'] = $credit_card_setting->credit_card_version;

                    $config['SUBJECT'] = $credit_card_setting->credit_card_subject;

                    $config['USE_PROXY'] = $end_proxy;

                    $config['PROXY_HOST'] = $credit_card_setting->credit_card_proxy_host;

                    $config['PROXY_PORT'] = $credit_card_setting->credit_card_proxy_port;

                    $crditobj = $this->creditcard->config($config);
            /*** Get required parameters from the web form for the request****/

                    $project_id = $id;

                    $donar_amount = 100;

                  $donar_comment = $post_docomment;

                    $perk_id = 0;

                    $pay_fee = 0;

                    $anonymous = $post_anonymous;

                    $trw2 = 'FS' . randomNumber(10);

                    $trw3 = 'FS' . randomNumber(10);

                    $donate_status = 1;

                    $login_user = get_user_detail($this->session->userdata('user_id'));

              $cardnumber = $this->input->post('cardnumber');

                    $cardtype = $this->input->post('cardtype');

                    $card_expiration_month = $this->input->post('card_expiration_month');

                    $card_expiration_year = $this->input->post('card_expiration_year');

                    $cvv2Number = $this->input->post('cvv2Number');

                    $card_first_name = $this->input->post('card_first_name');

                    $card_last_name = $this->input->post('card_last_name');

                    $card_address = $this->input->post('card_address');

                    $card_city = $this->input->post('card_city');

                    $card_state = $this->input->post('card_state');

                    $card_zipcode = $this->input->post('card_zipcode');

                    $paymentType = urlencode($paymentType);

                    $firstName = urlencode($card_first_name);

                    $lastName = urlencode($card_last_name);

                    $creditCardType = urlencode($cardtype);

                    $creditCardNumber = urlencode($cardnumber);

                    $expDateMonth = urlencode($card_expiration_month);

                    // Month must be padded with leading zero

                    $padDateMonth = str_pad($expDateMonth, 2, '0', STR_PAD_LEFT);



                    $expDateYear = urlencode($card_expiration_year);

                    $cvv2Number = urlencode($cvv2Number);



                    $address1 = urlencode($card_address);

                    $city = urlencode($card_city);

                    $state = urlencode($card_state);

                    $zip = urlencode($card_zipcode);











                    $amount = urlencode($donar_amount);

                    $currencyCode = $currency_code;

                    $paymentType = urlencode($paymentType);



                    /* Construct the request string that will be sent to PayPal.

                      The variable $nvpstr contains all the variables and is a

                      name value pair string with & as a delimiter */

                    $nvpstr = "&PAYMENTACTION=$paymentType&AMT=$amount&CREDITCARDTYPE=$creditCardType&ACCT=$creditCardNumber&EXPDATE=" . $padDateMonth . $expDateYear . "&CVV2=$cvv2Number&FIRSTNAME=$firstName&LASTNAME=$lastName&STREET=$address1&CITY=$city&STATE=$state" .

                            "&ZIP=$zip&COUNTRYCODE=US&CURRENCYCODE=$currencyCode";






                    /* Make the API call to PayPal, using API signature.

                      The API response is stored in an associative array called $resArray */

                    $resArray = $this->creditcard->hash_call("doDirectPayment", $nvpstr);



                    $strtemp = '';

                    foreach ($resArray as $key => $value) {



                        $strtemp.= $key . "=" . $value . ",";

                    }

                    log_message('error', "DONATE WITH CREDIT CARD DATA:" . $strtemp);

              /*      echo "<pre>";

                      print_r($resArray);

                     exit; 
*/


                    /* Display the API response back to the browser.

                      If the response from PayPal was a success, display the response parameters'

                      If the response was an error, display the errors received using APIError.php.

                     */

                    $ack = strtoupper($resArray["ACK"]);







                    if ($ack != "SUCCESS") {

		                 if (isset($resArray['L_LONGMESSAGE0'])) {

                            $error_code = '';

                            if (isset($resArray['L_ERRORCODE0'])) {

                                $error_code = '(' . $resArray['L_ERRORCODE0'] . ')';

                            }

                            $res_msg_error = $error_code . ' ' . $resArray['L_LONGMESSAGE0'];

                        } else {

                            $res_msg_error = 'There was some problem in transaction. Please try again.';

                        }

                        $error = $res_msg_error;

                        $data['error'] = $error;

            //     $this->load->view('default/paypal_error', $data);

                    } else {

                        $txnid = $resArray['TRANSACTIONID'];

                        $chk_trans_id = 1;

                        $chk_transaction = $this->db->query("select * from transaction where credit_card_transaction_id='" . $txnid . "'");


                        if ($chk_transaction->num_rows() > 0) {

                            $chk_trans_id = 0;

                        }

                        if ($chk_trans_id == 1) {





                            $donar_amount = $resArray['AMT'];





                            $pay_fee = (($donar_amount * $transaction_fees) / 100);



                            $original_amount = $donar_amount - $pay_fee;



                            $temp_admin_amount = (($donar_amount * $transaction_fees) / 100);



                            $admin_amount = $donar_amount;

                            $owner_amount = ($donar_amount - $temp_admin_amount);



                            //$owner_amount = $donar_amount * $site_setting['instant_fees']/100;





                            $update_donor_wallet = $this->db->query("insert into wallet(`credit`,`user_id`,`admin_status`,`wallet_date`,`wallet_transaction_id`,`wallet_payee_email`,`wallet_ip`,`gateway_id`,`project_id`,`donate_status`,`wallet_anonymous`)values('" . $donar_amount . "','" . $this->session->userdata('user_id') . "','Confirm','" . date("Y-m-d H:i:s") . "','" . $trw2 . "','Credit Card','" . $_SERVER['REMOTE_ADDR'] . "','0','" . $project_id . "','" . $donate_status . "','" . $anonymous . "')");



                            $update_donor_wallet_debit = $this->db->query("insert into wallet(`debit`,`user_id`,`admin_status`,`wallet_date`,`wallet_transaction_id`,`wallet_payee_email`,`wallet_ip`,`gateway_id`,`project_id`,`donate_status`,`wallet_anonymous`)values('" . $donar_amount . "','" . $this->session->userdata('user_id') . "','Confirm','" . date("Y-m-d H:i:s") . "','" . $trw2 . "','Credit Card','" . $_SERVER['REMOTE_ADDR'] . "','0','" . $project_id . "','" . $donate_status . "','" . $anonymous . "')");



                       /*     $insert_owner_wallet = $this->db->query("insert into wallet(`debit`,`user_id`,`admin_status`,`wallet_date`,`wallet_transaction_id`,`wallet_payee_email`,`wallet_ip`,`gateway_id`,`project_id`,`donate_status`,`wallet_anonymous`)values('" . $owner_amount . "','" . $prj['user_id'] . "','Confirm','" . date("Y-m-d H:i:s") . "','" . $trw2 . "','Credit Card','" . $_SERVER['REMOTE_ADDR'] . "','0','" . $vals['item_number'] . "','" . $donate_status . "','" . $anonymous . "')");
*/


                            $insert = $this->db->query("insert into transaction (`user_id`,`project_id`,`perk_id`,`amount`,`listing_fee`,`pay_fee`,`email`,`host_ip`,`paypal_email`,`comment`,`transaction_date_time`,`trans_anonymous`,`credit_card_transaction_id`,`credit_card_payment_status`,`wallet_payment_status`,startproject)values('" . $this->session->userdata('user_id') . "','" . $project_id . "','" . $perk_id . "','" . $original_amount . "','0','" . $pay_fee . "','" . $login_user['email'] . "','" . $_SERVER['REMOTE_ADDR'] . "','" . $login_user['email'] . "','" . $donar_comment . "','" . date("Y-m-d H:i:s") . "','" . $anonymous . "','" . $txnid . "','" . $credit_payment_status . "','2','1')");



                            $last_transaction_id = mysql_insert_id();





                            /*$get_don_project = $this->db->get_where('project', array('project_id' => $project_id));

                            $don_prj = $get_don_project->row_array();

                            if ($don_prj['amount_get'] != "") {

                                $amt = $don_prj['amount_get'];

                            } else {

                                $amt = 0;

                            }

                            $data_don = array(

                                'amount_get' => $amt + $donar_amount,

                            );

                            $this->db->where('project_id', $project_id);

                            $this->db->update('project', $data_don);*/







                            if ($perk_id != '' && $perk_id != '0') {



                                $query = $this->db->get_where('perk', array('perk_id' => $perk_id));

                                $pk = $query->row_array();

                                $data = array(

                                    'perk_get' => ($pk['perk_get'] * 1) + 1,

                                );

                                $this->db->where('perk_id', $perk_id);

                                $this->db->update('perk', $data);

                            }

                            ///////////==========affiliate earn=============		

                            $prj = $this->project_model->get_project_user($project_id);

                            $login_user = get_user_detail($this->session->userdata('user_id'));

                            $user_detail = get_user_detail($prj['user_id']);



                            $project_id = $prj['project_id'];

                            $project_title = $prj['project_title'];

                            $url_project_title = $prj['url_project_title'];

                            $project_owner_email = $user_detail['paypal_email'];



                            $username = $prj['user_name'];

                            $donar_email = $login_user['email'];

                            $project_owner_email = $prj['email'];



                            $project_name = $project_title;

                            $project_page_link = site_url('projects/' . $url_project_title . '/' . $project_id);



                            $donor_name = $login_user['user_name'];

                            $donote_amount = $donar_amount;

                            $donor_profile_link = site_url('member/' . $this->session->userdata('user_id'));



                            $prj = $this->project_model->get_project_user($project_id);

                            $login_user = get_user_detail($this->session->userdata('user_id'));

                            $project = $prj;

                            $facebook_setting = facebook_setting();

					$data['success'] = "Donation is successful";
 
                          redirect('start/launch_project/'.$id);

                        }/////=====check unique transaction id		

                    }


					}
			}
				if($this->form_validation->run() === FALSE)
			{			
						if(validation_errors())
						{
											$data['error'] = validation_errors();
						}
			}
				$data['id']=$id;
		
			$this->template->write_view('header', 'default/common/header_login', $data, TRUE);
			$this->template->write_view('main_content', 'default/create/launch_payment', $data, TRUE);
			
				//$this->template->write_view('footer', 'default/project_footer',$data, TRUE);
				$this->template->render();

		}

	function launch_project($id=null){
			$chk_user_project=$this->db->query("select * from project where project_id='".$id."' and user_id='".get_authenticateUserID()."'");
		if($chk_user_project->num_rows()>0)
		{ }	
		else
		{
				redirect('home/dashboard');	
						
		}	
		$this->db->query("update project set project_draft=1 where project_id='".$id."'");

		$project = get_one_project($id);

		$email_template=$this->db->query("select * from `email_template` where task='New Project Successful Alert'");
		$email_temp=$email_template->row();

				$email_address_from=$email_temp->from_address;

				$email_address_reply=$email_temp->reply_address;

				$email_subject=$email_temp->subject;				

				$email_message=$email_temp->message;

			$user_detail=$this->db->query("select * from user where user_id='".$this->session->userdata('user_id')."'");

				$user=$user_detail->row();

				$username =$user->user_name;

				$project_name =$project['project_title'];				

				$email =$user->email;

				$email_to=$email;

				$project_page_link=site_url('projects/'.$project['url_project_title'].'/'.$id);

				$email_message=str_replace('{break}','<br/>',$email_message);

				$email_message=str_replace('{user_name}',$username,$email_message);

				$email_message=str_replace('{project_name}',$project_name,$email_message);

				$email_message=str_replace('{email}',$email,$email_message);

				$email_message=str_replace('{project_page_link}',$project_page_link,$email_message);

				$str=$email_message;

				$user_not_donor=$this->user_model->get_email_notification($this->session->userdata('user_id'));	

			if($user_not_donor->project_alert=='1'){
				email_send($email_address_from,$email_address_reply,$email_to,$email_subject,$str);
			}					

				///////////////////////=========admin mail for new project post========

		$email_template=$this->db->query("select * from `email_template` where task='New Project Post Admin Alert'");
		$email_temp=$email_template->row();

				$email_address_from=$email_temp->from_address;

				$email_address_reply=$email_temp->reply_address;

				$email_subject=$email_temp->subject;				

				$email_message=$email_temp->message;

			$user_detail=$this->db->query("select * from user where user_id='".$this->session->userdata('user_id')."'");

				$user=$user_detail->row();

				$username =$user->user_name;

				$project_name =$project['project_title'];				

				$email =$user->email;

				$email_to=$email;

				$project_page_link=site_url('projects/'.$project['url_project_title'].'/'.$id);

				$user_profile_link=site_url('member/'.$this->session->userdata('user_id'));

				$email_message=str_replace('{break}','<br/>',$email_message);

				$email_message=str_replace('{user_name}',$username,$email_message);

				$email_message=str_replace('{project_name}',$project_name,$email_message);

				$email_message=str_replace('{project_page_link}',$project_page_link,$email_message);

				$email_message=str_replace('{user_profile_link}',$user_profile_link,$email_message);

				$str=$email_message;

				email_send($email_address_from,$email_address_reply,$email_to,$email_subject,$str);

				//////////============new project create email========

		///////////////===============email==================	

		//redirect('home/dashboard/success');
		redirect('home/index/payment_success');	

	}

	/*****   create process in steps  end *********/
	function deleteproject_popup($id)
	{
		//$this->load->view('default/create/deleteprojectfancy/'.$data);
		if(!check_user_authentication()) {  redirect('home/login'); } 		  
		$site_setting=site_setting();
		$data['id']=$id;
		$this->template->write_view('main_content', 'default/create/deleteprojectfancy', $data, TRUE);
		$this->template->render();
	}

	function delete_perk($id='')
	{
		$this->db->query("delete from perk where perk_id='".$id."'");	
		//echo "deleteperk";
	}

	function delete_project($id='')
	{
		$project_detail=$this->db->query("select * from project where project_id='".$id."'");
		$project=$project_detail->row();

		$user_detail=$this->db->query("select * from user where user_id='".$project->user_id."'");
		$user=$user_detail->row();
		/*$user_not_own=$this->user_model->get_email_notification($project->user_id);
			 if(isset($user_not_own->project_alert)) { 
			if($user_not_own->project_alert=='1'){
		$email_template=$this->db->query("select * from `email_template` where task='Admin Project Delete Alert'");
				$email_temp=$email_template->row();
				$email_address_from=$email_temp->from_address;
				$email_address_reply=$email_temp->reply_address;
				$email_subject=$email_temp->subject;				
				$email_message=$email_temp->message;
				$project_name=$project->project_title;
				$username =$user->user_name;			
				$email = $user->email;
				$email_to=$email;
				$email_message=str_replace('{break}','<br/>',$email_message);

				$email_message=str_replace('{user_name}',$username,$email_message);

				$email_message=str_replace('{project_name}',$project_name,$email_message);

				$str=$email_message;

				$this->email->from($email_address_from);

				$this->email->reply_to($email_address_reply);

				$this->email->to($email_to);

				$this->email->subject($email_subject);

				$this->email->message($str);

				$this->email->send();
			}
		}*/

/////////////============email===========

			$this->startproject_model->delete_project($id);

	   echo "<script>parent.window.location.href='".site_url('home/delete')."'</script>";
	//   die;
	}

	function getstate($countryid='')
	{
		$str='<select tabindex="5" name="state" id="state" class="user_select" style="text-transform:capitalize;" onblur="getcity(this.value)">';

			$query=$this->db->query("select * from state where active='1' and country_id='".$countryid."'");

			if($query->num_rows()>0)
			{	
				$state=$query->result();

				foreach($state as $st)
				{
					$str .= "<option value='".$st->state_id."'>".$st->state_name."</option>";
				}
			}
		else
			{
				$str .= "<option value=''>".NO_STATES."</option>";
			}
		$str.='</select>';

		echo $str;

		die();
	}
	
	function getcity($stateid='')
	{
		$str='<select tabindex="5" name="city" id="city" class="user_select" style="text-transform:capitalize;">';

		$query=$this->db->query("select * from city where active='1' and state_id='".$stateid."'");

			if($query->num_rows()>0)
			{	
				$city=$query->result();
				foreach($city as $ct)
				{
					$str .= "<option value='".$ct->city_id."'>".$ct->city_name."</option>";
				}
			}
			else
			{
				$str .= "<option value=''>".NO_CITY."</option>";
			}
		$str.='</select>';
		echo $str;
		die();
	}

	function getallcity()
	{
		$str2='<select tabindex="5" name="city" id="city" class="user_select" style="text-transform:capitalize;">';

			$query=$this->db->query("select * from city where active='1'");
			if($query->num_rows()>0)
			{	
				$city=$query->result();
				foreach($city as $ct)
				{
					$str2 .= "<option value='".$ct->city_id."'>".$ct->city_name."</option>";
				}
			}
			else
			{
				$str2 .= "<option value=''>".NO_CITY."</option>";
			}
		//$str2.='</select>';
		$str2.='</select>';
		echo $str2;
		die;
	}
}

?>