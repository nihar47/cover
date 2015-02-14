<div data-role="header">
  <h1>PERKS</h1>
  <?php echo anchor('home','Home','class="ui-btn-left"'); ?> 
   <?php echo anchor('user/my_project/',CHANGE_PROJECT,'class="ui-btn-right"'); ?>
 </div>
 <div class="pad15">
  <h2> <span id="s1postJ"> <?php echo PERKS; ?></span></h2>
  <br/>
  
  <div class="inner_content" style=" margin-top:11px;padding:12px; ">
		         
			
			
			<div style="float:left;"><h3 id="dropmenu2"><?php if($page == "form"){ ?><?php echo ADD_PERK; ?><?php } ?></h3></div>
				
				<div style="float:right;"><h3 class="add_text_buton"  style="cursor:pointer;">
				
				<?php  if($page == "list"){  echo anchor('project/add_perk/'.$project_id ,ADD_PERK); } else { echo "&nbsp;"; } ?></h3></div>
             <div style="clear:both;"></div>
		 <?php 
		 	
				if($page == "list")
				{	
					$i = 0;
					
					if($all_perks)
					{
			?>
					<div id="recent-donate-detail" style="text-align:left;">
					  <table border="0" cellpadding="1" cellspacing="1" width="100%">
				
				<tr>				
				<td class="donate_header" align="left" valign="top" ><?php echo PERK_TITLE; ?></td>				
				<td class="donate_header" align="left" valign="top" ><?php echo PERK_AMMOUNT; ?></td>
				<td class="donate_header" align="left" valign="top" ><?php echo TOTAL_CLAIM; ?></td>
                <td class="donate_header" align="left" valign="top" ><?php echo GET;?></td>
				<td class="donate_header" align="center" valign="top" ><?php echo ACTION; ?></td>
				
				</tr>
						
						<?php
							
								foreach($all_perks as $perk)
								{
									if($i%2 == '0')
									{
										$str = "class='light1'";
									}else{
										$str = "class='light'";
									}
									
									
									
						?>
						<tr <?php echo $str; ?>>
						  <td class="donate_td" align="left" valign="top"><?php echo ucfirst($perk['perk_title']); ?>&nbsp;</td>
							 <td class="donate_td" align="center" valign="top"><?php echo set_currency($perk['perk_amount']); ?>&nbsp;</td>
							  <td class="donate_td" align="center" valign="top"><?php echo $perk['perk_total']; ?>&nbsp;</td>
                               <td class="donate_td" align="center" valign="top"><?php if($perk['perk_get']=='') { echo "0"; } else {echo $perk['perk_get']; } ?>&nbsp;</td>
							  <td class="donate_td" align="center" valign="top">
							  
							  <?php echo anchor('project/edit_perk/'.$perk['perk_id'],EDIT);?>&nbsp;|&nbsp;
							  <?php echo anchor('project/delete_perk/'.$perk['perk_id'],DELETE);?> 
							    
							</td>
						</tr>
						<?php
									$i++;
								}
							
						?>					
					</table>
					</div>
				
				<?php  } else {  
				
				
					$attributes = array('name'=>'frm_perk');
					echo form_open_multipart('project/add_perk/'.$project_id,$attributes); ?>
					
					<?php if($error!='') { ?>	<div align="center" class="error"><?php	echo $error; ?></div> <br/><br/><?php } ?>
											
					<div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
					<label class="ui-input-text" for="perk_title"><?php echo PERK_TITLE; ?> : </label>
					<input type="text" name="perk_title" id="perk_title" value="<?php echo $perk_title; ?>" class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset" />
				  </div>
				  
				  
						<div class="form-element-container">
							<div class="form-label">
								<label class="all_text"><?php echo PERK_DESCRIPTION; ?>:</label>
							</div>
							<textarea  name="perk_description" id="perk_description"  class="btn_textarea"><?php echo $perk_description; ?></textarea>
						</div>
						
						<div class="form-element-container">
							<div class="form-label">
								<label class="all_text"><?php echo PERK_AMMOUNT; ?>:</label>
							</div>
							<input type="text" name="perk_amount" id="perk_amount"  value="<?php echo $perk_amount; ?>" class="btn_input1" />
						</div>
						<div class="form-element-container">
							<div class="form-label">
								<label class="all_text"><?php echo TOTAL_CLAIM; ?>:</label>
							</div>
							<input type="text" name="perk_total" id="perk_total" value="<?php echo $perk_total; ?>"  class="btn_input1" />
						</div>
						<div class="clear"></div>
						<div class="form-element-container">
							<div class="form-label">
								<label class="all_text">&nbsp;</label>
							</div>
							<input type="hidden" name="perk_id" id="perk_id" value="<?php echo $perk_id; ?>" />
 							<input type="submit" name="submit" value="<?php echo SUBMIT; ?>" class="submit" />
						</div>
						<div class="clear"></div>
					
				
			<?php
				  }  ?>
				
			
				
				
		<?php	} if($page == "form"){
		
					$attributes = array('name'=>'frm_perk');
					echo form_open_multipart('project/add_perk/'.$project_id,$attributes); ?>
					
				<?php if($error!='') { ?>	<div align="center" class="error"><?php	echo $error; ?></div> <br/><br/><?php } ?>
					
						
							<div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
					<label class="ui-input-text" for="perk_title"><?php echo PERK_TITLE; ?> : </label>
					<input type="text" name="perk_title" id="perk_title" value="<?php echo $perk_title; ?>" class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset" />
				  </div>
				  
					    <div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
					<label class="ui-input-text" for="perk_description"><?php echo PERK_DESCRIPTION; ?> : </label>
					<textarea  name="perk_description" id="perk_description"  class="btn_textarea"><?php echo $perk_description; ?></textarea>
				  </div>
					  
						<div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
					<label class="ui-input-text" for="perk_amount"><?php echo PERK_AMMOUNT; ?> : </label>
					<input type="text" name="perk_amount" id="perk_amount" value="<?php echo $perk_amount; ?>" class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset" />
				  </div>
					
						<div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
					<label class="ui-input-text" for="perk_total"><?php echo TOTAL_CLAIM; ?> : </label>
					<input type="text" name="perk_total" id="perk_total" value="<?php echo $perk_total; ?>" class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset" />
				  </div>
						
					<div class="clear"></div>
					
				<div class="form-element-container">
							<div class="form-label">
								<label class="all_text">&nbsp;</label>
							</div>
								<input type="hidden" name="perk_id" id="perk_id" value="<?php echo $perk_id; ?>" />
							<input type="submit" name="submit" value="<?php echo SUBMIT; ?>" class="submit" />
						</div>
						
					<div class="clear"></div>
				</form>
			<?php
				 }  ?>
			</div>
  </div>