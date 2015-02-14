<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>High Clean Admin - Create User</title>
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
              <li><a href="">User</a></li>
              <li>Create User</li>
            </ul>
            <h4>Create User</h4>
          </div>
        </div>
        <!-- media --> 
      </div>
      <div class="contentpanel">
        <div class="row">
          <div class="col-md-12 user_section"> 
           
                <div class="mb20"></div>
                <div class="panel panel-default">
                  <div class="panel-body titlebar">
                    <span class="fa fa-pencil"></span><h2>Create User</h2>
                  </div>
                </div>
                <div class="col-md-12">
                  <form class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="col-md-5 mr100">
                      <div class="form-group">
                        <label class="col-sm-5">Username</label>
                        <div class="col-sm-7">
                          <input type="text" name="account_name" value="" class="form-control" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-5">Email</label>
                        <div class="col-sm-7">
                          <input type="text" name="account_name" value="" class="form-control" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-5">Password</label>
                        <div class="col-sm-7">
                          <input type="password" name="account_name" value="" class="form-control" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-5">Confirm password</label>
                        <div class="col-sm-7">
                          <input type="password" name="account_name" value="" class="form-control" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-5">Avatar</label>
                        <div class="col-sm-7">
                          <input type="file" name="account_name" value="" class="form-control" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-5">Last name</label>
                        <div class="col-sm-7">
                          <input type="text" name="account_name" value="" class="form-control" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-5">First name</label>
                        <div class="col-sm-7">
                          <input type="text" name="account_name" value="" class="form-control" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-5">Gender</label>
                        <div class="col-sm-7">
                          <select name="Gender" class="form-control">
                            <option selected="selected" value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="UnKnown">UnKnown</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-5">Date of birth</label>
                        <div class="col-sm-7">
                          <input type="text" name="account_name" value="" class="form-control" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-5">Active</label>
                        <div class="col-sm-7">
                          <input type="checkbox" name="" value="" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-5">Groups</label>
                        <div class="col-sm-7">
                          <select name="" class="form-control">
                            <option value="1">Administrators</option>
                            <option value="2">Managers</option>
                            <option value="3">Contractors</option>
                            <option value="4">Staffs</option>
                            <option value="10">Service_Client</option>
                            <option value="12">Supervisors</option>
                            <option value="13">SiteSupervisors</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-5">Can view all jobs?</label>
                        <div class="col-sm-7">
                          <input type="checkbox" name="" value="" />
                        </div>
                      </div>
                    </div>
                    <div class="col-md-5">
                      <div class="form-group">
                        <label class="col-sm-5">Home phone</label>
                        <div class="col-sm-7">
                          <input type="text" name="account_name" value="" class="form-control" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-5">Mobile phone</label>
                        <div class="col-sm-7">
                          <input type="text" name="account_name" value="" class="form-control" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-5">Street</label>
                        <div class="col-sm-7">
                          <input type="text" name="account_name" value="" class="form-control" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-5">City</label>
                        <div class="col-sm-7">
                          <input type="text" name="account_name" value="" class="form-control" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-5">State/Province</label>
                        <div class="col-sm-7">
                          <input type="text" name="account_name" value="" class="form-control" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-5">Country</label>
                        <div class="col-sm-7">
                          <select name="" class="form-control">
                            <option value="3">Afghanistan</option>
                            <option value="4">Albania</option>
                            <option value="5">Algeria</option>
                            <option value="6">American Samoa</option>
                            <option value="7">Andorra</option>
                            <option value="8">Angola</option>
                            <option value="9">Anguilla</option>
                            <option value="10">Antarctica</option>
                            <option value="11">Antigua and Barbuda</option>
                            <option value="12">Argentina</option>
                            <option value="13">Armenia</option>
                            <option value="14">Aruba</option>
                            <option value="15">Australia</option>
                            <option value="16">Austria</option>
                            <option value="17">Azerbaijan</option>
                            <option value="18">Bahamas</option>
                            <option value="19">Bahrain</option>
                            <option value="20">Bangladesh</option>
                            <option value="21">Barbados</option>
                            <option value="22">Belarus</option>
                            <option value="23">Belgium</option>
                            <option value="24">Belize</option>
                            <option value="25">Benin</option>
                            <option value="26">Bermuda</option>
                            <option value="27">Bhutan</option>
                            <option value="28">Bolivia</option>
                            <option value="29">Bosnia and Herzegovina</option>
                            <option value="30">Botswana</option>
                            <option value="31">Brazil</option>
                            <option value="32">British Indian Ocean Territory</option>
                            <option value="33">British Virgin Islands</option>
                            <option value="34">Brunei</option>
                            <option value="35">Bulgaria</option>
                            <option value="36">Burkina Faso</option>
                            <option value="37">Burma (Myanmar)</option>
                            <option value="38">Burundi</option>
                            <option value="39">Cambodia</option>
                            <option value="40">Cameroon</option>
                            <option value="2">Canada</option>
                            <option value="41">Cape Verde</option>
                            <option value="42">Cayman Islands</option>
                            <option value="43">Central African Republic</option>
                            <option value="44">Chad</option>
                            <option value="45">Chile</option>
                            <option value="46">China</option>
                            <option value="47">Christmas Island</option>
                            <option value="48">Cocos (Keeling) Islands</option>
                            <option value="49">Colombia</option>
                            <option value="50">Comoros</option>
                            <option value="51">Cook Islands</option>
                            <option value="52">Costa Rica</option>
                            <option value="53">Croatia</option>
                            <option value="54">Cuba</option>
                            <option value="55">Cyprus</option>
                            <option value="56">Czech Republic</option>
                            <option value="57">Democratic Republic of the Congo</option>
                            <option value="58">Denmark</option>
                            <option value="59">Djibouti</option>
                            <option value="60">Dominica</option>
                            <option value="61">Dominican Republic</option>
                            <option value="62">Ecuador</option>
                            <option value="63">Egypt</option>
                            <option value="64">El Salvador</option>
                            <option value="65">Equatorial Guinea</option>
                            <option value="66">Eritrea</option>
                            <option value="67">Estonia</option>
                            <option value="68">Ethiopia</option>
                            <option value="69">Falkland Islands</option>
                            <option value="70">Faroe Islands</option>
                            <option value="71">Fiji</option>
                            <option value="72">Finland</option>
                            <option value="73">France</option>
                            <option value="74">French Polynesia</option>
                            <option value="75">Gabon</option>
                            <option value="76">Gambia</option>
                            <option value="77">Gaza Strip</option>
                            <option value="78">Georgia</option>
                            <option value="79">Germany</option>
                            <option value="80">Ghana</option>
                            <option value="81">Gibraltar</option>
                            <option value="82">Greece</option>
                            <option value="83">Greenland</option>
                            <option value="84">Grenada</option>
                            <option value="85">Guam</option>
                            <option value="86">Guatemala</option>
                            <option value="87">Guinea</option>
                            <option value="88">Guinea-Bissau</option>
                            <option value="89">Guyana</option>
                            <option value="90">Haiti</option>
                            <option value="91">Holy See (Vatican City)</option>
                            <option value="92">Honduras</option>
                            <option value="93">Hong Kong</option>
                            <option value="94">Hungary</option>
                            <option value="95">Iceland</option>
                            <option value="96">India</option>
                            <option value="97">Indonesia</option>
                            <option value="98">Iran</option>
                            <option value="99">Iraq</option>
                            <option value="100">Ireland</option>
                            <option value="101">Isle of Man</option>
                            <option value="102">Israel</option>
                            <option value="103">Italy</option>
                            <option value="104">Ivory Coast</option>
                            <option value="105">Jamaica</option>
                            <option value="106">Japan</option>
                            <option value="107">Jersey</option>
                            <option value="108">Jordan</option>
                            <option value="109">Kazakhstan</option>
                            <option value="110">Kenya</option>
                            <option value="111">Kiribati</option>
                            <option value="112">Kosovo</option>
                            <option value="113">Kuwait</option>
                            <option value="114">Kyrgyzstan</option>
                            <option value="115">Laos</option>
                            <option value="116">Latvia</option>
                            <option value="117">Lebanon</option>
                            <option value="118">Lesotho</option>
                            <option value="119">Liberia</option>
                            <option value="120">Libya</option>
                            <option value="121">Liechtenstein</option>
                            <option value="122">Lithuania</option>
                            <option value="123">Luxembourg</option>
                            <option value="124">Macau</option>
                            <option value="125">Macedonia</option>
                            <option value="126">Madagascar</option>
                            <option value="127">Malawi</option>
                            <option value="128">Malaysia</option>
                            <option value="129">Maldives</option>
                            <option value="130">Mali</option>
                            <option value="131">Malta</option>
                            <option value="132">Marshall Islands</option>
                            <option value="133">Mauritania</option>
                            <option value="134">Mauritius</option>
                            <option value="135">Mayotte</option>
                            <option value="136">Mexico</option>
                            <option value="137">Micronesia</option>
                            <option value="138">Moldova</option>
                            <option value="139">Monaco</option>
                            <option value="140">Mongolia</option>
                            <option value="141">Montenegro</option>
                            <option value="142">Montserrat</option>
                            <option value="143">Morocco</option>
                            <option value="144">Mozambique</option>
                            <option value="145">Namibia</option>
                            <option value="146">Nauru</option>
                            <option value="147">Nepal</option>
                            <option value="148">Netherlands</option>
                            <option value="149">Netherlands Antilles</option>
                            <option value="150">New Caledonia</option>
                            <option value="151">New Zealand</option>
                            <option value="152">Nicaragua</option>
                            <option value="153">Niger</option>
                            <option value="154">Nigeria</option>
                            <option value="155">Niue</option>
                            <option value="156">Norfolk Island</option>
                            <option value="157">North Korea</option>
                            <option value="158">Northern Mariana Islands</option>
                            <option value="159">Norway</option>
                            <option value="160">Oman</option>
                            <option value="161">Pakistan</option>
                            <option value="162">Palau</option>
                            <option value="163">Panama</option>
                            <option value="164">Papua New Guinea</option>
                            <option value="165">Paraguay</option>
                            <option value="166">Peru</option>
                            <option value="167">Philippines</option>
                            <option value="168">Pitcairn Islands</option>
                            <option value="169">Poland</option>
                            <option value="170">Portugal</option>
                            <option value="171">Puerto Rico</option>
                            <option value="172">Qatar</option>
                            <option value="173">Republic of the Congo</option>
                            <option value="174">Romania</option>
                            <option value="175">Russia</option>
                            <option value="176">Rwanda</option>
                            <option value="177">Saint Barthelemy</option>
                            <option value="178">Saint Helena</option>
                            <option value="179">Saint Kitts and Nevis</option>
                            <option value="180">Saint Lucia</option>
                            <option value="181">Saint Martin</option>
                            <option value="182">Saint Pierre and Miquelon</option>
                            <option value="183">Saint Vincent and the Grenadines</option>
                            <option value="184">Samoa</option>
                            <option value="185">San Marino</option>
                            <option value="186">Sao Tome and Principe</option>
                            <option value="187">Saudi Arabia</option>
                            <option value="188">Senegal</option>
                            <option value="189">Serbia</option>
                            <option value="190">Seychelles</option>
                            <option value="191">Sierra Leone</option>
                            <option value="192">Singapore</option>
                            <option value="193">Slovakia</option>
                            <option value="194">Slovenia</option>
                            <option value="195">Solomon Islands</option>
                            <option value="196">Somalia</option>
                            <option value="197">South Africa</option>
                            <option value="198">South Korea</option>
                            <option value="199">Spain</option>
                            <option value="200">Sri Lanka</option>
                            <option value="201">Sudan</option>
                            <option value="202">Suriname</option>
                            <option value="203">Svalbard</option>
                            <option value="204">Swaziland</option>
                            <option value="205">Sweden</option>
                            <option value="206">Switzerland</option>
                            <option value="207">Syria</option>
                            <option value="208">Taiwan</option>
                            <option value="209">Tajikistan</option>
                            <option value="210">Tanzania</option>
                            <option value="211">Thailand</option>
                            <option value="212">Timor-Leste</option>
                            <option value="213">Togo</option>
                            <option value="214">Tokelau</option>
                            <option value="215">Tonga</option>
                            <option value="216">Trinidad and Tobago</option>
                            <option value="217">Tunisia</option>
                            <option value="218">Turkey</option>
                            <option value="219">Turkmenistan</option>
                            <option value="220">Turks and Caicos Islands</option>
                            <option value="221">Tuvalu</option>
                            <option value="222">Uganda</option>
                            <option value="223">Ukraine</option>
                            <option value="224">United Arab Emirates</option>
                            <option value="225">United Kingdom</option>
                            <option value="1">United States</option>
                            <option value="226">Uruguay</option>
                            <option value="227">US Virgin Islands</option>
                            <option value="228">Uzbekistan</option>
                            <option value="229">Vanuatu</option>
                            <option value="230">Venezuela</option>
                            <option value="231">Vietnam</option>
                            <option value="232">Wallis and Futuna</option>
                            <option value="233">West Bank</option>
                            <option value="234">Western Sahara</option>
                            <option value="235">Yemen</option>
                            <option value="236">Zambia</option>
                            <option value="237">Zimbabwe</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-5">Zip code</label>
                        <div class="col-sm-7">
                          <input type="text" name="account_name" value="" class="form-control" />
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12" align="center">
                      <button class="btn btn-primary mr5">Save</button>
                      <button class="btn btn-default">Reset</button>
                    </div>
                  </form>
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
