<!DOCTYPE html>
<html lang="en">
<head>
	   <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
<link rel="shortcut icon" href="<?php echo Yii::app()->getBaseUrl(true); ?>/images/favicon.png">

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true); ?>/css/style.default.css" media="screen, projection" />
	
	   <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="<?php echo Yii::app()->getBaseUrl(true); ?>/js/html5shiv.js"></script>
        <script src="<?php echo Yii::app()->getBaseUrl(true); ?>/js/respond.min.js"></script>
        <![endif]-->
	
	
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	
</head>


    <body class="signin">
        
        
        <section>
            
            <div class="panel panel-signin">
                <div class="panel-body">
                    <div class="logo text-center">
                        <img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/logo_high.png" alt="High Clean" >
                    </div>
                    <h4 class="text-center">Login</h4>
                    
                    <div class="mb30"></div>
                   <?php echo $content; ?> 

                  
                    
                </div><!-- panel-body -->
            </div><!-- panel -->
            
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
