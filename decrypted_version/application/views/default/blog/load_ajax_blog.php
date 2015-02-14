<?php if($result){
				$cnt=1;
				foreach($result as $rs){$cnt++;
				?>
                <div class="main_blog_left" id="blog">
				<h2 class="chnews1"><?php echo $rs->blog_category_name;?></h2>
						<?php echo anchor('blog/'.$rs->blog_id,$rs->blog_title,'class="news_content_header"');?>
                        <div class="clr"></div>
                        <?php $user_detail = get_user_detail($rs->user_id);?>
                        <?php echo anchor('user/member/'.$rs->user_id,$user_detail['user_name'].' '.$user_detail['last_name'],'class="usranc" style="margin-left:10px;"');?>
                      <span style="color:#ff7e15;" class="sep">&nbsp;.&nbsp;</span>
						<span class="blocaton"><?php echo date($site_setting['date_format'],strtotime($rs->date_added));?></span><span class="sep">&nbsp;,&nbsp;</span><a href="#" class="blcomment"><img src="images/bcomment.png" alt="" style="float:left;" /><?php echo countcomment($rs->blog_id);?> <?php echo COMMENT; ?></a><div class="clr"></div>
					<div class="blgdesc">			
						
						<p class="bdescription"><?php echo $rs->blog_discription;?></p>
                     <?php $offset++;	
}}?>   
     <input type="hidden" id="offset" name="offset" value="<?php echo $offset; ?>"/>