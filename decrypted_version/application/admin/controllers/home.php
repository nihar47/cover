<?php
class Home extends CI_Controller {
	function Home()
	{
		parent::__construct();
		//echo "test";
		$this->load->model('home_model'); 		//echo "load";
		$this->load->model('graph_model');
	}
	
	function index($ln='')
	{
		//error_reporting('all');
		$data['login'] = $ln;
		$this->template->write('title', 'Login', '', TRUE);
		$this->template->write_view('header', 'login_header', '', TRUE);
		$this->template->write_view('main_content', 'login', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}
	
	function check_login()
	{
		$login = $this->home_model->is_login();
		if($login == '1')
		{
			redirect("home/dashboard");
		}else{
			redirect("home/index/0");
		}
	}
	
	
	
	
	function forgot_password()
	{
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		
		if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();
			}else{
				$data["error"] = "";
			}
					
		
		
		
		$this->template->write('title', 'Forgot Password', '', TRUE);
		$this->template->write_view('header', 'login_header', '', TRUE);
		$this->template->write_view('main_content', 'forgot_password', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
		
		
		}
		
		else
		{
		
			$chk_mail=$this->home_model->forgot_email();
			
			if($chk_mail==0)
			{
					
				$data['error']='email_not_found';
				
				$this->template->write('title', 'Forgot Password', '', TRUE);
				$this->template->write_view('header', 'login_header', '', TRUE);
				$this->template->write_view('main_content', 'forgot_password', $data, TRUE);
				$this->template->write_view('footer', 'footer', '', TRUE);
				$this->template->render();
			
			}
			elseif($chk_mail==2)
			{
				$data['error']='record_not_found';	
				$this->template->write('title', 'Forgot Password', '', TRUE);
				$this->template->write_view('header', 'login_header', '', TRUE);
				$this->template->write_view('main_content', 'forgot_password', $data, TRUE);
				$this->template->write_view('footer', 'footer', '', TRUE);
				$this->template->render();
			
			}
			else
			{
				$data['error']='success';	
				$this->template->write('title', 'Forgot Password', '', TRUE);
				$this->template->write_view('header', 'login_header', '', TRUE);
				$this->template->write_view('main_content', 'forgot_password', $data, TRUE);
				$this->template->write_view('footer', 'footer', '', TRUE);
				$this->template->render();
			
			}
			
		
		}
		
		
		
		
	}
	
	function dashboard($msg='user', $offset=0)
	{
	
		if($msg=='project') {
		
		 $assign_rights=$this->home_model->get_rights('list_project');
		
				if(	$assign_rights==0) {			
					redirect('home/dashboard/no_rights');	
				}
		
		}
		
		$this->load->library('pagination');
		$limit = '8';
		$config['base_url'] = site_url('home/dashboard/'.$msg.'/');
		$config['total_rows'] = $this->home_model->get_latest_project_count();
		$config['per_page'] = $limit;	
		$config['uri_segment'] = '4';	
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();
		$data['latest_project'] = $this->home_model->get_latest_project($offset, $limit);
		$data['offset'] = $offset;
		$data['msg'] = $msg;
		
		$data['site_setting'] = $this->home_model->select_site_setting();
		$data['completed_project'] = $this->home_model->get_project();
		$data['posted_project'] = $this->home_model->get_posted_project();
		$data['live_project'] = $this->home_model->get_live_project();
		//$data['latest_project'] = $this->home_model->get_latest_project();
		$data['users'] = $this->home_model->get_users();
		$data['customer'] = $this->home_model->get_customer();
		$data['total_project_posted'] = $this->home_model->get_total_project_posted();
		$data['total_pending_project'] = $this->home_model->get_total_pending_project();
		$data['total_completed_project'] = $this->home_model->get_total_completed_project();
		$data['total_earned'] = $this->home_model->get_total_earned();
		$data['total_earned_month'] = $this->home_model->get_total_earned_month();
		$data['total_earned_week'] = $this->home_model->get_total_earned_week();
		$data['total_earned_today'] = $this->home_model->get_total_earned_today();
		$data['total_lost'] = $this->home_model->get_total_lost();
		$data['total_lost_month'] = $this->home_model->get_total_lost_month();
		$data['total_lost_week'] = $this->home_model->get_total_lost_week();
		$data['total_lost_today'] = $this->home_model->get_total_lost_today();
		$data['total_pipeline'] = $this->home_model->get_total_pipeline();
		$data['total_pipeline_month'] = $this->home_model->get_total_pipeline_month();
		$data['total_pipeline_week'] = $this->home_model->get_total_pipeline_week();
		$data['total_pipeline_today'] = $this->home_model->get_total_pipeline_today();
		
		$date=date('Y-m-d');
		$week_first_date= get_first_day_of_week($date);
		$week_last_date= get_last_day_of_week($date);	
		$data['week_first_date']=$week_first_date;
		$data['week_last_date']=$week_last_date;
		
		$data['weekly_registration']=$this->graph_model->get_weekly_registration($week_first_date,$week_last_date);		
		$data['weekly_fb_registration']=$this->graph_model->get_weekly_fb_registration($week_first_date,$week_last_date);
		$data['weekly_tw_registration']=$this->graph_model->get_weekly_tw_registration($week_first_date,$week_last_date);
		
		$data['weekly_projects']=$this->graph_model->get_weekly_projects($week_first_date,$week_last_date);		
		$data['weekly_projects_success']=$this->graph_model->get_weekly_projects_success($week_first_date,$week_last_date);
		$data['weekly_projects_active']=$this->graph_model->get_weekly_projects_active($week_first_date,$week_last_date);		
		$data['weekly_projects_new']=$this->graph_model->get_weekly_projects_new($week_first_date,$week_last_date);		
	
		
		
		$this->template->write('title', 'Dashboard', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'dashboard', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}
	
	
	function logout()
	{
		$this->session->sess_destroy();
		redirect("home/index/1");
	}
	
	function my_account()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('username', 'Name', 'required');
		if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();
			}else{
				$data["error"] = "";
			}
			if($this->input->post('admin_id'))
			{
				$data["admin_id"] = $this->input->post('admin_id');
				$data["username"] = $this->input->post('username');
				$data["password"] = $this->input->post('password');
				$data["email"] = $this->input->post('email');
				
			}else{
				$my_account = $this->home_model->get_my_account($this->session->userdata('admin_id'));
				$data["admin_id"] = $my_account['admin_id'];
				$data["username"] = $my_account['username'];
				$data["password"] = $my_account['password'];
				$data["email"] = $my_account['email'];
			}
			
			$data['site_setting'] = $this->home_model->select_site_setting();
			
			$this->template->write('title', 'My Account', '', TRUE);
			$this->template->write_view('header', 'header', $data, TRUE);
			$this->template->write_view('main_content', 'my_account', $data, TRUE);
			$this->template->write_view('footer', 'footer', '', TRUE);
			$this->template->render();
		}else{
			$this->home_model->my_account_update();
			$data["error"] = "suceess";
			$data["admin_id"] = $this->input->post('admin_id');
			$data["username"] = $this->input->post('username');
			$data["password"] = $this->input->post('password');
			$data["email"] = $this->input->post('email');
			
			$data['site_setting'] = $this->home_model->select_site_setting();
			
			$this->template->write('title', 'My Account', '', TRUE);
			$this->template->write_view('header', 'header', $data, TRUE);
			$this->template->write_view('main_content', 'my_account', $data, TRUE);
			$this->template->write_view('footer', 'footer', '', TRUE);
			$this->template->render();
		}				
	}
	
	
	function comments($id,$offset=0,$msg='')
	{
		$this->load->library('pagination');

		$limit = '20';
		
		$config['base_url'] = site_url('home/comments/'.$id);
		$config['total_rows'] = $this->home_model->get_total_project_comment_count($id);
		$config['per_page'] = $limit;		
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();
		
		$data['result'] = $this->home_model->get_project_comment_result($id,$offset, $limit);
		$data['msg'] = $msg;
		$data['offset'] = $offset;
		
		$data['site_setting'] = $this->home_model->select_site_setting();
		
		$this->template->write('title', 'Project Comments', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'project_list_comment', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}
	
	
}
?>