<section>
	<?php get_parent_id($catidparent_id); ?>
    <div id="page_we">
   	 <div class="section_contain">
     	<h2 class="discover_project_cont_top">
        <?php if($main_parent_id){echo anchor('discover/category/'.$main_parent_id,$main_parent_name) ; echo " >> "; }  ?>
		<?php if($parent_id){echo anchor('discover/category/'.$parent_id.'?parent_id='.$parent_category_id,$parent_name) ; echo " >> "; } ?>
		<?php echo $search_cat;?></h2><div class="clr"></div>
        <span class="discover_fnt"><?php echo $serach_text;?></span><div class="clr"></div>
        <div class="totalwholecontwidth">
        <script type="text/javascript">
var gmts=0;
jQuery(document).ready(function(){
	
		////===scrollin data fetch part
		
		function last_msg_funtion() 
		{ 		   
          var ID=$(".project_card:last").attr("id");	
		   var myArray = ID.split('_'); 
		   gmts=1;
		
		   
		  $.post("<?php echo site_url('discover/category_project_ajax/'.$project_category_id);?>/"+myArray[1],			
				
				
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
          <div class="wholecontwidth" id="ajaxdiv">
           <?php if(isset($parent_id) || isset($main_parent_id)){?>
            <div class="subcatblock">
			<div class="titlecat"><?php if($main_parent_name){ echo $parent_name; }else{echo $search_cat; } ?></div>
             <ul>
          	 <?php if($sub_categories){
				  foreach($sub_categories as $sub){
					// echo $id."=".$sub->project_category_id;
					 	if($id == $sub->project_category_id){
					 // echo "<br />".$sub->project_category_name;
					  echo "<li>".anchor('discover/category/'.$sub->project_category_id.'?sec_id='.$sub->parent_project_category_id,$sub->project_category_name,'id=active')."</li>";
						}else{
				echo "<li>".anchor('discover/category/'.$sub->project_category_id.'?sec_id='.$sub->parent_project_category_id,$sub->project_category_name)."</li>";
							}
					  } 
		 		} ?>
	</ul>
    <br style="clear:both"/>
    </div>
    <?php } ?>
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
				echo "<span class='norecords'>".NO_RECORDS."</span>";
			}?>
          </div>
          
          <?php 
		  $this->load->view('default/search/search_sidebar');?>
        </div>
    	
    </div>

 
    </div>
    
    <div id="last_msg_loader"></div>
    
</section>

