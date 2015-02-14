<!--******************Section********************-->
<section>
	<div class="news_swction">
		<div id="page_we">
		<div class="news_top">
			 <?php if($site_setting['blog_logo'] !='')
			{?>
		      <h1> Indie Film Funding Blog</h1>
        
        <!--		<img src="<?php echo base_url(); ?>upload/orig/<?php echo $site_setting['blog_logo'];?>" alt="" class="blog_img" />-->
			<?php }
			else{
			?>
			<img src="<?php echo base_url();?>images/blog_logo.png" alt="" class="blog_img" />
           <?php }?> 
	<!--		<img src="<?php echo base_url();?>images/blog_hr.png" class="bloghrline" alt="" />-->
	        <h2><?php echo EST; ?>. 2009</h2>
			<div class="clr"></div>
		</div><div class="clr"></div>
			
			<div class="get_soc_cont" >
           	 <div class="main_blog_left"  id="blog">
             <h2 class="chnews1"><?php echo blog_getcategory_name($cat_id);?></h2>
             	<?php if($result){
					foreach($result as $rs)
					{?>
                    	
                   <div style="padding-bottom:10px; border-bottom:1px solid #ccc; margin-bottom:10px;">     
                <?php echo anchor('blog/search/'.$rs->blog_id,$rs->blog_title,'class="news_content_header"');?>
              <div class="clr"></div>
             	
                 <?php $user_detail = get_user_detail($rs->user_id);?>

                        <?php echo anchor('user/member/'.$rs->user_id,$user_detail['user_name'].' '.$user_detail['last_name'],'class="usranc" style="margin-left:10px;"');?>
                      <span style="color:#ff7e15;" class="sep">&nbsp;.&nbsp;</span>
						<span class="blocaton"><?php echo date($site_setting['date_format'],strtotime($rs->date_added));?></span><span class="sep">&nbsp;,&nbsp;</span><a href="<?php echo site_url('blog/search/'.$rs->blog_id)?>" class="blcomment"><img src="<?php echo base_url();?>images/bcomment.png" alt="" style="float:left;" /><?php echo countcomment($rs->blog_id);?> <?php echo COMMENT; ?></a><div class="clr"></div>                 <div style="float:left; margin:10px 10px;">
						<?php if($user_detail['image']!='' && is_file('upload/thumb/'.$user_detail['image']) ) { ?>
							 <a href="<?php echo site_url('member/'.$user_detail['user_id']); ?>"><img src="<?php echo base_url();?>upload/thumb/<?php echo $user_detail['image']; ?>"  class="cuserimg" /></a>
					<?php }elseif($user_detail['tw_screen_name']!='' && $user_detail['tw_id']>0) { ?>
				<img src="http://api.twitter.com/1/users/profile_image?screen_name=<?php echo $ud['tw_screen_name']; ?>&size=bigger" class="bcuimg"  />
							<?php }
									elseif($user_detail['fb_uid']!='' && $user_detail['fb_uid']>0) { ?>
									 <a href="<?php echo site_url('member/'.$user_detail['user_id']); ?>">
									<img src="http://graph.facebook.com/<?php echo $user_detail['fb_uid']; ?>/picture?type=large" class="bcuimg" /></a>
									<?php } else {
									 ?> 
									<a href="<?php echo site_url('member/'.$user_detail['user_id']); ?>"><img src="<?php echo base_url();?>upload/thumb/no_man.gif" class="bcuimg" /></a>
		<?php }  ?>			  </div>
						<div class="clr"></div>
                        </div>
                	<?php $offset++;}
				}
				else
				{
					echo NO_BLOG_FOUND_IN_THIS_CATEGORY;
				}?>
             		
           	    </div>
				
                
					<div class="get_soc_cont_right">
					<h1 style="border-top:none;"><?php echo BROWSE_CATEGORIES; ?></h1>
                    <ul class="blogcatul" style="border:none">
					<?php 
					if($category)
					{
						foreach($category as $cat)
						{?>
						<li>
                        	<?php if($cat_id == $cat->blog_category_id){?>
                            <?php echo anchor('blog/category/'.$cat->blog_category_id,$cat->blog_category_name,'id="blsel"');?>
							<?php }else{?>
							<?php echo anchor('blog/category/'.$cat->blog_category_id,$cat->blog_category_name);?>
                        </li>
						<?php }}
					}
					
					?>

				</ul>				
					
					<h1 >Recent posts</h1>
					
					<?php if($recent_post){ ?>
					  <ul class="blogcatul" style="border:none">
					 <?php foreach($recent_post as $rp){ ?>
                   <li> <?php echo anchor('blog/search/'.$rp->blog_id,$rp->blog_title,'class="anc1"');?></li>
                         <?php } ?>
				</ul> <?php	}?>
                    
					
					
					
				</div><div class="clr"></div>
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
	 
	 
			$.post("<?php echo site_url('blog/load_ajax_blog_category/'.$cat_id.'/'.$limit);?>/"+offset,	
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
