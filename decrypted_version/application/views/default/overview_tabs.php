<style type="text/css">
.h3sel,.h3notsel{
	margin-right:3px;
}
</style>
<div id="tab_all" style=" margin-left:10px;">
	<?php
   ///////// 
	if($tab_sel==OVERVIEW){
		echo anchor('home/dashboard/'.$this->session->userdata('project_id'),'<h3 class="h3notsel">'.OVERVIEW.'</h3>');
	}
	else{
		echo anchor('home/dashboard/'.$this->session->userdata('project_id'),'<h3 class="h3sel">'.OVERVIEW.'</h3>');
	}
	
	
	///////////////
	if($tab_sel==UPDATES){
		echo anchor('project/updates/'.$this->session->userdata('project_id'),'<h3 class="h3notsel">'.UPDATES.'</h3>');
	}
	else{
		echo anchor('project/updates/'.$this->session->userdata('project_id'),'<h3 class="h3sel">'.UPDATES.'</h3>');
	}
	
	
	/////////////
	if($tab_sel==COMMENTS){
		echo anchor('project/comments/'.$this->session->userdata('project_id'),'<h3 class="h3notsel">'.COMMENTS.'</h3>');
	}
	else{
		echo anchor('project/comments/'.$this->session->userdata('project_id'),'<h3 class="h3sel">'.COMMENTS.'</h3>');
	}
	
	
	/////////////
	if($tab_sel==DONATIONS){
		echo anchor('project/donations/'.$this->session->userdata('project_id'),'<h3 class="h3notsel">'.DONATIONS.'</h3>');
	}
	else{
		echo anchor('project/donations/'.$this->session->userdata('project_id'),'<h3 class="h3sel">'.DONATIONS.'</h3>');
	}
	
	
	
	////////////
	if($tab_sel==PERKS){
		echo anchor('project/perks/'.$this->session->userdata('project_id'),'<h3 class="h3notsel">'.PERKS.'</h3>');
	}
	else{
		echo anchor('project/perks/'.$this->session->userdata('project_id'),'<h3 class="h3sel">'.PERKS.'</h3>');
	}
	
	
		
	///////////	
	
	if($tab_sel==GALLERY){
		echo anchor('project/project_gallery/'.$this->session->userdata('project_id'),'<h3 class="h3notsel">'.GALLERY.'</h3>');
	}
	else{
		echo anchor('project/project_gallery/'.$this->session->userdata('project_id'),'<h3 class="h3sel">'.GALLERY.'</h3>');
	}
	
	
	
	///////////	
	
	if($tab_sel==WIDGETS){
		echo anchor('project/widgets/'.$this->session->userdata('project_id'),'<h3 class="h3notsel">'.WIDGETS.'</h3>');
	}
	else{
		echo anchor('project/widgets/'.$this->session->userdata('project_id'),'<h3 class="h3sel">'.WIDGETS.'</h3>');
	}
	
	
	
	
	///////////	
	
	if($tab_sel==SHARE){
		echo anchor('project/share/'.$this->session->userdata('project_id'),'<h3 class="h3notsel">'.SHARE.'</h3>');
	}
	else{
		echo anchor('project/share/'.$this->session->userdata('project_id'),'<h3 class="h3sel">'.SHARE.'</h3>');
	}
	
	
	
	
	
	/*///////////	
	$wallet_setting = wallet_setting();
		
		if($wallet_setting->wallet_enable=='1')
		{
				if($tab_sel==INCOMING_FUND){
					echo anchor('wallet/incoming_fund/'.$this->session->userdata('project_id'),'<h3 class="h3notsel">'.INCOMING_FUND.'</h3>');
				}
				else{
					echo anchor('wallet/incoming_fund/'.$this->session->userdata('project_id'),'<h3 class="h3sel">'.INCOMING_FUND.'</h3>');
				}
	
		}*/
	
	
	?>
    
	
	
	&nbsp;
</div>

