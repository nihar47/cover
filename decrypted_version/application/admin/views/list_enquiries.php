<script type="text/javascript">
function status(id)
{

var url="<?php echo site_url('project_category/change_status'); ?>/"+id;
window.open(url,'Change Status','height=250,width=250,top=350,left=400');
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

			window.location.href='<?php echo site_url('enquiries/list_enquiries/');?>'+'/'+limit;

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

			

			window.location.href='<?php echo site_url('enquiries/search_list_enquiries');?>'+'/'+limit+'/'+'<?php echo $option.'/'.$keyword; ?>';

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
			window.location.href= '<?php echo site_url('enquiries');?>';
			
		}
	}
</script>



<div id="con-tabs">
          <ul>
            <li><span style="cursor:pointer;"><?php echo anchor('enquiries','Enquiries','id="sp_1" style="color:#364852;background:#ececec;"'); ?></span></li>
          </ul>
          <div id="text">
            <div id="1">
            
       
            <?php $CI =& get_instance();	$base_url = $CI->config->slash_item('base_url_site');
											$base_path =base_path();
			 ?>
            
           
              <?php

							if($msg != "")

							{

								if($msg == "delete")

								{?>

                                <div align="center" class="msgdisp">Record has been deleted Successfully.</div> 

								<?php }}

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
            
            <!-- <td align="left" valign="middle">&nbsp;</td>
            
             <td align="left" valign="middle"><b>Search by : </b></td>
            <td align="left" valign="middle">
            
            
           
			 <?php
					$attributes = array('name'=>'frm_search','id' => 'frm_search');
					echo form_open('enquiries/search_list_enquiries/'.$limit,$attributes);
		 	 ?>

                
             <select name="option" id="option" style="width:100px;" onchange="gomain(this.value)">
               <option value="all">All</option> 
               <option value="name" <?php if($option=='name'){?> selected="selected"<?php }?>>Name</option>               <option value="email"  <?php if($option=='email'){?> selected="selected"<?php }?>>Email</option>             </select>
                
                
                <input type="text" name="keyword" id="keyword" value="<?php echo $keyword;?>" />                
                <input type="submit" name="submit" id="submit" value="GO" />
                
                </form> 
            
            
            </td>
            -->
            
            
            </tr>
            </table>
            </div>
            
            </td>
            
                    
            
            
            <td align="right" valign="top">
            
       
		 <?php
		 	$attributes = array('name'=>'frm_listproject','id'=>'frm_listproject');
			echo form_open('enquiries/action_enquiries/'.$limit, $attributes);
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
        <a href="javascript:void(0)"  onclick="setaction('chk[]','delete', 'Are you sure, you want to delete selected enquiries(s)?', 'frm_listproject')" style="text-decoration:none;color:#000000;font-size:13px; font-weight:bold;" > Delete</a>
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
            
           <div style="clear:both;"></div> </td>    
           
						</tr>
                        
                        
                        
						<tr>
                          <td valign="top"><div class="deals" style="display:block;" id="dig_it6">
                              <div id="last_login4" style="width:100%;overflow-x:auto;overflow-y:hidden;">
                                <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#888591">
                                  <tr class="alter">
                                  <th>&nbsp;</th>
									<th height="30"><strong>Name</strong></th>
									<th ><strong>Last Name</strong></th>
									<th><strong>Email</strong></th>  
                                    <th><strong>Enquiry</strong></th>  
                                     <th><strong>View</strong></th>  
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
											
								
								  ?>
			  <tr onClick="<?php echo $fc; ?>(this);" class="<?php echo $cl; ?>" <?php echo $cls; ?>>
                                  
                         <td align="center" valign="middle"><input type="checkbox" name="chk[]" id="chk" value="<?php echo $row->id;?>" /></td>
						 <td height="28" align="center"><div class="pad-left" style="text-align:center;">
                             <?php echo $row->name;?>
                                    </div></td>
                         <td align="center" >
                         <div class="pad-left" style="text-align:center;"><?php echo $row->lname;?></div>
                         </td>
						
                        <td><div class="pad-left"><?php echo $row->email;?></div></td>
                        <td align="center"><?php echo $row->comment;?></td>
                         <td align="center"><a href="<?php echo site_url('enquiries/view_enquiry/'.$row->id);?>"><img src="<?php echo base_url();?>images/edit.png" border="0" /></a></td>
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
                                  <?php }else{?>
								  <tr>
                                    <td colspan="17" valign="top"><table  border="0" align="center">
                                        <tr >
                                          <td width="750" align="center">&nbsp;</td>
                                         
                                          <?php echo "No Records found"?>
										 
                                          <td width="100">&nbsp;</td>
										  <td width="650" align="center" valign="middle">&nbsp;</td>
										  <td align="left" width="100">&nbsp;</td>
                                        </tr>
                                      </table></td>
                                  </tr>
								  <?php }?>                                                 

                                </table>
                                </form>
                              
                                
                              </div>
                              
                            </div></td>
                        </tr>
                      </table></td>
                 
                  </tr>
                  
                </table>
              </div>
            </div>
          </div>
        </div>