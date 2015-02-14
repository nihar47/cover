<link rel="stylesheet" href="<?php echo base_url();?>css/colorbox.css" />
<link rel="stylesheet" href="<?php echo base_url();?>js/colorbox/colorbox.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>js/colorbox/jquery.colorbox.js"> </script>
<script type="text/javascript">
$(document).ready(function(){
				
				$("#iframe").colorbox({iframe:true, width:"490px", height:"269px"});
			});
		
</script>
<!--******************Section********************-->
     <script type="text/javascript">
	
	 
	 function unblockuser(id)
	 {
	 		if(id=='') { return false; }
			var strURL='<?php echo site_url('follow/unblock_user/');?>/'+id;
			var xmlhttp;
			if (window.XMLHttpRequest)
			{// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp=new XMLHttpRequest();
			
			}
			else
			{// code for IE6, IE5
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			
			}
			xmlhttp.onreadystatechange=function()
				{
				
				if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
				
					if(xmlhttp.responseText=='unblockuser')
					{
						document.getElementById("blockuser_div").innerHTML='';
					
					}
					
				}
			}
			xmlhttp.open("GET",strURL,true);
			xmlhttp.send();
		
	 
	 
	 }
	
     </script>

 
<section>
	<div class="get_soc">
		<div id="page_we">
       	<label class="soclabel"><?php echo GET_SOCIAL; ?></label>
			<div class="get_soc_cont">
				<div class="get_soc_cont_left">
					<ul class="getsocul">
                    
                   
                	<?php if($my_block) {  
		  			foreach($my_block as $flw) { 
					
				
				$user_detail=get_user_detail($flw->user_id);
				
				if($user_detail)
				{
				
						$friend_user_image=$user_detail['image'];
				
					$friend_user_profileimage=base_url().'upload/no_man.gif';
					
					if($friend_user_image!='') {  
					
						if(file_exists(base_path().'upload/thumb/'.$friend_user_image)) { 							
							$friend_user_profileimage=base_url().'upload/thumb/'.$friend_user_image;
						} else {
							
							if(file_exists(base_path().'upload/orig/'.$friend_user_image)) { 							
								$friend_user_profileimage=base_url().'upload/orig/'.$friend_user_image;
							}
						} 
					 } 
			   
					
		 ?>
           <li>
          <img src="<?php echo $friend_user_profileimage;?>" border="0" class="img" />
		<div class="det">
      <a href="<?php echo site_url('member/'.$user_detail['user_id']);?>" class="fbfrnd"> <?php echo $user_detail["user_name"];?></a>
		<p><img src="<?php echo base_url();?>images/locationicon.png" style="margin-left:7px;"/><?php echo get_state_name($user_detail["state"]);?>, <?php echo get_country_name($user_detail["country"]);?></p>
            <p><img src="<?php echo base_url();?>images/claimicon.png" /><?php echo BACKED; ?> <?php echo user_project_donation_count($user_detail["user_id"]);?> <?php echo PROJECTS; ?>.</p>
        
         		           
           
             </div> 
             <div id="blockuser_div">
     
         <a id="unblockme" href="javascript:void(0)" onclick="unblockuser(<?php echo $user_detail['user_id'];?>)" class="follow_btn"><?php echo 'Unblock';?></a>
		
       </div>
           <div class="clear"></div>
           
           </li>
           
         <?php } } } 
		 else{
		 	echo NO_BLOCK_USER;
		 }?>  		
						
					</ul>
				</div>
				
                <?php $this->load->view('default/invites/friend_sidebar');?>
                <div class="clr"></div>
				
				<div class="followcounter"></div>
			</div>
		</div>
	</div>
</section>

<!--******************Section********************-->
<!--******************Footer********************-->


