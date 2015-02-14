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

</script>

<div id="con-tabs">
          <ul>
            <li><span style="cursor:pointer;"><?php echo anchor('user/user_login','User Logins','id="sp_2" style="color:#364852;background:#ececec;"'); ?></span></li>
          </ul>
          <div id="text">
            <div id="1">
            
            
             <?php $CI =& get_instance();	$base_url = $CI->config->slash_item('base_url_site');
											$base_path = $CI->config->slash_item('base_path');
			 ?>
            
            
            <?php if($msg!='') { 
            
			if($msg=='delete') { ?><div align="center" style="color:#093; font-weight:bold;">Login details has been deleted successfully.</div> 
            
            <?php }   } ?>
            
            
            
            <div style="clear:both; height:25px;">
            
         <table border="0" cellpadding="0" cellspacing="0" width="100%"  height="25" >
			
			<tr> 
            
           
                    
            
            
            <td align="right" valign="top">
   <?php
	$attributes = array('name'=>'frm_listlogin','id'=>'frm_listlogin');
			
	echo form_open_multipart('user/action_login',$attributes);
	?>  
            
        <!-- <form name="frm_listlogin" id="frm_listlogin" action="<?php // echo site_url('user/action_login');?>" method="post">-->
            
           
           
           <input type="hidden" name="offset" id="offset" value="<?php echo $offset; ?>" />
           <input type="hidden" name="action" id="action" />
           
          
          
          
            <div style="float:right;"> 
            <table>
            <tr>
                   
          <td align="right" valign="top">
             <img src="<?php echo base_url();?>images/deletes.png" border="0" />&nbsp;&nbsp;
            </td>
            <td align="right" valign="middle">
        <a href="javascript:void(0)"  onclick="setaction('chk[]','delete', 'Are you sure, you want to delete selected record(s)?', 'frm_listlogin')" style="text-decoration:none;color:#000000;font-size:16px; font-weight:bold;" > Delete</a>
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
                                    <th width="25%" height="30"><strong>Username </strong></th>
                                    <th width="25%"><strong>Login Date</strong></th>
                                    <th width="25%"><strong>Login Time</strong></th>
                                    <th width="25%"><strong>Login IP</strong></th>                                    
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
											$temp = explode(" ",$row->login_date_time);
								  ?>
								  <tr onclick="<?php echo $fc; ?>(this);" class="<?php echo $cl; ?>">
                                  <td align="center" valign="middle"><input type="checkbox" name="chk[]" id="chk" value="<?php echo $row->login_id;?>" /></td>
                                    <td height="28"><div class="pad-left"><?php echo $row->user_name; ?></div></td>
                                    <td><div class="pad-left"><?php echo date('d-m-Y',strtotime($temp[0])); ?></div></td>
                                    <td><div class="pad-left"><?php echo $temp[1]; ?></div></td>
                                    <td><div class="pad-left"><?php echo $row->login_ip; ?></div></td>
                                  </tr>
								  <?php
								  			$i++;
										}
									}
								  ?> 
                                  <tr class="inner-tablebg">
                                    <td colspan="15" valign="top"><table border="0" align="left">
                                        <tr class="inner-table">
                                          <td width="50" align="center">&nbsp;</td>
                                          <td width="1" align="center"><img src="<?php echo base_url(); ?>images/devider1.png" alt="" width="2" /></td>
                                          <?php echo $page_link; ?>
                                          <td width="1" align="center"><img src="<?php echo base_url(); ?>images/devider1.png" alt="" /></td>
                                          <td width="100">&nbsp;</td>
										  <td width="650" align="center" valign="middle">&nbsp;</td>
                                          <td align="center" valign="middle">&nbsp;</td>
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