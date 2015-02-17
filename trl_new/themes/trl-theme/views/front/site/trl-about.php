
			<section class="text-center">
					<img src="images/abt_img.jpg">
				
                    	<div class="toprated_map_not">
                        	<strong>Top Rated Local®</strong> is a local business site that highlights the top businesses
within a local community. This platform provides a portal for businesses to
capture truly authentic customer experiences that help promote and
leverage what that business has offered to previous customers.
                     
                    </div>            
            </section>
<?php
if(isset($data['PageDetails']) && is_array($data['PageDetails']) && count($data['PageDetails'] == 1)) {

	extract($data['PageDetails']);
	$this->pageTitle = 'TRL - '. $Page_Name;
    Yii::app()->clientScript->registerMetaTag($Meta_Keywords, 'keywords');
	Yii::app()->clientScript->registerMetaTag($Meta_Description, 'description');
	
}


if(isset($data['RatingBenefits'])) {
$RatingBenefits = $data['RatingBenefits'];
$middle = count($RatingBenefits) / 2;
}

?>

  <article>
  <div class="container about_page">
<?php if(isset($Page_Description)) echo html_entity_decode($Page_Description); ?>
<section class="wrapper_bg about_page">
	<section class="container">
<?php if(isset($RatingBenefits) && count($RatingBenefits) > 0 && isset($middle)) { ?>
               <div class="clear">&nbsp;</div> 
               
               <strong class="blue text-center ">Benefits of Rating Businesses in Your Community</strong>
                
               <div class="rating_benifits">
			   
			   
               		<div class="col-lg-6 pull-left">
					<?php for($i=0;$i<$middle;$i++) {  ?>
                    	<dl>
                        	<dt><img src="<?php echo Yii::app()->getBaseUrl(true); ?>/uploads/rating_benefits/<?php echo $RatingBenefits[$i]['image']; ?>"></dt>
                            <dd><?php echo $RatingBenefits[$i]['business_rating_benefits']; ?></dd>
                        </dl>
           
                      <?php } ?>
                    </div>
               		
                    <div class="col-lg-6 pull-right">
                    	<?php for($i=$middle;$i<count($RatingBenefits);$i++) {  ?>
                          <dl>
                        	<dt><img src="<?php echo Yii::app()->getBaseUrl(true); ?>/uploads/rating_benefits/<?php echo $RatingBenefits[$i]['image']; ?>"></dt>
                             <dd><?php echo $RatingBenefits[$i]['business_rating_benefits']; ?></dd>
                        </dl>
                        
            		  <?php } ?>
                    	
                    </div>	
					
					
					
               </div> 
<?php } ?>			   
</section>
</section>
</div>
  </article>