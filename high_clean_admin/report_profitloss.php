<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>High Clean Admin - Report Profit and Loss</title>
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
              <li>Profit &amp; Loss</li>
            </ul>
            <h4>Profit &amp; Loss</h4>
          </div>
        </div>
        <!-- media --> 
      </div>
      <div class="contentpanel">
        <div class="row">
          <div class="col-md-12 report_scetion">
            <div class="mb20"></div>
            <div class="col-md-6">
              <form class="form-horizontal" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label class="col-sm-5">Service type</label>
                  <div class="col-sm-7">
                    <select name="Category" class="form-control">
                      <option value="1">Window Cleaning</option>
                      <option value="3">High Level Dusting</option>
                      <option value="4">Pressure Washing</option>
                      <option value="5">Facade Washing</option>
                      <option value="7">Deep Clean</option>
                      <option value="8">Gutter Cleaning</option>
                      <option value="6">High Clean</option>
                      <option value="9">Maintenance Clean </option>
                      <option value="10">General Clean</option>
                    </select>
                  </div>
                </div>
                <!-- form-group -->
                
                <div class="form-group">
                  <label class="col-sm-5">Company</label>
                  <div class="col-sm-7">
                    <input type="text" name="account_name" value="" class="form-control" />
                  </div>
                </div>
                <!-- form-group -->
                
                <div class="form-group">
                  <label class="col-sm-5">Start date</label>
                  <div class="col-sm-7">
                    <input type="text" name="account_name" value="" class="form-control" />
                  </div>
                </div>
                <!-- form-group -->
                
                <div class="form-group">
                  <label class="col-sm-5">End date</label>
                  <div class="col-sm-7">
                    <input type="text" name="account_name" value="" class="form-control" />
                  </div>
                </div>
                <!-- form-group -->
                
                <div class="form-group">
                  <label class="col-sm-5"></label>
                  <div class="col-sm-7">
                    <button class="btn btn-primary">Generate</button>
                  </div>
                </div>
                <!-- form-group -->
              </form>
            </div>
            <div class="clearfix"></div>
            <div class="panel panel-default">
              <div class="panel-body titlebar"> <span class="glyphicon  glyphicon-th"></span>
                <h2>Job Payment</h2>
              </div>
            </div>
            <div class="col-md-12">
              <div class="table-responsive">
                <table class="table table-bordered mb30 quote_table">
                  <thead>
                    <tr>
                      <th colspan="9" align="right" class="btnright"> <a href="#" class="btn btn-default mr5">Export XLS</a> <a href="#" class="btn btn-default">Export PDF</a> </th>
                    </tr>
                    <tr>
                      <th class="head">Date Completed</th>
                      <th class="head">Company <span class="fa fa-caret-down"></span></th>
                      <th class="head">Contact Name</th>
                      <th class="head">Site</th>
                      <th class="head">Building</th>
                      <th class="head">Quote Amount</th>
                      <th class="head">Est Profit</th>
                      <th class="head">Actual Profit</th>
                      <th class="head">Diff. in Profit</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>2013 - 12 - 04</td>
                      <td>Secure Clean</td>
                      <td>Noel</td>
                      <td>Bendigo Lansell Square</td>
                      <td>Shopping Center</td>
                      <td>5400.00</td>
                      <td>0.00</td>
                      <td>5000.00</td>
                      <td>5000.00</td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>Secure Clean</td>
                      <td>Chad</td>
                      <td>DFO Essendon</td>
                      <td>DFO Shopping Center</td>
                      <td>1200.00</td>
                      <td>0.00</td>
                      <td>325.00</td>
                      <td>325.00</td>
                    </tr>
                    <tr>
                      <td colspan="9" align="right"><ul class="pagination">
                          <li class="disabled"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                          <li><a href="#">1</a></li>
                          <li class="active"><a href="#">2</a></li>
                          <li><a href="#">3</a></li>
                          <li><a href="#">4</a></li>
                          <li><a href="#">5</a></li>
                          <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                        </ul></td>
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
