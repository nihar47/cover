<?php
class Guide extends CI_Controller {
	function Guide()
	{
		parent::__construct();
		$this->load->model('home_model');
		
	}
	
	function index()
	{ 
		redirect('guide/guidelines'); 
	}
	
	
	
	
	function guidelines()
	{
		
		$check_rights=$this->home_model->get_rights('guidelines');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('guidelines_title', 'Title', 'required');		
		$this->form_validation->set_rules('guidelines_content', 'Content', 'required');
		
		
		if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();
			}else{
				$data["error"] = "";
			}
			
			if($this->input->post('guidelines_id'))
			{
				$data["guidelines_title"] = $this->input->post('guidelines_title');
				$data["guidelines_content"] = $this->input->post('guidelines_content');
				$data["guidelines_meta_title"] = $this->input->post('guidelines_meta_title');
				$data["guidelines_meta_keyword"] = $this->input->post('guidelines_meta_keyword');
				$data["guidelines_meta_description"] = $this->input->post('guidelines_meta_description');			
							
				$data["guidelines_id"] = $this->input->post('guidelines_id');
				
				
			}else{
				$guide= $this->db->query("select * from  guidelines where guidelines_id='1'");
				
				$get_guide=$guide->row_array();
				
				$content=$get_guide['guidelines_content'];
				$content=str_replace('KSYDOU','"',$content);
				$content=str_replace('KSYSING',"'",$content);
				
				$data["guidelines_id"] = $get_guide['guidelines_id'];
				$data["guidelines_title"] = $get_guide['guidelines_title'];
				$data["guidelines_content"] = $content;
				$data["guidelines_meta_title"] = $get_guide['guidelines_meta_title'];	
			
				$data["guidelines_meta_keyword"] = $get_guide['guidelines_meta_keyword'];
				$data["guidelines_meta_description"] = $get_guide['guidelines_meta_description'];
				
							
			}
			
			
			$data['site_setting'] = $this->home_model->select_site_setting();
			
			$this->template->write('title', 'Guidelines', '', TRUE);
			$this->template->write_view('header', 'header', $data, TRUE);
			$this->template->write_view('main_content', 'guidelines', $data, TRUE);
			$this->template->write_view('footer', 'footer', '', TRUE);
			$this->template->render();
			
		}else{
			
		
		$content=$this->input->post('guidelines_content');
		
		$content=str_replace('"','KSYDOU',$content);
		$content=str_replace("'",'KSYSING',$content);
		
			$this->db->query("update guidelines set guidelines_title='".$this->input->post('guidelines_title')."', guidelines_content='".$content."',guidelines_meta_title='".$this->input->post('guidelines_meta_title')."',guidelines_meta_keyword='".$this->input->post('guidelines_meta_keyword')."',guidelines_meta_description='".$this->input->post('guidelines_meta_description')."' where guidelines_id='1'");
			
			
			$data["error"] = "Guidelines updated successfully";
			$data["guidelines_title"] = $this->input->post('guidelines_title');
			$data["guidelines_content"] = $this->input->post('guidelines_content');
			$data["guidelines_meta_title"] = $this->input->post('guidelines_meta_title');
			$data["guidelines_meta_keyword"] = $this->input->post('guidelines_meta_keyword');
			$data["guidelines_meta_description"] = $this->input->post('guidelines_meta_description');			
						
			$data["guidelines_id"] = $this->input->post('guidelines_id');
				
			$data['site_setting'] = $this->home_model->select_site_setting();	
				
			$this->template->write('title', 'Guidelines', '', TRUE);
			$this->template->write_view('header', 'header', $data, TRUE);
			$this->template->write_view('main_content', 'guidelines', $data, TRUE);
			$this->template->write_view('footer', 'footer', '', TRUE);
			$this->template->render();
			
		}				
	}
	
	
	

	
}
?>