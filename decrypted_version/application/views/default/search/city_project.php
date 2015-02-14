<section>
	
	
    <div id="page_we">
   	 <div class="section_contain">
     	<h2 class="discover_project_cont_top"><!--<?php echo DISCOVER;?>/--><?php echo $search_cat;?></h2><div class="clr"></div>
        <span class="discover_fnt"><?php echo $serach_text;?></span><div class="clr"></div>
        <div class="totalwholecontwidth">
        
          <div class="wholecontwidth" id="ajaxdiv">
          	
            <?php if($result){
			$cnt=1;
			foreach($result as $rs)
			{
             	$data['site_setting'] = site_setting(); 
				$data['rs'] = $rs;
				$this->load->view('default/common_card',$data);
				$cnt++;
			 }
			 
			}
			else
			{
				echo NO_RECORDS;
			}?>
          </div>
          
          <?php 
		  $this->load->view('default/search/search_sidebar');?>
        </div>
    	
    </div>

 
    </div>
    
    <div id="last_msg_loader"></div>
    <script type="text/javascript">
var gmts=0;
jQuery(document).ready(function(){
	
		////===scrollin data fetch part
		
		function last_msg_funtion() 
		{ 		   
          var ID=$(".project_card:last").attr("id");	
		   var myArray = ID.split('_'); 
		   gmts=1;
		
		  
		   $.post("<?php echo site_url('discover/city_project_ajax/'.$city_name);?>/"+myArray[1],			
				
				
				function(data){
					//alert(data)
					if (data != "") {
					
						if(gmts==1) { 
							$(".project_card:last").after(data);		
							
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
			var ID=$(".project_card:last").attr("id");
			var myArray = ID.split('_'); 
			var limit = '<?php echo $total_rows; ?>';
			
			/*if(myArray[1] >= limit){	$('#last_msg_loader').html(''); }
			else{*/
				if($(window).scrollTop() == $(document).height() - $(window).height()){				 
					$('#last_msg_loader').html('<div class="clear"></div><h3 class="discover" style="text-align:center;"><img src="<?php echo base_url();?>images/indicator.gif"></h3>');			  
					 setTimeout(function() { last_msg_funtion(); }, 2000);
	
					 
				}	
			//}	
				
		}); 
			
	});
	

</script>
</section>

