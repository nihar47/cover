<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>High Clean Admin - Quote</title>
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
              <li>Create quote</li>
            </ul>
            <h4>Create quote</h4>
          </div>
        </div>
        <!-- media --> 
      </div>
      <div class="contentpanel">
        <div class="row">
          <div class="col-md-12 quote_section">
            <div class="mb20"></div>
            <div class="col-md-6">
              <form class="form-horizontal" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label class="col-sm-5">Search Company</label>
                  <div class="col-sm-7">
                    <input type="text" name="account_name" value="" class="form-control" />
                  </div>
                </div>
                <!-- form-group -->
                
                <div class="form-group">
                  <label class="col-sm-5"></label>
                  <div class="col-sm-7">
                    <button class="btn btn-primary mr5">Search</button>
                  </div>
                </div>
                <!-- form-group -->
              </form>
            </div>
            <div class="clearfix"></div>
            <div class="panel panel-default">
              <div class="panel-body titlebar"> <span class="glyphicon  glyphicon-th"></span>
                <h2>Create quote</h2>
              </div>
            </div>
            <div class="col-md-12">
              <div class="table-responsive">
                <table class="table table-bordered mb30 create_quote_table">
                  <tbody>
                    <tr>
                      <th><span>Select Company</span></th>
                      <td><select class="form-control createselect mr30" name="">
                          <option value="1">-Select Company-</option>
                          <option value="2">Assetlink</option>
                          <option value="3">Belgravia Leisure</option>
                          <option value="4">Ben Corp</option>
                          <option value="5">Birkenhead Point</option>
                          <option value="7">Blue Sappehire</option>
                          <option value="8">Borg</option>
                          <option value="6">Brighten Services</option>
                          <option value="9">Chadstone Shopping Centre</option>
                          <option value="10">Cleanworx</option>
                          <option value="10">CMC Services</option>
                          <option value="1">eDreamz</option>
                          <option value="3">GDP</option>
                          <option value="4">Globe William Intl</option>
                          <option value="5"> Kleen Image</option>
                          <option value="7"> Lancaster House</option>
                          <option value="8">Laurel Group</option>
                          <option value="6">Mermaid Cleaning</option>
                          <option value="9"> Milford Towns Pty Ltd</option>
                          <option value="10">NMIT</option>
                          <option value="10">PACE Development Group</option>
                          <option value="1">Promax</option>
                          <option value="3">RM SiteCare</option>
                          <option value="4">Secure Clean</option>
                          <option value="5">Strata Data</option>
                          <option value="7"> TestCompany</option>
                          <option value="8"> Transfield Services</option>
                          <option value="6">Trevor Main</option>
                          <option value="9"> Westgate Health Club</option>
                          
                        </select>   <a href="company_edit.php" title="Create new company">Create new company</a></td>
                    </tr>
                    <tr>
                      <th>Select Contact</th>
                      <td><select class="form-control createselect mr30" name="">
                          <option value="1">-Select Contact-</option>
                          <option value="2"> Noel Josiane</option>
                          <option value="3">Chad Monkhouse</option>
                          <option value="4">David Iaconis</option>
                          <option value="5">Kathy Freeth</option>
                          <option value="7">Serwan Georges</option>
                          <option value="8">Dianne Christophers</option>
                          <option value="10">Mike Jenkins</option>
                          <option value="10">Ray Pantovic</option>
                        </select> <a href="contact_edit.php" title="Create new contact">Create new contact</a></td>
                    </tr>
                    <tr>
                      <th>Select Site</th>
                      <td><select class="form-control createselect mr30" name="">
                          <option value="1">-Select Site-</option>
                          <option value="2"> Bendigo Lansell Square</option>
                          <option value="3">Pakington Square Geelong</option>
                          <option value="4"> Prahran Central</option>
                          <option value="5">Cranbourne Park</option>
                          <option value="7">Bendigo Market Place</option>
                          <option value="8">Campbellfield Plaza</option>
                        </select> <a href="sites_edit.php" title="Create new site">Create new site</a></td>
                    </tr>
                    <tr>
                      <th>Select Building</th>
                      <td><ul id="selectedBuildings" data-bind="foreach: buildings" class="SelectList createselect mr30">
                          <li> <span data-bind="if: Selected"></span> <span data-bind="ifnot: Selected">
                            <input type="checkbox" name="BuildingIds" data-bind="event: {change: $root.selectBuilding}, value: Id, attr: {'id': $root.composeIndex('building' + Id)}" value="51" id="compose_building51">
                            </span>
                            <label data-bind="text: Name, attr: {'for': $root.composeIndex('building' + Id)}" for="compose_building51">Prahran Ext Shops</label>
                          </li>
                          <li> <span data-bind="if: Selected"></span> <span data-bind="ifnot: Selected">
                            <input type="checkbox" name="BuildingIds" data-bind="event: {change: $root.selectBuilding}, value: Id, attr: {'id': $root.composeIndex('building' + Id)}" value="71" id="compose_building71">
                            </span>
                            <label data-bind="text: Name, attr: {'for': $root.composeIndex('building' + Id)}" for="compose_building71">Main Arcade</label>
                          </li>
                          <li> <span data-bind="if: Selected"></span> <span data-bind="ifnot: Selected">
                            <input type="checkbox" name="BuildingIds" data-bind="event: {change: $root.selectBuilding}, value: Id, attr: {'id': $root.composeIndex('building' + Id)}" value="127" id="compose_building127">
                            </span>
                            <label data-bind="text: Name, attr: {'for': $root.composeIndex('building' + Id)}" for="compose_building127">Prahran Central Pressure Wash</label>
                          </li>
                        </ul>
                         <a href="buildings_edit.php" title="Create new building">Create new building</a>
                        </td>
                    </tr>
                    <tr>
                      <th>Client<br>
                        <small>Enter some keywords to search client</small></th>
                      <td><input type="text" name="account_name" value="testinghelpyou@gmail.com" class="form-control createselect" /></td>
                    </tr>
                    <tr>
                      <th>Quote date</th>
                      <td><input type="text" name="account_name" value="2014-11-05" class="form-control createselect" /></td>
                    </tr>
                    <tr>
                      <td colspan="2" align="center"><!--<a href="#" class="btn btn-primary">Continue</a> or <a href="javascript:history.back()" class="btn">Back</a>-->
                        
                        <button class="btn btn-primary">Continue</button>
                        &nbsp;&nbsp;<span>or</span>&nbsp;&nbsp;
                        <button class="btn btn-primary">Back</button></td>
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
