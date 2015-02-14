<div id="AboutLeft">

 <style type="text/css">
.h3sel,.h3notsel{
	margin-right:3px;
}
</style>
<div id="tab_all" style=" margin-left:10px;">
	<?php
   if($select=='request') {
   	
	
		echo anchor('affiliate/request','<h3 class="h3notsel">'.AFFILIATE_REQUEST.'</h3>');
	
   	}  else {
   
   
		if($select=='stats'){
			echo anchor('affiliate','<h3 class="h3notsel">'.AFFILIATE_STATS.'</h3>');
		}
		else{
			echo anchor('affiliate/','<h3 class="h3sel">'.AFFILIATE_STATS.'</h3>');
		}
		
	
		
		if($select=='commission_history'){
			echo anchor('affiliate/commission','<h3 class="h3notsel">'.AFFILIATE_COMMISSION_HISTORY.'</h3>');
		}
		else{
			echo anchor('affiliate/commission/','<h3 class="h3sel">'.AFFILIATE_COMMISSION_HISTORY.'</h3>');
		}
	
	
	
		if($select=='withdrawal_requests'){
			echo anchor('affiliate/withdrawal_requests','<h3 class="h3notsel">'.AFFILIATE_WITHDRAWAL_REQUESTS.'</h3>');
		}
		else{
			echo anchor('affiliate/withdrawal_requests/','<h3 class="h3sel">'.AFFILIATE_WITHDRAWAL_REQUESTS.'</h3>');
		}
	
	
	
	
	}
		
	
	?>
    
	
	
	&nbsp;
</div>