<script type="text/javascript" language="javascript">
	function delete_rec(id,offset)
	{
		var ans = confirm("Are you sure to delete Project Category?");
		if(ans)
		{
			//alert("<?php echo base_url(); ?>project_status/delete_project_status/"+id);
			location.href = "<?php echo site_url('/project_status/delete_project_status'); ?>/"+id+"/"+offset;
		}else{
			return false;
		}
	}
</script>
<div id="con-tabs">
          <ul>
            <li><span style="cursor:pointer;"><?php echo anchor('project_status/list_project_status','Project Status','id="sp_1" style="color:#364852;background:#ececec;"'); ?></span></li>
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
									$msg = "New Project Status inserted successfully";
								}
								if($msg == "update")
								{
									$msg = "Project Status updated successfully";
								}
								if($msg == "delete")
								{
									$msg = "Project Status deleted successfully";
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
                              <div id="last_login4" style="width:100%;overflow:auto;">
                                <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#888591">
                                  <tr class="alter">
                                    <th height="30"><strong>Project Status Name</strong></th>
									<th><strong>Projects</strong></th>
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
                                    <td height="28"><div class="pad-left"><?php echo $row->project_status_name; ?></div></td>
									<td><div class="pad-left"><?php //echo $row->title; ?></div></td>
									<td><div class="pad-left"><?php echo anchor('project_status/edit_project_status/'.$row->project_status_id.'/'.$offset,'Edit'); ?> <!--/ <a href="#" onClick="delete_rec('<?php //echo $row->project_status_id; ?>','<?php //echo $offset; ?>')">Delete</a>--></div></td>
                                  </tr>
								  <?php
								  			$i++;
										}
									}
								  ?>                                                                   
                                  <tr class="inner-tablebg">
                                    <td colspan="4" valign="top" style="position:relative;height:32px;"><table  border="0" align="left" style="position:absolute;">
                                        <tr class="inner-table">
                                          <td width="50" align="center">&nbsp;<!--<img src="images/search-icon.png" alt="" width="16" height="16" />--></td>
                                          <!--<td width="1" align="center"><img src="<?php echo base_url(); ?>images/devider1.png" alt="" width="2" /></td>-->
                                          <?php //echo $page_link; ?>
										  <!--<td width="1" align="center"><img src="<?php echo base_url(); ?>images/devider1.png" alt="" /></td>-->
                                          <td width="100">&nbsp;<!--<select class="search-dropdown">
                                              <option selected="selected">50</option>
                                              <option>100</option>
                                            </select>--></td>
										  <td width="650" align="center" valign="middle">&nbsp;</td>
										  <td align="left" width="100"><?php //echo anchor('project_status/add_project_status','Add', 'style="text-decoration:none;"'); ?>&nbsp;</td>
										  <!--<td>&nbsp;</td>-->
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