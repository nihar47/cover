<?php
class Requests extends CI_Controller {
	function Requests()
	{
		parent::__construct();
		$this->load->model('home_model');
		$this->load->model('requests_model');
	
	}
	
	function index()
	{
		redirect('requests/affiliate_requests/');
		
	}
	function affiliate_requests($limit='20',$offset=0,$msg='')
	{		
		$check_rights=$this->home_model->get_rights('affiliates');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		$this->load->library('pagination');
		$limit = '10';
		$config['base_url'] = site_url('requests/affiliate_requests/'.$limit);
		$config['total_rows'] = $this->requests_model->get_total_request_count();
		$config['per_page'] = $limit;
		$data['result'] = $this->requests_model->get_affiliate_request($offset, $limit);
		
		$this->pagination->initialize($config);
		$data['page_link'] = $this->pagination->create_links();
		
		$data['msg'] = $msg;
		$data['offset'] = $offset;	
		$data['limit']=$limit;
		$data['option']='';
		$data['keyword']='';
		$data['search_type']='normal';
		
		
		
		$data['site_setting'] = $this->home_model->select_site_setting();
		$this->template->write('title', 'Affiliate Requests', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'affiliate/affiliate_requests', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();		
	}
	
	function search_affiliate_requests($limit=20,$option='',$keyword='',$offset=0,$msg='')
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
		$config['base_url'] = site_url('requests/search_affiliate_requests/'.$limit.'/'.$option.'/'.$keyword.'/');
		
		$config['total_rows'] = $this->requests_model->get_total_search_request_count($option,$keyword);
		$config['per_page'] = $limit;		
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();
		
		$data['result'] = $this->requests_model->get_search_request_result($option,$keyword,$offset, $limit);
		$data['msg'] = $msg;
		$data['offset'] = $offset;
		
		
		
		$data['site_setting'] = $this->home_model->select_site_setting();
		
		$data['limit']=$limit;
		$data['option']=$option;
		$data['keyword']=$keyword;
		$data['search_type']='search';
		
		$this->template->write('title', 'Search Affiliate Requests', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'affiliate/affiliate_requests', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}
	
	
	
	function action_request()
	{
		
		$offset=$this->input->post('offset');
		$limit=$this->input->post('limit');
		$action=$this->input->post('action');
		$affiliate_request_id=$this->input->post('chk');
		$search_type=$this->input->post('search_type');
		
		$option=$this->input->post('option');
		$keyword=$this->input->post('keyword');
		
		$red_link='affiliate_requests/'.$limit;
		
		if($search_type=='search')
		{
			$red_link='search_affiliate_requests/'.$limit.'/'.$option.'/'.$keyword;
		}
		
		
		if($action=='delete')
		{	
			foreach($affiliate_request_id as $id)
			{			
				$this->requests_model->delete_request($id);				
			}
			
			redirect('requests/'.$red_link.'/'.$offset.'/delete');
		}
		
		if($action=='approve')
		{	
			foreach($affiliate_request_id as $id)
			{			
				$this->db->where('affiliate_request_id',$id);
				$this->db->update('affiliate_request',array('approved'=>1));			
			}
			
			redirect('requests/'.$red_link.'/'.$offset.'/approve');
		}
		
		if($action=='reject')
		{	
			foreach($affiliate_request_id as $id)
			{			
				$this->db->where('affiliate_request_id',$id);
				$this->db->update('affiliate_request',array('approved'=>2));			
			}
			
			redirect('requests/'.$red_link.'/'.$offset.'/reject');
		}
		
		
		
	}
	
	
	
	
	function add_affiliate_request()
	{
		$check_rights=$this->home_model->get_rights('affiliates');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('site_category', 'Site Category', 'required');
		$this->form_validation->set_rules('site_name', 'Site Name', 'required');
		$this->form_validation->set_rules('site_url', 'Site URL', 'required|valid_url');
		$this->form_validation->set_rules('why_affiliate', 'Why Do You Want An Affiliate?', 'required');
		
		
		
		if($this->form_validation->run() == FALSE){
			if(validation_errors())
			{
				$data["error"] = validation_errors();
			}else{
				$data["error"] = "";
			}
			$data["affiliate_request_id"] = $this->input->post('affiliate_request_id');
			
			
			$one_affiliate_request = $this->requests_model->get_one_affiliate_request($this->input->post('affiliate_request_id'));
		
			$data['one_affiliate_request']=$one_affiliate_request;
			
			
			$data["user_id"] = $this->input->post('user_id');
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
			$data["approved"] = $this->input->post('approved');
			
			$data['categories'] = $this->requests_model->get_category();
			$data['users'] = $this->requests_model->get_users();
			$data["site_setting"] = $this->home_model->select_site_setting();
			
			if($this->input->post('offset')=="")
			{
				$limit = '10';
				$totalRows = $this->requests_model->get_total_request_count();
				$data["offset"] = (int)($totalRows/$limit)*$limit;
			}else{
				$data["offset"] = $this->input->post('offset');
			}
			$this->template->write('title', 'Requests', '', TRUE);
			$this->template->write_view('header', 'header', $data , TRUE);
			$this->template->write_view('main_content', 'affiliate/add_affiliate_request', $data, TRUE);
			$this->template->write_view('footer', 'footer', '', TRUE);
			$this->template->render();
		}else{
			if($this->input->post('affiliate_request_id')){
				$this->requests_model->affiliate_request_update();
				$msg = "update";
			}else{
				$this->requests_model->affiliate_request_insert();
				$msg = "insert";
			}
			$offset = $this->input->post('offset');
			redirect('requests/affiliate_requests/'.$offset.'/'.$msg);
		}				
	}
	
	function edit_affiliate_request($id=0,$offset=0)
	{
		$check_rights=$this->home_model->get_rights('affiliates');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		if($id=='' || $id==0)
		{
			redirect('requests/affiliate_requests/');
		}
		
		$one_affiliate_request = $this->requests_model->get_one_affiliate_request($id);
		
		$data['one_affiliate_request']=$one_affiliate_request;
		
		$data["error"] = "";
		$data["affiliate_request_id"] = $id;
		$data["user_id"] = $one_affiliate_request['user_id'];
		$data["site_category"] = $one_affiliate_request['site_category'];
		$data["site_name"] = $one_affiliate_request['site_name'];
		$data["site_description"] = $one_affiliate_request['site_description'];
		$data["site_url"] = $one_affiliate_request['site_url'];
		$data["why_affiliate"] = $one_affiliate_request['why_affiliate'];
		$data["web_site_marketing"] = $one_affiliate_request['web_site_marketing'];
		$data["search_engine_marketing"] = $one_affiliate_request['search_engine_marketing'];
		$data["email_marketing"] = $one_affiliate_request['email_marketing'];
		$data["special_promotional_method"] = $one_affiliate_request['special_promotional_method'];
		$data["special_promotional_description"] = $one_affiliate_request['special_promotional_description'];
		$data["approved"] = $one_affiliate_request['approved'];
		$data["offset"] = $offset;
		
		$data['categories'] = $this->requests_model->get_category();
		$data['users'] = $this->requests_model->get_users();
		$data["site_setting"] = $this->home_model->select_site_setting();
		$this->template->write('title', 'Requests', '', TRUE);
		$this->template->write_view('header', 'header', $data , TRUE);
		$this->template->write_view('main_content', 'affiliate/add_affiliate_request', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}
	
	function delete_affiliate_request($id=0, $offset=0)
	{
		$check_rights=$this->home_model->get_rights('affiliates');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		$this->db->delete('affiliate_request',array('affiliate_request_id'=>$id));
		redirect('requests/affiliate_requests/'.$offset.'/delete');
	}
	
	
	function change_status($id='',$st='')
	{
		$data = array(
			'approved' => $st,
		);
		$this->db->where('affiliate_request_id',$id);
		$this->db->update('affiliate_request',$data);
		echo $st; die;
	}
	
	
}
?>