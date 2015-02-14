

<div id="headerbar">
	<div class="wrap930">
	
	<!-- dd menu -->	
<div class="login_navl">
 
			
			
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tr><td align="left" >	
	<div class="project_title_hd" style="padding-top:15px;" >
	
	
	<span style="text-transform:capitalize;color:#2B5F94;font-size:17px;"><?php echo $this->session->userdata('project_title'); ?></span>
    
	
	</div>
	</td>
	<td align="right" >	
	
	<div class="project_title_hd" style="padding-top:15px; "  >
	<span id="sddm" style="float:right;">
		
		<?php   error_reporting(0); if($this->session->userdata['project_id']!='' && $this->session->userdata['project_id']!=0) {  ?>
		
	 <?php echo anchor('user/my_project/',CHANGE_PROJECT,' style="text-transform:capitalize;color:#2B5F94;font-size:17px;text-decoration:none;" '); ?>
		
		
		<?php } ?>
		
	</span>
	</div>

</td></tr></table>

		  </div> 
		      
		<div class="clear"></div>
	</div>
</div>	
<div id="container">

<div class="wrap930" style="padding:15px 0px 20px 0px;">	

<!--side bar user panel-->

<?php echo $this->load->view('default/dashboard_sidebar'); ?>

<!--side bar user panel-->


<div class="con_left2" style="min-height:0px; width:690px; margin-right:0px;">
           			
              <?php if($this->session->userdata['project_id']!='' && $this->session->userdata['project_id']!=0) {  
			  
			  
			  
					if($msg != "")
					{
						if($msg == '1')
						{
							$msg = "";
						}
						if($msg == '2')
						{
							$msg = '<p>'.YOUR_PROJECT_ADDED.'<p>';
						}
						if($msg == '3')
						{
							$msg = '<p>'.YOUR_PROJECT_UPDATED.'<p>';
						}
						if($msg=='4')
						{
							$msg = $this->session->userdata('user_name')."&nbsp;" .LOGIN_SUCCESSFUL;						
						}
				?>
				
				
				
				<?php } else { ?>
			
				
				<?php }	?>
<style type="text/css">

#tab_all a{ color:#000000; text-decoration:none; }

</style>				

   
<?php
	$data['tab_sel'] = OVERVIEW;
	$this->load->view('default/overview_tabs',$data);

?>

				<div class="inner_content" style=" margin-top:11px;padding:12px; ">
				
				
				<div class="thumb">
				<?php	
					
					
					 if($project['video_image']!='')
					{
				echo anchor('projects/'.$this->session->userdata('url_project_title').'/'.$this->session->userdata('project_id'), '<img src="'.$project['video_image'].'" alt="" width="150" height="150" style="padding:1px; border:1px solid #9fc8da;"  />', 'target="_blank"');									
					}	
					
					else
					{
					
					if($project['image']!='' && is_file("upload/thumb/".$project['image']))
					{
				echo anchor('projects/'.$this->session->userdata('url_project_title').'/'.$this->session->userdata('project_id'), '<img src="'.base_url().'upload/thumb/'.$project['image'].'" alt="" width="150" height="150" style="padding:1px; border:1px solid #9fc8da;"  />', 'target="_blank"');									
					}else{
				
								
				
				$cnt_gal=1;
				
				
			
			if($project_gallery)
			{ 
			
			   	foreach($project_gallery as $prjgry)
				{
					
						if($prjgry->project_image!=''  && is_file('upload/thumb/'.$prjgry->project_image) && $cnt_gal==1)
						{						
						
						 echo anchor('projects/'.$this->session->userdata('url_project_title').'/'.$this->session->userdata('project_id'), '<img src="'.base_url().'upload/thumb/'.$prjgry->project_image.'" alt="" width="150" height="150" style="padding:1px; border:1px solid #9fc8da;"  />', 'target="_blank"'); 
						
							$cnt_gal=2;
						}
						
									
				}
				
				if($cnt_gal==1)
				{
				 
				 echo anchor('projects/'.$this->session->userdata('url_project_title').'/'.$this->session->userdata('project_id'), '<img src="'.base_url().'images/no_img.jpg" alt="" width="150" height="150" style="padding:1px; border:1px solid #9fc8da;"  />', 'target="_blank"');	
						$cnt_gal=2;
				} 
				
			}
			elseif($cnt_gal==1)
			{
			 
			 echo anchor('projects/'.$this->session->userdata('url_project_title').'/'.$this->session->userdata('project_id'), '<img src="'.base_url().'images/no_img.jpg" alt="" width="150" height="150" style="padding:1px; border:1px solid #9fc8da;"  />', 'target="_blank"');	
			 		
			} else { 
			
			echo anchor('projects/'.$this->session->userdata('url_project_title').'/'.$this->session->userdata('project_id'), '<img src="'.base_url().'images/no_img.jpg" alt="" width="150" height="150" style="padding:1px; border:1px solid #9fc8da;"  />', 'target="_blank"');		
			
			}
	
						
																
					}
				}	
				?>	
				
				<div class="clear"></div>
				
				<div align=""><br />

				<span style="font-size: 12px;font-weight: bold;text-transform: uppercase;" ><?php echo anchor('projects/'.$this->session->userdata('url_project_title').'/'.$this->session->userdata('project_id'), VIEW_PAGE,' target="_blank" class="normal_submit" style="padding:10px 10px 10px 20px;margin-left:15px;"  '); ?></span>
				
		<?php if(strtotime($project['end_date'])>strtotime(date('Y-m-d H:i:s')) || $project['project_draft']==0)  { ?>
											

<span style="font-size: 12px;font-weight: bold;text-transform: uppercase;" ><?php echo anchor('project/edit_project/'.$this->session->userdata('project_id'), EDIT_PAGE,' class="normal_submit" style="padding:10px 10px 10px 20px;margin-left:15px;"  '); ?></span>	
				
                <?php } ?>
					
				</div>
				
				</div>
				
				
				
				
				
				
				
				
				<div class="desc_right">
				
					<!--	progress bar-->
				
					<?php
					if($project['amount']!='' && $project['amount']!='0')
					{
												
						if($project['amount_get'] >= $project['amount'])
						{
							$w=100;
						}
						else
						{
							$w = ($project['amount_get']/$project['amount'])*100;
							
							
							if($w>0 && $w<1)
							{
								$w=1;
							}
								
							
						}
						
						
					}else{
						$w = 0;
					}
				?>	
		
				
				<div class="left">
				<h3 style="font-size:14px;"><?php echo GOAL; ?>
				<span style="color:#91cb00"><?php if($project['amount']=='') { echo set_currency('0'); } else { echo set_currency($project['amount']); } ?>
				</span></h3>
				</div>
						
					

			
			
			
			<div class="dashboard_progress">
				<div class="dashboard_progreen" style="width:<?php echo $w; ?>%;max-width:100%;"></div>
			</div>
						
			
			<p class="dashboard_stats">
							<?php if($w=='0') { ?>
								<span class="stleft"><?php echo set_currency('0'); ?>  <?php echo RAISED;?></span>
							<?php } else { ?>
								<span class="stleft">
								<?php if($project['amount_get']=='')	{
									echo set_currency('0')." ".RAISED;
								}else{
									echo set_currency($project['amount_get']).RAISED; 
								}
							}?>	
								</span>
								<span class="stright">
								<?php
								
								if($project['project_draft']==0) {
									echo $project['total_days']." ".DAYS_LEFT."";
								
								}
								else{
					
									$date1 = $project['end_date'];
									$date2 = date("Y-m-d");
									$diff = strtotime($date2) - strtotime($date1);
									if(strtotime($project['end_date'])>strtotime(date('Y-m-d'))) 
									{
									$test = floor(abs($diff) / (60*60*24));
									//echo ($project['end_date']!="0000-00-00")?$test.DAYS_LEFT:"0 ".DAYS_LEFT;
									} else {
									
									//echo "0 ".DAYS_LEFT;
									
									}
									
									
									$dateg = $project['end_date'];
						$date2 = date("Y-m-d");
						
					
						
						
						$date1 = $dateg;
						$date2 = date("Y-m-d");
						$diff = abs(strtotime($date2) - strtotime($date1));
						$test = floor($diff / (60*60*24));
						$str = '';
		
		//echo strtotime(date('Y-m-d',strtotime($dateg))).'=='.strtotime(date('Y-m-d'));exit;
			
			if(strtotime(date('Y-m-d',strtotime($dateg))) > strtotime(date('Y-m-d'))) 
			{
				$temp = floor($diff / (60*60*24));
			
				$str = ($dateg!="0000-00-00 00:00:00")?$test." ".DAYS_LEFT."":"0 ".DAYS_LEFT."";
			}else {
				
				
				$hours = 0;
				$minuts = 0;
				$dategg = $dateg;
				$date2 = date('Y-m-d H:i:s');

		if(strtotime(date('Y-m-d H:i:s',strtotime($dateg))) > strtotime(date('Y-m-d H:i:s'))) 
		{					
			
			//echo $date2;
			$diff2 = abs(strtotime($dategg) - strtotime($date2));
			$day1 = floor($diff2 / (60*60*24));
			
		
			$hours   = floor(($diff2 - $day1*60*60*24)/ (60*60));  
			$minuts  = floor(($diff2 - $day1*60*60*24 - $hours*60*60)/ 60); 
			$seconds = floor(($diff2 - $day1*60*60*24 - $hours*60*60 - $minuts*60)); 
			
			if($hours != 0 || $minuts!=0 || $seconds!=0){
				//echo date('H',strtotime(date('Y-m-d H:i:s',strtotime($dateg)))-strtotime(date('Y-m-d H:i:s'))).'<br /><p>Hours Left</p>';
				//echo $project['end_date'];
				
						$str = $hours." ".HOURS_LEFT."";
						if($hours != 0){						
							$str = $hours." ".HOURS_LEFT."";
						}
						elseif($minuts != 0) { 
							$str = $minuts." ".MINUTES_LEFT."";
						}
						else{
							$str = $seconds." ".SECONDS_LEFT."";
						}
						
					}
					else
					{
						$str = "0 ".DAYS_LEFT."";
					}
				}
				else
				{
					$str = "0 ".DAYS_LEFT."";
				}
				
			}
			echo $str;
			
							}
						
								?>
								</span>
						</p>
			
			
			
		<!--	progress bar-->	
						
					<div class="clear"></div>
               
<h3> <span style="font-size:17px;"><?php echo STATUS; ?> :</span> <?php if($project['project_draft']==0) { ?><small style=" text-align:left; font-style:normal; color:#FF0000; font-weight:bold; font-size:12px;"><?php echo SAVED_IN_DRAFT_CLICK_EDIT_PAGE_AND_POST_PROJECT;?></small><?php }elseif(strtotime($project['end_date'])<strtotime(date('Y-m-d'))) { ?> <small style=" text-align:left; font-style:normal; color:#FF0000; font-weight:bold; font-size:12px;"><?php echo EXPIRED;?></small> <?php } else  {   if($project['active']==1){ ?><small style=" text-align:left; font-style:normal; color:#7DBF0E; font-weight:bold; font-size:12px;"><?php echo APPROVED; ?></small> <?php } if($project['active']==0) { ?><small style=" text-align:left; font-style:normal; color:#FF6600; font-weight:bold; font-size:12px;"><?php echo PENDING_APPROVAL; ?></small> <?php } if($project['active']==2) { ?><small style=" text-align:left; font-style:normal; color:#FF0000; font-weight:bold; font-size:12px;"><?php echo Declined ;?></small><?php }  } ?>	</h3>


		
			<p><?php echo $project['description'];  ?>			
			</p>

				</div>
				<div class="clear"></div>
			</div>
			
	
			
			
		
		<?php  } ///==session
		
		else{ ?>
		
		<div class="inner_content" style="padding:12px; height:250px;">
		<br /><br /><br />

		<div align="center">
		<span style="color:#2B5F94;font-size:15px;  font-weight:bold;"><?php echo NO_PROJECT_HAS_BEEN_ADDED; ?>, <?php echo anchor('user/create/',ADD_NOW);?></span>
		</div>
		
		<div class="clear"></div>
		
		</div>
		
		<?php }	 ?>	
			
			</div>
			
			
			
				
				
				<div class="clear"></div>		
		
		<?php 		if($this->session->userdata['project_id']!='' && $this->session->userdata['project_id']!=0) {  ?>
		
		<div class="con_left2" style="min-height:0px;padding-bottom:20px;" >
				<div id="charts" class="donate_l">
					 <ul>
                    <li><?php echo anchor('#',DONATIONS.'&nbsp;:&nbsp;<span>'.$donation_count.'</span>','class="active"');?></li>
					</ul>
					</div>
					<div class="clear"></div>

				<div class="dlinks" style="float:left;">
					
                    
                    <a href="javascript:void(0)" onclick="javascript:bar()" id="link_amount" style="background:#7DBF0E; color:#FFFFFF; font-weight:bold;"><?php echo DONATION_BY_DATE;?></a>
	                <a href="javascript:void(0)" onclick="javascript:pie()" id="link_total" style="background:#e3f0fd; color:#000000; font-weight:normal;"><?php  echo TOTAL_DONATION; ?></a>
                    
					<div class="clear"></div>
				   </div>
		</div>
		
		
			<div class="clear"></div>		
		
		<?php } ?>		
					
					
				  
				  <script type="text/javascript" language="javascript">
function show_con(id){
	for(var i=1; i<6; i++){
		if(id == i){
			document.getElementById(i).style.display = "block";
			document.getElementById('tab_'+i).style.color = "#E08400";
			document.getElementById('tab_'+i).style.background = "#fff";
		}
		else{
			document.getElementById(i).style.display = "none";
			document.getElementById('tab_'+i).style.color = "#000";
			document.getElementById('tab_'+i).style.background = "#D8D9D9";
		}
	}
}
function edit_con(id){	
	for(var j=1; j<7; j++){
		if(id == 'sec_'+j){
			document.getElementById('sec_'+j).style.display = "block";
		}
		else{
			document.getElementById('sec_'+j).style.display = "none";
		}
	}
}
function show_div(){
	if(document.getElementById('radio1').checked == true)
	{
		document.getElementById('first').style.display = "block";
		document.getElementById('second').style.display = "none";
	}
	else{
		document.getElementById('first').style.display = "none";
		document.getElementById('second').style.display = "block";
	}
}
</script>
<script type="text/javascript" language="javascript">
function show_bg(id){
	document.getElementById(id).style.background = "#ffffff";
	document.getElementById(id).style.border = "1px solid #bebfbf";
}
function hide_bg(id){
	document.getElementById(id).style.background = "#fafafa";
	document.getElementById(id).style.border = "1px solid #d8d9d9";
}
</script>
<script type="text/ecmascript">
function disp_block1()
{
	document.getElementById("3").style.display="block";
	document.getElementById("1").style.display="none";
	document.getElementById("2").style.display="none";
	document.getElementById("sec_1").style.display="block";
}
function disp_block2()
{
	document.getElementById("3").style.display="block";
	document.getElementById("1").style.display="none";
	document.getElementById("2").style.display="none";
	document.getElementById("sec_2").style.display="block";
	document.getElementById("sec_1").style.display="none";
}
function disp_block3()
{
	document.getElementById("3").style.display="block";
	document.getElementById("1").style.display="none";
	document.getElementById("2").style.display="none";
	document.getElementById("sec_2").style.display="block";
	document.getElementById("sec_1").style.display="none";
}
function disp_block4()
{
	document.getElementById("3").style.display="block";
	document.getElementById("1").style.display="none";
	document.getElementById("2").style.display="none";
	document.getElementById("sec_3").style.display="block";
	document.getElementById("sec_2").style.display="none";
	document.getElementById("sec_1").style.display="none";
}
function disp_block5()
{
	document.getElementById("3").style.display="block";
	document.getElementById("1").style.display="none";
	document.getElementById("2").style.display="none";
	document.getElementById("sec_6").style.display="block";
	document.getElementById("sec_3").style.display="none";
	document.getElementById("sec_4").style.display="none";
	document.getElementById("sec_5").style.display="none";
	document.getElementById("sec_2").style.display="none";
	document.getElementById("sec_1").style.display="none";
}
</script>
       
		    
		  
		  
		  
		   
<?php 		if($this->session->userdata['project_id']!='' && $this->session->userdata['project_id']!=0) {
		
			 $add=$project['date_added'];  $end=$project['end_date']; $cur=date('Y-m-d');
	
	
	
$add_ex=explode("-",$add);
 
$end_ex=explode("-",$end);

$cur_ex=explode("-",$cur);

if($end=='0000-00-00' || $end=='') { $minus=$cur_ex; } else { $minus=$end_ex; } 


 $d_diff =strtotime($end)-strtotime($add);
 $total_days=round($d_diff / 86400)+1; 

 

 $temp_don=0;
 $month_ar=array();
 
 	 $get_donation=mysql_query("select * from transaction where project_id='".$this->session->userdata['project_id']."'"); 
	 
	 if(mysql_num_rows($get_donation)>0) {
	 
	
			
			for($m=01;$m<=12;$m++)
			{
				
						
						
						$temp_don=0;
						
				$get_total=mysql_query("select * from transaction where project_id='".$this->session->userdata['project_id']."' and MONTH(transaction_date_time)='".$m."'");
				
				if(mysql_num_rows($get_total)>0)
				{
				
					while($trans=mysql_fetch_array($get_total))
					{
					
					(float)$temp_don=(float)$temp_don+$trans['amount'];
					
					
					}
				
				}
				else
				{
				$temp_don=0;
				
				}
						
									
						 $month_ar[$m]=$temp_don;
						 
						
						
			 
			 } ////for
			 
	
	 
	 }
	 else
	 {
	 
	 
	 
			 for($m=1;$m<=12;$m++)
			{
						
				
			 $month_ar[$m]=0;
						
					 
			}
			 
			 
	 
	 }
	 
//echo "<pre>";
//print_r($month_ar);	 
				
 
 
  $daily_ar=array();
 $temp_don1=0;
 	 $get_donation1=mysql_query("select * from transaction where project_id='".$this->session->userdata['project_id']."'"); 
	 
	 if(mysql_num_rows($get_donation1)>0) {
	 
	
	$l_month=date('m');
	 
		$num1 = cal_days_in_month(CAL_GREGORIAN,$l_month, $add_ex[0]) ; 
			
			
			for($d=1;$d<=$num1;$d++)
			{
					
		$get_total1=mysql_query("select * from transaction where project_id='".$this->session->userdata['project_id']."' and DAY(transaction_date_time)='".$d."'");
		
		if(mysql_num_rows($get_total1)>0)
		{
		
			while($trans1=mysql_fetch_array($get_total1))
			{
			
			(float)$temp_don1=(float)$temp_don1+$trans1['amount'];
			
			
			}
		
		}
		else
		{
		$temp_don1=0;
		
		}
				
						 $daily_ar[$d]=$temp_don1;
		
		
		}
				
				
			 
			 }
			 
	 else
	 {
	 
	 
	 
			 $num = cal_days_in_month(CAL_GREGORIAN, date('m'),date('Y')) ; 
						
			for($d=1;$d<=$num;$d++) 
			
			{ 
			
							
				
			 $daily_ar[$d]=0;
						
					 
			}
			 
			 
	 
	 }
 
 
//echo "<pre>";
//print_r($daily_ar);	 
 
?>
 
 <!-- 1. Add these JavaScript inclusions in the head of your page -->

		<!--<script type="text/javascript" src="<?Php //echo base_url(); ?>js/jquery.min.js"></script>-->
		
		<script type="text/javascript" src="<?Php echo base_url(); ?>js/highcharts.js"></script>
		
		
		
		
		<!-- 1b) Optional: the exporting module -->
		<script type="text/javascript" src="<?Php echo base_url(); ?>js/modules/exporting.js"></script>
		
		
		<!-- 2. Add the JavaScript to initialize the chart on document ready
		
		backgroundColor: {
            linearGradient: [0, 0, 500, 500],
            stops: [
                [0, 'rgb(255, 255, 255)'],
                [1, 'rgb(240, 240, 255)']
            ]
        }
,
        borderWidth: 2,
        plotBackgroundColor: 'rgba(255, 255, 255, .9)',
        plotShadow: true,
        plotBorderWidth: 1
		
		 -->
		<script type="text/javascript">
		
		
	function bar()
	{
			
			document.getElementById('link_amount').style.background='#7DBF0E';
			document.getElementById('link_amount').style.color='#FFFFFF';
			document.getElementById('link_amount').style.fontWeight ='bold';
			
			document.getElementById('link_total').style.background='#e3f0fd';
			document.getElementById('link_total').style.color='#000000';
			document.getElementById('link_total').style.fontWeight ='normal';
			
			document.getElementById('pie').style.display = "none";
			document.getElementById('barg').style.display = "block";
			
			
			
	}
		
		
		var chart;
			jQuery(document).ready(function() {
				chart = new Highcharts.Chart({
					chart: {
						renderTo: 'barg',
						defaultSeriesType: 'column'
					},
					title: {
						text:'<?php echo MONTHLY_AVERAGE_DONATION; ?>'
					},
					subtitle: {
						text: ''
					},
					xAxis: {
					
						<?php if($total_days >31) { ?>
					          
						categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct','Nov','Dec']
						
						<?php } else { ?>
						
						categories: [
						
					<?php  $num = cal_days_in_month(CAL_GREGORIAN, date('m'),date('Y')) ; 
						
						for($i=1;$i<=$num;$i++) { echo "'".$i."',"; } ?>
						]
						
						<?php } ?>
						
						
						
						
					},
					yAxis: {
						min: 0,
						title: {
							text: '<?php echo DONATION; ?> (<?php if(function_exists('mb_convert_encoding')){ echo mb_convert_encoding($site_setting['currency_symbol'], 'UTF-8', 'HTML-ENTITIES');  } else { echo $site_setting['currency_symbol'];  }  ?>)'
						}
					},
					legend: {
						layout: 'vertical',
						backgroundColor: '#FFFFFF',
						align: 'left',
						verticalAlign: 'top',
						x: 100,
						y: 70,
						floating: true,
						shadow: true
					},
					tooltip: {
						formatter: function() {
							return ''+
								this.x +': '+ this.y + '<?php if(function_exists('mb_convert_encoding')){ echo mb_convert_encoding($site_setting['currency_symbol'], 'UTF-8', 'HTML-ENTITIES');  } else { echo $site_setting['currency_symbol'];  }   ?>';
						}
					},
					plotOptions: {
						column: {
							pointPadding: 0.2,
							borderWidth: 0
						}
						
					},
				       
						
						<?php if($total_days >31) { ?>
					    
						
				series: [	{	data: [
				
				<?php foreach($month_ar as $val) { echo $val.','; } ?>
					
				
				
				]	} ],
						       
						
						
						<?php } else { ?>
						
				 series: [	{	 
				 
				name:'<?php echo date('M');?>',
				 data: [
				 
				 
				 
				 <?php foreach($daily_ar as $val) { echo $val.','; } ?>
				 
				
				
				]	} ],
						 
						
						
					
						
						
						<?php } ?>
						
						
					
				navigation: {
        buttonOptions: {
            enabled: false
        }
    }	
					
					
					
					
				});
				
				
			});
		
			
			
				
		</script>
 
 			 <div id="barg" style="display:block;"></div>
				  
				   <div id="pie" style="float:left; display:none;width:500px;"></div>
				   
				  
				   
				   
				   
				   
		<script>
		function pie()
		{	
					
			document.getElementById('link_total').style.background='#7DBF0E';
			document.getElementById('link_total').style.color='#FFFFFF';
			document.getElementById('link_total').style.fontWeight ='bold';
			
			document.getElementById('link_amount').style.background='#e3f0fd';
			document.getElementById('link_amount').style.color='#000000';
			document.getElementById('link_amount').style.fontWeight ='normal';
			
			document.getElementById('pie').style.display = "block";
			document.getElementById('barg').style.display = "none";
			
			var chart;
			//$(document).ready(function() {
				chart = new Highcharts.Chart({
					chart: {
						renderTo: 'pie',
						plotBackgroundColor: null,
						plotBorderWidth: null,
						plotShadow: false
					},
					title: {
						text: '<?php if(function_exists('mb_convert_encoding')){ echo mb_convert_encoding(TOTAL_DONATION_IN_PERCENTAGE, 'UTF-8', 'HTML-ENTITIES'); }else{ echo TOTAL_DONATION_IN_PERCENTAGE; }  ?>'
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
						
												
					   <?php   if($project['amount_get']>0) { 
				   
				   			$total_pie_get=number_format((($project['amount_get']*100)/$project['amount']),2);
							
							$total_pie_percentage=number_format((100-(float)$total_pie_get),2);
							
								if($total_pie_percentage>0)
								{	
									 $total_full_perc=$total_pie_percentage;  
									 $total_remain=$total_pie_get;
									 
									 if($total_remain>0 && $total_remain<1)
									 {
									 	$total_remain=1;
									 }
									 
									 
								?>
								
								
									
									['<?php echo TOTAL_REMAINING; ?>',<?php echo $total_full_perc; ?>   ],
									['<?php echo TOTAL_DONATION; ?>',      <?php echo $total_remain; ?>],
									
								
							<?php
								}
								elseif($total_pie_percentage<0)
								{	
									 $total_full_perc=0;   
									 $total_remain=abs($total_pie_get); 
									 
							?>
							
									['<?php echo TOTAL_GOAL; ?>',0 ],
									['<?php echo TOTAL_DONATION; ?>',      <?php echo $total_remain; ?>],
							
							<?php 
								}
								
							
							}
							
							else
							{
								$total_full_perc=100;
								$total_remain=100;
								
							?>
							
							
							
									['<?php echo TOTAL_GOAL; ?>',<?php echo $total_full_perc;?> ],
									['<?php echo TOTAL_DONATION; ?>',   0],
									
									
							
							<?php
							
							}
							
							  ?>
							
							
							
							
							
							
							
							
							
							
							
						]
						
						
						
					}],
						navigation: {
        buttonOptions: {
            enabled: false
        }
    }	
	
				});
			//});
			
		}
		
				  </script>
		
		<?php  } else { ?>
		
		
		<div class="clear"></div>	
		
		<div style="height:130px;">&nbsp;</div>
		
		<div class="clear"></div>	
		
		
		<?php } ?>		 
			
	</div>
	<!-- left end ------>
		
       </div>
</div>
</div>       