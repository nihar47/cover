<?php
class Blog extends CI_Controller {
	function Blog()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('home_model');
		$this->load->model('blog_model');
	}
	
	function index()
	{
		redirect('blog/list_blog');	
	}
	
	function blog_setting()
	{
		
		$check_rights=$this->home_model->get_rights('blog_setting');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		$data["error"] = "";
				$one_blog_setting = $this->blog_model->get_one_blog_setting();
				
				$data["blog_setting_id"] = $one_blog_setting['blog_setting_id'];
				//$data["blog_post_limit"] = $one_blog_setting['blog_post_limit'];
				$data["blog_status"] = $one_blog_setting['blog_status'];
				$data["admin_approve"] = $one_blog_setting['admin_approve'];
		//$this->load->library('form_validation');
		
		//$this->form_validation->set_rules('blog_post_limit', 'Blog Post per User', 'required|numeric');
		
		/*if($this->form_validation->run() == FALSE){/*			
			if(validation_errors())
			{
				$data["error"] = validation_errors();
			}else{
				$data["error"] = "";
			}
			if($this->input->post('blog_setting_id'))
			{
				
				$one_blog_setting = $this->blog_model->get_one_blog_setting();
				$data["blog_setting_id"] = $this->input->post('blog_setting_id');
				//$data["blog_post_limit"] = $this->input->post('blog_post_limit');
				$data["blog_status"] = $this->input->post('blog_status');
				$data["admin_approve"] = $this->input->post('admin_approve');
				
				
			}
			else
			{
				$one_blog_setting = $this->blog_model->get_one_blog_setting();
				
				$data["blog_setting_id"] = $one_blog_setting['blog_setting_id'];
				//$data["blog_post_limit"] = $one_blog_setting['blog_post_limit'];
				$data["blog_status"] = $one_blog_setting['blog_status'];
				$data["admin_approve"] = $one_blog_setting['admin_approve'];
				
			}
			$data['site_setting'] = $this->home_model->select_site_setting();
			
			$this->template->write('title', 'Settings', '', TRUE);
			$this->template->write_view('header', 'header', $data, TRUE);
			$this->template->write_view('main_content', 'blog/blog_setting', $data, TRUE);
			$this->template->write_view('footer', 'footer', '', TRUE);
			$this->template->render();
		}
		else{
		echo "rereR";
		die;*/
			if($this->input->post('submit'))
			{
				$this->blog_model->blog_setting_update();
				$data["error"] = "Site settings updated successfully";
			}
			
			$data['site_setting'] = $this->home_model->select_site_setting();
			$this->template->write('title', 'Settings', '', TRUE);
			$this->template->write_view('header', 'header', $data, TRUE);
			$this->template->write_view('main_content', 'blog/blog_setting', $data, TRUE);
			$this->template->write_view('footer', 'footer', '', TRUE);
			$this->template->render();
		//}				
	}
	
	
	/////////////////// blog Category 
	
	function add_blog_category($limit=20)
	{
		
		$check_rights=$this->home_model->get_rights('list_blog_category');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('blog_category_name', 'Blog Category Name', 'required|alpha_numeric_space');
		if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();
			}else{
				$data["error"] = "";
			}
			$data["blog_category_id"] = $this->input->post('blog_category_id');
			$data["blog_category_name"] = $this->input->post('blog_category_name');
			$data["active"] = $this->input->post('active');
			if($this->input->post('offset')=="")
			{
				$limit = '20';
				$totalRows = $this->blog_model->get_total_blog_category_count();
				$data["offset"] = (int)($totalRows/$limit)*$limit;
			}else{
				$data["offset"] = $this->input->post('offset');
			}
			
			
			$data['site_setting'] = $this->home_model->select_site_setting();
			
			$this->template->write('title', 'Blog Categories', '', TRUE);
			$this->template->write_view('header', 'header', $data, TRUE);
			$this->template->write_view('main_content', 'blog/add_blog_category', $data, TRUE);
			$this->template->write_view('footer', 'footer', '', TRUE);
			$this->template->render();
		}else{
			if($this->input->post('blog_category_id'))
			{
				$this->blog_model->blog_category_update();
				$msg = "update";
			}else{
				$this->blog_model->blog_category_insert();
				$msg = "insert";
			}
			$offset = $this->input->post('offset');
			redirect('blog/list_blog_category/'.$limit.'/'.$offset.'/'.$msg);
		}				
	}
	
	function edit_blog_category($id=0,$offset=0)
	{
		
		$check_rights=$this->home_model->get_rights('list_blog_category');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		
		
		$one_blog_category = $this->blog_model->get_one_blog_category($id);
		$data["error"] = "";
		$data["blog_category_id"] = $id;
		$data["blog_category_name"] = $one_blog_category['blog_category_name'];
		$data["active"] = $one_blog_category['active'];
		$data["offset"] = $offset;
		
		$data['site_setting'] = $this->home_model->select_site_setting();
		
		$this->template->write('title', 'Project Categories', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'blog/add_blog_category', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}
	
	function delete_blog_category($id=0,$offset=0)
	{
		$limit=20;
		$check_rights=$this->home_model->get_rights('list_blog_category');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		
		$this->db->delete('blog_category',array('blog_category_id'=>$id));
		redirect('blog/list_blog_category/'.$limit.'/'.$offset.'/delete');
	}
	
	function list_blog_category($limit=20,$offset=0,$msg='')
	{
		
		$check_rights=$this->home_model->get_rights('list_blog_category');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		
		
		$this->load->library('pagination');

		//$limit = '20';
		
		$config['uri_segment']='4';
		$config['base_url'] = site_url('blog/list_blog_category/'.$limit.'/');
		$config['total_rows'] = $this->blog_model->get_total_blog_category_count();
		$config['per_page'] = $limit;		
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();
		
		$data['site_setting'] = $this->home_model->select_site_setting();
		$data['limit']=$limit;
		$data['option']='';
		$data['keyword']='';
		$data['search_type']='normal';
		
	
		$data['result'] = $this->blog_model->get_all_blog_category($offset, $limit);
		$data['msg'] = $msg;
		$data['offset'] = $offset;
		$this->template->write('title', 'Blog Categories', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'blog/list_blog_category', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}
	
	
	function search_list_blog_category($limit=20,$option='',$keyword='',$offset=0,$msg='')
	{
		
		$check_rights=$this->home_model->get_rights('list_blog_category');
		
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
		
		//$keyword=str_replace('"','',str_replace(array("'",",","%","$","&","*","#","@","(",")",":",";",">","<","/"),'',trim($keyword)));
	
		$config['uri_segment']='6';
		$config['base_url'] = site_url('blog/search_list_blog_category/'.$limit.'/'.$option.'/'.$keyword.'/');
		$config['total_rows'] = $this->blog_model->get_total_search_blog_category_count($option,$keyword);
		$config['per_page'] = $limit;		
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();
		
		$data['result'] = $this->blog_model->search_list_blog_category($option,$keyword,$offset, $limit);
		$data['msg'] = $msg;
		$data['offset'] = $offset;
		
		
		//$data['statelist']=$this->project_category_model->get_state();
		
		$data['site_setting'] = $this->home_model->select_site_setting();
		
		$data['limit']=$limit;
		$data['option']=$option;
		$data['keyword']=$keyword;
		$data['search_type']='search';
		
		$this->template->write('title', 'Search Blog Category', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'blog/list_blog_category', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}
	
	
	function list_blog($limit=15,$offset=0,$msg='')
	{
	
		 $check_rights=$this->home_model->get_rights('list_blog');
		 
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
	     }
		
		$this->load->library('pagination');

		//$limit = '15';
		$config['uri_segment']='4';
		$config['base_url'] = site_url('blog/list_blog/'.$limit.'/');
		$config['total_rows'] = $this->blog_model->get_total_blog_count();
		$config['per_page'] = $limit;		
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();
		
		$data['site_setting'] = $this->home_model->select_site_setting();
		
		$data['result'] = $this->blog_model->get_blog_result($offset, $limit);
		$data['msg'] = $msg;
		$data['offset'] = $offset;
		
		$data['limit']=$limit;
		$data['option']='';
		$data['keyword']='';
		$data['search_type']='normal';
			
		$this->template->write('title', 'Blogs', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'blog/list_all_blog', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}

	function search_blog_list($limit=20,$option='',$keyword='',$offset=0,$msg=''){
		
		$check_rights=$this->home_model->get_rights('list_blog');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		$this->load->library('pagination');

		//$limit = '15';
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
		
		//$keyword=str_replace('"','',str_replace(array("'",",","%","$","&","*","#","@","(",")",":",";",">","<","/"),'',trim($keyword)));
	
	/*if($option != "pay")
		{
		  $keyword=str_replace('"','',str_replace(array("'",",","%","$","&","*","#","@","(",")",":",";",">","<","/"),'',trim($keyword)));
	    }*/
	
		$config['uri_segment']='6';
		$config['base_url'] = site_url('blog/search_blog_list/'.$limit.'/'.$option.'/'.$keyword.'/');
		$config['total_rows'] = $this->blog_model->get_total_search_blog_count($option,$keyword);
		$config['per_page'] = $limit;		
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();
		
		
		
		$data['site_setting'] = $this->home_model->select_site_setting();
		$data['msg'] = $msg;
		$data['offset'] = $offset;
		
		$data['result'] = $this->blog_model->get_search_blog_result($option,$keyword,$offset, $limit);
		//print_r($config['total_rows']);die();
		
		
		$data['limit'] = $limit;
		$data['option']=$option;
		$data['keyword']=$keyword;
		
		$data['search_type']='search';
		
		
		
		$this->template->write('title', 'Search Blog List', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'blog/list_all_blog',$data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	
	
	}


	
	function add_blog($limit=20)
	{
		
		$check_rights=$this->home_model->get_rights('list_blog');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('blog_title', 'Blog Title', 'required');
		$this->form_validation->set_rules('blog_category_id', 'Blog Category', 'required');
		$this->form_validation->set_rules('description', 'Blog Description', 'required');
		
		if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();
			}else{

				$data["error"] = "";
			}
			$data["blog_id"] = $this->input->post('blog_id');
			$data["blog_title"] = $this->input->post('blog_title');
			$data["user_id"] = $this->input->post('user_id');
			$data["description"] = $this->input->post('description');
			$data["blog_category_id"] = $this->input->post('blog_category_id');
			$data["status"] = $this->input->post('status');
			
			$data["publish"] = $this->input->post('publish');
			$data["no_one_comment"] = $this->input->post('no_one_comment');
			$data["allow_anonymous"] = $this->input->post('allow_anonymous');
		
		    $data['date_added'] = $this->input->post('date_added');
		   // $data['feature_order'] = $this->input->post('feature_num');	
			
			if($this->input->post('offset')=="")
			{
				//$limit = '10';
				$totalRows = $this->blog_model->get_total_blog_count();
				
				//print_r($totalRows);
				//die;
				$data["offset"] = (int)($totalRows/$limit)*$limit;
			}else{
				$data["offset"] = $this->input->post('offset');
			}
			//print_r($data["offset"]);
			//die;
			$data['site_setting'] = $this->home_model->select_site_setting();
			$data['blog_category']=$this->blog_model->blog_category();
			//$data['special_category']=$this->home_page_model->get_all_special_category();
			$this->template->write('title', 'Blogs', '', TRUE);
			$this->template->write_view('header', 'header', $data, TRUE);
			$this->template->write_view('main_content', 'blog/add_blog', $data, TRUE);
			$this->template->write_view('footer', 'footer', '', TRUE);
			$this->template->render();
		}
		
		else{
			if($this->input->post('blog_id'))
			{
				$this->blog_model->update_blog();
				$msg = "update";
			}else{
				$this->blog_model->insert_blog();
				$msg = "insert";
			}
			$offset = $this->input->post('offset');
			redirect('blog/list_blog/'.$limit.'/'.$offset.'/'.$msg);
		}				
	}
	
	
	function edit_blog($id=0,$offset=0)
	{
		
		$check_rights=$this->home_model->get_rights('list_blog');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		
		
		$blog = $this->blog_model->get_one_blog($id);
		$data["error"] = "";
		
		$data["blog_id"] = $id;
		$data["blog_title"] = $blog['blog_title'];
		$data["user_id"] = $blog['user_id'];
		$data["description"] = $blog['blog_discription'];
    	$data["blog_category_id"] = $blog['blog_category'];
		
		$data['date_added'] = $blog['date_added'];
		
		$data["status"] = $blog['status'];
			
		$data["publish"] = $blog['publish'];
		$data["no_one_comment"] = $blog['no_one_comment'];
	
		$data["offset"] = $offset;
		
		
		$data['site_setting'] = $this->home_model->select_site_setting();
		$data['blog_category']=$this->blog_model->blog_category();
		$this->template->write('title', 'Blogs', '', TRUE);
		$this->template->write_view('header', 'header', $data, TRUE);
		$this->template->write_view('main_content', 'blog/add_blog', $data, TRUE);
		$this->template->write_view('footer', 'footer', '', TRUE);
		$this->template->render();
	}
	
	
	function delete_blog($id=0,$offset=0)
	{
		$limit=20;
		$check_rights=$this->home_model->get_rights('list_blog');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		$this->db->delete('blogs',array('blog_id'=>$id));
		redirect('blog/list_blog/'.$limit.'/'.$offset.'/delete');
	}
	
	
	function action_blog($limit=20)
	{
		$check_rights=$this->home_model->get_rights('list_blog');
		
		if(	$check_rights==0) {			
			redirect('home/dashboard/no_rights');	
		}
		
		$offset=$this->input->post('offset');
		$action=$this->input->post('action');
		$blog_id=$this->input->post('chk');
		
		if($action=='feature')
		{	
			foreach($blog_id as $id)
			{
				
				$query=$this->db->query("update blogs set is_featured='1' where blog_id='".$id."'");
	
			}
			
			redirect('blog/list_blog/'.$limit.'/'.$offset.'/feature');
		}
		
		if($action=='not_feature')
		{	
			foreach($blog_id as $id)
			{
				
				$this->db->query("update blogs set is_featured='0' where blog_id='".$id."'");				
			}
			
			redirect('blog/list_blog/'.$limit.'/'.$offset.'/not_feature');
			
		}
		
		}
}
?>