<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>High Clean Admin - Quotes</title>
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
              <li><a href="">Quotes</a></li>
              <li>Quote Detail</li>
            </ul>
            <h4>Quote Detail</h4>
          </div>
        </div>
        <!-- media --> 
      </div>
      <div class="contentpanel">
        <div class="row">
          <div class="col-md-12 quote_section"> 
           
                <div class="mb20"></div>
                <div class="panel panel-default">
                  <div class="panel-body titlebar">
                    <span class="glyphicon  glyphicon-th"></span><h2>Quote Detail</h2>
                  </div>
                </div>
                <dl class="quotedetaildl col-md-6">
                  <dt class="col-md-4">Quote Date</dt>
                  <dd class="col-md-6">2014-10-28</dd>
                  <dt class="col-md-4">Contact Name</dt>
                  <dd class="col-md-6">Monkhouse Chad</dd>
                  <dt class="col-md-4">Service Req</dt>
                  <dd class="col-md-6">High Level Dusting</dd>
                  <dt class="col-md-4">Site</dt>
                  <dd class="col-md-6">Southland Shopping Centre</dd>
                </dl>
                <div class="col-md-12">
                  <div class="table-responsive">
                    <table class="table table-bordered mb30 quote_table quote_details">
                      <thead>
                        <tr>
                          <th class="head">Start date</th>
                          <th class="head">Building <span class="fa fa-caret-down"></span></th>
                          <th class="head">Quote amount</th>
                          <th class="head">Approval status</th>
                          <th class="head">Booked status</th>
                          <th class="head">Job status</th>
                          <th class="head">Paid</th>
                          <th class="head">Signed Off</th>
                          <th class="head">Task</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>2014-10-29</td>
                          <td>Level 2 Cinema White Roof Sheets</td>
                          <td>$650.00</td>
                          <td>ApprovedByAdmin</td>
                          <td>Booked</td>
                          <td>NotStarted</td>
                          <td>No</td>
                          <td>No</td>
                          <td><div class="btn-group mar0">
                              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> Action <span class="caret"></span> </button>
                              <ul class="dropdown-menu pull-right" role="menu">
                                <li><a href="building_quote_detail.php">View detail</a></li>
                                <li><a href="edit_staff_note.php">Edit staff note</a></li>
                                <li><a href="allocate_supervisor.php">Allocate supervisor</a></li>
                                <li><a href="book_quote.php">Book/Re-Book a Job</a></li>
                                <li><a href="assign_staffs.php">Allocate staff</a></li>
                                <li><a href="decline_quote_detail.php">Decline quote</a></li>
                                <li><a href="cancel_quote.php">Cancel quote</a></li>
                                <li><a href="#" target="_blank">Download Jobsheet</a></li>
                                <li><a href="#" target="_blank">Download SWMS</a></li>
                                <li><a href="#" target="_blank">Download Quote</a></li>
                                <li><a href="delete_quote.php">Delete quote</a></li>
                              </ul>
                            </div></td>
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
<script src="js/flot/jquery.flot.min.js"></script> 
<script src="js/flot/jquery.flot.resize.min.js"></script> 
<script src="js/flot/jquery.flot.spline.min.js"></script> 
<script src="js/jquery.sparkline.min.js"></script> 
<script src="js/morris.min.js"></script> 
<script src="js/raphael-2.1.0.min.js"></script> 
<script src="js/bootstrap-wizard.min.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/custom.js"></script> 
<script src="js/dashboard.js"></script>
</body>
</html>
