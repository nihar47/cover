
<div id="container"><br />
<div class="wrap930">	
	
	<div class="con_left2">
		<!--====================left==============--> 
        
        
      
        
        
        
       <!-- top part-->
        
        
        
        <div style="width:600px;padding: 10px 10px 10px 10px;-moz-border-radius: 8px;-webkit-border-radius: 8px;background: #FAFAFA;border: 1px solid lightGrey;  margin-bottom:10px;">
        
        
     		   <div class="member_left">
        
        
				<?php
					if($result){				
					
						if(is_file('upload/thumb/'.$result['image']))
						{
							$img = $result['image'];
						}else{
							$img = NO_MAN;
						}
					}else{
						$img = NO_MAN;
					}
				?>
                
                <div style="prfile_image">
					<?php 	
					if(is_file('upload/thumb/'.$result['image'])){
						?> <img src="<?php echo base_url().'upload/thumb/'.$img; ?>" alt="" width="150" height="150" /><?php
					}elseif($result['tw_screen_name']!='' && $result['tw_id']>0) { ?>
	
	<img src="http://api.twitter.com/1/users/profile_image?screen_name=<?php echo $result['tw_screen_name']; ?>&size=bigger" border="0" width="150" height="150" />
	
	
	<?php } elseif($result['fb_uid']!='' && $result['fb_uid']>0) { ?>
			    <img src="http://graph.facebook.com/<?php echo $result['fb_uid']; ?>/picture?type=large" alt="" width="150" height="150" />
				<?php } else { ?>
               				<img src="<?php echo base_url().'upload/thumb/'.$img; ?>" alt="" width="150" height="150" />
				<?php } ?>
				</div>			
                               
                               
              
						
         <div style="padding-left:3px;">               		
        <label><b> <?php echo MEMBER_SINCE; ?></b></label><br/>
        <label><i><?php if($result){ echo date("d M,Y",strtotime($result['date_added'])); } ?> </i></label>
         </div> 

    
     <script type="text/javascript">
	 function followuser(id)
	 {
	 	
			
			if(id=='') { return false; }
			var strURL='<?php echo site_url('follow/follow_user/');?>/'+id;
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
					
					if(xmlhttp.responseText=='follow')
					{
						document.getElementById("follow_unfollow").innerHTML='<a id="followme" href="javascript:void(0)" onclick="unfollowuser(<?php echo $result['user_id'];?>)" class="follow_btn"><?php echo UNFOLLOW_ME;?></a>';
						/*'<div id="like1'+id+'" type="image" class="arrow toplike" title="like" onclick="like('+id+')"></div><div id="dislike1'+id+'" type="image" class="arrow lower" title="dislike" onclick="dislike('+id+')"></div>';*/
			
					}
				}
			}
			xmlhttp.open("GET",strURL,true);
			xmlhttp.send();
		
	 }
	 function unfollowuser(id)
	 {
	 	
	 	
			
			if(id=='') { return false; }
			var strURL='<?php echo site_url('follow/unfollow_user/');?>/'+id;
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
				
					if(xmlhttp.responseText=='unfollow')
					{
						document.getElementById("follow_unfollow").innerHTML='<a id="followme" href="javascript:void(0)" onclick="followuser(<?php echo $result['user_id'];?>)" class="follow_btn"><?php echo FOLLOW_ME;?></a>';
				
					}
					
				}
			}
			xmlhttp.open("GET",strURL,true);
			xmlhttp.send();
		
	 
	 }
     </script>
         	
			<div id="follow_unfollow">
			<?php 
			if($this->session->userdata('user_id')>0)
				{
				if($this->session->userdata('user_id')!= $result['user_id']){
					$chk_follower = follower_list($result['user_id'],$this->session->userdata('user_id'));
					 if($chk_follower){
						?>  
								<a id="followme" href="javascript:void(0)" onclick="unfollowuser(<?php echo $result['user_id'];?>)" class="follow_btn"><?php echo UNFOLLOW_ME;?></a>
						<?php } 
							else{ 
						  ?>  
                          		<a id="followme" href="javascript:void(0)" onclick="followuser(<?php echo $result['user_id'];?>)" class="follow_btn"><?php echo FOLLOW_ME;?></a>
                          <?php }
						 }}else {?>
                          <a id="followme" href="<?php echo site_url('home/login'.'/'.base64_encode(current_url())); ?>" class="follow_btn"><?php echo FOLLOW_ME;?></a>
                         <?php }?>
                     
             </div>   
                                						
		</div>
                            
        
        <script type="text/javascript" src="<?php echo base_url(); ?>fancybox/jquery.fancybox-1.3.4.pack.js"></script>
			<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>fancybox/jquery.fancybox-1.3.4.css" media="screen" />
			<script type="text/javascript">
			jQuery(document).ready(function() {
				
				
				jQuery("#various1").fancybox({
					'titlePosition'		: 'inside',
					'transitionIn'		: 'none',
					'transitionOut'		: 'none'
				});
				
			});
			</script>
        
        
        
                            
                            
                            
					<div class="member_right">
						
                        <div class="mem_tleft"><?php echo $result['user_name'].' '.$result['last_name']; ?></div>
					<?php $message_setting = message_setting();
						if($message_setting->message_enable == 1 && $message_setting->email_user_on_new_message == 1 && $this->session->userdata('user_id')!= $result['user_id']){?>
                        
                         <div class="mem_right">
                          <?php  if($this->session->userdata('user_id')) {?>  
                          <a id="various1" href="<?php echo site_url('message/send_message_project_profile/'.$result['user_id']);?>"  style=" color:#114A75; text-transform:capitalize; font-weight:bold; font-size:15px;"><?php echo CONTACT_ME;?></a>
                          <?php }else {?>
                          <a href="<?php echo site_url('home/login'.'/'.base64_encode(current_url())); ?>" style=" color:#114A75; text-transform:capitalize; font-weight:bold; font-size:15px;"><?php echo CONTACT_ME;?></a>
                         <?php }?>
                         
                         </div>
                        <?php }?> 
								<div class="clear"></div>
								<p style="text-align:justify;"><?php echo $result['user_about']; ?> </p>
						</div>
							
        <div class="clear"></div>
            
    </div>
            
              <!-- top part-->
	
    
    		
			
			<!-- Project Tabs -->
            
          
          
          
          <div class="clear"></div>

	
<script type="text/javascript" language="javascript">
	function change_div(did)
	{
		document.getElementById('sp_projects').style.display = "none";
		document.getElementById('sp_contributions').style.display = "none";
		document.getElementById('sp_comments').style.display = "none";
		
		
		document.getElementById('sp_'+did).style.display = "block";
		
		document.getElementById('h_projects').className = "h3sel";
		document.getElementById('h_contributions').className = "h3sel";
		document.getElementById('h_comments').className = "h3sel";
	
		
		document.getElementById('h_'+did).className = "h3notsel";
	}
</script>


<div style="display:block;margin-left:10px; height:18px;">
	
    <h3 id="h_projects" class="h3notsel" onclick="change_div('projects');"><?php  echo CREATED_PROJECTS;?></h3>
	<h3 id="h_contributions" class="h3sel" onclick="change_div('contributions');"><?php echo RECENT_CONTRIBUTION;?></h3>
	<h3 id="h_comments" class="h3sel" onclick="change_div('comments');"><?php echo RECENT_ACTIVITIES; ?></h3>
 
	
</div>



        
        <div id="sp_projects" class="divsel" style="display:block;">
								
                             <ul>   
                               <?php if($user_project) { 
							   
							   
							   foreach($user_project as $up) {
							   
							    ?> 
                                
                                <li class="common_li2">
									
                                    
                                    
                                    <div class="profile_project_image">
									
                                    	<?php if($up->image!='' && is_file("upload/thumb/".$up->image)){ 
	  
	   echo anchor('projects/'.$up->url_project_title.'/'.$up->project_id,'<img class="p_img" src="'.base_url().'upload/thumb/'.$up->image.'" alt="" width="100" height="100" title="'.ucfirst($up->project_title).'" />'); 	
	   
	   
	  
	  } else{ 	 
	 
	 $get_gallery=$this->project_model->get_all_project_gallery($up->project_id);
							
							$grcnt=1;
							
							if($get_gallery)
							{
								foreach($get_gallery as $glr)
								{
								
									if($glr->project_image!='' && is_file('upload/thumb/'.$glr->project_image) && $grcnt==1 )
									{
															
									echo anchor('projects/'.$up->url_project_title.'/'.$up->project_id,'<img class="p_img" src="'.base_url().'upload/thumb/'.$glr->project_image.'" width="100" height="100" title="'.ucfirst($up->project_title).'" />');									 
									 
									$grcnt=2;
										
										
									}
									else
									{
									 echo anchor('projects/'.$up->url_project_title.'/'.$up->project_id,'<img class="p_img" src="'.base_url().'images/no_img.jpg" width="100" height="100" title="'.ucfirst($up->project_title).'" />');
															 
									}
									
								
								}
							}
							elseif($grcnt==1)
							{							
								 echo anchor('projects/'.$up->url_project_title.'/'.$up->project_id,'<img class="p_img" src="'.base_url().'images/no_img.jpg" width="100" height="100" title="'.ucfirst($up->project_title).'" />');
							 	 
								 
							}
							else
							{
							 echo anchor('projects/'.$up->url_project_title.'/'.$up->project_id,'<img class="p_img" src="'.base_url().'images/no_img.jpg" width="100" height="100" title="'.ucfirst($up->project_title).'" />');
													 
							}
	 
	 
	  }
	  
	  ?>
                                              
                                        
									</div>
                                    
                                    
									<h4><?php echo anchor('projects/'.$up->url_project_title.'/'.$up->project_id,$up->project_title,'style="color:#114A75;"'); ?></h4>
									<p><?php echo $up->project_summary; ?></p>
									<?php echo anchor('projects/'.$up->url_project_title.'/'.$up->project_id,SEE_MORE); ?>
									<div class="clear"></div>
								</li>
								
                                
                                <?php } } else { ?>
                                
                                
                                <li class="common_li2"> <div align="center" style="font-weight:bold;"><?php echo NO_PROJECT_POSTED_BY_THIS_MEMBER;?>.</div></li>
                                
                                <?php } ?>
                                
								
								
							</ul>
						
							
	</div>
                        
                        
                        
                        
	  <div id="sp_contributions" class="divsel">
							
                            
                            <ul class="rng_proj">
								
                                
                               <?php if($user_have_baked) { 
							   
							   
							   foreach($user_have_baked as $ub) {
							   
							    ?> 
                                
                                 <li class="common_li2">
									
                                    
                                    
                                    <div class="profile_project_image">
                                    
                                    
									
                                    	<?php if(is_file("upload/thumb/".$ub->image)){ 
	  
	   echo anchor('projects/'.$ub->url_project_title.'/'.$ub->project_id,'<img class="p_img" src="'.base_url().'upload/thumb/'.$ub->image.'" alt="" width="100" height="100" title="'.ucfirst($ub->project_title).'" />'); 		  
	  
	  } else{ 	 
	 
	 $get_gallery=$this->project_model->get_all_project_gallery($ub->project_id);
							
							$grcnt=1;
							
							if($get_gallery)
							{
								foreach($get_gallery as $glr)
								{
								
									if($glr->project_image!='' && is_file('upload/thumb/'.$glr->project_image) && $grcnt==1 )
									{
															
									echo anchor('projects/'.$ub->url_project_title.'/'.$ub->project_id,'<img class="p_img" src="'.base_url().'upload/thumb/'.$glr->project_image.'" width="100" height="100" title="'.ucfirst($ub->project_title).'" />');
									 
									 
										$grcnt=2;
									}
									else
									{
									 echo anchor('projects/'.$ub->url_project_title.'/'.$ub->project_id,'<img class="p_img" src="'.base_url().'images/no_img.jpg" width="100" height="100" title="'.ucfirst($ub->project_title).'" />');
									}
								
								}
							}
							elseif($grcnt==1)
							{							
								 echo anchor('projects/'.$ub->url_project_title.'/'.$ub->project_id,'<img class="p_img" src="'.base_url().'images/no_img.jpg" width="100" height="100" title="'.ucfirst($ub->project_title).'" />');
							}
							else
							{
							 echo anchor('projects/'.$ub->url_project_title.'/'.$ub->project_id,'<img class="p_img" src="'.base_url().'images/no_img.jpg" width="100" height="100" title="'.ucfirst($ub->project_title).'" />');
							}
	 
	 
	  }
	  
	  ?>
                                              
                                        
									</div>
                                    
                                    <h2 style="color:#84C200; padding:0px 0px 3px 0px;"><?php  $total=$ub->owner_amt + $ub->admin_amt; echo set_currency($total); ?></h2>
									<h4 style="padding:0px 0px 0px 3px;"><?php echo anchor('projects/'.$ub->url_project_title.'/'.$ub->project_id,$ub->project_title,'style="color:#114A75;"'); ?></h4>
									<p><?php echo $ub->project_summary; ?></p>
									<?php echo anchor('projects/'.$ub->url_project_title.'/'.$ub->project_id,SEE_MORE); ?>
									<div class="clear"></div>
								</li>
								
                                
                                <?php } } else { ?>
                                
                                
                                <li class="common_li2"> <div align="center" style="font-weight:bold;"><?php echo MEMBER_HAVE_NO_BACKED_UP;?>.</div></li>
                                
                                <?php } ?>
                                
								
								
							</ul>
                            
                            
                            
	</div>
                        
                        
                        
	  <div id="sp_comments" class="divsel">
							<ul>
                            
                            <?php if($user_comment) { 
							
									foreach($user_comment as $uc) {
							
							?>
                            
                            
                         <li class="common_li2">
								
				<div class="user_det" style=" font-style:italic; color:#A8A8A8; font-weight:normal;padding-bottom:6px;text-align:left; font-size:12px;"><?php echo date($site_setting['date_format'],strtotime($uc->date_added))." ".AT." ".date("H:i a",strtotime($uc->date_added)); ?></div>
				
				<div class="s_comment">
				 				
					<?php echo ucfirst($uc->comments); ?>
                    
                    <br/>
                    
                    <div>On <?php
					
					$query = $this->db->query("select * from project where project_id='".$uc->project_id."' and active=1 and end_date>='".date('Y-m-d')."'");
					$comment_project = $query->row_array();
					
					echo anchor('projects/'.$comment_project['url_project_title'].'/'.$comment_project['project_id'],$comment_project['project_title']);
					
					?>
                    
                    
				</div>													
				
				<div class="clear"></div>
			</li>
            
            
            
            
            
            <?php } } else { ?>
            
            
            <li class="common_li2"><div align="center" style="font-weight:bold;"><?php echo NO_COMMENT_POSTED;?>. </div>
            
            <?php } ?>
            
            
            </ul>
	
    </div>	
                        
                        
                        				
	<div style="clear:both;"></div>
    
    
    
    <!--====================left end==============--> 
	</div>   