<!--******************Section********************-->
<section>
	<div class="news_swction">
		<div id="page_we">
		<div class="news_top">
        <?php if($site_setting['blog_logo'] !='')
		{?>
        <h1> Indie Film Funding Blog</h1>	<!--<img src="<?php echo base_url(); ?>upload/orig/<?php echo $site_setting['blog_logo'];?>" alt="" class="blog_img" />-->
		<?php }
		else{
		?>
       	<img src="<?php echo base_url();?>images/blog_logo.png" alt="" class="blog_img" />
           <?php }?> 
			<!--<img src="<?php echo base_url();?>images/blog_hr.png" class="bloghrline" alt="" />-->
        <h2><?php echo EST; ?>. 2009</h2>
			<div class="clr"></div>
		</div><div class="clr"></div>
			
			<div class="get_soc_cont" >
           	 <div class="main_blog_left">
		        <?php if($result){
				$cnt=1;
				foreach($result as $rs){$cnt++;
				?>
                <div class="main_blog_left" id="blog">
				<h2 class="chnews1"><?php echo $rs->blog_category_name;?></h2>
						<?php echo anchor('blog/search/'.$rs->blog_id,$rs->blog_title,'class="news_content_header"');?>
                        <div class="clr"></div>
                        <?php $user_detail = get_user_detail($rs->user_id);?>
                        <?php echo anchor('user/member/'.$rs->user_id,$user_detail['user_name'].' '.$user_detail['last_name'],'class="usranc" style="margin-left:10px;"');?>
                      <span style="color:#ff7e15;" class="sep">&nbsp;.&nbsp;</span>
						<span class="blocaton"><?php echo date($site_setting['date_format'],strtotime($rs->date_added));?></span><span class="sep">&nbsp;,&nbsp;</span><a href="<?php echo site_url('blog/search/'.$rs->blog_id)?>" class="blcomment"><img src="<?php echo base_url();?>images/bcomment.png" alt="" style="float:left;" /><?php echo countcomment($rs->blog_id);?> <?php echo COMMENT; ?></a><div class="clr"></div>
					<div class="blgdesc">			
						<?php if($cnt <=4){?>
						<p class="bdescription"><?php echo $rs->blog_discription;?></p>
                        <?php }?>
						
					</div>
				</div>
				<?php $offset++;}}?>
                </div>
				
                <div class="main_blog_right">
				
                <div class="rtlbgdesign">
					<div class="poleft">
					<h2 class="bcat"><?php echo BROWSE_BLOG_CATEGORIES; ?></h2>
					<ul class="blogcatul">
                    <?php 
					if($category)
					{
						foreach($category as $cat)
						{?>
						<li><?php echo anchor('blog/category/'.$cat->blog_category_id,$cat->blog_category_name);?></li>
						<?php }
					}
					
					?>
					</ul>
				</div>
                
				<?php if($project_of_the_day){?>
					<!--<div class="poright">
					<h2 class="bcat" style="color:#333333;"><?php echo PROJECT_OF_THE_DAY;?></h2>
					<?php
                        if($project_of_the_day->video_image !=""){ 
                   echo anchor('projects/'.$project_of_the_day->url_project_title.'/'.$project_of_the_day->project_id,'<img class="poimg" src="'.$project_of_the_day->video_image.'" alt="" title="'.ucfirst($project_of_the_day->project_title).'" />'); 		  
              }
                     else { 
                    if(is_file("upload/orig/".$project_of_the_day->image)){ 
              
               echo anchor('projects/'.$project_of_the_day->url_project_title.'/'.$project_of_the_day->project_id,'<img class="poimg" src="'.base_url().'upload/orig/'.$project_of_the_day->image.'" alt=""  title="'.ucfirst($project_of_the_day->project_title).'" />'); 		  
              
             
              } else{ 
                    echo anchor('projects/'.$project_of_the_day->url_project_title.'/'.$project_of_the_day->project_id,'<img class="poimg" src="'.base_url().'images/no_img.jpg" title="'.ucfirst($project_of_the_day->project_title).'" />');
                    }
             
             
        }	  ?>
                    <div class="po_right_cont">
						<p class="popara">   <?php echo substr(ucfirst($project_of_the_day->project_title),0,20);?></p>
						<p class="polocation"><?php echo get_state_name($project_of_the_day->project_state);?>, <?php echo get_country_name($project_of_the_day->project_country);?></p>
					</div>
				</div>-->
				<?php }?>
                				
                
				</div>
                
				
				
				<div class="rtlbgdesign" style="margin-top:20px;">
					<h2 class="bbph"><?php echo FASCINATING_POSTS_FROM_PROJECTS_NEW_AND_OLD; ?></h2>
					<ul class="bpul">
						<?php if($latest_updates){
						$cnt =0;
						foreach($latest_updates as $rs){$cnt++?>
                        <li>
                           <?php
							if($rs->video_image !=""){ 
					   echo anchor('projects/'.$rs->url_project_title.'/'.$rs->project_id,'<img class="bpimg" src="'.$rs->video_image.'" alt="" title="'.ucfirst($rs->project_title).'" />'); 		  
				  }
						 else { 
						if(is_file("upload/orig/".$rs->image)){ 
				  
				   echo anchor('projects/'.$rs->url_project_title.'/'.$rs->project_id,'<img class="bpimg" src="'.base_url().'upload/orig/'.$rs->image.'" alt=""  title="'.ucfirst($rs->project_title).'" />'); 		  
				  
				 
				  } else{ 
						echo anchor('projects/'.$rs->url_project_title.'/'.$rs->project_id,'<img class="bpimg" src="'.base_url().'images/no_img.jpg" title="'.ucfirst($rs->project_title).'" />');
						}
				 
				 
			}	  ?>
							<div class="bprtl">
								<h1 class="bprtlh1"><?php $str_name = substr(ucfirst($rs->project_title),0,20);?></h1>
								<p class="bprtlp"><?php echo UPDATE_TITLE;?> <?php echo $cnt?>: <?php echo $rs->update_title;?></p><div class="clr"></div>
								<p class="bprtlp"><?php echo UPDATE;?> #<?php echo $cnt?>:</p><div class="clr"></div><p> <?php echo substr($rs->updates,0,150);?></p><div class="clr"></div>
							</div>
						</li>
						<?php }
						}?>
          			</ul>
                    <?php echo anchor('discover/activity','See more project updates','class="semoreupd"')?>
				</div>
				
				<a href="<?php echo base_url();?>blogfeed.php" class="brss" target="_blank"><?php echo SUBSCRIBE; ?></a>
				
				</div>
                <div class="clr"></div>
			</div>
			
		</div>
	</div>
    <div align="center" style=" margin:0px auto; " id="last_msg_loader"></div>
     <div class="clear"></div>
     <input type="hidden" id="offset" name="offset" value="<?php echo $offset; ?>"/>
</section>
<script type="text/javascript">
var gmts=0;

jQuery(document).ready(function(){ 
function last_msg_funtion(offset) 
{   
	if(offset>0)
	{
	gmts=1;
	 
	 
			$.post("<?php echo site_url('blog/load_ajax_blog/'.$limit);?>/"+offset,	
					function(data)
					{
						if (data != "") 
						{
							if(gmts==1) 
							{ 
								$("#blog").append(data);
	
								gmts=0;
							}
						}
					}
			);
	}	
	$('div#last_msg_loader').empty();
}; 

$(window).scroll(function(){
	
//if ($(window).scrollTop() == $(document).height() - $(window).height()){
if($(window).scrollTop() == $(document).height() - $(window).height()){		

 				$('#last_msg_loader').html('<img src="<?php echo base_url();?>images/indicator.gif">');	
				
 					var offset=parseInt($("#offset").val());					  
					if(offset>0) {
					//$("#days").remove();
					//setTimeout(function(){last_msg_funtion(offset); }, 1500);				
					last_msg_funtion(offset);
					$("#offset").remove();
					}					


}
	}); 
});	


</script>
<!--******************Section********************-->
