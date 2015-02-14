<script type="text/javascript" language="javascript">



	

	function setchecked(elemName,status){

	elem = document.getElementsByName(elemName);

	for(i=0;i<elem.length;i++){

		elem[i].checked=status;

	}

}



function setaction(elename, actionval, actionmsg, formname) {

	vchkcnt=0;

	elem = document.getElementsByName(elename);

	

	for(i=0;i<elem.length;i++){

		if(elem[i].checked) vchkcnt++;	

	}

	if(vchkcnt==0) {

		alert('Please select a record')

	} else {

		

		if(confirm(actionmsg))

		{

			document.getElementById('action').value=actionval;	

			document.getElementById(formname).submit();

		}		

		

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

			window.location.href='<?php echo site_url('spam/spam_report/');?>'+'/'+limit;
			
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

			window.location.href='<?php echo site_url('spam/search_list_spam_report');?>'+'/'+limit+'/'+'<?php echo $option.'/'.$keyword; ?>';


		}

	

	}

	

	function gomain(x)

	{

		

		if(x == 'all')

		{

			window.location.href= '<?php echo site_url('spam/spam_report');?>';
			

		}

	}





</script>

<div id="con-tabs">

          <ul>

            <?php  $check_spam_setting=$this->home_model->get_rights('add_site_setting');

		 		$check_spam_report=$this->home_model->get_rights('spam_report');

				$check_spam=$this->home_model->get_rights('spamer');

				

		

			if($check_spam_setting==1) {		?>

		   

		    <li><span style="cursor:pointer;"><?php echo anchor('spam/add_spam_setting','Spam Setting'); ?></span></li>

			

			 <?php } if($check_spam_report==1) { ?>

			

			<li><span style="cursor:pointer;"><?php echo anchor('spam/spam_report','Spam Report','id="sp_1" style="color:#364852;background:#ececec;"'); ?></span></li>

			

				<?php } if($check_spam==1) { ?>

			

			<li><span style="cursor:pointer;"><?php echo anchor('spam/spamer','Spamer'); ?></span></li>

			

			<?php }  ?>

          </ul>

          <div id="text">

            <div id="1">

			

			

			

			

            <?php $CI =& get_instance();	$base_url = $CI->config->slash_item('base_url_site');

											$base_path = base_path();

			 ?>

            

            

            <?php if($msg!='') { 

            

			if($msg=='delete') { ?><div align="center" style="color:#093; font-weight:bold;">Spam Report has been deleted successfully.</div> 

            

            <?php }  if($msg=='make_spam') { ?> <div align="center" style="color:#093; font-weight:bold;">Report make Spam has been successfully.</div> 

            

            <?php }  } ?>

            

            

            

			<div style="clear:both; height:25px;">

            

         <table border="0" cellpadding="0" cellspacing="0" width="100%"  height="25" >

			

			<tr> 

            

            <td align="left" valign="top"><?php echo anchor('spam/spam_report','<img src="'.base_url().'images/refresh.png" border="0" />'); ?>  

            </td>

            <td>

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
					echo form_open('spam/search_list_spam_report/'.$limit,$attributes);
				  ?>

                

                <select name="option" id="option" style="width:100px;" onchange="gomain(this.value)">

                <option value="all">All</option> 

                	<option value="ip" <?php if($option=='ip'){?> selected="selected"<?php }?>>Spam IP</option>  

                </select>

                

                

                <input type="text" name="keyword" id="keyword" value="<?php echo $keyword;?>" />                

                <input type="submit" name="submit" id="submit" value="GO" />

                

                </form> 

            </td>

           </tr>

            </table>

            </div>

            

            <td align="right" valign="top">

         

          

          

            <div style="float:right;"> 
  <?php
					$attributes = array('name'=>'frm_spam','id'=>'frm_spam');
							
					echo form_open_multipart('spam/spam_report_action/'.$limit,$attributes);
						?>    

      <!--<form name="frm_spam" id="frm_spam" action="<?php // echo  site_url('spam/spam_report_action/'.$limit);?>" method="post">-->

            

           

           

           <input type="hidden" name="offset" id="offset" value="<?php echo $offset; ?>" />

           <input type="hidden" name="action" id="action" />

            <table>

            

            <tr>

            



            

            

        <td width="1"></td>

        

        

          <td align="right" valign="middle">

             <img src="<?php echo base_url();?>images/deletes.png" border="0" />&nbsp;&nbsp;

            </td>

            <td align="right" valign="middle">

        <a href="javascript:void(0)"  onclick="setaction('chk[]','delete', 'Are you sure, you want to delete selected spam report(s)?', 'frm_spam')" style="text-decoration:none;color:#000000;font-size:14px; font-weight:bold;" > Delete</a>

        </td>

        

         <td width="1"></td>

        

          <td align="right" valign="middle">

             <img src="<?php echo base_url();?>images/spam_icon.png" border="0" />&nbsp;&nbsp;

            </td>

            <td align="right" valign="middle">

        <a href="javascript:void(0)"  onclick="setaction('chk[]','make_spam', 'Are you sure, you want to make spamer selected report(s)?', 'frm_spam')" style="text-decoration:none;color:#000000;font-size:14px; font-weight:bold;" >Make Spamer</a>

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

							<td align="left" valign="top">   

                            

                            

                            <div style="float:left;"> 

                  <a href="javascript:void(0)" onclick="javascript:setchecked('chk[]',1)" style="color:#000;"><?php echo "Check All"; ?></a>&nbsp; |&nbsp; 

           <a href="javascript:void(0)" onclick="javascript:setchecked('chk[]',0)" style="color:#000;"><?php echo "Clear All"; ?></a>

                     

            </div>

           <div style="clear:both;"></div> </td>    

           

						</tr>

						

						

						<tr>

                          <td valign="top"><div class="deals" style="display:block;" id="dig_it6">

                              <div id="last_login4" style="width:100%;overflow-x:auto;overflow-y:hidden;">

                                <table width="100%" cellpadding="0" cellspacing="1" bgcolor="#888591">

                                  <tr class="alter">

								   <th width="1%">&nbsp;</th>

                                    <th width="7%" height="30"><strong>Spam IP </strong></th>	

									 <th width="7%" height="30"><strong>Total Report</strong></th>									

									<th width="10%"><strong>Spam By</strong></th>

									<th width="7%"><strong>Report By</strong></th>

									                             

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

								   <td align="center" valign="middle"><input type="checkbox" name="chk[]" id="chk" value="<?php echo $row->spam_ip;?>" /></td>

								   

								   

                                    <td height="28"><?php echo $row->spam_ip; ?></td>

									 <td height="28"><?php echo $row->total_spam; ?></td>

									

                                    <td><div class="pad-left" style="float:none; text-align:center;"><?php $spam_by=$this->user_model->get_one_user($row->spam_user_id); ?>

									

								<a href="<?php echo front_base_url().'member/'.$row->spam_user_id; ?>" target="_blank"><?php echo $spam_by['user_name'].' '.$spam_by['last_name']; ?></a>

									

									 </div></td>

                                    <td><div class="pad-left"  style="float:none; text-align:center;">

									

									<?php if($row->reported_user_id!='' && $row->reported_user_id!='0' && $row->reported_user_id!=0) { $report_by=$this->user_model->get_one_user($row->reported_user_id); ?>

									

								<a href="<?php echo front_base_url().'member/'.$row->reported_user_id; ?>" target="_blank"><?php echo $report_by['user_name'].' '.$report_by['last_name']; ?></a>

									<?php } else { echo "N/A"; } ?>

									</div></td>

                               

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

										  <td align="left" width="100">&nbsp;</td>

                                        </tr>

                                      </table></td>

                                  </tr>

                                </table>

							</form>

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