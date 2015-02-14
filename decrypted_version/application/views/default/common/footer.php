<script type="text/javascript" language="javascript">
					
				function newsletter_remove()
				{
					if(document.getElementById('subscribe_email').value == "<?php echo ENTER_EMAIL; ?>" || document.getElementById('subscribe_email').value == "<?php echo ENTER_EMAIL; ?>" || document.getElementById('subscribe_email').value == "<?php echo ENTER_VALID_EMAIL; ?>")
					{
						document.getElementById('subscribe_email').value = "";
					}
				}
				function newsletter_reset()
				{
					if(document.getElementById('subscribe_email').value == "")
					{
						document.getElementById('subscribe_email').value = document.getElementById('newsletter_val').value;
						//document.getElementById('subscribe_email').value == "<?php //echo ENTER_VALID_EMAIL; ?>"
					}
				}
				function newsletter_validate()
				{
					
					if(document.getElementById('subscribe_email').value == "" || document.getElementById('subscribe_email').value == "Enter email" || document.getElementById('subscribe_email').value == "<?php echo ENTER_EMAIL; ?>" || document.getElementById('subscribe_email').value == "<?php echo ENTER_VALID_EMAIL; ?>")
					{		 
						
						
						document.getElementById('subscribe_email').value = "<?php echo ENTER_VALID_EMAIL; ?>";
						document.getElementById('newsletter_val').value = "<?php echo ENTER_VALID_EMAIL; ?>";
						
											
						return false;
					}else{
						
						
						var pattern = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
						if(pattern.test(document.getElementById('subscribe_email').value) == true)
						{  						
							document.frmsearch.submit();
						}
						else
						{
							document.getElementById('subscribe_email').value = "<?php echo ENTER_VALID_EMAIL; ?>";
							document.getElementById('newsletter_val').value = "<?php echo ENTER_VALID_EMAIL; ?>";
											
							return false;
						}
					}
				}
				/*function newsletter_validate()
				{
					alert(document.getElementById('subscribe_email').value);
					return false;
					if(document.getElementById('subscribe_email').value == "" || document.getElementById('subscribe_email').value == "Enter email" || document.getElementById('subscribe_email').value == "<?php echo ENTER_EMAIL; ?>" || document.getElementById('subscribe_email').value == "<?php echo ENTER_VALID_EMAIL; ?>")
					{		 
						
						//document.getElementById('subscribe_email').value = "<?php //echo ENTER_EMAIL; ?>";
						//document.getElementById('newsletter_val').value = "<?php //echo ENTER_EMAIL; ?>";
						
						document.getElementById('subscribe_email').value = "<?php echo ENTER_VALID_EMAIL; ?>";
						document.getElementById('newsletter_val').value = "<?php echo ENTER_VALID_EMAIL; ?>";
						
											
						return false;
					}else{
						
						
						
						var pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;    
						
						var str=document.getElementById('subscribe_email').value;
						if(str.test(pattern))
						{  						
							document.frmsearch.submit();
						}
						else
						{
							document.getElementById('subscribe_email').value = "<?php echo ENTER_VALID_EMAIL; ?>";
							document.getElementById('newsletter_val').value = "<?php echo ENTER_VALID_EMAIL; ?>";
											
							return false;
						}
					}
				}*/
			</script>
<?php
		  $site_setting = site_setting();
		  
	$query = $this->db->get_where('twitter_setting',array('twitter_setting_id'=>'1'));
	if ($query->num_rows() > 0) {
		$twitter = $query->row_array();
		$twitter_url=$twitter['twitter_url'];
		
	}else  { $twitter_url='javascript:void()'; }
	
	$query = $this->db->get_where('facebook_setting',array('facebook_setting_id'=>'1'));
	if ($query->num_rows() > 0) {
		$facebook = $query->row_array();
		$fb_url=$facebook['facebook_url'];
		
	}else {  $fb_url='javascript:void()'; }
?>

<footer id="footer">
  <div class="container">
    <div class="footer_top">
      <div class="foot_left">
        <h2 class="flihead"><?php echo ABOUT; ?></h2>
        <ul class="footul">
          <?php $about = dynamic_menu_about(0);?>
          <?php echo $about; ?>
          <li><?php echo anchor('faq','Ask a Question'); ?></li>
          <!-- <li><?php echo anchor('', 'Project Guidelines')?></li>
         <li><?php echo anchor('home/login', 'Login')?></li>
        <li><?php echo anchor('', 'Work at IFF')?></li>
		 <li><?php echo anchor('','Project Reports'); ?></li>
        <li><?php echo anchor('', 'Best of IFF 2012')?></li>
         <li><?php echo anchor('blog', 'Blog')?></li>-->
        </ul>
      </div>
      <div class="foot_left2">
        <h2 class="flihead"><?php echo ASSISTANCE; ?></h2>
        <ul class="footul">
          <?php $about = dynamic_menu_assistance(0);?>
          <?php echo $about; ?> 
          <!--  <li><?php echo anchor('discover','Discover a Project'); ?></li>
        <li><?php echo anchor('start/guideline', 'Project Guidelines')?></li>
         <li><?php echo anchor('start', 'Project query')?></li>
        <li><?php echo anchor('start', 'Start your project')?></li>-->
        </ul>
      </div>
      <div class="foot_left3">
        <h2 class="flihead"><?php echo DISCOVER_PROJECTS; ?></h2>
        <?php $footer_category= $this->home_model->get_all_category(); ?>
        <?php if($footer_category) { $ftr_cnt=1; ?>
        <ul class="footul">
          <?php  foreach($footer_category as $cat) { 
	 if($cat->parent_project_category_id == 0){ 
	echo '<li>'.anchor('discover/category/'.$cat->project_category_id,substr($cat->project_category_name,0,30)).'</li>'; 
	
	 if($ftr_cnt>9) { $ftr_cnt=1; echo '</ul><ul class="footul">';  } 
	 
	 $ftr_cnt++;
	 }
	 } 
	} 
	 ?>
        </ul>
      </div>
      <div class="foot_left4"> 
        
        <!-- <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
              <h2 class="centerh2"><?php echo $site_setting['site_name'].' '.FACEBOOK_KICKSTARTER; ?></h2>
          <img src="../../common/images/fblike.png" alt="" style="margin-top:10px; float:left;">
            <p style="font-size:12px; margin:15px 0 0 5px; float:left;">345,400 people like this. Be the first of your friends.</p>--> 
        <!--<div class="fb-like" data-href="http://clonesites.com/kickstarterclone/" data-send="false" data-width="312" data-show-faces="false"></div>
             <div class="clear"></div>-->
        <h2 class="centerh2"><?php echo /*$site_setting['site_name'].''.*/KICKSTARTERCLONES_WEEKLY_NEWSLETTER; ?></h2>
        <p style="font-size:12px;"><?php echo GET_AWESOME_PROJECTS_DELIVERED_TO_YOUR_INBOX_EACH_WEEK; ?></p>
        <?php
				$attributes = array('name'=>'frmnewsletter', 'onsubmit'=>'return newsletter_validate()','autocomplete'=>'off');
				echo form_open('newsletter/subscribe/',$attributes);?>
        <input type="text" class="cetxt" style="height:24px; line-height:24px; width:182px;" placeholder="Your email address..."  name="subscribe_email" id="subscribe_email" value="<?php echo ENTER_EMAIL; ?>" onblur="newsletter_reset()" onfocus="newsletter_remove()">
        <input type="hidden" name="newsletter_val" id="newsletter_val" value="<?php echo ENTER_EMAIL; ?>" />
        <input type="submit" class="cenbtn1" value="Subscribe" name="submit_newsletter" id="submit_newsletter">
        </form>
        <div class="blog"><a href="http://blog.indiefilmfunding.com/" target="_blank"><img title="" alt="" src="<?php echo base_url(); ?>images/blog.gif"></a></div>
      </div>
      <!--<ul class="sociallink">
        	
            	<li><a href="<?php echo $fb_url; ?>" class="fb"><?php echo FOLLOW_ON_FACEBOOK; ?></a> </li>
                <li><a href="<?php echo $twitter_url; ?>" class="tw"><?php echo FOLLOW_ON_TWITTER; ?></a> </li>
                <li><a href="<?php echo base_url();?>feed.php" class="rss"><?php echo READ_OUR_BLOG; ?></a> </li>
                <li><a href="#" class="meet"><?php echo MEET_THE_TEAM; ?></a> </li>
           
        </ul>--> 
    </div>
  </div>
  <div id="fb-root"></div>
  <link rel="stylesheet" href="<?php echo base_url();?>css/colorbox.css" />
  <link rel="stylesheet" href="<?php echo base_url();?>js/colorbox/colorbox.css" />
  <script type="text/javascript" src="<?php echo base_url(); ?>js/colorbox/jquery.colorbox.js"> </script> 
  <script type="text/javascript">
$(document).ready(function(){
				
				$("#cntpopup").colorbox({iframe:true, width:"555px", height:"560px"});
		});
</script> 
</footer>
<div class="wrapper wrapper_bg">
  <div class="container ">
    <div class="foo_top_contain">
      <div class="foot_bot_left">
        <div class="john">
          <?php 
		  //print_r($testimonials);
		$testimonials = get_all_testimonials();
	//	if($test){  print_r($test); } else{echo "nothing";}
		    foreach($testimonials as $testimonial_fields) { 
				echo '<p>'.$testimonial_fields->description.'</p>'; 
				echo '<p>- '.$testimonial_fields->author.'</p>'; 
				 } 
     ?>
          <!-- <p>Lorem Ipsum is simply dummy text of the printing and typeseing industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s - <strong>Mr. Jhon Rugby</strong></p>--> 
        </div>
      </div>
      <div class="foot_bot_right">
        <div class="likemain">
          <div class="keepin_toch"> <span><?php echo KEEP_IN_TOUCH?></span>
            <ul>
              <li><a href="<?php echo $fb_url; ?>" title="Facebook"></a></li>
              <li><a href="<?php echo $twitter_url; ?>" class="twitter"  title="Twitter"></a></li>
              <li><a href="#" class="youtube" title="Youtube"></a></li>
              <li><a href="#" class="printrest" title="Printrest"> </a></li>
              <li><a href="#" style="padding:10px 20px 10px 0px" class="communication" title="Communication"></a></li>
            </ul>
          </div>
          <div class="social_like"> <a href="#"><!--<img title="" alt="" src="<?php echo base_url(); ?>images/icon/like.png">--></a>
            <div id="fb-root"></div>
            <script>(function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id)) return;
              js = d.createElement(s); js.id = id;
              js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
              fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
            <div class="fb-like" data-href="http://indiefilmfunding.com/demo/" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div>
            <a href="http://www.twitter.com/iFilmFund" class="twitter-follow-button" data-show-count="true" data-lang="en"></a> 
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script> 
          </div>
        </div>
      </div>
    </div>
    <ul class="footerbtmli">
      <!--<li><?php echo anchor('blog',BLOG);?></li>-->
     <!-- <li><?php echo anchor('http://blog.indiefilmfunding.com/',BLOG);?></li>-->
      <li><a href="http://blog.indiefilmfunding.com/" target="_blank">Blog</a></li>
      <li><?php echo anchor('testimonials',Testimonials);?></li>
      
      <!--	<li><a href="<?php //echo site_url('help'); ?>"><?php echo HELP; ?></a></li>   -->
      <?php /*?> <li><?php echo anchor('help/guidelines/',GUIDELINES); ?></li>   
            <li><?php echo anchor('help/stats/',STATS); ?></li>  <?php */?>
      <?php $footermenu = dynamic_menu_footer(0);?>
      <?php echo $footermenu;?>
      <li><?php echo anchor('home/contact_us/',CONTACT_US,'id="cntpopup"'); ?></li>
      <li> &copy; 2013 <?php echo $site_setting['site_name'];?>, Inc.</li>
    </ul>
    <div class="idonate"> <span>iDonate</span>
      <ul>
        <li><!--<a href="#" title="paypal"></a>--></li>
        <li class="american_express"><!--<a href="#" class="american_express" title="American Express"> </a>--></li>
        <li class="master_card"><!--<a href="#" class="master_card"t title="Master Card"></a>--></li>
        <li class="visa"><!--<a style="padding:12px 0px 12px 38px " href="#" class="visa" title="Visa"></a>--></li>
      </ul>
    </div>
  </div>
</div>
