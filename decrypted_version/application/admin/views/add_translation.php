<div id="con-tabs">
          <ul>
            <li><span style="cursor:pointer;"><?php echo anchor('translation/list_translation','Translations','id="sp_1" style="color:#364852;background:#ececec;"'); ?></span></li>            
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
									<?php
										if($task=="translation")
										{
									?>
										  <div align="center">
											<div id="add-deal">
											  <?php
												$attributes = array('name'=>'frm_translation');
												echo form_open('translation/add_translation',$attributes);
											  ?>
												<fieldset class="step">
												<?php
													if($error != "")
													{
														echo "<label style='width:700px;text-align:center;'><span>".$error."</span></label>";
														echo "<div class='vertical-line'></div>";
													}
												?>													
												<div class="fleft">
												  <label>Language<span>&nbsp;</span></label>
												  <span onMouseOver="show_bg('language')" onMouseOut="hide_bg('language')">
												  <input type="text" name="language" id="language" value="<?php echo $language; ?>" onFocus="show_bg('language')" onBlur="hide_bg('language')"/>
												  </span>
												</div>
												<div style="clear:both;"></div>
												<div class="fleft">
												  <label>&nbsp;<span>&nbsp;</span></label>
												  <span onMouseOver="show_bg('translation_id')" onMouseOut="hide_bg('translation_id')">
												  <input type="hidden" name="translation_id" id="translation_id" value="<?php echo $translation_id; ?>" />
												  <input type="hidden" name="offset" id="offset" value="<?php echo $offset; ?>" />
												  </span>
												</div>
												<div style="clear:both;"></div>
												<div class="fleft">
												  <label>&nbsp;<span>&nbsp;</span></label>
												  <?php
													if($translation_id=="")
													{
												  ?>
												  <div class="submit">
													<input type="submit" name="submit" value="Submit" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer; " onClick=""/>
												  </div>
												  <?php
													}else{
												  ?>
												  <div class="submit">
													<input type="submit" name="submit" value="Update" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer; " onClick=""/>
												  </div>
												  <?php
													}
												  ?>
												  <div class="submit">
													<input type="button" name="cancel" value="Cancel" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer;" onClick="location.href='<?php echo site_url('translation/list_translation'); ?>'"/>
												  </div>
												</div>
												</fieldset>
											  </form>
											</div>
										  </div>
									<?php
										}elseif($task=="text")
										{
									?>	  
										  <div align="center">
											<div id="add-deal">
											  <?php
												$attributes = array('name'=>'frm_text');
												echo form_open('translation/add_text',$attributes);
											  ?>
												<fieldset class="step">
												<?php
													if($error != "")
													{
														echo "<label style='width:700px;text-align:center;'><span>".$error."</span></label>";
														echo "<div class='vertical-line'></div>";
													}
												?>													
												<div class="fleft">
												  <label>Key<span>&nbsp;</span></label>
												  <span onMouseOver="show_bg('key')" onMouseOut="hide_bg('key')">
												  <input type="text" name="key" id="key" value="<?php echo $key; ?>" onFocus="show_bg('key')" onBlur="hide_bg('key')"/>
												  </span>
												</div>
												<div style="clear:both;"></div>
												<?php
													foreach($translations as $t)
													{
														$temp = "t_" . $t->translation_id;
												?>
												<div class="fleft">
												  <label><?php echo ucfirst($t->language); ?><span>&nbsp;</span></label>
												  <span onMouseOver="show_bg('<?php echo $temp; ?>')" onMouseOut="hide_bg('<?php echo $temp; ?>')">
												  <input type="text" name="<?php echo $temp; ?>" id="<?php echo $temp; ?>" value="" onFocus="show_bg('<?php echo $temp; ?>')" onBlur="hide_bg('<?php echo $temp; ?>')"/>
												  </span>
												</div>
												<div style="clear:both;"></div>
												<?php
													}
												?>
												<div class="fleft">
												  <label>&nbsp;<span>&nbsp;</span></label>
												  <span onMouseOver="show_bg('key_id')" onMouseOut="hide_bg('key_id')">
												  <input type="hidden" name="key_id" id="key_id" value="<?php echo $key_id; ?>" />
												  <input type="hidden" name="offset" id="offset" value="<?php echo $offset; ?>" />
												  </span>
												</div>
												<div style="clear:both;"></div>
												<div class="fleft">
												  <label>&nbsp;<span>&nbsp;</span></label>
												  <?php
													if($key_id=="")
													{
												  ?>
												  <div class="submit">
													<input type="submit" name="submit" value="Submit" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer; " onClick=""/>
												  </div>
												  <?php
													}else{
												  ?>
												  <div class="submit">
													<input type="submit" name="submit" value="Update" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer; " onClick=""/>
												  </div>
												  <?php
													}
												  ?>
												  <div class="submit">
													<input type="button" name="cancel" value="Cancel" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer;" onClick="location.href='<?php echo site_url('translation/list_translation'); ?>'"/>
												  </div>
												</div>
												</fieldset>
											  </form>
											</div>
										  </div>
									<?php
										}else
										{
									?>
										  <div align="center">
											<div id="add-deal">
											  <?php
												$attributes = array('name'=>'frm_translation');
												echo form_open('translation/edit_text',$attributes);
											  ?>
												<fieldset class="step">
												<?php
													if($error != "")
													{
														echo "<label style='width:700px;text-align:center;'><span>".$error."</span></label>";
														echo "<div class='vertical-line'></div>";
													}
													foreach($all_key as $k)
													{
														$temp_k = "k_" . $k->text_id;
												?>													
												<div class="fleft">
												  <label><?php echo $k->key; ?><span>&nbsp;</span></label>
												  <span onMouseOver="show_bg('<?php echo $temp_k; ?>')" onMouseOut="hide_bg('<?php echo $temp_k; ?>')">
												  <input type="text" name="<?php echo $temp_k; ?>" id="<?php echo $temp_k; ?>" value="<?php echo $k->text; ?>" onFocus="show_bg('<?php echo $temp_k; ?>')" onBlur="hide_bg('<?php echo $temp_k; ?>')"/>
												  </span>
												</div>
												<div style="clear:both;"></div>
												<?php
													}
												?>
												<div class="fleft">
												  <label>&nbsp;<span>&nbsp;</span></label>
												  <span onMouseOver="show_bg('translation_id')" onMouseOut="hide_bg('translation_id')">
												  <input type="hidden" name="translation_id" id="translation_id" value="<?php echo $translation_id; ?>" />
												  <input type="hidden" name="offset" id="offset" value="<?php echo $offset; ?>" />
												  <input type="hidden" name="offset2" id="offset2" value="<?php echo $offset2; ?>" />
												  </span>
												</div>
												<div style="clear:both;"></div>
												<div class="fleft">
												  <label>&nbsp;<span>&nbsp;</span></label>
												  <?php
													if($translation_id=="")
													{
												  ?>
												  <div class="submit">
													<input type="submit" name="submit" value="Submit" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer; " onClick=""/>
												  </div>
												  <?php
													}else{
												  ?>
												  <div class="submit">
													<input type="submit" name="submit" value="Update" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer; " onClick=""/>
												  </div>
												  <?php
													}
												  ?>
												  <div class="submit">
													<input type="button" name="cancel" value="Cancel" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer;" onClick="location.href='<?php echo site_url('translation/list_translation'); ?>'"/>
												  </div>
												</div>
												</fieldset>
											  </form>
											</div><br /><br />
											<div class="deals">
												<table border="0" width="200" cellpadding="0" cellspacing="1" bgcolor="#888591">
													<tr class="inner-tablebg">
														<td valign="bottom"><table width="100%" height="32" border="0" cellpadding="0" cellspacing="0">
																<tr class="inner-table" valign="middle">
																	<?php echo $page_link; ?>
																</tr>
														</table></td>
													</tr>
												</table>
												</div>
										  </div>
										  
									<?php
										}
									?>
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