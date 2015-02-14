<?php
class Faq_category extends CI_Controller {
	
	function Faq_category()
	{
		parent::__construct();
		$this->load->model('faq_category_model');
		$this->load->model('home_model');
		
	}
	
	function index()
	{
		redirect('faq_category/list_faq_category');
	}
	
	
	function menu_cat($select,$id='')
	{
			$this->cnt = 0;
		$this->cnt++;
			
			
		$cat='';
		$id= empty($id) ? 0 : $id;
		
		if(count($this->faq_category_model->get_category_multi($id))>0) {	
			
				foreach($this->faq_category_model->get_category_multi($id) as $res) {			
					
					
					if($select==$res->faq_category_id) {
					
					$cat.='<option value="'.$res->faq_category_id.'" selected="selected">';
					
					}
					else {
					
					$cat.='<option value="'.$res->faq_category_id.'">';
					
					}
					
					if($res->parent_id!=0) {
				
					for($i=0;$i<$this->cnt;$i++) { $cat.="&nbsp;&nbsp;"; }				
					
						$cat.='|_';
					}
					
					$cat.=$res->faq_category_name.'</option>';				
					
					if(count($this->menu_cat($select,$res->faq_category_id))>0) {	
					
						$cat.=$this->menu_cat($select,$res->faq_category_id);
						$this->cnt--;	
					}
					
					$this->cnt--;			
				
			   } 
			   		  
		}
			
		return $cat;  
	
	}
	
	
	
	function action_faq_category()
	{
		$limit=20;
		$check_rights=$this->home_model->get_rights('list_faq_category');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		
		$offset=$this->input->post('offset');
		$action=$this->input->post('action');
		$faq_category_id=$this->input->post('chk');
		
		
		
		
		if($action=='active')
		{	
			foreach($faq_category_id as $id)
			{			
	
				$this->db->query("update faq_category set active=1 where faq_category_id='".$id."'");				
			}
			
			redirect('faq_category/list_faq_category/'.$limit.'/'.$offset.'/active');
		}
		
		if($action=='inactive')
		{
			foreach($faq_category_id as $id)
			{
	
				$this->db->query("update faq_category set active=0 where faq_category_id='".$id."'");			
			}
			
			redirect('faq_category/list_faq_category/'.$limit.'/'.$offset.'/inactive');
		}
		
		if($action=='help_page')
		{	
			foreach($faq_category_id as $id)
			{
				$this->db->query("update faq_category set faq_category_home=1 where parent_id=0 and faq_category_id='".$id."'");				
			}
			
			redirect('faq_category/list_faq_category/'.$limit.'/'.$offset.'/help_page');
		}
		
		
		if($action=='not_help_page')
		{	
			foreach($faq_category_id as $id)
			{			
				
				$this->db->query("update faq_category set faq_category_home=0 where faq_category_id='".$id."'");				
			}
			
			redirect('faq_category/list_faq_category/'.$limit.'/'.$offset.'/not_help_page');
		}
		
		
	
	}
	
	
	function add_faq_category($limit=20)
	{
		
		$check_rights=$this->home_model->get_rights('list_faq_category');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('faq_category_name', 'FAQ Category Name', 'required');
		if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();
			}else{
				$data["error"] = "";
			}
			$data["faq_category_id"] = $this->input->post('faq_category_id');
			$data["parent_id"] = $this->input->post('parent_id');
			$data["faq_category_name"] = $this->input->post('faq_category_name');
			$data["faq_category_url_name"] = $this->input->post('faq_category_url_name');
			$data["active"] = $this->input->post('active');
			
			$data['faq_category_home']=$this->input->post('faq_category_home');
			$data['faq_category_order']=$this->input->post('faq_category_order');
			
			$data['all_category']=$this->menu_cat(0,0);	
			
			
			if($this->input->post('offset')=="")
			{
				$limit = '20';
				$totalRows = $this->faq_category_model->get_total_faq_category_count();
				$data["offset"] = (int)($totalRows/$limit)*$limit;
			}else{
				$data["offset"] = $this->input->post('offset');
			}
			$data['parent'] = $this->faq_category_model->get_parent_faq_category();
			$data['site_setting'] = $this->home_model->select_site_setting();
			$this->template->write('title', 'FAQ Categories', '', TRUE);
			$this->template->write_view('header', 'header', $data, TRUE);
			$this->template->write_view('main_content', 'add_faq_category', $data, TRUE);
			$this->template->write_view('footer', 'footer', '', TRUE);
			$this->template->render();
		}else{
			if($this->input->post('faq_category_id'))
			{
				$this->faq_category_model->faq_category_update();
				$msg = "update";
			}else{
				$this->faq_category_model->faq_category_insert();
				$msg = "insert";
			}
			$offset = $this->input->post('offset');
			redirect('faq_category/list_faq_category/'.$limit.'/'.$offset.'/'.$msg);
		}				
	}
	
	function edit_faq_category($id=0,$offset=0)
	{
		
		$check_rights=$this->home_model->get_rights('list_faq_category');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		
		
		$data['parent'] = $this->faq_category_model->get_parent_faq_category();
		$one_faq_category = $this->faq_category_model->get_one_faq_category($id);
		$data["error"] = "";
		$data["faq_category_id"] = $id;
		$data["parent_id"] = $one_faq_category['parent_id'];
		$data["faq_category_name"] = $one_faq_category['faq_category_name'];
		$data["faq_category_url_name"] = $one_faq_category['faq_category_url_name'];
		$data["active"] = $one_faq_category['active'];
		
		$data['faq_category_home']=$one_faq_category['faq_category_home'];
		$data['faq_category_order']=$one_faq_category['faq_category_order'];
		
		$data['all_category']=$this->menu_cat($one_faq_category['parent_id'],0);		
		
		$data["offset"] = $offset;
		$data['site_setting'] = $this->home_model->select_site_setting();
		$this->template->write('title', 'FAQ Categories', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'add_faq_category', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}
	
	function delete_faq_category($id=0,$offset=0)
	{
		$check_rights=$this->home_model->get_rights('list_faq_category');
		$limit=20;
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		$this->db->delete('faq_category',array('faq_category_id'=>$id));
		redirect('faq_category/list_faq_category/'.$limit.'/'.$offset.'/delete');
	}
	
	function list_faq_category($limit='20',$offset=0,$msg='')
	{
		$check_rights=$this->home_model->get_rights('list_faq_category');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		//echo $limit.'-'.$offset; die;
		$this->load->library('pagination');
		//$limit = '20';
		$config['uri_segment']='4';
		$config['base_url'] = site_url('faq_category/list_faq_category/'.$limit.'/');
		$config['total_rows'] = $this->faq_category_model->get_total_faq_category_count();
		$config['per_page'] = $limit;		
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();
		$data['site_setting'] = $this->home_model->select_site_setting();
		$data['result'] = $this->faq_category_model->get_faq_category_result($offset, $limit);
		$data['msg'] = $msg;
		$data['offset'] = $offset;
		
		$data['limit']=$limit;
		$data['option']='';
		$data['keyword']='';
		$data['search_type']='normal';
		$this->template->write('title', 'FAQ Categories', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'list_faq_category', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}
	
	function search_list_faq_category($limit=20,$option='',$keyword='',$offset=0,$msg='')
	{
		
		$check_rights=$this->home_model->get_rights('list_user');
		
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
		$config['base_url'] = site_url('faq_category/search_list_faq_category/'.$limit.'/'.$option.'/'.$keyword.'/');
		$config['total_rows'] = $this->faq_category_model->get_total_search_faq_category_count($option,$keyword);
		$config['per_page'] = $limit;		
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();
		
		$data['result'] = $this->faq_category_model->get_search_faq_category_result($option,$keyword,$offset, $limit);
		$data['msg'] = $msg;
		$data['offset'] = $offset;
		
		
		//$data['statelist']=$this->project_category_model->get_state();
		
		$data['site_setting'] = $this->home_model->select_site_setting();
		
		$data['limit']=$limit;
		$data['option']=$option;
		$data['keyword']=$keyword;
		$data['search_type']='search';
		
		$this->template->write('title', 'Search FAQ Category', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'list_faq_category', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}
	
	
}
?>