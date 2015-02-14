  	<div id="headerbar">
	<div class="wrap930">
	
	<!-- dd menu -->	
<div class="login_navl">
		
			
			
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tr><td align="left" >	
	<div class="project_title_hd" style="padding-top:15px;" >
	
	
	<span style="text-transform:capitalize;color:#2B5F94;font-size:17px;"><?php echo INVITE_YAHOO; ?></span>
	
	</div>
	</td>
	<td align="right" >	
	
	<div class="project_title_hd" style="padding-top:15px; "  >
	<span id="sddm" style="float:right;">
		
		<?php if($this->session->userdata['project_id']!='' && $this->session->userdata['project_id']!=0) {  ?>
		
	 <?php echo anchor('user/my_project/',CHANGE_PROJECT,' style="text-transform:capitalize;color:#2B5F94;font-size:17px;text-decoration:none;" '); ?>
		
		<?php } ?>
		
	</span>
	</div>

</td></tr></table>

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

#sts:hover{ font-weight:bold; }
</style>				
			


<?php
	$data['select']=$select;

	$this->load->view('default/invites/sidebar',$data);

?>


     
      
 <div class="inner_content" style=" margin-top:11px;padding:12px; ">
		         
				
			<h3 id="dropmenu2"><?php echo INVITE_YAHOO; ?> ! </h3>
            
            
              <div class="clear"></div> 
  <!--noop-->
  
    
        
   <script type="text/javascript">

function invitebox(frid) {
    
	var res_email=trim($("#fremail"+frid).text());
	var res_name=jvencode(trim(removeHTMLTags($("#frname"+frid).text())));
	
	$.get('<?php echo site_url('invites/send_invite');?>/'+res_email+'/'+res_name,function(html){
		$.fancybox(html);
	});
   
}

</script>
       
       <?php if(!$friend_list) { ?>
       
        <div class="invitegmail">
        
          <p><?php echo sprintf(YAHOO_HEADER_TEXT,$site_setting['site_name']);?></p><br />
          
          
          <div class="gmail_btn"><a href="<?php echo $yahoo_connect;?>"><?php echo FIND_FRIENDS_FROM_YAHOO;?></a></div>
        </div>
        
         <div class="clear"></div>
        
        
           <?php } else { ?>
        
        <script type="text/javascript">
		 $(function() {

			$.expr[":"].containsInCaseSensitive = function(el, i, m){
					var search = m[3];
					if (!search) return false;
					return eval("/" + search + "/i").test($(el).text());
			};  
	
			$('#query').focus().keyup(function(e){
					if(this.value.length > 0){
							$('ul#abbreviations li').hide();
							$('ul#abbreviations li:containsInCaseSensitive(' + this.value + ')').show();
					} else {
							$('ul#abbreviations li').show();        
					}
					if(e.keyCode == 13) {
							$(this).val('');
							$('ul#abbreviations li').show();
					}
			});

		});
		</script>
        
        <!---left side-->
         <div class="lefthalf" style="clear:both; width:390px;">
         
          <div class="fbclass">
          
          <div class="followimg"><a href="<?php echo site_url('invites/yahoo');?>"><?php echo DISCONNECT;?></a></div>
          </div><div class="clear"></div><br /><br />
           
           <h3><?php echo INVITES_FRIENDS;?></h3>
           <div class="listcontainerdbline">
            <input type="text" name="query" id="query" class="searchfrndbtn" />
             
           
           </div><div class="clear"></div>
           
           
           <ul id="abbreviations" class="invitesul">
           
           
           <?php if($friend_list) { $frcnt=1;
 					foreach($friend_list as $fr) {
						
						
				$expfr=explode('||',$fr);
				
				$fremail=''; $frname='';
				
				if(isset($expfr[0])) { $fremail=$expfr[0]; }
				if(isset($expfr[1])) { $frname=$expfr[1]; } if($frname=='') { $frname=$expfr[0]; }
				
				if($fremail!='') { 		
						 ?>
           
           <li>
           <div class="frndlist">
             <img src="<?php echo base_url();?>upload/no_man.gif" class="img" />      
            <span class="fl txtCap" id="frname<?php echo $frcnt; ?>"><?php echo $frname; ?></span>
            <span id="fremail<?php echo $frcnt; ?>" style="font-size:12px; clear:both; float:left; margin-left:40px; margin-top:-15px; color:#666666;"><?php echo $fremail; ?></span>          
             <div class="folimg"><a href="javascript:void(0)" onclick="invitebox(<?php echo $frcnt; ?>)"><?php echo INVITE;?></a></div>             
           </div>
           <div class="clear"></div>
           </li>
           
           <?php $frcnt++; }  } } ?>
           
        
           
            </ul>
           
           
           
                   
        </div>
        <!---left side-->
   	
   		<!---right side-->
        <div class="righthalf">
        
         <?php $shfol=0; $shunfol=0; if($unfollow_list) { $shunfol=1; }   if($follow_list) { $shfol=1; } 
	   	   
	   			if($shfol==1 || $shunfol==1) {  ?>
         
         
         
          <div class="rightdbline">
          <h3>Friends on <?php echo ucfirst($site_setting['site_name']);?> </h3>
          </div>
          <script type="text/javascript">
			$(document).ready(function() {
				$('#showfrmdlist').click(function() {				
					jQuery('#toglefont').hide();
					jQuery('#showfndlist').show();
				});			
			});
			</script>
          
          <ul class="invitesul">
          <?php if($unfollow_list) {  
		  			foreach($unfollow_list as $flw) { 
					
				
				$user_detail=get_user_detail($flw);
				
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
           <div class="frndlist">
         <a href="<?php echo site_url('member/'.$user_detail['user_id']);?>" ><img src="<?php echo $friend_user_profileimage;?>" border="0" class="img" /> </a>
            <span style="line-height:30px;"><a href="<?php echo site_url('member/'.$user_detail['user_id']);?>" class="common_link txtCap" style="font-weight:bold;"><?php echo $user_detail['user_name'].' '.$user_detail['last_name']; ?></a></span>
                     
              
                       
           </div>
           <div class="clear"></div>
           </li>
           
         <?php } } } ?>  
         
          
          </ul>
           
           <div class="clear"></div>
           
           
           <?php if($follow_list) {  
		   			
					$total_follow=count($follow_list);
		   			 ?> 
           <div class="toglefont" id="toglefont">
             <a href="javascript:void(0)" id="showfrmdlist"><?php echo ALREADY_FOLLOWING;?> <?php echo $total_follow; ?> <?php echo FRIENDS;?></a>
           </div>
           
           <div class="clear"></div>
           
           <div class="hidelist" id="showfndlist" style="display:none;">
             <div class="ruleimg">
             <img src="<?php echo base_url();?>/images/Rule.png"  />
             </div><div class="clear"></div>
            
            
            
            
            <ul class="inviteul">
           <?php if($follow_list) {  
		  			foreach($follow_list as $flw) { 
					
				
				$user_detail=get_user_detail($flw);
				
				if($user_detail)
				{
				
					$friend_user_image=$user_detail['profile_image'];
				
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
           <div class="frndlist">
          <a href="<?php echo site_url('member/'.$user_detail['user_id']);?>" ><img src="<?php echo $friend_user_profileimage;?>" border="0" class="img" /> </a>
            <span style="line-height:30px;"><a href="<?php echo site_url('member/'.$user_detail['user_id']);?>" class="common_link txtCap" style="font-weight:bold;"><?php echo $user_detail['user_name'].' '.$user_detail['last_name']; ?></a></span>
                     
             
                       
           </div>
           <div class="clear"></div>
           </li>
           
          
               <?php } } } ?>  
           </ul>
           
           
             
             
           </div>
           
           <?php } ?>
           
           
            <?php } ?>
            
     
          
          
           
          
        </div>
        
<!---right side-->

          
    
        <?php } ?>
        
        
        
        
           <div class="clear"></div> 
          
    
    
    
  <!--noop-->
     </div>
		</div>
        <div class="clear"></div>		
				
				
					</div>
	<!-- left end ------>
		
       </div>