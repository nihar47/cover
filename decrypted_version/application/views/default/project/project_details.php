<script type="text/javascript">
	 function followproject(id)
	 {
	 	
			if(id=='') { return false; }
			var strURL='<?php echo site_url('follow/follow_project/');?>/'+id;
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
					
					if(xmlhttp.responseText=='followproject')
					{
						document.getElementById("follow_unfollow").innerHTML='<a id="followme" href="javascript:void(0)" onclick="unfollowproject(<?php echo $one_project['project_id'];?>)" class="remindanchor"><?php echo UNFOLLOW_PROJECT;?></a>';
						
			
					}
				}
			}
			xmlhttp.open("GET",strURL,true);
			xmlhttp.send();
		
	 }
	 function unfollowproject(id)
	 {
	 	
	 	
			
			if(id=='') { return false; }
			var strURL='<?php echo site_url('follow/unfollow_project/');?>/'+id;
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
				
					if(xmlhttp.responseText=='unfollowproject')
					{
						document.getElementById("follow_unfollow").innerHTML='<a id="followme" href="javascript:void(0)" onclick="followproject(<?php echo $one_project['project_id'];?>)" class="remindanchor"><?php echo FOLLOW_PROJECT;?></a>';
				
					}
					
				}
			}
			xmlhttp.open("GET",strURL,true);
			xmlhttp.send();
		
	 
	 }
     </script>

<script>
function selectall()
			{ 
			
				var text_val=document.getElementById('printurl');
				
				text_val.focus();
				
				text_val.select();
				
				if (!document.all) return; // IE only
				
				r= text_val.createTextRange();
				
				r.execCommand('Copy');
			
			}
</script>
<section>
	<div id="page_we">
        	<div class="project_head">
			<h1><?php echo anchor('projects/'.$one_project['url_project_title'].'/'.$one_project['project_id'],$one_project['project_title'],'class=""');?></h1>
  <p><?php echo BY; ?>&nbsp;<?php echo anchor('user/full_bio_data/'.$one_project['user_id'].'/'.$one_project['project_id'],$user_name.' '.substr($last_name,0,1),'id="profile_detail_popup"');?></p>
  <div class="clr"></div>
            <ul class="project_tabs">
            	<li><?php echo anchor('projects/'.$one_project['url_project_title'].'/'.$one_project['project_id'],PROJECT_HOME,'id="tabsel"'); ?></li>
                <li><?php echo anchor('project/updates/'.$one_project['project_id'],UPDATES.' | '.$total_updates); ?></li>
               <!-- <li><a href="#">Gallery | 1</a></li>-->
               <li><?php echo anchor('project/donations/'.$one_project['project_id'],BACKERS.' | '.$project_backers); ?></li>
                <li><?php echo anchor('project/comments/'.$one_project['project_id'],COMMENTS.' | '.$total_comments); ?></li>
            </ul>
        </div>
        <div class="projectdetail_cont">
        <!---------------Left--------------------->	
        <div class="project_left">
            	<!--<iframe width="558" height="418" src="http://www.youtube.com/embed/R8FzGOOQNDY" frameborder="0" allowfullscreen></iframe>
-->		<?php 
		
			if($one_project['video']!='')
            {
                        if($one_project['video_type']==1 && $one_project['custom_video']!='') {	?>
                        
                    
                    <script type="text/javascript">
            AC_FL_RunContent( 'codebase','http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0','width','602','height','350','id','fullscreen','align','middle','src','<?php echo base_url(); ?>images/flvplayer','flashvars','file=<?php echo base_url(); ?>upload/video/<?php echo $one_project['custom_video']; ?>','quality','high','salign','tl','bgcolor','#ffffff','name','fullscreen','allowscriptaccess','sameDomain','wmode','transparent','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','<?php echo base_url(); ?>images/flvplayer' ); //end AC code
            </script><noscript><object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="602" height="350" id="fullscreen" align="middle">
            <param name="allowScriptAccess" value="sameDomain" />
            <param name="movie" value="<?php echo base_url(); ?>images/flvplayer.swf" />
            <param name="quality" value="high" />
            <param name="salign" value="tl" />
            <param name="bgcolor" value="#ffffff" />
            <param name="wmode" value="transparent">
            <param NAME=FlashVars VALUE="file=<?php echo base_url(); ?>upload/video/<?php echo $one_project['custom_video']; ?>">
            <embed src="<?php echo base_url(); ?>images/flvplayer.swf" FlashVars="file=<?php echo base_url(); ?>upload/video/<?php echo $one_project['custom_video']; ?>" quality="high" salign="tl" bgcolor="#ffffff" width="558" height="418" name="fullscreen" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" /></embed>
            </object></noscript>
            
            
            <?php }   elseif($one_project['video_type']==0 && $one_project['video']!='') {   	
            
            
            if(substr_count($one_project['video'],'object')>0)
            {
                echo html_entity_decode($one_project['video']); 
            }
            
            elseif(substr_count($one_project['video'],'iframe')>0)
            {
                    if(substr_count($one_project['video'],'youtube')>0)
                    {
                        $patterns[] = '/src="(.*?)"/';
                        
                        $replacements[] = 'src="${1}?wmode=transparent"';
                        
                        echo preg_replace($patterns, $replacements,$one_project['video']);
                        
                    }
                    elseif(substr_count($one_project['video'],'vimeo')>0)
                    {
                                    
                        $patterns[] = '/src="(.*?)"/';	
                        
                        
                        preg_match('/src="(.*?)"/',$one_project['video'],$matches);
                        
                        
                        
                        
                        echo '<iframe width="650" height="485" src="'.$matches[1].'" frameborder="0" allowfullscreen></iframe>';
                    
                        
                    
                    }
                    
                    
                    else
                    {
                    
                        echo $one_project['video'];
                    }
            
            }
            
            else
            {
                    if(substr_count($one_project['video'],'youtu.be')>0)
                    {
                        
                        $one_project['video']=str_replace('youtu.be','www.youtube.com/v',$one_project['video']);
                        
                        
                         $one_project['video'] = str_replace(array("v=", "v/", "vi/"), "v=",$one_project['video']);
                    
                
                        preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#",$one_project['video'],$matches);
                        
                    
                        
                        echo '<iframe width="650" height="485" src="http://www.youtube.com/embed/'.$matches[0].'?wmode=transparent" frameborder="0" allowfullscreen></iframe>';
                    
                    }
                    
                    elseif(substr_count($one_project['video'],'youtube')>0)
                    {
                        
                        
                        $one_project['video'] = str_replace(array("v=", "v/", "vi/"), "v=",$one_project['video']);
                    
                
                        preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#",$one_project['video'],$matches);
                        
                    
                        
                        echo '<iframe width="650" height="485" src="http://www.youtube.com/embed/'.$matches[0].'?wmode=transparent" frameborder="0" allowfullscreen></iframe>';
                        
                    }
                    elseif(substr_count($one_project['video'],'vimeo')>0)
                    {
                    
                        $vid_code = explode("/",$one_project['video']);
                        $vid = $vid_code[count($vid_code)-1];
                        echo '<iframe src="http://player.vimeo.com/video/'.$vid.'?title=0&byline=0&portrait=0" width="558" height="418"  frameborder="0"></iframe>';
                    
                    }
                    
                    else
                    {
                    
                        echo $one_project['video'];  
                    }
            
            }
            
            
            
            
            
             }
             
             //http://www.youtube.com/watch?v=3iu6fhwtdl0
             
                     else {
             
                        
                        $cnt_gal=1;
                        
                        if($project_gallery)
                        { 
                            foreach($project_gallery as $prjgry)
                            {
                                
                                    if($prjgry->project_image!=''  && is_file('upload/thumb/'.$prjgry->project_image) && $cnt_gal==1)
                                    {						
                                     ?>
                                     
                                     
                                     <img src="<?php echo base_url();?>upload/thumb/<?php echo $prjgry->project_image; ?>" border="0" /> 
                                     
                                     <?php
                                        $cnt_gal=2;
                                    }
                                    
                                                
                            }
                            if($cnt_gal==1)
                            {
                             
                             ?>
                             
                                <img src="<?php echo base_url();?>upload/thumb/no_img.jpg" border="0" /> 
                             
                             <?php
                                    
                            }
                            
                        }
                        elseif($cnt_gal==1)
                        {
                         
                         ?>
                         
                          <img src="<?php echo base_url();?>upload/thumb/no_img.jpg" border="0"  /> 
                         
                         <?php
                                
                        } else { 
                        
                        ?>
                        
                          <img src="<?php echo base_url();?>upload/thumb/no_img.jpg" border="0" /> 
                          
                          
                        <?php		
                        
                        }
                
                }
             
             }else {
			 		?>
					<img src="<?php echo base_url().'upload/thumb/no_video_available.jpg' ?>" style="border:1px solid #8B8B8B;" />	
			<?php 		
			 }
		?>		 


                <div class="fbdiv">
             
				<iframe scrolling="no" frameborder="0" style="width:75px;height:22px;background:none; float:left" id="facebook-like-inner" src="http://www.facebook.com/plugins/like.php?href=<?php echo base_url(); ?>projects/<?php echo $one_project['url_project_title'].'/'.$one_project['project_id']; ?>&amp;layout=button_count&amp;show-faces=false&amp;width=490&amp;action=like&amp;font=arial&amp;colorscheme=light" style="margin-top:3px;"></iframe>
				
				
				
				<a style="float:left; display:inline-block;" href="http://twitter.com/share" class="twitter-share-button lt marl10" data-counturl="<?php echo base_url(); ?>projects/<?php echo $one_project['url_project_title'].'/'.$one_project['project_id']; ?>" data-url="<?php echo base_url(); ?>projects/<?php echo $one_project['url_project_title'].'/'.$one_project['project_id']; ?>" data-text="<?php echo $one_project['project_title']; ?>" data-count="horizontal" data-via="boostiveclone" ><?php echo TWEET ?></a>
				<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
                
                <input type="text" style="float:right; margin-right:33px;" value="<?php echo base_url().'projects/'.$one_project['url_project_title'].'/'.$one_project['project_id']; ?>" id="printurl" name="printurl" class="fbdivtxt" onclick="selectall()"  />
			<!--	<a href="#inline1" class="embedbtn">Embed</a>-->
				<?php echo anchor('project/embed_popup/'.$one_project['project_id'],'Embed','class="embedbtn"'); ?>
				
                </div>
                <div class="project_reminder">
                	<h2><?php echo $one_project['project_title'];?></h2>
                    <!--<h1><img src="<?php echo base_url();?>images/calicon.png" alt="" class="icinimg"/><?php echo LAUNCHED; ?> : <?php echo date($site_setting['date_format'],strtotime($one_project['date_added']))?></h1>-->
                    <!--<h1><img src="<?php echo base_url();?>images/clockicon.png" alt="" class="icinimg"/><?php echo FUNDING_ENDS; ?> : <?php echo date($site_setting['date_format'],strtotime($one_project['end_date']))?></h1>-->
					 <!--<div id="follow_unfollow">
<?php 
if(get_authenticateUserID()>0)
{
if(get_authenticateUserID() != $one_project['user_id']){
		$chk_follower = project_follower_list($one_project['project_id'],get_authenticateUserID());
			 if($chk_follower){?>  
								<a id="followproject1" href="javascript:void(0)"  class="remindanchor1" onclick="unfollowproject(<?php echo $one_project['project_id'];?>)"><?php echo UNFOLLOW_PROJECT;?></a>	
						<?php } 
							else{ 
						  ?>  
                          		<a id="followproject1" href="javascript:void(0)"  class="remindanchor1" onclick="followproject(<?php echo $one_project['project_id'];?>)"><?php echo FOLLOW_PROJECT;?></a>
                          <?php }
						 ?>
 
<?php }else{?><a id="unfollowproject" href="<?php echo site_url('home');?>" class="remindanchor1"><?php echo FOLLOW_PROJECT;?></a><?php }
}
else
{?>
	<a id="unfollowproject" href="<?php echo site_url('home/login'.'/'.base64_encode(current_url())); ?>" class="remindanchor1"><?php echo FOLLOW_PROJECT;?></a>
<?php }
?>
</div>-->
 
                </div><div class="clr"></div>
                <div class="project_description">
                	<?php echo $one_project['description'] ?>
                </div>
                <div class="clr"></div>
                <div class="faq">
                	<h2><?php echo FAQ; ?></h2>
                    <p><strong style="color:#333333;"><?php echo HAVE_A_QUESTION; ?></strong> <?php echo IF_THE_INFO_ABOVE_DOESNT_HELP_YOU_CAN_ASK_THE_PROJECT_CREATOR_DIRECTLY; ?></p>
					 <?php if(get_authenticateUserID()!=""){
					 if(get_authenticateUserID()!=$one_project['user_id']){
					 echo anchor('message/send_message_project_profile/'.$one_project['user_id'].'/'.$one_project['project_id'],ASK_A_QUESTION,'id="ask" class="askanchor"');
					 }else{ ?>
					 <a href="javascript://" class="askanchor"><?php echo ASK_A_QUESTION; ?></a>
					 <?php }
					 }else {
					 	echo anchor('home/login',ASK_A_QUESTION);
					 }?>
                 <!-- <a href="javascript://" id="ask" class="askanchor">Ask a question</a><div class="clr"></div>
                  <a href="#" class="askanchor">Report this project to Kickstarterclone</a>-->
                </div>
            </div>
        <!---------------Left--------------------->	
		