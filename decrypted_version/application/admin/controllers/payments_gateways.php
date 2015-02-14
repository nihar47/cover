<?php
class Payments_gateways extends CI_Controller {
	function Payments_gateways()
	{
		parent::__construct();
		$this->load->model('payments_gateway_model');
		$this->load->model('transaction_type_model');
		$this->load->model('home_model');
		
	}
	
	function index()
	{
		redirect('payments_gateways/list_payment_gateway');	
	}
	
	function add_payment()
	{
		
		
		$check_rights=$this->home_model->get_rights('list_payment_gateway');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_rules('function_name', 'Function Name', 'required');
		$this->form_validation->set_rules('suapport_masspayment', 'Suapport Masspayment', 'required');
		
		if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();
			}else{
				$data["error"] = "";
			}
			$data["id"] = $this->input->post('id');
			$data["name"] = $this->input->post('name');
			$data["status"] = $this->input->post('status');
			$data["image"] = $this->input->post('image');
			$data["function_name"] = $this->input->post('function_name');
			$data["suapport_masspayment"] = $this->input->post('suapport_masspayment');
		
			if($this->input->post('offset')=="")
			{
				$limit = '10';
				$totalRows = $this->payments_gateway_model->get_total_payment_count();
				$data["offset"] = (int)($totalRows/$limit)*$limit;
			}else{
				$data["offset"] = $this->input->post('offset');
			}
			
			$data['site_setting'] = $this->home_model->select_site_setting();
			$this->template->write('title', 'Add Payment Gateway', '', TRUE);
			$this->template->write_view('header', 'header', $data, TRUE);
			$this->template->write_view('main_content', 'wallet/add_payment_gateway', $data, TRUE);
			$this->template->write_view('footer', 'footer', '', TRUE);
			$this->template->render();
		}else{
			if($this->input->post('id'))
			{
				$this->payments_gateway_model->payment_update();
				$msg = "update";
			}else{
				
				
				$this->payments_gateway_model->payment_insert();
				$msg = "insert";
			}
			$offset = $this->input->post('offset');
			redirect('payments_gateways/list_payment_gateway/'.$offset.'/'.$msg);
		}				
	}
	
	function edit_status($id=0,$offset=0)
	{
		
		
		$check_rights=$this->home_model->get_rights('list_payment_gateway');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		$one_pay = $this->payments_gateway_model->get_one_payment($id);
		
		if($one_pay['status']=='Active' or $one_pay['status']!='Inactive'){
		
		$this->db->query("UPDATE `payments_gateways` SET `status`='Inactive' where `id`='".$id."'");		
		redirect('payments_gateways/list_payment_gateway/'.$offset.'/status');
		
		}
		
		else{
		
		$this->db->query("UPDATE `payments_gateways` SET `status`='Active' where `id`='".$id."'");		
		redirect('payments_gateways/list_payment_gateway/'.$offset.'/status');
			
		}
		
		
	}
	
	function edit_payment($id=0,$offset=0)
	{
		
		
		$check_rights=$this->home_model->get_rights('list_payment_gateway');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		
		
		
		$one_pay = $this->payments_gateway_model->get_one_payment($id);
		$data["error"] = "";
		$data["id"] = $id;
		$data["name"] = $one_pay['name'];
		$data["status"] = $one_pay['status'];
		$data["image"] = $one_pay['image'];
		$data["function_name"] = $one_pay['function_name'];
		$data["suapport_masspayment"] = $one_pay['suapport_masspayment'];
		
		$data['site_setting'] = $this->home_model->select_site_setting();
		
		$data["offset"] = $offset;
		$this->template->write('title', 'Edit Payment Gateway', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'wallet/add_payment_gateway', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}
	
	function delete_payment($id=0,$offset=0)
	{
		
		$check_rights=$this->home_model->get_rights('list_payment_gateway');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		$this->payments_gateway_model->delete_payment_gateway($id);
		redirect('payments_gateways/list_payment_gateway/'.$offset.'/delete');
	}
	
	function list_payment_gateway($offset=0,$msg='')
	{
		$this->load->library('pagination');

		$limit = '10';
		
		$config['base_url'] = site_url('payments_gateways/list_payment_gateway/');
		$config['total_rows'] = $this->payments_gateway_model->get_total_payment_count();
		$config['per_page'] = $limit;		
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();
		
		$data['result'] = $this->payments_gateway_model->get_payment_result($offset, $limit);
		$data['msg'] = $msg;
		$data['offset'] = $offset;
		
		$data['site_setting'] = $this->home_model->select_site_setting();
		
		$this->template->write('title', 'Payment Gateway', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'wallet/list_payment_gateway', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}
	
	function set_payments_gateways($action='',$gateway=''){
		if($action=='active'){
				$normal = get_normal_paypal_detail();
				$adaptive = get_adaptive_paypal_detail();
				$amazon = get_amazon_detail();
				$wallet = get_wallet_detail();
				
					if($normal->normal_paypal == '1' || $adaptive->gateway_status == '1' || $amazon->gateway_status  == '1'|| $wallet->wallet_enable=='1')
					{
						
							if($gateway=='wallet'){
								
								redirect('wallet_setting/add_wallet_setting/fail');
							
							}elseif($gateway=='paypal'){
								
								redirect('transaction_type/list_paypal/0/fail');
							
							}
							elseif($gateway=='normal'){
								
								redirect('transaction_type/list_normal_paypal/fail');
							
							}elseif($gateway=='amazon'){
								
								redirect('transaction_type/list_amazon/0/fail');
							
							}
							else{
								
								redirect('home/dashboard');
							
							}
						
					}else{
					
							if($gateway=='wallet'){
								
								$this->db->query("update wallet_setting set wallet_enable=1 where wallet_id='1'");
								
								redirect('wallet_setting/add_wallet_setting/done');
							
							}elseif($gateway=='paypal'){
								
								$this->db->query("update paypal set gateway_status=1 where id='1'");
								
								redirect('transaction_type/list_paypal/0/done');
							
							}
							elseif($gateway=='normal'){
								
								$this->db->query("update site_setting set normal_paypal=1 where site_setting_id='1'");
								
								redirect('transaction_type/list_normal_paypal/done');
							
							}elseif($gateway=='amazon'){
								
								$this->db->query("update amazon set gateway_status=1 where id='1'");
								
								redirect('transaction_type/list_amazon/0/done');
							
							}
							else{
								
								redirect('home/dashboard');
							
							}
					}
		}
		else{
							if($gateway=='wallet'){
								
								$this->db->query("update wallet_setting set wallet_enable=0 where wallet_id='1'");
								
								redirect('wallet_setting/add_wallet_setting/inactive');
							
							}elseif($gateway=='paypal'){
								
								$this->db->query("update paypal set gateway_status=0 where id='1'");
								
								redirect('transaction_type/list_paypal/0/inactive');
							
							}
							elseif($gateway=='normal'){
								
								$this->db->query("update site_setting set normal_paypal=0 where site_setting_id='1'");
								
								redirect('transaction_type/list_normal_paypal/inactive');
							
							}elseif($gateway=='amazon'){
								
								$this->db->query("update amazon set gateway_status=0 where id='1'");
								
								redirect('transaction_type/list_amazon/0/inactive');
							
							}
							else{
								
								redirect('home/dashboard');
							
							}
			}
	
	}
	
}
?>