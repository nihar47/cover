<?php
class Language extends CI_Controller {
	function Language()
	{
		parent::__construct();
		$this->load->model('language_model');
		
	}
	
	function index()
	{}
	
	function add_language()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('language_name', 'Language Name', 'required|alpha');
		if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();
			}else{
				$data["error"] = "";
			}
			$data["language_id"] = $this->input->post('language_id');
			$data["language_name"] = $this->input->post('language_name');
			$data["iso2"] = $this->input->post('iso2');
			$data["iso3"] = $this->input->post('iso3');
			$data["active"] = $this->input->post('active');
			if($this->input->post('offset')=="")
			{
				$limit = '5';
				$totalRows = $this->language_model->get_total_language_count();
				$data["offset"] = (int)($totalRows/$limit)*$limit;
			}else{
				$data["offset"] = $this->input->post('offset');
			}
			$this->template->write('title', 'Languages', '', TRUE);
			$this->template->write_view('header', 'header', '', TRUE);
			$this->template->write_view('main_content', 'add_language', $data, TRUE);
			$this->template->write_view('footer', 'footer', '', TRUE);
			$this->template->render();
		}else{
			if($this->input->post('language_id'))
			{
				$this->language_model->language_update();
				$msg = "update";
			}else{
				$this->language_model->language_insert();
				$msg = "insert";
			}
			$offset = $this->input->post('offset');
			redirect('language/list_language/'.$offset.'/'.$msg);
		}				
	}
	
	function edit_language($id=0,$offset=0)
	{
		$one_language = $this->language_model->get_one_language($id);
		$data["error"] = "";
		$data["language_id"] = $id;
		$data["language_name"] = $one_language['language_name'];
		$data["iso2"] = $one_language['iso2'];
		$data["iso3"] = $one_language['iso3'];
		$data["active"] = $one_language['active'];
		$data["offset"] = $offset;
		$this->template->write('title', 'Languages', '', TRUE);
		$this->template->write_view('header', 'header', '', TRUE);
		$this->template->write_view('main_content', 'add_language', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}
	
	function delete_language($id=0,$offset=0)
	{
		$this->db->delete('language',array('language_id'=>$id));
		redirect('language/list_language/'.$offset.'/delete');
	}
	
	function list_language($offset=0,$msg='')
	{
		$this->load->library('pagination');

		$limit = '5';
		
		$config['base_url'] = site_url('language/list_language/');
		$config['total_rows'] = $this->language_model->get_total_language_count();
		$config['per_page'] = $limit;		
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();
		
		$data['result'] = $this->language_model->get_language_result($offset, $limit);
		$data['msg'] = $msg;
		$data['offset'] = $offset;
		$this->template->write('title', 'Languages', '', TRUE);
		$this->template->write_view('header', 'header', '', TRUE);
		$this->template->write_view('main_content', 'list_language', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}
	
}
?>