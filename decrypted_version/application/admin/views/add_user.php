<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>

    <script type="text/javascript" src="<?php echo front_base_url(); ?>js/map/gmap3.min.js"></script>

	 <script type="text/javascript" src="<?php echo front_base_url(); ?>js/map/jquery-autocomplete.min.js"></script>

   <!-- <link rel="stylesheet" type="text/css" href="<?php // echo front_base_url(); ?>js/map/jquery-autocomplete.css"/>-->

  <script type="text/javascript">

      $(function(){

          

          $('#test').gmap3();



          $('#address').autocomplete({

            source: function() {

              $("#test").gmap3({

                action:'getAddress',

                address: $(this).val(),

                callback:function(results){

                  if (!results) return;

                  $('#address').autocomplete(

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

		  

		  

		 <?php  if($address!= ''){ ?> 

		    $('#test').gmap3({ 

				action: 'addMarker',

					address: "<?php  echo $address; ?>",

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

	  

	  

function add_website()

{	



	var website=document.getElementById('user_website').value;

	var user_id=document.getElementById('user_id').value;

	

	

	if(website=='')

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

				//alert(xmlhttp.responseText);user_website

				document.getElementById('user_website').value="";

				document.getElementById('webtxt').innerHTML= xmlhttp.responseText;

			}

		}

		

		var url = '<?php echo site_url('user/add_user_website'); ?>/';

		

		

		xmlhttp.open("POST",url,true);

		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");

		xmlhttp.send("web="+website+"&user_id="+user_id);

	

}



function delete_website(id)

{

	var user_id=document.getElementById('user_id').value;

	

	var r=confirm('Are You Sure,You want to delete this website link ?');

	

	if(r==true){

	if(id=='')

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

				document.getElementById('webtxt').innerHTML= xmlhttp.responseText;

			}

		}

		

		var url = '<?php echo site_url('user/delete_user_website'); ?>/'+user_id+'/'+id;

		

		xmlhttp.open("GET",url,true);

		xmlhttp.send(null);

	}else{ return false ; }

	

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

				getallcity();

			}

		}

		

		var url = '<?php echo site_url('user/getstate'); ?>/'+countryid;

		

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

		

		var url = '<?php echo site_url('user/getcity'); ?>/'+stateid;

		

		xmlhttp.open("GET",url,true);

		xmlhttp.send(null);

	

}



function getallcity()

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

		

		var url = '<?php echo site_url('user/getallcity'); ?>';

		

		xmlhttp.open("GET",url,true);

		xmlhttp.send(null);

	

}

</script>

<div id="con-tabs">

          <ul>

            <li><span style="cursor:pointer;"><?php echo anchor('user/list_user','Users','id="sp_1" style="color:#364852;background:#ececec;"'); ?></span></li>

          </ul>

          <div id="text">

            <div id="1">

              <div class="fleft" style="width:100%;">

                <div style="height:10px;"></div>

				<table width="100%" border="0" cellpadding="0" cellspacing="0">

                  <tr>

                    <td><img src="<?php echo base_url(); ?>images/c2-t-l.jpg" alt="" height="4" width="7" /></td>

                    <td background="<?php echo base_url(); ?>images/c2-t.jpg" width="99%"></td>

                    <td><img src="<?php echo base_url(); ?>images/c2-t-r.jpg" alt="" height="4" width="7" /></td>

                  </tr>

                  <tr>

                    <td background="<?php echo base_url(); ?>images/c2-l.jpg"></td>

                    <td valign="top" bgcolor="#FFFFFF"><div id="deal-tabs">

						<div id="deal-con">

							<div id="2" style="">

							  <div align="center">

								<div id="add-deal">

								  <?php

									$attributes = array('name'=>'frm_login');

									echo form_open('user/add_user',$attributes);

								  ?>

									<fieldset class="step">

									<?php

										if($error != "")

										{

											echo "<label style='width:700px;text-align:center;'><span>".$error."</span></label>";

											echo "<div class='vertical-line'></div>";

										}

									?>													

									

									<div class="fleft">

									  <label>First Name<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('user_name')" onmouseout="hide_bg('user_name')">

									  <input type="text" name="user_name" id="user_name" value="<?php echo $user_name; ?>" onfocus="show_bg('user_name')" onblur="hide_bg('user_name')"/>

									  </span>

									</div>

									<div style="clear:both;"></div>

                                    <div style="clear:both;"></div>

									<div class="fleft">

									  <label>Last Name<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('last_name')" onmouseout="hide_bg('last_name')">

									  <input type="text" name="last_name" id="last_name" value="<?php echo $last_name; ?>" onfocus="show_bg('last_name')" onblur="hide_bg('last_name')"/>

									  </span>

									</div>

									<div style="clear:both;"></div>

                                    

                                    <div class="fleft">

									  <label>Email<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('email')" onmouseout="hide_bg('email')">

									  <input type="text" name="email" id="email" value="<?php echo $email; ?>" onfocus="show_bg('email')" onblur="hide_bg('email')"/>

									  </span>

									</div>

									<div style="clear:both;"></div>

								 <?php

										if($user_id=="")

										{

									  ?>

                                	<div class="fleft">

									  <label>Password<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('password')" onmouseout="hide_bg('password')">

									  <input type="password" name="password" id="password" value="<?php echo $password; ?>" onfocus="show_bg('password')" onblur="hide_bg('password')"/>

									  </span>

									</div>

									<div style="clear:both;"></div>

                                  <?php } else{ ?>  

                                    <input type="hidden" name="password" id="password" value="<?php echo $password; ?>" onfocus="show_bg('password')" onblur="hide_bg('password')"/>

                                    <?php } ?>

									<!--<div class="fleft">

									  <label>Image<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('image')" onmouseout="hide_bg('image')">

									  <input type="hidden" name="image" id="image" value="<?php echo $image; ?>" onfocus="show_bg('image')" onblur="hide_bg('image')"/>-->

									  <!--</span>

									</div>-->

									<div class="fleft">

									  <label>Address<span>&nbsp;</span></label>

									 

									  <input type="text" name="address" id="address" value="<?php echo $address; ?>"/><div style="clear:both;"></div>

									   

			 <div id="test" class="gmap3" style="margin:5px 0 5px 300px;"></div>

									  

									

									</div>

									<div style="clear:both;"></div>

                                    

                                   

									<!--<div class="fleft">

									  <label>Country<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('country')" onmouseout="hide_bg('country')">

									  <input type="text" name="country" id="country" value="<?php //echo $country; ?>" onfocus="show_bg('country')" onblur="hide_bg('country')"/>

                                    <select tabindex="5" name="country" id="country" class="btn_input" onblur="getstate(this.value)" style="text-transform:capitalize;">

            <option value=""> -- <?php // echo 'Select Country'; ?> -- </option>

            <?php

						/*foreach($countrylist as $row){

						

							if($country==$row->country_id)

							{

							echo "<option value='".$row->country_id."' selected='selected'>".$row->country_name."</option>";

							}

							else

							{

							echo "<option value='".$row->country_id."'>".$row->country_name."</option>";

							}

						}*/

					?>

          </select>

									  </span>

									</div>

                                     <div style="clear:both;"></div>

                                   

                                   <div class="fleft">

									  <label>State<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('state')" onmouseout="hide_bg('state')" id="state_div" >

									  <input type="text" name="state" id="state" value="<?php //echo $state; ?>" onfocus="show_bg('state')" onblur="hide_bg('state')"/>

                                     <select tabindex="5" name="state" id="state" class="btn_input" style="text-transform:capitalize;" onblur="getcity(this.value)">

              <option value="" > -- <?php // echo "Select State"; ?> -- </option>

              <?php

						

						/*if($state=='No State'){

							echo "<option value=''  selected='selected'>No State</option>";

						}

						else{

							foreach($statelist as $st){

							

							

							if($state==$st->state_id)

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

									  </span>

									</div>

									

									<div style="clear:both;"></div>

                                    

                                    <div class="fleft">

									  <label>City<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('city')" onmouseout="hide_bg('city')" id="city_div"> 

									  <input type="text" name="city" id="city" value="<?php //echo $city; ?>" onfocus="show_bg('city')" onblur="hide_bg('city')"/>

                                      <select tabindex="5" name="city" id="city" class="btn_input" style="text-transform:capitalize;">

            <option value=""> -- <?php // echo "Select City"; ?> -- </option>

            <?php

						/*if($city=='No City'){

							echo "<option value=''  selected='selected'>No City</option>";

						}

						else{

							foreach($citylist as $ct){

							

							

							if($city==$ct->city_id)

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

									  </span>

									</div>

									<div style="clear:both;"></div>-->

                                    

									<!--<div class="fleft">

									  <label>Zip Code<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('zip_code')" onmouseout="hide_bg('zip_code')">

									  <input type="text" name="zip_code" id="zip_code" value="<?php // echo $zip_code; ?>" onfocus="show_bg('zip_code')" onblur="hide_bg('zip_code')"/>

									  </span>

									</div>

									<div style="clear:both;"></div>-->

									<div class="fleft">

									  <label>Paypal Email<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('paypal_email')" onmouseout="hide_bg('paypal_email')">

									  <input type="text" name="paypal_email" id="paypal_email" value="<?php echo $paypal_email; ?>" onfocus="show_bg('paypal_email')" onblur="hide_bg('paypal_email')"/>

									  </span>

									</div>

									<div style="clear:both;"></div>

                                    

                                    

                                 

                                    

                                    

                                    	<div class="fleft">

									  <label>Biography<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('paypal_email')" onmouseout="hide_bg('paypal_email')">

									                                         <textarea name="user_about" style=" width:350px; height:170px;" id="user_about" onfocus="show_bg('user_about')" onblur="hide_bg('user_about')" ><?php echo $user_about; ?></textarea>

                                        

									  </span>

									</div>

									<div style="clear:both;"></div>

                                    

                                    

                                    	<!--<div class="fleft">

									  <label>Occupation<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('user_occupation')" onmouseout="hide_bg('user_occupation')">

									  <input type="text" name="user_occupation" id="user_occupation" value="<?php // echo $user_occupation; ?>" onfocus="show_bg('user_occupation')" onblur="hide_bg('user_occupation')"/>

									  </span>

									</div>

									<div style="clear:both;"></div>-->

                                    

                                    <!--

                                    	<div class="fleft">

									  <label>Interest<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('paypal_email')" onmouseout="hide_bg('paypal_email')">

									  <textarea name="user_interest" style=" width:350px; height:170px;" id="user_interest" onfocus="show_bg('user_interest')" onblur="hide_bg('user_interest')" ><?php // echo $user_interest; ?></textarea>

									  </span>

									</div>

									<div style="clear:both;"></div>-->

                                    

                                    

                                    	<!--<div class="fleft">

									  <label>Skills<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('user_skill')" onmouseout="hide_bg('user_skill')">

									 <textarea name="user_skill" style=" width:350px; height:170px;" id="user_skill" onfocus="show_bg('user_skill')" onblur="hide_bg('user_skill')" ><?php // echo $user_skill; ?></textarea>

									  </span>

									</div>

									<div style="clear:both;"></div>-->

                                    

                                    

                                    	<div class="fleft">

									  <label>Website<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('user_website')" onmouseout="hide_bg('user_website')">

									 <!-- <input type="text" name="user_website" id="user_website" value="<?php echo $user_website; ?>" onfocus="show_bg('user_website')" onblur="hide_bg('user_website')"/>-->

									

									 <?php if($user_website!=""){ ?>

									 <div style="float:left;" class="inlinesub">

							<input type="text" style="margin:5px; border:none; float:left; width:250px;" name="user_website" id="user_website">

							<input type="button" value="ADD" class="addurl" onclick="add_website()">

							<input type="hidden" name="profile_nm" id="profile_nm" value="<?php // echo $result['profile_name']; ?>" />

							</div>

								

			<!--</span>-->	

							<?php

								

								if($user_website){?>

								<div id="webtxt" style="margin-left:284px;">

								<?php	foreach($user_website as $uw){

									//print_r($user_website);die;

									?>

									<div class="url field-selected">

									<span class="value" id="value"><?php  echo $uw['website_name'];?></span>

									<span class="remove">

							

							<a href="javascript://" onclick="delete_website(<?php echo $uw['website_id']; ?>)">

							<span class="icon-x-small cancel-link"></span>

							</a>

							</span>

							</div><div style="clear:both;"></div>

									

									<?php }?>

									</div>

								<?php }	?>

								

								<?php }else{ ?>

										<input type="text" name="website" id="website" value="<?php echo $website; ?>" onfocus="show_bg('website')" onblur="hide_bg('website')"/>

									<?php } ?>

									  

									</span></div>

									<div style="clear:both;"></div>

                                    

                                    

                                    	<!--<div class="fleft">

									  <label>Facebook Profile URL<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('facebook_url')" onmouseout="hide_bg('facebook_url')">

									  <input type="text" name="facebook_url" id="facebook_url" value="<?php // echo $facebook_url; ?>" onfocus="show_bg('facebook_url')" onblur="hide_bg('facebook_url')"/>

									  </span>

									</div>

									<div style="clear:both;"></div>-->

                                    

                                    <!--

                                    	<div class="fleft">

									  <label>Twitter Profile URL<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('twitter_url')" onmouseout="hide_bg('twitter_url')">

									  <input type="text" name="twitter_url" id="twitter_url" value="<?php // echo $twitter_url; ?>" onfocus="show_bg('twitter_url')" onblur="hide_bg('twitter_url')"/>

									  </span>

									</div>

									<div style="clear:both;"></div>-->

                                    

                                    <!--

                                    	<div class="fleft">

									  <label>Linkedln Profile URL<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('linkedln_url')" onmouseout="hide_bg('linkedln_url')">

									  <input type="text" name="linkedln_url" id="linkedln_url" value="<?php // echo $linkedln_url; ?>" onfocus="show_bg('linkedln_url')" onblur="hide_bg('linkedln_url')"/>

									  </span>

									</div>

									<div style="clear:both;"></div>-->

                                    

                                    

                                    	<!--<div class="fleft">

									  <label>Google Plus Profile URL<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('googleplus_url')" onmouseout="hide_bg('googleplus_url')">

									  <input type="text" name="googleplus_url" id="googleplus_url" value="<?php // echo $googleplus_url; ?>" onfocus="show_bg('googleplus_url')" onblur="hide_bg('googleplus_url')"/>

									  </span>

									</div>

									<div style="clear:both;"></div>-->

                                    

                                    

									

									<!--	<div class="fleft">

									  <label>BandCamp Profile URL<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('bandcamp_url')" onmouseout="hide_bg('bandcamp_url')">

									  <input type="text" name="bandcamp_url" id="bandcamp_url" value="<?php // echo $bandcamp_url; ?>" onfocus="show_bg('bandcamp_url')" onblur="hide_bg('bandcamp_url')"/>

									  </span>

									</div>

									<div style="clear:both;"></div>-->

									

									

									<!--

										<div class="fleft">

									  <label>Youtube Profile URL<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('youtube_url')" onmouseout="hide_bg('youtube_url')">

									  <input type="text" name="youtube_url" id="youtube_url" value="<?php // echo $youtube_url; ?>" onfocus="show_bg('youtube_url')" onblur="hide_bg('youtube_url')"/>

									  </span>

									</div>

									<div style="clear:both;"></div>-->

									

									

									<!--	<div class="fleft">

									  <label>MySpace Profile URL<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('myspace_url')" onmouseout="hide_bg('myspace_url')">

									  <input type="text" name="myspace_url" id="myspace_url" value="<?php // echo $myspace_url; ?>" onfocus="show_bg('myspace_url')" onblur="hide_bg('myspace_url')"/>

									  </span>

									</div>

									<div style="clear:both;"></div>-->

                                    

                                  

                                    

                                    

                                    

                                    

                                    

                                    

                                    

                                    

                                    

                                    

                                    

                                    

                                    

                                    

                                    

                                    

                                    

									<div class="fleft">

									  <label>Status<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('active')" onmouseout="hide_bg('active')">

									  <select name="active" id="active">

										<option value="0" <?php if($active=='0'){ echo "selected"; } ?>>Inactive</option>

										<option value="1" <?php if($active=='1'){ echo "selected"; } ?>>Active</option>														

									  </select>

									  </span>

									</div>

									<div style="clear:both;"></div>

									<div class="fleft">

									  <label>&nbsp;<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('user_id')" onmouseout="hide_bg('user_id')">

									  <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id; ?>" />

									  <input type="hidden" name="offset" id="offset" value="<?php echo $offset; ?>" />

									  </span>

									</div>

									<div style="clear:both;"></div>

									<div class="fleft">

									  <label>&nbsp;<span>&nbsp;</span></label>

									  <?php

										if($user_id=="")

										{

									  ?>

									  <div class="submit">

										<input type="submit" name="submit" value="Submit" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer; " />

									  </div>

									  <?php

										}else{

									  ?>

									  <div class="submit">

										<input type="submit" name="submit" value="Update" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer; " onclick=""/>

									  </div>

									  <?php

										}

									  ?>

									  <div class="submit">

										<input type="button" name="cancel" value="Cancel" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer;" onClick="location.href='<?php echo site_url('user/list_user'); ?>'"/>

									  </div>

									</div>

									</fieldset>

								  </form>

								</div>

							  </div>

							</div>

						</div>

					</div></td>

                    <td background="<?php echo base_url(); ?>images/c2-r.jpg"></td>

                  </tr>

                  <tr>

                    <td><img src="<?php echo base_url(); ?>images/c2-b-l.jpg" alt="" height="4" width="7" /></td>

                    <td background="<?php echo base_url(); ?>images/c2-b.jpg"></td>

                    <td><img src="<?php echo base_url(); ?>images/c2-b-r.jpg" alt="" height="4" width="7" /></td>

                  </tr>

                </table>

              </div>

            </div>

          </div>

        </div>