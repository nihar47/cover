 <?php $CI =& get_instance();	

 		$base_url = $CI->config->slash_item('base_url_site');

		$base_path = base_path();

			 

?>





<div id="con-tabs">

      <ul>

            <li ><span style="cursor:pointer;"><a href="<?php echo site_url('graph/user'); ?>" id="sp_1" style="color:#364852;background:#ececec;">Users</a></span></li>
            <li ><span style="cursor:pointer;"><a href="<?php echo site_url('graph'); ?>" >Projects</a></span></li>
      </ul>

          <div id="text">

		  
  

            <div id="3">

                           
<!-- 1. Add these JavaScript inclusions in the head of your page -->

<script type="text/javascript" src="<?Php echo upload_url(); ?>/js/jquery.min.js"></script>

<script type="text/javascript" src="<?Php echo upload_url(); ?>js/highcharts.js"></script>


<!-- 1b) Optional: the exporting module -->
<script type="text/javascript" src="<?Php echo upload_url(); ?>js/modules/exporting.js"></script>


	
		<script type="text/javascript">
$(function () {
    var chart, chart1, chart2, chart3, chart4, chart5;
	
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
                renderTo: 'monthlyregistration',
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
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
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
                data: [<?php if($monthly_registration) {  foreach($monthly_registration as $date => $total) { echo $total.','; } } ?>]
            }, {
                name: 'Facebook',
                data: [<?php if($monthly_fb_registration) {  foreach($monthly_fb_registration as $date => $total) { echo $total.','; } } ?>]
            }, {
                name: 'Twitter',
                data: [<?php if($monthly_tw_registration) {  foreach($monthly_tw_registration as $date => $total) { echo $total.','; } } ?>]
            }]
        });
		
		
		
		chart2 = new Highcharts.Chart({
            chart: {
                renderTo: 'yearlyregistration',
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
                categories: [<?php for($i=$year_first;$i<=$year_last;$i++) { echo "'".$i."',"; } ?>]
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
                name: 'Registration',
                data: [<?php if($yearly_registration) {  foreach($yearly_registration as $date => $total) { echo $total.','; } } ?>]
            }, {
                name: 'Facebook',
                data: [<?php if($yearly_fb_registration) {  foreach($yearly_fb_registration as $date => $total) { echo $total.','; } } ?>]
            }, {
                name: 'Twitter',
                data: [<?php if($yearly_tw_registration) {  foreach($yearly_tw_registration as $date => $total) { echo $total.','; } } ?>]
            }]
        });
		
		
		


		
		chart3 = new Highcharts.Chart({
            chart: {
                renderTo: 'weeklyregistrationbar',
                type: 'column',
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
				 min: 0,
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
                        return this.x +': ' +this.y;
                }
            },
			
			
			
            legend: {
                layout: 'horizontal',
                align: 'center',
                verticalAlign: 'top',
                x: 10,
                y: 0,
                borderWidth: 0,
				floating: true,
                shadow: true
            },
			
			 plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
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
		
		
		
		chart4 = new Highcharts.Chart({
            chart: {
                renderTo: 'monthlyregistrationbar',
                type: 'column',
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
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yAxis: {
				 min: 0,
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
                        return this.x +': ' +this.y;
                }
            },
			
			
            legend: {
                layout: 'horizontal',
                align: 'center',
                verticalAlign: 'top',
                x: 10,
                y: 0,
                 borderWidth: 0,
				floating: true,
                shadow: true
            },
			
			
			plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
			
			
              series: [{
                name: 'Registration',
                data: [<?php if($monthly_registration) {  foreach($monthly_registration as $date => $total) { echo $total.','; } } ?>]
            }, {
                name: 'Facebook',
                data: [<?php if($monthly_fb_registration) {  foreach($monthly_fb_registration as $date => $total) { echo $total.','; } } ?>]
            }, {
                name: 'Twitter',
                data: [<?php if($monthly_tw_registration) {  foreach($monthly_tw_registration as $date => $total) { echo $total.','; } } ?>]
            }]
        });
		
		
		
		
		
		
		chart5 = new Highcharts.Chart({
            chart: {
                renderTo: 'yearlyregistrationbar',
                type: 'column',
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
                categories: [<?php for($i=$year_first;$i<=$year_last;$i++) { echo "'".$i."',"; } ?>]
            },
            yAxis: {
			
				 min: 0,
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
                        return this.x +': ' +this.y;
                }
            },
			
			
            legend: {
                layout: 'horizontal',
                align: 'center',
                verticalAlign: 'top',
                x: 10,
                y: 0,
                 borderWidth: 0,
				floating: true,
                shadow: true
            },
			
			plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
			
            series: [{
                name: 'Registration',
                data: [<?php if($yearly_registration) {  foreach($yearly_registration as $date => $total) { echo $total.','; } } ?>]
            }, {
                name: 'Facebook',
                data: [<?php if($yearly_fb_registration) {  foreach($yearly_fb_registration as $date => $total) { echo $total.','; } } ?>]
            }, {
                name: 'Twitter',
                data: [<?php if($yearly_tw_registration) {  foreach($yearly_tw_registration as $date => $total) { echo $total.','; } } ?>]
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

                          <td class="inr-header"><div class="fleft">Weekly Average Registration(Line)</div>

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

                          <td class="inr-header"><div class="fleft">Weekly Average Registration(Bar)</div>

                            <div class="fright">&nbsp;</div></td>

                        </tr>

                        <tr>

                          <td valign="top"><div class="deals">

                              
								<div id="weeklyregistrationbar" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
                              

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

                          <td class="inr-header"><div class="fleft">Monthly Average Registration(Line)</div>

                            <div class="fright">&nbsp;</div></td>

                        </tr>

                        <tr>

                          <td valign="top"><div class="deals">

                              
							 <div id="monthlyregistration" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
                              

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

                          <td class="inr-header"><div class="fleft">Monthly Average Registration(Bar)</div>

                            <div class="fright">&nbsp;</div></td>

                        </tr>

                        <tr>

                          <td valign="top"><div class="deals">

                              
								<div id="monthlyregistrationbar" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
                              

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

                          <td class="inr-header"><div class="fleft">Yearly Average Registration(Line)</div>

                            <div class="fright">&nbsp;</div></td>

                        </tr>

                        <tr>

                          <td valign="top"><div class="deals">

                              
							 <div id="yearlyregistration" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
                              

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

                          <td class="inr-header"><div class="fleft">Yearly Average Registration(Bar)</div>

                            <div class="fright">&nbsp;</div></td>

                        </tr>

                        <tr>

                          <td valign="top"><div class="deals">

                              
								<div id="yearlyregistrationbar" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
                              

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
     
              

          </div>

        </div>