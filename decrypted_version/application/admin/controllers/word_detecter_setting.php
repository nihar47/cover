<?php
class Word_detecter_setting extends CI_Controller {
	function Word_detecter_setting()
	{
		parent::__construct();
		$this->load->model('word_detecter_setting_model');
		
	}
	
	function index()
	{}
	
	function add_word_detecter_setting()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('enable_word_detecter', 'Enable Word Detecter', 'required');
		if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();
			}else{
				$data["error"] = "";
			}
			if($this->input->post('word_detecter_setting_id'))
			{
				$data["word_detecter_setting_id"] = $this->input->post('word_detecter_setting_id');
				$data["enable_word_detecter"] = $this->input->post('enable_word_detecter');
				$data["words"] = $this->input->post('words');
			}else{
				$one_word_detecter_setting = $this->word_detecter_setting_model->get_one_word_detecter_setting();
				$data["word_detecter_setting_id"] = $one_word_detecter_setting['word_detecter_setting_id'];
				$data["enable_word_detecter"] = $one_word_detecter_setting['enable_word_detecter'];
				$data["words"] = $one_word_detecter_setting['words'];
			}
			$this->template->write('title', 'Settings', '', TRUE);
			$this->template->write_view('header', 'header', '', TRUE);
			$this->template->write_view('main_content', 'add_word_detecter_setting', $data, TRUE);
			$this->template->write_view('footer', 'footer', '', TRUE);
			$this->template->render();
		}else{
			$this->word_detecter_setting_model->word_detecter_setting_update();
			$data["error"] = "Suspicious word detector settings updated successfully";
			$data["word_detecter_setting_id"] = $this->input->post('word_detecter_setting_id');
			$data["enable_word_detecter"] = $this->input->post('enable_word_detecter');
			$data["words"] = $this->input->post('words');
			$this->template->write('title', 'Settings', '', TRUE);
			$this->template->write_view('header', 'header', '', TRUE);
			$this->template->write_view('main_content', 'add_word_detecter_setting', $data, TRUE);
			$this->template->write_view('footer', 'footer', '', TRUE);
			$this->template->render();
		}				
	}
	
}
?>