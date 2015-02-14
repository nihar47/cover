<?php
class Demo extends CI_Controller {
		function Demo()
	{	//echo "test";
		parent::__construct();
		$this->load->model('demo_model'); 		//echo "load";
		$this->load->model('home_model');
	}
	
	function index()
	{
	//redirect('demo/list_demo'); 	//error_reporting('all');
		$data['hello'] = "This is list demo"; 
			$data['result'] =$this->demo_model->get_data();  
			$this->template->write('title', 'Login', '', TRUE);
		$this->template->write_view('header', 'header', '', TRUE);
		$this->template->write_view('main_content', 'list_demo', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}
	
	function list_demo(){
		$data['hello'] = "demo"; 
			$this->template->write('title', 'Login', '', TRUE);
		$this->template->write_view('header', 'header', '', TRUE);
		$this->template->write_view('main_content', 'list_demo', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
		}
	}?>