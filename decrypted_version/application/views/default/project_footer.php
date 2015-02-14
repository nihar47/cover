<!--==========================footer=====================-->
<?php
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
<div id="footer2">
	<div class="wrap930" style="width:960px;">
	
	
	<div id="footer_category">
	
	
		
	<div class="left"><h3 style="padding-top:15px;"><?php echo BROWSE_CATEGORIES; ?></h3>
	
	<?php $footer_category= $this->home_model->get_category(); ?>
	
	<?php if($footer_category) { $ftr_cnt=1; ?>
	
	<ul>
	
	<?php  foreach($footer_category as $cat) { 
	
	echo '<li>'.anchor('search/category/'.$cat->project_category_id,substr($cat->project_category_name,0,30)).'</li>'; 
	
	 if($ftr_cnt>9) { $ftr_cnt=1; echo "</ul><ul>";  } 
	 
	 $ftr_cnt++;
	 
	 } 
	} 
	 ?>
	
	
	</ul>
		
	
	</div>
	
	
	<div class="left" style="padding: 12px 0px 20px 27px;"><h3 style="font-size:16px; padding-left:37px;"><?php echo STAY_IN_LOOP; ?></h3>
<div class="set" style="padding-left:30px;">
				<a href="<?php echo $twitter_url; ?>" class="fix" id="fix_twitter">aa</a>
				<a href="<?php echo $fb_url; ?>" class="fix" id="fix_fb">ss</a>
				<a href="<?php echo site_url('feed');?>" target="_blank" class="fix" id="fix_rss">aa</a>
			</div>
			<div style="clear:both;"></div>
		
			
			<div style="clear:both; height:15px;"></div>
			
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
					}
				}
				function newsletter_validate()
				{
					if(document.getElementById('subscribe_email').value == "" || document.getElementById('subscribe_email').value == "<?php echo ENTER_EMAIL; ?>" || document.getElementById('subscribe_email').value == "<?php echo ENTER_EMAIL; ?>l" || document.getElementById('subscribe_email').value == "<?php echo ENTER_VALID_EMAIL; ?>")
					{		 
						
						document.getElementById('subscribe_email').value = "<?php echo ENTER_EMAIL; ?>";
						document.getElementById('newsletter_val').value = "<?php echo ENTER_EMAIL; ?>";
											
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
				}
			</script>
			
		<div id="newsletter_bg" style="background:none; width:265px;">
			<h3><?php echo SUBSCRIBE_FOR_NEWLETTER;  ?></h3>
			<?php
				$attributes = array('name'=>'frmnewsletter', 'onsubmit'=>'return newsletter_validate()','autocomplete'=>'off');
				echo form_open('newsletter/subscribe/',$attributes);
		/*	?>
		<div class="input_box"><input type="text" name="subscribe_email" id="subscribe_email" value="<?php echo ENTER_EMAIL; ?>" onblur="newsletter_reset()" onfocus="newsletter_remove()" class="subscribe_email_box" />
		<input type="hidden" name="newsletter_val" id="newsletter_val" value="<?php echo ENTER_EMAIL; ?>" />
		</div>
		
		<div class="newsletter_submit"><input type="submit" name="submit_newsletter" id="submit_newsletter" class="submit_newsletter_button" value="<?php //echo JOIN;
		echo CLICK_TO_SUBSCRIBE;   ?>"/> </div> <?php */
		?>
		<input type="text" name="subscribe_email" id="subscribe_email" value="<?php echo ENTER_EMAIL; ?>" onblur="newsletter_reset()" onfocus="newsletter_remove()" style="padding:2px; height:20px; width:150px; float:left; border:1px solid #eee;" />
		<input type="hidden" name="newsletter_val" id="newsletter_val" value="<?php echo ENTER_EMAIL; ?>" />
        <input type="submit" name="submit_newsletter" id="submit_newsletter" class="submit_newsletter_button" value="<?php echo SUBSCRIBE;//echo JOIN;
		//echo CLICK_TO_SUBSCRIBE;   ?>"/>
		</div>
			
			
			
			
			
			</div>
			
			
		
		<div style="float:right;">
		<?php if($fb_url!='' && $fb_url!='javascript:void()') { ?>
		<div class="fb-like-box" style="background-color:#FFFFFF;" data-href="<?php echo $fb_url;?>" data-width="292" data-show-faces="true" data-stream="false" data-header="false"></div>
		<?php } ?>
		</div>
		
		

	
	</div>
	
	<div style="clear:both;"></div>
	
	
	</div>
</div>

	
<div id="footer" style="background-color:#FFFFFF;opacity: 0.8;filter: alpha(opacity=60); border-top:1px solid #999999;">
	<div class="wrap930">	
	
	
		<div class="left">
		
			<p style="padding:17px 0px 0px 0px;"><?php echo COPYRIGHT; ?></p>

		</div>
		
		<div class="left" style="padding:8px 0px 0px 0px;"><img src="<?php echo base_url();?>images/footer_paypal.gif" border="0" /></div>
		
		<div class="right">
			<p id="footer_link" style="margin-top:16px;"><?php echo $footer_menu; ?>
            
            <a href="<?php echo site_url('help'); ?>"><?php echo HELP; ?></a>&nbsp;|&nbsp;
                   <?php echo anchor('help/guidelines/',GUIDELINES); ?>&nbsp;|&nbsp;
                    <?php echo anchor('home/contact_us/',CONTACT_US,'id="contact_fancy_foot"'); ?>
					
					<?php 
					$affiliate_setting=affiliate_setting();
					
					if($affiliate_setting->affiliate_enable==1) { 
					?> &nbsp;|&nbsp;
                   
                   
                     <?php echo anchor('affiliate',AFFILIATE); } ?> 
                     
                     </p>
			
		</div>
		
		
		<div class="clear"></div>
		
		
		<div align="center"></div>
		
	</div>
</div>


<?php 
if($project['p_google_code'] != ''){
	$trackcode = $project['p_google_code'];
}
else{
	$site = site_setting();
	$trackcode = $site['site_tracker'];
}
if($trackcode!='') { 

?>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', '<?php echo trim($trackcode); ?>']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<?php } ?>

<!--==========================footer end=====================-->