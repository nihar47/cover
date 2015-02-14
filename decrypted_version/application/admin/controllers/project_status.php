<?php
class Project_status extends CI_Controller {
	function Project_status()
	{
		parent::__construct();
		$this->load->model('project_status_model');
		
	}
	
	function index()
	{}
	
	function add_project_status()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('project_status_name', 'Project Status Name', 'required');
		if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();
			}else{
				$data["error"] = "";
			}
			$data["project_status_id"] = $this->input->post('project_status_id');
			$data["project_status_name"] = $this->input->post('project_status_name');
			if($this->input->post('offset')=="")
			{
				$limit = '5';
				$totalRows = $this->project_status_model->get_total_project_status_count();
				$data["offset"] = (int)($totalRows/$limit)*$limit;
			}else{
				$data["offset"] = $this->input->post('offset');
			}
			$this->template->write('title', 'Project Status', '', TRUE);
			$this->template->write_view('header', 'header', '', TRUE);
			$this->template->write_view('main_content', 'add_project_status', $data, TRUE);
			$this->template->write_view('footer', 'footer', '', TRUE);
			$this->template->render();
		}else{
			if($this->input->post('project_status_id'))
			{
				$this->project_status_model->project_status_update();
				$msg = "update";
			}else{
				$this->project_status_model->project_status_insert();
				$msg = "insert";
			}
			$offset = $this->input->post('offset');
			redirect('project_status/list_project_status/'.$offset.'/'.$msg);
		}				
	}
	
	function edit_project_status($id=0,$offset=0)
	{
		$one_project_status = $this->project_status_model->get_one_project_status($id);
		$data["error"] = "";
		$data["project_status_id"] = $id;
		$data["project_status_name"] = $one_project_status['project_status_name'];
		$data["offset"] = $offset;
		$this->template->write('title', 'Project Status', '', TRUE);
		$this->template->write_view('header', 'header', '', TRUE);
		$this->template->write_view('main_content', 'add_project_status', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}
	
	function delete_project_status($id=0,$offset=0)
	{
		$this->db->delete('project_status',array('project_status_id'=>$id));
		redirect('project_status/list_project_status/'.$offset.'/delete');
	}
	
	function list_project_status($offset=0,$msg='')
	{
		$this->load->library('pagination');

		$limit = '5';
		
		$config['base_url'] = site_url('project_status/list_project_status/');
		$config['total_rows'] = $this->project_status_model->get_total_project_status_count();
		$config['per_page'] = $limit;		
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();
		
		$data['result'] = $this->project_status_model->get_project_status_result($offset, $limit);
		$data['msg'] = $msg;
		$data['offset'] = $offset;
		$this->template->write('title', 'Project Status', '', TRUE);
		$this->template->write_view('header', 'header', '', TRUE);
		$this->template->write_view('main_content', 'list_project_status', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}	
}
?>