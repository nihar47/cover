<div id="con-tabs">

 <div id="text">

<?php $CI =& get_instance(); $site = $CI->config->slash_item('base_url_site');  ?>

<div style="float:right; font-weight:bold; " ><?php echo anchor('enquiries/list_enquiries','Back to List'); ?>	</div>
 <div class="edit_form"  style="margin-left:325px;">

<div class="con_left2" style="min-height:0px; width:690px; margin-right:0px;">

<link href="<?php echo base_url(); ?>create.css" rel="stylesheet" type="text/css" />

		
            <?php if($inquiry){
				$CI =& get_instance();
				$site = upload_url();
				
				foreach($inquiry as $msg){ ?>
                <div class="form-element-container">					
				<h2> <label class="normal_label">Name : <?php echo $msg->name." ".$msg->lname?></label> <label style="float:right" class="normal_label"> Email : <?php echo $msg->email ?></label></h2>
				<div class="clear"></div>		
		
       			  <div class="inner_content_two" >		
					
					<div class="user_info">
                 
                   <?php echo $msg->comment ?>                 
                          
                 	 </div>
                    </div>
               
           		<?php }}else{
					echo "No Conversation";
				}?>

		</div>

</div></div>
</div>