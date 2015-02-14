<?php
class User_setting extends CI_Controller {
	function User_setting()
	{
		parent::__construct();
		$this->load->model('user_setting_model');
		
	}
	
	function index()
	{}
	
	function add_user_setting()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('login_with', 'Login With', 'required');
		if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();
			}else{
				$data["error"] = "";
			}
			if($this->input->post('user_setting_id'))
			{
				$data["user_setting_id"] = $this->input->post('user_setting_id');
				$data["login_with"] = $this->input->post('login_with');
				$data["admin_activation"] = $this->input->post('admin_activation');
				$data["email_varification"] = $this->input->post('email_varification');
				$data["auto_login"] = $this->input->post('auto_login');
				$data["notification_mail"] = $this->input->post('notification_mail');
				$data["welcome_mail"] = $this->input->post('welcome_mail');
				$data["password_change_logout"] = $this->input->post('password_change_logout');
				$data["enable_openid"] = $this->input->post('enable_openid');
				$data["user_switch_language"] = $this->input->post('user_switch_language');
			}else{
				$one_user_setting = $this->user_setting_model->get_one_user_setting();
				$data["user_setting_id"] = $one_user_setting['user_setting_id'];
				$data["login_with"] = $one_user_setting['login_with'];
				$data["admin_activation"] = $one_user_setting['admin_activation'];
				$data["email_varification"] = $one_user_setting['email_varification'];
				$data["auto_login"] = $one_user_setting['auto_login'];
				$data["notification_mail"] = $one_user_setting['notification_mail'];
				$data["welcome_mail"] = $one_user_setting['welcome_mail'];
				$data["password_change_logout"] = $one_user_setting['password_change_logout'];
				$data["enable_openid"] = $one_user_setting['enable_openid'];
				$data["user_switch_language"] = $one_user_setting['user_switch_language'];
			}
			$this->template->write('title', 'Settings', '', TRUE);
			$this->template->write_view('header', 'header', '', TRUE);
			$this->template->write_view('main_content', 'add_user_setting', $data, TRUE);
			$this->template->write_view('footer', 'footer', '', TRUE);
			$this->template->render();
		}else{
			$this->user_setting_model->user_setting_update();
			$data["error"] = "User settings updated successfully";
			$data["user_setting_id"] = $this->input->post('user_setting_id');
			$data["login_with"] = $this->input->post('login_with');
			$data["admin_activation"] = $this->input->post('admin_activation');
			$data["email_varification"] = $this->input->post('email_varification');
			$data["auto_login"] = $this->input->post('auto_login');
			$data["notification_mail"] = $this->input->post('notification_mail');
			$data["welcome_mail"] = $this->input->post('welcome_mail');
			$data["password_change_logout"] = $this->input->post('password_change_logout');
			$data["enable_openid"] = $this->input->post('enable_openid');
			$data["user_switch_language"] = $this->input->post('user_switch_language');
			$this->template->write('title', 'Settings', '', TRUE);
			$this->template->write_view('header', 'header', '', TRUE);
			$this->template->write_view('main_content', 'add_user_setting', $data, TRUE);
			$this->template->write_view('footer', 'footer', '', TRUE);
			$this->template->render();
		}				
	}	
}
?>