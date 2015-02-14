<section>
	
	
    <div id="page_we">
   	 <div class="section_contain">
     	<h2 class="discover_project_cont_top"><!--<?php echo DISCOVER;?>/--><?php echo $search_cat;?></h2><div class="clr"></div>
        <span class="discover_fnt"><?php echo $serach_text;?></span><div class="clr"></div>
        <div class="totalwholecontwidth">
          <div class="wholecontwidth">
          	
            <?php if($result){
			$cnt=1;
			foreach($result as $res)
			{?>
             	
				<div class="project_card" style="width:150px; height:180px;">
				<?php  $curated_image_url=base_url().'upload/no_img.jpg';
				if($res->curated_image!='') {
					
					if(file_exists(base_path().'upload/curated_thumb/'.$res->curated_image)) {
						$curated_image_url=base_url().'upload/curated_thumb/'.$res->curated_image;
					} else {
					
						if(file_exists(base_path().'upload/curated/'.$res->curated_image)) {
							$curated_image_url=base_url().'upload/curated/'.$res->curated_image;
						}
					}
				}
			 echo anchor('pages/'.$res->url_curated_title,'<img class="p_img" src="'.$curated_image_url.'" alt="" width="150" height="150" title="'.ucwords($res->curated_title).'" />'); 
			 
			 echo anchor('',$res->curated_title,'class="category_name"');
			 
			 
			 // echo anchor('pages/'.$res->url_curated_title,'<img class="p_img" src="'.$curated_image_url.'" alt="" width="150" height="150" title="'.ucwords($res->curated_title).'" />'); 
			 
			 
			 ?></div>
			 <?php	$cnt++;
			 		$offset++;
			 }?>
			   <input type="hidden" id="offset" name="offset" value="<?php echo $offset; ?>"/>
			<?php }?>
			
			
			
		
   			
			
			
          </div>
          
          <?php 
		  $this->load->view('default/search/search_sidebar');?>
        </div>
    	
    </div>
    </div>
    <div id="last_msg_loader"></div>	 
</section>

  <script type="text/javascript">
var gmts=0;

jQuery(document).ready(function(){ 
function last_msg_funtion(offset) 
{   
	if(offset>0)
	{
	gmts=1;
	 
	 
			$.post("<?php echo site_url('curated/curated_page_ajax/');?>/"+offset,	
					function(data)
					{
						if (data != "") 
						{
							if(gmts==1) 
							{ 
								$(".wholecontwidth").append(data);
	
								gmts=0;
							}
						}
					}
			);
	}	
	$('div#last_msg_loader').empty();
}; 

$(window).scroll(function(){
	
//if ($(window).scrollTop() == $(document).height() - $(window).height()){
if($(window).scrollTop() == $(document).height() - $(window).height()){		

 				$('#last_msg_loader').html('<img src="<?php echo base_url();?>images/indicator.gif">');	
				
 					var offset=parseInt($("#offset").val());					  
					if(offset>0) {
					//$("#days").remove();
					//setTimeout(function(){last_msg_funtion(offset); }, 1500);				
					last_msg_funtion(offset);
					$("#offset").remove();
					}					


}
	}); 
});	


</script>