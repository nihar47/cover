<link rel="stylesheet" media="all" type="text/css" href="http://code.jquery.com/ui/1.8.23/themes/smoothness/jquery-ui.css" />
<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.8.23/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/jquery.ui.datepicker.js"></script>

<link rel="stylesheet" href="<?php echo base_url();?>css/colorbox.css" />
<link rel="stylesheet" href="<?php echo base_url();?>js/colorbox/colorbox.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>js/colorbox/jquery.colorbox.js"> </script>
<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/map/gmap3.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/map/jquery-autocomplete.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>js/map/jquery-autocomplete.css"/>
  
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
		  
		  
		 <?php if($project_address != ''){ ?> 
		    $('#test').gmap3({ 
				action: 'addMarker',
					address: "<?php echo $project_address; ?>",
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
		  <?php } ?>
		  
		// .focus();
          
		 /* $( "#slider-range-max" ).slider({
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


<script>
$(document).ready(function(){
		$('.stepname').mouseover(function(){
			
			$('.stepname h2').addClass('h2hover');
		});
		
		$('.stepname').mouseover(function(){
			
			$('.stepname h2').addClass('h2hover');
		});
		
		
		
		$('.stepname').mouseout(function(){
			$('.stepname h2').removeClass('h2hover');
			$('.stepname h2').addClass('h2normal');
		});
	});
function chkfirstname(str)
{
			if(str=='') { return false; }
			var strURL='<?php echo site_url('start/checkfirstname/');?>/'+str;
			var xmlhttp;
			if (window.XMLHttpRequest)
			{// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp=new XMLHttpRequest();
			
			}
			else
			{// code for IE6, IE5
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			
			}
			xmlhttp.onreadystatechange=function()
				{
				
				if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
		
					
					if(xmlhttp.responseText.match("invalid"))
					{	
						
						document.getElementById("err1").style.display='block';
						document.getElementById("err2").style.display='none';
						document.getElementById("first_name").value='';
						document.getElementById("first_name").focus();
					}
					else
					{
						document.getElementById("err1").style.display='none';
					}
					
					
				}
			}
			xmlhttp.open("GET",strURL,true);
			xmlhttp.send();
		
	 

}
function chklastname(str)
{
			if(str=='') { return false; }
			var strURL='<?php echo site_url('start/checklastname/');?>/'+str;
			var xmlhttp;
			if (window.XMLHttpRequest)
			{// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp=new XMLHttpRequest();
			
			}
			else
			{// code for IE6, IE5
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			
			}
			xmlhttp.onreadystatechange=function()
				{
				
				if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
					
					if(xmlhttp.responseText.match("invalid"))
					{
						document.getElementById("err2").style.display='block';
						document.getElementById("err1").style.display='none';
						document.getElementById("last_name").value='';
						document.getElementById("last_name").focus();
					}
					else
					{
						document.getElementById("err2").style.display='none';
					}
					
					
				}
			}
			xmlhttp.open("GET",strURL,true);
			xmlhttp.send();
		
	 

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
		
		var url = '<?php echo site_url('start/getcity'); ?>/'+stateid;
		
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
		
		var url = '<?php echo site_url('start/getallcity'); ?>';
		
		xmlhttp.open("GET",url,true);
		xmlhttp.send(null);
	
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
				getallcity();
			}
		}
		
		var url = '<?php echo site_url('start/getstate'); ?>/'+countryid;
		
		xmlhttp.open("GET",url,true);
		xmlhttp.send(null);
	
}

</script>

<script type="text/javascript">
/*$(function(){$('#birth_date').datepicker(
			changeMonth: true,
			changeYear: true,
			yearRange: '1950:2012');});*/
		$(document).ready(function(){
		$('#birth_date').datepicker({changeMonth: true, changeYear: true, yearRange: '1950:1996'});
		});

function filename(name)
{
	
	document.getElementById('file_name').value=name.replace("C:\\fakepath\\","");

}
</script>
<script type="text/javascript">
$(document).ready(function(){
	$("#iframe").colorbox({iframe:true, width:"490px", height:"250px"});
});
</script>
<style type="text/css">
 #ui-datepicker-div, .ui-datepicker{ font-size: 85%; }
</style>
<section>
	<div id="page_we">
    <ul class="stepul">
        	
          <?php   if($id!='' and $id!='0'){?>
        		<li>
            	<a href="<?php echo site_url('start/guideline/'.$id);?>">
                	<div class="complete">
				<table align="center"><tr><td align="center">

                    	<h1><?php echo GUIDELINES; ?></h1></td></tr>
				<tr><td align="center">
                        <h2><img src="<?php echo base_url(); ?>/images/rightsign.png" style="margin-top:5px;" alt="" /></h2></td></tr></table>
                    </div>
                </a>
            </li>
                <li>
                    <a href="<?php echo site_url('start/create_step1/'.$id);?>">
                        <div class="complete">
                    <table align="center"><tbody><tr><td align="center">
                            <h1><?php echo BASICS; ?></h1></td></tr>
                            <tr><td>
                            <h2><img src="<?php echo base_url(); ?>/images/rightsign.png" style="margin-top:5px;" alt="" /></h2></td></tr></tbody></table>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('start/create_step2/'.$id); ?>">
                        <div class="complete">
                    <table align="center"><tr><td align="center">
                            <h1><?php echo PERKS; ?></h1></td></tr>
    						<tr><td>
                             <h2><img src="<?php echo base_url(); ?>/images/rightsign.png" style="margin-top:5px;" alt="" /></h2>
                           </td></tr></table>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('start/create_step3/'.$id); ?>">
                        <div class="complete">
                    <table align="center"><tr><td align="center">
                            <h1><?php echo PROJECT_DETAILS; ?></h1></td></tr>
                            <tr><td>
                           <h2><img src="<?php echo base_url(); ?>/images/rightsign.png" style="margin-top:5px;" alt="" /></h2> </td></tr></table>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('start/create_step4/'.$id); ?>">
                        <div class="stepname">
                    <table align="center"><tr><td align="center">
                            <h1><?php echo ACCOUNT_DETAILS; ?></h1></td></tr>
                            <tr><td>
                           <h2 class="h2normal">5</h2></td></tr></table>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('start/create_step5/'.$id); ?>">
                        <div class="incompletestep">
                    <table align="center"><tr><td align="center">
                            <h1><?php echo REVIEW; ?></h1></td></tr>
                            <tr><td>
                            <h2>6</h2></td></tr></table>
                        </div>
                    </a>
                </li>
                <li style="margin-right:0;">
                    <a href="<?php echo site_url('start/project_detail_preview/'.$id); ?>">
                        <div class="incompletestep">
                    <table align="center"><tr><td align="center" style="padding: 0 0 5px;margin-top: 10px;">
                            <img src="<?php echo base_url();?>images/eye.png" alt="" class="aimg" style="margin-top: 10px;" /></td></tr>
                            <tr><td>
                            <h2>7</h2></td></tr></table>
                        </div>
                    </a>
                </li>
          <?php }else{?>
                  <li>
                    <a href="#">
                        <div class="stepname">
                    <table align="center"><tbody><tr><td align="center">
                            <h1><?php echo BASICS; ?></h1></td></tr>
                            <tr><td>
                            <h2 class="h2normal">2</h2></td></tr></tbody></table>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="incompletestep">
                    <table align="center"><tr><td align="center">
                            <h1><?php echo PERKS; ?></h1></td></tr>
    
                            
                           <tr><td>
                            <h2>3</h2></td></tr></table>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="incompletestep">
                    <table align="center"><tr><td align="center">
                            <h1><?php echo PROJECT_DETAILS; ?></h1></td></tr>
                            <tr><td>
                            <h2>4</h2></td></tr></table>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="incompletestep">
                    <table align="center"><tr><td align="center">
                            <h1><?php echo ACCOUNT_DETAILS; ?></h1></td></tr>
                            <tr><td>
                            <h2>5</h2></td></tr></table>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="incompletestep">
                    <table align="center"><tr><td align="center">
                            <h1><?php echo REVIEW; ?></h1></td></tr>
                            <tr><td>
                            <h2>6</h2></td></tr></table>
                        </div>
                    </a>
                </li>
                <li style="margin-right:0;">
                    <a href="#">
                        <div class="incompletestep">
                    <table align="center"><tr><td align="center" style="padding: 0 0 5px;margin-top: 10px;">
                            <img src="<?php echo base_url();?>images/eye.png" alt="" class="aimg" style="margin-top: 10px;" /></td></tr>
                            <tr><td>
                            <h2>7</h2></td></tr></table>
                        </div>
                    </a>
                </li>

           	
		   <?php }?> 
            
        </ul>
		
		
		
		<div class="step_cont_top">
				<h2><?php echo NOW_A_LITTLE_BIT_ABOUT_YOU; ?></h2>
				<p><?php echo TELL_PEOPLE_WHO_YOU_ARE_SUPPORTING_LINKS_ARE_ALWAYS_NICE; ?></p>
			</div>
		<div class="step_cont2">
         <?php
				$attributes = array('id'=>'frm_project','name'=>'frm_project');
				echo form_open_multipart('start/create_step4/'.$id, $attributes);
	  		?>
			
			<div class="step2_left" style="border-bottom: 1px solid #CCCCCC;">
            <?php if($error != "")
				{ ?>
                <div class="error" style="height:auto; margin:4px 0px 0px 0px;">
                <ul><?php echo $error; ?></ul>
                </div>
                <?php } ?>
            
             <div id="err1" class="error" style="display:none;"><ul><li><?php echo INVALID_FIRST_NAME; ?></li></ul></div>    
              <div id="err2" class="error" style="display:none;"><ul><li><?php echo INVALID_LAST_NAME; ?></li></ul></div>    
				<div class="perk_cont">
				
					<label class="labe11"><?php echo NAME; ?>*</label>
					<input type="text" class="stext2" id="first_name" name="first_name" style="width:233px;margin-right:20px;" placeholder="First Name..." onchange="return chkfirstname(this.value);" value="<?php echo $first_name;?>">
					<input type="text" class="stext2" id="last_name" name="last_name" style="width:233px; " placeholder="Last Name..." onchange="return chklastname(this.value);" value="<?php echo $last_name;?>">
                    <div class="clr"></div>
					
                    <label style="margin-top:17px;" class="labe11"><?php echo FACEBOOK_CONNECT; ?></label>
					
                    <!--<a class="memfb" href="#"><img style="float:left; margin-right:5px;" src="<?php echo base_url();?>images/memberfbicn.png">Connect to Facebook</a>-->
                     <?php
					 $f_setting = facebook_setting();
					 $user_info = get_user_detail(get_authenticateUserID());
					if($f_setting->facebook_login_enable == '1'){
					$data = array(
					'facebook'		=> $this->fb_connect->fb,
					'fbSession'		=> $this->fb_connect->fbSession,
					'user'			=> $this->fb_connect->user,
					'uid'			=> $this->fb_connect->user_id,
					'fbLogoutURL'	=> $this->fb_connect->fbLogoutURL,
					'fbLoginURL'	=> $this->fb_connect->fbLoginURL,	
					'base_url'		=> site_url('home/facebook'),
					'appkey'		=> $this->fb_connect->appkey,
				);
				
				$fbLoginURL=$this->fb_connect->fbLoginURL; 
			$fbLoginURL=str_replace(urlencode(site_url('home/facebook/')),site_url('home/facebook/proj-'.$id.'/'),$fbLoginURL);		
	
	
	if($user_info['fb_uid'] != '' && $user_info['fb_uid'] !=0) {?>
		<div style="margin-left:127px;">
		
		<?php echo anchor('home/remove_fb/'.$id,'<span class="marL20fbtw">'.DISCONNECT_FACEBOOK.'</span>','class="facebook_connect_wrap" style="margin-top:10px;"');       ?>
		</div>
              <?php } else {?>
	
		 
         <div style="margin-left:127px;">	
		 <p class="instr" style="margin-left:0; width:500px; margin-top:10px;"><?php echo BUILD; ?></p><div class="clr"></div>
		 <a href="<?php echo $fbLoginURL; ?>" class="facebook_connect_wrap" style="margin-top:5px;"><?php echo CONNECT_WITH_FACEBOOK; ?></a>
</div>
 
	 <?php } 

	} 
				?>
                    
                    
					 <div class="clr"></div>  
					 
					 <label class="labe11" ><?php echo ADDRESS; ?> *</label>
					 <input type="text" name="project_address"  class="textbx2" id="project_address" value="<?php   echo $project_address; ?>" size="60" class="btn_input2"/>
			 <div id="test" class="gmap3" style="margin-left:128px;"></div>
						<!--<select tabindex="5" name="project_country" id="project_country" class="user_select" onChange="getstate(this.value)" >
            <option value=""> -- <?php // echo SELECT_COUNTRY; ?> -- </option>
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
          </select><div class="clr"></div>-->
		  
		 <!-- <label class="labe11" >State *</label>
		<div id="state_div">
			<select tabindex="5" name="state" id="project_state" class="user_select" style="text-transform:capitalize;" onChange="getcity(this.value)">
              <option value="" > -- <?php // echo SELECT_STATE; ?> -- </option>
              <?php
					/*	
						if($project_state =='No State'){
							echo "<option value=''  selected='selected'>".NO_STATES."</option>";
						}
						else{
							foreach($statelist as $st){
							
							
							if($project_state ==$st->state_id)
							{
								echo "<option value='".$st->state_id."' selected='selected'>".$st->state_name."</option>";
								}
	
								else
								{
								echo "<option value='".$st->state_id."'  >".$st->state_name."</option>";
								}
								
								
							}
						}*/
					?>
            </select></div><div class="clr"></div>-->
			
			<!--<label class="labe11" ><?php echo CITY; ?> *</label>
						<div id="city_div">
			<select tabindex="5" name="city" id="project_city" class="user_select" style="text-transform:capitalize;">
            <option value=""> -- <?php echo SELECT_CITY; ?> -- </option>
            <?php
						/*if($project_city =='No City'){
							echo "<option value=''  selected='selected'>".NO_CITY."</option>";
						}
						else{
							foreach($citylist as $ct){
							
							
							if($project_city == $ct->city_id)
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
          </select></div>--><div class="clr"></div>
						
						
						
					 
					<label class="labe11" ><?php echo PHONE_NUMBER; ?></label>
						<input type="text" class="stext2" placeholder="123456789" name="user_mobile" id="user_mobile" value="<?php echo $user_mobile;?>"><div class="clr"></div>
                        
                      <div class="clr"></div>  
					<label class="labe11" ><?php echo BIRTHDAY; ?></label>
					<input type="text" class="stext2" name="birth_date12" id="birth_date" placeholder="MM/DD/YYYY" style="width:233px;" value="<?php echo date($site_setting['date_format'],strtotime($birth_date));?>" >
					<div class="clr"></div>
					
					<label class="labe11" style="margin-bottom:15px;"><?php echo PHOTO_ID; ?></label>
						<div style="width:305px; float:left; margin:15px 0 0 0;"> <div class="image_upload">
						<input type="file" name="file_up" id="file_up" onchange="return filename(this.value);"></div>
    					  <input type="text" style="float:left" readonly="readonly" id="file_name" name="file_name">
					</div>
					<p class="instr" style="margin-left:0; width:500px;"><?php echo PH0TO_NOTE; ?></p>
					<div class="clr"></div>
					
				
			</div>
			</div>
				<div class="step2_right">
				<p class="arpare"><?php echo HOW_TO; ?>: &nbsp;</p><a href="<?php echo site_url('help/faq/tst'); ?>" class="arink"><?php  echo MAKE_AN_AWESOME_PROJECT; ?></a>
					<p class="arpare"><?php echo REFER_TO_OUR; ?> &nbsp;</p><a href="<?php echo site_url('help'); ?>" class="arink"><?php echo PROJECT_HELP_CENTER; ?>.</a><div class="clr"></div>
				
					
		
			</div>
		</div>
    </div>
	<div class="setp2btm">
	<div id="page_we">
		
        <input type="hidden"  name="id" id="id"  value="<?php echo $id; ?>" />
    	<input type="submit"  name="back" id="back" class="stepbtn" border="none" style="margin-left:346px;"  title="<?php echo BACK; ?>" value="<?php echo BACK; ?>" />
		<input type="submit"  name="draft" id="draft" class="stepbtn" border="none"  title="<?php echo SAVE; ?>" value="<?php echo SAVE; ?>"/>
		<input type="submit"  name="next" id="next" class="stepbtn" border="none"  title="<?PHP echo NEXT; ?>" value="<?PHP echo NEXT; ?>"/>
	   </form>
        
		 <?php echo anchor('start/deleteproject_popup/'.$id,'Delete Project','id="iframe" class="deleteprj"'); ?> 
		<?php echo anchor('home','EXIT','class="exitp"');?>
	</div>
	</div>
	
</section>


