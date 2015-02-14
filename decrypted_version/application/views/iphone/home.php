<div data-role="header">
		<center>
        <div class="marTB5">
		<?php 
		  /* $logo = logo_image();
			if($logo){
				if($logo->template_logo != '') {
					if(file_exists(base_path().'/images/logo/'.$logo->template_logo)) {
						echo anchor(base_url(),"<img src='".base_url()."/images/logo/".$logo->template_logo."' />",'style="outline:none;"'); 
					} else {
						echo anchor(base_url(),"<img src='".base_url()."/images/logo.png' />",'style="outline:none;"'); 
					}
				} else {
					echo anchor(base_url(),"<img src='".base_url()."/images/logo.png' />",'style="outline:none;"'); 
				}
			} else {*/
				echo anchor('home',"<img src='".base_url()."/upload/orig/57346logo.png' />",'style="outline:none;"'); 
			//}
		   
		 ?>
        </div>
        </center>
</div>
<div class="main">   
     
    <?php 
		if($this->session->userdata('user_id') !='')
		{
		
			//echo anchor('new_task','Post a Task','data-role="button" data-icon="arrow-r" data-theme="b"');     
     
			//echo anchor('user_task/mytasks','My Posted Tasks','data-role="button" data-icon="arrow-r" data-theme="b"');

	 		//$check_is_worker=check_is_worker(get_authenticateUserID());
					
			
		 	echo anchor('start_project/create_step1',CREATE_PROJECT,'data-role="button" data-icon="arrow-r" data-theme="b"');
			
   			echo anchor('home/account','My Profile','data-role="button" data-icon="arrow-r" data-theme="b"');
	 
			 echo anchor('home/dashboard','My Dashboard','data-role="button" data-icon="arrow-r" data-theme="b"');
			//if($this->session->userdata('facebook_id') != 0 && $this->session->userdata('facebook_id') != '' )
			//{
				//echo anchor($data['fbLogoutURL'],'Log Out','data-role="button" data-icon="arrow-r" data-theme="b"');
			//} else {
				echo anchor('home/logout','Log Out','data-role="button" data-icon="arrow-r" data-theme="b"'); 
			//}
			
			//echo anchor('http://groupfund.me/crips/','Full Site','data-role="button" data-icon="arrow-r" data-theme="b"');		
			echo '<br />';
    ?> 

     
    
	<?php
    
       /* $city_name='Pick a City';
    
       /* $current_city_id=getCurrentCity();
        if($current_city_id>0)
        {
            $current_city_name=getCityName($current_city_id);
        
            if(isset($current_city_name)) {  $city_name=$current_city_name; }
        }*/
    
    	//echo anchor('pick_city','My City : '.$city_name.' (Change)','data-role="button" data-icon="arrow-r" data-theme="b"');
		
		} else {
			
			echo anchor('home/login','Log In','data-role="button" data-icon="arrow-r" data-theme="b"');
				
			echo anchor('home/signup','Sign Up','data-role="button" data-icon="arrow-r" data-theme="b"');	
			
			echo anchor('search','Projects','data-role="button" data-icon="arrow-r" data-theme="b"');	
			
			//echo anchor('http://groupfund.me/crips/','Full Site','data-role="button" data-icon="arrow-r" data-theme="b"');	
			
			echo anchor('newsletter/sub_news','Newsletter Subscription','data-role="button" data-icon="arrow-r" data-theme="b"');	
		}
	?>
 
</div>
