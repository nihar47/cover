<?php
/*********************************************************************************
 * faq is the main controller to control all oprations. 
 ********************************************************************************/

class Faq extends ROCKERS_Controller {

	function Faq(){
		parent::__construct();	
		$this->load->model('home_model');
		$this->load->model('project_model');
		$this->load->model('blog_model');
		$this->load->model('faq_model');
		$this->load->library('pagination');
	}
	
    function index($offset=0){	
	   
	     $limit = 10;
		 
		 //config
		 $config['base_url'] = "http://phpserver:8090/indiefilmfunding/decrypted_version/faq/";
		 $config['total_rows'] = $this->faq_model->find_total(); 
		 $config['per_page'] = 10;		
		 $config['uri_segment']='4';
		 $this->pagination->initialize($config);
	     $data['links'] = $this->pagination->create_links(); 
		 
		 //Data setting
		 $error='';
		 $data['frm_name']='frmFaq';
		 
		 $this->load->library('form_validation');
		 $this->form_validation->set_rules('Category', CATEGORY, 'required');
		$this->form_validation->set_rules('emailid', YOUR_EMAIL, 'required|valid_email|callback_username_check');
		$this->form_validation->set_rules('question', QUESTION, 'required');
		 
		 $data['list_faq'] = $this->faq_model->list_faq($limit,$offset); 
		 $data['list_faq_catergory'] = $this->faq_model->list_faq_catergory($limit,$offset); 
		
		
		 
		 
		 /*$data['offset'] = $offset;
		 $data['limit'] = $limit;*/
		
		$data['site_setting'] = site_setting();
		$meta = meta_setting();
		$this->home_model->select_text();
		$this->template->write('meta_title','Faq'. $meta['title'], TRUE);
		$this->template->write('meta_description', $meta['meta_description'], TRUE);
		$this->template->write('meta_keyword', $meta['meta_keyword'], TRUE);
		
		$result = get_user_detail($this->session->userdata('user_id'));
	
		 $data['email']=$result['email'];
		 
			if($this->form_validation->run() == FALSE )
			{	
			if(validation_errors())

			{
				$data["error"] = $spam_message.validation_errors().$data['error'];
				
			}
			
			}else{
//				$msg='Test';
				 
				$faq_insert = $this->faq_model->insert_que_faq();
				
			
			 
				if($faq_insert){
			 
						$msg='success';
						
					 	$data['temp_msg']=$msg;
						 
				
				
				}
				
				}
		
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
				
				$this->template->write_view('main_content', 'default/faq', $data, TRUE);
				$this->template->write_view('footer', 'default/common/footer',$data, TRUE);
				$this->template->render();
			}
	 	
	}
	

	
	function send_mail_project_profile()
	{
		
					$message_insert = $this->faq_model->insert_que_faq();
	}
	
	
}// Class :  faq


?>