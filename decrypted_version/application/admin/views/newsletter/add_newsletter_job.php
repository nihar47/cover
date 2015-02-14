 <?php $CI =& get_instance();	
 		$base_url = $CI->config->slash_item('base_url_site');
		$base_path = base_path();
?>
<script type="text/javascript" src="<?php echo upload_url(); ?>js/jquery.min.js"></script>

<script type="text/javascript" src="<?php echo upload_url(); ?>js2/date.js"></script> 
<script type="text/javascript" src="<?php echo upload_url(); ?>js2/jquery.datePicker.js"></script>

<link href="<?php echo upload_url(); ?>js2/datePicker.css" rel="stylesheet" />
<script type="text/javascript" charset="utf-8">
Date.format = 'dd-mm-yyyy';
           jQuery(function()
            {

				jQuery('.date-pick').datePicker({clickInput:true})

            });
		</script>
<style type="text/css">
a.dp-choose-date {
	float: right;
	width: 16px;
	height: 16px;
	padding: 0;
	margin: 5px 237px 0px 0px;
	display: block;
	text-indent: -2000px;
	overflow: hidden;
	background: url(<?php echo upload_url(); ?>js2/calendar-green.gif) no-repeat; 
}

	
	 

</style>		
		
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
			
			<li><span style="cursor:pointer;"><?php echo anchor('newsletter/list_newsletter_user','Newsletter User'); ?></span></li>
			
				<?php } if($chk_newsletter_job==1) { ?>
			
			<li><span style="cursor:pointer;"><?php echo anchor('newsletter/newsletter_job','Newsletter Job','id="sp_1" style="color:#364852;background:#ececec;"'); ?></span></li>
			
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
										$attributes = array('name'=>'frm_addjob');
										echo form_open_multipart('newsletter/add_newsletter_job',$attributes);
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
										  <label>Select Newsletter<span>&nbsp;</span></label>
										  <span onmouseover="show_bg('upcsv')" onmouseout="hide_bg('upcsv')">
										  <select name="newsletter_id" id="newsletter_id" >
								<?php if($all_newsletter) {  
																																
										 foreach($all_newsletter as $alnw) { ?>	
										 
										<option value="<?php echo $alnw->newsletter_id;?>" <?php if($alnw->newsletter_id==$newsletter_id) { ?> selected="selected" <?php } ?> style="text-transform:capitalize;"><?php echo $alnw->subject; ?></option>
										<?php } } else { ?>
										
									<option value="">---No Newsletter---</option>
									<?php } ?>
									
									</select>						
										  
										  </span>
										</div>                
                                        
										<div style="clear:both;"></div>
										
										
									<div class="fleft">
									  <label>Job Start Date<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('job_start_date')" onmouseout="hide_bg('job_start_date')">
									  <input type="text" name="job_start_date" id="job_start_date" value="<?php echo $job_start_date; ?>" onfocus="show_bg('job_start_date')" onblur="hide_bg('job_start_date')" class="date-pick btn_input" size="10" />
									
									  </span>
									</div>
									<div style="clear:both;"></div>
									
										
										
										
										<div style="clear:both;"></div>
										<div class="fleft">
										  <label>&nbsp;<span>&nbsp;</span></label>
										  
										  <div class="submit">
											<input type="submit" name="submit" value="Insert" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer; " onclick=""/>
											<input type="hidden" name="offset" id="offset" value="<?php echo $offset; ?>" />
										  </div>
										 
										  <div class="submit">
											<input type="button" name="cancel" value="Cancel" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer;" onClick="location.href='<?php echo site_url('newsletter/newsletter_job'); ?>'"/>
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