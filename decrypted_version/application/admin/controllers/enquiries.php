<?php
class Enquiries extends CI_Controller {
	function Enquiries()
	{
		parent::__construct();
		$this->load->model('enquiries_model');
		$this->load->model('user_model');
		$this->load->model('home_model');
		
		
	}
	
	function index()
	{
		redirect('enquiries/list_enquiries');
	
	}
	

	function list_enquiries($limit=20,$offset=0,$msg='')
	{
		$check_rights=$this->home_model->get_rights('list_enquiries');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		$this->load->library('pagination');

		
		$config['uri_segment']='4';
		$config['base_url'] = site_url('enquiries/list_enquiries/'.$limit.'/');
		$config['total_rows'] = $this->enquiries_model->get_total_enquiries_count();
		$config['per_page'] = $limit;		
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();
		//echo $data['page_link']; die;
		
		
		$data['result'] = $this->enquiries_model->get_enquiries_result($offset, $limit);
	//	echo "<pre>"; print_r($data['result']); die;
		$data['msg'] = $msg;
		$data['offset'] = $offset;
		
		
		
		$data['limit']=$limit;
		$data['option']='';
		$data['keyword']='';
		$data['search_type']='normal';
		
		$data['site_setting'] = $this->home_model->select_site_setting();
		
		$this->template->write('title', 'Enquiries', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'list_enquiries', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}
	
	function search_list_enquiries($limit=20,$option='',$keyword='',$offset=0,$msg='')
	{
		
		$check_rights=$this->home_model->get_rights('list_enquiries');
		
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
		
		$keyword=str_replace('"','',str_replace(array("'",",","%","$","&","*","#","@","(",")",":",";",">","<","/"),'',trim($keyword)));
	
		$config['uri_segment']='6';
		$config['base_url'] = site_url('enquiries/search_list_enquiries/'.$limit.'/'.$option.'/'.$keyword.'/');
		$config['total_rows'] = $this->enquiries_model->get_total_search_enquiries_count($option,$keyword);
		$config['per_page'] = $limit;		
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();
		
		$data['result'] = $this->enquiries_model->get_search_enquiries_result($option,$keyword,$offset, $limit);
		$data['msg'] = $msg;
		$data['offset'] = $offset;
		
		$data['site_setting'] = $this->home_model->select_site_setting();
		
		$data['limit']=$limit;
		$data['option']=$option;
		$data['keyword']=$keyword;
		$data['search_type']='search';
		
		$this->template->write('title', 'Search Enquiries List', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'enquiries/list_enquiries', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}
	
	
	
	function action_enquiries($limit=20)
	{
		$check_rights=$this->home_model->get_rights('list_enquiries');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		
		$offset=$this->input->post('offset');
		$action=$this->input->post('action');
		$inquiry_id=$this->input->post('chk');
		
		if($action=='delete')
		{	
			foreach($inquiry_id as $id)
			{
				$inquiry_detail=$this->db->query("select * from contact_tbl where id='".$id."'");
				$inquiry=$inquiry_detail->row();
				$this->db->query("delete from contact_tbl where id='".$inquiry->id."'");	
			}
				
			redirect('enquiries/list_enquiries/'.$limit.'/'.$offset.'/delete');
		
		}
	
	}
	
	function view_enquiry($enquiry_id)
	{
		
		$check_rights=$this->home_model->get_rights('list_enquiries');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		
		
		$data['error'] = "";
		
		$data['inquiry'] = $this->enquiries_model->get_enquiries_detail($enquiry_id);
		/*echo "<pre>";
		print_r($data['inquiry']);
		die;*/
		
		$data['site_setting'] = $this->home_model->select_site_setting();		
		
		$this->template->write('title', 'View inquiry ', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'view_enquiry', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
		
		
	
	}
	


	
	/*function search_list_project_category($limit=20,$option='',$keyword='',$offset=0,$msg='')
	{
		
		$check_rights=$this->home_model->get_rights('list_project_category');
		
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
		
		//$keyword=str_replace('"','',str_replace(array("'",",","%","$","&","*","#","@","(",")",":",";",">","<","/"),'',trim($keyword)));
	
		$config['uri_segment']='6';
		$config['base_url'] = site_url('project_category/search_list_project_category/'.$limit.'/'.$option.'/'.$keyword.'/');
		$config['total_rows'] = $this->project_category_model->get_total_search_project_category_count($option,$keyword);
		$config['per_page'] = $limit;		
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();
		
		$data['result'] = $this->project_category_model->search_list_project_category($option,$keyword,$offset, $limit);
		$data['msg'] = $msg;
		$data['offset'] = $offset;
		
		
		$data['statelist']=$this->project_category_model->get_state();
		
		$data['site_setting'] = $this->home_model->select_site_setting();
		
		$data['limit']=$limit;
		$data['option']=$option;
		$data['keyword']=$keyword;
		$data['search_type']='search';
		
		$this->template->write('title', 'Search Project Category', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'list_project_category', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}*/
	
	
	
	
	
	
}
?>