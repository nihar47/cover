<?php

		if($project['amount'] == '0' or $project['amount'] == '')
		{
			$w = 0;
		}else{		
			if($project['amount_get']>=$project['amount'])
			{
				$w=100;
			}
			else
			{
				$w = ($project['amount_get']/$project['amount'])*100;
				
							if($w>0 && $w<1)
							{
								$w=1;
							}
								
								
			}
		}		
		if($project['vote'] != "")
		{
			$r = (($project['total_rate']/$project['vote'])*100)/5;
		}else{
			$r = 0;
		}
		
	?>
<link rel="stylesheet" href="<?php echo base_url();?>css/colorbox.css" />
<link rel="stylesheet" href="<?php echo base_url();?>js/colorbox/colorbox.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>js/colorbox/jquery.colorbox.js"> </script>

<script type="text/javascript">
$(document).ready(function(){
				$("#iframe").colorbox({iframe:true, width:"490px", height:"250px"});
				$("#contect_me").colorbox({iframe:true, width:"630px", height:"350px"});
				$("#profile_detail_popup").colorbox({iframe:true, width:"660px", height:"660px"});
				$("#profile_detail_popup1").colorbox({iframe:true, width:"660px", height:"660px"});
			});
		
</script>

<script language="javascript"s>
	$(document).ready(function(){
		$('.stepname').mouseover(function(){
			
			$('.stepname h2').addClass('h2hover');
		});
	$('.stepname').mouseout(function(){
			$('.stepname h2').removeClass('h2hover');
			$('.stepname h2').addClass('h2normal');
		});
	});
</script>
<!--******************Section********************-->
<section>
	<div id="page_we">
    	<div class="project_head" style="margin-bottom:5px;">
			  <ul class="stepul">
        	
          <?php   if($id!='' and $id!='0'){?>
        		<li>
            	<a href="<?php echo site_url('start/guideline/'.$id);?>">
                	<div class="complete">
				<table align="center"><tr><td align="center">

                    <h1><?php echo GUIDELINES; ?></h1></td></tr>
				<tr><td align="center">
                        <h2><img src="<?php echo base_url(); ?>/images/rightsign.png" style="margin-top:5px;" alt="" /></h2></td></tr></table>
                    </div>
                </a>
            </li>
                <li>
                    <a href="<?php echo site_url('start/create_step1/'.$id);?>">
                        <div class="complete">
                    <table align="center"><tbody><tr><td align="center">
                           <h1><?php echo BASICS; ?></h1></td></tr>
                            <tr><td>
                            <h2><img src="<?php echo base_url(); ?>/images/rightsign.png" style="margin-top:5px;" alt="" /></h2></td></tr></tbody></table>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('start/create_step2/'.$id); ?>">
                        <div class="complete">
                    <table align="center"><tr><td align="center">
                           <h1><?php echo PERKS; ?></h1></td></tr>
    						<tr><td>
                             <h2><img src="<?php echo base_url(); ?>/images/rightsign.png" style="margin-top:5px;" alt="" /></h2>
                           </td></tr></table>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('start/create_step3/'.$id); ?>">
                        <div class="complete">
                    <table align="center"><tr><td align="center">
                          <h1><?php echo PROJECT_DETAILS; ?></h1></td></tr>
                            <tr><td>
                           <h2><img src="<?php echo base_url(); ?>/images/rightsign.png" style="margin-top:5px;" alt="" /></h2> </td></tr></table>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('start/create_step4/'.$id); ?>">
                        <div class="complete">
                    <table align="center"><tr><td align="center">
                            <h1><?php echo ACCOUNT_DETAILS; ?></h1></td></tr>
                            <tr><td>
                            <h2><img src="<?php echo base_url(); ?>/images/rightsign.png" style="margin-top:5px;" alt="" /></h2></td></tr></table>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('start/create_step5/'.$id); ?>">
                        <div class="complete">
                    <table align="center"><tr><td align="center">
                              <h1><?php echo REVIEW; ?></h1></td></tr>
                            <tr><td>
                           <h2><img src="<?php echo base_url(); ?>/images/rightsign.png" style="margin-top:5px;" alt="" /></h2></td></tr></table>
                        </div>
                    </a>
                </li>
                <li style="margin-right:0;">
                    <a href="<?php echo site_url('start/create_step6/'.$id); ?>">
                        <div class="stepname">
                    <table align="center"><tr><td align="center" style="padding: 0 0 5px;margin-top: 10px;">
                            <img src="<?php echo base_url();?>images/eye.png" alt="" class="aimg" style="margin-top: 10px;" /></td></tr>
                            <tr><td>
                             <h2 class="h2normal">7</h2></td></tr></table>
                        </div>
                    </a>
                </li>
          <?php }else{?>
                 < <li>

                    <a href="javascript://">
                        <div class="stepname">
                    <table align="center"><tbody><tr><td align="center">
                            <h1><?php echo BASICS; ?></h1></td></tr>
                            <tr><td>
                            <h2 class="h2normal">2</h2></td></tr></tbody></table>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript://">
                        <div class="incompletestep">
                    <table align="center"><tr><td align="center">
                            <h1><?php echo PERKS; ?></h1></td></tr>
    
                            
                           <tr><td>
                            <h2>3</h2></td></tr></table>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript://">
                        <div class="incompletestep">
                    <table align="center"><tr><td align="center">
                            <h1><?php echo PROJECT_DETAILS; ?></h1></td></tr>
                            <tr><td>
                            <h2>4</h2></td></tr></table>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript://">
                        <div class="incompletestep">
                    <table align="center"><tr><td align="center">
                            <h1><?php echo ACCOUNT_DETAILS; ?></h1></td></tr>
                            <tr><td>
                            <h2>5</h2></td></tr></table>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript://">
                        <div class="incompletestep">
                    <table align="center"><tr><td align="center">
                            <h1><?php echo REVIEW; ?></h1></td></tr>
                            <tr><td>
                            <h2>6</h2></td></tr></table>
                        </div>
                    </a>
                </li>
                <li style="margin-right:0;">
                    <a href="javascript://">
                        <div class="incompletestep">
                    <table align="center"><tr><td align="center" style="padding: 0 0 5px;margin-top: 10px;">
                            <img src="<?php echo base_url();?>images/eye.png" alt="" class="aimg" style="margin-top: 10px;" /></td></tr>
                            <tr><td>
                            <h2>7</h2></td></tr></table>
                        </div>
                    </a>
                </li>

           	
		   <?php }?> 
            
        </ul>
		
		
		
        	<a  href="javascript://" class="project_title"><?php echo $project['project_title'];?></a>
            <p class="project_own">By&nbsp;<?php echo anchor('user/full_bio_data/'.$project['user_id'].'/'.$project['project_id'],getUserNamebyid($project['user_id']),'id="profile_detail_popup1" ');?></p><div class="clr"></div>
            
        </div>
		<style type="text/css">
		iframe, embed{
		width:518px;
		height:418px;
		
		}
	
	</style> <div class="projectdetail_cont" style="margin-bottom:100px;">
        <!---------------Left--------------------->	
        	<div class="project_left">
            	<!--<iframe width="558" height="418" src="http://www.youtube.com/embed/R8FzGOOQNDY" frameborder="0" allowfullscreen></iframe>
-->		<?php 
			if($project['video']!='')
            {
                        if($project['video_type']==1 && $project['custom_video']!='') {	?>
                        
                    
                    <script type="text/javascript">
            AC_FL_RunContent( 'codebase','http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0','width','602','height','350','id','fullscreen','align','middle','src','<?php echo base_url(); ?>images/flvplayer','flashvars','file=<?php echo base_url(); ?>upload/video/<?php echo $project['custom_video']; ?>','quality','high','salign','tl','bgcolor','#ffffff','name','fullscreen','allowscriptaccess','sameDomain','wmode','transparent','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','<?php echo base_url(); ?>images/flvplayer' ); //end AC code
            </script><noscript><object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="602" height="350" id="fullscreen" align="middle">
            <param name="allowScriptAccess" value="sameDomain" />
            <param name="movie" value="<?php echo base_url(); ?>images/flvplayer.swf" />
            <param name="quality" value="high" />
            <param name="salign" value="tl" />
            <param name="bgcolor" value="#ffffff" />
            <param name="wmode" value="transparent">
            <param NAME=FlashVars VALUE="file=<?php echo base_url(); ?>upload/video/<?php echo $project['custom_video']; ?>">
            <embed src="<?php echo base_url(); ?>images/flvplayer.swf" FlashVars="file=<?php echo base_url(); ?>upload/video/<?php echo $project['custom_video']; ?>" quality="high" salign="tl" bgcolor="#ffffff" width="558" height="418" name="fullscreen" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" /></embed>
            </object></noscript>
            
            
            <?php }   elseif($project['video_type']==0 && $project['video']!='') {   	
            
            
            if(substr_count($project['video'],'object')>0)
            {
                echo html_entity_decode($project['video']); 
            }
            
            elseif(substr_count($project['video'],'iframe')>0)
            {
                    if(substr_count($project['video'],'youtube')>0)
                    {
                        $patterns[] = '/src="(.*?)"/';
                        
                        $replacements[] = 'src="${1}?wmode=transparent"';
                        
                        echo preg_replace($patterns, $replacements,$project['video']);
                        
                    }
                    elseif(substr_count($project['video'],'vimeo')>0)
                    {
                                    
                        $patterns[] = '/src="(.*?)"/';	
                        
                        
                        preg_match('/src="(.*?)"/',$project['video'],$matches);
                        
                        
                        
                        
                        echo '<iframe width="558" height="418" src="'.$matches[1].'" frameborder="0" allowfullscreen></iframe>';
                    
                        
                    
                    }
                    
                    
                    else
                    {
                    
                        echo $project['video'];
                    }
            
            }
            
            else
            {
                    if(substr_count($project['video'],'youtu.be')>0)
                    {
                        
                        $project['video']=str_replace('youtu.be','www.youtube.com/v',$project['video']);
                        
                        
                         $project['video'] = str_replace(array("v=", "v/", "vi/"), "v=",$project['video']);
                    
                
                        preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#",$project['video'],$matches);
                        
                    
                        
                        echo '<iframe width="558" height="418" src="http://www.youtube.com/embed/'.$matches[0].'?wmode=transparent" frameborder="0" allowfullscreen></iframe>';
                    
                    }
                    
                    elseif(substr_count($project['video'],'youtube')>0)
                    {
                        
                        
                        $project['video'] = str_replace(array("v=", "v/", "vi/"), "v=",$project['video']);
                    
                
                        preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#",$project['video'],$matches);
                        
                    
                        
                        echo '<iframe width="558" height="418" src="http://www.youtube.com/embed/'.$matches[0].'?wmode=transparent" frameborder="0" allowfullscreen></iframe>';
                        
                    }
                    elseif(substr_count($project['video'],'vimeo')>0)
                    {
                    
                        $vid_code = explode("/",$project['video']);
                        $vid = $vid_code[count($vid_code)-1];
                        echo '<iframe src="http://player.vimeo.com/video/'.$vid.'?title=0&byline=0&portrait=0" width="558" height="418"  frameborder="0"></iframe>';
                    
                    }
                    
                    else
                    {
                    
                        echo $project['video'];  
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
                                     
                                     
                                     <img src="<?php echo base_url();?>upload/thumb/<?php echo $prjgry->project_image; ?>" border="0" width="558" height="418" /> 
                                     
                                     <?php
                                        $cnt_gal=2;
                                    }
                                    
                                                
                            }
                            if($cnt_gal==1)
                            {
                             
                             ?>
                             
                                <img src="<?php echo base_url();?>upload/thumb/no_img.jpg" border="0" width="558" height="418" /> 
                             
                             <?php
                                    
                            }
                            
                        }
                        elseif($cnt_gal==1)
                        {
                         
                         ?>
                         
                          <img src="<?php echo base_url();?>upload/thumb/no_img.jpg" border="0" width="558" height="418" /> 
                         
                         <?php
                                
                        } else { 
                        
                        ?>
                        
                          <img src="<?php echo base_url();?>upload/thumb/no_img.jpg" border="0" width="558" height="418" /> 
                          
                          
                        <?php		
                        
                        }
                
                }
             
             }else{
			 	
				if($project['image']!=''  && is_file('upload/thumb/'.$project['image']))
                                    {						
                                     ?>
                                     
                                     
                                     <img src="<?php echo base_url();?>upload/thumb/<?php echo $project['image']; ?>" border="0" width="558" height="418" /> 
                                     
                                     <?php
                                        
                                    }else{?>
									
									<img src="<?php echo base_url();?>upload/thumb/no_img.jpg" border="0" width="558" height="418" /> 
										
									<?php }
			 }
		?>		 


              <div class="fbdiv">
                <!--<img src="<?php echo base_url();?>images/social.jpg" alt="" style="float:left" />-->
				<iframe scrolling="no" frameborder="0" style="width:75px;height:22px;background:none; float:left" id="facebook-like-inner" src="http://www.facebook.com/plugins/like.php?href=<?php echo base_url(); ?>projects/<?php echo $project['url_project_title'].'/'.$project['project_id']; ?>&amp;layout=button_count&amp;show-faces=false&amp;width=490&amp;action=like&amp;font=arial&amp;colorscheme=light" style="margin-top:3px;"></iframe>
				
				
				
				<a style="float:left; display:inline-block;" href="http://twitter.com/share" class="twitter-share-button lt marl10" data-counturl="<?php echo base_url(); ?>projects/<?php echo $project['url_project_title'].'/'.$project['project_id']; ?>" data-url="<?php echo base_url(); ?>projects/<?php echo $project['url_project_title'].'/'.$project['project_id']; ?>" data-text="<?php echo $project['project_title']; ?>" data-count="horizontal" data-via="boostiveclone" >Tweet</a>
				<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
                
                <input type="text" style="float:right; margin-right:33px;" value="<?php echo base_url().'projects/'.$project['url_project_title'].'/'.$project['project_id']; ?>" id="printurl" name="printurl" class="fbdivtxt" onclick="selectall()"  />
				<a href="javascript://" class="embedbtn"><?php echo EMBED; ?></a>
                </div>
                <div class="project_reminder">
                	<h2><?php echo $project['project_title'];?></h2>
                    <h1><img src="<?php echo base_url();?>images/calicon.png" alt="" class="icinimg"/><?php echo LAUNCHED; ?>:<?php echo date('D j Y',strtotime($project['date_added']))?></h1>
                    <h1><img src="<?php echo base_url();?>images/clockicon.png" alt="" class="icinimg"/><?php echo FUNDING_ENDS; ?>: <?php echo date('D j Y',strtotime($project['end_date']))?></h1>
                    <a href="javascript://" class="remindanchor"><?php echo FOLLOW ?></a>
                </div>
                <div class="project_description">
                	<?php echo $project['description'] ?>
                </div>
                <div class="faq">
                	<h2><?php echo FAQ; ?></h2>
                      <p><strong style="color:#333333;"><?php echo HAVE_A_QUESTION; ?>?</strong> <?php echo IF_THE_INFO_ABOVE_DOESNT_HELP_YOU_CAN_ASK_THE_PROJECT_CREATOR_DIRECTLY; ?></p>
                   <a href="javascript://" class="askanchor"><?php echo ASK_A_QUESTION; ?></a><div class="clr"></div>
                   
                </div>
            </div>
			
			
			 <div class="project_right">
            	<div class="poverview" style="">
                	<h2 style="color:#3ab7b9;"><?php echo $project_backers?></h2>
                       <p><?php echo BACKERS ?></p>
                    <h2><?php if($w==0) { ?>
					
			<?php echo set_currency('0'); ?> 
				
				<?php } else { ?>					
		<?php 
				
				if($project['amount_get']=='')
		 		{ 
					echo set_currency('0') ;  
		 		 } 				 
		  		else { 
		  			
					echo set_currency($project['amount_get']);
		   			
					}			
							
			 } ?></h2>
                     <p><?php echo PLEDGED_OF;?> <?php echo set_currency($project['amount']); ?> goal</p>
					 <?php
				/*$date1 = $project['end_date'];
				$date2 = date("Y-m-d");
				$diff =abs(strtotime($date1) - strtotime($date2));
				if(strtotime($project['end_date'])>strtotime(date('Y-m-d'))) 
				{
				$temp = floor($diff / (60*60*24));
				
				echo ($project['end_date']!="0000-00-00")?$temp."<br /><p>Days Left</p>":"<br /><p>&nbsp;</p>";
				}else {
				//echo ($project['end_date']!="0000-00-00")?$temp."<br /><p>Days Left</p>":"<br /><p>&nbsp;</p>";
				}*/
				$dateg = $project['end_date'];
				$date1 = $dateg;
				$date2 = date("Y-m-d");
				$diff = abs(strtotime($date2) - strtotime($date1));
				$test = floor($diff / (60*60*24));
				$str = '';
				
		//echo strtotime(date('Y-m-d',strtotime($dateg))).'=='.strtotime(date('Y-m-d'));exit;
			
			if(strtotime(date('Y-m-d',strtotime($dateg))) > strtotime(date('Y-m-d'))) 
			{
				$temp = floor($diff / (60*60*24));
			
				$str = ($dateg!="0000-00-00 00:00:00")? "<h2>".$test."</h2><p>days to go</p>":"<br /><p>&nbsp;</p>";
			}else {
				//strtotime(date('Y-m-d H:i:s',strtotime($rs->end_date))).'='.strtotime(date('Y-m-d H:i:s'));
				/*if(strtotime(date('Y-m-d',strtotime($dateg))) == strtotime(date('Y-m-d'))) {
					$explode = explode(' ',$dateg);
					$time = $explode[1];
					if($time='00:00:00'){
						$str = date('H',strtotime(date('Y-m-d H:i:s',strtotime($dateg)))-strtotime(date('Y-m-d H:i:s'))).' '.'<br /><p>'.HOURS_LEFT.'</p>';
					}
					else{
						$str = "0 "."<br /><p>".DAYS_LEFT."</p>";
					}
				}
				else{
					$str = "0 "."<br /><p>".DAYS_LEFT."</p>";
				}*/
				
				$hours = 0;
				$minuts = 0;
				 $dategg = $dateg;
				 $date2 = date('Y-m-d H:i:s');
//echo strtotime($dategg);echo '='.strtotime(date('Y-m-d H:i:s'));
		if(strtotime($dategg) > strtotime(date('Y-m-d H:i:s'))) 
		{					
			
			//echo $date2;
			$diff2 = abs(strtotime($dategg) - strtotime($date2));
			$day1 = floor($diff2 / (60*60*24));
			
		
			$hours   = floor(($diff2 - $day1*60*60*24)/ (60*60));  
			$minuts  = floor(($diff2 - $day1*60*60*24 - $hours*60*60)/ 60); 
			$seconds = floor(($diff2 - $day1*60*60*24 - $hours*60*60 - $minuts*60)); 
			
			if($hours != 0 || $minuts!=0 || $seconds!=0){
				//echo date('H',strtotime(date('Y-m-d H:i:s',strtotime($dateg)))-strtotime(date('Y-m-d H:i:s'))).'<br /><p>Hours Left</p>';
				//echo $project['end_date'];
				
						$str = "<h2>".$hours."</h2> <p>".HOURS_LEFT."</p>";
						if($hours != 0){						
							$str = "<h2>".$hours."</h2> <p>".HOURS_LEFT."</p>";
						}
						elseif($minuts != 0) { 
							$str = "<h2>".$minuts."</h2> <p>".MINUTES_LEFT."</p>";
						}
						else{
							$str = "<h2>".$seconds."</h2> <p>".SECONDS_LEFT."</p>";
						}
						
					}
					else
					{
						$str = "<h2>0 </h2> <p>".HOURS_LEFT."</p>";
					}
				}
				else
				{
					$str = "<h2>0 </h2> <p>".HOURS_LEFT."</p>";
				}
					
				
			}
			echo $str;
			?>
                    <!--<h2>15</h2>
                     <p>days to go</p>-->
                     <div class="pdprogress">
                     	<div class="pdprogresscal" style="width:<?php echo $w; ?>%;"></div>                       
                     </div>
                   
					
									 <a href="javascript://"><div class="back">
											<h2><?php echo BACK_THIS_PROJECT; ?></h2>
											<p><?php echo $site_setting['currency_symbol'] ?>1 <?php echo MINIMUM_PLEDGE; ?></p>
										 </div></a> 	
																 
								
                     <p style="text-align:left; font-size:14px; margin:15px 0 0 15px;"><?php echo THIS_PROJECT_WILL_BE_FUNDED_ON." ".date('F M d , g:ia',strtotime($project['end_date'])); ?>  EDT. <?php echo HOW; ?> <a href=""javascript://""><?php echo $site_setting['site_name'].' '.KICKSTARTERCLONE_WORKS; ?></a>.</p>
                </div>
                <div class="puser">
				
				<?php if($user_image!='' && is_file('upload/thumb/'.$user_image) ) { ?>

 <a href="<?php echo site_url('member/'.$project['user_id']); ?>"><img src="<?php echo base_url();?>upload/thumb/<?php echo $user_image; ?>"  class="uimg" /></a>

<?php }elseif($user_detail['tw_screen_name']!='' && $user_detail['tw_id']>0) { ?>
	
	<img src="http://api.twitter.com/1/users/profile_image?screen_name=<?php echo $user_detail['tw_screen_name']; ?>&size=bigger" class="uimg"  />
	
	
	<?php }
elseif($user_detail['fb_uid']!='' && $user_detail['fb_uid']>0) { ?>
 <a href="<?php echo site_url('member/'.$project['user_id']); ?>">
<img src="http://graph.facebook.com/<?php echo $user_detail['fb_uid']; ?>/picture?type=large" class="uimg" /></a>

<?php } else {
 ?> 

<a href="<?php echo site_url('member/'.$project['user_id']); ?>"><img src="<?php echo base_url();?>upload/thumb/no_man.gif" class="uimg" /></a>

<?php }  ?>
				
				
                	<!--<img src="" class="uimg" alt="" />-->
                    <div class="contectinfo">
                    	<h1 style="font-size:14px;"><?php echo PROJECT_BY; ?></h1>
                        <h1><?php echo $user_name.' '.substr($last_name,0,1); ?>.</h1>
                        <p class="cp"><?php echo get_city_name($user_city).",".get_state_name($user_state).",".get_country_name($user_country); ?></p>
                       <?php echo anchor('message/send_message_project_profile/'.$project['user_id'],CONTACT_ME,'id="contect_me"');?>
                    </div><div class="clr"></div>
                    <a href="javascript://" class="userfb"><img src="<?php echo base_url(); ?>images/userfb.png" class="miniimg" alt="" /><?php echo HAS_NOT_CONNECTED_FACEBOOK; ?></a>
                    <hr style="margin-left:15px;" />
                    <p style="margin-left:50px;"><?php echo WEBSITE; ?> :</p><a href="javascript://" class="userfb"><?php  if($user_website){ echo $user_website; }else{ echo "N/A";} ?> </a>
                    <?php echo anchor('',SEE_FULL_BIO,'id="profile_detail_popup" class="userfb"');?>
                </div>
                <div class="perk">
                	<div class="perk_top">
                    
                		<h1 class="perkh1"><?php echo PERK; ?></h1><h1 class="perkh1" style="color:#333333;"><?php echo FOR_YOUR_CONTRIBUTION; ?></h1>
                       </div>
					   
                    <ul class="perkul">
					
					<?php
		if($all_perks)
		{
			$perkcnt=0;
			foreach($all_perks as $perk)
			{	$perkcnt++;
				
				$available = $perk['perk_total'] - ($perk['perk_get']*1);
				
				
	?>
					
                    	<li>
                        	<h1 class="perkamt"><?php echo set_currency($perk['perk_amount']); ?></h1>
                            <h2 class="perktitle"><?php echo "PERK ".$perkcnt; ?></h2>
                            <hr color="#dcdbdb" /> 
                            <p class="perkdescription"><?php echo $perk['perk_description']; ?></p>
                            <h3 class="ca"><img src="<?php echo base_url(); ?>images/claimicon.png" alt="" class="miniimg" /><?php echo ($perk['perk_get']*1); ?> <?php echo CLAIMED; ?></h3>
                            <h3 class="ca"><img src="<?php echo base_url(); ?>images/avai.png" alt="" class="miniimg" style="width:13px; height:19px;" /><?php echo $available; ?> <?php echo AVAILABLE;?></h3><div class="clr"></div>
							
							
							
							 <?php if($available=='0'){ 
			
			//echo "Claim this perk";
			
			 }else{  
			 
		if($project['user_id'] != $this->session->userdata('user_id')){
			 
		if($paypal_adptive_status=='1' ||  $paypal_normal_status=='1' || $amazon_status=='1' || $wallet_status=='1' || $credit_card_status==1)
				{
				
					 if($project['active']==1) {
					 
					 
					 	if(strtotime($dateg) >= strtotime(date('Y-m-d H:i:s'))) 
							{
							if($projemail==1)  { ?><a href="javascript://" class="claimperk" ><?php echo CLAIM_THIS ?></a> 
								 
						 <?php } elseif($projtoken=='1') { ?><a href="javascript://" class="claimperk" ><?php echo CLAIM_THIS ?></a> 
                         <?php } elseif($wallet_status=='1'){ ?><a href="javascript://" class="claimperk" ><?php echo CLAIM_THIS ?></a> 
					 <?php } elseif($projcreditcard==1) { ?>  <a href="javascript://" class="claimperk" ><?php echo CLAIM_THIS ?></a> 
									<?php 
								 } else{
								 
								 }
							}
							 
				
						}	
					
					 }
					 
					}
					 
					 
				} ?>
		
		
                           
                            <p class="perkdate"><?php echo EST_DELIVERY; ?>: <?php if($perk['perk_delivery_date']!="0000-00-00"){echo date('D Y',strtotime($perk['perk_delivery_date'])); }else {echo 'N/A';}?> </p>
                            
                        </li>
						
						
						<?php } }?>
						
						
                      <!--  
                        <li>
                        	<h1 class="perkamt">$20</h1>
                            <h2 class="perktitle">Thank you for your support!</h2>
                            <hr color="#dcdbdb" /> 
                            <p class="perkdescription">The Histogram palette offers many options for viewing tonal and color information about an image. </p>
                            <h3 class="ca"><img src="images/claimicon.png" alt="" class="miniimg" />3 Claimed</h3>
                            <h3 class="ca"><img src="images/avai.png" alt="" class="miniimg" style="width:13px; height:19px;" />3 Claimed</h3><div class="clr"></div>
                            <a class="claimperk" href="javascript://">Claim This</a>
                            <p class="perkdate">Est. delivery: Mar 2013 </p>
                            
                        </li>
                        
                        <li>
                        	<h1 class="perkamt">$20</h1>
                            <h2 class="perktitle">Thank you for your support!</h2>
                            <hr color="#dcdbdb" /> 
                            <p class="perkdescription">The Histogram palette offers many options for viewing tonal and color information about an image. </p>
                            <h3 class="ca"><img src="images/claimicon.png" alt="" class="miniimg" />3 Claimed</h3>
                            <h3 class="ca"><img src="images/avai.png" alt="" class="miniimg" style="width:13px; height:19px;" />3 Claimed</h3><div class="clr"></div>
                            <a class="claimperk" href="javascript://">Claim This</a>
                            <p class="perkdate">Est. delivery: Mar 2013 </p>
                            
                        </li>-->
                        
                    </ul>
                </div>
            </div>
         </div></div><div class="clr"></div>
<div class="setp2btm">
	<div id="page_we">
		<input type="button" style="margin-left:346px;" value="<?php echo BACK ?>" class="stepbtn">
		<input type="button" value="<?php echo PREVIEW_SUBMIT ?>" class="stepbtn">
		
		<?php echo anchor('start/launch_project/'.$id,FINISH,'class="stepbtn"');?>
		<?php echo anchor('start/deleteproject_popup/'.$id,DELETE_PROJECT,'id="iframe" class="deleteprj"'); ?>
		<?php echo anchor('home','EXIT','class="exitp"');?>
        
		
	</div>
	</div></section>
       
  
       
   
	

