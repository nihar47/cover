<div data-role="header" data-position="inline">
	<h1><?php echo ucfirst($result['user_name']).' '.ucfirst(substr($result['last_name'],0,1)); ?>.</h1>
	<?php echo anchor('home','Home','class="ui-btn-right"'); ?>
</div>
<div class="pad15">
<div id="s1postJ">
		<?php
            if($result['image']!='') {  
                if(file_exists(base_path().'upload/thumb/'.$result['image'])) { ?>  
                     <img src="<?php echo base_url(); ?>upload/thumb/<?php echo $result['image'];?>" width="50" height="50" alt="" />
        <?php } else { ?>   
                     <img src="<?php echo base_url(); ?>upload/thumb/no_img.jpg" width="50" height="50" alt="" />
        <?php } } else { ?>
                     <img src="<?php echo base_url(); ?>upload/thumb/no_img.jpg" width="50" height="50" alt="" />
        <?php } ?>   
		<?php echo $result['user_name'].' '.$result['last_name']; ?>
    </div>
	
	<div class="nbox nopad">
    
        <h3 id="detail-bg1" style="margin:0px;border-radius: 8px 8px 0px 0px;" >
            <div class="fl">Account Information</div>
            <div class="fr"><?php echo anchor('user/edit','Edit','class="Aedit unl"'); ?></div>
            <div class="clear"></div>
        </h3>
        <hr>
        
        <div class="marL10">
            <ul class="Acul1">
                <li><span class="about">Name :</span> <?php echo  $result['user_name'].' '.$result['last_name']; ?> </li>
                <li><span class="about">Email :</span>  <a href="mailto:<?php echo $result['email']; ?>" class="fpass"><?php echo $result['email']; ?></a></li>
                <li><span class="about">Zip code :</span> <span ><?php if($result['zip_code']=='') { echo anchor('user/edit','add','class="fpass"'); } else { echo $result['zip_code']; } ?></span></li>
            </ul>     
        </div>
    </div>
	
	<div class="nbox nopad marT25">
    
        <h3 id="detail-bg1" style="margin:0px; border-radius: 8px 8px 0px 0px;" >
            <div class="fl">Location</div>
            <div class="fr"><?php echo anchor('user_other/locations','Edit','class="Aedit unl"');?></div>
            <div class="clear"></div>
        </h3>
        <hr>
    
        <ul data-role="listview" class="ui-listview">        
             <li class="ui-li ui-body-c" style="border-radius: 0px 0px 8px 8px;"><div class="padTB5">
                     <?php                       
                            
                           	echo '<h3 class="ui-li-heading">Address Information</h3>';
							$address= $result['address'];
                            $city = $result['city'];
                            $state = $result['state'];
							$country = $result['country'];
                            $zipcode = $result['zip_code'];
                             
                             echo '<p class="ui-li-desc">';
                            if($address != '') { echo $address.', ';} 
                            if($city != '') { echo $city.', ';}
                            if($state != '') { echo $state.', ';}
							 if($country != '') { echo $country.', ';}
                            if($zipcode != '') { echo $zipcode;}	
                            echo '</p>';					
                    ?>
              </div></li>
              
           
        </ul>
    
    </div>
	<?php echo $this->load->view('mobile/user_sidebar'); ?>
	</div>