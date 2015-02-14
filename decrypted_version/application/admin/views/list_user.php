<script type="text/javascript" language="javascript">

	function delete_rec(id,offset)

	{

		var ans = confirm("Are you sure to delete user?");

		if(ans)

		{

			location.href = "<?php echo site_url('user/delete_user/'); ?>"+"/"+id+"/"+offset;

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

			window.location.href='<?php echo site_url('user/list_user/');?>'+'/'+limit;

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

			

			window.location.href='<?php echo site_url('user/search_list_user');?>'+'/'+limit+'/'+'<?php echo $option.'/'.$keyword; ?>';

		}

	

	}

	

	function gomain(x)

	{

		

		if(x == 'all')

		{

			window.location.href= '<?php echo site_url('user/list_user');?>';

		}

	}

</script>



<div id="con-tabs">

          <ul>

            <li><span style="cursor:pointer;"><?php echo anchor('user/list_user','Users','id="sp_1" style="color:#364852;background:#ececec;"'); ?></span></li>

          </ul>

          <div id="text">

            <div id="1">

            <?php

							if($msg != "")

							{

								if($msg == "insert")

								{?> <div align="center" class="msgdisp">New Record has been added Successfully.</div> 

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
			   echo form_open('user/search_list_user/'.$limit,$attributes);
			  ?>
			
                <select name="option" id="option" style="width:100px;" onchange="gomain(this.value)">

                <option value="all">All</option> 

               		<option value="username" <?php if($option=='username'){?> selected="selected"<?php }?>>Username</option>                    

                    <option value="email"  <?php if($option=='email'){?> selected="selected"<?php }?>>E-mail</option>    

                     <option value="city"  <?php if($option=='city'){?> selected="selected"<?php }?>>City</option> 

                     <option value="state"  <?php if($option=='state'){?> selected="selected"<?php }?>>State</option> 

                     <option value="country"  <?php if($option=='country'){?> selected="selected"<?php }?>>Country</option> 

                    <!--  <option value="active"  <?php if($option=='active'){?> selected="selected"<?php }?>>Active</option> 

                       <option value="inactive"  <?php if($option=='inactive'){?> selected="selected"<?php }?>>Inactive</option>-->                   

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
            

         <!--<form name="frm_listproject" id="frm_listproject" action="<?php // echo site_url('project_category/action_project/'.$limit);?>" method="post">-->

            

           

           

           <input type="hidden" name="offset" id="offset" value="<?php echo $offset; ?>" />

           <input type="hidden" name="action" id="action" />

           

          

          

          

            <div style="float:right;"> 

            <table cellpadding="0" cellspacing="0" border="0">

            <tr>

            

            

            <td align="right" valign="top">

             <img src="<?php echo base_url();?>images/add.png" border="0" />&nbsp;&nbsp;

            </td>

            <td align="right" valign="middle">

       	 <?php echo anchor('user/add_user','Add', 'style="text-decoration:none;color:#000000;font-size:13px; font-weight:bold;"'); ?>

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

                                <table width="100%" cellpadding="0" cellspacing="1" bgcolor="#888591">

                                  <tr class="alter">

                                    <th width="7%" height="30"><strong>Username </strong></th>

									<!--<th width="7%"><strong>Password</strong></th>-->

									<th width="10%"><strong>Email</strong></th>

                                    <!--<th width="10%"><strong>Paypal Email ID</strong></th>-->

                                    <th width="7%"><strong>Signup IP Address</strong></th>                                    

                                    <th width="7%"><strong>Address</strong></th>

                                    <th width="7%"><strong>City</strong></th>

									<th width="7%"><strong>State</strong></th>

                                    <th width="7%"><strong>Country</strong></th>

									<!--<th width="7%"><strong>Zip Code</strong></th>-->

                                    <th width="3%"><strong>Active</strong></th>

                                    <th width="7%"><strong>Registerd On</strong></th>   

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

                                    <td height="28"><div class="pad-left"><?php echo $row->user_name; ?></div></td>

                                  <!--  <td><div class="pad-left"><?php //echo $row->password; ?></div></td>-->

                                    <td><div class="pad-left"><?php echo $row->email; ?></div></td>

                                    <!--<td><div class="pad-left"><?php// echo $row->paypal_email; ?></div></td>-->

                                    <td><div class="pad-left"><?php echo $row->signup_ip; ?></div></td>                                

                                    <td><div class="pad-left"><?php echo $row->address; ?></div></td>

                                    <td><div class="pad-left"><?php echo get_city_name($row->city); ?></div></td>

                                    <td><div class="pad-left"><?php echo get_state_name($row->state); ?></div></td>

                                    <td><div class="pad-left"><?php echo get_country_name($row->country); ?></div></td>

									<!--<td><div class="pad-left"><?php // echo $row->zip_code; ?></div></td>-->

                                    <td><div class="pad-left"><?php if($row->active=="1"){ echo "Active"; }else{ echo "Inactive"; } ?></div></td>

                                    <td><div class="pad-left"><?php echo date('d-m-Y',strtotime($row->date_added)); ?></div></td>

									<td><div class="pad-left"><?php echo anchor('user/edit_user/'.$row->user_id.'/'.$offset,'Edit'); ?> 

									

									<?php $chk=$this->user_model->chk_user_project($row->user_id);

									

									if($chk=='1' || $chk==1) { } else { ?>

									

									/ <a href="#" onclick="delete_rec('<?php echo $row->user_id; ?>','<?php echo $offset; ?>')">Delete</a>

									

									<?php } ?>

									

									

									</div></td>

                                  </tr>

								  <?php

								  			$i++;

										}

									}

								 else {?>
                               <tr style="background:none repeat scroll 0 0 #E4E5E5;"><td colspan="11" height="28">No Record Found.</td></tr>
                                  
                                  <?php }?>                                                                       

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