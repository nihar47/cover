
<div class="project_popup" id="project_popup" style="display:none;"> 
  
  <!--Project Popup-->
  <?php //echo ?>
  <div class="project_popup_top">
    <div id="page_we"> 
      <!--  /*<div class="title_p">*/-->
      <?php /*?>  <img src="<?php echo base_url(); ?>/images/logo_popup.png" class="new_l"/><?php */?>
      <img src="<?php echo base_url(); ?>/upload/orig/<?php echo $site_setting['site_logo'];?>" class="new_l"/>
      <p> <?php echo KICKSTARTER_IS_A_FUNDING_PLATFORM_FOR_CREATIVE_PROJECTS; ?>.&nbsp;&nbsp;<a href="#"><?php echo LEARN_MORE; ?>!</a></p>
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
			/*iframe, embed{
				width:539px;
				height:401px;
			}*/
		</style>
          <?php //print_r($project);
		if(isset($project) && !empty($project)){
		foreach($project as $prjct){?>
          <li>
            <div class="create_c">
              <div class="pup_left"> 
                <!--<img src="<?php echo base_url(); ?>/images/popupleft.png" height="401" width="539"/>-->
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
                <div class="mp_img"> <a href="#" class="loc_anchor"><?php echo get_city_name($prjct->project_city);?>, <?php echo get_country_name($prjct->project_country);?></a> <?php echo anchor('discover/category/'.$prjct->category_id,project_getcategory_name($prjct->category_id),'class="loc_anchor1"');?> </div>
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
                    <!--<td class="prior" style="border:none;"><?php // echo DAYS_LEFT?></td>--> 
                  </tr>
                </table>
                <div class="explore">
                  <?php 
              echo anchor('projects/'.$prjct->url_project_title.'/'.$prjct->project_id,EXPLORE_THIS_PROJECT,'class="explore"');?>
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
<style type="text/css">
/*  	.lg_demo{
	background: url(<?php echo base_url(); ?>images/77863logo.png) no-repeat;
	float: left;
	display: block;
	width: 338px;
	height: 66px;
	margin: 25px 0 0 0;
	
	}*/
  </style>
<div class="wrapper">
  <header id="header">
    <div class="container">
      <div class="logo"><a href="<?php echo site_url('home')?>"> <img src="<?php echo base_url(); ?>images/77863logo.png"/> </a> </div>
      <ul id="headernav">
        <li>
          <?php if(isset($link)){ ?>
          <?php echo anchor('home/content/what-is-indie-film-funding/16',WHAT_IS, 'class="linkact"'); }else {echo anchor('home/content/what-is-indie-film-funding/16',WHAT_IS); } ?> 
          <!-- <p><?php echo IFF; ?></p>--> 
        </li>
        <li>
          <?php if(isset($link)){ ?>
          <?php echo anchor('discover',DISCOVER, 'class="linkact"'); }else {echo anchor('discover',DISCOVER); } ?> 
          <!--<p><?php echo GREAT_PROJECTS; ?></p>--> 
        </li>
        <?php $attr = array(
'target'=>'_blank'
);
?>
        <li style="border-right:1px solid #e2e2e2;"><?php echo  anchor('start',START,$attr);?> 
          <!--  <p><?php echo YOUR_PROJECTS; ?></p>--> 
        </li>
      </ul>
      <ul class="loginul">
        <?php if(isset($frm_name)){?>
        <li style="border-right:none; margin-right:0;">
          <? if($frm_name=='signup'){ ?>
          <?php echo anchor("home/signup",SIGN_UP);}else{ echo anchor("home/signup",SIGN_UP); } ?></li>
        <li>
          <? if($frm_name=='login'){ ?>
          <?php echo anchor("home/login",SIGN_IN);}else{ echo anchor("home/login",SIGN_IN); } ?></li>
        <?php }else{ ?>
        <li style="border-right:none; margin-right:0;"><?php echo anchor("home/signup",SIGN_UP,"class='sign'"); ?></li>
        <li><?php echo anchor("home/login",SIGN_IN); ?></li>
        <?php } ?>
      </ul>
      <div class="headersearch">
        <input type="text" name="search" id="serach" onkeyup="searchproject(this.value)"  placeholder="Search Projects.."/>
        <input type="submit" value="" />
      </div>
    </div>
  </header>
</div>
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

			$(document).ready(function(){

			$(".category_list").hide();
			$(".show_category").show();
			
			$('.show_category').click(function(){
			$(".category_list").slideToggle();
			});
		
		});
			
		</script> 
</div>
<div id="search_res"></div>
