<div class="rightcol">
	<ul id="posts" class="quicklinks">
	<h2><?php echo QUICK_LINKS;?></h2>
	<li class="sidelinks"><a href="<?php echo base_url(); ?>"><span><?php echo HOME; ?></a></span></li>
	
	<?php echo $right_menu; ?>
	
	
	
	</ul>
	
	<div class="clear"></div>
	
	<div style="margin-top:20px;">

<?php if(!isset($this->session->userdata['user_id'])) { ?>

	<a href="<?php echo  site_url('home/signup');?>" class="create_project">

	
	<?php  } else { ?>
	 
	 <a href="<?php echo  site_url('user/create');?>" class="create_project">
     
	<?php	 } ?>
	
	<?php echo START_PROJECT;?>
	</a>
	
	</div>
	
</div>