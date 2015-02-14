<div id="AboutLeft">
<?php 
$google_setting=google_setting();
$yahoo_setting=yahoo_setting();
$facebook_setting=facebook_setting();

 ?>
 
 <script type="text/javascript">
 // JavaScript Document
function LTrim( value ) {
	
	var re = /\s*((\S+\s*)*)/;
	return value.replace(re,"$1");
	
}

// Removes ending whitespaces
function RTrim( value ) {
	
	var re = /((\s*\S+)*)\s*/;
	return value.replace(re,"$1");
	
}

// Removes leading and ending whitespaces
function trim( value ) {
	
	return LTrim(RTrim(value));
	
}


function jvencode(str) {
	
	var s1=str.replace(')','KQWER');
	var s2=s1.replace('(','WEKREV');
	return encodeURIComponent(s2);
}
function jvdecode(str) {
	
	return decodeURIComponent(str.replace(/\+/g, " "));
}


function isValidURL(url)
{
	var RegExp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;

	if(RegExp.test(url)){
		return true;
	}else{
		return false;
	}
}
	
	
function removeHTMLTags(str)
{
 	
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



function limitText(limitField, limitCount, limitNum) {

	if (limitField.value.length > limitNum) {
		limitField.value = limitField.value.substring(0, limitNum);
	} else {
		limitCount.value = limitNum - limitField.value.length;
	}
}

</script>
 
 
 <style type="text/css">
.h3sel,.h3notsel{
	margin-right:3px;
}
</style>
<div id="tab_all" style=" margin-left:10px;">
	<?php
   ///////// 
	if($select=='facebook'){
		echo anchor('invites/facebook','<h3 class="h3notsel">'.INVITE_FACEBOOK.'</h3>');
	}
	else{
		echo anchor('invites/facebook/','<h3 class="h3sel">'.INVITE_FACEBOOK.'</h3>');
	}
	

	///////// 
	if($select=='email'){
		echo anchor('invites/email','<h3 class="h3notsel">'.INVITE_EMAIL.'</h3>');
	}
	else{
		echo anchor('invites/email/','<h3 class="h3sel">'.INVITE_EMAIL.'</h3>');
	}
	
	
	///////// 
	if($google_setting->google_enable==1) 
	{
		if($select=='google'){
			echo anchor('invites/gmail','<h3 class="h3notsel">'.INVITE_GMAIL.'</h3>');
		}
		else{
			echo anchor('invites/gmail/','<h3 class="h3sel">'.INVITE_GMAIL.'</h3>');
		}
	}
	
	
	///////// 
	if($yahoo_setting->yahoo_enable==1)
	{
		if($select=='yahoo'){
			echo anchor('invites/yahoo','<h3 class="h3notsel">'.INVITE_YAHOO.'</h3>');
		}
		else{
			echo anchor('invites/yahoo/','<h3 class="h3sel">'.INVITE_YAHOO.'</h3>');
		}
	}
	
	?>
    
	
	
	&nbsp;
</div>