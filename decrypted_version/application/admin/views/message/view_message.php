<div id="con-tabs">

 <ul>
            <li><span style="cursor:pointer;"><?php echo anchor('message','Message','id="sp_2" style="color:#364852;background:#ececec;"'); ?></span></li>

          </ul>

 <div id="text">

<?php $CI =& get_instance(); $site = $CI->config->slash_item('base_url_site');  ?>


 <div class="edit_form"  style="margin-left:325px;">

<div class="con_left2" style="min-height:0px; width:690px; margin-right:0px;">

<style type="text/css">

a.dp-choose-date {

	float: right;

	width: 16px;

	height: 16px;

	padding: 0;

	margin: 5px 237px 0px 0px;

	display: block;

	text-indent: -2000px;

	overflow: hidden;

	background: url(<?php echo upload_url(); ?>js2/calendar-green.gif) no-repeat; 

}

</style>



 

 <link href="<?php echo base_url(); ?>create.css" rel="stylesheet" type="text/css" />

	

				<div class="form-element-container">					
				<h2> <label class="normal_label">Conversation Of Message : </label><?php echo $one_message->message_subject; ?></h2>
				<div class="clear"></div>		
		
            	<?php if($message){
				$CI =& get_instance();
				$site = upload_url();
				
				foreach($message as $msg){
                $sender=get_user_detail($msg->sender_id);
				$receiver=get_user_detail($msg->receiver_id);
				?>
       			  <div class="inner_content_two" >		
					<div class="form-element-container">					
					
                        	<ul>
                            <li>
                        	<h2><span style="vertical-align:top;">Sender :</span>
                            	 <?php
								
								if($sender['image']!='') {?>
									<img src="<?php echo $site.'upload/thumb/'.$sender['image'];?>" alt="noimage"  style="padding:1px; border:1px solid #9fc8da; width:50px" class="img"  />
							<?php }  else {?>
									<img src="<?php echo $site.'upload/orig/no_man.gif'?>" lt="noimage"  style="padding:1px; border:1px solid #9fc8da;" class="img" />
							<?php }?><br/>

                            <a href="<?php echo front_base_url().'member/'.$sender['user_id'];?>" style="background:none; padding:0; margin:0 0 0 85px; color:#666666; font-size:14px;"><?php echo $sender['user_name'];?></a>
						    </h2>	
                            
                             
                           </li>
                           
                           <li > 
                           <h2><span style="vertical-align:top; margin:0 0 0 20px;">Receiver :</span>
                            	 <?php
								if($receiver['image']!='') {?>
								<img src="<?php echo $site.'upload/thumb/'.$receiver['image'];?>" alt="noimage"  style="padding:1px; border:1px solid #9fc8da;" width="50" class="img"  />
							<?php }  else { ?>
									<img src="<?php echo $site.'upload/orig/no_man.gif'?>" lt="noimage"  style="padding:1px; border:1px solid #9fc8da;" class="img" />
							<?php }?><br/>

                          
							 <a href="<?php echo front_base_url().'member/'.$receiver['user_id'];?>" style="background:none; padding:0; margin:0 0 0 125px; color:#666666; font-size:14px;"><?php echo $receiver['user_name'];?></a>
                            </h2>
                           
                            </li>	
                          
                     </div>
                     <div class="clear"></div>		
                   
                       	 	<label><h2>Description</h2><?php echo $msg->message_content; ?></label>
                            <label><h2>Conversation Date</h2><?php echo date('d-m-Y',strtotime($msg->date_added)); ?></label>
                           </ul> 
				
			</div>   
           		<?php }}else{
					echo "No Conversation";
				}?>

</div>




</div></div>
</div>
