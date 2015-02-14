<div id="con-tabs">
          <script language="javascript" src="<?php echo base_url(); ?>js/Tooltip.js"></script>
          <div id="text">
            <div id="1">
            
            <?php if($error != "")
					{?>
						<div style="text-align:center;" class="msgdisp"><?php  echo $error; ?></div>
					<?php }
			?>	
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
									$attributes = array('name'=>'frm_blog_setting');
									echo form_open('blog/blog_setting',$attributes);
								  ?>
									<fieldset class="step">
									<div style="clear:both;"></div>
								
									
									
									<?php /*?><div style="clear:both;"></div>
									<div class="fleft">
									  <label>Blog Post per User<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('blog_post_limit')" onmouseout="hide_bg('blog_post_limit')">
									  <input type="text" name="blog_post_limit" id="blog_post_limit" value="<?php echo $blog_post_limit; ?>" onfocus="show_bg('blog_post_limit')" onblur="hide_bg('blog_post_limit')"/>
									  </span>
									</div><?php */?>
									
									
									 <div style="clear:both;height:10px;"></div>
                                    
                                  
                                    
                                     <div class="fleft">
									  <label>Blog Status<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('blog_status')" onmouseout="hide_bg('blog_status')">
									  <select name="blog_status" id="blog_status" >
									 		<option value="0" <?php  if($blog_status=='0'){ echo 'selected="selected"'; }  ?>>Disable</option>	
                                            <option value="1" <?php  if($blog_status=='1'){ echo 'selected="selected"'; }  ?>>Enable</option>								  	
									  </select>
									  </span>
									</div>
									<div style="clear:both;"></div>
								    <div class="fleft">
									  <label>Admin Approve<span>&nbsp;</span></label>
									 <span onmouseover="show_bg('Admin Approve')" onmouseout="hide_bg('Admin Approve')">
									<div style="float:right;">
									<table  cellpadding="2" cellspacing="2" border="0" >
									<tr>
									<td align="left" valign="top" width="20"><input type="checkbox" name="admin_approve" id="admin_approve" value="1"  style="width:20px;"  <?php if($admin_approve==1){?> checked="checked"<?php } ?> /> </td>
									</tr>
									</table>
									</div>
									 </span> 
									</div>
									<div style="clear:both;"></div>
                                    
                                    	<div class="fleft">
									  <label>&nbsp;<span>&nbsp;</span></label>
									  <span onmouseover="show_bg('blog_setting_id')" onmouseout="hide_bg('blog_setting_id')">
									  <input type="hidden" name="blog_setting_id" id="blog_setting_id" value="<?php echo $blog_setting_id; ?>" />													  
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
        
        
       
<script>
var t1=null;

var auto_target_achive_info=" <b>YES :</b> All Preapprove Transaction commit When Project achieve its goal before its expiry date.<br /><br /><b>NO :</b> All Preapprove Transaction commit if project achieve its goal at expire date.";

function init()
{
 t1 = new ToolTip("a",true,40);
}


window.onload=function() { init() } 
</script>