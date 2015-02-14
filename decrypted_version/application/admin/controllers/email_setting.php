<?php
class Email_setting extends CI_Controller {
	function Email_setting()
	{
		parent::__construct();
		$this->load->model('email_setting_model');
		$this->load->model('home_model');
		
	}
	
	function index()
	{
		redirect('email_setting/add_email_setting/');
	}
	
	function add_email_setting()
	{
		
		$check_rights=$this->home_model->get_rights('add_email_setting');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('mailer', 'Mailer Type', 'required');
		
		if($this->input->post('mailer')=='sendmail')
		{		
			$this->form_validation->set_rules('sendmail_path', 'Sendmail Path', 'required');
		}
		
		
		if($this->input->post('mailer')=='smtp')
		{
			$this->form_validation->set_rules('smtp_port', 'Smtp Port', 'required|is_natural_no_zero');
			$this->form_validation->set_rules('smtp_host', 'Smtp Host', 'required');
			$this->form_validation->set_rules('smtp_email', 'Smtp Email', 'required|valid_email');
			$this->form_validation->set_rules('smtp_password', 'Smtp Password', 'required');
		}
		
		
		
		if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();
			}else{
				$data["error"] = "";
			}
			if($this->input->post('email_setting_id'))
			{
				$data["email_setting_id"] = $this->input->post('email_setting_id');
				$data["mailer"] = $this->input->post('mailer');
				$data["sendmail_path"] = $this->input->post('sendmail_path');
				$data["smtp_port"] = $this->input->post('smtp_port');
				$data["smtp_host"] = $this->input->post('smtp_host');
				$data["smtp_email"] = $this->input->post('smtp_email');
				$data["smtp_password"] = $this->input->post('smtp_password');
				
				
			}else{
				
			
				$email_setting = $this->email_setting_model->get_my_email_setting();
								
				$data["email_setting_id"] = $email_setting['email_setting_id'];
				$data["mailer"] = $email_setting['mailer'];
				$data["sendmail_path"] = $email_setting['sendmail_path'];
				$data["smtp_port"] = $email_setting['smtp_port'];
				$data["smtp_host"] = $email_setting['smtp_host'];
				$data["smtp_email"] = $email_setting['smtp_email'];
				$data["smtp_password"] = $email_setting['smtp_password'];
				
				
			}
			
			
			$data['site_setting'] = $this->home_model->select_site_setting();
			
			$this->template->write('title', 'Email Settings', '', TRUE);
			$this->template->write_view('header', 'header', $data, TRUE);
			$this->template->write_view('main_content', 'add_email_setting', $data, TRUE);
			$this->template->write_view('footer', 'footer', '', TRUE);
			$this->template->render();
		}else{
			$this->email_setting_model->email_setting_update();
			$data["error"] = "Email settings updated successfully";
			$data["email_setting_id"] = $this->input->post('email_setting_id');
			
			$data["mailer"] = $this->input->post('mailer');
			$data["sendmail_path"] = $this->input->post('sendmail_path');
			$data["smtp_port"] = $this->input->post('smtp_port');
			$data["smtp_host"] = $this->input->post('smtp_host');
			$data["smtp_email"] = $this->input->post('smtp_email');
			$data["smtp_password"] = $this->input->post('smtp_password');
				
			$data['site_setting'] = $this->home_model->select_site_setting();
			
			$this->template->write('title', 'Email Settings', '', TRUE);
			$this->template->write_view('header', 'header',$data, TRUE);
			$this->template->write_view('main_content', 'add_email_setting', $data, TRUE);
			$this->template->write_view('footer', 'footer', '', TRUE);
			$this->template->render();
		}				
	}
	
	/*Tesing Mail Functionality*/
	
	function send_test_mail()
	{
		
		
		$check_rights=$this->home_model->get_rights('add_email_setting');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('sender_mail', 'Sender Mail', 'required|valid_email');
		$this->form_validation->set_rules('receiver_email', 'Receiver Mail', 'required|valid_email');
		$this->form_validation->set_rules('message_text', 'Message', 'required');
		
		
		
		if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();
			}else{
				$data["error"] = "";
			}
			
				
			
			$data['site_setting'] = $this->home_model->select_site_setting();
			$email_setting = $this->email_setting_model->get_my_email_setting();
			$data["email_setting_id"] = $email_setting['email_setting_id'];
		
			$this->template->write('title', 'Email Settings', '', TRUE);
			$this->template->write_view('header', 'header', $data, TRUE);
			$this->template->write_view('main_content', 'send_testing_email', $data, TRUE);
			$this->template->write_view('footer', 'footer', '', TRUE);
			$this->template->render();
		}else{
		
			//$this->email_setting_model->email_setting_update();
			
			
			$email_setting = $this->email_setting_model->get_my_email_setting();
								
			$data["email_setting_id"] = $email_setting['email_setting_id'];
			$data["mailer"] = $email_setting['mailer'];
			$data["sendmail_path"] = $email_setting['sendmail_path'];
			$data["smtp_port"] = $email_setting['smtp_port'];
			$data["smtp_host"] = $email_setting['smtp_host'];
			$data["smtp_email"] = $email_setting['smtp_email'];
			$data["smtp_password"] = $email_setting['smtp_password'];
			
			/*Send Testing Mail*/
			$this->load->library('email');
			///////====smtp====
			
			if($email_setting['mailer']=='smtp')
			{
			
			
				$config['protocol']='smtp';  
				$config['smtp_host']=trim($email_setting['smtp_host']);  
				$config['smtp_port']=trim($email_setting['smtp_port']);  
				$config['smtp_timeout']='30';  
				$config['smtp_user']=trim($email_setting['smtp_email']);  
				$config['smtp_pass']=trim($email_setting['smtp_password']);  
				
			}
			
			/////=====sendmail======
			elseif($email_setting['mailer']=='sendmail')
			{	
			
				$config['protocol'] = 'sendmail';
				$config['mailpath'] = trim($email_setting['sendmail_path']);
			
				
			}
			/////=====php mail default======
			else
			{
			
			}
				
				
			$config['wordwrap'] = TRUE;	
			$config['mailtype'] = 'html';
			$config['crlf'] = '\n\n';
			$config['newline'] = '\n\n';
			
			$email_to = $this->input->post('receiver_email');
			$email_address_from = $this->input->post('sender_mail');
			$email_address_reply = $this->input->post('sender_mail');
			$email_subject = 'Testing Mail';
			$email_message =  $this->input->post('message_text');
			
			$str=$email_message;
						
			$this->email->initialize($config);
			$this->email->from($email_address_from);
			$this->email->reply_to($email_address_reply);
			$this->email->to($email_to);
			$this->email->subject($email_subject);
			$this->email->message($str);
			
			if(!$this->email->send())
			{
				$data["error"] = $this->email->print_debugger();

			}
			
			/*End Testing Mail*/
			else
			{
				$data["error"] = "sent";
			}
			$data["email_setting_id"] = $this->input->post('email_setting_id');
			$data['site_setting'] = $this->home_model->select_site_setting();
			$this->template->write('title', 'Email Settings', '', TRUE);
			$this->template->write_view('header', 'header',$data, TRUE);
			$this->template->write_view('main_content', 'send_testing_email', $data, TRUE);
			$this->template->write_view('footer', 'footer', '', TRUE);
			$this->template->render();
		}				
	
	}
	
	/*End Testing Mail Functionality*/
	
}
?>