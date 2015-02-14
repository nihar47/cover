<style>

</style>
<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/map/gmap3.min.js"></script>
	 <script type="text/javascript" src="<?php echo base_url(); ?>js/map/jquery-autocomplete.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>js/map/jquery-autocomplete.css"/>
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
		  
		  
		 <?php  if($result['address'] != ''){ ?> 
		    $('#test').gmap3({ 
				action: 'addMarker',
					address: "<?php  echo $result['address']; ?>",
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
		  
		// .focus();
          
		  /*$( "#slider-range-max" ).slider({
			range: "max",
			min: <?php // echo $site_setting['project_min_days'];?>,
			max: <?php // echo $site_setting['project_max_days'];?>,
			value: <?php // echo $total_days; ?>,
			slide: function( event, ui ) {
				$( "#total_days" ).val( ui.value );getend();
				
			}
		});
		$( "#total_days" ).val( $( "#slider-range-max" ).slider( "value" ) );*/
		
      });
    </script>	
<script src="<?php echo base_url(); ?>js/jquery.form.js"></script>
<script>
	$(function() {
  $('.project_picture').on('change', function(event) {//alert("hi");
   // jQuery('#next_action').val('');
   // startSpinner($('#picture_file_field_display'),$('#campaign_summary_picture_saving'));
    $('#edit_project_picture_file').children().remove();
    $(this).prependTo('#edit_project_picture_file').addClass('hidden-file-field');
    $('#project_picture').submit();
    $(this).clone(true).prependTo("#picture_file_field_display").removeClass('hidden-file-field').removeAttr('id');
  });
});

function onSuccessfile(data, textStatus, jqXHR)
{
$('#ajaximage').attr('src',"<?php echo base_url(); ?>upload/thumb/"+data.image.media_url);
}

$(document).ready(function() {
 
  // bind form id and provide a simple callback function
  if ((pic = jQuery('#project_picture')).length )
    pic.ajaxForm({dataType: 'json',
      success: onSuccessfile,
      error: onError,
      complete: onComplete,
    });
});
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
				getallcity();
			}
		}
		
		var url = '<?php echo site_url('home/getstate'); ?>/'+countryid;
		
		xmlhttp.open("GET",url,true);
		xmlhttp.send(null);
	
}
function fixedEncodeURIComponent (str) {
return encodeURIComponent(str).replace(/[!'()]/g, escape).replace(/\*/g, "%2A");
}

function add_website()
{	

	var website=document.getElementById('user_website').value;
	
	
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
		
		var url = '<?php echo site_url('home/add_user_website'); ?>/';
		
		
		xmlhttp.open("POST",url,true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("web="+website);
	
}

function delete_website(id)
{
	
	///alert(website);
	var r=confirm('Are Want To Sure Delete Website ?');
	
	if(r=true){
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
		
		var url = '<?php echo site_url('home/delete_user_website'); ?>/'+id;
		
		xmlhttp.open("GET",url,true);
		xmlhttp.send(null);
	}else{ return false ; }
	
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
		
		var url = '<?php echo site_url('home/getcity'); ?>/'+stateid;
		
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
		
		var url = '<?php echo site_url('home/getallcity'); ?>';
		
		xmlhttp.open("GET",url,true);
		xmlhttp.send(null);
	
}

function check_profile_name(pname)
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
				
				document.getElementById('user_avai').innerHTML= xmlhttp.responseText;
			}
		}
		
		var url = '<?php echo site_url('home/check_user_venity'); ?>/'+pname;
		
		xmlhttp.open("GET",url,true);
		xmlhttp.send(null);
	
}

function remove_image(id)
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
	
	$('#ajaximage').attr('src',"<?php echo base_url(); ?>upload/thumb/"+xmlhttp.responseText);
	$('#prev_image').val("");	
	
	}
	}
	
	var url = '<?php echo site_url('home/remove_user_image'); ?>/'+id;
	
	xmlhttp.open("GET",url,true);
	xmlhttp.send(null);

}

</script>
 <?php

 
	$attributes = array('id'=>'project_picture','name'=>'project_picture','enctype'=>'multipart/form-data','class'=>'edit_project','method'=>'post','accept-charset'=>'UTF-8');
   echo form_open_multipart('home/account_ajax_update', $attributes);
?>

  <div class="input-item-file" id="edit_project_picture_file" style="display:none">
  </div>
</form>
<section>
	<div style="border:none;" class="usersectiion">
		<div id="page_we">
		<h2 class="pname">Edit Settings</h2>
		
		<ul class="accountul">
			<li><?php echo anchor('home/profile_detail',PROFILE_DETAIL,'id="accsel"') ?></li>
			<li><?php echo anchor('home/account',ACCOUNT_SETTING) ?></li>
			<li><?php echo anchor('user/email_setting',NOTIFICATIONS) ?></li>
			<li><?php //echo anchor('settings/paypal',PAYPAL); ?></li>
			
		</ul>
		</div>
		
	</div>
	<div id="page_we">
	<div class="user_detail">
		<?php
 $attributes = array('id'=>'user_profile','name'=>'user_profile','enctype'=>'multipart/form-data','method'=>'post','accept-charset'=>'UTF-8'); 
	//$attributes = array('id'=>'user_profile','name'=>'user_profile');
   		echo form_open_multipart('home/profile_detail', $attributes);
		//print_r($result);
?>		
		<div class="usercont" style="width:960px;">
		<div class="user_cont_left" id="user_dt">

		<?php if($error){ ?>
		<div class="error" id="error"><ul><?php if($error){ echo $error;} ?></ul></div><?php }?>
			<input type="hidden" value="<?php echo $result['user_id'] ?>" name="user_id" id="user_id" />
			<label style="margin: 10px 0 0px;" class="label2"><?php echo FIRST_NAME; ?> :</label>
			<input type="text" style="margin:0;" class="textbx2" name="user_name" id="user_name" value="<?php  echo $user_name;?>">
			<p class="instr"><?php echo YOUR_FIRST_NAME_IS_DISPLAYED_ON_YOUR_PROFILE; ?></p><div class="clr"></div>
			
			<label style="" class="label2"><?php echo LAST_NAME ?> :</label>
			<input type="text"  class="textbx2" name="last_name" id="last_name" value="<?php  echo $last_name;?>">
			<p class="instr">Your Last name is displayed on your profile</p><div class="clr"></div>
			
			<label style="" class="label2"><?php echo ADDRESS; ?> :</label>
			 <input type="text" name="address"  class="textbx2" id="address" value="<?php  echo  $address; ?>" size="60" class="btn_input2"/>
			 <div id="test" class="gmap3"></div>
            <div class="clr"></div>
			
			
			
			<label class="label2"><?php echo BIOGRAPHY ; ?> :</label>
			<textarea class="box2" name="user_about" id="user_about" style="overflow:auto;"><?php  echo $user_about;?></textarea>
			<p class="instr"><?php echo WE_SUGGEST_A_SHORT_BIO_IF_ITS_300_CHARACTERS_OR_LESS_ITLL_LOOK_GREAT_ON_YOUR_PROFILE; ?></p>
			<div class="clr"></div>
			
			<label class="label2"><?php echo VANITY_URL; ?> :</label>
			<label style="width:auto; font-size:13px;" class="label2"><a href="<?php echo site_url('member/'.$result['user_id']); ?>"><?php echo site_url('member') ?>/<?php if($result['profile_name']!=''){ echo $result['profile_name']; }?> <input type="text"  name="profile_name" id="profile_name" value="<?php echo $result['profile_name']; ?>"class="textbx2" onkeyup="check_profile_name(this.value)"></a></label>
			<?php if($result['profile_name']==''){ ?>
			<span id="user_avai"></span>
			<p class="instr"><?php echo YOU_CAN_SET_A_VANITY_URL_HERE_ONCE_SET_THIS_VANITY_URL_CAN_NOT_BE_CHANGED; ?><br /><?php echo THIS_VANITY_URL_NAME_MUST_BETWEEN_4_TO_10_CHARACTER ?> <br />(<?php echo IE ?> :- <?php echo TEST; ?>123)</p><?php } ?>
			<div class="clr"></div>
			
			<label class="label2"><?php echo WEBSITES; ?> :</label>
			<div style="float:left;" class="inlinesub">
			<input type="text" style="margin:5px; border:none; float:left; width:250px;" name="user_website" id="user_website">
			<input type="button" value="ADD" class="addurl" onclick="add_website()">
			<input type="hidden" name="profile_nm" id="profile_nm" value="<?php echo $result['profile_name']; ?>" />
			<span id="web_err"></span>
			</div>
			
			
			<!--<span class="value" id="value"><?php // echo $result['user_website'];?></span>-->
			<div id="webtxt">
			<?php
				if($user_website){
					foreach($user_website as $uw){?>
					<div class="url field-selected">
					<span class="value" id="value"><?php  echo $uw['website_name'];?></span>
					<span class="remove">
			
			<a href="javascript://" onclick="delete_website(<?php echo $uw['website_id']; ?>)">
			<span class="icon-x-small cancel-link"></span>
			</a>
			</span>
			</div>
					
					<?php }
				}
			?>
			</div>
			
			
			

		
		
		</div>
		
	
		<div style="float:right; border:none" class="user_cont_left">
			<!--<h1>Here you can change your password</h1>-->
			<label style="margin: 10px 0 0px;" class="label2">Upload Photo :</label>
			<?php 	
					if(is_file('upload/thumb/'.$result['image']))
						{
							$img = $result['image'];
						}else{
							$img = NO_MAN;
							
							
						}
						
					if(is_file('upload/thumb/'.$result['image'])){
						?> <img src="<?php echo base_url().'upload/thumb/'.$img; ?>" alt="" width="100" height="100" style="float:left;" id="ajaximage"/>
						
						<?php
						
					}else{ ?>
               				<img src="<?php echo base_url().'upload/thumb/'.$img; ?>" alt="" width="100" height="100"  style="float:left;" id="ajaximage"/>
                            
                            
				<?php } ?>
			
			<div style="float:left; margin:5px 0 0 5px;"> <div class="image_upload" id="picture_file_field_display" >
						<input type="file"  class="project_picture" id="file1" name="file1" style="height:32px;"></div>	
                        <input type="hidden" name="prev_image" id="prev_image" value="<?php echo $result['image'];?>" />                   
						<div id="campaign_summary_picture_saving" class="spinner-container"></div>
    					  <!--<input type="text" style="float:left; height:32px; width:106px;" readonly="readonly" id="file_name" name="file_name">-->
					</div>
                    
                    <a class="ra" href="javascript://" onclick="remove_image(<?php echo $result['user_id']; ?>)"><?php echo REMOVE; ?></a>
			
			<div class="clr"></div>
		<!--<a class="ra" href="javascript://" onclick="remove_image(<?php echo $result['user_id']; ?>)"><?php echo REMOVE; ?></a>-->

			
		</div>
		</div>	

				<div class="clr"></div>
			<input type="submit" class="oresubmit1" id="save_user" name="save_user" value="Save Profile" style="margin-top:25px;"/>
		</form>	
	
</section>