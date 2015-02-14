<?php
class Transaction_type extends CI_Controller {
	function Transaction_type()
	{
		parent::__construct();
		$this->load->model('transaction_type_model');
		$this->load->model('home_model');
		
	}
	
	function index()
	{
		redirect('transaction_type/list_transaction');
		
	}
	
	
	
	
	
	
	
	/*******PayPal Credit Card*****/


	function list_credit_card($offset=0,$msg='')
	{		
		
		$check_rights=$this->home_model->get_rights('list_credit_card');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}	
		
		
		$this->load->library('pagination');

		$limit = '5';
		
		$config['base_url'] = site_url('transaction_type/list_credit_card/');
		$config['total_rows'] = $this->transaction_type_model->get_total_credit_card_count();
		$config['per_page'] = $limit;		
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();
		
		$data['result'] = $this->transaction_type_model->get_credit_card_result($offset, $limit);
		$data['msg'] = $msg;
		$data['offset'] = $offset;
		
		$data['site_setting'] = $this->home_model->select_site_setting();
		
		$this->template->write('title', 'Paypal Credit Card Payment Gateway', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'list_credit_card', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}


	function add_credit_card()
	{
			
		$check_rights=$this->home_model->get_rights('list_credit_card');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
			
			
		
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('credit_card_site_status', 'Site Status', 'required');
			$this->form_validation->set_rules('credit_card_version', 'Credit Card Version', 'required|numeric');
			$this->form_validation->set_rules('credit_card_api_signature', 'API Signature', 'required');
			$this->form_validation->set_rules('credit_card_username', 'API Username', 'required');
			$this->form_validation->set_rules('credit_card_password', 'API Password', 'required');
			
			
			
			
			if($this->form_validation->run() == FALSE){			
				if(validation_errors())
				{
					$data["error"] = validation_errors();
				}else{
					$data["error"] = "";
				}
				$data["paypal_credit_card_id"] = $this->input->post('paypal_credit_card_id');
				
				$data["credit_card_site_status"] = $this->input->post('credit_card_site_status');
				
				$data["credit_card_version"] = $this->input->post('credit_card_version');
			
				$data["credit_card_username"] = $this->input->post('credit_card_username');
				$data["credit_card_password"] = $this->input->post('credit_card_password');
				$data["credit_card_api_signature"] = $this->input->post('credit_card_api_signature');
				
				
				$data['site_setting'] = $this->home_model->select_site_setting();
				
				
				if($this->input->post('offset')=="")
				{
					$limit = '5';
					$totalRows = $this->transaction_type_model->get_total_credit_card_count();
					$data["offset"] = (int)($totalRows/$limit)*$limit;
				}else{
					$data["offset"] = $this->input->post('offset');
				}
				$this->template->write('title', 'Paypal Credit Card Payment Gateway', '', TRUE);
				$this->template->write_view('header', 'header', $data, TRUE);
				$this->template->write_view('main_content', 'add_paypal_credit_card', $data, TRUE);
				$this->template->write_view('footer', 'footer', '', TRUE);
				$this->template->render();
			}else{
			
		
				if($this->input->post('paypal_credit_card_id')>0)
				{				
					$this->transaction_type_model->paypal_credit_card_update();
					$msg = "update";
				}else{
					$this->transaction_type_model->paypal_credit_card_insert();
					$msg = "insert";
				}
				$offset = $this->input->post('offset');
				redirect('transaction_type/list_credit_card/'.$offset.'/'.$msg);
			}				
		}

	
	function edit_credit_card($id=0,$offset=0)
	{
		
		$check_rights=$this->home_model->get_rights('list_credit_card');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		
		
		$one_paypal = $this->transaction_type_model->get_paypal_credit_card_by_id($id);
		$data["error"] = "";
		$data["paypal_credit_card_id"] = $id;
		
		$data["credit_card_site_status"] = $one_paypal['credit_card_site_status'];
		
		$data["credit_card_version"] = $one_paypal['credit_card_version'];
		
		$data["credit_card_username"] = $one_paypal['credit_card_username'];
		$data["credit_card_password"] = $one_paypal['credit_card_password'];
		$data["credit_card_api_signature"] = $one_paypal['credit_card_api_signature'];
		
				
		$site_setting = $this->home_model->select_site_setting();
	
		
		$data['site_setting'] = $site_setting;
		$data["offset"] = $offset;
		$this->template->write('title', 'Paypal Credit Card Payment Gateway', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'add_paypal_credit_card', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}
	
	
	


	/************Normal Paypal ****************/






	function list_normal_paypal($msg='')
	{
		
		$check_rights=$this->home_model->get_rights('list_normal_paypal');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		
		
		$data['result'] = $this->transaction_type_model->get_normal_paypal_result();
		$data['msg'] = $msg;
		
		
		$data['site_setting'] = $this->home_model->select_site_setting();
		
		$this->template->write('title', 'Normal Paypal Payment Gateway', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'list_normal_paypal', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}


	function add_normal_paypal()
	{
			
		$check_rights=$this->home_model->get_rights('list_normal_paypal');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		
			
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('paypal_status', 'Paypal Status', 'required');
			$this->form_validation->set_rules('pay_fee', 'Commission Fee', 'required|integer');
			$this->form_validation->set_rules('paypal_email', 'Paypal Email', 'required');
			$this->form_validation->set_rules('paypal_API_UserName', 'API Username', 'required');
			$this->form_validation->set_rules('paypal_API_Password', 'API Password', 'required');
			$this->form_validation->set_rules('paypal_API_Signature', 'API Signature', 'required');
			$this->form_validation->set_rules('normal_paypal', 'Gateway Status', 'required');
			
			
			if($this->form_validation->run() == FALSE){			
				if(validation_errors())
				{
					$data["error"] = validation_errors();
				}else{
					$data["error"] = "";
				}
				
				$data["paypal_status"] = $this->input->post('paypal_status');
				$data["pay_fee"] = $this->input->post('pay_fee');
				$data["paypal_email"] = $this->input->post('paypal_email');
				$data["paypal_API_UserName"] = $this->input->post('paypal_API_UserName');
				$data["paypal_API_Password"] = $this->input->post('paypal_API_Password');
				$data["paypal_API_Signature"] = $this->input->post('paypal_API_Signature');
				$data["normal_paypal"] = $this->input->post('normal_paypal');
				
				$data['site_setting'] = $this->home_model->select_site_setting();
				
				$this->template->write('title', 'Normal Paypal Payment Gateway', '', TRUE);
				$this->template->write_view('header', 'header', $data, TRUE);
				$this->template->write_view('main_content', 'add_normal_paypal', $data, TRUE);
				$this->template->write_view('footer', 'footer', '', TRUE);
				$this->template->render();
			}else{
				
					$this->transaction_type_model->normal_paypal_update();
					$msg = "Paypal Updated Successfully";
				
				redirect('transaction_type/list_normal_paypal/'.$msg);
			}				
		}

	
	function edit_normal_paypal()
	{
		$check_rights=$this->home_model->get_rights('list_normal_paypal');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		
		$one_paypal = $this->transaction_type_model->get_normal_paypal();
		
		$project = $this->transaction_type_model->get_project_setting();
		
		$data["error"] = "";
		
		$data["paypal_status"] = $one_paypal['paypal_status'];
		$data["pay_fee"] = $project['pay_fee'];
		$data["paypal_email"] = $one_paypal['paypal_email'];
		$data["paypal_API_UserName"] = $one_paypal['paypal_API_UserName'];
		$data["paypal_API_Password"] = $one_paypal['paypal_API_Password'];
		$data["paypal_API_Signature"] = $one_paypal['paypal_API_Signature'];
		$data["normal_paypal"] = $one_paypal['normal_paypal'];
		
		$data['site_setting'] = $this->home_model->select_site_setting();
		
		$this->template->write('title', 'Normal Paypal Payment Gateway', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'add_normal_paypal', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}
	






	/*******PayPal*****/


	function list_paypal($offset=0,$msg='')
	{
		
		
		$check_rights=$this->home_model->get_rights('list_paypal');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		
		
		$this->load->library('pagination');

		$limit = '5';
		
		$config['base_url'] = site_url('transaction_type/list_paypal/');
		$config['total_rows'] = $this->transaction_type_model->get_total_paypal_count();
		$config['per_page'] = $limit;		
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();
		
		$data['result'] = $this->transaction_type_model->get_paypal_result($offset, $limit);
		$data['msg'] = $msg;
		$data['offset'] = $offset;
		
		$data['site_setting'] = $this->home_model->select_site_setting();
		
		$this->template->write('title', 'Paypal Adaptive Payment Gateway', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'list_paypal', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}


	function add_paypal()
	{
			
		$check_rights=$this->home_model->get_rights('list_paypal');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('site_status', 'Site Status', 'required');
			$this->form_validation->set_rules('application_id', 'Paypal Application Id', 'required');
			$this->form_validation->set_rules('paypal_email', 'Email', 'required');
			$this->form_validation->set_rules('paypal_username', 'Username', 'required');
			//$this->form_validation->set_rules('preapproval', 'Preapproval', 'required');
			//$this->form_validation->set_rules('gateway_status', 'Gateway Status', 'required');
			$this->form_validation->set_rules('paypal_password', 'Password', 'required');
			$this->form_validation->set_rules('paypal_signature', 'Signature', 'required');
			//$this->form_validation->set_rules('transaction_fees', 'Commission Fees', 'required');
			
			if($this->input->post('test_update')){
				$this->form_validation->set_rules('first_name', 'PayPal First Name', 'required');
				$this->form_validation->set_rules('last_name', 'PayPal Last Name', 'required');
				$this->form_validation->set_rules('email', 'PayPal Email Id', 'required');
			}
			
			if($this->form_validation->run() == FALSE){			
				if(validation_errors())
				{
					$data["error"] = validation_errors();
				}else{
					$data["error"] = "";
				}
				$data["id"] = $this->input->post('id');
				$data["site_status"] = $this->input->post('site_status');
				$data["application_id"] = $this->input->post('application_id');
				$data["paypal_email"] = $this->input->post('paypal_email');
				$data["paypal_username"] = $this->input->post('paypal_username');
				$data["paypal_password"] = $this->input->post('paypal_password');
				$data["paypal_signature"] = $this->input->post('paypal_signature');
				$data["preapproval"] = $this->input->post('preapproval');
				$data["fees_taken_from"] = $this->input->post('fees_taken_from');
				$data["transaction_fees"] = $this->input->post('transaction_fees');
				$data["gateway_status"] = $this->input->post('gateway_status');
				
				$data["first_name"] = $this->input->post('first_name');
				$data["last_name"] = $this->input->post('last_name');
				$data["email"] = $this->input->post('email');
				
				$data["donate_limit"] = $this->input->post('donate_limit');
				
				$data['site_setting'] = $this->home_model->select_site_setting();
				
				
				if($this->input->post('offset')=="")
				{
					$limit = '5';
					$totalRows = $this->transaction_type_model->get_total_paypal_count();
					$data["offset"] = (int)($totalRows/$limit)*$limit;
				}else{
					$data["offset"] = $this->input->post('offset');
				}
				$this->template->write('title', 'Paypal Adaptive Payment Gateway', '', TRUE);
				$this->template->write_view('header', 'header', $data, TRUE);
				$this->template->write_view('main_content', 'add_paypal', $data, TRUE);
				$this->template->write_view('footer', 'footer', '', TRUE);
				$this->template->render();
			}else{
				
				$verify ='done';
				if($this->input->post('test_update')){
					$verify = $this->verify_paypal();
				}
				
				if($verify=='done'){
					if($this->input->post('id'))
					{
						$this->transaction_type_model->paypal_update();
						$msg = "update";
					}else{
						$this->transaction_type_model->paypal_insert();
						$msg = "insert";
					}
					$offset = $this->input->post('offset');
					redirect('transaction_type/list_paypal/'.$offset.'/'.$msg);
				}else{
				
					$data["error"] = $verify;
					$data["id"] = $this->input->post('id');
					$data["site_status"] = $this->input->post('site_status');
					$data["application_id"] = $this->input->post('application_id');
					$data["paypal_email"] = $this->input->post('paypal_email');
					$data["paypal_username"] = $this->input->post('paypal_username');
					$data["paypal_password"] = $this->input->post('paypal_password');
					$data["paypal_signature"] = $this->input->post('paypal_signature');
					$data["preapproval"] = $this->input->post('preapproval');
					$data["fees_taken_from"] = $this->input->post('fees_taken_from');
					$data["transaction_fees"] = $this->input->post('transaction_fees');
					$data["gateway_status"] = $this->input->post('gateway_status');
					
					$data["first_name"] = $this->input->post('first_name');
					$data["last_name"] = $this->input->post('last_name');
					$data["email"] = $this->input->post('email');
					
					$data["donate_limit"] = $this->input->post('donate_limit');
					
					$data['site_setting'] = $this->home_model->select_site_setting();
					
					
					if($this->input->post('offset')=="")
					{
						$limit = '5';
						$totalRows = $this->transaction_type_model->get_total_paypal_count();
						$data["offset"] = (int)($totalRows/$limit)*$limit;
					}else{
						$data["offset"] = $this->input->post('offset');
					}
					$this->template->write('title', 'Paypal Adaptive Payment Gateway', '', TRUE);
					$this->template->write_view('header', 'header', $data, TRUE);
					$this->template->write_view('main_content', 'add_paypal', $data, TRUE);
					$this->template->write_view('footer', 'footer', '', TRUE);
					$this->template->render();
				
				}	
			}				
		}

	
	function edit_paypal($id=0,$offset=0)
	{
		
		$check_rights=$this->home_model->get_rights('list_paypal');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		
		
		$one_paypal = $this->transaction_type_model->get_one_paypal($id);
		$data["error"] = "";
		$data["id"] = $id;
		$data["site_status"] = $one_paypal['site_status'];
		$data["application_id"] = $one_paypal['application_id'];
		$data["paypal_email"] = $one_paypal['paypal_email'];
		$data["paypal_username"] = $one_paypal['paypal_username'];
		$data["paypal_password"] = $one_paypal['paypal_password'];
		$data["paypal_signature"] = $one_paypal['paypal_signature'];
		$data["preapproval"] = $one_paypal['preapproval'];
		$data["fees_taken_from"] = $one_paypal['fees_taken_from'];
		$data["transaction_fees"] = $one_paypal['transaction_fees'];
		$data["gateway_status"] = $one_paypal['gateway_status'];
		
		$data["first_name"] = 'rakesh';
		$data["last_name"] = 'patel';
		$data["email"] = 'rakesh007_patel@yahoo.co.in';
		
		$data["donate_limit"] = $one_paypal['donate_limit'];
				
		$site_setting = $this->home_model->select_site_setting();
		$data['auto_target_achive'] = $site_setting['auto_target_achive'];
		
		$data['site_setting'] = $site_setting;
		$data["offset"] = $offset;
		$this->template->write('title', 'Paypal Adaptive Payment Gateway', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'add_paypal', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}
	
	function delete_paypal($id=0,$offset=0)
	{
		$check_rights=$this->home_model->get_rights('list_paypal');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		$this->db->delete('paypal',array('id'=>$id));
		redirect('transaction_type/list_paypal/'.$offset.'/delete');
	}

	
	
	
	/********Amazon********/



	function list_amazon($offset=0,$msg='')
	{
		
		$check_rights=$this->home_model->get_rights('list_amazon');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		
		$this->load->library('pagination');

		$limit = '5';
		
		$config['base_url'] = site_url('transaction_type/list_amazon/');
		$config['total_rows'] = $this->transaction_type_model->get_total_amazon_count();
		$config['per_page'] = $limit;		
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();
		
		$data['result'] = $this->transaction_type_model->get_amazon_result($offset, $limit);
		$data['msg'] = $msg;
		$data['offset'] = $offset;
		
		
		$data['site_setting'] = $this->home_model->select_site_setting();
		
		
		$this->template->write('title', 'Amazon Payment Gateway', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'list_amazon', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}


	function add_amazon()
	{
		$check_rights=$this->home_model->get_rights('list_amazon');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		
			
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('site_status', 'Site Status', 'required');
			$this->form_validation->set_rules('aws_access_key_id', 'Access Key Id', 'required');
			$this->form_validation->set_rules('aws_secret_access_key', 'Secret Access Key', 'required');
			//$this->form_validation->set_rules('preapproval', 'Preapproval', 'required');
			$this->form_validation->set_rules('gateway_status', 'Gateway Status', 'required');
			$this->form_validation->set_rules('variable_fees', 'Variable Fees', 'required');
			$this->form_validation->set_rules('fixed_fees', 'Fixed Fees', 'required');
			
			if($this->form_validation->run() == FALSE){			
				if(validation_errors())
				{
					$data["error"] = validation_errors();
				}else{
					$data["error"] = "";
				}
				$data["id"] = $this->input->post('id');
				$data["site_status"] = $this->input->post('site_status');
				$data["aws_access_key_id"] = $this->input->post('aws_access_key_id');
				$data["aws_secret_access_key"] = $this->input->post('aws_secret_access_key');
				$data["variable_fees"] = $this->input->post('variable_fees');
				$data["fixed_fees"] = $this->input->post('fixed_fees');
				$data["preapproval"] = $this->input->post('preapproval');
				$data["gateway_status"] = $this->input->post('gateway_status');
				
				if($this->input->post('offset')=="")
				{
					$limit = '5';
					$totalRows = $this->transaction_type_model->get_total_amazon_count();
					$data["offset"] = (int)($totalRows/$limit)*$limit;
				}else{
					$data["offset"] = $this->input->post('offset');
				}
				
				$data['site_setting'] = $this->home_model->select_site_setting();
				
				$this->template->write('title', 'Amazon Payment Gateway', '', TRUE);
				$this->template->write_view('header', 'header', $data, TRUE);
				$this->template->write_view('main_content', 'add_amazon', $data, TRUE);
				$this->template->write_view('footer', 'footer', '', TRUE);
				$this->template->render();
			}else{
				if($this->input->post('id'))
				{
					$this->transaction_type_model->amazon_update();
					$msg = "update";
				}else{
					$this->transaction_type_model->amazon_insert();
					$msg = "insert";
				}
				$offset = $this->input->post('offset');
				redirect('transaction_type/list_amazon/'.$offset.'/'.$msg);
			}				
		}

	
	function edit_amazon($id=0,$offset=0)
	{
		
		$check_rights=$this->home_model->get_rights('list_amazon');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		
		
		$one_amazon = $this->transaction_type_model->get_one_amazon($id);
		$data["error"] = "";
		$data["id"] = $id;
		$data["site_status"] = $one_amazon['site_status'];
		$data["aws_access_key_id"] = $one_amazon['aws_access_key_id'];
		$data["aws_secret_access_key"] = $one_amazon['aws_secret_access_key'];
		$data["variable_fees"] = $one_amazon['variable_fees'];
		$data["fixed_fees"] = $one_amazon['fixed_fees'];
		$data["preapproval"] = $one_amazon['preapproval'];
		$data["gateway_status"] = $one_amazon['gateway_status'];
		
		$data['site_setting'] = $this->home_model->select_site_setting();
		
		
		$data["offset"] = $offset;
		$this->template->write('title', 'Amazon Payment Gateway', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'add_amazon', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}
	
	function delete_amazon($id=0,$offset=0)
	{
		$check_rights=$this->home_model->get_rights('list_amazon');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		$this->db->delete('amazon',array('id'=>$id));
		redirect('transaction_type/list_amazon/'.$offset.'/delete');
	}

	
	
	
	
	/************** Reports *************/
	
	
	
	function delete_transaction($id=0,$offset=0)
	{
		$this->db->delete('transaction',array('transaction_id'=>$id));
		redirect('transaction_type/list_transaction/'.$offset.'/delete');
	}
	
	function list_transaction($limit=15,$offset=0,$msg='')
	{
		$check_rights=$this->home_model->get_rights('list_transaction');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		$this->load->library('pagination');

		//$limit = '15';
		$config['uri_segment']='4';
		$config['base_url'] = site_url('transaction_type/list_transaction/'.$limit.'/');
		$config['total_rows'] = $this->transaction_type_model->get_total_transaction_count();
		$config['per_page'] = $limit;		
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();
		
		$data['site_setting'] = $this->home_model->select_site_setting();
		
		$data['result'] = $this->transaction_type_model->get_transaction_result($offset, $limit);
		$data['msg'] = $msg;
		$data['offset'] = $offset;
		
		$data['limit']=$limit;
		$data['option']='';
		$data['keyword']='';
		$data['search_type']='normal';
			
		$this->template->write('title', 'Transactions', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'list_transaction', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}

	function search_transaction_list($limit=20,$option='',$keyword='',$offset=0,$msg='')
	{		
		$check_rights=$this->home_model->get_rights('list_transaction');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		$this->load->library('pagination');

		//$limit = '15';
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
		
		//$keyword=str_replace('"','',str_replace(array("'",",","%","$","&","*","#","@","(",")",":",";",">","<","/"),'',trim($keyword)));
	
	if($option != "pay")
		{
		  $keyword=str_replace('"','',str_replace(array("'",",","%","$","&","*","#","@","(",")",":",";",">","<","/"),'',trim($keyword)));
	    }
	
		$config['uri_segment']='6';
		$config['base_url'] = site_url('transaction_type/search_transaction_list/'.$limit.'/'.$option.'/'.$keyword.'/');
		$config['total_rows'] = $this->transaction_type_model->get_total_search_transaction_count($option,$keyword);
		$config['per_page'] = $limit;		
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();
		
		
		
		$data['site_setting'] = $this->home_model->select_site_setting();
		$data['msg'] = $msg;
		$data['offset'] = $offset;
		
		$data['result'] = $this->transaction_type_model->get_search_transaction_result($option,$keyword,$offset, $limit);
		//print_r($config['total_rows']);die();
		
		
		$data['limit'] = $limit;
		$data['option']=$option;
		$data['keyword']=$keyword;
		
		$data['search_type']='search';
		
		
		
		$this->template->write('title', 'Search Transactions List', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'list_transaction',$data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	
	
	}
	
	
	
	
	/************** Reports *************/
		
	
	function transaction_report($limit=15,$offset=0,$msg='')
	{
		$check_rights=$this->home_model->get_rights('list_transaction');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		
		$this->load->library('pagination');

		//$limit = '15';
		$config['uri_segment']='4';
		$config['base_url'] = site_url('transaction_type/transaction_report/'.$limit);
		$config['total_rows'] = $this->transaction_type_model->get_total_transaction_count();
		$config['per_page'] = $limit;		
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();
		
		$data['site_setting'] = $this->home_model->select_site_setting();
		
		$data['result'] = $this->transaction_type_model->get_transaction_result($offset, $limit);
		$data['msg'] = $msg;
		$data['limit'] = $limit;
		$data['offset'] = $offset;
		$data['search_type']='normal';
		
	
		$data['option']='';
		$data['keyword']='';
	
			
		$this->template->write('title', 'Transactions Report', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'transaction_report', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}
	
	function search_transaction_report($limit=20,$option='',$keyword='',$offset=0,$msg='')
	{
		
		$check_rights=$this->home_model->get_rights('list_transaction');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		$this->load->library('pagination');

		//$limit = '15';
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
		if($option != "pay")
		{
		  $keyword=str_replace('"','',str_replace(array("'",",","%","$","&","*","#","@","(",")",":",";",">","<","/"),'',trim($keyword)));
	    }
		$config['uri_segment']='6';
		$config['base_url'] = site_url('transaction_type/search_transaction_report/'.$limit.'/'.$option.'/'.$keyword.'/');
		$config['total_rows'] = $this->transaction_type_model->get_total_search_transaction_count($option,$keyword);
		$config['per_page'] = $limit;		
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();
		
		$data['site_setting'] = $this->home_model->select_site_setting();
		
		$data['result'] = $this->transaction_type_model->get_search_transaction_result($option,$keyword,$offset, $limit);
		//print_r($config['total_rows']);die();
		$data['msg'] = $msg;
		$data['limit'] = $limit;
		$data['offset'] = $offset;
		$data['search_type']='search';
		//$data['limit']=$limit;
		$data['option']=$option;
		$data['keyword']=$keyword;
		//$data['search_type']='search';
			
		$this->template->write('title', 'Search Transactions Report', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'transaction_report', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	
	
	}
	
	
	
	
	
/***********************/


	function add_transaction_type()
	{
		
			
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('transaction_type_name', 'Transaction Type Name', 'required');
		if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();
			}else{
				$data["error"] = "";
			}
			$data["transaction_type_id"] = $this->input->post('transaction_type_id');
			$data["transaction_type_name"] = $this->input->post('transaction_type_name');
			if($this->input->post('offset')=="")
			{
				$limit = '5';
				$totalRows = $this->transaction_type_model->get_total_transaction_type_count();
				$data["offset"] = (int)($totalRows/$limit)*$limit;
			}else{
				$data["offset"] = $this->input->post('offset');
			}
			
			$data['site_setting'] = $this->home_model->select_site_setting();
			
			$this->template->write('title', 'Transaction Type', '', TRUE);
			$this->template->write_view('header', 'header', $data, TRUE);
			$this->template->write_view('main_content', 'add_transaction_type', $data, TRUE);
			$this->template->write_view('footer', 'footer', '', TRUE);
			$this->template->render();
		}else{
			if($this->input->post('transaction_type_id'))
			{
				$this->transaction_type_model->transaction_type_update();
				$msg = "update";
			}else{
				$this->transaction_type_model->transaction_type_insert();
				$msg = "insert";
			}
			$offset = $this->input->post('offset');
			redirect('transaction_type/list_transaction_type/'.$offset.'/'.$msg);
		}				
	}
	
	function edit_transaction_type($id=0,$offset=0)
	{
		$one_transaction_type = $this->transaction_type_model->get_one_transaction_type($id);
		$data["error"] = "";
		$data["transaction_type_id"] = $id;
		$data["transaction_type_name"] = $one_transaction_type['transaction_type_name'];
		$data["offset"] = $offset;
		
		$data['site_setting'] = $this->home_model->select_site_setting();
		
		$this->template->write('title', 'Transaction Type', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'add_transaction_type', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}
	
	function delete_transaction_type($id=0,$offset=0)
	{
		$this->db->delete('transaction_type',array('transaction_type_id'=>$id));
		redirect('transaction_type/list_transaction_type/'.$offset.'/delete');
	}
	
	function list_transaction_type($offset=0,$msg='')
	{
		$this->load->library('pagination');

		$limit = '5';
		
		$config['base_url'] = site_url('transaction_type/list_transaction_type/');
		$config['total_rows'] = $this->transaction_type_model->get_total_transaction_type_count();
		$config['per_page'] = $limit;		
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();
		
		$data['result'] = $this->transaction_type_model->get_transaction_type_result($offset, $limit);
		$data['msg'] = $msg;
		$data['offset'] = $offset;
		
		$data['site_setting'] = $this->home_model->select_site_setting();
		
		$this->template->write('title', 'Transaction Type', '', TRUE);
		$this->template->write_view('header', 'header',$data, TRUE);
		$this->template->write_view('main_content', 'list_transaction_type', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}
	
	////////=======verify user paypal email address by adaptive paypal features
	
	function verify_paypal()
	{
		
		$data['msg']='';
		$verify='no';
		
			
			
			 $paypal=get_adaptive_paypal_detail();
			 
				//////////=================Get PAYPAL SETTING  FROM DATABASE 	================
				$application_id = $this->input->post('application_id');
				$api_username = $this->input->post('paypal_username');
				$api_password = $this->input->post('paypal_password');	
				$api_key =  $this->input->post('paypal_signature');
				
				
				if($paypal->site_status=='sandbox')
				{
				
					$dbend_point='https://svcs.sandbox.paypal.com/';	
					$db_paypalurl='https://www.sandbox.paypal.com/webscr&cmd=';
				
				}
				
				elseif($paypal->site_status=='live')
				{
				
					$dbend_point='https://svcs.paypal.com/';	
					$db_paypalurl='https://www.paypal.com/webscr&cmd=';
				
				}
				else
				{	
					$dbend_point='https://svcs.sandbox.paypal.com/';	
					$db_paypalurl='https://www.sandbox.paypal.com/webscr&cmd=';		
				}
				/////////////===========Action Type===========
				
				/// Whether the Pay request pays the receiver or whether the Pay request is set up to create a payment requesbut not fulfill the payment until the Execute Pay request is called.
				//Allowable values are:
				
				//////=******************
				
				///=== 1)PAY     Use this option if you are not using the Pay request in combinations with the ExecutePayment request.
				
				///=== 2)CREATE    Use this option to set up the payment instructions with the SetPaymentOptions request and then execute the payment at a later time with the ExecutePayment request.
				
				///=== 3)PAY_PRIMARY     For chained payments only, specify this value to delay payments to the secondary receivers; only the payment to the primary receiver is processed
				
				
						$actionType='PAY';
				
				
				////////********************************************==============================****************================/////////////
					/*=========Called by CallerService.php.
					****************************************************/
					/**
					# API user: The user that is identified as making the call. you can
					# also use your own API username that you created on PayPal’s sandbox
					# or the PayPal live site
					*/
					
					define('API_USERNAME', $api_username);
					
					/**
					# API_password: The password associated with the API user
					# If you are using your own API username, enter the API password that
					# was generated by PayPal below
					# IMPORTANT - HAVING YOUR API PASSWORD INCLUDED IN THE MANNER IS NOT
					# SECURE, AND ITS ONLY BEING SHOWN THIS WAY FOR TESTING PURPOSES
					*/
					
					define('API_PASSWORD',$api_password );
					
					/**
					# API_Signature:The Signature associated with the API user. which is generated by paypal.
					*/
					
					define('API_SIGNATURE',$api_key);
					
					/**
					# Endpoint: this is the server URL which you have to connect for submitting your API request.
					*/
					
					define('API_ENDPOINT',$dbend_point );
					
					
					
					/**
					USE_PROXY: Set this variable to TRUE to route all the API requests through proxy.
					like define('USE_PROXY',TRUE);
					*/
					define('USE_PROXY',FALSE);
					/**
					PROXY_HOST: Set the host name or the IP address of proxy server.
					PROXY_PORT: Set proxy port.
					
					PROXY_HOST and PROXY_PORT will be read only if USE_PROXY is set to TRUE
					*/
					define('PROXY_HOST', '127.0.0.1');
					define('PROXY_PORT', '808');
					
					
					// Ack related and Header constants
					define('ACK_SUCCESS', 'SUCCESS');
					define('ACK_SUCCESS_WITH_WARNING', 'SUCCESSWITHWARNING');
					define('APPLICATION_ID', $application_id);
					define('DEVICE_ID','mydevice');
					define('PAYPAL_REDIRECT_URL', $db_paypalurl );
					define('DEVELOPER_PORTAL', 'https://developer.paypal.com');
					define('LOGFILENAME', '../Log/logdata.log');
					define('DEVICE_IPADDRESS', $_SERVER['REMOTE_ADDR']);
					//This SDK supports only Name Value(NV) Request and Response Data Formats. for XML,SOAP,JSON use the SOAP SDK from X.com
					define('REQUEST_FORMAT','NV');
					define('RESPONSE_FORMAT','NV');
					define('X_PAYPAL_REQUEST_SOURCE','PHP_NVP_SDK_V1.1');
			
					
					// all the PayPal Header parameters are set in lib/callerservice.php
					
					
					$this->load->library('NVP_SampleConstants');
					
					$NVP_SampleConstants = new NVP_SampleConstants();
					
					
					/////=================par receipt file header part================ 
					
					try {
			
							$request_array= array
							(
								RequestEnvelope::$requestEnvelopeErrorLanguage=> 'en_US',
								GetVerifiedStatus::$emailAddress=>$this->input->post('email'),
								GetVerifiedStatus::$firstName=> $this->input->post('first_name'),
								GetVerifiedStatus::$lastName=> $this->input->post('last_name'),
								GetVerifiedStatus::$matchCriteria=> 'NAME',
							);
			
				
							 $nvpStr=http_build_query($request_array, '', '&');
							/* Make the call to PayPal to get the Status of the account. If an error occured, show the
							 resulting errors
							 Note: if the confirmation type is none then no need of redirecting
							 */
			
							$resArray=$NVP_SampleConstants->hash_call('AdaptiveAccounts/GetVerifiedStatus',$nvpStr);
							log_message('error',"VERIFY PAYPAL DATA:".$resArray);
							//print_r($resArray);die();
							/* Display the API response back to the browser.
							 If the response from PayPal was a success, display the response parameters'
							 If the response was an error, display the errors received using APIError.php.
							 */
							 
							$ack = strtoupper($resArray['responseEnvelope.ack']);
						
							if($ack!="SUCCESS")
							{
								$verify='no';
							}
							else
							{
								/*foreach($resArray as $key => $value) 
								{    			
    									echo "<p> $key: $value</p>";
    							}	
       							*/
								$verify='yes';
								
							}
							
							
				   
					}
		
					catch(Exception $ex) 
					{
						throw new Exception('Error occurred in GetVerifiedStatusReceipt method');
						$verify='no';
						
					}
					////////////////==============
					
			 
			 /////////===============dn=b insert
			 if($verify=='yes') { 
			
				$verify_error='done';
			}
			else
			{
				$verify_error='<p>PayPal Varification process failed. See the below PayPal response :<br><br>PayPal Response : '.$resArray['error(0).errorId'].'-'.$resArray['error(0).message'].'</p>'; 
			}
			
			
		return $verify_error;
	
	}
	
}
?>