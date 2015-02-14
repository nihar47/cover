<script>
	function del_blog(id){
		
		var r=confirm("<?php echo "Are You Sure To Delete This Blog"; ?>");
			if (r==true)
			  {
			  	x=1;
			
				window.location.href="<?php echo site_url('user/delete_blog'); ?>/"+id+"/<?php echo $offset ;?>";
			  }
			else
			  {
			 	
			  }
		
		
		
	}
</script>
<link rel="stylesheet" href="<?php echo base_url();?>css/colorbox.css" />
<link rel="stylesheet" href="<?php echo base_url();?>js/colorbox/colorbox.css" />

                                       
                                        

<script type="text/javascript">
$(document).ready(function(){
				
				$("#profile_detail_popup").colorbox({iframe:true, width:"660px", height:"660px"});
				
			});
		
</script>
<script type="text/javascript">

function showaddbox()
{
	$('#add_update').css('display','block');
		
}

function show_reply(id)
{
	if(id!='')
	{
		document.getElementById(id).style.display='block';						
	}		
}
		
</script>
 <script type="text/javascript" src="<?php echo base_url(); ?>tiny_mce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
					tinyMCE.init({
						// General options
						 mode : "exact",
						elements : "blog_disc",
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

<section>
	<div class="usersectiion">
		<div id="page_we">
		<?php $user_detail=get_user_detail($this->session->userdata('user_id'));
		
			if(is_file('upload/thumb/'.$user_detail['image']))
						{
							$img = $user_detail['image'];
						}else{
							$img = NO_MAN;
						}
			
		 ?>
		<div class="imagediv">
			<?php 	
					if(is_file('upload/thumb/'.$user_detail['image'])){
						?> <img src="<?php echo base_url().'upload/thumb/'.$img; ?>" alt=""class="uimgimg"/><?php
					}elseif($user_detail['tw_screen_name']!='' && $user_detail['tw_id']>0) { ?>
	
	<img src="http://api.twitter.com/1/users/profile_image?screen_name=<?php echo $user_detail['tw_screen_name']; ?>&size=bigger" class="uimgimg" />
	
	
	<?php } elseif($user_detail['fb_uid']!='' && $user_detail['fb_uid']>0) { ?>
			    <img src="http://graph.facebook.com/<?php echo $user_detail['fb_uid']; ?>/picture?type=large" alt="" class="uimgimg"/>
				<?php } else { ?>
               				<img src="<?php echo base_url().'upload/thumb/'.$img; ?>" alt="" class="uimgimg" />
				<?php } ?>
			
			
			
			
		</div>
		<div class="userdetail">
			<div class="share">
			<a href="#"><img class="simg" src="<?php echo base_url() ?>images/fshare.png"></a>
			<a href="#"><img class="simg" src="<?php echo base_url() ?>images/twittershare.png"></a>
			<h2><?php echo SHARE_YOUR_PROFILE;?></h2>
            <?php echo anchor('home/profile_detail',EDIT_YOUR_PROFILE);?>
			</div>
			<h2><?php echo $user_detail['user_name']." ".$user_detail['last_name']; ?></h2>
			<?php $total_pd=$this->user_model->get_my_donations_count(); ?>
			<p class="loc">Backed <?php echo $total_pd; ?> projects - <?php echo get_city_name($user_detail['city']).",".get_state_name($user_detail['state']).",".get_country_name($user_detail['country']); ?> - <?php //echo date($user_detail['date_added'],strtotime('f,m')); ?><?php echo date('F Y',strtotime($user_detail['date_added']))?></p>
			<p class="udesc"><?php echo $user_detail['user_about'];?></p>
			<!--<p>web developer</p>-->
			<?php echo anchor('user/bio_data/'.$user_detail['user_id'],SEE_FULL_BIO.' & '.LINKS,'id="profile_detail_popup" class="fullbio"');?>
		<!--	<div class="successp">
				<img class="spimg" alt="" src="<?php // echo base_url() ?>images/spimg.png">
				<div class="successp_r">
					<h2>The Wedding Party - A one-shot feature film</h2>
					<p>by Jayne wayne- 3rd project</p>
					<p>Successfully funded on Sep. 18, 2012</p>
				</div>		
			</div>-->
		</div>
		<!--<img class="category_round" src="<?php // echo base_url() ?>images/catround.png">-->
		<!--<ul class="accsetul">
			<li><a href="#">Activity Stream</a></li>
			<li><a href="#">Projects</a><p class="cd">15</p></li>
			
		</ul>-->
		</div>
		
	</div><div class="clr"></div>
	<div id="page_we">
	<div class="user_detail"  style="width:100%;">
	
	
           <?php
	  if($msg!="")
	  { 
	?>
	  
      <div style="color:#009900" align="center">
      <?php
	  
	  if($msg=='insert')
	  {echo BLOG_INSERT_SUCCESSFULLY;}
	  
	  if($msg=='update')
	  {
	     echo BLOG_UPDATE_SUCCESSFULLY;
	  } 
	  if($msg=='delete')
	  {
	    echo BLOG_DELETE_SUCCESSFULLY;
	  }
	  ?>
      </div>
     <?php }?> 
		         
				<div style="float:left;"><h3 id="dropmenu2"><?php echo MY_BLOG; ?></h3></div>
				
				<?php 
				
				if(count($user_blog)<=$blog_setting->blog_post_limit)
				{?>
                <div style="float:right;"><h3 class="add_text_buton" onClick="showaddbox();" style="cursor:pointer;"><?php echo ADD_NOW; ?></h3></div>
               <div style="clear:both;"></div>
			 
			 <?php }?>
			 
			   <div class="clear"></div>
			 
			<?php //if($updates) { ?>	   
              <div id="recent-donate-detail">
              
             
				<div id="donor-update">
				<ul class="bloglist_ul">   
          		  <?php
                           $attributes = array('name'=>'frm_blog');
                            echo form_open_multipart('user/add_blog',$attributes);
                        ?>
           			 <div class="editor" id="add_update" style="display:none;">
            
             
                  <div class="s_lleft" style="width:82px; text-align:none; margin:0px 8px"><label class="labe11"><?php echo BLOG_TITLE; ?> : <span style="color:#f00;">*</span></label></div>
                  <div class="clr"></div>
                    <div style="padding-bottom:10px;"><span>
                      <input type="text" name="blog_title" id="blog_title" value=""  class="stext2" style="width:203px;" />
                     </span></div><br />
                      <span style="color:#FF0000;" id="title_err"></span>
					 <div class="clr"></div>
                <br />
                
                 <div class="s_lleft" style="width:82px; text-align:none; margin:0px 8px"><label class="labe11"><?php echo BLOG_CATEGORY; ?> : <span style="color:#f00;">*</span></label></div>
                  <div class="clr"></div>               
                <select tabindex="5" name="blog_category" id="blog_category" class="user_select" >
            <option value=""> -- <?php echo 'select category'; ?> -- </option>
            <?php
						foreach($blog_category as $blg){
							echo "<option value='".$blg->blog_category_id."'>".$blg->blog_category_name."</option>";
						}
					?>
          </select>
         	 <div class="clr"></div>
                <br /> <span style="color:#FF0000;" id="cat_err"></span>
					 <div class="clr"></div><br/>
                
                 <div class="s_lleft" style="width:109px; text-align:none;">
                     <label class="labe11"><?php echo BLOG_CONTENT; ?></label></div>
                   <br/>
                     <div class="clr"></div>
                   
               
                     <textarea name="blog_disc" id="blog_disc" rows="15" cols="80" style="width:250px; height:400px;"  ></textarea>	
                      
                         <div style="width:100%; padding:2px;">
                                     
                                        
                                     </div>             
                   
                       <span style="color:#FF0000;" id="blog_err"></span>
                 <br />   
                <div class="clr"></div>
                
               
                
                
               <div style="display:block; float:left; margin:20px 0;">
                 <input type="checkbox" name="publish" id="publish" value="1">  <label class="form_label" style="display: inline-block;" ><?php echo PUBLISH; ?> </label><br>
                 
                <?php /*?>  <input type="checkbox" name="allow_anonymous" id="allow_anonymous" value="1"><label class="form_label" style="display: inline-block;" ><?php echo ALLOW_ANONYMOUS_TO_COMMENT; ?> </label><br><?php */?>
                   <input type="checkbox" name="no_one_comment" id="no_one_comment" value="1"><label class="form_label" style="display: inline-block;" ><?php echo DO_NOT_ALLOW_ANY_COMMENTS; ?> </label><br>
                 
               </div>
                <div class="clr"></div>
                
                
                 
                 <input type="hidden" name="user_id" id="user_id" value="<?php echo $this->session->userdata('user_id'); ?>"  />
                 <input type="hidden" name="offset" id="offset" value="<?php echo $offset; ?>" />
                 <input type="hidden" name="limit" id="limit" value="<?php echo $limit; ?>" />
                  
            <!-- <input type="button" class="view_page" onClick="document.frm_blog.submit();"  style="cursor:pointer; border:none;"  name="update_btn" id="updates_btn" value="Post Blog" />-->
              <input type="submit" class="stepbtn" onClick="return check();" style="cursor:pointer; border:none;"  name="update_btn" id="updates_btn" value="Post Blog" />
                  </div>
						</form>
                           <div class="clr"></div>
                                    
                                 <!--  </li>-->
								
                                <?php 
								if($user_blog)
								{
								 foreach($user_blog as $ublog)
								{?>
                                <li class="common_li2">
                               
                              <div class="delete-content">
							  <a href="javascript://" onclick="del_blog(<?php echo $ublog->blog_id; ?>)"><img src="<?php echo base_url();?>images/delete.png" alt="" style="background:none;border:none;" title="<?php echo DELETE ?>" /></a>
							  <?php // echo anchor('user/delete_blog/'.$ublog->blog_id.'/'.$offset, '<img src="'.base_url().'images/delete.png" alt="" style="background:none;border:none;" title="'.DELETE .'" />', 'style="background:none;padding:0px;"'); ?></div>
						
                                 
						    <div class="delete-content">							
							
							 <a href="javascript:void()" style="display:inline-block;background:none;border:1px solid #b4d7f9;padding:0px 3px;margin-right:10px;color:#114a75;text-decoration:none; margin-top:-4px" id="sts" onclick="show_reply(<?php echo $ublog->blog_id; ?>)"><?php echo EDIT;?></a>
							 
							 </div>
                          
                          <?php //print_r($ublog);?>
                                <h4 style="color:#114A75;">Blog Title:<?php echo $ublog->blog_title; ?></h4>
									<p><?php echo $ublog->blog_discription; ?></p>
                                    
                          
								
                             <div class="clr"></div>
                             <div class="clr"></div>
                                   <div id="<?php echo $ublog->blog_id; ?>" style="width:100%;display:none;border:none;">
                                        <?php
									$attributes = array('name'=>'frmupupdate2');
									echo form_open_multipart('user/edit_blog/'.$ublog->blog_id,$attributes);
				
			                     ?>     
						
							 <div class="s_lleft" style="width:82px; text-align:none; margin:0px 5px"><label class="labe11">Blog Title : <span style="color:#f00;">*</span></label></div><div class="clr"></div>
                    <div style="padding-bottom:10px;"><span>
                      <input type="text" name="blog_title" id="blog_title" value="<?php echo $ublog->blog_title; ?>"  class="stext2" style="width:203px;" />
                     </span></div><br />
                      <span style="color:#FF0000;" id="title_err"></span>
					 <div class="clear"></div>
                     
                     
                      <div class="s_lleft" style="width:82px; text-align:none; margin:0px 5px"><label class="labe11">Blog Category : <span style="color:#f00;">*</span></label></div><div class="clr"></div>
               
                <select tabindex="5" name="blog_category" id="blog_category" class="user_select" >
            <option value=""> -- <?php echo 'select category'; ?> -- </option>
            <?php
						foreach($blog_category as $blg){
							if($ublog->blog_category == $blg->blog_category_id)
							{
								echo "<option value='".$blg->blog_category_id."' selected='selected'>".$blg->blog_category_name."</option>";
							}
							else{
								echo "<option value='".$blg->blog_category_id."'>".$blg->blog_category_name."</option>";
							}
						}
					?>
          </select>
         	 <div class="clr"></div>
                <br /> <span style="color:#FF0000;" id="cat_err"></span>
					 <div class="clr"></div><br/>
                     
                     
                     
                      <div class="s_lleft" style="width:109px; text-align:none; margin:0px 5px">
                     <label class="labe11">Blog Content </label></div>
                     <div class="clear"></div>
                     <textarea name="blog_discription" id="blog_discription<?php echo $ublog->blog_id; ?>" rows="15" cols="80" style="width:250px; height:400px;" ><?php echo $ublog->blog_discription; ?></textarea>	
                      <div style="width:100%; padding:2px;">
                                       <script type="text/javascript">
					tinyMCE.init({
						// General options
						 mode : "exact",
						elements : "blog_discription<?php echo $ublog->blog_id; ?>",
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
                                         
                                        
                                       <!-- <textarea id="description" name="description" cols="50" rows="4">
                                                <?php //echo $description; ?>
                                            </textarea>--></div>   
                       <span style="color:#FF0000;" id="blog_err"></span>
                 <br />   
                 <div class="clear"></div>
                 
                 
                 <div style="padding:0px 109px">
                 <input type="checkbox" name="publish" id="publish" value="1" <?php if($ublog->publish==1){?> checked="checked"<?php } ?>>  <label class="form_label" style="display: inline-block;" >Publish </label> <br />
                 
                <?php /*?>    <input type="checkbox" name="allow_anonymous" id="allow_anonymous" value="1" <?php if($ublog->allow_anonymous==1){?> checked="checked"<?php } ?>><label class="form_label" style="display: inline-block;" >Allow Anonymous To Comment </label><br/><?php */?>
                    
                       <input type="checkbox" name="no_one_comment" id="no_one_comment" value="1"  <?php if($ublog->no_one_comment==1){?> checked="checked"<?php } ?>><label class="form_label" style="display: inline-block;" >No One Can Do Commment </label><br/>
                  
                 
                 <div class="clr"></div>
               <div style="margin:0px 0px 0px 109px;">
                 <div class="clr"></div>
                
                 <label class="form_label" style="display: inline-block;"> <span style="color:#f00;"></span></label>
                 <input type="hidden" name="user_id" id="user_id" value="<?php echo $this->session->userdata('user_id'); ?>"  />
                 <input type="hidden" name="blog_id" id="blog_id" value="<?php echo $ublog->blog_id; ?>"  />	 
                 <input type="hidden" name="status" id="status" value="<?php echo $ublog->status;  ?>"  />
                 <input type="hidden" name="limit" id="limit" value="<?php echo $limit;  ?>"  />
                 <input type="hidden" name="offset" id="offset" value="<?php echo $offset;  ?>"  />
                  
            <!-- <input type="button" class="view_page" onClick="document.frm_blog.submit();"  style="cursor:pointer; border:none;"  name="update_btn" id="updates_btn" value="Post Blog" />-->
              <input type="submit" class="stepbtn" onClick=""  style="cursor:pointer; border:none;"  name="update_btn" id="updates_btn" value="update" />
              <div class="clr"></div>
               </div>
              <div class="clr"></div>
					
            </form>		
					
					</div>
                     <div class="clr"></div>
                       
                                    </li>
                                <?php }
								}
								?>
                                
                              
                               
                                
								
								
							</ul>
				</div>
				<div style="clear:both;"></div>
				<div  align="left" style="line-height:20px; padding-left:250px; font-size:11px;"><?php echo $page_link; ?></div>
				</div>
				
			
				
		</div>
		
		
		
		
		</div>
			
			
			
			 <div class="clr"></div>
				
				
					</div>
	</div>
</div>
</section>
<script type="text/javascript">
function check()
{
   var title=document.getElementById('blog_title');
   var blogcat = document.getElementById('blog_category');
  
   
    
   document.getElementById('title_err').innerHTML='';
   document.getElementById('blog_err').innerHTML='';
    document.getElementById('cat_err').innerHTML='';
	
	if(title.value==''){
		document.getElementById('title_err').innerHTML='Please Enter Blog Title';
		title.focus();
		return false;
	}
	if(blogcat.value == ''){
		document.getElementById('cat_err').innerHTML='Please Select Blog Category';
		return false;
	}
	
	
	
	return true;
	
	
}
</script>