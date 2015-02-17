<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
	<!-- blueprint CSS framework -->
	<link rel="shortcut icon" href="<?php echo Yii::app()->getBaseUrl(true); ?>/images/favicon.png">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true); ?>/css/back/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true); ?>/css/back/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true); ?>/css/back/css/ie.css" media="screen, projection" />
	<![endif]-->
	<link href="<?php echo Yii::app()->getBaseUrl(true); ?>/css/back/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true); ?>/css/back/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true); ?>/css/back/css/form.css" />
    
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true); ?>/css/back/css/easy-responsive-tabs.css" />
    
   
   
   
 
    <script src="<?php echo Yii::app()->getBaseUrl(true); ?>/js/jquery-1.6.3.min.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true); ?>/js/jquery.coolautosuggest.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true); ?>/js/jquery.coolfieldset.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true); ?>/css/back/css/jquery.coolfieldset.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true); ?>/css/back/css/jquery.coolautosuggest.css" />
	<style type="text/css">
	legend.new{
		font-size: 16px;
		font-weight: bold;
		color: blue;
	}
	</style>
     
    
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
    
	<script src="<?php echo Yii::app()->baseUrl.'/ckeditor/ckeditor.js'; ?>" > </script>


     <style type="text/css">
        .demo {
            width: 980px;
            margin: 0px auto;
        }
        .demo h1 {
                margin:33px 0 25px;
            }
        .demo h3 {
                margin: 10px 0;
            }
        pre {
            background: #fff;
        }
        @media only screen and (max-width: 780px) {
        .demo {
                margin: 5%;
                width: 90%;
         }
        .how-use {
                float: left;
                width: 300px;
                display: none;
            }
        }
        #tabInfo {
            display: none;
        }
    </style>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><!--<?php echo CHtml::encode(Yii::app()->name); ?>-->
        <a href="<?php echo Yii::app()->getBaseUrl(true); ?>/admin/">
        <img src="<?php echo Yii::app()->getBaseUrl(true); ?>/css/back/images/trl-logo.png" alt="TOP RATED LOCAL"/>
		</a>
        <div class="welcome_panel">
      		Top Rated Local - Admin panel
		<p>
        	Welcome <?php echo Yii::app()->user->getId();  ?> |
		<?php echo date("l, F jS, Y", strtotime(date('Y-m-d'))); ?> | <a href='<?php echo Yii::app()->getBaseUrl(true); ?>/admin?r=site/logout'><span>Logout</span></a>  <br/>
    
         </p>
        
		</div>
		</div>
	</div><!-- header -->

		
<div id='cssmenu'>
<ul>
   <li class='has-sub'><a href='<?php echo Yii::app()->getBaseUrl(true); ?>/admin/'><span>Dashboard</span></a></li>
   <li class='has-sub'><a ><span>CMS</span></a>
   	<ul>
    	 <li class='has-sub'><a href='<?php echo Yii::app()->getBaseUrl(true); ?>/admin?r=page/default/admin'><span>Pages</span></a>
          <li class='has-sub'><a href='<?php echo Yii::app()->getBaseUrl(true); ?>/admin?r=faq/default/admin'><span>FAQ's</span></a> </li>	
         <li class='has-sub'><a href='<?php echo Yii::app()->getBaseUrl(true); ?>/admin?r=businessBenefits/default/admin'><span>Business Benefits</span></a> </li>	
         <li class='has-sub'><a href='<?php echo Yii::app()->getBaseUrl(true); ?>/admin?r=businessRatingBenefits/default/admin'><span>Rating Benefits</span></a> </li>	
    </ul>
	<li>	
   
   <li class='has-sub'><a><span>WebSite</span></a>
      <ul>
       <li class='has-sub'><a href='<?php echo Yii::app()->getBaseUrl(true); ?>/admin?r=locations/default/admin'><span>Locations</span></a>
        </li>
          <li class='has-sub'><a href='<?php echo Yii::app()->getBaseUrl(true); ?>/admin?r=category/default/admin'><span>Categories</span></a>
          </li>
           <li class='has-sub'><a href='<?php echo Yii::app()->getBaseUrl(true); ?>/admin?r=listing/default/admin'><span>Listing Type</span></a>
          </li>
          
           
          
         
          
         
             
            
        
     </ul>
   </li>
    <li class='has-sub'><a ><span>Accounts</span></a>
            <ul>
               <li><a href='<?php echo Yii::app()->getBaseUrl(true); ?>/admin?r=business/default/admin'><span>Business Users</span></a>
               </li>
                
               <li><a href='<?php echo Yii::app()->getBaseUrl(true); ?>/admin?r=Customer/default/admin'><span>Customers</span></a></li>
                <li><a href='<?php echo Yii::app()->getBaseUrl(true); ?>/admin?r=AdminUser/default/admin'><span>Admin Users</span></a></li>
            </ul>
         </li>
   
   <li class='has-sub'><a ><span>E-mail</span></a>
            <ul>
              <li class='has-sub'><a href='<?php echo Yii::app()->getBaseUrl(true); ?>/admin?r=emailFormat/default/admin'><span>Email Formats</span></a>
          </li>
            </ul>
         </li>
   
 	
   <li class='last'><a href='<?php echo Yii::app()->getBaseUrl(true); ?>/admin?r=Setting/Setting/admin'><span>Setting</span></a>
     <!--  <ul>
     	     <li class='last'><a href='<?php echo Yii::app()->getBaseUrl(true); ?>/admin/'><span>Admin Setting</span></a></li>
            </ul>-->
   </li>
   </ul>
  </div>
		
	
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by Top Rated Local.<br/>
		All Rights Reserved.<br/>
	</div><!-- footer -->

</div><!-- page -->

</body>



</html>
