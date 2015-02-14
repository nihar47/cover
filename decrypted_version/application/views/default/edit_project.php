<div id="headerbar">
  <div class="wrap930">
    <!-- dd menu -->
    <div class="login_navl">
      <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
          <td align="left" ><div class="project_title_hd" style="padding-top:15px;" > <span style="text-transform:capitalize;color:#2B5F94;font-size:17px;"><?php echo $this->session->userdata('project_title'); ?> :: </span> <span style="color:#000000; font-weight:500; font-size:13px; text-transform:capitalize;"><?php echo CUSTOMIZE_PAGE; ?></span> </div></td>
          <td align="right" ><div class="project_title_hd" style="padding-top:15px; "  > <span id="sddm" style="float:right;">
              <?php if($this->session->userdata['project_id']!='' && $this->session->userdata['project_id']!=0) {  ?>
              <?php echo anchor('user/my_project/',CHANGE_PROJECT,' style="text-transform:capitalize;color:#2B5F94;font-size:17px;text-decoration:none;" '); ?>
              <?php } ?>
              </span> </div></td>
        </tr>
      </table>
    </div>
    <div class="clear"></div>
  </div>
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
	
function getstate(countryid)
{
	if(countryid=='')
	{
		return false;
	}
	
		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else if(window.ActiveXObject) {
			try {
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
			} catch (e) {
				try {
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (e) {
					xmlhttp = false;
				}
			}
		}
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById('state_div').innerHTML= xmlhttp.responseText;
				getallcity(countryid);
			}
		}
		
		var url = '<?php echo site_url('start_project/getstate'); ?>/'+countryid;
		
		xmlhttp.open("GET",url,true);
		xmlhttp.send(null);
	
}
function getcity(stateid)
{
	
	if(stateid=='')
	{
		return false;
	}
	
		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else if(window.ActiveXObject) {
			try {
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
			} catch (e) {
				try {
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (e) {
					xmlhttp = false;
				}
			}
		}
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById('city_div').innerHTML= xmlhttp.responseText;
			}
		}
		
		var url = '<?php echo site_url('start_project/getcity'); ?>/'+stateid;
		
		xmlhttp.open("GET",url,true);
		xmlhttp.send(null);
	
}

function getallcity(countryid)
{
	
	
		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else if(window.ActiveXObject) {
			try {
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
			} catch (e) {
				try {
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (e) {
					xmlhttp = false;
				}
			}
		}
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById('city_div').innerHTML= xmlhttp.responseText;
			}
		}
		
		var url = '<?php echo site_url('start_project/getallcity'); ?>/'+countryid;
	
		
		xmlhttp.open("GET",url,true);
		xmlhttp.send(null);
	
}

</script>
<div id="container">
<div class="wrap930" style="padding:15px 0px 20px 0px;">
  <!--side bar user panel-->
  <?php echo $this->load->view('default/dashboard_sidebar'); ?>
  <!--side bar user panel-->
  <div class="con_left2" style="min-height:0px; width:690px; margin-right:0px;">
    <style type="text/css">

#tab_all a{ color:#000000; text-decoration:none; }

</style>
    <div id="tab_all" style=" margin-left:10px;"> <?php echo anchor('home/dashboard/'.$this->session->userdata('project_id'),'<h3 class="h3notsel">'.OVERVIEW.'</h3>'); ?> <?php echo anchor('project/updates/'.$this->session->userdata('project_id'), '<h3 class="h3sel">'.UPDATES.'</h3>'); ?> <?php echo anchor('project/comments/'.$this->session->userdata('project_id'),'<h3 class="h3sel">'. COMMENTS.'</h3>'); ?> <?php echo anchor('project/donations/'.$this->session->userdata('project_id'),'<h3 class="h3sel">'. DONATIONS.'</h3>'); ?> <?php echo anchor('project/perks/'.$this->session->userdata('project_id'),'<h3 class="h3sel">'. PERKS.'</h3>'); ?> <?php echo anchor('project/project_gallery/'.$this->session->userdata('project_id'),'<h3 class="h3sel">'.GALLERY.'</h3>'); ?> <?php echo anchor('project/widgets/'.$this->session->userdata('project_id'),'<h3 class="h3sel">'. WIDGETS.'</h3>'); ?> <?php echo anchor('project/share/'.$this->session->userdata('project_id'),'<h3 class="h3sel">'. SHARE.'</h3>'); ?> &nbsp; </div>
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
	
	
	if(projectimagevideoset=='')
	{
			
			check=false;
			var dv = document.getElementById('err3');
			dv.className = "error";
			dv.style.clear = "both";
			dv.style.minWidth = "110px";
			dv.style.margin = "5px";
			dv.innerHTML = '  <?php echo PLEASE_SELECT_DISPLAY_PAGE; ?>';
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
			
			
			if(document.getElementById('prev_project_image').value == "")
			{
				if(document.getElementById('file_up').value == "")
				{
					i=0;
						
						check=false;
						var dv = document.getElementById('err1');
						dv.className = "error";
						dv.style.clear = "both";
						dv.style.minWidth = "110px";
						dv.style.margin = "5px";
						dv.innerHTML = '  <?php echo IMAGE_REQUIRED; ?>';
						return false;
						
						
						
					
				}
				else{
				
						value = document.getElementById('file_up').value;
						t1 = value.substring(value.lastIndexOf('.') + 1,value.length);
						
						if( t1=='jpg' || t1=='jpeg' || t1=='gif' || t1=='png'){
						
							//document.frm_project.submit();
							check=true;
							
						}else{
						
						check=false;
						i=0;
						var dv = document.getElementById('err1');
	
						dv.className = "error";
						dv.style.clear = "both";
						dv.style.minWidth = "110px";
						dv.style.margin = "5px";
						dv.innerHTML = '  <?php echo IMAGE_TYPE_NOT_VALID; ?>';
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
      <script type="text/javascript" src="<?php echo base_url(); ?>js2/jquery-1.5.js"></script>
      <style>
	
	</style>
      <link type="text/css" href="<?php echo base_url(); ?>counter/css/ui-lightness/jquery-ui-1.8.18.custom.css" rel="stylesheet" />
      <script type="text/javascript" src="<?php echo base_url(); ?>counter/js/jquery-1.7.1.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url(); ?>counter/js/jquery-ui-1.8.18.custom.min.js"></script>
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
						echo form_open_multipart('project/update_project/'.$this->session->userdata('project_id'),$attributes);
				  ?>
      <!--<form>-->
      <div class="clear"></div>
      <?php if($error!='') { ?>
      <div class="error" align="center"> <?php echo $error; ?></div>
      <?php } ?>
      <div class="clear"></div>
      <div id="err1"></div>
      <div id="err2"></div>
      <div id="err3"></div>
      <div class="clear"></div>
      <div class="inner_content_two" >
        <div class="form-element-container">
          <div class="form-label">
            <label class="normal_label"><?php echo PAGE_TITLE; ?> :&nbsp;* </label>
          </div>
          <input type="text" name="project_title" id="project_title"  value="<?php echo $project_title; ?>" class="btn_input2" />
          <input type="hidden" name="project_id" id="project_id" value="<?php echo $project_id; ?>"  />
        </div>
        <div class="form-element-container">
          <div class="form-label">
            <label class="normal_label"><?php echo GOAL.'('.$site_setting['currency_symbol'].')'; ?> :&nbsp;* </label>
          </div>
          <?php if($project_draft==0) { ?>
          <input type="text" name="amount" id="amount" value="<?php echo $amount; ?>" />
          <?php } else {  ?>
          <?php echo $amount; ?>
          <input type="hidden" name="amount" id="amount" value="<?php echo $amount; ?>" />
          <?php   } ?>
        </div>
        <div class="form-element-container">
          <div class="form-label">
            <label class="normal_label"><?php echo CATEGORY; ?> :&nbsp;</label>
          </div>
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
        <div class="form-element-container">
          <div class="form-label">
            <label class="normal_label"><?php echo PROJECT_STATUS; ?> :&nbsp;</label>
          </div>
          <table border="0">
            <tr>
              <td align="left" valign="top"><input type="radio" name="save_draft" id="save_draft" value="0" <?php if($project_draft==0) { ?> checked="checked" <?php } ?> /></td>
              <td align="left" valign="top"><?php echo SAVE_IN_DRAFT; ?></td>
              <td align="left" valign="top"><input type="radio" name="save_draft" id="save_draft" value="1" <?php if($project_draft==1) { ?> checked="checked" <?php } ?> /></td>
              <td align="left" valign="top"><?php echo POST_PROJECT; ?></td>
            </tr>
          </table>
          <div class="clear"></div>
        </div>
        <?php } else { ?>
        <div class="form-element-container">
          <div class="form-label">
            <label class="normal_label"><?php echo PROJECT_STATUS; ?> :&nbsp;</label>
          </div>
          <b>
          <?php if($active==1 || $active=='1') {?>
          Active
          <?php } elseif($active==2 || $active=='2') { ?>
          Declined
          <?php } else { ?>
          Pending Approval
          <?php }?>
          </b>
          <input type="hidden" name="save_draft" id="save_draft" value="1" />
          <div class="clear"></div>
        </div>
        <?php }?>
        <input type="hidden" name="active" id="active" value="<?php echo $active; ?>" />
        <div class="form-element-container">
          <div class="form-label">
            <label class="normal_label"><?php echo TOTAL_DAYS; ?> : *</label>
          </div>
          <?php if($project_draft==0) { ?>
          <div style="width:300px; float:left">
            <div id="slider-range-max" style="width:205px;"></div>
            <input type="text" id="total_days" name="total_days" style="border:0;background:none; width:20px;" />
            &nbsp;<?php echo DAYS; ?> </div>
       
       
        <?php } else { ?>
        <?php echo $total_days; ?> <?php echo DAYS; ?>
        <input type="hidden" name="total_days" id="total_days" value="<?php echo $total_days; ?>" />
        <?php } ?>
         </div>
        <div class="clear"></div>
      <br />  	
        
   <?php 
    $paypal= adaptive_paypal_detail();
    if($site_setting['enable_funding_option'] == '1'){   ?>
                       
             <div class="form-element-container">
              <div class="form-label">
                <label class="normal_label"><?php echo PROJECT_TYPE ; ?> : *</label>
              </div>
               	<?php if($active=='0' and $active_cnt=='0'){  ?>	 
                    <input type="radio" name="payment_type" id="payment_type1" value="0" <?php if($payment_type==0){  echo 'checked="checked"'; } ?>/>
                    &nbsp;<?php echo FIXED; ?>
                    
                      <input type="radio" name="payment_type" id="payment_type2" value="1" <?php if($payment_type==1){  echo 'checked="checked"'; } ?> style="margin-left:25px;"/>
                    &nbsp;<?php echo FLEXIBLE; ?>
                    
                  <?php  }
				  else{ if($payment_type==0){  echo  FIXED.' '.PROJECT;  } else{ echo  FLEXIBLE.' '.PROJECT;   } 
				  		?> <input type="hidden" name="payment_type" id="payment_type" value="<?php echo $payment_type; ?>" /><?php
				    }  ?>
            </div>
        <?php  }else{  ?> <input type="hidden" name="payment_type" id="payment_type" value="<?php echo $payment_type; ?>" /><?php } ?>
        
        
      </div>
      
      
      <div class="inner_content_two" >
      	<div class="form-element-container">
          <div class="form-label">
            <label class="normal_label"><?php echo COUNTRY; ?> : *</label>
          </div>
         <!-- <input type="text" name="project_country" id="country_text" class="btn_input" size="10" value="<?php //echo $project_country; ?>"/>-->
       	  <select tabindex="5" name="project_country" id="project_country" class="btn_input" onchange="getstate(this.value)" style="text-transform:capitalize;">
            <option value=""> -- <?php echo SELECT_COUNTRY; ?> -- </option>
            <?php
				
						foreach($countrylist as $row){
							if($project_country == $row->country_id)
							{
							echo "<option value='".$row->country_id."' selected='selected'>".$row->country_name."</option>";
							}
							else
							{
							echo "<option value='".$row->country_id."'>".$row->country_name."</option>";
							}
						}
					?>
          </select>
        </div>
     	<div class="form-element-container">
          <div class="form-label">
            <label class="normal_label"><?php echo STATE ; ?> : *</label>
          </div>
          <!--<input type="text" name="project_state" id="state_text" class="btn_input" size="10" value="<?php //echo $project_state; ?>"/>--><div id="state_div">	
          <select tabindex="5" name="project_state" id="project_state" class="btn_input" style="text-transform:capitalize;" onchange="getcity(this.value)">
              <option value="" > -- <?php echo SELECT_STATE; ?> -- </option>
              <?php
						
						if($project_state =='No State'){
							echo "<option value=''  selected='selected'>".NO_STATES."</option>";
						}
						else{
							foreach($statelist as $st){
							
							
							if($project_state == $st->state_id)
							{
								echo "<option value='".$st->state_id."'  selected='selected'>".$st->state_name."</option>";
								}
	
								else
								{
								echo "<option value='".$st->state_id."'  >".$st->state_name."</option>";
								}
								
								
							}
						}
					?>
            </select>
         </div>
        </div>
        <div class="form-element-container">
          <div class="form-label">
            <label class="normal_label"><?php echo CITY ;?> : *</label>
          </div>
         <!-- <input type="text" name="project_city" id="city_text" size="10" class="btn_input" value="<?php //echo $project_city; ?>"/>-->	<div id="city_div"> 		
         <select tabindex="5" name="project_city" id="project_city" class="btn_input" style="text-transform:capitalize;">
            <option value=""> -- <?php echo SELECT_CITY; ?> -- </option>
            <?php
						if($project_city =='No City'){
							echo "<option value=''  selected='selected'>".NO_CITY."</option>";
						}
						else{
							foreach($citylist as $ct){
							
							
							if($project_city ==$ct->city_id)
							{
								echo "<option value='".$ct->city_id."'  selected='selected'>".$ct->city_name."</option>";
								}
	
								else
								{
								echo "<option value='".$ct->city_id."'  >".$ct->city_name."</option>";
								}
								
								
							}
						}
					?>
          </select>
         </div>
        </div>
        
        
        <div class="form-element-container">
          <div class="form-label">
            <label class="normal_label"><?php echo GOOGLE_ANALYTICAL_CODE; ?> : </label>
          </div>
          <input type="text" name="p_google_code" id="p_google_code" class="btn_input" size="10" value="<?php echo $p_google_code; ?>"/>
          (Ex :: UA-23165973-1) </div>
      </div>
      <script type="text/javascript">
	
	
					function showcustomvideo()
					{
						document.getElementById('custom_video').style.display='block';
						document.getElementById('thirdparty').style.display='none';
						document.getElementById('video_set').value='1';
						document.getElementById('more2').style.display='none';	
						
					
					}
					
					function thirdpartyvideo()
					{
						document.getElementById('custom_video').style.display='none';
						document.getElementById('thirdparty').style.display='block';
						document.getElementById('video_set').value='0';
						document.getElementById('more2').style.display='none';	
						
					}
						
					function setimagevideo(set)
					{
						if(set==0)
						{
							document.getElementById('custom_video').style.display='none';
							document.getElementById('thirdparty').style.display='none';
							document.getElementById('more2').style.display='block';	
							
							document.getElementById('video_set').value='0';
							document.getElementById('more2').style.height='auto';
							
							
						}
						if(set==1)
						{
							document.getElementById('custom_video').style.display='none';
							document.getElementById('thirdparty').style.display='block';
							document.getElementById('more2').style.display='none';	
							
							document.getElementById('video_set').value='0';
							
						}
						
					}
					

</script>
      <div class="inner_content_two">
        <div class="form-element-container">
          <div class="form-label">
            <label class="all_text"><?php echo SET_DISPLAY_PAGE ;?>:</label>
          </div>
          <input type="radio" name="projectimagevideoset" id="projectimagevideoset" value="0"  onclick="setimagevideo(this.value)" <?php if($projectimagevideoset=='' || $projectimagevideoset==0 ) { ?> checked="checked" <?php } ?> />
          <?php echo PROJECT_IMAGE;?> &nbsp;&nbsp;&nbsp;&nbsp;
          <input type="radio" name="projectimagevideoset" id="projectimagevideoset" value="1" <?php if($projectimagevideoset==1) { ?> checked="checked" <?php } ?> onclick="setimagevideo(this.value)" />
          <?php echo PROJECT_VIDEO; ?> </div>
      </div>
      <div id="more2"  class="inner_content_two" style="display:block;">
        <div class="form-element-container">
          <div class="form-label">
            <label  class="all_text"><?php echo GALLERY; ?>:*</label>
          </div>
          <div class="file_upload" style="float:left;">
            <input   name="file_up" type="file" class="" id="file_up" value="<?php echo $image; ?>" onchange="return filename(this.value);" style="float:left; "/>
          </div>
          <div style="float:left; margin-left:10px;">
            <input type="text" name="file_name" id="file_name"readonly="readonly" style="border:none; background-color:#fafafa;"/>
          </div>
          <div class="clear"></div>
          <input type="hidden" name="prev_project_image" id="prev_project_image" value="<?php echo $image; ?>" />
        </div>
      </div>
      <div class="inner_content_two" id="thirdparty" style="display:<?php if($video_set=='' || $video_set==0) { ?>block<?php } else { ?>none<?php } ?>;" >
        <div class="form-element-container">
          <div class="form-label">
            <label class="all_text"><?php echo VIDEO_URL; ?> : *</label>
          </div>
          <textarea name="video" id="video" class="btn_textarea"  ><?php echo $video; ?></textarea>
          <br/>
          <div style="margin-left:150px;" ><?php echo PLEASE_FULL_VIDEO_PAGE_URL_FOR_YOUR_3RD_PARTY_VIDEO_HERE; ?>.<br/>
            <b><?php echo OR_TEXT; ?></b> <?php echo FOR_CUSTOM_VIDEO; ?> <span onclick="showcustomvideo()" style="font-weight:bold; cursor:pointer; color:#009900;"><?php echo CLICK_HERE; ?></span>.</div>
        </div>
      </div>
      <div class="inner_content_two" id="custom_video" style="display:<?php if($video_set==1) { ?> block <?php } else { ?> none <?php } ?>;"  >
        <div class="form-element-container">
          <div class="form-label">
            <label class="all_text"><?php echo CUSTOM_VIDEO; ?> : *</label>
          </div>
          <input name="videofile" type="file" class="" id="videofile" />
          <input type="hidden" name="prev_videofile" id="prev_videofile" value="<?php echo $videofile; ?>" />
          <br/>
          <div style="margin-left:150px;"><?php echo UPLOAD_CUSTOM_VIDEO_HERE; ?>.<br/>
            <b><?php echo OR_TEXT; ?></b> <?php echo FOR_3RD_PARTY_VIDEO;?> <span onclick="thirdpartyvideo()" style="font-weight:bold; cursor:pointer; color:#009900;"><?php echo CLICK_HERE; ?></span>. </div>
        </div>
      </div>
      <div class="inner_content_two" >
        <div class="form-element-container">
          <div class="form-label">
            <label class="normal_label"><?php echo PROJECT_SUMMARY;?> : *</label>
          </div>
          <textarea name="project_summary" id="project_summary" class="btn_textarea" onKeyDown="limitText(this.form.project_summary,this.form.countdown,95);" onKeyUp="limitText(this.form.project_summary,this.form.countdown,95);" ><?php echo $project_summary; ?></textarea>
          <br/>
          <div style="margin-left:150px;" ><font style="font-size:12px;">(<?php echo MAX_CHARACTER; ?>: 95) <?php echo YOU_HAVE_TEXT;?>
            <input readonly type="text" name="countdown" id="countdown" value="" class="normal_label" style="border:none; width:15px;">
            <?php echo CHAR_LEFT_TEXT;?>.</font></div>
        </div>
        <div class="form-element-container">
          <label class="normal_label"><?php echo PROJECT_DESCRIPTION;?> : *</label>
        </div>
        <?php
									/*	$vals = array(
											'name' => 'description',
											'id' => 'content',
											'width' => '98%',
											'height' => '400px',
											'value' => str_replace('?','',$description),
										);
										echo form_fckeditor($vals)."";*/
									  ?>
               						 <div style="background:#fff; width:600px; padding:2px;">
                                        <!-- jQuery and jQuery UI -->
										<script src="<?php echo base_url(); ?>editor/js/jquery-1.4.4.min.js" type="text/javascript" charset="utf-8"></script>
                                        <script src="<?php echo base_url(); ?>editor/js/jquery-ui-1.8.7.custom.min.js" type="text/javascript" charset="utf-8"></script>
                                        <link rel="stylesheet" href="<?php echo base_url(); ?>editor/css/smoothness/jquery-ui-1.8.7.custom.css" type="text/css" media="screen" charset="utf-8">
                                
                                        <!-- elRTE -->
                                        <script src="<?php echo base_url(); ?>editor/js/elrte.min.js" type="text/javascript" charset="utf-8"></script>
                                        <link rel="stylesheet" href="<?php echo base_url(); ?>editor/css/elrte.min_front.css" type="text/css" media="screen" charset="utf-8">
                                        
                                        <!-- elFinder -->
                                        <link rel="stylesheet" href="<?php echo base_url(); ?>editor/css/elfinder.css" type="text/css" media="screen" charset="utf-8" /> 
                                        <script src="<?php echo base_url(); ?>editor/js/elfinder.full.js" type="text/javascript" charset="utf-8"></script> 
                                        
                                     
                                        <script type="text/javascript" charset="utf-8">
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
                                        </script>
                                        
                                        
                                        <textarea id="description" name="description" cols="50" rows="4">
                                                <?php echo $description; ?>
                                            </textarea></div>
      </div>
      <div class="clear"></div>
      <?php if($video_set=='' || $video_set==0) { ?>
      <input type="hidden" name="video_set" id="video_set" value="0" />
      <?php } else { ?>
      <input type="hidden" name="video_set" id="video_set" value="<?php echo $video_set; ?>" />
      <?php } ?>
      <div class="clear"></div>
      <div align="center" style="margin-left:250px;">
        <input type="submit" name="submit" id="submit" value="<?php echo UPDATE; ?>" class="submit" />
        <input type="hidden" name="project_id" id="project_id" value="<?php echo $project_id; ?>" />
         <input type="hidden" name="active_cnt" id="active_cnt" value="<?php echo $active_cnt; ?>" />
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
