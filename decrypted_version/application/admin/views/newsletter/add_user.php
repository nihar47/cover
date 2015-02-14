<script type="text/javascript" language="javascript">
function setchecked(elemName,status){
	elem = document.getElementsByName(elemName);
	for(i=0;i<elem.length;i++){
		elem[i].checked=status;
	}
}
</script>

<div id="con-tabs">
          <ul>
            <?php  
		
		$chk_newsletter_list=$this->home_model->get_rights('list_newsletter');
		$chk_list_newsletter_user=$this->home_model->get_rights('list_newsletter_user');
		$chk_newsletter_setting=$this->home_model->get_rights('newsletter_setting');
		$chk_newsletter_job=$this->home_model->get_rights('newsletter_job');		
		
				
		
			if($chk_newsletter_list==1) {		?>
		   
		    <li><span style="cursor:pointer;"><?php echo anchor('newsletter/list_newsletter','Newsletters'); ?></span></li>
			
			 <?php } if($chk_list_newsletter_user==1) { ?>
			
			<li><span style="cursor:pointer;"><?php echo anchor('newsletter/list_newsletter_user','Newsletter User','id="sp_1" style="color:#364852;background:#ececec;"'); ?></span></li>
			
				<?php } if($chk_newsletter_job==1) { ?>
			
			<li><span style="cursor:pointer;"><?php echo anchor('newsletter/newsletter_job','Newsletter Job'); ?></span></li>
			
			<?php }   if($chk_newsletter_setting==1) { ?>
			
			<li><span style="cursor:pointer;"><?php echo anchor('newsletter/newsletter_setting','Settings'); ?></span></li>
			
			<?php } ?>
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
									$attributes = array('name'=>'frm_login');
									echo form_open('newsletter/add_newsletter_user',$attributes);
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
									  <label>Username<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('user_name')" onmouseout="hide_bg('user_name')">
									  <input type="text" name="user_name" id="user_name" value="<?php echo $user_name; ?>" onfocus="show_bg('user_name')" onblur="hide_bg('user_name')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									
									
									<div class="fleft">
									  <label>Email<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('email')" onmouseout="hide_bg('email')">
									  <input type="text" name="email" id="email" value="<?php echo $email; ?>" onfocus="show_bg('email')" onblur="hide_bg('email')"/>
									  </span>
									</div>
									<div style="clear:both;"></div>
									
									
									
									<div style="padding-top:25px;">
								<?php if($all_newsletter) { ?>	<h3>Subscribe Newsletter</h3>

 <div style="float:left;"> 
                  <a href="javascript:void(0)" onclick="javascript:setchecked('newsletter_id[]',1)" style="color:#000;"><?php echo "Check All"; ?></a>&nbsp; |&nbsp; 
           <a href="javascript:void(0)" onclick="javascript:setchecked('newsletter_id[]',0)" style="color:#000;"><?php echo "Clear All"; ?></a>
                     
            </div>
           <div style="clear:both; height:15px;"></div>
		   
		   
		    <?php } ?>
									<table border="0" cellpadding="2" cellspacing="2" align="left">
									
									
									<?php if($all_newsletter) {  $cnt=0;  ?>
											<tr>																					
										<?php foreach($all_newsletter as $alnw) { ?>
										
										<td align="left" valign="top"><input type="checkbox" name="newsletter_id[]" id="newsletter_id" value="<?php echo $alnw->newsletter_id;?>" <?php if($all_subscription) { if(in_array($alnw->newsletter_id,$all_subscription)) { ?> checked="checked" <?php } } ?> style="width:30px;" /></td><td align="left" valign="top"><?php echo $alnw->subject; ?></td>						
										
										<?php $cnt++; if($cnt>4) { echo "</tr><tr>"; $cnt=0; }  
											}
										 ?>
										 </tr>
										 
										 <?php } ?>
										
											
									
									
									</table>									
									
									</div>
									
									
									
									
									<div class="fleft">
									  <label>&nbsp;<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('newsletter_user_id')" onmouseout="hide_bg('newsletter_user_id')">
									  <input type="hidden" name="newsletter_user_id" id="newsletter_user_id" value="<?php echo $newsletter_user_id; ?>" />
									  <input type="hidden" name="offset" id="offset" value="<?php echo $offset; ?>" />
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>&nbsp;<span>&nbsp;</span></label>
									  <?php
										if($newsletter_user_id=="")
										{
									  ?>
									  <div class="submit">
										<input type="submit" name="submit" value="Submit" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer; " />
									  </div>
									  <?php
										}else{
									  ?>
									  <div class="submit">
										<input type="submit" name="submit" value="Update" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer; " onclick=""/>
									  </div>
									  <?php
										}
									  ?>
									  <div class="submit">
										<input type="button" name="cancel" value="Cancel" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer;" onClick="location.href='<?php echo site_url('newsletter/list_newsletter_user'); ?>'"/>
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