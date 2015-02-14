<script>
	$(document).ready(function(){
		$('.stepname').mouseover(function(){
			
			$('.stepname h2').addClass('h2hover');
		});
		$('.stepname').mouseout(function(){
			$('.stepname h2').removeClass('h2hover');
			$('.stepname h2').addClass('h2normal');
		});
	});
</script>
<!--******************Section********************-->
<script type="text/javascript">
function agreeterm()
{
	if(document.getElementById("agreeterm").checked)
	{
		document.getElementById("enablebutton").innerHTML ='<a href="<?php echo site_url('start/create_draft');?>" class="oresubmit" id="startptoj" di>Start your project</a>';
	}
	else
	{
		document.getElementById("enablebutton").innerHTML ='<a href="javascript:void(0);" class="oresubmit disabled" id="startptoj">Start your project</a>';
	}
	
}
</script>

<section>
  <div id="page_we">
    <div class="step_cont">
      <ul class="stepul">
        <?php   if($id!='' and $id!='0'){?>
        <li> <a href="<?php echo site_url('start/guideline/'.$id);?>">
          <div class="stepname">
            <table align="center">
              <tr>
                <td align="center"><h1><?php echo GUIDELINES; ?></h1></td>
              </tr>
              <tr>
                <td align="center"><h2 class="h2normal">1</h2></td>
              </tr>
            </table>
          </div>
          </a> </li>
        <li> <a href="<?php echo site_url('start/create_step1/'.$id); ?>">
          <div class="incompletestep">
            <table align="center">
              <tbody>
                <tr>
                  <td align="center"><h1><?php echo BASICS; ?></h1></td>
                </tr>
                <tr>
                  <td><h2 class="h2normal">2</h2></td>
                </tr>
              </tbody>
            </table>
          </div>
          </a> </li>
        <li> <a href="<?php //echo site_url('start_project/create_step2/'.$id); ?>">
          <div class="incompletestep">
            <table align="center">
              <tr>
                <!--<td align="center"><h1><?php echo PERKS; ?></h1></td>-->
                 <td align="center"><h1><?php echo iGift; ?></h1></td>
              </tr>
              <tr>
                <td><h2>3</h2></td>
              </tr>
            </table>
          </div>
          </a> </li>
        <li> <a href="<?php echo site_url('start_project/create_step3/'.$id); ?>">
          <div class="incompletestep">
            <table align="center">
              <tr>
                <td align="center"><h1><?php echo PROJECT_DETAILS; ?></h1></td>
              </tr>
              <tr>
                <td><h2>4</h2></td>
              </tr>
            </table>
          </div>
          </a> </li>
        <li> <a href="<?php echo site_url('start_project/create_step5/'.$id); ?>">
          <div class="incompletestep">
            <table align="center">
              <tr>
                <td align="center"><h1><?php echo ACCOUNT_DETAILS; ?></h1></td>
              </tr>
              <tr>
                <td><h2>5</h2></td>
              </tr>
            </table>
          </div>
          </a> </li>
        <li> <a href="<?php echo site_url('start_project/create_step6/'.$id); ?>">
          <div class="incompletestep">
            <table align="center">
              <tr>
                <td align="center"><h1><?php echo REVIEW; ?></h1></td>
              </tr>
              <tr>
                <td><h2>6</h2></td>
              </tr>
            </table>
          </div>	
          </a> </li>
        <li> <a href="<?php echo site_url('start_project/create_step7/'.$id); ?>">
          <div class="incompletestep">
            <table align="center">
              <tr>
                <td align="center" style="padding: 0 0 5px;margin-top: 10px;"><img src="<?php echo base_url(); ?>images/eye.png" alt="" class="aimg" style="margin-top: 10px;" /></td>
              </tr>
              <tr>
                <td><h2>7</h2></td>
              </tr>
            </table>
          </div>
          </a> </li>
        <li> <a href="<?php echo site_url('start/launch_payment/'.$id); ?>">
          <div class="incompletestep">
            <table align="center">
              <tr>
                <td align="center"><h1><?php echo Payment; ?></h1></td>
              </tr>
              <tr>
                <td><h2>8</h2></td>
              </tr>
            </table>
          </div>
          </a> </li>
        <?php }else{?>
        <li> <a href="<?php echo site_url('start/guideline/');?>">
          <div class="stepname">
            <table align="center">
              <tr>
                <td align="center"><h1><?php echo GUIDELINES; ?></h1></td>
              </tr>
              <tr>
                <td align="center"><h2 class="h2normal">1<!--<img src="<?php // echo base_url(); ?>/images/rightsign.png" style="margin-top:5px;" alt="" />--></h2></td>
              </tr>
            </table>
          </div>
          </a> </li>
        <li> <a href="#">
          <div class="incompletestep">
            <table align="center">
              <tbody>
                <tr>
                  <td align="center"><h1><?php echo BASICS; ?></h1></td>
                </tr>
                <tr>
                  <td><h2 class="h2normal">2</h2></td>
                </tr>
              </tbody>
            </table>
          </div>
          </a> </li>
        <li> <a href="#">
          <div class="incompletestep">
            <table align="center">
              <tr>
                <!--<td align="center"><h1><?php echo PERKS; ?></h1></td>-->
                <td align="center"><h1><?php echo iGift; ?></h1></td>
              </tr>
              <tr>
                <td><h2>3</h2></td>
              </tr>
            </table>
          </div>
          </a> </li>
        <li> <a href="#">
          <div class="incompletestep">
            <table align="center">
              <tr>
                <td align="center"><h1><?php echo PROJECT_DETAILS; ?></h1></td>
              </tr>
              <tr>
                <td><h2>4</h2></td>
              </tr>
            </table>
          </div>
          </a> </li>
        <li> <a href="#">
          <div class="incompletestep">
            <table align="center">
              <tr>
                <td align="center"><h1><?php echo ACCOUNT_DETAILS; ?></h1></td>
              </tr>
              <tr>
                <td><h2>5</h2></td>
              </tr>
            </table>
          </div>
          </a> </li>
        <li> <a href="#">
          <div class="incompletestep">
            <table align="center">
              <tr>
                <td align="center"><h1><?php echo REVIEW; ?></h1></td>
              </tr>
              <tr>
                <td><h2>6</h2></td>
              </tr>
            </table>
          </div>
          </a> </li>
        <li> <a href="#">
          <div class="incompletestep">
            <table align="center">
              <tr>
                <td align="center" style="padding: 0 0 5px;margin-top: 10px;"><img src="<?php echo base_url(); ?>images/eye.png" alt="" class="aimg" style="margin-top: 10px;" /></td>
              </tr>
              <tr>
                <td><h2>7</h2></td>
              </tr>
            </table>
          </div>
          </a> </li>
        <li> <a href="javascript://">
          <div class="incompletestep">
            <table align="center">
              <tr>
                <td align="center"><h1><?php echo Payment; ?></h1></td>
              </tr>
              <tr>
                <td><h2>8</h2></td>
              </tr>
            </table>
          </div>
          </a> </li>
        <?php }?>
      </ul>
      <div class="step1_left">
        <h2 class="step1header"><?php echo PROJECT_GUIDELINES; ?></h2>
        <div class="content-region">
          <?php foreach($guidelines as $guide){
		   echo $guide->guidelines_content; }?>
        </div>
        <?php if($id == '')
		{
        if($user_info['paypal_verified'] != '' && $user_info['paypal_verified'] == 1){?>
        <div class="stepbtm">
          <div style="float:left; width:340px;">
            <input type="checkbox" name="agreeterm" class="styled" onclick="agreeterm()" id="agreeterm" />
            <p class="checktxt"> <?php echo I_HAVE_READ_AND_AGREE_TO_THE_TERMS_AND_CONDITION_PRIVACY_POLICY_AND_PROJECT_GUIDELINES; ?></p>
          </div>
          <div id="enablebutton"> <a href="javascript:void(0);" class="oresubmit disabled" id="startptoj"><?php echo START_YOUR_PROJECT; ?></a> </div>
        </div>
        <?php }else{?>
        <div class="stepbtm">
          <div style="float:left; width:340px;">
            <p class="checktxt"><?php echo YOUR_PAYPAL_ACCOUNT_IS_NOT_YET_VERIFIED_TO_RECEIVE_FUNDS_PLEASE_VERIFY_YOUR_PAYPAL; ?></p>
          </div>
          <div> <?php echo anchor('settings/paypal',VERIFY_PAYPAL,'class="oresubmit"')?> </div>
        </div>
        <?php }}?>
      </div>
      <div class="step1_right">
        <h1 class="step1header1"><?php echo ELIGIBILITY_REQUIREMENTS; ?></h1>
        <p class="step1des1"><?php echo sprintf(ELIGIBILITY, $site_setting['site_name']); ?>:</p>
        <ul class="ruleul">
          <li><?php echo YOU_ARE_18_YEARS_OF_AGE_OR_OLDER; ?></li>
          <li><?php echo YOU_ARE_A_PERMANENT_US_RESIDENT_WITH_A_SOCIAL_SECURITY_NUMBER_OR_EIN; ?></li>
          <li><?php echo YOU_HAVE_A_US_ADDRESS_US_BANK_ACCOUNT_AND_US_STATE_ISSUED_ID_DRIVERS_LICENSE; ?></li>
          <li><?php echo YOU_HAVE_A_MAJOR_US_CREDIT_OR_DEBIT_CARD; ?></li>
        </ul>
      </div>
    </div>
  </div>
</section>
<!--******************Section********************-->