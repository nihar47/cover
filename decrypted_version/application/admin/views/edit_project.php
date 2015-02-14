<style>

.gmap3 {

    border: 1px dashed #C0C0C0;

    height: 200px;

  

    width: 325px;

	 margin:5px 0 5px 150px;

}

ul.autocomplete {

		display:block;

		margin: 0;

		padding: 2px;

		-moz-border-radius: 4px;

		-webkit-border-radius: 4px;

		border-radius: 4px;

		background-color:#EEEEEE !important;

		border: 1px solid #DDDDDD !important;

		max-height: 200px;

		overflow-y: scroll;

		text-align:left;

		z-index:9999;

		list-style:none;

}

ul.autocomplete li{

	padding: 0;

	cursor:default;

	border:1px solid #EEEEEE !important;

	-moz-border-radius: 4px;

	-webkit-border-radius: 4px;

	border-radius: 4px;

	list-style: none outside none;

	

}

ul.autocomplete li.hover{

	border:1px solid #FFA5A5 !important;

	background-color:#FFE0E0 !important;

}

ul.autocomplete li a{

	display:block;

	cursor:default;

	width:100%;

	text-decoration: none;

	outline: medium none;

	-moz-border-radius: 4px;

	-webkit-border-radius: 4px;

	border-radius: 4px;

	color: #333333;

	

}

</style>

<script type="text/javascript">



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

		

		var url = '<?php echo site_url('project_category/getstate'); ?>/'+countryid;

		

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

		

		var url = '<?php echo site_url('project_category/getcity'); ?>/'+stateid;

		

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

		

		var url = '<?php echo site_url('project_category/getallcity'); ?>/'+countryid;

		

		xmlhttp.open("GET",url,true);

		xmlhttp.send(null);

	

}

</script>

<div id="con-tabs">











 <ul>



            <li><span style="cursor:pointer;"><?php echo anchor('project_category/edit_project/'.$project_id,'Edit Project','id="sp_2" style="color:#364852;background:#ececec;"'); ?></span></li>



          </ul>







 <div id="text">





















<?php $CI =& get_instance(); $site = front_base_url();  ?>











<script src="<?php echo upload_url(); ?>js/mootools-core-1.3-full.js" type="text/javascript"></script> 



<script src="<?php echo upload_url(); ?>js/mootools-more-1.3-full.js" type="text/javascript"></script> 



<script src="<?php echo upload_url(); ?>js/mootools-art-0.87.js" type="text/javascript"></script>



<script type="text/javascript" language="javascript" src="<?php echo upload_url(); ?>js/clickMe.js" ></script>



















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











 <div class="edit_form"  style="margin-left:325px;">



<div class="con_left2" style="min-height:0px; width:690px; margin-right:0px;">



           			



              



				



















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



						dv.innerHTML = '  Image is required';



						return false;



						



						



						



					



				}



				else{



				



						value = document.getElementById('file_up').value;



						t1 = value.substring(value.lastIndexOf('.') + 1,value.length);



						



						if( t1=='jpg' || t1=='jpeg' || t1=='gif' || t1=='png' ){



						



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



						dv.innerHTML = '  Image type is not valid';



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



	  



<script type="text/javascript" src="<?php echo upload_url(); ?>js2/jquery-1.5.js"></script>	   



				  



<!--<script type="text/javascript" src="<?php //echo $site; ?>js/jquery.min.js"></script>







<script type="text/javascript" src="<?php //echo $site; ?>js2/date.js"></script> 



<script type="text/javascript" src="<?php //echo $site; ?>js2/jquery.datePicker.js"></script>







<link href="<?php //echo $site; ?>js2/datePicker.css" rel="stylesheet" />



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



	background: url(<?php echo $site; ?>js2/calendar-green.gif) no-repeat; 



}



</style>







 



 <link href="<?php echo base_url(); ?>create.css" rel="stylesheet" type="text/css" />



      



                  



                    <?php



										



						if($project_title=='') { redirect('project_category/list_project/');  } 



										



				  		$attributes = array('name'=>'frm_project','onsubmit'=>'return submit_image_valid()');



						echo form_open_multipart('project_category/update_project/'.$project_id,$attributes);



				  ?>



				  <!--<form>-->



				  



				  <div class="clear"></div>



				        



			 		<?php if($error!='') { ?>	<div align="center" class="error" style="height:auto; background-color:#FF9191; border:1px solid #FF0000;"> <?php echo $error; ?></div>  <?php } ?>



					<div class="clear"></div>



					



					<div id="err1" align="center"></div>



					  <div id="err2" align="center"></div>



					  <div id="err3" align="center"></div>



						



						<div class="clear"></div> 



			 



<div class="inner_content_two" >		



						



 				



				<div class="form-element-container">					



					<div class="form-label">



                        <label class="normal_label"><?php echo 'Projects Title'; ?> *</label></div>



										 



                            <input type="text" name="project_title" id="project_title"  value="<?php echo $project_title; ?>" class="btn_input2" />



							<input type="hidden" name="project_id" id="project_id" value="<?php echo $project_id; ?>"  />



                 </div>



							 



							 



						<div class="form-element-container">					



					<div class="form-label">



                        <label class="normal_label"><?php echo 'Goal'; ?>(<?php echo $site_setting['currency_symbol']; ?>) *</label></div>



							



                            <input type="text" name="amount" id="amount"   value="<?php echo $amount; ?>" class="btn_input"  />



                          



					  </div>



                         



						 



				<div class="form-element-container">					



					<div class="form-label">



                        <label class="normal_label"><?php echo 'Category'; ?> :&nbsp;</label>



							</div>



							



                      



                    <select tabindex="4" name="category_id" id="category_id" class="btn_input_select" style="text-transform:capitalize;">



						<option value="" > -- <?php echo 'Select category'; ?> -- </option>



					<?php



						foreach($categorylist as $row1)



						{ print_r($row1['child']);
									if($row1['project_category_id']==$category_id) {
											echo "<option value='".$row1['project_category_id']."' selected='selected'>".$row1['project_category_name']."</option>";
									}
									else
									{
									echo "<option value='".$row1['project_category_id']."'>".$row1['project_category_name']."</option>";
									}
									
									if(isset($row1['children']) && !empty($row1['children'])){
										foreach($row1['children'] as $child){
											if($child['project_category_id']==$category_id) {
											echo "<option value='".$child['project_category_id']."' selected='selected'>&nbsp;&nbsp;".$child['project_category_name']."</option>";
											}
											else
											{
											echo "<option value='".$child['project_category_id']."'>&nbsp;&nbsp;".$child['project_category_name']."</option>";
											}
											
											if(isset($child['child']) && !empty($child['child'])){
												foreach($child['child'] as $c){
													if($c['project_category_id']==$category_id) {
											echo "<option value='".$c['project_category_id']."' selected='selected'>&nbsp;&nbsp;&nbsp;&nbsp;-- ".$c['project_category_name']."</option>";
											}
											else
											{
											echo "<option value='".$c['project_category_id']."'>&nbsp;&nbsp;&nbsp;&nbsp;-- ".$c['project_category_name']."</option>";
											}
													}
												
												}
										}
									}

								}



						



					?>



                    </select>



                   </div>



					



                    <div style="clear:both; height:7px;"></div>



                    







                    



					



					



					<div class="form-element-container">



							<div class="form-label">



							<label class="normal_label">Total Days : *</label>



							</div>



							



							<?php echo $total_days; ?> Days



							<input type="hidden" value="<?php echo $total_days; ?>" name="total_days" id="total_days" />



						



						</div>



					

				   <?php 

				    $paypal= get_adaptive_paypal_detail();

				  if($site_setting['enable_funding_option'] == '1' ){  ?>    

                       

                         <div class="form-element-container">

                          <div class="form-label">

                            <label class="normal_label">Project Type : *</label>

                          </div>

                            <?php if($active=='0' and $active_cnt=='0'){  ?>	 

                                <input type="radio" name="payment_type" id="payment_type1" value="0" <?php if($payment_type==0){  echo 'checked="checked"'; } ?>/>

                                &nbsp;Fixed

                                

                                  <input type="radio" name="payment_type" id="payment_type2" value="1" <?php if($payment_type==1){  echo 'checked="checked"'; } ?> style="margin-left:25px;"/>

                                &nbsp;Flexible

                                

                              <?php  }

                              else{ if($payment_type==0){  echo  'Fixed Project';  } else{ echo  'Flexible Project';   } 

                                    ?> <input type="hidden" name="payment_type" id="payment_type" value="<?php echo $payment_type; ?>" /><?php

                                }  ?>

                        </div>

                    <?php  }else{  ?> <input type="hidden" name="payment_type" id="payment_type" value="<?php echo $payment_type; ?>" /><?php } ?>

                    

                     



</div>



					



	



<div class="inner_content_two">



					



					<div class="form-element-container">



						<div class="form-label">



							<label class="normal_label">Country : *</label>



							</div>

							<input type="text" name="project_address" id="project_address" class="btn_input" size="10" value="<?php echo $project_address; ?>"/><div style="clear:both;"></div>

									   

			 <div id="test" class="gmap3" ></div>



							<!--<input type="text" name="project_country" id="country_text" class="btn_input" size="10" value="<?php //echo $project_country; ?>"/>

                                 <select tabindex="5" name="project_country" id="project_country" class="btn_input_select" onchange="getstate(this.value)" style="text-transform:capitalize;">

            <option value=""> -- <?php // echo "Select Country"; ?> -- </option>

            <?php

					/*	foreach($countrylist as $row){

						

							if($project_country == $row->country_id)

							{

							echo "<option value='".$row->country_id."' selected='selected'>".$row->country_name."</option>";

							}

							else

							{

							echo "<option value='".$row->country_id."'>".$row->country_name."</option>";

							}

						}*/

					?>

     </select>-->



					  </div>



				<!--<div class="clear"></div>

					 <div class="form-element-container">



						<div class="form-label">



							<label class="normal_label">State : *</label>



							</div>



							<input type="text" name="project_state" id="state_text" class="btn_input" size="10" value="<?php //echo $project_state; ?>"/>

                             <div id="state_div">

  							         					 <select tabindex="5" name="project_state" id="project_state" class="btn_input_select" style="text-transform:capitalize;" onblur="getcity(this.value)">

              <option value="" > -- <?php // echo  "Select State"; ?> -- </option>

              <?php

						

						/*if($project_state =='No State'){

							echo "<option value=''  selected='selected'>No State</option>";

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

						}*/

					?>

            </select>

          					</div>



					  </div> -->

					<!--<div class="clear"></div>

					   <div class="form-element-container">



						<div class="form-label">



							<label class="normal_label">City : *</label>



							</div>



							<input type="text" name="project_city" id="city_text" size="10" class="btn_input" value="<?php //echo $project_city; ?>"/>

						<div id="city_div">

        				  <select tabindex="5" name="project_city" id="project_city" class="btn_input_select" style="text-transform:capitalize;">

            <option value=""> -- <?php // echo "Select City"; ?> -- </option>

            <?php

						/*if($project_city =='No City'){

							echo "<option value=''  selected='selected'>No City</option>";

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

						}*/

					?>

          </select>

        				 </div>

					  </div>-->

					  

					<div class="clear"></div>

					   

			  <div class="form-element-container">



						<div class="form-label">



							<label class="normal_label">Google Analytics Code  : </label>



							</div>



							<input type="text" name="p_google_code" id="p_google_code" class="btn_input" size="10" value="<?php echo $p_google_code; ?>"/>



							(Ex :: UA-23165973-1) 									  



					  </div>



					   



					 



					 



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



							



							//document.getElementById('err2').style.display='none';



							//document.getElementById('err1').style.display='none';



						}



						if(set==1)



						{



							document.getElementById('custom_video').style.display='none';



							document.getElementById('thirdparty').style.display='block';



							document.getElementById('more2').style.display='none';	



							



							document.getElementById('video_set').value='0';



							//document.getElementById('err2').style.display='none';



							//document.getElementById('err1').style.display='none';



						}



						



					}



					







</script>



	



	



			<div class="inner_content_two">



				



					<div class="form-element-container">



						<div class="form-label">



							<label class="all_text">Set Display Page:</label>



							</div>



							



				<input type="radio" name="projectimagevideoset" id="projectimagevideoset" value="0"  onclick="setimagevideo(this.value)" <?php if($projectimagevideoset=='' || $projectimagevideoset==0 ) { ?> checked="checked" <?php } ?> />Project Image 			&nbsp;&nbsp;&nbsp;&nbsp;
               
                



					<input type="radio" name="projectimagevideoset" id="projectimagevideoset" value="1" <?php if($projectimagevideoset==1) { ?> checked="checked" <?php } ?> onclick="setimagevideo(this.value)" />Project Video



					</div>



				</div>



				



	



	



	 



		



		



<div id="more2"  class="inner_content_two" style="display:block;">



				  



					  <div class="form-element-container">



						<div class="form-label">



							<label  class="all_text">Project Image:*</label>



							</div>



						   <input   name="file_up" type="file" class="" id="file_up" value="" />
                            <font color="red">Upload image greater than 800*600</font> 


						   <input type="hidden" name="prev_project_image" id="prev_project_image" value="<?php echo $image; ?>" />

                           <?php //echo $image; ?>

					 </div>



                  



</div>



						















				



					  



	 



	



	



<div class="inner_content_two" id="thirdparty" style="display:<?php if($video_set=='' || $video_set==0) { ?>block<?php } else { ?>none<?php } ?>;" >



					



				<div class="form-element-container">



                  	<div class="form-label">



                        <label class="all_text">video Url : *</label>



                        </div>



                        <textarea name="video" id="video" class="btn_textarea"  ><?php echo $video; ?></textarea>



												



					<br/><div style=" clear:both; margin-left:150px;" >Paste the Full Video Page URL for your 3rd party video here.<br/>



					



				<b>Or</b> For Custom Video <span onclick="showcustomvideo()" style="font-weight:bold; cursor:pointer; color:#009900;">Click here</span>.</div>



                  </div>



					 



</div>



				  



				 



	 <div class="inner_content_two" id="custom_video" style="display:<?php if($video_set==1) { ?> block <?php } else { ?> none <?php } ?>;"  >



				   



		  <div class="form-element-container">



                  	<div class="form-label">



                        <label class="all_text">Custom Video : *</label>



                        </div>



                       <input name="videofile" type="file" class="" id="videofile" />



					   <input type="hidden" name="prev_videofile" id="prev_videofile" value="<?php echo $videofile; ?>" /> 



					   



					<br/><div style="clear:both;margin-left:150px;">You can upload a custom video here.<br/>



					



					<b>Or</b> For 3rd Party Video <span onclick="thirdpartyvideo()" style="font-weight:bold; cursor:pointer; color:#009900;">Click here</span>.



					



					</div>



					   



					   



                  </div>



				  



	</div>



	















	



		



		



				







<div class="inner_content_two" >











 <div class="form-element-container">



                  	<div class="form-label">



                        <label class="normal_label">Quick Peek : *</label>



                        </div>



						



						<textarea name="project_summary" id="project_summary" class="btn_textarea" onKeyDown="limitText(this.form.project_summary,this.form.countdown,300);" onKeyUp="limitText(this.form.project_summary,this.form.countdown,300);" ><?php echo $project_summary; ?></textarea>



						



						<br/><div style="clear:both;margin-left:150px;" ><font style="font-size:12px;">(Maximum characters: 300)



You have <input readonly type="text" name="countdown" id="countdown" value="" class="normal_label" style="border:none; width:15px;"> characters left.</font></div>



						



						</div>



				



				



				



               <div class="form-element-container">



                 



                     



						   <label class="normal_label">Project Description : *</label>						



						 

							<div style="background:#fff; float:left; width:600px; padding:2px;">

                                        <!-- jQuery and jQuery UI -->

										<script src="<?php echo upload_url(); ?>editor/js/jquery-1.4.4.min.js" type="text/javascript" charset="utf-8"></script>

                                        <script src="<?php echo upload_url(); ?>editor/js/jquery-ui-1.8.7.custom.min.js" type="text/javascript" charset="utf-8"></script>

                                        <link rel="stylesheet" href="<?php echo upload_url(); ?>editor/css/smoothness/jquery-ui-1.8.7.custom.css" type="text/css" media="screen" charset="utf-8">

                                

                                        <!-- elRTE -->

                                        <script src="<?php echo upload_url(); ?>editor/js/elrte.min.js" type="text/javascript" charset="utf-8"></script>

                                        <link rel="stylesheet" href="<?php echo upload_url(); ?>editor/css/elrte.min.css" type="text/css" media="screen" charset="utf-8">

                                        

                                        <!-- elFinder -->

                                        <link rel="stylesheet" href="<?php echo upload_url(); ?>editor/css/elfinder.css" type="text/css" media="screen" charset="utf-8" /> 

                                        <script src="<?php echo upload_url(); ?>editor/js/elfinder.full.js" type="text/javascript" charset="utf-8"></script> 

                                        

                                     

                                        <script type="text/javascript" charset="utf-8">

                                            jQuery().ready(function() {

											

												elRTE.prototype.options.panels.web2pyPanel = ['save','copy', 'cut', 'paste', 'pastetext', 'pasteformattext', 'removeformat','undo', 'redo','strikethrough','bold', 'italic', 'underline', 'subscript', 'superscript','link', 'unlink', 'anchor','insertorderedlist', 'insertunorderedlist', 'justifyleft', 'justifyright','justifycenter', 'justifyfull', 'forecolor','hilitecolor', 'outdent', 'indent','horizontalrule', 'blockquote', 'div', 'stopfloat', 'css', 'nbsp', 'smiley', 'pagebreak','ltr', 'rtl','table', 'tableprops', 'tablerm',  'tbrowbefore', 'tbrowafter', 'tbrowrm', 'tbcolbefore', 'tbcolafter', 'tbcolrm', 'tbcellprops', 'tbcellsmerge', 'tbcellsplit','formatblock','fontsize', 'fontname','image', 'flash','elfinder','fullscreen'];

 elRTE.prototype.options.toolbars.web2pyToolbar = ['web2pyPanel'];

 

 

 

 

                                                var opts1 = {

                                                    cssClass : 'el-rte',

                                                    lang     : 'en',  // Set your language

                                                    allowSource : 1,  // Allow user to view source

                                                    height   : 450,   // Height of text area

                                                    toolbar  : 'web2pyToolbar',   // Your options here are 'tiny', 'compact', 'normal', 'complete', 'maxi', or 'custom'

                                                    cssfiles : ['<?php echo upload_url(); ?>editor/css/elrte-inner.css'],

                                                    // elFinder

                                                    fmAllow  : 1,

                                                    fmOpen : function(callback) {

                                                        $('<div id="myelfinder" />').elfinder({

                                                            url : '<?php echo upload_url(); ?>editor/connectors/php/connector.php', //You must configure this file. Look for 'URL'.  

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

                                        

                                        

                                        <textarea id="description" name="description" >

                                                <?php echo $description; ?>

                                            </textarea></div>

				</div><div class="clear"></div>	



				



						



                 





					



				











</div>















<div class="clear"></div>	







<?php if($video_set=='' || $video_set==0) { ?>



			<input type="hidden" name="video_set" id="video_set" value="0" />



			<?php } else { ?>



			<input type="hidden" name="video_set" id="video_set" value="<?php echo $video_set; ?>" />



			<?php } ?>















<div class="clear"></div>	



			<div align="center" style="margin-left:250px;">



		<input type="submit" name="submit" id="submit" value="Update" class="submit" />



		<input type="hidden" name="project_id" id="project_id" value="<?php echo $project_id; ?>" />



          <input type="hidden" name="url_project_title" id="url_project_title" value="<?php echo $url_project_title; ?>" />



		</div>



			



				<div class="clear"></div>		



				



			



			</form>















</div>



			



			



			<div class="clear"></div>		



				



					</div>



	







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









</div></div>

<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>

    <script type="text/javascript" src="<?php echo front_base_url(); ?>js/map/gmap3.min.js"></script>

	 <script type="text/javascript" src="<?php echo front_base_url(); ?>js/map/jquery-autocomplete.min.js"></script>

    <link rel="stylesheet" type="text/css" href="<?php  echo front_base_url(); ?>js/map/jquery-autocomplete.css"/>

  <script type="text/javascript">

      $(function(){

          

          $('#test').gmap3();



          $('#project_address').autocomplete({

            source: function() {

              $("#test").gmap3({

                action:'getAddress',

                address: $(this).val(),

                callback:function(results){

                  if (!results) return;

                  $('#project_address').autocomplete(

                    'display', 

                    results,

                    false

                  );

                }

              });

            },

            cb:{

              cast: function(item){

			  

                return item.formatted_address;

              },

              select: function(item) {

                $("#test").gmap3(

                  {action:'clear', name:'marker'},

                  {action:'addMarker',

                    latLng:item.geometry.location,

                    map:{center:true}

                  }

                );

              }

            }

			 

			

          });

		  

		  

		 <?php  if($project_address!= ''){ ?> 

		    $('#test').gmap3({ 

				action: 'addMarker',

					address: "<?php  echo $project_address; ?>",

					map:{

					center: true,

					zoom: 14

				},

				marker:{

					options:{

						draggable: true

					}

				}

			});

		  <?php  } ?>

		  

		

		

      });

	 </script>

