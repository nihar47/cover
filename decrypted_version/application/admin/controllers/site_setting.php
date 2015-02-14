<?php
class Site_setting extends CI_Controller {
	function Site_setting()
	{
		parent::__construct();
		$this->load->model('site_setting_model');
		$this->load->model('transaction_type_model');
		$this->load->model('wallet_setting_model');
		$this->load->model('home_model');
		
	}
	
	function index()
	{
		redirect('site_setting/add_site_setting');	
	}
	
	function add_site_setting()
	{
		$check_rights=$this->home_model->get_rights('add_site_setting');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		
		
		
		$payment_gateway=0; ////===default wallet
				
		$preapproval_enable=0; ////=default inactive
				
				
				
				
				
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('site_name', 'Site Name', 'required');
		
		$this->form_validation->set_rules('donation_amount', 'Minimum donation Amount', 'required');
		
		$this->form_validation->set_rules('project_min_days', 'Minimum days for Project', 'required|numeric');
		$this->form_validation->set_rules('project_max_days', 'Maximum days for Project', 'required|numeric');
		
		$this->form_validation->set_rules('maximum_project_per_year', 'Maximum No. of Project per Year (for one User)', 'required|numeric');
		$this->form_validation->set_rules('maximum_donate_per_project', 'Maximum No. of Donations per Project (for one User)', 'required|numeric');
		
		$this->form_validation->set_rules('donation_amount', 'Minimum donation Amount', 'required|numeric');
		$this->form_validation->set_rules('maximum_donation_amount', 'Maximum donation Amount', 'required|numeric');
		
		
		$this->form_validation->set_rules('minimum_reward_amount', 'Minimum Reward(Perk) Amount', 'required|numeric');
		$this->form_validation->set_rules('maximum_reward_amount', 'Maximum Reward(Perk) Amount', 'required|numeric');
		
		
		$this->form_validation->set_rules('payment_gateway', 'Payment Gateway', 'required');
		$this->form_validation->set_rules('preapproval_enable', 'Preapproval Enable', 'required');
		$this->form_validation->set_rules('auto_target_achive', 'Project Achive Goal Auto Preapproval', 'required');
		
		
		if($this->input->post('preapproval_enable')==0)
		{
			$this->form_validation->set_rules('instant_fees', 'Instant Project Commission', 'required|numeric');
		}
		else
		{
			$this->form_validation->set_rules('enable_funding_option', 'Funding/Donation Type For Project', 'required');
			
			if($this->input->post('enable_funding_option')==0)
			{
				$this->form_validation->set_rules('fixed_fees', 'Fixed Project Commission', 'required|numeric');
			}
			else
			{
				$this->form_validation->set_rules('suc_flexible_fees', 'Flexible Successful Project Commission', 'required|numeric');
				$this->form_validation->set_rules('flexible_fees', 'Flexible Unsuccessful Project Commission', 'required|numeric');
			}
			
		}
		
	
		if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();
			}else{
				$data["error"] = "";
			}
			if($this->input->post('site_setting_id'))
			{
				
				$one_site_setting = $this->site_setting_model->get_one_site_setting();
				$data["site_setting_id"] = $this->input->post('site_setting_id');
				$data["site_name"] = $this->input->post('site_name');
				$data["site_version"] = $one_site_setting['site_version'];
				$data["site_language"] = $this->input->post('site_language');
				$data["currency_symbol_side"] = $this->input->post('currency_symbol_side');
				$data["currency_code"] = $this->input->post('currency_code');
				$data["date_format"] = $this->input->post('date_format');
				$data["auto_target_achive"] = $this->input->post('auto_target_achive');
				
				$data["project_min_days"] = $this->input->post('project_min_days');
				$data["project_max_days"] = $this->input->post('project_max_days');
				$data["time_zone"] = $this->input->post('time_zone');
				$data["enable_funding_option"] = $this->input->post('enable_funding_option');
				
				$data["flexible_fees"] = $this->input->post('flexible_fees');
				$data["suc_flexible_fees"] = $this->input->post('suc_flexible_fees');
				$data["fixed_fees"] = $this->input->post('fixed_fees');
				$data["minimum_goal"] = $this->input->post('minimum_goal');
				$data["maximum_goal"] = $this->input->post('maximum_goal');
				
				$data["donation_amount"] = $this->input->post('donation_amount');
				$data["maximum_donation_amount"] = $this->input->post('maximum_donation_amount');
				
				$data["maximum_project_per_year"] = $this->input->post('maximum_project_per_year');
				$data["maximum_donate_per_project"] = $this->input->post('maximum_donate_per_project');
								
				$data["minimum_reward_amount"] = $this->input->post('minimum_reward_amount');
				$data["maximum_reward_amount"] = $this->input->post('maximum_reward_amount');
				
				$data["enable_twitter_stream"] = $this->input->post('enable_twitter_stream');
				$data["enable_facebook_stream"] = $this->input->post('enable_facebook_stream');
				
				$data["site_tracker"] = $this->input->post('site_tracker');
				//$data["robots"] = $this->input->post('robots');
				//$data["how_it_works_video"] = $this->input->post('how_it_works_video');
				
			
				$data["site_logo"] = $this->input->post('file_up');
				$data["prev_site_logo"] = $this->input->post('prev_site_logo');
				$data["site_logo_hover"] = $this->input->post('file_up2');
				$data["prev_site_logo_hover"] = $this->input->post('prev_site_logo_hover');
				
				
				$data["blog_logo"] = $this->input->post('file_up3');
				$data["prev_blog_logo"] = $this->input->post('prev_blog_logo');
			
				
				
				$data['payment_gateway']=$this->input->post('payment_gateway');
				$data['preapproval_enable']=$this->input->post('preapproval_enable');
				
				$data['auto_target_achive'] = $this->input->post('auto_target_achive');
				
				
				$data['instant_fees']=$this->input->post('instant_fees');
				
				$data['captcha_public_key']=$this->input->post('captcha_public_key');
				$data['captcha_private_key']=$this->input->post('captcha_private_key');
				
				
				
			}else{
				$one_site_setting = $this->site_setting_model->get_one_site_setting();
				
				
			
				
				
				///////========wallet gateway
				$one_wallet_setting = $this->wallet_setting_model->get_one_wallet_setting();				
				$wallet_enable = $one_wallet_setting['wallet_enable'];	
				$wallet_preapproval_enable = $one_wallet_setting['wallet_enable'];	
							
				if($wallet_enable==1)
				{
					$payment_gateway=0;
					
					if($wallet_preapproval_enable==1)
					{
						$preapproval_enable=1;
					}
					
				}
				
				
				///////========paypal adaptive gateway
				$one_paypal = $this->transaction_type_model->get_one_paypal(1);			
				$paypal_adptive_status = $one_paypal['gateway_status'];			
				$paypal_preapproval_enable = $one_paypal['preapproval'];	
				
				if($paypal_adptive_status==1)
				{
					$payment_gateway=1;
					
					if($paypal_preapproval_enable==1)
					{
						$preapproval_enable=1;
					}
				}
				
				
				
				///////========amazon gateway
				$one_amazon = $this->transaction_type_model->get_one_amazon(1);
				$amazon_status = $one_amazon['gateway_status'];
				$amazon_preapproval_enable = $one_amazon['preapproval'];
				
				if($amazon_status==1)
				{
					$payment_gateway=2;
					
					if($amazon_preapproval_enable==1)
					{
						$preapproval_enable=1;
					}
				}
				
				
				
				///////========Paypal Credi card gateway
				$credit_card_detail = $this->transaction_type_model->get_paypal_credit_card_by_id(1);
				$credit_card_status = $credit_card_detail['credit_card_gateway_status'];
				$credit_card_preapproval_enable = $credit_card_detail['credit_card_preapproval'];
				
				if($credit_card_status==1)
				{
					$payment_gateway=3;
					
					if($credit_card_preapproval_enable==1)
					{
						$preapproval_enable=1;
					}
				}
				
				
				
				
				$data['payment_gateway']=$payment_gateway;
				$data['preapproval_enable']=$preapproval_enable;
				
				$data['auto_target_achive'] = $one_site_setting['auto_target_achive'];
				
				
				$data['instant_fees']=$one_site_setting['instant_fees'];
				
				$data["site_setting_id"] = $one_site_setting['site_setting_id'];
				$data["site_name"] = $one_site_setting['site_name'];
				$data["site_version"] = $one_site_setting['site_version'];
				$data["site_language"] = $one_site_setting['site_language'];
				$data["currency_symbol_side"] = $one_site_setting['currency_symbol_side'];
				$data["currency_code"] = $one_site_setting['currency_code'];
				$data["date_format"] = $one_site_setting['date_format'];
				$data["donation_amount"] = $one_site_setting['donation_amount'];
				
				$data["maximum_donation_amount"] = $one_site_setting['maximum_donation_amount'];
				
				$data["maximum_project_per_year"] = $one_site_setting['maximum_project_per_year'];
				$data["maximum_donate_per_project"] = $one_site_setting['maximum_donate_per_project'];
			
				$data["minimum_reward_amount"] = $one_site_setting['minimum_reward_amount'];
				$data["maximum_reward_amount"] = $one_site_setting['maximum_reward_amount'];
				
				
				$data["project_min_days"] = $one_site_setting['project_min_days'];
				$data["project_max_days"] = $one_site_setting['project_max_days'];
				$data["time_zone"] = $one_site_setting['time_zone'];
				$data["enable_funding_option"] = $one_site_setting['enable_funding_option'];
				
				$data["flexible_fees"] = $one_site_setting['flexible_fees'];
				$data["suc_flexible_fees"] = $one_site_setting['suc_flexible_fees'];
				$data["fixed_fees"] = $one_site_setting['fixed_fees'];
				$data["minimum_goal"] = $one_site_setting['minimum_goal'];
				$data["maximum_goal"] = $one_site_setting['maximum_goal'];
				$data["site_tracker"] = $one_site_setting['site_tracker'];
				$data["auto_target_achive"] = $one_site_setting['auto_target_achive'];
				//$data["robots"] = $one_site_setting['robots'];
				//$data["how_it_works_video"] = $one_site_setting['how_it_works_video'];
				$data['captcha_public_key']=$one_site_setting['captcha_public_key'];
				$data['captcha_private_key']=$one_site_setting['captcha_private_key'];
				
			
				$data["enable_twitter_stream"] = $one_site_setting['enable_twitter_stream'];
				$data["enable_facebook_stream"] = $one_site_setting['enable_facebook_stream'];
				
				
				$data["site_logo"] = '';
				$data["prev_site_logo"] = $one_site_setting['site_logo'];
				$data["site_logo_hover"] ='';
				$data["prev_site_logo_hover"] = $one_site_setting['site_logo_hover'];
				$data["prev_blog_logo"] = $one_site_setting['blog_logo'];
				
				
				
			}
			$data['languages'] = $this->site_setting_model->get_languages();
			$data['time_zone_list'] = $this->site_setting_model->get_time_zone();
			$data['currency'] = $this->site_setting_model->get_currency();
			
			$data['site_setting'] = $this->home_model->select_site_setting();
			
			$this->template->write('title', 'Site Settings', '', TRUE);
			$this->template->write_view('header', 'header', $data, TRUE);
			$this->template->write_view('main_content', 'add_site_setting', $data, TRUE);
			$this->template->write_view('footer', 'footer', '', TRUE);
			$this->template->render();
		}else{
			$this->site_setting_model->site_setting_update();
			
			$one_site_setting = $this->site_setting_model->get_one_site_setting();
			
			
			
			///////========wallet gateway
			$one_wallet_setting = $this->wallet_setting_model->get_one_wallet_setting();				
			$wallet_enable = $one_wallet_setting['wallet_enable'];	
			$wallet_preapproval_enable = $one_wallet_setting['wallet_enable'];	
						
			if($wallet_enable==1)
			{
				$payment_gateway=0;
				
				if($wallet_preapproval_enable==1)
				{
					$preapproval_enable=1;
				}
				
			}
			
			
			///////========paypal adaptive gateway
			$one_paypal = $this->transaction_type_model->get_one_paypal(1);			
			$paypal_adptive_status = $one_paypal['gateway_status'];			
			$paypal_preapproval_enable = $one_paypal['preapproval'];	
			
			if($paypal_adptive_status==1)
			{
				$payment_gateway=1;
				
				if($paypal_preapproval_enable==1)
				{
					$preapproval_enable=1;
				}
			}
			
			
			
			///////========amazon gateway
			$one_amazon = $this->transaction_type_model->get_one_amazon(1);
			$amazon_status = $one_amazon['gateway_status'];
			$amazon_preapproval_enable = $one_amazon['preapproval'];
			
			if($amazon_status==1)
			{
				$payment_gateway=2;
				
				if($amazon_preapproval_enable==1)
				{
					$preapproval_enable=1;
				}
			}
				
				
			
			///////========Paypal Credi card gateway
			$credit_card_detail = $this->transaction_type_model->get_paypal_credit_card_by_id(1);
			$credit_card_status = $credit_card_detail['credit_card_gateway_status'];
			$credit_card_preapproval_enable = $credit_card_detail['credit_card_preapproval'];
			
			if($credit_card_status==1)
			{
				$payment_gateway=3;
				
				if($credit_card_preapproval_enable==1)
				{
					$preapproval_enable=1;
				}
			}
				
					
				
			$data['payment_gateway']=$payment_gateway;
			$data['preapproval_enable']=$preapproval_enable;
			
			$data['auto_target_achive'] = $one_site_setting['auto_target_achive'];
			
			
			$data['instant_fees']=$one_site_setting['instant_fees'];
			
			
			$data["error"] = "success";
			$data["site_setting_id"] = $this->input->post('site_setting_id');
			$data["site_name"] = $this->input->post('site_name');
			$data["site_version"] = $one_site_setting['site_version'];
			$data["site_language"] = $this->input->post('site_language');
			$data["currency_symbol_side"] = $this->input->post('currency_symbol_side');
			$data["donation_amount"] = $this->input->post('donation_amount');
			
			$data["maximum_donation_amount"] = $this->input->post('maximum_donation_amount');
			$data["maximum_project_per_year"] = $this->input->post('maximum_project_per_year');
			$data["maximum_donate_per_project"] = $this->input->post('maximum_donate_per_project');
		
			$data["currency_code"] = $this->input->post('currency_code');
			$data["date_format"] = $this->input->post('date_format');
			$data["auto_target_achive"] = $this->input->post('auto_target_achive');
			$data["project_min_days"] = $this->input->post('project_min_days');
			$data["project_max_days"] = $this->input->post('project_max_days');
			$data["time_zone"] = $this->input->post('time_zone');
			$data["enable_funding_option"] = $this->input->post('enable_funding_option');
			
			$data["flexible_fees"] = $this->input->post('flexible_fees');
			$data["suc_flexible_fees"] = $this->input->post('suc_flexible_fees');
			$data["fixed_fees"] = $this->input->post('fixed_fees');
			$data["minimum_goal"] = $this->input->post('minimum_goal');
			$data["maximum_goal"] = $this->input->post('maximum_goal');
			
			$data["minimum_reward_amount"] = $this->input->post('minimum_reward_amount');
			$data["maximum_reward_amount"] = $this->input->post('maximum_reward_amount');
				
			$data["enable_twitter_stream"] = $this->input->post('enable_twitter_stream');
			$data["enable_facebook_stream"] = $this->input->post('enable_facebook_stream');
				
				
			$data["site_tracker"] = $this->input->post('site_tracker');
			//$data["robots"] = $this->input->post('robots');
			//$data["how_it_works_video"] = $this->input->post('how_it_works_video');
			$data['captcha_public_key']=$this->input->post('captcha_public_key');
			$data['captcha_private_key']=$this->input->post('captcha_private_key');
				
			
			$data["site_logo"] = '';
			$data["prev_site_logo"] = $one_site_setting['site_logo'];
			$data["site_logo_hover"] ='';
			$data["prev_site_logo_hover"] = $one_site_setting['site_logo_hover'];
			$data["prev_blog_logo"] = $one_site_setting['blog_logo'];
				
			$data['site_setting'] = $this->home_model->select_site_setting();
			
			$data['languages'] = $this->site_setting_model->get_languages();
			$data['time_zone_list'] = $this->site_setting_model->get_time_zone();
			$data['currency'] = $this->site_setting_model->get_currency();
			
			$this->template->write('title', 'Site Settings', '', TRUE);
			$this->template->write_view('header', 'header', $data, TRUE);
			$this->template->write_view('main_content', 'add_site_setting', $data, TRUE);
			$this->template->write_view('footer', 'footer', '', TRUE);
			$this->template->render();
		}				
	}
	
	function add_filter_setting()
	{
		$check_rights=$this->home_model->get_rights('add_filter_setting');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('ending_soon', 'Ending Soon', 'required|is_natural_no_zero');
		$this->form_validation->set_rules('small_project', 'Small Project', 'required|is_natural_no_zero');
		$this->form_validation->set_rules('popular', 'Popular', 'required|numeric');
		$this->form_validation->set_rules('successful', 'Successful', 'required|numeric');
		
		
		if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();
			}else{
				$data["error"] = "";
			}
			if($this->input->post('site_setting_id'))
			{
				
				$one_site_setting = $this->site_setting_model->get_one_site_setting();
				$data["site_setting_id"] = $this->input->post('site_setting_id');
				$data["ending_soon"] = $this->input->post('ending_soon');
				$data["small_project"] = $this->input->post('small_project');
				$data["popular"] = $this->input->post('popular');
				$data["successful"] = $this->input->post('successful');
				
				
				
				
			}else{
				$one_site_setting = $this->site_setting_model->get_one_site_setting();
				$data["site_setting_id"] = $one_site_setting['site_setting_id'];
				
				$data["ending_soon"] = $one_site_setting['ending_soon'];
				$data["small_project"] = $one_site_setting['small_project'];
				$data["popular"] = $one_site_setting['popular'];
				$data["successful"] = $one_site_setting['successful'];
				
				
				
			}
			$data['languages'] = $this->site_setting_model->get_languages();
			
			$data['currency'] = $this->site_setting_model->get_currency();
			
			$data['site_setting'] = $this->home_model->select_site_setting();
			
			$this->template->write('title', 'Filter Settings', '', TRUE);
			$this->template->write_view('header', 'header', $data, TRUE);
			$this->template->write_view('main_content', 'add_filter_setting', $data, TRUE);
			$this->template->write_view('footer', 'footer', '', TRUE);
			$this->template->render();
		}else{
		
			$this->site_setting_model->filter_setting_update();
			
			$one_site_setting = $this->site_setting_model->get_one_site_setting();
			
			
			$data["error"] = "Filter settings updated successfully";
			$data["site_setting_id"] = $this->input->post('site_setting_id');
			
			$data["ending_soon"] = $this->input->post('ending_soon');
			$data["small_project"] = $this->input->post('small_project');
			$data["popular"] = $this->input->post('popular');
			$data["successful"] = $this->input->post('successful');		
			
			
				
			$data['site_setting'] = $this->home_model->select_site_setting();
			
			$data['languages'] = $this->site_setting_model->get_languages();
			$data['currency'] = $this->site_setting_model->get_currency();
			
			$this->template->write('title', 'Filter Settings', '', TRUE);
			$this->template->write_view('header', 'header', $data, TRUE);
			$this->template->write_view('main_content', 'add_filter_setting', $data, TRUE);
			$this->template->write_view('footer', 'footer', '', TRUE);
			$this->template->render();
		}				
	}
	
	
	function add_image_setting(){
	
		
		$check_rights=$this->home_model->get_rights('add_site_setting');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('p_width', 'Project Image Width', 'required');
		$this->form_validation->set_rules('p_height', 'Project Image Height', 'required');
		
		$this->form_validation->set_rules('u_width', 'User Image Width', 'required');
		$this->form_validation->set_rules('u_height', 'User Image Height', 'required');
		
		$this->form_validation->set_rules('g_width', 'Project Gallery Image Width', 'required');
		$this->form_validation->set_rules('g_height', 'Project Gallery Image Height', 'required');
		
		$err = '';
		
		if($_POST)
		{
			if($this->input->post('p_width') <= 0){
				$err.='<p>Project Thumbnail Width should be greator than Zero.</p>';
			}
			if($this->input->post('p_height') <= 0){
				$err.='<p>Project Thumbnail Height should be greator than Zero.</p>';
			}
			
			if($this->input->post('u_width') <= 0){
				$err.='<p>User Thumbnail Width should be greator than Zero.</p>';
			}
			if($this->input->post('u_height') <= 0){
				$err.='<p>User Thumbnail Height should be greator than Zero.</p>';
			}
			
			if($this->input->post('g_width') <= 0){
				$err.='<p>Project Gallery Thumbnail Width should be greator than Zero.</p>';
			}
			if($this->input->post('g_height') <= 0){
				$err.='<p>Project Gallery Thumbnail Height should be greator than Zero.</p>';
			}
		}
		
		if($this->form_validation->run() == FALSE || $err!=''){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();
			}else{
				$data["error"] = "";
			}
			if($err!=''){
				$data["error"] .= $err;
			}
			if($this->input->post('image_setting_id'))
			{
				
				$data["p_width"] = $this->input->post('p_width');
				$data["p_height"] = $this->input->post('p_height');
				$data["p_ratio"] = $this->input->post('p_ratio');
				
				$data["u_width"] = $this->input->post('u_width');
				$data["u_height"] = $this->input->post('u_height');
				$data["u_ratio"] = $this->input->post('u_ratio');
				
				$data["g_width"] = $this->input->post('g_width');
				$data["g_height"] = $this->input->post('g_height');
				$data["g_ratio"] = $this->input->post('g_ratio');
				
				$data["image_setting_id"] = $this->input->post('image_setting_id');
				
				
			}else{
				$one_img_setting = $this->site_setting_model->get_one_img_setting();
				
				$data["p_width"] = $one_img_setting['p_width'];
				$data["p_height"] = $one_img_setting['p_height'];
				$data["p_ratio"] = $one_img_setting['p_ratio'];
				
				$data["u_width"] = $one_img_setting['u_width'];
				$data["u_height"] = $one_img_setting['u_height'];
				$data["u_ratio"] = $one_img_setting['u_ratio'];
				
				$data["g_width"] = $one_img_setting['g_width'];
				$data["g_height"] = $one_img_setting['g_height'];
				$data["g_ratio"] = $one_img_setting['g_ratio'];
				
				$data["image_setting_id"] = $one_img_setting['image_setting_id'];
				
				
			}
			$data['languages'] = $this->site_setting_model->get_languages();
			
			$data['currency'] = $this->site_setting_model->get_currency();
			
			$data['site_setting'] = $this->home_model->select_site_setting();
			
			$this->template->write('title', 'Settings', '', TRUE);
			$this->template->write_view('header', 'header', $data, TRUE);
			$this->template->write_view('main_content', 'add_image_setting', $data, TRUE);
			$this->template->write_view('footer', 'footer', '', TRUE);
			$this->template->render();
		}else{
			$this->site_setting_model->img_setting_update();
			
			$one_site_setting = $this->site_setting_model->get_one_site_setting();
			
			
				$data["error"] = "Image size settings updated successfully";
				
				$data["p_width"] = $this->input->post('p_width');
				$data["p_height"] = $this->input->post('p_height');
				$data["p_ratio"] = $this->input->post('p_ratio');
				
				$data["u_width"] = $this->input->post('u_width');
				$data["u_height"] = $this->input->post('u_height');
				$data["u_ratio"] = $this->input->post('u_ratio');
				
				$data["g_width"] = $this->input->post('g_width');
				$data["g_height"] = $this->input->post('g_height');
				$data["g_ratio"] = $this->input->post('g_ratio');
				
				$data["image_setting_id"] = $this->input->post('image_setting_id');
				
			$data['site_setting'] = $this->home_model->select_site_setting();
			
			$data['languages'] = $this->site_setting_model->get_languages();
			$data['currency'] = $this->site_setting_model->get_currency();
			
			$this->template->write('title', 'Settings', '', TRUE);
			$this->template->write_view('header', 'header', $data, TRUE);
			$this->template->write_view('main_content', 'add_image_setting', $data, TRUE);
			$this->template->write_view('footer', 'footer', '', TRUE);
			$this->template->render();
		}				
	
	
	}
	
	
	function add_amount_formatting(){
	
	
		$check_rights=$this->home_model->get_rights('add_site_setting');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('currency_code', 'Currency Code', 'required');
		
		$this->form_validation->set_rules('currency_symbol_side', 'Where to display Currency Symbol?', 'required');
		
		$this->form_validation->set_rules('decimal_points', 'Decimal Points After Amount', 'required');
		
		if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();
			}else{
				$data["error"] = "";
			}
			if($this->input->post('site_setting_id'))
			{
				
				$one_site_setting = $this->site_setting_model->get_one_site_setting();
				$data["site_setting_id"] = $this->input->post('site_setting_id');
				
				$data["currency_code"] = $this->input->post('currency_code');
				$data["currency_symbol_side"] = $one_site_setting['currency_symbol_side'];
				$data["decimal_points"] = $this->input->post('decimal_points');
				
				
				
			}else{
				$one_site_setting = $this->site_setting_model->get_one_site_setting();
				$data["site_setting_id"] = $one_site_setting['site_setting_id'];
				
				$data["currency_code"] = $one_site_setting['currency_code'];
				$data["currency_symbol_side"] = $one_site_setting['currency_symbol_side'];
				$data["decimal_points"] = $one_site_setting['decimal_points'];
				
			}
			$data['languages'] = $this->site_setting_model->get_languages();
			$data['time_zone_list'] = $this->site_setting_model->get_time_zone();
			$data['currency'] = $this->site_setting_model->get_currency();
			
			$data['site_setting'] = $this->home_model->select_site_setting();
			
			$this->template->write('title', 'Amount Settings', '', TRUE);
			$this->template->write_view('header', 'header', $data, TRUE);
			$this->template->write_view('main_content', 'add_amount_formatting', $data, TRUE);
			$this->template->write_view('footer', 'footer', '', TRUE);
			$this->template->render();
		}else{
			$this->site_setting_model->amount_setting_update();
			
			$one_site_setting = $this->site_setting_model->get_one_site_setting();
			
			
			$data["error"] = "Amount settings updated successfully";
			$data["site_setting_id"] = $this->input->post('site_setting_id');
			
			$data["currency_code"] = $this->input->post('currency_code');
			$data["currency_symbol_side"] = $one_site_setting['currency_symbol_side'];
			$data["decimal_points"] = $this->input->post('decimal_points');
			
			
				
			$data['site_setting'] = $this->home_model->select_site_setting();
			
			$data['languages'] = $this->site_setting_model->get_languages();
			$data['time_zone_list'] = $this->site_setting_model->get_time_zone();
			$data['currency'] = $this->site_setting_model->get_currency();
			
			$this->template->write('title', 'Amount Settings', '', TRUE);
			$this->template->write_view('header', 'header', $data, TRUE);
			$this->template->write_view('main_content', 'add_amount_formatting', $data, TRUE);
			$this->template->write_view('footer', 'footer', '', TRUE);
			$this->template->render();
		}				
	
	
	}
	
}
?>