
	
		
<style type="text/css">
a.dp-choose-date {
	float: right;
	width: 16px;
	height: 16px;
	padding: 0;
	margin: 5px 237px 0px 0px;
	display: block;
	text-indent: -2000px;
	overflow: hidden;
	background: url(<?php echo base_url(); ?>js2/calendar-green.gif) no-repeat; 
}

	
	 

</style>

<div id="headerbar">
	<div class="wrap930">
	<!-- dd menu -->	
<div class="login_navl">
			
			
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tr><td align="left" >	
	<div class="project_title_hd" style="padding-top:15px;" >
	
	
	<span style="text-transform:capitalize;color:#2B5F94;font-size:17px;"><?php echo CREATE_PROJECT; ?></span>
	
	</div>
	</td>
	<td align="right" >	
	
	<div class="project_title_hd" style="padding-top:15px; "  >
	<span id="sddm" style="float:right;">
		
		<?php if($this->session->userdata['project_id']!='' && $this->session->userdata['project_id']!=0) {  ?>
		
	 <?php echo anchor('user/my_project/',CHANGE_PROJECT,' style="text-transform:capitalize;color:#2B5F94;font-size:17px;text-decoration:none;" '); ?>
		
			

		
		<?php } ?>
		
	</span>
	</div>

</td></tr></table>
				   
		  </div>     
		<div class="clear"></div>
	</div>
</div>



	

<div id="container" style="background:#FFFFFF;">
	<div class="wrapper" style="min-height:540px;">
	<?php  //print_r($project); die(); ?>
    <br />
    <h2 style="font-size:30px;"><?php echo PREVIEW_PROJECT; ?></h2>
	<br />
     <div ><iframe id="preview_campaign" name="preview_campaign" scrolling="yes" width="860" height="715" frameBorder="0" src="<?php echo base_url();?>projects/<?php echo $project['url_project_title'].'/'.$project['project_id'];?>" style="border:1px solid #000;" ></iframe></div>
     <br /><br />
   <p style="text-align:center;">  <a href="<?php echo site_url('start_project/create_step5/'.$project['project_id']);?>" class="draft" style="padding:7px 15px; text-decoration:none;"><?php echo BACK; ?></a>
     <a href="<?php echo site_url('start_project/launch_project/'.$project['project_id']);?>" class="draft"  style="padding:7px 7px; text-decoration:none;"><?php echo FINISH; ?></a>
     </p>
     <br />
       </div>     
    </div>
</div>

