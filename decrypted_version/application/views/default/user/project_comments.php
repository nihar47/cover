<script>
function add_upd(){
	document.getElementById('postup').style.display="Block";
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
	document.getElementById('success').innerHTML="Your Comment Posted SuccessFully";
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

 /*$(function() {
  $('#update_comment input[type="button"]').click(function(e) {
 
  $(".error").hide();
  var res =  $.ajax({
      type: 'POST',
      url:'<?php // echo site_url('project/add_comment');?>',
      data: $(this).closest('#update_comment').find('input,textarea,select').serializeArray(),
      dataType: 'json'
    }).responseText;
	alert(res);
	var brd_rpl = jQuery.parseJSON(res);

		if(brd_rpl.status=='success')
		{
			document.getElementById('success').innerHTML="Comment SuccessFully Posted";
		}
	
  });

});
*/
</script>
<section>
	<div id="page_we">
        	<div class="project_head"><?php echo anchor('projects/'.$one_project['url_project_title'].'/'.$one_project['project_id'],$one_project['project_title'],'class="project_title"');?>
  <p class="project_own">By&nbsp;<?php echo anchor('user/full_bio_data/'.$one_project['user_id'].'/'.$one_project['project_id'],$user_name.' '.substr($last_name,0,1),'id="profile_detail_popup"');?></p>
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
	
		
		
		
	<?php } } else {?>
	
	<?php } ?>
	
	
		<div id="update_comment" class="update_comment">
				<div id="success" style="color:#009966;"></div>
				<div id="error" style="color:#FF0000;"></div>
				<?php if(get_authenticateUserID()!=""){ ?>
				
				<?php if($one_project['user_id']==get_authenticateUserID() || get_authenticateUserID()==get_project_backer_id($one_project['project_id'])){ ?>
				<a href="javascript://" id="showup" onclick="add_upd()">Add Comments</a>
				<div class="post" id="postup" style="display:none;background:#ECECEC">
                                      
				<?php  $attr=array('name'=>'cmtupd','id'=>'cmtupd');
					echo form_open('',$attr);
				?>
				<textarea   style="width:570px; height:150px;" class="box2" id="comments" name="comments"></textarea>	
				
				
				
				<input type="hidden" name="project_id" id="project_id" value="<?php echo $one_project['project_id']; ?>" />
				
				<input type="button" value="Post Comment"  name="post" class="cenbtn1 post_comment" id="post_comment" />
				
				
				</form>
				</div>
				<?php } }else{ ?>
					<span> Only backers can post comments.If you have a question,<?php if(get_authenticateUserID()!=""){ echo anchor('message/send_message_project_profile/'.$one_project['user_id'],'ask the project creator','id="ask_p_c1"'); }else{ echo anchor('home/login','ask the project creator'); }?>. </span>
				<?php }  ?>
				
			 		 
			  
			  
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
						  	<?php echo anchor('project/delete_comment/'.$upc['comment_id'].'/'.$offset,"Delete",'class="ca"'); ?>
								<?php   if($upc['status']==0) { 
							
							echo anchor('project/approve_comment/'.$upc['comment_id'].'/'.$offset,APPROVED,'class="ca"');
							
							} if($upc['status']==1) { 
							 
							 echo anchor('project/declined_comment/'.$upc['comment_id'].'/'.$offset,DECLINED,'class="ca"');
							 
							 
							  }  ?>
							  
							<?php } ?>
						  </div><div class="clr"></div>
				   
				  </li>
				  <?php }?>
				  <li><?php echo $page_link; ?></li>
		<?php 		 }	else{ echo "NO COMMENT AVAILABLE";}
				  ?>
				  
				
				  
			 
				  
				
				  
				  </ul>
		
		</div>
        <!---------------Left--------------------->	