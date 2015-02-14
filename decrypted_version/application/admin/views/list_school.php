<script type="text/javascript" language="javascript">

	function delete_rec(id,offset)

	{

		var ans = confirm("Are you sure to delete school topic?");

		if(ans)

		{

			location.href = "<?php echo site_url('school/delete_school/'); ?>"+"/"+id+"/"+offset;

		}else{

			return false;

		}

	}

	

	

	

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

			window.location.href='<?php echo site_url('school/list_school/');?>'+'/'+limit;
			
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

			window.location.href='<?php echo site_url('school/search_list_school');?>'+'/'+limit+'/'+'<?php echo $option.'/'.$keyword; ?>';


		}

	

	}

	

	function gomain(x)

	{

		

		if(x == 'all')

		{

			window.location.href= '<?php echo site_url('school/list_school');?>';
		}

	}



</script>

<div id="con-tabs">

          <ul>

            <li><span style="cursor:pointer;"><?php echo anchor('school/list_school','School','id="sp_1" style="color:#364852;background:#ececec;"'); ?></span></li>

          </ul>

          <div id="text">

            <div id="1">

			 <?php if($msg!='') { 

            

			if($msg=='delete') { ?><div align="center" class="msgdisp">Record(s) has been deleted Successfully.</div> 

            

            <?php } if($msg=='insert') { ?><div align="center" class="msgdisp">New Record has been added Successfully.</div> 

            

            <?php } if($msg=='update') { ?><div align="center" class="msgdisp">Record(s) has been updated Successfully.</div> 

            

            <?php }  if($msg=='active') { ?> <div align="center" class="msgdisp">Record(s) has been activated Successfully.</div> 

            

            <?php }  if($msg=='inactive') { ?> <div align="center" class="msgdisp">Record(s) has been inactivated Successfully.</div> 

            

            <?php }  } ?>

			

			

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
						echo form_open('school/search_list_school/'.$limit,$attributes);
					  ?>

                

                <select name="option" id="option" style="width:100px;" onchange="gomain(this.value)">

                <option value="all">All</option> 

               		<option value="title" <?php if($option=='title'){?> selected="selected"<?php }?>>Title</option>  

                   <!-- <option value="active" <?php if($option=='active'){?> selected="selected"<?php }?>>Active</option>  

                    <option value="inacetive" <?php if($option=='inacetive'){?> selected="selected"<?php }?>>Inactive</option>-->                           

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
							
					echo form_open_multipart('school/action_school',$attributes);
						?>    

         
            

           

           

           <input type="hidden" name="offset" id="offset" value="<?php echo $offset; ?>" />

           <input type="hidden" name="action" id="action" />

           

          

          

          

            <div style="float:right;"> 

            <table>

            <tr>

            

            

            <td align="right" valign="top">

             <img src="<?php echo base_url();?>images/add.png" border="0" />&nbsp;&nbsp;

            </td>

            <td align="right" valign="middle">

        <?php echo anchor('school/add_school','Add','style="text-decoration:none;color:#000000;font-size:16px; font-weight:bold;"');?>

        </td>

        

        <td width="1"></td>

        

        

          <td align="right">

             <img src="<?php echo base_url();?>images/deletes.png" border="0" />&nbsp;&nbsp;

            </td>

            <td align="right" valign="middle">

        <a href="javascript:void(0)"  onclick="setaction('chk[]','delete', 'Are you sure, you want to delete selected School(s)?', 'frm_listproject')" style="text-decoration:none;color:#000000;font-size:16px; font-weight:bold;" > Delete</a>

        </td>

        

         <td width="1"></td>

        

          <td align="right" valign="top">

             <img src="<?php echo base_url();?>images/tick.png" border="0" />&nbsp;&nbsp;

            </td>

            <td align="right" valign="middle">

        <a href="javascript:void(0)"  onclick="setaction('chk[]','active', 'Are you sure, you want to active selected School(s)?', 'frm_listproject')" style="text-decoration:none;color:#000000;font-size:16px; font-weight:bold;" >Active</a>

        </td>

        

        

         <td width="1"></td>

        

          <td align="right" valign="top">

             <img src="<?php echo base_url();?>images/delete.png" border="0" />&nbsp;&nbsp;

            </td>

            <td align="right" valign="middle">

        <a href="javascript:void(0)"  onclick="setaction('chk[]','inactive', 'Are you sure, you want to inactive selected School(s)?', 'frm_listproject')" style="text-decoration:none;color:#000000;font-size:16px; font-weight:bold;" >Inactive</a>

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

                                <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#888591">

                                  <tr class="alter">

								  <th>&nbsp;</th>

                                    <th height="30"><strong>Title</strong></th>

									<th><strong>Description</strong></th>

									<th width="90"><strong>Active</strong></th>    

									<th width="90"><strong>Action</strong></th>                             

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

								  

								   <td align="center" valign="middle"><input type="checkbox" name="chk[]" id="chk" value="<?php echo $row->school_id;?>" /></td>

                                    <td height="28"><div class="pad-left"><?php echo $row->title; ?></div></td>

									<td><div class="pad-left"><?php echo substr($row->description,0,30); ?></div></td>

                                    <td><div class="pad-left"><?php if($row->active=="1"){ echo "Active"; }else{ echo "Inactive"; } ?></div></td>

									<td><div class="pad-left"><?php echo anchor('school/edit_school/'.$row->school_id.'/'.$offset,'Edit'); ?></div></td>

                                  </tr>

								  <?php

								  			$i++;

										}

									}

								  ?>                                                                   

                                  <tr class="inner-tablebg">

                                    <td colspan="8" valign="top"><table  border="0" align="left">

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