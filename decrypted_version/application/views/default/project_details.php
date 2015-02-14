<script src="DWConfiguration/ActiveContent/IncludeFiles/AC_RunActiveContent.js" type="text/javascript"></script>


<div id="container"><br />
<div class="wrap930">	
	
	<div class="con_left2">
		<!--====================left==============--> 




<!--Header title-->

		
	<div style="margin-left:11px; background:#F5F5F5; width:602px; height:189px; position:relative;">	
		
<h3 class="stitle" title="<?php echo $project['project_title']; ?>"><?php echo substr(trim($project['project_title']),0,45);  ?></h3>



<h3 class="stitle" style="font-size: 17px; padding-top:0px; padding-bottom:10px; line-height:19px;">
<?php if($project['project_summary']!='') { 
					echo substr(strip_tags($project['project_summary']),0,95); 						
				} ?>
                </h3>

<div class="clear"></div>






<div style="float:left;margin-top:10px; margin-left:11px; ">

<table border="0" cellpadding="0" cellspacing="0">

<tr>

<td align="left" valign="middle"><img src="<?php echo base_url();?>images/reward.png" onmouseout="this.src='<?php echo base_url();?>images/reward.png'" onmouseover="this.src='<?php echo base_url();?>images/reward-ho.png' " border="0" /></td>

<td align="left" valign="middle">&nbsp;&nbsp;&nbsp;<?php echo anchor('search/category/'.$project_category->project_category_id,$project_category->project_category_name,'style="text-transform:capitalize; color:#000000;font-size:13px;" '); ?></td>


<td align="left" valign="middle" style="padding-left:15px;"><img src="<?php echo base_url();?>images2/flag.png"  border="0" /></td>

<td align="left" valign="middle" style="text-transform:capitalize; color:#000000;font-size:13px;"><?php echo get_city_name($project['project_city']).', '.get_state_name($project['project_state']); ?></td>


</tr>


</table>


</div>



<script type="text/javascript" language="javascript">
	function change_div(did)
	{
		document.getElementById('sp_overview').style.display = "none";
		document.getElementById('sp_updates').style.display = "none";
		document.getElementById('sp_comments').style.display = "none";
		document.getElementById('sp_backers').style.display = "none";
		document.getElementById('sp_gallery').style.display = "none";
		document.getElementById('sp_followers').style.display = "none";
		
		document.getElementById('sp_'+did).style.display = "block";
		
		document.getElementById('h_overview').className = "h3sel2";
		document.getElementById('h_updates').className = "h3sel2";
		document.getElementById('h_comments').className = "h3sel2";
		document.getElementById('h_backers').className = "h3sel2";
		document.getElementById('h_gallery').className = "h3sel2";
		document.getElementById('h_followers').className = "h3sel2"; 
		
		document.getElementById('h_'+did).className = "h3notsel2";
	}
	
function LTrim( value ) {
	
	var re = /\s*((\S+\s*)*)/;
	return value.replace(re, "$1");
	
}

// Removes ending whitespaces
function RTrim( value ) {
	
	var re = /((\s*\S+)*)\s*/;
	return value.replace(re, "$1");
	
}

// Removes leading and ending whitespaces
function trim( value ) {
	
	return LTrim(RTrim(value));
	
}
	
</script>


<div style="  margin:25px 0px 0px 10px; bottom:0px; position:absolute; ">
	<h3 id="h_overview" class="h3notsel2" onclick="change_div('overview');"><?php echo PROJECT_DETAILS_OVERVIEW; ?></h3>
	<h3 id="h_updates" class="h3sel2" onclick="change_div('updates');"><?php echo PROJECT_DETAILS_UPDATES; ?></h3>
	<h3 id="h_comments" class="h3sel2" onclick="change_div('comments');"><?php echo PROJECT_DETAILS_COMMENTS; ?></h3>
    <h3 id="h_backers" class="h3sel2" onclick="change_div('backers');"><?php echo PROJECT_DETAILS_BACKERS; ?></h3>
    <h3 id="h_gallery" class="h3sel2" onclick="change_div('gallery');"><?php echo PROJECT_DETAILS_GALLERY; ?></h3>
    <h3 id="h_followers" class="h3sel2" onclick="change_div('followers');"><?php echo FOLLOWERS; ?></h3>&nbsp;
	
</div>






</div>


<!--Header title-->




<div class="clear"></div>


<div id="sp_overview" class="divsel" style="display:block; margin:0px; background:none; border:none;" >


	
	<?php
		//$project['amount'] = str_replace("$", "", $project['amount']);
		if($project['amount'] == '0' or $project['amount'] == '')
		{
			$w = 0;
		}
		else
		{		
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
		}
		else
		{
			$r = 0;
		}
	?>
		
		
<div align="left" style="margin-top:14px;">


	<style type="text/css">
	iframe, embed{
	width:602px;
	height:340px;
	
	}
	
	</style>
	
<?php  
	
	if($project['display_page']==1)
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
<embed src="<?php echo base_url(); ?>images/flvplayer.swf" FlashVars="file=<?php echo base_url(); ?>upload/video/<?php echo $project['custom_video']; ?>" quality="high" salign="tl" bgcolor="#ffffff" width="602" height="340" name="fullscreen" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" /></embed>
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
			
			
			
			
			echo '<iframe width="602" height="340" src="'.$matches[1].'" frameborder="0" allowfullscreen></iframe>';
		
			
		
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
			
		
			
			echo '<iframe width="602" height="340" src="http://www.youtube.com/embed/'.$matches[0].'?wmode=transparent" frameborder="0" allowfullscreen></iframe>';
		
		}
		
		elseif(substr_count($project['video'],'youtube')>0)
		{
			
			
			$project['video'] = str_replace(array("v=", "v/", "vi/"), "v=",$project['video']);
		
	
			preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#",$project['video'],$matches);
			
		
			
			echo '<iframe width="602" height="340" src="http://www.youtube.com/embed/'.$matches[0].'?wmode=transparent" frameborder="0" allowfullscreen></iframe>';
			
		}
		elseif(substr_count($project['video'],'vimeo')>0)
		{
		
			$vid_code = explode("/",$project['video']);
			$vid = $vid_code[count($vid_code)-1];
			echo '<iframe src="http://player.vimeo.com/video/'.$vid.'?title=0&byline=0&portrait=0" width="602" height="340"  frameborder="0"></iframe>';
		
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
						 
						 
						 <img src="<?php echo base_url();?>upload/thumb/<?php echo $prjgry->project_image; ?>" border="0" width="602" height="340" /> 
						 
						 <?php
							$cnt_gal=2;
						}
						
									
				}
				
			}
			elseif($cnt_gal==1)
			{
			 
			 ?>
			 
			  <img src="<?php echo base_url();?>upload/thumb/no_img.jpg" border="0" width="602" height="340" /> 
			 
			 <?php
			 		
			} else { 
			
			?>
			
			  <img src="<?php echo base_url();?>upload/thumb/no_img.jpg" border="0" width="602" height="340" /> 
			  
			  
			<?php		
			
			}
	
	}
 
 }
 

if($project['display_page']==0)
{
 
 		if($project['image']!='' && is_file('upload/thumb/'.$project['image']) ){  ?>
 
 
 <img src="<?php echo base_url();?>upload/thumb/<?php echo $project['image']; ?>" border="0" width="602" height="340" /> 
 
 <?php  } else {
 
 			
			$cnt_gal=1;
			
			if($project_gallery)
			{ 
			   	foreach($project_gallery as $prjgry)
				{
					
						if($prjgry->project_image!=''  && is_file('upload/thumb/'.$prjgry->project_image) && $cnt_gal==1)
						{						
						 ?>
						 
						 
						 <img src="<?php echo base_url();?>upload/thumb/<?php echo $prjgry->project_image; ?>" border="0" width="602" height="340" /> 
						 
						 <?php
							$cnt_gal=2;
						}
						
									
				}
				
			}
			elseif($cnt_gal==1)
			{
			 
			 ?>
			 
			  <img src="<?php echo base_url();?>upload/thumb/no_img.jpg" border="0" width="602" height="340" /> 
			 
			 <?php
			 		
			} else { 
			
			?>
			
			  <img src="<?php echo base_url();?>upload/thumb/no_img.jpg" border="0" width="602" height="340" /> 
			  
			  
			<?php		
			
			}
	
	}
		


}

  ?>
	
		</div>
		
		
		<div style="padding:10px 0px 0px 0px;">
	
			
			
			<script type="text/javascript" src="<?php echo base_url(); ?>fancybox/jquery.fancybox-1.3.4.pack.js"></script>
			<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>fancybox/jquery.fancybox-1.3.4.css" media="screen" />
			<script type="text/javascript">
			jQuery(document).ready(function() {
				
				
				jQuery("#various1").fancybox({
					'titlePosition'		: 'inside',
					'transitionIn'		: 'none',
					'transitionOut'		: 'none'
				});
				
				jQuery("#various12").fancybox({
					'titlePosition'		: 'inside',
					'transitionIn'		: 'none',
					'transitionOut'		: 'none'
				});
				
				
	
				
			});
		
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
			
            
            
           
            
   
            
			
	<table align="center" width="602" border="0" cellpadding="0" cellspacing="0" style="border:1px solid #B5D7FA;background:#E3F1FE;border-radius:3px;">
				<tr>
					
					<td valign="top" style="padding:10px;">
						<a class="pg_img"  href="javascript:void(0)" onclick="javascript:window.open('http://www.facebook.com/share.php?u=<?php echo site_url('projects/'. $project['url_project_title'].'/'.$project['project_id']); ?>','name1','height=250,width=550,top=200,left=300')"  ><img src="<?php echo base_url(); ?>images/11.png" alt="" width="32" height="32" border="0" style="float:left;" /></a>
						
						
						
 					</td>
					
					<td width="1" bgcolor="#B5D7FA"></td>
					
					<td valign="top" style="padding:10px;">
						<a class="pg_img"   href="javascript:void(0)" onclick="javascript:window.open('http://twitter.com/home?status=<?php echo site_url('projects/'.$project['url_project_title'].'/'.$project['project_id']); ?>','name1','height=250,width=550,top=200,left=300')" ><img src="<?php echo base_url(); ?>images/22.png" alt="" width="32" height="32" border="0" style="float:left;" /></a>
					</td>
					
					
					<td width="1" bgcolor="#B5D7FA"></td>
					
					<td valign="top" style="padding:16px 10px 10px 10px;">					
						<a id="various1" href="#inline1"><img src="<?php echo base_url(); ?>images/4.PNG" alt="" width="66" height="20" border="0" style="float:left;" /></a>							
						<div style="display:none;">
					<div id="inline1" style="width:550px;height:400px;overflow:hidden; background:#fff;">
			
			
			<div style="float:left;">
						
				<!--	embed code-->							
				<?php  $query = $this->db->get_where('project',array('project_id'=>$project['project_id']));
						$rs = $query->row();
						
						$data['site_setting'] = $site_setting; 
						$data['rs'] = $rs;
						$data['offset']=0;
						$data['limit']=8;
		
						$this->load->view('default/common_card',$data);
		?>
			   <!--	embed code-->
			</div>
			
			
						<div style="float:right;margin-top:100px;">						
	
	
	<textarea name="area1"  id="area1" style="padding: 10px 10px 10px 10px;-moz-border-radius: 8px;-webkit-border-radius: 8px;background: #FAFAFA;border: 1px solid lightGrey; height:75px; width:275px;"  readonly="readonly"><div id='widgets'></div><script src='<?php echo site_url('project/widgets_code/s/red/'.$project['project_id']); ?>' type='text/javascript'></script></textarea>
							
							
						</div>
							
		</div>
					</div>
					</td>
				
					
					
					<td width="1" bgcolor="#B5D7FA"></td>
					
					<td valign="top" style="padding:8px 8px 4px 8px;">
						<div class="searchbg2" style="height:25px; width:380px; background-color:#FFFFFF; ">
					
                    
                        
                        <input name="printurl" type="text" style="float:left;width:360px;height:25px;border:none;background:none;" value="<?php echo site_url('projects/'. $project['url_project_title'].'/'.$project['project_id']); ?>" id="printurl"   /><img src="<?php echo base_url(); ?>images/7.png" alt="" width="14" height="14" border="0" style="float:right;margin:5px 0px 0px 3px;" onclick="selectall()" />
						</div>
					</td>
					
					
				</tr>
			</table>
            
            
            
           
			
                
			
			
			
		</div>
		
		
		<div class="clear"></div>

<br/>
<div align="left" style="width:602px; border-bottom:1px solid #EAEAEA;"></div>
<br/>
	
	<div class="inner_content_two" style="background:none; border:none; padding:0px;">
	
			<div style="padding:10px 0px;">
				<h3 style="font-size:14px;">Date : <?php echo date($site_setting['date_format'],strtotime($project['date_added'])); ?></h3>
				<?php echo $project['description']; ?>
			</div>
	
	</div>
	
</div>

<div id="sp_updates" class="divsel" style="background:none; border:none; padding:0px; margin-left:11px; margin-top:23px;">
	
	
	<ul>
	<?php
		if($updates)
		{
			foreach($updates as $up)
			{
	?>
			<li class="common_li" style="background:none; border:none; padding:0px;"> 
				
			
				
				<p style="font-size:12px; font-weight:nornal; font-style:italic;  color:#999999;"> <?php echo date($site_setting['date_format'],strtotime($up['date_added'])); ?></p>
				
					<div style="border-radius:8px 8px 8px 8px;" class="detail_update"><?php 
					
					$up_content = $up['updates'];
					$up_content=str_replace('KSYDOU','"',$up_content);
				$up_content=str_replace('KSYSING',"'",$up_content); 
					
					echo $up_content;
					
					 ?></div>
				
				
				<div class="clear"></div>
				
			</li>
	<?php
			}
		}
		else
		{
			echo '<li class="common_li"> <div align="center" style="text-align:center; font-weight:bold; font-size:14px;">'.PROJECT_NO_UPDATES.'</div></li>';
		}
	?>
	</ul>
	
	
	
	
</div>

<div id="sp_comments" class="divsel" style="background:none; border:none; padding:0px; margin-left:11px; margin-top:23px;">
	<ul>
    
    		
            
             <?php  if($this->session->userdata('user_id')=='') {  ?>
            
					<li>  <div style="font-size:13px; padding:15px;"><?php echo PLEASE; ?> <a href="<?php echo site_url('home/signup'.'/'.base64_encode(current_url())); ?>" style="font-weight:bold;"><?php echo PROJECT_SIGN_UP; ?></a> <?php echo OR_TEXT; ?>  <a href="<?php echo site_url('home/login'.'/'.base64_encode(current_url())); ?>" style="font-weight:bold;"><?php  echo PROJECT_LOGIN;?></a> to Post Comment.</div> </li>
                      
                     
                <?php }
				
				
				
				
				  if($project['active']==1) { if(strtotime($project['end_date'])>=strtotime(date('Y-m-d H:i:s'))) { 
			
            
                  		 if($this->session->userdata('user_id')!='') { ?>
                
                
              				 <li class="common_li">
				
              					  <div id="post-comment">
					
					<div align="left" style="margin-left:0px; clear:both; ">
						<table border="0" cellpadding="3" cellspacing="3" align="left" width="85%" >
						<?php if($error!='') { ?><tr><td align="center" valign="top"  style="color:#FF0000;"><div align="center" class="error"><?php echo $error; ?></div></td></tr><?php } ?>
						<?php
						$attributes = array('name'=>'frm_comment');
						echo form_open_multipart('project/add_comment/'.$project['url_project_title'].'/'.$project['project_id'],$attributes);
						?>
						
					
						
						<!--<tr><td>&nbsp;</td><td align="left" valign="top">
						<?php
						//$p = array('src'=>'image/securimage','style'=>'padding-bottom:0px;');
						//echo img($p, TRUE);
						?>
						</td></tr>
						<tr><td align="center" valign="top">
						<label class="comment_label"><?php //echo $this->home_model->text_echo('Enter Word'); ?> :</label>
						</td>
						<td align="left" valign="top">
						<span ><input type="text" name="imagecode" id="imagecode" class="comment_input" /></span>
						</td></tr>-->
                        
						<tr>
						<td align="left" valign="top">
                        <p style="color:#f00; text-align:center; display:none" id="len_err"><?php echo YOU_CANNOT_ADD_LESS_THAN_FIFTEEN_CHAR_COMMENT; ?><br /></p>
						<textarea name="comments" id="comments" class="comment_textarea" style="width:480px;" ></textarea></td>
						</tr>
						
                      <tr>						
					<td align="left" valign="top" >
					<input type="hidden" name="project_id" id="project_id" value="<?php echo $project['project_id']; ?>"  />
					<input type="submit" class="submit" value="<?php echo PROJECT_POST_COMMENT; ?>" name="submit" id="submit" onclick="return check_comment_len();" />
					</td></tr>
                        
						</form>
						</table>		
					</div>
				</div>
                
                	
                    			<div style="clear:both;"></div>
							</li>
                
                
                <?php } 
                 
			 			} }  
    
    
	
		if($comments)
		{
			foreach($comments as $cmt)
			{
	?>
			<li class="common_li">
				<div class="s_img" style="width:60px;height:60px;">
					<?php if(is_file('upload/thumb/'.$cmt['image'])) {  ?>
					 <a href="<?php echo site_url('member/'.$cmt['user_id']); ?>"><img src="<?php echo base_url(); ?>upload/thumb/<?php echo $cmt['image']; ?>" width="60" height="60" alt="" style=" border:1px solid lightGrey;" /> </a>
					<?php } else { ?>
					 <a href="<?php echo site_url('member/'.$cmt['user_id']); ?>"><img src="<?php echo base_url(); ?>upload/thumb/no_person.png" width="60" height="60" alt="" style=" border:1px solid lightGrey;" /></a>
					<?php } ?>
				</div>
				
				
				<div class="s_comment">
					<?php echo anchor('member/'.$cmt['user_id'],ucfirst($cmt['user_name'])); ?> <?php echo SAYS; ?>: 				
					<span><?php echo ucfirst($cmt['comments']); ?></span>
				</div>		
							
				<span class="sdt" style="font-size:11px; font-style:italic; color:#999999;"><?php echo date($site_setting['date_format'],strtotime($cmt['date_added']))." ".AT." ".date("H:i a",strtotime($cmt['date_added'])); ?></span>
				
				<div class="clear"></div>
			</li>
	<?php
			}
		}
		else
		{
			echo '<li class="common_li"> <div align="center" style="text-align:center; font-weight:bold; font-size:14px;">'.NO_COMMENTS.'</div></li>';
		}
	?>
			
			
	</ul>
</div>


<div id="sp_backers" class="divsel" style="background:none; border:none; padding:0px; margin-left:11px; margin-top:23px;">

	<div class="inner_content_two">
	
			<div style="padding:10px 0px;">
	
				
                <?php 
				
				if($backers)
				{
				
				?>
                <table border="0" cellpadding="0" cellspacing="0" width="100%">    
                    
				<?php
					foreach($backers as $bk)
					{
					
				?>
                
                <tr>
                <td align="left" valign="top" width="80" height="80">
             <?php   
			 
			 if($bk->image!='' && is_file('upload/thumb/'.$bk->image) ) { 
			 	if($bk->trans_anonymous=='3'){
					$bk_image = 'no_man.gif';
					?><img src="<?php echo base_url();?>upload/thumb/<?php echo $bk_image; ?>" height="72" width="72" border="0" style=" border:1px solid lightGrey;" /><?php
				}
				else{
					$bk_image = $bk->image; 
					?><a href="<?php echo site_url('member/'.$bk->user_id); ?>"><img src="<?php echo base_url();?>upload/thumb/<?php echo $bk_image; ?>" height="72" width="72" border="0" style=" border:1px solid lightGrey;" /></a><?php
				}	
			 } else { $bk_image = 'no_man.gif'; 
			 
			 ?><a href="<?php echo site_url('member/'.$bk->user_id); ?>"><img src="<?php echo base_url();?>upload/thumb/<?php echo $bk_image; ?>" height="72" width="72" border="0" style=" border:1px solid lightGrey;" /></a><?php
			  } 
			 
			 ?>
                 
                 
                </td>
                
                <td align="left" valign="top">
               <span style="font-size:14px; font-weight:bold; color:#114A75; padding-top:5px;"> <?php 
			   		if($bk->trans_anonymous=='3'){
						echo ANONYMOUS_BACKER;
					}
					else{
						echo anchor('member/'.$bk->user_id,$bk->user_name.' '.$bk->last_name,'style="color:#114A75;"');
						
					}	
						 ?></span><br/>
                 <span style="color:#999999; font-style:italic; font-size:10px;"> <?php  $temp_time = explode(" ",$bk->transaction_date_time);
				
					echo get_city_name($bk->city); ?>
                    
                 </span><br />
                 <span style="color:#999999; font-style:italic; font-size:10px;"> <?php  $temp_time = explode(" ",$bk->transaction_date_time);
				
					echo get_country_name($bk->country); ?>
                    
                 </span><br />
               <span style="color:#999999; font-style:italic; font-size:10px;"> <?php  $temp_time = explode(" ",$bk->transaction_date_time);
				
					echo date($site_setting['date_format'],strtotime($temp_time[0])); ?>
                    
                 </span>
				
				</td>
                
             <td align="right" valign="middle" style="font-size:18px; color:#7DBF0E; font-weight:bold;">
               <?php  if($bk->trans_anonymous != '2' and $bk->trans_anonymous != '3'){ echo set_currency($bk->amount);  }  ?>
                </td>
                </tr>
				<tr><td colspan="3" height="3"></td></tr>
                <tr><td colspan="3" height="1" style="border-top:1px dotted #999999;">&nbsp;</td></tr>
               
                
                
                	
						
				<?php }	?>
                
                </table>
                
				<?php	} else { ?>
                
                
                <div align="center" style="text-align:center; font-weight:bold; font-size:14px;"><?php echo NO_BACKERS; ?></div>
                
                <?php } ?>
                
                
            </div>
            
     </div>
     
</div>

<div id="sp_gallery" class="divsel" style="background:none; border:none; padding:0px; margin-left:11px; margin-top:23px;">

<style type="text/css">
#preview4{
	position:absolute;
	border:1px solid #ccc;
	background:#333;
	padding:5px;
	display:none;
	color:#fff;
	margin-left:0px;
	}
	</style>
    
<div class="inner_content_two">
<?php if($project_gallery) { $feed=0; ?>

<table border="0" cellpadding="2" cellspacing="2" width="100%">
<tr>
		
	<?php	foreach($project_gallery as $gry) {  if(is_file('upload/thumb/'.$gry->project_image)) {	 ?>




<td align="left" valign="top"><a href="<?php echo base_url();?>upload/thumb/<?php echo $gry->project_image;?>" class="preview4"  ><img src="<?php echo base_url();?>upload/thumb/<?php echo $gry->project_image; ?>" border="0" height="150" width="150" /></a></td>








<?php    		$feed++;
				
				if($feed>2)
				{
					$feed=0;
					echo "</tr><tr>";
				} 
				
			}
				
	} 
	
	?>



</tr>
</table>
<?php } ?>
</div>


</div>

<div id="sp_followers" class="divsel" style="background:none; border:none; padding:0px; margin-left:11px; margin-top:23px;">

	<div class="inner_content_two">
	
			<div style="padding:10px 0px;">
	
				
                <?php 
				 $project_followers_data = project_follower_details($project['project_id']);
				
				if($project_followers_data)
				{
				
				?>
                <table border="0" cellpadding="0" cellspacing="0" width="100%">    
                    
				<?php
					foreach($project_followers_data as $pflw)
					{
					if(is_file('upload/thumb/'.$pflw->image))
						{
							$img = $pflw->image;
						}else{
							$img = NO_MAN;
						}
					
				?>
                
                <tr>
                <td align="left" valign="top" width="80" height="80">
            	 <div style="margin:0; padding:0; float:left;">
					<?php 	
					if(is_file('upload/thumb/'.$pflw->image)){
						?> 
                       <a href="<?php echo site_url('member/'.$pflw->user_id);?>"> <img src="<?php echo base_url().'upload/thumb/'.$img; ?>" alt="" width="50" height="50" /></a><?php
					}elseif($pflw->tw_screen_name !='' && $pflw->tw_id > 0) { ?>
	
	 <a href="<?php echo site_url('member/'.$pflw->user_id);?>"><img src="http://api.twitter.com/1/users/profile_image?screen_name=<?php echo $result['tw_screen_name']; ?>&size=bigger" border="0" width="50" height="50" /></a>
	
	
	<?php } elseif($pf->fb_uid !='' && $pf->fb_uid >0) { ?>
			     <a href="<?php echo site_url('member/'.$pflw->user_id);?>"><img src="http://graph.facebook.com/<?php echo $pflw->fb_uid; ?>/picture?type=large" alt="" width="50" height="50" /></a>
				<?php } else { ?>
               				 <a href="<?php echo site_url('member/'.$pflw->user_id);?>"><img src="<?php echo base_url().'upload/thumb/'.$img; ?>" alt="" width="50" height="50" /></a>
				<?php } ?>
				</div>
                 
                 
                </td>
                
                <td align="left" valign="top">
               <span style="font-size:14px; font-weight:bold; color:#114A75; padding-top:5px;"> <?php 
			   		
						echo anchor('member/'.$pflw->user_id,$pflw->user_name.' '.$pflw->last_name,'style="color:#114A75;"');
						
						 ?></span><br/>
                
               <span style="color:#999999; font-style:italic; font-size:10px;"> <?php  $temp_time = explode(" ",$pflw->project_follow_date);
				
					echo date($site_setting['date_format'],strtotime($temp_time[0])); ?>
                    
                 </span>
				
				</td>
                </tr>
				<tr><td colspan="3" height="3"></td></tr>
                <tr><td colspan="3" height="1" style="border-top:1px dotted #999999;">&nbsp;</td></tr>
               <?php }	?>
                
                </table>
                
				<?php	} else { ?>
                
                
                <div align="center" style="text-align:center; font-weight:bold; font-size:14px;"><?php echo NO_FOLLOWERS; ?></div>
                
                <?php } ?>
                
                
            </div>
            
     </div>
     
</div>
<div style="clear:both;"></div>




<script type="text/javascript">
	this.imagePreview = function(){	
	/* CONFIG */
		
		xOffset = 10;
		yOffset = 30;
		
		// these 2 variable determine popup's distance from the cursor
		// you might want to adjust to get the right result
		
	/* END CONFIG */
	jQuery("a.preview4").hover(function(e){
		this.t = this.title;
		this.title = "";	
		var c = (this.t != "") ? "<br/>" + this.t : "";
		jQuery("body").append("<p id='preview4'><img src='"+ this.href +"' alt='Image preview' height='200' width='300' />"+ c +"</p>");								 
		jQuery("#preview4")
			.css("top",(e.pageY - xOffset) + "px")
			.css("left",(e.pageX + yOffset) + "px")			
			.fadeIn("fast");						
    },
	function(){
		this.title = this.t;	
		jQuery("#preview4").remove();
    });	
	jQuery("a.preview4").mousemove(function(e){
		jQuery("#preview4")
			.css("top",(e.pageY - xOffset) + "px")			
			.css("left",(e.pageX + yOffset) + "px");
			
	});			
};


// starting the script on page load
jQuery(document).ready(function(){
	imagePreview();
});


function check_comment_len(){
	var comment = document.getElementById('comments').value;
	var rep = trim(comment);
//var rep = $("#text").val().replace('  ',' ');

	var len = rep.length;
	if(len<15){
		document.getElementById('len_err').style.display='block';
		return false;
	}
		document.getElementById('len_err').style.display='none';
		return true;

}
</script>		









<div style="clear:both;"></div>


	  

<!--====================left end==============--> 
	</div>   