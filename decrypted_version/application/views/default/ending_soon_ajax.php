<?php  	if($result)
			{
				foreach($result as $rs)
				{
					$data['site_setting'] = $site_setting; 
						$data['rs'] = $rs;
						$this->load->view('common_card',$data);
		  ?>
		  
	
				
		  <?php } ?>
		  
		  <div class="clear"></div>  
		  <div align="center" class="pg_img"><br/>
		<?php
		//echo $page_link;
		//echo '<br>';
		if($total_rows > $per_page)
		{
			$total = floor($total_rows / $per_page);
			if(($total_rows % $per_page) != '0') $total++;
			$page = ($offset + 1) . ' - ' . (($offset + $per_page)>$total_rows?$total_rows:($offset + $per_page));
			$first = '0';
			$prev = $offset - $per_page;
			$next = $offset + $per_page;
			$last = ($total - 1) * $per_page;
			
			if($prev >= 0){ $a = 'style="cursor:pointer;" onclick=ajaxpage('.$first.');'; }else{ $a = ''; }
			if($prev >= 0){ $a2 = 'style="cursor:pointer;" onclick=ajaxpage('.$prev.');'; }else{ $a2 = ''; }
			if($last != $offset){ $a3 = 'style="cursor:pointer;" onclick=ajaxpage('.$next.');'; }else{ $a3 = ''; }
			if($last != $offset){ $a4 = 'style="cursor:pointer;" onclick=ajaxpage('.$last.');'; }else{ $a4 = ''; }
			echo '<img border="0" src="'.base_url().'images/first.png" '.$a.'>';
			echo '<img border="0" src="'.base_url().'images/pre.png" '.$a2.'>';
			echo '<span style="color:#000000; font-size:14px; vertical-align:top;">' . $page . OF . $total_rows . '</span>';
			echo '<img border="0" src="'.base_url().'images/next.png" '.$a3.'>';
			echo '<img border="0" src="'.base_url().'images/last.png" '.$a4.'>';
		}
		?>
		  <br/><br/><br/>
		  </div> 
		  
		  
		  <?php } else{  ?>
			 <p>
              <h3><?php echo NO_RESULT_FOUND; ?></h3>
            </p>
		  <?php
			}
		  ?>