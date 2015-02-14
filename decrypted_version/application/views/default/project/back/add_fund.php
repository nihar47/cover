<?php  $cur_url=base64_encode(current_url()); ?>

<section>
<div id="page_we">
<div class="section_contain section_contain_review">
  <div class="con_left"> 
    
    <!--====================left==============-->
    
    <h2 class="stitle"><?php echo JUST_FEW_STEPS_AWAY_BACKING_THIS_PROJECT; ?></h2>
    <br />
    <?php if($error!='') { ?>
    <div align="center" class="error"> <?php echo $error; ?></div>
    <?php } ?>
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
      
      <div style="border-right:1px solid #2B5F94; width:320px; float:left;  padding:0px 8px 0px 8px;">
        <div style="color: #2B5F94; font-size:15px; font-weight:bold; padding:0px 0px 14px 8px;"><?php echo SIGNUP_TO_DONATE; ?></div>
        <div style="color: #2B5F94; font-size:12px; font-weight:normal; padding:0px 0px 14px 8px;"><?php echo NEED_FEW_DETAILS; ?></div>
        
        <!--<div style="padding:5px 0px 0px 8px;">

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

							echo recaptcha_get_html($site_setting['captcha_public_key'], $error1);

						?> 

<?php

//$p = array('src'=>'image/securimage','style'=>'padding-bottom:0px;');

//echo img($p, TRUE);

?><br /><br />

</div>

						

					

<div class="txtbox_small"><input type="hidden" name="imagecode" id="imagecode"  class="btn_input"   /></div>





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

window.open('<?php echo site_url('home/terms_and_conditions');?>', TERMS_CONDITIONS,'height=500,width=500,top=250,left=300');

}

</script> 







</div>--> 
        
      </div>
      
      <!--signup--> 
      
      <!--login-->
      
      <div style="float:right; text-align:left;  width:320px; padding:0px 5px 0px 5px;">
        <div style="color: #2B5F94; font-size:15px; font-weight:bold; padding:0px 0px 14px 5px;"><?php echo ALREADY_ACCOUNT;?></div>
        <?php  

		$f_query = $this->db->get_where('facebook_setting');

		$f_setting = $f_query->row_array();

		

		$t_query = $this->db->get_where('twitter_setting');

		$t_setting = $t_query->row_array();



if($f_setting['facebook_login_enable'] == '1' || $t_setting['twitter_enable'] == '1'){

?>
        <table border="0" cellpadding="3" cellspacing="3">
          <?php if($f_setting['facebook_login_enable'] == '1'){ ?>
          <tr>
            <td align="left" valign="top"><a href="<?php echo $data['fbLoginURL']; ?>"><img src="<?php echo base_url(); ?>images2/fb_big.png" name="fbs"  onmouseover="document.fbs.src='<?php echo base_url();?>images2/fb_big_hover.png'" onmouseout="document.fbs.src='<?php echo base_url();?>images2/fb_big.png'" width="169" height="29" border="0"  alt="<?php echo SIGN_WITH_FACEBOOK; ?>" /></a></td>
          </tr>
          <?php   }

				if($t_setting['twitter_enable'] == '1'){

			?>
          <tr>
            <td align="left" valign="top"><a  href="<?php echo site_url('home/twitter_auth'); ?>" > <img src="<?php echo base_url(); ?>images2/tw_big.png" name="tws"  width="169" height="29" onmouseover="document.tws.src='<?php echo base_url();?>images2/tw_big_hover.png'" onmouseout="document.tws.src='<?php echo base_url();?>images2/tw_big.png'"   alt="<?php echo SIGN_WITH_TWITTER; ?>" border="0" /></a></td>
          </tr>
          <?php } ?>
          <tr>
            <td align="left" valign="top"><br />
              <h5><?php echo TIPS; ?></h5>
              <p style="font-size:12px;"><?php echo DONT_WORRY_NEVER_SPAM_FACEBOOK_WALL_TEXT; ?></p></td>
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
          <div class="txtbox_small">
            <input type="text" name="email" id="email" value="" class="btn_input" />
          </div>
          <br/>
          <h3><?php echo PASSWORD; ?></h3>
          <div class="txtbox_small">
            <input type="password" id="password" name="password" value="" class="btn_input" />
          </div>
          <br/>
          <label id="chklb"><a href="javascript:" style="font-size:13px;color:#7DBF0F; font-weight:bold;" onclick="show_form('frm_forget_password','frm_login')" ><?php echo FORGOT_PASSWORD; ?></a></label>
          <p>&nbsp;</p>
          <input type="submit" value="<?php echo LOGIN; ?>" class="submit" />
          <input type="hidden" name="cur_url" id="cur_url" value="<?php echo $cur_url; ?>" />
          </form>
          <?php



$attributes = array('name'=>'frm_forget_password','id'=>'frm_forget_password','style'=>'display:none;');



echo form_open_multipart('home/forget_password/',$attributes);

?>
          <h3>
            <?php  echo YOUR_EMAIL;?>
          </h3>
          <div class="txtbox_small">
            <input type="text" name="email2" id="email2" value="" class="btn_input" />
          </div>
          <br/>
          <label id="chklb"><a href="javascript:" style="font-size:13px;color:#7DBF0F; font-weight:bold;" onclick="show_form('frm_login','frm_forget_password')" ><?php echo BACK_TO_LOGIN; ?></a></label>
          <p>&nbsp;</p>
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
    <?php $login_user = get_user_detail($this->session->userdata('user_id'));?>
    <script type="text/javascript">

	

	function isValidNumber(val) {



	if (!/^\d+$/.test(val)) {



		return false;



	}



	return true;



}



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

				document.getElementById('amount').value=rt;

				document.getElementById('perk_amount').value=rt;

				//alert(rt);

				

				

			}

		}

		var url = '<?php echo site_url(); ?>project/get_perk_amount/'+pid;

		xmlhttp.open("POST",url,true);

		xmlhttp.send(null);

	}



function set_wallet_details(val){





                   var testPattern=/^[0-9]*\.?[0-9]*$/;

	  

					if(testPattern.test(val)==false && val !='')

					 {

						document.getElementById('cannot_donate').style.display='block';

						document.getElementById('cannot_donate').innerHTML = '<?php echo ONLY_NUMERIC_VALUE; ?>' ;

						document.getElementById('amount').value='';

					}

					else

					{

						document.getElementById('cannot_donate').style.display='none';

					}

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

			

					var perk = document.getElementById("perk_id").value;//alert(perk);

					if(perk=='' || perk=='0'){

						perk=0;

					}//alert(perk);

					var perkamt = document.getElementById('perk_amount').value;

					

						

						if(gateway=='wallet'){

							var totw = '<?php echo $total_wallet_amount; ?>';

							

							var subt = parseFloat(totw) - parseFloat(val);

							if(val=='0' || val==0 || val==''){

								document.getElementById('cannot_donate').innerHTML = '<?php  echo ENTER_AMOUNT_GREATOR_THAN_ZERO; ?>' ;

								return false;

							}

							else if(parseFloat(val)<parseFloat(<?php echo $admin_amount->donation_amount; ?>)){

									document.getElementById('cannot_donate').style.display='block';

									document.getElementById('cannot_donate').innerHTML = '<?php echo YOU_CANNOT_DONATE_AMOUNT_LESS_THAN." ".set_currency($admin_amount->donation_amount); ?>';

									return false;

							}

							else if(perk > 0 && parseFloat(val)<parseFloat(perkamt)){

							

									document.getElementById('cannot_donate').style.display='block';

									document.getElementById('cannot_donate').innerHTML = '<?php echo YOU_CANNOT_DONATE_AMOUNT_LESS_THAN_PERK_YOU_HAVE_SELECTED; ?>';

									

									return false;

							}

							

							else if(parseFloat(val)>=parseFloat(<?php echo $admin_amount->maximum_donation_amount; ?>)){

									document.getElementById('cannot_donate').style.display='block';

									document.getElementById('cannot_donate').innerHTML = '<?php echo YOU_CANNOT_DONATE_GREATER_THAN." ".set_currency($admin_amount->maximum_donation_amount); ?>';

									return false;

							}

							else if(parseFloat(val) > parseFloat(totw)){

								document.getElementById('cannot_donate').style.display='block';

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

							

				}

						

						

						else if(gateway=='credit'){

							

							

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

							else if(perk > 0 && parseFloat(val)<parseFloat(perkamt)){

								

									document.getElementById('cannot_donate').style.display='block';

									document.getElementById('cannot_donate').innerHTML = '<?php echo YOU_CANNOT_DONATE_AMOUNT_LESS_THAN_PERK_YOU_HAVE_SELECTED; ?>';

									

									return false;

							}

							else if(parseFloat(val)>=parseFloat(<?php echo $admin_amount->maximum_donation_amount; ?>)){

								

								document.getElementById('cannot_donate').style.display='block';

								document.getElementById('cannot_donate').innerHTML = '<?php echo YOU_CANNOT_DONATE_GREATER_THAN." ".set_currency($admin_amount->maximum_donation_amount); ?>';

									return false;

							}

							else if(gateway==''){

								document.getElementById('select_gateway').innerHTML = '<?php echo PLEASE_SELECT_PAYMENT_GATEWAY; ?>';

								return false;

							}

							else

							{

							

									var cardnumber = document.getElementById("cardnumber").value;

									

									if(cardnumber.length<12)

									{

										document.getElementById('creditcarderror').style.display='block';

										document.getElementById('creditcarderror').innerHTML = '<p><?php echo ENTER_VALID_CREDIT_CARD_NUMBER; ?></p>';

										return false;

									}

									

									else if(cardnumber.length>19)

									{

										document.getElementById('creditcarderror').style.display='block';

										document.getElementById('creditcarderror').innerHTML = '<p><?php echo ENTER_VALID_CREDIT_CARD_NUMBER; ?></p>';

										return false;

									}

									else if(!isValidNumber(cardnumber))

									{

										document.getElementById('creditcarderror').style.display='block';

										document.getElementById('creditcarderror').innerHTML = '<p><?php echo ENTER_VALID_CREDIT_CARD_NUMBER; ?></p>';

										return false;

									}

									

									

									

									

									var cvv2Number = document.getElementById("cvv2Number").value;

									

									

									if(cvv2Number.length!=3)

									{

										document.getElementById('creditcarderror').style.display='block';

										document.getElementById('creditcarderror').innerHTML = '<p><?php echo ENTER_VALID_CVV_NUMBER; ?></p>';

										return false;

									}

									else if(!isValidNumber(cvv2Number))

									{

										document.getElementById('creditcarderror').style.display='block';

										document.getElementById('creditcarderror').innerHTML = '<p><?php echo ENTER_VALID_CVV_NUMBER; ?></p>';

										return false;

									}

									

									

									

									var cardtype = document.getElementById("cardtype").value;

									

									if(cardtype=='')

									{

										document.getElementById('creditcarderror').style.display='block';

										document.getElementById('creditcarderror').innerHTML = '<p><?php echo SELECT_CARD_TYPE; ?></p>';

										return false;

									}

									

																		

									var card_expiration_month = document.getElementById("card_expiration_month").value;

									

									

									if(card_expiration_month=='')

									{

										document.getElementById('creditcarderror').style.display='block';

										document.getElementById('creditcarderror').innerHTML = '<p><?php echo SELECT_CARD_EXPIRY_MONTH; ?></p>';

										return false;

									}

									else if(card_expiration_month>12 || card_expiration_month<0)

									{

										document.getElementById('creditcarderror').style.display='block';

										document.getElementById('creditcarderror').innerHTML = '<p><?php echo SELECT_CARD_EXPIRY_MONTH; ?></p>';

										return false;

									}

									

									

									

									

									var card_expiration_year = document.getElementById("card_expiration_year").value;

									

									var d = new Date();

									var curyear=d.getFullYear();





									

									if(card_expiration_year=='')

									{

										document.getElementById('creditcarderror').style.display='block';

										document.getElementById('creditcarderror').innerHTML = '<p><?php echo SELECT_CARD_EXPIRY_YEAR; ?></p>';

										return false;

									}

									else if(card_expiration_year<curyear)

									{

										document.getElementById('creditcarderror').style.display='block';

										document.getElementById('creditcarderror').innerHTML = '<p><?php echo SELECT_CARD_EXPIRY_YEAR_CURRENT_OR_MORE_THAN_IT; ?></p>';

										return false;

									}

									

									

									var alpha=/^[a-zA-Z]+$/;

									var alphaspace=/^[a-z A-Z]+$/;

									var alphanum=/^[a-zA-Z0-9]+$/;

									var filter = alpha;

									var filter2 = alphaspace;

									var filter3 = alphanum;

									

		

									

									var card_first_name = document.getElementById("card_first_name").value;

									

									

									

									if(card_first_name=='')

									{

										document.getElementById('creditcarderror').style.display='block';

										document.getElementById('creditcarderror').innerHTML = '<p><?php echo PLEASE_ENTER_FIRST_NAME; ?></p>';

										return false;

									}

									

									else if(card_first_name.length<3)

									{

										document.getElementById('creditcarderror').style.display='block';

										document.getElementById('creditcarderror').innerHTML = '<p><?php echo PLEASE_ENTER_FIRST_NAME_AT_LEAST_THREE_CHARACTER; ?></p>';

										return false;

									}

									

									else if(!filter.test(card_first_name))

									{

										document.getElementById('creditcarderror').style.display='block';

										document.getElementById('creditcarderror').innerHTML = '<p><?php echo PLEASE_ENTER_VALID_FIRST_NAME; ?></p>';

										return false;

									}

									

									

									

									

									

									var card_last_name = document.getElementById("card_last_name").value;

									

									

									if(card_last_name=='')

									{

										document.getElementById('creditcarderror').style.display='block';

										document.getElementById('creditcarderror').innerHTML = '<p><?php echo PLEASE_ENTER_LAST_NAME; ?></p>';

										return false;

									}

									

									else if(card_last_name.length<3)

									{

										document.getElementById('creditcarderror').style.display='block';

										document.getElementById('creditcarderror').innerHTML = '<p><?php echo PLEASE_ENTER_LAST_NAME_AT_LEAST_THREE_CHARACTER; ?></p>';

										return false;

									}

									

									else if(!filter.test(card_last_name))

									{

										document.getElementById('creditcarderror').style.display='block';

										document.getElementById('creditcarderror').innerHTML = '<p><?php echo PLEASE_ENTER_VALID_LAST_NAME; ?></p>';

										return false;

									}

									

									

									var card_address = document.getElementById("card_address").value;

									

									

									if(card_address=='')

									{

										document.getElementById('creditcarderror').style.display='block';

										document.getElementById('creditcarderror').innerHTML = '<p><?php echo PLEASE_ENTER_ADDRESS; ?></p>';

										return false;

									}

									

									else if(card_address.length<5)

									{

										document.getElementById('creditcarderror').style.display='block';

										document.getElementById('creditcarderror').innerHTML = '<p><?php echo PLEASE_ENTER_ADDRESS_AT_LEAST_FIVE_CHARACTER; ?></p>';

										return false;

									}

									

									

									

									

									var card_city = document.getElementById("card_city").value;

									

									if(card_city=='')

									{

										document.getElementById('creditcarderror').style.display='block';

										document.getElementById('creditcarderror').innerHTML = '<p><?php echo PLEASE_ENTER_CITY; ?></p>';

										return false;

									}

									

									else if(card_city.length<3)

									{

										document.getElementById('creditcarderror').style.display='block';

										document.getElementById('creditcarderror').innerHTML = '<p><?php echo PLEASE_ENTER_CITY_AT_LEAST_THREE_CHARACTER; ?></p>';

										return false;

									}

									

									else if(card_city.length>22)

									{

										document.getElementById('creditcarderror').style.display='block';

										document.getElementById('creditcarderror').innerHTML = '<p><?php echo PLEASE_ENTER_CITY_LESS_THAN_TWENTY_THREE_CHARACTER; ?></p>';

										return false;

									}

									

									

									

									else if(!filter2.test(card_city))

									{

										document.getElementById('creditcarderror').style.display='block';

										document.getElementById('creditcarderror').innerHTML = '<p><?php echo PLEASE_ENTER_VALID_CITY; ?></p>';

										return false;

									}

									

									

									var card_state = document.getElementById("card_state").value;

									

									

									if(card_state=='')

									{

										document.getElementById('creditcarderror').style.display='block';

										document.getElementById('creditcarderror').innerHTML = '<p><?php echo PLEASE_ENTER_STATE; ?></p>';

										return false;

									}

									

									else if(card_state.length<3)

									{

										document.getElementById('creditcarderror').style.display='block';

										document.getElementById('creditcarderror').innerHTML = '<p><?php echo PLEASE_ENTER_STATE_AT_LEAST_THREE_CHARACTER; ?></p>';

										return false;

									}

									

									else if(card_state.length>22)

									{

										document.getElementById('creditcarderror').style.display='block';

										document.getElementById('creditcarderror').innerHTML = '<p><?php echo PLEASE_ENTER_STATE_LESS_THAN_TWENTY_THREE_CHARACTER; ?></p>';

										return false;

									}

									

									

									

									else if(!filter2.test(card_state))

									{

										document.getElementById('creditcarderror').style.display='block';

										document.getElementById('creditcarderror').innerHTML = '<p><?php echo PLEASE_ENTER_VALID_STATE; ?></p>';

										return false;

									}

									

									

									

									

									var card_zipcode = document.getElementById("card_zipcode").value;

									

									

									if(card_zipcode=='')

									{

										document.getElementById('creditcarderror').style.display='block';

										document.getElementById('creditcarderror').innerHTML = '<p><?php echo PLEASE_ENTER_ZIP_CODE; ?></p>';

										return false;

									}

									

									else if(card_zipcode.length<3)

									{

										document.getElementById('creditcarderror').style.display='block';

										document.getElementById('creditcarderror').innerHTML = '<p><?php echo PLEASE_ENTER_ZIP_CODE_AT_LEAST_THREE; ?></p>';

										return false;

									}

									

									else if(card_zipcode.length>9)

									{

										document.getElementById('creditcarderror').style.display='block';

										document.getElementById('creditcarderror').innerHTML = '<p><?php echo PLEASE_ENTER_ZIP_CODE_LESS_THAN_TEN; ?></p>';

										return false;

									}

									

									

									

									else if(!filter3.test(card_zipcode))

									{

										document.getElementById('creditcarderror').style.display='block';

										document.getElementById('creditcarderror').innerHTML = '<p><?php echo PLEASE_ENTER_VALID_ZIP_CODE; ?></p>';

										return false;

									}

									

									

									

									

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

										

									if(email=='') 

									{

									email='<?php if($login_user['email']!='') { echo $login_user['email']; } else { echo "none"; } ?>'									

									}

										

										

										

										

										

									var newurl="<?php echo site_url('payment/add_fund_confirm/'.$project['project_id']); ?>/"+amount+"/"+perk+"/"+gateway+"/"+anonymous+"/"+email+"/"+cardnumber+"/"+cvv2Number+"/"+cardtype+"/"+card_expiration_month+"/"+card_expiration_year+"/"+card_first_name+"/"+card_last_name+"/"+card_address+"/"+card_city+"/"+card_state+"/"+card_zipcode;

										

										document.getElementById("various1").href=newurl;

										$('#various1').trigger('click');

										return false;

							 }			

						 

						 

						 

						

						

						}

				

						else{

							

							

							

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

							else if(perk > 0 && parseFloat(val)<parseFloat(perkamt)){

									

									document.getElementById('cannot_donate').style.display='block';

									document.getElementById('cannot_donate').innerHTML = '<?php echo YOU_CANNOT_DONATE_AMOUNT_LESS_THAN_PERK_YOU_HAVE_SELECTED; ?>';

									return false;

							}

							else if(parseFloat(val)>=parseFloat(<?php echo $admin_amount->maximum_donation_amount; ?>)){

								

								document.getElementById('cannot_donate').style.display='block';

								document.getElementById('cannot_donate').innerHTML = '<?php echo YOU_CANNOT_DONATE_GREATER_THAN." ".set_currency($admin_amount->maximum_donation_amount); ?>';

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
    <?php

				  		$attributes = array('name'=>'frm_fund');

						echo form_open_multipart('reward/'.$id.'/'.$project_perk_id,$attributes);

					

				  	?>
    
    <!--<script type="text/javascript">

$(document).ready(function() {

$("#various1").fancybox({

				'width'				: 555,

				'height'			: 176,

				'border-width'      : '0%',

				'autoScale'			: false,

				'transitionIn'		: 'none',

				'transitionOut'		: 'none',

				'type'				: 'iframe'

			});

});			

	</script>-->
    
    <link rel="stylesheet" href="<?php echo base_url();?>css/colorbox.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>js/colorbox/colorbox.css" />
    <script type="text/javascript" src="<?php echo base_url(); ?>js/colorbox/jquery.colorbox.js"> </script> 
    <script type="text/javascript">

$(document).ready(function(){

				

				$("#various1").colorbox({iframe:true, width:"700px", height:"250px"});

			});

		

</script>
    <h2><?php echo STEP2_ADJUST_BACKING_AMMOUNT; ?></h2>
    <div class="inner_content_two">
      <table border="0" cellpadding="0" cellspacing="0" width="100%" >
        <tr>
          <td align="left" valign="top" style="padding:5px 0px 0px 20px; font-size:14px;"><?php echo $site_setting['currency_symbol']; ?></td>
          <td align="left" valign="top"><input type="text" class="btn_input" name="amount" id="amount" value="<?php echo $amount ;?>" onkeyup="set_wallet_details(this.value)" onchange="set_wallet_details(this.value)" /></td>
          <td align="left" valign="top" width="300" style="  font-size:14px; color:#999999; font-style:italic;"><?php echo DONT_STICK_PRICE_OF_AWARD; ?>.</td>
        </tr>
        <?php  if($amazons->gateway_status!='1' &&  $paypal->gateway_status!='1' && $wallet_setting->wallet_enable==1 && $credit_card_setting->credit_card_gateway_status!=1) {

								$dis = 'block';

							}

							else{

								$dis = 'none';

							}

							?>
        <tr>
          <td colspan="3" height="30"><p id="cannot_donate" style="color:#f00; font-size:11px; padding-bottom:12px; line-height:0px; display:<?php echo $dis; ?>">&nbsp;</p>
            <p id="add_donate_amount" style="color:#7DBF0F; padding-bottom:0px; line-height:12px;">&nbsp;</p></td>
        </tr>
      </table>
    </div>
    <div style="clear:both;"></div>
    <div style="height:20px;"></div>
    <h2><?php echo STEP1_PICK_AWARD; ?></h2>
    <div class="inner_content_two">
      <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <?php

		if($all_perks)

		{

			foreach($all_perks as $perk)

			{

				$available = $perk['perk_total'] - ($perk['perk_get']*1);

				if($available != 0){

	?>
        <tr>
          <td align="left" valign="top" width="140" style="color:#434343 !important; font-size:15px; font-weight:bold;   text-transform:capitalize;"><input type="radio" name="selected_perk_id" id="selected_perk_id"  <?php if($project_perk_id==$perk['perk_id']) { ?> checked="checked"  <?php } ?> value="<?php echo $perk['perk_id']; ?>" onclick="assignamount(this.value)" />
            &nbsp;<?php echo set_currency($perk['perk_amount']); ?>+</td>
          <td align="left" valign="top"><span style="color:#434343 !important; font-size:15px; font-weight:bold;   text-transform:capitalize;"><?php echo $perk['perk_title']; ?></span></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td align="left" valign="top" style="padding:10px 0px 5px 0px;"><?php echo $perk['perk_description']; ?></td>
        </tr>
        <tr>
          <td style="border-bottom:1px solid #cccccc;">&nbsp;</td>
          <td align="left" valign="top" style="border-bottom:1px solid #cccccc;"><div><span style="color:#860000;"><?php echo $available; ?> <?php echo AVAILABLE; ?></span></div></td>
        </tr>
        <tr>
          <td colspan="2" height="20"></td>
        </tr>
        <?php }else{?>
        <tr>
          <td align="left" valign="top" width="140" style="color:#434343 !important; font-size:15px; font-weight:bold;   text-transform:capitalize;"><input type="radio" name="selected_perk_id" id="selected_perk_id"  <?php if($project_perk_id==$perk['perk_id']) { ?> checked="checked"  <?php } ?> value="<?php echo $perk['perk_id']; ?>" onclick="assignamount(this.value)"  disabled="disabled"/>
            &nbsp;<?php echo set_currency($perk['perk_amount']); ?>+</td>
          <td align="left" valign="top"><span class="soldout"><?php echo SOLD_OUT;?></span><span style="color:#434343 !important; font-size:15px; font-weight:bold;   text-transform:capitalize;"><?php echo $perk['perk_title']; ?></span></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td align="left" valign="top" style="padding:10px 0px 5px 0px;"><?php echo $perk['perk_description']; ?></td>
        </tr>
        <tr>
          <td style="border-bottom:1px solid #cccccc;">&nbsp;</td>
          <td align="left" valign="top" style="border-bottom:1px solid #cccccc;"><div style="color:#114A75;margin:4px 0px 5px 0px;"><span style="font-weight:normal;color:#7DBF0E; font-size:13px; font-weight:bold;"> <?php echo $available; ?> <?php echo AVAILABLE; ?></span></div></td>
        </tr>
        <tr>
          <td colspan="2" height="10"></td>
        </tr>
        <?php }

			

	

		}

		} else {

	?>
        <tr>
          <td colspan="2" align="center" valign="middle" height="10"><span style="font-size:14px; color:#114A75; font-weight:bold;"><?php echo NO_PERK_HAS_BEEN_CREATED;?></span></td>
        </tr>
        <?php } ?>
      </table>
    </div>
    <div style="clear:both;"></div>
    <div style="height:20px;"></div>
    <h2><?php echo STEP2_PERSONALIZATION; ?></h2>
    <div class="inner_content_two">
      <?php if($amazons->gateway_status=='1' && $paypal->gateway_status=='1' && $wallet_setting->wallet_enable==1 && $user_paypal=='1' && $user_amazon=='1' && $total_wallet_amount>0) {  ?>
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
          <tr>
            <td colspan="3" height="5"><p id="select_gateway" style="color:#F00; padding-bottom:0px; line-height:12px;">&nbsp;</p></td>
          </tr>
        </table>
        <input type="hidden" value="" id="gateway" name="gateway" />
      </div>
      <?php }  elseif($amazons->gateway_status=='1' &&  $paypal->gateway_status=='1' && $user_paypal=='1' && $user_amazon=='1') {  ?>
      <div class="form-element-container">
        <div class="form-label">
          <label class="normal_label"><?php echo PAYMENT_GATEWAY_TYPE; ?> : *</label>
        </div>
        <table border="0" cellpadding="0" cellspacing="3" width="250">
          <tr>
            <td align="left" valign="top"><input type="hidden" value="" id="gateway3" name="gateway" />
              <input type="radio" value="amazon" id="gateway1" name="gateway" onclick="hide_wallet_details();"/></td>
            <td align="left" valign="top"><img src="<?php echo base_url(); ?>images/amazon.png" border="0" /></td>
            <td align="left" valign="top"><input type="radio" value="paypal" id="gateway2" name="gateway" onclick="hide_wallet_details();"/></td>
            <td align="left" valign="top"><img src="<?php echo base_url(); ?>images/paypal.png" border="0" /></td>
          </tr>
          <tr>
            <td colspan="3" height="5"><p id="select_gateway" style="color:#F00; padding-bottom:0px; line-height:12px;">&nbsp;</p></td>
          </tr>
        </table>
        <input type="hidden" value="" id="gateway" name="gateway" />
      </div>
      <?php  }

				

				

				 elseif( $wallet_setting->wallet_enable==1 &&  $paypal->gateway_status=='1' && $user_paypal=='1' && $total_wallet_amount>0) {

				

			

				

				 ?>
      <div class="form-element-container">
        <div class="form-label">
          <label class="normal_label">
            <?php  echo PAYMENT_GATEWAY_TYPE; ?>
            : *</label>
        </div>
        <table border="0" cellpadding="0" cellspacing="3" width="250">
          <tr>
            <td align="left" valign="top"><input type="hidden" value="" id="gateway1" name="gateway" />
              <input type="radio" value="paypal" id="gateway2" name="gateway" onclick="hide_wallet_details();"/></td>
            <td align="left" valign="top"><img src="<?php echo base_url(); ?>images/paypal.png" border="0" /></td>
            <td align="left" valign="top"><input type="radio" value="wallet" id="gateway3" name="gateway" onclick="show_wallet_details();"/></td>
            <td align="left" valign="top"><B><?php echo WALLET; ?></B></td>
          </tr>
          <tr>
            <td colspan="3" height="5"><p id="select_gateway" style="color:#F00; padding-bottom:0px; line-height:12px;">&nbsp;</p></td>
          </tr>
        </table>
        <input type="hidden" value="" id="gateway" name="gateway" />
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
            <td align="left" valign="top"><input type="hidden" value="" id="gateway2" name="gateway" />
              <input type="radio" value="amazon" id="gateway1" name="gateway" onclick="hide_wallet_details();"/></td>
            <td align="left" valign="top"><img src="<?php echo base_url(); ?>images/amazon.png" border="0" /></td>
            <td align="left" valign="top"><input type="radio" value="wallet" id="gateway3" name="gateway" onclick="show_wallet_details();"/></td>
            <td align="left" valign="top"><b><?php echo WALLET; ?></b></td>
          </tr>
          <tr>
            <td colspan="3" height="5"><p id="select_gateway" style="color:#F00; padding-bottom:0px; line-height:12px;">&nbsp;</p></td>
          </tr>
        </table>
        <input type="hidden" value="" id="gateway" name="gateway" />
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
      <?php } 

				

				elseif($credit_card_setting->credit_card_gateway_status==1) { ?>
      <input type="hidden" name="gateway" id="gateway" value="credit" />
      <?php }	else {  ?>
      <input type="hidden" name="gateway" id="gateway" value="paypal" />
      <?php } ?>
      <?php

                    		$remain = $total_wallet_amount-$amount;	

							if($amazons->gateway_status!='1' &&  $paypal->gateway_status!='1' && $wallet_setting->wallet_enable==1 && $credit_card_setting->credit_card_gateway_status!=1) {

								$dis = 'block';

							}

							else{

								$dis = 'none';

							}

							echo '<div id="wallet_detail" style="display:'.$dis.';" class="form-element-container">';

							

							?>
      <div class="form-label"  style="width:185px;">
        <label class="normal_label">&nbsp;<?php echo YOUR_CURRENT_BALANCE; ?>(<?php echo $site_setting['currency_symbol']; ?>) : </label>
      </div>
      <table border="0" cellpadding="0" cellspacing="3" width="400">
        <tr>
          <td align="left" valign="top"><?php echo $total_wallet_amount; ?></td>
        </tr>
      </table>
      <div style="clear:both; height:10px;"></div>
      <div class="form-label" style="width:185px;">
        <label class="normal_label">&nbsp;<?php echo YOUR_DONATE_AMOUNT; ?>(<?php echo $site_setting['currency_symbol']; ?>) : </label>
      </div>
      <table border="0" cellpadding="0" cellspacing="3" width="400">
        <tr>
          <td align="left" valign="top"><?php echo '<span id="donate_amt">'.$amount.'</span>'; ?></td>
        </tr>
      </table>
      <div style="clear:both; height:10px;"></div>
      <div class="form-label" style="width:185px;">
        <label class="normal_label">&nbsp;<?php echo REMAINING_BALANCE; ?>(<?php echo $site_setting['currency_symbol']; ?>) : </label>
      </div>
      <table border="0" cellpadding="0" cellspacing="3" width="400">
        <tr>
          <td align="left" valign="top"><?php echo '<span id="remain_amt">'.$remain.'</span>'; ?></td>
        </tr>
      </table>
      <?php echo '</div>'; ?>
      <?php if($credit_card_setting->credit_card_gateway_status==1) { ?>
      <style type="text/css">

					#creditcarderror p{ color:#f00; font-size:11px; padding-bottom:12px; line-height:0px; }

					</style>
      <div id="creditcarderror" style="display:none;">&nbsp;</div>
      <div class="form-element-container">
        <table border="0" cellpadding="0" cellspacing="5">
          <tr>
            <td align="left" valign="middle"><label class="normal_label">&nbsp;<?php echo CREDIT_CARD_STORE_NUMBER; ?> : *</label></td>
            <td align="left" valign="top"><input type="text" name="cardnumber" id="cardnumber" value="<?php echo $cardnumber; ?>"  class="btn_input" /></td>
          </tr>
          <tr>
            <td align="left" valign="middle"><label class="normal_label"><?php echo CREDIT_CARD_VERFICATION_NUMBER; ?> : *</label></td>
            <td align="left" valign="top"><input type="text" name="cvv2Number" id="cvv2Number" value="<?php echo $cvv2Number; ?>"  class="btn_input" /></td>
          </tr>
          <tr>
            <td align="left" valign="middle"><label class="normal_label"><?php echo CREDIT_CARD_TYPE; ?> : *</label></td>
            <td align="left" valign="top"><select name="cardtype" id="cardtype" class="btn_input" style="padding:0px;">
                <option value='Visa' <?php if($cardtype=='Visa') { ?> selected <?php } ?>><?php echo VISA; ?></option>
                <option value='MasterCard'  <?php if($cardtype=='MasterCard') { ?> selected <?php } ?>><?php echo MASTERCARD; ?></option>
                <option value='Discover'  <?php if($cardtype=='Discover') { ?> selected <?php } ?>><?php echo DISCOVER; ?></option>
                <option value='Amex'  <?php if($cardtype=='Amex') { ?> selected <?php } ?>><?php echo AMEX; ?></option>
              </select></td>
          </tr>
          <tr>
            <td align="left" valign="middle"><label class="normal_label"><?php echo CREDIT_CARD_EXPIRY_DATE; ?> : *</label></td>
            <td align="left" valign="top"><div style="float:left;">Month<br />
                <select name="card_expiration_month" id="card_expiration_month" class="btn_input" style="padding:0px; width:42px;">
                  <option value="1" <?php if($card_expiration_month==1) { ?> selected <?php } ?>>1</option>
                  <option value="2"  <?php if($card_expiration_month==2) { ?> selected <?php } ?>>2</option>
                  <option value="3"  <?php if($card_expiration_month==3) { ?> selected <?php } ?>>3</option>
                  <option value="4"  <?php if($card_expiration_month==4) { ?> selected <?php } ?>>4</option>
                  <option value="5"  <?php if($card_expiration_month==5) { ?> selected <?php } ?>>5</option>
                  <option value="6"  <?php if($card_expiration_month==6) { ?> selected <?php } ?>>6</option>
                  <option value="7"  <?php if($card_expiration_month==7) { ?> selected <?php } ?>>7</option>
                  <option value="8"  <?php if($card_expiration_month==8) { ?> selected <?php } ?>>8</option>
                  <option value="9"  <?php if($card_expiration_month==9) { ?> selected <?php } ?>>9</option>
                  <option value="10"  <?php if($card_expiration_month==10) { ?> selected <?php } ?>>10</option>
                  <option value="11"  <?php if($card_expiration_month==11) { ?> selected <?php } ?>>11</option>
                  <option value="12"  <?php if($card_expiration_month==12) { ?> selected <?php } ?>>12</option>
                </select>
              </div>
              <div style="float:left; padding:0px 0px 0px 10px;"> Year<br />
                <select name="card_expiration_year" id="card_expiration_year" class="btn_input" style="padding:0px; width:60px;">
                  <?php for($i=date('Y');$i<=date('Y')+7;$i++) 

                            { ?>
                  <option value="<?php echo $i;?>" <?php if($card_expiration_year==$i) { ?> selected <?php } ?>><?php echo $i;?></option>
                  <?php } ?>
                </select>
              </div></td>
          </tr>
          <tr>
            <td align="left" valign="middle"><label class="normal_label"><?php echo CREDIT_CARD_FIRST_NAME; ?> : *</label></td>
            <td align="left" valign="top"><input type="text" name="card_first_name" id="card_first_name" value="<?php if($login_user['user_name']!='') { echo $login_user['user_name']; } else { echo $card_first_name; } ?>"  class="btn_input" /></td>
          </tr>
          <tr>
            <td align="left" valign="middle"><label class="normal_label"><?php echo CREDIT_CARD_LAST_NAME; ?> : *</label></td>
            <td align="left" valign="top"><input type="text" name="card_last_name" id="card_last_name" value="<?php if($login_user['last_name']!='') { echo $login_user['last_name']; } else { echo $card_last_name; } ?>"  class="btn_input" /></td>
          </tr>
          <tr>
            <td align="left" valign="middle"><label class="normal_label"><?php echo CREDIT_CARD_ADDRESS; ?> : *</label></td>
            <td align="left" valign="top"><input type="text" class="btn_input" size="38" name="card_address" id="card_address" value="<?php if($login_user['address']!='') { echo $login_user['address']; } else { echo $card_address; } ?>" >
              </input></td>
          </tr>
          <tr>
            <td align="left" valign="middle"><label class="normal_label"><?php echo CREDIT_CARD_CITY ;?> : *</label></td>
            <td align="left" valign="top"><input type="text" class="btn_input" size="25" name="card_city" id="card_city" value="<?php if($login_user['city']!='') { echo $login_user['city']; } else { echo $card_city; }?>" >
              </input></td>
          </tr>
          <tr>
            <td align="left" valign="middle"><label class="normal_label"><?php echo CREDIT_CARD_STATE ;?> : *</label></td>
            <td align="left" valign="top"><input type="text" class="btn_input" size="15" name="card_state" id="card_state" value="<?php if($login_user['state']!='') { echo $login_user['state']; } else { echo $card_state; } ?>" >
              </input></td>
          </tr>
          <tr>
            <td align="left" valign="middle"><label class="normal_label"><?php echo CREDIT_CARD_ZIPCODE ;?> : *</label></td>
            <td align="left" valign="top"><input type="text" class="btn_input" size="17" name="card_zipcode" id="card_zipcode" value="<?php if($login_user['zip_code']!='') { echo $login_user['zip_code']; } else { echo $card_zipcode; } ?>" >
              </input></td>
          </tr>
        </table>
        <div style="clear:both;"></div>
      </div>
      <?php } ?>
      <div class="form-element-container">
        <div class="form-label">
          <label class="normal_label">&nbsp;<?php echo DONATION_TYPE; ?> : *</label>
        </div>
        <table border="0" cellpadding="0" cellspacing="3" width="400">
          <tr>
            <td align="left" valign="top"><input type="radio" value="1" id="anonymous1" name="anonymous" <?php if($anonymous!='2' and $anonymous!='3'){ echo 'checked="checked"'; } ?> onclick="set_anonymous_value('1');" /></td>
            <td align="left" valign="top"><?php echo VISIBLE_SHOW_MY_NAME_AND_HOW_MUCH_I_BACKED; ?></td>
          </tr>
          <tr>
            <td align="left" valign="top"><input type="radio" value="2" id="anonymous2" name="anonymous" <?php if($anonymous=='2'){ echo 'checked="checked"'; } ?> onclick="set_anonymous_value('2');"/></td>
            <td align="left" valign="top"><?php echo NAME_ONLY_SHOW_MY_NAME_BUT_NOT_MY_BACK_AMOUNT; ?></td>
          </tr>
          <tr>
            <td align="left" valign="top"><input type="radio" value="3" id="anonymous3" name="anonymous" <?php if($anonymous=='3'){ echo 'checked="checked"'; } ?> onclick="set_anonymous_value('3');"/></td>
            <td align="left" valign="top"><?php echo ANONYMOUS_DO_NOT_SHOW_MY_NAME_OR_MY_BACK_AMOUNT; ?></td>
          </tr>
        </table>
        <input type="hidden" value="<?php if($anonymous!='2' and $anonymous!='3'){ echo 1; }else{ echo $anonymous; }  ?>" id="anonymous" name="anonymous"  />
      </div>
      <a href="javascript:" id="various1">&nbsp;</a>
      <div>
        <input type="submit" class="remindanchor" value="<?php echo CONTRIBUTE; ?>" name="add" id="add" onclick="return return_set_wallet_details();" />
      </div>
      <div class="form-element-container" style="margin-left:150px;">
        <input type="hidden" name="docomment" id="docomment" value="do_comment" />
        <input type="hidden" name="perk_id" id="perk_id" value="<?php echo $project_perk_id; ?>" />
        <input type="hidden" name="project_id" id="project_id" value="<?php echo $id; ?>" />
        <input type="hidden" name="perk_amount" id="perk_amount" value="<?php echo $amount; ?>" />
        <input type="hidden" name="email" id="email" value="" />
      </div>
      <div style="clear:both;"></div>
    </div>
    <?php } ?>
    <div style="clear:both;"></div>
    
    <!--====================left end==============--> 
    
  </div>
</div>
<?php // echo $this->load->view('default/project/donation_sidebar',$data);?>
