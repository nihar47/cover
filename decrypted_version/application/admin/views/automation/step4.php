<div align="center"><a href="<?php echo site_url('automation');?>"><h3>Test Again</h3></a></div>

<?php  if(isset($error)) { if($error!='') {?>

<div style="margin:50px auto; border:2px solid #F00; width:90%; padding:20px 20px;">

<div style="font-size:20px; font-weight:bold; color:#F00;">Error</div><br />
<?php echo $error; ?>
<br/><br/><br/>
</div>
<?php } } ?>

<?php if(isset($msg)) { if($msg!='') {?>

<div style="margin:50px auto; border:2px solid #009900; width:90%; padding:20px 20px;">

<div style="font-size:20px; font-weight:bold; color:#009900;">Success</div><br />
<?php echo $msg; ?>
<br/><br/><br/>
</div>
<?php } } ?>

