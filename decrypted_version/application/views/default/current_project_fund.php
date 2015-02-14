<div id="headerbar">
  <div class="wrap930">
    <!-- dd menu -->
    <div class="login_navl">
      <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
          <td align="left" ><div class="project_title_hd" style="padding-top:15px;" > <span style="text-transform:capitalize;color:#2B5F94;font-size:17px;"><?php echo $this->session->userdata('project_title'); ?></span> </div></td>
          <td align="right" ><div class="project_title_hd" style="padding-top:15px;"  > <span id="sddm" style="float:right;">
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
	$this->load->view('dashboard_tabs',$data);

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
          <?php  echo INCOMING_FUND; ?>
        </h3>
        <div class="clear"></div>
        <?php if($result){        ?>
        <div id="recent-donate-detail">
          <table border="0" cellpadding="1" cellspacing="1" width="650" style="background-color: #cccccc;">
            <tr>
              <td class="donate_header" align="center" valign="top" width="70"><?php echo PROJECT_IMAGE;?></td>
              <td class="donate_header" align="center" valign="top"><?php echo PROJECT_TITLE;?></td>
              <td class="donate_header" align="center" valign="top"><?php echo CATEGORY_NAME;?></td>
              <td class="donate_header" align="center" valign="top"><?php echo PROJECT_END_DATE;?></td>
              <td class="donate_header" align="center" valign="top"><?php echo GOAL_NEW.'($)';?></td>
              <td class="donate_header" align="center" valign="top" width="70">Incoming Fund</td>
            </tr>
            <?php
				  	$i = 0;
					if($result)
					{
					  // echo "<pre>";
					 //  print_r($result);
					 //  exit;
						foreach($result as $row)
						{
							if($i%2 == '0')
							{
								$str = "class='light1' ";
							}else{
								$str = "class='light' ";
							}
				  ?>
            <tr <?php echo $str; ?>>
              <td class="donate_td" align="center" valign="top"><?php if($row->image !="" && is_file('upload/thumb/'.$row->image))
					{?>
                <img src="<?php echo base_url().'upload/thumb/'.$row->image; ?>" width="100" height="100">
                <?php }
				   else  {?>
                <img src="<?php echo base_url().'upload/thumb/no_img.jpg'?>" width="100" height="100">
                <?php }?>
              </td>
              <td  class="donate_td" align="center" valign="top"><?php echo anchor('projects/'.$row->project_title.'/'.$row->project_id,$row->project_title,'target=_blank'); ?> </td>
              <td class="donate_td" align="center" valign="top"><?php echo $row->project_category_name; ?></td>
              <td class="donate_td" align="center" valign="top" width="20%"><?php echo $row->end_date;?></td>
              <td  class="donate_td" align="center" valign="top"><?php echo $row->amount;?></td>
              <td align="center" valign="middle" class="donate_td" width="20%"><?php echo anchor('wallet/incoming_fund/'.$row->project_id,'<h3>'. INCOMING_FUND.'</h3>'); ?></td>
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
