<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>High Clean Admin - Report Client Revenue</title>
<link href="css/style.default.css" rel="stylesheet">
<link href="css/morris.css" rel="stylesheet">
<link href="css/select2.css" rel="stylesheet" />

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
              <li><a href="">Reports</a></li>
              <li>Client Revenue</li>
            </ul>
            <h4>Client Revenue</h4>
          </div>
        </div>
        <!-- media --> 
      </div>
      <div class="contentpanel">
        <div class="row">
          <div class="col-md-12 report_scetion">
            <div class="mb20"></div>
            <div class="panel panel-default">
              <div class="panel-body titlebar"> <span class="glyphicon  glyphicon-th"></span>
                <h2>Client Revenue</h2>
              </div>
            </div>
            <div class="col-md-12 pl0 pr0">
              <div class="table-responsive">
                <table class="table table-bordered mb30 quote_table">
                  <thead>
                    <tr>
                      <th colspan="4" align="right" class="btnright"> <a href="#" class="btn btn-default mr5">Export XLS</a> <a href="#" class="btn btn-default">Export PDF</a> </th>
                    </tr>
                    <tr>
                      <th class="head">Company Name <span class="fa fa-caret-down"></span></th>
                      <th class="head">Contact Name</th>
                      <th class="head">Total Value</th>
                      <th class="head">Year</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Secure Clean</td>
                      <td>Noel Josiane</td>
                      <td>5400.00</td>
                      <td>2013</td>
                    </tr>
                    <tr>
                      <td>Secure Clean</td>
                      <td>Chad Monkhouse</td>
                      <td>1200.00</td>
                      <td>2013</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- table-responsive --> 
            </div>
            <div class="clearfix"></div>
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
</body>
</html>
