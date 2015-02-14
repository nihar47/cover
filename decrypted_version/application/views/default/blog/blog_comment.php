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
        <!--<img src="<?php echo base_url();?>images/blog_hr.png" class="bloghrline" alt="" />-->
        <h2><?php echo EST; ?>. 2009</h2>
        <div class="clr"></div>
      </div>
      <div class="clr"></div>
      <div class="get_soc_cont" >
        <div class="main_blog_left">
          <h2 class="chnews1"><?php echo blog_getcategory_name($one_blog->blog_category);?></h2>
          <?php echo anchor('blog/search/'.$one_blog->blog_id,$one_blog->blog_title,'class="news_content_header"');?>
          <div class="clr"></div>
          <?php $user_detail = get_user_detail($one_blog->user_id);?>
          <?php echo anchor('user/member/'.$one_blog->user_id,$user_detail['user_name'].' '.$user_detail['last_name'],'class="usranc" style="margin-left:10px;"');?> <span style="color:#ff7e15;" class="sep">&nbsp;.&nbsp;</span> <span class="blocaton"><?php echo date($site_setting['date_format'],strtotime($one_blog->date_added));?></span><span class="sep">&nbsp;,&nbsp;</span><a href="<?php echo site_url('blog/search/'.$one_blog->blog_id)?>" class="blcomment"><img src="<?php echo base_url();?>images/bcomment.png" alt="" style="float:left;" /><?php echo countcomment($one_blog->blog_id);?> <?php echo COMMENT; ?></a>
          <div class="clr"></div>
          <div class="blgdesc">
            <p class="bdescription"><?php echo $one_blog->blog_discription;?></p>
          </div>
          <div class="blogcomment">
            <label class="cmtp"><?php echo COMMENTS; ?></label>
            <ul class="blog_comment_listul">
              <?php
					if($blog_comment){
					foreach($blog_comment as $cmt){
					$cnt=1;
					$ud=get_user_detail($cmt->user_id);
				?>
              <li class="">
                <?php if($ud['image']!='' && is_file('upload/thumb/'.$ud['image']) ) { ?>
                <a href="<?php echo site_url('member/'.$ud['user_id']); ?>"><img src="<?php echo base_url();?>upload/thumb/<?php echo $ud['image']; ?>"  class="bcuimg" /></a>
                <?php }elseif($ud['tw_screen_name']!='' && $ud['tw_id']>0) { ?>
                <img src="http://api.twitter.com/1/users/profile_image?screen_name=<?php echo $ud['tw_screen_name']; ?>&size=bigger" class="bcuimg"  />
                <?php }
									elseif($ud['fb_uid']!='' && $ud['fb_uid']>0) { ?>
                <a href="<?php echo site_url('member/'.$ud['user_id']); ?>"> <img src="http://graph.facebook.com/<?php echo $ud['fb_uid']; ?>/picture?type=large" class="bcuimg" /></a>
                <?php } else {
									 ?>
                <a href="<?php echo site_url('member/'.$ud['user_id']); ?>"><img src="<?php echo base_url();?>upload/thumb/no_man.gif" class="bcuimg" /></a>
                <?php }  ?>
                <div class="blog_update_cont"> <?php echo anchor('member/'.$ud['user_id'],$ud['user_name']." ".$ud['last_name'],'class="author"') ?> <span class="blogdate"> about <?php echo getDuration($cmt->date_added) ?></span>
                  <p class="blogup"><?php echo $cmt->blog_comment; ?></p>
                  <!--<span style="display:none;" class="loading icon-loading-small"></span>--> </div>
              </li>
              <?php $offset++;}?>
              <?php }	else{?>
              <h3 style="margin:10px 0 0 0; text-align:center; width:100%;"> <?php echo NO_COMMENT_AVAILABLE; ?></h3>
              <?php }
				 ?>
            </ul>
            <script type="text/javascript">      
                 function chkfield()
				{
	 
				var con = 1;
				if(document.getElementById('comments').value == '')
				{
					document.getElementById('error').style.display='block';
					con = 0;
				}
				
				if(con == 0)
				{
				 return false;
				}
				return true;
				}
 			</script>
            <?php if(get_authenticateUserID() > 0 && $one_blog->no_one_comment == '1'){ ?>
            <?php  $attr=array('name'=>'cmtupd','id'=>'cmtupd','onSubmit'=>'return chkfield();','autocomplete'=>'off');
					echo form_open('blog/blog_comment',$attr);
				?>
            <div id="error" class="error" style=" display:none;">
              <ul>
                <li><?php echo COMMENT_REQUIRED; ?></li>
              </ul>
            </div>
            <textarea  id="comments" name="comments" class="cptextarea" ></textarea>
            <input type="hidden" name="blog_id" id="blog_id" value="<?php echo $one_blog->blog_id; ?>" />
            <input type="submit" value="<?php echo POST_COMMENT; ?>"  name="post" class="stepbtn" id="post_comment" style="margin-left:15px;" />
            <p style="display:block; float:left;width:428px;margin:17px 0 0 10px;">Please limit your comment to the issues at hand. Comments promoting a project will be removed. Thanks!</p>
            </form>
            <?php }else if(get_authenticateUserID() > 0 && $one_blog->no_one_comment == '0'){?>
            <?php echo NO_ONE_ALLOW_TO_COMMENT; ?>
            <?php }
				else
				{?>
            <a href="<?php echo site_url('home/login'.'/'.base64_encode(current_url())); ?>"><?php echo PLEASE_LOGIN_FOR_POST_COMMENT ?></a>
            <?php } ?>
          </div>
        </div>
        <div class="get_soc_cont_right">
          <h1><?php echo BROWSE_CATEGORIES; ?></h1>
          <ul class="blogcatul" style="border:none;">
            <?php 
					if($category)
					{
						foreach($category as $cat)
						{?>
            <li>
              <?php if($cat_id == $cat->blog_category_id){?>
              <?php echo anchor('blog/category/'.$cat->blog_category_id,$cat->blog_category_name,'id="blsel"');?>
              <?php }else{?>
              <?php echo anchor('blog/category/'.$cat->blog_category_id,$cat->blog_category_name);?> </li>
            <?php }}
					}
					
					?>
          </ul>
          <h1 ><?php echo RECENT_POSTS; ?></h1>
          <?php if($recent_post){ ?>
          <ul class="blogcatul" style="border:none;">
            <?	foreach($recent_post as $rp){?>
            <li> <?php echo anchor('blog/search/'.$rp->blog_id,$rp->blog_title);?> </li>
            <?php } ?>
          </ul>
          <?php }?>
        </div>
        <div class="clr"></div>
        <div class="clr"></div>
      </div>
    </div>
  </div>
  <div align="center" style=" margin:0px auto; " id="last_msg_loader"></div>
  <div class="clear"></div>
  <input type="hidden" id="offset" name="offset" value="<?php echo $offset; ?>"/>
</section>

<!--******************Section********************--> 
