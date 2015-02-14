<div class="leftpanel">
<h5 class="leftpanel-title"><?php echo date("l, F jS, Y", strtotime(date('Y-m-d'))); ?></h5>
  <ul class="nav nav-pills nav-stacked">
    <li class="dashboard"><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/?r=Dashboard"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
    <li class="parent Quotes"><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/"><i class="fa fa-shopping-cart"></i> <span>Quotes</span></a>
      <ul class="children">
        <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/?r=Quotes/default/admin">Quotes</a></li>
        <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/?r=Company/default/admin">Companies</a></li>
        <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/?r=Contact/default/admin">Contacts</a></li>
        <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/?r=ContactsSite/default/admin">Sites</a></li>
        <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/?r=Buildings/default/admin">Buildings</a></li>
        <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/?r=ListItems/default/index">ListItems</a></li>
      </ul>
    </li>
    <li class="services"><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/?r=Service/default/admin"><i class="fa fa-share-alt-square"></i> <span>Manage Services</span></a></li>
    
	<li class="parent swms">
	<a href="<?php echo Yii::app()->getBaseUrl(true); ?>/?r=Swms/default/admin"><i class="fa fa-share-alt-square"></i> <span>Manage SWMS</span></a>
	  <ul class="children">
        <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/?r=Swms/default/admin">Types</a></li>
        <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/?r=SwmsTask/default/admin">Task/Activity</a></li>
        <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/?r=SwmsHazards/default/admin">Hazards/Consequences</a></li>
      </ul>
	
	</li>
    
	
	<li class="parent user"><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/"><i class="fa fa-user"></i> <span>Users</span></a>
      <ul class="children">
        <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/?r=User/default/admin">Users</a></li>
        <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/?r=Group/default/admin">Groups</a></li>
      </ul>
    </li>
    <li class="parent report"><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/"><i class="fa  fa-bar-chart-o"></i> <span>Reports</span></a>
      <ul class="children">
        <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/report_staff_timesheet.php">Staff Timesheet</a></li>
        <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/report_job_status.php">Job Status</a></li>
        <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/report_profitloss.php">Profit &amp; Loss</a></li>
        <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/report_job_payment.php">Job Payment</a></li>
        <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/report_client_revenue.php">Client Revenue</a></li>
        <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/report_user_communication_data.php">User Communication Data</a></li>
        <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/report_future_cashflow_projections.php">Future Cash Flow Projections</a></li>
        <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/report_future_projections.php">Future Projections</a></li>
      </ul>
    </li>
   
  </ul>
</div>
<!-- leftpanel --> 

