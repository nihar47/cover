<?php
	if($width == "s")
	{
?>	


				<?php
					
						$query = $this->db->getwhere('project',array('project_id'=>$project['project_id']));
						$rs = $query->row();
						
						$data['site_setting'] = $site_setting; 
						$data['rs'] = $rs;
						$data['limit'] = $limit;
						$data['offset'] = $offset;
						
						$this->load->view('common_card',$data);
					
					?>









<?php
	}
	
?>	
	