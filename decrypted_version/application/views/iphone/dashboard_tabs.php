<style type="text/css">
.h3sel,.h3notsel{
	margin-right:2px;
}
</style>
<div id="tab_all" style=" margin-left:10px;">
	<?php
   ///////// 
	if($tab_sel==ACCOUNT){
		echo anchor('home/account/','<h3 class="h3notsel">'.ACCOUNT.'</h3>');
	}
	else{
		echo anchor('home/account/','<h3 class="h3sel">'.ACCOUNT.'</h3>');
	}
	
	
	///////////////
	if($tab_sel==NOTIFICATION){
		echo anchor('user/email_setting/','<h3 class="h3notsel">'.NOTIFICATION.'</h3>');
	}
	else{
		echo anchor('user/email_setting/','<h3 class="h3sel">'.NOTIFICATION.'</h3>');
	}
	
	
	/////////////
	if($tab_sel==MY_DONATION){
		echo anchor('user/my_donation/','<h3 class="h3notsel">'.MY_DONATION.'</h3>');
	}
	else{
		echo anchor('user/my_donation/','<h3 class="h3sel">'.MY_DONATION.'</h3>');
	}
	
	
	/////////////
	if($tab_sel==MY_COMMENTS){
		echo anchor('user/my_comment/','<h3 class="h3notsel">'.MY_COMMENTS.'</h3>');
	}
	else{
		echo anchor('user/my_comment/','<h3 class="h3sel">'.MY_COMMENTS.'</h3>');
	}
	
	
	
	////////////
	if($tab_sel==CHANGE_PASSWORD){
		echo anchor('home/change_password/','<h3 class="h3notsel">'.CHANGE_PASSWORD.'</h3>');
	}
	else{
		echo anchor('home/change_password/','<h3 class="h3sel">'.CHANGE_PASSWORD.'</h3>');
	}
	
	
	
	///////////
	$get_wallet_setting=$this->home_model->wallet_setting();
		
		if($get_wallet_setting->wallet_enable==1) {	
		
			if($tab_sel==WALLET){
				echo anchor('wallet/my_wallet/','<h3 class="h3notsel">'.WALLET.'</h3>');
			}
			else{
				echo anchor('wallet/my_wallet/','<h3 class="h3sel">'.WALLET.'</h3>');
			}
		}
		
		
		
		
	///////////	
	
	$wallet_setting=$this->home_model->wallet_setting();
		
		if($wallet_setting->wallet_enable=='1')
		{
				if($tab_sel==INCOMING_FUND){
					echo anchor('project/incoming_fund/','<h3 class="h3notsel">'.INCOMING_FUND.'</h3>');
				}
				else{
					echo anchor('project/incoming_fund/','<h3 class="h3sel">'.INCOMING_FUND.'</h3>');
				}
	
		}
	
	
	
	
	?>
	
	
	&nbsp;
</div>