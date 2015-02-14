<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Chain Responsive Bootstrap3 Admin</title>

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
        
        <header>
            <div class="headerwrapper">
                <div class="header-left">
                    <a href="index.html" class="logo">
                        <!--<img src="images/logo.png" alt="" /> -->High Clean
                    </a>
                    <div class="pull-right">
                        <a href="" class="menu-collapse">
                            <i class="fa fa-bars"></i>
                        </a>
                    </div>
                </div><!-- header-left -->
                
                <div class="header-right">
                    
                    <div class="pull-right">
                        
                        <div class="btn-group btn-group-option">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                              <i class="fa fa-caret-down"></i>
                            </button>
                            <ul class="dropdown-menu pull-right" role="menu">
                              <li><a href="#"><i class="glyphicon glyphicon-user"></i> My Profile</a></li>
                              <!--<li><a href="#"><i class="glyphicon glyphicon-star"></i> Activity Log</a></li>
                              <li><a href="#"><i class="glyphicon glyphicon-cog"></i> Account Settings</a></li>
                              <li><a href="#"><i class="glyphicon glyphicon-question-sign"></i> Help</a></li>-->
                              <li class="divider"></li>
                              <li><a href="#"><i class="glyphicon glyphicon-log-out"></i>Sign Out</a></li>
                            </ul>
                        </div><!-- btn-group -->
                        
                    </div><!-- pull-right -->
                    
                </div><!-- header-right -->
                
            </div><!-- headerwrapper -->
        </header>
        
        <section>
            <div class="mainwrapper">
                <div class="leftpanel">
                    <!--<div class="media profile-left">
                        <a class="pull-left profile-thumb" href="profile.html">
                            <img class="img-circle" src="images/photos/profile.png" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">Elen Adarna</h4>
                            <small class="text-muted">Beach Lover</small>
                        </div>
                    </div>--><!-- media -->
                    
                    <h5 class="leftpanel-title">Navigation</h5>
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a href="index.html"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
                        <li><a href="maps.html"><i class="fa fa-shopping-cart"></i> <span>Quotes</span></a></li>
                        <li><a href="maps.html"><i class="fa fa-user"></i> <span>Users</span></a></li>
                        <li><a href="maps.html"><i class="fa  fa-bar-chart-o"></i> <span>Reports</span></a></li>
                        <li><a href="maps.html"><i class="fa fa-sun-o"></i> <span>Settings</span></a></li>
                        
                        
                    </ul>
                    
                </div><!-- leftpanel -->
                
                <div class="mainpanel">
                    <!--<div class="pageheader">
                        <div class="media">
                            <div class="pageicon pull-left">
                                <i class="fa fa-home"></i>
                            </div>
                            <div class="media-body">
                                <ul class="breadcrumb">
                                    <li><a href=""><i class="glyphicon glyphicon-home"></i></a></li>
                                    <li>Dashboard</li>
                                </ul>
                                <h4>Dashboard</h4>
                            </div>
                        </div>
                    </div>--><!-- pageheader -->
                    
                    <div class="contentpanel">
                    	<div class="row">
                            <div class="col-md-12">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#home" data-toggle="tab"><strong>Home</strong></a></li>
                                    <li><a href="#profile" data-toggle="tab"><strong>Profile</strong></a></li>
                                    <li><a href="#about" data-toggle="tab"><strong>About</strong></a></li>
                                    <li><a href="#contact" data-toggle="tab"><strong>Contact</strong></a></li>
                                    <li><a href="#profile" data-toggle="tab"><strong>Profile</strong></a></li>
                                    <li><a href="#about" data-toggle="tab"><strong>About</strong></a></li>
                                    <li><a href="#contact" data-toggle="tab"><strong>Contact</strong></a></li>
                                </ul>
        
                                <!-- Tab panes -->
                                <div class="tab-content mb30">
                                    <div class="tab-pane active" id="home">
                                        <h4 class="nomargin">Home title goes here...</h4>
                                        <p>Home content goes here</p>
                                    </div><!-- tab-pane -->
                                  
                                    <div class="tab-pane" id="profile">
                                        <h4 class="nomargin">Profile title goes here...</h4>
                                        <p>Profile content goes here</p>
                                    </div><!-- tab-pane -->
                                  
                                    <div class="tab-pane" id="about">
                                        <h4 class="nomargin">About title goes here...</h4>
                                        <p>About content goes here</p>
                                    </div><!-- tab-pane -->
                                  
                                    <div class="tab-pane" id="contact">
                                        <h4 class="nomargin">Contact title goes here...</h4>
                                        <p>Contact content goes here</p>
                                    </div><!-- tab-pane -->
                                </div><!-- tab-content -->
                                
                            </div><!-- col-md-6 -->
                            
                        </div>
                        
                    </div><!-- contentpanel -->
                    
                </div><!-- mainpanel -->
            </div><!-- mainwrapper -->
        </section>


<!--        <script src="js/jquery-1.11.1.min.js"></script>
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
-->

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
