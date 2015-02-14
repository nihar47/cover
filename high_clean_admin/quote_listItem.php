<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>High Clean Admin - Quote ListItems</title>
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
              <li>ListItems</li>
            </ul>
            <h4>ListItems</h4>
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
                    <span class="glyphicon  glyphicon-th"></span><h2>List Items Management</h2>
                  </div>
                </div>
                <div class="col-md-6">
                  <form class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label class="col-sm-3">Select type</label>
                      <div class="col-sm-7">
                        <select id="select-search-hide" data-placeholder="Choose One" class="form-control width300">
                          <option value="BuildingType">Building type</option>
                          <option value="GlassType">Glass type</option>
                          <option value="QualityType">Quality type</option>
                          <option value="AccessType">Access type</option>
                          <option value="ServiceType">Service type</option>
                          <option value="SideType">Side type</option>
                          <option value="ToolsType">Tools type</option>
                          <option value="EquipmentType">Equipment type</option>
                          <option value="DisplayForClient">Display for client</option>
                          <option value="PaneSizeType">Pane size type</option>
                        </select>
                      </div>
                    </div>
                    <!-- form-group -->
                    
                  </form>
                </div>
                <div class="clearfix"></div>
                <div class="panel panel-default">
                  <div class="panel-body titlebar">
                    <span class="glyphicon  glyphicon-th"></span><h2>Building Type Management</h2>
                  </div>
                </div>
                <div class="col-md-10 mb20">
                  <form class="form-inline" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label class="col-sm-5">Select type</label>
                      <div class="col-sm-7">
                        <input type="text" name="account_name" value="" class="form-control" />
                      </div>
                    </div>
                    <!-- form-group -->
                    
                    <div class="form-group">
                      <div class="col-sm-2">
                        <button class="btn btn-primary mr5">Add</button>
                      </div>
                    </div>
                    <!-- form-group -->
                  </form>
                </div>
                <div class="col-md-12">
                  <div class="table-responsive">
                    <table class="table table-bordered mb30 quote_table">
                      <thead>
                        <tr>
                          <th class="head">Name <span class="fa fa-caret-down"></span></th>
                          <th class="head">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Apartment Block</td>
                          <td align="center"><a href="#"><span>Edit</span></a> &nbsp;|&nbsp; <a href="#"><span>Remove</span></a></td>
                        </tr>
                        <tr>
                          <td>Aged Care</td>
                          <td align="center"><a href="#"><span>Edit</span></a> &nbsp;|&nbsp; <a href="#"><span>Remove</span></a></td>
                        </tr>
                        <tr>
                          <td>Commercial Office</td>
                          <td align="center"><a href="#"><span>Edit</span></a> &nbsp;|&nbsp; <a href="#"><span>Remove</span></a></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <!-- table-responsive --> 
                </div>
                
                <div class="col-md-12" id="accesstypemagt">
                	<div class="panel panel-default">
                  <div class="panel-body titlebar">
                    <span class="glyphicon  glyphicon-th"></span><h2>AccessType Management</h2>
                  </div>
                </div>
                
                <div class="col-md-10 mb20">
                  <form class="form-inline" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label class="col-sm-5">Name</label>
                      <div class="col-sm-7">
                        <input type="text" name="account_name" value="" class="form-control" />
                      </div>
                    </div>
                    <!-- form-group -->
                    
                    <div class="form-group">
                      <div class="col-sm-2">
                        <button class="btn btn-primary mr5">Add</button>
                      </div>
                    </div>
                    <!-- form-group -->
                  </form>
                </div>
                
                <div class="col-md-6">
                  <form class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label class="col-sm-3">Time per quantity</label>
                      <div class="col-sm-7">
                        <input type="text" name="account_name" value="" class="form-control" />
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-3">Setup time</label>
                      <div class="col-sm-7">
                        <input type="text" name="account_name" value="" class="form-control" />
                      </div>
                    </div>
                    <!-- form-group -->
                    
                  </form>
                </div>
                <div class="col-md-12">
                  <div class="table-responsive">
                    <table class="table table-bordered mb30 quote_table">
                      <thead>
                        <tr>
                          <th class="head">Name</th>
                          <th class="head">Time per Quantity</th>
                          <th class="head">Setup time</th>
                          <th class="head">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td align="center"></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <!-- table-responsive --> 
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
