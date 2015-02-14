<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title><?php echo ($meta_title!="")?strip_tags(str_replace(array('&nbsp;'),'',$meta_title)):":: Welcome to ".$site_setting['site_name']."  ::"; ?></title>

<meta name="description" content="<?php echo ($meta_description!="")?strip_tags(str_replace(array('&nbsp;'),'',$meta_description)):"FundraisingScript"; ?>" />

<meta name="keywords" content="<?php echo ($meta_keyword!='')?strip_tags(str_replace(array('&nbsp;'),'',$meta_keyword)):"FundraisingScript"; ?>" />

<link href='http://fonts.googleapis.com/css?family=Fredoka+One' rel='stylesheet' type='text/css'>

<script src="<?php echo base_url(); ?>js/jquery-1.7.1.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.jcarousel.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>js/easySlider1.5.js"></script>



<link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet" />

<link media="screen" type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>css/style.php?p=<?php echo base_url(); ?>" />

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/tango/skin.css" />

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>js/tipsy/tipsy.css">

<script type="text/javascript" src="<?php echo base_url();?>js/tipsy/jquery.tipsy.js"></script>

 <!--[if lt IE 9]>

   		<script type="text/javascript" src="<?php echo base_url(); ?>js/html51.js"></script>

    	<link rel="stylesheet" type="text/css" media="screen" href="css/ie.css">

	<![endif]-->

<script>

$(document).ready(function(){

	$('.icon-close').click(function(){

		$('#social-tout').hide();

	});

	

	 /*$('#mycarousel').jcarousel();

	  $('#mycarousel_project').jcarousel();

	   $('#mycarousel_project_latest').jcarousel();

	  $("#slider").easySlider();*/

	

	   

	  $(".cproject_left li").hide(); //Hide all content

	/*$("cproject_left li:first").addClass("active").show(); //Activate first tab*/

	$(".cproject_left li:first").show(); //Show first tab content

	//On Click Event

	$(".cproject_right li a").click(function() {

		$(".cproject_right li a").removeClass("catacthover"); 

		$(this).removeClass("catact");

		//Remove any "active" class

		$(this).addClass("catacthover");

		 //Add "active" class to selected tab

		$(".cproject_left li").hide(); //Hide all tab content

		var activeTab = $(this).attr("id").replace('cat',''); //Find the rel attribute value to identify the active tab + content

		

		$("#catproj"+activeTab).fadeIn('slow'); //Fade in the active content

		return false;

	});	

	

	$('#closepopup').click(function(){

		$("#project_popup").slideUp();

		$("#galcont").fadeIn();

		$("#header").fadeIn();

	});

	

	$('#opacitydiv').click(function(){

		$("#project_popup").slideUp();

		$("#galcont").fadeIn();

		$("#header").fadeIn();

	});

	  

});

</script>

<script type="text/javascript">

function showprojectpopup(id)

{

	$("#project_popup").slideToggle();

	$("#header").fadeOut();

	$("#galcont").fadeOut();

}



function searchproject(str)

{

			if(str=='') { return false; }

			var strURL='<?php echo site_url('home/search/');?>/'+str;

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

					//alert(xmlhttp.responseText);

					document.getElementById("search_res").innerHTML=xmlhttp.responseText;

					$('#search_project_list').jcarousel();

					$('#closesearch').click(function(){$("#search_project").slideUp();$("#opacitydiv_search").fadeOut();});

					$('#opacitydiv_search').click(function(){$("#opacitydiv_search").slideUp();$("#search_project").fadeOut();});

					

					

				}

			}

			xmlhttp.open("GET",strURL,true);

			xmlhttp.send();

		

	 

}

</script>



</head>

<body>



<?php $spamer=$this->home_model->spam_protection();

      if($spamer==1 || $spamer=='1') { ?>

	<div class="spam_report">



<b><?php echo IP_BAND_CONTACT_WEB_MASTER;?></b>



</div>

<?php } ?>





  <?php echo $header; ?>





   <?php if($main_content!='')  {   ?>

	 	    

	<?php  echo $main_content; ?>



	<?php   }  if($sidebar!='')  {  ?>

	

		   <?php  echo $sidebar; ?>

  

	   <?php } ?>

	   	

		 <?php  if($center_content!='' && $main_content==''  && $sidebar=='' )	 {  ?>  

	  

	  <?php echo $center_content;  ?>

	  

	  <?php }  ?>

	   <div class="clear"></div>





<?php echo $slider; ?>

	  

</div>

</div>



 <?php echo $footer; ?>

 

<script>

$(document).ready(function(){

	jQuery('a').tipsy({gravity: 'n'});	

	jQuery('.exitp').tipsy({gravity: 'n'});	

		jQuery('body img').tipsy({gravity: 'n'});

	});	

</script> 

</body>

</html>