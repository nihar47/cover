if('<?php echo $w; ?>'=='s')
{
	document.getElementById('widgets').innerHTML = '<iframe align="middle" id="bh_frame" scrolling="no" width="225" height="380" frameBorder="0" src="<?php echo base_url(); ?>project/widgets_page/<?php echo $w; ?>/<?php echo $c; ?>/<?php echo $n; ?>"></iframe>';
}
if('<?php echo $w; ?>'=='m')
{
	document.getElementById('widgetm').innerHTML = '<iframe align="middle" id="bh_frame" scrolling="no" width="300" height="300" frameBorder="0" src="<?php echo base_url(); ?>project/widgets_page/<?php echo $w; ?>/<?php echo $c; ?>/<?php echo $n; ?>"></iframe>';
}
if('<?php echo $w; ?>'=='l')
{
	document.getElementById('widgetl').innerHTML = '<iframe align="middle" id="bh_frame" scrolling="no" width="472" height="400" frameBorder="0" src="<?php echo base_url(); ?>project/widgets_page/<?php echo $w; ?>/<?php echo $c; ?>/<?php echo $n; ?>"></iframe>';
}