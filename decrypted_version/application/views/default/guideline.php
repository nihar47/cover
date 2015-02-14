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
 	<ul class="stepul">
        	
          <?php   if($id!='' and $id!='0'){?>
        		<li>
            	<a href="<?php echo site_url('start/guideline/'.$id);?>">
                	<div class="complete">
				<table align="center"><tr><td align="center">

                    	<h1>Guidelines</h1></td></tr>
				<tr><td align="center">
                        <h2><img src="<?php echo base_url(); ?>/images/rightsign.png" style="margin-top:5px;" alt="" /></h2></td></tr></table>
                    </div>
                </a>
            </li>
                <li>
                    <a href="<?php echo site_url('start/create_step1/'.$id); ?>">
                        <div class="stepname">
                    <table align="center"><tbody><tr><td align="center">
                            <h1>Basics</h1></td></tr>
                            <tr><td>
                            <h2 class="h2normal">2</h2></td></tr></tbody></table>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?php //echo site_url('start_project/create_step2/'.$id); ?>">
                        <div class="incompletestep">
                    <table align="center"><tr><td align="center">
                            <h1>Perks</h1></td></tr>
    
                            
                           <tr><td>
                            <h2>3</h2></td></tr></table>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('start_project/create_step3/'.$id); ?>">
                        <div class="incompletestep">
                    <table align="center"><tr><td align="center">
                            <h1>Project Details</h1></td></tr>
                            <tr><td>
                            <h2>4</h2></td></tr></table>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('start_project/create_step4/'.$id); ?>">
                        <div class="incompletestep">
                    <table align="center"><tr><td align="center">
                            <h1>Project Team</h1></td></tr>
                            <tr><td>
                            <h2>5</h2></td></tr></table>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('start_project/create_step5/'.$id); ?>">
                        <div class="incompletestep">
                    <table align="center"><tr><td align="center">
                            <h1>Account Details</h1></td></tr>
                            <tr><td>
                            <h2>6</h2></td></tr></table>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('start_project/create_step6/'.$id); ?>">
                        <div class="incompletestep">
                    <table align="center"><tr><td align="center">
                            <h1>Review</h1></td></tr>
                            <tr><td>
                            <h2>7</h2></td></tr></table>
                        </div>
                    </a>
                </li>
                <li style="margin-right:0;">
                    <a href="<?php echo site_url('start_project/create_step7/'.$id); ?>">
                        <div class="incompletestep">
                    <table align="center"><tr><td align="center" style="padding: 0 0 5px;margin-top: 10px;">
                            <img src="images/eye.png" alt="" class="aimg" style="margin-top: 10px;" /></td></tr>
                            <tr><td>
                            <h2>8</h2></td></tr></table>
                        </div>
                    </a>
                </li>
          <?php }else{?>
                <li>
                    <a href="#">
                        <div class="stepname">
                    <table align="center"><tbody><tr><td align="center">
                            <h1>Basics</h1></td></tr>
                            <tr><td>
                            <h2 class="h2normal">2</h2></td></tr></tbody></table>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="incompletestep">
                    <table align="center"><tr><td align="center">
                            <h1>Perks</h1></td></tr>
    
                            
                           <tr><td>
                            <h2>3</h2></td></tr></table>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="incompletestep">
                    <table align="center"><tr><td align="center">
                            <h1>Project Details</h1></td></tr>
                            <tr><td>
                            <h2>4</h2></td></tr></table>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="incompletestep">
                    <table align="center"><tr><td align="center">
                            <h1>Project Team</h1></td></tr>
                            <tr><td>
                            <h2>5</h2></td></tr></table>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="incompletestep">
                    <table align="center"><tr><td align="center">
                            <h1>Account Details</h1></td></tr>
                            <tr><td>
                            <h2>6</h2></td></tr></table>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="incompletestep">
                    <table align="center"><tr><td align="center">
                            <h1>Review</h1></td></tr>
                            <tr><td>
                            <h2>7</h2></td></tr></table>
                        </div>
                    </a>
                </li>
                <li style="margin-right:0;">
                    <a href="#">
                        <div class="incompletestep">
                    <table align="center"><tr><td align="center" style="padding: 0 0 5px;margin-top: 10px;">
                            <img src="images/eye.png" alt="" class="aimg" style="margin-top: 10px;" /></td></tr>
                            <tr><td>
                            <h2>8</h2></td></tr></table>
                        </div>
                    </a>
                </li>

           	
		   <?php }?> 
            
        </ul>
    <div class="step_cont">
      <div class="step1_left">
        <h2 class="step1header">Project Guidelines</h2>
        <p class="step1des">Kickstarterclone is a funding platform for creative projects — everything from traditional forms of art (like theater and 
          music) to contemporary forms (like design and games). These guidelines explain Kickstarterclone’s focus. Projects 
          violating these guidelines will not be allowed to launch.
          Note that as you go through the site you may find past projects on Kickstarterclone that conflict with these rules. We’re 
          making tweaks as we learn and grow. Thanks for reading!</p>
        <ul class="step1ul">
          <li>
            <h1>1. Funding for projects only.</h1>
            <p>A project has a clear goal, like making an album, a book, or a work of art. A project will eventually be completed, 
              and something will be produced by it. A project is not open-ended. Starting a business, for example, does not 
              qualify as a project. </p>
          </li>
          <li>
            <h1>2. Projects must fit Kickstarterclone’s categories.</h1>
            <p>We currently support projects in the categories of Art, Comics, Dance, Design, Fashion, Film, Food, Games, Music, 
              Photography, Publishing, Technology, and Theater.</p>
            <p>Design and Technology projects have a few additional guidelines. If your project is in either of these 
              categories, be sure to review them carefully. </p>
            <a href="#">View Design and Technology requirements </a> </li>
          <li>
            <h1>2. Projects must fit Kickstarterclone’s categories.</h1>
            <p>We currently support projects in the categories of Art, Comics, Dance, Design, Fashion, Film, Food, Games, Music, 
              Photography, Publishing, Technology, and Theater.</p>
            <p>Design and Technology projects have a few additional guidelines. If your project is in either of these 
              categories, be sure to review them carefully. </p>
            <a href="#">View Design and Technology requirements </a> </li>
          <li>
            <h1>2. Projects must fit Kickstarterclone’s categories.</h1>
            <p>We currently support projects in the categories of Art, Comics, Dance, Design, Fashion, Film, Food, Games, Music, 
              Photography, Publishing, Technology, and Theater.</p>
            <p>Design and Technology projects have a few additional guidelines. If your project is in either of these 
              categories, be sure to review them carefully. </p>
            <a href="#">View Design and Technology requirements </a> </li>
        </ul>
        
        <?php if($id == '')
		{
        if($user_info['paypal_verified'] != '' && $user_info['paypal_verified'] == 1){?>
        <div class="stepbtm">
          <div style="float:left; width:340px;">
            <input type="checkbox" name="agreeterm" class="styled" onclick="agreeterm()" id="agreeterm" />
            <p class="checktxt"> I have read and agree to the terms and condition, 
              privacy policy, and project guidelines.</p>
          </div>
          <div id="enablebutton">
          	<a href="javascript:void(0);" class="oresubmit disabled" id="startptoj">Start your project</a>
          </div>
        </div>
        <?php }else{?>
        <div class="stepbtm">
          <div style="float:left; width:340px;">
            <p class="checktxt">Your paypal account is not yet verified to receive funds. Please verify your paypal.</p>
          </div>
          <div>
          	<?php echo anchor('settings/paypal','Verify Paypal','class="oresubmit"')?>
          </div>
        </div>
		<?php }}?>
        
      </div>
      <div class="step1_right">
        <h1 class="step1header">Eligibility requirements</h1>
        <p class="step1des">To be eligible to start a Kickstarterclone 
          project, you need to satisfy the 
          requirements of Amazon Payments:</p>
        <ul class="ruleul">
          <li>You are 18 years of age or older.</li>
          <li>You are a permanent US resident with a Social Security Number (or EIN).</li>
          <li>You have a US address, US bank 
            account, and US state-issued ID 
            (driver’s license).</li>
          <li>You have a major US credit or debit 
            card.</li>
        </ul>
      </div>
    </div>

    </div>
</section>

<!--******************Section********************-->