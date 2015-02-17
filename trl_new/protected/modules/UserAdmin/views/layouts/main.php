<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
    
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/easy-responsive-tabs.css" />
    
   
   
   
 
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.6.3.min.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.coolautosuggest.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.coolfieldset.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery.coolfieldset.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery.coolautosuggest.css" />
	<style type="text/css">
	legend.new{
		font-size: 16px;
		font-weight: bold;
		color: blue;
	}
	</style>
     
    

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
    
	<script src="<?php echo Yii::app()->baseUrl.'/ckeditor/ckeditor.js'; ?>" > </script>

    </script>
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
        <a href="<?php echo Yii::app()->request->baseUrl; ?>">
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/trl-logo.png" alt="TOP RATED LOCAL"/>
		</a>
        <div class="welcome_panel">
      		Top Rated Local - Admin panel
		<p>
        	Welcome <?php echo Yii::app()->user->getId();  ?> |
		<?php echo date("l, F jS, Y", strtotime(date('Y-m-d'))); ?> | <a href='<?php echo Yii::app()->request->baseUrl; ?>?r=site/logout'><span>Logout</span></a>  <br/>
    
         </p>
        
		</div>
		</div>
	</div><!-- header -->

		
<div id='cssmenu'>
<ul>
   <li class='has-sub'><a href='<?php echo Yii::app()->request->baseUrl; ?>'><span>Dashboard</span></a></li>
   <li class='has-sub'><a href='#'><span>CMS</span></a>
   	<ul>
    	 <li class='has-sub'><a href='<?php echo Yii::app()->request->baseUrl; ?>?r=page/admin'><span>Pages</span></a>
          <li class='has-sub'><a href='<?php echo Yii::app()->request->baseUrl; ?>?r=faq/admin'><span>FAQ's</span></a> </li>	
         <li class='has-sub'><a href='<?php echo Yii::app()->request->baseUrl; ?>?r=businessBenefits/admin'><span>Business Benefits</span></a> </li>	
         <li class='has-sub'><a href='<?php echo Yii::app()->request->baseUrl; ?>?r=businessRatingBenefits/admin'><span>Rating Benefits</span></a> </li>	
    </ul>
	<li>	
   
   <li class='has-sub'><a href='#'><span>WebSite</span></a>
      <ul>
       <li class='has-sub'><a href='<?php echo Yii::app()->request->baseUrl; ?>?r=locations/admin'><span>Locations</span></a>
        </li>
          <li class='has-sub'><a href='<?php echo Yii::app()->request->baseUrl; ?>?r=category/admin'><span>Categories</span></a>
          </li>
           <li class='has-sub'><a href='<?php echo Yii::app()->request->baseUrl; ?>?r=listing/admin'><span>Listing Type</span></a>
          </li>
          
           
          
         
          
         
             
            
        
     </ul>
   </li>
    <li class='has-sub'><a href='#'><span>Accounts</span></a>
            <ul>
               <li><a href='<?php echo Yii::app()->request->baseUrl; ?>?r=business/admin'><span>Business Users</span></a></li>
                <li><a href='<?php echo Yii::app()->request->baseUrl; ?>?r=adminUser/admin'><span>Admin Users</span></a></li>
            </ul>
         </li>
   
   <li class='has-sub'><a href='#'><span>E-mail</span></a>
            <ul>
              <li class='has-sub'><a href='<?php echo Yii::app()->request->baseUrl; ?>?r=emailFormat/admin'><span>Email Formats</span></a>
          </li>
            </ul>
         </li>
   
 	
   <li class='last'><a href='#'><span>Setting</span></a>
     <ul>
     	 
               <li class='last'><a href='<?php echo Yii::app()->request->baseUrl; ?>'><span>Admin Setting</span></a></li>
            </ul>
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
