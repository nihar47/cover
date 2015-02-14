	  
<div data-role="header" data-position="inline">
	<h1><?php echo "Edit Project"; ?></h1>
	<?php echo anchor('home','Home','class="ui-btn-left"'); ?>
	<?php // echo anchor(base_url(),'Home','class="ui-btn-left"'); ?>
	<?php  // error_reporting(0); if($this->session->userdata['project_id']!='' && $this->session->userdata['project_id']!=0) {  ?>
		
	 <?php echo anchor('user/my_project/',CHANGE_PROJECT,'class="ui-btn-right"'); ?>
</div>
<div class="pad15">
  <div class="clear"></div>
				        
			 		<?php if($error!='') { ?>	<div class="error" align="center"> <?php echo $error; ?></div>  <?php } ?>
					<div class="clear"></div>
						
					<div id="err1"></div>
					  <div id="err2"></div>
					  <div id="err3"></div>
						
						<div class="clear"></div> 

	<div id="s1postJ">
	</div>
	
		

<script type="text/javascript" language="javascript">
	function set_color(ele, color)
	{
		var all_ele = document.getElementById('colors').getElementsByTagName('span');//[0].style.border = "none";
		for(i=0;i<all_ele.length;i++)
		{
			all_ele[i].style.border = "none";
		}
		ele.style.border = "2px solid #000000";
		document.getElementById('color').value = color;
	}
	
	function show_div()
	{
	if(document.getElementById('radio1').checked == true)
		{
			document.getElementById('first').style.display = "block";
			document.getElementById('first1').style.display = "block";
			document.getElementById('second').style.display = "none";
			document.getElementById('second1').style.display = "none";
			document.getElementById('action').value = "upload";
		}
		else{
			document.getElementById('first').style.display = "none";
			document.getElementById('first1').style.display = "none";
			document.getElementById('second').style.display = "block";
			document.getElementById('second1').style.display = "block";
			document.getElementById('action').value = "video";
		}
	}
</script>

<div id="container">
<div class="wrap930" style="padding:15px 0px 20px 0px;">	
<div class="con_left2" style="min-height:0px; margin-right:0px;">
<style type="text/css">
#tab_all a{ color:#000000; text-decoration:none; }
</style>				
<div class="inner_content" style=" margin-top:11px;padding:12px; ">	

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
								if( t1=='avi' || t1=='mp3' || t1=='flv'){
								
								check=true;
								
								}else{
								
								check=false;
								i=0;												
								var dv = document.getElementById('err2');
								dv.className = "error";
								dv.style.clear = "both";
								dv.style.minWidth = "110px";
								dv.style.margin = "5px";
								dv.innerHTML = '<?php echo VIDEO_REQUIRED; ?>';
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
								dv.innerHTML = '<?php echo VIDEO_URL_REQUIRED; ?>';
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
function filename(name)
{
//	alert(name);
	document.getElementById('file_name').value=name.replace("C:\\fakepath\\","");

}
</script>	 
<script type="text/javascript">
	
<?php if($project_draft==0) { ?>
	$(function() {
		$( "#slider-range-max" ).slider({
			range: "max",
			min: <?php echo $site_setting['project_min_days'];?>,
			max: <?php echo $site_setting['project_max_days'];?>,
			value: <?php echo $total_days; ?>,
			slide: function( event, ui ) {
				$( "#total_days" ).val( ui.value );
				
			}
		});
		$( "#total_days" ).val( $( "#slider-range-max" ).slider( "value" ) );
		
	});
<?php } ?>	
	
	
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

      
                  
                    <?php
										
						if($project_title=='') { redirect('home/dashboard/');  } 
				 		$attributes = array('name'=>'frm_project','onsubmit'=>'return submit_image_valid()');
						echo form_open_multipart('project/update_project_mobile/'.$this->session->userdata('project_id'),$attributes);
				  ?>
				
	<div class="inner_content_two" >		
						
 				
				 <div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">				
				        <label class="ui-input-text" for="project_title"><?php echo PAGE_TITLE; ?> *</label>
				         <input type="text" name="project_title" id="project_title"  value="<?php echo $project_title; ?>" class="btn_input2" />
						<input type="hidden" name="project_id" id="project_id" value="<?php echo $project_id; ?>"  />
                 </div>
							 
							 
				 <div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">	
				<label class="ui-input-text" for="amount"><?php echo GOAL.'('.$site_setting['currency_symbol'].')'; ?>  *</label>
					<?php if($project_draft==0) { ?>
						   <input type="text" name="amount" id="amount" value="<?php echo $amount; ?>" />
						   <?php } else {  ?>
						
						  <label class="ui-input-text" for="amount">  <?php echo $amount; ?></label>
						      <input type="hidden" name="amount" id="amount" value="<?php echo $amount; ?>" />
						   <?php   } ?>	
				</div>
                         
						 
				<div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">							
				        <label class="ui-input-text" for="CATEGORY"><?php echo CATEGORY; ?> :&nbsp;</label>
					<select tabindex="4" name="category_id" id="category_id" class="btn_input" style="text-transform:capitalize;">
						<option value="" > -- <?php echo SELECT_CATEGORY; ?> -- </option>
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
				
					<input type="hidden" name="status" id="status" value="<?php echo $status; ?>" />
					<?php if($project_draft==0) { ?>
						 <fieldset data-role="controlgroup">
					<legend><?php echo PROJECT_STATUS; ?></legend>
						<input type="radio" name="save_draft" id="radio-choice-1" value="0" <?php if($project_draft==0) { ?> checked="checked" <?php } ?> />					<label for="radio-choice-1"><?php echo SAVE_IN_DRAFT; ?></label>
						<input type="radio" name="save_draft" id="radio-choice-2" value="1" <?php if($project_draft==1) { ?> checked="checked" <?php } ?> />					<label for="radio-choice-2"><?php echo POST_PROJECT; ?></label>
				</fieldset>
						<?php } else { ?>
					<div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">					
					    <label class="ui-input-text" for="PROJECT_STATUS"><?php echo PROJECT_STATUS; ?> :&nbsp;</label>
					<b><?php if($active==1 || $active=='1') {?>Active<?php } elseif($active==2 || $active=='2') { ?>Declined<?php } else { ?>Pending Approval<?php }?></b>
					<input type="hidden" name="save_draft" id="save_draft" value="1" />
					<div class="clear"></div>
               </div>
				<?php }?>
				  <input type="hidden" name="active" id="active" value="<?php echo $active; ?>" />
					
					<div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">	
					<label class="ui-input-text" for="TOTAL_DAYS"><?php echo TOTAL_DAYS; ?> : *</label>
								<?php if($project_draft==0) { ?>
						<div id="slider-range-max"></div>	<input type="text" id="total_days" name="total_days" style="border:0;background:none; width:20px;" />&nbsp;<?php echo DAYS; ?>
					</div>
						   <?php } else { ?>
						    	<?php echo $total_days; ?> <?php echo DAYS; ?>
						      <input type="hidden" name="total_days" id="total_days" value="<?php echo $total_days; ?>" />
						   <?php } ?>
					</div>		
				  
  	
		<div class="inner_content_two" >
		
				   <div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">	
							<label class="ui-input-text" for="project_city"><?php echo CITY ; ?>  : *</label>
							<input type="text" name="project_city" id="city_text" size="10" class="btn_input" value="<?php echo $project_city; ?>"/>
					  </div>
					  
					   <div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">	
						<label class="ui-input-text" for="state_text"><?php echo STATE ; ?> : *</label>
						<input type="text" name="project_state" id="state_text" class="btn_input" size="10" value="<?php echo $project_state; ?>"/>
					  </div>
					  
					   <div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">	
						<label class="ui-input-text" for="project_country"><?php echo COUNTRY; ?> : *</label>
					  <input type="text" name="project_country" id="country_text" class="btn_input" size="10" value="<?php echo $project_country; ?>"/>						</div>
					  
					   <div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">	
						<label class="ui-input-text" for="p_google_code"><?php echo GOOGLE_ANALYTICAL_CODE; ?> :</label>
						<input type="text" name="p_google_code" id="p_google_code" class="btn_input" size="10" value="<?php echo $p_google_code;?>"/>							 (Ex :: UA-23165973-1)	</div>
	</div>			
	
	
				
	
                  
</div>

	<div class="inner_content_two" id="thirdparty" style="display:<?php if($video_set=='' || $video_set==0) { ?>block<?php } else { ?>none<?php } ?>;" >
					
				<div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
                  	
                        <label class="ui-input-text" for="video"><?php echo VIDEO_URL; ?> : *</label>
                        <textarea name="video" id="video" class="btn_textarea"  ><?php echo $video; ?></textarea>
					<br/>
                  </div>
					 
</div>

	<div class="inner_content_two" id="custom_video" style="display:<?php if($video_set==1) { ?> block <?php } else { ?> none <?php } ?>;"  >
				   
		  <div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
                  	<div class="form-label">
                        <label class="all_text"><?php echo CUSTOM_VIDEO; ?> : *</label>
                        </div>
                       <div style="float:left; margin-left: 300px;"> <input name="videofile" type="file" class="" id="videofile" /></div>
					   <input type="hidden" name="prev_videofile" id="prev_videofile" value="<?php echo $videofile; ?>" /> 
					    <input type="hidden" name="prev_project_image" id="prev_project_image" value="<?php echo $image; ?>" />
					   
					<br/><div style="margin-left:300px;"><?php echo UPLOAD_CUSTOM_VIDEO_HERE; ?>.<br/>
					
					<b><?php echo OR_TEXT; ?></b> <?php echo FOR_3RD_PARTY_VIDEO;?> <span onclick="thirdpartyvideo()" style="font-weight:bold; cursor:pointer; color:#009900;"><?php echo CLICK_HERE; ?></span>.
					
					</div>
					   
					   
                  </div>
				  
	</div>
	<div class="inner_content_two" >


	 <div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
                  
                        <label class="ui-input-text" for="project_summary"><?php echo PROJECT_SUMMARY;?> : *</label>
                     	
						<textarea name="project_summary" id="project_summary" class="btn_textarea" onKeyDown="limitText(this.form.project_summary,this.form.countdown,95);" onKeyUp="limitText(this.form.project_summary,this.form.countdown,95);" ><?php echo $project_summary; ?></textarea>
						
						<br/><div><font style="font-size:12px;">(<?php echo MAX_CHARACTER; ?>: 95)
<?php echo YOU_HAVE_TEXT;?> <input readonly type="text" name="countdown" id="countdown" value="" class="normal_label" style="border:none; width:15px;"> <?php echo CHAR_LEFT_TEXT;?>.</font></div>
						</div>
				
	<div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
                  
                        <label class="ui-input-text" for="description"><?php echo PROJECT_DESCRIPTION;?> : *</label>
                     	
						<textarea name="description" id="content" class="btn_textarea"><?php echo $description; ?></textarea>
						</div>			
		
				


</div>
	<div class="clear"></div>	


			<input type="hidden" name="video_set" id="video_set" value="0" />
		

<div class="clear"></div>	
			<div align="center">
		<input type="submit" name="submit" id="submit" value="<?php echo UPDATE; ?>" class="submit" />
		<input type="hidden" name="project_id" id="project_id" value="<?php echo $project_id; ?>" />
       
        <input type="hidden" name="url_project_title" id="url_project_title" value="<?php echo $url_project_title; ?>" />
		</div>
			
				<div class="clear"></div>		
				
			
			</form>



</div>
			
			
			<div class="clear"></div>		
				
					</div>
	<!-- left end ------>
		
       </div>
   
	<script type="text/javascript">
	
document.getElementById('countdown').value=95 - document.getElementById('project_summary').value.length;
	
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
		
			document.getElementById('more2').style.display='block';	
			document.getElementById('custom_video').style.display='none';
			document.getElementById('thirdparty').style.display='none';
			document.getElementById('video_set').value='0';	
			document.projectimagevideoset[0].checked=true;	
		
	}
	
	if(viset=='1')
	{
		if(videoup=='1')
		{
			document.getElementById('custom_video').style.display='block';
			document.getElementById('thirdparty').style.display='none';
			document.getElementById('video_set').value='1';
			document.getElementById('more2').style.display='none';	
			document.projectimagevideoset[1].checked=true;
		}
		else
		{
			document.getElementById('more2').style.display='none';	
			document.getElementById('custom_video').style.display='none';
			document.getElementById('thirdparty').style.display='block';
			document.getElementById('video_set').value='0';	
			document.projectimagevideoset[1].checked=true;	
		
		}
		
	}
	
}





window.onload= function() {  
 
 setvideoup();
 
 };
 

 </script>
	

</div>	