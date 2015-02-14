<?php
if($result)
{
	foreach($result as $rs)
	{
		$data['site_setting'] = site_setting(); 
		$data['rs'] = $rs;
		$this->load->view('default/common_card',$data);
 } 
}
?>
