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


class Newsletter extends ROCKERS_Controller {

	function Newsletter()
	{
		parent::__construct();	
		$this->load->model('newsletter_model');
		$this->load->model('home_model');
		$this->load->model('project_model');
		$this->load->model('user_model');		
		
	}
	
	function index()
	{
		
		redirect('home/');	
	}
	
	
	
	function sub_news()
	{
		$data['error']='';
		
		$site_setting = site_setting();
		$data['site_setting'] =  site_setting();
		
			if($this->agent->is_mobile('iphone') && $data['site_setting']['mobile_site'] == 1)
			{
				$this->template->set_master_template('iphone/template.php');
				$this->template->write_view('main_content', 'iphone/newsletter/newsletter', $data, TRUE);
				$this->template->render();
			}
			
			if(($this->agent->is_mobile() || $this->agent->is_robot()) && $data['site_setting']['mobile_site'] == 1)
			{
				$this->template->set_master_template('mobile/template.php');
				$this->template->write_view('main_content', 'mobile/newsletter/newsletter', $data, TRUE);
				$this->template->render();
			}
			
		
	}
	
	function subscribe($subscribe_email='',$newsletter_id='')
	{		
						
		if($subscribe_email=='')
		{
			if($this->input->post('subscribe_email')=='')
			{
				redirect('home');
			}
			else
			{
				$subscribe_email=$this->input->post('subscribe_email');
			}
		}
				
		$make_subscribe=$this->newsletter_model->make_new_subscription($subscribe_email,$newsletter_id='');
		
		if($make_subscribe==2)
		{
			$data['error']='user_exists';
		}
		
		if($make_subscribe==1)
		{
			$data['error']='successfull';
		}
		
		if($make_subscribe==3)
		{
			$data['error']='not_found';
		}
		
		$data['subscribe_email']=$subscribe_email;
		
	
		$data['header_menu'] = dynamic_menu(0);
		$data['footer_menu'] = dynamic_menu_footer(0);
		$data['right_menu'] = dynamic_menu_right(0);
		
		
	
		$data['donation'] = $this->home_model->get_latest_donations();
		$data['gallery']=$this->home_model->get_gallery();
		$data['site_setting'] = site_setting();
		
		$data['idea']=$this->home_model->get_idea();
		$this->home_model->select_text();
		
		$site_setting = site_setting();
		
		$this->template->write('meta_title', 'Newsletter Subscription-'.$site_setting['site_name'] , TRUE);
		$this->template->write('meta_description', 'Newsletter Subscription-'.$site_setting['site_name'], TRUE);
		$this->template->write('meta_keyword', 'Newsletter Subscription-'.$site_setting['site_name'], TRUE);
		if(!check_user_authentication()) {  
				$this->template->write_view('header', 'default/common/header', $data, TRUE);
		} 
		else
		{
			$this->template->write_view('header', 'default/common/header_login', $data, TRUE);
		}
		
		$this->template->write_view('main_content', 'default/newsletter/subscribe', $data, TRUE);
	//	$this->template->write_view('sidebar', 'default/sidebar', $data, TRUE);
		$this->template->write_view('footer', 'default/common/footer', $data, TRUE);
		$this->template->render();
	
	
	}
	
	function unsubscribe($subscribe_email,$newsletter_id='')
	{
		if($subscribe_email=='')
		{
			if($this->input->post('subscribe_email')=='')
			{
				redirect('home');
			}
			else
			{
				$subscribe_email=$this->input->post('subscribe_email');
			}
		}
				
		$make_unsubscribe=$this->newsletter_model->make_unsubscribe($subscribe_email,$newsletter_id='');
		
		if($make_unsubscribe==1)
		{
			$data['error']='successfull';
		}
		
		if($make_unsubscribe==3)
		{
			$data['error']='not_found';
		}
		
		$data['subscribe_email']=$subscribe_email;
		$data['header_menu'] = dynamic_menu(0);
		$data['footer_menu'] = dynamic_menu_footer(0);
		$data['right_menu'] = dynamic_menu_right(0);
		
		
	
		$data['donation'] = $this->home_model->get_latest_donations();
		$data['gallery']=$this->home_model->get_gallery();
		$data['site_setting'] = site_setting();
		$data['idea']=$this->home_model->get_idea();
		$this->home_model->select_text();
		
		$site_setting = site_setting();
		
		$this->template->write('meta_title', 'Newsletter Unsubscription-'.$site_setting['site_name'] , TRUE);
		$this->template->write('meta_description', 'Newsletter Unsubscription-'.$site_setting['site_name'], TRUE);
		$this->template->write('meta_keyword', 'Newsletter Unsubscription-'.$site_setting['site_name'], TRUE);
		if(!check_user_authentication()) {  
				$this->template->write_view('header', 'default/common/header', $data, TRUE);
		} 
		else
		{
			$this->template->write_view('header', 'default/common/header_login', $data, TRUE);
		}
		
		$this->template->write_view('main_content', 'default/newsletter/unsubscribe', $data, TRUE);
//		$this->template->write_view('sidebar', 'default/sidebar', $data, TRUE);
		$this->template->write_view('footer', 'default/common/footer', $data, TRUE);
		$this->template->render();
	}	
	
	
	function open($report_id='')
	{
		if($report_id!='')
		{
			$this->newsletter_model->track_report($report_id);
		}
	}
	
	
}

?>