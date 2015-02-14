<!--<script type="text/javascript" src="<?php //echo base_url() ?>tiny_mce/tiny_mce.js"></script>

<script type="text/javascript">

	tinyMCE.init({

		mode : "textarea",

		theme : "simple"

	});

</script>-->

<script>

/*function add_upd(){

	document.getElementById('postup').style.display="block";

} */

function post_cmt(id){

		var create_id=id;



var  update_c_text =  $("#upcmttxt"+create_id).val();



var p_id = $("#project_id"+create_id).val();



if(update_c_text=='') { return false; }



var res = $.ajax({

type: 'POST',

url: '<?php echo site_url('project/add_update_comment');?>',

data: {update_id:create_id,update_comment_text:update_c_text,project_id:p_id},

dataType: 'json',

cache: false,

async: false

}).responseText;



var brd_rpl = jQuery.parseJSON(res);



if(brd_rpl.status=='success')

{

/////

var board_html='<li class="comment creator"><img  src="<?php echo base_url() ?>upload/thumb/'+brd_rpl.user_image+'" class="cuserimg" alt=""><div class="update_cont"><h3><span class="creator">Creator</span>';











var board_link='<a href="<?php echo site_url('member/'.get_authenticateUserID());?>" class="author"><?php echo getUserProfileName() ;?></a>'; 



board_html +='<span class="date"> '+brd_rpl.update_comment_date+' </span> </h3><p class="up">'+update_c_text+'</p>';

						 

				   

board_html +='</div></li>';





$('#comment_listul'+create_id).append(board_html);

$('#success'+create_id).text("Comment Posted");



}

}



function get_more_comment(upid){



	offset=document.getElementById('upcoffset'+upid).value;

	//	alert(offset);

	

	var res = $.ajax({

type: 'POST',

url: '<?php echo site_url('project/ajax_update_comment');?>/'+upid+'/'+offset,

dataType: 'json',

cache: false,

async: false

}).responseText;

		

var brd_rpl = jQuery.parseJSON(res);



if(brd_rpl.status=='success')

{

	$('#comment_listul'+upid).html(brd_rpl.str);

	document.getElementById('upcoffset'+upid).value=brd_rpl.offset;

}
}

</script>

<section>
<div id="page_we">
<div class="project_head"><?php echo anchor('projects/'.$one_project['url_project_title'].'/'.$one_project['project_id'],$one_project['project_title'],'class="project_title"');?>
  <p class="project_own">By&nbsp;<?php echo anchor('user/full_bio_data/'.$one_project['user_id'].'/'.$one_project['project_id'],$user_name.' '.substr($last_name,0,1),'id="profile_detail_popup"');?></p>
  <div class="clr"></div>
  <ul class="project_tabs">
    <li><?php echo anchor('projects/'.$one_project['url_project_title'].'/'.$one_project['project_id'],PROJECT_HOME); ?></li>
    <li><?php echo anchor('project/updates/'.$one_project['project_id'],UPDATES.' | '.$total_updates,'id="tabsel"'); ?></li>
    
    <!--<li><a href="#">Gallery | 1</a></li>-->
    
    <li><?php echo anchor('project/donations/'.$one_project['project_id'],BACKERS.' | '.$project_backers); ?></li>
    <li><?php echo anchor('project/comments/'.$one_project['project_id'],COMMENTS.' | '.$total_comments); ?></li>
  </ul>
</div>
<div class="projectdetail_cont">

<!---------------Left---------------------> 

<script>

function check_upd(){

	//alert(document.getElementById('update_title').value);

	var str="";

	if(document.getElementById('update_title').value=='')

	{

		str='<?php echo "<li>".REQUIRE_UPDATE_TITLE."</li>"; ?>';

		

	}

	if(document.getElementById('update').value=='')

	{

		str =str +'<?php echo "<li>".REQUIRE_UPDATE."</li>"; ?>';

		

	}

	if(str!=""){

		

		document.getElementById('err').innerHTML=str;

		$('.error').fadeIn();

		return false;

	}

	return true;

	

}

</script>
<div class="project_left">
  <?php if(get_authenticateUserID('update_title')!=""){ ?>
  <?php if($one_project['user_id']==get_authenticateUserID()){ ?>
  <div class="error" style="display:none;">
    <ul id="err">
    </ul>
  </div>
  <div class="post" id="postup" style="display:block;background:""">
    <?php 

				$attr=array('name'=>'addupadte','id'=>'addupadte','onsubmit'=>'return check_upd()');

			echo form_open('project/add_update/'.$project_id,$attr) ?>
    <label class="labe11"><?php echo UPDATE_TITLE; ?></label>
    <input type="text" class="stext2" name="update_title" id="update_title" style="margin-left:10px;"/>
    <div class="clr"></div>
    <label class="labe11"><?php echo UPDATE_DESCRIPTION; ?></label>
    <div class="clr"></div>
    <div style=" padding:2px;"> 
      
      <!-- jQuery and jQuery UI --> 
      
      <script type="text/javascript" src="<?php echo base_url(); ?>tiny_mce/jscripts/tiny_mce/tiny_mce.js"></script> 
      <script type="text/javascript">

					tinyMCE.init({

						// General options

						 mode : "exact",

						elements : "update",

						theme : "advanced",

						plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",	

						

				

						// Theme options

							theme_advanced_buttons1 : "styleselect,formatselect,fontselect,fontsizeselect,|,forecolor,backcolor,styleprops,|,emotions,iespell,media,",

						theme_advanced_buttons2 : "bold,italic,underline,|,bullist,numlist,|,cut,copy,paste,pastetext,pasteword,|,search,replace,|,link,unlink,anchor,|,code,image",

						theme_advanced_buttons3 : "",

						theme_advanced_buttons4 : "",

						theme_advanced_toolbar_location : "top",

						theme_advanced_toolbar_align : "left",

						theme_advanced_statusbar_location : "bottom",

						theme_advanced_resizing : false,

				

						

				

						// Style formats

						style_formats : [

							{title : 'Bold text', inline : 'b'},

							{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},

							{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},

							{title : 'Example 1', inline : 'span', classes : 'example1'},

							{title : 'Example 2', inline : 'span', classes : 'example2'},

							{title : 'Table styles'},

							{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}

						],

						

						height : '400',

						width : '585',

				

						

					});

</script>
      <textarea id="update" name="update" cols="50" rows="4">

                                               

                                            </textarea>
    </div>
    <input type="hidden"  value="<?php echo $project_id; ?>" name="project_id" id="project_id" />
    <input type="submit" class="stepbtn" value="<?php echo POST_UPDATE; ?>" />
    </form>
  </div>
  <?php } } else {?>
  <span> <?php echo ONLY_BACKERS_CAN_POST_COMMENTSIF_YOU_HAVE_A_QUESTION; ?>,
  <?php if(get_authenticateUserID()!=""){ echo anchor('message/send_message_project_profile/'.$one_project['user_id'].'/'.$one_project['project_id'],ASK_THE_PROJECT_CREATOR,'id="ask_p_c1"'); }else{ echo anchor('home/login',ASK_THE_PROJECT_CREATOR); }?>
  </span>
  <?php } ?>
  <?php

			if($updates){

				$cnt=1;

				foreach($updates as $up)

				{	

					 $upcoffset=0;

					 $update_cmt=$this->project_model->get_update_comment($up['update_id'],$upcoffset); 

					

					$total_upc=$this->project_model->get_update_comment_count($up['update_id']);

		 ?>
  <div class="post" id="updli<?php echo $up['update_id'] ?>">
    <div class="blogentry"> <a href="#" class="utitle"><?php echo $up['update_title']; ?></a>
      <div class="statline">
        <div class="leftside"> <span class="update-number"> <?php echo UPDATE ?> #<?php echo $cnt; ?> </span> <span class="divider">-</span><?php echo date('M , d Y',strtotime($up['date_added'])) ?><span class="divider">-</span> <a class="comments" href="javascript://"><?php echo $total_upc; ?> <?php echo COMMENTS; ?></a> 
          
          <!--  

				  <iframe scrolling="no" frameborder="0" style="width:75px;height:22px;background:none; float:right;" id="facebook-like-inner" src="http://www.facebook.com/plugins/like.php?href=<?php echo base_url(); ?>projects/<?php // echo $one_project['url_project_title'].'/'.$one_project['project_id']; ?>&amp;layout=button_count&amp;show-faces=false&amp;width=490&amp;action=like&amp;font=arial&amp;colorscheme=light" style="margin-top:3px;">

				  </iframe>--> 
          
        </div>
      </div>
      <div class="clear"></div>
      <div class="body">
        <p><?php echo $up['updates']; ?></p>
      </div>
      
      <!-- <ul class="media">

			</ul>--> 
      
    </div>
    <div class="update_comment">
      <h5><?php echo COMMENTS; ?></h5>
      <div class="cpagin"> 
        
        <!--  <div class="count"> <span class="current">3</span> of 15 </div>--> 
        
        <a href="javascript://" class="view_more" onclick="get_more_comment(<?php echo $up['update_id'] ?>)"> <span class="icon-down"></span> <?php echo VIEW_PREVIOUS_COMMENTS; ?> </a> </div>
      <div id="cmtcont">
        <ul class="comment_listul" id="comment_listul<?php echo $up['update_id'] ?>">
          <?php 

				

					if($update_cmt){

					

					foreach($update_cmt as $upc){

					

					$ud=get_user_detail($upc['update_comment_user_id']);

				?>
          <li class="comment <?php if($one_project['user_id']==$upc['update_comment_user_id']){ echo 'creator';} ?>">
            <?php if($ud['image']!='' && is_file('upload/thumb/'.$ud['image']) ) { ?>
            <a href="<?php echo site_url('member/'.$ud['user_id']); ?>"><img src="<?php echo base_url();?>upload/thumb/<?php echo $ud['image']; ?>"  class="cuserimg"  align="left"  /></a>
            <?php }elseif($ud['tw_screen_name']!='' && $ud['tw_id']>0) { ?>
            <img src="http://api.twitter.com/1/users/profile_image?screen_name=<?php echo $ud['tw_screen_name']; ?>&size=bigger" class="cuserimg" align="left"  />
            <?php }

									elseif($ud['fb_uid']!='' && $ud['fb_uid']>0) { ?>
            <a href="<?php echo site_url('member/'.$ud['user_id']); ?>"> <img src="http://graph.facebook.com/<?php echo $ud['fb_uid']; ?>/picture?type=large" class="cuserimg" align="left" /></a>
            <?php } else {

									 ?>
            <a href="<?php echo site_url('member/'.$ud['user_id']); ?>"><img src="<?php echo base_url();?>upload/thumb/no_man.gif" class="cuserimg" /></a>
            <?php }  ?>
            <div class="update_cont">
              <h3>
                <?php if($upc['update_comment_user_id']==$one_project['user_id']){?>
                <span class="creator"><?php echo 'Creator'; ?></span>
                <?php } ?>
                <?php echo anchor('member/'.$ud['user_id'],$ud['user_name']." ".$ud['last_name'],'class="author"') ?> <span class="date"> <?php echo ABOUT ?> <?php echo getDuration($upc['update_comment_date']) ?></span> </h3>
              <p class="up"><?php echo $upc['update_comment_text']; ?></p>
              
              <!--<span style="display:none;" class="loading icon-loading-small"></span>--> </div>
          </li>
          <?php 

				  	$upcoffset ++;

				    } }

				  ?>
          
          <!--  <li class="comment creator">

				   

					 <img  src="http://s3.amazonaws.com/ksr/avatars/3117762/VGO Logo.small.jpg?1345954191" class="cuserimg" alt="Vgo logo.small">

					  <div class="update_cont">

						<h3> <span class="creator">Creator</span> <a class="author" href="/profile/vgo">Video Game Orchestra</a> <span class="date"> about 21 hours ago </span> </h3>

						<p class="up">Aaron, it will be sent to you.</p>

						 </div>

				  

				  </li>-->
          
        </ul>
        <input type="hidden" id="upcoffset<?php echo $up['update_id'] ?>" name="upcoffset<?php echo $up['update_id'] ?>" value="<?php echo $upcoffset ?>" />
      </div>
      <style>

			   	.success{ font-size:14px; color:#99CC00;}

			   </style>
      <div id="update_comment" class="update_comment">
        <p class="success" id="success<?php echo $up['update_id']; ?>"></p>
        <?php if(get_authenticateUserID()!=""){ ?>
        <?php if($one_project['user_id']==get_authenticateUserID() || get_authenticateUserID()==get_project_backer_id($one_project['project_id'])){ ?>
        <?php  $attr=array('name'=>'cp'.$up['update_id'],'id'=>'cp'.$up['update_id']);

					echo form_open('project/add_update_comment',$attr);

				?>
        <textarea  name="elm1" style="width:570px; height:150px;" id="upcmttxt<?php echo $up['update_id']; ?>"></textarea>
        <input type="hidden" name="update_id" id="update_id<?php echo $up['update_id']; ?>" value="<?php echo $up['update_id']; ?>" />
        <input type="hidden" name="project_id" id="project_id<?php echo $up['update_id']; ?>" value="<?php echo $up['project_id']; ?>" />
        <input type="button" value="<?php echo POST; ?>"  name="post" class="remindanchor" id="update_cmt<?php echo $up['update_id'] ?>" onclick="post_cmt(<?php echo $up['update_id'] ?>)" />
        </form>
        <?php } }else {}

				?>
      </div>
    </div>
  </div>
  <?php 

		$cnt++;} }else{?>
  <div class="clr"></div>
  <div class="post" style="margin-top:10px;">
    <h2><?php echo NO_UPDATE; ?></h2>
  </div>
  <?php }?>
  <div class="clr"></div>
  <div class="mess_cont_top_right"> <?php echo $page_link ;?> </div>
</div>
