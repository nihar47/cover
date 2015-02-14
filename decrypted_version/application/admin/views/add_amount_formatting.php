<div id="con-tabs">

          <ul>

           

		    <?php  $check_site_rights=$this->home_model->get_rights('add_site_setting');

		 		$check_meta_rights=$this->home_model->get_rights('add_meta_setting');

				$check_fb_rights=$this->home_model->get_rights('add_facebook_setting');

				$check_tw_rights=$this->home_model->get_rights('add_twitter_setting');

				$check_em_rights=$this->home_model->get_rights('add_email_setting');

				$check_filter_rights=$this->home_model->get_rights('add_filter_setting');

				$check_img_rights=$this->home_model->get_rights('add_image_setting');

		
	$check_google_rights=$this->home_model->get_rights('add_google_setting');
				$check_yahoo_rights=$this->home_model->get_rights('add_yahoo_setting');
				$chk_message_setting=$this->home_model->get_rights('add_message_setting');
				
				
			if($check_site_rights==1) {		?>

		   
			<li><span style="cursor:pointer;"><?php echo anchor('site_setting/add_site_setting','Site','id="sp_1"'); ?></span></li>

		    <li><span style="cursor:pointer;"><?php echo anchor('site_setting/add_amount_formatting','Amount','style="color:#364852;background:#ececec;"'); ?></span></li>

			

			 <?php } if($check_meta_rights==1) { ?>

			

			<li><span style="cursor:pointer;"><?php echo anchor('meta_setting/add_meta_setting','Meta','id="sp_2"'); ?></span></li>

			

				<?php } if($check_fb_rights==1) { ?>

			

			<li><span style="cursor:pointer;"><?php echo anchor('facebook_setting/add_facebook_setting','Facebook'); ?></span></li>

			

			<?php } if($check_tw_rights==1) { ?>

			

			<li><span style="cursor:pointer;"><?php echo anchor('twitter_setting/add_twitter_setting','Twitter'); ?></span></li>

			<?php } if($check_google_rights==1) { ?>

			

			<li><span style="cursor:pointer;"><?php echo anchor('google_setting/add_google_setting','Google'); ?></span></li>    
            
            <?php } if($check_yahoo_rights==1) { ?>

			

			<li><span style="cursor:pointer;"><?php echo anchor('yahoo_setting/add_yahoo_setting','Yahoo'); ?></span></li>    

			<?php } if($check_em_rights==1) { ?>

			

			<li><span style="cursor:pointer;"><?php echo anchor('email_setting/add_email_setting','Email'); ?></span></li>  

			

			<?php } if($check_filter_rights==1) { ?>

			

			<li><span style="cursor:pointer;"><?php echo anchor('site_setting/add_filter_setting','Filter'); ?></span></li>  

			

			<?php } if($check_img_rights==1) { ?>

            

               <li><span style="cursor:pointer;"><?php echo anchor('site_setting/add_image_setting','Image Size'); ?></span></li>      

               

              <?php } if($chk_message_setting==1) { ?>
				
                
         <li><span style="cursor:pointer;"><?php echo anchor('message_setting/add_message_setting','Messages'); ?></span> 	</li>
			
             <?php } ?>
             
             

          </ul>

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

									$attributes = array('name'=>'frm_site_setting');

									echo form_open_multipart('site_setting/add_amount_formatting',$attributes);

								  ?>

									<fieldset class="step">

								
                                    <div class="fleft">

									  <label>Currency Code<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('currency_code')" onmouseout="hide_bg('currency_code')">

									

                                      

                                      

                      <select name="currency_code" id="currency_code" >

                                 

                              

                              

                             		<?php

										if($currency)

										{

											foreach($currency as $cur)

											{

									  ?>

										<option value="<?php echo $cur->currency_code; ?>" <?php if($cur->currency_code == $currency_code){ ?> selected="selected" <?php } ?>><?php echo $cur->currency_name.'&nbsp;-&nbsp;'.$cur->currency_code.'&nbsp;-&nbsp;'.$cur->currency_symbol; ?></option>

									  <?php

											}

										}

									  ?>		  

                              

                                

                             

									

									 												  	

					 </select>

                                      

                                      

                                      

                                      

									  </span>

									</div>

									<div style="clear:both;"></div>

									

                                    
									
                                    <div class="fleft">

									  <label>Where to display Currency Symbol?<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('currency_symbol_side')" onmouseout="hide_bg('currency_symbol_side')">

									   <select name="currency_symbol_side" id="currency_symbol_side" >
									   		<option value="left" <?php if($currency_symbol_side=='left'){ echo 'selected="selected"';   }  ?>>$100</option>
                                            
                                            <option value="left_space" <?php if($currency_symbol_side=='left_space'){ echo 'selected="selected"';   }  ?>>$ 100</option>
                                            
                                            <option value="right" <?php if($currency_symbol_side=='right'){ echo 'selected="selected"';   }  ?>>100$</option>                                            
                                            <option value="right_space" <?php if($currency_symbol_side=='right_space'){ echo 'selected="selected"';   }  ?>>100 $</option>
                                            
                                            	<option value="left_code" <?php if($currency_symbol_side=='left_code'){ echo 'selected="selected"';   }  ?>>USD100</option>
                                            
                                            <option value="left_space_code" <?php if($currency_symbol_side=='left_space_code'){ echo 'selected="selected"';   }  ?>>USD 100</option>
                                            
                                            <option value="right_code" <?php if($currency_symbol_side=='right_code'){ echo 'selected="selected"';   }  ?>>100USD</option>                                            
                                            <option value="right_space_code" <?php if($currency_symbol_side=='right_space_code'){ echo 'selected="selected"';   }  ?>>100 USD</option>
                                            
                                       </select>
                                      </span>
                                    </div>
                                	
                                    <div style="clear:both;"></div>

                                    

                                    <div class="fleft">

									  <label>Decimal Points After Amount<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('decimal_points')" onmouseout="hide_bg('decimal_points')">

									 <select name="decimal_points" id="decimal_points" >
									   		<option value="0" <?php if($decimal_points=='0'){ echo 'selected="selected"';   }  ?>> 0 </option>
                                            <option value="1" <?php if($decimal_points=='1'){ echo 'selected="selected"';   }  ?>> 1 </option>
                                            <option value="2" <?php if($decimal_points=='2'){ echo 'selected="selected"';   }  ?>> 2 </option>
                                       </select>

									  </span>

									</div>

									<div style="clear:both;"></div>

								

									

									<div style="clear:both;"></div>

								

									

									

								
                                

                                    

                                    <div style="clear:both;"></div>

									<div class="fleft">

									  <label>&nbsp;<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('site_setting_id')" onmouseout="hide_bg('site_setting_id')">

									  <input type="hidden" name="site_setting_id" id="site_setting_id" value="<?php echo $site_setting_id; ?>" />													  

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