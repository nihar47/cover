


<section>
  <style>



</style>
  
  <div id="page_we">
    <div class="section_contain">
      <h2 class="discover_project_title"><?php echo DISCOVER_PROJECT_PROJECT;?></h2>
      <div class="clr"></div>
      <span class="discover_fnt"><?php echo GET_START;?></span>
      <div class="clr"></div>
      <div class="totalwholecontwidth">
        <div class="wholecontwidth">
     
          <?php if($most_popular){
			 
			  ?>
          
          <div class="border_line">
            <h2 class="discover_project_cont_top"><?php echo POPULARS;?></h2>
            <div class="rt">
            <?php
			if(count($most_popular)>=3){
			?>
              <div class="more"><!--<img src="<?php echo base_url();?>images/mr_arrow.png" />--><?php echo anchor('discover/popular','See All')?></div>
              <?php }?>
            </div>
            
            <div class="clr"></div>
          <div class="project-group">
            <?php	$cnt=1;
			
			foreach($most_popular as $sp)

			{
				 

             	$data['site_setting'] = site_setting(); 

				$data['rs'] = $sp;

				$this->load->view('default/common_card',$data);

				$cnt++;

			 }?>
             </div>
            <div class="clr"></div>
          </div>
          <div class="clr"></div>
          <?php	}?>
          <?php if($staff_picks){?>
          <div class="border_line">
            <h2 class="discover_project_cont_top"><?php echo TREND;?></h2>
            <div class="rt">
            <?php
			if(count($staff_picks)>=3){
			?>
              <div class="more"><!--<img src="<?php echo base_url();?>images/mr_arrow.png" />--><?php echo anchor('discover/recommended','See All')?></div>
               <?php }?>
            </div>
            <div class="clr"></div>
             <div class="project-group">
			<?php	$cnt=1;	 
			foreach($staff_picks as $sp)

			{

               
             	$data['site_setting'] = site_setting(); 

				$data['rs'] = $sp;					
				 			
				 
				$this->load->view('default/common_card',$data);

				$cnt++;

			 }?>
             </div>
            <div class="clr"></div>
          </div>
          <div class="clr"></div>
          <?php	}?>
          <?php if($recent_success_fund){?>
          <div class="border_line">
            <h2 class="discover_project_cont_top"><?php echo MOST_FUNDED;?></h2>
            <div class="rt">
              <?php
			if(count($recent_success_fund)>=3){
			?>
              <div class="more"><!--<img src="<?php echo base_url();?>images/mr_arrow.png" />--><?php echo anchor('discover/mostfunded','See All')?></div>
               <?php }?>
            </div>
            <div class="clr"></div>
              <div class="project-group">
            <?php	$cnt=1;
			 
			foreach($recent_success_fund as $sp)

			{

             	$data['site_setting'] = site_setting(); 

				$data['rs'] = $sp;

				$this->load->view('default/common_card',$data);

				$cnt++;

			 }?>
             </div>
            <div class="clr"></div>
          </div>
          <div class="clr"></div>
          <?php	}?>
          <div class="clr"></div>
          <h2 class="discover_project_cont_top"><?php echo RECENT_UPDATES; ?></h2>
          <?php //echo count($recent_updates);
		   if(count($recent_updates)>=3){?>
          <div class="rt padbot25">
            <div class="more-activity"><?php echo anchor('discover/activity/','See All');?></div>
          </div> 
          <?php }?>
          
          <div class="clr"></div>
          
         <?php if($recent_updates) {
			 //print_r($recent_updates);
			  $i=0;
		?> <span class="discover_fnt"><?php echo RECENT_POSTS_ABOUT_NEW_AND_OLD_PROJECTS; ?></span><?php	  
			 foreach($recent_updates as $recup)
			  {  $i++;
			     $project=get_project_detail($recup['project_id']);
			     $user=  get_user_detail($project['user_id']);
				 
			    
			  ?>
         
          <div class="clr"></div>
          
          <div class="recent_updates"> 
         <?php if(is_file('upload/thumb/'.$project['image'])){ ?>
              <a href="#"><img src="<?php echo base_url().'upload/thumb/'.$project['image']; ?>"/></a>
			  <?php }else { ?>
			  <a href="#"><img src="<?php echo base_url().'upload/thumb/no_img.jpg'; ?>" /></a>
			  <?php } ?>
       <div class="recent_updates_right">  <h1> Project update #<?php echo $recup['update_id'];?></h1>
        <h2> <?php echo $project['project_title'];?></h2>
        <h3>by <a href=""><?php echo $user['user_name']." ".$user['last_name'];?></a></h3>
       <div id="divShortUpdate_<?php echo $i;?>">
       <p> <?php $updates=$recup['updates'];
	         // echo strlen($updates);  
       		  if (strlen($updates) >90) {
					// truncate string
					$stringCut = substr($updates, 0, 90);
					// make sure it ends in a word so assassinate doesn't become ass...
					echo $updates = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 
					?><a id="hrefReadMore" style="cursor:pointer" onclick="funReadMore(<?php echo $i;?>)">Read more>></a><?php
				}
			else 	
		  echo $updates;
       ?>
       </p>
       </div>
      <!-- <p id="hrefReadMore"  style="font-size:40px">Click me.</p>-->
       
       
       <div id="divUpdates_<?php echo $i;?>" style="display:none" >
       <p><?php echo $recup['updates'];?>
       <a id="hrefReadMoreClose_<?php echo $i;?>"  style="cursor:pointer" onclick="funClose(<?php echo $i;?>)">Less</a>
       </p>
       </div>
         <div class="drama">
         <span> 28</span>
          <a href="">Drama</a><br />
            <a href="" class="city">city</a>
          </div>
       </div>
       

          
          </div>
             
          <ul class="rpul">
            <?php foreach($recent_updates as $ru){

		  	$prj=get_one_project($ru['project_id']);

		   ?>
            <li>
              <?php /*?><div class="update_proj">
                <div class="update_proj_lt">
                  <?php if($prj['image']!="" && is_file('upload/thumb/'.$prj['image'])){ ?>
                  <a href="#"><img src="<?php echo base_url().'upload/thumb/'.$prj['image']; ?>" /></a>
                  <?php }else { ?>
                  <a href="#"><img src="<?php echo base_url().'upload/thumb/no_img.jpg'; ?>" /></a>
                  <?php } ?>
                  <a href="#" class="link_discover"><?php echo $prj['project_title']; ?></a> <span><img src="<?php echo base_url(); ?>images/catrgory.png" /><?php echo project_getcategory_name($prj['category_id']); ?></span> <span><img src="<?php echo base_url(); ?>images/city.png" /><?php echo get_state_name($prj['project_state']) ?>, <?php echo get_country_name($prj['project_country']); ?></span> </div>
                <div class="update_proj_rt"> <span class="update_fnt"><a href="<?php echo site_url('project/updates/'.$ru['project_id']); ?>/#updli<?php echo $ru['update_id'] ?>"">Project update #<?php echo $ru['update_id'] ?></a></span>
                  <div class="clr"></div>
                  <span class="update_bg_fnt"><?php echo $ru['update_title'] ?></span>
                  <div class="clr"></div>
                  <?php if(strlen($ru['updates']>70)){

			  	$str=substr($ru['updates'],0,70)."....";

			  }else { $str=$ru['updates']; } ?>
                  <span class="update_bg_fnt_sl"><?php echo $str; ?>
                  <?php if(strlen($ru['updates']>70)){?>
                  <a href="<?php echo site_url('project/updates/'.$ru['project_id']); ?>/#upd<?php echo $ru['update_id'] ?>">Read more</a>
                  <?php } ?>
                  </span>
                  <div class="clr"></div>
                  <?php $total_upc=$this->project_model->get_update_comment_count($ru['update_id']);

			  if($total_upc>0){ ?>
                  <a href="<?php echo site_url('project/updates/'.$ru['project_id']); ?>/#comment_listul<?php echo $ru['update_id'] ?>"><?php echo $total_upc ?> Comments</a>
                  <?php } ?>
                </div>
              </div><?php */?>
              <div class="clr"></div>
            </li>
            <?php } ?>
          </ul>
          <?php } 
		  }
		  else{ ?>
          <span class="discover_fnt"><?php echo NO_UPDATES_AVAILABLE; ?></span>
          <div class="clr"></div>
          <?php  } ?>
          <div class="clr"></div>
        </div>
        <?php 

		  $this->load->view('default/search/search_sidebar');?>
      </div>
    </div>
  </div>
</section>

<script>
//$(document).ready(function(){
function funReadMore(id)
{
//$("#hrefReadMore").click(function(){
  $("#divShortUpdate_"+id).hide();
  $("#divUpdates_"+id).show();  
  //  $(this).hide();
}
function funClose(id)
{
//$("#hrefReadMoreClose").click(function(){
  $("#divUpdates_"+id).hide();
  $("#divShortUpdate_"+id).show();  
  //  $(this).hide();
}
//});

//});
</script>