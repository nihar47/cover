<?php
/*********************************************************************************
 * testimonials is the main controller to control all oprations. 
 ********************************************************************************/

class Testimonials extends ROCKERS_Controller {

	function Testimonials(){
		parent::__construct();	
		$this->load->model('home_model');
		$this->load->model('project_model');
		$this->load->model('blog_model');
		$this->load->model('testimonials_model');
		$this->load->library('pagination');
	}
	
    function index($offset=0){	
	   
	     $limit = 10;
		 
		 //config
		 $config['base_url'] = "http://phpserver:8090/indiefilmfunding/decrypted_version/testimonials/";
		 $config['total_rows'] = $this->testimonials_model->find_total(); 
		 $config['per_page'] = 10;		
		 $config['uri_segment']='4';
		 $this->pagination->initialize($config);
	     $data['links'] = $this->pagination->create_links(); 
		 
		 //Data setting
		 $data['list_testimonials'] = $this->testimonials_model->list_testimonials($limit,$offset); ;
		 /*$data['offset'] = $offset;
		 $data['limit'] = $limit;*/
		
		$data['site_setting'] = site_setting();
		$meta = meta_setting();
		$this->home_model->select_text();
		$this->template->write('meta_title','Blog'. $meta['title'], TRUE);
		$this->template->write('meta_description', $meta['meta_description'], TRUE);
		$this->template->write('meta_keyword', $meta['meta_keyword'], TRUE);
		
			if($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1){
				$this->template->set_master_template('iphone/template.php');
				$this->template->write_view('main_content', 'iphone/blog', $data, TRUE);
				$this->template->render();
			}elseif(($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1){
				$this->template->set_master_template('mobile/template.php');
				$this->template->write_view('main_content', 'mobile/blog', $data, TRUE);
				$this->template->render();
			}else{
				if(!check_user_authentication()) {  
					$this->template->write_view('header', 'default/common/header', $data, TRUE);
				} 
				else
				{
					$this->template->write_view('header', 'default/common/header_login', $data, TRUE);
				}
				
				$this->template->write_view('main_content', 'default/testimonials', $data, TRUE);
				$this->template->write_view('footer', 'default/common/footer',$data, TRUE);
				$this->template->render();
			}
	 	
	}
	
}// Class :  Testimonials

?>