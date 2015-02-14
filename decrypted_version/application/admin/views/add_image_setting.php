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

			  <li><span style="cursor:pointer;"><?php echo anchor('site_setting/add_amount_formatting','Amount'); ?></span></li>


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

			

			<?php }  if($check_filter_rights==1) { ?>

			

			<li><span style="cursor:pointer;"><?php echo anchor('site_setting/add_filter_setting','Filter'); ?></span></li>  

			

			<?php }   if($check_img_rights==1) { ?>

            

               <li><span style="cursor:pointer;"><?php echo anchor('site_setting/add_image_setting','Image Size','style="color:#364852;background:#ececec;"'); ?></span></li>      

               

              <?php } if($chk_message_setting==1) { ?>
				
                
         <li><span style="cursor:pointer;"><?php echo anchor('message_setting/add_message_setting','Messages'); ?></span> 	</li>
			
             <?php } ?>

               

                          

          </ul>

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

									echo form_open_multipart('site_setting/add_image_setting',$attributes);

								  ?>

									<fieldset class="step">

									<div class="fleft">

									  <label>Project Thumbnail Width<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('p_width')" onmouseout="hide_bg('p_width')">

									  <input type="text" name="p_width" id="p_width" value="<?php echo $p_width; ?>" onfocus="show_bg('p_width')" onblur="hide_bg('p_width')"/>

									  </span>

									</div>

									<div style="clear:both;"></div>

									

									<div class="fleft">

									  <label>Project Thumbnail Height<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('p_height')" onmouseout="hide_bg('p_height')">

									  <input type="text" name="p_height" id="p_height" value="<?php echo $p_height; ?>" onfocus="show_bg('p_height')" onblur="hide_bg('p_height')"/>

									  </span>

									</div>

									<div style="clear:both;"></div>

									

									<div class="fleft">

									  <label>Project Thumbnail Aspect Ratio<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('p_ratio')" onmouseout="hide_bg('p_ratio')">

									  <select name="p_ratio" id="p_ratio">

									  	<option value="1" <?php 	if($p_ratio=='1'){	echo 'selected="selected"';	} ?> >TRUE</option>

									  	<option value="0" <?php 	if($p_ratio=='0'){	echo 'selected="selected"';	} ?> >FALSE</option>

									  </select>

									  </span>

									</div>

									<div style="clear:both;"></div>

									

									

									<div class="fleft">

									  <label>User Thumbnail Width<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('u_width')" onmouseout="hide_bg('u_width')">

									  <input type="text" name="u_width" id="u_width" value="<?php echo $u_width; ?>" onfocus="show_bg('u_width')" onblur="hide_bg('u_width')"/>

									  </span>

									</div>

									<div style="clear:both;"></div>

									

									<div class="fleft">

									  <label>User Thumbnail Height<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('u_height')" onmouseout="hide_bg('u_height')">

									  <input type="text" name="u_height" id="u_height" value="<?php echo $u_height; ?>" onfocus="show_bg('u_height')" onblur="hide_bg('u_height')"/>

									  </span>

									</div>

									<div style="clear:both;"></div>

									

									<div class="fleft">

									  <label>User Thumbnail Aspect Ratio<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('u_ratio')" onmouseout="hide_bg('u_ratio')">

									   <select name="u_ratio" id="u_ratio">

									  	<option value="1" <?php 	if($u_ratio=='1'){	echo 'selected="selected"';	} ?> >TRUE</option>

									  	<option value="0" <?php 	if($u_ratio=='0'){	echo 'selected="selected"';	} ?> >FALSE</option>

									  </select>

									  </span>

									</div>

									<div style="clear:both;"></div>

									

									<div class="fleft">

									  <label>Project Gallery Thumbnail Width<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('g_width')" onmouseout="hide_bg('g_width')">

									  <input type="text" name="g_width" id="g_width" value="<?php echo $g_width; ?>" onfocus="show_bg('g_width')" onblur="hide_bg('g_width')"/>

									  </span>

									</div>

									<div style="clear:both;"></div>

									

									<div class="fleft">

									  <label>Project Gallery Thumbnail Height<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('g_height')" onmouseout="hide_bg('g_height')">

									  <input type="text" name="g_height" id="g_height" value="<?php echo $g_height; ?>" onfocus="show_bg('g_height')" onblur="hide_bg('g_height')"/>

									  </span>

									</div>

									<div style="clear:both;"></div>

									

									<div class="fleft">

									  <label>Project Gallery Thumbnail Aspect Ratio<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('g_ratio')" onmouseout="hide_bg('g_ratio')">

									   <select name="g_ratio" id="g_ratio">

									  	<option value="1" <?php 	if($g_ratio=='1'){	echo 'selected="selected"';	} ?> >TRUE</option>

									  	<option value="0" <?php 	if($g_ratio=='0'){	echo 'selected="selected"';	} ?> >FALSE</option>

									  </select>

									  </span>

									</div>

									<div style="clear:both;"></div>

									

									

									

									

								

									<div style="clear:both;"></div>

									<div class="fleft">

									  <label>&nbsp;<span>&nbsp;</span></label>

									  <span onmouseover="show_bg('image_setting_id')" onmouseout="hide_bg('image_setting_id')">

									  <input type="hidden" name="image_setting_id" id="image_setting_id" value="<?php echo $image_setting_id; ?>" />													  

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

