<?php foreach($result as $ru){
		  	$prj=get_one_project($ru['project_id']);
		   ?>
		  
         <li id="upd_<?php echo $ru['update_id'] ?>"> <div class="update_proj">
            <div class="update_proj_lt">
			<?php if($prj['image']!="" && is_file('upload/thumb/'.$prj['image'])){ ?>
              <a href="#"><img src="<?php echo base_url().'upload/thumb/'.$prj['image']; ?>" /></a>
			  <?php }else { ?>
			  <a href="#"><img src="<?php echo base_url().'upload/thumb/no_img.jpg'; ?>" /></a>
			  <?php } ?>
              <a href="#" class="link_discover"><?php echo $prj['project_title']; ?></a><div class="clr"></div>
              <span><img src="<?php echo base_url(); ?>images/music.png" /><?php echo project_getcategory_name($prj['category_id']); ?></span><div class="clr"></div>
              <span><img src="<?php echo base_url(); ?>images/ct_icon.png" /><?php echo get_state_name($prj['project_state']) ?>, <?php echo get_country_name($prj['project_country']); ?></span>
              
            </div>
            
            <div class="update_proj_rt">
              <span class="update_fnt">Project update #<?php echo $ru['update_id'] ?></span><div class="clr"></div>
              <span class="update_bg_fnt"><?php echo $ru['update_title'] ?></span><div class="clr"></div>
			  <?php if(strlen($ru['updates']>70)){
			  	$str=substr($ru['updates'],0,70)."....";
			  }else { $str=$ru['updates']; } ?>
              <span class="update_bg_fnt_sl"><?php echo $str; ?>
			  <?php if(strlen($ru['updates']>70)){?><a href="<?php site_url('project/updates/'.$ru['project_id']); ?>/#upd<?php echo $ru['update_id'] ?>">Read more</a><?php } ?></span>
			  <div class="clr"></div>
			  <?php $total_upc=$this->project_model->get_update_comment_count($ru['update_id']);
			  if($total_upc>0){ ?>
			  <a href="<?php echo site_url('project/updates/'.$ru['project_id']); ?>/#comment_listul<?php echo $ru['update_id'] ?>"><?php echo $total_upc ?> Comments</a>
			  <?php } ?>
         </div>
          
          </div> <div class="clr"></div></li>
		  <?php } ?>