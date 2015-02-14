<?php
$off = $offset + $limit;
$rs->amount = str_replace($site_setting['currency_symbol'], "", $rs->amount);
						if($rs->amount == '0' or $rs->amount == '')
						{
						$w = 0;
						}else{
							if($rs->amount_get>=$rs->amount)
							{
								$w=100;
							}
							else
							{
								$w = ($rs->amount_get/$rs->amount)*100;
								
								if($w>0 && $w<1)
								{
									$w=1;
								}
								
								
			}
	}
?>

    			<div class="project_card" id="<?php echo  $rs->project_id.'_'.$off; ?>">
                
                <?php
				if($rs->video_image !=""){ 
	  	   echo anchor('projects/'.$rs->url_project_title.'/'.$rs->project_id,'<img class="project_img" src="'.$rs->video_image.'" alt="" title="'.ucfirst($rs->project_title).'" />'); 		  
	  }
	 		 else { 
			if(is_file("upload/thumb/".$rs->image)){ 
	  
	   echo anchor('projects/'.$rs->url_project_title.'/'.$rs->project_id,'<img class="project_img" src="'.base_url().'upload/thumb/'.$rs->image.'" alt=""  title="'.ucfirst($rs->project_title).'" />'); 		  
	  
	 
	  } else{ 
			echo anchor('projects/'.$rs->url_project_title.'/'.$rs->project_id,'<img class="project_img" src="'.base_url().'images/no_img.jpg" title="'.ucfirst($rs->project_title).'" />');
			}
	 
	 
}	  ?>
                
                  <?php /*echo anchor('discover/category/'.$rs->category_id,project_getcategory_name($rs->category_id),'class="category_name"');*/ ?>
                 
                 <?php $str_name = substr(ucfirst($rs->project_title),0,20);
              echo anchor('projects/'.$rs->url_project_title.'/'.$rs->project_id,$str_name,'style="text-decoration:none;" class="category_title"');?>
             <?php  $user = get_user_detail($rs->user_id); ?>
			<span><?php echo BY;?></span>
			<?php echo anchor('member/'.$rs->user_id,$user['user_name'].' '.$user['last_name'],'class="prjown"'); ?>
            <div class="clr"></div>

            <p class="prop">
            	    <?php if($rs->project_summary!='') { 
					$str_name=$rs->project_summary;
					if(strlen($str_name)<70)$lenght=strlen($str_name);
					else $lenght=70;
					$pos = strpos($str_name, ' ', $lenght);
					if ($pos !== false) {
						$str_name= substr($str_name, 0, $pos).".....";
					}
					echo $str_name;
					 } ?>
			</p>
            
            <div class="clr"></div>
            <?php /*echo $rs->project_state .",".$rs->project_country;*/ ?>
            <div class="projhr"></div>
             <div class="one">Funded : <span> <?php echo round($w,0); ?>%</span></div>
             <?php if($w=='0') { ?>
          <div class="donated"><?php echo RAISED; ?> : <span><?php echo set_currency('0'); ?></span></div>
             <?php }
			 else{?>
<?php if($rs->amount_get=='')	{?>

	 <div class="donated"><?php echo RAISED; ?> : <span><?php echo set_currency('0'); ?></span></div>
                <?php }else{?>
      <div class="donated"><?php echo RAISED; ?> : <span><?php echo set_currency($rs->amount_get); ?></span></div>
					
				<?php }}?> 
           
            <div class="projectprg">
            	<div class="prjprocal" style="width:<?php echo $w; ?>%;max-width:100%;"></div>
            </div>
           
          <?php echo get_days_left($rs->end_date);?>
           
            <?php /*?><ul class="projectdul">
            <?php if($w=='0') { ?>
            	<li ><h2 class="currency"><?php echo set_currency('0'); ?></h2><p class="raised"><?php echo RAISED; ?></p></li>
             <?php }
			 else{?>
<?php if($rs->amount_get=='')	{?>

					<li ><h2 class="currency"><?php echo set_currency('0'); ?></h2><p class="raised"><?php echo RAISED; ?></p></li>
                <?php }else{?>
					<li ><h2 class="currency"><?php echo set_currency($rs->amount_get); ?></h2><p class="raised"><?php echo RAISED; ?></p></li>			
				<?php }}?>   
                <li style="border:none;"><?php echo get_days_left($rs->end_date);?></li>
            </ul><?php */?>
        	</div>