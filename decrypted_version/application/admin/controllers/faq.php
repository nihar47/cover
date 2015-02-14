<?php
class Faq extends CI_Controller {
	
	function Faq()
	{
		parent::__construct();
		$this->load->model('faq_model');
		$this->load->model('home_model');
		
	}
	
	function index()
	{
		redirect('faq/list_faq');
	}
	
	
	
	
	function action_faq()
	{
		$limit=20;
		$check_rights=$this->home_model->get_rights('list_faq');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		
		$offset=$this->input->post('offset');
		$action=$this->input->post('action');
		$faq_id=$this->input->post('chk');
		
		
		
		
		if($action=='delete')
		{	
			foreach($faq_id as $id)
			{				
				$this->db->query("delete from faq where faq_id='".$id."'");	
			}
			
			redirect('faq/list_faq/'.$limit.'/'.$offset.'/delete');
		}
		
		if($action=='active')
		{	
			foreach($faq_id as $id)
			{			
	
				$this->db->query("update faq set active=1 where faq_id='".$id."'");				
			}
			
			redirect('faq/list_faq/'.$limit.'/'.$offset.'/active');
		}
		
		if($action=='inactive')
		{
			foreach($faq_id as $id)
			{
	
				$this->db->query("update faq set active=0 where faq_id='".$id."'");			
			}
			
			redirect('faq/list_faq/'.$limit.'/'.$offset.'/inactive');
		}
		
		if($action=='help_page')
		{	
			foreach($faq_id as $id)
			{
				$this->db->query("update faq set faq_home=1 where faq_id='".$id."'");				
			}
			
			redirect('faq/list_faq/'.$limit.'/'.$offset.'/help_page');
		}
		
		
		if($action=='not_help_page')
		{	
			foreach($faq_id as $id)
			{			
				
				$this->db->query("update faq set faq_home=0 where faq_id='".$id."'");				
			}
			
			redirect('faq/list_faq/'.$limit.'/'.$offset.'/not_help_page');
		}
		
		
	
	}

	
	function add_faq($limit=20,$offset=0,$msg='')
	{
		
		$check_rights=$this->home_model->get_rights('list_faq');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('faq_category_id', 'FAQ Category', 'required');
		$this->form_validation->set_rules('question', 'Question', 'required');
		$this->form_validation->set_rules('answer', 'Answer', 'required');
		if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();
			}else{
				$data["error"] = "";
			}
			$data["faq_id"] = $this->input->post('faq_id');
			$data["faq_category_id"] = $this->input->post('faq_category_id');
			$data["question"] = $this->input->post('question');
			$data["answer"] = $this->input->post('answer');
			$data["active"] = $this->input->post('active');
			$data['faq_home']=$this->input->post('faq_home');
			$data['faq_order']=$this->input->post('faq_order');
			
			if($this->input->post('offset')=="")
			{
				$limit = '20';
				$totalRows = $this->faq_model->get_total_faq_count();
				$data["offset"] = (int)($totalRows/$limit)*$limit;
			}else{
				$data["offset"] = $this->input->post('offset');
			}
			$data['site_setting'] = $this->home_model->select_site_setting();
			$data['category'] = $this->faq_model->get_faq_category();
			$this->template->write('title', 'FAQ', '', TRUE);
			$this->template->write_view('header', 'header', $data, TRUE);
			$this->template->write_view('main_content', 'add_faq', $data, TRUE);
			$this->template->write_view('footer', 'footer', '', TRUE);
			$this->template->render();
		}else{
			if($this->input->post('faq_id'))
			{
				$this->faq_model->faq_update();
				$msg = "update";
			}else{
				$this->faq_model->faq_insert();
				$msg = "insert";
			}
			$offset = $this->input->post('offset');
			redirect('faq/list_faq/'.$limit.'/'.$offset.'/'.$msg);
		}				
	}
	
	function edit_faq($id=0,$offset=0)
	{
		$check_rights=$this->home_model->get_rights('list_faq');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		$one_faq = $this->faq_model->get_one_faq($id);
		$data["error"] = "";
		$data["faq_id"] = $id;
		$data["faq_category_id"] = $one_faq['faq_category_id'];
		$data["question"] = $one_faq['question'];
		$data["answer"] = $one_faq['answer'];
		$data["active"] = $one_faq['active'];
		$data['faq_home']=$one_faq['faq_home'];
		$data['faq_order']=$one_faq['faq_order'];
		$data["offset"] = $offset;
		$data['site_setting'] = $this->home_model->select_site_setting();
		$data['category'] = $this->faq_model->get_faq_category();
		$this->template->write('title', 'FAQ', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'add_faq', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}
	
	function delete_faq($id=0,$offset=0)
	{
		$check_rights=$this->home_model->get_rights('list_faq');
		$limit=20;
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		$this->db->delete('faq',array('faq_id'=>$id));
		redirect('faq/list_faq/'.$limit.'/'.$offset.'/delete');
	}
	
	function list_faq($limit='20',$offset=0,$msg='')
	{
		
		$check_rights=$this->home_model->get_rights('list_faq');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		
		$this->load->library('pagination');
		$config['uri_segment']='4';
		$config['base_url'] = site_url('faq/list_faq/'.$limit.'/');
		$config['total_rows'] = $this->faq_model->get_total_faq_count();
		$config['per_page'] = $limit;		
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();
		$data['site_setting'] = $this->home_model->select_site_setting();
		$data['result'] = $this->faq_model->get_faq_result($offset, $limit);
		$data['msg'] = $msg;
		$data['offset'] = $offset;
		$data['limit']=$limit;
		$data['option']='';
		$data['keyword']='';
		$data['search_type']='normal';
		$this->template->write('title', 'FAQ', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'list_faq', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}
	
	
	function search_list_faq($limit=20,$option='',$keyword='',$offset=0,$msg='')
	{
		
		$check_rights=$this->home_model->get_rights('list_faq');
		
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
		$config['base_url'] = site_url('faq/search_list_faq/'.$limit.'/'.$option.'/'.$keyword.'/');
		$config['total_rows'] = $this->faq_model->get_total_search_faq_count($option,$keyword);
		$config['per_page'] = $limit;		
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();
		
		$data['result'] = $this->faq_model->get_search_faq_result($option,$keyword,$offset, $limit);
		$data['msg'] = $msg;
		$data['offset'] = $offset;
		
		
		//$data['statelist']=$this->project_category_model->get_state();
		
		$data['site_setting'] = $this->home_model->select_site_setting();
		
		$data['limit']=$limit;
		$data['option']=$option;
		$data['keyword']=$keyword;
		$data['search_type']='search';
		
		$this->template->write('title', 'Search FAQ Category', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'list_faq', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}
	
}
?>