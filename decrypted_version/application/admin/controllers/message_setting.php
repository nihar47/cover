<?php
class Message_setting extends CI_Controller {
	function Message_setting()
	{
		parent::__construct();
		$this->load->model('message_setting_model');
		$this->load->model('home_model');
		
	}
	
	function index()
	{}
	
	function add_message_setting()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('default_message_subject', 'Message subject', 'required');
		if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();
			}else{
				$data["error"] = "";
			}
			if($this->input->post('message_setting_id'))
			{
				$data["message_setting_id"] = $this->input->post('message_setting_id');
				$data["email_admin_on_new_message"] = $this->input->post('email_admin_on_new_message');
				$data["email_user_on_new_message"] = $this->input->post('email_user_on_new_message');
				$data["default_message_subject"] = $this->input->post('default_message_subject');
				$data["message_enable"] = $this->input->post('message_enable');
				
			}else{
				$one_message_setting = $this->message_setting_model->get_one_message_setting();
				$data["message_setting_id"] = $one_message_setting['message_setting_id'];
				$data["email_admin_on_new_message"] = $one_message_setting['email_admin_on_new_message'];
				$data["email_user_on_new_message"] = $one_message_setting['email_user_on_new_message'];
				$data["default_message_subject"] = $one_message_setting['default_message_subject'];
				$data["message_enable"] = $one_message_setting['message_enable'];
				
			}
			$this->template->write('title', 'Settings', '', TRUE);
			$this->template->write_view('header', 'header', '', TRUE);
			$this->template->write_view('main_content', 'add_message_setting', $data, TRUE);
			$this->template->write_view('footer', 'footer', '', TRUE);
			$this->template->render();
		}else{
			$this->message_setting_model->message_setting_update();
			$data["error"] = "Message settings updated successfully";
			$data["message_setting_id"] = $this->input->post('message_setting_id');
			$data["email_admin_on_new_message"] = $this->input->post('email_admin_on_new_message');
			$data["email_user_on_new_message"] = $this->input->post('email_user_on_new_message');
			$data["default_message_subject"] = $this->input->post('default_message_subject');
			$data["message_enable"] = $this->input->post('message_enable');
			$this->template->write('title', 'Settings', '', TRUE);
			$this->template->write_view('header', 'header', '', TRUE);
			$this->template->write_view('main_content', 'add_message_setting', $data, TRUE);
			$this->template->write_view('footer', 'footer', '', TRUE);
			$this->template->render();
		}				
	}
	
}
?>