<?php
class Social extends CI_Controller {
	function Social()
	{
		parent::__construct();
		$this->load->model('social_links_model');
		$this->load->model('home_model');
		
	}
	
	function index()
	{ 
		redirect('social/list_social_links'); 
	}
	
	
	
	
	function home_page()
	{
		
		$check_rights=$this->home_model->get_rights('home_page');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('home_description', 'Description', 'required');		
		$this->form_validation->set_rules('home_title', 'Title', 'required');
		
		
		if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();
			}else{
				$data["error"] = "";
			}
			
			if($this->input->post('home_id'))
			{
				$data["home_description"] = $this->input->post('home_description');
				$data["home_title"] = $this->input->post('home_title');
				$data["active"] = $this->input->post('active');				
				$data["home_id"] = $this->input->post('home_id');
				
				
			}else{
				$home_page= $this->db->query("select * from home_page where home_id='1'");
				
				$get_home_page=$home_page->row_array();
				
				$data["home_id"] = $get_home_page['home_id'];
				$data["home_description"] = $get_home_page['home_description'];
				$data["home_title"] = $get_home_page['home_title'];
				$data["active"] = $get_home_page['active'];				
			}
			
			
			$data['site_setting'] = $this->home_model->select_site_setting();
			
			$this->template->write('title', 'Home Page', '', TRUE);
			$this->template->write_view('header', 'header', $data, TRUE);
			$this->template->write_view('main_content', 'home_page', $data, TRUE);
			$this->template->write_view('footer', 'footer', '', TRUE);
			$this->template->render();
			
		}else{
			
		
			$this->db->query("update home_page set home_title='".$this->input->post('home_title')."', home_description='".$this->input->post('home_description')."',active='".$this->input->post('active')."' where home_id='1'");
			
			$data["error"] = "Home Page updated successfully";
			$data["home_description"] = $this->input->post('home_description');
			$data["home_title"] = $this->input->post('home_title');
			$data["active"] = $this->input->post('active');	
			$data["home_id"] = $this->input->post('home_id');
				
			$data['site_setting'] = $this->home_model->select_site_setting();	
				
			$this->template->write('title', 'Home Page', '', TRUE);
			$this->template->write_view('header', 'header', $data, TRUE);
			$this->template->write_view('main_content', 'home_page', $data, TRUE);
			$this->template->write_view('footer', 'footer', '', TRUE);
			$this->template->render();
			
		}				
	}
	
	
	function add_social($limit=20)
	{
		$check_rights=$this->home_model->get_rights('list_social_links');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('title', 'Social Links Title', 'required');
		
		if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();
			}else{
				$data["error"] = "";
			}
			$data["id"] = $this->input->post('id');
			$data["title"] = $this->input->post('title');
			$data["author"] = $this->input->post('author');
			$data["description"] = $this->input->post('description');
			$data["active"] = $this->input->post('active');
			
			if($this->input->post('offset')=="")
			{
				$limit = '10';
				$totalRows = $this->social_links_model->get_total_pages_count();
				$data["offset"] = (int)($totalRows/$limit)*$limit;
			}else{
				$data["offset"] = $this->input->post('offset');
			}
			
			$data['site_setting'] = $this->home_model->select_site_setting();
			
			$this->template->write('title', 'Social Links', '', TRUE);
			$this->template->write_view('header', 'header', $data, TRUE);
			$this->template->write_view('main_content', 'add_social', $data, TRUE);
			$this->template->write_view('footer', 'footer', '', TRUE);
			$this->template->render();
		}else{
			if($this->input->post('id'))
			{
				$this->social_links_model->pages_update();
				$msg = "update";
			}else{
				$this->social_links_model->social_insert();
				$msg = "insert";
			}
			$offset = $this->input->post('offset');
			redirect('social/list_social_links/'.$limit.'/'.$offset.'/'.$msg);
		}				
	}
	
	function edit_social($id=0,$offset=0)
	{
		
		$check_rights=$this->home_model->get_rights('list_social_links');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}

		$one_pages = $this->social_links_model->get_one_pages($id);
		$data["error"] = "";
		$data["id"] = $id;
		$data["title"] = $one_pages['title'];
		$data["author"] = $one_pages['author'];
		$data["description"] = $one_pages['description'];
		$data["active"] = $one_pages['active'];
		$data["offset"] = $offset;
		
	
		
		$data['site_setting'] = $this->home_model->select_site_setting();
		
		$this->template->write('title', 'Social Links', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'add_social', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}
	
	function delete_social($id=0,$offset=0)
	{
		$limit=20;
		$check_rights=$this->home_model->get_rights('list_social_links');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		$this->db->delete('social',array('id'=>$id));
		redirect('social/list_social_links/'.$limit.'/'.$offset.'/delete');
	}
	
	function list_social_links($limit='20',$offset=0,$msg='')
	{
		
		$check_rights=$this->home_model->get_rights('list_social_links');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		
		
		$this->load->library('pagination');

		$config['uri_segment']='4';
		$config['base_url'] = site_url('social/list_social_links/'.$limit.'/');
		$config['total_rows'] = $this->social_links_model->get_total_pages_count();
		$config['per_page'] = $limit;		
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();
		
		$data['result'] = $this->social_links_model->get_pages_result($offset, $limit);
		$data['msg'] = $msg;
		$data['offset'] = $offset;
		$data['limit']=$limit;
		$data['option']='';
		$data['keyword']='';
		$data['search_type']='normal';
		
		$data['site_setting'] = $this->home_model->select_site_setting();
		
		
		$this->template->write('title', 'Social Links', '', TRUE);
		$this->template->write_view('header', 'header',$data, TRUE);
		$this->template->write_view('main_content', 'list_social_links', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}
	
	function search_list_social($limit=20,$option='',$keyword='',$offset=0,$msg='')
	{
		
		$check_rights=$this->home_model->get_rights('list_state');
		
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
		$config['base_url'] = site_url('testimonials/search_list_testimonials/'.$limit.'/'.$option.'/'.$keyword.'/');
		$config['total_rows'] = $this->social_links_model->get_total_search_pages_count($option,$keyword);
		$config['per_page'] = $limit;		
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();
		
		$data['result'] = $this->social_links_model->get_search_pages_result($option,$keyword,$offset, $limit);
		$data['msg'] = $msg;
		$data['offset'] = $offset;
		
		
		//$data['statelist']=$this->project_category_model->get_state();
		
		$data['site_setting'] = $this->home_model->select_site_setting();
		
		$data['limit']=$limit;
		$data['option']=$option;
		$data['keyword']=$keyword;
		$data['search_type']='search';
		
		$this->template->write('title', 'Search State', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'list_social_links', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}
}
?>