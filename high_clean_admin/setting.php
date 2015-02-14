<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>High Clean Admin - Setting</title>
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
              <li>Settings</li>
            </ul>
            <h4>Settings</h4>
          </div>
        </div>
        <!-- media --> 
      </div>
      <div class="contentpanel">
        <div class="row">
          <div class="col-md-12"> 
            <!-- Nav tabs -->
            <!--<ul class="nav nav-tabs">
              <li class="active"><a href="setting.php"><strong>Settings</strong></a></li>
            </ul>-->
            
            <!-- Tab panes -->
          <!--  <div class="tab-content mb30">
              <div class="tab-pane active">-->
                <div class="panel panel-default">
                  <div class="panel-body titlebar"> <span class="fa fa-pencil"></span>
                    <h2>Default</h2>
                  </div>
                </div>
                <div class="col-md-6">
                  <form class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label class="col-sm-5">Currency code</label>
                      <div class="col-sm-7">
                        <input type="text" name="account_name" value="AUD" class="form-control" />
                      </div>
                    </div>
                    <!-- form-group -->
                    
                    <div class="form-group">
                      <label class="col-sm-5">Base url</label>
                      <div class="col-sm-7">
                        <input type="text" name="account_name" value="http://system.highclean.com.au/" class="form-control" />
                      </div>
                    </div>
                    <!-- form-group -->
                    
                    <div class="form-group">
                      <label class="col-sm-5">Using production mode</label>
                      <div class="col-sm-7">
                        <input type="text" name="account_name" value="False" class="form-control" />
                      </div>
                    </div>
                    <!-- form-group -->
                    
                    <div class="form-group">
                      <label class="col-sm-5">Default page size</label>
                      <div class="col-sm-7">
                        <input type="text" name="account_name" value="10" class="form-control" />
                      </div>
                    </div>
                    <!-- form-group -->
                    
                    <div class="form-group">
                      <label class="col-sm-5">Product page size</label>
                      <div class="col-sm-7">
                        <input type="text" name="account_name" value="6" class="form-control" />
                      </div>
                    </div>
                    <!-- form-group -->
                    
                    <div class="form-group">
                      <label class="col-sm-5">Home page product page size</label>
                      <div class="col-sm-7">
                        <input type="text" name="account_name" value="4" class="form-control" />
                      </div>
                    </div>
                    <!-- form-group -->
                    
                    <div class="form-group">
                      <label class="col-sm-5">Home page service page size</label>
                      <div class="col-sm-7">
                        <input type="text" name="account_name" value="4" class="form-control" />
                      </div>
                    </div>
                    <!-- form-group -->
                    
                    <div class="form-group">
                      <label class="col-sm-5">Fortnight Calculating Date</label>
                      <div class="col-sm-7">
                        <input type="text" name="account_name" value="2013-11-25" class="form-control" />
                      </div>
                    </div>
                    <!-- form-group -->
                  </form>
                </div>
                <div class="clearfix"></div>
                <div class="panel panel-default">
                  <div class="panel-body titlebar"> <span class="fa fa-pencil"></span>
                    <h2>Paypal</h2>
                  </div>
                </div>
                <div class="col-md-6">
                  <form class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label class="col-sm-5">Paypal email</label>
                      <div class="col-sm-7">
                        <input type="text" name="account_name" value="paypal_email_1331193757_biz@gmail.com" class="form-control" />
                      </div>
                    </div>
                    <!-- form-group -->
                    
                  </form>
                </div>
                <div class="clearfix"></div>
                <div class="panel panel-default">
                  <div class="panel-body titlebar"> <span class="fa fa-pencil"></span>
                    <h2>Original shipping address</h2>
                  </div>
                </div>
                <div class="col-md-6">
                  <form class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label class="col-sm-5">Original shipping country code</label>
                      <div class="col-sm-7">
                        <input type="text" name="account_name" value="AU" class="form-control" />
                      </div>
                    </div>
                    <!-- form-group -->
                    
                    <div class="form-group">
                      <label class="col-sm-5">Original shipping zip code</label>
                      <div class="col-sm-7">
                        <input type="text" name="account_name" value="4000" class="form-control" />
                      </div>
                    </div>
                    <!-- form-group -->
                    
                    <div class="form-group">
                      <label class="col-sm-5">Original shipping suburb</label>
                      <div class="col-sm-7">
                        <input type="text" name="account_name" value="Brisbane" class="form-control" />
                      </div>
                    </div>
                    <!-- form-group -->
                    
                  </form>
                </div>
                <div class="clearfix"></div>
                <div class="panel panel-default">
                  <div class="panel-body titlebar"> <span class="fa fa-pencil"></span>
                    <h2>Customer support</h2>
                  </div>
                </div>
                <div class="col-md-6">
                  <form class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label class="col-sm-5">Customer support email</label>
                      <div class="col-sm-7">
                        <input type="text" name="account_name" value="info@highclean.com.au" class="form-control" />
                      </div>
                    </div>
                    <!-- form-group -->
                    
                    <div class="form-group">
                      <label class="col-sm-5">Brochure link</label>
                      <div class="col-sm-7">
                        <input type="text" name="account_name" value="http://125.7.122.30/brochure.pdf" class="form-control" />
                      </div>
                    </div>
                    <!-- form-group -->
                  </form>
                </div>
                <div class="clearfix"></div>
                <div class="panel panel-default">
                  <div class="panel-body titlebar"> <span class="fa fa-pencil"></span>
                    <h2>Temando account</h2>
                  </div>
                </div>
                <div class="col-md-6">
                  <form class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label class="col-sm-5">Username</label>
                      <div class="col-sm-7">
                        <input type="text" name="account_name" value="username" class="form-control" />
                      </div>
                    </div>
                    <!-- form-group -->
                    
                    <div class="form-group">
                      <label class="col-sm-5">Password</label>
                      <div class="col-sm-7">
                        <input type="text" name="account_name" value="password" class="form-control" />
                      </div>
                    </div>
                    <!-- form-group -->
                    
                  </form>
                </div>
                <div class="clearfix"></div>
                <div class="panel panel-default">
                  <div class="panel-body titlebar"> <span class="fa fa-pencil"></span>
                    <h2>Credit card account</h2>
                  </div>
                </div>
                <div class="col-md-6">
                  <form class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label class="col-sm-5">Card holder</label>
                      <div class="col-sm-7">
                        <input type="text" name="account_name" value="highclean" class="form-control" />
                      </div>
                    </div>
                    <!-- form-group -->
                    
                    <div class="form-group">
                      <label class="col-sm-5">Card number</label>
                      <div class="col-sm-7">
                        <input type="text" name="account_name" value="4111111111111111" class="form-control" />
                      </div>
                    </div>
                    <!-- form-group -->
                    
                    <div class="form-group">
                      <label class="col-sm-5">Issued month</label>
                      <div class="col-sm-7">
                        <input type="text" name="account_name" value="12" class="form-control" />
                      </div>
                    </div>
                    <!-- form-group -->
                    
                    <div class="form-group">
                      <label class="col-sm-5">Issued year</label>
                      <div class="col-sm-7">
                        <input type="text" name="account_name" value="2012" class="form-control" />
                      </div>
                    </div>
                    <!-- form-group -->
                    
                    <div class="form-group">
                      <label class="col-sm-5">CVV2</label>
                      <div class="col-sm-7">
                        <input type="text" name="account_name" value="987" class="form-control" />
                      </div>
                    </div>
                    <!-- form-group -->
                    
                  </form>
                </div>
                <div class="clearfix"></div>
                <div class="panel panel-default">
                  <div class="panel-body titlebar"> <span class="fa fa-pencil"></span>
                    <h2>eGate account</h2>
                  </div>
                </div>
                <div class="col-md-6">
                  <form class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label class="col-sm-5">eGate Url</label>
                      <div class="col-sm-7">
                        <input type="text" name="account_name" value="https://migs.mastercard.com.au/vpcpay" class="form-control" />
                      </div>
                    </div>
                    <!-- form-group -->
                    
                    <div class="form-group">
                      <label class="col-sm-5">MerchantID</label>
                      <div class="col-sm-7">
                        <input type="text" name="account_name" value="TESTANZIONICSYST" class="form-control" />
                      </div>
                    </div>
                    <!-- form-group -->
                    
                    <div class="form-group">
                      <label class="col-sm-5">Merchant access code</label>
                      <div class="col-sm-7">
                        <input type="text" name="account_name" value="B4C6E6E1" class="form-control" />
                      </div>
                    </div>
                    <!-- form-group -->
                    
                    <div class="form-group">
                      <label class="col-sm-5">Hash</label>
                      <div class="col-sm-7">
                        <input type="text" name="account_name" value="0FC44C7D86E0E53DDAFA137F473826D2" class="form-control" />
                      </div>
                    </div>
                    <!-- form-group -->
                    
                    <div class="form-group">
                      <label class="col-sm-5"></label>
                      <div class="col-sm-7">
                        <button class="btn btn-primary mr5">Save</button>
                      </div>
                    </div>
                    <!-- form-group -->
                    
                  </form>
                </div>
                <div class="clearfix"></div>
              <!--</div>-->
              <!-- tab-pane --> 
              
           <!-- </div>-->
            <!-- tab-content --> 
            
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
