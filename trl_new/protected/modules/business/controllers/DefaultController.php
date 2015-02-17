<?php

class DefaultController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1-admin';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=> array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	
	
	public function actionCreate()
    {
        $model=new Business;		  // this is my model related to table
		$BusinessAddress =new BusinessAddress;
		$BusinessCategory=new BusinessCategory;
		$BusinessLocation=new BusinessLocation;
		
		// Check for business name 
		
			if(isset($_POST['Business']))
			{	
				$Business= Business::model()->findByAttributes(array('business_name'=>$_POST['Business']['business_name']));
			if($Business===null) {
					
			
				$rnd = rand(0,9999);  // generate random number between 0-9999
			   
				$model->attributes=$_POST['Business'];
				
				$model->authcode = $this->random_string(32);
			
					$uploadedFile=CUploadedFile::getInstance($model,'logo');
				
					$fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
				
					$model->logo = $fileName;
					
					 if($model->save())
					{ 
						if(CUploadedFile::getInstance($model,'logo')){
							$uploadedFile->saveAs(Yii::app()->basePath.'/../uploads/business_logo/'.$fileName);  // image will uplode to rootDirectory/banner/
						}
						
						// for BusinessAddress
						
						if(isset($_POST['BusinessAddress'])){
							
							foreach($_POST['BusinessAddress']['address'] as $address ){
									if(!empty($address) && $address !=''){
											$BusinessAddress->setIsNewRecord(true);
											$BusinessAddress->address_id = null;
											$BusinessAddress->business_id = $model->business_id;
											$BusinessAddress->address = $address;
											$BusinessAddress->save();
									}
							
						
							}	
						}
						
						// for BusinessLocation
						
						if(isset($_POST['BusinessLocation'])){
						
							$unique_location_ids= array_unique($_POST['BusinessLocation']['location_id']);
							foreach($unique_location_ids as $location_id ){
									if(!empty($address) && $address !=''){
											$BusinessLocation->setIsNewRecord(true);
											$BusinessLocation->business_location_id = null;
											$BusinessLocation->business_id = $model->business_id;
											$BusinessLocation->location_id = $location_id;
											$BusinessLocation->save();
									}
							
						
							}	
						}
						
						// for BusinessCategory
						
							if(isset($_POST['BusinessCategory'])){
							$unique_category_ids= array_unique($_POST['BusinessCategory']['category_id']);
							
							foreach($unique_category_ids as $category_id ){
									if(!empty($address) && $address !=''){
											$BusinessCategory->setIsNewRecord(true);
											$BusinessCategory->business_category_id = null;
											$BusinessCategory->business_id = $model->business_id;
											$BusinessCategory->category_id = $category_id;
											$BusinessCategory->save();
									}
							
						
							}	
						}
						
				$model->attributes=$_POST['Business'];		
						 $this->redirect(array('admin'));
						
						
					 }	
				 
				
			}else{
				$model->attributes=$_POST['Business'];
				$model->addError('business_name', "This business name allready exist, Please try again using another business name.");
			}
			}
		
		
        $this->render('create',array(
            'model'=>$model,
			'BusinessAddress'=> $BusinessAddress,
			'BusinessCategory'=> $BusinessCategory,
			'BusinessLocation'=> $BusinessLocation,
			
        ));
    }
	

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	
	public function actionUpdate($id)
    {
        $model=$this->loadModel($id);
		
		
        if(isset($_POST['Business']))
        {
						
		    $model->attributes=$_POST['Business'];
 
            $uploadedFile=CUploadedFile::getInstance($model,'logo');
 			if($model->save())
            {
                if(!empty($uploadedFile))  // check if uploaded file is set or not
                {
                    $uploadedFile->saveAs(Yii::app()->basePath.'/../uploads/business_logo/'.$model->logo);
                }
				
				
				// for BusinessAddress
				
					if(isset($_POST['BusinessAddress'])){	
					
					// delete all old records 
					BusinessAddress::model()->deleteAll(array("condition"=>"business_id='$id'"));
					$BusinessAddress =new BusinessAddress;
		
						//insert all update records
						foreach($_POST['BusinessAddress']['address'] as $address ){
								if(!empty($address) && $address !=''){
										$BusinessAddress->setIsNewRecord(true);
										$BusinessAddress->address_id = null;
										$BusinessAddress->business_id = $model->business_id;
										$BusinessAddress->address = $address;
										$BusinessAddress->save();
								}
						
					
						}	
					}
					
					// for BusinessLocation
					
					if(isset($_POST['BusinessLocation'])){
					
						// delete all old records 
					BusinessLocation::model()->deleteAll(array("condition"=>"business_id='$id'"));
				
					$BusinessLocation=new BusinessLocation;
						
						//insert all update records with unique location
						
						$unique_location_ids= array_unique($_POST['BusinessLocation']['location_id']);
						foreach($unique_location_ids as $location_id ){
								if(!empty($address) && $address !=''){
										$BusinessLocation->setIsNewRecord(true);
										$BusinessLocation->business_location_id = null;
										$BusinessLocation->business_id = $model->business_id;
										$BusinessLocation->location_id = $location_id;
										$BusinessLocation->save();
								}
						
					
						}	
					}
					
					// for BusinessCategory
					
						if(isset($_POST['BusinessCategory'])){
						
						// delete all old records 
						BusinessCategory::model()->deleteAll(array("condition"=>"business_id='$id'"));
						$BusinessCategory=new BusinessCategory;
		
						
						//insert all update records with unique Category
						$unique_category_ids= array_unique($_POST['BusinessCategory']['category_id']);
						
						foreach($unique_category_ids as $category_id ){
								if(!empty($address) && $address !=''){
										$BusinessCategory->setIsNewRecord(true);
										$BusinessCategory->business_category_id = null;
										$BusinessCategory->business_id = $model->business_id;
										$BusinessCategory->category_id = $category_id;
										$BusinessCategory->save();
								}
						
					
						}	
					}
				
                $this->redirect(array('admin'));
            }
 
       	}
		
 
        $this->render('update',array(
            'model'=>$model,
			
        ));
    }

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	
	        public function actionDelete($id)
        {
		
                if(Yii::app()->request->isPostRequest)
                {
					
                        // we only allow deletion via POST request
                  
					    try{
                                // $this->loadModel($id)->delete();  // ORIGINAL LINE
  
								// modify to:
								// delete image 
                                $model = $this->loadModel($id);
                               @unlink(Yii::app()->basePath.'/../uploads/business_logo/'.$model->logo);
								
                                // then..delete the model:
                              $model->delete();

                        }
                        catch(CDbException $e){
                        }

                        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
                        if(!isset($_GET['ajax']))
                                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
                }
                else
                        throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
        }

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Business');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Business('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Business']))
			$model->attributes=$_GET['Business'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Business the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Business::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	
	
	/**
	 * Performs the AJAX validation.
	 * @param Business $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='business-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	
	 public function random_string($length) {
   
   $token = "";
   $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
   $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
   $codeAlphabet.= "0123456789";
   for($i=0;$i<$length;$i++){
    $token .= $codeAlphabet[$this->crypto_rand_secure(0,strlen($codeAlphabet))];
   }
   return $token;
     
  }
  
  public function crypto_rand_secure($min, $max) {
   $range = $max - $min;
   if ($range < 0) return $min; // not so random...
   $log = log($range, 2);
   $bytes = (int) ($log / 8) + 1; // length in bytes
   $bits = (int) $log + 1; // length in bits
   $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
   do {
    $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
    $rnd = $rnd & $filter; // discard irrelevant bits
   } while ($rnd >= $range);
   return $min + $rnd;
  }
	
}