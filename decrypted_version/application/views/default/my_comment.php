<div id="headerbar">
	<div class="wrap930">
      	<div class="login_navl">
			
			 <div style="margin:15px 0px 0px 0px; float:left;">
         
         <span style="text-transform:capitalize;color:#2B5F94;font-size:17px; font-weight:bold;">  <?php echo REVIEW_YOUR_COMMENTS_BELOW; ?>  </span>
          
		 
		 
		   </div>
		   	
		   
         
		   	   
		  </div>
		<div class="clear"></div>
	</div>
</div>	
<div id="container">
<div class="wrap930" style="padding:15px 0px 20px 0px;">	

<!--side bar user panel-->

<?php echo $this->load->view('default/dashboard_sidebar'); ?>

<!--side bar user panel-->


<div class="con_left2" style="min-height:0px; width:690px; margin-right:0px;">
           			
              
<style type="text/css">

#tab_all a{ color:#000000; text-decoration:none; }

</style>				


 

<?php
	$data['tab_sel'] = MY_COMMENTS;
	$this->load->view('default/dashboard_tabs',$data);

?>
  

<script type="text/javascript" language="javascript">
	function toggle(x){
		if(x.className == 'light1'){
			x.className = 'lightact1';
		}
		else {
			x.className = 'light1';
		}	
	}
	function toggle1(x){
		if(x.className == 'light'){
			x.className = 'lightact';
		}
		else {
			x.className = 'light';
		}	
	}
</script>
	
	  
	  
		   <div class="inner_content" style=" margin-top:11px;padding:12px; ">
		         
				
		 <h3 id="dropmenu2"><?php echo REVIEW_MY_COMMENTS_BELOW;?> </h3>
             
				  
				  
			 <div class="clear"></div>
			 
			 
			 
		        <?php if($my_comments){        ?>
			 
			
			
			 <!-- commetns start-->
             
              <div id="sp_comments1" class="divsel1">
							<ul>
                            
                            <?php if($my_comments) { 
							//var_dump($my_comments);
							//die();
									foreach($my_comments as $cmt) {
							
							?>
                            
                            
                         <li class="common_li2">
								
				<div class="user_det" style=" font-style:italic; color:#A8A8A8; font-weight:normal;padding-bottom:6px;text-align:left; font-size:12px;"><?php echo date($site_setting['date_format'],strtotime($cmt->date_added))." ".AT." ".date("H:i a",strtotime($cmt->date_added)); ?></div>
				
				<div class="s_comment">
				 				
					<?php echo ucfirst($cmt->comments); ?>
                    
                    <br/>
                    
                    <div><?php echo ON;?> <?php 					
					echo anchor('projects/'.$cmt->url_project_title.'/'.$cmt->project_id,$cmt->project_title); ?>
                    
                    
				</div>													
				
				<div class="clear"></div>
			</li>
            
            
            
            
            
            <?php } } else { ?>
            
            
            <li class="common_li2"><div align="center" style="font-weight:bold;"><?php echo NO_COMMENT_POST_BY_THIS_MEMBER;?> </div>
            
            <?php } ?>
            
            
            </ul>
	
    </div>	
                        
                        
                        				
	<div style="clear:both;"></div>
              <!-- commetns end-->
			  	 <div class="clear"></div>
			 
			     <div align="center"  style="line-height:35px;  font-size:11px;"><br/> <?php echo $page_link; ?></div>
				 
				 	 <div class="clear"></div>
					 
		
		
		
			<?php } else { ?>
			
			
			<div class="clear"></div>
			
			<div align="center"><?php echo NO_COMMENTS; ?>.</div>
			
			<div class="clear"></div>
			
			<?php } ?>	
			
			
		</div>
		
		
		
		
		</div>
			
			
			
				
				
				<div class="clear"></div>		
				
				
					</div>
	<!-- left end ------>
		
       </div>
   
	