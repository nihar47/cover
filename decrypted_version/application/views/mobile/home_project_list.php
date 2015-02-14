
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>horizontal.css" />


  
	
    <script language="javascript" src="<?php echo  base_url(); ?>js2/countdown.js"></script>
<style>
a#inifiniteLoader{
z-index: 2;
display:none;
}
</style>
<?php if($msg=='signup'){ ?>
    <p style="color:#84C200; text-align:center; font-size:14px; font-weight:bold;"><?php echo YOU_HAVE_SIGNED_UP_SUCCESSFULLY; ?></p><?php } ?>


<?php if($msg=='logout'){ ?>
<p style="color:#84C200; text-align:center; font-size:14px; font-weight:bold;"><?php echo YOU_ARE_SIGNED_OUT_SUCCESSFULLY; ?></p><?php } ?>

<?php if($msg=='success'){ ?>
<p style="color:#84C200; text-align:center; font-size:14px; font-weight:bold;"><?php echo YOUR_ACCOUNT_ACTIVATED_SUCCESSFULLY; ?></p><?php } ?>

<?php if($msg=='active'){ ?>
<p style="color:#84C200; text-align:center; font-size:14px; font-weight:bold;"><?php echo YOUR_ACCOUNT_IS_ALREADY_ACTIVE; ?></p><?php } ?>

<?php if($msg=='error'){ ?>
<p style="color:#F00; text-align:center; font-size:14px; font-weight:bold;"><?php echo ERROR_OCCURED_IN_ACTIVATING_ACCOUNT; ?></p><?php } ?>

<?php if($msg=='done'){ ?>
<p style="color:#84C200; text-align:center; font-size:14px; font-weight:bold;"><?php echo YOUR_DONATION_MADE_SUCCESSFULLY; ?></p><?php } 
?>

<?php if($msg=='fail'){ ?>
<p style="color:#84C200; text-align:center; font-size:14px; font-weight:bold;"><?php echo YOUR_DONATION_FAILED; ?></p><?php } 
?>
<div class="campaigns" style="padding-top:20px;">
	<h2><?php echo FEATURED_PROJECTS; ?></h2>
	
	<script type="text/javascript">
var gmts=0;
jQuery(document).ready(function(){
	
		////===scrollin data fetch part
		
		function last_msg_funtion() 
		{ 		   
           
		
		   var ID=$(".slider_div:last").attr("id");	
		   var myArray = ID.split('_'); 
		   gmts=1;
		   
		   $.post("<?php echo site_url('home/home_scrollajax/');?>/"+myArray[1],			
				
				
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
			
			if(myArray[1] > limit){	$('#last_msg_loader').html(''); }
			else{
				if($(window).scrollTop() == $(document).height() - $(window).height()){				 
					$('#last_msg_loader').html('<div class="clear"></div><h3 class="discover" style="text-align:center;"><img src="<?php echo base_url();?>images/indicator.gif"></h3>');			  
					 setTimeout(function() { last_msg_funtion(); }, 2000);
	
					 
				}	
			}	
				
				
				
		}); 
		
		
		
	});
	

</script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>js2/skin.css" /> 
	


	
			<div id="SlideItMoo_items">
			
			
           
			<?php
				if($result)
				{	
					$cnt=1;
					foreach($result as $rs)
					{
						
										
					
						if($cnt>4)
						{					
							$cnt=1; 
						}
						
						
						$data['site_setting'] = $site_setting; 
						$data['rs'] = $rs;
						$this->load->view('common_card',$data);
						
						$cnt++;
			
					}
				}
			?>
		
            
			</div>			
		
        	<div id="last_msg_loader"></div>
        
        <div class="clear"></div>
	<!--<h3 class="discover" style="text-align:center;"><a id="inifiniteLoader"><img src="<?php //echo base_url();?>images/loading25.gif"></a>-->
	<?php //echo anchor('search/',DISCOVER_MORE.'..','style="color:#114A75; text-decoration:underline; font-weight:bold; float:right; font-size:14px;"');?>
    <div style="clear:both;"></div>
    
   
    </h3>
	<div class="clear" id="page"></div>
</div>