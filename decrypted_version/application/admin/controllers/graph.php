<?php
class Graph extends CI_Controller {
	function Graph()
	{
		parent::__construct();
		$this->load->model('home_model');
		$this->load->model('graph_model');
	}
	
	function index()
	{
		
		
		$data=array();
		
		$date=date('Y-m-d');
		
		$week_first_date= get_first_day_of_week($date);
		$week_last_date= get_last_day_of_week($date);	
		
		$data['week_first_date']=$week_first_date;
		$data['week_last_date']=$week_last_date;
		
		$data['weekly_projects']=$this->graph_model->get_weekly_projects($week_first_date,$week_last_date);		
		
		$data['weekly_projects_success']=$this->graph_model->get_weekly_projects_success($week_first_date,$week_last_date);
		$data['weekly_projects_active']=$this->graph_model->get_weekly_projects_active($week_first_date,$week_last_date);		
		$data['weekly_projects_new']=$this->graph_model->get_weekly_projects_new($week_first_date,$week_last_date);		
		
		
	
		$month_first_date = date('Y-m-d', mktime(0, 0, 0, date('m'), 1, date('Y')));
		$month_last_date = date('Y-m-t', mktime(0, 0, 0, date('m'), 1, date('Y')));
		
		$month_first=1;
		$month_last=12;
		
		$data['month_first']=$month_first;
		$data['month_last']=$month_last;		
		
		$data['monthly_projects']=$this->graph_model->get_monthly_projects($month_first,$month_last);		
		
		$data['monthly_projects_success']=$this->graph_model->get_monthly_projects_success($week_first_date,$week_last_date);
		$data['monthly_projects_active']=$this->graph_model->get_monthly_projects_active($week_first_date,$week_last_date);		
		$data['monthly_projects_new']=$this->graph_model->get_monthly_projects_new($week_first_date,$week_last_date);		
		
		
		$year_back = strtotime('-2 years');
		$year_forward = strtotime('+2 years');
		
		$year_first=date('Y',$year_back);
		$year_last=date('Y',$year_forward);
		
		$data['year_first']=$year_first;
		$data['year_last']=$year_last;	
		

		$data['yearly_projects']=$this->graph_model->get_yearly_projects($year_first,$year_last);		
		
		$data['yearly_projects_success']=$this->graph_model->get_yearly_projects_success($week_first_date,$week_last_date);
		$data['yearly_projects_active']=$this->graph_model->get_yearly_projects_active($week_first_date,$week_last_date);		
		$data['yearly_projects_new']=$this->graph_model->get_yearly_projects_new($week_first_date,$week_last_date);		
		
		
		$this->template->write('title', 'Graphs', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'graph', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	
	}
	
	
	
	function user()
	{
		
		$data=array();
		
		$date=date('Y-m-d');
		
		$week_first_date= get_first_day_of_week($date);
		$week_last_date= get_last_day_of_week($date);	
		
		$data['week_first_date']=$week_first_date;
		$data['week_last_date']=$week_last_date;
		
		$data['weekly_registration']=$this->graph_model->get_weekly_registration($week_first_date,$week_last_date);		
		$data['weekly_fb_registration']=$this->graph_model->get_weekly_fb_registration($week_first_date,$week_last_date);
		$data['weekly_tw_registration']=$this->graph_model->get_weekly_tw_registration($week_first_date,$week_last_date);
		
		
		
	
		$month_first_date = date('Y-m-d', mktime(0, 0, 0, date('m'), 1, date('Y')));
		$month_last_date = date('Y-m-t', mktime(0, 0, 0, date('m'), 1, date('Y')));
		
		$month_first=1;
		$month_last=12;
		
		$data['month_first']=$month_first;
		$data['month_last']=$month_last;		
		
		$data['monthly_registration']=$this->graph_model->get_monthly_registration($month_first,$month_last);		
		$data['monthly_fb_registration']=$this->graph_model->get_monthly_fb_registration($month_first,$month_last);
		$data['monthly_tw_registration']=$this->graph_model->get_monthly_tw_registration($month_first,$month_last);
		
		
		$year_back = strtotime('-2 years');
		$year_forward = strtotime('+2 years');
		
		$year_first=date('Y',$year_back);
		$year_last=date('Y',$year_forward);
		
		$data['year_first']=$year_first;
		$data['year_last']=$year_last;	

		$data['yearly_registration']=$this->graph_model->get_yearly_registration($year_first,$year_last);		
		$data['yearly_fb_registration']=$this->graph_model->get_yearly_fb_registration($year_first,$year_last);
		$data['yearly_tw_registration']=$this->graph_model->get_yearly_tw_registration($year_first,$year_last);
		
		
		$this->template->write('title', 'Graphs', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'user_graph', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}
	
	
	
	
	
}
?>