<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>High Clean Admin - Assign staffs</title>
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
              <li>Assign Staff</li>
            </ul>
            <h4>Assign Staff</h4>
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
                    <h2>Assign staffs</h2>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="table-responsive">
                    <table class="table table-bordered mb30 quote_table quote_details">
                      <thead>
                        <tr>
                          <th class="head">No.</th>
                          <th class="head">Date</th>
                          <th class="head">Contact name <span class="fa fa-caret-down"></span></th>
                          <th class="head">Site and building</th>
                          <th class="head">Service Req.</th>
                          <th class="head">Quote amount</th>
                          <th class="head">Staff required</th>
                          <th class="head">Start date</th>
                          <th class="head">End date</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>2247</td>
                          <td>2014-10-28</td>
                          <td>Chad</td>
                          <td>Southland Shopping Centre Level 2 Cinema White Roof Sheets</td>
                          <td>High Level Dusting</td>
                          <td>$650.00</td>
                          <td>1</td>
                          <td>2014-10-29</td>
                          <td>2014-10-29</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <!-- table-responsive --> 
                </div>
                <div class="col-md-8 mb20">
                  <form class="form-inline" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label >Site Supervisor</label>
                      <div>
                        <select class="form-control inline-block">
                          <option value="56">Jye Kuwert - jye.kuwert@highclean.com.au</option>
                          <option value="57">Ajmal Hasmatullah - ajmal.hashmatullah@highclean.com.au</option>
                        </select>
                      </div>
                    </div>
                    <!-- form-group -->
                    <div class="form-group mt20">
                      <button class="btn btn-primary">Add</button>
                    </div>
                    <!-- form-group -->
                  </form>
                </div>
                <div class="col-md-12 mb20">
                  <form  method="post" enctype="">
                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Staff name</label>
                        <br>
                        <select id="staffName" data-bind="options: staffs, optionsText: 'Name', optionsValue: 'Id', value: staffId" class="form-control">
                          <option value="13">Hussein Aboudakin - aboudakin@hotmail.com</option>
                          <option value="56">Jye Kuwert - jye.kuwert@highclean.com.au</option>
                          <option value="57">Ajmal Hasmatullah - ajmal.hashmatullah@highclean.com.au</option>
                          <option value="58">Ishaq Mohammad - ishaqhazara@gmail.com</option>
                          <option value="59">Alex Huijksloot - sanderhuyksloot@gmail.com</option>
                          <option value="60">Wieger Douma - wiegerdouma@gmail.com</option>
                          <option value="61">Asad Nazir - rajaasad880@gmail.com</option>
                          <option value="62">Noman Muhammad - muhammad.noman26@outlook.com</option>
                          <option value="63">Patrick Bolton - pbolton@student.unimelb.edu.au</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Pick up Van (hh:mm)</label>
                        <br>
                        <select id="pickupVanHour" class="form-control width65 inline-block" data-bind="options: hours, value: vanHour">
                          <option value="0">0</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                          <option value="9">9</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                          <option value="13">13</option>
                          <option value="14">14</option>
                          <option value="15">15</option>
                          <option value="16">16</option>
                          <option value="17">17</option>
                          <option value="18">18</option>
                          <option value="19">19</option>
                          <option value="20">20</option>
                          <option value="21">21</option>
                          <option value="22">22</option>
                          <option value="23">23</option>
                        </select>
                        <select data-bind="options: minutes, value: vanMinute" class="form-control width65 inline-block">
                          <option value="0">0</option>
                          <option value="15">15</option>
                          <option value="30">30</option>
                          <option value="45">45</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Get to job site (hh:mm)</label>
                        <br>
                        <select id="getToJobHour"  class="form-control width65 inline-block" data-bind="options: hours, value: startHour">
                          <option value="0">0</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                          <option value="9">9</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                          <option value="13">13</option>
                          <option value="14">14</option>
                          <option value="15">15</option>
                          <option value="16">16</option>
                          <option value="17">17</option>
                          <option value="18">18</option>
                          <option value="19">19</option>
                          <option value="20">20</option>
                          <option value="21">21</option>
                          <option value="22">22</option>
                          <option value="23">23</option>
                        </select>
                        <select data-bind="options: minutes, value: startMinute" class="form-control width65 inline-block">
                          <option value="0">0</option>
                          <option value="15">15</option>
                          <option value="30">30</option>
                          <option value="45">45</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Return to office (hh:mm)</label>
                        <br>
                        <select id="returnToOfficeHour" class="form-control width65 inline-block" data-bind="options: hours, value: endHour">
                          <option value="0">0</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                          <option value="9">9</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                          <option value="13">13</option>
                          <option value="14">14</option>
                          <option value="15">15</option>
                          <option value="16">16</option>
                          <option value="17">17</option>
                          <option value="18">18</option>
                          <option value="19">19</option>
                          <option value="20">20</option>
                          <option value="21">21</option>
                          <option value="22">22</option>
                          <option value="23">23</option>
                        </select>
                        <select data-bind="options: minutes, value: endMinute" class="form-control width65 inline-block">
                          <option value="0">0</option>
                          <option value="15">15</option>
                          <option value="30">30</option>
                          <option value="45">45</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Send SMS</label>
                        <br>
                        <input type="checkbox" value="" name="">
                      </div>
                    </div>
                    <div class="col-md-1">
                      <div class="form-group">
                        <button class="btn btn-primary">Add</button>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="col-md-12">
                  <div class="table-responsive">
                    <table class="table table-bordered mb30 quote_table quote_details">
                      <thead>
                        <tr>
                          <th class="head">Staff name</th>
                          <th class="head">Pick up Van</th>
                          <th class="head">Get to job site</th>
                          <th class="head">Return to office</th>
                          <th class="head">Send SMS</th>
                          <th class="head">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <!-- table-responsive --> 
                </div>
                <div class="col-md-12" align="center">
                  <button type="button" class="btn btn-primary mr5">Book this job</button>
                  <button type="button" class="btn btn-primary">Book this job and Send Email</button>
                  &nbsp;&nbsp;or&nbsp;&nbsp;
                  <button type="button" class="btn btn-default">Back</button>
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
