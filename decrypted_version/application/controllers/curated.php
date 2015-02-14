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


class Curated extends ROCKERS_Controller {

	function Curated()
	{
		parent::__construct();	
		
		$this->load->model('home_model');
		$this->load->model('project_model');
		$this->load->model('curated_model');
		
	}
	
	function index($offset=0)
	{
		
		
		$this->load->library('pagination');
		$limit = '9';
		//$config['base_url'] = site_url('user/profiles/');
		
		//$config['total_rows'] = $this->curated_model->get_total_curated_page();
		//$config['per_page'] = $limit;		
		//$this->pagination->initialize($config);		
		//$data['page_link'] = $this->pagination->create_links();
		$data['result'] = $this->curated_model->get_all_curated_page($offset,$limit);
			$data['total_rows'] = $this->curated_model->get_total_curated_page();
		//$data['total_rows'] = $config['total_rows'];
		//$data['per_page'] = $limit;
		$data['limit'] = $limit;
		$data['offset'] = $offset;
		$data['id']='';
		
		
	//	$data['idea']=$this->home_model->get_idea();
		$data['category'] = $this->home_model->get_category();
		$data['gallery']=$this->home_model->get_gallery();
		$data['site_setting'] = site_setting();
		$data['select'] = 'sel_curated';
		
		$meta = meta_setting();
		$data['searchprj'] = "";
		
		$data['error']="";
		$data['view']="login";
		$data['view']="signup";
		
		$data['city'] = get_all_city();
		$data['search_cat'] = CURATED_PAGES; 
		$data['serach_text'] = CURATED_PAGES_TEXT; 
		

		
		$this->home_model->select_text();
		
		$this->template->write('meta_title','Curated Pages - '. $meta['title'], TRUE);
		$this->template->write('meta_description','Curated Pages - '. $meta['meta_description'], TRUE);
		$this->template->write('meta_keyword','Curated Pages - '. $meta['meta_keyword'], TRUE);
		
		if($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1)
		{
			$this->template->set_master_template('iphone/template.php');
			$this->template->write_view('main_content', 'iphone/curated_details', $data, TRUE);
			$this->template->render();
		}
		elseif(($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1)
		{
			$this->template->set_master_template('mobile/template.php');
			$this->template->write_view('main_content', 'mobile/curated_details', $data, TRUE);
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
			$this->template->write_view('main_content', 'default/curated/curated_pages', $data, TRUE);
			//$this->template->write_view('sidebar', 'default/category', $data, TRUE);
			$this->template->write_view('footer', 'default/common/footer',$data, TRUE);
			$this->template->render();
		}
	}
	
	
	function curated_page_ajax($offset=0)
	{
		$limit = '9';
		$data['total_rows'] = $this->curated_model->get_total_curated_page();
		
		$data['per_page'] = $limit;
		$data['offset'] = $offset;
		$data['limit'] = $limit;
		$data['site_setting'] = site_setting();
		$data['result'] = $this->curated_model->get_all_curated_page($offset, $limit);
		
		$this->load->view('default/curated/curated_pages_ajax', $data);
	}

	
	
	function pages($url_curated_title='')
	{	
		
		

		
		if($url_curated_title=='')
		{
			redirect('curated');
		}
		
		$curated_detail=$this->curated_model->get_curated_details_by_title($url_curated_title);
				
		if(!$curated_detail)
		{
			redirect('curated-pages');
		}

		$limit = '8';
		$offset=0;
		
		
		$data['curated_detail']=$curated_detail;
			
		$curated_id=$curated_detail->curated_id;
			
		
		$this->load->library('pagination');
		
		
		$config['base_url'] = site_url('pages/'.$url_curated_title);
		$config['total_rows'] = $this->curated_model->curated_project_count($curated_id);
		
		$config['per_page'] = $limit;		
		$this->pagination->initialize($config);		
		$data['page_link'] = $this->pagination->create_links();
		
		$data['result'] = $this->curated_model->curated_project($offset, $limit,$curated_id);
		
		/*print_r($data['result']);
                exit;*/
                
                
		$data['offset'] = $offset;
		$data['limit']=$limit;
		$data['total_rows'] = $config['total_rows'];
		$data['per_page'] = $limit;
	
	
		
		$data['curated_id']=$curated_id;
		$data['url_curated_title']=$url_curated_title;
		
		
	
		
		$data['searchprj'] = $this->input->post('searchprj');
		$data['donation'] = $this->home_model->get_latest_donations();
		$data['category'] = $this->home_model->get_category();
		$data['gallery']=$this->home_model->get_gallery();
		$data['idea']=$this->home_model->get_idea();
		
		
		$data['header_menu'] = dynamic_menu(0);
		$data['footer_menu'] = dynamic_menu_footer(0);
		$data['right_menu'] = dynamic_menu_right(0);
		$data['site_setting'] = site_setting();	
		$meta = meta_setting();
		
		
		$this->template->write('meta_title', $curated_detail->curated_title.' - '.$meta['title'], TRUE);
		$this->template->write('meta_description', $curated_detail->curated_title.' - '.$meta['meta_description'], TRUE);
		$this->template->write('meta_keyword', $meta['meta_keyword'], TRUE);
		
		
		if($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1)
		{
			$this->template->set_master_template('iphone/template.php');
			$this->template->write_view('main_content', 'iphone/curated_details', $data, TRUE);
			$this->template->render();
		}
		elseif(($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1)
		{
			$this->template->set_master_template('mobile/template.php');
			$this->template->write_view('main_content', 'mobile/curated_details', $data, TRUE);
			$this->template->render();
		}
		else
		{
				if(!check_user_authentication()) {
				$this->template->write_view('header', 'default/common/header',  $data, TRUE);
				}else
				{
					$this->template->write_view('header', 'default/common/header_login',  $data, TRUE);
				}
			$this->template->write_view('center_content', 'default/curated/curated_details', $data, TRUE);		
			$this->template->write_view('footer', 'default/common/footer',$data, TRUE);
			$this->template->render();
		}
			
			
		
	}
	
	function curated_ajax($curated_id,$n = '')
	{
		$limit = '8';
		$data['offset'] = $n;
		$data['limit']=$limit;
		$data['curated_id']=$curated_id;
		$data['site_setting'] = site_setting();
		$config['total_rows'] = $this->curated_model->curated_project_count($curated_id);
		$data['total_rows']=$config['total_rows'];
		$data['per_page'] = $limit;
		$data['result'] = $this->curated_model->curated_project($n, $limit,$curated_id);
		$this->load->view('default/curated/curated_details_ajax', $data);
	}
	
}?>