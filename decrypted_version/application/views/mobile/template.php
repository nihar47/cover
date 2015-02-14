<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="viewport" content="width=device-width, initial-scale=1"/>

<title><?php echo ($meta_title!="")?strip_tags(str_replace(array('&nbsp;'),'',$meta_title)):":: Welcome to FundraisingScript ::"; ?></title>
<meta name="description" content="<?php echo ($meta_description!="")?strip_tags(str_replace(array('&nbsp;'),'',$meta_description)):"FundraisingScript"; ?>" />
<meta name="keywords" content="<?php echo ($meta_keyword!='')?strip_tags(str_replace(array('&nbsp;'),'',$meta_keyword)):"FundraisingScript"; ?>" />

<link href="<?php echo base_url(); ?>css/common.css" rel="stylesheet" type="text/css" />
<!--<link href="<?php echo base_url(); ?>FundrisingCss.css" rel="stylesheet" type="text/css" />-->
<?php
if(!stristr($_SERVER['REQUEST_URI'],"create_step2") and !stristr($_SERVER['REQUEST_URI'],"edit_project") and !stristr($_SERVER['REQUEST_URI'],"projects/"))
{
?>
<script src="<?php echo base_url(); ?>js/mootools-core-1.3-full.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>js/mootools-more-1.3-full.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>js/mootools-art-0.87.js" type="text/javascript"></script>
<?php
}
?>
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>js/clickMe.js" ></script>


<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.js"></script>


 	<script type="text/javascript" src="<?php echo base_url();?>/js/mobilejs/jquery-1.6.2.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/js/mobilejs/jquery.mobile-1.0b2.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/js/mobilejs/jquery.yiiactiveform.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/js/mobilejs/x2mobile.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/js/mobilejs/x2mobile-init.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/jquery.mobile-1.0b2.css">
   

<!--[if lte IE 7]> 
    
	<link href="<?php echo base_url(); ?>ie7.css" rel="stylesheet" type="text/css" />
	
<![endif]-->

<!--[if gte IE 7]>
<style type="text/css">
.file_img input[type=file], .file_upload input[type=file]{
/*opacity: 0;
-moz-opacity: 0;
filter:progid : DXImageTransform.Microsoft.Alpha(opacity=0);*/
cursor:pointer;
filter:alpha(opacity=0);
        -moz-opacity:0.5;
        -khtml-opacity: 0.9;
        opacity: 0.0;
}



.searchtext{
	padding:3px 8px;
}
.campaigns{
	padding:20px 0px 0px 0px;
}
.widget .widgetlogo{
}
</style>
<![endif]-->

</head>
<body>

<?php $spamer=$this->home_model->spam_protection();
      if($spamer==1 || $spamer=='1') { ?>
	<div class="spam_report">

<b>Your IP has been Band due to spam. Please contact web master.</b>

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
 
 
</body>
</html>