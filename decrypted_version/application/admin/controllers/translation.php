<?php
class Translation extends CI_Controller {
	function Translation()
	{
		parent::__construct();
		$this->load->model('translation_model');
		
	}
	
	function index()
	{}
	
	function add_translation()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('language', 'Language', 'required');
		if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();
			}else{
				$data["error"] = "";
			}
			$data["translation_id"] = $this->input->post('translation_id');
			$data["language"] = $this->input->post('language');
			$data["task"] = "translation";
			if($this->input->post('offset')=="")
			{
				$limit = '5';
				$totalRows = $this->translation_model->get_total_translation_count();
				$data["offset"] = (int)($totalRows/$limit)*$limit;
			}else{
				$data["offset"] = $this->input->post('offset');
			}
			$this->template->write('title', 'Translations', '', TRUE);
			$this->template->write_view('header', 'header', '', TRUE);
			$this->template->write_view('main_content', 'add_translation', $data, TRUE);
			$this->template->write_view('footer', 'footer', '', TRUE);
			$this->template->render();
		}else{
			if($this->input->post('translation_id'))
			{
				$this->translation_model->translation_update();
				$msg = "update";
			}else{
				$this->translation_model->translation_insert();
				$msg = "insert";
			}
			$offset = $this->input->post('offset');
			redirect('translation/list_translation/'.$offset.'/'.$msg);
		}				
	}
	
	function add_text()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('key', 'Key', 'required');
		if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();
			}else{
				$data["error"] = "";
			}
			$data["key_id"] = $this->input->post('key_id');
			$data["key"] = $this->input->post('key');
			$data["task"] = "text";
			$data["translations"] = $this->translation_model->get_all_translation();
			if($this->input->post('offset')=="")
			{
				$limit = '5';
				$totalRows = $this->translation_model->get_total_translation_count();
				$data["offset"] = (int)($totalRows/$limit)*$limit;
			}else{
				$data["offset"] = $this->input->post('offset');
			}
			$this->template->write('title', 'Translations', '', TRUE);
			$this->template->write_view('header', 'header', '', TRUE);
			$this->template->write_view('main_content', 'add_translation', $data, TRUE);
			$this->template->write_view('footer', 'footer', '', TRUE);
			$this->template->render();
		}else{
			if($this->input->post('key_id'))
			{
				//$this->translation_model->translation_update();
				//$msg = "update";
			}else{
				$this->translation_model->translation_key_insert();
				$msg = "insert";
			}
			$offset = $this->input->post('offset');
			redirect('translation/list_translation/'.$offset.'/'.$msg);
		}				
	}
	
	function edit_translation($id=0,$offset=0,$offset2=0)
	{
		$this->load->library('pagination');
		$limit = '20';
		$config['base_url'] = site_url('translation/edit_translation/'.$id.'/'.$offset.'/');
		$config['total_rows'] = $this->translation_model->get_total_key_count($id);
		$config['per_page'] = $limit;
		$config['uri_segment'] = 5;
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();
		
		$one_translation = $this->translation_model->get_one_translation($id);
		$data["all_key"] = $this->translation_model->get_all_key($id,$offset2,$limit);
		$data["error"] = "";
		$data["translation_id"] = $id;
		$data["offset2"] = $offset2;
		$data["language"] = $one_translation['language'];
		$data["offset"] = $offset;
		$data["task"] = $offset;
		$this->template->write('title', 'Translations', '', TRUE);
		$this->template->write_view('header', 'header', '', TRUE);
		$this->template->write_view('main_content', 'add_translation', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}
	
	function edit_text()
	{
		$limit = '20';
		//if($this->input->post('key_id'))
		//{
			$this->translation_model->translation_text_update($limit);
			$msg = "update";
		//}
		$offset = $this->input->post('offset');
		redirect('translation/list_translation/'.$offset.'/'.$msg);
						
	}
	
	function delete_translation($id=0,$offset=0)
	{
		$this->db->delete('translation',array('translation_id'=>$id));
		redirect('translation/list_translation/'.$offset.'/delete');
	}
	
	function list_translation($offset=0,$msg='')
	{
		$this->load->library('pagination');

		$limit = '5';
		
		$config['base_url'] = site_url('translation/list_translation/');
		$config['total_rows'] = $this->translation_model->get_total_translation_count();
		$config['per_page'] = $limit;		
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();
		
		$data['result'] = $this->translation_model->get_translation_result($offset, $limit);
		$data['msg'] = $msg;
		$data['offset'] = $offset;
		$this->template->write('title', 'Translations', '', TRUE);
		$this->template->write_view('header', 'header', '', TRUE);
		$this->template->write_view('main_content', 'list_translation', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}	
}
?>