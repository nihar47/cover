<?php
class Wallet_setting extends CI_Controller {
	function Wallet_setting()
	{
		parent::__construct();
		$this->load->model('wallet_setting_model');
		$this->load->model('home_model');
		
	}
	
	function index()
	{
		redirect('wallet_setting/add_wallet_setting');
	}
	
	function add_wallet_setting($msg = '')
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('wallet_add_fees', 'Wallet Add Fees', 'required');
		$this->form_validation->set_rules('wallet_donation_fees', 'Wallet Donation Fees', 'required');
		
		$this->form_validation->set_rules('wallet_minimum_amount', 'Wallet Minimum', 'required');
		
		
		if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();
			}else{
				$data["error"] = "";
			}
			if($this->input->post('wallet_id'))
			{
				$data["wallet_id"] = $this->input->post('wallet_id');
				$data["wallet_add_fees"] = $this->input->post('wallet_add_fees');
				$data["wallet_donation_fees"] = $this->input->post('wallet_donation_fees');
				$data["wallet_enable"] = $this->input->post('wallet_enable');
				$data["wallet_minimum_amount"] = $this->input->post('wallet_minimum_amount');
				$data["wallet_payment_type"] = $this->input->post('wallet_payment_type');
				$data["direct_donation_option"] = $this->input->post('direct_donation_option');
				$data["add_amount"] = $this->input->post('add_amount');
				
				
			}else{
				$one_wallet_setting = $this->wallet_setting_model->get_one_wallet_setting();
				
				$data["wallet_id"] = $one_wallet_setting['wallet_id'];
				$data["wallet_add_fees"] = $one_wallet_setting['wallet_add_fees'];
				$data["wallet_donation_fees"] = $one_wallet_setting['wallet_donation_fees'];
				$data["wallet_enable"] = $one_wallet_setting['wallet_enable'];
				$data["wallet_minimum_amount"] = $one_wallet_setting['wallet_minimum_amount'];
				$data["wallet_payment_type"] = $one_wallet_setting['wallet_payment_type'];
				
				$data["direct_donation_option"] = $one_wallet_setting['direct_donation_option'];
				$data["add_amount"] = $one_wallet_setting['add_remain_amount'];
				
			}
			$data['msg'] = $msg;
			$data['site_setting'] = $this->home_model->select_site_setting();
		
			$this->template->write('title', 'Wallet Settings', '', TRUE);
			$this->template->write_view('header', 'header', $data, TRUE);
			$this->template->write_view('main_content', 'wallet/add_wallet_setting', $data, TRUE);
			$this->template->write_view('footer', 'footer', '', TRUE);
			$this->template->render();
		}else{
			$this->wallet_setting_model->wallet_setting_update();
			$data["error"] = "Wallet settings updated successfully";
			$data["wallet_id"] = $this->input->post('wallet_id');
			$data["wallet_add_fees"] = $this->input->post('wallet_add_fees');
			$data["wallet_donation_fees"] = $this->input->post('wallet_donation_fees');
			$data["wallet_enable"] = $this->input->post('wallet_enable');
			$data["wallet_minimum_amount"] = $this->input->post('wallet_minimum_amount');
			$data["wallet_payment_type"] = $this->input->post('wallet_payment_type');
			$data["direct_donation_option"] = $this->input->post('direct_donation_option');
			$data["add_amount"] = $this->input->post('add_amount');
			
			$data['msg'] = $msg;
			$data['site_setting'] = $this->home_model->select_site_setting();
		
			$this->template->write('title', 'Wallet Settings', '', TRUE);
			$this->template->write_view('header', 'header', $data, TRUE);
			$this->template->write_view('main_content', 'wallet/add_wallet_setting', $data, TRUE);
			$this->template->write_view('footer', 'footer', '', TRUE);
			$this->template->render();
		}				
	}
	
}
?>