<div id="container">
<div class="wrap930">
<div class="con_left" style="padding-top:20px;">
  <!--====================left==============-->
  <?php 
		
$category=mysql_fetch_array(mysql_query("select * from project_category where project_category_id='".$project_category_id."'"));?>
  <h2 style="padding-bottom:20px;"> <?php echo RESULT_FOUND_FOR." ".$category['project_category_name']; ?></h2>
  <script type="text/javascript">
var gmts=0;
jQuery(document).ready(function(){
	
		////===scrollin data fetch part
		
		function last_msg_funtion() 
		{ 		   
          var ID=$(".slider_div:last").attr("id");	
		   var myArray = ID.split('_'); 
		   gmts=1;
		
		   
		   $.post("<?php echo site_url('search/category_project_ajax/'.$project_category_id);?>",			
				
				
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
						$data['site_setting'] = site_setting(); 
						$data['rs'] = $rs;
						$this->load->view('default/common_card',$data);
		  ?>
    <?php } ?>
    <div class="clear"></div>
    <div align="center" class="pg_img"><br/>
    </div>
    <?php } ?>
  </div>
</div>
