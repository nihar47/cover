<script type="text/javascript" language="javascript">

	function delete_rec(id,offset)

	{

		var ans = confirm("Are you sure to delete Project Category?");

		if(ans)

		{

			location.href = "<?php echo site_url('project_category/delete_project_category/'); ?>"+"/"+id+"/"+offset;

		}else{

			return false;

		}

	}

	function getlimit(limit)

	{

		if(limit=='0')

		{

		return false;

		}

		else

		{

				window.location.href='<?php echo site_url('project_category/list_project_category/');?>'+'/'+limit;
				

		}

	

	}	

	

	function getsearchlimit(limit)

	{

		if(limit=='0')

		{

		return false;

		}

		else

		{

			
		window.location.href='<?php echo site_url('project_category/search_list_project_category');?>'+'/'+limit+'/'+'<?php echo $option.'/'.$keyword; ?>';
			

		}

	

	}

	

	function gomain(x)

	{

		

		if(x == 'all')

		{

			window.location.href= '<?php echo site_url('project_category/list_project_category');?>';

		}

	}

</script>

<div id="con-tabs">

   

            

          <ul>

            <li><span style="cursor:pointer;"><?php echo anchor('project_category/list_project_category','Project Categories','id="sp_1" style="color:#364852;background:#ececec;"'); ?></span></li>

          </ul>

          <div id="text">

            <div id="1">

             <?php

							if($msg != "")

							{

								if($msg == "insert")

								{?>

                                <div align="center" class="msgdisp">New Record(s) has been added Successfully.</div> 

								<?php }

								if($msg == "update")

								{?>

                                <div align="center" class="msgdisp">Record has been updated Successfully.</div> 

								<?php }

								if($msg == "delete")

								{?>

                                <div align="center" class="msgdisp">Record has been deleted Successfully.</div> 

								<?php }}

						?>

                        

                        

            <div style="clear:both; height:25px;">

            

         		<table border="0" cellpadding="0" cellspacing="0" width="100%"  height="25" >

			

			<tr> 

            

            <td align="left" valign="top">

            

            <div style="float:left;">

            <table>

            <tr>

            <td align="left" valign="middle"><b>Per Page : </b></td>

            <td align="left" valign="top">

            

            <?php if($search_type=='normal') { ?>

            <select name="limit" id="limit" onchange="getlimit(this.value)" style="width:80px;">

            <?php } if($search_type=='search') { ?>

              <select name="limit" id="limit" onchange="getsearchlimit(this.value)" style="width:80px;">

            <?php } ?>

            <option value="0">Per Page</option>

            <option value="5">5</option>

            <option value="10">10</option>

            <option value="15">15</option>

            <option value="25">25</option>

            <option value="50">50</option>

            <option value="75">75</option>

            <option value="100">100</option>

            

            

            </select>

            </td>

            

             <td align="left" valign="middle">&nbsp;</td>

            

             <td align="left" valign="middle"><b>Search by : </b></td>

            <td align="left" valign="middle">

            

                <?php
			 	$attributes = array('name'=>'frm_search','id' => 'frm_search');
			   echo form_open('project_category/search_list_project_category/'.$limit,$attributes);
			  ?>

                <select name="option" id="option" style="width:100px;" onchange="gomain(this.value)">

                <option value="all">All</option> 

               		<option value="projectcatname" <?php if($option=='projectcatname'){?> selected="selected"<?php }?>>Category Name</option>                                    

                </select>

                

                

                <input type="text" name="keyword" id="keyword" value="<?php echo $keyword;?>" />                

                <input type="submit" name="submit" id="submit" value="GO" />

                

                </form> 

            

            

            </td>

            

            

            

            </tr>

            </table>

            </div>

            

            </td>

            

                    

            

            

            <td align="right" valign="top">

          <?php
					$attributes = array('name'=>'frm_listproject','id'=>'frm_listproject');
							
					echo form_open_multipart('project_category/action_project/'.$limit,$attributes);
						?>   

           

           <input type="hidden" name="offset" id="offset" value="<?php echo $offset; ?>" />

           <input type="hidden" name="action" id="action" />

           

          

          

          

            <div style="float:right;"> 

            <table cellpadding="0" cellspacing="0" border="0">

            <tr>

             

            <td align="right" valign="top">

             <img src="<?php echo base_url();?>images/add.png" border="0" />&nbsp;&nbsp;

            </td>

            <td align="right" valign="middle">

        <?php echo anchor('project_category/add_project_category','Add', 'style="text-decoration:none;color:#000000;font-size:13px; font-weight:bold;"'); ?>

        </td>

        

        <td width="5px;"></td>

         </tr></table>

        

        </div>

        

        <div style="clear:both;"></div>

        

        </td>

            

            </tr>

				</table>

						

			</div>            

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

                                <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#888591">

                                  <tr class="alter">

                                    <th height="30"><strong>Project Category Name</strong></th>
                                    
                                      <th><strong>Parent Category Name</strong></th>
									
									<!-- <th><strong>Color Code</strong></th>-->

									<th><strong>Projects</strong></th>

									<th><strong>Active</strong></th>    

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

											$sql_prj = "select count(project_id) as total_prj from project where category_id = '".$row->project_category_id."'";

											$res_prj = mysql_query($sql_prj);

											$row_prj = mysql_fetch_array($res_prj);

											//print_r($row_prj); echo "<br>";

								  ?>

								  <tr onClick="<?php echo $fc; ?>(this);" class="<?php echo $cl; ?>">

                                    <td height="28"><div class="pad-left" style="text-transform:capitalize; text-align:left;"><?php echo $row->project_category_name; ?></div></td>
                                <!--Modification to add parent category column-->
                                   <td><div class="pad-left" style="text-transform:capitalize; text-align:left;">
								   <?php
									
										$sql_pr = "select * from project_category where project_category_id = '".$row->parent_project_category_id."'";
										/*$sql_pr = "SELECT CONCAT(
										(SELECT c2.project_category_name FROM project_category c2 WHERE c2.`project_category_id` = c1.`parent_project_category_id`), ' >> ', c1.`project_category_name` ) AS project_category_name FROM project_category c1 WHERE c1.project_category_id = '".$row->parent_project_category_id."'";*/
										
										$res_pr = mysql_query($sql_pr);
								
										if(mysql_num_rows($res_pr)>0)

										{

											$row_pr = mysql_fetch_array($res_pr);
											if($row_pr['parent_project_category_id']!= 0){
											$sql_pr = "SELECT CONCAT(
										(SELECT c2.project_category_name FROM project_category c2 WHERE c2.`project_category_id` = c1.`parent_project_category_id`), ' >> ', c1.`project_category_name` ) AS project_category_name FROM project_category c1 WHERE c1.project_category_id = '".$row->parent_project_category_id."'";
										$res_pr =mysql_fetch_array( mysql_query($sql_pr));
										echo $res_pr['project_category_name'];
											}else{
												echo $row_pr['project_category_name'];
												
												}
											
										}else{

											echo "-";

										}

									?></div></td>
								
									<!--<td style="width:100px;"><div class="pad-left" ><?php echo $row->category_color_code; ?> <span class="vievcolor" style="background:#<?php echo $row->category_color_code; ?>"></span></div></td>-->

									<td><div class="pad-left"><?php echo $row_prj['total_prj']; ?></div></td>

                                    <td><div class="pad-left" ><?php if($row->active=="1"){ echo "Active"; }else{ echo "Inactive"; } ?></div></td>

									<td><div class="pad-left" ><?php echo anchor('project_category/edit_project_category/'.$row->project_category_id.'/'.$offset,'Edit'); ?> <?php if($row_prj['total_prj']>0) { } else { ?>/ <a href="#" onClick="delete_rec('<?php echo $row->project_category_id; ?>','<?php echo $offset; ?>')">Delete</a><?php } ?></div></td>

                                  </tr>

								  <?php

								  			$i++;

										}

									}

								  ?>                                                                   

                                  <tr class="inner-tablebg">

                                    <td colspan="5" valign="top"><table  border="0" align="left">

                                        <tr class="inner-table">

                                          <td width="50" align="center">&nbsp;</td>

                                          <td width="1" align="center"><img src="<?php echo base_url(); ?>images/devider1.png" alt="" width="2" /></td>

                                          <?php echo $page_link; ?>

										  <td width="1" align="center"><img src="<?php echo base_url(); ?>images/devider1.png" alt="" /></td>

                                          <td width="100">&nbsp;</td>

										  <td width="650" align="center" valign="middle">&nbsp;</td>

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