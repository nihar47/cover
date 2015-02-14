<?php
	if(isset($this->session->userdata['admin_id']))
	{
		redirect('home/dashboard');
	}
?>
<div id="header">
  <div class="logo"><img src="http://phpserver:8090/indiefilmfunding/decrypted_version/admin/images/logo.png" /><!--<b style="font-size:34px; color:#B00000; "><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Indie Film Funding </b>--></div>
  
</div>
<div id="menu">
  <div class="chromestyle" id="chromemenu">
    <ul>
      <li style="padding-right:2px; padding-top:5px;"><!--<a href="../index.php" style="background:none; padding-left:0px;">--><img src="<?php echo base_url(); ?>images/home.png" border="0" onMouseOver="this.src='<?php echo base_url(); ?>images/home-ho.png'" onMouseOut="this.src='<?php echo base_url(); ?>images/home.png'" style="padding-right:9px;" /><!--</a>--></li>
    </ul>
  </div>
 
</div>