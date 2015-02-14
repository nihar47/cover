	
		<!--====================left==============--> 
<script type="text/javascript">
	function ajaxpage(n){
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
					alert("<?php echo NO_AJAX;?>");
					return false;
				}
			}
		}
		xmlHttp.onreadystatechange=function(){
			if(xmlHttp.readyState==4){
				setTimeout(function(){
					document.getElementById('ajaxdiv').innerHTML=xmlHttp.responseText;
					document.id('ajaxdiv').tween('opacity', 1);
				},500);
			}
		}
		document.id('ajaxdiv').tween('opacity', 0);
		xmlHttp.open("GET","<?php echo site_url('search/search_ajax');?>/"+n+"/"+'<?php echo urlencode($match); ?>'+"/"+<?php echo time(); ?>,true);
		xmlHttp.send(null);
	}
	
</script>
  	<div id="container">
<div class="wrap930">   

	<div class="con_left">


		<?php
			if($match!="none"){
				echo '<h2>'.RESULT_FOUND_FOR . ' "'.$match.'"</h2>';
			}
		?>
	<div id="ajaxdiv">
		  <?php
		  	if($result)
			{
				foreach($result as $rs)
				{
						$data['site_setting'] = $site_setting; 
						$data['rs'] = $rs;
						$this->load->view('common_card',$data);
		  ?>
		  

<?php } }
			else{
		?>	
		<p>
              <h3><?php echo NO_RESULT_FOUND; ?></h3>
            </p>
		<?php
			}

?>
	
	<div class="clear"></div>
<div align="center" class="pg_img">
	<br>
	<?php
		if($total_rows > $per_page)
		{
			$total = floor($total_rows / $per_page);
			//$total = number_format($total,0,'.','');
			if(($total_rows % $per_page) != '0') $total++;
			$page = ($offset / $per_page) + 1;
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
			echo '<strong><span style="color:#000000; font-size:14px; vertical-align:top;">' . $page . " of " . $total . '</span></strong>';
			echo '<img border="0" src="'.base_url().'images/next.png" '.$a3.'>';
			echo '<img border="0" src="'.base_url().'images/last.png" '.$a4.'>';
		}
	?>
</div>
	</div>			
			
			</div>	
  
       
  
  <!--====================left end==============--> 