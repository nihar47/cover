<script type="text/javascript" language="javascript">

	

	 $(document).ready(function() {

            setInterval("location.reload(true)", 300000);

        }); 

	function gomain(x)

	{

		

		if(x == 'all')

		{

			window.location.href= '<?php echo site_url('cronjob/list_cronjob');?>';


		}

	}

	

	function getlimit(limit)

	{

		//alert();

		if(limit=='0')

		{

		return false;

		}

		else

		{

			window.location.href='<?php echo site_url('cronjob/list_cronjob/');?>'+'/'+limit;
			

		}

	

	}

	

</script>

<div id="con-tabs">

          <ul>

            <li><span style="cursor:pointer;"><?php echo anchor('cronjob/list_cronjob','Cron Jobs','id="sp_1" style="color:#364852;background:#ececec;"'); ?></span></li>

          </ul>

          <div id="text">

            <div id="1">

             <?php if($msg!='') { 

            

			if($msg=='delete') { ?><div align="center" class="msgdisp">Record has been deleted Successfully.</div> 

            

            <?php } if($msg=='insert') { ?><div align="center" class="msgdisp">New Record has been added Successfully.</div> 

            

            <?php } if($msg=='update') { ?><div align="center" class="msgdisp">Record has been updated Successfully.</div> 

            

            <?php }} ?>

			

            

            <div style="clear:both; height:25px;">

            

         <table border="0" cellpadding="0" cellspacing="0" width="50%"  height="25" >

			

			<tr> 

             <td align="left" valign="middle"><b>Per Page : </b></td>

            <td align="left" valign="top">

            

           <select name="limit" id="limit" onchange="getlimit(this.value)" style="width:80px;">

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

            <div style="float:left;">

              <td align="left" valign="top">

            

           	 <div style="float:left;">

          
			 <?php
				$attributes = array('name'=>'frm_search','id' => 'frm_search');
				echo form_open('cronjob/run/'.$limit,$attributes);
			  ?>
							

                <select name="option" id="option" style=" width:215px; margin-right:10px; padding:2px;">

                      <option value="">Select Cron Job</option>

					  <?php

                      	foreach($crons as $cr){

							?>

								<option value="<?php echo $cr->cron_function; ?>"><?php echo $cr->cron_title; ?></option>

							<?php

						}

					  ?>

                </select>

                

                <input type="submit" name="submit" id="submit" value="Run" />

                

                </form> 

            </div>

            

            </td>

            </div>

            

            </td>

            

                    

            

            

            <td align="right" valign="top">

          

            <div style="float:right;"> 

            <table>

            <tr>

            

            

            <td align="right" valign="top">

              

            

            </td>

            <td align="right" valign="middle">

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

                                <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#888591">

                                  <tr class="alter">

                                    <th height="30"><strong>Cron Job</strong></th>

									<th><strong>User Name</strong></th> 

									<th><strong>Last Run Time</strong></th>    

									<th><strong>Status</strong></th>                          

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

                                    <td height="28"><div class="pad-left"><?php echo $row->cron_title; ?></div></td>

                                    <td><div class="pad-left"><?php if($row->user_id > 0) { echo $row->username; } else{ echo 'SERVER'; }  ?></div></td>

                                    <td><div class="pad-left"><?php echo date('d M,Y H:i:s',strtotime($row->date_run)); ?></div></td>

                                     <td><div class="pad-left"><?php if($row->status=='1'){  echo 'Records updated by this cronjob';	}else{ echo 'No Records updated by this cronjob';	 } ?></div></td>

                                  </tr>

								  <?php

								  			$i++;

										}

									}

								  ?>                                                                   

                                  <tr class="inner-tablebg">

                                    <td colspan="16" valign="top"><table  border="0" align="left">

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