
<div data-role="header">
  <h1><?php echo CREATE_PROJECT; ?></h1>
  <?php echo anchor('home','Home','class="ui-btn-right"'); ?> </div>
<div class="pad15"><br />

  <h2> <span id="s1postJ"> 4. <?php echo ADDITIONAL_MEDIA; ?></span></h2><br />


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
$(document).ready(function() {
   // some code here
   image_valid();
   var myVerticalSlide2 = new Fx.Slide('add_more2');
	myVerticalSlide2.slideIn();
	
	
 });
</script>


		
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




	
	
     <?php if($error != "")
				{ ?>
                <div class="error" style="height:auto; margin:4px 0px 0px 0px;">
                <?php echo $error; ?>
                </div>
                <?php } ?>
  
  

    
	 <!--left part for tab-->
	  
	   <div id="nav_forms" class="nav_div">
             <?php
				//$attributes = array('id'=>'frm_project','name'=>'frm_project','onsubmit'=>'return submit_image_valid()');
				$attributes = array('id'=>'frm_project','name'=>'frm_project');
						
				 
			echo form_open_multipart('start_project/create_step4/'.$id, $attributes);
	  ?>
												     
<!--------------Step-1---------------------->
            	
<!--------------Step-2---------------------->
                
<!--------------Step 3---------------------->                 
                
<!--------------step-4---------------------->
                <div id="step4" class="div" style="display:block;">
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
		 <fieldset data-role="controlgroup">
					<legend><?php echo SET_DISPLAY_PAGE; ?></legend>
					<table width="60%">
						<tr>
							<td width="4%"><input type="radio" name="projectimagevideoset" id="projectimagevideoset" value="0"  onclick="setimagevideo(this.value)" <?php if($projectimagevideoset=='' || $projectimagevideoset==0 ) { ?> checked="checked" <?php } ?> /> 	</td>
							<td width="7%"><?php  echo PROJECT_IMAGE;?></td>
							<td width="4%"><input type="radio" name="projectimagevideoset" id="projectimagevideoset" value="1" <?php if($projectimagevideoset==1) { ?> checked="checked" <?php } ?> onclick="setimagevideo(this.value)" /></td>
							<td width="23%"><?php echo PROJECT_VIDEO; ?></td>
						</tr>
					</table>
						
					
				</fieldset>
		</div>
				
				
				
					
					
				<div class="inner_content_two" id="thirdparty"  style="display:none;">
					
				<div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
                        <label class="ui-input-text" for="video"><?php echo VIDEO_URL; ?>:</label>
                        <textarea name="video" id="video" class="btn_textarea"  ><?php echo $video; ?></textarea>
					<br/><div style="margin-left:300px;" ><?php echo PLEASE_FULL_VIDEO_PAGE_URL_FOR_YOUR_3RD_PARTY_VIDEO_HERE;?>.<br/>
				<b>Or</b> <?php echo FOR_CUSTOM_VIDEO; ?><span onclick="showcustomvideo()" style="font-weight:bold; cursor:pointer; color:#009900;"><?php  echo CLICK_HERE;?></span>.</div>
                  </div>
				  
				  
				 
				  </div>
				  
				 
				  <div class="inner_content_two" id="custom_video" style="display:none;" >
				   
				  <div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
                  
                        <label class="ui-input-text" for="videofile"><?php  echo CUSTOM_VIDEO;?>:</label>
                       <input name="videofile" type="file" class="" id="videofile" value="<?php echo $videofile; ?>" />
					   
					<br/><div style="margin-left:300px;"><?php echo UPLOAD_CUSTOM_VIDEO_HERE; ?>.<br/>
					
					<b><?php  echo OR_TEXT;?></b> <?php echo FOR_3RD_PARTY_VIDEO; ?> <span onclick="thirdpartyvideo()" style="font-weight:bold; cursor:pointer; color:#009900;"><?php  echo CLICK_HERE;?></span>
					
					</div>
					   
                  </div>
				  
				  </div>
				
				
				 
				
			<div id="add_more2" style="display:block;"> 
				
				 <div id="more2"  class="inner_content_two">
				 	  <div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
							<label class="ui-input-text" for="gallery"><?php echo GALLERY; ?>:*</label>
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
					
					
					 
					<div  style="float: left;padding-left: 200px;margin-right:0px;">
                      		<input type="hidden"  name="id" id="id"  value="<?php echo $id; ?>" />
							<input type="submit"  name="back" id="back" class="draft" border="none"  title="<?php echo BACK; ?>" value="<?php echo BACK; ?>" />
						</div>
                        
						  <div class="form-element-container" style="float:left;">
							<input type="submit"  name="next" id="next" class="draft" border="none"  title="<?PHP echo NEXT; ?>" value="<?PHP echo NEXT; ?>" onclick="return submit_image_valid()" />
						</div>
                       <div class="form-element-container" style="float:left;">
							<input type="submit"  name="draft" id="draft" class="draft" border="none"  title="<?php echo SAVE; ?>" value="<?php echo SAVE; ?>" onclick="return submit_image_valid()" />
						</div>
					
					
               </div>
<!--------------step-5----------------------> 
					
				  
	<!--------------step-5----------------------> 			
				
				
				 <div id="err1"></div>    
				 
				  <div id="err2"></div>   
				  
				   <div id="err3"></div>                   
                         
                </div>
               
               
            </form>
      
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