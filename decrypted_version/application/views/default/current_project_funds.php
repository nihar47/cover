<div id="headerbar">
  <div class="wrap930">
    <!-- dd menu -->
    <div class="login_navl">
      <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
          <td align="left" ><div class="project_title_hd" style="padding-top:15px;" > <span style="text-transform:capitalize;color:#2B5F94;font-size:17px;"><?php echo $this->session->userdata('project_title'); ?></span> </div></td>
          <td align="right" ><div class="project_title_hd" style="padding-top:15px; "  > <span id="sddm" style="float:right;">
              <?php if($this->session->userdata['project_id']!='' && $this->session->userdata['project_id']!=0) {  ?>
              <?php echo anchor('user/my_project/',CHANGE_PROJECT,' style="text-transform:capitalize;color:#2B5F94;font-size:17px;text-decoration:none;" '); ?>
              <?php } ?>
              </span> </div></td>
        </tr>
      </table>
    </div>
    <div class="clear"></div>
  </div>
</div>
<div id="container">
  <div class="wrap930" style="padding:15px 0px 20px 0px;">
    <!--side bar user panel-->
    <?php echo $this->load->view('default/dashboard_sidebar'); ?>
    <!--side bar user panel-->
    <div class="con_left2" style="min-height:0px; width:690px; margin-right:0px;">
      <style type="text/css">

#tab_all a{ color:#000000; text-decoration:none; }

</style>
      <?php
	$data['tab_sel'] = INCOMING_FUND;
	$this->load->view('default/dashboard_tabs',$data);

?>
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
</script>
      <div class="inner_content" style=" margin-top:11px;padding:12px; ">
        <h3 id="dropmenu2">
          <?php  echo $project['project_title']; ?>
        </h3>
        <div class="clear"></div>
        <?php if($result){        ?>
        <div id="recent-donate-detail">
          <table border="0" cellpadding="1" cellspacing="1" width="650" style="background-color: #cccccc;">
            <tr>
              <td class="donate_header" align="center" valign="top" width="70"><?php echo DATE;?></td>
              <td class="donate_header" align="center" valign="top"><?php echo DONOR;?></td>
              <td class="donate_header" align="center" valign="top"><?php echo EMAIL;?></td>
              <td class="donate_header" align="center" valign="top"><?php echo PERK;?></td>
              <td class="donate_header" align="center" valign="top"><?php echo AMOUNT; ?><br/>
                (<?php echo $site_setting['currency_symbol'];?>)</td>
            </tr>
            <?php
				  	$i = 0;
					if($result)
					{
					  // echo "<pre>";
					 //  print_r($result);
					 //  exit;
						foreach($result as $dn)
						{
							if($i%2 == '0')
							{
								$str = "class='light1' ";
							}else{
								$str = "class='light' ";
							}
				  ?>
            <tr <?php echo $str; ?>>
              <td class="donate_td" align="center" valign="top"><?php $orig_date=explode(' ',$dn['transaction_date_time']);
					
					echo date($site_setting['date_format'],strtotime($orig_date[0])); ?>
              </td>
              <td  class="donate_td" align="center" valign="top"><?php 	$donar_user=get_user_detail($dn['user_id']);
					
					
					echo anchor('member/'.$dn['user_id'],ucfirst($donar_user['user_name'].' '.$donar_user['last_name']),'style="font-weight:bold;"'); ?>
              </td>
              <td class="donate_td" align="center" valign="top" width="20%"><?php echo $donar_user['email']; ?></td>
              <td  class="donate_td" align="center" valign="top"><?php 	if($dn['perk_id']!='0') {				
								   
				 $perk=$this->project_model->get_perk_name($dn['perk_id']);
				   
				   		   if(strlen($perk)>=1)
						   {
						  		 echo ucfirst($perk);
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
                           ?>
              </td>
              <td align="center" valign="middle" class="donate_td" width="20%"><?php echo set_currency($dn['amount']); ?></td>
            </tr>
            <tr></tr>
            <?php			
							$i++;
						}
					}
				  ?>
          </table>
        </div>
        <div class="clear"></div>
        <div align="center"  style="line-height:20px;  font-size:11px;"><br/>
          <?php echo $page_link; ?></div>
        <div class="clear"></div>
        <?php } else { ?>
        <div class="clear"></div>
        <div align="center"><?php echo NO_RECORD_FOUND; ?>.</div>
        <div class="clear"></div>
        <?php } ?>
      </div>
    </div>
    <div class="clear"></div>
  </div>
  <!-- left end ------>
</div>
