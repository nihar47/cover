<?php
class Google_setting extends CI_Controller {
	function Google_setting()
	{
		parent::__construct();	
		$this->load->model('google_setting_model');
			$this->load->model('home_model');
	}
	
	/*** facebook setting home page
	**/
	function index()
	{
		redirect('google_setting/add_google_setting');	
	}
	
	/** admin facebook setting display and update function
	* var integer $facebook_application_id
	* var integer $facebook_login_enable
	* var string $facebook_api_key
	* var string $facebook_secret_key	
	* var string $facebook_url
	* var string $error		
	**/
	function add_google_setting()
	{
		$data = array();
		$check_rights= $this->home_model->get_rights('add_google_setting');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('consumer_key', 'Consumer Key', 'required');
		$this->form_validation->set_rules('consumer_secret', 'Consumer Secret', 'required');
		
		
		if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();
			}else{
				$data["error"] = "";
			}
			if($this->input->post('google_setting_id'))
			{
				$data["google_setting_id"] = $this->input->post('google_setting_id');
				$data["consumer_key"] = $this->input->post('consumer_key');
				$data["consumer_secret"] = $this->input->post('consumer_secret');
				$data["google_enable"] = $this->input->post('google_enable');
				
			}else{
				$one_google_setting = $this->google_setting_model->get_one_google_setting();
				$data["google_setting_id"] = $one_google_setting->google_setting_id;
				$data["consumer_key"] = $one_google_setting->consumer_key;
				$data["consumer_secret"] = $one_google_setting->consumer_secret;
				$data["google_enable"] = $one_google_setting->google_enable;
			
			}
			
		
			
		}else{
			$this->google_setting_model->google_setting_update();
			$data["error"] = "Google settings updated successfully.";
			$data["google_setting_id"] = $this->input->post('google_setting_id');
			$data["consumer_key"] = $this->input->post('consumer_key');
			$data["consumer_secret"] = $this->input->post('consumer_secret');
			$data["google_enable"] = $this->input->post('google_enable');			
			
		}		
		
			$data['site_setting'] = $this->home_model->select_site_setting();
			$this->template->write('title', 'Google Settings', '', TRUE);
			$this->template->write_view('header', 'header', $data, TRUE);
			$this->template->write_view('main_content', 'add_google_setting', $data, TRUE);
			$this->template->write_view('footer', 'footer', '', TRUE);
			$this->template->render();				
	}
	
}
?>