<!--<div data-role="header" data-position="inline">
	<h1>Task Detail <?php //echo $project_user['url_project_title'];?></h1>
</div>-->

<div data-role="header" data-position="inline">
     <?php echo anchor('search/index','Project','class="ui-btn-left"'); ?>
	<h1>Project Detail</h1>
    <?php  echo anchor('home','Home','class="ui-btn-right"'); ?>
</div>
<div class="pad15">

	<ul data-role="listview" class="ui-listview">
			<li data-theme="c" class="ui-btn ui-btn-icon-right ui-li-has-arrow ui-li ui-li-has-thumb ui-btn-up-c"><div class="ui-btn-inner ui-li"><div class="ui-btn-text">
			
            <?php echo anchor('user/'.$project['url_project_title'],'<img src="'.base_url().'/upload/thumb/'.$project['image'].'" alt="" width="50" height="50"/>', 'class="ui-link" '); ?>
			<span style="vertical-align:top;"><?php echo ucfirst($project['project_title']); ?></span>
			</div><span class="ui-icon ui-icon-arrow-r ui-icon-shadow"></span></div></li>

		</ul>
		<br />
	
	<div class="nbox">
	<h3>Details</h3>
	<hr>
		<p><b>Title : </b><?php echo ucfirst($project['project_title']); ?></p>
		<p class="marT5"><b>Description:</b>
		<?php  
			echo $project['project_summary']." ";	
		?>
		</p>
		<p class="marT5"><b>Project Owner:</b>
		<?php  
			$userdata = get_user_detail($project_user['user_id']);
			echo "<b>".ucfirst($userdata['user_name'])." ".ucfirst($userdata['last_name'])."</b>";
		?>
		</p>

<!--<p><b>Can be done:</b> Online or by phone</p>
<p><b>Task should be completed by:</b>3 days ago</p>-->

</div>
	<br />
	

	
	

	<ul class="ui-listview ui-listview-inset ui-corner-all ui-shadow" data-role="listview" data-inset="true" data-theme="d" data-divider-theme="d">
    <li class="ui-li ui-li-divider ui-btn ui-bar-d ui-corner-top ui-btn-up-undefined" role="heading" data-role="list-divider"><?php echo PROJECT_DETAILS_COMMENTS; ?></li>
       <li class="ui-btn ui-btn-icon-right ui-li-has-arrow ui-li ui-btn-up-d" data-theme="d"><div class="ui-btn-inner ui-li"><div class="ui-btn-text">       
	 <?php  echo anchor('project/getcomment'.'/'.$project['project_id'],'<h3>'.$project['project_title'].'</h3>');
	    //echo anchor('project/edit_task/'.$project['project_id'],'Edit Task','class="ui-link-inherit"'); ?>
	   </div><span class="ui-icon ui-icon-arrow-r ui-icon-shadow"></span></div></li>
  </ul>
	<?php 
	if($showcomment == 'showcomment'){	
	if($comments)
		{
			foreach($comments as $cmt)
			{?>
			<p class="marT5">
			<?php if(is_file('upload/thumb/'.$cmt['image'])) {  ?>
					 <a href="<?php echo site_url('member/'.$cmt['user_id']); ?>"><img src="<?php echo base_url(); ?>upload/thumb/<?php echo $cmt['image']; ?>" width="60" height="60" alt="" style=" border:1px solid lightGrey;" /> </a>
					<?php } else { ?>
					 <a href="<?php echo site_url('member/'.$cmt['user_id']); ?>"><img src="<?php echo base_url(); ?>upload/thumb/no_person.png" width="60" height="60" alt="" style=" border:1px solid lightGrey;" /></a>
					<?php } ?>
					
		<?php }?>		
		
			</p>
			<p class="marT5">
				<?php echo anchor('member/'.$cmt['user_id'],ucfirst($cmt['user_name'])); ?> <?php echo SAYS; ?>: 				
					<span><?php echo ucfirst($cmt['comments']); ?></span>
			</p>
			<?php } 
		else
		{
				echo '<li class="common_li"> <div align="center" style="text-align:center; font-weight:bold; font-size:14px;">'.NO_COMMENTS.'</div></li>';
			 }
	}
		?>
	<br />
	<ul class="ui-listview ui-listview-inset ui-corner-all ui-shadow" data-role="listview" data-inset="true" data-theme="d" data-divider-theme="d">
    <li class="ui-li ui-li-divider ui-btn ui-bar-d ui-corner-top ui-btn-up-undefined" role="heading" data-role="list-divider"><?php echo PROJECT_DETAILS_BACKERS; ?></li>
       <li class="ui-btn ui-btn-icon-right ui-li-has-arrow ui-li ui-btn-up-d" data-theme="d"><div class="ui-btn-inner ui-li"><div class="ui-btn-text">       
	 <?php  echo anchor('project/getbacker'.'/'.$project['project_id'],'<h3>'.$project['project_title'].'</h3>');
	    //echo anchor('project/edit_task/'.$project['project_id'],'Edit Task','class="ui-link-inherit"'); ?>
	   </div><span class="ui-icon ui-icon-arrow-r ui-icon-shadow"></span></div></li>
  </ul>
	<?php 	
	if($showbacker == 'showbacker'){?>
		<div class="nbox">
	<h3><?php echo PROJECT_DETAILS_BACKERS; ?></h3>
	<hr>
		
		<?php if($backers)
			{
			foreach($backers as $bk)
			{?>
			<p class="marT5">
			<?php  if($bk->image!='' && is_file('upload/thumb/'.$bk->image) ) { 
			 	if($bk->trans_anonymous=='3'){
					$bk_image = 'no_man.gif';
					?><img src="<?php echo base_url();?>upload/thumb/<?php echo $bk_image; ?>" height="72" width="72" border="0" style=" border:1px solid lightGrey;" /><?php
				}
				else{
					$bk_image = $bk->image; 
					?>
			<ul data-role="listview" class="ui-listview">
				<li data-theme="c" class="ui-btn ui-btn-icon-right ui-li-has-arrow ui-li ui-li-has-thumb ui-btn-up-c">
					<div class="ui-btn-text">
						<a href="<?php echo site_url('member/'.$bk->user_id); ?>"><img src="<?php echo base_url();?>upload/thumb/<?php echo $bk_image; ?>" height="72" width="72" border="0" style=" border:1px solid lightGrey;" /></a>
						<?php if($bk->trans_anonymous=='3'){?>
						<span style="vertical-align:top;">echo ANONYMOUS_BACKER;</span>
					<?php } else {?>
					
						<span style="vertical-align:top;"><?php echo anchor('member/'.$bk->user_id,$bk->user_name.' '.$bk->last_name,'style="color:#114A75;"');?></span>
						<?php }?>
						
						  <?php  if($bk->trans_anonymous != '2' and $bk->trans_anonymous != '3'){  echo set_currency($bk->amount);  }  ?>		
						 <span style="color:#999999; font-style:italic; font-size:10px;"> <?php  $temp_time = explode(" ",$bk->transaction_date_time);
				
					echo date($site_setting['date_format'],strtotime($temp_time[0])); ?>
                    
                	 </span>
					 </div>
				</li>
			</ul><?php
				}	
			 }
			  else { $bk_image = 'no_man.gif'; 
			 
			 ?><a href="<?php echo site_url('member/'.$bk->user_id); ?>"><img src="<?php echo base_url();?>upload/thumb/<?php echo $bk_image; ?>" height="72" width="72" border="0" style=" border:1px solid lightGrey;" /></a><?php
			  } ?>
			
			<?php } } 
			else
			{?>
				  <div align="center" style="text-align:center; font-weight:bold; font-size:14px;"><?php echo NO_BACKERS; ?></div>
			<?php  }		
		?>
	
<!--<p><b>Can be done:</b> Online or by phone</p>
<p><b>Task should be completed by:</b>3 days ago</p>-->

</div>
	<?php }?>	
	
	<br />
	<ul class="ui-listview ui-listview-inset ui-corner-all ui-shadow" data-role="listview" data-inset="true" data-theme="d" data-divider-theme="d">
    <li class="ui-li ui-li-divider ui-btn ui-bar-d ui-corner-top ui-btn-up-undefined" role="heading" data-role="list-divider"><?php echo PROJECT_DETAILS_UPDATES; ?></li>
       <li class="ui-btn ui-btn-icon-right ui-li-has-arrow ui-li ui-btn-up-d" data-theme="d"><div class="ui-btn-inner ui-li"><div class="ui-btn-text">       
	 <?php  echo anchor('project/getupdates'.'/'.$project['project_id'],'<h3>'.$project['project_title'].'</h3>');
	    //echo anchor('project/edit_task/'.$project['project_id'],'Edit Task','class="ui-link-inherit"'); ?>
	   </div><span class="ui-icon ui-icon-arrow-r ui-icon-shadow"></span></div></li>
  </ul>
	<?php 	
	if($showupdates == 'showupdates'){?>
		<div class="nbox">
	<h3><?php echo PROJECT_DETAILS_UPDATES; ?></h3>
	<hr>
		<?php if($updates)
			{
			foreach($updates as $up)
			{?>
			<p class="marT5">
			 <?php echo date($site_setting['date_format'],strtotime($up['date_added'])); ?>
			 
				<?php 
					
					$up_content = $up['updates'];
					$up_content=str_replace('KSYDOU','"',$up_content);
					$up_content=str_replace('KSYSING',"'",$up_content); 
					echo $up_content;
				}
			}	
			else
			{?>
				  <div align="center" style="text-align:center; font-weight:bold; font-size:14px;"><?php echo PROJECT_NO_UPDATES; ?></div>
			<?php  }
			}		
		?>
	



