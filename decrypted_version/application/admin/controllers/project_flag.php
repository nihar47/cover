<?php
class Project_flag extends CI_Controller {
	function Project_flag()
	{
		parent::__construct();
		$this->load->model('project_flag_model');
		
	}
	
	function index()
	{}
	
	function add_project_flag()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('project_flag_name', 'Project Flag Name', 'required');
		if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();
			}else{
				$data["error"] = "";
			}
			$data["project_flag_id"] = $this->input->post('project_flag_id');
			$data["project_flag_name"] = $this->input->post('project_flag_name');
			$data["active"] = $this->input->post('active');
			if($this->input->post('offset')=="")
			{
				$limit = '5';
				$totalRows = $this->project_flag_model->get_total_project_flag_count();
				$data["offset"] = (int)($totalRows/$limit)*$limit;
			}else{
				$data["offset"] = $this->input->post('offset');
			}
			$this->template->write('title', 'Project Flag Categories', '', TRUE);
			$this->template->write_view('header', 'header', '', TRUE);
			$this->template->write_view('main_content', 'add_project_flag', $data, TRUE);
			$this->template->write_view('footer', 'footer', '', TRUE);
			$this->template->render();
		}else{
			if($this->input->post('project_flag_id'))
			{
				$this->project_flag_model->project_flag_update();
				$msg = "update";
			}else{
				$this->project_flag_model->project_flag_insert();
				$msg = "insert";
			}
			$offset = $this->input->post('offset');
			redirect('project_flag/list_project_flag/'.$offset.'/'.$msg);
		}				
	}
	
	function edit_project_flag($id=0,$offset=0)
	{
		$one_project_flag = $this->project_flag_model->get_one_project_flag($id);
		$data["error"] = "";
		$data["project_flag_id"] = $id;
		$data["project_flag_name"] = $one_project_flag['project_flag_name'];
		$data["active"] = $one_project_flag['active'];
		$data["offset"] = $offset;
		$this->template->write('title', 'Project Flag Categories', '', TRUE);
		$this->template->write_view('header', 'header', '', TRUE);
		$this->template->write_view('main_content', 'add_project_flag', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}
	
	function delete_project_flag($id=0,$offset=0)
	{
		$this->db->delete('project_flag',array('project_flag_id'=>$id));
		redirect('project_flag/list_project_flag/'.$offset.'/delete');
	}
	
	function list_project_flag($offset=0,$msg='')
	{
		$this->load->library('pagination');

		$limit = '5';
		
		$config['base_url'] = site_url('project_flag/list_project_flag/');
		$config['total_rows'] = $this->project_flag_model->get_total_project_flag_count();
		$config['per_page'] = $limit;		
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();
		
		$data['result'] = $this->project_flag_model->get_project_flag_result($offset, $limit);
		$data['msg'] = $msg;
		$data['offset'] = $offset;
		$this->template->write('title', 'Project Flag Categories', '', TRUE);
		$this->template->write_view('header', 'header', '', TRUE);
		$this->template->write_view('main_content', 'list_project_flag', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}	
}
?>