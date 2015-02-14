 
	<div id="headerbar">
	<div class="wrap930">
	
	<!-- dd menu -->	
<div class="login_navl">
		 
			
			
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tr><td align="left" >	
	<div class="project_title_hd" style="padding-top:15px;" >
	
	
	<span style="text-transform:capitalize;color:#2B5F94;font-size:17px;"><?php echo $this->session->userdata('project_title'); ?></span>
	
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
<div id="container">
<div class="wrap930" style="padding:15px 0px 20px 0px;">	

<!--side bar user panel-->

<?php echo $this->load->view('default/dashboard_sidebar'); ?>

<!--side bar user panel-->


<div class="con_left2" style="min-height:0px; width:690px; margin-right:0px;">
           			
              
<style type="text/css">

#tab_all a{ color:#000000; text-decoration:none; }

#sts:hover{ font-weight:bold; }

#preview4{
	position:absolute;
	border:1px solid #ccc;
	background:#333;
	padding:5px;
	display:none;
	color:#fff;
	margin-left:0px;
	}

</style>				
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.js" ></script>
	<script type="text/javascript">
	this.imagePreview = function(){	
	/* CONFIG */
		
		xOffset = 10;
		yOffset = 30;
		
		// these 2 variable determine popup's distance from the cursor
		// you might want to adjust to get the right result
		
	/* END CONFIG */
	jQuery("a.preview4").hover(function(e){
		this.t = this.title;
		this.title = "";	
		var c = (this.t != "") ? "<br/>" + this.t : "";
		jQuery("body").append("<p id='preview4'><img src='"+ this.href +"' alt='<?php echo IMAGE_PREVIEW;?>' height='200' width='300' />"+ c +"</p>");								 
		jQuery("#preview4")
			.css("top",(e.pageY - xOffset) + "px")
			.css("left",(e.pageX + yOffset) + "px")			
			.fadeIn("fast");						
    },
	function(){
		this.title = this.t;	
		jQuery("#preview4").remove();
    });	
	jQuery("a.preview4").mousemove(function(e){
		jQuery("#preview4")
			.css("top",(e.pageY - xOffset) + "px")			
			.css("left",(e.pageX + yOffset) + "px");
			
	});			
};


// starting the script on page load
jQuery(document).ready(function(){
	imagePreview();
});
</script>		


<?php
	$data['tab_sel'] = GALLERY;
	$this->load->view('default/overview_tabs',$data);

?>
	   

	 
	
	  
	  
		   <div class="inner_content" style=" margin-top:11px;padding:12px; ">
		         
				
			<div style="float:left;"><h3 id="dropmenu2"><?php echo GALLERY;?></h3></div>
			<div style="float:right;"><h3 class="add_text_buton" style="cursor:pointer;"><?php echo anchor('project/add_project_gallery/'.$this->session->userdata('project_id'),ADD_NOW);?></h3></div>
             <div style="clear:both;"></div>
             
				  
				  
			 <div class="clear"></div>
		  
		
			
             
			 <div class="inner_content" >     						  

<table border="0" cellpadding="1" cellspacing="1" width="100%">
 <tr>
		<?php  if($project_gallery) { 
		
		$feed=0;
		
		foreach($project_gallery as $prg) {
		
		 ?>
		
		<td align="center" valign="top">
	<a href="<?php echo base_url();?>/upload/thumb/<?php echo $prg->project_image;?>" class="preview4" title="<?php echo $this->session->userdata('project_title');?>" >
	<img src="<?php echo base_url();?>/upload/thumb/<?php echo $prg->project_image;?>" border="0" width="150" height="150" />
	</a><br/><?php  echo anchor('project/delete_project_gallery/'.$prg->project_gallery_id, DELETE ,'style="font-weight:bold;"'); ?>
		</td>
		
		
		<?php 
		
				$feed++;
				
				if($feed>2)
				{
					$feed=0;
					echo "</tr><tr>";
				}
				
				
			
						
				 }
		 
		 
		  } ?>
		</tr>	
		  </table>


				 
			</div>	
			
			<div class="clear"></div>		
			
			<div align="center"><?php echo $page_link; ?></div>			

			<div class="clear"></div>		





</div>
		
		
		
		
		</div>
			
			
			
				
				
				<div class="clear"></div>		
				
				
					</div>
	<!-- left end ------>
		
       </div>
   
		 			