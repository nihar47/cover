

 
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
		
			set_error('err3', ' Please Select the Display page');
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
                       set_error('err1', '  Image is required');
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
							set_error('err1', '  Image type is not valid');	
							hasChecked = true;
                      		break;
						}
				
				
						
				}
				
        }
			// if ishasChecked is false then throw the error message
			/*if (!hasChecked)
			{
					alert("Please select at least one service.");
				   
					return false;
			}
			else
			{
				 frmCheckform.submit();
			}
		
		
		
			if(document.getElementById('file_up').value == "")
			{
				i=0;
				set_error('err1', '  Image is required');
				
			}else{
				value = document.getElementById('file_up').value;
				t1 = value.substring(value.lastIndexOf('.') + 1,value.length);
				if( t1=='jpg' || t1=='jpeg' || t1=='gif' || t1=='png' || t1=='bmp' ){
				
				}else{
				
				i=0;
				set_error('err1', '  Image type is not valid');
				
				}
				
			}*/
			
			
			
			
			
			
			
			
			
			
		
		
			
			
			
			
			
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
								set_error('err2', '  Video is required');
							}else{
								value = document.getElementById('videofile').value;
								t1 = value.substring(value.lastIndexOf('.') + 1,value.length);
								if( t1=='avi' || t1=='mp3' || t1=='flv' || t1=='AVI' || t1=='MP3' || t1=='FLV'){
								}else{
								i=0;
								set_error('err2', '  Video type is not valid');
								}
							}
				}
				
				
				if(document.getElementById('video_set').value==0)
				{
				
				
							if(document.getElementById('video').value == "")
							{
								set_error('err2', '  Video URL is required');
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
			dv.innerHTML = '  Please Select the Display page';
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
						dv.innerHTML = '  Image is required';
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
							dv.innerHTML = '  Image type is not valid';
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
								dv.innerHTML = '  Video is required';
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
								dv.innerHTML = '  Video type is not valid';
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
								dv.innerHTML = '  Video URL is required';
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
<script type="text/javascript" src="<?php echo base_url(); ?>js2/tabs-navigation_start.js"></script> 


<!--
<script type="text/javascript" src="<?php //echo base_url(); ?>js/jquery.min.js"></script>

<script type="text/javascript" src="<?php //echo base_url(); ?>js2/date.js"></script> 
<script type="text/javascript" src="<?php //echo base_url(); ?>js2/jquery.datePicker.js"></script>

<link href="<?php //echo base_url(); ?>js2/datePicker.css" rel="stylesheet" />
<script type="text/javascript" charset="utf-8">
Date.format = 'dd-mm-yyyy';
           jQuery(function()
            {

				jQuery('.date-pick').datePicker({clickInput:true})

            });
			



		</script>
	-->
		
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





<div id="container" style="background:#FFFFFF;">
	<div class="wrapper" style="min-height:540px;">
	
	
     <?php if($error != "")
				{ ?>
                <div class="error" style="height:auto">
                <?php echo $error; ?>
                </div>
                <?php } ?>
  
  
  <!-- <div id="content-top" style="border:1px solid #000000;"> </div>-->
	
	<div style="height:18px;">&nbsp;</div>
		
	
      	<div class="block block-block step-navigation-block" id="block-block-11">
	    	<!--<div class="block-top" style="font-family: Arial, Helvetica, sans-serif;font-size:20px;color: #114A75;font-weight: bold;text-decoration: none;padding: 0px;text-decoration: none;margin-bottom: 25px;">Start Project&nbsp;</div>-->
            	<div class="block-inner">
            		<div class="content">
                      
	 					
                       <div id="step-navigation3">
                            <ul>
                                <li id="1" class="first selected" style="width:110px;"><a href="#step-1" class="1"><span>&nbsp;</span></a></li>
                                <li id="2" class=""><a href="#step-2" class="2" ><span>&nbsp;</span></a></li>
                                <li id="3" class=""><a href="#step-3" class="3"><span>&nbsp;</span></a></li>
                                <li id="4" class=""><a href="#step-4" class="4"><span>&nbsp;</span></a></li>
                             	<li id="5" class=""><a href="#step-5" class="5"><span>&nbsp;</span></a></li>
								<li id="6" class=""><a href="#step-6" class="6"><span>&nbsp;</span></a></li>
                            </ul>
                        					
						</div>
						
						  <div id="step-navigation4">
						 	 <ul>
                                <li style="padding-left:45px;"><span>Project Details</span></li>
                                <li style="padding-left:40px;"><span>Campaign Details</span></li>
                                <li style="padding-left:35px;"><span>Project Description</span></li>
                                <li style="padding-left:30px;"><span>Additional Media</span></li>
                             	<li style="padding-left:55px;"><span>Perk Addition</span></li>
								<li style="padding-left:40px;"><span>Project Ownership</span></li>
                            </ul>
						</div>
						
						
                      
	
			</div>
            <div class="clear"></div>
            </div> <!-- /block-inner, /block -->
           
      	</div>
      <!--left part for tab-->
	  <div style="float:left;">
	  
	  		<div id="cur_tab">1. Project Details</div>
	  
	  </div>
	  
	 <!--left part for tab-->
	  
	   <div id="nav_forms" class="nav_div">
             <?php
				  		$attributes = array('id'=>'frm_project','name'=>'frm_project','onsubmit'=>'return submit_image_valid()');
						
				 
			echo form_open_multipart('start_project/create', $attributes);
	  ?>
												     
<!--------------Step-1---------------------->
            	<div id="step1" class="div" style="display:block;">
                	
					<div class="inner_content_two">
					
							<div class="form-element-container">
							<div class="form-label">
							<label class="normal_label">Title : *</label>
							</div>
							<input type="text" name="project_title" id="project_title" value="<?php echo $project_title; ?>" size="60" class="btn_input2"/>
							</div>
							<div class="form-element-container">
							 <div class="form-label">
							<label class="normal_label">Category : *</label>
							</div>
						   <select tabindex="4" name="category_id" id="category_id" class="btn_input" >
								<option value="" >Select category</option>
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
								<input type="button" class="next_tab"  border="none"  title="next"/>
							</div>
					
					
					
                </div>
<!--------------Step-2---------------------->
                <div id="step2" class="div" style="display:none;">
               
					<div class="inner_content_two">
					
							
						
						
						<div class="form-element-container">
							<div class="form-label">
							<label class="normal_label">Total Days : *</label>
							</div>
							
							
					<input type="radio"	 name="total_days" id="total_days" value="30" <?php if($total_days=='' || $total_days==30) { ?> checked="checked" <?php } ?>  />30 Days&nbsp;
					<input type="radio"	 name="total_days" id="total_days" value="60" <?php if($total_days==60) { ?> checked="checked" <?php } ?> />60 Days&nbsp;
					<input type="radio"	 name="total_days" id="total_days" value="90" <?php if($total_days==90) { ?> checked="checked" <?php } ?> />90 Days&nbsp;
					<input type="radio"	 name="total_days" id="total_days" value="120" <?php if($total_days==120) { ?> checked="checked" <?php } ?> />120 Days&nbsp;
						
						</div>
							
							
						
						
						<div class="form-element-container">
							<div class="form-label">
							<label class="normal_label">Fund goal(<?php echo $site_setting['currency_symbol']; ?>) : *</label>
							</div>
							<input type="text" name="amount" id="amount" size="10" class="btn_input" value="<?php echo $amount; ?>"/>
						  
						</div>
					
					
					
                    </div>
                    
                    
                    
					<div class="inner_content_two">                 
                    
                    
					  
					   <div class="form-element-container">
						<div class="form-label">
							<label class="normal_label">City : *</label>
							</div>
							<input type="text" name="project_city" id="city_text" size="10" class="btn_input" value="<?php echo $project_city; ?>"/>
					  </div>
					  
					   <div class="form-element-container">
						<div class="form-label">
							<label class="normal_label">State : *</label>
							</div>
							<input type="text" name="project_state" id="state_text" class="btn_input" size="10" value="<?php echo $project_state; ?>"/>
					  </div>
					  
					   <div class="form-element-container">
						<div class="form-label">
							<label class="normal_label">Country : *</label>
							</div>
							<input type="text" name="project_country" id="country_text" class="btn_input" size="10" value="<?php echo $project_country; ?>"/>
					  </div>
					   
					   
                       
                       
                       
                       
                       
                       
                       
					 
					 
					 </div>
					 
					 
					  <div  style="float: left;padding-left: 200px;margin-right: 20px;">
							<input type="button" class="back_tab" id="back_tab" border="none"  title="back"/>
						</div>
						  <div class="form-element-container" style="margin-left:150px;">
							<input type="button" class="next_tab"  border="none"  title="next"/>
						</div>
				   	 
                 </div>
<!--------------Step 3---------------------->                 
                <div id="step3" class="div" style="display:none;">
               
			   		<div class="inner_content_two">
					
			 	 						
				
				
				 <div class="form-element-container">
                  	<div class="form-label">
                        <label class="normal_label">Project Summary : *</label>
                        </div>
						
						<textarea name="project_summary" id="project_summary" class="btn_textarea" onKeyDown="limitText(this.form.project_summary,this.form.countdown,95);" onKeyUp="limitText(this.form.project_summary,this.form.countdown,95);" ><?php echo $project_summary; ?></textarea>
						
						<br/><div style="margin-left:150px;" ><font  style="font-size:12px;">(Maximum characters: 95)
You have <input readonly type="text" name="countdown" value="95" class="normal_label" style="border:none; width:15px;"> characters left.</font></div>
						
						</div>
				
				
				
               <div class="form-element-container">
                 
                        <label class="normal_label">Project Description : *</label>						
						 
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
					
					<div  style="float: left;padding-left: 200px;margin-right: 20px;">
                    	<input type="button" class="back_tab" id="back_tab" border="none"  title="back"/>
                    </div>
<div class="form-element-container" style="margin-left:150px;">
                    	<input type="button" class="next_tab" border="none"  title="next"/>
                    </div>
					
                </div>
<!--------------step-4---------------------->
                <div id="step4" class="div" style="display:none;">
                <script language="javascript" type="text/javascript">
						function append_div2()
						{
							var tmp_div2 = document.createElement("div");
							tmp_div2.className = "inner_content_two";
							tmp_div2.innerHTML = document.getElementById('more2').innerHTML;
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
							parent.document.getElementById('add_more2').style.height='auto';
							document.getElementById('video_set').value='0';
							
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
					
					
					
					
					
					</script>
					
					
				<div class="inner_content_two">
				
					<div class="form-element-container">
						<div class="form-label">
							<label class="all_text">Set Display Page : </label>
							</div>
							
				<input type="radio" name="projectimagevideoset" id="projectimagevideoset" value="0"  onclick="setimagevideo(this.value)" <?php if($projectimagevideoset=='' || $projectimagevideoset==0 ) { ?> checked="checked" <?php } ?> />Project Image 			&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="radio" name="projectimagevideoset" id="projectimagevideoset" value="1" <?php if($projectimagevideoset==1) { ?> checked="checked" <?php } ?> onclick="setimagevideo(this.value)" />Project Video
					</div>
				</div>
					
					
				<div class="inner_content_two" id="thirdparty"  style="display:none;">
					
					
			
				<div class="form-element-container">
                  	<div class="form-label">
                        <label class="all_text">video Url : </label>
                        </div>
                        <textarea name="video" id="video" class="btn_textarea"  ><?php echo $video; ?></textarea>
												
					<br/><div style="margin-left:150px;" >Paste the Full Video Page URL for your 3rd party video here.<br/>
					
				<b>Or</b> For Custom Video <span onclick="showcustomvideo()" style="font-weight:bold; cursor:pointer; color:#009900;">Click here</span>.</div>
                  </div>
				  
				  
				 
				  </div>
				  
				 
				  <div class="inner_content_two" id="custom_video" style="display:none;">
				   
				  <div class="form-element-container">
                  	<div class="form-label">
                        <label class="all_text">Custom Video : </label>
                        </div>
                       <input name="videofile" type="file" class="" id="videofile" value="<?php echo $videofile; ?>" />
					   
					<br/><div style="margin-left:150px;">You can upload a custom video here.<br/>
					
					<b>Or</b> For 3rd Party Video <span onclick="thirdpartyvideo()" style="font-weight:bold; cursor:pointer; color:#009900;">Click here</span>.
					
					</div>
					   
					   
                  </div>
				  
				  </div>
				
				
				 
				
			<div id="add_more2" style="display:block;"> 
				
				 <div id="more2"  class="inner_content_two">
				  
					  <div class="form-element-container">
						<div class="form-label">
							<label  class="all_text">Gallery : *</label>
							</div>
						   <input   name="file_up[]" type="file" class="" id="file_up" />
					 </div>
                  
				</div>
				
				</div>
				
				
			<div id="add_button" style="display:block;"><img src="<?php echo base_url(); ?>images/add.png" height="16" width="16" border="0" title="Add More" onclick="append_div2();" style="cursor:pointer;" />
			
			
			<?php if($video_set=='' || $video_set==0) { ?>
			<input type="hidden" name="video_set" id="video_set" value="0" />
			<?php } else { ?>
			<input type="hidden" name="video_set" id="video_set" value="<?php echo $video_set; ?>" />
			<?php } ?>
			</div>
					
					
					<div  style="float: left;padding-left: 200px;margin-right: 20px;">
                    	<input type="button" class="back_tab" id="back_tab" border="none"  title="back"/>
                    </div>
                  <div class="form-element-container" style="margin-left:150px">
                    	
						<input type="button" class="next_tab" border="none"  title="next"/>
                    </div> 
					
               </div>
<!--------------step-5----------------------> 
					
				<div id="step5" class="div" style="display:none;">
					<script language="javascript" type="text/javascript">
						function append_div()
						{
							var tmp_div = document.createElement("div");
							tmp_div.className = "inner_content_two";
							tmp_div.innerHTML = document.getElementById('more').innerHTML;
							document.getElementById('add_more').appendChild(tmp_div);
							
							var myVerticalSlide = new Fx.Slide('add_more');
							myVerticalSlide.slideIn();
						}
					</script>
					<div id="add_more">
					<div id="more" class="inner_content_two">
				
						<div class="form-element-container">
							<div class="form-label">
								<label class="all_text">Perk Title : *</label>
							</div>
							<input type="text" name="perk_title[]" id="perk_title"  class="btn_input" />
						</div>
						<div class="form-element-container">
							<div class="form-label">
								<label class="all_text">Perk Description : *</label>
							</div>
							<textarea name="perk_description[]" id="perk_description"  class="btn_textarea"></textarea>
						</div>
						<div class="form-element-container">
							<div class="form-label">
								<label class="all_text">Perk Amount(<?php echo $site_setting['currency_symbol']; ?>) : *</label>
							</div>
							<input type="text" name="perk_amount[]" id="perk_amount"  class="btn_input1" />
						</div>
						<div class="form-element-container">
							<div class="form-label">
								<label class="all_text">Total Claim : *</label>
							</div>
							<input type="text" name="perk_total[]" id="perk_total"  class="btn_input1" />
						</div>
					</div>
					
					</div>
					
					<div><img src="<?php echo base_url(); ?>images/add.png" height="16" width="16" border="0" title="Add More" onclick="append_div();" style="cursor:pointer;" /></div>
					
					
					
					<div  style="float: left;padding-left: 200px;margin-right: 20px;">
                    	<input type="button" class="back_tab" id="back_tab" border="none"  title="back"/>
                    </div>
<div class="form-element-container" style="margin-left:150px;">
                    	<input type="button" class="next_tab" border="none"  title="next"/>
                    </div>
					
					
				
					
					
					
				</div>  
	<!--------------step-5----------------------> 	
	
	
	
	<!--------------step-6---------------------->
                <div id="step6" class="div" style="display:none;">
				
				<div class="inner_content_two">
				
						<div class="form-element-container">
							<div class="form-label">
								<label class="all_text">First Name : *</label>
							</div>
							<input type="text" name="user_name" id="user_name" value="<?php echo $user_name; ?>" class="btn_input"  />
						</div>
						
						
						<div class="form-element-container">
							<div class="form-label">
								<label class="all_text">Last Name : *</label>
							</div>
							<input type="text" name="last_name" id="last_name" value="<?php echo $last_name; ?>"  class="btn_input" />
						</div>
						
						
						<div class="form-element-container">
							<div class="form-label">
								<label class="all_text">Email : *</label>
							</div>
							<input type="text" name="email" id="email" value="<?php echo $email; ?>"  class="btn_input" />
							<br/>
							<div  style="margin-left:150px;" >A valid e-mail address. All e-mails from the system will be sent to this address.<br />
 The e-mail address is not made public and will only be used if you wish to receive<br />
 a new password or wish to receive certain news or notifications by e-mail.</div>
						</div>
						
						
						<div class="form-element-container">
							<div class="form-label">
								<label class="all_text">Password : *</label>
							</div>
							<input type="password" name="password" id="password" value="<?php echo $password; ?>"  class="btn_input" />
							
						</div>
						
						
						<div class="form-element-container">
							<div class="form-label">
								<label class="all_text">Confirm Password : *</label>
							</div>
							<input type="password" name="cpassword" id="cpassword" value="<?php echo $password; ?>"  class="btn_input" />
							
						</div>
						
									
				</div>
				
				
				<div class="inner_content_two">
				
				
						<div class="form-element-container">
									<div class="form-label" style="width:320px;">
										<label class="all_text" style=" font-size:15px;">You are nearly ready to launch your project!</label>
										</div>
										<br/><br/>

						</div>
						
						<div style="clear:both;"></div>
				
				
						<div class="form-element-container">
									<div class="form-label" style="width:30px;">
										<label class="all_text">&nbsp;</label>
										</div>
						<?php
								$p = array('src'=>'image/securimage','style'=>'padding-bottom:0px;');
								echo img($p, TRUE);
								?><br /><br />
								
						</div>
					
					
						<div class="form-element-container">
							<div class="form-label" style="width:30px;">
								<label class="all_text">&nbsp;</label>
							</div>
							<input type="text" name="imagecode" id="imagecode"  class="btn_input"   />
						</div>
						
						
						<div class="form-element-container">
							<div class="form-label" style="width:30px;">
								<label class="all_text">&nbsp;</label>
							</div>
						<input type="checkbox" name="agree" id="agree" style=" width:12px; height:12px;"/>&nbsp;&nbsp;
					
		 <a href="#" style="font-size:13px;color:#7DBF0F; font-weight:bold;" onclick="terms();"><?php echo $this->home_model->text_echo('I agree with Terms and Conditions.'); ?></a>
		 
		 				</div>
				
				
				</div>
				
					
					<div  style="float:left;padding-left: 200px;margin-right:20px;">
						<input type="button" class="back_tab" id="back_tab" border="none"  title="back"/>
					</div>
					<div class="form-element-container" style="margin-left:150px">
						<input type="submit" value="" class="finish" border="none"  title="finish" />
					</div> 
				</div>
				
		<!--------------step-6---------------------->				
				
				
				 <div id="err1"></div>    
				 
				  <div id="err2"></div>   
				  
				   <div id="err3"></div>               
                         
                </div>
               
               
            </form>
       </div>     
    </div>
</div>


<script type="text/javascript">
function terms()
{
window.open('<?php echo site_url('/home/terms_and_conditions');?>','Terms and Conditions','height=500,width=500,top=250,left=300');
}
</script>





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