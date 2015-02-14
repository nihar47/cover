
<div id="con-tabs">
          <ul>
            <li><span style="cursor:pointer;"><?php echo anchor('project_category/list_comment','Comments','id="sp_1" style="color:#364852;background:#ececec;"'); ?></span></li>
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
					<tr>
                          <td class="inr-header"><div class="fleft"><?php echo anchor('home/dashboard','<strong>Go To Project</strong>');?><?php echo anchor('home/dashboard','<img src="'.base_url().'/images/blue-1.png" border="0" />');?></div>
                            </td>
                        </tr>
					
                        <?php
							if($msg != "")
							{
								if($msg == "delete")
								{
									$msg = "Comment deleted successfully";
								}
						?>
						<tr>
							<td><?php echo $msg; ?></td>
						</tr>
						<?php	
							}
						?>
						<tr>
                          <td valign="top"><div class="deals" style="display:block;" id="dig_it6">
                              <div id="last_login4">
                                <table width="100%" cellpadding="0" cellspacing="1" bgcolor="#888591">
                                  <tr class="alter">
                                    <th width="3%" height="30"><strong>No.</strong></th>
									<th width="10%"><strong>Project</strong></th>
									<th width="10%"><strong>User</strong></th>
                                    <th width="10%"><strong>Email</strong></th>
                                    <th width="20%"><strong>Comment</strong></th>                                    
                                    <th width="7%"><strong>Date</strong></th>
									                               
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
								  <tr onclick="<?php echo $fc; ?>(this);" class="<?php echo $cl; ?>">
                                    <td height="28"><div class="pad-left"><?php echo $i+1; ?></div></td>
                                    <td><div class="pad-left"><?php echo $row->project_title; ?></div></td>
                                    <td><div class="pad-left"><?php echo $row->username; ?></div></td>
                                    <td><div class="pad-left"><?php echo $row->email; ?></div></td>
                                    <td><div class="pad-left"><?php echo $row->comments; ?></div></td>                                
                                    <td><div class="pad-left"><?php echo $row->date_added; ?></div></td>
									
                                  </tr>
								  <?php
								  			$i++;
										}
									}
								  ?>                                                                   
                                  <tr class="inner-tablebg">
                                    <td colspan="15" valign="top"><table width="100%" border="0" align="left">
                                        <tr class="inner-table">
                                          <td width="4%" align="center">&nbsp;</td>
                                          <td width="1%" align="center"><img src="<?php echo base_url(); ?>images/devider1.png" alt="" width="2" /></td>
                                          <?php echo $page_link; ?>
										  <td width="1%" align="center"><img src="<?php echo base_url(); ?>images/devider1.png" alt="" /></td>
                                          <td width="5%">&nbsp;</td>
										  <td align="center" valign="middle">&nbsp;</td>
										  <td align="left" width="10%">&nbsp;</td>
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