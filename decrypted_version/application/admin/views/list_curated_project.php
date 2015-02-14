<script type="text/javascript">
	
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
		window.location.href='<?php echo site_url('curated/projects/'.$curated_id);?>'+'/'+limit;
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
		
		window.location.href='<?php echo site_url('curated/search_projects/'.$curated_id);?>'+'/'+limit+'/'+'<?php echo $option.'/'.$keyword; ?>';
		
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
<script type="text/javascript">
	function gomain(x)
	{
		
		if(x == 'all')
		{
			window.location.href= '<?php echo site_url('curated/projects/'.$curated_id);?>';
			
		}
	}
</script>



<div id="con-tabs">
          <ul>
             <li><span style="cursor:pointer;"><?php echo anchor('curated/list_curated','Curated','id="sp_1" style="color:#364852;background:#ececec;"'); ?></span></li>
          </ul>
          <div id="text">
            <div id="1">
            
       
            <?php $CI =& get_instance();	$base_url = $CI->config->slash_item('base_url_site');
											$base_path = base_path();
			 ?>
            
            
            <?php 
			
			
			if($msg) 
			{ 				
				foreach($msg as $key => $val)
				{
					
					$msg_prj=$this->project_category_model->get_one_project($key);
					
					
					
					
					if($msg_prj)
					{
						$project_title_error=$msg_prj['project_title'];
						
			
						if($val=='delete') { ?><div align="center" class="msgdisp"><span style="color:#0099FF;">"<?php echo $project_title_error;?>"</span> has been deleted Successfully.</div> 
                
          <?php }  if($val=='cannot_delete_active') { ?> <div align="center" class="msgdisp" style="color:#FF0000;">You can not delete active project <span style="color:#0099FF;">"<?php echo $project_title_error;?>"</span>.</div> 
                  
            <?php }if($val=='no_delete') { ?><div align="center" class="msgdisp" style="color:#FF0000;">You can not delete active project <span style="color:#0099FF;">"<?php echo $project_title_error;?>"</span>.</div> 
            
            <?php }  if($val=='active') { ?> <div align="center" class="msgdisp"><span style="color:#0099FF;">"<?php echo $project_title_error;?>"</span> has been activated Successfully.</div> 
            
            
              <?php }  if($val=='cannot_active_expired') { ?> <div align="center" class="msgdisp" style="color:#FF0000;">You can not active expired project <span style="color:#0099FF;">"<?php echo $project_title_error;?>"</span>.</div> 
              
              
              
            <?php }  if($val=='inactive') { ?> <div align="center" class="msgdisp"><span style="color:#0099FF;">"<?php echo $project_title_error;?>"</span> has been inactivated Successfully.</div>
			 
             <?php }  if($val=='declined') { ?> <div align="center" class="msgdisp"><span style="color:#0099FF;">"<?php echo $project_title_error;?>"</span> has been declined Successfully.</div> 
            
            
            
           
            <?php } if($val=='feature') { ?> <div align="center" class="msgdisp"><span style="color:#0099FF;">"<?php echo $project_title_error;?>"</span> has been featured Successfully.</div> 
             
			 <?php } if($val=='set_featured_active') { ?> <div align="center" class="msgdisp"><span style="color:#0099FF;">"<?php echo $project_title_error;?>"</span> has been activated and set featured Successfully.</div> 
            
            
            
            <?php } if($val=='not_feature') { ?> <div align="center" class="msgdisp"><span style="color:#0099FF;">"<?php echo $project_title_error;?>"</span> has been remove from featured Successfully.</div> 
            
            <?php } if($val == "insert"){?> <div align="center" class="msgdisp">New <span style="color:#0099FF;">"<?php echo $project_title_error;?>"</span> has been added Successfully.</div>
            
			<?php }	if($val == "update") {?> <div align="center" class="msgdisp"><span style="color:#0099FF;">"<?php echo $project_title_error;?>"</span> has been updated Successfully.</div>
            
			<?php }
			
					} 
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
					echo form_open('curated/search_projects/'.$curated_id.'/'.$limit,$attributes);
		 	 ?>

                
                <select name="option" id="option" style="width:100px;" onchange="gomain(this.value)">
                <option value="all">All</option> 
               		<option value="prj.project_title" <?php if($option=='prj.project_title'){?> selected="selected"<?php }?>>Project Title</option>                    
                    <option value="us.user_name"  <?php if($option=='us.user_name'){?> selected="selected"<?php }?>>First Name</option>                   <option value="us.last_name"  <?php if($option=='us.last_name'){?> selected="selected"<?php }?>>Last Name</option>                   
                </select>
                
                
                <input type="text" name="keyword" id="keyword" value="<?php echo $keyword;?>" />                
                <input type="submit" name="submit" id="submit" value="GO" />
                
                </form> 
            
            
            </td>
            
            
            
            </tr>
            </table>
            </div>
            
            </td>
            
                    
            
            
            <td align="right" valign="top">
            
       
		 <?php
		 	$attributes = array('name'=>'frm_listproject','id'=>'frm_listproject');
			echo form_open('curated/action_project/'.$curated_id.'/'.$limit, $attributes);
		 ?>
            
           
           
           <input type="hidden" name="offset" id="offset" value="<?php echo $offset; ?>" />
           <input type="hidden" name="action" id="action" />
           
          
          
          
            <div style="float:right;"> 
            <table cellpadding="0" cellspacing="0" border="0">
            <tr>
            
            
          
        
        
          <td align="right">
             <img src="<?php echo base_url();?>images/delete.png" border="0" />&nbsp;&nbsp;
            </td>
            <td align="right" valign="middle">
        <a href="javascript:void(0)"  onclick="setaction('chk[]','delete', 'Are you sure, you want to delete selected project(s)?', 'frm_listproject')" style="text-decoration:none;color:#000000;font-size:13px; font-weight:bold;" > Delete</a>
        </td>
        
         <td width="5px;"></td>
        
          <td align="right" valign="top">
             <img src="<?php echo base_url();?>images/tick.png" border="0" />&nbsp;&nbsp;
            </td>
            <td align="right" valign="middle">
        <a href="javascript:void(0)"  onclick="setaction('chk[]','active', 'Are you sure, you want to active selected project(s)?', 'frm_listproject')" style="text-decoration:none;color:#000000;font-size:13px; font-weight:bold;" >Active</a>
        </td>
        
		
		 <td width="5px;"></td>
        
          <td align="right" valign="top">
             <img src="<?php echo base_url();?>images/delete.png" border="0" />&nbsp;&nbsp;
            </td>
            <td align="right" valign="middle">
        <a href="javascript:void(0)"  onclick="setaction('chk[]','declined', 'Are you sure, you want to declined selected project(s)?', 'frm_listproject')" style="text-decoration:none;color:#000000;font-size:13px; font-weight:bold;" >Declined</a>
        </td>
        
         <td width="5px;"></td>
        
          <td align="right" valign="top">
             <img src="<?php echo base_url();?>images/delete.png" border="0" />&nbsp;&nbsp;
            </td>
            <td align="right" valign="middle">
        <a href="javascript:void(0)"  onclick="setaction('chk[]','inactive', 'Are you sure, you want to inactive selected project(s)?', 'frm_listproject')" style="text-decoration:none;color:#000000;font-size:13px; font-weight:bold;" >Inactive</a>
        </td>
        
        <td width="5px;"></td>
        
          <td align="right" valign="top">
          <img src="<?php echo base_url();?>images/featured.png" border="0" />&nbsp;&nbsp;
            </td>
            <td align="right" valign="middle">
        <a href="javascript:void(0)"  onclick="setaction('chk[]','feature', 'Are you sure, you want to Featured selected project(s)?', 'frm_listproject')" style="text-decoration:none;color:#000000;font-size:13px; font-weight:bold;" >Featured</a>
        </td>
        
        <td width="5px;"></td>
        
          <td align="right" valign="top">
           <img src="<?php echo base_url();?>images/not_featured.png" border="0" />&nbsp;&nbsp;
            </td>
            <td align="right" valign="middle">
        <a href="javascript:void(0)"  onclick="setaction('chk[]','not_feature', 'Are you sure, you want to Remove Featured selected project(s)?', 'frm_listproject')" style="text-decoration:none;color:#000000;font-size:13px; font-weight:bold;" >Not Featured</a>
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
                    <td align="left" valign="top">
                    
                    
                    <table align="left" width="100%" border="0" bgcolor="#FFFFFF">
						<tr>
							<td align="left" valign="top">   
                            
                            
                      <div style="float:left;"> 
                  <a href="javascript:void(0)" onclick="javascript:setchecked('chk[]',1)" style="color:#000;"><?php echo "Check All"; ?></a>&nbsp; |&nbsp; 
           <a href="javascript:void(0)" onclick="javascript:setchecked('chk[]',0)" style="color:#000;"><?php echo "Clear All"; ?></a>
                     
            </div>
            
            
            
            
            <div style="float:left; padding:0px 0px 0px 15px;">
            
            
          <span style="font-weight:bold;">Red : </span>User have not enter or verify the payment details.
          
            
            </div>
             <div style="float:right; padding:0px 15px 0px 0px; color:#f00;">
            
            
          <span style="font-weight:bold;">Note : </span>You can not delete active Records.
          
            
            </div>
            
           <div style="clear:both;"></div> </td>    
           
						</tr>
                        
                        
                        
						<tr>
                          <td valign="top"><div class="deals" style="display:block;" id="dig_it6">
                              <div id="last_login4" style="width:100%;overflow-x:auto;overflow-y:hidden;">
                                <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#888591">
                                  <tr class="alter">
                                  <th>&nbsp;</th>
									<th height="30"><strong>Projects Title</strong></th>
									<th ><strong>Category</strong></th>
									<th><strong>User Name</strong></th>  
									<th><strong>Goal(<?php echo $site_setting['currency_symbol']; ?>)</strong></th>  
									<th><strong>Raised(<?php echo $site_setting['currency_symbol']; ?>)</strong></th>     
									
									<th><strong>Host IP</strong></th>   
                                    
                                   <th><strong>&nbsp;Edit&nbsp;</strong></th>
                                    <th><strong>Updates</strong></th>
                                    <th><strong>Perks</strong></th>                                    
                                    <th><strong>Donation</strong></th>
                                    <th><strong>Gallery</strong></th>
                                    
                                    
                                     <th><strong>Comment</strong></th>
                                      <th><strong>Widgets</strong></th>
                                      
                                    <th><strong>Featured</strong></th>
                                    
									<th><strong>Status</strong></th>   
									               
                                    
                                                                
                                  </tr>
                                  <?php
								  $cls='';
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
											
											
											
											
											$adptive=$this->project_category_model->get_paypal_adptive_status();
											
											$normal_paypal=$this->project_category_model->get_paypal_normal_status();
											
											$amazon=$this->project_category_model->get_amazon_status();
											
											
											
											
											$user_detail=$this->user_model->get_one_user($row['user_id']);
										
										
										if($normal_paypal==1 || $adptive==1)
										{
											if(isset($user_detail['paypal_email']))
											{
												if($user_detail['paypal_email']=='')
												{												
													$cls='style="background:#FFDFDF;"';
												}
												else
												{
													$cls='';
												}
											}
											else
											{
												$cls='style="background:#FFDFDF;"';
											}
											
										}
										
										if($amazon==1)
										{
										
											if(isset($user_detail['amazon_token_id']))
											{	
												if($user_detail['amazon_token_id']=='')
												{
													$cls='style="background:#FFDFDF;"';
												}
												else
												{
													$cls='';
												}
										
											}
												else
												{
													$cls='style="background:#FFDFDF;"';
												}
												
												
										}	
											
											
											
											
											
								  ?>
								  <tr onClick="<?php echo $fc; ?>(this);" class="<?php echo $cl; ?>" <?php echo $cls; ?>>
                                  
                         <td align="center" valign="middle"><input type="checkbox" name="chk[]" id="chk" value="<?php echo $row['project_id'];?>" /></td>
								    <td height="28"><div class="pad-left">
                                    <a href="<?php echo front_base_url().'projects/'.$row['url_project_title'].'/'.$row['project_id']; ?>" target="_blank">
									<?php echo $row['project_title']; ?></a>
                                    </div></td>
                                    <td ><div class="pad-left"><?php echo $row['project_category_name']; ?></div></td>
									<td ><div class="pad-left">
									
									 <a href="<?php echo front_base_url().'member/'.$row['user_id']; ?>" target="_blank">
									<?php echo $row['user_name'].' '.$row['last_name']; ?>
                                    </a>
                                    
                                    </div></td>
									<td><div class="pad-left"><?php if($row['amount']=='') { echo set_currency('0'); } else { echo set_currency($row['amount']); } ?></div></td>
									<td><div class="pad-left"><?php if($row['amount_get']=='') { echo set_currency('0'); } else { echo set_currency($row['amount_get']); } ?></div></td>
                                   
									<td><div class="pad-left"><?php echo $row['host_ip']; ?></div></td>
									
									
                                    
         <td><a href="<?php echo site_url('project_category/edit_project/'.$row['project_id']);?>" target="_blank"><img src="<?php echo base_url();?>images/edit.png" border="0" /></a></td>
                                  
         <td><a href="<?php echo site_url('project_category/updates/'.$row['project_id']);?>" target="_blank"><img src="<?php echo base_url();?>images/update.png" border="0" /></a></td>
         
         <td><a href="<?php echo site_url('project_category/perks/'.$row['project_id']);?>" target="_blank"><img src="<?php echo base_url();?>images/perk.png" border="0" /></a></td>     
         
                                     
         <td><a href="<?php echo site_url('project_category/donations/'.$row['project_id']);?>" target="_blank"><img src="<?php echo base_url();?>images/donation.png" border="0" /></a></td>
         
         
         <td><a href="<?php echo site_url('project_category/gallery/'.$row['project_id']);?>" target="_blank"><img src="<?php echo base_url();?>images/gallery.png" border="0" /></a></td>
                                    
                                    
         <td><a href="<?php echo site_url('project_category/comment/'.$row['project_id']);?>" target="_blank"><img src="<?php echo base_url();?>images/comment.png" border="0" /></a></td>
                                     
         <td><a href="<?php echo site_url('project_category/widgets/'.$row['project_id']);?>" target="_blank"><img src="<?php echo base_url();?>images/widgets.png" border="0" /></a></td>
                                    
                                    
									
									
									<td align="center"><div align="center">
									
									
									<?php if($row['is_featured']==1){ ?>
                                    
                                     <img src="<?php echo base_url();?>images/featured.png" border="0" />
                                    
                                    <?php }	?></div></td>		
                                    
                                    
                                    
                                 <td align="center"><div align="center">


								<?php if(strtotime($row['end_date'])>strtotime(date('Y-m-d')))
								{
								
								if($row['active']==1){ ?>
								
								<img src="<?php echo base_url();?>images/tick.png" border="0" />
								
								<?php } if($row['active']==0){ ?>
								
								<img src="<?php echo base_url();?>images/delete.png" border="0" />
								
								<?php } if($row['active']==2){ ?>
								
								<img src="<?php echo base_url();?>images/delete.png" border="0" />
								
								<?php }
								
								
								} else { echo "Expired"; } ?>
								
								
								
								
								</div>
								</td>

							       
                                    
                                    
                                  </tr>
								  <?php
								  			$i++;
										}
									
								  ?>                                                                   
                                  <tr class="inner-tablebg">
                                    <td colspan="17" valign="top"><table  border="0" align="center">
                                        <tr class="inner-table">
                                          <td width="750" align="center">&nbsp;</td>
                                          <td width="1" align="center"><img src="<?php echo base_url(); ?>images/devider1.png" alt="" width="2" /></td>
                                          <?php echo $page_link; ?>
										  <td width="1" align="center"><img src="<?php echo base_url(); ?>images/devider1.png" alt="" /></td>
                                          <td width="100">&nbsp;</td>
										  <td width="650" align="center" valign="middle">&nbsp;</td>
										  <td align="left" width="100">&nbsp;</td>
                                        </tr>
                                      </table></td>
                                  </tr>
                                  
                                  
                                  <?php } else { ?>
                                  
                                  
                                  <tr class="inner-tablebg">
                                    <td colspan="17" valign="middle" height="30" align="center">No record Found.</td>
                                  </tr>
                                  
                                  <?php } ?>
                                </table>
                                
                                </form>
                                
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