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
class Discover extends ROCKERS_Controller {
	function Discover()
	{
		parent::__construct();	

		$this->load->model('home_model');

		$this->load->model('discover_model');

		$this->load->model('project_model');

		$this->load->library('securimage');
	}

	function index($offset=0)
	{	
		if (! class_exists('Alternate')){
		  include_once(APPPATH.'libraries/Alternate'.EXT);
		}

		$obj =& get_instance();
		$obj->altpage = new Alternate();
		$obj->ci_is_loaded[] = 'altpage';

		$limit = '9';

		if($this->input->post('searchprj')!='')
		{			
			$match = $this->input->post('searchprj');
		}elseif($this->session->userdata('match')!='')
		{
			$match='none';
		}else	{
			$match='none';
		}

		$data['searchprj'] = '';

		$match=str_replace(array('"'),'',str_replace(array(",","`","'"),'',$match));

		$config['base_url'] = site_url('discover/index');

		$config['total_rows'] = $this->discover_model->search_project_count($match);

		$config['per_page'] = $limit;		

		$this->altpage->initialize($config);		

		$data['page_link'] = $this->altpage->create_links();

		$data['id']='';

		$data['link']='discover';

		$data['result'] = $this->discover_model->search_project($offset, $limit,$match);

		$data['match'] = $match;

		$data['offset'] = $offset;

		$data['limit'] = $limit;

		$data['select']='';

		$data['total_rows'] = $config['total_rows'];

		$data['per_page'] = $limit;

		$data['site_setting'] = site_setting();

		$data['searchprj'] = $this->input->post('searchprj');

		$data['donation'] = $this->home_model->get_latest_donations();

		$data['category'] = $this->home_model->get_category();

		$data['gallery']=$this->home_model->get_gallery();

		$data['idea']=$this->home_model->get_idea();

		$data['city'] = get_all_city();

		$data['staff_picks'] =$this->discover_model->staffpicks(0,3);

		$data['week_popular'] =$this->discover_model->week_popular(0,3);
		
		$data['most_popular'] = $this->discover_model->popular(0,3);

		$data['recent_success_fund'] =$this->discover_model->successful(0,3);/*Temporary put succesfullt after complete backed by paypal change*/

		$data['recent_updates']=$this->project_model->recent_updates();

		if($match=='' || $match=='none') {  $match_seo='Search'; } else { $match_seo=$match; }

		$meta = meta_setting();

		$this->home_model->select_text();

		$this->template->write('meta_title','Discover Projects-'.$match_seo.'-'. $meta['title'], TRUE);

		$this->template->write('meta_description', $meta['meta_description'], TRUE);

		$this->template->write('meta_keyword', $meta['meta_keyword'], TRUE);

			if($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1)
			{
				$this->template->set_master_template('iphone/template.php');
				$this->template->write_view('main_content', 'iphone/secrh_list_project_mobile', $data, TRUE);
				$this->template->render();
			}elseif(($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1)
			{
				$this->template->set_master_template('mobile/template.php');
				$this->template->write_view('main_content', 'mobile/secrh_list_project_mobile', $data, TRUE);
				$this->template->render();
			}else
			{
				if(!check_user_authentication()) {  
					$this->template->write_view('header', 'default/common/header', $data, TRUE);
				} 
				else
				{
					$this->template->write_view('header', 'default/common/header_login', $data, TRUE);
				}

				$this->template->write_view('main_content', 'default/search/search_project_list', $data, TRUE);

				//$this->template->write_view('sidebar', 'default/category', $data, TRUE);

				$this->template->write_view('footer', 'default/common/footer',$data, TRUE);

				$this->template->render();

			}
	}

	function search_ajax($match='none',$n = '')
	{
		$limit = '9';

		$data['offset'] = $n;

		$data['site_setting'] = site_setting();

		$data['total_rows'] = $this->discover_model->search_project_count($match);

		$data['per_page'] = $limit;

		$data['limit'] = $limit;

		$data['result'] = $this->discover_model->search_project($n, $limit,$match);

		$this->load->view('default/search_project_scrollajax', $data);

	}

	/////////////============Additional Search  =====================

	function recommended($offset=0)
	{
		$this->load->library('pagination');

		$limit = '9';

		$config['base_url'] = site_url('discover/ending_soon/');

		$config['total_rows'] = $this->discover_model->staffpicks_count();

		$config['per_page'] = $limit;		

		$this->pagination->initialize($config);		

		//$data['page_link'] = $this->pagination->create_links();

		$data['total_rows'] = $config['total_rows'];

		$data['per_page'] = $limit;

		$data['offset'] = $offset;

		$data['limit'] = $limit;

		$data['link']='discover';

		//$data['idea']=$this->home_model->get_idea();

		$data['city'] = get_all_city();

		$data['result'] =$this->discover_model->staffpicks($offset, $limit);

		$data['search_cat'] = TREND; 

		$data['serach_text'] = TREND; 

		$data['select'] = 'staff_picks';

		$data['gallery']=$this->home_model->get_gallery();

		$data['site_setting'] = site_setting();

		$data['category'] = $this->home_model->get_category();

		$meta = meta_setting();

		$data['searchprj'] = "";

		$data['id']='';

		$this->home_model->select_text();
		$this->template->write('meta_title','Discover Projects>>Staff Picks-'. $meta['title'], TRUE);
		$this->template->write('meta_description','Discover Projects>>Staff Picks-'. $meta['meta_description'], TRUE);
		$this->template->write('meta_keyword', 'Discover Projects>>Staff Picks-'.$meta['meta_keyword'], TRUE);

		if(!check_user_authentication()) {  
				$this->template->write_view('header', 'default/common/header', $data, TRUE);
		} 
		else
		{
			$this->template->write_view('header', 'default/common/header_login', $data, TRUE);
		}

		$this->template->write_view('main_content', 'default/search/staffpicks', $data, TRUE);
		$this->template->write_view('footer', 'default/common/footer',$data, TRUE);
		$this->template->render();
	}

	function recentlylaunched($offset=0)
	{
		$this->load->library('pagination');

		$limit = '9';

		//$config['base_url'] = site_url('discover/ending_soon/');

		$config['total_rows'] = $this->discover_model->recentlylaunched_count();

		$config['per_page'] = $limit;		

		$this->pagination->initialize($config);		

		//$data['page_link'] = $this->pagination->create_links();

		$data['total_rows'] = $config['total_rows'];

		$data['per_page'] = $limit;

		$data['offset'] = $offset;

		$data['limit'] = $limit;

		$data['search_cat'] = RECENTLY_LAUNCHED; 

		$data['serach_text'] = RECENTLY_LAUNCHED_TEXT; 

		$data['link']='discover';

		//$data['idea']=$this->home_model->get_idea();

		$data['city'] = get_all_city();

		$data['result'] =$this->discover_model->recentlylaunched($offset, $limit);

		$data['gallery']=$this->home_model->get_gallery();

		$data['site_setting'] = site_setting();

		$data['category'] = $this->home_model->get_category();

		$meta = meta_setting();

		$data['searchprj'] = "";

		$data['select'] = 'sel_launched';

		$data['id']='';

		$this->home_model->select_text();

		$this->template->write('meta_title','Discover Projects>>Recently Launched-'. $meta['title'], TRUE);
		$this->template->write('meta_description','Discover Projects>>Recently Launched-'. $meta['meta_description'], TRUE);
		$this->template->write('meta_keyword', 'Discover Projects>>Recently Launched-'.$meta['meta_keyword'], TRUE);
		if(!check_user_authentication()) {  
				$this->template->write_view('header', 'default/common/header', $data, TRUE);
		} 
		else
		{
			$this->template->write_view('header', 'default/common/header_login', $data, TRUE);
		}

		$this->template->write_view('main_content', 'default/search/staffpicks', $data, TRUE);
		$this->template->write_view('footer', 'default/common/footer',$data, TRUE);
		$this->template->render();
	}

	function featured($offset=0)
	{
		$this->load->library('pagination');

		$limit = '9';

		//$config['base_url'] = site_url('discover/ending_soon/');

		$config['total_rows'] = $this->discover_model->featured_count();

		$config['per_page'] = $limit;		

		$this->pagination->initialize($config);		

		//$data['page_link'] = $this->pagination->create_links();

		$data['total_rows'] = $config['total_rows'];

		$data['per_page'] = $limit;

		$data['offset'] = $offset;

		$data['limit'] = $limit;

		$data['search_cat'] = "iFeature"; 

		$data['serach_text'] = FEATURED; 

		$data['link']='discover';

		$data['result'] =$this->discover_model->featured($offset, $limit);

		$data['gallery']=$this->home_model->get_gallery();

		$data['site_setting'] = site_setting();

		$data['category'] = $this->home_model->get_category();

		$meta = meta_setting();

		$data['searchprj'] = "";

		$data['select'] = 'sel_featured';

		$data['id']='';

		$this->home_model->select_text();

		$this->template->write('meta_title','Discover Projects>>Featured-'. $meta['title'], TRUE);
		$this->template->write('meta_description','Discover Projects>>Featured-'. $meta['meta_description'], TRUE);
		$this->template->write('meta_keyword', 'Discover Projects>>Featured-'.$meta['meta_keyword'], TRUE);

		if(!check_user_authentication()) {  
				$this->template->write_view('header', 'default/common/header', $data, TRUE);
		} 
		else
		{
			$this->template->write_view('header', 'default/common/header_login', $data, TRUE);
		}

		$this->template->write_view('main_content', 'default/search/staffpicks', $data, TRUE);
		$this->template->write_view('footer', 'default/common/footer',$data, TRUE);
		$this->template->render();

	}

	function category($id=0, $offset=0)
	{	
		$data['select']=$id;
		
		$parent_id = $this->input->get('parent_id');
		 
		 if($parent_id > 0){
				$parent_info = $this->discover_model->get_parent($parent_id);
				//print_r($parent_info);die;
					foreach($parent_info as $parent){
						$data['parent_name'] = $parent->project_category_name;
						$data['parent_id'] = $parent->project_category_id;
						$data['parent_category_id'] = $parent->parent_project_category_id;
					}
				//print_r($parent_info); die;
				 $data['sub_categories'] = get_sub_category($id);
		 }
		
		$sec_id = $this->input->get('sec_id');
		 if($sec_id > 0){
			 $parent_info = $this->discover_model->get_parent($sec_id);
		
			$data['select']=$sec_id;
		
			foreach($parent_info as $parent){
					if($parent->parent_project_category_id != 0)
						{
							$main_parent = $this->discover_model->get_parent($parent->parent_project_category_id);
							foreach($main_parent as  $main){
								$data['main_parent_name'] = $main->project_category_name;
								$data['main_parent_id'] = $main->project_category_id;
								$data['main_parent_category_id'] = $main->parent_project_category_id;
							}
						}
						
					$data['parent_name'] = $parent->project_category_name;
					$data['parent_id'] = $parent->project_category_id;
					$data['parent_category_id'] = $parent->parent_project_category_id;
			}
			 $data['sub_categories'] = get_sub_category($sec_id);
		 }
		 
		$this->load->library('pagination');

		$limit = '9';

		//$config['base_url'] = site_url('discover/category/'.$id.'/');

		$config['total_rows'] = $this->discover_model->get_total_category_project($id);

		$config['per_page'] = $limit;		

		$this->pagination->initialize($config);		

		//$data['page_link'] = $this->pagination->create_links();

		$data['total_rows'] = $config['total_rows'];

		$data['per_page'] = $limit;

		$data['offset'] = $offset;

		$data['limit'] = $limit;

		$data['project_category_id'] = $id;

		$data['city'] = get_all_city();

		//$data['idea']=$this->home_model->get_idea();

		
		if(isset($sec_id) && !empty($sec_id)){
			$data['result'] = $this->discover_model->get_category_project($id, $offset, $limit);
			}elseif(isset($parent_id) && !empty($parent_id)){
				$data['result'] = $this->discover_model->get_sub_category_project($id, $offset, $limit);
				}else{
				$data['result'] = $this->discover_model->get_all_category_project($id, $offset, $limit);
				}
		$data['link']='discover';

		$data['gallery']=$this->home_model->get_gallery();

		$data['site_setting'] = site_setting();

		$data['category'] = $this->home_model->get_category();
		
		$meta = meta_setting();

		$data['search_cat'] = project_getcategory_name($id); 

		$data['serach_text'] = ''; 

		$data['searchprj'] = "";

		$data['id']=$id;

		$this->home_model->select_text();

		$this->template->write('meta_title','Category-'. $meta['title'], TRUE);
		$this->template->write('meta_description','Category-'. $meta['meta_description'], TRUE);
		$this->template->write('meta_keyword','Category-'. $meta['meta_keyword'], TRUE);

		if(!check_user_authentication()) {  
				$this->template->write_view('header', 'default/common/header', $data, TRUE);
		} 
		else
		{
			$this->template->write_view('header', 'default/common/header_login', $data, TRUE);
		}

		$this->template->write_view('main_content', 'default/search/category_project', $data, TRUE);
		//$this->template->write_view('sidebar', 'default/category', $data, TRUE);
		$this->template->write_view('footer', 'default/common/footer',$data, TRUE);
		$this->template->render();

	}

	function category_project_ajax($id=0, $offset=0)
	{

		$limit = '9';

		$data['total_rows'] = $this->discover_model->get_total_category_project($id);

		$data['per_page'] = $limit;

		$data['offset'] = $offset;

		$data['project_category_id'] = $id;

		$data['site_setting'] = site_setting();

		$data['limit'] = $limit;

		$data['result'] = $this->discover_model->get_category_project($id, $offset, $limit);

		$this->load->view('default/search_project_scrollajax', $data);

	}

	function endingsoon($offset=0)
	{	

		$this->load->library('pagination');

		$limit = '9';

		$config['base_url'] = site_url('discover/ending_soon/');

		$config['total_rows'] = $this->discover_model->ending_soon_total();

		$config['per_page'] = $limit;		

		$this->pagination->initialize($config);		

		//$data['page_link'] = $this->pagination->create_links();

		$data['total_rows'] = $config['total_rows'];

		$data['per_page'] = $limit;

		$data['offset'] = $offset;

		$data['limit'] = $limit;

		$data['select'] = 'sel_ending_soon';

		$data['id']='';

		$data['link']='discover';

		//$data['idea']=$this->home_model->get_idea();

		$data['city'] = get_all_city();

		$data['result'] = $this->discover_model->ending_soon($offset, $limit);

		$data['search_cat'] = ENDING_SOON; 

		$data['serach_text'] = ENDING_SOON_TEXT; 

		$data['gallery']=$this->home_model->get_gallery();

		$data['site_setting'] = site_setting();

		$data['category'] = $this->home_model->get_category();

		$meta = meta_setting();

		$data['searchprj'] = "";

		$this->home_model->select_text();

		$this->template->write('meta_title','Discover Projects>>Ending Soon-'. $meta['title'], TRUE);

		$this->template->write('meta_description','Ending Soon Campaign-'. $meta['meta_description'], TRUE);

		$this->template->write('meta_keyword', 'Ending Soon Campaign-'.$meta['meta_keyword'], TRUE);

		if(!check_user_authentication()) {  
				$this->template->write_view('header', 'default/common/header', $data, TRUE);
		} 
		else
		{
			$this->template->write_view('header', 'default/common/header_login', $data, TRUE);
		}

		$this->template->write_view('main_content', 'default/search/staffpicks', $data, TRUE);
		$this->template->write_view('footer', 'default/common/footer',$data, TRUE);
	$this->template->render();
	}

	function ending_soon_ajax($offset=0,$searchfor='')
	{
		$limit = '9';

		//$data['total_rows'] = 11;//$this->discover_model->ending_soon_total();

		$data['per_page'] = $limit;

		$data['offset'] = $offset;

		$data['limit'] = $limit;

		$data['site_setting'] = site_setting();

		if($searchfor == 'sel_ending_soon')
		{	
			$config['total_rows'] = $this->discover_model->ending_soon_total();
	
			$data['result'] = $this->discover_model->ending_soon($offset, $limit);
		}

		if($searchfor == 'staff_picks')
		{	$config['total_rows'] = $this->discover_model->staffpicks_count();

			$data['result'] =$this->discover_model->staffpicks($offset, $limit);
		}

		if($searchfor=='sel_popular')
		{	
			$data['total_rows'] = $this->discover_model->popular_total();

			$data['result'] = $this->discover_model->popular($offset, $limit);
		}

		if($searchfor=='sel_launched')

		{	
			$config['total_rows'] = $this->discover_model->recentlylaunched_count();
			$data['result'] =$this->discover_model->recentlylaunched($offset, $limit);
		}

		if($searchfor=='sel_small_project')
		{
			$config['total_rows'] = $this->discover_model->small_projects_total();

			$data['result'] = $this->discover_model->small_projects($offset, $limit);
		}

		if($searchfor == 'sel_most_funded')
		{	
			$config['total_rows'] = $this->discover_model->successful_total();
			$data['result'] = $this->discover_model->successful($offset, $limit);
		}

		if($searchfor == 'sel_projects')
		{	
		/*This load in find frind module where my follow user back on some projects*/
			$config['total_rows'] = $this->home_model->my_follow_back_project_count();
			$data['result'] = $this->home_model->my_follow_back_project($offset, $limit);
		}
		$data['project']='';

		$this->load->view('default/search_project_scrollajax',$data);
	}

	function popular($offset=0)
	{	
		$this->load->library('pagination');

		$limit = '9';

		//$config['base_url'] = site_url('discover/popular/');

		//$config['total_rows'] = $this->discover_model->popular_total();

		//config['per_page'] = $limit;		

		//$this->pagination->initialize($config);		

		//$data['page_link'] = $this->pagination->create_links();

		$data['total_rows'] = $this->discover_model->popular_total();

		//$data['per_page'] = $limit;

		$data['offset'] = $offset;

		$data['link']='discover';

		$data['limit'] = $limit;

		//$data['idea']=$this->home_model->get_idea();

		$data['result'] = $this->discover_model->popular($offset, $limit);

		$data['gallery']=$this->home_model->get_gallery();

		$data['site_setting'] = site_setting();

		$data['category'] = $this->home_model->get_category();

		$data['city'] = get_all_city();

		$meta = meta_setting();

		$data['searchprj'] = "";

		$data['select'] = 'sel_popular';

		$data['id']='';

		$this->home_model->select_text();

		$this->template->write('meta_title','Discover Projects>>Popular-'. $meta['title'], TRUE);
		$this->template->write('meta_description','Popular Campaign-'. $meta['meta_description'], TRUE);
		$this->template->write('meta_keyword','Popular Campaign-'. $meta['meta_keyword'], TRUE);

		if(!check_user_authentication()) {  
				$this->template->write_view('header', 'default/common/header', $data, TRUE);
		} 
	else
		{
			$this->template->write_view('header', 'default/common/header_login', $data, TRUE);
		}

		$this->template->write_view('main_content', 'default/search/popular', $data, TRUE);
		//$this->template->write_view('sidebar', 'default/category', $data, TRUE);
		$this->template->write_view('footer', 'default/common/footer',$data, TRUE);
		$this->template->render();

	}

	function popular_ajax($offset=0)
	{

		$limit = '9';

		$data['total_rows'] = $this->discover_model->popular_total();

		$data['per_page'] = $limit;

		$data['offset'] = $offset;

		$data['limit'] = $limit;

		$data['site_setting'] = site_setting();

		$data['result'] = $this->discover_model->popular($offset, $limit);

		$this->load->view('default/search_project_scrollajax', $data);

	}

	function smallprojects($offset=0)
	{	
		$this->load->library('pagination');

		$limit = '9';

		//$config['base_url'] = site_url('discover/small_projects/');

		$config['total_rows'] = $this->discover_model->small_projects_total();

		$config['per_page'] = $limit;		

		//$this->pagination->initialize($config);		

		$data['page_link'] = $this->pagination->create_links();

		$data['total_rows'] = $config['total_rows'];

		$data['per_page'] = $limit;

		$data['offset'] = $offset;

		$data['limit'] = $limit;

		//$data['idea']=$this->home_model->get_idea();
		$data['result'] = $this->discover_model->small_projects($offset, $limit);

		$data['city'] = get_all_city();

		$data['link']='discover';

		$data['search_cat'] = SMALL_PROJECTS; 

		$data['serach_text'] = SMALL_PROJECTS_TEXT; 

		$data['select'] = 'sel_small_project';

		$data['gallery']=$this->home_model->get_gallery();

		$data['site_setting'] = site_setting();

		$data['category'] = $this->home_model->get_category();

		$meta = meta_setting();

		$data['searchprj'] = "";

		$data['id']='';

		$this->home_model->select_text();
		$this->template->write('meta_title', 'Discover Projects>>Small-'.$meta['title'], TRUE);
		$this->template->write('meta_description','Small Campaign-'. $meta['meta_description'], TRUE);
		$this->template->write('meta_keyword', 'Small Campaign-'.$meta['meta_keyword'], TRUE);
	
		if(!check_user_authentication()) {  
				$this->template->write_view('header', 'default/common/header', $data, TRUE);
		} 
		else
		{
			$this->template->write_view('header', 'default/common/header_login', $data, TRUE);
		}

		$this->template->write_view('main_content', 'default/search/staffpicks', $data, TRUE);
		$this->template->write_view('footer', 'default/common/footer',$data, TRUE);
		$this->template->render();
	}

	function small_projects_ajax($offset=0)
	{
		$limit = '9';

		$data['total_rows'] = $this->discover_model->small_projects_total();

		$data['per_page'] = $limit;

		$data['limit'] = $limit;

		$data['offset'] = $offset;

		$data['site_setting'] = site_setting();

		$data['result'] = $this->discover_model->small_projects($offset, $limit);

		$this->load->view('default/search_project_scrollajax', $data);
	}
	
	function mostfunded($offset=0)
	{	
		$this->load->library('pagination');

		$limit = '9';

		//$config['base_url'] = site_url('discovery/successful/');

		$config['total_rows'] = $this->discover_model->successful_total();

		$config['per_page'] = $limit;		

		$this->pagination->initialize($config);		

		//$data['page_link'] = $this->pagination->create_links();
		$data['total_rows'] = $config['total_rows'];

		$data['per_page'] = $limit;

		$data['offset'] = $offset;

		$data['limit'] = $limit;

		$data['link']='discover';

		//$data['idea']=$this->home_model->get_idea();
		$data['result'] = $this->discover_model->successful($offset, $limit);

		$data['city'] = get_all_city();

		$data['search_cat'] = MOST_FUNDED; 

		$data['serach_text'] = MOST_FUNDED_TEXT; 

		$data['select'] = 'sel_most_funded';

		$data['gallery']=$this->home_model->get_gallery();

		$data['site_setting'] =site_setting();

		$data['category'] = $this->home_model->get_category();

		$meta = meta_setting();

		$data['searchprj'] = "";

		$data['id']='';

		$this->home_model->select_text();

		$this->template->write('meta_title', 'Discover Projects>>-'.$meta['title'], TRUE);
		$this->template->write('meta_description', 'Successful Campaign-'.$meta['meta_description'], TRUE);
		$this->template->write('meta_keyword', 'Successful Campaign-'.$meta['meta_keyword'], TRUE);

		if(!check_user_authentication()) {  
			$this->template->write_view('header', 'default/common/header', $data, TRUE);
		} 

		else
		{
			$this->template->write_view('header', 'default/common/header_login', $data, TRUE);
		}

		$this->template->write_view('main_content', 'default/search/staffpicks', $data, TRUE);
		$this->template->write_view('footer', 'default/common/footer',$data, TRUE);
		$this->template->render();
	}

	function successful_ajax($offset=0)
	{
		$limit = '9';

		$data['total_rows'] = $this->discover_model->successful_total();

		$data['per_page'] = $limit;

		$data['limit'] = $limit;

		$data['offset'] = $offset;

		$data['site_setting'] = site_setting();

		$data['result'] = $this->discover_model->successful($offset, $limit);

		$this->load->view('default/search_project_scrollajax', $data);
	}

	/////////////============Additional Search  =====================

		function city($id="", $offset=0)
		{	
		$this->load->library('pagination');

		$limit = '9';

		//$config['base_url'] = site_url('discover/category/'.$id.'/');

		$config['total_rows'] = $this->discover_model->get_total_city_project($id);

		$config['per_page'] = $limit;		

		$this->pagination->initialize($config);		

		//$data['page_link'] = $this->pagination->create_links();

		$data['total_rows'] = $config['total_rows'];

		$data['per_page'] = $limit;

		$data['offset'] = $offset;

		$data['limit'] = $limit;

		$data['project_city_id'] = $id;

		$data['project_city_id'] =$id;

		$data['city'] = get_all_city();

		$data['search_cat'] = $id;

		$data['serach_text'] = ''; 

		//$data['idea']=$this->home_model->get_idea();

		$data['link']='discover';

		$data['result'] = $this->discover_model->get_city_project($id, $offset, $limit);

		$data['gallery']=$this->home_model->get_gallery();

		$data['site_setting'] = site_setting();

		$data['category'] = $this->home_model->get_category();

		$meta = meta_setting();

		//$data['search_cat'] = project_getcategory_name($id); 

		$data['serach_text'] = ""; 

		$data['searchprj'] = "";

		$data['select']='';

		$data['id']=$id;

		$data['city_name']=$id;

		$this->home_model->select_text();

		$this->template->write('meta_title','Category-'. $meta['title'], TRUE);
		$this->template->write('meta_description','Category-'. $meta['meta_description'], TRUE);
		$this->template->write('meta_keyword','Category-'. $meta['meta_keyword'], TRUE);

	if(!check_user_authentication()) {  
				$this->template->write_view('header', 'default/common/header', $data, TRUE);
		} 
		else
		{
			$this->template->write_view('header', 'default/common/header_login', $data, TRUE);
		}

		$this->template->write_view('main_content', 'default/search/city_project', $data, TRUE);
		//$this->template->write_view('sidebar', 'default/category', $data, TRUE);
		$this->template->write_view('footer', 'default/common/footer',$data, TRUE);
		$this->template->render();

	}

		function city_project_ajax($id=0, $offset=0)
		{
			$limit = '9';

			$data['total_rows'] = 11;//$this->discover_model->ending_soon_total();

			$data['per_page'] = $limit;

			$data['offset'] = $offset;

			$data['limit'] = $limit;

			$data['site_setting'] = site_setting();

			$data['project_city_id'] = $id;

			$data['site_setting'] = site_setting();

			$data['limit'] = $limit;

			$data['result'] = $this->discover_model->get_city_project($id, $offset, $limit);
			$this->load->view('default/search_project_scrollajax', $data);
		}

		function activity($offset=0)
	{
		$this->load->library('pagination');

		$limit = '9';

		$config['base_url'] = site_url('discover/ending_soon/');

		$config['total_rows'] = $this->project_model->get_all_updates_ajax_count();

		$config['per_page'] = $limit;		

		$this->pagination->initialize($config);		

		//$data['page_link'] = $this->pagination->create_links();

		$data['total_rows'] =$this->project_model->get_all_updates_ajax_count();// $config['total_rows'];

		$data['per_page'] = $limit;

		$data['offset'] = $offset;

		$data['limit'] = $limit;

		//$data['idea']=$this->home_model->get_idea();

		$data['city'] = get_all_city();

		$data['result'] =$this->project_model->get_all_updates_ajax($offset, $limit);

		$data['search_cat'] = 'Activity'; 

		$data['serach_text'] = ""; 

		$data['select'] = '';

		$data['gallery']=$this->home_model->get_gallery();

		$data['site_setting'] = site_setting();

		$data['category'] = $this->home_model->get_category();

		$meta = meta_setting();

		$data['searchprj'] = "";

		$data['id']='';

		$this->home_model->select_text();

		$this->template->write('meta_title','Discover Projects>>Activity-'. $meta['title'], TRUE);
		$this->template->write('meta_description','Discover Projects>>Activity-'. $meta['meta_description'], TRUE);
		$this->template->write('meta_keyword', 'Discover Projects>>Activity-'.$meta['meta_keyword'], TRUE);

		if(!check_user_authentication()) {  
				$this->template->write_view('header', 'default/common/header', $data, TRUE);
		} 
		else
		{
			$this->template->write_view('header', 'default/common/header_login', $data, TRUE);
		}

		$this->template->write_view('main_content', 'default/search/activity', $data, TRUE);
		$this->template->write_view('footer', 'default/common/footer',$data, TRUE);
		$this->template->render();
	}

	function ajax_activity($offset=0)
	{
		$limit = '3';

		$data['total_rows'] =$this->project_model->get_all_updates_ajax_count();//$this->discover_model->ending_soon_total();

		$data['per_page'] = $limit;

		$data['offset'] = $offset;

		$data['limit'] = $limit;

		$data['site_setting'] = site_setting();

		$data['result'] = $this->project_model->get_all_updates_ajax($offset, $limit);

		$data['project']='';

		$this->load->view('default/ajax_activity',$data);
	}

	function ajax_search_city($str=null){
		//echo ucfirst(trim($str));die;	
		
		$query=$this->db->query("select project_city from project where project_city like '%".ucfirst(trim($str))."%' group by project_city ");

		//echo $this->db->last_query();die;

		$str='<ul id="srhdiv">';
		
		if($query->num_rows>0){
			$city_data=$query->result_array();

			foreach($city_data as $city){

			$strcity=$city['project_city'];//explode(",",$city['project_address']);

			$str.='<li><a href="'.site_url('discover/city/').'/'.$strcity.'">'.$strcity.'</a></li>';
			}
		}
		$str.='</ul>';
		//echo $str;die;
	}

}
?>