<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.emptyonclick.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>js/supersleight.plugin.js"></script> 
<script type="text/javascript">
	jQuery.noConflict();
	jQuery(document).ready(function(){
		jQuery("#featured > ul").tabs({fx:{opacity: "toggle"}}).tabs("rotate", 5000, true);
		jQuery('#header').supersleight();
		jQuery('.fix').supersleight();
		jQuery('.fix').supersleight();
	});
</script>

<script type="text/javascript">
	function recent_updates(){
		var xmlHttp;
		try{
			xmlHttp=new XMLHttpRequest();// Firefox, Opera 8.0+, Safari
		}
		catch (e){
			try{
				xmlHttp=new ActiveXObject("Msxml2.XMLHTTP"); // Internet Explorer
			}
			catch (e){
				try{
					xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
				}
				catch (e){
					alert("No AJAX!?");
					return false;
				}
			}
		}
		xmlHttp.onreadystatechange=function(){
			if(xmlHttp.readyState==4){
				//var myVerticalSlide = new Fx.Slide('recent_update_user');
				document.getElementById('recent_update_user').innerHTML=xmlHttp.responseText;
				
				setTimeout('recent_updates()',20000);
			}
		}
		
		xmlHttp.open("GET","<?php echo site_url('user/recent_update_user');?>/"+<?php echo time(); ?>,true);
		xmlHttp.send(null);
	}

	window.onload=function(){
		setTimeout('recent_updates()',20000);
	}
	
	
	window.addEvent('domready', function(){
		
	});
	
</script>

<script>

var cnt=0;
setInterval(function(){ 					 
				//	 event.stop();
   					 var container = document.id('recent_update_user'),  //cache sort container
					queuedElems = [];            //used to track what elements to swap on click
				
				 
				  var sorter = new Fx.Sort($$('#recent_update_user .sort'), {
					duration: 1000,
					transition: Fx.Transitions['Back']['easeInOut'],
					mode: 'vertical',
					onComplete: function(){
					 // displayDOM();  // update the UI DOM visual on each sort
					}
				  });
				  cnt=cnt+1;
					
					
					if((cnt%5)==1)sorter['reverse'](); 
					if((cnt%5)==2)sorter['backward'](); 
					if((cnt%5)==3)sorter['forward'](); 	
					if((cnt%5)==4)sorter.sort([1, 3, 0, 2, 4]);
					if((cnt%5)==0)
					{
					   var elems = container.getChildren();
    					sorter.swap(elems[0], elems[elems.length - 1]);	
					}
					
					 }, 5000);
</script>

<div id="featwrap">
	<div class="wrap1000">
		<div id="featured">
			<ul class="ui-tabs-nav">
				<li class="ui-tabs-nav-item ui-tabs-selected" id="nav-fragment-1"><a href="#fragment-1"></a></li>
				<li class="ui-tabs-nav-item" id="nav-fragment-2"><a href="#fragment-2"></a></li>
				<li class="ui-tabs-nav-item" id="nav-fragment-3"><a href="#fragment-3"></a></li>
				<li class="ui-tabs-nav-item" id="nav-fragment-4"><a href="#fragment-4"></a></li>
			</ul>
			<div id="fragment-1" class="ui-tabs-panel">
				<img src="<?php echo base_url(); ?>images/img_feat1.jpg" alt="img" />
				<div class="info">
					<?php echo anchor('home/signup/',DONATE_NOW,'class="donate"');?>
				</div>
			</div>
			<div id="fragment-2" class="ui-tabs-panel ui-tabs-hide">
				<img src="<?php echo base_url(); ?>images/img_feat2.jpg" alt="img" />
				<div class="info">
					<a href="<?php echo site_url('home/signup/');?>" class="donate"><?php echo DONATE_NOW;?></a>2
				</div>
			</div>
			<div id="fragment-3" class="ui-tabs-panel ui-tabs-hide">
				<img src="<?php echo base_url(); ?>images/img_feat3.jpg" alt="img" />
				<div class="info">
					<a href="<?php echo site_url('home/signup/');?>" class="donate"><?php echo DONATE_NOW;?></a>3
				</div>
			</div>
			<div id="fragment-4" class="ui-tabs-panel ui-tabs-hide">
				<img src="<?php echo base_url(); ?>images/img_feat4.jpg" alt="img" />
				<div class="info">
					<a href="<?php echo site_url('home/signup/');?>" class="donate"><?php echo DONATE_NOW;?></a>4
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</div>

<div id="container">
	<div class="wrap930">
		<div class="leftcol">
			<div class="welcome">
				
				<?php if($home_page) { ?>
				
				<h2><?php echo $home_page->home_title; ?></h2>
					<p><?php echo $home_page->home_description;?> </p>

				
				<?php } ?>
				
				
				
				
				<p class="more"><a href="#"><?php echo KNOW_MORE;?></a></p>
			</div>
			<div class="line1"></div>
            
			<div class="leftsubcol">
				<h3 class="left"><?php echo LIVE_FEED;?></h3>
				<div class="clear"></div>			
				<!--====================left==============-->  
				<div class="newsticker-jcarousellite" id="recent_update_user" >
					<ul>
				<?php
					if($donation)
					{
						$i=1;
						foreach($donation as $dn)
						{
							$temp_time = explode(" ",$dn->transaction_date_time);
							
							
							if($dn->user_id=='' || $dn->user_id=='0' || $dn->user_id==0)
							{
							?>
							
							
							
						<li>	<div id="recent_data_<?php echo $i; ?>" class="live_feed sort">
								<div class="num"><?php echo set_currency($dn->amount); ?></div>
								<div class="graybox"> <?php echo anchor('projects/'.$dn->url_project_title.'/'.$dn->project_id,$this->home_model->text_echo('to').'&nbsp;<strong>'.$dn->project_title.'</strong>'); ?>
								</div>
								<div class="clear"></div>
							</div>	
							</li>
							
							
							
							<?php
							}
			
							else
							{
							
							$user_detail=get_user_detail($dn->user_id);
							
						?>
							<li>
								<div id="recent_data_<?php echo $i; ?>" class="live_feed sort">
									<div class="num"><?php echo set_currency($dn->amount); ?></div>
									<div class="graybox"> <?php echo anchor('projects/'.$dn->url_project_title.'/'.$dn->project_id, $this->home_model->text_echo('From').'&nbsp;<span>'.$user_detail['user_name'].'&nbsp;</span>'. $this->home_model->text_echo('to').'&nbsp;<strong>'.$dn->project_title.'</strong>'); ?></div>
									<div class="clear"></div>
								</div>
							</li>	
				<?php   }
				
						
							$i++;
						}
					}
				?>
					</ul>
				</div>
			</div>
			<div class="rightsubcol">
			<?php
				if($idea)
				{
					foreach($idea as $ideas)
					{
			?>
				<div class="item">
					<div class="fix"><?php if(is_file('upload/idea_thumb/'.$ideas->idea_image)) { ?>
			  <img src="<?php echo base_url(); ?>upload/idea_thumb/<?php echo $ideas->idea_image; ?>" alt="" width="58" height="56" />
			  <?php } ?></div>
					<!-- <img src="images/img_random1.png" alt="" /> -->
					<h4><?php echo $ideas->idea_name; ?></h4>
					<p><?php echo $ideas->idea_description; ?></p>
				</div>
			<?php
					}
				}
			?>
			</div>
			<div class="clear"></div>
		</div>
		<div class="shadow"></div>