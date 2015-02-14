<link rel="stylesheet" href="<?php echo base_url();?>css/colorbox.css" />
<link rel="stylesheet" href="<?php echo base_url();?>js/colorbox/colorbox.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>js/colorbox/jquery.colorbox.js"> </script>
<script type="text/javascript">
$(document).ready(function(){
				
				jQuery("#deletete").colorbox({iframe:true, width:"490px", height:"250px"});
			});
		
</script>
<script>
	$(document).ready(function(){
		$('.stepname').mouseover(function(){
			
			$('.stepname h2').addClass('h2hover');
		});
		
		$('.stepname').mouseover(function(){
			
			$('.stepname h2').addClass('h2hover');
		});
		
		
		
		$('.stepname').mouseout(function(){
			$('.stepname h2').removeClass('h2hover');
			$('.stepname h2').addClass('h2normal');
		});
	});
function filename(name)
{
	
	document.getElementById('file_name').value=name.replace("C:\\fakepath\\","");

}
	function showcustomvideo()
	{
		document.getElementById('custom_video').style.display='block';
		document.getElementById('thirdparty').style.display='none';
		document.getElementById('videotype').value=1;
	}
	function thirdpartyvideo()
	{
		document.getElementById('custom_video').style.display='none';
		document.getElementById('thirdparty').style.display='block';
		document.getElementById('videotype').value=0;
	}
	function submit_image_valid()
	{
		
		var check=true;
			
			
		var projectimagevideoset='';
		
		/*var radioButtons = document.getElementsByName("projectimagevideoset");
		  for (var x = 0; x < radioButtons.length; x ++) {
			if (radioButtons[x].checked) {
				
				projectimagevideoset=radioButtons[x].value;
			}
		  }
		
		
		if(projectimagevideoset=='')
		{
				
				check=false;
				var dv = document.getElementById('err3');
				dv.className = "error";
				dv.style.clear = "both";
				dv.style.minWidth = "110px";
				dv.style.margin = "5px";
				dv.innerHTML = '<?php //echo PLSEASE_SELECT_DISPLAY_PAGE; ?>';
				return false;
				
		}
		else
		{*/
			document.getElementById('err3').style.display='none';
		//}
		
				 
				 document.getElementById('err1').style.display='none';
				 document.getElementById('err2').style.display='block';
				 if(document.getElementById('videotype').value==1)
					{
							
								if(document.getElementById('videofile').value == "")
								{
									check=false;
									i=0;												
									var dv = document.getElementById('err2');
									dv.className = "error";
									dv.style.clear = "both";
									dv.style.minWidth = "110px";
									dv.style.margin = "5px";
									dv.innerHTML = '  <?php echo '<ul><li>'.VIDEO_REQUIRED.'</li></ul>'; ?>';
									return false;	
									
									
								}else{
									value = document.getElementById('videofile').value;
									t1 = value.substring(value.lastIndexOf('.') + 1,value.length);
									if( t1=='avi' || t1=='wmv' || t1=='flv' || t1=='AVI' || t1=='WMV' || t1=='FLV'){
									
									check=true;
									
									}else{
									
									check=false;
									i=0;												
									var dv = document.getElementById('err2');
									dv.className = "error";
									dv.style.clear = "both";
									dv.style.minWidth = "110px";
									dv.style.margin = "5px";
									dv.innerHTML = '  <?php echo '<ul><li>'.VIDEO_TYPE_NOT_VALID.'</li></ul>'; ?>';
									return false;	
									}
								}
					}
					
					
					if(document.getElementById('videotype').value==0)
					{
					
					
								if(document.getElementById('video').value == "")
								{
									check=false;
									i=0;												
									var dv = document.getElementById('err2');
									dv.className = "error";
									dv.style.clear = "both";
									dv.style.minWidth = "110px";
									dv.style.margin = "5px";
									dv.innerHTML = '  <?php echo '<ul><li>'.VIDEO_URL_REQUIRED.'</li></ul>'; ?>';
									return false;	
									
								}else{
								
									check=true;
									
								}
					
					}
		
		
			
			
						
			
			if(check==true)
			{
				document.frm_project.submit();
			}
		 
		 
		 
		 
	}

function filename(name)
{
	
	document.getElementById('file_name').value=name.replace("C:\\fakepath\\","");

}
				
</script>


<!--******************Header********************-->
<!--******************Section********************-->
<section>
	<div id="page_we">
    	<ul class="stepul">
        	
          <?php   if($id!='' and $id!='0'){?>
        		<li>
            	<a href="<?php echo site_url('start/guideline/'.$id);?>">
                	<div class="complete">
				<table align="center"><tr><td align="center">

                    	<h1><?php echo GUIDELINES; ?></h1></td></tr>
				<tr><td align="center">
                        <h2><img src="<?php echo base_url(); ?>/images/rightsign.png" style="margin-top:5px;" alt="" /></h2></td></tr></table>
                    </div>
                </a>
            </li>
                <li>
                    <a href="<?php echo site_url('start/create_step1/'.$id);?>">
                        <div class="complete">
                    <table align="center"><tbody><tr><td align="center">
                            <h1><?php echo BASICS; ?></h1></td></tr>
                            <tr><td>
                            <h2><img src="<?php echo base_url(); ?>/images/rightsign.png" style="margin-top:5px;" alt="" /></h2></td></tr></tbody></table>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('start/create_step2/'.$id); ?>">
                        <div class="complete">
                    <table align="center"><tr><td align="center">
                           <!-- <h1><?php echo PERKS; ?></h1></td></tr>-->
                            <h1><?php echo iGift; ?></h1></td></tr>
    						<tr><td>
                             <h2><img src="<?php echo base_url(); ?>/images/rightsign.png" style="margin-top:5px;" alt="" /></h2>
                           </td></tr></table>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('start/create_step3/'.$id); ?>">
                        <div class="stepname">
                    <table align="center"><tr><td align="center">
                            <h1><?php echo PROJECT_DETAILS; ?></h1></td></tr>
                            <tr><td>
                            <h2 class="h2normal">4</h2></td></tr></table>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('start/create_step4/'.$id); ?>">
                        <div class="incompletestep">
                    <table align="center"><tr><td align="center">
                            <h1><?php echo ACCOUNT_DETAILS; ?></h1></td></tr>
                            <tr><td>
                            <h2>5</h2></td></tr></table>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('start/create_step5/'.$id); ?>">
                        <div class="incompletestep">
                    <table align="center"><tr><td align="center">
                            <h1><?php echo REVIEW; ?></h1></td></tr>
                            <tr><td>
                            <h2>6</h2></td></tr></table>
                        </div>
                    </a>
                </li>
           
                <li>
                    <a href="<?php echo site_url('start/project_detail_preview/'.$id); ?>">
                        <div class="incompletestep">
                    <table align="center"><tr><td align="center" style="padding: 0 0 5px;margin-top: 10px;">
                            <img src="<?php echo base_url();?>images/eye.png" alt="" class="aimg" style="margin-top: 10px;" /></td></tr>
                            <tr><td>
                            <h2>7</h2></td></tr></table>
                        </div>
                    </a>
                </li>
                      <li>
                    <a href="<?php echo site_url('start/launch_payment/'.$id); ?>">
                        <div class="incompletestep">
                    <table align="center"><tr><td align="center">
                            <h1><?php echo Payment; ?></h1></td></tr>
                            <tr><td>
                            <h2>8</h2></td></tr></table>
                        </div>
                    </a>
                </li>
          <?php }else{?>
                 <li>
                    <a href="#">
                        <div class="stepname">
                    <table align="center"><tbody><tr><td align="center">
                            <h1><?php echo BASICS; ?></h1></td></tr>
                            <tr><td>
                            <h2 class="h2normal">2</h2></td></tr></tbody></table>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="incompletestep">
                    <table align="center"><tr><td align="center">
                           <!-- <h1><?php echo PERKS; ?></h1></td></tr>-->
                            <h1><?php echo iGift; ?></h1></td></tr>
    
                            
                           <tr><td>
                            <h2>3</h2></td></tr></table>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="incompletestep">
                    <table align="center"><tr><td align="center">
                            <h1><?php echo PROJECT_DETAILS; ?></h1></td></tr>
                            <tr><td>
                            <h2>4</h2></td></tr></table>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="incompletestep">
                    <table align="center"><tr><td align="center">
                            <h1><?php echo ACCOUNT_DETAILS; ?></h1></td></tr>
                            <tr><td>
                            <h2>5</h2></td></tr></table>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="incompletestep">
                    <table align="center"><tr><td align="center">
                            <h1><?php echo REVIEW; ?></h1></td></tr>
                            <tr><td>
                            <h2>6</h2></td></tr></table>
                        </div>
                    </a>
                </li>
               <li>
                    <a href="#">
                        <div class="incompletestep">
                    <table align="center"><tr><td align="center" style="padding: 0 0 5px;margin-top: 10px;">
                            <img src="<?php echo base_url();?>images/eye.png" alt="" class="aimg" style="margin-top: 10px;" /></td></tr>
                            <tr><td>
                            <h2>7</h2></td></tr></table>
                        </div>
                    </a>
                </li>
  				<li>
                    <a href="javascript://">
                        <div class="incompletestep">
                    <table align="center"><tr><td align="center">
                            <h1><?php echo Payment; ?></h1></td></tr>
                            <tr><td>
                            <h2>8</h2></td></tr></table>
                        </div>
                    </a>
                </li>
           	
		   <?php }?> 
            
        </ul>
		
		
		
		<div class="step_cont_top">
				<h2><?php echo MEET_YOUR_NEW_PROJECT; ?></h2>
				<p><?php echo ADD_IMPORTANT_DETAILS; ?></p>
			</div>
            <?php
				$attributes = array('id'=>'frm_project','name'=>'frm_project');
				echo form_open_multipart('start/create_step3/'.$id, $attributes);
	  		?>
		<div class="step_cont2">
			
			<div class="step2_left">
             <?php if($error != "")
				{ ?>
                <div class="error" style="height:auto; margin:4px 0px 0px 0px;">
                <ul><?php echo $error; ?></ul>
                </div>
                <?php } ?>
                 <div id="err1"></div>    
			 <div id="err2"></div>   
			  <div id="err3"></div>  
                
				<input type="hidden" name="videotype" id="videotype" value="0" />	
						<div class="" id="thirdparty"  style="display:BLOCK;">
					
				<div class="form-element-container">
                  	<div class="form-label">
                       <label class="labe11"><?php echo PROJECT_VIDEO; ?> </label>
                        </div>
                        <textarea name="video" id="video" class="textarea2"  ><?php echo $video; ?></textarea>
												
					<div style="margin:5px 5px 5px 127px; font-size:13px" ><?php echo PLEASE_FULL_VIDEO_PAGE_URL_FOR_YOUR_3RD_PARTY_VIDEO_HERE;?>.<br/>
					
				<b>Or</b> <?php echo FOR_CUSTOM_VIDEO; ?><span onclick="showcustomvideo()" style="font-weight:bold; cursor:pointer; color:#009900;"><?php echo CLICK_HERE;?></span>.</div>
                  </div>
				  
				  
				 
				  </div>
				 	    <div class="" id="custom_video" style="display:none;" >
				   
				  <div class="form-element-container">
                  	<div class="form-label">
                        <label class="labe11"><?php  echo CUSTOM_VIDEO;?></label>
                        </div>
						<div class="image_upload marl30 lt" style=" margin-top:15px;margin-left:0; float:left; width:295px" id="picture_file_field_display"><input type="file" name="videofile" id="videofile"  value="<?php echo $videofile; ?>" onchange="return filename(this.value);" class="project_picture" height="25px;" style="color:#FFFFFF; font-size:10px;"> <input type="text" style="float:right" readonly="readonly" id="file_name" name="file_name"></div><div class="clr"></div>
                      
					   
					<div style="margin:5px 5px 5px 127px; font-size:13px"><?php echo UPLOAD_CUSTOM_VIDEO_HERE; ?>.<br/>
					
					<b><?php  echo OR_TEXT;?></b> <?php echo FOR_3RD_PARTY_VIDEO; ?> <span onclick="thirdpartyvideo()" style="font-weight:bold; cursor:pointer; color:#009900;"><?php  echo CLICK_HERE;?></span>
					
					</div>
					   
					   
                  </div>
				  
				  </div>
                    <div class="clr"></div>
					
					<label class="labe11"><?php  echo PROJECT_DESCRIPTION;?></label>
					<div style="background:#fff; width:500px; padding:2px; display:inline-block">
                                        <!-- jQuery and jQuery UI -->
									     <!--<link rel="stylesheet" href="<?php echo base_url(); ?>editor/css/smoothness/jquery-ui-1.8.7.custom.css" type="text/css" media="screen" charset="utf-8">-->
                                
                                        <!-- elRTE -->
                                        <!--<script src="<?php echo base_url(); ?>editor/js/elrte.min.js" type="text/javascript" charset="utf-8"></script>
                                        <link rel="stylesheet" href="<?php echo base_url(); ?>editor/css/elrte.min_front.css" type="text/css" media="screen" charset="utf-8">-->
                                        
                                        <!-- elFinder -->
                                        <!--<link rel="stylesheet" href="<?php echo base_url(); ?>editor/css/elfinder.css" type="text/css" media="screen" charset="utf-8" /> 
                                        <script src="<?php echo base_url(); ?>editor/js/elfinder.full.js" type="text/javascript" charset="utf-8"></script> -->
                                        
                                     
                                        <!--<script type="text/javascript" charset="utf-8">
                                            jQuery().ready(function() {
											
											elRTE.prototype.options.panels.web2pyPanel = ['copy', 'cut', 'paste', 'pastetext', 'pasteformattext', 'removeformat','strikethrough','bold', 'italic', 'underline','link', 'unlink', 'anchor','insertorderedlist', 'insertunorderedlist', 'justifyleft', 'justifyright','justifycenter', 'justifyfull', 'forecolor','hilitecolor', 'formatblock','fontsize', 'fontname','image','elfinder'];
 elRTE.prototype.options.toolbars.web2pyToolbar = ['web2pyPanel'];
 
 
                                                var opts1 = {
                                                    cssClass : 'el-rte',
                                                    lang     : 'en',  // Set your language
                                                    allowSource : 1,  // Allow user to view source
                                                    height   : 450,   // Height of text area
                                                    toolbar  : 'web2pyToolbar',   // Your options here are 'tiny', 'compact', 'normal', 'complete', 'maxi', or 'custom'
                                                    cssfiles : ['<?php echo base_url(); ?>editor/css/elrte-inner.css'],
                                                    // elFinder
                                                    fmAllow  : 1,
                                                    fmOpen : function(callback) {
                                                        $('<div id="myelfinder" />').elfinder({
                                                            url : '<?php echo base_url(); ?>editor/connectors/php/connector.php', //You must configure this file. Look for 'URL'.  
                                                            lang : 'en',
                                                            dialog : { width : 900, modal : true, title : 'Files' }, // Open in dialog window
                                                            closeOnEditorCallback : true, // Close after file select
                                                            editorCallback : callback     // Pass callback to file manager
                                                        })
                                                    }
                                                    //End of elFinder
                                                }
                                                
                                                $('#description').elrte(opts1);
                                                
                                            })
                                        </script>-->
                                        <script type="text/javascript" src="<?php echo base_url(); ?>tiny_mce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		 mode : "exact",
  		elements : "description",
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
		width : '500',

		
	});
</script>

                                        
                                        <textarea id="description" name="description"  class="textarea2" cols="50" rows="4" style="width:500px;">
                                                <?php echo $description; ?>
                                            </textarea></div>	
                    <div class="clr"></div>
				</div>
			
				<div class="step2_right">
				<!--<p class="arpare"><?php echo HOW_TO; ?>: <a href="<?php echo site_url('help/faq/tst'); ?>" class="arink"><?php  echo MAKE_AN_AWESOME_PROJECT; ?></a></p>
					<p class="arpare"><?php echo REFER_TO_OUR; ?> <a href="<?php echo site_url('help'); ?>" class="arink"><?php echo PROJECT_HELP_CENTER; ?>.</a></p>
				<p class="step1des" style="margin-top:10px;"><?php echo REUSING_COPYRIGHTED_MATERIAL_IS_ALMOST_ALWAYS_AGAINST_THE_LAW_AND_CAN_LEAD_TO_EXPENSIVE_LAWSUITS_DOWN_THE_ROAD; ?> <?php echo THE_EASIEST_WAY_TO_AVOID_COPYRIGHT_TROUBLES_IS_TO_CREATECONTENT; ?> </p>-->
				<h3 class="step3h3"><?php echo IMPORTANT_REMINDER; ?></h3>
				<p class="step1des" style="margin-top:10px;"><?php echo DONT_USE_MUSIC_IMAGES_VIDEO_OR_OTHER_CONTENT_THAT_YOU_DONT_HAVE_THE_RIGHTS_TO_REUSING_COPYRIGHTED_MATERIAL_IS_ALMOST_ALWAYS_AGAINST_THE_LAW_AND_CAN_LEAD_TO_EXPENSIVE_LAWSUITS_DOWN_THE_ROAD_THE_EASIEST_WAY_TO_AVOID_COPYRIGHT_TROUBLES_IS_TO_CREATE_ALL_THE_CONTENT_YOURSELF_OR_USE_CONTENT_THAT_IS_FREE_FOR_PUBLIC_USE; ?></p>
					
		
			</div>
            
             
		</div>
    </div>
	<div class="setp2btm">
	<div id="page_we">
    <?php if($video_set=='' || $video_set==0) { ?>
			<input type="hidden" name="video_set" id="video_set" value="0" />
			<?php } else { ?>
			<input type="hidden" name="video_set" id="video_set" value="<?php echo $video_set; ?>" />
			<?php } ?>
    
    <input type="hidden"  name="id" id="id"  value="<?php echo $id; ?>" />
    	<input type="submit"  name="back" id="back" class="stepbtn" border="none" style="margin-left:346px;"  title="<?php echo BACK; ?>" value="<?php echo BACK; ?>" />
		<!--<input type="submit"  name="draft" id="draft" class="stepbtn" border="none"  title="<?php echo SAVE; ?>" value="<?php echo SAVE; ?>"onclick="return submit_image_valid()" />-->
		<input type="submit"  name="next" id="next" class="stepbtn" border="none"  title="<?PHP echo NEXT; ?>" value="<?PHP echo NEXT; ?>" onclick="return submit_image_valid()"/>
	   </form>
		 <?php echo anchor('start/deleteproject_popup/'.$id,'Delete Project','id="deletete" class="deleteprj"'); ?> 
		<?php echo anchor('home','EXIT','class="exitp"');?>
	</div>
	</div>
	
</section>

