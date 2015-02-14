<script type="text/javascript">
function LTrim( value ) {
	
	var re = /\s*((\S+\s*)*)/;
	return value.replace(re, "$1");
	
}

// Removes ending whitespaces
function RTrim( value ) {
	
	var re = /((\s*\S+)*)\s*/;
	return value.replace(re, "$1");
	
}

// Removes leading and ending whitespaces
function trim( value ) {
	
	return LTrim(RTrim(value));
	
}



function image_valid()
{
	
	var projectimagevideoset='';
	
	var radioButtons = document.getElementsByName("projectimagevideoset");
      for (var x = 0; x < radioButtons.length; x ++) {
        if (radioButtons[x].checked) {
         	
			projectimagevideoset=radioButtons[x].value;
        }
      }
	
	
	if(projectimagevideoset=='')
	{
		
			set_error('err3', '<?php echo PLEASE_SELECT_DISPLAY_PAGE; ?>');
			document.getElementById('err1').style.display='none';
			document.getElementById('err2').style.display='none';
		
	}
	else
	{
			document.getElementById('err3').style.display='none';
	}
	
	
	
		if(projectimagevideoset==0)
		{
			document.getElementById('err2').style.display='none';
			document.getElementById('err1').style.display='block';
			
		
		frmCheckform        = document.frm_project;
        // assigh the name of the checkbox;
        var chks = document.getElementsByName('file_up[]');
 
        var hasChecked = false;
        // Get the checkbox array length and iterate it to see if any of them is selected
        for (var i = 0; i < chks.length; i++)
        {
                if (chks[i].value=='')
                {
                       set_error('err1', ' <?php echo IMAGE_REQUIRED;?>');
					   hasChecked = true;
                        break;
                }
				else 
				{
						
						value = chks[i].value;
						t1 = value.substring(value.lastIndexOf('.') + 1,value.length);
						if( t1=='jpg' || t1=='jpeg' || t1=='gif' || t1=='png' || t1=='JPEG' || t1=='JPG'  ||  t1=='PNG' || t1=='GIF')
						{
							document.getElementById('err1').style.display='none';
						}
						else
						{						
							set_error('err1', '<?php echo IMAGE_TYPE_NOT_VALID; ?>');	
							hasChecked = true;
                      		break;
						}
				
				
						
				}
				
        }
						
			
			
		}
		
		
		
		if(projectimagevideoset==1)
		{		
				document.getElementById('err1').style.display='none';
				document.getElementById('err2').style.display='block';
				
				if(document.getElementById('video_set').value==1)
				{
						
							if(document.getElementById('videofile').value == "")
							{
								i=0;
								set_error('err2', ' <?php echo VIDEO_REQUIRED; ?>');
							}else{
								value = document.getElementById('videofile').value;
								t1 = value.substring(value.lastIndexOf('.') + 1,value.length);
								if( t1=='avi' || t1=='mp3' || t1=='flv' || t1=='AVI' || t1=='MP3' || t1=='FLV'){
								}else{
								i=0;
								set_error('err2', '  <?php  echo VIDEO_TYPE_NOT_VALID;?>');
								}
							}
				}
				
				
				if(document.getElementById('video_set').value==0)
				{
				
				
							if(document.getElementById('video').value == "")
							{
								set_error('err2', '  <?php echo VIDEO_URL_REQUIRED; ?>');
							}else{
								
							}
				
				}
				
		}
				
		

}



function set_error(ele,msg)
{
var dv = document.getElementById(ele);
dv.className = "error";
dv.style.clear = "both";
dv.style.minWidth = "110px";
dv.style.margin = "5px";
dv.style.display='block';
dv.innerHTML = msg;

}






function submit_image_valid()
{
	
	var check=true;
		
		
	var projectimagevideoset='';
	
	var radioButtons = document.getElementsByName("projectimagevideoset");
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
			dv.innerHTML = '<?php echo PLSEASE_SELECT_DISPLAY_PAGE; ?>';
			return false;
			
	}
	else
	{
		document.getElementById('err3').style.display='none';
	}
	


		if(projectimagevideoset==0)
		{
			document.getElementById('err2').style.display='none';
			document.getElementById('err1').style.display='block';
			
		
		
		
		frmCheckform        = document.frm_project;
        // assigh the name of the checkbox;
        var chks = document.getElementsByName('file_up[]');
 
        var hasChecked = false;
        // Get the checkbox array length and iterate it to see if any of them is selected
        for (var i = 0; i < chks.length; i++)
        {
                if (chks[i].value=='')
                {
                        check=false;
						var dv = document.getElementById('err1');
						dv.className = "error";
						dv.style.clear = "both";
						dv.style.minWidth = "110px";
						dv.style.margin = "5px";
						dv.innerHTML = '<?php echo IMAGE_REQUIRED; ?>';
						dv.style.display='block';
						
					  	hasChecked = true;
                        
						return false;
                }
				else 
				{
						
						value = chks[i].value;
						t1 = value.substring(value.lastIndexOf('.') + 1,value.length);
						if( t1=='jpg' || t1=='jpeg' || t1=='gif' || t1=='png' || t1=='JPEG' || t1=='JPG'  ||  t1=='PNG' || t1=='GIF')
						{
							document.getElementById('err1').style.display='none';
							check=true;
						}
						else
						{						
							
							
							check=false;
							i=0;
							var dv = document.getElementById('err1');
		
							dv.className = "error";
							dv.style.clear = "both";
							dv.style.minWidth = "110px";
							dv.style.margin = "5px";
							dv.innerHTML = '  <?php echo IMAGE_TYPE_NOT_VALID; ?>';
							dv.style.display='block';
							hasChecked = true;
							
							return false;
							
                    	   
					
					
						}
				
				
						
				}
				
        }
		
	
			 
		}
		
		
		if(projectimagevideoset==1)
		{	 
			 document.getElementById('err1').style.display='none';
			 document.getElementById('err2').style.display='block';
			 
			 if(document.getElementById('video_set').value==1)
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
								dv.innerHTML = '  <?php echo VIDEO_REQUIRED; ?>';
								return false;	
								
								
							}else{
								value = document.getElementById('videofile').value;
								t1 = value.substring(value.lastIndexOf('.') + 1,value.length);
								if( t1=='avi' || t1=='mp3' || t1=='flv' || t1=='AVI' || t1=='MP3' || t1=='FLV'){
								
								check=true;
								
								}else{
								
								check=false;
								i=0;												
								var dv = document.getElementById('err2');
								dv.className = "error";
								dv.style.clear = "both";
								dv.style.minWidth = "110px";
								dv.style.margin = "5px";
								dv.innerHTML = '  <?php echo VIDEO_TYPE_NOT_VALID; ?>';
								return false;	
								}
							}
				}
				
				
				if(document.getElementById('video_set').value==0)
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
								dv.innerHTML = '  <?php echo VIDEO_URL_REQUIRED; ?>';
								return false;	
								
							}else{
							
								check=true;
								
							}
				
				}
	
	
		}
		
					
		
		if(check==true)
		{
			document.frm_project.submit();
		}
	 
	 
	 
	 
}



function limitText(limitField, limitCount, limitNum) {

	if (limitField.value.length > limitNum) {
		limitField.value = limitField.value.substring(0, limitNum);
	} else {
		limitCount.value = limitNum - limitField.value.length;
	}
}




function removeHTMLTags(str){
 	
 		var strInputCode = str;
 		/* 
  			This line is optional, it replaces escaped brackets with real ones, 
  			i.e. < is replaced with < and > is replaced with >
 		*/	
 	 	strInputCode = strInputCode.replace(/&(lt|gt);/g, function (strMatch, p1){
 		 	return (p1 == "lt")? "<" : ">";
 		});
 		var strTagStrippedText = strInputCode.replace(/<\/?[^>]+(>|$)/g, "");
 		return strTagStrippedText;	
   // Use the alert below if you want to show the input and the output text
   //		alert("Input code:\n" + strInputCode + "\n\nOutput text:\n" + strTagStrippedText);	
 	
}

</script>


<script type="text/javascript" src="<?php echo base_url(); ?>js2/jquery-1.5.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js2/tabs-navigation.js"></script> 



		
<style type="text/css">
a.dp-choose-date {
	float: right;
	width: 16px;
	height: 16px;
	padding: 0;
	margin: 5px 237px 0px 0px;
	display: block;
	text-indent: -2000px;
	overflow: hidden;
	background: url(<?php echo base_url(); ?>js2/calendar-green.gif) no-repeat; 
}

	
	 

</style>

<div id="headerbar">
	<div class="wrap930">
	<!-- dd menu -->	
<div class="login_navl">
			
			
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tr><td align="left" >	
	<div class="project_title_hd" style="padding-top:15px;" >
	
	
	<span style="text-transform:capitalize;color:#2B5F94;font-size:17px;"><?php echo CREATE_PROJECT; ?></span>
	
	</div>
	</td>
	<td align="right" >	
	
	<div class="project_title_hd" style="padding-top:15px; "  >
	<span id="sddm" style="float:right;">
		
		<?php if($this->session->userdata['project_id']!='' && $this->session->userdata['project_id']!=0) {  ?>
		
	 <?php echo anchor('user/my_project/',CHANGE_PROJECT,' style="text-transform:capitalize;color:#2B5F94;font-size:17px;text-decoration:none;" '); ?>
		
		<?php } ?>
		
	</span>
	</div>

</td></tr></table>
				   
		  </div>     
		<div class="clear"></div>
	</div>
</div>




<div id="container" style="background:#FFFFFF;">
	<div class="wrapper" style="min-height:540px;">
	
	
     <?php if($error != "")
				{ ?>
                <div class="error" style="height:auto; margin:4px 0px 0px 0px;">
                <?php echo $error; ?>
                </div>
                <?php } ?>
  
  
  <!-- <div id="content-top" style="border:1px solid #000000; ">	  </div>-->
	
	<div style="height:18px;">&nbsp;</div>
		
	
      	<div class="block block-block step-navigation-block" id="block-block-11">
	    	<!--<div class="block-top">&nbsp;</div>-->
            	<div class="block-inner">
            		<div class="content">
                      
	 					
                       <div id="step-navigation">
                            <ul>
                                <li id="1" class="first selected"><a href="#step-1" class="1"><span>&nbsp;</span></a></li>
                                <li id="2" class=""><a href="#step-2" class="2" ><span>&nbsp;</span></a></li>
                                <li id="3" class=""><a href="#step-3" class="3"><span>&nbsp;</span></a></li>
                                <li id="4" class=""><a href="#step-4" class="4"><span>&nbsp;</span></a></li>
                             	<li id="5" class=""><a href="#step-5" class="5"><span>&nbsp;</span></a></li>
                            </ul>
                        					
						</div>
						
						  <div id="step-navigation2">
						 	 <ul>
                                <li style="padding-left:85px;"><span><?php echo PROJECT_DEATAILS; ?></span></li>
                                <li style="padding-left:45px;"><span><?php echo CAMPAIGN_DETAILS ?></span></li>
                                <li style="padding-left:35px;"><span><?php echo PROJECT_DESCRIPTION; ?></span></li>
                                <li style="padding-left:30px;"><span><?php echo ADDITIONAL_MEDIA; ?></span></li>
                             	<li style="padding-left:55px;"><span><?php echo PERK_ADDITION; ?></span></li>
                            </ul>
						</div>
						
						
                      
	
			</div>
            <div class="clear"><!-- --></div>
            </div> <!-- /block-inner, /block -->
           
      	</div>
      <!--left part for tab-->
	  <div style="float:left;">
	  
	  		<div id="cur_tab">1. <?php echo PROJECT_DEATAILS; ?></div>
	  
	  </div>
	  
	 <!--left part for tab-->
	  
	   <div id="nav_forms" class="nav_div">
             <?php
				//$attributes = array('id'=>'frm_project','name'=>'frm_project','onsubmit'=>'return submit_image_valid()');
				$attributes = array('id'=>'frm_project','name'=>'frm_project');
						
				 
			echo form_open_multipart('user/create', $attributes);
	  ?>
												     
<!--------------Step-1---------------------->
            	<div id="step1" class="div" style="display:block;">
                	
					<div class="inner_content_two">
					
							<div class="form-element-container">
							<div class="form-label">
							<label class="normal_label"><?php echo TITLE; ?> : *</label>
							</div>
							<input type="text" name="project_title" id="project_title" value="<?php echo $project_title; ?>" size="60" class="btn_input2"/>
							</div>
							<div class="form-element-container">
							 <div class="form-label">
							<label class="normal_label"><?php echo CATEGORY; ?> : *</label>
							</div>
						   <select tabindex="4" name="category_id" id="category_id" class="btn_input" style="text-transform:capitalize;">
								<option value="" ><?php echo SELECT_CATEGORY; ?></option>
							<?php
								foreach($categorylist as $row1)
								{
									
									if($row1->project_category_id==$category_id) {
									
									echo "<option value='".$row1->project_category_id."' selected='selected'>".$row1->project_category_name."</option>";
									}
									
									else
									{
									echo "<option value='".$row1->project_category_id."'>".$row1->project_category_name."</option>";
									
									}
								}
								
							?>
							</select>
							</div>
							
							 
					
					</div>
					
					
					
						<div class="form-element-container" align="center" >
								<input type="button" class="next_tab"  border="none"  title="<?php echo NEXT; ?>" value="<?php echo NEXT; ?>"/>
							</div>
					
					
					
                </div>
<!--------------Step-2---------------------->
                <div id="step2" class="div" style="display:none;">
               
					<div class="inner_content_two">
					
						
						
							<div class="form-element-container">
							<div class="form-label">
							<label class="normal_label"><?php echo TOTAL_DAYS; ?> : *</label>
							</div>
							
							
					<input type="radio"	 name="total_days" id="total_days" value="30" <?php if($total_days=='' || $total_days==30) { ?> checked="checked" <?php } ?>  />30 <?php echo DAYS; ?>&nbsp;
					<input type="radio"	 name="total_days" id="total_days" value="60" <?php if($total_days==60) { ?> checked="checked" <?php } ?> />60 <?php echo DAYS; ?>&nbsp;
					<input type="radio"	 name="total_days" id="total_days" value="90" <?php if($total_days==90) { ?> checked="checked" <?php } ?> />90 <?php echo DAYS; ?>&nbsp;
					<input type="radio"	 name="total_days" id="total_days" value="120" <?php if($total_days==120) { ?> checked="checked" <?php } ?> />120 <?php echo DAYS; ?>&nbsp;
						
							
							
							</div>
						
						
						<div class="form-element-container">
							<div class="form-label">
							<label class="normal_label"><?php echo FUND_GOAL; ?>(<?php echo $site_setting['currency_symbol']; ?>) : *</label>
							</div>
							<input type="text" name="amount" id="amount" size="10" class="btn_input" value="<?php echo $amount; ?>"/>
						  
						</div>
					
				
					</div>
                    
                    <div class="inner_content_two">
                    
                    
					  
					   <div class="form-element-container">
						<div class="form-label">
							<label class="normal_label"><?php echo CITY; ?> : *</label>
							</div>
							<input type="text" name="project_city" id="city_text" size="10" class="btn_input" value="<?php echo $project_city; ?>"/>
					  </div>
					  
					   <div class="form-element-container">
						<div class="form-label">
							<label class="normal_label"><?php echo STATE; ?> : *</label>
							</div>
							<input type="text" name="project_state" id="state_text" class="btn_input" size="10" value="<?php echo $project_state; ?>"/>
					  </div>
					  
					   <div class="form-element-container">
						<div class="form-label">
							<label class="normal_label"><?php  echo COUNTRY;?> : *</label>
							</div>
							<input type="text" name="project_country" id="country_text" class="btn_input" size="10" value="<?php echo $project_country; ?>"/>
					  </div>
					   
					    <div class="form-element-container">
						<div class="form-label">
							<label class="normal_label"><?php echo GOOGLE_ANALYTICAL_CODE; ?> : </label>
							</div>
							<input type="text" name="p_google_code" id="p_google_code" class="btn_input" size="10" value="<?php echo $p_google_code; ?>"/>
							(Ex :: UA-23165973-1)
					  </div>
                       
					 
					 
					 </div>
					 
					 
					  <div  style="float: left;padding-left: 200px;">
							<input type="button" class="back_tab" id="back_tab" border="none"  title="<?php echo BACK; ?>" value="<?php echo BACK; ?>"/>
						</div>
						  <div class="form-element-container" style="float:left;">
							<input type="button" class="next_tab"  border="none"  title="<?PHP echo NEXT; ?>" value="<?php echo NEXT; ?>"/>						
						</div>
						<div class="form-element-container" style="float:left;">
							<input type="submit"  name="draft" id="draft" class="draft" border="none"  title="<?php echo SAVE; ?>" value="<?php echo SAVE; ?>" />
						</div>
				   	 
                 </div>
<!--------------Step 3---------------------->                 
                <div id="step3" class="div" style="display:none;">
               
			   		<div class="inner_content_two">
					
			 	 		  
				
				
				
				 <div class="form-element-container">
                  	<div class="form-label">
                        <label class="normal_label"><?php echo PROJECT_SUMMARY; ?>:*</label>
                        </div>
						
						<textarea name="project_summary" id="project_summary" class="btn_textarea" onKeyDown="limitText(this.form.project_summary,this.form.countdown,95);" onKeyUp="limitText(this.form.project_summary,this.form.countdown,95);" ><?php echo $project_summary; ?></textarea>
						
						<br/><div style="margin-left:150px;" ><font style="font-size:12px;"><?php printf(MAX_CHAR,95); ?><input readonly type="text" name="countdown" value="95" class="normal_label" style="border:none; width:15px;"> <?php echo CHAR_LEFT; ?>.</font></div>
						
						</div>
				
				
				
               <div class="form-element-container">
                 
                        <label class="normal_label"><?php  echo PROJECT_DESCRIPTION;?>:*</label>						
						 
				</div>
				
						
                 
                
                	 <?php
										$vals = array(
											'name' => 'description',
											'id' => 'content',
											'width' => '600px',
											'height' => '350px',
											'value' => $description,
										);
										echo form_fckeditor($vals)."";
									  ?>
					
				

                   	
					
					</div>
					
				 
					  <div  style="float: left;padding-left: 200px;">
							<input type="button" class="back_tab" id="back_tab" border="none"  title="<?php echo BACK; ?>" value="<?php echo BACK; ?>"/>
						</div>
						  <div class="form-element-container" style="float:left;">
							<input type="button" class="next_tab"  border="none"  title="<?php echo NEXT; ?>" value="<?php echo NEXT; ?>"/>						
						</div>
						<div class="form-element-container" style="float:left;">
							<input type="submit"  name="draft" id="draft" class="draft" border="none"  title="<?php echo SAVE; ?>" value="<?php echo SAVE; ?>" />
						</div>
					
                </div>
<!--------------step-4---------------------->
                <div id="step4" class="div" style="display:none;">
                <script language="javascript" type="text/javascript">
						function append_div2()
						{
							var tmp_div2 = document.createElement("div");
							tmp_div2.className = "inner_content_two";
							
							var glry_cnt=document.getElementById('glry_cnt').value;
							document.getElementById('glry_cnt').value=parseInt(glry_cnt)+1;
							var num=parseInt(glry_cnt)+1;
							
							tmp_div2.id='galry'+num;
							
							content=document.getElementById('more2').innerHTML;							
							
							var str = '<div onclick="remove_gallery_div('+num+')" style="text-align:right;font-weight:bold;cursor:pointer;color:#990000;"><?php echo REMOVE;?></div>';	
							tmp_div2.innerHTML = content +str;
							
							document.getElementById('add_more2').appendChild(tmp_div2);
							
							var myVerticalSlide2 = new Fx.Slide('add_more2');
							myVerticalSlide2.slideIn();
						}
						
						
						
					function showcustomvideo()
					{
						document.getElementById('custom_video').style.display='block';
						document.getElementById('thirdparty').style.display='none';
						document.getElementById('video_set').value='1';
						document.getElementById('add_more2').style.display='none';	
						document.getElementById('add_button').style.display='none';	
					
					}
					
					function thirdpartyvideo()
					{
						document.getElementById('custom_video').style.display='none';
						document.getElementById('thirdparty').style.display='block';
						document.getElementById('video_set').value='0';
						document.getElementById('add_more2').style.display='none';	
						document.getElementById('add_button').style.display='none';	
					}
						
					function setimagevideo(set)
					{
						if(set==0)
						{
							document.getElementById('custom_video').style.display='none';
							document.getElementById('thirdparty').style.display='none';
							document.getElementById('add_more2').style.display='block';	
							document.getElementById('add_button').style.display='block';	
							document.getElementById('video_set').value='0';
							parent.document.getElementById('add_more2').style.height='auto';
							
							
						}
						if(set==1)
						{
							document.getElementById('custom_video').style.display='none';
							document.getElementById('thirdparty').style.display='block';
							document.getElementById('add_more2').style.display='none';	
							document.getElementById('add_button').style.display='none';	
							document.getElementById('video_set').value='0';
							
						}
						
					}
					
					
					
					function remove_gallery_div(id)
					{						
				
						var element = document.getElementById('galry'+id);
						var add_more = parent.document.getElementById('add_more2');
						
						var add_parent=add_more.parentNode.offsetHeight;
						
						
						var remove_height=parseInt(element.offsetHeight)+20;
						
						var final_height=add_parent - remove_height;
						
						
						
						
						element.parentNode.removeChild(element);
						add_more.parentNode.style.height = final_height+'px';
						
					
					
					}
					

					</script>
					
						
				<div class="inner_content_two">
				
					<div class="form-element-container">
						<div class="form-label">
							<label class="all_text"><?php echo SET_DISPLAY_PAGE; ?>:</label>
							</div>
							
				<input type="radio" name="projectimagevideoset" id="projectimagevideoset" value="0"  onclick="setimagevideo(this.value)" <?php if($projectimagevideoset=='' || $projectimagevideoset==0 ) { ?> checked="checked" <?php } ?> /><?php  echo PROJECT_IMAGE;?> 			&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="radio" name="projectimagevideoset" id="projectimagevideoset" value="1" <?php if($projectimagevideoset==1) { ?> checked="checked" <?php } ?> onclick="setimagevideo(this.value)" /><?php echo PROJECT_VIDEO; ?>
					</div>
				</div>
				
					
					
				<div class="inner_content_two" id="thirdparty"  style="display:none;">
					
				<div class="form-element-container">
                  	<div class="form-label">
                        <label class="all_text"><?php echo VIDEO_URL; ?>:</label>
                        </div>
                        <textarea name="video" id="video" class="btn_textarea"  ><?php echo $video; ?></textarea>
												
					<br/><div style="margin-left:150px;" ><?php echo PLEASE_FULL_VIDEO_PAGE_URL_FOR_YOUR_3RD_PARTY_VIDEO_HERE;?>.<br/>
					
				<b>Or</b> <?php echo FOR_CUSTOM_VIDEO; ?><span onclick="showcustomvideo()" style="font-weight:bold; cursor:pointer; color:#009900;"><?php  echo CLICK_HERE;?></span>.</div>
                  </div>
				  
				  
				 
				  </div>
				  
				 
				  <div class="inner_content_two" id="custom_video" style="display:none;" >
				   
				  <div class="form-element-container">
                  	<div class="form-label">
                        <label class="all_text"><?php  echo CUSTOM_VIDEO;?>:</label>
                        </div>
                       <input name="videofile" type="file" class="" id="videofile" value="<?php echo $videofile; ?>" />
					   
					<br/><div style="margin-left:150px;"><?php echo UPLOAD_CUSTOM_VIDEO_HERE; ?>.<br/>
					
					<b><?php  echo OR_TEXT;?></b> <?php echo FOR_3RD_PARTY_VIDEO; ?> <span onclick="thirdpartyvideo()" style="font-weight:bold; cursor:pointer; color:#009900;"><?php  echo CLICK_HERE;?></span>
					
					</div>
					   
					   
                  </div>
				  
				  </div>
				
				
				 
				
			<div id="add_more2" style="display:block;"> 
				
				 <div id="more2"  class="inner_content_two">
				  
					  <div class="form-element-container">
						<div class="form-label">
							<label  class="all_text"><?php echo GALLERY; ?>:*</label>
							</div>
						   <input   name="file_up[]" type="file" class="" id="file_up" />
					 </div>
                  
				</div>
				
				</div>
				
				<input type="hidden" name="glry_cnt" id="glry_cnt" value="1" />
			<div id="add_button" style="display:block;"><img src="<?php echo base_url(); ?>images/add.png" height="16" width="16" border="0" title="<?php echo ADD_MORE; ?>" onclick="append_div2();" style="cursor:pointer;" />
			
			<?php if($video_set=='' || $video_set==0) { ?>
			<input type="hidden" name="video_set" id="video_set" value="0" />
			<?php } else { ?>
			<input type="hidden" name="video_set" id="video_set" value="<?php echo $video_set; ?>" />
			<?php } ?>
			
			</div>
					
					
					 
					  <div  style="float: left;padding-left: 200px;">
							<input type="button" class="back_tab" id="back_tab" border="none"  title="<?PHP echo BACK; ?>" value="<?php echo BACK; ?>"/>
						</div>
						  <div class="form-element-container" style="float:left;">
							<input type="button" class="next_tab"  border="none"  title="<?PHP echo NEXT; ?>" value="<?php echo NEXT; ?>"/>						
						</div>
						<div class="form-element-container" style="float:left;">
							<input type="submit"  name="draft" id="draft" class="draft" border="none"  title="<?PHP echo SAVE; ?>" value="<?php echo SAVE; ?>" />
						</div>
					
               </div>
<!--------------step-5----------------------> 
					
				<div id="step5" class="div" style="display:none;">
					<script language="javascript" type="text/javascript">
						function append_div()
						{
							var tmp_div = document.createElement("div");
							tmp_div.className = "inner_content_two";
							
							
							var perk_cnt=document.getElementById('perk_cnt').value;
							document.getElementById('perk_cnt').value=parseInt(perk_cnt)+1;
							var num=parseInt(perk_cnt)+1;
							
							tmp_div.id='perk'+num;
							
							content=document.getElementById('more').innerHTML;							
						
								
							var str = '<div onclick="remove_perk_div('+num+')" style="text-align:right;font-weight:bold;cursor:pointer;color:#990000;"><?php echo REMOVE; ?></div>';
								
							tmp_div.innerHTML = content +str;
							document.getElementById('add_more').appendChild(tmp_div);
							
							var myVerticalSlide = new Fx.Slide('add_more');
							myVerticalSlide.slideIn();
						}
						function remove_perk_div(id)
						{						
					
							var element = document.getElementById('perk'+id);
							var add_more = parent.document.getElementById('add_more');
							
							var add_parent=add_more.parentNode.offsetHeight;
							
							
							var remove_height=parseInt(element.offsetHeight)+20;
							
							var final_height=add_parent - remove_height;
							
							
							
							
							element.parentNode.removeChild(element);
							add_more.parentNode.style.height = final_height+'px';
							
						
						
						}
						
						
					</script>
					<div id="add_more">
					<div id="more" class="inner_content_two">
				
						<div class="form-element-container">
							<div class="form-label">
								<label class="all_text"><?php echo PERK_TITLE; ?>:*</label>
							</div>
							<input type="text" name="perk_title[]" id="perk_title"  class="btn_input" />
						</div>
						<div class="form-element-container">
							<div class="form-label">
								<label class="all_text"><?php echo PERK_DESCRIPTION; ?>:*</label>
							</div>
							<textarea name="perk_description[]" id="perk_description"  class="btn_textarea"></textarea>
						</div>
						<div class="form-element-container">
							<div class="form-label">
								<label class="all_text"><?php echo PERK_AMMOUNT; ?>(<?php echo $site_setting['currency_symbol']; ?>):*</label>
							</div>
							<input type="text" name="perk_amount[]" id="perk_amount"  class="btn_input1" />
						</div>
						<div class="form-element-container">
							<div class="form-label">
								<label class="all_text"><?php echo TOTAL_CLAIM; ?>:*</label>
							</div>
							<input type="text" name="perk_total[]" id="perk_total"  class="btn_input1" />
						</div>
					</div>
					
					</div>
					<input type="hidden" name="perk_cnt" id="perk_cnt" value="1" />
					<div><img src="<?php echo base_url(); ?>images/add.png" height="16" width="16" border="0" title="Add More" onclick="append_div();" style="cursor:pointer;" /></div>
					
					
					
					
				<?php $chk_paypal=$this->home_model->check_project_user_paypal_add();

						if($chk_paypal==0) {  ?>
				
				<div align="center" style="padding:10px;"><?php echo anchor('home/verify_paypal/',PLEASE_SETUP_PAYPAL_EMAIL_ADDRESS,'style="color:#FF0000;" target="_blank" ');?></div>
				
				
				<?php }  $chk_amazon=$this->home_model->check_project_user_amazon_add();

						if($chk_amazon==0) {  ?>
                        
              <div align="center" style="padding:10px;"><?php echo anchor('home/amazon_account_verify/',PLEASE_SETUP_OR_VERIFY_AMAZON_ACCOUNT); ?> </div>
			   
			   
			  <?php }   ?>
              
              
              
					
					
					<div  style="float:left;padding-left: 200px;margin-right:20px;">
						<input type="button" class="back_tab" id="back_tab" border="none"  title="<?php echo BACK; ?>" value="<?php echo BACK; ?>"/>
					</div>
					<div class="form-element-container" style="margin-left:150px">
						<input type="submit" class="finish" border="none"  title="<?php echo FINISH; ?>" value="<?php echo FINISH; ?>" />
					</div> 
					
					
					
				</div>  
	<!--------------step-5----------------------> 			
				
				
				 <div id="err1"></div>    
				 
				  <div id="err2"></div>   
				  
				   <div id="err3"></div>                   
                         
                </div>
               
               
            </form>
       </div>     
    </div>
</div>


<?php if($projectimagevideoset=='' || $projectimagevideoset==0){ $projectimagevideoset=0; } 

if($projectimagevideoset==1){ $projectimagevideoset=1; } 


if($video_set=='' || $video_set==0){ $video_set=0; } 

if($video_set==1){ $video_set=1; }


?>


<script type="text/javascript">

var viset=<?php echo $projectimagevideoset; ?>;
var videoup=<?php echo $video_set; ?>;

function setvideoup()
{
	
	if(viset=='0')
	{
		
			document.getElementById('add_more2').style.display='block';	
			document.getElementById('add_button').style.display='block';
			document.getElementById('custom_video').style.display='none';
			document.getElementById('thirdparty').style.display='none';
			document.getElementById('video_set').value='0';	
			document.frm_project.projectimagevideoset[0].checked=true;	
		
	}
	
	if(viset=='1')
	{
		if(videoup=='1')
		{
			document.getElementById('custom_video').style.display='block';
			document.getElementById('thirdparty').style.display='none';
			document.getElementById('video_set').value='1';
			document.getElementById('add_more2').style.display='none';	
			document.getElementById('add_button').style.display='none';	
			document.frm_project.projectimagevideoset[1].checked=true;
		}
		else
		{
			document.getElementById('add_more2').style.display='none';	
			document.getElementById('add_button').style.display='none';
			document.getElementById('custom_video').style.display='none';
			document.getElementById('thirdparty').style.display='block';
			document.getElementById('video_set').value='0';	
			document.frm_project.projectimagevideoset[1].checked=true;	
		
		}
		
	}
	
}





window.onload= function() {  
 
 setvideoup();
 
 };
 
 </script>