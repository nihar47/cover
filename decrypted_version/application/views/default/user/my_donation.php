<script type="text/javascript" language="javascript">
	function toggle(x){
		if(x.className == 'light1'){
			x.className = 'lightact1';
		}
		else {
			x.className = 'light1';
		}	
	}
	function toggle1(x){
		if(x.className == 'light'){
			x.className = 'lightact';
		}
		else {
			x.className = 'light';
		}	
	}
	
function show_perk_detail(id,i){
	document.getElementById('show'+id+i).style.display='block';
}	

function hide_perk_detail(id,i){
	document.getElementById('show'+id+i).style.display='none';
}	

</script>
<!--******************Section********************-->
<section>
	<div id="page_we">
    	<h2 class="dns_info"><?php echo TRANSACTION_DONATE_HISTORY;?></h2>
        <div class="donation_dls">
       
        <table cellpadding="0" cellspacing="0" width="100%">
  			<tr class="user_dtls">
            	<!--<th class="border_t"><?php //echo TRANSACTION_ID; ?></th>-->
            	<th class="border_t"><?php echo DATE; ?></th>
			     <th class="border_t"><?php echo PROJECT; ?></th>
			     <th class="border_t"><?php echo PERK; ?></th>
			     <th class="border_t"><?php echo PAYEE_EMAIL; ?></th>
			     <th class="border_t" width="107px"><?php echo PAYMENT_STATUS; ?></th>
			   	<th class="border_t"><?php echo AMOUNT; ?><br/>(<?php echo $site_setting['currency_symbol'];?>)</th>
			  </tr>
			  <?php if($donations){?>
              <?php
				  	$i = 0;
					//echo "<pre>";
					//($donations); die;
					foreach($donations as $dn)
					{
							if($i%2 == '0')
							{
								$str = "class='border_t' ";
							}else{
								$str = "class='border_t' ";
							}
				  ?>
			  <tr <?php echo $str; ?>>
              <!--<td class="p_date"><?php //echo $dn['paypal_paykey']; ?></td>-->
                <td class="p_date"style="text-align:left;"><?php 
					$orig_date=explode(' ',$dn['transaction_date_time']);
					echo date($site_setting['date_format'],strtotime($orig_date[0])); ?></td>
                <td class="pt_name" style="color:#333333;text-align:center;"><?php echo anchor('projects/'.$dn['url_project_title'].'/'.$dn['project_id'],$dn['project_title']); ?></td> 
                <td class="pt_name"  style="color:#333333;"><?php   
					if($dn['perk_id']>0){
					$perk=$this->project_model->get_one_perk($dn['perk_id']);
					   if(strlen($perk['perk_description'])>=1)
						   {
						 ?>
                           <div style="position:relative;"><a href="javascript:\\" onmouseover="show_perk_detail('<?php echo $dn['perk_id']; ?>','<?php echo $i; ?>');" onmouseout="hide_perk_detail('<?php echo $dn['perk_id']; ?>','<?php echo $i; ?>');" style="display:inline-block;padding:3px; color:#FF7E15"><?php echo substr(ucfirst($perk['perk_description']),0,20); ?></a><div style="position:absolute;top:20px;left:60px; width:200px; border:1px solid #9FC8DA; padding:3px; display:none; background:#E3F0FD; " id="show<?php echo $dn['perk_id']; ?><?php echo $i; ?>"><?php echo $perk['perk_description']; ?></div>
								 </div><?php
						   }
						   else    
						   {
						     echo "N/A";
						   }
						   
						}
					   else
					   {
					     echo "N/A";
					   }
				   ?></td>
                <td class="p_date"><?php echo $dn['email']; ?></td>
               <td class="p_date" style="color:#FF7E15;">Success</td>
                <td class="p_date"><?php echo set_currency($dn['amount']); ?></td>
               </tr>
  
		
        <?php } ?>
      
		      

					<?php } else { ?>
					
			<tr><td colspan="7" align="center"><h3 style="margin:10px 0 0 0;"><?php echo NO_TRANSACTION; ?>.</h3></tr></tr>
			<div class="clear"></div>
			<?php } ?>
		  </table>	
				
   <div class="clear"></div>
			 <div class="mess_cont_top_right"><?php echo $page_link; ?></div>
		 <div class="clear"></div>

      </div>
        <div class="clr"></div>
    </div>
	
</section>

<!--******************Section********************-->
