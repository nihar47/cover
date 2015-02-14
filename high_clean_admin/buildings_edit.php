<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>High Clean Admin - Quotes Building</title>
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
              <li><a href="">Buildings</a></li>
              <li>Create new Building</li>
            </ul>
            <h4>Create new Building</h4>
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
                <h2>Create new building</h2>
              </div>
            </div>
            <div class="row">
            	<div class="col-md-12">
              <div class="col-md-5 mb20">
                <form class="form-horizontal" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label class="col-sm-5">Search site</label>
                    <div class="col-sm-7">
                      <input type="text" name="account_name" value="" class="form-control" />
                    </div>
                  </div>
                  <!-- form-group -->
                  <div class="form-group">
                   <label class="col-sm-5">&nbsp;</label>
                    <div class="col-sm-7">
                      <button class="btn btn-primary">Search</button>
                    </div>
                  </div>
                  <!-- form-group -->
                </form>
              </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <form class="form-horizontal" method="post">
                  <div class="col-md-5 mr100">
                    <div class="form-group">
                      <label class="col-sm-5">Select site</label>
                      <div class="col-sm-7">
                        <ul class="SelectList" style="display:none;">
                          <li>
                            <label>10 Jamieson St</label>
                            <input type="checkbox" name="" value="">
                          </li>
                        </ul>
                      </div>
                    </div>
                    <!-- form-group -->
                    
                    <div class="form-group">
                      <label class="col-sm-5">Building name</label>
                      <div class="col-sm-7">
                        <input type="text" name="account_name" value="" class="form-control" />
                      </div>
                    </div>
                    <!-- form-group -->
                    
                    <div class="form-group">
                      <label class="col-sm-5">Building ID/No</label>
                      <div class="col-sm-7">
                        <input type="text" name="account_name" value="" class="form-control" />
                      </div>
                    </div>
                    <!-- form-group -->
                    
                    <div class="form-group">
                      <label class="col-sm-5">Building type</label>
                      <div class="col-sm-7">
                        <select  name="BuildingType" class="form-control">
                          <option value="1">Apartment Block</option>
                          <option value="2">Aged Care</option>
                          <option value="3">Commercial Office</option>
                          <option value="4">Industrial Warehouse</option>
                          <option value="5">House</option>
                          <option value="6">School</option>
                          <option value="7">University Building</option>
                          <option value="8">Hospital</option>
                          <option value="9">Other</option>
                          <option value="10">Shopping Center</option>
                          <option value="16">Supermarket</option>
                        </select>
                      </div>
                    </div>
                    <!-- form-group -->
                    
                    <div class="form-group">
                      <label class="col-sm-5">Is water source available on location?</label>
                      <div class="col-sm-7">
                        <input type="checkbox" name="" value=""  />
                      </div>
                    </div>
                    <!-- form-group --> 
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">
                      <label class="col-sm-5">Dist. from Office</label>
                      <div class="col-sm-7">
                        <input type="text" name="account_name" value="" class="form-control" />
                      </div>
                    </div>
                    <!-- form-group -->
                    
                    <div class="form-group">
                      <label class="col-sm-5">No. of Floors</label>
                      <div class="col-sm-7">
                        <input type="text" name="account_name" value="" class="form-control" />
                      </div>
                    </div>
                    <!-- form-group -->
                    
                    <div class="form-group">
                      <label class="col-sm-5">Size of building</label>
                      <div class="col-sm-7">
                        <input type="text" name="account_name" value="" class="form-control" />
                      </div>
                    </div>
                    <!-- form-group -->
                    
                    <div class="form-group">
                      <label class="col-sm-5">Height of building</label>
                      <div class="col-sm-7">
                        <input type="text" name="account_name" value="" class="form-control" />
                      </div>
                    </div>
                    <!-- form-group -->
                    
                    <div class="form-group">
                      <label class="col-sm-5">Job notes</label>
                      <div class="col-sm-7">
                        <textarea cols="4" rows="3" name="note" class="form-control"></textarea>
                      </div>
                    </div>
                    <!-- form-group --> 
                    
                  </div>
                  <div class="form-group">
                    <div class="col-sm-12" align="center">
                      <button class="btn btn-primary mr5">Save</button>
                      <button class="btn btn-primary">Save and create new quote</button>
                      &nbsp;&nbsp;or&nbsp;&nbsp;
                      <button class="btn btn-default">Cancel</button>
                    </div>
                  </div>
                  <!-- form-group -->
                  
                </form>
              </div>
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
