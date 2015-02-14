<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>:: Welcome to FundraisingScript Admin::</title>

<link href="<?php echo base_url(); ?>groupon.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" language="javascript" src="<?php echo upload_url(); ?>js/jquery-1.7.1.js"></script>





<script src="<?php echo upload_url(); ?>js/jqPngFix.js" type="text/javascript"></script>

<script language="JavaScript">

function chkpng() {

  if ($.browser.msie && $.browser.version == '6.0') {

  //if(navigator.appName == "Microsoft Internet Explorer"){

	//if((navigator.appVersion).search('MSIE 6.0') != '-1'){

	  var src = '<?php echo base_url(); ?>' + 'blank.gif';

	  jqPngFix(src);

	  bgsleight(src);

   // }

  }

}

</script>

<script type="text/javascript" language="javascript">

var GB_URL = '<?php  echo base_url(); ?>';

</script>

<script type="text/javascript" src="<?php echo base_url(); ?>js/chrome.js" language="javascript"></script>

<link href="<?php echo base_url(); ?>css/chromestyle.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" language="javascript">

function show_con(id,nos){

	for (var i=1; i<=nos; i++){

		if(id == i){

			document.getElementById(i).style.display = 'block';

			document.getElementById('sp_'+i).style.color = "#364852";

			document.getElementById('sp_'+i).style.background = "#ececec";

		}

		else{

			document.getElementById(i).style.display = 'none';

			document.getElementById('sp_'+i).style.color = '#ececec';

			document.getElementById('sp_'+i).style.background = "#364852";

		}

	}

}



function show_block(id){		

	if(document.getElementById(id).style.display == "block")

	{

		document.getElementById(id).style.display = "none";

		document.getElementById('arrow_'+id).src = "<?php echo base_url(); ?>images/down-arrow.png";

	}

	else{

		document.getElementById(id).style.display = "block";

		document.getElementById('arrow_'+id).src = "<?php echo base_url(); ?>images/up-arrow.png";

	}

}



function show_block1(id1, id2){

	if(document.getElementById(id1).style.display == "block")

	{

		document.getElementById(id1).style.display = "none";

		document.getElementById(id2).style.display = "block";

	}

	else{

		document.getElementById(id1).style.display = "block";

		document.getElementById(id2).style.display = "none";

	}

}



function show_div(id,id2){

	document.getElementById(id).parentNode.style.display = "block";

	var temp_id = document.getElementById(id).parentNode.id;

	document.getElementById('arrow_'+temp_id).src = "<?php echo base_url(); ?>images/up-arrow.png";

	document.getElementById(id2).style.display = "none";

	document.getElementById(id).style.display = "block";

}



function main_div(id1, id2){

	if (document.getElementById(id1).style.display == "none" && document.getElementById(id2).style.display == "none" ){

		if(document.getElementsByName('radio')[0].checked == "true"){

			document.getElementById(id1).style.display = "block";			

		}

		else{

			document.getElementById(id2).style.display = "block";

		}

		document.getElementById('arrow_'+id1).src = "<?php echo base_url(); ?>images/up-arrow.png";	

	}

	else{

		document.getElementById(id1).style.display = "none";

		document.getElementById(id2).style.display = "none";

		document.getElementById('arrow_'+id1).src = "<?php echo base_url(); ?>images/down-arrow.png";	

	}	 

}



function show_bg(id){

	document.getElementById(id).style.background = "#ececec";

	document.getElementById(id).style.color = "#000";

	document.getElementById(id).style.border = "1px solid #c5bfbf";

}



function comm_show_bg(id){

	document.getElementById(id).style.background = "#d9d9d9";

	document.getElementById(id).style.color = "#000";

	document.getElementById(id).style.border = "1px solid #8d8d8d";

}



function hide_bg(id){

	document.getElementById(id).style.background = "#f4f4f4";

	document.getElementById(id).style.color = "#000";

	document.getElementById(id).style.border = "1px solid #e7e6e6";

}



function comm_hide_bg(id){

	document.getElementById(id).style.background = "#ececec";

	document.getElementById(id).style.color = "#000";

	document.getElementById(id).style.border = "1px solid #a8a3a3";

}



function change_bg(id){

	document.getElementById('step1').style.background = "#ff0000";

}

</script>



<script type="text/javascript" language="javascript">

function toggle(x){	

		if(x.className == 'alter'){

			x.className = 'marked';

		}

		else {

			x.className = 'alter';

		}	

}



function toggle1(x){

		if(x.className == 'alter1'){

			x.className = 'marked1';

		}

		else {

			x.className = 'alter1';

		}	

}

</script>

</head>



<body onload="chkpng()">

<div id="wrap">

  <?php echo $header; ?>

  <div id="mid-content">

    <div id="mid-box">

      <h1 style="text-transform:capitalize;" class="h1"><?php echo $title; ?>&nbsp;</h1>

	  <div id="con-top">

        <div class="fleft"><img src="<?php echo base_url(); ?>images/c1-t-l.jpg" alt="" /></div>

        <div class="fright"><img src="<?php echo base_url(); ?>images/c1-t-r.jpg" alt="" /></div>

      </div>

      <div id="con-mid">

	  	<?php echo $main_content; ?>        

      </div>

      <div id="con-top">

        <div class="fleft"><img src="<?php echo base_url(); ?>images/c1-b-l.jpg" alt="" /></div>

        <div class="fright"><img src="<?php echo base_url(); ?>images/c1-b-r.jpg" alt="" /></div>

      </div>

    </div>

  </div>

</div>

<div style="clear:both;"></div>

<?php echo $footer; ?>

</body>

</html>