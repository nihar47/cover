<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>High Clean Admin - Dashboard</title>
<link href="css/style.default.css" rel="stylesheet">
<link href="css/morris.css" rel="stylesheet">
<link href="css/select2.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="js/chart_graph/jquery.jqplot.min.css" />
<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
</head>

<body>
<?PHP include("includes/header.php"); ?>
<section>
  <div class="mainwrapper">
    <?PHP include("includes/left_section.php"); ?>
    <div class="mainpanel">
      <div class="pageheader">
        <div class="media">
          <div class="media-body">
            <ul class="breadcrumb">
              <li><a href="dashboard.php"><i class="glyphicon glyphicon-home"></i></a></li>
              <li>Dashboard</li>
            </ul>
            <h4>Dashboard</h4>
          </div>
        </div>
        <!-- media --> 
      </div>
      <!-- pageheader -->
      
      <div class="contentpanel">
        <div class="row">
          <div class="col-md-12">
            <ul class="widgetlist">
              <li><a class="default" href="calender.php"> <span class="fa  fa-calendar"></span><br>
                Calendars</a></li>
            </ul>
            <div class="row">
              <div class="col-md-6">
                <div class="panel panel-default">
                  <div class="panel-body titlebar"> <span class="glyphicon  glyphicon-th"></span>
                    <h2>Total 10 Customers Service Quotes Approved</h2>
                  </div>
                </div>
                 <div class="cart"> <img src="images/new_dash_map1.jpg" border="0" usemap="#Map"  />
                   <map name="Map">
                     <area shape="rect" coords="55,40,77,201" href="#" alt="Secure Clean" title="Secure Clean">
                     <area shape="rect" coords="86,176,111,201" href="#" alt="Borg" title="Borg">
                     <area shape="rect" coords="119,175,144,200" href="#" alt="GDP" title="GDP">
                     <area shape="rect" coords="153,174,177,198" href="#" alt="NMIT" title="NMIT">
                     <area shape="rect" coords="186,175,206,201" href="#" alt="Promax" title="Promax">
                     <area shape="rect" coords="220,173,244,201" href="#" alt="Group" title="Group">
                     <area shape="rect" coords="252,183,277,203" href="#" alt="Laural" title="Laural">
                     <area shape="rect" coords="287,187,311,201" href="#" alt="Globe" title="Globe">
                     <area shape="rect" coords="321,187,346,201" href="#" alt="William" title="William">
                     <area shape="rect" coords="356,188,378,201" href="#" alt="Leisure" title="Leisure">
                   </map>
                </div>
                <!--<div id="chart1" class="flotChart"></div>-->
              </div>
              <div class="col-md-6">
                <div class="panel panel-default">
                  <div class="panel-body titlebar"> <span class="glyphicon  glyphicon-th"></span>
                    <h2>Future Projection for Next 6 Months</h2>
                  </div>
                </div>
               <div class="cart"> <img src="images/dash_map2.jpg" /> </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-6">
                <div class="panel panel-default">
                  <div class="panel-body titlebar"> <span class="glyphicon  glyphicon-th"></span>
                    <h2>Top 5 Services for Last 3 Months</h2>
                  </div>
                </div>
                <div class="cart"> <img src="images/dash_map3.jpg" /> </div>
              </div>
              <div class="col-md-6">
                <div class="panel panel-default">
                  <div class="panel-body titlebar"> <span class="glyphicon  glyphicon-th"></span>
                    <h2>Project Status Graph</h2>
                  </div>
                </div>
               <div class="cart"> <img src="images/dash_map4.jpg" /> </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
      <!-- contentpanel -->
      
      <?PHP include("includes/footer.php"); ?>
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
<script class="code" type="text/javascript">
$(document).ready(function(){
  var line1 = [['Secure Clean ', 25], ['Borg', 4], ['GDP', 4], 
  ['NMIT', 4], [' Mermaid Cleaning', 4], 
  ['Laurel Group', 4], ['Birkenhead Point', 3], ['Belgravia Leisure', 2], ['Globe William Intl ', 2], ['Promax', 2]];

  var plot1 = $.jqplot('chart1', [line1], {
    //title: 'Concern vs. Occurrance',
    series:[{renderer:$.jqplot.BarRenderer}],
    axesDefaults: {
        tickRenderer: $.jqplot.CanvasAxisTickRenderer ,
        tickOptions: {
          angle: -30,
          fontSize: '12px',
		  fontFamily: 'arial'		 
		  
        }
    },
    axes: {
      xaxis: {
        renderer: $.jqplot.CategoryAxisRenderer
      }
    }
  });
  
   $(window).resize(function() {
          plot1.replot( { resetAxes: true } );
    });
  
});
</script> 
<script type="text/javascript" src="js/chart_graph/jquery.jqplot.min.js"></script> 
<script type="text/javascript" src="js/chart_graph/jqplot.canvasTextRenderer.min.js"></script> 
<script type="text/javascript" src="js/chart_graph/jqplot.canvasAxisTickRenderer.min.js"></script> 
<script type="text/javascript" src="js/chart_graph/jqplot.categoryAxisRenderer.min.js"></script> 
<script type="text/javascript" src="js/chart_graph/jqplot.barRenderer.min.js"></script>
</body>
</html>
