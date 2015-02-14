<script>

function set_user_id(id){

	//alert(id);

	document.getElementById('user_id').value=id;

}

</script>

<style>

.gmap3 {

    border: 1px dashed #C0C0C0;

    height: 200px;

  

    width: 325px;

	 margin:15px 0 0 101px;

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



			



			



			



			



			



			



			



			



			



			



		



			



			



			



			/*if(document.getElementById('file_up').value == "")



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



		



		



		



		



		



			/*if(document.getElementById('file_up').value == "")



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



					



					if( t1=='jpg' || t1=='jpeg' || t1=='gif' || t1=='png' || t1=='bmp' ){



					



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







function display_div(div){







	document.getElementById('step1').style.display='none';



	document.getElementById('step2').style.display='none';



	//document.getElementById('step3').style.display='none';



	document.getElementById('step4').style.display='none';



	document.getElementById('step5').style.display='none';



	



	document.getElementById('1').setAttribute('class', '');



	document.getElementById('2').setAttribute('class', '');



	//document.getElementById('3').setAttribute('class', '');



	document.getElementById('4').setAttribute('class', '');



	document.getElementById('5').setAttribute('class', '');



	



	if(div=='step1'){



		document.getElementById('cur_tab').innerHTML='1. Project Details';



		document.getElementById('1').setAttribute('class', 'first selected');



		



	}



	



	if(div=='step2'){



		document.getElementById('cur_tab').innerHTML='2. Campaign Details';



		document.getElementById('2').setAttribute('class', 'first selected');



	}



	



	/*if(div=='step3'){



		document.getElementById('cur_tab').innerHTML='3. Project Description';



		document.getElementById('3').setAttribute('class', 'first selected');



	}*/



	



	if(div=='step4'){



		document.getElementById('cur_tab').innerHTML='4. Additional Media';



		document.getElementById('4').setAttribute('class', 'first selected');



	}



	



	if(div=='step5'){



		document.getElementById('cur_tab').innerHTML='5. Perk Addition';



		document.getElementById('5').setAttribute('class', 'first selected');



	}







	document.getElementById(div).style.display='block';







}



</script>

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



<script type="text/javascript">

function  change_userlist(u)

 {

  // alert(u);

   if(u=='admin')

   {

       document.getElementById('user_user_id').style.display="none";

	    document.getElementById('admin_user_id').style.display="block";

   }

   

   else

   {

          document.getElementById('user_user_id').style.display="block";

	    document.getElementById('admin_user_id').style.display="none";

   }

     

 }

</script>





<?php $CI =& get_instance(); $site = $CI->config->slash_item('base_url_site');



 $site = $CI->config->slash_item('base_url_site_image');  ?>







<!--<script type="text/javascript" src="<?php echo upload_url();?>js2/jquery-1.5.js"></script>

-->

<script type="text/javascript" src="<?php echo upload_url(); ?>js2/tabs-navigation.js"></script> 







<?php







 if(!stristr($_SERVER['REQUEST_URI'],"create"))



{?>



<!--<script src="<?php echo upload_url(); ?>js/mootools-core-1.3-full.js" type="text/javascript"></script> 



<script src="<?php echo upload_url(); ?>js/mootools-more-1.3-full.js" type="text/javascript"></script> 



<script src="<?php echo upload_url(); ?>js/mootools-art-0.87.js" type="text/javascript"></script>-->



<?php }?>



















		<link type="text/css" href="<?php echo $site; ?>counter/css/ui-lightness/jquery-ui-1.8.18.custom.css" rel="stylesheet" />	

<!--    <script type="text/javascript" src="<?php echo $site; ?>counter/js/jquery-1.7.1.min.js"></script>-->

		<script type="text/javascript" src="<?php echo $site; ?>counter/js/jquery-ui-1.8.18.custom.min.js"></script>

        <script type="text/javascript" src="js/jquery.ui.datepicker.js"></script>



		<script type="text/javascript">

	

	

	$(function() {

		$( "#slider-range-max" ).slider({

			range: "max",

			min: 2,

			max: 90,

			value: 1,

			slide: function( event, ui ) {

				$( "#total_days" ).html( ui.value+' DAYS' );

				

			}

		});

		$( "#total_days" ).val( $( "#slider-range-max" ).slider( "value" ) );

		

		$('.prjtitlediv').datepicker();



		

	});

	

	

	

	</script>





	





<link href="<?php echo base_url(); ?>create.css" rel="stylesheet" type="text/css" />















<div id="con-tabs"> <div id="text">



	<div class="wrapper" style="min-height:540px; ">



	



	



     <?php if($error != "")



				{ ?>



                <div align="center" class="error" style="  height:auto; background-color:#FF9191; border:1px solid #FF0000;">



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



                                <li id="1" class="first selected"><a href="#step-1" class="1" onclick="display_div('step1');"><span>&nbsp;</span></a></li>



                                <li id="2" class=""><a href="#step-2" class="2" onclick="display_div('step2');"><span>&nbsp;</span></a></li>



                            <!--    <li id="3" class=""><a href="#step-3" class="3" onclick="display_div('step3');"><span>&nbsp;</span></a></li>-->



                                <li id="4" class=""><a href="#step-4" class="4" onclick="display_div('step4');"><span>&nbsp;</span></a></li>



                             	<li id="5" class=""><a href="#step-5" class="5" onclick="display_div('step5');"><span>&nbsp;</span></a></li>



                            </ul>



                        					



						</div>



						



						  <div id="step-navigation2">



						 	 <ul>



                                <li style="padding-left:85px;"><span>Get Started</span></li>



                                <li style="padding-left:45px;"><span>Campaign Details</span></li>



                             <!--   <li style="padding-left:35px;"><span>Project Description</span></li>-->



                                <li style="padding-left:30px;"><span>Additional Media</span></li>



                             	<li style="padding-left:55px;"><span>Perk Addition</span></li>



                            </ul>



						</div>



						



						



                      



	



			</div>



            <div class="clear"><!-- --></div>



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



						



				 



			echo form_open_multipart('project_category/create', $attributes);



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



						   <select name="category_id" id="category_id" class="btn_input_select" style="text-transform:capitalize;" >



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



                            



                            



                            



                             <div style="clear:both; height:5px;"></div>   



                            



                            



                            



                            



                            



                            <div class="form-element-container">



							 <div class="form-label">



							<label class="normal_label">Project Add as a : *</label>



							</div>



                            



                   <input type="radio" name="user_type" id="user_type" value="admin" <?php if($user_type=='admin') { ?> checked <?php } ?> onclick="change_userlist(this.value)" />Admin Project

                      	&nbsp;&nbsp;

                       <input type="radio" name="user_type" id="user_type" value="user" <?php if($user_type=='user') { ?> checked <?php } ?>  onclick="change_userlist(this.value)" />User Project

                            



                            



                            </div>



                            



                            



                             <div style="clear:both; height:5px;"></div>   

                             

                             

                            <!--<div class="form-element-container">



							 <div class="form-label">



							<label class="normal_label">Staff picks : </label>



							</div>



                            



                   <input type="radio" name="staff_picks" id="staff_picks" value="1" />Staff Picks

                      	&nbsp;&nbsp;



                            </div>-->



                            



                            



                             <div style="clear:both; height:5px;"></div>   



                             



                             



                            



                            <div class="form-element-container">



							 <div class="form-label">



							<label class="normal_label">User : </label>



							</div>

  <select  name="user_user_id" id="user_user_id" class="btn_input_select" style="display:block;" onchange="set_user_id(this.value)">

								<option value="" >Select User</option>

							<?php

								foreach($user_list as $usr)

								{

									

									if($usr->user_id==$user_id) {

									

									echo "<option value='".$usr->user_id."' selected='selected'>".$usr->user_name.' | '.$usr->last_name.' ['.$usr->email.']'."</option>";

									}

									

									else

									{

									echo "<option value='".$usr->user_id."'>".$usr->user_name.' | '.$usr->last_name.' ['.$usr->email.']'."</option>";

									

									}

								}

								

							?>

							</select>

                            

                            <select  name="admin_user_id" id="admin_user_id" class="btn_input_select" style="display:none;" onchange="set_user_id(this.value)">

								<option value="" >Select Admin</option>

							<?php

								foreach($admin_user_list as $usr)

								{

									

									if($usr->admin_id==$user_id) {

									

									echo "<option value='".$usr->admin_id."' selected='selected'>".$usr-> 	username.' |['.$usr->email.']'."</option>";

									}

									

									else

									{

								     echo "<option value='".$usr->admin_id."'>".$usr-> 	username.' |['.$usr->email.']'."</option>";

									

									}

								}

								

							?>

							</select>

<input type="hidden" name="user_id" id="user_id" value="" />

							</div>

                               <div style="clear:both;"></div>  

                            <div class="form-element-container">

							 <div class="form-label">

							<label class="normal_label">Quick Peek : *</label>

							</div>

						   	<textarea name="project_summary" id="project_summary" class="btn_textarea" onKeyDown="limitText(this.form.project_summary,this.form.countdown,95);" onKeyUp="limitText(this.form.project_summary,this.form.countdown,95);" ><?php echo $project_summary; ?></textarea>



						



						<br/><div style=" clear:both;margin-left:150px;" ><font style="font-size:12px;">(Maximum characters: 95)



You have <input readonly type="text" name="countdown" value="95" class="normal_label" style="border:none; width:15px;"> characters left.</font></div>

							</div>



                           <div style="clear:both; height:8px;"></div>  

                              <div class="form-element-container">



                 

<script type="text/javascript" src="<?php echo $site; ?>tiny_mce/jscripts/tiny_mce/tiny_mce.js"></script>
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
		width : '600',
		
	});
</script>

                        <label class="normal_label">Project Description : *</label>						



						 	<div style="background:#fff; float:left; width:600px; padding:2px;">

                                        <textarea id="description" name="description" cols="50" rows="4">

                                                <?php echo $description; ?>

                                            </textarea></div>



				</div><div class="clear" style="height:8px;"></div> 

						  <?php 

						   $paypal= get_adaptive_paypal_detail();

						  if($site_setting['enable_funding_option'] == '1' ){  ?>   

                           



                		   	<div class="form-element-container">



							<div class="form-label">



							<label class="normal_label">Project Type : *</label>



							</div>



							     <input type="radio" name="payment_type" id="payment_type1" value="0" <?php if($payment_type==0){  echo 'checked="checked"'; } ?>/>

                                &nbsp;Fixed

                                

                                  <input type="radio" name="payment_type" id="payment_type1" value="1" <?php if($payment_type==1){  echo 'checked="checked"'; } ?> style="margin-left:25px;"/>

                                &nbsp;Flexible

                                

							</div>



						   <?php  }else{  ?>  

                          				<input type="hidden" name="payment_type" id="payment_type"  value="0" />                         

                          <? } ?>

                            



                            



                            



							



							  <div style="clear:both; height:8px;"></div> 



					



					</div>



					



					



					



						<div class="form-element-container" align="center" >



								<input type="button" class="next_tab"  border="none"  title="next" onclick="display_div('step2');"/>



							</div>



					



					



					



                </div>



<!--------------Step-2---------------------->



                <div id="step2" class="div" style="display:none;">



               



					<div class="inner_content_two">



					



					



						



							<div class="form-element-container">



							<div class="form-label">



							<label class="normal_label">Total Days : *</label>



							</div>



							



							



					       <div style="width:300px; float:left">



					        <div id="slider-range-max" style="width:205px;"></div>	<span id="total_days"  style="border:0;background:none; display:inline-block; margin-top:5px;"/>0 DAYS</span>



							</div>



						



							



							



							</div>



							<div class="clear"></div><br />



						



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



							<label class="normal_label">Country : *</label>



							</div>

							 <input type="text" name="project_address" class="btn_input" id="project_address" value="<?php echo $project_address; ?>"/>

									   

			 <div id="test" class="gmap3" style="margin:5px 0 5px 150px;"></div><div style="clear:both;"></div>



							<!--<input type="text" name="project_country" id="country_text" class="btn_input" size="10" value="<?php //echo $project_country; ?>"/>-->

                               <!--  <select tabindex="5" name="project_country" id="project_country" class="btn_input" onchange="getstate(this.value)" style="text-transform:capitalize;">

            <option value=""> -- <?php // echo "Select Country"; ?> -- </option>

            <?php

						/*foreach($countrylist as $row){

						

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



							<!--<input type="text" name="project_state" id="state_text" class="btn_input" size="10" value="<?php //echo $project_state; ?>"/>

                             <div id="state_div">

  							         					 <select tabindex="5" name="project_state" id="project_state" class="btn_input" style="text-transform:capitalize;" onchange="getcity(this.value)">

              <option value="" > -- <?php // echo "Select State"; ?> -- </option>

              <?php

						

						/*if($statelist =='0'){

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



							<!--<input type="text" name="project_city" id="city_text" size="10" class="btn_input" value="<?php //echo $project_city; ?>"/>-->

					<!--	<div id="city_div">

          <select tabindex="5" name="project_city" id="project_city" class="btn_input" style="text-transform:capitalize;">

            <option value=""> -- <?php // echo "Select City"; ?> -- </option>

            <?php

						/*if($citylist =='0'){

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



					  

				 <div class="form-element-container">



						<div class="form-label">



							<label class="normal_label">Google Analytics Code  : </label>



							</div>



							<input type="text" name="p_google_code" id="p_google_code" class="btn_input" size="10" value="<?php echo $p_google_code; ?>"/>



							(Ex :: UA-23165973-1) 									  



					  </div>



					   



					 



					 



					 </div>

					 



					 



					  <div  style="float: left;padding-left: 200px;margin-right: 20px;">



							<input type="button" class="back_tab" id="back_tab" border="none"  title="back" onclick="display_div('step1');"/>



						</div>



						  <div class="form-element-container" style="margin-left:150px;">



							<input type="button" class="next_tab"  border="none"  title="next" onclick="display_div('step4');"/>



						</div>



				   	 



                 </div>



<!--------------Step 3---------------------->                 



                



<!--------------step-4---------------------->



                <div id="step4" class="div" style="display:none;">



                <script language="javascript" type="text/javascript">



						function append_div2()



						{



							/*var tmp_div2 = document.createElement("div");



							tmp_div2.className = "inner_content_two";



							tmp_div2.innerHTML = document.getElementById('more2').innerHTML;



							document.getElementById('add_more2').appendChild(tmp_div2);



							



							var myVerticalSlide2 = new Fx.Slide('add_more2');



							myVerticalSlide2.slideIn();



							*/



							



							var tmp_div2 = document.createElement("div");



							tmp_div2.className = "inner_content_two";



							



							var glry_cnt=document.getElementById('glry_cnt').value;



							document.getElementById('glry_cnt').value=parseInt(glry_cnt)+1;



							var num=parseInt(glry_cnt)+1;



							



							tmp_div2.id='galry'+num;



							



							content=document.getElementById('more2').innerHTML;							



							



							var str = '<div onclick="remove_gallery_div('+num+')" style="text-align:right;font-weight:bold;cursor:pointer;color:#990000;"><?php echo 'Remove';?></div>';	



							tmp_div2.innerHTML = content +str;



							



							document.getElementById('add_more2').appendChild(tmp_div2);



							



							var myVerticalSlide2 = new Fx.Slide('add_more2');



							myVerticalSlide2.slideIn();



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



                        <label class="all_text">video Url:</label>



                        </div>



                        <textarea name="video" id="video" class="btn_textarea"  ><?php echo $video; ?></textarea>



												



					<br/><div style=" clear:both;margin-left:150px;" >Paste the Full Video Page URL for your 3rd party video here.<br/>



					



				<b>Or</b> For Custom Video <span onclick="showcustomvideo()" style="font-weight:bold; cursor:pointer; color:#009900;">Click here</span>.</div>



                  </div>



				  



				  



				 



				  </div>



				  



				 



				  <div class="inner_content_two" id="custom_video" style="display:none;" >



				   



				  <div class="form-element-container">



                  	<div class="form-label">



                        <label class="all_text">Custom Video : </label>



                        </div>



                       <input name="videofile" type="file" class="" id="videofile" value="<?php echo $videofile; ?>" />



					   



					<br/><div style=" clear:both;margin-left:150px;">You can upload a custom video here.<br/>



					



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



				



				<input type="hidden" name="glry_cnt" id="glry_cnt" value="1" />



			<div id="add_button" style="display:block;">

          <!--  <img src="<?php echo base_url(); ?>images/add.png" height="16" width="16" border="0" title="Add More" onclick="append_div2();" style="cursor:pointer;" />-->



			<a href="javascript:void(0)" onclick="append_div2();"  class="pi" style="" title="Add More">Add More</a>



			<?php if($video_set=='' || $video_set==0) { ?>



			<input type="hidden" name="video_set" id="video_set" value="0" />



			<?php } else { ?>



			<input type="hidden" name="video_set" id="video_set" value="<?php echo $video_set; ?>" />



			<?php } ?>



			



			</div>



					



					



					<div  style="float: left;padding-left: 200px;margin-right: 20px;">



                    	<input type="button" class="back_tab" id="back_tab" border="none"  title="back" onclick="display_div('step2');"/>



                    </div>



                  <div class="form-element-container" style="margin-left:150px">



                    	<!--<input type="submit" value="" class="finish" border="none"  title="next"/>-->



						<input type="button" class="next_tab" border="none"  title="next" onclick="display_div('step5');"/>



                    </div> 



					



               </div>



<!--------------step-5----------------------> 



					



				<div id="step5" class="div" style="display:none;">



					<script language="javascript" type="text/javascript">



						function append_div()



						{



							/*var tmp_div = document.createElement("div");



							tmp_div.className = "inner_content_two";



							tmp_div.innerHTML = document.getElementById('more').innerHTML;



							document.getElementById('add_more').appendChild(tmp_div);



							



							var myVerticalSlide = new Fx.Slide('add_more');



							myVerticalSlide.slideIn();*/



							



							



							var tmp_div = document.createElement("div");



							tmp_div.className = "inner_content_two";



							



							



							var perk_cnt=document.getElementById('perk_cnt').value;



							document.getElementById('perk_cnt').value=parseInt(perk_cnt)+1;



							var num=parseInt(perk_cnt)+1;



							



							tmp_div.id='perk'+num;

								

							



							content=document.getElementById('more').innerHTML;							



							$("#metemp").html(content);

							$("#metemp .dp input").remove();



							$("#metemp .dp").html('<input type="text" name="est_date[]" class="prjtitlediv" value="" style=" width:205px; margin:0px 0 0 5px;" title="fdfdF" />');



								



							var str = '<div onclick="remove_perk_div('+num+')" style="text-align:right;font-weight:bold;cursor:pointer;color:#990000;"><?php echo 'Remove'; ?></div>';



							content = $("#metemp").html();



							tmp_div.innerHTML = content +str;



							document.getElementById('add_more').appendChild(tmp_div);

							

							$('.prjtitlediv').datepicker();

							

							$("#metemp").html('');



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

                     <p style="display:none;" id="metemp"></p>



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



                        <div style="clear:both;"></div>







						<div class="form-element-container">



							<div class="form-label">



								<label class="all_text">Perk Amount(<?php echo $site_setting['currency_symbol']; ?>) : *</label>



							</div>



							<input type="text" name="perk_amount[]" id="perk_amount"  class="btn_input1" />



						</div>

					  

						<div class="form-element-container">



							<div class="form-label">



								<label class="all_text">Estimate delivery date : *</label>



							</div>



							  <div class="dp"><input type="text" name="est_date[]" class="prjtitlediv" style=" width:205px; margin:0px 0 0 5px;" value="<?php //echo date('m-d-Y',strtotime($prk->perk_delivery_date));?>"/></div>



						</div>

                        

                        <div class="form-element-container">



							<div class="form-label">



								<label class="all_text">Total Claim : *</label>



							</div>



							<input type="text" name="perk_total[]" id="perk_total"  class="btn_input1" />



						</div>



					</div>



					



					</div>



					<input type="hidden" name="perk_cnt" id="perk_cnt" value="1" />



					<div><!--<img src="<?php echo $site; ?>images/add.png" height="16" width="16" border="0" title="Add More" onclick="append_div();" style="cursor:pointer;" />-->

                      <a href="javascript:void(0)" onclick="append_div();"  class="pi" style="" title="Add More">Add More</a></div>



					



					<div  style="float:left;padding-left: 200px;margin-right:20px;">



						<input type="button" class="back_tab" id="back_tab" border="none"  title="back" onclick="display_div('step4');"/>



					</div>



					<div class="form-element-container" style="margin-left:150px">



						<input type="submit" value="" class="finish" border="none"  title="finish" />



					</div> 



					



					



					



				</div>  



	<!--------------step-5----------------------> 			



				



				



				 <div id="err1"></div>    



				 



				  <div id="err2"></div>   



				  



				   <div id="err3"></div>                   



                         



                </div>



               



               



            </form>



       </div>     



    </div>  </div>















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
 <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>

    <script type="text/javascript" src="<?php echo front_base_url(); ?>js/map/gmap3.min.js"></script>

	 <script type="text/javascript" src="<?php echo front_base_url(); ?>js/map/jquery-autocomplete.min.js"></script>

   <!-- <link rel="stylesheet" type="text/css" href="<?php // echo front_base_url(); ?>js/map/jquery-autocomplete.css"/>-->

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