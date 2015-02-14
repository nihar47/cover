<?php
class Facebook_setting extends CI_Controller {
	function Facebook_setting()
	{
		parent::__construct();
		$this->load->model('facebook_setting_model');
		$this->load->model('home_model');
		$this->load->library('fb_connect');
	}
	
	function index()
	{
		redirect('facebook_setting/add_facebook_setting');	
	}
	
	function add_facebook_setting()
	{
		
		
		$check_rights=$this->home_model->get_rights('add_facebook_setting');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('facebook_application_id', 'Facebook Application Id', 'required');
		if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();
			}else{
				$data["error"] = "";
			}
			if($this->input->post('facebook_setting_id'))
			{
				$data["facebook_setting_id"] = $this->input->post('facebook_setting_id');
				$data["facebook_application_id"] = $this->input->post('facebook_application_id');
				$data["facebook_login_enable"] = $this->input->post('facebook_login_enable');
				$data["facebook_access_token"] = $this->input->post('facebook_access_token');
				$data["facebook_api_key"] = $this->input->post('facebook_api_key');
				$data["facebook_user_id"] = $this->input->post('facebook_user_id');
				$data["facebook_secret_key"] = $this->input->post('facebook_secret_key');
				$data["facebook_user_autopost"] = $this->input->post('facebook_user_autopost');
				$data["facebook_wall_post"] = $this->input->post('facebook_wall_post');
				$data["facebook_url"] = $this->input->post('facebook_url');
				$data["fb_img"] = $this->input->post('fb_img');
			}else{
				$one_facebook_setting = $this->facebook_setting_model->get_one_facebook_setting();
				$data["facebook_setting_id"] = $one_facebook_setting['facebook_setting_id'];
				$data["facebook_application_id"] = $one_facebook_setting['facebook_application_id'];
				$data["facebook_login_enable"] = $one_facebook_setting['facebook_login_enable'];
				$data["facebook_access_token"] = $one_facebook_setting['facebook_access_token'];
				$data["facebook_api_key"] = $one_facebook_setting['facebook_api_key'];
				$data["facebook_user_id"] = $one_facebook_setting['facebook_user_id'];
				$data["facebook_secret_key"] = $one_facebook_setting['facebook_secret_key'];
				$data["facebook_user_autopost"] = $one_facebook_setting['facebook_user_autopost'];
				$data["facebook_wall_post"] = $one_facebook_setting['facebook_wall_post'];
				$data["facebook_url"] = $one_facebook_setting['facebook_url'];
				$data["fb_img"] = $one_facebook_setting['fb_img'];
			}
			
			$data['site_setting'] = $this->home_model->select_site_setting();
			
			$this->template->write('title', 'Facebook Settings', '', TRUE);
			$this->template->write_view('header', 'header', $data, TRUE);
			$this->template->write_view('main_content', 'add_facebook_setting', $data, TRUE);
			$this->template->write_view('footer', 'footer', '', TRUE);
			$this->template->render();
		}else{
			$this->facebook_setting_model->facebook_setting_update();
			$data["error"] = "Facebook settings updated successfully";
			$data["facebook_setting_id"] = $this->input->post('facebook_setting_id');
			$data["facebook_application_id"] = $this->input->post('facebook_application_id');
			$data["facebook_login_enable"] = $this->input->post('facebook_login_enable');
			$data["facebook_access_token"] = $this->input->post('facebook_access_token');
			$data["facebook_api_key"] = $this->input->post('facebook_api_key');
			$data["facebook_user_id"] = $this->input->post('facebook_user_id');
			$data["facebook_secret_key"] = $this->input->post('facebook_secret_key');
			$data["facebook_user_autopost"] = $this->input->post('facebook_user_autopost');
			$data["facebook_wall_post"] = $this->input->post('facebook_wall_post');
			$data["facebook_url"] = $this->input->post('facebook_url');
			$data["fb_img"] = $this->input->post('fb_img');
			
			$data['site_setting'] = $this->home_model->select_site_setting();
			
			
			$this->template->write('title', 'Facebook Settings', '', TRUE);
			$this->template->write_view('header', 'header', $data, TRUE);
			$this->template->write_view('main_content', 'add_facebook_setting', $data, TRUE);
			$this->template->write_view('footer', 'footer', '', TRUE);
			$this->template->render();
		}				
	}
	
   
	
}
?>