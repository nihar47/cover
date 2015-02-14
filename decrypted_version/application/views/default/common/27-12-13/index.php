<?php ob_start();
session_start();
if(!empty($_GET['device']))
{
$_SESSION['device'] = $_GET['device'];
}
?>
<?php include("config.php");?>
<?php include("functions_mysql.php");?>
<?php include("connection.php");?>
<?php include("functions.php");?>
<?php include("paging.Class.php");?>
<?php
//Redirect site on iphone devices
  
$iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
$ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
$ipad = strpos($_SERVER['HTTP_USER_AGENT'],"iPad");

		if (($iphone || $ipad || $ipod == true)&&($_SESSION['device']!="iphone"))
		{
			echo "<script>window.location='http://www.wordgametime.com/iphone.htm'</script>";
		}
		
$pagename = ( isset($_GET['page']) ) ? $_GET['page'] : "home";
if(($pagename=="individual_grade"))
{
	$meta_id=$_GET['cat_id'];
	//$meta_id='pre-k';
}elseif($pagename=="individual_subject"){
	$meta_id=$_GET['sub_id'];
}
elseif($pagename=="gamedetails"){
	$meta_id=$_GET['game_id'];
}
elseif($pagename=="videodetails"){
	$meta_id=$_GET['video_id'];
}
elseif($pagename=="worksheetdetails"){
	$meta_id=$_GET['worksheet_id'];
}
elseif($pagename=="pages"){
	$meta_id=$_GET['id'];
}
$meta_detail=metaTitle($pagename,$meta_id);
$meta_page=explode("~",$meta_detail);
$pagename .= ".php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript">var _sf_startpt=(new Date()).getTime()</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $meta_page[0];?></title>
<meta name="description" content="<?php echo $meta_page[1];?>">
<meta name="keywords" content="<?php echo $meta_page[2];?>">
<link href="<?php echo SITE_PATH;?>style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo SITE_PATH;?>nivo-slider.css" rel="stylesheet" type="text/css" />
<link rel="SHORTCUT ICON" href="http://www.wordgametime.com/favicon.ico"/>
<script language="javascript" src="<?php echo SITE_PATH;?>js.js"></script>
<script type="text/javascript" src="<?php echo SITE_PATH;?>js/jquery.min1.js"></script>
<script src="<?php echo SITE_PATH;?>js/jquery.min.js"></script>
<link href="<?php echo SITE_PATH;?>nivo-slider.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="<?php echo SITE_PATH;?>jquery.nivo.slider.pack.js"></script>
<script type="text/javascript">
$(window).load(function() {
	$('#slider').nivoSlider({
		effect:'random', //Specify sets like: 'fold,fade,sliceDown'
		slices:15,
		animSpeed:500, //Slide transition speed
		pauseTime:3000,
		startSlide:0, //Set starting Slide (0 index)
		directionNav:true, //Next & Prev
		controlNav:true,
		directionNavHide:false, //Only show on hover
		keyboardNav:true, //Use left & right arrows
		pauseOnHover:true, //Stop animation while hovering
		manualAdvance:false, //Force manual transitions
		prevText:'Previous',
		nextText:'Next',
		captionOpacity:0.8, //Universal caption opacity
		beforeChange: function(){},
		afterChange: function(){},
		slideshowEnd: function(){} //Triggers after all slides have been shown
	});
});
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-28826612-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>
<?php
if($pagename=="gamedetails.php" || $pagename=="videodetails.php" || $pagename=="worksheetdetails.php" || $pagename=="gamedetails_sub.php"){
	$contclassname = 'id="sidebar_right"';
	$contclasspad = ' class="cont_left_content"';
}else{
	$contclassname = 'id="sidebar_left"';
	$contclasspad = '';		
}

?>
<body>
<div id="maincontent">
	<div id="header">
      <a href="<?php echo SITE_PATH;?>"><div id="logo"></div></a>
      <div class="logo_right">
      <div class="banner_121">
	  <script type="text/javascript"><!--
google_ad_client = "ca-pub-5381861774185295";
/* WGT 1 */
google_ad_slot = "7303711096";
google_ad_width = 468;
google_ad_height = 60;
//-->
</script>
<div class="add">
<!--<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>-->
<a target="_blank" href="http://www.ixl.com/promo?partner=mathgametime&phrase=468x60&utm_source=wordgametime.com&utm_medium=banner&utm_campaign=468x60">
<img src="<?php echo SITE_PATH;?>images/ixl_468x60.gif"></a>
</div>
<!--google search script-->
<div class="add">
<script>
  (function() {
    var cx = '015808986471343300610:jdglpitrusq';

    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
        '//www.google.com/cse/cse.js?cx=' + cx;

    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
</script>

<gcse:search></gcse:search>
</div>

      </div>
      <div class="social_share">
      <div style="color:#FFFFFF;font-weight:bold;float:left">Follow Us &nbsp;<a href="http://twitter.com/WordGameTime" target="_blank"><img src="<?php echo SITE_PATH;?>images/twitter.png" align="absmiddle" /></a>&nbsp;<a href="https://www.facebook.com/WordGameTime" target="_blank"><img src="<?php echo SITE_PATH;?>images/facebook.png" align="absmiddle" border="0"/></a>
      <a href="https://plus.google.com/107220908511644648104" style="text-decoration:none;" target="_blank"><img src="https://ssl.gstatic.com/images/icons/gplus-32.png" alt="" style="border:0;width:26px;height:26px;" align="absmiddle"/></a>
      </div>
      <div class="clear"></div>
      <div style="padding-top:15px;">
        <!--iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fmathgametime.com%2Findex.php&amp;layout=standard&amp;show_faces=true&amp;width=179&amp;action=like&amp;font=arial&amp;colorscheme=light&amp;height=70" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:179px; height:70px; background-color:#FFFFFF; padding-top:5px;" allowtransparency="false"></iframe -->
        <iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2FWordGameTime&amp;send=false&amp;layout=standard&amp;width=179&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=35&amp;appId=256396461047729" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:179px; height:42px; background: #ffffff;" allowTransparency="true"></iframe>
      </div>
      <div class="google-plus">
      	<g:plusone size="small" annotation="inline" width="150"></g:plusone>
      	<script type="text/javascript">
		  (function() {
		    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
		    po.src = 'https://apis.google.com/js/plusone.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
		  })();
		</script>
        

      </div>
      </div>
      <div class="clear"></div>
      <div id="menu">
      <ul>
	     <li><a href="<?php echo SITE_PATH;?>">HOME</a></li>
        <li><a href="<?php echo SITE_PATH;?>word-games">GAMES</a></li>
        <li><a href="<?php echo SITE_PATH;?>word-videos">VIDEOS</a></li>
        <li><a href="<?php echo SITE_PATH;?>word-worksheets">WORKSHEETS</a></li>
      <!--  <li style="background:none;"><a href="<?php echo SITE_PATH;?>about-us.html">ABOUT US</a></li>-->
        <li><a href="<?php echo SITE_PATH;?>blog">BLOG</a></li>
      </ul>
      <div class="clear"></div>
    </div>
      </div>
</div>
        <div id="content_full">
            <div id="containeer">
            <div class="top_space">
                <div <?php echo $contclassname;?>><!-- your Sidebar Comes here--><?php include("rightbar.php");?></div>
                <div id="content"<?php echo $contclasspad;?>><!-- your Content Comes here--> <?php include($pagename);?></div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div id="footer">
    <div class="cols1" style="padding-top:80px; color:#FFF; font-size:12px; text-align:center;"><strong> Copyright © 2011 Fila, LLC</strong></div>
    <div class="cols"><ul>
        <li><a href="<?php echo SITE_PATH;?>contact-us.html">Contact Us</a></li>
        <li><a href="<?php echo SITE_PATH;?>about-us.html">About Us</a></li>
        <li><a href="<?php echo SITE_PATH;?>privacy.html">Privacy</a></li>
        <li><a href="<?php echo SITE_PATH;?>coppa.html">COPPA</a></li>
      </ul></div>
    <div class="cols"><ul>
        <li><a href="<?php echo SITE_PATH;?>press.html">Link To Us</a></li>
        <li><a href="<?php echo SITE_PATH;?>partners.html">Links</a></li>
        <li><a href="/blog/">Blog</a></li>
        <li><a href="http://www.mathgametime.com" target="_blank">Math Games</a></li>
      </ul></div>
   <div class="cols_last"><span>Word Game Time</span> is your destination for <span>the best word games</span> and <span>homework help online.</span>  Our games are fun, educational as well as approved by parents and teachers!</div>
	<div class="clear"></div>
    </div>
</div>
<script type="text/javascript">
var _sf_async_config={uid:6954,domain:"wordgametime.com"};
(function(){
  function loadChartbeat() {
    window._sf_endpt=(new Date()).getTime();
    var e = document.createElement('script');
    e.setAttribute('language', 'javascript');
    e.setAttribute('type', 'text/javascript');
    e.setAttribute('src',
       (("https:" == document.location.protocol) ? "https://a248.e.akamai.net/chartbeat.download.akamai.com/102508/" : "http://static.chartbeat.com/") +
       "js/chartbeat.js");
    document.body.appendChild(e);
  }
  var oldonload = window.onload;
  window.onload = (typeof window.onload != 'function') ?
     loadChartbeat : function() { oldonload(); loadChartbeat(); };
})();
		
</script>

</body>
</html>