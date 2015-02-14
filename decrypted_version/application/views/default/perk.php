
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

#sts:hover{ font-weight:bold; }
</style>
      <?php
	$data['tab_sel'] = PERKS;
	$this->load->view('default/overview_tabs',$data);

?>
      <div class="inner_content" style=" margin-top:11px;padding:12px; ">
        <div style="float:left;">
          <h3 id="dropmenu2">
            <?php if($page == "list"){ ?>
            <?php echo PERKS; ?>
            <?php } if($page == "form"){ ?>
            <?php echo ADD_PERK; ?>
            <?php } ?>
          </h3>
        </div>
        <div style="float:right;">
          <h3 class="add_text_buton"  style="cursor:pointer;">
            <?php  if($page == "list"){  echo anchor('project/add_perk/'.$project_id ,ADD_PERK); } else { echo "&nbsp;"; } ?>
          </h3>
        </div>
        <div style="clear:both;"></div>
        <?php 
				if($page == "list")
				{	
					$i = 0;
					
					if($all_perks)
					{
			?>
        <div id="recent-donate-detail" style="text-align:left;">
          <table border="0" cellpadding="1" cellspacing="1" width="660" style="background-color: #cccccc;">
            <tr>
              <td class="donate_header" align="left" valign="top" width="120"><?php echo PERK_TITLE; ?></td>
              <td class="donate_header" align="left" valign="top" ><?php echo PERK_DESCRIPTION; ?></td>
              <td class="donate_header" align="left" valign="top" width="100"><?php echo PERK_AMMOUNT; ?>(<?php echo $site_setting['currency_symbol']; ?>)</td>
              <td class="donate_header" align="left" valign="top" width="70"><?php echo TOTAL_CLAIM; ?></td>
              <td class="donate_header" align="left" valign="top" width="70"><?php echo GET;?></td>
              <td class="donate_header" align="center" valign="top" width="70"><?php echo ACTION; ?></td>
            </tr>
            <?php
							
								foreach($all_perks as $perk)
								{
									if($i%2 == '0')
									{
										$str = "class='light1'";
									}else{
										$str = "class='light'";
									}
									
									
									
						?>
            <tr <?php echo $str; ?>>
              <td class="donate_td" align="left" valign="top"><?php echo ucfirst($perk['perk_title']); ?>&nbsp;</td>
              <td class="donate_td" align="left" valign="top"><?php echo $perk['perk_description']; ?>&nbsp;</td>
              <td class="donate_td" align="center" valign="top"><?php echo set_currency($perk['perk_amount']); ?>&nbsp;</td>
              <td class="donate_td" align="center" valign="top"><?php echo $perk['perk_total']; ?>&nbsp;</td>
              <td class="donate_td" align="center" valign="top"><?php if($perk['perk_get']=='') { echo "0"; } else {echo $perk['perk_get']; } ?>
                &nbsp;</td>
              <td class="donate_td" align="center" valign="top"><?php echo anchor('project/edit_perk/'.$perk['perk_id'],EDIT);?>&nbsp;|&nbsp; <?php echo anchor('project/delete_perk/'.$perk['perk_id'],DELETE);?></td>
            </tr>
            <?php
									$i++;
								}
							
						?>
          </table>
        </div>
        <?php  } else {  
				
				
					$attributes = array('name'=>'frm_perk');
					echo form_open_multipart('project/add_perk/'.$project_id,$attributes); ?>
        <?php if($error!='') { ?>
        <div align="center" class="error">
          <?php	echo $error; ?>
        </div>
        <br/>
        <br/>
        <?php } ?>
        <div class="form-element-container">
          <div class="form-label">
            <label class="all_text"><?php echo PERK_TITLE; ?>:</label>
          </div>
          <input type="text" name="perk_title" id="perk_title" value="<?php echo $perk_title; ?>"  class="btn_input" />
        </div>
        <div class="form-element-container">
          <div class="form-label">
            <label class="all_text"><?php echo PERK_DESCRIPTION; ?>:</label>
          </div>
          <textarea  name="perk_description" id="perk_description"  class="btn_textarea"><?php echo $perk_description; ?></textarea>
        </div>
        <div class="form-element-container">
          <div class="form-label">
            <label class="all_text"><?php echo PERK_AMMOUNT; ?>:</label>
          </div>
          <input type="text" name="perk_amount" id="perk_amount"  value="<?php echo $perk_amount; ?>" class="btn_input1" />
        </div>
        <div class="form-element-container">
          <div class="form-label">
            <label class="all_text"><?php echo TOTAL_CLAIM; ?>:</label>
          </div>
          <input type="text" name="perk_total" id="perk_total" value="<?php echo $perk_total; ?>"  class="btn_input1" />
        </div>
        <div class="clear"></div>
        <div class="form-element-container">
          <div class="form-label">
            <label class="all_text">&nbsp;</label>
          </div>
          <input type="hidden" name="perk_id" id="perk_id" value="<?php echo $perk_id; ?>" />
          <input type="submit" name="submit" value="<?php echo SUBMIT; ?>" class="submit" />
        </div>
        <div class="clear"></div>
        <?php
				  }  ?>
        <?php	} if($page == "form"){
		
					$attributes = array('name'=>'frm_perk');
					echo form_open_multipart('project/add_perk/'.$project_id,$attributes); ?>
        <?php if($error!='') { ?>
        <div align="center" class="error">
          <?php	echo $error; ?>
        </div>
        <br/>
        <br/>
        <?php } ?>
        <div class="form-element-container">
          <div class="form-label">
            <label class="all_text"><?php echo PERK_TITLE; ?>:</label>
          </div>
          <input type="text" name="perk_title" id="perk_title" value="<?php echo $perk_title; ?>"  class="btn_input" />
        </div>
        <div class="form-element-container">
          <div class="form-label">
            <label class="all_text"><?php echo PERK_DESCRIPTION; ?>:</label>
          </div>
          <textarea  name="perk_description" id="perk_description"  class="btn_textarea"><?php echo $perk_description; ?></textarea>
        </div>
        <div class="form-element-container">
          <div class="form-label">
            <label class="all_text"><?php echo PERK_AMMOUNT; ?>:</label>
          </div>
          <input type="text" name="perk_amount" id="perk_amount"  value="<?php echo $perk_amount; ?>" class="btn_input1" />
        </div>
        <div class="form-element-container">
          <div class="form-label">
            <label class="all_text"><?php echo TOTAL_CLAIM; ?>:</label>
          </div>
          <input type="text" name="perk_total" id="perk_total" value="<?php echo $perk_total; ?>"  class="btn_input1" />
        </div>
        <div class="clear"></div>
        <div class="form-element-container">
          <div class="form-label">
            <label class="all_text">&nbsp;</label>
          </div>
          <input type="hidden" name="perk_id" id="perk_id" value="<?php echo $perk_id; ?>" />
          <input type="submit" name="submit" value="<?php echo SUBMIT; ?>" class="submit" />
        </div>
        <div class="clear"></div>
        </form>
        <?php
				 }  ?>
      </div>
    </div>
    <div class="clear"></div>
  </div>
  <!-- left end ------> 
  
</div>
