<?php
/*********************************************************************************
 * This the taskrabbitclone.com  by Rockers Technology. is paid software. It is released under the terms of 
 * the following BSD License.
 * 
 *  Rockers Technologies (Head Office)
 *    5038,Berthpage Dr
 *    suwanee, GA. Zip Code : 30024
    
 *    E-mail Address : nishu@rockersinfo.com
 * 
 * Copyright © 2012-2020 by Rockers Technology , INC a domestic profit corporation has been duly incorporated under
the laws of the state of georiga , USA. www.rockersinfo.com
 * All rights reserved.
 * 
 * Redistribution and use in source and binary forms, with or without modification, 
 * are permitted provided that the following conditions are met:
 * 
 * - Redistributions of source code must retain the above copyright notice, this 
 *   list of conditions and the following disclaimer.
 * - Redistributions in binary form must reproduce the above copyright notice, this 
 *   list of conditions and the following disclaimer in the documentation and/or 
 *   other materials provided with the distribution.

 * 
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND 
 * ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED 
 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. 
 * IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, 
 * INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, 
 * BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, 
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF 
 * LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE 
 * OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED 
 * OF THE POSSIBILITY OF SUCH DAMAGE.
 ********************************************************************************/


class Blog extends ROCKERS_Controller {

	function Blog()
	{
		parent::__construct();	
		
		$this->load->model('home_model');
		$this->load->model('project_model');
		$this->load->model('blog_model');
		
	}
	
	
	function index($offset=0)
	{	
		
		$limit=10;
		//$config['base_url'] = site_url('blog/index');
		//$config['total_rows'] = $this->discover_model->search_project_count($match);
		//$config['per_page'] = $limit;		
		//$this->altpage->initialize($config);		
		//$data['page_link'] = $this->altpage->create_links();
		//$data['id']='';
		
		$data['result'] = $this->blog_model->list_blog($limit,$offset);
		$data['category'] = $this->blog_model->get_blog_category();
		$data['latest_updates'] = $this->blog_model->get_latest_updates();
		$data['project_of_the_day'] = project_of_the_day();
		
		
		
		////$data['match'] = $match;
		$data['offset'] = $offset;
		$data['limit'] = $limit;
		//$data['select']='';
		//$data['total_rows'] = $config['total_rows'];
		//$data['per_page'] = $limit;
		$data['site_setting'] = site_setting();
		
		$meta = meta_setting();
		$this->home_model->select_text();
		$this->template->write('meta_title','Blog'. $meta['title'], TRUE);
		$this->template->write('meta_description', $meta['meta_description'], TRUE);
		$this->template->write('meta_keyword', $meta['meta_keyword'], TRUE);
		
	
			
			if($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1)
			{
				$this->template->set_master_template('iphone/template.php');
				$this->template->write_view('main_content', 'iphone/blog', $data, TRUE);
				$this->template->render();
			}
			elseif(($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1)
			{
				$this->template->set_master_template('mobile/template.php');
				$this->template->write_view('main_content', 'mobile/blog', $data, TRUE);
				$this->template->render();
			}
			else
			{
				if(!check_user_authentication()) {  
					$this->template->write_view('header', 'default/common/header', $data, TRUE);
				} 
				else
				{
					$this->template->write_view('header', 'default/common/header_login', $data, TRUE);
				}
				
				
			
				$this->template->write_view('main_content', 'default/blog/blog', $data, TRUE);
				//$this->template->write_view('sidebar', 'default/category', $data, TRUE);
				$this->template->write_view('footer', 'default/common/footer',$data, TRUE);
				$this->template->render();
			}
		
		
		
	}
	
	function load_ajax_blog($limit='',$offset='')
	{
		$data['site_setting'] = site_setting();
		$data['offset']=$offset;
		$data['limit']=$limit;
		$data['msg']='';
		$data['result'] = $this->blog_model->list_blog($limit,$offset);
		$this->load->view('default/blog/load_ajax_blog',$data);
	}
	
	function search($blog_id,$offset=0)
	{
		$limit=10;
		$chk_blog = $this->blog_model->get_one_blog($blog_id);
			if(!$chk_blog)
			{
				redirect('blog');
			}
		
		$data['result'] = $this->blog_model->list_blog($limit,$offset);
		$data['one_blog'] = $this->blog_model->get_one_blog($blog_id);
		$data['blog_comment']=$this->blog_model->get_blog_comment($blog_id,$limit,$offset);
		
		$data['category'] = $this->blog_model->get_blog_category();
		
		$data['recent_post'] = $this->blog_model->recent_post();
		
		$data['offset'] = $offset;
		$data['limit'] = $limit;
		$data['site_setting'] = site_setting();
		$data['cat_id']='';
		
		$meta = meta_setting();
		$this->home_model->select_text();
		$this->template->write('meta_title','Blog'. $meta['title'], TRUE);
		$this->template->write('meta_description', $meta['meta_description'], TRUE);
		$this->template->write('meta_keyword', $meta['meta_keyword'], TRUE);
		
	
			
			if($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1)
			{
				$this->template->set_master_template('iphone/template.php');
				$this->template->write_view('main_content', 'iphone/blog', $data, TRUE);
				$this->template->render();
			}
			elseif(($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1)
			{
				$this->template->set_master_template('mobile/template.php');
				$this->template->write_view('main_content', 'mobile/blog', $data, TRUE);
				$this->template->render();
			}
			else
			{
				if(!check_user_authentication()) {  
					$this->template->write_view('header', 'default/common/header', $data, TRUE);
				} 
				else
				{
					$this->template->write_view('header', 'default/common/header_login', $data, TRUE);
				}
				
				
			
				$this->template->write_view('main_content', 'default/blog/blog_comment', $data, TRUE);
				//$this->template->write_view('sidebar', 'default/category', $data, TRUE);
				$this->template->write_view('footer', 'default/common/footer',$data, TRUE);
				$this->template->render();
			}

	}
	
	function blog_comment()
	{
		$blog_comment = $this->blog_model->insert_blog_comment();
		redirect('blog/search/'.$blog_comment);
	}
	
	function category($blog_category_id='',$offset='')
	{
		
		$limit=10;
		$offset=0;
		/*$chk_blog = $this->blog_model->get_one_blog($blog_id);
			if(!$chk_blog)
			{
				redirect('blog');
			}*/
		
		$data['result'] = $this->blog_model->list_category_blog($blog_category_id,$limit,$offset);
		$data['cat_id'] = $blog_category_id;
		//$data['one_blog'] = $this->blog_model->get_one_blog($blog_id);
		//$data['blog_comment']=$this->blog_model->get_blog_comment($blog_id,$limit,$offset);
		
		$data['category'] = $this->blog_model->get_blog_category();
		
		$data['recent_post'] = $this->blog_model->recent_post();
		
		$data['offset'] = $offset;
		$data['limit'] = $limit;
		$data['site_setting'] = site_setting();
		
		$meta = meta_setting();
		$this->home_model->select_text();
		$this->template->write('meta_title','Blog'. $meta['title'], TRUE);
		$this->template->write('meta_description', $meta['meta_description'], TRUE);
		$this->template->write('meta_keyword', $meta['meta_keyword'], TRUE);
		
	
			
			if($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1)
			{
				$this->template->set_master_template('iphone/template.php');
				$this->template->write_view('main_content', 'iphone/blog', $data, TRUE);
				$this->template->render();
			}
			elseif(($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1)
			{
				$this->template->set_master_template('mobile/template.php');
				$this->template->write_view('main_content', 'mobile/blog', $data, TRUE);
				$this->template->render();
			}
			else
			{
				if(!check_user_authentication()) {  
					$this->template->write_view('header', 'default/common/header', $data, TRUE);
				} 
				else
				{
					$this->template->write_view('header', 'default/common/header_login', $data, TRUE);
				}
				
				
			
				$this->template->write_view('main_content', 'default/blog/category', $data, TRUE);
				//$this->template->write_view('sidebar', 'default/category', $data, TRUE);
				$this->template->write_view('footer', 'default/common/footer',$data, TRUE);
				$this->template->render();
			}

	
	}
	
	function load_ajax_blog_category($blog_categoty_id='',$limit='',$offset='')
	{
		$data['site_setting'] = site_setting();
		$data['offset']=$offset;
		$data['limit']=$limit;
		$data['msg']='';
		$data['result'] = $this->blog_model->list_category_blog($blog_categoty_id,$limit,$offset);
		$this->load->view('default/blog/load_ajax_blog_category',$data);
	}
	
	
}

?>