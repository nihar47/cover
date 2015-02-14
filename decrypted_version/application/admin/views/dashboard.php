<script type="text/javascript" language="javascript">

	function change_page(page)

	{

		if(page == 'pr')

		{

			var as = document.getElementById('paging_pr').getElementsByTagName('a');

			for(i=0;i<as.length;i++)

			{

				as[i].href = as[i].href.replace('user','project');

			}

		}

	}

</script>





 <?php $CI =& get_instance();	

 		$base_url = front_base_url();

		$base_path = base_path();

			 

?>





<div id="con-tabs">

          <ul>

            <li><span style="cursor:pointer;" onclick="show_con('1','3')"><a href="#" id="sp_1" <?php if($msg == 'user'){ echo 'style="color:#364852;background:#ececec;"'; } ?> >Users</a></span></li>

            <li><span style="cursor:pointer;" onclick="show_con('2','3')"><a href="#" id="sp_2">Transactions</a></span></li>

         

		 

		 	<?php /*?><?php $assign_rights=$this->home_model->get_rights('list_project');

									if(	$assign_rights==1) { ?>

		    <li><span style="cursor:pointer;" onclick="show_con('3','3');"><a href="#" id="sp_3" onclick="change_page('pr');" <?php if($msg == 'project'){ echo 'style="color:#364852;background:#ececec;"'; } ?>>Projects</a></span></li>

			

			<?php } ?>
<?php */?>
			

			

          </ul>

          <div id="text">

		  

		  	<?php if($msg=='no_rights') { ?>

					<table align="center" border="0" align="center">

					<tr><td align="center" valign="middle" style="color:#FF0000; font-weight:bold;">You do not have permmission to access this area.</td></tr>

					</table>

					

					<?php } ?>

		  

            <div id="1" <?php if($msg == 'user' || $msg=='no_rights'){ echo 'style="display:block;"'; } else{ echo 'style="display:none;"'; } ?>>

              <div class="fleft" style="width:49.5%;">

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

                          <td class="inr-header"><div class="fleft"><a href="#" onclick="show_div('last_login','chart')">Last 10 Completed Projects</a></div>

                            <div class="fright"><a href="#"><img id="arrow_dig_it" src="<?php echo base_url(); ?>images/down-arrow.png" alt="" border="0" onclick="show_block('dig_it')"/></a></div></td>

                        </tr>                      

                        <tr>

                          <td valign="top"><div class="deals" style="display:none;" id="dig_it">

                              <div id="last_login">

                                <table width="100%" cellpadding="0" cellspacing="1" bgcolor="#888591">

                                  <?php

								  	if($completed_project)

									{

								  ?>

								  <tr class="alter">

                                    <th width="3%" height="30"><strong>No.</strong></th>

                                    <th><strong>Project</strong></th>

									<th width="17%" height="30"><strong>Username</strong></th>

                                    <th width="14%"><strong>Posted Date</strong></th>

                                    <th width="15%"><strong>Completed Date</strong></th>

                                    <th width="14%"><strong>Donate Amt</strong></th>

                                    <th width="10%"><strong>Earning</strong></th>

                                  </tr>

								  <?php

										$i = 1;

										foreach($completed_project as $prj)	

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

                                    <td height="28"><?php echo $i; ?></td>

                                    

                                    <td><div class="pad-left"><a href="<?php echo front_base_url().'projects/'.$prj['url_project_title'].'/'.$prj['project_id'];?>" target="_blank"><?php echo $prj['project_title']; ?></a></div></td>

                                    

                                    

									<td><div class="pad-left"><a href="<?php echo front_base_url().'member/'.$prj['user_id'];?>" target="_blank">

									<?php echo ucfirst($prj['user_name']); ?></a>

                                    

                                    </div></td>

                                    <td><div class="pad-left"><?php echo ($prj['date_added']!="")?date($site_setting['date_format'],strtotime($prj['date_added'])):''; ?></div></td>

                                    <td><div class="pad-left"><?php echo ($prj['end_date']!="")?date($site_setting['date_format'],strtotime($prj['end_date'])):''; ?></div></td>

                                    <td><div class="pad-left"><?php echo set_currency($prj['total_amount']); ?></div></td>

                                    <td><div class="pad-left"><?php echo set_currency(($prj['total_listing_fee']+$prj['total_pay_fee'])); ?></div></td>

                                  </tr>

								  <?php

											$i++;

										}

									}else{

								  ?>

								  <tr class="alter">

                                    <th height="30" colspan="7"><strong>No record found</strong></th>

                                  </tr>

								  <?php

									}

								  ?>

                                </table>

                              </div>

                              <div id="chart" style="display:none;">

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

              <div class="fright" style="width:49.5%;">

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

                          <td class="inr-header"><div class="fleft"><a href="#" onclick="show_div('last_login1','chart1')">Last 10 New Posted Projects</a></div>

                            <div class="fright"><a href="#"><img id="arrow_dig_it3" src="<?php echo base_url(); ?>images/down-arrow.png" alt="" border="0" onclick="show_block('dig_it3')"/></a></div></td>

                        </tr>

                        <tr>

                          <td valign="top"><div class="deals" style="display:none;" id="dig_it3">

                              <div id="last_login1">

                                <table width="100%" cellpadding="0" cellspacing="1" bgcolor="#888591">

                                  <?php

								  	if($posted_project)

									{

								  ?>

								  <tr class="alter">

                                    <th width="3%" height="30"><strong>No.</strong></th>

                                    <th><strong>Project</strong></th>

									<th width="17%"><strong>Username</strong></th>

                                    <th width="14%"><strong>Posted Date</strong></th>

                                    <th width="14%"><strong>Donate Amt</strong></th>

                                    <th width="10%"><strong>Earning</strong></th>

                                    <th width="10%"><strong>Remain Fund</strong></th>

                                  </tr>

								  <?php

										$i = 1;

										foreach($posted_project as $prj)	

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

                                    <td height="28"><?php echo $i; ?></td>

									

                                    

                                    

                                      <td><div class="pad-left"><a href="<?php echo front_base_url().'projects/'.$prj['url_project_title'].'/'.$prj['project_id'];?>" target="_blank"><?php echo $prj['project_title']; ?></a></div></td>

                                    

                                    

									<td><div class="pad-left"><a href="<?php echo front_base_url().'member/'.$prj['user_id'];?>" target="_blank">

									<?php echo ucfirst($prj['user_name']); ?></a>

                                    

                                    </div></td>

                                    

                                    

                                    

                                    

                                    

                                   

                                    <td><div class="pad-left"><?php echo ($prj['date_added']!='')?date($site_setting['date_format'],strtotime($prj['date_added'])):''; ?></div></td>

                                    <td><div class="pad-left"><?php echo ($prj['total_amount']!='')?set_currency($prj['total_amount']):''; ?></div></td>

                                    <td><div class="pad-left"><?php echo set_currency(($prj['total_listing_fee']+$prj['total_pay_fee'])); ?></div></td>

                                    <td><div class="pad-left"><?php if(($prj['amount']-$prj['total_amount'])<0){ echo set_currency(($prj['total_amount']-$prj['amount']))."&nbsp;<img src='".base_url()."images/add.png' width='12' height='12' >"; }else{ echo set_currency(($prj['amount']-$prj['total_amount'])); } ?></div></td>

                                  </tr>

								  <?php

											$i++;

										}

									}else{

								  ?>

								  <tr class="alter">

                                    <th height="30" colspan="7"><strong>No record found</strong></th>

                                  </tr>

								  <?php

									}

								  ?>

                                </table>

                              </div>

                              <div id="chart1" style="display:none;">

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

			  <div style="height:5px;clear:both;"></div>

            


			  <div style="height:5px;clear:both;"></div>

              <div class="fleft" style="width:100%;">

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

                          <td class="inr-header"><div class="fleft"><a href="#" onclick="show_div('last_login3','chart3')">Last 10 New Users</a></div>

                            <div class="fright"><a href="#"><img id="arrow_dig_it5" src="<?php echo base_url(); ?>images/down-arrow.png" alt="" border="0" onclick="show_block('dig_it5')"/></a></div></td>

                        </tr>                                           

                        <tr>

                          <td valign="top">

                          <div class="deals" style="display:none;" id="dig_it5">

                              <div id="last_login3">

                                <table width="100%" cellpadding="0" cellspacing="1" bgcolor="#888591">

								  <?php

								  	if($users)

									{

								  ?>

								  <tr class="alter">

                                  	<th width="3%" height="30"><strong>No.</strong></th>

                                    <th width="25%"><strong>Username</strong></th>

                                    <th width="20%"><strong>Email</strong></th>

                                    <th width="10%"><strong>City</strong></th>

									<th width="10%"><strong>State</strong></th>

									<th width="10%"><strong>Country</strong></th>

									<th width="10%"><strong>Sign up IP</strong></th>

                                    <th width="10%"><strong>Registered On</strong></th>

                                  </tr>

								  <?php

										$i = 1;

										foreach($users as $u)	

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

                                    <td height="28"><?php echo $i; ?></td>

                                   

                                   

                                   	<td><div class="pad-left"><a href="<?php echo front_base_url().'member/'.$u['user_id'];?>" target="_blank">

									<?php echo ucfirst($u['user_name']); ?></a>

                                    

                                   

                                  

                                    <td><div class="pad-left"><?php echo $u['email']; ?></div></td>

                                    <td><div class="pad-left"><?php echo ucfirst($u['city']); ?></div></td>

									<td><div class="pad-left"><?php echo ucfirst($u['state']); ?></div></td>

									<td><div class="pad-left"><?php echo ucfirst($u['country']); ?></div></td>

									<td><div class="pad-left"><?php echo $u['signup_ip']; ?></div></td>

                                    <td><div class="pad-left"><?php echo ($u['date_added']!='')?date($site_setting['date_format'],strtotime($u['date_added'])):''; ?></div></td>

                                  </tr>

								  <?php

											$i++;

										}

									}else{

								  ?>

								  <tr class="alter">

                                  	<th height="30"><strong>No record found</strong></th>

                                  </tr>

								  <?php

									}

								  ?>

                                </table>

                              </div>

                              <div id="chart3" style="display:none;">

                                <table cellpadding="0" cellspacing="0" border="0">

                                  <tr>

                                    <td align="center"><img src="<?php echo base_url(); ?>images/chart.jpg" alt="" /></td>

                                  </tr>

                                </table>

                              </div>

                            </div>                           

                          </td>

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

			  <div style="height:5px;clear:both;"></div>

              <div class="fleft" style="width:100%;">

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

                          <td class="inr-header"><div class="fleft"><a href="#" onclick="show_div('last_login4','chart4')">Last 10 New Donor</a></div>

                            <div class="fright"><a href="#"><img id="arrow_dig_it6" src="<?php echo base_url(); ?>images/down-arrow.png" alt="" border="0" onclick="show_block('dig_it6')"/></a></div></td>

                        </tr>

                        <tr>

                          <td valign="top"><div class="deals" style="display:none;" id="dig_it6">

                              <div id="last_login4">

                                <table width="100%" cellpadding="0" cellspacing="1" bgcolor="#888591">

								  <?php

									if($customer)

									{

								  ?>

								  <tr class="alter">

                                    <th width="3%" height="30"><strong>No.</strong></th>

                                    <th width="20%"><strong>Project</strong></th>

									<th width="15%"><strong>Username</strong></th>

                                    <th><strong>Email</strong></th>

                                    <th width="20%"><strong>Payee Email</strong></th>

                                    <th width="8%"><strong>IP Address </strong></th>                                   

                                    <th width="5%"><strong>Funds</strong></th>

                                     <th width="5%"><strong>Earning</strong></th>

                                  </tr>

								  <?php

										$i = 1;

										foreach($customer as $cust)	

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

                                    <td height="28"><?php echo $i; ?></td>

                                     

                                     <td><div class="pad-left">

									 <a href="<?php echo front_base_url().'projects/'.$cust['url_project_title'].'/'.$cust['project_id'];?>" target="_blank">

									 <?php echo ucfirst($cust['project_title']); ?></a></div>

                                     </td>

                                     

									<td><div class="pad-left">

									<a href="<?php echo front_base_url().'member/'.$cust['user_id'];?>" target="_blank">									

									<?php echo ucfirst($cust['user_name'].' '.$cust['last_name']); ?></a></div></td>

                                      <td><div class="pad-left"><?php echo $cust['email']; ?></div></td>

                                    <td><div class="pad-left"><?php echo $cust['payee_email']; ?></div></td>

                                    <td><div class="pad-left"><?php echo $cust['host_ip']; ?></div></td>

                                   

                                    <td><div class="pad-left"><?php echo set_currency($cust['amount']); ?></div></td>

                                    <td><div class="pad-left"><?php echo set_currency($cust['pay_fee']); ?></div></td>

                                  </tr>

								  <?php

											$i++;

										}

									}else{

								  ?>

								  <tr class="alter">

                                    <th height="30"><strong>No record found</strong></th>

                                  </tr>

								  <?php

									}

								  ?>

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

    
     	
<!-- 1. Add these JavaScript inclusions in the head of your page -->

<script type="text/javascript" src="<?Php echo upload_url(); ?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?Php echo upload_url(); ?>js/highcharts.js"></script>


<!-- 1b) Optional: the exporting module -->
<script type="text/javascript" src="<?Php echo upload_url(); ?>js/modules/exporting.js"></script>


<script type="text/javascript">
$(function () {
    var chart, chart1;
	
			/*exporting: {
				enabled: true
			  },
		*/
		
	
	
    $(document).ready(function() {
        
		
		
		chart = new Highcharts.Chart({
            chart: {
                renderTo: 'weeklyregistration',
                type: 'line',
                marginRight: 0,
                marginBottom: 25
            },
            title: {
                text: '',
                x: -20 //center
            },
            subtitle: {
                text: '',
                x: -20
            },
            xAxis: {
                categories: ['Mon', 'Tue', 'Wen', 'Thur', 'Fri', 'Sat', 'Sun']
            },
            yAxis: {
                title: {
                    text: 'Total'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                formatter: function() {
                        return '<b>'+ this.series.name +'</b><br/>'+
                        this.x +': ' +this.y;
                }
            },
			
			
			
            legend: {
                layout: 'horizontal',
                align: 'center',
                verticalAlign: 'top',
                x: 10,
                y: 0,
                borderWidth: 0
            },
            series: [{
                name: 'Registration',
                data: [<?php if($weekly_registration) {  foreach($weekly_registration as $date => $total) { echo $total.','; } } ?>]
            }, {
                name: 'Facebook',
                data: [<?php if($weekly_fb_registration) {  foreach($weekly_fb_registration as $date => $total) { echo $total.','; } } ?>]
            }, {
                name: 'Twitter',
                data: [<?php if($weekly_tw_registration) {  foreach($weekly_tw_registration as $date => $total) { echo $total.','; } } ?>]
            }]
        });
		
		chart1 = new Highcharts.Chart({
             chart: {
                renderTo: 'weeklyprj',
                type: 'line',
                marginRight: 0,
                marginBottom: 25
            },
            title: {
                text: '',
                x: -20 //center
            },
            subtitle: {
                text: '',
                x: -20
            },
            xAxis: {
                categories: ['Mon', 'Tue', 'Wen', 'Thur', 'Fri', 'Sat', 'Sun']
            },
            yAxis: {
                title: {
                    text: 'Total'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                formatter: function() {
                        return '<b>'+ this.series.name +'</b><br/>'+
                        this.x +': '+this.y;
                }
            },
			
			
			
            legend: {
                layout: 'horizontal',
                align: 'center',
                verticalAlign: 'top',
                x: 10,
                y: 0,
                borderWidth: 0
            },
            series: [{
                name: 'New Projects',
                data: [<?php if($weekly_projects_new) {  foreach($weekly_projects_new as $date => $total) { echo $total.','; } } ?>]
            },{
                name: 'Active Projects',
                data: [<?php if($weekly_projects_active) {  foreach($weekly_projects_active as $date => $total) { echo $total.','; } } ?>]
            },{
                name: 'Successful Projects',
                data: [<?php if($weekly_projects_success) {  foreach($weekly_projects_success as $date => $total) { echo $total.','; } } ?>]
            }]
        });
		
  
   });
    
});
		</script>  
	
              <div style="height:5px;clear:both;"></div>   
            <div class="fleft" style="width:49.5%;">

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

                          <td class="inr-header"><div class="fleft">Weekly Average Registrations</div>

                            <div class="fright">&nbsp;</div></td>

                        </tr>

                        <tr>

                          <td valign="top"><div class="deals">

                              
							 <div id="weeklyregistration" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
                              

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

              <div class="fright" style="width:49.5%;">

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

                          <td class="inr-header"><div class="fleft">Weekly Average Projects</div>

                            <div class="fright">&nbsp;</div></td>

                        </tr>

                        <tr>

                          <td valign="top"><div class="deals">

                              
								<div id="weeklyprj" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
                              

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

			  <div style="height:5px;clear:both;"></div>

            
               
            </div>

            <div id="2" style="display:none;">

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

                        <td class="inr-header"><div class="fleft">Transactions (<?php echo $site_setting['currency_symbol']; ?>)</div>

                          <div class="fright"><a href="#"><img id="arrow_dig_it1" src="<?php echo base_url(); ?>images/down-arrow.png" alt="" border="0" onclick="show_block('dig_it1')"/></a></div></td>

                      </tr>

                      <tr>

                        <td valign="top"><div class="deals" style="display:none;" id="dig_it1">

                            <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">

                              <tr>

                                <td width="30%" height="30"></td>

                                <td width="12%" bgcolor="#888f91"><strong>Today</strong></td>

                                <td width="1%"></td>

                                <td width="12%" bgcolor="#888f91"><strong>This Week</strong></td>

                                <td width="1%"></td>

                                <td width="12%" bgcolor="#888f91"><strong>This Month</strong></td>

                                <td width="1%"></td>

                                <td width="12%" bgcolor="#888f91"><strong>Total</strong></td>

                                <td width="18%"></td>

                              </tr>

                              <tr>

                                <td colspan="9"><table width="100%" cellpadding="0" cellspacing="1" style="background:#888f91;">

                                    <tr onclick="toggle(this);" class="alter">

                                      <td width="10%" height="28" rowspan="2"><div class="pad-left"><strong>Cleared </strong></div></td>

                                      <td width="20%" height="28" ><div class="pad-left"><strong>Funding </strong></div></td>

                                      <td width="12%" align="center"><?php echo set_currency($total_earned_today['funding']); ?></td>

                                      <td width="1%" ></td>

                                      <td width="12%" align="center"><?php echo set_currency($total_earned_week['funding']); ?></td>

                                      <td width="1%" ></td>

                                      <td width="12%" align="center"><?php echo set_currency($total_earned_month['funding']); ?></td>

                                      <td width="1%" ></td>

                                      <td width="12%" align="center"><?php echo set_currency($total_earned['funding']); ?></td>

                                      <td width="18%" ></td>

                                    </tr>

                                    <tr onclick="toggle1(this);" class="alter1">

                                      <td height="28"><div class="pad-left"><strong>Revenue / Commission Earned</strong></div></td>

                                      <td><?php echo set_currency($total_earned_today['commission']); ?></td>

                                      <td></td>

                                      <td><?php echo set_currency($total_earned_week['commission']); ?></td>

                                      <td></td>

                                      <td><?php echo set_currency($total_earned_month['commission']); ?></td>

                                      <td></td>

                                      <td><?php echo set_currency($total_earned['commission']); ?></td>

                                      <td></td>

                                    </tr>

                                    <tr onclick="toggle(this);" class="alter">

                                      <td height="28" rowspan="2"><div class="pad-left"><strong>Pipeline</strong></div></td>

                                      <td height="28" ><div class="pad-left"><strong>Funding</strong></div></td>

                                      <td align="center"><?php echo set_currency($total_pipeline_today['pipeline']); ?></td>

                                      <td align="center"></td>

                                      <td align="center"><?php echo set_currency($total_pipeline_week['pipeline']); ?></td>

                                      <td align="center"></td>

                                      <td align="center"><?php echo set_currency($total_pipeline_month['pipeline']); ?></td>

                                      <td align="center"></td>

                                      <td align="center"><?php echo set_currency($total_pipeline['pipeline']); ?></td>

                                      <td align="center"></td>

                                    </tr>

                                    <tr onclick="toggle1(this);" class="alter1">

                                      <td height="28" class="deal-td-white"><div class="pad-left"><strong>Revenue / Commission</strong></div></td>

                                      <td><?php echo set_currency($total_pipeline_today['commission']); ?></td>

                                      <td></td>

                                      <td><?php echo set_currency($total_pipeline_week['commission']); ?></td>

                                      <td></td>

                                      <td><?php echo set_currency($total_pipeline_month['commission']); ?></td>

                                      <td></td>

                                      <td><?php echo set_currency($total_pipeline['commission']); ?></td>

                                      <td></td>

                                    </tr>

                                    <tr onclick="toggle(this);" class="alter">

                                      <td height="28" rowspan="2"><div class="pad-left"><strong>Lost</strong></div></td>

                                      <td height="28" ><div class="pad-left"><strong>Funding</strong></div></td>

                                      <td ><?php echo set_currency($total_lost_today['lost']); ?></td>

                                      <td ></td>

                                      <td ><?php echo set_currency($total_lost_week['lost']); ?></td>

                                      <td ></td>

                                      <td ><?php echo set_currency($total_lost_month['lost']); ?></td>

                                      <td ></td>

                                      <td ><?php echo set_currency($total_lost['lost']); ?></td>

                                      <td ></td>

                                    </tr>

                                    <tr onclick="toggle1(this);" class="alter1">

                                      <td height="28" class="deal-td-white"><div class="pad-left"><strong>Revenue / Commission</strong></div></td>

                                      <td ><?php echo set_currency($total_lost_today['commission']); ?></td>

                                      <td></td>

                                      <td ><?php echo set_currency($total_lost_week['commission']); ?></td>

                                      <td></td>

                                      <td ><?php echo set_currency($total_lost_month['commission']); ?></td>

                                      <td></td>

                                      <td ><?php echo set_currency($total_lost['commission']); ?></td>

                                      <td></td>

                                    </tr>                                    

                                  </table></td>

                              </tr>

                            </table>

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

              <div class="withdraw_req">

                <div class="fleft"> Total No. of Projects Posted   :   <?php echo $total_project_posted; ?><br />

                  Total  Commission Amount Earned     :   <?php echo set_currency($total_earned['commission']); ?></div>

                <div class="fleft"><img src="<?php echo base_url(); ?>images/fot-dev.jpg" alt="" /></div>

                <div class="fleft"> Total No. of Pending Project  (this month)  :   <?php echo $total_pending_project; ?><br />

                  Total  Commission Amount Earned  (this month)   :   <?php echo set_currency($total_earned_month['commission']); ?> </div>

                <div class="fleft"><img src="<?php echo base_url(); ?>images/fot-dev.jpg" alt="" /></div>

                <div class="fleft"> Total No. of Completed Project  (this month)   :   <?php echo $total_completed_project; ?><br />

                  Total  Commission Amount Earned (this week)    :   <?php echo set_currency($total_earned_week['commission']); ?> </div>

              </div>

            </div>

            <div id="3" <?php if($msg != 'project'){ echo 'style="display:none;"'; } ?> >

              <div class="deal-status">                

              </div>             

              <style type="text/css">

			  

			  #proj_ul li { padding-bottom:0px !important; line-height:12px !important; }

			  

			  #proj_ul li .left-title{ width: 28% !important; padding: 0px 7px !important; text-align: left !important; }

			  

			  </style>

			 <?php

			 	if($latest_project)

			 	{			 

			 		foreach($latest_project as $latest)

			 		{

			 ?>			 

			  <div id="city-wisedeal">

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

                          <td class="inr-header"><div style="position:relative;" ><div class="fleft" title="<?php echo $latest['project_title']; ?>">Project :&nbsp;  <?php echo substr(ucfirst($latest['project_title']),0,40);?></div></div>

                          </td>

                        </tr>

                        <tr>

                          <td valign="top"><div class="citydeal" style="display:block;" id="dig_it1">

                              <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" bgcolor="#ececec">

                                <tr>

                                  <td><ul id="proj_ul">

                                      <li>

                                        <div class="left-title">Category :</div>

                                        <div class="right-ans"><?php echo substr(ucfirst($latest['project_category_name']),0,25); ?></div>

                                      </li>

                                      

                                      <li>

                                        <div class="left-title">User Name :</div>

                                        <div class="right-ans"><a href="<?php echo front_base_url().'member/'.$latest['user_id'];?>" target="_blank" style="padding:0px; background:none; color:#666666;"><?php echo ucfirst($latest['user_name'].' '.$latest['last_name']); ?></a></div>

                                      </li>

                                      

                                      

                                      

                                       <li>

                                        <div class="left-title">Email :</div>

                                        <div class="right-ans"><?php echo ucfirst($latest['email']); ?></div>

                                      </li>

                                      

                                      

                                      

                                      

                                       <li>

                                        <div class="left-title">Paypal Email :</div>

                                        <div class="right-ans"><?php echo ucfirst($latest['paypal_email']); ?></div>

                                      </li>

                                      

                                      

                                      

                                      

                                      

                                      

                                      

									  <li>

                                        <div class="left-title">City :</div>

                                        <div class="right-ans"><?php if($latest['project_city']=='') { echo "N/A"; } else { echo ucfirst($latest['project_city']); } ?></div>

                                      </li> 

                                      

                                      

                                       <li>

                                        <div class="left-title">State :</div>

                                        <div class="right-ans"><?php if($latest['project_state']=='') { echo "N/A"; } else { echo ucfirst($latest['project_state']); } ?></div>

                                      </li> 

                                      

                                      

                                       <li>

                                        <div class="left-title">Country :</div>

                                        <div class="right-ans"><?php if($latest['project_country']=='') { echo "N/A"; } else { echo ucfirst($latest['project_country']); } ?></div>

                                      </li> 

                                      

                                      

                                      

                                      <li>

                                        <div class="left-title">IP Address :</div>

                                        <div class="right-ans"><?php echo $latest['host_ip'];?></div>

                                      </li>

                                      <li>

                                        <div class="left-title">Goal Amount :</div>

                                        <div class="right-ans"><?php if($latest['amount']=='' || $latest['amount']=='0') { echo set_currency('0'); } else { echo set_currency($latest['amount']); }?></div>

                                      </li>

                                      <li>

                                        <div class="left-title">Raised Amount :</div>

                                        <div class="right-ans"><?php if($latest['amount_get']=='' || $latest['amount_get']=='0') { echo set_currency('0'); } else { echo set_currency($latest['amount_get']); }?></div>

                                      </li>

									  								  					  

									  

									  

									  

									  

									  

									   <li>

                                        <div class="left-title">Project Status :</div>

                                        <div class="right-ans"><?php if($latest['active']==1){ echo "Active";} if($latest['active']==0){ echo "Inactive";}?></div>

                                      </li>

									   <?php
										$latest['amount'] = str_replace("$","",$latest['amount']);
										
										if($latest['amount_get'] > 0 and $latest['amount'] > 0){
										
										$w = ($latest['amount_get']*100)/$latest['amount'];
										
										}else{
										
										$w = 0;
										}
										if($w > 100)$wp = '100';
										else $wp = $w;
										?>
									  <li class="graphdisplay" style="margin-bottom:10px;">

                                        <div align="left" class="graph"><span style="width:<?php echo $wp; ?>%;">&nbsp;&nbsp;&nbsp;<?php echo number_format($w,2).'%'; ?></span></div>                                        

                                      </li>

                                    </ul></td>

                                </tr>

                              </table>

                            </div></td>

                        </tr>

                        <tr>

                          <td><div align="right">

						  <?php

						  	echo anchor('home/comments/'.$latest['project_id'],'View Comments');

						  ?> | 

						  <?php

						  	$CI =& get_instance();

							$site = front_base_url();

						  ?>

						  <?php

						  	echo anchor(front_base_url().'projects/'.$latest['url_project_title'].'/'.$latest['project_id'],'View Page','target="_blank"');

						  ?>		

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

			  <?php

			  		}

				}else{

			  ?>

			  No Latest Projects.

			  <?php

			  	}

			  ?>
				 <div style="height:5px;clear:both;"></div>
                

                
			  <div align="center" style="clear:both;"><div id="paging_pr" style="background:url('<?php echo base_url(); ?>images/table-f-bg.jpg') repeat-x scroll left top transparent;"><table><tr><?php echo $page_link; ?></tr></table></div></div>

            </div>            
     
              

          </div>

        </div>