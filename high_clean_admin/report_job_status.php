<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>High Clean Admin - Report Job Status</title>
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
              <li>Job Status</li>
            </ul>
            <h4>Job Status</h4>
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
                  <label class="col-sm-5">Job ID</label>
                  <div class="col-sm-7">
                    <input type="text" name="account_name" value="" class="form-control" />
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
                  <label class="col-sm-5">Contact name</label>
                  <div class="col-sm-7">
                    <input type="text" name="account_name" value="" class="form-control" />
                  </div>
                </div>
                <!-- form-group -->
                
                <div class="form-group">
                  <label class="col-sm-5">Site</label>
                  <div class="col-sm-7">
                    <input type="text" name="account_name" value="" class="form-control" />
                  </div>
                </div>
                <!-- form-group -->
                
                <div class="form-group">
                  <label class="col-sm-5">Building</label>
                  <div class="col-sm-7">
                    <input type="text" name="account_name" value="" class="form-control" />
                  </div>
                </div>
                <!-- form-group -->
                
                <div class="form-group">
                  <label class="col-sm-5">Job status</label>
                  <div class="col-sm-7">
                    <select class="form-control" id="JobStatus" name="JobStatus">
                      <option></option>
                      <option value="NotStarted">NotStarted</option>
                      <option value="Allocated">Allocated</option>
                      <option value="Started">Started</option>
                      <option value="Paused">Paused</option>
                      <option value="Completed">Completed</option>
                    </select>
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
                <h2>Job Status</h2>
              </div>
            </div>
            <div class="col-md-12">
              <div class="table-responsive">
                <table class="table table-bordered mb30 quote_table">
                  <thead>
                    <tr>
                      <th colspan="13" align="right" class="btnright"> <a href="#" class="btn btn-default mr5">Export XLS</a> <a href="#" class="btn btn-default">Export PDF</a> </th>
                    </tr>
                    <tr>
                      <th class="head">Start Date</th>
                      <th class="head">End Date</th>
                      <th class="head">Job ID</th>
                      <th class="head">Service Type</th>
                      <th class="head">Company <span class="fa fa-caret-down"></span></th>
                      <th class="head">Contact name</th>
                      <th class="head">Site</th>
                      <th class="head">Building</th>
                      <th class="head">Job Status</th>
                      <th class="head">Date Quoted</th>
                      <th class="head">Date Completed</th>
                      <th class="head">Sign Off Date</th>
                      <th class="head">Actual Hours</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>2013 - 12 - 02</td>
                      <td>2013 - 12 - 04</td>
                      <td>1111</td>
                      <td>High Clean</td>
                      <td>Secure Clean</td>
                      <td>Noel</td>
                      <td>Bendigo Lansell Square</td>
                      <td>Shopping Center</td>
                      <td>Completed</td>
                      <td>2013 - 12 - 01</td>
                      <td>2013 - 12 - 04</td>
                      <td></td>
                      <td>16.00</td>
                    </tr>
                    <tr>
                      <td>2014 - 03 - 17</td>
                      <td>2014 - 03 - 17</td>
                      <td>1112</td>
                      <td>Pressure Washing</td>
                      <td>Secure Clean</td>
                      <td>Chad</td>
                      <td>DFO Essendon</td>
                      <td>DFO Shopping Center</td>
                      <td>NotStarted</td>
                      <td>2013 - 12 - 02</td>
                      <td></td>
                      <td></td>
                      <td>0.00</td>
                    </tr>
                    <tr>
                      <td colspan="13" align="right"><ul class="pagination">
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
