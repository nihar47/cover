<style type="text/css">
.pi{
      background:url(<?php echo base_url(); ?>images/add.png) no-repeat;
	  padding-left:26px;
	  padding-top:7px;
	  font-weight:bold;
	  font-size:13px;
	  color:#7DBF0F;
	  cursor:pointer;
	  text-decoration:none;
}
</style>
<div id="con-tabs">
          <ul>
              <li><span style="cursor:pointer;"><?php echo anchor('project_category/gallery/'.$project_id,'Gallery','id="sp_2" style="color:#364852;background:#ececec;"'); ?></span></li>          
          </ul>
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


<?php $CI =& get_instance(); $site = $CI->config->slash_item('base_url_site');  ?>


<script src="<?php echo upload_url(); ?>js/mootools-core-1.3-full.js" type="text/javascript"></script> 
<script src="<?php echo upload_url(); ?>js/mootools-more-1.3-full.js" type="text/javascript"></script> 
<script src="<?php echo upload_url(); ?>js/mootools-art-0.87.js" type="text/javascript"></script>
<script type="text/javascript" language="javascript" src="<?php echo upload_url(); ?>js/clickMe.js" ></script>	
<script type="text/javascript">

function submit_image_valid()
{
	





frmCheckform        = document.frm_addgallery;
        // assigh the name of the checkbox;
        var chks = document.getElementsByName('file_up[]');
 
        var hasChecked = false;
        // Get the checkbox array length and iterate it to see if any of them is selected
        for (var i = 0; i < chks.length; i++)
        {
                if (chks[i].value=='')
                {
                        check=false;
						var dv = document.getElementById('err1');
						dv.className = "error";
						dv.style.clear = "both";
						dv.style.minWidth = "110px";
						dv.style.margin = "5px";
						dv.innerHTML = 'Image is required';
						dv.style.display='block';
						
					  	hasChecked = true;
                        
						return false;
                }
				else 
				{
						
						value = chks[i].value;
						t1 = value.substring(value.lastIndexOf('.') + 1,value.length);
						if( t1=='jpg' || t1=='jpeg' || t1=='gif' || t1=='png' || t1=='JPEG' || t1=='JPG'  ||  t1=='PNG' || t1=='GIF' )
						{
							document.getElementById('err1').style.display='none';
							check=true;
						}
						else
						{						
							
							
							check=false;
							i=0;
							var dv = document.getElementById('err1');
		
							dv.className = "error";
							dv.style.clear = "both";
							dv.style.minWidth = "110px";
							dv.style.margin = "5px";
							dv.innerHTML = '  Image type is not valid';
							dv.style.display='block';
							hasChecked = true;
							
							return false;
							
                    	   
					
					
						}
				
				
						
				}
				
        }
		
		
		
		
}
  
function append_div2()
{
	
	
	var tmp_div2 = document.createElement("div");
	tmp_div2.className = "fleft";
	tmp_div2.innerHTML = document.getElementById('more2').innerHTML;
	document.getElementById('add_more2').appendChild(tmp_div2);
	
	var myVerticalSlide2 = new Fx.Slide('add_more2');
	myVerticalSlide2.slideIn();
}


</script>
    				
                     <?php		
					 
					 $attributes = array('name'=>'frm_addgallery','id'=>'frm_addgallery','onsubmit'=>'return submit_image_valid()');
					echo form_open_multipart('project_category/add_gallery/'.$project_id,$attributes); 
					
					?>
										<fieldset class="step">
													
                                                    
                                                   <div align="center" id="err1" style="color:#FF0000;"></div> 									
										
										<div style="clear:both;"></div>
										
                                        
                                        
                                        <div id="add_more2"> 
										
                                        <div id="more2" class="fleft" >
										  <label>Gallery Image<span>&nbsp;</span></label>
										  <span onmouseover="show_bg('photo')" onmouseout="hide_bg('photo')">                                          
										  <input   name="file_up[]" type="file" class="" id="file_up" />										  
										  </span>
										</div>                              
										<div style="clear:both;"></div>									
                                        
                                        </div>
                                        <div style="clear:both;"></div>		
                                        
                                        
              <div class="fleft" style="margin-left:131px;">
        <!--      <img src="<?php echo base_url(); ?>images/add.png" height="16" width="16" border="0" title="Add More" onclick="append_div2();" style="cursor:pointer;" />-->
              <a href="javascript:void(0)" onclick="append_div2();"  class="pi" style="" title="Add More">Add More</a>
              </div>
                                        
                                       									
										
										<div style="clear:both;"></div>
									
										<div class="fleft">
										  <label>&nbsp;<span>&nbsp;</span></label>
										 
										  <div class="submit">
											<input type="submit" name="submit" value="Submit" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer; " onClick="submit_image_valid()"/>
										  </div>
										  
										  
										  
										  <div class="submit">
											<input type="button" name="cancel" value="Cancel" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer;" onClick="location.href='<?php echo site_url('project_category/gallery/'.$project_id); ?>'"/>
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