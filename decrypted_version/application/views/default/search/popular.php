<section>
	
	
    <div id="page_we">
   	 <div class="section_contain">
     	<h2 class="discover_project_cont_top"><!--<?php echo DISCOVER;?>/--><?php echo POPULARS?></h2><div class="clr"></div>
        <span class="discover_fnt"><?php echo sprintf(DISCOVER_POPULAR_TEXT , $site_setting['site_name']);?></span><div class="clr"></div>
        
        
        <div class="totalwholecontwidth">
        <div style="float:left;">
        <?php if($category){
		$i=1;
		foreach($category as $cat){?>
		<h2 class="discover_project_cont_top"><?php echo $cat->project_category_name;?></h2>
         <div class="rt">
            	<div class="more"><!--<img src="<?php echo base_url();?>images/mr_arrow.png" />--><?php echo anchor('discover/category/'.$cat->project_category_id,'See All' )/*.$cat->project_category_name)*/ ?>

               </div>
                </div>
         <div class="clr"></div>
         
          <div class="wholecontwidth">
          	<?php $result = $this->discover_model->get_categorywise_popular_project($cat->project_category_id,$offset, 3);
			?>
            <?php if($result){
			$j=1;
			foreach($result as $rs)
			{
             	$data['site_setting'] = site_setting(); 
				$data['rs'] = $rs;
				$this->load->view('default/common_card',$data);
			 }$j++;
			}else
			{
				echo NO_RECORDS;
			}?>
            <div class="clr"></div>
            </div>
        <div class="clr"></div>
        <?php }$i++;}?>
		</div>
          <?php 
		  $this->load->view('default/search/search_sidebar');?>
        </div>
    	
    </div>

 
    </div>
    
    
    
</section>

