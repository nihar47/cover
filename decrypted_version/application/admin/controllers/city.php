<?php
class City extends CI_Controller {
	function City()
	{
		parent::__construct();
		$this->load->model('city_model');
		$this->load->model('home_model');
		
	}
	
	function index()
	{
		redirect('city/list_city/');
	}
	
	function add_city($limit=20)
	{
		
		
		$check_rights=$this->home_model->get_rights('list_city');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('city_name', 'City Name', 'required|alpha_space');
		$this->form_validation->set_rules('country_id', 'Country', 'required');
		$this->form_validation->set_rules('state_id', 'State', 'required');
		
		if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();
			}else{
				$data["error"] = "";
			}
			$data["city_id"] = $this->input->post('city_id');
			$data["country_id"] = $this->input->post('country_id');
			$data["state_id"] = $this->input->post('state_id');
			$data["city_name"] = $this->input->post('city_name');
			//$data["latitude"] = $this->input->post('latitude');
		//	$data["longitude"] = $this->input->post('longitude');
			//$data["timezone"] = $this->input->post('timezone');
			//$data["county"] = $this->input->post('county');
		//	$data["code"] = $this->input->post('code');
			$data["active"] = $this->input->post('active');
			$data['state'] = $this->city_model->get_state_result();
			$data['country'] = $this->city_model->get_country_result();
			if($this->input->post('offset')=="")
			{
				$limit = '15';
				$totalRows = $this->city_model->get_total_city_count();
				$data["offset"] = (int)($totalRows/$limit)*$limit;
			}else{
				$data["offset"] = $this->input->post('offset');
			}
			
			$data['site_setting'] = $this->home_model->select_site_setting();
			
			$this->template->write('title', 'Cities', '', TRUE);
			$this->template->write_view('header', 'header', $data , TRUE);
			$this->template->write_view('main_content', 'add_city', $data, TRUE);
			$this->template->write_view('footer', 'footer', '', TRUE);
			$this->template->render();
		}else{
			if($this->input->post('city_id'))
			{
				$this->city_model->city_update();
				$msg = "update";
			}else{
				$this->city_model->city_insert();
				$msg = "insert";
			}
			$offset = $this->input->post('offset');
			redirect('city/list_city/'.$limit.'/'.$offset.'/'.$msg);
		}				
	}
	
	function edit_city($id=0,$offset=0)
	{
		$check_rights=$this->home_model->get_rights('list_city');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		$one_city = $this->city_model->get_one_city($id);
		$data["error"] = "";
		$data["city_id"] = $id;
		$data["country_id"] = $one_city['country_id'];
		$data["state_id"] = $one_city['state_id'];
		$data["city_name"] = $one_city['city_name'];
		//$data["latitude"] = $one_city['latitude'];
		//$data["longitude"] = $one_city['longitude'];
		//$data["timezone"] = $one_city['timezone'];
		//$data["county"] = $one_city['county'];
		//$data["code"] = $one_city['code'];
		$data["active"] = $one_city['active'];
		$data["offset"] = $offset;
		$data['state'] = $this->city_model->get_state_result();
		$data['country'] = $this->city_model->get_country_result();
		
		$data['site_setting'] = $this->home_model->select_site_setting();
		
		$this->template->write('title', 'Cities', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'add_city', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}
	
	function delete_city($id=0,$offset=0)
	{
		$limit=20;
		$check_rights=$this->home_model->get_rights('list_city');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		$this->db->delete('city',array('city_id'=>$id));
		redirect('city/list_city/'.$limit.'/'.$offset.'/delete');
	}
	
	function list_city($limit='20',$offset=0,$msg='')
	{
		$check_rights=$this->home_model->get_rights('list_city');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		$this->load->library('pagination');

		$config['uri_segment']='4';
		$config['base_url'] = site_url('city/list_city/'.$limit.'/');
		$config['total_rows'] = $this->city_model->get_total_city_count();
		$config['per_page'] = $limit;		
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();
		
		$data['result'] = $this->city_model->get_city_result($offset, $limit);
		$data['msg'] = $msg;
		$data['offset'] = $offset;
		$data['limit']=$limit;
		$data['option']='';
		$data['keyword']='';
		$data['search_type']='normal';
		
		$data['site_setting'] = $this->home_model->select_site_setting();
		
		$this->template->write('title', 'Cities', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'list_city', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}
	
	
	function search_list_city($limit=20,$option='',$keyword='',$offset=0,$msg='')
	{
		
		$check_rights=$this->home_model->get_rights('list_faq');
		
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
		$config['base_url'] = site_url('city/search_list_city/'.$limit.'/'.$option.'/'.$keyword.'/');
		$config['total_rows'] = $this->city_model->get_total_search_city_count($option,$keyword);
		$config['per_page'] = $limit;		
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();
		
		$data['result'] = $this->city_model->get_search_city_result($option,$keyword,$offset, $limit);
		$data['msg'] = $msg;
		$data['offset'] = $offset;
		
		
		//$data['statelist']=$this->project_category_model->get_state();
		
		$data['site_setting'] = $this->home_model->select_site_setting();
		
		$data['limit']=$limit;
		$data['option']=$option;
		$data['keyword']=$keyword;
		$data['search_type']='search';
		
		$this->template->write('title', 'Search City', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content','list_city', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}
	
}
?>