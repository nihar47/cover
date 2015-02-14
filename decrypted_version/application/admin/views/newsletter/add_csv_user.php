<script language="javascript">

function Checkfiles()
{

var fup = document.getElementById('upcsv');

var fileName = fup.value;

	if(fileName=='')
	{
		alert("Upload csv only");
		fup.focus();
	
		return false;
	}

var ext = fileName.substring(fileName.lastIndexOf('.') + 1);

		if(ext == "csv")
		{
			return true;
		} 
		
		else
		{
			alert("Upload csv only");
			fup.focus();
			
			return false;
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
										$attributes = array('name'=>'frm_addcsvreward', 'onsubmit' => 'return Checkfiles()');
										echo form_open_multipart('newsletter/add_csv_upload',$attributes);
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
										  <label>Upload CSV<span>&nbsp;</span></label>
										  <span onmouseover="show_bg('upcsv')" onmouseout="hide_bg('upcsv')">
							 <input type="file" name="upcsv" id="upcsv"  onfocus="show_bg('upcsv')" onblur="hide_bg('upcsv')"/>									
										  
										  </span>
										</div>
                                        
                                        <div style="float:left; padding:7px 0px 0px 40px;" align="center">
                                        <a href="<?php echo base_url();?>newsletter_user_format.csv" style="color:#036;">Download Sample CSV file</a>
                                        </div>
                                        
										<div style="clear:both;"></div>
										
										
									
										
										
										
										<div style="clear:both;"></div>
										<div class="fleft">
										  <label>&nbsp;<span>&nbsp;</span></label>
										  
										  <div class="submit">
											<input type="submit" name="submit" value="Update" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer; " onclick=""/>
										  </div>
										 
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