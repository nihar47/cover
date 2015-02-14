<script type="text/javascript">
var gmts=0;

	
		////===scrollin data fetch part
		
		jQuery(document).ready(function(){
	
		////===scrollin data fetch part
		
		function last_msg_funtion() 
		{ 		   
          var ID=$("ul.rpul li:last").attr("id");
		  	
		   var myArray = ID.split('_'); 
		 /*  var str=$("#searchfor").val();	*/
		   gmts=1;

		   
		   $.post("<?php echo site_url('discover/ajax_activity/');?>" + '/'+myArray[1],			
				
				
				function(data){
					if (data != "") {
					
						if(gmts==1) { 
							$("ul.rpul li:last").after(data);		
							
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
			var ID=$("ul.rpul li:last").attr("id");	

				
		   	var myArray = ID.split('_'); 
				
			var limit = '<?php echo $total_rows; ?>';
			
			
			if(parseInt(myArray[1]) >= parseInt(limit)){	$('#last_msg_loader').html(''); }
			else{
				if($(window).scrollTop() == $(document).height() - $(window).height()){				 
					$('#last_msg_loader').html('<div class="clear"></div><h3 class="discover" style="text-align:center;"><img src="<?php echo base_url();?>images/indicator.gif"></h3>');			  
					
					if(parseInt(myArray[1]) > 0)
					{
					 	setTimeout(function() { last_msg_funtion(); }, 2000);
					}
	
					 
				}	
			}	
				
		}); 
			
	});


</script>
<section>
    <div id="page_we">
   	 <div class="section_contain">
     	<h2 class="discover_project_cont_top"><!--<?php echo DISCOVER;?>/--><?php echo $search_cat;?></h2><div class="clr"></div>
        <span class="discover_fnt"><?php echo $serach_text;?></span><div class="clr"></div>
        <div class="totalwholecontwidth">
        
          <div class="wholecontwidth" id="ajaxdiv">
          	
            <ul class="rpul">
          <?php foreach($result as $ru){
		  	$prj=get_one_project($ru['project_id']);
		   ?>
		  
         <li id="upd_<?php echo $ru['update_id'] ?>"> <div class="update_proj">
            <div class="update_proj_lt">
			<?php if($prj['image']!="" && is_file('upload/thumb/'.$prj['image'])){ ?>
              <a href="#"><img src="<?php echo base_url().'upload/thumb/'.$prj['image']; ?>" /></a>
			  <?php }else { ?>
			  <a href="#"><img src="<?php echo base_url().'upload/thumb/no_img.jpg'; ?>" /></a>
			  <?php } ?>
           
            </div>
            
            <div class="update_proj_rt">
               <a href="#" class="link_discover"><?php echo $prj['project_title']; ?></a><div class="clr"></div>
              <span><img src="<?php echo base_url(); ?>images/catrgory.png" /><?php echo project_getcategory_name($prj['category_id']); ?></span><div class="clr"></div>
              <span><img src="<?php echo base_url(); ?>images/city.png" /><?php echo get_state_name($prj['project_state']) ?>, <?php echo get_country_name($prj['project_country']); ?></span>
              
              <span class="update_fnt">Project update #<?php echo $ru['update_id'] ?></span><div class="clr"></div>
              <span class="update_bg_fnt"><?php echo $ru['update_title'] ?></span><div class="clr"></div>
			  <?php if(strlen($ru['updates']>70)){
			  	$str=substr($ru['updates'],0,70)."....";
			  }else { $str=$ru['updates']; } ?>
              <span class="update_bg_fnt_sl"><?php echo $str; ?>
			  <?php if(strlen($ru['updates']>70)){?><a href="<?php site_url('project/updates/'.$ru['project_id']); ?>/#upd<?php echo $ru['update_id'] ?>">Read more</a><?php } ?></span>
			  <div class="clr"></div>
			  <?php $total_upc=$this->project_model->get_update_comment_count($ru['update_id']);
			  if($total_upc>0){ ?>
			  <a href="<?php echo site_url('project/updates/'.$ru['project_id']); ?>/#comment_listul<?php echo $ru['update_id'] ?>"><?php echo $total_upc ?> Comments</a>
			  <?php } ?>
         </div>
          
          </div> <div class="clr"></div></li>
		  <?php } ?>
		  
		  </ul>
          </div>
          
          <?php 
		  $this->load->view('default/search/search_sidebar');?>
        </div>
    	
    </div>
    
    </div>
	<div id="last_msg_loader"></div>
</section>



