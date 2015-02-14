<link href="<?php echo base_url(); ?>FundrisingCss.css" rel="stylesheet" type="text/css" />



						 	
                    
						<?php
							
								$attributes = array('name'=>'frm_login','id'=>'frm_login');
							
							echo form_open('user/check_login',$attributes);
						?>
                        
                        
                        
		
						
				<div class="inner_content" style="clear:both; width:400px; height:auto; bottom:0px; margin-top:5px;">
                
                 <div id="msg" style=" clear:both; padding:0px; margin:0px; font-size:14px; text-align:center;width:250px;">
						<?php
							if($error != ""){ echo LOGIN_FAILED; 
							}
						?>
						</div>
                        
                        <div id="msg" style=" clear:both; padding:0px; margin:0px; text-align:center;width:250px;">
						<?php
							if($msg != ""){ 
							
							
							if($msg=='success')
							{
								echo "<script>parent.location.reload(true);
								parent.$.fancybox.close();
											
											</script>";
							}
							
							
							
							
							}
							
						?>
						</div>
					
                        
                        
                	<table border="0" cellpadding="0" cellspacing="0" width="100%">
                    
                    <tr><td align="left" valign="top" colspan="2">
              
                <h3 class="stitle" style="padding:0px;font-size:16px; font-weight:bold; margin:0px;"><?php echo LOGIN_TEXT; ?> !!</h3>
                 	</td></tr>
                    
										
					
                        
                        <tr><td align="left" valign="top" colspan="2" height="10">&nbsp;</td></tr>
				
					
					<tr><td align="left" valign="top"> 
							<label class="normal_label"><?php echo EMAIL; ?> :</label>
							</td>
                            
                            <td align="left" valign="top">
							<input type="text" name="email" id="email" class="btn_input" style="padding:0px;" />
							</td></tr>
                       
                       
                       <tr><td align="left" valign="top" colspan="2" height="10">&nbsp;</td></tr>
                            
                            
                            
						 <tr><td align="left" valign="top">
							<label  class="normal_label"><?php echo PASSWORD; ?> :</label>
							</td>
                           <td align="left" valign="top">
							<input type="password" name="password" id="password" class="btn_input" style="padding:0px;"/>
							</td></tr>
                            
						
                        <tr><td align="left" valign="top" colspan="2" height="10">&nbsp;</td></tr>   
						  
						   
						  <tr>
                          <td align="left" valign="top">&nbsp;</td>
                          
                          <td align="left" valign="top">
					<input type="checkbox" name="remember" id="remember" value="1"  style="width:12px;  height:12px;  "/>
					<span style="font-size:11px;"><?php echo KEEP_ME_LOGIN; ?> !!</span>
					</td>					
					</tr>
					
                    <tr>
                    <td align="left" valign="top">&nbsp;</td>
                   <td align="left" valign="top">
					
					<input type="submit" class="submit" name="login" id="login" value="<?php echo LOGIN; ?> !!"  />
					</td></tr>
                    
                    </table>
					
					
						 

						</form>
					
				     
				</div>
				<div style="clear:both;"></div>
			  
			  
			 
  
  

