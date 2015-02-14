   
<link href='<?php echo Yii::app()->getBaseUrl(true); ?>/css/calendar/css/fullcalendar.css' rel='stylesheet' />
<link href='<?php echo Yii::app()->getBaseUrl(true); ?>/css/calendar/css/fullcalendar.print.css' rel='stylesheet' media='print' />

<div class="pageheader">
        <div class="media">
          <div class="media-body">
            <ul class="breadcrumb">
              <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/?r=Dashboard"><i class="glyphicon glyphicon-home"></i></a></li>
              <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/?r=Calendar/default/index" >Quotes</a></li>
              <li>Calender</li>
            </ul>
            <h4>Calender</h4>
          </div>
        </div>
        <!-- media --> 
      </div> 

			  


<div class="contentpanel">
        <div class="row">
          <div class="col-md-12 quote_section"> 
           
                <div class="mb20"></div>
                <div class="row">
                  <div class="col-md-12 mb20">
	<a href="<?php echo Yii::app()->getBaseUrl(true).'?r=Calendar/default/index&approval_status='.urlencode('Pending Admin Approval'); ?>" ><button class="btn small_btn btn-danger mr5">Not Approved</button></a>
	<a href="<?php echo Yii::app()->getBaseUrl(true).'?r=Calendar/default/index&approval_status='.urlencode('Approved By Admin'); ?>" ><button class="btn small_btn btn-primary mr5">Approved</button></a>
	<a href="<?php echo Yii::app()->getBaseUrl(true).'?r=Calendar/default/index&job_status='.urlencode('Started'); ?>" ><button class="btn btn-success small_btn mr5">Started</button></a>
	<a href="<?php echo Yii::app()->getBaseUrl(true).'?r=Calendar/default/index&job_status='.urlencode('Paused'); ?>" ><button class="btn small_btn mr5 yellowcolor">Paused</button></a>
	<a href="<?php echo Yii::app()->getBaseUrl(true).'?r=Calendar/default/index&job_status='.urlencode('Completed'); ?>" ><button class="btn small_btn mr5 blackbgcolor">Completed</button></a>
                  </div>
                </div>
                <div class="row" style="text-align:center;">
                  <div class="col-md-12">
				  
                 <?php if($approval_status == 'Approved By Admin' ) echo '<h2  class="btn-primary">Approved Booked Value : $'.$approved_booked_value.'</h2>' ; ?> 
				 
				 <?php if($approval_status == 'Pending Admin Approval' ) echo '<h2  class="btn-danger">Not Approved Booked Value : $'.$not_approved_booked_value.'</h2>' ; ?> 
				   
                  </div>
                  
                </div>     
				<div class="row">
                  <div class="col-md-12">
                    <div id="calendar"></div>
                  </div>
                  
                </div>
                <!-- row -->
                
                <div class="clearfix"></div>
             
            
          </div>
        </div>
</div>
      <!-- contentpanel -->
           
<?php 
//echo '<pre>'; print_r(json_decode($calender_events)); echo '</pre>'; 
//$js_array = $calender_events;
?>

<script>

	$(document).ready(function() {

	var job_events = JSON.parse('<?php echo $calender_events; ?>');
	var ajax_url = '<?php echo Yii::app()->getBaseUrl(true).'?r=Calendar/default/DragJob'; ?>';
	//console.log(job_events);
		$('#calendar').fullCalendar({
			
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,basicWeek,basicDay',
				
			},
			firstDay:1,
			eventDrop: function(event, delta, minuteDelta, allDay, revertFunc) {

		var move_date = event.start.format();
		//alert(move_date);
//		alert(event.id + " was dropped on " + event.start.format());		
			
        if (!confirm("Are you sure about this change?")) {
            revertFunc();
        }
    	$.ajax({
					url: ajax_url,
					type: "GET",
					//dataType: "json",				
					data: 'id='+event.id+'&move_date='+move_date,				
					
					success: function(data, textStatus) {
					
					  if (!data)
					  {
					   // revertFunc();
						return;
					  }
					 // calendar.fullCalendar('updateEvent', event);
					},
					error: function() {
					  //revertFunc();
					}
			});
		
		
		
		

    },
			
			defaultDate: '<?php echo date('Y-m-d'); ?>',
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			events: job_events,
			
		});
		

		
		

		
	});

</script> 
