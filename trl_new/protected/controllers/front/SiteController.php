<?php


class SiteController extends Controller
{
	public $layout;
 
	public function actionIndex() {

	$this->pageTitle = 'TOP RATED LOCAL';
    Yii::app()->clientScript->registerMetaTag('TOP RATED LOCAL', 'keywords');
	Yii::app()->clientScript->registerMetaTag('TOP RATED LOCAL', 'description');

		$this->render('index');
	}	
	
	public function actionSearchBusiness()	{
	
		
		if(isset($_POST['BusinessTypes']) && $_POST['BusinessLocation']) {
		$BusinessTypes = isset($_POST['BusinessTypes']) ? mysql_real_escape_string($_POST['BusinessTypes']) : '';
		$BusinessLocation = isset($_POST['BusinessLocation']) ? mysql_real_escape_string($_POST['BusinessLocation']) : '';
		} else {
		$BusinessTypes = isset($_POST['BusinessTypsHeader']) ? mysql_real_escape_string($_POST['BusinessTypsHeader']) : '';
		$BusinessLocation = isset($_POST['BusinessLocationHeader']) ? mysql_real_escape_string($_POST['BusinessLocationHeader']) : '';
		}

		$data['BusinessTypes'] = $BusinessTypes;
		$data['BusinessLocation'] =  $BusinessLocation;
		$data['fnl_business_details'] = $this->getBusinessResult($BusinessTypes,$BusinessLocation);
		
		//$model = $this->loadModel(7);
		//print_r($model);
		//$data['google_api_key'] = $model->meta_value;		
		$this->render('search-business',array('data'=>$data) );
	}

/*
* Displays About page content
*/	
		public function actionAbout()
	{

		$Obj = new common;
		$data['PageDetails'] = $Obj->getSelectQueryRowDetails("{{pages}}","*","page_url='about'","");
		$data['RatingBenefits'] = $Obj->getSelectQueryDetails("{{business_rating_benefits}}","*","","");
		$this->render('trl-about',array('data'=>$data) );
	}

/*
* Displays Privacy page content
*/		
		public function actionPrivacy()
	{
		$Obj = new common;
		$data['PageDetails'] = $Obj->getSelectQueryRowDetails("{{pages}}","*","page_url='privacy'","");
		$this->render('trl-privacy',array('data'=>$data));	
	}

/*
* Displays Terms page content
*/	
		public function actionTerms()
	{
		$Obj = new common;
		$data['PageDetails'] = $Obj->getSelectQueryRowDetails("{{pages}}","*","page_url='terms'","");
		$this->render('trl-terms',array('data'=>$data));
	}

/*
* Displays Business Registration page content
*/	
		public function actionListYourBusiness() {
		$Obj = new common;
		$data['PageDetails'] = $Obj->getSelectQueryRowDetails("{{pages}}","*","page_url='list-your-business'","");
		$data['ListingBenefits'] = $Obj->getSelectQueryDetails("{{business_benefits}}","*","","");
		$data['ListingTypes'] = $Obj->getSelectQueryDetails("{{listing}}","*","","");
		$data['FaqList'] = $Obj->getSelectQueryDetails("{{faq}}","*","","");
		$this->render('list-your-business',array('data'=>$data));
	}
	
	
/*
* Displays Business Registration page content
*/	
		public function actionDirection($BusinessTypes = NULL, $Source = NULL, $Destination = NULL) {		
		$data['BusinessTypes'] = $BusinessTypes;  
		$data['Source'] = urldecode($Source); 
		$data['Destination'] = urldecode($Destination); 
		//echo '<pre>'; print_r($data); echo '</pre>';
		
		
		$BusinessTypes = $BusinessTypes;
		$BusinessLocation = urldecode($Source);
		
		$data['fnl_business_details'] = $this->getBusinessResult($BusinessTypes,$BusinessLocation);			
				
		$this->render('business-location-direction',array('data'=>$data));
	}
	
	
			public function actionError()
		{
		
				$app = Yii::app();
				
				if( $error = $app->errorHandler->error->code )
				{
					if( Yii::app()->request->isAjaxRequest )
						echo $error['message'];

					$this->render( 'error' . ( in_array( $error, $app->params[ 'customErrorPages' ] ) ? $error : '' ), $error );
				}
		}
		
		public function actionCheckout() {
		$this->layout ='//layouts/middle_layout';
		$this->render('checkout');
		}
		
	/* Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Customer the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Customer::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
			/*
			Business search result
			*/	
				public function getBusinessResult($BusinessTypes, $BusinessLocation) {
				
					
				if(! empty($BusinessTypes) && ! empty($BusinessLocation) ) { 	
				$BusinessTypes = strtolower($BusinessTypes);
				$BusinessTypes = str_replace(' ','_',$BusinessTypes);	
				$BusinessTypes = urlencode($BusinessTypes);
				$BusinessLocation = urlencode($BusinessLocation);

					
			/*
			* Find location ID by entered location text
			*/
					$BusinessLocation_split =  explode(',',urldecode($BusinessLocation));
					$state_cc_zip_split = trim($BusinessLocation_split[1]);
					$zip_split =  explode(' ',$state_cc_zip_split);
					$zip = trim($zip_split[1]);
					$location = Locations::model()->findByAttributes(array('zip'=>$zip));
					if(is_object($location)) { 	$location_id = $location->id; }
						
				
			/*
			* Find Business Type ID by entered Business Type
			*/
					$BusinessTypes_temp =  urldecode($BusinessTypes);
					$category = Category::model()->findByAttributes(array('category_keyword'=>$BusinessTypes_temp));
					if(is_object($category)) { $cat_id = $category->category_id; }
				
			/*
			* Find Business ids by location id
			*/
					if(isset($location_id) && !empty($location_id)) {
					$Business_ids_object = new common;		
					$Business_ids_array = $Business_ids_object->getSelectQueryDetails("{{business_location}}","business_id","location_id=".$location_id,"");
					$result_ids = array();
					for($i=0;$i<count($Business_ids_array);$i++) {
					$result_ids[] = $Business_ids_array[$i]['business_id'];
					}

					$Business_ids = implode(',',$result_ids);	
					}

			/*
			* Find Business ids by category id 
			* with including where in business id listed above
			*/
					
					if(isset($Business_ids) && !empty($Business_ids) && isset($cat_id) && $cat_id > 0) {
						$cBusiness_ids_object = new common;
						$cBusiness_ids_array = $cBusiness_ids_object->getSelectQueryDetails("{{business_category}}","business_id","category_id=".$cat_id." and business_id in (".$Business_ids.")","");
						$final_bid = array();
						for($i=0;$i<count($cBusiness_ids_array);$i++) {
						$final_bid[] = $cBusiness_ids_array[$i]['business_id'];
						}
						
					}
					
			/*
			* Get Final valid business list
			*/
					if(isset($final_bid) && is_array($final_bid) && count($final_bid) > 0) {
						$fnl_businessObj = new common;
						$final_bid_str = implode('',$final_bid);
						$fnl_business_details = $fnl_businessObj->getSelectQueryDetails("{{business}} b inner join {{business_address}} bd on b.business_id=bd.business_id","b.*, bd.address","b.business_id in (".$final_bid_str.")","");
						return $fnl_business_details;
					}
					
					}
					return false;
				}
}