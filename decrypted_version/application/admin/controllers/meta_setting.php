<?php
class Meta_setting extends CI_Controller {
	function Meta_setting()
	{
		parent::__construct();
		$this->load->model('meta_setting_model');
		$this->load->model('home_model');
		
	}
	
	function index()
	{
		redirect('meta_setting/add_meta_setting');	
	}
	
	function add_meta_setting()
	{
		
		$check_rights=$this->home_model->get_rights('add_meta_setting');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('title', 'Title', 'required');
		if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();
			}else{
				$data["error"] = "";
			}
			if($this->input->post('meta_setting_id'))
			{
				$data["meta_setting_id"] = $this->input->post('meta_setting_id');
				$data["title"] = $this->input->post('title');
				$data["meta_keyword"] = $this->input->post('meta_keyword');
				$data["meta_description"] = $this->input->post('meta_description');
			}else{
				$one_meta_setting = $this->meta_setting_model->get_one_meta_setting();
				$data["meta_setting_id"] = $one_meta_setting['meta_setting_id'];
				$data["title"] = $one_meta_setting['title'];
				$data["meta_keyword"] = $one_meta_setting['meta_keyword'];
				$data["meta_description"] = $one_meta_setting['meta_description'];
			}
			
			$data['site_setting'] = $this->home_model->select_site_setting();
			
			$this->template->write('title', 'Settings', '', TRUE);
			$this->template->write_view('header', 'header', $data, TRUE);
			$this->template->write_view('main_content', 'add_meta_setting', $data, TRUE);
			$this->template->write_view('footer', 'footer', '', TRUE);
			$this->template->render();
		}else{
			$this->meta_setting_model->meta_setting_update();
			$data["error"] = "Meta settings updated successfully";
			$data["meta_setting_id"] = $this->input->post('meta_setting_id');
			$data["title"] = $this->input->post('title');
			$data["meta_keyword"] = $this->input->post('meta_keyword');
			$data["meta_description"] = $this->input->post('meta_description');
			
			$data['site_setting'] = $this->home_model->select_site_setting();
			
			$this->template->write('title', 'Settings', '', TRUE);
			$this->template->write_view('header', 'header', $data, TRUE);
			$this->template->write_view('main_content', 'add_meta_setting', $data, TRUE);
			$this->template->write_view('footer', 'footer', '', TRUE);
			$this->template->render();
		}				
	}
	
}
?>