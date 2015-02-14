<?php
class Idea extends CI_Controller {
	function Idea()
	{
		parent::__construct();
		$this->load->model('idea_model');
		$this->load->model('home_model');
		
	}
	
	function index()
	{
		redirect('idea/list_idea');
	}
	
	function add_idea($limit=20)
	{
		
		
		$check_rights=$this->home_model->get_rights('list_idea');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('idea_name', 'Idea Title', 'required|alpha_space');
		$this->form_validation->set_rules('idea_description', 'Idea Description', 'required');
		
				
		if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();
			}else{
				$data["error"] = "";
			}
			
			
			
			
			$data["idea_id"] = $this->input->post('idea_id');
			$data["idea_name"] = $this->input->post('idea_name');
			$data["idea_image"] = $this->input->post('idea_image');
			$data["idea_description"] = $this->input->post('idea_description');
			
			$data['site_setting'] = $this->home_model->select_site_setting();
			
			
			$data["active"] = $this->input->post('active');
			if($this->input->post('offset')=="")
			{
				$limit = '10';
				$totalRows = $this->idea_model->get_total_idea_count();
				$data["offset"] = (int)($totalRows/$limit)*$limit;
			}else{
				$data["offset"] = $this->input->post('offset');
			}
			$this->template->write('title', 'Fund Ideas', '', TRUE);
			$this->template->write_view('header', 'header', $data, TRUE);
			$this->template->write_view('main_content', 'add_idea', $data, TRUE);
			$this->template->write_view('footer', 'footer', '', TRUE);
			$this->template->render();
		}else{
		
		$CI =& get_instance();
		$base_path = $CI->config->slash_item('base_path');
		
		
		
		
			if($this->input->post('idea_id'))
			{		
				
				if($_FILES['photo']['name']!="" )
			{
				$config['upload_path'] = $base_path.'upload/idea/';
				$config['allowed_types'] = 'jpg|jpeg|gif|bmp|png';
				//$config['max_size']	= '100';// in KB
				$this->load->library('upload', $config);
			
				if(!$this->upload->do_upload('photo'))
				{
					$error = $this->upload->display_errors();				
				}	
				else
				{
					//Image Resizing
					$config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
					$config['new_image'] = $base_path."upload/idea_thumb/";
					$config['thumb_marker'] = "";
					$config['maintain_ratio'] = FALSE;
					$config['create_thumb'] = TRUE;
					$config['width'] = 58;
					$config['height'] = 64;
					$this->load->library('image_lib', $config);
					if(!$this->image_lib->resize()){
						$error = $this->image_lib->display_errors();				
					}
				}
			}
			
			
				$this->idea_model->idea_update();
				$msg = "update";
			}else{	
				
			
			
			
			
				
			if($_FILES['photo']['name']!="" )
			{
				
				
			
			 	$config['upload_path'] = $base_path.'upload/idea/';
				$config['allowed_types'] = 'jpg|jpeg|gif|bmp';
				//$config['max_size']	= '100';// in KB
				$this->load->library('upload', $config);
				
				
			
				if(!$this->upload->do_upload('photo'))
				{
					echo $error = $this->upload->display_errors();	
							
				}	
				else
				{	
					
					//Image Resizing
					$config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
					$config['new_image'] = $base_path."upload/idea_thumb/";
					$config['thumb_marker'] = "";
					$config['maintain_ratio'] = FALSE;
					$config['create_thumb'] = TRUE;
					$config['width'] = 58;
					$config['height'] = 64;
					$this->load->library('image_lib', $config);
					if(!$this->image_lib->resize()){
						$error = $this->image_lib->display_errors();				
					}
				}
			}
			
			
				$this->idea_model->idea_insert();
				$msg = "insert";
			}
			$offset = $this->input->post('offset');
			redirect('idea/list_idea/'.$limit.'/'.$offset.'/'.$msg);
		}				
	}
	
	function edit_idea($id=0,$offset=0)
	{
		
		$check_rights=$this->home_model->get_rights('list_idea');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		
		
		$one_idea = $this->idea_model->get_one_idea($id);
		$data["error"] = "";
		$data["idea_id"] = $id;
		$data["idea_name"] = $one_idea['idea_name'];
		$data["idea_image"] = $one_idea['idea_image'];
		$data["idea_description"] = $one_idea['idea_description'];
		
		$data['site_setting'] = $this->home_model->select_site_setting();
	
		$data["active"] = $one_idea['active'];
		$data["offset"] = $offset;
		$this->template->write('title', 'Fund Ideas', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'add_idea', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}
	
	function delete_idea($id=0,$offset=0)
	{
		
		$check_rights=$this->home_model->get_rights('list_idea');
		$limit=20;
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		
		$this->db->delete('idea',array('idea_id'=>$id));
		redirect('idea/list_idea/'.$limit.'/'.$offset.'/delete');
	}
	
	function list_idea($limit='20',$offset=0,$msg='')
	{
		$check_rights=$this->home_model->get_rights('list_idea');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		$this->load->library('pagination');

		//$limit = '10';
		$config['uri_segment']='4';
		$config['base_url'] = site_url('idea/list_idea/'.$limit.'/');
		$config['total_rows'] = $this->idea_model->get_total_idea_count();
		$config['per_page'] = $limit;		
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();
		
		$data['site_setting'] = $this->home_model->select_site_setting();
		
		$data['result'] = $this->idea_model->get_idea_result($offset, $limit);
		$data['msg'] = $msg;
		$data['offset'] = $offset;
		$data['limit']=$limit;
		$data['option']='';
		$data['keyword']='';
		$data['search_type']='normal';
		$this->template->write('title', 'Fund Ideas', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'list_idea', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}
	
	function search_list_idea($limit=20,$option='',$keyword='',$offset=0,$msg='')
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
		$config['base_url'] = site_url('idea/search_list_idea/'.$limit.'/'.$option.'/'.$keyword.'/');
		$config['total_rows'] = $this->idea_model->get_total_search_idea_count($option,$keyword);
		$config['per_page'] = $limit;		
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();
		
		$data['result'] = $this->idea_model->get_search_idea_result($option,$keyword,$offset, $limit);
		$data['msg'] = $msg;
		$data['offset'] = $offset;
		
		
		//$data['statelist']=$this->project_category_model->get_state();
		
		$data['site_setting'] = $this->home_model->select_site_setting();
		
		$data['limit']=$limit;
		$data['option']=$option;
		$data['keyword']=$keyword;
		$data['search_type']='search';
		
		$this->template->write('title', 'Search Idea', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'list_idea', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}
	
}
?>