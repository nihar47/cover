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

class Help extends ROCKERS_Controller {

	function Help()
	{
		parent::__construct();	
		
		$this->load->model('home_model');
		$this->load->model('project_model');
		$this->load->model('user_model');	
		$this->load->model('help_model');		
		
	}
	
	
	function index()
	{
		
		
		$data['faq_category']=$this->help_model->get_help_category();
		$data['all_faq_category']=$this->help_model->get_parent_faq_category();
		$data['school_title_list']=$this->help_model->get_school_title_list();
		
		$data['site_setting'] = site_setting();
		$meta = meta_setting();	
		$this->home_model->select_text();
		
		
		
		$data['header_menu'] = dynamic_menu(0);
		$data['footer_menu']= dynamic_menu_footer(0);
		$data['right_menu'] = dynamic_menu_right(0);
		
		
		$this->template->write('meta_title','Help Center-'. $meta['title'], TRUE);
		$this->template->write('meta_description','Help Center-'. $meta['meta_description'], TRUE);
		$this->template->write('meta_keyword','Help Center-'. $meta['meta_keyword'], TRUE);
		if(!check_user_authentication()) {
			$this->template->write_view('header', 'default/common/header',  $data, TRUE);
		}else
		{
			$this->template->write_view('header', 'default/common/header_login',  $data, TRUE);
		}
		$this->template->write_view('main_content', 'default/help', $data, TRUE);
		$this->template->write_view('footer', 'default/common/footer',$data, TRUE);
		$this->template->render();
		
	}
	
	function search()
	{
		$keyword='none';
		
		if($this->input->post('searchprj_help')!='')
		{		
			$keyword=strip_tags(trim(str_replace('"','',str_replace(array("?","!","^","'",",","%","$","&","*","#","@","(",")",":",";",">","<","/"),'',$this->input->post('searchprj_help')))));	
			
		}
		
		$data['search_keyword']=$this->input->post('searchprj_help');
			
		$data['search_faq']=$this->help_model->get_search_faq($keyword);
		
		$data['all_faq_category']=$this->help_model->get_parent_faq_category();
		$data['school_title_list']=$this->help_model->get_school_title_list();
		
		
		$data['site_setting'] = site_setting();
		$meta = meta_setting();	
		$this->home_model->select_text();
		
		
		
		if($keyword=='' || $keyword=='none') {  $match_seo='Search'; } else { $match_seo=$keyword; }
		
		$this->template->write('meta_title', $match_seo.'-'.$meta['title'], TRUE);
		$this->template->write('meta_description', $meta['meta_description'], TRUE);
		$this->template->write('meta_keyword', $meta['meta_keyword'], TRUE);
		if(!check_user_authentication()) {
			$this->template->write_view('header', 'default/common/header',  $data, TRUE);
		}else
		{
			$this->template->write_view('header', 'default/common/header_login',  $data, TRUE);
		}
		$this->template->write_view('main_content', 'default/search_faq', $data, TRUE);
		$this->template->write_view('footer', 'default/common/footer',$data, TRUE);
		$this->template->render();
	
	}
	
	
	
	function faq($faq_category_url_name='')
	{
	
		if($faq_category_url_name=='')
		{
			redirect('help/');
		}
	
		$selected_faq_category=$this->help_model->get_one_category_detail($faq_category_url_name);
		$data['selected_faq_category']=$selected_faq_category;
		
		$data['selected_faq_sub_category']=$this->help_model->get_sub_faq_category($selected_faq_category->faq_category_id);
	
		$data['all_faq_category']=$this->help_model->get_parent_faq_category();
		$data['school_title_list']=$this->help_model->get_school_title_list();
		
		$data['search_faq']='';
		
		$data['site_setting'] = site_setting();
		$meta = meta_setting();	
		$this->home_model->select_text();
		
		
		
		$data['header_menu'] = dynamic_menu(0);
		$data['footer_menu'] = dynamic_menu_footer(0);
		$data['right_menu'] = dynamic_menu_right(0);
		
		
		
		$this->template->write('meta_title', $selected_faq_category->faq_category_name.'-'.$meta['title'], TRUE);
		$this->template->write('meta_description', $selected_faq_category->faq_category_name.'-'.$meta['meta_description'], TRUE);
		$this->template->write('meta_keyword', $selected_faq_category->faq_category_name.'-'.$meta['meta_keyword'], TRUE);
		if(!check_user_authentication()) {
			$this->template->write_view('header', 'default/common/header',  $data, TRUE);
		}else
		{
			$this->template->write_view('header', 'default/common/header_login',  $data, TRUE);
		}
		
		$this->template->write_view('main_content', 'default/faq_list', $data, TRUE);
		$this->template->write_view('footer', 'default/common/footer',$data, TRUE);
		$this->template->render();
		
	}
	
	
	
	function guidelines()
	{
				
		$data['all_faq_category']=$this->help_model->get_parent_faq_category();
		$data['school_title_list']=$this->help_model->get_school_title_list();
		
		$guidelines=$this->help_model->get_guidelines();
		$data['guidelines']=$guidelines;
		
		
		
		$data['site_setting'] = site_setting();
		$meta = meta_setting();	
		$this->home_model->select_text();
		
		
		
		$data['header_menu'] = dynamic_menu(0);
		$data['footer_menu'] = dynamic_menu_footer(0);
		$data['right_menu'] = dynamic_menu_right(0);
		
		
		
		$this->template->write('meta_title', $guidelines->guidelines_meta_title, TRUE);
		$this->template->write('meta_description', $guidelines->guidelines_meta_keyword, TRUE);
		$this->template->write('meta_keyword', $guidelines->guidelines_meta_description, TRUE);
		if(!check_user_authentication()) {
			$this->template->write_view('header', 'default/common/header',  $data, TRUE);
		}else
		{
			$this->template->write_view('header', 'default/common/header_login',  $data, TRUE);
		}
		
		$this->template->write_view('main_content', 'default/guidelines', $data, TRUE);
		$this->template->write_view('footer', 'default/common/footer',$data, TRUE);
		$this->template->render();
	
	}
	
	
	function school($school_title='')
	{
		
		$data['all_faq_category']=$this->help_model->get_parent_faq_category();
		$data['school_title_list']=$this->help_model->get_school_title_list();
		
				
		
		$data['site_setting'] = site_setting();
		$meta = meta_setting();	
		$this->home_model->select_text();
		
		
		
		$data['header_menu'] = dynamic_menu(0);
		$data['footer_menu'] = dynamic_menu_footer(0);
		$data['right_menu'] = dynamic_menu_right(0);
		
		
		
		if($school_title!='')
		{
			$school_details=$this->help_model->get_school_details($school_title);
			$data['school_details']=$school_details;
			
			
					$this->template->write('meta_title',$school_details->title.'-'.$data['site_setting']['site_name'].' School-'.$meta['title'], TRUE);
		$this->template->write('meta_description', $school_details->title.'-'.$data['site_setting']['site_name'].' School-'.$meta['meta_description'], TRUE);
		$this->template->write('meta_keyword', $school_details->title.'-'.$data['site_setting']['site_name'].' School-'.$meta['meta_keyword'], TRUE);
		
	
			if(!check_user_authentication()) {
			$this->template->write_view('header', 'default/common/header',  $data, TRUE);
		}else
		{
			$this->template->write_view('header', 'default/common/header_login',  $data, TRUE);
		}
		
			$this->template->write_view('main_content', 'default/school_detail', $data, TRUE);
			$this->template->write_view('footer', 'default/common/footer',$data, TRUE);
			$this->template->render();
		
		}
		
		else
		{
			
			$this->template->write('meta_title', $data['site_setting']['site_name'].' School-'.$meta['title'], TRUE);
			$this->template->write('meta_description', $data['site_setting']['site_name'].' School-'.$meta['meta_description'], TRUE);
			$this->template->write('meta_keyword', $data['site_setting']['site_name'].' School-'.$meta['meta_keyword'], TRUE);
			$this->template->write_view('header', 'default/header', $data, TRUE);
			$this->template->write_view('main_content', 'default/school_main', $data, TRUE);
			$this->template->write_view('footer', 'default/footer',$data, TRUE);
			$this->template->render();
		
		}
		
		
		
		
		
		
	
	}
	 function stats(){
		
		$data['all_faq_category']=$this->help_model->get_parent_faq_category();
		$data['school_title_list']=$this->help_model->get_school_title_list();
		
		$data['result'] = get_all_category();
		
		
		$data['site_setting'] = site_setting();
		$meta = meta_setting();
		$this->home_model->select_text();
		$this->template->write('meta_title', $data['site_setting']['site_name'].' State-'.$meta['title'], TRUE);
		$this->template->write('meta_description', $data['site_setting']['site_name'].' State-'.$meta['meta_description'], TRUE);
		$this->template->write('meta_keyword', $data['site_setting']['site_name'].' State-'.$meta['meta_keyword'], TRUE);
		if(!check_user_authentication()) {
		$this->template->write_view('header', 'default/common/header', $data, TRUE);
		}else
		{
		$this->template->write_view('header', 'default/common/header_login', $data, TRUE);
		}
		$this->template->write_view('main_content', 'default/stats',$data,TRUE);
		$this->template->write_view('footer', 'default/common/footer',$data, TRUE);
		$this->template->render();

	}

	




}


?>