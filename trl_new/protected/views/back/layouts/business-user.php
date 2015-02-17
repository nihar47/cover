<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo Yii::app()->getBaseUrl(true); ?>/images/favicon.png">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <title>::. Top Rated Local .::</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo Yii::app()->getBaseUrl(true); ?>/fonts/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->getBaseUrl(true); ?>/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->getBaseUrl(true); ?>/css/carousel.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->getBaseUrl(true); ?>/css/style.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->getBaseUrl(true); ?>/css/jquery.scrollbars.css" rel="stylesheet">
    
    <script src="<?php echo Yii::app()->getBaseUrl(true); ?>/js/jquery-1.10.2.min.js"></script>
    <script src="<?php echo Yii::app()->getBaseUrl(true); ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo Yii::app()->getBaseUrl(true); ?>/js/jquery.scrollbars.js"></script>

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
  
		<section class="wrapper">
        	<header class="page-header">
            </header>

			<section class="sub_header">
                    	<div class="container inner_header">
                        	<div class="col-lg-3 brester_logo">
                            <!--<img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/brester_logo.jpg" alt="Brester Logo"/>-->
                            <?php echo CHtml::image(Yii::app()->request->baseUrl.'/uploads/business_logo/'.$this->business_Info->logo,$this->business_Info->business_name ); ?> 
                            </div>
                          
                              
                             
                             
                            
                            
                            <div class="col-lg-4 pull-right">
                            	<div class="location_popup">
                	<dl>
                    	 
                        <dt>
                        	<strong><?php echo $this->business_Info->business_name; ?></strong>
                            <p>1555 Blake St #3, Denver, Co</p>
                            
                    	           <input type="button" value="call" class="btn">
    		    	               <input type="button" value="Direction" class="btn">
                                   <div class="clear">&nbsp;</div>
                                   <button class="btn btn_blue" style="margin-top:5px;" >visit Website</button>
                        		    
                                        <span class="business_ratting">
                            
                             
							
							<?php
							
							$floor_business_Info_ratings = floor($this->business_Info_ratings);
							
							if($this->business_Info_ratings == $floor_business_Info_ratings) {
							$final_val = $floor_business_Info_ratings;
							} else  {
							$final_val = ceil($this->business_Info_ratings) - 0.5;
							} 						
							
							$activestar = true;
							
							for ($x=1; $x<=5; $x++) {
							
								if($x <= ceil($final_val) && $activestar) {
									echo CHtml::image(Yii::app()->request->baseUrl.'/images/icon/star.png',"logo"); 
								} 
								
								if(($x+0.5) == $final_val) { $activestar = false;
								echo CHtml::image(Yii::app()->request->baseUrl.'/images/icon/star_half.png',"logo"); 
								} else if($x > ceil($final_val) ) { $activestar = false;
									echo CHtml::image(Yii::app()->request->baseUrl.'/images/icon/star_null.png',"logo"); 
								} 
							
							
							}
							
							?>
                               &nbsp; &nbsp; <b> <?php echo $final_val; ?></b> 
                            </span>
                            
                          

                        </dt>
                        <dd>
                        	<img alt="Top Rated Local" src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/seal_logo.jpg">
                            <a href="javascript:;">See Ratings</a> 	
                        </dd>
                     	<div class="clear"></div>
                      
                       	
                        
                        
                    </dl>
                </div>
                            
                            </div>
                        </div>
                    </section>
                    
  
                    

			
	        <!-- Inner Navigation -->
               <div role="navigation" class="navbar navbar-default navbar-static-top">
                  <div class="container">
                    
                    <div class="navbar-collapse collapse">
                      <ul class="nav navbar-nav">
                        <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/admin?r=BusinessUser/default/rating&code=<?php echo $this->code; ?>"
                        <?php 
						if($this->curpage ==  Yii::app()->getBaseUrl(true).'/backend.php?r=BusinessUser/default/rating'){
							echo 'class="active"';
							}
						?> >Ratings</a></li>
                        <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/admin?r=BusinessUser/default/manageratings&code=<?php echo $this->code; ?>"
                         <?php 
						if($this->curpage ==  Yii::app()->getBaseUrl(true).'/backend.php?r=BusinessUser/default/manageratings'){
							echo 'class="active"';
							}
						?>
                         >Manage Ratings</a></li>
                        <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/admin?r=BusinessUser/default/managerequests&code=<?php echo $this->code; ?>" 
                         <?php 
						if($this->curpage ==  Yii::app()->getBaseUrl(true).'/backend.php?r=BusinessUser/default/managerequests'){
							echo 'class="active"';
							}
						?>>Requests <span>
						<?php echo $this->requests; ?></span></a></li>
                        <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/admin?r=BusinessUser/default/profilesettings&code=<?php echo $this->code; ?>"
                         <?php 
						if($this->curpage ==  Yii::app()->getBaseUrl(true).'/backend.php?r=BusinessUser/default/profilesettings'){
							echo 'class="active"';
							}
						?> >Profile Settings</a></li>
                         <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/admin?r=BusinessUser/default/accountinfo&code=<?php echo $this->code; ?>" 
                          <?php 
						if($this->curpage ==  Yii::app()->getBaseUrl(true).'/backend.php?r=BusinessUser/default/accountinfo'){
							echo 'class="active"';
							}
						?>>Account Info</a></li>
                                              
                        
                         <div class="social_link pull-right">
                  
				  
				         <li><b>Share :</b></li>
						<li><a href="https://www.facebook.com/sharer/sharer.php?s=100&images[0]=<?php echo Yii::app()->request->baseUrl.'/uploads/business_logo/'.$this->business_Info->logo; ?>&t=<?php echo $this->business_Info->business_name; ?>&u=<?php echo urlencode(Yii::app()->getBaseUrl(true).'/customer/rating?business_id='.$this->business_id); ?>" target="_blank" class="facebook" title="Facebook">&nbsp;</a></li>
                       	
						<li><a target="_blank"  href="https://twitter.com/share?url=<?php echo urlencode(Yii::app()->getBaseUrl(true).'/customer/rating?business_id='.$this->business_id); ?>" data-lang="en" class="twitter" title="Twitter">&nbsp;</a></li>
                        
						<li><a target="_blank"  href="https://plus.google.com/share?url=<?php echo urlencode(Yii::app()->getBaseUrl(true).'/customer/rating?business_id='.$this->business_id); ?>" onClick="javascript:window.open(this.href,
  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" class="google_plus" title="Google Plus">&nbsp;</a></li>
                        
						<li><a href="#" class="mobile_app" >&nbsp;</a></li>
                        
                      </div>
                        
                        
                        <li class="dropdown">
                          <a data-toggle="dropdown" class="dropdown-toggle" href="#">Menu <b class="caret"></b></a>
                          <ul class="dropdown-menu">
                           <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/admin?r=BusinessUser/default/rating" >Ratings</a></li>
                        <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/admin?r=BusinessUser/default/manageratings" >Manage Ratings</a></li>
                        <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/admin?r=BusinessUser/default/managerequests" >Requests</a></li>
                        <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/admin?r=BusinessUser/default/profilesettings" >Profile Settings</a></li>
                         <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/admin?r=BusinessUser/default/accountinfo" >Account Info</a></li>
                          </ul>
                          
                      <ul class="social_link pull-right">
                       	<li><b>Share :</b></li>
                        <li><a href="#" class="facebook" title="Facebook">&nbsp;</a></li>
                        <li><a href="#" class="twitter" title="Twitter">&nbsp;</a></li>
                        <li><a href="#" class="google_plus" title="Google Plus">&nbsp;</a></li>
                        <li><a href="#" class="mobile_app" >&nbsp;</a></li>
                        
                      </ul>
                        </li>
                        
                        
                        
                      </ul>
                     
                    </div><!--/.nav-collapse -->
                  </div>
                </div>
           <!-- Inner Navigation -->
            
            
            <article>
          	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>
            </article>
            

    <footer id="footer">
        <div class="text-muted pull-left">&copy; 2013 Top Rated Local ® <a href="<?php echo Yii::app()->getBaseUrl(true); ?>/site/privacy">Privacy</a> 
        <a href="<?php echo Yii::app()->getBaseUrl(true); ?>/site/terms">Terms</a></div>
        <div class="footer_links pull-right">
         <a href="<?php echo Yii::app()->getBaseUrl(true); ?>">Home</a>
         <a href="<?php echo Yii::app()->getBaseUrl(true); ?>/site/about">About</a>
         <a href="<?php echo Yii::app()->getBaseUrl(true); ?>">Manage Listing</a>
         <a href="<?php echo Yii::app()->getBaseUrl(true); ?>">List your business</a></div>
        <div class="clear"></div>
    </footer>
    
    
    
       	<!--wrapper end --> 	
        </section>
        
    
  </body>
</html>
