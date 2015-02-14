<script>
	function add_upd(){
		
		document.getElementById('postup').style.display="Block";
	}
	
	function delete_comment(id){
		var r=confirm("<?php echo "Are You Sure To Delete This Comment"; ?>");
			if (r==true)
			  {
			  	x=1;
			
				window.location.href="<?php echo site_url('project/delete_comment'); ?>/"+id+"/<?php echo $offset ;?>";
			  }
			else
			  {
			 	
			  }
	}
	
</script>
<script>
$(document).ready(function(){
$('.post_comment').click(function() {
var create_id=$(this).attr('id').replace('update_cmt','');

var  comment =  $("#comments").val();

var p_id = $("#project_id").val();


if(comment=='') { return false; }

var res = $.ajax({
type: 'POST',
url: '<?php  echo site_url('project/add_comment/'.$one_project['project_id']);?>',
data: {comments:comment,project_id:p_id},
dataType: 'json',
cache: false,
async: false
}).responseText;

var brd_rpl = jQuery.parseJSON(res);

if(brd_rpl.status=='success')
{
	document.getElementById('success').innerHTML="Comment SuccessFully Posted";
}
if(brd_rpl.status=='Unsuccess')
{
	document.getElementById('error').innerHTML="Comment Not Posted";
}
	////
/*var board_html='<li class="comment creator"><img  src="http://s3.amazonaws.com/ksr/avatars/3117762/VGO Logo.small.jpg?1345954191" class="cuserimg" alt="Vgo logo.small"><div class="update_cont"><h3><span class="creator">Creator</span>';





var board_link='<a href="<?php// echo site_url('member/'.get_authenticateUserID());?>" class="author"><?php //echo getUserProfileName() ;?></a>'; 

board_html +='<span class="date"> '+comment_date+' </span> </h3><p class="up">'+comment+'</p>';
						 
				   
board_html +='</div></li>';


$('.comment_listul').append(board_html);*/




});
});

 
</script>
<section>
	<div id="page_we">
        	<div class="project_head"><?php echo anchor('projects/'.$one_project['url_project_title'].'/'.$one_project['project_id'],$one_project['project_title'],'class="project_title"');?>
  <p class="project_own">By&nbsp;<?php echo anchor('member/'.$one_project['user_id'],$user_name.' '.substr($last_name,0,1));?></p>
  <div class="clr"></div>
            <ul class="project_tabs">
            	<li><?php echo anchor('projects/'.$one_project['url_project_title'].'/'.$one_project['project_id'],PROJECT_HOME); ?></li>
                <li><?php echo anchor('project/updates/'.$one_project['project_id'],UPDATES.' | '.$total_updates); ?></li>
             <!--   <li><a href="#">Gallery | 1</a></li>-->
                <li><?php echo anchor('project/donations/'.$one_project['project_id'],BACKERS.' | '.$project_backers); ?></li>
                <li><?php echo anchor('project/comments/'.$one_project['project_id'],COMMENTS.' | '.$total_comments,'id="tabsel"'); ?></li>
            </ul>
        </div>
        <div class="projectdetail_cont">
        <!---------------Left--------------------->	
        <div class="project_left">
		
		<?php if(get_authenticateUserID()!=""){ ?>
		<?php if($one_project['user_id']==get_authenticateUserID() || $one_project['user_id']==get_project_backer_id($one_project['user_id'])){ ?>
	<a href="javascript://" id="showup" onclick="add_upd()">Add Comment</a>
	<?php } } else {?>
	<span> Only backers can post comments.If you have a question, <a data-modal-title="Ask a question about Video Game Orchestra ~Live at Symphony Hall~ Album" class="remote_modal_dialog" href="/projects/vgo/video-game-orchestra-live-at-symphony-hall-album/messages/new?message%5Bto%5D=vgo&amp;mode=FAQ">ask the project creator</a>. </span>
	<?php } ?>
	
	
		<div id="update_comment" class="update_comment">
				<div id="success" style="color:#009966;"></div>
				<div id="error" style="color:#FF0000;"></div>
				<?php if(get_authenticateUserID()!=""){ ?>
				
				<?php if($one_project['user_id']==get_authenticateUserID() || get_authenticateUserID()==get_project_backer_id($one_project['project_id'])){ ?>		<div class="post" id="postup" style="display:none;background:#ECECEC">
				<?php  $attr=array('name'=>'cmtupd','id'=>'cmtupd');
					echo form_open('',$attr);
				?>
				<textarea   style="width:570px; height:150px;" id="comments" name="comments"></textarea>	
				
				
				
				<input type="hidden" name="project_id" id="project_id" value="<?php echo $one_project['project_id']; ?>" />
				
				<input type="button" value="Post"  name="post" class="remindanchor post_comment" id="post_comment" />
				
				
				</form>
				<?php } }else{}  ?>
			</div>
			 		 
			  
			  
			  </div>
			  
			  
		<ul class="comment_listul">
				
				<?php
					if($comments){
					foreach($comments as $upc){
					
					$ud=get_user_detail($upc['user_id']);
					
					
				?>
				
				  <li class="comment <?php if($upc['user_id']==$one_project['project_id']){ echo 'creator';} ?>">
				  
				  
									  <?php if($ud['image']!='' && is_file('upload/thumb/'.$ud['image']) ) { ?>
				
									 <a href="<?php echo site_url('member/'.$ud['user_id']); ?>"><img src="<?php echo base_url();?>upload/thumb/<?php echo $ud['image']; ?>"  class="cuserimg" /></a>
									
									<?php }elseif($ud['tw_screen_name']!='' && $ud['tw_id']>0) { ?>
										
										<img src="http://api.twitter.com/1/users/profile_image?screen_name=<?php echo $ud['tw_screen_name']; ?>&size=bigger" class="cuserimg"  />
										
										
										<?php }
									elseif($ud['fb_uid']!='' && $ud['fb_uid']>0) { ?>
									 <a href="<?php echo site_url('member/'.$ud['user_id']); ?>">
									<img src="http://graph.facebook.com/<?php echo $ud['fb_uid']; ?>/picture?type=large" class="cuserimg" /></a>
									
									<?php } else {
									 ?> 
									
									<a href="<?php echo site_url('member/'.$ud['user_id']); ?>"><img src="<?php echo base_url();?>upload/thumb/no_man.gif" class="cuserimg" /></a>
									
									<?php }  ?>			  
								  
				  
				 
					 
					  <div class="update_cont">
						<h3> <?php if($upc['user_id']==$one_project['project_id']){?> <span class="creator">Creator</span> <?php } ?><?php echo anchor('member/'.$ud['user_id'],$ud['user_name']." ".$ud['last_name'],'class="author"') ?> <span class="date"> about <?php echo getDuration($upc['date_added']) ?></span> </h3>
						<p class="up"><?php echo $upc['comments']; ?></p>
						  <!--<span style="display:none;" class="loading icon-loading-small"></span>--> </div><div class="clr"></div>
						  
						  <div class="control">
						  <?php if(get_authenticateUserID()!="" && $one_project['user_id']==get_authenticateUserID()){ ?>
						  	<a href="javascript://" onclick="return delete_comment(<?php echo $upc['comment_id'] ?>)" class="ca"><?php echo DELETE; ?></a>
						  	<?php // echo anchor('project/delete_comment/'.$upc['comment_id'].'/'.$offset,"Delete",'class="ca"'); ?>
								<?php   if($upc['status']==0) { 
							
							echo anchor('project/approve_comment/'.$upc['comment_id'].'/'.$offset,APPROVED,'class="ca"');
							
							} if($upc['status']==1) { 
							 
							 echo anchor('project/declined_comment/'.$upc['comment_id'].'/'.$offset,DECLINED,'class="ca"');
							 
							 
							  }  ?>
							  
							<?php } ?>
						  </div><div class="clr"></div>
				   
				  </li>
				  <?php }?>
				  
		<?php 		 }	else{ echo "<li>NO COMMENT AVAILABLE</li>";}
				  ?>
				  
				
				  
			 
				  
				
				  
				  </ul>
				  <?php echo $page_link; ?>
		
		</div>
        <!---------------Left--------------------->	