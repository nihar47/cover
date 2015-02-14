<?php $get_ud=get_user_detail(get_authenticateUserID());
if($get_ud['paypal_verified']!=1){ ?>

<div id="social-tout" class="expanded" style="margin-top: 0px;"> <span class="spanb"> <?php echo PLEASE_SETUP_PAYPAL_EMAIL_ADDRESS ?> <a href="<?php echo site_url('settings/paypal'); ?>" class="link" ><?php echo CLICK_HERE; ?></a></span> <span class="icon-close"> <span class="icon"></span> </span> </div>
<?php } ?>
<style>
  	.lg_demo{
	background: url(<?php echo base_url(); ?>upload/orig/<?php echo $site_setting['site_logo'];?>) no-repeat;
	float: left;
	display: block;
	width: 252px;
	height: 23px;
	margin: 25px 0 0 0;
	
	}
	.lg_demo:hover{background: url(<?php echo base_url(); ?>upload/orig/<?php echo $site_setting['site_logo_hover'];?>) no-repeat;}
  </style>
<script>	
	

$(document).ready(function(){
	
	$('#inbox_button').click(function(){
		$('#user_menu_div').hide();
		$('#open_select_activity').hide();
		$('#open_select_menu').slideDown();
		$('#inbox_button').removeClass('msg');
		$('#inbox_button').addClass('msgact');
	});
	
	$('#open_user_menu').click(function(){
	$('#open_select_activity').hide();
		$('#open_select_menu').hide();
	$('#user_menu_div').slideDown();
	$('#open_user_menu').removeClass('useranc');
	$('#open_user_menu').addClass('userancadd');
	}); 
	
	$('#activityanc').click(function(){
	$('#open_select_menu').hide();
	$('#user_menu_div').hide();
	$('#open_select_activity').slideDown();
	$('#activityanc').removeClass('activityanc');
	$('#activityanc').addClass('activityact');
	}); 
	
	var mouse_is_inside=false;

	$('#open_select_menu').hover(function(){
	
	mouse_is_inside=true;
	
	}, function(){
	
	mouse_is_inside=false;
	
	});
	
	$("body").mouseup(function(){
	
	if(! mouse_is_inside) 
	$('#open_select_menu').hide();
	$('#inbox_button').removeClass('msgact');
	$('#inbox_button').addClass('msg');
	
	
	});
	
	
	var mouse_is_inside1=false;

	$('#user_menu_div').hover(function(){
	
	mouse_is_inside=true;
	
	}, function(){
	
	mouse_is_inside1=false;
	
	});
	
	$("body").mouseup(function(){
	
	if(! mouse_is_inside1) 
	$('#user_menu_div').hide();
	$('#open_user_menu').removeClass('userancadd');
	$('#open_user_menu').addClass('useranc');
	
	});
	
	var mouse_is_inside3=false;
	
	$('#open_select_activity').hover(function(){
	
	mouse_is_inside3=true;
	
	}, function(){
	
	mouse_is_inside3=false;
	
	});
	
	$("body").mouseup(function(){
	
	if(! mouse_is_inside3) 
	$('#open_select_activity').hide();
	$('#activityanc').removeClass('activityact');
	$('#activityanc').addClass('activityanc');
	
	
	});


});
</script>
<div class="project_popup" id="project_popup" style="display:none;"> 
  
  <!--Project Popup-->
  <div class="project_popup_top">
    <div id="page_we"> 
      <!--  /*<div class="title_p">*/--> 
      <img src="<?php echo base_url(); ?>/images/logo_popup.png" class="new_l"/>
      <p><?php echo KICKSTARTER_IS_A_FUNDING_PLATFORM_FOR_CREATIVE_PROJECTS; ?>.&nbsp;&nbsp;<a href="#"><?php echo LEARN_MORE; ?>!</a></p>
      <!--</div>--> 
    </div>
  </div>
  <div class="clr"></div>
  <div class="project_popup_cont">
    <div class="cancel" id="closepopup"><a href="javascript:void(0)" ></a></div>
    <div id="container">
      <div id="slider">
        <ul>
          <style type="text/css">
			iframe, embed{
				width:539px;
				height:401px;
			}
		</style>
          <?php 
		
		if($project){
		foreach($project as $prjct){?>
          <li>
            <div class="create_c">
              <div class="pup_left"> <img src="<?php echo base_url(); ?>/images/popupleft.png" height="401" width="539"/>
                <?php 
						if($prjct->video !='')
			            {
    	                    if($prjct->video_type ==1 && $prjct->custom_video !='') {	?>
                <script type="text/javascript">
            AC_FL_RunContent( 'codebase','http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0','width','602','height','350','id','fullscreen','align','middle','src','<?php echo base_url(); ?>images/flvplayer','flashvars','file=<?php echo base_url(); ?>upload/video/<?php echo $prjct->custom_video; ?>','quality','high','salign','tl','bgcolor','#ffffff','name','fullscreen','allowscriptaccess','sameDomain','wmode','transparent','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','<?php echo base_url(); ?>images/flvplayer' ); //end AC code
            </script>
                <noscript>
                <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="602" height="350" id="fullscreen" align="middle">
                  <param name="allowScriptAccess" value="sameDomain" />
                  <param name="movie" value="<?php echo base_url(); ?>images/flvplayer.swf" />
                  <param name="quality" value="high" />
                  <param name="salign" value="tl" />
                  <param name="bgcolor" value="#ffffff" />
                  <param name="wmode" value="transparent">
                  <param NAME=FlashVars VALUE="file=<?php echo base_url(); ?>upload/video/<?php echo $prjct->custom_video; ?>">
                  <embed src="<?php echo base_url(); ?>images/flvplayer.swf" FlashVars="file=<?php echo base_url(); ?>upload/video/<?php echo $prjct->custom_video; ?>" quality="high" salign="tl" bgcolor="#ffffff" width="558" height="418" name="fullscreen" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" />
                  </embed>
                </object>
                </noscript>
                <?php }   
							elseif($prjct->video_type == 0 && $prjct->video!='') {   	
            
            
            if(substr_count($prjct->video,'object')>0)
            {
                echo html_entity_decode($prjct->video); 
            }
            
            elseif(substr_count($prjct->video,'iframe')>0)
            {
                    if(substr_count($prjct->video,'youtube')>0)
                    {
                        $patterns[] = '/src="(.*?)"/';
                        
                        $replacements[] = 'src="${1}?wmode=transparent"';
                        
                        echo preg_replace($patterns, $replacements,$prjct->video);
                        
                    }
                    elseif(substr_count($prjct->video,'vimeo')>0)
                    {
                                    
                        $patterns[] = '/src="(.*?)"/';	
                        preg_match('/src="(.*?)"/',$prjct->video,$matches);
                        echo '<iframe width="558" height="418" src="'.$matches[1].'" frameborder="0" allowfullscreen></iframe>';
                    
                    }
                    
                    else
                    {
                    
                        echo $prjct->video;
                    }
            
            }
            
            else
            {
                    if(substr_count($prjct->video,'youtu.be')>0)
                    {
                        
                        $prjct->video=str_replace('youtu.be','www.youtube.com/v',$prjct->video);

                        
                        
                         $prjct->video = str_replace(array("v=", "v/", "vi/"), "v=",$prjct->video);
                    
                
                        preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#",$prjct->video,$matches);
                        
                    
                        
                        echo '<iframe width="558" height="418" src="http://www.youtube.com/embed/'.$matches[0].'?wmode=transparent" frameborder="0" allowfullscreen></iframe>';
                    
                    }
                    
                    elseif(substr_count($prjct->video,'youtube')>0)
                    {
                        
                        
                        $prjct->video = str_replace(array("v=", "v/", "vi/"), "v=",$prjct->video);
                    
                
                        preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#",$prjct->video,$matches);
                        
                    
                        
                        echo '<iframe width="558" height="418" src="http://www.youtube.com/embed/'.$matches[0].'?wmode=transparent" frameborder="0" allowfullscreen></iframe>';
                        
                    }
                    elseif(substr_count($prjct->video,'vimeo')>0)
                    {
                    
                        $vid_code = explode("/",$prjct->video);
                        $vid = $vid_code[count($vid_code)-1];
                        echo '<iframe src="http://player.vimeo.com/video/'.$vid.'?title=0&byline=0&portrait=0" width="558" height="418"  frameborder="0"></iframe>';
                    
                    }
                    
                    else
                    {
                    
                        echo $prjct->video;  
                    }
            
            }
            
             }
            				 //http://www.youtube.com/watch?v=3iu6fhwtdl0
                    		else { 
                        ?>
                <img src="<?php echo base_url();?>upload/thumb/no_img.jpg" border="0" width="558" height="418" />
                <?php		
                        
                        }
               			 }?>
              </div>
              <div class="create_right" style="width:363px;margin-top:30px;float:left;margin-left:10px;">
                <h2 class="one_short"><?php echo $prjct->project_title;?></h2>
                <div class="clr"></div>
                <h3 class="station"><?php echo BY;?> <?php echo getUserNamebyid($prjct->user_id);?><br />
                  <p><?php echo $prjct->project_summary;?></p>
                </h3>
                <div class="mp_img">
                  <?php if($prjct->project_city > 0){?>
                  <a href="<?php echo site_url('discover/city/'.$prjct->project_city);?>" class="loc_anchor"><?php echo get_city_name($prjct->project_city);?>, <?php echo get_country_name($prjct->project_country);?></a>
                  <?php }else{?>
                  <a href="<?php echo site_url('home');?>" class="loc_anchor"><?php echo get_city_name($prjct->project_city);?>, <?php echo get_country_name($prjct->project_country);?></a>
                  <?php }?>
                  <?php echo anchor('discover/category/'.$prjct->category_id,project_getcategory_name($prjct->category_id),'class="loc_anchor1"');?> </div>
                <?php 
					if($prjct->amount == '0' or $prjct->amount == '')
						{
						$w = 0;
						}else{
							if($prjct->amount_get>=$prjct->amount)
							{
								$w=100;
							}
							else
							{
								$w = ($prjct->amount_get/$prjct->amount)*100;
								
								if($w>0 && $w<1)
								{
									$w=1;
								}
								
								
			}
	}
			$date1 = $prjct->end_date;
			$dateg= $prjct->end_date;
		$date2 = date("Y-m-d");
		$diff = abs(strtotime($date2) - strtotime($date1));
		$test = floor($diff / (60*60*24));
		$str = '';
			
			if(strtotime(date('Y-m-d',strtotime($dateg))) > strtotime(date('Y-m-d'))) 
			{
				$temp = floor($diff / (60*60*24));
			
				/*$str = ($dateg!="0000-00-00 00:00:00")? '<h2 class="day" >' .$test.'</h2><p class="raised" >'.DAYS_TO_GO.'</p>':'<h2 class="day" > </h2><p class="raised" >'.DAY_TO_GO.'</p>';*/
				$str = ($dateg!="0000-00-00 00:00:00")? $test:0;
				$str1 = ($dateg!="0000-00-00 00:00:00")? DAYS_TO_GO:DAY_TO_GO;
				
			}else {
				
				$hours = 0;
				$minuts = 0;
				$dategg = $dateg;
				$date2 = date('Y-m-d H:i:s');

		if(strtotime(date('Y-m-d H:i:s',strtotime($dateg))) > strtotime(date('Y-m-d H:i:s'))) 
		{					
			
			//echo $date2;
			$diff2 = abs(strtotime($dategg) - strtotime($date2));
			$day1 = floor($diff2 / (60*60*24));
			
		
			$hours   = floor(($diff2 - $day1*60*60*24)/ (60*60));  
			$minuts  = floor(($diff2 - $day1*60*60*24 - $hours*60*60)/ 60); 
			$seconds = floor(($diff2 - $day1*60*60*24 - $hours*60*60 - $minuts*60)); 
			
			if($hours != 0 || $minuts!=0 || $seconds!=0){
				
						$str ='<h2 class="day" >'. $hours.'</h2><p class="raised" >'.HOURS_TO_GO.'</p>';
						if($hours != 0){						
							//$str = '<h2 class="day" >'.$hours.'</h2><p class="raised" >'.HOURS_TO_GO.'</p> ';
							$str = $hours;
							$str1=HOURS_TO_GO;
						}
						elseif($minuts != 0) { 
							//$str = '<h2 class="day" >'.$minuts.'</h2><p class="raised" >'.MINUTES_TO_GO.'</p> ';
							$str = $minuts;
							$str1=MINUTES_TO_GO;
						}
						else{
							//$str = '<h2 class="day" >'.$seconds.'</h2><p class="raised" >'.SECONDS_TO_GO.'</p>';
							$str = $seconds;
							$str1=SECONDS_TO_GO;
							
						}
						
					}
					else
					{
						//$str = '<h2 class="day" >0</h2><p class="raised">'.HOURS_TO_GO.'</p>';
						$str = 0;
						$str1=HOURS_TO_GO;
					}
				}
				else
				{
					$str = 0;
					$str1=HOURS_LEFT;
				}
				
			}

				?>
                <table style="width:298px; padding-top:38px; clear:both;">
                  <tr>
                    <td class="pecent"><?php echo $w?>%</td>
                    <td class="pecent"><?php echo $site_setting['currency_symbol']."".$prjct->amount_get;?></td>
                    <td  rowspan="2"><?php // echo get_days_left($prjct->end_date);?>
                      <table>
                        <tr>
                          <td class="pecent" style="border:none;"><?php echo $str; ?></td>
                        </tr>
                        <tr>
                          <td class="prior" style="border:none;"><?php echo $str1; ?></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td class="prior"><?php echo FUNDED;?></td>
                    <td class="prior"><?php echo PLEDGED;?></td>
                    <!-- <td class="prior" style="border:none;"><?php // echo DAYS_LEFT?></td>--> 
                  </tr>
                </table>
                <div class="explore">
                  <?php 
              echo anchor('projects/'.$prjct->url_project_title.'/'.$prjct->project_id,EXPLORE_THIS_PROJECT,'class="explore"');?>
                  
                  <!--<input type="submit" class="explore" value="Explore this project" />--> 
                </div>
              </div>
              <div class="clr"></div>
            </div>
          </li>
          <?php }}?>
        </ul>
      </div>
    </div>
  </div>
  <div class="opacitypopup" id="opacitydiv"></div>
</div>
<!--End Project Popup-->
<header id="header"> 
  <!--<div id="page_we">
    	<a href="<?php echo site_url('home')?>" style="display:block;" class="lg_demo">&nbsp;</a>-->
  <div class="wrapper">
    <div class="container">
      <div class="logo"><a href="<?php echo site_url('home')?>"> <img src="<?php echo base_url(); ?>images/77863logo.png"/> </a> </div>
      <ul id="headernav">
        <li>
          <?php if(isset($link)){ ?>
          <?php echo anchor('home/content/what-is-indie-film-funding/17',WHAT_IS, 'class="linkact"'); }else {echo anchor('home/content/what-is-indie-film-funding/16',WHAT_IS); } ?> 
          <!-- <p><?php echo IFF; ?></p>--> 
        </li>
        <li>
          <?php if(isset($link)){ ?>
          <?php echo anchor('discover',DISCOVER, 'class="linkact"'); }else {echo anchor('discover',DISCOVER); } ?> 
          <!--<p><?php echo GREAT_PROJECTS; ?></p>--> 
        </li>
        <li style="border-right:1px solid #e2e2e2;"><?php echo anchor('start',START);?> 
          <!--  <p><?php echo YOUR_PROJECTS; ?></p>--> 
        </li>
      </ul>
      <div class="headersearch">
        <input type="text" name="search" id="serach" onkeyup="searchproject(this.value)"  placeholder="Search Projects.."/>
        <input type="submit" value="" />
      </div>
      
      <!--<ul class="loginul1" style="margin-left:0;">
        	<li style="border-right:none; margin-right:0;">
            	<?php 
					$get_blog_setting = get_blog_setting();
					
					if($get_blog_setting->blog_status == 1)
					{
					echo anchor('user/blog',BLOG);
				}?>
            </li>
		   <li style="border-right:none; margin-right:0;"><a href="<?php echo site_url('help')?>"><?php echo HELP?></a> <?php //echo anchor('help',HELP);?></li>
            
        </ul>-->
      
      <div class="inbox"> <a href="javascript://" title="Inbox" class="msg" id="inbox_button"></a>
        <?php
		   	$unrdmsg=get_total_unread_message_count(get_authenticateUserID());
		    if($unrdmsg!=0) { ?>
        <span><?php echo $unrdmsg; ?></span>
        <?php } ?>
      </div>
      <div class="poup_inbox" id="open_select_menu" style="display:none;">
        <h2><?php echo INBOX; ?></h2>
        <div class="clr"></div>
        <?php $msglist=$this->inbox_model->list_message_header();
		  
		   ?>
        <div class="inbox_mail">
          <?php 
		  if($msglist) {
		  		foreach($msglist as $ml){
				
					$sender_image = get_user_detail($ml->sender_id);
			
		   ?>
          <a href="<?php echo site_url('inbox/conversation/'.$ml->message_id);?>">
          <div class="main_mail">
            <?php
    	if($sender_image['image']!='') {
		if(is_file('upload/thumb/'.$sender_image['image'])){
		
	?>
            <img src="<?php echo base_url();?>upload/thumb/<?php echo $sender_image['image'];?>" alt=""  class="uim" />
            <?php } else { ?>
            <img src="<?php echo base_url();?>upload/thumb/no_man.gif" class="uim"/>
            <?php } } elseif($sender_image['tw_screen_name']!='' && $sender_image['tw_id']>0) { ?>
            <img src="http://api.twitter.com/1/users/profile_image?screen_name=<?php echo $sender_image['tw_screen_name']; ?>&size=bigger" class="uim" alt=""/>
            <?php } elseif($sender_image['fb_uid']!='' && $sender_image['fb_uid']>0) { ?>
            <img src="http://graph.facebook.com/<?php echo $sender_image['fb_uid']; ?>/picture?type=large" class="uim" alt=""/>
            <?php }  else { ?>
            <img src="<?php echo base_url();?>upload/thumb/no_man.gif" lt="noimage"  class="uim" alt="" />
            <?php }?>
            <div class="fullpin_msg">
              <h3 class="txtCap"><?php echo $sender_image['user_name']." ".$sender_image['last_name']; ?></h3>
              <?php $msgcnt=substr($ml->message_content,0,50); ?>
              <p style="margin-top:5px;"><?php echo $msgcnt."...."; ?></p>
            </div>
          </div>
          </a>
          <div class="clr"></div>
          <?php } } ?>
        </div>
        <a href="<?php echo site_url('inbox');?>" class="viewamsg"><?php echo VIEW_ALL_MESSAGE; ?></a> </div>
      <?php $total= $this->user_model->my_total_activities(get_authenticateUserID());	 ?>
      <div class="activity"> <a href="javascript://" title="Activity" class="activityanc" id="activityanc"></a>
        <?php if($total!=0){ ?>
        <span><?php echo $total; ?></span>
        <?php } ?>
      </div>
      <?php $userimg=get_user_detail(get_authenticateUserID()); ?>
      <?php 
		
			if(is_file('upload/thumb/'.$userimg['image']))
						{
							$img = $userimg['image'];
						}else{
							$img = 'no_man.gif';
						}
			
		 ?>
      <div class="prof"> <a href="javascript://" class="useranc" id="open_user_menu">
        <?php 	
					if(is_file('upload/thumb/'.$userimg['image'])){
						?>
        <img src="<?php echo base_url().'upload/thumb/'.$img; ?>" alt=""class="luserimg"/>
        <?php
					}elseif($userimg['tw_screen_name']!='' && $userimg['tw_id']>0) { ?>
        <img src="http://api.twitter.com/1/users/profile_image?screen_name=<?php echo $userimg['tw_screen_name']; ?>&size=bigger" class="luserimg" />
        <?php } elseif($userimg['fb_uid']!='' && $userimg['fb_uid']>0) { ?>
        <img src="http://graph.facebook.com/<?php echo $userimg['fb_uid']; ?>/picture?type=large" alt="" class="luserimg"/>
        <?php } else { ?>
        <img src="<?php echo base_url().'upload/thumb/'.$img; ?>" alt="" class="luserimg" />
        <?php } ?>
        Me</a>
        <div class="user_menu_div" id="user_menu_div" style="display: none;">
          <div class="user_menu_div_left">
            <h2><?php echo MY_ACCOUNT; ?></h2>
            <ul>
              <li><?php echo anchor('home/dashboard',MY_PROFILE); ?></li>
              <li><?php echo anchor('user/transaction',BACKER_HISTORY); ?></li>
              <li><?php echo anchor('home/profile_detail',EDIT_SETTINGS); ?></li>
              <li><?php echo anchor('settings/paypal',VERIFY_PAYPAL); ?></li>
              <li><?php echo anchor('friends',FIND_FRIENDS); ?></li>
              <li><?php echo anchor('home/Logout',LOG_OUT); ?></li>
            </ul>
          </div>
          <?php $draft=get_header_draft_project(); ?>
          <?php if($draft){ ?>
          <div class="user_menu_div_right">
            <h2><?php echo MY_CREATED_PROJECTS; ?></h2>
            <ul>
              <?php 	foreach($draft as $dp){
				 ?>
              <li><a href="<?php echo site_url('start/create_step1/'.$dp['project_id']); ?>"><?php echo $dp['project_title']; ?></a></li>
              <?php }  ?>
            </ul>
          </div>
          <?php } ?>
        </div>
      </div>
      <div class="activity_box" id="open_select_activity" style="display:none;">
        <?php $activities= $this->user_model->header_activities(get_authenticateUserID(),5,0);	 ?>
        <h2><?php echo RECENT_ACTIVITY ?></h2>
        <div class="clr"></div>
        <div class="inbox_mail">
          <div class="main_mail">
            <ul >
              <?php
					$user_id = $this->session->userdata('user_id');
					
					$user_info = get_user_detail($user_id);
					
					
						$i = 0;
						if($activities)
						{
							foreach($activities as $cmt)
							{
								$act=$cmt->act;
								
					switch ($act)
					{
					case 'following':			
					?>
              <li>
                <?php if($cmt->user_image !='' && is_file('upload/thumb/'.$cmt->user_image) ) { ?>
                <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/<?php echo $cmt->user_image; ?>" "" /></a>
                <?php }else {
 ?>
                <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/no_man.gif" "" /></a>
                <?php }  ?>
                <div class="abc"> <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>
                  <p><?php echo FOLLOW_BY; ?>: <a href="<?php echo site_url('member/'.$user_info['user_id']); ?>"><?php echo $user_info['user_name'];?>.</a></p>
                  <p><?php echo getDuration($cmt->activity_date);?></p>
                </div>
                <div class="clear"></div>
              </li>
              <?php
					 break;
				
					case 'follower' :?>
              <li>
                <?php if($cmt->user_image !='' && is_file('upload/thumb/'.$cmt->user_image) ) { ?>
                <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/<?php echo $cmt->user_image; ?>" "" /></a>
                <?php }else {
 ?>
                <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/no_man.gif" "" /></a>
                <?php }  ?>
                <div class="abc"> <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>
                  <p><?php echo FOLLOW;?>: <a href="<?php echo site_url('member/'.$user_info['user_id']); ?>"><?php echo $user_info['user_name'];?>.</a></p>
                  <p><?php echo getDuration($cmt->activity_date);?></p>
                </div>
                <div class="clear"></div>
              </li>
              <?php break;
					 case 'user_own_comment':
					  $own_comment_project_data = get_one_project($cmt->custom_msg);
					 ?>
              <li>
                <?php if($cmt->user_image !='' && is_file('upload/thumb/'.$cmt->user_image) ) { ?>
                <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/<?php echo $cmt->user_image; ?>" "" /></a>
                <?php }else {
 ?>
                <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/no_man.gif" "" /></a>
                <?php }  ?>
                <div class="abc"> <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>
                  <p><?php echo MY_COMMENTS_TXT;?>: <a href="<?php echo site_url('projects/'.$own_comment_project_data['url_project_title'].'/'.$own_comment_project_data['project_id']); ?>"><?php echo $own_comment_project_data['project_title'];?></a></p>
                  <p><?php echo substr($cmt->custom_msg2,0,20);?>....</p>
                  <p ><?php echo getDuration($cmt->activity_date);?></p>
                </div>
                <div class="clear"></div>
              </li>
              <?php 
					 break;
					 case 'followercomment':
					 $project_data = get_one_project($cmt->custom_msg2);
					 ?>
              <li>
                <?php if($cmt->user_image !='' && is_file('upload/thumb/'.$cmt->user_image) ) { ?>
                <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/<?php echo $cmt->user_image; ?>" "" /></a>
                <?php }else {
 ?>
                <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/no_man.gif" "" /></a>
                <?php }  ?>
                <div class="abc"> <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>
                  <p><?php echo COMMENT_ON_PROJECT;?>: <a href="<?php echo site_url('projects/'.$project_data['url_project_title'].'/'.$project_data['project_id']); ?>"><?php echo $project_data['project_title'];?></a></p>
                  <p><?php echo MY_COMMENTS_TXT;?>: <?php echo substr($cmt->custom_msg,0,20);?></p>
                  <p><?php echo getDuration($cmt->activity_date);?></p>
                </div>
                <div class="clear"></div>
              </li>
              <?php 
					 break;
					 case 'signup'?>
              <li>
                <?php if($cmt->user_image !='' && is_file('upload/thumb/'.$cmt->user_image) ) { ?>
                <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/<?php echo $cmt->user_image; ?>" "" /></a>
                <?php }else {
 ?>
                <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/no_man.gif" "" /></a>
                <?php }  ?>
                <div class="abc"> <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>
                  <p><?php echo WELCOME;?>: <?php echo $cmt->user_name;?></p>
                  <p><?php echo getDuration($cmt->activity_date);?></p>
                </div>
                <div class="clear"></div>
              </li>
              <?php 
					  break;
					  case 'followuser_follow_project':
					  $project_follow_data = get_one_project($cmt->custom_msg);
					  ?>
              <li>
                <?php if($cmt->user_image !='' && is_file('upload/thumb/'.$cmt->user_image) ) { ?>
                <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/<?php echo $cmt->user_image; ?>" "" /></a>
                <?php }else {
 ?>
                <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/no_man.gif" "" /></a>
                <?php }  ?>
                <div class="abc"> <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>
                  <p><?php echo FOLLOW_PROJECT_TXT;?>: <a href="<?php echo site_url('projects/'.$project_follow_data['url_project_title'].'/'.$project_follow_data['project_id']); ?>"><?php echo $project_follow_data['project_title'];?></a></p>
                  <p><?php echo getDuration($cmt->activity_date);?></p>
                </div>
                <div class="clear"></div>
              </li>
              <?php 
					break;
					case 'own_follow_project':
					$own_project_data = get_one_project($cmt->custom_msg);
					?>
              <li>
                <?php if($cmt->user_image !='' && is_file('upload/thumb/'.$cmt->user_image) ) { ?>
                <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/<?php echo $cmt->user_image; ?>" "" /></a>
                <?php }else {
 ?>
                <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/no_man.gif" "" /></a>
                <?php }  ?>
                <div class="abc"> <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>
                  <p><?php echo PROJECT_FOLLOW_BY_ME;?>: <a href="<?php echo site_url('projects/'.$own_project_data['url_project_title'].'/'.$own_project_data['project_id']); ?>"><?php echo $own_project_data['project_title'];?></a></p>
                  <p><?php echo getDuration($cmt->activity_date);?></p>
                </div>
                <div class="clear"></div>
              </li>
              <?php 
					break;
					case 'my_post_project':
					$my_post_project_data = get_one_project($cmt->custom_msg);
					?>
              <li >
                <?php if($cmt->user_image !='' && is_file('upload/thumb/'.$cmt->user_image) ) { ?>
                <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/<?php echo $cmt->user_image; ?>" "" /></a>
                <?php }else {
 ?>
                <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/no_man.gif" "" /></a>
                <?php }  ?>
                <div class="abc"> <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>
                  <p><?php echo MY_POST_PROJECT;?> : <a href="<?php echo site_url('projects/'.$my_post_project_data['url_project_title'].'/'.$my_post_project_data['project_id']); ?>"><?php echo $my_post_project_data['project_title'];?></a></p>
                  <p><?php echo getDuration($cmt->activity_date);?></p>
                </div>
                <div class="clear"></div>
              </li>
              <?php 
					break;
					case 'followeruser_post_project':
					$follower_post_project_data = get_one_project($cmt->custom_msg);
					?>
              <li>
                <?php if($cmt->user_image !='' && is_file('upload/thumb/'.$cmt->user_image) ) { ?>
                <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/<?php echo $cmt->user_image; ?>" "" /></a>
                <?php }else {
 ?>
                <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/no_man.gif" "" /></a>
                <?php }  ?>
                <div class="abc"> <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>
                  <p><?php echo FOLLOWER_POST_PROJECT;?> : <a href="<?php echo site_url('projects/'.$follower_post_project_data['url_project_title'].'/'.$follower_post_project_data['project_id']); ?>"><?php echo $follower_post_project_data['project_title'];?></a></p>
                  <p><?php echo getDuration($cmt->activity_date);?></p>
                </div>
                <div class="clear"></div>
              </li>
              <?php break;
					case 'user_own_project_update':
					$own_project_updates = get_one_project($cmt->custom_msg);
					?>
              <li >
                <?php if($cmt->user_image !='' && is_file('upload/thumb/'.$cmt->user_image) ) { ?>
                <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/<?php echo $cmt->user_image; ?>" "" /></a>
                <?php }else {
 ?>
                <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/no_man.gif" "" /></a>
                <?php }  ?>
                <div class="abc"> <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>
                  <p><?php echo PROJECT_UPDATES;?>: <a href="<?php echo site_url('projects/'.$own_project_updates['url_project_title'].'/'.$own_project_updates['project_id']); ?>"><?php echo $own_project_updates['project_title'];?></a>
                </div>
                <div><?php echo UPDATES;?> : <?php echo substr($cmt->custom_msg2,0,20);?>
                  </p>
                  <p><?php echo getDuration($cmt->activity_date);?></p>
                </div>
                <div class="clear"></div>
              </li>
              <?php break;
					 case 'project_update_follower_project':
					 $follower_project_updates = get_one_project($cmt->custom_msg);?>
              <li>
                <?php if($cmt->user_image !='' && is_file('upload/thumb/'.$cmt->user_image) ) { ?>
                <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/<?php echo $cmt->user_image; ?>" "" /></a>
                <?php }else {
 ?>
                <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/no_man.gif" "" /></a>
                <?php }  ?>
                <div class="abc" > <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>
                  <p><?php echo FOLLOWER_PROJECT_UPDATES;?>: <a href="<?php echo site_url('projects/'.$follower_project_updates['url_project_title'].'/'.$follower_project_updates['project_id']); ?>"><?php echo $follower_project_updates['project_title'];?></a>
                </div>
                <div>Updates : <?php echo substr($cmt->custom_msg2,0,20);?>
                  </p>
                  <p><?php echo getDuration($cmt->activity_date);?></p>
                </div>
                <div class="clear"></div>
              </li>
              <?php 
					 break;
					 case 'user_own_donation':
					 $my_project_donation = get_one_project($cmt->custom_msg);?>
              <li>
                <?php if($cmt->user_image !='' && is_file('upload/thumb/'.$cmt->user_image) ) { ?>
                <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/<?php echo $cmt->user_image; ?>" "" /></a>
                <?php }else {
 ?>
                <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/no_man.gif" "" /></a>
                <?php }  ?>
                <div class="abc"> <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>
                  <p>Donation on Project: <a href="<?php echo site_url('projects/'.$my_project_donation['url_project_title'].'/'.$my_project_donation['project_id']); ?>"><?php echo $my_project_donation['project_title'];?></a>
                </div>
                <div>Amount : <?php echo $site_setting['currency_symbol'].''.$cmt->custom_msg2;?>
                  </p>
                  <p><?php echo getDuration($cmt->activity_date);?></p>
                </div>
                <div class="clear"></div>
              </li>
              <?php 
					 break;
					 case 'project_follower_donation':
					 $follower_prject_donation = get_one_project($cmt->custom_msg);?>
              <li>
                <?php if($cmt->user_image !='' && is_file('upload/thumb/'.$cmt->user_image) ) { ?>
                <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/<?php echo $cmt->user_image; ?>" "" /></a>
                <?php }else {
 ?>
                <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/no_man.gif" "" /></a>
                <?php }  ?>
                <div class="abc"> <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>
                  <p>Follower Donation on Project: <a href="<?php echo site_url('projects/'.$follower_prject_donation['url_project_title'].'/'.$follower_prject_donation['project_id']); ?>"><?php echo $follower_prject_donation['project_title'];?></a>
                </div>
                <div>Amount : <?php echo $site_setting['currency_symbol'].''.$cmt->custom_msg2;?>
                  </p>
                  <p><?php echo getDuration($cmt->activity_date);?></p>
                </div>
                <div class="clear"></div>
              </li>
              <?php 
					 break;
					 case 'user_own_gallery':
					 $user_own_gallery = get_one_project($cmt->custom_msg);?>
              <li>
                <?php if($cmt->user_image !='' && is_file('upload/thumb/'.$cmt->user_image) ) { ?>
                <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/<?php echo $cmt->user_image; ?>" "" /></a>
                <?php }else {
 ?>
                <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/no_man.gif" "" /></a>
                <?php }  ?>
                <div class="abc"> <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>
                  <p>Add gallery in Project: <a href="<?php echo site_url('projects/'.$user_own_gallery['url_project_title'].'/'.$user_own_gallery['project_id']); ?>"><?php echo $user_own_gallery['project_title'];?></a></p>
                  <p><?php echo getDuration($cmt->activity_date);?></p>
                </div>
                <div class="clear"></div>
              </li>
              <?php 
					 break;
					 case 'followeruser_gallery':
                     $user_follower_gallery = get_one_project($cmt->custom_msg);?>
              <li>
                <?php if($cmt->user_image !='' && is_file('upload/thumb/'.$cmt->user_image) ) { ?>
                <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/<?php echo $cmt->user_image; ?>" "" /></a>
                <?php }else {
 ?>
                <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/no_man.gif" "" /></a>
                <?php }  ?>
                <div class="abc"> <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>
                  <p>Add gallery in Project: <a href="<?php echo site_url('projects/'.$user_follower_gallery['url_project_title'].'/'.$user_follower_gallery['project_id']); ?>"><?php echo $user_follower_gallery['project_title'];?></a></p>
                  <p><?php echo getDuration($cmt->activity_date);?></p>
                </div>
                <div class="clear"></div>
              </li>
              <?php 
					 break;
					 case 'following_follow_project':
                     $following_follow_project_data = get_one_project($cmt->custom_msg);?>
              <li>
                <?php if($cmt->user_image !='' && is_file('upload/thumb/'.$cmt->user_image) ) { ?>
                <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/<?php echo $cmt->user_image; ?>" "" /></a>
                <?php }else {
 ?>
                <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/no_man.gif" "" /></a>
                <?php }  ?>
                <div class="abc"> <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>
                  <p>Following Project: <a href="<?php echo site_url('projects/'.$following_follow_project_data['url_project_title'].'/'.$following_follow_project_data['project_id']); ?>"><?php echo $following_follow_project_data['project_title'];?></a></p>
                  <p><?php echo getDuration($cmt->activity_date);?></p>
                </div>
                <div class="clear"></div>
              </li>
              <?php break;
					 case 'following_gallery':
                      $following_gallery_project_data = get_one_project($cmt->custom_msg);?>
              <li>
                <?php if($cmt->user_image !='' && is_file('upload/thumb/'.$cmt->user_image) ) { ?>
                <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/<?php echo $cmt->user_image; ?>" "" /></a>
                <?php }else {
 ?>
                <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/no_man.gif" "" /></a>
                <?php }  ?>
                <div class="abc"> <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>
                  <p>Following Gallery: <a href="<?php echo site_url('projects/'.$following_gallery_project_data['url_project_title'].'/'.$following_gallery_project_data['project_id']); ?>"><?php echo $following_gallery_project_data['project_title'];?></a></p>
                  <p><?php echo getDuration($cmt->activity_date);?></p>
                </div>
                <div class="clear"></div>
              </li>
              <?php break;
					 case 'following_updates':
					
					  $following_updates_project_data = get_one_project($cmt->custom_msg);
					 ?>
              <li>
                <?php if($cmt->user_image !='' && is_file('upload/thumb/'.$cmt->user_image) ) { ?>
                <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/<?php echo $cmt->user_image; ?>" "" /></a>
                <?php }else {
 ?>
                <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/no_man.gif" "" /></a>
                <?php }  ?>
                <div class="abc"> <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>
                  <p>Following Updates: <a href="<?php echo site_url('projects/'.$following_updates_project_data['url_project_title'].'/'.$following_updates_project_data['project_id']); ?>"><?php echo $following_updates_project_data['project_title'];?></a>
                </div>
                <div>Updates : <?php echo substr($cmt->custom_msg2,0,20);?>
                  </p>
                  <p><?php echo getDuration($cmt->activity_date);?></p>
                </div>
                <div class="clear"></div>
              </li>
              <?php break;
					 case 'following_comment':
					  $following_comment_project_data = get_one_project($cmt->custom_msg);
					 ?>
              <li>
                <?php if($cmt->user_image !='' && is_file('upload/thumb/'.$cmt->user_image) ) { ?>
                <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/<?php echo $cmt->user_image; ?>" "" /></a>
                <?php }else {
 ?>
                <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/no_man.gif" "" /></a>
                <?php }  ?>
                <div class="abc"> <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>
                  <p>Following Comment: <a href="<?php echo site_url('projects/'.$following_comment_project_data['url_project_title'].'/'.$following_comment_project_data['project_id']); ?>"><?php echo $following_comment_project_data['project_title'];?></a>
                </div>
                <div>Comment: <?php echo substr($cmt->custom_msg2,0,20);;?>
                  </p>
                  <p><?php echo getDuration($cmt->activity_date);?></p>
                </div>
                <div class="clear"></div>
              </li>
              <?php 
					 break;
					 case 'following_donation':
					 $following_donation_project_data = get_one_project($cmt->custom_msg);
					 ?>
              <li>
                <?php if($cmt->user_image !='' && is_file('upload/thumb/'.$cmt->user_image) ) { ?>
                <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/<?php echo $cmt->user_image; ?>" "" /></a>
                <?php }else {
 ?>
                <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/no_man.gif" "" /></a>
                <?php }  ?>
                <div class="abc"> <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>
                  <p>Following Donation: <a href="<?php echo site_url('projects/'.$following_donation_project_data['url_project_title'].'/'.$following_donation_project_data['project_id']); ?>"><?php echo $following_donation_project_data['project_title'];?></a>
                </div>
                <div>Amount: <?php echo $cmt->custom_msg2;?>
                  </p>
                  <p><?php echo getDuration($cmt->activity_date);?></p>
                </div>
                <div class="clear"></div>
              </li>
              <?php break;
					 case 'following_post_project':
					 $following_post_project_data = get_one_project($cmt->custom_msg);
					 ?>
              <li>
                <?php if($cmt->user_image !='' && is_file('upload/thumb/'.$cmt->user_image) ) { ?>
                <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/<?php echo $cmt->user_image; ?>" "" /></a>
                <?php }else {
 ?>
                <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/no_man.gif" "" /></a>
                <?php }  ?>
                <div class="abc"> <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>
                  <p>Following Post Project: <a href="<?php echo site_url('projects/'.$following_post_project_data['url_project_title'].'/'.$following_post_project_data['project_id']); ?>"><?php echo $following_post_project_data['project_title'];?></a>
                </div>
                <div>Project: <?php echo $following_post_project_data['project_title'];?>
                  </p>
                  <p><?php echo getDuration($cmt->activity_date);?></p>
                </div>
                <div class="clear"></div>
              </li>
              <?php 
					 break;
                     case 'myfolloingfollowers':
					$user_info = get_user_detail($cmt->custom_msg);?>
              <li>
                <?php if($cmt->user_image !='' && is_file('upload/thumb/'.$cmt->user_image) ) { ?>
                <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/<?php echo $cmt->user_image; ?>" "" /></a>
                <?php }else {
 ?>
                <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/no_man.gif" "" /></a>
                <?php }  ?>
                <div class="abc"> <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>
                  <p>My Followers Follow: <a href="<?php echo site_url('member/'.$user_info['user_id']); ?>"><?php echo $user_info['user_name'];?></a></p>
                  <p><?php echo getDuration($cmt->activity_date);?></p>
                </div>
                <div class="clear"></div>
              </li>
              <?php break;
					 default:?>
              <li>
                <?php if($cmt->user_image !='' && is_file('upload/thumb/'.$cmt->user_image) ) { ?>
                <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/<?php echo $cmt->user_image; ?>" "" /></a>
                <?php }else {
 ?>
                <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><img src="<?php echo base_url();?>upload/thumb/no_man.gif" "" /></a>
                <?php }  ?>
                <div class="abc"> <a href="<?php echo site_url('member/'.$cmt->key_id); ?>"><?php echo $cmt->user_name;?></a>
                  <p>Welcome <?php echo $cmt->user_name;?></p>
                  <p><?php echo getDuration($cmt->activity_date);?></p>
                </div>
                <div class="clear"></div>
              </li>
              <?php break;}
								$i++;
								//$offset++;	
							}
						
						}
					?>
            </ul>
            
            <!--
						 <div class="activity_msg">                  
                    <p style="margin:5px 0 0 15px;"><?php //echo $acti->act; ?></p>--> 
          </div>
          <div class="clr"></div>
          <?php echo anchor('user/activities/'.get_authenticateUserID(),'view all activity','class="activityall"'); ?> </div>
      </div>
    </div>
  </div>
</header>
<div class="wrapper">
  <div class="nav_wrapper">
    <div class="container">
      <div class="world">Worlds Largest Film Funding Creation</div>
      <div class="browse_category"> <a href="#." class="show_category">Browse by Categories <img src="<?php echo base_url(); ?>images/up_down_arrow.png" alt="" title="" align="right" /> </a>
        <div class="category_list">
          <?php  $all_cat = get_all_category();
     ?>
          <!--<ul>
            <li><a href="#.">Browse by Categories 1</a></li>
            <li><a href="#.">Browse by Categories 1</a></li>
            <li><a href="#.">Browse by Categories 1</a></li>
            <li style="border-bottom:none"><a href="#.">Browse by Categories 1</a></li>
          </ul>-->
          <ul>
            <?php if($all_cat){
				 foreach($all_cat as $cat){
					 if($cat->parent_project_category_id == 0){ ?>
            <li>
              <?php 

			   		if($select == $cat->project_category_id){
		   		echo anchor('discover/category/'.$cat->project_category_id,$cat->project_category_name,'id=active');
					}else{
					echo anchor('discover/category/'.$cat->project_category_id,$cat->project_category_name);
					} ?>
            </li>
            <?php
				  }
				 }
			  }?>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="clear"></div>
  <script type="text/javascript">

			$(".category_list").hide();
			$(".show_category").show();
			
			$('.show_category').click(function(){
			$(".category_list").slideToggle();
			});
						
		</script> 
</div>
<div id="search_res"></div>
