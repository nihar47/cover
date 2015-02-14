<div class="sidebar">

<div class="clear"></div>


			<ul>
				<li style="border:none; padding-top:0px;">
               
                <div style="padding: 10px 10px 10px 10px;-moz-border-radius: 8px;-webkit-border-radius: 8px;background: #FAFAFA;border: 1px solid lightGrey; width:263px; margin-bottom:10px;">
					
                            
                            
								<div class="profile_title"><span><?php echo PROFILE_INFORMATION;?></span></div>
								<div class="clear"></div>
							
                            
                            	<div class="prof_info">
                                
								<div class="pinfo_l"><?php echo MEMBER_SINCE;?> :</div>
								<div class="pinfo_r">  <?php if($result){ echo date("d M,Y",strtotime($result['date_added'])); } ?></div>
								<div class="clear"></div>
								
                                
                                <?php if($result['user_occupation']!='') { ?>
                                
								<div class="pinfo_l"><?php echo OCCUPATION;?> :</div>
								<div class="pinfo_r">  <?php echo $result['user_occupation']; ?></div>
								<div class="clear"></div>
                                
                                <?php } if($result['city']!='') { ?>
								
								<div class="pinfo_l"><?php echo CITY;?> :</div>
								<div class="pinfo_r">  <?php echo get_city_name($result['city']); ?></div>
								<div class="clear"></div>
								
                                 <?php } if($result['country']!='') { ?>
                                
                                
								<div class="pinfo_l"><?php echo COUNTRY;?> :</div>
									<div class="pinfo_r">  <?php echo get_country_name($result['country']); ?></div>
								<div class="clear"></div>
								
                                  <?php } if($result['user_website']!='') { ?>
                                
								<div class="pinfo_l"><?php echo WEBSITE;?> :</div>
								<div class="pinfo_r"> <a href="<?php echo $result['user_website']; ?>"><?php echo $result['user_website']; ?></a></div>
								<div class="clear"></div>
								
                                  <?php } if($result['user_interest']!='') { ?>
								
								<div class="pinfo_l"><?php echo INTERESTS; ?> :</div>
								<div class="pinfo_r">  <?php echo $result['user_interest']; ?></div>
								<div class="clear"></div>
								
                                  <?php } if($result['user_skill']!='') { ?>
                                
								<div class="pinfo_l"><?php echo SKILLS;?> :</div>
								<div class="pinfo_r"> <?php echo $result['user_skill']; ?></div>
								<div class="clear"></div>
								
                                <?php } ?>
                                
								
							 
	
                            
                            
                            
					</div>
                    
					<div class="clear"></div>
                 </div>
                 
				</li>
				
			
				
				<li style="border:none;">
               
                <div style="padding: 10px 10px 10px 10px;-moz-border-radius: 8px;-webkit-border-radius: 8px; width:263px; margin-bottom:10px;">
					
								
                                
                                <div class="profile_title"><span><?php echo SOCIAL_PROFILES;?></span></div>
								<div class="clear"></div>
								
                                <div class="socio_c">
									<ul>
                                    
                                    <?php
									
						if($result['facebook_url']!=''){  $fb_url=$result['facebook_url'];	}	else{	$fb_url='#';  }
						
						if($result['twitter_url']!=''){  $tw_url=$result['twitter_url'];	}	else{	$tw_url='#';  }
						
						if($result['linkedln_url']!=''){  $ln_url=$result['linkedln_url'];	}	else{	$ln_url='#';  }
						
						if($result['googleplus_url']!=''){  $google_url=$result['googleplus_url'];	}	else{	$google_url='#';  }
						
						if($result['bandcamp_url']!=''){  $bandcamp_url=$result['bandcamp_url'];	}	else{	$bandcamp_url='#';  }
						
						if($result['youtube_url']!=''){  $youtube_url=$result['youtube_url'];	}	else{	$youtube_url='#';  }
						
						if($result['myspace_url']!=''){  $myspace_url=$result['myspace_url'];	}	else{	$myspace_url='#';  }
						
						
						?>
										
                                        <li><a href="<?php echo $fb_url; ?>" target="_blank"><img src="<?php echo base_url(); ?>images/sb_fb.jpg" alt="" /></a>
                                        <a href="<?php echo $fb_url; ?>" class="txt" style="color: #5E5E5E !important;" target="_blank"> <?php echo FACEBOOK;?></a>
                                        </li>
										
                                        
                                        <li><a href="<?php echo $tw_url; ?>" target="_blank"><img src="<?php echo base_url(); ?>images/sb_tw.jpg" alt="" /></a>
                                        <a href="<?php echo $tw_url; ?>" class="txt" style="color: #5E5E5E !important;" target="_blank"> <?php echo TWITTER; ?></a>
                                        </li>
                                        
                                        
									<li><a href="mailto:<?php echo $result['email'];?>" target="_blank"><img src="<?php echo base_url(); ?>images/mail.jpg" alt="" /></a>
                                        <a href="mailto:<?php echo $result['email'];?>" class="txt" style="color: #5E5E5E !important;" target="_blank"> <?php echo MAIL;?></a>
                                     </li>
                                     
                                     
                                     
										<li><a href="<?php echo $ln_url; ?>" target="_blank"><img src="<?php echo base_url(); ?>images/in.jpg" alt="" /></a>
                                        <a href="<?php echo $ln_url; ?>" class="txt" style="color: #5E5E5E !important;" target="_blank"> <?php echo LINLEDIN;?></a>
                                        </li>
                                        
                                        
										<li><a href="<?php echo $google_url; ?>" target="_blank"><img src="<?php echo base_url(); ?>images/g+.jpg" alt="" /></a>
                                        <a href="<?php echo $google_url; ?>" class="txt" style="color: #5E5E5E !important;" target="_blank"> <?php echo GOOGLE_PLUS;?></a>
                                        </li>
										
										<li><a href="<?php echo $myspace_url; ?>" target="_blank"><img src="<?php echo base_url(); ?>images/myspace.jpg" alt="" /></a>
                                        <a href="<?php echo $myspace_url; ?>" class="txt" style="color: #5E5E5E !important;" target="_blank"> <?php echo MYSPACE;?></a>
                                        </li>
										
										
										
										<li><a href="<?php echo $youtube_url; ?>" target="_blank"><img src="<?php echo base_url(); ?>images/youtube.jpg" alt="" /></a>
                                        <a href="<?php echo $youtube_url; ?>" class="txt" style="color: #5E5E5E !important;" target="_blank"> <?php echo YOUTUBE;?></a>
                                        </li>
										
										
										<li><a href="<?php echo $bandcamp_url; ?>" target="_blank"><img src="<?php echo base_url(); ?>images/bandcamp.jpg" alt="" /></a>
                                        <a href="<?php echo $bandcamp_url; ?>" class="txt" style="color: #5E5E5E !important;" target="_blank"> <?php echo BANDCAMP;?></a>
                                        </li>
										
                                        
                                        
									</ul>
									<div class="clear"></div>
								</div>
							
                          
                          </div>
                          
					<div class="clear"></div>
				</li>				
				
					 <?php
						if($site_setting['enable_facebook_stream']=='1'){
							if($result['enable_facebook_stream']=='1' and $result['facebook_url']!=''){
								?>
									 <li style="border:none;"><div class="fb-like-box" style="background-color:#FFFFFF;" data-href="<?php echo $result['facebook_url'];?>" data-width="285" data-show-faces="true" data-stream="false" data-header="false"></div></li>
								<?php
							}
						}
					?>
                   
                   <?php
    if($site_setting['enable_twitter_stream']=='1'){
		if($result['enable_twitter_stream']=='1' and $result['twitter_url']!=''){
		$twid = str_replace('/','',str_replace('https://twitter.com/#!/','',$result['twitter_url']));
			?>
				<li style="border:none;">
                  <script src="http://widgets.twimg.com/j/2/widget.js"></script>
					<style type="text/css">
					.twtr-tweet-text {
						 font-weight:bold;
					}
					.twtr-doc{
						width:136% !important;
					}
					</style>
					<script>
					new TWTR.Widget({
					  version: 2,
					  type: 'profile',
					  rpp: 4,
					  interval: 30000,
					  width: 'auto',
					  height: 165,
					  theme: {
						shell: {
						  background: '#F5F5F5',
						  color: '#819E45'
						},
						tweets: {
						  background: '#F5F5F5',
						  color: '#000000',
						  links: '#8CA555'
						}
					  },
					  features: {
						scrollbar: false,
						loop: true,
						live: true,
						 hashtags: false,
						  timestamp: true,
						  avatars: false,
						behavior: 'all'
					  }
					}).render().setUser('<?php echo $twid; ?>').start();
					</script>
               </li>
			<?php
		}
	}
	?> 
				
				<li style="border:none;">
               
               <div style="padding: 10px 10px 10px 10px;-moz-border-radius: 8px;-webkit-border-radius: 8px;background: #FAFAFA;border: 1px solid lightGrey; width:263px; margin-bottom:10px;">
					
								
                                
                                <div class="profile_title"><span><?php echo CONTRIBUTION_AMOUNT;?></span></div>
								<div class="clear"></div>
								
                                <div class="con_amt">
									<h4><?php echo TOTAL_DONATE_OTHER_PROJECTS;?><br/>
									<span>
										<?php echo  set_currency($user_total_donate_amount); ?>
                                    </span></h4>
                                    
									<h4><?php echo TOTAL_RAISED_FOR_OWN_PROJECTS;?><br/>
									<span>
										<?php echo set_currency($user_total_received_donation); ?>
                                    </span></h4>
                                    
								</div>
				</div>
                            
					
					<div class="clear"></div>
				</li>
				
			</ul>
            
            
            
	<div class="clear"></div>
</div>