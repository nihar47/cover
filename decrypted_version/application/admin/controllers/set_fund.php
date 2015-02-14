<?php
class Set_fund extends CI_Controller {
	function Set_fund()
	{
		parent::__construct();
		$this->load->model('set_fund_model');
		$this->load->model('user_model');
		$this->load->model('home_model');
		
		
	}
	
	function index()
	{
		
		redirect('set_fund/list_project');
	}
	
	
	///////////////////////==========================================*************************************************==========================
	
	function serch_user($uid='',$msg='')
	{
		//echo $uid;	
		//exit;
		$check_rights=$this->home_model->get_rights('set_fund');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		$data['result']="";
		$limit=20;
		$offset=0;
		
		if($uid !="")
		{
		   
		    $config['total_rows'] = $this->set_fund_model->get_serch_user($uid);
			 $data['result'] = $this->set_fund_model->search_user($limit,$offset,$uid);
			
			
		}
		
		$this->load->library('pagination');
		

    	if($_POST)
		{		
			 $keyword=$this->input->post('keyword');
			 $config['total_rows'] = $this->set_fund_model->get_serch_user($keyword);
			 $data['result'] = $this->set_fund_model->search_user($limit,$offset,$keyword);
			 
			
			
		}
		else{
			 $config['total_rows'] = $this->set_fund_model->get_serch_user();
			 $data['result'] = $this->set_fund_model->search_user($limit,$offset);
		}
		
		 
		$config['uri_segment']='4';
		$config['base_url'] = site_url('set_fund/serch_user/'.$uid.'/');
	    $config['per_page'] = $limit;		
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();
		$data['msg'] = $msg;
		$data['offset'] = $offset;
		
		
		
		
		$data['limit']=$limit;
		$data['option']='';
		$data['keyword']='';
		$data['search_type']='normal';
		
		$data['site_setting'] = $this->home_model->select_site_setting();
		
		
		
		$this->template->write('title', 'Set Fund', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'set_fund_user', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}
   function add_fund($uid='')
	{
	
	     $check_rights=$this->home_model->get_rights('set_fund');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
	    $this->load->library('form_validation');
		
		$this->form_validation->set_rules('add_fund', 'Add Fund', 'required');
		$this->form_validation->set_rules('reason', 'Reason', 'required');
		
		$data['amount']=$this->set_fund_model->user_wallet_amount($uid);	
		$data['userid']=$uid;
		$data['site_setting'] = $this->home_model->select_site_setting();
		
		$amount_err='';
		//echo $this->input->post('add_fund');die();
		if($_POST){
			if($this->input->post('add_fund') <= 0){
				$amount_err="<p>Please enter amount greator than zero</p>";
			}
		}
		$data["error"] = "";
		if($this->form_validation->run() == FALSE || $amount_err!=''){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();
			}else{
				$data["error"] = "";
			} 
		}
	
		 $data["error"] .= $amount_err; 
		
		if($_POST)
		{	
		   	if($data["error"]==''){
					$wallet=array(
				
					'debit'=>$this->input->post('add_fund'),
					'reason'  =>$this->input->post('reason'),
					'user_id'=>$this->input->post('userid'),
					'donate_status'=>'1',
					'wallet_transaction_id'=>'Admin',
					'wallet_payee_email'=>'Internal',
					'admin_status'=>'Confirm',
					'wallet_ip'=>$_SERVER['REMOTE_ADDR']
					
				
				);		
					 
					 $this->db->insert('wallet',$wallet);
					 
					 redirect('set_fund/serch_user/'.$this->input->post('userid').'/add');
			 }
	     }		 
		
		
			$this->template->write('title', 'Add Fund', '', TRUE);
			$this->template->write_view('header', 'header', $data, TRUE);
			$this->template->write_view('main_content', 'add_fund', $data, TRUE);
			$this->template->write_view('footer', 'footer', '', TRUE);
			$this->template->render();
	
	
}

function deduct_fund($uid='')
	{
	    $check_rights=$this->home_model->get_rights('set_fund');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
	    $this->load->library('form_validation');
		
		$this->form_validation->set_rules('deduct_fund', 'Deduct Fund', 'required');
		$this->form_validation->set_rules('reason', 'Reason', 'required');
		
		$data['amount']=$this->set_fund_model->user_wallet_amount($uid);	
		$data['userid']=$uid;
	
		//$data['site_setting']['currency_symbol'].$data['amount']
		$data['site_setting'] = $this->home_model->select_site_setting();
		
		$amount_err='';
		$data["error"] = "";
		if($_POST){
		
			if($this->input->post('deduct_fund') > $data['amount']){
				$amount_err="<p>You cannot deduct amount greator than ".$data['site_setting']['currency_symbol'].$data['amount']."</p>";
			}
			if($this->input->post('deduct_fund') <= 0){
				$amount_err="<p>Amount should be greator than zero.</p>";
			}
		}
		
		
		if($this->form_validation->run() == FALSE || $amount_err!=''){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();
			}else{
				$data["error"] = "";
			} 
	}
	
		 $data["error"] .= $amount_err; 
		
		if($_POST)
		{	
				if($data["error"]==''){
						$wallet=array(
					
						'credit'=>$this->input->post('deduct_fund'),
						'reason'  =>$this->input->post('reason'),
						'user_id'=>$this->input->post('userid'),
						'donate_status'=>'1',
						'wallet_transaction_id'=>'Admin',
						'wallet_payee_email'=>'Internal',
						'admin_status'=>'Confirm',
						'wallet_ip'=>$_SERVER['REMOTE_ADDR']
						
					
					);		
						 
						 $this->db->insert('wallet',$wallet);
						 
						 redirect('set_fund/serch_user/'.$this->input->post('userid').'/deduct');
				}	 
	     }		 
		
		
			$this->template->write('title', 'Add Fund', '', TRUE);
			$this->template->write_view('header', 'header', $data, TRUE);
			$this->template->write_view('main_content', 'deduct_fund', $data, TRUE);
			$this->template->write_view('footer', 'footer', '', TRUE);
			$this->template->render();
	
	
}

}
?>