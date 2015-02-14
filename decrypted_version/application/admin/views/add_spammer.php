<div id="con-tabs">
        <ul>
           <?php  $check_spam_setting=$this->home_model->get_rights('add_site_setting');
		 		$check_spam_report=$this->home_model->get_rights('spam_report');
				$check_spam=$this->home_model->get_rights('spamer');
				
		
			if($check_spam_setting==1) {		?>
		   
		    <li><span style="cursor:pointer;"><?php echo anchor('spam/add_spam_setting','Spam Setting'); ?></span></li>
			
			 <?php } if($check_spam_report==1) { ?>
			
			<li><span style="cursor:pointer;"><?php echo anchor('spam/spam_report','Spam Report','id="sp_2"'); ?></span></li>
			
				<?php } if($check_spam==1) { ?>
			
			<li><span style="cursor:pointer;"><?php echo anchor('spam/spamer','Spamer','id="sp_1" style="color:#364852;background:#ececec;"'); ?></span></li>
			
			<?php }  ?>       
          </ul>
          <div id="text">
            <div id="1">
              <div class="fleft" style="width:100%;">
                <div style="height:10px;"></div>
				<table width="100%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td><img src="<?php echo base_url(); ?>images/c2-t-l.jpg" alt="" height="4" width="7" /></td>
                    <td background="<?php echo base_url(); ?>images/c2-t.jpg" width="99%"></td>
                    <td><img src="<?php echo base_url(); ?>images/c2-t-r.jpg" alt="" height="4" width="7" /></td>
                  </tr>
                  <tr>
                    <td background="<?php echo base_url(); ?>images/c2-l.jpg"></td>
                    <td valign="top" bgcolor="#FFFFFF"><div id="deal-tabs">
						<div id="deal-con">
							<div id="2" style="">
							  <div align="center">
								<div id="add-deal">
								  <?php
									$attributes = array('name'=>'frm_add_spammer');
									echo form_open_multipart('spam/add_spammer',$attributes);
								  ?>
									<fieldset class="step">
									<?php
										if($error != "")
										{
											echo "<label style='width:700px;text-align:center;'><span>".$error."</span></label>";
											echo "<div class='vertical-line'></div>";
										}
									?>													
									<div class="fleft">
									  <label>Spam IP<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('spam_ip')" onmouseout="hide_bg('spam_ip')">
									  <input type="text" name="spam_ip" id="spam_ip" value="<?php echo $spam_ip; ?>" onfocus="show_bg('spam_ip')" onblur="hide_bg('spam_ip')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									
									
									<div class="fleft">
									  <label>&nbsp;<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('p_ratio')" onmouseout="hide_bg('p_ratio')">
									 <input type="checkbox" name="permenant_spam" id="permenant_spam" value="1" ch <?php if($permenant_spam==1) { ?> checked="checked" <?php } ?> style="width:30px !important;" />&nbsp;Make Permenant
									  </span>
									</div>
									<div style="clear:both; height:15px;"></div>
									
									
								
									
									
									
								
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>&nbsp;<span>&nbsp;</span></label>
									  <div class="submit">
										<input type="submit" name="submit" value="Submit" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer; " />
									  </div>
									</div>
									</fieldset>
								  </form>
								</div>
							  </div>
							</div>
						</div>
					</div></td>
                    <td background="<?php echo base_url(); ?>images/c2-r.jpg"></td>
                  </tr>
                  <tr>
                    <td><img src="<?php echo base_url(); ?>images/c2-b-l.jpg" alt="" height="4" width="7" /></td>
                    <td background="<?php echo base_url(); ?>images/c2-b.jpg"></td>
                    <td><img src="<?php echo base_url(); ?>images/c2-b-r.jpg" alt="" height="4" width="7" /></td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
