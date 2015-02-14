<?php
class Gallery extends CI_Controller {
	function Gallery()
	{
		parent::__construct();
		$this->load->model('gallery_model');
		$this->load->model('home_model');
		
	}
	
	function index()
	{
		redirect('gallery/list_gallery');
		
	}
	
	function add_gallery($limit=20)
	{
		
		$check_rights=$this->home_model->get_rights('list_gallery');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('gallery_name', 'Gallery Name', 'required|alpha');
		
		
		if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();
			}else{
				$data["error"] = "";
			}
			
			
			
			
			$data["gallery_id"] = $this->input->post('gallery_id');
			$data["gallery_name"] = $this->input->post('gallery_name');
				$data["gallery_image"] = $this->input->post('gallery_image');
			
			$data["active"] = $this->input->post('active');
			
			$data['site_setting'] = $this->home_model->select_site_setting();
			
			if($this->input->post('offset')=="")
			{
				//$limit = '10';
				$totalRows = $this->gallery_model->get_total_gallery_count();
				$data["offset"] = (int)($totalRows/$limit)*$limit;
			}else{
				$data["offset"] = $this->input->post('offset');
			}
			$this->template->write('title', 'Colleges', '', TRUE);
			$this->template->write_view('header', 'header', $data, TRUE);
			$this->template->write_view('main_content', 'add_gallery', $data, TRUE);
			$this->template->write_view('footer', 'footer', '', TRUE);
			$this->template->render();
		}else{
		
		$CI =& get_instance();
		$base_path = $CI->config->slash_item('base_path');
		
		
		
		
			if($this->input->post('gallery_id'))
			{		
				
				if($_FILES['photo']['name']!="" )
			{
				$config['upload_path'] = $base_path.'upload/gallery/';
				$config['allowed_types'] = 'jpg|jpeg|gif|bmp';
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
					$config['new_image'] = $base_path."upload/gallery_thumb/";
					$config['thumb_marker'] = "";
					$config['maintain_ratio'] = FALSE;
					$config['create_thumb'] = TRUE;
					$config['width'] = 455;
					$config['height'] = 279;
					$this->load->library('image_lib', $config);
					if(!$this->image_lib->resize()){
						$error = $this->image_lib->display_errors();				
					}
				}
			}
			
			
				$this->gallery_model->gallery_update();
				$msg = "update";
			}else{	
				
				
			if($_FILES['photo']['name']!="" )
			{
			 	$config['upload_path'] = $base_path.'upload/gallery/';
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
					$config['new_image'] = $base_path."upload/gallery_thumb/";
					$config['thumb_marker'] = "";
					$config['maintain_ratio'] = FALSE;
					$config['create_thumb'] = TRUE;
					$config['width'] = 455;
					$config['height'] = 279;
					$this->load->library('image_lib', $config);
					if(!$this->image_lib->resize()){
						$error = $this->image_lib->display_errors();				
					}
				}
			}
			
			
				$this->gallery_model->gallery_insert();
				$msg = "insert";
			}
			
			//$offset = $this->input->post('offset');
			$offset = 0;
			redirect('gallery/list_gallery/'.$limit.'/'.$offset.'/'.$msg);
		}				
	}
	
	function edit_gallery($id=0,$offset=0)
	{
		$check_rights=$this->home_model->get_rights('list_gallery');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		
		$one_gallery = $this->gallery_model->get_one_gallery($id);
		$data["error"] = "";
		$data["gallery_id"] = $id;
		$data["gallery_name"] = $one_gallery['gallery_name'];
		$data["gallery_image"] = $one_gallery['gallery_image'];
	
		$data['site_setting'] = $this->home_model->select_site_setting();
	
		$data["active"] = $one_gallery['active'];
		$data["offset"] = $offset;
		$this->template->write('title', 'Gallery', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'add_gallery', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}
	
	function delete_gallery($id=0,$offset=0)
	{
		$check_rights=$this->home_model->get_rights('list_gallery');
		$limit=20;
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		$this->db->delete('gallery',array('gallery_id'=>$id));
		redirect('gallery/list_gallery/'.$limit.'/'.$offset.'/delete');
	}
	
	function list_gallery($limit='20',$offset=0,$msg='')
	{
		$check_rights=$this->home_model->get_rights('list_gallery');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		$this->load->library('pagination');

		//$limit = '10';
		$config['uri_segment']='4';
		$config['base_url'] = site_url('gallery/list_gallery/'.$limit.'/');
		$config['total_rows'] = $this->gallery_model->get_total_gallery_count();
		$config['per_page'] = $limit;		
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();
		
		
		$data['site_setting'] = $this->home_model->select_site_setting();
		
		$data['result'] = $this->gallery_model->get_gallery_result($offset, $limit);
		$data['msg'] = $msg;
		$data['offset'] = $offset;
		$data['limit']=$limit;
		$data['option']='';
		$data['keyword']='';
		$data['search_type']='normal';
		$this->template->write('title', 'Gallery', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'list_gallery', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}
	function search_list_gallery($limit=20,$option='',$keyword='',$offset=0,$msg='')
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
		$config['base_url'] = site_url('gallery/search_list_gallery/'.$limit.'/'.$option.'/'.$keyword.'/');
		$config['total_rows'] = $this->gallery_model->get_total_search_gallery_count($option,$keyword);
		$config['per_page'] = $limit;		
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();
		
		$data['result'] = $this->gallery_model->get_search_gallery_result($option,$keyword,$offset, $limit);
		$data['msg'] = $msg;
		$data['offset'] = $offset;
		
		
		//$data['statelist']=$this->project_category_model->get_state();
		
		$data['site_setting'] = $this->home_model->select_site_setting();
		
		$data['limit']=$limit;
		$data['option']=$option;
		$data['keyword']=$keyword;
		$data['search_type']='search';
		
		$this->template->write('title', 'Search Galary', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'list_gallery', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}
}
?>