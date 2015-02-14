<script type="text/javascript" language="javascript">
	function delete_rec(id,offset)
	{
		var ans = confirm("Are you sure to delete comment?");
		if(ans)
		{
			location.href = "<?php echo site_url('/project_category/delete_comment'); ?>/"+id+"/"+offset;
		}else{
			return false;
		}
	}
</script>
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
                        <?php
							if($msg != "")
							{
								if($msg == "delete")
								{
									$msg = "Comment deleted successfully";
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
                                <table border="0" width="100%" cellpadding="0" cellspacing="1" bgcolor="#888591">
                                  <tr class="alter">
                                    <th height="30"><strong>No.</strong></th>
									<th><strong>Project</strong></th>
									<th><strong>User</strong></th>
                                    <th><strong>Email</strong></th>
                                    <th><strong>Comment</strong></th>                                    
                                    <th><strong>Date</strong></th>
									<th><strong>Status</strong></th>
									<th><strong>Action</strong></th>                                 
                                  </tr>
                                  <?php
								  	if($result)
									{
										$i=$offset;
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
                                    <td ><div class="pad-left"><?php echo $row->comments; ?></div></td>                                
                                    <td width="80"><div class="pad-left"><?php echo date('d-m-Y',strtotime($row->date_added)); ?></div></td>
									
									<td><?php if($row->status=='0') { echo "Inactive"; } if($row->status=='1') { echo "Active"; } ?></td>
									<td><div class="pad-left"><?php echo anchor('project_category/edit_comment/'.$row->comment_id.'/'.$offset,'Edit'); ?> / <a href="#" onclick="delete_rec('<?php echo $row->comment_id; ?>','<?php echo $offset; ?>')">Delete</a></div></td>
                                  </tr>
								  <?php
								  			$i++;
										}
									}
								  ?>                                                                   
                                  <tr class="inner-tablebg">
                                    <td colspan="15" valign="top"><table border="0" align="left">
                                        <tr class="inner-table">
                                          <td width="50" align="center">&nbsp;</td>
                                          <td width="1" align="center"><img src="<?php echo base_url(); ?>images/devider1.png" alt="" width="2" /></td>
                                          <?php echo $page_link; ?>
										  <td width="1" align="center"><img src="<?php echo base_url(); ?>images/devider1.png" alt="" /></td>
                                          <td width="100">&nbsp;</td>
										  <td width="650" align="center" valign="middle">&nbsp;</td>
										  <td align="left" width="100">&nbsp;</td>
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