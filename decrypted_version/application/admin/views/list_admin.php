<script type="text/javascript" language="javascript">

	function delete_rec(id,offset)

	{

		var ans = confirm("Are you sure to delete Administrator?");

		if(ans)

		{

			location.href = "<?php echo site_url('admin/delete_admin/'); ?>"+"/"+id+"/"+offset;

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
		
			window.location.href='<?php echo site_url('admin/list_admin/');?>'+'/'+limit;


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

			
			window.location.href='<?php echo site_url('admin/search_list_admin');?>'+'/'+limit+'/'+'<?php echo $option.'/'.$keyword; ?>';
	

		}

	

	}

	

	function gomain(x)

	{

		

		if(x == 'all')

		{

			window.location.href= '<?php echo site_url('admin/list_admin');?>';

		}

		if(x == 'superadmin')

		{

			

			window.location.href= '<?php echo site_url('admin/list_admin_superadmin');?>';

		}

		if(x == 'admin')

		{

			

			window.location.href= '<?php echo site_url('admin/list_admin_admin');?>';

		}

		

	}

</script>

<div id="con-tabs">

          <ul>

            <li><span style="cursor:pointer;"><?php echo anchor('admin/list_admin','Administrator','id="sp_1" style="color:#364852;background:#ececec;"'); ?></span></li>

			 <li><span style="cursor:pointer;"><?php echo anchor('admin/admin_login','Login'); ?></span></li>

          </ul>

          <div id="text">

            <div id="1">

            

            <?php		if($msg != "")

							{

								if($msg == "insert")

								{?>

                                <div align="center" class="msgdisp">New Record has been added Successfully.</div> 

								<?php }

								if($msg == "update")

								{?>

									<div align="center" class="msgdisp">Record has been updated Successfully.</div> 

								<?php }

								if($msg == "delete")

								{?>

									<div align="center" class="msgdisp">Record has been deleted Successfully.</div> 

								<?php }

								if($msg == "rights")

								{?>

                                <div align="center" class="msgdisp">Rights has been updated Successfully.</div> 

                               <?php }}?>

           

           

           

           <div style="clear:both; height:25px;">

            

         <table border="0" cellpadding="0" cellspacing="0" width="100%"  height="25" >

			

			<tr> 

            

            <div style="float:left;">

              <td align="left" valign="top">

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
			   echo form_open('admin/search_list_admin/'.$limit,$attributes);
			  ?>

          
                <select name="option" id="option" style="width:100px;" onchange="gomain(this.value)">

                <option value="all">All</option> 

                	<option value="username" <?php if($option=='username'){?> selected="selected"<?php }?>>User Name</option>  

               		<option value="superadmin" <?php if($option=='superadmin'){?> selected="selected"<?php }?>>Super Admin</option>

                    <option value="admin" <?php if($option=='admin'){?> selected="selected"<?php }?>>Admin</option>

                    <option value="email" <?php if($option=='email'){?> selected="selected"<?php }?>>E-mail</option>                   

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

          <input type="hidden" name="offset" id="offset" value="<?php echo $offset; ?>" />

           <input type="hidden" name="action" id="action" />

          

            <div style="float:right;"> 

            <table>

            <tr>

            

            

            <td align="right" valign="top">

             <img src="<?php echo base_url();?>images/add.png" border="0" />&nbsp;&nbsp;

            </td>

            <td align="right" valign="middle">

        <?php echo anchor('admin/add_admin','Add', 'style="text-decoration:none;color:#000000;font-size:13px; font-weight:bold;"'); ?>			

        </td>

         

        

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

                                <table width="100%" cellpadding="0" cellspacing="1" bgcolor="#888591">

                                  <tr class="alter">

                                    <th width="7%" height="30"><strong>Username </strong></th>

									<th width="7%"><strong>Password</strong></th>

									<th width="7%"><strong>Admin Type</strong></th>

									<th width="10%"><strong>Email</strong></th>                                  

                                    <th width="7%"><strong>Signup IP Address</strong></th>                                    

                                   

                                    <th width="3%"><strong>Active</strong></th>

                                    <th width="7%"><strong>Registerd On</strong></th> 

									

								<?php $assign_rights=$this->home_model->get_rights('assign_rights');

									if(	$assign_rights==1) { ?>

									<th width="7%"><strong>Rigths</strong></th>

									<?php } ?>

									  

									<th width="7%"><strong>Action</strong></th>                                 

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

                                    <td height="28"><div class="pad-left"><?php echo $row->username; ?></div></td>

                                   <td align="center" valign="middle"><?php echo $row->password; ?></td>

                                   

                                    <td align="center" valign="middle"><?php if($row->admin_type==1) { echo "Super Admin"; } elseif($row->admin_type==2){ echo "Administrator"; } ?></div></td>

									

									 <td><div class="pad-left"><?php echo $row->email; ?></div></td>

									 

                                    <td align="center" valign="middle"><?php echo $row->login_ip; ?></td>                                

                               

                                  <td align="center" valign="middle"><?php if($row->active=="1"){ echo "Active"; }else{ echo "Inactive"; } ?></td>

                                    <td align="center" valign="middle"><?php echo date('d-m-Y',strtotime($row->date_added)); ?></td>

									

									<?php $assign_rights=$this->home_model->get_rights('assign_rights');

									if(	$assign_rights==1) { ?>

									<td align="center" valign="middle"><?php echo anchor('rights/assign_rights/'.$row->admin_id.'/'.$offset,'<img src="'.base_url().'images/admin_rights.jpg" border="0" />'); ?></td>

									<?php } ?>

									

									<td><div class="pad-left"><?php echo anchor('admin/edit_admin/'.$row->admin_id.'/'.$offset,'Edit'); ?>						/ <a href="#" onclick="delete_rec('<?php echo $row->admin_id; ?>','<?php echo $offset; ?>')">Delete</a></div></td>

                                  </tr>

								  <?php

								  			$i++;

										}

									}

								  ?>                                                                   

                                  <tr class="inner-tablebg">

                                    <td colspan="15" valign="top"><table border="0" align="left" >

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