<?php
class Twitter_setting extends CI_Controller {
	function Twitter_setting()
	{
		parent::__construct();
		$this->load->model('twitter_setting_model');
		$this->load->model('home_model');
		
	}
	
	function index()
	{
		redirect('twitter_setting/add_twitter_setting');
	}
	
	function add_twitter_setting()
	{
		$check_rights=$this->home_model->get_rights('add_twitter_setting');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('consumer_key', 'Consumer Key', 'required');
		if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();
			}else{
				$data["error"] = "";
			}
			if($this->input->post('twitter_setting_id'))
			{
				$data["twitter_setting_id"] = $this->input->post('twitter_setting_id');
				$data["twitter_enable"] = $this->input->post('twitter_enable');
				$data["twitter_user_name"] = $this->input->post('twitter_user_name');
				$data["consumer_key"] = $this->input->post('consumer_key');
				$data["consumer_secret"] = $this->input->post('consumer_secret');
				$data["tw_oauth_token"] = $this->input->post('tw_oauth_token');
				$data["tw_oauth_token_secret"] = $this->input->post('tw_oauth_token_secret');
				$data["autopost_site"] = $this->input->post('autopost_site');
				$data["autopost_user"] = $this->input->post('autopost_user');
				$data["twitter_url"] = $this->input->post('twitter_url');
				$data["twiter_img"] = $this->input->post('twiter_img');
			}else{
				$one_twitter_setting = $this->twitter_setting_model->get_one_twitter_setting();
				$data["twitter_setting_id"] = $one_twitter_setting['twitter_setting_id'];
				$data["twitter_enable"] = $one_twitter_setting['twitter_enable'];
				$data["twitter_user_name"] = $one_twitter_setting['twitter_user_name'];
				$data["consumer_key"] = $one_twitter_setting['consumer_key'];
				$data["consumer_secret"] = $one_twitter_setting['consumer_secret'];
				$data["tw_oauth_token"] = $one_twitter_setting['tw_oauth_token'];
				$data["tw_oauth_token_secret"] = $one_twitter_setting['tw_oauth_token_secret'];
				$data["autopost_site"] = $one_twitter_setting['autopost_site'];
				$data["autopost_user"] = $one_twitter_setting['autopost_user'];
				$data["twitter_url"] =$one_twitter_setting['twitter_url'];
				$data["twiter_img"] = $one_twitter_setting['twiter_img'];
			}
			
			$data['site_setting'] = $this->home_model->select_site_setting();
			
			$this->template->write('title', 'Settings', '', TRUE);
			$this->template->write_view('header', 'header', $data, TRUE);
			$this->template->write_view('main_content', 'add_twitter_setting', $data, TRUE);
			$this->template->write_view('footer', 'footer', '', TRUE);
			$this->template->render();
		}else{
			$this->twitter_setting_model->twitter_setting_update();
			$data["error"] = "Twitter settings updated successfully";
			$data["twitter_setting_id"] = $this->input->post('twitter_setting_id');
			$data["twitter_enable"] = $this->input->post('twitter_enable');
			$data["twitter_user_name"] = $this->input->post('twitter_user_name');
			$data["consumer_key"] = $this->input->post('consumer_key');
			$data["consumer_secret"] = $this->input->post('consumer_secret');
			$data["tw_oauth_token"] = $this->input->post('tw_oauth_token');
			$data["tw_oauth_token_secret"] = $this->input->post('tw_oauth_token_secret');
			$data["autopost_site"] = $this->input->post('autopost_site');
			$data["autopost_user"] = $this->input->post('autopost_user');
			$data["twitter_url"] = $this->input->post('twitter_url');
			$data["twiter_img"] = $this->input->post('twiter_img');
			
			$data['site_setting'] = $this->home_model->select_site_setting();
			
			$this->template->write('title', 'Settings', '', TRUE);
			$this->template->write_view('header', 'header', $data, TRUE);
			$this->template->write_view('main_content', 'add_twitter_setting', $data, TRUE);
			$this->template->write_view('footer', 'footer', '', TRUE);
			$this->template->render();
		}				
	}	
}
?>