 <?php if($result){
	foreach($result as $rs)
	{?>
             <div style="padding-bottom:15px;">     
                <?php echo anchor('blog/search/'.$rs->blog_id,$rs->blog_title,'class="news_content_header"');?>
              <div class="clr"></div>
             	
                 <?php $user_detail = get_user_detail($rs->user_id);?>

                        <?php echo anchor('user/member/'.$rs->user_id,$user_detail['user_name'].' '.$user_detail['last_name'],'class="usranc" style="margin-left:10px;"');?>
                      <span style="color:#ff7e15;" class="sep">&nbsp;.&nbsp;</span>
						<span class="blocaton"><?php echo date($site_setting['date_format'],strtotime($rs->date_added));?></span><span class="sep">&nbsp;,&nbsp;</span><a href="<?php echo site_url('blog/search/'.$rs->blog_id)?>" class="blcomment"><img src="<?php echo base_url();?>images/bcomment.png" alt="" style="float:left;" /><?php echo countcomment($rs->blog_id);?> <?php echo COMMENT; ?></a><div class="clr"></div>                 <div style="float:right; margin:0 25px;">
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
                	<?php $offset++;}}
?>
<input type="hidden" id="offset" name="offset" value="<?php echo $offset; ?>"/>