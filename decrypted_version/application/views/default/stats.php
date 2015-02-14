<script src="<?php echo base_url(); ?>js/data/js/jquery.dataTables.min.js" type="text/javascript"></script>
	<style type="text/css" media="screen">
			@import "<?php echo base_url(); ?>js/data/css/demo_page.css";
			@import "<?php echo base_url(); ?>js/data/css/demo_table.css";
			@import "<?php echo base_url(); ?>/media/css/site_jui.ccss";
			@import "<?php echo base_url(); ?>js/data/css/demo_table_jui.css";
			@import "<?php echo base_url(); ?>js/data/css/themes/base/jquery-ui.css";
			@import "<?php echo base_url(); ?>js/data/css/themes/smoothness/jquery-ui-1.7.2.custom.css";
			/*
			 * Override styles needed due to the mix of three different CSS sources! For proper examples
			 * please see the themes example in the 'Examples' section of this site
			 */
			.dataTables_info { padding-top: 0; }
			.dataTables_paginate { padding-top: 0; }
			.css_right { float: right; }
			#example_wrapper .fg-toolbar { font-size: 0.8em }
			#theme_links span { float: left; padding: 2px 10px; }
		</style>
		
		<script type="text/javascript">
$(document).ready(function(){
     $('#example').dataTable();
	 $('#example1').dataTable();
		  
});

		</script>
<div id="container" style="padding: 25px 0px;">
<div class="wrap930">	


<?php echo $this->load->view('default/faq_sidebar'); ?>	


<div class="faq_list_div">
		<h2 class="state_header" ><?php echo $site_setting['site_name'];?> Stats</h2>
		<p class="state_p">This page is updated at least once a day with the raw data behind <?php echo $site_setting['site_name'];?> . Metrics include funding success rates, dollars pledged, and trends of successfully and unsuccessfully funded projects. Statistics are available for the site overall as well as each of the 13 project categories. Check out <a href="">our blog</a>
for more on <?php echo $site_setting['site_name'];?>'s data.</p>
		<h1 class="state_total_cont" style="margin-bottom:20px;">Projects and Dollars</h1>
		
		<table cellpadding="5" cellspacing="5" border="0" class="display" id="example">
	<thead>
		<tr>
			<th style="width: 197px;">Category</th>
			<th style="width: 93px;">Launched<br>Project</th>
			<th style="width: 78px;">Total<br>Dollars</th>
			<th style="width: 88px;">Successful<br>Dollars</th>
			<th style="width: 106px;">Unsuccessful<br>Dollars</th>
            <th style="width: 66px;">Live<br>Dollars</th>
            <th style="width: 77px;">Live<br>Projects</th>
            <th style="width: 81px;">Success<br>Rate</th>
            
		</tr>
	</thead>
	<tbody>
		<?php 
		if($result){
		$i=0;
		foreach($result as $rs)
		{
		
		?>
        <tr>
			<td><strong><?php echo $rs->project_category_name;?></strong></td>
			<td><?php echo category_wise_launched_project($rs->project_category_id);?></td>
			<td><?php echo category_wise_total_earn($rs->project_category_id);?></td>
            <td><?php echo category_wise_successfull_earn($rs->project_category_id);?></td>
            <td><?php echo category_wise_unsuccessfull_earn($rs->project_category_id);?></td>
            <td><?php echo category_wise_live_dollars($rs->project_category_id);?></td>
            <td><?php echo category_wise_live_projects($rs->project_category_id);?></td>
            <td><?php echo category_wise_successfull_rate($rs->project_category_id);?></td>
		</tr>
		
		
		<?php }
		}
		?>
		
		
	
	</tbody>
</table>
	<div class="clr"></div>
        	
		  </div>
		  
            
      
		<div class="clear"></div></div>