<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>	
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="TOP RATED LOCAL">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <link rel="shortcut icon" href="<?php echo Yii::app()->getBaseUrl(true); ?>/images/favicon.png">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
   	
	<!-- blueprint CSS framework -->
    <link href="<?php echo Yii::app()->getBaseUrl(true); ?>/fonts/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->getBaseUrl(true); ?>/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->getBaseUrl(true); ?>/css/carousel.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->getBaseUrl(true); ?>/css/style.css" rel="stylesheet">	
	<link rel="stylesheet" href="<?php echo Yii::app()->getBaseUrl(true); ?>/css/jquery-ui.css">
	
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo Yii::app()->getBaseUrl(true); ?>/js/jquery-1.10.2.min.js"></script>
    <script src="<?php echo Yii::app()->getBaseUrl(true); ?>/js/bootstrap.min.js"></script> 
	<script src="<?php echo Yii::app()->getBaseUrl(true); ?>/js/jquery-ui.js"></script>
	<?php require_once('main_header_script.php');	 ?>


       
	</head>

<body>

		<section class="wrapper">
        	<header class="page-header">
            	<h1 class="pull-left"><a href="<?php echo Yii::app()->getBaseUrl(true); ?>" title="TOP RATED LOCAL"><img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/logo.png"></a></h1>
                
					<div class="col-sm-3 pull-left">					
                	<div class="search_form">
                    	<a href="javascript:;">New Search<i class="fa fa-caret-right"></i> <i class="fa fa-caret-down"></i></a>
                        <form role="form" class="inner_search_form" name="BusinessSearchFrmHeader" onKeyPress="handle" method="post" action="<?php echo Yii::app()->getBaseUrl(true); ?>/site/SearchBusiness">
                            <div class="form-group col-sm-4">
                              <input type="text" class="form-control" id="BusinessLocationHeader" name="BusinessLocationHeader" placeholder="Enter A Location">
                            </div>
                            <div class="form-group col-sm-7">
                            
                             <input type="text" id="BusinessTypsHeader" name="BusinessTypsHeader"  class="form-control" placeholder="What type of business are you looking for?" >
                            </div>
                             <div class="form-group col-sm-1">
                              <input type="button" class="btn "  onclick="SearchBusinessHeader();">
                            </div>
                            
                        </form>
                    </div>                    
					</div>
		  
          
          <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="navbar-collapse collapse pull-right">
                      <div class="navbar-form navbar-right">
                        <div class="form-group">
						<?php //Yii::app()->createUrl("users/email", array("id"=>$data->id)) ?>
                        	<a href="<?php echo Yii::app()->createUrl("site/about"); ?>">About</a>  
                        </div>
                        <button class="btn btn-success" type="submit" onClick="redirectToListYourBusiness('<?php echo Yii::app()->getBaseUrl(true); ?>/site/ListYourBusiness')">LIST YOUR BUSINESS</button>
                      </div>
      		  </div>


<?php

/*
Displays on header user search keyword
*/
	if(isset($_POST['BusinessTypes']) && $_POST['BusinessLocation']) {
	$BusinessTypes = isset($_POST['BusinessTypes']) ? mysql_real_escape_string($_POST['BusinessTypes']) : '';
	$BusinessLocation = isset($_POST['BusinessLocation']) ? mysql_real_escape_string($_POST['BusinessLocation']) : '';
	} else {
	$BusinessTypes = isset($_POST['BusinessTypsHeader']) ? mysql_real_escape_string($_POST['BusinessTypsHeader']) : '';
	$BusinessLocation = isset($_POST['BusinessLocationHeader']) ? mysql_real_escape_string($_POST['BusinessLocationHeader']) : '';
	}
	if(! empty($BusinessTypes) && ! empty($BusinessLocation) ) { ?>
		<div class="text-center top_mid_text"><strong>Top Rated Local® <b class="blue"><?php echo ucfirst($BusinessTypes); ?></b> near <b class="blue"><?php echo $BusinessLocation; ?></b></strong></div>
<?php } ?>

                


            	<section class="clear"></section>
            </header>

            
 <?php echo $content; ?>


			
    <footer id="footer">
        <div class="text-muted pull-left">&copy; 2013 Top Rated Local ® <a href="<?php echo Yii::app()->getBaseUrl(true); ?>/site/privacy">Privacy</a> <a href="<?php echo Yii::app()->getBaseUrl(true); ?>/site/terms">Terms</a></div>
        <div class="footer_links pull-right"><a href="<?php echo Yii::app()->getBaseUrl(true); ?>">Home</a> <a href="<?php echo Yii::app()->createUrl("site/about"); ?>">About</a> <a href="<?php echo Yii::app()->createUrl("site/about"); ?>">Manage Listing</a><a href="#."  onclick="redirectToListYourBusiness('<?php echo Yii::app()->getBaseUrl(true); ?>/site/ListYourBusiness')">List your business</a></div>
        <div class="clear"></div>
    </footer>   
    
    
       	<!--wrapper end --> 	
        </section>
            
	  </body>
</html>	