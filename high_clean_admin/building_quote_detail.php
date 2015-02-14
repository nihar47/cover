<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>High Clean Admin - Building Detail</title>
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
              <li>Building Quote Detail</li>
            </ul>
            <h4>Building Quote Detail</h4>
          </div>
        </div>
        <!-- media --> 
      </div>
      <div class="contentpanel">
        <div class="row">
          <div class="col-md-12 quote_section">
            <div class="mb20"></div>
            <div class="panel panel-default">
              <div class="panel-body titlebar"> <span class="glyphicon  glyphicon-th"></span>
                <h2>Building detail</h2>
              </div>
            </div>
            <div class="row mb20">
              <div class="col-md-8">
                <dl class="quotedetaildl col-md-12 nopadding">
                  <dt class="col-md-4">Quote No</dt>
                  <dd class="col-md-8">2244</dd>
                  <dt class="col-md-4">Approval status</dt>
                  <dd class="col-md-8">PendingAdminApproval <a href="#" class="ml10">Approve Job</a> </dd>
                  <dt class="col-md-4">Booked status</dt>
                  <dd class="col-md-8">NotBooked</dd>
                  <dt class="col-md-4">Job status</dt>
                  <dd class="col-md-8">NotStarted</dd>
                  <dt class="col-md-4">Payment status</dt>
                  <dd class="col-md-8">No</dd>
                  <dt class="col-md-4">Job sheets</dt>
                  <dd class="col-md-8"><a href="#">Download Jobsheet</a></dd>
                  <dt class="col-md-4">Job details</dt>
                  <dd class="col-md-8"><a href="#">Download Quote</a></dd>
                  <dt class="col-md-4">SWMS documents</dt>
                  <dd class="col-md-8"><a href="#">Download SWMS</a></dd>
                  <dt class="col-md-4">Purchase Order Number</dt>
                  <dd class="col-md-8"><a href="#">Add Purchase Order</a></dd>
                </dl>
              </div>
              <!--<div class="col-md-4 aligncenter">
                <button type="button" class="btn btn-primary mb10">Approve</button>
                <p>(Click here to Approve Job)</p>
              </div>-->
              <div class="col-md-4"> <a href="#">View Details</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#">Edit</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#">Edit Job note</a> </div>
            </div>
            <div class="row mb20">
              <div class="col-md-4 building_subtitle">
                <h2>Photos</h2>
                <a href="#">Upload Photo</a> </div>
              <div class="col-md-4 building_subtitle">
                <h2>Videos</h2>
              </div>
              <div class="col-md-4 building_subtitle">
                <h2>Documents</h2>
                <a href="#">Upload Document</a> </div>
            </div>
            <div class="col-md-12">
              <div class="table-responsive">
                <table class="table table-bordered mb30 quote_table quote_details">
                  <thead>
                    <tr>
                      <th class="head">Description</th>
                      <th class="head">Quantity</th>
                      <th class="head">Rate</th>
                      <th class="head">Amount</th>
                      <th class="head">Addition charges</th>
                      <th class="head">Total</th>
                      <th class="head">Photo</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Dust white sheet section facing the ground</td>
                      <td>1.00</td>
                      <td>650.00</td>
                      <td>650.00</td>
                      <td>0.00</td>
                      <td>650.00</td>
                      <td><a href="#">Upload photo</a></td>
                    </tr>
                    <tr>
                      <td>Discount</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>0.00 %</td>
                      <td></td>
                    </tr>
                    <tr>
                      <td><strong>Total</strong></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>650.00</td>
                      <td></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- table-responsive --> 
            </div>
            <div class="clearfix"></div>
            <div class="panel panel-default">
              <div class="panel-body titlebar"> <span class="glyphicon  glyphicon-th"></span>
                <h2>Supervisor</h2>
              </div>
            </div>
            <div class="col-md-12 pl0">
              <div class="col-md-6 pl0">
                <div class="table-responsive">
                  <table class="table table-bordered mb30 quote_table quote_details">
                    <thead>
                      <tr>
                        <th class="head">First Name</th>
                        <th class="head">Last Name</th>
                        <th class="head">Email</th>
                        <th class="head">Phone</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!-- table-responsive --> 
              </div>
              <div class="col-md-6 nopadding">
                <form class="form-inline">
                  <div class="form-group detailselect">
                    <label>Allocate Supervisor</label>
                  </div>
                  <!-- form-group -->
                  
                  <div class="form-group detailselectbox">
                    <select class="form-control " name="">
                      <option value="1">Select Supervisor</option>
                      <option value="3">Supervisor 1</option>
                      <option value="4">Supervisor 2</option>
                    </select>
                  </div>
                  <!-- form-group --> 
                  
                  <a href="#">Add Supervisor</a>
                </form>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="panel panel-default">
              <div class="panel-body titlebar"> <span class="glyphicon  glyphicon-th"></span>
                <h2>Site Supervisor</h2>
              </div>
            </div>
            <div class="col-md-12 pl0">
              <div class="col-md-6 pl0">
                <div class="table-responsive">
                  <table class="table table-bordered mb30 quote_table quote_details">
                    <thead>
                      <tr>
                        <th class="head">First Name</th>
                        <th class="head">Last Name</th>
                        <th class="head">Email</th>
                        <th class="head">Phone</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!-- table-responsive --> 
              </div>
              <div class="col-md-6 nopadding">
                <form class="form-inline">
                  <div class="form-group detailselect">
                    <label>Allocate Site Supervisor</label>
                  </div>
                  <!-- form-group -->
                  
                  <div class="form-group detailselectbox ">
                    <select class="form-control " name="">
                      <option value="1">Select Site Supervisor</option>
                      <option value="3">Site Supervisor 1</option>
                      <option value="4">Site Supervisor 2</option>
                    </select>
                  </div>
                  <!-- form-group --> 
                  
                  <a href="#">Add Site Supervisor</a>
                </form>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="panel panel-default">
              <div class="panel-body titlebar"> <span class="glyphicon  glyphicon-th"></span>
                <h2>Staff</h2>
              </div>
            </div>
            <div class="col-md-12 pl0">
              <div class="col-md-6 pl0"> <a href="#" class="btn btn-primary mr5">2014-11-05</a> <a href="#" class="btn mr5">2014-11-06</a> <a href="#" class="btn">2014-11-06</a></div>
              <div class="col-md-6 nopadding">
                <form class="form-inline">
                  <div class="form-group detailselect">
                    <label>Allocate Staff</label>
                  </div>
                  <!-- form-group -->
                   
                  <div class="form-group detailselectbox">
                    <select class="form-control" name="">
                      <option value="1">Select Staff</option>
                      <option value="3">Staff 1</option>
                      <option value="4">Staff 2</option>
                    </select>
                  </div>
                  <!-- form-group --> 
                  
                  <a href="#">Add Staff</a>
                </form>
              </div>
            </div>
            <div class="clearfix mb30"></div>
            <div class="col-md-12">
              <div class="table-responsive">
                <table class="table table-bordered mb30 quote_table quote_details">
                  <thead>
                    <tr>
                      <th class="head">Staff name</th>
                      <th class="head">Pick up Van</th>
                      <th class="head">Get to job site</th>
                      <th class="head">Return to office</th>
                      <th class="head">Send SMS</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td colspan="5" align="center"><button type="button" class="btn btn-primary mr5">Submit</button>
                        <button type="button" class="btn btn-default mr5">Back</button>
                        <button type="button" class="btn btn-success">Start Job</button></td>
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
