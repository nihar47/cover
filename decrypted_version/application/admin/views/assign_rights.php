<script type="text/javascript" language="javascript">
function setchecked(elemName,status){
	elem = document.getElementsByName(elemName);
	for(i=0;i<elem.length;i++){
		elem[i].checked=status;
	}
}
</script>


<div id="con-tabs">
      
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
									$attributes = array('name'=>'frm_assignrights');
									echo form_open('rights/add_rights/'.$admin_id,$attributes);
								  ?>
									<fieldset class="step">
								<div style="clear:both;"></div>
								
								
								<table align="center" cellpadding="4" cellspacing="4" border="0" >		
									
									<tr>
							<td align="left" valign="top" colspan="2">   
                            
                            
                            <div style="float:left;"> 
                  <a href="javascript:void(0)" onclick="javascript:setchecked('rights_id[]',1)" style="color:#000;"><?php echo "Check All"; ?></a>&nbsp; |&nbsp; 
           <a href="javascript:void(0)" onclick="javascript:setchecked('rights_id[]',0)" style="color:#000;"><?php echo "Clear All"; ?></a>
                     
            </div>
           <div style="clear:both; height:25px;"></div> </td>    
           
						</tr>
							
										
							<?php												
							
							if($rights)
							{
								foreach($rights as $rig)
								{
																							
							?>
										
										
																						
									<tr>
											  
									  <td align="left" valign="top"  style=" text-align:left;padding:0px; margin:0px;"><input type="checkbox" name="rights_id[]" value="<?php echo $rig->rights_id; ?>" style="width:40px;" <?php if($assign_rights) { if(in_array($rig->rights_id,$assign_rights)) { ?> checked="checked" <?php } } ?> /></td>
									  
									  <td align="left" valign="top"  style="padding:0px; width:200px; margin:0px; text-transform:capitalize; text-align:left;"><?php echo str_replace('_',' ',$rig->rights_name); ?></td>
									  
									  </tr>
									  
									
									
									
								<?php } 
								
								} ?>	
									
									</table>
									
									<div style="clear:both;"></div>
								
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>&nbsp;<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('admin_id')" onmouseout="hide_bg('admin_id')">
									  <input type="hidden" name="admin_id" id="admin_id" value="<?php echo $admin_id; ?>" />													 									 <input type="hidden" name="offset" id="offset" value="<?php echo $offset; ?>" />
									  </span>
									</div>
									<div style="clear:both;"></div>
									<div class="fleft">
									  <label>&nbsp;<span>&nbsp;</span></label>
									  <div class="submit">
										<input type="submit" name="submit" value="Update" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer; " onclick=""/>
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