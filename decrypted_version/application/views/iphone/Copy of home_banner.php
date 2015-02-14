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
					<a href="<?php echo base_url();?>home/signup/" class="donate"><?php echo DONATE_NOW; ?></a>
				</div>
			</div>
			<div id="fragment-2" class="ui-tabs-panel ui-tabs-hide">
				<img src="<?php echo base_url(); ?>images/img_feat2.jpg" alt="img" />
				<div class="info">
					<a href="<?php echo site_url('home/signup/');?>" class="donate"><?php echo DONATE_NOW; ?></a>2
				</div>
			</div>
			<div id="fragment-3" class="ui-tabs-panel ui-tabs-hide">
				<img src="<?php echo base_url(); ?>images/img_feat3.jpg" alt="img" />
				<div class="info">
					<a href="<?php echo site_url('home/signup/');?>" class="donate"><?php echo DONATE_NOW; ?></a>3
				</div>
			</div>
			<div id="fragment-4" class="ui-tabs-panel ui-tabs-hide">
				<img src="<?php echo base_url(); ?>images/img_feat4.jpg" alt="img" />
				<div class="info">
					<a href="<?php echo site_url('home/signup/');?>" class="donate"><?php echo DONATE_NOW; ?></a>4
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</div>




<div id="container">
	<div class="wrap930">
