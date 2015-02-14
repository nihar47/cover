<?php
class Message extends CI_Controller {
	function Message()
	{
		parent::__construct();
		$this->load->model('message_model');
		$this->load->model('user_model');
		$this->load->model('home_model');
		
		
	}
	
	function index()
	{
		redirect('message/list_message');
	
	}
	

	function list_message($limit=20,$offset=0,$msg='')
	{
		//$msg=unserialize(urldecode($msg));
		
		$check_rights=$this->home_model->get_rights('list_message');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		$this->load->library('pagination');

		
		$config['uri_segment']='4';
		$config['base_url'] = site_url('message/list_message/'.$limit.'/');
		$config['total_rows'] = $this->message_model->get_total_message_count();
		$config['per_page'] = $limit;		
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();
		//echo $data['page_link']; die;
		
		
		$data['result'] = $this->message_model->get_message_result($offset, $limit);
		
		$data['msg'] = $msg;
		$data['offset'] = $offset;
		
		
		
		$data['limit']=$limit;
		$data['option']='';
		$data['keyword']='';
		$data['search_type']='normal';
		
		$data['site_setting'] = $this->home_model->select_site_setting();
		
		$this->template->write('title', 'Messages', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'message/list_message', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}
	
	function search_list_message($limit=20,$option='',$keyword='',$offset=0,$msg='')
	{
		
		$check_rights=$this->home_model->get_rights('list_message');
		
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
		$config['base_url'] = site_url('message/search_list_message/'.$limit.'/'.$option.'/'.$keyword.'/');
		$config['total_rows'] = $this->message_model->get_total_search_message_count($option,$keyword);
		$config['per_page'] = $limit;		
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();
		
		$data['result'] = $this->message_model->get_search_message_result($option,$keyword,$offset, $limit);
		$data['msg'] = $msg;
		$data['offset'] = $offset;
		
		$data['site_setting'] = $this->home_model->select_site_setting();
		
		$data['limit']=$limit;
		$data['option']=$option;
		$data['keyword']=$keyword;
		$data['search_type']='search';
		
		$this->template->write('title', 'Search Message List', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'message/list_message', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}
	
	
	
	function action_message($limit=20)
	{
		$check_rights=$this->home_model->get_rights('list_message');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		
		$offset=$this->input->post('offset');
		$action=$this->input->post('action');
		$message_id=$this->input->post('chk');
		
		
		
		
		if($action=='delete')
		{	
			foreach($message_id as $id)
			{
				$message_detail=$this->db->query("select * from message_conversation where message_id='".$id."'");
				$message=$message_detail->row();
				$this->db->query("delete from message_conversation where message_id='".$message->message_id."'");	
			}
				
			redirect('message/list_message/'.$limit.'/'.$offset.'/delete');
		
	}
	
	}
	
	function view_message($message_id)
	{
		
		$check_rights=$this->home_model->get_rights('list_message');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		
		
		$data['error'] = "";
		
		$data['message'] = $this->message_model->get_message_detail($message_id);
		/*echo "<pre>";
		print_r($data['message']);
		die;*/
		
		$data['one_message'] = $this->message_model->get_one_message($message_id);
		
		$data['site_setting'] = $this->home_model->select_site_setting();		
		
		$this->template->write('title', 'View Message ', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'message/view_message', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
		
		
	
	}
	


	
	function search_list_project_category($limit=20,$option='',$keyword='',$offset=0,$msg='')
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
	}
	
	
	
	
	
	
}
?>