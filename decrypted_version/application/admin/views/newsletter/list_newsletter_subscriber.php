<script type="text/javascript" language="javascript">
function setchecked(elemName,status){
	elem = document.getElementsByName(elemName);
	for(i=0;i<elem.length;i++){
		elem[i].checked=status;
	}
}

function setaction(elename, actionval, actionmsg, formname) {
	vchkcnt=0;
	elem = document.getElementsByName(elename);
	
	for(i=0;i<elem.length;i++){
		if(elem[i].checked) vchkcnt++;	
	}
	if(vchkcnt==0) {
		alert('Please select a record')
	} else {
		
		if(confirm(actionmsg))
		{
			document.getElementById('action').value=actionval;	
			document.getElementById(formname).submit();
		}		
		
	}
}

	function chk_valid()
	{
		
		var keyword = document.getElementById('keyword').value;
		
		if(keyword=='')
		{
			alert('Please enter search keyword');	
			return false;
			
		}
		
		else
		{
			return true;			
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
		   
		    <li><span style="cursor:pointer;"><?php echo anchor('newsletter/list_newsletter','Newsletters','id="sp_1" style="color:#364852;background:#ececec;"'); ?></span></li>
			
			 <?php } if($chk_list_newsletter_user==1) { ?>
			
			<li><span style="cursor:pointer;"><?php echo anchor('newsletter/list_newsletter_user','Newsletter User'); ?></span></li>
			
				<?php } if($chk_newsletter_job==1) { ?>
			
			<li><span style="cursor:pointer;"><?php echo anchor('newsletter/newsletter_job','Newsletter Job'); ?></span></li>
			
			<?php }   if($chk_newsletter_setting==1) { ?>
			
			<li><span style="cursor:pointer;"><?php echo anchor('newsletter/newsletter_setting','Settings'); ?></span></li>
			
			<?php } ?>
          </ul>
          <div id="text">
            <div id="1">
			
			
			       <?php $CI =& get_instance();	$base_url = $CI->config->slash_item('base_url_site');
											$base_path = $CI->config->slash_item('base_path');
			 ?>
            
            
            <?php if($msg!='') { 
            
			if($msg=='delete') { ?><div align="center" style="color:#093; font-weight:bold;">User Subscription has been deleted successfully.</div> 
            
            
            <?php } } ?>
            
            
            
			<div style="clear:both; height:25px;">
            
         <table border="0" cellpadding="0" cellspacing="0" width="100%"  height="25" >
			
			<tr> 
            
           
		    <td align="left" valign="top">
            
            <div style="float:left;">
            <table>
            <tr>
                        
             <td align="left" valign="middle"><b>Search by : </b></td>
            <td align="left" valign="middle">
            <?php
	$attributes = array('name'=>'frm_search','id'=>'frm_search','onSubmit'=>'return chk_valid();');
			
	echo form_open_multipart('newsletter/search_subscriber_user/'.$newsletter_id,$attributes);
	?>
            
            
                
                <select name="option" id="option" style="width:100px;">
               		<option value="user_name">Username</option>                    
                    <option value="email">Email</option>                   
                </select>
                
                
                <input type="text" name="keyword" id="keyword" value="" />                
                <input type="submit" name="submit" id="submit" value="GO" />
                
                </form> 
            
            
            </td>
            
            
            
            </tr>
            </table>
            </div>
            
            </td>
                    
            
            
            <td align="right" valign="top">
            
              <?php
	$attributes = array('name'=>'frm_listuser','id'=>'frm_listuser');
			
	echo form_open_multipart('newsletter/action_newsletter_subscriber/',$attributes);
	?>
           
           
            <input type="hidden" name="offset" id="offset" value="<?php echo $offset; ?>" />
           <input type="hidden" name="newsletter_id" id="newsletter_id" value="<?php echo $newsletter_id; ?>" />
           <input type="hidden" name="action" id="action" />
           
          
          
          
            <div style="float:right;"> 
            <table>
            <tr>
        
		
          <td align="right" valign="top">
             <img src="<?php echo base_url();?>images/deletes.png" border="0" />&nbsp;&nbsp;
            </td>
            <td align="right" valign="middle">
        <a href="javascript:void(0)"  onclick="setaction('chk[]','delete', 'Are you sure, you want to delete selected record(s)?', 'frm_listuser')" style="text-decoration:none;color:#000000;font-size:16px; font-weight:bold;" > Delete</a>
        </td>
   
        </tr></table>
        
        </div>
        
        <div style="clear:both;"></div>
        
        </td>
            
            </tr>
				</table>
						
			</div>
			
			
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
                    <td valign="top"><table width="100%" border="0" bgcolor="#FFFFFF">
                        
						
							<tr>
							<td align="left" valign="top">   
                            
                            
                            <div style="float:left;"> 
                  <a href="javascript:void(0)" onclick="javascript:setchecked('chk[]',1)" style="color:#000;"><?php echo "Check All"; ?></a>&nbsp; |&nbsp; 
           <a href="javascript:void(0)" onclick="javascript:setchecked('chk[]',0)" style="color:#000;"><?php echo "Clear All"; ?></a>
                     
            </div>
           <div style="clear:both;"></div> </td>    
           
						</tr>
						
						
						<tr>
                          <td valign="top"><div class="deals" style="display:block;" id="dig_it6">
                              <div id="last_login4" style="width:100%;overflow-x:auto;overflow-y:hidden;">
                                <table width="100%" cellpadding="0" cellspacing="1" bgcolor="#888591">
                                  <tr class="alter">
								  <th width="2%">&nbsp;</th>
                                    <th width="10%" height="30"><strong>Name </strong></th>
									<th width="20%"><strong>Email</strong></th>								
									                                
                                    <th width="10%"><strong>Signup IP Address</strong></th>                          
                                   
                                    <th width="10%"><strong>Subscribe Date</strong></th>
                                                              
                                  </tr>
                                  <?php
								  	if($result)
									{
										$i=0;
										foreach($result as $row)
										{
											if($i%2=="0")
											{
												$fc = "toggle";
												$cl = "alter";
											}else{
												$fc = "toggle1";
												$cl = "alter1";
											}
								  ?>
								  <tr onclick="<?php echo $fc; ?>(this);" class="<?php echo $cl; ?>">
							  <td align="center" valign="middle"><input type="checkbox" name="chk[]" id="chk" value="<?php echo $row->newsletter_user_id;?>" /></td>
                                    <td height="28"><div class="pad-left" style="text-transform:capitalize;"><?php echo $row->user_name; ?></div></td>
                                   <td align="center" valign="middle"><?php echo $row->email; ?></td>
                                   
                                  
									
									 
                                    <td align="center" valign="middle"><?php echo $row->user_ip; ?></td>                                
                               
                                
                                    <td align="center" valign="middle"><?php echo date('d M,Y',strtotime($row->subscribe_date)); ?></td>
									
								
                                  </tr>
								  <?php
								  			$i++;
										}
									} else {
								  ?>        
								  
								  <tr class="alter">
                                    <td colspan="15" align="center" valign="middle" height="30">No Records found.</td></tr>
								  
								  <?php } ?>                                                           
                                  <tr class="inner-tablebg">
                                    <td colspan="15" valign="top"><table border="0" align="left" >
                                        <tr class="inner-table">
                                          <td width="50" align="center">&nbsp;</td>
                                          <td width="1" align="center"><img src="<?php echo base_url(); ?>images/devider1.png" alt="" width="2" /></td>
                                          <?php echo $page_link; ?>
										  <td width="1" align="center"><img src="<?php echo base_url(); ?>images/devider1.png" alt="" /></td>
                                          <td width="100">&nbsp;</td>
										  <td width="650" align="center" valign="middle">&nbsp;</td>
										  <td align="left" width="100">&nbsp;</td>
                                        </tr>
                                      </table></td>
                                  </tr>
                                </table>
                              </div>
                              <div id="chart4" style="display:none;">
                                <table cellpadding="0" cellspacing="0" border="0">
                                  <tr>
                                    <td align="center"><img src="<?php echo base_url(); ?>images/chart.jpg" alt="" /></td>
                                  </tr>
                                </table>
                              </div>
                            </div></td>
                        </tr>
                      </table></td>
                    <td background="<?php echo base_url(); ?>images/c2-r.jpg"></td>
                  </tr>
                  <tr>
                    <td><img src="<?php echo base_url(); ?>images/c2-b-l.jpg" alt="" height="4" width="7" /></td>
                    <td background="<?php echo base_url(); ?>images/c2-b.jpg"></td>
                    <td><img src="<?php echo base_url(); ?>images/c2-b-r.jpg" alt="" height="4" width="7" /></td>
                  </tr>
                </table>
				</form>
              </div>
            </div>
          </div>
        </div>