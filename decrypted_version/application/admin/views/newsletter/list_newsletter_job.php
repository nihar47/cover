<style>
#fancybox-content{
	border-width:5px!important;
    height: 634px!important;
    width: 1037px!important;
}
</style>
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







	function chk_valid()



	{



		



		var keyword = document.getElementById('keyword').value;



		



		if(keyword=='')



		{



			alert('Please enter search keyword');	



			return false;



			



		}



		



		else



		{



			return true;			



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



			window.location.href='<?php echo site_url('newsletter/newsletter_job/');?>'+'/'+limit;

			

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



			

			window.location.href='<?php echo site_url('newsletter/search_newsletter_job');?>'+'/'+limit+'/'+'<?php echo $option.'/'.$keyword; ?>';

			



		}



	



	}



	



	function gomain(x)



	{



		



		if(x == 'all')



		{



			window.location.href= '<?php echo site_url('newsletter/newsletter_job');?>';

			

		}



	}



</script>







<?php 				$CI =& get_instance();	



					$base_url = $CI->config->slash_item('base_url_site');



					$base_path = $CI->config->slash_item('base_path');



	?>







<script type="text/javascript" src="<?php echo upload_url(); ?>js/jquery.min.js"></script>



	



	



	<script type="text/javascript" src="<?php echo upload_url(); ?>fancybox/jquery.fancybox-1.3.4.pack.js"></script>



	<link rel="stylesheet" type="text/css" href="<?php echo upload_url(); ?>fancybox/jquery.fancybox-1.3.4.css" media="screen" />



 



	



<div id="con-tabs">



          <ul>



           <?php  



		



		$chk_newsletter_list=$this->home_model->get_rights('list_newsletter');



		$chk_list_newsletter_user=$this->home_model->get_rights('list_newsletter_user');



		$chk_newsletter_setting=$this->home_model->get_rights('newsletter_setting');



		$chk_newsletter_job=$this->home_model->get_rights('newsletter_job');		



		



				



		



			if($chk_newsletter_list==1) {		?>



		   



		    <li><span style="cursor:pointer;"><?php echo anchor('newsletter/list_newsletter','Newsletters'); ?></span></li>



			



			 <?php } if($chk_list_newsletter_user==1) { ?>



			



			<li><span style="cursor:pointer;"><?php echo anchor('newsletter/list_newsletter_user','Newsletter User'); ?></span></li>



			



				<?php } if($chk_newsletter_job==1) { ?>



			



			<li><span style="cursor:pointer;"><?php echo anchor('newsletter/newsletter_job','Newsletter Job','id="sp_1" style="color:#364852;background:#ececec;"'); ?></span></li>



			



			<?php }  if($chk_newsletter_setting==1) { ?>



			



			<li><span style="cursor:pointer;"><?php echo anchor('newsletter/newsletter_setting','Settings'); ?></span></li>



			



			<?php } ?>



          </ul>



          <div id="text">



            <div id="1">



		



		



           <?php if($msg!='') { 



            



			if($msg=='delete') { ?><div align="center" class="msgdisp">Record(s) has been deleted Successfully.</div> 



            



            <?php } if($msg=='insert') { ?><div align="center" class="msgdisp">New Record has been added Successfully.</div> 



            



            <?php }} ?>



            



            



            



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

					$attributes = array('name'=>'frm_search','id' => 'frm_search','onSubmit'=>'return chk_valid();');

					echo form_open('newsletter/search_newsletter_job/',$attributes);

				  ?>



                



                <select name="option" id="option" style="width:100px;" onchange="gomain(this.value)">



                <option value="all">All</option> 



                    <option value="subject" <?php if($option=='subject'){?> selected="selected"<?php }?>>Subject</option>         



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

	$attributes = array('name'=>'frm_listuser','id'=>'frm_listuser');

			

	echo form_open_multipart('newsletter/action_newsletter_job',$attributes);

	?> 

            



        <!-- <form name="frm_listuser" id="frm_listuser" action="<?php // echo site_url('newsletter/action_newsletter_job');?>" method="post">-->



            



           



           



           <input type="hidden" name="offset" id="offset" value="<?php echo $offset; ?>" />



           <input type="hidden" name="action" id="action" />



           



          



          



          



            <div style="float:right;"> 



            <table>



            <tr>



			



			



          <td align="left" valign="top"><?php echo anchor('newsletter/newsletter_job','<img src="'.base_url().'images/refresh.png" border="0" />'); ?>  



            </td>



			



			<td width="20">&nbsp;</td>



			<td align="right" valign="top">



                 <img src="<?php echo base_url();?>images/add.png" border="0" />&nbsp;&nbsp;



                </td>



                <td align="right" valign="middle">



                <?php echo anchor('newsletter/add_newsletter_job','Add','style="text-decoration:none;color:#000000;font-size:13px; font-weight:bold;"'); ?>



                </td>  



            	  <td width="10"></td> 



          <td align="right">



             <img src="<?php echo base_url();?>images/deletes.png" border="0" />&nbsp;&nbsp;



            </td>



            <td align="right" valign="middle">



        <a href="javascript:void(0)"  onclick="setaction('chk[]','delete', 'Are you sure, you want to delete selected record(s)?', 'frm_listuser')" style="text-decoration:none;color:#000000;font-size:16px; font-weight:bold;" > Delete</a>



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



								  <th width="2%">&nbsp;</th>



                                    <th width="10%" height="30"><strong>Subject</strong></th>



									<th width="10%"><strong>Start Date</strong></th> 



									<th width="5%"><strong>Statistics</strong></th>



									<th width="5%"><strong>Subscriber</strong></th> 



									<th width="5%"><strong>Send</strong></th>    



									<th width="5%"><strong>Open</strong></th> 



									<th width="5%"><strong>Fail</strong></th>    



									                



                                    <th width="10%"><strong>Create Date</strong></th>



                                                              



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



							  <td align="center" valign="middle"><input type="checkbox" name="chk[]" id="chk" value="<?php echo $row->job_id;?>" /></td>



                                    <td height="28"><div class="pad-left"><?php echo $row->subject; ?></div></td>



									



									<td align="center" valign="middle"><?php echo date($site_setting['date_format'],strtotime($row->job_start_date)); ?></td>



									



									<td align="center" valign="middle"><div class="pad-left" style="float:none; text-align:center;"><a href="<?php echo site_url('newsletter/newsletter_statistics/'.$row->job_id.'/'.$row->newsletter_id); ?>" id="various<?php echo $row->job_id; ?>">View</a></div>



                                            



											 <script type="text/javascript">



		



												$("#various<?php echo $row->job_id; ?>").fancybox({



													'width'				: '85%',



													'height'			: '90%',



													'autoScale'			: true,



													'transitionIn'		: 'none',



													'transitionOut'		: 'none',



													'type'				: 'iframe'



												});			



		



												</script>



											</td>



											



																			



											     



									<td align="center" valign="middle"><div class="pad-left" style="float:none; text-align:center;" align="center"><?php $total_subscription=$this->newsletter_model->get_total_subscription($row->newsletter_id);



									if($total_subscription>0)



									{



									echo '('.$this->newsletter_model->get_total_subscription($row->newsletter_id).')';



									} else { echo "(0)"; }



									 ?></div></td>



									



									



									<td align="center" valign="middle"><div class="pad-left" style="float:none; text-align:center;" align="center"><?php $total_send=$this->newsletter_model->get_total_job_send($row->job_id);



						



						if($total_send>0) {	



									



									echo '('.$this->newsletter_model->get_total_job_send($row->job_id).')';



							} else { echo "(0)"; }



							



						  ?></div></td>



									



									<td align="center" valign="middle"><div class="pad-left" style="float:none; text-align:center;" align="center"><?php $total_read=$this->newsletter_model->get_total_job_open($row->job_id);



							



						if($total_read>0) {		



									



									echo '('.$this->newsletter_model->get_total_job_open($row->job_id).')';



							} else { echo "(0)"; }



							



						 ?></div></td>



									



									<td align="center" valign="middle"><div class="pad-left" style="float:none; text-align:center;" align="center"><?php $total_fail=$this->newsletter_model->get_total_job_fail($row->job_id);



						



						if($total_fail>0) {			



									



									echo '('.$this->newsletter_model->get_total_job_fail($row->job_id).')';



						} else { echo "(0)"; }  ?></div></td>



									



									



                                    <td align="center" valign="middle"><?php echo date($site_setting['date_format'],strtotime($row->job_date)); ?></td>



									



								



                                  </tr>



								  <?php



								  			$i++;



										}



									} else {



								  ?>        



								  



								  <tr class="alter">



                                    <td colspan="15" align="center" valign="middle" height="30">No Records found.</td></tr>



								  



								  <?php } ?>                                                           



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



								



								<div align="left" style="padding:10px;"><b style="color:#FF0000;">Important Note : </b> Please set the cron job on your server with URL <?php echo front_base_url(); ?>newsletter_cron/send<br/>(Ex :: curl -s -o /dev/null <?php echo front_base_url(); ?>newsletter_cron/send)</div>



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



				</form>



              </div>



            </div>



          </div>



        </div>