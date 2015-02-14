<?php
class Country extends CI_Controller {
	function Country()
	{
		parent::__construct();
		$this->load->model('country_model');
		$this->load->model('home_model');
			
	}
	
	function index()
	{
		redirect('country/list_country/');
	}
	
	function add_country($limit=20)
	{
		
		$check_rights=$this->home_model->get_rights('list_country');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('country_name', 'Country Name', 'required|alpha_space');
		if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();
			}else{
				$data["error"] = "";
			}
			$data["country_id"] = $this->input->post('country_id');
			$data["country_name"] = $this->input->post('country_name');
			/*$data["fips"] = $this->input->post('fips');
			$data["iso2"] = $this->input->post('iso2');
			$data["iso3"] = $this->input->post('iso3');
			$data["ison"] = $this->input->post('ison');
			$data["internet"] = $this->input->post('internet');
			$data["capital"] = $this->input->post('capital');
			$data["map_ref"] = $this->input->post('map_ref');
			$data["singular"] = $this->input->post('singular');
			$data["plural"] = $this->input->post('plural');
			$data["currency"] = $this->input->post('currency');
			$data["currency_code"] = $this->input->post('currency_code');
			$data["population"] = $this->input->post('population');
			$data["title"] = $this->input->post('title');
			$data["comment"] = $this->input->post('comment');*/
			$data["active"] = $this->input->post('active');
			if($this->input->post('offset')=="")
			{
				$limit = '15';
				$totalRows = $this->country_model->get_total_country_count();
				$data["offset"] = (int)($totalRows/$limit)*$limit;
			}else{
				$data["offset"] = $this->input->post('offset');
			}
			
			$data['site_setting'] = $this->home_model->select_site_setting();
			
			$this->template->write('title', 'Countries', '', TRUE);
			$this->template->write_view('header', 'header', $data, TRUE);
			$this->template->write_view('main_content', 'add_country', $data, TRUE);
			$this->template->write_view('footer', 'footer', '', TRUE);
			$this->template->render();
		}else{
			if($this->input->post('country_id'))
			{
				$this->country_model->country_update();
				$msg = "update";
			}else{
				$this->country_model->country_insert();
				$msg = "insert";
			}
			$offset = $this->input->post('offset');
			redirect('country/list_country/'.$limit.'/'.$offset.'/'.$msg);
		}				
	}
	
	function edit_country($id=0,$offset=0)
	{
		$check_rights=$this->home_model->get_rights('list_country');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		$one_country = $this->country_model->get_one_country($id);
		$data["error"] = "";
		$data["country_id"] = $id;
		$data["country_name"] = $one_country['country_name'];
		/*$data["fips"] = $one_country['fips'];
		$data["iso2"] = $one_country['iso2'];
		$data["iso3"] = $one_country['iso3'];
		$data["ison"] = $one_country['ison'];
		$data["internet"] = $one_country['internet'];
		$data["capital"] = $one_country['capital'];
		$data["map_ref"] = $one_country['map_ref'];
		$data["singular"] = $one_country['singular'];
		$data["plural"] = $one_country['plural'];
		$data["currency"] = $one_country['currency'];
		$data["currency_code"] = $one_country['currency_code'];
		$data["population"] = $one_country['population'];
		$data["title"] = $one_country['title'];
		$data["comment"] = $one_country['comment'];*/
		$data["active"] = $one_country['active'];
		$data["offset"] = $offset;
		
		$data['site_setting'] = $this->home_model->select_site_setting();
		
		$this->template->write('title', 'Countries', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'add_country', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}
	
	function delete_country($id=0,$offset=0)
	{
		$check_rights=$this->home_model->get_rights('list_country');
		$limit=20;
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		$this->db->delete('country',array('country_id'=>$id));
		redirect('country/list_country/'.$limit.'/'.$offset.'/delete');
	}
	
	function list_country($limit='20',$offset=0,$msg='')
	{
		
		$check_rights=$this->home_model->get_rights('list_country');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		
		
		$this->load->library('pagination');

		$config['uri_segment']='4';
		$config['base_url'] = site_url('country/list_country/'.$limit.'/');
		$config['total_rows'] = $this->country_model->get_total_country_count();
		$config['per_page'] = $limit;		
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();
		
		$data['result'] = $this->country_model->get_country_result($offset, $limit);
		$data['msg'] = $msg;
		$data['offset'] = $offset;
		$data['limit']=$limit;
		$data['option']='';
		$data['keyword']='';
		$data['search_type']='normal';
		
		$data['site_setting'] = $this->home_model->select_site_setting();
		
		$this->template->write('title', 'Countries', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'list_country', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}
	
	function search_list_country($limit=20,$option='',$keyword='',$offset=0,$msg='')
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
		$config['base_url'] = site_url('country/search_list_country/'.$limit.'/'.$option.'/'.$keyword.'/');
		$config['total_rows'] = $this->country_model->get_total_search_country_count($option,$keyword);
		$config['per_page'] = $limit;		
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();
		
		$data['result'] = $this->country_model->get_search_country_result($option,$keyword,$offset, $limit);
		$data['msg'] = $msg;
		$data['offset'] = $offset;
		
		
		//$data['statelist']=$this->project_category_model->get_state();
		
		$data['site_setting'] = $this->home_model->select_site_setting();
		
		$data['limit']=$limit;
		$data['option']=$option;
		$data['keyword']=$keyword;
		$data['search_type']='search';
		
		$this->template->write('title', 'Search Country', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'list_country', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}
	
}
?>