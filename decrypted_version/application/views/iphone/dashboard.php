<div data-role="header" data-position="inline">
	<h1><?php echo "Dashboard"; ?></h1>
	<?php echo anchor('home','Home','class="ui-btn-left"'); ?>
	<?php // echo anchor(base_url(),'Home','class="ui-btn-left"'); ?>
	<?php  // error_reporting(0); if($this->session->userdata['project_id']!='' && $this->session->userdata['project_id']!=0) {  ?>
		
	 <?php echo anchor('user/my_project/',CHANGE_PROJECT,'class="ui-btn-right"'); ?>
</div>
<div class="pad15">
<div id="s1postJ">
		<?php
            /*if($result['image']!='') {  
                if(file_exists(base_path().'upload/thumb/'.$result['image'])) { ?>  
                     <img src="<?php echo base_url(); ?>upload/thumb/<?php echo $result['image'];?>" width="50" height="50" alt="" />
        <?php } else { ?>   
                     <img src="<?php echo base_url(); ?>upload/thumb/no_img.jpg" width="50" height="50" alt="" />
        <?php } } else {*/ ?>
                     <!--<img src="<?php //echo base_url(); ?>upload/thumb/no_img.jpg" width="50" height="50" alt="" />-->
        <?php //} ?>
	<?php echo $this->session->userdata('user_name')?>
</div>

	<div class="nbox nopad marT25">

    <h3 id="detail-bg1" style=	"margin:0px; border-radius: 8px 8px 0px 0px;">Your Dashboard</h3>
    <hr>

    <div class="padTB10 marL10">
        <ul class="accr">
             <li><?php echo anchor('project/updates/'.$this->session->userdata('project_id'),UPDATES);?></li>
            <li><?php echo anchor('project/comments/'.$this->session->userdata('project_id'),COMMENTS);?></li>
            <li><?php echo anchor('project/perks/'.$this->session->userdata('project_id'),PERKS );?></li>
            <li><?php echo anchor('project/donations/'.$this->session->userdata('project_id'),DONATIONS);?></li>
			  <li><?php echo anchor('project/edit_project/'.$this->session->userdata('project_id'),'Edit Project');?></li>
            
        </ul>                                   
     </div>
     
</div>



</div>