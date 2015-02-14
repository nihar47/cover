<?php
if($result)
{
	foreach($result as $rs)
	{
		$data['site_setting'] = site_setting(); 
		$data['rs'] = $rs;
		echo '<div id="project-'.$rs->project_id.'" style="float:left;">';
		$this->load->view('default/common_card',$data);
		echo '</div>';
	} 
}
?>