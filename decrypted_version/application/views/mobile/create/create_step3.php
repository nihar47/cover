
<div data-role="header">
  <h1><?php echo CREATE_PROJECT; ?></h1>
  <?php echo anchor('home','Home','class="ui-btn-right"'); ?> </div>
<div class="pad15"><br />

  <h2> <span id="s1postJ"> 3. <?php echo PROJECT_DESCRIPTION; ?></span></h2><br />
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
  
  

   
	   <div id="nav_forms" class="nav_div">
             <?php
				//$attributes = array('id'=>'frm_project','name'=>'frm_project','onsubmit'=>'return submit_image_valid()');
				$attributes = array('id'=>'frm_project','name'=>'frm_project');
						
				 
			echo form_open_multipart('start_project/create_step3/'.$id, $attributes);
	  ?>
												     
<!--------------Step-1---------------------->
            	
<!--------------Step-2---------------------->
                
<!--------------Step 3---------------------->                 
                <div id="step3" class="div" style="display:block;">
               
			   		<div class="inner_content_two">
				
						<div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
                  
                        <label class="ui-input-text" for="project_summary"><?php echo PROJECT_SUMMARY; ?>:*</label>
                     <textarea name="project_summary" id="project_summary" class="btn_textarea" onKeyDown="limitText(this.form.project_summary,this.form.countdown,95);" onKeyUp="limitText(this.form.project_summary,this.form.countdown,95);" ><?php echo $project_summary; ?></textarea>
						
						<br/><div style="margin-left:300px;" ><font style="font-size:12px;"><?php printf(MAX_CHAR,95); ?><input readonly type="text" name="countdown" value="95" class="normal_label" style="border:none; width:15px;"> <?php echo CHAR_LEFT; ?>.</font></div>
						
						</div>
						<div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
                 
                        <label class="ui-input-text" for="project_description"><?php  echo PROJECT_DESCRIPTION;?>:*</label>						
				  <textarea name="description" id="content" class="btn_textarea"><?php echo $description; ?></textarea>
                
                	 <?php
										/*$vals = array(
											'name' => 'description',
											'id' => 'content',
											'width' => '600px',
											'height' => '350px',
											'value' => $description,
										);
										echo form_fckeditor($vals)."";*/
									  ?>
					
				

                   	
					
					</div>
					</div>
					
				 
					<div  style="float: left;padding-left: 200px;margin-right:0px;">
                      		<input type="hidden"  name="id" id="id"  value="<?php echo $id; ?>" />
							<input type="submit"  name="back" id="back" class="draft" border="none"  title="<?php echo BACK; ?>" value="<?php echo BACK; ?>" />
						</div>
                        
						  <div class="form-element-container" style="float:left;">
							<input type="submit"  name="next" id="next" class="draft" border="none"  title="<?PHP echo NEXT; ?>" value="<?PHP echo NEXT; ?>" />
						</div>
                       <div class="form-element-container" style="float:left;">
							<input type="submit"  name="draft" id="draft" class="draft" border="none"  title="<?php echo SAVE; ?>" value="<?php echo SAVE; ?>" />
						</div>
					
                </div>
<!--------------step-4---------------------->
                
<!--------------step-5----------------------> 
					
				  
	<!--------------step-5----------------------> 			
				
				
				 <div id="err1"></div>    
				 
				  <div id="err2"></div>   
				  
				   <div id="err3"></div>                   
                         
                </div>
               
            </form>
     
</div>


