<?php
	if($width == "s")
	{		
		$query = $this->db->get_where('project',array('project_id'=>$project['project_id']));
		$rs = $query->row();
		$data['site_setting'] = $site_setting; 
		$data['rs'] = $rs;
		$data['limit'] = $limit;
		$data['offset'] = $offset;
		$this->load->view('default/common_card',$data);
	}
	
?>	
	