 <!--====================left==============--> 

  	<div id="container">
<div class="wrap930">	
  
        <?php
		
		$this->load->model('discover_model');
		  	if($result)
			{
		?>
		
<div class="con_left2">
  <!-- <h1><?php echo ucfirst($result['pages_title']); ?></h1>-->
   <h1><?php echo $result['pages_title']; ?></h1>
    <div class="content-region">
	<?php echo str_replace("&gt;",">",str_replace("&lt;","<",$result['description'])); ?>
    </div>
	</div>
	
    <div class="border_line">
            <h2 class="discover_project_cont_top"><?php echo SUCCESS_STORY;?></h2>
            <div class="rt">
              <div class="more"><!--<img src="<?php echo base_url();?>images/mr_arrow.png" />--><?php //echo anchor('discover/mostfunded','See All')?></div>
            </div>
            <div class="clr"></div>
              <div class="project-group">
            <?php	$cnt=1;
			 
			foreach($recent_success_fund as $sp)

			{

             	$data['site_setting'] = site_setting(); 

				$data['rs'] = $sp;

				$this->load->view('default/success_story',$data);

				$cnt++;

			 }?>
             </div>
            <div class="clr"></div>
          </div>
          
    <?php
			}else{
		?>
	
		<div class="con_left">
    
	<p><?php echo NO_RESULT_FOUND; ?></p>
	</div>
	<?php }
	
	 ?>
	
   
  <!--====================left end==============--> 
  
  