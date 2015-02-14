<?php
class Rights extends CI_Controller {
	function Rights()
	{
		parent::__construct();
		$this->load->model('rights_model');
		$this->load->model('home_model');
		
	}
	
	
	
	function assign_rights($id,$offset=0)
	{
		if($id=='')
		{
			redirect('admin/list_admin');
		}
		
			
			$data['admin_id']=$id;
			$data['offset']=$offset;
		
			$data['assign_rights']=$this->rights_model->get_assign_rights($id);
			$data['rights']=$this->rights_model->get_rights();	
				
			$data['site_setting'] = $this->home_model->select_site_setting();
			
			
			$this->template->write('title', 'Assign Rights', '', TRUE);
			$this->template->write_view('header', 'header', $data, TRUE);
			$this->template->write_view('main_content', 'assign_rights', $data, TRUE);
			$this->template->write_view('footer', 'footer', '', TRUE);
			$this->template->render();
		
	}
	
	function add_rights($id)
	{
		
		$this->rights_model->add_rights();
		
		redirect('admin/list_admin/20/'.$this->input->post('offset').'/rights');
	
	}
	
	
	
}

?>