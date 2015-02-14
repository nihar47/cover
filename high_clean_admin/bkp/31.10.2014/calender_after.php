<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>High Clean Admin - Calender</title>
<link href="css/style.default.css" rel="stylesheet">
<link href="css/morris.css" rel="stylesheet">
<link href="css/select2.css" rel="stylesheet" />
<link rel="stylesheet" href="css/jquery.mobile-1.2.0.min.css" />

<!--<link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css" />-->
<link rel='stylesheet' type='text/css' href='http://arshaw.com/js/fullcalendar-1.5.4/fullcalendar/fullcalendar.css' />



<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
</head>

<body>
<div data-role="page" id="index"> </div>
<?PHP include("includes/header.php"); ?>
<section>
  <div class="mainwrapper">
    <?PHP include("includes/left_section.php"); ?>
    <div class="mainpanel">
      <div class="contentpanel">
        <div class="row">
          <div class="col-md-12"> 
            <!-- Nav tabs --> 
            <ul class="nav nav-tabs">
              <li class="active"><a href="quote_summary.php"><strong>Quotes</strong></a></li>
              <li><a href="company_quotes.php"><strong>Companies</strong></a></li>
              <li><a href="quote_contact.php"><strong>Contacts</strong></a></li>
              <li><a href="quote_sites.php"><strong>Sites</strong></a></li>
              <li><a href="quote_buildings.php"><strong>Buildings</strong></a></li>
              <li><a href="quote_listItem.php"><strong>ListItems</strong></a></li>
            </ul>
            
            <!-- Tab panes -->
            <div class="tab-content mb30">
              <div class="tab-pane active" id="home">
                <div class="mb20"></div>
                <div class="row">
                  <div class="col-md-12 mb20"><button class="btn btn-primary mr5">Not Approved</button> <button class="btn btn-primary mr5">Approved</button> <button class="btn btn-primary mr5">Started</button> <button class="btn btn-primary mr5">Completed</button></div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div id="calendar"></div>
                  </div>
                  <!-- col-md-9 --> 
                </div>
                <div class="clearfix"></div>
              </div>
              <!-- tab-pane --> 
              
            </div>
            <!-- tab-content --> 
            
          </div>
        </div>
      </div>
      <!-- contentpanel --> 
      
    </div>
    <!-- mainpanel --> 
  </div>
  <!-- mainwrapper --> 
</section>

<script src="js/jquery-1.11.1.min.js"></script> 
<script src="js/jquery-migrate-1.2.1.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/modernizr.min.js"></script> 
<script src="js/pace.min.js"></script> 
<script src="js/retina.min.js"></script> 
<script src="js/jquery.cookies.js"></script> 
<script src="js/custom.js"></script>

<script src="js/jquery.mobile-1.2.0.min.js"></script>
<!--<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
<script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>-->
<script type='text/javascript' src='http://arshaw.com/js/fullcalendar-1.5.4/fullcalendar/fullcalendar.min.js'></script>
<script>
         jQuery(document).on('pageshow','#index',function(e,data){    
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();
    
        $('#calendar').fullCalendar({
            editable: true,
            events: [
                {
                    title: 'All Day Event',
                    start: new Date(y, m, 1)
                },
                {
                    title: 'Long Event',
                    start: new Date(y, m, d-5),
                    end: new Date(y, m, d-2)
                },
                {
                    id: 999,
                    title: 'Repeating Event',
                    start: new Date(y, m, d-3, 16, 0),
                    allDay: false
                },
                {
                    id: 999,
                    title: 'Repeating Event',
                    start: new Date(y, m, d+4, 16, 0),
                    allDay: false
                },
                {
                    title: 'Meeting',
                    start: new Date(y, m, d, 10, 30),
                    allDay: false
                },
                {
                    title: 'Lunch',
                    start: new Date(y, m, d, 12, 0),
                    end: new Date(y, m, d, 14, 0),
                    allDay: false
                },
                {
                    title: 'Birthday Party',
                    start: new Date(y, m, d+1, 19, 0),
                    end: new Date(y, m, d+1, 22, 30),
                    allDay: false
                },
                {
                    title: 'Click for Google',
                    start: new Date(y, m, 28),
                    end: new Date(y, m, 29),
                    url: 'http://google.com/'
                }
            ]
        });
    });
          </script>
</body>
</html>
