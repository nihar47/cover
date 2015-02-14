
<!--******************Section********************-->
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
						document.getElementById("follow_unfollow_"+id+"").innerHTML='<a id="followme_'+id+'" href="javascript:void(0)" onclick="unfollowuser('+id+')" class="unfollow_btn" onmouseover="set_followingtext(0);" onmouseout="set_followingtext(1);"><?php echo FOLLOWING;?></a>';

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
						document.getElementById("follow_unfollow_"+id+"").innerHTML='<a id="followme_'+id+'" href="javascript:void(0)" onclick="followuser('+id+')" class="follow_btn"><?php echo FOLLOW_ME;?></a>';
				
					}
					
				}
			}
			xmlhttp.open("GET",strURL,true);
			xmlhttp.send();
		
	 
	 }
	 function blockuser(id)
	 {
	 	if(id=='') { return false; }
			var strURL='<?php echo site_url('follow/block_user/');?>/'+id;
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
				
					if(xmlhttp.responseText=='block')
					{
						document.getElementById("follow_unfollow_"+id+"").style.display='none';
						document.getElementById("blockuser_div").innerHTML='<a id="unblockme" href="javascript:void(0)" onclick="unblockuser('+id+')" class="follow_btn" ><?php echo UNBLOCK;?></a>';
					}
					
				}
			}
			xmlhttp.open("GET",strURL,true);
			xmlhttp.send();
		
	 
	 
	 }
	 
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
						document.getElementById("blockuser_div").innerHTML='<a id="unblockme" href="javascript:void(0)" onclick="blockuser('+id+')" class="follow_btn" ><?php echo BLOCK;?></a>';
					
					}
					
				}
			}
			xmlhttp.open("GET",strURL,true);
			xmlhttp.send();
		
	 
	 
	 }
	 
	  function set_followingtext(set,id){
	 	if(set==0){
			document.getElementById("followme_"+id).innerHTML='<?php echo "".UNFOLLOW_PROJECT.""; ?>';
			
		}
		else{
			document.getElementById("followme_"+id).innerHTML='<?php echo "".FOLLOWING.""; ?>';
		}
		
	 }

     </script>

<?php 
$login_user_profileimage=base_url().'upload/no_man.gif';
if($user_info['image']!='') {  
					
						if(file_exists(base_path().'upload/thumb/'.$user_info['image'])) { 							
							$login_user_profileimage=base_url().'upload/thumb/'.$user_info['image'];
						} else {
							
							if(file_exists(base_path().'upload/orig/'.$user_info['image'])) { 							
								$login_user_profileimage=base_url().'upload/orig/'.$user_info['image'];
							}
						} 
					 } 
?>
  <script type="text/javascript">
 

    
            
        /*   function newInvite(){
                 var receiverUserIds = FB.ui({ 
                     
                         method: 'send',
						  name: 'Check this websote',
						  link: 'http://clonesites.com/pinterest/',
						  picture:'http://clonesites.com/pinterest/default/images/logo.png',
						  display: 'popup'
                 });
           
            }
            */
            
            
    function Inviteme(fb_id) 
	{
      	
		 var response= FB.ui({
           
          method: 'send',
          name: "Join me on <?php echo ucfirst($site_setting['site_name']);?>!",
          link: '<?php echo site_url('invited/'.$user_info['unique_code']);?>/facebook',
          picture:'<?php echo $login_user_profileimage; ?>',
		  description: "<?php echo ucfirst($user_info['user_name']).' '.ucfirst($user_info['last_name']);?> is on <?php echo ucfirst($site_setting['site_name']);?>, a place to discover, donate and post campaign. Join <?php echo ucfirst($site_setting['site_name']);?> to see <?php echo ucfirst($user_info['user_name']);?>&acute;s campaigns.",
		  to: fb_id,
		   max_recipients:1,
  		  display: 'popup'
          },function(response){
                if (!response)
                    return;
                var request_id = response.request + "_" + response.to[0];
            });
               console.log(response.request_ids);
   }
        
		
		
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
<section>
	<div class="get_soc">
		<div id="page_we">
       	<label class="soclabel"><?php echo GET_SOCIAL ; ?></label>
			<div class="get_soc_cont">
				<div class="get_soc_cont_left">
					<ul class="getsocul">
                    
                    <?php
   
			   $unfollow_list=array();
			   $follow_list=array();
			   if(isset($friend_list['data']))
			   {
				foreach($friend_list['data'] as $frnd)
				{
					//echo "<br><br><br>";
					//echo var_dump($frnd);//die();
					
					$check_user_insite=get_user_profile_by_fbid($frnd["id"]);
					
					if($check_user_insite)
					{		
						$unfollow_list[]=$check_user_insite->user_id;
					
					} 
					else {
					
					
				?>
<!--						<li>
								<img src="https://graph.facebook.com/<?php //echo $frnd["id"];?>/picture" />
								<div class="det">	
									<h2><?php //echo $frnd["name"];?></h2>
									<!--<p><img src="images/locationicon.png" style="margin-left:7px;" />&nbsp;Philadelphia, PA</p>
									<p><img src="images/claimicon.png" />Backed 0 projects.</p>
-->								<!--</div>
								<a href="javascript:void(0)"  onclick="Inviteme('<?php //echo $frnd["id"];?>'); return false;" class="follow_btn"><?php echo 'FOLLOW';?></a>
						</li>
-->                  <?php }
				  }}?>
				
                
               
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
						}
						
						elseif($user_detail['fb_uid']!='' && $user_detail['fb_uid']>0) { 
                        $friend_user_profileimage = "http://graph.facebook.com/".$user_detail['fb_uid']."/picture?type=large";
						 }  else {
							
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
             <div id="follow_unfollow_<?php echo $user_detail['user_id']?>" style="float:right;">
	    <?php 
			 $chk_block = block_list($user_detail['user_id'],get_authenticateUserID());
			 if(!$chk_block)
		   { 
         	  $chk_follower = follower_list($user_detail['user_id'],get_authenticateUserID());
		  	  if($chk_follower){
						?>  
								<a id="followme_<?php echo $user_detail['user_id']?>" href="javascript:void(0)" onclick="unfollowuser(<?php echo $user_detail['user_id'];?>)" class="unfollow_btn" onmouseover="set_followingtext(0,<?php echo $user_detail['user_id']?>);" onmouseout="set_followingtext(1,<?php echo $user_detail['user_id']?>);"><?php echo FOLLOWING;?></a>
						<?php } 
				else{ 
						  ?>  
                          		<a id="followme_<?php echo $user_detail['user_id']?>" href="javascript:void(0)" onclick="followuser(<?php echo $user_detail['user_id'];?>)" class="follow_btn"><?php echo FOLLOW_ME;?></a>
                          <?php }
			}
						  
		?>
		</div>
        <div id="blockuser_div">
       
       <?php 
		if(!$chk_block){
		?>
        <a id="blockme" href="javascript:void(0)" onclick="blockuser(<?php echo $user_detail['user_id'];?>)" class="follow_btn" style="margin-right:10px;"><?php echo BLOCK;?></a>
        <?php }else{
		?>
         <a id="unblockme" href="javascript:void(0)" onclick="unblockuser(<?php echo $user_detail['user_id'];?>)" class="follow_btn"><?php echo UNBLOCK;?></a>
		<?php }?>	
       </div>
           <div class="clear"></div>
           
           </li>
           
         <?php } } }else{ ?>
		 <li><h2><?php echo NO_FRIENDS; ?></h2></li>
		 <?php  } ?>  		
						
					</ul>
				</div>
				<?php $this->load->view('default/invites/friend_sidebar');?>
                <div class="clr"></div>

				<div class="followcounter">
				
				
				<ul id="friends_ticker">
					<li>
							<span class="label"><?php echo FOLLOWER; ?></span>
							<div id="followcnt"><input type="hidden" name="counter-value" value="100" /></div>
							
					</li>
					
					<li>
							<span class="label"><?php echo FOLLOWING; ?></span>
							<div id="followingcnt"><input type="hidden" name="counter-value" value="100" /></div>
							
					</li>
					
				
			</div>
			</div>
		</div>
	</div>
</section>

<!--******************Section********************-->
<!--******************Footer********************-->


