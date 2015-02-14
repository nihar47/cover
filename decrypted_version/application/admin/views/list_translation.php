<script type="text/javascript" language="javascript">
	function delete_rec(id,offset)
	{
		var ans = confirm("Are you sure to delete translation?");
		if(ans)
		{
			location.href = "<?php echo site_url('/translation/delete_translation'); ?>/"+id+"/"+offset;
		}else{
			return false;
		}
	}
</script>
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
                    <td valign="top"><table width="100%" border="0" bgcolor="#FFFFFF">
                        <?php
							if($msg != "")
							{
								if($msg == "insert")
								{
									$msg = "New translation inserted successfully";
								}
								if($msg == "update")
								{
									$msg = "Translation updated successfully";
								}
								if($msg == "delete")
								{
									$msg = "Translation deleted successfully";
								}
						?>
						<tr>
							<td style="color:#FF0000;"><?php echo $msg; ?></td>
						</tr>
						<?php	
							}
						?>
						<tr>
                          <td valign="top"><div class="deals" style="display:block;" id="dig_it6">
                              <div id="last_login4" style="width:100%;overflow-x:auto;overflow-y:hidden;">
                                <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#888591">
                                  <tr class="alter">
                                    <th height="30"><strong>Language</strong></th>
									<th><strong>Action</strong></th>                             
                                  </tr>
                                  <?php
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
								  <tr onClick="<?php echo $fc; ?>(this);" class="<?php echo $cl; ?>">
                                    <td height="28"><div class="pad-left"><?php echo $row->language; ?></div></td>
									<td><div class="pad-left"><?php echo anchor('translation/edit_translation/'.$row->translation_id.'/'.$offset.'/0','Edit'); ?> / <a href="#" onClick="delete_rec('<?php echo $row->translation_id; ?>','<?php echo $offset; ?>')">Delete</a></div></td>
                                  </tr>
								  <?php
								  			$i++;
										}
									}
								  ?>                                                                   
                                  <tr class="inner-tablebg">
                                    <td colspan="16" valign="top" ><table  border="0" align="left" >
                                        <tr class="inner-table">
                                          <td width="50" align="center">&nbsp;</td>
                                          <td width="1" align="center"><img src="<?php echo base_url(); ?>images/devider1.png" alt="" width="2" /></td>
                                          <?php echo $page_link; ?>
										  <td width="1" align="center"><img src="<?php echo base_url(); ?>images/devider1.png" alt="" /></td>
                                          <td width="100">&nbsp;</td>
										  <td width="600" align="center" valign="middle">&nbsp;</td>
										  <td align="left" width="150"><?php echo anchor('translation/add_translation','Add Translation', 'style="text-decoration:none;"'); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo anchor('translation/add_text','Add Text', 'style="text-decoration:none;"'); ?></td>
                                        </tr>
                                      </table></td>
                                  </tr>
                                </table>
                              </div>
                              <div id="chart4" style="display:none;">
                                <table cellpadding="0" cellspacing="0" border="0">
                                  <tr>
                                    <td align="center"><img src="<?php echo base_url(); ?>images/chart.jpg" alt="" /></td>
                                  </tr>
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