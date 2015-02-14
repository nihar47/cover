<div class="sidebar" style="margin-top:100px; margin-left:0px;display:inline-block; float:right;">

	<?php // echo "Sidebar";?>

	<?php if($oneproject){

	

	foreach($oneproject as $rs){ ?>

		

	<?php 		$data['site_setting'] = site_setting(); 

				$data['rs'] = $rs;

				$this->load->view('default/common_card',$data);

	} } ?>

  </div>

  <div class="clear"></div>

</div>

</div>

 </section>







