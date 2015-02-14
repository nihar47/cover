<script type="text/javascript" language="javascript">
	function delete_rec(id,offset)
	{
		var ans = confirm("Are you sure to delete record?");
		if(ans)
		{
			location.href = "<?php echo base_url(); ?>/requests/delete_affiliate_request/"+id+"/"+offset;
		}else{
			return false;
		}
	}
	function change_status(id)
	{
		if(document.getElementById('app_st_'+id).innerHTML == 'Approved')
		{
			var st = '0';
		}
		if(document.getElementById('app_st_'+id).innerHTML == 'Disapproved')
		{
			var st = '1';
		}
		var xmlHttp;
		try{
			xmlHttp = new XMLHttpRequest();
		}
		catch (e){
			try{
				xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
			}
			catch (e){
				try{
					xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				catch (e){
					alert("No Ajax");
					return false;
				}
			}
		}
		xmlHttp.onreadystatechange=function(){
			if(xmlHttp.readyState==4){
				if(xmlHttp.responseText == '0'){
					document.getElementById('app_st_'+id).innerHTML = 'Disapproved';
				}
				if(xmlHttp.responseText == '1'){
					document.getElementById('app_st_'+id).innerHTML = 'Approved';
				}
			}
		}
		xmlHttp.open("GET",'<?php echo base_url(); ?>requests/change_status/'+id+'/'+st,true);
		xmlHttp.send(null);
	}
	
	
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
		window.location.href='<?php echo site_url('requests/affiliate_requests/');?>'+'/'+limit;
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
		
		window.location.href='<?php echo site_url('requests/search_affiliate_requests');?>'+'/'+limit+'/'+'<?php echo $option.'/'.$keyword; ?>';
		
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
			window.location.href= '<?php echo site_url('requests/affiliate_requests/');?>';
			
		}
	}
	
	</script>

<div id="con-tabs">
          <ul>
           
         
            
      <li><span style="cursor:pointer;"><?php echo anchor('affiliates','Stats'); ?></span></li>
    <li><span style="cursor:pointer;"><?php echo anchor('affiliates/common_settings','Common Settings'); ?></span></li>
     <li><span style="cursor:pointer;"><?php echo anchor('affiliates/commission_settings','Commission Settings'); ?></span></li>
      <li><span style="cursor:pointer;"><?php echo anchor('affiliates/commission_history','Commission History'); ?></span></li>
      
    
             <li><span style="cursor:pointer;"><?php echo anchor('requests/affiliate_requests','Affiliate Request','id="sp_1" style="color:#364852;background:#ececec;"'); ?></span></li>
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
					if($msg=='approve'){
			?>
				<div align="center" class="msgdisp">Record has been approved Successfully.</div>
			<?php
					}
					if($msg=='reject'){
			?>
				<div align="center" class="msgdisp">Record has been rejected Successfully.</div>
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
					echo form_open('requests/search_affiliate_requests/'.$limit,$attributes);
		 	 ?>

                
                <select name="option" id="option" style="width:100px;" onchange="gomain(this.value)">
                <option value="all">All</option> 
                 <option value="afrq.site_name"  <?php if($option=='afrq.site_name'){?> selected="selected"<?php }?>>Site Name</option>
                 <option value="afrq.site_url"  <?php if($option=='afrq.site_url'){?> selected="selected"<?php }?>>Site URL</option>
                 <option value="afrq.special_promotional_method"  <?php if($option=='afrq.special_promotional_method'){?> selected="selected"<?php }?>>Special Promotional Method</option>
                 
                 
               		                 
                    <option value="us.user_name"  <?php if($option=='us.user_name'){?> selected="selected"<?php }?>>User Name</option>                    <option value="us.last_name"  <?php if($option=='us.last_name'){?> selected="selected"<?php }?>>Last Name</option>
                    <option value="prcat.project_category_name" <?php if($option=='prcat.project_category_name'){?> selected="selected"<?php }?>>Category</option>   
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
		 	$attributes = array('name'=>'frm_listrequest','id'=>'frm_listrequest');
			echo form_open('requests/action_request/'.$limit, $attributes);
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
             <img src="<?php echo base_url();?>images/add.png" border="0" />&nbsp;&nbsp;
            </td>
            <td align="right" valign="middle">
        <?php echo anchor('requests/add_affiliate_request','Add','style="text-decoration:none;color:#000000;font-size:13px; font-weight:bold;"');?>
        </td>
        
        <td width="5px;"></td>
        
        
          <td align="right">
             <img src="<?php echo base_url();?>images/delete.png" border="0" />&nbsp;&nbsp;
            </td>
            <td align="right" valign="middle">
        <a href="javascript:void(0)"  onclick="setaction('chk[]','delete', 'Are you sure, you want to Delete selected record(s)?', 'frm_listrequest')" style="text-decoration:none;color:#000000;font-size:13px; font-weight:bold;" > Delete</a>
        </td>
        
         <td width="5px;"></td>
        
          <td align="right" valign="top">
             <img src="<?php echo base_url();?>images/tick.png" border="0" />&nbsp;&nbsp;
            </td>
            <td align="right" valign="middle">
        <a href="javascript:void(0)"  onclick="setaction('chk[]','approve', 'Are you sure, you want to Approve selected record(s)?', 'frm_listrequest')" style="text-decoration:none;color:#000000;font-size:13px; font-weight:bold;" >Approved</a>
        </td>
        
		
		 <td width="5px;"></td>
        
          <td align="right" valign="top">
             <img src="<?php echo base_url();?>images/delete.png" border="0" />&nbsp;&nbsp;
            </td>
            <td align="right" valign="middle">
        <a href="javascript:void(0)"  onclick="setaction('chk[]','reject', 'Are you sure, you want to Reject selected record(s)?', 'frm_listrequest')" style="text-decoration:none;color:#000000;font-size:13px; font-weight:bold;" >Reject</a>
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
									<th><strong>Site</strong></th>
									<th><strong>Site URL</strong></th>
                                    <th><strong>Site Category</strong></th>
                                    <th><strong>Why do you want affiliate?</strong></th>
                                    <th><strong>Website Marketing?</strong></th>
                                    <th><strong>Search Engine Marketing?</strong></th>
									<th><strong>Email Marketing?</strong></th>
									<th><strong>Promotional Method</strong></th>
									<th><strong>Approved?</strong></th>
									<th><strong>Actions</strong></th>
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
									  <td align="center" valign="middle"><input type="checkbox" name="chk[]" id="chk" value="<?php echo $row['affiliate_request_id'];?>" /></td>
                                      
                                      <td height="28"><div class="pad-left"><?php echo $row['user_name'].' '.$row['last_name']; ?></div></td>
									<td><div class="pad-left"><?php echo $row['site_name']; ?></div></td>
									<td><div class="pad-left"><?php echo $row['site_url']; ?></div></td>
									<td><div class="pad-left"><?php echo $row['project_category_name']; ?></div></td>
									<td><div class="pad-left"><?php echo substr($row['why_affiliate'],0,100); ?></div></td>
									
                                    
                <td><div class=""><?php if($row['web_site_marketing'] == 1) { ?> <img src="<?php echo base_url();?>images/tick.png" border="0" /><?php } ?></div></td>
                <td><div class=""><?php if($row['search_engine_marketing'] == 1) { ?> <img src="<?php echo base_url();?>images/tick.png" border="0" /><?php } ?></div></td>
                <td><div class=""><?php if($row['email_marketing'] == 1) { ?> <img src="<?php echo base_url();?>images/tick.png" border="0" /><?php } ?></div></td>
									
                                    
                                    <td><div class="pad-left"><?php echo substr($row['special_promotional_method'],0,100); ?></div></td>
									
                                    
                                    <td><div style="font-weight:bold;">
                                    
                                   
									
									<?php if($row['approved'] == 1){ echo "Approved"; }elseif($row['approved'] == 2){ echo "Rejected"; }else{ echo "Pending"; } ?>
                                    
                                 
                                    
                                    </div></td>
									<td><div class="pad-left"><?php echo anchor('requests/edit_affiliate_request/'.$row['affiliate_request_id'].'/'.$offset,'Edit'); ?></div></td>
								</tr>
								<?php
											$i++;
										}
									}
								?>                                                                   
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