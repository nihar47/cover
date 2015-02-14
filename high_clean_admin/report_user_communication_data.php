<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>High Clean Admin - Report User Communication Data</title>
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
              <li>User Communication Data</li>
            </ul>
            <h4>User Communication Data</h4>
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
                <h2>User Communication Data</h2>
              </div>
            </div>
            <div class="col-md-12 pl0 pr0">
              <div class="table-responsive">
                <table class="table table-bordered mb30 quote_table">
                  <thead>
                    <tr>
                      <th colspan="9" align="right" class="btnright"> <a href="#" class="btn btn-default mr5">Export XLS</a> <a href="#" class="btn btn-default">Export PDF</a> </th>
                    </tr>
                    <tr>
                      <th class="head">Company <span class="fa fa-caret-down"></span></th>
                      <th class="head">Username</th>
                      <th class="head">Email</th>
                      <th class="head">First Name</th>
                      <th class="head">Last Name</th>
                      <th class="head">Postal Address</th>
                      <th class="head">Phone</th>
                      <th class="head">Mobile</th>
                      <th class="head">Client Type</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td></td>
                      <td>admin</td>
                      <td>info@highclean.com.au</td>
                      <td>Super</td>
                      <td>Admin</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>Administrators</td>
                    </tr>
                    <tr>
                      <td>Secure Clean</td>
                      <td>noel.josiane@secureclean.com.au</td>
                      <td>noel.josiane@secureclean.com.au</td>
                      <td>Noel</td>
                      <td>Josiane</td>
                      <td>11 Compark Circuit, Mulgrave, VIC, Australia</td>
                      <td>0385278888</td>
                      <td>0402216871</td>
                      <td>Service_Client</td>
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
