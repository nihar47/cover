<link rel="stylesheet" href="<?php echo base_url();?>css/colorbox.css" />
<link rel="stylesheet" href="<?php echo base_url();?>js/colorbox/colorbox.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>js/colorbox/jquery.colorbox.js"> </script>

<script type="text/javascript">
$(document).ready(function(){
		$('.stepname').mouseover(function(){
			
			$('.stepname h2').addClass('h2hover');
		});
		
		$('.stepname').mouseover(function(){
			
			$('.stepname h2').addClass('h2hover');
		});
		
		
		
		$('.stepname').mouseout(function(){
			$('.stepname h2').removeClass('h2hover');
			$('.stepname h2').addClass('h2normal');
		});
	});
$(document).ready(function(){
				$("#iframe").colorbox({iframe:true, width:"490px", height:"250px"});
			});
		
</script>

<!--******************Section********************-->
<section>
	<div id="page_we">
    	<div class="project_head" style="margin-bottom:5px;">
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
                    <a href="<?php echo site_url('start/create_step1/'.$id);?>">
                        <div class="complete">
                    <table align="center"><tbody><tr><td align="center">
                            <h1>Basics</h1></td></tr>
                            <tr><td>
                            <h2><img src="<?php echo base_url(); ?>/images/rightsign.png" style="margin-top:5px;" alt="" /></h2></td></tr></tbody></table>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('start/create_step2/'.$id); ?>">
                        <div class="complete">
                    <table align="center"><tr><td align="center">
                            <h1>Perks</h1></td></tr>
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
                            <h1>Project Details</h1></td></tr>
                            <tr><td>
                           <h2><img src="<?php echo base_url(); ?>/images/rightsign.png" style="margin-top:5px;" alt="" /></h2> </td></tr></table>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('start/create_step4/'.$id); ?>">
                        <div class="complete">
                    <table align="center"><tr><td align="center">
                            <h1>Account Details</h1></td></tr>
                            <tr><td>
                            <h2><img src="<?php echo base_url(); ?>/images/rightsign.png" style="margin-top:5px;" alt="" /></h2></td></tr></table>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('start/create_step5/'.$id); ?>">
                        <div class="complete">
                    <table align="center"><tr><td align="center">
                            <h1>Review</h1></td></tr>
                            <tr><td>
                          <h2><img src="<?php echo base_url(); ?>/images/rightsign.png" style="margin-top:5px;" alt="" /></h2></td></tr></table>
                        </div>
                    </a>
                </li>
                <li style="margin-right:0;">
                    <a href="<?php echo site_url('star/create_step6/'.$id); ?>">
                        <div class="stepname">
                    <table align="center"><tr><td align="center" style="padding: 0 0 5px;margin-top: 10px;">
                            <img src="<?php echo base_usrl();?>images/eye.png" alt="" class="aimg" style="margin-top: 10px;" /></td></tr>
                            <tr><td>
                            <h2 class="h2normal">7</h2></td></tr></table>
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
                            <h1>Account Details</h1></td></tr>
                            <tr><td>
                            <h2>5</h2></td></tr></table>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="incompletestep">
                    <table align="center"><tr><td align="center">
                            <h1>Review</h1></td></tr>
                            <tr><td>
                            <h2>6</h2></td></tr></table>
                        </div>
                    </a>
                </li>
                <li style="margin-right:0;">
                    <a href="#">
                        <div class="incompletestep">
                    <table align="center"><tr><td align="center" style="padding: 0 0 5px;margin-top: 10px;">
                            <img src="<?php echo base_url();?>images/eye.png" alt="" class="aimg" style="margin-top: 10px;" /></td></tr>
                            <tr><td>
                            <h2>7</h2></td></tr></table>
                        </div>
                    </a>
                </li>

           	
		   <?php }?> 
            
        </ul>
		
		
		
        	<a  href="#" class="project_title">Painting: Making color and tonal adjustments</a>
            <p class="project_own">By&nbsp;<a href="#" class="">Janny D.</a></p><div class="clr"></div>
            
        </div>
		<style>

		</style>
        <div class="projectdetail_cont">
        <!---------------Left--------------------->	
        	<div class="project_left">
            	<iframe width="558" height="418" src="http://www.youtube.com/embed/R8FzGOOQNDY" frameborder="0" allowfullscreen></iframe>
                <div class="fbdiv">
                <img src="images/social.jpg" alt="" style="float:left" />
                <a href="#"><img src="images/embed.png" alt="" style="float:left; margin-top:5px;" /></a>
                <input type="text" style="float:left;margin-top:5px;" class="fbdivtxt" />
                </div>
                <div class="project_reminder">
                	<h2>A book that nurtures feelings of awe and curiosity in children</h2>
                    <h1><img src="images/calicon.png" alt="" class="icinimg"/>Launched: Sep 5, 2012</h1>
                    <h1><img src="images/clockicon.png" alt="" class="icinimg"/>Funding ends: Oct 5, 2012</h1>
                    <a href="#" class="remindanchor">Remind Me</a>
                </div>
                <div class="project_description">
                	<h2>Making color and tonal adjustments </h2><div class="clr"></div>
                    <p>Traditional photographers use different types of film or lens filters to achieve certain color and tonal results in their photographs. They also use various tools and techniques to adjust the color and tonality of a photographic print in the darkroom. Photoshop CS3 provides a comprehensive set of tools for making color and tonal adjustments, making corrections, and sharpening the overall focus of an image. </p>
                    <p>Traditional photographers use different types of film or lens filters to achieve certain color and tonal results in their photographs.  </p>
                    <p>They also use various tools and techniques to adjust the color and tonality of a photographic print in the darkroom. Photoshop CS3 provides a comprehensive set of tools for making color and tonal adjustments, making corrections, and sharpening the overall focus of an image.</p>
                    <a href="#" style="margin:10px 0 0 170px;">Making color and tonal adjustments </a><div class="clr"></div>
                    <p>They also use various tools and techniques to adjust the color and tonality of a photographic print in the darkroom. Photoshop CS3 provides a comprehensive set of tools for making color and tonal adjustments, making corrections, and sharpening the overall focus of an image.</p>
                    <p>Traditional photographers use different types of film or lens filters to achieve certain color and tonal results in their photographs. They also use various tools and techniques to adjust the color and tonality of a photographic print in the darkroom. Photoshop CS3 provides a comprehensive set of tools for making color and tonal adjustments, making corrections, and sharpening the overall focus of an image. </p>
                    <p>Traditional photographers use different types of film or lens filters to achieve certain color and tonal results in their photographs.  </p>
                </div>
                <div class="faq">
                	<h2>FAQ</h2>
                    <p><strong style="color:#333333;">Have a question?</strong> If the info above doesn't help, you can ask the project creator directly.</p>
                    <a href="#" class="askanchor">Ask a question</a><div class="clr"></div>
                    <a href="#" class="askanchor">Report this project to Kickstarterclone</a>
                </div>
            </div>
        <!---------------Left--------------------->	
            <div class="project_right">
            	<div class="poverview" style="">
                	<h2 style="color:#3ab7b9;">236</h2>
                    <p>Backers</p>
                    <h2>$414,688</h2>
                     <p>pledged of $250,000 goal</p>
                    <h2>15</h2>
                     <p>days to go</p>
                     <div class="pdprogress">
                     	<div class="pdprogresscal" style="width:5%;"></div>                       
                     </div>
                    <a href="#"> <div class="back">
                     	<h2>Back This Project</h2>
                        <p>$1 minimum pledge</p>
                     </div></a>
                     <p style="text-align:left; font-size:14px; margin:15px 0 0 15px;">This project will be funded on Friday Sep 21, 
8:00pm EDT. How <a href="#">Kickstarterclone works</a>.</p>
                </div>
                <div class="puser">
                	<img src="" class="uimg" alt="" />
                    <div class="contectinfo">
                    	<h1 style="font-size:14px;">Project by</h1>
                        <h1>Janny D.</h1>
                        <p class="cp">Los Angeles, CA</p>
                        <a href="#">Contact me</a>
                    </div><div class="clr"></div>
                    <a href="#" class="userfb"><img src="images/userfb.png" class="miniimg" alt="" />Has not connected Facebook</a>
                    <hr style="margin-left:15px;" />
                    <p style="margin-left:50px;">Website :</p><a href="#" class="userfb">http://yourwebsitelink.com </a>
                    <a href="#" class="userfb" style="font-size:18px; text-align:center;">See full bio</a>
                </div>
                <div class="perk">
                	<div class="perk_top">
                    
                		<h1 class="perkh1">Perk</h1><h1 class="perkh1" style="color:#333333;">for your contribution</h1>
                       </div>
                    <ul class="perkul">
                    	<li>
                        	<h1 class="perkamt">$20</h1>
                            <h2 class="perktitle">Thank you for your support!</h2>
                            <hr color="#dcdbdb" /> 
                            <p class="perkdescription">The Histogram palette offers many options for viewing tonal and color information about an image. </p>
                            <h3 class="ca"><img src="images/claimicon.png" alt="" class="miniimg" />3 Claimed</h3>
                            <h3 class="ca"><img src="images/avai.png" alt="" class="miniimg" style="width:13px; height:19px;" />3 Claimed</h3><div class="clr"></div>
                            <a class="claimperk" href="#">Claim This</a>
                            <p class="perkdate">Est. delivery: Mar 2013 </p>
                            
                        </li>
                        
                        <li>
                        	<h1 class="perkamt">$20</h1>
                            <h2 class="perktitle">Thank you for your support!</h2>
                            <hr color="#dcdbdb" /> 
                            <p class="perkdescription">The Histogram palette offers many options for viewing tonal and color information about an image. </p>
                            <h3 class="ca"><img src="images/claimicon.png" alt="" class="miniimg" />3 Claimed</h3>
                            <h3 class="ca"><img src="images/avai.png" alt="" class="miniimg" style="width:13px; height:19px;" />3 Claimed</h3><div class="clr"></div>
                            <a class="claimperk" href="#">Claim This</a>
                            <p class="perkdate">Est. delivery: Mar 2013 </p>
                            
                        </li>
                        
                        <li>
                        	<h1 class="perkamt">$20</h1>
                            <h2 class="perktitle">Thank you for your support!</h2>
                            <hr color="#dcdbdb" /> 
                            <p class="perkdescription">The Histogram palette offers many options for viewing tonal and color information about an image. </p>
                            <h3 class="ca"><img src="images/claimicon.png" alt="" class="miniimg" />3 Claimed</h3>
                            <h3 class="ca"><img src="images/avai.png" alt="" class="miniimg" style="width:13px; height:19px;" />3 Claimed</h3><div class="clr"></div>
                            <a class="claimperk" href="#">Claim This</a>
                            <p class="perkdate">Est. delivery: Mar 2013 </p>
                            
                        </li>
                        
                    </ul>
                </div>
            </div>
        </div>
       
    </div><div class="clr"></div>
	<div class="setp2btm">
	<div id="page_we">
		<input type="button" style="margin-left:346px;" value="Back" class="stepbtn">
		<input type="button" value="Preview &amp; Submit" class="stepbtn">
		<input type="button" value="Next" class="stepbtn">
		 <?php echo anchor('start/deleteproject_popup/'.$id,'Delete Project','id="iframe" class="deleteprj"'); ?> 
		<?php echo anchor('home','EXIT','class="exitp"');?>
	</div>
	</div>
</section>
