<div id="page_we">
<div class="project_head" style="margin-bottom:5px;">
 <link rel="stylesheet" href="<?php echo base_url();?>css/colorbox.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>js/colorbox/colorbox.css" />
    <script type="text/javascript" src="<?php echo base_url(); ?>js/colorbox/jquery.colorbox.js"> </script> 
    
    <style type="text/css">

.inner_content_two1 {
    height: 98px !important;
    overflow: hidden;
    padding: 10px;
    width: 553px !important;
}

.remindanchor {
    background: none repeat scroll 0 0 #860000;
    border: 1px solid #BFBDBB;     
    color: #FFFFFF;
    display: inline-block;
	float:none;
	clear:none;    
    font-size: 14px;
    height: 40px !important;
    margin-left: 2px;
    margin-right: 10px;
    margin-top: 15px;
    padding: 10px;
    position: relative;
    text-align: center;
    width: 100px !important;
}

</style>
<script>
 	 
	 function submitDetailsForm()
    {
	 $.colorbox({width:"50%", inline:true, href:".fancy_main"});	
    }
	function close_fancy()
	{	 
	  $.fn.colorbox.close();
	  return false;
	}
	function add_fancy()
	{	 
	 $("#frm_project").submit();
	} 
	 
	
</script>
    
 	
	 
 
 <div style='display:none'>
              <div class="fancy_main">
              <div class="inner_content_two1" style="background-color:#E3F0FD; border: 1px solid #9FC8DA; margin-bottom:0px;">
                <p style=" margin: 12px 0 0;text-align: center;">You are getting charged for $100 for submitting this project.</p>  
                <div style="text-align: center;">
                 <input  type="button" class="remindanchor" value="Confirm" name="add" id="add"  onClick="add_fancy(this.value);" />
                 <input  type="button" class="remindanchor" value="Cancel" name="cancel" id="cancel"  onClick="close_fancy();" /> 
                 </div>
                 </div>             
              </div>
            </div> 

	
		
        	<!--<a  href="javascript://" class="project_title"><?php echo $project['project_title'];?></a>
            <p class="project_own">By&nbsp;<?php echo anchor('user/full_bio_data/'.$project['user_id'].'/'.$project['project_id'],getUserNamebyid($project['user_id']),'id="profile_detail_popup1" ');?></p>-->
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
                           <!--<h1><?php echo PERKS; ?></h1></td></tr>-->
                            <h1><?php echo iGift; ?></h1></td></tr>
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
                        <div class="complete">
                    <table align="center"><tr><td align="center">
                            <h1><?php echo ACCOUNT_DETAILS; ?></h1></td></tr>
                            <tr><td>
                            <h2><img src="<?php echo base_url(); ?>/images/rightsign.png" style="margin-top:5px;" alt="" /></h2></td></tr></table>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('start/create_step5/'.$id); ?>">
                        <div class="complete">
                    <table align="center"><tr><td align="center">
                              <h1><?php echo REVIEW; ?></h1></td></tr>
                            <tr><td>
                           <h2><img src="<?php echo base_url(); ?>/images/rightsign.png" style="margin-top:5px;" alt="" /></h2></td></tr></table>
                        </div>
                    </a>
                </li>
          
                
                <li>
                    <a href="<?php echo site_url('start/create_step6/'.$id); ?>">
                        <div class="complete">
                    <table align="center"><tr><td align="center" style="padding: 0 0 5px;margin-top: 10px;">
                            <img src="<?php echo base_url();?>images/eye.png" alt="" class="aimg" style="margin-top: 10px;" /></td></tr>
                            <tr><td>
                             <h2><img src="<?php echo base_url(); ?>/images/rightsign.png" style="margin-top:5px;" alt="" /></h2></td></tr></table>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('start/launch_payment/'.$id); ?>">
                        <div class="stepname">
                    <table align="center"><tr><td align="center">
                            <h1><?php echo Payment; ?></h1></td></tr>
                            <tr><td>
                            <h2 class="h2normal">8</h2></td></tr></table>
                        </div>
                    </a>
                </li>
          <?php }else{?>
                 < <li>

                    <a href="javascript://">
                        <div class="stepname">
                    <table align="center"><tbody><tr><td align="center">
                            <h1><?php echo BASICS; ?></h1></td></tr>
                            <tr><td>
                            <h2 class="h2normal">2</h2></td></tr></tbody></table>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript://">
                        <div class="incompletestep">
                    <table align="center"><tr><td align="center">
                           <!-- <h1><?php echo PERKS; ?></h1></td></tr>-->
                            <h1><?php echo iGift; ?></h1></td></tr>
    
                            
                           <tr><td>
                            <h2>3</h2></td></tr></table>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript://">
                        <div class="incompletestep">
                    <table align="center"><tr><td align="center">
                            <h1><?php echo PROJECT_DETAILS; ?></h1></td></tr>
                            <tr><td>
                            <h2>4</h2></td></tr></table>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript://">
                        <div class="incompletestep">
                    <table align="center"><tr><td align="center">
                            <h1><?php echo ACCOUNT_DETAILS; ?></h1></td></tr>
                            <tr><td>
                            <h2>5</h2></td></tr></table>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript://">
                        <div class="incompletestep">
                    <table align="center"><tr><td align="center">
                            <h1><?php echo REVIEW; ?></h1></td></tr>
                            <tr><td>
                            <h2>6</h2></td></tr></table>
                        </div>
                    </a>
                </li>
                  <li>
                    <a href="javascript://">
                        <div class="incompletestep">
                    <table align="center"><tr><td align="center" style="padding: 0 0 5px;margin-top: 10px;">
                            <img src="<?php echo base_url();?>images/eye.png" alt="" class="aimg" style="margin-top: 10px;" /></td></tr>
                            <tr><td>
                            <h2>7</h2></td></tr></table>
                        </div>
                    </a>
                </li>
				  <li>
                    <a href="javascript://">
                        <div class="incompletestep">
                    <table align="center"><tr><td align="center">
                            <h1><?php echo Payment; ?></h1></td></tr>
                            <tr><td>
                            <h2>8</h2></td></tr></table>
                        </div>
                    </a>
                </li>
           	
           	
		   <?php }?> 
            
        </ul>
        	
		<div class="step_cont_top">
				<h2>Payment for submitting your project</h2>
				<p>Once this step is done your project will be sent to admin who will activate it after reviewing</p>
			</div><div class="clr"></div>
            
        </div>
<?php if($success){ ?>
	<div style="color:#0C3" id="success-msg"><?php echo $success; ?></div>
<?php	}?>
   <?php if($error != "")
				{ ?>
        <div class="error" style="height:auto; margin:4px 0px 0px 0px;">
          <ul>
         <li>   <?php echo $error; ?></li>
          </ul>
        </div>
        <?php } ?>
	<?php
			$attributes = array('id'=>'frm_project','name'=>'frm_project');
			echo form_open_multipart('start/launch_payment/'.$id, $attributes);
	  ?>
	 

	<div class="inner_content_two">
            <input type="hidden" value="credit" id="gateway" name="gateway">
                        <style type="text/css">

					#creditcarderror p{ color:#f00; font-size:11px; padding-bottom:12px; line-height:0px; }

					</style>
      <div style="display:none;" id="creditcarderror">&nbsp;</div>
      <div class="form-element-container">
        <table cellspacing="5" cellpadding="0" border="0">
          <tbody><tr>
            <td valign="middle" align="left"><label class="normal_label">&nbsp;<?php echo CREDIT_CARD_STORE_NUMBER; ?> : *</label></td>
            <td valign="top" align="left"><input type="text" class="btn_input" value="<?php echo $cardnumber; ?>" id="cardnumber" name="cardnumber"></td>
          </tr>
          <tr>
            <td valign="middle" align="left"><label class="normal_label"><?php echo CREDIT_CARD_VERFICATION_NUMBER; ?> : *</label></td>
            <td valign="top" align="left"><input type="text" class="btn_input" value="<?php echo $cvv2Number; ?>" id="cvv2Number" name="cvv2Number"></td>
          </tr>
          <tr>
            <td valign="middle" align="left"><label class="normal_label"><?php echo CREDIT_CARD_TYPE; ?> : *</label></td>
            <td valign="top" align="left"><select style="padding:0px;" class="btn_input" id="cardtype" name="cardtype">
               <option value='Visa' <?php if($cardtype=='Visa') { ?> selected <?php } ?>><?php echo VISA; ?></option>
                <option value='MasterCard'  <?php if($cardtype=='MasterCard') { ?> selected <?php } ?>><?php echo MASTERCARD; ?></option>
                <option value='Discover'  <?php if($cardtype=='Discover') { ?> selected <?php } ?>><?php echo DISCOVER; ?></option>
                <option value='Amex'  <?php if($cardtype=='Amex') { ?> selected <?php } ?>><?php echo AMEX; ?></option>
              </select></td>
          </tr>
          <tr>
            <td valign="middle" align="left"><label class="normal_label"><?php echo CREDIT_CARD_EXPIRY_DATE; ?>  : *</label></td>
            <td valign="top" align="left"><div style="float:left;">Month<br>
                <select style="padding:0px; width:42px;" class="btn_input" id="card_expiration_month" name="card_expiration_month">
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
              <div style="float:left; padding:0px 0px 0px 10px;"> Year<br>
                <select style="padding:0px; width:60px;" class="btn_input" id="card_expiration_year" name="card_expiration_year">
                                 <?php for($i=date('Y');$i<=date('Y')+7;$i++) 

                            { ?>
                  <option value="<?php echo $i;?>" <?php if($card_expiration_year==$i) { ?> selected <?php } ?>><?php echo $i;?></option>
                  <?php } ?>
                                  </select>
              </div></td>
          </tr>
          <tr>
            <td valign="middle" align="left"><label class="normal_label"><?php echo CREDIT_CARD_FIRST_NAME; ?> : *</label></td>
            <td valign="top" align="left"><input type="text" class="btn_input" value="<?php if($login_user['user_name']!='') { echo $login_user['user_name']; } else { echo $card_first_name; } ?>" id="card_first_name" name="card_first_name"></td>
          </tr>
          <tr>
            <td valign="middle" align="left"><label class="normal_label"><?php echo CREDIT_CARD_LAST_NAME; ?> : *</label></td>
            <td valign="top" align="left"><input type="text" class="btn_input" value="<?php if($login_user['last_name']!='') { echo $login_user['last_name']; } else { echo $card_last_name; } ?>" id="card_last_name" name="card_last_name"></td>
          </tr>
          <tr>
            <td valign="middle" align="left"><label class="normal_label"><?php echo CREDIT_CARD_ADDRESS; ?> : *</label></td>
            <td valign="top" align="left"><textarea type="text" id="card_address" name="card_address" size="38" class="btn_input"><?php if($login_user['address']!='') { echo $login_user['address']; } else { echo $card_address; } ?> </textarea>
              </td>
          </tr>
          <tr>
            <td valign="middle" align="left"><label class="normal_label"><?php echo CREDIT_CARD_CITY ;?> : *</label></td>
            <td valign="top" align="left"><input type="text" value=" <?php if($login_user['city']!='') { echo $login_user['city']; } else { echo $card_city; }?>" id="card_city" name="card_city" size="25" class="btn_input">
              </td>
          </tr>
          <tr>
            <td valign="middle" align="left"><label class="normal_label"><?php echo CREDIT_CARD_STATE ;?>  : *</label></td>
            <td valign="top" align="left"><input type="text" value="<?php if($login_user['state']!='') { echo $login_user['state']; } else { echo $card_state; } ?>"  id="card_state" name="card_state" size="15" class="btn_input">
              </td>
          </tr>
          <tr>
            <td valign="middle" align="left"><label class="normal_label"><?php echo CREDIT_CARD_ZIPCODE ;?> : *</label></td>
            <td valign="top" align="left"><input type="text" value="<?php if($login_user['zip_code']!='') { echo $login_user['zip_code']; } else { echo $card_zipcode; } ?>" id="card_zipcode" name="card_zipcode" size="17" class="btn_input">
              </td>
          </tr>
        </tbody></table>
        <div style="clear:both;"></div>
      </div>
            
      <a id="various1" href="javascript:" class="cboxElement" original-title="">&nbsp;</a>
      <div>
  <!--      <input type="submit" onclick="return return_set_wallet_details();" value="<?php echo CONTRIBUTE; ?>" id="add" name="add" value="contribute" class="remindanchor" />-->
      </div>
      <div style="margin-left:150px;" class="form-element-container">
        <input type="hidden" value="do_comment" id="docomment" name="docomment">
        <input type="hidden" value="0" id="perk_id" name="perk_id">
        <input type="hidden" value="<?php echo $id?>" id="project_id" name="project_id">
        <input type="hidden" value="0" id="perk_amount" name="perk_amount">
        <input type="hidden" value="100" id="amount" name="amount">
        <input type="hidden" value="" id="email" name="email">
      </div>
      <div style="clear:both;"></div>
    </div>		

      </div>
      <div class="setp2btm">
	<div id="page_we">
		<input type="button" style="margin-left:346px;" value="<?php echo BACK ?>" class="stepbtn">
	<!--	<input type="button" value="<?php echo PREVIEW_SUBMIT ?>" class="stepbtn">-->
		<input type="button" value="Pay & Submit" name="payment" id="payment" class="stepbtn" onClick='return submitDetailsForm()' > 
        <?php if(isset($success) && !empty($success)){
			$class_name = "activate-button";
			}else{
				$class_name = "deactivate-button";
				}?>
	   <?php /*echo anchor('start/launch_project/'.$id,FINISH,'class="stepbtn '.$class_name.'"');*/?>
		<?php echo anchor('start/deleteproject_popup/'.$id,DELETE_PROJECT,'id="iframe" class="deleteprj"'); ?>
		<?php echo anchor('home','EXIT','class="exitp"');?>
        
		
	</div>
	</div>