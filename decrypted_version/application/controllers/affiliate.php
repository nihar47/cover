<?php
class Affiliate extends ROCKERS_Controller {

	function Affiliate()
	{
		parent::__construct();		
		$this->load->model('affiliate_model');
		$this->load->model('home_model');		
		$this->load->helper('cookie');
		$this->load->library('securimage');
	}
	
	function index($msg='')
	{
		$affiliate_setting=affiliate_setting();
					
		$data['affiliate_setting']=$affiliate_setting;
		
		$data['select']='stats';	
		
		$data['msg']=$msg;
					
		if($affiliate_setting->affiliate_enable==0) { 
			redirect('home/');
		}
		
		$affiliate_request = $this->affiliate_model->check_affiliate_request();
		
		
		if(!$affiliate_request){
			redirect('affiliate/request');
		}		
		
		else
		{
			$data['affiliate_request']=$affiliate_request;
			
			if($this->session->userdata('user_id')=='' || $this->session->userdata('user_id')==0)
			{
				redirect('home/login');
			}
			else
			{
				
				$data['user_info'] = get_user_detail($this->session->userdata('user_id'));
				
				
				if($affiliate_request->approved!=1)
				{
					$data['select']='request';					
				}
				
				
				
		$data['affiliate_pending_today'] = $this->affiliate_model->get_affiliate_pending_today();
		$data['affiliate_pending_week'] = $this->affiliate_model->get_affiliate_pending_week();
		$data['affiliate_pending_month'] = $this->affiliate_model->get_affiliate_pending_month();
		$data['affiliate_pending_total'] = $this->affiliate_model->get_affiliate_pending_total();
		
		$data['affiliate_cancel_today'] = $this->affiliate_model->get_affiliate_cancel_today();
		$data['affiliate_cancel_week'] = $this->affiliate_model->get_affiliate_cancel_week();
		$data['affiliate_cancel_month'] = $this->affiliate_model->get_affiliate_cancel_month();
		$data['affiliate_cancel_total'] = $this->affiliate_model->get_affiliate_cancel_total();
		
		$data['affiliate_completed_today'] = $this->affiliate_model->get_affiliate_completed_today();
		$data['affiliate_completed_week'] = $this->affiliate_model->get_affiliate_completed_week();
		$data['affiliate_completed_month'] = $this->affiliate_model->get_affiliate_completed_month();
		$data['affiliate_completed_total'] = $this->affiliate_model->get_affiliate_completed_total();
		
		$data['affiliate_pipeline_today'] = $this->affiliate_model->get_affiliate_pipeline_today();
		$data['affiliate_pipeline_week'] = $this->affiliate_model->get_affiliate_pipeline_week();
		$data['affiliate_pipeline_month'] = $this->affiliate_model->get_affiliate_pipeline_month();
		$data['affiliate_pipeline_total'] = $this->affiliate_model->get_affiliate_pipeline_total();
		
		
	
		
	$data['affiliate_withdraw_request_pending_today'] = $this->affiliate_model->get_total_affiliate_withdraw_request_pending_today();
	$data['affiliate_withdraw_request_pending_week'] = $this->affiliate_model->get_total_affiliate_withdraw_request_pending_week();
	$data['affiliate_withdraw_request_pending_month'] = $this->affiliate_model->get_total_affiliate_withdraw_request_pending_month();
	$data['affiliate_withdraw_request_pending_total'] = $this->affiliate_model->get_total_affiliate_withdraw_request_pending_total();	
	
	$data['affiliate_withdraw_request_approved_today'] = $this->affiliate_model->get_total_affiliate_withdraw_request_approved_today();
	$data['affiliate_withdraw_request_approved_week'] = $this->affiliate_model->get_total_affiliate_withdraw_request_approved_week();
	$data['affiliate_withdraw_request_approved_month'] = $this->affiliate_model->get_total_affiliate_withdraw_request_approved_month();
	$data['affiliate_withdraw_request_approved_total'] = $this->affiliate_model->get_total_affiliate_withdraw_request_approved_total();	
		
	
	$data['affiliate_withdraw_request_reject_today'] = $this->affiliate_model->get_total_affiliate_withdraw_request_reject_today();
	$data['affiliate_withdraw_request_reject_week'] = $this->affiliate_model->get_total_affiliate_withdraw_request_reject_week();
	$data['affiliate_withdraw_request_reject_month'] = $this->affiliate_model->get_total_affiliate_withdraw_request_reject_month();
	$data['affiliate_withdraw_request_reject_total'] = $this->affiliate_model->get_total_affiliate_withdraw_request_reject_total();
	
	$data['affiliate_withdraw_request_success_today'] = $this->affiliate_model->get_total_affiliate_withdraw_request_success_today();
	$data['affiliate_withdraw_request_success_week'] = $this->affiliate_model->get_total_affiliate_withdraw_request_success_week();
	$data['affiliate_withdraw_request_success_month'] = $this->affiliate_model->get_total_affiliate_withdraw_request_success_month();
	$data['affiliate_withdraw_request_success_total'] = $this->affiliate_model->get_total_affiliate_withdraw_request_success_total();
		
	$data['affiliate_withdraw_request_fail_today'] = $this->affiliate_model->get_total_affiliate_withdraw_request_fail_today();
	$data['affiliate_withdraw_request_fail_week'] = $this->affiliate_model->get_total_affiliate_withdraw_request_fail_week();
	$data['affiliate_withdraw_request_fail_month'] = $this->affiliate_model->get_total_affiliate_withdraw_request_fail_month();
	$data['affiliate_withdraw_request_fail_total'] = $this->affiliate_model->get_total_affiliate_withdraw_request_fail_total();
	
	
	
				$data['header_menu']= dynamic_menu(0);
				$data['footer_menu']= dynamic_menu_footer(0);
				$data['right_menu']= dynamic_menu_right(0);
				$meta = meta_setting();
				$data['site_setting'] = site_setting();				
				
				$this->template->write('meta_title','Stats - '. $meta['title'], TRUE);
				$this->template->write('meta_description',$meta['meta_description'], TRUE);
				$this->template->write('meta_keyword', $meta['meta_keyword'], TRUE);
				$this->template->write_view('header', 'default/header_login', $data, TRUE);
				$this->template->write_view('main_content', 'default/affiliate/stats', $data, TRUE);
				$this->template->write_view('footer', 'default/footer', '', TRUE);
				$this->template->render();
			}	
		
		}	
		
	}
	
	function request()
	{
		
		$affiliate_setting=affiliate_setting();
					
		$data['affiliate_setting']=$affiliate_setting;
					
		if($affiliate_setting->affiliate_enable==0) { 
			redirect('home/');
		}
		
		$affiliate_request = $this->affiliate_model->check_affiliate_request();
		if($affiliate_request){
			redirect('affiliate');
		}	
		
		$data['select']='request';	
		
		$data['error']='';
		$data['msg']='';
		
		$data['header_menu']= dynamic_menu(0);
		$data['footer_menu']= dynamic_menu_footer(0);
		$data['right_menu']= dynamic_menu_right(0);
		$meta = meta_setting();
		$data['site_setting'] = site_setting();
		
		
		if($this->session->userdata('user_id')=='' || $this->session->userdata('user_id')==0)
		{
			
			if($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1)
			{
				$this->template->set_master_template('iphone/template.php');
				$this->template->write_view('main_content', 'iphone/affiliate/affiliate_home', $data, TRUE);
				$this->template->render();
			}
			elseif(($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1)
			{
				$this->template->set_master_template('mobile/template.php');
				$this->template->write_view('main_content', 'mobile/affiliate/affiliate_home', $data, TRUE);
				$this->template->render();
			}
			else
			{
				$this->template->write('meta_title','Affiliate Request - '. $meta['title'], TRUE);
				$this->template->write('meta_description',$meta['meta_description'], TRUE);
				$this->template->write('meta_keyword', $meta['meta_keyword'], TRUE);
				
				$this->template->write_view('header', 'default/header', $data, TRUE);
			
				$this->template->write_view('main_content', 'default/affiliate/affiliate_home', $data, TRUE);
				$this->template->write_view('sidebar', 'default/sidebar', $data, TRUE);
				$this->template->write_view('footer', 'default/footer', $data, TRUE);
				$this->template->render();
		
		
			}
			
			
			
		}
		
		else
		{
			
			$this->load->library('form_validation');
			$this->form_validation->set_rules('site_category', SITE_CATEGORY , 'required');
			$this->form_validation->set_rules('site_name', SITE_NAME , 'required|alpha_space');
			$this->form_validation->set_rules('site_url', SITE_URL, 'required|valid_url');
			$this->form_validation->set_rules('why_affiliate',WHY_DO_YOU_WANT_AN_AFFILIATE, 'required');
			
			
			if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();
			}else{
				$data["error"] = "";
			}
			$data["affiliate_request_id"] = $this->input->post('affiliate_request_id');
			$data["site_category"] = $this->input->post('site_category');
			$data["site_name"] = $this->input->post('site_name');
			$data["site_description"] = $this->input->post('site_description');
			$data["site_url"] = $this->input->post('site_url');
			$data["why_affiliate"] = $this->input->post('why_affiliate');
			$data["web_site_marketing"] = $this->input->post('web_site_marketing');
			$data["search_engine_marketing"] = $this->input->post('search_engine_marketing');
			$data["email_marketing"] = $this->input->post('email_marketing');
			$data["special_promotional_method"] = $this->input->post('special_promotional_method');
			$data["special_promotional_description"] = $this->input->post('special_promotional_description');
		}else{
			$this->affiliate_model->request_register();
			
			redirect('affiliate/index/success');
			
			$data["affiliate_request_id"] = '';
			$data["site_category"] = '';
			$data["site_name"] = '';
			$data["site_description"] = '';
			$data["site_url"] = '';
			$data["why_affiliate"] = '';
			$data["web_site_marketing"] = '';
			$data["search_engine_marketing"] = '';
			$data["email_marketing"] = '';
			$data["special_promotional_method"] = '';
			$data["special_promotional_description"] = '';
			$data["error"] = "";
			$data['msg']='success';
			
		}
			$data['categories'] = $this->home_model->get_category();
			
			
			
			if($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1)
			{
				$this->template->set_master_template('iphone/template.php');
				$this->template->write_view('main_content', 'iphone/affiliate/affiliate_request', $data, TRUE);
				$this->template->render();
			}
			elseif(($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1)
			{
				$this->template->set_master_template('mobile/template.php');
				$this->template->write_view('main_content', 'mobile/affiliate/affiliate_request', $data, TRUE);
				$this->template->render();
			}
			else
			{
				$this->template->write('meta_title','Affiliate Request - '. $meta['title'], TRUE);
				$this->template->write('meta_description',$meta['meta_description'], TRUE);
				$this->template->write('meta_keyword', $meta['meta_keyword'], TRUE);
				$this->template->write_view('header', 'default/header_login', $data, TRUE);
				$this->template->write_view('main_content', 'default/affiliate/affiliate_request', $data, TRUE);
				$this->template->write_view('footer', 'default/footer', '', TRUE);
				$this->template->render();	
				
			}
			
		}
		
		
	
		
	}
		
	function commission($offset=0,$msg='')
	{
		$affiliate_setting=affiliate_setting();
					
		$data['affiliate_setting']=$affiliate_setting;
					
		if($affiliate_setting->affiliate_enable==0) { 
			redirect('home/');
		}
		if($this->session->userdata('user_id')==''){
			redirect('home/login');
		}
		$affiliate_request = $this->affiliate_model->check_affiliate_request();
		if(!$affiliate_request){
			redirect('affiliate/request');
		}
		
		
		
		
		$this->load->library('pagination');
		$limit = '10';
		$config['uri_segment']='3';
		$config['base_url'] = site_url('affiliate/commission/');
		$config['total_rows'] = $this->affiliate_model->get_total_commission_history_count();
		$config['per_page'] = $limit;
				
		$this->pagination->initialize($config);		
		
		$data['page_link'] = $this->pagination->create_links();
		$data['commission'] = $this->affiliate_model->get_commission_history($offset, $limit);
		
		
		
		
		
		
		
		
		$data['select']='commission_history';	
		
		$data["msg"] = '';
		$data['header_menu']= dynamic_menu(0);
		$data['footer_menu']= dynamic_menu_footer(0);
		$data['right_menu']= dynamic_menu_right(0);
		$meta = meta_setting();
		$data['site_setting'] = site_setting();
		
		$this->template->write('meta_title','Commission History - '. $meta['title'], TRUE);
		$this->template->write('meta_description',$meta['meta_description'], TRUE);
		$this->template->write('meta_keyword', $meta['meta_keyword'], TRUE);
		
		if($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1)
		{
			$this->template->set_master_template('iphone/template.php');
			$this->template->write_view('main_content', 'iphone/affiliate/commission_history', $data, TRUE);
			$this->template->render();
		}
		elseif(($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1)
		{
			$this->template->set_master_template('mobile/template.php');
			$this->template->write_view('main_content', 'mobile/affiliate/commission_history', $data, TRUE);
			$this->template->render();
		}
		else
		{
			$this->template->write_view('header', 'default/header_login', $data, TRUE);
			$this->template->write_view('main_content', 'default/affiliate/commission_history', $data, TRUE);
			$this->template->write_view('footer', 'default/footer', $data, TRUE);
			$this->template->render();
		}
		
		
	}
	
	function withdrawal_requests($filter='all',$offset=0,$msg='')
	{
		$affiliate_setting=affiliate_setting();
					
		$data['affiliate_setting']=$affiliate_setting;
					
		if($affiliate_setting->affiliate_enable==0) { 
			redirect('home/');
		}
		if($this->session->userdata('user_id')==''){
			redirect('home/login');
		}
		$affiliate_request = $this->affiliate_model->check_affiliate_request();
		if(!$affiliate_request){
			redirect('affiliate/request');
		}
		
		
		if($filter=='')
		{
			redirect('affiliate/withdrawal_requests/all');	
		}
		
		$filter_array=array('approve','success','reject','fail','pending','all');
		
		if(!in_array($filter,$filter_array))
		{
			redirect('affiliate/withdrawal_requests/all');				
		}
		
		$this->load->library('pagination');
		$limit = '1';
		$config['uri_segment']='4';
		$config['base_url'] = site_url('affiliate/withdrawal_requests/'.$filter);
		$config['total_rows'] = $this->affiliate_model->get_total_withdraw_request_count($filter);
		$config['per_page'] = $limit;
				
		$this->pagination->initialize($config);		
		
		$data['page_link'] = $this->pagination->create_links();
		$data['withdrawal_request'] = $this->affiliate_model->get_withdraw_request($filter,$offset, $limit);
		
		
		$data['filter']=$filter;
		
		$data['select']='withdrawal_requests';	
		
		$data["msg"] = $msg;
		$data['header_menu']= dynamic_menu(0);
		$data['footer_menu']= dynamic_menu_footer(0);
		$data['right_menu']= dynamic_menu_right(0);
		$meta = meta_setting();
		$data['site_setting'] = site_setting();
		
		$this->template->write('meta_title','Withdrawal Request - '. $meta['title'], TRUE);
		$this->template->write('meta_description',$meta['meta_description'], TRUE);
		$this->template->write('meta_keyword', $meta['meta_keyword'], TRUE);
		
		if($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1)
		{
			$this->template->set_master_template('iphone/template.php');
			$this->template->write_view('main_content', 'iphone/affiliate/withdraw_request', $data, TRUE);
			$this->template->render();
		}
		elseif(($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1)
		{
			$this->template->set_master_template('mobile/template.php');
			$this->template->write_view('main_content', 'mobile/affiliate/withdraw_request', $data, TRUE);
			$this->template->render();
		}
		else
		{
			$this->template->write_view('header', 'default/header_login', $data, TRUE);
			$this->template->write_view('main_content', 'default/affiliate/withdraw_request', $data, TRUE);
			$this->template->write_view('footer', 'default/footer', $data, TRUE);
			$this->template->render();
		}
		
		
	}
	
	function add_request()
	{
		$affiliate_setting=affiliate_setting();
					
		$data['affiliate_setting']=$affiliate_setting;
					
		if($affiliate_setting->affiliate_enable==0) { 
			redirect('home/');
		}
		if($this->session->userdata('user_id')==''){
			redirect('home/login');
		}
		
		$allow_withdraw_request = check_user_enable_for_affiliate_withdraw_request($this->session->userdata('user_id'));
		
		
		$data['allow_withdraw_request']=$allow_withdraw_request;
		
		
		$total_earn_amount=total_earn_affiliate_user($this->session->userdata('user_id'));
		
		$minimum_withdrawal_amount=$affiliate_setting->minimum_withdrawal_threshold;
		
		
		$data['total_earn_amount']=$total_earn_amount;
		
		
		$chk_amt=$this->input->post('amount');
		
		////check total amount=====
		
		
		$amount_error='';
		
		if($this->input->post('amount')) {
		
			if($chk_amt<$minimum_withdrawal_amount)
			{
				$amount_error='min';			
			}
			elseif($chk_amt>$total_earn_amount)
			{
				$amount_error='max';
			}
		
		}
		
		
		
		$this->load->library('form_validation');		
		$this->form_validation->set_rules('amount',AMOUNT, 'required|numeric');
	
		
		if($this->form_validation->run() == FALSE || $amount_error!='')
		{			
			
					if($amount_error=='min')
					{
						$amount_error="<p>". sprintf(AFFILIATE_CANT_ADD_AMOUNT_LESS_THAN_MIN_AMOUNT,set_currency($minimum_withdrawal_amount)). "</p>";
					}
					
					else if($amount_error=='max')
					{
						$amount_error="<p>".sprintf(AFFILIATE_CANT_ADD_WITHDARAW_AMOUNT_GREATER_THAN_TOTAL_WALLET_AMOUNT,set_currency($total_earn_amount))."</p>";
					} else {
						$amount_error='';
					}
			
			
					if(validation_errors() || $amount_error!='')
					{
						$data['error'] = validation_errors().$amount_error;
								
					} else	{
						$data["error"] = "";
					}
		
		       
					
					
					$data['amount']=$this->input->post('amount');
					
					
		} else {
					   
				$add_request=$this->affiliate_model->add_withdrawal_request();	   
	        	
				$msg='fail';
				
				if($add_request)
				{
					$msg='success';
				}
				
				redirect('affiliate/withdrawal_requests/all/0/'.$msg);					
				                
		}
		
		
		
		
		
		
		
		
		$data['select']='withdrawal_requests';	
		
		$data["msg"] = '';
		$data['header_menu']= dynamic_menu(0);
		$data['footer_menu']= dynamic_menu_footer(0);
		$data['right_menu']= dynamic_menu_right(0);
		$meta = meta_setting();
		$data['site_setting'] = site_setting();
		
		$this->template->write('meta_title','Withdrawal Request - '. $meta['title'], TRUE);
		$this->template->write('meta_description',$meta['meta_description'], TRUE);
		$this->template->write('meta_keyword', $meta['meta_keyword'], TRUE);
		
		if($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1)
		{
			$this->template->set_master_template('iphone/template.php');
			$this->template->write_view('main_content', 'iphone/affiliate/add_withdraw_request', $data, TRUE);
			$this->template->render();
		}
		elseif(($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1)
		{
			$this->template->set_master_template('mobile/template.php');
			$this->template->write_view('main_content', 'mobile/affiliate/add_withdraw_request', $data, TRUE);
			$this->template->render();
		}
		else
		{
			$this->template->write_view('header', 'default/header_login', $data, TRUE);
			$this->template->write_view('main_content', 'default/affiliate/add_withdraw_request', $data, TRUE);
			$this->template->write_view('footer', 'default/footer', $data, TRUE);
			$this->template->render();
		}
		
		
		
		
	}
	
	
	function update_earn_status()
	{
		$get_all_earn_record=$this->affiliate_model->get_all_pending_record();		
	}
	
	  
}
?>