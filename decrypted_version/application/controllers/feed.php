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
class Feed extends ROCKERS_Controller 
{
    function Feed()
    {
     
	 	parent::__construct();	
		$this->load->helper('xml');
		$this->load->helper('text');
		$this->load->model('project_model');
		$this->load->model('user_model');
		$this->load->model('home_model');
		$this->load->model('feed_model');
		
    }    
	
	function index()
	{	
		error_reporting(0);	
		$site_setting = site_setting();
		 $xml='<!-- generator="FeedCreator 1.8.0-dev (info@mypapit.net)" -->
		<rss version="2.0">';
		$xml.='<channel>
        <title>'.$site_setting['site_name'].'</title>
        <description>'.$site_setting['site_name'].'</description>
        <link>'.base_url().'</link>
        <lastBuildDate>'.date('d M,Y').'</lastBuildDate>';		
		$rssdata2 = $this->feed_model->get_latest_projects(10);		
		foreach ($rssdata2 as $new)
		{
			$xml.='<item>';
			$xml.='<title>'.$new['project_title'].'</title>';
			$xml.='<link>'.site_url('projects/'.$new['url_project_title'].'/'.$new['project_id']).'</link>';
			$xml.='<description>'.trim($new['project_summary']).'</description>';
			$xml.='<pubDate>'.$new['date_added'].'</pubDate>';
			$xml.='<guid>'.site_url('projects/'.$new['url_project_title'].'/'.$new['project_id']).'</guid>';
			$xml.='</item>';			
		} 		
        $xml.='</channel>
</rss>';
header("Content-Type: application/xml");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
header("Pragma: public");
echo $xml; die();
	}	
}
?> 