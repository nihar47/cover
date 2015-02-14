<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>High Clean Admin - Edit Site</title>
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
              <li><a href="">Sites</a></li>
              <li>Edit site</li>
            </ul>
            <h4>Edit site</h4>
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
                <h2>Edit site</h2>
              </div>
            </div>
            <div class="row">
            <div class="col-md-12">
              <div class="col-md-6">
                <form class="form-horizontal" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label class="col-sm-5">Search contact</label>
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
              <div class="col-md-6 mb20">
                <form class="form-horizontal" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label class="col-sm-5">Select contact</label>
                    <div class="col-sm-7">
                      <select data-val="true" data-val-number="The field CompanyId must be a number." data-val-required="The CompanyId field is required." name="CompanyId" class="form-control width300" style="display:none;">
                        <option value="17">Assetlink</option>
                        <option value="22">Belgravia Leisure</option>
                        <option value="12">Ben Corp</option>
                        <option value="19">Birkenhead Point</option>
                        <option value="14">Blue Sappehire</option>
                        <option value="7">Borg</option>
                        <option value="16">Brighten Services</option>
                        <option value="26">Chadstone Shopping Centre</option>
                        <option value="9">Cleanworx</option>
                        <option value="29">CMC Services</option>
                        <option value="31">eDreamz</option>
                        <option value="6">GDP</option>
                        <option value="10">Globe William Intl</option>
                        <option value="11">Kleen Image</option>
                        <option value="15">Lancaster House</option>
                        <option value="18">Laurel Group</option>
                        <option value="5">Mermaid Cleaning</option>
                        <option value="23">Milford Towns Pty Ltd</option>
                        <option value="8">NMIT</option>
                        <option value="27">PACE Development Group</option>
                        <option value="13">Promax</option>
                        <option value="20">RM SiteCare</option>
                        <option value="4">Secure Clean</option>
                        <option value="28">Strata Data</option>
                        <option value="30">TestCompany</option>
                        <option value="25">Transfield Services</option>
                        <option value="24">Trevor Main</option>
                        <option value="21">Westgate Health Club</option>
                      </select>
                    </div>
                  </div>
                  <!-- form-group -->
                  
                  <div class="form-group">
                    <label class="col-sm-5">Site name</label>
                    <div class="col-sm-7">
                      <input type="text" name="account_name" value="10 Jamieson St" class="form-control" />
                    </div>
                  </div>
                  <!-- form-group -->
                  
                  <div class="form-group">
                    <label class="col-sm-5">Site ID/Number</label>
                    <div class="col-sm-7">
                      <input type="text" name="account_name" value="Office Bldg" class="form-control" />
                    </div>
                  </div>
                  <!-- form-group -->
                  
                  <div class="form-group">
                    <label class="col-sm-5">Address</label>
                    <div class="col-sm-7">
                      <input type="text" name="account_name" value="10 Jamieson St" class="form-control" />
                    </div>
                  </div>
                  <!-- form-group -->
                  
                  <div class="form-group">
                    <label class="col-sm-5">Suburb</label>
                    <div class="col-sm-7">
                      <input type="text" name="account_name" value="Cheltenham" class="form-control" />
                    </div>
                  </div>
                  <!-- form-group -->
                  
                  <div class="form-group">
                    <label class="col-sm-5">State</label>
                    <div class="col-sm-7">
                      <input type="text" name="account_name" value="Victoria" class="form-control" />
                    </div>
                  </div>
                  <!-- form-group -->
                  
                  <div class="form-group">
                    <label class="col-sm-5">Postcode</label>
                    <div class="col-sm-7">
                      <input type="text" name="account_name" value="3192" class="form-control" />
                    </div>
                  </div>
                  <!-- form-group -->
                  
                  <div class="form-group">
                    <label class="col-sm-5">Phone</label>
                    <div class="col-sm-7">
                      <input type="text" name="account_name" value="0459559007" class="form-control" />
                    </div>
                  </div>
                  <!-- form-group -->
                  
                  <div class="form-group">
                    <label class="col-sm-5">Mobile</label>
                    <div class="col-sm-7">
                      <input type="text" name="account_name" value="0459559007" class="form-control" />
                    </div>
                  </div>
                  <!-- form-group -->
                  
                  <div class="form-group">
                    <label class="col-sm-5">Email</label>
                    <div class="col-sm-7">
                      <input type="text" name="account_name" value="" class="form-control" />
                    </div>
                  </div>
                  <!-- form-group -->
                  
                  <div class="form-group">
                    <label class="col-sm-5">Site contact</label>
                    <div class="col-sm-7">
                      <input type="text" name="account_name" value="" class="form-control" />
                    </div>
                  </div>
                  <!-- form-group -->
                  
                  <div class="form-group">
                    <label class="col-sm-5">Site comments</label>
                    <div class="col-sm-7">
                      <input type="text" name="account_name" value="John" class="form-control" />
                    </div>
                  </div>
                  <!-- form-group -->
                  
                  <div class="form-group">
                    <label class="col-sm-5">How many building are at this site?</label>
                    <div class="col-sm-7">
                      <input type="text" name="account_name" value="1" class="form-control" />
                    </div>
                  </div>
                  <!-- form-group -->
                  
                  <div class="form-group">
                    <label class="col-sm-5">Does this site need induction?</label>
                    <div class="col-sm-7">
                      <input type="checkbox" name="" value="" />
                    </div>
                  </div>
                  <!-- form-group -->
                  
                  <div class="form-group">
                    <label class="col-sm-5"></label>
                    <div class="col-sm-7">
                      <button class="btn btn-primary">Save</button>
                      or
                      <button class="btn btn-default">Cancel</button>
                    </div>
                  </div>
                  <!-- form-group -->
                </form>
              </div>
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
