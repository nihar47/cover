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
		window.location.href='<?php echo site_url('affiliates/commission_history/');?>'+'/'+limit;
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
		
		window.location.href='<?php echo site_url('affiliates/search_commission_history');?>'+'/'+limit+'/'+'<?php echo $option.'/'.$keyword; ?>';
		
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
			window.location.href= '<?php echo site_url('affiliates/commission_history/');?>';
			
		}
	}
	
	</script>

<div id="con-tabs">
          <ul>
           
         
            
      <li><span style="cursor:pointer;"><?php echo anchor('affiliates','Stats'); ?></span></li>
    <li><span style="cursor:pointer;"><?php echo anchor('affiliates/common_settings','Common Settings'); ?></span></li>
     <li><span style="cursor:pointer;"><?php echo anchor('affiliates/commission_settings','Commission Settings'); ?></span></li>
      <li><span style="cursor:pointer;"><?php echo anchor('affiliates/commission_history','Commission History','id="sp_1" style="color:#364852;background:#ececec;"'); ?></span></li>
      
    
             <li><span style="cursor:pointer;"><?php echo anchor('requests/affiliate_requests','Affiliate Request'); ?></span></li>
        <li><span style="cursor:pointer;"><?php echo anchor('affiliates/withdraw_request','Withdraw Fund Request'); ?></span></li>
        
        
        
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
					if($msg=='complete'){
			?>
				<div align="center" class="msgdisp">Record has been completed Successfully.</div>
			<?php
					}
					if($msg=='cancel'){
			?>
				<div align="center" class="msgdisp">Record has been cancelled Successfully.</div>
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
					echo form_open('affiliates/search_commission_history/'.$limit,$attributes);
		 	 ?>

                
                <select name="option" id="option" style="width:100px;" onchange="gomain(this.value)">
                <option value="all">All</option> 
                
                 <option value="usern.earn_amount"  <?php if($option=='usern.earn_amount'){?> selected="selected"<?php }?>>Earn Amount</option>        
                    <option value="us.user_name"  <?php if($option=='us.user_name'){?> selected="selected"<?php }?>>User Name</option>                    <option value="us.last_name"  <?php if($option=='us.last_name'){?> selected="selected"<?php }?>>Last Name</option>
                    <option value="prj.project_title" <?php if($option=='prj.project_title'){?> selected="selected"<?php }?>>Project Name</option>   
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
		 	$attributes = array('name'=>'frm_listcommissionhistory','id'=>'frm_listcommissionhistory');
			echo form_open('affiliates/action_commission_history/'.$limit, $attributes);
		 ?> 
            
            <td align="right" valign="top">       
           
           
            <input type="hidden" name="offset" id="offset" value="<?php echo $offset; ?>" />
            <input type="hidden" name="limit" id="limit" value="<?php echo $limit; ?>" />
            <input type="hidden" name="option" id="option" value="<?php echo $option; ?>" />
            <input type="hidden" name="keyword" id="keyword" value="<?php echo $keyword; ?>" />
            <input type="hidden" name="search_type" id="search_type" value="<?php echo $search_type; ?>" />
              
           <input type="hidden" name="action" id="action" />
           
          
          
          
            <div style="float:right;"> 
            <table cellpadding="0" cellspacing="0" border="0">
            <tr>
            
            
        
          <td align="right" valign="top">
             <img src="<?php echo base_url();?>images/tick.png" border="0" />&nbsp;&nbsp;
            </td>
            <td align="right" valign="middle">
        <a href="javascript:void(0)"  onclick="setaction('chk[]','complete', 'Are you sure, you want to Complete selected record(s)?', 'frm_listcommissionhistory')" style="text-decoration:none;color:#000000;font-size:13px; font-weight:bold;" >Complete</a>
        </td>
        
        <td width="5px;"></td>
         <td align="right">
             <img src="<?php echo base_url();?>images/delete.png" border="0" />&nbsp;&nbsp;
            </td>
            <td align="right" valign="middle">
        <a href="javascript:void(0)"  onclick="setaction('chk[]','cancel', 'Are you sure, you want to Cancel selected record(s)?', 'frm_listcommissionhistory')" style="text-decoration:none;color:#000000;font-size:13px; font-weight:bold;" > Cancel</a>
        </td>
        
		
         <td width="5px;"></td>
         <td align="right">
             <img src="<?php echo base_url();?>images/delete.png" border="0" />&nbsp;&nbsp;
            </td>
            <td align="right" valign="middle">
        <a href="javascript:void(0)"  onclick="setaction('chk[]','delete', 'Are you sure, you want to Delete selected record(s)?', 'frm_listcommissionhistory')" style="text-decoration:none;color:#000000;font-size:13px; font-weight:bold;" > Delete</a>
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
<div style="clear:both;"></div> </td>    
</tr>    
                        
                        
                        
                        
                        
                        
                        
                        <tr>
                          <td valign="top"><div class="deals" style="display:block;" id="dig_it6">
                              <div id="last_login4" style="width:100%;overflow:auto;">
                                <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#888591">
                                  <tr class="alter">
									 <th>&nbsp;</th>
                                    <th height="30"><strong>User</strong></th>
									<th><strong>Project</strong></th>
									<!--<th><strong>Perk</strong></th>-->
                                    <th><strong>Earn(<?php echo $site_setting['currency_symbol']; ?>)</strong></th>
                                    <th><strong>Referral User</strong></th>
                                    <th><strong>Earn Date</strong></th>
                                    <th><strong>Earn Status</strong></th>									
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
									  <td align="center" valign="middle"><input type="checkbox" name="chk[]" id="chk" value="<?php echo $row['user_earn_id'];?>" /></td>
                                      
                                      <td height="28"><div class="pad-left"><?php echo $row['user_name'].' '.$row['last_name']; ?></div></td>
									
                                    
                                    <td><div class="pad-left">
									
									<?php 
									
									if($row['project_id']>0)
									{
										
										echo $row['project_title'];
									
									}
									
									?>
                                    
                                    </div></td>
                                    
                                    
									<?php /*?><td><div class="pad-left">
									
									<?php 
									
									if($row['perk_id']>0)
									{															
										$perk_detail=$this->affiliate_model->get_perk_detail_by_id($row['perk_id']);	
										
										if($perk_detail)
										{
											echo $perk_detail->perk_title;
										}
										
									}								
									
									?>
                                    
                                    </div></td><?php */?>
                                    
                                    
									<td><div class="pad-right"><?php echo $row['earn_amount']; ?></div></td>
                                    
									<td><div class="pad-left"><?php 
									
									
									if($row['referral_user_id']>0)
									{
										
										$referral_user_detail=$this->affiliate_model->get_user_detail_by_id($row['referral_user_id']);
										
										if($referral_user_detail)
										{
											echo $referral_user_detail->user_name.' '.$referral_user_detail->last_name;
										}
										
									}
									
									
									
									
									 ?></div></td>
									
                                    
             
									
                                    
                                    <td><div class=""><?php echo date('d M,Y H:i:s',strtotime($row['earn_date'])); ?></div></td>
									
                                    
                                    <td><div style="font-weight:bold;">
                                    
                                   
									
									<?php if($row['earn_status'] == 1){ echo "Completed"; }elseif($row['earn_status'] == 2){ echo "Cancelled"; }else{ echo "Pending"; } ?>
                                    
                                 
                                    
                                    </div></td>
								
								</tr>
								<?php
											$i++;
										}
									} else { 
								?>           
                                
                                 <tr class="alter" height="28"><td colspan="15" align="center" valign="middle"><b>No User Earn yet.</b> </td></tr>


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