<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>High Clean Admin - Quotes Company</title>
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
              <li>Companies</li>
            </ul>
            <h4>Companies</h4>
          </div>
        </div>
        <!-- media --> 
      </div>
      <div class="contentpanel">
        <div class="row">
          <div class="col-md-12 quote_section">
            <div class="mb20"></div>
            <div class="col-md-8">
              <form class="form-horizontal" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label class="col-sm-5">Enter some keywords to search company</label>
                  <div class="col-sm-6">
                    <input type="text" name="account_name" value="" class="form-control" />
                  </div>
                </div>
                <!-- form-group -->
                
                <div class="form-group">
                  <label class="col-sm-5"></label>
                  <div class="col-sm-6">
                    <button class="btn btn-primary mr5">Search</button>
                  </div>
                </div>
                <!-- form-group -->
              </form>
            </div>
            <div class="clearfix"></div>
            <div class="panel panel-default">
              <div class="panel-body titlebar"> <span class="glyphicon  glyphicon-th"></span>
                <h2>Companies Management</h2>
              </div>
            </div>
            <div class="col-md-12">
              <div class="table-responsive">
                <table class="table table-bordered mb30 quote_table">
                  <thead>
                    <tr>
                      <th colspan="8" align="right" class="btnright"> <a href="company_edit.php" class="btn btn-default">Create new company</a> </th>
                    </tr>
                    <tr>
                      <th class="head">Name <span class="fa fa-caret-down"></span></th>
                      <th class="head">ABN</th>
                      <th class="head">Phone</th>
                      <th class="head">Mobile</th>
                      <th class="head">Fax</th>
                      <th class="head">Email</th>
                      <th class="head">Website</th>
                      <th class="head">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Assetlink</td>
                      <td></td>
                      <td>02 9857 7100</td>
                      <td></td>
                      <td>02 98775 888</td>
                      <td>mail@assetlink.com.au</td>
                      <td>http://www.assetlink.com.au</td>
                      <td align="center"><a href="select_service.php"><span>Create quote</span></a> &nbsp;|&nbsp; <a href="contact_edit.php"><span>Add contact</span></a> &nbsp;|&nbsp; <a href="company_contact.php"><span>View contacts</span></a> &nbsp;|&nbsp; <a href="company_view.php"><span>View</span></a> &nbsp;|&nbsp; <a href="company_detail_edit.php"><span>Edit</span></a> &nbsp;|&nbsp; <a href="company_delete.php"><span>Delete</span></a></td>
                    </tr>
                    <tr>
                      <td>Brighten Services</td>
                      <td>51163846811</td>
                      <td>0395704849</td>
                      <td>0421086522</td>
                      <td>395704787</td>
                      <td>info@brightenserv.com.au</td>
                      <td>www.brightenserv.com.au</td>
                      <td align="center"><a href="select_service.php"><span>Create quote</span></a> &nbsp;|&nbsp; <a href="contact_edit.php"><span>Add contact</span></a> &nbsp;|&nbsp; <a href="company_contact.php"><span>View contacts</span></a> &nbsp;|&nbsp; <a href="company_view.php"><span>View</span></a> &nbsp;|&nbsp; <a href="company_detail_edit.php"><span>Edit</span></a> &nbsp;|&nbsp; <a href="company_delete.php"><span>Delete</span></a></td>
                    </tr>
                    <tr>
                      <td colspan="8" align="right"><ul class="pagination">
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
