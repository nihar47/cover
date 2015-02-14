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
		window.location.href='<?php echo site_url('curated/list_curated');?>'+'/'+limit;
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
		
		window.location.href='<?php echo site_url('curated/search_curated');?>'+'/'+limit+'/'+'<?php echo $option.'/'.$keyword; ?>';
		
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
			window.location.href= '<?php echo site_url('curated/list_curated');?>';
			
		}
	}
	
	</script>
<div id="con-tabs">
          <ul>
            <li><span style="cursor:pointer;"><?php echo anchor('curated/list_curated','Curated','id="sp_1" style="color:#364852;background:#ececec;"'); ?></span></li>
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
					if($msg=='active'){
			?>
				<div align="center" class="msgdisp">Record has been activated Successfully.</div>
			<?php
					}
					if($msg=='inactive'){
			?>
				<div align="center" class="msgdisp">Record has been inactivated Successfully.</div>
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
					echo form_open('curated/search_curated/'.$limit,$attributes);
		 	 ?>

                
                <select name="option" id="option" style="width:100px;" onchange="gomain(this.value)">
                <option value="all">All</option> 
                
<option value="cu.curated_title"  <?php if($option=='cu.curated_title'){?> selected="selected"<?php }?>>Curated Title</option>        
<!--<option value="us.user_name"  <?php if($option=='us.user_name'){?> selected="selected"<?php }?>>User Name</option>
<option value="us.last_name"  <?php if($option=='us.last_name'){?> selected="selected"<?php }?>>Last Name</option>-->
                   
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
		 	$attributes = array('name'=>'frm_listcurated','id'=>'frm_listcurated');
			echo form_open('curated/action_curated/'.$limit, $attributes);
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
        <?php echo anchor('curated/add_curated','Add','style="text-decoration:none;color:#000000;font-size:13px; font-weight:bold;"');?>
        </td>
        
        <td width="5px;"></td>
            
        
          <td align="right" valign="top">
             <img src="<?php echo base_url();?>images/tick.png" border="0" />&nbsp;&nbsp;
            </td>
            <td align="right" valign="middle">
        <a href="javascript:void(0)"  onclick="setaction('chk[]','active', 'Are you sure, you want to Active selected record(s)?', 'frm_listcurated')" style="text-decoration:none;color:#000000;font-size:13px; font-weight:bold;" >Active</a>
        </td>
        
        <td width="5px;"></td>
         <td align="right">
             <img src="<?php echo base_url();?>images/delete.png" border="0" />&nbsp;&nbsp;
            </td>
            <td align="right" valign="middle">
        <a href="javascript:void(0)"  onclick="setaction('chk[]','inactive', 'Are you sure, you want to Inactive selected record(s)?', 'frm_listcurated')" style="text-decoration:none;color:#000000;font-size:13px; font-weight:bold;" >Inactive</a>
        </td>
        
		
         <td width="5px;"></td>
         <td align="right">
             <img src="<?php echo base_url();?>images/delete.png" border="0" />&nbsp;&nbsp;
            </td>
            <td align="right" valign="middle">
        <a href="javascript:void(0)"  onclick="setaction('chk[]','delete', 'Are you sure, you want to Delete selected record(s)?', 'frm_listcurated')" style="text-decoration:none;color:#000000;font-size:13px; font-weight:bold;" > Delete</a>
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
                              <div id="last_login4" style="width:100%;overflow-x:auto;overflow-y:hidden;">
                                <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#888591">
                                  <tr class="alter">
                                 	 <th>&nbsp;</th>
                                     <th>Image</th>
                                    <th height="30"><strong>Curated Name</strong></th>
                                    <th height="30"><strong>Curated Link</strong></th>
                                <!-- <th><strong>User</strong></th>
									<th><strong>Projects</strong></th>-->
									<th><strong>Active</strong></th>    
									<th style="width:50px;"><strong>Action</strong></th>                             
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
											
											
											$total_project=$this->curated_model->get_curated_project_count($row->curated_id);
											
											
								  ?>
								  <tr onClick="<?php echo $fc; ?>(this);" class="<?php echo $cl; ?>">
                                   <td align="center" valign="middle"><input type="checkbox" name="chk[]" id="chk" value="<?php echo $row->curated_id;?>" /></td>
                                   
                                   <td> 
                                   
                                   <?php 
								  // echo $_SERVER['DOCUMENT_ROOT'].'/indiefilmfunding/decrypted_version/upload/curated_thumb/'.$row->curated_image;// str_replace('\install/','',base_path());
								   if($row->curated_image!='') { 
								   if(file_exists($_SERVER['DOCUMENT_ROOT'].'/indiefilmfunding/decrypted_version/upload/curated_thumb/'.$row->curated_image)) {//echo "exists";
                                   ?>
								 <img src="<?php echo upload_url().'upload/curated_thumb/'.$row->curated_image; ?>" border="0" width="50" height="50" />  
                                   
								   <?php } } ?>
                                   </td>
                               <td height="28"><div class="pad-left" style="text-transform:capitalize;">
							   
							   
							   <?php if($row->curated_active==1){ echo anchor(front_base_url().'pages/'.$row->url_curated_title,ucwords($row->curated_title),' target="_blank"'); } else { echo ucwords($row->curated_title); } ?>
                               
                               </div></td>
                               <td><?php echo$row->curated_link; ?> </td>
                                  <!--  <td><?php if($row->user_id>0) { echo ucwords($row->user_name.' '.$row->last_name); } else { echo "N/A"; } ?> </td>
									<td><div class=""><?php if($total_project>0){ echo anchor('curated/projects/'.$row->curated_id,$total_project);  } else { echo $total_project; } ?></div></td>-->
                                    <td><div class=""><?php if($row->curated_active==1){ echo "Active"; }else{ echo "Inactive"; } ?></div></td>
									<td><div class="pad-left"><?php echo anchor('curated/edit_curated/'.$row->curated_id.'/'.$offset,'Edit'); ?> </div></td>
                                  </tr>
								  <?php
								  			$i++;
										}
									
								  ?>                     
                                  
                                  
                                  
                                 
                                  
                                                                                
                                  <tr class="inner-tablebg">
                                    <td colspan="10" valign="top"><table  border="0" align="left">
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
                                  
                                   <?php }  else {  ?>
                                   
                                   <tr class="inner-tablebg">
                                    <td colspan="10" height="30" valign="middle" align="center">No records has been found. </td>
                                  </tr>
                                   
                                   <?php } ?>
                                   
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
              </div>
            </div>
          </div>
        </div>