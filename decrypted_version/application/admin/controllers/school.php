<?php
class School extends CI_Controller {
	
	function School()
	{
		parent::__construct();
		$this->load->model('school_model');
		$this->load->model('home_model');
		
	}
	
	function index()
	{
		redirect('school/list_school/');
	}
	
	
	function action_school()
	{
		
		$check_rights=$this->home_model->get_rights('list_school');
		$limit=20;
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		
		$offset=$this->input->post('offset');
		$action=$this->input->post('action');
		$school_id=$this->input->post('chk');
		
		
		
		
		if($action=='delete')
		{	
			foreach($school_id as $id)
			{				
				$this->db->query("delete from school where school_id='".$id."'");	
			}
			
			redirect('school/list_school/'.$limit.'/'.$offset.'/delete');
		}
		
		if($action=='active')
		{	
			foreach($school_id as $id)
			{			
	
				$this->db->query("update school set active=1 where school_id='".$id."'");				
			}
			
			redirect('school/list_school/'.$limit.'/'.$offset.'/active');
		}
		
		if($action=='inactive')
		{
			foreach($school_id as $id)
			{
	
				$this->db->query("update school set active=0 where school_id='".$id."'");			
			}
			
			redirect('school/list_school/'.$limit.'/'.$offset.'/inactive');
		}
		
		
		
	
	}
	
	
	function add_school($limit=20)
	{
		
		$check_rights=$this->home_model->get_rights('list_school');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();
			}else{
				$data["error"] = "";
			}
			$data["school_id"] = $this->input->post('school_id');
			$data["title"] = $this->input->post('title');
			$data["school_url_title"] = $this->input->post('school_url_title');
			$data["description"] = $this->input->post('description');
			$data["active"] = $this->input->post('active');
			$data['school_order']=$this->input->post('school_order');
			
			
			
			if($this->input->post('offset')=="")
			{
				$limit = '20';
				$totalRows = $this->school_model->get_total_school_count();
				$data["offset"] = (int)($totalRows/$limit)*$limit;
			}else{
				$data["offset"] = $this->input->post('offset');
			}
			$data['site_setting'] = $this->home_model->select_site_setting();
			$this->template->write('title', 'School', '', TRUE);
			$this->template->write_view('header', 'header', $data, TRUE);
			$this->template->write_view('main_content', 'add_school', $data, TRUE);
			$this->template->write_view('footer', 'footer', '', TRUE);
			$this->template->render();
		}else{
			if($this->input->post('school_id'))
			{
				$this->school_model->school_update();
				$msg = "update";
			}else{
				$this->school_model->school_insert();
				$msg = "insert";
			}
			$offset = $this->input->post('offset');
			redirect('school/list_school/'.$limit.'/'.$offset.'/'.$msg);
		}				
	}
	
	function edit_school($id=0,$offset=0)
	{
		$check_rights=$this->home_model->get_rights('list_school');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		$one_school = $this->school_model->get_one_school($id);
		
		
		
		$content=$one_school['description'];
		$content=str_replace('KSYDOU','"',$content);
		$content=str_replace('KSYSING',"'",$content);
		
		
		
		$data["error"] = "";
		$data["school_id"] = $id;
		$data["title"] = $one_school['title'];
		$data["school_url_title"] = $one_school['school_url_title'];
		$data["description"] = $content;
		$data["active"] = $one_school['active'];
		
		$data['school_order']=$one_school['school_order'];
		
		$data["offset"] = $offset;
		$data['site_setting'] = $this->home_model->select_site_setting();
		$this->template->write('title', 'School', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'add_school', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}
	
	function delete_school($id=0,$offset=0)
	{
		$check_rights=$this->home_model->get_rights('list_school');
		$limit=20;
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		$this->db->delete('school',array('school_id'=>$id));
		redirect('school/list_school/'.$limit.'/'.$offset.'/delete');
	}
	
	function list_school($limit='20',$offset=0,$msg='')
	{
		$check_rights=$this->home_model->get_rights('list_school');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		$this->load->library('pagination');
		$config['uri_segment']='4';
		$config['base_url'] = site_url('school/list_school/'.$limit.'/');
		$config['total_rows'] = $this->school_model->get_total_school_count();
		$config['per_page'] = $limit;		
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();
		$data['site_setting'] = $this->home_model->select_site_setting();
		$data['result'] = $this->school_model->get_school_result($offset, $limit);
		$data['msg'] = $msg;
		$data['offset'] = $offset;
		$data['limit']=$limit;
		$data['option']='';
		$data['keyword']='';
		$data['search_type']='normal';
		$this->template->write('title', 'School', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'list_school', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}
	
	 
	 function search_list_school($limit=20,$option='',$keyword='',$offset=0,$msg='')
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
		$config['base_url'] = site_url('school/search_list_school/'.$limit.'/'.$option.'/'.$keyword.'/');
		$config['total_rows'] = $this->school_model->get_total_search_school_count($option,$keyword);
		$config['per_page'] = $limit;		
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();
		
		$data['result'] = $this->school_model->get_search_school_result($option,$keyword,$offset, $limit);
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
		$this->template->write_view('main_content', 'list_school', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}
	
}
?>