<?php
class Yahoo_setting extends CI_Controller {
	function Yahoo_setting()
	{
		parent::__construct();	
		$this->load->model('yahoo_setting_model');
			$this->load->model('home_model');
	}
	
	/*** facebook setting home page
	**/
	function index()
	{
		redirect('yahoo_setting/add_yahoo_setting');	
	}
	
	/** admin facebook setting display and update function
	* var integer $facebook_application_id
	* var integer $facebook_login_enable
	* var string $facebook_api_key
	* var string $facebook_secret_key	
	* var string $facebook_url
	* var string $error		
	**/
	function add_yahoo_setting()
	{
		$data = array();
		$check_rights= $this->home_model->get_rights('add_yahoo_setting');
		
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
			if($this->input->post('yahoo_setting_id'))
			{
				$data["yahoo_setting_id"] = $this->input->post('yahoo_setting_id');
				$data["consumer_key"] = $this->input->post('consumer_key');
				$data["consumer_secret"] = $this->input->post('consumer_secret');
				$data["yahoo_enable"] = $this->input->post('yahoo_enable');
				
			}else{
				$one_yahoo_setting = $this->yahoo_setting_model->get_one_yahoo_setting();
				$data["yahoo_setting_id"] = $one_yahoo_setting->yahoo_setting_id;
				$data["consumer_key"] = $one_yahoo_setting->consumer_key;
				$data["consumer_secret"] = $one_yahoo_setting->consumer_secret;
				$data["yahoo_enable"] = $one_yahoo_setting->yahoo_enable;
			
			}
			
		}else{
			$this->yahoo_setting_model->yahoo_setting_update();
			$data["error"] = "Yahoo settings updated successfully.";
			$data["yahoo_setting_id"] = $this->input->post('yahoo_setting_id');
			$data["consumer_key"] = $this->input->post('consumer_key');
			$data["consumer_secret"] = $this->input->post('consumer_secret');
			$data["yahoo_enable"] = $this->input->post('yahoo_enable');
			
		}	
		
			$data['site_setting'] = $this->home_model->select_site_setting();
			$this->template->write('title', 'Yahoo Settings', '', TRUE);
			$this->template->write_view('header', 'header', $data, TRUE);
			$this->template->write_view('main_content', 'add_yahoo_setting', $data, TRUE);
			$this->template->write_view('footer', 'footer', '', TRUE);
			$this->template->render();			
	}
	
}
?>