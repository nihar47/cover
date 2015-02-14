<?php
class Project_setting extends CI_Controller {
	function Project_setting()
	{
		parent::__construct();
		$this->load->model('project_setting_model');
		
	}
	
	function index()
	{}
	
	function add_project_setting()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('pay_fee', 'Pay Fees', 'required');
		if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();
			}else{
				$data["error"] = "";
			}
			if($this->input->post('project_setting_id'))
			{
				$data["project_setting_id"] = $this->input->post('project_setting_id');
				$data["enable_paypal"] = $this->input->post('enable_paypal');
				$data["payment_flow"] = $this->input->post('payment_flow');
				$data["pay_fee"] = $this->input->post('pay_fee');
				$data["project_listing_fee"] = $this->input->post('project_listing_fee');
				$data["project_listing_fee_type"] = $this->input->post('project_listing_fee_type');
				$data["commission"] = $this->input->post('commission');
				$data["project_short_desc_length"] = $this->input->post('project_short_desc_length');
				$data["site_stat_front"] = $this->input->post('site_stat_front');
				$data["min_project_amount"] = $this->input->post('min_project_amount');
				$data["max_project_amount"] = $this->input->post('max_project_amount');
				$data["project_user"] = $this->input->post('project_user');
				$data["edit_amount"] = $this->input->post('edit_amount');
				$data["edit_end_date"] = $this->input->post('edit_end_date');
				$data["approve_project"] = $this->input->post('approve_project');
				$data["cancel_project"] = $this->input->post('cancel_project');
				$data["default_pledge"] = $this->input->post('default_pledge');
				$data["enable_fixed_pledge"] = $this->input->post('enable_fixed_pledge');
				$data["enable_owner_fixed_amount"] = $this->input->post('enable_owner_fixed_amount');
				$data["enable_multiple_type"] = $this->input->post('enable_multiple_type');
				$data["enable_owner_multiple_amount"] = $this->input->post('enable_owner_multiple_amount');
				$data["enable_suggested_type"] = $this->input->post('enable_suggested_type');
				$data["enable_owner_suggested_amount"] = $this->input->post('enable_owner_suggested_amount');
				$data["enable_min_amount"] = $this->input->post('enable_min_amount');
				$data["enable_owner_min_amount"] = $this->input->post('enable_owner_min_amount');
				$data["allow_guest_backers_list"] = $this->input->post('allow_guest_backers_list');
				$data["allow_guest_backers_amount"] = $this->input->post('allow_guest_backers_amount');
				$data["allow_backers_amount"] = $this->input->post('allow_backers_amount');
				$data["allow_cancel_pledge_backers"] = $this->input->post('allow_cancel_pledge_backers');
				$data["min_days_pledge_cancel"] = $this->input->post('min_days_pledge_cancel');
				$data["allow_cancel_pledge_owner"] = $this->input->post('allow_cancel_pledge_owner');
				$data["allow_owner_fund_own"] = $this->input->post('allow_owner_fund_own');
				$data["allow_owner_fund_other"] = $this->input->post('allow_owner_fund_other');
				$data["enable_project_reward"] = $this->input->post('enable_project_reward');
				$data["reward_detail_optional"] = $this->input->post('reward_detail_optional');
				$data["allow_owner_edit_reward"] = $this->input->post('allow_owner_edit_reward');
				$data["small_project_max_days"] = $this->input->post('small_project_max_days');
				$data["small_project_max_amount"] = $this->input->post('small_project_max_amount');
				$data["funded_percentage"] = $this->input->post('funded_percentage');
				$data["no_of_category"] = $this->input->post('no_of_category');
				$data["enable_overfund"] = $this->input->post('enable_overfund');
				$data["owner_set_overfund"] = $this->input->post('owner_set_overfund');
				$data["enable_project_follower"] = $this->input->post('enable_project_follower');
				$data["enable_project_comment"] = $this->input->post('enable_project_comment');
				$data["enable_update_comment"] = $this->input->post('enable_update_comment');
				$data["enable_project_rating"] = $this->input->post('enable_project_rating');
				$data["logged_user_login"] = $this->input->post('logged_user_login');
				$data["enable_project_flag"] = $this->input->post('enable_project_flag');
				$data["auto_suspend_project"] = $this->input->post('auto_suspend_project');
				$data["auto_fund_capture"] = $this->input->post('auto_fund_capture');
				$data["auto_suspend_comment"] = $this->input->post('auto_suspend_comment');
				$data["auto_suspend_update"] = $this->input->post('auto_suspend_update');
				$data["auto_suspend"] = $this->input->post('auto_suspend');
				$data["auto_suspend_message"] = $this->input->post('auto_suspend_message');
			}else{
				$one_project_setting = $this->project_setting_model->get_one_project_setting();
				$data["project_setting_id"] = $one_project_setting['project_setting_id'];
				$data["enable_paypal"] = $one_project_setting['enable_paypal'];
				$data["payment_flow"] = $one_project_setting['payment_flow'];
				$data["pay_fee"] = $one_project_setting['pay_fee'];
				$data["project_listing_fee"] = $one_project_setting['project_listing_fee'];
				$data["project_listing_fee_type"] = $one_project_setting['project_listing_fee_type'];
				$data["commission"] = $one_project_setting['commission'];
				$data["project_short_desc_length"] = $one_project_setting['project_short_desc_length'];
				$data["site_stat_front"] = $one_project_setting['site_stat_front'];
				$data["min_project_amount"] = $one_project_setting['min_project_amount'];
				$data["max_project_amount"] = $one_project_setting['max_project_amount'];
				$data["project_user"] = $one_project_setting['project_user'];
				$data["edit_amount"] = $one_project_setting['edit_amount'];
				$data["edit_end_date"] = $one_project_setting['edit_end_date'];
				$data["approve_project"] = $one_project_setting['approve_project'];
				$data["cancel_project"] = $one_project_setting['cancel_project'];
				$data["default_pledge"] = $one_project_setting['default_pledge'];
				$data["enable_fixed_pledge"] = $one_project_setting['enable_fixed_pledge'];
				$data["enable_owner_fixed_amount"] = $one_project_setting['enable_owner_fixed_amount'];
				$data["enable_multiple_type"] = $one_project_setting['enable_multiple_type'];
				$data["enable_owner_multiple_amount"] = $one_project_setting['enable_owner_multiple_amount'];
				$data["enable_suggested_type"] = $one_project_setting['enable_suggested_type'];
				$data["enable_owner_suggested_amount"] = $one_project_setting['enable_owner_suggested_amount'];
				$data["enable_min_amount"] = $one_project_setting['enable_min_amount'];
				$data["enable_owner_min_amount"] = $one_project_setting['enable_owner_min_amount'];
				$data["allow_guest_backers_list"] = $one_project_setting['allow_guest_backers_list'];
				$data["allow_guest_backers_amount"] = $one_project_setting['allow_guest_backers_amount'];
				$data["allow_backers_amount"] = $one_project_setting['allow_backers_amount'];
				$data["allow_cancel_pledge_backers"] = $one_project_setting['allow_cancel_pledge_backers'];
				$data["min_days_pledge_cancel"] = $one_project_setting['min_days_pledge_cancel'];
				$data["allow_cancel_pledge_owner"] = $one_project_setting['allow_cancel_pledge_owner'];
				$data["allow_owner_fund_own"] = $one_project_setting['allow_owner_fund_own'];
				$data["allow_owner_fund_other"] = $one_project_setting['allow_owner_fund_other'];
				$data["enable_project_reward"] = $one_project_setting['enable_project_reward'];
				$data["reward_detail_optional"] = $one_project_setting['reward_detail_optional'];
				$data["allow_owner_edit_reward"] = $one_project_setting['allow_owner_edit_reward'];
				$data["small_project_max_days"] = $one_project_setting['small_project_max_days'];
				$data["small_project_max_amount"] = $one_project_setting['small_project_max_amount'];
				$data["funded_percentage"] = $one_project_setting['funded_percentage'];
				$data["no_of_category"] = $one_project_setting['no_of_category'];
				$data["enable_overfund"] = $one_project_setting['enable_overfund'];
				$data["owner_set_overfund"] = $one_project_setting['owner_set_overfund'];
				$data["enable_project_follower"] = $one_project_setting['enable_project_follower'];
				$data["enable_project_comment"] = $one_project_setting['enable_project_comment'];
				$data["enable_update_comment"] = $one_project_setting['enable_update_comment'];
				$data["enable_project_rating"] = $one_project_setting['enable_project_rating'];
				$data["logged_user_login"] = $one_project_setting['logged_user_login'];
				$data["enable_project_flag"] = $one_project_setting['enable_project_flag'];
				$data["auto_suspend_project"] = $one_project_setting['auto_suspend_project'];
				$data["auto_fund_capture"] = $one_project_setting['auto_fund_capture'];
				$data["auto_suspend_comment"] = $one_project_setting['auto_suspend_comment'];
				$data["auto_suspend_update"] = $one_project_setting['auto_suspend_update'];
				$data["auto_suspend"] = $one_project_setting['auto_suspend'];
				$data["auto_suspend_message"] = $one_project_setting['auto_suspend_message'];
			}
			$this->template->write('title', 'Settings', '', TRUE);
			$this->template->write_view('header', 'header', '', TRUE);
			$this->template->write_view('main_content', 'add_project_setting', $data, TRUE);
			$this->template->write_view('footer', 'footer', '', TRUE);
			$this->template->render();
		}else{
			$this->project_setting_model->project_setting_update();
			$data["error"] = "Project settings updated successfully";
			$data["project_setting_id"] = $this->input->post('project_setting_id');
			$data["enable_paypal"] = $this->input->post('enable_paypal');
			$data["payment_flow"] = $this->input->post('payment_flow');
			$data["pay_fee"] = $this->input->post('pay_fee');
			$data["project_listing_fee"] = $this->input->post('project_listing_fee');
			$data["project_listing_fee_type"] = $this->input->post('project_listing_fee_type');
			$data["commission"] = $this->input->post('commission');
			$data["project_short_desc_length"] = $this->input->post('project_short_desc_length');
			$data["site_stat_front"] = $this->input->post('site_stat_front');
			$data["min_project_amount"] = $this->input->post('min_project_amount');
			$data["max_project_amount"] = $this->input->post('max_project_amount');
			$data["project_user"] = $this->input->post('project_user');
			$data["edit_amount"] = $this->input->post('edit_amount');
			$data["edit_end_date"] = $this->input->post('edit_end_date');
			$data["approve_project"] = $this->input->post('approve_project');
			$data["cancel_project"] = $this->input->post('cancel_project');
			$data["default_pledge"] = $this->input->post('default_pledge');
			$data["enable_fixed_pledge"] = $this->input->post('enable_fixed_pledge');
			$data["enable_owner_fixed_amount"] = $this->input->post('enable_owner_fixed_amount');
			$data["enable_multiple_type"] = $this->input->post('enable_multiple_type');
			$data["enable_owner_multiple_amount"] = $this->input->post('enable_owner_multiple_amount');
			$data["enable_suggested_type"] = $this->input->post('enable_suggested_type');
			$data["enable_owner_suggested_amount"] = $this->input->post('enable_owner_suggested_amount');
			$data["enable_min_amount"] = $this->input->post('enable_min_amount');
			$data["enable_owner_min_amount"] = $this->input->post('enable_owner_min_amount');
			$data["allow_guest_backers_list"] = $this->input->post('allow_guest_backers_list');
			$data["allow_guest_backers_amount"] = $this->input->post('allow_guest_backers_amount');
			$data["allow_backers_amount"] = $this->input->post('allow_backers_amount');
			$data["allow_cancel_pledge_backers"] = $this->input->post('allow_cancel_pledge_backers');
			$data["min_days_pledge_cancel"] = $this->input->post('min_days_pledge_cancel');
			$data["allow_cancel_pledge_owner"] = $this->input->post('allow_cancel_pledge_owner');
			$data["allow_owner_fund_own"] = $this->input->post('allow_owner_fund_own');
			$data["allow_owner_fund_other"] = $this->input->post('allow_owner_fund_other');
			$data["enable_project_reward"] = $this->input->post('enable_project_reward');
			$data["reward_detail_optional"] = $this->input->post('reward_detail_optional');
			$data["allow_owner_edit_reward"] = $this->input->post('allow_owner_edit_reward');
			$data["small_project_max_days"] = $this->input->post('small_project_max_days');
			$data["small_project_max_amount"] = $this->input->post('small_project_max_amount');
			$data["funded_percentage"] = $this->input->post('funded_percentage');
			$data["no_of_category"] = $this->input->post('no_of_category');
			$data["enable_overfund"] = $this->input->post('enable_overfund');
			$data["owner_set_overfund"] = $this->input->post('owner_set_overfund');
			$data["enable_project_follower"] = $this->input->post('enable_project_follower');
			$data["enable_project_comment"] = $this->input->post('enable_project_comment');
			$data["enable_update_comment"] = $this->input->post('enable_update_comment');
			$data["enable_project_rating"] = $this->input->post('enable_project_rating');
			$data["logged_user_login"] = $this->input->post('logged_user_login');
			$data["enable_project_flag"] = $this->input->post('enable_project_flag');
			$data["auto_suspend_project"] = $this->input->post('auto_suspend_project');
			$data["auto_fund_capture"] = $this->input->post('auto_fund_capture');
			$data["auto_suspend_comment"] = $this->input->post('auto_suspend_comment');
			$data["auto_suspend_update"] = $this->input->post('auto_suspend_update');
			$data["auto_suspend"] = $this->input->post('auto_suspend');
			$data["auto_suspend_message"] = $this->input->post('auto_suspend_message');
			$this->template->write('title', 'Settings', '', TRUE);
			$this->template->write_view('header', 'header', '', TRUE);
			$this->template->write_view('main_content', 'add_project_setting', $data, TRUE);
			$this->template->write_view('footer', 'footer', '', TRUE);
			$this->template->render();
		}				
	}
	
}
?>