<?php 	

$CI =& get_instance();	

$base_url = $CI->config->slash_item('base_url_site');

$base_path = base_path();



if($total_send==0 || $total_send=='0' || $total_send=='')

{

	$total_remain_send_perc=100;

	$total_open_perc=100;

}

else

{

	$total_remain_send_perc=($total_send*100)/(100*$total_subscription);

	$total_open_perc=($total_read*100)/(100*$total_send);

}





if($total_remain_send_perc==1) { $total_remain_send_perc=0.1; } 



if($total_open_perc==1) { $total_open_perc=0.1; } 



if($total_remain_send_perc==100) { $total_subscribe=0.1; } else { $total_subscribe=100; } 



if($total_open_perc==100) { $total_send=0.1; } else { $total_send=100; } 

	 

	 



?>



<table border="0" cellpadding="2" cellspacing="2" width="100%" style="background:#ffffff; height:auto;">

<tr>

<td align="left" valign="top" colspan="2" style="font-size:26px; height:40px; color:#114A75; border-bottom:1px solid #999999; font-weight:bold;"><?php echo $newsletter->subject; ?></td>

</tr>



<tr>

<td align="left" valign="top" style="width:150px;">Job Start Date : </td> <td align="left" valign="top"><?php echo date($site_setting['date_format'],strtotime($job->job_start_date));  ?></td>

</tr>





<tr>

<td align="left" valign="top">Job Create Date : </td> <td align="left" valign="top"><?php echo date($site_setting['date_format'],strtotime($job->job_date));  ?></td>

</tr>





<tr>

<td align="left" valign="top">Total Subscriber : </td> <td align="left" valign="top"><?php echo $total_subscription; ?></td>

</tr>





<tr>

<td align="left" valign="top">Total Send : </td> <td align="left" valign="top"><?php echo $total_send; ?></td>

</tr>





<tr>

<td align="left" valign="top">Total Open : </td> <td align="left" valign="top"><?php echo $total_read; ?></td>

</tr>



<tr>

<td align="left" valign="top">Total Fail : </td> <td align="left" valign="top"><?php echo $total_fail; ?></td>

</tr>





 







<!-- 1. Add these JavaScript inclusions in the head of your page -->



<script type="text/javascript" src="<?Php echo upload_url(); ?>js/jquery-1.7.1.js"></script>



<script type="text/javascript" src="<?Php echo upload_url(); ?>js/highcharts.js"></script>





<!-- 1b) Optional: the exporting module -->

<script type="text/javascript" src="<?Php echo upload_url(); ?>js/modules/exporting.js"></script>



<script type="text/javascript">

var chart; var chart2;

			$(document).ready(function() {

				chart = new Highcharts.Chart({

					chart: {

						renderTo: 'pie',

						plotBackgroundColor: null,

						plotBorderWidth: null,

						plotShadow: false

					},

					title: {

						text: ''

					},

					tooltip: {

						formatter: function() {

							return '<b>'+ this.point.name +'</b> : '+ this.y+ ' %' ;

						}

					},

					plotOptions: {

						pie: {

							allowPointSelect: true,

							cursor: 'pointer',

							dataLabels: {

								enabled: false

							},

							showInLegend: true

						}

					},

				    series: [{

						type: 'pie',

						name: 'Browser share',

						

						

						data: [

						

									['Total Subscriber ', <?php echo $total_subscribe; ?>    ],

									['Remain Send',      <?php echo $total_remain_send_perc; ?>],

						

						]

						

						

						

					}],

						navigation: {

        buttonOptions: {

            enabled: false

        }

    }	

	

				});

				

				

				

				

				

				chart2 = new Highcharts.Chart({

					chart: {

						renderTo: 'pie2',

						plotBackgroundColor: null,

						plotBorderWidth: null,

						plotShadow: false

					},

					title: {

						text: ''

					},

					tooltip: {

						formatter: function() {

							return '<b>'+ this.point.name +'</b> : '+ this.y+ ' %' ;

						}

					},

					plotOptions: {

						pie: {

							allowPointSelect: true,

							cursor: 'pointer',

							dataLabels: {

								enabled: false

							},

							showInLegend: true

						}

					},

				    series: [{

						type: 'pie',

						name: 'Browser share',

						

						

						data: [

						

									['Total Send ',<?php echo $total_send; ?> ],

									['Remain Open',<?php echo $total_open_perc; ?>],

						

						]

						

						

						

					}],

						navigation: {

        buttonOptions: {

            enabled: false

        }

    }	

	

				});

				

				

				

				

				

			});

		

			</script>

			

	<tr><td align="left" valign="top" colspan="2">

		<table border="0" cellpadding="3" cellspacing="3" width="100%">

		<tr>

		<td align="center" valign="top">	

			 <div id="pie" style="width:500px;"></div>

		</td>

		<td align="center" valign="top">

		<div id="pie2" style="width:500px;"></div>

		</td>	

		</tr>

		</table> 

			 

		</td></tr>

		

	</table>