<?php  $cur_url=base64_encode(current_url()); ?>

<div id="container">

<div class="wrap930">	



	<div class="con_left">

		<!--====================left==============--> 

		

		

	<script type="text/javascript">

	

	function assignamount(pid)

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

				//alert(xmlhttp.responseText);

				var rt = xmlhttp.responseText;

				

				//alert(rt);

				

				document.getElementById('amount').value = rt ;

				document.getElementById('perk_id').value = pid ;

				

			}

		}

		var url = '<?php echo site_url(); ?>project/get_perk_amount/'+pid;

		xmlhttp.open("POST",url,true);

		xmlhttp.send(null);

	}



function set_wallet_details(val){

				var totw = '<?php echo $total_wallet_amount; ?>';

				

				var subt = parseFloat(totw) - parseFloat(val);

				var gateway = document.getElementById("gateway").value;

				

						if(gateway=='wallet'){

				

				if(parseFloat(val) > parseFloat(totw)){

					document.getElementById('cannot_donate').innerHTML = '<?php  echo CANNOT_DONATE_MORE; ?>' ;

					

				}

				else{

					if(!isNaN(subt)){

						document.getElementById('remain_amt').innerHTML = subt.toFixed(2) ;

						document.getElementById('donate_amt').innerHTML = val ;

						document.getElementById('cannot_donate').innerHTML = '' ;

					}

					else{

						document.getElementById('donate_amt').innerHTML = '0' ;

					}	

				}

				

			}

			else{

				if(!isNaN(subt)){

						document.getElementById('remain_amt').innerHTML = subt.toFixed(2) ;

						document.getElementById('donate_amt').innerHTML = val ;

						document.getElementById('cannot_donate').innerHTML = '' ;

					}

					else{

						document.getElementById('donate_amt').innerHTML = '0' ;

					}	

			}	



}





			function return_set_wallet_details(){

				var val = document.getElementById('amount').value;

				

				var gateway = document.getElementById("gateway").value;//alert(gateway);

				

						if(gateway=='wallet'){

							var totw = '<?php echo $total_wallet_amount; ?>';

							

							var subt = parseFloat(totw) - parseFloat(val);

							if(val=='0' || val==0 || val==''){

								document.getElementById('cannot_donate').innerHTML = '<?php  echo ENTER_AMOUNT_GREATOR_THAN_ZERO; ?>' ;

								return false;

							}

							else if(parseFloat(val)<parseFloat(<?php echo $admin_amount->donation_amount; ?>)){

									document.getElementById('cannot_donate').innerHTML = '<?php echo YOU_CANNOT_DONATE_AMOUNT_LESS_THAN." ".set_currency($admin_amount->donation_amount); ?>';

									return false;

							}

							else if(parseFloat(val) > parseFloat(totw)){

								document.getElementById('cannot_donate').innerHTML = '<?php  echo CANNOT_DONATE_MORE; ?>' ;

								document.getElementById('add_donate_amount').innerHTML = '<?php  echo anchor("wallet/add_wallet/".$cur_url,CLICK_HERE_TO_ADD_AMOUNT_TO_YOUR_WALLET); ?>' ;

								return false;

							}

							else{

								if(!isNaN(subt)){

									document.getElementById('cannot_donate').innerHTML = '' ;

									//return true;

								   // var ans=  confirm('Are you sure you want to make donation to <?php //echo $project['project_title'];?>');

									

									   var url = document.getElementById("various1").href;//alert(url);

										var amount = document.getElementById("amount").value;//alert(amount);

										var perk = document.getElementById("perk_id").value;//alert(perk);

										if(perk=='' || perk=='0'){

											perk=0;

										}//alert(perk);

										var gateway = document.getElementById("gateway").value;//alert(gateway);

										var anonymous = document.getElementById("anonymous").value;//alert(anonymous);

										var email = document.getElementById("email").value;//alert(email);

										

									var newurl="<?php echo site_url('payment/add_fund_confirm/'.$project['project_id']); ?>/"+amount+"/"+perk+"/"+gateway+"/"+anonymous+"/"+email;	

									

										

										document.getElementById("various1").href=newurl;

										$('#various1').trigger('click');

										return false;

								}	

							}

							

				}else{

							

							if(val=='0' || val==0 || val==''){

								

								document.getElementById('cannot_donate').style.display='block';

								document.getElementById('cannot_donate').innerHTML = '<?php  echo ENTER_AMOUNT_GREATOR_THAN_ZERO; ?>' ;

								return false;

							}

							else if(parseFloat(val)<parseFloat(<?php echo $admin_amount->donation_amount; ?>)){

									document.getElementById('cannot_donate').style.display='block';

									document.getElementById('cannot_donate').innerHTML = '<?php echo YOU_CANNOT_DONATE_AMOUNT_LESS_THAN." ".set_currency($admin_amount->donation_amount); ?>';

									return false;

							}

							else if(gateway==''){

									document.getElementById('select_gateway').innerHTML = '<?php echo PLEASE_SELECT_PAYMENT_GATEWAY; ?>';

									return false;

							}

							else{

										document.getElementById('cannot_donate').style.display='none';

										var url = document.getElementById("various1").href;//alert(url);

										var amount = document.getElementById("amount").value;//alert(amount);

										var perk = document.getElementById("perk_id").value;//alert(perk);

										if(perk=='' || perk=='0'){

											perk=0;

										}//alert(perk);

										var gateway = document.getElementById("gateway").value;//alert(gateway);

										var anonymous = document.getElementById("anonymous").value;//alert(anonymous);

										var email = document.getElementById("email").value;//alert(email);

										

										

									var newurl="<?php echo site_url('payment/add_fund_confirm/'.$project['project_id']); ?>/"+amount+"/"+perk+"/"+gateway+"/"+anonymous+"/"+email;

										

										document.getElementById("various1").href=newurl;

										$('#various1').trigger('click');

										return false;

						 }			

				}	

				



			}

			

			

function show_wallet_details(){

		var val = document.getElementById('amount').value;

		set_wallet_details(val);

		document.getElementById('select_gateway').innerHTML='';

		

		var gat = document.getElementById('gateway3').checked;

		if(gat==true){

			document.getElementById('wallet_detail').style.display='block';

			document.getElementById('cannot_donate').style.display='block';

			

		}

		document.getElementById('gateway').value='wallet';

}



function hide_wallet_details(){

	document.getElementById('wallet_detail').style.display='none';

	document.getElementById('cannot_donate').style.display='none';

	document.getElementById('select_gateway').innerHTML='';

	

	if(document.getElementById('gateway1').checked){

		document.getElementById('gateway').value='amazon';

	}

	else if(document.getElementById('gateway2')){

		document.getElementById('gateway').value='paypal';

	}

	else if(document.getElementById('gateway3')){

		document.getElementById('gateway').value='paypal';

	}

	else{

		document.getElementById('gateway').value='';

	}

}



function set_anonymous_value(val){



	document.getElementById('anonymous').value=val;

}			

	</script>	



<h2 class="stitle" style="font-size:22px;"><?php echo JUST_FEW_STEPS_AWAY_BACKING_THIS_PROJECT; ?></h2>

		<br />

	<?php if($error!='') { ?><div align="center" class="error"> <?php echo $error; ?></div><?php } ?>

			  

			 

					

					

					

		

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

			document.getElementById('second').style.display = "none";

			document.getElementById('action').value = "upload";

		}

		else{

			document.getElementById('first').style.display = "none";

			document.getElementById('second').style.display = "block";

			document.getElementById('action').value = "video";

		}

	}

</script>



<?php if($this->session->userdata('user_id')=='') { ?>



			        

   

    <?php

	

	

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

?>		



<div  id="fb-root"></div>

 <script type="text/javascript">

window.fbAsyncInit = function() {

    FB.init({appId: '<?php echo $data['appkey']?>', status: true, cookie: true, xfbml: true});



    /* All the events registered */

    FB.Event.subscribe('auth.login', function(response) {

        // do something with response

       // login();

    });



    FB.Event.subscribe('auth.logout', function(response) {

    // do something with response

        //logout();

    });

};



(function() {

    var e = document.createElement('script');

    e.type = 'text/javascript';

    e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';

    e.async = true;

    document.getElementById('fb-root').appendChild(e);

}());



function login(){

    document.location.href = "<?php echo $data['base_url']; ?>";

}



function logout(){

    document.location.href = "<?php echo $data['base_url']; ?>";

}

</script>

<!-- END OF FB CODE -->	





        







   

   <div class="inner_content_two" style="border: 2px solid #2B5F94;background: white; padding:15px 0px;">

   

 

 

 

   <!--signup-->

   <div style="border-right:1px solid #2B5F94; width:313px; float:left;  padding:0px 8px 0px 8px;">

   

   

    <div style="color: #2B5F94; font-size:15px; font-weight:bold; padding:0px 0px 14px 8px;"><?php echo SIGNUP_TO_DONATE; ?></div>

    

    

    <div style="color: #2B5F94; font-size:12px; font-weight:normal; padding:0px 0px 14px 8px;"><?php echo NEED_FEW_DETAILS; ?></div>

    

    <div style="padding:5px 0px 0px 8px;">

    <?php

	$attributes = array('name'=>'frmsignup','autocomplete'=>'off');

	echo form_open_multipart('home/signup',$attributes);

?>

    

    

<h3><?php echo FIRST_NAME; ?> : *</h3>

<div class="txtbox_small"><input type="text" name="user_name" id="user_name" value="" class="btn_input"  /></div>

					

					

<h3><?php echo LAST_NAME; ?> : *</h3>

<div class="txtbox_small"><input type="text" name="last_name" id="last_name" value=""  class="btn_input" /></div>



	

					

<h3><?php echo YOUR_EMAIL; ?> : *</h3>

<div class="txtbox_small"><input type="text" name="email" id="email" value=""  class="btn_input" /></div>



<div style="clear:both;"></div>

<div style="font-size:10px; "><?php echo USE_FOR_PROJECT_ACCOUNT_AND_NOTIFICATION; ?><br /></div><br />



					

					

<h3><?php echo PASSWORD; ?> : *</h3>

<div class="txtbox_small"><input type="password" name="password" id="password" value=""   class="btn_input" /></div>



<div style="clear:both;"></div>

<div style="font-size:10px; ">(<?php echo MUST_BE_8_CHAR; ?>)</div><br />

					



<h3><?php echo CONFIRM_PASSWORD; ?> : *</h3>

<div class="txtbox_small"><input type="password" name="cpassword" id="cpassword" value=""   class="btn_input" /></div>



<div style="clear:both;"></div>

<div style="font-size:10px; ">(<?php echo MUST_BE_8_CHAR; ?>)</div>

					

					



					

				

<input type="hidden" name="file1" id="file1" value=""    />

					

					

		

		 

<div>

<?php

$p = array('src'=>'image/securimage','style'=>'padding-bottom:0px;');

echo img($p, TRUE);

?><br /><br />

</div>

						

					

<div class="txtbox_small"><input type="text" name="imagecode" id="imagecode"  class="btn_input"   /></div>

<br />



<input name="agree" id="agree" type="checkbox" value="yes" />

<label id="chklb"> <a href="javascript:void()" style="font-size:13px; font-weight:bold;" onclick="terms();"><?php echo AGREE_TERM_AND_CONDITION; ?></a></label>

		 

<br /><br />









<input type="hidden" name="prev_image" id="prev_image" value="" />

<input type="submit" class="submit" name="login" id="login" value="<?php echo SIGN_UP; ?> !!"  />

<input type="hidden" name="cur_url" id="cur_url" value="<?php echo $cur_url; ?>" />

                  

         

         

        

   

   </form>





<script type="text/javascript">

function terms()

{

window.open('<?php echo site_url('home/terms_and_conditions');?>','Terms and Conditions','height=500,width=500,top=250,left=300');

}

</script> 







</div>





    

   </div>

   <!--signup-->

   

   

   

   <!--login-->

   

   <div style="float:right; text-align:left;  width:330px; padding:0px 5px 0px 5px;">

   

   <div style="color: #2B5F94; font-size:15px; font-weight:bold; padding:0px 0px 14px 5px;"><?php echo ALREADY_ACCOUNT;?></div>

   

   

   <?php  

		$f_query = $this->db->getwhere('facebook_setting');

		$f_setting = $f_query->row_array();

		

		$t_query = $this->db->getwhere('twitter_setting');

		$t_setting = $t_query->row_array();



if($f_setting['facebook_login_enable'] == '1' || $t_setting['twitter_enable'] == '1'){

?>

  <table border="0" cellpadding="3" cellspacing="3">

 

 <?php if($f_setting['facebook_login_enable'] == '1'){ ?>

  <tr>

  <td align="left" valign="top">

  <!-- <a href="https://www.facebook.com/login.php?api_key=<?php //echo $data['appkey']; ?>&cancel_url=<?php //echo base_url();?>home&display=page&fbconnect=1&next=<?php //echo base_url();?>home/facebook&return_session=1&session_version=3&v=1.0&req_scope=email,read_stream,offline_access,user_birthday,status_update,publish_stream"></a>-->

   

    <a href="<?php echo $data['fbLoginURL']; ?>"><img src="<?php echo base_url(); ?>images2/fb_big.png" name="fbs"  onmouseover="document.fbs.src='<?php echo base_url();?>images2/fb_big_hover.png'" onmouseout="document.fbs.src='<?php echo base_url();?>images2/fb_big.png'" width="169" height="29" border="0"  alt="<?php echo SIGN_WITH_FACEBOOK; ?>" /></a>

    </td>

    </tr>

    <?php   }

				if($t_setting['twitter_enable'] == '1'){

			?>

    <tr>

    <td align="left" valign="top">    

   <a  href="<?php echo site_url('home/twitter_auth'); ?>" >

<img src="<?php echo base_url(); ?>images2/tw_big.png" name="tws"  width="169" height="29" onmouseover="document.tws.src='<?php echo base_url();?>images2/tw_big_hover.png'" onmouseout="document.tws.src='<?php echo base_url();?>images2/tw_big.png'"   alt="<?php echo SIGN_WITH_TWITTER; ?>" border="0" /></a>

	</td>

    </tr>

    <?php } ?>

    <tr>

    <td align="left" valign="top"><br />



    <h5><?php echo TIPS; ?></h5>

    <p style="font-size:12px;"><?php echo DONT_WORRY_NEVER_SPAM_FACEBOOK_WALL_TEXT; ?></p>

    </td>

    </tr>

    </table>

    

    <?php } ?>

    

    

    								

   

   

   <div style="padding:20px 0px 0px 6px;">

<script type="text/javascript">

function show_form(id1,id2)

{	

	document.getElementById(id1).style.display = "block";

	document.getElementById(id2).style.display = "none";

}

</script>





<?php



$attributes = array('name'=>'frm_login','id'=>'frm_login');



echo form_open_multipart('home/check_login/',$attributes);

?> 

   

   

<h3><?php echo YOUR_EMAIL; ?></h3>

<div class="txtbox_small"><input type="text" name="email" id="email" value="" class="btn_input" /></div><br/>

<h3><?php echo PASSWORD; ?></h3> 

<div class="txtbox_small"><input type="password" id="password" name="password" value="" class="btn_input" /></div><br/>



<label id="chklb"><a href="javascript:" style="font-size:13px;color:#7DBF0F; font-weight:bold;" onclick="show_form('frm_forget_password','frm_login')" ><?php echo FORGOT_PASSWORD; ?></a></label><p>&nbsp;</p>



<input type="submit" value="<?php echo LOGIN; ?>" class="submit" />

 <input type="hidden" name="cur_url" id="cur_url" value="<?php echo $cur_url; ?>" />





</form>

   

   

   

 <?php



$attributes = array('name'=>'frm_forget_password','id'=>'frm_forget_password','style'=>'display:none;');



echo form_open_multipart('home/forget_password/',$attributes);

?> 



  

<h3><?php  echo YOUR_EMAIL;?></h3>

<div class="txtbox_small"><input type="text" name="email2" id="email2" value="" class="btn_input" /></div><br/>



<label id="chklb"><a href="javascript:" style="font-size:13px;color:#7DBF0F; font-weight:bold;" onclick="show_form('frm_login','frm_forget_password')" ><?php echo BACK_TO_LOGIN; ?></a></label><p>&nbsp;</p>



<input type="submit" value="<?php echo SEND; ?>" class="submit" />

 <input type="hidden" name="cur_url" id="cur_url" value="<?php echo $cur_url; ?>" />





</form>

   

  

  

  </div>                                 

                                    

                                    

   

   

   </div>

   <!--login-->

   

   <div class="clear"></div>

   

   </div>

   <div class="clear"></div>

   

   

            





















<?php }  else { ?>





 					<?php

				  		$attributes = array('name'=>'frm_fund');

						echo form_open_multipart('reward/'.$id.'/'.$project_perk_id,$attributes);

					

				  	?>

					



    <script type="text/javascript">

$(document).ready(function() {

$("#various1").fancybox({

				'width'				: 555,

				'height'			: 157,

				'border-width'      : '0%',

				'autoScale'			: false,

				'transitionIn'		: 'none',

				'transitionOut'		: 'none',

				'type'				: 'iframe'

			});

});			

	</script>

<h2 style="color:#7DBF0E !important;font-size:21px;"><?php echo STEP1_PICK_AWARD; ?></h2>



<div class="inner_content_two">



			







<table border="0" cellpadding="0" cellspacing="0" width="100%">





<?php

		if($all_perks)

		{

			foreach($all_perks as $perk)

			{

				$available = $perk['perk_total'] - ($perk['perk_get']*1);

	?>

		<tr>

		<td align="left" valign="top" width="140" style="color:#434343 !important; font-size:15px; font-weight:bold;   text-transform:capitalize;"><input type="radio" name="selected_perk_id" id="selected_perk_id"  <?php if($project_perk_id==$perk['perk_id']) { ?> checked="checked"  <?php } ?> value="<?php echo $perk['perk_id']; ?>" onclick="assignamount(this.value)" />&nbsp;<?php echo set_currency($perk['perk_amount']); ?>+</td><td align="left" valign="top"><span style="color:#434343 !important; font-size:15px; font-weight:bold;   text-transform:capitalize;"><?php echo $perk['perk_title']; ?></span></td>

</tr>		

<tr><td>&nbsp;</td><td align="left" valign="top" style="padding:10px 0px 5px 0px;"><?php echo $perk['perk_description']; ?></td></tr>



<tr><td style="border-bottom:1px solid #cccccc;">&nbsp;</td><td align="left" valign="top" style="border-bottom:1px solid #cccccc;">

			<div style="color:#114A75;margin:4px 0px 5px 0px;"><span style="font-weight:normal;color:#7DBF0E; font-size:13px; font-weight:bold;"> <?php echo $available; ?> <?php echo AVAILABLE; ?></span></div>

						

			</td>

			</tr>

			<tr><td colspan="2" height="10"></td></tr>

			

		

	<?php

			}

		} else {

	?>

		<tr><td colspan="2" align="center" valign="middle" height="10"><span style="font-size:14px; color:#114A75; font-weight:bold;"><?php echo NO_PERK_HAS_BEEN_CREATED;?></span></td></tr>

		

	<?php } ?>	

</table>





</div>







<div style="clear:both;"></div>

<div style="height:20px;"></div>



<h2 style="color:#7DBF0E !important;font-size:21px;"><?php echo STEP2_ADJUST_BACKING_AMMOUNT; ?></h2>



<div class="inner_content_two">











<table border="0" cellpadding="0" cellspacing="0" width="100%" >





<tr>

<td align="left" valign="top" style="padding:5px 0px 0px 20px; font-size:14px;"><?php echo $site_setting['currency_symbol']; ?></td><td align="left" valign="top"><input type="text" class="btn_input" name="amount" id="amount" value="<?php echo $amount ;?>" onkeyup="set_wallet_details(this.value)" onchange="set_wallet_details(this.value)" />





</td>



<td align="left" valign="top" width="300" style="  font-size:14px; color:#999999; font-style:italic;"><?php echo DONT_STICK_PRICE_OF_AWARD; ?>.</td>



</tr>

<?php  if($amazons->gateway_status!='1' &&  $paypal->gateway_status!='1' && $wallet_setting->wallet_enable==1) {

								$dis = 'block';

							}

							else{

								$dis = 'block';

							}

							?>

<tr><td colspan="3" height="30"><p id="cannot_donate" style="color:#f00; font-size:11px; padding-bottom:12px; line-height:0px; display:<?php echo $dis; ?>">&nbsp;</p><p id="add_donate_amount" style="color:#7DBF0F; padding-bottom:0px; line-height:12px;">&nbsp;</p></td></tr>



</table>





</div>









<div style="clear:both;"></div>

<div style="height:20px;"></div>



<h2 style="color:#7DBF0E !important;font-size:21px;"><?php echo STEP2_PERSONALIZATION; ?></h2>



<div class="inner_content_two">





				

	

					<div class="form-element-container">

						<div class="form-label">

							<label class="normal_label">

							

							<?php 

										

				

				

								  if($amazons->gateway_status=='1' &&  $paypal->gateway_status=='1' && $wallet_setting->wallet_enable==1 && $user_paypal=='1' && $user_amazon=='1' && $total_wallet_amount>0) {

								  

								  	// echo AMAZON_PAYPAL_WALLET_NO_NEED_EMAIL; 				  

								  								  

								  }

								  

								  

								  

								  

								    elseif($amazons->gateway_status=='1' &&  $paypal->gateway_status=='1' && $user_paypal=='1' && $user_amazon=='1') {

								  

								  	// echo AMAZON_PAYPAL_PAYEE_EMAIL;				  

								  								  

								  }

								  

								  

								  

								  

								   elseif($wallet_setting->wallet_enable==1 && $paypal->gateway_status=='1' && $total_wallet_amount>0 && $user_paypal==1) {

								 

								

								// echo PAYPAL_PAYEE_EMAIL_WALLET_NO_NEED_EMAIL;

								 

							

									 								 

								 }							 

								

								

								 elseif($wallet_setting->wallet_enable==1 && $amazons->gateway_status=='1' && $total_wallet_amount>0 && $user_amazon==1) {

								

								

								// echo AMAZON_PAYEE_EMAIL_WALLET_NO_NEED_EMAIL;

								 

								

								 }	 

								 

								  elseif($amazons->gateway_status=='1' && $user_amazon==1) { 

								 

								 //	echo AMAZON_PAYEE_EMAIL;

								 

								 	}

								 

								 

								 elseif($paypal->gateway_status=='1' && $user_paypal==1) { 

							

									//echo PAYPAL_PAYEE_EMAIL;

									

								 }

								 

								 

								 elseif($wallet_setting->wallet_enable==1 && $total_wallet_amount>0) {

								 

								// echo WALLET;

								 

								 }

								

								  

								  else {

								  

								  //	 echo PAYPAL_PAYEE_EMAIL;

								  }

								 

								 

							

							 ?>

                            

                            

                           </label>

                             

							</div>

							

                            

                            <?php 

							

							$login_user=get_user_detail($this->session->userdata('user_id'));

							  

					if($amazons->gateway_status=='1' &&  $paypal->gateway_status=='1' && $wallet_setting->wallet_enable==1) {

											

							

							if($login_user['paypal_email']!='') { ?>

                            

                           <!-- <input type="text" name="email" id="email" value="<?php //echo $login_user['paypal_email']; ?>" class="btn_input" />  <br/><div style="margin-left:150px;">(<?php //echo THIS_EMAIL_ADDRESS_KEEP_PRIVATE; ?>)</div> -->

                            

                            <?php } else { ?>                          

                            

                            

                            <!--<input type="text" name="email" id="email" value="<?php //echo $email; ?>" class="btn_input"  />

                              <br/><div style="margin-left:150px;">(<?php //echo THIS_EMAIL_ADDRESS_KEEP_PRIVATE; ?>)</div> -->

                            <?php } 

							

							

							

							

							}  elseif($wallet_setting->wallet_enable==1 && $paypal->gateway_status=='1') {

							

								

								if($login_user['paypal_email']!='') { ?>

                            

                           <!-- <input type="text" name="email" id="email" value="<?php //echo $login_user['paypal_email']; ?>" class="btn_input" />  <br/><div style="margin-left:150px;">(<?php //echo THIS_EMAIL_ADDRESS_KEEP_PRIVATE; ?>)</div> -->

                            

                            <?php } else { ?>                          

                            

                            

                           <!-- <input type="text" name="email" id="email" value="<?php //echo $email; ?>" class="btn_input"  />

                              <br/><div style="margin-left:150px;">(<?php //echo THIS_EMAIL_ADDRESS_KEEP_PRIVATE; ?>)</div> -->

                            <?php } 

							

							

							

							

							}  elseif($wallet_setting->wallet_enable==1 && $amazons->gateway_status=='1') {

							

							

							

							if($login_user['paypal_email']!='') { ?>

                            

                            <!--<input type="text" name="email" id="email" value="<?php //echo $login_user['paypal_email']; ?>" class="btn_input" />  <br/><div style="margin-left:150px;">(<?php //echo THIS_EMAIL_ADDRESS_KEEP_PRIVATE; ?>)</div> -->

                            

                            <?php } else { ?>                          

                            

                            

                            <!--<input type="text" name="email" id="email" value="<?php //echo $email; ?>" class="btn_input"  />

                              <br/><div style="margin-left:150px;">(<?php //echo THIS_EMAIL_ADDRESS_KEEP_PRIVATE; ?>)</div> -->

                            <?php } 

							

							

							

							} elseif($amazons->gateway_status=='1') { 

							

							

								if($login_user['paypal_email']!='') { ?>

                            

                            <!--<input type="text" name="email" id="email" value="<?php //echo $login_user['paypal_email']; ?>" class="btn_input" />  <br/><div style="margin-left:150px;">(<?php //echo THIS_EMAIL_ADDRESS_KEEP_PRIVATE; ?>)</div> -->

                            

                            <?php } else { ?>                          

                            

                            

                            <!--<input type="text" name="email" id="email" value="<?php //echo $email; ?>" class="btn_input"  />

                              <br/><div style="margin-left:150px;">(<?php //echo THIS_EMAIL_ADDRESS_KEEP_PRIVATE; ?>)</div> -->

                            <?php }  

							

							

							

							}  elseif($paypal->gateway_status=='1') { 

							

								

								if($login_user['paypal_email']!='') { ?>

                            

                            <!--<input type="text" name="email" id="email" value="<?php //echo $login_user['paypal_email']; ?>" class="btn_input" />

                              <br/><div style="margin-left:150px;">(<?php //echo THIS_EMAIL_ADDRESS_KEEP_PRIVATE; ?>)</div> -->

                            <?php } else { ?>                          

                            

                            

                           <!-- <input type="text" name="email" id="email" value="<?php //echo $email; ?>" class="btn_input"  />

                              <br/><div style="margin-left:150px;">(<?php //echo THIS_EMAIL_ADDRESS_KEEP_PRIVATE; ?>)</div> -->

                            <?php }  

							

						}  elseif($wallet_setting->wallet_enable==1) { 

						

						/*	$remain = $total_wallet_amount-$amount;	

							echo '<p><b>'.YOUR_CURRENT_BALANCE.' : </b>'.$site_setting['currency_symbol'].$total_wallet_amount.'</p>'; 

							echo '<p><b>'.YOUR_DONATE_AMOUNT.' : </b>'.$site_setting['currency_symbol'].'<span id="donate_amt">'.$amount.'</span></p>'; 

							echo '<p><b>'.REMAINING_BALANCE.' : </b>'.$site_setting['currency_symbol'].'<span id="remain_amt">'.$remain.'</span></p>'; */

						

						} else {

						

							

								if($login_user['paypal_email']!='') { ?>

                            

                           <!-- <input type="text" name="email" id="email" value="<?php //echo $login_user['paypal_email']; ?>" class="btn_input" />  <br/><div style="margin-left:150px;">(<?php //echo THIS_EMAIL_ADDRESS_KEEP_PRIVATE; ?>)</div> -->

                            

                            <?php } else { ?>                          

                            

                            

                           <!-- <input type="text" name="email" id="email" value="<?php //echo $email; ?>" class="btn_input"  />

                              <br/><div style="margin-left:150px;">(<?php //echo THIS_EMAIL_ADDRESS_KEEP_PRIVATE; ?>)</div> -->

                            <?php }  

						

						}

							

							?>

                            

                            

                            

                          

					  </div>	

					  

					  

					  

					  

				

					  

					  

					  

				<?php if($amazons->gateway_status=='1' && $paypal->gateway_status=='1' && $wallet_setting->wallet_enable==1 && $user_paypal=='1' && $user_amazon=='1' && $total_wallet_amount>0) {  

				

						

				

				

				?>

			  

			   <div class="form-element-container">

				<div class="form-label">

					<label class="normal_label"><?php echo PAYMENT_GATEWAY_TYPE; ?> : *</label>

					</div>

					

				<table border="0" cellpadding="0" cellspacing="3" width="250">				

				<tr>

			

				<td align="left" valign="top"><input type="radio" value="amazon" id="gateway1" name="gateway" onclick="hide_wallet_details();" /></td>

				<td align="left" valign="top"><img src="<?php echo base_url(); ?>images/amazon.png" border="0" /></td>

				

				<td align="left" valign="top"><input type="radio" value="paypal" id="gateway2" name="gateway" onclick="hide_wallet_details();"/></td>

				<td align="left" valign="top"><img src="<?php echo base_url(); ?>images/paypal.png" border="0" /></td>	

				

				<td align="left" valign="top"><input type="radio" value="wallet" id="gateway3" name="gateway" onclick="show_wallet_details();"/></td>

				<td align="left" valign="top"><b><?php echo WALLET; ?></b></td>

				

				

				</tr>

                <tr><td colspan="3" height="5"><p id="select_gateway" style="color:#F00; padding-bottom:0px; line-height:12px;">&nbsp;</p></td></tr>				

				</table>	<input type="hidden" value="" id="gateway" name="gateway" />				

				</div>

					  

				<?php 			  

				

							

				} 	

				

				

				  elseif($amazons->gateway_status=='1' &&  $paypal->gateway_status=='1' && $user_paypal=='1' && $user_amazon=='1') {  ?>

				  

				  <div class="form-element-container">

				<div class="form-label">

					<label class="normal_label"><?php echo PAYMENT_GATEWAY_TYPE; ?> : *</label>

					</div>

					

				<table border="0" cellpadding="0" cellspacing="3" width="250">				

				<tr>

			

				<td align="left" valign="top"><input type="hidden" value="" id="gateway3" name="gateway" />	<input type="radio" value="amazon" id="gateway1" name="gateway" onclick="hide_wallet_details();"/></td>

				<td align="left" valign="top"><img src="<?php echo base_url(); ?>images/amazon.png" border="0" /></td>

				

				<td align="left" valign="top"><input type="radio" value="paypal" id="gateway2" name="gateway" onclick="hide_wallet_details();"/></td>

				<td align="left" valign="top"><img src="<?php echo base_url(); ?>images/paypal.png" border="0" /></td>	

								

				</tr>

                <tr><td colspan="3" height="5"><p id="select_gateway" style="color:#F00; padding-bottom:0px; line-height:12px;">&nbsp;</p></td></tr>					

				</table>	<input type="hidden" value="" id="gateway" name="gateway" />				

				</div>

				  

				<?php  }

				

				

				 elseif( $wallet_setting->wallet_enable==1 &&  $paypal->gateway_status=='1' && $user_paypal=='1' && $total_wallet_amount>0) {

				

			

				

				 ?>

				

				

				 <div class="form-element-container">

				<div class="form-label">

					<label class="normal_label"><?php  echo PAYMENT_GATEWAY_TYPE; ?> : *</label>

					</div>

					

				<table border="0" cellpadding="0" cellspacing="3" width="250">				

				<tr>			

								

				<td align="left" valign="top"><input type="hidden" value="" id="gateway1" name="gateway" />	<input type="radio" value="paypal" id="gateway2" name="gateway" onclick="hide_wallet_details();"/></td>

				<td align="left" valign="top"><img src="<?php echo base_url(); ?>images/paypal.png" border="0" /></td>	

				

				<td align="left" valign="top"><input type="radio" value="wallet" id="gateway3" name="gateway" onclick="show_wallet_details();"/></td>

				<td align="left" valign="top"><B><?php echo WALLET; ?></B></td>

				

				

				</tr>	

                <tr><td colspan="3" height="5"><p id="select_gateway" style="color:#F00; padding-bottom:0px; line-height:12px;">&nbsp;</p></td></tr>				

				</table>		<input type="hidden" value="" id="gateway" name="gateway" />				

				</div>

				

				

				<?php  } 

				

				

				elseif( $wallet_setting->wallet_enable==1 &&  $amazons->gateway_status=='1' && $user_amazon=='1' && $total_wallet_amount>0) { 

				

				

				

				?>

				

				

				 <div class="form-element-container">

				<div class="form-label">

					<label class="normal_label"><?php echo PAYMENT_GATEWAY_TYPE; ?> : *</label>

					</div>

					

				<table border="0" cellpadding="0" cellspacing="3" width="250">				

				<tr>

			

				<td align="left" valign="top"><input type="hidden" value="" id="gateway2" name="gateway" />	<input type="radio" value="amazon" id="gateway1" name="gateway" onclick="hide_wallet_details();"/></td>

				<td align="left" valign="top"><img src="<?php echo base_url(); ?>images/amazon.png" border="0" /></td>

												

				<td align="left" valign="top"><input type="radio" value="wallet" id="gateway3" name="gateway" onclick="show_wallet_details();"/></td>

				<td align="left" valign="top"><b><?php echo WALLET; ?></b></td>

				

				

				</tr>	

                <tr><td colspan="3" height="5"><p id="select_gateway" style="color:#F00; padding-bottom:0px; line-height:12px;">&nbsp;</p></td></tr>				

				</table>	<input type="hidden" value="" id="gateway" name="gateway" />					

				</div>

				

				<?php  } 

				

				

				elseif($amazons->gateway_status=='1' && $user_amazon=='1') {  ?>

                

                <input type="hidden" name="gateway" id="gateway" value="amazon" />

                

                <?php } 

				

				elseif($paypal->gateway_status=='1' && $user_paypal=='1') {  ?>

				

				<input type="hidden" name="gateway" id="gateway" value="paypal" />

				

				<?php } 

				

				elseif($wallet_setting->wallet_enable==1 && $total_wallet_amount>0) {  ?>

				

				<input type="hidden" name="gateway" id="gateway" value="wallet" />

				

				<?php } else {  ?>

                

                 <input type="hidden" name="gateway" id="gateway" value="wallet" />

                 

                 <?php } ?>

                			

				 

					  

					  	<?php

                    		$remain = $total_wallet_amount-$amount;	

							if($amazons->gateway_status!='1' &&  $paypal->gateway_status!='1' && $wallet_setting->wallet_enable==1) {

								$dis = 'block';

							}

							else{

								$dis = 'none';

							}

							echo '<div id="wallet_detail" style="display:'.$dis.';" class="form-element-container">';

							//echo '<p><b>'.YOUR_CURRENT_BALANCE.' : </b>'.$site_setting['currency_symbol'].$total_wallet_amount.'</p>'; 

							//echo '<p><b>'.YOUR_DONATE_AMOUNT.' : </b>'.$site_setting['currency_symbol'].'<span id="donate_amt">'.$amount.'</span></p>'; 

							//echo '<p><b>'.REMAINING_BALANCE.' : </b>'.$site_setting['currency_symbol'].'<span id="remain_amt">'.$remain.'</span></p>'; 

							?>

							<div class="form-label"  style="width:160px;">

                                <label class="normal_label">&nbsp;<?php echo YOUR_CURRENT_BALANCE; ?>(<?php echo  $site_setting['currency_symbol']; ?>) : </label>

                                </div>

                                

                            <table border="0" cellpadding="0" cellspacing="3" width="400">				

                               <tr><td align="left" valign="top"><?php echo $total_wallet_amount; ?></td></tr>                           

                             </table>

                             

                             <div class="form-label" style="width:160px;">

                                <label class="normal_label">&nbsp;<?php echo YOUR_DONATE_AMOUNT; ?>(<?php echo  $site_setting['currency_symbol']; ?>) : </label>

                                </div>

                                

                            <table border="0" cellpadding="0" cellspacing="3" width="400">				

                               <tr><td align="left" valign="top"><?php echo '<span id="donate_amt">'.$amount.'</span>'; ?></td></tr>                           

                             </table>

                             

                             <div class="form-label" style="width:160px;">

                                <label class="normal_label">&nbsp;<?php echo REMAINING_BALANCE; ?>(<?php echo  $site_setting['currency_symbol']; ?>) : </label>

                                </div>

                                

                            <table border="0" cellpadding="0" cellspacing="3" width="400">				

                               <tr><td align="left" valign="top"><?php echo '<span id="remain_amt">'.$remain.'</span>'; ?></td></tr>                           

                             </table>

							<?php

							echo '</div>';

					

					?>  

					  

					  

					<div class="form-element-container">

				<div class="form-label">

					<label class="normal_label">&nbsp;<?php echo DONATION_TYPE; ?> : *</label>

					</div>

					

				<table border="0" cellpadding="0" cellspacing="3" width="400">				

						

								

				<tr><td align="left" valign="top"><input type="radio" value="1" id="anonymous1" name="anonymous" <?php if($anonymous!='2' and $anonymous!='3'){ echo 'checked="checked"'; } ?> onclick="set_anonymous_value('1');" /></td>

				<td align="left" valign="top"><?php echo VISIBLE_SHOW_MY_NAME_AND_HOW_MUCH_I_BACKED; ?></td>	</tr>

				

				<tr><td align="left" valign="top"><input type="radio" value="2" id="anonymous2" name="anonymous" <?php if($anonymous=='2'){ echo 'checked="checked"'; } ?> onclick="set_anonymous_value('2');"/></td>

				<td align="left" valign="top"><?php echo NAME_ONLY_SHOW_MY_NAME_BUT_NOT_MY_BACK_AMOUNT; ?></td>	</tr>

				

                <tr><td align="left" valign="top"><input type="radio" value="3" id="anonymous3" name="anonymous" <?php if($anonymous=='3'){ echo 'checked="checked"'; } ?> onclick="set_anonymous_value('3');"/></td>

				<td align="left" valign="top"><?php echo ANONYMOUS_DO_NOT_SHOW_MY_NAME_OR_MY_BACK_AMOUNT; ?></td>	</tr>

				

							

				</table><input type="hidden" value="<?php if($anonymous!='2' and $anonymous!='3'){ echo 1; }else{ echo $anonymous; }  ?>" id="anonymous" name="anonymous"  />					

				</div>	  

					  

					  				  				  

					<a href="javascript:" id="various1">&nbsp;</a>

					

					

					<div  style="float: left;padding-left: 150px;margin-right: 20px;">

					 <input type="submit" class="submit" value="<?php echo CONTRIBUTE; ?>" name="add" id="add" onclick="return return_set_wallet_details();" /> </div>

<div class="form-element-container" style="margin-left:150px;">

<input type="hidden" name="docomment" id="docomment" value="do_comment" />			

<input type="hidden" name="perk_id" id="perk_id" value="<?php echo $project_perk_id; ?>" />

<input type="hidden" name="project_id" id="project_id" value="<?php echo $id; ?>" />



<input type="hidden" name="email" id="email" value="" />

			  

			  </div>



<div style="clear:both;"></div>

</div>







<?php } ?>





<div style="clear:both;"></div>



	  



<!--====================left end==============--> 

	</div>   