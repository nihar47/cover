<?php
class Email_template extends CI_Controller {
	function Email_template()
	{
		parent::__construct();
		$this->load->model('email_template_model');
		$this->load->model('home_model');
		
	}
	
	function index()
	{
		redirect('email_template/add_email_template/');
	}
	
	function add_email_template($id=0)
	{
		
		
		$check_rights=$this->home_model->get_rights('add_email_template');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('from_address', 'From Address', 'required|valid_email');
		$this->form_validation->set_rules('reply_address', 'Reply Address', 'required|valid_email');
		$this->form_validation->set_rules('subject', 'Subject', 'required');
		$this->form_validation->set_rules('message', 'Message', 'required');
		if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();
			}else{
				$data["error"] = "";
			}
			if($this->input->post('email_template_id'))
			{
				$data["email_template_id"] = $this->input->post('email_template_id');
				$data["from_address"] = $this->input->post('from_address');
				$data["reply_address"] = $this->input->post('reply_address');
				$data["subject"] = $this->input->post('subject');
				$data["message"] = $this->input->post('message');
			}else{
				$one_email_template = $this->email_template_model->get_one_email_template($id);
				$data["email_template_id"] = $one_email_template['email_template_id'];
				$data["from_address"] = $one_email_template['from_address'];
				$data["reply_address"] = $one_email_template['reply_address'];
				$data["subject"] = $one_email_template['subject'];
				$data["message"] = $one_email_template['message'];
			}
			
			$data['site_setting'] = $this->home_model->select_site_setting();
			
			$data["template"] = $this->email_template_model->get_email_template();
			$this->template->write('title', 'Email Templates', '', TRUE);
			$this->template->write_view('header', 'header', $data, TRUE);
			$this->template->write_view('main_content', 'add_email_template', $data, TRUE);
			$this->template->write_view('footer', 'footer', '', TRUE);
			$this->template->render();
		}else{
			$this->email_template_model->email_template_update();
			$data["error"] = "Email template updated successfully";
			$data["email_template_id"] = $this->input->post('email_template_id');
			$data["from_address"] = $this->input->post('from_address');
			$data["reply_address"] = $this->input->post('reply_address');
			$data["subject"] = $this->input->post('subject');
			$data["message"] = $this->input->post('message');
			$data["template"] = $this->email_template_model->get_email_template();
			
			$data['site_setting'] = $this->home_model->select_site_setting();
			
			$this->template->write('title', 'Email Templates', '', TRUE);
			$this->template->write_view('header', 'header', $data, TRUE);
			$this->template->write_view('main_content', 'add_email_template', $data, TRUE);
			$this->template->write_view('footer', 'footer', '', TRUE);
			$this->template->render();
		}				
	}	
}
?>