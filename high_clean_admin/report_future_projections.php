<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>High Clean Admin - Report Future Projections</title>
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
              <li>Future Projections</li>
            </ul>
            <h4>Future Projections</h4>
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
                  <div class="panel-body titlebar">
                    <span class="glyphicon  glyphicon-th"></span><h2>Future Projections</h2>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="table-responsive">
                    <table class="table table-bordered mb30 quote_table">
                      <thead>
                        <tr>
                          <th colspan="6" align="right" class="btnright"> <a href="#" class="btn btn-default mr5">Export XLS</a> <a href="#" class="btn btn-default">Export PDF</a> </th>
                        </tr>
                        <tr>
                          <th class="head">Contact <span class="fa fa-caret-down"></span></th>
                          <th class="head">Site</th>
                          <th class="head">Building</th>
                          <th class="head">Price Per Clean</th>
                          <th class="head">Frequency</th>
                          <th class="head">Total Value ex GST</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td colspan="6" class="subheading">Assetlink Company</td>
                        </tr>
                        <tr>
                          <td>Andrew Z</td>
                          <td>High Point Shopping Centre</td>
                          <td>High Point Shopping Centre</td>
                          <td>$68,540.00</td>
                          <td>OneOff</td>
                          <td>$68,540.00</td>
                        </tr>
                        <tr>
                          <td colspan="6" class="subheading">Belgravia Leisure Company</td>
                        </tr>
                        <tr>
                          <td>Tarsh Barry</td>
                          <td>Noble Park Aquatic Centre</td>
                          <td>Noble Park Aquatic Centre</td>
                          <td>$11,125.00</td>
                          <td>OneYear</td>
                          <td>$66,750.00</td>
                        </tr>
                        <tr>
                          <td colspan="6" align="right"><ul class="pagination">
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
