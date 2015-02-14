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



function getlimit(limit)
{
	if(limit=='0')
	{
	return false;
	}
	else
	{
		window.location.href='<?php echo site_url('affiliates/withdraw_request/'.$filter);?>'+'/'+limit;
	}

}

function getsearchlimit(limit)
{
	if(limit=='0')
	{
	return false;
	}
	else
	{
		
		window.location.href='<?php echo site_url('affiliates/search_withdraw_request/'.$filter);?>'+'/'+limit+'/'+'<?php echo $option.'/'.$keyword; ?>';
		
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
	
	


	function gomain(x)
	{
		
		if(x == 'all')
		{
			window.location.href= '<?php echo site_url('affiliates/withdraw_request/all');?>';
			
		}
	}
	
	</script>

<div id="con-tabs">
          <ul>
           
         
            
      <li><span style="cursor:pointer;"><?php echo anchor('affiliates','Stats'); ?></span></li>
    <li><span style="cursor:pointer;"><?php echo anchor('affiliates/common_settings','Common Settings'); ?></span></li>
     <li><span style="cursor:pointer;"><?php echo anchor('affiliates/commission_settings','Commission Settings'); ?></span></li>
      <li><span style="cursor:pointer;"><?php echo anchor('affiliates/commission_history','Commission History'); ?></span></li>
      
    
             <li><span style="cursor:pointer;"><?php echo anchor('requests/affiliate_requests','Affiliate Request'); ?></span></li>
        <li><span style="cursor:pointer;"><?php echo anchor('affiliates/withdraw_request','Withdraw Fund Request','id="sp_1" style="color:#364852;background:#ececec;"'); ?></span></li>
        
        
        
          </ul>
          <div id="text">
            <div id="1">
			<?php
				if($msg!=''){
					if($msg=='delete'){
			?>
				<div align="center" class="msgdisp">Record has been deleted Successfully.</div>
			<?php
					}
					if($msg=='insert'){
			?>
				<div align="center" class="msgdisp">New Record has been added Successfully.</div>
			<?php
					}
					if($msg=='update'){
			?>
				<div align="center" class="msgdisp">Record has been updated Successfully.</div>
			<?php
					}
					if($msg=='approve'){
			?>
				<div align="center" class="msgdisp">Record has been approved Successfully.</div>
			<?php
					}
					if($msg=='success'){
			?>
				<div align="center" class="msgdisp">Record has been successed Successfully.</div>
			<?php
					}
					
					if($msg=='reject'){
			?>
				<div align="center" class="msgdisp">Record has been rejected Successfully.</div>
			<?php
					}
					if($msg=='fail'){
			?>
				<div align="center" class="msgdisp">Record has been failed Successfully.</div>
			<?php
					}
				}
			?>
            
            
            
            
            
            
            
            
            
            <div style="clear:both; height:25px;">
            
         <table border="0" cellpadding="0" cellspacing="0" width="100%"  height="25" >
			
			<tr> 
            
            <td align="left" valign="top">
            
            <div style="float:left;">
            <table>
            <tr>
            <td align="left" valign="middle"><b>Per Page : </b></td>
            <td align="left" valign="top">
            
            <?php if($search_type=='normal') { ?>
            <select name="limit" id="limit" onchange="getlimit(this.value)" style="width:80px;">
            <?php } if($search_type=='search') { ?>
              <select name="limit" id="limit" onchange="getsearchlimit(this.value)" style="width:80px;">
            <?php } ?>
            <option value="0">Per Page</option>
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="15">15</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="75">75</option>
            <option value="100">100</option>
            
            
            </select>
            </td>
            
             <td align="left" valign="middle">&nbsp;</td>
            
             <td align="left" valign="middle"><b>Search by : </b></td>
            <td align="left" valign="middle">
            
            
           
			 <?php
					$attributes = array('name'=>'frm_search','id' => 'frm_search');
					echo form_open('affiliates/search_withdraw_request/'.$filter.'/'.$limit,$attributes);
		 	 ?>

                
                <select name="option" id="option" style="width:100px;" onchange="gomain(this.value)">
                <option value="all">All</option> 
                
        <option value="afrq.withdraw_amount"  <?php if($option=='afrq.withdraw_amount'){?> selected="selected"<?php }?>>Request Amount</option>        
                    <option value="us.user_name"  <?php if($option=='us.user_name'){?> selected="selected"<?php }?>>User Name</option>                    <option value="us.last_name"  <?php if($option=='us.last_name'){?> selected="selected"<?php }?>>Last Name</option>
                 
                </select>
                
                
                <input type="text" name="keyword" id="keyword" value="<?php echo $keyword;?>" />                
                <input type="submit" name="submit" id="submit" value="GO" />
                
                </form> 
            
            
            </td>
            
            
            
            </tr>
            </table>
            </div>
            
            </td>
            
                    
            <?php
		 	$attributes = array('name'=>'frm_listwithdrawrequest','id'=>'frm_listwithdrawrequest');
			echo form_open('affiliates/action_withdraw_request/'.$filter.'/'.$limit, $attributes);
		 ?> 
            
            <td align="right" valign="top">       
           
           
            <input type="hidden" name="offset" id="offset" value="<?php echo $offset; ?>" />
            <input type="hidden" name="limit" id="limit" value="<?php echo $limit; ?>" />
            <input type="hidden" name="option" id="option" value="<?php echo $option; ?>" />
            <input type="hidden" name="keyword" id="keyword" value="<?php echo $keyword; ?>" />
            <input type="hidden" name="search_type" id="search_type" value="<?php echo $search_type; ?>" />
            <input type="hidden" name="filter" id="filter" value="<?php echo $filter; ?>" />
              
           <input type="hidden" name="action" id="action" />
           
          
          
          
            <div style="float:right;"> 
            <table cellpadding="0" cellspacing="0" border="0">
            <tr>
            
            
        
          <td align="right" valign="top">
             <img src="<?php echo base_url();?>images/tick.png" border="0" />&nbsp;&nbsp;
            </td>
            <td align="right" valign="middle">
        <a href="javascript:void(0)"  onclick="setaction('chk[]','approve', 'Are you sure, you want to Approve selected record(s)?', 'frm_listwithdrawrequest')" style="text-decoration:none;color:#000000;font-size:13px; font-weight:bold;" >Approved</a>
        </td>
        
        <td width="5px;"></td>
        
        
        
         <td align="right" valign="top">
             <img src="<?php echo base_url();?>images/tick.png" border="0" />&nbsp;&nbsp;
            </td>
            <td align="right" valign="middle">
        <a href="javascript:void(0)"  onclick="setaction('chk[]','success', 'Are you sure, you want to Successed selected record(s)?', 'frm_listwithdrawrequest')" style="text-decoration:none;color:#000000;font-size:13px; font-weight:bold;" >Successed</a>
        </td>
        
        <td width="5px;"></td>
        
        
        
        
        
         <td align="right">
             <img src="<?php echo base_url();?>images/delete.png" border="0" />&nbsp;&nbsp;
            </td>
            <td align="right" valign="middle">
        <a href="javascript:void(0)"  onclick="setaction('chk[]','reject', 'Are you sure, you want to Reject selected record(s)?', 'frm_listwithdrawrequest')" style="text-decoration:none;color:#000000;font-size:13px; font-weight:bold;" > Reject</a>
        </td>
        
		
         <td width="5px;"></td>
         <td align="right">
             <img src="<?php echo base_url();?>images/delete.png" border="0" />&nbsp;&nbsp;
            </td>
            <td align="right" valign="middle">
        <a href="javascript:void(0)"  onclick="setaction('chk[]','fail', 'Are you sure, you want to Fail selected record(s)?', 'frm_listwithdrawrequest')" style="text-decoration:none;color:#000000;font-size:13px; font-weight:bold;" > Fail</a>
        </td>
        
         <td width="5px;"></td>
         <td align="right">
             <img src="<?php echo base_url();?>images/delete.png" border="0" />&nbsp;&nbsp;
            </td>
            <td align="right" valign="middle">
        <a href="javascript:void(0)"  onclick="setaction('chk[]','delete', 'Are you sure, you want to Delete selected record(s)?', 'frm_listwithdrawrequest')" style="text-decoration:none;color:#000000;font-size:13px; font-weight:bold;" > Delete</a>
        </td>
        
        
        
        <td width="10px;"></td>
        
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

<?php

$filter_link_all=site_url('affiliates/withdraw_request/all/'.$limit);
$filter_link_pending=site_url('affiliates/withdraw_request/pending/'.$limit);
$filter_link_approve=site_url('affiliates/withdraw_request/approve/'.$limit);
$filter_link_success=site_url('affiliates/withdraw_request/success/'.$limit);
$filter_link_reject=site_url('affiliates/withdraw_request/reject/'.$limit);
$filter_link_fail=site_url('affiliates/withdraw_request/fail/'.$limit);

if($search_type=='search') {
	$filter_link_all=site_url('affiliates/search_withdraw_request/all/'.$limit.'/'.$option.'/'.$keyword);
	$filter_link_pending=site_url('affiliates/search_withdraw_request/pending/'.$limit.'/'.$option.'/'.$keyword);
	$filter_link_approve=site_url('affiliates/search_withdraw_request/approve/'.$limit.'/'.$option.'/'.$keyword);
	$filter_link_success=site_url('affiliates/search_withdraw_request/success/'.$limit.'/'.$option.'/'.$keyword);
	$filter_link_reject=site_url('affiliates/search_withdraw_request/reject/'.$limit.'/'.$option.'/'.$keyword);
	$filter_link_fail=site_url('affiliates/search_withdraw_request/fail/'.$limit.'/'.$option.'/'.$keyword);
}

if($filter=='approve')
{
	$approve_class='color:#009900;font-weight:bold;font-size:15px;';
}
else
{
	$approve_class='color:#000000;';
}

if($filter=='success')
{
	$success_class='color:#009900;font-weight:bold;font-size:15px;';
}
else
{
	$success_class='color:#000000;';
}


if($filter=='reject')
{
	$reject_class='color:#009900;font-weight:bold;font-size:15px;';
}
else
{
	$reject_class='color:#000000;';
}



if($filter=='fail')
{
	$fail_class='color:#009900;font-weight:bold;font-size:15px;';
}
else
{
	$fail_class='color:#000000;';
}


if($filter=='pending')
{
	$pending_class='color:#009900;font-weight:bold;font-size:15px;';
}
else
{
	$pending_class='color:#000000;';
}

if($filter=='all')
{
	$all_class='color:#009900;font-weight:bold;font-size:15px;';
}
else
{
	$all_class='color:#000000;';
}

?>
<div style="float:right;padding-right:100px;">
<a href="<?php echo $filter_link_all;?>" style=" <?php echo $all_class; ?>">All</a>&nbsp;|&nbsp; 
<a href="<?php echo $filter_link_pending;?>" style=" <?php echo $pending_class; ?>">Pending</a>&nbsp;|&nbsp; 
<a href="<?php echo $filter_link_approve;?>" style=" <?php echo $approve_class; ?>">Approved</a>&nbsp;|&nbsp; 
<a href="<?php echo $filter_link_success;?>" style=" <?php echo $success_class; ?>">Successed</a>&nbsp;|&nbsp; 
<a href="<?php echo $filter_link_reject;?>" style=" <?php echo $reject_class; ?>">Rejected</a>&nbsp;|&nbsp; 
<a href="<?php echo $filter_link_fail;?>" style=" <?php echo $fail_class; ?>">Failed</a>
</div>


<div style="clear:both;"></div> </td>    
</tr>    
                        
                        
                        
           
                        
                        
                        
                        <tr>
                          <td valign="top"><div class="deals" style="display:block;" id="dig_it6">
                              <div id="last_login4" style="width:100%;overflow:auto;">
                                <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#888591">
                                  <tr class="alter">
									 <th>&nbsp;</th>
                                    <th height="30"><strong>User</strong></th>                                    
                                    <th><strong>Amount(<?php echo $site_setting['currency_symbol']; ?>)</strong></th>                                    
                                    <th><strong>Request Date</strong></th>
                                    <th><strong>Request IP</strong></th>
                                    <th><strong>Status</strong></th>									
								</tr>
								<?php
									if($result)
									{
										$i = 0;
										foreach($result as $row)
										{
											if($i%2 == "0")
											{
												$fc = "toggle";
												$cl = "alter";
											}else{
												$fc = "toggle1";
												$cl = "alter1";
											}
								?>
								<tr onclick="<?php echo $fc; ?>(this);" class="<?php echo $cl; ?>">									
									  <td align="center" valign="middle"><input type="checkbox" name="chk[]" id="chk" value="<?php echo $row['affiliate_withdraw_id'];?>" /></td>
                                      
                                      <td height="28"><div class="pad-left"><?php echo $row['user_name'].' '.$row['last_name']; ?></div></td>
									
                                    
                                    
									<td><div class="pad-right"><?php echo $row['withdraw_amount']; ?></div></td>
                                    
									
                                    
                                    <td><div class=""><?php echo date('d M,Y H:i:s',strtotime($row['withdraw_date'])); ?></div></td>
									
                                    
                                    	<td><div class=""><?php echo $row['withdraw_ip']; ?></div></td>
                                    
                                    <td><div style="font-weight:bold;">
                                    
                                   
									
									<?php 
									
									if($row['withdraw_status'] == 1){ echo "Approved"; }
									elseif($row['withdraw_status'] == 2){ echo "Successed"; }
									elseif($row['withdraw_status'] == 3){ echo "Rejected"; }
									elseif($row['withdraw_status'] == 4){ echo "Failed"; }
									else{ echo "Pending"; } ?>
                                    
                                 
                                    
                                    </div></td>
								
								</tr>
								<?php
											$i++;
										}
									} else { 
								?>           
                                
                                 <tr class="alter" height="28"><td colspan="15" align="center" valign="middle"><b>No withdraw request yet.</b> </td></tr>


                                  <?php } ?>
                                                                                        
                                  <?php if($result) { ?>
                                  
                                  <tr class="inner-tablebg">
                                    <td colspan="15" valign="top"><table  border="0" align="left">
                                        <tr class="inner-table">
                                          <td width="50" align="center">&nbsp;</td>
                                          <td width="1" align="center"><img src="<?php echo base_url(); ?>images/devider1.png" alt="" width="2" /></td>
                                          <?php echo $page_link; ?>
										  <td width="1" align="center"><img src="<?php echo base_url(); ?>images/devider1.png" alt="" /></td>
                                          <td width="100">&nbsp;</td>
										  <td width="650" align="center" valign="middle">&nbsp;</td>
										  <td width="100" align="left">&nbsp;</td>
										 </tr>
                                      </table></td>
                                  </tr>
                                  
                                  <?php } ?>
                                  
                                </table>
                              </div>
                              </form>

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
              </div>
            </div>
          </div>
        </div>