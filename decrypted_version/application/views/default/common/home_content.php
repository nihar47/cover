<style>
.jcarousel-skin-tango .jcarousel-prev-horizontal {
	left:0;
	top: 174px;
}
.jcarousel-skin-tango .jcarousel-next-horizontal {
	top: 174px;
}
.am-container a {
	height: 90px !important;
	margin: 2px !important;
	width: 116px !important;
}
</style>
<script>
$(document).ready(function(){
	$('.icon-close').click(function(){
		$('#social-tout').hide();
	});
	
	 $('#mycarousel').jcarousel();
	  $('#mycarousel_project').jcarousel();
	   $('#mycarousel_project_latest').jcarousel();
	    $("#slider").easySlider();
            
           /* var menuItems = $("ul.cproject_right li");
        //How many do we have?
			var numItems = menuItems.length;
			
			var rand = Math.floor( (Math.random()* numItems ) ); 
			
			$("ul.cproject_right li:eq("+ rand + ") a").addClass("catacthover");
			
			$(".cproject_left li").hide(); //Hide all tab content
		
			var activeTab2 = $(".cproject_right li:eq("+ rand + ") a").attr("id").replace('cat',''); //Find the rel attribute value to identify the active tab + content
			$("#catproj"+activeTab2).fadeIn('slow');*/
           		
            
	  });
	   </script>
<section>
  
  <!--<div class="section_head">
<div class="galcont" id="galcont">
    <div class="imglist">
    <!--Montage Gallery on home page-->
    
<div class="wrapper">
    <div class="container ">
      <div class="banner_wrapper">
        <div id="products_example">
          <div id="products"> 
            <!-- Actual images -->
            <div class="ban_left"> 
              <!--                 <img src="images/banner/banner_2.jpg" alt="" title="" />-->
              
              <div class="banner"> 
                <!-- <div><img src="images/banner/banner_2.jpg"  alt="" /></div>--> 
                
                <!-- Start photoslider-bullets -->
                <div class="sliderkit photoslider-bullets photosgallery-captions">
                  <div class="sliderkit-nav">
                    <div class="sliderkit-nav-clip">
                      <ul>
                      <?php if($slider_content) {
					  
					foreach($slider_content as $slide){ ;  
					?>
					<li><a href="<?php // echo base_url().$slide->url_project_title."/".$slide->project_id; ?>" title="<?php echo $slide->project_title; ?>"></a></li>
					<?php }
					  }?>
                   
                      </ul>
                    </div>
                  </div>
                  <div class="sliderkit-panels">
                     <?php if($slider_content) {
						foreach($slider_content as $slide){  ?>
					<div class="sliderkit-panel"> 
                   <?php //echo $slide->image;
				   if(is_file("upload/slider/".$slide->image)) {?>
                   <img src="<?php echo base_url();?>upload/slider/<?php echo $slide->image; ?>" alt="<?php echo $slide->project_title; ?>" /> 
                   <?php }else {?>
                   <img src="<?php echo base_url();?>upload/slider/no_img.jpg" alt="<?php echo $slide->project_title; ?>" /> 
                   <?php }?>
                      <div class="sliderkit-panel-textbox">
                        <div class="sliderkit-panel-text"> 
                         	<h4><a href="<?php  echo base_url()."projects/".$slide->url_project_title."/".$slide->project_id; ?>" title="<?php echo $slide->project_title; ?>">
							<?php echo $slide->project_title; ?></a>
                           <span> <a class="learn-more" href="<?php  echo base_url()."projects/".$slide->url_project_title."/".$slide->project_id; ?>" title="<?php echo $slide->project_title; ?>">
							Learn More</a></span>
                            </h4>
							<!--		<p><?php echo $slide->project_summary; ?></p>-->
                        </div>
                     <!--   <div class="sliderkit-panel-overlay"></div>-->
                      </div>
                    </div>
					<?php }
					 } ?>
                                       
                  </div>
                </div>
                <!-- // end of photoslider-bullets --> 
                
              </div>
            </div>
            <div class="ban_right">
              <div class="clickbox1">
                <div class="click_box">
                  <h1>What is Indie Film Funding?</h1>
                  <h2><a href="<?php echo base_url(); ?>home/content/what-is-indie-film-funding/16">Click here</a> to know more about this</h2>
                </div>
              </div>
              <div class="clickbox2">
                <div class="click_box">
                  <h1>Browse Projects</h1>
                  <h2><a href="<?php echo base_url(); ?>discover">Click here</a> to know more about this</h2>
                </div>
              </div>
              
              <!-- Third Thumbnail -->
              
              <div class="clickbox3">
                <div class="click_box">
                  <h1>Start Your Own Project</h1>
                  <h2><a href="<?php echo base_url(); ?>start">Click here</a> to know more about this</h2>
                </div>
              </div>
            </div>
            <div class="clear"></div>
          </div>
        </div>
      </div>
      
      <!--thumb slider end--> 
      
    </div>
  </div>
  
  <div  id="page_we">
    <?php /*?><?php if($project){
			foreach($project as $prj)
			{?>
    <a href="javascript:void(0);" id="montage<?php echo $prj->project_id;?>" onclick="showprojectpopup(this.id);">
    <?php if($prj->image !='' && is_file('upload/thumb/'.$prj->image)){?>
    <img src="<?php echo base_url();?>upload/thumb/<?php echo $prj->image; ?>"/>
    <?php  } ?>
    </a>
    <?php }
		}?><?php */?>
    <!--End Montage Gallery on home page
			</div>
    </div>
        <div class="creativ">
        	<h2>Fund <span style="color:#ff7e15;">&</span>&nbsp;<?php echo FOLLOW_CREATIVITY; ?></h2>
            <p> <?php echo $site_setting['site_name'].' '.KICKSTARTER_IS_A_FUNDING_PLATFORM_FOR_CREATIVE_PROJECTS; ?>. <?php echo LEARN_MORE; ?>! </p><div class="clr"></div>
            <h1><?php echo FEATURED_IN; ?></h1><hr style=" color:#cac9c9;" />
            <img src="<?php echo base_url(); ?>/images/sponcer1.jpg" class="sponcerimg" />
            <img src="<?php echo base_url(); ?>/images/sponcer2.jpg" class="sponcerimg" />
            <img src="<?php echo base_url(); ?>/images/sponcer3.jpg" class="sponcerimg" />
            <img src="<?php echo base_url(); ?>/images/sponcer4.jpg" class="sponcerimg" />
            <img src="<?php echo base_url(); ?>/images/sponcer5.jpg" class="sponcerimg" />
          </div>
    </div><div class="clr"></div>-->
    
    <div>
    
    <?php if($msg=='signup'){?>
<script type="text/javascript">
$(document).ready(function(){			 
				 $.colorbox({
					 width:"50%", 
					 inline:true, 
					 href:"#title_form",
					 onCleanup:function()
					 {					 
					  window.location.href = "<?php echo base_url(); ?>home/index";
					  }
					 });			 
			});
		
</script>
  <?php } ?>
  
  <div style='display:none'>
              <div id='title_form' style='padding:10px; background:#fff;'>
                <p style="color:#84C200; text-align:center; font-size:14px; font-weight:bold;"><?php echo YOU_HAVE_SIGNED_UP_SUCCESSFULLY; ?></strong></p>                
              </div>
            </div> 
            
            
             <?php if($msg=='done'){?>
<script type="text/javascript">
$(document).ready(function(){			 
				 $.colorbox({
					 width:"50%", 
					 inline:true, 
					 href:"#title_form1",
					 onCleanup:function()
					 {					 
					  window.location.href = "<?php echo base_url(); ?>home/index";
					  }
					 });			 
			});
		
</script>
  <?php }?>
  
  <div style='display:none'>
              <div id='title_form1' style='padding:10px; background:#fff;'>
                <p style="color:#84C200; text-align:center; font-size:14px; font-weight:bold;"><?php echo YOUR_DONATION_MADE_SUCCESSFULLY; ?>.</strong></p>                
              </div>
            </div> 
            
              <?php if($msg=='payment_success'){?>
<script type="text/javascript">
$(document).ready(function(){			 
				 $.colorbox({
					 width:"50%", 
					 inline:true, 
					 href:"#frm_project",
					 onCleanup:function()
					 {					 
					  window.location.href = "<?php echo base_url(); ?>home/index";
					  }
					 });			 
			});
		
</script>
  <?php }?>
  
  <div style='display:none'>
              <div id='frm_project' style='padding:10px; background:#fff;'>
                <p style="color:#84C200; text-align:center; font-size:14px; font-weight:bold;"><?php echo "Thank you, Your payment had been completed successfully."; ?>.</strong></p>                
              </div>
            </div> 
    
    
   
    
       
      <?php if($msg=='logout'){ ?>
      <p style="color:#84C200; text-align:center; font-size:14px; font-weight:bold;"><?php echo YOU_ARE_SIGNED_OUT_SUCCESSFULLY; ?></p>
      <?php } ?>
      <?php if($msg=='success'){ ?>
      <p style="color:#84C200; text-align:center; font-size:14px; font-weight:bold;"><?php echo YOUR_ACCOUNT_ACTIVATED_SUCCESSFULLY; ?></p>
      <?php } ?>
      <?php if($msg=='active'){ ?>
      <p style="color:#84C200; text-align:center; font-size:14px; font-weight:bold;"><?php echo YOUR_ACCOUNT_IS_ALREADY_ACTIVE; ?></p>
      <?php } ?>
      <?php if($msg=='error'){ ?>
      <p style="color:#B00000; text-align:center; font-size:14px; font-weight:bold;"><?php echo ERROR_OCCURED_IN_ACTIVATING_ACCOUNT; ?></p>
      <?php } ?>
 
      <?php if($msg=='fail'){ ?>
      <p style="color:#F00; text-align:center; font-size:14px; font-weight:bold;"><?php echo YOUR_DONATION_FAILED; ?></p>
      <?php } 
?>
      <?php if($msg=='send'){ ?>
      <p style="color:#84C200; text-align:center; font-size:14px; font-weight:bold;"><?php echo MESSAGE_SEND; ?></p>
      <?php } 
?>
      <?php if($msg=='cannot'){ ?>
      <p style="color:#B00000; text-align:center; font-size:14px; font-weight:bold;"><?php echo sprintf(YOU_CANNOT_DONATE_ON_THIS_PROJECT,$site_setting['maximum_donate_per_project']); ?></p>
      <?php } 
?>
      <?php if($msg=='not'){ ?>
      <p style="color:#B00000; text-align:center; font-size:14px; font-weight:bold;"><?php echo sprintf(YOU_CANNOT_CREATE_PROJECT,$site_setting['maximum_project_per_year']); ?></p>
      <?php } 
?>
    </div>
    <div class="categgory_projet"> 
      
      <!--<ul>
       
        	<li id="catproj<?php /* echo $cat->project_category_id;*/?>">-->
      <div class="title project_cont_top"> <?php echo Feature; ?>
        <?php /*echo project_getcategory_name($cat->project_category_id);*/?>
        </a>
         <?php
			if(count($featured)>1){
			?>
         <a href="<?php echo site_url('discover/featured/');?>" class="viweall"><?php echo SEE_ALL;?>
        <?php /*?> <?php echo count_category_project($cat->project_category_id)?> <?php echo project_getcategory_name($cat->project_category_id);?> <?php echo PROJECTS;?><?php */?>
        </a>
         <?php
			}
			?>
         </div>
      <style type="text/css">
						iframe, embed{
							width:470px;
							height:270px;
							float:left;
							margin-top:5px;
						}
					</style>
      <?php 
			if($featured){
			//	print_r($featured); die;
			foreach($featured as $topfunded){
					if($topfunded->video !='')
			            {
    	                    if($topfunded->video_type ==1 && $topfunded->custom_video !='') {	?>
      <script type="text/javascript">
            AC_FL_RunContent( 'codebase','http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0','width','602','height','350','id','fullscreen','align','middle','src','<?php echo base_url(); ?>images/flvplayer','flashvars','file=<?php echo base_url(); ?>upload/video/<?php echo $topfunded->custom_video; ?>','quality','high','salign','tl','bgcolor','#ffffff','name','fullscreen','allowscriptaccess','sameDomain','wmode','transparent','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','<?php echo base_url(); ?>images/flvplayer' ); //end AC code
            </script>
      <noscript>
      <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="602" height="350" id="fullscreen" align="middle">
        <param name="allowScriptAccess" value="sameDomain" />
        <param name="movie" value="<?php echo base_url(); ?>images/flvplayer.swf" />
        <param name="quality" value="high" />
        <param name="salign" value="tl" />
        <param name="bgcolor" value="#ffffff" />
        <param name="wmode" value="transparent">
        <param NAME=FlashVars VALUE="file=<?php echo base_url(); ?>upload/video/<?php echo $topfunded->custom_video; ?>">
        <embed src="<?php echo base_url(); ?>images/flvplayer.swf" FlashVars="file=<?php echo base_url(); ?>upload/video/<?php echo $topfunded->custom_video; ?>" quality="high" salign="tl" bgcolor="#ffffff" width="558" height="418" name="fullscreen" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" />
        </embed>
      </object>
      </noscript>
      <?php }   
		elseif($topfunded->video_type == 0 && $topfunded->video!='') {   	
            
            
            if(substr_count($topfunded->video,'object')>0)
            {
                echo html_entity_decode($topfunded->video); 
            }
            
            elseif(substr_count($topfunded->video,'iframe')>0)
            {
                    if(substr_count($topfunded->video,'youtube')>0)
                    {
                        $patterns[] = '/src="(.*?)"/';
                        
                        $replacements[] = 'src="${1}?wmode=transparent"';
                        
                        echo preg_replace($patterns, $replacements,$prjct->video);
                        
                    }
                    elseif(substr_count($topfunded->video,'vimeo')>0)
                    {
                                    
                        $patterns[] = '/src="(.*?)"/';	
                        preg_match('/src="(.*?)"/',$topfunded->video,$matches);
                        echo '<iframe width="470" height="270" src="'.$matches[1].'" frameborder="0" allowfullscreen></iframe>';
                    
                    }
                    
                    else
                    {
                               echo $topfunded->video;
                    }
            
            }
            
            else
            {
                    if(substr_count($topfunded->video,'youtu.be')>0)
                    {
                        
                        $topfunded->video=str_replace('youtu.be','www.youtube.com/v',$topfunded->video);
						  $topfunded->video = str_replace(array("v=", "v/", "vi/"), "v=",$topfunded->video);
                    
                        preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#",$topfunded->video,$matches);
                        echo '<iframe width="470" height="270" src="http://www.youtube.com/embed/'.$matches[0].'?wmode=transparent" frameborder="0" allowfullscreen></iframe>';
                    
                    }
                    
                    elseif(substr_count($topfunded->video,'youtube')>0)
                    {
                        $prjct->video = str_replace(array("v=", "v/", "vi/"), "v=",$topfunded->video);
                    
                        preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#",$topfunded->video,$matches);
                        
                        echo '<iframe width="470" height="270" src="http://www.youtube.com/embed/'.$matches[0].'?wmode=transparent" frameborder="0" allowfullscreen></iframe>';
                        
                    }
                    elseif(substr_count($topfunded->video,'vimeo')>0)
                    {
                    
                        $vid_code = explode("/",$topfunded->video);
                        $vid = $vid_code[count($vid_code)-1];
                        echo '<iframe src="http://player.vimeo.com/video/'.$vid.'?title=0&byline=0&portrait=0" width="558" height="418"  frameborder="0"></iframe>';
                    
                    }
                    
                    else
                    {
                    
                        echo $topfunded->video;  
                    }
            
            }
            
             }
            				 //http://www.youtube.com/watch?v=3iu6fhwtdl0
                    		else { 
                        ?>
      <img src="<?php echo base_url();?>upload/thumb/no_img.jpg" border="0" width="558" height="418" />
      <?php		
                        
                        }
          		 }
						?>
      <div class="project_detail">
        <?php 
					$user_detail = get_user_detail($topfunded->user_id);
					/*if(is_file('upload/thumb/'.$user_detail['image']))
						{
							$img = $user_detail['image'];
						}else{
							$img = NO_MAN;
						}			
					if(is_file('upload/thumb/'.$user_detail['image'])){
						?> <img src="<?php echo base_url().'upload/thumb/'.$img; ?>" alt=""class="topfundimg"/><?php
					}
				 elseif($user_detail['fb_uid']!='' && $user_detail['fb_uid']>0) { ?>
				    <img src="http://graph.facebook.com/<?php echo $user_detail['fb_uid']; ?>/picture?type=large" alt="" class="topfundimg"/>
				<?php } else { ?>
               				<img src="<?php echo base_url().'upload/thumb/'.$img; ?>" alt="" class="topfundimg" />
				<?php }*/ ?>
        <div class="project-title">
          <h2><?php echo anchor('projects/'.$topfunded->url_project_title.'/'.$topfunded->project_id,$topfunded->project_title); //echo $topfunded->project_title;?></h2>
          <p><?php echo BY.' '.getUserNamebyid($topfunded->user_id).' '.get_state_name($topfunded->project_state).','.get_country_name($topfunded->project_country);?></p>
        </div>
        <div class="clr"></div>
        <p class="project-summary"><?php echo $topfunded->project_summary?>. </p>
        <?php 
						$site_setting = site_setting();
						$topfunded->amount = str_replace($site_setting['currency_symbol'], "",$topfunded->amount);
						if($topfunded->amount == '0' or $topfunded->amount == '')
						{
						$w = 0;
						}else{
							if($topfunded->amount_get>=$topfunded->amount)
							{
								$w=100;
							}
							else
							{
								$w = ($topfunded->amount_get/$topfunded->amount)*100;
								
								if($w>0 && $w<1)
								{
									$w=1;
								}
								
								
					}
				}?>
        <div class="progressbar">
          <div class="procalculat" style="width:<?php echo $w; ?>%;max-width:100%;"></div>
        </div>
        <ul class="project_daydetail">
          <li>
            <h1><?php echo round($w,0); ?> %</h1>
            <p><?php echo FUNDED;?></p>
          </li>
          <li>
            <h1><?php echo $site_setting['currency_symbol'].' '.$topfunded->amount_get;?></h1>
            <p><?php echo PLEDGED;?></p>
          </li>
          <li>
            <?php
				
							$dateg = $topfunded->end_date;
							$date1 = $dateg;
							$date2 = date("Y-m-d");
							$diff = abs(strtotime($date2) - strtotime($date1));
							$test = floor($diff / (60*60*24));
							$str = '';
				
		//echo strtotime(date('Y-m-d',strtotime($dateg))).'=='.strtotime(date('Y-m-d'));exit;
			
			if(strtotime(date('Y-m-d',strtotime($dateg))) > strtotime(date('Y-m-d'))) 
			{
				$temp = floor($diff / (60*60*24));
			
				$str = ($dateg!="0000-00-00 00:00:00")? "<h1>".$test."</h1><p>".DAYS_TO_GO."</p>":"<br /><p>&nbsp;</p>";
			}else {
				
				
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
				
						$str ="<h1>".$hours."</h1> <p>".HOURS_LEFT."</p>";
						if($hours != 0){						
							$str ="<h1>".$hours."</h1> <p>".HOURS_LEFT."</p>";
						}
						elseif($minuts != 0) { 
							$str ="<h1>".$minuts."</h1> <p>".MINUTES_LEFT."</p>";
						}
						else{
							$str ="<h1>".$seconds."</h1> <p>".SECONDS_LEFT."</p>";
						}
						
					}
					else
					{
						$str = "<h1>0 </h1>  <p>".DAY_TO_GO."</p>";
					}
				}
				else
				{
					$str = "<h1>0 </h1>  <p>".DAY_TO_GO."</p>";
				}
					
				
			}
			echo $str;
			?>
          </li>
        </ul>
      </div>
      <?php break; } }else{
					   echo '<h3 style="margin-top:10px;display:inline-block;">'.NO_PROJECT_FOUND.'</h3>';}?>
      
      <!-- </li>
           
		</ul>
        --> 
    </div>
  </div>
  <div id="page_we">
    <div class="section_contain  trend">
      <h2 class="project_cont_top"><?php echo Trends;?></h2>
      <div class="clr"></div>
      <div class="project_cont">
        <ul id="mycarousel_project_latest" class="jcarousel-skin-tango">
          <?php
				$cnt=1;
				if($result)
				{	
					
					foreach($result as $rs)
					{?>
          <li style="margin:5px 0 5px 0;padding:0 0 10px 0;">
            <?php 
						$data['site_setting'] = site_setting(); 
						$data['rs'] = $rs;
						$this->load->view('default/common_card',$data);
						$cnt++;?>
          </li>
          <?php }
					    
				}
			?>
        </ul>
      </div>
    </div>
  </div>
  <!-----------------------------------------------------------------------------------------------------> 
  
  <!--<div id="page_we">
<div class="section_contain">
     	<h2 class="project_cont_top"><?php echo ENDING_SOON;?></h2><div class="clr"></div>
    	<div class="project_cont">
         
		  <ul id="mycarousel_project" class="jcarousel-skin-tango">
         	
			<?php
				$cnt=1;
				if($endingsoon)
				{	
					
					foreach($endingsoon as $rs)
					{?>
                    <li style="margin:5px 0 5px 0;padding:0 0 10px 0;">
						<?php 
						$data['site_setting'] = site_setting(); 
						$data['rs'] = $rs;
						$this->load->view('default/common_card',$data);
						$cnt++;?>
						 </li>
			
					<?php }
					    
				}
			?>           
         
         </ul>   
        </div>
    </div>
 </div> 
</div>-->
  
  <div class="wrapper connet_section">
    <div class="container discover_section">
      <div class="ifriend">Friends</div>
     <!-- <div class="seeall"><a href="">See all</a></div>-->
      <div class="connectfb">
        <div class="creativ">
          <?php  
$data = array(
	'facebook'		=> $this->fb_connect->fb,
	'fbSession'		=> $this->fb_connect->fbSession,
	'user'			=> $this->fb_connect->user,
	'uid'			=> $this->fb_connect->user_id,
	'fbLogoutURL'	=> $this->fb_connect->fbLogoutURL,
	'fbLoginURL'	=> $this->fb_connect->fbLoginURL,	
	'base_url'		=> site_url('home/facebook'),
	'appkey'		=> $this->fb_connect->appkey,
);

$fbLoginURL=$this->fb_connect->fbLoginURL; 
	
		
		$fbLoginURL=str_replace(urlencode(site_url('home/facebook/')),site_url('home/facebook/backinvite/'),$fbLoginURL);		
	 
	  //print_r($friend_list);
?>
          <script type="text/javascript" src="http://connect.facebook.net/en_US/all.js"></script> 
          <script type="text/javascript">
    FB.init({ appId: "<?php echo $data['appkey'];?>",status: true,cookie: true,xfbml: true,oauth: true});
	</script> 
          <script type="text/javascript">
 	function optuser(id)
	{
		
		if(id=='') { return false; }
			var strURL='<?php echo site_url('friends/optuser/');?>/'+id;
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
				
					if(xmlhttp.responseText=='optoutuser')
					{
						document.getElementById("fb_cnt").innerHTML='<a href="<?php echo $fbLoginURL; ?>"><img src="<?php echo base_url()?>images/connect_f.png"  alt="" class="you" /></a><h5><span><?php FACEBOOK_INVOTE_FRIEND_TEXT;?></span></h5>';
				
					}
					
				}
			}
			xmlhttp.open("GET",strURL,true);
			xmlhttp.send();
	}
 </script>
          <h2><?php echo WHERE_PROJECTS_COME_FROM; ?></h2>
          <p><?php echo sprintf(EACH_AND_EVERY_KICKSTARTERCLONE_PROJECT_IS_THE_INDEPENDENT_CREATION_OF_SOMEONE_LIKE_YOU,$site_setting['site_name']); ?>.
            <?php /* echo WANT_TO_START_A_PROJECT_OR_JUST_CURIOUS_ABOUT_HOW_IT_ALL_WORKS;*/ ?>
            <?php // if($uid==""){?>
          <div class="clr"></div>
          <a href="<?php  echo $fbLoginURL; ?>"><span><img src="<?php echo base_url()?>images/connect_fb_icon.png"  alt="" /></span><?php echo CONNECT_FACEBOOK; ?></a>
          <?php // }else{  ?>
          
          <!--<a href="#"><?php ?></a>-->
          <?php //  } ?>
          </p>
          <div class="clr"></div>
        </div>
      </div>
    </div>
  </div>
  <!----------------------------------------CURATED OAGES------------------------------------>
  <div id="page_we">
    <div class="section_contain curated">
      <div class="clr"></div>
      <h2 class="project_cont_top"><?php echo FILM_FESTIVALS;?></h2>
      <div class="clr"></div>
      <div class="curated">
        <ul id="mycarousel" class="jcarousel-skin-tango" style="width:1638px !important; height:100px;">
          <?php if($curated){
					foreach($curated as $curt){?>
          <li>
            <?php
					if(is_file("upload/curated_thumb/".$curt->curated_image)){
						 
					   echo anchor($curt->curated_link,'<img class="sponcer_img" src="'.base_url().'upload/curated_thumb/'.$curt->curated_image.'" alt=""  title="'.ucfirst($curt->curated_title).'" /> ','target="_blank"'); 		  
					  } else{ 
							 echo anchor($curt->curated_link,'<img class="sponcer_img" src="'.base_url().'upload/curated_thumb/no_img.jpg" title="'.ucfirst($curt->curated_title).'" />','target="_blank"');
					}
				}?>
          </li>
          <?php }?>
        </ul>
      </div>
    </div>
  </div>
  <div class="wrapper aim">
    <div class="container camera_position">
      <div class="start_won_project">
      
        <h1><a href="http://www.indiefilmfunding.com/demo/home/signup"><?php echo START_YOUR_OWN_PROJECT; ?></a></h1>
        <!--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
          Lorem Ipsum</p>-->
      </div>
    </div>
  </div>
</section>
<script type="text/javascript" src="<?php echo base_url(); ?>/js/jquery.montage.min.js"></script>
<script type="text/javascript">
			$(function() {
				
				// initialize the plugin
				var $container 	= $('#am-container'),
					$imgs		= $container.find('img').hide(),
					totalImgs	= $imgs.length,
					cnt			= 0;

									
				$imgs.each(function(i) {
					var $img	= $(this);
					$('<img/>').load(function() {
						++cnt;
						if( cnt === totalImgs ) {
							$imgs.show();
							$container.montage({
								minsize	: true,
								margin 	: 2
							});
							
							var imgarr	= new Array();
							for( var i = 1; i <= 73; ++i ) {
								imgarr.push( i );
							}
						}
					}).attr('src',$img.attr('src'));
				});
				
				
				var $container2 	= $('#am-container2'),
					$imgs2		= $container2.find('img').hide(),
					totalImgs2	= $imgs2.length,
					cnt2			= 0;	
					
					
				$imgs2.each(function(i) {
					var $img2	= $(this);
					$('<img/>').load(function() {
						++cnt2;
						if( cnt2 === totalImgs2 ) {
							$imgs2.show();
							$container2.montage({
								minsize	: true,
								margin 	: 2
							});
							var imgarr2	= new Array();
							for( var i = 1; i <= 73; ++i ) {
								imgarr2.push( i );
							}
						}
					}).attr('src',$img2.attr('src'));
				});					
			});
		</script>
        
        
        	<script type="text/javascript"> 
 
jQuery(document).ready(function() {
    jQuery('#mycarousel').jcarousel({
    	wrap: 'circular'
    });
});
 
</script> 
