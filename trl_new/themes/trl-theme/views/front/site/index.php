<?php $this->pageTitle=Yii::app()->name; ?>
   <!-- Carousel ================================================== -->
        <section id="myCarousel" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
            <li data-target="#myCarousel" data-slide-to="4"></li>
          </ol>
          <div class="carousel-inner">
            <div class="item active"><img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/slider/img1.jpg" alt="First slide" /></div>
            <div class="item"><img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/slider/img2.jpg" alt="Second slide" /></div>
            <div class="item"><img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/slider/img3.jpg" alt="Third slide" /></div>
            <div class="item"><img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/slider/img4.jpg" alt="Fourth slide" /></div>
            <div class="item"><img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/slider/img5.jpg" alt="Fifth slide" /></div>
          </div>
        </section>
       <!-- /.carousel -->


		<section class="business_search_form">
        	<div class="container">
            	
            	<form role="form" method="post" name="BusinessSearchFrm"  action="<?php echo Yii::app()->getBaseUrl(true); ?>/site/SearchBusiness">
                <img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/search_form_bg.png" />
                		
						<div class="form_inner">
                      	  <div class="col-md-5 pull-left">
                        	<div class="form-group">
                              <input type="text" class="form-control"  id="BusinessTypes" name="BusinessTypes" placeholder="What type of business are you looking for?"  />
                            </div>
                        </div>
                      	
						<div class="col-md-6 pull-right">
                        	<div class="form-group">
                              <input type="button" class="btn pull-right" onclick="SearchBusiness();">
                              <input type="text" class="form-control pull-right"  id="BusinessLocation" name="BusinessLocation"   placeholder="Enter A Location"  />
                            </div>
							</div>

					</div>
                </form>
            </div>
 </section>