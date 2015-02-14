<div class="sidebar">

<?php if($this->session->userdata('user_id')!='') { ?>
<div style="margin:100px 0px 0px 23px; ">
<?php } else { ?>
<div style="margin:58px 0px 0px 23px; ">
<?php } ?>

<?php
		$project['amount'] = str_replace($site_setting['currency_symbol'], "", $project['amount']);
		
						$query = $this->db->getwhere('project',array('project_id'=>$project['project_id']));
						$rs = $query->row();
						
						$data['site_setting'] = $site_setting; 
						$data['rs'] = $rs;
						$this->load->view('common_card',$data);
		
	
	?>




</div>

	<div class="clear"></div>
	
	
</div>