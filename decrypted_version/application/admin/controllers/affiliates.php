<?php
class Affiliates extends CI_Controller {
	function Affiliates()
	{
		parent::__construct();
		$this->load->model('home_model');
		$this->load->model('affiliate_model');
	
	}
	
	function index()
	{
		
		///statics
		$check_rights=$this->home_model->get_rights('affiliates');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
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
		
		
		$data['affiliate_approved_request_today'] = $this->affiliate_model->get_total_affiliate_request_approved_today();
		$data['affiliate_approved_request_week'] = $this->affiliate_model->get_total_affiliate_request_approved_week();
		$data['affiliate_approved_request_month'] = $this->affiliate_model->get_total_affiliate_request_approved_month();
		$data['affiliate_approved_request_total'] = $this->affiliate_model->get_total_affiliate_request_approved_total();
		
		
		$data['affiliate_waiting_request_today'] = $this->affiliate_model->get_total_affiliate_request_waiting_today();
		$data['affiliate_waiting_request_week'] = $this->affiliate_model->get_total_affiliate_request_waiting_week();
		$data['affiliate_waiting_request_month'] = $this->affiliate_model->get_total_affiliate_request_waiting_month();
		$data['affiliate_waiting_request_total'] = $this->affiliate_model->get_total_affiliate_request_waiting_total();
		
		
		
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
	
		
		
		$data['site_setting'] = $this->home_model->select_site_setting();
		$this->template->write('title', 'Affiliate Stats', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'affiliate/stats', $data, TRUE);
		$this->template->write_view('footer', 'footer', $data, TRUE);
		$this->template->render();
	}
	
	function common_settings()
	{
		$check_rights=$this->home_model->get_rights('affiliates');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('cookie_expire_time', 'Cookie Expire Time', 'required');
		$this->form_validation->set_rules('affiliate_enable', 'Affiliate Enable', 'required');
		$this->form_validation->set_rules('affiliate_content', 'Affiliate Content', 'required');
		
		if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();
			}else{
				$data["error"] = "";
			}
			if($this->input->post('common_settings_id'))
			{
				$data["common_settings_id"] = $this->input->post('common_settings_id');
				$data["cookie_expire_time"] = $this->input->post('cookie_expire_time');
				$data["commission_holding_period"] = $this->input->post('commission_holding_period');
				$data["pay_commission_pledge"] = $this->input->post('pay_commission_pledge');
				$data["pay_commission_project_listing"] = $this->input->post('pay_commission_project_listing');
				$data["minimum_withdrawal_threshold"] = $this->input->post('minimum_withdrawal_threshold');
				$data["transaction_fee"] = $this->input->post('transaction_fee');
				$data["fee_type"] = $this->input->post('fee_type');
				$data["affiliate_enable"] = $this->input->post('affiliate_enable');
				
				$data["affiliate_content"] = $this->input->post('affiliate_content');
				
				
			}else{
				$common_settings = $this->affiliate_model->get_common_settings();
				
				$data["common_settings_id"] = $common_settings['common_settings_id'];
				$data["cookie_expire_time"] = $common_settings['cookie_expire_time'];
				$data["commission_holding_period"] = $common_settings['commission_holding_period'];
				$data["pay_commission_pledge"] = $common_settings['pay_commission_pledge'];
				$data["pay_commission_project_listing"] = $common_settings['pay_commission_project_listing'];
				$data["minimum_withdrawal_threshold"] = $common_settings['minimum_withdrawal_threshold'];
				$data["transaction_fee"] = $common_settings['transaction_fee'];
				$data["fee_type"] = $common_settings['fee_type'];
				$data["affiliate_enable"] = $common_settings['affiliate_enable'];
				
				$affiliate_content = $common_settings['affiliate_content'];
				$affiliate_content=str_replace('KSYDOU','"',$affiliate_content);
				$affiliate_content=str_replace('KSYSING',"'",$affiliate_content); 
				
				
				$data["affiliate_content"] = $affiliate_content;
			}
		}else{
			$this->affiliate_model->common_settings_update();
			$data["error"] = "Common Settings Updated Successfully";
			$common_settings = $this->affiliate_model->get_common_settings();
				
				$data["common_settings_id"] = $common_settings['common_settings_id'];
				$data["cookie_expire_time"] = $common_settings['cookie_expire_time'];
				$data["commission_holding_period"] = $common_settings['commission_holding_period'];
				$data["pay_commission_pledge"] = $common_settings['pay_commission_pledge'];
				$data["pay_commission_project_listing"] = $common_settings['pay_commission_project_listing'];
				$data["minimum_withdrawal_threshold"] = $common_settings['minimum_withdrawal_threshold'];
				$data["transaction_fee"] = $common_settings['transaction_fee'];
				$data["fee_type"] = $common_settings['fee_type'];
				$data["affiliate_enable"] = $common_settings['affiliate_enable'];
				
				
				$affiliate_content = $common_settings['affiliate_content'];
				$affiliate_content=str_replace('KSYDOU','"',$affiliate_content);
				$affiliate_content=str_replace('KSYSING',"'",$affiliate_content); 
				
				
				$data["affiliate_content"] = $affiliate_content;
		}	
		$data['site_setting'] = $this->home_model->select_site_setting();
		$this->template->write('title', 'Common Settings', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'affiliate/common_settings', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}
	
	function commission_settings()
	{
		$check_rights=$this->home_model->get_rights('affiliates');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		$commission_settings = $this->affiliate_model->get_commission_settings();
		
		$data['commission_settings']=$commission_settings;
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name_1', 'Cookie Expire Time', 'required');
		if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();
			}else{
				$data["error"] = "";
			}
			
				
				
			if($this->input->post('commission_settings_id_1'))
			{
				for($i=1; $i<=3; $i++){
					
					$data["commission_settings_id_".$i] = $this->input->post('commission_settings_id_'.$i);
					$data["name_".$i] = $commission_settings[$i]['name'];
					$data["commission_".$i] = $this->input->post('commission_'.$i);
					$data["type_".$i] = $this->input->post('type_'.$i);
					$data["active_".$i] = $this->input->post('active_'.$i);	
				}
			}else{
			
				for($i=0; $i<3; $i++){
					$j=$i+1;
					$data["commission_settings_id_".$j] = $commission_settings[$i]['commission_settings_id'];
					$data["name_".$j] = $commission_settings[$i]['name'];
					$data["commission_".$j] = $commission_settings[$i]['commission'];
					$data["type_".$j] = $commission_settings[$i]['type'];
					$data["active_".$j] = $commission_settings[$i]['active'];
				}
			}
		}else{
			$this->affiliate_model->commission_settings_update();
			$data["error"] = "Common Settings Updated Successfully";
			
			$commission_settings = $this->affiliate_model->get_commission_settings();
			
			for($i=0; $i<3; $i++){
					$j=$i+1;
					$data["commission_settings_id_".$j] = $commission_settings[$i]['commission_settings_id'];
					$data["name_".$j] = $commission_settings[$i]['name'];
					$data["commission_".$j] = $commission_settings[$i]['commission'];
					$data["type_".$j] = $commission_settings[$i]['type'];
					$data["active_".$j] = $commission_settings[$i]['active'];
				}
		}	
		$data['site_setting'] = $this->home_model->select_site_setting();
		$this->template->write('title', 'Commission Settings', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'affiliate/commission_settings', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}
	
	
	
	////////////============commission history==========
	
	function commission_history($limit='20',$offset=0,$msg='')
	{		
		$check_rights=$this->home_model->get_rights('affiliates');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		$this->load->library('pagination');
		$limit = '10';
		$config['base_url'] = site_url('affiliates/commission_history/'.$limit);
		$config['total_rows'] = $this->affiliate_model->get_total_commission_history_count();
		$config['per_page'] = $limit;
		$data['result'] = $this->affiliate_model->get_commission_history($offset, $limit);
		
		$this->pagination->initialize($config);
		$data['page_link'] = $this->pagination->create_links();
		
		$data['msg'] = $msg;
		$data['offset'] = $offset;	
		$data['limit']=$limit;
		$data['option']='';
		$data['keyword']='';
		$data['search_type']='normal';
		
		
		
		$data['site_setting'] = $this->home_model->select_site_setting();
		$this->template->write('title', 'Commission History', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'affiliate/commission_history', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();		
	}
	
	function search_commission_history($limit=20,$option='',$keyword='',$offset=0,$msg='')
	{
		
		$check_rights=$this->home_model->get_rights('affiliates');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		
		
		$this->load->library('pagination');
		
		
		if($_POST)
		{		
			$option=$this->input->post('option');
			$keyword=$this->input->post('keyword');
		}
		else
		{
			$option=$option;
			$keyword=$keyword;			
		}
		
		$keyword=str_replace('"','',str_replace(array("'",",","%","$","&","*","#","(",")",":",";",">","<","/"),'',trim($keyword)));
	
		$config['uri_segment']='6';
		$config['base_url'] = site_url('affiliates/search_commission_history/'.$limit.'/'.$option.'/'.$keyword.'/');
		
		$config['total_rows'] = $this->affiliate_model->get_total_search_commission_history_count($option,$keyword);
		$config['per_page'] = $limit;		
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();
		
		$data['result'] = $this->affiliate_model->get_search_commission_history_result($option,$keyword,$offset, $limit);
		$data['msg'] = $msg;
		$data['offset'] = $offset;
		
		
		
		$data['site_setting'] = $this->home_model->select_site_setting();
		
		$data['limit']=$limit;
		$data['option']=$option;
		$data['keyword']=$keyword;
		$data['search_type']='search';
		
		$this->template->write('title', 'Search Commission History', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'affiliate/commission_history', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}
		
	function action_commission_history()
	{
		
		$offset=$this->input->post('offset');
		$limit=$this->input->post('limit');
		$action=$this->input->post('action');
		$user_earn_id=$this->input->post('chk');
		$search_type=$this->input->post('search_type');
		
		$option=$this->input->post('option');
		$keyword=$this->input->post('keyword');
		
		$red_link='commission_history/'.$limit;
		
		if($search_type=='search')
		{
			$red_link='search_commission_history/'.$limit.'/'.$option.'/'.$keyword;
		}
		
		
		if($action=='delete')
		{	
			foreach($user_earn_id as $id)
			{			
				$this->db->delete('affiliate_user_earn',array('user_earn_id'=>$id));	
			}
			
			redirect('affiliates/'.$red_link.'/'.$offset.'/delete');
		}
		
		if($action=='complete')
		{	
			foreach($user_earn_id as $id)
			{			
				$this->db->where('user_earn_id',$id);
				$this->db->update('affiliate_user_earn',array('earn_status'=>1));			
			}
			
			redirect('affiliates/'.$red_link.'/'.$offset.'/complete');
		}
		
		if($action=='cancel')
		{	
			foreach($user_earn_id as $id)
			{			
				$this->db->where('user_earn_id',$id);
				$this->db->update('affiliate_user_earn',array('earn_status'=>2));			
			}
			
			redirect('affiliates/'.$red_link.'/'.$offset.'/cancel');
		}
		
		
		
	}
	
	
	////////////============withdraw request===========
	
	
	function withdraw_request($filter='all',$limit='20',$offset=0,$msg='')
	{		
		$check_rights=$this->home_model->get_rights('affiliates');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		if($filter=='')
		{
			redirect('affiliates/withdraw_request/all');	
		}
		
		$this->load->library('pagination');
		$limit = '10';
		$config['base_url'] = site_url('affiliates/withdraw_request/'.$filter.'/'.$limit);
		$config['total_rows'] = $this->affiliate_model->get_total_withdraw_request_count($filter);
		$config['per_page'] = $limit;
		$data['result'] = $this->affiliate_model->get_withdraw_request($filter,$offset, $limit);
		
		$this->pagination->initialize($config);
		$data['page_link'] = $this->pagination->create_links();
		
		$data['msg'] = $msg;
		$data['offset'] = $offset;	
		$data['limit']=$limit;
		$data['option']='';
		$data['keyword']='';
		$data['search_type']='normal';
		
		$data['filter']=$filter;
		
		$data['site_setting'] = $this->home_model->select_site_setting();
		$this->template->write('title', 'Withdraw Request', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'affiliate/withdraw_request', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();		
	}
	
	function search_withdraw_request($filter='all',$limit=20,$option='',$keyword='',$offset=0,$msg='')
	{
		
		$check_rights=$this->home_model->get_rights('affiliates');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		if($filter=='')
		{
			redirect('affiliates/search_withdraw_request/all/'.$limit.'/'.$option.'/'.$keyword.'/');	
		}
		
		$this->load->library('pagination');
		
		
		if($_POST)
		{		
			$option=$this->input->post('option');
			$keyword=$this->input->post('keyword');
		}
		else
		{
			$option=$option;
			$keyword=$keyword;			
		}
		
		$keyword=str_replace('"','',str_replace(array("'",",","%","$","&","*","#","(",")",":",";",">","<","/"),'',trim($keyword)));
	
		$config['uri_segment']='6';
		$config['base_url'] = site_url('affiliates/search_withdraw_request/'.$filter.'/'.$limit.'/'.$option.'/'.$keyword.'/');
		
		$config['total_rows'] = $this->affiliate_model->get_total_search_withdraw_request_count($filter,$option,$keyword);
		$config['per_page'] = $limit;		
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();
		
		$data['result'] = $this->affiliate_model->get_search_withdraw_request_result($filter,$option,$keyword,$offset, $limit);
		$data['msg'] = $msg;
		$data['offset'] = $offset;
		
		
		
		$data['site_setting'] = $this->home_model->select_site_setting();
		
		$data['limit']=$limit;
		$data['option']=$option;
		$data['keyword']=$keyword;
		$data['search_type']='search';
		
		$data['filter']=$filter;
		
		$this->template->write('title', 'Search Withdraw Request', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'affiliate/withdraw_request', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}
		
	function action_withdraw_request($filter='all',$limit=20)
	{
		
		$filter=$this->input->post('filter');
		
		$offset=$this->input->post('offset');
		$limit=$this->input->post('limit');
		$action=$this->input->post('action');
		$affiliate_withdraw_id=$this->input->post('chk');
		$search_type=$this->input->post('search_type');
		
		$option=$this->input->post('option');
		$keyword=$this->input->post('keyword');
		
		$red_link='withdraw_request/'.$filter.'/'.$limit;
		
		if($search_type=='search')
		{
			$red_link='search_withdraw_request/'.$filter.'/'.$limit.'/'.$option.'/'.$keyword;
		}
		
		
		if($action=='delete')
		{	
			foreach($affiliate_withdraw_id as $id)
			{			
				$this->db->delete('affiliate_withdraw_request',array('affiliate_withdraw_id'=>$id));	
			}
			
			redirect('affiliates/'.$red_link.'/'.$offset.'/delete');
		}
		
		if($action=='approve')
		{	
			foreach($affiliate_withdraw_id as $id)
			{			
				$this->db->where('affiliate_withdraw_id',$id);
				$this->db->update('affiliate_withdraw_request',array('withdraw_status'=>1));			
			}
			
			redirect('affiliates/'.$red_link.'/'.$offset.'/approve');
		}
		
		if($action=='success')
		{	
			foreach($affiliate_withdraw_id as $id)
			{			
				$this->db->where('affiliate_withdraw_id',$id);
				$this->db->update('affiliate_withdraw_request',array('withdraw_status'=>2));			
			}
			
			redirect('affiliates/'.$red_link.'/'.$offset.'/success');
		}
		
		if($action=='reject')
		{	
			foreach($affiliate_withdraw_id as $id)
			{			
				$this->db->where('affiliate_withdraw_id',$id);
				$this->db->update('affiliate_withdraw_request',array('withdraw_status'=>3));			
			}
			
			redirect('affiliates/'.$red_link.'/'.$offset.'/reject');
		}
		
		if($action=='fail')
		{	
			foreach($affiliate_withdraw_id as $id)
			{			
				$this->db->where('affiliate_withdraw_id',$id);
				$this->db->update('affiliate_withdraw_request',array('withdraw_status'=>4));			
			}
			
			redirect('affiliates/'.$red_link.'/'.$offset.'/fail');
		}
		
		
		
	}
	
	
}
?>