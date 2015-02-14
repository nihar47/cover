<div id="con-tabs">
          <ul>
            <li><span style="cursor:pointer;"><?php echo anchor('project_category/gallery/'.$project_id,'Gallery','id="sp_2" style="color:#364852;background:#ececec;"'); ?></span></li>
          </ul>
          <div id="text">
            <div id="1">
            
            <?php if($msg!='') { 
			if($msg == "insert") {?> <div align="center" class="msgdisp">New Record has been added Successfully.</div>
            
			<?php }
			if($msg == "update") {?> <div align="center" class="msgdisp">Record has been updated Successfully.</div>
            
			<?php }
			if($msg == "delete") {?> <div align="center" class="msgdisp">Record has been deleted Successfully.</div>
            
			<?php }
			} ?>  
            
            <div style="clear:both; height:25px;">      
            
         <table border="0" cellpadding="0" cellspacing="0" align="right" height="25" >
			
			<tr> <td align="right" valign="top"> <img src="<?php echo base_url();?>images/add.png" border="0" />&nbsp;&nbsp;</td>
            
         <td align="right" valign="middle"><?php echo anchor('project_category/add_project_gallery/'.$project_id,'Add Gallery','style="text-decoration:none;color:#000000;font-size:16px; font-weight:bold;"');?></td>
            
            </tr>
				</table>
						
			</div>
            
            <?php 
					$CI =& get_instance();
					$base_url = $CI->config->slash_item('base_url_site');
					$base_image = upload_url();
					
					$base_path = base_path();
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
                    <td valign="top"><table width="100%" border="0" bgcolor="#FFFFFF">
                        <tr>
                          <td valign="top"><div class="deals" style="display:block;" id="dig_it6">
						      <div id="last_login4" style="width:100%;overflow-x:auto;overflow-y:hidden;">
                                <table width="100%" cellpadding="0" cellspacing="1" bgcolor="#888591">
                                  <tr class="alter">
                                    <th height="30"><strong>Image </strong></th>
                                     <th><strong>Action</strong></th>                                   
                                  </tr>
								  <?php
								  	if($project_gallery)
									{
										$i=0;
										foreach($project_gallery as $prg)
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
								  <tr onclick="<?php echo $fc; ?>(this);" class="<?php echo $cl; ?>">
                                   <td align="center" width="250" height="160" valign="middle" >
                                   
                                   <?php if(is_file($base_path.'upload/thumb/'.$prg->project_image)) { ?>
                                 <img src="<?php echo $base_image; ?>upload/thumb/<?php echo $prg->project_image;?>" border="0" width="150" height="150" />
                                   
                                   <?php } else { ?>
                                   
                                      <img src="<?php echo $base_image; ?>upload/orig/no_img.jpg" border="0" width="150" height="150" />
                                   
                                   <?php } ?>
                                   
                                   
                                   
                                   </td>
                                 
                                   
                                   <td align="center" valign="middle">                           
                                  
							  <?php echo anchor('project_category/delete_project_gallery/'.$prg->project_gallery_id,'Delete','style="color:#000000;"');?> 
                                   
                                   </td> 
                                    
                                    
                                    
                                  </tr>
								  <?php
								  			$i++;
										}
									} else { 
								  ?> 
                                  
                                  <tr class="alter"><td align="center" colspan="2"><b>No Gallery</b></td></tr>
                                  
                                  
                                  <?php } ?>
                                  
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