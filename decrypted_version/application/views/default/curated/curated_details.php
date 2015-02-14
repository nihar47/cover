<div id="container">
<div class="wrap930" style="padding:15px 0px 20px 0px;">
 
 <?php if($curated_detail) { ?>
 
 	<div style="padding: 10px 10px 10px 10px;-moz-border-radius: 8px;-webkit-border-radius: 8px;background: #FAFAFA;border: 1px solid lightGrey;  margin-bottom:10px;">
 
 
	  <div class="member_left">
  
 
  	<?php 
	
	$curated_image_url=base_url().'upload/no_img.jpg';
	
	if($curated_detail->curated_image!='') {
		
		if(file_exists(base_path().'upload/curated_thumb/'.$curated_detail->curated_image)) {
			$curated_image_url=base_url().'upload/curated_thumb/'.$curated_detail->curated_image;
		} else {
		
			if(file_exists(base_path().'upload/curated/'.$curated_detail->curated_image)) {
				$curated_image_url=base_url().'upload/curated/'.$curated_detail->curated_image;
			}
		}
		
	} ?>
    
     <div style="prfile_image">
     	<img src="<?php echo $curated_image_url; ?>" border="0" width="150" height="150" />
     </div>
 
  
  </div>
  
  
	  <div class="member_right" style="width:744px;">
						
      <div class="mem_tleft"><?php echo ucwords($curated_detail->curated_title); ?></div>
      <div class="clear"></div>
	  <p style="text-align:justify;"><?php echo $curated_detail->curated_description; ?> </p>
                        
   </div>
   
      
     <div class="clear"></div>
            
    </div>
    
    
    <!---projects--->
    
     <script type="text/javascript">
var gmts=0;
jQuery(document).ready(function(){
	
		////===scrollin data fetch part
		
		function last_msg_funtion() 
		{ 		   
          var ID=$(".slider_div:last").attr("id");	
		   var myArray = ID.split('_'); 
		   gmts=1;
		  
		   $.post("<?php echo site_url('curated/curated_ajax/'.$curated_id);?>" + '/'+myArray[1],			
				
				
				function(data){
					//alert(data)
					if (data != "") {
					
						if(gmts==1) { 
							$(".slider_div:last").after(data);		
							
							gmts=0;
						}
					}
					else{
						$('#last_msg_loader').html('');
					}
					//$('div#last_msg_loader').empty();
				}
			);
		}; 
		
		jQuery(window).scroll(function(){
			var ID=$(".slider_div:last").attr("id");	
			
		   	var myArray = ID.split('_'); 
			var limit = '<?php echo $total_rows; ?>';
			
			if(myArray[1] >= limit){	$('#last_msg_loader').html(''); }
			else{
			
				if($(window).scrollTop() == $(document).height() - $(window).height()){				 
					$('#last_msg_loader').html('<div class="clear"></div><h3 class="discover" style="text-align:center;"><img src="<?php echo base_url();?>images/indicator.gif"></h3>');			  
					 setTimeout(function() { last_msg_funtion(); }, 2000);
	
					 
				}	
			}	
				
		}); 
			
	});
	

</script>
  <div id="ajaxdiv">
    <?php  	if($result)
			{
				foreach($result as $rs)
				{
					$data['site_setting'] = $site_setting; 
						$data['rs'] = $rs;
						echo '<div id="project-'.$rs->project_id.'" style="float:left;">';
						$this->load->view('default/common_card',$data);
						echo '</div>';
		 		} 
	?>
    <div class="clear"></div>
    <div align="center" class="pg_img"><br/>
    </div>
    <?php }?>
  </div>
    
    
    
    <!---projects--->
    
    
    
    
    
            
 <?php } ?>
      
              
   <div class="clear"></div>
 
 
 